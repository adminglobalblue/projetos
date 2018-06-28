<?php
//
class ctl_sae_etapa1_bkp_mob_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'         => '',
                                'param'          => array(),
                                'autoComp'       => '',
                                'rsSize'         => '',
                                'msgDisplay'     => '',
                                'errList'        => array(),
                                'fldList'        => array(),
                                'focus'          => '',
                                'navStatus'      => array(),
                                'redir'          => array(),
                                'blockDisplay'   => array(),
                                'fieldDisplay'   => array(),
                                'fieldLabel'     => array(),
                                'readOnly'       => array(),
                                'btnVars'        => array(),
                                'ajaxAlert'      => '',
                                'ajaxMessage'    => '',
                                'ajaxJavascript' => array(),
                                'buttonDisplay'  => array(),
                                'calendarReload' => false,
                                'quickSearchRes' => false,
                                'displayMsg'     => false,
                                'displayMsgTxt'  => '',
                                'dyn_search'     => array(),
                                'empty_filter'   => '',
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id_tiposae;
   var $id_tiposae_1;
   var $id_empreendimento;
   var $descsae;
   var $antenainst;
   var $antenainst_1;
   var $emergencial;
   var $emergencial_1;
   var $optantegbtec;
   var $optantegbtec_1;
   var $linkprojeto;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $hti_cnsdata_init, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['antenainst']))
          {
              $this->antenainst = $this->NM_ajax_info['param']['antenainst'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['descsae']))
          {
              $this->descsae = $this->NM_ajax_info['param']['descsae'];
          }
          if (isset($this->NM_ajax_info['param']['emergencial']))
          {
              $this->emergencial = $this->NM_ajax_info['param']['emergencial'];
          }
          if (isset($this->NM_ajax_info['param']['id_empreendimento']))
          {
              $this->id_empreendimento = $this->NM_ajax_info['param']['id_empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['id_tiposae']))
          {
              $this->id_tiposae = $this->NM_ajax_info['param']['id_tiposae'];
          }
          if (isset($this->NM_ajax_info['param']['linkprojeto']))
          {
              $this->linkprojeto = $this->NM_ajax_info['param']['linkprojeto'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['optantegbtec']))
          {
              $this->optantegbtec = $this->NM_ajax_info['param']['optantegbtec'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($this->projetos_sqlFilterGrid) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlFilterGrid;
      }
      if (isset($_POST["projetos_sqlFilterGrid"]) && isset($this->projetos_sqlFilterGrid)) 
      {
          $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlFilterGrid;
      }
      if (!isset($_POST["projetos_sqlFilterGrid"]) && isset($_POST["projetos_sqlfiltergrid"])) 
      {
          $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlfiltergrid;
      }
      if (isset($_GET["projetos_sqlFilterGrid"]) && isset($this->projetos_sqlFilterGrid)) 
      {
          $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlFilterGrid;
      }
      if (!isset($_GET["projetos_sqlFilterGrid"]) && isset($_GET["projetos_sqlfiltergrid"])) 
      {
          $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlfiltergrid;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_ctl_sae_etapa1_bkp_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->projetos_sqlFilterGrid) && isset($this->projetos_sqlfiltergrid)) 
          {
              $this->projetos_sqlFilterGrid = $this->projetos_sqlfiltergrid;
          }
          if (isset($this->projetos_sqlFilterGrid)) 
          {
              $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlFilterGrid;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->projetos_sqlFilterGrid) && isset($this->projetos_sqlfiltergrid)) 
          {
              $this->projetos_sqlFilterGrid = $this->projetos_sqlfiltergrid;
          }
          if (isset($this->projetos_sqlFilterGrid)) 
          {
              $_SESSION['projetos_sqlFilterGrid'] = $this->projetos_sqlFilterGrid;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new ctl_sae_etapa1_bkp_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['initialize'];
          if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp']))
          {
              foreach ($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['ctl_sae_etapa1_bkp_mob']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['ctl_sae_etapa1_bkp_mob']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['ctl_sae_etapa1_bkp_mob'];
          }
          elseif (isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']]))
          {
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['ctl_sae_etapa1_bkp_mob']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['ctl_sae_etapa1_bkp_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('ctl_sae_etapa1_bkp_mob') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['ctl_sae_etapa1_bkp_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "ctl_sae_etapa1_bkp_mob")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->nm_new_label['id_tiposae'] = '' . $this->Ini->Nm_lang['lang_label_dashb_table4'] . '';
      $this->nm_new_label['id_empreendimento'] = '' . $this->Ini->Nm_lang['lang_menu_enterprise'] . '';
      $this->nm_new_label['descsae'] = '' . $this->Ini->Nm_lang['lang_label_description'] . '';
      $this->nm_new_label['antenainst'] = '' . $this->Ini->Nm_lang['lang_label_antennainstallation'] . '';
      $this->nm_new_label['emergencial'] = '' . $this->Ini->Nm_lang['lang_label_emergencyMaintenance'] . '';
      $this->nm_new_label['optantegbtec'] = '' . $this->Ini->Nm_lang['lang_label_checkboxGBtech'] . '';
      $this->nm_new_label['linkprojeto'] = '' . $this->Ini->Nm_lang['lang_label_referenceProject'] . '';

      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "hticnsdata__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "hticnsdata__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['voltar']['hint']             = "";
      $this->arr_buttons['voltar']['type']             = "button";
      $this->arr_buttons['voltar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltar']['display']          = "only_text";
      $this->arr_buttons['voltar']['display_position'] = "text_right";
      $this->arr_buttons['voltar']['style']            = "default";
      $this->arr_buttons['voltar']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['ctl_sae_etapa1_bkp_mob']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['ctl_sae_etapa1_bkp_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['ok'] = "on";
      $this->nmgp_botoes['facebook'] = "off";
      $this->nmgp_botoes['google'] = "off";
      $this->nmgp_botoes['twitter'] = "off";
      $this->nmgp_botoes['paypal'] = "off";
      $this->nmgp_botoes['voltar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['ctl_sae_etapa1_bkp_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['ctl_sae_etapa1_bkp_mob'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['ctl_sae_etapa1_bkp_mob'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("ctl_sae_etapa1_bkp_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
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
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['hticnsdata']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 

      if (is_file($this->Ini->path_aplicacao . 'ctl_sae_etapa1_bkp_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'ctl_sae_etapa1_bkp_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('contr:' == substr($str_link_webhelp, 0, 6))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'ctl_sae_etapa1_bkp/ctl_sae_etapa1_bkp_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "ctl_sae_etapa1_bkp_mob_erro.class.php"); 
      }
      $this->Erro      = new ctl_sae_etapa1_bkp_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['ctl_sae_etapa1_bkp_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['botoes']['voltar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "descsae")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->id_tiposae = $array_vars[0];
              $id_tiposae       = $this->id_tiposae;
              $this->id_tiposae       = $id_tiposae;
              $this->lookup_descsae($conteudo);
              $conteudo = str_replace("&", "&amp;", $conteudo); 
              $conteudo = str_replace("\/" , "\/", $conteudo); 
              echo "<html><head></head>";
              echo " <body onload=\"p=document.layers?parentLayer:window.parent;p.jsrsLoaded('" . $GLOBALS['C'] . "');\">";
              echo "  jsrsPayload:";
              echo "  <br>";
              echo "  <form name=\"jsrs_Form\"><textarea name=\"jsrs_Payload\">";
              echo "$conteudo";
              echo " </textarea></form></body></html>";
          } 
          $this->NM_close_db(); 
          exit;
      } 
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "voltar")
          { 
              $this->sc_btn_voltar();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;


      $this->ini_controle();

      if ('' != $_SESSION['hticnsdata']['change_regional_old'])
      {
          $_SESSION['hticnsdata']['str_conf_reg'] = $_SESSION['hticnsdata']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['hticnsdata']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['hticnsdata']['str_conf_reg'] = $_SESSION['hticnsdata']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['hticnsdata']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['hticnsdata']['change_regional_old'] = '';
          $_SESSION['hticnsdata']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_id_tiposae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_tiposae');
          }
          if ('validate_id_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empreendimento');
          }
          if ('validate_descsae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descsae');
          }
          if ('validate_antenainst' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'antenainst');
          }
          if ('validate_emergencial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emergencial');
          }
          if ('validate_optantegbtec' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'optantegbtec');
          }
          if ('validate_linkprojeto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'linkprojeto');
          }
          ctl_sae_etapa1_bkp_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_id_tiposae_onchange' == $this->NM_ajax_opcao)
          {
              $this->ID_TipoSAE_onChange();
          }
          ctl_sae_etapa1_bkp_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_id_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->id_empreendimento = ($_SESSION['hticnsdata']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['hticnsdata']['charset'], 'UTF-8')) : $_GET['term'];
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento'] = array(); 
    }
   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento FROM tb_empreendimentos WHERE (Num_Ativo = 'S') AND Nom_Empreendimento LIKE '%" . substr($this->Db->qstr($this->id_empreendimento), 1, -1) . "%' ORDER BY Nom_Empreendimento";
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          if ('autocomp_linkprojeto' == $this->NM_ajax_opcao)
          {
              $this->linkprojeto = ($_SESSION['hticnsdata']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['hticnsdata']['charset'], 'UTF-8')) : $_GET['term'];
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto'] = array(); 
    }
   $nm_comando = "SELECT ID_projeto,
    ProtocoloHex FROM tb_projetos WHERE (" . $_SESSION['projetos_sqlFilterGrid'] . ") AND ProtocoloHex LIKE '%" . substr($this->Db->qstr($this->linkprojeto), 1, -1) . "%' ORDER BY Data_Criacao DESC";
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $AjaxLim = 0;
              $aResponse = array();
              foreach ($aLookup as $sLkpIndex => $aLkpList)
              {
                  $AjaxLim++;
                  if ($AjaxLim > 10)
                  {
                      break;
                  }
                  foreach ($aLkpList as $sLkpIndex => $sLkpValue)
                  {
                      $sLkpIndex = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpIndex);
                      $sLkpValue = str_replace(array("\r", "\n"), array('', '<br />'), $sLkpValue);
                      $aResponse[] = array('label' => $sLkpValue, 'value' => $sLkpIndex);
                  }
              }
              $oJson = new Services_JSON();
              echo $oJson->encode($aResponse);
              exit;
          }
          ctl_sae_etapa1_bkp_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->antenainst))
          {
              $x = 0; 
              $this->antenainst_1 = $this->antenainst;
              $this->antenainst = ""; 
              if ($this->antenainst_1 != "") 
              { 
                  foreach ($this->antenainst_1 as $dados_antenainst_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->antenainst .= ";";
                      } 
                      $this->antenainst .= $dados_antenainst_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->emergencial))
          {
              $x = 0; 
              $this->emergencial_1 = $this->emergencial;
              $this->emergencial = ""; 
              if ($this->emergencial_1 != "") 
              { 
                  foreach ($this->emergencial_1 as $dados_emergencial_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->emergencial .= ";";
                      } 
                      $this->emergencial .= $dados_emergencial_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->optantegbtec))
          {
              $x = 0; 
              $this->optantegbtec_1 = $this->optantegbtec;
              $this->optantegbtec = ""; 
              if ($this->optantegbtec_1 != "") 
              { 
                  foreach ($this->optantegbtec_1 as $dados_optantegbtec_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->optantegbtec .= ";";
                      } 
                      $this->optantegbtec .= $dados_optantegbtec_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              ctl_sae_etapa1_bkp_mob_pack_ajax_response();
              exit;
          }
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  ctl_sae_etapa1_bkp_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  ctl_sae_etapa1_bkp_mob_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
//
      if (!isset($nm_form_submit) && $this->nmgp_opcao != "nada")
      {
          $this->id_tiposae = "" ;  
          $this->id_empreendimento = "" ;  
          $this->descsae = "" ;  
          $this->antenainst = "" ;  
          $this->emergencial = "" ;  
          $this->optantegbtec = "" ;  
          $this->linkprojeto = "" ;  
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form'] as $NM_campo => $NM_valor)
              {
                  $$NM_campo = $NM_valor;
              }
          }
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "" || $campos_erro != "" || !isset($this->bok) || $this->bok != "OK" || $this->nmgp_opcao == "recarga")
      {
          if ($Campos_Crit == "" && empty($Campos_Falta) && $this->Campos_Mens_erro == "" && !isset($this->bok) && $this->nmgp_opcao != "recarga")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos']))
              { 
                  $id_tiposae = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][0]; 
                  $id_empreendimento = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][1]; 
                  $descsae = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][2]; 
                  $antenainst = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][3]; 
                  $emergencial = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][4]; 
                  $optantegbtec = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][5]; 
                  $linkprojeto = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][6]; 
              } 
          }
          $this->nm_gera_html();
          $this->NM_close_db(); 
      }
      elseif (isset($this->bok) && $this->bok == "OK")
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'] = array(); 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][0] = $this->id_tiposae; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][1] = $this->id_empreendimento; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][2] = $this->descsae; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][3] = $this->antenainst; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][4] = $this->emergencial; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][5] = $this->optantegbtec; 
          $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['campos'][6] = $this->linkprojeto; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['redir'] == "redir")
          {
              $this->nmgp_redireciona(); 
          }
          else
          {
              $contr_menu = "";
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['iframe_menu'])
              {
                  $contr_menu = "glo_menu";
              }
              if (isset($_SESSION['hticnsdata']['sc_ult_apl_menu']) && in_array("ctl_sae_etapa1_bkp_mob", $_SESSION['hticnsdata']['sc_ult_apl_menu']))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona_form("ctl_sae_etapa1_bkp_mob_fim.php", $this->nm_location, $contr_menu); 
              }
              else
              {
                  $this->nm_gera_html();
                  if (!$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['embutida_proc'])
                  { 
                      $this->NM_close_db(); 
                  } 
              }
          }
          $this->NM_close_db(); 
          if ($this->NM_ajax_flag)
          {
              ctl_sae_etapa1_bkp_mob_pack_ajax_response();
              exit;
          }
      }
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['hticnsdata']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['hticnsdata']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['hticnsdata']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['hticnsdata']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?hti_cnsdata_init=" . $this->sc_init_menu . "&hti_cnsdata_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
//
//--------------------------------------------------------------------------------------
   function lookup_descsae(&$conteudo)
   {
      global  $id_tiposae;
      $this->nm_tira_formatacao();
      $this->formatado = false;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      $nm_comando = "SELECT Desc_SAE 
FROM tb_tipossae 
WHERE ID = '$this->id_tiposae' 
ORDER BY Desc_SAE"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_comando)) 
      {
          $conteudo = (isset($rs->fields[0])) ? $rs->fields[0] : ""; 
          $rs->Close() ; 
      } 
      elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
      {  
          $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0; 
      $this->nm_formatar_campos();
   }
   function sc_btn_voltar() 
   {
        global $nm_url_saida, $teste_validade, 
            $glo_senha_protect, $bok, $nm_apl_dependente, $nm_form_submit, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup, $nmgp_redir;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['hticnsdata']['device_mobile']) && $_SESSION['hticnsdata']['device_mobile'] && $_SESSION['hticnsdata']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" />
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "ctl_sae_etapa1_bkp_mob.php";
      $_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'on';
    if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_sae') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
$_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="linkprojeto" value="<?php echo $this->form_encode_input($this->linkprojeto) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'id_tiposae':
               return "" . $this->Ini->Nm_lang['lang_label_dashb_table4'] . "";
               break;
           case 'id_empreendimento':
               return "" . $this->Ini->Nm_lang['lang_menu_enterprise'] . "";
               break;
           case 'descsae':
               return "" . $this->Ini->Nm_lang['lang_label_description'] . "";
               break;
           case 'antenainst':
               return "" . $this->Ini->Nm_lang['lang_label_antennainstallation'] . "";
               break;
           case 'emergencial':
               return "" . $this->Ini->Nm_lang['lang_label_emergencyMaintenance'] . "";
               break;
           case 'optantegbtec':
               return "" . $this->Ini->Nm_lang['lang_label_checkboxGBtech'] . "";
               break;
           case 'linkprojeto':
               return "" . $this->Ini->Nm_lang['lang_label_referenceProject'] . "";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_ctl_sae_etapa1_bkp_mob']) || !is_array($this->NM_ajax_info['errList']['geral_ctl_sae_etapa1_bkp_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_ctl_sae_etapa1_bkp_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_ctl_sae_etapa1_bkp_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_tiposae' == $filtro)
        $this->ValidateField_id_tiposae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_empreendimento' == $filtro)
        $this->ValidateField_id_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'descsae' == $filtro)
        $this->ValidateField_descsae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'antenainst' == $filtro)
        $this->ValidateField_antenainst($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'emergencial' == $filtro)
        $this->ValidateField_emergencial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'optantegbtec' == $filtro)
        $this->ValidateField_optantegbtec($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'linkprojeto' == $filtro)
        $this->ValidateField_linkprojeto($Campos_Crit, $Campos_Falta, $Campos_Erros);

      if (empty($Campos_Crit) && empty($Campos_Falta))
      {
      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_emergencial = $this->emergencial;
}
if (!isset($this->sc_temp_OptanteGBTec)) {$this->sc_temp_OptanteGBTec = (isset($_SESSION['OptanteGBTec'])) ? $_SESSION['OptanteGBTec'] : "";}
if (!isset($this->sc_temp_linkProjeto)) {$this->sc_temp_linkProjeto = (isset($_SESSION['linkProjeto'])) ? $_SESSION['linkProjeto'] : "";}
if (!isset($this->sc_temp_Num_SAE)) {$this->sc_temp_Num_SAE = (isset($_SESSION['Num_SAE'])) ? $_SESSION['Num_SAE'] : "";}
if (!isset($this->sc_temp_Emergencial)) {$this->sc_temp_Emergencial = (isset($_SESSION['Emergencial'])) ? $_SESSION['Emergencial'] : "";}
if (!isset($this->sc_temp_InstalacaoAntena)) {$this->sc_temp_InstalacaoAntena = (isset($_SESSION['InstalacaoAntena'])) ? $_SESSION['InstalacaoAntena'] : "";}
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
if (!isset($this->sc_temp_ID_TipoSAE)) {$this->sc_temp_ID_TipoSAE = (isset($_SESSION['ID_TipoSAE'])) ? $_SESSION['ID_TipoSAE'] : "";}
   sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$Num_TipoUsuario = $s->get('Num_TipoUsuario');
