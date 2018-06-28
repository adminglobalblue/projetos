<?php

// Models
if (!class_exists("Model")) include __DIR__."/../models/Model.php";

// Models
if (!class_exists("Empreendimentos")) include __DIR__."/../models/Empreendimentos.php";
if (!class_exists("Ri_inconformidade")) include __DIR__."/../models/Ri_inconformidades.php";
if (!class_exists("Ri_inconformidadeimg")) include __DIR__."/../models/Ri_inconformidadesimg.php";
if (!class_exists("Logs_relatorioinconformidades")) include __DIR__."/../models/Logs_relatorioinconformidades.php";
if (!class_exists("Ri_agentes")) include __DIR__."/../models/Ri_agentes.php";

class RelatorioInconformidades extends Model {
	public $thisRI;
	
    public $_Rg_antenario;
    public $_Ri_inconformidades;
    public $_Ri_inconformidadesimg;
    public $_Ri_agentes;
	public $_Logs_relatorioinconformidades;
    public $_Empreendimentos;
    public $AgenteList;
    public $AgenteDest;
    
    public $sc;
	
    public function __construct($sc) {
        parent::__construct($sc);
        $this->sc = $sc;
        $this->_Ri_inconformidades = new Ri_inconformidades($sc);
        $this->_Ri_inconformidadesimg = new Ri_inconformidadesimg($sc);
        $this->_Empreendimentos = new Empreendimentos($sc);
        $this->_Ri_agentes = new Ri_agentes($sc);
		$this->_Logs_relatorioinconformidades = new Logs_relatorioinconformidades($this);
    }

    
    public function createDraft(array $data) {
		$RI_ID_Empreendimento = $data["RI_ID_Empreendimento"] ?? null;
        $RI_AgentesList = $data["RI_AgentesList"] ?? null;
        $RI_AgenteTipo = $data["RI_AgenteTipo"] ?? null; // agente target
        $RI_AgenteID = $data["RI_AgenteID"] ?? null; // agente target
		
		$ID_RI = $this->create([
            "ID_Empreendimento" => $RI_ID_Empreendimento,
            "AgenteTipo" => $RI_AgenteTipo,
            "AgenteID" => $RI_AgenteID,
            "Criado_em" => date('Y-m-d H:i:s'),
            "Num_Status" => "R", // Rascunho
            "Num_Ativo" => "S", // Ativo Sim
        ]);

        if (!$ID_RI) return null;
        
        foreach($RI_AgentesList["O"] as $Agente) {
            $this->_Ri_agentes->create([
                "Tipo" => "O",
                "ID_Agente" => $Agente,
                "Criado_em" => date("Y-m-d H:i:s"),
                "ID_RI" => $ID_RI
            ]);
        }
        foreach($RI_AgentesList["P"] as $Agente) {
            $this->_Ri_agentes->create([
                "Tipo" => "P",
                "ID_Agente" => $Agente,
                "Criado_em" => date("Y-m-d H:i:s"),
                "ID_RI" => $ID_RI
            ]);
        }

        return $ID_RI;
	}

    public function setRI($RI) {
        if (!$RI) return;
        $this->thisRI = $RI;
        $this->AgenteList = $this->_Ri_agentes->find("ID_RI = '".$this->thisRI->ID."'");
        if (!$this->AgenteList) return;

        foreach($this->AgenteList as $i => $Agente) {
            if ($Agente["Tipo"] == "E") {
               $this->AgenteList[$i]["data"] = $this->getEmpreendimento(); // Nom_Empreendimento
            } elseif ($Agente["Tipo"] == "O") {
                $rs = $this->query("SELECT * FROM {$this->tables["Operadoras"]} WHERE ID_Operadoras = '".$Agente["ID_Agente"]."'"); // Nom_Operadoras
               $this->AgenteList[$i]["data"] = $rs[0] ?? null;
            } elseif ($Agente["Tipo"] == "P") {
                $rs = $this->query("SELECT * FROM {$this->tables["Prestadores"]} WHERE ID_Prestador = '".$Agente["ID_Agente"]."'"); // Nom_RazaoSocial
               $this->AgenteList[$i]["data"] = $rs[0] ?? null;
            }
        }

        if ($this->thisRI->AgenteTipo == "E") {
            $this->AgenteDest = $this->getEmpreendimento()["Nom_Empreendimento"];
        } elseif ($this->thisRI->AgenteTipo == "O") {
            $rs = $this->query("SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} WHERE ID_Operadoras = '".$this->thisRI->AgenteID."'");
            $this->AgenteDest = $rs[0]["Nom_Operadoras"] ?? null;
        } elseif ($this->thisRI->AgenteTipo == "P") {
            $rs = $this->query("SELECT Nom_RazaoSocial FROM {$this->tables["Prestadores"]} WHERE ID_Prestador = '".$this->thisRI->AgenteID."'");
            $this->AgenteDest = $rs[0]["Nom_RazaoSocial"] ?? null;
        }
		
    }
    
