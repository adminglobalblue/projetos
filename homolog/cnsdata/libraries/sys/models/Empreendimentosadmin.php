<?php 
if (!class_exists("Model")) include "Model.php";

class Empreendimentosadmin extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
	}
	
	public function getCompanyNameById(int $id) {
        $rs = $this->query("SELECT Nom_Admin FROM {$this->table} WHERE ID_Empreendimento = '$id'");
		if ($rs) return $rs[0]["Nom_Empreendimento"];
		else return null;
	}
	
	public function getByCNPJ(string $CNPJ, $Num_Ativo = "S,R,N", $Except = "") {
		$rs = $this->query("SELECT * FROM {$this->table} WHERE Num_CNPJ = '$CNPJ' AND FIND_IN_SET(Num_Ativo,'".$Num_Ativo."') AND ID NOT IN ('$Except')");
		if ($rs) return $rs;
		else return null;
	}
	
	public function delete(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R', Removido_em = '".date("Y-m-d H:i:s")."' WHERE ID = '$id'");
	}
	
	public function hasDependence(int $id, $Num_Ativo = "S,R,N", $Except = "") {
		$Empreendimentos = $this->query("SELECT * FROM {$this->tables["Empreendimentos"]} WHERE ID_Empreendimentosadmin = '$id' AND FIND_IN_SET(Num_Ativo,'".$Num_Ativo."') AND ID_Empreendimento NOT IN ('$Except')");
		if ($Empreendimentos) return ["Empreendimentos" => count($Empreendimentos)];
		else return false;
	}
}