<?php
class grid_ProjetoItens_grid
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Tot;
   var $Lin_impressas;
   var $Lin_final;
   var $Rows_span;
   var $NM_colspan;
   var $rs_grid;
   var $nm_grid_ini;
   var $nm_grid_sem_reg;
   var $nm_prim_linha;
   var $Rec_ini;
   var $Rec_fim;
   var $nmgp_reg_start;
   var $nmgp_reg_inicial;
   var $nmgp_reg_final;
   var $SC_seq_register;
   var $SC_seq_page;
   var $nm_location;
   var $nm_data;
   var $nm_cod_barra;
   var $sc_proc_grid; 
   var $NM_raiz_img; 
   var $Ind_lig_mult; 
   var $NM_opcao; 
   var $NM_flag_antigo; 
   var $nm_campos_cab = array();
   var $NM_cmp_hidden = array();
   var $nmgp_botoes = array();
   var $Cmps_ord_def = array();
   var $nmgp_label_quebras = array();
   var $nmgp_prim_pag_pdf;
   var $Campos_Mens_erro;
   var $Print_All;
   var $NM_field_over;
   var $NM_field_click;
   var $NM_cont_body; 
   var $NM_emb_tree_no; 
   var $progress_fp;
   var $progress_tot;
   var $progress_now;
   var $progress_lim_tot;
   var $progress_lim_now;
   var $progress_lim_qtd;
   var $progress_grid;
   var $progress_pdf;
   var $progress_res;
   var $progress_graf;
   var $count_ger;
   var $observacoes;
   var $num_status;
   var $editar;
   var $tb_itens_id_item;
   var $nom_item;
   var $nom_descricao;
//--- 
 function monta_grid($linhas = 0)
 {
   global $nm_saida;

   clearstatcache();
   $this->NM_cor_embutida();
   if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['field_display']))
   {
       foreach ($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['field_display'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['usr_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['php_cmp_sel']))
   {
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
       {
           $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_init'])
   { 
        return; 
   } 
   $this->inicializa();
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['charts_html'] = '';
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       $this->Lin_impressas = 0;
       $this->Lin_final     = FALSE;
       $this->grid($linhas);
       $this->nm_fim_grid();
   } 
   else 
   { 
       $this->cabecalho();
       $nm_saida->saida(" <TR>\r\n");
       $nm_saida->saida("  <TD id='sc_grid_content' style='padding: 0px;' colspan=1>\r\n");
       $nm_saida->saida("    <table width='100%' cellspacing=0 cellpadding=0>\r\n");
       $nmgrp_apl_opcao= (isset($_SESSION['sc_session']['hticnsdata']['embutida_form_pdf']['grid_ProjetoItens'])) ? "pdf" : $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'];
       if ($nmgrp_apl_opcao != "pdf")
       { 
           $this->nmgp_barra_top();
           $this->nmgp_embbed_placeholder_top();
       } 
       $this->grid();
       $nm_saida->saida("   </table>\r\n");
       $nm_saida->saida("  </TD>\r\n");
       $nm_saida->saida(" </TR>\r\n");
       $flag_apaga_pdf_log = TRUE;
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf")
       { 
           $flag_apaga_pdf_log = FALSE;
       } 
       $this->nm_fim_grid($flag_apaga_pdf_log);
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf")
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "igual";
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print'] == "print")
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_ant'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print'] = "";
   }
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'];
 }
 function resume($linhas = 0)
 {
    $this->Lin_impressas = 0;
    $this->Lin_final     = FALSE;
    $this->grid($linhas);
 }
//--- 
 function inicializa()
 {
   global $nm_saida, $NM_run_iframe,
   $rec, $nmgp_chave, $nmgp_opcao, $nmgp_ordem, $nmgp_chave_det,
   $nmgp_quant_linhas, $nmgp_quant_colunas, $nmgp_url_saida, $nmgp_parms;
//
   $this->Ind_lig_mult = 0;
   $this->nm_data    = new nm_data("pt_br");
   $this->Css_Cmp = array();
   $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_ProjetoItens/grid_ProjetoItens_grid_" .strtolower($_SESSION['hticnsdata']['reg_conf']['css_dir']) . ".css");
   foreach ($NM_css as $cada_css)
   {
       $Pos1 = strpos($cada_css, "{");
       $Pos2 = strpos($cada_css, "}");
       $Tag  = trim(substr($cada_css, 1, $Pos1 - 1));
       $Css  = substr($cada_css, $Pos1 + 1, $Pos2 - $Pos1 - 1);
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word'])
       { 
           $this->Css_Cmp[$Tag] = $Css;
       }
       else
       { 
           $this->Css_Cmp[$Tag] = "";
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['Lig_Md5']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['Lig_Md5'] = array();
       }
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != 'print')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['Lig_Md5'] = array();
   }
   $this->force_toolbar = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['force_toolbar']))
   { 
       $this->force_toolbar = true;
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['force_toolbar']);
   } 
   $this->width_tabula_quebra  = "0px";
   $this->width_tabula_display = "none";
   if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['lig_edit']) && $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['mostra_edit'] = $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['lig_edit'];
   }
   $this->grid_emb_form      = false;
   $this->grid_emb_form_full = false;
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_form']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_form'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_form_full'])
       {
          $this->grid_emb_form_full = true;
       }
       else
       {
           $this->grid_emb_form = true;
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['mostra_edit'] = "N";
       }
   }
   if ($this->Ini->SC_Link_View)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['mostra_edit'] = "N";
   }
   $this->NM_cont_body   = 0; 
   $this->NM_emb_tree_no = false; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] = array();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ind_tree'] = 0;
   }
   elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['emb_tree_no']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['emb_tree_no'])
   { 
       $this->NM_emb_tree_no = true; 
   }
   $this->aba_iframe = false;
   $this->Print_All = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_all'];
   if ($this->Print_All)
   {
       $this->Ini->nm_limite_lin = $this->Ini->nm_limite_lin_prt; 
   }
   if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
   {
       foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
       {
           if (in_array("grid_ProjetoItens", $apls_aba))
           {
               $this->aba_iframe = true;
               break;
           }
       }
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
   {
       $this->aba_iframe = true;
   }
   $this->nmgp_botoes['exit'] = "off";
   $this->nmgp_botoes['first'] = "off";
   $this->nmgp_botoes['back'] = "off";
   $this->nmgp_botoes['forward'] = "off";
   $this->nmgp_botoes['last'] = "off";
   $this->nmgp_botoes['pdf'] = "on";
   $this->nmgp_botoes['voltar'] = "on";
   $this->nmgp_botoes['enviarProjeto'] = "on";
   $this->nmgp_botoes['confirmeEnviarProjeto'] = "on";
   $this->nmgp_botoes['iniciarAnalise'] = "on";
   $this->nmgp_botoes['confirmeIniciarAnalise'] = "on";
   $this->nmgp_botoes['confirmePauseAnalise'] = "on";
   $this->nmgp_botoes['pauseAnalise'] = "on";
   $this->nmgp_botoes['confirmeFimAnalise'] = "on";
   $this->nmgp_botoes['fimAnalise'] = "on";
   $this->nmgp_botoes['tempoDecorrido'] = "on";
   $this->nmgp_botoes['cabecalhoDoc'] = "on";
   $this->nmgp_botoes['downloadZip'] = "on";
   if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['btn_display']))
   {
       foreach ($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
       {
           $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
       }
   }
   $this->sc_proc_grid = false; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word'])
   { 
       $this->NM_raiz_img = $this->Ini->root; 
   } 
   else 
   { 
       $this->NM_raiz_img = ""; 
   } 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   $this->nm_where_dinamico = "";
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_ant'];  
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campos_busca']))
   { 
       $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campos_busca'];
       if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
       {
           $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['hticnsdata']['charset'], "UTF-8");
       }
   } 
   $this->nm_field_dinamico = array();
   $this->nm_order_dinamico = array();
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "muda_qt_linhas")
   { 
       unset($rec);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "muda_rec_linhas")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "muda_qt_linhas";
   } 
   $this->New_label['nom_item'] = "" . $this->Ini->Nm_lang['lang_label_name'] . "";
   $this->New_label['nom_descricao'] = "" . $this->Ini->Nm_lang['lang_label_description'] . "";
   $this->New_label['observacoes'] = "" . $this->Ini->Nm_lang['lang_label_observation'] . "";
   $this->New_label['editar'] = "" . $this->Ini->Nm_lang['lang_label_edit'] . "";
   $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
              $this->router();

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession(true);

$statusProjeto =$this->getStatusProjeto();
$isOwner =$this->getOwner();
$ID_Usuario = $s->get("ID_Usuario");
$profile = $s->get("profile");
$Num_TipoUsuario = $s->get("Num_TipoUsuario");
$Num_TipoUsuario = $Num_TipoUsuario == "GT" ? "G" : $Num_TipoUsuario;

$this->nmgp_botoes["confirmeEnviarProjeto"] = "off";;
$this->nmgp_botoes["confirmeIniciarAnalise"] = "off";;
$this->nmgp_botoes["confirmePauseAnalise"] = "off";;
$this->nmgp_botoes["confirmeFimAnalise"] = "off";;
$this->nmgp_botoes["tempoDecorrido"] = "off";;
$this->nmgp_botoes["cabecalhoDoc"] = "off";;

if ($Num_TipoUsuario == "E") {
	echo "<style>
		#tit_grid_ProjetoItens__SCCS__1 > td.scGridLabelFont.css_editar_label,
		[id^=SC_ancor] > td.css_editar_grid_line {
			display: none;
		}
	</style>";
}

if ($isOwner["isOwner"]) {
	$this->nmgp_botoes["cabecalhoDoc"] = "on";;
}

if ($statusProjeto) {	
	if(($statusProjeto["Code"] == "aguardando_envio" || $statusProjeto["Code"] == "reprovado_analise_itens") && $isOwner["isOwner"] && ($profile["PROJETO"]["EDITAR"]["v"] ?? "N") == "S") {
		$this->nmgp_botoes["confirmeEnviarProjeto"] = "on";;
	}
	
	if (isset($profile["PROJETO"])) {
		if (isset($profile["PROJETO"]["SUBMITSTATUS"]["v"]) && $profile["PROJETO"]["SUBMITSTATUS"]["v"] == "S") {
			if(in_array($statusProjeto["Code"], ["aguardando_analise_itens", "interrupcao_analise_itens"]) && $Num_TipoUsuario == "G") {
				$this->nmgp_botoes["confirmeIniciarAnalise"] = "on";;
			}
			if($statusProjeto["Code"] == "realizando_analise_itens" && $Num_TipoUsuario == "G") {
				$this->nmgp_botoes["confirmePauseAnalise"] = "on";;
				$this->nmgp_botoes["confirmeFimAnalise"] = "on";;
				$this->nmgp_botoes["tempoDecorrido"] = "on";;
				
				 
      $nm_select = "SELECT Data as DT, now() as DTnow, Num_Analise FROM tb_projetoanalisestatus WHERE ID_projeto = '$this->sc_temp_id_Projeto' AND CodeStatus IN ('realizando_analise_itens', 'interrupcao_analise_itens') ORDER BY Data ASC"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rstempodecorrido = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rstempodecorrido = false;
          $this->rstempodecorrido_erro = $this->Db->ErrorMsg();
      } 
;
				_select($this->rstempodecorrido );
				$this->rstempodecorrido  = isset($this->rstempodecorrido ) ? $this->rstempodecorrido  : [];
				
				if (count($this->rstempodecorrido ) > 0) {
					$i = $f = 0;
					$diff = array();
					foreach($this->rstempodecorrido  as $idx => $row) {
						if (!isset($diff[$row["Num_Analise"]])) $diff[$row["Num_Analise"]] = 0;
						if ($i == 0) {
							$i = strtotime($row["DT"]);
						} elseif ($f == 0) {
							$f = strtotime($row["DT"]);
						}
						if (count($this->rstempodecorrido ) == $idx+1 || 
							(isset($this->rstempodecorrido [$idx+1]) && $this->rstempodecorrido [$idx+1]["Num_Analise"] != $row["Num_Analise"])
							) {
							$f = strtotime(date("Y-m-d H:i:s"));
						}
						if ($i != 0 && $f != 0) {
							$diff[$row["Num_Analise"]] += $f - $i;
							$i = $f = 0;
						}
					}

					$diff = end($diff);
					
					$d = intval($diff/(3600*24));
					$H = gmdate("H", $diff);
					$i = gmdate("i", $diff);
					$s = gmdate("s", $diff);

					$tempoDecorrido = ["str" => ($d * 24)+$H.":$i:$s", "d" => $d, "H" => $H, "i" => $i, "s" => $s, "diff" => intval($diff)];
					
					echo "<script>
						tempoDecorrido = JSON.parse('".json_encode($tempoDecorrido)."');
						window.setInterval(function(){
							tempoDecorrido.diff++;
							var s = Math.floor(tempoDecorrido.diff % 60);
							var ss = Math.floor(tempoDecorrido.diff / 60);
							var i = Math.floor(ss % 60);
							var h = Math.floor(ss / 60);
							$('#tempo-decorrido').html('".$this->Ini->Nm_lang['lang_label_elapsedTime']."'+' '+h+'h '+i+'m '+s+'s');
						},1000);
					</script>";
				}
			}
		}
	}
}
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 

   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['maximized']) {
       $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['dashboard_app'];
       if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['grid_ProjetoItens'])) {
           $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['grid_ProjetoItens'];

           $this->nmgp_botoes['first']     = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['back']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['last']      = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['forward']   = $tmpDashboardButtons['grid_navigate']  ? 'on' : 'off';
           $this->nmgp_botoes['summary']   = $tmpDashboardButtons['grid_summary']   ? 'on' : 'off';
           $this->nmgp_botoes['qsearch']   = $tmpDashboardButtons['grid_qsearch']   ? 'on' : 'off';
           $this->nmgp_botoes['dynsearch'] = $tmpDashboardButtons['grid_dynsearch'] ? 'on' : 'off';
           $this->nmgp_botoes['filter']    = $tmpDashboardButtons['grid_filter']    ? 'on' : 'off';
           $this->nmgp_botoes['sel_col']   = $tmpDashboardButtons['grid_sel_col']   ? 'on' : 'off';
           $this->nmgp_botoes['sort_col']  = $tmpDashboardButtons['grid_sort_col']  ? 'on' : 'off';
           $this->nmgp_botoes['goto']      = $tmpDashboardButtons['grid_goto']      ? 'on' : 'off';
           $this->nmgp_botoes['qtline']    = $tmpDashboardButtons['grid_lineqty']   ? 'on' : 'off';
           $this->nmgp_botoes['navpage']   = $tmpDashboardButtons['grid_navpage']   ? 'on' : 'off';
           $this->nmgp_botoes['pdf']       = $tmpDashboardButtons['grid_pdf']       ? 'on' : 'off';
           $this->nmgp_botoes['xls']       = $tmpDashboardButtons['grid_xls']       ? 'on' : 'off';
           $this->nmgp_botoes['xml']       = $tmpDashboardButtons['grid_xml']       ? 'on' : 'off';
           $this->nmgp_botoes['csv']       = $tmpDashboardButtons['grid_csv']       ? 'on' : 'off';
           $this->nmgp_botoes['rtf']       = $tmpDashboardButtons['grid_rtf']       ? 'on' : 'off';
           $this->nmgp_botoes['word']      = $tmpDashboardButtons['grid_word']      ? 'on' : 'off';
           $this->nmgp_botoes['print']     = $tmpDashboardButtons['grid_print']     ? 'on' : 'off';
       }
   }

   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   {
       $nmgp_ordem = ""; 
       $rec = "ini"; 
   } 
