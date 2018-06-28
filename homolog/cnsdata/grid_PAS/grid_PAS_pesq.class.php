<?php

class grid_PAS_pesq
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $cmp_formatado;
   var $nm_data;
   var $Campos_Mens_erro;

   var $comando;
   var $comando_sum;
   var $comando_filtro;
   var $comando_ini;
   var $comando_fim;
   var $NM_operador;
   var $NM_data_qp;
   var $NM_path_filter;
   var $NM_curr_fil;
   var $nm_location;
   var $nmgp_botoes = array();
   var $NM_fil_ant = array();

   /**
    * @access  public
    */
   function __construct()
   {
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   function monta_busca()
   {
      global $bprocessa;
      include("../_lib/css/" . $this->Ini->str_schema_filter . "_filter.php");
      $this->Ini->Str_btn_filter = trim($str_button) . "/" . trim($str_button) . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_filter_css  = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_filter);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['path_libs_php'] = $this->Ini->path_lib_php;
      $this->Img_sep_filter = "/" . trim($str_toolbar_separator);
      $this->Block_img_col  = trim($str_block_col);
      $this->Block_img_exp  = trim($str_block_exp);
      $this->Bubble_tail    = trim($str_bubble_tail);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
      $this->init();
      if ($this->NM_ajax_flag)
      {
          ob_start();
          $this->Arr_result = array();
          $this->processa_ajax();
          $Temp = ob_get_clean();
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          if ($this->Db)
          {
              $this->Db->Close(); 
          }
          exit;
      }
      if (isset($bprocessa) && "pesq" == $bprocessa)
      {
         $this->processa_busca();
      }
      else
      {
         $this->monta_formulario();
      }
   }

   /**
    * @access  public
    */
   function monta_formulario()
   {
      $this->monta_html_ini();
      $this->monta_cabecalho();
      $this->monta_form();
      $this->monta_html_fim();
   }

   /**
    * @access  public
    */
   function init()
   {
      global $bprocessa;
      $_SESSION['hticnsdata']['sc_tab_meses']['int'] = array(
                                  $this->Ini->Nm_lang['lang_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_mnth_june'],
                                  $this->Ini->Nm_lang['lang_mnth_july'],
                                  $this->Ini->Nm_lang['lang_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['hticnsdata']['sc_tab_meses']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['hticnsdata']['sc_tab_dias']['int'] = array(
                                  $this->Ini->Nm_lang['lang_days_sund'],
                                  $this->Ini->Nm_lang['lang_days_mond'],
                                  $this->Ini->Nm_lang['lang_days_tued'],
                                  $this->Ini->Nm_lang['lang_days_wend'],
                                  $this->Ini->Nm_lang['lang_days_thud'],
                                  $this->Ini->Nm_lang['lang_days_frid'],
                                  $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['hticnsdata']['sc_tab_dias']['abr'] = array(
                                  $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                  $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                  $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                  $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                  $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                  $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                  $this->Ini->Nm_lang['lang_shrt_days_satd']);
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      $pos_path = strrpos($this->Ini->path_prod, "/");
      $this->NM_path_filter = $this->Ini->root . substr($this->Ini->path_prod, 0, $pos_path) . "/conf/filters/";
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['opcao'] = "igual";
    if (!$this->NM_ajax_flag && (!isset($bprocessa) || $bprocessa != "pesq"))
    {
      global $header_cond, $header,
             $id_cond, $id, $id_autocomp,
             $referente_cond, $referente,
             $selectorigem_cond, $selectorigem,
             $datacriacao_cond, $datacriacao, $datacriacao_dia, $datacriacao_mes, $datacriacao_ano, $datacriacao_hor, $datacriacao_min, $datacriacao_seg,
             $num_status_cond, $num_status,
             $statusprojeto_cond, $statusprojeto,
             $tipo_op_cond, $tipo_op,
             $id_op_cond, $id_op,
             $condominio_cond, $condominio, $condominio_autocomp,
             $cliente_cond, $cliente, $cliente_autocomp,
             $end_obra_cidade_cond, $end_obra_cidade, $end_obra_cidade_autocomp,
             $id_origem_cond, $id_origem, $id_origem_autocomp;
      $_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'on';
   sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
?>

<script src="<?= sc_url_library('sys', 'initCustom', 'jquery.js'); ?>"></script>
<?php sc_include_library("sys", "initCustom", "onLoad.html"); ?>

<style>
#id_ac_id {
    text-align: left !important;
}
#hidden_bloco_2 > tbody > tr:nth-child(4) {
	display:none !important;	
}
.scFilterTable {
	margin: 5px 20px !important;	
}
#main_table > tbody > tr > td > div > table > tbody > tr:nth-child(3) {
	<?= (in_array($s->get("Num_TipoUsuario"), ["G", "GT"]) ? null : 'display: none;')?>
}
#hidden_bloco_1 > tbody > tr > td:nth-child(2) {
	width: 1px !important;	
}
#SC_selectorigem {
	display: none !important;
}
</style>

<script>
	var xhrAutoComplete;
	var actListAutoCompleteOrigem;
	
	$(document).ready(function () {
		$('.breadcrumb').remove();
		header = $('#hidden_bloco_0 > tbody > tr:nth-child(1)');
		header.html(`<td colspan="2" style="height: 70px;vertical-align: top;padding-top: 10px">
			<table style="width:100%"><tr><td style="width: auto;white-space: nowrap;">
				<div class="breadcrumb" style="display:inline-block;background:none"></div>
			</td><td style="max-width: 200px">
				<img src="../_lib/img/sys__NM__img__NM__GLOBALBLUE.png" style="width:95%;float:right;margin-right:15px;">
			</td></tr></table>
		</td>`);
		loadBreadcrumb(['Filtro', 'PAS']);
	
		limpa_form = function(){
			fields = ['id', 'referente', 'selectorigem', 'datacriacao_dia', 'datacriacao_mes', 'datacriacao_ano', 'num_status', 'tipo_op', 'id_op', 'condominio', 'cliente', 'end_obra_cidade', 'id_origem', 'autocompleteorigem'];
			$.each(fields, function(i,o){
				o = o.toLowerCase();
				$('#id_ac_'+o).val('');
				$('#SC_'+o).val('');
			});
			$('#autocompleteorigem').val('');
		}
	
		$('#id_hide_selectorigem').append('<input id="autocompleteorigem" type="text" class="sc-js-input scFilterObjectEven" style="width:262px" maxlength="50">');
		$('#autocompleteorigem').val($('#SC_selectorigem').val());
	
		getValueAutoCompleteOrigem();
		$('#autocompleteorigem').on('change', function(){
			setValueAutoCompleteOrigem();
		})
	
		$('#autocompleteorigem').autocomplete({
			minChars: 1,
    		source: function(term, suggest){
				term = term.term.toLowerCase();
				try { xhrAutoComplete.abort(); } catch(e){}
				xhrAutoComplete = $.getJSON('./?act=getOrigem&search='+term+'&referencia='+($('#SC_referente').val().split('##@@')[0]), function(response){
					suggestion = Array();
					$.each(response.data.splice(0, 10), function(i, o){
						suggestion.push(o.Origem);
					});
					suggest(suggestion);
				});
			}
		});
	});
	
	function setValueAutoCompleteOrigem(){
		value = $('#autocompleteorigem').val();	
		item = actListAutoCompleteOrigem.find(x => x.Origem == value);
		if (item) {
			$('#SC_selectorigem').val(item.ID_Origem);
		} else {
			$('#SC_selectorigem').val(null);
		}
	}
	
	function getValueAutoCompleteOrigem() {
		value = $('#SC_selectorigem').val();	
		$.getJSON('./?act=getOrigem&search=', function(response){
			actListAutoCompleteOrigem = Array();
			$.each(response.data, function(i,o){actListAutoCompleteOrigem.push(o)})
			item = actListAutoCompleteOrigem.find(x => x.ID_Origem == value);
			if (item) {
				$('#autocompleteorigem').val(item.Origem);
			}
		});
	}
</script>
<?php



