<?php
//
class form_CadastroTecnicos_apl
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
   var $tipo_tecnico;
   var $id_opepre;
   var $nom_tecnico;
   var $nom_sobrenome;
   var $data_ativacao;
   var $data_ativacao_hora;
   var $foto;
   var $foto_scfile_name;
   var $foto_ul_name;
   var $foto_scfile_type;
   var $foto_ul_type;
   var $foto_limpa;
   var $foto_salva;
   var $out_foto;
   var $out1_foto;
   var $num_rg;
   var $num_telefone1;
   var $num_telefone2;
   var $num_ativo;
   var $num_ativo_1;
   var $tecnicoporoperadora;
   var $tecnicoporoperadora_hidden;
   var $savedataonclick;
   var $reativaronclick;
   var $removeronclick;
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
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_ativacao']))
          {
              $this->data_ativacao = $this->NM_ajax_info['param']['data_ativacao'];
          }
          if (isset($this->NM_ajax_info['param']['foto']))
          {
              $this->foto = $this->NM_ajax_info['param']['foto'];
          }
          if (isset($this->NM_ajax_info['param']['foto_limpa']))
          {
              $this->foto_limpa = $this->NM_ajax_info['param']['foto_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['foto_ul_name']))
          {
              $this->foto_ul_name = $this->NM_ajax_info['param']['foto_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['foto_ul_type']))
          {
              $this->foto_ul_type = $this->NM_ajax_info['param']['foto_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['id_opepre']))
          {
              $this->id_opepre = $this->NM_ajax_info['param']['id_opepre'];
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
          if (isset($this->NM_ajax_info['param']['nom_sobrenome']))
          {
              $this->nom_sobrenome = $this->NM_ajax_info['param']['nom_sobrenome'];
          }
          if (isset($this->NM_ajax_info['param']['nom_tecnico']))
          {
              $this->nom_tecnico = $this->NM_ajax_info['param']['nom_tecnico'];
          }
          if (isset($this->NM_ajax_info['param']['num_ativo']))
          {
              $this->num_ativo = $this->NM_ajax_info['param']['num_ativo'];
          }
          if (isset($this->NM_ajax_info['param']['num_rg']))
          {
              $this->num_rg = $this->NM_ajax_info['param']['num_rg'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefone1']))
          {
              $this->num_telefone1 = $this->NM_ajax_info['param']['num_telefone1'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefone2']))
          {
              $this->num_telefone2 = $this->NM_ajax_info['param']['num_telefone2'];
          }
          if (isset($this->NM_ajax_info['param']['reativaronclick']))
          {
              $this->reativaronclick = $this->NM_ajax_info['param']['reativaronclick'];
          }
          if (isset($this->NM_ajax_info['param']['removeronclick']))
          {
              $this->removeronclick = $this->NM_ajax_info['param']['removeronclick'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['tecnicoporoperadora']))
          {
              $this->tecnicoporoperadora = $this->NM_ajax_info['param']['tecnicoporoperadora'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_tecnico']))
          {
              $this->tipo_tecnico = $this->NM_ajax_info['param']['tipo_tecnico'];
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
      if (isset($this->grid_ID_Tecnico) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grid_ID_Tecnico'] = $this->grid_ID_Tecnico;
      }
      if (isset($_POST["grid_ID_Tecnico"]) && isset($this->grid_ID_Tecnico)) 
      {
          $_SESSION['grid_ID_Tecnico'] = $this->grid_ID_Tecnico;
      }
      if (!isset($_POST["grid_ID_Tecnico"]) && isset($_POST["grid_id_tecnico"])) 
      {
          $_SESSION['grid_ID_Tecnico'] = $this->grid_id_tecnico;
      }
      if (isset($_GET["grid_ID_Tecnico"]) && isset($this->grid_ID_Tecnico)) 
      {
          $_SESSION['grid_ID_Tecnico'] = $this->grid_ID_Tecnico;
      }
      if (!isset($_GET["grid_ID_Tecnico"]) && isset($_GET["grid_id_tecnico"])) 
      {
          $_SESSION['grid_ID_Tecnico'] = $this->grid_id_tecnico;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['embutida_parms']);
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
                 nm_limpa_str_form_CadastroTecnicos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->grid_ID_Tecnico) && isset($this->grid_id_tecnico)) 
          {
              $this->grid_ID_Tecnico = $this->grid_id_tecnico;
          }
          if (isset($this->grid_ID_Tecnico)) 
          {
              $_SESSION['grid_ID_Tecnico'] = $this->grid_ID_Tecnico;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->grid_ID_Tecnico) && isset($this->grid_id_tecnico)) 
          {
              $this->grid_ID_Tecnico = $this->grid_id_tecnico;
          }
          if (isset($this->grid_ID_Tecnico)) 
          {
              $_SESSION['grid_ID_Tecnico'] = $this->grid_ID_Tecnico;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['parms']);
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
          $aDtParts = explode(' ', $this->data_ativacao);
          $this->data_ativacao      = $aDtParts[0];
          $this->data_ativacao_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_CadastroTecnicos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['upload_field_info'] = array();

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroTecnicos']['upload_field_info']['foto'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_CadastroTecnicos',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '200',
          'upload_file_width'  => '200',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadastroTecnicos']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadastroTecnicos'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastroTecnicos']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastroTecnicos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_CadastroTecnicos') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastroTecnicos']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tb_tecoperadora";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_CadastroTecnicos")
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
      $this->nm_new_label['nom_tecnico'] = '' . $this->Ini->Nm_lang['lang_label_name'] . '';
      $this->nm_new_label['nom_sobrenome'] = '' . $this->Ini->Nm_lang['lang_label_lastname'] . '';
      $this->nm_new_label['foto'] = '' . $this->Ini->Nm_lang['lang_label_photo'] . '';
      $this->nm_new_label['num_telefone1'] = '' . $this->Ini->Nm_lang['lang_label_primaryphone'] . '';
      $this->nm_new_label['num_ativo'] = '' . $this->Ini->Nm_lang['lang_label_status'] . '';
      $this->nm_new_label['tecnicoporoperadora'] = '' . $this->Ini->Nm_lang['lang_label_technicalperoperator'] . '';

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

      $this->arr_buttons['salvar']['hint']             = "";
      $this->arr_buttons['salvar']['type']             = "button";
      $this->arr_buttons['salvar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['display']          = "only_text";
      $this->arr_buttons['salvar']['display_position'] = "text_right";
      $this->arr_buttons['salvar']['style']            = "default";
      $this->arr_buttons['salvar']['image']            = "";

      $this->arr_buttons['confimeremover']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['confimeremover']['type']             = "button";
      $this->arr_buttons['confimeremover']['value']            = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['confimeremover']['display']          = "only_text";
      $this->arr_buttons['confimeremover']['display_position'] = "text_right";
      $this->arr_buttons['confimeremover']['style']            = "default";
      $this->arr_buttons['confimeremover']['image']            = "";

      $this->arr_buttons['confimereativar']['hint']             = "" . $this->Ini->Nm_lang['lang_label_reativartecnico'] . "";
      $this->arr_buttons['confimereativar']['type']             = "button";
      $this->arr_buttons['confimereativar']['value']            = "" . $this->Ini->Nm_lang['lang_label_reativartecnico'] . "";
      $this->arr_buttons['confimereativar']['display']          = "only_text";
      $this->arr_buttons['confimereativar']['display_position'] = "text_right";
      $this->arr_buttons['confimereativar']['style']            = "default";
      $this->arr_buttons['confimereativar']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_CadastroTecnicos']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_CadastroTecnicos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['foto_ul_name']) && '' != $this->NM_ajax_info['param']['foto_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_field_ul_name'][$this->foto_ul_name]))
          {
              $this->NM_ajax_info['param']['foto_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_field_ul_name'][$this->foto_ul_name];
          }
          $this->foto = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['foto_ul_name'];
          $this->foto_scfile_name = substr($this->NM_ajax_info['param']['foto_ul_name'], 12);
          $this->foto_scfile_type = $this->NM_ajax_info['param']['foto_ul_type'];
          $this->foto_ul_name = $this->NM_ajax_info['param']['foto_ul_name'];
          $this->foto_ul_type = $this->NM_ajax_info['param']['foto_ul_type'];
      }
      elseif (isset($this->foto_ul_name) && '' != $this->foto_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_field_ul_name'][$this->foto_ul_name]))
          {
              $this->foto_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_field_ul_name'][$this->foto_ul_name];
          }
          $this->foto = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->foto_ul_name;
          $this->foto_scfile_name = substr($this->foto_ul_name, 12);
          $this->foto_scfile_type = $this->foto_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "off";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "off";
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
      $this->nmgp_botoes['confimeRemover'] = "on";
      $this->nmgp_botoes['confimeReativar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_orig'] = " where ID = '" . $_SESSION['grid_ID_Tecnico'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_pesq'] = " where ID = '" . $_SESSION['grid_ID_Tecnico'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroTecnicos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadastroTecnicos'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadastroTecnicos'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_CadastroTecnicos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_CadastroTecnicos/form_CadastroTecnicos_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_CadastroTecnicos_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_CadastroTecnicos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_CadastroTecnicos_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_CadastroTecnicos/form_CadastroTecnicos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_CadastroTecnicos_erro.class.php"); 
      }
      $this->Erro      = new form_CadastroTecnicos_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroTecnicos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltar'] = "on";
          $this->nmgp_botoes['salvar'] = "on";
          $this->nmgp_botoes['confimeRemover'] = "off";
          $this->nmgp_botoes['confimeReativar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['botoes']['voltar'];
          $this->nmgp_botoes['salvar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['botoes']['salvar'];
          $this->nmgp_botoes['confimeRemover'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['botoes']['confimeRemover'];
          $this->nmgp_botoes['confimeReativar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['botoes']['confimeReativar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->id_opepre)) { $this->nm_limpa_alfa($this->id_opepre); }
      if (isset($this->nom_tecnico)) { $this->nm_limpa_alfa($this->nom_tecnico); }
      if (isset($this->nom_sobrenome)) { $this->nm_limpa_alfa($this->nom_sobrenome); }
      if (isset($this->num_rg)) { $this->nm_limpa_alfa($this->num_rg); }
      if (isset($this->num_telefone1)) { $this->nm_limpa_alfa($this->num_telefone1); }
      if (isset($this->num_telefone2)) { $this->nm_limpa_alfa($this->num_telefone2); }
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_select'];
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
      //-- data_ativacao
      $this->field_config['data_ativacao']                 = array();
      $this->field_config['data_ativacao']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['data_ativacao']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_ativacao']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['data_ativacao']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'data_ativacao');
      //-- id_opepre
      $this->field_config['id_opepre']               = array();
      $this->field_config['id_opepre']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_opepre']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_opepre']['symbol_dec'] = '';
      $this->field_config['id_opepre']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_opepre']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
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
          if ('validate_foto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'foto');
          }
          if ('validate_nom_tecnico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_tecnico');
          }
          if ('validate_nom_sobrenome' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_sobrenome');
          }
          if ('validate_num_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_ativo');
          }
          if ('validate_num_rg' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_rg');
          }
          if ('validate_num_telefone1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefone1');
          }
          if ('validate_num_telefone2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefone2');
          }
          if ('validate_data_ativacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_ativacao');
          }
          if ('validate_tipo_tecnico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_tecnico');
          }
          if ('validate_id_opepre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_opepre');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_tecnicoporoperadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tecnicoporoperadora');
          }
          if ('validate_reativaronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'reativaronclick');
          }
          if ('validate_removeronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'removeronclick');
          }
          form_CadastroTecnicos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_reativaronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->reativarOnClick_onClick();
          }
          if ('event_removeronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->removerOnClick_onClick();
          }
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          form_CadastroTecnicos_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->num_ativo))
          {
              $x = 0; 
              $this->num_ativo_1 = $this->num_ativo;
              $this->num_ativo = ""; 
              if ($this->num_ativo_1 != "") 
              { 
                  foreach ($this->num_ativo_1 as $dados_num_ativo_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->num_ativo .= ";";
                      } 
                      $this->num_ativo .= $dados_num_ativo_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_CadastroTecnicos_pack_ajax_response();
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
          $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_CadastroTecnicos_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_redir_atualiz'] == "ok")
          {
              if ($this->sc_evento == "update")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
              if ($this->sc_evento == "delete")
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_CadastroTecnicos_pack_ajax_response();
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
          form_CadastroTecnicos_pack_ajax_response();
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "./";
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_data($this->data_ativacao, $this->field_config['data_ativacao']['date_sep']) ; 
      nm_limpa_hora($this->data_ativacao_hora, $this->field_config['data_ativacao']['time_sep']) ; 
      nm_limpa_numero($this->id_opepre, $this->field_config['id_opepre']['symbol_grp']) ; 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
        $this->voltar("update", "grid_ConsultaTecnicos");
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
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
           case 'foto':
               return "" . $this->Ini->Nm_lang['lang_label_photo'] . "";
               break;
           case 'nom_tecnico':
               return "" . $this->Ini->Nm_lang['lang_label_name'] . "";
               break;
           case 'nom_sobrenome':
               return "" . $this->Ini->Nm_lang['lang_label_lastname'] . "";
               break;
           case 'num_ativo':
               return "" . $this->Ini->Nm_lang['lang_label_status'] . "";
               break;
           case 'num_rg':
               return "RG";
               break;
           case 'num_telefone1':
               return "" . $this->Ini->Nm_lang['lang_label_primaryphone'] . "";
               break;
           case 'num_telefone2':
               return "" . $this->Ini->Nm_lang['lang_label_secondaryphone'] . " (" . $this->Ini->Nm_lang['lang_label_optional'] . ")";
               break;
           case 'data_ativacao':
               return "Data Ativacao";
               break;
           case 'tipo_tecnico':
               return "Tipo Tecnico";
               break;
           case 'id_opepre':
               return "ID Ope Pre";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'tecnicoporoperadora':
               return "" . $this->Ini->Nm_lang['lang_label_technicalperoperator'] . "";
               break;
           case 'reativaronclick':
               return "reativarOnClick";
               break;
           case 'removeronclick':
               return "removerOnClick";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_CadastroTecnicos']) || !is_array($this->NM_ajax_info['errList']['geral_form_CadastroTecnicos']))
              {
                  $this->NM_ajax_info['errList']['geral_form_CadastroTecnicos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_CadastroTecnicos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'foto' == $filtro)
        $this->ValidateField_foto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_tecnico' == $filtro)
        $this->ValidateField_nom_tecnico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_sobrenome' == $filtro)
        $this->ValidateField_nom_sobrenome($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_ativo' == $filtro)
        $this->ValidateField_num_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_rg' == $filtro)
        $this->ValidateField_num_rg($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefone1' == $filtro)
        $this->ValidateField_num_telefone1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefone2' == $filtro)
        $this->ValidateField_num_telefone2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_ativacao' == $filtro)
        $this->ValidateField_data_ativacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_tecnico' == $filtro)
        $this->ValidateField_tipo_tecnico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_opepre' == $filtro)
        $this->ValidateField_id_opepre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tecnicoporoperadora' == $filtro)
        $this->ValidateField_tecnicoporoperadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'reativaronclick' == $filtro)
        $this->ValidateField_reativaronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'removeronclick' == $filtro)
        $this->ValidateField_removeronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         $this->num_ativo  = $this->num_ativo  ?: "N";
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
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

    function ValidateField_foto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->foto;
            if ("" != $this->foto && "S" != $this->foto_limpa && !$teste_validade->ArqExtensao($this->foto, array()))
            {
                $Campos_Crit .= "{lang_label_photo}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['foto']))
                {
                    $Campos_Erros['foto'] = array();
                }
                $Campos_Erros['foto'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['foto']) || !is_array($this->NM_ajax_info['errList']['foto']))
                {
                    $this->NM_ajax_info['errList']['foto'] = array();
                }
                $this->NM_ajax_info['errList']['foto'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if ("" != $this->foto && "S" != $this->foto_limpa && method_exists($teste_validade, 'ArqTamanho') && !$teste_validade->ArqTamanho($sTestFile, 2097152))
            {
                $Campos_Crit .= "{lang_label_photo}: " . $this->Ini->Nm_lang['lang_errm_file_size']; 
                if (!isset($Campos_Erros['foto']))
                {
                    $Campos_Erros['foto'] = array();
                }
                $Campos_Erros['foto'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
                if (!isset($this->NM_ajax_info['errList']['foto']) || !is_array($this->NM_ajax_info['errList']['foto']))
                {
                    $this->NM_ajax_info['errList']['foto'] = array();
                }
                $this->NM_ajax_info['errList']['foto'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
            }
        }
    } // ValidateField_foto

    function ValidateField_nom_tecnico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_tecnico) > 50) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_tecnico']))
              {
                  $Campos_Erros['nom_tecnico'] = array();
              }
              $Campos_Erros['nom_tecnico'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_tecnico']) || !is_array($this->NM_ajax_info['errList']['nom_tecnico']))
              {
                  $this->NM_ajax_info['errList']['nom_tecnico'] = array();
              }
              $this->NM_ajax_info['errList']['nom_tecnico'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_tecnico

    function ValidateField_nom_sobrenome(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_sobrenome) > 50) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_lastname'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_sobrenome']))
              {
                  $Campos_Erros['nom_sobrenome'] = array();
              }
              $Campos_Erros['nom_sobrenome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_sobrenome']) || !is_array($this->NM_ajax_info['errList']['nom_sobrenome']))
              {
                  $this->NM_ajax_info['errList']['nom_sobrenome'] = array();
              }
              $this->NM_ajax_info['errList']['nom_sobrenome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_sobrenome

    function ValidateField_num_ativo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->num_ativo == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->num_ativo = "";
      } 
      else 
      { 
          if (is_array($this->num_ativo))
          {
              $x = 0; 
              $this->num_ativo_1 = array(); 
              foreach ($this->num_ativo as $ind => $dados_num_ativo_1 ) 
              {
                  if ($dados_num_ativo_1 != "") 
                  {
                      $this->num_ativo_1[] = $dados_num_ativo_1;
                  } 
              } 
              $this->num_ativo = ""; 
              foreach ($this->num_ativo_1 as $dados_num_ativo_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->num_ativo .= ";";
                   } 
                   $this->num_ativo .= $dados_num_ativo_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_num_ativo

    function ValidateField_num_rg(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->num_rg, explode(';', "9.999.999-*;99.999.999-*;999.999.999-*")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['num_rg']))
              {
                  $Campos_Erros['num_rg'] = array();
              }
              $Campos_Erros['num_rg'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['num_rg']) || !is_array($this->NM_ajax_info['errList']['num_rg']))
                  {
                      $this->NM_ajax_info['errList']['num_rg'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_rg'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_rg) > 45) 
          { 
              $Campos_Crit .= "RG " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_rg']))
              {
                  $Campos_Erros['num_rg'] = array();
              }
              $Campos_Erros['num_rg'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_rg']) || !is_array($this->NM_ajax_info['errList']['num_rg']))
              {
                  $this->NM_ajax_info['errList']['num_rg'] = array();
              }
              $this->NM_ajax_info['errList']['num_rg'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_rg

    function ValidateField_num_telefone1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->num_telefone1, explode(';', "(99) 9999-9999;(99) 99999-9999")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['num_telefone1']))
              {
                  $Campos_Erros['num_telefone1'] = array();
              }
              $Campos_Erros['num_telefone1'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['num_telefone1']) || !is_array($this->NM_ajax_info['errList']['num_telefone1']))
                  {
                      $this->NM_ajax_info['errList']['num_telefone1'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_telefone1'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefone1) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_primaryphone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_telefone1']))
              {
                  $Campos_Erros['num_telefone1'] = array();
              }
              $Campos_Erros['num_telefone1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_telefone1']) || !is_array($this->NM_ajax_info['errList']['num_telefone1']))
              {
                  $this->NM_ajax_info['errList']['num_telefone1'] = array();
              }
              $this->NM_ajax_info['errList']['num_telefone1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_telefone1

    function ValidateField_num_telefone2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->num_telefone2, explode(';', "(99) 9999-9999;(99) 99999-9999")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['num_telefone2']))
              {
                  $Campos_Erros['num_telefone2'] = array();
              }
              $Campos_Erros['num_telefone2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['num_telefone2']) || !is_array($this->NM_ajax_info['errList']['num_telefone2']))
                  {
                      $this->NM_ajax_info['errList']['num_telefone2'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_telefone2'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefone2) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_secondaryphone'] . " (" . $this->Ini->Nm_lang['lang_label_optional'] . ") " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_telefone2']))
              {
                  $Campos_Erros['num_telefone2'] = array();
              }
              $Campos_Erros['num_telefone2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_telefone2']) || !is_array($this->NM_ajax_info['errList']['num_telefone2']))
              {
                  $this->NM_ajax_info['errList']['num_telefone2'] = array();
              }
              $this->NM_ajax_info['errList']['num_telefone2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_telefone2

    function ValidateField_data_ativacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_ativacao, $this->field_config['data_ativacao']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao == "incluir")
      { 
          $guarda_datahora = $this->field_config['data_ativacao']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_ativacao']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_ativacao']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_ativacao']['date_sep']) ; 
          if (trim($this->data_ativacao) != "")  
          { 
              if ($teste_validade->Data($this->data_ativacao, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Data Ativacao; " ; 
                  if (!isset($Campos_Erros['data_ativacao']))
                  {
                      $Campos_Erros['data_ativacao'] = array();
                  }
                  $Campos_Erros['data_ativacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_ativacao']) || !is_array($this->NM_ajax_info['errList']['data_ativacao']))
                  {
                      $this->NM_ajax_info['errList']['data_ativacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_ativacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_ativacao']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->data_ativacao_hora, $this->field_config['data_ativacao_hora']['time_sep']) ; 
      if ($this->nmgp_opcao == "incluir")
      {
          $Format_Hora = $this->field_config['data_ativacao_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['data_ativacao_hora']['time_sep']) ; 
          if (trim($this->data_ativacao_hora) != "")  
          { 
              if ($teste_validade->Hora($this->data_ativacao_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Data Ativacao; " ; 
                  if (!isset($Campos_Erros['data_ativacao_hora']))
                  {
                      $Campos_Erros['data_ativacao_hora'] = array();
                  }
                  $Campos_Erros['data_ativacao_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_ativacao']) || !is_array($this->NM_ajax_info['errList']['data_ativacao']))
                  {
                      $this->NM_ajax_info['errList']['data_ativacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_ativacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['data_ativacao']) && isset($Campos_Erros['data_ativacao_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['data_ativacao'], $Campos_Erros['data_ativacao_hora']);
          if (empty($Campos_Erros['data_ativacao_hora']))
          {
              unset($Campos_Erros['data_ativacao_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['data_ativacao']))
          {
              $this->NM_ajax_info['errList']['data_ativacao'] = array_unique($this->NM_ajax_info['errList']['data_ativacao']);
          }
      }
    } // ValidateField_data_ativacao_hora

    function ValidateField_tipo_tecnico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_tecnico) > 255) 
          { 
              $Campos_Crit .= "Tipo Tecnico " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_tecnico']))
              {
                  $Campos_Erros['tipo_tecnico'] = array();
              }
              $Campos_Erros['tipo_tecnico'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_tecnico']) || !is_array($this->NM_ajax_info['errList']['tipo_tecnico']))
              {
                  $this->NM_ajax_info['errList']['tipo_tecnico'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_tecnico'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_tipo_tecnico

    function ValidateField_id_opepre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_opepre == "")  
      { 
          $this->id_opepre = 0;
          $this->sc_force_zero[] = 'id_opepre';
      } 
      nm_limpa_numero($this->id_opepre, $this->field_config['id_opepre']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_opepre != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_opepre) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID Ope Pre: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_opepre']))
                  {
                      $Campos_Erros['id_opepre'] = array();
                  }
                  $Campos_Erros['id_opepre'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_opepre']) || !is_array($this->NM_ajax_info['errList']['id_opepre']))
                  {
                      $this->NM_ajax_info['errList']['id_opepre'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_opepre'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_opepre, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID Ope Pre; " ; 
                  if (!isset($Campos_Erros['id_opepre']))
                  {
                      $Campos_Erros['id_opepre'] = array();
                  }
                  $Campos_Erros['id_opepre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_opepre']) || !is_array($this->NM_ajax_info['errList']['id_opepre']))
                  {
                      $this->NM_ajax_info['errList']['id_opepre'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_opepre'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_opepre

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

    function ValidateField_tecnicoporoperadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tecnicoporoperadora != "")
      {
          $x = 0; 
          $this->tecnicoporoperadora_1 = explode("@?@", $this->tecnicoporoperadora);
          $this->tecnicoporoperadora = ""; 
          if ($this->tecnicoporoperadora_1 != "") 
          { 
              foreach ($this->tecnicoporoperadora_1 as $dados_tecnicoporoperadora_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->tecnicoporoperadora .= "@?@";
                       } 
                       $this->tecnicoporoperadora .= $dados_tecnicoporoperadora_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora']) && !in_array($dados_tecnicoporoperadora_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['tecnicoporoperadora']))
                           {
                               $Campos_Erros['tecnicoporoperadora'] = array();
                           }
                           $Campos_Erros['tecnicoporoperadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['tecnicoporoperadora']) || !is_array($this->NM_ajax_info['errList']['tecnicoporoperadora']))
                           {
                               $this->NM_ajax_info['errList']['tecnicoporoperadora'] = array();
                           }
                           $this->NM_ajax_info['errList']['tecnicoporoperadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_tecnicoporoperadora

    function ValidateField_reativaronclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->reativaronclick) > 20) 
          { 
              $Campos_Crit .= "reativarOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['reativaronclick']))
              {
                  $Campos_Erros['reativaronclick'] = array();
              }
              $Campos_Erros['reativaronclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['reativaronclick']) || !is_array($this->NM_ajax_info['errList']['reativaronclick']))
              {
                  $this->NM_ajax_info['errList']['reativaronclick'] = array();
              }
              $this->NM_ajax_info['errList']['reativaronclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_reativaronclick

    function ValidateField_removeronclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->removeronclick) > 20) 
          { 
              $Campos_Crit .= "removerOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['removeronclick']))
              {
                  $Campos_Erros['removeronclick'] = array();
              }
              $Campos_Erros['removeronclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['removeronclick']) || !is_array($this->NM_ajax_info['errList']['removeronclick']))
              {
                  $this->NM_ajax_info['errList']['removeronclick'] = array();
              }
              $this->NM_ajax_info['errList']['removeronclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_removeronclick
//
//--------------------------------------------------------------------------------------
   function upload_img_doc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros) 
   {
     global $nm_browser;
     if (!empty($Campos_Crit) || !empty($Campos_Falta))
     {
          return;
     }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->foto == "none") 
          { 
              $this->foto = ""; 
          } 
          if ($this->foto != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_CadastroTecnicos_doc_name.php';
              }
              $this->foto = sc_upload_unprotect_chars($this->foto);
              $this->foto_scfile_name = sc_upload_unprotect_chars($this->foto_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->foto_scfile_type = substr($this->foto_scfile_type, 0, strpos($this->foto_scfile_type, ";")) ; 
              } 
              if ($this->foto_scfile_type == "image/pjpeg" || $this->foto_scfile_type == "image/jpeg" || $this->foto_scfile_type == "image/gif" ||  
                  $this->foto_scfile_type == "image/png" || $this->foto_scfile_type == "image/x-png" || $this->foto_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->foto))  
                  { 
                      $reg_foto = file_get_contents($this->foto); 
                      $this->foto = $reg_foto; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_photo'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->foto = "";
                      if (!isset($Campos_Erros['foto']))
                      {
                          $Campos_Erros['foto'] = array();
                      }
                      $Campos_Erros['foto'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['foto']) || !is_array($this->NM_ajax_info['errList']['foto']))
                      {
                          $this->NM_ajax_info['errList']['foto'] = array();
                      }
                      $this->NM_ajax_info['errList']['foto'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->foto = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_photo'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['foto']))
                      {
                          $Campos_Erros['foto'] = array();
                      }
                      $Campos_Erros['foto'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['foto']) || !is_array($this->NM_ajax_info['errList']['foto']))
                      {
                          $this->NM_ajax_info['errList']['foto'] = array();
                      }
                      $this->NM_ajax_info['errList']['foto'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form']['foto']) && $this->foto_limpa != "S")
          {
              $this->foto = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form']['foto'];
          }
      } 
   }

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
    if (empty($this->foto))
    {
        $this->foto = $this->nmgp_dados_form['foto'];
    }
    $this->nmgp_dados_form['foto'] = $this->foto;
    $this->nmgp_dados_form['foto_limpa'] = $this->foto_limpa;
    $this->nmgp_dados_form['nom_tecnico'] = $this->nom_tecnico;
    $this->nmgp_dados_form['nom_sobrenome'] = $this->nom_sobrenome;
    $this->nmgp_dados_form['num_ativo'] = $this->num_ativo;
    $this->nmgp_dados_form['num_rg'] = $this->num_rg;
    $this->nmgp_dados_form['num_telefone1'] = $this->num_telefone1;
    $this->nmgp_dados_form['num_telefone2'] = $this->num_telefone2;
    $this->nmgp_dados_form['data_ativacao'] = $this->data_ativacao;
    $this->nmgp_dados_form['tipo_tecnico'] = $this->tipo_tecnico;
    $this->nmgp_dados_form['id_opepre'] = $this->id_opepre;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['tecnicoporoperadora'] = $this->tecnicoporoperadora;
    $this->nmgp_dados_form['reativaronclick'] = $this->reativaronclick;
    $this->nmgp_dados_form['removeronclick'] = $this->removeronclick;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_data($this->data_ativacao, $this->field_config['data_ativacao']['date_sep']) ; 
      nm_limpa_hora($this->data_ativacao_hora, $this->field_config['data_ativacao']['time_sep']) ; 
      nm_limpa_numero($this->id_opepre, $this->field_config['id_opepre']['symbol_grp']) ; 
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
      if ($Nome_Campo == "num_rg")
      {
          $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_telefone1")
      {
          $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_telefone2")
      {
          $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "id_opepre")
      {
          nm_limpa_numero($this->id_opepre, $this->field_config['id_opepre']['symbol_grp']) ; 
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
      if (!empty($this->num_rg) || (!empty($format_fields) && isset($format_fields['num_rg'])))
      {
          $this->nm_gera_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*"); 
      }
      if (!empty($this->num_telefone1) || (!empty($format_fields) && isset($format_fields['num_telefone1'])))
      {
          $this->nm_gera_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999"); 
      }
      if (!empty($this->num_telefone2) || (!empty($format_fields) && isset($format_fields['num_telefone2'])))
      {
          $this->nm_gera_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999"); 
      }
      if ((!empty($this->data_ativacao) && 'null' != $this->data_ativacao) || (!empty($format_fields) && isset($format_fields['data_ativacao'])))
      {
          $nm_separa_data = strpos($this->field_config['data_ativacao']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['data_ativacao']['date_format'];
          $this->field_config['data_ativacao']['date_format'] = substr($this->field_config['data_ativacao']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->data_ativacao, " ") ; 
          $this->data_ativacao_hora = substr($this->data_ativacao, $separador + 1) ; 
          $this->data_ativacao = substr($this->data_ativacao, 0, $separador) ; 
          nm_volta_data($this->data_ativacao, $this->field_config['data_ativacao']['date_format']) ; 
          nmgp_Form_Datas($this->data_ativacao, $this->field_config['data_ativacao']['date_format'], $this->field_config['data_ativacao']['date_sep']) ;  
          $this->field_config['data_ativacao']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->data_ativacao_hora, $this->field_config['data_ativacao']['date_format']) ; 
          nmgp_Form_Hora($this->data_ativacao_hora, $this->field_config['data_ativacao']['date_format'], $this->field_config['data_ativacao']['time_sep']) ;  
          $this->field_config['data_ativacao']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->data_ativacao || '' == $this->data_ativacao)
      {
          $this->data_ativacao_hora = '';
          $this->data_ativacao = '';
      }
      if (!empty($this->id_opepre) || (!empty($format_fields) && isset($format_fields['id_opepre'])))
      {
          nmgp_Form_Num_Val($this->id_opepre, $this->field_config['id_opepre']['symbol_grp'], $this->field_config['id_opepre']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_opepre']['symbol_fmt']) ; 
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
   function nm_validate_mask($value, $mask_list)
   {
       if ('' == $value)
       {
           return true;
       }

       $size_ok   = false;
       $test_mask = '';
       foreach ($mask_list as $tmp_mask)
       {
           if (strlen($value) == strlen($tmp_mask))
           {
               $size_ok   = true;
               $test_mask = $tmp_mask;
           }
       }

       if (!$size_ok)
       {
           return false;
       }

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (!$this->nm_validate_mask_char($value[$i], $test_mask[$i]))
           {
               return false;
           }
       }

       return true;
   }

   function nm_validate_mask_char($value_char, $mask_char)
   {
       switch ($mask_char)
       {
           case '9':
               return false !== strpos('0123456789', $value_char);
               break;

           case 'a':
               return false !== strpos('abcdefghijklmnopqrstuvwxyz', strtolower($value_char));
               break;

           case '*':
               return false !== strpos('abcdefghijklmnopqrstuvwxyz0123456789', strtolower($value_char));
               break;

           default:
               return $value_char == $mask_char;
               break;
       }
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
      $guarda_format_hora = $this->field_config['data_ativacao']['date_format'];
      if ($this->data_ativacao != "")  
      { 
          $nm_separa_data = strpos($this->field_config['data_ativacao']['date_format'], ";") ;
          $this->field_config['data_ativacao']['date_format'] = substr($this->field_config['data_ativacao']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->data_ativacao, $this->field_config['data_ativacao']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->data_ativacao = str_replace('-', '', $this->data_ativacao);
          }
          $this->field_config['data_ativacao']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->data_ativacao_hora, $this->field_config['data_ativacao']['date_format']) ; 
          if ($this->data_ativacao_hora == "" )  
          { 
              $this->data_ativacao_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4) . "." . substr($this->data_ativacao_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->data_ativacao_hora = substr($this->data_ativacao_hora, 0, -4);
          }
          if ($this->data_ativacao != "")  
          { 
              $this->data_ativacao .= " " . $this->data_ativacao_hora ; 
          }
      } 
      if ($this->data_ativacao == "" && $use_null)  
      { 
          $this->data_ativacao = "null" ; 
      } 
      $this->field_config['data_ativacao']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_foto();
          $this->ajax_return_values_nom_tecnico();
          $this->ajax_return_values_nom_sobrenome();
          $this->ajax_return_values_num_ativo();
          $this->ajax_return_values_num_rg();
          $this->ajax_return_values_num_telefone1();
          $this->ajax_return_values_num_telefone2();
          $this->ajax_return_values_data_ativacao();
          $this->ajax_return_values_tipo_tecnico();
          $this->ajax_return_values_id_opepre();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_tecnicoporoperadora();
          $this->ajax_return_values_reativaronclick();
          $this->ajax_return_values_removeronclick();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_CadastroTecnicos_pack_protect_string($this->nmgp_dados_form['id']);
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

          //----- foto
   function ajax_return_values_foto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("foto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->foto);
              $aLookup = array();
   $out_foto = '';
   $out1_foto = '';
   if ($this->foto != "" && $this->foto != "none")   
   { 
       $out_foto = $this->Ini->path_imag_temp . "/sc_foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_foto = $out_foto; 
       $arq_foto = fopen($this->Ini->root . $out_foto, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->foto, 0, 12));
           if (substr($this->foto, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->foto = nm_conv_img_access($this->foto);
           } 
       } 
       if (substr($this->foto, 0, 4) == "*nm*") 
       { 
           $this->foto = substr($this->foto, 4) ; 
           $this->foto = base64_decode($this->foto) ; 
       } 
       $img_pos_bm = strpos($this->foto, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->foto = substr($this->foto, $img_pos_bm) ; 
       } 
       fwrite($arq_foto, $this->foto) ;  
       fclose($arq_foto) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_foto);
       $this->nmgp_return_img['foto'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['foto'][1] = $sc_obj_img->getWidth();
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       $out_foto = $this->Ini->path_imag_temp . "/sc_" . "foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_foto);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_foto);
       } 
       else 
       { 
           $out_foto = $out1_foto;
       } 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['foto'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_foto,
               'imgOrig' => $out1_foto,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- nom_tecnico
   function ajax_return_values_nom_tecnico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_tecnico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_tecnico);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_tecnico'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nom_sobrenome
   function ajax_return_values_nom_sobrenome($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_sobrenome", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_sobrenome);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_sobrenome'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_ativo
   function ajax_return_values_num_ativo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_ativo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_ativo);
              $aLookup = array();
              $this->_tmp_lookup_num_ativo = $this->num_ativo;

$aLookup[] = array(form_CadastroTecnicos_pack_protect_string('S') => form_CadastroTecnicos_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_num_ativo'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['num_ativo']) && !empty($this->NM_ajax_info['select_html']['num_ativo']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['num_ativo'];
          }
          $this->NM_ajax_info['fldList']['num_ativo'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-num_ativo',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['num_ativo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['num_ativo']['valList'][$i] = form_CadastroTecnicos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['num_ativo']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['num_ativo']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['num_ativo']['labList'] = $aLabel;
          }
   }

          //----- num_rg
   function ajax_return_values_num_rg($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_rg", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_rg);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_rg'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_telefone1
   function ajax_return_values_num_telefone1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_telefone1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_telefone1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_telefone1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_telefone2
   function ajax_return_values_num_telefone2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_telefone2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_telefone2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_telefone2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- data_ativacao
   function ajax_return_values_data_ativacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_ativacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_ativacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_ativacao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->data_ativacao . ' ' . $this->data_ativacao_hora),
              );
          }
   }

          //----- tipo_tecnico
   function ajax_return_values_tipo_tecnico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_tecnico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_tecnico);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo_tecnico'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- id_opepre
   function ajax_return_values_id_opepre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_opepre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_opepre);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_opepre'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
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

          //----- tecnicoporoperadora
   function ajax_return_values_tecnicoporoperadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tecnicoporoperadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tecnicoporoperadora);
              $aLookup = array();
              $this->_tmp_lookup_tecnicoporoperadora = $this->tecnicoporoperadora;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora'] = array(); 
}
if ($this->id_opepre != "")
{ 
   $this->nm_clear_val("id_opepre");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_num_rg = $this->num_rg;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_data_ativacao = $this->data_ativacao;
   $old_value_data_ativacao_hora = $this->data_ativacao_hora;
   $old_value_id_opepre = $this->id_opepre;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_data_ativacao = $this->data_ativacao;
   $unformatted_value_data_ativacao_hora = $this->data_ativacao_hora;
   $unformatted_value_id_opepre = $this->id_opepre;

   $nm_comando = "select a.ID_Operadoras, a.Nom_Operadoras from tb_operadoras  as a 
INNER JOIN tb_infoprestadores as b ON a.ID_Operadoras = b.ID_Operadora AND b.ID_Prestador = '$this->id_opepre' AND b.ID_Operadora != '0'
WHERE a.Num_Status = 'S' 
order by a.Nom_Operadoras";

   $this->id = $old_value_id;
   $this->num_rg = $old_value_num_rg;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->data_ativacao = $old_value_data_ativacao;
   $this->data_ativacao_hora = $old_value_data_ativacao_hora;
   $this->id_opepre = $old_value_id_opepre;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastroTecnicos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroTecnicos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['Lookup_tecnicoporoperadora'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['tecnicoporoperadora'] = array(
                       'row'    => '',
               'type'    => 'duplosel',
               'valList' => explode((false === strpos($this->tecnicoporoperadora, '@?@') ? ';' : '@?@'), $sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 7,
              );
              end($this->NM_ajax_info['fldList']['tecnicoporoperadora']['valList']);
              if ('' == current($this->NM_ajax_info['fldList']['tecnicoporoperadora']['valList']))
              {
                  array_pop($this->NM_ajax_info['fldList']['tecnicoporoperadora']['valList']);
              }
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tecnicoporoperadora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tecnicoporoperadora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tecnicoporoperadora']['labList'] = $aLabel;
          }
   }

          //----- reativaronclick
   function ajax_return_values_reativaronclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("reativaronclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->reativaronclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['reativaronclick'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- removeronclick
   function ajax_return_values_removeronclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("removeronclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->removeronclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['removeronclick'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
      }
      else
      {
          if (!isset($this->nmgp_cmp_hidden["data_ativacao"]))
          {
              $this->nmgp_cmp_hidden["data_ativacao"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_ativacao'] = 'off';
          }
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         ?><?php sc_include_library('sys', 'initCustom', 'onLoad.html');?><?php
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
echo $s->getIUDState($this);
echo $s->getMessage(true);

sc_include_library('sys', 'models', 'Tecnicos.php');
$_Tecnicos = new Tecnicos($this);

$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['confimeReativar'] = $this->nmgp_botoes["confimeReativar"] = "off";;

$profile = $s->get("profile");
$Num_TipoUsuario = $s->get('Num_TipoUsuario');
$ID_OPE = $s->get("ID_OPE");

if (isset($profile["TECNICOS"])) {
	if ($this->nmgp_opcao == "novo" && ($profile["TECNICOS"]["CRIAR"]["v"] ?? "N") == "S" ||
	   $this->nmgp_opcao == "igual" && ($profile["TECNICOS"]["EDITAR"]["v"] ?? "N") == "S") {
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "on";;
	} else {
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
	}
	
	if (($profile["TECNICOS"]["DELETAR"]["v"] ?? "N") == "S") {
		$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "on";;
	} else {
		$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "off";;
	}
} else {
	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaTecnicos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}

if ($this->nmgp_opcao == "igual") {
	if (($profile["TECNICOS"]["REATIVAR"]["v"] ?? "N") == "S" && in_array($Num_TipoUsuario, ["O", "P"])) {
		$canReactivate = $_Tecnicos->canReactivate(intval($this->id ));
		if ($canReactivate) {
			$this->nmgp_cmp_hidden["num_ativo"] = "off"; $this->NM_ajax_info['fieldDisplay']['num_ativo'] = 'off';
			$this->NM_ajax_info['buttonDisplay']['confimeReativar'] = $this->nmgp_botoes["confimeReativar"] = "on";;
		}
	}
}

$this->id_opepre  = $ID_OPE;
$this->tipo_tecnico  = $Num_TipoUsuario;

if ($Num_TipoUsuario != "P") {
	$this->nmgp_cmp_hidden["tecnicoporoperadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['tecnicoporoperadora'] = 'off';
}

?>
	<script>
		function saveDataForm () {
			btnUpd = $('#sc_b_upd_t'); 
			btnIns = $('#sc_b_ins_t');
			if (btnUpd.length) { 
				btnUpd.click(); 
			} else if (btnIns.length) {
				btnIns.click();
			}		
		}
		function reativar () {
			$('#id_sc_field_reativaronclick').click();
		}
		function deleteData () {
			$('#id_sc_field_removeronclick').click();
		}
		$(document).ready(function() {
			fileSC = new validateFileSC({
				label_max: `<?= $this->Ini->Nm_lang['lang_label_max'] ?>`,
				label_formato: `<?= $this->Ini->Nm_lang['lang_label_formato'] ?>`,
				label_arquivoinvalido: `<?= $this->Ini->Nm_lang['lang_label_arquivoinvalido'] ?>`,
				label_tamanho: `<?= $this->Ini->Nm_lang['lang_label_tamanho'] ?>`
			});
			fileSC.watch('foto', {
				sizeB: 2097152,
				type: ['png', 'jpg', 'jpeg']
			});
		});
	</script>
<?php

$crumb = [ $this->Ini->Nm_lang['lang_label_technical'] ];
if ($this->nmgp_opcao == "novo") {
	$crumb[1] = "<i>". $this->Ini->Nm_lang['lang_label_newtechnician'] ."</i>";
} else if ($this->nmgp_opcao == "igual") {
	$crumb[1] = $this->nom_tecnico ." ".$this->nom_sobrenome ;
}
echo "
	<script>
		loadBreadcrumb(['".$crumb[0]."','".$crumb[1]."']);
	</script>
";
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
      }
      if (empty($this->data_ativacao))
      {
          $this->data_ativacao_hora = $this->data_ativacao;
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
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         $this->data_ativacao  = date("Y-m-d H-i-s");
$this->num_ativo  = "S";
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
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
      $NM_val_form['foto'] = $this->foto;
      $NM_val_form['nom_tecnico'] = $this->nom_tecnico;
      $NM_val_form['nom_sobrenome'] = $this->nom_sobrenome;
      $NM_val_form['num_ativo'] = $this->num_ativo;
      $NM_val_form['num_rg'] = $this->num_rg;
      $NM_val_form['num_telefone1'] = $this->num_telefone1;
      $NM_val_form['num_telefone2'] = $this->num_telefone2;
      $NM_val_form['data_ativacao'] = $this->data_ativacao;
      $NM_val_form['tipo_tecnico'] = $this->tipo_tecnico;
      $NM_val_form['id_opepre'] = $this->id_opepre;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['tecnicoporoperadora'] = $this->tecnicoporoperadora;
      $NM_val_form['reativaronclick'] = $this->reativaronclick;
      $NM_val_form['removeronclick'] = $this->removeronclick;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->id_opepre == "")  
      { 
          $this->id_opepre = 0;
          $this->sc_force_zero[] = 'id_opepre';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->tipo_tecnico == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_tecnico = "null"; 
              $NM_val_null[] = "tipo_tecnico";
          } 
          $this->nom_tecnico_before_qstr = $this->nom_tecnico;
          $this->nom_tecnico = substr($this->Db->qstr($this->nom_tecnico), 1, -1); 
          if ($this->nom_tecnico == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_tecnico = "null"; 
              $NM_val_null[] = "nom_tecnico";
          } 
          $this->nom_sobrenome_before_qstr = $this->nom_sobrenome;
          $this->nom_sobrenome = substr($this->Db->qstr($this->nom_sobrenome), 1, -1); 
          if ($this->nom_sobrenome == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_sobrenome = "null"; 
              $NM_val_null[] = "nom_sobrenome";
          } 
          if ($this->data_ativacao == "")  
          { 
              $this->data_ativacao = "null"; 
              $NM_val_null[] = "data_ativacao";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
           $nm_tmp = nm_conv_img_access(substr($this->foto, 0, 12));
           if (substr($this->foto, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->foto = nm_conv_img_access($this->foto);
           } 
              if (!empty($this->foto) && $this->foto != 'null' && substr($this->foto, 0, 4) != "*nm*") 
              { 
                  $this->foto = "*nm*" . base64_encode($this->foto) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              if (!empty($this->foto) && $this->foto != 'null' && substr($this->foto, 0, 4) != "*nm*") 
              { 
                  $this->foto = "*nm*" . base64_encode($this->foto) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if (!empty($this->foto) && $this->foto != 'null' && substr($this->foto, 0, 4) != "*nm*") 
              { 
                  $this->foto = "*nm*" . base64_encode($this->foto) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          { }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              if (!empty($this->foto) && $this->foto != 'null' && substr($this->foto, 0, 4) != "*nm*") 
              { 
                  $this->foto = "*nm*" . base64_encode($this->foto) ; 
              } 
          } 
          else
          { 
              $this->foto =  substr($this->Db->qstr($this->foto), 1, -1);
          } 
          if ($this->foto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->foto = "null"; 
              $NM_val_null[] = "foto";
          } 
          $this->num_rg_before_qstr = $this->num_rg;
          $this->num_rg = substr($this->Db->qstr($this->num_rg), 1, -1); 
          if ($this->num_rg == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_rg = "null"; 
              $NM_val_null[] = "num_rg";
          } 
          $this->num_telefone1_before_qstr = $this->num_telefone1;
          $this->num_telefone1 = substr($this->Db->qstr($this->num_telefone1), 1, -1); 
          if ($this->num_telefone1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefone1 = "null"; 
              $NM_val_null[] = "num_telefone1";
          } 
          $this->num_telefone2_before_qstr = $this->num_telefone2;
          $this->num_telefone2 = substr($this->Db->qstr($this->num_telefone2), 1, -1); 
          if ($this->num_telefone2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefone2 = "null"; 
              $NM_val_null[] = "num_telefone2";
          } 
          if ($this->num_ativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_ativo = "null"; 
              $NM_val_null[] = "num_ativo";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key'] as $sFKName => $sFKValue)
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
                 form_CadastroTecnicos_pack_ajax_response();
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Tipo_Tecnico = '$this->tipo_tecnico', ID_OpePre = $this->id_opepre, Nom_Tecnico = '$this->nom_tecnico', Nom_Sobrenome = '$this->nom_sobrenome', Num_RG = '$this->num_rg', Num_Telefone1 = '$this->num_telefone1', Num_Telefone2 = '$this->num_telefone2', Num_Ativo = '$this->num_ativo'";  
              } 
              if (isset($NM_val_form['data_ativacao']) && $NM_val_form['data_ativacao'] != $this->nmgp_dados_select['data_ativacao']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " Data_Ativacao = '$this->data_ativacao'"; 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  { 
                      $comando_oracle        .= " Data_Ativacao = TO_DATE('$this->data_ativacao', 'yyyy-mm-dd hh24:mi:ss')"; 
                  } 
                  else
                  { 
                      $comando_oracle        .= " Data_Ativacao = '$this->data_ativacao'"; 
                  } 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->foto_limpa == "S") 
              { 
                  if ($this->foto != "null") 
                  { 
                      $this->foto = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", Foto = '" . $this->foto . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " Foto = '" . $this->foto . "'"; 
                     $SC_ex_update = true; 
                  } 
                  $this->foto = "";
              } 
              else 
              { 
                  if ($this->foto != "none" && $this->foto != "") 
                  { 
                      $NM_conteudo =  $this->foto;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", Foto = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " Foto = '$NM_conteudo'" ; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "foto";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if ($this->foto_limpa == "S" || ($this->foto != "none" && $this->foto != "")) 
              { 
                  if ($SC_ex_upd_or) 
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= ", Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= ", Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= ", Foto = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= ", Foto = empty_blob()"; 
                      } 
                  } 
                  else 
                  { 
                      $SC_ex_upd_or = true; 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= " Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= " Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= " Foto = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= " Foto = empty_blob()"; 
                      } 
                  } 
              } 
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
                                  form_CadastroTecnicos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if ($this->foto_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"Foto\", \"\",  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Foto", "",  "ID = $this->id"); 
                  } 
                  else 
                  { 
                      if ($this->foto != "none" && $this->foto != "") 
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"Foto\", $this->foto,  \"ID = $this->id\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Foto", $this->foto,  "ID = $this->id"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_CadastroTecnicos_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->foto_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['foto_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->nom_tecnico = $this->nom_tecnico_before_qstr;
          $this->nom_sobrenome = $this->nom_sobrenome_before_qstr;
          $this->num_rg = $this->num_rg_before_qstr;
          $this->num_telefone1 = $this->num_telefone1_before_qstr;
          $this->num_telefone2 = $this->num_telefone2_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_opepre'])) { $this->id_opepre = $NM_val_form['id_opepre']; }
              elseif (isset($this->id_opepre)) { $this->nm_limpa_alfa($this->id_opepre); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_tecnico'])) { $this->nom_tecnico = $NM_val_form['nom_tecnico']; }
              elseif (isset($this->nom_tecnico)) { $this->nm_limpa_alfa($this->nom_tecnico); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_sobrenome'])) { $this->nom_sobrenome = $NM_val_form['nom_sobrenome']; }
              elseif (isset($this->nom_sobrenome)) { $this->nm_limpa_alfa($this->nom_sobrenome); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_rg'])) { $this->num_rg = $NM_val_form['num_rg']; }
              elseif (isset($this->num_rg)) { $this->nm_limpa_alfa($this->num_rg); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefone1'])) { $this->num_telefone1 = $NM_val_form['num_telefone1']; }
              elseif (isset($this->num_telefone1)) { $this->nm_limpa_alfa($this->num_telefone1); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefone2'])) { $this->num_telefone2 = $NM_val_form['num_telefone2']; }
              elseif (isset($this->num_telefone2)) { $this->nm_limpa_alfa($this->num_telefone2); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'nom_tecnico', 'nom_sobrenome', 'num_ativo', 'num_rg', 'num_telefone1', 'num_telefone2', 'data_ativacao', 'tipo_tecnico', 'id_opepre', 'savedataonclick', 'tecnicoporoperadora', 'reativaronclick', 'removeronclick'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
          $sc_campos_sel_look  = array();
          $sc_campos_form_look = array();
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Tecnicos, ID_Operadoras from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Tecnicos, ID_Operadoras from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select \"ID\", \"ID_Tecnicos\", \"ID_Operadoras\" from tb_tecnicosporoperadoras where \"ID_Tecnicos\" = $this->id"; 
          }  
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Tecnicos, ID_Operadoras from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
          }  
          $rss = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
          if ($rss === false && !$rss->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $sc_ind = 0; 
          while (!$rss->EOF) 
          { 
              $sc_campos_sel_look[$sc_ind] = array();
              $sc_campos_sel_look[$sc_ind]['ID'] = $rss->fields[0];
              $sc_campos_sel_look[$sc_ind]['ID_Tecnicos'] = $rss->fields[1];
              $sc_campos_sel_look[$sc_ind]['ID_Operadoras'] = $rss->fields[2];
              $sc_ind++; 
              $rss->MoveNext() ; 
          } 
          $rss->Close(); 
          $todo_tecnicoporoperadora = explode("@?@", $this->tecnicoporoperadora); 
          if (!empty($todo_tecnicoporoperadora))  
          { 
              $sc_ind = 0; 
              foreach ($todo_tecnicoporoperadora as $tecnicoporoperadorax) 
              {
                  if (!empty($tecnicoporoperadorax))  
                  { 
                      $sc_campos_form_look[$sc_ind] = array();
                      $sc_campos_form_look[$sc_ind]['id'] = $this->id;
                      $sc_campos_form_look[$sc_ind]['tecnicoporoperadora'] = $tecnicoporoperadorax;
                 } 
                 $sc_ind++; 
              } 
         } 
         foreach ($sc_campos_form_look as $sc_ind_form => $sc_campos_form) 
         { 
             foreach ($sc_campos_sel_look as $sc_ind_sel => $sc_campos_sel) 
             { 
                 if ($sc_campos_form['id'] == $sc_campos_sel['ID_Tecnicos'] && $sc_campos_form['tecnicoporoperadora'] == $sc_campos_sel['ID_Operadoras'])
                 {
                     unset($sc_campos_form_look[$sc_ind_form]);
                     unset($sc_campos_sel_look[$sc_ind_sel]);
                     break;
                 }
             }
         }
         foreach ($sc_campos_sel_look as $sc_ind_sel => $sc_campos_sel) 
         { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_tecnicosporoperadoras where \"ID_Tecnicos\" = " . $sc_campos_sel['ID_Tecnicos'] . " and \"ID_Operadoras\" = '" . $sc_campos_sel['ID_Operadoras'] . "'"; 
              } 
              else 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_tecnicosporoperadoras where ID_Tecnicos = " . $sc_campos_sel['ID_Tecnicos'] . " and ID_Operadoras = '" . $sc_campos_sel['ID_Operadoras'] . "'"; 
              } 
              $rdel = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
              if ($rdel === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastroTecnicos_pack_ajax_response();
                  }
                  exit; 
              } 
              $rdel->Close(); 
         }
         foreach ($sc_campos_form_look as $sc_ind_form => $sc_campos_form) 
         { 
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
             { 
                 $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_tecnicosporoperadoras (\"ID_Tecnicos\", \"ID_Operadoras\") values (" . $sc_campos_form['id']. ", '" . $sc_campos_form['tecnicoporoperadora'] . "')"; 
             } 
             else 
             { 
                 $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_tecnicosporoperadoras (ID_Tecnicos, ID_Operadoras) values (" . $sc_campos_form['id']. ", '" . $sc_campos_form['tecnicoporoperadora'] . "')"; 
             } 
             $_SESSION['hticnsdata']['sc_sql_ult_comando'] = str_replace("'null'", "null", $_SESSION['hticnsdata']['sc_sql_ult_comando']) ; 
             $_SESSION['hticnsdata']['sc_sql_ult_comando'] = str_replace("#null#", "null", $_SESSION['hticnsdata']['sc_sql_ult_comando']) ; 
             $rins = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
             if ($rins === false && !$rs->EOF)  
             { 
                 if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                 {
                     $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                     $this->NM_rollback_db(); 
                     if ($this->NM_ajax_flag)
                     {
                         form_CadastroTecnicos_pack_ajax_response();
                     }
                     exit; 
                 }
             } 
             $rins->Close(); 
         }
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key'] as $sFKName => $sFKValue)
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastroTecnicos_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->foto_scfile_name, $dir_file, "foto");
              if (trim($this->foto_scfile_name) != $_test_file)
              {
                  $this->foto_scfile_name = $_test_file;
                  $this->foto = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES ('$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', '$this->data_ativacao', '$this->foto', '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES ('$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', '$this->data_ativacao', '$this->foto', '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES (" . $NM_seq_auto . "'$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', TO_DATE('$this->data_ativacao', 'yyyy-mm-dd hh24:mi:ss'), EMPTY_BLOB(), '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES (" . $NM_seq_auto . "'$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', '$this->data_ativacao', null, '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES (" . $NM_seq_auto . "'$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', '$this->data_ativacao', '', '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES (" . $NM_seq_auto . "'$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', '$this->data_ativacao', '', '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo) VALUES (" . $NM_seq_auto . "'$this->tipo_tecnico', $this->id_opepre, '$this->nom_tecnico', '$this->nom_sobrenome', '$this->data_ativacao', '$this->foto', '$this->num_rg', '$this->num_telefone1', '$this->num_telefone2', '$this->num_ativo')"; 
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
                              form_CadastroTecnicos_pack_ajax_response();
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
                          form_CadastroTecnicos_pack_ajax_response();
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
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->foto ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Foto , $this->foto,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Foto", $this->foto,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_CadastroTecnicos_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          $todo_tecnicoporoperadora = explode("@?@", $this->tecnicoporoperadora); 
          if ($bInsertOk && !empty($todo_tecnicoporoperadora))  
          { 
              foreach ($todo_tecnicoporoperadora as $tecnicoporoperadorax) 
              {
                  if (!empty($tecnicoporoperadorax))  
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_tecnicosporoperadoras (\"ID_Tecnicos\", \"ID_Operadoras\") values ($this->id, '$tecnicoporoperadorax')"; 
                      } 
                      else 
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_tecnicosporoperadoras (ID_Tecnicos, ID_Operadoras) values ($this->id, '$tecnicoporoperadorax')"; 
                      } 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = str_replace("'null'", "null", $_SESSION['hticnsdata']['sc_sql_ult_comando']) ; 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = str_replace("#null#", "null", $_SESSION['hticnsdata']['sc_sql_ult_comando']) ; 
                      $rs = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
                      if ($rs === false && !$rs->EOF)  
                      { 
                          if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadastroTecnicos_pack_ajax_response();
                              }
                              exit; 
                          } 
                      } 
                      $rs->Close(); 
                  } 
              } 
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
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_tecnicosporoperadoras where \"ID_Tecnicos\" = $this->id"; 
              } 
              else 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
              } 
              $rse = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastroTecnicos_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
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
                          form_CadastroTecnicos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']);
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
        $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_grid_ID_Tecnico)) {$this->sc_temp_grid_ID_Tecnico = (isset($_SESSION['grid_ID_Tecnico'])) ? $_SESSION['grid_ID_Tecnico'] : "";}
         sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

if ($this->id ) {
	$modelLogs->insert([
		"Modulo" => "TECNICOS",
		"Funcao" => "CRIAR",
		"Descricao" => 'Cadastro de técnico',
		"Conteudo" => $modelLogs->getConteudo()
	]);
	
	$s->setIUDState($this, "I", "success");
	$grid_ID_Tecnico = $this->id ;
	 if (isset($grid_ID_Tecnico)) {$this->sc_temp_grid_ID_Tecnico = $grid_ID_Tecnico;}
;
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (isset($this->sc_temp_grid_ID_Tecnico)) { $_SESSION['grid_ID_Tecnico'] = $this->sc_temp_grid_ID_Tecnico;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaTecnicos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$s->setIUDState($this, "I", "error", "Não foi possível salvar");
	 if (isset($this->sc_temp_grid_ID_Tecnico)) { $_SESSION['grid_ID_Tecnico'] = $this->sc_temp_grid_ID_Tecnico;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaTecnicos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}
if (isset($this->sc_temp_grid_ID_Tecnico)) { $_SESSION['grid_ID_Tecnico'] = $this->sc_temp_grid_ID_Tecnico;}
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

$modelLogs->insert([
	"Modulo" => "TECNICOS",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de técnico',
	"Conteudo" => $modelLogs->getConteudo()
]);

$this->sc_ajax_javascript('toastr.success', array('',  $this->Ini->Nm_lang['lang_label_updSuccess'] ));
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

$modelLogs->insert([
	"Modulo" => "TECNICOS",
	"Funcao" => "DELETAR",
	"Descricao" => 'Remoção de técnico',
	"Conteudo" => $modelLogs->getConteudo()
]);

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaTecnicos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->nmgp_dados_form['foto'] = ""; 
      $this->foto_limpa = ""; 
      $this->foto_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, TO_DATE(TO_CHAR(Data_Ativacao, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, LOTOFILE(Foto, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_Foto', 'client'), Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID, Tipo_Tecnico, ID_OpePre, Nom_Tecnico, Nom_Sobrenome, Data_Ativacao, Foto, Num_RG, Num_Telefone1, Num_Telefone2, Num_Ativo from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "ID = '" . $_SESSION['grid_ID_Tecnico'] . "'";
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter']))
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
                  $this->NM_ajax_info['buttonDisplay']['confimeRemover'] = $this->nmgp_botoes['confimeRemover'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['confimeReativar'] = $this->nmgp_botoes['confimeReativar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['confimeRemover'] = $this->nmgp_botoes['confimeRemover'] = "off";
              $this->NM_ajax_info['buttonDisplay']['confimeReativar'] = $this->nmgp_botoes['confimeReativar'] = "off";
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
              $this->tipo_tecnico = $rs->fields[1] ; 
              $this->nmgp_dados_select['tipo_tecnico'] = $this->tipo_tecnico;
              $this->id_opepre = $rs->fields[2] ; 
              $this->nmgp_dados_select['id_opepre'] = $this->id_opepre;
              $this->nom_tecnico = $rs->fields[3] ; 
              $this->nmgp_dados_select['nom_tecnico'] = $this->nom_tecnico;
              $this->nom_sobrenome = $rs->fields[4] ; 
              $this->nmgp_dados_select['nom_sobrenome'] = $this->nom_sobrenome;
              $this->data_ativacao = $rs->fields[5] ; 
              if (substr($this->data_ativacao, 10, 1) == "-") 
              { 
                 $this->data_ativacao = substr($this->data_ativacao, 0, 10) . " " . substr($this->data_ativacao, 11);
              } 
              if (substr($this->data_ativacao, 13, 1) == ".") 
              { 
                 $this->data_ativacao = substr($this->data_ativacao, 0, 13) . ":" . substr($this->data_ativacao, 14, 2) . ":" . substr($this->data_ativacao, 17);
              } 
              $this->nmgp_dados_select['data_ativacao'] = $this->data_ativacao;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->foto = $this->Db->BlobDecode($rs->fields[6]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[6]) && !empty($rs->fields[6]) && is_file($rs->fields[6])) 
                  { 
                     $this->foto = file_get_contents($rs->fields[6]);
                  }else 
                  { 
                     $this->foto = ''; 
                  } 
              } 
              else
              { 
                  $this->foto = $rs->fields[6] ; 
              } 
              $this->nmgp_dados_select['foto'] = $this->foto;
              $this->num_rg = $rs->fields[7] ; 
              $this->nmgp_dados_select['num_rg'] = $this->num_rg;
              $this->num_telefone1 = $rs->fields[8] ; 
              $this->nmgp_dados_select['num_telefone1'] = $this->num_telefone1;
              $this->num_telefone2 = $rs->fields[9] ; 
              $this->nmgp_dados_select['num_telefone2'] = $this->num_telefone2;
              $this->num_ativo = $rs->fields[10] ; 
              $this->nmgp_dados_select['num_ativo'] = $this->num_ativo;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->id_opepre = (string)$this->id_opepre; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['reg_start'] < $qt_geral_reg_form_CadastroTecnicos;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $this->tecnicoporoperadora = "";
          $this->tecnicoporoperadora_hidden = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Tecnicos, ID_Operadoras from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Tecnicos, ID_Operadoras from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select \"ID\", \"ID_Tecnicos\", \"ID_Operadoras\" from tb_tecnicosporoperadoras where \"ID_Tecnicos\" = $this->id"; 
          }  
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Tecnicos, ID_Operadoras from tb_tecnicosporoperadoras where ID_Tecnicos = $this->id"; 
          }  
          $rss = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
          if ($rss === false && !$rss->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $this->tecnicoporoperadora = ""; 
          while (!$rss->EOF) 
          { 
                 $this->tecnicoporoperadora .= $rss->fields[2] . "@?@";
                 $this->tecnicoporoperadora_hidden .= $rss->fields[2] . "@?@";
                 $rss->MoveNext() ; 
          } 
          $rss->Close(); 
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
              $this->tipo_tecnico = "";  
              $this->id_opepre = "";  
              $this->nom_tecnico = "";  
              $this->nom_sobrenome = "";  
              $this->data_ativacao = "";  
              $this->data_ativacao_hora = "" ;  
              $this->foto = "";  
              $this->foto_ul_name = "" ;  
              $this->foto_ul_type = "" ;  
              $this->num_rg = "";  
              $this->num_telefone1 = "";  
              $this->num_telefone2 = "";  
              $this->num_ativo = "";  
              $this->tecnicoporoperadora = "";  
              $this->savedataonclick = "";  
              $this->reativaronclick = "";  
              $this->removeronclick = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['foreign_key'] as $sFKName => $sFKValue)
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
function reativarOnClick_onClick($num_telefone1, $num_rg, $foto, $data_ativacao, $nom_sobrenome, $nom_tecnico, $id_opepre, $tipo_tecnico, $reativaronclick, $savedataonclick, $num_ativo, $num_telefone2, $id)
{
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         
$original_id = $this->id;
$original_num_telefone1 = $this->num_telefone1;
$original_num_rg = $this->num_rg;
$original_foto = $this->foto;
$original_data_ativacao = $this->data_ativacao;
$original_nom_sobrenome = $this->nom_sobrenome;
$original_nom_tecnico = $this->nom_tecnico;
$original_id_opepre = $this->id_opepre;
$original_tipo_tecnico = $this->tipo_tecnico;
$original_reativaronclick = $this->reativaronclick;
$original_savedataonclick = $this->savedataonclick;
$original_num_ativo = $this->num_ativo;
$original_num_telefone2 = $this->num_telefone2;
$original_id = $this->id;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$ID_Usuario = $s->get("ID_Usuario");

sc_include_library("sys", "models", "Tecnicos.php");
sc_include_library("sys", "models", "Logs.php");
$_Tecnicos = new Tecnicos($this);
$_Logs = new Logs($this);

$msg = "";
$Error = false;

if (!$Error) {
	$_Tecnicos->reactivate(intval($this->id ));
	$_Logs->insert([
		"Modulo" => "TECNICOS",
		"Funcao" => "REATIVAR",
		"Descricao" => 'Reativação de cadastro de técnico',
		"Conteudo" => $_Logs->getConteudo()
	]);
	
	$s->setIUDState($this, "U", "success");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadastroTecnicos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	));
}

$modificado_id = $this->id;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_num_rg = $this->num_rg;
$modificado_foto = $this->foto;
$modificado_data_ativacao = $this->data_ativacao;
$modificado_nom_sobrenome = $this->nom_sobrenome;
$modificado_nom_tecnico = $this->nom_tecnico;
$modificado_id_opepre = $this->id_opepre;
$modificado_tipo_tecnico = $this->tipo_tecnico;
$modificado_reativaronclick = $this->reativaronclick;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_num_ativo = $this->num_ativo;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_id = $this->id;
$this->nm_formatar_campos('id');
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_foto !== $modificado_foto || isset($this->nmgp_cmp_readonly['foto']) || (isset($bFlagRead_foto) && $bFlagRead_foto))
{
    $this->ajax_return_values_foto(true);
}
if ($original_data_ativacao !== $modificado_data_ativacao || isset($this->nmgp_cmp_readonly['data_ativacao']) || (isset($bFlagRead_data_ativacao) && $bFlagRead_data_ativacao))
{
    $this->ajax_return_values_data_ativacao(true);
}
if ($original_nom_sobrenome !== $modificado_nom_sobrenome || isset($this->nmgp_cmp_readonly['nom_sobrenome']) || (isset($bFlagRead_nom_sobrenome) && $bFlagRead_nom_sobrenome))
{
    $this->ajax_return_values_nom_sobrenome(true);
}
if ($original_nom_tecnico !== $modificado_nom_tecnico || isset($this->nmgp_cmp_readonly['nom_tecnico']) || (isset($bFlagRead_nom_tecnico) && $bFlagRead_nom_tecnico))
{
    $this->ajax_return_values_nom_tecnico(true);
}
if ($original_id_opepre !== $modificado_id_opepre || isset($this->nmgp_cmp_readonly['id_opepre']) || (isset($bFlagRead_id_opepre) && $bFlagRead_id_opepre))
{
    $this->ajax_return_values_id_opepre(true);
}
if ($original_tipo_tecnico !== $modificado_tipo_tecnico || isset($this->nmgp_cmp_readonly['tipo_tecnico']) || (isset($bFlagRead_tipo_tecnico) && $bFlagRead_tipo_tecnico))
{
    $this->ajax_return_values_tipo_tecnico(true);
}
if ($original_reativaronclick !== $modificado_reativaronclick || isset($this->nmgp_cmp_readonly['reativaronclick']) || (isset($bFlagRead_reativaronclick) && $bFlagRead_reativaronclick))
{
    $this->ajax_return_values_reativaronclick(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadastroTecnicos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off';
}
function removerOnClick_onClick($num_telefone1, $num_rg, $foto, $data_ativacao, $nom_sobrenome, $nom_tecnico, $id_opepre, $tipo_tecnico, $removeronclick, $reativaronclick, $savedataonclick, $num_ativo, $num_telefone2, $id)
{
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         
$original_id = $this->id;
$original_num_telefone1 = $this->num_telefone1;
$original_num_rg = $this->num_rg;
$original_foto = $this->foto;
$original_data_ativacao = $this->data_ativacao;
$original_nom_sobrenome = $this->nom_sobrenome;
$original_nom_tecnico = $this->nom_tecnico;
$original_id_opepre = $this->id_opepre;
$original_tipo_tecnico = $this->tipo_tecnico;
$original_removeronclick = $this->removeronclick;
$original_reativaronclick = $this->reativaronclick;
$original_savedataonclick = $this->savedataonclick;
$original_num_ativo = $this->num_ativo;
$original_num_telefone2 = $this->num_telefone2;
$original_id = $this->id;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Tecnicos.php');
$modelLogs = new Logs($this);
$modelTecnicos = new Tecnicos($this);
$s = new manageSession();
$msg = "";
$Error = false;

if (!$Error) {
	$modelTecnicos->remove(intval($this->id ));
	$modelLogs->insert([
		"Modulo" => "TECNICOS",
		"Funcao" => "DELETAR",
		"Descricao" => 'Remoção de técnico',
		"Conteudo" => $modelLogs->getConteudo()
	]);
	
	$s->setIUDState($this, "D", "success");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaTecnicos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	));
}

$modificado_id = $this->id;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_num_rg = $this->num_rg;
$modificado_foto = $this->foto;
$modificado_data_ativacao = $this->data_ativacao;
$modificado_nom_sobrenome = $this->nom_sobrenome;
$modificado_nom_tecnico = $this->nom_tecnico;
$modificado_id_opepre = $this->id_opepre;
$modificado_tipo_tecnico = $this->tipo_tecnico;
$modificado_removeronclick = $this->removeronclick;
$modificado_reativaronclick = $this->reativaronclick;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_num_ativo = $this->num_ativo;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_id = $this->id;
$this->nm_formatar_campos('id');
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_foto !== $modificado_foto || isset($this->nmgp_cmp_readonly['foto']) || (isset($bFlagRead_foto) && $bFlagRead_foto))
{
    $this->ajax_return_values_foto(true);
}
if ($original_data_ativacao !== $modificado_data_ativacao || isset($this->nmgp_cmp_readonly['data_ativacao']) || (isset($bFlagRead_data_ativacao) && $bFlagRead_data_ativacao))
{
    $this->ajax_return_values_data_ativacao(true);
}
if ($original_nom_sobrenome !== $modificado_nom_sobrenome || isset($this->nmgp_cmp_readonly['nom_sobrenome']) || (isset($bFlagRead_nom_sobrenome) && $bFlagRead_nom_sobrenome))
{
    $this->ajax_return_values_nom_sobrenome(true);
}
if ($original_nom_tecnico !== $modificado_nom_tecnico || isset($this->nmgp_cmp_readonly['nom_tecnico']) || (isset($bFlagRead_nom_tecnico) && $bFlagRead_nom_tecnico))
{
    $this->ajax_return_values_nom_tecnico(true);
}
if ($original_id_opepre !== $modificado_id_opepre || isset($this->nmgp_cmp_readonly['id_opepre']) || (isset($bFlagRead_id_opepre) && $bFlagRead_id_opepre))
{
    $this->ajax_return_values_id_opepre(true);
}
if ($original_tipo_tecnico !== $modificado_tipo_tecnico || isset($this->nmgp_cmp_readonly['tipo_tecnico']) || (isset($bFlagRead_tipo_tecnico) && $bFlagRead_tipo_tecnico))
{
    $this->ajax_return_values_tipo_tecnico(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_reativaronclick !== $modificado_reativaronclick || isset($this->nmgp_cmp_readonly['reativaronclick']) || (isset($bFlagRead_reativaronclick) && $bFlagRead_reativaronclick))
{
    $this->ajax_return_values_reativaronclick(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadastroTecnicos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($num_telefone1, $num_rg, $foto, $data_ativacao, $nom_sobrenome, $nom_tecnico, $id_opepre, $tipo_tecnico, $num_telefone2, $id)
{
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         
$original_nom_tecnico = $this->nom_tecnico;
$original_num_rg = $this->num_rg;
$original_tipo_tecnico = $this->tipo_tecnico;
$original_id_opepre = $this->id_opepre;
$original_id = $this->id;
$original_num_telefone1 = $this->num_telefone1;
$original_num_telefone2 = $this->num_telefone2;
$original_num_telefone1 = $this->num_telefone1;
$original_num_rg = $this->num_rg;
$original_foto = $this->foto;
$original_data_ativacao = $this->data_ativacao;
$original_nom_sobrenome = $this->nom_sobrenome;
$original_nom_tecnico = $this->nom_tecnico;
$original_id_opepre = $this->id_opepre;
$original_tipo_tecnico = $this->tipo_tecnico;
$original_num_telefone2 = $this->num_telefone2;
$original_id = $this->id;

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$msg = "";
$Error = false;


if (!$this->nom_tecnico ) {
	$msg .= "Insira o nome do técnico<br>";
	$Error = true;
}

if (!$this->num_rg ) {
	$msg .= "Insira o número do RG<br>";
	$Error = true;
} elseif (!isValidRG($this->num_rg )) {
	$msg .= "O número de RG inserido não é válido<br>";
	$Error = true;
} else {
	 
      $nm_select = "SELECT count(*) FROM tb_tecnicos WHERE Tipo_Tecnico = '$this->tipo_tecnico' AND ID_OpePre = '$this->id_opepre' AND Num_RG = '$this->num_rg' AND ID != '$this->id' AND Num_Ativo != 'R'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_opepre != "" && $this->id != "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
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
	if (isset($this->rs[0][0]) && $this->rs[0][0] > 0) {
		$Error = true;
		$msg .= "O RG inserido já está sendo utilizando por outro técnico<br>";
	}
}

if (!$this->num_telefone1  || $this->num_telefone1  && !isValidPhone($this->num_telefone1 )) {
	$msg .= "O telefone principal não é válido<br>";
	$Error = true;
}
if ($this->num_telefone2  && !isValidPhone($this->num_telefone2 )) {
	$msg .= "O telefone opcional não é válido<br>";
	$Error = true;
}

if ($Error) { 
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	));
} else {
	$this->sc_ajax_javascript('saveDataForm');
}

$modificado_nom_tecnico = $this->nom_tecnico;
$modificado_num_rg = $this->num_rg;
$modificado_tipo_tecnico = $this->tipo_tecnico;
$modificado_id_opepre = $this->id_opepre;
$modificado_id = $this->id;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_num_rg = $this->num_rg;
$modificado_foto = $this->foto;
$modificado_data_ativacao = $this->data_ativacao;
$modificado_nom_sobrenome = $this->nom_sobrenome;
$modificado_nom_tecnico = $this->nom_tecnico;
$modificado_id_opepre = $this->id_opepre;
$modificado_tipo_tecnico = $this->tipo_tecnico;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_id = $this->id;
$this->nm_formatar_campos('nom_tecnico', 'num_rg', 'tipo_tecnico', 'id_opepre', 'id', 'num_telefone1', 'num_telefone2');
if ($original_nom_tecnico !== $modificado_nom_tecnico || isset($this->nmgp_cmp_readonly['nom_tecnico']) || (isset($bFlagRead_nom_tecnico) && $bFlagRead_nom_tecnico))
{
    $this->ajax_return_values_nom_tecnico(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_tipo_tecnico !== $modificado_tipo_tecnico || isset($this->nmgp_cmp_readonly['tipo_tecnico']) || (isset($bFlagRead_tipo_tecnico) && $bFlagRead_tipo_tecnico))
{
    $this->ajax_return_values_tipo_tecnico(true);
}
if ($original_id_opepre !== $modificado_id_opepre || isset($this->nmgp_cmp_readonly['id_opepre']) || (isset($bFlagRead_id_opepre) && $bFlagRead_id_opepre))
{
    $this->ajax_return_values_id_opepre(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_foto !== $modificado_foto || isset($this->nmgp_cmp_readonly['foto']) || (isset($bFlagRead_foto) && $bFlagRead_foto))
{
    $this->ajax_return_values_foto(true);
}
if ($original_data_ativacao !== $modificado_data_ativacao || isset($this->nmgp_cmp_readonly['data_ativacao']) || (isset($bFlagRead_data_ativacao) && $bFlagRead_data_ativacao))
{
    $this->ajax_return_values_data_ativacao(true);
}
if ($original_nom_sobrenome !== $modificado_nom_sobrenome || isset($this->nmgp_cmp_readonly['nom_sobrenome']) || (isset($bFlagRead_nom_sobrenome) && $bFlagRead_nom_sobrenome))
{
    $this->ajax_return_values_nom_sobrenome(true);
}
if ($original_nom_tecnico !== $modificado_nom_tecnico || isset($this->nmgp_cmp_readonly['nom_tecnico']) || (isset($bFlagRead_nom_tecnico) && $bFlagRead_nom_tecnico))
{
    $this->ajax_return_values_nom_tecnico(true);
}
if ($original_id_opepre !== $modificado_id_opepre || isset($this->nmgp_cmp_readonly['id_opepre']) || (isset($bFlagRead_id_opepre) && $bFlagRead_id_opepre))
{
    $this->ajax_return_values_id_opepre(true);
}
if ($original_tipo_tecnico !== $modificado_tipo_tecnico || isset($this->nmgp_cmp_readonly['tipo_tecnico']) || (isset($bFlagRead_tipo_tecnico) && $bFlagRead_tipo_tecnico))
{
    $this->ajax_return_values_tipo_tecnico(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadastroTecnicos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off';
}
function voltar($start="update", $to="this", $typeRedir="sc_")
{
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'on';
         
$apl_name = $this->Ini->nm_cod_apl;
if ($start == 'update') {
	$_SESSION['hticnsdata']['sc_apl_conf'][$apl_name]['start'] = 'update';
} else {
	$_SESSION['hticnsdata']['sc_apl_conf'][$apl_name]['start'] = 'new';
}
$to = $to == "this" ? $apl_name : $to;
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
$_SESSION['hticnsdata']['form_CadastroTecnicos']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_CadastroTecnicos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
//-- 
   if ($this->nmgp_opcao == "novo")
   { 
       $out_foto = "";  
   } 
   else 
   { 
       $out_foto = $this->foto;  
   } 
   if ($this->foto != "" && $this->foto != "none")   
   { 
       $out_foto = $this->Ini->path_imag_temp . "/sc_foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_foto = fopen($this->Ini->root . $out_foto, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->foto, 0, 12));
           if (substr($this->foto, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->foto = nm_conv_img_access($this->foto);
           } 
       } 
       if (substr($this->foto, 0, 4) == "*nm*") 
       { 
           $this->foto = substr($this->foto, 4) ; 
           $this->foto = base64_decode($this->foto) ; 
       } 
       $img_pos_bm = strpos($this->foto, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->foto = substr($this->foto, $img_pos_bm) ; 
       } 
       fwrite($arq_foto, $this->foto) ;  
       fclose($arq_foto) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_foto);
       $this->nmgp_return_img['foto'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['foto'][1] = $sc_obj_img->getWidth();
       $out1_foto = $out_foto; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       $out_foto = $this->Ini->path_imag_temp . "/sc_" . "foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_foto);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_foto);
       } 
       else 
       { 
           $out_foto = $out1_foto;
       } 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_foto;
       if (isset($temp_out_foto))
       {
           $out_foto = $temp_out_foto;
       }
       global $temp_out1_foto;
       if (isset($temp_out1_foto))
       {
           $out1_foto = $temp_out1_foto;
       }
   }
    include_once("form_CadastroTecnicos_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['csrf_token'];
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

   function Form_lookup_num_ativo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_CadastroTecnicos_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "Nom_Tecnico", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Sobrenome", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "Data_Ativacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Tecnico", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Sobrenome", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_num_ativo($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Num_Ativo", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_RG", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Tipo_Tecnico", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_OpePre", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter_form'] . " and (ID = '" . $_SESSION['grid_ID_Tecnico'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID = '" . $_SESSION['grid_ID_Tecnico'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_CadastroTecnicos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['total'] = $qt_geral_reg_form_CadastroTecnicos;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadastroTecnicos_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadastroTecnicos_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "id_opepre";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['decimal_db'] == ".")
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
      $Nm_datas['data_ativacao'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['SC_sep_date1'];
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
       $nmgp_saida_form = "form_CadastroTecnicos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_CadastroTecnicos_fim.php";
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
       form_CadastroTecnicos_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroTecnicos']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_CadastroTecnicos_pack_ajax_response();
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
       form_CadastroTecnicos_pack_ajax_response();
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
}
?>
