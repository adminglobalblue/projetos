<?php
include dirname(__FILE__).'/../PHPMailer/PHPMailerAutoload.php';
include dirname(__FILE__).'/constants.php';
if (!class_exists("Validacao")) include dirname(__FILE__)."/../Validacao/Validacao.php";

// get sc_apl_class
$aliasApps = [ // alias das aplicações, os sc_apl_class tem o nome da aplicação e não do alias
	"menu" => "menuArvore"
];
$appName = basename(pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME)); // pega o alias da aplicação corrente
$appName = $aliasApps[$appName] ?? $appName;
$GLOBALS["_self"] = $GLOBALS["contr_$appName"] ?? null; // procura o sc_apl_class no GLOBALS

if ($GLOBALS["_self"]) {
	$_Validacao = new Validacao($GLOBALS["_self"]);
	$_Validacao->_do();
}

switch($appName) {
	case("menuArvore"):
		$_SESSION['hticnsdata']['display_mobile'] = true;		
	break;
	default:
		$_SESSION['hticnsdata']['display_mobile'] = false;
	break;
}

$strQuery = $DbError = $DbRs = [];
$DbOk = null;
function DbQuery($sc, $query) {
	$strQuery[] = $query;
	if ($rs = $sc->Db->Execute($query)) {
		$DbError[] = null;
		$DbOk = true;
		$DbRs[] = $rs;
	} elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1) {
		$DbError[] = $sc->Db->ErrorMsg();	
		$DbOk = false;
	}
	_select($rs);
	return $rs;
}

function url_lib($scope, $library, $file){
	return "../_lib/libraries/$scope/$library/$file";
}

function deleteElementHTML($query) {
	echo '
	<style>
		'.$query.' {display:none !important;}
	</style>
	<script>
		$(document).ready(function(){
        	var elem = document.querySelector("'.$query.'");
			elem.parentNode.removeChild(elem);
        });
	</script>';
}

function getIP (){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		return $_SERVER['REMOTE_ADDR'];
	}
}

function base64_url_encode($data, $json = true) {
	if ($json) {
		$data = json_encode($data,JSON_UNESCAPED_UNICODE);
	} 
	return strtr(base64_encode($data), '+/=', '._-');
}

function base64_url_decode($data, $json = true) {
	$data = strtr($data, '._-', '+/=');
	$data = base64_decode($data);
	if ($json) {
		$data = json_decode($data, true);
	} 
	return $data;
}

function Utf8_ansi($valor='') {
    $utf8_ansi2 = array(
    "\u00c0" =>"À",
    "\u00c1" =>"Á",
    "\u00c2" =>"Â",
    "\u00c3" =>"Ã",
    "\u00c4" =>"Ä",
    "\u00c5" =>"Å",
    "\u00c6" =>"Æ",
    "\u00c7" =>"Ç",
    "\u00c8" =>"È",
    "\u00c9" =>"É",
    "\u00ca" =>"Ê",
    "\u00cb" =>"Ë",
    "\u00cc" =>"Ì",
    "\u00cd" =>"Í",
    "\u00ce" =>"Î",
    "\u00cf" =>"Ï",
    "\u00d1" =>"Ñ",
    "\u00d2" =>"Ò",
    "\u00d3" =>"Ó",
    "\u00d4" =>"Ô",
    "\u00d5" =>"Õ",
    "\u00d6" =>"Ö",
    "\u00d8" =>"Ø",
    "\u00d9" =>"Ù",
    "\u00da" =>"Ú",
    "\u00db" =>"Û",
    "\u00dc" =>"Ü",
    "\u00dd" =>"Ý",
    "\u00df" =>"ß",
    "\u00e0" =>"à",
    "\u00e1" =>"á",
    "\u00e2" =>"â",
    "\u00e3" =>"ã",
    "\u00e4" =>"ä",
    "\u00e5" =>"å",
    "\u00e6" =>"æ",
    "\u00e7" =>"ç",
    "\u00e8" =>"è",
    "\u00e9" =>"é",
    "\u00ea" =>"ê",
    "\u00eb" =>"ë",
    "\u00ec" =>"ì",
    "\u00ed" =>"í",
    "\u00ee" =>"î",
    "\u00ef" =>"ï",
    "\u00f0" =>"ð",
    "\u00f1" =>"ñ",
    "\u00f2" =>"ò",
    "\u00f3" =>"ó",
    "\u00f4" =>"ô",
    "\u00f5" =>"õ",
    "\u00f6" =>"ö",
    "\u00f8" =>"ø",
    "\u00f9" =>"ù",
    "\u00fa" =>"ú",
    "\u00fb" =>"û",
    "\u00fc" =>"ü",
    "\u00fd" =>"ý",
    "\u00ff" =>"ÿ");
    return strtr($valor, $utf8_ansi2);      
}