//
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       include_once($this->Ini->path_embutida . "grid_ProjetoItens/grid_ProjetoItens_total.class.php"); 
   } 
   else 
   { 
       include_once($this->Ini->path_aplicacao . "grid_ProjetoItens_total.class.php"); 
   } 
   $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
   $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
   $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_pdf'] != "pdf")  
       { 
           $_SESSION['hticnsdata']['contr_link_emb'] = $this->nm_location;
       } 
       else 
       { 
           $_SESSION['hticnsdata']['contr_link_emb'] = "pdf";
       } 
   } 
   else 
   { 
       $this->nm_location = $_SESSION['hticnsdata']['contr_link_emb'];
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_pdf'] = $_SESSION['hticnsdata']['contr_link_emb'];
   } 
   $this->Tot         = new grid_ProjetoItens_total($this->Ini->sc_page);
   $this->Tot->Db     = $this->Db;
   $this->Tot->Erro   = $this->Erro;
   $this->Tot->Ini    = $this->Ini;
   $this->Tot->Lookup = $this->Lookup;
   if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_lin_grid']))
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_lin_grid'] = 10;
   }   
   if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['rows']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_lin_grid'] = $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['rows'];  
       unset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['rows']);
   }
   if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['cols']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_col_grid'] = $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['cols'];  
       unset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['cols']);
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['rows']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_lin_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['rows'];  
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['cols']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_col_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['cols'];  
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "muda_qt_linhas") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']  = "igual" ;  
       if (!empty($nmgp_quant_linhas) && !is_array($nmgp_quant_linhas)) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_lin_grid'] = $nmgp_quant_linhas ;  
       } 
   }   
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_lin_grid']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] == "sc_free_total") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_select']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_select'] = array(); 
       } 
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] == "sc_free_total") 
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_quebra']))  
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_quebra'] = array(); 
       } 
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'] = "" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_ant']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc'] = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_cmp']  = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_label'] = "";  
   }   
   if (!empty($nmgp_ordem))  
   { 
       $nmgp_ordem = str_replace('\"', '"', $nmgp_ordem); 
       if (!isset($this->Cmps_ord_def[$nmgp_ordem])) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "igual" ;  
       }
       else
       { 
           $Ordem_tem_quebra = false;
           foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_quebra'] as $campo => $resto) 
           {
               foreach($resto as $sqldef => $ordem) 
               {
                   if ($sqldef == $nmgp_ordem) 
                   { 
                       $Ordem_tem_quebra = true;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "inicio" ;  
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'] = ""; 
                       $ordem = ($ordem == "asc") ? "desc" : "asc";
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_quebra'][$campo][$nmgp_ordem] = $ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_cmp'] = $nmgp_ordem;
                       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_label'] = trim($ordem);
                   }   
               }   
           }   
           if (!$Ordem_tem_quebra)
           {
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'] = $nmgp_ordem  ; 
           }
       }
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "ordem")  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "inicio" ;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_ant'] == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'])  
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc'] != " desc")  
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc'] = " desc" ; 
           } 
           else   
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc'] = " asc" ;  
           } 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc'] = $this->Cmps_ord_def[$nmgp_ordem];  
       } 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_label'] = trim($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc']);  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_ant'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_cmp'] = $nmgp_ordem;  
   }  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio']))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = 0 ;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']  = 0 ;  
   }   
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_edit'])  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_edit'] = false;  
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "inicio") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "edit" ; 
       } 
   }   
   if (!empty($nmgp_parms) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf")   
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "igual";
       $rec = "ini";
   }
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['prim_cons'] || !empty($nmgp_parms))  
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['prim_cons'] = false;  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'] = "";  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq']        = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_ant']    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];  
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq']         = ""; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'] = "";
   }   
   if  (!empty($this->nm_where_dinamico)) 
   {   
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'] .= $this->nm_where_dinamico;
   }   
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
   $this->sc_where_atual_f = (!empty($this->sc_where_atual)) ? "(" . trim(substr($this->sc_where_atual, 6)) . ")" : "";
   $this->sc_where_atual_f = str_replace("%", "@percent@", $this->sc_where_atual_f);
   $this->sc_where_atual_f = "NM_where_filter*scin" . str_replace("'", "@aspass@", $this->sc_where_atual_f) . "*scout";
//
//--------- 
//
   $nmgp_opc_orig = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']; 
   if (isset($rec)) 
   { 
       if ($rec == "ini") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "inicio" ; 
       } 
       elseif ($rec == "fim") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "final" ; 
       } 
       else 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "avanca" ; 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] = $rec; 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] > 0) 
           { 
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']-- ; 
           } 
       } 
   } 
   $this->NM_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']; 
   if ($this->NM_opcao == "print") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print'] = "print" ; 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']       = "igual" ; 
   } 
// 
   $this->count_ger = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "final" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] == "all") 
   { 
       $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'];
       $this->Tot->$Gb_geral();
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral'][1] ;  
       $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral'][1];
   } 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_dinamic']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_dinamic'] != $this->nm_where_dinamico)  
   { 
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral']);
   } 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_dinamic'] = $this->nm_where_dinamico;  
   if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'] != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_ant'] || $nmgp_opc_orig == "edit") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['contr_total_geral'] = "NAO";
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total']);
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] == "all") 
   { 
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] = $this->count_ger;
        $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']       = "inicio";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pesq") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = 0 ; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "final") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "retorna") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid']; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] < 0) 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = 0 ; 
       } 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "avanca" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'])) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print'] != "print" && substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'], 0, 7) != "detalhe" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf") 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "igual"; 
   } 
   $this->Rec_ini = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid']; 
   if ($this->Rec_ini < 0) 
   { 
       $this->Rec_ini = 0; 
   } 
   $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] + 1; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total']) && $this->Rec_fim > $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total']) 
   { 
       $this->Rec_fim = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total']; 
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] > 0) 
   { 
       $this->Rec_ini++ ; 
   } 
   $this->nmgp_reg_start = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio']; 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] > 0) 
   { 
       $this->nmgp_reg_start--; 
   } 
   $this->nm_grid_ini = $this->nmgp_reg_start + 1; 
   if ($this->nmgp_reg_start != 0) 
   { 
       $this->nm_grid_ini++;
   }  
//----- 
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   { 
       $nmgp_select = "SELECT tb_itens.ID_Item as tb_itens_id_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Item
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Item_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Item_en
END) as nom_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Descricao
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Descricao_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Descricao_en
END) as nom_descricao from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   { 
       $nmgp_select = "SELECT tb_itens.ID_Item as tb_itens_id_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Item
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Item_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Item_en
END) as nom_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Descricao
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Descricao_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Descricao_en
END) as nom_descricao from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   { 
       $nmgp_select = "SELECT tb_itens.ID_Item as tb_itens_id_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Item
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Item_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Item_en
END) as nom_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Descricao
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Descricao_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Descricao_en
END) as nom_descricao from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
   { 
       $nmgp_select = "SELECT tb_itens.ID_Item as tb_itens_id_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Item
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Item_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Item_en
END) as nom_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Descricao
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Descricao_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Descricao_en
END) as nom_descricao from " . $this->Ini->nm_tabela; 
   } 
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
   { 
       $nmgp_select = "SELECT tb_itens.ID_Item as tb_itens_id_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Item
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Item_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Item_en
END) as nom_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Descricao
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Descricao_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Descricao_en
END) as nom_descricao from " . $this->Ini->nm_tabela; 
   } 
   else 
   { 
       $nmgp_select = "SELECT tb_itens.ID_Item as tb_itens_id_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Item
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Item_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Item_en
END) as nom_item, (CASE
  WHEN '[language]' = 'pt_br' THEN tb_itens.Nom_Descricao
  WHEN '[language]' = 'es' THEN tb_itens.Nom_Descricao_es
  WHEN '[language]' = 'en_us' THEN tb_itens.Nom_Descricao_en
END) as nom_descricao from " . $this->Ini->nm_tabela; 
   } 
   $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq']; 
   $nmgp_order_by = ""; 
   $campos_order_select = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_select'] as $campo => $ordem) 
   {
        if ($campo != $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid']) 
        {
           if (!empty($campos_order_select)) 
           {
               $campos_order_select .= ", ";
           }
           $campos_order_select .= $campo . " " . $ordem;
        }
   }
   $campos_order = "";
   foreach($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_quebra'] as $campo => $resto) 
   {
       foreach($resto as $sqldef => $ordem) 
       {
           $format       = $this->Ini->Get_Gb_date_format($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'], $campo);
           $campos_order = $this->Ini->Get_date_order_groupby($sqldef, $ordem, $format, $campos_order);
       }
   }
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'])) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_grid'] . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ordem_desc']; 
   } 
   elseif (!empty($campos_order_select)) 
   { 
       if (!empty($campos_order)) 
       { 
           $campos_order .= ", ";
       } 
       $nmgp_order_by = " order by " . $campos_order . $campos_order_select; 
   } 
   elseif (!empty($campos_order)) 
   { 
       $nmgp_order_by = " order by " . $campos_order; 
   } 
   if (substr(trim($nmgp_order_by), -1) == ",")
   {
       $nmgp_order_by = " " . substr(trim($nmgp_order_by), 0, -1);
   }
   if (trim($nmgp_order_by) == "order by")
   {
       $nmgp_order_by = "";
   }
   $nmgp_select .= $nmgp_order_by; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['order_grid'] = $nmgp_order_by;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['paginacao']))
   {
       $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
       $this->rs_grid = $this->Db->Execute($nmgp_select) ; 
   }
   else  
   {
       $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, " . ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] + 2) . ", $this->nmgp_reg_start)" ; 
       $this->rs_grid = $this->Db->SelectLimit($nmgp_select, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] + 2, $this->nmgp_reg_start) ; 
   }  
   if ($this->rs_grid === false && !$this->rs_grid->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
   { 
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit ; 
   }  
   if ($this->rs_grid->EOF || ($this->rs_grid === false && $GLOBALS["NM_ERRO_IBASE"] == 1)) 
   { 
       $this->force_toolbar = true;
       $this->nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
   }  
   else 
   { 
       $this->tb_itens_id_item = $this->rs_grid->fields[0] ;  
       $this->nom_item = $this->rs_grid->fields[1] ;  
       $this->nom_descricao = $this->rs_grid->fields[2] ;  
       $this->SC_seq_register = $this->nmgp_reg_start ; 
       $this->SC_seq_page = 0;
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] = $this->nmgp_reg_start ; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['inicio'] != 0 && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf") 
       { 
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']++ ; 
           $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']; 
           $this->rs_grid->MoveNext(); 
           $this->tb_itens_id_item = $this->rs_grid->fields[0] ;  
           $this->nom_item = $this->rs_grid->fields[1] ;  
           $this->nom_descricao = $this->rs_grid->fields[2] ;  
       } 
   } 
   $this->nmgp_reg_inicial = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] + 1;
   $this->nmgp_reg_final   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] + $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'];
   $this->nmgp_reg_final   = ($this->nmgp_reg_final > $this->count_ger) ? $this->count_ger : $this->nmgp_reg_final;
