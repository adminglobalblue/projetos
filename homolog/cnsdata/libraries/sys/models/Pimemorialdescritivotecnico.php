<?php 
if (!class_exists("Model")) include "Model.php";

class Pimemorialdescritivotecnico extends Model {
    public $table;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
	}
}