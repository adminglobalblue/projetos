<?php 
if (!class_exists("Model")) include "Model.php";

class Condominos extends Model {
    public $table;

    public function __construct($sc) {
        $this->sc = $sc;
		$this->Db = $sc->Db;
        $this->table = isset($this->tables[get_class($this)]) ? $this->tables[get_class($this)] : null;
		$this->getManageSession();
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_Condomino = '$id'");
	}
	
	public function getCompanyNameById(int $id) {
        $rs = $this->query("SELECT Nom_Nome FROM {$this->table} WHERE ID_Condomino = '$id'");
		if ($rs) return $rs[0]["Nom_Nome"];
		else return null;
	}
	
	public function getEmpreendimentoById(int $id) {
        $rs = $this->query("SELECT tb2.Nom_Empreendimento as Nom_Empreendimento, tb2.ID_Empreendimento as ID_Empreendimento FROM {$this->table} as tb1 INNER JOIN {$this->tables["Empreendimentos"]} as tb2 ON tb2.ID_Empreendimento = tb1.ID_Empreendimento WHERE ID_Condomino = '$id'");
		if ($rs) return ["Nom_Empreendimento" => $rs[0]["Nom_Empreendimento"], "ID_Empreendimento" => $rs[0]["ID_Empreendimento"]];
		else return ["Nom_Empreendimento" => "", "ID_Empreendimento" => ""];
	}
}