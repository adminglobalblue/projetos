<?php 
if (!class_exists("Model")) include "Model.php";

class Pas extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
	}
	
	public function getArquivosById(int $id) {
        return $this->query("SELECT * FROM {$this->tables["Pasarquivos"]} WHERE ID_PAS = '$id'");
	}
	
	public function getExpired(int $days) {
        return $this->query("SELECT * FROM {$this->table} WHERE DataCriacao < (NOW() - INTERVAL $days DAY) AND Num_Status IN ('AE', 'RAE')");
	}
	
	public function updateStatus(int $id, string $status) {
        return $this->query("UPDATE {$this->table} SET Num_Status = '$status' WHERE ID = '$id'");
	}
	
	public function cancelPasBySAE(string $Num_SAE) {
		$rs = $this->query("SELECT * FROM {$this->table} as tb1 
			WHERE tb1.Num_Ativo = 'S' AND
			tb1.Origem = 'SAE' AND tb1.ID_Origem = '$Num_SAE'
		");
		$this->query("UPDATE {$this->table} as tb1 SET Num_Status = 'C'
			WHERE tb1.Num_Ativo = 'S' AND
			tb1.Origem = 'SAE' AND tb1.ID_Origem = '$Num_SAE'
		");
		return $rs;
	}
}