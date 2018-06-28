<?php 
if (!class_exists("Model")) include "Model.php";

class Racks extends Model {
    public $table;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
    }
	
	public function getById(int $id) {
		return $this->query("SELECT 
			tb1.*, 
			tb2.ID as ID_Pop, tb2.Nom_POP as Nom_POP, 
			tb3.ID_Empreendimento as ID_Empreendimento, tb3.Nom_Empreendimento as Nom_Empreendimento 
		FROM {$this->table} as tb1 
		INNER JOIN {$this->tables["Pop"]} as tb2 ON tb2.ID = tb1.ID_POP 
		INNER JOIN {$this->tables["Empreendimentos"]} as tb3 ON tb3.ID_Empreendimento = tb2.ID_Empreendimento
		WHERE tb1.ID = '$id'");
	}
	
	public function getByFimVigencia($where) {
		return $this->query("SELECT 
			tb1.*, 
			tb2.ID as ID_Pop, tb2.Nom_POP as Nom_POP, 
			tb3.ID_Empreendimento as ID_Empreendimento, tb3.Nom_Empreendimento as Nom_Empreendimento 
		FROM {$this->table} as tb1 
		INNER JOIN {$this->tables["Pop"]} as tb2 ON tb2.ID = tb1.ID_POP 
		INNER JOIN {$this->tables["Empreendimentos"]} as tb3 ON tb3.ID_Empreendimento = tb2.ID_Empreendimento
		WHERE tb1.FimVigencia $where");
	}
}