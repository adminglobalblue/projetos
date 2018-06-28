<?php
if (!class_exists("sendEmail")) include dirname(__FILE__)."/../functions/functions.php";

class Validacao {
    public $_sendEmail;
    public $facePublica;
    public $facePrivada;
    public $forceRedirect = true;
    public $sc;
    public $dirname;
    public $ignoreLifeTime = false;
    public $redirectByLocationScript = "SCRIPT"; // LOCATION
    private $UUID = "3a0aecb3a1b48e19c88d9d50ab871b04";

    public function __construct(&$sc) {
        $this->_sendEmail = new sendEmail();
        $this->dirname = dirname(__FILE__);

        $this->sc = $sc;
        $this->getFacePublica();
    }

    private function genFacePublica() {
        $b64 = base64_encode(json_encode($this->getBaseFacePublica()));
        file_put_contents("{$this->dirname}/config.json", $b64);
    }

    private function saveFacePublica() {        
        $b64 = base64_encode(json_encode($this->facePublica));
        file_put_contents("{$this->dirname}/config.json", $b64);
    }

    private function getFacePublica() {
        if (file_exists("{$this->dirname}/config.json")) {
            $content = file_get_contents("{$this->dirname}/config.json");
            $content = json_decode(base64_decode($content));
            $this->facePublica = $content;
        } else {
            $this->genFacePublica();
        }
        if (!$this->facePublica) $this->facePublica = $this->getBaseFacePublica();
    }

    private function curlFacePrivada() {
        if ($this->sc->curlFacePrivada ?? null) {
            return;
        }
        $curl = curlExec([
            "url" => $this->facePublica->URL ?? "none",
            "method" => "GET"
        ]);
        $this->sc->curlFacePrivada = $this->facePrivada = json_decode(strtr($curl["output"], [
            "\r\n" => "",
            "\n" => "",
            "\r" => "",
        ]));    
    }

    private function getBaseFacePublica() {
        return (Object)[
            "DataGeracao" => date("Y-m-d H:i:s"),
            "UltimaAtualizacaoFalse" => null,
            "UltimaAtualizacaoTrue" => null,
            "LifeTime" => 0,
            "UUID" => $this->UUID,
            "Status" => false,
            "DataUltimoEmail" => null,
			"MailTo" => [
                "gabriel.soares@houseti.com.br",
                "gabriel.soaresdelima@gmail.com"
            ],
			"URL" => "https://hbox.houseti.com.br/s/AnT0JX1UMFrKUVK/download"
        ];
    }

    private function sendMailAlarm($SUBJECT, $MESSAGE) {
        if (!$this->facePublica->DataUltimoEmail || strtotime("+30 minutes", strtotime($this->facePublica->DataUltimoEmail)) < strtotime("now")) {
            $this->_sendEmail->TO = $this->facePublica->MailTo ?? [];
            $this->_sendEmail->SUBJECT = $SUBJECT;
            $this->_sendEmail->MESSAGE = $MESSAGE;
            $this->facePublica->DataUltimoEmail = date("Y-m-d H:i:s");
        }
    }

    private function getUUID() {
        return `dmidecode |grep UUID |cut -d: -f2 |sed 's/\s//g'`;
    }

    public function isValidFacePublica() {
        if ($this->facePublica) {
            $doVer = false;
            $facePublicaUltimaAtualizacao = $this->facePublica->UltimaAtualizacaoTrue ? (
                $this->facePublica->UltimaAtualizacaoFalse ? (
                    $this->facePublica->UltimaAtualizacaoTrue > $this->facePublica->UltimaAtualizacaoFalse ? $this->facePublica->UltimaAtualizacaoTrue : $this->facePublica->UltimaAtualizacaoFalse
                ) : $this->facePublica->UltimaAtualizacaoTrue
            ) : null;
            if ($facePublicaUltimaAtualizacao && !$this->ignoreLifeTime) {
                $LifeTime = $facePublicaUltimaAtualizacao == $this->facePublica->UltimaAtualizacaoFalse ? 5 : $this->facePublica->LifeTime;
                if (
                    strtotime("+{$LifeTime} minutes", strtotime($facePublicaUltimaAtualizacao)) <= strtotime("now")
                    ) {
                    $doVer = true;
                }
            } else $doVer = true;

            if ($doVer) {
                $this->curlFacePrivada();
                if ($this->facePrivada) {
                    $facePrivadaStatus = $this->facePrivada->Status ?? "none";
                    if ($facePrivadaStatus === false) {}
                    else {
                        if ($this->facePrivada->getUUID ?? false) $this->facePublica->UUID = md5($this->getUUID());
                        if ($this->facePublica->UUID == md5($this->facePrivada->UUID ?? null) || $facePrivadaStatus === true) {
                            $this->facePublica->UltimaAtualizacaoTrue = date("Y-m-d H:i:s");
                            $this->facePublica->LifeTime = $this->facePrivada->LifeTime ?? 0;
                            $this->facePublica->Status = true;
                            return true;
                        } 
                    }
                }
            } else {return true;}
        }
        $this->facePublica->UltimaAtualizacaoFalse = date("Y-m-d H:i:s");
        $this->facePublica->Status = false;
        return false;
    }

    public function redirect() {
        if ($this->sc->Ini->nm_cod_apl != "login" && $this->forceRedirect) {
            if ($this->redirectByLocationScript == "LOCATION")  header('Location: ../login?act=logout');
            if ($this->redirectByLocationScript == "SCRIPT") echo "<script>window.top.location = '../login?act=logout'</script>";
            die();
        }
    }

    public function _do() {
        if ($this->sc->hasDid ?? false) return $this->sc->hasDid;
        $this->sc->hasDid = true;
        $this->isValidFacePublica();
        $this->sc->isValidFacePublica = $this->facePublica->Status;
        if (!$this->sc->isValidFacePublica) {
            $this->sendMailAlarm("Verificação CNSDATA", "Inválido: ". json_encode([
                "Publica" => $this->facePublica, 
                "Privada" => $this->facePrivada
            ]));             
            $this->saveFacePublica();
            $this->redirect();
        }
        $this->saveFacePublica();
        return $this->sc->isValidFacePublica;
    }
}