$Num_TipoUsuario = $Num_TipoUsuario == "GT" ? "G" : $Num_TipoUsuario;
$ID_OPE = $s->get('ID_OPE');
$profile = $s->get('profile');

if ($this->id_tiposae  == '' || $this->id_empreendimento  == '') {
	$s->setMessage( $this->Ini->Nm_lang['lang_msg_alert_SAE1'] .'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>');
	 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctl_sae_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
	return;
}

 
      $nm_select = "SELECT Code_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->tiposae = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tiposae = false;
          $this->tiposae_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->tiposae );
$this->tiposae  = isset($this->tiposae [0]) ? $this->tiposae [0]["Code_SAE"] : false;

if (!$this->tiposae ) {
	$s->setMessage( $this->Ini->Nm_lang['lang_msg_alert_SAE'] .'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>');
	 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctl_sae_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
	return;
}

if (!($this->tiposae  == "manutencao" && 'S' == $this->emergencial )) {
	 
      $nm_select = "SELECT count(*) as count FROM tb_bloqueioempreendimento WHERE ID_OpePre = '$ID_OPE' AND tipo = '$Num_TipoUsuario' AND ID_Empreendimento = '$this->id_empreendimento'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->isblock = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->isblock = false;
          $this->isblock_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->isblock );
	$this->isblock  = isset($this->isblock [0]) ? $this->isblock [0]["count"] : false;
	if ($this->isblock  && $this->isblock  > 0) {
		$s->setMessage( $this->Ini->Nm_lang['lang_msg_alert_SAE2'] .
			'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>
		');
		 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctl_sae_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
		return;
	}
}
if ($Num_TipoUsuario == "O") {
	
	$this->rs = DbQuery($this,"SELECT COUNT(Nom_Tecnico) as Quantidade FROM tb_tecnicos 
WHERE Tipo_Tecnico = 'O' AND ID_OpePre = ".$ID_OPE);

	$this->rs = $this->rs[0]["Quantidade"] ?? null;
	if (!$this->rs) {
		$s->setMessage( $this->Ini->Nm_lang['lang_label_thereIsNoTec'] .'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>
		');
		 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctl_sae_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
		return;
	}
	
	 
      $nm_select = "SELECT count(*) as count FROM tb_inconformidade WHERE ID_Operadora_Tratativa = '$ID_OPE' AND Num_Ativo = 'S'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->hasinconformidade = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->hasinconformidade = false;
          $this->hasinconformidade_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->hasinconformidade );
	$this->hasinconformidade  = isset($this->hasinconformidade [0]) ? $this->hasinconformidade [0]["count"] : false;
	if ($this->hasinconformidade  && $this->hasinconformidade  > 0) {
		$s->setMessage( $this->Ini->Nm_lang['lang_label_tecIssues'] .'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>
		');
		 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctl_sae_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
		return;
	}	
}

$this->antenainst  = $this->antenainst  ? $this->antenainst  : 'N';
$this->emergencial  = $this->emergencial  ? $this->emergencial  : 'N';

$ID_TipoSAE = $this->id_tiposae ;  if (isset($ID_TipoSAE)) {$this->sc_temp_ID_TipoSAE = $ID_TipoSAE;}
;
$ID_Empreendimento = $this->id_empreendimento ;  if (isset($ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = $ID_Empreendimento;}
;
$InstalacaoAntena = $this->antenainst ;  if (isset($InstalacaoAntena)) {$this->sc_temp_InstalacaoAntena = $InstalacaoAntena;}
;
$Emergencial = $this->emergencial ;  if (isset($Emergencial)) {$this->sc_temp_Emergencial = $Emergencial;}
;
$Num_SAE = '';  if (isset($Num_SAE)) {$this->sc_temp_Num_SAE = $Num_SAE;}
;
$linkProjeto = $this->linkprojeto ;  if (isset($linkProjeto)) {$this->sc_temp_linkProjeto = $linkProjeto;}
;

 
      $nm_select = "SELECT Code_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae' ORDER BY Desc_SAE"; 
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
if(isset($this->rs [0]["Code_SAE"])) {
	switch($this->rs [0]["Code_SAE"]) {
		case ("instalacao"):
		$this->optantegbtec  = 'S';
		$this->emergencial  = "N";
		break;
		case ("desinstalacao"):
		$this->optantegbtec  = 'S';
		$this->antenainst  = $this->emergencial  = "N";
		break;
		switch($this->rs[0][1]) {
			case ("vistoria"):
			$this->antenainst  = $this->emergencial  = "N";
			break;
			case ("manutencao"):
			$this->antenainst  = "N";
			break;
			case ("testeFusao"):
			$this->antenainst  = "N";
			break;
		}
	}
} else {
	$this->optantegbtec  = 'S';
}
if ($this->optantegbtec  != 'S') $this->optantegbtec  = 'N';
$OptanteGBTec = $this->optantegbtec ;  if (isset($OptanteGBTec)) {$this->sc_temp_OptanteGBTec = $OptanteGBTec;}
;

$_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['start'] = 'new';
 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadSAE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_emergencial != $this->emergencial || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial)))
    {
        $this->ajax_return_values_emergencial(true);
    }
}
$_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'off'; 
      }
      }
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_id_tiposae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_tiposae) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']) && !in_array($this->id_tiposae, $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_tiposae']))
                   {
                       $Campos_Erros['id_tiposae'] = array();
                   }
                   $Campos_Erros['id_tiposae'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_tiposae']) || !is_array($this->NM_ajax_info['errList']['id_tiposae']))
                   {
                       $this->NM_ajax_info['errList']['id_tiposae'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_tiposae'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_tiposae

    function ValidateField_id_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->id_empreendimento) > 20) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_menu_enterprise'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_empreendimento']))
              {
                  $Campos_Erros['id_empreendimento'] = array();
              }
              $Campos_Erros['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_empreendimento']) || !is_array($this->NM_ajax_info['errList']['id_empreendimento']))
              {
                  $this->NM_ajax_info['errList']['id_empreendimento'] = array();
              }
              $this->NM_ajax_info['errList']['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_id_empreendimento

    function ValidateField_descsae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->descsae) != "")  
          { 
          } 
      } 
    } // ValidateField_descsae

    function ValidateField_antenainst(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->antenainst == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->antenainst))
          {
              $x = 0; 
              $this->antenainst_1 = array(); 
              foreach ($this->antenainst as $ind => $dados_antenainst_1 ) 
              {
                  if ($dados_antenainst_1 != "") 
                  {
                      $this->antenainst_1[] = $dados_antenainst_1;
                  } 
              } 
              $this->antenainst = ""; 
              foreach ($this->antenainst_1 as $dados_antenainst_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->antenainst .= ";";
                   } 
                   $this->antenainst .= $dados_antenainst_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_antenainst

    function ValidateField_emergencial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->emergencial == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->emergencial))
          {
              $x = 0; 
              $this->emergencial_1 = array(); 
              foreach ($this->emergencial as $ind => $dados_emergencial_1 ) 
              {
                  if ($dados_emergencial_1 != "") 
                  {
                      $this->emergencial_1[] = $dados_emergencial_1;
                  } 
              } 
              $this->emergencial = ""; 
              foreach ($this->emergencial_1 as $dados_emergencial_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->emergencial .= ";";
                   } 
                   $this->emergencial .= $dados_emergencial_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_emergencial

    function ValidateField_optantegbtec(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->optantegbtec == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->optantegbtec))
          {
              $x = 0; 
              $this->optantegbtec_1 = array(); 
              foreach ($this->optantegbtec as $ind => $dados_optantegbtec_1 ) 
              {
                  if ($dados_optantegbtec_1 != "") 
                  {
                      $this->optantegbtec_1[] = $dados_optantegbtec_1;
                  } 
              } 
              $this->optantegbtec = ""; 
              foreach ($this->optantegbtec_1 as $dados_optantegbtec_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->optantegbtec .= ";";
                   } 
                   $this->optantegbtec .= $dados_optantegbtec_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_optantegbtec

    function ValidateField_linkprojeto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->linkprojeto) > 20) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_referenceProject'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['linkprojeto']))
              {
                  $Campos_Erros['linkprojeto'] = array();
              }
              $Campos_Erros['linkprojeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['linkprojeto']) || !is_array($this->NM_ajax_info['errList']['linkprojeto']))
              {
                  $this->NM_ajax_info['errList']['linkprojeto'] = array();
              }
              $this->NM_ajax_info['errList']['linkprojeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_linkprojeto

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['id_tiposae'] = $this->id_tiposae;
    $this->nmgp_dados_form['id_empreendimento'] = $this->id_empreendimento;
    $this->nmgp_dados_form['descsae'] = $this->descsae;
    $this->nmgp_dados_form['antenainst'] = $this->antenainst;
    $this->nmgp_dados_form['emergencial'] = $this->emergencial;
    $this->nmgp_dados_form['optantegbtec'] = $this->optantegbtec;
    $this->nmgp_dados_form['linkprojeto'] = $this->linkprojeto;
    $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function ajax_return_values()
   {
          $this->ajax_return_values_id_tiposae();
          $this->ajax_return_values_id_empreendimento();
          $this->ajax_return_values_descsae();
          $this->ajax_return_values_antenainst();
          $this->ajax_return_values_emergencial();
          $this->ajax_return_values_optantegbtec();
          $this->ajax_return_values_linkprojeto();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          }
   } // ajax_return_values

          //----- id_tiposae
   function ajax_return_values_id_tiposae($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_tiposae", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_tiposae);
              $aLookup = array();
              $this->_tmp_lookup_id_tiposae = $this->id_tiposae;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'] = array(); 
}
$aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string('') => ctl_sae_etapa1_bkp_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   $nm_comando = "SELECT ID, Nom_SAE 
FROM tb_tipossae 
ORDER BY Nom_SAE";
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_tiposae\"";
          if (isset($this->NM_ajax_info['select_html']['id_tiposae']) && !empty($this->NM_ajax_info['select_html']['id_tiposae']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_tiposae'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->id_tiposae == $sValue)
                  {
                      $this->_tmp_lookup_id_tiposae = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_tiposae'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_tiposae']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_tiposae']['valList'][$i] = ctl_sae_etapa1_bkp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_tiposae']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_tiposae']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_tiposae']['labList'] = $aLabel;
          }
   }

          //----- id_empreendimento
   function ajax_return_values_id_empreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_empreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_empreendimento);
              $aLookup = array();
              $this->_tmp_lookup_id_empreendimento = $this->id_empreendimento;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento'] = array(); 
    }
   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento FROM tb_empreendimentos WHERE (Num_Ativo = 'S') AND ID_Empreendimento = '" . substr($this->Db->qstr($this->id_empreendimento), 1, -1) . "' ORDER BY Nom_Empreendimento";
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_empreendimento'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_empreendimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_empreendimento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_empreendimento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_empreendimento']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($this->id_empreendimento))]) ? $aLookup[0][ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($this->id_empreendimento))] : "";
          $this->NM_ajax_info['fldList']['id_empreendimento_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- descsae
   function ajax_return_values_descsae($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descsae", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descsae);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descsae'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
              $orig_id_tiposae = $this->id_tiposae;
              $id_tiposae      = $this->id_tiposae;
              $this->id_tiposae = $id_tiposae;
              $this->lookup_descsae($conteudo);
              $this->id_tiposae = $orig_id_tiposae;
              $this->NM_ajax_info['fldList']['descsae']['lookupCons'] = ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($conteudo));
          }
   }

          //----- antenainst
   function ajax_return_values_antenainst($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("antenainst", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->antenainst);
              $aLookup = array();
              $this->_tmp_lookup_antenainst = $this->antenainst;

$aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string('S') => ctl_sae_etapa1_bkp_mob_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_antenainst'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['antenainst']) && !empty($this->NM_ajax_info['select_html']['antenainst']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['antenainst'];
          }
          $this->NM_ajax_info['fldList']['antenainst'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-antenainst',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['antenainst']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['antenainst']['valList'][$i] = ctl_sae_etapa1_bkp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['antenainst']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['antenainst']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['antenainst']['labList'] = $aLabel;
          }
   }

          //----- emergencial
   function ajax_return_values_emergencial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("emergencial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->emergencial);
              $aLookup = array();
              $this->_tmp_lookup_emergencial = $this->emergencial;

$aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string('S') => ctl_sae_etapa1_bkp_mob_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_emergencial'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['emergencial']) && !empty($this->NM_ajax_info['select_html']['emergencial']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['emergencial'];
          }
          $this->NM_ajax_info['fldList']['emergencial'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-emergencial',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['emergencial']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['emergencial']['valList'][$i] = ctl_sae_etapa1_bkp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['emergencial']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['emergencial']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['emergencial']['labList'] = $aLabel;
          }
   }

          //----- optantegbtec
   function ajax_return_values_optantegbtec($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("optantegbtec", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->optantegbtec);
              $aLookup = array();
              $this->_tmp_lookup_optantegbtec = $this->optantegbtec;

$aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string('S') => ctl_sae_etapa1_bkp_mob_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_optantegbtec'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['optantegbtec']) && !empty($this->NM_ajax_info['select_html']['optantegbtec']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['optantegbtec'];
          }
          $this->NM_ajax_info['fldList']['optantegbtec'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-optantegbtec',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['optantegbtec']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['optantegbtec']['valList'][$i] = ctl_sae_etapa1_bkp_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['optantegbtec']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['optantegbtec']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['optantegbtec']['labList'] = $aLabel;
          }
   }

          //----- linkprojeto
   function ajax_return_values_linkprojeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("linkprojeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->linkprojeto);
              $aLookup = array();
              $this->_tmp_lookup_linkprojeto = $this->linkprojeto;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto'] = array(); 
    }
   $nm_comando = "SELECT ID_projeto,
    ProtocoloHex FROM tb_projetos WHERE (" . $_SESSION['projetos_sqlFilterGrid'] . ") AND ID_projeto = '" . substr($this->Db->qstr($this->linkprojeto), 1, -1) . "' ORDER BY Data_Criacao DESC";
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_linkprojeto'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['linkprojeto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['linkprojeto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['linkprojeto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['linkprojeto']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($this->linkprojeto))]) ? $aLookup[0][ctl_sae_etapa1_bkp_mob_pack_protect_string(NM_charset_to_utf8($this->linkprojeto))] : "";
          $this->NM_ajax_info['fldList']['linkprojeto_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
   } // ajax_add_parameters
