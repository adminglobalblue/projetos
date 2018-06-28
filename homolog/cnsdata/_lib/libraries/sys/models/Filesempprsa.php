<?php 
if (!class_exists("Model")) include "Model.php";

class Filesempprsa extends Model {
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
	
	public function getByPRSA(int $ID_PRSA) {
        $rs = $this->query("SELECT File_Name FROM {$this->table} WHERE ID_PRSA = '$ID_PRSA'");
		if ($rs) {
			$fileList = [];
			foreach($rs as $row) {
				$fileList[] = $row["File_Name"];
			}
			return $fileList;
		} else return null;
	}
}