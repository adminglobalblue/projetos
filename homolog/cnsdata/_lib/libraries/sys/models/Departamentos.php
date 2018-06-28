<?php 
if (!class_exists("Model")) include "Model.php";

class Departamentos extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByCentroDeCusto(string $CentroDeCusto) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE CentroDeCusto = '$CentroDeCusto'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function delete(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R', Removido_em = '".date('Y-m-d H:i:s')."' WHERE ID = '$id'");
	}
}
