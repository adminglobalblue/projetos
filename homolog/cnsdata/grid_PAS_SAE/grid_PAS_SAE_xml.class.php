<?php

class grid_PAS_SAE_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("pt_br");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      $this->monta_html();
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nm_data    = new nm_data("pt_br");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo     .= "_grid_PAS_SAE";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "grid_PAS_SAE.xml";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['hticnsdata']['charset']) != strtolower($_SESSION['hticnsdata']['charset_html']))
      {
          $this->Grava_view = true;
      }
   }

   //----- 
   function grava_arquivo()
   {
      global $nm_lang;
      global
             $nm_nada, $nm_lang;

      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS_SAE']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS_SAE']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS_SAE']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['campos_busca'];
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false && !is_array($this->id))
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->tipo_op = $Busca_temp['tipo_op']; 
          $tmp_pos = strpos($this->tipo_op, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo_op))
          {
              $this->tipo_op = substr($this->tipo_op, 0, $tmp_pos);
          }
          $this->id_op = $Busca_temp['id_op']; 
          $tmp_pos = strpos($this->id_op, "##@@");
          if ($tmp_pos !== false && !is_array($this->id_op))
          {
              $this->id_op = substr($this->id_op, 0, $tmp_pos);
          }
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['where_pesq_filtro'];
      $this->nm_where_dinamico = "";
      $_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'on';
   sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$profile = $s->get("profile");

