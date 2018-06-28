<?php

if (!class_exists("Validacao")) include dirname(__FILE__)."/../Validacao/Validacao.php";
	
class Model {
    // Tables
    public $tables = [
        "Logs" => "tb_logs",
		"Operadoras" => "tb_operadoras",
		"Prestadores" => "tb_prestadores",
		"Empreendimentos" => "tb_empreendimentos",
		"Perfil" => "tb_perfil",
		"Permissoes" => "tb_permissoes",
		"Tecnicos" => "tb_tecnicos",
		"Contatos" => "tb_contatos",
		"Infoprestadores" => "tb_infoprestadores",
		"Condominos" => "tb_condominos",
		"Ocupacao" => "tb_ocupacao",
		"Usuarios" => "tb_usuarios",
		"Agenda" => "tb_agenda",
		"Conjunto" => "tb_conjunto",
		"Andar" => "tb_andar",
		"Torre" => "tb_torre",
		"Pop" => "tb_pop",
		"Racks" => "tb_racks",
		"Shafts" => "tb_shafts",
		"Shaftsposicoes" => "tb_shaftsposicoes",
		"Antenarios" => "tb_antenarios",
		"Antenariosposicoes" => "tb_antenariosposicoes",
		"Bloqueioempreendimento" => "tb_bloqueioempreendimento",
		"Inconformidade" => "tb_inconformidade",
		"Emppoe" => "tb_emppoe",
		"Empreendimentoshorarios" => "tb_empreendimentoshorarios",
		"Empreendimentovalores" => "tb_empreendimentovalores",
		"Pas" => "tb_pas",
		"Pasitens" => "tb_pasitens",
		"Sae" => "tb_sae",
		"Tecsae" => "tb_tecsae",
		"Saetecgb" => "tb_saetecgb",
		"Projetos" => "tb_projetos",
		"Projetoitensanalise" => "tb_projetoitensanalise",
		"Picabecalhodoc" => "tb_picabecalhodoc",
		"Piarquivos" => "tb_piarquivos",
		"PisolicitacaoAutorizacaoVistoria" => "tb_pisolicitacaoautorizacaovistoria",
		"PilaudoVistoria" => "tb_pilaudovistoria",
		"Pideclaracaoresponsabilidadetecnica" => "tb_pideclaracaoresponsabilidadetecnica",
		"Pisaeprojeto" => "tb_pisaeprojeto",
		"Piartprojeto" => "tb_piartprojeto",
		"Pimemorialdescritivotecnico" => "tb_pimemorialdescritivotecnico",
		"Pimemorialdescritivotecnico_contatos" => "tb_pimemorialdescritivotecnico_contatos",
		"Pimemorialdescritivotecnico_secaodoc" => "tb_pimemorialdescritivotecnico_secaodoc",
		"Pimemorialdescritivotecnico_materiais" => "tb_pimemorialdescritivotecnico_materiais",
		"Pilayoutdeencaminhamentoplantabaixa" => "tb_pilayoutdeencaminhamentoplantabaixa",
		"Pirelatoriofotografico" => "tb_pirelatoriofotografico",
		"Pilaudoradiometrico" => "tb_pilaudoradiometrico",
		"Piseguroresponsabilidadecivil" => "tb_piseguroresponsabilidadecivil",
		"Itens" => "tb_itens",
		"Projetostipos" => "tb_projetostipos",
		"Empprsa" => "tb_empprsa",
		"Filesempprsa" => "tb_filesempprsa",
		"Config" => "tb_config",
		"Npt" => "tb_npt",
		"Os" => "tb_os",
		"Osarquivos" => "tb_osarquivos",
		"Excecoes" => "tb_pasexcecoes",
		"Feriados" => "tb_feriados",
		"Nferiados" => "tb_nferiados",
		"Rar" => "tb_rar",
		"Raritens" => "tb_raritens",
		"Departamentos" => "tb_departamentos",
		"Termodeuso" => "tb_termodeuso",
		"Notificacoes" => "tb_notificacoes",
		"Lastmille" => "tb_lastmille",
		"Empreendimentosadmin" => "tb_empreendimentosadmin",
		"Empreendimentoshorarios" => "tb_empreendimentoshorarios",
		"Helpercategorias" => "tb_helpercategorias",
		"Helperartigos" => "tb_helperartigos",
		"Pasarquivos" => "tb_pasarquivos",
		"Projetostipos" => "tb_projetostipos",
		"Tecsae" => "tb_tecsae",
		"Saetecgb" => "tb_saetecgb",
		"Agenda" => "tb_agenda",
		"Rg_poe" => "tb_rg_poe",
		"Rg_prsaimg" => "tb_rg_prsaimg",
		"Rg_pop" => "tb_rg_pop",
		"Rg_antenario" => "tb_rg_antenario",
		"Rg_inconformidade" => "tb_rg_inconformidade",
		"Rg_inconformidadeimg" => "tb_rg_inconformidadeimg",
		"Rg_racks" => "tb_rg_racks",
		"Tags" => "tb_tags",
		"RelatorioGerencial" => "tb_relatoriogerencial",
		"Rg_abordagemoperadoras" => "tb_rg_abordagemoperadoras",
		"Rg_tags" => "tb_rg_tags",
		"RelatorioInconformidades" => "tb_relatorioinconformidades",
		"Ri_inconformidades" => "tb_ri_inconformidades",
		"Ri_inconformidadesimg" => "tb_ri_inconformidadesimg",
		"Ri_agentes" => "tb_ri_agentes",
		"Contatos" => "tb_contatos",
		"Logs_relatorioinconformidades" => "tb_logs_relatorioinconformidades",
		"Logs_relatoriogerencial" => "tb_logs_relatoriogerencial",
		"Bloqueioempreendimento" => "tb_bloqueioempreendimento",
		"Sessions" => "tb_sessions",
		"Filesrelatoriovistorias" => "tb_filesrelatoriovistorias",
		"Rejeicoes" => "tb_rejeicoes"
    ];
	
