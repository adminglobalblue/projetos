<?php 
if (!class_exists("Model")) include "Model.php";

class Termodeuso extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByID_Usuario(int $ID_Usuario) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_Usuario = '$ID_Usuario' ORDER BY Data DESC");
		if ($rs) return $rs;
		else return null;
	}
	
	public function insert(int $ID_Usuario, string $versao) {
        $this->query("INSERT INTO {$this->table} SET ID_Usuario = '$ID_Usuario', Versao = '$versao', Data = '".date("Y-m-d H:i:s")."'");
	}
}
