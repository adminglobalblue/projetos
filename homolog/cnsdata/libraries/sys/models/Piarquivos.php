<?php 
if (!class_exists("Model")) include "Model.php";

class Piarquivos extends Model {
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
	
	public function getByItem(int $ID_piItem, int $IDFI, string $CodeItem) {
        $rs = $this->query("SELECT Arquivo FROM {$this->table} WHERE ID_piItem = '$ID_piItem' AND IDFI = '$IDFI' AND CodeItem = '$CodeItem'");
		if ($rs) {
			$fileList = [];
			foreach($rs as $row) {
				$fileList[] = $row["Arquivo"];
			}
			return $fileList;
		} else return null;
	}
}