$_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'off'; 
      if (isset($datacriacao_day))
      {
          $datacriacao_dia = $datacriacao_day; 
      }
      if (isset($datacriacao_month))
      {
          $datacriacao_mes = $datacriacao_month; 
      }
      if (isset($datacriacao_year))
      {
          $datacriacao_ano = $datacriacao_year; 
      }
      if (isset($datacriacao))
      {
          $datacriacao = str_replace("0000", "", $datacriacao);
          $datacriacao = str_replace("-00", "-", $datacriacao);
          $datacriacaoTT = explode(" ", $datacriacao);
          $datacriacaoXX = explode("-", $datacriacaoTT[0]);
          if (isset($datacriacaoXX[2]))
          {
              $datacriacao_dia = $datacriacaoXX[2]; 
          }
          if (isset($datacriacaoXX[1]))
          {
              $datacriacao_mes = $datacriacaoXX[1]; 
          }
          if (isset($datacriacaoXX[0]))
          {
              $datacriacao_ano = $datacriacaoXX[0]; 
          }
          if (isset($datacriacaoTT[1]))
          {
              $datacriacaoXX = explode(":", $datacriacaoTT[1]);
              if (isset($datacriacaoXX[2]))
              {
                  $datacriacao_seg = $datacriacaoXX[2]; 
              }
              if (isset($datacriacaoXX[1]))
              {
                  $datacriacao_min = $datacriacaoXX[1]; 
              }
              if (isset($datacriacaoXX[0]))
              {
                  $datacriacao_hor = $datacriacaoXX[0]; 
              }
          }
      }
    }
   }

   function processa_ajax()
   {
      global $NM_filters, $NM_filters_del, $nmgp_save_name, $nmgp_save_option, $NM_fields_refresh, $NM_parms_refresh, $Campo_bi, $Opc_bi, $NM_operador;
//-- ajax metodos ---
      if ($this->NM_ajax_opcao == "ajax_refresh_field")
      {
          ob_end_clean();
          $NM_fields_refresh = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($NM_fields_refresh)) ? sc_convert_encoding($NM_fields_refresh, $_SESSION['hticnsdata']['charset'], "UTF-8") : $NM_fields_refresh;
          $NM_parms_refresh  = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($NM_parms_refresh))  ? sc_convert_encoding($NM_parms_refresh,  $_SESSION['hticnsdata']['charset'], "UTF-8") : $NM_parms_refresh;
          $NMcmp_refr   = explode("@NMF@", $NM_fields_refresh);
          $NMparms_refr = explode("@NMF@", $NM_parms_refresh);
          foreach ($NMparms_refr as $Cada_cmp)
          {
              $Cada_cmp = explode("#NMF#", $Cada_cmp);
              $Cmp_name = (substr($Cada_cmp[0],0,3) == "SC_") ?  substr($Cada_cmp[0], 3) : $Cada_cmp[0] ;
              $list = array();
              if (substr($Cada_cmp[1], 0, 10) == "_NM_array_")
              {
                  if (substr($Cada_cmp[1], 0, 17) == "_NM_array_#NMARR#")
                  {
                      $Sc_temp = explode("#NMARR#", substr($Cada_cmp[1], 17));
                      foreach ($Sc_temp as $Cada_val)
                      {
                          $list[] = $Cada_val;
                      }
                  }
                  $$Cmp_name = $list;
              }
              else
              {
                  $$Cmp_name = $Cada_cmp[1];
              }
          }
          if (in_array("id_op", $NMcmp_refr))
          {
              $list = array();
              $nmgp_def_dados = $this->lookup_ajax_id_op($tipo_op);
              foreach ($nmgp_def_dados as $ind => $parms)
              {
                  foreach ($parms as $opt => $val)
                  {
                      $list[] = array('opt' => $opt, 'value' => $val);
                  }
              }
              $this->Arr_result['set_option'][] = array('field' => 'SC_id_op', 'value' => $list);
          }
      }
      if ($this->NM_ajax_opcao == 'autocomp_id')
      {
          $id = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['hticnsdata']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_id($id);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_condominio')
      {
          $condominio = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['hticnsdata']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_condominio($condominio);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_cliente')
      {
          $cliente = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['hticnsdata']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_cliente($cliente);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_end_obra_cidade')
      {
          $end_obra_cidade = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['hticnsdata']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_end_obra_cidade($end_obra_cidade);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
      if ($this->NM_ajax_opcao == 'autocomp_id_origem')
      {
          $id_origem = ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($_GET['q'])) ? sc_convert_encoding($_GET['q'], $_SESSION['hticnsdata']['charset'], "UTF-8") : $_GET['q'];
          $nmgp_def_dados = $this->lookup_ajax_id_origem($id_origem);
          ob_end_clean();
          $count_aut_comp = 0;
          $resp_aut_comp  = array();
          foreach ($nmgp_def_dados as $Ind => $Lista)
          {
             if (is_array($Lista))
             {
                 foreach ($Lista as $Cod => $Valor)
                 {
                     if ($_GET['cod_desc'] == "S")
                     {
                         $Valor = $Cod . " - " . $Valor;
                     }
                     $resp_aut_comp[] = array('label' => $Valor , 'value' => $Cod);
                     $count_aut_comp++;
                 }
             }
             if ($count_aut_comp == $_GET['max_itens'])
             {
                 break;
             }
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($resp_aut_comp);
          $this->Db->Close(); 
          exit;
      }
   }
   function lookup_ajax_id($id)
   {
      $id = substr($this->Db->qstr($id), 1, -1);
            $id_look = substr($this->Db->qstr($id), 1, -1); 
      $nmgp_def_dados = array(); 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct ID from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where   CAST (ID AS TEXT)  like '%" . $id . "%'"; 
      }
      else
      {
          $nm_comando = "select distinct ID from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where  ID like '%" . $id . "%'"; 
      }
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['hticnsdata']['reg_conf']['grup_num'], $_SESSION['hticnsdata']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['hticnsdata']['reg_conf']['neg_num'] , $_SESSION['hticnsdata']['reg_conf']['simb_neg'], $_SESSION['hticnsdata']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_id_op($tipo_op)
   {
      $tmp_pos = strpos($tipo_op, "##@@");
      if ($tmp_pos !== false)
      {
          $tipo_op = substr($tipo_op, 0, $tmp_pos);
      }
            $id_op_look = substr($this->Db->qstr($id_op), 1, -1); 
      $nmgp_def_dados = array(); 
      $nmgp_def_dados[] = array("" => ""); 
      $nm_comando = "SELECT     ID_OP,      (CASE 	WHEN Tipo_OP = 'O' AND '$tipo_op' = 'O' THEN (SELECT tb_operadoras.Nom_Operadoras FROM tb_operadoras WHERE tb_operadoras.ID_Operadoras = tb_pas.ID_OP) 	WHEN Tipo_OP = 'P' AND '$tipo_op' = 'P' THEN (SELECT tb_prestadores.Nom_RazaoSocial FROM tb_prestadores WHERE tb_prestadores.ID_Prestador = tb_pas.ID_OP)     END) as RazaoSocial FROM     tb_pas  WHERE Num_Ativo != 'R'  " . $_SESSION['grid_PAS_filter'] . "  GROUP BY RazaoSocial  ORDER BY RazaoSocial DESC"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['id_op'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['id_op'][] = trim($rs->fields[0]);
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $cmp2 = NM_charset_to_utf8(trim($rs->fields[1]));
            $nmgp_def_dados[] = array($cmp1 . "##@@" . $cmp2 => $cmp2); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_condominio($condominio)
   {
      $condominio = substr($this->Db->qstr($condominio), 1, -1);
            $condominio_look = substr($this->Db->qstr($condominio), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Condominio from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where  Condominio like '%" . $condominio . "%'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_cliente($cliente)
   {
      $cliente = substr($this->Db->qstr($cliente), 1, -1);
            $cliente_look = substr($this->Db->qstr($cliente), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Cliente from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where  Cliente like '%" . $cliente . "%'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_end_obra_cidade($end_obra_cidade)
   {
      $end_obra_cidade = substr($this->Db->qstr($end_obra_cidade), 1, -1);
            $end_obra_cidade_look = substr($this->Db->qstr($end_obra_cidade), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct End_Obra_Cidade from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where  End_Obra_Cidade like '%" . $end_obra_cidade . "%'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   
   function lookup_ajax_id_origem($id_origem)
   {
      $id_origem = substr($this->Db->qstr($id_origem), 1, -1);
            $id_origem_look = substr($this->Db->qstr($id_origem), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct ID_Origem from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where  ID_Origem like '%" . $id_origem . "%'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      return $nmgp_def_dados;
   }
   

   /**
    * @access  public
    */
   function processa_busca()
   {
      $this->inicializa_vars();
      $this->trata_campos();
      if (!empty($this->Campos_Mens_erro)) 
      {
          hticnsdata_error_display($this->Campos_Mens_erro, ""); 
          $this->monta_formulario();
      }
      else
      {
          $this->finaliza_resultado();
      }
   }

   /**
    * @access  public
    */
   function and_or()
   {
      $posWhere = strpos(strtolower($this->comando), "where");
      if (FALSE === $posWhere)
      {
         $this->comando     .= " where ";
         $this->comando_sum .= " and ";
      }
      if ($this->comando_ini == "ini")
      {
          if (FALSE !== $posWhere)
          {
              $this->comando     .= " and ( ";
              $this->comando_sum .= " and ( ";
              $this->comando_fim  = " ) ";
          }
         $this->comando_ini  = "";
      }
      elseif ("or" == $this->NM_operador)
      {
         $this->comando        .= " or ";
         $this->comando_sum    .= " or ";
         $this->comando_filtro .= " or ";
      }
      else
      {
         $this->comando        .= " and ";
         $this->comando_sum    .= " and ";
         $this->comando_filtro .= " and ";
      }
   }

   /**
    * @access  public
    * @param  string  $nome  
    * @param  string  $condicao  
    * @param  mixed  $campo  
    * @param  mixed  $campo2  
    * @param  string  $nome_campo  
    * @param  string  $tp_campo  
    * @global  array  $nmgp_tab_label  
    */
   function monta_condicao($nome, $condicao, $campo, $campo2 = "", $nome_campo="", $tp_campo="")
   {
      global $nmgp_tab_label;
      $condicao   = strtoupper($condicao);
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $Nm_numeric = array();
      $nm_esp_postgres = array();
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $Nm_numeric[] = "id";$Nm_numeric[] = "id_op";
      $campo_join = strtolower(str_replace(".", "_", $nome));
      if (in_array($campo_join, $Nm_numeric))
      {
          if ($condicao == "EP" || $condicao == "NE")
          {
              return;
          }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['decimal_db'] == ".")
         {
            $nm_aspas  = "";
            $nm_aspas1 = "";
         }
         if ($condicao != "IN")
         {
            if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['decimal_db'] == ".")
            {
               $campo  = str_replace(",", ".", $campo);
               $campo2 = str_replace(",", ".", $campo2);
            }
            if ($campo == "")
            {
               $campo = 0;
            }
            if ($campo2 == "")
            {
               $campo2 = 0;
            }
         }
      }
      if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
      {
         return;
      }
      else
      {
         $tmp_pos = strpos($campo, "##@@");
         if ($tmp_pos === false)
         {
             $res_lookup = $campo;
         }
         else
         {
             $res_lookup = substr($campo, $tmp_pos + 4);
             $campo = substr($campo, 0, $tmp_pos);
             if ($campo == "" && $condicao != "NU" && $condicao != "NN" && $condicao != "EP" && $condicao != "NE")
             {
                 return;
             }
         }
         $tmp_pos = strpos($this->cmp_formatado[$nome_campo], "##@@");
         if ($tmp_pos !== false)
         {
             $this->cmp_formatado[$nome_campo] = substr($this->cmp_formatado[$nome_campo], $tmp_pos + 4);
         }
         $this->and_or();
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $campo2 = substr($this->Db->qstr($campo2), 1, -1);
         $nome_sum = "tb_pas.$nome";
         if ($tp_campo == "TIMESTAMP")
         {
             $tp_campo = "DATETIME";
         }
         if (in_array($campo_join, $Nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "II" || $condicao == "QP" || $condicao == "NP"))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome     = "CAST ($nome AS TEXT)";
             $nome_sum = "CAST ($nome_sum AS TEXT)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             $nome     = "to_char ($nome, 'YYYY-MM-DD hh24:mi:ss')";
             $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD hh24:mi:ss')";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             if (in_array($condicao, array('II','QP','NP','IN','EP','NE'))) {
                 $nome     = "to_char ($nome, 'YYYY-MM-DD')";
                 $nome_sum = "to_char ($nome_sum, 'YYYY-MM-DD')";
             }
         }
         elseif (substr($tp_campo, 0, 4) == "TIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && !$this->Date_part)
         {
             $nome     = "to_char ($nome, 'hh24:mi:ss')";
             $nome_sum = "to_char ($nome_sum, 'hh24:mi:ss')";
         }
         if (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && !$this->Date_part)
         {
             $nome     = "str_replace (convert(char(10),$nome,102), '.', '-') + ' ' + convert(char(8),$nome,20)";
             $nome_sum = "str_replace (convert(char(10),$nome_sum,102), '.', '-') + ' ' + convert(char(8),$nome_sum,20)";
         }
         if ($tp_campo == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             $nome     = "convert(char(10),$nome,121)";
             $nome_sum = "convert(char(10),$nome_sum,121)";
         }
         if ($tp_campo == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) && !$this->Date_part)
         {
             $nome     = "convert(char(19),$nome,121)";
             $nome_sum = "convert(char(19),$nome_sum,121)";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !$this->Date_part)
         {
             $nome     = "TO_DATE(TO_CHAR($nome, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $nome_sum = "TO_DATE(TO_CHAR($nome_sum, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
             $tp_campo = "DATETIME";
         }
         if (substr($tp_campo, 0, 8) == "DATETIME" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO FRACTION)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO FRACTION)";
         }
         elseif (substr($tp_campo, 0, 4) == "DATE" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix) && !$this->Date_part)
         {
             $nome     = "EXTEND($nome, YEAR TO DAY)";
             $nome_sum = "EXTEND($nome_sum, YEAR TO DAY)";
         }
         switch ($condicao)
         {
            case "EQ":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower. " = " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "II":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " like '" . $campo . "%'";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_strt'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
             case "QP";     // 
             case "NP";     // 
                $concat = " " . $this->NM_operador . " ";
                if ($condicao == "QP")
                {
                    $op_all    = " like ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_like'];
                }
                else
                {
                    $op_all    = " not like ";
                    $lang_like = $this->Ini->Nm_lang['lang_srch_not_like'];
                }
               $NM_cond    = "";
               $NM_cmd     = "";
               $NM_cmd_sum = "";
               if (substr($tp_campo, 0, 4) == "DATE" && $this->Date_part)
               {
                   if ($this->NM_data_qp['ano'] != "____")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_year'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['ano'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%Y', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%Y', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'YYYY') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('year' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('year' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(year from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(year from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'YYYY')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(year, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(year, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "year(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                           $NM_cmd_sum .= "year(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['ano'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['mes'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mnth'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['mes'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%m', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%m', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'MM') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('month' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('month' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(month from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(month from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MM')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(month, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(month, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "month(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                           $NM_cmd_sum .= "month(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['mes'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['dia'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_days'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['dia'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%d', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%d', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'DD') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('day' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('day' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(day from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(day from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'DD')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(day, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(day, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "day(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                           $NM_cmd_sum .= "day(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['dia'] . $this->End_date_part;
                       }
                   }
               }
               if (strpos($tp_campo, "TIME") !== false && $this->Date_part)
               {
                   if ($this->NM_data_qp['hor'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_time'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['hor'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%H', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%H', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'hh24') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('hour' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('hour' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(hour from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(hour from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'HH24')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(hour, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(hour, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "hour(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                           $NM_cmd_sum .= "hour(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['hor'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['min'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_mint'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['min'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%M', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%M', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'mi') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('minute' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('minute' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(minute from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(minute from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'MI')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(minute, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(minute, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "minute(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                           $NM_cmd_sum .= "minute(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['min'] . $this->End_date_part;
                       }
                   }
                   if ($this->NM_data_qp['seg'] != "__")
                   {
                       $NM_cond    .= (empty($NM_cmd)) ? "" : " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " ";
                       $NM_cond    .= $this->Ini->Nm_lang['lang_srch_scnd'] . " " . $this->Lang_date_part . " " . $this->NM_data_qp['seg'];
                       $NM_cmd     .= (empty($NM_cmd)) ? "" : $concat;
                       $NM_cmd_sum .= (empty($NM_cmd_sum)) ? "" : $concat;
                       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                       {
                           $NM_cmd     .= "strftime('%S', " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "strftime('%S', " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                       {
                           if (trim($this->Operador_date_part) == "like")
                           {
                               $NM_cmd     .= "to_char (" . $nome . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= "to_char (" . $nome_sum . ", 'ss') " . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                           else
                           {
                               $NM_cmd     .= $this->Ini_date_char . "extract('second' from " . $nome . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                               $NM_cmd_sum .= $this->Ini_date_char . "extract('second' from " . $nome_sum . ")" . $this->End_date_char . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           }
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                       {
                           $NM_cmd     .= "extract(second from " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "extract(second from " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                       {
                           $NM_cmd     .= "TO_CHAR(" . $nome . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "TO_CHAR(" . $nome_sum . ", 'SS')" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                       {
                           $NM_cmd     .= "DATEPART(second, " . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "DATEPART(second, " . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                       else
                       {
                           $NM_cmd     .= "second(" . $nome . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                           $NM_cmd_sum .= "second(" . $nome_sum . ")" . $this->Operador_date_part . $this->Ini_date_part . $this->NM_data_qp['seg'] . $this->End_date_part;
                       }
                   }
               }
               if ($this->Date_part)
               {
                   if (!empty($NM_cmd))
                   {
                       $NM_cmd     = " (" . $NM_cmd . ")";
                       $NM_cmd_sum = " (" . $NM_cmd_sum . ")";
                       $this->comando        .= $NM_cmd;
                       $this->comando_sum    .= $NM_cmd_sum;
                       $this->comando_filtro .= $NM_cmd;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . ": " . $NM_cond . "##*@@";
                   }
               }
               else
               {
                   $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . $op_all . "'%" . $campo . "%'";
                   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $lang_like . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
               }
            break;
            case "DF":     // 
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_diff'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GT":     // 
               $this->comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum > " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "GE":     // 
               $this->comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum >= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_grtr_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LT":     // 
               $this->comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum < " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "LE":     // 
               $this->comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum <= " . $nm_aspas . $campo . $nm_aspas1;
               $this->comando_filtro .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_less_equl'] . " " . $this->cmp_formatado[$nome_campo] . "##*@@";
            break;
            case "BW":     // 
               $this->comando        .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_sum    .= " $nome_sum between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $this->comando_filtro .= " $nome between " . $nm_aspas . $campo . $nm_aspas1 . " and " . $nm_aspas . $campo2 . $nm_aspas1;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_betw'] . " " . $this->cmp_formatado[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_and_cond'] . " " . $this->cmp_formatado[$nome_campo . "_input_2"] . "##*@@";
            break;
            case "IN":     // 
               $nm_sc_valores = explode(",", $campo);
               $cond_str = "";
               $nm_cond  = "";
               if (!empty($nm_sc_valores))
               {
                   foreach ($nm_sc_valores as $nm_sc_valor)
                   {
                      if (in_array($campo_join, $Nm_numeric) && substr_count($nm_sc_valor, ".") > 1)
                      {
                         $nm_sc_valor = str_replace(".", "", $nm_sc_valor);
                      }
                      if ("" != $cond_str)
                      {
                         $cond_str .= ",";
                         $nm_cond  .= " " . $this->Ini->Nm_lang['lang_srch_orr_cond'] . " ";
                      }
                      $cond_str .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                      $nm_cond  .= $nm_aspas . $nm_sc_valor . $nm_aspas1;
                   }
               }
               $this->comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_sum    .= $nm_ini_lower . $nome_sum . $nm_fim_lower . " in (" . $cond_str . ")";
               $this->comando_filtro .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $cond_str . ")";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_like'] . " " . $nm_cond . "##*@@";
            break;
            case "NU":     // 
               $this->comando        .= " $nome IS NULL ";
               $this->comando_sum    .= " $nome_sum IS NULL ";
               $this->comando_filtro .= " $nome IS NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_null'] . "##*@@";
            break;
            case "NN":     // 
               $this->comando        .= " $nome IS NOT NULL ";
               $this->comando_sum    .= " $nome_sum IS NOT NULL ";
               $this->comando_filtro .= " $nome IS NOT NULL ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nnul'] . "##*@@";
            break;
            case "EP":     // 
               $this->comando        .= " $nome = '' ";
               $this->comando_sum    .= " $nome_sum = '' ";
               $this->comando_filtro .= " $nome = '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_empty'] . "##*@@";
            break;
            case "NE":     // 
               $this->comando        .= " $nome <> '' ";
               $this->comando_sum    .= " $nome_sum <> '' ";
               $this->comando_filtro .= " $nome <> '' ";
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $nmgp_tab_label[$nome_campo] . " " . $this->Ini->Nm_lang['lang_srch_nempty'] . "##*@@";
            break;
         }
      }
   }

   function nm_prep_date(&$val, $tp, $tsql, &$cond, $format_nd, $tp_nd)
   {
       $fill_dt = false;
       if ($tsql == "TIMESTAMP")
       {
           $tsql = "DATETIME";
       }
       $cond = strtoupper($cond);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && $tp != "ND")
       {
           if ($cond == "EP")
           {
               $cond = "NU";
           }
           if ($cond == "NE")
           {
               $cond = "NN";
           }
       }
       if ($cond == "NU" || $cond == "NN" || $cond == "EP" || $cond == "NE")
       {
           $val    = array();
           $val[0] = "";
           return;
       }
       if ($cond != "II" && $cond != "QP" && $cond != "NP")
       {
           $fill_dt = true;
       }
       if ($fill_dt)
       {
           $val[0]['dia'] = (!empty($val[0]['dia']) && strlen($val[0]['dia']) == 1) ? "0" . $val[0]['dia'] : $val[0]['dia'];
           $val[0]['mes'] = (!empty($val[0]['mes']) && strlen($val[0]['mes']) == 1) ? "0" . $val[0]['mes'] : $val[0]['mes'];
           if ($tp == "DH")
           {
               $val[0]['hor'] = (!empty($val[0]['hor']) && strlen($val[0]['hor']) == 1) ? "0" . $val[0]['hor'] : $val[0]['hor'];
               $val[0]['min'] = (!empty($val[0]['min']) && strlen($val[0]['min']) == 1) ? "0" . $val[0]['min'] : $val[0]['min'];
               $val[0]['seg'] = (!empty($val[0]['seg']) && strlen($val[0]['seg']) == 1) ? "0" . $val[0]['seg'] : $val[0]['seg'];
           }
           if ($cond == "BW")
           {
               $val[1]['dia'] = (!empty($val[1]['dia']) && strlen($val[1]['dia']) == 1) ? "0" . $val[1]['dia'] : $val[1]['dia'];
               $val[1]['mes'] = (!empty($val[1]['mes']) && strlen($val[1]['mes']) == 1) ? "0" . $val[1]['mes'] : $val[1]['mes'];
               if ($tp == "DH")
               {
                   $val[1]['hor'] = (!empty($val[1]['hor']) && strlen($val[1]['hor']) == 1) ? "0" . $val[1]['hor'] : $val[1]['hor'];
                   $val[1]['min'] = (!empty($val[1]['min']) && strlen($val[1]['min']) == 1) ? "0" . $val[1]['min'] : $val[1]['min'];
                   $val[1]['seg'] = (!empty($val[1]['seg']) && strlen($val[1]['seg']) == 1) ? "0" . $val[1]['seg'] : $val[1]['seg'];
               }
           }
       }
       if ($cond == "BW")
       {
           $this->NM_data_1 = array();
           $this->NM_data_1['ano'] = (isset($val[0]['ano']) && !empty($val[0]['ano'])) ? $val[0]['ano'] : "____";
           $this->NM_data_1['mes'] = (isset($val[0]['mes']) && !empty($val[0]['mes'])) ? $val[0]['mes'] : "__";
           $this->NM_data_1['dia'] = (isset($val[0]['dia']) && !empty($val[0]['dia'])) ? $val[0]['dia'] : "__";
           $this->NM_data_1['hor'] = (isset($val[0]['hor']) && !empty($val[0]['hor'])) ? $val[0]['hor'] : "__";
           $this->NM_data_1['min'] = (isset($val[0]['min']) && !empty($val[0]['min'])) ? $val[0]['min'] : "__";
           $this->NM_data_1['seg'] = (isset($val[0]['seg']) && !empty($val[0]['seg'])) ? $val[0]['seg'] : "__";
           $this->data_menor($this->NM_data_1);
           $this->NM_data_2 = array();
           $this->NM_data_2['ano'] = (isset($val[1]['ano']) && !empty($val[1]['ano'])) ? $val[1]['ano'] : "____";
           $this->NM_data_2['mes'] = (isset($val[1]['mes']) && !empty($val[1]['mes'])) ? $val[1]['mes'] : "__";
           $this->NM_data_2['dia'] = (isset($val[1]['dia']) && !empty($val[1]['dia'])) ? $val[1]['dia'] : "__";
           $this->NM_data_2['hor'] = (isset($val[1]['hor']) && !empty($val[1]['hor'])) ? $val[1]['hor'] : "__";
           $this->NM_data_2['min'] = (isset($val[1]['min']) && !empty($val[1]['min'])) ? $val[1]['min'] : "__";
           $this->NM_data_2['seg'] = (isset($val[1]['seg']) && !empty($val[1]['seg'])) ? $val[1]['seg'] : "__";
           $this->data_maior($this->NM_data_2);
           $val = array();
           if ($tp == "ND")
           {
               $out_dt1 = $format_nd;
               $out_dt1 = str_replace("yyyy", $this->NM_data_1['ano'], $out_dt1);
               $out_dt1 = str_replace("mm",   $this->NM_data_1['mes'], $out_dt1);
               $out_dt1 = str_replace("dd",   $this->NM_data_1['dia'], $out_dt1);
               $out_dt1 = str_replace("hh",   "", $out_dt1);
               $out_dt1 = str_replace("ii",   "", $out_dt1);
               $out_dt1 = str_replace("ss",   "", $out_dt1);
               $out_dt2 = $format_nd;
               $out_dt2 = str_replace("yyyy", $this->NM_data_2['ano'], $out_dt2);
               $out_dt2 = str_replace("mm",   $this->NM_data_2['mes'], $out_dt2);
               $out_dt2 = str_replace("dd",   $this->NM_data_2['dia'], $out_dt2);
               $out_dt2 = str_replace("hh",   "", $out_dt2);
               $out_dt2 = str_replace("ii",   "", $out_dt2);
               $out_dt2 = str_replace("ss",   "", $out_dt2);
               $val[0] = $out_dt1;
               $val[1] = $out_dt2;
               return;
           }
           if ($tsql == "TIME")
           {
               $val[0] = $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
               $val[1] = $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
           }
           elseif (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] = $this->NM_data_1['ano'] . "-" . $this->NM_data_1['mes'] . "-" . $this->NM_data_1['dia'];
               $val[1] = $this->NM_data_2['ano'] . "-" . $this->NM_data_2['mes'] . "-" . $this->NM_data_2['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " " . $this->NM_data_1['hor'] . ":" . $this->NM_data_1['min'] . ":" . $this->NM_data_1['seg'];
                   $val[1] .= " " . $this->NM_data_2['hor'] . ":" . $this->NM_data_2['min'] . ":" . $this->NM_data_2['seg'];
               }
           }
           return;
       }
       $this->NM_data_qp = array();
       $this->NM_data_qp['ano'] = (isset($val[0]['ano']) && $val[0]['ano'] != "") ? $val[0]['ano'] : "____";
       $this->NM_data_qp['mes'] = (isset($val[0]['mes']) && $val[0]['mes'] != "") ? $val[0]['mes'] : "__";
       $this->NM_data_qp['dia'] = (isset($val[0]['dia']) && $val[0]['dia'] != "") ? $val[0]['dia'] : "__";
       $this->NM_data_qp['hor'] = (isset($val[0]['hor']) && $val[0]['hor'] != "") ? $val[0]['hor'] : "__";
       $this->NM_data_qp['min'] = (isset($val[0]['min']) && $val[0]['min'] != "") ? $val[0]['min'] : "__";
       $this->NM_data_qp['seg'] = (isset($val[0]['seg']) && $val[0]['seg'] != "") ? $val[0]['seg'] : "__";
       if ($tp != "ND" && ($cond == "LE" || $cond == "LT" || $cond == "GE" || $cond == "GT"))
       {
           $count_fill = 0;
           foreach ($this->NM_data_qp as $x => $tx)
           {
               if (substr($tx, 0, 2) != "__")
               {
                   $count_fill++;
               }
           }
           if ($count_fill > 1)
           {
               if ($cond == "LE" || $cond == "GT")
               {
                   $this->data_maior($this->NM_data_qp);
               }
               else
               {
                   $this->data_menor($this->NM_data_qp);
               }
               if ($tsql == "TIME")
               {
                   $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
               }
               elseif (substr($tsql, 0, 4) == "DATE")
               {
                   $val[0] = $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
                   if (strpos($tsql, "TIME") !== false)
                   {
                       $val[0] .= " " . $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
                   }
               }
               return;
           }
       }
       foreach ($this->NM_data_qp as $x => $tx)
       {
           if (substr($tx, 0, 2) == "__" && ($x == "dia" || $x == "mes" || $x == "ano"))
           {
               if (substr($tsql, 0, 4) == "DATE")
               {
                   $this->Date_part = true;
                   break;
               }
           }
           if (substr($tx, 0, 2) == "__" && ($x == "hor" || $x == "min" || $x == "seg"))
           {
               if (strpos($tsql, "TIME") !== false && ($tp == "DH" || ($tp == "DT" && $cond != "LE" && $cond != "LT" && $cond != "GE" && $cond != "GT")))
               {
                   $this->Date_part = true;
                   break;
               }
           }
       }
       if ($this->Date_part)
       {
           $this->Ini_date_part = "";
           $this->End_date_part = "";
           $this->Ini_date_char = "";
           $this->End_date_char = "";
           if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
           {
               $this->Ini_date_part = "'";
               $this->End_date_part = "'";
           }
           if ($tp != "ND")
           {
               if ($cond == "EQ")
               {
                   $this->Operador_date_part = " = ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
               }
               elseif ($cond == "II")
               {
                   $this->Operador_date_part = " like ";
                   $this->Ini_date_part = "'";
                   $this->End_date_part = "%'";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_strt'];
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               elseif ($cond == "DF")
               {
                   $this->Operador_date_part = " <> ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
               }
               elseif ($cond == "GT")
               {
                   $this->Operador_date_part = " > ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['pesq_cond_maior'];
               }
               elseif ($cond == "GE")
               {
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_grtr_equl'];
                   $this->Operador_date_part = " >= ";
               }
               elseif ($cond == "LT")
               {
                   $this->Operador_date_part = " < ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less'];
               }
               elseif ($cond == "LE")
               {
                   $this->Operador_date_part = " <= ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_less_equl'];
               }
               elseif ($cond == "NP")
               {
                   $this->Operador_date_part = " not like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_diff'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
               else
               {
                   $this->Operador_date_part = " like ";
                   $this->Lang_date_part = $this->Ini->Nm_lang['lang_srch_equl'];
                   $this->Ini_date_part = "'%";
                   $this->End_date_part = "%'";
                   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                   {
                       $this->Ini_date_char = "CAST (";
                       $this->End_date_char = " AS TEXT)";
                   }
               }
           }
           if ($cond == "DF")
           {
               $cond = "NP";
           }
           if ($cond != "NP")
           {
               $cond = "QP";
           }
       }
       $val = array();
       if ($tp != "ND" && ($cond == "QP" || $cond == "NP"))
       {
           $val[0] = "";
           if (substr($tsql, 0, 4) == "DATE")
           {
               $val[0] .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
               if (strpos($tsql, "TIME") !== false)
               {
                   $val[0] .= " ";
               }
           }
           if (strpos($tsql, "TIME") !== false)
           {
               $val[0] .= $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           }
           return;
       }
       if ($cond == "II" || $cond == "DF" || $cond == "EQ" || $cond == "LT" || $cond == "GE")
       {
           $this->data_menor($this->NM_data_qp);
       }
       else
       {
           $this->data_maior($this->NM_data_qp);
       }
       if ($tsql == "TIME")
       {
           $val[0] = $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
           return;
       }
       $format_sql = "";
       if (substr($tsql, 0, 4) == "DATE")
       {
           $format_sql .= $this->NM_data_qp['ano'] . "-" . $this->NM_data_qp['mes'] . "-" . $this->NM_data_qp['dia'];
           if (strpos($tsql, "TIME") !== false)
           {
               $format_sql .= " ";
           }
       }
       if (strpos($tsql, "TIME") !== false)
       {
           $format_sql .=  $this->NM_data_qp['hor'] . ":" . $this->NM_data_qp['min'] . ":" . $this->NM_data_qp['seg'];
       }
       if ($tp != "ND")
       {
           $val[0] = $format_sql;
           return;
       }
       if ($tp == "ND")
       {
           $format_nd = str_replace("yyyy", $this->NM_data_qp['ano'], $format_nd);
           $format_nd = str_replace("mm",   $this->NM_data_qp['mes'], $format_nd);
           $format_nd = str_replace("dd",   $this->NM_data_qp['dia'], $format_nd);
           $format_nd = str_replace("hh",   $this->NM_data_qp['hor'], $format_nd);
           $format_nd = str_replace("ii",   $this->NM_data_qp['min'], $format_nd);
           $format_nd = str_replace("ss",   $this->NM_data_qp['seg'], $format_nd);
           $val[0] = $format_nd;
           return;
       }
   }
   function data_menor(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "0001" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "01" : $data_arr["mes"];
       $data_arr["dia"] = ("__" == $data_arr["dia"])   ? "01" : $data_arr["dia"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "00" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "00" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "00" : $data_arr["seg"];
   }

   function data_maior(&$data_arr)
   {
       $data_arr["ano"] = ("____" == $data_arr["ano"]) ? "9999" : $data_arr["ano"];
       $data_arr["mes"] = ("__" == $data_arr["mes"])   ? "12" : $data_arr["mes"];
       $data_arr["hor"] = ("__" == $data_arr["hor"])   ? "23" : $data_arr["hor"];
       $data_arr["min"] = ("__" == $data_arr["min"])   ? "59" : $data_arr["min"];
       $data_arr["seg"] = ("__" == $data_arr["seg"])   ? "59" : $data_arr["seg"];
       if ("__" == $data_arr["dia"])
       {
           $data_arr["dia"] = "31";
           if ($data_arr["mes"] == "04" || $data_arr["mes"] == "06" || $data_arr["mes"] == "09" || $data_arr["mes"] == "11")
           {
               $data_arr["dia"] = 30;
           }
           elseif ($data_arr["mes"] == "02")
           { 
                if  ($data_arr["ano"] % 4 == 0)
                {
                     $data_arr["dia"] = 29;
                }
                else 
                {
                     $data_arr["dia"] = 28;
                }
           }
       }
   }

   /**
    * @access  public
    * @param  string  $nm_data_hora  
    */
   function limpa_dt_hor_pesq(&$nm_data_hora)
   {
      $nm_data_hora = str_replace("Y", "", $nm_data_hora); 
      $nm_data_hora = str_replace("M", "", $nm_data_hora); 
      $nm_data_hora = str_replace("D", "", $nm_data_hora); 
      $nm_data_hora = str_replace("H", "", $nm_data_hora); 
      $nm_data_hora = str_replace("I", "", $nm_data_hora); 
      $nm_data_hora = str_replace("S", "", $nm_data_hora); 
      $tmp_pos = strpos($nm_data_hora, "--");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("--", "-", $nm_data_hora); 
      }
      $tmp_pos = strpos($nm_data_hora, "::");
      if ($tmp_pos !== FALSE)
      {
          $nm_data_hora = str_replace("::", ":", $nm_data_hora); 
      }
   }

   /**
    * @access  public
    */
   function retorna_pesq()
   {
      global $nm_apl_dependente;
   $NM_retorno = "./";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - tb_pas</TITLE>
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
</HEAD>
<BODY class="scGridPage">
<FORM style="display:none;" name="form_ok" method="POST" action="<?php echo $NM_retorno; ?>" target="_self">
<INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="pesq"> 
</FORM>
<SCRIPT type="text/javascript">
 self.parent.tb_remove();
<?php
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['orig_pesq']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['orig_pesq'] == "res")  
    { 
        echo "parent.nm_gp_move('pesq', '0');";
    } 
    else 
    { 
        echo "parent.nm_gp_submit_ajax('inicio', 'save_grid');";
    } 
?>
</SCRIPT>
</BODY>
</HTML>
<?php
}

   /**
    * @access  public
    */
   function monta_html_ini()
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_srch_titl'] ?> - tb_pas</TITLE>
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
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_filter<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_error<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Str_btn_filter_css ?>" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>grid_PAS/grid_PAS_fil_<?php echo strtolower($_SESSION['hticnsdata']['reg_conf']['css_dir']) ?>.css" />
</HEAD>
<BODY class="scFilterPage">
<?php echo $this->Ini->Ajax_result_set ?>
<SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_js . "/browserSniffer.js" ?>"></SCRIPT>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
 <script type="text/javascript" src="../_lib/lib/js/jquery.scInput.js"></script>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
 <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
 <script type="text/javascript" src="grid_PAS_ajax_search.js"></script>
 <script type="text/javascript" src="grid_PAS_ajax.js"></script>
 <script type="text/javascript">
   var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax ?>';
   var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax ?>';
   var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax ?>';
   var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax ?>';
 </script>
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_filter ?>_calendar<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" />
 <SCRIPT type="text/javascript">

<?php
if (is_file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js"))
{
    $Tb_err_js = file($this->Ini->root . $this->Ini->path_link . "_lib/js/tab_erro_" . $this->Ini->str_lang . ".js");
    foreach ($Tb_err_js as $Lines)
    {
        if (NM_is_utf8($Lines) && $_SESSION['hticnsdata']['charset'] != "UTF-8")
        {
            $Lines = sc_convert_encoding($Lines, $_SESSION['hticnsdata']['charset'], "UTF-8");
        }
        echo $Lines;
    }
}
 if (NM_is_utf8($Lines) && $_SESSION['hticnsdata']['charset'] != "UTF-8")
 {
    $Msg_Inval = sc_convert_encoding("Inv�lido", $_SESSION['hticnsdata']['charset'], "UTF-8");
 }
?>
var SC_crit_inv = "<?php echo $Msg_Inval ?>";
var nmdg_Form = "F1";

function scJQCalendarAdd() {
  $("#sc_datacriacao_jq").datepicker({
    beforeShow: function(input, inst) {
          var_dt_ini  = document.getElementById('SC_datacriacao_dia').value + '/';
          var_dt_ini += document.getElementById('SC_datacriacao_mes').value + '/';
          var_dt_ini += document.getElementById('SC_datacriacao_ano').value;
          document.getElementById('sc_datacriacao_jq').value = var_dt_ini;
    },
    onClose: function(dateText, inst) {
          aParts  = dateText.split("/");
          document.getElementById('SC_datacriacao_dia').value = aParts[0];
          document.getElementById('SC_datacriacao_mes').value = aParts[1];
          document.getElementById('SC_datacriacao_ano').value = aParts[2];
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_sund"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_mond"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_tued"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_wend"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_thud"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_frid"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_days_satd"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>"],
    dayNamesMin: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_sund"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_mond"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_tued"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_wend"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_thud"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_frid"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_substr_days_satd"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_janu"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_febr"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_marc"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_apri"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_mayy"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_june"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_july"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_augu"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_sept"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_octo"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_nove"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_mnth_dece"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_shrt_days_sem"], ENT_COMPAT, $_SESSION["hticnsdata"]["charset"]) ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['hticnsdata']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("ddmmyyyy", "/"); ?>",
    showOtherMonths: true,
    showOn: "button",
    buttonImage: "<?php echo $this->Ini->path_botoes . "/" . $this->arr_buttons['bcalendario']['image']; ?>",
    buttonImageOnly: true
  });

} // scJQCalendarAdd


 $(function() {

   SC_carga_evt_jquery();
   $('input:text.sc-js-input').listen();
   scJQCalendarAdd('');
 });
var NM_index = 0;
var NM_hidden = new Array();
var NM_IE = (navigator.userAgent.indexOf('MSIE') > -1) ? 1 : 0;
function NM_hitTest(o, l)
{
    function getOffset(o){
        for(var r = {l: o.offsetLeft, t: o.offsetTop, r: o.offsetWidth, b: o.offsetHeight};
            o = o.offsetParent; r.l += o.offsetLeft, r.t += o.offsetTop);
        return r.r += r.l, r.b += r.t, r;
    }
    for(var b, s, r = [], a = getOffset(o), j = isNaN(l.length), i = (j ? l = [l] : l).length; i;
        b = getOffset(l[--i]), (a.l == b.l || (a.l > b.l ? a.l <= b.r : b.l <= a.r))
        && (a.t == b.t || (a.t > b.t ? a.t <= b.b : b.t <= a.b)) && (r[r.length] = l[i]));
    return j ? !!r.length : r;
}
var tem_obj = false;
function NM_show_menu(nn)
{
    if (!NM_IE)
    {
         return;
    }
    x = document.getElementById(nn);
    x.style.display = "block";
    obj_sel = document.body;
    tem_obj = true;
    x.ieFix = NM_hitTest(x, obj_sel.getElementsByTagName("select"));
    for (i = 0; i <  x.ieFix.length; i++)
    {
      if (x.ieFix[i].style.visibility != "hidden")
      {
          x.ieFix[i].style.visibility = "hidden";
          NM_hidden[NM_index] = x.ieFix[i];
          NM_index++;
      }
    }
}
function NM_hide_menu()
{
    if (!NM_IE)
    {
         return;
    }
    obj_del = document.body;
    if (tem_obj && obj_del == obj_sel)
    {
        for(var i = NM_hidden.length; i; NM_hidden[--i].style.visibility = "visible");
    }
    NM_index = 0;
    NM_hidden = new Array();
}
 function nm_campos_between(nm_campo, nm_cond, nm_nome_obj)
 {
  if (nm_cond.value == "bw")
  {
   nm_campo.style.display = "";
  }
  else
  {
    if (nm_campo)
    {
      nm_campo.style.display = "none";
    }
  }
  if (document.getElementById('id_hide_' + nm_nome_obj))
  {
      if (nm_cond.value == "nu" || nm_cond.value == "nn" || nm_cond.value == "ep" || nm_cond.value == "ne")
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = 'none';
      }
      else
      {
          document.getElementById('id_hide_' + nm_nome_obj).style.display = '';
      }
  }
 }
 function nm_refresh_tipo_op()
 {
   var parms  = "";
   var fields = "id_op";
   parms += 'tipo_op#NMF#' + search_get_select('SC_tipo_op') + '@NMF@';
   ajax_refresh_field(fields, parms);
 }
 function search_get_select(obj_id)
 {
    var index = document.getElementById(obj_id).selectedIndex;
    if (index != -1) {
        return document.getElementById(obj_id).options[index].value;
    }
    else {
        return '';
    }
 }
 function search_get_selmult(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
        if (obj[iSelect].selected)
        {
            val += "#NMARR#" + obj[iSelect].value;
        }
    }
    return val;
 }
 function search_get_Dselelect(obj_id)
 {
    var obj = document.getElementById(obj_id);
    var val = "_NM_array_";
    for (iSelect = 0; iSelect < obj.length; iSelect++)
    {
         val += "#NMARR#" + obj[iSelect].value;
    }
    return val;
 }
 function search_get_radio(obj_id)
 {
    var val  = "";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       for (iRadio = 0; iRadio < obj.length; iRadio++) {
           if (obj[iRadio].checked) {
               val = obj[iRadio].value;
           }
       }
    }
    return val;
 }
 function search_get_checkbox(obj_id)
 {
    var val  = "_NM_array_";
    if (document.getElementById(obj_id)) {
       var Nobj = document.getElementById(obj_id).name;
       var obj  = document.getElementsByName(Nobj);
       if (!obj.length) {
           if (obj.checked) {
               val += "#NMARR#" + obj.value;
           }
       }
       else {
           for (iCheck = 0; iCheck < obj.length; iCheck++) {
               if (obj[iCheck].checked) {
                   val += "#NMARR#" + obj[iCheck].value;
               }
           }
       }
    }
    return val;
 }
 function search_get_text(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return (obj) ? obj.value : '';
 }
 function search_get_sel_txt(obj_id)
 {
    var val = "";
    obj_part  = document.getElementById(obj_id);
    if (obj_part && obj_part.type.substr(0, 6) == 'select')
    {
        val = search_get_select(obj_id);
    }
    else
    {
        val = (obj_part) ? obj_part.value : '';
    }
    return val;
 }
 function search_get_html(obj_id)
 {
    var obj = document.getElementById(obj_id);
    return obj.innerHTML;
 }
function nm_open_popup(parms)
{
    NovaJanela = window.open (parms, '', 'resizable, scrollbars');
}
 </SCRIPT>
<script type="text/javascript">
 $(function() {
   $("#id_ac_id").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_id",
          max_itens: "10",
          cod_desc: "N",
          hti_cnsdata_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_id").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_id").val( $(this).val() );
       }
     }
   });
   $("#id_ac_id_origem").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_id_origem",
          max_itens: "10",
          cod_desc: "N",
          hti_cnsdata_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_id_origem").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_id_origem").val( $(this).val() );
       }
     }
   });
   $("#id_ac_cliente").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_cliente",
          max_itens: "10",
          cod_desc: "N",
          hti_cnsdata_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_cliente").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_cliente").val( $(this).val() );
       }
     }
   });
   $("#id_ac_condominio").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_condominio",
          max_itens: "10",
          cod_desc: "N",
          hti_cnsdata_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_condominio").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_condominio").val( $(this).val() );
       }
     }
   });
   $("#id_ac_end_obra_cidade").autocomplete({
     source: function (request, response) {
     $.ajax({
       url: "index.php",
       dataType: "json",
       data: {
          q: request.term,
          nmgp_opcao: "ajax_autocomp",
          nmgp_parms: "NM_ajax_opcao?#?autocomp_end_obra_cidade",
          max_itens: "10",
          cod_desc: "N",
          hti_cnsdata_init: <?php echo $this->Ini->sc_page ?>
        },
       success: function (data) {
         response(data);
       }
      });
    },
     select: function (event, ui) {
       $("#SC_end_obra_cidade").val(ui.item.value);
       $(this).val(ui.item.label);
       event.preventDefault();
     },
     change: function (event, ui) {
       if (null == ui.item) {
          $("#SC_end_obra_cidade").val( $(this).val() );
       }
     }
   });
 });
</script>
 <FORM name="F1" action="./" method="post" target="_self"> 
 <INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
 <INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
 <INPUT type="hidden" name="nmgp_opcao" value="busca"> 
 <div id="idJSSpecChar" style="display:none;"></div>
 <div id="id_div_process" style="display: none; position: absolute"><table class="scFilterTable"><tr><td class="scFilterLabelOdd"><?php echo $this->Ini->Nm_lang['lang_othr_prcs']; ?>...</td></tr></table></div>
 <div id="id_fatal_error" class="scFilterFieldOdd" style="display:none; position: absolute"></div>
<TABLE id="main_table" align="center" valign="top" >
<tr>
<td>
<div class="scFilterBorder">
  <div id="id_div_process_block" style="display: none; margin: 10px; whitespace: nowrap"><span class="scFormProcess"><img border="0" src="<?php echo $this->Ini->path_icones ?>/hticnsdata__NM__ajax_load.gif" align="absmiddle" />&nbsp;<?php echo $this->Ini->Nm_lang['lang_othr_prcs'] ?>...</span></div>
<table cellspacing=0 cellpadding=0 width='100%'>
<?php
   }

   /**
    * @access  public
    * @global  string  $bprocessa  
    */
   /**
    * @access  public
    */
   function monta_cabecalho()
   {
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['dashboard_info']['compact_mode'])
      {
          return;
      }
      $Str_date = strtolower($_SESSION['hticnsdata']['reg_conf']['date_format']);
      $Lim   = strlen($Str_date);
      $Ult   = "";
      $Arr_D = array();
      for ($I = 0; $I < $Lim; $I++)
      {
          $Char = substr($Str_date, $I, 1);
          if ($Char != $Ult)
          {
              $Arr_D[] = $Char;
          }
          $Ult = $Char;
      }
      $Prim = true;
      $Str  = "";
      foreach ($Arr_D as $Cada_d)
      {
          $Str .= (!$Prim) ? $_SESSION['hticnsdata']['reg_conf']['date_sep'] : "";
          $Str .= $Cada_d;
          $Prim = false;
      }
      $Str = str_replace("a", "Y", $Str);
      $Str = str_replace("y", "Y", $Str);
      $nm_data_fixa = date($Str); 
?>
 <TR align="center">
  <TD class="scFilterTableTd">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">	</script>
<style>
  	.scFormBorder, .scGridBorder {
	  	border: none;
  	} 
  	.scFormTable, .scGridTable {
	  	border: none;
  	}
  	.scFormToolbar, .scGridToolbar {
	  	border: none;
	    background: rgba(0,0,0,0);
  	}
  	.scGridTabela {
    	margin: 0;
	}
  	* {
	    -webkit-box-sizing: content-box;
	    -moz-box-sizing: content-box;
	    box-sizing: content-box;
	}
  	*::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.0);
		background-color: #3333331a;
	}
	*::-webkit-scrollbar {
		width: 6px;
  		background-color: rgba(0,0,0,0);
	}
    *::-webkit-scrollbar:horizontal {
          height: 8px;
          background-color: rgba(0,0,0,0);
      }
	*::-webkit-scrollbar-thumb {
		background-color: #3333336b;
  		border-radius: 10px;
	}
  	#sidebar-wrapper {
  		-ms-overflow-style:none;
  	}
