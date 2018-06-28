<?php 
if (!class_exists("Model")) include "Model.php";

class Rg_racks extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table}  WHERE ID = '$id'");
		return $rs[0] ?? null;
	}
}
