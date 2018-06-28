<?php 
if (!class_exists("Model")) include "Model.php";

class Projetostipos extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getNomByCode(string $Code) {
		$language = $this->session->get("language");
		$language = $language ? $language : "pt_br";
        $rs = $this->query("SELECT (case  
			   when '$language' = 'pt_br' then Nom_ProjetoTipo
			   when '$language' = 'en_us' then Nom_ProjetoTipo_en
			   when '$language' = 'es' then Nom_ProjetoTipo_es
			end) as Nom_ProjetoTipo FROM tb_projetostipos WHERE Code = '$Code'");
		if ($rs) return $rs[0]["Nom_ProjetoTipo"];
		else return null;
	}
	
	public function getByID_Operadora_Vende(int $ID_Operadora_Vende) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_Operadora_Vende = '$ID_Operadora_Vende'");
		if ($rs) return $rs;
		else return null;
	}
	
	public function getByID_Operadora_Entrega(int $ID_Operadora_Entrega) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_Operadora_Entrega = '$ID_Operadora_Entrega'");
		if ($rs) return $rs;
		else return null;
	}
	
	public function delete(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R', Removido_em = '".date("Y-m-d H:i:s")."' WHERE ID = '$id'");
	}
}