// 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       if (!$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_res'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_pdf'] != "pdf")
       {
           //---------- Gauge ----------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: PDF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
           if ($_SESSION['hticnsdata']['proc_mobile'])
           {
?>
              <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
           }
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
 <SCRIPT LANGUAGE="Javascript" SRC="<?php echo $this->Ini->path_js; ?>/nm_gauge.js"></SCRIPT>
</HEAD>
<BODY scrolling="no">
<table class="scGridTabela" style="padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;"><tr class="scGridFieldOddVert"><td>
<?php echo $this->Ini->Nm_lang['lang_pdff_gnrt']; ?>...<br>
<?php
           $this->progress_grid    = $this->rs_grid->RecordCount();
           $this->progress_pdf     = 0;
           $this->progress_res     = isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pivot_charts']) ? sizeof($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pivot_charts']) : 0;
           $this->progress_graf    = 0;
           $this->progress_tot     = 0;
           $this->progress_now     = 0;
           $this->progress_lim_tot = 0;
           $this->progress_lim_now = 0;
           if (-1 < $this->progress_grid)
           {
               $this->progress_lim_qtd = (250 < $this->progress_grid) ? 250 : $this->progress_grid;
               $this->progress_lim_tot = floor($this->progress_grid / $this->progress_lim_qtd);
               $this->progress_pdf     = floor($this->progress_grid * 0.25) + 1;
               $this->progress_tot     = $this->progress_grid + $this->progress_pdf + $this->progress_res + $this->progress_graf;
               $str_pbfile             = isset($_GET['pbfile']) ? urldecode($_GET['pbfile']) : $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
               $this->progress_fp      = fopen($str_pbfile, 'w');
               fwrite($this->progress_fp, "PDF\n");
               fwrite($this->progress_fp, $this->Ini->path_js   . "\n");
               fwrite($this->progress_fp, $this->Ini->path_prod . "/img/\n");
               fwrite($this->progress_fp, $this->progress_tot   . "\n");
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_strt'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['hticnsdata']['charset']);
               }
               fwrite($this->progress_fp, "1_#NM#_" . $lang_protect . "...\n");
               flush();
           }
       }
       $nm_fundo_pagina = ""; 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word'])
       {
           $nm_saida->saida("  <html xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" xmlns:m=\"http://schemas.microsoft.com/office/2004/12/omml\" xmlns=\"http://www.w3.org/TR/REC-html40\">\r\n");
       }
       $nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
       $nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
       $nm_saida->saida("  <HTML" . $_SESSION['hticnsdata']['reg_conf']['html_dir'] . ">\r\n");
       $nm_saida->saida("  <HEAD>\r\n");
       $nm_saida->saida("   <TITLE>" . $this->Ini->Nm_lang['lang_othr_grid_titl'] . " - </TITLE>\r\n");
       $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['hticnsdata']['charset_html'] . "\" />\r\n");
       if ($_SESSION['hticnsdata']['proc_mobile'])
       {
           $nm_saida->saida("   <meta name=\"viewport\" content=\"width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;\" />\r\n");
       }
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word'])
       {
           $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate("D, d M Y H:i:s") . " GMT\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\"/>\r\n");
           $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n");
       }
       $nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/hticnsdata__NM__ico__NM__favicon.ico\">\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
       { 
           $css_body = "";
       } 
       else 
       { 
           $css_body = "margin-left:0px;margin-right:0px;margin-top:0px;margin-bottom:0px;";
       } 
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
       { 
           $nm_saida->saida("   <form name=\"form_ajax_redir_1\" method=\"post\" style=\"display: none\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . session_id() . "\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <form name=\"form_ajax_redir_2\" method=\"post\" style=\"display: none\"> \r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_init\">\r\n");
           $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . session_id() . "\">\r\n");
           $nm_saida->saida("   </form>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_ProjetoItens_jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"grid_ProjetoItens_ajax.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
           $nm_saida->saida("     var sc_ajaxBg = '" . $this->Ini->Color_bg_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordC = '" . $this->Ini->Border_c_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordS = '" . $this->Ini->Border_s_ajax . "';\r\n");
           $nm_saida->saida("     var sc_ajaxBordW = '" . $this->Ini->Border_w_ajax . "';\r\n");
           $nm_saida->saida("   </script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery/js/jquery-ui.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery/css/smoothness/jquery-ui.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/touch_punch/jquery.ui.touch-punch.min.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/malsup-blockui/jquery.blockUI.js\"></script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\">var sc_pathToTB = '" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/';</script>\r\n");
           $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox-compressed.js\"></script>\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_prod . "/third/jquery_plugin/thickbox/thickbox.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $this->Ini->Str_btn_css . "\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv.css\" /> \r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_appdiv" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css\" /> \r\n");
           $nm_saida->saida("   <script type=\"text/javascript\"> \r\n");
           $nm_saida->saida("   var SC_Link_View = false;\r\n");
           if ($this->Ini->SC_Link_View)
           {
               $nm_saida->saida("   SC_Link_View = true;\r\n");
           }
           $nm_saida->saida("   var scQSInit = true;\r\n");
           $nm_saida->saida("   var scQtReg  = " . NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid']) . ";\r\n");
           $gridWidthCorrection = '';
           if (false !== strpos($this->Ini->grid_table_width, 'calc')) {
               $gridWidthCalc = substr($this->Ini->grid_table_width, strpos($this->Ini->grid_table_width, '(') + 1);
               $gridWidthCalc = substr($gridWidthCalc, 0, strpos($gridWidthCalc, ')'));
               $gridWidthParts = explode(' ', $gridWidthCalc);
               if (3 == count($gridWidthParts) && 'px' == substr($gridWidthParts[2], -2)) {
                   $gridWidthParts[2] = substr($gridWidthParts[2], 0, -2) / 2;
                   $gridWidthCorrection = $gridWidthParts[1] . ' ' . $gridWidthParts[2];
               }
           }
           $nm_saida->saida("  function scSetFixedHeaders() {\r\n");
           $nm_saida->saida("   var divScroll, gridHeaders, headerPlaceholder;\r\n");
           $nm_saida->saida("   gridHeaders = $(\".sc-ui-grid-header-row-grid_ProjetoItens-1\");\r\n");
           $nm_saida->saida("   headerPlaceholder = $(\"#sc-id-fixedheaders-placeholder\");\r\n");
           $nm_saida->saida("   scSetFixedHeadersContents(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("   scSetFixedHeadersSize(gridHeaders);\r\n");
           $nm_saida->saida("   scSetFixedHeadersPosition(gridHeaders, headerPlaceholder);\r\n");
           $nm_saida->saida("   if (scIsHeaderVisible(gridHeaders)) {\r\n");
           $nm_saida->saida("    headerPlaceholder.hide();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   else {\r\n");
           $nm_saida->saida("    headerPlaceholder.show();\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersPosition(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   headerPlaceholder.css({\"top\": 0" . $gridWidthCorrection . ", \"left\": (Math.floor(gridHeaders.position().left) - $(document).scrollLeft()" . $gridWidthCorrection . ") + \"px\"});\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scIsHeaderVisible(gridHeaders) {\r\n");
           $nm_saida->saida("   return gridHeaders.offset().top > $(document).scrollTop();\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersContents(gridHeaders, headerPlaceholder) {\r\n");
           $nm_saida->saida("   var i, htmlContent;\r\n");
           $nm_saida->saida("   htmlContent = \"<table id=\\\"sc-id-fixed-headers\\\" class=\\\"scGridTabela\\\">\";\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    htmlContent += \"<tr class=\\\"scGridLabel\\\" id=\\\"sc-id-fixed-headers-row-\" + i + \"\\\">\" + $(gridHeaders[i]).html() + \"</tr>\";\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   htmlContent += \"</table>\";\r\n");
           $nm_saida->saida("   headerPlaceholder.html(htmlContent);\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function scSetFixedHeadersSize(gridHeaders) {\r\n");
           $nm_saida->saida("   var i, j, headerColumns, gridColumns, cellHeight, cellWidth, tableOriginal, tableHeaders;\r\n");
           $nm_saida->saida("   tableOriginal = $(\"#sc-ui-grid-body-aa756cfd\");\r\n");
           $nm_saida->saida("   tableHeaders = document.getElementById(\"sc-id-fixed-headers\");\r\n");
           $nm_saida->saida("   $(tableHeaders).css(\"width\", $(tableOriginal).outerWidth());\r\n");
           $nm_saida->saida("   for (i = 0; i < gridHeaders.length; i++) {\r\n");
           $nm_saida->saida("    headerColumns = $(\"#sc-id-fixed-headers-row-\" + i).find(\"td\");\r\n");
           $nm_saida->saida("    gridColumns = $(gridHeaders[i]).find(\"td\");\r\n");
           $nm_saida->saida("    for (j = 0; j < gridColumns.length; j++) {\r\n");
           $nm_saida->saida("     if (window.getComputedStyle(gridColumns[j])) {\r\n");
           $nm_saida->saida("      cellWidth = window.getComputedStyle(gridColumns[j]).width;\r\n");
           $nm_saida->saida("      cellHeight = window.getComputedStyle(gridColumns[j]).height;\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     else {\r\n");
           $nm_saida->saida("      cellWidth = $(gridColumns[j]).width() + \"px\";\r\n");
           $nm_saida->saida("      cellHeight = $(gridColumns[j]).height() + \"px\";\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("     $(headerColumns[j]).css({\r\n");
           $nm_saida->saida("      \"width\": cellWidth,\r\n");
           $nm_saida->saida("      \"height\": cellHeight\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("    }\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  function SC_init_jquery(isScrollNav){ \r\n");
           $nm_saida->saida("   \$(function(){ \r\n");
           $nm_saida->saida("     $('#id_F0_top').keyup(function(e) {\r\n");
           $nm_saida->saida("       var keyPressed = e.charCode || e.keyCode || e.which;\r\n");
           $nm_saida->saida("       if (13 == keyPressed) {\r\n");
           $nm_saida->saida("          return false; \r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("     if (!isScrollNav) {\r\n");
           $nm_saida->saida("       for (i = 1; i <= scQtReg; i++) {\r\n");
           $nm_saida->saida("         scJQAddEvents(i);\r\n");
           $nm_saida->saida("       }\r\n");
           $nm_saida->saida("     }\r\n");
           $nm_saida->saida("   }); \r\n");
           $nm_saida->saida("  }\r\n");
           $nm_saida->saida("  SC_init_jquery(false);\r\n");
           $nm_saida->saida("   \$(window).on('load', function() {\r\n");
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ancor_save']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ancor_save']))
           {
               $nm_saida->saida("       var catTopPosition = jQuery('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ancor_save'] . "').offset().top;\r\n");
               $nm_saida->saida("       jQuery('html, body').animate({scrollTop:catTopPosition}, 'fast');\r\n");
               $nm_saida->saida("       $('#SC_ancor" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ancor_save'] . "').addClass('" . $this->css_scGridFieldOver . "');\r\n");
               unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ancor_save']);
           }
           $nm_saida->saida("   });\r\n");
           $nm_saida->saida("   function scBtnGroupByShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_groupby_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnGroupByHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_groupby_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_save_grid_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSaveGridHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_save_grid_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_sel_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnSelCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_sel_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposShow(sUrl, sPos) {\r\n");
           $nm_saida->saida("     $.ajax({\r\n");
           $nm_saida->saida("       type: \"GET\",\r\n");
           $nm_saida->saida("       dataType: \"html\",\r\n");
           $nm_saida->saida("       url: sUrl\r\n");
           $nm_saida->saida("     }).done(function(data) {\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(data);\r\n");
           $nm_saida->saida("       $(\"#sc_id_order_campos_placeholder_\" + sPos).show();\r\n");
           $nm_saida->saida("     });\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   function scBtnOrderCamposHide(sPos) {\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).hide();\r\n");
           $nm_saida->saida("     $(\"#sc_id_order_campos_placeholder_\" + sPos).find(\"td\").html(\"\");\r\n");
           $nm_saida->saida("   }\r\n");
           $nm_saida->saida("   </script> \r\n");
       } 
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['num_css']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['num_css'] = rand(0, 1000);
       }
       $write_css = true;
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && !$this->Print_All && $this->NM_opcao != "print" && $this->NM_opcao != "pdf")
       {
           $write_css = false;
       }
       if ($write_css) {$NM_css = @fopen($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_ProjetoItens_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['num_css'] . '.css', 'w');}
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
       {
           $this->NM_field_over  = 0;
           $this->NM_field_click = 0;
           $Css_sub_cons = array();
           if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['hticnsdata']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid_bw.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid_bw" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           else 
           { 
               $NM_css_file = $this->Ini->str_schema_all . "_grid.css";
               $NM_css_dir  = $this->Ini->str_schema_all . "_grid" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css";
               if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'])) 
               { 
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css'] as $Apl => $Css_apl)
                   {
                       $Css_sub_cons[] = $Css_apl;
                       $Css_sub_cons[] = str_replace(".css", $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css", $Css_apl);
                   }
               } 
           } 
           if (is_file($this->Ini->path_css . $NM_css_file))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_file);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (is_file($this->Ini->path_css . $NM_css_dir))
           {
               $NM_css_attr = file($this->Ini->path_css . $NM_css_dir);
               foreach ($NM_css_attr as $NM_line_css)
               {
                   if (substr(trim($NM_line_css), 0, 16) == ".scGridFieldOver" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_over = 1;
                   }
                   if (substr(trim($NM_line_css), 0, 17) == ".scGridFieldClick" && strpos($NM_line_css, "background-color:") !== false)
                   {
                       $this->NM_field_click = 1;
                   }
                   $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                   if ($write_css) {@fwrite($NM_css, "    " .  $NM_line_css . "\r\n");}
               }
           }
           if (!empty($Css_sub_cons))
           {
               $Css_sub_cons = array_unique($Css_sub_cons);
               foreach ($Css_sub_cons as $Cada_css_sub)
               {
                   if (is_file($this->Ini->path_css . $Cada_css_sub))
                   {
                       $compl_css = str_replace(".", "_", $Cada_css_sub);
                       $temp_css  = explode("/", $compl_css);
                       if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
                       $NM_css_attr = file($this->Ini->path_css . $Cada_css_sub);
                       foreach ($NM_css_attr as $NM_line_css)
                       {
                           $NM_line_css = str_replace("../../img", $this->Ini->path_imag_cab  , $NM_line_css);
                           if ($write_css) {@fwrite($NM_css, "    ." .  $compl_css . "_" . substr(trim($NM_line_css), 1) . "\r\n");}
                       }
                   }
               }
           }
       }
       if ($write_css) {@fclose($NM_css);}
           $this->NM_css_val_embed .= "win";
           $this->NM_css_ajx_embed .= "ult_set";
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_grid" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['hticnsdata']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['hticnsdata']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab.css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $this->Ini->str_schema_all . "_tab" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       elseif ($this->NM_opcao == "print" || $this->Print_All)
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_imag_temp . '/sc_css_grid_ProjetoItens_grid_' . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['num_css'] . '.css');
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['hticnsdata']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['hticnsdata']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("  </style>\r\n");
       }
       else
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"" . $this->Ini->path_imag_temp . "/sc_css_grid_ProjetoItens_grid_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['num_css'] . ".css\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['hticnsdata']['erro']['str_schema'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
           $nm_saida->saida("   <link rel=\"stylesheet\" href=\"../_lib/css/" . $_SESSION['hticnsdata']['erro']['str_schema_dir'] . "\" type=\"text/css\" media=\"screen\" />\r\n");
       }
       $str_iframe_body = ($this->aba_iframe) ? 'marginwidth="0px" marginheight="0px" topmargin="0px" leftmargin="0px"' : '';
       $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $nm_saida->saida("  </style>\r\n");
       if (!$write_css)
       {
           $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $this->Ini->path_link . "grid_ProjetoItens/grid_ProjetoItens_grid_" . strtolower($_SESSION['hticnsdata']['reg_conf']['css_dir']) . ".css\" />\r\n");
       }
       else
       {
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
           $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_ProjetoItens/grid_ProjetoItens_grid_" .strtolower($_SESSION['hticnsdata']['reg_conf']['css_dir']) . ".css");
           foreach ($NM_css as $cada_css)
           {
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
           }
           $nm_saida->saida("  </style>\r\n");
       }
       $nm_saida->saida("  </HEAD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && $this->Ini->nm_ger_css_emb)
   {
       $this->Ini->nm_ger_css_emb = false;
           $nm_saida->saida("  <style type=\"text/css\">\r\n");
       $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_ProjetoItens/grid_ProjetoItens_grid_" .strtolower($_SESSION['hticnsdata']['reg_conf']['css_dir']) . ".css");
       foreach ($NM_css as $cada_css)
       {
           $cada_css = ".grid_ProjetoItens_" . substr($cada_css, 1);
              $nm_saida->saida("  " . str_replace("\r\n", "", $cada_css) . "\r\n");
       }
           $nm_saida->saida("  </style>\r\n");
   }
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       $nm_saida->saida("  <body class=\"" . $this->css_scGridPage . "\" " . $str_iframe_body . " style=\"" . $css_body . "\">\r\n");
       $nm_saida->saida("  " . $this->Ini->Ajax_result_set . "\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" && !$this->Print_All)
       { 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] == "sc_free_total")
           {
           $nm_saida->saida("          <div style=\"height:1px;overflow:hidden\"><H1 style=\"font-size:0;padding:1px\"></H1></div>\r\n");
           }
       } 
       $this->Tab_align  = "center";
       $this->Tab_valign = "top";
       $this->Tab_width = " width=\"100%\"";
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
       { 
           $this->form_navegacao();
           if ($NM_run_iframe != 1) {$this->check_btns();}
       } 
       $nm_saida->saida("   <TABLE id=\"main_table_grid\" cellspacing=0 cellpadding=0 align=\"" . $this->Tab_align . "\" valign=\"" . $this->Tab_valign . "\" " . $this->Tab_width . ">\r\n");
       $nm_saida->saida("     <TR>\r\n");
       $nm_saida->saida("       <TD>\r\n");
       $nm_saida->saida("       <div class=\"scGridBorder\">\r\n");
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word'])
       { 
           $nm_saida->saida("  <div id=\"id_div_process\" style=\"display: none; margin: 10px; whitespace: nowrap\" class=\"scFormProcessFixed\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_div_process_block\" style=\"display: none; margin: 10px; whitespace: nowrap\"><span class=\"scFormProcess\"><img border=\"0\" src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__ajax_load.gif\" align=\"absmiddle\" />&nbsp;" . $this->Ini->Nm_lang['lang_othr_prcs'] . "...</span></div>\r\n");
           $nm_saida->saida("  <div id=\"id_fatal_error\" class=\"" . $this->css_scGridLabel . "\" style=\"display: none; position: absolute\"></div>\r\n");
       } 
       $nm_saida->saida("       <TABLE width='100%' cellspacing=0 cellpadding=0>\r\n");
   }  
 }  
 function NM_cor_embutida()
 {  
   $compl_css = "";
   include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   {
       $this->arr_buttons = array_merge($this->arr_buttons, $this->Ini->arr_buttons_usr);
       $this->NM_css_val_embed = "sznmxizkjnvl";
       $this->NM_css_ajx_embed = "Ajax_res";
   }
   elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_herda_css'] == "N")
   {
       if (($this->NM_opcao == "print" && $GLOBALS['nmgp_cor_print'] == "PB") || ($this->NM_opcao == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb") || ($_SESSION['hticnsdata']['contr_link_emb'] == "pdf" &&  $GLOBALS['nmgp_tipo_pdf'] == "pb")) 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_ProjetoItens']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']['grid_ProjetoItens']) . "_";
           } 
       } 
       else 
       { 
           if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_ProjetoItens']))
           {
               $compl_css = str_replace(".", "_", $_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']['grid_ProjetoItens']) . "_";
           } 
       }
   }
   $temp_css  = explode("/", $compl_css);
   if (isset($temp_css[1])) { $compl_css = $temp_css[1];}
   $this->css_scGridPage           = $compl_css . "scGridPage";
   $this->css_scGridPageLink       = $compl_css . "scGridPageLink";
   $this->css_scGridToolbar        = $compl_css . "scGridToolbar";
   $this->css_scGridToolbarPadd    = $compl_css . "scGridToolbarPadding";
   $this->css_css_toolbar_obj      = $compl_css . "css_toolbar_obj";
   $this->css_scGridHeader         = $compl_css . "scGridHeader";
   $this->css_scGridHeaderFont     = $compl_css . "scGridHeaderFont";
   $this->css_scGridFooter         = $compl_css . "scGridFooter";
   $this->css_scGridFooterFont     = $compl_css . "scGridFooterFont";
   $this->css_scGridBlock          = $compl_css . "scGridBlock";
   $this->css_scGridBlockFont      = $compl_css . "scGridBlockFont";
   $this->css_scGridBlockAlign     = $compl_css . "scGridBlockAlign";
   $this->css_scGridTotal          = $compl_css . "scGridTotal";
   $this->css_scGridTotalFont      = $compl_css . "scGridTotalFont";
   $this->css_scGridSubtotal       = $compl_css . "scGridSubtotal";
   $this->css_scGridSubtotalFont   = $compl_css . "scGridSubtotalFont";
   $this->css_scGridFieldEven      = $compl_css . "scGridFieldEven";
   $this->css_scGridFieldEvenFont  = $compl_css . "scGridFieldEvenFont";
   $this->css_scGridFieldEvenVert  = $compl_css . "scGridFieldEvenVert";
   $this->css_scGridFieldEvenLink  = $compl_css . "scGridFieldEvenLink";
   $this->css_scGridFieldOdd       = $compl_css . "scGridFieldOdd";
   $this->css_scGridFieldOddFont   = $compl_css . "scGridFieldOddFont";
   $this->css_scGridFieldOddVert   = $compl_css . "scGridFieldOddVert";
   $this->css_scGridFieldOddLink   = $compl_css . "scGridFieldOddLink";
   $this->css_scGridFieldClick     = $compl_css . "scGridFieldClick";
   $this->css_scGridFieldOver      = $compl_css . "scGridFieldOver";
   $this->css_scGridLabel          = $compl_css . "scGridLabel";
   $this->css_scGridLabelVert      = $compl_css . "scGridLabelVert";
   $this->css_scGridLabelFont      = $compl_css . "scGridLabelFont";
   $this->css_scGridLabelLink      = $compl_css . "scGridLabelLink";
   $this->css_scGridTabela         = $compl_css . "scGridTabela";
   $this->css_scGridTabelaTd       = $compl_css . "scGridTabelaTd";
   $this->css_scGridBlockBg        = $compl_css . "scGridBlockBg";
   $this->css_scGridBlockLineBg    = $compl_css . "scGridBlockLineBg";
   $this->css_scGridBlockSpaceBg   = $compl_css . "scGridBlockSpaceBg";
   $this->css_scGridLabelNowrap    = "";
   $this->css_scAppDivMoldura      = $compl_css . "scAppDivMoldura";
   $this->css_scAppDivHeader       = $compl_css . "scAppDivHeader";
   $this->css_scAppDivHeaderText   = $compl_css . "scAppDivHeaderText";
   $this->css_scAppDivContent      = $compl_css . "scAppDivContent";
   $this->css_scAppDivContentText  = $compl_css . "scAppDivContentText";
   $this->css_scAppDivToolbar      = $compl_css . "scAppDivToolbar";
   $this->css_scAppDivToolbarInput = $compl_css . "scAppDivToolbarInput";

   $compl_css_emb = ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida']) ? "grid_ProjetoItens_" : "";
   $this->css_sep = " ";
   $this->css_tb_itens_id_item_label = $compl_css_emb . "css_tb_itens_id_item_label";
   $this->css_tb_itens_id_item_grid_line = $compl_css_emb . "css_tb_itens_id_item_grid_line";
   $this->css_nom_item_label = $compl_css_emb . "css_nom_item_label";
   $this->css_nom_item_grid_line = $compl_css_emb . "css_nom_item_grid_line";
   $this->css_nom_descricao_label = $compl_css_emb . "css_nom_descricao_label";
   $this->css_nom_descricao_grid_line = $compl_css_emb . "css_nom_descricao_grid_line";
   $this->css_observacoes_label = $compl_css_emb . "css_observacoes_label";
   $this->css_observacoes_grid_line = $compl_css_emb . "css_observacoes_grid_line";
   $this->css_num_status_label = $compl_css_emb . "css_num_status_label";
   $this->css_num_status_grid_line = $compl_css_emb . "css_num_status_grid_line";
   $this->css_editar_label = $compl_css_emb . "css_editar_label";
   $this->css_editar_grid_line = $compl_css_emb . "css_editar_grid_line";
 }  
// 
//----- 
 function cabecalho()
 {
   global
          $nm_saida;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['compact_mode'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dashboard_info']['maximized'])
   {
       return; 
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['cab']))
   {
       return; 
   }
   $nm_cab_filtro   = ""; 
   $nm_cab_filtrobr = ""; 
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
   $this->sc_proc_grid = false; 
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
   $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
   $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq']))
   {  
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq'];
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       $nm_cond_filtro_or  = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq'], $trab_pos + 5) == "or")  ? " " . trim($this->Ini->Nm_lang['lang_srch_orr_cond']) . " " : "";
       $nm_cond_filtro_and = (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq'], $trab_pos + 5) == "and") ? " " . trim($this->Ini->Nm_lang['lang_srch_and_cond']) . " " : "";
       $nm_cab_filtro   = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq'], 0, $trab_pos);
       $nm_cab_filtrobr = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and . "<br />", $nm_cab_filtro);
       $pos       = 0;
       $trab_pos  = false;
       $pos_tmp   = true; 
       $tmp       = $nm_cab_filtro;
       while ($pos_tmp)
       {
          $pos = strpos($tmp, "##*@@", $pos);
          if ($pos !== false)
          {
              $trab_pos = $pos;
              $pos += 4;
          }
          else
          {
              $pos_tmp = false;
          }
       }
       if ($trab_pos === false)
       {
       }
       else  
       {  
          $nm_cab_filtro = substr($nm_cab_filtro, 0, $trab_pos) . " " .  $nm_cond_filtro_or . $nm_cond_filtro_and . substr($nm_cab_filtro, $trab_pos + 5);
          $nm_cab_filtro = str_replace("##*@@", ", " . $nm_cond_filtro_or . $nm_cond_filtro_and, $nm_cab_filtro);
       }   
   }   
   $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['CNSDATA_novaABA_APP'])) {$_SESSION['CNSDATA_novaABA_APP'] = "";}
