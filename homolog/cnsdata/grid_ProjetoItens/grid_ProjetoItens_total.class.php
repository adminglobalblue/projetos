<?php

class grid_ProjetoItens_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campos_busca'];
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang , $tb_itens_id_item;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq']; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from " . $this->Ini->nm_tabela . " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq']; 
      } 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
function ZipDownload()
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession(true);
$response = responseJSON();

$ProtocoloHex = $_GET["Protocolo"];

 
      $nm_select = "SELECT ProtocoloHex FROM tb_projetos WHERE ProtocoloHex = '$ProtocoloHex'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rsprojeto = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rsprojeto = false;
          $this->rsprojeto_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rsprojeto );
$this->rsprojeto  = isset($this->rsprojeto [0]) ? $this->rsprojeto [0] : false;

if (!$this->rsprojeto ) {
	$response->status = false;
	sendResponse($response, true);
}

$pathDoc = $this->Ini->path_doc."/../PROJETO/$ProtocoloHex/";
$ID_Projeto = $this->sc_temp_id_Projeto;

 
      $nm_select = "SELECT a.ID_Projeto as ID_Projeto, b.Code as Code, b.ID_Item as ID_Item FROM tb_projetoitensanalise a
INNER JOIN tb_itens b ON b.ID_Item = a.ID_Projetoitens WHERE a.ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->listitens = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->listitens = false;
          $this->listitens_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->listitens );
$this->listitens  = isset($this->listitens [0]) ? $this->listitens  : false;

$listCode = $listID_piItem = array();
if ($this->listitens ) {
	foreach($this->listitens  as $row) {
		$table = strtolower("tb_pi".$row["Code"]);
		 
      $nm_select = "SELECT ID FROM $table WHERE ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
		_select($this->rs );
		$this->rs  = isset($this->rs [0]) ? $this->rs  : false;
		if ($this->rs ) {
			$listID = array();
			foreach($this->rs  as $row2) {
				$listID[] = $row2["ID"];
			}
			$listItem[] = [
				"Code" => $row["Code"],
				"ID" => $listID
			];		
		}
	}
}

$listRs = array();
if ($listItem ?? 0) foreach($listItem as $item) {
	$listID_piItem = "'".implode("','", $item["ID"])."'";
	$sql = "SELECT CodeItem, Arquivo FROM tb_piarquivos a WHERE a.ID_piItem IN ($listID_piItem) AND a.CodeItem = '".$item["Code"]."'";
	 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->rs );
	$this->rs  = isset($this->rs [0]) ? $this->rs  : false;
	if ($this->rs ) {
		foreach($this->rs  as $row) {
			$listRs[] = $row;
		}
	}
	
	switch($item["Code"]) {
		case("MemorialDescritivoTecnico"):
			$listRs[] = [
				"Arquivo" => $ProtocoloHex."_memorialDescritivoTecnico.pdf",
				"CodeItem" => $item["Code"]
			];
		break;
		case("RelatorioFotografico"):
			$listRs[] = [
				"Arquivo" => $ProtocoloHex."_relatorioFotografico.pdf",
				"CodeItem" => $item["Code"]
			];
		break;
		case("LaudoVistoria"):
			$listRs[] = [
				"Arquivo" => $ProtocoloHex."_".$item["Code"].".pdf",
				"CodeItem" => $item["Code"]
			];
		break;
		case("SolicitacaoAutorizacaoVistoria"):
			$listRs[] = [
				"Arquivo" => $ProtocoloHex."_".$item["Code"].".pdf",
				"CodeItem" => $item["Code"]
			];
		break;
		case("DeclaracaoResponsabilidadeTecnica"):
			$listRs[] = [
				"Arquivo" => $ProtocoloHex."_".$item["Code"].".pdf",
				"CodeItem" => $item["Code"]
			];
		break;
	}
}


