<?php 
if (!class_exists("Model")) include "Model.php";
if (!class_exists("Config")) include "Config.php";

class Filesrelatoriovistorias extends Model {
	public $_Config;
	public $expiredTime;
	
    public function __construct($sc) {
        parent::__construct($sc);
		$_Config = new Config($sc);
		$this->expiredTime = $_Config->getByKey("routine_chkRelatorioVistoria::ToleranceToExpire");
		
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table}  WHERE ID = '$id'");
		return $rs[0] ?? null;
	}
	
	public function getExpiredByEmpreendimento($ID_Empreendimento) {
		$data = date("Y-m-d", strtotime("-{$this->expiredTime} days"));
        $rs = $this->find("Data < '$data' AND ID_Empreendimento = '$ID_Empreendimento'");
		return $rs ?? null;
	}
	
	public function delete(int $id) {
        $this->query("DELETE FROM {$this->table} WHERE ID = '$id'");
	} 
}