if (!isset($this->sc_temp_CNSDATA_novaABA_APP)) {$this->sc_temp_CNSDATA_novaABA_APP = (isset($_SESSION['CNSDATA_novaABA_APP'])) ? $_SESSION['CNSDATA_novaABA_APP'] : "";}
if (!isset($_SESSION['errorMSG'])) {$_SESSION['errorMSG'] = "";}
if (!isset($this->sc_temp_errorMSG)) {$this->sc_temp_errorMSG = (isset($_SESSION['errorMSG'])) ? $_SESSION['errorMSG'] : "";}
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'initCustom', 'onLoad.html');
sc_include_library("sys", "models", "Helperartigos.php");
$_Helperartigos = new Helperartigos($this);
$s = new manageSession(true);
$msg = $s->getMessage();
echo $s->getIUDState($this);
$msg = $this->sc_temp_errorMSG ? ["msg" => $this->sc_temp_errorMSG, "title"=> "", "type"=>"danger"] : false;
if ($msg) {
	 unset($_SESSION['errorMSG']);
 unset($this->sc_temp_errorMSG);
;
	$msg['type'] = $msg['type'] ? $msg['type'] : "danger";
	echo "<script>sModal('show', '{$msg['title']}', '{$msg['msg']}', {type:'{$msg['type']}'});</script>";
}

$statusProjeto =$this->getStatusProjeto();

 
      $nm_select = "SELECT * FROM tb_projetos WHERE ID_projeto = '$this->sc_temp_id_Projeto'"; 
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
$this->rs  = isset($this->rs [0]) ? $this->rs [0] : [];


?>
	<style>
		#sc_enviarProjeto_top, #sc_iniciarAnalise_top, #sc_pauseAnalise_top, #sc_fimAnalise_top {
			display: none !important;
		}
		.css_observacoes_grid_line {
			width: 450px !important;
		}
		#sc_downloadZip_top {
			display: none;
		}
		a.disabled {
		    pointer-events: none;
    		opacity: 0.6;
		}
	</style>
	<script>
		<?php if($this->sc_temp_CNSDATA_novaABA_APP) : ?>
			window.open("../menu");
		<?php endif; ?>
		$(document).ready(function(){
			$('.css_tb_itens_id_item_label').hide();
			$('.css_tb_itens_id_item_grid_line').hide();
			<?php
				if(count($this->rs ) && $this->rs ["Observacoes"] != '') {
					$obs = nl2br($this->rs ["Observacoes"]);
					$obs = preg_replace("/\r\n|\r|\n/", '', $obs);			
					$html = '
						<tr> 
							<td id="obs_prj" style="max-width: 100vh;word-break: break-word;"> 
								<h3>'.$this->Ini->Nm_lang['lang_label_obsprojetos'].'</h3> 
								'.$obs.' 
							</td> 
						</tr> 
					';
					echo "\$('#sc_grid_body').closest('tr').after(`$html`);";
				}
			?>
		});
		function downloadAvaibled (){
			$.get('./?act=ZipDownload&Protocolo=<?=  $this->rs ["ProtocoloHex"]?>', 
			function(data){
				if (!data) return;
				if(typeof data.listRs != "undefined"){
					if(data.listRs > 0){
						window.open('./?act=ZipDownload&Protocolo=<?=  $this->rs ["ProtocoloHex"]?>', '_blank');
					} else {
						toastr.warning("", "<?= $this->Ini->Nm_lang['lang_label_nofilesdownload']?>")
					}
				} else {
					toastr.warning("", "<?= $this->Ini->Nm_lang['lang_label_nofilesdownload']?>")
				}
			}, "json");
		}
		<?php if ($msg) echo "sModal('show', '".$msg['title']."', '".$msg['msg']."', {type:'".$msg['type']."'});"; ?>
	</script>
<?php

