<?php 
if (!class_exists("Model")) include "Model.php";

class Contatos extends Model {
    public function __construct($sc) {
        parent::__construct($sc);
    }


    public function getByCompany($ID, $OPE, $tipo = null) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_OPE = '$ID' AND Tipo_OPE = '$OPE' ".
            ($tipo ? "AND (SELECT ID_TipoContato FROM tb_tiposcontatos WHERE Code = '$tipo') = ID_TipoContato" : null)
        );
    }
}