$listFiles = [];
if (count($listRs)) {
	foreach($listRs as $row) {
		$path = $pathDoc.$row["CodeItem"]."/".$row["Arquivo"];
		if (file_exists($path)) {
			$listFiles[] = ["p"=>$path,"n"=>$row["CodeItem"]."/".$row["Arquivo"]];
		}
	}
	
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$response->listRs = count($listFiles);
		$response->Rs = $listFiles;
		$response->originalRs = $listRs;
		$response->itens = $listItem;
		$response->pathDoc = $pathDoc;
		sendResponse($response, true);
	} 
	if (count($listFiles)) {
		$zip = new ZipArchive;
		$zipFileName = sys_get_temp_dir()."/".date('YmdHis').".zip";
		$zipCreate = $zip->open($zipFileName, ZIPARCHIVE::CREATE);
		if ($zipCreate === TRUE) {
			foreach($listFiles as $file) {
				$zip->addFile($file["p"], $file["n"]);
			}
			$zip->close();
			header('Content-Type: application/zip');
			header('Content-Length: ' . filesize($zipFileName));
			header('Content-Disposition: attachment; filename="'.$ProtocoloHex.'_'.date('dmY').'.zip"');
			header("Pragma: no-cache"); 
			header("Expires: 0"); 
			ob_clean();
			readfile($zipFileName);
		} else {
			echo "<script>window.close();</script>";
		}
		if (file_exists($zipFileName)) unlink($zipFileName);
	}
} else {
	
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$response->listRs = count($listRs);
		$response->Rs = $listRs;
		sendResponse($response, true);
	} 
}
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
function analiticsItem($ID_Projeto=0, $CodeItem="")
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
               
