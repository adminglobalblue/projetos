<?php

// Fluxo do relatório gerencial
if (!class_exists("RGFluxo")) include "RGFluxo.php";

// Models
if (!class_exists("Model")) include __DIR__."/../models/Model.php";
if (!class_exists("Rg_poe")) include __DIR__."/../models/Rg_poe.php";
if (!class_exists("Rg_prsaimg")) include __DIR__."/../models/Rg_prsaimg.php";
if (!class_exists("Rg_pop")) include __DIR__."/../models/Rg_pop.php";
if (!class_exists("Rg_antenario")) include __DIR__."/../models/Rg_antenario.php";
if (!class_exists("Rg_inconformidade")) include __DIR__."/../models/Rg_inconformidade.php";
if (!class_exists("Rg_inconformidadeimg")) include __DIR__."/../models/Rg_inconformidadeimg.php";
if (!class_exists("Rg_abordagemoperadoras")) include __DIR__."/../models/Rg_abordagemoperadoras.php";
if (!class_exists("Rg_racks")) include __DIR__."/../models/Rg_racks.php";
if (!class_exists("Logs_relatoriogerencial")) include __DIR__."/../models/Logs_relatoriogerencial.php";
if (!class_exists("Rg_tags")) include __DIR__."/../models/Rg_tags.php";
if (!class_exists("Tags")) include __DIR__."/../models/Tags.php";
if (!class_exists("Empreendimentos")) include __DIR__."/../models/Empreendimentos.php";
if (!class_exists("Operadoras")) include __DIR__."/../models/Operadoras.php";


class RelatorioGerencial extends Model {
    public $_RGFluxo;
    public $table;
	public $thisRelatorioGerencial;
	public $lastRelatorioGerencial;
	
    public $_Rg_poe;
    public $_Rg_prsaimg;
    public $_Rg_pop;
    public $_Rg_antenario;
    public $_Rg_inconformidade;
    public $_Rg_inconformidadeimg;
	public $_Rg_abordagemoperadoras;
	public $_Logs_relatoriogerencial;
	public $_Empreendimentos;
	public $_Rg_tags;
    public $_Tags;
	public $_Rg_racks;
    public $_Operadoras;

	public $dir_genPDFBackend = __dir__."/genPDFBackend.php";
	
    public $sc;

	/*
	Num_Ativo = [
		"R" => "Rascunho",
		"P" => "Pendente",
		"AC" => "Aguardando Controladoria",
		"AEC" => "Aguardando Engenharia Central",
		"C" => "Concluído"
	]
	*/
	
    public function __construct($sc) {
        parent::__construct($sc);
        $this->sc = $sc;
        $this->_RGFluxo = new RGFluxo();
        $this->_Rg_poe = new Rg_poe($sc);
        $this->_Rg_prsaimg = new Rg_prsaimg($sc);
        $this->_Rg_pop = new Rg_pop($sc);
        $this->_Rg_antenario = new Rg_antenario($sc);
        $this->_Rg_inconformidade = new Rg_inconformidade($sc);
        $this->_Rg_inconformidadeimg = new Rg_inconformidadeimg($sc);
		$this->_Rg_abordagemoperadoras = new Rg_abordagemoperadoras($sc);
		$this->_Logs_relatoriogerencial = new Logs_relatoriogerencial($sc);
		$this->_Rg_tags = new Rg_tags($sc);
        $this->_Tags = new Tags($sc);
		$this->_Empreendimentos = new Empreendimentos($sc);
        $this->_Rg_racks = new Rg_racks($sc);
        $this->_Operadoras = new Operadoras($sc);
    }
	