function _router($sc) {
	$act = $_GET["act"] ?? null;
	if ($act) {
		$response = responseJSON();
		$action = $act."Action";
		if (method_exists($sc, $action)) {
			$sc->$action();
		} elseif (method_exists($sc, $act)) {
			$sc->$act();
		} else {
			$response->status = false;
			$response->code = "404";
			$response->msg = "Ação não encontrada";
			$response->post = $_POST;
			$response->get = $_GET;
			sendResponse($response, true);
		}
	}
}

function responseJSON() {
	$response = new stdClass();

	$response->status = null;
	$response->code = null;
	$response->data = null;
	$response->msg = null;
	$response->redirect = null;

	return $response;
}

function sendResponse($response, $clear = false) {
	if ($clear) ob_clean();
	header("Content-type: application/json");
	echo json_encode($response);
	die();
}

function _select(&$rs) {
	if (is_object($rs) && get_class($rs) == "ADORecordSet_pdo") {
		$i = 0;
		while (!$rs->EOF){
			foreach($rs->fields as $key => $fields) {
				if (!is_numeric($key)) {
					$nRs[$i][$key] = $fields;
				}
			}
		   $rs->MoveNext(); $i++;
		}
		$rs->Close();
		$rs = isset($nRs) ? $nRs : [];
	} else return false;
}

function isSecurePass($pass, $level = 1) {
	if (strlen($pass) < 8) return false;
	$procPass = [];
	if ($level == 1) {
		preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$/", $pass, $procPass);
	} elseif ($level == 2) {
		preg_match("/^(?-i)(?=^.{8,}$)((?!.*\s)(?=.*[A-Z])(?=.*[a-z]))(?=(1)(?=.*\d)|.*[^A-Za-z0-9])^.*$/", $pass, $procPass);
	}
	if (isset($procPass[0]) && $procPass[0] == $pass) return true;
	else return false;
}

function valDate($date, $format = 'Y-m-d') {
	$date = trim($date);
    $d = new DateTime($date);
    return $d && $d->format($format) == $date;
}

function convertNumberInStringHour ($h) {
    $m = abs($h) - floor(abs($h));
    $h = (String) floor($h);
    $m = (String) round($m * 60);
    $h = strlen($h) == 1 ? "0".$h : $h;
    $m = strlen($m) == 1 ? "0".$m : $m;
    return "$h:$m";	
}

function convertHourInNumberInt ($d1, $d2) {
	return abs(round(($d1 - $d2)/3600, 16));
}

function isValidRG ($rg) {
	preg_match("/((^[0-9]{10}$|^[0-9]{9}$|^[0-9]{8}$)|(^[0-9]{9}[xX]$|^[0-9]{8}[xX]$|^[0-9]{7}[xX]$))/", trim($rg), $rgResult);
	return $rgResult[0] == trim($rg);
}
function isValidPhone (string $phone, $type = "fixo/cel") {
	$phone = trim($phone);
	if ($type == "fixo") {
		return strlen($phone) == 10;
	} elseif ($type == "cel") {
		return strlen($phone) == 11;
	} elseif ($type == "fixo/cel") {
		return isValidPhone($phone, "fixo") || isValidPhone($phone, "cel");
	} else return false;
}
function isValidCNPJ($cnpj) {
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
}

