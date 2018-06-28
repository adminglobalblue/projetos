<?php 
if (!class_exists("Model")) include "Model.php";

class Nferiados extends Model {
    public $table;
	public $Estados;
	public $Estado;
	public $Cidade;
    public function __construct($sc) {
        parent::__construct($sc);
		$this->Estados = ["AC" => "ACRE",
			"AL" => "ALAGOAS",
			"AP" => "AMAPÁ",
			"AM" => "AMAZONAS",
			"BA" => "BAHIA",
			"CE" => "CEARA",
			"DF" => "DISTRITO FEDERAL",
			"ES" => "ESPÍRITO SANTO",
			"GO" => "GOIÁS",
			"MA" => "MARANHÃO",
			"MT" => "MATO GROSSO",
			"MS" => "MATO GROSSO DO SUL",
			"MG" => "MINAS GERAIS",
			"PA" => "PARÁ",
			"PB" => "PARAÍBA",
			"PR" => "PARANÁ",
			"PE" => "PERNAMBUCO",
			"PI" => "PIAUÍ",
			"RJ" => "RIO DE JANEIRO",
			"RN" => "RIO GRANDE DO NORTE",
			"RS" => "RIO GRANDE DO SUL",
			"RO" => "RONDÔNIA",
			"RR" => "RORAIMA",
			"SC" => "SANTA CATARINA",
			"SP" => "SÃO PAULO",
			"SE" => "SERGIPE",
			"TO" => "TOCANTINS"];
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
	}
	
	public function getByDate(string $Data, $Estado = "", $Cidade = "") {
		$Estado = strtoupper(($Estado ? $Estado : $this->Estado));
		$Cidade = strtoupper(($Cidade ? $Cidade : $this->Cidade));
        return $this->query("SELECT * FROM {$this->table} WHERE Data = '$Data' AND ((Tipo = 1) OR (Tipo = 2 AND Estado = '$Estado') OR (Tipo = 3 AND Estado = '$Estado' AND Cidade = '$Cidade'))");
	}
}