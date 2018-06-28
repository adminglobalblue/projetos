<?php 
if (!class_exists("Model")) include "Model.php";

class Permissoes extends Model {
    public $table;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
	}
	
	public function getAllCode() {
        return $this->query("SELECT CONCAT(Nom_Modulo,'_',Nom_Funcao) as Code FROM {$this->table}");
	}
	
	public function getPermissoesByPerfil(int $id_perfil) {
		return $this->query("SELECT 
			CONCAT(b.Nom_Modulo,'_',b.Nom_Funcao) as Code, 
			a.Valor as Valor, 
			a.ID as ID_PerfilPermissoes, 
			b.ID as ID_Permissoes 
		FROM tb_permissoes b
		LEFT JOIN tb_perfilpermissoes a ON b.ID = a.ID_Permissoes AND a.ID_Perfil = '$id_perfil'");
	}
}