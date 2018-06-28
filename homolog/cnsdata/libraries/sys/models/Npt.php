<?php 
if (!class_exists("Model")) include "Model.php";

class Npt extends Model {
    public $table;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
    }
	
	public function getFileList(int $ID_Empreendimento) {
		return $this->query("SELECT Arquivo FROM {$this->table} WHERE ID_Empreendimento = '$ID_Empreendimento'");
	}
	
	public function getByEmpreendimento(int $ID_Empreendimento) {
        $rs = $this->query("SELECT Arquivo FROM {$this->table} WHERE ID_Empreendimento = '$ID_Empreendimento'");
		if ($rs) {
			$fileList = [];
			foreach($rs as $row) {
				$fileList[] = $row["Arquivo"];
			}
			return $fileList;
		} else return null;
	}
}