	public $Db;
	public $sc;
	public $session;
	public $strQuery = [];
	public $DbError = [];
	public $rs = [];
	public $dataSave;
	public $dataCreate;
	public $app;
	public $appState;
	public $ok;
	public $table;
	public $language;

	private $_Validacao;
	
	public function __construct($sc) {
		date_default_timezone_set('America/Sao_Paulo');
		
		$this->_Validacao = new Validacao($sc);
		$this->_Validacao->_do();
		
		$this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
        $this->getManageSession();
		$this->appState = isset($this->sc->nmgp_opcao) ? $this->sc->nmgp_opcao : "";
		$this->app = isset($this->sc->Ini->nm_cod_apl) ? $this->sc->Ini->nm_cod_apl : "";
		$this->language = $this->session->get("language");
	}
	
	public function query($query) {
		$this->strQuery[] = $query;
		$result = null;
		if ($rs = $this->Db->Execute($query)) {
			if (is_object($rs) && get_class($rs) == "ADORecordSet_pdo") {
				$i = 0;
				while (!$rs->EOF){
					foreach($rs->fields as $key => $fields) {
						if (!is_numeric($key)) {
							$nRs[$i][$key] = $fields;
						}
					}
				   $rs->MoveNext(); $i++;
				}
				$rs->Close();
				$result = isset($nRs) ? $nRs : [];
			}
			$this->DbError[] = null;
			$this->ok = true;
		} elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1) {
			$this->DbError[] = $this->Db->ErrorMsg();	
			$this->ok = false;
		}
		$this->rs[] = $result;
		return $result;
	}

	public function count() {
		return count(end($this->rs));
	}
	
	public function last() {
		return end($this->rs);
	}
	
    public function getAll() {
        return $this->query("SELECT * FROM ".$this->table);
    }
	
	public function getManageSession() {
		if (!class_exists("manageSession")) include dirname(__FILE__)."/../functions/functions.php";
		$this->session = new manageSession();
	}
	
	public function getFieldsList() {
		$rsFields = $this->query("DESC {$this->sc->Ini->nm_tabela}");
		$fields = [];
		if ($rsFields) {
			foreach($rsFields as $row) {
				$fields[$row["Field"]] = ["type"=>$row["Type"]];
			}
		}
		return $fields;
	}
	
	public function getConteudo() {
		$fields = $this->getFieldsList();
		if (!$fields) return [];
		$conteudo = [];
		foreach($fields as $name => $prop) {
			if (!in_array($prop["type"], ["blob", "mediumblob", "tinyblob", "longblob"])) {
				$field = strtolower($name);
				$conteudo[$field] = isset($this->sc->$field) ? $this->sc->$field : null;
			}
		}
		return $conteudo;
	}
	
	public function LAST_INSERT_ID() {
		$rs = $this->query("SELECT LAST_INSERT_ID() as ID");
		return $rs[0]["ID"] ?? null;
	}
	
	public function find($where = null, $select = "*") {
		$str = "SELECT $select FROM {$this->table} ".($where ? "WHERE $where" : null);
		$rs = $this->query($str);
		return $rs;
	}
	
	public function create(array $fields) {
		if (!$fields) return null;
		$SET = [];
		foreach($fields as $field => $value) {
			$SET[] = "$field = ".(gettype($value) == "NULL" ? "NULL" : "'$value'");
		}
		$SET = "SET ".implode(', ', $SET);
		$this->dataCreate = $fields;
		$this->query("INSERT INTO {$this->table} $SET");
		return $this->LAST_INSERT_ID();
	}
	
	public function save(string $where, array $fields) {
		if (!$fields || !$where) return;
		$SET = [];
		foreach($fields as $field => $value) {
			$SET[] = "$field = ".(gettype($value) == "NULL" ? "NULL" : "'$value'");
		}
		$this->dataCreate = $fields;
		$SET = "SET ".implode(', ', $SET);
		$this->query("UPDATE {$this->table} $SET WHERE $where");
	}
	
	public function del(string $where) {
		$this->query("DELETE FROM {$this->table} WHERE $where");
	}
}