<?php 
if (!class_exists("Model")) include "Model.php";

class Helperartigos extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table}  WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function delete(int $id) {
        $this->query("DELETE FROM {$this->table} WHERE ID = '$id'");
	} 
	
	public function getArtigosByCategorias(int $idcategorias) {
        $TipoUsuario = $this->session->get("Num_TipoUsuario");
		$language = $this->session->get("language");
		$ID_Usuario = $this->session->get("ID_Usuario");
		$language = ($language ? $language : "pt_br");
        $rs = $this->query("SELECT
			ID,
			Criado_em,
			(CASE
			WHEN '$language' = 'pt_br' THEN Titulo_pt
			WHEN '$language' = 'en_us' THEN Titulo_en
			WHEN '$language' = 'es' THEN Titulo_es
			END) as Titulo,
			(SELECT (CASE
				WHEN '$language' = 'pt_br' THEN Nome_pt
				WHEN '$language' = 'en_us' THEN Nome_en
				WHEN '$language' = 'es' THEN Nome_es
			END) FROM tb_helpercategorias WHERE ID = ID_Helpercategorias) as Helpercategorias,
			(CASE
				WHEN '$language' = 'pt_br' THEN Descricao_pt
				WHEN '$language' = 'en_us' THEN Descricao_en
				WHEN '$language' = 'es' THEN Descricao_es
			END) as Descricao,
			(CASE
				WHEN '$language' = 'pt_br' THEN Conteudo_pt
				WHEN '$language' = 'en_us' THEN Conteudo_en
				WHEN '$language' = 'es' THEN Conteudo_es
			END) as Conteudo,
			Alias
		FROM
			{$this->table}
		WHERE ID_Helpercategorias = '$idcategorias' AND ID IN (
			SELECT tb1.ID FROM tb_helperartigos as tb1
			INNER JOIN tb_permissoes as tb2 ON tb2.Nom_Funcao = tb1.Funcao AND tb2.Nom_Modulo = tb1.Modulo
			INNER JOIN tb_usuarios as tb3 ON tb3.ID_Usuario = '$ID_Usuario'
			INNER JOIN tb_perfilpermissoes as tb4 ON tb4.ID_Perfil = tb3.ID_Perfil
			WHERE tb4.ID_Permissoes = tb2.ID AND tb4.Valor = 'S' AND FIND_IN_SET('$TipoUsuario', REPLACE(tb_helperartigos.TipoUsuario, ';',','))
		)
		ORDER BY Titulo");
		if ($rs) {
			return $rs;
		} else false;
	} 
	
	public function getArtigoByQuery(string $search) {
        $TipoUsuario = $this->session->get("Num_TipoUsuario");
		$language = $this->session->get("language");
		$ID_Usuario = $this->session->get("ID_Usuario");
		$language = ($language ? $language : "pt_br");
		$search = strtolower($search);
        #var_dump('c: ',$search);
		$rs = $this->query("SELECT
			ID,
			Criado_em,
			(CASE
			WHEN '$language' = 'pt_br' THEN Titulo_pt
			WHEN '$language' = 'en_us' THEN Titulo_en
			WHEN '$language' = 'es' THEN Titulo_es
			END) as Titulo,
			(SELECT (CASE
				WHEN '$language' = 'pt_br' THEN Nome_pt
				WHEN '$language' = 'en_us' THEN Nome_en
				WHEN '$language' = 'es' THEN Nome_es
			END) FROM tb_helpercategorias WHERE ID = ID_Helpercategorias) as Helpercategorias,
			(CASE
				WHEN '$language' = 'pt_br' THEN Descricao_pt
				WHEN '$language' = 'en_us' THEN Descricao_en
				WHEN '$language' = 'es' THEN Descricao_es
			END) as Descricao,
			(CASE
				WHEN '$language' = 'pt_br' THEN Conteudo_pt
				WHEN '$language' = 'en_us' THEN Conteudo_en
				WHEN '$language' = 'es' THEN Conteudo_es
			END) as Conteudo,
			Alias
		FROM
			{$this->table}
		WHERE (ID = '$search' OR Alias = '$search') AND ID IN (
			SELECT tb1.ID FROM tb_helperartigos as tb1
			INNER JOIN tb_permissoes as tb2 ON tb2.Nom_Funcao = tb1.Funcao AND tb2.Nom_Modulo = tb1.Modulo
			INNER JOIN tb_usuarios as tb3 ON tb3.ID_Usuario = '$ID_Usuario'
			INNER JOIN tb_perfilpermissoes as tb4 ON tb4.ID_Perfil = tb3.ID_Perfil
			WHERE tb4.ID_Permissoes = tb2.ID AND tb4.Valor = 'S' AND FIND_IN_SET('$TipoUsuario', REPLACE(tb_helperartigos.TipoUsuario, ';',',')))");
		if ($rs) {
			return $rs[0];
		} else false;
	}
	
	public function searchArtigos(string $search) {
        $TipoUsuario = $this->session->get("Num_TipoUsuario");
		$language = $this->session->get("language");
		$ID_Usuario = $this->session->get("ID_Usuario");
		$language = ($language ? $language : "pt_br");
		$search = strtolower($search);
		$rs = $this->query("SELECT
			ID,
			Criado_em,
			(CASE
			WHEN '$language' = 'pt_br' THEN Titulo_pt
			WHEN '$language' = 'en_us' THEN Titulo_en
			WHEN '$language' = 'es' THEN Titulo_es
			END) as Titulo,
			(SELECT (CASE
				WHEN '$language' = 'pt_br' THEN Nome_pt
				WHEN '$language' = 'en_us' THEN Nome_en
				WHEN '$language' = 'es' THEN Nome_es
			END) FROM tb_helpercategorias WHERE ID = ID_Helpercategorias) as Helpercategorias,
			(CASE
				WHEN '$language' = 'pt_br' THEN Descricao_pt
				WHEN '$language' = 'en_us' THEN Descricao_en
				WHEN '$language' = 'es' THEN Descricao_es
			END) as Descricao,
			(CASE
				WHEN '$language' = 'pt_br' THEN Conteudo_pt
				WHEN '$language' = 'en_us' THEN Conteudo_en
				WHEN '$language' = 'es' THEN Conteudo_es
			END) as Conteudo,
			Alias,
			TipoUsuario
		FROM
			{$this->table}
		HAVING (LOWER(Titulo) like '%".$search."%' OR LOWER(Descricao) like '%".$search."%' OR LOWER(Conteudo) like '%".$search."%') AND ID IN (
			SELECT tb1.ID FROM tb_helperartigos as tb1
			INNER JOIN tb_permissoes as tb2 ON tb2.Nom_Funcao = tb1.Funcao AND tb2.Nom_Modulo = tb1.Modulo
			INNER JOIN tb_usuarios as tb3 ON tb3.ID_Usuario = '$ID_Usuario'
			INNER JOIN tb_perfilpermissoes as tb4 ON tb4.ID_Perfil = tb3.ID_Perfil
			WHERE tb4.ID_Permissoes = tb2.ID AND tb4.Valor = 'S' AND FIND_IN_SET('$TipoUsuario', REPLACE(tb_helperartigos.TipoUsuario, ';',','))
		)
		ORDER BY Titulo, Helpercategorias");
		if ($rs) {
			return $rs;
		} else false;
	}
	
	public function getLink($search, $config = []) {
        #var_dump('d: ',$search);
    if(gettype($search) == 'array'){
        $TipoUsuario = $this->session->get("Num_TipoUsuario");
        $search = $search[$TipoUsuario] ?? $search["default"] ?? null;
	}
		
    if ($search) {
        #var_dump('a: ',$search);
        $Artigo = $this->getArtigoByQuery($search);
        #var_dump('b: ',$search);
        #var_dump($this->DbError,$this->strQuery);
        if ($Artigo) {
			if ($config["SVGINFO_URL"] ?? false){
				return '<span class="edit" data-url="#" onclick="getHelper(\''.$Artigo["Alias"].'\')" style="margin: 2px;"><img src="../_lib/libraries/sys/templates/img/info-sign.svg" style="width:15px;height:15px;cursor:pointer" title="Vídeo: '.$Artigo["Titulo"].'"></span>';
			}
			return '<a href="#" onclick="getHelper(\''.$Artigo["Alias"].'\')" style="margin: 2px;cursor:pointer"><img src=":SVGINFO:" style="width:25px;height:25px" title="Vídeo: '.$Artigo["Titulo"].'"></a>';
		}
    } else return;
	
	}
}
