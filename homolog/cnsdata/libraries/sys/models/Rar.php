<?php 
if (!class_exists("Model")) include "Model.php";

class Rar extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function getByCode(string $code) {
        $rs = $this->query("SELECT * FROM {$this->table} WHERE Code = '$code'");
		if ($rs) return $rs[0];
		else return null;
	}
	
	public function delete(int $id) {
        return $this->query("UPDATE {$this->table} SET Num_Ativo = 'R', Removido_em = '".date("Y-m-d H:i:s")."' WHERE ID = '$id'");
	}
	
	public function setStatus(int $id, string $status) {
		return $this->query("UPDATE {$this->table} SET Num_Status = '$status' WHERE ID = '$id'");
	}
	
	public function setEntregue(int $id) {
		return $this->query("UPDATE {$this->table} SET Entregue_em = '".date("Y-m-d H:i:s")."' WHERE ID = '$id'");
	}
	
	public function getTotalReembolso(int $id) {
		$rs = $this->query("SELECT ((SELECT SUM(ValorTransporteUtilizado) FROM {$this->tables["Raritens"]} WHERE CodeRar = tb_rar.Code) + ValorIdaTaxi + ValorVoltaTaxi + ValorIdaUber + ValorVoltaUber + Estacionamento + Refeicao + Pedagio) as TotalReembolso FROM {$this->table} WHERE ID = '$id'");
		if ($rs) return $rs[0]["TotalReembolso"];
		else return null;
	}
}