function randomStr($length = 10, $chars = '1234567890') {
	// Alpha lowercase
	if ($chars == 'alphalower') $chars = 'abcdefghijklmnopqrstuvwxyz';
	// Numeric	
	if ($chars == 'numeric') $chars = '1234567890';
	// Alpha Numeric
	if ($chars == 'alphanumeric') $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    // Hex
	if ($chars == 'hex') $chars = 'ABCDEF1234567890';
	$charLength = strlen($chars)-1;
    $randomString = '';
	for($i = 0 ; $i < $length ; $i++) {
		$randomString .= $chars[mt_rand(0,$charLength)];
    }
	return $randomString;
}

function isValidEmail ($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function deleteDirectory($dirname) {
    if (is_dir($dirname)) $dir_handle = opendir($dirname);
	if (!$dir_handle) return false;
	while($file = readdir($dir_handle)) {
	    if ($file != "." && $file != "..") {
	    	if (!is_dir($dirname."/".$file)) {
	        	unlink($dirname."/".$file);
	        } else {
	        	delete_directory($dirname.'/'.$file);
	       	}
		}
	}
	closedir($dir_handle);
	rmdir($dirname);
	return true;
}

function getCnpjData($data) {
	$response = [];
	$data['cnpj'] = preg_replace("/[^0-9]/", "", $data['cnpj']);
	$data = curlExec( [
				"url" => "https://www.receitaws.com.br/v1/cnpj/".$data['cnpj'],
				"method" => "GET"
			]);
	if ($data['output']) {
		$data['output'] = json_decode($data['output'], true);
		if ($data['output']['status'] != "OK") {
			$response['m'] = "CNPJ não encontrado";
			$response['s'] = false;
			return;
		}
		$response['m'] = "OK";
		$response['s'] = true;
		$response['d'] = $data['output'];
	} else {
		$response['m'] = $data;
		$response['s'] = false;
	}
	return $response;
}

function curlExec($data) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $data['url']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, isset($data['method']) ? $data['method'] : "POST");
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, isset($data['data']) ? $data['data'] : false);
		curl_setopt($ch, CURLOPT_TIMEOUT_MS, isset($data['timeout']) ? $data['timeout'] : 5000);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data['output'] = curl_exec($ch);
		$data['info'] = curl_getinfo($ch);
		$data['error'] = curl_error($ch);
		$data['nerror'] = curl_errno($ch);
		curl_close($ch);
		return $data;
	}

function mountURL ($url, $param) {
	$url = $_SERVER['REQUEST_SCHEME']."://".
		$_SERVER['HTTP_HOST']."/".
		$_SERVER['SCRIPT_NAME']."/../../".
		$url."/".$param;
	return $url;
}

function mask($val, $mask) {
    $valLen = strlen($val);
    $maskToUse = null;
    for($i = 0; $i < count($mask); $i++) {
        $m = $mask[$i];
        preg_match_all("/#/", $m, $sharpLen);
        $sharpLen = count($sharpLen[0]);
        if ($valLen == $sharpLen) {
            $maskToUse = $m;
            $i = count($mask);
        }
    }
    if (!$maskToUse) {
        for($i = 0; $i < count($mask); $i++) {
            $m = $mask[$i];
            preg_match_all("/#/", $m, $sharpLen);
            $sharpLen = count($sharpLen[0]);
            if (!$maskToUse && $valLen < $sharpLen) {
                $maskToUse = $m;
                $i = count($mask);
            } else if (!$maskToUse && $i == count($mask)-1){
                $maskToUse = $mask[0];
            }
        }
    }
    $mask = $maskToUse;
 	$maskared = '';
 	$k = 0;
 	for($i = 0; $i<=strlen($mask)-1; $i++) {
 		if($mask[$i] == '#') {
 			if(isset($val[$k])) $maskared .= $val[$k++];
 		} else {
 			if(isset($mask[$i])) $maskared .= $mask[$i];
 		}
 	}
 	return $maskared;
}