    public function getEmpreendimento() {
		$ID_Empreendimento = $this->thisRI->ID_Empreendimento;
		
		$rs = $this->_Empreendimentos->getById(intval($ID_Empreendimento));
		return $rs[0] ?? null;
    }
    
    public function delete() {
        $this->save("ID = ".$this->thisRI, [
            "Num_Ativo" => "R"
        ]);
    }

    public function getInconformidades() {
        $dataInconformidade = [];
        foreach($this->AgenteList as $Agente) {
            if (!isset($dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]])) $dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]] = [];
            $dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["list"] = $this->getDataInconformidades($Agente["ID_Agente"], $Agente["Tipo"]);
			$dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["Tipo"] = $Agente["Tipo"];
			$dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["ID_Agente"] = $Agente["ID_Agente"];
			$dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["data"] = $Agente["data"];
			if ($Agente["Tipo"] == "E") {
               $dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["data"] = ["ID" => $Agente["ID_Agente"], "Agente" => $Agente["data"]["Nom_Empreendimento"]];  // Nom_Empreendimento
            } elseif ($Agente["Tipo"] == "O") {
                $dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["data"] = ["ID" => $Agente["ID_Agente"], "Agente" => $Agente["data"]["Nom_Operadoras"]];// Nom_Operadoras
            } elseif ($Agente["Tipo"] == "P") {
                $dataInconformidade[$Agente["Tipo"].$Agente["ID_Agente"]]["data"] = ["ID" => $Agente["ID_Agente"], "Agente" => $Agente["data"]["Nom_RazaoSocial"]];// Nom_RazaoSocial
            }
        }
        return $dataInconformidade;
    }

    public function getDataInconformidades($AgenteID, string $AgenteTipo) {
        $ID_Empreendimento = $this->thisRI->ID_Empreendimento;
        $rs = $this->query("SELECT 
                tb1.ID as ID_Inconformidade,
                tb1.Protocolo as Protocolo_Inconformidades,
                tb1.Descricao as Descricao_Inconformidades,
                tb1.DescricaoAndamento as DescricaoAndamento_Inconformidades,
                tb1.JSONImagemDescricao as JSONImagemDescricao,
                tb1.Tipo as TipoAgente,
                (CASE
                    WHEN tb1.Tipo = 'O' THEN (SELECT Nom_Operadoras FROM {$this->tables["Operadoras"]} WHERE ID_Operadoras = tb1.ID_OpePre)
                    WHEN tb1.Tipo = 'P' THEN (SELECT Nom_RazaoSocial FROM {$this->tables["Prestadores"]} WHERE ID_Prestador = tb1.ID_OpePre)
                    WHEN tb1.Tipo = 'E' THEN (SELECT Nom_Empreendimento FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimento = tb1.ID_Empreendimento)
                END) as NomeAgente,
                tb3.ID as ID_RIInconformidades,
                IF(tb3.ID, tb3.Descricao, tb1.Descricao) as Descricao_RIInconformidades,
                IF(tb3.ID, tb3.Historico, tb1.DescricaoAndamento) as Historico_RIInconformidades,                
                tb3.ordem as ordem,
                IF(tb3.ID, tb3.display, 1) as display,
                tb1.DataRelato as DataRelato_Inconformidade,
                tb1.DataIncidente as DataIncidente_Inconformidade,
                tb1.Num_Status as Num_Status_Inconformidade
            FROM {$this->tables["Inconformidade"]} as tb1 
            LEFT JOIN {$this->tables["Ri_inconformidades"]} as tb3 ON tb3.ID_Inconformidades = tb1.ID AND tb3.ID_RI = '{$this->thisRI->ID}' 
            WHERE tb1.ID_Empreendimento = $ID_Empreendimento AND tb1.Num_Ativo = 'S' AND 
				".(
					$AgenteTipo == "E" ? "'$AgenteTipo' = tb1.Tipo AND '0' = tb1.ID_OpePre" : 
					($AgenteTipo == "P" ? "'$AgenteTipo' = tb1.Tipo AND '$AgenteID' = tb1.ID_OpePre" :
					($AgenteTipo == "O" ? "'$AgenteTipo' = tb1.Tipo AND '$AgenteID' = tb1.ID_OpePre" : "false"))
				)."
            ORDER BY ordem ASC");
        if ($rs) {
            foreach($rs as $i => $row){
                $rs[$i]["JSONImagemDescricao"] = json_decode($row["JSONImagemDescricao"], true);
                $rs[$i]["IMG"] = $this->getInconformidadeImg(intval($row["ID_Inconformidade"]), intval($row["ID_RIInconformidades"]));
				$rs[$i]["display"] = intval($rs[$i]["display"]);
                if ($rs[$i]["IMG"] && $rs[$i]["JSONImagemDescricao"]) {
                    foreach($rs[$i]["IMG"] as $j => $rowIMG){ 
						$rs[$i]["IMG"][$j]["display"] = intval($rs[$i]["IMG"][$j]["display"]);
                        $rs[$i]["IMG"][$j]["Descricao_InconformidadesIMG"] = $rs[$i]["JSONImagemDescricao"][
                            $rs[$i]["IMG"][$j]["ID_InconformidadesIMG"]
                        ] ?? null;
                        if (!$rs[$i]["IMG"][$j]["ID_RIInconformidadesIMG"]) {
                            $rs[$i]["IMG"][$j]["Descricao_RIInconformidadesIMG"] = $rs[$i]["JSONImagemDescricao"][
                                $rs[$i]["IMG"][$j]["ID_InconformidadesIMG"]
                            ] ?? null;
                        }
                    }
                }
            }
        }
        return $rs;
    }

    public function getInconformidadeImg(int $ID_Inconformidade, int $ID_RIInconformidades) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_InconformidadesIMG,
				tb2.ID as ID_RIInconformidadesIMG,
				tb2.Descricao as Descricao_RIInconformidadesIMG,
				tb1.File_Name as File_Name,
                tb2.ordem as ordem,
                IF(tb2.ID, tb2.display, 1) as display
			FROM tb_filesinconformidades as tb1 
			LEFT JOIN {$this->tables["Ri_inconformidadesimg"]} as tb2 ON tb2.ID_RIInconformidades = '$ID_RIInconformidades' AND tb2.ID_Filesinconformidades = tb1.ID
            WHERE tb1.ID_Inconformidades = $ID_Inconformidade
			ORDER By ordem");
		//var_dump($this->DbError, $this->strQuery);
		return $rs;
    }
    
	
	public function Logs($dd = []) {
		$dd["ID_Usuario"] = $this->session->get("ID_Usuario") ?: null;
		$dd["Nom_Usuario"] = $this->session->get("Nom_Nome") ?: null;
		$dd["ID_RI"] = $this->thisRI->ID;
		$dd["Funcao"] = $dd["Funcao"] ?? null;
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$dd["Data"] = $now->format("Y-m-d H:i:s.u");
		$dd["IP"] = $_SERVER['REMOTE_ADDR'];
		$this->_Logs_relatorioinconformidades->create($dd);
	}
	
	public function getLogs() {
		$ID_RI = $this->thisRI->ID;
		$rs = $this->_Logs_relatorioinconformidades->find("ID_RI = '$ID_RI' ORDER BY Data DESC");
		return $rs;
	}
}