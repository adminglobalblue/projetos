<?php 
if (!class_exists("Model")) include "Model.php";
if (!class_exists("Config")) include "Config.php";

class Tecnicos extends Model {
    public $table;
	public $_Config;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
		
		$this->_Config = new Config($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo FROM {$this->table} WHERE ID = '$id'");
	}
	
	public function getTecnicosToNotify(int $daysToNotify, int $daysToExpire) {
        return $this->query("SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo FROM {$this->table} WHERE (Data_Ativacao BETWEEN (NOW() - INTERVAL $daysToExpire DAY) AND (NOW() - INTERVAL $daysToNotify DAY)) AND Num_Ativo = 'S'");
	}
	
	public function getTecnicosToExpire(int $daysToExpire) {
        return $this->query("SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo FROM {$this->table} WHERE Data_Ativacao < (NOW() - INTERVAL $daysToExpire DAY) AND Num_Ativo = 'S'");
	}
	
	public function updateStatus(int $ID_Tecnico, string $Status) {
		return $this->query("UPDATE {$this->table} SET Num_Ativo = '$Status' WHERE ID = '$ID_Tecnico'");
	}
	
	public function expire(int $ID_Tecnico) {
		return $this->query("UPDATE {$this->table} SET Num_Ativo = 'E' WHERE ID = '$ID_Tecnico'");
	}
	
	public function reactivate(int $ID_Tecnico) {
		return $this->query("UPDATE {$this->table} SET Num_Ativo = 'S', Data_Ativacao = '".date("Y-m-d H:i:s")."' WHERE ID = '$ID_Tecnico'");
	}
	
	public function remove(int $ID_Tecnico) {
		return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R' WHERE ID = '$ID_Tecnico'");
	}
	
	public function canReactivate(int $ID_Tecnico) {
		$ToleranceToNotify = $this->_Config->getByKey("routine_chkTecnicosValidade::ToleranceToNotify");
		if (!$ToleranceToNotify) return false;
		$rs = $this->query("SELECT count(*) as count FROM {$this->table} WHERE Data_Ativacao <= (NOW() - INTERVAL $ToleranceToNotify DAY) AND ID = '$ID_Tecnico'");
		if ($rs) return ($rs[0]["count"] > 0);
		else return false;
	}
}