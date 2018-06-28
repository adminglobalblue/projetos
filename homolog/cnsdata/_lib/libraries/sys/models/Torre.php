<?php 
if (!class_exists("Model")) include "Model.php";

class Torre extends Model {
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
		if ($rs) return $rs[0]["Nom_Torre"];
		else return "";
	}
	
	public function getPath(int $id) {
		$rs = $this->query("SELECT 
				tb1.ID as ID_Torre,
				tb1.Nom_Torre as Nom_Torre,
				tb2.ID_Empreendimento as ID_Empreendimento,
				tb2.Nom_Empreendimento as Nom_Empreendimento
			FROM {$this->table} as tb1 
			INNER JOIN {$this->tables['Empreendimentos']} as tb2 ON tb1.ID_Empreendimento = tb2.ID_Empreendimento
			WHERE tb1.ID = '$id'");
		if ($rs) return $rs[0];
		else return [];
	}
}