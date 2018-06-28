<?php 
if (!class_exists("Model")) include "Model.php";

class Sae extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT 
				tb1.*,
				tb2.Nom_Operadoras as Nom_Operadora,
				tb3.Nom_RazaoSocial as Nom_Prestadora,
				tb4.Nom_Empreendimento as Nom_Empreendimento,
				(CASE
					WHEN tb1.Tipo_Cliente = 'C' THEN (SELECT tb5.Nom_Nome FROM tb_condominos as tb5 WHERE tb5.ID_Condomino = tb1.ID_Condomino)
					WHEN tb1.Tipo_Cliente = 'G' THEN 'GLOBALBLUE'
				END) as Nom_Cliente
			FROM {$this->table} as tb1
			LEFT JOIN {$this->tables["Operadoras"]} as tb2 ON tb2.ID_Operadoras = tb1.ID_Operadora 
			LEFT JOIN {$this->tables["Prestadores"]} as tb3 ON tb3.ID_Prestador = tb1.ID_Prestador
			INNER JOIN {$this->tables["Empreendimentos"]} as tb4 ON tb4.ID_Empreendimento = tb1.ID_Empreendimento
			WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByNum_SAE(string $Num_SAE) {
        $rs = $this->query("SELECT 
				tb1.*,
				tb2.Nom_Operadoras as Nom_Operadora,
				tb3.Nom_RazaoSocial as Nom_Prestadora,
				tb4.Nom_Empreendimento as Nom_Empreendimento,
				(CASE
					WHEN tb1.Tipo_Cliente = 'C' THEN (SELECT tb5.Nom_Nome FROM tb_condominos as tb5 WHERE tb5.ID_Condomino = tb1.ID_Condomino)
					WHEN tb1.Tipo_Cliente = 'G' THEN 'GLOBALBLUE'
				END) as Nom_Cliente
			FROM {$this->table} as tb1
			LEFT JOIN {$this->tables["Operadoras"]} as tb2 ON tb2.ID_Operadoras = tb1.ID_Operadora 
			LEFT JOIN {$this->tables["Prestadores"]} as tb3 ON tb3.ID_Prestador = tb1.ID_Prestador
			INNER JOIN {$this->tables["Empreendimentos"]} as tb4 ON tb4.ID_Empreendimento = tb1.ID_Empreendimento
			WHERE tb1.Num_SAE = '$Num_SAE'");
		if ($rs) return $rs[0];
		else return null;
	}
}
