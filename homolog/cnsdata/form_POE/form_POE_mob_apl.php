<?php
//
class form_POE_mob_apl
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
   var $id;
   var $id_empreendimento;
   var $descricao;
   var $data;
   var $data_hora;
   var $jsonimagemdescricao;
   var $anexos;
   var $savedataonclick;
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
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['anexos']))
          {
              $this->anexos = $this->NM_ajax_info['param']['anexos'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data']))
          {
              $this->data = $this->NM_ajax_info['param']['data'];
          }
          if (isset($this->NM_ajax_info['param']['descricao']))
          {
              $this->descricao = $this->NM_ajax_info['param']['descricao'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['id_empreendimento']))
          {
              $this->id_empreendimento = $this->NM_ajax_info['param']['id_empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['jsonimagemdescricao']))
          {
              $this->jsonimagemdescricao = $this->NM_ajax_info['param']['jsonimagemdescricao'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['ul_info_anexos']))
          {
              $this->ul_info_anexos = $this->NM_ajax_info['param']['ul_info_anexos'];
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
      if (isset($this->ID_Emppoe) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_Emppoe'] = $this->ID_Emppoe;
      }
      if (isset($this->ID_Empreendimento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (isset($_POST["ID_Emppoe"]) && isset($this->ID_Emppoe)) 
      {
          $_SESSION['ID_Emppoe'] = $this->ID_Emppoe;
      }
      if (!isset($_POST["ID_Emppoe"]) && isset($_POST["id_emppoe"])) 
      {
          $_SESSION['ID_Emppoe'] = $this->id_emppoe;
      }
      if (isset($_POST["ID_Empreendimento"]) && isset($this->ID_Empreendimento)) 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (!isset($_POST["ID_Empreendimento"]) && isset($_POST["id_empreendimento"])) 
      {
          $_SESSION['ID_Empreendimento'] = $this->id_empreendimento;
      }
      if (isset($_GET["ID_Emppoe"]) && isset($this->ID_Emppoe)) 
      {
          $_SESSION['ID_Emppoe'] = $this->ID_Emppoe;
      }
      if (!isset($_GET["ID_Emppoe"]) && isset($_GET["id_emppoe"])) 
      {
          $_SESSION['ID_Emppoe'] = $this->id_emppoe;
      }
      if (isset($_GET["ID_Empreendimento"]) && isset($this->ID_Empreendimento)) 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (!isset($_GET["ID_Empreendimento"]) && isset($_GET["id_empreendimento"])) 
      {
          $_SESSION['ID_Empreendimento'] = $this->id_empreendimento;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['embutida_parms']);
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
                 nm_limpa_str_form_POE_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->ID_Emppoe) && isset($this->id_emppoe)) 
          {
              $this->ID_Emppoe = $this->id_emppoe;
          }
          if (isset($this->ID_Emppoe)) 
          {
              $_SESSION['ID_Emppoe'] = $this->ID_Emppoe;
          }
          if (!isset($this->ID_Empreendimento) && isset($this->id_empreendimento)) 
          {
              $this->ID_Empreendimento = $this->id_empreendimento;
          }
          if (isset($this->ID_Empreendimento)) 
          {
              $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->ID_Emppoe) && isset($this->id_emppoe)) 
          {
              $this->ID_Emppoe = $this->id_emppoe;
          }
          if (isset($this->ID_Emppoe)) 
          {
              $_SESSION['ID_Emppoe'] = $this->ID_Emppoe;
          }
          if (!isset($this->ID_Empreendimento) && isset($this->id_empreendimento)) 
          {
              $this->ID_Empreendimento = $this->id_empreendimento;
          }
          if (isset($this->ID_Empreendimento)) 
          {
              $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['parms']);
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

      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->data);
          $this->data      = $aDtParts[0];
          $this->data_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_POE_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['initialize'];
          if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE']))
          {
              foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_POE'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_POE_mob']['upload_field_info']['anexos'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_POE_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'multi',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N0',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_POE_mob']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_POE_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_POE_mob']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_POE_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_POE_mob') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_POE_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tb_inconformidade";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_POE_mob")
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
      $this->nm_new_label['descricao'] = '' . $this->Ini->Nm_lang['lang_label_description'] . '';
      $this->nm_new_label['data'] = '' . $this->Ini->Nm_lang['lang_label_lastupdate'] . '';
      $this->nm_new_label['anexos'] = '' . $this->Ini->Nm_lang['lang_label_attachments'] . '';

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
      $this->Ini->Img_mupload_pending  = "" == trim($str_img_mupload_pending)  ? "" : $str_img_mupload_pending;
      $this->Ini->Img_mupload_finished = "" == trim($str_img_mupload_finished) ? "" : $str_img_mupload_finished;
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "hticnsdata__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "hticnsdata__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['voltar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltar']['type']             = "button";
      $this->arr_buttons['voltar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltar']['display']          = "only_text";
      $this->arr_buttons['voltar']['display_position'] = "text_right";
      $this->arr_buttons['voltar']['style']            = "default";
      $this->arr_buttons['voltar']['image']            = "";

      $this->arr_buttons['salvar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['type']             = "button";
      $this->arr_buttons['salvar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['display']          = "only_text";
      $this->arr_buttons['salvar']['display_position'] = "text_right";
      $this->arr_buttons['salvar']['style']            = "default";
      $this->arr_buttons['salvar']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_POE_mob']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_POE_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['voltar'] = "on";
      $this->nmgp_botoes['salvar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_orig'] = " where ID = '" . $_SESSION['ID_Emppoe'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_pesq'] = " where ID = '" . $_SESSION['ID_Emppoe'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_POE_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_POE_mob'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_POE_mob'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_POE_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_POE_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_POE_mob_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
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
          require_once($this->Ini->path_embutida . 'form_POE/form_POE_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_POE_mob_erro.class.php"); 
      }
      $this->Erro      = new form_POE_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_POE_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltar'] = "on";
          $this->nmgp_botoes['salvar'] = "on";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['botoes']['voltar'];
          $this->nmgp_botoes['salvar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['botoes']['salvar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- id_empreendimento
      $this->field_config['id_empreendimento']               = array();
      $this->field_config['id_empreendimento']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_empreendimento']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_empreendimento']['symbol_dec'] = '';
      $this->field_config['id_empreendimento']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_empreendimento']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- data
      $this->field_config['data']                 = array();
      $this->field_config['data']['date_format']  = "dd/mm/aaaa;hh:ii";
      $this->field_config['data']['date_sep']     = "/";
      $this->field_config['data']['time_sep']     = ":";
      $this->field_config['data']['date_display'] = "dd/mm/aaaa;hh:ii";
      $this->new_date_format('DH', 'data');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


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
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_id_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empreendimento');
          }
          if ('validate_descricao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'descricao');
          }
          if ('validate_data' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data');
          }
          if ('validate_anexos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'anexos');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_jsonimagemdescricao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'jsonimagemdescricao');
          }
          form_POE_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          form_POE_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_select']['anexos']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->anexos = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_select']['anexos'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_POE_mob_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_POE_mob_pack_ajax_response();
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
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_POE_mob_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_POE_mob_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function sc_btn_voltar() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "form_POE_mob.php";
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      nm_limpa_data($this->data, $this->field_config['data']['date_sep']) ; 
      nm_limpa_hora($this->data_hora, $this->field_config['data']['time_sep']) ; 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
      if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_POE') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id" value="<?php echo $this->form_encode_input($this->id) ?>"/>
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
           case 'id':
               return "ID";
               break;
           case 'id_empreendimento':
               return "ID Empreendimento";
               break;
           case 'descricao':
               return "" . $this->Ini->Nm_lang['lang_label_description'] . "";
               break;
           case 'data':
               return "" . $this->Ini->Nm_lang['lang_label_lastupdate'] . "";
               break;
           case 'anexos':
               return "" . $this->Ini->Nm_lang['lang_label_attachments'] . "";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'jsonimagemdescricao':
               return "JSON Imagem Descricao";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_POE_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_POE_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_POE_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_POE_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_empreendimento' == $filtro)
        $this->ValidateField_id_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'descricao' == $filtro)
        $this->ValidateField_descricao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data' == $filtro)
        $this->ValidateField_data($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'anexos' == $filtro)
        $this->ValidateField_anexos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'jsonimagemdescricao' == $filtro)
        $this->ValidateField_jsonimagemdescricao($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
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

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id

    function ValidateField_id_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_empreendimento == "")  
      { 
          $this->id_empreendimento = 0;
          $this->sc_force_zero[] = 'id_empreendimento';
      } 
      nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_empreendimento != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_empreendimento) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID Empreendimento: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_empreendimento']))
                  {
                      $Campos_Erros['id_empreendimento'] = array();
                  }
                  $Campos_Erros['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_empreendimento']) || !is_array($this->NM_ajax_info['errList']['id_empreendimento']))
                  {
                      $this->NM_ajax_info['errList']['id_empreendimento'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_empreendimento, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "ID Empreendimento; " ; 
                  if (!isset($Campos_Erros['id_empreendimento']))
                  {
                      $Campos_Erros['id_empreendimento'] = array();
                  }
                  $Campos_Erros['id_empreendimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_empreendimento']) || !is_array($this->NM_ajax_info['errList']['id_empreendimento']))
                  {
                      $this->NM_ajax_info['errList']['id_empreendimento'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_empreendimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_empreendimento

    function ValidateField_descricao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->descricao) > 32767) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_description'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['descricao']))
              {
                  $Campos_Erros['descricao'] = array();
              }
              $Campos_Erros['descricao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['descricao']) || !is_array($this->NM_ajax_info['errList']['descricao']))
              {
                  $this->NM_ajax_info['errList']['descricao'] = array();
              }
              $this->NM_ajax_info['errList']['descricao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_descricao

    function ValidateField_data(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data, $this->field_config['data']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data']['date_sep']) ; 
          if (trim($this->data) != "")  
          { 
              if ($teste_validade->Data($this->data, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_lastupdate'] . "; " ; 
                  if (!isset($Campos_Erros['data']))
                  {
                      $Campos_Erros['data'] = array();
                  }
                  $Campos_Erros['data'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data']) || !is_array($this->NM_ajax_info['errList']['data']))
                  {
                      $this->NM_ajax_info['errList']['data'] = array();
                  }
                  $this->NM_ajax_info['errList']['data'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->data_hora, $this->field_config['data_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['data_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['data_hora']['time_sep']) ; 
          if (trim($this->data_hora) != "")  
          { 
              if ($teste_validade->Hora($this->data_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_lastupdate'] . "; " ; 
                  if (!isset($Campos_Erros['data_hora']))
                  {
                      $Campos_Erros['data_hora'] = array();
                  }
                  $Campos_Erros['data_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data']) || !is_array($this->NM_ajax_info['errList']['data']))
                  {
                      $this->NM_ajax_info['errList']['data'] = array();
                  }
                  $this->NM_ajax_info['errList']['data'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['data']) && isset($Campos_Erros['data_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['data'], $Campos_Erros['data_hora']);
          if (empty($Campos_Erros['data_hora']))
          {
              unset($Campos_Erros['data_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['data']))
          {
              $this->NM_ajax_info['errList']['data'] = array_unique($this->NM_ajax_info['errList']['data']);
          }
      }
    } // ValidateField_data_hora

    function ValidateField_anexos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $bMU_addingFiles = false;
        $bMU_hasFiles    = false;
        if ($this->nmgp_opcao != "excluir")
        {
          if ('' != trim($this->ul_info_anexos))
          {
              $aUlList = explode('@scl@', $this->ul_info_anexos);
              foreach ($aUlList as $sUlItem)
              {
                  $aUlInfo = explode('@sci@', $sUlItem);
                  if ('add' == $aUlInfo[0] && !$teste_validade->ArqExtensao($aUlInfo[1], array()))
                  {
                      $Campos_Crit .= "{lang_label_attachments}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                      if (!isset($Campos_Erros['anexos']))
                      {
                          $Campos_Erros['anexos'] = array();
                      }
                      $Campos_Erros['anexos'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                      if (!isset($this->NM_ajax_info['errList']['anexos']) || !is_array($this->NM_ajax_info['errList']['anexos']))
                      {
                          $this->NM_ajax_info['errList']['anexos'] = array();
                      }
                      $this->NM_ajax_info['errList']['anexos'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                  }
                  if ('add' == $aUlInfo[0])
                  {
                      $bMU_addingFiles = true;
                  }
              }
          }
          $bMU_hasFiles = false;
          if ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "excluir")
          {
              $old_value_id = $this->id;
              $old_value_id_empreendimento = $this->id_empreendimento;
              $old_value_data = $this->data;
              $old_value_data_hora = $this->data_hora;
              $this->nm_tira_formatacao();
              $this->nm_converte_datas(null, true);
              $comando_multiul = "SELECT COUNT(*) FROM tb_filesemppoe WHERE ID_Emppoe = " . $this->id . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->id = $old_value_id;
              $this->id_empreendimento = $old_value_id_empreendimento;
              $this->data = $old_value_data;
              $this->data_hora = $old_value_data_hora;
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_POE_mob_pack_ajax_response();
                  }
                  exit;
              }
              $bMU_hasFiles = $rs_mu->fields[0] > 0;
              $rs_mu->Close();
          }
        }
    } // ValidateField_anexos

    function ValidateField_savedataonclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->savedataonclick) > 20) 
          { 
              $Campos_Crit .= "saveDataOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['savedataonclick']))
              {
                  $Campos_Erros['savedataonclick'] = array();
              }
              $Campos_Erros['savedataonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['savedataonclick']) || !is_array($this->NM_ajax_info['errList']['savedataonclick']))
              {
                  $this->NM_ajax_info['errList']['savedataonclick'] = array();
              }
              $this->NM_ajax_info['errList']['savedataonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_savedataonclick

    function ValidateField_jsonimagemdescricao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->jsonimagemdescricao) > 32767) 
          { 
              $Campos_Crit .= "JSON Imagem Descricao " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['jsonimagemdescricao']))
              {
                  $Campos_Erros['jsonimagemdescricao'] = array();
              }
              $Campos_Erros['jsonimagemdescricao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['jsonimagemdescricao']) || !is_array($this->NM_ajax_info['errList']['jsonimagemdescricao']))
              {
                  $this->NM_ajax_info['errList']['jsonimagemdescricao'] = array();
              }
              $this->NM_ajax_info['errList']['jsonimagemdescricao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_jsonimagemdescricao

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
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['id_empreendimento'] = $this->id_empreendimento;
    $this->nmgp_dados_form['descricao'] = $this->descricao;
    $this->nmgp_dados_form['data'] = $this->data;
    $this->nmgp_dados_form['anexos'] = $this->anexos;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['jsonimagemdescricao'] = $this->jsonimagemdescricao;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      nm_limpa_data($this->data, $this->field_config['data']['date_sep']) ; 
      nm_limpa_hora($this->data_hora, $this->field_config['data']['time_sep']) ; 
   }
   function nm_tira_formatacao_id($Val_in)
   {
      nm_limpa_numero($Val_in, $this->field_config['id']['symbol_grp']) ; 
      return $Val_in;
   }
   function nm_tira_formatacao_id_empreendimento($Val_in)
   {
      nm_limpa_numero($Val_in, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      return $Val_in;
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
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_empreendimento")
      {
          nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if (!empty($this->id) || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
      if (!empty($this->id_empreendimento) || (!empty($format_fields) && isset($format_fields['id_empreendimento'])))
      {
          nmgp_Form_Num_Val($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp'], $this->field_config['id_empreendimento']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_empreendimento']['symbol_fmt']) ; 
      }
      if ((!empty($this->data) && 'null' != $this->data) || (!empty($format_fields) && isset($format_fields['data'])))
      {
          $nm_separa_data = strpos($this->field_config['data']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['data']['date_format'];
          $this->field_config['data']['date_format'] = substr($this->field_config['data']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->data, " ") ; 
          $this->data_hora = substr($this->data, $separador + 1) ; 
          $this->data = substr($this->data, 0, $separador) ; 
          nm_volta_data($this->data, $this->field_config['data']['date_format']) ; 
          nmgp_Form_Datas($this->data, $this->field_config['data']['date_format'], $this->field_config['data']['date_sep']) ;  
          $this->field_config['data']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->data_hora, $this->field_config['data']['date_format']) ; 
          nmgp_Form_Hora($this->data_hora, $this->field_config['data']['date_format'], $this->field_config['data']['time_sep']) ;  
          $this->field_config['data']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->data || '' == $this->data)
      {
          $this->data_hora = '';
          $this->data = '';
      }
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
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['data']['date_format'];
      if ($this->data != "")  
      { 
          $nm_separa_data = strpos($this->field_config['data']['date_format'], ";") ;
          $this->field_config['data']['date_format'] = substr($this->field_config['data']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->data, $this->field_config['data']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->data = str_replace('-', '', $this->data);
          }
          $this->field_config['data']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->data_hora, $this->field_config['data']['date_format']) ; 
          if ($this->data_hora == "" )  
          { 
              $this->data_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->data_hora = substr($this->data_hora, 0, -4) . "." . substr($this->data_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_hora = substr($this->data_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_hora = substr($this->data_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_hora = substr($this->data_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_hora = substr($this->data_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_hora = substr($this->data_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->data_hora = substr($this->data_hora, 0, -4);
          }
          if ($this->data != "")  
          { 
              $this->data .= " " . $this->data_hora ; 
          }
      } 
      if ($this->data == "" && $use_null)  
      { 
          $this->data = "null" ; 
      } 
      $this->field_config['data']['date_format'] = $guarda_format_hora;
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

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_id();
          $this->ajax_return_values_id_empreendimento();
          $this->ajax_return_values_descricao();
          $this->ajax_return_values_data();
          $this->ajax_return_values_anexos();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_jsonimagemdescricao();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_POE_mob_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_empreendimento
   function ajax_return_values_id_empreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_empreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_empreendimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_empreendimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- descricao
   function ajax_return_values_descricao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("descricao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->descricao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['descricao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- data
   function ajax_return_values_data($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->data . ' ' . $this->data_hora),
              );
          }
   }

          //----- anexos
   function ajax_return_values_anexos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("anexos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->anexos);
              $aLookup = array();
              $this->nm_tira_formatacao();
              $this->nm_converte_datas(null, true);
              $comando_multiul = "SELECT ID, File_Name FROM tb_filesemppoe WHERE ID_Emppoe = " . $this->id . " ORDER BY ID ASC";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->nm_formatar_campos();
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_POE_mob_pack_ajax_response();
                  }
                  exit;
              }
              $muHtml      = '';
              $muHtmlArray = array();
              $muItemCount = 1;
              while (!$rs_mu->EOF)
              {
                  $muKey      = $rs_mu->fields[0];
                  $muData     = $rs_mu->fields[1];
                  $muLink     = '';
                  $muLabel    = '';
                  $muExtension = pathinfo($muData, PATHINFO_EXTENSION);
                  $muExtension = null == $muExtension ? '' : '.' . $muExtension;
                  $muFile      = 'sc_anexos_' . md5(mt_rand(1, 1000) . microtime() . session_id());
                  $muFileTN    = $muFile . '_tn' . $muExtension;
                  $muFile      = $muFile . $muExtension;
                  if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE']['download_filenames']))
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE']['download_filenames'] = array();
                  }
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE']['download_filenames'][$muFile] = $muData;
                  $muSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                  $muDirOrig = $this->Ini->root . $this->Ini->path_imagens . $muSubDir . '/';
                  if (!@is_dir($muDirOrig))
                  {
                      @mkdir($muDirOrig);
                  }
                  @copy($muDirOrig . $muData, $this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFile);
                  $muImgPrev = $muFile;
                  $sc_obj_img = new nm_trata_img($this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFile);
                  $muHeight   = $sc_obj_img->getHeight();
                  $muWidth    = $sc_obj_img->getWidth();
                  $sc_obj_img->setWidth(250);
                  $sc_obj_img->setHeight(250);
                  $sc_obj_img->setManterAspecto(true);
                  $sc_obj_img->createImg($this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFileTN);
                  $muImgPrev = $muFileTN;
                  $muLink = "javascript:nm_mostra_img('" . $this->Ini->path_imag_temp . '/' . $muFile . "', '" . $muHeight . "', '" . $muWidth . "')";
                  $muLabel .= '<img src="' . $this->Ini->path_imag_temp . '/' . $muImgPrev . '" style="border-width: 0">';
                  $muLabel .= $muData;
                  $muHtmlItem  = '<span class="id_mu_item_anexos">';
                  $muHtmlItem .= '<span class="id_mu_data_anexos">';
                  if ('' != $muLink)
                  {
                      $muHtmlItem .= '<a href="' . $muLink . '" class="scFormLinkOdd">';
                  }
                  $muHtmlItem .= $muLabel;
                  if ('' != $muLink)
                  {
                      $muHtmlItem .= '</a>';
                  }
                  $muHtmlItem .= '</span>';
                  $muHtmlItem .= '&nbsp; &nbsp';
                  $muHtmlItem   .= '<span class="id_mu_all_chkbx_anexos"><input type="checkbox" id="id_mu_chkbx_opt_anexos_' . $muItemCount . '" class="id_mu_chkbx_anexos" value="' . $muKey . '" /><label for="id_mu_chkbx_opt_anexos_' . $muItemCount . '">' . $this->Ini->Nm_lang['lang_errm_mu_delimg'] . '</label></span>';
                  $muHtmlItem   .= '</span>';
                  $muHtmlArray[] = $muHtmlItem;
                  $rs_mu->MoveNext();
                  $muItemCount++;
              }
              $muHtml = implode('<br />', $muHtmlArray);
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['anexos'] = array(
                       'row'    => '',
               'type'    => 'multi_upload',
               'valList' => array($sTmpValue),
               'mulHtml' => $muHtml,
              );
          }
   }

          //----- savedataonclick
   function ajax_return_values_savedataonclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("savedataonclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->savedataonclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['savedataonclick'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- jsonimagemdescricao
   function ajax_return_values_jsonimagemdescricao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("jsonimagemdescricao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->jsonimagemdescricao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['jsonimagemdescricao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_anexos = $this->anexos;
}
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
     ?><?php sc_include_library('sys', 'initCustom', 'onLoad.html'); ?><?php
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
echo $s->getIUDState($this);
echo $s->getMessage(true);

if ($this->nmgp_opcao == "novo") {
	$this->id_empreendimento  = $this->sc_temp_ID_Empreendimento;
	$this->nmgp_cmp_hidden["data"] = "off"; $this->NM_ajax_info['fieldDisplay']['data'] = 'off';
} else {
	$this->nmgp_cmp_hidden["data"] = "on"; $this->NM_ajax_info['fieldDisplay']['data'] = 'on';
	$this->sc_field_readonly("data", 'on');
}

$profile = $s->get("profile");
$Num_TipoUsuario = $s->get("Num_TipoUsuario");
if (($profile["EMPREENDIMENTO"]["EDITAR"]["v"] ?? "N") == "S" && $Num_TipoUsuario != "E") {
	$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;
} else {
	$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	$this->sc_field_readonly("descricao", 'on');
	$this->sc_field_readonly("anexos", 'on');
	$this->sc_ajax_javascript('nm_field_disabled', array("anexos=disabled", ""));
;
	echo "<style>
			[id^=id_sc_mucontrol_], [id^=id_sc_dragdrop_], [class^=id_mu_all_chkbx_] {
				display: none;
			}
			[id^=imagem-descricao-] {
			    opacity: 0.8;
    			pointer-events: none;
			}
		</style>";
}


$dataJsonEscaped = preg_replace("/(\\n)/", "#n#", $this->jsonimagemdescricao );
$IMGJSON = json_decode($dataJsonEscaped, true);
if (!$IMGJSON) $IMGJSON = new stdClass();
$this->onLoadJS(["JSONImagemDescricao" => json_encode($IMGJSON)]);
if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_anexos != $this->anexos || (isset($bFlagRead_anexos) && $bFlagRead_anexos)))
    {
        $this->ajax_return_values_anexos(true);
    }
}
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->data))
      {
          $this->data_hora = $this->data;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 


   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros

   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      $SC_tem_cmp_update = true; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Db->BeginTrans(); 
          $this->Ini->sc_tem_trans_banco = true; 
      } 
      $NM_val_form['id'] = $this->id;
      $NM_val_form['id_empreendimento'] = $this->id_empreendimento;
      $NM_val_form['descricao'] = $this->descricao;
      $NM_val_form['data'] = $this->data;
      $NM_val_form['anexos'] = $this->anexos;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['jsonimagemdescricao'] = $this->jsonimagemdescricao;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->id_empreendimento == "")  
      { 
          $this->id_empreendimento = 0;
          $this->sc_force_zero[] = 'id_empreendimento';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->descricao_before_qstr = $this->descricao;
          $this->descricao = substr($this->Db->qstr($this->descricao), 1, -1); 
          if ($this->descricao == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->descricao = "null"; 
              $NM_val_null[] = "descricao";
          } 
          if ($this->data == "")  
          { 
              $this->data = "null"; 
              $NM_val_null[] = "data";
          } 
          $this->jsonimagemdescricao_before_qstr = $this->jsonimagemdescricao;
          $this->jsonimagemdescricao = substr($this->Db->qstr($this->jsonimagemdescricao), 1, -1); 
          if ($this->jsonimagemdescricao == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->jsonimagemdescricao = "null"; 
              $NM_val_null[] = "jsonimagemdescricao";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_POE_mob_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = '$this->data', JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = '$this->data', JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = TO_DATE('$this->data', 'yyyy-mm-dd hh24:mi:ss'), JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = '$this->data', JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = '$this->data', JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = '$this->data', JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_Empreendimento = $this->id_empreendimento, Descricao = '$this->descricao', Data = '$this->data', JSONImagemDescricao = '$this->jsonimagemdescricao'";  
              } 
              $aDoNotUpdate = array();
              $aEraseFiles  = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              else  
              {
                  $comando .= " WHERE ID = $this->id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              if ($SC_ex_update || $SC_tem_cmp_update)
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg(), true); 
                          if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $this->Db->ErrorMsg();  
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   

                  $NM_cmp_auto = '__!SC_REMOVE!__';
                  $NM_seq_auto = '__!SC_REMOVE!__';
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                  { 
                      $NM_seq_auto = "NULL";
                      $NM_cmp_auto = "ID";
                  } 
                  if (!function_exists('sc_filename_unprotect_chars'))
                  {
                      include_once 'form_POE_mob_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_anexos));
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aMUDelKey   = array();
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('del' == $aUlFileData[0])
                      {
                          $aMUDelKey[] = $aUlFileData[1];
                      }
                      if (!empty($aMUDelKey))
                      {
                          $sMUDelete = "SELECT File_Name FROM tb_filesemppoe WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                          $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
                          while (!$rs_mu->EOF)
                          {
                              $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                              $rs_mu->MoveNext();
                          }
                          $rs_mu->Close();
                          $sMUDelete = "DELETE FROM tb_filesemppoe WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $rs_mu->Close();
                      }
                  }
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('add' == $aUlFileData[0])
                      {
                          $aUlFileData[1] = sc_filename_unprotect_chars($aUlFileData[1]);
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                          $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "anexos");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          $comando = str_replace('__!SC_REMOVE!__,', '', $comando);
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando;
                          $rs_mu = $this->Db->Execute($comando);
                          if ($rs_mu === false && !$rs_mu->EOF)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                          $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
          $this->descricao = $this->descricao_before_qstr;
          $this->jsonimagemdescricao = $this->jsonimagemdescricao_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_empreendimento'])) { $this->id_empreendimento = $NM_val_form['id_empreendimento']; }
              elseif (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'id_empreendimento', 'descricao', 'data', 'anexos', 'savedataonclick', 'jsonimagemdescricao'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "ID, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_POE_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->anexos_scfile_name, $dir_file, "anexos");
              if (trim($this->anexos_scfile_name) != $_test_file)
              {
                  $this->anexos_scfile_name = $_test_file;
                  $this->anexos = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_Empreendimento, Descricao, Data, JSONImagemDescricao) VALUES ($this->id_empreendimento, '$this->descricao', '$this->data', '$this->jsonimagemdescricao')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_Empreendimento, Descricao, Data, JSONImagemDescricao) VALUES (" . $NM_seq_auto . "$this->id_empreendimento, '$this->descricao', '$this->data', '$this->jsonimagemdescricao')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_Empreendimento, Descricao, Data, JSONImagemDescricao) VALUES (" . $NM_seq_auto . "$this->id_empreendimento, '$this->descricao', TO_DATE('$this->data', 'yyyy-mm-dd hh24:mi:ss'), '$this->jsonimagemdescricao')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_Empreendimento, Descricao, Data, JSONImagemDescricao) VALUES (" . $NM_seq_auto . "$this->id_empreendimento, '$this->descricao', '$this->data', '$this->jsonimagemdescricao')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_Empreendimento, Descricao, Data, JSONImagemDescricao) VALUES (" . $NM_seq_auto . "$this->id_empreendimento, '$this->descricao', '$this->data', '$this->jsonimagemdescricao')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_Empreendimento, Descricao, Data, JSONImagemDescricao) VALUES (" . $NM_seq_auto . "$this->id_empreendimento, '$this->descricao', '$this->data', '$this->jsonimagemdescricao')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg(), true); 
                      if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler']) 
                      { 
                          $this->sc_erro_insert = $this->Db->ErrorMsg();  
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_POE_mob_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_POE_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              $aEraseFiles = array();

                  $NM_cmp_auto = '__!SC_REMOVE!__';
                  $NM_seq_auto = '__!SC_REMOVE!__';
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                  { 
                      $NM_seq_auto = "NULL";
                      $NM_cmp_auto = "ID";
                  } 
                  if (!function_exists('sc_filename_unprotect_chars'))
                  {
                      include_once 'form_POE_mob_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_anexos));
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aMUDelKey   = array();
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('del' == $aUlFileData[0])
                      {
                          $aMUDelKey[] = $aUlFileData[1];
                      }
                      if (!empty($aMUDelKey))
                      {
                          $sMUDelete = "SELECT File_Name FROM tb_filesemppoe WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                          $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
                          while (!$rs_mu->EOF)
                          {
                              $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                              $rs_mu->MoveNext();
                          }
                          $rs_mu->Close();
                          $sMUDelete = "DELETE FROM tb_filesemppoe WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $rs_mu->Close();
                      }
                  }
                  foreach ($aUlInfo as $sUlInfo)
                  {
                      $aUlFileData = explode('@sci@', $sUlInfo);
                      if ('add' == $aUlFileData[0])
                      {
                          $aUlFileData[1] = sc_filename_unprotect_chars($aUlFileData[1]);
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                          $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "anexos");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (" . $NM_cmp_auto . ", File_Name, ID_Emppoe) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_filesemppoe (File_Name, ID_Emppoe) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          $comando = str_replace('__!SC_REMOVE!__,', '', $comando);
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando;
                          $rs_mu = $this->Db->Execute($comando);
                          if ($rs_mu === false && !$rs_mu->EOF)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_POE_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
                          $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $aEraseFiles = array();
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              $sMUDelete = "SELECT File_Name FROM tb_filesemppoe WHERE ID_Emppoe = " . $this->id . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_POE_mob_pack_ajax_response();
                  }
                   exit;
              }
              $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
              $sMUDirDest = $this->Ini->root . $this->Ini->path_imagens .  $sMUSubDir . '/';
              while (!$rs_mu->EOF)
              {
                  $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                  $rs_mu->MoveNext();
              }
              $rs_mu->Close();
              $sMUDelete = "DELETE FROM tb_filesemppoe WHERE ID_Emppoe = " . $this->id . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_POE_mob_pack_ajax_response();
                  }
                  exit;
              }
              $rs_mu->Close();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              else  
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_POE_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              if (!empty($aEraseFiles))
              {
                  foreach ($aEraseFiles as $aEraseData)
                  {
                      $sEraseFile = $aEraseData['dir'] . $aEraseData['file'];
                      if (@is_file($sEraseFile))
                      {
                          @unlink($sEraseFile);
                      }
                  }
              }
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_Emppoe)) {$this->sc_temp_ID_Emppoe = (isset($_SESSION['ID_Emppoe'])) ? $_SESSION['ID_Emppoe'] : "";}
     sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Cadastro de POE',
	"Conteudo" => $modelLogs->getConteudo()
]);