class sendEmail {
	public $TO;
	public $SUBJECT;
	public $MESSAGE;
	public $CC;
	public $BCC;
	public $ANEXO;
	public $ALT;
	public $DEBUG;
	
	public $response = [];
	public $c;
	
	public function __construct() {
		$this->c = getConstants();
	}
	
	public function send() {
		if (!$this->TO && !$this->CC && !$this->BCC) {
			$this->response['s'] = false;
			$this->response['c'] = 'noTo';
			$this->response['m'] = 'Destinatário necessário';
		} else if (!$this->MESSAGE && !$this->ANEXO && !$this->ALT){
			$this->response['s'] = false;
			$this->response['c'] = 'noContent';
			$this->response['m'] = 'Conteúdo necessário';
		}
		if (count($this->response)) return $this->response;
		
		$mail = new PHPMailer;

		$mail->SMTPDebug = $this->DEBUG ? $this->DEBUG : 0;
		
		$mail->isSMTP();
		$mail->Host = $this->c['MailSMTP'];
		$mail->SMTPAuth = true;
		$mail->Username = $this->c['MailFrom'];
		$mail->Password = $this->c['MailPass'];
		$mail->SMTPSecure = false;
		$mail->Port = $this->c['MailPORT'];
		$mail->CharSet = 'UTF-8';
		$mail->setFrom($this->c['MailFrom'], $this->c['MailFromName']);
		$mail->addReplyTo($this->c['MailFrom'], $this->c['MailFromName']);
		
		if (is_array($this->TO)) { 
			foreach($this->TO as $to) {
				$mail->addAddress($to);
			}
		} else $mail->addAddress($this->TO);
		if (is_array($this->CC)) {
			foreach($this->CC as $cc) {
				$mail->addCC($cc);
			}
		} else $mail->addCC($this->CC);
		if (is_array($this->BCC)) {
			foreach($this->BCC as $bcc) {
				$mail->addBCC($bcc);
			}
		} else $mail->addBCC($this->BCC);
		if (is_array($this->ANEXO)) {
			foreach($this->ANEXO as $anexo) {
				$mail->addAttachment($anexo);
			}
		} else $mail->addAttachment($this->ANEXO);
		
		$mail->isHTML(true); 

		$mail->Subject = $this->SUBJECT;
		$mail->Body    = $this->MESSAGE ? $this->MESSAGE : '';
		$mail->AltBody = $this->ALT ? $this->ALT : $this->ALT;

		if(!$mail->send()) {
			return $mail->ErrorInfo;
			$this->response['s'] = false;
			$this->response['c'] = 'emailNotSend';
			$this->response['m'] = 'Não foi possível enviar o e-mail';
			$this->response['e'] = $mail->ErrorInfo;
		} else {
			$this->response['s'] = true;
			$this->response['c'] = 'emailSend';
			$this->response['m'] = 'Email enviado com sucesso';
		}
		return $this->response;
	}

	public function mountData() {
		$data = [
			'TO' => $this->TO,
			'SUBJECT' => $this->SUBJECT,
			'MESSAGE' => $this->MESSAGE,
			'CC' => $this->CC,
			'TPCC' => $this->TPCC,
			'ANEXO'=> $this->ANEXO];
		return $data;
	}
}

class manageSession {
	public $sessionData;
	public $permissionData;
	public $c;
	
	public function __construct($forceRedir = false) {
		if(session_status() != PHP_SESSION_ACTIVE) session_start();
		$this->c = getConstants();
		$this->sessionData = $this->c['sessionData'];
		$this->permissionData = $this->c['permissionData'];
		if (!$this->isLogged() && $forceRedir) {
			header('Location: ../'.$this->c['logoutApp']);
		}
	}
	