</style>
  </TD>
 </TR>
<?php
   }

   /**
    * @access  public
    * @global  string  $nm_url_saida  $this->Ini->Nm_lang['pesq_global_nm_url_saida']
    * @global  integer  $nm_apl_dependente  $this->Ini->Nm_lang['pesq_global_nm_apl_dependente']
    * @global  string  $nmgp_parms  
    * @global  string  $bprocessa  $this->Ini->Nm_lang['pesq_global_bprocessa']
    */
   function monta_form()
   {
      global 
             $header_cond, $header,
             $id_cond, $id, $id_autocomp,
             $referente_cond, $referente,
             $selectorigem_cond, $selectorigem,
             $datacriacao_cond, $datacriacao, $datacriacao_dia, $datacriacao_mes, $datacriacao_ano, $datacriacao_hor, $datacriacao_min, $datacriacao_seg,
             $num_status_cond, $num_status,
             $statusprojeto_cond, $statusprojeto,
             $tipo_op_cond, $tipo_op,
             $id_op_cond, $id_op,
             $condominio_cond, $condominio, $condominio_autocomp,
             $cliente_cond, $cliente, $cliente_autocomp,
             $end_obra_cidade_cond, $end_obra_cidade, $end_obra_cidade_autocomp,
             $id_origem_cond, $id_origem, $id_origem_autocomp,
             $nm_url_saida, $nm_apl_dependente, $nmgp_parms, $bprocessa, $nmgp_save_name, $NM_operador, $NM_filters, $nmgp_save_option, $NM_filters_del, $Script_BI;
      $Script_BI = "";
      $this->nmgp_botoes['clear'] = "on";
      $this->nmgp_botoes['save'] = "on";
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }
      $this->New_label['razaosocial'] = "" . $this->Ini->Nm_lang['lang_label_companyname'] . "";
      $this->New_label['cnpj_op'] = "" . $this->Ini->Nm_lang['lang_label_cnpj'] . "";
      $this->New_label['labelorigem'] = "" . $this->Ini->Nm_lang['lang_label_origin'] . "";
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("grid_PAS", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $nmgp_tab_label = "";
      $delimitador = "##@@";
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']) && $bprocessa != "recarga" && $bprocessa != "save_form" && $bprocessa != "filter_save" && $bprocessa != "filter_delete")
      { 
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'], $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $header = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['header']; 
          $header_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['header_cond']; 
          $id = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id']; 
          $id_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_cond']; 
          $referente = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['referente']; 
          $referente_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['referente_cond']; 
          $selectorigem = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['selectorigem']; 
          $selectorigem_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['selectorigem_cond']; 
          $datacriacao_dia = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_dia']; 
          $datacriacao_mes = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_mes']; 
          $datacriacao_ano = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_ano']; 
          $datacriacao_hor = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_hor']; 
          $datacriacao_min = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_min']; 
          $datacriacao_seg = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_seg']; 
          $datacriacao_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_cond']; 
          $num_status = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['num_status']; 
          $num_status_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['num_status_cond']; 
          $statusprojeto = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['statusprojeto']; 
          $statusprojeto_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['statusprojeto_cond']; 
          $tipo_op = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['tipo_op']; 
          $tipo_op_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['tipo_op_cond']; 
          $id_op = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_op']; 
          $id_op_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_op_cond']; 
          $condominio = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['condominio']; 
          $condominio_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['condominio_cond']; 
          $cliente = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['cliente']; 
          $cliente_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['cliente_cond']; 
          $end_obra_cidade = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['end_obra_cidade']; 
          $end_obra_cidade_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['end_obra_cidade_cond']; 
          $id_origem = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_origem']; 
          $id_origem_cond = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_origem_cond']; 
          $this->NM_operador = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['NM_operador']; 
      } 
      if (!isset($header_cond) || empty($header_cond))
      {
         $header_cond = "eq";
      }
      if (!isset($id_cond) || empty($id_cond))
      {
         $id_cond = "eq";
      }
      if (!isset($referente_cond) || empty($referente_cond))
      {
         $referente_cond = "eq";
      }
      if (!isset($selectorigem_cond) || empty($selectorigem_cond))
      {
         $selectorigem_cond = "eq";
      }
      if (!isset($datacriacao_cond) || empty($datacriacao_cond))
      {
         $datacriacao_cond = "eq";
      }
      if (!isset($num_status_cond) || empty($num_status_cond))
      {
         $num_status_cond = "eq";
      }
      if (!isset($statusprojeto_cond) || empty($statusprojeto_cond))
      {
         $statusprojeto_cond = "eq";
      }
      if (!isset($tipo_op_cond) || empty($tipo_op_cond))
      {
         $tipo_op_cond = "eq";
      }
      if (!isset($id_op_cond) || empty($id_op_cond))
      {
         $id_op_cond = "eq";
      }
      if (!isset($condominio_cond) || empty($condominio_cond))
      {
         $condominio_cond = "qp";
      }
      if (!isset($cliente_cond) || empty($cliente_cond))
      {
         $cliente_cond = "qp";
      }
      if (!isset($end_obra_cidade_cond) || empty($end_obra_cidade_cond))
      {
         $end_obra_cidade_cond = "qp";
      }
      if (!isset($id_origem_cond) || empty($id_origem_cond))
      {
         $id_origem_cond = "eq";
      }
      $display_aberto  = "style=display:";
      $display_fechado = "style=display:none";
      $opc_hide_input = array("nu","nn","ep","ne");
      $str_hide_header = (in_array($header_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_id = (in_array($id_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_referente = (in_array($referente_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_selectorigem = (in_array($selectorigem_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_datacriacao = (in_array($datacriacao_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_num_status = (in_array($num_status_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_statusprojeto = (in_array($statusprojeto_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_tipo_op = (in_array($tipo_op_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_id_op = (in_array($id_op_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_condominio = (in_array($condominio_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_cliente = (in_array($cliente_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_end_obra_cidade = (in_array($end_obra_cidade_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;
      $str_hide_id_origem = (in_array($id_origem_cond, $opc_hide_input)) ? $display_fechado : $display_aberto;

      if (!isset($header) || $header == "")
      {
          $header = "";
      }
      if (isset($header) && !empty($header))
      {
         $tmp_pos = strpos($header, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $header = substr($header, 0, $tmp_pos);
         }
      }
      if (!isset($id) || $id == "")
      {
          $id = "";
      }
      if (isset($id) && !empty($id))
      {
         $tmp_pos = strpos($id, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $id = substr($id, 0, $tmp_pos);
         }
      }
      if (!isset($referente) || $referente == "")
      {
          $referente = "";
      }
      if (isset($referente) && !empty($referente))
      {
         $tmp_pos = strpos($referente, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $referente = substr($referente, 0, $tmp_pos);
         }
      }
      if (!isset($selectorigem) || $selectorigem == "")
      {
          $selectorigem = "";
      }
      if (isset($selectorigem) && !empty($selectorigem))
      {
         $tmp_pos = strpos($selectorigem, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $selectorigem = substr($selectorigem, 0, $tmp_pos);
         }
      }
      if (!isset($datacriacao) || $datacriacao == "")
      {
          $datacriacao = "";
      }
      if (isset($datacriacao) && !empty($datacriacao))
      {
         $tmp_pos = strpos($datacriacao, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $datacriacao = substr($datacriacao, 0, $tmp_pos);
         }
      }
      if (!isset($num_status) || $num_status == "")
      {
          $num_status = "";
      }
      if (isset($num_status) && !empty($num_status))
      {
         $tmp_pos = strpos($num_status, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $num_status = substr($num_status, 0, $tmp_pos);
         }
      }
      if (!isset($statusprojeto) || $statusprojeto == "")
      {
          $statusprojeto = "";
      }
      if (isset($statusprojeto) && !empty($statusprojeto))
      {
         $tmp_pos = strpos($statusprojeto, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $statusprojeto = substr($statusprojeto, 0, $tmp_pos);
         }
      }
      if (!isset($tipo_op) || $tipo_op == "")
      {
          $tipo_op = "";
      }
      if (isset($tipo_op) && !empty($tipo_op))
      {
         $tmp_pos = strpos($tipo_op, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $tipo_op = substr($tipo_op, 0, $tmp_pos);
         }
      }
      if (!isset($id_op) || $id_op == "")
      {
          $id_op = "";
      }
      if (isset($id_op) && !empty($id_op))
      {
         $tmp_pos = strpos($id_op, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $id_op = substr($id_op, 0, $tmp_pos);
         }
      }
      if (!isset($condominio) || $condominio == "")
      {
          $condominio = "";
      }
      if (isset($condominio) && !empty($condominio))
      {
         $tmp_pos = strpos($condominio, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $condominio = substr($condominio, 0, $tmp_pos);
         }
      }
      if (!isset($cliente) || $cliente == "")
      {
          $cliente = "";
      }
      if (isset($cliente) && !empty($cliente))
      {
         $tmp_pos = strpos($cliente, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $cliente = substr($cliente, 0, $tmp_pos);
         }
      }
      if (!isset($end_obra_cidade) || $end_obra_cidade == "")
      {
          $end_obra_cidade = "";
      }
      if (isset($end_obra_cidade) && !empty($end_obra_cidade))
      {
         $tmp_pos = strpos($end_obra_cidade, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $end_obra_cidade = substr($end_obra_cidade, 0, $tmp_pos);
         }
      }
      if (!isset($id_origem) || $id_origem == "")
      {
          $id_origem = "";
      }
      if (isset($id_origem) && !empty($id_origem))
      {
         $tmp_pos = strpos($id_origem, "##@@");
         if ($tmp_pos === false)
         { }
         else
         {
         $id_origem = substr($id_origem, 0, $tmp_pos);
         }
      }
?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_0" valign="top" width="100%" style="height: 100%;">
   <tr>



   
      <INPUT type="hidden" id="SC_id_cond" name="id_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['header'])) ? $this->New_label['header'] : "header";
 $nmgp_tab_label .= "header?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br>
      <SELECT class="scFilterObjectOdd" id="SC_header_cond" name="header_cond" onChange="nm_campos_between(document.getElementById('id_vis_header'), this, 'header')">
       <OPTION value="eq" <?php if ("eq" == $header_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_exac'] ?></OPTION>
       <OPTION value="ii" <?php if ("ii" == $header_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_stts_with'] ?></OPTION>
       <OPTION value="qp" <?php if ("qp" == $header_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_like'] ?></OPTION>
       <OPTION value="df" <?php if ("df" == $header_cond) { echo "selected"; } ?>><?php echo $this->Ini->Nm_lang['lang_srch_dife'] ?></OPTION>
      </SELECT>
      <br><span id="id_hide_header"  <?php echo $str_hide_header?>><INPUT  type="text" id="SC_header" name="header" value="<?php echo NM_encode_input($header) ?>" size=10 alt="{datatype: 'text', maxLength: 20, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" class="sc-js-input scFilterObjectOdd">
 </TD>
   
   
      <INPUT type="hidden" id="SC_id_cond" name="id_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "Nº";
 $nmgp_tab_label .= "id?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_id"  <?php echo $str_hide_id?>><?php
      $id_look = substr($this->Db->qstr($id), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($id))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct ID from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where ID = $id_look"; 
      }
      else
      {
          $nm_comando = "select distinct ID from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where ID = $id_look"; 
      }
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['hticnsdata']['reg_conf']['grup_num'], $_SESSION['hticnsdata']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['hticnsdata']['reg_conf']['neg_num'] , $_SESSION['hticnsdata']['reg_conf']['simb_neg'], $_SESSION['hticnsdata']['reg_conf']['num_group_digit']) ; 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 
      if (isset($nmgp_def_dados[0][$id]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$id];
      }
      else
      {
          $sAutocompValue = $id;
      }
?>
<INPUT  type="text" id="SC_id" name="id" value="<?php echo NM_encode_input($id) ?>" size=11 alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['hticnsdata']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_id" name="id_autocomp" size="11" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'integer', maxLength: 11, thousandsSep: '<?php echo $_SESSION['hticnsdata']['reg_conf']['grup_num'] ?>', allowNegative: false, onlyNegative: false, enterTab: false}">

 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_referente_cond" name="referente_cond" value="eq">

    <TD nowrap class="scFilterLabelEven css_referente_fil_label" > <?php
 $SC_Label = (isset($this->New_label['referente'])) ? $this->New_label['referente'] : "" . $this->Ini->Nm_lang['lang_label_reference'] . "";
 $nmgp_tab_label .= "referente?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_referente"  <?php echo $str_hide_referente?>> 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['referente'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['referente'][] = "ST";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['referente'][] = "AP";
 ?>

 <SELECT class="scFilterObjectEven" id="SC_referente"  name="referente"  size="1">
 <OPTION value=""></option>
 <OPTION value="ST##@@<?php echo $this->Ini->Nm_lang['lang_label_technicalSupervision'] ?>"<?php if ($referente == "ST") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_technicalSupervision'] ?></option>
 <OPTION value="AP##@@<?php echo $this->Ini->Nm_lang['lang_label_projectAnalysis'] ?>"<?php if ($referente == "AP") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_projectAnalysis'] ?></option>
 </SELECT>
 </TD>
   
   
      <INPUT type="hidden" id="SC_selectorigem_cond" name="selectorigem_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" > <?php
 $SC_Label = (isset($this->New_label['selectorigem'])) ? $this->New_label['selectorigem'] : "Origem";
 $nmgp_tab_label .= "selectorigem?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_selectorigem"  <?php echo $str_hide_selectorigem?>><INPUT  type="text" id="SC_selectorigem" name="selectorigem" value="<?php echo NM_encode_input($selectorigem) ?>" size=30 alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" class="sc-js-input scFilterObjectEven">
 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_datacriacao_cond" name="datacriacao_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['datacriacao'])) ? $this->New_label['datacriacao'] : "" . $this->Ini->Nm_lang['lang_label_creationdate'] . "";
 $nmgp_tab_label .= "datacriacao?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_datacriacao"  <?php echo $str_hide_datacriacao?>>
<?php
  $Form_base = "ddmmyyyy";
  $date_format_show = "";
  $Str_date = str_replace("a", "y", strtolower($_SESSION['hticnsdata']['reg_conf']['date_format']));
  $Lim   = strlen($Str_date);
  $Str   = "";
  $Ult   = "";
  $Arr_D = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_date, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_D[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_D[] = $Str;
  $Prim = true;
  foreach ($Arr_D as $Cada_d)
  {
      if (strpos($Form_base, $Cada_d) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['hticnsdata']['reg_conf']['date_sep'] : "";
          $date_format_show .= $Cada_d;
          $Prim = false;
      }
  }
  $date_format_show .= " ";
  $Str_time = strtolower($_SESSION['hticnsdata']['reg_conf']['time_format']);
  $Lim   = strlen($Str_time);
  $Str   = "";
  $Ult   = "";
  $Arr_T = array();
  for ($I = 0; $I < $Lim; $I++)
  {
      $Char = substr($Str_time, $I, 1);
      if ($Char != $Ult && "" != $Str)
      {
          $Arr_T[] = $Str;
          $Str     = $Char;
      }
      else
      {
          $Str    .= $Char;
      }
      $Ult = $Char;
  }
  $Arr_T[] = $Str;
  $Prim = true;
  foreach ($Arr_T as $Cada_t)
  {
      if (strpos($Form_base, $Cada_t) !== false)
      {
          $date_format_show .= (!$Prim) ? $_SESSION['hticnsdata']['reg_conf']['time_sep'] : "";
          $date_format_show .= $Cada_t;
          $Prim = false;
      }
  }
  $Arr_format = array_merge($Arr_D, $Arr_T);
  $date_format_show = str_replace("dd",   $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
  $date_format_show = str_replace("mm",   $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
  $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
  $date_format_show = str_replace("hh",   $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
  $date_format_show = str_replace("ii",   $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
  $date_format_show = str_replace("ss",   $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
  $date_format_show = "(" . $date_format_show .  ")";

?>

         <?php

foreach ($Arr_format as $Part_date)
{
?>
<?php
  if (substr($Part_date, 0,1) == "d")
  {
?>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_datacriacao_dia" name="datacriacao_dia" value="<?php echo NM_encode_input($datacriacao_dia); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.datacriacao_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "m")
  {
?>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_datacriacao_mes" name="datacriacao_mes" value="<?php echo NM_encode_input($datacriacao_mes); ?>" size="2" alt="{datatype: 'mask', maskList: '99', alignRight: true, maxLength: 2, autoTab: false, enterTab: false}" onKeyUp="nm_tabula(this, 2, document.F1.datacriacao_cond.value)">

<?php
  }
?>
<?php
  if (substr($Part_date, 0,1) == "y")
  {
?>
<INPUT class="sc-js-input scFilterObjectOdd" type="text" id="SC_datacriacao_ano" name="datacriacao_ano" value="<?php echo NM_encode_input($datacriacao_ano); ?>" size="4" alt="{datatype: 'mask', maskList: '9999', alignRight: true, maxLength: 4, autoTab: true, enterTab: false}">
 
<?php
  }
?>

<?php

}

?>
<INPUT type="hidden" id="sc_datacriacao_jq">
 </TD>
   
   
      <INPUT type="hidden" id="SC_num_status_cond" name="num_status_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['num_status'])) ? $this->New_label['num_status'] : "Status";
 $nmgp_tab_label .= "num_status?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_num_status"  <?php echo $str_hide_num_status?>> 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "F";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "A";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "AVI";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "AA";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "AE";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "RAE";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "R";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "E";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'][] = "C";
 ?>

 <SELECT class="scFilterObjectOdd" id="SC_num_status"  name="num_status"  size="1">
 <OPTION value=""></option>
 <OPTION value="F##@@<?php echo $this->Ini->Nm_lang['lang_label_faturado'] ?>"<?php if ($num_status == "F") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_faturado'] ?></option>
 <OPTION value="A##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc1'] ?>"<?php if ($num_status == "A") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc1'] ?></option>
 <OPTION value="AVI##@@<?php echo $this->Ini->Nm_lang['lang_label_aguardviasimpressas'] ?>"<?php if ($num_status == "AVI") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_aguardviasimpressas'] ?></option>
 <OPTION value="AA##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc2'] ?>"<?php if ($num_status == "AA") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc2'] ?></option>
 <OPTION value="AE##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc3'] ?>"<?php if ($num_status == "AE") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc3'] ?></option>
 <OPTION value="RAE##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc4'] ?>"<?php if ($num_status == "RAE") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc4'] ?></option>
 <OPTION value="R##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc5'] ?>"<?php if ($num_status == "R") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc5'] ?></option>
 <OPTION value="E##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc6'] ?>"<?php if ($num_status == "E") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc6'] ?></option>
 <OPTION value="C##@@<?php echo $this->Ini->Nm_lang['lang_label_status_upc8'] ?>"<?php if ($num_status == "C") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_status_upc8'] ?></option>
 </SELECT>
 </TD>
   



   </tr><tr>



   
      <INPUT type="hidden" id="SC_statusprojeto_cond" name="statusprojeto_cond" value="eq">

    <TD nowrap class="scFilterLabelEven" > <?php
 $SC_Label = (isset($this->New_label['statusprojeto'])) ? $this->New_label['statusprojeto'] : "" . $this->Ini->Nm_lang['lang_label_statusdoprojeto'] . "";
 $nmgp_tab_label .= "statusprojeto?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_statusprojeto"  <?php echo $str_hide_statusprojeto?>>
<?php
      $statusprojeto_look = substr($this->Db->qstr($statusprojeto), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) GROUP BY statusProjeto  HAVING statusProjeto != ''"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['statusprojeto'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['statusprojeto'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_statusprojeto">
      <SELECT class="scFilterObjectEven" id="SC_statusprojeto" name="statusprojeto"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $statusprojeto)
            {
                    $statusprojeto_sel = ($nm_opc_cod === $statusprojeto) ? "selected" : "";
            }
            else
            {
               $statusprojeto_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $statusprojeto_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   




    <TD class="scFilterLabelEven" colspan="1" >&nbsp;</TD>   </tr>
   </TABLE>
  </TD>
   </TR>
   </TABLE>
   </TD></TR><TR><TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_1" valign="top" width="100%" style="height: 100%;">
   <tr>



   
      <INPUT type="hidden" id="SC_tipo_op_cond" name="tipo_op_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['tipo_op'])) ? $this->New_label['tipo_op'] : "" . $this->Ini->Nm_lang['lang_label_destinedTo'] . "";
 $nmgp_tab_label .= "tipo_op?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_tipo_op"  <?php echo $str_hide_tipo_op?>> 
<?php
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['tipo_op'] = array();
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['tipo_op'][] = "O";
  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['tipo_op'][] = "P";
 ?>

 <SELECT class="scFilterObjectOdd" id="SC_tipo_op"  name="tipo_op" onChange="nm_refresh_tipo_op();" size="1">
 <OPTION value=""></option>
 <OPTION value="O##@@<?php echo $this->Ini->Nm_lang['lang_label_operator'] ?>"<?php if ($tipo_op == "O") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_operator'] ?></option>
 <OPTION value="P##@@<?php echo $this->Ini->Nm_lang['lang_label_serviceprovider'] ?>"<?php if ($tipo_op == "P") { echo " selected" ;} ?>><?php echo $this->Ini->Nm_lang['lang_label_serviceprovider'] ?></option>
 </SELECT>
 </TD>
   
   
      <INPUT type="hidden" id="SC_id_op_cond" name="id_op_cond" value="eq">

    <TD nowrap class="scFilterLabelOdd" > <?php
 $SC_Label = (isset($this->New_label['id_op'])) ? $this->New_label['id_op'] : "Razão Social";
 $nmgp_tab_label .= "id_op?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php echo $SC_Label ?><br><span id="id_hide_id_op"  <?php echo $str_hide_id_op?>>
<?php
      $id_op_look = substr($this->Db->qstr($id_op), 1, -1); 
      $nmgp_def_dados = "" ; 
      $nm_comando = "SELECT     ID_OP,      (CASE 	WHEN Tipo_OP = 'O' AND '$tipo_op' = 'O' THEN (SELECT tb_operadoras.Nom_Operadoras FROM tb_operadoras WHERE tb_operadoras.ID_Operadoras = tb_pas.ID_OP) 	WHEN Tipo_OP = 'P' AND '$tipo_op' = 'P' THEN (SELECT tb_prestadores.Nom_RazaoSocial FROM tb_prestadores WHERE tb_prestadores.ID_Prestador = tb_pas.ID_OP)     END) as RazaoSocial FROM     tb_pas  WHERE Num_Ativo != 'R'  " . $_SESSION['grid_PAS_filter'] . "  GROUP BY RazaoSocial  ORDER BY RazaoSocial DESC"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['id_op'] = array();
         while (!$rs->EOF) 
         { 
            $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['id_op'][] = trim($rs->fields[0]);
            $nmgp_def_dados .= trim($rs->fields[1]) . "?#?" ; 
            $nmgp_def_dados .= trim($rs->fields[0]) . "?#?N?@?" ; 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
?>
   <span id="idAjaxSelect_id_op">
      <SELECT class="scFilterObjectOdd" id="SC_id_op" name="id_op"  size="1">
       <OPTION value=""></OPTION>
<?php
      $nm_opcoesx = str_replace("?#?@?#?", "?#?@ ?#?", $nmgp_def_dados);
      $nm_opcoes  = explode("?@?", $nm_opcoesx);
      foreach ($nm_opcoes as $nm_opcao)
      {
         if (!empty($nm_opcao))
         {
            $temp_bug_list = explode("?#?", $nm_opcao);
            list($nm_opc_val, $nm_opc_cod, $nm_opc_sel) = $temp_bug_list;
            if ($nm_opc_cod == "@ ") {$nm_opc_cod = trim($nm_opc_cod); }
            if ("" != $id_op)
            {
                    $id_op_sel = ($nm_opc_cod === $id_op) ? "selected" : "";
            }
            else
            {
               $id_op_sel = ("S" == $nm_opc_sel) ? "selected" : "";
            }
            $nm_sc_valor = $nm_opc_val;
            $nm_opc_val = $nm_sc_valor;
?>
       <OPTION value="<?php echo NM_encode_input($nm_opc_cod . $delimitador . $nm_opc_val); ?>" <?php echo $id_op_sel; ?>><?php echo $nm_opc_val; ?></OPTION>
<?php
         }
      }
?>
      </SELECT>
   </span>
<?php
?>
         </TD>
   




    <TD class="scFilterLabelOdd" colspan="1" >&nbsp;</TD>   </tr>
   </TABLE>
  </TD>
   </TR>
   </TABLE>
   </TD></TR><TR><TD class="scFilterTableTd">
   <TABLE style="padding: 0px; spacing: 0px; border-width: 0px;" width="100%" height="100%">
   <TR valign="top" >
  <TD width="100%" height="">
   <TABLE class="scFilterTable" id="hidden_bloco_2" valign="top" width="100%" style="height: 100%;">
   <tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['condominio'])) ? $this->New_label['condominio'] : "" . $this->Ini->Nm_lang['lang_label_enterprise'] . ""; ?></TD>
      
      <INPUT type="hidden" id="SC_condominio_cond" name="condominio_cond" value="qp">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_condominio" <?php echo $str_hide_condominio?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['condominio'])) ? $this->New_label['condominio'] : "" . $this->Ini->Nm_lang['lang_label_enterprise'] . "";
 $nmgp_tab_label .= "condominio?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $condominio_look = substr($this->Db->qstr($condominio), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Condominio from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where Condominio = '$condominio_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$condominio]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$condominio];
      }
      else
      {
          $sAutocompValue = $condominio;
      }
?>
<INPUT  type="text" id="SC_condominio" name="condominio" value="<?php echo NM_encode_input($condominio) ?>" size=50 alt="{datatype: 'text', maxLength: 100, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_condominio" name="condominio_autocomp" size="50" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "" . $this->Ini->Nm_lang['lang_label_client'] . ""; ?></TD>
      
      <INPUT type="hidden" id="SC_cliente_cond" name="cliente_cond" value="qp">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_cliente" <?php echo $str_hide_cliente?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['cliente'])) ? $this->New_label['cliente'] : "" . $this->Ini->Nm_lang['lang_label_client'] . "";
 $nmgp_tab_label .= "cliente?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $cliente_look = substr($this->Db->qstr($cliente), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Cliente from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where Cliente = '$cliente_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$cliente]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$cliente];
      }
      else
      {
          $sAutocompValue = $cliente;
      }
?>
<INPUT  type="text" id="SC_cliente" name="cliente" value="<?php echo NM_encode_input($cliente) ?>" size=50 alt="{datatype: 'text', maxLength: 100, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_cliente" name="cliente_autocomp" size="50" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelOdd"><?php echo (isset($this->New_label['end_obra_cidade'])) ? $this->New_label['end_obra_cidade'] : "" . $this->Ini->Nm_lang['lang_label_city'] . ""; ?></TD>
      
      <INPUT type="hidden" id="SC_end_obra_cidade_cond" name="end_obra_cidade_cond" value="qp">
 
     <TD colspan=2 class="scFilterFieldOdd">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_end_obra_cidade" <?php echo $str_hide_end_obra_cidade?> valign="top">
        <TD class="scFilterFieldFontOdd">
           <?php
 $SC_Label = (isset($this->New_label['end_obra_cidade'])) ? $this->New_label['end_obra_cidade'] : "" . $this->Ini->Nm_lang['lang_label_city'] . "";
 $nmgp_tab_label .= "end_obra_cidade?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $end_obra_cidade_look = substr($this->Db->qstr($end_obra_cidade), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct End_Obra_Cidade from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where End_Obra_Cidade = '$end_obra_cidade_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$end_obra_cidade]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$end_obra_cidade];
      }
      else
      {
          $sAutocompValue = $end_obra_cidade;
      }
?>
<INPUT  type="text" id="SC_end_obra_cidade" name="end_obra_cidade" value="<?php echo NM_encode_input($end_obra_cidade) ?>" size=50 alt="{datatype: 'text', maxLength: 100, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectOdd" type="text" id="id_ac_end_obra_cidade" name="end_obra_cidade_autocomp" size="50" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 50, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr><tr>





      <TD class="scFilterLabelEven"><?php echo (isset($this->New_label['id_origem'])) ? $this->New_label['id_origem'] : "" . $this->Ini->Nm_lang['lang_label_origin'] . ""; ?></TD>
      
      <INPUT type="hidden" id="SC_id_origem_cond" name="id_origem_cond" value="eq">
 
     <TD colspan=2 class="scFilterFieldEven">
      <TABLE  border="0" cellpadding="0" cellspacing="0">
       <TR id="id_hide_id_origem" <?php echo $str_hide_id_origem?> valign="top">
        <TD class="scFilterFieldFontEven">
           <?php
 $SC_Label = (isset($this->New_label['id_origem'])) ? $this->New_label['id_origem'] : "" . $this->Ini->Nm_lang['lang_label_origin'] . "";
 $nmgp_tab_label .= "id_origem?#?" . $SC_Label . "?@?";
 $date_sep_bw = "";
?>
<?php
      $id_origem_look = substr($this->Db->qstr($id_origem), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct ID_Origem from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where ID_Origem = '$id_origem_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = trim($rs->fields[0]);
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
      if (isset($nmgp_def_dados[0][$id_origem]))
      {
          $sAutocompValue = $nmgp_def_dados[0][$id_origem];
      }
      else
      {
          $sAutocompValue = $id_origem;
      }
?>
<INPUT  type="text" id="SC_id_origem" name="id_origem" value="<?php echo NM_encode_input($id_origem) ?>" size=45 alt="{datatype: 'text', maxLength: 45, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}" style="display: none">
<input class="sc-js-input scFilterObjectEven" type="text" id="id_ac_id_origem" name="id_origem_autocomp" size="30" value="<?php echo NM_encode_input($sAutocompValue); ?>" alt="{datatype: 'text', maxLength: 30, allowedChars: '', lettersCase: '', autoTab: false, enterTab: false}">


        </TD>
       </TR>
      </TABLE>
     </TD>

   </tr>
   </TABLE>
  </TD>
 </TR>
 </TABLE>
 </TD>
 </TR>
 <TR>
  <TD class="scFilterTableTd" align="center">
<INPUT type="hidden" id="SC_NM_operador" name="NM_operador" value="and">  </TD>
 </TR>
   <INPUT type="hidden" name="nmgp_tab_label" value="<?php echo NM_encode_input($nmgp_tab_label); ?>"> 
   <INPUT type="hidden" name="bprocessa" value="pesq"> 
 <?php
     if ($_SESSION['hticnsdata']['proc_mobile'])
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
<?php
   if (is_file("grid_PAS_help.txt"))
   {
      $Arq_WebHelp = file("grid_PAS_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "sc_b_cancel_bot", "", "" . $this->Ini->Nm_lang['lang_btn_return'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btn_return'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form()", "limpa_form()", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
  </TD>
 </TR>
     <?php
     }
     else
     {
     ?>
 <TR align="center">
  <TD class="scFilterTableTd">
   <table width="100%" class="scFilterToolbar"><tr>
    <td class="scFilterToolbarPadding" align="left" width="33%" nowrap>
    </td>
    <td class="scFilterToolbarPadding" align="center" width="33%" nowrap>
<?php
   if (is_file("grid_PAS_help.txt"))
   {
      $Arq_WebHelp = file("grid_PAS_help.txt"); 
      if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
      {
          $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
          $Tmp = explode(";", $Arq_WebHelp[0]); 
          foreach ($Tmp as $Cada_help)
          {
              $Tmp1 = explode(":", $Cada_help); 
              if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "fil" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
              {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "sc_b_help_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
              }
          }
      }
   }
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "sc_b_cancel_bot", "", "" . $this->Ini->Nm_lang['lang_btn_return'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['lang_btn_return'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   if ($this->nmgp_botoes['clear'] == "on")
   {
?>
          <?php echo nmButtonOutput($this->arr_buttons, "blimpar", "limpa_form()", "limpa_form()", "limpa_frm_bot", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<?php
   }
?>
   <?php echo nmButtonOutput($this->arr_buttons, "bpesquisa", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "document.F1.bprocessa.value='pesq'; setTimeout(function() {nm_submit_form()}, 200)", "sc_b_pesq_bot", "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone'] . "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "" . $this->Ini->Nm_lang['nmgp_lang_btns_srch_lone_hint'] . "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
    </td>
    <td class="scFilterToolbarPadding" align="right" width="33%" nowrap>
    </td>
   </tr></table>
  </TD>
 </TR>
     <?php
     }
 ?>
<?php
   }

   function monta_html_fim()
   {
       global $bprocessa, $nm_url_saida, $Script_BI;
?>

</TABLE>
   <INPUT type="hidden" name="form_condicao" value="3">
</FORM> 
<?php
   if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['grid_PAS']['start'] == 'filter')
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="<?php echo $nm_url_saida; ?>" target="_self"> 
<?php
   }
   else
   {
?>
   <FORM style="display:none;" name="form_cancel"  method="POST" action="./" target="_self"> 
<?php
   }
?>
   <INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
   <INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<?php
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['orig_pesq'] == "grid")
   {
       $Ret_cancel_pesq = "volta_grid";
   }
   else
   {
       $Ret_cancel_pesq = "resumo";
   }
?>
   <INPUT type="hidden" name="nmgp_opcao" value="<?php echo $Ret_cancel_pesq; ?>"> 
   </FORM> 
<SCRIPT type="text/javascript">
 function nm_submit_form()
 {
    document.F1.submit();
 }
 function limpa_form()
 {
   document.F1.reset();
   nm_campos_between(document.getElementById('id_vis_header'), document.F1.header_cond, 'header');
   document.F1.header.value = "";
   nm_campos_between(document.getElementById('id_vis_id'), document.F1.id_cond, 'id');
   document.F1.id.value = "";
   document.F1.id_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_referente'), document.F1.referente_cond, 'referente');
   document.F1.referente.value = "";
   nm_campos_between(document.getElementById('id_vis_selectorigem'), document.F1.selectorigem_cond, 'selectorigem');
   document.F1.selectorigem.value = "";
   nm_campos_between(document.getElementById('id_vis_datacriacao'), document.F1.datacriacao_cond, 'datacriacao');
   document.F1.datacriacao_dia.value = "";
   document.F1.datacriacao_mes.value = "";
   document.F1.datacriacao_ano.value = "";
   nm_campos_between(document.getElementById('id_vis_num_status'), document.F1.num_status_cond, 'num_status');
   document.F1.num_status.value = "";
   nm_campos_between(document.getElementById('id_vis_statusprojeto'), document.F1.statusprojeto_cond, 'statusprojeto');
   document.F1.statusprojeto.value = "";
   nm_campos_between(document.getElementById('id_vis_tipo_op'), document.F1.tipo_op_cond, 'tipo_op');
   document.F1.tipo_op.value = "";
   nm_campos_between(document.getElementById('id_vis_id_op'), document.F1.id_op_cond, 'id_op');
   document.F1.id_op.value = "";
   nm_campos_between(document.getElementById('id_vis_condominio'), document.F1.condominio_cond, 'condominio');
   document.F1.condominio.value = "";
   document.F1.condominio_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_cliente'), document.F1.cliente_cond, 'cliente');
   document.F1.cliente.value = "";
   document.F1.cliente_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_end_obra_cidade'), document.F1.end_obra_cidade_cond, 'end_obra_cidade');
   document.F1.end_obra_cidade.value = "";
   document.F1.end_obra_cidade_autocomp.value = "";
   nm_campos_between(document.getElementById('id_vis_id_origem'), document.F1.id_origem_cond, 'id_origem');
   document.F1.id_origem.value = "";
   document.F1.id_origem_autocomp.value = "";
 }
function nm_tabula(obj, tam, cond)
{
   if (obj.value.length == tam)
   {
       for (i=0; i < document.F1.elements.length;i++)
       {
            if (document.F1.elements[i].name == obj.name)
            {
                i++;
                campo = document.F1.elements[i].name;
                campo2 = campo.lastIndexOf('_input_2');
                if (document.F1.elements[i].type == 'text' && (campo2 == -1 || cond == 'bw'))
                {
                    eval('document.F1.' + campo + '.focus()');
                }
                break;
            }
       }
   }
}
 function SC_carga_evt_jquery()
 {
    $('#SC_datacriacao_dia').bind('change', function() {sc_grid_PAS_valida_dia(this)});
    $('#SC_datacriacao_mes').bind('change', function() {sc_grid_PAS_valida_mes(this)});
 }
 function sc_grid_PAS_valida_dia(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 31))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_iday'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
 function sc_grid_PAS_valida_mes(obj)
 {
     if (obj.value != "" && (obj.value < 1 || obj.value > 12))
     {
         if (confirm (Nm_erro['lang_jscr_ivdt'] +  " " + Nm_erro['lang_jscr_mnth'] +  " " + Nm_erro['lang_jscr_wfix']))
         {
            Xfocus = setTimeout(function() { obj.focus(); }, 10);
         }
     }
 }
  mt  = document.getElementById('main_table');
  x_dim();
  function x_dim()
  {
     var W = mt.clientWidth,
         H = mt.clientHeight;
     if (0 == W || 0 == H)
     {
         setTimeout("x_dim()", 50);
     }
     else
     {
         strMaxHeight = Math.min(($(window.parent).height()-80), H);
         self.parent.tb_resize(strMaxHeight + 40, W + 40);
     }
 }
<?php
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
?>
</SCRIPT>
</BODY>
</HTML>
<?php
   }

   /**
    * @access  public
    * @param  string  $NM_operador  $this->Ini->Nm_lang['pesq_global_NM_operador']
    * @param  array  $nmgp_tab_label  
    */
   function inicializa_vars()
   {
      global $NM_operador, $nmgp_tab_label;

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/");  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1);  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz;
      $this->Campos_Mens_erro = ""; 
      $this->nm_data = new nm_data("pt_br");
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] = "";
      if (!empty($nmgp_tab_label))
      {
         $nm_tab_campos = explode("?@?", $nmgp_tab_label);
         $nmgp_tab_label = array();
         foreach ($nm_tab_campos as $cada_campo)
         {
             $parte_campo = explode("?#?", $cada_campo);
             $nmgp_tab_label[$parte_campo[0]] = $parte_campo[1];
         }
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_orig']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_orig'] = "";
      }
      $this->comando        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_orig'];
      $this->comando_sum    = "";
      $this->comando_filtro = "";
      $this->comando_ini    = "ini";
      $this->comando_fim    = "";
      $this->NM_operador    = (isset($NM_operador) && ("and" == strtolower($NM_operador) || "or" == strtolower($NM_operador))) ? $NM_operador : "and";
   }

   /**
    * @access  public
    */
   function trata_campos()
   {
      global $header_cond, $header,
             $id_cond, $id, $id_autocomp,
             $referente_cond, $referente,
             $selectorigem_cond, $selectorigem,
             $datacriacao_cond, $datacriacao, $datacriacao_dia, $datacriacao_mes, $datacriacao_ano, $datacriacao_hor, $datacriacao_min, $datacriacao_seg,
             $num_status_cond, $num_status,
             $statusprojeto_cond, $statusprojeto,
             $tipo_op_cond, $tipo_op,
             $id_op_cond, $id_op,
             $condominio_cond, $condominio, $condominio_autocomp,
             $cliente_cond, $cliente, $cliente_autocomp,
             $end_obra_cidade_cond, $end_obra_cidade, $end_obra_cidade_autocomp,
             $id_origem_cond, $id_origem, $id_origem_autocomp, $nmgp_tab_label;

      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      if (!empty($id_autocomp) && empty($id))
      {
          $id = $id_autocomp;
      }
      if (!empty($condominio_autocomp) && empty($condominio))
      {
          $condominio = $condominio_autocomp;
      }
      if (!empty($cliente_autocomp) && empty($cliente))
      {
          $cliente = $cliente_autocomp;
      }
      if (!empty($end_obra_cidade_autocomp) && empty($end_obra_cidade))
      {
          $end_obra_cidade = $end_obra_cidade_autocomp;
      }
      if (!empty($id_origem_autocomp) && empty($id_origem))
      {
          $id_origem = $id_origem_autocomp;
      }
      $header_cond_salva = $header_cond; 
      if (!isset($header_input_2) || $header_input_2 == "")
      {
          $header_input_2 = $header;
      }
      $id_cond_salva = $id_cond; 
      if (!isset($id_input_2) || $id_input_2 == "")
      {
          $id_input_2 = $id;
      }
      $referente_cond_salva = $referente_cond; 
      if (!isset($referente_input_2) || $referente_input_2 == "")
      {
          $referente_input_2 = $referente;
      }
      $selectorigem_cond_salva = $selectorigem_cond; 
      if (!isset($selectorigem_input_2) || $selectorigem_input_2 == "")
      {
          $selectorigem_input_2 = $selectorigem;
      }
      $datacriacao_cond_salva = $datacriacao_cond; 
      $num_status_cond_salva = $num_status_cond; 
      if (!isset($num_status_input_2) || $num_status_input_2 == "")
      {
          $num_status_input_2 = $num_status;
      }
      $statusprojeto_cond_salva = $statusprojeto_cond; 
      if (!isset($statusprojeto_input_2) || $statusprojeto_input_2 == "")
      {
          $statusprojeto_input_2 = $statusprojeto;
      }
      $tipo_op_cond_salva = $tipo_op_cond; 
      if (!isset($tipo_op_input_2) || $tipo_op_input_2 == "")
      {
          $tipo_op_input_2 = $tipo_op;
      }
      $id_op_cond_salva = $id_op_cond; 
      if (!isset($id_op_input_2) || $id_op_input_2 == "")
      {
          $id_op_input_2 = $id_op;
      }
      $condominio_cond_salva = $condominio_cond; 
      if (!isset($condominio_input_2) || $condominio_input_2 == "")
      {
          $condominio_input_2 = $condominio;
      }
      $cliente_cond_salva = $cliente_cond; 
      if (!isset($cliente_input_2) || $cliente_input_2 == "")
      {
          $cliente_input_2 = $cliente;
      }
      $end_obra_cidade_cond_salva = $end_obra_cidade_cond; 
      if (!isset($end_obra_cidade_input_2) || $end_obra_cidade_input_2 == "")
      {
          $end_obra_cidade_input_2 = $end_obra_cidade;
      }
      $id_origem_cond_salva = $id_origem_cond; 
      if (!isset($id_origem_input_2) || $id_origem_input_2 == "")
      {
          $id_origem_input_2 = $id_origem;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'];
      }
      if ($id_cond != "in")
      {
          nm_limpa_numero($id, $_SESSION['hticnsdata']['reg_conf']['grup_num']) ; 
      }
      else
      {
          $Nm_sc_valores = explode(",", $id);
          foreach ($Nm_sc_valores as $II => $Nm_sc_valor)
          {
              $Nm_sc_valor = trim($Nm_sc_valor);
              nm_limpa_numero($Nm_sc_valor, $_SESSION['hticnsdata']['reg_conf']['grup_num']); 
              $Nm_sc_valores[$II] = $Nm_sc_valor;
          }
          $id = implode(",", $Nm_sc_valores);
      }
      $tmp_pos = strpos($referente, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $referente;
      }
      else {
          $L_lookup = substr($referente, 0, $tmp_pos);
      }
      if (!empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['referente'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_label_reference'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($num_status, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $num_status;
      }
      else {
          $L_lookup = substr($num_status, 0, $tmp_pos);
      }
      if (!empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['num_status'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Status : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($statusprojeto, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $statusprojeto;
      }
      else {
          $L_lookup = substr($statusprojeto, 0, $tmp_pos);
      }
      if (!empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['statusprojeto'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_label_statusdoprojeto'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($tipo_op, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $tipo_op;
      }
      else {
          $L_lookup = substr($tipo_op, 0, $tmp_pos);
      }
      if (!empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['tipo_op'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_label_destinedTo'] . " : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $tmp_pos = strpos($id_op, "##@@");
      if ($tmp_pos === false) {
          $L_lookup = $id_op;
      }
      else {
          $L_lookup = substr($id_op, 0, $tmp_pos);
      }
      if (!empty($L_lookup) && !in_array($L_lookup, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['psq_check_ret']['id_op'])) {
          if (!empty($this->Campos_Mens_erro)) {$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "Razão Social : " . $this->Ini->Nm_lang['lang_errm_ajax_data'];
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']  = array(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['header'] = $header; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['header_cond'] = $header_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id'] = $id; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_cond'] = $id_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['referente'] = $referente; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['referente_cond'] = $referente_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['selectorigem'] = $selectorigem; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['selectorigem_cond'] = $selectorigem_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_dia'] = $datacriacao_dia; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_mes'] = $datacriacao_mes; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_ano'] = $datacriacao_ano; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_hor'] = $datacriacao_hor; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_min'] = $datacriacao_min; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_seg'] = $datacriacao_seg; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_cond'] = $datacriacao_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['num_status'] = $num_status; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['num_status_cond'] = $num_status_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['statusprojeto'] = $statusprojeto; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['statusprojeto_cond'] = $statusprojeto_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['tipo_op'] = $tipo_op; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['tipo_op_cond'] = $tipo_op_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_op'] = $id_op; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_op_cond'] = $id_op_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['condominio'] = $condominio; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['condominio_cond'] = $condominio_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['cliente'] = $cliente; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['cliente_cond'] = $cliente_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['end_obra_cidade'] = $end_obra_cidade; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['end_obra_cidade_cond'] = $end_obra_cidade_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_origem'] = $id_origem; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_origem_cond'] = $id_origem_cond_salva; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['NM_operador'] = $this->NM_operador; 
      if ($id_cond != "in" && $id_cond != "bw" && !empty($id) && !is_numeric($id))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Nº";
      }
      if ($id_cond == "bw" && ((!empty($id) && !is_numeric($id)) || (!empty($id_input_2) && !is_numeric($id_input_2)) ))
      {
          if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= $this->Ini->Nm_lang['lang_errm_ajax_data'] . " : Nº";
      }
      $referente_LKP = $referente;
      $Tmp_pos = strpos($referente, "##@@");
      if ($Tmp_pos !== false)
      {
          $referente = substr($referente, 0, $Tmp_pos);
          $referente_LKP = $referente;
      }
      $num_status_LKP = $num_status;
      $Tmp_pos = strpos($num_status, "##@@");
      if ($Tmp_pos !== false)
      {
          $num_status = substr($num_status, 0, $Tmp_pos);
          $num_status_LKP = $num_status;
      }
      $statusprojeto_LKP = $statusprojeto;
      $Tmp_pos = strpos($statusprojeto, "##@@");
      if ($Tmp_pos !== false)
      {
          $statusprojeto = substr($statusprojeto, 0, $Tmp_pos);
          $statusprojeto_LKP = $statusprojeto;
      }
      $tipo_op_LKP = $tipo_op;
      $Tmp_pos = strpos($tipo_op, "##@@");
      if ($Tmp_pos !== false)
      {
          $tipo_op = substr($tipo_op, 0, $Tmp_pos);
          $tipo_op_LKP = $tipo_op;
      }
      $id_op_LKP = $id_op;
      $Tmp_pos = strpos($id_op, "##@@");
      if ($Tmp_pos !== false)
      {
          $id_op = substr($id_op, 0, $Tmp_pos);
          $id_op_LKP = $id_op;
      }
      $datacriacao_day   = $datacriacao_dia; 
      $datacriacao_month = $datacriacao_mes; 
      $datacriacao_year  = $datacriacao_ano; 
      $datacriacao_diaSv = $datacriacao_dia; 
      $datacriacao_mesSv = $datacriacao_mes; 
      $datacriacao_anoSv = $datacriacao_ano; 
      $datacriacao_horSv = $datacriacao_hor; 
      $datacriacao_minSv = $datacriacao_min; 
      $datacriacao_segSv = $datacriacao_seg; 
      $datacriacao  = str_repeat(0, (4 - strlen($datacriacao_ano))) . $datacriacao_ano . "-"; 
      $datacriacao .= str_repeat(0, (2 - strlen($datacriacao_mes))) . $datacriacao_mes . "-"; 
      $datacriacao .= str_repeat(0, (2 - strlen($datacriacao_dia))) . $datacriacao_dia; 
      $datacriacao .= " "; 
      $datacriacao .= str_repeat(0, (2 - strlen($datacriacao_hor))) . $datacriacao_hor . ":"; 
      $datacriacao .= str_repeat(0, (2 - strlen($datacriacao_min))) . $datacriacao_min . ":"; 
      $datacriacao .= str_repeat(0, (2 - strlen($datacriacao_seg))) . $datacriacao_seg; 
      $_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'on';
   $id_origem  = $selectorigem ;
$_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'off'; 
      if ($referente_LKP == $referente)
      {
          $referente = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['referente'];
      }
      if ($num_status_LKP == $num_status)
      {
          $num_status = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['num_status'];
      }
      if ($statusprojeto_LKP == $statusprojeto)
      {
          $statusprojeto = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['statusprojeto'];
      }
      if ($tipo_op_LKP == $tipo_op)
      {
          $tipo_op = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['tipo_op'];
      }
      if ($id_op_LKP == $id_op)
      {
          $id_op = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['id_op'];
      }
      if ($datacriacao_day != $datacriacao_diaSv)
      {
          $datacriacao_dia = $datacriacao_day; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_dia'] = $datacriacao_dia; 
      }
      if ($datacriacao_month != $datacriacao_mesSv)
      {
          $datacriacao_mes = $datacriacao_month; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_mes'] = $datacriacao_mes; 
      }
      if ($datacriacao_year != $datacriacao_anoSv)
      {
          $datacriacao_ano = $datacriacao_year; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_ano'] = $datacriacao_ano; 
      }
      $datacriacao = str_replace("0000", "", $datacriacao);
      $datacriacao = str_replace("-00", "-", $datacriacao);
      $datacriacaoTT = explode(" ", $datacriacao);
      $datacriacaoXX = explode("-", $datacriacaoTT[0]);
      if (isset($datacriacaoXX[2]) && $datacriacaoXX[2] != $datacriacao_diaSv)
      {
          $datacriacao_dia = $datacriacaoXX[2]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_dia'] = $datacriacaoXX[2]; 
      }
      if (isset($datacriacaoXX[1]) && $datacriacaoXX[1] != $datacriacao_mesSv)
      {
          $datacriacao_mes = $datacriacaoXX[1]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_mes'] = $datacriacaoXX[1]; 
      }
      if (isset($datacriacaoXX[0]) && $datacriacaoXX[0] != $datacriacao_anoSv)
      {
          $datacriacao_ano = $datacriacaoXX[0]; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_ano'] = $datacriacaoXX[0]; 
      }
      if (isset($datacriacaoTT[1]))
      {
          $datacriacaoXX = explode(":", $datacriacaoTT[1]);
          if (isset($datacriacaoXX[2]) && $datacriacaoXX[2] != $datacriacao_segSv && ($datacriacao_segSv != "" || $datacriacaoXX[2] != '00'))
          {
              $datacriacao_seg = $datacriacaoXX[2]; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_seg'] = $datacriacaoXX[2]; 
          }
          if (isset($datacriacaoXX[1]) && $datacriacaoXX[1] != $datacriacao_minSv && ($datacriacao_minSv != "" || $datacriacaoXX[1] != '00'))
          {
              $datacriacao_min = $datacriacaoXX[1]; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_min'] = $datacriacaoXX[1]; 
          }
          if (isset($datacriacaoXX[0]) && $datacriacaoXX[0] != $datacriacao_horSv && ($datacriacao_horSv != "" || $datacriacaoXX[0] != '00'))
          {
              $datacriacao_hor = $datacriacaoXX[0]; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['']['campos_busca']['datacriacao_hor'] = $datacriacaoXX[0]; 
          }
      }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
      $Conteudo = $header;
      $this->cmp_formatado['header'] = $Conteudo;
      $id_look = substr($this->Db->qstr($id), 1, -1); 
      $nmgp_def_dados = array(); 
   if (is_numeric($id))
   { 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
      {
          $nm_comando = "select distinct ID from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where ID = $id_look"; 
      }
      else
      {
          $nm_comando = "select distinct ID from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where ID = $id_look"; 
      }
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            nmgp_Form_Num_Val($rs->fields[0], $_SESSION['hticnsdata']['reg_conf']['grup_num'], $_SESSION['hticnsdata']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['hticnsdata']['reg_conf']['neg_num'] , $_SESSION['hticnsdata']['reg_conf']['simb_neg'], $_SESSION['hticnsdata']['reg_conf']['num_group_digit']) ; 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 
   } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['id'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['id'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['id'] = $id;
      }
      $Conteudo = $referente;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['referente'] = $Conteudo;
      $Conteudo = $selectorigem;
      $this->cmp_formatado['selectorigem'] = $Conteudo;
      $Conteudo = $num_status;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['num_status'] = $Conteudo;
      $Conteudo = $statusprojeto;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['statusprojeto'] = $Conteudo;
      $Conteudo = $tipo_op;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['tipo_op'] = $Conteudo;
      $Conteudo = $id_op;
      if (strpos($Conteudo, "##@@") !== false)
      {
          $Conteudo = substr($Conteudo, strpos($Conteudo, "##@@") + 4);
      }
      $this->cmp_formatado['id_op'] = $Conteudo;
      $condominio_look = substr($this->Db->qstr($condominio), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Condominio from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where Condominio = '$condominio_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['condominio'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['condominio'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['condominio'] = $condominio;
      }
      $cliente_look = substr($this->Db->qstr($cliente), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct Cliente from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where Cliente = '$cliente_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cliente'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['cliente'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['cliente'] = $cliente;
      }
      $end_obra_cidade_look = substr($this->Db->qstr($end_obra_cidade), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct End_Obra_Cidade from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where End_Obra_Cidade = '$end_obra_cidade_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['end_obra_cidade'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['end_obra_cidade'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['end_obra_cidade'] = $end_obra_cidade;
      }
      $id_origem_look = substr($this->Db->qstr($id_origem), 1, -1); 
      $nmgp_def_dados = array(); 
      $nm_comando = "select distinct ID_Origem from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp where ID_Origem = '$id_origem_look'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      { 
         while (!$rs->EOF) 
         { 
            $cmp1 = NM_charset_to_utf8(trim($rs->fields[0]));
            $nmgp_def_dados[] = array($cmp1 => $cmp1); 
            $rs->MoveNext() ; 
         } 
         $rs->Close() ; 
      } 
      else  
      {  
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit; 
      } 

      if (!empty($nmgp_def_dados) && isset($cmp2) && !empty($cmp2))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp2 = NM_conv_charset($cmp2, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['id_origem'] = $cmp2;
      }
      elseif (!empty($nmgp_def_dados) && isset($cmp1) && !empty($cmp1))
      {
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
             $cmp1 = NM_conv_charset($cmp1, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->cmp_formatado['id_origem'] = $cmp1;
      }
      else
      {
          $this->cmp_formatado['id_origem'] = $id_origem;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca_ant']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'];
      }

      //----- $id
      $this->Date_part = false;
      if (isset($id) || $id_cond == "nu" || $id_cond == "nn" || $id_cond == "ep" || $id_cond == "ne")
      {
         $this->monta_condicao("ID", $id_cond, $id, "", "id");
      }

      //----- $referente
      $this->Date_part = false;
      if (isset($referente))
      {
         $this->monta_condicao("Referente", $referente_cond, $referente, "", "referente");
      }

      //----- $datacriacao
      $this->Date_part = false;
      if ($datacriacao_cond != "TP")
      {
          $datacriacao_cond = strtoupper($datacriacao_cond);
          $Dtxt = "";
          $val  = array();
          $Dtxt .= $datacriacao_ano;
          $Dtxt .= $datacriacao_mes;
          $Dtxt .= $datacriacao_dia;
          $Dtxt .= $datacriacao_hor;
          $Dtxt .= $datacriacao_min;
          $Dtxt .= $datacriacao_seg;
          $val[0]['ano'] = $datacriacao_ano;
          $val[0]['mes'] = $datacriacao_mes;
          $val[0]['dia'] = $datacriacao_dia;
          $val[0]['hor'] = $datacriacao_hor;
          $val[0]['min'] = $datacriacao_min;
          $val[0]['seg'] = $datacriacao_seg;
          if ($datacriacao_cond == "BW")
          {
              $val[1]['ano'] = $datacriacao_input_2_ano;
              $val[1]['mes'] = $datacriacao_input_2_mes;
              $val[1]['dia'] = $datacriacao_input_2_dia;
              $val[1]['hor'] = $datacriacao_input_2_hor;
              $val[1]['min'] = $datacriacao_input_2_min;
              $val[1]['seg'] = $datacriacao_input_2_seg;
          }
          $this->Operador_date_part = "";
          $this->Lang_date_part     = "";
          $this->nm_prep_date($val, "DH", "TIMESTAMP", $datacriacao_cond, "", "datahora");
          $datacriacao = $val[0];
          $this->cmp_formatado['datacriacao'] = $val[0];
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao'] = $val[0];
          $this->nm_data->SetaData($this->cmp_formatado['datacriacao'], "YYYY-MM-DD HH:II:SS");
          $this->cmp_formatado['datacriacao'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          if ($datacriacao_cond == "BW")
          {
              $datacriacao_input_2     = $val[1];
              $this->cmp_formatado['datacriacao_input_2'] = $val[1];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']['datacriacao_input_2'] = $val[1];
              $this->nm_data->SetaData($this->cmp_formatado['datacriacao_input_2'], "YYYY-MM-DD HH:II:SS");
              $this->cmp_formatado['datacriacao_input_2'] = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "dmY"));
          }
          if (!empty($Dtxt) || $datacriacao_cond == "NU" || $datacriacao_cond == "NN"|| $datacriacao_cond == "EP"|| $datacriacao_cond == "NE")
          {
              $this->monta_condicao("DataCriacao", $datacriacao_cond, $datacriacao, $datacriacao_input_2, 'datacriacao', 'TIMESTAMP');
          }
      }

      //----- $num_status
      $this->Date_part = false;
      if (isset($num_status))
      {
         $this->monta_condicao("Num_Status", $num_status_cond, $num_status, "", "num_status");
      }

      //----- $statusprojeto
      $this->Date_part = false;
      if (isset($statusprojeto))
      {
         $this->monta_condicao("statusProjeto", $statusprojeto_cond, $statusprojeto, "", "statusprojeto");
      }

      //----- $tipo_op
      $this->Date_part = false;
      if (isset($tipo_op))
      {
         $this->monta_condicao("Tipo_OP", $tipo_op_cond, $tipo_op, "", "tipo_op");
      }

      //----- $id_op
      $this->Date_part = false;
      if (isset($id_op))
      {
         $this->monta_condicao("ID_OP", $id_op_cond, $id_op, "", "id_op");
      }

      //----- $condominio
      $this->Date_part = false;
      if (isset($condominio) || $condominio_cond == "nu" || $condominio_cond == "nn" || $condominio_cond == "ep" || $condominio_cond == "ne")
      {
         $this->monta_condicao("Condominio", $condominio_cond, $condominio, "", "condominio");
      }

      //----- $cliente
      $this->Date_part = false;
      if (isset($cliente) || $cliente_cond == "nu" || $cliente_cond == "nn" || $cliente_cond == "ep" || $cliente_cond == "ne")
      {
         $this->monta_condicao("Cliente", $cliente_cond, $cliente, "", "cliente");
      }

      //----- $end_obra_cidade
      $this->Date_part = false;
      if (isset($end_obra_cidade) || $end_obra_cidade_cond == "nu" || $end_obra_cidade_cond == "nn" || $end_obra_cidade_cond == "ep" || $end_obra_cidade_cond == "ne")
      {
         $this->monta_condicao("End_Obra_Cidade", $end_obra_cidade_cond, $end_obra_cidade, "", "end_obra_cidade");
      }

      //----- $id_origem
      $this->Date_part = false;
      if (isset($id_origem) || $id_origem_cond == "nu" || $id_origem_cond == "nn" || $id_origem_cond == "ep" || $id_origem_cond == "ne")
      {
         $this->monta_condicao("ID_Origem", $id_origem_cond, $id_origem, "", "id_origem");
      }
   }

   /**
    * @access  public
    */
   function finaliza_resultado()
   {
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq_fast'] = "";
      if ("" == $this->comando_filtro)
      {
          $this->comando = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_orig'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca']) && $_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'] = NM_conv_charset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'], "UTF-8", $_SESSION['hticnsdata']['charset']);
      }

      if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($this->comando))
      {
          $this->comando     = NM_conv_charset($this->comando, $_SESSION['hticnsdata']['charset'], "UTF-8");
          $this->comando_sum = NM_conv_charset($this->comando_sum, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq_lookup']  = $this->comando_sum . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq']         = $this->comando . $this->comando_fim;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['opcao']              = "pesq";
      if ("" == $this->comando_filtro)
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq_filtro'] = "";
      }
      else
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq_filtro'] = " (" . $this->comando_filtro . ")";
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq_ant'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca_ant'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'])
      {
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['cond_pesq'] .= $this->NM_operador;
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['contr_array_resumo'] = "NAO";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['contr_total_geral']  = "NAO";
         unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['tot_geral']);
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq_ant'] = $this->comando . $this->comando_fim;
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['fast_search']);

      $this->retorna_pesq();
   }
   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $alt_modal=0, $larg_modal=0, $opc="")
   {
      if (is_array($nm_apl_parms))
      {
          $tmp_parms = "";
          foreach ($nm_apl_parms as $par => $val)
          {
              $par = trim($par);
              $val = trim($val);
              $tmp_parms .= str_replace(".", "_", $par) . "?#?";
              if (substr($val, 0, 1) == "$")
              {
                  $tmp_parms .= $$val;
              }
              elseif (substr($val, 0, 1) == "{")
              {
                  $val        = substr($val, 1, -1);
                  $tmp_parms .= $this->$val;
              }
              elseif (substr($val, 0, 1) == "[")
              {
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS'][substr($val, 1, -1)];
              }
              else
              {
                  $tmp_parms .= $val;
              }
              $tmp_parms .= "?@?";
          }
          $nm_apl_parms = $tmp_parms;
      }
      $target = (empty($nm_target)) ? "_self" : $nm_target;
      if (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../")
      {
          echo "<SCRIPT language=\"javascript\">";
          if (strtolower($target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
              echo "</SCRIPT>";
              return;
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
              echo "</SCRIPT>";
              exit;
          }
      }
      $dir = explode("/", $nm_apl_dest);
      if (count($dir) == 1)
      {
          $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
          $nm_apl_dest = $this->Ini->path_link . $nm_apl_dest . "/" . $nm_apl_dest . ".php";
      }
      if ($nm_target == "modal")
      {
          if (!empty($nm_apl_parms))
          {
              $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
              $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
              $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
          }
          $par_modal = "?hti_cnsdata_init=" . NM_encode_input($this->Ini->sc_page) . "&hti_cnsdata_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
           if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['embutida_form_full']) || (isset($this->grid_emb_form_full) && $this->grid_emb_form_full))
           {
              $this->redir_modal = "$(function() { parent.tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
           else
           {
              $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['iframe_print'] )
      {
          $target = "_parent";
      }
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <HTML>
      <HEAD>
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
      </HEAD>
      <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
      <BODY>
   <?php
      }
   ?>
   <form name="Fredir" method="post" 
                     target="_self"> 
     <input type="hidden" name="nmgp_parms" value="<?php echo NM_encode_input($nm_apl_parms) ?>"/>
<?php
   if ($target == "_blank")
   {
?>
       <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
     <input type="hidden" name="nmgp_url_saida" value="<?php echo NM_encode_input($nm_apl_retorno) ?>">
     <input type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page) ?>"/> 
     <input type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>"/>
<?php
   }
?>
   </form> 
      <SCRIPT type="text/javascript">
          document.Fredir.target = "<?php echo $target ?>"; 
          document.Fredir.action = "<?php echo $nm_apl_dest ?>";
          document.Fredir.submit();
      </SCRIPT>
   <?php
      if (!isset($this->SC_redir_btn) || !$this->SC_redir_btn)
      {
   ?>
      </BODY>
      </HTML>
   <?php
      }
      if ($target != "_blank")
      {
          exit;
      }
   }
   
   function css_obj_select_ajax($Obj)
   {
      switch ($Obj)
      {
         case "statusprojeto" : return ('class="scFilterObjectEven"'); break;
         case "id_op" : return ('class="scFilterObjectOdd"'); break;
         default       : return ("");
      }
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
function getOrigemAction()
{
$_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'on';
if (!isset($_SESSION['ID_OPE'])) {$_SESSION['ID_OPE'] = "";}
if (!isset($this->sc_temp_ID_OPE)) {$this->sc_temp_ID_OPE = (isset($_SESSION['ID_OPE'])) ? $_SESSION['ID_OPE'] : "";}
if (!isset($_SESSION['Num_TipoUsuario'])) {$_SESSION['Num_TipoUsuario'] = "";}
if (!isset($this->sc_temp_Num_TipoUsuario)) {$this->sc_temp_Num_TipoUsuario = (isset($_SESSION['Num_TipoUsuario'])) ? $_SESSION['Num_TipoUsuario'] : "";}
   
sc_include_library("sys", "functions", "functions.php");
sc_include_library("sys", "models", "Pas.php");
$_Pas = new PAS($this);

$response = responseJSON();

$Search = $_GET["search"] ?? '';
$Referencia = $_GET["referencia"] ?? null;
$Referencia = $Referencia ? "'".$Referencia."'" : "'ST','AP'";

$resultado = $_Pas->query("SELECT
    ID_Origem,
    (CASE
        WHEN tb_pas.Referente = 'AP' THEN (SELECT tb_projetos.ProtocoloHex FROM tb_projetos WHERE tb_projetos.ID_projeto = tb_pas.ID_Origem) 
        WHEN tb_pas.Referente = 'ST' THEN ID_Origem 
    END) as Origem
FROM
    tb_pas 
WHERE Num_Ativo != 'R' AND (
  ('$this->sc_temp_Num_TipoUsuario' = 'O' AND ID_OP = '$this->sc_temp_ID_OPE' AND Tipo_OP = 'O') OR
  ('$this->sc_temp_Num_TipoUsuario' = 'P' AND ID_OP = '$this->sc_temp_ID_OPE' AND Tipo_OP = 'P') OR 
  ('$this->sc_temp_Num_TipoUsuario' = 'E' AND false) OR 
  ('$this->sc_temp_Num_TipoUsuario' IN ('G', 'GT')) 
) AND tb_pas.Referente IN ($Referencia)
HAVING Origem LIKE '%$Search%'");

$response->data = $resultado;
$response->DbError = $_Pas->DbError;

sendResponse($response);


if (isset($this->sc_temp_Num_TipoUsuario)) {$_SESSION['Num_TipoUsuario'] = $this->sc_temp_Num_TipoUsuario;}
if (isset($this->sc_temp_ID_OPE)) {$_SESSION['ID_OPE'] = $this->sc_temp_ID_OPE;}
$_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'off';
}
}

?>
