<?php 
if (!class_exists("Model")) include "Model.php";

class Pop extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT tb1.*, tb2.Nom_Empreendimento as Nom_Empreendimento FROM {$this->table} as tb1 INNER JOIN {$this->tables['Empreendimentos']} as tb2 ON tb2.ID_Empreendimento = tb1.ID_Empreendimento WHERE tb1.ID = '$id'");
		return $rs ?: null;
	}
}