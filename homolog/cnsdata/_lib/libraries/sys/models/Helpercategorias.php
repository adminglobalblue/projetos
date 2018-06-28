<?php 
if (!class_exists("Model")) include "Model.php";

class Helpercategorias extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table}  WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getAll() {
		$language = $this->session->get("language");
		$ID_Usuario = $this->session->get("ID_Usuario");
		$TipoUsuario = $this->session->get("Num_TipoUsuario");
		$language = $language ? $language : "pt_br";
        $rs = $this->query("SELECT
			ID,
			Criado_em,
			(CASE
			WHEN '$language' = 'pt_br' THEN Nome_pt
			WHEN '$language' = 'en_us' THEN Nome_en
			WHEN '$language' = 'es' THEN Nome_es
			END) as Nome,
			(
				SELECT count(tb1.ID_Helpercategorias) FROM tb_helperartigos as tb1
				INNER JOIN tb_permissoes as tb2 ON tb2.Nom_Funcao = tb1.Funcao AND tb2.Nom_Modulo = tb1.Modulo
				INNER JOIN tb_usuarios as tb3 ON tb3.ID_Usuario = '$ID_Usuario'
				INNER JOIN tb_perfilpermissoes as tb4 ON tb4.ID_Perfil = tb3.ID_Perfil
				WHERE tb4.ID_Permissoes = tb2.ID AND tb4.Valor = 'S' AND
				tb1.ID_Helpercategorias = {$this->table}.ID
				AND FIND_IN_SET('$TipoUsuario', REPLACE(tb1.TipoUsuario, ';',','))
			) as NumeroArtigos
		FROM {$this->table}
		WHERE ID IN (
			SELECT tb1.ID_Helpercategorias FROM tb_helperartigos as tb1
			INNER JOIN tb_permissoes as tb2 ON tb2.Nom_Funcao = tb1.Funcao AND tb2.Nom_Modulo = tb1.Modulo
			INNER JOIN tb_usuarios as tb3 ON tb3.ID_Usuario = '$ID_Usuario'
			INNER JOIN tb_perfilpermissoes as tb4 ON tb4.ID_Perfil = tb3.ID_Perfil
			WHERE tb4.ID_Permissoes = tb2.ID AND tb4.Valor = 'S' AND
			tb1.ID_Helpercategorias = {$this->table}.ID
			AND FIND_IN_SET('$TipoUsuario', REPLACE(tb1.TipoUsuario, ';',','))
		)
		ORDER BY Nome");
		if ($rs) return $rs;
		else return null;
	}
}
