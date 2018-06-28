<?php 
if (!class_exists("Model")) include "Model.php";

class Excecoes extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT *FROM {$this->table} as WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByOP(string $Tipo_OP, string $ID_OP) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_OP = '$ID_OP' AND Tipo_OP = '$Tipo_OP'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByPas(int $ID_Pas) {
        $rs = $this->query("SELECT tb1.* FROM {$this->table} as tb1 INNER JOIN {$this->tables["Pas"]} as tb2 ON tb2.ID_OP = tb1.ID_OP AND tb2.Tipo_OP = tb1.Tipo_OP WHERE tb2.ID = '$ID_Pas'");
		if ($rs) return $rs[0];
		else return null;
	}
}
