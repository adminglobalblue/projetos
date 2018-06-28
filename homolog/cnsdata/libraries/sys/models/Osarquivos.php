<?php 
if (!class_exists("Model")) include "Model.php";

class Osarquivos extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getByIdOs(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_OS = '$id'");
		if ($rs) {
			$fileList = [];
			foreach($rs as $row) {
				$fileList[] = $row["Arquivo"];
			}
			return $fileList;
		} else return null;
	}
}