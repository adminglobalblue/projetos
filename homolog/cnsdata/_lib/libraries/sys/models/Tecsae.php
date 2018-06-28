<?php 
if (!class_exists("Model")) include "Model.php";

class Tecsae extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByNum_SAE(string $Num_SAE) {
        $rs = $this->query("select count(a.ID) as count, b.Tipo_Tecnico as Tipo FROM {$this->table} as a
				INNER JOIN {$this->tables["Tecnicos"]} as b ON b.ID = a.ID_Tecnico
				WHERE Num_SAE = '$Num_SAE'
				GROUP BY b.Tipo_Tecnico");
		$arr = [
			"O" => 0,
			"P" => 0
		];
		if ($rs) {
			foreach($rs as $row) {
				$arr[$row["Tipo"]] = $row["count"];
			}	
		}
		return $arr;
	}
	
}