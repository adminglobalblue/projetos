<?php 
if (!class_exists("Model")) include "Model.php";

class Rejeicoes extends Model {
    public $ID_Usuario;
    public $Nom_Usuario;

    public function __construct($sc) {
        parent::__construct($sc);

        $this->ID_Usuario = $this->session->get("ID_Usuario");
        $this->Nom_Usuario = $this->session->get("Nom_Nome");
    }

    public function insertRejeicao($data) {
        $Tipo = $data["Tipo"] ?? null;
        $ID_Obj = $data["ID_Obj"] ?? null;
        $Data = date("Y-m-d H:i:s");
        $Mensagem = $data["Mensagem"] ?? null;
        $Objeto = json_encode($data["Objeto"] ?? null);
        if (!$Tipo || !$ID_Obj || !$Mensagem || !$Objeto) return "invalidData";

        return $this->create([
            "Tipo" => $Tipo,
            "ID_Obj" => $ID_Obj,
            "Data" => $Data,
            "Mensagem" => $Mensagem,
            "ID_Usuario" => $this->ID_Usuario,
            "Nom_Usuario" => $this->Nom_Usuario,
            "Objeto" => $Objeto
        ]);
    }

    public function getLastRejeicao($Tipo, $ID_Obj) {
        $rs = $this->find("Tipo = '$Tipo' AND ID_Obj = '$ID_Obj' ORDER BY Data DESC LIMIT 1");
        return $rs[0] ?? null;
    }
}