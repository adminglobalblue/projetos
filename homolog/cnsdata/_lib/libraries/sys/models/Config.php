<?php 
if (!class_exists("Model")) include "Model.php";

class Config extends Model {
    public $table;

    public function __construct($sc) {
        parent::__construct($sc);
		$baseURL = $this->getByKey("baseURL");
		$this->session->set(["baseURL" => $baseURL]);
    }
	
	public function get() {
        $rs = $this->query("SELECT Chave, Valor, Descricao FROM {$this->table}");
		$dataConfig = [];
		if ($rs) {
			foreach($rs as $row) {
				$dataConfig[$row["Chave"]] = $row["Valor"];
			}
		}
		return $dataConfig;
	}
	
	public function getByKey(string $key) {
        $rs = $this->query("SELECT Chave, Valor, Descricao FROM {$this->table} WHERE Chave = '$key' LIMIT 1");
		if ($rs) {			
			return $rs[0]["Valor"];		
		}
		return null;
	}
}