	public function set($data) {
        $this->setNew($data);
		/*foreach($data as $key => $val) {
			if(isset($this->sessionData[$key])) {
				$_SESSION[$this->sessionData[$key]] = $val;
			}
		}*/
	}
	
	public function setNew($data) {
		foreach($data as $key => $val) {
			if (!isset($_SESSION['storageSassKey'])) $_SESSION['storageSassKey'] = [];
			if (!in_array($key, $_SESSION['storageSassKey'])) array_push($_SESSION['storageSassKey'], $key);
			array_push($_SESSION['storageSassKey'], $key);
			$_SESSION[$key] = $val;
		}
	}
	
	public function get($data = null) {
		if ($data) {
			return isset($_SESSION[$data]) ? $_SESSION[$data] : null;
		} else {
			$data = [];
			foreach($this->sessionData as $key) {
				$data[$key] = isset($_SESSION[$key]) ? $_SESSION[$key] : null;
			}
			foreach($this->permissionData as $key) {
				$data[$key] = isset($_SESSION[$key]) ? $_SESSION[$key] : null;
			}
			return $data;
		}
	
	}
	
	public function destroy($data = null) {
		if ($data) {
			unset($_SESSION[$data]);
		} else { 
			//if ($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_NAME"] == "127.0.0.1") {
				foreach($this->c['sessionData'] as $key) {
					if (isset($_SESSION[$key])) unset($_SESSION[$key]);
				}
				if (isset($_SESSION['storageSassKey']) && is_array($_SESSION['storageSassKey'])) {
					foreach($_SESSION['storageSassKey'] as $key => $val) {
						if (isset($_SESSION[$key])) unset($_SESSION[$key]);
					}
				}
				foreach($this->c['permissionData'] as $key) {
					if (isset($_SESSION[$key])) unset($_SESSION[$key]);
				}
			//} else {
			//	session_destroy();
			//}
		}
	}
	
	public function isLogged() {
	if ($this->get('ID_Usuario') && $this->get('Nom_UserName')) return true;
		return false;
	}
	
	public function setPermission($data = null) {
		switch($this->get("ID_TipoUsuario")) {
			case("userGB"):
				$this->permissionData['typeUserView'] = "'userGB','userGBC','userOA','userOC','userPA','userPC','userGBT'";
			break;
			case("userOA"):
				$this->permissionData['typeUserView'] = "'userPA','userPC'";
			break;
			default:
				$this->permissionData['typeUserView'] = "''";
			break;
		}
		$this->setNew(['typeUserView' => $this->permissionData['typeUserView']]);
		
		if ($data) {
			if (isset($data['listPrestadores'])) $this->setNew(['listPrestadores' => $data['listPrestadores']]); 
			if (isset($data['tipoTecnico'])) $this->setNew(['tipoTecnico' => $data['tipoTecnico']]); 
			if (isset($data['gridViewSAE'])) $this->setNew(['gridViewSAE' => $data['gridViewSAE']]);
		}
	}
	
	public function setPermissionProfile($data) {
		if (isset($data[0][0])) {
			$dataProfile = $this->get('profile') ? $this->get('profile') : [];
			foreach($data as $row) {
				if (!isset($dataProfile[$row[0]])) $dataProfile[$row[0]] = [];
				$dataProfile[$row[0]][$row[1]] = ['v' => $row[2], 'a' => json_decode($row[3], true)];
			}
			$this->setNew(['profile' => $dataProfile]);
		}
	}
	
	public function getPermissionData () {
		$data = [];
		foreach($this->permissionData as $key) {
			$data[$key] = $this->get($key) ? $this->get($key) : null;
		}
		return $data;
	}
	
	public function setMessage($msg = null, $title = null, $type = "none") {
		$_SESSION['alerts'] = $this->get('alerts') ? $this->get('alerts') : ['msg' => [], 'type' => '', 'title' => ''];
		if ($msg) {
			array_push($_SESSION['alerts']['msg'], $msg);
			$_SESSION['alerts']['type'] = $type;
			$_SESSION['alerts']['title'] = $title;
		}
	}
	
