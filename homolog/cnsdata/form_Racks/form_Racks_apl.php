<?php
//
class form_Racks_apl
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
                                'navPage'        => array(),
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
   var $id_;
   var $id_pop_;
   var $nom_rack_;
   var $id_operadora_;
   var $id_operadora__1;
   var $iniciovigencia_;
   var $valor_contrato_;
   var $num_contrato_;
   var $fimvigencia_;
   var $addfile_;
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
   var $sc_teve_incl = false;
   var $sc_teve_excl = false;
   var $sc_teve_alt  = false;
   var $sc_after_all_insert = false;
   var $sc_after_all_update = false;
   var $sc_after_all_delete = false;
   var $sc_max_reg = 50; 
   var $sc_max_reg_incl = 10; 
   var $form_vert_form_Racks = array();
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
   var $Grid_editavel  = true;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $hti_cnsdata_init, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['addfile_']))
          {
              $this->addfile_ = $this->NM_ajax_info['param']['addfile_'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['fimvigencia_']))
          {
              $this->fimvigencia_ = $this->NM_ajax_info['param']['fimvigencia_'];
          }
          if (isset($this->NM_ajax_info['param']['id_']))
          {
              $this->id_ = $this->NM_ajax_info['param']['id_'];
          }
          if (isset($this->NM_ajax_info['param']['id_operadora_']))
          {
              $this->id_operadora_ = $this->NM_ajax_info['param']['id_operadora_'];
          }
          if (isset($this->NM_ajax_info['param']['id_pop_']))
          {
              $this->id_pop_ = $this->NM_ajax_info['param']['id_pop_'];
          }
          if (isset($this->NM_ajax_info['param']['iniciovigencia_']))
          {
              $this->iniciovigencia_ = $this->NM_ajax_info['param']['iniciovigencia_'];
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
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_row']))
          {
              $this->nmgp_refresh_row = $this->NM_ajax_info['param']['nmgp_refresh_row'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['nom_rack_']))
          {
              $this->nom_rack_ = $this->NM_ajax_info['param']['nom_rack_'];
          }
          if (isset($this->NM_ajax_info['param']['num_contrato_']))
          {
              $this->num_contrato_ = $this->NM_ajax_info['param']['num_contrato_'];
          }
          if (isset($this->NM_ajax_info['param']['sc_clone']))
          {
              $this->sc_clone = $this->NM_ajax_info['param']['sc_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_clone']))
          {
              $this->sc_seq_clone = $this->NM_ajax_info['param']['sc_seq_clone'];
          }
          if (isset($this->NM_ajax_info['param']['sc_seq_vert']))
          {
              $this->sc_seq_vert = $this->NM_ajax_info['param']['sc_seq_vert'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['valor_contrato_']))
          {
              $this->valor_contrato_ = $this->NM_ajax_info['param']['valor_contrato_'];
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
      $this->sc_conv_var['id'] = "id_";
      $this->sc_conv_var['id_pop'] = "id_pop_";
      $this->sc_conv_var['nom_rack'] = "nom_rack_";
      $this->sc_conv_var['id_operadora'] = "id_operadora_";
      $this->sc_conv_var['iniciovigencia'] = "iniciovigencia_";
      $this->sc_conv_var['valor_contrato'] = "valor_contrato_";
      $this->sc_conv_var['num_contrato'] = "num_contrato_";
      $this->sc_conv_var['fimvigencia'] = "fimvigencia_";
      $this->sc_conv_var['addfile'] = "addfile_";
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
      if (isset($this->ID_POP) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_POP'] = $this->ID_POP;
      }
      if (isset($_POST["ID_POP"]) && isset($this->ID_POP)) 
      {
          $_SESSION['ID_POP'] = $this->ID_POP;
      }
      if (!isset($_POST["ID_POP"]) && isset($_POST["id_pop"])) 
      {
          $_SESSION['ID_POP'] = $this->id_pop;
      }
      if (isset($_GET["ID_POP"]) && isset($this->ID_POP)) 
      {
          $_SESSION['ID_POP'] = $this->ID_POP;
      }
      if (!isset($_GET["ID_POP"]) && isset($_GET["id_pop"])) 
      {
          $_SESSION['ID_POP'] = $this->id_pop;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $this->NM_where_filter = "";
          $tem_where_parms       = false;
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
                 nm_limpa_str_form_Racks($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 if ($cadapar[0] == "ID_")
                 {
                     $this->NM_where_filter .= (empty($this->NM_where_filter)) ? "(" : " and ";
                     $this->NM_where_filter .= " = '" . $this->ID_ . "'";
                     $this->has_where_params = true;
                     $tem_where_parms        = true;
                 }
                 elseif ($cadapar[0] == "NM_where_filter")
                 {
                     $this->has_where_params = false;
                     $tem_where_parms        = false;
                 }
             }
             $ix++;
          }
          if (!isset($this->ID_POP) && isset($this->id_pop_)) 
          {
              $this->ID_POP = $this->id_pop_;
          }
          if (isset($this->ID_POP)) 
          {
              $_SESSION['ID_POP'] = $this->ID_POP;
          }
          if ($tem_where_parms)
          {
              $this->NM_where_filter .= ")";
          }
          elseif (empty($this->NM_where_filter))
          {
              unset($this->NM_where_filter);
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->ID_POP) && isset($this->id_pop)) 
          {
              $this->ID_POP = $this->id_pop;
          }
          if (isset($this->ID_POP)) 
          {
              $_SESSION['ID_POP'] = $this->ID_POP;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['parms']);
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
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_Racks_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_Racks']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_Racks']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_Racks'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_Racks']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_Racks']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_Racks') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_Racks']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tb_racks";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_Racks")
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
      $this->nm_new_label['nom_rack_'] = '' . $this->Ini->Nm_lang['lang_label_identification'] . '';
      $this->nm_new_label['id_operadora_'] = '' . $this->Ini->Nm_lang['lang_label_operator'] . '';
      $this->nm_new_label['iniciovigencia_'] = '' . $this->Ini->Nm_lang['lang_label_iniciovigencia'] . '';
      $this->nm_new_label['valor_contrato_'] = '' . $this->Ini->Nm_lang['lang_label_contractvalue'] . '';
      $this->nm_new_label['num_contrato_'] = '' . $this->Ini->Nm_lang['lang_label_contractnumber'] . '';
      $this->nm_new_label['fimvigencia_'] = '' . $this->Ini->Nm_lang['lang_label_fimvigencia'] . '';
      $this->nm_new_label['addfile_'] = '' . $this->Ini->Nm_lang['lang_label_photo'] . '';

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
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok_mult)   ? ""     : $str_img_status_ok_mult;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err_mult)  ? ""     : $str_img_status_err_mult;
      $this->Ini->Css_status      = "scFormInputErrorMult";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "hticnsdata__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "hticnsdata__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);


      $this->arr_buttons['voltarpop']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltarpop']['type']             = "button";
      $this->arr_buttons['voltarpop']['value']            = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltarpop']['display']          = "only_text";
      $this->arr_buttons['voltarpop']['display_position'] = "text_right";
      $this->arr_buttons['voltarpop']['style']            = "default";
      $this->arr_buttons['voltarpop']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_Racks']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_Racks'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      if ('total' == $this->form_paginacao)
      {
          $this->nmgp_botoes['first']   = "off";
          $this->nmgp_botoes['back']    = "off";
          $this->nmgp_botoes['forward'] = "off";
          $this->nmgp_botoes['last']    = "off";
          $this->nmgp_botoes['navpage'] = "off";
          $this->nmgp_botoes['goto']    = "off";
          $this->nmgp_botoes['qtline']  = "off";
          $this->nmgp_botoes['summary'] = "off";
      }
      else
      {
      $this->nmgp_botoes['first'] = "on";
      $this->nmgp_botoes['back'] = "on";
      $this->nmgp_botoes['forward'] = "on";
      $this->nmgp_botoes['last'] = "on";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "on";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "on";
      }
      $this->nmgp_botoes['voltarPOP'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_orig'] = " where ID_POP = " . $_SESSION['ID_POP'] . "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_pesq'] = " where ID_POP = " . $_SESSION['ID_POP'] . "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_Racks']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_Racks'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_Racks'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field . "_"] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field . "_"] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field . "_"] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_Racks", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_Racks/form_Racks_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_Racks_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_Racks_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_Racks_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_Racks/form_Racks_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_Racks_erro.class.php"); 
      }
      $this->Erro      = new form_Racks_erro();
      $this->Erro->Ini = $this->Ini;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg']) && strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg']) == "all")
      {
          $this->form_paginacao = "total";
      }
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao']))
         { 
             if ($this->id_ != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltarPOP'] = "on";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltarPOP'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['botoes']['voltarPOP'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "voltarPOP")
          { 
              $this->sc_btn_voltarPOP();
          } 
          $this->NM_close_db(); 
          exit;
      } 
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_
      $this->field_config['id_']               = array();
      $this->field_config['id_']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_']['symbol_dec'] = '';
      $this->field_config['id_']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- id_pop_
      $this->field_config['id_pop_']               = array();
      $this->field_config['id_pop_']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_pop_']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_pop_']['symbol_dec'] = '';
      $this->field_config['id_pop_']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_pop_']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- iniciovigencia_
      $this->field_config['iniciovigencia_']                 = array();
      $this->field_config['iniciovigencia_']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'];
      $this->field_config['iniciovigencia_']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['iniciovigencia_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'iniciovigencia_');
      //-- fimvigencia_
      $this->field_config['fimvigencia_']                 = array();
      $this->field_config['fimvigencia_']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'];
      $this->field_config['fimvigencia_']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['fimvigencia_']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'fimvigencia_');
      //-- valor_contrato_
      $this->field_config['valor_contrato_']               = array();
      $this->field_config['valor_contrato_']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_val'];
      $this->field_config['valor_contrato_']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['unid_mont_group_digit'];
      $this->field_config['valor_contrato_']['symbol_dec'] = $_SESSION['hticnsdata']['reg_conf']['dec_val'];
      $this->field_config['valor_contrato_']['symbol_mon'] = $_SESSION['hticnsdata']['reg_conf']['monet_simb'];
      $this->field_config['valor_contrato_']['format_pos'] = $_SESSION['hticnsdata']['reg_conf']['monet_f_pos'];
      $this->field_config['valor_contrato_']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['monet_f_neg'];
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();
      if ($this->nmgp_opcao == "change_qtd_line")
      {
          $this->NM_btn_navega = "N";
          if (strtolower($this->nmgp_max_line) == "all")
          {
              $this->nmgp_opcao = "inicio";
              $this->form_paginacao = "total";
          }
          else
          {
              $this->nmgp_opcao = "igual";
              $this->form_paginacao = "parcial";
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg'] = $this->nmgp_max_line;
      }
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

      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opc_edit'] = true;  
      $sc_contr_vert = $GLOBALS["sc_contr_vert"];
      $sc_seq_vert   = 1; 
      $sc_opc_salva  = $this->nmgp_opcao; 
      $sc_todas_Crit = "";
      $sc_check_excl = array(); 
      $sc_check_incl = array(); 
      if (is_array($GLOBALS["sc_check_vert"])) 
      { 
          if ($this->nmgp_opcao == "incluir" || ($this->nmgp_opcao == "recarga" && $this->nmgp_opc_ant == "novo"))
          {
              $sc_check_incl = $GLOBALS["sc_check_vert"]; 
          }
          elseif ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir" || $this->nmgp_opcao == "recarga")
          {
              $sc_check_excl = $GLOBALS["sc_check_vert"]; 
          }
      } 
      elseif ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $sc_check_incl = array($_POST['upload_file_row']);
      }
      if (empty($this->nmgp_opcao)) 
      { 
          $this->nmgp_opcao = "inicio";
      } 
      if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "novo";
         $this->nm_select_banco();
         $this->nm_gera_html();
         $this->NM_ajax_info['newline'] = NM_utf8_urldecode($this->New_Line);
         $this->NM_close_db();
         form_Racks_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'backup_line' == $this->NM_ajax_opcao)
      {
         $this->nmgp_opcao = "igual";
         $this->nm_tira_formatacao();
         $this->nm_converte_datas();
         $this->nm_select_banco();
         $this->ajax_return_values();
         $this->NM_close_db();
         form_Racks_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'submit_form' == $this->NM_ajax_opcao)
      {
         if (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
         if (isset($this->id_pop_)) { $this->nm_limpa_alfa($this->id_pop_); }
         if (isset($this->nom_rack_)) { $this->nm_limpa_alfa($this->nom_rack_); }
         if (isset($this->id_operadora_)) { $this->nm_limpa_alfa($this->id_operadora_); }
         if (isset($this->valor_contrato_)) { $this->nm_limpa_alfa($this->valor_contrato_); }
         if (isset($this->num_contrato_)) { $this->nm_limpa_alfa($this->num_contrato_); }
         if (isset($this->Sc_num_lin_alt) && $this->Sc_num_lin_alt > 0) 
         {
             $sc_seq_vert = $this->Sc_num_lin_alt;
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert];
         }
         $this->controle_form_vert();
         if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
         {
             $this->NM_rollback_db();
              if ($this->NM_ajax_flag)
              {
                  if (!isset($this->NM_ajax_info['errList']['geral_form_Racks']) || !is_array($this->NM_ajax_info['errList']['geral_form_Racks']))
                  {
                      $this->NM_ajax_info['errList']['geral_form_Racks'] = array();
                  }
                  if ($Campos_Crit != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_Racks'][] = $Campos_Crit;
                  }
                  if (!empty($Campos_Falta))
                  {
                      $this->NM_ajax_info['errList']['geral_form_Racks'][] = $this->Formata_Campos_Falta($Campos_Falta);
                  }
                  if ($this->Campos_Mens_erro != "")
                  {
                      $this->NM_ajax_info['errList']['geral_form_Racks'][] = $this->Campos_Mens_erro;
                  }
                  $this->NM_gera_nav_page(); 
                  $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              }
         }
         else
         {
             $this->NM_commit_db();
         }
         if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
         }
         $this->NM_close_db();
         form_Racks_pack_ajax_response();
         exit;
      }
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
          if ('validate_id_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_');
          }
          if ('validate_id_pop_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_pop_');
          }
          if ('validate_nom_rack_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_rack_');
          }
          if ('validate_id_operadora_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_operadora_');
          }
          if ('validate_num_contrato_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_contrato_');
          }
          if ('validate_iniciovigencia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'iniciovigencia_');
          }
          if ('validate_fimvigencia_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'fimvigencia_');
          }
          if ('validate_valor_contrato_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'valor_contrato_');
          }
          if ('validate_addfile_' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'addfile_');
          }
          form_Racks_pack_ajax_response();
          exit;
      }
      while ($sc_contr_vert > $sc_seq_vert) 
      { 
         $Campos_Crit  = "";
         $Campos_Falta = array();
         $Campos_Erros = array();
         $this->id_ = $GLOBALS["id_" . $sc_seq_vert]; 
         $this->id_pop_ = $GLOBALS["id_pop_" . $sc_seq_vert]; 
         $this->nom_rack_ = $GLOBALS["nom_rack_" . $sc_seq_vert]; 
         $this->id_operadora_ = $GLOBALS["id_operadora_" . $sc_seq_vert]; 
         $this->num_contrato_ = $GLOBALS["num_contrato_" . $sc_seq_vert]; 
         $this->iniciovigencia_ = $GLOBALS["iniciovigencia_" . $sc_seq_vert]; 
         $this->fimvigencia_ = $GLOBALS["fimvigencia_" . $sc_seq_vert]; 
         $this->valor_contrato_ = $GLOBALS["valor_contrato_" . $sc_seq_vert]; 
         $this->addfile_ = $GLOBALS["addfile_" . $sc_seq_vert]; 
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert]))
         {
             $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert];
         }
         if (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
         if (isset($this->id_pop_)) { $this->nm_limpa_alfa($this->id_pop_); }
         if (isset($this->nom_rack_)) { $this->nm_limpa_alfa($this->nom_rack_); }
         if (isset($this->id_operadora_)) { $this->nm_limpa_alfa($this->id_operadora_); }
         if (isset($this->valor_contrato_)) { $this->nm_limpa_alfa($this->valor_contrato_); }
         if (isset($this->num_contrato_)) { $this->nm_limpa_alfa($this->num_contrato_); }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'])) 
         {
            $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert];
         }
         if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'])) 
         {
            $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert];
         }
         if ($this->nmgp_opcao != "recarga" && in_array($sc_seq_vert, $sc_check_excl))
         {
             $this->nmgp_opcao = "excluir";
         }
         if ($this->nmgp_opcao == "incluir" && !in_array($sc_seq_vert, $sc_check_incl))
         { }
         else
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_disabled'] = array();
             $this->controle_form_vert(); 
             $this->nmgp_opcao = $sc_opc_salva; 
             if ($this->nmgp_opcao != "recarga"  && $this->nmgp_opcao != "muda_form" && ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != ""))
             {
                 $sc_todas_Crit .= (!empty($sc_todas_Crit)) ? "<br>" : ""; 
                 $sc_todas_Crit .= "<B>" . $this->Ini->Nm_lang['lang_errm_line'] . $sc_seq_vert . "</B>: "; 
                 $sc_todas_Crit .= $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros);
                 $this->Campos_Mens_erro = ""; 
             }
             if ($this->nmgp_opcao != "recarga") 
             {
                $this->nm_guardar_campos();
                $this->nm_formatar_campos();
             }
             $this->form_vert_form_Racks[$sc_seq_vert]['id_'] =  $this->id_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['id_pop_'] =  $this->id_pop_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['nom_rack_'] =  $this->nom_rack_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['id_operadora_'] =  $this->id_operadora_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['num_contrato_'] =  $this->num_contrato_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['iniciovigencia_'] =  $this->iniciovigencia_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['fimvigencia_'] =  $this->fimvigencia_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['valor_contrato_'] =  $this->valor_contrato_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['addfile_'] =  $this->addfile_; 
         }
         $sc_seq_vert++; 
      } 
      if (!empty($sc_todas_Crit)) 
      { 
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sc_todas_Crit); 
          if ($this->nmgp_opcao == "incluir")
          { 
              $this->nmgp_opcao = "novo"; 
          }
      } 
      elseif ($this->nmgp_opcao == "incluir")
      { 
          $this->nmgp_opcao = "novo"; 
      }
      if ($this->nmgp_opcao == 'incluir' && isset($_POST['upload_file_row']) && '' != $_POST['upload_file_row'])
      {
          $this->nmgp_opcao = 'igual';
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form") 
      { 
          if ($this->sc_teve_incl) 
          { 
              $this->sc_after_all_insert = true;
          }
          if ($this->sc_teve_alt) 
          { 
              $this->sc_after_all_update = true;
          }
          if ($this->sc_teve_excl) 
          { 
              $this->sc_after_all_delete = true;
          }
          if (empty($sc_todas_Crit)) 
          { 
              $this->NM_commit_db(); 
              $this->nm_select_banco();
              $sc_check_excl = array(); 
          } 
          else
          { 
              $this->NM_rollback_db(); 
          } 
      } 
      if ($this->nmgp_opcao == "recarga") 
      { 
          $this->NM_gera_nav_page(); 
      } 
      if ($this->NM_ajax_flag && ('navigate_form' == $this->NM_ajax_opcao || !empty($this->nmgp_refresh_fields)))
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          $this->NM_close_db();
          form_Racks_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
      {
          $this->nm_gera_html();
          $this->NM_ajax_info['tableRefresh'] = NM_charset_to_utf8($this->Table_refresh . $this->New_Line) . '</table>';
          $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
          $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_Racks);
          $this->NM_ajax_info['fldList']['id_']['keyVal'] = sc_htmlentities($this->nmgp_dados_form['id_']);
          $this->NM_close_db();
          form_Racks_pack_ajax_response();
          exit;
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_teve_incl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_teve_alt && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_teve_excl && empty($sc_todas_Crit))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      $this->nm_todas_criticas = $sc_todas_Crit;
      $this->nm_gera_html();
      $this->NM_close_db(); 
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
   function controle_form_vert()
   {
     global $nm_opc_lookup,$Campos_Crit, $Campos_Falta, $Campos_Erros, 
            $glo_senha_protect, $nm_apl_dependente, $nm_form_submit;

//
//-----> 
//
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_Racks_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          return; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
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
   function sc_btn_voltarPOP() 
   {
        global $nm_url_saida, $teste_validade, 
               $GLOBALS, $Campos_Crit, $Campos_Falta, $Campos_Erros, $sc_seq_vert, $sc_check_incl, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_pop_, $this->field_config['id_pop_']['symbol_grp']) ; 
      nm_limpa_data($this->iniciovigencia_, $this->field_config['iniciovigencia_']['date_sep']) ; 
      nm_limpa_data($this->fimvigencia_, $this->field_config['fimvigencia_']['date_sep']) ; 
      if (!empty($this->field_config['valor_contrato_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp'], $this->field_config['valor_contrato_']['symbol_mon']); 
          nm_limpa_valor($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp']) ; 
      }
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
    $this->voltar("update", "form_POP");
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id_" value="<?php echo $this->form_encode_input($this->id_) ?>"/>
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
           case 'id_':
               return "ID";
               break;
           case 'id_pop_':
               return "ID POP";
               break;
           case 'nom_rack_':
               return "" . $this->Ini->Nm_lang['lang_label_identification'] . "";
               break;
           case 'id_operadora_':
               return "" . $this->Ini->Nm_lang['lang_label_operator'] . "";
               break;
           case 'num_contrato_':
               return "" . $this->Ini->Nm_lang['lang_label_contractnumber'] . "";
               break;
           case 'iniciovigencia_':
               return "" . $this->Ini->Nm_lang['lang_label_iniciovigencia'] . "";
               break;
           case 'fimvigencia_':
               return "" . $this->Ini->Nm_lang['lang_label_fimvigencia'] . "";
               break;
           case 'valor_contrato_':
               return "" . $this->Ini->Nm_lang['lang_label_contractvalue'] . "";
               break;
           case 'addfile_':
               return "" . $this->Ini->Nm_lang['lang_label_photo'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_Racks']) || !is_array($this->NM_ajax_info['errList']['geral_form_Racks']))
              {
                  $this->NM_ajax_info['errList']['geral_form_Racks'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_Racks'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_' == $filtro)
        $this->ValidateField_id_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_pop_' == $filtro)
        $this->ValidateField_id_pop_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_rack_' == $filtro)
        $this->ValidateField_nom_rack_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_operadora_' == $filtro)
        $this->ValidateField_id_operadora_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_contrato_' == $filtro)
        $this->ValidateField_num_contrato_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'iniciovigencia_' == $filtro)
        $this->ValidateField_iniciovigencia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'fimvigencia_' == $filtro)
        $this->ValidateField_fimvigencia_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'valor_contrato_' == $filtro)
        $this->ValidateField_valor_contrato_($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'addfile_' == $filtro)
        $this->ValidateField_addfile_($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_id_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_ == "")  
      { 
          $this->id_ = 0;
      } 
      nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_']))
                  {
                      $Campos_Erros['id_'] = array();
                  }
                  $Campos_Erros['id_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_']) || !is_array($this->NM_ajax_info['errList']['id_']))
                  {
                      $this->NM_ajax_info['errList']['id_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['id_']))
                  {
                      $Campos_Erros['id_'] = array();
                  }
                  $Campos_Erros['id_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_']) || !is_array($this->NM_ajax_info['errList']['id_']))
                  {
                      $this->NM_ajax_info['errList']['id_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_

    function ValidateField_id_pop_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_pop_ == "")  
      { 
          $this->id_pop_ = 0;
          $this->sc_force_zero[] = 'id_pop_';
      } 
      nm_limpa_numero($this->id_pop_, $this->field_config['id_pop_']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_pop_ != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_pop_) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID POP: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_pop_']))
                  {
                      $Campos_Erros['id_pop_'] = array();
                  }
                  $Campos_Erros['id_pop_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_pop_']) || !is_array($this->NM_ajax_info['errList']['id_pop_']))
                  {
                      $this->NM_ajax_info['errList']['id_pop_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_pop_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_pop_, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID POP; " ; 
                  if (!isset($Campos_Erros['id_pop_']))
                  {
                      $Campos_Erros['id_pop_'] = array();
                  }
                  $Campos_Erros['id_pop_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_pop_']) || !is_array($this->NM_ajax_info['errList']['id_pop_']))
                  {
                      $this->NM_ajax_info['errList']['id_pop_'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_pop_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_pop_

    function ValidateField_nom_rack_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['php_cmp_required']['nom_rack_']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['php_cmp_required']['nom_rack_'] == "on")) 
      { 
          if ($this->nom_rack_ == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_label_identification'] . "" ; 
              if (!isset($Campos_Erros['nom_rack_']))
              {
                  $Campos_Erros['nom_rack_'] = array();
              }
              $Campos_Erros['nom_rack_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['nom_rack_']) || !is_array($this->NM_ajax_info['errList']['nom_rack_']))
                  {
                      $this->NM_ajax_info['errList']['nom_rack_'] = array();
                  }
                  $this->NM_ajax_info['errList']['nom_rack_'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_rack_) > 50) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_identification'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_rack_']))
              {
                  $Campos_Erros['nom_rack_'] = array();
              }
              $Campos_Erros['nom_rack_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_rack_']) || !is_array($this->NM_ajax_info['errList']['nom_rack_']))
              {
                  $this->NM_ajax_info['errList']['nom_rack_'] = array();
              }
              $this->NM_ajax_info['errList']['nom_rack_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_rack_

    function ValidateField_id_operadora_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_operadora_) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']) && !in_array($this->id_operadora_, $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_operadora_']))
                   {
                       $Campos_Erros['id_operadora_'] = array();
                   }
                   $Campos_Erros['id_operadora_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_operadora_']) || !is_array($this->NM_ajax_info['errList']['id_operadora_']))
                   {
                       $this->NM_ajax_info['errList']['id_operadora_'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_operadora_'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_operadora_

    function ValidateField_num_contrato_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_contrato_) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_contractnumber'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_contrato_']))
              {
                  $Campos_Erros['num_contrato_'] = array();
              }
              $Campos_Erros['num_contrato_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_contrato_']) || !is_array($this->NM_ajax_info['errList']['num_contrato_']))
              {
                  $this->NM_ajax_info['errList']['num_contrato_'] = array();
              }
              $this->NM_ajax_info['errList']['num_contrato_'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_contrato_

    function ValidateField_iniciovigencia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->iniciovigencia_, $this->field_config['iniciovigencia_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['iniciovigencia_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['iniciovigencia_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['iniciovigencia_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['iniciovigencia_']['date_sep']) ; 
          if (trim($this->iniciovigencia_) != "")  
          { 
              if ($teste_validade->Data($this->iniciovigencia_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_iniciovigencia'] . "; " ; 
                  if (!isset($Campos_Erros['iniciovigencia_']))
                  {
                      $Campos_Erros['iniciovigencia_'] = array();
                  }
                  $Campos_Erros['iniciovigencia_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['iniciovigencia_']) || !is_array($this->NM_ajax_info['errList']['iniciovigencia_']))
                  {
                      $this->NM_ajax_info['errList']['iniciovigencia_'] = array();
                  }
                  $this->NM_ajax_info['errList']['iniciovigencia_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['iniciovigencia_']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_iniciovigencia_

    function ValidateField_fimvigencia_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->fimvigencia_, $this->field_config['fimvigencia_']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['fimvigencia_']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['fimvigencia_']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['fimvigencia_']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['fimvigencia_']['date_sep']) ; 
          if (trim($this->fimvigencia_) != "")  
          { 
              if ($teste_validade->Data($this->fimvigencia_, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_fimvigencia'] . "; " ; 
                  if (!isset($Campos_Erros['fimvigencia_']))
                  {
                      $Campos_Erros['fimvigencia_'] = array();
                  }
                  $Campos_Erros['fimvigencia_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['fimvigencia_']) || !is_array($this->NM_ajax_info['errList']['fimvigencia_']))
                  {
                      $this->NM_ajax_info['errList']['fimvigencia_'] = array();
                  }
                  $this->NM_ajax_info['errList']['fimvigencia_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['fimvigencia_']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_fimvigencia_

    function ValidateField_valor_contrato_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->valor_contrato_ == "")  
      { 
          $this->valor_contrato_ = 0;
          $this->sc_force_zero[] = 'valor_contrato_';
      } 
      if (!empty($this->field_config['valor_contrato_']['symbol_dec']))
      {
          $this->sc_remove_currency($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp'], $this->field_config['valor_contrato_']['symbol_mon']); 
          nm_limpa_valor($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp']) ; 
          if ('.' == substr($this->valor_contrato_, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->valor_contrato_, 1)))
              {
                  $this->valor_contrato_ = '';
              }
              else
              {
                  $this->valor_contrato_ = '0' . $this->valor_contrato_;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->valor_contrato_ != '')  
          { 
              $iTestSize = 12;
              if (strlen($this->valor_contrato_) > $iTestSize)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_contractvalue'] . ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['valor_contrato_']))
                  {
                      $Campos_Erros['valor_contrato_'] = array();
                  }
                  $Campos_Erros['valor_contrato_'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['valor_contrato_']) || !is_array($this->NM_ajax_info['errList']['valor_contrato_']))
                  {
                      $this->NM_ajax_info['errList']['valor_contrato_'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_contrato_'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->valor_contrato_, 9, 2, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_contractvalue'] . "; " ; 
                  if (!isset($Campos_Erros['valor_contrato_']))
                  {
                      $Campos_Erros['valor_contrato_'] = array();
                  }
                  $Campos_Erros['valor_contrato_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['valor_contrato_']) || !is_array($this->NM_ajax_info['errList']['valor_contrato_']))
                  {
                      $this->NM_ajax_info['errList']['valor_contrato_'] = array();
                  }
                  $this->NM_ajax_info['errList']['valor_contrato_'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_valor_contrato_

    function ValidateField_addfile_(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->addfile_) != "")  
          { 
          } 
      } 
    } // ValidateField_addfile_

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
    $this->nmgp_dados_form['id_'] = $this->id_;
    $this->nmgp_dados_form['id_pop_'] = $this->id_pop_;
    $this->nmgp_dados_form['nom_rack_'] = $this->nom_rack_;
    $this->nmgp_dados_form['id_operadora_'] = $this->id_operadora_;
    $this->nmgp_dados_form['num_contrato_'] = $this->num_contrato_;
    $this->nmgp_dados_form['iniciovigencia_'] = $this->iniciovigencia_;
    $this->nmgp_dados_form['fimvigencia_'] = $this->fimvigencia_;
    $this->nmgp_dados_form['valor_contrato_'] = $this->valor_contrato_;
    $this->nmgp_dados_form['addfile_'] = $this->addfile_;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
      nm_limpa_numero($this->id_pop_, $this->field_config['id_pop_']['symbol_grp']) ; 
      nm_limpa_data($this->iniciovigencia_, $this->field_config['iniciovigencia_']['date_sep']) ; 
      nm_limpa_data($this->fimvigencia_, $this->field_config['fimvigencia_']['date_sep']) ; 
      if (!empty($this->field_config['valor_contrato_']['symbol_dec']))
      {
         $this->sc_remove_currency($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp'], $this->field_config['valor_contrato_']['symbol_mon']);
         nm_limpa_valor($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp']);
      }
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
      if ($Nome_Campo == "id_")
      {
          nm_limpa_numero($this->id_, $this->field_config['id_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_pop_")
      {
          nm_limpa_numero($this->id_pop_, $this->field_config['id_pop_']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "valor_contrato_")
      {
          if (!empty($this->field_config['valor_contrato_']['symbol_dec']))
          {
             $this->sc_remove_currency($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp'], $this->field_config['valor_contrato_']['symbol_mon']);
             nm_limpa_valor($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_dec'], $this->field_config['valor_contrato_']['symbol_grp']);
          }
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
      if (!empty($this->id_) || (!empty($format_fields) && isset($format_fields['id_'])))
      {
          nmgp_Form_Num_Val($this->id_, $this->field_config['id_']['symbol_grp'], $this->field_config['id_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_']['symbol_fmt']) ; 
      }
      if (!empty($this->id_pop_) || (!empty($format_fields) && isset($format_fields['id_pop_'])))
      {
          nmgp_Form_Num_Val($this->id_pop_, $this->field_config['id_pop_']['symbol_grp'], $this->field_config['id_pop_']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_pop_']['symbol_fmt']) ; 
      }
      if ((!empty($this->iniciovigencia_) && 'null' != $this->iniciovigencia_) || (!empty($format_fields) && isset($format_fields['iniciovigencia_'])))
      {
          nm_volta_data($this->iniciovigencia_, $this->field_config['iniciovigencia_']['date_format']) ; 
          nmgp_Form_Datas($this->iniciovigencia_, $this->field_config['iniciovigencia_']['date_format'], $this->field_config['iniciovigencia_']['date_sep']) ;  
      }
      elseif ('null' == $this->iniciovigencia_ || '' == $this->iniciovigencia_)
      {
          $this->iniciovigencia_ = '';
      }
      if ((!empty($this->fimvigencia_) && 'null' != $this->fimvigencia_) || (!empty($format_fields) && isset($format_fields['fimvigencia_'])))
      {
          nm_volta_data($this->fimvigencia_, $this->field_config['fimvigencia_']['date_format']) ; 
          nmgp_Form_Datas($this->fimvigencia_, $this->field_config['fimvigencia_']['date_format'], $this->field_config['fimvigencia_']['date_sep']) ;  
      }
      elseif ('null' == $this->fimvigencia_ || '' == $this->fimvigencia_)
      {
          $this->fimvigencia_ = '';
      }
      if (!empty($this->valor_contrato_) || (!empty($format_fields) && isset($format_fields['valor_contrato_'])))
      {
          nmgp_Form_Num_Val($this->valor_contrato_, $this->field_config['valor_contrato_']['symbol_grp'], $this->field_config['valor_contrato_']['symbol_dec'], "2", "S", "", "", "", "-", $this->field_config['valor_contrato_']['symbol_fmt']) ; 
          $sMonSymb = $this->field_config['valor_contrato_']['symbol_mon'];
          $this->sc_add_currency($this->valor_contrato_, $sMonSymb, $this->field_config['valor_contrato_']['format_pos']); 
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
      $guarda_format_hora = $this->field_config['iniciovigencia_']['date_format'];
      if ($this->iniciovigencia_ != "")  
      { 
          nm_conv_data($this->iniciovigencia_, $this->field_config['iniciovigencia_']['date_format']) ; 
          $this->iniciovigencia__hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->iniciovigencia__hora = substr($this->iniciovigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->iniciovigencia__hora = substr($this->iniciovigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->iniciovigencia__hora = substr($this->iniciovigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->iniciovigencia__hora = substr($this->iniciovigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->iniciovigencia__hora = substr($this->iniciovigencia__hora, 0, -4);
          }
      } 
      if ($this->iniciovigencia_ == "" && $use_null)  
      { 
          $this->iniciovigencia_ = "null" ; 
      } 
      $this->field_config['iniciovigencia_']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['fimvigencia_']['date_format'];
      if ($this->fimvigencia_ != "")  
      { 
          nm_conv_data($this->fimvigencia_, $this->field_config['fimvigencia_']['date_format']) ; 
          $this->fimvigencia__hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->fimvigencia__hora = substr($this->fimvigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->fimvigencia__hora = substr($this->fimvigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->fimvigencia__hora = substr($this->fimvigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->fimvigencia__hora = substr($this->fimvigencia__hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->fimvigencia__hora = substr($this->fimvigencia__hora, 0, -4);
          }
      } 
      if ($this->fimvigencia_ == "" && $use_null)  
      { 
          $this->fimvigencia_ = "null" ; 
      } 
      $this->field_config['fimvigencia_']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_all_vert();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_']['keyVal'] = form_Racks_pack_protect_string($this->nmgp_dados_form['id_']);
          }
   } // ajax_return_values
   function ajax_return_values_all_vert()
   {
          if (isset($this->nmgp_refresh_fields) && isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_Racks[$this->nmgp_refresh_row] = $this->NM_ajax_info['param'];
              if ((isset($this->Embutida_ronly) && $this->Embutida_ronly) || $this->NM_ajax_force_values)
              {
                  if (isset($this->NM_ajax_changed['id_']) && $this->NM_ajax_changed['id_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['id_'] = $this->id_;
                  }
                  if (isset($this->NM_ajax_changed['id_pop_']) && $this->NM_ajax_changed['id_pop_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['id_pop_'] = $this->id_pop_;
                  }
                  if (isset($this->NM_ajax_changed['nom_rack_']) && $this->NM_ajax_changed['nom_rack_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['nom_rack_'] = $this->nom_rack_;
                  }
                  if (isset($this->NM_ajax_changed['id_operadora_']) && $this->NM_ajax_changed['id_operadora_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['id_operadora_'] = $this->id_operadora_;
                  }
                  if (isset($this->NM_ajax_changed['num_contrato_']) && $this->NM_ajax_changed['num_contrato_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['num_contrato_'] = $this->num_contrato_;
                  }
                  if (isset($this->NM_ajax_changed['iniciovigencia_']) && $this->NM_ajax_changed['iniciovigencia_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['iniciovigencia_'] = $this->iniciovigencia_;
                  }
                  if (isset($this->NM_ajax_changed['fimvigencia_']) && $this->NM_ajax_changed['fimvigencia_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['fimvigencia_'] = $this->fimvigencia_;
                  }
                  if (isset($this->NM_ajax_changed['valor_contrato_']) && $this->NM_ajax_changed['valor_contrato_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['valor_contrato_'] = $this->valor_contrato_;
                  }
                  if (isset($this->NM_ajax_changed['addfile_']) && $this->NM_ajax_changed['addfile_'])
                  {
                      $this->form_vert_form_Racks[$this->nmgp_refresh_row]['addfile_'] = $this->addfile_;
                  }
              }
          }
          if (isset($this->nmgp_refresh_row) && '' != $this->nmgp_refresh_row)
          {
              $this->form_vert_form_Racks[$this->nmgp_refresh_row]['nom_rack_'] = $this->nom_rack_;
              $this->form_vert_form_Racks[$this->nmgp_refresh_row]['num_contrato_'] = $this->num_contrato_;
              $this->form_vert_form_Racks[$this->nmgp_refresh_row]['addfile_'] = $this->addfile_;
          }
          $this->NM_ajax_info['rsSize'] = sizeof($this->form_vert_form_Racks);
          foreach($this->form_vert_form_Racks as $sc_seq_vert => $aRecData)
          {
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['id_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'label',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_pop_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_pop_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['id_pop_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_rack_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['nom_rack_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['nom_rack_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_operadora_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['id_operadora_']);
                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array(); 
}
   $this->id_pop_ = $this->form_vert_form_Racks[$sc_seq_vert]['id_pop_'];
$aLookup[] = array(form_Racks_pack_protect_string('') => form_Racks_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'][] = '';
if ($this->id_pop_ != "")
{ 
   $this->nm_clear_val("id_pop_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_ = $this->id_;
   $old_value_id_pop_ = $this->id_pop_;
   $old_value_iniciovigencia_ = $this->iniciovigencia_;
   $old_value_fimvigencia_ = $this->fimvigencia_;
   $old_value_valor_contrato_ = $this->valor_contrato_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_id_pop_ = $this->id_pop_;
   $unformatted_value_iniciovigencia_ = $this->iniciovigencia_;
   $unformatted_value_fimvigencia_ = $this->fimvigencia_;
   $unformatted_value_valor_contrato_ = $this->valor_contrato_;

   $nm_comando = "SELECT '-1', (
  SELECT tb1.Nom_Empreendimento FROM tb_empreendimentos as tb1 
  INNER JOIN tb_pop as tb2 ON tb2.ID_Empreendimento = tb1.ID_Empreendimento 
  WHERE tb2.ID = '$this->id_pop_'
) FROM dual UNION 
SELECT tb3.ID_Operadoras, tb3.Nom_Operadoras 
FROM tb_operadoras as tb3
WHERE tb3.Num_Status = 'S'";

   $this->id_ = $old_value_id_;
   $this->id_pop_ = $old_value_id_pop_;
   $this->iniciovigencia_ = $old_value_iniciovigencia_;
   $this->fimvigencia_ = $old_value_fimvigencia_;
   $this->valor_contrato_ = $old_value_valor_contrato_;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_Racks_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_Racks_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'][] = $rs->fields[0];
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
} 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"id_operadora_\"";
          if (isset($this->NM_ajax_info['select_html']['id_operadora_']) && !empty($this->NM_ajax_info['select_html']['id_operadora_']))
          {
              eval("\$sSelComp = \"" . $this->NM_ajax_info['select_html']['id_operadora_'] . "\";");
          }
          $sLookup = '';
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {
                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
                  $this->NM_ajax_info['fldList']['id_operadora_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'select',
                       'valList' => array($sTmpValue),
               'optList' => $aLookup,
                       );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_operadora_' . $sc_seq_vert]['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_operadora_' . $sc_seq_vert]['valList'][$i] = form_Racks_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_operadora_' . $sc_seq_vert]['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_operadora_' . $sc_seq_vert]['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_operadora_' . $sc_seq_vert]['labList'] = $aLabel;
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_contrato_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['num_contrato_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['num_contrato_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($this->form_encode_input($sTmpValue)),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("iniciovigencia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['iniciovigencia_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['iniciovigencia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("fimvigencia_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['fimvigencia_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['fimvigencia_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("valor_contrato_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['valor_contrato_']);
                  $aLookup = array();
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['valor_contrato_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'text',
                       'valList' => array($sTmpValue),
                       );
              }
              if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("addfile_", $this->nmgp_refresh_fields)))
              {
                  $sTmpValue = NM_charset_to_utf8($aRecData['addfile_']);
                  $aLookup = array();
          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/sys__NM__ico__NM__photo24 (1).png"))
          { 
              $addfile_ = "&nbsp;" ;  
          } 
          else 
          { 
              $addfile_ = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/sys__NM__ico__NM__photo24 (1).png\"/>" ; 
          } 
          $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_EmpPRSA_edit . "', '$this->nm_location', 'form_prsa_tipo_prsa?#?RACK?@?form_prsa_id_prsa?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert]['id_'] . "?@?form_prsa_nameitem?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert]['nom_rack_'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?', '', '_self', '0', '0', 'form_EmpPRSA')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $addfile_ . "</font></a>";
          $aLookupOrig = $aLookup;
                  $this->NM_ajax_info['fldList']['addfile_' . $sc_seq_vert] = array(
                       'row'    => $sc_seq_vert,
                       'type'    => 'imagehtml',
                       'valList' => array($sTmpValue),
               'imgHtml' => $sTmpImgHtml,
                       );
              }
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['upload_dir'][$fieldName][] = $newName;
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
  function nm_proc_onload_record($sc_seq_vert=0)
  {
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
          $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_POP)) {$this->sc_temp_ID_POP = (isset($_SESSION['ID_POP'])) ? $_SESSION['ID_POP'] : "";}
     $this->id_pop_  = $this->sc_temp_ID_POP;
if ($this->nmgp_opcao == "novo") {
	$this->nmgp_cmp_hidden["addfile_"] = "off"; $this->NM_ajax_info['fieldDisplay']['addfile_'] = 'off';
}
if (isset($this->sc_temp_ID_POP)) { $_SESSION['ID_POP'] = $this->sc_temp_ID_POP;}
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off'; 
          }
  }
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
     ?><?php sc_include_library("sys", "initCustom", "onLoad.html"); ?><?php
sc_include_library("sys", "models", "Pop.php");
$_Pop = new Pop($this);
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession(true);
$profile = $s->get("profile");

$Pop = $_Pop->getById(intval($this->id_pop_ ));
$Num_TipoUsuario = $s->get("Num_TipoUsuario");
if (($profile["EMPREENDIMENTO"]["EDITAR"]["v"] ?? "N") == "S" && $Num_TipoUsuario != "E") {
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['cancel'] = $this->nmgp_botoes["cancel"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "on";;

$this->isFullRack();
} else {
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['cancel'] = $this->nmgp_botoes["cancel"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
	echo "<style>
			#hidden_bloco_0 > tbody > tr > td:nth-child(3),
			[id^=hidden_field_data_sc_actions] {
				display: none !important;
			}
		</style>";
}

if (($profile["EMPREENDIMENTO"]["VISUALIZACONTRATOS"]["v"] ?? "N") != "S") {
	$this->nmgp_cmp_hidden["valor_contrato_"] = "off"; $this->NM_ajax_info['fieldDisplay']['valor_contrato_'] = 'off';
}


?>
	<style>
		#idVertRow1 > td:nth-child(1), #idVertRow1 > td:nth-child(2) {
			width: 1%;
		}
		.css_nom_rack__line {
			width: <?php echo floor(100/5);?>% !important;
		}
		.css_localizacao__line {
			width: <?php echo floor(100/5);?>% !important;
		}
		.css_id_operadora__line {
			width: <?php echo floor(100/5);?>% !important;
		}
		.css_num_contrato__line {
			width: <?php echo floor(100/5);?>% !important;
		}
		.css_data_vigencia__line {
			width: <?php echo floor(100/5);?>% !important;
		}
		.css_valor_contrato__line {
			width: <?php echo floor(100/5);?>% !important;
		}
		#hidden_bloco_0 > tbody > tr:nth-child(1) > td:nth-child(3){
			text-align: center;
			min-width: 100px;
		}
		[id^=hidden_field_data_sc_actions], #hidden_field_data_sc_actions1{
			text-align: center !important;
		}
	</style>
	<script>
		loadBreadcrumb([`<?=  $this->Ini->Nm_lang['lang_label_pop'] ?>`,`<?= $Pop[0]["Nom_POP"]?>`],"display:block; top: -20px; background-color: #f5f5f570;");
		
		$(document).ready(function(){
			window.setInterval(function(){
				if ($('#hidden_bloco_0 > tbody > tr:nth-child(1) > td:nth-child(3) > .nlabel').length == 0){
					$('#hidden_bloco_0 > tbody > tr:nth-child(1) > td:nth-child(3)').html('<span class="nlabel"><?=  $this->Ini->Nm_lang['lang_btn_delete']  .' | ' .  $this->Ini->Nm_lang['lang_label_edit']  ?></span>');
				}

		},500);
		});
	</script>

<?php
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off'; 
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//
   function nm_troca_decimal($sc_parm1, $sc_parm2) 
   { 
      $this->valor_contrato_ = str_replace($sc_parm1, $sc_parm2, $this->valor_contrato_); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->valor_contrato_ = "'" . $this->valor_contrato_ . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->valor_contrato_ = str_replace("'", "", $this->valor_contrato_); 
   } 
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
      global $sc_seq_vert,  $nm_form_submit, $teste_validade, $sc_where;
 
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
      if ($this->nmgp_opcao == "alterar")
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert];
          if ($this->nmgp_dados_select['id_'] == $this->id_ &&
              $this->nmgp_dados_select['id_pop_'] == $this->id_pop_ &&
              $this->nmgp_dados_select['nom_rack_'] == $this->nom_rack_ &&
              $this->nmgp_dados_select['id_operadora_'] == $this->id_operadora_ &&
              $this->nmgp_dados_select['num_contrato_'] == $this->num_contrato_ &&
              $this->nmgp_dados_select['iniciovigencia_'] == $this->iniciovigencia_ &&
              $this->nmgp_dados_select['fimvigencia_'] == $this->fimvigencia_ &&
              $this->nmgp_dados_select['valor_contrato_'] == $this->valor_contrato_)
          {
              $SC_ex_update = false; 
              $SC_ex_upd_or = false; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['id_'] = $this->id_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['id_pop_'] = $this->id_pop_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['nom_rack_'] = $this->nom_rack_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['id_operadora_'] = $this->id_operadora_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['num_contrato_'] = $this->num_contrato_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['iniciovigencia_'] = $this->iniciovigencia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['fimvigencia_'] = $this->fimvigencia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['valor_contrato_'] = $this->valor_contrato_;
          }
      }
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
      if ('incluir' == $this->nmgp_opcao && $this->id_operadora_ == ""){$this->id_operadora_ = "null"; $NM_val_null[] = "id_operadora_";}  
      if (('alterar' == $this->nmgp_opcao || 'igual' == $this->nmgp_opcao) && $this->id_operadora_ == ""){$this->id_operadora_ = "null"; $NM_val_null[] = "id_operadora_";}  
      $NM_val_form['id_'] = $this->id_;
      $NM_val_form['id_pop_'] = $this->id_pop_;
      $NM_val_form['nom_rack_'] = $this->nom_rack_;
      $NM_val_form['id_operadora_'] = $this->id_operadora_;
      $NM_val_form['num_contrato_'] = $this->num_contrato_;
      $NM_val_form['iniciovigencia_'] = $this->iniciovigencia_;
      $NM_val_form['fimvigencia_'] = $this->fimvigencia_;
      $NM_val_form['valor_contrato_'] = $this->valor_contrato_;
      $NM_val_form['addfile_'] = $this->addfile_;
      if ($this->id_ == "")  
      { 
          $this->id_ = 0;
      } 
      if ($this->id_pop_ == "")  
      { 
          $this->id_pop_ = 0;
          $this->sc_force_zero[] = 'id_pop_';
      } 
      if ($this->id_operadora_ == "")  
      { 
          $this->id_operadora_ = 0;
          $this->sc_force_zero[] = 'id_operadora_';
      } 
      if ($this->valor_contrato_ == "")  
      { 
          $this->valor_contrato_ = 0;
          $this->sc_force_zero[] = 'valor_contrato_';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->nom_rack__before_qstr = $this->nom_rack_;
          $this->nom_rack_ = substr($this->Db->qstr($this->nom_rack_), 1, -1); 
          if ($this->nom_rack_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_rack_ = "null"; 
              $NM_val_null[] = "nom_rack_";
          } 
          if ($this->iniciovigencia_ == "")  
          { 
              $this->iniciovigencia_ = "null"; 
              $NM_val_null[] = "iniciovigencia_";
          } 
          $this->num_contrato__before_qstr = $this->num_contrato_;
          $this->num_contrato_ = substr($this->Db->qstr($this->num_contrato_), 1, -1); 
          if ($this->num_contrato_ == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_contrato_ = "null"; 
              $NM_val_null[] = "num_contrato_";
          } 
          if ($this->fimvigencia_ == "")  
          { 
              $this->fimvigencia_ = "null"; 
              $NM_val_null[] = "fimvigencia_";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_Racks_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_nfnd']; 
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = #$this->iniciovigencia_#, Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = #$this->fimvigencia_#";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . "";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . "";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = EXTEND('$this->iniciovigencia_', YEAR TO DAY), Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = EXTEND('$this->fimvigencia_', YEAR TO DAY)";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . "";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . "";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_POP = $this->id_pop_, Nom_Rack = '$this->nom_rack_', ID_Operadora = $this->id_operadora_, InicioVigencia = " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", Valor_Contrato = $this->valor_contrato_, Num_Contrato = '$this->num_contrato_', FimVigencia = " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . "";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID = $this->id_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ID = $this->id_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ID = $this->id_ ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ID = $this->id_ ";  
              }  
              else  
              {
                  $comando .= " WHERE ID = $this->id_ ";  
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
                                  form_Racks_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->nom_rack_ = $this->nom_rack__before_qstr;
          $this->num_contrato_ = $this->num_contrato__before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['db_changed'] = true;

              $this->sc_teve_alt = true; 
              if     (isset($NM_val_form) && isset($NM_val_form['id_'])) { $this->id_ = $NM_val_form['id_']; }
              elseif (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_pop_'])) { $this->id_pop_ = $NM_val_form['id_pop_']; }
              elseif (isset($this->id_pop_)) { $this->nm_limpa_alfa($this->id_pop_); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_rack_'])) { $this->nom_rack_ = $NM_val_form['nom_rack_']; }
              elseif (isset($this->nom_rack_)) { $this->nm_limpa_alfa($this->nom_rack_); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_operadora_'])) { $this->id_operadora_ = $NM_val_form['id_operadora_']; }
              elseif (isset($this->id_operadora_)) { $this->nm_limpa_alfa($this->id_operadora_); }
              if     (isset($NM_val_form) && isset($NM_val_form['valor_contrato_'])) { $this->valor_contrato_ = $NM_val_form['valor_contrato_']; }
              elseif (isset($this->valor_contrato_)) { $this->nm_limpa_alfa($this->valor_contrato_); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_contrato_'])) { $this->num_contrato_ = $NM_val_form['num_contrato_']; }
              elseif (isset($this->num_contrato_)) { $this->nm_limpa_alfa($this->num_contrato_); }
              $this->nm_proc_onload_record($this->nmgp_refresh_row);

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_', 'id_pop_', 'nom_rack_', 'id_operadora_', 'num_contrato_', 'iniciovigencia_', 'fimvigencia_', 'valor_contrato_', 'addfile_'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              if (isset($this->Embutida_ronly) && $this->Embutida_ronly)
              {

                  $this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_pop_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['nom_rack_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['id_operadora_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['num_contrato_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['iniciovigencia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['fimvigencia_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['valor_contrato_' . $this->nmgp_refresh_row] = 'on';

                  $this->NM_ajax_info['readOnly']['addfile_' . $this->nmgp_refresh_row] = 'on';


                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "ID, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia) VALUES ($this->id_pop_, '$this->nom_rack_', $this->id_operadora_, #$this->iniciovigencia_#, $this->valor_contrato_, '$this->num_contrato_', #$this->fimvigencia_#)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia) VALUES (" . $NM_seq_auto . "$this->id_pop_, '$this->nom_rack_', $this->id_operadora_, " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", $this->valor_contrato_, '$this->num_contrato_', " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia) VALUES (" . $NM_seq_auto . "$this->id_pop_, '$this->nom_rack_', $this->id_operadora_, " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", $this->valor_contrato_, '$this->num_contrato_', " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . ")"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia) VALUES (" . $NM_seq_auto . "$this->id_pop_, '$this->nom_rack_', $this->id_operadora_, EXTEND('$this->iniciovigencia_', YEAR TO DAY), $this->valor_contrato_, '$this->num_contrato_', EXTEND('$this->fimvigencia_', YEAR TO DAY))"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia) VALUES (" . $NM_seq_auto . "$this->id_pop_, '$this->nom_rack_', $this->id_operadora_, " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", $this->valor_contrato_, '$this->num_contrato_', " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . ")"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia) VALUES (" . $NM_seq_auto . "$this->id_pop_, '$this->nom_rack_', $this->id_operadora_, " . $this->Ini->date_delim . $this->iniciovigencia_ . $this->Ini->date_delim1 . ", $this->valor_contrato_, '$this->num_contrato_', " . $this->Ini->date_delim . $this->fimvigencia_ . $this->Ini->date_delim1 . ")"; 
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
                              form_Racks_pack_ajax_response();
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
                          form_Racks_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_ =  $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
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
                  $this->id_ = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['db_changed'] = true;

              $this->sc_evento = "insert"; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_qtd']++; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_I_E']++; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_incl = true; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['id_'] = $this->id_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['id_pop_'] = $this->id_pop_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['nom_rack_'] = $this->nom_rack_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['id_operadora_'] = $this->id_operadora_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['num_contrato_'] = $this->num_contrato_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['iniciovigencia_'] = $this->iniciovigencia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['fimvigencia_'] = $this->fimvigencia_;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert]['valor_contrato_'] = $this->valor_contrato_;
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
              if (isset($this->id_)) { $this->nm_limpa_alfa($this->id_); }
              if (isset($this->id_pop_)) { $this->nm_limpa_alfa($this->id_pop_); }
              if (isset($this->nom_rack_)) { $this->nm_limpa_alfa($this->nom_rack_); }
              if (isset($this->id_operadora_)) { $this->nm_limpa_alfa($this->id_operadora_); }
              if (isset($this->valor_contrato_)) { $this->nm_limpa_alfa($this->valor_contrato_); }
              if (isset($this->num_contrato_)) { $this->nm_limpa_alfa($this->num_contrato_); }
              if (isset($this->Embutida_form) && $this->Embutida_form)
              {
                  $this->nm_guardar_campos();
                  $this->nm_proc_onload_record($this->nmgp_refresh_row);
                  $this->nm_formatar_campos();

                  $this->NM_ajax_info['fldList']['id_' . $this->nmgp_refresh_row]['type']    = 'label';
                  $this->NM_ajax_info['fldList']['id_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_));
                  $this->NM_ajax_info['fldList']['id_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row] = "on";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['id_pop_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['id_pop_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_pop_));
                  $this->NM_ajax_info['fldList']['id_pop_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_id_pop_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_pop_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_pop_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_pop_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_pop_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['nom_rack_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['nom_rack_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->nom_rack_));
                  $this->NM_ajax_info['fldList']['nom_rack_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_nom_rack_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nom_rack_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nom_rack_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['nom_rack_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['nom_rack_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $aLookup = array();
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array(); 
}
if ($this->id_pop_ != "")
{ 
   $this->nm_clear_val("id_pop_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_ = $this->id_;
   $old_value_id_pop_ = $this->id_pop_;
   $old_value_iniciovigencia_ = $this->iniciovigencia_;
   $old_value_fimvigencia_ = $this->fimvigencia_;
   $old_value_valor_contrato_ = $this->valor_contrato_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_id_pop_ = $this->id_pop_;
   $unformatted_value_iniciovigencia_ = $this->iniciovigencia_;
   $unformatted_value_fimvigencia_ = $this->fimvigencia_;
   $unformatted_value_valor_contrato_ = $this->valor_contrato_;

   $nm_comando = "SELECT '-1', (
  SELECT tb1.Nom_Empreendimento FROM tb_empreendimentos as tb1 
  INNER JOIN tb_pop as tb2 ON tb2.ID_Empreendimento = tb1.ID_Empreendimento 
  WHERE tb2.ID = '$this->id_pop_'
) FROM dual UNION 
SELECT tb3.ID_Operadoras, tb3.Nom_Operadoras 
FROM tb_operadoras as tb3
WHERE tb3.Num_Status = 'S'";

   $this->id_ = $old_value_id_;
   $this->id_pop_ = $old_value_id_pop_;
   $this->iniciovigencia_ = $old_value_iniciovigencia_;
   $this->fimvigencia_ = $old_value_fimvigencia_;
   $this->valor_contrato_ = $old_value_valor_contrato_;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_Racks_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_Racks_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'][] = $rs->fields[0];
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
} 
          $sLabelTemp = '';
          foreach ($aLookup as $aValData)
          {
              if (key($aValData) == form_Racks_pack_protect_string(NM_charset_to_utf8($this->id_operadora_)))
              {
                  $sLabelTemp = current($aValData);
              }
          }
          $tmpLabel_id_operadora_ = $sLabelTemp;
                  $this->NM_ajax_info['fldList']['id_operadora_' . $this->nmgp_refresh_row]['type']    = 'select';
                  $this->NM_ajax_info['fldList']['id_operadora_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->id_operadora_));
                  $this->NM_ajax_info['fldList']['id_operadora_' . $this->nmgp_refresh_row]['labList'] = array($tmpLabel_id_operadora_);

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_operadora_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_operadora_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['id_operadora_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['id_operadora_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['num_contrato_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['num_contrato_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->num_contrato_));
                  $this->NM_ajax_info['fldList']['num_contrato_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_num_contrato_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['num_contrato_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['num_contrato_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['num_contrato_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['num_contrato_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['iniciovigencia_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['iniciovigencia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->iniciovigencia_));
                  $this->NM_ajax_info['fldList']['iniciovigencia_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_iniciovigencia_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iniciovigencia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iniciovigencia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['iniciovigencia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['iniciovigencia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['fimvigencia_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['fimvigencia_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->fimvigencia_));
                  $this->NM_ajax_info['fldList']['fimvigencia_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_fimvigencia_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fimvigencia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fimvigencia_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['fimvigencia_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['fimvigencia_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

                  $this->NM_ajax_info['fldList']['valor_contrato_' . $this->nmgp_refresh_row]['type']    = 'text';
                  $this->NM_ajax_info['fldList']['valor_contrato_' . $this->nmgp_refresh_row]['valList'] = array($this->form_encode_input($this->valor_contrato_));
                  $this->NM_ajax_info['fldList']['valor_contrato_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_valor_contrato_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['valor_contrato_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['valor_contrato_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['valor_contrato_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['valor_contrato_' . $this->nmgp_refresh_row] = "on";
                      }
                  }

          if (!is_file($this->Ini->root  . $this->Ini->path_imag_cab . "/sys__NM__ico__NM__photo24 (1).png"))
          { 
              $addfile_ = "&nbsp;" ;  
          } 
          else 
          { 
              $addfile_ = "<img border=\"0\" src=\"" . $this->Ini->path_imag_cab . "/sys__NM__ico__NM__photo24 (1).png\"/>" ; 
          } 
          $sTmpImgHtml = "<a href=\"javascript:nm_gp_submit('" . $this->Ini->link_form_EmpPRSA_edit . "', '$this->nm_location', 'form_prsa_tipo_prsa?#?RACK?@?form_prsa_id_prsa?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert]['id_'] . "?@?form_prsa_nameitem?#?" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_form'][$sc_seq_vert]['nom_rack_'] . "?@?NM_btn_insert?#?S?@?NM_btn_update?#?S?@?NM_btn_delete?#?S?@?NM_btn_navega?#?N?@?', '', '_self', '0', '0', 'form_EmpPRSA')\"><font color=\"" . $this->Ini->cor_link_dados . "\">" . $addfile_ . "</font></a>";
                  $this->NM_ajax_info['fldList']['addfile_' . $this->nmgp_refresh_row]['type']    = 'imagehtml';
                  $this->NM_ajax_info['fldList']['addfile_' . $this->nmgp_refresh_row]['imgHtml'] = $sTmpImgHtml;
                  $this->NM_ajax_info['fldList']['addfile_' . $this->nmgp_refresh_row]['valList'] = array();
                  $this->NM_ajax_info['fldList']['addfile_' . $this->nmgp_refresh_row]['labList'] = array($this->form_encode_input($tmpLabel_addfile_));

                  if ((isset($this->Embutida_form) && $this->Embutida_form) && (!isset($this->Embutida_ronly) || !$this->Embutida_ronly))
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['addfile_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['addfile_' . $this->nmgp_refresh_row] = "off";
                      }
                  }
                  elseif (isset($this->Embutida_ronly) && $this->Embutida_ronly)
                  {
                      if (!isset($this->NM_ajax_info['readOnly']['addfile_' . $this->nmgp_refresh_row]))
                      {
                          $this->NM_ajax_info['readOnly']['addfile_' . $this->nmgp_refresh_row] = "on";
                      }
                  }


                  $this->nm_tira_formatacao();
                  $this->nm_converte_datas();

                  $this->NM_ajax_info['closeLine'] = $this->nmgp_refresh_row;
              }
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
      }
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id_ = substr($this->Db->qstr($this->id_), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
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
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Campos_Mens_erro = $this->Ini->Nm_lang['lang_errm_dele_nfnd']; 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
              }  
              else  
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID = $this->id_ "); 
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
                          form_Racks_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['db_changed'] = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_qtd']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']--; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_I_E']--; 
              $this->NM_gera_nav_page(); 
              $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
              $this->sc_teve_excl = true; 
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
     sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Pop.php');
$modelLogs = new Logs($this);
$modelPop = new Pop($this);
$pop = $modelPop->getById(intval($this->id_pop_ ));
$pop = $pop ? $pop[0] : ["Nom_POP" => "", "ID_Empreendimento" => "", "Nom_Empreendimento" => ""];
$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Cadastro de rack',
	"Classe" => "Racks",
	"Conteudo" => [
		"id" => $this->id_ ,
		"id_pop" => $this->id_pop_ ,
		"nom_pop" => $pop["Nom_POP"],
		"ID_Empreendimento" => $pop["ID_Empreendimento"],
		"Nom_Empreendimento" => $pop["Nom_Empreendimento"],
		"nom_rack" => $this->nom_rack_ ,
		"id_operadora" => $this->id_operadora_ ,
		"num_contrato" => $this->num_contrato_ ,
		"InicioVigencia" => $this->iniciovigencia_ ,
		"FimVigencia" => $this->fimvigencia_ ,
		"valor_contrato" => $this->valor_contrato_ 
	]
]);
$this->isFullRack();
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
     sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Pop.php');
$modelLogs = new Logs($this);
$modelPop = new Pop($this);
$pop = $modelPop->getById(intval($this->id_pop_ ));
$pop = $pop ? $pop[0] : ["Nom_POP" => "", "ID_Empreendimento" => "", "Nom_Empreendimento" => ""];
$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de rack',
	"Classe" => "Racks",
	"Conteudo" => [
		"id" => $this->id_ ,
		"id_pop" => $this->id_pop_ ,
		"nom_pop" => $pop["Nom_POP"],
		"ID_Empreendimento" => $pop["ID_Empreendimento"],
		"Nom_Empreendimento" => $pop["Nom_Empreendimento"],
		"nom_rack" => $this->nom_rack_ ,
		"id_operadora" => $this->id_operadora_ ,
		"num_contrato" => $this->num_contrato_ ,
		"InicioVigencia" => $this->iniciovigencia_ ,
		"FimVigencia" => $this->fimvigencia_ ,
		"valor_contrato" => $this->valor_contrato_ 
	]
]);
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
     sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Pop.php');
$modelLogs = new Logs($this);
$modelPop = new Pop($this);
$pop = $modelPop->getById(intval($this->id_pop_ ));
$pop = $pop ? $pop[0] : ["Nom_POP" => "", "ID_Empreendimento" => "", "Nom_Empreendimento" => ""];
$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Remoção de rack',
	"Classe" => "Racks",
	"Conteudo" => [
		"id" => $this->id_ ,
		"id_pop" => $this->id_pop_ ,
		"nom_pop" => $pop["Nom_POP"],
		"ID_Empreendimento" => $pop["ID_Empreendimento"],
		"Nom_Empreendimento" => $pop["Nom_Empreendimento"],
		"nom_rack" => $this->nom_rack_ ,
		"id_operadora" => $this->id_operadora_ ,
		"num_contrato" => $this->num_contrato_ ,
		"InicioVigencia" => $this->iniciovigencia_ ,
		"FimVigencia" => $this->fimvigencia_ ,
		"valor_contrato" => $this->valor_contrato_ 
	]
]);
$this->isFullRack();
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          return;
      }
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['parms'] = "id_?#?$this->id_?@?"; 
      }
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_ = substr($this->Db->qstr($this->id_), 1, -1); 
      } 
   }
//---------- 
   function nm_select_banco() 
   { 
      global $nm_form_submit, $sc_seq_vert, $sc_check_incl, $teste_validade, $sc_where;
 
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['rows']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['rows']))
      {
          $this->sc_max_reg = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['rows'];
      } 
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['rows_ins']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['rows_ins']))
      {
          $this->sc_max_reg_incl = $_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['rows_ins'];
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_qtd_reg']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_qtd_reg'])
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['embutida_liga_qtd_reg'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg'] > 0 || strtolower($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg']) == "all"))
      {
          $this->sc_max_reg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_max_reg'];
      } 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
      $this->form_vert_form_Racks = array();
      if ($this->nmgp_opcao != "novo") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['parms'] = ""; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      if ($this->sc_teve_excl)
      {
          $this->nmgp_opcao = "avanca";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] -= $this->sc_max_reg;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0;
      }
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter'] . ")";
          }
      }
      $sc_where = trim("ID_POP = " . $_SESSION['ID_POP'] . "");
      if (substr(strtolower($sc_where), 0, 5) == "where")
      {
          $sc_where  = substr($sc_where , 5);
      }
      if (!empty($sc_where))
      {
          $sc_where = " where " . $sc_where . " ";
      }
      if ('' != $sc_where_filter)
      {
          $sc_where = (isset($sc_where) && '' != $sc_where) ? $sc_where . ' and (' . $sc_where_filter . ')' : ' where ' . $sc_where_filter;
      }
      if (((isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao) || (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)) && !$this->has_where_params && 'novo' != $this->nmgp_opcao)
      {
          $aNewWhereCond = array();
          if (null != $this->id_)
          {
              $aNewWhereCond[] = "ID = " . $this->id_;
          }
          if (!$this->NM_ajax_flag)
          {
              $this->NM_btn_navega = "S";
          }
          elseif (!empty($aNewWhereCond))
          {
              if ('' == $sc_where)
              {
                  $sc_where = " where (";
              }
              else
              {
                  $sc_where .= " and (";
              }
              $sc_where .= implode(" and ", $aNewWhereCond) . ")";
          }
      }
      if ('total' != $this->form_paginacao)
      {
          if ($this->app_is_initializing || $this->sc_teve_excl || $this->sc_teve_incl || (isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']))
          {
              $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where;
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select;
              $rt = $this->Db->Execute($nmgp_select);
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit;
              }
              $qt_geral_reg_form_Racks = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total'] = $qt_geral_reg_form_Racks;
              $rt->Close();
          }
      if ((isset($_POST['master_nav']) && 'on' == $_POST['master_nav']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_I_E'] = 0; 
          if (!$this->sc_teve_excl && !$this->sc_teve_incl) 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0; 
          } 
          if ($this->nmgp_opcao == "igual" && isset($this->NM_btn_navega) && 'S' == $this->NM_btn_navega && !empty($this->id_))
          {
              $Reg_OK      = false;
              $Count_start = -1;
              $sc_order_by = "";
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $Sel_Chave = "ID"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $Sel_Chave = "ID"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $Sel_Chave = "ID"; 
              }
              else  
              {
                  $Sel_Chave = "ID"; 
              }
              $nmgp_select = "SELECT " . $Sel_Chave . " from " . $this->Ini->nm_tabela . $sc_where; 
              $sc_order_by = "Nom_Rack ASC";
              $sc_order_by = str_replace("order by ", "", $sc_order_by);
              $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
              if (!empty($sc_order_by))
              {
                  $nmgp_select .= " order by $sc_order_by "; 
              }
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rt = $this->Db->Execute($nmgp_select) ; 
              if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
                  exit ; 
              }  
              while (!$rt->EOF && !$Reg_OK)
              { 
                  if ($rt->fields[0] == $this->id_)
                  { 
                      $Reg_OK = true;
                  }  
                  $Count_start++;
                  $rt->MoveNext();
              }  
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = $Count_start;
              $rt->Close(); 
          }
      } 
      else 
      { 
          $qt_geral_reg_form_Racks = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total'];
      } 
      if ($this->nmgp_opcao == "inicio" || $this->nmgp_opcao == "ordem") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0; 
      } 
      if ($this->nmgp_opcao == "navpage" && ($this->nmgp_ordem - 1) <= $qt_geral_reg_form_Racks) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = $this->nmgp_ordem - 1; 
      } 
      if ($this->nmgp_opcao == "avanca")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] += ($this->sc_max_reg + $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_I_E']); 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] > $qt_geral_reg_form_Racks)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = $qt_geral_reg_form_Racks - $this->sc_max_reg; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0; 
              }
          }
      } 
      if ($this->nmgp_opcao == "retorna") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] -= $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0; 
          }
      } 
      if ($this->nmgp_opcao == "final") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = ($qt_geral_reg_form_Racks + 1) - $this->sc_max_reg; 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] < 0)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] = 0; 
          }
      } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_I_E'] = 0; 
      }
      $Cmps_ord_def = array();
      $Cmps_ord_def[] = "ID";
      $Cmps_ord_def[] = "ID_POP";
      $Cmps_ord_def[] = "Nom_Rack";
      $Cmps_ord_def[] = "ID_Operadora";
      $Cmps_ord_def[] = "Num_Contrato";
      $Cmps_ord_def[] = "Valor_Contrato";
      $sc_order_by  = "";
      $sc_order_by = "Nom_Rack ASC";
      $sc_order_by = str_replace("order by ", "", $sc_order_by);
      $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
      if (!empty($sc_order_by))
      {
          $sc_order_by = " order by $sc_order_by "; 
      }
      if ($this->nmgp_opcao == "ordem" && in_array($this->nmgp_ordem, $Cmps_ord_def)) 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_cmp'] != $this->nmgp_ordem)
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_cmp'] = $this->nmgp_ordem; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_ord'] = ' asc'; 
          }
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_ord'] == ' asc')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_ord'] = ' desc'; 
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_ord'] = ' asc'; 
          }
      } 
      if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_cmp'])) 
      { 
          $sc_order_by = " order by " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_cmp'] . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['ordem_ord']; 
      } 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT ID, ID_POP, Nom_Rack, ID_Operadora, str_replace (convert(char(10),InicioVigencia,102), '.', '-') + ' ' + convert(char(8),InicioVigencia,20), Valor_Contrato, Num_Contrato, str_replace (convert(char(10),FimVigencia,102), '.', '-') + ' ' + convert(char(8),FimVigencia,20) from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT ID, ID_POP, Nom_Rack, ID_Operadora, convert(char(23),InicioVigencia,121), Valor_Contrato, Num_Contrato, convert(char(23),FimVigencia,121) from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT ID, ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT ID, ID_POP, Nom_Rack, ID_Operadora, EXTEND(InicioVigencia, YEAR TO DAY), Valor_Contrato, Num_Contrato, EXTEND(FimVigencia, YEAR TO DAY) from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      else 
      { 
          $nmgp_select = "SELECT ID, ID_POP, Nom_Rack, ID_Operadora, InicioVigencia, Valor_Contrato, Num_Contrato, FimVigencia from " . $this->Ini->nm_tabela . $sc_where . $sc_order_by; 
      } 
      if ($this->nmgp_opcao != "novo") 
      { 
      if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
      {
          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select;
          $rs = $this->Db->Execute($nmgp_select) ;
      }
      elseif ('total' == $this->form_paginacao)
      {
          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
      }
      else
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "R")
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          else 
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start']) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, $this->sc_max_reg, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] . ")" ; 
                  $rs = $this->Db->SelectLimit($nmgp_select, $this->sc_max_reg, $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start']) ; 
              } 
              else  
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
                  $rs = $this->Db->Execute($nmgp_select) ; 
                  if (!$rs === false && !$rs->EOF) 
                  { 
                      $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start']) ;  
                  } 
              } 
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
              $this->nm_flag_saida_novo = "S"; 
              $this->nmgp_opcao = "novo"; 
              $this->sc_evento  = "novo"; 
              $this->nmgp_botoes['voltarPOP'] = "on";
              if ($this->aba_iframe)
              {
                  $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          if ($rs->EOF && $this->nmgp_botoes['new'] != "on")
          {
              $this->nmgp_form_empty = true;
          }
          if ($rs->EOF)
          {
              $sc_seq_vert = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter'] = true;
              }
          }
          else
          {
              $sc_seq_vert = 1; 
          }
          if ('total' == $this->form_paginacao)
          {
              $bPagTest = true;
              $this->sc_max_reg = 0;
          }
          else
          {
              $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
          }
          while (!$rs->EOF && $bPagTest)
          { 
              if ('total' == $this->form_paginacao)
              {
                  $this->sc_max_reg++;
              }
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $guard_seq_vert = $sc_seq_vert;
                  $sc_seq_vert    = $this->nmgp_refresh_row;
              }
              if ('total' != $this->form_paginacao)
              {
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "R")
              { 
                  $this->sc_max_reg++;
              } 
              }
              $this->id_ = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_'] = $this->id_;
              $this->id_pop_ = $rs->fields[1] ; 
              $this->nmgp_dados_select['id_pop_'] = $this->id_pop_;
              $this->nom_rack_ = $rs->fields[2] ; 
              $this->nmgp_dados_select['nom_rack_'] = $this->nom_rack_;
              $this->id_operadora_ = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_operadora_'] = $this->id_operadora_;
              $this->iniciovigencia_ = $rs->fields[4] ; 
              $this->nmgp_dados_select['iniciovigencia_'] = $this->iniciovigencia_;
              $this->valor_contrato_ = $rs->fields[5] ; 
              $this->nmgp_dados_select['valor_contrato_'] = $this->valor_contrato_;
              $this->num_contrato_ = $rs->fields[6] ; 
              $this->nmgp_dados_select['num_contrato_'] = $this->num_contrato_;
              $this->fimvigencia_ = $rs->fields[7] ; 
              $this->nmgp_dados_select['fimvigencia_'] = $this->fimvigencia_;
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id_ = (string)$this->id_; 
              $this->id_pop_ = (string)$this->id_pop_; 
              $this->id_operadora_ = (string)$this->id_operadora_; 
              $this->valor_contrato_ = (string)$this->valor_contrato_; 
              if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['parms'])) 
              { 
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['parms'] = "id_?#?$this->id_?@?";
              } 
              $this->nm_proc_onload_record($sc_seq_vert);
//
//-- 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dados_select'][$sc_seq_vert] = $this->nmgp_dados_select;
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_Racks[$sc_seq_vert]['id_'] =  $this->id_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['id_pop_'] =  $this->id_pop_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['nom_rack_'] =  $this->nom_rack_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['id_operadora_'] =  $this->id_operadora_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['num_contrato_'] =  $this->num_contrato_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['iniciovigencia_'] =  $this->iniciovigencia_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['fimvigencia_'] =  $this->fimvigencia_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['valor_contrato_'] =  $this->valor_contrato_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['addfile_'] =  $this->addfile_; 
              $sc_seq_vert++; 
              $rs->MoveNext() ; 
              if (isset($this->NM_ajax_opcao) && 'backup_line' == $this->NM_ajax_opcao)
              {
                  $sc_seq_vert = $guard_seq_vert;
              }
              if ('total' != $this->form_paginacao)
              {
                  $bPagTest = $sc_seq_vert <= $this->sc_max_reg;
              }
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
          ksort ($this->form_vert_form_Racks); 
          $rs->Close(); 
          if ($this->form_paginacao == "total")
          {
              $this->SC_nav_page = "";
          }
          else
          {
              $this->NM_gera_nav_page(); 
          }
          $this->NM_ajax_info['navPage'] = $this->SC_nav_page; 
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] < (($qt_geral_reg_form_Racks + 1) - $this->sc_max_reg);
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao'] = '';
          }
      } 
      if ($this->nmgp_opcao == "novo") 
      { 
          $sc_seq_vert = 1; 
          $sc_check_incl = array(); 
          if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao) 
          { 
              $sc_seq_vert = $this->sc_seq_vert; 
              $this->sc_evento = "novo"; 
              $this->sc_max_reg_incl = $this->sc_seq_vert; 
          } 
          else 
          { 
              $this->sc_max_reg_incl = 0; 
          } 
          while ($sc_seq_vert <= $this->sc_max_reg_incl) 
          { 
              $this->id_ = "";  
              $this->id_pop_ = "";  
              $this->nom_rack_ = "";  
              $this->id_operadora_ = "";  
              $this->iniciovigencia_ = "";  
              $this->valor_contrato_ = "";  
              $this->num_contrato_ = "";  
              $this->fimvigencia_ = "";  
              $this->addfile_ = "";  
              $this->nm_proc_onload_record($sc_seq_vert);
              if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key']))
              {
                  foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['foreign_key'] as $sFKName => $sFKValue)
                  {
                      if (isset($this->sc_conv_var[$sFKName]))
                      {
                          $sFKName = $this->sc_conv_var[$sFKName];
                      }
                      eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
                  }
              }
              $this->nm_guardar_campos();
              $this->nm_formatar_campos();
             $this->form_vert_form_Racks[$sc_seq_vert]['id_'] =  $this->id_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['id_pop_'] =  $this->id_pop_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['nom_rack_'] =  $this->nom_rack_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['id_operadora_'] =  $this->id_operadora_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['num_contrato_'] =  $this->num_contrato_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['iniciovigencia_'] =  $this->iniciovigencia_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['fimvigencia_'] =  $this->fimvigencia_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['valor_contrato_'] =  $this->valor_contrato_; 
             $this->form_vert_form_Racks[$sc_seq_vert]['addfile_'] =  $this->addfile_; 
              $sc_seq_vert++; 
          } 
          if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
              $this->nm_proc_onload(false);
          }
      }  
  }
   function NM_gera_nav_page() 
   {
       $this->SC_nav_page = "";
       $Arr_result        = array();
       $Ind_result        = 0;
       $Reg_Page   = $this->sc_max_reg;
       $Max_link   = 5;
       $Mid_link   = ceil($Max_link / 2);
       $Corr_link  = (($Max_link % 2) == 0) ? 0 : 1;
       $rec_tot    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total'] + 1;
       $rec_fim    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['reg_start'] + $this->sc_max_reg;
       $rec_fim    = ($rec_fim > $rec_tot) ? $rec_tot : $rec_fim;
       if ($rec_tot == 0)
       {
           return;
       }
       $Qtd_Pages  = ceil($rec_tot / $Reg_Page);
       $Page_Atu   = ceil($rec_fim / $Reg_Page);
       $Link_ini   = 1;
       if ($Page_Atu > $Max_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       elseif ($Page_Atu > $Mid_link)
       {
           $Link_ini = $Page_Atu - $Mid_link + $Corr_link;
       }
       if (($Qtd_Pages - $Link_ini) < $Max_link)
       {
           $Link_ini = ($Qtd_Pages - $Max_link) + 1;
       }
       if ($Link_ini < 1)
       {
           $Link_ini = 1;
       }
       for ($x = 0; $x < $Max_link && $Link_ini <= $Qtd_Pages; $x++)
       {
           $rec = (($Link_ini - 1) * $Reg_Page) + 1;
           if ($Link_ini == $Page_Atu)
           {
               $Arr_result[$Ind_result] = '<span class="scFormToolbarNavOpen" style="vertical-align: middle;">' . $Link_ini . '</span>';
           }
           else
           {
               $Arr_result[$Ind_result] = '<a class="scFormToolbarNav" style="vertical-align: middle;" href="javascript: nm_navpage(' . $rec . ')">' . $Link_ini . '</a>';
           }
           $Link_ini++;
           $Ind_result++;
           if (($x + 1) < $Max_link && $Link_ini <= $Qtd_Pages && '' != $this->Ini->Str_toolbarnav_separator && @is_file($this->Ini->root . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator))
           {
               $Arr_result[$Ind_result] = '<img src="' . $this->Ini->path_img_global . $this->Ini->Str_toolbarnav_separator . '" align="absmiddle" style="vertical-align: middle;">';
               $Ind_result++;
           }
       }
       if ($_SESSION['hticnsdata']['reg_conf']['css_dir'] == "RTL")
       {
           krsort($Arr_result);
       }
       foreach ($Arr_result as $Ind_result => $Lin_result)
       {
           $this->SC_nav_page .= $Lin_result;
       }
   }
//
function isFullRack()
{
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_POP)) {$this->sc_temp_ID_POP = (isset($_SESSION['ID_POP'])) ? $_SESSION['ID_POP'] : "";}
     
 
      $nm_select = "SELECT a.Capacidade, count(b.ID) FROM tb_pop a LEFT JOIN tb_racks b ON b.ID_POP = a.ID WHERE a.ID = '$this->sc_temp_ID_POP' GROUP By a.ID"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[1] = str_replace(',', '.', $rx->fields[1]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 $rx->fields[1] = (strpos(strtolower($rx->fields[1]), "e")) ? (float)$rx->fields[1] : $rx->fields[1];
                 $rx->fields[1] = (string)$rx->fields[1];
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
$l = isset($this->rs[0][0]) ? $this->rs[0][0] - $this->rs[0][1] : 0;
if ($l <= 0)  {
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
} else {
	$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "on";;
	$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "on";;
}
if (isset($this->sc_temp_ID_POP)) { $_SESSION['ID_POP'] = $this->sc_temp_ID_POP;}
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off';
}
function voltar($start="update", $to="this", $typeRedir="sc_")
{
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'on';
     
if ($start == 'update') {
	$_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['start'] = 'update';
	$_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display']['num_conjunto'] = 'on';
	$_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display']['addconjunto'] = 'on';
} else {
	$_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['start'] = 'new';
	$_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display']['num_conjunto'] = 'off';
	$_SESSION['hticnsdata']['sc_apl_conf']['form_Racks']['field_display']['addconjunto'] = 'off';
}
$to = $to == "this" ? "form_Racks" : $to;
if ($typeRedir == 'sc_') {
	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($to, $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else if ($typeRedir == "header") {
	header("../$to");
} else if ($typeRedir == 'script') {
	echo '<script>window.location = "../'.$to.'";</script>';
}  else if ($typeRedir == 'ajax') {
	$javascript_function   = 'redirTo';
	$javascript_parameters = array(
									"../$to"
 	);
	$this->sc_ajax_javascript($javascript_function, $javascript_parameters);
}
$_SESSION['hticnsdata']['form_Racks']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_Racks_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
   if ($this->NM_ajax_flag && 'add_new_line' == $this->NM_ajax_opcao)
   {
        $this->Form_Corpo(true);
   }
   elseif ($this->NM_ajax_flag && 'table_refresh' == $this->NM_ajax_opcao)
   {
        $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['table_refresh'] = true;
        $this->Form_Table(true);
        $this->Form_Corpo(false, true);
   }
   else
   {
        $this->Form_Init();
        $this->Form_Table();
        $this->Form_Corpo();
        $this->Form_Fim();
   }
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

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

   function jqueryIconFile($sModule)
   {
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['csrf_token'];
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

   function Form_lookup_id_operadora_()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array(); 
}
if ($this->id_pop_ != "")
{ 
   $this->nm_clear_val("id_pop_");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $old_value_id_pop_ = $this->id_pop_;
   $old_value_iniciovigencia_ = $this->iniciovigencia_;
   $old_value_fimvigencia_ = $this->fimvigencia_;
   $old_value_valor_contrato_ = $this->valor_contrato_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_ = $this->id_;
   $unformatted_value_id_pop_ = $this->id_pop_;
   $unformatted_value_iniciovigencia_ = $this->iniciovigencia_;
   $unformatted_value_fimvigencia_ = $this->fimvigencia_;
   $unformatted_value_valor_contrato_ = $this->valor_contrato_;

   $nm_comando = "SELECT '-1', (
  SELECT tb1.Nom_Empreendimento FROM tb_empreendimentos as tb1 
  INNER JOIN tb_pop as tb2 ON tb2.ID_Empreendimento = tb1.ID_Empreendimento 
  WHERE tb2.ID = '$this->id_pop_'
) FROM dual UNION 
SELECT tb3.ID_Operadoras, tb3.Nom_Operadoras 
FROM tb_operadoras as tb3
WHERE tb3.Num_Status = 'S'";

   $this->id_ = $old_value_id_;
   $this->id_pop_ = $old_value_id_pop_;
   $this->iniciovigencia_ = $old_value_iniciovigencia_;
   $this->fimvigencia_ = $old_value_fimvigencia_;
   $this->valor_contrato_ = $old_value_valor_contrato_;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['Lookup_id_operadora_'][] = $rs->fields[0];
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
} 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_Racks_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "ID_POP", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Rack", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_operadora_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Operadora", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_POP", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Rack", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_operadora_($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Operadora", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Contrato", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Valor_Contrato", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter_form'] . " and (ID_POP = " . $_SESSION['ID_POP'] . ") and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID_POP = " . $_SESSION['ID_POP'] . " and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_Racks = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['total'] = $qt_geral_reg_form_Racks;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_Racks_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_Racks_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "id_pop";$nm_numeric[] = "id_operadora";$nm_numeric[] = "valor_contrato";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['decimal_db'] == ".")
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
      $Nm_datas['iniciovigencia'] = "date";$Nm_datas['fimvigencia'] = "date";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['SC_sep_date1'];
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
   function SC_lookup_id_operadora_($condicao, $campo)
   {
       return false;
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
       $nmgp_saida_form = "form_Racks_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_Racks_fim.php";
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
       form_Racks_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_Racks']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_Racks_pack_ajax_response();
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
       form_Racks_pack_ajax_response();
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
}
?>
