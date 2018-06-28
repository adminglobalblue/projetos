<?php 
if (!class_exists("Model")) include "Model.php";

class Pasitens extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
	}
	
	public function getByID_Pas(int $ID_Pas) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_PAS = '$ID_Pas'");
	}
	
	public function getByOrigem(string $Origem) {
        return $this->query("SELECT tb1.* FROM {$this->table} as tb1
			INNER JOIN {$this->tables["Pas"]} as tb2 ON tb2.ID = tb1.ID_PAS 
			WHERE tb2.ID_Origem = '$Origem'");
	}
	
	public function updateRealizado(stdClass $Pasitens) {
        return $this->query("UPDATE {$this->table} SET 
			Real_Data_Inicio = '".$Pasitens->Real_Data_Inicio."', 
			Real_Data_Fim = '".$Pasitens->Real_Data_Fim."', 
			Real_Valor = '".$Pasitens->Real_Valor."', 
			Real_Horas = '".$Pasitens->Real_Horas."', 
			Info = '".$Pasitens->Info."' WHERE ID = '".$Pasitens->ID."'");
	}
}