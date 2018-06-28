<?php 
if (!class_exists("Model")) include "Model.php";

class Raritens extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT *FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByCodeRar(string $code) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE CodeRAR = '$code'");
		if ($rs) return $rs;
		else return null;
	}
	
	public function deleteByCodeRar(string $code) {
        return $this->query("DELETE FROM {$this->table} WHERE CodeRAR = '$code'");
	}
}