sc_include_library("sys", "models", "Projetos.php");
$_Projetos = new Projetos($this);
$Projeto = $_Projetos->getById(intval($ID_Projeto));
$Projeto = isset($Projeto[0]) ? $Projeto[0] : false;
if ($Projeto) {
        $table = strtolower("tb_pi".$CodeItem);
        switch($CodeItem) {
                    case("SolicitacaoAutorizacaoVistoria") :
                 
      $nm_select = "SELECT 
                    tb1.CartaConteudo as CartaConteudo,
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if (!$this->datars [0]["CartaConteudo"] && $this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("LaudoVistoria") :
                 
      $nm_select = "SELECT 
                    tb1.CartaConteudo as CartaConteudo,
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if (!$this->datars [0]["CartaConteudo"] && $this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("DeclaracaoResponsabilidadeTecnica") :
                 
      $nm_select = "SELECT 
                    tb1.CartaConteudo as CartaConteudo,
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if (!$this->datars [0]["CartaConteudo"] && $this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("SaeProjeto") :
                 
      $nm_select = "SELECT 
                    tb1.Num_SAE as Num_SAE
                FROM $table as tb1 WHERE tb1.ID_Projeto = '$ID_Projeto' AND tb1.Data_UltimaAtualizacao != ''"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if (!$this->datars [0]["Num_SAE"]) return 0;
            break;
            case("ArtProjeto") :
                 
      $nm_select = "SELECT 
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_PROJETO = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if ($this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("MemorialDescritivoTecnico") :
				if ($Projeto["MemorialDescritivoPronto"] == "S") {
					$sql = "SELECT 
							(SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
						FROM $table as tb1 WHERE tb1.ID_Projeto = '$ID_Projeto' AND tb1.Data_UltimaAtualizacao != ''";
					 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
					_select($this->datars );
					$this->datars  = isset($this->datars [0]) ? $this->datars  : false;
					if (!$this->datars ) return 0;
					if ($this->datars [0]["countAnexos"] == 0) return 0;
				} else {
					$table_contatos = $table."_contatos";
					$table_secaodoc = $table."_secaodoc";
					$table_materiais = $table."_materiais";
					
					if ($Projeto["ID_Condominos"]) {
						$sql = "SELECT 
							tb1.ClienteID_Condomino as ID_Condomino,
							tb1.ClienteID_Torre as ID_Torre,
							tb1.ClienteID_Andar as ID_Andar,
							tb1.ClienteID_Conjunto as ID_Conjunto
							FROM $table as tb1 WHERE tb1.ID_Projeto = '$ID_Projeto' AND tb1.Data_UltimaAtualizacao != ''";
						 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
						_select($this->datars );
						$this->datars  = isset($this->datars [0]) ? $this->datars  : false;
						if (!$this->datars ) return 0;
						if (!$this->datars [0]["ID_Condomino"] || !$this->datars [0]["ID_Torre"] || !$this->datars [0]["ID_Andar"] || !$this->datars [0]["ID_Conjunto"]) return 0;
					}
					
					$sql = "SELECT 
						count(*) as countContatos
						FROM $table_contatos as tb1 INNER JOIN $table as tb2 ON tb2.ID = tb1.ID_MemorialDescritivoTecnico WHERE tb2.ID_Projeto = '$ID_Projeto' AND tb2.Data_UltimaAtualizacao != ''";
					 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datarscontatos = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datarscontatos = false;
          $this->datarscontatos_erro = $this->Db->ErrorMsg();
      } 
;
					_select($this->datarscontatos );
					$this->datarscontatos  = isset($this->datarscontatos [0]) ? $this->datarscontatos  : false;
					if (!$this->datarscontatos ) return 0;
					if ($this->datarscontatos [0]["countContatos"] == 0) return 0;

					$sql = "SELECT 
						count(*) as countSecaoDoc
						FROM $table_secaodoc as tb1 INNER JOIN $table as tb2 ON tb2.ID = tb1.ID_MemorialDescritivoTecnico WHERE tb2.ID_Projeto = '$ID_Projeto' AND tb2.Data_UltimaAtualizacao != ''";
					 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datarssecaodoc = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datarssecaodoc = false;
          $this->datarssecaodoc_erro = $this->Db->ErrorMsg();
      } 
;
					_select($this->datarssecaodoc );
					$this->datarssecaodoc  = isset($this->datarssecaodoc [0]) ? $this->datarssecaodoc  : false;
					if (!$this->datarssecaodoc ) return 0;
					if ($this->datarssecaodoc [0]["countSecaoDoc"] == 0) return 0;

					
				}
            break;
            case("LayoutDeEncaminhamentoPlantaBaixa") :
				$sql = "SELECT 
                    count(*) as countAnexos
                FROM $table as tb1 LEFT JOIN tb_piarquivos as tb2 ON tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem' WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'";
                 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;				
                if (!$this->datars ) return 0;
                if ($this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("RelatorioFotografico") :
				$sql = "SELECT 
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE 
						tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem' AND
						IDFI = ".($Projeto["RelatorioFotograficoPronto"] == "S" ? "2" : "1").") as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'";
                 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if ($this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("SeguroResponsabilidadeCivil") :
                 
      $nm_select = "SELECT 
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if ($this->datars [0]["countAnexos"] == 0) return 0;
            break;
            case("LaudoRadiometrico") :
                 
      $nm_select = "SELECT 
                    (SELECT count(*) FROM tb_piarquivos as tb2 WHERE tb2.ID_piItem = tb1.ID AND tb2.CodeItem = '$CodeItem') as countAnexos
                FROM $table as tb1 WHERE tb1.Data_UltimaAtualizacao != '' AND tb1.ID_Projeto = '$ID_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datars = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datars = false;
          $this->datars_erro = $this->Db->ErrorMsg();
      } 
;
                _select($this->datars );
                $this->datars  = isset($this->datars [0]) ? $this->datars  : false;
                if (!$this->datars ) return 0;
                if ($this->datars [0]["countAnexos"] == 0) return 0;
            break;
        }
        return 1;
    }
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
function getEmailNotif()
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

$Num_TipoUsuario = $s->get("Num_TipoUsuario");
$ID_OPE = $s->get("ID_OPE");

 
      $nm_select = "SELECT ID_Operadora, ID_Prestadora, ID_Empreendimento FROM tb_projetos WHERE ID_projeto = '$this->sc_temp_id_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rsprojeto = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rsprojeto = false;
          $this->rsprojeto_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rsprojeto );
$this->rsprojeto  = isset($this->rsprojeto ) ? $this->rsprojeto [0] : array();

 
      $nm_select = "select b.ID_Usuario as ID_Usuario, b.ID_OPE as ID_OPE, b.Num_TipoUsuario as Num_TipoUsuario from tb_projetoanalisestatus a INNER JOIN tb_usuarios b ON b.ID_Usuario = a.ID_Usuario WHERE a.CodeStatus = 'aguardando_envio' AND a.ID_Projeto = '$this->sc_temp_id_Projeto' ORDER BY Data ASC LIMIT 1"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rsusercreator = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rsusercreator = false;
          $this->rsusercreator_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rsusercreator );
$this->rsusercreator  = isset($this->rsusercreator ) ? $this->rsusercreator [0] : array();

$listOperadorasRelacionadas = "'".$this->rsprojeto ["ID_Operadora"]."'";
$listPrestadorasRelacionadas = "'".$this->rsprojeto ["ID_Prestadora"]."'";

$sqlResponse = [
    "userGB" => array(),
    "userO" => array(),
    "userP" => array(),
    "userE" => array(),
    "tecGB" => array(),
    "contatoO" => array(),
    "contatoP" => array(),
    "contatoE" => array()
];

$sqlGBUsers = "SELECT a.Nom_Email1 as Email1, a.Nom_Email2 as Email2 FROM tb_usuarios a 
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'PROJETO' AND c.Nom_Funcao = 'NOTIFSTATUS' 
INNER JOIN tb_perfilpermissoes cc ON cc.ID_Perfil = a.ID_Perfil AND cc.ID_Permissoes = c.ID 
WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') AND cc.Valor = 'S' AND a.Num_Ativo = 'S' AND a.Num_TipoUsuario IN ('G', 'GT')";
 
      $nm_select = $sqlGBUsers; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["userGB"], $row);
}

