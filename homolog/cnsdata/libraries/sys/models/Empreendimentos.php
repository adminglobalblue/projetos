<?php 
if (!class_exists("Model")) include "Model.php";

class Empreendimentos extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_Empreendimento = '$id'");
	}
	
	public function getCompanyNameById(int $id) {
        $rs = $this->query("SELECT Nom_Empreendimento FROM {$this->table} WHERE ID_Empreendimento = '$id'");
		if ($rs) return $rs[0]["Nom_Empreendimento"];
		else return null;
	}
	
	public function getByCNPJ(string $CNPJ, $Num_Ativo = "S,R,N", $Except = "") {
		$rs = $this->query("SELECT * FROM {$this->table} WHERE Num_CNPJ = '$CNPJ' AND FIND_IN_SET(Num_Ativo,'".$Num_Ativo."') AND ID_Empreendimento NOT IN ('$Except')");
		if ($rs) return $rs;
		else return null;
	}
	
	public function getRelatorioVistorias($ID_Empreendimento) {
		return $this->query("SELECT * FROM tb_filesrelatoriovistorias WHERE ID_Empreendimento = '$ID_Empreendimento'");
	}
}