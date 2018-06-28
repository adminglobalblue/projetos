<?php
if (!class_exists("Model")) include "Model.php";
if (!class_exists("Config")) include "Config.php";
if (!class_exists("Apicalendario")) include "__FILE__/../../../../manualLibraries/Apicalendario.php";

class Feriados extends Model {
    public $table;    
    public $_Config;
    public $_Apicalendario;
    public $State;
    public $City;

	public function globals() {
		var_dump($GLOBALS);//["contr_blk_Apicalendario"]->Db);
	}
	
    public function __construct($sc) {
        parent::__construct($sc);
        $this->_Config = new Config($sc);
        $token = $this->_Config->getByKey("ApiCalendario::Token");
        $this->_Apicalendario = new Apicalendario($token);
    }
	
	public function getById(int $id) {
        $rs = $this->query("SELECT *FROM {$this->table} as WHERE ID = '$id'");
		if ($rs) return $rs[0];
		else return null;
	}
    
    public function getCountByLocation(int $year) {
        $this->State = $this->_Apicalendario->sanitizeString($this->State);
        $this->City = $this->_Apicalendario->sanitizeString($this->City, false);
        $rs = $this->query("SELECT count(*) as count FROM {$this->table} WHERE Ano = '$year' AND State = '{$this->State}' AND City = '{$this->City}'");
		if ($rs) return $rs[0]["count"];
		else return 0;
    }

    public function getByLocationDate(string $date) {
        $this->State = $this->_Apicalendario->sanitizeString($this->State);
        $this->City = $this->_Apicalendario->sanitizeString($this->City, false);
        $rs = $this->query("SELECT * FROM {$this->table} WHERE State = '{$this->State}' AND City = '{$this->City}' AND Date = '$date'");
		if ($rs) return $rs;
		else return null;
    }

	public function getByLocation(int $year, string $state, string $city) {
        $state = $this->_Apicalendario->sanitizeString($state);
        $city = $this->_Apicalendario->sanitizeString($city, false);
        $rs = $this->query("SELECT * FROM {$this->table} WHERE Ano = '$year' AND State = '$state' AND City = '$city'");
		if ($rs) return $rs;
		else return null;
    }
    
    public function insertRequested (array $years, $state = "", $city = "") {
        if (!$state) $state = $this->State;
        if (!$city) $city = $this->City;
        if (!$years || !$state || !$city) return false;
        $ExistLocation = $this->_Apicalendario->ifLocationExist($state, $city);
        foreach ($years as $year) {
            $request = $this->_Apicalendario->request($year, $state, $city);
            if (isset($request["xml"]) && $request["xml"]) {
                foreach($request["xml"]->event as $event) {
                    $this->insert([
                        "State" => $request["xml"]->location->state,
                        "City" => $request["xml"]->location->city,
                        "Date" => date("Y-m-d", strtotime(preg_replace("/\//", "-", $event->date))),
                        "Name" => $event->name,
                        "Description" => $event->description,
                        "Type" => $event->type,
                        "Type_code" => $event->type_code,
                        "ExistLocation" => $ExistLocation,
                        "Ano" => $year,
                    ]);
                }
            }
        }
    }

    public function insert(array $dd) {
        $dd["State"] = (isset($dd["State"]) ? $dd["State"] : null);
        $dd["City"] = (isset($dd["City"]) ? $dd["City"] : null);
        $dd["Date"] = (isset($dd["Date"]) ? $dd["Date"] : null);
        $dd["Name"] = (isset($dd["Name"]) ? $dd["Name"] : null);
        $dd["Description"] = (isset($dd["Description"]) ? $dd["Description"] : null);
        $dd["Type"] = (isset($dd["Type"]) ? $dd["Type"] : null);
        $dd["Type_code"] = (isset($dd["Type_code"]) ? $dd["Type_code"] : null);
        $dd["Criado_em"] = date("Y-m-d H:i:s");
        $dd["Num_Status"] = (isset($dd["Num_Status"]) ? $dd["Num_Status"] : ($dd["Type_code"] <= 3 ? 'S' : 'N'));
        $dd["Ano"] = (isset($dd["Ano"]) ? $dd["Ano"] : null);
        $dd["ExistLocation"] = (isset($dd["ExistLocation"]) ? ($dd["ExistLocation"] ? 'S' : 'N') : 'N');
        return $this->query(
            "INSERT INTO {$this->table} (State, City, Date, Name, Description, Type, Type_code, Criado_em, Num_Status, ExistLocation, Ano) 
            (SELECT '{$dd["State"]}', '{$dd["City"]}', '{$dd["Date"]}', '{$dd["Name"]}', '{$dd["Description"]}', '{$dd["Type"]}', '{$dd["Type_code"]}', '{$dd["Criado_em"]}', '{$dd["Num_Status"]}', '{$dd["ExistLocation"]}', '{$dd["Ano"]}' FROM dual WHERE NOT EXISTS (
                SELECT ID FROM {$this->table} WHERE Ano = '{$dd["Ano"]}' AND State = '{$dd["State"]}' AND City = '{$dd["City"]}' AND Date = '{$dd["Date"]}' AND Type_code = '{$dd["Type_code"]}'
            ))"
        );
    }
}