$sqlOUsers = "SELECT a.Nom_Email1 as Email1, a.Nom_Email2 as Email2 FROM tb_usuarios a 
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'PROJETO' AND c.Nom_Funcao = 'NOTIFSTATUS' 
INNER JOIN tb_perfilpermissoes cc ON cc.ID_Perfil = a.ID_Perfil AND cc.ID_Permissoes = c.ID 
WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') AND cc.Valor = 'S' AND a.Num_Ativo = 'S' AND a.Num_TipoUsuario IN ('O') AND a.ID_OPE IN ($listOperadorasRelacionadas)";
 
      $nm_select = $sqlOUsers; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["userO"], $row);
}

$sqlPUsers = "SELECT a.Nom_Email1 as Email1, a.Nom_Email2 as Email2 FROM tb_usuarios a 
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'PROJETO' AND c.Nom_Funcao = 'NOTIFSTATUS' 
INNER JOIN tb_perfilpermissoes cc ON cc.ID_Perfil = a.ID_Perfil AND cc.ID_Permissoes = c.ID 
WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') AND cc.Valor = 'S' AND a.Num_Ativo = 'S' AND a.Num_TipoUsuario IN ('P') AND a.ID_OPE IN ($listPrestadorasRelacionadas)";
 
      $nm_select = $sqlPUsers; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["userP"], $row);
}

$sqlEUsers = "SELECT a.Nom_Email1 as Email1, a.Nom_Email2 as Email2 FROM tb_usuarios a 
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'PROJETO' AND c.Nom_Funcao = 'NOTIFSTATUS' 
INNER JOIN tb_perfilpermissoes cc ON cc.ID_Perfil = a.ID_Perfil AND cc.ID_Permissoes = c.ID 
WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') AND cc.Valor = 'S' AND a.Num_Ativo = 'S' AND a.Num_TipoUsuario IN ('E') AND a.ID_OPE = '".$this->rsprojeto ["ID_Empreendimento"]."'";
 
      $nm_select = $sqlEUsers; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$sqlResponse["userE"] = $this->rs  ? $this->rs [0] : array();
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["userE"], $row);
}