if (isset($profile["PAS"])) {
	if (($profile["PAS"]["EDITAR"]["v"] ?? "N") == "S") {
		$this->NM_cmp_hidden["aprovarpas"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']["aprovarpas"] = "on"; }
	} else {
		$this->NM_cmp_hidden["aprovarpas"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']["aprovarpas"] = "off"; }
	}
	
	if (($profile["PAS"]["CONSULTAR"]["v"] ?? "N") == "S") {
		$this->NM_cmp_hidden["download"] = "on";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']["download"] = "on"; }
	} else {
		$this->NM_cmp_hidden["download"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']["download"] = "off"; }
	}
} else {
	$this->NM_cmp_hidden["aprovarpas"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']["aprovarpas"] = "off"; }
	$this->NM_cmp_hidden["download"] = "off";if (!isset($this->NM_ajax_event) || !$this->NM_ajax_event) {$_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['php_cmp_sel']["download"] = "off"; }
}
$_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'off'; 
      if  (!empty($this->nm_where_dinamico)) 
      {   
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['where_pesq'] .= $this->nm_where_dinamico;
      }   
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['xml_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT ID, Num_Status, Referente, Cliente, Tipo_OP, ID_OP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT ID, Num_Status, Referente, Cliente, Tipo_OP, ID_OP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT ID, Num_Status, Referente, Cliente, Tipo_OP, ID_OP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT ID, Num_Status, Referente, Cliente, Tipo_OP, ID_OP from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT ID, Num_Status, Referente, Cliente, Tipo_OP, ID_OP from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT ID, Num_Status, Referente, Cliente, Tipo_OP, ID_OP from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      if (!$rs->EOF)
      {
         $this->id = $rs->fields[0] ;  
         $this->id = (string)$this->id;
         $this->num_status = $rs->fields[1] ;  
         $this->referente = $rs->fields[2] ;  
         $this->cliente = $rs->fields[3] ;  
         $this->tipo_op = $rs->fields[4] ;  
         $this->id_op = $rs->fields[5] ;  
         $this->id_op = (string)$this->id_op;
   $_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'on';
if (!isset($_SESSION['Num_SAE'])) {$_SESSION['Num_SAE'] = "";}
if (!isset($this->sc_temp_Num_SAE)) {$this->sc_temp_Num_SAE = (isset($_SESSION['Num_SAE'])) ? $_SESSION['Num_SAE'] : "";}
   ?><?php sc_include_library("sys", "initCustom", "onLoad.html"); ?><?php
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

 
      $nm_select = "SELECT
    	ID, Num_Status
	FROM
    	tb_pas 
	WHERE Num_Ativo != 'R' AND Origem = 'SAE' AND ID_Origem = '$this->sc_temp_Num_SAE'"; 
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
$listAprovar = array();
foreach($this->rs  as $row) {
	if ($row["Num_Status"] == "AA") {
		array_push($listAprovar, $row["ID"]);
	}
}
$this->onLoadJS(['listAprovar' => $listAprovar]);
if (isset($this->sc_temp_Num_SAE)) {$_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
$_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'off';
      }

      $xml_charset = $_SESSION['hticnsdata']['charset'];
      $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
      fwrite($xml_f, "<root>\r\n");
      if ($this->Grava_view)
      {
          $xml_charset_v = $_SESSION['hticnsdata']['charset_html'];
          $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
          fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
          fwrite($xml_v, "<root>\r\n");
      }
      while (!$rs->EOF)
      {
         $this->xml_registro = "<grid_PAS_SAE";
         $this->id = $rs->fields[0] ;  
         $this->id = (string)$this->id;
         $this->num_status = $rs->fields[1] ;  
         $this->referente = $rs->fields[2] ;  
         $this->cliente = $rs->fields[3] ;  
         $this->tipo_op = $rs->fields[4] ;  
         $this->id_op = $rs->fields[5] ;  
         $this->id_op = (string)$this->id_op;
         //----- lookup - num_status
         $this->look_num_status = $this->num_status; 
         $this->Lookup->lookup_num_status($this->look_num_status); 
         $this->look_num_status = ($this->look_num_status == "&nbsp;") ? "" : $this->look_num_status; 
         //----- lookup - referente
         $this->look_referente = $this->referente; 
         $this->Lookup->lookup_referente($this->look_referente); 
         $this->look_referente = ($this->look_referente == "&nbsp;") ? "" : $this->look_referente; 
         $this->sc_proc_grid = true; 
         $_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'on';
   sc_include_library("sys", "functions", "functions.php");

if ($this->tipo_op  == "O") {
	 
      $nm_select = "SELECT Nom_Operadoras, Num_CNPJ FROM tb_operadoras WHERE ID_Operadoras = '$this->id_op'"; 
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
	if (isset($this->rs [0])) {
		$this->razaosocial  = $this->rs [0]["Nom_Operadoras"];
		$this->cnpj_op  = $this->rs [0]["Num_CNPJ"];
	}
} else if ($this->tipo_op  == "P") {
	 
      $nm_select = "SELECT Nom_RazaoSocial, Num_CNPJ FROM tb_prestadores WHERE ID_Prestador = '$this->id_op'"; 
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
	if (isset($this->rs [0])) {
		$this->razaosocial  = $this->rs [0]["Nom_RazaoSocial"];
		$this->cnpj_op  = $this->rs [0]["Num_CNPJ"];
	}
}

$ID_PAS = $this->id ;
 
      $nm_select = "SELECT Arquivo FROM tb_pasarquivos WHERE ID_PAS = '$ID_PAS'"; 
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
$this->rs  = isset($this->rs [0]) ? $this->rs  : [];
$listFiles = [];
if (count($this->rs )) {
	foreach($this->rs  as $row) {
		$path = $this->Ini->path_doc."/../PAS/$ID_PAS/".$row["Arquivo"];
		if (file_exists($path)) {
			$listFiles[] = ["p"=>$path,"n"=>$row["Arquivo"]];
		}
	}
}

$this->download  = "<button class='scButton_default' style='width: 120px' data-pas='".
		base64_encode(json_encode(["path" => $this->Ini->path_doc, "ID_PAS" => $this->id ])).
	"' onclick='downloadPAS(event)'>Download (".(count($listFiles)).")</button>";
$_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->xml_registro .= " />\r\n";
         fwrite($xml_f, $this->xml_registro);
         if ($this->Grava_view)
         {
            fwrite($xml_v, $this->xml_registro);
         }
         $rs->MoveNext();
      }
      fwrite($xml_f, "</root>");
      fclose($xml_f);
      if ($this->Grava_view)
      {
         fwrite($xml_v, "</root>");
         fclose($xml_v);
      }

      $rs->Close();
   }
   //----- id
   function NM_export_id()
   {
         nmgp_Form_Num_Val($this->id, $_SESSION['hticnsdata']['reg_conf']['grup_num'], $_SESSION['hticnsdata']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['hticnsdata']['reg_conf']['neg_num'] , $_SESSION['hticnsdata']['reg_conf']['simb_neg'], $_SESSION['hticnsdata']['reg_conf']['num_group_digit']) ; 
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->id))
         {
             $this->id = sc_convert_encoding($this->id, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " id =\"" . $this->trata_dados($this->id) . "\"";
   }
   //----- aprovarpas
   function NM_export_aprovarpas()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->aprovarpas))
         {
             $this->aprovarpas = sc_convert_encoding($this->aprovarpas, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " aprovarpas =\"" . $this->trata_dados($this->aprovarpas) . "\"";
   }
   //----- download
   function NM_export_download()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->download))
         {
             $this->download = sc_convert_encoding($this->download, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " download =\"" . $this->trata_dados($this->download) . "\"";
   }
   //----- num_status
   function NM_export_num_status()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->look_num_status))
         {
             $this->look_num_status = sc_convert_encoding($this->look_num_status, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " num_status =\"" . $this->trata_dados($this->look_num_status) . "\"";
   }
   //----- razaosocial
   function NM_export_razaosocial()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->razaosocial))
         {
             $this->razaosocial = sc_convert_encoding($this->razaosocial, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " razaosocial =\"" . $this->trata_dados($this->razaosocial) . "\"";
   }
   //----- cnpj_op
   function NM_export_cnpj_op()
   {
         if (strlen($this->cnpj_op) < 14) 
         { 
             $this->cnpj_op = str_repeat(0, 14 - strlen($this->cnpj_op)) . $this->cnpj_op; 
         } 
         elseif (strlen($this->cnpj_op) > 14) 
         { 
             $this->cnpj_op = substr($this->cnpj_op, strlen($this->cnpj_op) - 14); 
         } 
         nmgp_Form_CicCnpj($this->cnpj_op) ; 
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->cnpj_op))
         {
             $this->cnpj_op = sc_convert_encoding($this->cnpj_op, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " cnpj_op =\"" . $this->trata_dados($this->cnpj_op) . "\"";
   }
   //----- referente
   function NM_export_referente()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->look_referente))
         {
             $this->look_referente = sc_convert_encoding($this->look_referente, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " referente =\"" . $this->trata_dados($this->look_referente) . "\"";
   }
   //----- cliente
   function NM_export_cliente()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->cliente))
         {
             $this->cliente = sc_convert_encoding($this->cliente, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " cliente =\"" . $this->trata_dados($this->cliente) . "\"";
   }
   //----- recusarpas
   function NM_export_recusarpas()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->recusarpas))
         {
             $this->recusarpas = sc_convert_encoding($this->recusarpas, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " recusarpas =\"" . $this->trata_dados($this->recusarpas) . "\"";
   }
   //----- tipo_op
   function NM_export_tipo_op()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->tipo_op))
         {
             $this->tipo_op = sc_convert_encoding($this->tipo_op, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " tipo_op =\"" . $this->trata_dados($this->tipo_op) . "\"";
   }
   //----- id_op
   function NM_export_id_op()
   {
         if ($_SESSION['hticnsdata']['charset'] == "UTF-8" && !NM_is_utf8($this->id_op))
         {
             $this->id_op = sc_convert_encoding($this->id_op, "UTF-8", $_SESSION['hticnsdata']['charset']);
         }
         $this->xml_registro .= " id_op =\"" . $this->trata_dados($this->id_op) . "\"";
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
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
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS_SAE'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - tb_pas :: XML</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">XML</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_PAS_SAE_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_PAS_SAE"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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
function onLoadJS($config=[])
{
$_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'on';
   
?>
<style>
	.scGridLabelFont.css_id_label {
	width: 1% !important;
	}
	.css_download_label, .css_aprovarpas_label {
	width: 1px !important;
	}
	.css_recusarpas_grid_line, .css_recusarpas_label {
		display: none !important;
	}
</style>
<script>
	listAprovar = JSON.parse('<?php echo json_encode(isset($config["listAprovar"]) ? $config["listAprovar"] : '{}'); ?>');
	elementPAS = '';
	$(document).ready(function(){
		if (listAprovar.length > 0) {
            $('[id^=id_sc_field_id_]').each(function(i,o){
				console.log($(o).html(), listAprovar.indexOf($(o).html()));
				if (listAprovar.indexOf($(o).html()) >= 0) {
                	aprovarpasSpan = $(o).closest('tr').find("[id^=id_sc_field_aprovarpas_]");
					recusarpasSpan = $(o).closest('tr').find("[id^=id_sc_field_recusarpas_]");
                	aprovarpasSpan.after(`
						<button class="scButton_default" style="margin-bottom: 3px" name="btn-aprovar-pas" data-target="#`+aprovarpasSpan.attr("id")+`">Aprovar</button>
						<button class="scButton_default nbtn_danger" name="btn-recusar-pas" data-target="#`+recusarpasSpan.attr("id")+`">Recusar</button>
					`);
				}
            });
            setTimeout(function(){
                $('[name=btn-aprovar-pas]').click(function(e){
                    confirmeAprovar($(e.target).data('target'));
                });
				$('[name=btn-recusar-pas]').click(function(e){
                    confirmeRecusar($(e.target).data('target'));
                });
            }, 1000);
        }
	});
	function clickPAS() {
		sModal('close');
		console.log(elementPAS, $(elementPAS));
		$(elementPAS).click();
	}
	function confirmeAprovar(e) {
		elementPAS = e;
		sModal('show', 
			   '', `
				Deseja aprovar esta PAS?<br>
			   <button class="btn btn-success" style="margin-top:20px" onclick="clickPAS()">Sim</button>
			   `, {}
		);
	}
	function confirmeRecusar(e) {
		elementPAS = e;
		sModal('show', 
			   '', `
				Deseja recusar esta PAS e solicitar o reenvio?<br>
			   <button class="btn btn-danger" style="margin-top:20px" onclick="clickPAS()">Sim</button>
			   `, {}
		);
	}
	function downloadPAS(e){
		ID_PAS = $(e.target).data('pas');
		if (ID_PAS) {
			window.open('../download_PAS?PAS='+ID_PAS);
		}
	}
</script>
<?php


$_SESSION['hticnsdata']['grid_PAS_SAE']['contr_erro'] = 'off';
}
}

?>
