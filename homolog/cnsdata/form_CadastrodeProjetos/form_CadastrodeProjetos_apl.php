<?php
//
class form_CadastrodeProjetos_apl
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
   var $id_projeto;
   var $id_tipoprojeto;
   var $id_tipoprojeto_1;
   var $id_empreendimento;
   var $id_condominos;
   var $id_condominos_1;
   var $id_usuariocriacao;
   var $id_operadora;
   var $id_operadora_1;
   var $data_criacao;
   var $data_criacao_hora;
   var $num_totvs;
   var $laudoradiometrico;
   var $laudoradiometrico_1;
   var $protocolohex;
   var $observacoes;
   var $id_prestadora;
   var $id_prestadora_1;
   var $num_ativo;
   var $id_pa;
   var $tipo_pa;
   var $tipo_pa_1;
   var $memorialdescritivopronto;
   var $memorialdescritivopronto_1;
   var $relatoriofotograficopronto;
   var $relatoriofotograficopronto_1;
   var $historicostatus;
   var $id_a;
   var $id_a_1;
   var $id_p;
   var $id_p_1;
   var $instalacaodeantena;
   var $instalacaodeantena_1;
   var $concluirprojeto;
   var $removeronclick;
   var $retomarprojeto;
   var $savedataonclick;
   var $label_dataexpiracao;
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
          if (isset($this->NM_ajax_info['param']['concluirprojeto']))
          {
              $this->concluirprojeto = $this->NM_ajax_info['param']['concluirprojeto'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_criacao']))
          {
              $this->data_criacao = $this->NM_ajax_info['param']['data_criacao'];
          }
          if (isset($this->NM_ajax_info['param']['historicostatus']))
          {
              $this->historicostatus = $this->NM_ajax_info['param']['historicostatus'];
          }
          if (isset($this->NM_ajax_info['param']['id_a']))
          {
              $this->id_a = $this->NM_ajax_info['param']['id_a'];
          }
          if (isset($this->NM_ajax_info['param']['id_condominos']))
          {
              $this->id_condominos = $this->NM_ajax_info['param']['id_condominos'];
          }
          if (isset($this->NM_ajax_info['param']['id_empreendimento']))
          {
              $this->id_empreendimento = $this->NM_ajax_info['param']['id_empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['id_operadora']))
          {
              $this->id_operadora = $this->NM_ajax_info['param']['id_operadora'];
          }
          if (isset($this->NM_ajax_info['param']['id_p']))
          {
              $this->id_p = $this->NM_ajax_info['param']['id_p'];
          }
          if (isset($this->NM_ajax_info['param']['id_pa']))
          {
              $this->id_pa = $this->NM_ajax_info['param']['id_pa'];
          }
          if (isset($this->NM_ajax_info['param']['id_prestadora']))
          {
              $this->id_prestadora = $this->NM_ajax_info['param']['id_prestadora'];
          }
          if (isset($this->NM_ajax_info['param']['id_projeto']))
          {
              $this->id_projeto = $this->NM_ajax_info['param']['id_projeto'];
          }
          if (isset($this->NM_ajax_info['param']['id_tipoprojeto']))
          {
              $this->id_tipoprojeto = $this->NM_ajax_info['param']['id_tipoprojeto'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuariocriacao']))
          {
              $this->id_usuariocriacao = $this->NM_ajax_info['param']['id_usuariocriacao'];
          }
          if (isset($this->NM_ajax_info['param']['instalacaodeantena']))
          {
              $this->instalacaodeantena = $this->NM_ajax_info['param']['instalacaodeantena'];
          }
          if (isset($this->NM_ajax_info['param']['label_dataexpiracao']))
          {
              $this->label_dataexpiracao = $this->NM_ajax_info['param']['label_dataexpiracao'];
          }
          if (isset($this->NM_ajax_info['param']['laudoradiometrico']))
          {
              $this->laudoradiometrico = $this->NM_ajax_info['param']['laudoradiometrico'];
          }
          if (isset($this->NM_ajax_info['param']['memorialdescritivopronto']))
          {
              $this->memorialdescritivopronto = $this->NM_ajax_info['param']['memorialdescritivopronto'];
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
          if (isset($this->NM_ajax_info['param']['num_ativo']))
          {
              $this->num_ativo = $this->NM_ajax_info['param']['num_ativo'];
          }
          if (isset($this->NM_ajax_info['param']['num_totvs']))
          {
              $this->num_totvs = $this->NM_ajax_info['param']['num_totvs'];
          }
          if (isset($this->NM_ajax_info['param']['observacoes']))
          {
              $this->observacoes = $this->NM_ajax_info['param']['observacoes'];
          }
          if (isset($this->NM_ajax_info['param']['protocolohex']))
          {
              $this->protocolohex = $this->NM_ajax_info['param']['protocolohex'];
          }
          if (isset($this->NM_ajax_info['param']['relatoriofotograficopronto']))
          {
              $this->relatoriofotograficopronto = $this->NM_ajax_info['param']['relatoriofotograficopronto'];
          }
          if (isset($this->NM_ajax_info['param']['removeronclick']))
          {
              $this->removeronclick = $this->NM_ajax_info['param']['removeronclick'];
          }
          if (isset($this->NM_ajax_info['param']['retomarprojeto']))
          {
              $this->retomarprojeto = $this->NM_ajax_info['param']['retomarprojeto'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_pa']))
          {
              $this->tipo_pa = $this->NM_ajax_info['param']['tipo_pa'];
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
      if (isset($this->ID_projeto) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_projeto'] = $this->ID_projeto;
      }
      if (isset($this->language) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['language'] = $this->language;
      }
      if (isset($this->form_CadastroDeProjetos_sql_ope) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_CadastroDeProjetos_sql_ope;
      }
      if (isset($this->form_CadastroDeProjetos_sql_pre) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_CadastroDeProjetos_sql_pre;
      }
      if (isset($this->id_Projeto) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['id_Projeto'] = $this->id_Projeto;
      }
      if (isset($this->reloadPage) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['reloadPage'] = $this->reloadPage;
      }
      if (isset($_POST["ID_projeto"]) && isset($this->ID_projeto)) 
      {
          $_SESSION['ID_projeto'] = $this->ID_projeto;
      }
      if (!isset($_POST["ID_projeto"]) && isset($_POST["id_projeto"])) 
      {
          $_SESSION['ID_projeto'] = $this->id_projeto;
      }
      if (isset($_POST["language"]) && isset($this->language)) 
      {
          $_SESSION['language'] = $this->language;
      }
      if (isset($_POST["form_CadastroDeProjetos_sql_ope"]) && isset($this->form_CadastroDeProjetos_sql_ope)) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_CadastroDeProjetos_sql_ope;
      }
      if (!isset($_POST["form_CadastroDeProjetos_sql_ope"]) && isset($_POST["form_cadastrodeprojetos_sql_ope"])) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_cadastrodeprojetos_sql_ope;
      }
      if (isset($_POST["form_CadastroDeProjetos_sql_pre"]) && isset($this->form_CadastroDeProjetos_sql_pre)) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_CadastroDeProjetos_sql_pre;
      }
      if (!isset($_POST["form_CadastroDeProjetos_sql_pre"]) && isset($_POST["form_cadastrodeprojetos_sql_pre"])) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_cadastrodeprojetos_sql_pre;
      }
      if (isset($_POST["id_Projeto"]) && isset($this->id_Projeto)) 
      {
          $_SESSION['id_Projeto'] = $this->id_Projeto;
      }
      if (!isset($_POST["id_Projeto"]) && isset($_POST["id_projeto"])) 
      {
          $_SESSION['id_Projeto'] = $this->id_projeto;
      }
      if (isset($_POST["reloadPage"]) && isset($this->reloadPage)) 
      {
          $_SESSION['reloadPage'] = $this->reloadPage;
      }
      if (!isset($_POST["reloadPage"]) && isset($_POST["reloadpage"])) 
      {
          $_SESSION['reloadPage'] = $this->reloadpage;
      }
      if (isset($_GET["ID_projeto"]) && isset($this->ID_projeto)) 
      {
          $_SESSION['ID_projeto'] = $this->ID_projeto;
      }
      if (!isset($_GET["ID_projeto"]) && isset($_GET["id_projeto"])) 
      {
          $_SESSION['ID_projeto'] = $this->id_projeto;
      }
      if (isset($_GET["language"]) && isset($this->language)) 
      {
          $_SESSION['language'] = $this->language;
      }
      if (isset($_GET["form_CadastroDeProjetos_sql_ope"]) && isset($this->form_CadastroDeProjetos_sql_ope)) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_CadastroDeProjetos_sql_ope;
      }
      if (!isset($_GET["form_CadastroDeProjetos_sql_ope"]) && isset($_GET["form_cadastrodeprojetos_sql_ope"])) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_cadastrodeprojetos_sql_ope;
      }
      if (isset($_GET["form_CadastroDeProjetos_sql_pre"]) && isset($this->form_CadastroDeProjetos_sql_pre)) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_CadastroDeProjetos_sql_pre;
      }
      if (!isset($_GET["form_CadastroDeProjetos_sql_pre"]) && isset($_GET["form_cadastrodeprojetos_sql_pre"])) 
      {
          $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_cadastrodeprojetos_sql_pre;
      }
      if (isset($_GET["id_Projeto"]) && isset($this->id_Projeto)) 
      {
          $_SESSION['id_Projeto'] = $this->id_Projeto;
      }
      if (!isset($_GET["id_Projeto"]) && isset($_GET["id_projeto"])) 
      {
          $_SESSION['id_Projeto'] = $this->id_projeto;
      }
      if (isset($_GET["reloadPage"]) && isset($this->reloadPage)) 
      {
          $_SESSION['reloadPage'] = $this->reloadPage;
      }
      if (!isset($_GET["reloadPage"]) && isset($_GET["reloadpage"])) 
      {
          $_SESSION['reloadPage'] = $this->reloadpage;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['embutida_parms']);
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
                 nm_limpa_str_form_CadastrodeProjetos($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->ID_projeto) && isset($this->id_projeto)) 
          {
              $this->ID_projeto = $this->id_projeto;
          }
          if (isset($this->ID_projeto)) 
          {
              $_SESSION['ID_projeto'] = $this->ID_projeto;
          }
          if (isset($this->language)) 
          {
              $_SESSION['language'] = $this->language;
          }
          if (!isset($this->form_CadastroDeProjetos_sql_ope) && isset($this->form_cadastrodeprojetos_sql_ope)) 
          {
              $this->form_CadastroDeProjetos_sql_ope = $this->form_cadastrodeprojetos_sql_ope;
          }
          if (isset($this->form_CadastroDeProjetos_sql_ope)) 
          {
              $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_CadastroDeProjetos_sql_ope;
          }
          if (!isset($this->form_CadastroDeProjetos_sql_pre) && isset($this->form_cadastrodeprojetos_sql_pre)) 
          {
              $this->form_CadastroDeProjetos_sql_pre = $this->form_cadastrodeprojetos_sql_pre;
          }
          if (isset($this->form_CadastroDeProjetos_sql_pre)) 
          {
              $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_CadastroDeProjetos_sql_pre;
          }
          if (!isset($this->id_Projeto) && isset($this->id_projeto)) 
          {
              $this->id_Projeto = $this->id_projeto;
          }
          if (isset($this->id_Projeto)) 
          {
              $_SESSION['id_Projeto'] = $this->id_Projeto;
          }
          if (!isset($this->reloadPage) && isset($this->reloadpage)) 
          {
              $this->reloadPage = $this->reloadpage;
          }
          if (isset($this->reloadPage)) 
          {
              $_SESSION['reloadPage'] = $this->reloadPage;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->ID_projeto) && isset($this->id_projeto)) 
          {
              $this->ID_projeto = $this->id_projeto;
          }
          if (isset($this->ID_projeto)) 
          {
              $_SESSION['ID_projeto'] = $this->ID_projeto;
          }
          if (isset($this->language)) 
          {
              $_SESSION['language'] = $this->language;
          }
          if (!isset($this->form_CadastroDeProjetos_sql_ope) && isset($this->form_cadastrodeprojetos_sql_ope)) 
          {
              $this->form_CadastroDeProjetos_sql_ope = $this->form_cadastrodeprojetos_sql_ope;
          }
          if (isset($this->form_CadastroDeProjetos_sql_ope)) 
          {
              $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->form_CadastroDeProjetos_sql_ope;
          }
          if (!isset($this->form_CadastroDeProjetos_sql_pre) && isset($this->form_cadastrodeprojetos_sql_pre)) 
          {
              $this->form_CadastroDeProjetos_sql_pre = $this->form_cadastrodeprojetos_sql_pre;
          }
          if (isset($this->form_CadastroDeProjetos_sql_pre)) 
          {
              $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->form_CadastroDeProjetos_sql_pre;
          }
          if (!isset($this->id_Projeto) && isset($this->id_projeto)) 
          {
              $this->id_Projeto = $this->id_projeto;
          }
          if (isset($this->id_Projeto)) 
          {
              $_SESSION['id_Projeto'] = $this->id_Projeto;
          }
          if (!isset($this->reloadPage) && isset($this->reloadpage)) 
          {
              $this->reloadPage = $this->reloadpage;
          }
          if (isset($this->reloadPage)) 
          {
              $_SESSION['reloadPage'] = $this->reloadPage;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['parms']);
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
          $aDtParts = explode(' ', $this->data_criacao);
          $this->data_criacao      = $aDtParts[0];
          $this->data_criacao_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_CadastrodeProjetos_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastrodeProjetos']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadastrodeProjetos']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadastrodeProjetos'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastrodeProjetos']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastrodeProjetos']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_CadastrodeProjetos') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastrodeProjetos']['label'] = "Cadastro de Projetos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_CadastrodeProjetos")
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
      $this->nm_new_label['id_tipoprojeto'] = '' . $this->Ini->Nm_lang['lang_label_typeproject'] . '';
      $this->nm_new_label['id_empreendimento'] = '' . $this->Ini->Nm_lang['lang_label_enterprise'] . '';
      $this->nm_new_label['id_operadora'] = '' . $this->Ini->Nm_lang['lang_label_operator'] . '';
      $this->nm_new_label['data_criacao'] = '' . $this->Ini->Nm_lang['lang_label_creationdate'] . '';
      $this->nm_new_label['laudoradiometrico'] = '' . $this->Ini->Nm_lang['lang_label_radiometricreport'] . '';
      $this->nm_new_label['observacoes'] = '' . $this->Ini->Nm_lang['lang_label_projectdesc'] . '<br>' . $this->Ini->Nm_lang['lang_label_notesprojectdesc'] . '';
      $this->nm_new_label['id_prestadora'] = '' . $this->Ini->Nm_lang['lang_label_provider'] . '';
      $this->nm_new_label['tipo_pa'] = '' . $this->Ini->Nm_lang['lang_label_origin'] . '';
      $this->nm_new_label['memorialdescritivopronto'] = '' . $this->Ini->Nm_lang['lang_label_newproject2'] . '';
      $this->nm_new_label['relatoriofotograficopronto'] = '' . $this->Ini->Nm_lang['lang_label_newproject3'] . '';
      $this->nm_new_label['instalacaodeantena'] = '' . $this->Ini->Nm_lang['lang_label_antennainstallation'] . '';
      $this->nm_new_label['label_dataexpiracao'] = '' . $this->Ini->Nm_lang['lang_label_dataexpiracao'] . '';

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
      $this->arr_buttons['voltar']['value']            = "Retornar";
      $this->arr_buttons['voltar']['display']          = "only_text";
      $this->arr_buttons['voltar']['display_position'] = "text_right";
      $this->arr_buttons['voltar']['style']            = "default";
      $this->arr_buttons['voltar']['image']            = "";

      $this->arr_buttons['remover']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['remover']['type']             = "button";
      $this->arr_buttons['remover']['value']            = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['remover']['display']          = "only_text";
      $this->arr_buttons['remover']['display_position'] = "text_right";
      $this->arr_buttons['remover']['style']            = "default";
      $this->arr_buttons['remover']['image']            = "";

      $this->arr_buttons['salvar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['type']             = "button";
      $this->arr_buttons['salvar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['display']          = "only_text";
      $this->arr_buttons['salvar']['display_position'] = "text_right";
      $this->arr_buttons['salvar']['style']            = "default";
      $this->arr_buttons['salvar']['image']            = "";

      $this->arr_buttons['concluirprojeto']['hint']             = "Concluir projeto";
      $this->arr_buttons['concluirprojeto']['type']             = "button";
      $this->arr_buttons['concluirprojeto']['value']            = "Concluir projeto";
      $this->arr_buttons['concluirprojeto']['display']          = "only_text";
      $this->arr_buttons['concluirprojeto']['display_position'] = "text_right";
      $this->arr_buttons['concluirprojeto']['style']            = "default";
      $this->arr_buttons['concluirprojeto']['image']            = "";

      $this->arr_buttons['confirmeretomarprojeto']['hint']             = "Retomar Projeto";
      $this->arr_buttons['confirmeretomarprojeto']['type']             = "button";
      $this->arr_buttons['confirmeretomarprojeto']['value']            = "Retomar Projeto";
      $this->arr_buttons['confirmeretomarprojeto']['display']          = "only_text";
      $this->arr_buttons['confirmeretomarprojeto']['display_position'] = "text_right";
      $this->arr_buttons['confirmeretomarprojeto']['style']            = "default";
      $this->arr_buttons['confirmeretomarprojeto']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_CadastrodeProjetos']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_CadastrodeProjetos'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['goto']      = 'on';
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
      $this->nmgp_botoes['remover'] = "on";
      $this->nmgp_botoes['salvar'] = "on";
      $this->nmgp_botoes['concluirProjeto'] = "on";
      $this->nmgp_botoes['confirmeRetomarProjeto'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_orig'] = " where ID_projeto = " . $_SESSION['ID_projeto'] . "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_pesq'] = " where ID_projeto = " . $_SESSION['ID_projeto'] . "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastrodeProjetos']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadastrodeProjetos'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadastrodeProjetos'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_CadastrodeProjetos", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_CadastrodeProjetos/form_CadastrodeProjetos_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_CadastrodeProjetos_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_CadastrodeProjetos_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_CadastrodeProjetos_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_CadastrodeProjetos/form_CadastrodeProjetos_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_CadastrodeProjetos_erro.class.php"); 
      }
      $this->Erro      = new form_CadastrodeProjetos_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao']))
         { 
             if ($this->id_projeto != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastrodeProjetos']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltar'] = "on";
          $this->nmgp_botoes['remover'] = "off";
          $this->nmgp_botoes['salvar'] = "on";
          $this->nmgp_botoes['concluirProjeto'] = "off";
          $this->nmgp_botoes['confirmeRetomarProjeto'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes']['voltar'];
          $this->nmgp_botoes['remover'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes']['remover'];
          $this->nmgp_botoes['salvar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes']['salvar'];
          $this->nmgp_botoes['concluirProjeto'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes']['concluirProjeto'];
          $this->nmgp_botoes['confirmeRetomarProjeto'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes']['confirmeRetomarProjeto'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id_projeto)) { $this->nm_limpa_alfa($this->id_projeto); }
      if (isset($this->id_tipoprojeto)) { $this->nm_limpa_alfa($this->id_tipoprojeto); }
      if (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
      if (isset($this->id_condominos)) { $this->nm_limpa_alfa($this->id_condominos); }
      if (isset($this->id_usuariocriacao)) { $this->nm_limpa_alfa($this->id_usuariocriacao); }
      if (isset($this->id_operadora)) { $this->nm_limpa_alfa($this->id_operadora); }
      if (isset($this->num_totvs)) { $this->nm_limpa_alfa($this->num_totvs); }
      if (isset($this->laudoradiometrico)) { $this->nm_limpa_alfa($this->laudoradiometrico); }
      if (isset($this->protocolohex)) { $this->nm_limpa_alfa($this->protocolohex); }
      if (isset($this->id_prestadora)) { $this->nm_limpa_alfa($this->id_prestadora); }
      if (isset($this->id_pa)) { $this->nm_limpa_alfa($this->id_pa); }
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- data_criacao
      $this->field_config['data_criacao']                 = array();
      $this->field_config['data_criacao']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['data_criacao']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_criacao']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['data_criacao']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'data_criacao');
      //-- id_pa
      $this->field_config['id_pa']               = array();
      $this->field_config['id_pa']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_pa']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_pa']['symbol_dec'] = '';
      $this->field_config['id_pa']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_pa']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- id_usuariocriacao
      $this->field_config['id_usuariocriacao']               = array();
      $this->field_config['id_usuariocriacao']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_usuariocriacao']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_usuariocriacao']['symbol_dec'] = '';
      $this->field_config['id_usuariocriacao']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_usuariocriacao']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
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
         $this->label_dataexpiracao = "&nbsp;";
         $this->historicostatus = "&nbsp;";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_data_criacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_criacao');
          }
          if ('validate_id_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empreendimento');
          }
          if ('validate_id_tipoprojeto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_tipoprojeto');
          }
          if ('validate_id_projeto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_projeto');
          }
          if ('validate_instalacaodeantena' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instalacaodeantena');
          }
          if ('validate_laudoradiometrico' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'laudoradiometrico');
          }
          if ('validate_tipo_pa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_pa');
          }
          if ('validate_id_pa' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_pa');
          }
          if ('validate_id_p' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_p');
          }
          if ('validate_id_a' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_a');
          }
          if ('validate_id_condominos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_condominos');
          }
          if ('validate_id_operadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_operadora');
          }
          if ('validate_id_prestadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_prestadora');
          }
          if ('validate_id_usuariocriacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuariocriacao');
          }
          if ('validate_num_totvs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_totvs');
          }
          if ('validate_protocolohex' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'protocolohex');
          }
          if ('validate_observacoes' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'observacoes');
          }
          if ('validate_num_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_ativo');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_removeronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'removeronclick');
          }
          if ('validate_concluirprojeto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'concluirprojeto');
          }
          if ('validate_retomarprojeto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'retomarprojeto');
          }
          if ('validate_memorialdescritivopronto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'memorialdescritivopronto');
          }
          if ('validate_relatoriofotograficopronto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'relatoriofotograficopronto');
          }
          form_CadastrodeProjetos_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_id_tipoprojeto_onchange' == $this->NM_ajax_opcao)
          {
              $this->ID_TipoProjeto_onChange();
          }
          if ('event_instalacaodeantena_onclick' == $this->NM_ajax_opcao)
          {
              $this->InstalacaoDeAntena_onClick();
          }
          if ('event_tipo_op_onchange' == $this->NM_ajax_opcao)
          {
              $this->Tipo_OP_onChange();
          }
          if ('event_tipo_pa_onchange' == $this->NM_ajax_opcao)
          {
              $this->Tipo_PA_onChange();
          }
          if ('event_concluirprojeto_onclick' == $this->NM_ajax_opcao)
          {
              $this->concluirProjeto_onClick();
          }
          if ('event_removeronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->removerOnClick_onClick();
          }
          if ('event_retomarprojeto_onclick' == $this->NM_ajax_opcao)
          {
              $this->retomarProjeto_onClick();
          }
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          form_CadastrodeProjetos_pack_ajax_response();
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
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento FROM tb_empreendimentos WHERE (Num_Ativo = 'S') AND Nom_Empreendimento LIKE '%" . substr($this->Db->qstr($this->id_empreendimento), 1, -1) . "%' ORDER BY Nom_Empreendimento";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento'][] = $rs->fields[0];
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
          form_CadastrodeProjetos_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->memorialdescritivopronto))
          {
              $x = 0; 
              $this->memorialdescritivopronto_1 = $this->memorialdescritivopronto;
              $this->memorialdescritivopronto = ""; 
              if ($this->memorialdescritivopronto_1 != "") 
              { 
                  foreach ($this->memorialdescritivopronto_1 as $dados_memorialdescritivopronto_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->memorialdescritivopronto .= ";";
                      } 
                      $this->memorialdescritivopronto .= $dados_memorialdescritivopronto_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->relatoriofotograficopronto))
          {
              $x = 0; 
              $this->relatoriofotograficopronto_1 = $this->relatoriofotograficopronto;
              $this->relatoriofotograficopronto = ""; 
              if ($this->relatoriofotograficopronto_1 != "") 
              { 
                  foreach ($this->relatoriofotograficopronto_1 as $dados_relatoriofotograficopronto_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->relatoriofotograficopronto .= ";";
                      } 
                      $this->relatoriofotograficopronto .= $dados_relatoriofotograficopronto_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->instalacaodeantena))
          {
              $x = 0; 
              $this->instalacaodeantena_1 = $this->instalacaodeantena;
              $this->instalacaodeantena = ""; 
              if ($this->instalacaodeantena_1 != "") 
              { 
                  foreach ($this->instalacaodeantena_1 as $dados_instalacaodeantena_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->instalacaodeantena .= ";";
                      } 
                      $this->instalacaodeantena .= $dados_instalacaodeantena_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select']['instalacaodeantena']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->instalacaodeantena = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select']['instalacaodeantena'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select']['memorialdescritivopronto']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->memorialdescritivopronto = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select']['memorialdescritivopronto'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select']['relatoriofotograficopronto']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->relatoriofotograficopronto = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select']['relatoriofotograficopronto'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_CadastrodeProjetos_pack_ajax_response();
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
          $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_CadastrodeProjetos_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_redir_atualiz'] == "ok")
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
          form_CadastrodeProjetos_pack_ajax_response();
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
          form_CadastrodeProjetos_pack_ajax_response();
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "./";
      nm_limpa_data($this->data_criacao, $this->field_config['data_criacao']['date_sep']) ; 
      nm_limpa_hora($this->data_criacao_hora, $this->field_config['data_criacao']['time_sep']) ; 
      nm_limpa_numero($this->id_pa, $this->field_config['id_pa']['symbol_grp']) ; 
      nm_limpa_numero($this->id_usuariocriacao, $this->field_config['id_usuariocriacao']['symbol_grp']) ; 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                                if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaDeProjetos') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id_projeto" value="<?php echo $this->form_encode_input($this->id_projeto) ?>"/>
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
           case 'data_criacao':
               return "" . $this->Ini->Nm_lang['lang_label_creationdate'] . "";
               break;
           case 'label_dataexpiracao':
               return "" . $this->Ini->Nm_lang['lang_label_dataexpiracao'] . "";
               break;
           case 'id_empreendimento':
               return "" . $this->Ini->Nm_lang['lang_label_enterprise'] . "";
               break;
           case 'id_tipoprojeto':
               return "" . $this->Ini->Nm_lang['lang_label_typeproject'] . "";
               break;
           case 'id_projeto':
               return "ID Projeto";
               break;
           case 'instalacaodeantena':
               return "" . $this->Ini->Nm_lang['lang_label_antennainstallation'] . "";
               break;
           case 'laudoradiometrico':
               return "" . $this->Ini->Nm_lang['lang_label_radiometricreport'] . "";
               break;
           case 'tipo_pa':
               return "" . $this->Ini->Nm_lang['lang_label_origin'] . "";
               break;
           case 'id_pa':
               return "ID PA";
               break;
           case 'id_p':
               return "POP";
               break;
           case 'id_a':
               return "Antenário";
               break;
           case 'id_condominos':
               return "Condômino";
               break;
           case 'id_operadora':
               return "" . $this->Ini->Nm_lang['lang_label_operator'] . "";
               break;
           case 'id_prestadora':
               return "" . $this->Ini->Nm_lang['lang_label_provider'] . "";
               break;
           case 'id_usuariocriacao':
               return "ID Usuario Criacao";
               break;
           case 'num_totvs':
               return "" . $this->Ini->Nm_lang['lang_label_registration'] . " TOTVS";
               break;
           case 'historicostatus':
               return "Status";
               break;
           case 'protocolohex':
               return "Protocolo Hex";
               break;
           case 'observacoes':
               return "" . $this->Ini->Nm_lang['lang_label_projectdesc'] . "<br>" . $this->Ini->Nm_lang['lang_label_notesprojectdesc'] . "";
               break;
           case 'num_ativo':
               return "Num Ativo";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'removeronclick':
               return "removerOnClick";
               break;
           case 'concluirprojeto':
               return "concluirProjeto";
               break;
           case 'retomarprojeto':
               return "retomarProjeto";
               break;
           case 'memorialdescritivopronto':
               return "" . $this->Ini->Nm_lang['lang_label_newproject2'] . "";
               break;
           case 'relatoriofotograficopronto':
               return "" . $this->Ini->Nm_lang['lang_label_newproject3'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_CadastrodeProjetos']) || !is_array($this->NM_ajax_info['errList']['geral_form_CadastrodeProjetos']))
              {
                  $this->NM_ajax_info['errList']['geral_form_CadastrodeProjetos'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_CadastrodeProjetos'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'data_criacao' == $filtro)
        $this->ValidateField_data_criacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_empreendimento' == $filtro)
        $this->ValidateField_id_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_tipoprojeto' == $filtro)
        $this->ValidateField_id_tipoprojeto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_projeto' == $filtro)
        $this->ValidateField_id_projeto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instalacaodeantena' == $filtro)
        $this->ValidateField_instalacaodeantena($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'laudoradiometrico' == $filtro)
        $this->ValidateField_laudoradiometrico($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_pa' == $filtro)
        $this->ValidateField_tipo_pa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_pa' == $filtro)
        $this->ValidateField_id_pa($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_p' == $filtro)
        $this->ValidateField_id_p($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_a' == $filtro)
        $this->ValidateField_id_a($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_condominos' == $filtro)
        $this->ValidateField_id_condominos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_operadora' == $filtro)
        $this->ValidateField_id_operadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_prestadora' == $filtro)
        $this->ValidateField_id_prestadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_usuariocriacao' == $filtro)
        $this->ValidateField_id_usuariocriacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_totvs' == $filtro)
        $this->ValidateField_num_totvs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'protocolohex' == $filtro)
        $this->ValidateField_protocolohex($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'observacoes' == $filtro)
        $this->ValidateField_observacoes($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_ativo' == $filtro)
        $this->ValidateField_num_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'removeronclick' == $filtro)
        $this->ValidateField_removeronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'concluirprojeto' == $filtro)
        $this->ValidateField_concluirprojeto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'retomarprojeto' == $filtro)
        $this->ValidateField_retomarprojeto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'memorialdescritivopronto' == $filtro)
        $this->ValidateField_memorialdescritivopronto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'relatoriofotograficopronto' == $filtro)
        $this->ValidateField_relatoriofotograficopronto($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$profile = $s->get("profile");

$this->laudoradiometrico  = $this->instalacaodeantena  == 'S' ? ($this->laudoradiometrico  ? $this->laudoradiometrico  : 'N') : 'N';
if ($this->tipo_pa  == 'P') {
	$this->id_pa  = $this->id_p ;
} else {
	$this->id_pa  = $this->id_a ;
}


if (($profile["PROJETO"]["FORCEUPMEMORIALDESC"]["v"] ?? "N") == "S") {
	$this->memorialdescritivopronto  = "S";
} else $this->memorialdescritivopronto  = $this->memorialdescritivopronto  ?: 'N';
if (($profile["PROJETO"]["FORCEUPRELFOTOGRAFICO"]["v"] ?? "N") == "S") {
	$this->relatoriofotograficopronto  = "S";
} else $this->relatoriofotograficopronto  = $this->relatoriofotograficopronto  ?: 'N';

$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
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

    function ValidateField_data_criacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_criacao, $this->field_config['data_criacao']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_criacao']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_criacao']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_criacao']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_criacao']['date_sep']) ; 
          if (trim($this->data_criacao) != "")  
          { 
              if ($teste_validade->Data($this->data_criacao, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_creationdate'] . "; " ; 
                  if (!isset($Campos_Erros['data_criacao']))
                  {
                      $Campos_Erros['data_criacao'] = array();
                  }
                  $Campos_Erros['data_criacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_criacao']) || !is_array($this->NM_ajax_info['errList']['data_criacao']))
                  {
                      $this->NM_ajax_info['errList']['data_criacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_criacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_criacao']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->data_criacao_hora, $this->field_config['data_criacao_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['data_criacao_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['data_criacao_hora']['time_sep']) ; 
          if (trim($this->data_criacao_hora) != "")  
          { 
              if ($teste_validade->Hora($this->data_criacao_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_creationdate'] . "; " ; 
                  if (!isset($Campos_Erros['data_criacao_hora']))
                  {
                      $Campos_Erros['data_criacao_hora'] = array();
                  }
                  $Campos_Erros['data_criacao_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_criacao']) || !is_array($this->NM_ajax_info['errList']['data_criacao']))
                  {
                      $this->NM_ajax_info['errList']['data_criacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_criacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['data_criacao']) && isset($Campos_Erros['data_criacao_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['data_criacao'], $Campos_Erros['data_criacao_hora']);
          if (empty($Campos_Erros['data_criacao_hora']))
          {
              unset($Campos_Erros['data_criacao_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['data_criacao']))
          {
              $this->NM_ajax_info['errList']['data_criacao'] = array_unique($this->NM_ajax_info['errList']['data_criacao']);
          }
      }
    } // ValidateField_data_criacao_hora

    function ValidateField_id_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->id_empreendimento) > 11) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_enterprise'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_empreendimento']))
              {
                  $Campos_Erros['id_empreendimento'] = array();
              }
              $Campos_Erros['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_empreendimento']) || !is_array($this->NM_ajax_info['errList']['id_empreendimento']))
              {
                  $this->NM_ajax_info['errList']['id_empreendimento'] = array();
              }
              $this->NM_ajax_info['errList']['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_id_empreendimento

    function ValidateField_id_tipoprojeto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_tipoprojeto) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']) && !in_array($this->id_tipoprojeto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_tipoprojeto']))
                   {
                       $Campos_Erros['id_tipoprojeto'] = array();
                   }
                   $Campos_Erros['id_tipoprojeto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_tipoprojeto']) || !is_array($this->NM_ajax_info['errList']['id_tipoprojeto']))
                   {
                       $this->NM_ajax_info['errList']['id_tipoprojeto'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_tipoprojeto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_tipoprojeto

    function ValidateField_id_projeto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->id_projeto) > 11) 
          { 
              $Campos_Crit .= "ID Projeto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_projeto']))
              {
                  $Campos_Erros['id_projeto'] = array();
              }
              $Campos_Erros['id_projeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_projeto']) || !is_array($this->NM_ajax_info['errList']['id_projeto']))
              {
                  $this->NM_ajax_info['errList']['id_projeto'] = array();
              }
              $this->NM_ajax_info['errList']['id_projeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_id_projeto

    function ValidateField_instalacaodeantena(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->instalacaodeantena == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->instalacaodeantena))
          {
              $x = 0; 
              $this->instalacaodeantena_1 = array(); 
              foreach ($this->instalacaodeantena as $ind => $dados_instalacaodeantena_1 ) 
              {
                  if ($dados_instalacaodeantena_1 != "") 
                  {
                      $this->instalacaodeantena_1[] = $dados_instalacaodeantena_1;
                  } 
              } 
              $this->instalacaodeantena = ""; 
              foreach ($this->instalacaodeantena_1 as $dados_instalacaodeantena_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->instalacaodeantena .= ";";
                   } 
                   $this->instalacaodeantena .= $dados_instalacaodeantena_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_instalacaodeantena

    function ValidateField_laudoradiometrico(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->laudoradiometrico == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_laudoradiometrico

    function ValidateField_tipo_pa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->tipo_pa == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_tipo_pa

    function ValidateField_id_pa(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_pa == "")  
      { 
          $this->id_pa = 0;
          $this->sc_force_zero[] = 'id_pa';
      } 
      nm_limpa_numero($this->id_pa, $this->field_config['id_pa']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_pa != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_pa) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID PA: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_pa']))
                  {
                      $Campos_Erros['id_pa'] = array();
                  }
                  $Campos_Erros['id_pa'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_pa']) || !is_array($this->NM_ajax_info['errList']['id_pa']))
                  {
                      $this->NM_ajax_info['errList']['id_pa'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_pa'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_pa, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID PA; " ; 
                  if (!isset($Campos_Erros['id_pa']))
                  {
                      $Campos_Erros['id_pa'] = array();
                  }
                  $Campos_Erros['id_pa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_pa']) || !is_array($this->NM_ajax_info['errList']['id_pa']))
                  {
                      $this->NM_ajax_info['errList']['id_pa'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_pa'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_pa

    function ValidateField_id_p(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_p) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']) && !in_array($this->id_p, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_p']))
                   {
                       $Campos_Erros['id_p'] = array();
                   }
                   $Campos_Erros['id_p'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_p']) || !is_array($this->NM_ajax_info['errList']['id_p']))
                   {
                       $this->NM_ajax_info['errList']['id_p'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_p'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_p

    function ValidateField_id_a(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_a) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']) && !in_array($this->id_a, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_a']))
                   {
                       $Campos_Erros['id_a'] = array();
                   }
                   $Campos_Erros['id_a'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_a']) || !is_array($this->NM_ajax_info['errList']['id_a']))
                   {
                       $this->NM_ajax_info['errList']['id_a'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_a'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_a

    function ValidateField_id_condominos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_condominos) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']) && !in_array($this->id_condominos, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_condominos']))
                   {
                       $Campos_Erros['id_condominos'] = array();
                   }
                   $Campos_Erros['id_condominos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_condominos']) || !is_array($this->NM_ajax_info['errList']['id_condominos']))
                   {
                       $this->NM_ajax_info['errList']['id_condominos'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_condominos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_condominos

    function ValidateField_id_operadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_operadora) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']) && !in_array($this->id_operadora, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_operadora']))
                   {
                       $Campos_Erros['id_operadora'] = array();
                   }
                   $Campos_Erros['id_operadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_operadora']) || !is_array($this->NM_ajax_info['errList']['id_operadora']))
                   {
                       $this->NM_ajax_info['errList']['id_operadora'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_operadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_operadora

    function ValidateField_id_prestadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_prestadora) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']) && !in_array($this->id_prestadora, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_prestadora']))
                   {
                       $Campos_Erros['id_prestadora'] = array();
                   }
                   $Campos_Erros['id_prestadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_prestadora']) || !is_array($this->NM_ajax_info['errList']['id_prestadora']))
                   {
                       $this->NM_ajax_info['errList']['id_prestadora'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_prestadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_prestadora

    function ValidateField_id_usuariocriacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_usuariocriacao == "")  
      { 
          $this->id_usuariocriacao = 0;
          $this->sc_force_zero[] = 'id_usuariocriacao';
      } 
      nm_limpa_numero($this->id_usuariocriacao, $this->field_config['id_usuariocriacao']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_usuariocriacao != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_usuariocriacao) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID Usuario Criacao: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_usuariocriacao']))
                  {
                      $Campos_Erros['id_usuariocriacao'] = array();
                  }
                  $Campos_Erros['id_usuariocriacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_usuariocriacao']) || !is_array($this->NM_ajax_info['errList']['id_usuariocriacao']))
                  {
                      $this->NM_ajax_info['errList']['id_usuariocriacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_usuariocriacao'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_usuariocriacao, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID Usuario Criacao; " ; 
                  if (!isset($Campos_Erros['id_usuariocriacao']))
                  {
                      $Campos_Erros['id_usuariocriacao'] = array();
                  }
                  $Campos_Erros['id_usuariocriacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_usuariocriacao']) || !is_array($this->NM_ajax_info['errList']['id_usuariocriacao']))
                  {
                      $this->NM_ajax_info['errList']['id_usuariocriacao'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_usuariocriacao'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_usuariocriacao

    function ValidateField_num_totvs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_totvs) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_registration'] . " TOTVS " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_totvs']))
              {
                  $Campos_Erros['num_totvs'] = array();
              }
              $Campos_Erros['num_totvs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_totvs']) || !is_array($this->NM_ajax_info['errList']['num_totvs']))
              {
                  $this->NM_ajax_info['errList']['num_totvs'] = array();
              }
              $this->NM_ajax_info['errList']['num_totvs'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_totvs

    function ValidateField_protocolohex(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->protocolohex) > 255) 
          { 
              $Campos_Crit .= "Protocolo Hex " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['protocolohex']))
              {
                  $Campos_Erros['protocolohex'] = array();
              }
              $Campos_Erros['protocolohex'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['protocolohex']) || !is_array($this->NM_ajax_info['errList']['protocolohex']))
              {
                  $this->NM_ajax_info['errList']['protocolohex'] = array();
              }
              $this->NM_ajax_info['errList']['protocolohex'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_protocolohex

    function ValidateField_observacoes(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->observacoes) > 32767) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_projectdesc'] . "<br>" . $this->Ini->Nm_lang['lang_label_notesprojectdesc'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_concluirprojeto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->concluirprojeto) > 20) 
          { 
              $Campos_Crit .= "concluirProjeto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['concluirprojeto']))
              {
                  $Campos_Erros['concluirprojeto'] = array();
              }
              $Campos_Erros['concluirprojeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['concluirprojeto']) || !is_array($this->NM_ajax_info['errList']['concluirprojeto']))
              {
                  $this->NM_ajax_info['errList']['concluirprojeto'] = array();
              }
              $this->NM_ajax_info['errList']['concluirprojeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_concluirprojeto

    function ValidateField_retomarprojeto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->retomarprojeto) > 20) 
          { 
              $Campos_Crit .= "retomarProjeto " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['retomarprojeto']))
              {
                  $Campos_Erros['retomarprojeto'] = array();
              }
              $Campos_Erros['retomarprojeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['retomarprojeto']) || !is_array($this->NM_ajax_info['errList']['retomarprojeto']))
              {
                  $this->NM_ajax_info['errList']['retomarprojeto'] = array();
              }
              $this->NM_ajax_info['errList']['retomarprojeto'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_retomarprojeto

    function ValidateField_memorialdescritivopronto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->memorialdescritivopronto == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->memorialdescritivopronto))
          {
              $x = 0; 
              $this->memorialdescritivopronto_1 = array(); 
              foreach ($this->memorialdescritivopronto as $ind => $dados_memorialdescritivopronto_1 ) 
              {
                  if ($dados_memorialdescritivopronto_1 != "") 
                  {
                      $this->memorialdescritivopronto_1[] = $dados_memorialdescritivopronto_1;
                  } 
              } 
              $this->memorialdescritivopronto = ""; 
              foreach ($this->memorialdescritivopronto_1 as $dados_memorialdescritivopronto_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->memorialdescritivopronto .= ";";
                   } 
                   $this->memorialdescritivopronto .= $dados_memorialdescritivopronto_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_memorialdescritivopronto

    function ValidateField_relatoriofotograficopronto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->relatoriofotograficopronto == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->relatoriofotograficopronto))
          {
              $x = 0; 
              $this->relatoriofotograficopronto_1 = array(); 
              foreach ($this->relatoriofotograficopronto as $ind => $dados_relatoriofotograficopronto_1 ) 
              {
                  if ($dados_relatoriofotograficopronto_1 != "") 
                  {
                      $this->relatoriofotograficopronto_1[] = $dados_relatoriofotograficopronto_1;
                  } 
              } 
              $this->relatoriofotograficopronto = ""; 
              foreach ($this->relatoriofotograficopronto_1 as $dados_relatoriofotograficopronto_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->relatoriofotograficopronto .= ";";
                   } 
                   $this->relatoriofotograficopronto .= $dados_relatoriofotograficopronto_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_relatoriofotograficopronto

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
    $this->nmgp_dados_form['data_criacao'] = $this->data_criacao;
    $this->nmgp_dados_form['label_dataexpiracao'] = $this->label_dataexpiracao;
    $this->nmgp_dados_form['id_empreendimento'] = $this->id_empreendimento;
    $this->nmgp_dados_form['id_tipoprojeto'] = $this->id_tipoprojeto;
    $this->nmgp_dados_form['id_projeto'] = $this->id_projeto;
    $this->nmgp_dados_form['instalacaodeantena'] = $this->instalacaodeantena;
    $this->nmgp_dados_form['laudoradiometrico'] = $this->laudoradiometrico;
    $this->nmgp_dados_form['tipo_pa'] = $this->tipo_pa;
    $this->nmgp_dados_form['id_pa'] = $this->id_pa;
    $this->nmgp_dados_form['id_p'] = $this->id_p;
    $this->nmgp_dados_form['id_a'] = $this->id_a;
    $this->nmgp_dados_form['id_condominos'] = $this->id_condominos;
    $this->nmgp_dados_form['id_operadora'] = $this->id_operadora;
    $this->nmgp_dados_form['id_prestadora'] = $this->id_prestadora;
    $this->nmgp_dados_form['id_usuariocriacao'] = $this->id_usuariocriacao;
    $this->nmgp_dados_form['num_totvs'] = $this->num_totvs;
    $this->nmgp_dados_form['historicostatus'] = $this->historicostatus;
    $this->nmgp_dados_form['protocolohex'] = $this->protocolohex;
    $this->nmgp_dados_form['observacoes'] = $this->observacoes;
    $this->nmgp_dados_form['num_ativo'] = $this->num_ativo;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['removeronclick'] = $this->removeronclick;
    $this->nmgp_dados_form['concluirprojeto'] = $this->concluirprojeto;
    $this->nmgp_dados_form['retomarprojeto'] = $this->retomarprojeto;
    $this->nmgp_dados_form['memorialdescritivopronto'] = $this->memorialdescritivopronto;
    $this->nmgp_dados_form['relatoriofotograficopronto'] = $this->relatoriofotograficopronto;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_data($this->data_criacao, $this->field_config['data_criacao']['date_sep']) ; 
      nm_limpa_hora($this->data_criacao_hora, $this->field_config['data_criacao']['time_sep']) ; 
      nm_limpa_numero($this->id_pa, $this->field_config['id_pa']['symbol_grp']) ; 
      nm_limpa_numero($this->id_usuariocriacao, $this->field_config['id_usuariocriacao']['symbol_grp']) ; 
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
      if ($Nome_Campo == "id_pa")
      {
          nm_limpa_numero($this->id_pa, $this->field_config['id_pa']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_usuariocriacao")
      {
          nm_limpa_numero($this->id_usuariocriacao, $this->field_config['id_usuariocriacao']['symbol_grp']) ; 
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
      if ((!empty($this->data_criacao) && 'null' != $this->data_criacao) || (!empty($format_fields) && isset($format_fields['data_criacao'])))
      {
          $nm_separa_data = strpos($this->field_config['data_criacao']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['data_criacao']['date_format'];
          $this->field_config['data_criacao']['date_format'] = substr($this->field_config['data_criacao']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->data_criacao, " ") ; 
          $this->data_criacao_hora = substr($this->data_criacao, $separador + 1) ; 
          $this->data_criacao = substr($this->data_criacao, 0, $separador) ; 
          nm_volta_data($this->data_criacao, $this->field_config['data_criacao']['date_format']) ; 
          nmgp_Form_Datas($this->data_criacao, $this->field_config['data_criacao']['date_format'], $this->field_config['data_criacao']['date_sep']) ;  
          $this->field_config['data_criacao']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->data_criacao_hora, $this->field_config['data_criacao']['date_format']) ; 
          nmgp_Form_Hora($this->data_criacao_hora, $this->field_config['data_criacao']['date_format'], $this->field_config['data_criacao']['time_sep']) ;  
          $this->field_config['data_criacao']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->data_criacao || '' == $this->data_criacao)
      {
          $this->data_criacao_hora = '';
          $this->data_criacao = '';
      }
      if (!empty($this->id_pa) || (!empty($format_fields) && isset($format_fields['id_pa'])))
      {
          nmgp_Form_Num_Val($this->id_pa, $this->field_config['id_pa']['symbol_grp'], $this->field_config['id_pa']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_pa']['symbol_fmt']) ; 
      }
      if (!empty($this->id_usuariocriacao) || (!empty($format_fields) && isset($format_fields['id_usuariocriacao'])))
      {
          nmgp_Form_Num_Val($this->id_usuariocriacao, $this->field_config['id_usuariocriacao']['symbol_grp'], $this->field_config['id_usuariocriacao']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_usuariocriacao']['symbol_fmt']) ; 
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
      $guarda_format_hora = $this->field_config['data_criacao']['date_format'];
      if ($this->data_criacao != "")  
      { 
          $nm_separa_data = strpos($this->field_config['data_criacao']['date_format'], ";") ;
          $this->field_config['data_criacao']['date_format'] = substr($this->field_config['data_criacao']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->data_criacao, $this->field_config['data_criacao']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->data_criacao = str_replace('-', '', $this->data_criacao);
          }
          $this->field_config['data_criacao']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->data_criacao_hora, $this->field_config['data_criacao']['date_format']) ; 
          if ($this->data_criacao_hora == "" )  
          { 
              $this->data_criacao_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4) . "." . substr($this->data_criacao_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->data_criacao_hora = substr($this->data_criacao_hora, 0, -4);
          }
          if ($this->data_criacao != "")  
          { 
              $this->data_criacao .= " " . $this->data_criacao_hora ; 
          }
      } 
      if ($this->data_criacao == "" && $use_null)  
      { 
          $this->data_criacao = "null" ; 
      } 
      $this->field_config['data_criacao']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_data_criacao();
          $this->ajax_return_values_label_dataexpiracao();
          $this->ajax_return_values_id_empreendimento();
          $this->ajax_return_values_id_tipoprojeto();
          $this->ajax_return_values_id_projeto();
          $this->ajax_return_values_instalacaodeantena();
          $this->ajax_return_values_laudoradiometrico();
          $this->ajax_return_values_tipo_pa();
          $this->ajax_return_values_id_pa();
          $this->ajax_return_values_id_p();
          $this->ajax_return_values_id_a();
          $this->ajax_return_values_id_condominos();
          $this->ajax_return_values_id_operadora();
          $this->ajax_return_values_id_prestadora();
          $this->ajax_return_values_id_usuariocriacao();
          $this->ajax_return_values_num_totvs();
          $this->ajax_return_values_historicostatus();
          $this->ajax_return_values_protocolohex();
          $this->ajax_return_values_observacoes();
          $this->ajax_return_values_num_ativo();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_removeronclick();
          $this->ajax_return_values_concluirprojeto();
          $this->ajax_return_values_retomarprojeto();
          $this->ajax_return_values_memorialdescritivopronto();
          $this->ajax_return_values_relatoriofotograficopronto();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_projeto']['keyVal'] = form_CadastrodeProjetos_pack_protect_string($this->nmgp_dados_form['id_projeto']);
          }
   } // ajax_return_values

          //----- data_criacao
   function ajax_return_values_data_criacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_criacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_criacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_criacao'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->data_criacao . ' ' . $this->data_criacao_hora),
              );
          }
   }

          //----- label_dataexpiracao
   function ajax_return_values_label_dataexpiracao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("label_dataexpiracao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->label_dataexpiracao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['label_dataexpiracao'] = array(
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
              $this->_tmp_lookup_id_empreendimento = $this->id_empreendimento;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento FROM tb_empreendimentos WHERE (Num_Ativo = 'S') AND ID_Empreendimento = " . substr($this->Db->qstr($this->id_empreendimento), 1, -1) . " ORDER BY Nom_Empreendimento";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   if ('' != $this->id_empreendimento)
   {
   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_empreendimento'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
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
          $val_output = isset($aLookup[0][form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($this->id_empreendimento))]) ? $aLookup[0][form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($this->id_empreendimento))] : "";
          $this->NM_ajax_info['fldList']['id_empreendimento_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- id_tipoprojeto
   function ajax_return_values_id_tipoprojeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_tipoprojeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_tipoprojeto);
              $aLookup = array();
              $this->_tmp_lookup_id_tipoprojeto = $this->id_tipoprojeto;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID_ProjetoTipo, (CASE
  WHEN '" . $_SESSION['language'] . "' = 'pt_br' THEN Nom_ProjetoTipo
  WHEN '" . $_SESSION['language'] . "' = 'es' THEN Nom_ProjetoTipo_es
  WHEN '" . $_SESSION['language'] . "' = 'en_us' THEN Nom_ProjetoTipo_en
END) 
FROM tb_projetostipos 
ORDER BY Nom_ProjetoTipo";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_tipoprojeto\"";
          if (isset($this->NM_ajax_info['select_html']['id_tipoprojeto']) && !empty($this->NM_ajax_info['select_html']['id_tipoprojeto']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_tipoprojeto'];
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

                  if ($this->id_tipoprojeto == $sValue)
                  {
                      $this->_tmp_lookup_id_tipoprojeto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_tipoprojeto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_tipoprojeto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_tipoprojeto']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_tipoprojeto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_tipoprojeto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_tipoprojeto']['labList'] = $aLabel;
          }
   }

          //----- id_projeto
   function ajax_return_values_id_projeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_projeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_projeto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_projeto'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- instalacaodeantena
   function ajax_return_values_instalacaodeantena($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instalacaodeantena", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instalacaodeantena);
              $aLookup = array();
              $this->_tmp_lookup_instalacaodeantena = $this->instalacaodeantena;

$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('S') => form_CadastrodeProjetos_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_instalacaodeantena'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['instalacaodeantena']) && !empty($this->NM_ajax_info['select_html']['instalacaodeantena']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['instalacaodeantena'];
          }
          $this->NM_ajax_info['fldList']['instalacaodeantena'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode('', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-instalacaodeantena',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['instalacaodeantena']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['instalacaodeantena']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['instalacaodeantena']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['instalacaodeantena']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['instalacaodeantena']['labList'] = $aLabel;
          }
   }

          //----- laudoradiometrico
   function ajax_return_values_laudoradiometrico($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("laudoradiometrico", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->laudoradiometrico);
              $aLookup = array();
              $this->_tmp_lookup_laudoradiometrico = $this->laudoradiometrico;

$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('receptora') => form_CadastrodeProjetos_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_receptora'] . ""));
$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('transmissora') => form_CadastrodeProjetos_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_transmissora'] . ""));
$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('receptora_transmissora') => form_CadastrodeProjetos_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_receptoratransmissora'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_laudoradiometrico'][] = 'receptora';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_laudoradiometrico'][] = 'transmissora';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_laudoradiometrico'][] = 'receptora_transmissora';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"laudoradiometrico\"";
          if (isset($this->NM_ajax_info['select_html']['laudoradiometrico']) && !empty($this->NM_ajax_info['select_html']['laudoradiometrico']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['laudoradiometrico'];
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

                  if ($this->laudoradiometrico == $sValue)
                  {
                      $this->_tmp_lookup_laudoradiometrico = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['laudoradiometrico'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['laudoradiometrico']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['laudoradiometrico']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['laudoradiometrico']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['laudoradiometrico']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['laudoradiometrico']['labList'] = $aLabel;
          }
   }

          //----- tipo_pa
   function ajax_return_values_tipo_pa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_pa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_pa);
              $aLookup = array();
              $this->_tmp_lookup_tipo_pa = $this->tipo_pa;

$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('P') => form_CadastrodeProjetos_pack_protect_string("POP"));
$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('A') => form_CadastrodeProjetos_pack_protect_string("Antenário"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_tipo_pa'][] = 'P';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_tipo_pa'][] = 'A';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"tipo_pa\"";
          if (isset($this->NM_ajax_info['select_html']['tipo_pa']) && !empty($this->NM_ajax_info['select_html']['tipo_pa']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['tipo_pa'];
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

                  if ($this->tipo_pa == $sValue)
                  {
                      $this->_tmp_lookup_tipo_pa = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['tipo_pa'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['tipo_pa']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['tipo_pa']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['tipo_pa']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['tipo_pa']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['tipo_pa']['labList'] = $aLabel;
          }
   }

          //----- id_pa
   function ajax_return_values_id_pa($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_pa", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_pa);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_pa'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_p
   function ajax_return_values_id_p($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_p", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_p);
              $aLookup = array();
              $this->_tmp_lookup_id_p = $this->id_p;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'] = array(); 
}
if ($this->id_empreendimento != "")
{ 
   $this->nm_clear_val("id_empreendimento");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID, Nom_POP 
FROM tb_pop 
WHERE ID_Empreendimento = '$this->id_empreendimento' 
ORDER BY Nom_POP";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_p\"";
          if (isset($this->NM_ajax_info['select_html']['id_p']) && !empty($this->NM_ajax_info['select_html']['id_p']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_p'];
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

                  if ($this->id_p == $sValue)
                  {
                      $this->_tmp_lookup_id_p = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_p'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_p']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_p']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_p']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_p']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_p']['labList'] = $aLabel;
          }
   }

          //----- id_a
   function ajax_return_values_id_a($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_a", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_a);
              $aLookup = array();
              $this->_tmp_lookup_id_a = $this->id_a;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'] = array(); 
}
if ($this->id_empreendimento != "")
{ 
   $this->nm_clear_val("id_empreendimento");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID, Nom_Nome 
FROM tb_antenarios 
WHERE ID_Empreendimento = '$this->id_empreendimento' 
ORDER BY Nom_Nome";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_a\"";
          if (isset($this->NM_ajax_info['select_html']['id_a']) && !empty($this->NM_ajax_info['select_html']['id_a']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_a'];
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

                  if ($this->id_a == $sValue)
                  {
                      $this->_tmp_lookup_id_a = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_a'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_a']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_a']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_a']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_a']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_a']['labList'] = $aLabel;
          }
   }

          //----- id_condominos
   function ajax_return_values_id_condominos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_condominos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_condominos);
              $aLookup = array();
              $this->_tmp_lookup_id_condominos = $this->id_condominos;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'] = array(); 
}
$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('') => form_CadastrodeProjetos_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'][] = '';
if ($this->id_empreendimento != "")
{ 
   $this->nm_clear_val("id_empreendimento");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID_Condomino, Nom_Nome 
FROM tb_condominos 
WHERE ID_Empreendimento = '$this->id_empreendimento' AND Num_Ativo = 'S' 
ORDER BY Nom_Nome";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_condominos\"";
          if (isset($this->NM_ajax_info['select_html']['id_condominos']) && !empty($this->NM_ajax_info['select_html']['id_condominos']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_condominos'];
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

                  if ($this->id_condominos == $sValue)
                  {
                      $this->_tmp_lookup_id_condominos = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_condominos'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_condominos']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_condominos']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_condominos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_condominos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_condominos']['labList'] = $aLabel;
          }
   }

          //----- id_operadora
   function ajax_return_values_id_operadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_operadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_operadora);
              $aLookup = array();
              $this->_tmp_lookup_id_operadora = $this->id_operadora;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'] = array(); 
}
$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('') => form_CadastrodeProjetos_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT a.ID_Operadoras, a.Nom_Operadoras 
FROM tb_operadoras a 
" . $_SESSION['form_CadastroDeProjetos_sql_ope'] . " 
ORDER BY a.Nom_Operadoras";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_operadora\"";
          if (isset($this->NM_ajax_info['select_html']['id_operadora']) && !empty($this->NM_ajax_info['select_html']['id_operadora']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_operadora'];
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

                  if ($this->id_operadora == $sValue)
                  {
                      $this->_tmp_lookup_id_operadora = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_operadora'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_operadora']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_operadora']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_operadora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_operadora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_operadora']['labList'] = $aLabel;
          }
   }

          //----- id_prestadora
   function ajax_return_values_id_prestadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_prestadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_prestadora);
              $aLookup = array();
              $this->_tmp_lookup_id_prestadora = $this->id_prestadora;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'] = array(); 
}
$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('') => form_CadastrodeProjetos_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT b.ID_Prestador, b.Nom_RazaoSocial 
FROM tb_infoprestadores a 
INNER JOIN tb_prestadores b ON b.ID_Prestador = a.ID_Prestador AND b.Num_Ativo = 'S' 
" . $_SESSION['form_CadastroDeProjetos_sql_pre'] . " 
Group BY a.ID_Prestador";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastrodeProjetos_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_prestadora\"";
          if (isset($this->NM_ajax_info['select_html']['id_prestadora']) && !empty($this->NM_ajax_info['select_html']['id_prestadora']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_prestadora'];
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

                  if ($this->id_prestadora == $sValue)
                  {
                      $this->_tmp_lookup_id_prestadora = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_prestadora'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_prestadora']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_prestadora']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_prestadora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_prestadora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_prestadora']['labList'] = $aLabel;
          }
   }

          //----- id_usuariocriacao
   function ajax_return_values_id_usuariocriacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_usuariocriacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_usuariocriacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_usuariocriacao'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- num_totvs
   function ajax_return_values_num_totvs($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_totvs", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_totvs);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_totvs'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- historicostatus
   function ajax_return_values_historicostatus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("historicostatus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->historicostatus);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['historicostatus'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- protocolohex
   function ajax_return_values_protocolohex($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("protocolohex", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->protocolohex);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['protocolohex'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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

          //----- concluirprojeto
   function ajax_return_values_concluirprojeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("concluirprojeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->concluirprojeto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['concluirprojeto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- retomarprojeto
   function ajax_return_values_retomarprojeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("retomarprojeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->retomarprojeto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['retomarprojeto'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- memorialdescritivopronto
   function ajax_return_values_memorialdescritivopronto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("memorialdescritivopronto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->memorialdescritivopronto);
              $aLookup = array();
              $this->_tmp_lookup_memorialdescritivopronto = $this->memorialdescritivopronto;

$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('S') => form_CadastrodeProjetos_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_memorialdescritivopronto'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['memorialdescritivopronto']) && !empty($this->NM_ajax_info['select_html']['memorialdescritivopronto']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['memorialdescritivopronto'];
          }
          $this->NM_ajax_info['fldList']['memorialdescritivopronto'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-memorialdescritivopronto',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['memorialdescritivopronto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['memorialdescritivopronto']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['memorialdescritivopronto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['memorialdescritivopronto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['memorialdescritivopronto']['labList'] = $aLabel;
          }
   }

          //----- relatoriofotograficopronto
   function ajax_return_values_relatoriofotograficopronto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("relatoriofotograficopronto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->relatoriofotograficopronto);
              $aLookup = array();
              $this->_tmp_lookup_relatoriofotograficopronto = $this->relatoriofotograficopronto;

$aLookup[] = array(form_CadastrodeProjetos_pack_protect_string('S') => form_CadastrodeProjetos_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_relatoriofotograficopronto'][] = 'S';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['relatoriofotograficopronto']) && !empty($this->NM_ajax_info['select_html']['relatoriofotograficopronto']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['relatoriofotograficopronto'];
          }
          $this->NM_ajax_info['fldList']['relatoriofotograficopronto'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-relatoriofotograficopronto',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['relatoriofotograficopronto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['relatoriofotograficopronto']['valList'][$i] = form_CadastrodeProjetos_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['relatoriofotograficopronto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['relatoriofotograficopronto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['relatoriofotograficopronto']['labList'] = $aLabel;
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_form_CadastroDeProjetos_sql_pre)) {$this->sc_temp_form_CadastroDeProjetos_sql_pre = (isset($_SESSION['form_CadastroDeProjetos_sql_pre'])) ? $_SESSION['form_CadastroDeProjetos_sql_pre'] : "";}
if (!isset($this->sc_temp_form_CadastroDeProjetos_sql_ope)) {$this->sc_temp_form_CadastroDeProjetos_sql_ope = (isset($_SESSION['form_CadastroDeProjetos_sql_ope'])) ? $_SESSION['form_CadastroDeProjetos_sql_ope'] : "";}
                               ?><?php sc_include_library('sys', 'initCustom', 'onLoad.html'); ?><?php
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['confirmeRetomarProjeto'] = $this->nmgp_botoes["confirmeRetomarProjeto"] = "off";;
$this->nmgp_cmp_hidden["retomarprojeto"] = "off"; $this->NM_ajax_info['fieldDisplay']['retomarprojeto'] = 'off';

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession(true);
echo $s->getMessage(true);
echo $s->getIUDState($this);
sc_include_library("sys", "models", "Config.php");
$_Config = new Config($this);
$configToleranceToExpire = $_Config->getByKey("routine_chkProjetosValidade::ToleranceToExpire");
if ($this->data_criacao ) {
	$this->label_dataexpiracao  = date("d/m/Y", strtotime("+$configToleranceToExpire days", strtotime($this->data_criacao )));
} else {
	$this->label_dataexpiracao  = date("d/m/Y", strtotime("+$configToleranceToExpire days", strtotime("now")));
}

if (!in_array($s->get('Num_TipoUsuario'), ["G", "GT"])) {
	$this->nmgp_cmp_hidden["num_totvs"] = "off"; $this->NM_ajax_info['fieldDisplay']['num_totvs'] = 'off';
}



$profile = $s->get("profile");
$ID_OPE = $s->get('ID_OPE');
$TipoUsuario =  $s->get('Num_TipoUsuario');
$Contexto_Tipo = $s->get('Contexto_Tipo');
$Contexto_ID_OPE = $s->get('Contexto_ID_OPE');

$TipoDeProjeto = DbQuery($this, "SELECT Code, RequirePopAntenario FROM tb_projetostipos WHERE ID_ProjetoTipo = '$this->id_tipoprojeto'");

if ($TipoUsuario == 'G' || $TipoUsuario == 'GT') {
	$form_CadastroDeProjetos_sql_ope = "WHERE a.ID_Operadoras AND a.Num_Status = 'S'";
    $form_CadastroDeProjetos_sql_pre = "WHERE b.ID_Prestador AND a.Num_Ativo = 'S' ";
	
	
} elseif ($TipoUsuario == 'O') {
	$this->sc_field_readonly("id_operadora", 'on');
	if ($this->nmgp_opcao == "novo") {
		$this->id_operadora  = $ID_OPE;
	}
	$form_CadastroDeProjetos_sql_ope = "WHERE a.ID_Operadoras = '$this->id_operadora'"; 
    $form_CadastroDeProjetos_sql_pre = "WHERE a.ID_Operadora = '$this->id_operadora' AND a.Num_Ativo = 'S'";
} elseif ($TipoUsuario == 'P') {
	$this->sc_field_readonly("id_prestadora", 'on');
	if ($this->nmgp_opcao == "novo") {
		$this->id_prestadora  = $ID_OPE;
	}
	$form_CadastroDeProjetos_sql_ope = "INNER JOIN tb_infoprestadores b ON b.ID_Operadora = a.ID_Operadoras
        WHERE b.ID_Prestador = '$this->id_prestadora' AND a.Num_Status = 'S' AND (('G' = '$Contexto_Tipo') OR ('O' = '$Contexto_Tipo' AND b.ID_Operadora = '$Contexto_ID_OPE'))";
    $form_CadastroDeProjetos_sql_pre = "WHERE b.ID_Prestador = '$this->id_prestadora' ";
} else {
    $form_CadastroDeProjetos_sql_ope = 'WHERE false ';
    $form_CadastroDeProjetos_sql_pre = "WHERE false ";
}

 if (isset($form_CadastroDeProjetos_sql_ope)) {$this->sc_temp_form_CadastroDeProjetos_sql_ope = $form_CadastroDeProjetos_sql_ope;}
;
 if (isset($form_CadastroDeProjetos_sql_pre)) {$this->sc_temp_form_CadastroDeProjetos_sql_pre = $form_CadastroDeProjetos_sql_pre;}
;
	
$tipoAntena = $this->laudoradiometrico  ? $this->laudoradiometrico  : 'N';
if ($tipoAntena == 'N') {
	$this->instalacaodeantena  = 'N';
	$this->nmgp_cmp_hidden["laudoradiometrico"] = "off"; $this->NM_ajax_info['fieldDisplay']['laudoradiometrico'] = 'off';
} else {
	$this->instalacaodeantena  = 'S';
}
if ($this->tipo_pa  == 'P') {
	$this->id_p  = $this->id_pa ;
} else {
	$this->id_a  = $this->id_pa ;
}


$whereID_ProjetoTipo = $this->id_tipoprojeto  ? "= '$this->id_tipoprojeto'" : "like '%'";
 
      $nm_select = "SELECT RequirePopAntenario FROM tb_projetostipos WHERE ID_ProjetoTipo $whereID_ProjetoTipo"; 
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

if ($this->rs [0]["RequirePopAntenario"] == 'N') {
	$this->nmgp_cmp_hidden["id_p"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'off';
	$this->nmgp_cmp_hidden["id_a"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'off';
	$this->nmgp_cmp_hidden["tipo_pa"] = "off"; $this->NM_ajax_info['fieldDisplay']['tipo_pa'] = 'off';
} else {
	$this->nmgp_cmp_hidden["tipo_pa"] = "on"; $this->NM_ajax_info['fieldDisplay']['tipo_pa'] = 'on';
	if ($this->tipo_pa  == 'P') {
		$this->nmgp_cmp_hidden["id_p"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'on';
		$this->nmgp_cmp_hidden["id_a"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'off';
	} else {
		$this->nmgp_cmp_hidden["id_p"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'off';
		$this->nmgp_cmp_hidden["id_a"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'on';
	}
}

$projetoStatus = false;
if ($this->nmgp_opcao == "novo") {
	$this->nmgp_cmp_hidden["historicostatus"] = "off"; $this->NM_ajax_info['fieldDisplay']['historicostatus'] = 'off';
	$this->nmgp_cmp_hidden["tipo_pa"] = "off"; $this->NM_ajax_info['fieldDisplay']['tipo_pa'] = 'off';
	$this->nmgp_cmp_hidden["id_p"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'off';
	$this->nmgp_cmp_hidden["id_a"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'off';
	$this->nmgp_cmp_hidden["id_condominos"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_condominos'] = 'off';
	$this->nmgp_cmp_hidden["data_criacao"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_criacao'] = 'off';
	$this->nmgp_cmp_hidden["label_dataexpiracao"] = "off"; $this->NM_ajax_info['fieldDisplay']['label_dataexpiracao'] = 'off';
	
	$this->num_ativo  = 'S';
	$this->observacoes  = "Projeto de instalação ao cliente \"Nome do Cliente\". O projeto refere-se a \"Breve descrição das atividades do projeto\".";
	
	if (($profile["PROJETO"]["FORCEUPMEMORIALDESC"]["v"] ?? "N") == "S") {
		$this->sc_ajax_javascript('nm_field_disabled', array("memorialdescritivopronto=disabled", ""));
;
		$this->memorialdescritivopronto  = "S";
	}
	if (($profile["PROJETO"]["FORCEUPRELFOTOGRAFICO"]["v"] ?? "N") == "S") {
		$this->sc_ajax_javascript('nm_field_disabled', array("relatoriofotograficopronto=disabled", ""));
;
		$this->relatoriofotograficopronto  = "S";
	}
} else {
$this->disableAll();
	$this->historicostatus  =$this->getHistoricoStatus();
	$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['concluirProjeto'] = $this->nmgp_botoes["concluirProjeto"] = "off";;
	$projetoStatus =$this->getStatusProjeto();
	$owner =$this->getOwner();
	if ($projetoStatus) {
		if ($projetoStatus["Code"] == "aguardando_envio" && $owner["isOwner"]) {
			$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "on";;
		}
		if (in_array($projetoStatus["Code"], ['projeto_expirado']) && $owner["isOwner"]) {
			$this->NM_ajax_info['buttonDisplay']['confirmeRetomarProjeto'] = $this->nmgp_botoes["confirmeRetomarProjeto"] = "on";;			
		}
		if ($projetoStatus["Code"] == "projeto_aprovado") {
			$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "on";;
		}
	}

	if ($TipoDeProjeto[0]["Code"] == "abordagem") {
		$this->id_condominos  = 0;
		$this->nmgp_cmp_hidden["id_condominos"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_condominos'] = 'off';
	} else {
		$this->nmgp_cmp_hidden["id_condominos"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_condominos'] = 'on';
	}
}

if ($TipoUsuario == "E") {
	$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
	$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
} elseif (isset($profile["PROJETO"])) {
	if ($this->nmgp_opcao == "novo" && isset($profile["PROJETO"]["CRIAR"]["v"]) && $profile["PROJETO"]["CRIAR"]["v"] == "S") {
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "on";;
	} else {
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
	}
	
	if ($this->nmgp_opcao != "novo" && isset($profile["PROJETO"]["DELETAR"]["v"]) && $profile["PROJETO"]["DELETAR"]["v"] == "S") {
		$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
		if ($projetoStatus) {
			if ($projetoStatus["Code"] == "aguardando_envio") {
				$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "on";;
			}
		}
	} else {
		$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
	}
	
	if (isset($profile["PROJETO"]["SUBMITSTATUS"]["v"]) && $profile["PROJETO"]["SUBMITSTATUS"]["v"] == "S") {
		if ($projetoStatus) {
			if ($projetoStatus["Code"] == "projeto_aprovado") {
				$this->NM_ajax_info['buttonDisplay']['concluirProjeto'] = $this->nmgp_botoes["concluirProjeto"] = "on";;
			}
		}
	} else {
	}
}

$crumb = [ $this->Ini->Nm_lang['lang_menu_projects'] ];
if ($this->nmgp_opcao == "novo") {
	$crumb[1] = "<i>". $this->Ini->Nm_lang['lang_label_newproject'] ."</i>";
} else if ($this->nmgp_opcao == "igual") {
	$crumb[1] = $this->protocolohex ;
}

echo "
	<script>loadBreadcrumb(['".$crumb[0]."','".$crumb[1]."']);</script>
	";
$this->onLoadJS();
if (isset($this->sc_temp_form_CadastroDeProjetos_sql_ope)) { $_SESSION['form_CadastroDeProjetos_sql_ope'] = $this->sc_temp_form_CadastroDeProjetos_sql_ope;}
if (isset($this->sc_temp_form_CadastroDeProjetos_sql_pre)) { $_SESSION['form_CadastroDeProjetos_sql_pre'] = $this->sc_temp_form_CadastroDeProjetos_sql_pre;}
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
      }
      if (empty($this->data_criacao))
      {
          $this->data_criacao_hora = $this->data_criacao;
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
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               sc_include_library('sys', 'functions', 'functions.php');
$this->id_usuariocriacao  = isset($_SESSION['ID_Usuario']) ? $_SESSION['ID_Usuario'] : 0;
$e = true;
$rdmProtocol = '';
while($e) {
	$rdmProtocol = randomStr(12,'hex');
	 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "SELECT * FROM tb_projetos WHERE ProtocoloHex = '$rdmProtocol'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "SELECT * FROM tb_projetos WHERE ProtocoloHex = '$rdmProtocol'"; 
      }
      else
      { 
          $nm_select = "SELECT * FROM tb_projetos WHERE ProtocoloHex = '$rdmProtocol'"; 
      }
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
                 $rx->fields[2] = str_replace(',', '.', $rx->fields[2]);
                 $rx->fields[3] = str_replace(',', '.', $rx->fields[3]);
                 $rx->fields[4] = str_replace(',', '.', $rx->fields[4]);
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]);
                 $rx->fields[11] = str_replace(',', '.', $rx->fields[11]);
                 $rx->fields[13] = str_replace(',', '.', $rx->fields[13]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 $rx->fields[1] = (strpos(strtolower($rx->fields[1]), "e")) ? (float)$rx->fields[1] : $rx->fields[1];
                 $rx->fields[1] = (string)$rx->fields[1];
                 $rx->fields[2] = (strpos(strtolower($rx->fields[2]), "e")) ? (float)$rx->fields[2] : $rx->fields[2];
                 $rx->fields[2] = (string)$rx->fields[2];
                 $rx->fields[3] = (strpos(strtolower($rx->fields[3]), "e")) ? (float)$rx->fields[3] : $rx->fields[3];
                 $rx->fields[3] = (string)$rx->fields[3];
                 $rx->fields[4] = (strpos(strtolower($rx->fields[4]), "e")) ? (float)$rx->fields[4] : $rx->fields[4];
                 $rx->fields[4] = (string)$rx->fields[4];
                 $rx->fields[5] = (strpos(strtolower($rx->fields[5]), "e")) ? (float)$rx->fields[5] : $rx->fields[5];
                 $rx->fields[5] = (string)$rx->fields[5];
                 $rx->fields[11] = (strpos(strtolower($rx->fields[11]), "e")) ? (float)$rx->fields[11] : $rx->fields[11];
                 $rx->fields[11] = (string)$rx->fields[11];
                 $rx->fields[13] = (strpos(strtolower($rx->fields[13]), "e")) ? (float)$rx->fields[13] : $rx->fields[13];
                 $rx->fields[13] = (string)$rx->fields[13];
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
	if(!isset($this->rs[0][0])) {
		$e = false;
	}
}
$this->protocolohex  = $rdmProtocol;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               sc_include_library("sys", "functions", "functions.php");

$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                                           /* tb_analises */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_analises WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_analises WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_analises WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_analises WHERE ID_Projeto = " . $this->id_projeto ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_analises WHERE ID_Projeto = " . $this->id_projeto ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_analises = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_analises[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_analises = false;
          $this->dataset_tb_analises_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_analises[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadastrodeProjetos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tb_inc */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_inc WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_inc WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_inc WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_inc WHERE ID_Projeto = " . $this->id_projeto ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_inc WHERE ID_Projeto = " . $this->id_projeto ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_inc = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_inc[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_inc = false;
          $this->dataset_tb_inc_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_inc[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadastrodeProjetos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tb_projetosdocumentos */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetosdocumentos WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetosdocumentos WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetosdocumentos WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetosdocumentos WHERE ID_Projeto = " . $this->id_projeto ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetosdocumentos WHERE ID_Projeto = " . $this->id_projeto ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_projetosdocumentos = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_projetosdocumentos[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_projetosdocumentos = false;
          $this->dataset_tb_projetosdocumentos_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_projetosdocumentos[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadastrodeProjetos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tb_projetositens */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetositens WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetositens WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetositens WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetositens WHERE ID_Projeto = " . $this->id_projeto ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetositens WHERE ID_Projeto = " . $this->id_projeto ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_projetositens = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_projetositens[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_projetositens = false;
          $this->dataset_tb_projetositens_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_projetositens[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadastrodeProjetos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tp_projetosacompanhamento */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tp_projetosacompanhamento WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tp_projetosacompanhamento WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tp_projetosacompanhamento WHERE ID_Projeto = " . $this->id_projeto ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tp_projetosacompanhamento WHERE ID_Projeto = " . $this->id_projeto ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tp_projetosacompanhamento WHERE ID_Projeto = " . $this->id_projeto ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tp_projetosacompanhamento = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tp_projetosacompanhamento[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tp_projetosacompanhamento = false;
          $this->dataset_tp_projetosacompanhamento_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tp_projetosacompanhamento[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadastrodeProjetos' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
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
      $NM_val_form['data_criacao'] = $this->data_criacao;
      $NM_val_form['label_dataexpiracao'] = $this->label_dataexpiracao;
      $NM_val_form['id_empreendimento'] = $this->id_empreendimento;
      $NM_val_form['id_tipoprojeto'] = $this->id_tipoprojeto;
      $NM_val_form['id_projeto'] = $this->id_projeto;
      $NM_val_form['instalacaodeantena'] = $this->instalacaodeantena;
      $NM_val_form['laudoradiometrico'] = $this->laudoradiometrico;
      $NM_val_form['tipo_pa'] = $this->tipo_pa;
      $NM_val_form['id_pa'] = $this->id_pa;
      $NM_val_form['id_p'] = $this->id_p;
      $NM_val_form['id_a'] = $this->id_a;
      $NM_val_form['id_condominos'] = $this->id_condominos;
      $NM_val_form['id_operadora'] = $this->id_operadora;
      $NM_val_form['id_prestadora'] = $this->id_prestadora;
      $NM_val_form['id_usuariocriacao'] = $this->id_usuariocriacao;
      $NM_val_form['num_totvs'] = $this->num_totvs;
      $NM_val_form['historicostatus'] = $this->historicostatus;
      $NM_val_form['protocolohex'] = $this->protocolohex;
      $NM_val_form['observacoes'] = $this->observacoes;
      $NM_val_form['num_ativo'] = $this->num_ativo;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['removeronclick'] = $this->removeronclick;
      $NM_val_form['concluirprojeto'] = $this->concluirprojeto;
      $NM_val_form['retomarprojeto'] = $this->retomarprojeto;
      $NM_val_form['memorialdescritivopronto'] = $this->memorialdescritivopronto;
      $NM_val_form['relatoriofotograficopronto'] = $this->relatoriofotograficopronto;
      if ($this->id_projeto == "")  
      { 
          $this->id_projeto = 0;
      } 
      if ($this->id_tipoprojeto == "")  
      { 
          $this->id_tipoprojeto = 0;
          $this->sc_force_zero[] = 'id_tipoprojeto';
      } 
      if ($this->id_empreendimento == "")  
      { 
          $this->id_empreendimento = 0;
          $this->sc_force_zero[] = 'id_empreendimento';
      } 
      if ($this->id_condominos == "")  
      { 
          $this->id_condominos = 0;
          $this->sc_force_zero[] = 'id_condominos';
      } 
      if ($this->id_usuariocriacao == "")  
      { 
          $this->id_usuariocriacao = 0;
          $this->sc_force_zero[] = 'id_usuariocriacao';
      } 
      if ($this->id_operadora == "")  
      { 
          $this->id_operadora = 0;
          $this->sc_force_zero[] = 'id_operadora';
      } 
      if ($this->id_prestadora == "")  
      { 
          $this->id_prestadora = 0;
          $this->sc_force_zero[] = 'id_prestadora';
      } 
      if ($this->id_pa == "")  
      { 
          $this->id_pa = 0;
          $this->sc_force_zero[] = 'id_pa';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->data_criacao == "")  
          { 
              $this->data_criacao = "null"; 
              $NM_val_null[] = "data_criacao";
          } 
          $this->num_totvs_before_qstr = $this->num_totvs;
          $this->num_totvs = substr($this->Db->qstr($this->num_totvs), 1, -1); 
          if ($this->num_totvs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_totvs = "null"; 
              $NM_val_null[] = "num_totvs";
          } 
          $this->laudoradiometrico_before_qstr = $this->laudoradiometrico;
          $this->laudoradiometrico = substr($this->Db->qstr($this->laudoradiometrico), 1, -1); 
          if ($this->laudoradiometrico == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->laudoradiometrico = "null"; 
              $NM_val_null[] = "laudoradiometrico";
          } 
          $this->protocolohex_before_qstr = $this->protocolohex;
          $this->protocolohex = substr($this->Db->qstr($this->protocolohex), 1, -1); 
          if ($this->protocolohex == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->protocolohex = "null"; 
              $NM_val_null[] = "protocolohex";
          } 
          $this->observacoes_before_qstr = $this->observacoes;
          $this->observacoes = substr($this->Db->qstr($this->observacoes), 1, -1); 
          if ($this->observacoes == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->observacoes = "null"; 
              $NM_val_null[] = "observacoes";
          } 
          if ($this->num_ativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_ativo = "null"; 
              $NM_val_null[] = "num_ativo";
          } 
          if ($this->tipo_pa == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_pa = "null"; 
              $NM_val_null[] = "tipo_pa";
          } 
          if ($this->memorialdescritivopronto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->memorialdescritivopronto = "null"; 
              $NM_val_null[] = "memorialdescritivopronto";
          } 
          if ($this->relatoriofotograficopronto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->relatoriofotograficopronto = "null"; 
              $NM_val_null[] = "relatoriofotograficopronto";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_CadastrodeProjetos_pack_ajax_response();
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = #$this->data_criacao#, Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = EXTEND('$this->data_criacao', YEAR TO FRACTION), Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoProjeto = $this->id_tipoprojeto, ID_Empreendimento = $this->id_empreendimento, ID_Condominos = $this->id_condominos, ID_UsuarioCriacao = $this->id_usuariocriacao, ID_Operadora = $this->id_operadora, Data_Criacao = " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", Num_TOTVS = '$this->num_totvs', LaudoRadiometrico = '$this->laudoradiometrico', ProtocoloHex = '$this->protocolohex', Observacoes = '$this->observacoes', ID_Prestadora = $this->id_prestadora, Num_Ativo = '$this->num_ativo', ID_PA = $this->id_pa, Tipo_PA = '$this->tipo_pa', MemorialDescritivoPronto = '$this->memorialdescritivopronto', RelatorioFotograficoPronto = '$this->relatoriofotograficopronto'";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE ID_projeto = $this->id_projeto ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ID_projeto = $this->id_projeto ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ID_projeto = $this->id_projeto ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ID_projeto = $this->id_projeto ";  
              }  
              else  
              {
                  $comando .= " WHERE ID_projeto = $this->id_projeto ";  
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
                                  form_CadastrodeProjetos_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->num_totvs = $this->num_totvs_before_qstr;
          $this->laudoradiometrico = $this->laudoradiometrico_before_qstr;
          $this->protocolohex = $this->protocolohex_before_qstr;
          $this->observacoes = $this->observacoes_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id_projeto'])) { $this->id_projeto = $NM_val_form['id_projeto']; }
              elseif (isset($this->id_projeto)) { $this->nm_limpa_alfa($this->id_projeto); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_tipoprojeto'])) { $this->id_tipoprojeto = $NM_val_form['id_tipoprojeto']; }
              elseif (isset($this->id_tipoprojeto)) { $this->nm_limpa_alfa($this->id_tipoprojeto); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_empreendimento'])) { $this->id_empreendimento = $NM_val_form['id_empreendimento']; }
              elseif (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_condominos'])) { $this->id_condominos = $NM_val_form['id_condominos']; }
              elseif (isset($this->id_condominos)) { $this->nm_limpa_alfa($this->id_condominos); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_usuariocriacao'])) { $this->id_usuariocriacao = $NM_val_form['id_usuariocriacao']; }
              elseif (isset($this->id_usuariocriacao)) { $this->nm_limpa_alfa($this->id_usuariocriacao); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_operadora'])) { $this->id_operadora = $NM_val_form['id_operadora']; }
              elseif (isset($this->id_operadora)) { $this->nm_limpa_alfa($this->id_operadora); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_totvs'])) { $this->num_totvs = $NM_val_form['num_totvs']; }
              elseif (isset($this->num_totvs)) { $this->nm_limpa_alfa($this->num_totvs); }
              if     (isset($NM_val_form) && isset($NM_val_form['laudoradiometrico'])) { $this->laudoradiometrico = $NM_val_form['laudoradiometrico']; }
              elseif (isset($this->laudoradiometrico)) { $this->nm_limpa_alfa($this->laudoradiometrico); }
              if     (isset($NM_val_form) && isset($NM_val_form['protocolohex'])) { $this->protocolohex = $NM_val_form['protocolohex']; }
              elseif (isset($this->protocolohex)) { $this->nm_limpa_alfa($this->protocolohex); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_prestadora'])) { $this->id_prestadora = $NM_val_form['id_prestadora']; }
              elseif (isset($this->id_prestadora)) { $this->nm_limpa_alfa($this->id_prestadora); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_pa'])) { $this->id_pa = $NM_val_form['id_pa']; }
              elseif (isset($this->id_pa)) { $this->nm_limpa_alfa($this->id_pa); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('data_criacao', 'label_dataexpiracao', 'id_empreendimento', 'id_tipoprojeto', 'id_projeto', 'instalacaodeantena', 'laudoradiometrico', 'tipo_pa', 'id_pa', 'id_p', 'id_a', 'id_condominos', 'id_operadora', 'id_prestadora', 'id_usuariocriacao', 'num_totvs', 'historicostatus', 'protocolohex', 'observacoes', 'num_ativo', 'savedataonclick', 'removeronclick', 'concluirprojeto', 'retomarprojeto', 'memorialdescritivopronto', 'relatoriofotograficopronto'), $aDoNotUpdate);
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "ID_projeto, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastrodeProjetos_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto) VALUES ($this->id_tipoprojeto, $this->id_empreendimento, $this->id_condominos, $this->id_usuariocriacao, $this->id_operadora, #$this->data_criacao#, '$this->num_totvs', '$this->laudoradiometrico', '$this->protocolohex', '$this->observacoes', $this->id_prestadora, '$this->num_ativo', $this->id_pa, '$this->tipo_pa', '$this->memorialdescritivopronto', '$this->relatoriofotograficopronto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto) VALUES (" . $NM_seq_auto . "$this->id_tipoprojeto, $this->id_empreendimento, $this->id_condominos, $this->id_usuariocriacao, $this->id_operadora, " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", '$this->num_totvs', '$this->laudoradiometrico', '$this->protocolohex', '$this->observacoes', $this->id_prestadora, '$this->num_ativo', $this->id_pa, '$this->tipo_pa', '$this->memorialdescritivopronto', '$this->relatoriofotograficopronto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto) VALUES (" . $NM_seq_auto . "$this->id_tipoprojeto, $this->id_empreendimento, $this->id_condominos, $this->id_usuariocriacao, $this->id_operadora, " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", '$this->num_totvs', '$this->laudoradiometrico', '$this->protocolohex', '$this->observacoes', $this->id_prestadora, '$this->num_ativo', $this->id_pa, '$this->tipo_pa', '$this->memorialdescritivopronto', '$this->relatoriofotograficopronto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto) VALUES (" . $NM_seq_auto . "$this->id_tipoprojeto, $this->id_empreendimento, $this->id_condominos, $this->id_usuariocriacao, $this->id_operadora, EXTEND('$this->data_criacao', YEAR TO FRACTION), '$this->num_totvs', '$this->laudoradiometrico', '$this->protocolohex', '$this->observacoes', $this->id_prestadora, '$this->num_ativo', $this->id_pa, '$this->tipo_pa', '$this->memorialdescritivopronto', '$this->relatoriofotograficopronto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto) VALUES (" . $NM_seq_auto . "$this->id_tipoprojeto, $this->id_empreendimento, $this->id_condominos, $this->id_usuariocriacao, $this->id_operadora, " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", '$this->num_totvs', '$this->laudoradiometrico', '$this->protocolohex', '$this->observacoes', $this->id_prestadora, '$this->num_ativo', $this->id_pa, '$this->tipo_pa', '$this->memorialdescritivopronto', '$this->relatoriofotograficopronto')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto) VALUES (" . $NM_seq_auto . "$this->id_tipoprojeto, $this->id_empreendimento, $this->id_condominos, $this->id_usuariocriacao, $this->id_operadora, " . $this->Ini->date_delim . $this->data_criacao . $this->Ini->date_delim1 . ", '$this->num_totvs', '$this->laudoradiometrico', '$this->protocolohex', '$this->observacoes', $this->id_prestadora, '$this->num_ativo', $this->id_pa, '$this->tipo_pa', '$this->memorialdescritivopronto', '$this->relatoriofotograficopronto')"; 
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
                              form_CadastrodeProjetos_pack_ajax_response();
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
                          form_CadastrodeProjetos_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_projeto =  $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
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
                  $this->id_projeto = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['return_edit'] = "new";
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
          $this->id_projeto = substr($this->Db->qstr($this->id_projeto), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
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
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
              }  
              else  
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_projeto = $this->id_projeto "); 
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
                          form_CadastrodeProjetos_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']);
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
        $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_projeto)) {$this->sc_temp_ID_projeto = (isset($_SESSION['ID_projeto'])) ? $_SESSION['ID_projeto'] : "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
                               sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();
$id_Projeto = $this->id_projeto ;
$ID_projeto = $this->id_projeto ;
 if (isset($id_Projeto)) {$this->sc_temp_id_Projeto = $id_Projeto;}
;
 if (isset($ID_projeto)) {$this->sc_temp_ID_projeto = $ID_projeto;}
;

$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "CRIAR",
	"Descricao" => 'Cadastro de projeto',
	"Conteudo" => $modelLogs->getConteudo()
]);

$itensSQL = "SELECT
    tb_projetositens.ID_Item as ID_Projetoitens
FROM
    tb_projetositens 
INNER JOIN tb_itens ON tb_projetositens.ID_Item = tb_itens.ID_Item
WHERE 
	(tb_projetositens.Dep_LaudoRadiometrico = 'N' OR (tb_projetositens.Dep_LaudoRadiometrico = 'S' AND ('$this->laudoradiometrico' = 'transmissora' OR '$this->laudoradiometrico' = 'receptora_transmissora'))) AND
	tb_projetositens.ID_TipoProjeto = $this->id_tipoprojeto ";
 
      $nm_select = $itensSQL; 
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
if (count($this->rs )) {
	foreach($this->rs  as $itens) {
		$sql = "INSERT INTO tb_projetoitensanalise (ID_Projeto, ID_Projetoitens, Num_Status) VALUES ($id_Projeto, ".$itens['ID_Projetoitens'].", 'N')";
		 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rrs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->rrs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rrs = false;
          $this->rrs_erro = $this->Db->ErrorMsg();
      } 
;
	}
}
$ID_Usuario = $s->get("ID_Usuario");
$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data) Values ($id_Projeto, 'aguardando_envio', $ID_Usuario, '".date('Y-m-d H:i:s')."')";
 
      $nm_select = $statusSql; 
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

$m = new sendEmail();

 
      $nm_select = "SELECT ID_ProjetoTipo, Nom_ProjetoTipo FROM tb_projetostipos WHERE ID_ProjetoTipo = '$this->id_tipoprojeto'"; 
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
$listEmails =$this->getEmailNotif();

if ($this->tprojeto ) {
	$emailData = [
		"alert" => "good",
		"title" => "PROJETO <strong>$this->protocolohex </strong><br>CRIADO",
		"content" => "
			<p>Prezado(a),</p>
			<p>Foi iniciado o ".($this->tprojeto ["Nom_ProjetoTipo"])." através do código <strong>".$this->protocolohex ."</strong>.</p>
			<p>No momento encontra-se \"<u>Pendente a Inclusão de Documento</u>\" e o \"<u>envio para análise</u>\" da GLOBALBLUE.</p>
			<p>Favor verificar o mais breve possível, a fim de não prejudicar o cliente final.</p>
			<p>Assim que finalizar o Upload de todos os documentos, não esquecer de verificar o campo \"Editar o cabeçalho do Documento\", onde deve constar o número da ART e o logo da Operadora e Cliente (se houver).</p>
			<p>Após a inserção dessas informações clicar em \"Enviar Projeto para Análise\".</p>
			<p>Aguarde o retorno sobre o status do projeto.</p>
			:tableFooter:
		",
		"footer" => "
			<table style='width:100%'>
				<tr>
					<td style='width:50%;text-align:center;font-size: 9.0pt;
								line-height: 125%;
								font-family: \"Arial\",sans-serif;
								mso-fareast-font-family: \"Times New Roman\";
								color: #707070;'>
						PI = Projeto de Instalação Interna<br>
						Partindo da Sala POP ou Antenário até a sala do Cliente
					</td>
					<td style='width:50%;text-align:center;font-size: 9.0pt;
								line-height: 125%;
								font-family: \"Arial\",sans-serif;
								mso-fareast-font-family: \"Times New Roman\";
								color: #707070;'>
						PA = Projeto de Abordagem<br>
						Quando é instalado uma Antena (Base e Mastro) no topo do edifício, ou um cabo saindo da rua até a sala POP.
					</td>
				<tr>
			</table>
		"
	];

	$html = emailTemplate($emailData);
	$listEmails[] = "gabriel.soares@houseti.com.br";
	$m->BCC = $listEmails;
	$m->SUBJECT = "PROJETO $this->protocolohex  CRIADO";
	$m->MESSAGE = $html;
	$modelLogs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Descricao" => 'Notificação por e-mail (Projetos)',
		"Conteudo" => ["id_projeto" => $this->id_projeto , "ProtocoloHex" => $this->protocolohex , "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
	]);
}
$s->setIUDState("grid_ProjetoItens", "U", "success", "O código do protocolo do projeto é: <b>$this->protocolohex </b>");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_id_Projeto)) { $_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (isset($this->sc_temp_ID_projeto)) { $_SESSION['ID_projeto'] = $this->sc_temp_ID_projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->sc_temp_id_Projeto)) { $_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
if (isset($this->sc_temp_ID_projeto)) { $_SESSION['ID_projeto'] = $this->sc_temp_ID_projeto;}
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_reloadPage)) {$this->sc_temp_reloadPage = (isset($_SESSION['reloadPage'])) ? $_SESSION['reloadPage'] : "";}
                               sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de projeto',
	"Conteudo" => $modelLogs->getConteudo()
]);

if ($this->sc_temp_reloadPage) {
	$s->setIUDState("form_CadastrodeProjetos", "U", "success");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 unset($_SESSION['reloadPage']);
 unset($this->sc_temp_reloadPage);
;
	 if (isset($this->sc_temp_reloadPage)) { $_SESSION['reloadPage'] = $this->sc_temp_reloadPage;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadastrodeProjetos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}

$this->sc_ajax_javascript('toastr.success', array('',  $this->Ini->Nm_lang['lang_label_updSuccess'] ));
if (isset($this->sc_temp_reloadPage)) { $_SESSION['reloadPage'] = $this->sc_temp_reloadPage;}
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$s->setMessage("O projeto de protocolo: <b>$this->protocolohex </b> foi removido com sucesso.", null, "success");
$c = getConstants();
$idPrj = $this->id_projeto ;
if ($idPrj > 0) {
	foreach($c['itens'] as $item) {
		if(isset($item['tabela'])) {
			 
      $nm_select = "DELETE FROM ".$item['tabela']." WHERE ID_Projeto = $idPrj"; 
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
		}
	}
	 
      $nm_select = "DELETE FROM tb_files WHERE ID_Projeto = $idPrj"; 
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
	$path = realpath('../../../file/doc/'.$idPrj);
	if (is_dir($path)) {
		deleteDirectory($path);
	}
}
header('Location: ../grid_ConsultaDeProjetos');
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['parms'] = "id_projeto?#?$this->id_projeto?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_projeto = substr($this->Db->qstr($this->id_projeto), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID_projeto, ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, str_replace (convert(char(10),Data_Criacao,102), '.', '-') + ' ' + convert(char(8),Data_Criacao,20), Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID_projeto, ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, convert(char(23),Data_Criacao,121), Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID_projeto, ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID_projeto, ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, EXTEND(Data_Criacao, YEAR TO FRACTION), Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID_projeto, ID_TipoProjeto, ID_Empreendimento, ID_Condominos, ID_UsuarioCriacao, ID_Operadora, Data_Criacao, Num_TOTVS, LaudoRadiometrico, ProtocoloHex, Observacoes, ID_Prestadora, Num_Ativo, ID_PA, Tipo_PA, MemorialDescritivoPronto, RelatorioFotograficoPronto from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "ID_projeto = " . $_SESSION['ID_projeto'] . "";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "ID_projeto = $this->id_projeto"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "ID_projeto = $this->id_projeto"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "ID_projeto = $this->id_projeto"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "ID_projeto = $this->id_projeto"; 
                  }  
                  else  
                  {
                     $aWhere[] = "ID_projeto = $this->id_projeto"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ID_projeto";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter']))
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
                  $this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes['remover'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['concluirProjeto'] = $this->nmgp_botoes['concluirProjeto'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['confirmeRetomarProjeto'] = $this->nmgp_botoes['confirmeRetomarProjeto'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes['remover'] = "off";
              $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "on";
              $this->NM_ajax_info['buttonDisplay']['concluirProjeto'] = $this->nmgp_botoes['concluirProjeto'] = "off";
              $this->NM_ajax_info['buttonDisplay']['confirmeRetomarProjeto'] = $this->nmgp_botoes['confirmeRetomarProjeto'] = "off";
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
              $this->id_projeto = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_projeto'] = $this->id_projeto;
              $this->id_tipoprojeto = $rs->fields[1] ; 
              $this->nmgp_dados_select['id_tipoprojeto'] = $this->id_tipoprojeto;
              $this->id_empreendimento = $rs->fields[2] ; 
              $this->nmgp_dados_select['id_empreendimento'] = $this->id_empreendimento;
              $this->id_condominos = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_condominos'] = $this->id_condominos;
              $this->id_usuariocriacao = $rs->fields[4] ; 
              $this->nmgp_dados_select['id_usuariocriacao'] = $this->id_usuariocriacao;
              $this->id_operadora = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_operadora'] = $this->id_operadora;
              $this->data_criacao = $rs->fields[6] ; 
              if (substr($this->data_criacao, 10, 1) == "-") 
              { 
                 $this->data_criacao = substr($this->data_criacao, 0, 10) . " " . substr($this->data_criacao, 11);
              } 
              if (substr($this->data_criacao, 13, 1) == ".") 
              { 
                 $this->data_criacao = substr($this->data_criacao, 0, 13) . ":" . substr($this->data_criacao, 14, 2) . ":" . substr($this->data_criacao, 17);
              } 
              $this->nmgp_dados_select['data_criacao'] = $this->data_criacao;
              $this->num_totvs = $rs->fields[7] ; 
              $this->nmgp_dados_select['num_totvs'] = $this->num_totvs;
              $this->laudoradiometrico = $rs->fields[8] ; 
              $this->nmgp_dados_select['laudoradiometrico'] = $this->laudoradiometrico;
              $this->protocolohex = $rs->fields[9] ; 
              $this->nmgp_dados_select['protocolohex'] = $this->protocolohex;
              $this->observacoes = $rs->fields[10] ; 
              $this->nmgp_dados_select['observacoes'] = $this->observacoes;
              $this->id_prestadora = $rs->fields[11] ; 
              $this->nmgp_dados_select['id_prestadora'] = $this->id_prestadora;
              $this->num_ativo = $rs->fields[12] ; 
              $this->nmgp_dados_select['num_ativo'] = $this->num_ativo;
              $this->id_pa = $rs->fields[13] ; 
              $this->nmgp_dados_select['id_pa'] = $this->id_pa;
              $this->tipo_pa = $rs->fields[14] ; 
              $this->nmgp_dados_select['tipo_pa'] = $this->tipo_pa;
              $this->memorialdescritivopronto = $rs->fields[15] ; 
              $this->nmgp_dados_select['memorialdescritivopronto'] = $this->memorialdescritivopronto;
              $this->relatoriofotograficopronto = $rs->fields[16] ; 
              $this->nmgp_dados_select['relatoriofotograficopronto'] = $this->relatoriofotograficopronto;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_projeto = (string)$this->id_projeto; 
              $this->id_tipoprojeto = (string)$this->id_tipoprojeto; 
              $this->id_empreendimento = (string)$this->id_empreendimento; 
              $this->id_condominos = (string)$this->id_condominos; 
              $this->id_usuariocriacao = (string)$this->id_usuariocriacao; 
              $this->id_operadora = (string)$this->id_operadora; 
              $this->id_prestadora = (string)$this->id_prestadora; 
              $this->id_pa = (string)$this->id_pa; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['parms'] = "id_projeto?#?$this->id_projeto?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['reg_start'] < $qt_geral_reg_form_CadastrodeProjetos;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao']   = '';
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
              $this->id_projeto = "";  
              $this->id_tipoprojeto = "";  
              $this->id_empreendimento = "";  
              $this->id_condominos = "";  
              $this->id_usuariocriacao = "";  
              $this->id_operadora = "";  
              $this->data_criacao =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->data_criacao_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->num_totvs = "";  
              $this->laudoradiometrico = "";  
              $this->protocolohex = "";  
              $this->observacoes = "";  
              $this->id_prestadora = "";  
              $this->num_ativo = "";  
              $this->id_pa = "";  
              $this->tipo_pa = "";  
              $this->memorialdescritivopronto = "";  
              $this->relatoriofotograficopronto = "";  
              $this->id_a = "";  
              $this->id_p = "";  
              $this->instalacaodeantena = "";  
              $this->concluirprojeto = "";  
              $this->removeronclick = "";  
              $this->retomarprojeto = "";  
              $this->savedataonclick = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['foreign_key'] as $sFKName => $sFKValue)
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
function ID_TipoProjeto_onChange($id_condominos, $id_tipoprojeto, $observacoes)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_id_condominos = $this->id_condominos;
$original_id_p = $this->id_p;
$original_id_a = $this->id_a;
$original_tipo_pa = $this->tipo_pa;
$original_id_condominos = $this->id_condominos;
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_observacoes = $this->observacoes;

sc_include_library("sys", "functions", "functions.php");
 
      $nm_select = "SELECT Code, RequirePopAntenario FROM tb_projetostipos WHERE ID_ProjetoTipo = '$this->id_tipoprojeto'"; 
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


if ($this->rs [0]["Code"] == "abordagem") {
	$this->id_condominos  = 0;
	$this->nmgp_cmp_hidden["id_condominos"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_condominos'] = 'off';
} else {
	$this->nmgp_cmp_hidden["id_condominos"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_condominos'] = 'on';
}

if ($this->rs [0]["RequirePopAntenario"] == 'N') {
	$this->nmgp_cmp_hidden["id_p"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'off';
	$this->nmgp_cmp_hidden["id_a"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'off';
	$this->nmgp_cmp_hidden["tipo_pa"] = "off"; $this->NM_ajax_info['fieldDisplay']['tipo_pa'] = 'off';
} else {
	$this->nmgp_cmp_hidden["tipo_pa"] = "on"; $this->NM_ajax_info['fieldDisplay']['tipo_pa'] = 'on';
	if ($this->tipo_pa  == 'P') {
		$this->nmgp_cmp_hidden["id_p"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'on';
		$this->nmgp_cmp_hidden["id_a"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'off';
	} else {
		$this->nmgp_cmp_hidden["id_p"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'off';
		$this->nmgp_cmp_hidden["id_a"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'on';
	}
}

$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_id_condominos = $this->id_condominos;
$modificado_id_p = $this->id_p;
$modificado_id_a = $this->id_a;
$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_condominos = $this->id_condominos;
$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_observacoes = $this->observacoes;
$this->nm_formatar_campos('id_tipoprojeto', 'id_condominos', 'id_p', 'id_a', 'tipo_pa');
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function InstalacaoDeAntena_onClick($id_prestadora, $observacoes)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_instalacaodeantena = $this->instalacaodeantena;
$original_laudoradiometrico = $this->laudoradiometrico;
$original_id_prestadora = $this->id_prestadora;
$original_observacoes = $this->observacoes;

if ($this->instalacaodeantena  == 'S') {
	$this->nmgp_cmp_hidden["laudoradiometrico"] = "on"; $this->NM_ajax_info['fieldDisplay']['laudoradiometrico'] = 'on';
} else {
	$this->nmgp_cmp_hidden["laudoradiometrico"] = "off"; $this->NM_ajax_info['fieldDisplay']['laudoradiometrico'] = 'off';
}

$modificado_instalacaodeantena = $this->instalacaodeantena;
$modificado_laudoradiometrico = $this->laudoradiometrico;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_observacoes = $this->observacoes;
$this->nm_formatar_campos('instalacaodeantena', 'laudoradiometrico');
if ($original_instalacaodeantena !== $modificado_instalacaodeantena || isset($this->nmgp_cmp_readonly['instalacaodeantena']) || (isset($bFlagRead_instalacaodeantena) && $bFlagRead_instalacaodeantena))
{
    $this->ajax_return_values_instalacaodeantena(true);
}
if ($original_laudoradiometrico !== $modificado_laudoradiometrico || isset($this->nmgp_cmp_readonly['laudoradiometrico']) || (isset($bFlagRead_laudoradiometrico) && $bFlagRead_laudoradiometrico))
{
    $this->ajax_return_values_laudoradiometrico(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function Tipo_OP_onChange($id_operadora, $id_pa)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_id_operadora = $this->id_operadora;
$original_id_pa = $this->id_pa;

if ($tipo_op  == 'O') {
	$this->nmgp_cmp_hidden["operadora"] = "on"; $this->NM_ajax_info['fieldDisplay']['operadora'] = 'on';
	$this->nmgp_cmp_hidden["prestadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['prestadora'] = 'off';
} else {
	$this->nmgp_cmp_hidden["operadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['operadora'] = 'off';
	$this->nmgp_cmp_hidden["prestadora"] = "on"; $this->NM_ajax_info['fieldDisplay']['prestadora'] = 'on';
}

$modificado_id_operadora = $this->id_operadora;
$modificado_id_pa = $this->id_pa;
$this->nm_formatar_campos();
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_pa !== $modificado_id_pa || isset($this->nmgp_cmp_readonly['id_pa']) || (isset($bFlagRead_id_pa) && $bFlagRead_id_pa))
{
    $this->ajax_return_values_id_pa(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function Tipo_PA_onChange($savedataonclick, $retomarprojeto, $historicostatus)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_tipo_pa = $this->tipo_pa;
$original_id_a = $this->id_a;
$original_id_p = $this->id_p;
$original_savedataonclick = $this->savedataonclick;
$original_retomarprojeto = $this->retomarprojeto;
$original_historicostatus = $this->historicostatus;

if ($this->tipo_pa  == "P") {
	$this->nmgp_cmp_hidden["id_a"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'off';
	$this->nmgp_cmp_hidden["id_p"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'on';
} else {
	$this->nmgp_cmp_hidden["id_a"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_a'] = 'on';
	$this->nmgp_cmp_hidden["id_p"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_p'] = 'off';
}

$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_a = $this->id_a;
$modificado_id_p = $this->id_p;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_retomarprojeto = $this->retomarprojeto;
$modificado_historicostatus = $this->historicostatus;
$this->nm_formatar_campos('tipo_pa', 'id_a', 'id_p');
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_retomarprojeto !== $modificado_retomarprojeto || isset($this->nmgp_cmp_readonly['retomarprojeto']) || (isset($bFlagRead_retomarprojeto) && $bFlagRead_retomarprojeto))
{
    $this->ajax_return_values_retomarprojeto(true);
}
if ($original_historicostatus !== $modificado_historicostatus || isset($this->nmgp_cmp_readonly['historicostatus']) || (isset($bFlagRead_historicostatus) && $bFlagRead_historicostatus))
{
    $this->ajax_return_values_historicostatus(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function concluirProjeto_onClick($laudoradiometrico, $num_totvs, $data_criacao, $id_operadora, $id_usuariocriacao, $id_condominos, $id_empreendimento, $retomarprojeto, $removeronclick, $id_p, $id_tipoprojeto, $id_a, $historicostatus, $relatoriofotograficopronto, $memorialdescritivopronto, $tipo_pa, $id_pa, $num_ativo, $id_prestadora, $observacoes, $protocolohex, $id_projeto)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_id_projeto = $this->id_projeto;
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_protocolohex = $this->protocolohex;
$original_id_operadora = $this->id_operadora;
$original_id_prestadora = $this->id_prestadora;
$original_id_empreendimento = $this->id_empreendimento;
$original_laudoradiometrico = $this->laudoradiometrico;
$original_num_totvs = $this->num_totvs;
$original_data_criacao = $this->data_criacao;
$original_id_operadora = $this->id_operadora;
$original_id_usuariocriacao = $this->id_usuariocriacao;
$original_id_condominos = $this->id_condominos;
$original_id_empreendimento = $this->id_empreendimento;
$original_retomarprojeto = $this->retomarprojeto;
$original_removeronclick = $this->removeronclick;
$original_id_p = $this->id_p;
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_id_a = $this->id_a;
$original_historicostatus = $this->historicostatus;
$original_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$original_memorialdescritivopronto = $this->memorialdescritivopronto;
$original_tipo_pa = $this->tipo_pa;
$original_id_pa = $this->id_pa;
$original_num_ativo = $this->num_ativo;
$original_id_prestadora = $this->id_prestadora;
$original_observacoes = $this->observacoes;
$original_protocolohex = $this->protocolohex;
$original_id_projeto = $this->id_projeto;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();
$statusProjeto =$this->getStatusProjeto();
$ID_Usuario = $s->get("ID_Usuario");
$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data) Values ('$this->id_projeto', 'projeto_concluido', $ID_Usuario, '".date('Y-m-d H:i:s')."')";
 
      $nm_select = $statusSql; 
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

$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "SUBMITSTATUS",
	"Descricao" => 'Projeto concluído',
	"Conteudo" => $modelLogs->getConteudo()
]);

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


$m = new sendEmail();

 
      $nm_select = "SELECT ID_ProjetoTipo, Nom_ProjetoTipo FROM tb_projetostipos WHERE ID_ProjetoTipo = '$this->id_tipoprojeto'"; 
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
$listEmails =$this->getEmailNotif();

if ($this->tprojeto ) {
	$emailData = [
		"alert" => "good",
		"title" => "PROJETO <strong>$this->protocolohex </strong><br>CONCLUÍDO",
		"content" => "
			Prezado(a), informamos que o ".($this->tprojeto ["Nom_ProjetoTipo"])." foi concluído.<br>
			Protocolo: <strong>$this->protocolohex </strong><br>
			<br>			
			:tableFooter:
		"
	];

	$modelLogs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Descricao" => 'Notificação por e-mail (Projetos)',
		"Conteudo" => ["id_projeto" => $this->id_projeto , "ProtocoloHex" => $this->protocolohex , "EmailContent" => $emailData, "BCC" => $listEmails]
	]);
	
	$html = emailTemplate($emailData);
	$listEmails[] = "gabriel.soares@houseti.com.br";
	$m->BCC = $listEmails;
	$m->SUBJECT = "PROJETO $this->protocolohex  CONCLUÍDO";
	$m->MESSAGE = $html;
	$m->send();
}
$s->setIUDState("form_CadastrodeProjetos", "U", "success");
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadastrodeProjetos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };


$modificado_id_projeto = $this->id_projeto;
$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_protocolohex = $this->protocolohex;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_laudoradiometrico = $this->laudoradiometrico;
$modificado_num_totvs = $this->num_totvs;
$modificado_data_criacao = $this->data_criacao;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_usuariocriacao = $this->id_usuariocriacao;
$modificado_id_condominos = $this->id_condominos;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_retomarprojeto = $this->retomarprojeto;
$modificado_removeronclick = $this->removeronclick;
$modificado_id_p = $this->id_p;
$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_id_a = $this->id_a;
$modificado_historicostatus = $this->historicostatus;
$modificado_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$modificado_memorialdescritivopronto = $this->memorialdescritivopronto;
$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_pa = $this->id_pa;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_observacoes = $this->observacoes;
$modificado_protocolohex = $this->protocolohex;
$modificado_id_projeto = $this->id_projeto;
$this->nm_formatar_campos('id_projeto', 'id_tipoprojeto', 'protocolohex', 'id_operadora', 'id_prestadora', 'id_empreendimento');
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_protocolohex !== $modificado_protocolohex || isset($this->nmgp_cmp_readonly['protocolohex']) || (isset($bFlagRead_protocolohex) && $bFlagRead_protocolohex))
{
    $this->ajax_return_values_protocolohex(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_laudoradiometrico !== $modificado_laudoradiometrico || isset($this->nmgp_cmp_readonly['laudoradiometrico']) || (isset($bFlagRead_laudoradiometrico) && $bFlagRead_laudoradiometrico))
{
    $this->ajax_return_values_laudoradiometrico(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_data_criacao !== $modificado_data_criacao || isset($this->nmgp_cmp_readonly['data_criacao']) || (isset($bFlagRead_data_criacao) && $bFlagRead_data_criacao))
{
    $this->ajax_return_values_data_criacao(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_usuariocriacao !== $modificado_id_usuariocriacao || isset($this->nmgp_cmp_readonly['id_usuariocriacao']) || (isset($bFlagRead_id_usuariocriacao) && $bFlagRead_id_usuariocriacao))
{
    $this->ajax_return_values_id_usuariocriacao(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_retomarprojeto !== $modificado_retomarprojeto || isset($this->nmgp_cmp_readonly['retomarprojeto']) || (isset($bFlagRead_retomarprojeto) && $bFlagRead_retomarprojeto))
{
    $this->ajax_return_values_retomarprojeto(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_historicostatus !== $modificado_historicostatus || isset($this->nmgp_cmp_readonly['historicostatus']) || (isset($bFlagRead_historicostatus) && $bFlagRead_historicostatus))
{
    $this->ajax_return_values_historicostatus(true);
}
if ($original_relatoriofotograficopronto !== $modificado_relatoriofotograficopronto || isset($this->nmgp_cmp_readonly['relatoriofotograficopronto']) || (isset($bFlagRead_relatoriofotograficopronto) && $bFlagRead_relatoriofotograficopronto))
{
    $this->ajax_return_values_relatoriofotograficopronto(true);
}
if ($original_memorialdescritivopronto !== $modificado_memorialdescritivopronto || isset($this->nmgp_cmp_readonly['memorialdescritivopronto']) || (isset($bFlagRead_memorialdescritivopronto) && $bFlagRead_memorialdescritivopronto))
{
    $this->ajax_return_values_memorialdescritivopronto(true);
}
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_pa !== $modificado_id_pa || isset($this->nmgp_cmp_readonly['id_pa']) || (isset($bFlagRead_id_pa) && $bFlagRead_id_pa))
{
    $this->ajax_return_values_id_pa(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_protocolohex !== $modificado_protocolohex || isset($this->nmgp_cmp_readonly['protocolohex']) || (isset($bFlagRead_protocolohex) && $bFlagRead_protocolohex))
{
    $this->ajax_return_values_protocolohex(true);
}
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function disableAll()
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$this->sc_field_readonly("id_tipoprojeto", 'on');
$this->sc_field_readonly("id_empreendimento", 'on');
$this->sc_field_readonly("id_condominos", 'on');
$this->sc_field_readonly("num_totvs", 'on');
$this->sc_field_readonly("tipo_op", 'on');
$this->sc_field_readonly("id_operadora", 'on');
$this->sc_field_readonly("id_prestadora", 'on');
$this->sc_field_readonly("laudoradiometrico", 'on');
$this->sc_field_readonly("tipo_pa", 'on');
$this->sc_field_readonly("id_p", 'on');
$this->sc_field_readonly("id_a", 'on');
$this->sc_ajax_javascript('nm_field_disabled', array("instalacaodeantena=disabled", ""));
;
$this->sc_ajax_javascript('nm_field_disabled', array("memorialdescritivopronto=disabled", ""));
;
$this->sc_ajax_javascript('nm_field_disabled', array("relatoriofotograficopronto=disabled", ""));
;
$this->sc_field_readonly("observacoes", 'on');
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function getEmailNotif()
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

$Num_TipoUsuario = $s->get("Num_TipoUsuario");
$ID_OPE = $s->get("ID_OPE");

$listOperadorasRelacionadas = "'".$this->id_operadora ."'";
$listPrestadorasRelacionadas = "'".$this->id_prestadora ."'";

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
WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') AND cc.Valor = 'S' AND a.Num_Ativo = 'S' AND a.Num_TipoUsuario IN ('E') AND a.ID_OPE = '$this->id_empreendimento'";
 
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
INNER JOIN tb_gbtecempreendimentos b ON b.ID_Usuario = a.ID_Usuario AND b.ID_Empreendimento = '$this->id_empreendimento' 
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

if ($Num_TipoUsuario == "G" || $Num_TipoUsuario == "P") {
    $sqlContatoP = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
    FROM tb_contatos a 
    WHERE a.ID_OPE IN ($listPrestadorasRelacionadas) AND a.Tipo_OPE = 'P' AND a.RecebeNotificacao = 'S' AND
    (a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND a.Num_TipoUsuario = 'G'";
} elseif ($Num_TipoUsuario == "O") {
    $sqlContatoP = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
    FROM tb_contatos a 
    WHERE a.ID_OPE IN ($listOperadorasRelacionadas) AND a.Tipo_OPE = 'P' AND a.RecebeNotificacao = 'S' AND
    (a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND a.Num_TipoUsuario = 'O' a.ID_OPE_Usuario = '$ID_OPE'";
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
WHERE a.ID_OPE = '$this->id_empreendimento' AND a.Tipo_OPE = 'E' AND a.RecebeNotificacao = 'S' AND
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
        } elseif (isset($value["Email2"]) && $value["Email2"] != '') {
            array_push($listEmails, $value["Email2"]);
        } elseif (isset($value["Email3"]) && $value["Email3"] != '') {
            array_push($listEmails, $value["Email3"]);
        }
    }
}
$listEmails = array_unique($listEmails);
return $listEmails;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function getHistoricoStatus()
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_projeto)) {$this->sc_temp_ID_projeto = (isset($_SESSION['ID_projeto'])) ? $_SESSION['ID_projeto'] : "";}
                               
sc_include_library("sys", "models", "Projetos.php");
$_Projetos = new Projetos($this);

$statusList = $_Projetos->getStatus(intval($this->sc_temp_ID_projeto), 0);

if ($statusList) {
	$historico = "";
	$isOwner =$this->getOwner();
	if ($isOwner["isOwner"]) {
		$row = $statusList[0];
		if ($row["Usuario"]) {
			$historico .= "<strong>".$row["Data"]."</strong> - <strong>".$row["Usuario"]."</strong>: ".$row["StatusText"]."<br>";
		} else {
			$historico .= "<strong>".$row["Data"]."</strong>: ".$row["StatusText"]."<br>";
		}
	} else {
		foreach($statusList as $row) {
			if ($row["Usuario"]) {
				$historico .= "<strong>".$row["Data"]."</strong> - <strong>".$row["Usuario"]."</strong>: ".$row["StatusText"]."<br>";
			} else {
				$historico .= "<strong>".$row["Data"]."</strong>: ".$row["StatusText"]."<br>";
			}
		}
	}
	return $historico;
} else return false;

if (isset($this->sc_temp_ID_projeto)) { $_SESSION['ID_projeto'] = $this->sc_temp_ID_projeto;}
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function getOwner()
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
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
if (isset($this->sc_temp_id_Projeto)) { $_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function getStatusProjeto()
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_projeto)) {$this->sc_temp_ID_projeto = (isset($_SESSION['ID_projeto'])) ? $_SESSION['ID_projeto'] : "";}
                               
sc_include_library("sys", "models", "Projetos.php");
$_Projetos = new Projetos($this);

$rs = $_Projetos->getStatus(intval($this->sc_temp_ID_projeto));
return $rs;

if (isset($this->sc_temp_ID_projeto)) { $_SESSION['ID_projeto'] = $this->sc_temp_ID_projeto;}
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function mountNumStatus($listOptions=[])
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$R = "SELECT 'R' as a, 'RECUSAO' as b FROM dual";
$C = "SELECT 'C' as a, 'CANCELADO' as b FROM dual";
$PE = "SELECT 'PE' as a, 'PENDENTE DE ENVIO' as b FROM dual";
$PA = "SELECT 'PA' as a, 'PENDENTE DE APROVAÇÃO' as b FROM dual";
$A = "SELECT 'A' as a, 'APROVAÇÃO' as b FROM dual";

$list = [];
if (count($listOptions) > 0) {
	foreach($listOptions as $val) {
		if (isset($$val)) {
			array_push($list, $$val);
		}
	}
	$sql = implode(" UNION ", $list);
	return $sql;
} else {
	return "SELECT NULL as a, NULL as b from dual";
}



$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function onLoadJS()
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
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
	function deleteData() {
		$('#id_sc_field_removeronclick').click();
	}
	function concluirProjeto() {
		$('#id_sc_field_concluirprojeto').click();
	}
	function retomarProjeto() {
		$('#id_sc_field_retomarprojeto').click();
	}
</script>

<?php

$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function removerOnClick_onClick($laudoradiometrico, $num_totvs, $data_criacao, $id_operadora, $id_usuariocriacao, $id_condominos, $id_empreendimento, $retomarprojeto, $removeronclick, $id_p, $id_tipoprojeto, $id_a, $historicostatus, $relatoriofotograficopronto, $memorialdescritivopronto, $tipo_pa, $id_pa, $num_ativo, $id_prestadora, $observacoes, $protocolohex, $id_projeto)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_num_ativo = $this->num_ativo;
$original_id_projeto = $this->id_projeto;
$original_laudoradiometrico = $this->laudoradiometrico;
$original_num_totvs = $this->num_totvs;
$original_data_criacao = $this->data_criacao;
$original_id_operadora = $this->id_operadora;
$original_id_usuariocriacao = $this->id_usuariocriacao;
$original_id_condominos = $this->id_condominos;
$original_id_empreendimento = $this->id_empreendimento;
$original_retomarprojeto = $this->retomarprojeto;
$original_removeronclick = $this->removeronclick;
$original_id_p = $this->id_p;
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_id_a = $this->id_a;
$original_historicostatus = $this->historicostatus;
$original_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$original_memorialdescritivopronto = $this->memorialdescritivopronto;
$original_tipo_pa = $this->tipo_pa;
$original_id_pa = $this->id_pa;
$original_num_ativo = $this->num_ativo;
$original_id_prestadora = $this->id_prestadora;
$original_observacoes = $this->observacoes;
$original_protocolohex = $this->protocolohex;
$original_id_projeto = $this->id_projeto;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();
$msg = "";
$Error = false;

if (!$Error) {
	$ID_Usuario = $s->get("ID_Usuario");
	$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data) Values ($id_Projeto, 'projeto_cancelado', $ID_Usuario, '".date('Y-m-d H:i:s')."')";
	 
      $nm_select = $statusSql; 
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
	$this->num_ativo  = "R";
	 
      $nm_select = "UPDATE tb_projetos SET Num_Ativo = 'R' WHERE ID_projeto = '$this->id_projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_projeto != "")
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
	
	$modelLogs->insert([
		"Modulo" => "PROJETO",
		"Funcao" => "DELETAR",
		"Descricao" => 'Remoção de empreendimento',
		"Conteudo" => $modelLogs->getConteudo()
	]);
	
	
	$s->setIUDState("grid_ConsultaDeProjetos", "D", "success");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultaDeProjetos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	));
}

$modificado_num_ativo = $this->num_ativo;
$modificado_id_projeto = $this->id_projeto;
$modificado_laudoradiometrico = $this->laudoradiometrico;
$modificado_num_totvs = $this->num_totvs;
$modificado_data_criacao = $this->data_criacao;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_usuariocriacao = $this->id_usuariocriacao;
$modificado_id_condominos = $this->id_condominos;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_retomarprojeto = $this->retomarprojeto;
$modificado_removeronclick = $this->removeronclick;
$modificado_id_p = $this->id_p;
$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_id_a = $this->id_a;
$modificado_historicostatus = $this->historicostatus;
$modificado_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$modificado_memorialdescritivopronto = $this->memorialdescritivopronto;
$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_pa = $this->id_pa;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_observacoes = $this->observacoes;
$modificado_protocolohex = $this->protocolohex;
$modificado_id_projeto = $this->id_projeto;
$this->nm_formatar_campos('num_ativo', 'id_projeto');
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
if ($original_laudoradiometrico !== $modificado_laudoradiometrico || isset($this->nmgp_cmp_readonly['laudoradiometrico']) || (isset($bFlagRead_laudoradiometrico) && $bFlagRead_laudoradiometrico))
{
    $this->ajax_return_values_laudoradiometrico(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_data_criacao !== $modificado_data_criacao || isset($this->nmgp_cmp_readonly['data_criacao']) || (isset($bFlagRead_data_criacao) && $bFlagRead_data_criacao))
{
    $this->ajax_return_values_data_criacao(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_usuariocriacao !== $modificado_id_usuariocriacao || isset($this->nmgp_cmp_readonly['id_usuariocriacao']) || (isset($bFlagRead_id_usuariocriacao) && $bFlagRead_id_usuariocriacao))
{
    $this->ajax_return_values_id_usuariocriacao(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_retomarprojeto !== $modificado_retomarprojeto || isset($this->nmgp_cmp_readonly['retomarprojeto']) || (isset($bFlagRead_retomarprojeto) && $bFlagRead_retomarprojeto))
{
    $this->ajax_return_values_retomarprojeto(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_historicostatus !== $modificado_historicostatus || isset($this->nmgp_cmp_readonly['historicostatus']) || (isset($bFlagRead_historicostatus) && $bFlagRead_historicostatus))
{
    $this->ajax_return_values_historicostatus(true);
}
if ($original_relatoriofotograficopronto !== $modificado_relatoriofotograficopronto || isset($this->nmgp_cmp_readonly['relatoriofotograficopronto']) || (isset($bFlagRead_relatoriofotograficopronto) && $bFlagRead_relatoriofotograficopronto))
{
    $this->ajax_return_values_relatoriofotograficopronto(true);
}
if ($original_memorialdescritivopronto !== $modificado_memorialdescritivopronto || isset($this->nmgp_cmp_readonly['memorialdescritivopronto']) || (isset($bFlagRead_memorialdescritivopronto) && $bFlagRead_memorialdescritivopronto))
{
    $this->ajax_return_values_memorialdescritivopronto(true);
}
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_pa !== $modificado_id_pa || isset($this->nmgp_cmp_readonly['id_pa']) || (isset($bFlagRead_id_pa) && $bFlagRead_id_pa))
{
    $this->ajax_return_values_id_pa(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_protocolohex !== $modificado_protocolohex || isset($this->nmgp_cmp_readonly['protocolohex']) || (isset($bFlagRead_protocolohex) && $bFlagRead_protocolohex))
{
    $this->ajax_return_values_protocolohex(true);
}
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function retomarProjeto_onClick($laudoradiometrico, $num_totvs, $data_criacao, $id_operadora, $id_usuariocriacao, $id_condominos, $id_empreendimento, $savedataonclick, $retomarprojeto, $removeronclick, $id_p, $id_tipoprojeto, $id_a, $historicostatus, $relatoriofotograficopronto, $memorialdescritivopronto, $tipo_pa, $id_pa, $num_ativo, $id_prestadora, $observacoes, $protocolohex, $id_projeto)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_id_projeto = $this->id_projeto;
$original_laudoradiometrico = $this->laudoradiometrico;
$original_num_totvs = $this->num_totvs;
$original_data_criacao = $this->data_criacao;
$original_id_operadora = $this->id_operadora;
$original_id_usuariocriacao = $this->id_usuariocriacao;
$original_id_condominos = $this->id_condominos;
$original_id_empreendimento = $this->id_empreendimento;
$original_savedataonclick = $this->savedataonclick;
$original_retomarprojeto = $this->retomarprojeto;
$original_removeronclick = $this->removeronclick;
$original_id_p = $this->id_p;
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_id_a = $this->id_a;
$original_historicostatus = $this->historicostatus;
$original_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$original_memorialdescritivopronto = $this->memorialdescritivopronto;
$original_tipo_pa = $this->tipo_pa;
$original_id_pa = $this->id_pa;
$original_num_ativo = $this->num_ativo;
$original_id_prestadora = $this->id_prestadora;
$original_observacoes = $this->observacoes;
$original_protocolohex = $this->protocolohex;
$original_id_projeto = $this->id_projeto;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$ID_Usuario = $s->get("ID_Usuario");

sc_include_library("sys", "models", "Projetos.php");
sc_include_library("sys", "models", "Logs.php");
$_Projetos = new Projetos($this);
$_Logs = new Logs($this);

$msg = "";
$Error = false;

if (!$Error) {
	$lastStatus = $_Projetos->getStatus(intval($this->id_projeto ), 3);
	if ($lastStatus[0]["Code"] == "projeto_expirado") {
		if ($lastStatus[1]["Code"] == "aguardando_envio") {
			$newStatus = "aguardando_envio";
			$numAnalise = 0;
		} elseif ($lastStatus[1]["Code"] == "reprovado_analise_itens") {
			$newStatus = "reprovado_analise_itens";
			$numAnalise = $lastStatus[1]["Num_Analise"];
		} elseif ($lastStatus[1]["Code"] == "projeto_expirado_aguardando_analise_pas1") {
			$newStatus = "projeto_aprovado";
			$numAnalise = $lastStatus[2]["Num_Analise"];
		}
	}
	
	if (isset($newStatus) && isset($numAnalise)) {
		$_Projetos->updateStatus(intval($this->id_projeto ), $newStatus, intval($ID_Usuario), intval($numAnalise));
		
		$logConteudo = $_Logs->getConteudo();
		$logConteudo["newStatus"] = $newStatus;
		$_Logs->insert([
			"Modulo" => "PROJETO",
			"Funcao" => "RETOMAR",
			"Descricao" => 'Retomar projeto',
			"Conteudo" => $logConteudo
		]);
		$s->setIUDState("form_CadastrodeProjetos", "U", "success");
		if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

		 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadastrodeProjetos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
	} else {
		$this->sc_ajax_javascript('sModal', array(
			'show',
			'',
			 $this->Ini->Nm_lang['lang_msg_resumeproject'] .'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
			'{"sizeClass":"md"}'
		));
	}
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg.'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"md"}'
	));
}

$modificado_id_projeto = $this->id_projeto;
$modificado_laudoradiometrico = $this->laudoradiometrico;
$modificado_num_totvs = $this->num_totvs;
$modificado_data_criacao = $this->data_criacao;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_usuariocriacao = $this->id_usuariocriacao;
$modificado_id_condominos = $this->id_condominos;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_retomarprojeto = $this->retomarprojeto;
$modificado_removeronclick = $this->removeronclick;
$modificado_id_p = $this->id_p;
$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_id_a = $this->id_a;
$modificado_historicostatus = $this->historicostatus;
$modificado_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$modificado_memorialdescritivopronto = $this->memorialdescritivopronto;
$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_pa = $this->id_pa;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_observacoes = $this->observacoes;
$modificado_protocolohex = $this->protocolohex;
$modificado_id_projeto = $this->id_projeto;
$this->nm_formatar_campos('id_projeto');
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
if ($original_laudoradiometrico !== $modificado_laudoradiometrico || isset($this->nmgp_cmp_readonly['laudoradiometrico']) || (isset($bFlagRead_laudoradiometrico) && $bFlagRead_laudoradiometrico))
{
    $this->ajax_return_values_laudoradiometrico(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_data_criacao !== $modificado_data_criacao || isset($this->nmgp_cmp_readonly['data_criacao']) || (isset($bFlagRead_data_criacao) && $bFlagRead_data_criacao))
{
    $this->ajax_return_values_data_criacao(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_usuariocriacao !== $modificado_id_usuariocriacao || isset($this->nmgp_cmp_readonly['id_usuariocriacao']) || (isset($bFlagRead_id_usuariocriacao) && $bFlagRead_id_usuariocriacao))
{
    $this->ajax_return_values_id_usuariocriacao(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_retomarprojeto !== $modificado_retomarprojeto || isset($this->nmgp_cmp_readonly['retomarprojeto']) || (isset($bFlagRead_retomarprojeto) && $bFlagRead_retomarprojeto))
{
    $this->ajax_return_values_retomarprojeto(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_historicostatus !== $modificado_historicostatus || isset($this->nmgp_cmp_readonly['historicostatus']) || (isset($bFlagRead_historicostatus) && $bFlagRead_historicostatus))
{
    $this->ajax_return_values_historicostatus(true);
}
if ($original_relatoriofotograficopronto !== $modificado_relatoriofotograficopronto || isset($this->nmgp_cmp_readonly['relatoriofotograficopronto']) || (isset($bFlagRead_relatoriofotograficopronto) && $bFlagRead_relatoriofotograficopronto))
{
    $this->ajax_return_values_relatoriofotograficopronto(true);
}
if ($original_memorialdescritivopronto !== $modificado_memorialdescritivopronto || isset($this->nmgp_cmp_readonly['memorialdescritivopronto']) || (isset($bFlagRead_memorialdescritivopronto) && $bFlagRead_memorialdescritivopronto))
{
    $this->ajax_return_values_memorialdescritivopronto(true);
}
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_pa !== $modificado_id_pa || isset($this->nmgp_cmp_readonly['id_pa']) || (isset($bFlagRead_id_pa) && $bFlagRead_id_pa))
{
    $this->ajax_return_values_id_pa(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_protocolohex !== $modificado_protocolohex || isset($this->nmgp_cmp_readonly['protocolohex']) || (isset($bFlagRead_protocolohex) && $bFlagRead_protocolohex))
{
    $this->ajax_return_values_protocolohex(true);
}
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($laudoradiometrico, $num_totvs, $data_criacao, $id_operadora, $id_usuariocriacao, $id_condominos, $id_empreendimento, $retomarprojeto, $id_p, $id_tipoprojeto, $id_a, $historicostatus, $relatoriofotograficopronto, $memorialdescritivopronto, $tipo_pa, $id_pa, $num_ativo, $id_prestadora, $observacoes, $protocolohex, $id_projeto)
{
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'on';
                               
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_id_empreendimento = $this->id_empreendimento;
$original_id_condominos = $this->id_condominos;
$original_tipo_pa = $this->tipo_pa;
$original_id_p = $this->id_p;
$original_id_a = $this->id_a;
$original_id_operadora = $this->id_operadora;
$original_id_prestadora = $this->id_prestadora;
$original_observacoes = $this->observacoes;
$original_instalacaodeantena = $this->instalacaodeantena;
$original_laudoradiometrico = $this->laudoradiometrico;
$original_id_projeto = $this->id_projeto;
$original_laudoradiometrico = $this->laudoradiometrico;
$original_num_totvs = $this->num_totvs;
$original_data_criacao = $this->data_criacao;
$original_id_operadora = $this->id_operadora;
$original_id_usuariocriacao = $this->id_usuariocriacao;
$original_id_condominos = $this->id_condominos;
$original_id_empreendimento = $this->id_empreendimento;
$original_retomarprojeto = $this->retomarprojeto;
$original_id_p = $this->id_p;
$original_id_tipoprojeto = $this->id_tipoprojeto;
$original_id_a = $this->id_a;
$original_historicostatus = $this->historicostatus;
$original_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$original_memorialdescritivopronto = $this->memorialdescritivopronto;
$original_tipo_pa = $this->tipo_pa;
$original_id_pa = $this->id_pa;
$original_num_ativo = $this->num_ativo;
$original_id_prestadora = $this->id_prestadora;
$original_observacoes = $this->observacoes;
$original_protocolohex = $this->protocolohex;
$original_id_projeto = $this->id_projeto;

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$Num_TipoUsuario = $s->get("Num_TipoUsuario");

$msg = "";
$Error = false;

 
      $nm_select = "SELECT Code FROM tb_projetostipos WHERE ID_ProjetoTipo = '$this->id_tipoprojeto'"; 
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

if (!$this->id_empreendimento ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_building'] ;
	$Error = true;
}
if ($this->rs [0]["Code"] == 'instalacao' && !$this->id_condominos ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_condominium'] ;
	$Error = true;
}
if ($this->rs [0]["Code"] == 'instalacao' && $this->tipo_pa  == "P" && !$this->id_p ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_pop'] ;
	$Error = true;
}
if ($this->rs [0]["Code"] == 'instalacao' && $this->tipo_pa  == "A" && !$this->id_a ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_antennal'] ;
	$Error = true;
}
if (!$this->id_operadora ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_operator'] ;
	$Error = true;
}
if ($Num_TipoUsuario == "P" && !$this->id_prestadora ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_provider'] ;
	$Error = true;
}
if (trim($this->observacoes ) == "") {
	$msg .= "Insira o descritivo do projeto<br>";
	$Error = true;
}
$LaudoRadiometrico = $this->instalacaodeantena  == 'S' ? ($this->laudoradiometrico  ? $this->laudoradiometrico  : 'N') : 'N';
if ($LaudoRadiometrico == "N") $textLaudoRadiometrico =  $this->Ini->Nm_lang['lang_msg_alert_laudoradio1'] ;
elseif ($LaudoRadiometrico == "receptora") $textLaudoRadiometrico =  $this->Ini->Nm_lang['lang_msg_alert_laudoradio2'] ;
elseif ($LaudoRadiometrico == "transmissora") $textLaudoRadiometrico =  $this->Ini->Nm_lang['lang_msg_alert_laudoradio3'] ;
elseif ($LaudoRadiometrico == "receptora_transmissora") $textLaudoRadiometrico =  $this->Ini->Nm_lang['lang_msg_alert_laudoradio4'] ;


if ($this->rs [0]["Code"] == 'instalacao' && $this->id_condominos ) {
	$sql = "select count(*) as count 
		FROM tb_projetos a
		INNER JOIN tb_projetostipos b ON b.ID_ProjetoTipo = a.ID_TipoProjeto 
		WHERE a.ID_Operadora = '$this->id_operadora' AND
		b.Code = 'instalacao' AND a.ID_Condominos = '$this->id_condominos' AND a.Tipo_PA = '$this->tipo_pa' AND (
			('$this->tipo_pa' = 'P' AND a.ID_PA = '$this->id_p') OR ('$this->tipo_pa' = 'A' AND a.ID_PA = '$this->id_a')
		) AND a.Num_Ativo = 'S' AND a.ID_projeto != '$this->id_projeto' AND
		(select c.CodeStatus from tb_projetoanalisestatus c 
			WHERE c.ID_Projeto = a.ID_projeto
			order by c.Data DESC
			LIMIT 1) NOT IN ('projeto_concluido', 'projeto_expirado', 'projeto_expirado_aguardando_envio_pas1')";
	 
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
	if ($this->rs [0]["count"] > 0) {
		$msg .=  $this->Ini->Nm_lang['lang_msg_alert_project1'] ." ".($this->tipo_pa  == "P" ? "POP" :  $this->Ini->Nm_lang['lang_label_antenary'] );
		$Error = true;
	}
} elseif ($this->rs [0]["Code"] == 'abordagem' && $this->id_empreendimento ) {
	$sql = "select count(*) as count 
		FROM tb_projetos a 
		INNER JOIN tb_projetostipos b ON b.ID_ProjetoTipo = a.ID_TipoProjeto  
		WHERE a.ID_Operadora = '$this->id_operadora' AND 
		b.Code = 'abordagem' AND ID_Empreendimento = '$this->id_empreendimento' AND a.LaudoRadiometrico = '$LaudoRadiometrico' AND a.Num_Ativo = 'S' AND a.ID_projeto != '$this->id_projeto' AND 
		(select c.CodeStatus from tb_projetoanalisestatus c  
			WHERE c.ID_Projeto = a.ID_projeto 
			order by c.Data DESC
			LIMIT 1) NOT IN ('projeto_concluido', 'projeto_expirado', 'projeto_expirado_aguardando_envio_pas1')";
	 
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
	if ($this->rs [0]["count"] > 0) {
		$msg .=  $this->Ini->Nm_lang['lang_msg_alert_project2'] ." $textLaudoRadiometrico";
		$Error = true;
	}
}

if (!$Error) { 
	$f = 'saveDataForm';
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

$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id_condominos = $this->id_condominos;
$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_p = $this->id_p;
$modificado_id_a = $this->id_a;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_observacoes = $this->observacoes;
$modificado_instalacaodeantena = $this->instalacaodeantena;
$modificado_laudoradiometrico = $this->laudoradiometrico;
$modificado_id_projeto = $this->id_projeto;
$modificado_laudoradiometrico = $this->laudoradiometrico;
$modificado_num_totvs = $this->num_totvs;
$modificado_data_criacao = $this->data_criacao;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_usuariocriacao = $this->id_usuariocriacao;
$modificado_id_condominos = $this->id_condominos;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_retomarprojeto = $this->retomarprojeto;
$modificado_id_p = $this->id_p;
$modificado_id_tipoprojeto = $this->id_tipoprojeto;
$modificado_id_a = $this->id_a;
$modificado_historicostatus = $this->historicostatus;
$modificado_relatoriofotograficopronto = $this->relatoriofotograficopronto;
$modificado_memorialdescritivopronto = $this->memorialdescritivopronto;
$modificado_tipo_pa = $this->tipo_pa;
$modificado_id_pa = $this->id_pa;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_prestadora = $this->id_prestadora;
$modificado_observacoes = $this->observacoes;
$modificado_protocolohex = $this->protocolohex;
$modificado_id_projeto = $this->id_projeto;
$this->nm_formatar_campos('id_tipoprojeto', 'id_empreendimento', 'id_condominos', 'tipo_pa', 'id_p', 'id_a', 'id_operadora', 'id_prestadora', 'observacoes', 'instalacaodeantena', 'laudoradiometrico', 'id_projeto');
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_instalacaodeantena !== $modificado_instalacaodeantena || isset($this->nmgp_cmp_readonly['instalacaodeantena']) || (isset($bFlagRead_instalacaodeantena) && $bFlagRead_instalacaodeantena))
{
    $this->ajax_return_values_instalacaodeantena(true);
}
if ($original_laudoradiometrico !== $modificado_laudoradiometrico || isset($this->nmgp_cmp_readonly['laudoradiometrico']) || (isset($bFlagRead_laudoradiometrico) && $bFlagRead_laudoradiometrico))
{
    $this->ajax_return_values_laudoradiometrico(true);
}
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
if ($original_laudoradiometrico !== $modificado_laudoradiometrico || isset($this->nmgp_cmp_readonly['laudoradiometrico']) || (isset($bFlagRead_laudoradiometrico) && $bFlagRead_laudoradiometrico))
{
    $this->ajax_return_values_laudoradiometrico(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_data_criacao !== $modificado_data_criacao || isset($this->nmgp_cmp_readonly['data_criacao']) || (isset($bFlagRead_data_criacao) && $bFlagRead_data_criacao))
{
    $this->ajax_return_values_data_criacao(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_usuariocriacao !== $modificado_id_usuariocriacao || isset($this->nmgp_cmp_readonly['id_usuariocriacao']) || (isset($bFlagRead_id_usuariocriacao) && $bFlagRead_id_usuariocriacao))
{
    $this->ajax_return_values_id_usuariocriacao(true);
}
if ($original_id_condominos !== $modificado_id_condominos || isset($this->nmgp_cmp_readonly['id_condominos']) || (isset($bFlagRead_id_condominos) && $bFlagRead_id_condominos))
{
    $this->ajax_return_values_id_condominos(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_retomarprojeto !== $modificado_retomarprojeto || isset($this->nmgp_cmp_readonly['retomarprojeto']) || (isset($bFlagRead_retomarprojeto) && $bFlagRead_retomarprojeto))
{
    $this->ajax_return_values_retomarprojeto(true);
}
if ($original_id_p !== $modificado_id_p || isset($this->nmgp_cmp_readonly['id_p']) || (isset($bFlagRead_id_p) && $bFlagRead_id_p))
{
    $this->ajax_return_values_id_p(true);
}
if ($original_id_tipoprojeto !== $modificado_id_tipoprojeto || isset($this->nmgp_cmp_readonly['id_tipoprojeto']) || (isset($bFlagRead_id_tipoprojeto) && $bFlagRead_id_tipoprojeto))
{
    $this->ajax_return_values_id_tipoprojeto(true);
}
if ($original_id_a !== $modificado_id_a || isset($this->nmgp_cmp_readonly['id_a']) || (isset($bFlagRead_id_a) && $bFlagRead_id_a))
{
    $this->ajax_return_values_id_a(true);
}
if ($original_historicostatus !== $modificado_historicostatus || isset($this->nmgp_cmp_readonly['historicostatus']) || (isset($bFlagRead_historicostatus) && $bFlagRead_historicostatus))
{
    $this->ajax_return_values_historicostatus(true);
}
if ($original_relatoriofotograficopronto !== $modificado_relatoriofotograficopronto || isset($this->nmgp_cmp_readonly['relatoriofotograficopronto']) || (isset($bFlagRead_relatoriofotograficopronto) && $bFlagRead_relatoriofotograficopronto))
{
    $this->ajax_return_values_relatoriofotograficopronto(true);
}
if ($original_memorialdescritivopronto !== $modificado_memorialdescritivopronto || isset($this->nmgp_cmp_readonly['memorialdescritivopronto']) || (isset($bFlagRead_memorialdescritivopronto) && $bFlagRead_memorialdescritivopronto))
{
    $this->ajax_return_values_memorialdescritivopronto(true);
}
if ($original_tipo_pa !== $modificado_tipo_pa || isset($this->nmgp_cmp_readonly['tipo_pa']) || (isset($bFlagRead_tipo_pa) && $bFlagRead_tipo_pa))
{
    $this->ajax_return_values_tipo_pa(true);
}
if ($original_id_pa !== $modificado_id_pa || isset($this->nmgp_cmp_readonly['id_pa']) || (isset($bFlagRead_id_pa) && $bFlagRead_id_pa))
{
    $this->ajax_return_values_id_pa(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_prestadora !== $modificado_id_prestadora || isset($this->nmgp_cmp_readonly['id_prestadora']) || (isset($bFlagRead_id_prestadora) && $bFlagRead_id_prestadora))
{
    $this->ajax_return_values_id_prestadora(true);
}
if ($original_observacoes !== $modificado_observacoes || isset($this->nmgp_cmp_readonly['observacoes']) || (isset($bFlagRead_observacoes) && $bFlagRead_observacoes))
{
    $this->ajax_return_values_observacoes(true);
}
if ($original_protocolohex !== $modificado_protocolohex || isset($this->nmgp_cmp_readonly['protocolohex']) || (isset($bFlagRead_protocolohex) && $bFlagRead_protocolohex))
{
    $this->ajax_return_values_protocolohex(true);
}
if ($original_id_projeto !== $modificado_id_projeto || isset($this->nmgp_cmp_readonly['id_projeto']) || (isset($bFlagRead_id_projeto) && $bFlagRead_id_projeto))
{
    $this->ajax_return_values_id_projeto(true);
}
form_CadastrodeProjetos_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastrodeProjetos']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_CadastrodeProjetos_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_CadastrodeProjetos_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['csrf_token'];
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

   function Form_lookup_id_tipoprojeto()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID_ProjetoTipo, (CASE
  WHEN '" . $_SESSION['language'] . "' = 'pt_br' THEN Nom_ProjetoTipo
  WHEN '" . $_SESSION['language'] . "' = 'es' THEN Nom_ProjetoTipo_es
  WHEN '" . $_SESSION['language'] . "' = 'en_us' THEN Nom_ProjetoTipo_en
END) 
FROM tb_projetostipos 
ORDER BY Nom_ProjetoTipo";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_tipoprojeto'][] = $rs->fields[0];
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
   function Form_lookup_instalacaodeantena()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_laudoradiometrico()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "{lang_label_receptora}?#?receptora?#?N?@?";
       $nmgp_def_dados .= "{lang_label_transmissora}?#?transmissora?#?N?@?";
       $nmgp_def_dados .= "{lang_label_receptoratransmissora}?#?receptora_transmissora?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_tipo_pa()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "POP?#?P?#?N?@?";
       $nmgp_def_dados .= "Antenário?#?A?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_id_p()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'] = array(); 
}
if ($this->id_empreendimento != "")
{ 
   $this->nm_clear_val("id_empreendimento");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID, Nom_POP 
FROM tb_pop 
WHERE ID_Empreendimento = '$this->id_empreendimento' 
ORDER BY Nom_POP";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_p'][] = $rs->fields[0];
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
   function Form_lookup_id_a()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'] = array(); 
}
if ($this->id_empreendimento != "")
{ 
   $this->nm_clear_val("id_empreendimento");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID, Nom_Nome 
FROM tb_antenarios 
WHERE ID_Empreendimento = '$this->id_empreendimento' 
ORDER BY Nom_Nome";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_a'][] = $rs->fields[0];
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
   function Form_lookup_id_condominos()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'] = array(); 
}
if ($this->id_empreendimento != "")
{ 
   $this->nm_clear_val("id_empreendimento");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT ID_Condomino, Nom_Nome 
FROM tb_condominos 
WHERE ID_Empreendimento = '$this->id_empreendimento' AND Num_Ativo = 'S' 
ORDER BY Nom_Nome";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_condominos'][] = $rs->fields[0];
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
   function Form_lookup_id_operadora()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT a.ID_Operadoras, a.Nom_Operadoras 
FROM tb_operadoras a 
" . $_SESSION['form_CadastroDeProjetos_sql_ope'] . " 
ORDER BY a.Nom_Operadoras";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_operadora'][] = $rs->fields[0];
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
   function Form_lookup_id_prestadora()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'] = array(); 
    }

   $old_value_data_criacao = $this->data_criacao;
   $old_value_data_criacao_hora = $this->data_criacao_hora;
   $old_value_id_pa = $this->id_pa;
   $old_value_id_usuariocriacao = $this->id_usuariocriacao;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_criacao = $this->data_criacao;
   $unformatted_value_data_criacao_hora = $this->data_criacao_hora;
   $unformatted_value_id_pa = $this->id_pa;
   $unformatted_value_id_usuariocriacao = $this->id_usuariocriacao;

   $nm_comando = "SELECT b.ID_Prestador, b.Nom_RazaoSocial 
FROM tb_infoprestadores a 
INNER JOIN tb_prestadores b ON b.ID_Prestador = a.ID_Prestador AND b.Num_Ativo = 'S' 
" . $_SESSION['form_CadastroDeProjetos_sql_pre'] . " 
Group BY a.ID_Prestador";

   $this->data_criacao = $old_value_data_criacao;
   $this->data_criacao_hora = $old_value_data_criacao_hora;
   $this->id_pa = $old_value_id_pa;
   $this->id_usuariocriacao = $old_value_id_usuariocriacao;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['Lookup_id_prestadora'][] = $rs->fields[0];
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
   function Form_lookup_memorialdescritivopronto()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_relatoriofotograficopronto()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_CadastrodeProjetos_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "ID_projeto", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_tipoprojeto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_TipoProjeto", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Empreendimento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_condominos($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Condominos", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_UsuarioCriacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_operadora($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Operadora", $arg_search, $data_lookup);
          }
      }
      {
          $this->SC_monta_condicao($comando, "Data_Criacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TOTVS", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_empreendimento($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Empreendimento", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_tipoprojeto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_TipoProjeto", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_projeto", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_laudoradiometrico($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "LaudoRadiometrico", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_tipo_pa($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Tipo_PA", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_PA", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_condominos($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Condominos", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_operadora($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Operadora", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_prestadora($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Prestadora", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_UsuarioCriacao", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TOTVS", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ProtocoloHex", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Observacoes", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Ativo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_memorialdescritivopronto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "MemorialDescritivoPronto", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_relatoriofotograficopronto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "RelatorioFotograficoPronto", $arg_search, $data_lookup);
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter_form'] . " and (ID_projeto = " . $_SESSION['ID_projeto'] . ") and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID_projeto = " . $_SESSION['ID_projeto'] . " and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_CadastrodeProjetos = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['total'] = $qt_geral_reg_form_CadastrodeProjetos;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadastrodeProjetos_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadastrodeProjetos_pack_ajax_response();
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
      $nm_numeric[] = "id_projeto";$nm_numeric[] = "id_tipoprojeto";$nm_numeric[] = "id_empreendimento";$nm_numeric[] = "id_condominos";$nm_numeric[] = "id_usuariocriacao";$nm_numeric[] = "id_operadora";$nm_numeric[] = "id_prestadora";$nm_numeric[] = "id_pa";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['decimal_db'] == ".")
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
      $Nm_datas['data_criacao'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['SC_sep_date1'];
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
   function SC_lookup_id_tipoprojeto($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT (CASE   WHEN '" . $_SESSION['language'] . "' = 'pt_br' THEN Nom_ProjetoTipo   WHEN '" . $_SESSION['language'] . "' = 'es' THEN Nom_ProjetoTipo_es   WHEN '" . $_SESSION['language'] . "' = 'en_us' THEN Nom_ProjetoTipo_en END), ID_ProjetoTipo FROM tb_projetostipos WHERE ((CASE   WHEN '" . $_SESSION['language'] . "' = 'pt_br' THEN Nom_ProjetoTipo   WHEN '" . $_SESSION['language'] . "' = 'es' THEN Nom_ProjetoTipo_es   WHEN '" . $_SESSION['language'] . "' = 'en_us' THEN Nom_ProjetoTipo_en END) LIKE '%$campo%')" ; 
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
   function SC_lookup_id_empreendimento($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT Nom_Empreendimento, ID_Empreendimento FROM tb_empreendimentos WHERE (CAST (ID_Empreendimento AS TEXT) LIKE '%$campo%') AND (Num_Ativo = 'S')" ; 
       }
       else
       {
           $nm_comando = "SELECT Nom_Empreendimento, ID_Empreendimento FROM tb_empreendimentos WHERE (Nom_Empreendimento LIKE '%$campo%') AND (Num_Ativo = 'S')" ; 
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
   function SC_lookup_id_condominos($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT Nom_Nome, ID_Condomino, ID_Empreendimento FROM tb_condominos WHERE (CAST (ID_Condomino AS TEXT) LIKE '%$campo%') AND (Num_Ativo = 'S')" ; 
       }
       else
       {
           $nm_comando = "SELECT Nom_Nome, ID_Condomino, ID_Empreendimento FROM tb_condominos WHERE (Nom_Nome LIKE '%$campo%') AND (Num_Ativo = 'S')" ; 
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
   function SC_lookup_id_operadora($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT Nom_Operadoras, a.ID_Operadoras FROM tb_operadoras a  " . $_SESSION['form_CadastroDeProjetos_sql_ope'] . " WHERE (Nom_Operadoras LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_CadastrodeProjetos_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_CadastrodeProjetos_fim.php";
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
       form_CadastrodeProjetos_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastrodeProjetos']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_CadastrodeProjetos_pack_ajax_response();
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
       form_CadastrodeProjetos_pack_ajax_response();
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
        if ('data_criacao' == $sField)
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