	public function createDraft(array $data) {
		$ID_Empreendimento = $data["RG_ID_Empreendimento"] ?? null;
		$RG_InicioVigencia = $data["RG_InicioVigencia"] ?? null;
		$RG_FimVigencia = $data["RG_FimVigencia"] ?? null;
		$ID_RelatorioAnterior = $data["RG_RelatorioAnterior"] ?? null;
		
		$this->query("INSERT INTO {$this->table}
			(ID_Empreendimento, DataInicioVigencia, DataFimVigencia, Criado_em, ID_RelatorioAnterior, Num_Ativo, NUm_Status)
			VALUES ('$ID_Empreendimento', 
			'$RG_InicioVigencia', 
			'$RG_FimVigencia', 
			'".date('Y-m-d H:i:s')."', 
			".($ID_RelatorioAnterior ? "'$ID_RelatorioAnterior'" : "NULL" ).",
			'S', 
			'R')
		");
		$rs = $this->LAST_INSERT_ID();
		return $rs;
	}
	 
	public function setRelatorioGerencial($relatorioGerencial) {
        $relatorioGerencial->Config = json_decode($relatorioGerencial->Config, true) ?: [];
		$this->thisRelatorioGerencial = $relatorioGerencial;
		$this->getLastRelatorioGerencial();
	}
	
	public function getLastRelatorioGerencial() {
		$relatorioGerencial = $this->find("ID = '".$this->thisRelatorioGerencial->ID_RelatorioAnterior."'");
        $relatorioGerencial = $relatorioGerencial[0] ?? null;
        $relatorioGerencial["Config"] = json_decode($relatorioGerencial["Config"], true) ?: [];
		$this->lastRelatorioGerencial = (object)$relatorioGerencial;
	}
	
	public function getEmpreendimento() {
		$ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
		
		$rs = $this->_Empreendimentos->getById($ID_Empreendimento);
		return $rs[0] ?? null;
	}
	
	public function delete() {
        $this->save("ID = '".$this->thisRelatorioGerencial->ID."'", [
            "Num_Ativo" => "R",
			"Removido_em" => date('Y-m-d H:i:s')
        ]);
    }
	
	public function getPoe() {
		$ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
		$rs = $this->query("SELECT 
				tb1.ID as ID_POE,
				tb1.Descricao as Descricao_POE,
				tb2.ID as ID_RGPOE,
                tb2_lastRG.ID as lastID_RGPOE,
				IF(tb2.ID, tb2.Descricao, IF(tb2_lastRG.ID, tb2_lastRG.Descricao, tb1.Descricao)) as Descricao_RGPOE,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem,
                tb1.JSONImagemDescricao as JSONImagemDescricao
			FROM {$this->tables["Emppoe"]} as tb1 
			LEFT JOIN {$this->tables["Rg_poe"]} as tb2 ON tb2.ID_Emppoe = tb1.ID AND tb2.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}'
            LEFT JOIN {$this->tables["Rg_poe"]} as tb2_lastRG ON tb2_lastRG.ID_Emppoe = tb1.ID AND tb2_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."'
			WHERE tb1.ID_Empreendimento = $ID_Empreendimento 
			ORDER BY ordem ASC");
		if ($rs) {
			foreach($rs as $i => $row){
                $rs[$i]["JSONImagemDescricao"] = json_decode($row["JSONImagemDescricao"], true);
                $rs[$i]["IMG"] = $this->getPoeImg(intval($row["ID_POE"]), intval($row["ID_RGPOE"]), intval($row["lastID_RGPOE"]));
                if ($rs[$i]["IMG"] && $rs[$i]["JSONImagemDescricao"]) {
                    foreach($rs[$i]["IMG"] as $j => $rowIMG){ 
                        if (!$rowIMG["ID_RGPOEIMG"] && !$rowIMG["lastID_RGPOEIMG"]) {
                            $rs[$i]["IMG"][$j]["Descricao_RGPOEIMG"] = $rs[$i]["JSONImagemDescricao"][
                                $rowIMG["ID_POEIMG"]
                            ] ?? null;
                        }
                    }
                }
			}
		}
		return $rs;
	}
	
	public function getPoeImg(int $ID_POE, int $ID_RGPRSA, int $lastID_RGPOE) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_POEIMG,
				tb2.ID as ID_RGPOEIMG,
                tb2_lastRG.ID as lastID_RGPOEIMG,
                IF(tb2.ID, tb2.Descricao, tb2_lastRG.Descricao) as Descricao_RGPOEIMG,
				tb1.File_Name as File_Name,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM tb_filesemppoe as tb1 
			LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2 ON tb2.ID_PRSA = tb1.ID AND tb2.ID_RGPRSA = '$ID_RGPRSA' AND tb2.Tipo_PRSA = 'POE'
            LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2_lastRG ON tb2_lastRG.ID_PRSA = tb1.ID AND tb2_lastRG.ID_RGPRSA = '$lastID_RGPOE' AND tb2_lastRG.Tipo_PRSA = 'POE'
			WHERE tb1.ID_Emppoe = '$ID_POE'
            ORDER By ordem");
		return $rs;
    }
    
    public function getAntenario() {
		$ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
		$rs = $this->query("SELECT 
				tb1.ID as ID_Antenario,
                tb1.Nom_Nome as Nome_Antenario,
				tb1.Localizacao as Localizacao_Antenario,
                tb1.Capacidade as Capacidade,
				(SELECT count(*) FROM tb_antenariosposicoes WHERE ID_Antenarios = tb1.ID) as Ocupacao,
				tb2.ID as ID_RGAntenario,
                tb2_lastRG.ID as lastID_RGAntenario,
                IF(tb2.ID, tb2.Descricao, IF(tb2_lastRG.ID, tb2_lastRG.Descricao, tb3.Descricao)) as Descricao_RGAntenario,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM {$this->tables["Antenarios"]} as tb1 
			LEFT JOIN {$this->tables["Rg_antenario"]} as tb2 ON tb2.ID_Antenario = tb1.ID AND tb2.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}'
            LEFT JOIN {$this->tables["Rg_antenario"]} as tb2_lastRG ON tb2_lastRG.ID_Antenario = tb1.ID AND tb2_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."'
            LEFT JOIN {$this->tables["Empprsa"]} as tb3 ON tb3.ID_PRSA = tb1.ID AND tb3.Tipo_PRSA = 'ANTENARIO'
			WHERE tb1.ID_Empreendimento = $ID_Empreendimento 
            ORDER BY ordem ASC");
		if ($rs) {
			foreach($rs as $i => $row){
				$rs[$i]["IMG"] = $this->getAntenarioImg(intval($row["ID_Antenario"]), intval($row["ID_RGAntenario"]), intval($row["lastID_RGAntenario"]));
			}
		}
		return $rs;
	}
	
