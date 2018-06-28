<?php 
if (!class_exists("Model")) include "Model.php";

class Conjunto extends Model {
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
	
	public function getNomById(int $id) {
        $rs = $this->getById($id);
		if ($rs) return $rs[0]["Nom_Conjunto"];
		else return "";
	}
	
	public function getPath(int $id) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_Conjunto, 
				tb1.Nom_Conjunto as Nom_Conjunto,
				tb2.ID as ID_Andar,
				tb2.Nom_Andar as Nom_Andar,
				tb3.ID as ID_Torre,
				tb3.Nom_Torre as Nom_Torre,
				tb4.ID_Empreendimento as ID_Empreendimento,
				tb4.Nom_Empreendimento as Nom_Empreendimento
			FROM {$this->table} as tb1 
			INNER JOIN {$this->tables['Andar']} as tb2 ON tb1.ID_Andar = tb2.ID
			INNER JOIN {$this->tables['Torre']} as tb3 ON tb2.ID_Torre = tb3.ID
			INNER JOIN {$this->tables['Empreendimentos']} as tb4 ON tb3.ID_Empreendimento = tb4.ID_Empreendimento
			WHERE tb1.ID = '$id'");
		if ($rs) return $rs[0];
		else return [];
	}
}