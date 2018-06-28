<?php 
if (!class_exists("Model")) include "Model.php";

class Os extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table}  WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByNum_SAE(string $Num_SAE) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE Num_SAE = '$Num_SAE'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function delete(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R' WHERE ID = '$id'");
	}
	
	public function setStatus(int $id, string $status) {
		return $this->query("UPDATE {$this->table} SET Num_Status = '$status' WHERE ID = '$id'");
	}
}