$sqlGBTec = "SELECT a.Nom_Email1 as Email1, a.Nom_Email2 as Email2 FROM tb_usuarios a
INNER JOIN tb_gbtecempreendimentos b ON b.ID_Usuario = a.ID_Usuario AND b.ID_Empreendimento = '".$this->rsprojeto ["ID_Empreendimento"]."' 
WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') AND a.Num_Ativo = 'S'";
 
      $nm_select = $sqlGBTec; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["tecGB"], $row);
}

$sqlContatoO = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
FROM tb_contatos a 
WHERE a.ID_OPE IN ($listOperadorasRelacionadas) AND a.Tipo_OPE = 'O' AND a.RecebeNotificacao = 'S' AND
(a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND a.Num_TipoUsuario = 'G'";
 
      $nm_select = $sqlContatoO; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["contatoO"], $row);
}


if (in_array($this->rsusercreator ["Num_TipoUsuario"], ["G", "GT", "P"])) {
    $sqlContatoP = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
    FROM tb_contatos a 
    WHERE a.ID_OPE IN ($listPrestadorasRelacionadas) AND a.Tipo_OPE = 'P' AND a.RecebeNotificacao = 'S' AND
    (a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND a.Num_TipoUsuario = 'G'";
} elseif ($this->rsusercreator ["Num_TipoUsuario"] == "O") {
    $sqlContatoP = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
    FROM tb_contatos a 
    WHERE a.ID_OPE IN ($listPrestadorasRelacionadas) AND a.Tipo_OPE = 'P' AND a.RecebeNotificacao = 'S' AND
    (a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND (a.Num_TipoUsuario = 'O' AND a.ID_OPE_Usuario = '".$this->rsusercreator ["ID_OPE"]."' OR a.Num_TipoUsuario = 'G')";
}

 
      $nm_select = $sqlContatoP; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["contatoP"], $row);
}

$sqlContatoE = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
FROM tb_contatos a 
WHERE a.ID_OPE = '".$this->rsprojeto ["ID_Empreendimento"]."' AND a.Tipo_OPE = 'E' AND a.RecebeNotificacao = 'S' AND
(a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND a.Num_TipoUsuario = 'G'";
 
      $nm_select = $sqlContatoE; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rs );
$this->rs  = $this->rs  ? $this->rs  : array();
foreach($this->rs  as $row) {
    array_push($sqlResponse["contatoE"], $row);
}

$listEmails = array();
foreach ($sqlResponse as $key => $contact) {
    foreach ($contact as $value) {
        if (isset($value["Email1"]) && $value["Email1"] != '') {
            array_push($listEmails, $value["Email1"]);
        } elseif (isset($value["Email2"] ) && $value["Email2"] != '') {
            array_push($listEmails, $value["Email2"]);
        } elseif (isset($value["Email3"]) && $value["Email3"] != '') {
            array_push($listEmails, $value["Email3"]);
        }
    }
}
$listEmails = array_unique($listEmails);
return $listEmails;
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
function getOwner()
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$ID_OPE = $s->get("ID_OPE");
$Num_TipoUsuario = $s->get("Num_TipoUsuario");
$Num_TipoUsuario = $Num_TipoUsuario == "GT" ? "G" : $Num_TipoUsuario;
$sql = "SELECT a.ID_Operadora as ID_Operadora, a.ID_Prestadora as ID_Prestadora FROM tb_projetos a 
	WHERE a.ID_projeto = '$this->sc_temp_id_Projeto'";
 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->getowner = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->getowner = false;
          $this->getowner_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->getowner );

if (isset($this->getowner [0])) {
	$isOwner = $Num_TipoUsuario == "P" && $ID_OPE == $this->getowner [0]["ID_Prestadora"] || $Num_TipoUsuario == "O" && $ID_OPE == $this->getowner [0]["ID_Operadora"];
	return ["ID_Prestadora" => $this->getowner [0]["ID_Prestadora"], "ID_Operadora" => $this->getowner [0]["ID_Operadora"], "isOwner" => $isOwner];
} else return false;
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
function getStatusProjeto()
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               
sc_include_library("sys", "models", "Projetos.php");
$_Projetos = new Projetos($this);