	public function getAntenarioImg(int $ID_Antenario, int $ID_RGAntenario, int $lastID_RGAntenario) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_AntenarioIMG,
				tb2.ID as ID_RGAntenarioIMG,
                IF(tb2.ID, tb2.Descricao, tb2_lastRG.Descricao) as Descricao_RGAntenarioIMG,
				tb1.File_Name as File_Name,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM {$this->tables["Filesempprsa"]} as tb1 
			LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2 ON tb2.ID_PRSA = tb1.ID AND tb2.ID_RGPRSA = '$ID_RGAntenario' AND tb2.Tipo_PRSA = 'ANTENARIO'
            LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2_lastRG ON tb2_lastRG.ID_PRSA = tb1.ID AND tb2_lastRG.ID_RGPRSA = '$lastID_RGAntenario' AND tb2_lastRG.Tipo_PRSA = 'ANTENARIO'
            INNER JOIN {$this->tables["Empprsa"]} as tb3 ON tb3.ID = tb1.ID_PRSA AND tb3.Tipo_PRSA = 'ANTENARIO' 
            WHERE tb3.ID_PRSA = '$ID_Antenario'
            ORDER By ordem");
		return $rs;
    }
    
    public function getPOP() {
		$ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
		$rs = $this->query("SELECT 
				tb1.ID as ID_POP,
                tb1.Nom_POP as Nome_POP,
				tb1.Localizacao as Localizacao_POP,
                tb1.Capacidade as Capacidade,
				(SELECT count(*) FROM {$this->tables["Racks"]} WHERE ID_POP = tb1.ID) as Ocupacao,
				tb2.ID as ID_RGPOP,
                tb2_lastRG.ID as lastID_RGPOP,
                IF(tb2.ID, tb2.Descricao, IF(tb2_lastRG.ID, tb2_lastRG.Descricao, tb3.Descricao)) as Descricao_RGPOP,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM {$this->tables["Pop"]} as tb1 
			LEFT JOIN {$this->tables["Rg_pop"]} as tb2 ON tb2.ID_POP = tb1.ID AND tb2.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}'
            LEFT JOIN {$this->tables["Rg_pop"]} as tb2_lastRG ON tb2_lastRG.ID_POP = tb1.ID AND tb2_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."'
            LEFT JOIN {$this->tables["Empprsa"]} as tb3 ON tb3.ID_PRSA = tb1.ID AND tb3.Tipo_PRSA = 'POP'
			WHERE tb1.ID_Empreendimento = $ID_Empreendimento 
			ORDER BY ordem ASC");
		if ($rs) {
			foreach($rs as $i => $row){
                //$rs[$i]["IMG"] = $this->getPOPImg(intval($row["ID_POP"]), intval($row["ID_RGPOP"]), intval($row["lastID_RGPOP"]));
                $rs[$i]["RACKS"] = $this->getRacks(intval($row["ID_POP"]));
			}
		}
		return $rs;
	}
    
    public function getRacks(int $ID_POP) {
		$ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
		$rs = $this->query("SELECT 
				tb1.ID as ID_Racks,
                tb1.Nom_Rack as Nom_Rack,
				tb1.ID_Operadora as ID_Operadora,
                (CASE
                    WHEN tb1.ID_Operadora = '-1' THEN (SELECT Nom_Empreendimento FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimento = '$ID_Empreendimento') 
                    ELSE (SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} as tb3 WHERE tb3.ID_Operadoras = tb1.ID_Operadora)
                END) as Nom_Operadora,
                tb1.InicioVigencia as InicioVigencia,
                tb1.FimVigencia as FimVigencia,
				tb1.Valor_Contrato as Valor_Contrato,
                tb1.Num_Contrato as Num_Contrato,
                tb2.ID as ID_RGRacks,
                tb2.ID_RGPOP as ID_RGPOP,
                tb2_lastRG.ID as lastID_RGRacks,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem,
                IF(tb2.ID, tb2.Descricao, IF(tb2_lastRG.ID, tb2_lastRG.Descricao, tb3.Descricao)) as Descricao
			FROM {$this->tables["Racks"]} as tb1 
			LEFT JOIN {$this->tables["Rg_racks"]} as tb2 ON tb2.ID_Racks = tb1.ID AND tb2.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}'
            LEFT JOIN {$this->tables["Rg_racks"]} as tb2_lastRG ON tb2_lastRG.ID_Racks = tb1.ID AND tb2_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."'
            LEFT JOIN {$this->tables["Empprsa"]} as tb3 ON tb3.ID_PRSA = tb1.ID AND tb3.Tipo_PRSA = 'RACK'
			WHERE tb1.ID_POP = '$ID_POP' 
			ORDER BY ordem ASC, CAST(digits(tb1.Nom_Rack) as unsigned) ASC");
		if ($rs) {
			foreach($rs as $i => $row){
				$rs[$i]["IMG"] = $this->getRacksImg(intval($row["ID_Racks"]), intval($row["ID_RGRacks"]), intval($row["lastID_RGRacks"]));
			}
		}
		return $rs;
	}

    public function getRacksImg(int $ID_Racks, int $ID_RGRacks, int $lastID_RGRacks) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_RacksIMG,
				tb2.ID as ID_RGRacksIMG,
                IF(tb2.ID, tb2.Descricao, tb2_lastRG.Descricao) as Descricao_RGRacksIMG,
				tb1.File_Name as File_Name,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM {$this->tables["Filesempprsa"]} as tb1 
			LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2 ON tb2.ID_PRSA = tb1.ID AND tb2.ID_RGPRSA = '$ID_RGRacks' AND tb2.Tipo_PRSA = 'RACK'
            LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2_lastRG ON tb2_lastRG.ID_PRSA = tb1.ID AND tb2_lastRG.ID_RGPRSA = '$lastID_RGRacks' AND tb2_lastRG.Tipo_PRSA = 'RACK'
            INNER JOIN {$this->tables["Empprsa"]} as tb3 ON tb3.ID = tb1.ID_PRSA AND tb3.Tipo_PRSA = 'RACK' 
            WHERE tb3.ID_PRSA = '$ID_Racks'
			ORDER By ordem");
		return $rs;
    }

	public function getPOPImg(int $ID_POP, int $ID_RGPOP, int $lastID_RGPOP) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_POPIMG,
				tb2.ID as ID_RGPOPIMG,
                IF(tb2.ID, tb2.Descricao, tb2_lastRG.Descricao) as Descricao_RGPOPIMG,
				tb1.File_Name as File_Name,
				IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM {$this->tables["Filesempprsa"]} as tb1 
			LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2 ON tb2.ID_PRSA = tb1.ID AND tb2.ID_RGPRSA = '$ID_RGPOP' AND tb2.Tipo_PRSA = 'POP'
            LEFT JOIN {$this->tables["Rg_prsaimg"]} as tb2_lastRG ON tb2_lastRG.ID_PRSA = tb1.ID AND tb2_lastRG.ID_RGPRSA = '$lastID_RGPOP' AND tb2_lastRG.Tipo_PRSA = 'POP'
            INNER JOIN {$this->tables["Empprsa"]} as tb3 ON tb3.ID = tb1.ID_PRSA AND tb3.Tipo_PRSA = 'POP' 
            WHERE tb3.ID_PRSA = '$ID_POP'
			ORDER By ordem");
		return $rs;
    }
    
    public function getTags() {
        $rs = $this->query("
            SELECT * 
            FROM {$this->tables["Rg_tags"]}
            WHERE ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}'
        ");
        $Tags = ["tratativa" => new stdClass(), "inadimplencia" => new stdClass()];
        if ($rs) foreach($rs as $row) {
            if (!isset($Tags[$row["Tipo"]]->{$row["ID_Operadora"]})) $Tags[$row["Tipo"]]->{$row["ID_Operadora"]} = [];
            $Tags[$row["Tipo"]]->{$row["ID_Operadora"]}[] = $row;
        } elseif ($this->thisRelatorioGerencial->Num_Status == "R") {
            $rs = $this->query("
                SELECT * 
                FROM {$this->tables["Rg_tags"]}
                WHERE ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."'
            ");
            if ($rs) foreach($rs as $row) {
                $row["ID"] = null; // para ser adicionado como novo registro, uma vez que este se refere ao relatório regerencial anterior
                if (!isset($Tags[$row["Tipo"]]->{$row["ID_Operadora"]})) $Tags[$row["Tipo"]]->{$row["ID_Operadora"]} = [];
                $Tags[$row["Tipo"]]->{$row["ID_Operadora"]}[] = $row;
            }
        }
        return $Tags;
    }

    public function getOperadorasToTags() {
        $Operadoras = $this->_Operadoras->find("", "
            ID_Operadoras as ID_Operadora,
            Nom_Operadoras as NomeOperadora,
            Num_Status
        ");
        $OperadorasByID = [];
        foreach($Operadoras as $Operadora) {
            $OperadorasByID[$Operadora["ID_Operadora"]] = $Operadora;
        }
        return $OperadorasByID;
    }

    public function getInconformidades() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
        $rs = $this->query("SELECT 
                tb1.ID as ID_Inconformidade,
                tb1.Protocolo as Protocolo_Inconformidade,
                tb1.Descricao as Descricao_Inconformidade,
                tb1.DescricaoAndamento as DescricaoAndamento_Inconformidade,
                tb1.JSONImagemDescricao as JSONImagemDescricao,
                tb1.Tipo as TipoAgente,
                (CASE
                    WHEN tb1.Tipo = 'O' THEN (SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} WHERE ID_Operadoras = tb1.ID_OpePre)
                    WHEN tb1.Tipo = 'P' THEN (SELECT Nom_RazaoSocial FROM {$this->tables["Prestadores"]} WHERE ID_Prestador = tb1.ID_OpePre)
                    WHEN tb1.Tipo = 'E' THEN (SELECT Nom_Empreendimento FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimento = tb1.ID_Empreendimento)
                END) as NomeAgente,
                tb3.ID as ID_RGInconformidade,
                tb3_lastRG.ID as lastID_RGInconformidade,
                IF(tb3.ID, tb3.Descricao, IF(tb3_lastRG.ID, tb3_lastRG.Descricao, tb1.Descricao)) as Descricao_RGInconformidade,
                IF(tb3.ID, tb3.Historico, IF(tb3_lastRG.ID, tb3_lastRG.Historico, tb1.DescricaoAndamento)) as Historico_RGInconformidade,
                IF(tb3.ID, tb3.ordem, tb3_lastRG.ordem) as ordem,
                tb1.DataRelato as DataRelato_Inconformidade,
                tb1.DataIncidente as DataIncidente_Inconformidade,
                tb1.Num_Status as Num_Status_Inconformidade
            FROM {$this->tables["Inconformidade"]} as tb1 
            LEFT JOIN {$this->tables["Rg_inconformidade"]} as tb3 ON tb3.ID_Inconformidade = tb1.ID AND tb3.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}' 
            LEFT JOIN {$this->tables["Rg_inconformidade"]} as tb3_lastRG ON tb3_lastRG.ID_Inconformidade = tb1.ID AND tb3_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."' 
            WHERE tb1.ID_Empreendimento = $ID_Empreendimento AND tb1.Num_Ativo = 'S'
            ORDER BY ordem ASC");
        if ($rs) {
            foreach($rs as $i => $row){
                $rs[$i]["JSONImagemDescricao"] = json_decode($row["JSONImagemDescricao"], true);
                $rs[$i]["IMG"] = $this->getInconformidadeImg(intval($row["ID_Inconformidade"]), intval($row["ID_RGInconformidade"]), intval($row["lastID_RGInconformidade"]));
                if ($rs[$i]["IMG"] && $rs[$i]["JSONImagemDescricao"]) {
                    foreach($rs[$i]["IMG"] as $j => $rowIMG){ 
                        $rs[$i]["IMG"][$j]["Descricao_InconformidadeIMG"] = $rs[$i]["JSONImagemDescricao"][
                            $rowIMG["ID_InconformidadeIMG"]
                        ] ?? null;
                        if (!$rowIMG["ID_RGInconformidadeIMG"] && !$rowIMG["lastID_RGInconformidadeIMG"]) {
                            $rs[$i]["IMG"][$j]["Descricao_RGInconformidadeIMG"] = $rs[$i]["IMG"][$j]["Descricao_InconformidadeIMG"];
                        }
                    }
                }
            }
        }
        return $rs;
    }

    public function getInconformidadeImg(int $ID_Inconformidade, int $ID_RGInconformidade, int $lastID_RGInconformidade) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_InconformidadeIMG,
				tb2.ID as ID_RGInconformidadeIMG,
                tb2_lastRG.ID as lastID_RGInconformidadeIMG,
                IF(tb2.ID, tb2.Descricao, tb2_lastRG.Descricao) as Descricao_RGInconformidadeIMG,
				tb1.File_Name as File_Name,
                IF(tb2.ID, tb2.ordem, tb2_lastRG.ordem) as ordem
			FROM tb_filesinconformidades as tb1 
			LEFT JOIN {$this->tables["Rg_inconformidadeimg"]} as tb2 ON tb2.ID_RGInconformidade = '$ID_RGInconformidade' AND tb2.ID_Filesinconformidades = tb1.ID
            LEFT JOIN {$this->tables["Rg_inconformidadeimg"]} as tb2_lastRG ON tb2_lastRG.ID_RGInconformidade = '$lastID_RGInconformidade' AND tb2_lastRG.ID_Filesinconformidades = tb1.ID
            WHERE tb1.ID_Inconformidades = $ID_Inconformidade
			ORDER By ordem");
		//var_dump($this->DbError, $this->strQuery);
		return $rs;
    }

    public function getAbordagemOperadoras() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
        // POP equipamento
        $POP = $this->query("
            SELECT 
                tb1.ID as ID_Equipamento,
                tb1.Nom_Rack as Nom_Equipamento,
                tb1.InicioVigencia as InicioVigencia,
				tb1.FimVigencia as FimVigencia,
                tb1.Valor_Contrato as Valor_Contrato,
                tb1.Num_Contrato as Num_Contrato,
                tb2.ID as ID_ParentEquipamento,
                tb2.Nom_POP as Nom_ParentEquipamento,
                tb1.ID_Operadora as ID_Operadoras,
                (CASE
                    WHEN tb1.ID_Operadora = '-1' THEN (SELECT Nom_Empreendimento FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimento = '$ID_Empreendimento') 
                    ELSE (SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} as tb3 WHERE tb3.ID_Operadoras = tb1.ID_Operadora)
                END) as NomeOperadora,
                IF(tb4.ID, tb4.Observacoes, tb4_lastRG.Observacoes) as Observacoes,
                IF(tb4.ID, tb4.InicioPagamento, tb4_lastRG.InicioPagamento) as InicioPagamento,
                IF(tb4.ID, tb4.Status, tb4_lastRG.Status) as Status,
                tb4_lastRG.Valor_Contrato as Valor_Contrato_Anterior,
				tb4.ID as ID_RGPSA,
                'POP' as TipoEquipamento
            FROM {$this->tables["Racks"]} as tb1
            INNER JOIN {$this->tables["Pop"]} as tb2 ON tb2.ID = tb1.ID_POP
            LEFT JOIN {$this->tables["Rg_abordagemoperadoras"]} as tb4 ON tb4.ID_Equipamento = tb1.ID AND
                tb4.TipoEquipamento = 'POP' AND tb4.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}' 
            LEFT JOIN {$this->tables["Rg_abordagemoperadoras"]} as tb4_lastRG ON tb4_lastRG.ID_Equipamento = tb1.ID AND
                tb4_lastRG.TipoEquipamento = 'POP' AND tb4_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."' 
            WHERE tb2.ID_Empreendimento = $ID_Empreendimento
            HAVING NomeOperadora != '' 
            ORDER BY NomeOperadora
        ");

        // SHAFT equipamento
        $SHAFT = $this->query("
            SELECT 
                tb1.ID as ID_Equipamento,
                tb1.Nom_Nome as Nom_Equipamento,
                tb1.InicioVigencia as InicioVigencia,
				tb1.FimVigencia as FimVigencia,
                tb1.Valor_Contrato as Valor_Contrato,
                tb1.Num_Contrato as Num_Contrato,
                tb2.ID as ID_ParentEquipamento,
                tb2.Nom_Nome as Nom_ParentEquipamento,
                tb1.ID_Operadora as ID_Operadoras,
                (CASE
                    WHEN tb1.ID_Operadora = '-1' THEN (SELECT Nom_Empreendimento FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimento = '$ID_Empreendimento') 
                    ELSE (SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} as tb3 WHERE tb3.ID_Operadoras = tb1.ID_Operadora)
                END) as NomeOperadora,
                IF(tb4.ID, tb4.Observacoes, tb4_lastRG.Observacoes) as Observacoes,
                IF(tb4.ID, tb4.InicioPagamento, tb4_lastRG.InicioPagamento) as InicioPagamento,
                IF(tb4.ID, tb4.Status, tb4_lastRG.Status) as Status,
                tb4_lastRG.Valor_Contrato as Valor_Contrato_Anterior,
				tb4.ID as ID_RGPSA,
                'SHAFT' as TipoEquipamento
            FROM {$this->tables["Shaftsposicoes"]} as tb1
            INNER JOIN {$this->tables["Shafts"]} as tb2 ON tb2.ID = tb1.ID_Shafts
            LEFT JOIN {$this->tables["Rg_abordagemoperadoras"]} as tb4 ON tb4.ID_Equipamento = tb1.ID AND
                tb4.TipoEquipamento = 'SHAFT' AND tb4.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}' 
            LEFT JOIN {$this->tables["Rg_abordagemoperadoras"]} as tb4_lastRG ON tb4_lastRG.ID_Equipamento = tb1.ID AND
                tb4_lastRG.TipoEquipamento = 'SHAFT' AND tb4_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."' 
            WHERE tb2.ID_Empreendimento = $ID_Empreendimento 
            HAVING NomeOperadora != '' 
            ORDER BY NomeOperadora
        ");

        // ANTENARIO equipamento
        $ANTENARIO = $this->query("
            SELECT 
                tb1.ID as ID_Equipamento,
                tb1.Nom_Nome as Nom_Equipamento,
                tb1.InicioVigencia as InicioVigencia,
				tb1.FimVigencia as FimVigencia,
                tb1.Valor_Contrato as Valor_Contrato,
                tb1.Num_Contrato as Num_Contrato,
                tb2.ID as ID_ParentEquipamento,
                tb2.Nom_Nome as Nom_ParentEquipamento, 
                tb1.ID_Operadora as ID_Operadoras,
                (CASE
                    WHEN tb1.ID_Operadora = '-1' THEN (SELECT Nom_Empreendimento FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimento = '$ID_Empreendimento') 
                    ELSE (SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} as tb3 WHERE tb3.ID_Operadoras = tb1.ID_Operadora)
                END) as NomeOperadora,
                IF(tb4.ID, tb4.Observacoes, tb4_lastRG.Observacoes) as Observacoes,
                IF(tb4.ID, tb4.InicioPagamento, tb4_lastRG.InicioPagamento) as InicioPagamento,
                IF(tb4.ID, tb4.Status, tb4_lastRG.Status) as Status,
                tb4_lastRG.Valor_Contrato as Valor_Contrato_Anterior,
				tb4.ID as ID_RGPSA,
                'ANTENARIO' as TipoEquipamento
            FROM {$this->tables["Antenariosposicoes"]} as tb1
            INNER JOIN {$this->tables["Antenarios"]} as tb2 ON tb2.ID = tb1.ID_Antenarios
            LEFT JOIN {$this->tables["Rg_abordagemoperadoras"]} as tb4 ON tb4.ID_Equipamento = tb1.ID AND
                tb4.TipoEquipamento = 'ANTENARIO' AND tb4.ID_Relatoriogerencial = '{$this->thisRelatorioGerencial->ID}' 
            LEFT JOIN {$this->tables["Rg_abordagemoperadoras"]} as tb4_lastRG ON tb4_lastRG.ID_Equipamento = tb1.ID AND
                tb4_lastRG.TipoEquipamento = 'ANTENARIO' AND tb4_lastRG.ID_Relatoriogerencial = '".($this->lastRelatorioGerencial->ID ?? null)."' 
            WHERE tb2.ID_Empreendimento = $ID_Empreendimento
            HAVING NomeOperadora != '' 
            ORDER BY NomeOperadora
        ");

        $PSA_Operadora = [];
        $data = [
            "PSA" => [], // POP/SHAFT/ANTENARIO por Operadora
            "totalArrecadado" => 0
        ];

        if ($POP) foreach ($POP as $i => $row) {
            if (!isset($PSA_Operadora[$row["ID_Operadoras"]])) $PSA_Operadora[$row["ID_Operadoras"]] = [];
            $PSA_Operadora[$row["ID_Operadoras"]][] = $row;
            $data["totalArrecadado"] += floatval($row["Valor_Contrato"]);
        }

        if ($SHAFT) foreach ($SHAFT as $i => $row) {
            if (!isset($PSA_Operadora[$row["ID_Operadoras"]])) $PSA_Operadora[$row["ID_Operadoras"]] = [];
            $PSA_Operadora[$row["ID_Operadoras"]][] = $row;
            $data["totalArrecadado"] += floatval($row["Valor_Contrato"]);
        }

        if ($ANTENARIO) foreach ($ANTENARIO as $i => $row) {
            if (!isset($PSA_Operadora[$row["ID_Operadoras"]])) $PSA_Operadora[$row["ID_Operadoras"]] = [];
            $PSA_Operadora[$row["ID_Operadoras"]][] = $row;
            $data["totalArrecadado"] += floatval($row["Valor_Contrato"]);
        }
        foreach($PSA_Operadora as $Operadora) {
			foreach($Operadora as $PSA) {
            	$data["PSA"][] = $PSA;
			}
        }
        
        return $data;
    }

    public function ctrProjEspeciais() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
        $DataInicioVigencia = $this->thisRelatorioGerencial->DataInicioVigencia;
        $DataFimVigencia = $this->thisRelatorioGerencial->DataFimVigencia;

        $rs = $this->query("
                SELECT 
                tb1.ID_projeto as ID_Projeto,
                tb1.ID_Condominos as ID_Condomino,
                tb1.ID_Operadora as ID_Operadora,
                tb1.ID_Prestadora as ID_Prestadora,
                tb1.ProtocoloHex as ProtocoloHex,
                tb2.Data as DataAprovacao,
                tb3.Nom_ProjetoTipo as Nom_ProjetoTipo,
                tb4.Nom_Nome as Nom_Condomino,
                tb5.Nom_Operadoras as Nom_Operadora,
                tb6.Nom_RazaoSocial as Nom_Prestadora
            FROM tb_projetos as tb1
            INNER JOIN tb_projetoanalisestatus as tb2 ON tb2.CodeStatus = 'projeto_aprovado' AND 
                Data BETWEEN '$DataInicioVigencia' AND '$DataFimVigencia' AND 
                tb2.ID_Projeto = tb1.ID_projeto 
            INNER JOIN  tb_projetostipos as tb3 ON tb3.ID_ProjetoTipo = tb1.ID_TipoProjeto
            LEFT JOIN tb_condominos as tb4 ON tb4.ID_Condomino = tb1.ID_Condominos
            LEFT JOIN tb_operadoras as tb5 ON tb5.ID_Operadoras = tb1.ID_Operadora
            LEFT JOIN tb_prestadores as tb6 ON tb6.ID_Prestador = tb1.ID_Prestadora
            WHERE tb1.ID_Empreendimento = $ID_Empreendimento
            GROUP BY tb1.ID_projeto
            ORDER BY tb2.Data DESC
        ");

        return $rs;
    }

    public function projComparativoAnual() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
        $DataInicio = date('Y-m-01', strtotime("-11 month"));
        $DataFim = date('Y-m-d', strtotime("last day of this month"));

        $rs = $this->query("
                SELECT 
                tb1.ID_projeto as ID_Projeto,
                tb2.Data as DataAprovacao
            FROM tb_projetos as tb1
            INNER JOIN tb_projetoanalisestatus as tb2 ON tb2.CodeStatus = 'projeto_aprovado' AND 
                Data BETWEEN '$DataInicio' AND '$DataFim' AND 
                tb2.ID_Projeto = tb1.ID_projeto 
            WHERE tb1.ID_Empreendimento = $ID_Empreendimento
            GROUP BY tb1.ID_projeto
            ORDER BY tb2.Data DESC
        ");

        return $rs;
    }

    public function agendTecnicosComparativoAnual() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
        $DataInicio = date('Y-m-01', strtotime("-11 month"));
        $DataFim = date('Y-m-d', strtotime("last day of this month"));

        $rs = $this->query("
            SELECT 
                tb1.ID as ID_SAE,
                tb1.Data_Fechamento as Data_Fechamento
            FROM tb_sae as tb1
            WHERE tb1.Num_Status AND 
                tb1.Data_Fechamento BETWEEN '$DataInicio' AND '$DataFim' AND
                tb1.ID_Empreendimento = '$ID_Empreendimento'
        ");
        return $rs;
    }

    public function ctrAgendTecnicos() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;
        $DataInicioVigencia = $this->thisRelatorioGerencial->DataInicioVigencia;
        $DataFimVigencia = $this->thisRelatorioGerencial->DataFimVigencia;

        $rs = $this->query("
            SELECT 
                tb1.ID as ID_SAE,
                tb1.Data_Fim as Data_Fim,
                tb1.Data_Inicio as Data_Inicio,
                tb1.Hora_Fim as Hora_Fim,
                tb1.Hora_Inicio as Hora_Inicio,
                tb1.Num_SAE as Num_SAE,
                tb1.Emergencial as Emergencial,
                tb1.InstalacaoAntena as InstalacaoAntena,
                tb1.Num_Status as Num_Status,
				tb1.Data_Fechamento as Data_Fechamento,
                tb2.Nom_SAE as TipoSAE,
                tb3.ID_Operadoras as ID_Operadora,
                tb3.Nom_Operadoras as Nom_Operadora,
                tb4.ID_Prestador as ID_Prestadora,
                tb4.Nom_RazaoSocial as Nom_Prestadora,
                tb5.ID_Condomino as ID_Condomino,
                IFNULL(tb5.Nom_Nome,'GLOBALBLUE') as Nom_Condomino
            FROM tb_sae as tb1
            INNER JOIN tb_tipossae as tb2 ON tb2.ID = tb1.ID_TipoSAE
            LEFT JOIN tb_operadoras as tb3 ON tb3.ID_Operadoras = tb1.ID_Operadora
            LEFT JOIN tb_prestadores as tb4 ON tb4.ID_Prestador = tb1.ID_Prestador
            LEFT JOIN tb_condominos as tb5 ON tb5.ID_Condomino = tb1.ID_Condomino
            WHERE tb1.Num_Status AND 
                tb1.Data_Fechamento BETWEEN '$DataInicioVigencia' AND '$DataFimVigencia' AND
                tb1.ID_Empreendimento = '$ID_Empreendimento'
        ");
        return $rs;
    }

    public function opePreBloqueadas() {
        $ID_Empreendimento = $this->thisRelatorioGerencial->ID_Empreendimento;

        $rs = $this->query("
            SELECT 
                tb1.ID as ID_Bloqueio,
                tb1.Desc as Descricao,
                tb1.ID_OpePre as ID_OpePre,
                tb1.Tipo as Tipo,
                (CASE 
                    WHEN tb1.Tipo = 'O' THEN (SELECT tb_operadoras.Nom_Operadoras FROM tb_operadoras WHERE tb_operadoras.ID_Operadoras = tb1.ID_OpePre)
                    WHEN tb1.Tipo = 'P' THEN (SELECT tb_prestadores.Nom_RazaoSocial FROM tb_prestadores WHERE tb_prestadores.ID_Prestador = tb1.ID_OpePre)
                    WHEN tb1.Tipo = 'TO' THEN (SELECT CONCAT(tb_operadoras.Nom_Operadoras, ' - ', tb_tecnicos.Nom_Tecnico, ' ', tb_tecnicos.Nom_Sobrenome) FROM tb_tecnicos INNER JOIN tb_operadoras ON tb_operadoras.ID_Operadoras = tb_tecnicos.ID_OpePre WHERE tb_tecnicos.ID = tb1.ID_Tecnico)
                    WHEN tb1.Tipo = 'TP' THEN (SELECT CONCAT(tb_prestadores.Nom_RazaoSocial, ' - ', tb_tecnicos.Nom_Tecnico, ' ', tb_tecnicos.Nom_Sobrenome) FROM tb_tecnicos INNER JOIN tb_prestadores ON tb_prestadores.ID_Prestador = tb_tecnicos.ID_OpePre WHERE tb_tecnicos.ID = tb1.ID_Tecnico)
                END) as Nom_OpePre,
                tb2.ID as ID_Inconformidade,
                tb2.Protocolo as Protocolo,
                tb1.Data as DataBloqueio
            FROM tb_bloqueioempreendimento as tb1
            LEFT JOIN tb_inconformidade as tb2 ON tb2.ID = tb1.ID_Inconformidade
            WHERE tb1.ID_Empreendimento = '$ID_Empreendimento' 
            ORDER BY tb1.Data
        ");

        return $rs;
    }
	
	public function Logs($dd = []) {
		$dd["ID_Usuario"] = $this->session->get("ID_Usuario") ?: null;
		$dd["Nom_Usuario"] = $this->session->get("Nom_Nome") ?: null;
		$dd["ID_RG"] = $this->thisRelatorioGerencial->ID;
		$dd["Funcao"] = $dd["Funcao"] ?? null;
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$dd["Data"] = $now->format("Y-m-d H:i:s.u");
		$dd["IP"] = $_SERVER['REMOTE_ADDR'];
		$this->_Logs_relatoriogerencial->create($dd);
	}
	
	public function getLogs() {
		$ID_RG = $this->thisRelatorioGerencial->ID;
		$rs = $this->_Logs_relatoriogerencial->find("ID_RG = '$ID_RG' ORDER BY Data DESC");
		return $rs;
	}
}