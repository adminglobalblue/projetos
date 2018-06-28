<?php
//
class form_OS_mob_apl
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
   var $num_sae;
   var $data_inicio;
   var $hora_inicio;
   var $data_fim;
   var $hora_fim;
   var $observacoes;
   var $id_usuario_acompanhante;
   var $id_usuario_acompanhante_1;
   var $img_asscondominio;
   var $nom_asscondominio;
   var $rg_asscondominio;
   var $img_assop;
   var $id_tecnico_assop;
   var $id_tecnico_assop_1;
   var $img_assgb;
   var $id_usuario_assgb;
   var $img_asscontroladoria;
   var $nom_asscontroladoria;
   var $rg_asscontroladoria;
   var $num_ativo;
   var $num_status;
   var $criado_em;
   var $criado_em_hora;
   var $total_horas;
   var $cliente;
   var $descricao;
   var $email;
   var $email_1;
   var $empreendimento;
   var $nom_assgb;
   var $operadora;
   var $prestadora;
   var $rg_assgb;
   var $rg_assop;
   var $telefone;
   var $telefone_1;
   var $tipo_assop;
   var $tipo_assop_1;
   var $label_total_horas;
   var $canvas_asscondominio;
   var $canvas_assop;
   var $canvas_assgb;
   var $canvas_asscontroladoria;
   var $savedataonclick;
   var $arquivos;
   var $removeronclick;
   var $enviaronclick;
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
          if (isset($this->NM_ajax_info['param']['arquivos']))
          {
              $this->arquivos = $this->NM_ajax_info['param']['arquivos'];
          }
          if (isset($this->NM_ajax_info['param']['canvas_asscondominio']))
          {
              $this->canvas_asscondominio = $this->NM_ajax_info['param']['canvas_asscondominio'];
          }
          if (isset($this->NM_ajax_info['param']['canvas_asscontroladoria']))
          {
              $this->canvas_asscontroladoria = $this->NM_ajax_info['param']['canvas_asscontroladoria'];
          }
          if (isset($this->NM_ajax_info['param']['canvas_assgb']))
          {
              $this->canvas_assgb = $this->NM_ajax_info['param']['canvas_assgb'];
          }
          if (isset($this->NM_ajax_info['param']['canvas_assop']))
          {
              $this->canvas_assop = $this->NM_ajax_info['param']['canvas_assop'];
          }
          if (isset($this->NM_ajax_info['param']['cliente']))
          {
              $this->cliente = $this->NM_ajax_info['param']['cliente'];
          }
          if (isset($this->NM_ajax_info['param']['criado_em']))
          {
              $this->criado_em = $this->NM_ajax_info['param']['criado_em'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_fim']))
          {
              $this->data_fim = $this->NM_ajax_info['param']['data_fim'];
          }
          if (isset($this->NM_ajax_info['param']['data_inicio']))
          {
              $this->data_inicio = $this->NM_ajax_info['param']['data_inicio'];
          }
          if (isset($this->NM_ajax_info['param']['descricao']))
          {
              $this->descricao = $this->NM_ajax_info['param']['descricao'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['empreendimento']))
          {
              $this->empreendimento = $this->NM_ajax_info['param']['empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['enviaronclick']))
          {
              $this->enviaronclick = $this->NM_ajax_info['param']['enviaronclick'];
          }
          if (isset($this->NM_ajax_info['param']['hora_fim']))
          {
              $this->hora_fim = $this->NM_ajax_info['param']['hora_fim'];
          }
          if (isset($this->NM_ajax_info['param']['hora_inicio']))
          {
              $this->hora_inicio = $this->NM_ajax_info['param']['hora_inicio'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['id_tecnico_assop']))
          {
              $this->id_tecnico_assop = $this->NM_ajax_info['param']['id_tecnico_assop'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuario_acompanhante']))
          {
              $this->id_usuario_acompanhante = $this->NM_ajax_info['param']['id_usuario_acompanhante'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuario_assgb']))
          {
              $this->id_usuario_assgb = $this->NM_ajax_info['param']['id_usuario_assgb'];
          }
          if (isset($this->NM_ajax_info['param']['img_asscondominio']))
          {
              $this->img_asscondominio = $this->NM_ajax_info['param']['img_asscondominio'];
          }
          if (isset($this->NM_ajax_info['param']['img_asscontroladoria']))
          {
              $this->img_asscontroladoria = $this->NM_ajax_info['param']['img_asscontroladoria'];
          }
          if (isset($this->NM_ajax_info['param']['img_assgb']))
          {
              $this->img_assgb = $this->NM_ajax_info['param']['img_assgb'];
          }
          if (isset($this->NM_ajax_info['param']['img_assop']))
          {
              $this->img_assop = $this->NM_ajax_info['param']['img_assop'];
          }
          if (isset($this->NM_ajax_info['param']['label_total_horas']))
          {
              $this->label_total_horas = $this->NM_ajax_info['param']['label_total_horas'];
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
          if (isset($this->NM_ajax_info['param']['nom_asscondominio']))
          {
              $this->nom_asscondominio = $this->NM_ajax_info['param']['nom_asscondominio'];
          }
          if (isset($this->NM_ajax_info['param']['nom_asscontroladoria']))
          {
              $this->nom_asscontroladoria = $this->NM_ajax_info['param']['nom_asscontroladoria'];
          }
          if (isset($this->NM_ajax_info['param']['nom_assgb']))
          {
              $this->nom_assgb = $this->NM_ajax_info['param']['nom_assgb'];
          }
          if (isset($this->NM_ajax_info['param']['num_ativo']))
          {
              $this->num_ativo = $this->NM_ajax_info['param']['num_ativo'];
          }
          if (isset($this->NM_ajax_info['param']['num_sae']))
          {
              $this->num_sae = $this->NM_ajax_info['param']['num_sae'];
          }
          if (isset($this->NM_ajax_info['param']['num_status']))
          {
              $this->num_status = $this->NM_ajax_info['param']['num_status'];
          }
          if (isset($this->NM_ajax_info['param']['observacoes']))
          {
              $this->observacoes = $this->NM_ajax_info['param']['observacoes'];
          }
          if (isset($this->NM_ajax_info['param']['operadora']))
          {
              $this->operadora = $this->NM_ajax_info['param']['operadora'];
          }
          if (isset($this->NM_ajax_info['param']['prestadora']))
          {
              $this->prestadora = $this->NM_ajax_info['param']['prestadora'];
          }
          if (isset($this->NM_ajax_info['param']['removeronclick']))
          {
              $this->removeronclick = $this->NM_ajax_info['param']['removeronclick'];
          }
          if (isset($this->NM_ajax_info['param']['rg_asscondominio']))
          {
              $this->rg_asscondominio = $this->NM_ajax_info['param']['rg_asscondominio'];
          }
          if (isset($this->NM_ajax_info['param']['rg_asscontroladoria']))
          {
              $this->rg_asscontroladoria = $this->NM_ajax_info['param']['rg_asscontroladoria'];
          }
          if (isset($this->NM_ajax_info['param']['rg_assgb']))
          {
              $this->rg_assgb = $this->NM_ajax_info['param']['rg_assgb'];
          }
          if (isset($this->NM_ajax_info['param']['rg_assop']))
          {
              $this->rg_assop = $this->NM_ajax_info['param']['rg_assop'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['telefone']))
          {
              $this->telefone = $this->NM_ajax_info['param']['telefone'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_assop']))
          {
              $this->tipo_assop = $this->NM_ajax_info['param']['tipo_assop'];
          }
          if (isset($this->NM_ajax_info['param']['total_horas']))
          {
              $this->total_horas = $this->NM_ajax_info['param']['total_horas'];
          }
          if (isset($this->NM_ajax_info['param']['ul_info_arquivos']))
          {
              $this->ul_info_arquivos = $this->NM_ajax_info['param']['ul_info_arquivos'];
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
      if (isset($this->form_OS_ID) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['form_OS_ID'] = $this->form_OS_ID;
      }
      if (isset($this->form_OS_Num_SAE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['form_OS_Num_SAE'] = $this->form_OS_Num_SAE;
      }
      if (isset($_POST["form_OS_ID"]) && isset($this->form_OS_ID)) 
      {
          $_SESSION['form_OS_ID'] = $this->form_OS_ID;
      }
      if (!isset($_POST["form_OS_ID"]) && isset($_POST["form_os_id"])) 
      {
          $_SESSION['form_OS_ID'] = $this->form_os_id;
      }
      if (isset($_POST["form_OS_Num_SAE"]) && isset($this->form_OS_Num_SAE)) 
      {
          $_SESSION['form_OS_Num_SAE'] = $this->form_OS_Num_SAE;
      }
      if (!isset($_POST["form_OS_Num_SAE"]) && isset($_POST["form_os_num_sae"])) 
      {
          $_SESSION['form_OS_Num_SAE'] = $this->form_os_num_sae;
      }
      if (isset($_GET["form_OS_ID"]) && isset($this->form_OS_ID)) 
      {
          $_SESSION['form_OS_ID'] = $this->form_OS_ID;
      }
      if (!isset($_GET["form_OS_ID"]) && isset($_GET["form_os_id"])) 
      {
          $_SESSION['form_OS_ID'] = $this->form_os_id;
      }
      if (isset($_GET["form_OS_Num_SAE"]) && isset($this->form_OS_Num_SAE)) 
      {
          $_SESSION['form_OS_Num_SAE'] = $this->form_OS_Num_SAE;
      }
      if (!isset($_GET["form_OS_Num_SAE"]) && isset($_GET["form_os_num_sae"])) 
      {
          $_SESSION['form_OS_Num_SAE'] = $this->form_os_num_sae;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['embutida_parms']);
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
                 nm_limpa_str_form_OS_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->form_OS_ID) && isset($this->form_os_id)) 
          {
              $this->form_OS_ID = $this->form_os_id;
          }
          if (isset($this->form_OS_ID)) 
          {
              $_SESSION['form_OS_ID'] = $this->form_OS_ID;
          }
          if (!isset($this->form_OS_Num_SAE) && isset($this->form_os_num_sae)) 
          {
              $this->form_OS_Num_SAE = $this->form_os_num_sae;
          }
          if (isset($this->form_OS_Num_SAE)) 
          {
              $_SESSION['form_OS_Num_SAE'] = $this->form_OS_Num_SAE;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->form_OS_ID) && isset($this->form_os_id)) 
          {
              $this->form_OS_ID = $this->form_os_id;
          }
          if (isset($this->form_OS_ID)) 
          {
              $_SESSION['form_OS_ID'] = $this->form_OS_ID;
          }
          if (!isset($this->form_OS_Num_SAE) && isset($this->form_os_num_sae)) 
          {
              $this->form_OS_Num_SAE = $this->form_os_num_sae;
          }
          if (isset($this->form_OS_Num_SAE)) 
          {
              $_SESSION['form_OS_Num_SAE'] = $this->form_OS_Num_SAE;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['parms']);
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
          $aDtParts = explode(' ', $this->criado_em);
          $this->criado_em      = $aDtParts[0];
          $this->criado_em_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_OS_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['initialize'];
          if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS']))
          {
              foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_OS'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_OS_mob']['upload_field_info']['arquivos'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_OS_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'multi',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N0',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_OS_mob']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_OS_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_OS_mob']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_OS_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_OS_mob') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_OS_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tb_os";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_OS_mob")
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
      $this->nm_new_label['num_sae'] = '' . $this->Ini->Nm_lang['lang_label_saeprotocol'] . '';
      $this->nm_new_label['data_inicio'] = '' . $this->Ini->Nm_lang['lang_label_startdate'] . '';
      $this->nm_new_label['hora_inicio'] = '' . $this->Ini->Nm_lang['lang_label_start_time'] . '';
      $this->nm_new_label['data_fim'] = '' . $this->Ini->Nm_lang['lang_label_enddate'] . '';
      $this->nm_new_label['hora_fim'] = '' . $this->Ini->Nm_lang['lang_label_end_time'] . '';
      $this->nm_new_label['observacoes'] = '' . $this->Ini->Nm_lang['lang_label_observation'] . '';
      $this->nm_new_label['id_usuario_acompanhante'] = '' . $this->Ini->Nm_lang['lang_label_companion'] . '';
      $this->nm_new_label['nom_asscondominio'] = '' . $this->Ini->Nm_lang['lang_label_name'] . '';
      $this->nm_new_label['rg_asscondominio'] = '' . $this->Ini->Nm_lang['lang_label_rg'] . '';
      $this->nm_new_label['id_tecnico_assop'] = '' . $this->Ini->Nm_lang['lang_label_technician'] . '';
      $this->nm_new_label['nom_asscontroladoria'] = '' . $this->Ini->Nm_lang['lang_label_name'] . '';
      $this->nm_new_label['criado_em'] = '' . $this->Ini->Nm_lang['lang_label_createdin'] . '';
      $this->nm_new_label['cliente'] = '' . $this->Ini->Nm_lang['lang_label_client'] . '';
      $this->nm_new_label['descricao'] = '' . $this->Ini->Nm_lang['lang_label_activitydesc'] . '';
      $this->nm_new_label['empreendimento'] = '' . $this->Ini->Nm_lang['lang_menu_enterprise'] . '';
      $this->nm_new_label['nom_assgb'] = '' . $this->Ini->Nm_lang['lang_label_name'] . '';
      $this->nm_new_label['operadora'] = '' . $this->Ini->Nm_lang['lang_menu_operators'] . '';
      $this->nm_new_label['prestadora'] = '' . $this->Ini->Nm_lang['lang_label_provider'] . '';
      $this->nm_new_label['telefone'] = '' . $this->Ini->Nm_lang['lang_label_phone'] . '';
      $this->nm_new_label['tipo_assop'] = '' . $this->Ini->Nm_lang['lang_label_type'] . '';
      $this->nm_new_label['label_total_horas'] = '' . $this->Ini->Nm_lang['lang_label_totalhours'] . '';
      $this->nm_new_label['arquivos'] = '' . $this->Ini->Nm_lang['lang_label_files'] . '';

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

      $this->arr_buttons['inserir']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['inserir']['type']             = "button";
      $this->arr_buttons['inserir']['value']            = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['inserir']['display']          = "only_text";
      $this->arr_buttons['inserir']['display_position'] = "text_right";
      $this->arr_buttons['inserir']['style']            = "default";
      $this->arr_buttons['inserir']['image']            = "";

      $this->arr_buttons['exportpdf']['hint']             = "Imprimir";
      $this->arr_buttons['exportpdf']['type']             = "button";
      $this->arr_buttons['exportpdf']['value']            = "" . $this->Ini->Nm_lang['lang_btn_print'] . "";
      $this->arr_buttons['exportpdf']['display']          = "only_text";
      $this->arr_buttons['exportpdf']['display_position'] = "text_right";
      $this->arr_buttons['exportpdf']['style']            = "default";
      $this->arr_buttons['exportpdf']['image']            = "";

      $this->arr_buttons['confirmeremover']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['confirmeremover']['type']             = "button";
      $this->arr_buttons['confirmeremover']['value']            = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['confirmeremover']['display']          = "only_text";
      $this->arr_buttons['confirmeremover']['display_position'] = "text_right";
      $this->arr_buttons['confirmeremover']['style']            = "default";
      $this->arr_buttons['confirmeremover']['image']            = "";

      $this->arr_buttons['confirmeenviar']['hint']             = "Enviar Ordem de Serviço";
      $this->arr_buttons['confirmeenviar']['type']             = "button";
      $this->arr_buttons['confirmeenviar']['value']            = "" . $this->Ini->Nm_lang['lang_label_sendso'] . "";
      $this->arr_buttons['confirmeenviar']['display']          = "only_text";
      $this->arr_buttons['confirmeenviar']['display_position'] = "text_right";
      $this->arr_buttons['confirmeenviar']['style']            = "default";
      $this->arr_buttons['confirmeenviar']['image']            = "";

      $this->arr_buttons['atualizar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['atualizar']['type']             = "button";
      $this->arr_buttons['atualizar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['atualizar']['display']          = "only_text";
      $this->arr_buttons['atualizar']['display_position'] = "text_right";
      $this->arr_buttons['atualizar']['style']            = "default";
      $this->arr_buttons['atualizar']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_OS_mob']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_OS_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['inserir'] = "on";
      $this->nmgp_botoes['exportPDF'] = "on";
      $this->nmgp_botoes['confirmeRemover'] = "on";
      $this->nmgp_botoes['confirmeEnviar'] = "on";
      $this->nmgp_botoes['atualizar'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_orig'] = " where ID = '" . $_SESSION['form_OS_ID'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_pesq'] = " where ID = '" . $_SESSION['form_OS_ID'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_OS_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_OS_mob'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_OS_mob'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_OS_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_OS/form_OS_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_OS_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_OS_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_OS_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_OS/form_OS_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_OS_mob_erro.class.php"); 
      }
      $this->Erro      = new form_OS_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_OS_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltar'] = "on";
          $this->nmgp_botoes['inserir'] = "on";
          $this->nmgp_botoes['exportPDF'] = "off";
          $this->nmgp_botoes['confirmeRemover'] = "off";
          $this->nmgp_botoes['confirmeEnviar'] = "off";
          $this->nmgp_botoes['atualizar'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes']['voltar'];
          $this->nmgp_botoes['inserir'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes']['inserir'];
          $this->nmgp_botoes['exportPDF'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes']['exportPDF'];
          $this->nmgp_botoes['confirmeRemover'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes']['confirmeRemover'];
          $this->nmgp_botoes['confirmeEnviar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes']['confirmeEnviar'];
          $this->nmgp_botoes['atualizar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes']['atualizar'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->num_sae)) { $this->nm_limpa_alfa($this->num_sae); }
      if (isset($this->id_usuario_acompanhante)) { $this->nm_limpa_alfa($this->id_usuario_acompanhante); }
      if (isset($this->img_asscondominio)) { $this->nm_limpa_alfa($this->img_asscondominio); }
      if (isset($this->nom_asscondominio)) { $this->nm_limpa_alfa($this->nom_asscondominio); }
      if (isset($this->rg_asscondominio)) { $this->nm_limpa_alfa($this->rg_asscondominio); }
      if (isset($this->img_assop)) { $this->nm_limpa_alfa($this->img_assop); }
      if (isset($this->id_tecnico_assop)) { $this->nm_limpa_alfa($this->id_tecnico_assop); }
      if (isset($this->img_assgb)) { $this->nm_limpa_alfa($this->img_assgb); }
      if (isset($this->id_usuario_assgb)) { $this->nm_limpa_alfa($this->id_usuario_assgb); }
      if (isset($this->img_asscontroladoria)) { $this->nm_limpa_alfa($this->img_asscontroladoria); }
      if (isset($this->nom_asscontroladoria)) { $this->nm_limpa_alfa($this->nom_asscontroladoria); }
      if (isset($this->rg_asscontroladoria)) { $this->nm_limpa_alfa($this->rg_asscontroladoria); }
      if (isset($this->total_horas)) { $this->nm_limpa_alfa($this->total_horas); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "voltar")
          { 
              $this->sc_btn_voltar();
          } 
          if ($nm_call_php == "exportPDF")
          { 
              $this->sc_btn_exportPDF();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_select'];
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
      //-- criado_em
      $this->field_config['criado_em']                 = array();
      $this->field_config['criado_em']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['criado_em']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['criado_em']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['criado_em']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'criado_em');
      //-- data_inicio
      $this->field_config['data_inicio']                 = array();
      $this->field_config['data_inicio']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'];
      $this->field_config['data_inicio']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_inicio']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_inicio');
      //-- hora_inicio
      $this->field_config['hora_inicio']                 = array();
      $this->field_config['hora_inicio']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['hora_inicio']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['hora_inicio']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_inicio');
      //-- data_fim
      $this->field_config['data_fim']                 = array();
      $this->field_config['data_fim']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'];
      $this->field_config['data_fim']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_fim']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_fim');
      //-- hora_fim
      $this->field_config['hora_fim']                 = array();
      $this->field_config['hora_fim']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['hora_fim']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['hora_fim']['date_display'] = "hhii";
      $this->new_date_format('HH', 'hora_fim');
      //-- total_horas
      $this->field_config['total_horas']               = array();
      $this->field_config['total_horas']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['total_horas']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['total_horas']['symbol_dec'] = $_SESSION['hticnsdata']['reg_conf']['dec_num'];
      $this->field_config['total_horas']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['total_horas']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- id_usuario_assgb
      $this->field_config['id_usuario_assgb']               = array();
      $this->field_config['id_usuario_assgb']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_usuario_assgb']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_usuario_assgb']['symbol_dec'] = '';
      $this->field_config['id_usuario_assgb']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_usuario_assgb']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
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
         $this->descricao = "&nbsp;";
         $this->canvas_asscondominio = "&nbsp;";
         $this->canvas_assop = "&nbsp;";
         $this->canvas_assgb = "&nbsp;";
         $this->nom_assgb = "&nbsp;";
         $this->rg_assgb = "&nbsp;";
         $this->canvas_asscontroladoria = "&nbsp;";
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
          if ('validate_num_sae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_sae');
          }
          if ('validate_criado_em' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'criado_em');
          }
          if ('validate_num_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_ativo');
          }
          if ('validate_num_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_status');
          }
          if ('validate_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'empreendimento');
          }
          if ('validate_id_usuario_acompanhante' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuario_acompanhante');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_telefone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'telefone');
          }
          if ('validate_cliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cliente');
          }
          if ('validate_operadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'operadora');
          }
          if ('validate_prestadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prestadora');
          }
          if ('validate_arquivos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'arquivos');
          }
          if ('validate_data_inicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_inicio');
          }
          if ('validate_hora_inicio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_inicio');
          }
          if ('validate_data_fim' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_fim');
          }
          if ('validate_hora_fim' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hora_fim');
          }
          if ('validate_total_horas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'total_horas');
          }
          if ('validate_label_total_horas' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'label_total_horas');
          }
          if ('validate_observacoes' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observacoes');
          }
          if ('validate_img_asscondominio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_asscondominio');
          }
          if ('validate_nom_asscondominio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_asscondominio');
          }
          if ('validate_rg_asscondominio' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rg_asscondominio');
          }
          if ('validate_img_assop' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_assop');
          }
          if ('validate_tipo_assop' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_assop');
          }
          if ('validate_id_tecnico_assop' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_tecnico_assop');
          }
          if ('validate_rg_assop' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rg_assop');
          }
          if ('validate_img_assgb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_assgb');
          }
          if ('validate_id_usuario_assgb' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuario_assgb');
          }
          if ('validate_img_asscontroladoria' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_asscontroladoria');
          }
          if ('validate_nom_asscontroladoria' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_asscontroladoria');
          }
          if ('validate_rg_asscontroladoria' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rg_asscontroladoria');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_removeronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'removeronclick');
          }
          if ('validate_enviaronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'enviaronclick');
          }
          form_OS_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_id_tecnico_assop_onchange' == $this->NM_ajax_opcao)
          {
              $this->ID_Tecnico_AssOP_onChange();
          }
          if ('event_enviaronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->enviarOnClick_onClick();
          }
          if ('event_removeronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->removerOnClick_onClick();
          }
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          form_OS_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_select']['arquivos']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->arquivos = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_select']['arquivos'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_OS_mob_pack_ajax_response();
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
          $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_OS_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_OS_mob_pack_ajax_response();
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
          form_OS_mob_pack_ajax_response();
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "form_OS_mob.php";
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->criado_em, $this->field_config['criado_em']['date_sep']) ; 
      nm_limpa_hora($this->criado_em_hora, $this->field_config['criado_em']['time_sep']) ; 
      nm_limpa_data($this->data_inicio, $this->field_config['data_inicio']['date_sep']) ; 
      nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
      nm_limpa_data($this->data_fim, $this->field_config['data_fim']['date_sep']) ; 
      nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
      if (!empty($this->field_config['total_horas']['symbol_dec']))
      {
          nm_limpa_valor($this->total_horas, $this->field_config['total_horas']['symbol_dec'], $this->field_config['total_horas']['symbol_grp']) ; 
      }
      $this->nm_tira_mask($this->rg_asscondominio, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id_usuario_assgb, $this->field_config['id_usuario_assgb']['symbol_grp']) ; 
      $this->nm_tira_mask($this->rg_asscontroladoria, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                  if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_OS') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off'; 
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
   function sc_btn_exportPDF() 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "form_OS_mob.php";
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->criado_em, $this->field_config['criado_em']['date_sep']) ; 
      nm_limpa_hora($this->criado_em_hora, $this->field_config['criado_em']['time_sep']) ; 
      nm_limpa_data($this->data_inicio, $this->field_config['data_inicio']['date_sep']) ; 
      nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
      nm_limpa_data($this->data_fim, $this->field_config['data_fim']['date_sep']) ; 
      nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
      if (!empty($this->field_config['total_horas']['symbol_dec']))
      {
          nm_limpa_valor($this->total_horas, $this->field_config['total_horas']['symbol_dec'], $this->field_config['total_horas']['symbol_grp']) ; 
      }
      $this->nm_tira_mask($this->rg_asscondominio, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id_usuario_assgb, $this->field_config['id_usuario_assgb']['symbol_grp']) ; 
      $this->nm_tira_mask($this->rg_asscontroladoria, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                  if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('os_pdf') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off'; 
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
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>" onclick="window.close()"/>
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
           case 'num_sae':
               return "" . $this->Ini->Nm_lang['lang_label_saeprotocol'] . "";
               break;
           case 'criado_em':
               return "" . $this->Ini->Nm_lang['lang_label_createdin'] . "";
               break;
           case 'num_ativo':
               return "Num Ativo";
               break;
           case 'num_status':
               return "Num Status";
               break;
           case 'empreendimento':
               return "" . $this->Ini->Nm_lang['lang_menu_enterprise'] . "";
               break;
           case 'id_usuario_acompanhante':
               return "" . $this->Ini->Nm_lang['lang_label_companion'] . "";
               break;
           case 'email':
               return "E-mail";
               break;
           case 'telefone':
               return "" . $this->Ini->Nm_lang['lang_label_phone'] . "";
               break;
           case 'cliente':
               return "" . $this->Ini->Nm_lang['lang_label_client'] . "";
               break;
           case 'operadora':
               return "" . $this->Ini->Nm_lang['lang_menu_operators'] . "";
               break;
           case 'prestadora':
               return "" . $this->Ini->Nm_lang['lang_label_provider'] . "";
               break;
           case 'arquivos':
               return "" . $this->Ini->Nm_lang['lang_label_files'] . "";
               break;
           case 'descricao':
               return "" . $this->Ini->Nm_lang['lang_label_activitydesc'] . "";
               break;
           case 'data_inicio':
               return "" . $this->Ini->Nm_lang['lang_label_startdate'] . "";
               break;
           case 'hora_inicio':
               return "" . $this->Ini->Nm_lang['lang_label_start_time'] . "";
               break;
           case 'data_fim':
               return "" . $this->Ini->Nm_lang['lang_label_enddate'] . "";
               break;
           case 'hora_fim':
               return "" . $this->Ini->Nm_lang['lang_label_end_time'] . "";
               break;
           case 'total_horas':
               return "";
               break;
           case 'label_total_horas':
               return "" . $this->Ini->Nm_lang['lang_label_totalhours'] . "";
               break;
           case 'observacoes':
               return "" . $this->Ini->Nm_lang['lang_label_observation'] . "";
               break;
           case 'canvas_asscondominio':
               return "";
               break;
           case 'img_asscondominio':
               return "";
               break;
           case 'nom_asscondominio':
               return "" . $this->Ini->Nm_lang['lang_label_name'] . "";
               break;
           case 'rg_asscondominio':
               return "" . $this->Ini->Nm_lang['lang_label_rg'] . "";
               break;
           case 'canvas_assop':
               return "";
               break;
           case 'img_assop':
               return "";
               break;
           case 'tipo_assop':
               return "" . $this->Ini->Nm_lang['lang_label_type'] . "";
               break;
           case 'id_tecnico_assop':
               return "" . $this->Ini->Nm_lang['lang_label_technician'] . "";
               break;
           case 'rg_assop':
               return "RG";
               break;
           case 'canvas_assgb':
               return "";
               break;
           case 'img_assgb':
               return "";
               break;
           case 'id_usuario_assgb':
               return "";
               break;
           case 'nom_assgb':
               return "" . $this->Ini->Nm_lang['lang_label_name'] . "";
               break;
           case 'rg_assgb':
               return "RG";
               break;
           case 'canvas_asscontroladoria':
               return "";
               break;
           case 'img_asscontroladoria':
               return "";
               break;
           case 'nom_asscontroladoria':
               return "" . $this->Ini->Nm_lang['lang_label_name'] . "";
               break;
           case 'rg_asscontroladoria':
               return "RG";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'removeronclick':
               return "removerOnClick";
               break;
           case 'enviaronclick':
               return "enviarOnClick";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_OS_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_OS_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_OS_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_OS_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_sae' == $filtro)
        $this->ValidateField_num_sae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'criado_em' == $filtro)
        $this->ValidateField_criado_em($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_ativo' == $filtro)
        $this->ValidateField_num_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_status' == $filtro)
        $this->ValidateField_num_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'empreendimento' == $filtro)
        $this->ValidateField_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_usuario_acompanhante' == $filtro)
        $this->ValidateField_id_usuario_acompanhante($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'telefone' == $filtro)
        $this->ValidateField_telefone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cliente' == $filtro)
        $this->ValidateField_cliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'operadora' == $filtro)
        $this->ValidateField_operadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'prestadora' == $filtro)
        $this->ValidateField_prestadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'arquivos' == $filtro)
        $this->ValidateField_arquivos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_inicio' == $filtro)
        $this->ValidateField_data_inicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hora_inicio' == $filtro)
        $this->ValidateField_hora_inicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_fim' == $filtro)
        $this->ValidateField_data_fim($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hora_fim' == $filtro)
        $this->ValidateField_hora_fim($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'total_horas' == $filtro)
        $this->ValidateField_total_horas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'label_total_horas' == $filtro)
        $this->ValidateField_label_total_horas($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observacoes' == $filtro)
        $this->ValidateField_observacoes($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_asscondominio' == $filtro)
        $this->ValidateField_img_asscondominio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_asscondominio' == $filtro)
        $this->ValidateField_nom_asscondominio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rg_asscondominio' == $filtro)
        $this->ValidateField_rg_asscondominio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_assop' == $filtro)
        $this->ValidateField_img_assop($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_assop' == $filtro)
        $this->ValidateField_tipo_assop($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_tecnico_assop' == $filtro)
        $this->ValidateField_id_tecnico_assop($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rg_assop' == $filtro)
        $this->ValidateField_rg_assop($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_assgb' == $filtro)
        $this->ValidateField_img_assgb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_usuario_assgb' == $filtro)
        $this->ValidateField_id_usuario_assgb($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_asscontroladoria' == $filtro)
        $this->ValidateField_img_asscontroladoria($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_asscontroladoria' == $filtro)
        $this->ValidateField_nom_asscontroladoria($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rg_asscontroladoria' == $filtro)
        $this->ValidateField_rg_asscontroladoria($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'removeronclick' == $filtro)
        $this->ValidateField_removeronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'enviaronclick' == $filtro)
        $this->ValidateField_enviaronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
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

    function ValidateField_num_sae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_sae) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_saeprotocol'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_sae']))
              {
                  $Campos_Erros['num_sae'] = array();
              }
              $Campos_Erros['num_sae'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_sae']) || !is_array($this->NM_ajax_info['errList']['num_sae']))
              {
                  $this->NM_ajax_info['errList']['num_sae'] = array();
              }
              $this->NM_ajax_info['errList']['num_sae'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_sae

    function ValidateField_criado_em(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->criado_em, $this->field_config['criado_em']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['criado_em']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['criado_em']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['criado_em']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['criado_em']['date_sep']) ; 
          if (trim($this->criado_em) != "")  
          { 
              if ($teste_validade->Data($this->criado_em, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_createdin'] . "; " ; 
                  if (!isset($Campos_Erros['criado_em']))
                  {
                      $Campos_Erros['criado_em'] = array();
                  }
                  $Campos_Erros['criado_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['criado_em']) || !is_array($this->NM_ajax_info['errList']['criado_em']))
                  {
                      $this->NM_ajax_info['errList']['criado_em'] = array();
                  }
                  $this->NM_ajax_info['errList']['criado_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['criado_em']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->criado_em_hora, $this->field_config['criado_em_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['criado_em_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['criado_em_hora']['time_sep']) ; 
          if (trim($this->criado_em_hora) != "")  
          { 
              if ($teste_validade->Hora($this->criado_em_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_createdin'] . "; " ; 
                  if (!isset($Campos_Erros['criado_em_hora']))
                  {
                      $Campos_Erros['criado_em_hora'] = array();
                  }
                  $Campos_Erros['criado_em_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['criado_em']) || !is_array($this->NM_ajax_info['errList']['criado_em']))
                  {
                      $this->NM_ajax_info['errList']['criado_em'] = array();
                  }
                  $this->NM_ajax_info['errList']['criado_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['criado_em']) && isset($Campos_Erros['criado_em_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['criado_em'], $Campos_Erros['criado_em_hora']);
          if (empty($Campos_Erros['criado_em_hora']))
          {
              unset($Campos_Erros['criado_em_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['criado_em']))
          {
              $this->NM_ajax_info['errList']['criado_em'] = array_unique($this->NM_ajax_info['errList']['criado_em']);
          }
      }
    } // ValidateField_criado_em_hora

    function ValidateField_num_ativo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_ativo) > 255) 
          { 
              $Campos_Crit .= "Num Ativo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_ativo']))
              {
                  $Campos_Erros['num_ativo'] = array();
              }
              $Campos_Erros['num_ativo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_ativo']) || !is_array($this->NM_ajax_info['errList']['num_ativo']))
              {
                  $this->NM_ajax_info['errList']['num_ativo'] = array();
              }
              $this->NM_ajax_info['errList']['num_ativo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_ativo

    function ValidateField_num_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_status) > 255) 
          { 
              $Campos_Crit .= "Num Status " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_status']))
              {
                  $Campos_Erros['num_status'] = array();
              }
              $Campos_Erros['num_status'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_status']) || !is_array($this->NM_ajax_info['errList']['num_status']))
              {
                  $this->NM_ajax_info['errList']['num_status'] = array();
              }
              $this->NM_ajax_info['errList']['num_status'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_status

    function ValidateField_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->empreendimento) != "")  
          { 
          } 
      } 
    } // ValidateField_empreendimento

    function ValidateField_id_usuario_acompanhante(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_usuario_acompanhante) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']) && !in_array($this->id_usuario_acompanhante, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_usuario_acompanhante']))
                   {
                       $Campos_Erros['id_usuario_acompanhante'] = array();
                   }
                   $Campos_Erros['id_usuario_acompanhante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_usuario_acompanhante']) || !is_array($this->NM_ajax_info['errList']['id_usuario_acompanhante']))
                   {
                       $this->NM_ajax_info['errList']['id_usuario_acompanhante'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_usuario_acompanhante'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_usuario_acompanhante

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->email) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']) && !in_array($this->email, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['email']))
                   {
                       $Campos_Erros['email'] = array();
                   }
                   $Campos_Erros['email'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                   {
                       $this->NM_ajax_info['errList']['email'] = array();
                   }
                   $this->NM_ajax_info['errList']['email'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_email

    function ValidateField_telefone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->telefone) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']) && !in_array($this->telefone, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['telefone']))
                   {
                       $Campos_Erros['telefone'] = array();
                   }
                   $Campos_Erros['telefone'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['telefone']) || !is_array($this->NM_ajax_info['errList']['telefone']))
                   {
                       $this->NM_ajax_info['errList']['telefone'] = array();
                   }
                   $this->NM_ajax_info['errList']['telefone'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_telefone

    function ValidateField_cliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->cliente) != "")  
          { 
          } 
      } 
    } // ValidateField_cliente

    function ValidateField_operadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->operadora) != "")  
          { 
          } 
      } 
    } // ValidateField_operadora

    function ValidateField_prestadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->prestadora) != "")  
          { 
          } 
      } 
    } // ValidateField_prestadora

    function ValidateField_arquivos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $bMU_addingFiles = false;
        $bMU_hasFiles    = false;
        if ($this->nmgp_opcao != "excluir")
        {
          if ('' != trim($this->ul_info_arquivos))
          {
              $aUlList = explode('@scl@', $this->ul_info_arquivos);
              foreach ($aUlList as $sUlItem)
              {
                  $aUlInfo = explode('@sci@', $sUlItem);
                  if ('add' == $aUlInfo[0] && !$teste_validade->ArqExtensao($aUlInfo[1], array()))
                  {
                      $Campos_Crit .= "{lang_label_files}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                      if (!isset($Campos_Erros['arquivos']))
                      {
                          $Campos_Erros['arquivos'] = array();
                      }
                      $Campos_Erros['arquivos'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                      if (!isset($this->NM_ajax_info['errList']['arquivos']) || !is_array($this->NM_ajax_info['errList']['arquivos']))
                      {
                          $this->NM_ajax_info['errList']['arquivos'] = array();
                      }
                      $this->NM_ajax_info['errList']['arquivos'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
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
              $old_value_criado_em = $this->criado_em;
              $old_value_criado_em_hora = $this->criado_em_hora;
              $old_value_data_inicio = $this->data_inicio;
              $old_value_hora_inicio = $this->hora_inicio;
              $old_value_data_fim = $this->data_fim;
              $old_value_hora_fim = $this->hora_fim;
              $old_value_total_horas = $this->total_horas;
              $old_value_rg_asscondominio = $this->rg_asscondominio;
              $old_value_id_usuario_assgb = $this->id_usuario_assgb;
              $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
              $this->nm_tira_formatacao();
              $this->nm_converte_datas(null, true);
              $comando_multiul = "SELECT COUNT(*) FROM tb_osarquivos WHERE ID_OS = " . $this->id . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->id = $old_value_id;
              $this->criado_em = $old_value_criado_em;
              $this->criado_em_hora = $old_value_criado_em_hora;
              $this->data_inicio = $old_value_data_inicio;
              $this->hora_inicio = $old_value_hora_inicio;
              $this->data_fim = $old_value_data_fim;
              $this->hora_fim = $old_value_hora_fim;
              $this->total_horas = $old_value_total_horas;
              $this->rg_asscondominio = $old_value_rg_asscondominio;
              $this->id_usuario_assgb = $old_value_id_usuario_assgb;
              $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_OS_mob_pack_ajax_response();
                  }
                  exit;
              }
              $bMU_hasFiles = $rs_mu->fields[0] > 0;
              $rs_mu->Close();
          }
        }
    } // ValidateField_arquivos

    function ValidateField_data_inicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_inicio, $this->field_config['data_inicio']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_inicio']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_inicio']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_inicio']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_inicio']['date_sep']) ; 
          if (trim($this->data_inicio) != "")  
          { 
              if ($teste_validade->Data($this->data_inicio, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_startdate'] . "; " ; 
                  if (!isset($Campos_Erros['data_inicio']))
                  {
                      $Campos_Erros['data_inicio'] = array();
                  }
                  $Campos_Erros['data_inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_inicio']) || !is_array($this->NM_ajax_info['errList']['data_inicio']))
                  {
                      $this->NM_ajax_info['errList']['data_inicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_inicio']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_inicio

    function ValidateField_hora_inicio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_inicio']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_inicio']['time_sep']) ; 
          if (trim($this->hora_inicio) != "")  
          { 
              if ($teste_validade->Hora($this->hora_inicio, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_start_time'] . "; " ; 
                  if (!isset($Campos_Erros['hora_inicio']))
                  {
                      $Campos_Erros['hora_inicio'] = array();
                  }
                  $Campos_Erros['hora_inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_inicio']) || !is_array($this->NM_ajax_info['errList']['hora_inicio']))
                  {
                      $this->NM_ajax_info['errList']['hora_inicio'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_inicio'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_hora_inicio

    function ValidateField_data_fim(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_fim, $this->field_config['data_fim']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_fim']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_fim']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_fim']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_fim']['date_sep']) ; 
          if (trim($this->data_fim) != "")  
          { 
              if ($teste_validade->Data($this->data_fim, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_enddate'] . "; " ; 
                  if (!isset($Campos_Erros['data_fim']))
                  {
                      $Campos_Erros['data_fim'] = array();
                  }
                  $Campos_Erros['data_fim'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_fim']) || !is_array($this->NM_ajax_info['errList']['data_fim']))
                  {
                      $this->NM_ajax_info['errList']['data_fim'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_fim'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_fim']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_fim

    function ValidateField_hora_fim(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hora_fim']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hora_fim']['time_sep']) ; 
          if (trim($this->hora_fim) != "")  
          { 
              if ($teste_validade->Hora($this->hora_fim, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_end_time'] . "; " ; 
                  if (!isset($Campos_Erros['hora_fim']))
                  {
                      $Campos_Erros['hora_fim'] = array();
                  }
                  $Campos_Erros['hora_fim'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hora_fim']) || !is_array($this->NM_ajax_info['errList']['hora_fim']))
                  {
                      $this->NM_ajax_info['errList']['hora_fim'] = array();
                  }
                  $this->NM_ajax_info['errList']['hora_fim'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_hora_fim

    function ValidateField_total_horas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->total_horas == "")  
      { 
          $this->total_horas = 0;
          $this->sc_force_zero[] = 'total_horas';
      } 
      if (!empty($this->field_config['total_horas']['symbol_dec']))
      {
          nm_limpa_valor($this->total_horas, $this->field_config['total_horas']['symbol_dec'], $this->field_config['total_horas']['symbol_grp']) ; 
          if ('.' == substr($this->total_horas, 0, 1))
          {
              if ('' == str_replace('0', '', substr($this->total_horas, 1)))
              {
                  $this->total_horas = '';
              }
              else
              {
                  $this->total_horas = '0' . $this->total_horas;
              }
          }
      }
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->total_horas != '')  
          { 
              $iTestSize = 17;
              if (strlen($this->total_horas) > $iTestSize)  
              { 
                  $Campos_Crit .= ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['total_horas']))
                  {
                      $Campos_Erros['total_horas'] = array();
                  }
                  $Campos_Erros['total_horas'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['total_horas']) || !is_array($this->NM_ajax_info['errList']['total_horas']))
                  {
                      $this->NM_ajax_info['errList']['total_horas'] = array();
                  }
                  $this->NM_ajax_info['errList']['total_horas'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->total_horas, 10, 6, -0, 1.0E+16, "N") == false)  
              { 
                  $Campos_Crit .= "; " ; 
                  if (!isset($Campos_Erros['total_horas']))
                  {
                      $Campos_Erros['total_horas'] = array();
                  }
                  $Campos_Erros['total_horas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['total_horas']) || !is_array($this->NM_ajax_info['errList']['total_horas']))
                  {
                      $this->NM_ajax_info['errList']['total_horas'] = array();
                  }
                  $this->NM_ajax_info['errList']['total_horas'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_total_horas

    function ValidateField_label_total_horas(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->label_total_horas) != "")  
          { 
          } 
      } 
    } // ValidateField_label_total_horas

    function ValidateField_observacoes(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observacoes) > 32767) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_observation'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['observacoes']))
              {
                  $Campos_Erros['observacoes'] = array();
              }
              $Campos_Erros['observacoes'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['observacoes']) || !is_array($this->NM_ajax_info['errList']['observacoes']))
              {
                  $this->NM_ajax_info['errList']['observacoes'] = array();
              }
              $this->NM_ajax_info['errList']['observacoes'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_observacoes

    function ValidateField_img_asscondominio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->img_asscondominio) > 32767) 
          { 
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['img_asscondominio']))
              {
                  $Campos_Erros['img_asscondominio'] = array();
              }
              $Campos_Erros['img_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['img_asscondominio']) || !is_array($this->NM_ajax_info['errList']['img_asscondominio']))
              {
                  $this->NM_ajax_info['errList']['img_asscondominio'] = array();
              }
              $this->NM_ajax_info['errList']['img_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_img_asscondominio

    function ValidateField_nom_asscondominio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_asscondominio) > 100) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_asscondominio']))
              {
                  $Campos_Erros['nom_asscondominio'] = array();
              }
              $Campos_Erros['nom_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_asscondominio']) || !is_array($this->NM_ajax_info['errList']['nom_asscondominio']))
              {
                  $this->NM_ajax_info['errList']['nom_asscondominio'] = array();
              }
              $this->NM_ajax_info['errList']['nom_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_asscondominio

    function ValidateField_rg_asscondominio(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->rg_asscondominio, explode(';', "9.999.999-*;99.999.999-*;999.999.999-*")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['rg_asscondominio']))
              {
                  $Campos_Erros['rg_asscondominio'] = array();
              }
              $Campos_Erros['rg_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['rg_asscondominio']) || !is_array($this->NM_ajax_info['errList']['rg_asscondominio']))
                  {
                      $this->NM_ajax_info['errList']['rg_asscondominio'] = array();
                  }
                  $this->NM_ajax_info['errList']['rg_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->rg_asscondominio, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rg_asscondominio) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_rg'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rg_asscondominio']))
              {
                  $Campos_Erros['rg_asscondominio'] = array();
              }
              $Campos_Erros['rg_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rg_asscondominio']) || !is_array($this->NM_ajax_info['errList']['rg_asscondominio']))
              {
                  $this->NM_ajax_info['errList']['rg_asscondominio'] = array();
              }
              $this->NM_ajax_info['errList']['rg_asscondominio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_rg_asscondominio

    function ValidateField_img_assop(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->img_assop) > 32767) 
          { 
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['img_assop']))
              {
                  $Campos_Erros['img_assop'] = array();
              }
              $Campos_Erros['img_assop'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['img_assop']) || !is_array($this->NM_ajax_info['errList']['img_assop']))
              {
                  $this->NM_ajax_info['errList']['img_assop'] = array();
              }
              $this->NM_ajax_info['errList']['img_assop'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_img_assop

    function ValidateField_tipo_assop(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tipo_assop == "" && $this->nmgp_opcao != "excluir")
      { 
          $this->tipo_assop = ""; 
      } 
    } // ValidateField_tipo_assop

    function ValidateField_id_tecnico_assop(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_tecnico_assop) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']) && !in_array($this->id_tecnico_assop, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_tecnico_assop']))
                   {
                       $Campos_Erros['id_tecnico_assop'] = array();
                   }
                   $Campos_Erros['id_tecnico_assop'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_tecnico_assop']) || !is_array($this->NM_ajax_info['errList']['id_tecnico_assop']))
                   {
                       $this->NM_ajax_info['errList']['id_tecnico_assop'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_tecnico_assop'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_tecnico_assop

    function ValidateField_rg_assop(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->rg_assop) != "")  
          { 
          } 
      } 
    } // ValidateField_rg_assop

    function ValidateField_img_assgb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->img_assgb) > 32767) 
          { 
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['img_assgb']))
              {
                  $Campos_Erros['img_assgb'] = array();
              }
              $Campos_Erros['img_assgb'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['img_assgb']) || !is_array($this->NM_ajax_info['errList']['img_assgb']))
              {
                  $this->NM_ajax_info['errList']['img_assgb'] = array();
              }
              $this->NM_ajax_info['errList']['img_assgb'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_img_assgb

    function ValidateField_id_usuario_assgb(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_usuario_assgb == "")  
      { 
          $this->id_usuario_assgb = 0;
          $this->sc_force_zero[] = 'id_usuario_assgb';
      } 
      nm_limpa_numero($this->id_usuario_assgb, $this->field_config['id_usuario_assgb']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_usuario_assgb != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_usuario_assgb) > $iTestSize)  
              { 
                  $Campos_Crit .= ": " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_usuario_assgb']))
                  {
                      $Campos_Erros['id_usuario_assgb'] = array();
                  }
                  $Campos_Erros['id_usuario_assgb'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_usuario_assgb']) || !is_array($this->NM_ajax_info['errList']['id_usuario_assgb']))
                  {
                      $this->NM_ajax_info['errList']['id_usuario_assgb'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_usuario_assgb'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_usuario_assgb, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "; " ; 
                  if (!isset($Campos_Erros['id_usuario_assgb']))
                  {
                      $Campos_Erros['id_usuario_assgb'] = array();
                  }
                  $Campos_Erros['id_usuario_assgb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_usuario_assgb']) || !is_array($this->NM_ajax_info['errList']['id_usuario_assgb']))
                  {
                      $this->NM_ajax_info['errList']['id_usuario_assgb'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_usuario_assgb'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_usuario_assgb

    function ValidateField_img_asscontroladoria(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->img_asscontroladoria) > 32767) 
          { 
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['img_asscontroladoria']))
              {
                  $Campos_Erros['img_asscontroladoria'] = array();
              }
              $Campos_Erros['img_asscontroladoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['img_asscontroladoria']) || !is_array($this->NM_ajax_info['errList']['img_asscontroladoria']))
              {
                  $this->NM_ajax_info['errList']['img_asscontroladoria'] = array();
              }
              $this->NM_ajax_info['errList']['img_asscontroladoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_img_asscontroladoria

    function ValidateField_nom_asscontroladoria(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_asscontroladoria) > 100) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_name'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_asscontroladoria']))
              {
                  $Campos_Erros['nom_asscontroladoria'] = array();
              }
              $Campos_Erros['nom_asscontroladoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_asscontroladoria']) || !is_array($this->NM_ajax_info['errList']['nom_asscontroladoria']))
              {
                  $this->NM_ajax_info['errList']['nom_asscontroladoria'] = array();
              }
              $this->NM_ajax_info['errList']['nom_asscontroladoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_asscontroladoria

    function ValidateField_rg_asscontroladoria(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->rg_asscontroladoria, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rg_asscontroladoria) > 45) 
          { 
              $Campos_Crit .= "RG " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rg_asscontroladoria']))
              {
                  $Campos_Erros['rg_asscontroladoria'] = array();
              }
              $Campos_Erros['rg_asscontroladoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rg_asscontroladoria']) || !is_array($this->NM_ajax_info['errList']['rg_asscontroladoria']))
              {
                  $this->NM_ajax_info['errList']['rg_asscontroladoria'] = array();
              }
              $this->NM_ajax_info['errList']['rg_asscontroladoria'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_rg_asscontroladoria

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

    function ValidateField_enviaronclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->enviaronclick) > 20) 
          { 
              $Campos_Crit .= "enviarOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['enviaronclick']))
              {
                  $Campos_Erros['enviaronclick'] = array();
              }
              $Campos_Erros['enviaronclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['enviaronclick']) || !is_array($this->NM_ajax_info['errList']['enviaronclick']))
              {
                  $this->NM_ajax_info['errList']['enviaronclick'] = array();
              }
              $this->NM_ajax_info['errList']['enviaronclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_enviaronclick

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
    $this->nmgp_dados_form['num_sae'] = $this->num_sae;
    $this->nmgp_dados_form['criado_em'] = $this->criado_em;
    $this->nmgp_dados_form['num_ativo'] = $this->num_ativo;
    $this->nmgp_dados_form['num_status'] = $this->num_status;
    $this->nmgp_dados_form['empreendimento'] = $this->empreendimento;
    $this->nmgp_dados_form['id_usuario_acompanhante'] = $this->id_usuario_acompanhante;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['telefone'] = $this->telefone;
    $this->nmgp_dados_form['cliente'] = $this->cliente;
    $this->nmgp_dados_form['operadora'] = $this->operadora;
    $this->nmgp_dados_form['prestadora'] = $this->prestadora;
    $this->nmgp_dados_form['arquivos'] = $this->arquivos;
    $this->nmgp_dados_form['descricao'] = $this->descricao;
    $this->nmgp_dados_form['data_inicio'] = $this->data_inicio;
    $this->nmgp_dados_form['hora_inicio'] = $this->hora_inicio;
    $this->nmgp_dados_form['data_fim'] = $this->data_fim;
    $this->nmgp_dados_form['hora_fim'] = $this->hora_fim;
    $this->nmgp_dados_form['total_horas'] = $this->total_horas;
    $this->nmgp_dados_form['label_total_horas'] = $this->label_total_horas;
    $this->nmgp_dados_form['observacoes'] = $this->observacoes;
    $this->nmgp_dados_form['canvas_asscondominio'] = $this->canvas_asscondominio;
    $this->nmgp_dados_form['img_asscondominio'] = $this->img_asscondominio;
    $this->nmgp_dados_form['nom_asscondominio'] = $this->nom_asscondominio;
    $this->nmgp_dados_form['rg_asscondominio'] = $this->rg_asscondominio;
    $this->nmgp_dados_form['canvas_assop'] = $this->canvas_assop;
    $this->nmgp_dados_form['img_assop'] = $this->img_assop;
    $this->nmgp_dados_form['tipo_assop'] = $this->tipo_assop;
    $this->nmgp_dados_form['id_tecnico_assop'] = $this->id_tecnico_assop;
    $this->nmgp_dados_form['rg_assop'] = $this->rg_assop;
    $this->nmgp_dados_form['canvas_assgb'] = $this->canvas_assgb;
    $this->nmgp_dados_form['img_assgb'] = $this->img_assgb;
    $this->nmgp_dados_form['id_usuario_assgb'] = $this->id_usuario_assgb;
    $this->nmgp_dados_form['nom_assgb'] = $this->nom_assgb;
    $this->nmgp_dados_form['rg_assgb'] = $this->rg_assgb;
    $this->nmgp_dados_form['canvas_asscontroladoria'] = $this->canvas_asscontroladoria;
    $this->nmgp_dados_form['img_asscontroladoria'] = $this->img_asscontroladoria;
    $this->nmgp_dados_form['nom_asscontroladoria'] = $this->nom_asscontroladoria;
    $this->nmgp_dados_form['rg_asscontroladoria'] = $this->rg_asscontroladoria;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['removeronclick'] = $this->removeronclick;
    $this->nmgp_dados_form['enviaronclick'] = $this->enviaronclick;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_data($this->criado_em, $this->field_config['criado_em']['date_sep']) ; 
      nm_limpa_hora($this->criado_em_hora, $this->field_config['criado_em']['time_sep']) ; 
      nm_limpa_data($this->data_inicio, $this->field_config['data_inicio']['date_sep']) ; 
      nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
      nm_limpa_data($this->data_fim, $this->field_config['data_fim']['date_sep']) ; 
      nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
      if (!empty($this->field_config['total_horas']['symbol_dec']))
      {
         nm_limpa_valor($this->total_horas, $this->field_config['total_horas']['symbol_dec'], $this->field_config['total_horas']['symbol_grp']);
      }
      $this->nm_tira_mask($this->rg_asscondominio, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id_usuario_assgb, $this->field_config['id_usuario_assgb']['symbol_grp']) ; 
      $this->nm_tira_mask($this->rg_asscontroladoria, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
   }
   function nm_tira_formatacao_id($Val_in)
   {
      nm_limpa_numero($Val_in, $this->field_config['id']['symbol_grp']) ; 
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
      if ($Nome_Campo == "total_horas")
      {
          if (!empty($this->field_config['total_horas']['symbol_dec']))
          {
             nm_limpa_valor($this->total_horas, $this->field_config['total_horas']['symbol_dec'], $this->field_config['total_horas']['symbol_grp']);
          }
      }
      if ($Nome_Campo == "rg_asscondominio")
      {
          $this->nm_tira_mask($this->rg_asscondominio, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "id_usuario_assgb")
      {
          nm_limpa_numero($this->id_usuario_assgb, $this->field_config['id_usuario_assgb']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "rg_asscontroladoria")
      {
          $this->nm_tira_mask($this->rg_asscontroladoria, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
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
      if ((!empty($this->criado_em) && 'null' != $this->criado_em) || (!empty($format_fields) && isset($format_fields['criado_em'])))
      {
          $nm_separa_data = strpos($this->field_config['criado_em']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['criado_em']['date_format'];
          $this->field_config['criado_em']['date_format'] = substr($this->field_config['criado_em']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->criado_em, " ") ; 
          $this->criado_em_hora = substr($this->criado_em, $separador + 1) ; 
          $this->criado_em = substr($this->criado_em, 0, $separador) ; 
          nm_volta_data($this->criado_em, $this->field_config['criado_em']['date_format']) ; 
          nmgp_Form_Datas($this->criado_em, $this->field_config['criado_em']['date_format'], $this->field_config['criado_em']['date_sep']) ;  
          $this->field_config['criado_em']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->criado_em_hora, $this->field_config['criado_em']['date_format']) ; 
          nmgp_Form_Hora($this->criado_em_hora, $this->field_config['criado_em']['date_format'], $this->field_config['criado_em']['time_sep']) ;  
          $this->field_config['criado_em']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->criado_em || '' == $this->criado_em)
      {
          $this->criado_em_hora = '';
          $this->criado_em = '';
      }
      if ((!empty($this->data_inicio) && 'null' != $this->data_inicio) || (!empty($format_fields) && isset($format_fields['data_inicio'])))
      {
          nm_volta_data($this->data_inicio, $this->field_config['data_inicio']['date_format']) ; 
          nmgp_Form_Datas($this->data_inicio, $this->field_config['data_inicio']['date_format'], $this->field_config['data_inicio']['date_sep']) ;  
      }
      elseif ('null' == $this->data_inicio || '' == $this->data_inicio)
      {
          $this->data_inicio = '';
      }
      if ((!empty($this->hora_inicio) && 'null' != $this->hora_inicio) || (!empty($format_fields) && isset($format_fields['hora_inicio'])))
      {
          nm_volta_hora($this->hora_inicio, $this->field_config['hora_inicio']['date_format']) ; 
          nmgp_Form_Hora($this->hora_inicio, $this->field_config['hora_inicio']['date_format'], $this->field_config['hora_inicio']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_inicio || '' == $this->hora_inicio)
      {
          $this->hora_inicio = '';
      }
      if ((!empty($this->data_fim) && 'null' != $this->data_fim) || (!empty($format_fields) && isset($format_fields['data_fim'])))
      {
          nm_volta_data($this->data_fim, $this->field_config['data_fim']['date_format']) ; 
          nmgp_Form_Datas($this->data_fim, $this->field_config['data_fim']['date_format'], $this->field_config['data_fim']['date_sep']) ;  
      }
      elseif ('null' == $this->data_fim || '' == $this->data_fim)
      {
          $this->data_fim = '';
      }
      if ((!empty($this->hora_fim) && 'null' != $this->hora_fim) || (!empty($format_fields) && isset($format_fields['hora_fim'])))
      {
          nm_volta_hora($this->hora_fim, $this->field_config['hora_fim']['date_format']) ; 
          nmgp_Form_Hora($this->hora_fim, $this->field_config['hora_fim']['date_format'], $this->field_config['hora_fim']['time_sep']) ;  
      }
      elseif ('null' == $this->hora_fim || '' == $this->hora_fim)
      {
          $this->hora_fim = '';
      }
      if (!empty($this->total_horas) || (!empty($format_fields) && isset($format_fields['total_horas'])))
      {
          nmgp_Form_Num_Val($this->total_horas, $this->field_config['total_horas']['symbol_grp'], $this->field_config['total_horas']['symbol_dec'], "6", "S", "", "", "", "-", $this->field_config['total_horas']['symbol_fmt']) ; 
      }
      if (!empty($this->rg_asscondominio) || (!empty($format_fields) && isset($format_fields['rg_asscondominio'])))
      {
          $this->nm_gera_mask($this->rg_asscondominio, "9.999.999-*;99.999.999-*;999.999.999-*"); 
      }
      if (!empty($this->id_usuario_assgb) || (!empty($format_fields) && isset($format_fields['id_usuario_assgb'])))
      {
          nmgp_Form_Num_Val($this->id_usuario_assgb, $this->field_config['id_usuario_assgb']['symbol_grp'], $this->field_config['id_usuario_assgb']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_usuario_assgb']['symbol_fmt']) ; 
      }
      if (!empty($this->rg_asscontroladoria) || (!empty($format_fields) && isset($format_fields['rg_asscontroladoria'])))
      {
          $this->nm_gera_mask($this->rg_asscontroladoria, "9.999.999-*;99.999.999-*;999.999.999-*"); 
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
      $guarda_format_hora = $this->field_config['criado_em']['date_format'];
      if ($this->criado_em != "")  
      { 
          $nm_separa_data = strpos($this->field_config['criado_em']['date_format'], ";") ;
          $this->field_config['criado_em']['date_format'] = substr($this->field_config['criado_em']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->criado_em, $this->field_config['criado_em']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->criado_em = str_replace('-', '', $this->criado_em);
          }
          $this->field_config['criado_em']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->criado_em_hora, $this->field_config['criado_em']['date_format']) ; 
          if ($this->criado_em_hora == "" )  
          { 
              $this->criado_em_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4) . "." . substr($this->criado_em_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->criado_em_hora = substr($this->criado_em_hora, 0, -4);
          }
          if ($this->criado_em != "")  
          { 
              $this->criado_em .= " " . $this->criado_em_hora ; 
          }
      } 
      if ($this->criado_em == "" && $use_null)  
      { 
          $this->criado_em = "null" ; 
      } 
      $this->field_config['criado_em']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['data_inicio']['date_format'];
      if ($this->data_inicio != "")  
      { 
          nm_conv_data($this->data_inicio, $this->field_config['data_inicio']['date_format']) ; 
          $this->data_inicio_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_inicio_hora = substr($this->data_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_inicio_hora = substr($this->data_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_inicio_hora = substr($this->data_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_inicio_hora = substr($this->data_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_inicio_hora = substr($this->data_inicio_hora, 0, -4);
          }
      } 
      if ($this->data_inicio == "" && $use_null)  
      { 
          $this->data_inicio = "null" ; 
      } 
      $this->field_config['data_inicio']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_inicio']['date_format'];
      if ($this->hora_inicio != "")  
      { 
          $this->hora_inicio_hora = $this->hora_inicio;
          $this->hora_inicio = "1900-01-01";
          nm_conv_hora($this->hora_inicio_hora, $this->field_config['hora_inicio']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_inicio_hora = substr($this->hora_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_inicio_hora = substr($this->hora_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_inicio_hora = substr($this->hora_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_inicio_hora = substr($this->hora_inicio_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_inicio_hora = substr($this->hora_inicio_hora, 0, -4);
          }
          $this->hora_inicio = $this->hora_inicio_hora;
      } 
      if ($this->hora_inicio == "" && $use_null)  
      { 
          $this->hora_inicio = "null" ; 
      } 
      $this->field_config['hora_inicio']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['data_fim']['date_format'];
      if ($this->data_fim != "")  
      { 
          nm_conv_data($this->data_fim, $this->field_config['data_fim']['date_format']) ; 
          $this->data_fim_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_fim_hora = substr($this->data_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_fim_hora = substr($this->data_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_fim_hora = substr($this->data_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_fim_hora = substr($this->data_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_fim_hora = substr($this->data_fim_hora, 0, -4);
          }
      } 
      if ($this->data_fim == "" && $use_null)  
      { 
          $this->data_fim = "null" ; 
      } 
      $this->field_config['data_fim']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hora_fim']['date_format'];
      if ($this->hora_fim != "")  
      { 
          $this->hora_fim_hora = $this->hora_fim;
          $this->hora_fim = "1900-01-01";
          nm_conv_hora($this->hora_fim_hora, $this->field_config['hora_fim']['date_format']) ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hora_fim_hora = substr($this->hora_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hora_fim_hora = substr($this->hora_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hora_fim_hora = substr($this->hora_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hora_fim_hora = substr($this->hora_fim_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hora_fim_hora = substr($this->hora_fim_hora, 0, -4);
          }
          $this->hora_fim = $this->hora_fim_hora;
      } 
      if ($this->hora_fim == "" && $use_null)  
      { 
          $this->hora_fim = "null" ; 
      } 
      $this->field_config['hora_fim']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_num_sae();
          $this->ajax_return_values_criado_em();
          $this->ajax_return_values_num_ativo();
          $this->ajax_return_values_num_status();
          $this->ajax_return_values_empreendimento();
          $this->ajax_return_values_id_usuario_acompanhante();
          $this->ajax_return_values_email();
          $this->ajax_return_values_telefone();
          $this->ajax_return_values_cliente();
          $this->ajax_return_values_operadora();
          $this->ajax_return_values_prestadora();
          $this->ajax_return_values_arquivos();
          $this->ajax_return_values_descricao();
          $this->ajax_return_values_data_inicio();
          $this->ajax_return_values_hora_inicio();
          $this->ajax_return_values_data_fim();
          $this->ajax_return_values_hora_fim();
          $this->ajax_return_values_total_horas();
          $this->ajax_return_values_label_total_horas();
          $this->ajax_return_values_observacoes();
          $this->ajax_return_values_canvas_asscondominio();
          $this->ajax_return_values_img_asscondominio();
          $this->ajax_return_values_nom_asscondominio();
          $this->ajax_return_values_rg_asscondominio();
          $this->ajax_return_values_canvas_assop();
          $this->ajax_return_values_img_assop();
          $this->ajax_return_values_tipo_assop();
          $this->ajax_return_values_id_tecnico_assop();
          $this->ajax_return_values_rg_assop();
          $this->ajax_return_values_canvas_assgb();
          $this->ajax_return_values_img_assgb();
          $this->ajax_return_values_id_usuario_assgb();
          $this->ajax_return_values_nom_assgb();
          $this->ajax_return_values_rg_assgb();
          $this->ajax_return_values_canvas_asscontroladoria();
          $this->ajax_return_values_img_asscontroladoria();
          $this->ajax_return_values_nom_asscontroladoria();
          $this->ajax_return_values_rg_asscontroladoria();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_removeronclick();
          $this->ajax_return_values_enviaronclick();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_OS_mob_pack_protect_string($this->nmgp_dados_form['id']);
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

          //----- num_sae
   function ajax_return_values_num_sae($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_sae", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_sae);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_sae'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- criado_em
   function ajax_return_values_criado_em($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("criado_em", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->criado_em);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['criado_em'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->criado_em . ' ' . $this->criado_em_hora),
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
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_ativo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_status
   function ajax_return_values_num_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_status);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_status'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- empreendimento
   function ajax_return_values_empreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("empreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->empreendimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['empreendimento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_usuario_acompanhante
   function ajax_return_values_id_usuario_acompanhante($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_usuario_acompanhante", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_usuario_acompanhante);
              $aLookup = array();
              $this->_tmp_lookup_id_usuario_acompanhante = $this->id_usuario_acompanhante;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'] = array(); 
}
if ($this->id_usuario_acompanhante != "")
{ 
   $this->nm_clear_val("id_usuario_acompanhante");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "SELECT ID_Usuario, Nom_Nome 
FROM tb_usuarios 
WHERE ID_Usuario = '$this->id_usuario_acompanhante'
ORDER BY Nom_Nome";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_usuario_acompanhante\"";
          if (isset($this->NM_ajax_info['select_html']['id_usuario_acompanhante']) && !empty($this->NM_ajax_info['select_html']['id_usuario_acompanhante']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_usuario_acompanhante'];
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

                  if ($this->id_usuario_acompanhante == $sValue)
                  {
                      $this->_tmp_lookup_id_usuario_acompanhante = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_usuario_acompanhante'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_usuario_acompanhante']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_usuario_acompanhante']['valList'][$i] = form_OS_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_usuario_acompanhante']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_usuario_acompanhante']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_usuario_acompanhante']['labList'] = $aLabel;
          }
   }

          //----- email
   function ajax_return_values_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email);
              $aLookup = array();
              $this->_tmp_lookup_email = $this->email;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "SELECT ID_Usuario, IF(Nom_Email1 != '',Nom_Email1,Nom_Email2) as email
FROM tb_usuarios 
HAVING email != ''";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'][] = $rs->fields[0];
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
          $sSelComp = "name=\"email\"";
          if (isset($this->NM_ajax_info['select_html']['email']) && !empty($this->NM_ajax_info['select_html']['email']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['email'];
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

                  if ($this->email == $sValue)
                  {
                      $this->_tmp_lookup_email = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['email']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['email']['valList'][$i] = form_OS_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['email']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['email']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['email']['labList'] = $aLabel;
          }
   }

          //----- telefone
   function ajax_return_values_telefone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("telefone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->telefone);
              $aLookup = array();
              $this->_tmp_lookup_telefone = $this->telefone;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "SELECT ID_Usuario, 
	IF(Num_TelefoneComercial != '',
		IF(CHAR_LENGTH(Num_TelefoneComercial) = 10,
			MASK(Num_TelefoneComercial, '(##) ####-####'),
			IF(CHAR_LENGTH(Num_TelefoneComercial) = 11, 
				MASK(Num_TelefoneComercial, '(##) #####-####'),
                ''
			)
		),
        IF(Nom_TelefoneResidencial != '',
			IF(CHAR_LENGTH(Nom_TelefoneResidencial) = 10,
				MASK(Nom_TelefoneResidencial, '(##) ####-####'),
                IF(CHAR_LENGTH(Nom_TelefoneResidencial) = 11, 
					MASK(Nom_TelefoneResidencial, '(##) #####-####'),
                    ''
				)
			),
            IF(CHAR_LENGTH(Num_TelefoneCelular) = 10,
				MASK(Num_TelefoneCelular, '(##) ####-####'),
				IF(CHAR_LENGTH(Num_TelefoneCelular) = 11, 
					MASK(Num_TelefoneCelular, '(##) #####-####'),
                    ''
				)
			)
		)
	) as telefone
FROM tb_usuarios
HAVING telefone != ''";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'][] = $rs->fields[0];
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
          $sSelComp = "name=\"telefone\"";
          if (isset($this->NM_ajax_info['select_html']['telefone']) && !empty($this->NM_ajax_info['select_html']['telefone']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['telefone'];
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

                  if ($this->telefone == $sValue)
                  {
                      $this->_tmp_lookup_telefone = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['telefone'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['telefone']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['telefone']['valList'][$i] = form_OS_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['telefone']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['telefone']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['telefone']['labList'] = $aLabel;
          }
   }

          //----- cliente
   function ajax_return_values_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cliente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cliente'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- operadora
   function ajax_return_values_operadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("operadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->operadora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['operadora'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- prestadora
   function ajax_return_values_prestadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prestadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prestadora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['prestadora'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- arquivos
   function ajax_return_values_arquivos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("arquivos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->arquivos);
              $aLookup = array();
              $this->nm_tira_formatacao();
              $this->nm_converte_datas(null, true);
              $comando_multiul = "SELECT ID, Arquivo FROM tb_osarquivos WHERE ID_OS = " . $this->id . " ORDER BY ID ASC";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->nm_formatar_campos();
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_OS_mob_pack_ajax_response();
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
                  $muFile      = 'sc_arquivos_' . md5(mt_rand(1, 1000) . microtime() . session_id());
                  $muFileTN    = $muFile . '_tn' . $muExtension;
                  $muFile      = $muFile . $muExtension;
                  if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS']['download_filenames']))
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS']['download_filenames'] = array();
                  }
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS']['download_filenames'][$muFile] = $muData;
                  $muSubDir = "/../OS/" . $this->nm_tira_formatacao_id($this->id) . "/";
                  $muDirOrig = $this->Ini->path_doc . $muSubDir . '/';
                  if (!@is_dir($muDirOrig))
                  {
                      @mkdir($muDirOrig);
                  }
                  @copy($muDirOrig . $muData, $this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFile);
                  $muLink = "javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", substr($muFile, 3)) . "', 'form_OS')";
                  $muLabel .= $muData;
                  $muHtmlItem  = '<span class="id_mu_item_arquivos">';
                  $muHtmlItem .= '<span class="id_mu_data_arquivos">';
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
                  $muHtmlItem   .= '<span class="id_mu_all_chkbx_arquivos"><input type="checkbox" id="id_mu_chkbx_opt_arquivos_' . $muItemCount . '" class="id_mu_chkbx_arquivos" value="' . $muKey . '" /><label for="id_mu_chkbx_opt_arquivos_' . $muItemCount . '">' . $this->Ini->Nm_lang['lang_errm_mu_delfile'] . '</label></span>';
                  $muHtmlItem   .= '</span>';
                  $muHtmlArray[] = $muHtmlItem;
                  $rs_mu->MoveNext();
                  $muItemCount++;
              }
              $muHtml = implode('<br />', $muHtmlArray);
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['arquivos'] = array(
                       'row'    => '',
               'type'    => 'multi_upload',
               'valList' => array($sTmpValue),
               'mulHtml' => $muHtml,
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- data_inicio
   function ajax_return_values_data_inicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_inicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_inicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_inicio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_inicio
   function ajax_return_values_hora_inicio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_inicio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_inicio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_inicio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- data_fim
   function ajax_return_values_data_fim($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_fim", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_fim);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_fim'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hora_fim
   function ajax_return_values_hora_fim($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hora_fim", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hora_fim);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hora_fim'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- total_horas
   function ajax_return_values_total_horas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("total_horas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->total_horas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['total_horas'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- label_total_horas
   function ajax_return_values_label_total_horas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("label_total_horas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->label_total_horas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['label_total_horas'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- observacoes
   function ajax_return_values_observacoes($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("observacoes", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->observacoes);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['observacoes'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- canvas_asscondominio
   function ajax_return_values_canvas_asscondominio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("canvas_asscondominio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->canvas_asscondominio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['canvas_asscondominio'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- img_asscondominio
   function ajax_return_values_img_asscondominio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_asscondominio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_asscondominio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_asscondominio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nom_asscondominio
   function ajax_return_values_nom_asscondominio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_asscondominio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_asscondominio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_asscondominio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- rg_asscondominio
   function ajax_return_values_rg_asscondominio($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rg_asscondominio", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rg_asscondominio);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rg_asscondominio'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- canvas_assop
   function ajax_return_values_canvas_assop($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("canvas_assop", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->canvas_assop);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['canvas_assop'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- img_assop
   function ajax_return_values_img_assop($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_assop", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_assop);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_assop'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tipo_assop
   function ajax_return_values_tipo_assop($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_assop", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_assop);
              $aLookup = array();
              $this->_tmp_lookup_tipo_assop = $this->tipo_assop;

$aLookup[] = array(form_OS_mob_pack_protect_string('O') => form_OS_mob_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_upc_operators'] . ""));
$aLookup[] = array(form_OS_mob_pack_protect_string('P') => form_OS_mob_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_upc_providers'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_tipo_assop'][] = 'O';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_tipo_assop'][] = 'P';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_assop\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_assop']) && !empty($this->NM_ajax_info['select_html']['tipo_assop']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tipo_assop'];
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

                  if ($this->tipo_assop == $sValue)
                  {
                      $this->_tmp_lookup_tipo_assop = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_assop'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_assop']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_assop']['valList'][$i] = form_OS_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_assop']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_assop']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_assop']['labList'] = $aLabel;
          }
   }

          //----- id_tecnico_assop
   function ajax_return_values_id_tecnico_assop($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_tecnico_assop", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_tecnico_assop);
              $aLookup = array();
              $this->_tmp_lookup_id_tecnico_assop = $this->id_tecnico_assop;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'] = array(); 
}
$aLookup[] = array(form_OS_mob_pack_protect_string('') => form_OS_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "select tb1.ID, CONCAT(tb1.Nom_Tecnico,' ',tb1.Nom_Sobrenome)
FROM tb_tecnicos as tb1
INNER JOIN tb_tecsae as tb2 ON tb2.ID_Tecnico = tb1.ID
WHERE tb2.Num_SAE = '" . $_SESSION['form_OS_Num_SAE'] . "' AND tb1.Tipo_Tecnico = '$this->tipo_assop'
GROUP BY tb1.ID";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_OS_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_tecnico_assop\"";
          if (isset($this->NM_ajax_info['select_html']['id_tecnico_assop']) && !empty($this->NM_ajax_info['select_html']['id_tecnico_assop']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_tecnico_assop'];
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

                  if ($this->id_tecnico_assop == $sValue)
                  {
                      $this->_tmp_lookup_id_tecnico_assop = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_tecnico_assop'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_tecnico_assop']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_tecnico_assop']['valList'][$i] = form_OS_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_tecnico_assop']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_tecnico_assop']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_tecnico_assop']['labList'] = $aLabel;
          }
   }

          //----- rg_assop
   function ajax_return_values_rg_assop($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rg_assop", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rg_assop);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rg_assop'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- canvas_assgb
   function ajax_return_values_canvas_assgb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("canvas_assgb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->canvas_assgb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['canvas_assgb'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- img_assgb
   function ajax_return_values_img_assgb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_assgb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_assgb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_assgb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- id_usuario_assgb
   function ajax_return_values_id_usuario_assgb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_usuario_assgb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_usuario_assgb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_usuario_assgb'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nom_assgb
   function ajax_return_values_nom_assgb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_assgb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_assgb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_assgb'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- rg_assgb
   function ajax_return_values_rg_assgb($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rg_assgb", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rg_assgb);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rg_assgb'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- canvas_asscontroladoria
   function ajax_return_values_canvas_asscontroladoria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("canvas_asscontroladoria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->canvas_asscontroladoria);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['canvas_asscontroladoria'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- img_asscontroladoria
   function ajax_return_values_img_asscontroladoria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_asscontroladoria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_asscontroladoria);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_asscontroladoria'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- nom_asscontroladoria
   function ajax_return_values_nom_asscontroladoria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_asscontroladoria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_asscontroladoria);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_asscontroladoria'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- rg_asscontroladoria
   function ajax_return_values_rg_asscontroladoria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rg_asscontroladoria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rg_asscontroladoria);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rg_asscontroladoria'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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

          //----- enviaronclick
   function ajax_return_values_enviaronclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("enviaronclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->enviaronclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['enviaronclick'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["label_total_horas"]))
          {
              $this->nmgp_cmp_hidden["label_total_horas"] = "off"; $this->NM_ajax_info['fieldDisplay']['label_total_horas'] = 'off';
          }
      }
      else
      {
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_form_OS_Num_SAE)) {$this->sc_temp_form_OS_Num_SAE = (isset($_SESSION['form_OS_Num_SAE'])) ? $_SESSION['form_OS_Num_SAE'] : "";}
                 ?><?php sc_include_library("sys", "initCustom", "onLoad.html"); ?><?php
sc_include_library("sys", "functions", "functions.php");
sc_include_library("sys", "models", "Sae.php");
sc_include_library("sys", "models", "Usuarios.php");
sc_include_library("sys", "models", "Tecnicos.php");
$s = new manageSession(true);
$profile = $s->get("profile");
$_Sae = new Sae($this);
$_Usuarios = new Usuarios($this);
$_Tecnicos = new Tecnicos($this);

echo $s->getMessage(true);
echo $s->getIUDState($this);

if ($_Sae->appState == "novo") {
	$Num_SAE = $this->sc_temp_form_OS_Num_SAE;
	$this->num_ativo  = "S";
	$this->num_status  = "P";
	$this->criado_em  = date("Y-m-d H:i:s");
	$this->nmgp_cmp_hidden["arquivos"] = "off"; $this->NM_ajax_info['fieldDisplay']['arquivos'] = 'off';
} else $Num_SAE = $this->num_sae ;

$this->sc_field_readonly("id_usuario_acompanhante", 'on');
$this->sc_field_readonly("email", 'on');
$this->sc_field_readonly("telefone", 'on');
$this->sc_field_readonly("num_sae", 'on');
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;

$Sae = $_Sae->getByNum_SAE($Num_SAE);

$this->num_sae  = $Num_SAE;
$this->id_usuario_acompanhante  = $s->get("ID_Usuario");
$this->email  = $this->id_usuario_acompanhante ;
$this->telefone  = $this->id_usuario_acompanhante ;
$this->empreendimento  = $Sae["Nom_Empreendimento"];
$this->cliente  = $Sae["Nom_Cliente"];
$this->operadora  = $Sae["Nom_Operadora"];
$this->prestadora  = $Sae["Nom_Prestadora"];
$this->descricao  = strtr($Sae["Desc"], ["\n"=>"<br>"]);
if ($_Sae->appState == "novo") {
	$data_atividade  = $Sae["Data_Inicio"];
	$this->data_inicio  = $Sae["Data_Inicio"];
	$this->hora_inicio  = $Sae["Hora_Inicio"];
	$this->data_fim  = $Sae["Data_Fim"];
	$this->hora_fim  = $Sae["Hora_Fim"];
	$this->id_usuario_assgb  = $s->get("ID_Usuario");
} else {
	$this->label_total_horas  = convertNumberInStringHour($this->total_horas );
	$tecnico = $_Tecnicos->getById($this->id_tecnico_assop );
	if ($tecnico) {
		$this->tipo_assop  = $tecnico[0]["Tipo_Tecnico"];
		$this->rg_assop  = ($tecnico[0]["Num_RG"] ? mask($tecnico[0]["Num_RG"], ["#.###.###-#", "##.###.###-#", "###.###.###-#"]) : "");
	}
$this->disableAll();
	if ($this->num_status  == "E") {
		$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['confirmeEnviar'] = $this->nmgp_botoes["confirmeEnviar"] = "off";;
	} elseif ($this->num_status  == "P") {
	}
}

$usuarioGB = $_Usuarios->getById(intval($this->id_usuario_assgb ));
if ($usuarioGB) {
	$this->nom_assgb  = $usuarioGB[0]["Nom_Nome"];
	$this->rg_assgb  = ($usuarioGB[0]["Num_RG"] ? mask($usuarioGB[0]["Num_RG"], ["#.###.###-#", "##.###.###-#", "###.###.###-#"]) : "");
}

if (!(isset($profile["OS"]["EDITAR"]["v"]) && $profile["OS"]["EDITAR"]["v"] == "S")) {
	$this->NM_ajax_info['buttonDisplay']['atualizar'] = $this->nmgp_botoes["atualizar"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['confirmeEnviar'] = $this->nmgp_botoes["confirmeEnviar"] = "off";;
	$this->sc_ajax_javascript('nm_field_disabled', array("arquivos=disabled", ""));
;
}
if (!(isset($profile["OS"]["DELETAR"]["v"]) && $profile["OS"]["DELETAR"]["v"] == "S")) {
	$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "off";;
}

echo "<script>
		loadBreadcrumb(['". $this->Ini->Nm_lang['lang_label_orderservice'] ."', '".$Num_SAE."']);
</script>";
$this->onLoadJS([
	"showCanvas" => $_Sae->appState == "novo"
]);
if (isset($this->sc_temp_form_OS_Num_SAE)) { $_SESSION['form_OS_Num_SAE'] = $this->sc_temp_form_OS_Num_SAE;}
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->criado_em))
      {
          $this->criado_em_hora = $this->criado_em;
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
      $this->total_horas = str_replace($sc_parm1, $sc_parm2, $this->total_horas); 
   } 
   function nm_poe_aspas_decimal() 
   { 
      $this->total_horas = "'" . $this->total_horas . "'";
   } 
   function nm_tira_aspas_decimal() 
   { 
      $this->total_horas = str_replace("'", "", $this->total_horas); 
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
      $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 sc_include_library("sys", "functions", "functions.php");
$this->total_horas  = convertHourInNumberInt(strtotime("$this->data_inicio  $this->hora_inicio "), strtotime("$this->data_fim  $this->hora_fim "));
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['num_sae'] = $this->num_sae;
      $NM_val_form['criado_em'] = $this->criado_em;
      $NM_val_form['num_ativo'] = $this->num_ativo;
      $NM_val_form['num_status'] = $this->num_status;
      $NM_val_form['empreendimento'] = $this->empreendimento;
      $NM_val_form['id_usuario_acompanhante'] = $this->id_usuario_acompanhante;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['telefone'] = $this->telefone;
      $NM_val_form['cliente'] = $this->cliente;
      $NM_val_form['operadora'] = $this->operadora;
      $NM_val_form['prestadora'] = $this->prestadora;
      $NM_val_form['arquivos'] = $this->arquivos;
      $NM_val_form['descricao'] = $this->descricao;
      $NM_val_form['data_inicio'] = $this->data_inicio;
      $NM_val_form['hora_inicio'] = $this->hora_inicio;
      $NM_val_form['data_fim'] = $this->data_fim;
      $NM_val_form['hora_fim'] = $this->hora_fim;
      $NM_val_form['total_horas'] = $this->total_horas;
      $NM_val_form['label_total_horas'] = $this->label_total_horas;
      $NM_val_form['observacoes'] = $this->observacoes;
      $NM_val_form['canvas_asscondominio'] = $this->canvas_asscondominio;
      $NM_val_form['img_asscondominio'] = $this->img_asscondominio;
      $NM_val_form['nom_asscondominio'] = $this->nom_asscondominio;
      $NM_val_form['rg_asscondominio'] = $this->rg_asscondominio;
      $NM_val_form['canvas_assop'] = $this->canvas_assop;
      $NM_val_form['img_assop'] = $this->img_assop;
      $NM_val_form['tipo_assop'] = $this->tipo_assop;
      $NM_val_form['id_tecnico_assop'] = $this->id_tecnico_assop;
      $NM_val_form['rg_assop'] = $this->rg_assop;
      $NM_val_form['canvas_assgb'] = $this->canvas_assgb;
      $NM_val_form['img_assgb'] = $this->img_assgb;
      $NM_val_form['id_usuario_assgb'] = $this->id_usuario_assgb;
      $NM_val_form['nom_assgb'] = $this->nom_assgb;
      $NM_val_form['rg_assgb'] = $this->rg_assgb;
      $NM_val_form['canvas_asscontroladoria'] = $this->canvas_asscontroladoria;
      $NM_val_form['img_asscontroladoria'] = $this->img_asscontroladoria;
      $NM_val_form['nom_asscontroladoria'] = $this->nom_asscontroladoria;
      $NM_val_form['rg_asscontroladoria'] = $this->rg_asscontroladoria;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['removeronclick'] = $this->removeronclick;
      $NM_val_form['enviaronclick'] = $this->enviaronclick;
      if ($this->id == "")  
      { 
          $this->id = 0;
      } 
      if ($this->id_usuario_acompanhante == "")  
      { 
          $this->id_usuario_acompanhante = 0;
          $this->sc_force_zero[] = 'id_usuario_acompanhante';
      } 
      if ($this->id_tecnico_assop == "")  
      { 
          $this->id_tecnico_assop = 0;
          $this->sc_force_zero[] = 'id_tecnico_assop';
      } 
      if ($this->id_usuario_assgb == "")  
      { 
          $this->id_usuario_assgb = 0;
          $this->sc_force_zero[] = 'id_usuario_assgb';
      } 
      if ($this->total_horas == "")  
      { 
          $this->total_horas = 0;
          $this->sc_force_zero[] = 'total_horas';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ",") 
      {
          $this->nm_troca_decimal(".", ",");
      }
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->num_sae_before_qstr = $this->num_sae;
          $this->num_sae = substr($this->Db->qstr($this->num_sae), 1, -1); 
          if ($this->num_sae == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_sae = "null"; 
              $NM_val_null[] = "num_sae";
          } 
          if ($this->data_inicio == "")  
          { 
              $this->data_inicio = "null"; 
              $NM_val_null[] = "data_inicio";
          } 
          if ($this->hora_inicio == "")  
          { 
              $this->hora_inicio = "null"; 
              $NM_val_null[] = "hora_inicio";
          } 
          if ($this->data_fim == "")  
          { 
              $this->data_fim = "null"; 
              $NM_val_null[] = "data_fim";
          } 
          if ($this->hora_fim == "")  
          { 
              $this->hora_fim = "null"; 
              $NM_val_null[] = "hora_fim";
          } 
          $this->observacoes_before_qstr = $this->observacoes;
          $this->observacoes = substr($this->Db->qstr($this->observacoes), 1, -1); 
          if ($this->observacoes == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observacoes = "null"; 
              $NM_val_null[] = "observacoes";
          } 
          $this->img_asscondominio_before_qstr = $this->img_asscondominio;
          $this->img_asscondominio = substr($this->Db->qstr($this->img_asscondominio), 1, -1); 
          if ($this->img_asscondominio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_asscondominio = "null"; 
              $NM_val_null[] = "img_asscondominio";
          } 
          $this->nom_asscondominio_before_qstr = $this->nom_asscondominio;
          $this->nom_asscondominio = substr($this->Db->qstr($this->nom_asscondominio), 1, -1); 
          if ($this->nom_asscondominio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_asscondominio = "null"; 
              $NM_val_null[] = "nom_asscondominio";
          } 
          $this->rg_asscondominio_before_qstr = $this->rg_asscondominio;
          $this->rg_asscondominio = substr($this->Db->qstr($this->rg_asscondominio), 1, -1); 
          if ($this->rg_asscondominio == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rg_asscondominio = "null"; 
              $NM_val_null[] = "rg_asscondominio";
          } 
          $this->img_assop_before_qstr = $this->img_assop;
          $this->img_assop = substr($this->Db->qstr($this->img_assop), 1, -1); 
          if ($this->img_assop == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_assop = "null"; 
              $NM_val_null[] = "img_assop";
          } 
          $this->img_assgb_before_qstr = $this->img_assgb;
          $this->img_assgb = substr($this->Db->qstr($this->img_assgb), 1, -1); 
          if ($this->img_assgb == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_assgb = "null"; 
              $NM_val_null[] = "img_assgb";
          } 
          $this->img_asscontroladoria_before_qstr = $this->img_asscontroladoria;
          $this->img_asscontroladoria = substr($this->Db->qstr($this->img_asscontroladoria), 1, -1); 
          if ($this->img_asscontroladoria == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_asscontroladoria = "null"; 
              $NM_val_null[] = "img_asscontroladoria";
          } 
          $this->nom_asscontroladoria_before_qstr = $this->nom_asscontroladoria;
          $this->nom_asscontroladoria = substr($this->Db->qstr($this->nom_asscontroladoria), 1, -1); 
          if ($this->nom_asscontroladoria == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_asscontroladoria = "null"; 
              $NM_val_null[] = "nom_asscontroladoria";
          } 
          $this->rg_asscontroladoria_before_qstr = $this->rg_asscontroladoria;
          $this->rg_asscontroladoria = substr($this->Db->qstr($this->rg_asscontroladoria), 1, -1); 
          if ($this->rg_asscontroladoria == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rg_asscontroladoria = "null"; 
              $NM_val_null[] = "rg_asscontroladoria";
          } 
          if ($this->num_ativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_ativo = "null"; 
              $NM_val_null[] = "num_ativo";
          } 
          if ($this->num_status == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_status = "null"; 
              $NM_val_null[] = "num_status";
          } 
          if ($this->criado_em == "")  
          { 
              $this->criado_em = "null"; 
              $NM_val_null[] = "criado_em";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ",") 
          {
              $this->nm_poe_aspas_decimal();
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
                 form_OS_mob_pack_ajax_response();
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = #$this->data_inicio#, Hora_Inicio = #$this->hora_inicio#, Data_Fim = #$this->data_fim#, Hora_Fim = #$this->hora_fim#, Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Img_AssCondominio = '$this->img_asscondominio', Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', Img_AssOP = '$this->img_assop', ID_Tecnico_AssOP = $this->id_tecnico_assop, Img_AssGB = '$this->img_assgb', ID_Usuario_AssGB = $this->id_usuario_assgb, Img_AssControladoria = '$this->img_asscontroladoria', Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = #$this->criado_em#, Total_Horas = $this->total_horas";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Img_AssCondominio = '$this->img_asscondominio', Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', Img_AssOP = '$this->img_assop', ID_Tecnico_AssOP = $this->id_tecnico_assop, Img_AssGB = '$this->img_assgb', ID_Usuario_AssGB = $this->id_usuario_assgb, Img_AssControladoria = '$this->img_asscontroladoria', Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Total_Horas = $this->total_horas";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', ID_Tecnico_AssOP = $this->id_tecnico_assop, ID_Usuario_AssGB = $this->id_usuario_assgb, Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Total_Horas = $this->total_horas";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = EXTEND('$this->data_inicio', YEAR TO DAY), Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = EXTEND('$this->data_fim', YEAR TO DAY), Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', ID_Tecnico_AssOP = $this->id_tecnico_assop, ID_Usuario_AssGB = $this->id_usuario_assgb, Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = EXTEND('$this->criado_em', YEAR TO FRACTION), Total_Horas = $this->total_horas";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Img_AssCondominio = '$this->img_asscondominio', Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', Img_AssOP = '$this->img_assop', ID_Tecnico_AssOP = $this->id_tecnico_assop, Img_AssGB = '$this->img_assgb', ID_Usuario_AssGB = $this->id_usuario_assgb, Img_AssControladoria = '$this->img_asscontroladoria', Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Total_Horas = $this->total_horas";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', ID_Tecnico_AssOP = $this->id_tecnico_assop, ID_Usuario_AssGB = $this->id_usuario_assgb, Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Total_Horas = $this->total_horas";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Num_SAE = '$this->num_sae', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", Observacoes = '$this->observacoes', ID_Usuario_Acompanhante = $this->id_usuario_acompanhante, Img_AssCondominio = '$this->img_asscondominio', Nom_AssCondominio = '$this->nom_asscondominio', RG_AssCondominio = '$this->rg_asscondominio', Img_AssOP = '$this->img_assop', ID_Tecnico_AssOP = $this->id_tecnico_assop, Img_AssGB = '$this->img_assgb', ID_Usuario_AssGB = $this->id_usuario_assgb, Img_AssControladoria = '$this->img_asscontroladoria', Nom_AssControladoria = '$this->nom_asscontroladoria', RG_AssControladoria = '$this->rg_asscontroladoria', Num_Ativo = '$this->num_ativo', Num_Status = '$this->num_status', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Total_Horas = $this->total_horas";  
              } 
              $aDoNotUpdate = array();
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
                                  form_OS_mob_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (isset($NM_val_form['img_asscondominio']) && $NM_val_form['img_asscondominio'] != $this->nmgp_dados_select['img_asscondominio']) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssCondominio , $this->img_asscondominio,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssCondominio", $this->img_asscondominio,  "ID = $this->id"); 
                      if ($rs === false) 
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit;  
                      }   
                  }   
                  if (isset($NM_val_form['img_assop']) && $NM_val_form['img_assop'] != $this->nmgp_dados_select['img_assop']) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssOP , $this->img_assop,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssOP", $this->img_assop,  "ID = $this->id"); 
                      if ($rs === false) 
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit;  
                      }   
                  }   
                  if (isset($NM_val_form['img_assgb']) && $NM_val_form['img_assgb'] != $this->nmgp_dados_select['img_assgb']) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssGB , $this->img_assgb,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssGB", $this->img_assgb,  "ID = $this->id"); 
                      if ($rs === false) 
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit;  
                      }   
                  }   
                  if (isset($NM_val_form['img_asscontroladoria']) && $NM_val_form['img_asscontroladoria'] != $this->nmgp_dados_select['img_asscontroladoria']) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssControladoria , $this->img_asscontroladoria,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssControladoria", $this->img_asscontroladoria,  "ID = $this->id"); 
                      if ($rs === false) 
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit;  
                      }   
                  }   
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
                      include_once 'form_OS_mob_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_arquivos));
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
                          $sMUDelete = "DELETE FROM tb_osarquivos WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_OS_mob_pack_ajax_response();
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
                          $sMUSubDir = "/../OS/" . $this->nm_tira_formatacao_id($this->id) . "/";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "arquivos");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
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
                                  form_OS_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../OS/" . $this->nm_tira_formatacao_id($this->id) . "/";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
          $this->num_sae = $this->num_sae_before_qstr;
          $this->observacoes = $this->observacoes_before_qstr;
          $this->img_asscondominio = $this->img_asscondominio_before_qstr;
          $this->nom_asscondominio = $this->nom_asscondominio_before_qstr;
          $this->rg_asscondominio = $this->rg_asscondominio_before_qstr;
          $this->img_assop = $this->img_assop_before_qstr;
          $this->img_assgb = $this->img_assgb_before_qstr;
          $this->img_asscontroladoria = $this->img_asscontroladoria_before_qstr;
          $this->nom_asscontroladoria = $this->nom_asscontroladoria_before_qstr;
          $this->rg_asscontroladoria = $this->rg_asscontroladoria_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_sae'])) { $this->num_sae = $NM_val_form['num_sae']; }
              elseif (isset($this->num_sae)) { $this->nm_limpa_alfa($this->num_sae); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_usuario_acompanhante'])) { $this->id_usuario_acompanhante = $NM_val_form['id_usuario_acompanhante']; }
              elseif (isset($this->id_usuario_acompanhante)) { $this->nm_limpa_alfa($this->id_usuario_acompanhante); }
              if     (isset($NM_val_form) && isset($NM_val_form['img_asscondominio'])) { $this->img_asscondominio = $NM_val_form['img_asscondominio']; }
              elseif (isset($this->img_asscondominio)) { $this->nm_limpa_alfa($this->img_asscondominio); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_asscondominio'])) { $this->nom_asscondominio = $NM_val_form['nom_asscondominio']; }
              elseif (isset($this->nom_asscondominio)) { $this->nm_limpa_alfa($this->nom_asscondominio); }
              if     (isset($NM_val_form) && isset($NM_val_form['rg_asscondominio'])) { $this->rg_asscondominio = $NM_val_form['rg_asscondominio']; }
              elseif (isset($this->rg_asscondominio)) { $this->nm_limpa_alfa($this->rg_asscondominio); }
              if     (isset($NM_val_form) && isset($NM_val_form['img_assop'])) { $this->img_assop = $NM_val_form['img_assop']; }
              elseif (isset($this->img_assop)) { $this->nm_limpa_alfa($this->img_assop); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_tecnico_assop'])) { $this->id_tecnico_assop = $NM_val_form['id_tecnico_assop']; }
              elseif (isset($this->id_tecnico_assop)) { $this->nm_limpa_alfa($this->id_tecnico_assop); }
              if     (isset($NM_val_form) && isset($NM_val_form['img_assgb'])) { $this->img_assgb = $NM_val_form['img_assgb']; }
              elseif (isset($this->img_assgb)) { $this->nm_limpa_alfa($this->img_assgb); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_usuario_assgb'])) { $this->id_usuario_assgb = $NM_val_form['id_usuario_assgb']; }
              elseif (isset($this->id_usuario_assgb)) { $this->nm_limpa_alfa($this->id_usuario_assgb); }
              if     (isset($NM_val_form) && isset($NM_val_form['img_asscontroladoria'])) { $this->img_asscontroladoria = $NM_val_form['img_asscontroladoria']; }
              elseif (isset($this->img_asscontroladoria)) { $this->nm_limpa_alfa($this->img_asscontroladoria); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_asscontroladoria'])) { $this->nom_asscontroladoria = $NM_val_form['nom_asscontroladoria']; }
              elseif (isset($this->nom_asscontroladoria)) { $this->nm_limpa_alfa($this->nom_asscontroladoria); }
              if     (isset($NM_val_form) && isset($NM_val_form['rg_asscontroladoria'])) { $this->rg_asscontroladoria = $NM_val_form['rg_asscontroladoria']; }
              elseif (isset($this->rg_asscontroladoria)) { $this->nm_limpa_alfa($this->rg_asscontroladoria); }
              if     (isset($NM_val_form) && isset($NM_val_form['total_horas'])) { $this->total_horas = $NM_val_form['total_horas']; }
              elseif (isset($this->total_horas)) { $this->nm_limpa_alfa($this->total_horas); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id', 'num_sae', 'criado_em', 'num_ativo', 'num_status', 'empreendimento', 'id_usuario_acompanhante', 'email', 'telefone', 'cliente', 'operadora', 'prestadora', 'arquivos', 'descricao', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'total_horas', 'label_total_horas', 'observacoes', 'canvas_asscondominio', 'img_asscondominio', 'nom_asscondominio', 'rg_asscondominio', 'canvas_assop', 'img_assop', 'tipo_assop', 'id_tecnico_assop', 'rg_assop', 'canvas_assgb', 'img_assgb', 'id_usuario_assgb', 'nom_assgb', 'rg_assgb', 'canvas_asscontroladoria', 'img_asscontroladoria', 'nom_asscontroladoria', 'rg_asscontroladoria', 'savedataonclick', 'removeronclick', 'enviaronclick'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ",") 
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
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_OS_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->arquivos_scfile_name, $dir_file, "arquivos");
              if (trim($this->arquivos_scfile_name) != $_test_file)
              {
                  $this->arquivos_scfile_name = $_test_file;
                  $this->arquivos = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES ('$this->num_sae', #$this->data_inicio#, #$this->hora_inicio#, #$this->data_fim#, #$this->hora_fim#, '$this->observacoes', $this->id_usuario_acompanhante, '$this->img_asscondominio', '$this->nom_asscondominio', '$this->rg_asscondominio', '$this->img_assop', $this->id_tecnico_assop, '$this->img_assgb', $this->id_usuario_assgb, '$this->img_asscontroladoria', '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', #$this->criado_em#, $this->total_horas)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES ('$this->num_sae', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->observacoes', $this->id_usuario_acompanhante, '$this->img_asscondominio', '$this->nom_asscondominio', '$this->rg_asscondominio', '$this->img_assop', $this->id_tecnico_assop, '$this->img_assgb', $this->id_usuario_assgb, '$this->img_asscontroladoria', '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", $this->total_horas)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES (" . $NM_seq_auto . "'$this->num_sae', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->observacoes', $this->id_usuario_acompanhante, EMPTY_BLOB(), '$this->nom_asscondominio', '$this->rg_asscondominio', EMPTY_BLOB(), $this->id_tecnico_assop, EMPTY_BLOB(), $this->id_usuario_assgb, EMPTY_BLOB(), '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", $this->total_horas)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES (" . $NM_seq_auto . "'$this->num_sae', EXTEND('$this->data_inicio', YEAR TO DAY), " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", EXTEND('$this->data_fim', YEAR TO DAY), " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->observacoes', $this->id_usuario_acompanhante, null, '$this->nom_asscondominio', '$this->rg_asscondominio', null, $this->id_tecnico_assop, null, $this->id_usuario_assgb, null, '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', EXTEND('$this->criado_em', YEAR TO FRACTION), $this->total_horas)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES (" . $NM_seq_auto . "'$this->num_sae', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->observacoes', $this->id_usuario_acompanhante, '', '$this->nom_asscondominio', '$this->rg_asscondominio', '', $this->id_tecnico_assop, '', $this->id_usuario_assgb, '', '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", $this->total_horas)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES (" . $NM_seq_auto . "'$this->num_sae', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->observacoes', $this->id_usuario_acompanhante, '', '$this->nom_asscondominio', '$this->rg_asscondominio', '', $this->id_tecnico_assop, '', $this->id_usuario_assgb, '', '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", $this->total_horas)"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas) VALUES (" . $NM_seq_auto . "'$this->num_sae', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->observacoes', $this->id_usuario_acompanhante, '$this->img_asscondominio', '$this->nom_asscondominio', '$this->rg_asscondominio', '$this->img_assop', $this->id_tecnico_assop, '$this->img_assgb', $this->id_usuario_assgb, '$this->img_asscontroladoria', '$this->nom_asscontroladoria', '$this->rg_asscontroladoria', '$this->num_ativo', '$this->num_status', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", $this->total_horas)"; 
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
                              form_OS_mob_pack_ajax_response();
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
                          form_OS_mob_pack_ajax_response();
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
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->img_asscondominio ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssCondominio , $this->img_asscondominio,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssCondominio", $this->img_asscondominio,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->img_assop ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssOP , $this->img_assop,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssOP", $this->img_assop,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->img_assgb ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssGB , $this->img_assgb,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssGB", $this->img_assgb,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
                  if (trim($this->img_asscontroladoria ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  Img_AssControladoria , $this->img_asscontroladoria,  \"ID = $this->id\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "Img_AssControladoria", $this->img_asscontroladoria,  "ID = $this->id"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_OS_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
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
                      include_once 'form_OS_mob_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_arquivos));
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
                          $sMUDelete = "DELETE FROM tb_osarquivos WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_OS_mob_pack_ajax_response();
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
                          $sMUSubDir = "/../OS/" . $this->nm_tira_formatacao_id($this->id) . "/";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "arquivos");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_osarquivos (" . $NM_cmp_auto . ", Arquivo, ID_OS) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_osarquivos (Arquivo, ID_OS) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id . ")"; 
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
                                  form_OS_mob_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../OS/" . $this->nm_tira_formatacao_id($this->id) . "/";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ",") 
      {
          $this->nm_tira_aspas_decimal();
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
              $sMUDelete = "DELETE FROM tb_osarquivos WHERE ID_OS = " . $this->id . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_OS_mob_pack_ajax_response();
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
                          form_OS_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']);
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
        if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ",")
        {
            $this->nm_troca_decimal(",", ".");
        }
        $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library("sys", "models", "Logs.php");
$_Logs = new Logs($this);
sc_include_library("sys", "models", "Osarquivos.php");
$_Osarquivos = new Osarquivos($this);

$logConteudo = $_Logs->getConteudo();
$logConteudo["Arquivos"] = $_Osarquivos->getByIdOs(intval($this->id ));

$_Logs->insert([
	"Modulo" => "OS",
	"Funcao" => "CRIAR",
	"Descricao" => 'Cadastro de Ordem de Serviço',
	"Conteudo" => $logConteudo
]);

$s->setIUDState("grid_OS", "I", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_OS') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library("sys", "models", "Logs.php");
$_Logs = new Logs($this);
sc_include_library("sys", "models", "Osarquivos.php");
$_Osarquivos = new Osarquivos($this);

$logConteudo = $_Logs->getConteudo();
$logConteudo["Arquivos"] = $_Osarquivos->getByIdOs(intval($this->id ));

$_Logs->insert([
	"Modulo" => "OS",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de Ordem de Serviço',
	"Conteudo" => $logConteudo
]);


$s->setIUDState($this, "U", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_OS') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off'; 
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
   if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ",")
   {
       $this->nm_troca_decimal(".", ",");
   }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID, Num_SAE, str_replace (convert(char(10),Data_Inicio,102), '.', '-') + ' ' + convert(char(8),Data_Inicio,20), str_replace (convert(char(10),Hora_Inicio,102), '.', '-') + ' ' + convert(char(8),Hora_Inicio,20), str_replace (convert(char(10),Data_Fim,102), '.', '-') + ' ' + convert(char(8),Data_Fim,20), str_replace (convert(char(10),Hora_Fim,102), '.', '-') + ' ' + convert(char(8),Hora_Fim,20), Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, str_replace (convert(char(10),Criado_em,102), '.', '-') + ' ' + convert(char(8),Criado_em,20), Total_Horas from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID, Num_SAE, convert(char(23),Data_Inicio,121), convert(char(23),Hora_Inicio,121), convert(char(23),Data_Fim,121), convert(char(23),Hora_Fim,121), Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, convert(char(23),Criado_em,121), Total_Horas from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID, Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID, Num_SAE, EXTEND(Data_Inicio, YEAR TO DAY), Hora_Inicio, EXTEND(Data_Fim, YEAR TO DAY), Hora_Fim, Observacoes, ID_Usuario_Acompanhante, LOTOFILE(Img_AssCondominio, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_Img_AssCondominio', 'client'), Nom_AssCondominio, RG_AssCondominio, LOTOFILE(Img_AssOP, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_Img_AssOP', 'client'), ID_Tecnico_AssOP, LOTOFILE(Img_AssGB, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_Img_AssGB', 'client'), ID_Usuario_AssGB, LOTOFILE(Img_AssControladoria, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_Img_AssControladoria', 'client'), Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, EXTEND(Criado_em, YEAR TO FRACTION), Total_Horas from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID, Num_SAE, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Observacoes, ID_Usuario_Acompanhante, Img_AssCondominio, Nom_AssCondominio, RG_AssCondominio, Img_AssOP, ID_Tecnico_AssOP, Img_AssGB, ID_Usuario_AssGB, Img_AssControladoria, Nom_AssControladoria, RG_AssControladoria, Num_Ativo, Num_Status, Criado_em, Total_Horas from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "ID = '" . $_SESSION['form_OS_ID'] . "'";
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
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter']))
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
                  $this->NM_ajax_info['buttonDisplay']['inserir'] = $this->nmgp_botoes['inserir'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes['exportPDF'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes['confirmeRemover'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['confirmeEnviar'] = $this->nmgp_botoes['confirmeEnviar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['atualizar'] = $this->nmgp_botoes['atualizar'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['inserir'] = $this->nmgp_botoes['inserir'] = "on";
              $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes['exportPDF'] = "off";
              $this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes['confirmeRemover'] = "off";
              $this->NM_ajax_info['buttonDisplay']['confirmeEnviar'] = $this->nmgp_botoes['confirmeEnviar'] = "off";
              $this->NM_ajax_info['buttonDisplay']['atualizar'] = $this->nmgp_botoes['atualizar'] = "off";
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
              $this->num_sae = $rs->fields[1] ; 
              $this->nmgp_dados_select['num_sae'] = $this->num_sae;
              $this->data_inicio = $rs->fields[2] ; 
              $this->nmgp_dados_select['data_inicio'] = $this->data_inicio;
              $this->hora_inicio = $rs->fields[3] ; 
              $this->nmgp_dados_select['hora_inicio'] = $this->hora_inicio;
              $this->data_fim = $rs->fields[4] ; 
              $this->nmgp_dados_select['data_fim'] = $this->data_fim;
              $this->hora_fim = $rs->fields[5] ; 
              $this->nmgp_dados_select['hora_fim'] = $this->hora_fim;
              $this->observacoes = $rs->fields[6] ; 
              $this->nmgp_dados_select['observacoes'] = $this->observacoes;
              $this->id_usuario_acompanhante = $rs->fields[7] ; 
              $this->nmgp_dados_select['id_usuario_acompanhante'] = $this->id_usuario_acompanhante;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->img_asscondominio = $this->Db->BlobDecode($rs->fields[8]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[8]) && !empty($rs->fields[8]) && is_file($rs->fields[8])) 
                  { 
                     $this->img_asscondominio = file_get_contents($rs->fields[8]);
                  }else 
                  { 
                     $this->img_asscondominio = ''; 
                  } 
              } 
              else
              { 
                  $this->img_asscondominio = $rs->fields[8] ; 
              } 
              $this->nmgp_dados_select['img_asscondominio'] = $this->img_asscondominio;
              $this->nom_asscondominio = $rs->fields[9] ; 
              $this->nmgp_dados_select['nom_asscondominio'] = $this->nom_asscondominio;
              $this->rg_asscondominio = $rs->fields[10] ; 
              $this->nmgp_dados_select['rg_asscondominio'] = $this->rg_asscondominio;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->img_assop = $this->Db->BlobDecode($rs->fields[11]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[11]) && !empty($rs->fields[11]) && is_file($rs->fields[11])) 
                  { 
                     $this->img_assop = file_get_contents($rs->fields[11]);
                  }else 
                  { 
                     $this->img_assop = ''; 
                  } 
              } 
              else
              { 
                  $this->img_assop = $rs->fields[11] ; 
              } 
              $this->nmgp_dados_select['img_assop'] = $this->img_assop;
              $this->id_tecnico_assop = $rs->fields[12] ; 
              $this->nmgp_dados_select['id_tecnico_assop'] = $this->id_tecnico_assop;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->img_assgb = $this->Db->BlobDecode($rs->fields[13]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[13]) && !empty($rs->fields[13]) && is_file($rs->fields[13])) 
                  { 
                     $this->img_assgb = file_get_contents($rs->fields[13]);
                  }else 
                  { 
                     $this->img_assgb = ''; 
                  } 
              } 
              else
              { 
                  $this->img_assgb = $rs->fields[13] ; 
              } 
              $this->nmgp_dados_select['img_assgb'] = $this->img_assgb;
              $this->id_usuario_assgb = $rs->fields[14] ; 
              $this->nmgp_dados_select['id_usuario_assgb'] = $this->id_usuario_assgb;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->img_asscontroladoria = $this->Db->BlobDecode($rs->fields[15]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[15]) && !empty($rs->fields[15]) && is_file($rs->fields[15])) 
                  { 
                     $this->img_asscontroladoria = file_get_contents($rs->fields[15]);
                  }else 
                  { 
                     $this->img_asscontroladoria = ''; 
                  } 
              } 
              else
              { 
                  $this->img_asscontroladoria = $rs->fields[15] ; 
              } 
              $this->nmgp_dados_select['img_asscontroladoria'] = $this->img_asscontroladoria;
              $this->nom_asscontroladoria = $rs->fields[16] ; 
              $this->nmgp_dados_select['nom_asscontroladoria'] = $this->nom_asscontroladoria;
              $this->rg_asscontroladoria = $rs->fields[17] ; 
              $this->nmgp_dados_select['rg_asscontroladoria'] = $this->rg_asscontroladoria;
              $this->num_ativo = $rs->fields[18] ; 
              $this->nmgp_dados_select['num_ativo'] = $this->num_ativo;
              $this->num_status = $rs->fields[19] ; 
              $this->nmgp_dados_select['num_status'] = $this->num_status;
              $this->criado_em = $rs->fields[20] ; 
              if (substr($this->criado_em, 10, 1) == "-") 
              { 
                 $this->criado_em = substr($this->criado_em, 0, 10) . " " . substr($this->criado_em, 11);
              } 
              if (substr($this->criado_em, 13, 1) == ".") 
              { 
                 $this->criado_em = substr($this->criado_em, 0, 13) . ":" . substr($this->criado_em, 14, 2) . ":" . substr($this->criado_em, 17);
              } 
              $this->nmgp_dados_select['criado_em'] = $this->criado_em;
              $this->total_horas = trim($rs->fields[21]) ; 
              $this->nmgp_dados_select['total_horas'] = $this->total_horas;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->nm_troca_decimal(",", ".");
              $this->id = (string)$this->id; 
              $this->id_usuario_acompanhante = (string)$this->id_usuario_acompanhante; 
              $this->id_tecnico_assop = (string)$this->id_tecnico_assop; 
              $this->id_usuario_assgb = (string)$this->id_usuario_assgb; 
              $this->total_horas = (strpos(strtolower($this->total_horas), "e")) ? (float)$this->total_horas : $this->total_horas; 
              $this->total_horas = (string)$this->total_horas; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['parms'] = "id?#?$this->id?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sub_dir'][0]  = "/../OS/" . $this->nm_tira_formatacao_id($this->id) . "/";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['reg_start'] < $qt_geral_reg_form_OS_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao']   = '';
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
              $this->num_sae = "";  
              $this->data_inicio = "";  
              $this->data_inicio_hora = "" ;  
              $this->hora_inicio = "";  
              $this->hora_inicio_hora = "" ;  
              $this->data_fim = "";  
              $this->data_fim_hora = "" ;  
              $this->hora_fim = "";  
              $this->hora_fim_hora = "" ;  
              $this->observacoes = "";  
              $this->id_usuario_acompanhante = "";  
              $this->img_asscondominio = "";  
              $this->nom_asscondominio = "";  
              $this->rg_asscondominio = "";  
              $this->img_assop = "";  
              $this->id_tecnico_assop = "";  
              $this->img_assgb = "";  
              $this->id_usuario_assgb = "";  
              $this->img_asscontroladoria = "";  
              $this->nom_asscontroladoria = "";  
              $this->rg_asscontroladoria = "";  
              $this->num_ativo = "";  
              $this->num_status = "";  
              $this->criado_em = "";  
              $this->criado_em_hora = "" ;  
              $this->total_horas = "";  
              $this->cliente = "";  
              $this->email = "";  
              $this->empreendimento = "";  
              $this->operadora = "";  
              $this->prestadora = "";  
              $this->rg_assop = "";  
              $this->telefone = "";  
              $this->tipo_assop = "";  
              $this->label_total_horas = "";  
              $this->savedataonclick = "";  
              $this->arquivos = "";  
              $this->removeronclick = "";  
              $this->enviaronclick = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['foreign_key'] as $sFKName => $sFKValue)
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
 function gera_icone($doc) 
 {
    $cam_icone = "";
    $path =  $this->Ini->root . $this->Ini->path_icones . "/";
    if (is_dir($path))
    {
        $nm_icones = nm_list_icon($path); 
        $nm_tipo = strtolower(substr($doc, strrpos($doc, ".") + 1));
        $nm_tipo = str_replace(array('docx', 'xlsx'), array('doc', 'xls'), $nm_tipo);
        if (isset($nm_icones[$nm_tipo]) && !empty($nm_icones[$nm_tipo]))
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones[$nm_tipo];
        }
        else
        {
            $cam_icone = $this->Ini->path_icones . "/" . $nm_icones["default"];
        }
    }
    return $cam_icone;
 } 
//
function ID_Tecnico_AssOP_onChange($rg_assop, $rg_assgb, $id_tecnico_assop)
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
$original_id_tecnico_assop = $this->id_tecnico_assop;
$original_rg_assop = $this->rg_assop;
$original_rg_assop = $this->rg_assop;
$original_rg_assgb = $this->rg_assgb;
$original_id_tecnico_assop = $this->id_tecnico_assop;

sc_include_library("sys", "models", "Tecnicos.php");
sc_include_library("sys", "functions", "functions.php");
$_Tecnicos = new Tecnicos($this);

$tecnico = $_Tecnicos->getById(intval($this->id_tecnico_assop ));
if ($tecnico) {
	$this->rg_assop  = ($tecnico[0]["Num_RG"] ? mask($tecnico[0]["Num_RG"], ["#.###.###-#", "##.###.###-#", "###.###.###-#"]) : "");
} else {
	$this->rg_assop  = "";
}

$modificado_id_tecnico_assop = $this->id_tecnico_assop;
$modificado_rg_assop = $this->rg_assop;
$modificado_rg_assop = $this->rg_assop;
$modificado_rg_assgb = $this->rg_assgb;
$modificado_id_tecnico_assop = $this->id_tecnico_assop;
$this->nm_formatar_campos('id_tecnico_assop', 'rg_assop');
if ($original_id_tecnico_assop !== $modificado_id_tecnico_assop || isset($this->nmgp_cmp_readonly['id_tecnico_assop']) || (isset($bFlagRead_id_tecnico_assop) && $bFlagRead_id_tecnico_assop))
{
    $this->ajax_return_values_id_tecnico_assop(true);
}
if ($original_rg_assop !== $modificado_rg_assop || isset($this->nmgp_cmp_readonly['rg_assop']) || (isset($bFlagRead_rg_assop) && $bFlagRead_rg_assop))
{
    $this->ajax_return_values_rg_assop(true);
}
if ($original_rg_assop !== $modificado_rg_assop || isset($this->nmgp_cmp_readonly['rg_assop']) || (isset($bFlagRead_rg_assop) && $bFlagRead_rg_assop))
{
    $this->ajax_return_values_rg_assop(true);
}
if ($original_rg_assgb !== $modificado_rg_assgb || isset($this->nmgp_cmp_readonly['rg_assgb']) || (isset($bFlagRead_rg_assgb) && $bFlagRead_rg_assgb))
{
    $this->ajax_return_values_rg_assgb(true);
}
if ($original_id_tecnico_assop !== $modificado_id_tecnico_assop || isset($this->nmgp_cmp_readonly['id_tecnico_assop']) || (isset($bFlagRead_id_tecnico_assop) && $bFlagRead_id_tecnico_assop))
{
    $this->ajax_return_values_id_tecnico_assop(true);
}
form_OS_mob_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function canvasJS()
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
?>
<script>
	
function DBP(x1,y1,x2,y2) {
    return Math.sqrt((x2-x1)*(x2-x1)+(y2-y1)*(y2-y1));
}
function getAngle(x,y) { return Math.atan(y/(x==0?0.01:x))+(x<0?Math.PI:0); }
function drawLineNoAliasing(ctx, sx, sy, tx, ty) {
    var dist = DBP(sx,sy,tx,ty); 
	ctx.distance += dist;
	if (ctx.distance >= 200) {
		$('#assErrorInvalid').hide();
	}
    var ang = getAngle(tx-sx,ty-sy); 
    for(var i=0;i<dist;i++) {
        ctx.fillRect(Math.round(sx + Math.cos(ang)*i), 
                     Math.round(sy + Math.sin(ang)*i), 
                     3,3); 
    }
}

function setCanvas (element) {
	c[ element].canvas = document.getElementById(element);
	
	if (!c[ element].canvas) return;
	c[ element].ctx = c[ element].canvas.getContext("2d");
	c[ element].ctx.distance = 0;

	c[ element].ctx.strokeStyle = "#000000";
	c[ element].ctx.lineWith = 2;
	
	c[ element].ctx.moveTo(0, 80);
	c[ element].ctx.lineTo(650, 80);
	c[ element].ctx.stroke();
	
	c[ element].canvas.addEventListener("mousedown", function (e) {
		$('body').css('overflow', 'auto'); <!-- overflow hidden -->
		c[ element].drawing = true;
		c[ element].lastPos = getMousePos(c[ element].canvas, e);
	}, false);
	c[ element].canvas.addEventListener("mouseup", function (e) {
		$('body').css('overflow', 'auto');
		c[ element].drawing = false;
	}, false);
	c[ element].canvas.addEventListener("mousemove", function (e) {
		c[ element].mousePos = getMousePos(c[ element].canvas, e);
	}, false);

	c[ element].canvas.addEventListener("touchstart", function (e) {
		c[ element].mousePos = getTouchPos(c[ element].canvas, e);
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousedown", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		c[ element].canvas.dispatchEvent(mouseEvent);
	}, false);
	c[ element].canvas.addEventListener("touchend", function (e) {
		var mouseEvent = new MouseEvent("mouseup", {});
		c[ element].canvas.dispatchEvent(mouseEvent);
	}, false);
	c[ element].canvas.addEventListener("touchmove", function (e) {
		var touch = e.touches[0];
		var mouseEvent = new MouseEvent("mousemove", {
			clientX: touch.clientX,
			clientY: touch.clientY
		});
		c[ element].canvas.dispatchEvent(mouseEvent);
	}, false);

	document.body.addEventListener("touchstart", function (e) {
		if (e.target == c[ element].canvas) {
			e.preventDefault();
		}
	}, false);
	document.body.addEventListener("touchend", function (e) {
		if (e.target == c[ element].canvas) {
			e.preventDefault();
		}
	}, false);
	document.body.addEventListener("touchmove", function (e) {
		if (e.target == c[ element].canvas) {
			e.preventDefault();
		}
	}, false);
	
	(function drawLoop () {
		requestAnimFrame(drawLoop);
		renderCanvas();
	})();
}

function setCanvasUI () {
	var clearCanvas = $(".clear-canvas");
	clearCanvas.click(function (e) {
		target = $(e.target).data('target');
		if (target) {
			c[ target].canvas.width = c[ target].canvas.width;
			c[ target].ctx.moveTo(0, 80);
			c[ target].ctx.lineTo(650, 80);
			c[ target].ctx.stroke();
			c[ target].ctx.distance = 0;
			$('#assErrorInvalid').hide();
		}
	});
	
	var okCanvas = $('.ok-canvas');
	okCanvas.click(function (e) {
		target = $(e.target).data('target');
		if (target) {
			if (200 > c[""+target].ctx.distance) {
				$('#assErrorInvalid').css("display", "inline-block");
				return;							
			}
			
			$('[name='+c[""+target].input+']').val(c[""+target].canvas.toDataURL());
			$('#'+c[""+target].input).prop("src", c[""+target].canvas.toDataURL());
		}
		sModal("close");
		toggleFullScreen(true);
	});
}
	
function getMousePos(canvasDom, mouseEvent) {
	var rect = canvasDom.getBoundingClientRect();
	return {
		x: mouseEvent.clientX - rect.left,
		y: mouseEvent.clientY - rect.top
	};
}
function getTouchPos(canvasDom, touchEvent) {
	var rect = canvasDom.getBoundingClientRect();
	return {
		x: touchEvent.touches[0].clientX - rect.left,
		y: touchEvent.touches[0].clientY - rect.top
	};
}
	
function renderCanvas() {
	$.each(c,function(i, c){
		if (c.drawing) {
			
			drawLineNoAliasing(c.ctx, c.lastPos.x, c.lastPos.y, c.mousePos.x, c.mousePos.y);
			c.lastPos = c.mousePos;
		}
	});
}

(function() {
	window.requestAnimFrame = (function (callback) {
		return window.requestAnimationFrame || 
					window.webkitRequestAnimationFrame ||
					window.mozRequestAnimationFrame ||
					window.oRequestAnimationFrame ||
					window.msRequestAnimaitonFrame ||
					function (callback) {
					 	window.setTimeout(callback, 1000/60);
					};
	})();
})();
</script>
<?php


$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function disableAll()
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
$this->sc_field_readonly("data_inicio", 'on');
$this->sc_field_readonly("hora_inicio", 'on');
$this->sc_field_readonly("data_fim", 'on');
$this->sc_field_readonly("hora_fim", 'on');
$this->sc_field_readonly("observacoes", 'on');
$this->sc_field_readonly("nom_asscondominio", 'on');
$this->sc_field_readonly("rg_asscondominio", 'on');
$this->sc_field_readonly("nom_asscontroladoria", 'on');
$this->sc_field_readonly("rg_asscontroladoria", 'on');
$this->sc_field_readonly("tipo_assop", 'on');
$this->sc_field_readonly("id_tecnico_assop", 'on');
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function enviarOnClick_onClick($img_asscondominio, $id_usuario_acompanhante, $observacoes, $hora_fim, $data_fim, $enviaronclick, $removeronclick, $arquivos, $savedataonclick, $canvas_asscontroladoria, $canvas_assgb, $canvas_assop, $canvas_asscondominio, $hora_inicio, $label_total_horas, $tipo_assop, $telefone, $rg_assop, $rg_assgb, $prestadora, $operadora, $nom_assgb, $empreendimento, $data_inicio, $email, $descricao, $cliente, $total_horas, $criado_em, $num_status, $num_sae, $num_ativo, $rg_asscontroladoria, $nom_asscontroladoria, $img_asscontroladoria, $id_usuario_assgb, $img_assgb, $id_tecnico_assop, $img_assop, $rg_asscondominio, $nom_asscondominio, $id)
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
$original_id = $this->id;
$original_num_status = $this->num_status;
$original_num_sae = $this->num_sae;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_img_asscondominio = $this->img_asscondominio;
$original_id_usuario_acompanhante = $this->id_usuario_acompanhante;
$original_observacoes = $this->observacoes;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_enviaronclick = $this->enviaronclick;
$original_removeronclick = $this->removeronclick;
$original_arquivos = $this->arquivos;
$original_savedataonclick = $this->savedataonclick;
$original_canvas_asscontroladoria = $this->canvas_asscontroladoria;
$original_canvas_assgb = $this->canvas_assgb;
$original_canvas_assop = $this->canvas_assop;
$original_canvas_asscondominio = $this->canvas_asscondominio;
$original_hora_inicio = $this->hora_inicio;
$original_label_total_horas = $this->label_total_horas;
$original_tipo_assop = $this->tipo_assop;
$original_telefone = $this->telefone;
$original_rg_assop = $this->rg_assop;
$original_rg_assgb = $this->rg_assgb;
$original_prestadora = $this->prestadora;
$original_operadora = $this->operadora;
$original_nom_assgb = $this->nom_assgb;
$original_empreendimento = $this->empreendimento;
$original_data_inicio = $this->data_inicio;
$original_email = $this->email;
$original_descricao = $this->descricao;
$original_cliente = $this->cliente;
$original_total_horas = $this->total_horas;
$original_criado_em = $this->criado_em;
$original_num_status = $this->num_status;
$original_num_sae = $this->num_sae;
$original_num_ativo = $this->num_ativo;
$original_rg_asscontroladoria = $this->rg_asscontroladoria;
$original_nom_asscontroladoria = $this->nom_asscontroladoria;
$original_img_asscontroladoria = $this->img_asscontroladoria;
$original_id_usuario_assgb = $this->id_usuario_assgb;
$original_img_assgb = $this->img_assgb;
$original_id_tecnico_assop = $this->id_tecnico_assop;
$original_img_assop = $this->img_assop;
$original_rg_asscondominio = $this->rg_asscondominio;
$original_nom_asscondominio = $this->nom_asscondominio;
$original_id = $this->id;

sc_include_library("sys", "models", "Logs.php");
$_Logs = new Logs($this);
sc_include_library("sys", "models", "Os.php");
$_Os = new Os($this);
sc_include_library("sys", "models", "Osarquivos.php");
$_Osarquivos = new Osarquivos($this);
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

$logConteudo = $_Logs->getConteudo();
$logConteudo["Arquivos"] = $_Osarquivos->getByIdOs(intval($this->id ));

$this->num_status  = "E";
$_Os->setStatus(intval($this->id ), "E");

$_Logs->insert([
	"Modulo" => "OS",
	"Funcao" => "EDITAR",
	"Descricao" => 'Envio de Ordem de Serviço',
	"Conteudo" => $logConteudo
]);

$s->setIUDState($this, "U", "success");
$this->updateRealizado();

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_OS') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };


$modificado_id = $this->id;
$modificado_num_status = $this->num_status;
$modificado_num_sae = $this->num_sae;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_img_asscondominio = $this->img_asscondominio;
$modificado_id_usuario_acompanhante = $this->id_usuario_acompanhante;
$modificado_observacoes = $this->observacoes;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_enviaronclick = $this->enviaronclick;
$modificado_removeronclick = $this->removeronclick;
$modificado_arquivos = $this->arquivos;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_canvas_asscontroladoria = $this->canvas_asscontroladoria;
$modificado_canvas_assgb = $this->canvas_assgb;
$modificado_canvas_assop = $this->canvas_assop;
$modificado_canvas_asscondominio = $this->canvas_asscondominio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_label_total_horas = $this->label_total_horas;
$modificado_tipo_assop = $this->tipo_assop;
$modificado_telefone = $this->telefone;
$modificado_rg_assop = $this->rg_assop;
$modificado_rg_assgb = $this->rg_assgb;
$modificado_prestadora = $this->prestadora;
$modificado_operadora = $this->operadora;
$modificado_nom_assgb = $this->nom_assgb;
$modificado_empreendimento = $this->empreendimento;
$modificado_data_inicio = $this->data_inicio;
$modificado_email = $this->email;
$modificado_descricao = $this->descricao;
$modificado_cliente = $this->cliente;
$modificado_total_horas = $this->total_horas;
$modificado_criado_em = $this->criado_em;
$modificado_num_status = $this->num_status;
$modificado_num_sae = $this->num_sae;
$modificado_num_ativo = $this->num_ativo;
$modificado_rg_asscontroladoria = $this->rg_asscontroladoria;
$modificado_nom_asscontroladoria = $this->nom_asscontroladoria;
$modificado_img_asscontroladoria = $this->img_asscontroladoria;
$modificado_id_usuario_assgb = $this->id_usuario_assgb;
$modificado_img_assgb = $this->img_assgb;
$modificado_id_tecnico_assop = $this->id_tecnico_assop;
$modificado_img_assop = $this->img_assop;
$modificado_rg_asscondominio = $this->rg_asscondominio;
$modificado_nom_asscondominio = $this->nom_asscondominio;
$modificado_id = $this->id;
$this->nm_formatar_campos('id', 'num_status', 'num_sae', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim');
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_img_asscondominio !== $modificado_img_asscondominio || isset($this->nmgp_cmp_readonly['img_asscondominio']) || (isset($bFlagRead_img_asscondominio) && $bFlagRead_img_asscondominio))
{
    $this->ajax_return_values_img_asscondominio(true);
}
if ($original_id_usuario_acompanhante !== $modificado_id_usuario_acompanhante || isset($this->nmgp_cmp_readonly['id_usuario_acompanhante']) || (isset($bFlagRead_id_usuario_acompanhante) && $bFlagRead_id_usuario_acompanhante))
{
    $this->ajax_return_values_id_usuario_acompanhante(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_enviaronclick !== $modificado_enviaronclick || isset($this->nmgp_cmp_readonly['enviaronclick']) || (isset($bFlagRead_enviaronclick) && $bFlagRead_enviaronclick))
{
    $this->ajax_return_values_enviaronclick(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_arquivos !== $modificado_arquivos || isset($this->nmgp_cmp_readonly['arquivos']) || (isset($bFlagRead_arquivos) && $bFlagRead_arquivos))
{
    $this->ajax_return_values_arquivos(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_canvas_asscontroladoria !== $modificado_canvas_asscontroladoria || isset($this->nmgp_cmp_readonly['canvas_asscontroladoria']) || (isset($bFlagRead_canvas_asscontroladoria) && $bFlagRead_canvas_asscontroladoria))
{
    $this->ajax_return_values_canvas_asscontroladoria(true);
}
if ($original_canvas_assgb !== $modificado_canvas_assgb || isset($this->nmgp_cmp_readonly['canvas_assgb']) || (isset($bFlagRead_canvas_assgb) && $bFlagRead_canvas_assgb))
{
    $this->ajax_return_values_canvas_assgb(true);
}
if ($original_canvas_assop !== $modificado_canvas_assop || isset($this->nmgp_cmp_readonly['canvas_assop']) || (isset($bFlagRead_canvas_assop) && $bFlagRead_canvas_assop))
{
    $this->ajax_return_values_canvas_assop(true);
}
if ($original_canvas_asscondominio !== $modificado_canvas_asscondominio || isset($this->nmgp_cmp_readonly['canvas_asscondominio']) || (isset($bFlagRead_canvas_asscondominio) && $bFlagRead_canvas_asscondominio))
{
    $this->ajax_return_values_canvas_asscondominio(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_label_total_horas !== $modificado_label_total_horas || isset($this->nmgp_cmp_readonly['label_total_horas']) || (isset($bFlagRead_label_total_horas) && $bFlagRead_label_total_horas))
{
    $this->ajax_return_values_label_total_horas(true);
}
if ($original_tipo_assop !== $modificado_tipo_assop || isset($this->nmgp_cmp_readonly['tipo_assop']) || (isset($bFlagRead_tipo_assop) && $bFlagRead_tipo_assop))
{
    $this->ajax_return_values_tipo_assop(true);
}
if ($original_telefone !== $modificado_telefone || isset($this->nmgp_cmp_readonly['telefone']) || (isset($bFlagRead_telefone) && $bFlagRead_telefone))
{
    $this->ajax_return_values_telefone(true);
}
if ($original_rg_assop !== $modificado_rg_assop || isset($this->nmgp_cmp_readonly['rg_assop']) || (isset($bFlagRead_rg_assop) && $bFlagRead_rg_assop))
{
    $this->ajax_return_values_rg_assop(true);
}
if ($original_rg_assgb !== $modificado_rg_assgb || isset($this->nmgp_cmp_readonly['rg_assgb']) || (isset($bFlagRead_rg_assgb) && $bFlagRead_rg_assgb))
{
    $this->ajax_return_values_rg_assgb(true);
}
if ($original_prestadora !== $modificado_prestadora || isset($this->nmgp_cmp_readonly['prestadora']) || (isset($bFlagRead_prestadora) && $bFlagRead_prestadora))
{
    $this->ajax_return_values_prestadora(true);
}
if ($original_operadora !== $modificado_operadora || isset($this->nmgp_cmp_readonly['operadora']) || (isset($bFlagRead_operadora) && $bFlagRead_operadora))
{
    $this->ajax_return_values_operadora(true);
}
if ($original_nom_assgb !== $modificado_nom_assgb || isset($this->nmgp_cmp_readonly['nom_assgb']) || (isset($bFlagRead_nom_assgb) && $bFlagRead_nom_assgb))
{
    $this->ajax_return_values_nom_assgb(true);
}
if ($original_empreendimento !== $modificado_empreendimento || isset($this->nmgp_cmp_readonly['empreendimento']) || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento))
{
    $this->ajax_return_values_empreendimento(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_email !== $modificado_email || isset($this->nmgp_cmp_readonly['email']) || (isset($bFlagRead_email) && $bFlagRead_email))
{
    $this->ajax_return_values_email(true);
}
if ($original_descricao !== $modificado_descricao || isset($this->nmgp_cmp_readonly['descricao']) || (isset($bFlagRead_descricao) && $bFlagRead_descricao))
{
    $this->ajax_return_values_descricao(true);
}
if ($original_cliente !== $modificado_cliente || isset($this->nmgp_cmp_readonly['cliente']) || (isset($bFlagRead_cliente) && $bFlagRead_cliente))
{
    $this->ajax_return_values_cliente(true);
}
if ($original_total_horas !== $modificado_total_horas || isset($this->nmgp_cmp_readonly['total_horas']) || (isset($bFlagRead_total_horas) && $bFlagRead_total_horas))
{
    $this->ajax_return_values_total_horas(true);
}
if ($original_criado_em !== $modificado_criado_em || isset($this->nmgp_cmp_readonly['criado_em']) || (isset($bFlagRead_criado_em) && $bFlagRead_criado_em))
{
    $this->ajax_return_values_criado_em(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_rg_asscontroladoria !== $modificado_rg_asscontroladoria || isset($this->nmgp_cmp_readonly['rg_asscontroladoria']) || (isset($bFlagRead_rg_asscontroladoria) && $bFlagRead_rg_asscontroladoria))
{
    $this->ajax_return_values_rg_asscontroladoria(true);
}
if ($original_nom_asscontroladoria !== $modificado_nom_asscontroladoria || isset($this->nmgp_cmp_readonly['nom_asscontroladoria']) || (isset($bFlagRead_nom_asscontroladoria) && $bFlagRead_nom_asscontroladoria))
{
    $this->ajax_return_values_nom_asscontroladoria(true);
}
if ($original_img_asscontroladoria !== $modificado_img_asscontroladoria || isset($this->nmgp_cmp_readonly['img_asscontroladoria']) || (isset($bFlagRead_img_asscontroladoria) && $bFlagRead_img_asscontroladoria))
{
    $this->ajax_return_values_img_asscontroladoria(true);
}
if ($original_id_usuario_assgb !== $modificado_id_usuario_assgb || isset($this->nmgp_cmp_readonly['id_usuario_assgb']) || (isset($bFlagRead_id_usuario_assgb) && $bFlagRead_id_usuario_assgb))
{
    $this->ajax_return_values_id_usuario_assgb(true);
}
if ($original_img_assgb !== $modificado_img_assgb || isset($this->nmgp_cmp_readonly['img_assgb']) || (isset($bFlagRead_img_assgb) && $bFlagRead_img_assgb))
{
    $this->ajax_return_values_img_assgb(true);
}
if ($original_id_tecnico_assop !== $modificado_id_tecnico_assop || isset($this->nmgp_cmp_readonly['id_tecnico_assop']) || (isset($bFlagRead_id_tecnico_assop) && $bFlagRead_id_tecnico_assop))
{
    $this->ajax_return_values_id_tecnico_assop(true);
}
if ($original_img_assop !== $modificado_img_assop || isset($this->nmgp_cmp_readonly['img_assop']) || (isset($bFlagRead_img_assop) && $bFlagRead_img_assop))
{
    $this->ajax_return_values_img_assop(true);
}
if ($original_rg_asscondominio !== $modificado_rg_asscondominio || isset($this->nmgp_cmp_readonly['rg_asscondominio']) || (isset($bFlagRead_rg_asscondominio) && $bFlagRead_rg_asscondominio))
{
    $this->ajax_return_values_rg_asscondominio(true);
}
if ($original_nom_asscondominio !== $modificado_nom_asscondominio || isset($this->nmgp_cmp_readonly['nom_asscondominio']) || (isset($bFlagRead_nom_asscondominio) && $bFlagRead_nom_asscondominio))
{
    $this->ajax_return_values_nom_asscondominio(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_OS_mob_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function onLoadJS($config=[])
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
?>

<style>
    [id^=modalBody] > p:-webkit-full-screen{
  	padding: 10px !important;
	background:white !important;
}
	[id^=modalBody] > p:-moz-full-screen{
  	padding: 10px !important;
	background:white !important;
}
 	[id^=modalBody] > p:fullscreen{
  	padding: 10px !important;
	background:white !important;
}
	[id^=modalBody] > p:-moz-full-screen-ancestor{
  	padding: 10px !important;
	background:white !important;
}
 
	
.sig-canvas {
	border: 2px dotted #CCCCCC;
	border-radius: 5px;
	cursor: crosshair;
	display: block;
	margin-bottom: 3px;
}
#id_read_off_canvas_asscondominio, 
#id_read_off_canvas_assop, 
#id_read_off_canvas_assgb, 
#id_read_off_canvas_asscontroladoria,
.scFormRequiredOdd {
	display: none !important;
}
#alertModel {
	position: fixed !important;	
}
#alertModel > div > div > div.modal-header > button {
	display: none !important;	
}
</style>

<script>
canvasCondominio = "canvas_asscondominio";
canvasOP = "canvas_assop";
canvasGB = "canvas_assgb";
canvasControladoria = "canvas_asscontroladoria";
imgCondominio = "img_asscondominio";
imgOP = "img_assop";
imgGB = "img_assgb";
imgControladoria = "img_asscontroladoria";
c = {
	canvas_asscondominio : {
		titleModal : "Assinatura: Condomínio",
		input : imgCondominio,
		drawing : null,
		mousePos : { x:0, y:0 },
		lastPos : null,
		ctx : null,
		canvas : null
	},
	canvas_assop : {
		titleModal : "Assinatura: Operadora/Prestadora",
		input : imgOP,
		drawing : null,
		mousePos : { x:0, y:0 },
		lastPos : null,
		ctx : null,
		canvas : null
	},
	canvas_assgb : {
		titleModal : "Assinatura: Consultor GLOBALBLUE",
		input : imgGB,
		drawing : null,
		mousePos : { x:0, y:0 },
		lastPos : null,
		ctx : null,
		canvas : null
	},
	canvas_asscontroladoria : {
		titleModal : "Assinatura: Controladoria",
		input : imgControladoria,
		drawing : null,
		mousePos : { x:0, y:0 },
		lastPos : null,
		ctx : null,
		canvas : null
	}
};
imgAssEmpty = `data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAooAAACWCAYAAABZ/6lFAAAIqUlEQVR4Xu3ZIRKEQBRDQTg5HJ3Cj3g+vTom/Uek2PvyI0CAAAECBAgQIHAQuKkQIECAAAECBAgQOAkYit4FAQIECBAgQIDAUcBQ9DAIECBAgAABAgQMRW+AAAECBAgQIECgC/ii2K0kCRAgQIAAAQJTAobi1LmVJUCAAAECBAh0AUOxW0kSIECAAAECBKYEDMWpcytLgAABAgQIEOgChmK3kiRAgAABAgQITAkYilPnVpYAAQIECBAg0AUMxW4lSYAAAQIECBCYEjAUp86tLAECBAgQIECgCxiK3UqSAAECBAgQIDAlYChOnVtZAgQIECBAgEAXMBS7lSQBAgQIECBAYErAUJw6t7IECBAgQIAAgS5gKHYrSQIECBAgQIDAlIChOHVuZQkQIECAAAECXcBQ7FaSBAgQIECAAIEpAUNx6tzKEiBAgAABAgS6gKHYrSQJECBAgAABAlMChuLUuZUlQIAAAQIECHQBQ7FbSRIgQIAAAQIEpgQMxalzK0uAAAECBAgQ6AKGYreSJECAAAECBAhMCRiKU+dWlgABAgQIECDQBQzFbiVJgAABAgQIEJgSMBSnzq0sAQIECBAgQKALGIrdSpIAAQIECBAgMCVgKE6dW1kCBAgQIECAQBcwFLuVJAECBAgQIEBgSsBQnDq3sgQIECBAgACBLmAoditJAgQIECBAgMCUgKE4dW5lCRAgQIAAAQJdwFDsVpIECBAgQIAAgSkBQ3Hq3MoSIECAAAECBLqAoditJAkQIECAAAECUwKG4tS5lSVAgAABAgQIdAFDsVtJEiBAgAABAgSmBAzFqXMrS4AAAQIECBDoAoZit5IkQIAAAQIECEwJGIpT51aWAAECBAgQINAFDMVuJUmAAAECBAgQmBIwFKfOrSwBAgQIECBAoAsYit1KkgABAgQIECAwJWAoTp1bWQIECBAgQIBAFzAUu5UkAQIECBAgQGBKwFCcOreyBAgQIECAAIEuYCh2K0kCBAgQIECAwJSAoTh1bmUJECBAgAABAl3AUOxWkgQIECBAgACBKQFDcercyhIgQIAAAQIEuoCh2K0kCRAgQIAAAQJTAobi1LmVJUCAAAECBAh0AUOxW0kSIECAAAECBKYEDMWpcytLgAABAgQIEOgChmK3kiRAgAABAgQITAkYilPnVpYAAQIECBAg0AUMxW4lSYAAAQIECBCYEjAUp86tLAECBAgQIECgCxiK3UqSAAECBAgQIDAlYChOnVtZAgQIECBAgEAXMBS7lSQBAgQIECBAYErAUJw6t7IECBAgQIAAgS5gKHYrSQIECBAgQIDAlIChOHVuZQkQIECAAAECXcBQ7FaSBAgQIECAAIEpAUNx6tzKEiBAgAABAgS6gKHYrSQJECBAgAABAlMChuLUuZUlQIAAAQIECHQBQ7FbSRIgQIAAAQIEpgQMxalzK0uAAAECBAgQ6AKGYreSJECAAAECBAhMCRiKU+dWlgABAgQIECDQBQzFbiVJgAABAgQIEJgSMBSnzq0sAQIECBAgQKALGIrdSpIAAQIECBAgMCVgKE6dW1kCBAgQIECAQBf4h+LT45IECBAgQIAAAQIrAv9QfFfK6kmAAAECBAgQINAF/PXcrSQJECBAgAABAlMChuLUuZUlQIAAAQIECHQBQ7FbSRIgQIAAAQIEpgQMxalzK0uAAAECBAgQ6AKGYreSJECAAAECBAhMCRiKU+dWlgABAgQIECDQBQzFbiVJgAABAgQIEJgSMBSnzq0sAQIECBAgQKALGIrdSpIAAQIECBAgMCVgKE6dW1kCBAgQIECAQBcwFLuVJAECBAgQIEBgSsBQnDq3sgQIECBAgACBLmAoditJAgQIECBAgMCUgKE4dW5lCRAgQIAAAQJdwFDsVpIECBAgQIAAgSkBQ3Hq3MoSIECAAAECBLqAoditJAkQIECAAAECUwKG4tS5lSVAgAABAgQIdAFDsVtJEiBAgAABAgSmBAzFqXMrS4AAAQIECBDoAoZit5IkQIAAAQIECEwJGIpT51aWAAECBAgQINAFDMVuJUmAAAECBAgQmBIwFKfOrSwBAgQIECBAoAsYit1KkgABAgQIECAwJWAoTp1bWQIECBAgQIBAFzAUu5UkAQIECBAgQGBKwFCcOreyBAgQIECAAIEuYCh2K0kCBAgQIECAwJSAoTh1bmUJECBAgAABAl3AUOxWkgQIECBAgACBKQFDcercyhIgQIAAAQIEuoCh2K0kCRAgQIAAAQJTAobi1LmVJUCAAAECBAh0AUOxW0kSIECAAAECBKYEDMWpcytLgAABAgQIEOgChmK3kiRAgAABAgQITAkYilPnVpYAAQIECBAg0AUMxW4lSYAAAQIECBCYEjAUp86tLAECBAgQIECgCxiK3UqSAAECBAgQIDAlYChOnVtZAgQIECBAgEAXMBS7lSQBAgQIECBAYErAUJw6t7IECBAgQIAAgS5gKHYrSQIECBAgQIDAlIChOHVuZQkQIECAAAECXcBQ7FaSBAgQIECAAIEpAUNx6tzKEiBAgAABAgS6gKHYrSQJECBAgAABAlMChuLUuZUlQIAAAQIECHQBQ7FbSRIgQIAAAQIEpgQMxalzK0uAAAECBAgQ6AKGYreSJECAAAECBAhMCRiKU+dWlgABAgQIECDQBQzFbiVJgAABAgQIEJgSMBSnzq0sAQIECBAgQKALGIrdSpIAAQIECBAgMCVgKE6dW1kCBAgQIECAQBcwFLuVJAECBAgQIEBgSsBQnDq3sgQIECBAgACBLmAoditJAgQIECBAgMCUgKE4dW5lCRAgQIAAAQJdwFDsVpIECBAgQIAAgSkBQ3Hq3MoSIECAAAECBLqAoditJAkQIECAAAECUwKG4tS5lSVAgAABAgQIdAFDsVtJEiBAgAABAgSmBAzFqXMrS4AAAQIECBDoAoZit5IkQIAAAQIECEwJfCVvAZZgP7WKAAAAAElFTkSuQmCC`;
	
$(document).ready(function() {	
	<?php if($config["showCanvas"]): ?>
	$("[name="+imgCondominio+"]").val(imgAssEmpty);
	$("[name="+imgGB+"]").val(imgAssEmpty);
	$("[name="+imgOP+"]").val(imgAssEmpty);
	$("[name="+imgControladoria+"]").val(imgAssEmpty);
	
	$("[name="+canvasCondominio+"]").after(`
		<img id="`+imgCondominio+`" src='`+$("[name="+imgCondominio+"]").val()+`'><br>
		<a class="btn btn-default" data-target="`+canvasCondominio+`" onclick="doAss(this)"><?=  $this->Ini->Nm_lang['lang_btn_sign']  ?></a>
	`);
	$("[name="+canvasGB+"]").after(`
		<img id="`+imgGB+`" src='`+$("[name="+imgGB+"]").val()+`'><br>
		<a class="btn btn-default" data-target="`+canvasGB+`" onclick="doAss(this)"><?=  $this->Ini->Nm_lang['lang_btn_sign']  ?></a>
	`);
	$("[name="+canvasOP+"]").after(`
		<img id="`+imgOP+`" src='`+$("[name="+imgOP+"]").val()+`'><br>
		<a class="btn btn-default" data-target="`+canvasOP+`" onclick="doAss(this)"><?=  $this->Ini->Nm_lang['lang_btn_sign']  ?></a>
	`);
	$("[name="+canvasControladoria+"]").after(`
		<img id="`+imgControladoria+`" src='`+$("[name="+imgControladoria+"]").val()+`'><br>
		<a class="btn btn-default" data-target="`+canvasControladoria+`" onclick="doAss(this)"><?=  $this->Ini->Nm_lang['lang_btn_sign']  ?></a>
	`);

	<?php else: ?>
		$("[name="+canvasCondominio+"]").after(`
			<img src='`+$("[name="+imgCondominio+"]").val()+`'>
		`);
		$("[name="+canvasGB+"]").after(`
			<img src='`+$("[name="+imgGB+"]").val()+`'>
		`);
		$("[name="+canvasOP+"]").after(`
			<img src='`+$("[name="+imgOP+"]").val()+`'>
		`);
		$("[name="+canvasControladoria+"]").after(`
			<img src='`+$("[name="+imgControladoria+"]").val()+`'>
		`);
	<?php endif; ?>
	
	fileSC = new validateFileSC({
		label_max: `<?= $this->Ini->Nm_lang['lang_label_max'] ?>`,
		label_formato: `<?= $this->Ini->Nm_lang['lang_label_formato'] ?>`,
		label_arquivoinvalido: `<?= $this->Ini->Nm_lang['lang_label_arquivoinvalido'] ?>`,
		label_tamanho: `<?= $this->Ini->Nm_lang['lang_label_tamanho'] ?>`
	});
	fileSC.watch('arquivos', {
		sizeB: 2097152,
		type: ['png', 'jpg', 'jpeg', 'pdf']
	});
});	
	
function saveData() {
	btnUpd = $('[id^=sc_b_upd_]'); 
	btnIns = $('[id^=sc_b_ins_]');
	if (btnIns.length) {
		if (!c.canvas_assop.ctx || c.canvas_assop.ctx && 200 > c.canvas_assop.ctx.distance) {
			sModal("show", "", `
				<?=  $this->Ini->Nm_lang['lang_label_needAssOpePre'] ?><br>
				<button class="btn btn-primary" style="margin-top:20px" onclick="close_sModal()">Ok</button>
			`, {sizeClass: "md"});
			return;
		}
		btnIns.click();
	} else if (btnUpd.length) {	
		btnUpd.click();
	}
}
function clickSaveData() {$('[name=savedataonclick]').click();}
function removeData() {$('[name=removeronclick]').click();}
function enviarData() {$('[name=enviaronclick]').click();}
	
function doAss (element) {
	target = $(element).data("target");
	sModal("show", c[""+target]["titleModal"], `
		<canvas class="sig-canvas" id="`+target+`" width="650" height="150" style="margin:0 auto 5px;">Navegardor não suportado!!</canvas>
		<a class="btn btn-danger close-canvas" onclick="toggleFullScreen(true);sModal('close')"><?=  $this->Ini->Nm_lang['lang_btn_close']  ?></a>
		<a class="btn btn-default clear-canvas" data-target="`+target+`"><?=  $this->Ini->Nm_lang['lang_btn_clear']  ?></a>
		<a class="btn btn-success ok-canvas" data-target="`+target+`">OK</a><br>
		<span style="margin-top:5px;font-size:16px;color:red;display:none" id="assErrorInvalid"><?=  $this->Ini->Nm_lang['lang_label_assErrorInvalid'] ?></span>
	`, {sizeClass: "lg"});
	toggleFullScreen();
	setCanvas(target);
	setCanvasUI();
}
	
	
function toggleFullScreen(cancel) {
	cancel = typeof cancel == "undefined" ? false : true;
  var doc = window.document;
  var docEl = $('#modalBody > p')[0];	
  var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
  var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
  if(!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement && !cancel) {
 	requestFullScreen.call(docEl);
  } else if (cancel) {
    cancelFullScreen.call(doc);
  }
}

</script>

<?php $this->canvasJS(); ?>

<?php

$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function removerOnClick_onClick($img_asscondominio, $id_usuario_acompanhante, $observacoes, $hora_fim, $data_fim, $removeronclick, $arquivos, $savedataonclick, $canvas_asscontroladoria, $canvas_assgb, $canvas_assop, $canvas_asscondominio, $hora_inicio, $label_total_horas, $tipo_assop, $telefone, $rg_assop, $rg_assgb, $prestadora, $operadora, $nom_assgb, $empreendimento, $data_inicio, $email, $descricao, $cliente, $total_horas, $criado_em, $num_status, $num_sae, $num_ativo, $rg_asscontroladoria, $nom_asscontroladoria, $img_asscontroladoria, $id_usuario_assgb, $img_assgb, $id_tecnico_assop, $img_assop, $rg_asscondominio, $nom_asscondominio, $id)
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
$original_id = $this->id;
$original_num_ativo = $this->num_ativo;
$original_img_asscondominio = $this->img_asscondominio;
$original_id_usuario_acompanhante = $this->id_usuario_acompanhante;
$original_observacoes = $this->observacoes;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_removeronclick = $this->removeronclick;
$original_arquivos = $this->arquivos;
$original_savedataonclick = $this->savedataonclick;
$original_canvas_asscontroladoria = $this->canvas_asscontroladoria;
$original_canvas_assgb = $this->canvas_assgb;
$original_canvas_assop = $this->canvas_assop;
$original_canvas_asscondominio = $this->canvas_asscondominio;
$original_hora_inicio = $this->hora_inicio;
$original_label_total_horas = $this->label_total_horas;
$original_tipo_assop = $this->tipo_assop;
$original_telefone = $this->telefone;
$original_rg_assop = $this->rg_assop;
$original_rg_assgb = $this->rg_assgb;
$original_prestadora = $this->prestadora;
$original_operadora = $this->operadora;
$original_nom_assgb = $this->nom_assgb;
$original_empreendimento = $this->empreendimento;
$original_data_inicio = $this->data_inicio;
$original_email = $this->email;
$original_descricao = $this->descricao;
$original_cliente = $this->cliente;
$original_total_horas = $this->total_horas;
$original_criado_em = $this->criado_em;
$original_num_status = $this->num_status;
$original_num_sae = $this->num_sae;
$original_num_ativo = $this->num_ativo;
$original_rg_asscontroladoria = $this->rg_asscontroladoria;
$original_nom_asscontroladoria = $this->nom_asscontroladoria;
$original_img_asscontroladoria = $this->img_asscontroladoria;
$original_id_usuario_assgb = $this->id_usuario_assgb;
$original_img_assgb = $this->img_assgb;
$original_id_tecnico_assop = $this->id_tecnico_assop;
$original_img_assop = $this->img_assop;
$original_rg_asscondominio = $this->rg_asscondominio;
$original_nom_asscondominio = $this->nom_asscondominio;
$original_id = $this->id;

sc_include_library("sys", "models", "Logs.php");
$_Logs = new Logs($this);
sc_include_library("sys", "models", "Os.php");
$_Os = new Os($this);
sc_include_library("sys", "models", "Osarquivos.php");
$_Osarquivos = new Osarquivos($this);
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

$logConteudo = $_Logs->getConteudo();
$logConteudo["Arquivos"] = $_Osarquivos->getByIdOs(intval($this->id ));

$this->num_ativo  = "R";
$_Os->delete(intval($this->id ));

$_Logs->insert([
	"Modulo" => "OS",
	"Funcao" => "DELETAR",
	"Descricao" => 'Remoção de Ordem de Serviço',
	"Conteudo" => $logConteudo
]);


$s->setIUDState("grid_OS", "D", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_OS') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };


$modificado_id = $this->id;
$modificado_num_ativo = $this->num_ativo;
$modificado_img_asscondominio = $this->img_asscondominio;
$modificado_id_usuario_acompanhante = $this->id_usuario_acompanhante;
$modificado_observacoes = $this->observacoes;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_removeronclick = $this->removeronclick;
$modificado_arquivos = $this->arquivos;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_canvas_asscontroladoria = $this->canvas_asscontroladoria;
$modificado_canvas_assgb = $this->canvas_assgb;
$modificado_canvas_assop = $this->canvas_assop;
$modificado_canvas_asscondominio = $this->canvas_asscondominio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_label_total_horas = $this->label_total_horas;
$modificado_tipo_assop = $this->tipo_assop;
$modificado_telefone = $this->telefone;
$modificado_rg_assop = $this->rg_assop;
$modificado_rg_assgb = $this->rg_assgb;
$modificado_prestadora = $this->prestadora;
$modificado_operadora = $this->operadora;
$modificado_nom_assgb = $this->nom_assgb;
$modificado_empreendimento = $this->empreendimento;
$modificado_data_inicio = $this->data_inicio;
$modificado_email = $this->email;
$modificado_descricao = $this->descricao;
$modificado_cliente = $this->cliente;
$modificado_total_horas = $this->total_horas;
$modificado_criado_em = $this->criado_em;
$modificado_num_status = $this->num_status;
$modificado_num_sae = $this->num_sae;
$modificado_num_ativo = $this->num_ativo;
$modificado_rg_asscontroladoria = $this->rg_asscontroladoria;
$modificado_nom_asscontroladoria = $this->nom_asscontroladoria;
$modificado_img_asscontroladoria = $this->img_asscontroladoria;
$modificado_id_usuario_assgb = $this->id_usuario_assgb;
$modificado_img_assgb = $this->img_assgb;
$modificado_id_tecnico_assop = $this->id_tecnico_assop;
$modificado_img_assop = $this->img_assop;
$modificado_rg_asscondominio = $this->rg_asscondominio;
$modificado_nom_asscondominio = $this->nom_asscondominio;
$modificado_id = $this->id;
$this->nm_formatar_campos('id', 'num_ativo');
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_img_asscondominio !== $modificado_img_asscondominio || isset($this->nmgp_cmp_readonly['img_asscondominio']) || (isset($bFlagRead_img_asscondominio) && $bFlagRead_img_asscondominio))
{
    $this->ajax_return_values_img_asscondominio(true);
}
if ($original_id_usuario_acompanhante !== $modificado_id_usuario_acompanhante || isset($this->nmgp_cmp_readonly['id_usuario_acompanhante']) || (isset($bFlagRead_id_usuario_acompanhante) && $bFlagRead_id_usuario_acompanhante))
{
    $this->ajax_return_values_id_usuario_acompanhante(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_arquivos !== $modificado_arquivos || isset($this->nmgp_cmp_readonly['arquivos']) || (isset($bFlagRead_arquivos) && $bFlagRead_arquivos))
{
    $this->ajax_return_values_arquivos(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_canvas_asscontroladoria !== $modificado_canvas_asscontroladoria || isset($this->nmgp_cmp_readonly['canvas_asscontroladoria']) || (isset($bFlagRead_canvas_asscontroladoria) && $bFlagRead_canvas_asscontroladoria))
{
    $this->ajax_return_values_canvas_asscontroladoria(true);
}
if ($original_canvas_assgb !== $modificado_canvas_assgb || isset($this->nmgp_cmp_readonly['canvas_assgb']) || (isset($bFlagRead_canvas_assgb) && $bFlagRead_canvas_assgb))
{
    $this->ajax_return_values_canvas_assgb(true);
}
if ($original_canvas_assop !== $modificado_canvas_assop || isset($this->nmgp_cmp_readonly['canvas_assop']) || (isset($bFlagRead_canvas_assop) && $bFlagRead_canvas_assop))
{
    $this->ajax_return_values_canvas_assop(true);
}
if ($original_canvas_asscondominio !== $modificado_canvas_asscondominio || isset($this->nmgp_cmp_readonly['canvas_asscondominio']) || (isset($bFlagRead_canvas_asscondominio) && $bFlagRead_canvas_asscondominio))
{
    $this->ajax_return_values_canvas_asscondominio(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_label_total_horas !== $modificado_label_total_horas || isset($this->nmgp_cmp_readonly['label_total_horas']) || (isset($bFlagRead_label_total_horas) && $bFlagRead_label_total_horas))
{
    $this->ajax_return_values_label_total_horas(true);
}
if ($original_tipo_assop !== $modificado_tipo_assop || isset($this->nmgp_cmp_readonly['tipo_assop']) || (isset($bFlagRead_tipo_assop) && $bFlagRead_tipo_assop))
{
    $this->ajax_return_values_tipo_assop(true);
}
if ($original_telefone !== $modificado_telefone || isset($this->nmgp_cmp_readonly['telefone']) || (isset($bFlagRead_telefone) && $bFlagRead_telefone))
{
    $this->ajax_return_values_telefone(true);
}
if ($original_rg_assop !== $modificado_rg_assop || isset($this->nmgp_cmp_readonly['rg_assop']) || (isset($bFlagRead_rg_assop) && $bFlagRead_rg_assop))
{
    $this->ajax_return_values_rg_assop(true);
}
if ($original_rg_assgb !== $modificado_rg_assgb || isset($this->nmgp_cmp_readonly['rg_assgb']) || (isset($bFlagRead_rg_assgb) && $bFlagRead_rg_assgb))
{
    $this->ajax_return_values_rg_assgb(true);
}
if ($original_prestadora !== $modificado_prestadora || isset($this->nmgp_cmp_readonly['prestadora']) || (isset($bFlagRead_prestadora) && $bFlagRead_prestadora))
{
    $this->ajax_return_values_prestadora(true);
}
if ($original_operadora !== $modificado_operadora || isset($this->nmgp_cmp_readonly['operadora']) || (isset($bFlagRead_operadora) && $bFlagRead_operadora))
{
    $this->ajax_return_values_operadora(true);
}
if ($original_nom_assgb !== $modificado_nom_assgb || isset($this->nmgp_cmp_readonly['nom_assgb']) || (isset($bFlagRead_nom_assgb) && $bFlagRead_nom_assgb))
{
    $this->ajax_return_values_nom_assgb(true);
}
if ($original_empreendimento !== $modificado_empreendimento || isset($this->nmgp_cmp_readonly['empreendimento']) || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento))
{
    $this->ajax_return_values_empreendimento(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_email !== $modificado_email || isset($this->nmgp_cmp_readonly['email']) || (isset($bFlagRead_email) && $bFlagRead_email))
{
    $this->ajax_return_values_email(true);
}
if ($original_descricao !== $modificado_descricao || isset($this->nmgp_cmp_readonly['descricao']) || (isset($bFlagRead_descricao) && $bFlagRead_descricao))
{
    $this->ajax_return_values_descricao(true);
}
if ($original_cliente !== $modificado_cliente || isset($this->nmgp_cmp_readonly['cliente']) || (isset($bFlagRead_cliente) && $bFlagRead_cliente))
{
    $this->ajax_return_values_cliente(true);
}
if ($original_total_horas !== $modificado_total_horas || isset($this->nmgp_cmp_readonly['total_horas']) || (isset($bFlagRead_total_horas) && $bFlagRead_total_horas))
{
    $this->ajax_return_values_total_horas(true);
}
if ($original_criado_em !== $modificado_criado_em || isset($this->nmgp_cmp_readonly['criado_em']) || (isset($bFlagRead_criado_em) && $bFlagRead_criado_em))
{
    $this->ajax_return_values_criado_em(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_rg_asscontroladoria !== $modificado_rg_asscontroladoria || isset($this->nmgp_cmp_readonly['rg_asscontroladoria']) || (isset($bFlagRead_rg_asscontroladoria) && $bFlagRead_rg_asscontroladoria))
{
    $this->ajax_return_values_rg_asscontroladoria(true);
}
if ($original_nom_asscontroladoria !== $modificado_nom_asscontroladoria || isset($this->nmgp_cmp_readonly['nom_asscontroladoria']) || (isset($bFlagRead_nom_asscontroladoria) && $bFlagRead_nom_asscontroladoria))
{
    $this->ajax_return_values_nom_asscontroladoria(true);
}
if ($original_img_asscontroladoria !== $modificado_img_asscontroladoria || isset($this->nmgp_cmp_readonly['img_asscontroladoria']) || (isset($bFlagRead_img_asscontroladoria) && $bFlagRead_img_asscontroladoria))
{
    $this->ajax_return_values_img_asscontroladoria(true);
}
if ($original_id_usuario_assgb !== $modificado_id_usuario_assgb || isset($this->nmgp_cmp_readonly['id_usuario_assgb']) || (isset($bFlagRead_id_usuario_assgb) && $bFlagRead_id_usuario_assgb))
{
    $this->ajax_return_values_id_usuario_assgb(true);
}
if ($original_img_assgb !== $modificado_img_assgb || isset($this->nmgp_cmp_readonly['img_assgb']) || (isset($bFlagRead_img_assgb) && $bFlagRead_img_assgb))
{
    $this->ajax_return_values_img_assgb(true);
}
if ($original_id_tecnico_assop !== $modificado_id_tecnico_assop || isset($this->nmgp_cmp_readonly['id_tecnico_assop']) || (isset($bFlagRead_id_tecnico_assop) && $bFlagRead_id_tecnico_assop))
{
    $this->ajax_return_values_id_tecnico_assop(true);
}
if ($original_img_assop !== $modificado_img_assop || isset($this->nmgp_cmp_readonly['img_assop']) || (isset($bFlagRead_img_assop) && $bFlagRead_img_assop))
{
    $this->ajax_return_values_img_assop(true);
}
if ($original_rg_asscondominio !== $modificado_rg_asscondominio || isset($this->nmgp_cmp_readonly['rg_asscondominio']) || (isset($bFlagRead_rg_asscondominio) && $bFlagRead_rg_asscondominio))
{
    $this->ajax_return_values_rg_asscondominio(true);
}
if ($original_nom_asscondominio !== $modificado_nom_asscondominio || isset($this->nmgp_cmp_readonly['nom_asscondominio']) || (isset($bFlagRead_nom_asscondominio) && $bFlagRead_nom_asscondominio))
{
    $this->ajax_return_values_nom_asscondominio(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_OS_mob_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($img_asscondominio, $id_usuario_acompanhante, $observacoes, $hora_fim, $data_fim, $savedataonclick, $canvas_asscontroladoria, $canvas_assgb, $canvas_assop, $canvas_asscondominio, $hora_inicio, $label_total_horas, $tipo_assop, $telefone, $rg_assop, $rg_assgb, $prestadora, $operadora, $nom_assgb, $empreendimento, $data_inicio, $email, $descricao, $cliente, $total_horas, $criado_em, $num_status, $num_sae, $num_ativo, $rg_asscontroladoria, $nom_asscontroladoria, $img_asscontroladoria, $id_usuario_assgb, $img_assgb, $id_tecnico_assop, $img_assop, $rg_asscondominio, $nom_asscondominio, $id)
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_id_tecnico_assop = $this->id_tecnico_assop;
$original_nom_asscondominio = $this->nom_asscondominio;
$original_rg_asscondominio = $this->rg_asscondominio;
$original_nom_asscontroladoria = $this->nom_asscontroladoria;
$original_rg_asscontroladoria = $this->rg_asscontroladoria;
$original_img_asscondominio = $this->img_asscondominio;
$original_id_usuario_acompanhante = $this->id_usuario_acompanhante;
$original_observacoes = $this->observacoes;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_savedataonclick = $this->savedataonclick;
$original_canvas_asscontroladoria = $this->canvas_asscontroladoria;
$original_canvas_assgb = $this->canvas_assgb;
$original_canvas_assop = $this->canvas_assop;
$original_canvas_asscondominio = $this->canvas_asscondominio;
$original_hora_inicio = $this->hora_inicio;
$original_label_total_horas = $this->label_total_horas;
$original_tipo_assop = $this->tipo_assop;
$original_telefone = $this->telefone;
$original_rg_assop = $this->rg_assop;
$original_rg_assgb = $this->rg_assgb;
$original_prestadora = $this->prestadora;
$original_operadora = $this->operadora;
$original_nom_assgb = $this->nom_assgb;
$original_empreendimento = $this->empreendimento;
$original_data_inicio = $this->data_inicio;
$original_email = $this->email;
$original_descricao = $this->descricao;
$original_cliente = $this->cliente;
$original_total_horas = $this->total_horas;
$original_criado_em = $this->criado_em;
$original_num_status = $this->num_status;
$original_num_sae = $this->num_sae;
$original_num_ativo = $this->num_ativo;
$original_rg_asscontroladoria = $this->rg_asscontroladoria;
$original_nom_asscontroladoria = $this->nom_asscontroladoria;
$original_img_asscontroladoria = $this->img_asscontroladoria;
$original_id_usuario_assgb = $this->id_usuario_assgb;
$original_img_assgb = $this->img_assgb;
$original_id_tecnico_assop = $this->id_tecnico_assop;
$original_img_assop = $this->img_assop;
$original_rg_asscondominio = $this->rg_asscondominio;
$original_nom_asscondominio = $this->nom_asscondominio;
$original_id = $this->id;

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$msg = "";
$Error = false;

if ($this->data_inicio  == '' || $this->hora_inicio  == '' || $this->data_fim  == '' || $this->hora_fim  == '') {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so12'] ."<br>";
	$Error = true;
} elseif (!strtotime("$this->data_inicio  $this->hora_inicio ")) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so4'] ."<br>";
	$Error = true;
} elseif (!strtotime("$this->data_fim  $this->hora_fim ")) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so5'] ."<br>";
	$Error = true;
} elseif (strtotime("$this->data_inicio  $this->hora_inicio ") >= strtotime("$this->data_fim  $this->hora_fim ")) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so6'] ."<br>";
	$Error = true;
}

if (!$this->id_tecnico_assop ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so7'] ."<br>";
	$Error = true;
}

if ($this->nom_asscondominio  xor $this->rg_asscondominio ) { 
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so8'] ."<br>";	
	$Error = true;
}
if ($this->rg_asscondominio  && !isValidRG($this->rg_asscondominio )) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so9'] ."<br>";
	$Error = true;
}

if ($this->nom_asscontroladoria  xor $this->rg_asscontroladoria ) { 
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so10'] ."<br>";
	$Error = true;
}
if ($this->rg_asscontroladoria  && !isValidRG($this->rg_asscontroladoria )) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_so11'] ."<br>";
	$Error = true;
}

if (!$Error) { 
	$f = 'saveData';
	$p = array();
} else {
	$f = 'sModal';
	$p = array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	);
}

$this->sc_ajax_javascript($f, $p);


$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_id_tecnico_assop = $this->id_tecnico_assop;
$modificado_nom_asscondominio = $this->nom_asscondominio;
$modificado_rg_asscondominio = $this->rg_asscondominio;
$modificado_nom_asscontroladoria = $this->nom_asscontroladoria;
$modificado_rg_asscontroladoria = $this->rg_asscontroladoria;
$modificado_img_asscondominio = $this->img_asscondominio;
$modificado_id_usuario_acompanhante = $this->id_usuario_acompanhante;
$modificado_observacoes = $this->observacoes;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_canvas_asscontroladoria = $this->canvas_asscontroladoria;
$modificado_canvas_assgb = $this->canvas_assgb;
$modificado_canvas_assop = $this->canvas_assop;
$modificado_canvas_asscondominio = $this->canvas_asscondominio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_label_total_horas = $this->label_total_horas;
$modificado_tipo_assop = $this->tipo_assop;
$modificado_telefone = $this->telefone;
$modificado_rg_assop = $this->rg_assop;
$modificado_rg_assgb = $this->rg_assgb;
$modificado_prestadora = $this->prestadora;
$modificado_operadora = $this->operadora;
$modificado_nom_assgb = $this->nom_assgb;
$modificado_empreendimento = $this->empreendimento;
$modificado_data_inicio = $this->data_inicio;
$modificado_email = $this->email;
$modificado_descricao = $this->descricao;
$modificado_cliente = $this->cliente;
$modificado_total_horas = $this->total_horas;
$modificado_criado_em = $this->criado_em;
$modificado_num_status = $this->num_status;
$modificado_num_sae = $this->num_sae;
$modificado_num_ativo = $this->num_ativo;
$modificado_rg_asscontroladoria = $this->rg_asscontroladoria;
$modificado_nom_asscontroladoria = $this->nom_asscontroladoria;
$modificado_img_asscontroladoria = $this->img_asscontroladoria;
$modificado_id_usuario_assgb = $this->id_usuario_assgb;
$modificado_img_assgb = $this->img_assgb;
$modificado_id_tecnico_assop = $this->id_tecnico_assop;
$modificado_img_assop = $this->img_assop;
$modificado_rg_asscondominio = $this->rg_asscondominio;
$modificado_nom_asscondominio = $this->nom_asscondominio;
$modificado_id = $this->id;
$this->nm_formatar_campos('data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'id_tecnico_assop', 'nom_asscondominio', 'rg_asscondominio', 'nom_asscontroladoria', 'rg_asscontroladoria');
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_id_tecnico_assop !== $modificado_id_tecnico_assop || isset($this->nmgp_cmp_readonly['id_tecnico_assop']) || (isset($bFlagRead_id_tecnico_assop) && $bFlagRead_id_tecnico_assop))
{
    $this->ajax_return_values_id_tecnico_assop(true);
}
if ($original_nom_asscondominio !== $modificado_nom_asscondominio || isset($this->nmgp_cmp_readonly['nom_asscondominio']) || (isset($bFlagRead_nom_asscondominio) && $bFlagRead_nom_asscondominio))
{
    $this->ajax_return_values_nom_asscondominio(true);
}
if ($original_rg_asscondominio !== $modificado_rg_asscondominio || isset($this->nmgp_cmp_readonly['rg_asscondominio']) || (isset($bFlagRead_rg_asscondominio) && $bFlagRead_rg_asscondominio))
{
    $this->ajax_return_values_rg_asscondominio(true);
}
if ($original_nom_asscontroladoria !== $modificado_nom_asscontroladoria || isset($this->nmgp_cmp_readonly['nom_asscontroladoria']) || (isset($bFlagRead_nom_asscontroladoria) && $bFlagRead_nom_asscontroladoria))
{
    $this->ajax_return_values_nom_asscontroladoria(true);
}
if ($original_rg_asscontroladoria !== $modificado_rg_asscontroladoria || isset($this->nmgp_cmp_readonly['rg_asscontroladoria']) || (isset($bFlagRead_rg_asscontroladoria) && $bFlagRead_rg_asscontroladoria))
{
    $this->ajax_return_values_rg_asscontroladoria(true);
}
if ($original_img_asscondominio !== $modificado_img_asscondominio || isset($this->nmgp_cmp_readonly['img_asscondominio']) || (isset($bFlagRead_img_asscondominio) && $bFlagRead_img_asscondominio))
{
    $this->ajax_return_values_img_asscondominio(true);
}
if ($original_id_usuario_acompanhante !== $modificado_id_usuario_acompanhante || isset($this->nmgp_cmp_readonly['id_usuario_acompanhante']) || (isset($bFlagRead_id_usuario_acompanhante) && $bFlagRead_id_usuario_acompanhante))
{
    $this->ajax_return_values_id_usuario_acompanhante(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_canvas_asscontroladoria !== $modificado_canvas_asscontroladoria || isset($this->nmgp_cmp_readonly['canvas_asscontroladoria']) || (isset($bFlagRead_canvas_asscontroladoria) && $bFlagRead_canvas_asscontroladoria))
{
    $this->ajax_return_values_canvas_asscontroladoria(true);
}
if ($original_canvas_assgb !== $modificado_canvas_assgb || isset($this->nmgp_cmp_readonly['canvas_assgb']) || (isset($bFlagRead_canvas_assgb) && $bFlagRead_canvas_assgb))
{
    $this->ajax_return_values_canvas_assgb(true);
}
if ($original_canvas_assop !== $modificado_canvas_assop || isset($this->nmgp_cmp_readonly['canvas_assop']) || (isset($bFlagRead_canvas_assop) && $bFlagRead_canvas_assop))
{
    $this->ajax_return_values_canvas_assop(true);
}
if ($original_canvas_asscondominio !== $modificado_canvas_asscondominio || isset($this->nmgp_cmp_readonly['canvas_asscondominio']) || (isset($bFlagRead_canvas_asscondominio) && $bFlagRead_canvas_asscondominio))
{
    $this->ajax_return_values_canvas_asscondominio(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_label_total_horas !== $modificado_label_total_horas || isset($this->nmgp_cmp_readonly['label_total_horas']) || (isset($bFlagRead_label_total_horas) && $bFlagRead_label_total_horas))
{
    $this->ajax_return_values_label_total_horas(true);
}
if ($original_tipo_assop !== $modificado_tipo_assop || isset($this->nmgp_cmp_readonly['tipo_assop']) || (isset($bFlagRead_tipo_assop) && $bFlagRead_tipo_assop))
{
    $this->ajax_return_values_tipo_assop(true);
}
if ($original_telefone !== $modificado_telefone || isset($this->nmgp_cmp_readonly['telefone']) || (isset($bFlagRead_telefone) && $bFlagRead_telefone))
{
    $this->ajax_return_values_telefone(true);
}
if ($original_rg_assop !== $modificado_rg_assop || isset($this->nmgp_cmp_readonly['rg_assop']) || (isset($bFlagRead_rg_assop) && $bFlagRead_rg_assop))
{
    $this->ajax_return_values_rg_assop(true);
}
if ($original_rg_assgb !== $modificado_rg_assgb || isset($this->nmgp_cmp_readonly['rg_assgb']) || (isset($bFlagRead_rg_assgb) && $bFlagRead_rg_assgb))
{
    $this->ajax_return_values_rg_assgb(true);
}
if ($original_prestadora !== $modificado_prestadora || isset($this->nmgp_cmp_readonly['prestadora']) || (isset($bFlagRead_prestadora) && $bFlagRead_prestadora))
{
    $this->ajax_return_values_prestadora(true);
}
if ($original_operadora !== $modificado_operadora || isset($this->nmgp_cmp_readonly['operadora']) || (isset($bFlagRead_operadora) && $bFlagRead_operadora))
{
    $this->ajax_return_values_operadora(true);
}
if ($original_nom_assgb !== $modificado_nom_assgb || isset($this->nmgp_cmp_readonly['nom_assgb']) || (isset($bFlagRead_nom_assgb) && $bFlagRead_nom_assgb))
{
    $this->ajax_return_values_nom_assgb(true);
}
if ($original_empreendimento !== $modificado_empreendimento || isset($this->nmgp_cmp_readonly['empreendimento']) || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento))
{
    $this->ajax_return_values_empreendimento(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_email !== $modificado_email || isset($this->nmgp_cmp_readonly['email']) || (isset($bFlagRead_email) && $bFlagRead_email))
{
    $this->ajax_return_values_email(true);
}
if ($original_descricao !== $modificado_descricao || isset($this->nmgp_cmp_readonly['descricao']) || (isset($bFlagRead_descricao) && $bFlagRead_descricao))
{
    $this->ajax_return_values_descricao(true);
}
if ($original_cliente !== $modificado_cliente || isset($this->nmgp_cmp_readonly['cliente']) || (isset($bFlagRead_cliente) && $bFlagRead_cliente))
{
    $this->ajax_return_values_cliente(true);
}
if ($original_total_horas !== $modificado_total_horas || isset($this->nmgp_cmp_readonly['total_horas']) || (isset($bFlagRead_total_horas) && $bFlagRead_total_horas))
{
    $this->ajax_return_values_total_horas(true);
}
if ($original_criado_em !== $modificado_criado_em || isset($this->nmgp_cmp_readonly['criado_em']) || (isset($bFlagRead_criado_em) && $bFlagRead_criado_em))
{
    $this->ajax_return_values_criado_em(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_rg_asscontroladoria !== $modificado_rg_asscontroladoria || isset($this->nmgp_cmp_readonly['rg_asscontroladoria']) || (isset($bFlagRead_rg_asscontroladoria) && $bFlagRead_rg_asscontroladoria))
{
    $this->ajax_return_values_rg_asscontroladoria(true);
}
if ($original_nom_asscontroladoria !== $modificado_nom_asscontroladoria || isset($this->nmgp_cmp_readonly['nom_asscontroladoria']) || (isset($bFlagRead_nom_asscontroladoria) && $bFlagRead_nom_asscontroladoria))
{
    $this->ajax_return_values_nom_asscontroladoria(true);
}
if ($original_img_asscontroladoria !== $modificado_img_asscontroladoria || isset($this->nmgp_cmp_readonly['img_asscontroladoria']) || (isset($bFlagRead_img_asscontroladoria) && $bFlagRead_img_asscontroladoria))
{
    $this->ajax_return_values_img_asscontroladoria(true);
}
if ($original_id_usuario_assgb !== $modificado_id_usuario_assgb || isset($this->nmgp_cmp_readonly['id_usuario_assgb']) || (isset($bFlagRead_id_usuario_assgb) && $bFlagRead_id_usuario_assgb))
{
    $this->ajax_return_values_id_usuario_assgb(true);
}
if ($original_img_assgb !== $modificado_img_assgb || isset($this->nmgp_cmp_readonly['img_assgb']) || (isset($bFlagRead_img_assgb) && $bFlagRead_img_assgb))
{
    $this->ajax_return_values_img_assgb(true);
}
if ($original_id_tecnico_assop !== $modificado_id_tecnico_assop || isset($this->nmgp_cmp_readonly['id_tecnico_assop']) || (isset($bFlagRead_id_tecnico_assop) && $bFlagRead_id_tecnico_assop))
{
    $this->ajax_return_values_id_tecnico_assop(true);
}
if ($original_img_assop !== $modificado_img_assop || isset($this->nmgp_cmp_readonly['img_assop']) || (isset($bFlagRead_img_assop) && $bFlagRead_img_assop))
{
    $this->ajax_return_values_img_assop(true);
}
if ($original_rg_asscondominio !== $modificado_rg_asscondominio || isset($this->nmgp_cmp_readonly['rg_asscondominio']) || (isset($bFlagRead_rg_asscondominio) && $bFlagRead_rg_asscondominio))
{
    $this->ajax_return_values_rg_asscondominio(true);
}
if ($original_nom_asscondominio !== $modificado_nom_asscondominio || isset($this->nmgp_cmp_readonly['nom_asscondominio']) || (isset($bFlagRead_nom_asscondominio) && $bFlagRead_nom_asscondominio))
{
    $this->ajax_return_values_nom_asscondominio(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_OS_mob_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
}
function updateRealizado()
{
$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'on';
                 
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$_Logs = new Logs($this);
sc_include_library("sys", "models", "Pasitens.php");
$_Pasitens = new Pasitens($this);

$Pasitensx = $_Pasitens->getByOrigem($this->num_sae );
$Pasitensx = $Pasitensx ?? null;
foreach($Pasitensx as $Pasitens) {
	if (!$Pasitens) return;
	$Pasitens = (object)$Pasitens;


	sc_include_library("sys", "functions", "helper_CalculoPAS_ST.php");
	sc_include_library("sys", "models", "Excecoes.php");
	sc_include_library('sys', 'models', 'Nferiados.php');
	$_Nferiados = new Nferiados($this); 
	$_Excecoes = new Excecoes($this);


	$Excecoes = $_Excecoes->getByPas(intval($Pasitens->ID_PAS));
	if (!$Excecoes) {
		$Excecoes = [
			"QtdHorasAP" => 0,
			"QtdPercST" => 0.000000,
			"QtdDiasPag" => 10,
			"QtdHorasFixasAP" => 0
		];
	}

	$sql = "SELECT 
			tb4.SupervisaoTecnicaComercial as SupervisaoTecnicaComercial,
			tb4.SupervisaoTecnicaForaComercial as SupervisaoTecnicaForaComercial,
			tb4.SupervisaoTecnicaFdsFeriado as SupervisaoTecnicaFdsFeriado,
			tb4.Deslocamento as Deslocamento,
			tb4.AnaliseProjeto as AnaliseProjeto,
			tb4.AdicionalNoturno as AdicionalNoturno,
			tb4.HorarioInicioAdicionalNoturno as HorarioInicioAdicionalNoturno,
			tb4.HorarioFimAdicionalNoturno as HorarioFimAdicionalNoturno,
			tb4.AnaliseProjeto as AnaliseProjeto,
			tb5.End_UF as End_UF,
			tb5.End_Cidade as End_Cidade
			FROM tb_sae as tb1
			INNER JOIN tb_empreendimentovalores as tb4 ON tb4.ID_Empreendimento = tb1.ID_Empreendimento
			INNER JOIN tb_empreendimentos as tb5 ON tb5.ID_Empreendimento = tb1.ID_Empreendimento
			WHERE tb1.Num_SAE = '$this->num_sae'		
	";

	$Valores = DbQuery($this, $sql);
	$Valores = $Valores[0] ?? null;
	if (!$Valores) return;
	$Valores = (object)$Valores;

	$_Nferiados->Estado = $Valores->End_UF;
	$_Nferiados->Cidade = $Valores->End_Cidade;
	setFeriados($_Nferiados);

	$Pasitens->Real_Data_Inicio = $this->data_inicio ." ".$this->hora_inicio ;
	$Pasitens->Real_Data_Fim = $this->data_fim ." ".$this->hora_fim ;

	$calcReturn_Real = calcPAS_ST($Pasitens->Real_Data_Inicio, $Pasitens->Real_Data_Fim, (array)$Valores);
	$calcReturn_Real['totalPriceDesc'] = $calcReturn_Real['totalPrice'] - (($calcReturn_Real['totalPrice'] * $Excecoes["QtdPercST"])/100);
	$Pasitens->Real_Horas = floatval($calcReturn_Real["totalHour"]);
	$Pasitens->Real_Valor = floatval($calcReturn_Real["totalPriceDesc"]);
	$Pasitens->Info = json_decode($Pasitens->Info);
	$Pasitens->Info->Realizado = $calcReturn_Real;
	$Pasitens->Info = json_encode($Pasitens->Info);

	$_Pasitens->updateRealizado($Pasitens);
	var_dump($_Pasitens->DbError, $_Pasitens->strQuery, $Pasitens);
	$Pasitens->Info = json_decode($Pasitens->Info); 

	$_Logs->insert([
		"Modulo" => "PAS",
		"Funcao" => "EDITAR",
		"Descricao" => 'Edição de itens da PAS a partir da OS',
		"Conteudo" => $Pasitens
	]);
}


$_SESSION['hticnsdata']['form_OS_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_OS_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'] . "';";
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
             $this->ajax_return_values_arquivos(true);
         }
     }
        include_once("form_OS_mob_form0.php");
        include_once("form_OS_mob_form1.php");
        include_once("form_OS_mob_form2.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['csrf_token'];
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

   function Form_lookup_id_usuario_acompanhante()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'] = array(); 
}
if ($this->id_usuario_acompanhante != "")
{ 
   $this->nm_clear_val("id_usuario_acompanhante");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "SELECT ID_Usuario, Nom_Nome 
FROM tb_usuarios 
WHERE ID_Usuario = '$this->id_usuario_acompanhante'
ORDER BY Nom_Nome";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_usuario_acompanhante'][] = $rs->fields[0];
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
   function Form_lookup_email()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "SELECT ID_Usuario, IF(Nom_Email1 != '',Nom_Email1,Nom_Email2) as email
FROM tb_usuarios 
HAVING email != ''";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_email'][] = $rs->fields[0];
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
   function Form_lookup_telefone()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "SELECT ID_Usuario, 
	IF(Num_TelefoneComercial != '',
		IF(CHAR_LENGTH(Num_TelefoneComercial) = 10,
			MASK(Num_TelefoneComercial, '(##) ####-####'),
			IF(CHAR_LENGTH(Num_TelefoneComercial) = 11, 
				MASK(Num_TelefoneComercial, '(##) #####-####'),
                ''
			)
		),
        IF(Nom_TelefoneResidencial != '',
			IF(CHAR_LENGTH(Nom_TelefoneResidencial) = 10,
				MASK(Nom_TelefoneResidencial, '(##) ####-####'),
                IF(CHAR_LENGTH(Nom_TelefoneResidencial) = 11, 
					MASK(Nom_TelefoneResidencial, '(##) #####-####'),
                    ''
				)
			),
            IF(CHAR_LENGTH(Num_TelefoneCelular) = 10,
				MASK(Num_TelefoneCelular, '(##) ####-####'),
				IF(CHAR_LENGTH(Num_TelefoneCelular) = 11, 
					MASK(Num_TelefoneCelular, '(##) #####-####'),
                    ''
				)
			)
		)
	) as telefone
FROM tb_usuarios
HAVING telefone != ''";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_telefone'][] = $rs->fields[0];
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
   function Form_lookup_tipo_assop()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "{lang_label_upc_operators}?#?O?#?N?@?";
       $nmgp_def_dados .= "{lang_label_upc_providers}?#?P?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_tecnico_assop()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'] = array(); 
    }

   $old_value_id = $this->id;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $old_value_total_horas = $this->total_horas;
   $old_value_rg_asscondominio = $this->rg_asscondominio;
   $old_value_id_usuario_assgb = $this->id_usuario_assgb;
   $old_value_rg_asscontroladoria = $this->rg_asscontroladoria;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id = $this->id;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;
   $unformatted_value_total_horas = $this->total_horas;
   $unformatted_value_rg_asscondominio = $this->rg_asscondominio;
   $unformatted_value_id_usuario_assgb = $this->id_usuario_assgb;
   $unformatted_value_rg_asscontroladoria = $this->rg_asscontroladoria;

   $nm_comando = "select tb1.ID, CONCAT(tb1.Nom_Tecnico,' ',tb1.Nom_Sobrenome)
FROM tb_tecnicos as tb1
INNER JOIN tb_tecsae as tb2 ON tb2.ID_Tecnico = tb1.ID
WHERE tb2.Num_SAE = '" . $_SESSION['form_OS_Num_SAE'] . "' AND tb1.Tipo_Tecnico = '$this->tipo_assop'
GROUP BY tb1.ID";

   $this->id = $old_value_id;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;
   $this->total_horas = $old_value_total_horas;
   $this->rg_asscondominio = $old_value_rg_asscondominio;
   $this->id_usuario_assgb = $old_value_id_usuario_assgb;
   $this->rg_asscontroladoria = $old_value_rg_asscontroladoria;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['Lookup_id_tecnico_assop'][] = $rs->fields[0];
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
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_OS_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "Num_SAE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Observacoes", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_usuario_acompanhante($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Usuario_Acompanhante", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_AssCondominio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RG_AssCondominio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_tecnico_assop($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Tecnico_AssOP", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Usuario_AssGB", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_AssControladoria", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RG_AssControladoria", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Ativo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Status", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_SAE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Ativo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Status", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_usuario_acompanhante($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Usuario_Acompanhante", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Total_Horas", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Observacoes", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_AssCondominio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RG_AssCondominio", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_tecnico_assop($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Tecnico_AssOP", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Usuario_AssGB", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_AssControladoria", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "RG_AssControladoria", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter_form'] . " and (ID = '" . $_SESSION['form_OS_ID'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID = '" . $_SESSION['form_OS_ID'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_OS_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['total'] = $qt_geral_reg_form_OS_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_OS_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_OS_mob_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "id_usuario_acompanhante";$nm_numeric[] = "id_tecnico_assop";$nm_numeric[] = "id_usuario_assgb";$nm_numeric[] = "total_horas";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['decimal_db'] == ".")
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
      $Nm_datas['data_inicio'] = "date";$Nm_datas['hora_inicio'] = "time";$Nm_datas['data_fim'] = "date";$Nm_datas['hora_fim'] = "time";$Nm_datas['criado_em'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['SC_sep_date1'];
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
   function SC_lookup_id_usuario_acompanhante($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT Nom_Nome, ID_Usuario, ID_Usuario FROM tb_usuarios WHERE (CAST (ID_Usuario AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT Nom_Nome, ID_Usuario, ID_Usuario FROM tb_usuarios WHERE (Nom_Nome LIKE '%$campo%')" ; 
       }
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_id_tecnico_assop($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT CONCAT(tb1.Nom_Tecnico,' ',tb1.Nom_Sobrenome), tb1.ID, tb1.Tipo_Tecnico FROM tb_tecnicos as tb1 INNER JOIN tb_tecsae as tb2 ON tb2.ID_Tecnico = tb1.ID WHERE (CONCAT(tb1.Nom_Tecnico,' ',tb1.Nom_Sobrenome) LIKE '%$campo%') AND (tb2.Num_SAE = '" . $_SESSION['form_OS_Num_SAE'] . "')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
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
       $nmgp_saida_form = "form_OS_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_OS_mob_fim.php";
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
       form_OS_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_OS_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_OS_mob_pack_ajax_response();
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
       form_OS_mob_pack_ajax_response();
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
        if ('criado_em' == $sField)
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
