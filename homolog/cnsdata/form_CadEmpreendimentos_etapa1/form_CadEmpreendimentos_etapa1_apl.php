<?php
//
class form_CadEmpreendimentos_etapa1_apl
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
   var $id_empreendimento;
   var $num_cnpj;
   var $nom_empreendimento;
   var $nom_email;
   var $num_telefonecomercial;
   var $end_logradouro;
   var $end_numero;
   var $end_complemento;
   var $end_bairro;
   var $end_cidade;
   var $end_uf;
   var $end_cep;
   var $num_totvs;
   var $img_logo;
   var $img_logo_scfile_name;
   var $img_logo_ul_name;
   var $img_logo_scfile_type;
   var $img_logo_ul_type;
   var $img_logo_limpa;
   var $img_logo_salva;
   var $out_img_logo;
   var $out1_img_logo;
   var $num_ativo;
   var $num_ativo_1;
   var $pontodeencontro;
   var $perfildoempreendimento;
   var $perfildoempreendimento_1;
   var $id_empreendimentosadmin;
   var $img_rg;
   var $img_rg_scfile_name;
   var $img_rg_ul_name;
   var $img_rg_scfile_type;
   var $img_rg_ul_type;
   var $img_rg_limpa;
   var $img_rg_salva;
   var $out_img_rg;
   var $out1_img_rg;
   var $antenariolabelframe;
   var $bloqueioopelabelframe;
   var $bloqueioprelabelframe;
   var $deleteonclick;
   var $inconformidadeslabelframe;
   var $localizacao;
   var $poelabelframe;
   var $poplabelframe;
   var $savedataonclick;
   var $shaftlabelframe;
   var $torrelabelframe;
   var $upnpt;
   var $bloqueiotecopelabelframe;
   var $bloqueiotecprelabelframe;
   var $uprelatoriovistoria;
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
          if (isset($this->NM_ajax_info['param']['antenariolabelframe']))
          {
              $this->antenariolabelframe = $this->NM_ajax_info['param']['antenariolabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['bloqueioopelabelframe']))
          {
              $this->bloqueioopelabelframe = $this->NM_ajax_info['param']['bloqueioopelabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['bloqueioprelabelframe']))
          {
              $this->bloqueioprelabelframe = $this->NM_ajax_info['param']['bloqueioprelabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['bloqueiotecopelabelframe']))
          {
              $this->bloqueiotecopelabelframe = $this->NM_ajax_info['param']['bloqueiotecopelabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['bloqueiotecprelabelframe']))
          {
              $this->bloqueiotecprelabelframe = $this->NM_ajax_info['param']['bloqueiotecprelabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['deleteonclick']))
          {
              $this->deleteonclick = $this->NM_ajax_info['param']['deleteonclick'];
          }
          if (isset($this->NM_ajax_info['param']['end_bairro']))
          {
              $this->end_bairro = $this->NM_ajax_info['param']['end_bairro'];
          }
          if (isset($this->NM_ajax_info['param']['end_cep']))
          {
              $this->end_cep = $this->NM_ajax_info['param']['end_cep'];
          }
          if (isset($this->NM_ajax_info['param']['end_cidade']))
          {
              $this->end_cidade = $this->NM_ajax_info['param']['end_cidade'];
          }
          if (isset($this->NM_ajax_info['param']['end_complemento']))
          {
              $this->end_complemento = $this->NM_ajax_info['param']['end_complemento'];
          }
          if (isset($this->NM_ajax_info['param']['end_logradouro']))
          {
              $this->end_logradouro = $this->NM_ajax_info['param']['end_logradouro'];
          }
          if (isset($this->NM_ajax_info['param']['end_numero']))
          {
              $this->end_numero = $this->NM_ajax_info['param']['end_numero'];
          }
          if (isset($this->NM_ajax_info['param']['end_uf']))
          {
              $this->end_uf = $this->NM_ajax_info['param']['end_uf'];
          }
          if (isset($this->NM_ajax_info['param']['id_empreendimento']))
          {
              $this->id_empreendimento = $this->NM_ajax_info['param']['id_empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['id_empreendimentosadmin']))
          {
              $this->id_empreendimentosadmin = $this->NM_ajax_info['param']['id_empreendimentosadmin'];
          }
          if (isset($this->NM_ajax_info['param']['img_logo']))
          {
              $this->img_logo = $this->NM_ajax_info['param']['img_logo'];
          }
          if (isset($this->NM_ajax_info['param']['img_logo_limpa']))
          {
              $this->img_logo_limpa = $this->NM_ajax_info['param']['img_logo_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['img_logo_ul_name']))
          {
              $this->img_logo_ul_name = $this->NM_ajax_info['param']['img_logo_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['img_logo_ul_type']))
          {
              $this->img_logo_ul_type = $this->NM_ajax_info['param']['img_logo_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['img_rg']))
          {
              $this->img_rg = $this->NM_ajax_info['param']['img_rg'];
          }
          if (isset($this->NM_ajax_info['param']['img_rg_limpa']))
          {
              $this->img_rg_limpa = $this->NM_ajax_info['param']['img_rg_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['img_rg_salva']))
          {
              $this->img_rg_salva = $this->NM_ajax_info['param']['img_rg_salva'];
          }
          if (isset($this->NM_ajax_info['param']['img_rg_ul_name']))
          {
              $this->img_rg_ul_name = $this->NM_ajax_info['param']['img_rg_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['img_rg_ul_type']))
          {
              $this->img_rg_ul_type = $this->NM_ajax_info['param']['img_rg_ul_type'];
          }
          if (isset($this->NM_ajax_info['param']['inconformidadeslabelframe']))
          {
              $this->inconformidadeslabelframe = $this->NM_ajax_info['param']['inconformidadeslabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['localizacao']))
          {
              $this->localizacao = $this->NM_ajax_info['param']['localizacao'];
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
          if (isset($this->NM_ajax_info['param']['nom_email']))
          {
              $this->nom_email = $this->NM_ajax_info['param']['nom_email'];
          }
          if (isset($this->NM_ajax_info['param']['nom_empreendimento']))
          {
              $this->nom_empreendimento = $this->NM_ajax_info['param']['nom_empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['num_ativo']))
          {
              $this->num_ativo = $this->NM_ajax_info['param']['num_ativo'];
          }
          if (isset($this->NM_ajax_info['param']['num_cnpj']))
          {
              $this->num_cnpj = $this->NM_ajax_info['param']['num_cnpj'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefonecomercial']))
          {
              $this->num_telefonecomercial = $this->NM_ajax_info['param']['num_telefonecomercial'];
          }
          if (isset($this->NM_ajax_info['param']['num_totvs']))
          {
              $this->num_totvs = $this->NM_ajax_info['param']['num_totvs'];
          }
          if (isset($this->NM_ajax_info['param']['perfildoempreendimento']))
          {
              $this->perfildoempreendimento = $this->NM_ajax_info['param']['perfildoempreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['poelabelframe']))
          {
              $this->poelabelframe = $this->NM_ajax_info['param']['poelabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['pontodeencontro']))
          {
              $this->pontodeencontro = $this->NM_ajax_info['param']['pontodeencontro'];
          }
          if (isset($this->NM_ajax_info['param']['poplabelframe']))
          {
              $this->poplabelframe = $this->NM_ajax_info['param']['poplabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['shaftlabelframe']))
          {
              $this->shaftlabelframe = $this->NM_ajax_info['param']['shaftlabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['torrelabelframe']))
          {
              $this->torrelabelframe = $this->NM_ajax_info['param']['torrelabelframe'];
          }
          if (isset($this->NM_ajax_info['param']['ul_info_upnpt']))
          {
              $this->ul_info_upnpt = $this->NM_ajax_info['param']['ul_info_upnpt'];
          }
          if (isset($this->NM_ajax_info['param']['ul_info_uprelatoriovistoria']))
          {
              $this->ul_info_uprelatoriovistoria = $this->NM_ajax_info['param']['ul_info_uprelatoriovistoria'];
          }
          if (isset($this->NM_ajax_info['param']['upnpt']))
          {
              $this->upnpt = $this->NM_ajax_info['param']['upnpt'];
          }
          if (isset($this->NM_ajax_info['param']['uprelatoriovistoria']))
          {
              $this->uprelatoriovistoria = $this->NM_ajax_info['param']['uprelatoriovistoria'];
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
      if (isset($this->ID_Empreendimento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (isset($_POST["ID_Empreendimento"]) && isset($this->ID_Empreendimento)) 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (!isset($_POST["ID_Empreendimento"]) && isset($_POST["id_empreendimento"])) 
      {
          $_SESSION['ID_Empreendimento'] = $this->id_empreendimento;
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
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['embutida_parms']);
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
                 nm_limpa_str_form_CadEmpreendimentos_etapa1($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
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
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['sc_redir_insert'] = $this->sc_redir_insert;
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
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['parms']);
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
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_CadEmpreendimentos_etapa1_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['upload_field_info'] = array();

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['upload_field_info']['img_logo'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_CadEmpreendimentos_etapa1',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(png|jpg|jpeg)$/i',
          'upload_file_height' => '200',
          'upload_file_width'  => '200',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['upload_field_info']['img_rg'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_CadEmpreendimentos_etapa1',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/\.(png|jpg|jpeg)$/i',
          'upload_file_height' => '300',
          'upload_file_width'  => '300',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['upload_field_info']['upnpt'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_CadEmpreendimentos_etapa1',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'multi',
          'upload_allowed_type'  => '/\.(pdf|doc|docx|docm|zip|rar|txt|gzip|tar)$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N2',
      );

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadEmpreendimentos_etapa1']['upload_field_info']['uprelatoriovistoria'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_CadEmpreendimentos_etapa1',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'multi',
          'upload_allowed_type'  => '/\.(png|jpg|jpeg|pdf|doc|docx|docm|txt)$/i',
          'upload_file_height' => '',
          'upload_file_width'  => '',
          'upload_file_aspect' => '',
          'upload_file_type'   => 'N3',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadEmpreendimentos_etapa1']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadEmpreendimentos_etapa1'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadEmpreendimentos_etapa1']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadEmpreendimentos_etapa1']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_CadEmpreendimentos_etapa1') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadEmpreendimentos_etapa1']['label'] = "Cadastro de Empreendimentos";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_CadEmpreendimentos_etapa1")
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
      $this->nm_new_label['num_cnpj'] = '' . $this->Ini->Nm_lang['lang_label_cnpj'] . '';
      $this->nm_new_label['nom_empreendimento'] = '' . $this->Ini->Nm_lang['lang_label_enterprise'] . '';
      $this->nm_new_label['nom_email'] = '' . $this->Ini->Nm_lang['lang_label_email'] . '';
      $this->nm_new_label['num_telefonecomercial'] = '' . $this->Ini->Nm_lang['lang_label_commercialphone'] . '';
      $this->nm_new_label['end_logradouro'] = '' . $this->Ini->Nm_lang['lang_label_street'] . '';
      $this->nm_new_label['end_numero'] = '' . $this->Ini->Nm_lang['lang_label_number'] . '';
      $this->nm_new_label['end_complemento'] = '' . $this->Ini->Nm_lang['lang_label_complement'] . '';
      $this->nm_new_label['end_bairro'] = '' . $this->Ini->Nm_lang['lang_label_neighborhood'] . '';
      $this->nm_new_label['end_cidade'] = '' . $this->Ini->Nm_lang['lang_label_city'] . '';
      $this->nm_new_label['end_uf'] = '' . $this->Ini->Nm_lang['lang_label_state'] . '';
      $this->nm_new_label['end_cep'] = '' . $this->Ini->Nm_lang['lang_label_cep'] . '';
      $this->nm_new_label['num_totvs'] = '' . $this->Ini->Nm_lang['lang_label_numtotvs'] . '';
      $this->nm_new_label['img_logo'] = '' . $this->Ini->Nm_lang['lang_label_brandlogo'] . '';
      $this->nm_new_label['pontodeencontro'] = '' . $this->Ini->Nm_lang['lang_label_meetingpoint'] . '';
      $this->nm_new_label['perfildoempreendimento'] = '' . $this->Ini->Nm_lang['lang_label_buildingprofile'] . '';
      $this->nm_new_label['id_empreendimentosadmin'] = '' . $this->Ini->Nm_lang['lang_label_administrador'] . '';
      $this->nm_new_label['localizacao'] = '' . $this->Ini->Nm_lang['lang_label_locationmap'] . '';
      $this->nm_new_label['upnpt'] = '' . $this->Ini->Nm_lang['lang_label_NPT_document'] . '';
      $this->nm_new_label['uprelatoriovistoria'] = '' . $this->Ini->Nm_lang['lang_label_relatoriovistoria'] . '';

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

      $this->arr_buttons['excluir']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['excluir']['type']             = "button";
      $this->arr_buttons['excluir']['value']            = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['excluir']['display']          = "only_text";
      $this->arr_buttons['excluir']['display_position'] = "text_right";
      $this->arr_buttons['excluir']['style']            = "default";
      $this->arr_buttons['excluir']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_CadEmpreendimentos_etapa1']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_CadEmpreendimentos_etapa1'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['img_logo_ul_name']) && '' != $this->NM_ajax_info['param']['img_logo_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_logo_ul_name]))
          {
              $this->NM_ajax_info['param']['img_logo_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_logo_ul_name];
          }
          $this->img_logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['img_logo_ul_name'];
          $this->img_logo_scfile_name = substr($this->NM_ajax_info['param']['img_logo_ul_name'], 12);
          $this->img_logo_scfile_type = $this->NM_ajax_info['param']['img_logo_ul_type'];
          $this->img_logo_ul_name = $this->NM_ajax_info['param']['img_logo_ul_name'];
          $this->img_logo_ul_type = $this->NM_ajax_info['param']['img_logo_ul_type'];
      }
      elseif (isset($this->img_logo_ul_name) && '' != $this->img_logo_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_logo_ul_name]))
          {
              $this->img_logo_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_logo_ul_name];
          }
          $this->img_logo = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->img_logo_ul_name;
          $this->img_logo_scfile_name = substr($this->img_logo_ul_name, 12);
          $this->img_logo_scfile_type = $this->img_logo_ul_type;
      }
      if (isset($this->NM_ajax_info['param']['img_rg_ul_name']) && '' != $this->NM_ajax_info['param']['img_rg_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_rg_ul_name]))
          {
              $this->NM_ajax_info['param']['img_rg_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_rg_ul_name];
          }
          $this->img_rg = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['img_rg_ul_name'];
          $this->img_rg_scfile_name = substr($this->NM_ajax_info['param']['img_rg_ul_name'], 12);
          $this->img_rg_scfile_type = $this->NM_ajax_info['param']['img_rg_ul_type'];
          $this->img_rg_ul_name = $this->NM_ajax_info['param']['img_rg_ul_name'];
          $this->img_rg_ul_type = $this->NM_ajax_info['param']['img_rg_ul_type'];
      }
      elseif (isset($this->img_rg_ul_name) && '' != $this->img_rg_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_rg_ul_name]))
          {
              $this->img_rg_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_field_ul_name'][$this->img_rg_ul_name];
          }
          $this->img_rg = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->img_rg_ul_name;
          $this->img_rg_scfile_name = substr($this->img_rg_ul_name, 12);
          $this->img_rg_scfile_type = $this->img_rg_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['goto']      = 'on';
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
      $this->nmgp_botoes['Excluir'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_orig'] = " where ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_pesq'] = " where ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadEmpreendimentos_etapa1']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadEmpreendimentos_etapa1'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadEmpreendimentos_etapa1'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_CadEmpreendimentos_etapa1", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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

      if (is_file($this->Ini->path_aplicacao . 'form_CadEmpreendimentos_etapa1_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_CadEmpreendimentos_etapa1_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_CadEmpreendimentos_etapa1/form_CadEmpreendimentos_etapa1_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_CadEmpreendimentos_etapa1_erro.class.php"); 
      }
      $this->Erro      = new form_CadEmpreendimentos_etapa1_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao']))
         { 
             if ($this->id_empreendimento != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadEmpreendimentos_etapa1']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltar'] = "on";
          $this->nmgp_botoes['salvar'] = "on";
          $this->nmgp_botoes['Excluir'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['botoes']['voltar'];
          $this->nmgp_botoes['salvar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['botoes']['salvar'];
          $this->nmgp_botoes['Excluir'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['botoes']['Excluir'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
      if (isset($this->num_cnpj)) { $this->nm_limpa_alfa($this->num_cnpj); }
      if (isset($this->nom_empreendimento)) { $this->nm_limpa_alfa($this->nom_empreendimento); }
      if (isset($this->nom_email)) { $this->nm_limpa_alfa($this->nom_email); }
      if (isset($this->num_telefonecomercial)) { $this->nm_limpa_alfa($this->num_telefonecomercial); }
      if (isset($this->end_logradouro)) { $this->nm_limpa_alfa($this->end_logradouro); }
      if (isset($this->end_numero)) { $this->nm_limpa_alfa($this->end_numero); }
      if (isset($this->end_complemento)) { $this->nm_limpa_alfa($this->end_complemento); }
      if (isset($this->end_bairro)) { $this->nm_limpa_alfa($this->end_bairro); }
      if (isset($this->end_cidade)) { $this->nm_limpa_alfa($this->end_cidade); }
      if (isset($this->end_uf)) { $this->nm_limpa_alfa($this->end_uf); }
      if (isset($this->end_cep)) { $this->nm_limpa_alfa($this->end_cep); }
      if (isset($this->num_totvs)) { $this->nm_limpa_alfa($this->num_totvs); }
      if (isset($this->id_empreendimentosadmin)) { $this->nm_limpa_alfa($this->id_empreendimentosadmin); }
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_empreendimento
      $this->field_config['id_empreendimento']               = array();
      $this->field_config['id_empreendimento']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_empreendimento']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_empreendimento']['symbol_dec'] = '';
      $this->field_config['id_empreendimento']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_empreendimento']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
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
         $this->torrelabelframe = "&nbsp;";
         $this->poplabelframe = "&nbsp;";
         $this->shaftlabelframe = "&nbsp;";
         $this->antenariolabelframe = "&nbsp;";
         $this->bloqueioopelabelframe = "&nbsp;";
         $this->bloqueioprelabelframe = "&nbsp;";
         $this->bloqueiotecopelabelframe = "&nbsp;";
         $this->bloqueiotecprelabelframe = "&nbsp;";
         $this->inconformidadeslabelframe = "&nbsp;";
         $this->poelabelframe = "&nbsp;";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_nom_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_empreendimento');
          }
          if ('validate_num_cnpj' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_cnpj');
          }
          if ('validate_end_cep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_cep');
          }
          if ('validate_end_logradouro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_logradouro');
          }
          if ('validate_end_numero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_numero');
          }
          if ('validate_end_bairro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_bairro');
          }
          if ('validate_end_complemento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_complemento');
          }
          if ('validate_end_uf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_uf');
          }
          if ('validate_end_cidade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_cidade');
          }
          if ('validate_localizacao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'localizacao');
          }
          if ('validate_nom_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_email');
          }
          if ('validate_num_telefonecomercial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefonecomercial');
          }
          if ('validate_num_totvs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_totvs');
          }
          if ('validate_num_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_ativo');
          }
          if ('validate_perfildoempreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'perfildoempreendimento');
          }
          if ('validate_id_empreendimentosadmin' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empreendimentosadmin');
          }
          if ('validate_img_logo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_logo');
          }
          if ('validate_img_rg' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_rg');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_pontodeencontro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pontodeencontro');
          }
          if ('validate_deleteonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'deleteonclick');
          }
          if ('validate_id_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empreendimento');
          }
          if ('validate_upnpt' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'upnpt');
          }
          if ('validate_uprelatoriovistoria' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'uprelatoriovistoria');
          }
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          if ('event_deleteonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->deleteOnClick_onClick();
          }
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('autocomp_id_empreendimentosadmin' == $this->NM_ajax_opcao)
          {
              $this->id_empreendimentosadmin = ($_SESSION['hticnsdata']['charset'] != "UTF-8") ? NM_utf8_decode(sc_convert_encoding($_GET['term'], $_SESSION['hticnsdata']['charset'], 'UTF-8')) : $_GET['term'];
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin'] = array(); 
    }

   $old_value_num_cnpj = $this->num_cnpj;
   $old_value_end_cep = $this->end_cep;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_id_empreendimento = $this->id_empreendimento;
   $this->nm_tira_formatacao();


   $unformatted_value_num_cnpj = $this->num_cnpj;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_id_empreendimento = $this->id_empreendimento;

   $nm_comando = "SELECT ID, Nom_Admin FROM tb_empreendimentosadmin WHERE (Num_Ativo = 'S') AND Nom_Admin LIKE '%" . substr($this->Db->qstr($this->id_empreendimentosadmin), 1, -1) . "%' ORDER BY Nom_Admin";

   $this->num_cnpj = $old_value_num_cnpj;
   $this->end_cep = $old_value_end_cep;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->id_empreendimento = $old_value_id_empreendimento;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadEmpreendimentos_etapa1_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin'][] = $rs->fields[0];
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
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $this->nm_tira_formatacao();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['upnpt']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->upnpt = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['upnpt'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['img_rg']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->img_rg = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['img_rg'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['uprelatoriovistoria']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->uprelatoriovistoria = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['uprelatoriovistoria'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['img_logo']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->img_logo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select']['img_logo'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
          $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_redir_atualiz'] == "ok")
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
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "./";
      nm_limpa_ciccnpj($this->num_cnpj) ; 
      nm_limpa_cep($this->end_cep) ; 
      $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
          if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultadeEmpreendimentos') . "/", $this->nm_location, "","_self", '', 440, 630);
 };
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id_empreendimento" value="<?php echo $this->form_encode_input($this->id_empreendimento) ?>"/>
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
           case 'nom_empreendimento':
               return "" . $this->Ini->Nm_lang['lang_label_enterprise'] . "";
               break;
           case 'num_cnpj':
               return "" . $this->Ini->Nm_lang['lang_label_cnpj'] . "";
               break;
           case 'end_cep':
               return "" . $this->Ini->Nm_lang['lang_label_cep'] . "";
               break;
           case 'end_logradouro':
               return "" . $this->Ini->Nm_lang['lang_label_street'] . "";
               break;
           case 'end_numero':
               return "" . $this->Ini->Nm_lang['lang_label_number'] . "";
               break;
           case 'end_bairro':
               return "" . $this->Ini->Nm_lang['lang_label_neighborhood'] . "";
               break;
           case 'end_complemento':
               return "" . $this->Ini->Nm_lang['lang_label_complement'] . "";
               break;
           case 'end_uf':
               return "" . $this->Ini->Nm_lang['lang_label_state'] . "";
               break;
           case 'end_cidade':
               return "" . $this->Ini->Nm_lang['lang_label_city'] . "";
               break;
           case 'localizacao':
               return "" . $this->Ini->Nm_lang['lang_label_locationmap'] . "";
               break;
           case 'nom_email':
               return "" . $this->Ini->Nm_lang['lang_label_email'] . "";
               break;
           case 'num_telefonecomercial':
               return "" . $this->Ini->Nm_lang['lang_label_commercialphone'] . "";
               break;
           case 'num_totvs':
               return "" . $this->Ini->Nm_lang['lang_label_numtotvs'] . "";
               break;
           case 'num_ativo':
               return "Status";
               break;
           case 'perfildoempreendimento':
               return "" . $this->Ini->Nm_lang['lang_label_buildingprofile'] . "";
               break;
           case 'id_empreendimentosadmin':
               return "" . $this->Ini->Nm_lang['lang_label_administrador'] . "";
               break;
           case 'img_logo':
               return "" . $this->Ini->Nm_lang['lang_label_brandlogo'] . "";
               break;
           case 'img_rg':
               return "Imagem de capa para o relatório gerencial";
               break;
           case 'torrelabelframe':
               return "torre";
               break;
           case 'poplabelframe':
               return "pop";
               break;
           case 'shaftlabelframe':
               return "shaft";
               break;
           case 'antenariolabelframe':
               return "antenario";
               break;
           case 'bloqueioopelabelframe':
               return "bloqueioOpe";
               break;
           case 'bloqueioprelabelframe':
               return "bloqueioPre";
               break;
           case 'bloqueiotecopelabelframe':
               return "bloqueioTecOpeLabelFrame";
               break;
           case 'bloqueiotecprelabelframe':
               return "bloqueioTecPreLabelFrame";
               break;
           case 'inconformidadeslabelframe':
               return "inconformidades";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'poelabelframe':
               return "poeLabelFrame";
               break;
           case 'pontodeencontro':
               return "" . $this->Ini->Nm_lang['lang_label_meetingpoint'] . "";
               break;
           case 'deleteonclick':
               return "deleteOnClick";
               break;
           case 'id_empreendimento':
               return "ID Empreendimento";
               break;
           case 'upnpt':
               return "" . $this->Ini->Nm_lang['lang_label_NPT_document'] . "";
               break;
           case 'uprelatoriovistoria':
               return "" . $this->Ini->Nm_lang['lang_label_relatoriovistoria'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_CadEmpreendimentos_etapa1']) || !is_array($this->NM_ajax_info['errList']['geral_form_CadEmpreendimentos_etapa1']))
              {
                  $this->NM_ajax_info['errList']['geral_form_CadEmpreendimentos_etapa1'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_CadEmpreendimentos_etapa1'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'nom_empreendimento' == $filtro)
        $this->ValidateField_nom_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_cnpj' == $filtro)
        $this->ValidateField_num_cnpj($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_cep' == $filtro)
        $this->ValidateField_end_cep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_logradouro' == $filtro)
        $this->ValidateField_end_logradouro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_numero' == $filtro)
        $this->ValidateField_end_numero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_bairro' == $filtro)
        $this->ValidateField_end_bairro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_complemento' == $filtro)
        $this->ValidateField_end_complemento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_uf' == $filtro)
        $this->ValidateField_end_uf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_cidade' == $filtro)
        $this->ValidateField_end_cidade($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'localizacao' == $filtro)
        $this->ValidateField_localizacao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_email' == $filtro)
        $this->ValidateField_nom_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefonecomercial' == $filtro)
        $this->ValidateField_num_telefonecomercial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_totvs' == $filtro)
        $this->ValidateField_num_totvs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_ativo' == $filtro)
        $this->ValidateField_num_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'perfildoempreendimento' == $filtro)
        $this->ValidateField_perfildoempreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_empreendimentosadmin' == $filtro)
        $this->ValidateField_id_empreendimentosadmin($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_logo' == $filtro)
        $this->ValidateField_img_logo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_rg' == $filtro)
        $this->ValidateField_img_rg($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pontodeencontro' == $filtro)
        $this->ValidateField_pontodeencontro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'deleteonclick' == $filtro)
        $this->ValidateField_deleteonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_empreendimento' == $filtro)
        $this->ValidateField_id_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'upnpt' == $filtro)
        $this->ValidateField_upnpt($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'uprelatoriovistoria' == $filtro)
        $this->ValidateField_uprelatoriovistoria($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         $this->num_ativo  = $this->num_ativo  ? $this->num_ativo  : 'N';
$this->end_numero  = is_numeric($this->end_numero ) || strtolower($this->end_numero ) == "s/n" ? $this->end_numero  : "S/N";
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
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

    function ValidateField_nom_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nom_empreendimento = sc_strtoupper($this->nom_empreendimento); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_empreendimento) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_enterprise'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_empreendimento']))
              {
                  $Campos_Erros['nom_empreendimento'] = array();
              }
              $Campos_Erros['nom_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_empreendimento']) || !is_array($this->NM_ajax_info['errList']['nom_empreendimento']))
              {
                  $this->NM_ajax_info['errList']['nom_empreendimento'] = array();
              }
              $this->NM_ajax_info['errList']['nom_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_empreendimento

    function ValidateField_num_cnpj(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_ciccnpj($this->num_cnpj) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->num_cnpj) != "")  
          { 
              if ($teste_validade->CNPJ($this->num_cnpj) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_cnpj'] . "; " ; 
                  if (!isset($Campos_Erros['num_cnpj']))
                  {
                      $Campos_Erros['num_cnpj'] = array();
                  }
                  $Campos_Erros['num_cnpj'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['num_cnpj']) || !is_array($this->NM_ajax_info['errList']['num_cnpj']))
                  {
                      $this->NM_ajax_info['errList']['num_cnpj'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_cnpj'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
           } 
      } 
    } // ValidateField_num_cnpj

    function ValidateField_end_cep(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_cep($this->end_cep) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->end_cep) != "")  
          { 
              if (strlen($this->end_cep) != 8  || (int)$this->end_cep == 0)
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_cep'] . "; " ; 
                  if (!isset($Campos_Erros['end_cep']))
                  {
                      $Campos_Erros['end_cep'] = array();
                  }
                  $Campos_Erros['end_cep'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['end_cep']) || !is_array($this->NM_ajax_info['errList']['end_cep']))
                  {
                      $this->NM_ajax_info['errList']['end_cep'] = array();
                  }
                  $this->NM_ajax_info['errList']['end_cep'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_end_cep

    function ValidateField_end_logradouro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->end_logradouro = sc_strtoupper($this->end_logradouro); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_logradouro) > 80) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_street'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_logradouro']))
              {
                  $Campos_Erros['end_logradouro'] = array();
              }
              $Campos_Erros['end_logradouro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_logradouro']) || !is_array($this->NM_ajax_info['errList']['end_logradouro']))
              {
                  $this->NM_ajax_info['errList']['end_logradouro'] = array();
              }
              $this->NM_ajax_info['errList']['end_logradouro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 80 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_logradouro

    function ValidateField_end_numero(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_numero) > 11) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_number'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_numero']))
              {
                  $Campos_Erros['end_numero'] = array();
              }
              $Campos_Erros['end_numero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_numero']) || !is_array($this->NM_ajax_info['errList']['end_numero']))
              {
                  $this->NM_ajax_info['errList']['end_numero'] = array();
              }
              $this->NM_ajax_info['errList']['end_numero'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789Ss/Nn0123456789Ss/Nn";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->end_numero ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->end_numero, $_SESSION['hticnsdata']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['hticnsdata']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_number'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['end_numero']))
              {
                  $Campos_Erros['end_numero'] = array();
              }
              $Campos_Erros['end_numero'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['end_numero']) || !is_array($this->NM_ajax_info['errList']['end_numero']))
              {
                  $this->NM_ajax_info['errList']['end_numero'] = array();
              }
              $this->NM_ajax_info['errList']['end_numero'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_end_numero

    function ValidateField_end_bairro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->end_bairro = sc_strtoupper($this->end_bairro); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_bairro) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_neighborhood'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_bairro']))
              {
                  $Campos_Erros['end_bairro'] = array();
              }
              $Campos_Erros['end_bairro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_bairro']) || !is_array($this->NM_ajax_info['errList']['end_bairro']))
              {
                  $this->NM_ajax_info['errList']['end_bairro'] = array();
              }
              $this->NM_ajax_info['errList']['end_bairro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_bairro

    function ValidateField_end_complemento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->end_complemento = sc_strtoupper($this->end_complemento); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_complemento) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_complement'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_complemento']))
              {
                  $Campos_Erros['end_complemento'] = array();
              }
              $Campos_Erros['end_complemento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_complemento']) || !is_array($this->NM_ajax_info['errList']['end_complemento']))
              {
                  $this->NM_ajax_info['errList']['end_complemento'] = array();
              }
              $this->NM_ajax_info['errList']['end_complemento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_complemento

    function ValidateField_end_uf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->end_uf = sc_strtoupper($this->end_uf); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_uf) > 2) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_state'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_uf']))
              {
                  $Campos_Erros['end_uf'] = array();
              }
              $Campos_Erros['end_uf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_uf']) || !is_array($this->NM_ajax_info['errList']['end_uf']))
              {
                  $this->NM_ajax_info['errList']['end_uf'] = array();
              }
              $this->NM_ajax_info['errList']['end_uf'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 2 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_uf

    function ValidateField_end_cidade(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->end_cidade = sc_strtoupper($this->end_cidade); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_cidade) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_city'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_cidade']))
              {
                  $Campos_Erros['end_cidade'] = array();
              }
              $Campos_Erros['end_cidade'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_cidade']) || !is_array($this->NM_ajax_info['errList']['end_cidade']))
              {
                  $this->NM_ajax_info['errList']['end_cidade'] = array();
              }
              $this->NM_ajax_info['errList']['end_cidade'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_cidade

    function ValidateField_localizacao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->localizacao) != "")  
          { 
          } 
      } 
    } // ValidateField_localizacao

    function ValidateField_nom_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->nom_email) != "")  
          { 
              if ($teste_validade->Email($this->nom_email) == false)  
              { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_email'] . "; " ; 
                  if (!isset($Campos_Erros['nom_email']))
                  {
                      $Campos_Erros['nom_email'] = array();
                  }
                  $Campos_Erros['nom_email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['nom_email']) || !is_array($this->NM_ajax_info['errList']['nom_email']))
                      {
                          $this->NM_ajax_info['errList']['nom_email'] = array();
                      }
                      $this->NM_ajax_info['errList']['nom_email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_nom_email

    function ValidateField_num_telefonecomercial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->num_telefonecomercial, explode(';', "(99) 99999-9999;(99) 9999-9999")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['num_telefonecomercial']))
              {
                  $Campos_Erros['num_telefonecomercial'] = array();
              }
              $Campos_Erros['num_telefonecomercial'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['num_telefonecomercial']) || !is_array($this->NM_ajax_info['errList']['num_telefonecomercial']))
                  {
                      $this->NM_ajax_info['errList']['num_telefonecomercial'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_telefonecomercial'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefonecomercial) > 22) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_commercialphone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 22 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_telefonecomercial']))
              {
                  $Campos_Erros['num_telefonecomercial'] = array();
              }
              $Campos_Erros['num_telefonecomercial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 22 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_telefonecomercial']) || !is_array($this->NM_ajax_info['errList']['num_telefonecomercial']))
              {
                  $this->NM_ajax_info['errList']['num_telefonecomercial'] = array();
              }
              $this->NM_ajax_info['errList']['num_telefonecomercial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 22 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_telefonecomercial

    function ValidateField_num_totvs(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_totvs) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_numtotvs'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_num_ativo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->num_ativo == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_num_ativo

    function ValidateField_perfildoempreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->perfildoempreendimento == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_perfildoempreendimento

    function ValidateField_id_empreendimentosadmin(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->id_empreendimentosadmin) > 11) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_administrador'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_empreendimentosadmin']))
              {
                  $Campos_Erros['id_empreendimentosadmin'] = array();
              }
              $Campos_Erros['id_empreendimentosadmin'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_empreendimentosadmin']) || !is_array($this->NM_ajax_info['errList']['id_empreendimentosadmin']))
              {
                  $this->NM_ajax_info['errList']['id_empreendimentosadmin'] = array();
              }
              $this->NM_ajax_info['errList']['id_empreendimentosadmin'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789áéíóúàèìòùãõâêîôûäëïöüñýÿç .,ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿÇ .,";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->id_empreendimentosadmin ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->id_empreendimentosadmin, $_SESSION['hticnsdata']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['hticnsdata']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_administrador'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['id_empreendimentosadmin']))
              {
                  $Campos_Erros['id_empreendimentosadmin'] = array();
              }
              $Campos_Erros['id_empreendimentosadmin'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['id_empreendimentosadmin']) || !is_array($this->NM_ajax_info['errList']['id_empreendimentosadmin']))
              {
                  $this->NM_ajax_info['errList']['id_empreendimentosadmin'] = array();
              }
              $this->NM_ajax_info['errList']['id_empreendimentosadmin'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_id_empreendimentosadmin

    function ValidateField_img_logo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->img_logo;
            if ("" != $this->img_logo && "S" != $this->img_logo_limpa && !$teste_validade->ArqExtensao($this->img_logo, array('png', 'jpg', 'jpeg')))
            {
                $Campos_Crit .= "{lang_label_brandlogo}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['img_logo']))
                {
                    $Campos_Erros['img_logo'] = array();
                }
                $Campos_Erros['img_logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['img_logo']) || !is_array($this->NM_ajax_info['errList']['img_logo']))
                {
                    $this->NM_ajax_info['errList']['img_logo'] = array();
                }
                $this->NM_ajax_info['errList']['img_logo'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if ("" != $this->img_logo && "S" != $this->img_logo_limpa && method_exists($teste_validade, 'ArqTamanho') && !$teste_validade->ArqTamanho($sTestFile, 52428800))
            {
                $Campos_Crit .= "{lang_label_brandlogo}: " . $this->Ini->Nm_lang['lang_errm_file_size']; 
                if (!isset($Campos_Erros['img_logo']))
                {
                    $Campos_Erros['img_logo'] = array();
                }
                $Campos_Erros['img_logo'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
                if (!isset($this->NM_ajax_info['errList']['img_logo']) || !is_array($this->NM_ajax_info['errList']['img_logo']))
                {
                    $this->NM_ajax_info['errList']['img_logo'] = array();
                }
                $this->NM_ajax_info['errList']['img_logo'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
            }
        }
    } // ValidateField_img_logo

    function ValidateField_img_rg(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->img_rg;
            if ("" != $this->img_rg && "S" != $this->img_rg_limpa && !$teste_validade->ArqExtensao($this->img_rg, array('png', 'jpg', 'jpeg')))
            {
                $Campos_Crit .= "Imagem de capa para o relatório gerencial: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['img_rg']))
                {
                    $Campos_Erros['img_rg'] = array();
                }
                $Campos_Erros['img_rg'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['img_rg']) || !is_array($this->NM_ajax_info['errList']['img_rg']))
                {
                    $this->NM_ajax_info['errList']['img_rg'] = array();
                }
                $this->NM_ajax_info['errList']['img_rg'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if ("" != $this->img_rg && "S" != $this->img_rg_limpa && method_exists($teste_validade, 'ArqTamanho') && !$teste_validade->ArqTamanho($sTestFile, 52428800))
            {
                $Campos_Crit .= "Imagem de capa para o relatório gerencial: " . $this->Ini->Nm_lang['lang_errm_file_size']; 
                if (!isset($Campos_Erros['img_rg']))
                {
                    $Campos_Erros['img_rg'] = array();
                }
                $Campos_Erros['img_rg'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
                if (!isset($this->NM_ajax_info['errList']['img_rg']) || !is_array($this->NM_ajax_info['errList']['img_rg']))
                {
                    $this->NM_ajax_info['errList']['img_rg'] = array();
                }
                $this->NM_ajax_info['errList']['img_rg'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
            }
        }
    } // ValidateField_img_rg

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

    function ValidateField_pontodeencontro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pontodeencontro) > 32767) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_meetingpoint'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pontodeencontro']))
              {
                  $Campos_Erros['pontodeencontro'] = array();
              }
              $Campos_Erros['pontodeencontro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pontodeencontro']) || !is_array($this->NM_ajax_info['errList']['pontodeencontro']))
              {
                  $this->NM_ajax_info['errList']['pontodeencontro'] = array();
              }
              $this->NM_ajax_info['errList']['pontodeencontro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pontodeencontro

    function ValidateField_deleteonclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->deleteonclick) > 20) 
          { 
              $Campos_Crit .= "deleteOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['deleteonclick']))
              {
                  $Campos_Erros['deleteonclick'] = array();
              }
              $Campos_Erros['deleteonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['deleteonclick']) || !is_array($this->NM_ajax_info['errList']['deleteonclick']))
              {
                  $this->NM_ajax_info['errList']['deleteonclick'] = array();
              }
              $this->NM_ajax_info['errList']['deleteonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_deleteonclick

    function ValidateField_id_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_empreendimento == "")  
      { 
          $this->id_empreendimento = 0;
      } 
      nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
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
              if ($teste_validade->Valor($this->id_empreendimento, 11, 0, 0, 0, "N") == false)  
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

    function ValidateField_upnpt(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $bMU_addingFiles = false;
        $bMU_hasFiles    = false;
        if ($this->nmgp_opcao != "excluir")
        {
          if ('' != trim($this->ul_info_upnpt))
          {
              $aUlList = explode('@scl@', $this->ul_info_upnpt);
              foreach ($aUlList as $sUlItem)
              {
                  $aUlInfo = explode('@sci@', $sUlItem);
                  if ('add' == $aUlInfo[0] && !$teste_validade->ArqExtensao($aUlInfo[1], array('pdf', 'doc', 'docx', 'docm', 'zip', 'rar', 'txt', 'gzip', 'tar')))
                  {
                      $Campos_Crit .= "{lang_label_NPT_document}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                      if (!isset($Campos_Erros['upnpt']))
                      {
                          $Campos_Erros['upnpt'] = array();
                      }
                      $Campos_Erros['upnpt'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                      if (!isset($this->NM_ajax_info['errList']['upnpt']) || !is_array($this->NM_ajax_info['errList']['upnpt']))
                      {
                          $this->NM_ajax_info['errList']['upnpt'] = array();
                      }
                      $this->NM_ajax_info['errList']['upnpt'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
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
              $old_value_num_cnpj = $this->num_cnpj;
              $old_value_end_cep = $this->end_cep;
              $old_value_num_telefonecomercial = $this->num_telefonecomercial;
              $old_value_id_empreendimento = $this->id_empreendimento;
              $this->nm_tira_formatacao();
              $comando_multiul = "SELECT COUNT(*) FROM tb_npt WHERE ID_Empreendimento = " . $this->id_empreendimento . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->num_cnpj = $old_value_num_cnpj;
              $this->end_cep = $old_value_end_cep;
              $this->num_telefonecomercial = $old_value_num_telefonecomercial;
              $this->id_empreendimento = $old_value_id_empreendimento;
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                  }
                  exit;
              }
              $bMU_hasFiles = $rs_mu->fields[0] > 0;
              $rs_mu->Close();
          }
        }
    } // ValidateField_upnpt

    function ValidateField_uprelatoriovistoria(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $bMU_addingFiles = false;
        $bMU_hasFiles    = false;
        if ($this->nmgp_opcao != "excluir")
        {
          if ('' != trim($this->ul_info_uprelatoriovistoria))
          {
              $aUlList = explode('@scl@', $this->ul_info_uprelatoriovistoria);
              foreach ($aUlList as $sUlItem)
              {
                  $aUlInfo = explode('@sci@', $sUlItem);
                  if ('add' == $aUlInfo[0] && !$teste_validade->ArqExtensao($aUlInfo[1], array('png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx', 'docm', 'txt')))
                  {
                      $Campos_Crit .= "{lang_label_relatoriovistoria}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                      if (!isset($Campos_Erros['uprelatoriovistoria']))
                      {
                          $Campos_Erros['uprelatoriovistoria'] = array();
                      }
                      $Campos_Erros['uprelatoriovistoria'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                      if (!isset($this->NM_ajax_info['errList']['uprelatoriovistoria']) || !is_array($this->NM_ajax_info['errList']['uprelatoriovistoria']))
                      {
                          $this->NM_ajax_info['errList']['uprelatoriovistoria'] = array();
                      }
                      $this->NM_ajax_info['errList']['uprelatoriovistoria'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
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
              $old_value_num_cnpj = $this->num_cnpj;
              $old_value_end_cep = $this->end_cep;
              $old_value_num_telefonecomercial = $this->num_telefonecomercial;
              $old_value_id_empreendimento = $this->id_empreendimento;
              $this->nm_tira_formatacao();
              $comando_multiul = "SELECT COUNT(*) FROM tb_filesrelatoriovistorias WHERE ID_Empreendimento = " . $this->id_empreendimento . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->num_cnpj = $old_value_num_cnpj;
              $this->end_cep = $old_value_end_cep;
              $this->num_telefonecomercial = $old_value_num_telefonecomercial;
              $this->id_empreendimento = $old_value_id_empreendimento;
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                  }
                  exit;
              }
              $bMU_hasFiles = $rs_mu->fields[0] > 0;
              $rs_mu->Close();
          }
        }
    } // ValidateField_uprelatoriovistoria
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
          if ($this->img_logo == "none") 
          { 
              $this->img_logo = ""; 
          } 
          if ($this->img_logo != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_CadEmpreendimentos_etapa1_doc_name.php';
              }
              $this->img_logo = sc_upload_unprotect_chars($this->img_logo);
              $this->img_logo_scfile_name = sc_upload_unprotect_chars($this->img_logo_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->img_logo_scfile_type = substr($this->img_logo_scfile_type, 0, strpos($this->img_logo_scfile_type, ";")) ; 
              } 
              if ($this->img_logo_scfile_type == "image/pjpeg" || $this->img_logo_scfile_type == "image/jpeg" || $this->img_logo_scfile_type == "image/gif" ||  
                  $this->img_logo_scfile_type == "image/png" || $this->img_logo_scfile_type == "image/x-png" || $this->img_logo_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->img_logo))  
                  { 
                      $reg_img_logo = file_get_contents($this->img_logo); 
                      $this->img_logo = $reg_img_logo; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_brandlogo'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->img_logo = "";
                      if (!isset($Campos_Erros['img_logo']))
                      {
                          $Campos_Erros['img_logo'] = array();
                      }
                      $Campos_Erros['img_logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['img_logo']) || !is_array($this->NM_ajax_info['errList']['img_logo']))
                      {
                          $this->NM_ajax_info['errList']['img_logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['img_logo'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->img_logo = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_brandlogo'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['img_logo']))
                      {
                          $Campos_Erros['img_logo'] = array();
                      }
                      $Campos_Erros['img_logo'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['img_logo']) || !is_array($this->NM_ajax_info['errList']['img_logo']))
                      {
                          $this->NM_ajax_info['errList']['img_logo'] = array();
                      }
                      $this->NM_ajax_info['errList']['img_logo'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form']['img_logo']) && $this->img_logo_limpa != "S")
          {
              $this->img_logo = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form']['img_logo'];
          }
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->img_rg == "none") 
          { 
              $this->img_rg = ""; 
          } 
          if ($this->img_rg != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_CadEmpreendimentos_etapa1_doc_name.php';
              }
              $this->img_rg = sc_upload_unprotect_chars($this->img_rg);
              $this->img_rg_scfile_name = sc_upload_unprotect_chars($this->img_rg_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->img_rg_scfile_type = substr($this->img_rg_scfile_type, 0, strpos($this->img_rg_scfile_type, ";")) ; 
              } 
              if ($this->img_rg_scfile_type == "image/pjpeg" || $this->img_rg_scfile_type == "image/jpeg" || $this->img_rg_scfile_type == "image/gif" ||  
                  $this->img_rg_scfile_type == "image/png" || $this->img_rg_scfile_type == "image/x-png" || $this->img_rg_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->img_rg))  
                  { 
                      if ($this->nmgp_opcao == "incluir")
                      { 
                          $this->SC_IMG_img_rg = $this->img_rg;
                      } 
                      else 
                      { 
                          $arq_img_rg = fopen($this->img_rg, "r") ; 
                          $reg_img_rg = fread($arq_img_rg, filesize($this->img_rg)) ; 
                          fclose($arq_img_rg) ;  
                      } 
                      $this->img_rg =  trim($this->img_rg_scfile_name) ;  
                      $dir_img = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/"; 
                     if ($this->nmgp_opcao != "incluir")
                     { 
                      if (nm_mkdir($dir_img))  
                      { 
                          $_test_file = $this->fetchUniqueUploadName($this->img_rg_scfile_name, $dir_img, "img_rg");
                          if (trim($this->img_rg_scfile_name) != $_test_file)
                          {
                              $this->img_rg_scfile_name = $_test_file;
                              $this->img_rg = $_test_file;
                          }
                          $arq_img_rg = fopen($dir_img . trim($this->img_rg_scfile_name), "w") ; 
                          fwrite($arq_img_rg, $reg_img_rg) ;  
                          fclose($arq_img_rg) ;  
                      } 
                      else 
                      { 
                          $Campos_Crit .= "Imagem de capa para o relatório gerencial: " . $this->Ini->Nm_lang['lang_errm_ivdr']; 
                          $this->img_rg = "";
                          if (!isset($Campos_Erros['img_rg']))
                          {
                              $Campos_Erros['img_rg'] = array();
                          }
                          $Campos_Erros['img_rg'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                          if (!isset($this->NM_ajax_info['errList']['img_rg']) || !is_array($this->NM_ajax_info['errList']['img_rg']))
                          {
                              $this->NM_ajax_info['errList']['img_rg'] = array();
                          }
                          $this->NM_ajax_info['errList']['img_rg'][] = $this->Ini->Nm_lang['lang_errm_ivdr'];
                      } 
                     } 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Imagem de capa para o relatório gerencial " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->img_rg = "";
                      if (!isset($Campos_Erros['img_rg']))
                      {
                          $Campos_Erros['img_rg'] = array();
                      }
                      $Campos_Erros['img_rg'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['img_rg']) || !is_array($this->NM_ajax_info['errList']['img_rg']))
                      {
                          $this->NM_ajax_info['errList']['img_rg'] = array();
                      }
                      $this->NM_ajax_info['errList']['img_rg'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->img_rg = "" ; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "Imagem de capa para o relatório gerencial " . $this->Ini->Nm_lang['lang_errm_ivtp']; 
                      if (!isset($Campos_Erros['img_rg']))
                      {
                          $Campos_Erros['img_rg'] = array();
                      }
                      $Campos_Erros['img_rg'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                      if (!isset($this->NM_ajax_info['errList']['img_rg']) || !is_array($this->NM_ajax_info['errList']['img_rg']))
                      {
                          $this->NM_ajax_info['errList']['img_rg'] = array();
                      }
                      $this->NM_ajax_info['errList']['img_rg'][] = $this->Ini->Nm_lang['geracao_tp_inval'];
                  } 
              } 
          } 
          elseif (!empty($this->img_rg_salva) && $this->img_rg_limpa != "S")
          {
              $this->img_rg = $this->img_rg_salva;
          }
      } 
      elseif (!empty($this->img_rg_salva) && $this->img_rg_limpa != "S")
      {
          $this->img_rg = $this->img_rg_salva;
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
    $this->nmgp_dados_form['nom_empreendimento'] = $this->nom_empreendimento;
    $this->nmgp_dados_form['num_cnpj'] = $this->num_cnpj;
    $this->nmgp_dados_form['end_cep'] = $this->end_cep;
    $this->nmgp_dados_form['end_logradouro'] = $this->end_logradouro;
    $this->nmgp_dados_form['end_numero'] = $this->end_numero;
    $this->nmgp_dados_form['end_bairro'] = $this->end_bairro;
    $this->nmgp_dados_form['end_complemento'] = $this->end_complemento;
    $this->nmgp_dados_form['end_uf'] = $this->end_uf;
    $this->nmgp_dados_form['end_cidade'] = $this->end_cidade;
    $this->nmgp_dados_form['localizacao'] = $this->localizacao;
    $this->nmgp_dados_form['nom_email'] = $this->nom_email;
    $this->nmgp_dados_form['num_telefonecomercial'] = $this->num_telefonecomercial;
    $this->nmgp_dados_form['num_totvs'] = $this->num_totvs;
    $this->nmgp_dados_form['num_ativo'] = $this->num_ativo;
    $this->nmgp_dados_form['perfildoempreendimento'] = $this->perfildoempreendimento;
    $this->nmgp_dados_form['id_empreendimentosadmin'] = $this->id_empreendimentosadmin;
    if (empty($this->img_logo))
    {
        $this->img_logo = $this->nmgp_dados_form['img_logo'];
    }
    $this->nmgp_dados_form['img_logo'] = $this->img_logo;
    $this->nmgp_dados_form['img_logo_limpa'] = $this->img_logo_limpa;
    if (empty($this->img_rg))
    {
        $this->img_rg = $this->nmgp_dados_form['img_rg'];
    }
    $this->nmgp_dados_form['img_rg'] = $this->img_rg;
    $this->nmgp_dados_form['img_rg_limpa'] = $this->img_rg_limpa;
    $this->nmgp_dados_form['torrelabelframe'] = $this->torrelabelframe;
    $this->nmgp_dados_form['poplabelframe'] = $this->poplabelframe;
    $this->nmgp_dados_form['shaftlabelframe'] = $this->shaftlabelframe;
    $this->nmgp_dados_form['antenariolabelframe'] = $this->antenariolabelframe;
    $this->nmgp_dados_form['bloqueioopelabelframe'] = $this->bloqueioopelabelframe;
    $this->nmgp_dados_form['bloqueioprelabelframe'] = $this->bloqueioprelabelframe;
    $this->nmgp_dados_form['bloqueiotecopelabelframe'] = $this->bloqueiotecopelabelframe;
    $this->nmgp_dados_form['bloqueiotecprelabelframe'] = $this->bloqueiotecprelabelframe;
    $this->nmgp_dados_form['inconformidadeslabelframe'] = $this->inconformidadeslabelframe;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['poelabelframe'] = $this->poelabelframe;
    $this->nmgp_dados_form['pontodeencontro'] = $this->pontodeencontro;
    $this->nmgp_dados_form['deleteonclick'] = $this->deleteonclick;
    $this->nmgp_dados_form['id_empreendimento'] = $this->id_empreendimento;
    $this->nmgp_dados_form['upnpt'] = $this->upnpt;
    $this->nmgp_dados_form['uprelatoriovistoria'] = $this->uprelatoriovistoria;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_ciccnpj($this->num_cnpj) ; 
      nm_limpa_cep($this->end_cep) ; 
      $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp']) ; 
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
      if ($Nome_Campo == "num_cnpj")
      {
          nm_limpa_ciccnpj($this->num_cnpj) ; 
      }
      if ($Nome_Campo == "end_cep")
      {
          nm_limpa_cep($this->end_cep) ; 
      }
      if ($Nome_Campo == "num_telefonecomercial")
      {
          $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
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
      if (!empty($this->num_cnpj) || (!empty($format_fields) && isset($format_fields['num_cnpj'])))
      {
          nmgp_Form_CicCnpj($this->num_cnpj) ; 
      }
      if (!empty($this->end_cep) || (!empty($format_fields) && isset($format_fields['end_cep'])))
      {
          nmgp_Form_Cep($this->end_cep) ; 
      }
      if (!empty($this->num_telefonecomercial) || (!empty($format_fields) && isset($format_fields['num_telefonecomercial'])))
      {
          $this->nm_gera_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999"); 
      }
      if (!empty($this->id_empreendimento) || (!empty($format_fields) && isset($format_fields['id_empreendimento'])))
      {
          nmgp_Form_Num_Val($this->id_empreendimento, $this->field_config['id_empreendimento']['symbol_grp'], $this->field_config['id_empreendimento']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_empreendimento']['symbol_fmt']) ; 
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
          $this->ajax_return_values_nom_empreendimento();
          $this->ajax_return_values_num_cnpj();
          $this->ajax_return_values_end_cep();
          $this->ajax_return_values_end_logradouro();
          $this->ajax_return_values_end_numero();
          $this->ajax_return_values_end_bairro();
          $this->ajax_return_values_end_complemento();
          $this->ajax_return_values_end_uf();
          $this->ajax_return_values_end_cidade();
          $this->ajax_return_values_localizacao();
          $this->ajax_return_values_nom_email();
          $this->ajax_return_values_num_telefonecomercial();
          $this->ajax_return_values_num_totvs();
          $this->ajax_return_values_num_ativo();
          $this->ajax_return_values_perfildoempreendimento();
          $this->ajax_return_values_id_empreendimentosadmin();
          $this->ajax_return_values_img_logo();
          $this->ajax_return_values_img_rg();
          $this->ajax_return_values_torrelabelframe();
          $this->ajax_return_values_poplabelframe();
          $this->ajax_return_values_shaftlabelframe();
          $this->ajax_return_values_antenariolabelframe();
          $this->ajax_return_values_bloqueioopelabelframe();
          $this->ajax_return_values_bloqueioprelabelframe();
          $this->ajax_return_values_bloqueiotecopelabelframe();
          $this->ajax_return_values_bloqueiotecprelabelframe();
          $this->ajax_return_values_inconformidadeslabelframe();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_poelabelframe();
          $this->ajax_return_values_pontodeencontro();
          $this->ajax_return_values_deleteonclick();
          $this->ajax_return_values_id_empreendimento();
          $this->ajax_return_values_upnpt();
          $this->ajax_return_values_uprelatoriovistoria();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_empreendimento']['keyVal'] = form_CadEmpreendimentos_etapa1_pack_protect_string($this->nmgp_dados_form['id_empreendimento']);
          }
   } // ajax_return_values

          //----- nom_empreendimento
   function ajax_return_values_nom_empreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_empreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_empreendimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_empreendimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_cnpj
   function ajax_return_values_num_cnpj($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_cnpj", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_cnpj);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_cnpj'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- end_cep
   function ajax_return_values_end_cep($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_cep", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_cep);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_cep'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- end_logradouro
   function ajax_return_values_end_logradouro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_logradouro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_logradouro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_logradouro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- end_numero
   function ajax_return_values_end_numero($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_numero", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_numero);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_numero'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- end_bairro
   function ajax_return_values_end_bairro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_bairro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_bairro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_bairro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- end_complemento
   function ajax_return_values_end_complemento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_complemento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_complemento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_complemento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- end_uf
   function ajax_return_values_end_uf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_uf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_uf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_uf'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- end_cidade
   function ajax_return_values_end_cidade($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("end_cidade", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->end_cidade);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['end_cidade'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- localizacao
   function ajax_return_values_localizacao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("localizacao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->localizacao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['localizacao'] = array(
                       'row'    => '',
               'type'    => 'googlemaps',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nom_email
   function ajax_return_values_nom_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- num_telefonecomercial
   function ajax_return_values_num_telefonecomercial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_telefonecomercial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_telefonecomercial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_telefonecomercial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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

          //----- num_ativo
   function ajax_return_values_num_ativo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_ativo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_ativo);
              $aLookup = array();
              $this->_tmp_lookup_num_ativo = $this->num_ativo;

$aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string('S') => form_CadEmpreendimentos_etapa1_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_active'] . ""));
$aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string('N') => form_CadEmpreendimentos_etapa1_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_inactive'] . ""));
$aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string('P') => form_CadEmpreendimentos_etapa1_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_prospect'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_num_ativo'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_num_ativo'][] = 'N';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_num_ativo'][] = 'P';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"num_ativo\"";
          if (isset($this->NM_ajax_info['select_html']['num_ativo']) && !empty($this->NM_ajax_info['select_html']['num_ativo']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['num_ativo'];
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

                  if ($this->num_ativo == $sValue)
                  {
                      $this->_tmp_lookup_num_ativo = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['num_ativo'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['num_ativo']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['num_ativo']['valList'][$i] = form_CadEmpreendimentos_etapa1_pack_protect_string($v);
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

          //----- perfildoempreendimento
   function ajax_return_values_perfildoempreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("perfildoempreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->perfildoempreendimento);
              $aLookup = array();
              $this->_tmp_lookup_perfildoempreendimento = $this->perfildoempreendimento;

$aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string('G') => form_CadEmpreendimentos_etapa1_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_big'] . ""));
$aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string('M') => form_CadEmpreendimentos_etapa1_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_medium'] . ""));
$aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string('P') => form_CadEmpreendimentos_etapa1_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_little'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_perfildoempreendimento'][] = 'G';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_perfildoempreendimento'][] = 'M';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_perfildoempreendimento'][] = 'P';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"perfildoempreendimento\"";
          if (isset($this->NM_ajax_info['select_html']['perfildoempreendimento']) && !empty($this->NM_ajax_info['select_html']['perfildoempreendimento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['perfildoempreendimento'];
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

                  if ($this->perfildoempreendimento == $sValue)
                  {
                      $this->_tmp_lookup_perfildoempreendimento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['perfildoempreendimento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['perfildoempreendimento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['perfildoempreendimento']['valList'][$i] = form_CadEmpreendimentos_etapa1_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['perfildoempreendimento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['perfildoempreendimento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['perfildoempreendimento']['labList'] = $aLabel;
          }
   }

          //----- id_empreendimentosadmin
   function ajax_return_values_id_empreendimentosadmin($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_empreendimentosadmin", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_empreendimentosadmin);
              $aLookup = array();
              $this->_tmp_lookup_id_empreendimentosadmin = $this->id_empreendimentosadmin;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin'] = array(); 
    }

   $old_value_num_cnpj = $this->num_cnpj;
   $old_value_end_cep = $this->end_cep;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_id_empreendimento = $this->id_empreendimento;
   $this->nm_tira_formatacao();


   $unformatted_value_num_cnpj = $this->num_cnpj;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_id_empreendimento = $this->id_empreendimento;

   $nm_comando = "SELECT ID, Nom_Admin FROM tb_empreendimentosadmin WHERE (Num_Ativo = 'S') AND ID = " . substr($this->Db->qstr($this->id_empreendimentosadmin), 1, -1) . " ORDER BY Nom_Admin";

   $this->num_cnpj = $old_value_num_cnpj;
   $this->end_cep = $old_value_end_cep;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->id_empreendimento = $old_value_id_empreendimento;

   if ('' != $this->id_empreendimentosadmin)
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
              $aLookup[] = array(form_CadEmpreendimentos_etapa1_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadEmpreendimentos_etapa1_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['Lookup_id_empreendimentosadmin'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['id_empreendimentosadmin'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_empreendimentosadmin']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_empreendimentosadmin']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_empreendimentosadmin']['labList'] = $aLabel;
          $val_output = isset($aLookup[0][form_CadEmpreendimentos_etapa1_pack_protect_string(NM_charset_to_utf8($this->id_empreendimentosadmin))]) ? $aLookup[0][form_CadEmpreendimentos_etapa1_pack_protect_string(NM_charset_to_utf8($this->id_empreendimentosadmin))] : "";
          $this->NM_ajax_info['fldList']['id_empreendimentosadmin_autocomp'] = array(
               'type'    => 'text',
               'valList' => array($val_output),
              );
          }
   }

          //----- img_logo
   function ajax_return_values_img_logo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_logo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_logo);
              $aLookup = array();
   $out_img_logo = '';
   $out1_img_logo = '';
   if ($this->img_logo != "" && $this->img_logo != "none")   
   { 
       $out_img_logo = $this->Ini->path_imag_temp . "/sc_img_logo_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_img_logo = $out_img_logo; 
       $arq_img_logo = fopen($this->Ini->root . $out_img_logo, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->img_logo, 0, 12));
           if (substr($this->img_logo, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->img_logo = nm_conv_img_access($this->img_logo);
           } 
       } 
       if (substr($this->img_logo, 0, 4) == "*nm*") 
       { 
           $this->img_logo = substr($this->img_logo, 4) ; 
           $this->img_logo = base64_decode($this->img_logo) ; 
       } 
       $img_pos_bm = strpos($this->img_logo, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->img_logo = substr($this->img_logo, $img_pos_bm) ; 
       } 
       fwrite($arq_img_logo, $this->img_logo) ;  
       fclose($arq_img_logo) ;  
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       $out_img_logo = $this->Ini->path_imag_temp . "/sc_" . "img_logo_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_img_logo);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_img_logo);
       } 
       else 
       { 
           $out_img_logo = $out1_img_logo;
       } 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_logo'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_img_logo,
               'imgOrig' => $out1_img_logo,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- img_rg
   function ajax_return_values_img_rg($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_rg", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_rg);
              $aLookup = array();
   $out_img_rg = '';
   $out1_img_rg = '';
   if ($this->img_rg != "" && $this->img_rg != "none")   
   { 
       $path_img_rg = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/" . $this->img_rg;
       $md5_img_rg  = md5("/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . $this->img_rg);
       if (is_file($path_img_rg))  
       { 
           $NM_ler_img = true;
           $out_img_rg = $this->Ini->path_imag_temp . "/sc_img_rg_" . $md5_img_rg . ".gif" ;  
           $out1_img_rg = $out_img_rg; 
           if (is_file($this->Ini->root . $out_img_rg))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_img_rg) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_img_rg = fopen($path_img_rg, "r") ; 
               $reg_img_rg = fread($tmp_img_rg, filesize($path_img_rg)) ; 
               fclose($tmp_img_rg) ;  
               $arq_img_rg = fopen($this->Ini->root . $out_img_rg, "w") ;  
               fwrite($arq_img_rg, $reg_img_rg) ;  
               fclose($arq_img_rg) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_img_rg);
           $this->nmgp_return_img['img_rg'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['img_rg'][1] = $sc_obj_img->getWidth();
           $NM_redim_img = true;
           $md5_img_rg  = md5("/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria" . $this->img_rg);
           $out_img_rg = $this->Ini->path_imag_temp . "/sc_img_rg_300300" . $md5_img_rg . ".gif" ;  
           if (is_file($this->Ini->root . $out_img_rg))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_img_rg) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_redim_img = false;
               } 
           } 
           if ($NM_redim_img) 
           { 
               if (!$this->Ini->Gd_missing)
               { 
                   $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_img_rg);
                   $sc_obj_img->setWidth(300);
                   $sc_obj_img->setHeight(300);
                   $sc_obj_img->setManterAspecto(true);
                   $sc_obj_img->createImg($this->Ini->root . $out_img_rg);
               } 
               else 
               { 
                   $out_img_rg = $out1_img_rg;
               } 
           } 
       } 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_rg'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($sTmpValue),
               'imgFile' => $out_img_rg,
               'imgOrig' => $out1_img_rg,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- torrelabelframe
   function ajax_return_values_torrelabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("torrelabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->torrelabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['torrelabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- poplabelframe
   function ajax_return_values_poplabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("poplabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->poplabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['poplabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- shaftlabelframe
   function ajax_return_values_shaftlabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("shaftlabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->shaftlabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['shaftlabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- antenariolabelframe
   function ajax_return_values_antenariolabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("antenariolabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->antenariolabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['antenariolabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bloqueioopelabelframe
   function ajax_return_values_bloqueioopelabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bloqueioopelabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bloqueioopelabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bloqueioopelabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bloqueioprelabelframe
   function ajax_return_values_bloqueioprelabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bloqueioprelabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bloqueioprelabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bloqueioprelabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bloqueiotecopelabelframe
   function ajax_return_values_bloqueiotecopelabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bloqueiotecopelabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bloqueiotecopelabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bloqueiotecopelabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- bloqueiotecprelabelframe
   function ajax_return_values_bloqueiotecprelabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bloqueiotecprelabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bloqueiotecprelabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bloqueiotecprelabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- inconformidadeslabelframe
   function ajax_return_values_inconformidadeslabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("inconformidadeslabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->inconformidadeslabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['inconformidadeslabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
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

          //----- poelabelframe
   function ajax_return_values_poelabelframe($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("poelabelframe", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->poelabelframe);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['poelabelframe'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- pontodeencontro
   function ajax_return_values_pontodeencontro($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pontodeencontro", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pontodeencontro);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pontodeencontro'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- deleteonclick
   function ajax_return_values_deleteonclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("deleteonclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->deleteonclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['deleteonclick'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- upnpt
   function ajax_return_values_upnpt($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("upnpt", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->upnpt);
              $aLookup = array();
              $this->nm_tira_formatacao();
              $comando_multiul = "SELECT ID, Arquivo FROM tb_npt WHERE ID_Empreendimento = " . $this->id_empreendimento . " ORDER BY ID ASC";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->nm_formatar_campos();
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                  $muFile      = 'sc_upnpt_' . md5(mt_rand(1, 1000) . microtime() . session_id());
                  $muFileTN    = $muFile . '_tn' . $muExtension;
                  $muFile      = $muFile . $muExtension;
                  if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['download_filenames']))
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['download_filenames'] = array();
                  }
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['download_filenames'][$muFile] = $muData;
                  $muSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                  $muDirOrig = $this->Ini->path_doc . $muSubDir . '/';
                  if (!@is_dir($muDirOrig))
                  {
                      @mkdir($muDirOrig);
                  }
                  @copy($muDirOrig . $muData, $this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFile);
                  $muLink = "javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", substr($muFile, 3)) . "', 'form_CadEmpreendimentos_etapa1')";
                  $muLabel .= '<img src="' . $this->gera_icone($muFile) . '" style="border-width: 0">';
                  $muLabel .= $muData;
                  $muHtmlItem  = '<span class="id_mu_item_upnpt">';
                  $muHtmlItem .= '<span class="id_mu_data_upnpt">';
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
                  $muHtmlItem   .= '<span class="id_mu_all_chkbx_upnpt"><input type="checkbox" id="id_mu_chkbx_opt_upnpt_' . $muItemCount . '" class="id_mu_chkbx_upnpt" value="' . $muKey . '" /><label for="id_mu_chkbx_opt_upnpt_' . $muItemCount . '">' . $this->Ini->Nm_lang['lang_errm_mu_delfile'] . '</label></span>';
                  $muHtmlItem   .= '</span>';
                  $muHtmlArray[] = $muHtmlItem;
                  $rs_mu->MoveNext();
                  $muItemCount++;
              }
              $muHtml = implode('<br />', $muHtmlArray);
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['upnpt'] = array(
                       'row'    => '',
               'type'    => 'multi_upload',
               'valList' => array($sTmpValue),
               'mulHtml' => $muHtml,
              );
          }
   }

          //----- uprelatoriovistoria
   function ajax_return_values_uprelatoriovistoria($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("uprelatoriovistoria", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->uprelatoriovistoria);
              $aLookup = array();
              $this->nm_tira_formatacao();
              $comando_multiul = "SELECT ID, File_Name FROM tb_filesrelatoriovistorias WHERE ID_Empreendimento = " . $this->id_empreendimento . " ORDER BY ID ASC";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $comando_multiul;
              $this->nm_formatar_campos();
              $rs_mu = $this->Db->Execute($comando_multiul);
              if ($rs_mu === false && !$rs_mu->EOF)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, 'banco', $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                  $muFile      = 'sc_uprelatoriovistoria_' . md5(mt_rand(1, 1000) . microtime() . session_id());
                  $muFileTN    = $muFile . '_tn' . $muExtension;
                  $muFile      = $muFile . $muExtension;
                  if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['download_filenames']))
                  {
                      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['download_filenames'] = array();
                  }
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['download_filenames'][$muFile] = $muData;
                  $muSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                  $muDirOrig = $this->Ini->path_doc . $muSubDir . '/';
                  if (!@is_dir($muDirOrig))
                  {
                      @mkdir($muDirOrig);
                  }
                  @copy($muDirOrig . $muData, $this->Ini->root . $this->Ini->path_imag_temp . '/' . $muFile);
                  $muLink = "javascript:nm_mostra_doc('documento_db', '" . str_replace("'", "\'", substr($muFile, 3)) . "', 'form_CadEmpreendimentos_etapa1')";
                  $muLabel .= '<img src="' . $this->gera_icone($muFile) . '" style="border-width: 0">';
                  $muLabel .= $muData;
                  $muHtmlItem  = '<span class="id_mu_item_uprelatoriovistoria">';
                  $muHtmlItem .= '<span class="id_mu_data_uprelatoriovistoria">';
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
                  $muHtmlItem   .= '<span class="id_mu_all_chkbx_uprelatoriovistoria"><input type="checkbox" id="id_mu_chkbx_opt_uprelatoriovistoria_' . $muItemCount . '" class="id_mu_chkbx_uprelatoriovistoria" value="' . $muKey . '" /><label for="id_mu_chkbx_opt_uprelatoriovistoria_' . $muItemCount . '">' . $this->Ini->Nm_lang['lang_errm_mu_delfile'] . '</label></span>';
                  $muHtmlItem   .= '</span>';
                  $muHtmlArray[] = $muHtmlItem;
                  $rs_mu->MoveNext();
                  $muItemCount++;
              }
              $muHtml = implode('<br />', $muHtmlArray);
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['uprelatoriovistoria'] = array(
                       'row'    => '',
               'type'    => 'multi_upload',
               'valList' => array($sTmpValue),
               'mulHtml' => $muHtml,
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['upload_dir'][$fieldName][] = $newName;
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
      if ($this->sc_evento == "novo" || $this->sc_evento == "incluir" || ($this->nmgp_opcao == "nada" && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant'] == "novo") || (isset($GLOBALS['erro_incl']) && 1 == $GLOBALS['erro_incl']))
      {
          if (!isset($this->nmgp_cmp_hidden["torrelabelframe"]))
          {
              $this->nmgp_cmp_hidden["torrelabelframe"] = "off"; $this->NM_ajax_info['fieldDisplay']['torrelabelframe'] = 'off';
          }
      }
      else
      {
      }
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         ?><?php sc_include_library('sys', 'initCustom', 'onLoad.html'); ?>
<style>
	.edit{cursor:pointer}
</style>
<?php
sc_include_library("sys", "models", "Helperartigos.php");
$_Helperartigos = new Helperartigos($this);
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library("sys", "models", "Empreendimentos.php"); $_Empreendimentos = new Empreendimentos($this);
sc_include_library("sys", "models", "Filesrelatoriovistorias.php"); $_Filesrelatoriovistorias = new Filesrelatoriovistorias($this);
$s = new manageSession();
echo $s->getIUDState($this);
echo $s->getMessage(true);

if (!in_array($s->get('Num_TipoUsuario'), ["G", "GT"])) {
	$this->nmgp_cmp_hidden["num_totvs"] = "off"; $this->NM_ajax_info['fieldDisplay']['num_totvs'] = 'off';
}

$frames = [
	"frameTorre" => $this->nmgp_opcao == 'igual',
	"framePOP" => $this->nmgp_opcao == 'igual',
	"frameBloqueio" => $this->nmgp_opcao == 'igual',
	"frameShafts" => $this->nmgp_opcao == 'igual',
	"frameAntenarios" => $this->nmgp_opcao == 'igual',
	"frameInconformidades" => $this->nmgp_opcao == 'igual',
	"framePOE" => $this->nmgp_opcao == 'igual',
	"framePontoDeEncontro" => $this->nmgp_opcao == 'igual',
	"relatorioVistorias" => $this->nmgp_opcao == 'igual',
	"npt" => $this->nmgp_opcao == 'igual',
];

$RelatorioVistorias = $_Empreendimentos->getRelatorioVistorias($this->id_empreendimento );
$RelatorioVistoriasExpirados = $_Filesrelatoriovistorias->getExpiredByEmpreendimento($this->id_empreendimento );

$profile = $s->get("profile");
$Num_TipoUsuario = $s->get("Num_TipoUsuario");
if (isset($profile["EMPREENDIMENTO"])) {
	if (($this->nmgp_opcao == "novo" && ($profile["EMPREENDIMENTO"]["CRIAR"]["v"] ?? "N") == "S" || 
	   $this->nmgp_opcao == "igual" && ($profile["EMPREENDIMENTO"]["EDITAR"]["v"] ?? "N") == "S") && $Num_TipoUsuario != "E") {
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "on";;
	} else {
	$this->disableFields();
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
	}

	if (($profile["EMPREENDIMENTO"]["DELETAR"]["v"] ?? "N") == "S") {
		$this->NM_ajax_info['buttonDisplay']['Excluir'] = $this->nmgp_botoes["Excluir"] = "on";;
	} else {
		$this->NM_ajax_info['buttonDisplay']['Excluir'] = $this->nmgp_botoes["Excluir"] = "off";;
	}
} else {
	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultadeEmpreendimentos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}
if ($Num_TipoUsuario == "E") {
	$this->NM_ajax_info['buttonDisplay']['voltar'] = $this->nmgp_botoes["voltar"] = "off";;
}$this->onLoadJS(['frames' => $frames, 'RelatorioVistorias' => $RelatorioVistorias, 'RelatorioVistoriasExpirados' => $RelatorioVistoriasExpirados]);
$crumb = [ $this->Ini->Nm_lang['lang_label_enterprises'] ];
if ($this->nmgp_opcao == "novo") {
	$crumb[1] = "<i>". $this->Ini->Nm_lang['lang_label_newenterprise'] ."</i>";
} else if ($this->nmgp_opcao == "igual") {
	$crumb[1] = $this->nom_empreendimento ;
}

echo "
<script>
	$(document).ready(function(){
		$('#id_tabs_6_6').append(`".$_Helperartigos->getLink([ 
			'G' => 'bloqueio_empresa',
			'GT' => 'bloqueio_empresa',
			'O' => '',
			'P' => '',
			'E' => '',
			'default' => ''],["SVGINFO_URL" => true])."`);

		$('#id_tabs_6_7').append(`".$_Helperartigos->getLink([ 
			'G' => 'bloqueio_tecnico',
			'GT' => 'bloqueio_tecnico',
			'O' => '',
			'P' => '',
			'E' => '',
			'default' => ''],["SVGINFO_URL" => true])."`);	
		});
		loadBreadcrumb(['".$crumb[0]."','".$crumb[1]."']);
	</script>
";
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
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
      $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         $this->num_ativo  = 'S';
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
                     /* tb_contatos */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_contatos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_contatos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_contatos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_contatos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_contatos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_contatos = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_contatos[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_contatos = false;
          $this->dataset_tb_contatos_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_contatos[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadEmpreendimentos_etapa1' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tb_empreendimentoshorarios */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_empreendimentoshorarios WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_empreendimentoshorarios WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_empreendimentoshorarios WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_empreendimentoshorarios WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_empreendimentoshorarios WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_empreendimentoshorarios = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_empreendimentoshorarios[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_empreendimentoshorarios = false;
          $this->dataset_tb_empreendimentoshorarios_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_empreendimentoshorarios[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadEmpreendimentos_etapa1' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tb_projetos */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_projetos WHERE ID_Empreendimento = " . $this->id_empreendimento ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_projetos = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_projetos[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_projetos = false;
          $this->dataset_tb_projetos_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_projetos[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadEmpreendimentos_etapa1' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }

            /* tb_valorhora */
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_valorhora WHERE ID_Empreedimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_valorhora WHERE ID_Empreedimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_valorhora WHERE ID_Empreedimento = " . $this->id_empreendimento ;
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_valorhora WHERE ID_Empreedimento = " . $this->id_empreendimento ;
      }
      else
      {
          $sc_cmd_dependency = "SELECT COUNT(*) FROM tb_valorhora WHERE ID_Empreedimento = " . $this->id_empreendimento ;
      }
       
      $nm_select = $sc_cmd_dependency; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->dataset_tb_valorhora = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->dataset_tb_valorhora[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->dataset_tb_valorhora = false;
          $this->dataset_tb_valorhora_erro = $this->Db->ErrorMsg();
      } 
;

      if($this->dataset_tb_valorhora[0][0] > 0)
      {
          
 if (!isset($this->Campos_Mens_erro)){$this->Campos_Mens_erro = "";}
 if (!empty($this->Campos_Mens_erro)){$this->Campos_Mens_erro .= "<br>";}$this->Campos_Mens_erro .= "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 if ('submit_form' == $this->NM_ajax_opcao || 'event_' == substr($this->NM_ajax_opcao, 0, 6))
 {
  $sErrorIndex = ('submit_form' == $this->NM_ajax_opcao) ? 'geral_form_CadEmpreendimentos_etapa1' : substr(substr($this->NM_ajax_opcao, 0, strrpos($this->NM_ajax_opcao, '_')), 6);
  $this->NM_ajax_info['errList'][$sErrorIndex][] = "" . $this->Ini->Nm_lang['lang_errm_dele_rhcr'] . "";
 }
;
      }
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
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
      $NM_val_form['nom_empreendimento'] = $this->nom_empreendimento;
      $NM_val_form['num_cnpj'] = $this->num_cnpj;
      $NM_val_form['end_cep'] = $this->end_cep;
      $NM_val_form['end_logradouro'] = $this->end_logradouro;
      $NM_val_form['end_numero'] = $this->end_numero;
      $NM_val_form['end_bairro'] = $this->end_bairro;
      $NM_val_form['end_complemento'] = $this->end_complemento;
      $NM_val_form['end_uf'] = $this->end_uf;
      $NM_val_form['end_cidade'] = $this->end_cidade;
      $NM_val_form['localizacao'] = $this->localizacao;
      $NM_val_form['nom_email'] = $this->nom_email;
      $NM_val_form['num_telefonecomercial'] = $this->num_telefonecomercial;
      $NM_val_form['num_totvs'] = $this->num_totvs;
      $NM_val_form['num_ativo'] = $this->num_ativo;
      $NM_val_form['perfildoempreendimento'] = $this->perfildoempreendimento;
      $NM_val_form['id_empreendimentosadmin'] = $this->id_empreendimentosadmin;
      $NM_val_form['img_logo'] = $this->img_logo;
      $NM_val_form['img_rg'] = $this->img_rg;
      $NM_val_form['torrelabelframe'] = $this->torrelabelframe;
      $NM_val_form['poplabelframe'] = $this->poplabelframe;
      $NM_val_form['shaftlabelframe'] = $this->shaftlabelframe;
      $NM_val_form['antenariolabelframe'] = $this->antenariolabelframe;
      $NM_val_form['bloqueioopelabelframe'] = $this->bloqueioopelabelframe;
      $NM_val_form['bloqueioprelabelframe'] = $this->bloqueioprelabelframe;
      $NM_val_form['bloqueiotecopelabelframe'] = $this->bloqueiotecopelabelframe;
      $NM_val_form['bloqueiotecprelabelframe'] = $this->bloqueiotecprelabelframe;
      $NM_val_form['inconformidadeslabelframe'] = $this->inconformidadeslabelframe;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['poelabelframe'] = $this->poelabelframe;
      $NM_val_form['pontodeencontro'] = $this->pontodeencontro;
      $NM_val_form['deleteonclick'] = $this->deleteonclick;
      $NM_val_form['id_empreendimento'] = $this->id_empreendimento;
      $NM_val_form['upnpt'] = $this->upnpt;
      $NM_val_form['uprelatoriovistoria'] = $this->uprelatoriovistoria;
      if ($this->id_empreendimento == "")  
      { 
          $this->id_empreendimento = 0;
      } 
      if ($this->id_empreendimentosadmin == "")  
      { 
          $this->id_empreendimentosadmin = 0;
          $this->sc_force_zero[] = 'id_empreendimentosadmin';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->num_cnpj_before_qstr = $this->num_cnpj;
          $this->num_cnpj = substr($this->Db->qstr($this->num_cnpj), 1, -1); 
          if ($this->num_cnpj == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_cnpj = "null"; 
              $NM_val_null[] = "num_cnpj";
          } 
          $this->nom_empreendimento_before_qstr = $this->nom_empreendimento;
          $this->nom_empreendimento = substr($this->Db->qstr($this->nom_empreendimento), 1, -1); 
          if ($this->nom_empreendimento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_empreendimento = "null"; 
              $NM_val_null[] = "nom_empreendimento";
          } 
          $this->nom_email_before_qstr = $this->nom_email;
          $this->nom_email = substr($this->Db->qstr($this->nom_email), 1, -1); 
          if ($this->nom_email == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_email = "null"; 
              $NM_val_null[] = "nom_email";
          } 
          $this->num_telefonecomercial_before_qstr = $this->num_telefonecomercial;
          $this->num_telefonecomercial = substr($this->Db->qstr($this->num_telefonecomercial), 1, -1); 
          if ($this->num_telefonecomercial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefonecomercial = "null"; 
              $NM_val_null[] = "num_telefonecomercial";
          } 
          $this->end_logradouro_before_qstr = $this->end_logradouro;
          $this->end_logradouro = substr($this->Db->qstr($this->end_logradouro), 1, -1); 
          if ($this->end_logradouro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_logradouro = "null"; 
              $NM_val_null[] = "end_logradouro";
          } 
          $this->end_numero_before_qstr = $this->end_numero;
          $this->end_numero = substr($this->Db->qstr($this->end_numero), 1, -1); 
          if ($this->end_numero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_numero = "null"; 
              $NM_val_null[] = "end_numero";
          } 
          $this->end_complemento_before_qstr = $this->end_complemento;
          $this->end_complemento = substr($this->Db->qstr($this->end_complemento), 1, -1); 
          if ($this->end_complemento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_complemento = "null"; 
              $NM_val_null[] = "end_complemento";
          } 
          $this->end_bairro_before_qstr = $this->end_bairro;
          $this->end_bairro = substr($this->Db->qstr($this->end_bairro), 1, -1); 
          if ($this->end_bairro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_bairro = "null"; 
              $NM_val_null[] = "end_bairro";
          } 
          $this->end_cidade_before_qstr = $this->end_cidade;
          $this->end_cidade = substr($this->Db->qstr($this->end_cidade), 1, -1); 
          if ($this->end_cidade == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_cidade = "null"; 
              $NM_val_null[] = "end_cidade";
          } 
          $this->end_uf_before_qstr = $this->end_uf;
          $this->end_uf = substr($this->Db->qstr($this->end_uf), 1, -1); 
          if ($this->end_uf == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_uf = "null"; 
              $NM_val_null[] = "end_uf";
          } 
          $this->end_cep_before_qstr = $this->end_cep;
          $this->end_cep = substr($this->Db->qstr($this->end_cep), 1, -1); 
          if ($this->end_cep == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_cep = "null"; 
              $NM_val_null[] = "end_cep";
          } 
          $this->num_totvs_before_qstr = $this->num_totvs;
          $this->num_totvs = substr($this->Db->qstr($this->num_totvs), 1, -1); 
          if ($this->num_totvs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_totvs = "null"; 
              $NM_val_null[] = "num_totvs";
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
           $nm_tmp = nm_conv_img_access(substr($this->img_logo, 0, 12));
           if (substr($this->img_logo, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->img_logo = nm_conv_img_access($this->img_logo);
           } 
              if (!empty($this->img_logo) && $this->img_logo != 'null' && substr($this->img_logo, 0, 4) != "*nm*") 
              { 
                  $this->img_logo = "*nm*" . base64_encode($this->img_logo) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              if (!empty($this->img_logo) && $this->img_logo != 'null' && substr($this->img_logo, 0, 4) != "*nm*") 
              { 
                  $this->img_logo = "*nm*" . base64_encode($this->img_logo) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if (!empty($this->img_logo) && $this->img_logo != 'null' && substr($this->img_logo, 0, 4) != "*nm*") 
              { 
                  $this->img_logo = "*nm*" . base64_encode($this->img_logo) ; 
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
              if (!empty($this->img_logo) && $this->img_logo != 'null' && substr($this->img_logo, 0, 4) != "*nm*") 
              { 
                  $this->img_logo = "*nm*" . base64_encode($this->img_logo) ; 
              } 
          } 
          else
          { 
              $this->img_logo =  substr($this->Db->qstr($this->img_logo), 1, -1);
          } 
          if ($this->img_logo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_logo = "null"; 
              $NM_val_null[] = "img_logo";
          } 
          if ($this->num_ativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_ativo = "null"; 
              $NM_val_null[] = "num_ativo";
          } 
          $this->pontodeencontro_before_qstr = $this->pontodeencontro;
          $this->pontodeencontro = substr($this->Db->qstr($this->pontodeencontro), 1, -1); 
          if ($this->pontodeencontro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pontodeencontro = "null"; 
              $NM_val_null[] = "pontodeencontro";
          } 
          if ($this->perfildoempreendimento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->perfildoempreendimento = "null"; 
              $NM_val_null[] = "perfildoempreendimento";
          } 
          $this->img_rg_before_qstr = $this->img_rg;
          $this->img_rg = substr($this->Db->qstr($this->img_rg), 1, -1); 
          if ($this->img_rg == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_rg = "null"; 
              $NM_val_null[] = "img_rg";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Num_CNPJ = '$this->num_cnpj', Nom_Empreendimento = '$this->nom_empreendimento', Nom_Email = '$this->nom_email', Num_TelefoneComercial = '$this->num_telefonecomercial', End_Logradouro = '$this->end_logradouro', End_Numero = '$this->end_numero', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', PontoDeEncontro = '$this->pontodeencontro', PerfilDoEmpreendimento = '$this->perfildoempreendimento', ID_Empreendimentosadmin = $this->id_empreendimentosadmin";  
              } 
              $aDoNotUpdate = array();
              $aEraseFiles  = array();
              $temp_cmd_sql = "";
              if ($this->img_logo_limpa == "S") 
              { 
                  if ($this->img_logo != "null") 
                  { 
                      $this->img_logo = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", IMG_Logo = '" . $this->img_logo . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " IMG_Logo = '" . $this->img_logo . "'"; 
                     $SC_ex_update = true; 
                  } 
                  $this->img_logo = "";
              } 
              else 
              { 
                  if ($this->img_logo != "none" && $this->img_logo != "") 
                  { 
                      $NM_conteudo =  $this->img_logo;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", IMG_Logo = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " IMG_Logo = '$NM_conteudo'" ; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "img_logo";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              $temp_cmd_sql = "";
              if ($this->img_rg_limpa == "S") 
              { 
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/"; 
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['img_rg']);
                  if ($this->img_rg != "null") 
                  { 
                      $this->img_rg = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", IMG_RG = '" . $this->img_rg . "'"; 
                      $comando_oracle .= ", IMG_RG = '" . $this->img_rg . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " IMG_RG = '" . $this->img_rg . "'"; 
                     $comando_oracle .= " IMG_RG = '" . $this->img_rg . "'"; 
                     $SC_ex_upd_or = true; 
                     $SC_ex_update = true; 
                  } 
                  $this->img_rg = "";
              } 
              else 
              { 
                  if ($this->img_rg != "none" && $this->img_rg != "") 
                  { 
                      $NM_conteudo =  $this->img_rg;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", IMG_RG = '$NM_conteudo'" ; 
                          $comando_oracle .= ", IMG_RG = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " IMG_RG = '$NM_conteudo'" ; 
                          $comando_oracle .= " IMG_RG = '$NM_conteudo'" ; 
                          $SC_ex_upd_or = true; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "img_rg";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if ($this->img_logo_limpa == "S" || ($this->img_logo != "none" && $this->img_logo != "")) 
              { 
                  if ($SC_ex_upd_or) 
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= ", IMG_Logo = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= ", IMG_Logo = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= ", IMG_Logo = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= ", IMG_Logo = empty_blob()"; 
                      } 
                  } 
                  else 
                  { 
                      $SC_ex_upd_or = true; 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= " IMG_Logo = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= " IMG_Logo = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= " IMG_Logo = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= " IMG_Logo = empty_blob()"; 
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
                  $comando .= " WHERE ID_Empreendimento = $this->id_empreendimento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ID_Empreendimento = $this->id_empreendimento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ID_Empreendimento = $this->id_empreendimento ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ID_Empreendimento = $this->id_empreendimento ";  
              }  
              else  
              {
                  $comando .= " WHERE ID_Empreendimento = $this->id_empreendimento ";  
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
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                  if ($this->img_logo_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"IMG_Logo\", \"\",  \"ID_Empreendimento = $this->id_empreendimento\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "IMG_Logo", "",  "ID_Empreendimento = $this->id_empreendimento"); 
                  } 
                  else 
                  { 
                      if ($this->img_logo != "none" && $this->img_logo != "") 
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"IMG_Logo\", $this->img_logo,  \"ID_Empreendimento = $this->id_empreendimento\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "IMG_Logo", $this->img_logo,  "ID_Empreendimento = $this->id_empreendimento"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_CadEmpreendimentos_etapa1_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->img_logo_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['img_logo_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
              if ($this->img_rg_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['img_rg_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
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
                      include_once 'form_CadEmpreendimentos_etapa1_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_upnpt));
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
                          $sMUDelete = "SELECT Arquivo FROM tb_npt WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          while (!$rs_mu->EOF)
                          {
                              $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                              $rs_mu->MoveNext();
                          }
                          $rs_mu->Close();
                          $sMUDelete = "DELETE FROM tb_npt WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "upnpt");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
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
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
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
                      include_once 'form_CadEmpreendimentos_etapa1_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_uprelatoriovistoria));
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
                          $sMUDelete = "SELECT File_Name FROM tb_filesrelatoriovistorias WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          while (!$rs_mu->EOF)
                          {
                              $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                              $rs_mu->MoveNext();
                          }
                          $rs_mu->Close();
                          $sMUDelete = "DELETE FROM tb_filesrelatoriovistorias WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "uprelatoriovistoria");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
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
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
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
          $this->num_cnpj = $this->num_cnpj_before_qstr;
          $this->nom_empreendimento = $this->nom_empreendimento_before_qstr;
          $this->nom_email = $this->nom_email_before_qstr;
          $this->num_telefonecomercial = $this->num_telefonecomercial_before_qstr;
          $this->end_logradouro = $this->end_logradouro_before_qstr;
          $this->end_numero = $this->end_numero_before_qstr;
          $this->end_complemento = $this->end_complemento_before_qstr;
          $this->end_bairro = $this->end_bairro_before_qstr;
          $this->end_cidade = $this->end_cidade_before_qstr;
          $this->end_uf = $this->end_uf_before_qstr;
          $this->end_cep = $this->end_cep_before_qstr;
          $this->num_totvs = $this->num_totvs_before_qstr;
          $this->pontodeencontro = $this->pontodeencontro_before_qstr;
          $this->img_rg = $this->img_rg_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id_empreendimento'])) { $this->id_empreendimento = $NM_val_form['id_empreendimento']; }
              elseif (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_cnpj'])) { $this->num_cnpj = $NM_val_form['num_cnpj']; }
              elseif (isset($this->num_cnpj)) { $this->nm_limpa_alfa($this->num_cnpj); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_empreendimento'])) { $this->nom_empreendimento = $NM_val_form['nom_empreendimento']; }
              elseif (isset($this->nom_empreendimento)) { $this->nm_limpa_alfa($this->nom_empreendimento); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_email'])) { $this->nom_email = $NM_val_form['nom_email']; }
              elseif (isset($this->nom_email)) { $this->nm_limpa_alfa($this->nom_email); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefonecomercial'])) { $this->num_telefonecomercial = $NM_val_form['num_telefonecomercial']; }
              elseif (isset($this->num_telefonecomercial)) { $this->nm_limpa_alfa($this->num_telefonecomercial); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_logradouro'])) { $this->end_logradouro = $NM_val_form['end_logradouro']; }
              elseif (isset($this->end_logradouro)) { $this->nm_limpa_alfa($this->end_logradouro); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_numero'])) { $this->end_numero = $NM_val_form['end_numero']; }
              elseif (isset($this->end_numero)) { $this->nm_limpa_alfa($this->end_numero); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_complemento'])) { $this->end_complemento = $NM_val_form['end_complemento']; }
              elseif (isset($this->end_complemento)) { $this->nm_limpa_alfa($this->end_complemento); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_bairro'])) { $this->end_bairro = $NM_val_form['end_bairro']; }
              elseif (isset($this->end_bairro)) { $this->nm_limpa_alfa($this->end_bairro); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_cidade'])) { $this->end_cidade = $NM_val_form['end_cidade']; }
              elseif (isset($this->end_cidade)) { $this->nm_limpa_alfa($this->end_cidade); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_uf'])) { $this->end_uf = $NM_val_form['end_uf']; }
              elseif (isset($this->end_uf)) { $this->nm_limpa_alfa($this->end_uf); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_cep'])) { $this->end_cep = $NM_val_form['end_cep']; }
              elseif (isset($this->end_cep)) { $this->nm_limpa_alfa($this->end_cep); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_totvs'])) { $this->num_totvs = $NM_val_form['num_totvs']; }
              elseif (isset($this->num_totvs)) { $this->nm_limpa_alfa($this->num_totvs); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_empreendimentosadmin'])) { $this->id_empreendimentosadmin = $NM_val_form['id_empreendimentosadmin']; }
              elseif (isset($this->id_empreendimentosadmin)) { $this->nm_limpa_alfa($this->id_empreendimentosadmin); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('nom_empreendimento', 'num_cnpj', 'end_cep', 'end_logradouro', 'end_numero', 'end_bairro', 'end_complemento', 'end_uf', 'end_cidade', 'localizacao', 'nom_email', 'num_telefonecomercial', 'num_totvs', 'num_ativo', 'perfildoempreendimento', 'id_empreendimentosadmin', 'torrelabelframe', 'poplabelframe', 'shaftlabelframe', 'antenariolabelframe', 'bloqueioopelabelframe', 'bloqueioprelabelframe', 'bloqueiotecopelabelframe', 'bloqueiotecprelabelframe', 'inconformidadeslabelframe', 'savedataonclick', 'poelabelframe', 'pontodeencontro', 'deleteonclick', 'id_empreendimento', 'upnpt', 'uprelatoriovistoria'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "ID_Empreendimento, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->img_logo_scfile_name, $dir_file, "img_logo");
              if (trim($this->img_logo_scfile_name) != $_test_file)
              {
                  $this->img_logo_scfile_name = $_test_file;
                  $this->img_logo = $_test_file;
              }
              $dir_file = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/"; 
              $_test_file = $this->fetchUniqueUploadName($this->img_rg_scfile_name, $dir_file, "img_rg");
              if (trim($this->img_rg_scfile_name) != $_test_file)
              {
                  $this->img_rg_scfile_name = $_test_file;
                  $this->img_rg = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->upnpt_scfile_name, $dir_file, "upnpt");
              if (trim($this->upnpt_scfile_name) != $_test_file)
              {
                  $this->upnpt_scfile_name = $_test_file;
                  $this->upnpt = $_test_file;
              }
              $_test_file = $this->fetchUniqueUploadName($this->uprelatoriovistoria_scfile_name, $dir_file, "uprelatoriovistoria");
              if (trim($this->uprelatoriovistoria_scfile_name) != $_test_file)
              {
                  $this->uprelatoriovistoria_scfile_name = $_test_file;
                  $this->uprelatoriovistoria = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES ('$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', '$this->img_logo', '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES ('$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', '$this->img_logo', '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES (" . $NM_seq_auto . "'$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', EMPTY_BLOB(), '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES (" . $NM_seq_auto . "'$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', null, '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES (" . $NM_seq_auto . "'$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', '', '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES (" . $NM_seq_auto . "'$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', '', '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG) VALUES (" . $NM_seq_auto . "'$this->num_cnpj', '$this->nom_empreendimento', '$this->nom_email', '$this->num_telefonecomercial', '$this->end_logradouro', '$this->end_numero', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', '$this->num_totvs', '$this->img_logo', '$this->num_ativo', '$this->pontodeencontro', '$this->perfildoempreendimento', $this->id_empreendimentosadmin, '$this->img_rg')"; 
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
                              form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                          form_CadEmpreendimentos_etapa1_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_empreendimento =  $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
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
                  $this->id_empreendimento = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->img_logo ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  IMG_Logo , $this->img_logo,  \"ID_Empreendimento = $this->id_empreendimento\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "IMG_Logo", $this->img_logo,  "ID_Empreendimento = $this->id_empreendimento"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_CadEmpreendimentos_etapa1_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
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
                      include_once 'form_CadEmpreendimentos_etapa1_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_upnpt));
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
                          $sMUDelete = "SELECT Arquivo FROM tb_npt WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          while (!$rs_mu->EOF)
                          {
                              $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                              $rs_mu->MoveNext();
                          }
                          $rs_mu->Close();
                          $sMUDelete = "DELETE FROM tb_npt WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "upnpt");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_npt (" . $NM_cmp_auto . ", Arquivo, ID_Empreendimento) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_npt (Arquivo, ID_Empreendimento) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ")"; 
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
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
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
                      include_once 'form_CadEmpreendimentos_etapa1_doc_name.php';
                  }
                  $aUlInfo = explode('@scl@', sc_upload_unprotect_chars($this->ul_info_uprelatoriovistoria));
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
                          $sMUDelete = "SELECT File_Name FROM tb_filesrelatoriovistorias WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          while (!$rs_mu->EOF)
                          {
                              $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                              $rs_mu->MoveNext();
                          }
                          $rs_mu->Close();
                          $sMUDelete = "DELETE FROM tb_filesrelatoriovistorias WHERE ID IN (" . implode(', ', $aMUDelKey) . ")";
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
                          $rs_mu = $this->Db->Execute($sMUDelete);
                          if ($rs_mu === false)
                          {
                              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                              $this->NM_rollback_db();
                              if ($this->NM_ajax_flag)
                              {
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (@is_dir($sMUDirDest))
                          {
                              $_test_file = $this->fetchUniqueUploadName($aUlFileData[1], $sMUDirDest, "uprelatoriovistoria");
                              if (trim($aUlFileData[1]) != $_test_file)
                              {
                                  $aUlFileData[1] = $_test_file;
                              }
                          }
                          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                          { 
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                          { 
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (" . $NM_cmp_auto . ", File_Name, ID_Empreendimento, Data) VALUES (" . $NM_seq_auto . ", " . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
                          }
                          else
                          {
                              $comando = "INSERT INTO tb_filesrelatoriovistorias (File_Name, ID_Empreendimento, Data) VALUES (" . $this->Db->qstr($aUlFileData[1]) . ", " . $this->id_empreendimento . ", '" . date('Y-m-d H:i:s') . "')"; 
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
                                  form_CadEmpreendimentos_etapa1_pack_ajax_response();
                              }
                              exit;
                          }
                          $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
                          $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
                          if (!@is_dir($sMUDirDest))
                          {
                              nm_mkdir($sMUDirDest);
                          }
                          @copy($this->Ini->root . $this->Ini->path_imag_temp . '/' . $aUlFileData[2], $sMUDirDest . $aUlFileData[1]);
                      }
                  }
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']);
              }

              $dir_img = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/"; 
              if (nm_mkdir($dir_img))  
              { 
                  $arq_img_rg = fopen($this->SC_IMG_img_rg, "r") ; 
                  $reg_img_rg = fread($arq_img_rg, filesize($this->SC_IMG_img_rg)) ; 
                  fclose($arq_img_rg) ;  
                  $arq_img_rg = fopen($dir_img . trim($this->img_rg_scfile_name), "w") ; 
                  fwrite($arq_img_rg, $reg_img_rg) ;  
                  fclose($arq_img_rg) ;  
              } 
              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['return_edit'] = "new";
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
          $this->id_empreendimento = substr($this->Db->qstr($this->id_empreendimento), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
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
              $sMUDelete = "SELECT Arquivo FROM tb_npt WHERE ID_Empreendimento = " . $this->id_empreendimento . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                  }
                   exit;
              }
              $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
              $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
              while (!$rs_mu->EOF)
              {
                  $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                  $rs_mu->MoveNext();
              }
              $rs_mu->Close();
              $sMUDelete = "DELETE FROM tb_npt WHERE ID_Empreendimento = " . $this->id_empreendimento . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                  }
                  exit;
              }
              $rs_mu->Close();
              $sMUDelete = "SELECT File_Name FROM tb_filesrelatoriovistorias WHERE ID_Empreendimento = " . $this->id_empreendimento . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                  }
                   exit;
              }
              $sMUSubDir = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
              $sMUDirDest = $this->Ini->path_doc . $sMUSubDir . '/';
              while (!$rs_mu->EOF)
              {
                  $aEraseFiles[] = array('dir' => $sMUDirDest, 'file' => $rs_mu->fields[0]);
                  $rs_mu->MoveNext();
              }
              $rs_mu->Close();
              $sMUDelete = "DELETE FROM tb_filesrelatoriovistorias WHERE ID_Empreendimento = " . $this->id_empreendimento . "";
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $sMUDelete;
              $rs_mu = $this->Db->Execute($sMUDelete);
              if ($rs_mu === false)
              {
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg());
                  $this->NM_rollback_db();
                  if ($this->NM_ajax_flag)
                  {
                      form_CadEmpreendimentos_etapa1_pack_ajax_response();
                  }
                  exit;
              }
              $rs_mu->Close();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
              }  
              else  
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Empreendimento = $this->id_empreendimento "); 
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
                          form_CadEmpreendimentos_etapa1_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
                  $sDirErase     = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/"; 
                  $aEraseFiles[] = array('dir' => $sDirErase, 'file' => $this->nmgp_dados_form['img_rg']);
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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']);
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
        $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
         sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

 
      $nm_select = "SELECT MAX(ID_Empreendimento) FROM tb_empreendimentos"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->lastID = array();
      $this->lastid = array();
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
                      $this->lastID[$y] [$x] = $rx->fields[$x];
                      $this->lastid[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->lastID = false;
          $this->lastID_erro = $this->Db->ErrorMsg();
          $this->lastid = false;
          $this->lastid_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->lastID[0][0])) {
	$ID_Empreendimento = $this->lastid[0][0];
	 if (isset($ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = $ID_Empreendimento;}
;
}

$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "CRIAR",
	"Descricao" => 'Cadastro de empreendimento',
	"Conteudo" => $modelLogs->getConteudo()
]);

$s->setIUDState($this, "I", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadEmpreendimentos_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Npt.php');
$modelLogs = new Logs($this);
$modelNpt = new Npt($this);

$Arquivos = $modelNpt->getByEmpreendimento(intval($this->id_empreendimento ));
$logConteudo = $modelLogs->getConteudo();
$logConteudo["NPT"] = $Arquivos;

$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de empreendimento',
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
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadEmpreendimentos_etapa1') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         header('Location: ../form_Torre');
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['parms'] = "id_empreendimento?#?$this->id_empreendimento?@?"; 
      }
      $this->nmgp_dados_form['img_logo'] = ""; 
      $this->img_logo_limpa = ""; 
      $this->img_logo_salva = ""; 
      $this->nmgp_dados_form['img_rg'] = ""; 
      $this->img_rg_limpa = ""; 
      $this->img_rg_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_empreendimento = substr($this->Db->qstr($this->id_empreendimento), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID_Empreendimento, Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID_Empreendimento, Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID_Empreendimento, Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID_Empreendimento, Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, LOTOFILE(IMG_Logo, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_IMG_Logo', 'client'), Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID_Empreendimento, Num_CNPJ, Nom_Empreendimento, Nom_Email, Num_TelefoneComercial, End_Logradouro, End_Numero, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, Num_TOTVS, IMG_Logo, Num_Ativo, PontoDeEncontro, PerfilDoEmpreendimento, ID_Empreendimentosadmin, IMG_RG from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "ID_Empreendimento = $this->id_empreendimento"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "ID_Empreendimento = $this->id_empreendimento"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "ID_Empreendimento = $this->id_empreendimento"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "ID_Empreendimento = $this->id_empreendimento"; 
                  }  
                  else  
                  {
                     $aWhere[] = "ID_Empreendimento = $this->id_empreendimento"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ID_Empreendimento";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter']))
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
                  $this->NM_ajax_info['buttonDisplay']['Excluir'] = $this->nmgp_botoes['Excluir'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['Excluir'] = $this->nmgp_botoes['Excluir'] = "off";
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
              $this->id_empreendimento = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_empreendimento'] = $this->id_empreendimento;
              $this->num_cnpj = $rs->fields[1] ; 
              $this->nmgp_dados_select['num_cnpj'] = $this->num_cnpj;
              $this->num_cnpj = trim($this->num_cnpj);
              if (strlen($this->num_cnpj) < 14 && !empty($this->num_cnpj)) 
              { 
                  $this->num_cnpj = str_repeat(0, 14 - strlen($this->num_cnpj)) . $this->num_cnpj; 
              } 
              elseif (strlen($this->num_cnpj) > 14) 
              { 
                     $this->num_cnpj = substr($this->num_cnpj, strlen($this->num_cnpj) - 14); 
              } 
              $this->nom_empreendimento = $rs->fields[2] ; 
              $this->nmgp_dados_select['nom_empreendimento'] = $this->nom_empreendimento;
              $this->nom_email = $rs->fields[3] ; 
              $this->nmgp_dados_select['nom_email'] = $this->nom_email;
              $this->num_telefonecomercial = $rs->fields[4] ; 
              $this->nmgp_dados_select['num_telefonecomercial'] = $this->num_telefonecomercial;
              $this->end_logradouro = $rs->fields[5] ; 
              $this->nmgp_dados_select['end_logradouro'] = $this->end_logradouro;
              $this->end_numero = $rs->fields[6] ; 
              $this->nmgp_dados_select['end_numero'] = $this->end_numero;
              $this->end_complemento = $rs->fields[7] ; 
              $this->nmgp_dados_select['end_complemento'] = $this->end_complemento;
              $this->end_bairro = $rs->fields[8] ; 
              $this->nmgp_dados_select['end_bairro'] = $this->end_bairro;
              $this->end_cidade = $rs->fields[9] ; 
              $this->nmgp_dados_select['end_cidade'] = $this->end_cidade;
              $this->end_uf = $rs->fields[10] ; 
              $this->nmgp_dados_select['end_uf'] = $this->end_uf;
              $this->end_cep = $rs->fields[11] ; 
              $this->nmgp_dados_select['end_cep'] = $this->end_cep;
              $this->num_totvs = $rs->fields[12] ; 
              $this->nmgp_dados_select['num_totvs'] = $this->num_totvs;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->img_logo = $this->Db->BlobDecode($rs->fields[13]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[13]) && !empty($rs->fields[13]) && is_file($rs->fields[13])) 
                  { 
                     $this->img_logo = file_get_contents($rs->fields[13]);
                  }else 
                  { 
                     $this->img_logo = ''; 
                  } 
              } 
              else
              { 
                  $this->img_logo = $rs->fields[13] ; 
              } 
              $this->nmgp_dados_select['img_logo'] = $this->img_logo;
              $this->num_ativo = $rs->fields[14] ; 
              $this->nmgp_dados_select['num_ativo'] = $this->num_ativo;
              $this->pontodeencontro = $rs->fields[15] ; 
              $this->nmgp_dados_select['pontodeencontro'] = $this->pontodeencontro;
              $this->perfildoempreendimento = $rs->fields[16] ; 
              $this->nmgp_dados_select['perfildoempreendimento'] = $this->perfildoempreendimento;
              $this->id_empreendimentosadmin = $rs->fields[17] ; 
              $this->nmgp_dados_select['id_empreendimentosadmin'] = $this->id_empreendimentosadmin;
              $this->img_rg = $rs->fields[18] ; 
              $this->nmgp_dados_select['img_rg'] = $this->img_rg;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_empreendimento = (string)$this->id_empreendimento; 
              $this->id_empreendimentosadmin = (string)$this->id_empreendimentosadmin; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['parms'] = "id_empreendimento?#?$this->id_empreendimento?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sub_dir'][0]  = "";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sub_dir'][1]  = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sub_dir'][2]  = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/NPT";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sub_dir'][3]  = "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RelatorioVistoria";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['reg_start'] < $qt_geral_reg_form_CadEmpreendimentos_etapa1;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao']   = '';
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
              $this->id_empreendimento = "";  
              $this->num_cnpj = "";  
              $this->nom_empreendimento = "";  
              $this->nom_email = "";  
              $this->num_telefonecomercial = "";  
              $this->end_logradouro = "";  
              $this->end_numero = "";  
              $this->end_complemento = "";  
              $this->end_bairro = "";  
              $this->end_cidade = "";  
              $this->end_uf = "";  
              $this->end_cep = "";  
              $this->num_totvs = "";  
              $this->img_logo = "";  
              $this->img_logo_ul_name = "" ;  
              $this->img_logo_ul_type = "" ;  
              $this->num_ativo = "";  
              $this->pontodeencontro = "";  
              $this->perfildoempreendimento = "";  
              $this->id_empreendimentosadmin = "";  
              $this->img_rg = "";  
              $this->img_rg_ul_name = "" ;  
              $this->img_rg_ul_type = "" ;  
              $this->deleteonclick = "";  
              $this->localizacao = "";  
              $this->savedataonclick = "";  
              $this->upnpt = "";  
              $this->uprelatoriovistoria = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['foreign_key'] as $sFKName => $sFKValue)
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
function deleteOnClick_onClick($end_bairro, $end_complemento, $end_numero, $end_logradouro, $num_telefonecomercial, $nom_email, $nom_empreendimento, $savedataonclick, $poplabelframe, $poelabelframe, $localizacao, $deleteonclick, $bloqueioprelabelframe, $bloqueioopelabelframe, $antenariolabelframe, $num_cnpj, $img_rg, $id_empreendimentosadmin, $perfildoempreendimento, $pontodeencontro, $num_ativo, $img_logo, $num_totvs, $end_cep, $end_uf, $end_cidade, $id_empreendimento)
{
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         
$original_num_ativo = $this->num_ativo;
$original_id_empreendimento = $this->id_empreendimento;
$original_end_bairro = $this->end_bairro;
$original_end_complemento = $this->end_complemento;
$original_end_numero = $this->end_numero;
$original_end_logradouro = $this->end_logradouro;
$original_num_telefonecomercial = $this->num_telefonecomercial;
$original_nom_email = $this->nom_email;
$original_nom_empreendimento = $this->nom_empreendimento;
$original_savedataonclick = $this->savedataonclick;
$original_poplabelframe = $this->poplabelframe;
$original_poelabelframe = $this->poelabelframe;
$original_localizacao = $this->localizacao;
$original_deleteonclick = $this->deleteonclick;
$original_bloqueioprelabelframe = $this->bloqueioprelabelframe;
$original_bloqueioopelabelframe = $this->bloqueioopelabelframe;
$original_antenariolabelframe = $this->antenariolabelframe;
$original_num_cnpj = $this->num_cnpj;
$original_img_rg = $this->img_rg;
$original_id_empreendimentosadmin = $this->id_empreendimentosadmin;
$original_perfildoempreendimento = $this->perfildoempreendimento;
$original_pontodeencontro = $this->pontodeencontro;
$original_num_ativo = $this->num_ativo;
$original_img_logo = $this->img_logo;
$original_num_totvs = $this->num_totvs;
$original_end_cep = $this->end_cep;
$original_end_uf = $this->end_uf;
$original_end_cidade = $this->end_cidade;
$original_id_empreendimento = $this->id_empreendimento;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
sc_include_library('sys', 'models', 'Npt.php');
$modelNpt = new Npt($this);

$this->num_ativo  = "R";

$Arquivos = $modelNpt->getByEmpreendimento(intval($this->id_empreendimento ));
$logConteudo = $modelLogs->getConteudo();
$logConteudo["NPT"] = $Arquivos;

$modelLogs->insert([
	"Modulo" => "EMPREENDIMENTO",
	"Funcao" => "DELETAR",
	"Descricao" => 'Remoção de empreendimento',
	"Conteudo" => $logConteudo
]);

$s->setIUDState("grid_ConsultadeEmpreendimentos", "D", "success");
 
      $nm_select = "UPDATE tb_empreendimentos SET Num_Ativo = 'R' WHERE ID_Empreendimento = '$this->id_empreendimento'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_empreendimento != "")
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
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultadeEmpreendimentos') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };


$modificado_num_ativo = $this->num_ativo;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_end_bairro = $this->end_bairro;
$modificado_end_complemento = $this->end_complemento;
$modificado_end_numero = $this->end_numero;
$modificado_end_logradouro = $this->end_logradouro;
$modificado_num_telefonecomercial = $this->num_telefonecomercial;
$modificado_nom_email = $this->nom_email;
$modificado_nom_empreendimento = $this->nom_empreendimento;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_poplabelframe = $this->poplabelframe;
$modificado_poelabelframe = $this->poelabelframe;
$modificado_localizacao = $this->localizacao;
$modificado_deleteonclick = $this->deleteonclick;
$modificado_bloqueioprelabelframe = $this->bloqueioprelabelframe;
$modificado_bloqueioopelabelframe = $this->bloqueioopelabelframe;
$modificado_antenariolabelframe = $this->antenariolabelframe;
$modificado_num_cnpj = $this->num_cnpj;
$modificado_img_rg = $this->img_rg;
$modificado_id_empreendimentosadmin = $this->id_empreendimentosadmin;
$modificado_perfildoempreendimento = $this->perfildoempreendimento;
$modificado_pontodeencontro = $this->pontodeencontro;
$modificado_num_ativo = $this->num_ativo;
$modificado_img_logo = $this->img_logo;
$modificado_num_totvs = $this->num_totvs;
$modificado_end_cep = $this->end_cep;
$modificado_end_uf = $this->end_uf;
$modificado_end_cidade = $this->end_cidade;
$modificado_id_empreendimento = $this->id_empreendimento;
$this->nm_formatar_campos('num_ativo', 'id_empreendimento');
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_end_bairro !== $modificado_end_bairro || isset($this->nmgp_cmp_readonly['end_bairro']) || (isset($bFlagRead_end_bairro) && $bFlagRead_end_bairro))
{
    $this->ajax_return_values_end_bairro(true);
}
if ($original_end_complemento !== $modificado_end_complemento || isset($this->nmgp_cmp_readonly['end_complemento']) || (isset($bFlagRead_end_complemento) && $bFlagRead_end_complemento))
{
    $this->ajax_return_values_end_complemento(true);
}
if ($original_end_numero !== $modificado_end_numero || isset($this->nmgp_cmp_readonly['end_numero']) || (isset($bFlagRead_end_numero) && $bFlagRead_end_numero))
{
    $this->ajax_return_values_end_numero(true);
}
if ($original_end_logradouro !== $modificado_end_logradouro || isset($this->nmgp_cmp_readonly['end_logradouro']) || (isset($bFlagRead_end_logradouro) && $bFlagRead_end_logradouro))
{
    $this->ajax_return_values_end_logradouro(true);
}
if ($original_num_telefonecomercial !== $modificado_num_telefonecomercial || isset($this->nmgp_cmp_readonly['num_telefonecomercial']) || (isset($bFlagRead_num_telefonecomercial) && $bFlagRead_num_telefonecomercial))
{
    $this->ajax_return_values_num_telefonecomercial(true);
}
if ($original_nom_email !== $modificado_nom_email || isset($this->nmgp_cmp_readonly['nom_email']) || (isset($bFlagRead_nom_email) && $bFlagRead_nom_email))
{
    $this->ajax_return_values_nom_email(true);
}
if ($original_nom_empreendimento !== $modificado_nom_empreendimento || isset($this->nmgp_cmp_readonly['nom_empreendimento']) || (isset($bFlagRead_nom_empreendimento) && $bFlagRead_nom_empreendimento))
{
    $this->ajax_return_values_nom_empreendimento(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_poplabelframe !== $modificado_poplabelframe || isset($this->nmgp_cmp_readonly['poplabelframe']) || (isset($bFlagRead_poplabelframe) && $bFlagRead_poplabelframe))
{
    $this->ajax_return_values_poplabelframe(true);
}
if ($original_poelabelframe !== $modificado_poelabelframe || isset($this->nmgp_cmp_readonly['poelabelframe']) || (isset($bFlagRead_poelabelframe) && $bFlagRead_poelabelframe))
{
    $this->ajax_return_values_poelabelframe(true);
}
if ($original_localizacao !== $modificado_localizacao || isset($this->nmgp_cmp_readonly['localizacao']) || (isset($bFlagRead_localizacao) && $bFlagRead_localizacao))
{
    $this->ajax_return_values_localizacao(true);
}
if ($original_deleteonclick !== $modificado_deleteonclick || isset($this->nmgp_cmp_readonly['deleteonclick']) || (isset($bFlagRead_deleteonclick) && $bFlagRead_deleteonclick))
{
    $this->ajax_return_values_deleteonclick(true);
}
if ($original_bloqueioprelabelframe !== $modificado_bloqueioprelabelframe || isset($this->nmgp_cmp_readonly['bloqueioprelabelframe']) || (isset($bFlagRead_bloqueioprelabelframe) && $bFlagRead_bloqueioprelabelframe))
{
    $this->ajax_return_values_bloqueioprelabelframe(true);
}
if ($original_bloqueioopelabelframe !== $modificado_bloqueioopelabelframe || isset($this->nmgp_cmp_readonly['bloqueioopelabelframe']) || (isset($bFlagRead_bloqueioopelabelframe) && $bFlagRead_bloqueioopelabelframe))
{
    $this->ajax_return_values_bloqueioopelabelframe(true);
}
if ($original_antenariolabelframe !== $modificado_antenariolabelframe || isset($this->nmgp_cmp_readonly['antenariolabelframe']) || (isset($bFlagRead_antenariolabelframe) && $bFlagRead_antenariolabelframe))
{
    $this->ajax_return_values_antenariolabelframe(true);
}
if ($original_num_cnpj !== $modificado_num_cnpj || isset($this->nmgp_cmp_readonly['num_cnpj']) || (isset($bFlagRead_num_cnpj) && $bFlagRead_num_cnpj))
{
    $this->ajax_return_values_num_cnpj(true);
}
if ($original_img_rg !== $modificado_img_rg || isset($this->nmgp_cmp_readonly['img_rg']) || (isset($bFlagRead_img_rg) && $bFlagRead_img_rg))
{
    $this->ajax_return_values_img_rg(true);
}
if ($original_id_empreendimentosadmin !== $modificado_id_empreendimentosadmin || isset($this->nmgp_cmp_readonly['id_empreendimentosadmin']) || (isset($bFlagRead_id_empreendimentosadmin) && $bFlagRead_id_empreendimentosadmin))
{
    $this->ajax_return_values_id_empreendimentosadmin(true);
}
if ($original_perfildoempreendimento !== $modificado_perfildoempreendimento || isset($this->nmgp_cmp_readonly['perfildoempreendimento']) || (isset($bFlagRead_perfildoempreendimento) && $bFlagRead_perfildoempreendimento))
{
    $this->ajax_return_values_perfildoempreendimento(true);
}
if ($original_pontodeencontro !== $modificado_pontodeencontro || isset($this->nmgp_cmp_readonly['pontodeencontro']) || (isset($bFlagRead_pontodeencontro) && $bFlagRead_pontodeencontro))
{
    $this->ajax_return_values_pontodeencontro(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_img_logo !== $modificado_img_logo || isset($this->nmgp_cmp_readonly['img_logo']) || (isset($bFlagRead_img_logo) && $bFlagRead_img_logo))
{
    $this->ajax_return_values_img_logo(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_end_cep !== $modificado_end_cep || isset($this->nmgp_cmp_readonly['end_cep']) || (isset($bFlagRead_end_cep) && $bFlagRead_end_cep))
{
    $this->ajax_return_values_end_cep(true);
}
if ($original_end_uf !== $modificado_end_uf || isset($this->nmgp_cmp_readonly['end_uf']) || (isset($bFlagRead_end_uf) && $bFlagRead_end_uf))
{
    $this->ajax_return_values_end_uf(true);
}
if ($original_end_cidade !== $modificado_end_cidade || isset($this->nmgp_cmp_readonly['end_cidade']) || (isset($bFlagRead_end_cidade) && $bFlagRead_end_cidade))
{
    $this->ajax_return_values_end_cidade(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
form_CadEmpreendimentos_etapa1_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off';
}
function disableFields()
{
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         
$this->sc_field_readonly("num_cnpj", 'on');
$this->sc_field_readonly("nom_empreendimento", 'on');
$this->sc_field_readonly("nom_email", 'on');
$this->sc_field_readonly("num_telefonecomercial", 'on');
$this->sc_field_readonly("end_logradouro", 'on');
$this->sc_field_readonly("end_numero", 'on');
$this->sc_field_readonly("end_complemento", 'on');
$this->sc_field_readonly("end_bairro", 'on');
$this->sc_field_readonly("end_cidade", 'on');
$this->sc_field_readonly("end_uf", 'on');
$this->sc_field_readonly("end_cep", 'on');
$this->sc_field_readonly("num_totvs", 'on');
$this->sc_field_readonly("img_logo", 'on');
$this->sc_field_readonly("num_ativo", 'on');
$this->sc_field_readonly("perfildoempreendimento", 'on');
$this->sc_field_readonly("id_empreendimentosadmin", 'on');
$this->sc_field_readonly("pontodeencontro", 'on');
$this->sc_field_readonly("upnpt", 'on');
$this->sc_field_readonly("img_logo", 'on');
$this->sc_field_readonly("img_rg", 'on');
$this->sc_field_readonly("uprelatoriovistoria", 'on');

$this->sc_ajax_javascript('nm_field_disabled', array("upnpt=disabled;img_rg=disabled;uprelatoriovistoria=disabled;img_logo=disabled", ""));
;

echo "<style>
[id^=id_sc_mucontrol_], [id^=id_sc_dragdrop_], [class^=id_mu_all_chkbx_] {
	display: none !important;
}
</style>";
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off';
}
function onLoadJS($config=[])
{
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         
?>
	<style>
		#form_CadEmpreendimentos_etapa1_form6 > ul {
			margin-top: 20px;
		}
	</style>
	<script>
		$(document).ready(function(){
			<?php foreach($config["RelatorioVistorias"] as $RV): ?>
			$('.id_mu_chkbx_uprelatoriovistoria[value=<?= $RV["ID"]?>]').parent()
				.closest('.id_mu_item_uprelatoriovistoria')
				.find('.id_mu_data_uprelatoriovistoria a').append(' | <b><?=  $this->Ini->Nm_lang['lang_label_dataupload'] ?>: <?= date("d/m/Y H:i", strtotime($RV["Data"]))?></b>');
			<?php endforeach; ?>
		
			$tabRelatorioVistorias = $('#id_form_CadEmpreendimentos_etapa1_form11');
			<?php if (!$config["frames"]["relatorioVistorias"]): ?>
				$tabRelatorioVistorias.hide();
			<?php endif; ?>
		
			$tabNPT = $('#id_form_CadEmpreendimentos_etapa1_form10');
			<?php if (!$config["frames"]["npt"]): ?>
				$tabNPT.hide();
			<?php endif; ?>
		
			<?php if ($config['frames']['frameTorre']): ?>
				$torreTd = $('#id_label_torrelabelframe').closest('td');
				$torreTd.css('width', '100%');
				$torreTd.html('<iframe src="../form_Torre" id="id_torre_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabTorre = $('#id_form_CadEmpreendimentos_etapa1_form2');
			$tabTorre.hide();
		
			<?php if ($config['frames']['framePOP']): ?>
				$popTd = $('#id_label_poplabelframe').closest('td');
				$popTd.css('width', '100%');
				$popTd.html('<iframe src="../form_POP" id="id_pop_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabPop = $('#id_form_CadEmpreendimentos_etapa1_form3');
			$tabPop.hide();
		
		
			$tabBloqueio = $('#id_form_CadEmpreendimentos_etapa1_form6');
			$tabBloqueio.hide();
			<?php if ($config['frames']['frameBloqueio']): ?>
				$blkOpeTd = $('#id_label_bloqueioopelabelframe').closest('tr');
				$blkOpeTd.html('<td style="width:100%"><iframe src="../form_BloqueioEmpreendimentoOperadora" id="id_blkope_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe></td>');
			
				$blkPreTd = $('#id_label_bloqueioprelabelframe').closest('tr');
				$blkPreTd.html('<td style="width:100%"><iframe src="../form_BloqueioEmpreendimentoPrestadora" id="id_blkpre_frame" style="width:100%;border:0;margin-top:30px" onLoad="updateStatsFrame(this);"></iframe></td>');
		
				$blkTecOpeTd = $('#id_label_bloqueiotecopelabelframe').closest('tr');
				$blkTecOpeTd.html('<td style="width:100%"><iframe src="../form_BloqueioTecnicoEmpreendimentoOperadora" id="id_blktecope_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe></td>');
			
				$blkTecPreTd = $('#id_label_bloqueiotecprelabelframe').closest('tr');
				$blkTecPreTd.html('<td style="width:100%"><iframe src="../form_BloqueioTecnicoEmpreendimentoPrestadora" id="id_blktecpre_frame" style="width:100%;border:0;margin-top:30px" onLoad="updateStatsFrame(this);"></iframe></td>');
			<?php endif; ?>
		
			<?php if ($config['frames']['frameShafts']): ?>
				$shaftsTd = $('#id_label_shaftlabelframe').closest('td');
				$shaftsTd.css('width', '100%');
				$shaftsTd.html('<iframe src="../form_Shafts" id="id_shafts_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabShafts = $('#id_form_CadEmpreendimentos_etapa1_form4');
			$tabShafts.hide();
		
			<?php if ($config['frames']['frameAntenarios']): ?>
				$antenariosTd = $('#id_label_antenariolabelframe').closest('td');
				$antenariosTd.css('width', '100%');
				$antenariosTd.html('<iframe src="../form_Antenarios" id="id_antenarios_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabAntenarios = $('#id_form_CadEmpreendimentos_etapa1_form5');
			$tabAntenarios.hide();
		
			<?php if ($config['frames']['frameInconformidades']): ?>
				$inconformidadesTd = $('#id_label_inconformidadeslabelframe').closest('td');
				$inconformidadesTd.css('width', '100%');
				$inconformidadesTd.html('<iframe src="../grid_Inconformidades" id="id_inconformidade_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabInconformidades = $('#id_form_CadEmpreendimentos_etapa1_form7');
			$tabInconformidades.hide();
		
			<?php if ($config['frames']['framePOE']): ?>
				$poeTd = $('#id_label_poelabelframe').closest('td');
				$poeTd.css('width', '100%');
				$poeTd.html('<iframe src="../grid_POE" id="id_poe_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabpoe = $('#id_form_CadEmpreendimentos_etapa1_form8');
			$tabpoe.hide();
        
			<?php if ($config['frames']['framePontoDeEncontro']): ?>
				$pontodeencontroTd = $('#id_label_pontodeencontrolabelframe').closest('td');
				$pontodeencontroTd.css('width', '100%');
				$pontodeencontroTd.html('<iframe src="../form_pontodeescontro" id="id_pontodeencontro_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabpontodeencontro = $('#id_form_CadEmpreendimentos_etapa1_form9');
			$tabpontodeencontro.hide();

			setInterval(function () {
				updateStatsFrame();
			}, 500);
		
			fileSC = new validateFileSC({
				label_max: `<?= $this->Ini->Nm_lang['lang_label_max'] ?>`,
				label_formato: `<?= $this->Ini->Nm_lang['lang_label_formato'] ?>`,
				label_arquivoinvalido: `<?= $this->Ini->Nm_lang['lang_label_arquivoinvalido'] ?>`,
				label_tamanho: `<?= $this->Ini->Nm_lang['lang_label_tamanho'] ?>`
			});
			fileSC.watch('img_logo', {
				sizeB: 2097152,
				type: ['png', 'jpg', 'jpeg']
			});
			fileSC.watch('img_rg', {
				sizeB: 2097152,
				type: ['png', 'jpg', 'jpeg']
			});
			fileSC.watch('upnpt', {
				sizeB: 52428800,
				type: ['pdf', 'doc', 'docx', 'docm', 'zip', 'rar', 'txt', 'gzip', 'tar']
			});
			fileSC.watch('uprelatoriovistoria', {
				sizeB: 5242880,
				type: ['png', 'jpg', 'jpeg', 'pdf', 'doc', 'docx', 'docm', 'txt']
			});
		
			<?php if ($config["RelatorioVistoriasExpirados"] ?? null): 
				$html = "<hr>". $this->Ini->Nm_lang['lang_label_arquivosexpirados'] .":<br><ul style='padding-left:20px'>";
				foreach($config["RelatorioVistoriasExpirados"] as $File) {
					$html .= "<li style='color:red'>".$File["File_Name"]."</li>";
				}
				$html .= "</ul>";
			?>
				$('#fileupload_outputmsg_uprelatoriovistoria').after(`<?=$html?>`);
			<?php endif; ?>
		});
		
		function updateStatsFrame(frame) {
			<?php if ($config['frames']['frameTorre']): ?> 
				$tabTorre.show(); 
				nSize = $('#id_torre_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_torre_frame').height(nSize);
				$torreTd.height(nSize);
			<?php endif; ?>
		
			<?php if ($config['frames']['framePOP']): ?> 
				$tabPop.show(); 
				nSize = $('#id_pop_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_pop_frame').height(nSize);
				$popTd.height(nSize);
			<?php endif; ?>
			
			<?php if ($config['frames']['frameBloqueio']): ?> 
				$tabBloqueio.show(); 
				nSize = $('#id_blkope_frame').contents().find('body').height();
				nSize = nSize < 350 ? 350 : nSize;
				$('#id_blkope_frame').height(nSize);
				$blkOpeTd.height(nSize);

				nSize = $('#id_blkpre_frame').contents().find('body').height();
				nSize = nSize < 350 ? 350 : nSize;
				$('#id_blkpre_frame').height(nSize);
				$blkPreTd.height(nSize);
		
				nSize = $('#id_blktecope_frame').contents().find('body').height();
				nSize = nSize < 350 ? 350 : nSize;
				$('#id_blktecope_frame').height(nSize);
				$blkTecOpeTd.height(nSize);

				nSize = $('#id_blktecpre_frame').contents().find('body').height();
				nSize = nSize < 350 ? 350 : nSize;
				$('#id_blktecpre_frame').height(nSize);
				$blkTecPreTd.height(nSize);
			<?php endif; ?>
			
			<?php if ($config['frames']['frameShafts']): ?> 
				$tabShafts.show(); 
				nSize = $('#id_shafts_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_shafts_frame').height(nSize);
				$shaftsTd.height(nSize);
			<?php endif; ?>
			
		   <?php if ($config['frames']['frameAntenarios']): ?> 
				$tabAntenarios.show(); 
				nSize = $('#id_antenarios_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_antenarios_frame').height(nSize);
				$antenariosTd.height(nSize);
			<?php endif; ?>
		
			<?php if ($config['frames']['frameInconformidades']): ?> 
				$tabInconformidades.show(); 
				nSize = $('#id_inconformidade_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_inconformidade_frame').height(nSize);
				$inconformidadesTd.height(nSize);
			<?php endif; ?>
								   
			<?php if ($config['frames']['framePOE']): ?> 
				$tabpoe.show(); 
				nSize = $('#id_poe_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_poe_frame').height(nSize);
				$poeTd.height(nSize);
			<?php endif; ?>
        
            <?php if ($config['frames']['framePontoDeEncontro']): ?> 
				$tabpontodeencontro.show(); 
				nSize = $('#id_pontodeencontro_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_pontodeencontro_frame').height(nSize);
				$pontodeencontroTd.height(nSize);
			<?php endif; ?>

			if (frame) {
				$(frame).contents().find('body').attr('style', 'overflow-y:hidden');
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
		
		function deleteEmpreendimento () {
			$('#id_sc_field_deleteonclick').click();
			sModal('close');
		}
	</script>
<?php


$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($end_bairro, $end_complemento, $end_numero, $end_logradouro, $num_telefonecomercial, $nom_email, $torrelabelframe, $nom_empreendimento, $shaftlabelframe, $savedataonclick, $poplabelframe, $num_cnpj, $pontodeencontro, $num_ativo, $img_logo, $num_totvs, $end_cep, $end_uf, $end_cidade, $id_empreendimento)
{
$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'on';
         
$original_num_cnpj = $this->num_cnpj;
$original_id_empreendimento = $this->id_empreendimento;
$original_nom_empreendimento = $this->nom_empreendimento;
$original_nom_email = $this->nom_email;
$original_num_telefonecomercial = $this->num_telefonecomercial;
$original_end_logradouro = $this->end_logradouro;
$original_end_bairro = $this->end_bairro;
$original_end_cidade = $this->end_cidade;
$original_end_uf = $this->end_uf;
$original_end_cep = $this->end_cep;
$original_end_bairro = $this->end_bairro;
$original_end_complemento = $this->end_complemento;
$original_end_numero = $this->end_numero;
$original_end_logradouro = $this->end_logradouro;
$original_num_telefonecomercial = $this->num_telefonecomercial;
$original_nom_email = $this->nom_email;
$original_torrelabelframe = $this->torrelabelframe;
$original_nom_empreendimento = $this->nom_empreendimento;
$original_shaftlabelframe = $this->shaftlabelframe;
$original_savedataonclick = $this->savedataonclick;
$original_poplabelframe = $this->poplabelframe;
$original_num_cnpj = $this->num_cnpj;
$original_pontodeencontro = $this->pontodeencontro;
$original_num_ativo = $this->num_ativo;
$original_img_logo = $this->img_logo;
$original_num_totvs = $this->num_totvs;
$original_end_cep = $this->end_cep;
$original_end_uf = $this->end_uf;
$original_end_cidade = $this->end_cidade;
$original_id_empreendimento = $this->id_empreendimento;

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
sc_include_library('sys', 'models', 'Empreendimentos.php');
$_Empreendimentos = new Empreendimentos($this);
$msg = "";
$Error = false;

if (!isValidCNPJ($this->num_cnpj )) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp1'] ;
	$Error = true;
} else {
	$Empreendimento = $_Empreendimentos->getByCNPJ($this->num_cnpj , 'S', $this->id_empreendimento );
	if ($Empreendimento) {
		$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp2'] ;
		$Error = true;
	}
}

if (!$this->nom_empreendimento ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp3'] ;
	$Error = true;
}

if (!$this->nom_email  || !$this->num_telefonecomercial ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp4'] ;
	$Error = true;
} elseif (!isValidEmail($this->nom_email )) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp5'] ;
	$Error = true;
} elseif (!isValidPhone($this->num_telefonecomercial )) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp6'] ;
	$Error = true;
}

if (!$this->end_logradouro  || !$this->end_bairro  || !$this->end_bairro  || !$this->end_cidade  || !$this->end_uf  || !$this->end_cep ) {
	$msg .=  $this->Ini->Nm_lang['lang_msg_alert_cademp7'] ;
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

$modificado_num_cnpj = $this->num_cnpj;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_nom_empreendimento = $this->nom_empreendimento;
$modificado_nom_email = $this->nom_email;
$modificado_num_telefonecomercial = $this->num_telefonecomercial;
$modificado_end_logradouro = $this->end_logradouro;
$modificado_end_bairro = $this->end_bairro;
$modificado_end_cidade = $this->end_cidade;
$modificado_end_uf = $this->end_uf;
$modificado_end_cep = $this->end_cep;
$modificado_end_bairro = $this->end_bairro;
$modificado_end_complemento = $this->end_complemento;
$modificado_end_numero = $this->end_numero;
$modificado_end_logradouro = $this->end_logradouro;
$modificado_num_telefonecomercial = $this->num_telefonecomercial;
$modificado_nom_email = $this->nom_email;
$modificado_torrelabelframe = $this->torrelabelframe;
$modificado_nom_empreendimento = $this->nom_empreendimento;
$modificado_shaftlabelframe = $this->shaftlabelframe;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_poplabelframe = $this->poplabelframe;
$modificado_num_cnpj = $this->num_cnpj;
$modificado_pontodeencontro = $this->pontodeencontro;
$modificado_num_ativo = $this->num_ativo;
$modificado_img_logo = $this->img_logo;
$modificado_num_totvs = $this->num_totvs;
$modificado_end_cep = $this->end_cep;
$modificado_end_uf = $this->end_uf;
$modificado_end_cidade = $this->end_cidade;
$modificado_id_empreendimento = $this->id_empreendimento;
$this->nm_formatar_campos('num_cnpj', 'id_empreendimento', 'nom_empreendimento', 'nom_email', 'num_telefonecomercial', 'end_logradouro', 'end_bairro', 'end_cidade', 'end_uf', 'end_cep');
if ($original_num_cnpj !== $modificado_num_cnpj || isset($this->nmgp_cmp_readonly['num_cnpj']) || (isset($bFlagRead_num_cnpj) && $bFlagRead_num_cnpj))
{
    $this->ajax_return_values_num_cnpj(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_nom_empreendimento !== $modificado_nom_empreendimento || isset($this->nmgp_cmp_readonly['nom_empreendimento']) || (isset($bFlagRead_nom_empreendimento) && $bFlagRead_nom_empreendimento))
{
    $this->ajax_return_values_nom_empreendimento(true);
}
if ($original_nom_email !== $modificado_nom_email || isset($this->nmgp_cmp_readonly['nom_email']) || (isset($bFlagRead_nom_email) && $bFlagRead_nom_email))
{
    $this->ajax_return_values_nom_email(true);
}
if ($original_num_telefonecomercial !== $modificado_num_telefonecomercial || isset($this->nmgp_cmp_readonly['num_telefonecomercial']) || (isset($bFlagRead_num_telefonecomercial) && $bFlagRead_num_telefonecomercial))
{
    $this->ajax_return_values_num_telefonecomercial(true);
}
if ($original_end_logradouro !== $modificado_end_logradouro || isset($this->nmgp_cmp_readonly['end_logradouro']) || (isset($bFlagRead_end_logradouro) && $bFlagRead_end_logradouro))
{
    $this->ajax_return_values_end_logradouro(true);
}
if ($original_end_bairro !== $modificado_end_bairro || isset($this->nmgp_cmp_readonly['end_bairro']) || (isset($bFlagRead_end_bairro) && $bFlagRead_end_bairro))
{
    $this->ajax_return_values_end_bairro(true);
}
if ($original_end_cidade !== $modificado_end_cidade || isset($this->nmgp_cmp_readonly['end_cidade']) || (isset($bFlagRead_end_cidade) && $bFlagRead_end_cidade))
{
    $this->ajax_return_values_end_cidade(true);
}
if ($original_end_uf !== $modificado_end_uf || isset($this->nmgp_cmp_readonly['end_uf']) || (isset($bFlagRead_end_uf) && $bFlagRead_end_uf))
{
    $this->ajax_return_values_end_uf(true);
}
if ($original_end_cep !== $modificado_end_cep || isset($this->nmgp_cmp_readonly['end_cep']) || (isset($bFlagRead_end_cep) && $bFlagRead_end_cep))
{
    $this->ajax_return_values_end_cep(true);
}
if ($original_end_bairro !== $modificado_end_bairro || isset($this->nmgp_cmp_readonly['end_bairro']) || (isset($bFlagRead_end_bairro) && $bFlagRead_end_bairro))
{
    $this->ajax_return_values_end_bairro(true);
}
if ($original_end_complemento !== $modificado_end_complemento || isset($this->nmgp_cmp_readonly['end_complemento']) || (isset($bFlagRead_end_complemento) && $bFlagRead_end_complemento))
{
    $this->ajax_return_values_end_complemento(true);
}
if ($original_end_numero !== $modificado_end_numero || isset($this->nmgp_cmp_readonly['end_numero']) || (isset($bFlagRead_end_numero) && $bFlagRead_end_numero))
{
    $this->ajax_return_values_end_numero(true);
}
if ($original_end_logradouro !== $modificado_end_logradouro || isset($this->nmgp_cmp_readonly['end_logradouro']) || (isset($bFlagRead_end_logradouro) && $bFlagRead_end_logradouro))
{
    $this->ajax_return_values_end_logradouro(true);
}
if ($original_num_telefonecomercial !== $modificado_num_telefonecomercial || isset($this->nmgp_cmp_readonly['num_telefonecomercial']) || (isset($bFlagRead_num_telefonecomercial) && $bFlagRead_num_telefonecomercial))
{
    $this->ajax_return_values_num_telefonecomercial(true);
}
if ($original_nom_email !== $modificado_nom_email || isset($this->nmgp_cmp_readonly['nom_email']) || (isset($bFlagRead_nom_email) && $bFlagRead_nom_email))
{
    $this->ajax_return_values_nom_email(true);
}
if ($original_torrelabelframe !== $modificado_torrelabelframe || isset($this->nmgp_cmp_readonly['torrelabelframe']) || (isset($bFlagRead_torrelabelframe) && $bFlagRead_torrelabelframe))
{
    $this->ajax_return_values_torrelabelframe(true);
}
if ($original_nom_empreendimento !== $modificado_nom_empreendimento || isset($this->nmgp_cmp_readonly['nom_empreendimento']) || (isset($bFlagRead_nom_empreendimento) && $bFlagRead_nom_empreendimento))
{
    $this->ajax_return_values_nom_empreendimento(true);
}
if ($original_shaftlabelframe !== $modificado_shaftlabelframe || isset($this->nmgp_cmp_readonly['shaftlabelframe']) || (isset($bFlagRead_shaftlabelframe) && $bFlagRead_shaftlabelframe))
{
    $this->ajax_return_values_shaftlabelframe(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_poplabelframe !== $modificado_poplabelframe || isset($this->nmgp_cmp_readonly['poplabelframe']) || (isset($bFlagRead_poplabelframe) && $bFlagRead_poplabelframe))
{
    $this->ajax_return_values_poplabelframe(true);
}
if ($original_num_cnpj !== $modificado_num_cnpj || isset($this->nmgp_cmp_readonly['num_cnpj']) || (isset($bFlagRead_num_cnpj) && $bFlagRead_num_cnpj))
{
    $this->ajax_return_values_num_cnpj(true);
}
if ($original_pontodeencontro !== $modificado_pontodeencontro || isset($this->nmgp_cmp_readonly['pontodeencontro']) || (isset($bFlagRead_pontodeencontro) && $bFlagRead_pontodeencontro))
{
    $this->ajax_return_values_pontodeencontro(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_img_logo !== $modificado_img_logo || isset($this->nmgp_cmp_readonly['img_logo']) || (isset($bFlagRead_img_logo) && $bFlagRead_img_logo))
{
    $this->ajax_return_values_img_logo(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_end_cep !== $modificado_end_cep || isset($this->nmgp_cmp_readonly['end_cep']) || (isset($bFlagRead_end_cep) && $bFlagRead_end_cep))
{
    $this->ajax_return_values_end_cep(true);
}
if ($original_end_uf !== $modificado_end_uf || isset($this->nmgp_cmp_readonly['end_uf']) || (isset($bFlagRead_end_uf) && $bFlagRead_end_uf))
{
    $this->ajax_return_values_end_uf(true);
}
if ($original_end_cidade !== $modificado_end_cidade || isset($this->nmgp_cmp_readonly['end_cidade']) || (isset($bFlagRead_end_cidade) && $bFlagRead_end_cidade))
{
    $this->ajax_return_values_end_cidade(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
form_CadEmpreendimentos_etapa1_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadEmpreendimentos_etapa1']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_CadEmpreendimentos_etapa1_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'] . "';";
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
       $out_img_logo = "";  
   } 
   else 
   { 
       $out_img_logo = $this->img_logo;  
   } 
   if ($this->img_logo != "" && $this->img_logo != "none")   
   { 
       $out_img_logo = $this->Ini->path_imag_temp . "/sc_img_logo_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_img_logo = fopen($this->Ini->root . $out_img_logo, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->img_logo, 0, 12));
           if (substr($this->img_logo, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->img_logo = nm_conv_img_access($this->img_logo);
           } 
       } 
       if (substr($this->img_logo, 0, 4) == "*nm*") 
       { 
           $this->img_logo = substr($this->img_logo, 4) ; 
           $this->img_logo = base64_decode($this->img_logo) ; 
       } 
       $img_pos_bm = strpos($this->img_logo, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->img_logo = substr($this->img_logo, $img_pos_bm) ; 
       } 
       fwrite($arq_img_logo, $this->img_logo) ;  
       fclose($arq_img_logo) ;  
       $out1_img_logo = $out_img_logo; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       $out_img_logo = $this->Ini->path_imag_temp . "/sc_" . "img_logo_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_img_logo);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_img_logo);
       } 
       else 
       { 
           $out_img_logo = $out1_img_logo;
       } 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_img_logo;
       if (isset($temp_out_img_logo))
       {
           $out_img_logo = $temp_out_img_logo;
       }
       global $temp_out1_img_logo;
       if (isset($temp_out1_img_logo))
       {
           $out1_img_logo = $temp_out1_img_logo;
       }
   }
   if ($this->nmgp_opcao == "novo")
   { 
       $out_img_rg = "";  
   } 
   else 
   { 
       $out_img_rg = $this->img_rg;  
   } 
   if ($this->img_rg != "" && $this->img_rg != "none")   
   { 
       $path_img_rg = $this->Ini->root . $this->Ini->path_imagens . "/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . "/" . $this->img_rg;
       $md5_img_rg  = md5("/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . $this->img_rg);
       if (is_file($path_img_rg))  
       { 
           $NM_ler_img = true;
           $out_img_rg = $this->Ini->path_imag_temp . "/sc_img_rg_" . $md5_img_rg . ".gif" ;  
           if (is_file($this->Ini->root . $out_img_rg))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_img_rg) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_ler_img = false;
               } 
           } 
           if ($NM_ler_img) 
           { 
               $tmp_img_rg = fopen($path_img_rg, "r") ; 
               $reg_img_rg = fread($tmp_img_rg, filesize($path_img_rg)) ; 
               fclose($tmp_img_rg) ;  
               $arq_img_rg = fopen($this->Ini->root . $out_img_rg, "w") ;  
               fwrite($arq_img_rg, $reg_img_rg) ;  
               fclose($arq_img_rg) ;  
           } 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out_img_rg);
           $this->nmgp_return_img['img_rg'][0] = $sc_obj_img->getHeight();
           $this->nmgp_return_img['img_rg'][1] = $sc_obj_img->getWidth();
           $NM_redim_img = true;
           $out1_img_rg = $out_img_rg; 
           $md5_img_rg  = md5("/../emp_" . $this->nm_tira_formatacao_id_empreendimento($this->id_empreendimento) . "/RG/IMG_Capa" . $this->img_rg);
           $out_img_rg = $this->Ini->path_imag_temp . "/sc_img_rg_300300" . $md5_img_rg . ".gif" ;  
           if (is_file($this->Ini->root . $out_img_rg))  
           { 
               $NM_img_time = filemtime($this->Ini->root . $out_img_rg) + 0; 
               if ($this->Ini->nm_timestamp < $NM_img_time)  
               { 
                   $NM_redim_img = false;
               } 
           } 
           if ($NM_redim_img) 
           { 
               if (!$this->Ini->Gd_missing)
               { 
                   $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_img_rg);
                   $sc_obj_img->setWidth(300);
                   $sc_obj_img->setHeight(300);
                   $sc_obj_img->setManterAspecto(true);
                   $sc_obj_img->createImg($this->Ini->root . $out_img_rg);
               } 
               else 
               { 
                   $out_img_rg = $out1_img_rg;
               } 
           } 
       } 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_img_rg;
       if (isset($temp_out_img_rg))
       {
           $out_img_rg = $temp_out_img_rg;
       }
       global $temp_out1_img_rg;
       if (isset($temp_out1_img_rg))
       {
           $out1_img_rg = $temp_out1_img_rg;
       }
   }
     if (!$this->NM_ajax_flag && 'novo' != $this->nmgp_opcao)
     {
         if ('incluir' == $this->nmgp_opc_ant && 'nada' == $this->nmgp_opcao)
         {
         }
         else
         {
             $this->ajax_return_values_upnpt(true);
             $this->ajax_return_values_uprelatoriovistoria(true);
         }
     }
        include_once("form_CadEmpreendimentos_etapa1_form0.php");
        include_once("form_CadEmpreendimentos_etapa1_form1.php");
        include_once("form_CadEmpreendimentos_etapa1_form2.php");
        include_once("form_CadEmpreendimentos_etapa1_form3.php");
        include_once("form_CadEmpreendimentos_etapa1_form4.php");
        include_once("form_CadEmpreendimentos_etapa1_form5.php");
        include_once("form_CadEmpreendimentos_etapa1_form6.php");
        include_once("form_CadEmpreendimentos_etapa1_form7.php");
        include_once("form_CadEmpreendimentos_etapa1_form8.php");
        include_once("form_CadEmpreendimentos_etapa1_form9.php");
        include_once("form_CadEmpreendimentos_etapa1_form10.php");
        include_once("form_CadEmpreendimentos_etapa1_form11.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['csrf_token'];
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
       $nmgp_def_dados .= "{lang_label_active}?#?S?#??@?";
       $nmgp_def_dados .= "{lang_label_inactive}?#?N?#??@?";
       $nmgp_def_dados .= "{lang_label_prospect}?#?P?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_perfildoempreendimento()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "{lang_label_big}?#?G?#?N?@?";
       $nmgp_def_dados .= "{lang_label_medium}?#?M?#?N?@?";
       $nmgp_def_dados .= "{lang_label_little}?#?P?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "ID_Empreendimento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_CNPJ", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Empreendimento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TelefoneComercial", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Logradouro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Numero", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Complemento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Bairro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Cidade", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_UF", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_CEP", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TOTVS", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Empreendimento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_CNPJ", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_CEP", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Logradouro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Numero", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Bairro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Complemento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_UF", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_Cidade", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TelefoneComercial", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TOTVS", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_perfildoempreendimento($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "PerfilDoEmpreendimento", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_empreendimentosadmin($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Empreendimentosadmin", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "IMG_RG", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "PontoDeEncontro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Empreendimento", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter_form'] . " and (ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_CadEmpreendimentos_etapa1 = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['total'] = $qt_geral_reg_form_CadEmpreendimentos_etapa1;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
      $nm_numeric[] = "id_empreendimento";$nm_numeric[] = "id_empreendimentosadmin";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['decimal_db'] == ".")
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
       $nmgp_saida_form = "form_CadEmpreendimentos_etapa1_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_CadEmpreendimentos_etapa1_fim.php";
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
       form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadEmpreendimentos_etapa1']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
       form_CadEmpreendimentos_etapa1_pack_ajax_response();
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
