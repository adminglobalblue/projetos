<?php 
if (!class_exists("Model")) include "Model.php";

class Prestadores extends Model {
    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_Prestador = '$id'");
	}
	
	public function getCompanyNameById(int $id) {
        $rs = $this->query("SELECT Nom_RazaoSocial FROM {$this->table} WHERE ID_Prestador = '$id'");
		if ($rs) return $rs[0]["Nom_RazaoSocial"];
		else return null;
	}
	
	public function getListOperadoras($id) {
        return $this->query("
			SELECT tb3.* FROM
			{$this->table} as tb1 
			INNER JOIN tb_infoprestadores as tb2 ON tb2.ID_Prestador = tb1.ID_Prestador AND tb2.Num_Ativo = 'S' 
			INNER JOIN tb_operadoras as tb3 ON tb3.ID_Operadoras = tb2.ID_Operadora AND tb3.Num_Status = 'S'
			WHERE tb1.ID_Prestador = '$id'");
	}
	
	public function deletePrestadora($id) {
		$this->query("UPDATE tb_prestadores SET Num_Ativo = 'R' WHERE ID_Prestador = '$id'");
		$this->query("UPDATE tb_infoprestadores SET Num_Ativo = 'R' WHERE ID_Prestador = '$id'");
	}
}