<?php 
if (!class_exists("Model")) include "Model.php";

class Operadoras extends Model {
    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_Operadoras = '$id'");
	}
	
	public function getCompanyNameById(int $id) {
        $rs = $this->query("SELECT Nom_Operadoras FROM {$this->table} WHERE ID_Operadoras = '$id'");
		if ($rs) return $rs[0]["Nom_Operadoras"];
		else return null;
	}
}