$s->setIUDState($this, "I", "success");

$ID_Emppoe = $this->id ;
 if (isset($ID_Emppoe)) {$this->sc_temp_ID_Emppoe = $ID_Emppoe;}
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_ID_Emppoe)) { $_SESSION['ID_Emppoe'] = $this->sc_temp_ID_Emppoe;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_POE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->sc_temp_ID_Emppoe)) { $_SESSION['ID_Emppoe'] = $this->sc_temp_ID_Emppoe;}
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
     sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

$IMGList = json_decode($this->jsonimagemdescricao , false, 512, JSON_UNESCAPED_UNICODE);
$IMGList = $IMGList ? $IMGList : new stdClass;
$IDList = array();
 
      $nm_select = "SELECT ID FROM tb_filesemppoe WHERE ID_Emppoe = '$this->id'"; 
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
_select($this->rs , $IDList);	
if (count($this->rs )) {
	foreach($this->rs  as $row) {
		$IDList[] = $row["ID"];
	}	
	foreach($IMGList as $k => $v) {		
		if (!in_array($k, $IDList)) {
			unset($IMGList->$k);
		}
	}
} else {
	$IMGList = new stdClass;
}

$JSON_ImgList = $this->jsonimagemdescricao  = json_encode($IMGList, JSON_UNESCAPED_UNICODE);
$sql = "UPDATE tb_emppoe SET JSONImagemDescricao = '$JSON_ImgList' WHERE ID = '$this->id'";

