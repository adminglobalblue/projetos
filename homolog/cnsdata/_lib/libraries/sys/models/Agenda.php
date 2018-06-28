<?php 
if (!class_exists("Model")) include "Model.php";

class Agenda extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT 
			tb1.*, 
			tb2.Nome as TE_Nome, 
			tb2.TipoOverlay as TE_TipoOverlay,
			tb2.Permitido as TE_Permitido,
			tb2.Bloqueio as TE_Bloqueio,
			tb2.TipoInterno as TE_TipoInterno,
			tb2.Duplicar as TE_Duplicar,
			tb2.BloqueioAdicional as TE_BloqueioAdicional
			FROM {$this->table} as tb1 
			INNER JOIN tb_tiposeventos as tb2 ON tb1.Tipo_evento = tb2.Code
			WHERE tb1.ID = '$id'");
		return $rs[0] ?? false;
	}
}