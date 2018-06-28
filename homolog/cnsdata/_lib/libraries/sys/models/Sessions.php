<?php 
if (!class_exists("Model")) include "Model.php";

class Sessions extends Model {
	public $session_id;
	public $thisSession;
	public $IP;
	public $othersSession;
	private $ID_Usuario;
	
    public function __construct($sc) {
        parent::__construct($sc);
    }
	
	public function load() {
		$this->ID_Usuario = $this->session->get("ID_Usuario");
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$this->IP = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$this->IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			$this->IP = $_SERVER['REMOTE_ADDR'];
		}
		
		$this->session_id = session_id();
		$this->md5Session_id = md5(session_id());
		$this->thisSession = $this->find("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID = '{$this->md5Session_id}'");
		$this->thisSession = $this->thisSession[0] ?? null;
		$this->othersSession = $this->find("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID != '{$this->md5Session_id}'");
	}
	
	public function init() {
		if ($this->thisSession) {
			return $this->thisSession;
		}
		$this->create([
			"SessionID" => $this->md5Session_id,
			"IP" => $this->IP,
			"Data" => date("Y-m-d H:i:s"),
			"ID_Usuario" => $this->ID_Usuario,
			"Ativo" => 'S',
		]);
		$this->save("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID != '{$this->md5Session_id}'", [
			"Ativo" => 'N'
		]);
	} 
	
	public function finish($del = false) {
		if ($del) {
			$this->del("ID_Usuario = '{$this->ID_Usuario}' AND SessionID = '{$this->md5Session_id}'");
		} else {
			$this->save("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID = '{$this->md5Session_id}'", [
				"Ativo" => 'N'
			]);
		}
	}
	
	public function upDate() {
		$this->save("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID = '{$this->md5Session_id}'", [
			"Data" => date("Y-m-d H:i:s")
		]);
	}
	
	public function isAtivo() {
		$this->thisSession = $this->find("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID = '{$this->md5Session_id}'");
		$this->thisSession = $this->thisSession[0] ?? null;
		return boolval($this->thisSession);
	}
	
	public function compareSessionID() {
		$this->othersSession = $this->find("Ativo = 'S' AND ID_Usuario = '{$this->ID_Usuario}' AND SessionID != '{$this->md5Session_id}'");
		return count($this->othersSession) > 0;
	}
}
