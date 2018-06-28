<?php 
if (!class_exists("Model")) include "Model.php";

class Empreendimentoshorarios extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        return $this->query("SELECT * FROM {$this->table} WHERE ID_empreendimentoHorario = '$id'");
	}
	
	public function getByID_Empreendimento(int $id) {
        $rs = $this->query("SELECT Nom_Empreendimento FROM {$this->table} WHERE ID_Empreendimento = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getHorarioInsByID_Empreendimento(int $id) {
		$rs = $this->query("SELECT Hor_SegInstalacaoInicio as SegInicio,
			Hor_SegInstalacaoFim as SegFim,
			Hor_TerInstalacaoInicio as TerInicio,
			Hor_TerInstalacaoFim as TerFim,
			Hor_QuaInstalacaoInicio as QuaInicio,
			Hor_QuaInstalacaoFim as QuaFim,
			Hor_QuiInstalacaoInicio as QuiInicio,
			Hor_QuiInstalacaoFim as QuiFim,
			Hor_SexInstalacaoInicio as SexInicio,
			Hor_SexInstalacaoFim as SexFim,
			Hor_SabInstalacaoInicio as SabInicio,
			Hor_SabInstalacaoFim as SabFim,
			Hor_DomInstalacaoInicio as DomInicio,
			Hor_DomInstalacaoFim as DomFim FROM {$this->table} WHERE ID_Empreendimento = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
}