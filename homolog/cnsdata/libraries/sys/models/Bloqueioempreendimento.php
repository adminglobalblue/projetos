<?php 
if (!class_exists("Model")) include "Model.php";

class Bloqueioempreendimento extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getOperadora($ID_Operadora, $ID_Empreendimento) {
        $rs = $this->find("ID_OpePre = '$ID_Operadora' AND tipo = 'O' AND ID_Empreendimento = '$ID_Empreendimento'");
		return $this->count();
	}
	
	public function getPrestadora($ID_Prestadora, $ID_Empreendimento) {
        $rs = $this->find("ID_OpePre = '$ID_Prestadora' AND tipo = 'P' AND ID_Empreendimento = '$ID_Empreendimento'");
		return $this->count();
	}
	
	public function getTecnicoOperadora($ID_Tecnico, $ID_Empreendimento) {
		$rs = $this->find("ID_Tecnico = '$ID_Tecnico' AND tipo = 'TO' AND ID_Empreendimento = '$ID_Empreendimento'");
		return $this->count();
	}
	
	public function getTecnicoPrestadora($ID_Tecnico, $ID_Empreendimento) {
		$rs = $this->find("ID_Tecnico = '$ID_Tecnico' AND tipo = 'TP' AND ID_Empreendimento = '$ID_Empreendimento'");
		return $this->count();
	}
}