$helperContatos = null;
if ($statusProjeto['Code'] == "aguardando_analise_itens"){
$helperContatos = $_Helperartigos->getLink([ 
			'G' => 'analisar_projeto',
			'GT' => 'analisar_projeto',
			'O' => '',
			'P' => '',
			'E' => '',
			'default' => '']);
}
	echo "
		<script>
			loadBreadcrumb(['".$this->Ini->Nm_lang['lang_label_projects']."', `".$this->rs ["ProtocoloHex"]." (".$statusProjeto['StatusText'].") ".$helperContatos."`]);
		</script>

	";
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
if (isset($this->sc_temp_errorMSG)) {$_SESSION['errorMSG'] = $this->sc_temp_errorMSG;}
if (isset($this->sc_temp_CNSDATA_novaABA_APP)) {$_SESSION['CNSDATA_novaABA_APP'] = $this->sc_temp_CNSDATA_novaABA_APP;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
   $this->nm_data->SetaData(date("Y/m/d H:i:s"), "YYYY/MM/DD HH:II:SS"); 
   $nm_saida->saida(" <TR id=\"sc_grid_head\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf")
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
   } 
   else 
   { 
       $nm_saida->saida("  <TD class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top\">\r\n");
   } 
   $nm_saida->saida("<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">\r\n");
   $nm_saida->saida("<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\">	</script>\r\n");
   $nm_saida->saida("<style>\r\n");
   $nm_saida->saida("  	.scFormBorder, .scGridBorder {\r\n");
   $nm_saida->saida("	  	border: none;\r\n");
   $nm_saida->saida("  	} \r\n");
   $nm_saida->saida("  	.scFormTable, .scGridTable {\r\n");
   $nm_saida->saida("	  	border: none;\r\n");
   $nm_saida->saida("  	}\r\n");
   $nm_saida->saida("  	.scFormToolbar, .scGridToolbar {\r\n");
   $nm_saida->saida("	  	border: none;\r\n");
   $nm_saida->saida("	    background: rgba(0,0,0,0);\r\n");
   $nm_saida->saida("  	}\r\n");
   $nm_saida->saida("  	.scGridTabela {\r\n");
   $nm_saida->saida("    	margin: 0;\r\n");
   $nm_saida->saida("	}\r\n");
   $nm_saida->saida("  	* {\r\n");
   $nm_saida->saida("	    -webkit-box-sizing: content-box;\r\n");
   $nm_saida->saida("	    -moz-box-sizing: content-box;\r\n");
   $nm_saida->saida("	    box-sizing: content-box;\r\n");
   $nm_saida->saida("	}\r\n");
   $nm_saida->saida("  	*::-webkit-scrollbar-track {\r\n");
   $nm_saida->saida("		-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.0);\r\n");
   $nm_saida->saida("		background-color: #3333331a;\r\n");
   $nm_saida->saida("	}\r\n");
   $nm_saida->saida("	*::-webkit-scrollbar {\r\n");
   $nm_saida->saida("		width: 6px;\r\n");
   $nm_saida->saida("  		background-color: rgba(0,0,0,0);\r\n");
   $nm_saida->saida("	}\r\n");
   $nm_saida->saida("    *::-webkit-scrollbar:horizontal {\r\n");
   $nm_saida->saida("          height: 8px;\r\n");
   $nm_saida->saida("          background-color: rgba(0,0,0,0);\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("	*::-webkit-scrollbar-thumb {\r\n");
   $nm_saida->saida("		background-color: #3333336b;\r\n");
   $nm_saida->saida("  		border-radius: 10px;\r\n");
   $nm_saida->saida("	}\r\n");
   $nm_saida->saida("  	#sidebar-wrapper {\r\n");
   $nm_saida->saida("  		-ms-overflow-style:none;\r\n");
   $nm_saida->saida("  	}\r\n");
   $nm_saida->saida("</style>\r\n");
   $nm_saida->saida("  </TD>\r\n");
   $nm_saida->saida(" </TR>\r\n");
 }
// 
 function label_grid($linhas = 0)
 {
   global 
           $nm_saida;
   static $nm_seq_titulos   = 0; 
   $contr_embutida = false;
   $salva_htm_emb  = "";
   $this->New_label['nom_item'] = "" . $this->Ini->Nm_lang['lang_label_name'] . "";
   $this->New_label['nom_descricao'] = "" . $this->Ini->Nm_lang['lang_label_description'] . "";
   $this->New_label['observacoes'] = "" . $this->Ini->Nm_lang['lang_label_observation'] . "";
   $this->New_label['editar'] = "" . $this->Ini->Nm_lang['lang_label_edit'] . "";
   if (1 < $linhas)
   {
      $this->Lin_impressas++;
   }
   $nm_seq_titulos++; 
   $tmp_header_row = $nm_seq_titulos;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['exibe_titulos'] != "S")
   { 
   } 
   else 
   { 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_label'])
      { 
          if (!isset($_SESSION['hticnsdata']['saida_var']) || !$_SESSION['hticnsdata']['saida_var']) 
          { 
              $_SESSION['hticnsdata']['saida_var']  = true;
              $_SESSION['hticnsdata']['saida_html'] = "";
              $contr_embutida = true;
          } 
          else 
          { 
              $salva_htm_emb = $_SESSION['hticnsdata']['saida_html'];
              $_SESSION['hticnsdata']['saida_html'] = "";
          } 
      } 
   $nm_saida->saida("    <TR id=\"tit_grid_ProjetoItens__SCCS__" . $nm_seq_titulos . "\" align=\"center\" class=\"" . $this->css_scGridLabel . " sc-ui-grid-header-row sc-ui-grid-header-row-grid_ProjetoItens-" . $tmp_header_row . "\">\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_label']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_editar_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_psq']) { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_editar_label'] . "\" >&nbsp;</TD>\r\n");
   } 
   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'] as $Cada_label)
   { 
       $NM_func_lab = "NM_label_" . $Cada_label;
       $this->$NM_func_lab();
   } 
   $nm_saida->saida("</TR>\r\n");
     if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_label'])
     { 
         if (isset($_SESSION['hticnsdata']['saida_var']) && $_SESSION['hticnsdata']['saida_var'])
         { 
             $Cod_Html = $_SESSION['hticnsdata']['saida_html'];
             $pos_tag = strpos($Cod_Html, "<TD ");
             $Cod_Html = substr($Cod_Html, $pos_tag);
             $pos      = 0;
             $pos_tag  = false;
             $pos_tmp  = true; 
             $tmp      = $Cod_Html;
             while ($pos_tmp)
             {
                $pos = strpos($tmp, "</TR>", $pos);
                if ($pos !== false)
                {
                    $pos_tag = $pos;
                    $pos += 4;
                }
                else
                {
                    $pos_tmp = false;
                }
             }
             $Cod_Html = substr($Cod_Html, 0, $pos_tag);
             $Nm_temp = explode("</TD>", $Cod_Html);
             $css_emb = "<style type=\"text/css\">";
             $NM_css = file($this->Ini->root . $this->Ini->path_link . "grid_ProjetoItens/grid_ProjetoItens_grid_" .strtolower($_SESSION['hticnsdata']['reg_conf']['css_dir']) . ".css");
             foreach ($NM_css as $cada_css)
             {
                 $css_emb .= ".grid_ProjetoItens_" . substr($cada_css, 1);
             }
             $css_emb .= "</style>";
             $Cod_Html = $css_emb . $Cod_Html;
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cols_emb'] = count($Nm_temp) - 1;
             if ($contr_embutida) 
             { 
                 $_SESSION['hticnsdata']['saida_var']  = false;
                 $nm_saida->saida($Cod_Html);
             } 
             else 
             { 
                 $_SESSION['hticnsdata']['saida_html'] = $salva_htm_emb . $Cod_Html;
             } 
         } 
     } 
   } 
 }
 function NM_label_tb_itens_id_item()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['tb_itens_id_item'])) ? $this->New_label['tb_itens_id_item'] : ""; 
   if (!isset($this->NM_cmp_hidden['tb_itens_id_item']) || $this->NM_cmp_hidden['tb_itens_id_item'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_tb_itens_id_item_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_tb_itens_id_item_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nom_item()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nom_item'])) ? $this->New_label['nom_item'] : "" . $this->Ini->Nm_lang['lang_label_name'] . ""; 
   if (!isset($this->NM_cmp_hidden['nom_item']) || $this->NM_cmp_hidden['nom_item'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nom_item_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nom_item_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_nom_descricao()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['nom_descricao'])) ? $this->New_label['nom_descricao'] : "" . $this->Ini->Nm_lang['lang_label_description'] . ""; 
   if (!isset($this->NM_cmp_hidden['nom_descricao']) || $this->NM_cmp_hidden['nom_descricao'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_nom_descricao_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_nom_descricao_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_observacoes()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['observacoes'])) ? $this->New_label['observacoes'] : "" . $this->Ini->Nm_lang['lang_label_observation'] . ""; 
   if (!isset($this->NM_cmp_hidden['observacoes']) || $this->NM_cmp_hidden['observacoes'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_observacoes_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_observacoes_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_num_status()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['num_status'])) ? $this->New_label['num_status'] : "Status"; 
   if (!isset($this->NM_cmp_hidden['num_status']) || $this->NM_cmp_hidden['num_status'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_num_status_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_num_status_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
 function NM_label_editar()
 {
   global $nm_saida;
   $SC_Label = (isset($this->New_label['editar'])) ? $this->New_label['editar'] : "" . $this->Ini->Nm_lang['lang_label_edit'] . ""; 
   if (!isset($this->NM_cmp_hidden['editar']) || $this->NM_cmp_hidden['editar'] != "off") { 
   $nm_saida->saida("     <TD class=\"" . $this->css_scGridLabelFont . $this->css_sep . $this->css_editar_label . "\"  style=\"" . $this->css_scGridLabelNowrap . "" . $this->Css_Cmp['css_editar_label'] . "\" >" . nl2br($SC_Label) . "</TD>\r\n");
   } 
 }
// 
//----- 
 function grid($linhas = 0)
 {
    global 
           $nm_saida;
   $fecha_tr               = "</tr>";
   $this->Ini->qual_linha  = "par";
   $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['rows_emb'] = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   {
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ini_cor_grid']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ini_cor_grid'] == "impar")
       {
           $this->Ini->qual_linha = "impar";
           unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ini_cor_grid']);
       }
   }
   static $nm_seq_execucoes = 0; 
   static $nm_seq_titulos   = 0; 
   $this->SC_ancora = "";
   $this->Rows_span = 1;
   $nm_seq_execucoes++; 
   $nm_seq_titulos++; 
   $this->nm_prim_linha  = true; 
   $this->Ini->nm_cont_lin = 0; 
   $this->sc_where_orig    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
   $this->sc_where_atual   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
   $this->sc_where_filtro  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
   if (!$this->grid_emb_form && isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['lig_edit']) && $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['lig_edit'] != '')
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['mostra_edit'] = $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['lig_edit'];
   }
   if (!empty($this->nm_grid_sem_reg))
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
       {
           $this->Lin_impressas++;
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'])
           {
               if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cols_emb']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cols_emb']))
               {
                   $cont_col = 0;
                   foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'] as $cada_field)
                   {
                       $cont_col++;
                   }
                   $NM_span_sem_reg = $cont_col - 1;
               }
               else
               {
                   $NM_span_sem_reg  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cols_emb'];
               }
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['rows_emb']++;
               $nm_saida->saida("  <TR> <TD class=\"" . $this->css_scGridTabelaTd . " " . "\" colspan = \"$NM_span_sem_reg\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "</TD> </TR>\r\n");
               $nm_saida->saida("##NM@@\r\n");
               $this->rs_grid->Close();
           }
           else
           {
               $nm_saida->saida("<table id=\"apl_grid_ProjetoItens#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridTabelaTd . " " . "\" style=\"font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\"><table style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\">\r\n");
               $nm_id_aplicacao = "";
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cab_embutida'] != "S")
               {
                   $this->label_grid($linhas);
               }
               $this->NM_calc_span();
               $nm_saida->saida("  <tr><td class=\"" . $this->css_scGridFieldOdd . "\"  style=\"padding: 0px; font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\" colspan = \"" . $this->NM_colspan . "\" align=\"center\">\r\n");
               $nm_saida->saida("     " . $this->nm_grid_sem_reg . "\r\n");
               $nm_saida->saida("  </td></tr>\r\n");
               $nm_saida->saida("  </table></td></tr></table>\r\n");
               $this->Lin_final = $this->rs_grid->EOF;
               if ($this->Lin_final)
               {
                   $this->rs_grid->Close();
               }
           }
       }
       else
       {
           $nm_saida->saida(" <TR> \r\n");
           $nm_saida->saida("  <td id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . " " . $this->css_scGridFieldOdd . "\" align=\"center\" style=\"vertical-align: top;font-family:" . $this->Ini->texto_fonte_tipo_impar . ";font-size:12px;color:#000000;\">\r\n");
           if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['force_toolbar']))
           { 
               $this->force_toolbar = true;
               $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['force_toolbar'] = true;
           } 
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
           { 
               $_SESSION['hticnsdata']['saida_html'] = "";
           } 
           $nm_saida->saida("  " . $this->nm_grid_sem_reg . "\r\n");
           if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
           { 
               $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['hticnsdata']['saida_html']));
               $_SESSION['hticnsdata']['saida_html'] = "";
           } 
           $nm_saida->saida("  </td></tr>\r\n");
       }
       return;
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       $nm_saida->saida("<table id=\"apl_grid_ProjetoItens#?#$nm_seq_execucoes\" width=\"100%\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\">\r\n");
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = "";
   } 
   else 
   { 
       $nm_saida->saida(" <TR> \r\n");
       $nm_id_aplicacao = " id=\"apl_grid_ProjetoItens#?#1\"";
   } 
   $nm_saida->saida("  <TD id=\"sc_grid_body\" class=\"" . $this->css_scGridTabelaTd . "\" style=\"vertical-align: top;text-align: center;\" width=\"100%\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
   { 
       $_SESSION['hticnsdata']['saida_html'] = "";
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_psq'])
   { 
       $nm_saida->saida("        <div id=\"div_FBtn_Run\" style=\"display: none\"> \r\n");
       $nm_saida->saida("        <form name=\"Fpesq\" method=post>\r\n");
       $nm_saida->saida("         <input type=hidden name=\"nm_ret_psq\"> \r\n");
       $nm_saida->saida("        </div> \r\n");
   } 
   $nm_saida->saida("   <TABLE class=\"" . $this->css_scGridTabela . "\" id=\"sc-ui-grid-body-aa756cfd\" align=\"center\" " . $nm_id_aplicacao . " width=\"100%\">\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'])
   { 
       $_SESSION['hticnsdata']['saida_html'] = "";
   } 
// 
   $nm_quant_linhas = 0 ;
   $nm_inicio_pag = 0;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf")
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] = 0;
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] == "sc_free_total")
   {
       $NM_prim_qb = true;
   }
   $this->nmgp_prim_pag_pdf = true;
   $this->Ini->cor_link_dados = $this->css_scGridFieldEvenLink;
   $this->NM_flag_antigo = FALSE;
   while (!$this->rs_grid->EOF && $nm_quant_linhas < $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid'] && ($linhas == 0 || $linhas > $this->Lin_impressas)) 
   {  
          $this->Rows_span = 1;
          $this->NM_field_style = array();
          //---------- Gauge ----------
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" && -1 < $this->progress_grid)
          {
              $this->progress_now++;
              if (0 == $this->progress_lim_now)
              {
               $lang_protect = $this->Ini->Nm_lang['lang_pdff_rows'];
               if (!NM_is_utf8($lang_protect))
               {
                   $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['hticnsdata']['charset']);
               }
                  fwrite($this->progress_fp, $this->progress_now . "_#NM#_" . $lang_protect . " " . $this->progress_now . "...\n");
              }
              $this->progress_lim_now++;
              if ($this->progress_lim_tot == $this->progress_lim_now)
              {
                  $this->progress_lim_now = 0;
              }
          }
          $this->Lin_impressas++;
          $this->tb_itens_id_item = $this->rs_grid->fields[0] ;  
          $this->nom_item = $this->rs_grid->fields[1] ;  
          $this->nom_descricao = $this->rs_grid->fields[2] ;  
          $this->SC_seq_page++; 
          $this->SC_seq_register = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'] + 1; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['rows_emb']++;
          $this->sc_proc_grid = true;
          $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               $ID_Item = $this->tb_itens_id_item ; 
sc_include_library('sys', 'functions', 'functions.php');
$sql = "SELECT a.Num_Status as Num_Status, a.Observacoes as Observacoes, b.Code as Code FROM tb_projetoitensanalise a INNER JOIN tb_itens b ON b.ID_Item = a.ID_Projetoitens WHERE a.ID_Projetoitens = '$this->tb_itens_id_item' AND a.ID_Projeto = '$this->sc_temp_id_Projeto'";
 
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
if (isset($this->rs [0])) {
	$this->observacoes  = $this->rs [0]["Observacoes"];
	if ($this->rs [0]["Num_Status"] == "S") {
		$this->num_status  = '<span class="glyphicon glyphicon-ok" aria-hidden="true" style="color: #08b500;font-size: 20px;"></span>'; 
	} else {
		$this->num_status  = '<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color: #d40606;font-size: 20px;"></span>';
	}
} else {
	$this->num_status  = '<span class="glyphicon glyphicon-remove" aria-hidden="true" style="color: #d40606;font-size: 20px;"></span>';
}
$isOK =$this->analiticsItem($this->sc_temp_id_Projeto, $this->rs [0]["Code"]);
$this->editar  = '<span class="glyphicon glyphicon-edit" aria-hidden="true" style="font-size: 20px;'.($isOK ? "color: green" : "").'"></span>';
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
          if (($nm_houve_quebra == "S" || $nm_inicio_pag == 0) && !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'])
          { 
              $this->label_grid($linhas);
              $nm_houve_quebra = "N";
          } 
          $nm_inicio_pag++;
          if (!$this->NM_flag_antigo)
          {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']++ ; 
          }
          $seq_det =  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final']; 
          $this->Ini->cor_link_dados = ($this->Ini->cor_link_dados == $this->css_scGridFieldOddLink) ? $this->css_scGridFieldEvenLink : $this->css_scGridFieldOddLink; 
          $this->Ini->qual_linha   = ($this->Ini->qual_linha == "par") ? "impar" : "par";
          if ("impar" == $this->Ini->qual_linha)
          {
              $this->css_line_back = $this->css_scGridFieldOdd;
              $this->css_line_fonf = $this->css_scGridFieldOddFont;
          }
          else
          {
              $this->css_line_back = $this->css_scGridFieldEven;
              $this->css_line_fonf = $this->css_scGridFieldEvenFont;
          }
          $NM_destaque = " onmouseover=\"over_tr(this, '" . $this->css_line_back . "');\" onmouseout=\"out_tr(this, '" . $this->css_line_back . "');\" onclick=\"click_tr(this, '" . $this->css_line_back . "');\"";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'])
          {
             $NM_destaque ="";
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_psq'])
          {
              $temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['dado_psq_ret'];
              eval("\$teste = \$this->$temp;");
          }
          $this->SC_ancora = $this->SC_seq_page;
          $nm_saida->saida("    <TR  class=\"" . $this->css_line_back . "\"" . $NM_destaque . " id=\"SC_ancor" . $this->SC_ancora . "\">\r\n");
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_scGridBlockBg . "\" style=\"width: " . $this->width_tabula_quebra . "; display:" . $this->width_tabula_display . ";\"  style=\"" . $this->Css_Cmp['css_editar_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"  >&nbsp;</TD>\r\n");
 if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_psq']){ 
          $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . "\"  style=\"" . $this->Css_Cmp['css_editar_grid_line'] . "\" NOWRAP align=\"left\" valign=\"top\" WIDTH=\"1px\" >\r\n");
 $Cod_Btn = nmButtonOutput($this->arr_buttons, "bcapture", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "document.Fpesq.nm_ret_psq.value='" . $teste . "'; nm_escreve_window();", "", "Rad_psq", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida(" $Cod_Btn</TD>\r\n");
 } 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'] as $Cada_col)
          { 
              $NM_func_grid = "NM_grid_" . $Cada_col;
              $this->$NM_func_grid();
          } 
          $nm_saida->saida("</TR>\r\n");
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'] && $this->nm_prim_linha)
          { 
              $nm_saida->saida("##NM@@"); 
              $this->nm_prim_linha = false; 
          } 
          $this->rs_grid->MoveNext();
          $this->sc_proc_grid = false;
          $nm_quant_linhas++ ;
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" || isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['paginacao']))
          { 
              $nm_quant_linhas = 0; 
          } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
      $this->Lin_final = $this->rs_grid->EOF;
      if ($this->Lin_final)
      {
         $this->rs_grid->Close();
      }
   } 
   else
   {
      $this->rs_grid->Close();
   }
   if ($this->rs_grid->EOF)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['final'];
   }
   if (!$this->rs_grid->EOF) 
   { 
       if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
       {
           $nm_saida->saida("    </TBODY>");
       }
   } 
   if ($this->rs_grid->EOF) 
   { 
  
       if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['exibe_total'] == "S")
       { 
           $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] . "_top";
           $this->$Gb_geral() ;
       } 
   }  
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'])
   {
       $nm_saida->saida("X##NM@@X");
   }
   $nm_saida->saida("</TABLE>");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_psq'])
   { 
          $nm_saida->saida("       </form>\r\n");
   } 
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
   { 
       $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_body', 'value' => NM_charset_to_utf8($_SESSION['hticnsdata']['saida_html']));
       $_SESSION['hticnsdata']['saida_html'] = "";
   } 
   $nm_saida->saida("</TD>");
   $nm_saida->saida($fecha_tr);
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'])
   { 
       return; 
   } 
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       $_SESSION['hticnsdata']['contr_link_emb'] = "";   
   } 
           $nm_saida->saida("    </TR>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   {
       $nm_saida->saida("</TABLE>\r\n");
   }
   if ($this->Print_All) 
   { 
       $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']       = "igual" ; 
   } 
 }
 function NM_grid_tb_itens_id_item()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['tb_itens_id_item']) || $this->NM_cmp_hidden['tb_itens_id_item'] != "off") { 
          $conteudo = NM_encode_input(sc_strip_script($this->tb_itens_id_item)); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_tb_itens_id_item_grid_line . "\"  style=\"" . $this->Css_Cmp['css_tb_itens_id_item_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_tb_itens_id_item_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nom_item()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nom_item']) || $this->NM_cmp_hidden['nom_item'] != "off") { 
          $conteudo = sc_strip_script($this->nom_item); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_nom_item($conteudo , $this->tb_itens_id_item, $_SESSION['language']) ; 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nom_item_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nom_item_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nom_item_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_nom_descricao()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['nom_descricao']) || $this->NM_cmp_hidden['nom_descricao'] != "off") { 
          $conteudo = sc_strip_script($this->nom_descricao); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
          $this->Lookup->lookup_nom_descricao($conteudo , $this->tb_itens_id_item, $_SESSION['language']) ; 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_nom_descricao_grid_line . "\"  style=\"" . $this->Css_Cmp['css_nom_descricao_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_nom_descricao_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_observacoes()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['observacoes']) || $this->NM_cmp_hidden['observacoes'] != "off") { 
          $conteudo = sc_strip_script($this->observacoes); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_observacoes_grid_line . "\"  style=\"" . $this->Css_Cmp['css_observacoes_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_observacoes_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_num_status()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['num_status']) || $this->NM_cmp_hidden['num_status'] != "off") { 
          $conteudo = sc_strip_script($this->num_status); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_num_status_grid_line . "\"  style=\"" . $this->Css_Cmp['css_num_status_grid_line'] . "\"  align=\"\" valign=\"\"   HEIGHT=\"0px\"><span id=\"id_sc_field_num_status_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_grid_editar()
 {
      global $nm_saida;
      if (!isset($this->NM_cmp_hidden['editar']) || $this->NM_cmp_hidden['editar'] != "off") { 
          $conteudo = sc_strip_script($this->editar); 
          if ($conteudo === "") 
          { 
              $conteudo = "&nbsp;" ;  
              $graf = "" ;  
          } 
   $nm_saida->saida("     <TD rowspan=\"" . $this->Rows_span . "\" class=\"" . $this->css_line_fonf . $this->css_sep . $this->css_editar_grid_line . "\"  style=\"" . $this->Css_Cmp['css_editar_grid_line'] . "\" NOWRAP align=\"\" valign=\"\"  ><span id=\"id_sc_field_editar_" . $this->SC_seq_page . "\">" . $conteudo . "</span></TD>\r\n");
      }
 }
 function NM_calc_span()
 {
   $this->NM_colspan  = 7;
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_psq'])
   {
       $this->NM_colspan++;
   }
   foreach ($this->NM_cmp_hidden as $Cmp => $Hidden)
   {
       if ($Hidden == "off")
       {
           $this->NM_colspan--;
       }
   }
 }
 function quebra_geral_sc_free_total_top() 
 {
   global $nm_saida; 
   if (isset($this->NM_tbody_open) && $this->NM_tbody_open)
   {
       $nm_saida->saida("    </TBODY>");
   }
 }
 function quebra_geral_sc_free_total_bot() 
 {
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
   function nmgp_barra_top_normal()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_top\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
      { 
          $_SESSION['hticnsdata']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['voltar'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "voltar", "sc_btn_voltar()", "sc_btn_voltar()", "sc_voltar_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['enviarProjeto'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "enviarProjeto", "sc_btn_enviarProjeto()", "sc_btn_enviarProjeto()", "sc_enviarProjeto_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmeEnviarProjeto'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmeEnviarProjeto", "sc_btn_confirmeEnviarProjeto()", "sc_btn_confirmeEnviarProjeto()", "sc_confirmeEnviarProjeto_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['iniciarAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "iniciarAnalise", "sc_btn_iniciarAnalise()", "sc_btn_iniciarAnalise()", "sc_iniciarAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmeIniciarAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmeIniciarAnalise", "sc_btn_confirmeIniciarAnalise()", "sc_btn_confirmeIniciarAnalise()", "sc_confirmeIniciarAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmePauseAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmePauseAnalise", "sc_btn_confirmePauseAnalise()", "sc_btn_confirmePauseAnalise()", "sc_confirmePauseAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['pauseAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "pauseAnalise", "sc_btn_pauseAnalise()", "sc_btn_pauseAnalise()", "sc_pauseAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmeFimAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmeFimAnalise", "sc_btn_confirmeFimAnalise()", "sc_btn_confirmeFimAnalise()", "sc_confirmeFimAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['fimAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "fimAnalise", "sc_btn_fimAnalise()", "sc_btn_fimAnalise()", "sc_fimAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['cabecalhoDoc'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "cabecalhoDoc", "sc_btn_cabecalhoDoc()", "sc_btn_cabecalhoDoc()", "sc_cabecalhoDoc_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['downloadZip'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "downloadZip", "sc_btn_downloadZip()", "sc_btn_downloadZip()", "sc_downloadZip_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['tempoDecorrido'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "tempoDecorrido", "sc_btn_tempoDecorrido()", "sc_btn_tempoDecorrido()", "sc_tempoDecorrido_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_modal'])
      {
            $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "document.F5.action='$nm_url_saida'; document.F5.submit()", "document.F5.action='$nm_url_saida'; document.F5.submit()", "sai_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
            $nm_saida->saida("           $Cod_Btn \r\n");
            $NM_btn = true;
      }
          if (is_file("grid_ProjetoItens_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_ProjetoItens_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['hticnsdata']['saida_html']));
          $_SESSION['hticnsdata']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top_mobile()
   {
      global 
             $nm_saida, $nm_url_saida, $nm_apl_dependente;
      $NM_btn = false;
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      <form id=\"id_F0_top\" name=\"F0_top\" method=\"post\" action=\"./\" target=\"_self\"> \r\n");
      $nm_saida->saida("      <input type=\"text\" id=\"id_sc_truta_f0_top\" name=\"sc_truta_f0_top\" value=\"\"/> \r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"script_init_f0_top\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
      $nm_saida->saida("      <input type=hidden id=\"script_session_f0_top\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"/>\r\n");
      $nm_saida->saida("      <input type=\"hidden\" id=\"opcao_f0_top\" name=\"nmgp_opcao\" value=\"muda_qt_linhas\"/> \r\n");
      $nm_saida->saida("      </td></tr><tr>\r\n");
      $nm_saida->saida("       <td id=\"sc_grid_toobar_top\"  class=\"" . $this->css_scGridTabelaTd . "\" valign=\"top\"> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
      { 
          $_SESSION['hticnsdata']['saida_html'] = "";
      } 
      $nm_saida->saida("        <table class=\"" . $this->css_scGridToolbar . "\" style=\"padding: 0px; border-spacing: 0px; border-width: 0px; vertical-align: top;\" width=\"100%\" valign=\"top\">\r\n");
      $nm_saida->saida("         <tr> \r\n");
      $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"left\" width=\"33%\"> \r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['voltar'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "voltar", "sc_btn_voltar()", "sc_btn_voltar()", "sc_voltar_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"center\" width=\"33%\"> \r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['enviarProjeto'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "enviarProjeto", "sc_btn_enviarProjeto()", "sc_btn_enviarProjeto()", "sc_enviarProjeto_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmeEnviarProjeto'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmeEnviarProjeto", "sc_btn_confirmeEnviarProjeto()", "sc_btn_confirmeEnviarProjeto()", "sc_confirmeEnviarProjeto_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['iniciarAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "iniciarAnalise", "sc_btn_iniciarAnalise()", "sc_btn_iniciarAnalise()", "sc_iniciarAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmeIniciarAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmeIniciarAnalise", "sc_btn_confirmeIniciarAnalise()", "sc_btn_confirmeIniciarAnalise()", "sc_confirmeIniciarAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmePauseAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmePauseAnalise", "sc_btn_confirmePauseAnalise()", "sc_btn_confirmePauseAnalise()", "sc_confirmePauseAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['pauseAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "pauseAnalise", "sc_btn_pauseAnalise()", "sc_btn_pauseAnalise()", "sc_pauseAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['confirmeFimAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "confirmeFimAnalise", "sc_btn_confirmeFimAnalise()", "sc_btn_confirmeFimAnalise()", "sc_confirmeFimAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['fimAnalise'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "fimAnalise", "sc_btn_fimAnalise()", "sc_btn_fimAnalise()", "sc_fimAnalise_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['cabecalhoDoc'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "cabecalhoDoc", "sc_btn_cabecalhoDoc()", "sc_btn_cabecalhoDoc()", "sc_cabecalhoDoc_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['downloadZip'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "downloadZip", "sc_btn_downloadZip()", "sc_btn_downloadZip()", "sc_downloadZip_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          $nm_saida->saida("         </td> \r\n");
          $nm_saida->saida("          <td class=\"" . $this->css_scGridToolbarPadd . "\" nowrap valign=\"middle\" align=\"right\" width=\"33%\"> \r\n");
      if (!$this->Ini->SC_Link_View && $this->nmgp_botoes['tempoDecorrido'] == "on" && !$this->grid_emb_form) 
      { 
          $Cod_Btn = nmButtonOutput($this->arr_buttons, "tempoDecorrido", "sc_btn_tempoDecorrido()", "sc_btn_tempoDecorrido()", "sc_tempoDecorrido_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $nm_saida->saida("          $Cod_Btn \r\n");
          $NM_btn = true;
      } 
          if (is_file("grid_ProjetoItens_help.txt") && !$this->grid_emb_form)
          {
             $Arq_WebHelp = file("grid_ProjetoItens_help.txt"); 
             if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
             {
                 $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
                 $Tmp = explode(";", $Arq_WebHelp[0]); 
                 foreach ($Tmp as $Cada_help)
                 {
                     $Tmp1 = explode(":", $Cada_help); 
                     if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "cons" && is_file($this->Ini->root . $this->Ini->path_help . $Tmp1[1]))
                     {
                        $Cod_Btn = nmButtonOutput($this->arr_buttons, "bhelp", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "nm_open_popup('" . $this->Ini->path_help . $Tmp1[1] . "')", "help_top", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
                        $nm_saida->saida("           $Cod_Btn \r\n");
                        $NM_btn = true;
                     }
                 }
             }
          }
      $nm_saida->saida("         </td> \r\n");
      $nm_saida->saida("        </tr> \r\n");
      $nm_saida->saida("       </table> \r\n");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
      { 
          $this->Ini->Arr_result['setValue'][] = array('field' => 'sc_grid_toobar_top', 'value' => NM_charset_to_utf8($_SESSION['hticnsdata']['saida_html']));
          $_SESSION['hticnsdata']['saida_html'] = "";
      } 
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      $nm_saida->saida("      <tr style=\"display: none\">\r\n");
      $nm_saida->saida("      <td> \r\n");
      $nm_saida->saida("     </form> \r\n");
      $nm_saida->saida("      </td> \r\n");
      $nm_saida->saida("     </tr> \r\n");
      if (!$NM_btn && isset($NM_ult_sep))
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
          { 
              $this->Ini->Arr_result['setDisplay'][] = array('field' => $NM_ult_sep, 'value' => 'none');
          } 
          $nm_saida->saida("     <script language=\"javascript\">\r\n");
          $nm_saida->saida("        document.getElementById('" . $NM_ult_sep . "').style.display='none';\r\n");
          $nm_saida->saida("     </script>\r\n");
      }
   }
   function nmgp_barra_top()
   {
       if(isset($_SESSION['hticnsdata']['proc_mobile']) && $_SESSION['hticnsdata']['proc_mobile'])
       {
           $this->nmgp_barra_top_mobile();
       }
       else
       {
           $this->nmgp_barra_top_normal();
       }
   }
   function nmgp_barra_bot()
   {
       if(isset($_SESSION['hticnsdata']['proc_mobile']) && $_SESSION['hticnsdata']['proc_mobile'])
       {
       }
       else
       {
       }
   }
   function nmgp_embbed_placeholder_top()
   {
      global $nm_saida;
      $nm_saida->saida("     <tr id=\"sc_id_save_grid_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_groupby_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_sel_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
      $nm_saida->saida("     <tr id=\"sc_id_order_campos_placeholder_top\" style=\"display: none\">\r\n");
      $nm_saida->saida("      <td>\r\n");
      $nm_saida->saida("      </td>\r\n");
      $nm_saida->saida("     </tr>\r\n");
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
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens'][substr($val, 1, -1)];
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
           if ((isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_form_full']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_form_full']) || (isset($this->grid_emb_form_full) && $this->grid_emb_form_full))
           {
              $this->redir_modal = "$(function() { parent.tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
           else
           {
              $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
           }
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['iframe_print'] )
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
 function check_btns()
 {
 }
 function nm_fim_grid($flag_apaga_pdf_log = TRUE)
 {
   global
   $nm_saida, $nm_url_saida, $NMSC_modal;
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']))
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css']);
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['SC_sub_css_bw']);
   }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
        return;
   } 
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   </div>\r\n");
   $nm_saida->saida("   </TR>\r\n");
   $nm_saida->saida("   </TD>\r\n");
   $nm_saida->saida("   </TABLE>\r\n");
   $nm_saida->saida("   <div id=\"sc-id-fixedheaders-placeholder\" style=\"display: none; position: fixed; top: 0\"></div>\r\n");
   $nm_saida->saida("   </body>\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf" || $this->Print_All)
   { 
   $nm_saida->saida("   </HTML>\r\n");
        return;
   } 
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("   NM_ancor_ult_lig = '';\r\n");
   if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
   { 
       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree']))
       {
           $temp = array();
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               $temp[] = $NM_aplic;
           }
           $temp = array_unique($temp);
           foreach ($temp as $NM_aplic)
           {
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
               { 
                   $this->Ini->Arr_result['setArr'][] = array('var' => ' NM_tab_' . $NM_aplic, 'value' => '');
               } 
               $nm_saida->saida("   NM_tab_" . $NM_aplic . " = new Array();\r\n");
           }
           foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['NM_arr_tree'] as $NM_aplic => $resto)
           {
               foreach ($resto as $NM_ind => $NM_quebra)
               {
                   foreach ($NM_quebra as $NM_nivel => $NM_tipo)
                   {
                       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
                       { 
                           $this->Ini->Arr_result['setVar'][] = array('var' => ' NM_tab_' . $NM_aplic . '[' . $NM_ind . ']', 'value' => $NM_tipo . $NM_nivel);
                       } 
                       $nm_saida->saida("   NM_tab_" . $NM_aplic . "[" . $NM_ind . "] = '" . $NM_tipo . $NM_nivel . "';\r\n");
                   }
               }
           }
       }
   }
   $nm_saida->saida("   function NM_liga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = parseInt (Obj[tbody].substr(3));\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = parseInt (Obj[ind].substr(3));\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if (Nivel == Nv && Tp == 'top')\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if (((Nivel + 1) == Nv && Tp == 'top') || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='';\r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function NM_apaga_tbody(tbody, Obj, Apl)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      Nivel = Obj[tbody].substr(3);\r\n");
   $nm_saida->saida("      for (ind = tbody + 1; ind < Obj.length; ind++)\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("           Nv = Obj[ind].substr(3);\r\n");
   $nm_saida->saida("           Tp = Obj[ind].substr(0, 3);\r\n");
   $nm_saida->saida("           if ((Nivel == Nv && Tp == 'top') || Nv < Nivel)\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               break;\r\n");
   $nm_saida->saida("           }\r\n");
   $nm_saida->saida("           if ((Nivel != Nv) || (Nivel == Nv && Tp == 'bot'))\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("               document.getElementById('tbody_' + Apl + '_' + ind + '_' + Tp).style.display='none';\r\n");
   $nm_saida->saida("               if (Tp == 'top')\r\n");
   $nm_saida->saida("               {\r\n");
   $nm_saida->saida("                   document.getElementById('b_open_' + Apl + '_' + ind).style.display='';\r\n");
   $nm_saida->saida("                   document.getElementById('b_close_' + Apl + '_' + ind).style.display='none';\r\n");
   $nm_saida->saida("               } \r\n");
   $nm_saida->saida("           } \r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   NM_obj_ant = '';\r\n");
   $nm_saida->saida("   function NM_apaga_div_lig(obj_nome)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("      if (NM_obj_ant != '')\r\n");
   $nm_saida->saida("      {\r\n");
   $nm_saida->saida("          NM_obj_ant.style.display='none';\r\n");
   $nm_saida->saida("      }\r\n");
   $nm_saida->saida("      obj = document.getElementById(obj_nome);\r\n");
   $nm_saida->saida("      NM_obj_ant = obj;\r\n");
   $nm_saida->saida("      ind_time = setTimeout(\"obj.style.display='none'\", 300);\r\n");
   $nm_saida->saida("      return ind_time;\r\n");
   $nm_saida->saida("   }\r\n");
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   if (@is_file($str_pbfile) && $flag_apaga_pdf_log)
   {
      @unlink($str_pbfile);
   }
   if ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && !$_SESSION['hticnsdata']['proc_mobile'])
   { 
   } 
   elseif ($this->Rec_ini == 0 && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && $_SESSION['hticnsdata']['proc_mobile'])
   { 
   } 
   $nm_saida->saida("  $(window).scroll(function() {\r\n");
   $nm_saida->saida("   scSetFixedHeaders();\r\n");
   $nm_saida->saida("  }).resize(function() {\r\n");
   $nm_saida->saida("   scSetFixedHeaders();\r\n");
   $nm_saida->saida("  });\r\n");
   if ($this->rs_grid->EOF && empty($this->nm_grid_sem_reg) && !$this->Print_All && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf")
   {
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['nav']) && !$_SESSION['hticnsdata']['proc_mobile'])
       { 
       } 
       elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "pdf" && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga']['nav']) && $_SESSION['hticnsdata']['proc_mobile'])
       { 
       } 
       $nm_saida->saida("   nm_gp_fim = \"fim\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "fim");
           $this->Ini->Arr_result['scrollEOF'] = true;
       }
   }
   else
   {
       $nm_saida->saida("   nm_gp_fim = \"\";\r\n");
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_fim', 'value' => "");
       }
   }
   if (isset($this->redir_modal) && !empty($this->redir_modal))
   {
       echo $this->redir_modal;
   }
   $nm_saida->saida("   </script>\r\n");
   if ($this->grid_emb_form || $this->grid_emb_form_full)
   {
       $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('grid_ProjetoItens', $(document).innerHeight());\r\n");
       $nm_saida->saida("   </script>\r\n");
   }
   $nm_saida->saida("   </HTML>\r\n");
 }
//--- 
//--- 
 function form_navegacao()
 {
   global
   $nm_saida, $nm_url_saida;
   $str_pbfile = $this->Ini->root . $this->Ini->path_imag_temp . '/sc_pb_' . session_id() . '.tmp';
   $nm_saida->saida("   <form name=\"F3\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_chave\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_ordem\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"SC_lig_apl_orig\" value=\"grid_ProjetoItens\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parm_acum\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_quant_linhas\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_url_saida\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_tipo_pdf\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_outra_jan\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_orig_pesq\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F4\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"rec\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"rec\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nm_call_php\" value=\"\"/>\r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F5\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"grid_ProjetoItens_pesq.class.php\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("   <form name=\"F6\" method=\"post\" \r\n");
   $nm_saida->saida("                     action=\"./\" \r\n");
   $nm_saida->saida("                     target=\"_self\" style=\"display: none\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"/> \r\n");
   $nm_saida->saida("   </form> \r\n");
   $nm_saida->saida("  <form name=\"Fdoc_word\" method=\"post\" \r\n");
   $nm_saida->saida("        action=\"./\" \r\n");
   $nm_saida->saida("        target=\"_self\"> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_opcao\" value=\"doc_word\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_cor_word\" value=\"AM\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_navegator_print\" value=\"\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_init\" value=\"" . NM_encode_input($this->Ini->sc_page) . "\"/> \r\n");
   $nm_saida->saida("    <input type=\"hidden\" name=\"hti_cnsdata_session\" value=\"" . NM_encode_input(session_id()) . "\"> \r\n");
   $nm_saida->saida("  </form> \r\n");
   $nm_saida->saida("   <script type=\"text/javascript\">\r\n");
   $nm_saida->saida("    document.Fdoc_word.nmgp_navegator_print.value = navigator.appName;\r\n");
   $nm_saida->saida("   function nm_gp_word_conf(cor)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       document.Fdoc_word.nmgp_cor_word.value = cor;\r\n");
   $nm_saida->saida("       document.Fdoc_word.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var obj_tr      = \"\";\r\n");
   $nm_saida->saida("   var css_tr      = \"\";\r\n");
   $nm_saida->saida("   var field_over  = " . $this->NM_field_over . ";\r\n");
   $nm_saida->saida("   var field_click = " . $this->NM_field_click . ";\r\n");
   $nm_saida->saida("   function over_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldOver . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function out_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_over != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj.className = class_obj;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function click_tr(obj, class_obj)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (field_click != 1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (obj_tr != \"\")\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr.className = css_tr;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       if (obj_tr == obj)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           obj_tr     = '';\r\n");
   $nm_saida->saida("           return;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       obj_tr        = obj;\r\n");
   $nm_saida->saida("       css_tr        = class_obj;\r\n");
   $nm_saida->saida("       obj.className = '" . $this->css_scGridFieldClick . "';\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var Crtl_btn_voltar = false;\r\n");
   $nm_saida->saida("   function sc_btn_voltar()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_voltar) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_voltar = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"voltar\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   var Crtl_btn_enviarProjeto = false;\r\n");
   $nm_saida->saida("   function sc_btn_enviarProjeto()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_enviarProjeto) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_enviarProjeto = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"enviarProjeto\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_confirmeEnviarProjeto() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       sModal('show', \r\n");
   $nm_saida->saida("	   '', `\r\n");
   $nm_saida->saida("	   	" . $this->Ini->Nm_lang['lang_label_projetoitens1'] . "\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-success\" style=\"margin-top:20px\" onclick=\"sc_btn_enviarProjeto()\">" . $this->Ini->Nm_lang['lang_label_yes'] . "</button>\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-danger\" style=\"margin-top:20px\" onclick=\"close_sModal()\">" . $this->Ini->Nm_lang['lang_label_no'] . "</button>\r\n");
   $nm_saida->saida("	   `, {}\r\n");
   $nm_saida->saida(");\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var Crtl_btn_iniciarAnalise = false;\r\n");
   $nm_saida->saida("   function sc_btn_iniciarAnalise()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_iniciarAnalise) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_iniciarAnalise = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"iniciarAnalise\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_confirmeIniciarAnalise() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       sModal('show', \r\n");
   $nm_saida->saida("	   '', `\r\n");
   $nm_saida->saida("	   	" . $this->Ini->Nm_lang['lang_label_projetoitens4'] . "\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-success\" style=\"margin-top:20px\" onclick=\"sc_btn_iniciarAnalise()\">" . $this->Ini->Nm_lang['lang_label_yes'] . "</button>\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-danger\" style=\"margin-top:20px\" onclick=\"sModal('close')\">" . $this->Ini->Nm_lang['lang_label_no'] . "</button>\r\n");
   $nm_saida->saida("	   `, {}\r\n");
   $nm_saida->saida(");\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function sc_btn_confirmePauseAnalise() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       sModal('show', \r\n");
   $nm_saida->saida("	   '', `\r\n");
   $nm_saida->saida("	   	" . $this->Ini->Nm_lang['lang_label_projetoitens5'] . "\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-success\" style=\"margin-top:20px\" onclick=\"sc_btn_pauseAnalise()\">" . $this->Ini->Nm_lang['lang_label_yes'] . "</button>\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-danger\" style=\"margin-top:20px\" onclick=\"sModal('close')\">" . $this->Ini->Nm_lang['lang_label_no'] . "</button>\r\n");
   $nm_saida->saida("	   `, {}\r\n");
   $nm_saida->saida(");\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var Crtl_btn_pauseAnalise = false;\r\n");
   $nm_saida->saida("   function sc_btn_pauseAnalise()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_pauseAnalise) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_pauseAnalise = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"pauseAnalise\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_confirmeFimAnalise() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       sModal('show', \r\n");
   $nm_saida->saida("	   '', `\r\n");
   $nm_saida->saida("	   	" . $this->Ini->Nm_lang['lang_label_projetoitens6'] . "\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-success\" style=\"margin-top:20px\" onclick=\"sc_btn_fimAnalise()\">" . $this->Ini->Nm_lang['lang_label_yes'] . "</button>\r\n");
   $nm_saida->saida("	   <button class=\"btn btn-danger\" style=\"margin-top:20px\" onclick=\"sModal('close')\">" . $this->Ini->Nm_lang['lang_label_no'] . "</button>\r\n");
   $nm_saida->saida("	   `, {}\r\n");
   $nm_saida->saida(");\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var Crtl_btn_fimAnalise = false;\r\n");
   $nm_saida->saida("   function sc_btn_fimAnalise()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_fimAnalise) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_fimAnalise = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"fimAnalise\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_tempoDecorrido() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   var Crtl_btn_cabecalhoDoc = false;\r\n");
   $nm_saida->saida("   function sc_btn_cabecalhoDoc()\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       if (Crtl_btn_cabecalhoDoc) {return;}\r\n");
   $nm_saida->saida("       document.F4.target = \"_self\";\r\n");
   $nm_saida->saida("       Crtl_btn_cabecalhoDoc = true;\r\n");
   $nm_saida->saida("       document.F4.rec.value = \"\";\r\n");
   $nm_saida->saida("       document.F4.nm_call_php.value = \"cabecalhoDoc\";\r\n");
   $nm_saida->saida("       document.F4.nmgp_opcao.value = \"formphp\" ;\r\n");
   $nm_saida->saida("       document.F4.submit() ;\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function sc_btn_downloadZip() \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       downloadAvaibled();\r\n");
   $nm_saida->saida("   } \r\n");
   if ($this->Rec_ini == 0)
   {
       $nm_saida->saida("   nm_gp_ini = \"ini\";\r\n");
   }
   else
   {
       $nm_saida->saida("   nm_gp_ini = \"\";\r\n");
   }
   $nm_saida->saida("   nm_gp_rec_ini = \"" . $this->Rec_ini . "\";\r\n");
   $nm_saida->saida("   nm_gp_rec_fim = \"" . $this->Rec_fim . "\";\r\n");
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
   {
       if ($this->Rec_ini == 0)
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "ini");
       }
       else
       {
           $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_ini', 'value' => "");
       }
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_ini', 'value' => $this->Rec_ini);
       $this->Ini->Arr_result['setVar'][] = array('var' => 'nm_gp_rec_fim', 'value' => $this->Rec_fim);
   }
   $nm_saida->saida("   function nm_gp_submit_rec(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (nm_gp_ini == \"ini\" && (campo == \"ini\" || campo == nm_gp_rec_ini)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      if (nm_gp_fim == \"fim\" && (campo == \"fim\" || campo == nm_gp_rec_fim)) \r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("          return; \r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"rec\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit_ajax(opc, parm) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      ajax_navigate(opc, parm); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit2(campo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      nm_gp_submit_ajax(\"ordem\", campo); \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_submit3(parms, parm_acum, opc, ancor) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F3.target               = \"_self\"; \r\n");
   $nm_saida->saida("      document.F3.nmgp_parms.value     = parms ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_parm_acum.value = parm_acum ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_opcao.value     = opc ;\r\n");
   $nm_saida->saida("      document.F3.nmgp_url_saida.value = \"\";\r\n");
   $nm_saida->saida("      document.F3.action               = \"./\"  ;\r\n");
   $nm_saida->saida("      if (ancor != null) {\r\n");
   $nm_saida->saida("         ajax_save_ancor(\"F3\", ancor);\r\n");
   $nm_saida->saida("      } else {\r\n");
   $nm_saida->saida("          document.F3.submit() ;\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_submit_modal(parms, t_parent) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      if (t_parent == 'S' && typeof parent.tb_show == 'function')\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("           parent.tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("      else\r\n");
   $nm_saida->saida("      { \r\n");
   $nm_saida->saida("         tb_show('', parms, '');\r\n");
   $nm_saida->saida("      } \r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_move(tipo) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("      document.F6.target = \"_self\"; \r\n");
   $nm_saida->saida("      document.F6.submit() ;\r\n");
   $nm_saida->saida("      return;\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   function nm_gp_move(x, y, z, p, g, crt) \r\n");
   $nm_saida->saida("   { \r\n");
   $nm_saida->saida("       document.F3.action           = \"./\"  ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_parms.value = \"SC_null\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_orig_pesq.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_url_saida.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.nmgp_opcao.value = x; \r\n");
   $nm_saida->saida("       document.F3.nmgp_outra_jan.value = \"\" ;\r\n");
   $nm_saida->saida("       document.F3.target = \"_self\"; \r\n");
   $nm_saida->saida("       if (y == 1) \r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.target = \"_blank\"; \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (\"busca\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           document.F3.nmgp_orig_pesq.value = z; \r\n");
   $nm_saida->saida("           z = '';\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       if (z != null && z != '') \r\n");
   $nm_saida->saida("       { \r\n");
   $nm_saida->saida("           document.F3.nmgp_tipo_pdf.value = z; \r\n");
   $nm_saida->saida("       } \r\n");
   $nm_saida->saida("       if (\"xls\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   if (!extension_loaded("zip"))
   {
       $nm_saida->saida("           alert (\"" . html_entity_decode($this->Ini->Nm_lang['lang_othr_prod_xtzp'], ENT_COMPAT, $_SESSION['hticnsdata']['charset']) . "\");\r\n");
       $nm_saida->saida("           return false;\r\n");
   } 
   $nm_saida->saida("       }\r\n");
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['grid_ProjetoItens_iframe_params'] = array(
       'str_tmp'    => $this->Ini->path_imag_temp,
       'str_prod'   => $this->Ini->path_prod,
       'str_btn'    => $this->Ini->Str_btn_css,
       'str_lang'   => $this->Ini->str_lang,
       'str_schema' => $this->Ini->str_schema_all,
   );
   $prep_parm_pdf = "scsess?#?" . session_id() . "?@?str_tmp?#?" . $this->Ini->path_imag_temp . "?@?str_prod?#?" . $this->Ini->path_prod . "?@?str_btn?#?" . $this->Ini->Str_btn_css . "?@?str_lang?#?" . $this->Ini->str_lang . "?@?str_schema?#?"  . $this->Ini->str_schema_all . "?@?hti_cnsdata_init?#?" . $this->Ini->sc_page . "?@?hti_cnsdata_session?#?" . session_id() . "?@?pbfile?#?" . $str_pbfile . "?@?jspath?#?" . $this->Ini->path_js . "?@?sc_apbgcol?#?" . $this->Ini->path_css . "?#?";
   $Md5_pdf    = "@SC_par@" . NM_encode_input($this->Ini->sc_page) . "@SC_par@grid_ProjetoItens@SC_par@" . md5($prep_parm_pdf);
   $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['Md5_pdf'][md5($prep_parm_pdf)] = $prep_parm_pdf;
   $nm_saida->saida("       if (\"pdf\" == x)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           window.location = \"" . $this->Ini->path_link . "grid_ProjetoItens/grid_ProjetoItens_iframe.php?nmgp_parms=" . $Md5_pdf . "&sc_tp_pdf=\" + z + \"&sc_parms_pdf=\" + p + \"&sc_create_charts=\" + crt + \"&sc_graf_pdf=\" + g;\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       else\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("           if ((x == 'igual' || x == 'edit') && NM_ancor_ult_lig != \"\")\r\n");
   $nm_saida->saida("           {\r\n");
   $nm_saida->saida("                ajax_save_ancor(\"F3\", NM_ancor_ult_lig);\r\n");
   $nm_saida->saida("                NM_ancor_ult_lig = \"\";\r\n");
   $nm_saida->saida("            } else {\r\n");
   $nm_saida->saida("                document.F3.submit() ;\r\n");
   $nm_saida->saida("            } \r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("   } \r\n");
   $nm_saida->saida("   nm_img = new Image();\r\n");
   $nm_saida->saida("   function nm_mostra_img(imagem, altura, largura)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       tb_show(\"\", imagem, \"\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_mostra_doc(campo1, campo2, campo3, campo4)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"&\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"&\" , \"**Ecom**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"#\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"#\" , \"**Jvel**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       while (campo2.lastIndexOf(\"+\") != -1)\r\n");
   $nm_saida->saida("       {\r\n");
   $nm_saida->saida("          campo2 = campo2.replace(\"+\" , \"**Plus**\");\r\n");
   $nm_saida->saida("       }\r\n");
   $nm_saida->saida("       NovaJanela = window.open (campo4 + \"?hti_cnsdata_init=" . NM_encode_input($this->Ini->sc_page) . "&hti_cnsdata_session=" . session_id() . "&nm_cod_doc=\" + campo1 + \"&nm_nome_doc=\" + campo2 + \"&nm_cod_apl=\" + campo3, \"htiCnsdata\", \"resizable\");\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_escreve_window()\r\n");
   $nm_saida->saida("   {\r\n");
   if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['form_psq_ret']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret']) )
   {
      $nm_saida->saida("      if (document.Fpesq.nm_ret_psq.value != \"\")\r\n");
      $nm_saida->saida("      {\r\n");
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_modal'])
      {
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['iframe_ret_cap']))
         {
             $Iframe_cap = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['iframe_ret_cap'];
             unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_ret_cap']);
             $nm_saida->saida("           var Obj_Form = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("           var Obj_Doc = parent.document.getElementById('" . $Iframe_cap . "').contentWindow;\r\n");
             $nm_saida->saida("           if (parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("           {\r\n");
             $nm_saida->saida("               var Obj_Readonly = parent.document.getElementById('" . $Iframe_cap . "').contentWindow.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("           }\r\n");
         }
         else
         {
             $nm_saida->saida("          var Obj_Form = parent.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . ";\r\n");
             $nm_saida->saida("          var Obj_Doc = parent;\r\n");
             $nm_saida->saida("          if (parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . "\"))\r\n");
             $nm_saida->saida("          {\r\n");
             $nm_saida->saida("              var Obj_Readonly = parent.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . "\");\r\n");
             $nm_saida->saida("          }\r\n");
         }
      }
      else
      {
          $nm_saida->saida("          var Obj_Form = opener.document." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['form_psq_ret'] . "." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . ";\r\n");
          $nm_saida->saida("          var Obj_Doc = opener;\r\n");
          $nm_saida->saida("          if (opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . "\"))\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = opener.document.getElementById(\"id_read_on_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['campo_psq_ret'] . "\");\r\n");
          $nm_saida->saida("          }\r\n");
      }
          $nm_saida->saida("          else\r\n");
          $nm_saida->saida("          {\r\n");
          $nm_saida->saida("              var Obj_Readonly = null;\r\n");
          $nm_saida->saida("          }\r\n");
      $nm_saida->saida("          if (Obj_Form.value != document.Fpesq.nm_ret_psq.value)\r\n");
      $nm_saida->saida("          {\r\n");
      $nm_saida->saida("              Obj_Form.value = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              if (null != Obj_Readonly)\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Readonly.innerHTML = document.Fpesq.nm_ret_psq.value;\r\n");
      $nm_saida->saida("              }\r\n");
     if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['js_apos_busca']))
     {
      $nm_saida->saida("              if (Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['js_apos_busca'] . ")\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Doc." . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['js_apos_busca'] . "();\r\n");
      $nm_saida->saida("              }\r\n");
      $nm_saida->saida("              else if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
     else
     {
      $nm_saida->saida("              if (Obj_Form.onchange && Obj_Form.onchange != '')\r\n");
      $nm_saida->saida("              {\r\n");
      $nm_saida->saida("                  Obj_Form.onchange();\r\n");
      $nm_saida->saida("              }\r\n");
     }
      $nm_saida->saida("          }\r\n");
      $nm_saida->saida("      }\r\n");
   }
   $nm_saida->saida("      document.F5.action = \"grid_ProjetoItens_fim.php\";\r\n");
   $nm_saida->saida("      document.F5.submit();\r\n");
   $nm_saida->saida("   }\r\n");
   $nm_saida->saida("   function nm_open_popup(parms)\r\n");
   $nm_saida->saida("   {\r\n");
   $nm_saida->saida("       NovaJanela = window.open (parms, '', 'resizable, scrollbars');\r\n");
   $nm_saida->saida("   }\r\n");
   if (($this->grid_emb_form || $this->grid_emb_form_full) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['reg_start']))
   {
       $nm_saida->saida("      parent.scAjaxDetailStatus('grid_ProjetoItens');\r\n");
       $nm_saida->saida("      parent.scAjaxDetailHeight('grid_ProjetoItens', $(document).innerHeight());\r\n");
   }
   $nm_saida->saida("   </script>\r\n");
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