$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de POE',
	"Conteudo" => $modelLogs->getConteudo()
]);

$s->setIUDState($this, "U", "success");
 
      $nm_select = $sql; 
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
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_POE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
     sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Remoção de POE',
	"Conteudo" => $modelLogs->getConteudo()
]);

 
      $nm_select = "DELETE FROM tb_filesemppoe WHERE ID_Emppoe = '$this->id'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id != "")
     { 
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
     } 
;

$s->setIUDState("grid_POE", "D", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_POE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID, ID_Empreendimento, Descricao, Data, JSONImagemDescricao from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID, ID_Empreendimento, Descricao, Data, JSONImagemDescricao from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID, ID_Empreendimento, Descricao, TO_DATE(TO_CHAR(Data, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), JSONImagemDescricao from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID, ID_Empreendimento, Descricao, Data, JSONImagemDescricao from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID, ID_Empreendimento, Descricao, Data, JSONImagemDescricao from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "ID = '" . $_SESSION['ID_Emppoe'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "ID = $this->id"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "ID = $this->id"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "ID = $this->id"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "ID = $this->id"; 
                  }  
                  else  
                  {
                     $aWhere[] = "ID = $this->id"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ID";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start']) ;  
              } 
          } 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['voltar'] = $this->nmgp_botoes['voltar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              $this->NM_ajax_info['buttonDisplay']['voltar'] = $this->nmgp_botoes['voltar'] = "on";
              $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "on";
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->id_empreendimento = $rs->fields[1] ; 
              $this->nmgp_dados_select['id_empreendimento'] = $this->id_empreendimento;
              $this->descricao = $rs->fields[2] ; 
              $this->nmgp_dados_select['descricao'] = $this->descricao;
              $this->data = $rs->fields[3] ; 
              if (substr($this->data, 10, 1) == "-") 
              { 
                 $this->data = substr($this->data, 0, 10) . " " . substr($this->data, 11);
              } 
              if (substr($this->data, 13, 1) == ".") 
              { 
                 $this->data = substr($this->data, 0, 13) . ":" . substr($this->data, 14, 2) . ":" . substr($this->data, 17);
              } 
              $this->nmgp_dados_select['data'] = $this->data;
              $this->jsonimagemdescricao = $rs->fields[4] ; 
              $this->nmgp_dados_select['jsonimagemdescricao'] = $this->jsonimagemdescricao;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->id_empreendimento = (string)$this->id_empreendimento; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sub_dir'][0]  = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/POE/" . $this->nm_tira_formatacao_id($this->id);
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['reg_start'] < $qt_geral_reg_form_POE_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id = "";  
              $this->id_empreendimento = "";  
              $this->descricao = "";  
              $this->data =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->data_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->jsonimagemdescricao = "";  
              $this->anexos = "";  
              $this->savedataonclick = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
//
function onLoadJS($config=[])
{
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
     
?>
	<style>
		
		#id_sc_loaded_anexos > span > span.id_mu_data_anexos > a > img {
			width: 250px;
			height: 250px;
			margin-bottom: 10px;
			margin-right: 10px;
		}
	</style>
	<script>
		jsonDescricaoContent = `<?php echo isset($config["JSONImagemDescricao"]) ? $config["JSONImagemDescricao"] : "{}"; ?>`;
		jsonDescricao = JSON.parse(jsonDescricaoContent.replace(/#n#/g, "\\n"));
		$(document).ready(function(){
			$('.id_mu_item_anexos').each(function(i,o) {
				id = $(o).find("input[id^=id_mu_chkbx_opt_anexos_]").val();        
				if (id && $(o).find('[id^=imagem-descricao]').length == 0) {
					html = `
					<textarea onkeyup="updateDescricao(event)" 
						data-targetid="`+id+`"
						id="imagem-descricao-`+id+`"
						class="sc-js-input css_descricao_obj scFormObjectOdd" 
						style="white-space: pre-wrap; margin: 0px 0px 0px 10px; height: 200px; width: 300px; vertical-align: middle;" placeholder="<?=  "Digite a descrição aqui..."/* $this->Ini->Nm_lang['lang_label_enterdescription'] */?>"></textarea>`;
						$(o).append(html);
					if (typeof jsonDescricao[""+id] != "undefined") {
						$('#imagem-descricao-'+id).val(jsonDescricao[""+id]);
					} else {
						jsonDescricao[""+id] = "";
					}
				}
			});
		
			fileSC = new validateFileSC({
				label_max: `<?= $this->Ini->Nm_lang['lang_label_max'] ?>`,
				label_formato: `<?= $this->Ini->Nm_lang['lang_label_formato'] ?>`,
				label_arquivoinvalido: `<?= $this->Ini->Nm_lang['lang_label_arquivoinvalido'] ?>`,
				label_tamanho: `<?= $this->Ini->Nm_lang['lang_label_tamanho'] ?>`
			});
			fileSC.watch('anexos', {
				sizeB: 5242880,
				type: ['png', 'jpg', 'jpeg']
			});
		});
		function updateDescricao (e) {
			element = $(e.target);
			id = element.data('targetid');
			descricao = element.val();    
			if (id) {
				descricao = descricao.replace(/'/g, "");
				descricao = descricao.replace(/"/g, "");
				jsonDescricao[""+id] = descricao;
				$('#id_sc_field_jsonimagemdescricao').val(JSON.stringify(jsonDescricao));
			}
		}
		function saveDataForm () {
			btnUpd = $('#sc_b_upd_t'); 
			btnIns = $('#sc_b_ins_t');
			if (btnUpd.length) { 
				btnUpd.click(); 
			} else if (btnIns.length) {
				btnIns.click();
			}		
		}
	</script>
<?php

$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($jsonimagemdescricao, $data, $descricao, $id_empreendimento, $id)
{
$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'on';
     
$original_descricao = $this->descricao;
$original_jsonimagemdescricao = $this->jsonimagemdescricao;
$original_data = $this->data;
$original_descricao = $this->descricao;
$original_id_empreendimento = $this->id_empreendimento;
$original_id = $this->id;

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$msg = "";
$Error = false;

if ($this->descricao  == '') {
	$msg =  $this->Ini->Nm_lang['lang_label_POE'] ."<br>";
	$Error = true;
}

if (!$Error) { 
	$this->sc_ajax_javascript('saveDataForm');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	));
}

$modificado_descricao = $this->descricao;
$modificado_jsonimagemdescricao = $this->jsonimagemdescricao;
$modificado_data = $this->data;
$modificado_descricao = $this->descricao;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id = $this->id;
$this->nm_formatar_campos('descricao');
if ($original_descricao !== $modificado_descricao || isset($this->nmgp_cmp_readonly['descricao']) || (isset($bFlagRead_descricao) && $bFlagRead_descricao))
{
    $this->ajax_return_values_descricao(true);
}
if ($original_jsonimagemdescricao !== $modificado_jsonimagemdescricao || isset($this->nmgp_cmp_readonly['jsonimagemdescricao']) || (isset($bFlagRead_jsonimagemdescricao) && $bFlagRead_jsonimagemdescricao))
{
    $this->ajax_return_values_jsonimagemdescricao(true);
}
if ($original_data !== $modificado_data || isset($this->nmgp_cmp_readonly['data']) || (isset($bFlagRead_data) && $bFlagRead_data))
{
    $this->ajax_return_values_data(true);
}
if ($original_descricao !== $modificado_descricao || isset($this->nmgp_cmp_readonly['descricao']) || (isset($bFlagRead_descricao) && $bFlagRead_descricao))
{
    $this->ajax_return_values_descricao(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_POE_mob_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_POE_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_POE_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
     if (!$this->NM_ajax_flag && 'novo' != $this->nmgp_opcao)
     {
         if ('incluir' == $this->nmgp_opc_ant && 'nada' == $this->nmgp_opcao)
         {
         }
         else
         {
             $this->ajax_return_values_anexos(true);
         }
     }
    include_once("form_POE_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['csrf_token'];
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

   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_POE_mob_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Empreendimento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Descricao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Empreendimento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Descricao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "JSONImagemDescricao", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter_form'] . " and (ID = '" . $_SESSION['ID_Emppoe'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID = '" . $_SESSION['ID_Emppoe'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_POE_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['total'] = $qt_geral_reg_form_POE_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_POE_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_POE_mob_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";$nm_numeric[] = "id_empreendimento";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['data'] = "timestamp";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif (substr($Nm_datas[$campo_join], 0, 4) == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          {
              $nome = "str_replace (convert(char(10)," . $nome . ",102), '.', '-') + ' ' + convert(char(8)," . $nome . ",20)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_aspas . $Cmp . $nm_aspas1;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         switch (strtoupper($condicao))
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " like '" . $campo . "%'";
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." like '%" . $campo . "%'";
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower ." not like '%" . $campo . "%'";
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GT":     // 
               $comando        .= " $nome > " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "GE":     // 
               $comando        .= " $nome >= " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LT":     // 
               $comando        .= " $nome < " . $nm_aspas . $campo . $nm_aspas1;
            break;
            case "LE":     // 
               $comando        .= " $nome <= " . $nm_aspas . $campo . $nm_aspas1;
            break;
         }
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
       $nmgp_saida_form = "form_POE_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_POE_mob_fim.php";
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
       form_POE_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_POE_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_POE_mob_pack_ajax_response();
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
       form_POE_mob_pack_ajax_response();
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
    function sc_ajax_javascript($sJsFunc, $aParam = array())
    {
        if ($this->NM_ajax_flag)
        {
            $this->NM_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
        else
        {
            foreach ($aParam as $i => $v)
            {
                $aParam[$i] = '"' . str_replace('"', '\"', $v) . '"';
            }
            $this->NM_non_ajax_info['ajaxJavascript'][] = array($sJsFunc, $aParam);
        }
    } // sc_ajax_javascript
    function sc_field_readonly($sField, $sStatus, $iSeq = '')
    {
        if ('on' != $sStatus && 'off' != $sStatus)
        {
            return;
        }

        $sFieldDateTime = '';
        if ('data' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }

        $sFlagVar        = 'bFlagRead_' . $sField;
        $this->$sFlagVar = 'on' == $sStatus;

        $this->nmgp_cmp_readonly[$sField]                = $sStatus;
        $this->NM_ajax_info['readOnly'][$sField . $iSeq] = $sStatus;
        if ('' != $sFieldDateTime)
        {
            $this->NM_ajax_info['readOnly'][$sFieldDateTime . $iSeq] = $sStatus;
        }
    } // sc_field_readonly
}
?>
