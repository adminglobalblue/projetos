<?php 
if (!class_exists("Model")) include "Model.php";

class Antenariosposicoes extends Model {
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
			tb2.ID as ID_Antenario, tb2.Nom_Nome as Nom_Antenario, 
			tb3.ID_Empreendimento as ID_Empreendimento, tb3.Nom_Empreendimento as Nom_Empreendimento 
		FROM {$this->table} as tb1 
		INNER JOIN {$this->tables["Antenarios"]} as tb2 ON tb2.ID = tb1.ID_Antenarios 
		INNER JOIN {$this->tables["Empreendimentos"]} as tb3 ON tb3.ID_Empreendimento = tb2.ID_Empreendimento
		WHERE tb1.ID = '$id'");
	}
	
	public function getByFimVigencia($where) {
		return $this->query("SELECT 
			tb1.*, 
			tb2.ID as ID_Antenario, tb2.Nom_Nome as Nom_Antenario, 
			tb3.ID_Empreendimento as ID_Empreendimento, tb3.Nom_Empreendimento as Nom_Empreendimento 
		FROM {$this->table} as tb1 
		INNER JOIN {$this->tables["Antenarios"]} as tb2 ON tb2.ID = tb1.ID_Antenarios 
		INNER JOIN {$this->tables["Empreendimentos"]} as tb3 ON tb3.ID_Empreendimento = tb2.ID_Empreendimento
		WHERE tb1.FimVigencia $where");
	}
}