//
function ID_TipoSAE_onChange($optantegbtec, $descsae, $id_tiposae)
{
$_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'on';
   
$original_id_tiposae = $this->id_tiposae;
$original_antenainst = $this->antenainst;
$original_emergencial = $this->emergencial;
$original_descsae = $this->descsae;
$original_optantegbtec = $this->optantegbtec;
$original_optantegbtec = $this->optantegbtec;
$original_descsae = $this->descsae;
$original_id_tiposae = $this->id_tiposae;

 
      $nm_select = "SELECT Desc_SAE, Code_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae' ORDER BY Desc_SAE"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;
$this->nmgp_cmp_hidden["antenainst"] = "off"; $this->NM_ajax_info['fieldDisplay']['antenainst'] = 'off';
$this->nmgp_cmp_hidden["emergencial"] = "off"; $this->NM_ajax_info['fieldDisplay']['emergencial'] = 'off';
$this->nmgp_cmp_hidden["descsae"] = "off"; $this->NM_ajax_info['fieldDisplay']['descsae'] = 'off';
if(isset($this->rs[0][0])) {
	switch($this->rs[0][1]) {
		case ("instalacao"):
			$this->nmgp_cmp_hidden["antenainst"] = "on"; $this->NM_ajax_info['fieldDisplay']['antenainst'] = 'on';		
			$this->nmgp_cmp_hidden["optantegbtec"] = "off"; $this->NM_ajax_info['fieldDisplay']['optantegbtec'] = 'off';
		break;
		case ("vistoria"):
			$this->nmgp_cmp_hidden["optantegbtec"] = "on"; $this->NM_ajax_info['fieldDisplay']['optantegbtec'] = 'on';
		break;
		case ("manutencao"):
			$this->nmgp_cmp_hidden["emergencial"] = "on"; $this->NM_ajax_info['fieldDisplay']['emergencial'] = 'on';
			$this->nmgp_cmp_hidden["optantegbtec"] = "on"; $this->NM_ajax_info['fieldDisplay']['optantegbtec'] = 'on';
		break;
		case ("testeFusao"):
			$this->nmgp_cmp_hidden["emergencial"] = "on"; $this->NM_ajax_info['fieldDisplay']['emergencial'] = 'on';
			$this->nmgp_cmp_hidden["optantegbtec"] = "on"; $this->NM_ajax_info['fieldDisplay']['optantegbtec'] = 'on';
		break;
		case ("desinstalacao"):
			$this->nmgp_cmp_hidden["optantegbtec"] = "off"; $this->NM_ajax_info['fieldDisplay']['optantegbtec'] = 'off';
		break;
	}
	$this->descsae  = $this->rs[0][0];
	$this->nmgp_cmp_hidden["descsae"] = "on"; $this->NM_ajax_info['fieldDisplay']['descsae'] = 'on';
} else {
	$this->descsae  = '';
}



$modificado_id_tiposae = $this->id_tiposae;
$modificado_antenainst = $this->antenainst;
$modificado_emergencial = $this->emergencial;
$modificado_descsae = $this->descsae;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_descsae = $this->descsae;
$modificado_id_tiposae = $this->id_tiposae;
$this->nm_formatar_campos('id_tiposae', 'antenainst', 'emergencial', 'descsae', 'optantegbtec');
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_antenainst !== $modificado_antenainst || isset($this->nmgp_cmp_readonly['antenainst']) || (isset($bFlagRead_antenainst) && $bFlagRead_antenainst))
{
    $this->ajax_return_values_antenainst(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_descsae !== $modificado_descsae || isset($this->nmgp_cmp_readonly['descsae']) || (isset($bFlagRead_descsae) && $bFlagRead_descsae))
{
    $this->ajax_return_values_descsae(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_descsae !== $modificado_descsae || isset($this->nmgp_cmp_readonly['descsae']) || (isset($bFlagRead_descsae) && $bFlagRead_descsae))
{
    $this->ajax_return_values_descsae(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
ctl_sae_etapa1_bkp_mob_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              ctl_sae_etapa1_bkp_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
      if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && $nm_apl_dependente != 1) 
      { 
          $nm_saida_global = $_SESSION['hticnsdata']['nm_sc_retorno']; 
      } 
    if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
    $_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_emergencial = $this->emergencial;
}
   sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession(true);

?><?php sc_include_library('sys', 'initCustom', 'onLoad.html');?>
	<style>
		#id_lookup_descsae {
			display: none;
		}
	</style>
	<script>
		loadBreadcrumb(['<?=  $this->Ini->Nm_lang['lang_label_breadcrumb_sae']  ?>','<i><?=  $this->Ini->Nm_lang['lang_label_addsae']  ?></i>']);
	</script>
<?php
echo $s->getIUDState($this);
echo $s->getMessage(true);

$this->nmgp_cmp_hidden["antenainst"] = "off"; $this->NM_ajax_info['fieldDisplay']['antenainst'] = 'off';
$this->nmgp_cmp_hidden["descsae"] = "off"; $this->NM_ajax_info['fieldDisplay']['descsae'] = 'off';
$this->nmgp_cmp_hidden["emergencial"] = "off"; $this->NM_ajax_info['fieldDisplay']['emergencial'] = 'off';

$Num_TipoUsuario = $s->get('Num_TipoUsuario');
$ID_OPE = $s->get('ID_OPE');
$profile = $s->get('profile');

if ($profile["PROJETO"]["CONSULTAR"]["v"] == "N" || (isset($funcao["CONSULTAR"]["a"]["notAccess"]) && in_array($Num_TipoUsuario, $funcao["CONSULTAR"]["a"]["notAccess"]))) {
	$this->nmgp_cmp_hidden["linkprojeto"] = "off"; $this->NM_ajax_info['fieldDisplay']['linkprojeto'] = 'off';
}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_emergencial != $this->emergencial || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial)))
    {
        $this->ajax_return_values_emergencial(true);
    }
}
$_SESSION['hticnsdata']['ctl_sae_etapa1_bkp_mob']['contr_erro'] = 'off'; 
    }
    if (!empty($this->Campos_Mens_erro)) 
    {
        $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
    }
    $this->nm_formatar_campos();
    include_once("ctl_sae_etapa1_bkp_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['hticnsdata']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['hticnsdata']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format .= $time_sep;
         }
         else
         {
             $new_date_format .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format;
     if ('DH' == $type)
     {
         $new_date_format                                      = explode(';', $new_date_format);
         $this->field_config[$field]['date_format_js']        = $new_date_format[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_id_tiposae()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'] = array(); 
    }
   $nm_comando = "SELECT ID, Nom_SAE 
FROM tb_tipossae 
ORDER BY Nom_SAE";
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['Lookup_id_tiposae'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_antenainst()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_emergencial()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_optantegbtec()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && $_SESSION['hticnsdata']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['hticnsdata']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "ctl_sae_etapa1_bkp_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "ctl_sae_etapa1_bkp_mob_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['hti_cnsdata_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['hti_cnsdata_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       ctl_sae_etapa1_bkp_mob_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['hticnsdata']['device_mobile']) && $_SESSION['hticnsdata']['device_mobile'] && $_SESSION['hticnsdata']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
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
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['ctl_sae_etapa1_bkp_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           ctl_sae_etapa1_bkp_mob_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['hti_cnsdata_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['hti_cnsdata_session'] = session_id();
       }
       ctl_sae_etapa1_bkp_mob_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?hti_cnsdata_init=" . $this->Ini->sc_page . "&hti_cnsdata_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['hticnsdata']['device_mobile']) && $_SESSION['hticnsdata']['device_mobile'] && $_SESSION['hticnsdata']['display_mobile'])
   {
?>
     <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
   }

?>
    <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
    <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
    <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
    <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
    <META http-equiv="Pragma" content="no-cache"/>
    <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="hti_cnsdata_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="hti_cnsdata_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?hti_cnsdata_init=<?php echo $this->Ini->sc_page; ?>&hti_cnsdata_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
   </BODY>
   </HTML>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
