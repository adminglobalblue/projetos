<?php 
if (!class_exists("Model")) include "Model.php";

class Notificacoes extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByAplicacao(string $Aplicacao, $Num_Ativo = 'S', $Visivel = 'S,N') {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE Aplicacao = '$Aplicacao' AND find_in_set(Num_Ativo, '$Num_Ativo') AND find_in_set(Visivel, '$Visivel') ORDER BY Data DESC");
		if ($rs) return $rs;
		else return null;
	}
	
	public function getByID_Usuario(string $ID_Usuario, $Num_Ativo = 'S') {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_Usuario = '$ID_Usuario' AND find_in_set(Num_Ativo, '$Num_Ativo') AND find_in_set(Visivel, '$Visivel') ORDER BY Data DESC");
		if ($rs) return $rs;
		else return null;
	}
	
	public function getByAplicacaoID_Usuario(string $Aplicacao, string $ID_Usuario, $Num_Ativo = 'S', $Visivel = 'S,N') {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_Usuario = '$ID_Usuario' AND Aplicacao = '$Aplicacao' AND find_in_set(Num_Ativo, '$Num_Ativo') AND find_in_set(Visivel, '$Visivel') ORDER BY Data DESC");
		if ($rs) return $rs;
		else return null;
	}
	
	public function delete(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R', Removido_em = '".date("Y-m-d H:i:s")."' WHERE ID = '$id'");
	}
	
	public function visualizar(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'N', Visualizado_em = '".date("Y-m-d H:i:s")."' WHERE ID = '$id'");
	}
	
	public function insert(int $ID_Usuario,
			string $Aplicacao,
			$Data = "",
			$Prop = "",
			$Titulo = "",
			$Conteudo = "",
			$Visivel = "N",
			$Num_Ativo = "S") {
		if (!$Data) $Data = $Criado_em = date("Y-m-d H:i:s");
		$Criado_em = date("Y-m-d H:i:s");
		if (!$Prop) $Prop = "{}";
		
		$this->query("INSERT INTO {$this->table} 
			SET ID_Usuario = '$ID_Usuario',
				Aplicacao = '$Aplicacao',
				Data = '$Data',
				Prop = '$Prop',
				Titulo = '$Titulo',
				Conteudo = '$Conteudo',
				Visivel = '$Visivel',
				Num_Ativo = '$Num_Ativo', 
				Criado_em = '$Criado_em'");
	}
}