	public function getMessage($mountHTML = false) {
		if ($this->get('alerts')) {
			$text = '';
			$alerts = $this->get('alerts');
			foreach($alerts['msg'] as $msg) {
				$text .= "$msg<br>";
			}
			$_SESSION['alerts']['msg'] = $text;
			$data = $_SESSION['alerts'];
		} else $data = null;
		$this->destroy('alerts');
		if ($mountHTML) {
			if ($data) {
				$data['type'] = $data['type'] ? $data['type'] : "danger";
				return "<script>sModal(`show`, `{$data['title']}`, `{$data['msg']}`, {type:`{$data['type']}`});</script>";
			}
		} else {
			return $data;
		}
	}
	
	public function mapTableData($data, $table) {
		$dataReturn = [];
		if (isset($this->c['relacaoCampoTabela'][$table])) {
			foreach($data as $key => $val) {
				$dataReturn[$this->c['relacaoCampoTabela'][$table][$key]] = $val;
			}
		}
		return $dataReturn;
	}
	
	public function setIUDState($sc, $IUD = "", $state = true, $content = "") {
		if (!$IUD || !$sc) return;
		$app = is_string($sc) ? $sc : (is_object($sc) && isset($sc->Ini->nm_cod_apl) ? $sc->Ini->nm_cod_apl : null);
		if (!$app) return;
		$this->set([$app."_IUDState" => ["IUD" => $IUD, "state" => $state, "message" => $content]]);
	}

	public function getIUDState($sc) {
		if (!is_object($sc)) return;
		$app = isset($sc->Ini->nm_cod_apl) ? $sc->Ini->nm_cod_apl : null;
		$SessionKey = $app."_IUDState";
		$SessionValue = $this->get($SessionKey);
		$this->destroy($SessionKey);
		if ($SessionValue) {
			if (!$SessionValue["message"]) {
				$message = [
					"I" => [
						"error" => isset($sc->Ini->Nm_lang['lang_label_insError']) ? $sc->Ini->Nm_lang['lang_label_insError'] : "Não foi possivel salvar, por favor tente novamente",
						"success" => isset($sc->Ini->Nm_lang['lang_label_insSuccess']) ? $sc->Ini->Nm_lang['lang_label_insSuccess'] : "Salvo com sucesso"
					],
					"U" => [
						"error" => isset($sc->Ini->Nm_lang['lang_label_updError']) ? $sc->Ini->Nm_lang['lang_label_updError'] : "Não foi possivel salvar, por favor tente novamente",
						"success" => isset($sc->Ini->Nm_lang['lang_label_updSuccess']) ? $sc->Ini->Nm_lang['lang_label_updSuccess'] : "Salvo com sucesso"
					],
					"D" => [
						"error" => isset($sc->Ini->Nm_lang['lang_label_delError']) ? $sc->Ini->Nm_lang['lang_label_delError'] : "Não foi possivel remover, por favor tente novamente",
						"success" => isset($sc->Ini->Nm_lang['lang_label_delSuccess']) ? $sc->Ini->Nm_lang['lang_label_delSuccess'] : "Removido com sucesso"
					]
				];
			} else {
				$message[$SessionValue["IUD"]][$SessionValue["state"]] = $SessionValue["message"];
			}
			return "<script>$(document).ready(function(){toastr.".$SessionValue["state"]."('', '".$message[$SessionValue["IUD"]][$SessionValue["state"]]."')});</script>";
		} 
		return;
	}
}
	
class mountDataPdf {
	public $c;
	
	public function __construct () {
		$this->c = getConstants();
	}
	
	public function get ($tbApp, $data) {
		$nData = [];
		foreach($data as $i => $row) {
			foreach($row as $key => $val) {
				$dKType = $this->c['pdf'][$tbApp]['itens'][$key];
				$nData[$i][$dKType['k']] = $dKType;
				$nData[$i][$dKType['k']]['v'] = $val;
			}
		}
		return $nData;
	}
}
?>