<?php 
if (!class_exists("Model")) include "Model.php";
//if (!class_exists("Agenda")) include "Agenda.php";
	
class Saetecgb extends Model {
    public $table;
	public $_Agenda;
	
    public function __construct($sc) {
        parent::__construct($sc);
		//$this->Agenda = new Agenda($sc);
    }
	
	public function getByNum_SAE (string $Num_SAE) {
		$rs = $this->query("SELECT * FROM {$this->table} WHERE Num_SAE = '{$Num_SAE}'");
		return $rs ?: false;
	}
	
	public function set(array $data) {
		if (!$data["Num_SAE"] || !$data["ID_Usuario"]) return false;
		
	}
}
