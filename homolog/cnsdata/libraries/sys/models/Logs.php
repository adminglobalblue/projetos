<?php 
if (!class_exists("Model")) include "Model.php";
if (!class_exists("Operadoras")) include "Operadoras.php";
if (!class_exists("Empreendimentos")) include "Empreendimentos.php";
if (!class_exists("Prestadores")) include "Prestadores.php";
	
class Logs extends Model {
    public $table;	
    public $modelOperadoras;
	public $objConteudo;

    public function __construct($sc) {
		parent::__construct($sc);
        $this->modelOperadoras = new Operadoras($sc);
		$this->modelEmpreendimentos = new Empreendimentos($sc);
		$this->modelPrestadores = new Prestadores($sc);	
    }
	
	public function insert($dd) {
        $dd["ID_Usuario"] = $dd["ID_Usuario"] ?? $this->session->get("ID_Usuario");
		$dd["ID_Usuario"] = $dd["ID_Usuario"] ?? 0;
		$dd["NomUsuario"] = $dd["NomUsuario"] ?? $this->session->get("Nom_Nome");
		$dd["TipoUsuario"] = $dd["TipoUsuario"] ?? $this->session->get("Num_TipoUsuario");
		$dd["ID_OPE"] = $dd["ID_OPE"] ?? $this->session->get("ID_OPE");
		$dd["ID_OPE"] = $dd["ID_OPE"] ?? 0;
		$dd["UserNameLogin"] = $dd["UserNameLogin"] ?? $this->session->get("Nom_UserName");

		$dd["Modulo"] = $dd["Modulo"] ?? null;
		$dd["Funcao"] = $dd["Funcao"] ?? null;
		$dd["Conteudo"] = isset($dd["Conteudo"]) ? addslashes(json_encode($dd["Conteudo"])) : null;
		$dd["Descricao"] = isset($dd["Descricao"]) ? addslashes($dd["Descricao"]) : null;
		$dd["Permissoes"] = addslashes(json_encode($this->session->get('profile')));
		$dd["Classe"] = $dd["Classe"] ?? (isset(array_flip($this->tables)[$this->sc->Ini->nm_tabela]) ? array_flip($this->tables)[$this->sc->Ini->nm_tabela] : "");
		if ($dd["TipoUsuario"] == "G" || $dd["TipoUsuario"] == "GT") {
			$dd["Nom_OPE"] = "GLOBALBLUE";
		} elseif ($dd["TipoUsuario"] == "O") {
			$dd["Nom_OPE"] = $this->modelOperadoras->getCompanyNameById($this->session->get("ID_OPE"));
		} elseif ($dd["TipoUsuario"] == "P") {
			$dd["Nom_OPE"] = $this->modelPrestadores->getCompanyNameById($this->session->get("ID_OPE"));
		} elseif ($dd["TipoUsuario"] == "E") {
			$dd["Nom_OPE"] = $this->modelEmpreendimentos->getCompanyNameById($this->session->get("ID_OPE"));
		} else {
			$dd["Nom_OPE"] = $dd["Nom_OPE"] ?? "";
		}
		$dd["Aplicacao"] = $this->app;
		$now = DateTime::createFromFormat('U.u', microtime(true));
		$dd["Data"] = $now->format("Y-m-d H:i:s.u");
		$dd["IP"] = $_SERVER['REMOTE_ADDR'];
        
		return $this->query("
			INSERT INTO {$this->table} (Classe, ID_Usuario, UserNameLogin, NomUsuario, TipoUsuario, ID_OPE, Nom_OPE, IP, Data, Modulo, Funcao, Permissoes, Conteudo, Descricao, Aplicacao) VALUE
			('{$dd["Classe"]}',
			'{$dd["ID_Usuario"]}',
			'{$dd["UserNameLogin"]}',
			'{$dd["NomUsuario"]}',
			'{$dd["TipoUsuario"]}',
			'{$dd["ID_OPE"]}',
			'{$dd["Nom_OPE"]}',
			'{$dd["IP"]}',
			'{$dd["Data"]}',
			'{$dd["Modulo"]}',
			'{$dd["Funcao"]}',
			'{$dd["Permissoes"]}',
			'{$dd["Conteudo"]}',
			'{$dd["Descricao"]}',
			'{$dd["Aplicacao"]}')");
	}
	
	public function setArrayAnaliser($obj) {
		$this->objConteudo = array_change_key_case($obj, CASE_LOWER);
	}
	public function getAttrConteudo($key, $default = null) {
		$key = strtolower($key);
		return isset($this->objConteudo[$key]) ? $this->objConteudo[$key] : $default;
	}
}

