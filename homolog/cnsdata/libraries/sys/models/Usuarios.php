<?php 
if (!class_exists("Model")) include "Model.php";

class Usuarios extends Model {
    public $table;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_usuario = '$id'");
		if ($rs) unset($rs[0]["IMG_Foto"]);
		return $rs;
	}
	
	public function getLoggedById() {
		$id = $this->session->get("ID_Usuario");
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID_usuario = '$id' AND Num_Ativo = 'S'");
		if ($rs) return $rs[0];
		else [];
	}
	  
	public function getFirstEmailById(int $id) {
		$rs = $this->query("SELECT IF(Nom_Email1 != '',Nom_Email1,Nom_Email2) as email
			FROM {$this->table} 
			WHERE ID_Usuario = '$id' 
			HAVING email != ''");
		if ($rs) return $rs[0]["email"];
		else return "";
	}
	
	public function updateLastLogin(int $ID_Usuario) {
		$this->query("UPDATE {$this->table} SET Data_UltimoLogin = '".date('Y-m-d H:i:s')."' WHERE ID_Usuario = '$ID_Usuario'");
	}
	
	public function remove(int $ID_Usuario) {
		return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R', Removido_em = '".date("Y-m-d H:i:s")."' WHERE ID_Usuario = '$ID_Usuario'");
	}
	
	public function getFirstTelefoneById(int $id){
		$rs = $this->query("SELECT ID_Usuario, 
			IF(Num_TelefoneComercial != '',
				IF(CHAR_LENGTH(Num_TelefoneComercial) = 10,
					MASK(Num_TelefoneComercial, '(##) ####-####'),
					IF(CHAR_LENGTH(Num_TelefoneComercial) = 11, 
						MASK(Num_TelefoneComercial, '(##) #####-####'),
						''
					)
				),
				IF(Nom_TelefoneResidencial != '',
					IF(CHAR_LENGTH(Nom_TelefoneResidencial) = 10,
						MASK(Nom_TelefoneResidencial, '(##) ####-####'),
						IF(CHAR_LENGTH(Nom_TelefoneResidencial) = 11, 
							MASK(Nom_TelefoneResidencial, '(##) #####-####'),
							''
						)
					),
					IF(CHAR_LENGTH(Num_TelefoneCelular) = 10,
						MASK(Num_TelefoneCelular, '(##) ####-####'),
						IF(CHAR_LENGTH(Num_TelefoneCelular) = 11, 
							MASK(Num_TelefoneCelular, '(##) #####-####'),
							''
						)
					)
				)
			) as telefone
		FROM tb_usuarios
		HAVING telefone != ''");
		if ($rs) return $rs[0]["telefone"];
		else return "";
	}
	
	  public function getByCentroDeCusto (string $centroDeCusto) {
        $rs = $this->query("SELECT * FROM {$this->table} as tb1
            INNER JOIN tb_departamentos as tb2 ON tb2.ID = tb1.Departamento
            WHERE tb2.CentroDeCusto IN ($centroDeCusto)");
		if ($rs) foreach($rs as $i => $usuario) {
			unset($rs[$i]["IMG_Foto"]);
		}
		  
		return $rs;
    }
	
	public function getUsuariosInatividade() {
		return $this->query("SELECT * FROM tb_usuarios
			WHERE Data_UltimoLogin < SUBDATE(NOW(), INTERVAL IF(DiasInatividade,DiasInatividade,30) DAY) AND Num_Ativo IN ('S','BP')");	
	}
}