$rs = $_Projetos->getStatus(intval($this->sc_temp_id_Projeto));
return $rs;

if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
function router()
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
               
sc_include_library("sys", "functions", "functions.php");

$act = $_GET["act"] ?? null;
if ($act) {
	$response = responseJSON();
	$action = $act."Action";
    if (method_exists($this, $action)) {
        $this->$action();
    } elseif (method_exists($this, $act)) {
        $this->$act();
    } else {
		$response->status = false;
		$response->code = "404";
		$response->msg = "Ação não encontrada";
		$response->post = $_POST;
		$response->get = $_GET;
		sendResponse($response, true);
    }
}

$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
function sendMail($config=[])
{
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               
sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
$modelLogs = new Logs($this);
$s = new manageSession();

$m = new sendEmail();

 
      $nm_select = "SELECT a.ID_ProjetoTipo as ID_ProjetoTipo, a.Nom_ProjetoTipo as Nom_ProjetoTipo, b.ProtocoloHex as ProtocoloHex FROM tb_projetostipos a INNER JOIN tb_projetos b ON b.ID_TipoProjeto = a.ID_ProjetoTipo WHERE ID_projeto = '$this->sc_temp_id_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->tprojeto = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tprojeto = false;
          $this->tprojeto_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->tprojeto );
$this->tprojeto  = isset($this->tprojeto [0]) ? $this->tprojeto [0] : null;

$config["title"] = strtr($config["title"], [
	":Nom_ProjetoTipo:" => $this->tprojeto ["Nom_ProjetoTipo"] ? $this->tprojeto ["Nom_ProjetoTipo"] : "",
	":ProtocoloHex:" => $this->tprojeto ["ProtocoloHex"] ? $this->tprojeto ["ProtocoloHex"] : ""
]);
$config["content"] = strtr($config["content"], [
	":Nom_ProjetoTipo:" => $this->tprojeto ["Nom_ProjetoTipo"] ? $this->tprojeto ["Nom_ProjetoTipo"] : "",
	":ProtocoloHex:" => $this->tprojeto ["ProtocoloHex"] ? $this->tprojeto ["ProtocoloHex"] : ""
]);
$config["subject"] = strtr($config["subject"], [
	":Nom_ProjetoTipo:" => $this->tprojeto ["Nom_ProjetoTipo"] ? $this->tprojeto ["Nom_ProjetoTipo"] : "",
	":ProtocoloHex:" => $this->tprojeto ["ProtocoloHex"] ? $this->tprojeto ["ProtocoloHex"] : ""
]);
$config["footer"] = (isset($config["footer"]) ? strtr($config["footer"], [
	":Nom_ProjetoTipo:" => $this->tprojeto ["Nom_ProjetoTipo"] ? $this->tprojeto ["Nom_ProjetoTipo"] : "",
	":ProtocoloHex:" => $this->tprojeto ["ProtocoloHex"] ? $this->tprojeto ["ProtocoloHex"] : ""
]) : "GLOBALBLUE | CNSDATA");

$listEmails =$this->getEmailNotif();

if ($this->tprojeto ) {
	$emailData = [
		"alert" => $config["alert"],
		"title" => $config["title"],
		"content" => $config["content"],
		"footer" => $config["footer"]
	];
	
	$html = emailTemplate($emailData);
	$m->BCC = $listEmails;
	$m->SUBJECT = $config["subject"];
	$m->MESSAGE = $html;
	$modelLogs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Classe" => "Projetos",
		"Descricao" => 'Notificação por e-mail (Projetos)',
		"Conteudo" => ["id_projeto" => $this->sc_temp_id_Projeto, "ProtocoloHex" => $this->tprojeto ["ProtocoloHex"], "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
	]);
}
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
}
}

?>
