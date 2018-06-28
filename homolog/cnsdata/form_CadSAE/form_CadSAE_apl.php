<?php
//
class form_CadSAE_apl
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
   var $id_tiposae;
   var $id_empreendimento;
   var $id_empreendimento_1;
   var $id_condomino;
   var $id_condomino_1;
   var $id_conjunto;
   var $id_conjunto_1;
   var $id_operadora;
   var $id_operadora_1;
   var $id_prestador;
   var $id_prestador_1;
   var $id_usuario;
   var $tipo_cliente;
   var $nom_responsavel1;
   var $num_telefone1;
   var $nom_responsavel2;
   var $num_telefone2;
   var $num_celular2;
   var $nom_responsavel3;
   var $num_telefone3;
   var $num_celular3;
   var $instalacaoantena;
   var $instalacaoantena_1;
   var $emergencial;
   var $emergencial_1;
   var $data_inicio;
   var $hora_inicio;
   var $data_fim;
   var $hora_fim;
   var $desc;
   var $num_sae;
   var $data_abertura;
   var $data_abertura_hora;
   var $num_status;
   var $num_status_1;
   var $data_fechamento;
   var $data_fechamento_hora;
   var $id_usuario_fechamento;
   var $num_ativo;
   var $optantegbtec;
   var $optantegbtec_1;
   var $pontodeencontro;
   var $referenteprojeto;
   var $referenteprojeto_1;
   var $gbt_disponiveis;
   var $gbt_disponiveis_1;
   var $gbt_sae;
   var $gbt_sae_hidden;
   var $gbt_selecionados;
   var $gbt_selecionados_1;
   var $id_andar;
   var $id_andar_1;
   var $id_torre;
   var $id_torre_1;
   var $confirmgbtdisponclick;
   var $empreendimentofuncionamento;
   var $label_pas;
   var $removeronclick;
   var $resumoagenda;
   var $resumoagendastatus;
   var $savedataonclick;
   var $savegbtonclick;
   var $savestatusonclick;
   var $sendanaliseonclick;
   var $stepagendamento;
   var $stepdescricao;
   var $stepempreendimento;
   var $stepoperadora;
   var $stepprestadora;
   var $tecoperadora;
   var $tecprestadora;
   var $tiposae;
   var $os_info;
   var $sugestaoagenda;
   var $label_dataexpiracaoprojeto;
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
          if (isset($this->NM_ajax_info['param']['confirmgbtdisponclick']))
          {
              $this->confirmgbtdisponclick = $this->NM_ajax_info['param']['confirmgbtdisponclick'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_abertura']))
          {
              $this->data_abertura = $this->NM_ajax_info['param']['data_abertura'];
          }
          if (isset($this->NM_ajax_info['param']['data_fechamento']))
          {
              $this->data_fechamento = $this->NM_ajax_info['param']['data_fechamento'];
          }
          if (isset($this->NM_ajax_info['param']['data_fechamento_hora']))
          {
              $this->data_fechamento_hora = $this->NM_ajax_info['param']['data_fechamento_hora'];
          }
          if (isset($this->NM_ajax_info['param']['data_fim']))
          {
              $this->data_fim = $this->NM_ajax_info['param']['data_fim'];
          }
          if (isset($this->NM_ajax_info['param']['data_inicio']))
          {
              $this->data_inicio = $this->NM_ajax_info['param']['data_inicio'];
          }
          if (isset($this->NM_ajax_info['param']['desc']))
          {
              $this->desc = $this->NM_ajax_info['param']['desc'];
          }
          if (isset($this->NM_ajax_info['param']['emergencial']))
          {
              $this->emergencial = $this->NM_ajax_info['param']['emergencial'];
          }
          if (isset($this->NM_ajax_info['param']['empreendimentofuncionamento']))
          {
              $this->empreendimentofuncionamento = $this->NM_ajax_info['param']['empreendimentofuncionamento'];
          }
          if (isset($this->NM_ajax_info['param']['gbt_disponiveis']))
          {
              $this->gbt_disponiveis = $this->NM_ajax_info['param']['gbt_disponiveis'];
          }
          if (isset($this->NM_ajax_info['param']['gbt_sae']))
          {
              $this->gbt_sae = $this->NM_ajax_info['param']['gbt_sae'];
          }
          if (isset($this->NM_ajax_info['param']['gbt_selecionados']))
          {
              $this->gbt_selecionados = $this->NM_ajax_info['param']['gbt_selecionados'];
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
          if (isset($this->NM_ajax_info['param']['id_andar']))
          {
              $this->id_andar = $this->NM_ajax_info['param']['id_andar'];
          }
          if (isset($this->NM_ajax_info['param']['id_condomino']))
          {
              $this->id_condomino = $this->NM_ajax_info['param']['id_condomino'];
          }
          if (isset($this->NM_ajax_info['param']['id_conjunto']))
          {
              $this->id_conjunto = $this->NM_ajax_info['param']['id_conjunto'];
          }
          if (isset($this->NM_ajax_info['param']['id_empreendimento']))
          {
              $this->id_empreendimento = $this->NM_ajax_info['param']['id_empreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['id_operadora']))
          {
              $this->id_operadora = $this->NM_ajax_info['param']['id_operadora'];
          }
          if (isset($this->NM_ajax_info['param']['id_prestador']))
          {
              $this->id_prestador = $this->NM_ajax_info['param']['id_prestador'];
          }
          if (isset($this->NM_ajax_info['param']['id_tiposae']))
          {
              $this->id_tiposae = $this->NM_ajax_info['param']['id_tiposae'];
          }
          if (isset($this->NM_ajax_info['param']['id_torre']))
          {
              $this->id_torre = $this->NM_ajax_info['param']['id_torre'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuario']))
          {
              $this->id_usuario = $this->NM_ajax_info['param']['id_usuario'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuario_fechamento']))
          {
              $this->id_usuario_fechamento = $this->NM_ajax_info['param']['id_usuario_fechamento'];
          }
          if (isset($this->NM_ajax_info['param']['instalacaoantena']))
          {
              $this->instalacaoantena = $this->NM_ajax_info['param']['instalacaoantena'];
          }
          if (isset($this->NM_ajax_info['param']['label_dataexpiracaoprojeto']))
          {
              $this->label_dataexpiracaoprojeto = $this->NM_ajax_info['param']['label_dataexpiracaoprojeto'];
          }
          if (isset($this->NM_ajax_info['param']['label_pas']))
          {
              $this->label_pas = $this->NM_ajax_info['param']['label_pas'];
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
          if (isset($this->NM_ajax_info['param']['nom_responsavel1']))
          {
              $this->nom_responsavel1 = $this->NM_ajax_info['param']['nom_responsavel1'];
          }
          if (isset($this->NM_ajax_info['param']['nom_responsavel2']))
          {
              $this->nom_responsavel2 = $this->NM_ajax_info['param']['nom_responsavel2'];
          }
          if (isset($this->NM_ajax_info['param']['nom_responsavel3']))
          {
              $this->nom_responsavel3 = $this->NM_ajax_info['param']['nom_responsavel3'];
          }
          if (isset($this->NM_ajax_info['param']['num_ativo']))
          {
              $this->num_ativo = $this->NM_ajax_info['param']['num_ativo'];
          }
          if (isset($this->NM_ajax_info['param']['num_celular2']))
          {
              $this->num_celular2 = $this->NM_ajax_info['param']['num_celular2'];
          }
          if (isset($this->NM_ajax_info['param']['num_celular3']))
          {
              $this->num_celular3 = $this->NM_ajax_info['param']['num_celular3'];
          }
          if (isset($this->NM_ajax_info['param']['num_sae']))
          {
              $this->num_sae = $this->NM_ajax_info['param']['num_sae'];
          }
          if (isset($this->NM_ajax_info['param']['num_status']))
          {
              $this->num_status = $this->NM_ajax_info['param']['num_status'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefone1']))
          {
              $this->num_telefone1 = $this->NM_ajax_info['param']['num_telefone1'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefone2']))
          {
              $this->num_telefone2 = $this->NM_ajax_info['param']['num_telefone2'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefone3']))
          {
              $this->num_telefone3 = $this->NM_ajax_info['param']['num_telefone3'];
          }
          if (isset($this->NM_ajax_info['param']['optantegbtec']))
          {
              $this->optantegbtec = $this->NM_ajax_info['param']['optantegbtec'];
          }
          if (isset($this->NM_ajax_info['param']['os_info']))
          {
              $this->os_info = $this->NM_ajax_info['param']['os_info'];
          }
          if (isset($this->NM_ajax_info['param']['pontodeencontro']))
          {
              $this->pontodeencontro = $this->NM_ajax_info['param']['pontodeencontro'];
          }
          if (isset($this->NM_ajax_info['param']['referenteprojeto']))
          {
              $this->referenteprojeto = $this->NM_ajax_info['param']['referenteprojeto'];
          }
          if (isset($this->NM_ajax_info['param']['removeronclick']))
          {
              $this->removeronclick = $this->NM_ajax_info['param']['removeronclick'];
          }
          if (isset($this->NM_ajax_info['param']['resumoagenda']))
          {
              $this->resumoagenda = $this->NM_ajax_info['param']['resumoagenda'];
          }
          if (isset($this->NM_ajax_info['param']['resumoagendastatus']))
          {
              $this->resumoagendastatus = $this->NM_ajax_info['param']['resumoagendastatus'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
          }
          if (isset($this->NM_ajax_info['param']['savegbtonclick']))
          {
              $this->savegbtonclick = $this->NM_ajax_info['param']['savegbtonclick'];
          }
          if (isset($this->NM_ajax_info['param']['savestatusonclick']))
          {
              $this->savestatusonclick = $this->NM_ajax_info['param']['savestatusonclick'];
          }
          if (isset($this->NM_ajax_info['param']['hti_cnsdata_init']))
          {
              $this->hti_cnsdata_init = $this->NM_ajax_info['param']['hti_cnsdata_init'];
          }
          if (isset($this->NM_ajax_info['param']['sendanaliseonclick']))
          {
              $this->sendanaliseonclick = $this->NM_ajax_info['param']['sendanaliseonclick'];
          }
          if (isset($this->NM_ajax_info['param']['stepagendamento']))
          {
              $this->stepagendamento = $this->NM_ajax_info['param']['stepagendamento'];
          }
          if (isset($this->NM_ajax_info['param']['stepdescricao']))
          {
              $this->stepdescricao = $this->NM_ajax_info['param']['stepdescricao'];
          }
          if (isset($this->NM_ajax_info['param']['stepempreendimento']))
          {
              $this->stepempreendimento = $this->NM_ajax_info['param']['stepempreendimento'];
          }
          if (isset($this->NM_ajax_info['param']['stepoperadora']))
          {
              $this->stepoperadora = $this->NM_ajax_info['param']['stepoperadora'];
          }
          if (isset($this->NM_ajax_info['param']['stepprestadora']))
          {
              $this->stepprestadora = $this->NM_ajax_info['param']['stepprestadora'];
          }
          if (isset($this->NM_ajax_info['param']['sugestaoagenda']))
          {
              $this->sugestaoagenda = $this->NM_ajax_info['param']['sugestaoagenda'];
          }
          if (isset($this->NM_ajax_info['param']['tecoperadora']))
          {
              $this->tecoperadora = $this->NM_ajax_info['param']['tecoperadora'];
          }
          if (isset($this->NM_ajax_info['param']['tecprestadora']))
          {
              $this->tecprestadora = $this->NM_ajax_info['param']['tecprestadora'];
          }
          if (isset($this->NM_ajax_info['param']['tipo_cliente']))
          {
              $this->tipo_cliente = $this->NM_ajax_info['param']['tipo_cliente'];
          }
          if (isset($this->NM_ajax_info['param']['tiposae']))
          {
              $this->tiposae = $this->NM_ajax_info['param']['tiposae'];
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
      if (isset($this->Num_SAE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Num_SAE'] = $this->Num_SAE;
      }
      if (isset($this->ID_Empreendimento) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (isset($this->SQL_ope) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['SQL_ope'] = $this->SQL_ope;
      }
      if (isset($this->SQL_pre) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['SQL_pre'] = $this->SQL_pre;
      }
      if (isset($this->Emergencial) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['Emergencial'] = $this->Emergencial;
      }
      if (isset($this->HorarioAlterado) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['HorarioAlterado'] = $this->HorarioAlterado;
      }
      if (isset($this->grid_Contatos_Tipo_OPE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_Contatos_Tipo_OPE;
      }
      if (isset($this->grid_Contatos_ID_OPE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_Contatos_ID_OPE;
      }
      if (isset($this->language) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['language'] = $this->language;
      }
      if (isset($this->ID_TipoSAE) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['ID_TipoSAE'] = $this->ID_TipoSAE;
      }
      if (isset($this->InstalacaoAntena) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['InstalacaoAntena'] = $this->InstalacaoAntena;
      }
      if (isset($this->OptanteGBTec) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['OptanteGBTec'] = $this->OptanteGBTec;
      }
      if (isset($this->linkProjeto) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['linkProjeto'] = $this->linkProjeto;
      }
      if (isset($this->SAE_returnTo) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['SAE_returnTo'] = $this->SAE_returnTo;
      }
      if (isset($_POST["Num_SAE"]) && isset($this->Num_SAE)) 
      {
          $_SESSION['Num_SAE'] = $this->Num_SAE;
      }
      if (!isset($_POST["Num_SAE"]) && isset($_POST["num_sae"])) 
      {
          $_SESSION['Num_SAE'] = $this->num_sae;
      }
      if (isset($_POST["ID_Empreendimento"]) && isset($this->ID_Empreendimento)) 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (!isset($_POST["ID_Empreendimento"]) && isset($_POST["id_empreendimento"])) 
      {
          $_SESSION['ID_Empreendimento'] = $this->id_empreendimento;
      }
      if (isset($_POST["SQL_ope"]) && isset($this->SQL_ope)) 
      {
          $_SESSION['SQL_ope'] = $this->SQL_ope;
      }
      if (!isset($_POST["SQL_ope"]) && isset($_POST["sql_ope"])) 
      {
          $_SESSION['SQL_ope'] = $this->sql_ope;
      }
      if (isset($_POST["SQL_pre"]) && isset($this->SQL_pre)) 
      {
          $_SESSION['SQL_pre'] = $this->SQL_pre;
      }
      if (!isset($_POST["SQL_pre"]) && isset($_POST["sql_pre"])) 
      {
          $_SESSION['SQL_pre'] = $this->sql_pre;
      }
      if (isset($_POST["Emergencial"]) && isset($this->Emergencial)) 
      {
          $_SESSION['Emergencial'] = $this->Emergencial;
      }
      if (!isset($_POST["Emergencial"]) && isset($_POST["emergencial"])) 
      {
          $_SESSION['Emergencial'] = $this->emergencial;
      }
      if (isset($_POST["HorarioAlterado"]) && isset($this->HorarioAlterado)) 
      {
          $_SESSION['HorarioAlterado'] = $this->HorarioAlterado;
      }
      if (!isset($_POST["HorarioAlterado"]) && isset($_POST["horarioalterado"])) 
      {
          $_SESSION['HorarioAlterado'] = $this->horarioalterado;
      }
      if (isset($_POST["grid_Contatos_Tipo_OPE"]) && isset($this->grid_Contatos_Tipo_OPE)) 
      {
          $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_Contatos_Tipo_OPE;
      }
      if (!isset($_POST["grid_Contatos_Tipo_OPE"]) && isset($_POST["grid_contatos_tipo_ope"])) 
      {
          $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_contatos_tipo_ope;
      }
      if (isset($_POST["grid_Contatos_ID_OPE"]) && isset($this->grid_Contatos_ID_OPE)) 
      {
          $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_Contatos_ID_OPE;
      }
      if (!isset($_POST["grid_Contatos_ID_OPE"]) && isset($_POST["grid_contatos_id_ope"])) 
      {
          $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_contatos_id_ope;
      }
      if (isset($_POST["language"]) && isset($this->language)) 
      {
          $_SESSION['language'] = $this->language;
      }
      if (isset($_POST["ID_TipoSAE"]) && isset($this->ID_TipoSAE)) 
      {
          $_SESSION['ID_TipoSAE'] = $this->ID_TipoSAE;
      }
      if (!isset($_POST["ID_TipoSAE"]) && isset($_POST["id_tiposae"])) 
      {
          $_SESSION['ID_TipoSAE'] = $this->id_tiposae;
      }
      if (isset($_POST["InstalacaoAntena"]) && isset($this->InstalacaoAntena)) 
      {
          $_SESSION['InstalacaoAntena'] = $this->InstalacaoAntena;
      }
      if (!isset($_POST["InstalacaoAntena"]) && isset($_POST["instalacaoantena"])) 
      {
          $_SESSION['InstalacaoAntena'] = $this->instalacaoantena;
      }
      if (isset($_POST["OptanteGBTec"]) && isset($this->OptanteGBTec)) 
      {
          $_SESSION['OptanteGBTec'] = $this->OptanteGBTec;
      }
      if (!isset($_POST["OptanteGBTec"]) && isset($_POST["optantegbtec"])) 
      {
          $_SESSION['OptanteGBTec'] = $this->optantegbtec;
      }
      if (isset($_POST["linkProjeto"]) && isset($this->linkProjeto)) 
      {
          $_SESSION['linkProjeto'] = $this->linkProjeto;
      }
      if (!isset($_POST["linkProjeto"]) && isset($_POST["linkprojeto"])) 
      {
          $_SESSION['linkProjeto'] = $this->linkprojeto;
      }
      if (isset($_POST["SAE_returnTo"]) && isset($this->SAE_returnTo)) 
      {
          $_SESSION['SAE_returnTo'] = $this->SAE_returnTo;
      }
      if (!isset($_POST["SAE_returnTo"]) && isset($_POST["sae_returnto"])) 
      {
          $_SESSION['SAE_returnTo'] = $this->sae_returnto;
      }
      if (isset($_GET["Num_SAE"]) && isset($this->Num_SAE)) 
      {
          $_SESSION['Num_SAE'] = $this->Num_SAE;
      }
      if (!isset($_GET["Num_SAE"]) && isset($_GET["num_sae"])) 
      {
          $_SESSION['Num_SAE'] = $this->num_sae;
      }
      if (isset($_GET["ID_Empreendimento"]) && isset($this->ID_Empreendimento)) 
      {
          $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
      }
      if (!isset($_GET["ID_Empreendimento"]) && isset($_GET["id_empreendimento"])) 
      {
          $_SESSION['ID_Empreendimento'] = $this->id_empreendimento;
      }
      if (isset($_GET["SQL_ope"]) && isset($this->SQL_ope)) 
      {
          $_SESSION['SQL_ope'] = $this->SQL_ope;
      }
      if (!isset($_GET["SQL_ope"]) && isset($_GET["sql_ope"])) 
      {
          $_SESSION['SQL_ope'] = $this->sql_ope;
      }
      if (isset($_GET["SQL_pre"]) && isset($this->SQL_pre)) 
      {
          $_SESSION['SQL_pre'] = $this->SQL_pre;
      }
      if (!isset($_GET["SQL_pre"]) && isset($_GET["sql_pre"])) 
      {
          $_SESSION['SQL_pre'] = $this->sql_pre;
      }
      if (isset($_GET["Emergencial"]) && isset($this->Emergencial)) 
      {
          $_SESSION['Emergencial'] = $this->Emergencial;
      }
      if (!isset($_GET["Emergencial"]) && isset($_GET["emergencial"])) 
      {
          $_SESSION['Emergencial'] = $this->emergencial;
      }
      if (isset($_GET["HorarioAlterado"]) && isset($this->HorarioAlterado)) 
      {
          $_SESSION['HorarioAlterado'] = $this->HorarioAlterado;
      }
      if (!isset($_GET["HorarioAlterado"]) && isset($_GET["horarioalterado"])) 
      {
          $_SESSION['HorarioAlterado'] = $this->horarioalterado;
      }
      if (isset($_GET["grid_Contatos_Tipo_OPE"]) && isset($this->grid_Contatos_Tipo_OPE)) 
      {
          $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_Contatos_Tipo_OPE;
      }
      if (!isset($_GET["grid_Contatos_Tipo_OPE"]) && isset($_GET["grid_contatos_tipo_ope"])) 
      {
          $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_contatos_tipo_ope;
      }
      if (isset($_GET["grid_Contatos_ID_OPE"]) && isset($this->grid_Contatos_ID_OPE)) 
      {
          $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_Contatos_ID_OPE;
      }
      if (!isset($_GET["grid_Contatos_ID_OPE"]) && isset($_GET["grid_contatos_id_ope"])) 
      {
          $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_contatos_id_ope;
      }
      if (isset($_GET["language"]) && isset($this->language)) 
      {
          $_SESSION['language'] = $this->language;
      }
      if (isset($_GET["ID_TipoSAE"]) && isset($this->ID_TipoSAE)) 
      {
          $_SESSION['ID_TipoSAE'] = $this->ID_TipoSAE;
      }
      if (!isset($_GET["ID_TipoSAE"]) && isset($_GET["id_tiposae"])) 
      {
          $_SESSION['ID_TipoSAE'] = $this->id_tiposae;
      }
      if (isset($_GET["InstalacaoAntena"]) && isset($this->InstalacaoAntena)) 
      {
          $_SESSION['InstalacaoAntena'] = $this->InstalacaoAntena;
      }
      if (!isset($_GET["InstalacaoAntena"]) && isset($_GET["instalacaoantena"])) 
      {
          $_SESSION['InstalacaoAntena'] = $this->instalacaoantena;
      }
      if (isset($_GET["OptanteGBTec"]) && isset($this->OptanteGBTec)) 
      {
          $_SESSION['OptanteGBTec'] = $this->OptanteGBTec;
      }
      if (!isset($_GET["OptanteGBTec"]) && isset($_GET["optantegbtec"])) 
      {
          $_SESSION['OptanteGBTec'] = $this->optantegbtec;
      }
      if (isset($_GET["linkProjeto"]) && isset($this->linkProjeto)) 
      {
          $_SESSION['linkProjeto'] = $this->linkProjeto;
      }
      if (!isset($_GET["linkProjeto"]) && isset($_GET["linkprojeto"])) 
      {
          $_SESSION['linkProjeto'] = $this->linkprojeto;
      }
      if (isset($_GET["SAE_returnTo"]) && isset($this->SAE_returnTo)) 
      {
          $_SESSION['SAE_returnTo'] = $this->SAE_returnTo;
      }
      if (!isset($_GET["SAE_returnTo"]) && isset($_GET["sae_returnto"])) 
      {
          $_SESSION['SAE_returnTo'] = $this->sae_returnto;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['embutida_parms']);
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
                 nm_limpa_str_form_CadSAE($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->Num_SAE) && isset($this->num_sae)) 
          {
              $this->Num_SAE = $this->num_sae;
          }
          if (isset($this->Num_SAE)) 
          {
              $_SESSION['Num_SAE'] = $this->Num_SAE;
          }
          if (!isset($this->ID_Empreendimento) && isset($this->id_empreendimento)) 
          {
              $this->ID_Empreendimento = $this->id_empreendimento;
          }
          if (isset($this->ID_Empreendimento)) 
          {
              $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
          }
          if (!isset($this->SQL_ope) && isset($this->sql_ope)) 
          {
              $this->SQL_ope = $this->sql_ope;
          }
          if (isset($this->SQL_ope)) 
          {
              $_SESSION['SQL_ope'] = $this->SQL_ope;
          }
          if (!isset($this->SQL_pre) && isset($this->sql_pre)) 
          {
              $this->SQL_pre = $this->sql_pre;
          }
          if (isset($this->SQL_pre)) 
          {
              $_SESSION['SQL_pre'] = $this->SQL_pre;
          }
          if (!isset($this->Emergencial) && isset($this->emergencial)) 
          {
              $this->Emergencial = $this->emergencial;
          }
          if (isset($this->Emergencial)) 
          {
              $_SESSION['Emergencial'] = $this->Emergencial;
          }
          if (!isset($this->HorarioAlterado) && isset($this->horarioalterado)) 
          {
              $this->HorarioAlterado = $this->horarioalterado;
          }
          if (isset($this->HorarioAlterado)) 
          {
              $_SESSION['HorarioAlterado'] = $this->HorarioAlterado;
          }
          if (!isset($this->grid_Contatos_Tipo_OPE) && isset($this->grid_contatos_tipo_ope)) 
          {
              $this->grid_Contatos_Tipo_OPE = $this->grid_contatos_tipo_ope;
          }
          if (isset($this->grid_Contatos_Tipo_OPE)) 
          {
              $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_Contatos_Tipo_OPE;
          }
          if (!isset($this->grid_Contatos_ID_OPE) && isset($this->grid_contatos_id_ope)) 
          {
              $this->grid_Contatos_ID_OPE = $this->grid_contatos_id_ope;
          }
          if (isset($this->grid_Contatos_ID_OPE)) 
          {
              $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_Contatos_ID_OPE;
          }
          if (isset($this->language)) 
          {
              $_SESSION['language'] = $this->language;
          }
          if (!isset($this->ID_TipoSAE) && isset($this->id_tiposae)) 
          {
              $this->ID_TipoSAE = $this->id_tiposae;
          }
          if (isset($this->ID_TipoSAE)) 
          {
              $_SESSION['ID_TipoSAE'] = $this->ID_TipoSAE;
          }
          if (!isset($this->InstalacaoAntena) && isset($this->instalacaoantena)) 
          {
              $this->InstalacaoAntena = $this->instalacaoantena;
          }
          if (isset($this->InstalacaoAntena)) 
          {
              $_SESSION['InstalacaoAntena'] = $this->InstalacaoAntena;
          }
          if (!isset($this->OptanteGBTec) && isset($this->optantegbtec)) 
          {
              $this->OptanteGBTec = $this->optantegbtec;
          }
          if (isset($this->OptanteGBTec)) 
          {
              $_SESSION['OptanteGBTec'] = $this->OptanteGBTec;
          }
          if (!isset($this->linkProjeto) && isset($this->linkprojeto)) 
          {
              $this->linkProjeto = $this->linkprojeto;
          }
          if (isset($this->linkProjeto)) 
          {
              $_SESSION['linkProjeto'] = $this->linkProjeto;
          }
          if (!isset($this->SAE_returnTo) && isset($this->sae_returnto)) 
          {
              $this->SAE_returnTo = $this->sae_returnto;
          }
          if (isset($this->SAE_returnTo)) 
          {
              $_SESSION['SAE_returnTo'] = $this->SAE_returnTo;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->Num_SAE) && isset($this->num_sae)) 
          {
              $this->Num_SAE = $this->num_sae;
          }
          if (isset($this->Num_SAE)) 
          {
              $_SESSION['Num_SAE'] = $this->Num_SAE;
          }
          if (!isset($this->ID_Empreendimento) && isset($this->id_empreendimento)) 
          {
              $this->ID_Empreendimento = $this->id_empreendimento;
          }
          if (isset($this->ID_Empreendimento)) 
          {
              $_SESSION['ID_Empreendimento'] = $this->ID_Empreendimento;
          }
          if (!isset($this->SQL_ope) && isset($this->sql_ope)) 
          {
              $this->SQL_ope = $this->sql_ope;
          }
          if (isset($this->SQL_ope)) 
          {
              $_SESSION['SQL_ope'] = $this->SQL_ope;
          }
          if (!isset($this->SQL_pre) && isset($this->sql_pre)) 
          {
              $this->SQL_pre = $this->sql_pre;
          }
          if (isset($this->SQL_pre)) 
          {
              $_SESSION['SQL_pre'] = $this->SQL_pre;
          }
          if (!isset($this->Emergencial) && isset($this->emergencial)) 
          {
              $this->Emergencial = $this->emergencial;
          }
          if (isset($this->Emergencial)) 
          {
              $_SESSION['Emergencial'] = $this->Emergencial;
          }
          if (!isset($this->HorarioAlterado) && isset($this->horarioalterado)) 
          {
              $this->HorarioAlterado = $this->horarioalterado;
          }
          if (isset($this->HorarioAlterado)) 
          {
              $_SESSION['HorarioAlterado'] = $this->HorarioAlterado;
          }
          if (!isset($this->grid_Contatos_Tipo_OPE) && isset($this->grid_contatos_tipo_ope)) 
          {
              $this->grid_Contatos_Tipo_OPE = $this->grid_contatos_tipo_ope;
          }
          if (isset($this->grid_Contatos_Tipo_OPE)) 
          {
              $_SESSION['grid_Contatos_Tipo_OPE'] = $this->grid_Contatos_Tipo_OPE;
          }
          if (!isset($this->grid_Contatos_ID_OPE) && isset($this->grid_contatos_id_ope)) 
          {
              $this->grid_Contatos_ID_OPE = $this->grid_contatos_id_ope;
          }
          if (isset($this->grid_Contatos_ID_OPE)) 
          {
              $_SESSION['grid_Contatos_ID_OPE'] = $this->grid_Contatos_ID_OPE;
          }
          if (isset($this->language)) 
          {
              $_SESSION['language'] = $this->language;
          }
          if (!isset($this->ID_TipoSAE) && isset($this->id_tiposae)) 
          {
              $this->ID_TipoSAE = $this->id_tiposae;
          }
          if (isset($this->ID_TipoSAE)) 
          {
              $_SESSION['ID_TipoSAE'] = $this->ID_TipoSAE;
          }
          if (!isset($this->InstalacaoAntena) && isset($this->instalacaoantena)) 
          {
              $this->InstalacaoAntena = $this->instalacaoantena;
          }
          if (isset($this->InstalacaoAntena)) 
          {
              $_SESSION['InstalacaoAntena'] = $this->InstalacaoAntena;
          }
          if (!isset($this->OptanteGBTec) && isset($this->optantegbtec)) 
          {
              $this->OptanteGBTec = $this->optantegbtec;
          }
          if (isset($this->OptanteGBTec)) 
          {
              $_SESSION['OptanteGBTec'] = $this->OptanteGBTec;
          }
          if (!isset($this->linkProjeto) && isset($this->linkprojeto)) 
          {
              $this->linkProjeto = $this->linkprojeto;
          }
          if (isset($this->linkProjeto)) 
          {
              $_SESSION['linkProjeto'] = $this->linkProjeto;
          }
          if (!isset($this->SAE_returnTo) && isset($this->sae_returnto)) 
          {
              $this->SAE_returnTo = $this->sae_returnto;
          }
          if (isset($this->SAE_returnTo)) 
          {
              $_SESSION['SAE_returnTo'] = $this->SAE_returnTo;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['parms']);
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
          $aDtParts = explode(' ', $this->data_abertura);
          $this->data_abertura      = $aDtParts[0];
          $this->data_abertura_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_CadSAE_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadSAE']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadSAE']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadSAE'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadSAE']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadSAE']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_CadSAE') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadSAE']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tb_sae";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_CadSAE")
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
      $this->nm_new_label['id_empreendimento'] = '' . $this->Ini->Nm_lang['lang_label_enterprise'] . '';
      $this->nm_new_label['id_condomino'] = '' . $this->Ini->Nm_lang['lang_label_client'] . '';
      $this->nm_new_label['id_conjunto'] = '' . $this->Ini->Nm_lang['lang_label_set'] . '';
      $this->nm_new_label['id_operadora'] = '' . $this->Ini->Nm_lang['lang_label_operator'] . '';
      $this->nm_new_label['id_prestador'] = '' . $this->Ini->Nm_lang['lang_label_serviceprovider'] . '';
      $this->nm_new_label['id_usuario'] = '' . $this->Ini->Nm_lang['lang_label_saeopenedby'] . '';
      $this->nm_new_label['tipo_cliente'] = '' . $this->Ini->Nm_lang['lang_label_clienttype'] . '';
      $this->nm_new_label['nom_responsavel1'] = '' . $this->Ini->Nm_lang['lang_label_responsible'] . '';
      $this->nm_new_label['num_telefone1'] = '' . $this->Ini->Nm_lang['lang_label_phone'] . '';
      $this->nm_new_label['nom_responsavel2'] = '' . $this->Ini->Nm_lang['lang_label_responsible'] . '';
      $this->nm_new_label['num_telefone2'] = '' . $this->Ini->Nm_lang['lang_label_phone'] . '';
      $this->nm_new_label['num_celular2'] = '' . $this->Ini->Nm_lang['lang_label_cellphone'] . '';
      $this->nm_new_label['nom_responsavel3'] = '' . $this->Ini->Nm_lang['lang_label_responsible'] . '';
      $this->nm_new_label['num_telefone3'] = '' . $this->Ini->Nm_lang['lang_label_phone'] . '';
      $this->nm_new_label['num_celular3'] = '' . $this->Ini->Nm_lang['lang_label_cellphone'] . '';
      $this->nm_new_label['instalacaoantena'] = '' . $this->Ini->Nm_lang['lang_label_antennainstallation'] . '';
      $this->nm_new_label['emergencial'] = '' . $this->Ini->Nm_lang['lang_label_emergency'] . '';
      $this->nm_new_label['data_inicio'] = '' . $this->Ini->Nm_lang['lang_label_startdate'] . '';
      $this->nm_new_label['hora_inicio'] = '' . $this->Ini->Nm_lang['lang_label_startingtime'] . '';
      $this->nm_new_label['data_fim'] = '' . $this->Ini->Nm_lang['lang_label_enddate'] . '';
      $this->nm_new_label['hora_fim'] = '' . $this->Ini->Nm_lang['lang_label_endtime'] . '';
      $this->nm_new_label['desc'] = '' . $this->Ini->Nm_lang['lang_label_descriptionservices'] . '';
      $this->nm_new_label['num_sae'] = '' . $this->Ini->Nm_lang['lang_label_saenumber'] . '';
      $this->nm_new_label['data_abertura'] = '' . $this->Ini->Nm_lang['lang_label_openingdate'] . '';
      $this->nm_new_label['data_fechamento'] = '' . $this->Ini->Nm_lang['lang_label_statuschangedIn'] . '';
      $this->nm_new_label['id_usuario_fechamento'] = '' . $this->Ini->Nm_lang['lang_label_saecategorizedby'] . '';
      $this->nm_new_label['optantegbtec'] = '' . $this->Ini->Nm_lang['lang_long_PRESENCATECNICOGLOBAL'] . '';
      $this->nm_new_label['pontodeencontro'] = '' . $this->Ini->Nm_lang['lang_label_meetingpoint'] . '';
      $this->nm_new_label['referenteprojeto'] = '' . $this->Ini->Nm_lang['lang_label_abountproject'] . '';
      $this->nm_new_label['gbt_disponiveis'] = '' . $this->Ini->Nm_lang['lang_label_availabletechnicians'] . '';
      $this->nm_new_label['gbt_sae'] = '' . $this->Ini->Nm_lang['lang_label_gbtechnicians'] . '';
      $this->nm_new_label['gbt_selecionados'] = '' . $this->Ini->Nm_lang['lang_label_designatedtechnicians'] . '';
      $this->nm_new_label['id_andar'] = '' . $this->Ini->Nm_lang['lang_label_floor'] . '';
      $this->nm_new_label['id_torre'] = '' . $this->Ini->Nm_lang['lang_label_tower'] . '';
      $this->nm_new_label['resumoagendastatus'] = '' . $this->Ini->Nm_lang['lang_label_scheduling'] . '';
      $this->nm_new_label['tecoperadora'] = '' . $this->Ini->Nm_lang['lang_label_operator'] . '';
      $this->nm_new_label['tecprestadora'] = '' . $this->Ini->Nm_lang['lang_label_serviceprovider'] . '';
      $this->nm_new_label['tiposae'] = '' . $this->Ini->Nm_lang['lang_label_typesae'] . '';
      $this->nm_new_label['label_dataexpiracaoprojeto'] = '' . $this->Ini->Nm_lang['lang_label_dataexpiracaoprojeto'] . '';

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


      $this->arr_buttons['salvar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['type']             = "button";
      $this->arr_buttons['salvar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
      $this->arr_buttons['salvar']['display']          = "only_text";
      $this->arr_buttons['salvar']['display_position'] = "text_right";
      $this->arr_buttons['salvar']['style']            = "default";
      $this->arr_buttons['salvar']['image']            = "";

      $this->arr_buttons['voltar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltar']['type']             = "button";
      $this->arr_buttons['voltar']['value']            = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltar']['display']          = "only_text";
      $this->arr_buttons['voltar']['display_position'] = "text_right";
      $this->arr_buttons['voltar']['style']            = "default";
      $this->arr_buttons['voltar']['image']            = "";

      $this->arr_buttons['exportpdf']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_exportpdf'] . "";
      $this->arr_buttons['exportpdf']['type']             = "button";
      $this->arr_buttons['exportpdf']['value']            = "" . $this->Ini->Nm_lang['lang_btn_exportpdf'] . "";
      $this->arr_buttons['exportpdf']['display']          = "only_text";
      $this->arr_buttons['exportpdf']['display_position'] = "text_right";
      $this->arr_buttons['exportpdf']['style']            = "default";
      $this->arr_buttons['exportpdf']['image']            = "";

      $this->arr_buttons['remover']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['remover']['type']             = "button";
      $this->arr_buttons['remover']['value']            = "" . $this->Ini->Nm_lang['lang_btn_delete'] . "";
      $this->arr_buttons['remover']['display']          = "only_text";
      $this->arr_buttons['remover']['display_position'] = "text_right";
      $this->arr_buttons['remover']['style']            = "default";
      $this->arr_buttons['remover']['image']            = "";

      $this->arr_buttons['confirmeenviarsae']['hint']             = "" . $this->Ini->Nm_lang['lang_label_SendSAE'] . "";
      $this->arr_buttons['confirmeenviarsae']['type']             = "button";
      $this->arr_buttons['confirmeenviarsae']['value']            = "" . $this->Ini->Nm_lang['lang_label_SendSAE'] . "";
      $this->arr_buttons['confirmeenviarsae']['display']          = "only_text";
      $this->arr_buttons['confirmeenviarsae']['display_position'] = "text_right";
      $this->arr_buttons['confirmeenviarsae']['style']            = "default";
      $this->arr_buttons['confirmeenviarsae']['image']            = "";


      $_SESSION['hticnsdata']['error_icon']['form_CadSAE']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_CadSAE'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['goto']      = 'on';
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
      $this->nmgp_botoes['salvar'] = "on";
      $this->nmgp_botoes['voltar'] = "on";
      $this->nmgp_botoes['exportPDF'] = "on";
      $this->nmgp_botoes['remover'] = "on";
      $this->nmgp_botoes['confirmeEnviarSAE'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_orig'] = " where Num_SAE = '" . $_SESSION['Num_SAE'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_pesq'] = " where Num_SAE = '" . $_SESSION['Num_SAE'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadSAE']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadSAE'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadSAE'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_form'];
          if (!isset($this->empreendimentofuncionamento)){$this->empreendimentofuncionamento = $this->nmgp_dados_form['empreendimentofuncionamento'];} 
          if (!isset($this->resumoagenda)){$this->resumoagenda = $this->nmgp_dados_form['resumoagenda'];} 
          if (!isset($this->sugestaoagenda)){$this->sugestaoagenda = $this->nmgp_dados_form['sugestaoagenda'];} 
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_CadSAE", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_CadSAE/form_CadSAE_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_CadSAE_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_CadSAE_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_CadSAE_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_CadSAE/form_CadSAE_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_CadSAE_erro.class.php"); 
      }
      $this->Erro      = new form_CadSAE_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao']))
         { 
             if ($this->num_sae != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadSAE']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['salvar'] = "on";
          $this->nmgp_botoes['voltar'] = "on";
          $this->nmgp_botoes['exportPDF'] = "off";
          $this->nmgp_botoes['remover'] = "off";
          $this->nmgp_botoes['confirmeEnviarSAE'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['salvar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes']['salvar'];
          $this->nmgp_botoes['voltar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes']['voltar'];
          $this->nmgp_botoes['exportPDF'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes']['exportPDF'];
          $this->nmgp_botoes['remover'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes']['remover'];
          $this->nmgp_botoes['confirmeEnviarSAE'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes']['confirmeEnviarSAE'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->id_tiposae)) { $this->nm_limpa_alfa($this->id_tiposae); }
      if (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
      if (isset($this->id_condomino)) { $this->nm_limpa_alfa($this->id_condomino); }
      if (isset($this->id_conjunto)) { $this->nm_limpa_alfa($this->id_conjunto); }
      if (isset($this->id_operadora)) { $this->nm_limpa_alfa($this->id_operadora); }
      if (isset($this->id_prestador)) { $this->nm_limpa_alfa($this->id_prestador); }
      if (isset($this->id_usuario)) { $this->nm_limpa_alfa($this->id_usuario); }
      if (isset($this->nom_responsavel1)) { $this->nm_limpa_alfa($this->nom_responsavel1); }
      if (isset($this->num_telefone1)) { $this->nm_limpa_alfa($this->num_telefone1); }
      if (isset($this->nom_responsavel2)) { $this->nm_limpa_alfa($this->nom_responsavel2); }
      if (isset($this->num_telefone2)) { $this->nm_limpa_alfa($this->num_telefone2); }
      if (isset($this->num_celular2)) { $this->nm_limpa_alfa($this->num_celular2); }
      if (isset($this->nom_responsavel3)) { $this->nm_limpa_alfa($this->nom_responsavel3); }
      if (isset($this->num_telefone3)) { $this->nm_limpa_alfa($this->num_telefone3); }
      if (isset($this->num_celular3)) { $this->nm_limpa_alfa($this->num_celular3); }
      if (isset($this->num_sae)) { $this->nm_limpa_alfa($this->num_sae); }
      if (isset($this->id_usuario_fechamento)) { $this->nm_limpa_alfa($this->id_usuario_fechamento); }
      if (isset($this->pontodeencontro)) { $this->nm_limpa_alfa($this->pontodeencontro); }
      if (isset($this->referenteprojeto)) { $this->nm_limpa_alfa($this->referenteprojeto); }
      if ($nm_opc_lookup == "lookup")
      { 
          if ($GLOBALS['F'] == "id_usuario")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->id_usuario = $array_vars[0];
              $id_usuario       = $this->id_usuario;
              $this->id_usuario       = $id_usuario;
              $this->lookup_id_usuario($conteudo);
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
          if ($GLOBALS['F'] == "id_usuario_fechamento")
          { 
              $nm_parms   = substr($GLOBALS['P0'], 1, strlen($GLOBALS['P0']) - 2);
              $array_vars = explode(",", $nm_parms);
              $this->id_usuario_fechamento = $array_vars[0];
              $id_usuario_fechamento       = $this->id_usuario_fechamento;
              $this->id_usuario_fechamento       = $id_usuario_fechamento;
              $this->lookup_id_usuario_fechamento($conteudo);
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- data_abertura
      $this->field_config['data_abertura']                 = array();
      $this->field_config['data_abertura']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['data_abertura']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_abertura']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['data_abertura']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'data_abertura');
      //-- data_fechamento
      $this->field_config['data_fechamento']                 = array();
      $this->field_config['data_fechamento']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['data_fechamento']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_fechamento']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['data_fechamento']['date_display'] = "ddmmaaaa;hhii";
      $this->new_date_format('DH', 'data_fechamento');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- id_tiposae
      $this->field_config['id_tiposae']               = array();
      $this->field_config['id_tiposae']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_tiposae']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_tiposae']['symbol_dec'] = '';
      $this->field_config['id_tiposae']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_tiposae']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- data_inicio
      $this->field_config['data_inicio']                 = array();
      $this->field_config['data_inicio']['date_format']  = "aaaa/mm/dd";
      $this->field_config['data_inicio']['date_sep']     = "-";
      $this->field_config['data_inicio']['date_display'] = "aaaa/mm/dd";
      $this->new_date_format('DT', 'data_inicio');
      //-- hora_inicio
      $this->field_config['hora_inicio']                 = array();
      $this->field_config['hora_inicio']['date_format']  = "hh:ii";
      $this->field_config['hora_inicio']['time_sep']     = ":";
      $this->field_config['hora_inicio']['date_display'] = "hh:ii";
      $this->new_date_format('HH', 'hora_inicio');
      //-- data_fim
      $this->field_config['data_fim']                 = array();
      $this->field_config['data_fim']['date_format']  = "aaaa/mm/dd";
      $this->field_config['data_fim']['date_sep']     = "-";
      $this->field_config['data_fim']['date_display'] = "aaaa/mm/dd";
      $this->new_date_format('DT', 'data_fim');
      //-- hora_fim
      $this->field_config['hora_fim']                 = array();
      $this->field_config['hora_fim']['date_format']  = "hh:ii";
      $this->field_config['hora_fim']['time_sep']     = ":";
      $this->field_config['hora_fim']['date_display'] = "hh:ii";
      $this->new_date_format('HH', 'hora_fim');
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
         $this->label_dataexpiracaoprojeto = "&nbsp;";
         $this->resumoagendastatus = "&nbsp;";
         $this->tecoperadora = "&nbsp;";
         $this->tecprestadora = "&nbsp;";
         $this->label_pas = "&nbsp;";
         $this->os_info = "&nbsp;";
         $this->resumoagenda = "&nbsp;";
         $this->sugestaoagenda = "&nbsp;";
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_tiposae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tiposae');
          }
          if ('validate_num_sae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_sae');
          }
          if ('validate_referenteprojeto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'referenteprojeto');
          }
          if ('validate_id_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuario');
          }
          if ('validate_data_abertura' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_abertura');
          }
          if ('validate_data_fechamento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_fechamento');
          }
          if ('validate_id_usuario_fechamento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuario_fechamento');
          }
          if ('validate_optantegbtec' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'optantegbtec');
          }
          if ('validate_num_status' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_status');
          }
          if ('validate_gbt_sae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gbt_sae');
          }
          if ('validate_savestatusonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savestatusonclick');
          }
          if ('validate_savegbtonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savegbtonclick');
          }
          if ('validate_gbt_selecionados' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gbt_selecionados');
          }
          if ('validate_gbt_disponiveis' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gbt_disponiveis');
          }
          if ('validate_confirmgbtdisponclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'confirmgbtdisponclick');
          }
          if ('validate_stepempreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stepempreendimento');
          }
          if ('validate_stepoperadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stepoperadora');
          }
          if ('validate_stepprestadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stepprestadora');
          }
          if ('validate_stepagendamento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stepagendamento');
          }
          if ('validate_stepdescricao' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'stepdescricao');
          }
          if ('validate_removeronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'removeronclick');
          }
          if ('validate_num_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_ativo');
          }
          if ('validate_id_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_empreendimento');
          }
          if ('validate_id_condomino' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_condomino');
          }
          if ('validate_nom_responsavel1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_responsavel1');
          }
          if ('validate_num_telefone1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefone1');
          }
          if ('validate_id_torre' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_torre');
          }
          if ('validate_id_andar' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_andar');
          }
          if ('validate_id_conjunto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_conjunto');
          }
          if ('validate_id_operadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_operadora');
          }
          if ('validate_nom_responsavel2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_responsavel2');
          }
          if ('validate_num_telefone2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefone2');
          }
          if ('validate_num_celular2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_celular2');
          }
          if ('validate_id_prestador' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_prestador');
          }
          if ('validate_nom_responsavel3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_responsavel3');
          }
          if ('validate_num_telefone3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefone3');
          }
          if ('validate_num_celular3' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_celular3');
          }
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          if ('validate_id_tiposae' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_tiposae');
          }
          if ('validate_emergencial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'emergencial');
          }
          if ('validate_instalacaoantena' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'instalacaoantena');
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
          if ('validate_pontodeencontro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pontodeencontro');
          }
          if ('validate_desc' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'desc');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_tipo_cliente' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'tipo_cliente');
          }
          if ('validate_sendanaliseonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sendanaliseonclick');
          }
          form_CadSAE_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_id_condomino_onchange' == $this->NM_ajax_opcao)
          {
              $this->ID_Condomino_onChange();
          }
          if ('event_id_operadora_onchange' == $this->NM_ajax_opcao)
          {
              $this->ID_Operadora_onChange();
          }
          if ('event_id_prestador_onchange' == $this->NM_ajax_opcao)
          {
              $this->ID_Prestador_onChange();
          }
          if ('event_confirmgbtdisponclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->confirmGBTDispOnClick_onClick();
          }
          if ('event_removeronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->removerOnClick_onClick();
          }
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          if ('event_savegbtonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveGBTOnClick_onClick();
          }
          if ('event_savestatusonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveStatusOnClick_onClick();
          }
          if ('event_sendanaliseonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->sendAnaliseOnClick_onClick();
          }
          if ('event_stepagendamento_onclick' == $this->NM_ajax_opcao)
          {
              $this->stepAgendamento_onClick();
          }
          if ('event_stepdescricao_onclick' == $this->NM_ajax_opcao)
          {
              $this->stepDescricao_onClick();
          }
          if ('event_stepempreendimento_onclick' == $this->NM_ajax_opcao)
          {
              $this->stepEmpreendimento_onClick();
          }
          if ('event_stepoperadora_onclick' == $this->NM_ajax_opcao)
          {
              $this->stepOperadora_onClick();
          }
          if ('event_stepprestadora_onclick' == $this->NM_ajax_opcao)
          {
              $this->stepPrestadora_onClick();
          }
          form_CadSAE_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
          if (is_array($this->instalacaoantena))
          {
              $x = 0; 
              $this->instalacaoantena_1 = $this->instalacaoantena;
              $this->instalacaoantena = ""; 
              if ($this->instalacaoantena_1 != "") 
              { 
                  foreach ($this->instalacaoantena_1 as $dados_instalacaoantena_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->instalacaoantena .= ";";
                      } 
                      $this->instalacaoantena .= $dados_instalacaoantena_1;
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
          if (is_array($this->gbt_disponiveis))
          {
              $x = 0; 
              $this->gbt_disponiveis_1 = $this->gbt_disponiveis;
              $this->gbt_disponiveis = ""; 
              if ($this->gbt_disponiveis_1 != "") 
              { 
                  foreach ($this->gbt_disponiveis_1 as $dados_gbt_disponiveis_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->gbt_disponiveis .= ";";
                      } 
                      $this->gbt_disponiveis .= $dados_gbt_disponiveis_1;
                      $x++ ; 
                  } 
              } 
          } 
          if (is_array($this->gbt_selecionados))
          {
              $x = 0; 
              $this->gbt_selecionados_1 = $this->gbt_selecionados;
              $this->gbt_selecionados = ""; 
              if ($this->gbt_selecionados_1 != "") 
              { 
                  foreach ($this->gbt_selecionados_1 as $dados_gbt_selecionados_1 ) 
                  { 
                      if ($x != 0)
                      { 
                          $this->gbt_selecionados .= ";";
                      } 
                      $this->gbt_selecionados .= $dados_gbt_selecionados_1;
                      $x++ ; 
                  } 
              } 
          } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_CadSAE_pack_ajax_response();
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
          $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_CadSAE_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['recarga'] = $this->nmgp_opcao;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_redir_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_redir_insert'] == "ok")
          {
              if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
              {
                  $this->NM_close_db(); 
                  $this->nmgp_redireciona(2); 
              }
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_redir_atualiz'] == "ok")
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
          form_CadSAE_pack_ajax_response();
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
          form_CadSAE_pack_ajax_response();
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
//
//--------------------------------------------------------------------------------------
   function lookup_id_usuario(&$conteudo)
   {
      global  $id_usuario;
      $this->nm_tira_formatacao();
      $this->formatado = false;
      $Salva_opc = $this->nmgp_opcao;
      $this->nmgp_opcao = "lookup_rpc";
      $this->nm_converte_datas();
      $this->nmgp_opcao = $Salva_opc;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      $nm_comando = "SELECT Nom_Nome 
FROM tb_usuarios 
WHERE ID_Usuario = $this->id_usuario 
ORDER BY Nom_Nome"; 
      if ($this->id_usuario == "")
      { 
          $conteudo = ""; 
          $this->nm_formatar_campos();
          return; 
      } 
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
//
//--------------------------------------------------------------------------------------
   function lookup_id_usuario_fechamento(&$conteudo)
   {
      global  $id_usuario_fechamento;
      $this->nm_tira_formatacao();
      $this->formatado = false;
      $Salva_opc = $this->nmgp_opcao;
      $this->nmgp_opcao = "lookup_rpc";
      $this->nm_converte_datas();
      $this->nmgp_opcao = $Salva_opc;
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
      { 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
      } 
      $nm_comando = "SELECT Nom_Nome 
FROM tb_usuarios 
WHERE ID_Usuario = $this->id_usuario_fechamento 
ORDER BY Nom_Nome"; 
      if ($this->id_usuario_fechamento == "")
      { 
          $conteudo = ""; 
          $this->nm_formatar_campos();
          return; 
      } 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "./";
      nm_limpa_data($this->data_abertura, $this->field_config['data_abertura']['date_sep']) ; 
      nm_limpa_hora($this->data_abertura_hora, $this->field_config['data_abertura']['time_sep']) ; 
      nm_limpa_data($this->data_fechamento, $this->field_config['data_fechamento']['date_sep']) ; 
      nm_limpa_hora($this->data_fechamento_hora, $this->field_config['data_fechamento']['time_sep']) ; 
      $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_celular2, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone3, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_celular3, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_numero($this->id_tiposae, $this->field_config['id_tiposae']['symbol_grp']) ; 
      nm_limpa_data($this->data_inicio, $this->field_config['data_inicio']['date_sep']) ; 
      nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
      nm_limpa_data($this->data_fim, $this->field_config['data_fim']['date_sep']) ; 
      nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_SAE_returnTo)) {$this->sc_temp_SAE_returnTo = (isset($_SESSION['SAE_returnTo'])) ? $_SESSION['SAE_returnTo'] : "";}
                                                                         $return = $this->sc_temp_SAE_returnTo ?: "grid_sae";
if ($this->sc_temp_SAE_returnTo) {
	 unset($_SESSION['SAE_returnTo']);
 unset($this->sc_temp_SAE_returnTo);
;
}
 if (isset($this->sc_temp_SAE_returnTo)) { $_SESSION['SAE_returnTo'] = $this->sc_temp_SAE_returnTo;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($return, $this->nm_location, "","_self", '', 440, 630);
 };
if (isset($this->sc_temp_SAE_returnTo)) { $_SESSION['SAE_returnTo'] = $this->sc_temp_SAE_returnTo;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="num_sae" value="<?php echo $this->form_encode_input($this->num_sae) ?>"/>
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
           case 'tiposae':
               return "" . $this->Ini->Nm_lang['lang_label_typesae'] . "";
               break;
           case 'num_sae':
               return "" . $this->Ini->Nm_lang['lang_label_saenumber'] . "";
               break;
           case 'referenteprojeto':
               return "" . $this->Ini->Nm_lang['lang_label_abountproject'] . "";
               break;
           case 'label_dataexpiracaoprojeto':
               return "" . $this->Ini->Nm_lang['lang_label_dataexpiracaoprojeto'] . "";
               break;
           case 'id_usuario':
               return "" . $this->Ini->Nm_lang['lang_label_saeopenedby'] . "";
               break;
           case 'data_abertura':
               return "" . $this->Ini->Nm_lang['lang_label_openingdate'] . "";
               break;
           case 'resumoagendastatus':
               return "" . $this->Ini->Nm_lang['lang_label_scheduling'] . "";
               break;
           case 'data_fechamento':
               return "" . $this->Ini->Nm_lang['lang_label_statuschangedIn'] . "";
               break;
           case 'id_usuario_fechamento':
               return "" . $this->Ini->Nm_lang['lang_label_saecategorizedby'] . "";
               break;
           case 'optantegbtec':
               return "" . $this->Ini->Nm_lang['lang_long_PRESENCATECNICOGLOBAL'] . "";
               break;
           case 'num_status':
               return "Status";
               break;
           case 'gbt_sae':
               return "" . $this->Ini->Nm_lang['lang_label_gbtechnicians'] . "";
               break;
           case 'savestatusonclick':
               return "";
               break;
           case 'savegbtonclick':
               return "";
               break;
           case 'gbt_selecionados':
               return "" . $this->Ini->Nm_lang['lang_label_designatedtechnicians'] . "";
               break;
           case 'gbt_disponiveis':
               return "" . $this->Ini->Nm_lang['lang_label_availabletechnicians'] . "";
               break;
           case 'confirmgbtdisponclick':
               return "confirmGBTDispOnClick";
               break;
           case 'stepempreendimento':
               return "stepEmpreendimento";
               break;
           case 'stepoperadora':
               return "stepOperadora";
               break;
           case 'stepprestadora':
               return "stepPrestadora";
               break;
           case 'stepagendamento':
               return "stepAgendamento";
               break;
           case 'stepdescricao':
               return "stepDescricao";
               break;
           case 'removeronclick':
               return "removerOnClick";
               break;
           case 'num_ativo':
               return "Num Ativo";
               break;
           case 'id_empreendimento':
               return "" . $this->Ini->Nm_lang['lang_label_enterprise'] . "";
               break;
           case 'id_condomino':
               return "" . $this->Ini->Nm_lang['lang_label_client'] . "";
               break;
           case 'nom_responsavel1':
               return "" . $this->Ini->Nm_lang['lang_label_responsible'] . "";
               break;
           case 'num_telefone1':
               return "" . $this->Ini->Nm_lang['lang_label_phone'] . "";
               break;
           case 'id_torre':
               return "" . $this->Ini->Nm_lang['lang_label_tower'] . "";
               break;
           case 'id_andar':
               return "" . $this->Ini->Nm_lang['lang_label_floor'] . "";
               break;
           case 'id_conjunto':
               return "" . $this->Ini->Nm_lang['lang_label_set'] . "";
               break;
           case 'id_operadora':
               return "" . $this->Ini->Nm_lang['lang_label_operator'] . "";
               break;
           case 'nom_responsavel2':
               return "" . $this->Ini->Nm_lang['lang_label_responsible'] . "";
               break;
           case 'num_telefone2':
               return "" . $this->Ini->Nm_lang['lang_label_phone'] . "";
               break;
           case 'num_celular2':
               return "" . $this->Ini->Nm_lang['lang_label_cellphone'] . "";
               break;
           case 'id_prestador':
               return "" . $this->Ini->Nm_lang['lang_label_serviceprovider'] . "";
               break;
           case 'nom_responsavel3':
               return "" . $this->Ini->Nm_lang['lang_label_responsible'] . "";
               break;
           case 'num_telefone3':
               return "" . $this->Ini->Nm_lang['lang_label_phone'] . "";
               break;
           case 'num_celular3':
               return "" . $this->Ini->Nm_lang['lang_label_cellphone'] . "";
               break;
           case 'id':
               return "ID";
               break;
           case 'id_tiposae':
               return "ID Tipo SAE";
               break;
           case 'emergencial':
               return "" . $this->Ini->Nm_lang['lang_label_emergency'] . "";
               break;
           case 'instalacaoantena':
               return "" . $this->Ini->Nm_lang['lang_label_antennainstallation'] . "";
               break;
           case 'data_inicio':
               return "" . $this->Ini->Nm_lang['lang_label_startdate'] . "";
               break;
           case 'hora_inicio':
               return "" . $this->Ini->Nm_lang['lang_label_startingtime'] . "";
               break;
           case 'data_fim':
               return "" . $this->Ini->Nm_lang['lang_label_enddate'] . "";
               break;
           case 'hora_fim':
               return "" . $this->Ini->Nm_lang['lang_label_endtime'] . "";
               break;
           case 'pontodeencontro':
               return "" . $this->Ini->Nm_lang['lang_label_meetingpoint'] . "";
               break;
           case 'desc':
               return "" . $this->Ini->Nm_lang['lang_label_descriptionservices'] . "";
               break;
           case 'tecoperadora':
               return "" . $this->Ini->Nm_lang['lang_label_operator'] . "";
               break;
           case 'tecprestadora':
               return "" . $this->Ini->Nm_lang['lang_label_serviceprovider'] . "";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'tipo_cliente':
               return "" . $this->Ini->Nm_lang['lang_label_clienttype'] . "";
               break;
           case 'label_pas':
               return "label_pas";
               break;
           case 'os_info':
               return "fdsa";
               break;
           case 'sendanaliseonclick':
               return "sendAnaliseOnClick";
               break;
           case 'empreendimentofuncionamento':
               return "" . $this->Ini->Nm_lang['lang_label_operationbuilding'] . "";
               break;
           case 'resumoagenda':
               return "" . $this->Ini->Nm_lang['lang_label_schedulingdate'] . ":";
               break;
           case 'sugestaoagenda':
               return "" . $this->Ini->Nm_lang['lang_label_schedulingSuggestion'] . "";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_CadSAE']) || !is_array($this->NM_ajax_info['errList']['geral_form_CadSAE']))
              {
                  $this->NM_ajax_info['errList']['geral_form_CadSAE'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_CadSAE'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'tiposae' == $filtro)
        $this->ValidateField_tiposae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_sae' == $filtro)
        $this->ValidateField_num_sae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'referenteprojeto' == $filtro)
        $this->ValidateField_referenteprojeto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_usuario' == $filtro)
        $this->ValidateField_id_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_abertura' == $filtro)
        $this->ValidateField_data_abertura($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_fechamento' == $filtro)
        $this->ValidateField_data_fechamento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_usuario_fechamento' == $filtro)
        $this->ValidateField_id_usuario_fechamento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'optantegbtec' == $filtro)
        $this->ValidateField_optantegbtec($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_status' == $filtro)
        $this->ValidateField_num_status($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'gbt_sae' == $filtro)
        $this->ValidateField_gbt_sae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savestatusonclick' == $filtro)
        $this->ValidateField_savestatusonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savegbtonclick' == $filtro)
        $this->ValidateField_savegbtonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'gbt_selecionados' == $filtro)
        $this->ValidateField_gbt_selecionados($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'gbt_disponiveis' == $filtro)
        $this->ValidateField_gbt_disponiveis($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'confirmgbtdisponclick' == $filtro)
        $this->ValidateField_confirmgbtdisponclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'stepempreendimento' == $filtro)
        $this->ValidateField_stepempreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'stepoperadora' == $filtro)
        $this->ValidateField_stepoperadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'stepprestadora' == $filtro)
        $this->ValidateField_stepprestadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'stepagendamento' == $filtro)
        $this->ValidateField_stepagendamento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'stepdescricao' == $filtro)
        $this->ValidateField_stepdescricao($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'removeronclick' == $filtro)
        $this->ValidateField_removeronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_ativo' == $filtro)
        $this->ValidateField_num_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_empreendimento' == $filtro)
        $this->ValidateField_id_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_condomino' == $filtro)
        $this->ValidateField_id_condomino($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_responsavel1' == $filtro)
        $this->ValidateField_nom_responsavel1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefone1' == $filtro)
        $this->ValidateField_num_telefone1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_torre' == $filtro)
        $this->ValidateField_id_torre($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_andar' == $filtro)
        $this->ValidateField_id_andar($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_conjunto' == $filtro)
        $this->ValidateField_id_conjunto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_operadora' == $filtro)
        $this->ValidateField_id_operadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_responsavel2' == $filtro)
        $this->ValidateField_nom_responsavel2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefone2' == $filtro)
        $this->ValidateField_num_telefone2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_celular2' == $filtro)
        $this->ValidateField_num_celular2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_prestador' == $filtro)
        $this->ValidateField_id_prestador($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_responsavel3' == $filtro)
        $this->ValidateField_nom_responsavel3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefone3' == $filtro)
        $this->ValidateField_num_telefone3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_celular3' == $filtro)
        $this->ValidateField_num_celular3($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_tiposae' == $filtro)
        $this->ValidateField_id_tiposae($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'emergencial' == $filtro)
        $this->ValidateField_emergencial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'instalacaoantena' == $filtro)
        $this->ValidateField_instalacaoantena($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_inicio' == $filtro)
        $this->ValidateField_data_inicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hora_inicio' == $filtro)
        $this->ValidateField_hora_inicio($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_fim' == $filtro)
        $this->ValidateField_data_fim($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hora_fim' == $filtro)
        $this->ValidateField_hora_fim($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pontodeencontro' == $filtro)
        $this->ValidateField_pontodeencontro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'desc' == $filtro)
        $this->ValidateField_desc($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'tipo_cliente' == $filtro)
        $this->ValidateField_tipo_cliente($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sendanaliseonclick' == $filtro)
        $this->ValidateField_sendanaliseonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         if ($this->id_condomino  == '') {		
	$this->tipo_cliente  = 'G';
	$this->id_conjunto  = '';
} else {
	$this->tipo_cliente  = 'C';
}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
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

    function ValidateField_tiposae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->tiposae) != "")  
          { 
          } 
      } 
    } // ValidateField_tiposae

    function ValidateField_num_sae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['php_cmp_required']['num_sae']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['php_cmp_required']['num_sae'] == "on")) 
      { 
          if ($this->num_sae == "")  
          { 
              $Campos_Falta[] =  "" . $this->Ini->Nm_lang['lang_label_saenumber'] . "" ; 
              if (!isset($Campos_Erros['num_sae']))
              {
                  $Campos_Erros['num_sae'] = array();
              }
              $Campos_Erros['num_sae'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['num_sae']) || !is_array($this->NM_ajax_info['errList']['num_sae']))
                  {
                      $this->NM_ajax_info['errList']['num_sae'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_sae'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao == "incluir")
      { 
          if (NM_utf8_strlen($this->num_sae) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_saenumber'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_referenteprojeto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->referenteprojeto) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']) && !in_array($this->referenteprojeto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['referenteprojeto']))
                   {
                       $Campos_Erros['referenteprojeto'] = array();
                   }
                   $Campos_Erros['referenteprojeto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['referenteprojeto']) || !is_array($this->NM_ajax_info['errList']['referenteprojeto']))
                   {
                       $this->NM_ajax_info['errList']['referenteprojeto'] = array();
                   }
                   $this->NM_ajax_info['errList']['referenteprojeto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_referenteprojeto

    function ValidateField_id_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->id_usuario) > 11) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_saeopenedby'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_usuario']))
              {
                  $Campos_Erros['id_usuario'] = array();
              }
              $Campos_Erros['id_usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_usuario']) || !is_array($this->NM_ajax_info['errList']['id_usuario']))
              {
                  $this->NM_ajax_info['errList']['id_usuario'] = array();
              }
              $this->NM_ajax_info['errList']['id_usuario'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_id_usuario

    function ValidateField_data_abertura(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_abertura, $this->field_config['data_abertura']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_abertura']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_abertura']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_abertura']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_abertura']['date_sep']) ; 
          if (trim($this->data_abertura) != "")  
          { 
              if ($teste_validade->Data($this->data_abertura, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_openingdate'] . "; " ; 
                  if (!isset($Campos_Erros['data_abertura']))
                  {
                      $Campos_Erros['data_abertura'] = array();
                  }
                  $Campos_Erros['data_abertura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_abertura']) || !is_array($this->NM_ajax_info['errList']['data_abertura']))
                  {
                      $this->NM_ajax_info['errList']['data_abertura'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_abertura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_abertura']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->data_abertura_hora, $this->field_config['data_abertura_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['data_abertura_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['data_abertura_hora']['time_sep']) ; 
          if (trim($this->data_abertura_hora) != "")  
          { 
              if ($teste_validade->Hora($this->data_abertura_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_openingdate'] . "; " ; 
                  if (!isset($Campos_Erros['data_abertura_hora']))
                  {
                      $Campos_Erros['data_abertura_hora'] = array();
                  }
                  $Campos_Erros['data_abertura_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_abertura']) || !is_array($this->NM_ajax_info['errList']['data_abertura']))
                  {
                      $this->NM_ajax_info['errList']['data_abertura'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_abertura'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['data_abertura']) && isset($Campos_Erros['data_abertura_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['data_abertura'], $Campos_Erros['data_abertura_hora']);
          if (empty($Campos_Erros['data_abertura_hora']))
          {
              unset($Campos_Erros['data_abertura_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['data_abertura']))
          {
              $this->NM_ajax_info['errList']['data_abertura'] = array_unique($this->NM_ajax_info['errList']['data_abertura']);
          }
      }
    } // ValidateField_data_abertura_hora

    function ValidateField_data_fechamento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_fechamento, $this->field_config['data_fechamento']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_fechamento']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_fechamento']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_fechamento']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_fechamento']['date_sep']) ; 
          if (trim($this->data_fechamento) != "")  
          { 
              if ($teste_validade->Data($this->data_fechamento, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_statuschangedIn'] . "; " ; 
                  if (!isset($Campos_Erros['data_fechamento']))
                  {
                      $Campos_Erros['data_fechamento'] = array();
                  }
                  $Campos_Erros['data_fechamento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_fechamento']) || !is_array($this->NM_ajax_info['errList']['data_fechamento']))
                  {
                      $this->NM_ajax_info['errList']['data_fechamento'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_fechamento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_fechamento']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->data_fechamento_hora, $this->field_config['data_fechamento_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['data_fechamento_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['data_fechamento_hora']['time_sep']) ; 
          if (trim($this->data_fechamento_hora) != "")  
          { 
              if ($teste_validade->Hora($this->data_fechamento_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_statuschangedIn'] . "; " ; 
                  if (!isset($Campos_Erros['data_fechamento_hora']))
                  {
                      $Campos_Erros['data_fechamento_hora'] = array();
                  }
                  $Campos_Erros['data_fechamento_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_fechamento']) || !is_array($this->NM_ajax_info['errList']['data_fechamento']))
                  {
                      $this->NM_ajax_info['errList']['data_fechamento'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_fechamento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_data_fechamento_hora

    function ValidateField_id_usuario_fechamento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->id_usuario_fechamento) > 11) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_saecategorizedby'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['id_usuario_fechamento']))
              {
                  $Campos_Erros['id_usuario_fechamento'] = array();
              }
              $Campos_Erros['id_usuario_fechamento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['id_usuario_fechamento']) || !is_array($this->NM_ajax_info['errList']['id_usuario_fechamento']))
              {
                  $this->NM_ajax_info['errList']['id_usuario_fechamento'] = array();
              }
              $this->NM_ajax_info['errList']['id_usuario_fechamento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 11 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_id_usuario_fechamento

    function ValidateField_optantegbtec(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->optantegbtec == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_optantegbtec

    function ValidateField_num_status(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->num_status == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
    } // ValidateField_num_status

    function ValidateField_gbt_sae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->gbt_sae != "")
      {
          $x = 0; 
          $this->gbt_sae_1 = explode("@?@", $this->gbt_sae);
          $this->gbt_sae = ""; 
          if ($this->gbt_sae_1 != "") 
          { 
              foreach ($this->gbt_sae_1 as $dados_gbt_sae_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->gbt_sae .= "@?@";
                       } 
                       $this->gbt_sae .= $dados_gbt_sae_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae']) && !in_array($dados_gbt_sae_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['gbt_sae']))
                           {
                               $Campos_Erros['gbt_sae'] = array();
                           }
                           $Campos_Erros['gbt_sae'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['gbt_sae']) || !is_array($this->NM_ajax_info['errList']['gbt_sae']))
                           {
                               $this->NM_ajax_info['errList']['gbt_sae'] = array();
                           }
                           $this->NM_ajax_info['errList']['gbt_sae'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_gbt_sae

    function ValidateField_savestatusonclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->savestatusonclick) > 20) 
          { 
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['savestatusonclick']))
              {
                  $Campos_Erros['savestatusonclick'] = array();
              }
              $Campos_Erros['savestatusonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['savestatusonclick']) || !is_array($this->NM_ajax_info['errList']['savestatusonclick']))
              {
                  $this->NM_ajax_info['errList']['savestatusonclick'] = array();
              }
              $this->NM_ajax_info['errList']['savestatusonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_savestatusonclick

    function ValidateField_savegbtonclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->savegbtonclick) > 20) 
          { 
              $Campos_Crit .= " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['savegbtonclick']))
              {
                  $Campos_Erros['savegbtonclick'] = array();
              }
              $Campos_Erros['savegbtonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['savegbtonclick']) || !is_array($this->NM_ajax_info['errList']['savegbtonclick']))
              {
                  $this->NM_ajax_info['errList']['savegbtonclick'] = array();
              }
              $this->NM_ajax_info['errList']['savegbtonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_savegbtonclick

    function ValidateField_gbt_selecionados(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->gbt_selecionados) && !is_array($this->gbt_selecionados))
      {
          $this->gbt_selecionados = explode(";", $this->gbt_selecionados);
      }
      if (is_array($this->gbt_selecionados))
      {
          $x = 0; 
          $this->gbt_selecionados_1 = array(); 
          foreach ($this->gbt_selecionados as $ind => $dados_gbt_selecionados_1 ) 
          {
              if ($dados_gbt_selecionados_1 != "") 
              {
                  $this->gbt_selecionados_1[] = $dados_gbt_selecionados_1;
              } 
          } 
          $this->gbt_selecionados = ""; 
          if ($this->gbt_selecionados_1 != "") 
          { 
              foreach ($this->gbt_selecionados_1 as $dados_gbt_selecionados_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->gbt_selecionados .= ";";
                       } 
                       $this->gbt_selecionados .= $dados_gbt_selecionados_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']) && !in_array($dados_gbt_selecionados_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['gbt_selecionados']))
                           {
                               $Campos_Erros['gbt_selecionados'] = array();
                           }
                           $Campos_Erros['gbt_selecionados'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['gbt_selecionados']) || !is_array($this->NM_ajax_info['errList']['gbt_selecionados']))
                           {
                               $this->NM_ajax_info['errList']['gbt_selecionados'] = array();
                           }
                           $this->NM_ajax_info['errList']['gbt_selecionados'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_gbt_selecionados

    function ValidateField_gbt_disponiveis(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if (!empty($this->gbt_disponiveis) && !is_array($this->gbt_disponiveis))
      {
          $this->gbt_disponiveis = explode(";", $this->gbt_disponiveis);
      }
      if (is_array($this->gbt_disponiveis))
      {
          $x = 0; 
          $this->gbt_disponiveis_1 = array(); 
          foreach ($this->gbt_disponiveis as $ind => $dados_gbt_disponiveis_1 ) 
          {
              if ($dados_gbt_disponiveis_1 != "") 
              {
                  $this->gbt_disponiveis_1[] = $dados_gbt_disponiveis_1;
              } 
          } 
          $this->gbt_disponiveis = ""; 
          if ($this->gbt_disponiveis_1 != "") 
          { 
              foreach ($this->gbt_disponiveis_1 as $dados_gbt_disponiveis_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->gbt_disponiveis .= ";";
                       } 
                       $this->gbt_disponiveis .= $dados_gbt_disponiveis_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']) && !in_array($dados_gbt_disponiveis_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['gbt_disponiveis']))
                           {
                               $Campos_Erros['gbt_disponiveis'] = array();
                           }
                           $Campos_Erros['gbt_disponiveis'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['gbt_disponiveis']) || !is_array($this->NM_ajax_info['errList']['gbt_disponiveis']))
                           {
                               $this->NM_ajax_info['errList']['gbt_disponiveis'] = array();
                           }
                           $this->NM_ajax_info['errList']['gbt_disponiveis'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_gbt_disponiveis

    function ValidateField_confirmgbtdisponclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->confirmgbtdisponclick) > 20) 
          { 
              $Campos_Crit .= "confirmGBTDispOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['confirmgbtdisponclick']))
              {
                  $Campos_Erros['confirmgbtdisponclick'] = array();
              }
              $Campos_Erros['confirmgbtdisponclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['confirmgbtdisponclick']) || !is_array($this->NM_ajax_info['errList']['confirmgbtdisponclick']))
              {
                  $this->NM_ajax_info['errList']['confirmgbtdisponclick'] = array();
              }
              $this->NM_ajax_info['errList']['confirmgbtdisponclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_confirmgbtdisponclick

    function ValidateField_stepempreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->stepempreendimento) > 20) 
          { 
              $Campos_Crit .= "stepEmpreendimento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['stepempreendimento']))
              {
                  $Campos_Erros['stepempreendimento'] = array();
              }
              $Campos_Erros['stepempreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['stepempreendimento']) || !is_array($this->NM_ajax_info['errList']['stepempreendimento']))
              {
                  $this->NM_ajax_info['errList']['stepempreendimento'] = array();
              }
              $this->NM_ajax_info['errList']['stepempreendimento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_stepempreendimento

    function ValidateField_stepoperadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->stepoperadora) > 20) 
          { 
              $Campos_Crit .= "stepOperadora " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['stepoperadora']))
              {
                  $Campos_Erros['stepoperadora'] = array();
              }
              $Campos_Erros['stepoperadora'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['stepoperadora']) || !is_array($this->NM_ajax_info['errList']['stepoperadora']))
              {
                  $this->NM_ajax_info['errList']['stepoperadora'] = array();
              }
              $this->NM_ajax_info['errList']['stepoperadora'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_stepoperadora

    function ValidateField_stepprestadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->stepprestadora) > 20) 
          { 
              $Campos_Crit .= "stepPrestadora " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['stepprestadora']))
              {
                  $Campos_Erros['stepprestadora'] = array();
              }
              $Campos_Erros['stepprestadora'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['stepprestadora']) || !is_array($this->NM_ajax_info['errList']['stepprestadora']))
              {
                  $this->NM_ajax_info['errList']['stepprestadora'] = array();
              }
              $this->NM_ajax_info['errList']['stepprestadora'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_stepprestadora

    function ValidateField_stepagendamento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->stepagendamento) > 20) 
          { 
              $Campos_Crit .= "stepAgendamento " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['stepagendamento']))
              {
                  $Campos_Erros['stepagendamento'] = array();
              }
              $Campos_Erros['stepagendamento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['stepagendamento']) || !is_array($this->NM_ajax_info['errList']['stepagendamento']))
              {
                  $this->NM_ajax_info['errList']['stepagendamento'] = array();
              }
              $this->NM_ajax_info['errList']['stepagendamento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_stepagendamento

    function ValidateField_stepdescricao(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->stepdescricao) > 20) 
          { 
              $Campos_Crit .= "stepDescricao " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['stepdescricao']))
              {
                  $Campos_Erros['stepdescricao'] = array();
              }
              $Campos_Erros['stepdescricao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['stepdescricao']) || !is_array($this->NM_ajax_info['errList']['stepdescricao']))
              {
                  $this->NM_ajax_info['errList']['stepdescricao'] = array();
              }
              $this->NM_ajax_info['errList']['stepdescricao'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_stepdescricao

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

    function ValidateField_id_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_empreendimento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']) && !in_array($this->id_empreendimento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_empreendimento']))
                   {
                       $Campos_Erros['id_empreendimento'] = array();
                   }
                   $Campos_Erros['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_empreendimento']) || !is_array($this->NM_ajax_info['errList']['id_empreendimento']))
                   {
                       $this->NM_ajax_info['errList']['id_empreendimento'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_empreendimento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_empreendimento

    function ValidateField_id_condomino(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_condomino) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']) && !in_array($this->id_condomino, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_condomino']))
                   {
                       $Campos_Erros['id_condomino'] = array();
                   }
                   $Campos_Erros['id_condomino'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_condomino']) || !is_array($this->NM_ajax_info['errList']['id_condomino']))
                   {
                       $this->NM_ajax_info['errList']['id_condomino'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_condomino'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_condomino

    function ValidateField_nom_responsavel1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_responsavel1) > 100) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_responsible'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_responsavel1']))
              {
                  $Campos_Erros['nom_responsavel1'] = array();
              }
              $Campos_Erros['nom_responsavel1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_responsavel1']) || !is_array($this->NM_ajax_info['errList']['nom_responsavel1']))
              {
                  $this->NM_ajax_info['errList']['nom_responsavel1'] = array();
              }
              $this->NM_ajax_info['errList']['nom_responsavel1'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_responsavel1

    function ValidateField_num_telefone1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefone1) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_phone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_id_torre(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_torre) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']) && !in_array($this->id_torre, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_torre']))
                   {
                       $Campos_Erros['id_torre'] = array();
                   }
                   $Campos_Erros['id_torre'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_torre']) || !is_array($this->NM_ajax_info['errList']['id_torre']))
                   {
                       $this->NM_ajax_info['errList']['id_torre'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_torre'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_torre

    function ValidateField_id_andar(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_andar) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']) && !in_array($this->id_andar, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_andar']))
                   {
                       $Campos_Erros['id_andar'] = array();
                   }
                   $Campos_Erros['id_andar'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_andar']) || !is_array($this->NM_ajax_info['errList']['id_andar']))
                   {
                       $this->NM_ajax_info['errList']['id_andar'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_andar'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_andar

    function ValidateField_id_conjunto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_conjunto) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']) && !in_array($this->id_conjunto, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_conjunto']))
                   {
                       $Campos_Erros['id_conjunto'] = array();
                   }
                   $Campos_Erros['id_conjunto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_conjunto']) || !is_array($this->NM_ajax_info['errList']['id_conjunto']))
                   {
                       $this->NM_ajax_info['errList']['id_conjunto'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_conjunto'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_conjunto

    function ValidateField_id_operadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_operadora) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']) && !in_array($this->id_operadora, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']))
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

    function ValidateField_nom_responsavel2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_responsavel2) > 100) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_responsible'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_responsavel2']))
              {
                  $Campos_Erros['nom_responsavel2'] = array();
              }
              $Campos_Erros['nom_responsavel2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_responsavel2']) || !is_array($this->NM_ajax_info['errList']['nom_responsavel2']))
              {
                  $this->NM_ajax_info['errList']['nom_responsavel2'] = array();
              }
              $this->NM_ajax_info['errList']['nom_responsavel2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_responsavel2

    function ValidateField_num_telefone2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefone2) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_phone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_num_celular2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->num_celular2, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_celular2) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_cellphone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_celular2']))
              {
                  $Campos_Erros['num_celular2'] = array();
              }
              $Campos_Erros['num_celular2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_celular2']) || !is_array($this->NM_ajax_info['errList']['num_celular2']))
              {
                  $this->NM_ajax_info['errList']['num_celular2'] = array();
              }
              $this->NM_ajax_info['errList']['num_celular2'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_celular2

    function ValidateField_id_prestador(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_prestador) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']) && !in_array($this->id_prestador, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_prestador']))
                   {
                       $Campos_Erros['id_prestador'] = array();
                   }
                   $Campos_Erros['id_prestador'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_prestador']) || !is_array($this->NM_ajax_info['errList']['id_prestador']))
                   {
                       $this->NM_ajax_info['errList']['id_prestador'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_prestador'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_prestador

    function ValidateField_nom_responsavel3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_responsavel3) > 100) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_responsible'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_responsavel3']))
              {
                  $Campos_Erros['nom_responsavel3'] = array();
              }
              $Campos_Erros['nom_responsavel3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_responsavel3']) || !is_array($this->NM_ajax_info['errList']['nom_responsavel3']))
              {
                  $this->NM_ajax_info['errList']['nom_responsavel3'] = array();
              }
              $this->NM_ajax_info['errList']['nom_responsavel3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_responsavel3

    function ValidateField_num_telefone3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->num_telefone3, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefone3) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_phone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_telefone3']))
              {
                  $Campos_Erros['num_telefone3'] = array();
              }
              $Campos_Erros['num_telefone3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_telefone3']) || !is_array($this->NM_ajax_info['errList']['num_telefone3']))
              {
                  $this->NM_ajax_info['errList']['num_telefone3'] = array();
              }
              $this->NM_ajax_info['errList']['num_telefone3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_telefone3

    function ValidateField_num_celular3(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nm_tira_mask($this->num_celular3, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_celular3) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_cellphone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_celular3']))
              {
                  $Campos_Erros['num_celular3'] = array();
              }
              $Campos_Erros['num_celular3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_celular3']) || !is_array($this->NM_ajax_info['errList']['num_celular3']))
              {
                  $this->NM_ajax_info['errList']['num_celular3'] = array();
              }
              $this->NM_ajax_info['errList']['num_celular3'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_celular3

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id == "")  
      { 
          $this->id = 0;
          $this->sc_force_zero[] = 'id';
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

    function ValidateField_id_tiposae(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_tiposae == "")  
      { 
          $this->id_tiposae = 0;
          $this->sc_force_zero[] = 'id_tiposae';
      } 
      nm_limpa_numero($this->id_tiposae, $this->field_config['id_tiposae']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_tiposae != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_tiposae) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID Tipo SAE: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_tiposae']))
                  {
                      $Campos_Erros['id_tiposae'] = array();
                  }
                  $Campos_Erros['id_tiposae'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_tiposae']) || !is_array($this->NM_ajax_info['errList']['id_tiposae']))
                  {
                      $this->NM_ajax_info['errList']['id_tiposae'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_tiposae'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_tiposae, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID Tipo SAE; " ; 
                  if (!isset($Campos_Erros['id_tiposae']))
                  {
                      $Campos_Erros['id_tiposae'] = array();
                  }
                  $Campos_Erros['id_tiposae'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_tiposae']) || !is_array($this->NM_ajax_info['errList']['id_tiposae']))
                  {
                      $this->NM_ajax_info['errList']['id_tiposae'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_tiposae'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_tiposae

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

    function ValidateField_instalacaoantena(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->instalacaoantena == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      else 
      { 
          if (is_array($this->instalacaoantena))
          {
              $x = 0; 
              $this->instalacaoantena_1 = array(); 
              foreach ($this->instalacaoantena as $ind => $dados_instalacaoantena_1 ) 
              {
                  if ($dados_instalacaoantena_1 != "") 
                  {
                      $this->instalacaoantena_1[] = $dados_instalacaoantena_1;
                  } 
              } 
              $this->instalacaoantena = ""; 
              foreach ($this->instalacaoantena_1 as $dados_instalacaoantena_1 ) 
              { 
                   if ($x != 0)
                   { 
                       $this->instalacaoantena .= ";";
                   } 
                   $this->instalacaoantena .= $dados_instalacaoantena_1;
                   $x++ ; 
              } 
          } 
      } 
    } // ValidateField_instalacaoantena

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
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->hora_inicio) > 8) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_startingtime'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['hora_inicio']))
              {
                  $Campos_Erros['hora_inicio'] = array();
              }
              $Campos_Erros['hora_inicio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['hora_inicio']) || !is_array($this->NM_ajax_info['errList']['hora_inicio']))
              {
                  $this->NM_ajax_info['errList']['hora_inicio'] = array();
              }
              $this->NM_ajax_info['errList']['hora_inicio'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789:0123456789:";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->hora_inicio ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->hora_inicio, $_SESSION['hticnsdata']['charset']); $x++) 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_startingtime'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['hora_inicio']))
              {
                  $Campos_Erros['hora_inicio'] = array();
              }
              $Campos_Erros['hora_inicio'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['hora_inicio']) || !is_array($this->NM_ajax_info['errList']['hora_inicio']))
              {
                  $this->NM_ajax_info['errList']['hora_inicio'] = array();
              }
              $this->NM_ajax_info['errList']['hora_inicio'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
 nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
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
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->hora_fim) > 8) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_endtime'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['hora_fim']))
              {
                  $Campos_Erros['hora_fim'] = array();
              }
              $Campos_Erros['hora_fim'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['hora_fim']) || !is_array($this->NM_ajax_info['errList']['hora_fim']))
              {
                  $this->NM_ajax_info['errList']['hora_fim'] = array();
              }
              $this->NM_ajax_info['errList']['hora_fim'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "0123456789:0123456789:";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->hora_fim ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->hora_fim, $_SESSION['hticnsdata']['charset']); $x++) 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_endtime'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['hora_fim']))
              {
                  $Campos_Erros['hora_fim'] = array();
              }
              $Campos_Erros['hora_fim'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['hora_fim']) || !is_array($this->NM_ajax_info['errList']['hora_fim']))
              {
                  $this->NM_ajax_info['errList']['hora_fim'] = array();
              }
              $this->NM_ajax_info['errList']['hora_fim'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
 nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
    } // ValidateField_hora_fim

    function ValidateField_pontodeencontro(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pontodeencontro) > 50) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_meetingpoint'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pontodeencontro']))
              {
                  $Campos_Erros['pontodeencontro'] = array();
              }
              $Campos_Erros['pontodeencontro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pontodeencontro']) || !is_array($this->NM_ajax_info['errList']['pontodeencontro']))
              {
                  $this->NM_ajax_info['errList']['pontodeencontro'] = array();
              }
              $this->NM_ajax_info['errList']['pontodeencontro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pontodeencontro

    function ValidateField_desc(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->desc) > 32767) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_descriptionservices'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['desc']))
              {
                  $Campos_Erros['desc'] = array();
              }
              $Campos_Erros['desc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['desc']) || !is_array($this->NM_ajax_info['errList']['desc']))
              {
                  $this->NM_ajax_info['errList']['desc'] = array();
              }
              $this->NM_ajax_info['errList']['desc'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 32767 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_desc

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

    function ValidateField_tipo_cliente(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->tipo_cliente) > 255) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_clienttype'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['tipo_cliente']))
              {
                  $Campos_Erros['tipo_cliente'] = array();
              }
              $Campos_Erros['tipo_cliente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['tipo_cliente']) || !is_array($this->NM_ajax_info['errList']['tipo_cliente']))
              {
                  $this->NM_ajax_info['errList']['tipo_cliente'] = array();
              }
              $this->NM_ajax_info['errList']['tipo_cliente'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_tipo_cliente

    function ValidateField_sendanaliseonclick(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->sendanaliseonclick) > 20) 
          { 
              $Campos_Crit .= "sendAnaliseOnClick " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['sendanaliseonclick']))
              {
                  $Campos_Erros['sendanaliseonclick'] = array();
              }
              $Campos_Erros['sendanaliseonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['sendanaliseonclick']) || !is_array($this->NM_ajax_info['errList']['sendanaliseonclick']))
              {
                  $this->NM_ajax_info['errList']['sendanaliseonclick'] = array();
              }
              $this->NM_ajax_info['errList']['sendanaliseonclick'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_sendanaliseonclick

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
    $this->nmgp_dados_form['tiposae'] = $this->tiposae;
    $this->nmgp_dados_form['num_sae'] = $this->num_sae;
    $this->nmgp_dados_form['referenteprojeto'] = $this->referenteprojeto;
    $this->nmgp_dados_form['label_dataexpiracaoprojeto'] = $this->label_dataexpiracaoprojeto;
    $this->nmgp_dados_form['id_usuario'] = $this->id_usuario;
    $this->nmgp_dados_form['data_abertura'] = $this->data_abertura;
    $this->nmgp_dados_form['resumoagendastatus'] = $this->resumoagendastatus;
    $this->nmgp_dados_form['data_fechamento'] = $this->data_fechamento;
    $this->nmgp_dados_form['id_usuario_fechamento'] = $this->id_usuario_fechamento;
    $this->nmgp_dados_form['optantegbtec'] = $this->optantegbtec;
    $this->nmgp_dados_form['num_status'] = $this->num_status;
    $this->nmgp_dados_form['gbt_sae'] = $this->gbt_sae;
    $this->nmgp_dados_form['savestatusonclick'] = $this->savestatusonclick;
    $this->nmgp_dados_form['savegbtonclick'] = $this->savegbtonclick;
    $this->nmgp_dados_form['gbt_selecionados'] = $this->gbt_selecionados;
    $this->nmgp_dados_form['gbt_disponiveis'] = $this->gbt_disponiveis;
    $this->nmgp_dados_form['confirmgbtdisponclick'] = $this->confirmgbtdisponclick;
    $this->nmgp_dados_form['stepempreendimento'] = $this->stepempreendimento;
    $this->nmgp_dados_form['stepoperadora'] = $this->stepoperadora;
    $this->nmgp_dados_form['stepprestadora'] = $this->stepprestadora;
    $this->nmgp_dados_form['stepagendamento'] = $this->stepagendamento;
    $this->nmgp_dados_form['stepdescricao'] = $this->stepdescricao;
    $this->nmgp_dados_form['removeronclick'] = $this->removeronclick;
    $this->nmgp_dados_form['num_ativo'] = $this->num_ativo;
    $this->nmgp_dados_form['id_empreendimento'] = $this->id_empreendimento;
    $this->nmgp_dados_form['id_condomino'] = $this->id_condomino;
    $this->nmgp_dados_form['nom_responsavel1'] = $this->nom_responsavel1;
    $this->nmgp_dados_form['num_telefone1'] = $this->num_telefone1;
    $this->nmgp_dados_form['id_torre'] = $this->id_torre;
    $this->nmgp_dados_form['id_andar'] = $this->id_andar;
    $this->nmgp_dados_form['id_conjunto'] = $this->id_conjunto;
    $this->nmgp_dados_form['id_operadora'] = $this->id_operadora;
    $this->nmgp_dados_form['nom_responsavel2'] = $this->nom_responsavel2;
    $this->nmgp_dados_form['num_telefone2'] = $this->num_telefone2;
    $this->nmgp_dados_form['num_celular2'] = $this->num_celular2;
    $this->nmgp_dados_form['id_prestador'] = $this->id_prestador;
    $this->nmgp_dados_form['nom_responsavel3'] = $this->nom_responsavel3;
    $this->nmgp_dados_form['num_telefone3'] = $this->num_telefone3;
    $this->nmgp_dados_form['num_celular3'] = $this->num_celular3;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['id_tiposae'] = $this->id_tiposae;
    $this->nmgp_dados_form['emergencial'] = $this->emergencial;
    $this->nmgp_dados_form['instalacaoantena'] = $this->instalacaoantena;
    $this->nmgp_dados_form['data_inicio'] = $this->data_inicio;
    $this->nmgp_dados_form['hora_inicio'] = $this->hora_inicio;
    $this->nmgp_dados_form['data_fim'] = $this->data_fim;
    $this->nmgp_dados_form['hora_fim'] = $this->hora_fim;
    $this->nmgp_dados_form['pontodeencontro'] = $this->pontodeencontro;
    $this->nmgp_dados_form['desc'] = $this->desc;
    $this->nmgp_dados_form['tecoperadora'] = $this->tecoperadora;
    $this->nmgp_dados_form['tecprestadora'] = $this->tecprestadora;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['tipo_cliente'] = $this->tipo_cliente;
    $this->nmgp_dados_form['label_pas'] = $this->label_pas;
    $this->nmgp_dados_form['os_info'] = $this->os_info;
    $this->nmgp_dados_form['sendanaliseonclick'] = $this->sendanaliseonclick;
    $this->nmgp_dados_form['empreendimentofuncionamento'] = $this->empreendimentofuncionamento;
    $this->nmgp_dados_form['resumoagenda'] = $this->resumoagenda;
    $this->nmgp_dados_form['sugestaoagenda'] = $this->sugestaoagenda;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_data($this->data_abertura, $this->field_config['data_abertura']['date_sep']) ; 
      nm_limpa_hora($this->data_abertura_hora, $this->field_config['data_abertura']['time_sep']) ; 
      nm_limpa_data($this->data_fechamento, $this->field_config['data_fechamento']['date_sep']) ; 
      nm_limpa_hora($this->data_fechamento_hora, $this->field_config['data_fechamento']['time_sep']) ; 
      $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_celular2, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefone3, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_celular3, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      nm_limpa_numero($this->id_tiposae, $this->field_config['id_tiposae']['symbol_grp']) ; 
      nm_limpa_data($this->data_inicio, $this->field_config['data_inicio']['date_sep']) ; 
      nm_limpa_hora($this->hora_inicio, $this->field_config['hora_inicio']['time_sep']) ; 
      nm_limpa_data($this->data_fim, $this->field_config['data_fim']['date_sep']) ; 
      nm_limpa_hora($this->hora_fim, $this->field_config['hora_fim']['time_sep']) ; 
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
      if ($Nome_Campo == "num_telefone1")
      {
          $this->nm_tira_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_telefone2")
      {
          $this->nm_tira_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_celular2")
      {
          $this->nm_tira_mask($this->num_celular2, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_telefone3")
      {
          $this->nm_tira_mask($this->num_telefone3, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_celular3")
      {
          $this->nm_tira_mask($this->num_celular3, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_tiposae")
      {
          nm_limpa_numero($this->id_tiposae, $this->field_config['id_tiposae']['symbol_grp']) ; 
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
      if ((!empty($this->data_abertura) && 'null' != $this->data_abertura) || (!empty($format_fields) && isset($format_fields['data_abertura'])))
      {
          $nm_separa_data = strpos($this->field_config['data_abertura']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['data_abertura']['date_format'];
          $this->field_config['data_abertura']['date_format'] = substr($this->field_config['data_abertura']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->data_abertura, " ") ; 
          $this->data_abertura_hora = substr($this->data_abertura, $separador + 1) ; 
          $this->data_abertura = substr($this->data_abertura, 0, $separador) ; 
          nm_volta_data($this->data_abertura, $this->field_config['data_abertura']['date_format']) ; 
          nmgp_Form_Datas($this->data_abertura, $this->field_config['data_abertura']['date_format'], $this->field_config['data_abertura']['date_sep']) ;  
          $this->field_config['data_abertura']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->data_abertura_hora, $this->field_config['data_abertura']['date_format']) ; 
          nmgp_Form_Hora($this->data_abertura_hora, $this->field_config['data_abertura']['date_format'], $this->field_config['data_abertura']['time_sep']) ;  
          $this->field_config['data_abertura']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->data_abertura || '' == $this->data_abertura)
      {
          $this->data_abertura_hora = '';
          $this->data_abertura = '';
      }
      if ((!empty($this->data_fechamento) && 'null' != $this->data_fechamento) || (!empty($format_fields) && isset($format_fields['data_fechamento'])))
      {
          $nm_separa_data = strpos($this->field_config['data_fechamento']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['data_fechamento']['date_format'];
          $this->field_config['data_fechamento']['date_format'] = substr($this->field_config['data_fechamento']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->data_fechamento, " ") ; 
          $this->data_fechamento_hora = substr($this->data_fechamento, $separador + 1) ; 
          $this->data_fechamento = substr($this->data_fechamento, 0, $separador) ; 
          nm_volta_data($this->data_fechamento, $this->field_config['data_fechamento']['date_format']) ; 
          nmgp_Form_Datas($this->data_fechamento, $this->field_config['data_fechamento']['date_format'], $this->field_config['data_fechamento']['date_sep']) ;  
          $this->field_config['data_fechamento']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->data_fechamento_hora, $this->field_config['data_fechamento']['date_format']) ; 
          nmgp_Form_Hora($this->data_fechamento_hora, $this->field_config['data_fechamento']['date_format'], $this->field_config['data_fechamento']['time_sep']) ;  
          $this->field_config['data_fechamento']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->data_fechamento || '' == $this->data_fechamento)
      {
          $this->data_fechamento_hora = '';
          $this->data_fechamento = '';
      }
      if (!empty($this->num_telefone1) || (!empty($format_fields) && isset($format_fields['num_telefone1'])))
      {
          $this->nm_gera_mask($this->num_telefone1, "(99) 9999-9999;(99) 99999-9999"); 
      }
      if (!empty($this->num_telefone2) || (!empty($format_fields) && isset($format_fields['num_telefone2'])))
      {
          $this->nm_gera_mask($this->num_telefone2, "(99) 9999-9999;(99) 99999-9999"); 
      }
      if (!empty($this->num_celular2) || (!empty($format_fields) && isset($format_fields['num_celular2'])))
      {
          $this->nm_gera_mask($this->num_celular2, "(99) 99999-9999"); 
      }
      if (!empty($this->num_telefone3) || (!empty($format_fields) && isset($format_fields['num_telefone3'])))
      {
          $this->nm_gera_mask($this->num_telefone3, "(99) 9999-9999;(99) 99999-9999"); 
      }
      if (!empty($this->num_celular3) || (!empty($format_fields) && isset($format_fields['num_celular3'])))
      {
          $this->nm_gera_mask($this->num_celular3, "(99) 99999-9999"); 
      }
      if (!empty($this->id) || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
      if (!empty($this->id_tiposae) || (!empty($format_fields) && isset($format_fields['id_tiposae'])))
      {
          nmgp_Form_Num_Val($this->id_tiposae, $this->field_config['id_tiposae']['symbol_grp'], $this->field_config['id_tiposae']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_tiposae']['symbol_fmt']) ; 
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
      }
      elseif ('null' == $this->hora_fim || '' == $this->hora_fim)
      {
          $this->hora_fim = '';
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
      $guarda_format_hora = $this->field_config['data_abertura']['date_format'];
      if ($this->data_abertura != "")  
      { 
          $nm_separa_data = strpos($this->field_config['data_abertura']['date_format'], ";") ;
          $this->field_config['data_abertura']['date_format'] = substr($this->field_config['data_abertura']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->data_abertura, $this->field_config['data_abertura']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->data_abertura = str_replace('-', '', $this->data_abertura);
          }
          $this->field_config['data_abertura']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->data_abertura_hora, $this->field_config['data_abertura']['date_format']) ; 
          if ($this->data_abertura_hora == "" )  
          { 
              $this->data_abertura_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4) . "." . substr($this->data_abertura_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->data_abertura_hora = substr($this->data_abertura_hora, 0, -4);
          }
          if ($this->data_abertura != "")  
          { 
              $this->data_abertura .= " " . $this->data_abertura_hora ; 
          }
      } 
      if ($this->data_abertura == "" && $use_null)  
      { 
          $this->data_abertura = "null" ; 
      } 
      $this->field_config['data_abertura']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['data_fechamento']['date_format'];
      if ($this->data_fechamento != "")  
      { 
          $nm_separa_data = strpos($this->field_config['data_fechamento']['date_format'], ";") ;
          $this->field_config['data_fechamento']['date_format'] = substr($this->field_config['data_fechamento']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->data_fechamento, $this->field_config['data_fechamento']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->data_fechamento = str_replace('-', '', $this->data_fechamento);
          }
          $this->field_config['data_fechamento']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->data_fechamento_hora, $this->field_config['data_fechamento']['date_format']) ; 
          if ($this->data_fechamento_hora == "" )  
          { 
              $this->data_fechamento_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4) . "." . substr($this->data_fechamento_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->data_fechamento_hora = substr($this->data_fechamento_hora, 0, -4);
          }
          if ($this->data_fechamento != "")  
          { 
              $this->data_fechamento .= " " . $this->data_fechamento_hora ; 
          }
      } 
      if ($this->data_fechamento == "" && $use_null)  
      { 
          $this->data_fechamento = "null" ; 
      } 
      $this->field_config['data_fechamento']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_tiposae();
          $this->ajax_return_values_num_sae();
          $this->ajax_return_values_referenteprojeto();
          $this->ajax_return_values_label_dataexpiracaoprojeto();
          $this->ajax_return_values_id_usuario();
          $this->ajax_return_values_data_abertura();
          $this->ajax_return_values_resumoagendastatus();
          $this->ajax_return_values_data_fechamento();
          $this->ajax_return_values_id_usuario_fechamento();
          $this->ajax_return_values_optantegbtec();
          $this->ajax_return_values_num_status();
          $this->ajax_return_values_gbt_sae();
          $this->ajax_return_values_savestatusonclick();
          $this->ajax_return_values_savegbtonclick();
          $this->ajax_return_values_gbt_selecionados();
          $this->ajax_return_values_gbt_disponiveis();
          $this->ajax_return_values_confirmgbtdisponclick();
          $this->ajax_return_values_stepempreendimento();
          $this->ajax_return_values_stepoperadora();
          $this->ajax_return_values_stepprestadora();
          $this->ajax_return_values_stepagendamento();
          $this->ajax_return_values_stepdescricao();
          $this->ajax_return_values_removeronclick();
          $this->ajax_return_values_num_ativo();
          $this->ajax_return_values_id_empreendimento();
          $this->ajax_return_values_id_condomino();
          $this->ajax_return_values_nom_responsavel1();
          $this->ajax_return_values_num_telefone1();
          $this->ajax_return_values_id_torre();
          $this->ajax_return_values_id_andar();
          $this->ajax_return_values_id_conjunto();
          $this->ajax_return_values_id_operadora();
          $this->ajax_return_values_nom_responsavel2();
          $this->ajax_return_values_num_telefone2();
          $this->ajax_return_values_num_celular2();
          $this->ajax_return_values_id_prestador();
          $this->ajax_return_values_nom_responsavel3();
          $this->ajax_return_values_num_telefone3();
          $this->ajax_return_values_num_celular3();
          $this->ajax_return_values_id();
          $this->ajax_return_values_id_tiposae();
          $this->ajax_return_values_emergencial();
          $this->ajax_return_values_instalacaoantena();
          $this->ajax_return_values_data_inicio();
          $this->ajax_return_values_hora_inicio();
          $this->ajax_return_values_data_fim();
          $this->ajax_return_values_hora_fim();
          $this->ajax_return_values_pontodeencontro();
          $this->ajax_return_values_desc();
          $this->ajax_return_values_tecoperadora();
          $this->ajax_return_values_tecprestadora();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_tipo_cliente();
          $this->ajax_return_values_label_pas();
          $this->ajax_return_values_os_info();
          $this->ajax_return_values_sendanaliseonclick();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['num_sae']['keyVal'] = form_CadSAE_pack_protect_string($this->nmgp_dados_form['num_sae']);
          }
   } // ajax_return_values

          //----- tiposae
   function ajax_return_values_tiposae($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tiposae", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tiposae);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tiposae'] = array(
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
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- referenteprojeto
   function ajax_return_values_referenteprojeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("referenteprojeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->referenteprojeto);
              $aLookup = array();
              $this->_tmp_lookup_referenteprojeto = $this->referenteprojeto;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT ID_projeto, ProtocoloHex 
FROM tb_projetos 
WHERE ID_projeto = '$this->referenteprojeto' 
ORDER BY ProtocoloHex";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'][] = $rs->fields[0];
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
          $sSelComp = "name=\"referenteprojeto\"";
          if (isset($this->NM_ajax_info['select_html']['referenteprojeto']) && !empty($this->NM_ajax_info['select_html']['referenteprojeto']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['referenteprojeto'];
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

                  if ($this->referenteprojeto == $sValue)
                  {
                      $this->_tmp_lookup_referenteprojeto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['referenteprojeto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['referenteprojeto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['referenteprojeto']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['referenteprojeto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['referenteprojeto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['referenteprojeto']['labList'] = $aLabel;
          }
   }

          //----- label_dataexpiracaoprojeto
   function ajax_return_values_label_dataexpiracaoprojeto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("label_dataexpiracaoprojeto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->label_dataexpiracaoprojeto);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['label_dataexpiracaoprojeto'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- id_usuario
   function ajax_return_values_id_usuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_usuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_usuario);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_usuario'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
              $orig_id_usuario = $this->id_usuario;
              $id_usuario      = $this->id_usuario;
              $this->id_usuario = $id_usuario;
              $this->lookup_id_usuario($conteudo);
              $this->id_usuario = $orig_id_usuario;
              $this->NM_ajax_info['fldList']['id_usuario']['lookupCons'] = form_CadSAE_pack_protect_string(NM_charset_to_utf8($conteudo));
          }
   }

          //----- data_abertura
   function ajax_return_values_data_abertura($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_abertura", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_abertura);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_abertura'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($this->data_abertura . ' ' . $this->data_abertura_hora),
              );
          }
   }

          //----- resumoagendastatus
   function ajax_return_values_resumoagendastatus($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("resumoagendastatus", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->resumoagendastatus);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['resumoagendastatus'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- data_fechamento
   function ajax_return_values_data_fechamento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_fechamento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_fechamento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_fechamento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          $this->NM_ajax_info['fldList']['data_fechamento_hora'] = array(
               'type'    => 'label',
               'valList' => array($this->data_fechamento_hora),
              );
          }
   }

          //----- id_usuario_fechamento
   function ajax_return_values_id_usuario_fechamento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_usuario_fechamento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_usuario_fechamento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_usuario_fechamento'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
              $orig_id_usuario_fechamento = $this->id_usuario_fechamento;
              $id_usuario_fechamento      = $this->id_usuario_fechamento;
              $this->id_usuario_fechamento = $id_usuario_fechamento;
              $this->lookup_id_usuario_fechamento($conteudo);
              $this->id_usuario_fechamento = $orig_id_usuario_fechamento;
              $this->NM_ajax_info['fldList']['id_usuario_fechamento']['lookupCons'] = form_CadSAE_pack_protect_string(NM_charset_to_utf8($conteudo));
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

$aLookup[] = array(form_CadSAE_pack_protect_string('S') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_yes'] . ""));
$aLookup[] = array(form_CadSAE_pack_protect_string('N') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_no'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_optantegbtec'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_optantegbtec'][] = 'N';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"optantegbtec\"";
          if (isset($this->NM_ajax_info['select_html']['optantegbtec']) && !empty($this->NM_ajax_info['select_html']['optantegbtec']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['optantegbtec'];
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

                  if ($this->optantegbtec == $sValue)
                  {
                      $this->_tmp_lookup_optantegbtec = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['optantegbtec'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['optantegbtec']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['optantegbtec']['valList'][$i] = form_CadSAE_pack_protect_string($v);
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

          //----- num_status
   function ajax_return_values_num_status($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_status", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_status);
              $aLookup = array();
              $this->_tmp_lookup_num_status = $this->num_status;

$aLookup[] = array(form_CadSAE_pack_protect_string('A') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_status_upc1'] . ""));
$aLookup[] = array(form_CadSAE_pack_protect_string('AP') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_status_upc7'] . ""));
$aLookup[] = array(form_CadSAE_pack_protect_string('AA') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_status_upc2'] . ""));
$aLookup[] = array(form_CadSAE_pack_protect_string('AE') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_status_upc3'] . ""));
$aLookup[] = array(form_CadSAE_pack_protect_string('RAE') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_status_upc4'] . ""));
$aLookup[] = array(form_CadSAE_pack_protect_string('C') => form_CadSAE_pack_protect_string("" . $this->Ini->Nm_lang['lang_label_status_upc8'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_num_status'][] = 'A';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_num_status'][] = 'AP';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_num_status'][] = 'AA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_num_status'][] = 'AE';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_num_status'][] = 'RAE';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_num_status'][] = 'C';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"num_status\"";
          if (isset($this->NM_ajax_info['select_html']['num_status']) && !empty($this->NM_ajax_info['select_html']['num_status']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['num_status'];
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

                  if ($this->num_status == $sValue)
                  {
                      $this->_tmp_lookup_num_status = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['num_status'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['num_status']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['num_status']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['num_status']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['num_status']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['num_status']['labList'] = $aLabel;
          }
   }

          //----- gbt_sae
   function ajax_return_values_gbt_sae($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gbt_sae", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gbt_sae);
              $aLookup = array();
              $this->_tmp_lookup_gbt_sae = $this->gbt_sae;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "select a.ID_Usuario, a.Nom_Nome 
from tb_usuarios a 
WHERE a.ID_Usuario IN (" . $_SESSION['listGBTDisp'] . ") 
order by a.Nom_UserName;";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_sae'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['gbt_sae'] = array(
                       'row'    => '',
               'type'    => 'duplosel',
               'valList' => explode((false === strpos($this->gbt_sae, '@?@') ? ';' : '@?@'), $sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 7,
              );
              end($this->NM_ajax_info['fldList']['gbt_sae']['valList']);
              if ('' == current($this->NM_ajax_info['fldList']['gbt_sae']['valList']))
              {
                  array_pop($this->NM_ajax_info['fldList']['gbt_sae']['valList']);
              }
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['gbt_sae']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['gbt_sae']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['gbt_sae']['labList'] = $aLabel;
          }
   }

          //----- savestatusonclick
   function ajax_return_values_savestatusonclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("savestatusonclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->savestatusonclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['savestatusonclick'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- savegbtonclick
   function ajax_return_values_savegbtonclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("savegbtonclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->savegbtonclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['savegbtonclick'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- gbt_selecionados
   function ajax_return_values_gbt_selecionados($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gbt_selecionados", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gbt_selecionados);
              $aLookup = array();
              $this->_tmp_lookup_gbt_selecionados = $this->gbt_selecionados;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, b.Nom_Nome 
FROM tb_saetecgb a 
INNER JOIN tb_usuarios b ON b.ID_Usuario = a.ID_Usuario 
WHERE a.Num_SAE = '" . $_SESSION['Num_SAE'] . "' 
GROUP BY a.ID_Usuario 
ORDER BY a.ID_Usuario";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'][] = $rs->fields[0];
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
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['gbt_selecionados']) && !empty($this->NM_ajax_info['select_html']['gbt_selecionados']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['gbt_selecionados'];
          }
          $this->NM_ajax_info['fldList']['gbt_selecionados'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-gbt_selecionados',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['gbt_selecionados']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['gbt_selecionados']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['gbt_selecionados']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['gbt_selecionados']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['gbt_selecionados']['labList'] = $aLabel;
          }
   }

          //----- gbt_disponiveis
   function ajax_return_values_gbt_disponiveis($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gbt_disponiveis", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gbt_disponiveis);
              $aLookup = array();
              $this->_tmp_lookup_gbt_disponiveis = $this->gbt_disponiveis;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "select a.ID_Usuario, a.Nom_Nome 
from tb_usuarios a 
WHERE a.Num_TipoUsuario  = 'GT' AND 
a.ID_Usuario NOT IN ( 
	SELECT c.ID_Usuario FROM tb_agenda c 
    INNER JOIN tb_sae d ON d.Num_SAE = '" . $_SESSION['Num_SAE'] . "' 
	WHERE  
        CONCAT(d.Data_Inicio,' ',d.Hora_Inicio) BETWEEN CONCAT(c.Data_Inicio,' ',c.Hora_Inicio) AND CONCAT(c.Data_Fim,' ',c.Hora_Fim) OR 
        CONCAT(d.Data_Fim,' ',d.Hora_Fim) BETWEEN CONCAT(c.Data_Inicio,' ',c.Hora_Inicio) AND CONCAT(c.Data_Fim,' ',c.Hora_Fim) OR 
	CONCAT(c.Data_Inicio,' ',c.Hora_Inicio) BETWEEN CONCAT(d.Data_Inicio,' ',d.Hora_Inicio) AND CONCAT(d.Data_Fim,' ',d.Hora_Fim) OR 
        CONCAT(c.Data_Fim,' ',c.Hora_Fim) BETWEEN CONCAT(d.Data_Inicio,' ',d.Hora_Inicio) AND CONCAT(d.Data_Fim,' ',d.Hora_Fim) 
) 
order by a.Nom_UserName";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'][] = $rs->fields[0];
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
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['gbt_disponiveis']) && !empty($this->NM_ajax_info['select_html']['gbt_disponiveis']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['gbt_disponiveis'];
          }
          $this->NM_ajax_info['fldList']['gbt_disponiveis'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-gbt_disponiveis',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['gbt_disponiveis']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['gbt_disponiveis']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['gbt_disponiveis']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['gbt_disponiveis']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['gbt_disponiveis']['labList'] = $aLabel;
          }
   }

          //----- confirmgbtdisponclick
   function ajax_return_values_confirmgbtdisponclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("confirmgbtdisponclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->confirmgbtdisponclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['confirmgbtdisponclick'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- stepempreendimento
   function ajax_return_values_stepempreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stepempreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stepempreendimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stepempreendimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- stepoperadora
   function ajax_return_values_stepoperadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stepoperadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stepoperadora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stepoperadora'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- stepprestadora
   function ajax_return_values_stepprestadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stepprestadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stepprestadora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stepprestadora'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- stepagendamento
   function ajax_return_values_stepagendamento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stepagendamento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stepagendamento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stepagendamento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- stepdescricao
   function ajax_return_values_stepdescricao($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("stepdescricao", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->stepdescricao);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['stepdescricao'] = array(
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

          //----- id_empreendimento
   function ajax_return_values_id_empreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_empreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_empreendimento);
              $aLookup = array();
              $this->_tmp_lookup_id_empreendimento = $this->id_empreendimento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento 
FROM tb_empreendimentos 
WHERE ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "' 
ORDER BY Nom_Empreendimento";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_empreendimento\"";
          if (isset($this->NM_ajax_info['select_html']['id_empreendimento']) && !empty($this->NM_ajax_info['select_html']['id_empreendimento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_empreendimento'];
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

                  if ($this->id_empreendimento == $sValue)
                  {
                      $this->_tmp_lookup_id_empreendimento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_empreendimento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_empreendimento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_empreendimento']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
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
          }
   }

          //----- id_condomino
   function ajax_return_values_id_condomino($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_condomino", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_condomino);
              $aLookup = array();
              $this->_tmp_lookup_id_condomino = $this->id_condomino;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'] = array(); 
}
$aLookup[] = array(form_CadSAE_pack_protect_string('') => form_CadSAE_pack_protect_string('GLOBALBLUE'));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT ID_Condomino, Nom_Nome 
FROM tb_condominos 
WHERE ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "' 
AND Nom_Nome != ''
AND Num_Ativo = 'S' 
ORDER BY Nom_Nome";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_condomino\"";
          if (isset($this->NM_ajax_info['select_html']['id_condomino']) && !empty($this->NM_ajax_info['select_html']['id_condomino']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_condomino'];
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

                  if ($this->id_condomino == $sValue)
                  {
                      $this->_tmp_lookup_id_condomino = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_condomino'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_condomino']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_condomino']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_condomino']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_condomino']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_condomino']['labList'] = $aLabel;
          }
   }

          //----- nom_responsavel1
   function ajax_return_values_nom_responsavel1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_responsavel1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_responsavel1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_responsavel1'] = array(
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

          //----- id_torre
   function ajax_return_values_id_torre($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_torre", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_torre);
              $aLookup = array();
              $this->_tmp_lookup_id_torre = $this->id_torre;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'] = array(); 
}
$aLookup[] = array(form_CadSAE_pack_protect_string('') => form_CadSAE_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'][] = '';
if ($this->id_condomino != "")
{ 
   $this->nm_clear_val("id_condomino");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, a.Nom_Torre 
FROM tb_torre a 
INNER JOIN tb_andar b ON b.ID_Torre = a.ID 
INNER JOIN tb_conjunto c ON c.ID_Andar = b.ID 
INNER JOIN tb_ocupacao d ON d.ID_Conjunto = c.ID 
WHERE d.ID_Condomino = '$this->id_condomino' 
GROUP BY ID 
ORDER BY Nom_Torre";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_torre\"";
          if (isset($this->NM_ajax_info['select_html']['id_torre']) && !empty($this->NM_ajax_info['select_html']['id_torre']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_torre'];
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

                  if ($this->id_torre == $sValue)
                  {
                      $this->_tmp_lookup_id_torre = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_torre'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_torre']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_torre']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_torre']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_torre']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_torre']['labList'] = $aLabel;
          }
   }

          //----- id_andar
   function ajax_return_values_id_andar($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_andar", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_andar);
              $aLookup = array();
              $this->_tmp_lookup_id_andar = $this->id_andar;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'] = array(); 
}
$aLookup[] = array(form_CadSAE_pack_protect_string('') => form_CadSAE_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'][] = '';
if ($this->id_condomino != "")
{ 
   $this->nm_clear_val("id_condomino");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, a.Nom_Andar
FROM tb_andar a 
INNER JOIN tb_conjunto c ON c.ID_Andar = a.ID 
INNER JOIN tb_ocupacao d ON d.ID_Conjunto = c.ID 
WHERE a.ID_Torre = '$this->id_torre' AND 
d.ID_Condomino = '$this->id_condomino' 
GROUP BY a.ID 
ORDER BY cast(a.Nom_Andar as unsigned)";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_andar\"";
          if (isset($this->NM_ajax_info['select_html']['id_andar']) && !empty($this->NM_ajax_info['select_html']['id_andar']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_andar'];
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

                  if ($this->id_andar == $sValue)
                  {
                      $this->_tmp_lookup_id_andar = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_andar'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_andar']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_andar']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_andar']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_andar']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_andar']['labList'] = $aLabel;
          }
   }

          //----- id_conjunto
   function ajax_return_values_id_conjunto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_conjunto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_conjunto);
              $aLookup = array();
              $this->_tmp_lookup_id_conjunto = $this->id_conjunto;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'] = array(); 
}
$aLookup[] = array(form_CadSAE_pack_protect_string('') => form_CadSAE_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'][] = '';
if ($this->id_condomino != "")
{ 
   $this->nm_clear_val("id_condomino");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, a.Nom_Conjunto
FROM tb_conjunto a 
INNER JOIN tb_ocupacao d ON d.ID_Conjunto = a.ID 
WHERE a.ID_Andar = '$this->id_andar' AND 
d.ID_Condomino = '$this->id_condomino' 
GROUP BY a.ID 
ORDER BY cast(a.Nom_Conjunto as unsigned)";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_conjunto\"";
          if (isset($this->NM_ajax_info['select_html']['id_conjunto']) && !empty($this->NM_ajax_info['select_html']['id_conjunto']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_conjunto'];
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

                  if ($this->id_conjunto == $sValue)
                  {
                      $this->_tmp_lookup_id_conjunto = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_conjunto'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_conjunto']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_conjunto']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_conjunto']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_conjunto']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_conjunto']['labList'] = $aLabel;
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'] = array(); 
}
$aLookup[] = array(form_CadSAE_pack_protect_string('0') => form_CadSAE_pack_protect_string('' . $this->Ini->Nm_lang['lang_label_notspecify'] . ''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID_Operadoras, a.Nom_Operadoras 
FROM tb_operadoras a 
" . $_SESSION['SQL_ope'] . " 
ORDER BY a.Nom_Operadoras";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'][] = $rs->fields[0];
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
              $this->NM_ajax_info['fldList']['id_operadora']['valList'][$i] = form_CadSAE_pack_protect_string($v);
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

          //----- nom_responsavel2
   function ajax_return_values_nom_responsavel2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_responsavel2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_responsavel2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_responsavel2'] = array(
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

          //----- num_celular2
   function ajax_return_values_num_celular2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_celular2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_celular2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_celular2'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- id_prestador
   function ajax_return_values_id_prestador($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_prestador", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_prestador);
              $aLookup = array();
              $this->_tmp_lookup_id_prestador = $this->id_prestador;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'] = array(); 
}
$aLookup[] = array(form_CadSAE_pack_protect_string('0') => form_CadSAE_pack_protect_string('' . $this->Ini->Nm_lang['lang_label_notspecify'] . ''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'][] = '0';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID_Prestador, b.Nom_RazaoSocial 
FROM tb_infoprestadores a 
" . $_SESSION['SQL_pre'] . " 
Group BY a.ID_Prestador";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadSAE_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_prestador\"";
          if (isset($this->NM_ajax_info['select_html']['id_prestador']) && !empty($this->NM_ajax_info['select_html']['id_prestador']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_prestador'];
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

                  if ($this->id_prestador == $sValue)
                  {
                      $this->_tmp_lookup_id_prestador = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_prestador'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_prestador']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_prestador']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_prestador']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_prestador']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_prestador']['labList'] = $aLabel;
          }
   }

          //----- nom_responsavel3
   function ajax_return_values_nom_responsavel3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_responsavel3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_responsavel3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_responsavel3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_telefone3
   function ajax_return_values_num_telefone3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_telefone3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_telefone3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_telefone3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_celular3
   function ajax_return_values_num_celular3($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_celular3", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_celular3);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_celular3'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

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

          //----- id_tiposae
   function ajax_return_values_id_tiposae($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_tiposae", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_tiposae);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_tiposae'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
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

$aLookup[] = array(form_CadSAE_pack_protect_string('S') => form_CadSAE_pack_protect_string(""));
$aLookup[] = array(form_CadSAE_pack_protect_string('N') => form_CadSAE_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_emergencial'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_emergencial'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['emergencial']) && !empty($this->NM_ajax_info['select_html']['emergencial']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['emergencial'];
          }
          $this->NM_ajax_info['fldList']['emergencial'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-emergencial',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['emergencial']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['emergencial']['valList'][$i] = form_CadSAE_pack_protect_string($v);
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

          //----- instalacaoantena
   function ajax_return_values_instalacaoantena($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("instalacaoantena", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->instalacaoantena);
              $aLookup = array();
              $this->_tmp_lookup_instalacaoantena = $this->instalacaoantena;

$aLookup[] = array(form_CadSAE_pack_protect_string('S') => form_CadSAE_pack_protect_string(""));
$aLookup[] = array(form_CadSAE_pack_protect_string('N') => form_CadSAE_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_instalacaoantena'][] = 'S';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_instalacaoantena'][] = 'N';
          $aLookupOrig = $aLookup;
          $sOptComp = "";
          if (isset($this->NM_ajax_info['select_html']['instalacaoantena']) && !empty($this->NM_ajax_info['select_html']['instalacaoantena']))
          {
              $sOptComp = $this->NM_ajax_info['select_html']['instalacaoantena'];
          }
          $this->NM_ajax_info['fldList']['instalacaoantena'] = array(
                       'row'    => '',
               'type'    => 'checkbox',
               'valList' => explode(';', $sTmpValue),
               'colNum'  => 1,
               'optComp'  => $sOptComp,
               'optClass' => 'sc-ui-checkbox-instalacaoantena',
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['instalacaoantena']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['instalacaoantena']['valList'][$i] = form_CadSAE_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['instalacaoantena']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['instalacaoantena']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['instalacaoantena']['labList'] = $aLabel;
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
               'valList' => array($this->form_encode_input($sTmpValue)),
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
               'valList' => array($this->form_encode_input($sTmpValue)),
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

          //----- desc
   function ajax_return_values_desc($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("desc", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->desc);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['desc'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- tecoperadora
   function ajax_return_values_tecoperadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tecoperadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tecoperadora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tecoperadora'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- tecprestadora
   function ajax_return_values_tecprestadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tecprestadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tecprestadora);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tecprestadora'] = array(
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

          //----- tipo_cliente
   function ajax_return_values_tipo_cliente($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("tipo_cliente", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->tipo_cliente);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['tipo_cliente'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- label_pas
   function ajax_return_values_label_pas($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("label_pas", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->label_pas);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['label_pas'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- os_info
   function ajax_return_values_os_info($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("os_info", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->os_info);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['os_info'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- sendanaliseonclick
   function ajax_return_values_sendanaliseonclick($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sendanaliseonclick", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sendanaliseonclick);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['sendanaliseonclick'] = array(
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_linkProjeto)) {$this->sc_temp_linkProjeto = (isset($_SESSION['linkProjeto'])) ? $_SESSION['linkProjeto'] : "";}
if (!isset($this->sc_temp_OptanteGBTec)) {$this->sc_temp_OptanteGBTec = (isset($_SESSION['OptanteGBTec'])) ? $_SESSION['OptanteGBTec'] : "";}
if (!isset($this->sc_temp_Emergencial)) {$this->sc_temp_Emergencial = (isset($_SESSION['Emergencial'])) ? $_SESSION['Emergencial'] : "";}
if (!isset($this->sc_temp_InstalacaoAntena)) {$this->sc_temp_InstalacaoAntena = (isset($_SESSION['InstalacaoAntena'])) ? $_SESSION['InstalacaoAntena'] : "";}
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
if (!isset($this->sc_temp_SQL_ope)) {$this->sc_temp_SQL_ope = (isset($_SESSION['SQL_ope'])) ? $_SESSION['SQL_ope'] : "";}
if (!isset($this->sc_temp_SQL_pre)) {$this->sc_temp_SQL_pre = (isset($_SESSION['SQL_pre'])) ? $_SESSION['SQL_pre'] : "";}
if (!isset($this->sc_temp_Num_SAE)) {$this->sc_temp_Num_SAE = (isset($_SESSION['Num_SAE'])) ? $_SESSION['Num_SAE'] : "";}
if (!isset($this->sc_temp_listGBTDisp)) {$this->sc_temp_listGBTDisp = (isset($_SESSION['listGBTDisp'])) ? $_SESSION['listGBTDisp'] : "";}
if (!isset($this->sc_temp_ID_TipoSAE)) {$this->sc_temp_ID_TipoSAE = (isset($_SESSION['ID_TipoSAE'])) ? $_SESSION['ID_TipoSAE'] : "";}
if (!isset($this->sc_temp_language)) {$this->sc_temp_language = (isset($_SESSION['language'])) ? $_SESSION['language'] : "";}
                                                                         ?><?php sc_include_library('sys', 'initCustom', 'onLoad.html');?><?php   
sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession(true);
sc_include_library("sys", "models", "Projetos.php"); $_Projetos = new Projetos($this);

$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['delete'] = $this->nmgp_botoes["delete"] = "off";;
$this->NM_ajax_info['buttonDisplay']['stepEmpreendimento'] = $this->nmgp_botoes["stepEmpreendimento"] = "off";;
$this->NM_ajax_info['buttonDisplay']['stepOperadora'] = $this->nmgp_botoes["stepOperadora"] = "off";;
$this->NM_ajax_info['buttonDisplay']['stepPrestadora'] = $this->nmgp_botoes["stepPrestadora"] = "off";;
$this->NM_ajax_info['buttonDisplay']['stepAgendamento'] = $this->nmgp_botoes["stepAgendamento"] = "off";;
$this->NM_ajax_info['buttonDisplay']['stepDescricao'] = $this->nmgp_botoes["stepDescricao"] = "off";;
$this->NM_ajax_info['buttonDisplay']['stepTecnicos'] = $this->nmgp_botoes["stepTecnicos"] = "off";;
$_SESSION['hticnsdata']['sc_apl_conf']['form_TecnicosOperadoraSAE']['start'] = 'new';
$_SESSION['hticnsdata']['sc_apl_conf']['form_TecnicosPrestadoraSAE']['start'] = 'new';
$this->sc_field_readonly("optantegbtec", 'on');

echo $s->getMessage(true);
echo $s->getIUDState($this);

$disabledFields = ['#id_sc_field_id_empreendimento', '[name="gbt_disponiveis[]"]', '[name="gbt_selecionados[]"]'];
$disabledFieldsByAttr = [];
$removeDisabledFieldsByAttr = $removeDisabledFields = [];
$removeStatusList = [];
array_push($disabledFieldsByAttr, "#id_sc_field_pontodeencontro"); 

$TipoUsuario = $s->get("Num_TipoUsuario");
$profile = $s->get("profile");
$Contexto_Tipo = $s->get("Contexto_Tipo");
$Contexto_ID_OPE = $s->get("Contexto_ID_OPE");

 
      $nm_select = "SELECT (CASE
		  WHEN '$this->sc_temp_language' = 'pt_br' THEN Nom_SAE
		  WHEN '$this->sc_temp_language' = 'es' THEN Nom_SAE_es
		  WHEN '$this->sc_temp_language' = 'en_us' THEN Nom_SAE_en
		END) as Nom_SAE, Code_SAE FROM tb_tipossae WHERE ID = '$this->sc_temp_ID_TipoSAE'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->datatiposae = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->datatiposae = false;
          $this->datatiposae_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->datatiposae );
 
$this->id_empreendimento  = $this->id_empreendimento  ? $this->id_empreendimento  : $this->sc_temp_ID_Empreendimento;

if (isset($profile["SAE"])) {
    if ($this->nmgp_opcao == "novo" && isset($profile["SAE"]["CRIAR"]["v"]) && $profile["SAE"]["CRIAR"]["v"] == "S" || 
       $this->nmgp_opcao == "igual" && isset($profile["SAE"]["EDITAR"]["v"]) && $profile["SAE"]["EDITAR"]["v"] == "S") {
        if ($this->nmgp_opcao == "novo") {
            $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
        } else {
            $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "on";;
        }
    } else {
        $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
        array_push($disabledFields, "input, select");
        array_push($disabledFieldsByAttr, "textarea");
    }

    if (isset($profile["SAE"]["DELETAR"]["v"]) && $profile["SAE"]["DELETAR"]["v"] == "S") {
        $this->NM_ajax_info['buttonDisplay']['removeLogic'] = $this->nmgp_botoes["removeLogic"] = "on";;
    } else {
        $this->NM_ajax_info['buttonDisplay']['removeLogic'] = $this->nmgp_botoes["removeLogic"] = "off";;
    }
    
    if (isset($profile["SAE"]["SUBMITSTATUS"]["v"]) && $profile["SAE"]["SUBMITSTATUS"]["v"] == "S"){
        $sBtnSubmitStatus = true;
        array_push($removeDisabledFields, "#id_sc_field_num_status");
    } else {
        $sBtnSubmitStatus = false;
        array_push($disabledFields, "#id_sc_field_num_status");	
    }
    if (isset($profile["SAE"]["DELEGATEGBT"]["v"]) && $profile["SAE"]["DELEGATEGBT"]["v"] == "S"){
        $sBtnGBT = true;
    } else {
        $sBtnGBT = false;
        $this->nmgp_cmp_hidden["gbt_sae"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_sae'] = 'off';
        $this->nmgp_cmp_hidden["gbt_disponiveis"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_disponiveis'] = 'off';
    }
    if (isset($profile["SAE"]["EXPORTPDF"]["v"]) && $profile["SAE"]["EXPORTPDF"]["v"] == "S") {
        $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes["exportPDF"] = "on";;
    } else {
        $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes["exportPDF"] = "off";;
    }   
} else {
     if (isset($this->sc_temp_language)) { $_SESSION['language'] = $this->sc_temp_language;}
 if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
 if (isset($this->sc_temp_listGBTDisp)) { $_SESSION['listGBTDisp'] = $this->sc_temp_listGBTDisp;}
 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (isset($this->sc_temp_SQL_pre)) { $_SESSION['SQL_pre'] = $this->sc_temp_SQL_pre;}
 if (isset($this->sc_temp_SQL_ope)) { $_SESSION['SQL_ope'] = $this->sc_temp_SQL_ope;}
 if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
 if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
 if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
 if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
 if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_sae') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
}

$listGBTDisp = "''";
 if (isset($listGBTDisp)) {$this->sc_temp_listGBTDisp = $listGBTDisp;}
;

if ($this->nmgp_opcao == 'novo') {
    $this->num_status   = 'AE';
    $this->nmgp_cmp_hidden["id_torre"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_torre'] = 'off';
    $this->nmgp_cmp_hidden["id_andar"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_andar'] = 'off';
    $this->nmgp_cmp_hidden["id_conjunto"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_conjunto'] = 'off';
    
    $Num_SAE =$this->calcNumSAE($this->datatiposae [0]["Code_SAE"]);
    $this->num_sae   = $Num_SAE;
     if (isset($Num_SAE)) {$this->sc_temp_Num_SAE = $Num_SAE;}
;
    
    $this->id_tiposae   = $this->sc_temp_ID_TipoSAE;
    $this->instalacaoantena   = $this->sc_temp_InstalacaoAntena;
    $this->emergencial   = $this->sc_temp_Emergencial;
    $this->id_usuario   = $s->get("ID_Usuario");
    $this->optantegbtec   = $this->sc_temp_OptanteGBTec;
    $this->referenteprojeto   = $this->sc_temp_linkProjeto;
	
    if ($TipoUsuario) {
        if ($TipoUsuario == "O") {
            $this->id_operadora   = $s->get("ID_OPE"); $this->sc_field_readonly("id_operadora", 'on'); 
            $this->nom_responsavel2   = $s->get("Nom_Nome"); $this->sc_field_readonly("nom_responsavel2", 'on'); 
            $this->num_telefone2   = $s->get("Num_TelefoneComercial");
            $this->num_celular2   = $s->get("Num_TelefoneCelular");
        } else if ($TipoUsuario == "P") {
            $this->id_prestador   = $s->get("ID_OPE"); $this->sc_field_readonly("id_prestador", 'on'); 
            $this->nom_responsavel3   = $s->get("Nom_Nome"); $this->sc_field_readonly("nom_responsavel3", 'on');
            $this->num_telefone3   = $s->get("Num_TelefoneComercial");
            $this->num_celular3   = $s->get("Num_TelefoneCelular");
        }
    }
    $this->Ini->nm_hidden_blocos[0] = "off"; $this->NM_ajax_info['blockDisplay']['0'] = 'off';
	$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
	$this->Ini->nm_hidden_blocos[7] = "off"; $this->NM_ajax_info['blockDisplay']['7'] = 'off';
    echo "<style>#id_tabs_0_0 {display:none}</style>";
	
	 
      $nm_select = "SELECT PontoDeEncontro FROM tb_empreendimentos WHERE ID_Empreendimento = '$this->id_empreendimento'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rspontodeencontro = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rspontodeencontro = false;
          $this->rspontodeencontro_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->rspontodeencontro );
	$this->rspontodeencontro  = isset($this->rspontodeencontro [0]) ? $this->rspontodeencontro [0]["PontoDeEncontro"] : "";
	$this->pontodeencontro  = $this->rspontodeencontro ;
} else {
    if ($this->referenteprojeto ) {
        $this->nmgp_cmp_hidden["referenteprojeto"] = "on"; $this->NM_ajax_info['fieldDisplay']['referenteprojeto'] = 'on';
		$this->nmgp_cmp_hidden["label_dataexpiracaoprojeto"] = "on"; $this->NM_ajax_info['fieldDisplay']['label_dataexpiracaoprojeto'] = 'on';
		$this->sc_field_readonly("referenteprojeto", 'on');
		$this->label_dataexpiracaoprojeto  = $_Projetos->getDataExpiracao($this->referenteprojeto );
    } else {
		$this->nmgp_cmp_hidden["referenteprojeto"] = "off"; $this->NM_ajax_info['fieldDisplay']['referenteprojeto'] = 'off';
		$this->nmgp_cmp_hidden["label_dataexpiracaoprojeto"] = "off"; $this->NM_ajax_info['fieldDisplay']['label_dataexpiracaoprojeto'] = 'off';
	}

    if ($this->tipo_cliente  == 'G') {
        $this->nmgp_cmp_hidden["id_torre"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_torre'] = 'off';
        $this->nmgp_cmp_hidden["id_andar"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_andar'] = 'off';
        $this->nmgp_cmp_hidden["id_conjunto"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_conjunto'] = 'off';
    } else {
          
      $nm_select = "SELECT a.ID as Torre, b.ID as Andar, c.ID as Conjunto FROM tb_torre a
         INNER JOIN tb_andar b ON b.ID_Torre = a.ID
         INNER JOIN tb_conjunto c ON c.ID_Andar = b.ID 
         WHERE c.ID = '$this->id_conjunto'"; 
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
            $this->id_torre   = $this->rs [0]["Torre"];
            $this->id_andar   = $this->rs [0]["Andar"];
            $this->id_conjunto   = $this->rs [0]["Conjunto"];
        }
    }
    if ($TipoUsuario == "O") {
        $this->sc_field_readonly("id_operadora", 'on');
        $this->sc_field_readonly("nom_responsavel2", 'on');
    } else if ($TipoUsuario == "P") {
        $this->sc_field_readonly("id_prestador", 'on');
        $this->sc_field_readonly("nom_responsavel3", 'on');
    } else if ($TipoUsuario == "G") {
        $this->nmgp_cmp_hidden["gbt_selecionados"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_selecionados'] = 'off';
    }
            
    if($this->num_status == 'C') { 
		$this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes["exportPDF"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['confirmeEnviarSAE'] = $this->nmgp_botoes["confirmeEnviarSAE"] = "off";;
        $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
        $this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
        $this->nmgp_cmp_hidden["gbt_sae"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_sae'] = 'off';
        $this->nmgp_cmp_hidden["gbt_selecionados"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_selecionados'] = 'off';
		$this->nmgp_cmp_hidden["data_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_fechamento'] = 'off';
		$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
        $removeStatusList = ['AE'];
        array_push($disabledFields, "input, select");
        array_push($disabledFieldsByAttr, "textarea"); 
        array_push($removeDisabledFields, "#id_read_off_gbt_sae select");
        $hideTabAgenda = true;
	} else if($this->num_status == 'RAE') {  
        $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes["exportPDF"] = "off";;
        $this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
        $this->nmgp_cmp_hidden["gbt_sae"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_sae'] = 'off';
        $this->nmgp_cmp_hidden["gbt_selecionados"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_selecionados'] = 'off';
		$this->nmgp_cmp_hidden["data_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_fechamento'] = 'off';
		$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
		$sBtnSubmitStatus = false;
		$this->sc_field_readonly("num_status", 'on');
		$removeStatusList = ['AE'];
		if ($this->id_usuario  != $s->get("ID_Usuario")) {
			$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
		}
	} else if($this->num_status == 'AE') { 
		$this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes["exportPDF"] = "off";;
		$this->nmgp_cmp_hidden["id_usuario_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_usuario_fechamento'] = 'off';
		$this->nmgp_cmp_hidden["gbt_sae"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_sae'] = 'off';
		$this->nmgp_cmp_hidden["gbt_disponiveis"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_disponiveis'] = 'off';
		$this->nmgp_cmp_hidden["data_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_fechamento'] = 'off';
		$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
		$this->sc_field_readonly("num_status", 'on');
		$sBtnSubmitStatus = false;
		if ($this->id_usuario  != $s->get("ID_Usuario")) {
			$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
		}
    } else if($this->num_status == 'AA') { 
		$removeStatusList = ['AE'];
		$disableCalendar = true;
		$hideTabAgenda = true;
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['confirmeEnviarSAE'] = $this->nmgp_botoes["confirmeEnviarSAE"] = "off";;
		$this->nmgp_cmp_hidden["data_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_fechamento'] = 'off';
		$this->nmgp_cmp_hidden["id_usuario_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_usuario_fechamento'] = 'off';
		$this->nmgp_cmp_hidden["gbt_disponiveis"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_disponiveis'] = 'off';
		$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
		$this->Ini->nm_hidden_blocos[8] = "off"; $this->NM_ajax_info['blockDisplay']['8'] = 'off';
		array_push($disabledFields, "input, select");
		array_push($disabledFieldsByAttr, "textarea"); 
		array_push($removeDisabledFields, "#id_read_off_gbt_sae select");
		$eventSAE = [
			"Di" => $this->data_inicio ,
			"Hi" => $this->hora_inicio  ?: "00:00:00",
			"Df" => $this->data_fim ,
			"Hf" => $this->hora_fim  ?: "23:59:00"
		];
		$freeGBT =$this->getGBTDisp($eventSAE);
		$listGBTDisp = [];
		foreach($freeGBT as $gbt) {
			array_push($listGBTDisp, $gbt["ID_Usuario"]);
		}
		$listGBTDisp = implode(",", $listGBTDisp);
		$listGBTDisp = $listGBTDisp ? $listGBTDisp : "0";
		 if (isset($listGBTDisp)) {$this->sc_temp_listGBTDisp = $listGBTDisp;}
;
	} else if($this->num_status == 'AP') { 
		$removeStatusList = ['AE'];
		$disableCalendar = true;
		$hideTabAgenda = true;
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['confirmeEnviarSAE'] = $this->nmgp_botoes["confirmeEnviarSAE"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
		$this->nmgp_cmp_hidden["gbt_disponiveis"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_disponiveis'] = 'off';
		$this->nmgp_cmp_hidden["data_fechamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['data_fechamento'] = 'off';
		$this->os_info  =$this->getOsInfo();
		array_push($disabledFields, "input, select");
		array_push($disabledFieldsByAttr, "textarea"); 
		array_push($removeDisabledFields, "#id_read_off_gbt_sae select");
		array_push($removeDisabledFields, "#id_sc_field_os_real_data_inicio, [name=sc_clone_os_real_data_inicio]");
		array_push($removeDisabledFields, "#id_sc_field_os_real_data_fim, [name=sc_clone_os_real_data_fim]");
		array_push($removeDisabledFields, "#id_sc_field_os_real_horas");
		$eventSAE = [
			"Di" => $this->data_inicio ,
			"Hi" => $this->hora_inicio  ?: "00:00:00",
			"Df" => $this->data_fim ,
			"Hf" => $this->hora_fim  ?: "23:59:00"
		];
		$freeGBT =$this->getGBTDisp($eventSAE);
		$listGBTDisp = [];
		foreach($freeGBT as $gbt) {
			array_push($listGBTDisp, $gbt["ID_Usuario"]);
		}
		$listGBTDisp = implode(",", $listGBTDisp);
		$listGBTDisp = $listGBTDisp ? $listGBTDisp : "0";
		 if (isset($listGBTDisp)) {$this->sc_temp_listGBTDisp = $listGBTDisp;}
;
	} else if($this->num_status == 'A') { 
		$removeStatusList = ['AE'];
		$disableCalendar = true;
		$hideTabAgenda = true;
		$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes["remover"] = "off";;
		$this->NM_ajax_info['buttonDisplay']['confirmeEnviarSAE'] = $this->nmgp_botoes["confirmeEnviarSAE"] = "off";;
		$this->nmgp_cmp_hidden["gbt_disponiveis"] = "off"; $this->NM_ajax_info['fieldDisplay']['gbt_disponiveis'] = 'off';
		$this->os_info  =$this->getOsInfo();
		array_push($disabledFields, "input, select");
		array_push($disabledFieldsByAttr, "textarea"); 
		array_push($removeDisabledFields, "#id_read_off_gbt_sae select");
		array_push($removeDisabledFields, "#id_sc_field_os_real_data_inicio, [name=sc_clone_os_real_data_inicio]");
		array_push($removeDisabledFields, "#id_sc_field_os_real_data_fim, [name=sc_clone_os_real_data_fim]");
		array_push($removeDisabledFields, "#id_sc_field_os_real_horas");
		$eventSAE = [
			"Di" => $this->data_inicio ,
			"Hi" => $this->hora_inicio  ?: "00:00:00",
			"Df" => $this->data_fim ,
			"Hf" => $this->hora_fim  ?: "23:59:00"
		];
		$freeGBT =$this->getGBTDisp($eventSAE);
		$listGBTDisp = [];
		foreach($freeGBT as $gbt) {
			array_push($listGBTDisp, $gbt["ID_Usuario"]);
		}
		$listGBTDisp = implode(",", $listGBTDisp);
		$listGBTDisp = $listGBTDisp ? $listGBTDisp : "0";
		 if (isset($listGBTDisp)) {$this->sc_temp_listGBTDisp = $listGBTDisp;}
;
	}
    
    if ($this->datatiposae [0]["Code_SAE"] == "manutencao") {
        array_push($removeStatusList, 'R');
    }
    
    $Num_SAE = $this->num_sae ;
     if (isset($Num_SAE)) {$this->sc_temp_Num_SAE = $Num_SAE;}
;
}

$SAEcode = $this->datatiposae [0]["Code_SAE"];
if (is_array($this->emergencial  )) {
    $this->emergencial   = $this->emergencial  [0];
}

$this->tiposae   = $this->datatiposae [0]["Nom_SAE"].($this->instalacaoantena   == "S" ? " (Antena)" : ($this->emergencial   == "S" ? " (Emergencial)" : ""));


if ($TipoUsuario == "O") {
    $SQL_ope = "WHERE a.ID_Operadoras = '$this->id_operadora'"; 
    $SQL_pre = "INNER JOIN tb_prestadores b ON b.ID_Prestador = a.ID_Prestador
        WHERE a.ID_Operadora = '$this->id_operadora' AND a.Num_Ativo = 'S' AND  b.Num_Ativo = 'S' ";
} else if ($TipoUsuario == "P") {
    $SQL_ope = "INNER JOIN tb_infoprestadores b ON b.ID_Operadora = a.ID_Operadoras
        WHERE b.ID_Prestador = '".$s->get("ID_OPE")."' AND a.Num_Status = 'S' AND (('G' = '".$Contexto_Tipo."') OR ('O' = '".$Contexto_Tipo."' AND b.ID_Operadora = '".$Contexto_ID_OPE."'))";
    $SQL_pre = "INNER JOIN tb_prestadores b ON b.ID_Prestador = a.ID_Prestador
        INNER JOIN tb_infoprestadores c ON c.ID_Prestador = '$this->id_prestador'
        WHERE c.ID_Operadora = a.ID_Operadora AND a.Num_Ativo = 'S' AND  b.Num_Ativo = 'S' AND (('G' = '".$Contexto_Tipo."') OR ('O' = '".$Contexto_Tipo."' AND c.ID_Operadora = '".$Contexto_ID_OPE."'))";
} else if ($TipoUsuario == "G" || $TipoUsuario == "GT") {
    $SQL_ope = "WHERE a.Num_Status = 'S'";
    $SQL_pre = "INNER JOIN tb_prestadores b ON b.ID_Prestador = a.ID_Prestador
        WHERE a.Num_Ativo = 'S' AND b.Num_Ativo = 'S' ";
} else {
    $SQL_ope = "WHERE a.ID_Operadoras = '$this->id_operadora'";
    $SQL_pre = "INNER JOIN tb_prestadores b ON b.ID_Prestador = a.ID_Prestador 
    WHERE a.ID_Prestador = '$this->id_prestador' AND a.Num_Ativo = 'S' AND b.Num_Ativo = 'S' ";
}
 if (isset($SQL_pre)) {$this->sc_temp_SQL_pre = $SQL_pre;}
;
 if (isset($SQL_ope)) {$this->sc_temp_SQL_ope = $SQL_ope;}
;

$this->onLoadJS([
    'disabledFields' => $disabledFields,
    'disabledFieldsByAttr' => $disabledFieldsByAttr,
    'removeDisabledFieldsByAttr' => $removeDisabledFieldsByAttr,
    'removeDisabledFields' => $removeDisabledFields,
    'removeStatusList' => isset($removeStatusList) ? $removeStatusList : [],
    'sBtnGBT' => isset($sBtnGBT) ? $sBtnGBT : false,
    'sBtnSubmitStatus' => isset($sBtnSubmitStatus) ? $sBtnSubmitStatus : false,
    'disableCalendar' => false,
    'loadStepsSAE' => $this->nmgp_opcao == 'novo',
    'hideTabAgenda' => isset($hideTabAgenda) ? $hideTabAgenda : false,
	'showPAS' => $this->nmgp_opcao != 'novo'
]); 

$htmlSugestao = "
	<style>
		#sugestao {
			display: inline-block;
		}
		#sugestao .menu-sugestao {
			text-align: center;
		}
		.titulo-sugestao {
			font-size: 18px;
			margin-right: 20px;
		}
		.titulo-sugestao a:hover {
			text-decoration: none;
		}
		.a-sugestao {
			cursor: pointer;
			color: #8492a6;
		}
		.div-sugestao {
			display: none;
			vertical-align: top;
			margin-right: 30px
		}
		.div-sugestao ul {
			padding-left: 20px;
		}
		.div-menusugestao {
			display: inline-grid;
		}
		.div-selected-sugestao {
			display: inline-block;
		}
		.a-selected-sugestao {
			font-size: 25px;
		}
	</style>
";
if (!$hideTabAgenda) {
	$events =$this->getFreeTime();
	$s->set(["SAECalendarEvents" => $events["interval"]]);
	if (count($events["interval"])) {
		$painelSugestao = array();
		
		foreach ($events["interval"] as $i => $interval) {
			$mY = date("m/Y", strtotime($interval[0]));
			if (!isset($painelSugestao[$mY])) $painelSugestao[$mY] = ($i > 0 ? "</ul>" : "")."<ul>";
			$painelSugestao[$mY] .= "<li><a data-di='".$interval[0]."' data-df='".$interval[1]."' class='a-sugestao' onclick='setSugestao(this)'>".
				date("d/m/Y H:i", strtotime($interval[0]))." - ".date("d/m/Y H:i", strtotime($interval[1])).": <strong>".
				"(".convertNumberInStringHour(convertHourInNumberInt(strtotime($interval[0]), strtotime($interval[1]))).
			" horas)</strong></a></li>";
		}
		$painelSugestao[$mY] .= "<ul>";
		
		$htmlSugestao .= "<div id='sugestao'><div class='menu-sugestao'>";
		$counter = 0;
		foreach ($painelSugestao as $mY => $html) { 
			$htmlSugestao .= "<strong class='titulo-sugestao'><a data-mes='$mY' class='a-sugestao ".($counter == 0 ? "a-selected-sugestao" : "")."' onclick='changeSugestao(this)'>$mY</a></strong>";
			$counter++;
		}
		$htmlSugestao .= "</div>";
		$counter = 0;
		foreach ($painelSugestao as $mY => $html) { 
			$htmlSugestao .= "<div class='div-sugestao ".($counter == 0 ? "div-selected-sugestao" : "")."' data-mes='$mY'>$html</div>";
			$counter++;
		}
		$htmlSugestao .= "</div>";
	} else {
		$htmlSugestao = "Não há intervalos disponíveis";
	}
}
$this->sugestaoagenda  = $htmlSugestao;

$sqlNom_Empreendimento = "SELECT Nom_Empreendimento 
    FROM tb_empreendimentos 
    WHERE ID_Empreendimento = '$this->sc_temp_ID_Empreendimento'";
 
      $nm_select = $sqlNom_Empreendimento; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->nom_empreendimento = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->nom_empreendimento = false;
          $this->nom_empreendimento_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->nom_empreendimento );

if (isset($this->nom_empreendimento [0]["Nom_Empreendimento"])) {
    $this->nom_empreendimento  = $this->nom_empreendimento [0]["Nom_Empreendimento"];
} else $this->nom_empreendimento  = "";
	$crumb = [ $this->Ini->Nm_lang['lang_label_breadcrumb_sae'] ];
if ($this->nmgp_opcao == "novo") {
    $crumb[1] = "<i>". $this->Ini->Nm_lang['lang_label_upc_newSAE'] . ": ".$this->tiposae ." - ".$this->num_sae ." ".($this->nom_empreendimento  ? " - ".$this->nom_empreendimento  : "")."</i>";
} else if ($this->nmgp_opcao == "igual") {
    $crumb[1] = $this->num_sae ." - ".$this->tiposae ." ".($this->nom_empreendimento  ? " - ".$this->nom_empreendimento  : "")."</i>";
}

echo "
    <script>
        loadBreadcrumb(['".$crumb[0]."',`".$crumb[1]."`]);
		console.log(".json_encode($events).");
    </script>
";
if (isset($this->sc_temp_language)) { $_SESSION['language'] = $this->sc_temp_language;}
if (isset($this->sc_temp_ID_TipoSAE)) { $_SESSION['ID_TipoSAE'] = $this->sc_temp_ID_TipoSAE;}
if (isset($this->sc_temp_listGBTDisp)) { $_SESSION['listGBTDisp'] = $this->sc_temp_listGBTDisp;}
if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
if (isset($this->sc_temp_SQL_pre)) { $_SESSION['SQL_pre'] = $this->sc_temp_SQL_pre;}
if (isset($this->sc_temp_SQL_ope)) { $_SESSION['SQL_ope'] = $this->sc_temp_SQL_ope;}
if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
if (isset($this->sc_temp_OptanteGBTec)) { $_SESSION['OptanteGBTec'] = $this->sc_temp_OptanteGBTec;}
if (isset($this->sc_temp_linkProjeto)) { $_SESSION['linkProjeto'] = $this->sc_temp_linkProjeto;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
      }
      if (empty($this->data_abertura))
      {
          $this->data_abertura_hora = $this->data_abertura;
      }
      if (empty($this->data_fechamento))
      {
          $this->data_fechamento_hora = $this->data_fechamento;
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
      $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         sc_include_library("sys", "functions", "functions.php");
$this->data_abertura  = date('Y-m-d H:i:s');
$this->num_ativo  = 'S';

 
      $nm_select = "SELECT PontoDeEncontro FROM tb_empreendimentos WHERE ID_Empreendimento = '$this->id_empreendimento'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rspontodeencontro = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rspontodeencontro = false;
          $this->rspontodeencontro_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rspontodeencontro );
$this->rspontodeencontro  = isset($this->rspontodeencontro [0]) ? $this->rspontodeencontro [0]["PontoDeEncontro"] : "";
$this->pontodeencontro  = $this->rspontodeencontro ;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_HorarioAlterado)) {$this->sc_temp_HorarioAlterado = (isset($_SESSION['HorarioAlterado'])) ? $_SESSION['HorarioAlterado'] : "";}
                                                                         sc_include_library("sys", "models", "Sae.php");
$_Sae = new Sae($this);

$Sae = (object) $_Sae->getById(intval($this->id ));
$HorarioAlterado = !($Sae->Data_Inicio == $this->data_inicio  &&
   $Sae->Hora_Inicio == $this->hora_inicio  &&
   $Sae->Data_Fim == $this->data_fim  &&
   $Sae->Hora_Fim == $this->hora_fim ) ? 1 : 0;
 if (isset($HorarioAlterado)) {$this->sc_temp_HorarioAlterado = $HorarioAlterado;}
;
if (isset($this->sc_temp_HorarioAlterado)) { $_SESSION['HorarioAlterado'] = $this->sc_temp_HorarioAlterado;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
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
      $NM_val_form['tiposae'] = $this->tiposae;
      $NM_val_form['num_sae'] = $this->num_sae;
      $NM_val_form['referenteprojeto'] = $this->referenteprojeto;
      $NM_val_form['label_dataexpiracaoprojeto'] = $this->label_dataexpiracaoprojeto;
      $NM_val_form['id_usuario'] = $this->id_usuario;
      $NM_val_form['data_abertura'] = $this->data_abertura;
      $NM_val_form['resumoagendastatus'] = $this->resumoagendastatus;
      $NM_val_form['data_fechamento'] = $this->data_fechamento;
      $NM_val_form['id_usuario_fechamento'] = $this->id_usuario_fechamento;
      $NM_val_form['optantegbtec'] = $this->optantegbtec;
      $NM_val_form['num_status'] = $this->num_status;
      $NM_val_form['gbt_sae'] = $this->gbt_sae;
      $NM_val_form['savestatusonclick'] = $this->savestatusonclick;
      $NM_val_form['savegbtonclick'] = $this->savegbtonclick;
      $NM_val_form['gbt_selecionados'] = $this->gbt_selecionados;
      $NM_val_form['gbt_disponiveis'] = $this->gbt_disponiveis;
      $NM_val_form['confirmgbtdisponclick'] = $this->confirmgbtdisponclick;
      $NM_val_form['stepempreendimento'] = $this->stepempreendimento;
      $NM_val_form['stepoperadora'] = $this->stepoperadora;
      $NM_val_form['stepprestadora'] = $this->stepprestadora;
      $NM_val_form['stepagendamento'] = $this->stepagendamento;
      $NM_val_form['stepdescricao'] = $this->stepdescricao;
      $NM_val_form['removeronclick'] = $this->removeronclick;
      $NM_val_form['num_ativo'] = $this->num_ativo;
      $NM_val_form['id_empreendimento'] = $this->id_empreendimento;
      $NM_val_form['id_condomino'] = $this->id_condomino;
      $NM_val_form['nom_responsavel1'] = $this->nom_responsavel1;
      $NM_val_form['num_telefone1'] = $this->num_telefone1;
      $NM_val_form['id_torre'] = $this->id_torre;
      $NM_val_form['id_andar'] = $this->id_andar;
      $NM_val_form['id_conjunto'] = $this->id_conjunto;
      $NM_val_form['id_operadora'] = $this->id_operadora;
      $NM_val_form['nom_responsavel2'] = $this->nom_responsavel2;
      $NM_val_form['num_telefone2'] = $this->num_telefone2;
      $NM_val_form['num_celular2'] = $this->num_celular2;
      $NM_val_form['id_prestador'] = $this->id_prestador;
      $NM_val_form['nom_responsavel3'] = $this->nom_responsavel3;
      $NM_val_form['num_telefone3'] = $this->num_telefone3;
      $NM_val_form['num_celular3'] = $this->num_celular3;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['id_tiposae'] = $this->id_tiposae;
      $NM_val_form['emergencial'] = $this->emergencial;
      $NM_val_form['instalacaoantena'] = $this->instalacaoantena;
      $NM_val_form['data_inicio'] = $this->data_inicio;
      $NM_val_form['hora_inicio'] = $this->hora_inicio;
      $NM_val_form['data_fim'] = $this->data_fim;
      $NM_val_form['hora_fim'] = $this->hora_fim;
      $NM_val_form['pontodeencontro'] = $this->pontodeencontro;
      $NM_val_form['desc'] = $this->desc;
      $NM_val_form['tecoperadora'] = $this->tecoperadora;
      $NM_val_form['tecprestadora'] = $this->tecprestadora;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['tipo_cliente'] = $this->tipo_cliente;
      $NM_val_form['label_pas'] = $this->label_pas;
      $NM_val_form['os_info'] = $this->os_info;
      $NM_val_form['sendanaliseonclick'] = $this->sendanaliseonclick;
      $NM_val_form['empreendimentofuncionamento'] = $this->empreendimentofuncionamento;
      $NM_val_form['resumoagenda'] = $this->resumoagenda;
      $NM_val_form['sugestaoagenda'] = $this->sugestaoagenda;
      if ($this->id == "")  
      { 
          $this->id = 0;
          $this->sc_force_zero[] = 'id';
      } 
      if ($this->id_tiposae == "")  
      { 
          $this->id_tiposae = 0;
          $this->sc_force_zero[] = 'id_tiposae';
      } 
      if ($this->id_empreendimento == "")  
      { 
          $this->id_empreendimento = 0;
          $this->sc_force_zero[] = 'id_empreendimento';
      } 
      if ($this->id_condomino == "")  
      { 
          $this->id_condomino = 0;
          $this->sc_force_zero[] = 'id_condomino';
      } 
      if ($this->id_conjunto == "")  
      { 
          $this->id_conjunto = 0;
          $this->sc_force_zero[] = 'id_conjunto';
      } 
      if ($this->id_operadora == "")  
      { 
          $this->id_operadora = 0;
          $this->sc_force_zero[] = 'id_operadora';
      } 
      if ($this->id_prestador == "")  
      { 
          $this->id_prestador = 0;
          $this->sc_force_zero[] = 'id_prestador';
      } 
      if ($this->id_usuario == "")  
      { 
          $this->id_usuario = 0;
          $this->sc_force_zero[] = 'id_usuario';
      } 
      if ($this->id_usuario_fechamento == "")  
      { 
          $this->id_usuario_fechamento = 0;
          $this->sc_force_zero[] = 'id_usuario_fechamento';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          if ($this->tipo_cliente == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tipo_cliente = "null"; 
              $NM_val_null[] = "tipo_cliente";
          } 
          $this->nom_responsavel1_before_qstr = $this->nom_responsavel1;
          $this->nom_responsavel1 = substr($this->Db->qstr($this->nom_responsavel1), 1, -1); 
          if ($this->nom_responsavel1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_responsavel1 = "null"; 
              $NM_val_null[] = "nom_responsavel1";
          } 
          $this->num_telefone1_before_qstr = $this->num_telefone1;
          $this->num_telefone1 = substr($this->Db->qstr($this->num_telefone1), 1, -1); 
          if ($this->num_telefone1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefone1 = "null"; 
              $NM_val_null[] = "num_telefone1";
          } 
          $this->nom_responsavel2_before_qstr = $this->nom_responsavel2;
          $this->nom_responsavel2 = substr($this->Db->qstr($this->nom_responsavel2), 1, -1); 
          if ($this->nom_responsavel2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_responsavel2 = "null"; 
              $NM_val_null[] = "nom_responsavel2";
          } 
          $this->num_telefone2_before_qstr = $this->num_telefone2;
          $this->num_telefone2 = substr($this->Db->qstr($this->num_telefone2), 1, -1); 
          if ($this->num_telefone2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefone2 = "null"; 
              $NM_val_null[] = "num_telefone2";
          } 
          $this->num_celular2_before_qstr = $this->num_celular2;
          $this->num_celular2 = substr($this->Db->qstr($this->num_celular2), 1, -1); 
          if ($this->num_celular2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_celular2 = "null"; 
              $NM_val_null[] = "num_celular2";
          } 
          $this->nom_responsavel3_before_qstr = $this->nom_responsavel3;
          $this->nom_responsavel3 = substr($this->Db->qstr($this->nom_responsavel3), 1, -1); 
          if ($this->nom_responsavel3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_responsavel3 = "null"; 
              $NM_val_null[] = "nom_responsavel3";
          } 
          $this->num_telefone3_before_qstr = $this->num_telefone3;
          $this->num_telefone3 = substr($this->Db->qstr($this->num_telefone3), 1, -1); 
          if ($this->num_telefone3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefone3 = "null"; 
              $NM_val_null[] = "num_telefone3";
          } 
          $this->num_celular3_before_qstr = $this->num_celular3;
          $this->num_celular3 = substr($this->Db->qstr($this->num_celular3), 1, -1); 
          if ($this->num_celular3 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_celular3 = "null"; 
              $NM_val_null[] = "num_celular3";
          } 
          if ($this->instalacaoantena == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instalacaoantena = "null"; 
              $NM_val_null[] = "instalacaoantena";
          } 
          if ($this->emergencial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->emergencial = "null"; 
              $NM_val_null[] = "emergencial";
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
          $this->desc_before_qstr = $this->desc;
          $this->desc = substr($this->Db->qstr($this->desc), 1, -1); 
          if ($this->desc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->desc = "null"; 
              $NM_val_null[] = "desc";
          } 
          $this->num_sae_before_qstr = $this->num_sae;
          $this->num_sae = substr($this->Db->qstr($this->num_sae), 1, -1); 
          if ($this->num_sae == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_sae = "null"; 
              $NM_val_null[] = "num_sae";
          } 
          if ($this->data_abertura == "")  
          { 
              $this->data_abertura = "null"; 
              $NM_val_null[] = "data_abertura";
          } 
          if ($this->num_status == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_status = "null"; 
              $NM_val_null[] = "num_status";
          } 
          if ($this->data_fechamento == "")  
          { 
              $this->data_fechamento = "null"; 
              $NM_val_null[] = "data_fechamento";
          } 
          if ($this->num_ativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_ativo = "null"; 
              $NM_val_null[] = "num_ativo";
          } 
          if ($this->optantegbtec == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->optantegbtec = "null"; 
              $NM_val_null[] = "optantegbtec";
          } 
          $this->pontodeencontro_before_qstr = $this->pontodeencontro;
          $this->pontodeencontro = substr($this->Db->qstr($this->pontodeencontro), 1, -1); 
          if ($this->pontodeencontro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->pontodeencontro = "null"; 
              $NM_val_null[] = "pontodeencontro";
          } 
          $this->referenteprojeto_before_qstr = $this->referenteprojeto;
          $this->referenteprojeto = substr($this->Db->qstr($this->referenteprojeto), 1, -1); 
          if ($this->referenteprojeto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->referenteprojeto = "null"; 
              $NM_val_null[] = "referenteprojeto";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_CadSAE_pack_ajax_response();
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = #$this->data_inicio#, Hora_Inicio = #$this->hora_inicio#, Data_Fim = #$this->data_fim#, Hora_Fim = #$this->hora_fim#, `Desc` = '$this->desc', Data_Abertura = '$this->data_abertura', Num_Status = '$this->num_status', Data_Fechamento = '$this->data_fechamento', ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", `Desc` = '$this->desc', Data_Abertura = '$this->data_abertura', Num_Status = '$this->num_status', Data_Fechamento = '$this->data_fechamento', ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", `Desc` = '$this->desc', Data_Abertura = TO_DATE('$this->data_abertura', 'yyyy-mm-dd hh24:mi:ss'), Num_Status = '$this->num_status', Data_Fechamento = TO_DATE('$this->data_fechamento', 'yyyy-mm-dd hh24:mi:ss'), ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = EXTEND('$this->data_inicio', YEAR TO DAY), Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = EXTEND('$this->data_fim', YEAR TO DAY), Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", `Desc` = '$this->desc', Data_Abertura = '$this->data_abertura', Num_Status = '$this->num_status', Data_Fechamento = '$this->data_fechamento', ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", `Desc` = '$this->desc', Data_Abertura = '$this->data_abertura', Num_Status = '$this->num_status', Data_Fechamento = '$this->data_fechamento', ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", `Desc` = '$this->desc', Data_Abertura = '$this->data_abertura', Num_Status = '$this->num_status', Data_Fechamento = '$this->data_fechamento', ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ID_TipoSAE = $this->id_tiposae, ID_Empreendimento = $this->id_empreendimento, ID_Condomino = $this->id_condomino, ID_Conjunto = $this->id_conjunto, ID_Operadora = $this->id_operadora, ID_Prestador = $this->id_prestador, ID_Usuario = $this->id_usuario, Tipo_Cliente = '$this->tipo_cliente', Nom_Responsavel1 = '$this->nom_responsavel1', Num_Telefone1 = '$this->num_telefone1', Nom_Responsavel2 = '$this->nom_responsavel2', Num_Telefone2 = '$this->num_telefone2', Num_Celular2 = '$this->num_celular2', Nom_Responsavel3 = '$this->nom_responsavel3', Num_Telefone3 = '$this->num_telefone3', Num_Celular3 = '$this->num_celular3', InstalacaoAntena = '$this->instalacaoantena', Emergencial = '$this->emergencial', Data_Inicio = " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", Hora_Inicio = " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", Data_Fim = " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", Hora_Fim = " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", `Desc` = '$this->desc', Data_Abertura = '$this->data_abertura', Num_Status = '$this->num_status', Data_Fechamento = '$this->data_fechamento', ID_Usuario_Fechamento = $this->id_usuario_fechamento, Num_Ativo = '$this->num_ativo', OptanteGBTec = '$this->optantegbtec', PontoDeEncontro = '$this->pontodeencontro', ReferenteProjeto = '$this->referenteprojeto'";  
              } 
              $aDoNotUpdate = array();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  $comando = $comando_oracle;  
                  $SC_ex_update = $SC_ex_upd_or;
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE Num_SAE = '$this->num_sae' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE Num_SAE = '$this->num_sae' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE Num_SAE = '$this->num_sae' ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE Num_SAE = '$this->num_sae' ";  
              }  
              else  
              {
                  $comando .= " WHERE Num_SAE = '$this->num_sae' ";  
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
                                  form_CadSAE_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
          $this->nom_responsavel1 = $this->nom_responsavel1_before_qstr;
          $this->num_telefone1 = $this->num_telefone1_before_qstr;
          $this->nom_responsavel2 = $this->nom_responsavel2_before_qstr;
          $this->num_telefone2 = $this->num_telefone2_before_qstr;
          $this->num_celular2 = $this->num_celular2_before_qstr;
          $this->nom_responsavel3 = $this->nom_responsavel3_before_qstr;
          $this->num_telefone3 = $this->num_telefone3_before_qstr;
          $this->num_celular3 = $this->num_celular3_before_qstr;
          $this->desc = $this->desc_before_qstr;
          $this->num_sae = $this->num_sae_before_qstr;
          $this->pontodeencontro = $this->pontodeencontro_before_qstr;
          $this->referenteprojeto = $this->referenteprojeto_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_tiposae'])) { $this->id_tiposae = $NM_val_form['id_tiposae']; }
              elseif (isset($this->id_tiposae)) { $this->nm_limpa_alfa($this->id_tiposae); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_empreendimento'])) { $this->id_empreendimento = $NM_val_form['id_empreendimento']; }
              elseif (isset($this->id_empreendimento)) { $this->nm_limpa_alfa($this->id_empreendimento); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_condomino'])) { $this->id_condomino = $NM_val_form['id_condomino']; }
              elseif (isset($this->id_condomino)) { $this->nm_limpa_alfa($this->id_condomino); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_conjunto'])) { $this->id_conjunto = $NM_val_form['id_conjunto']; }
              elseif (isset($this->id_conjunto)) { $this->nm_limpa_alfa($this->id_conjunto); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_operadora'])) { $this->id_operadora = $NM_val_form['id_operadora']; }
              elseif (isset($this->id_operadora)) { $this->nm_limpa_alfa($this->id_operadora); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_prestador'])) { $this->id_prestador = $NM_val_form['id_prestador']; }
              elseif (isset($this->id_prestador)) { $this->nm_limpa_alfa($this->id_prestador); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_usuario'])) { $this->id_usuario = $NM_val_form['id_usuario']; }
              elseif (isset($this->id_usuario)) { $this->nm_limpa_alfa($this->id_usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_responsavel1'])) { $this->nom_responsavel1 = $NM_val_form['nom_responsavel1']; }
              elseif (isset($this->nom_responsavel1)) { $this->nm_limpa_alfa($this->nom_responsavel1); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefone1'])) { $this->num_telefone1 = $NM_val_form['num_telefone1']; }
              elseif (isset($this->num_telefone1)) { $this->nm_limpa_alfa($this->num_telefone1); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_responsavel2'])) { $this->nom_responsavel2 = $NM_val_form['nom_responsavel2']; }
              elseif (isset($this->nom_responsavel2)) { $this->nm_limpa_alfa($this->nom_responsavel2); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefone2'])) { $this->num_telefone2 = $NM_val_form['num_telefone2']; }
              elseif (isset($this->num_telefone2)) { $this->nm_limpa_alfa($this->num_telefone2); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_celular2'])) { $this->num_celular2 = $NM_val_form['num_celular2']; }
              elseif (isset($this->num_celular2)) { $this->nm_limpa_alfa($this->num_celular2); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_responsavel3'])) { $this->nom_responsavel3 = $NM_val_form['nom_responsavel3']; }
              elseif (isset($this->nom_responsavel3)) { $this->nm_limpa_alfa($this->nom_responsavel3); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefone3'])) { $this->num_telefone3 = $NM_val_form['num_telefone3']; }
              elseif (isset($this->num_telefone3)) { $this->nm_limpa_alfa($this->num_telefone3); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_celular3'])) { $this->num_celular3 = $NM_val_form['num_celular3']; }
              elseif (isset($this->num_celular3)) { $this->nm_limpa_alfa($this->num_celular3); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_sae'])) { $this->num_sae = $NM_val_form['num_sae']; }
              elseif (isset($this->num_sae)) { $this->nm_limpa_alfa($this->num_sae); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_usuario_fechamento'])) { $this->id_usuario_fechamento = $NM_val_form['id_usuario_fechamento']; }
              elseif (isset($this->id_usuario_fechamento)) { $this->nm_limpa_alfa($this->id_usuario_fechamento); }
              if     (isset($NM_val_form) && isset($NM_val_form['pontodeencontro'])) { $this->pontodeencontro = $NM_val_form['pontodeencontro']; }
              elseif (isset($this->pontodeencontro)) { $this->nm_limpa_alfa($this->pontodeencontro); }
              if     (isset($NM_val_form) && isset($NM_val_form['referenteprojeto'])) { $this->referenteprojeto = $NM_val_form['referenteprojeto']; }
              elseif (isset($this->referenteprojeto)) { $this->nm_limpa_alfa($this->referenteprojeto); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('tiposae', 'num_sae', 'referenteprojeto', 'label_dataexpiracaoprojeto', 'id_usuario', 'data_abertura', 'resumoagendastatus', 'data_fechamento', 'id_usuario_fechamento', 'optantegbtec', 'num_status', 'gbt_sae', 'savestatusonclick', 'savegbtonclick', 'gbt_selecionados', 'gbt_disponiveis', 'confirmgbtdisponclick', 'stepempreendimento', 'stepoperadora', 'stepprestadora', 'stepagendamento', 'stepdescricao', 'removeronclick', 'num_ativo', 'id_empreendimento', 'id_condomino', 'nom_responsavel1', 'num_telefone1', 'id_torre', 'id_andar', 'id_conjunto', 'id_operadora', 'nom_responsavel2', 'num_telefone2', 'num_celular2', 'id_prestador', 'nom_responsavel3', 'num_telefone3', 'num_celular3', 'id', 'id_tiposae', 'emergencial', 'instalacaoantena', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'pontodeencontro', 'desc', 'tecoperadora', 'tecprestadora', 'savedataonclick', 'tipo_cliente', 'label_pas', 'os_info', 'sendanaliseonclick'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
          $sc_campos_sel_look  = array();
          $sc_campos_form_look = array();
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, Num_SAE, ID_Usuario, ID_Agenda from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, Num_SAE, ID_Usuario, ID_Agenda from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select \"ID\", \"Num_SAE\", \"ID_Usuario\", \"ID_Agenda\" from tb_saetecgb where \"Num_SAE\" = '$this->num_sae'"; 
          }  
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, Num_SAE, ID_Usuario, ID_Agenda from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
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
              $sc_campos_sel_look[$sc_ind]['Num_SAE'] = $rss->fields[1];
              $sc_campos_sel_look[$sc_ind]['ID_Usuario'] = $rss->fields[2];
              $sc_campos_sel_look[$sc_ind]['ID_Agenda'] = $rss->fields[3];
              $sc_ind++; 
              $rss->MoveNext() ; 
          } 
          $rss->Close(); 
          $todo_gbt_sae = explode("@?@", $this->gbt_sae); 
          if (!empty($todo_gbt_sae))  
          { 
              $sc_ind = 0; 
              foreach ($todo_gbt_sae as $gbt_saex) 
              {
                  if (!empty($gbt_saex))  
                  { 
                      $sc_campos_form_look[$sc_ind] = array();
                      $sc_campos_form_look[$sc_ind]['num_sae'] = $this->num_sae;
                      $sc_campos_form_look[$sc_ind]['gbt_sae'] = $gbt_saex;
                 } 
                 $sc_ind++; 
              } 
         } 
         foreach ($sc_campos_form_look as $sc_ind_form => $sc_campos_form) 
         { 
             foreach ($sc_campos_sel_look as $sc_ind_sel => $sc_campos_sel) 
             { 
                 if ($sc_campos_form['num_sae'] == $sc_campos_sel['Num_SAE'] && $sc_campos_form['gbt_sae'] == $sc_campos_sel['ID_Usuario'])
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
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_saetecgb where \"Num_SAE\" = '" . $sc_campos_sel['Num_SAE'] . "' and \"ID_Usuario\" = '" . $sc_campos_sel['ID_Usuario'] . "'"; 
              } 
              else 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_saetecgb where Num_SAE = '" . $sc_campos_sel['Num_SAE'] . "' and ID_Usuario = '" . $sc_campos_sel['ID_Usuario'] . "'"; 
              } 
              $rdel = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
              if ($rdel === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_CadSAE_pack_ajax_response();
                  }
                  exit; 
              } 
              $rdel->Close(); 
         }
         foreach ($sc_campos_form_look as $sc_ind_form => $sc_campos_form) 
         { 
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
             { 
                 $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_saetecgb (\"Num_SAE\", \"ID_Usuario\") values ('" . $sc_campos_form['num_sae'] . "', '" . $sc_campos_form['gbt_sae'] . "')"; 
             } 
             else 
             { 
                 $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_saetecgb (Num_SAE, ID_Usuario) values ('" . $sc_campos_form['num_sae'] . "', '" . $sc_campos_form['gbt_sae'] . "')"; 
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
                         form_CadSAE_pack_ajax_response();
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key'] as $sFKName => $sFKValue)
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
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 0) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_pkey']); 
              $this->nmgp_opcao = "nada"; 
              $GLOBALS["erro_incl"] = 1; 
              $bInsertOk = false;
              $this->sc_evento = 'insert';
          } 
          $rs1->Close(); 
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_CadSAE_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto) VALUES ($this->id_tiposae, $this->id_empreendimento, $this->id_condomino, $this->id_conjunto, $this->id_operadora, $this->id_prestador, $this->id_usuario, '$this->tipo_cliente', '$this->nom_responsavel1', '$this->num_telefone1', '$this->nom_responsavel2', '$this->num_telefone2', '$this->num_celular2', '$this->nom_responsavel3', '$this->num_telefone3', '$this->num_celular3', '$this->instalacaoantena', '$this->emergencial', #$this->data_inicio#, #$this->hora_inicio#, #$this->data_fim#, #$this->hora_fim#, '$this->desc', '$this->num_sae', '$this->data_abertura', '$this->num_status', '$this->data_fechamento', $this->id_usuario_fechamento, '$this->num_ativo', '$this->optantegbtec', '$this->pontodeencontro', '$this->referenteprojeto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto) VALUES (" . $NM_seq_auto . "$this->id_tiposae, $this->id_empreendimento, $this->id_condomino, $this->id_conjunto, $this->id_operadora, $this->id_prestador, $this->id_usuario, '$this->tipo_cliente', '$this->nom_responsavel1', '$this->num_telefone1', '$this->nom_responsavel2', '$this->num_telefone2', '$this->num_celular2', '$this->nom_responsavel3', '$this->num_telefone3', '$this->num_celular3', '$this->instalacaoantena', '$this->emergencial', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->desc', '$this->num_sae', '$this->data_abertura', '$this->num_status', '$this->data_fechamento', $this->id_usuario_fechamento, '$this->num_ativo', '$this->optantegbtec', '$this->pontodeencontro', '$this->referenteprojeto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto) VALUES (" . $NM_seq_auto . "$this->id_tiposae, $this->id_empreendimento, $this->id_condomino, $this->id_conjunto, $this->id_operadora, $this->id_prestador, $this->id_usuario, '$this->tipo_cliente', '$this->nom_responsavel1', '$this->num_telefone1', '$this->nom_responsavel2', '$this->num_telefone2', '$this->num_celular2', '$this->nom_responsavel3', '$this->num_telefone3', '$this->num_celular3', '$this->instalacaoantena', '$this->emergencial', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->desc', '$this->num_sae', TO_DATE('$this->data_abertura', 'yyyy-mm-dd hh24:mi:ss'), '$this->num_status', TO_DATE('$this->data_fechamento', 'yyyy-mm-dd hh24:mi:ss'), $this->id_usuario_fechamento, '$this->num_ativo', '$this->optantegbtec', '$this->pontodeencontro', '$this->referenteprojeto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto) VALUES (" . $NM_seq_auto . "$this->id_tiposae, $this->id_empreendimento, $this->id_condomino, $this->id_conjunto, $this->id_operadora, $this->id_prestador, $this->id_usuario, '$this->tipo_cliente', '$this->nom_responsavel1', '$this->num_telefone1', '$this->nom_responsavel2', '$this->num_telefone2', '$this->num_celular2', '$this->nom_responsavel3', '$this->num_telefone3', '$this->num_celular3', '$this->instalacaoantena', '$this->emergencial', EXTEND('$this->data_inicio', YEAR TO DAY), " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", EXTEND('$this->data_fim', YEAR TO DAY), " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->desc', '$this->num_sae', '$this->data_abertura', '$this->num_status', '$this->data_fechamento', $this->id_usuario_fechamento, '$this->num_ativo', '$this->optantegbtec', '$this->pontodeencontro', '$this->referenteprojeto')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto) VALUES (" . $NM_seq_auto . "$this->id_tiposae, $this->id_empreendimento, $this->id_condomino, $this->id_conjunto, $this->id_operadora, $this->id_prestador, $this->id_usuario, '$this->tipo_cliente', '$this->nom_responsavel1', '$this->num_telefone1', '$this->nom_responsavel2', '$this->num_telefone2', '$this->num_celular2', '$this->nom_responsavel3', '$this->num_telefone3', '$this->num_celular3', '$this->instalacaoantena', '$this->emergencial', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->desc', '$this->num_sae', '$this->data_abertura', '$this->num_status', '$this->data_fechamento', $this->id_usuario_fechamento, '$this->num_ativo', '$this->optantegbtec', '$this->pontodeencontro', '$this->referenteprojeto')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto) VALUES (" . $NM_seq_auto . "$this->id_tiposae, $this->id_empreendimento, $this->id_condomino, $this->id_conjunto, $this->id_operadora, $this->id_prestador, $this->id_usuario, '$this->tipo_cliente', '$this->nom_responsavel1', '$this->num_telefone1', '$this->nom_responsavel2', '$this->num_telefone2', '$this->num_celular2', '$this->nom_responsavel3', '$this->num_telefone3', '$this->num_celular3', '$this->instalacaoantena', '$this->emergencial', " . $this->Ini->date_delim . $this->data_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_inicio . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->data_fim . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->hora_fim . $this->Ini->date_delim1 . ", '$this->desc', '$this->num_sae', '$this->data_abertura', '$this->num_status', '$this->data_fechamento', $this->id_usuario_fechamento, '$this->num_ativo', '$this->optantegbtec', '$this->pontodeencontro', '$this->referenteprojeto')"; 
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
                              form_CadSAE_pack_ajax_response();
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
                          form_CadSAE_pack_ajax_response();
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
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          $todo_gbt_sae = explode("@?@", $this->gbt_sae); 
          if ($bInsertOk && !empty($todo_gbt_sae))  
          { 
              foreach ($todo_gbt_sae as $gbt_saex) 
              {
                  if (!empty($gbt_saex))  
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_saetecgb (\"Num_SAE\", \"ID_Usuario\") values ('$this->num_sae', '$gbt_saex')"; 
                      } 
                      else 
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_saetecgb (Num_SAE, ID_Usuario) values ('$this->num_sae', '$gbt_saex')"; 
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
                                  form_CadSAE_pack_ajax_response();
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
          $this->num_sae = substr($this->Db->qstr($this->num_sae), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae'"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae'"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae'"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae'"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae'"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
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
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_saetecgb where \"Num_SAE\" = '$this->num_sae'"; 
              } 
              else 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
              } 
              $rse = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_CadSAE_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
              }  
              else  
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where Num_SAE = '$this->num_sae' "); 
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
                          form_CadSAE_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']);
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
        $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_Num_SAE)) {$this->sc_temp_Num_SAE = (isset($_SESSION['Num_SAE'])) ? $_SESSION['Num_SAE'] : "";}
                                                                         sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
sc_include_library("sys", "functions", "validateEventCalendar.php");
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$m = new sendEmail();

$modelLogs->insert([
	"Modulo" => "SAE",
	"Funcao" => "CRIAR",
	"Descricao" => 'Cadastro de SAE',
	"Conteudo" => $modelLogs->getConteudo()
]);
$this->setGBTRandom();


$emailData = [
	"alert" => "good",
	"title" => "SAE <strong>$this->num_sae </strong><br>". $this->Ini->Nm_lang['lang_label_upc_created'] ,
	"content" => "
			Prezado(a), <br><br>
			Recebemos sua solicitação através do código <strong>$this->num_sae </strong>, que no momento será avaliada pela equipe da <strong>GLOBALBLUE</strong>. 
			Você receberá um novo comunicado sobre o andamento de sua solicitação.<br><br>
			O documento em formato PDF com todos os detalhes de sua solicitação está anexo nesse e-mail. <br><br>
			Lembrando que a sua solicitação está sujeita a reprovação, caso não atenda aos Normas e Procedimentos Técnicos do empreendimento.<br><br>
			:tableFooter:
		",
	"footer" => "SAE = Solicitação de Autorização de Entrada e Execução de Serviço<br>
		\"Documento necessário para liberar o acesso ao empreendimento, neste documento contém a descrição da atividade, o período, nome dos técnicos e responsáveis pela atividade\""
];
$html = emailTemplate($emailData);
$m->SUBJECT = "GLOBALBLUE | CNSDATA: SAE $this->num_sae  - CRIADA";
$m->MESSAGE = $html;
$listEmails =$this->getEmailNotif(["actSae" => "NOTIFCRIACAO"]);

$Num_SAE = $this->num_sae ;

if (count($listEmails) > 0) {
	$listEmails[] = "gabriel.soares@houseti.com.br";
	$m->BCC = $listEmails; 
	$m->ANEXO = $s->get("SAE_pdf_tmpdir") ??$this->generatePDF();
	$modelLogs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Descricao" => 'Notificação por e-mail (SAE)',
		"Conteudo" => ["Num_SAE" => $Num_SAE, "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
	]);
}

$s->setIUDState($this, "U", "success");
 if (isset($Num_SAE)) {$this->sc_temp_Num_SAE = $Num_SAE;}
;

if ($s->get("SAE_pdf_tmpdir")) {
	if (file_exists($s->get("SAE_pdf_tmpdir"))) unlink($s->get("SAE_pdf_tmpdir"));
	$s->destroy("SAE_pdf_tmpdir");
}

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadSAE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_HorarioAlterado)) {$this->sc_temp_HorarioAlterado = (isset($_SESSION['HorarioAlterado'])) ? $_SESSION['HorarioAlterado'] : "";}
                                                                         sc_include_library('sys', 'dompdf', 'dompdf.php');
sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
sc_include_library("sys", "functions", "validateEventCalendar.php");
sc_include_library('sys', 'functions', 'pdfSAE.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');

sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
sc_include_library('sys', 'models', 'Sae.php');
$_Sae = new Sae($this);
sc_include_library('sys', 'models', 'Saetecgb.php');
$_Saetecgb = new Saetecgb($this);
$m = new sendEmail();

$modelLogs->insert([
	"Modulo" => "SAE",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de SAE',
	"Conteudo" => $modelLogs->getConteudo()
]);

$this->sc_ajax_javascript('toastr.success', array('',  $this->Ini->Nm_lang['lang_label_updSuccess'] ));


if ($this->sc_temp_HorarioAlterado) {
	$tSae = DbQuery($this, "SELECT Code_SAE, Nom_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae'");
	$tSae = $tSae[0] ?? ["Code_SAE" => "", "Nom_SAE" => ""];

	$needGBT = (in_array($tSae["Code_SAE"], ["desinstalacao", "instalacao"]) || $this->optantegbtec  != "N");
	 unset($_SESSION['HorarioAlterado']);
 unset($this->sc_temp_HorarioAlterado);
;
	$Saetecgb = $_Saetecgb->getByNum_SAE($this->num_sae );
	if ($Saetecgb) {
		$listSaetecgb = array();
		foreach($Saetecgb as $row) {
			$listSaetecgb[] = $row["ID_Usuario"];
		}
	$this->setGBTRandom($listSaetecgb);
	} elseif ($needGBT) {
	$this->setGBTRandom();
	}
}

if ($s->get("SAE_pdf_tmpdir")) {
	if (file_exists($s->get("SAE_pdf_tmpdir"))) unlink($s->get("SAE_pdf_tmpdir"));
	$s->destroy("SAE_pdf_tmpdir");
}
if (isset($this->sc_temp_HorarioAlterado)) { $_SESSION['HorarioAlterado'] = $this->sc_temp_HorarioAlterado;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                          
      $nm_select = "DELETE FROM tb_tecsae WHERE Num_SAE = '$this->num_sae'"; 
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
 
      $nm_select = "DELETE a, b 
		FROM tb_saetecgb a 
		INNER JOIN tb_agenda b ON b.ID = a.ID_Agenda 
		WHERE a.Num_SAE = '$this->num_sae' 
		"; 
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
echo '<script>window.location = "../grid_sae";</script>';
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['parms'] = "num_sae?#?$this->num_sae?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->num_sae = substr($this->Db->qstr($this->num_sae), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID, ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, str_replace (convert(char(10),Data_Inicio,102), '.', '-') + ' ' + convert(char(8),Data_Inicio,20), str_replace (convert(char(10),Hora_Inicio,102), '.', '-') + ' ' + convert(char(8),Hora_Inicio,20), str_replace (convert(char(10),Data_Fim,102), '.', '-') + ' ' + convert(char(8),Data_Fim,20), str_replace (convert(char(10),Hora_Fim,102), '.', '-') + ' ' + convert(char(8),Hora_Fim,20), `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID, ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, convert(char(23),Data_Inicio,121), convert(char(23),Hora_Inicio,121), convert(char(23),Data_Fim,121), convert(char(23),Hora_Fim,121), `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID, ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, TO_DATE(TO_CHAR(Data_Abertura, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), Num_Status, TO_DATE(TO_CHAR(Data_Fechamento, 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss'), ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID, ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, EXTEND(Data_Inicio, YEAR TO DAY), Hora_Inicio, EXTEND(Data_Fim, YEAR TO DAY), Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID, ID_TipoSAE, ID_Empreendimento, ID_Condomino, ID_Conjunto, ID_Operadora, ID_Prestador, ID_Usuario, Tipo_Cliente, Nom_Responsavel1, Num_Telefone1, Nom_Responsavel2, Num_Telefone2, Num_Celular2, Nom_Responsavel3, Num_Telefone3, Num_Celular3, InstalacaoAntena, Emergencial, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, `Desc`, Num_SAE, Data_Abertura, Num_Status, Data_Fechamento, ID_Usuario_Fechamento, Num_Ativo, OptanteGBTec, PontoDeEncontro, ReferenteProjeto from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "Num_SAE = '" . $_SESSION['Num_SAE'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "Num_SAE = '$this->num_sae'"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "Num_SAE = '$this->num_sae'"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "Num_SAE = '$this->num_sae'"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "Num_SAE = '$this->num_sae'"; 
                  }  
                  else  
                  {
                     $aWhere[] = "Num_SAE = '$this->num_sae'"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "Num_SAE";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['voltar'] = $this->nmgp_botoes['voltar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes['exportPDF'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes['remover'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['confirmeEnviarSAE'] = $this->nmgp_botoes['confirmeEnviarSAE'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "on";
              $this->NM_ajax_info['buttonDisplay']['voltar'] = $this->nmgp_botoes['voltar'] = "on";
              $this->NM_ajax_info['buttonDisplay']['exportPDF'] = $this->nmgp_botoes['exportPDF'] = "off";
              $this->NM_ajax_info['buttonDisplay']['remover'] = $this->nmgp_botoes['remover'] = "off";
              $this->NM_ajax_info['buttonDisplay']['confirmeEnviarSAE'] = $this->nmgp_botoes['confirmeEnviarSAE'] = "off";
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
              $this->id_tiposae = $rs->fields[1] ; 
              $this->nmgp_dados_select['id_tiposae'] = $this->id_tiposae;
              $this->id_empreendimento = $rs->fields[2] ; 
              $this->nmgp_dados_select['id_empreendimento'] = $this->id_empreendimento;
              $this->id_condomino = $rs->fields[3] ; 
              $this->nmgp_dados_select['id_condomino'] = $this->id_condomino;
              $this->id_conjunto = $rs->fields[4] ; 
              $this->nmgp_dados_select['id_conjunto'] = $this->id_conjunto;
              $this->id_operadora = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_operadora'] = $this->id_operadora;
              $this->id_prestador = $rs->fields[6] ; 
              $this->nmgp_dados_select['id_prestador'] = $this->id_prestador;
              $this->id_usuario = $rs->fields[7] ; 
              $this->nmgp_dados_select['id_usuario'] = $this->id_usuario;
              $this->tipo_cliente = $rs->fields[8] ; 
              $this->nmgp_dados_select['tipo_cliente'] = $this->tipo_cliente;
              $this->nom_responsavel1 = $rs->fields[9] ; 
              $this->nmgp_dados_select['nom_responsavel1'] = $this->nom_responsavel1;
              $this->num_telefone1 = $rs->fields[10] ; 
              $this->nmgp_dados_select['num_telefone1'] = $this->num_telefone1;
              $this->nom_responsavel2 = $rs->fields[11] ; 
              $this->nmgp_dados_select['nom_responsavel2'] = $this->nom_responsavel2;
              $this->num_telefone2 = $rs->fields[12] ; 
              $this->nmgp_dados_select['num_telefone2'] = $this->num_telefone2;
              $this->num_celular2 = $rs->fields[13] ; 
              $this->nmgp_dados_select['num_celular2'] = $this->num_celular2;
              $this->nom_responsavel3 = $rs->fields[14] ; 
              $this->nmgp_dados_select['nom_responsavel3'] = $this->nom_responsavel3;
              $this->num_telefone3 = $rs->fields[15] ; 
              $this->nmgp_dados_select['num_telefone3'] = $this->num_telefone3;
              $this->num_celular3 = $rs->fields[16] ; 
              $this->nmgp_dados_select['num_celular3'] = $this->num_celular3;
              $this->instalacaoantena = $rs->fields[17] ; 
              $this->nmgp_dados_select['instalacaoantena'] = $this->instalacaoantena;
              $this->emergencial = $rs->fields[18] ; 
              $this->nmgp_dados_select['emergencial'] = $this->emergencial;
              $this->data_inicio = $rs->fields[19] ; 
              $this->nmgp_dados_select['data_inicio'] = $this->data_inicio;
              $this->hora_inicio = $rs->fields[20] ; 
              $this->nmgp_dados_select['hora_inicio'] = $this->hora_inicio;
              $this->data_fim = $rs->fields[21] ; 
              $this->nmgp_dados_select['data_fim'] = $this->data_fim;
              $this->hora_fim = $rs->fields[22] ; 
              $this->nmgp_dados_select['hora_fim'] = $this->hora_fim;
              $this->desc = $rs->fields[23] ; 
              $this->nmgp_dados_select['desc'] = $this->desc;
              $this->num_sae = $rs->fields[24] ; 
              $this->nmgp_dados_select['num_sae'] = $this->num_sae;
              $this->data_abertura = $rs->fields[25] ; 
              if (substr($this->data_abertura, 10, 1) == "-") 
              { 
                 $this->data_abertura = substr($this->data_abertura, 0, 10) . " " . substr($this->data_abertura, 11);
              } 
              if (substr($this->data_abertura, 13, 1) == ".") 
              { 
                 $this->data_abertura = substr($this->data_abertura, 0, 13) . ":" . substr($this->data_abertura, 14, 2) . ":" . substr($this->data_abertura, 17);
              } 
              $this->nmgp_dados_select['data_abertura'] = $this->data_abertura;
              $this->num_status = $rs->fields[26] ; 
              $this->nmgp_dados_select['num_status'] = $this->num_status;
              $this->data_fechamento = $rs->fields[27] ; 
              if (substr($this->data_fechamento, 10, 1) == "-") 
              { 
                 $this->data_fechamento = substr($this->data_fechamento, 0, 10) . " " . substr($this->data_fechamento, 11);
              } 
              if (substr($this->data_fechamento, 13, 1) == ".") 
              { 
                 $this->data_fechamento = substr($this->data_fechamento, 0, 13) . ":" . substr($this->data_fechamento, 14, 2) . ":" . substr($this->data_fechamento, 17);
              } 
              $this->nmgp_dados_select['data_fechamento'] = $this->data_fechamento;
              $this->id_usuario_fechamento = $rs->fields[28] ; 
              $this->nmgp_dados_select['id_usuario_fechamento'] = $this->id_usuario_fechamento;
              $this->num_ativo = $rs->fields[29] ; 
              $this->nmgp_dados_select['num_ativo'] = $this->num_ativo;
              $this->optantegbtec = $rs->fields[30] ; 
              $this->nmgp_dados_select['optantegbtec'] = $this->optantegbtec;
              $this->pontodeencontro = $rs->fields[31] ; 
              $this->nmgp_dados_select['pontodeencontro'] = $this->pontodeencontro;
              $this->referenteprojeto = $rs->fields[32] ; 
              $this->nmgp_dados_select['referenteprojeto'] = $this->referenteprojeto;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->id_tiposae = (string)$this->id_tiposae; 
              $this->id_empreendimento = (string)$this->id_empreendimento; 
              $this->id_condomino = (string)$this->id_condomino; 
              $this->id_conjunto = (string)$this->id_conjunto; 
              $this->id_operadora = (string)$this->id_operadora; 
              $this->id_prestador = (string)$this->id_prestador; 
              $this->id_usuario = (string)$this->id_usuario; 
              $this->id_usuario_fechamento = (string)$this->id_usuario_fechamento; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['parms'] = "num_sae?#?$this->num_sae?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['reg_start'] < $qt_geral_reg_form_CadSAE;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $this->gbt_sae = "";
          $this->gbt_sae_hidden = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, Num_SAE, ID_Usuario, ID_Agenda from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, Num_SAE, ID_Usuario, ID_Agenda from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select \"ID\", \"Num_SAE\", \"ID_Usuario\", \"ID_Agenda\" from tb_saetecgb where \"Num_SAE\" = '$this->num_sae'"; 
          }  
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, Num_SAE, ID_Usuario, ID_Agenda from tb_saetecgb where Num_SAE = '$this->num_sae'"; 
          }  
          $rss = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
          if ($rss === false && !$rss->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $this->gbt_sae = ""; 
          while (!$rss->EOF) 
          { 
                 $this->gbt_sae .= $rss->fields[2] . "@?@";
                 $this->gbt_sae_hidden .= $rss->fields[2] . "@?@";
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
              $this->id_tiposae = "";  
              $this->id_empreendimento = "";  
              $this->id_condomino = "";  
              $this->id_conjunto = "";  
              $this->id_operadora = "";  
              $this->id_prestador = "";  
              $this->id_usuario = "";  
              $this->tipo_cliente = "";  
              $this->nom_responsavel1 = "";  
              $this->num_telefone1 = "";  
              $this->nom_responsavel2 = "";  
              $this->num_telefone2 = "";  
              $this->num_celular2 = "";  
              $this->nom_responsavel3 = "";  
              $this->num_telefone3 = "";  
              $this->num_celular3 = "";  
              $this->instalacaoantena = "";  
              $this->emergencial = "";  
              $this->data_inicio = "";  
              $this->data_inicio_hora = "" ;  
              $this->hora_inicio = "";  
              $this->hora_inicio_hora = "" ;  
              $this->data_fim = "";  
              $this->data_fim_hora = "" ;  
              $this->hora_fim = "";  
              $this->hora_fim_hora = "" ;  
              $this->desc = "";  
              $this->num_sae = "";  
              $this->data_abertura = "";  
              $this->data_abertura_hora = "" ;  
              $this->num_status = "";  
              $this->data_fechamento = "";  
              $this->data_fechamento_hora = "" ;  
              $this->id_usuario_fechamento = "";  
              $this->num_ativo = "";  
              $this->optantegbtec = "";  
              $this->pontodeencontro = "";  
              $this->referenteprojeto = "";  
              $this->gbt_disponiveis = "";  
              $this->gbt_sae = "";  
              $this->gbt_selecionados = "";  
              $this->id_andar = "";  
              $this->id_torre = "";  
              $this->confirmgbtdisponclick = "";  
              $this->empreendimentofuncionamento = "";  
              $this->removeronclick = "";  
              $this->savedataonclick = "";  
              $this->savegbtonclick = "";  
              $this->savestatusonclick = "";  
              $this->sendanaliseonclick = "";  
              $this->stepagendamento = "";  
              $this->stepdescricao = "";  
              $this->stepempreendimento = "";  
              $this->stepoperadora = "";  
              $this->stepprestadora = "";  
              $this->tiposae = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['foreign_key'] as $sFKName => $sFKValue)
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
function ID_Condomino_onChange($id_condomino)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_id_condomino = $this->id_condomino;
$original_id_torre = $this->id_torre;
$original_id_andar = $this->id_andar;
$original_id_conjunto = $this->id_conjunto;
$original_id_condomino = $this->id_condomino;

if ($this->id_condomino  == '') {
	$this->nmgp_cmp_hidden["id_torre"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_torre'] = 'off';
	$this->nmgp_cmp_hidden["id_andar"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_andar'] = 'off';
	$this->nmgp_cmp_hidden["id_conjunto"] = "off"; $this->NM_ajax_info['fieldDisplay']['id_conjunto'] = 'off';
} else {
	$this->nmgp_cmp_hidden["id_torre"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_torre'] = 'on';
	$this->nmgp_cmp_hidden["id_andar"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_andar'] = 'on';
	$this->nmgp_cmp_hidden["id_conjunto"] = "on"; $this->NM_ajax_info['fieldDisplay']['id_conjunto'] = 'on';
}

$modificado_id_condomino = $this->id_condomino;
$modificado_id_torre = $this->id_torre;
$modificado_id_andar = $this->id_andar;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_condomino = $this->id_condomino;
$this->nm_formatar_campos('id_condomino', 'id_torre', 'id_andar', 'id_conjunto');
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_torre !== $modificado_id_torre || isset($this->nmgp_cmp_readonly['id_torre']) || (isset($bFlagRead_id_torre) && $bFlagRead_id_torre))
{
    $this->ajax_return_values_id_torre(true);
}
if ($original_id_andar !== $modificado_id_andar || isset($this->nmgp_cmp_readonly['id_andar']) || (isset($bFlagRead_id_andar) && $bFlagRead_id_andar))
{
    $this->ajax_return_values_id_andar(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
form_CadSAE_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function ID_Operadora_onChange($id_operadora)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
                                                                         
$original_id_tiposae = $this->id_tiposae;
$original_tiposae = $this->tiposae;
$original_emergencial = $this->emergencial;
$original_id_operadora = $this->id_operadora;
$original_id_operadora = $this->id_operadora;

sc_include_library("sys", "functions", "functions.php");


 
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
	return;
}

if (!($this->tiposae  == "manutencao" && 'S' == $this->emergencial )) {
	 
      $nm_select = "SELECT count(*) as count FROM tb_bloqueioempreendimento WHERE ID_OpePre = '$this->id_operadora' AND tipo = 'O' AND ID_Empreendimento = $this->sc_temp_ID_Empreendimento"; 
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
		 
      $nm_select = "SELECT Nom_Operadoras FROM tb_operadoras WHERE ID_Operadoras = '$this->id_operadora'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->operadora = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->operadora = false;
          $this->operadora_erro = $this->Db->ErrorMsg();
      } 
;
		_select($this->operadora );
		$this->operadora  = isset($this->operadora [0]) ? $this->operadora [0]["Nom_Operadoras"] : "";
		$this->sc_ajax_javascript('sModal', array(
			'show',
			'',
			sprintf( $this->Ini->Nm_lang['lang_label_msg_cadSae'] ,$this->operadora ).
			'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
			'{"sizeClass":"lg"}'
		));
		$this->sc_ajax_javascript("$('[name=id_operadora]').val(0)");
		return;
	}
}


if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
$modificado_id_tiposae = $this->id_tiposae;
$modificado_tiposae = $this->tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_operadora = $this->id_operadora;
$this->nm_formatar_campos('id_tiposae', 'tiposae', 'emergencial', 'id_operadora');
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
form_CadSAE_pack_ajax_response();
exit;
}
function ID_Prestador_onChange($id_prestador)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
                                                                         
$original_id_tiposae = $this->id_tiposae;
$original_tiposae = $this->tiposae;
$original_emergencial = $this->emergencial;
$original_id_prestador = $this->id_prestador;
$original_id_prestador = $this->id_prestador;

sc_include_library("sys", "functions", "functions.php");


 
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
	return;
}

if (!($this->tiposae  == "manutencao" && 'S' == $this->emergencial )) {
	 
      $nm_select = "SELECT count(*) as count FROM tb_bloqueioempreendimento WHERE ID_OpePre = '$this->id_prestador' AND tipo = 'P' AND ID_Empreendimento = $this->sc_temp_ID_Empreendimento"; 
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
		 
      $nm_select = "SELECT Nom_RazaoSocial FROM tb_prestadores WHERE ID_Prestador = '$this->id_prestador'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->prestadora = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->prestadora = false;
          $this->prestadora_erro = $this->Db->ErrorMsg();
      } 
;
		_select($this->prestadora );
		$this->prestadora  = isset($this->prestadora [0]) ? $this->prestadora [0]["Nom_RazaoSocial"] : "";
		$this->sc_ajax_javascript('sModal', array(
			'show',
			'',
			sprintf( $this->Ini->Nm_lang['lang_label_msg_cadSae'] ,$this->prestadora ).
			'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
			'{"sizeClass":"lg"}'
		));
		$this->sc_ajax_javascript("$('[name=id_prestador]').val(0)");
		return;
	}
}


if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
$modificado_id_tiposae = $this->id_tiposae;
$modificado_tiposae = $this->tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_prestador = $this->id_prestador;
$this->nm_formatar_campos('id_tiposae', 'tiposae', 'emergencial', 'id_prestador');
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
form_CadSAE_pack_ajax_response();
exit;
}
function calcNumSAE($tipoSAE)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_Emergencial)) {$this->sc_temp_Emergencial = (isset($_SESSION['Emergencial'])) ? $_SESSION['Emergencial'] : "";}
                                                                         
$exist = true;
$prefix = 'L';
switch($tipoSAE) {
	case('instalacao'):
	$prefix .= 'I';
	break;
	case('vistoria'):
	$prefix .= 'V';
	break;
	case('manutencao'):
	$prefix .= $this->sc_temp_Emergencial == 'S' ? 'ME' : 'M';
	break;
	case('testeFusao'):
	$prefix .= 'F';
	break;
	case('desinstalacao'):
	$prefix .= 'D';
	break;
}
while($exist) {
	$Num_SAE = $prefix.randomStr(6);
	 
      $nm_select = "SELECT count(*) FROM tb_sae WHERE Num_SAE = '$Num_SAE'"; 
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
;
	if ($this->rs[0][0] == 0) {
		$exist = false;
	}
	return $Num_SAE;
}
if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function confirmGBTDispOnClick_onClick($num_sae, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_gbt_sae = $this->gbt_sae;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_id_empreendimento = $this->id_empreendimento;
$original_num_sae = $this->num_sae;
$original_num_sae = $this->num_sae;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id = $this->id;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

$GBT_arr = $this->gbt_sae  ? explode('@?@', $this->gbt_sae ) : [];
$resp = ['s' => true,
	'm' => ""		
];
if (count($GBT_arr) > 0) {
	$eventSAE = [
		"Di" => $this->data_inicio ,
		"Hi" => $this->hora_inicio  ? $this->hora_inicio  : "00:00:00",
		"Df" => $this->data_fim ,
		"Hf" => $this->hora_fim  ? $this->hora_fim  : "23:59:00"
	];
	$usersDisp =$this->getGBTDisp($eventSAE, $GBT_arr);
	$listUsers = [];
	foreach($usersDisp["listUsers"] as $row) {
		array_push($listUsers, $row["ID_Usuario"]);
	}
	
	$diff = array_diff($GBT_arr, $listUsers);
	if (count($diff) > 0) {
		$resp['s'] = false;
		$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae3'] ;	
	}
	
	if (!$resp['s']) {
		$f = "sModal";
		$p = array(
			'show',
			'',
			$resp['m'],
		);
	} else {
		$f = "saveGBT";
		$p = array("save");
	}
} else {
	$f = "saveGBT";
	$p = array("save");
}
$this->sc_ajax_javascript($f, $p);


$modificado_gbt_sae = $this->gbt_sae;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_num_sae = $this->num_sae;
$modificado_num_sae = $this->num_sae;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id = $this->id;
$this->nm_formatar_campos('gbt_sae', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'id_empreendimento', 'num_sae');
if ($original_gbt_sae !== $modificado_gbt_sae || isset($this->nmgp_cmp_readonly['gbt_sae']) || (isset($bFlagRead_gbt_sae) && $bFlagRead_gbt_sae))
{
    $this->ajax_return_values_gbt_sae(true);
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
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadSAE_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function deleteGBTAgenda($GBT=0)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$list = is_array($GBT) ? implode(',', $GBT) : $GBT;

 
      $nm_select = "DELETE a, b 
		FROM tb_saetecgb a 
		INNER JOIN tb_agenda b ON b.ID = a.ID_Agenda 
		WHERE a.ID_Usuario NOT IN ($list) AND 
		a.Num_SAE = '$this->num_sae' 
		"; 
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
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function generatePDF()
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
sc_include_library('sys', 'dompdf', 'dompdf.php');
sc_include_library('sys', 'functions', 'functions.php');
sc_include_library("sys", "functions", "validateEventCalendar.php");
sc_include_library('sys', 'functions', 'pdfSAE.php');

$s = new manageSession();

if ($s->get("SAE_pdf_tmpdir")) return $s->get("SAE_pdf_tmpdir");

$options = getOptionDompdf();
$options->set('defaultFont', 'Arial');
$dompdf = getDompdfObj($options);
$p = new pdfSAE();


$sqlSAE = $p->getSQL("SAE", $this->num_sae );
 
      $nm_select = $sqlSAE; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->sae = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->sae = false;
          $this->sae_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->sae );
if (isset($this->sae [0])) {
	$this->sae  = $this->sae [0];
	$sqlTecOpe = $p->getSQL("TecOpe", $this->num_sae );
	 
      $nm_select = $sqlTecOpe; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->tecope = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tecope = false;
          $this->tecope_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->tecope );

	$sqlTecPre = $p->getSQL("TecPre", $this->num_sae );
	 
      $nm_select = $sqlTecPre; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->tecpre = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tecpre = false;
          $this->tecpre_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->tecpre );

	$sqlTecGB = $p->getSQL("TecGB", $this->num_sae );
	 
      $nm_select = $sqlTecGB; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->tecgb = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tecgb = false;
          $this->tecgb_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->tecgb );

	if ($this->sae ["IMG_Logo"]) {
		$resource = imagecreatefromstring($this->sae ["IMG_Logo"]);
		$x = imagesx($resource);
		$y = imagesy($resource);
		$resolution =  $x / $y;
		if ($resolution >= 1) {
			$nx = 200;
			$ny = $nx / $resolution;
		} else {
			$ny = 90;
			$nx = $ny * $resolution;
		}
		if ($ny > 90) {
			$ny = 90;
			$nx = $ny * $resolution;
		}
		if ($nx > 200) {
			$nx = 200;
			$ny = $nx / $resolution;
		}
		$this->sae ["IMG_Logo"] = "<img style='width:".$nx."px;heigth:".$ny."px' src='data:image/png;base64,".base64_encode($this->sae ["IMG_Logo"])."'>";
	}
	$p->processData($this->sae , $this->tecope , $this->tecpre , $this->tecgb );
	$dompdf->loadHtml($p->mountHTML($this));
	$dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
	$output = $dompdf->output();
	$tmpfname = sys_get_temp_dir()."/$this->num_sae .pdf";
	file_put_contents($tmpfname, $output);
	$s->set(["SAE_pdf_tmpdir" => $tmpfname]);
	return $tmpfname;
}
return null;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getDHInstalacao($ID_Empreendimento="")
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
 
      $nm_select = "SELECT 
		Hor_DomInstalacaoInicio, Hor_DomInstalacaoFim, 
		Hor_SegInstalacaoInicio, Hor_SegInstalacaoFim, 
		Hor_TerInstalacaoInicio, Hor_TerInstalacaoFim, 
		Hor_QuaInstalacaoInicio, Hor_QuaInstalacaoFim,
		Hor_QuiInstalacaoInicio, Hor_QuiInstalacaoFim,
		Hor_SexInstalacaoInicio, Hor_SexInstalacaoFim,
		Hor_SabInstalacaoInicio, Hor_SabInstalacaoFim 
		FROM tb_empreendimentoshorarios 
		WHERE ID_Empreendimento = '$ID_Empreendimento'"; 
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
return $this->rs;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getDHVistoria($ID_Empreendimento="")
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
 
      $nm_select = "SELECT 
			Hor_DomVistoriaInicio, Hor_DomVistoriaFim, 
			Hor_SegVistoriaInicio, Hor_SegVistoriaFim, 
			Hor_TerVistoriaInicio, Hor_TerVistoriaFim, 
			Hor_QuaVistoriaInicio, Hor_QuaVistoriaFim,
			Hor_QuiVistoriaInicio, Hor_QuiVistoriaFim,
			Hor_SexVistoriaInicio, Hor_SexVistoriaFim,
			Hor_SabVistoriaInicio, Hor_SabVistoriaFim 
			FROM tb_empreendimentoshorarios 
			WHERE ID_Empreendimento = '$ID_Empreendimento'"; 
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
return $this->rs;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getEmailNotif($config=[])
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         


sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
 
      $nm_select = "SELECT Num_TipoUsuario, ID_OPE FROM tb_usuarios WHERE ID_Usuario = '$this->id_usuario'"; 
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
$ID_Usuario = $this->id_usuario ;
$Num_TipoUsuario = $this->rs [0]["Num_TipoUsuario"];
$ID_OPE = $this->rs [0]["ID_OPE"];

$sqlGetOperadorasRelacionadas = "select b.ID_OpePre as Operadoras FROM tb_tecsae a
    INNER JOIN tb_tecnicos b ON b.ID = a.ID_Tecnico AND b.Tipo_Tecnico = 'O'
    WHERE a.Num_SAE = '$this->num_sae'
    group by  b.ID_OpePre";
 
      $nm_select = $sqlGetOperadorasRelacionadas; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->operadorasrelacionadas = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->operadorasrelacionadas = false;
          $this->operadorasrelacionadas_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->operadorasrelacionadas );
$this->operadorasrelacionadas  = isset($this->operadorasrelacionadas [0]) ? $this->operadorasrelacionadas  : array();

$sqlGetPrestadorasRelacionadas = "select b.ID_OpePre as Prestadoras FROM tb_tecsae a
    INNER JOIN tb_tecnicos b ON b.ID = a.ID_Tecnico AND b.Tipo_Tecnico = 'P'
    WHERE a.Num_SAE = '$this->num_sae'
    group by  b.ID_OpePre";
 
      $nm_select = $sqlGetPrestadorasRelacionadas; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->prestadorasrelacionadas = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->prestadorasrelacionadas = false;
          $this->prestadorasrelacionadas_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->prestadorasrelacionadas );
$this->prestadorasrelacionadas  = isset($this->prestadorasrelacionadas [0]) ? $this->prestadorasrelacionadas  : array();

$listOperadorasRelacionadas = array($this->id_operadora );
foreach($this->operadorasrelacionadas  as $row) {
    array_push($listOperadorasRelacionadas, $row["Operadoras"]);
}
$listOperadorasRelacionadas = "'".implode("','",$listOperadorasRelacionadas)."'";

$listPrestadorasRelacionadas = array($this->id_prestador );
foreach($this->prestadorasrelacionadas  as $row) {
    array_push($listPrestadorasRelacionadas, $row["Prestadoras"]);
}
$listPrestadorasRelacionadas = "'".implode("','",$listPrestadorasRelacionadas)."'";

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
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'SAE' AND c.Nom_Funcao = '".$config["actSae"]."' 
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
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'SAE' AND c.Nom_Funcao = '".$config["actSae"]."' 
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
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'SAE' AND c.Nom_Funcao = '".$config["actSae"]."' 
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
LEFT JOIN tb_permissoes c ON c.Nom_Modulo = 'SAE' AND c.Nom_Funcao = '".$config["actSae"]."' 
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

if ($config["actSae"] == "NOTIFAPROVACAO") {
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
	
    $sqlGBTec = "SELECT a.Nom_Email1 as Email1, a.Nom_Email2 as Email2 FROM tb_usuarios a
    INNER JOIN tb_saetecgb b ON b.ID_Usuario = a.ID_Usuario AND b.Num_SAE = '$this->num_sae' 
    WHERE (a.Nom_Email1 != '' OR a.Nom_Email2 != '') GROUP BY a.ID_Usuario";
     
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

if (in_array($Num_TipoUsuario, ["G", "GT", "P"])) {
    $sqlContatoP = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
    FROM tb_contatos a 
    WHERE a.ID_OPE IN ($listPrestadorasRelacionadas) AND a.Tipo_OPE = 'P' AND a.RecebeNotificacao = 'S' AND
    (a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND a.Num_TipoUsuario = 'G'";
} elseif ($Num_TipoUsuario == "O") {
    $sqlContatoP = "SELECT a.Nom_EmailContato1 as Email1, a.Nom_EmailContato2 as Email2, a.Nom_EmailContato3 as Email3
    FROM tb_contatos a 
    WHERE a.ID_OPE IN ($listPrestadorasRelacionadas) AND a.Tipo_OPE = 'P' AND a.RecebeNotificacao = 'S' AND
    (a.Nom_EmailContato1 != '' OR a.Nom_EmailContato2 != '' OR a.Nom_EmailContato3 != '') AND (a.Num_TipoUsuario = 'O' AND a.ID_OPE_Usuario = '$ID_OPE' OR a.Num_TipoUsuario = 'G')";
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
        if ($value["Email1"] != '') {
            array_push($listEmails, $value["Email1"]);
        } elseif ($value["Email2"] != '') {
            array_push($listEmails, $value["Email2"]);
        } elseif (isset($value["Email3"]) && $value["Email3"] != '') {
            array_push($listEmails, $value["Email3"]);
        }
    }
}
$listEmails = array_unique($listEmails);
return $listEmails;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getAddDay ($date) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
	$d = new DateTime($date);
	$d->modify('+1 day');
	return $d->format("Y-m-d")." 00:00";

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getDateBlockUtilNow ($twoDays = false) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
	if ($twoDays) {
		return date("Y-m-d", strtotime("+3 days"))." 00:00";
	} else {
		return date("Y-m-d H:i");
	}

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function freeAllHour (&$listFreeTime, $minDate) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
    $end = new DateTime(date("Y-m-d", strtotime("last day of +2 months")));
    $listFreeTime["i"][] = $minDate;
    $listFreeTime["f"][] =$this->getAddDay($end->format("Y-m-d"));

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function freeEmpHour (&$listFreeTime, $minDate, $empHour, $_9util18 = false) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
    $beginYmd = date("Y-m-d", strtotime($minDate));
	$begin = new DateTime($beginYmd);
	$end   = new DateTime(date("Y-m-d", strtotime("last day of +2 months")));
	if (isset($empHour[0])) {
		for($i = $begin; $i <= $end; $i->modify('+1 day')) {
			$wDay = date('w', strtotime($i->format("Y-m-d")));
			$Ymd = $i->format("Y-m-d");
			$hI = $empHour[0][2*$wDay];
			$hF = $empHour[0][2*$wDay+1];
			if ($hI && $hF) { 
				if ($hI < $hF) { 
					if ($beginYmd == $Ymd && $hI < date("H:i", strtotime($minDate))) {
						$hI = date("H:i", strtotime($minDate));
					}
					if ($_9util18 && 
						"$Ymd $hI" < "$Ymd 09:00" && "$Ymd $hF" > "$Ymd 09:00" &&
						"$Ymd $hF" > "$Ymd 18:00" && "$Ymd $hI" < "$Ymd 18:00"
					   ) {
						$listFreeTime["i"][] = $_9util18 && "$Ymd $hI" < "$Ymd 09:00" ? "$Ymd 09:00" : "$Ymd $hI"; 
						$listFreeTime["f"][] = $_9util18 && "$Ymd $hF" > "$Ymd 18:00" ? "$Ymd 18:00" : "$Ymd $hF"; 
					} elseif (!$_9util18)  {
						$listFreeTime["i"][] = "$Ymd $hI"; 
						$listFreeTime["f"][] = "$Ymd $hF"; 
					}
				} else if ($hI == $hF) {
					$listFreeTime["i"][] = "$Ymd 00:00"; 
					$listFreeTime["f"][] = date("Y-m-d", strtotime($this->getAddDay($Ymd)))." 00:00"; 
				} else {
					if ($_9util18) {
						$secHI = "09:00";
						$secHF = "18:00";
						if ($beginYmd == $Ymd && $hI < date("H:i", strtotime($minDate))) {
							if (date("H:i", strtotime($minDate)) < $hF) {
								$secHI = date("H:i", strtotime($minDate));
							} elseif (date("H:i", strtotime($minDate)) < $hI) {
								$hI = date("H:i", strtotime($minDate));
							}
						}

						if ("$Ymd $hF" > "$Ymd $secHI") {
							$listFreeTime["i"][] = "$Ymd $secHI"; 
							$listFreeTime["f"][] = "$Ymd $hF"; 
						}

						if ("$Ymd $hI" < "$Ymd $secHF") {
							$listFreeTime["i"][] = "$Ymd $hI"; 
							$listFreeTime["f"][] = "$Ymd $secHF"; 
						}

					} else {
						$secHI = "00:00";
						if ($beginYmd == $Ymd && $hI < date("H:i", strtotime($minDate))) {
							if (date("H:i", strtotime($minDate)) < $hF) {
								$secHI = date("H:i", strtotime($minDate));
							} else {
								$hI = date("H:i", strtotime($minDate));
							}
						}

						if ("$Ymd $hF" > "$Ymd $secHI") {
							$listFreeTime["i"][] = "$Ymd $secHI"; 
							$listFreeTime["f"][] = "$Ymd $hF"; 
						}

						if ("$Ymd $hI" <$this->getAddDay($Ymd)) {
							$listFreeTime["i"][] = "$Ymd $hI"; 
							$listFreeTime["f"][] =$this->getAddDay($Ymd); 
						}
					}
				}
			}
		}
	}

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function freeTecHour (&$listFreeTime, $minDate) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
    $events =$this->getGBTDisp([
            "Di" => date("Y-m-d", strtotime($minDate)),
            "Hi" => date("H:i", strtotime($minDate)),
            "Df" => date("Y-m-d", strtotime("last day of +2 months")),
            "Hf" => "00:00"
        ], array(), true);
	$listFreeTime["events"] = $events;
	
	$maxDate = date("Y-m-d", strtotime("first day of +3 months"))." 00:00";
	
    $listTime = [];
	$listTimeByUsuario = [];
    if (count($events["listEvents"])) {
        foreach($events["listEvents"] as $event) {
			$ID_Usuario = $event["event"]["ID_Usuario"];
			if(!isset($listTimeByUsuario[$ID_Usuario])) $listTimeByUsuario[$ID_Usuario] = [];
            $D1 = date("Y-m-d H:i", strtotime($event["D1"]));
            $D2 = date("Y-m-d H:i", strtotime($event["D2"]));

            if (isset($listTimeByUsuario[$ID_Usuario][$D1])) $listTimeByUsuario[$ID_Usuario][$D1]++;
            else $listTimeByUsuario[$ID_Usuario][$D1] = 1;
            
			if (isset($listTimeByUsuario[$ID_Usuario][$D2])) $listTimeByUsuario[$ID_Usuario][$D2]--;
			else $listTimeByUsuario[$ID_Usuario][$D2] = -1;
        }
		
		foreach($listTimeByUsuario as $ID_Usuario => $byUsuario) {
			uksort($byUsuario, function($a, $b) {
        		if ($a == $b) return 0;
    	    	return $a < $b ? -1 : 1;
	    	});
			$listTimeByUsuario[$ID_Usuario] = $byUsuario;
		}

		foreach($listTimeByUsuario as $ID_Usuario => $byUsuario) {
			$listaEventos = [];
			$eventosAtivos = 0;
			foreach ($byUsuario as $Time => $count) {
				if (!$eventosAtivos && $count > 0) { 
					$listaEventos[$Time] = 1;
				} 
				$eventosAtivos += $count;
				if (!$eventosAtivos) { 
					$listaEventos[$Time] = -1;
				}
			}
			$listTimeByUsuario[$ID_Usuario] = $listaEventos;
		}
		
		$listFreeTime["listTimeByUsuario"] = $listTimeByUsuario;
		
		foreach($listTimeByUsuario as $ID_Usuario => $byUsuario) {
			foreach ($byUsuario as $Time => $count) {
				if(!isset($listTime[$Time])) $listTime[$Time] = 0;
				$listTime[$Time] += $count;
			}
		}
		
		uksort($listTime, function($a, $b) {
			if ($a == $b) return 0;
			return $a < $b ? -1 : 1;
		});
		
		$listaEventos = [];
		$eventosAtivos = 0;
		foreach($listTime as $Time => $count) {
			$eventosAtivos += $count;
			if ($eventosAtivos == $events["totalUser"]) {
				$listaEventos[$Time] = 1;
			} else {
				$listaEventos[$Time] = -1;
			}
		}
		$listTime = $listaEventos; 
		

		$listFreeTimeRefact = array();
		for ($index = 0; $index < count($listFreeTime["i"]); $index++) {
			if ($minDate != $listFreeTime["i"][$index] && $maxDate != $listFreeTime["f"][$index] && isset($listFreeTime["i"][$index+1])) {
				if (!$index) {
					$i = date("Y-m-d", strtotime($listFreeTime["i"][$index]))." 00:00";
					$f = $listFreeTime["i"][$index];
					if(!isset($listTime[$i])) $listTime[$i] = 0;
					$listTime[$i]++;
					if(!isset($listTime[$f])) $listTime[$f] = 0;
					$listTime[$f]--;
				}
				$i = $listFreeTime["f"][$index]; 
				$f = $listFreeTime["i"][$index+1];
				if(!isset($listTime[$i])) $listTime[$i] = 0;
				$listTime[$i]++;
				if(!isset($listTime[$f])) $listTime[$f] = 0;
				$listTime[$f]--;
			}
		}
		
		uksort($listTime, function($a, $b) {
			if ($a == $b) return 0;
			return $a < $b ? -1 : 1;
		});
		
		$listaEventos = [];
		$eventosAtivos = 0;
		foreach($listTime as $Time => $count) {
			if (!$eventosAtivos && $count > 0) { 
				$listaEventos[$Time] = 1;
			} 
			$eventosAtivos += $count;
			if (!$eventosAtivos) { 
				$listaEventos[$Time] = -1;
			}
		}
		$listTime = $listaEventos; 
		
		$listFreeTime["i"] = array();
		$listFreeTime["f"] = array();
		foreach($listTime as $Time => $count) {
			if ($count < 0) {
				$listFreeTime["i"][] = $Time;
			} 
			if ($count > 0) {
				$listFreeTime["f"][] = $Time;
			}
		}
    }


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getFreeTime()
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
sc_include_library("sys", "functions", "functions.php");

$listFreeTime = [
    "i" => array(),
    "f" => array(),
	"all" => array(),
	"interval" => array(),
];

 
      $nm_select = "SELECT Code_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->tSae = array();
      $this->tsae = array();
     if ($this->id_tiposae != "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->tSae[$y] [$x] = $rx->fields[$x];
                      $this->tsae[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tSae = false;
          $this->tSae_erro = $this->Db->ErrorMsg();
          $this->tsae = false;
          $this->tsae_erro = $this->Db->ErrorMsg();
      } 
     } 
;

$InstalacaoAntena = $this->instalacaoantena ;
$Emergencial = $this->emergencial ;
$ID_Empreendimento = $this->id_empreendimento ;
$Emergencial = is_array($Emergencial) ? $Emergencial[0] : $Emergencial;
$minDate =$this->getDateBlockUtilNow($Emergencial == 'N');

switch($this->tSae[0][0]) {
	case("instalacao"):
		$rs =$this->getDHInstalacao($ID_Empreendimento);
	$this->freeEmpHour($listFreeTime, $minDate, $rs, $InstalacaoAntena == 'S');
		
	$this->freeTecHour($listFreeTime, $minDate);
	break;
	case("vistoria"):
		$rs =$this->getDHVistoria($ID_Empreendimento);
	$this->freeEmpHour($listFreeTime, $minDate, $rs);
		
		if ($this->optantegbtec  != 'N') {
		$this->freeTecHour($listFreeTime, $minDate);
		}
	break;
	case("manutencao"):
		if ($Emergencial == 'N')  {
			$rs =$this->getDHVistoria($ID_Empreendimento);
		$this->freeEmpHour($listFreeTime, $minDate, $rs);
		} else {
           $this->freeAllHour($listFreeTime, $minDate);
        }
		if ($this->optantegbtec  != 'N') {
		$this->freeTecHour($listFreeTime, $minDate);
		}
	break;
	case("testeFusao"):
		if ($Emergencial == 'N')  {
			$rs =$this->getDHVistoria($ID_Empreendimento);
		$this->freeEmpHour($listFreeTime, $minDate, $rs);
		} else {
           $this->freeAllHour($listFreeTime, $minDate);
        }
		if ($this->optantegbtec  != 'N') {
		$this->freeTecHour($listFreeTime, $minDate);
		}
	break;
	case("desinstalacao"):
		$rs =$this->getDHInstalacao($ID_Empreendimento);
	$this->freeEmpHour($listFreeTime, $minDate, $rs);
	$this->freeTecHour($listFreeTime, $minDate);
	break;
	default:
	break;
}

if (count($listFreeTime["i"]) && count($listFreeTime["f"])) {
	foreach ($listFreeTime["i"] as $Time) {
		if (!isset($listFreeTime["all"][$Time])) $listFreeTime["all"][$Time] = 1;
		else $listFreeTime["all"][$Time]++;
	}
	foreach ($listFreeTime["f"] as $Time) {
		if (!isset($listFreeTime["all"][$Time])) $listFreeTime["all"][$Time] = -1;
		else $listFreeTime["all"][$Time]--;
	}
	uksort($listFreeTime["all"], function($a, $b) {
        if ($a == $b) return 0;
        return $a < $b ? -1 : 1;
    });
	
	$lastCount = -1;
	$Dinit = $Dfinish = 0;
	foreach($listFreeTime["all"] as $Time => $count) {
		if ($count > 0) {
			$Dinit = $Time;
			$lastCount = $count;
		} elseif ($count < 0 && $lastCount > 0) {
			$Dfinish = $Time;
			$lastCount = $count;
		}
		if ($Dinit && $Dfinish) {
			$listFreeTime["interval"][] = [$Dinit, $Dfinish];
			$Dinit = $Dfinish = 0;
		}
	}
}











return $listFreeTime;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getGBTDisp($dataEventSAE=[], $specificGBT=[], $returnAllInfo=false)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
sc_include_library("sys", "functions", "functions.php");
sc_include_library("sys", "functions", "validateEventCalendar.php");
sc_include_library("sys", "models", "Agenda.php");
$_Agenda = new Agenda($this);

 
      $nm_select = "select 
        TipoOverlay,
        Permitido,
        Bloqueio,
        Duplicar,
		BloqueioAdicional
        FROM tb_tiposeventos
        WHERE 
         Code = 'sae'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->ms = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->ms = false;
          $this->ms_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->ms );

 
      $nm_select = "select 
        TipoOverlay,
        Permitido,
        Bloqueio,
        Duplicar,
		BloqueioAdicional
        FROM tb_tiposeventos
        WHERE 
         Code = 'deslocamentosae'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->mte = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->mte = false;
          $this->mte_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->mte );

$deslocamentosaeAntes = $deslocamentosaeDepois = [
	'Di' => "",
	'Hi' => "",
	'Df' => "",
	'Hf' => "",
	'Recorrente' => 'N',
	'Periodo' => 'D',
	'Code' => 'deslocamentosae',
	'TipoOverlay' => $this->mte [0]["TipoOverlay"],
	'Permitido' => $this->mte [0]["Permitido"],
	'Bloqueio' => $this->mte [0]["Bloqueio"],
	'Duplicar' => $this->mte [0]["Duplicar"],
	'BloqueioAdicional' => $this->mte [0]["BloqueioAdicional"]
];

$mEvent = [
	'Di' => $dataEventSAE["Di"],
	'Hi' => $dataEventSAE["Hi"],
	'Df' => $dataEventSAE["Df"],
	'Hf' => $dataEventSAE["Hf"],
	'Recorrente' => 'N',
	'Periodo' => 'D',
	'Code' => 'sae',
	'TipoOverlay' => $this->ms [0]["TipoOverlay"],
	'Permitido' => $this->ms [0]["Permitido"],
	'Bloqueio' => $this->ms [0]["Bloqueio"],
	'Duplicar' => $this->ms [0]["Duplicar"],
	'BloqueioAdicional' => $this->ms [0]["BloqueioAdicional"]
];

$sql = "SELECT a.ID_Usuario as ID_Usuario, a.Nom_Nome as Nom_Nome
    FROM tb_usuarios a 
	INNER JOIN tb_gbtecempreendimentos b ON b.ID_Usuario = a.ID_Usuario 
    WHERE a.Num_TipoUsuario  = 'GT' AND a.Num_Ativo = 'S' AND 
	b.ID_Empreendimento = '$this->id_empreendimento' ".
	(count($specificGBT) > 0 ? "AND a.ID_Usuario IN (".implode(",", $specificGBT).") " : "")  
    ."order by a.Nom_UserName";
 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->usersdisp = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->usersdisp = false;
          $this->usersdisp_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->usersdisp );

$usersFree = [];
$listEvents = [];
$addNightTime = 0;
if ($this->usersdisp ) {
    foreach($this->usersdisp  as $row) {
		$sql = "SELECT 
			a.ID_Usuario as ID_Usuario,
            a.Data_Inicio as Di, 
            ifnull(a.Hora_Inicio, '00:00') as Hi, 
            a.Data_Fim as Df, 
            ifnull(a.Hora_Fim, '23:59') as Hf, 
            a.Recorrente as Recorrente, 
            a.Periodo as Periodo, 
            b.Code as Code, 
            b.TipoOverlay as TipoOverlay, 
            b.Permitido as Permitido, 
            b.Bloqueio as Bloqueio, 
            b.Duplicar as Duplicar,
			b.BloqueioAdicional as BloqueioAdicional
            FROM tb_agenda as a
            INNER JOIN tb_tiposeventos as b ON b.Code = a.Tipo_evento
            WHERE 
                a.ID_Usuario = '".$row['ID_Usuario']."' AND 
                (DATE_ADD(CONCAT(a.Data_Fim, ' ', ifnull(a.Hora_Fim, '23:59')), INTERVAL 24 HOUR) >= '".$mEvent['Di']." ".$mEvent['Hi']."') AND
                a.ID NOT IN (SELECT c.ID_Agenda FROM tb_saetecgb c WHERE c.ID_Usuario = '".$row['ID_Usuario']."' AND c.Num_SAE = '$this->num_sae')";
        $rs = $_Agenda->query($sql);
		$nEventsIncidents = [];

		if ($rs) {
			$addNightTime = isEntry("19:00:00", $mEvent["Hi"], "06:00:00") || isEntry("19:00:00", $mEvent["Hf"], "06:00:00");
			$addLunch = false;
			$additionalTime = 0;
			if ($addNightTime) {
				$additionalTime = 11 * 60 * 60; 
			}
			$unixInicio = strtotime($mEvent['Di']." ".$mEvent['Hi']);
			$deslocamentosaeAntes["Di"] = date("Y-m-d", $unixInicio - 60*60);
			$deslocamentosaeAntes["Hi"] = date("H:i:s", $unixInicio - 60*60);
			$deslocamentosaeAntes["Df"] = date("Y-m-d", $unixInicio);
			$deslocamentosaeAntes["Hf"] = date("H:i:s", $unixInicio);
			$unixFim = strtotime($mEvent['Df']." ".$mEvent['Hf']);
			$deslocamentosaeDepois["Di"] = date("Y-m-d", $unixFim);
			$deslocamentosaeDepois["Hi"] = date("H:i:s", $unixFim);
			$deslocamentosaeDepois["Df"] = date("Y-m-d", $unixFim + ($additionalTime + ($addNightTime ? 0 : 60 * 60)));
			$deslocamentosaeDepois["Hf"] = date("H:i:s", $unixFim + ($additionalTime + ($addNightTime ? 0 : 60 * 60)));
			
			$nEventsIncidents = getIncidentsInEvent($mEvent, $rs, false);
			$nEventsIncidentsAntes = getIncidentsInEvent($deslocamentosaeAntes, $rs, false);
			$nEventsIncidentsDepois = getIncidentsInEvent($deslocamentosaeDepois, $rs, false);
			
			$nEventsIncidents = array_merge($nEventsIncidents, $nEventsIncidentsAntes);
			$nEventsIncidents = array_merge($nEventsIncidents, $nEventsIncidentsDepois);
		}
	
		if (count($nEventsIncidents) == 0) {
			array_push($usersFree, $row);
		} else {
			$listEvents = array_merge($listEvents, $nEventsIncidents);
		}
    }
}

if (!(count($specificGBT) > 0) && !$returnAllInfo) {
	return $usersFree;
} else {
	return ["listUsers" => $usersFree, "addNightTime" => $addNightTime, "listEvents" => $listEvents, "totalUser" => count($this->usersdisp )];
}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function getOsInfo()
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
sc_include_library("sys", "functions", "functions.php");
sc_include_library("sys", "models", "Os.php");
$_Os = new Os($this);
sc_include_library("sys", "models", "Usuarios.php");
$_Usuarios = new Usuarios($this);

$Os = $_Os->getByNum_SAE($this->num_sae );

if ($Os) {
	$inicio = date("d/m/Y H:i", strtotime($Os["Data_Inicio"]." ".$Os["Hora_Inicio"]));
	$fim = date("d/m/Y H:i", strtotime($Os["Data_Fim"]." ".$Os["Hora_Fim"]));
	$horas = convertNumberInStringHour($Os["Total_Horas"]);
	$Criado_em = date("d/m/Y H:i", strtotime($Os["Criado_em"]));
	$UsuarioAcompanhante = $_Usuarios->getById(intval($Os["ID_Usuario_Acompanhante"]));
	if ($UsuarioAcompanhante) {
		$UsuarioAcompanhante = $UsuarioAcompanhante[0]["Nom_Nome"];
	} else $UsuarioAcompanhante = " - "; 
} else {
	$inicio = $fim = $horas = $UsuarioAcompanhante = $Criado_em = " - ";
}
return "
	<strong>".(!$Os ? "Ordem de serviço não cadastrada<br>" : "")."</strong>
	Acompanhante: <strong>".$UsuarioAcompanhante."</strong><br>
	Criado em: <strong>".$Criado_em."</strong><br>
	Início: <strong>".$inicio."</strong><br>
	Término: <strong>".$fim."</strong><br>
	Total de horas: <strong>".$horas."</strong><br>
";

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function onLoadJS($config=[])
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
?>
    <style>
        .pass-diff:after {
            display: block;
            content: "As senhas são diferentes";
            color: red;
        }
        input.disabled, select.disabled, textarea.disabled {
            border: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            text-overflow: '';
            -moz-appearance: none;
            background-color: #eeeeee;
            pointer-events: none;
        }
        span.nav-state {
            padding: 4px;
            margin-right: 7px;
            background-color: #dfdfdf;
            border-radius: 25%;
            font-size: 12px;
        }
        li.scTabActive span.nav-state {
            background-color: #71d4f2;
        }
        #id_ajax_label_id_usuario, #id_ajax_label_id_usuario_fechamento, .scFormRequiredOdd {
            display:none;
        }
        
		#hidden_field_label_os_info {
			display: none;
		}
		#id_sc_field_pontodeencontro {
			border: none;
    		background: rgba(0, 0, 0, 0);
		}
		[name^=gbt_disponiveis] {display: none !important;}
		<?php if (isset($config["loadStepsSAE"]) && $config["loadStepsSAE"]): ?>
			#id_tabs_0_2, #id_tabs_0_3, #id_tabs_0_4, #id_tabs_0_5, #id_tabs_0_6 {
				display: none;
			}
		<?php endif; ?>
    </style>
    <script>
        pageLoading = true;
        $(document).ready(function(){
            <?php 
                foreach($config['disabledFields'] as $element) {
                    echo "\$('".$element."').addClass('disabled');";
                }
                foreach($config['removeDisabledFields'] as $element) {
                    echo "\$('".$element."').removeClass('disabled');";
                }
                foreach($config['removeDisabledFieldsByAttr'] as $element) {
                    echo "\$('".$element."').prop('disabled', false);";
                }
                foreach($config['disabledFieldsByAttr'] as $element) {
                    echo "\$('".$element."').prop('disabled', true);";
                }
                if (isset($config['sBtnSubmitStatus']) && $config['sBtnSubmitStatus']) {
                    echo '$("#id_read_off_num_status").after("<a class=\"btn btn-primary\" onclick=\"confirmStatusSubmit()\">Submeter Status</a>");';
                }
                if (isset($config['sBtnGBT']) && $config['sBtnGBT']) {
                    echo '$("#id_read_off_gbt_sae").after("<a class=\"btn btn-primary\" style=\"margin-bottom: 45px;\" onclick=\"saveGBT(\'confirm\')\">Delegar técnicos</a>");';
                }
                if (isset($config['removeStatusList']) && count($config['removeStatusList']) > 0) {
                    foreach($config['removeStatusList'] as $item) { 
                        echo '$("#id_sc_field_num_status option[value='.$item.']").hide();';
                    }
                }
            ?>
		
            $('#hidden_bloco_4 > tbody').append('<tr><td id="agenda_sae" colspan="2"></td></tr>');
            tabAgenda = $('#id_tabs_0_4');
			<?php if ($config["hideTabAgenda"]): ?>
            	tabAgenda.hide();
			<?php else: ?>
				agendaTd = $("#agenda_sae");
				agendaTd.css('width', '100vw');
				agendaTd.html(`<iframe src="../blk_agendaCadSae?disabled=0" id="id_agenda_frame" style="width:100%;border:0" onLoad="updateStatsFrameAgenda(this);"></iframe>`);
				setInterval(function () {
					updateStatsFrameAgenda();
				}, 500);
			<?php endif; ?>
			setResumoAgenda();
		
			<?php if ($config['showPAS']): ?>
				$pasTd = $('#id_label_label_pas').closest('td');
				$pasTd.css('width', '100%');
				$pasTd.html('<iframe src="../grid_PAS_SAE" id="id_pas_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
			<?php endif; ?>
			$tabPAS = $('#id_tabs_0_7');
			$tabPAS.hide();

            $('#hidden_bloco_6 > tbody > tr:nth-child(1)').html('<td id="tec_operadora"></td>');
            $('#hidden_bloco_6 > tbody > tr:nth-child(2)').html('<td id="tec_prestadora"></td>');
            tabTec = $('#id_tabs_0_6');
            tabTec.hide();
                
        
            tecOpeTd = $("#tec_operadora");
            tecOpeTd.css('width', '100vw');
			tecOpeTd.html('<iframe src="../formGrid_TecnicosOperadoraSAE?disabled=<?php echo $this->num_status  != 'AE' && $this->num_status  != 'RAE' ? '1' : '0' ?>" id="id_tecope_frame" style="width:100%;border:0;margin-bottom: 50px;" onLoad="updateStatsFrameTec(this);"></iframe>');
			        


            tecPreTd = $("#tec_prestadora");
            tecPreTd.css('width', '100vw');
			tecPreTd.html('<iframe src="../formGrid_TecnicosPrestadoraSAE?disabled=<?php echo $this->num_status  != 'AE' && $this->num_status  != 'RAE' ? '1' : '0' ?>" id="id_tecpre_frame" style="width:100%;border:0;margin-bottom: 50px;" onLoad="updateStatsFrameTec(this);"></iframe>');
			
        
            setInterval(function () {
                updateStatsFrameTec();
            }, 500);
        
			
			<?php 
			if (isset($config["loadStepsSAE"]) && $config["loadStepsSAE"]): ?>
				steps = {
					"id_tabs_0_0":"#id_sc_field_stepstatus",
					"id_tabs_0_1":"#id_sc_field_stepempreendimento",
					"id_tabs_0_2":"#id_sc_field_stepoperadora",
					"id_tabs_0_3":"#id_sc_field_stepprestadora",
					"id_tabs_0_4":"#id_sc_field_stepagendamento",
					"id_tabs_0_5":"#id_sc_field_stepdescricao",
					"id_tabs_0_6":"#id_sc_field_steptecnicos"
				};
				$('#main_table_form > tbody > tr > td > div > table > tbody > tr:nth-child(2) > td > table > tbody > tr > td > table > tbody > tr > td:nth-child(3)').append(`
					<button class="scButton_default btn-primary btn-nav-next" id="next-step"><span><?=  $this->Ini->Nm_lang['lang_btn_next']  ?></span> <i class="glyphicon glyphicon-chevron-right"></i></button>
				`);
				$('.btn-nav-next').on('click', function(event){
					event.preventDefault();
					tab = $('.scTabActive').prop('id');
					tabNext = 1+parseInt(tab.split("_")[3]);
					if (typeof steps['id_tabs_0_'+tabNext] == "undefined") {
						$('#id_sc_field_savedataonclick').click();
					} else {
						$(steps[""+tab]).click();
					}
				});
				$('[id^=id_tabs_0_]').on('click', function(e){
					tabIdx = 1+parseInt(e.currentTarget.id.split("_")[3]);
					if (typeof steps['id_tabs_0_'+tabIdx] == "undefined") {
						$('#next-step span').html('<?=  $this->Ini->Nm_lang['lang_btn_conclude'] ?>');
					} else {
						$('#next-step span').html('<?=  $this->Ini->Nm_lang['lang_btn_next']  ?>');
					}
				});
				sc_control_tabs_0(1);
			<?php endif; ?>
		
		
			sc_control_tabs_0 = function(iTabIndex) {
				sc_change_tabs(iTabIndex == 0, 'hidden_bloco_0', 'id_tabs_0_0');
				sc_change_tabs(iTabIndex == 1, 'hidden_bloco_1', 'id_tabs_0_1');
				sc_change_tabs(iTabIndex == 2, 'hidden_bloco_2', 'id_tabs_0_2');
				sc_change_tabs(iTabIndex == 3, 'hidden_bloco_3', 'id_tabs_0_3');
				sc_change_tabs(iTabIndex == 4, 'hidden_bloco_4', 'id_tabs_0_4');
				sc_change_tabs(iTabIndex == 5, 'hidden_bloco_5', 'id_tabs_0_5');
				sc_change_tabs(iTabIndex == 6, 'hidden_bloco_6', 'id_tabs_0_6');
				sc_change_tabs(iTabIndex == 7, 'hidden_bloco_7', 'id_tabs_0_7');
				sc_change_tabs(iTabIndex == 8, 'hidden_bloco_8', 'id_tabs_0_8');		   

				if (iTabIndex == 4 && checkBrowser() == "Firefox") {
					if (typeof reloaded_id_agenda_frame == "undefined") {
						reloaded_id_agenda_frame = true;
						id_agenda_frame.contentWindow.location.reload();
					}
				}
			}
        });
        
		<?php 
		if (isset($config["loadStepsSAE"]) && $config["loadStepsSAE"]): ?>
		function nextStep() {
			tabIdx = parseInt($('.scTabActive').prop('id').split("_")[3]) + 1;
			$('#id_tabs_0_'+tabIdx).css("display", "inline-block");
			sc_control_tabs_0(tabIdx);
			tabIdx++;
			if (typeof steps['id_tabs_0_'+tabIdx] == "undefined") {
				$('#next-step span').html(<?=  $this->Ini->Nm_lang['lang_btn_conclude']  ?>);
			}
		} 
		<?php endif; ?>
		
        function confirmStatusSubmit(act) {
            act = act ? act : null;
            if (act == 'submit') {
                sModal('close');
                $('#id_sc_field_savestatusonclick').click()
            } else {
                sModal('show', '', `<p><?=  $this->Ini->Nm_lang['lang_label_submitSAE']  ?></p><br>
			<a class="btn btn-primary" onclick="confirmStatusSubmit(\'submit\')"><?=   $this->Ini->Nm_lang['lang_label_yes'] ?></a>
			<a class="btn btn-danger" onclick="close_sModal()"><?=   $this->Ini->Nm_lang['lang_label_no'] ?></a>`);
            }
        }
        
        function saveGBT (act) {
			if (act == "confirm") $('#id_sc_field_confirmgbtdisponclick').click();
			else $('#id_sc_field_savegbtonclick').click();
			sModal('close');
        }
        
        function saveDataForm () {
            btnUpd = $('#sc_b_upd_t'); 
            btnIns = $('#sc_b_ins_t');
            if (btnUpd.length) { 
                    btnUpd.click(); 
					window.setTimeout(function(){setResumoAgenda();},500);
            } else if (btnIns.length) {
				$.blockUI();
                    btnIns.click(); 
            }
        };
        
		function deleteData() {
			$('#id_sc_field_removeronclick').click();
		}
		
        function updateStatsFrameAgenda(frame) {
            nSize = $('#id_agenda_frame').contents().find('body').height();
            nSize = 800 > nSize  ? 800 : nSize;
            $('#id_agenda_frame').height(nSize);
            agendaTd.height(nSize);
			<?php if (!isset($config["loadStepsSAE"]) || isset($config["loadStepsSAE"]) && !$config["loadStepsSAE"]): ?>
            	tabAgenda.show();
			<?php endif; ?>
            if (frame) {
                if ($('#id_sc_field_data_inicio').val() && $('#id_sc_field_hora_inicio').val() && $('#id_sc_field_data_fim').val() && $('#id_sc_field_hora_fim').val()) {
                    interval = setInterval(function(){
                        if (typeof frame.contentWindow.createEvent == 'function') {
							Data_Inicio = '<?= $this->data_inicio  ?>';
							Hora_Inicio = '<?= $this->hora_inicio  ?>';
							Data_Fim = '<?= $this->data_fim  ?>';
							Hora_Fim = '<?= $this->hora_fim  ?>';

							if (typeof frame.contentWindow.createEvent == 'function') {
								setTimeout(function() {
							   		frame.contentWindow.createEvent(
										Data_Inicio+" "+Hora_Inicio,
										Data_Fim+" "+Hora_Fim,
										'<?= date("H:i", strtotime($this->hora_inicio )) ?> - <?= date("H:i", strtotime($this->hora_fim )) ?>'
									);
								}, 1000);
							}
                            clearInterval(interval);
                        }
                    }, 500);
                }
                $(frame).contents().find('body').attr('style', 'overflow-y:hidden');
               
                $(frame).contents().find('#dateconf input[name=submit]').on('click', function(e) {
					saveDataFromAgenda();
					setResumoAgenda();
                });
            }
        }
        
        function updateStatsFrameTec(frame) {
            nSize = $('#id_tecope_frame').contents().find('body').height();
            $('#id_tecope_frame').height(nSize);
            tecOpeTd.height(nSize);
        
            nSize = $('#id_tecpre_frame').contents().find('body').height();
            $('#id_tecpre_frame').height(nSize);
            tecPreTd.height(nSize);
        	<?php if (!isset($config["loadStepsSAE"]) || isset($config["loadStepsSAE"]) && !$config["loadStepsSAE"]): ?>
            	tabTec.show();
			<?php endif; ?>
            if (frame) {
                $(frame).contents().find('body').attr('style', 'overflow-y:hidden;margin:0');
            }
        }
		
		function saveDataFromAgenda () {
			frame = $('#id_agenda_frame');
			Hora_Inicio = frame.contents().find('#dateconf input[name=Hora_Inicio]').val();
			Hora_Fim = frame.contents().find('#dateconf input[name=Hora_Fim]').val();
			Data_Inicio = frame.contents().find('#dateconf input[name=Data_Inicio]').val();
			Data_Fim = frame.contents().find('#dateconf input[name=Data_Fim]').val();

			$('#id_sc_field_data_inicio').val(Data_Inicio);
			$('#id_sc_field_hora_inicio').val(Hora_Inicio);
			$('#id_sc_field_data_fim').val(Data_Fim);
			$('#id_sc_field_hora_fim').val(Hora_Fim);
		}

		function setResumoAgenda () {
			if ($('#id_sc_field_data_inicio').val() && $('#id_sc_field_hora_inicio').val() && $('#id_sc_field_data_fim').val() && $('#id_sc_field_hora_fim').val()) {
				Data_Inicio = $('#id_sc_field_data_inicio').val();
				Hora_Inicio = $('#id_sc_field_hora_inicio').val();
				Data_Fim = $('#id_sc_field_data_fim').val();
				Hora_Fim = $('#id_sc_field_hora_fim').val();

				Hora_Inicio = (new moment(Data_Inicio+" "+Hora_Inicio)).format("HH:mm");
				Hora_Fim = (new moment(Data_Fim+" "+Hora_Fim)).format("HH:mm");
				Data_Inicio = (new moment(Data_Inicio)).format("DD/MM/YYYY");
				Data_Fim = (new moment(Data_Fim)).format("DD/MM/YYYY");
				html = `<?=  $this->Ini->Nm_lang['lang_label_start']  ?>: <strong>`+Data_Inicio+` `+Hora_Inicio+`</strong><br>
					<?=  $this->Ini->Nm_lang['lang_label_end']  ?>: <strong>`+Data_Fim+` `+Hora_Fim+`</strong>`;
				$('#id_ajax_label_resumoagendastatus').html(html);
			}
		}
		
		function updateStatsFrame(frame) {
			<?php if ($config['showPAS']): ?> 
				$tabPAS.show(); 
				nSize = $('#id_pas_frame').contents().find('body').height();
				nSize = nSize < 600 ? 600 : nSize;
				$('#id_pas_frame').height(nSize);
				$pasTd.height(nSize);
			<?php endif; ?>
		
			if (frame) {
				$(frame).contents().find('body').attr('style', 'overflow-y:hidden');
			} 
		}
								   
		function sendAnalise () {
			$('#id_sc_field_sendanaliseonclick').click();				   
		}
								   
		function setSugestao (element) {
			element = $(element);
			Di = element.data('di');
			Df = element.data('df');
			if (!Di || !Df) return;
			Di = new Date(Di);
			Df = new Date(Df);
            if (Di && Df) {
                strDay = ("0" + Di.getDate()).slice(-2);
                strMonth = ("0" + (Di.getMonth()+1)).slice(-2);
                strYear = Di.getFullYear();
                strHours = ("0" + Di.getHours()).slice(-2);
                strMinutes = ("0" + Di.getMinutes()).slice(-2);
                $('[name=data_inicio], [name=sc_clone_data_inicio]').val(strDay+"/"+strMonth+"/"+strYear);
			    $('[name=hora_inicio], [name=sc_clone_hora_inicio]').val(strHours+":"+strMinutes);

                strDay = ("0" + Df.getDate()).slice(-2);
                strMonth = ("0" + (Df.getMonth()+1)).slice(-2);
                strYear = Df.getFullYear();
                strHours = ("0" + Df.getHours()).slice(-2);
                strMinutes = ("0" + Df.getMinutes()).slice(-2);
                $('[name=data_fim], [name=sc_clone_data_fim]').val(strDay+"/"+strMonth+"/"+strYear);
                $('[name=hora_fim], [name=sc_clone_hora_fim]').val(strHours+":"+strMinutes);
            }
		}
								   
		function changeSugestao(element) {
			dataMes = $(element).data('mes');
			$('.div-sugestao').each(function(i,o) {
				dataMesDiv = $(o).data('mes');
				if (dataMesDiv == dataMes) {
					$(o).addClass('div-selected-sugestao');
				} else {
					$(o).removeClass('div-selected-sugestao');
				}
			});
			$('.titulo-sugestao a.a-sugestao').each(function(i,o) {
				dataMesA = $(o).data('mes');
				if (dataMesA == dataMes) {
					$(o).addClass('a-selected-sugestao');
				} else {
					$(o).removeClass('a-selected-sugestao');
				}
			});
		}
    </script>

<?php
    


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function removerOnClick_onClick($tipo_cliente, $id_usuario, $id_prestador, $sugestaoagenda, $id_operadora, $os_info, $tiposae, $tecprestadora, $tecoperadora, $stepprestadora, $stepoperadora, $stepempreendimento, $stepdescricao, $stepagendamento, $sendanaliseonclick, $id_conjunto, $savestatusonclick, $savegbtonclick, $savedataonclick, $resumoagendastatus, $resumoagenda, $removeronclick, $label_pas, $empreendimentofuncionamento, $confirmgbtdisponclick, $id_condomino, $id_andar, $gbt_selecionados, $gbt_disponiveis, $referenteprojeto, $pontodeencontro, $optantegbtec, $num_ativo, $id_empreendimento, $id_usuario_fechamento, $data_fechamento, $num_status, $data_abertura, $num_sae, $desc, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id_tiposae, $emergencial, $instalacaoantena, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1, $id)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_sae = $this->num_sae;
$original_id = $this->id;
$original_tipo_cliente = $this->tipo_cliente;
$original_id_usuario = $this->id_usuario;
$original_id_prestador = $this->id_prestador;
$original_sugestaoagenda = $this->sugestaoagenda;
$original_id_operadora = $this->id_operadora;
$original_os_info = $this->os_info;
$original_tiposae = $this->tiposae;
$original_tecprestadora = $this->tecprestadora;
$original_tecoperadora = $this->tecoperadora;
$original_stepprestadora = $this->stepprestadora;
$original_stepoperadora = $this->stepoperadora;
$original_stepempreendimento = $this->stepempreendimento;
$original_stepdescricao = $this->stepdescricao;
$original_stepagendamento = $this->stepagendamento;
$original_sendanaliseonclick = $this->sendanaliseonclick;
$original_id_conjunto = $this->id_conjunto;
$original_savestatusonclick = $this->savestatusonclick;
$original_savegbtonclick = $this->savegbtonclick;
$original_savedataonclick = $this->savedataonclick;
$original_resumoagendastatus = $this->resumoagendastatus;
$original_resumoagenda = $this->resumoagenda;
$original_removeronclick = $this->removeronclick;
$original_label_pas = $this->label_pas;
$original_empreendimentofuncionamento = $this->empreendimentofuncionamento;
$original_confirmgbtdisponclick = $this->confirmgbtdisponclick;
$original_id_condomino = $this->id_condomino;
$original_id_andar = $this->id_andar;
$original_gbt_selecionados = $this->gbt_selecionados;
$original_gbt_disponiveis = $this->gbt_disponiveis;
$original_referenteprojeto = $this->referenteprojeto;
$original_pontodeencontro = $this->pontodeencontro;
$original_optantegbtec = $this->optantegbtec;
$original_num_ativo = $this->num_ativo;
$original_id_empreendimento = $this->id_empreendimento;
$original_id_usuario_fechamento = $this->id_usuario_fechamento;
$original_data_fechamento = $this->data_fechamento;
$original_num_status = $this->num_status;
$original_data_abertura = $this->data_abertura;
$original_num_sae = $this->num_sae;
$original_desc = $this->desc;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id_tiposae = $this->id_tiposae;
$original_emergencial = $this->emergencial;
$original_instalacaoantena = $this->instalacaoantena;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id = $this->id;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

$s = new manageSession();
$msg = "";
$Error = false;

if (!$Error) {
	 
      $nm_select = "DELETE FROM tb_tecsae WHERE Num_SAE = '$this->num_sae'"; 
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
	 
      $nm_select = "DELETE a, b 
		FROM tb_saetecgb a 
		INNER JOIN tb_agenda b ON b.ID = a.ID_Agenda 
		WHERE a.Num_SAE = '$this->num_sae' 
		"; 
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
	 
      $nm_select = "UPDATE tb_sae SET Num_Ativo = 'R' WHERE ID = '$this->id'"; 
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
	
	$modelLogs->insert([
		"Modulo" => "SAE",
		"Funcao" => "DELETAR",
		"Descricao" => 'Remoção de SAE',
		"Conteudo" => $modelLogs->getConteudo()
	]);
	$s->setIUDState("grid_sae", "D", "success");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_sae') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg,
		'{"sizeClass":"md"}'
	));
}

$modificado_num_sae = $this->num_sae;
$modificado_id = $this->id;
$modificado_tipo_cliente = $this->tipo_cliente;
$modificado_id_usuario = $this->id_usuario;
$modificado_id_prestador = $this->id_prestador;
$modificado_sugestaoagenda = $this->sugestaoagenda;
$modificado_id_operadora = $this->id_operadora;
$modificado_os_info = $this->os_info;
$modificado_tiposae = $this->tiposae;
$modificado_tecprestadora = $this->tecprestadora;
$modificado_tecoperadora = $this->tecoperadora;
$modificado_stepprestadora = $this->stepprestadora;
$modificado_stepoperadora = $this->stepoperadora;
$modificado_stepempreendimento = $this->stepempreendimento;
$modificado_stepdescricao = $this->stepdescricao;
$modificado_stepagendamento = $this->stepagendamento;
$modificado_sendanaliseonclick = $this->sendanaliseonclick;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_savestatusonclick = $this->savestatusonclick;
$modificado_savegbtonclick = $this->savegbtonclick;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_resumoagendastatus = $this->resumoagendastatus;
$modificado_resumoagenda = $this->resumoagenda;
$modificado_removeronclick = $this->removeronclick;
$modificado_label_pas = $this->label_pas;
$modificado_empreendimentofuncionamento = $this->empreendimentofuncionamento;
$modificado_confirmgbtdisponclick = $this->confirmgbtdisponclick;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_andar = $this->id_andar;
$modificado_gbt_selecionados = $this->gbt_selecionados;
$modificado_gbt_disponiveis = $this->gbt_disponiveis;
$modificado_referenteprojeto = $this->referenteprojeto;
$modificado_pontodeencontro = $this->pontodeencontro;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id_usuario_fechamento = $this->id_usuario_fechamento;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_num_status = $this->num_status;
$modificado_data_abertura = $this->data_abertura;
$modificado_num_sae = $this->num_sae;
$modificado_desc = $this->desc;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_instalacaoantena = $this->instalacaoantena;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id = $this->id;
$this->nm_formatar_campos('num_sae', 'id');
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_tipo_cliente !== $modificado_tipo_cliente || isset($this->nmgp_cmp_readonly['tipo_cliente']) || (isset($bFlagRead_tipo_cliente) && $bFlagRead_tipo_cliente))
{
    $this->ajax_return_values_tipo_cliente(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_sugestaoagenda !== $modificado_sugestaoagenda || isset($this->nmgp_cmp_readonly['sugestaoagenda']) || (isset($bFlagRead_sugestaoagenda) && $bFlagRead_sugestaoagenda))
{
    $this->ajax_return_values_sugestaoagenda(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_os_info !== $modificado_os_info || isset($this->nmgp_cmp_readonly['os_info']) || (isset($bFlagRead_os_info) && $bFlagRead_os_info))
{
    $this->ajax_return_values_os_info(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_tecprestadora !== $modificado_tecprestadora || isset($this->nmgp_cmp_readonly['tecprestadora']) || (isset($bFlagRead_tecprestadora) && $bFlagRead_tecprestadora))
{
    $this->ajax_return_values_tecprestadora(true);
}
if ($original_tecoperadora !== $modificado_tecoperadora || isset($this->nmgp_cmp_readonly['tecoperadora']) || (isset($bFlagRead_tecoperadora) && $bFlagRead_tecoperadora))
{
    $this->ajax_return_values_tecoperadora(true);
}
if ($original_stepprestadora !== $modificado_stepprestadora || isset($this->nmgp_cmp_readonly['stepprestadora']) || (isset($bFlagRead_stepprestadora) && $bFlagRead_stepprestadora))
{
    $this->ajax_return_values_stepprestadora(true);
}
if ($original_stepoperadora !== $modificado_stepoperadora || isset($this->nmgp_cmp_readonly['stepoperadora']) || (isset($bFlagRead_stepoperadora) && $bFlagRead_stepoperadora))
{
    $this->ajax_return_values_stepoperadora(true);
}
if ($original_stepempreendimento !== $modificado_stepempreendimento || isset($this->nmgp_cmp_readonly['stepempreendimento']) || (isset($bFlagRead_stepempreendimento) && $bFlagRead_stepempreendimento))
{
    $this->ajax_return_values_stepempreendimento(true);
}
if ($original_stepdescricao !== $modificado_stepdescricao || isset($this->nmgp_cmp_readonly['stepdescricao']) || (isset($bFlagRead_stepdescricao) && $bFlagRead_stepdescricao))
{
    $this->ajax_return_values_stepdescricao(true);
}
if ($original_stepagendamento !== $modificado_stepagendamento || isset($this->nmgp_cmp_readonly['stepagendamento']) || (isset($bFlagRead_stepagendamento) && $bFlagRead_stepagendamento))
{
    $this->ajax_return_values_stepagendamento(true);
}
if ($original_sendanaliseonclick !== $modificado_sendanaliseonclick || isset($this->nmgp_cmp_readonly['sendanaliseonclick']) || (isset($bFlagRead_sendanaliseonclick) && $bFlagRead_sendanaliseonclick))
{
    $this->ajax_return_values_sendanaliseonclick(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_savestatusonclick !== $modificado_savestatusonclick || isset($this->nmgp_cmp_readonly['savestatusonclick']) || (isset($bFlagRead_savestatusonclick) && $bFlagRead_savestatusonclick))
{
    $this->ajax_return_values_savestatusonclick(true);
}
if ($original_savegbtonclick !== $modificado_savegbtonclick || isset($this->nmgp_cmp_readonly['savegbtonclick']) || (isset($bFlagRead_savegbtonclick) && $bFlagRead_savegbtonclick))
{
    $this->ajax_return_values_savegbtonclick(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_resumoagendastatus !== $modificado_resumoagendastatus || isset($this->nmgp_cmp_readonly['resumoagendastatus']) || (isset($bFlagRead_resumoagendastatus) && $bFlagRead_resumoagendastatus))
{
    $this->ajax_return_values_resumoagendastatus(true);
}
if ($original_resumoagenda !== $modificado_resumoagenda || isset($this->nmgp_cmp_readonly['resumoagenda']) || (isset($bFlagRead_resumoagenda) && $bFlagRead_resumoagenda))
{
    $this->ajax_return_values_resumoagenda(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_label_pas !== $modificado_label_pas || isset($this->nmgp_cmp_readonly['label_pas']) || (isset($bFlagRead_label_pas) && $bFlagRead_label_pas))
{
    $this->ajax_return_values_label_pas(true);
}
if ($original_empreendimentofuncionamento !== $modificado_empreendimentofuncionamento || isset($this->nmgp_cmp_readonly['empreendimentofuncionamento']) || (isset($bFlagRead_empreendimentofuncionamento) && $bFlagRead_empreendimentofuncionamento))
{
    $this->ajax_return_values_empreendimentofuncionamento(true);
}
if ($original_confirmgbtdisponclick !== $modificado_confirmgbtdisponclick || isset($this->nmgp_cmp_readonly['confirmgbtdisponclick']) || (isset($bFlagRead_confirmgbtdisponclick) && $bFlagRead_confirmgbtdisponclick))
{
    $this->ajax_return_values_confirmgbtdisponclick(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_andar !== $modificado_id_andar || isset($this->nmgp_cmp_readonly['id_andar']) || (isset($bFlagRead_id_andar) && $bFlagRead_id_andar))
{
    $this->ajax_return_values_id_andar(true);
}
if ($original_gbt_selecionados !== $modificado_gbt_selecionados || isset($this->nmgp_cmp_readonly['gbt_selecionados']) || (isset($bFlagRead_gbt_selecionados) && $bFlagRead_gbt_selecionados))
{
    $this->ajax_return_values_gbt_selecionados(true);
}
if ($original_gbt_disponiveis !== $modificado_gbt_disponiveis || isset($this->nmgp_cmp_readonly['gbt_disponiveis']) || (isset($bFlagRead_gbt_disponiveis) && $bFlagRead_gbt_disponiveis))
{
    $this->ajax_return_values_gbt_disponiveis(true);
}
if ($original_referenteprojeto !== $modificado_referenteprojeto || isset($this->nmgp_cmp_readonly['referenteprojeto']) || (isset($bFlagRead_referenteprojeto) && $bFlagRead_referenteprojeto))
{
    $this->ajax_return_values_referenteprojeto(true);
}
if ($original_pontodeencontro !== $modificado_pontodeencontro || isset($this->nmgp_cmp_readonly['pontodeencontro']) || (isset($bFlagRead_pontodeencontro) && $bFlagRead_pontodeencontro))
{
    $this->ajax_return_values_pontodeencontro(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id_usuario_fechamento !== $modificado_id_usuario_fechamento || isset($this->nmgp_cmp_readonly['id_usuario_fechamento']) || (isset($bFlagRead_id_usuario_fechamento) && $bFlagRead_id_usuario_fechamento))
{
    $this->ajax_return_values_id_usuario_fechamento(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_data_abertura !== $modificado_data_abertura || isset($this->nmgp_cmp_readonly['data_abertura']) || (isset($bFlagRead_data_abertura) && $bFlagRead_data_abertura))
{
    $this->ajax_return_values_data_abertura(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_instalacaoantena !== $modificado_instalacaoantena || isset($this->nmgp_cmp_readonly['instalacaoantena']) || (isset($bFlagRead_instalacaoantena) && $bFlagRead_instalacaoantena))
{
    $this->ajax_return_values_instalacaoantena(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadSAE_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($tipo_cliente, $id_usuario, $id_prestador, $id_operadora, $id_conjunto, $id_condomino, $id_empreendimento, $id_usuario_fechamento, $data_fechamento, $num_status, $data_abertura, $num_sae, $desc, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id_tiposae, $emergencial, $instalacaoantena, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1, $id)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_Num_SAE)) {$this->sc_temp_Num_SAE = (isset($_SESSION['Num_SAE'])) ? $_SESSION['Num_SAE'] : "";}
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_id_empreendimento = $this->id_empreendimento;
$original_tiposae = $this->tiposae;
$original_desc = $this->desc;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone2 = $this->num_telefone2;
$original_num_celular2 = $this->num_celular2;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_telefone3 = $this->num_telefone3;
$original_num_celular3 = $this->num_celular3;
$original_id_tiposae = $this->id_tiposae;
$original_optantegbtec = $this->optantegbtec;
$original_num_sae = $this->num_sae;
$original_tipo_cliente = $this->tipo_cliente;
$original_id_usuario = $this->id_usuario;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_id_conjunto = $this->id_conjunto;
$original_id_condomino = $this->id_condomino;
$original_id_empreendimento = $this->id_empreendimento;
$original_id_usuario_fechamento = $this->id_usuario_fechamento;
$original_data_fechamento = $this->data_fechamento;
$original_num_status = $this->num_status;
$original_data_abertura = $this->data_abertura;
$original_num_sae = $this->num_sae;
$original_desc = $this->desc;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id_tiposae = $this->id_tiposae;
$original_emergencial = $this->emergencial;
$original_instalacaoantena = $this->instalacaoantena;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id = $this->id;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library("sys", "models", "Tecsae.php");
$_Tecsae = new Tecsae($this);

$Num_TipoUsuario = $s->get("Num_TipoUsuario");
$resp = [
	's' => true,
	'm' => '',
	'd' => '',
	'f' => array()
];

if ($this->num_telefone1  == '' || $this->nom_responsavel1  == '') { $resp['s'] = false; array_push($resp['f'], 'Num_Telefone1'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fill_data'] .'<br>'; }
if ($Num_TipoUsuario == "P" && $this->id_prestador  == '') { $resp['s'] = false; array_push($resp['f'], 'ID_Prestador'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specify_service_prov'] .'<br>';}
if ($Num_TipoUsuario == "O" && $this->id_operadora  == '') { $resp['s'] = false; array_push($resp['f'], 'ID_Operadora'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specifyOperator'] .'<br>';}
if ($this->id_empreendimento  == '') { $resp['s'] = false; array_push($resp['f'], 'ID_Empreendimento'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specifyEnterprise'] .'<br>';}
if ($this->tiposae  == '') { $resp['s'] = false; array_push($resp['f'], 'tipoSAE'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_SAEType'] .'<br>';}
if ($this->desc  == '') { $resp['s'] = false; array_push($resp['f'], 'Desc');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillServiceDesc'] .'<br>';}
if ($this->data_inicio  == 'null' || $this->hora_inicio  == 'null' || $this->data_fim  == 'null' || $this->hora_fim  == 'null') { 
	$resp['s'] = false; array_push($resp['f'], 'DataHora');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specifySchedule'] .'<br>';}
if ($Num_TipoUsuario == "O" && ($this->nom_responsavel2  == '' || ($this->num_telefone2  == '' && $this->num_celular2  == ''))) { 
	$resp['s'] = false; array_push($resp['f'], 'Responsavel2');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillDataOper'] .'<br>';}
elseif ($Num_TipoUsuario == "P" && ($this->nom_responsavel3  == '' || ($this->num_telefone3  == '' && $this->num_celular3  == ''))) { 
	$resp['s'] = false; array_push($resp['f'], 'Responsavel3');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillDataProv'] .'<br>';}
elseif (($Num_TipoUsuario == "G" || $Num_TipoUsuario == "GT") && ($this->nom_responsavel2  == '' || ($this->num_telefone2  == '' && $this->num_celular2  == '')) && ($this->nom_responsavel3  == '' || ($this->num_telefone3  == '' && $this->num_celular3  == ''))) {
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fill_OperProv'] .'<br>';
}

if ($resp['s']) {
	$Tecsae = $_Tecsae->getByNum_SAE($this->sc_temp_Num_SAE);
	if (($this->id_operadora  != "0" && $Tecsae["O"] == 0) || ($this->id_prestador  != "0" && $Tecsae["P"] == 0)) {
		$resp['s'] = false;
		$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillTec'] .'<br>';
	}
}


if ($resp['s']) {
    $_validateInterval =$this->validateInterval($this->data_inicio , $this->hora_inicio , $this->data_fim , $this->hora_fim );
	if (!$_validateInterval['s']) {
		$resp['s'] = false; array_push($resp['f'], 'invalidDataHora');
		$resp['m'] .= $_validateInterval['m'];
	}
}

if ($resp['s']) {
	$this->sc_ajax_javascript('saveDataForm');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}


if (isset($this->sc_temp_Num_SAE)) { $_SESSION['Num_SAE'] = $this->sc_temp_Num_SAE;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_tiposae = $this->tiposae;
$modificado_desc = $this->desc;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_celular2 = $this->num_celular2;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_num_celular3 = $this->num_celular3;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_num_sae = $this->num_sae;
$modificado_tipo_cliente = $this->tipo_cliente;
$modificado_id_usuario = $this->id_usuario;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id_usuario_fechamento = $this->id_usuario_fechamento;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_num_status = $this->num_status;
$modificado_data_abertura = $this->data_abertura;
$modificado_num_sae = $this->num_sae;
$modificado_desc = $this->desc;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_instalacaoantena = $this->instalacaoantena;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id = $this->id;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_prestador', 'id_operadora', 'id_empreendimento', 'tiposae', 'desc', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'nom_responsavel2', 'num_telefone2', 'num_celular2', 'nom_responsavel3', 'num_telefone3', 'num_celular3', 'id_tiposae', 'optantegbtec', 'num_sae');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
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
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_tipo_cliente !== $modificado_tipo_cliente || isset($this->nmgp_cmp_readonly['tipo_cliente']) || (isset($bFlagRead_tipo_cliente) && $bFlagRead_tipo_cliente))
{
    $this->ajax_return_values_tipo_cliente(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id_usuario_fechamento !== $modificado_id_usuario_fechamento || isset($this->nmgp_cmp_readonly['id_usuario_fechamento']) || (isset($bFlagRead_id_usuario_fechamento) && $bFlagRead_id_usuario_fechamento))
{
    $this->ajax_return_values_id_usuario_fechamento(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_data_abertura !== $modificado_data_abertura || isset($this->nmgp_cmp_readonly['data_abertura']) || (isset($bFlagRead_data_abertura) && $bFlagRead_data_abertura))
{
    $this->ajax_return_values_data_abertura(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_instalacaoantena !== $modificado_instalacaoantena || isset($this->nmgp_cmp_readonly['instalacaoantena']) || (isset($bFlagRead_instalacaoantena) && $bFlagRead_instalacaoantena))
{
    $this->ajax_return_values_instalacaoantena(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadSAE_pack_ajax_response();
exit;
}
function saveGBTOnClick_onClick($num_status, $num_sae, $hora_fim, $data_fim, $hora_inicio, $data_inicio)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_gbt_sae = $this->gbt_sae;
$original_num_sae = $this->num_sae;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_id_empreendimento = $this->id_empreendimento;
$original_id_operadora = $this->id_operadora;
$original_id_prestador = $this->id_prestador;
$original_tipo_cliente = $this->tipo_cliente;
$original_id_condomino = $this->id_condomino;
$original_num_status = $this->num_status;
$original_num_sae = $this->num_sae;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library("sys", "functions", "validateEventCalendar.php");
sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Usuarios.php');
$modelLogs = new Logs($this);
$modelUsuarios = new Usuarios($this);

$GBT_arr = $this->gbt_sae  ? explode('@?@', $this->gbt_sae ) : [];
$GBT_comma = "'".implode("','", $GBT_arr)."'";

if ($this->num_sae  != '' && $this->data_inicio  != '' && $this->hora_inicio  != '' && $this->data_fim  != '' && $this->hora_fim  != '') {
	$listToDelete = $modelUsuarios->query("SELECT a.ID_Usuario FROM tb_saetecgb a WHERE a.ID_Usuario NOT IN ($GBT_comma) AND a.Num_SAE = '$this->num_sae' GROUP BY a.ID_Usuario");
	
$this->deleteGBTAgenda($GBT_comma);
	 
      $nm_select = "SELECT ID_Usuario FROM tb_saetecgb 
			WHERE Num_SAE = '$this->num_sae'
		"; 
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
;
	
	$listToInsert = [];
	if(isset($this->rs[0][0])) {
		$nRs = [];
		foreach($this->rs as $i => $row) {
			$nRs[$i] = $row[0];
		}
		
		foreach($GBT_arr as $GBT_item) {
			if (!in_array($GBT_item, $nRs)) {
				array_push($listToInsert, $GBT_item);
			}
		}
	} else {
		$listToInsert = $GBT_arr;
	}

	if (count($listToInsert)) {
		foreach($listToInsert as $i => $ID_Usuario) {
			$addNightTime = (isEntry("19:00:00", ($this->hora_inicio  ? $this->hora_inicio  : "00:00:00"), "06:00:00") || isEntry("19:00:00", ($this->hora_fim  ? $this->hora_fim  : "23:59:00"), "06:00:00"));
			$sqlIns = "INSERT INTO tb_agenda 
				(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
				VALUES 
				('SAE $this->num_sae ', '', '$this->data_inicio', '$this->hora_inicio', '$this->data_fim', '$this->hora_fim', 'N', 'D', '$ID_Usuario', 'sae');
				INSERT INTO tb_saetecgb 
				(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
			";
			 
      $nm_select = $sqlIns; 
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
			if ($addNightTime) {
				$time = $this->data_fim .' '.($this->hora_fim  ? $this->hora_fim  : "23:59:00");
				$nightTime = [
					"Df" => date("Y-m-d", strtotime($time) + 11 * 60 * 60),
					"Hf" => date("H:i:s", strtotime($time) + 11 * 60 * 60)
				];
				$sqlIns = "INSERT INTO tb_agenda 
					(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
					VALUES 
					('Intervalo de Descanso: SAE $this->num_sae ', '', '$this->data_fim', '".($this->hora_fim  ? $this->hora_fim  : '23:59:00')."', '".$nightTime['Df']."', '".$nightTime['Hf']."', 'N', 'D', '$ID_Usuario', 'descanso');
					INSERT INTO tb_saetecgb 
					(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
				";
				 
      $nm_select = $sqlIns; 
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
	}
	
	$listGBT = array();
	foreach ($listToInsert as $gbt) {
		$gbtUser = $modelUsuarios->getById(intval($gbt));
		if ($gbtUser) unset($gbtUser["IMG_Foto"]);
		$listGBT[$gbt] = $gbtUser;
	}
	
$this->sendMailGBTNotify($listToInsert, $listToDelete);
	
	$modelLogs->insert([
		"Modulo" => "SAE",
		"Funcao" => "DELEGATEGBT",
		"Classe" => "Saetecgb",
		"Descricao" => 'Atribuição de técnico GLOBALBLUE na SAE',
		"Conteudo" => [
			"Num_SAE" => $this->num_sae ,
			"GBTList" => $GBT_arr,
			"GBT" => $listGBT
		]
	]);	
}
if ($s->get("SAE_pdf_tmpdir")) {
	if (file_exists($s->get("SAE_pdf_tmpdir"))) unlink($s->get("SAE_pdf_tmpdir"));
	$s->destroy("SAE_pdf_tmpdir");
}





$modificado_gbt_sae = $this->gbt_sae;
$modificado_num_sae = $this->num_sae;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_prestador = $this->id_prestador;
$modificado_tipo_cliente = $this->tipo_cliente;
$modificado_id_condomino = $this->id_condomino;
$modificado_num_status = $this->num_status;
$modificado_num_sae = $this->num_sae;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$this->nm_formatar_campos('gbt_sae', 'num_sae', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'id_empreendimento', 'id_operadora', 'id_prestador', 'tipo_cliente', 'id_condomino');
if ($original_gbt_sae !== $modificado_gbt_sae || isset($this->nmgp_cmp_readonly['gbt_sae']) || (isset($bFlagRead_gbt_sae) && $bFlagRead_gbt_sae))
{
    $this->ajax_return_values_gbt_sae(true);
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
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_tipo_cliente !== $modificado_tipo_cliente || isset($this->nmgp_cmp_readonly['tipo_cliente']) || (isset($bFlagRead_tipo_cliente) && $bFlagRead_tipo_cliente))
{
    $this->ajax_return_values_tipo_cliente(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
form_CadSAE_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function saveStatusOnClick_onClick($tipo_cliente, $id_usuario, $id_prestador, $id_operadora, $os_info, $tiposae, $tecprestadora, $tecoperadora, $stepprestadora, $stepoperadora, $stepempreendimento, $stepdescricao, $stepagendamento, $sendanaliseonclick, $id_conjunto, $savestatusonclick, $savegbtonclick, $savedataonclick, $resumoagendastatus, $resumoagenda, $removeronclick, $label_pas, $empreendimentofuncionamento, $confirmgbtdisponclick, $id_condomino, $id_andar, $gbt_selecionados, $gbt_disponiveis, $referenteprojeto, $pontodeencontro, $optantegbtec, $num_ativo, $id_empreendimento, $id_usuario_fechamento, $data_fechamento, $num_status, $data_abertura, $num_sae, $desc, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id_tiposae, $emergencial, $instalacaoantena, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1, $id)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_sae = $this->num_sae;
$original_num_status = $this->num_status;
$original_data_fechamento = $this->data_fechamento;
$original_id_usuario_fechamento = $this->id_usuario_fechamento;
$original_id_usuario = $this->id_usuario;
$original_id_operadora = $this->id_operadora;
$original_id_prestador = $this->id_prestador;
$original_id_empreendimento = $this->id_empreendimento;
$original_tipo_cliente = $this->tipo_cliente;
$original_id_usuario = $this->id_usuario;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_os_info = $this->os_info;
$original_tiposae = $this->tiposae;
$original_tecprestadora = $this->tecprestadora;
$original_tecoperadora = $this->tecoperadora;
$original_stepprestadora = $this->stepprestadora;
$original_stepoperadora = $this->stepoperadora;
$original_stepempreendimento = $this->stepempreendimento;
$original_stepdescricao = $this->stepdescricao;
$original_stepagendamento = $this->stepagendamento;
$original_sendanaliseonclick = $this->sendanaliseonclick;
$original_id_conjunto = $this->id_conjunto;
$original_savestatusonclick = $this->savestatusonclick;
$original_savegbtonclick = $this->savegbtonclick;
$original_savedataonclick = $this->savedataonclick;
$original_resumoagendastatus = $this->resumoagendastatus;
$original_resumoagenda = $this->resumoagenda;
$original_removeronclick = $this->removeronclick;
$original_label_pas = $this->label_pas;
$original_empreendimentofuncionamento = $this->empreendimentofuncionamento;
$original_confirmgbtdisponclick = $this->confirmgbtdisponclick;
$original_id_condomino = $this->id_condomino;
$original_id_andar = $this->id_andar;
$original_gbt_selecionados = $this->gbt_selecionados;
$original_gbt_disponiveis = $this->gbt_disponiveis;
$original_referenteprojeto = $this->referenteprojeto;
$original_pontodeencontro = $this->pontodeencontro;
$original_optantegbtec = $this->optantegbtec;
$original_num_ativo = $this->num_ativo;
$original_id_empreendimento = $this->id_empreendimento;
$original_id_usuario_fechamento = $this->id_usuario_fechamento;
$original_data_fechamento = $this->data_fechamento;
$original_num_status = $this->num_status;
$original_data_abertura = $this->data_abertura;
$original_num_sae = $this->num_sae;
$original_desc = $this->desc;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id_tiposae = $this->id_tiposae;
$original_emergencial = $this->emergencial;
$original_instalacaoantena = $this->instalacaoantena;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id = $this->id;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
sc_include_library('sys', 'models', 'Sae.php');
$_Sae = new Sae($this);
sc_include_library("sys", "models", "Pas.php");
$_Pas = new Pas($this);

$m = new sendEmail();
$s = new manageSession();
$ID_Usuario = $s->get('ID_Usuario');

if ($this->num_sae  != '' && 
	(in_array($this->num_status , ['AE','AA','AP','A','RAE','C'])) && 
	$ID_Usuario != '') {
	$Data_Fechamento = $this->num_status  == 'A' ? date('Y-m-d H:i:s') : null;
	$data = [
		"Num_Status" => $this->num_status ,
		"Data_Fechamento" => $Data_Fechamento,
		"ID_Usuario_Fechamento" => $ID_Usuario
	];
	$_Sae->save("Num_SAE = '$this->num_sae'", $data);
	$this->data_fechamento  = date('Y-m-d H:i:s');
	$this->id_usuario_fechamento  = $ID_Usuario;
	$modelLogs->insert([
		"Modulo" => "SAE",
		"Funcao" => "EDITAR",
		"Descricao" => 'Alteração de status da SAE',
		"Conteudo" => $modelLogs->getConteudo()
	]);
}


switch($this->num_status ) {
	case('AE'): $nameStatus = "AGUARDANDO ENVIO"; $addContent = ""; $alert = "good"; break; 
	case('AA'): $nameStatus = "AGUARDANDO ANÁLISE"; $addContent = ""; $alert = "good"; break; 
	case('AP'): $nameStatus = "AGUARDANDO PAS"; $addContent = "
		Isso significa que existe disponibilidade para a execução no período solicitado, e para confirmação do seu agendamento, será necessário acessar o módulo de PAS e submeter o pedido a aprovação.<br><br>
		Criando uma PAS:<br>
		<ol>
			<li>Acesse o módulo de PAS localizado no menu principal do sistema;</li>
			<li>Preencha as informações solicitadas:<br>
				<ul>
					<li>Supervisão Técnica;</li>
					<li>Código de referência da SAE aprovada anteriormente;</li>
					<li>Contato dos Responsáveis;</li>
				</ul>
			</li>
			<li>\"Imprima\" e anexe o arquivo assinado;</li>
			<li>Submeta (Salvar e Enviar para Análise) o documento no próprio sistema para aprovação;</li>
		</ol><br>
		"; 
		$alert = "warning"; 
	break;
	case('A'): $nameStatus = "APROVADA"; $addContent = ""; $alert = "good"; break;
	case('RAE'): 
		$nameStatus = "SOLICITAÇÃO NÃO ACEITA, AGUARDANDO REENVIO"; 
		$addContent = "Favor entrar no sistema CNSData e verificar o motivo da não aceitação, e enviar uma nova solicitação.<br><br>";
		$alert = "bad";
		 
      $nm_select = "DELETE a, b 
			FROM tb_saetecgb a 
			INNER JOIN tb_agenda b ON b.ID = a.ID_Agenda 
			WHERE a.Num_SAE = '$this->num_sae' 
		"; 
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
	break;
	case('C'): 
		$nameStatus = "CANCELADA"; 
		$addContent = "
		Segue alguns exemplos, que podem acarretar no cancelamento:<br>
		<ol>
			<li>Informações divergentes;</li> 
			<li>Alterado o dia da atividade;</li>
			<li>Demora para o envio da confirmação, acarretando na perda do agendamento;</li>
		</ol><br>
		Caso deseje um novo acesso, favor acessar o sistema CNSData e fazer uma nova solicitação.<br><br>
		";
		$alert = "bad";
		 
      $nm_select = "DELETE a, b 
			FROM tb_saetecgb a 
			INNER JOIN tb_agenda b ON b.ID = a.ID_Agenda 
			WHERE a.Num_SAE = '$this->num_sae' 
		"; 
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
			"Modulo" => "SAE",
			"Funcao" => "EDITAR",
			"Descricao" => 'Cencelamento de PAS pela SAE',
			"Classe" => "Pas",
			"Conteudo" => $_Pas->cancelPasBySAE($this->num_sae )
		]);
	break;
}


$listEmails =$this->getEmailNotif(["actSae" => "NOTIFAPROVACAO"]);
$dest = $listEmails;
if (count($listEmails) > 0 && isset($nameStatus)) {
	$emailData = [
		"alert" => $alert,
		"title" => "SAE <strong>$this->num_sae </strong><br>$nameStatus",
		"content" => "
			Prezado(a), <br><br>
			Informamos que a SAE $this->num_sae  está: $nameStatus.<br><br>
			$addContent
			Anexo está o documento em formato PDF com os detalhes do agendamento.<br><br>
			<table width='100%'>
				<tr>
					<td>Atenciosamente,<br>Equipe GLOBALBLUE | CNSDATA</td>
					<td><img src=':smLogoGB:' style='float:right;width:100px'></td>
				</tr>
			</table>
		",
		"footer" => "SAE = Solicitação de Autorização de Entrada e Execução de Serviço
			\"Documento necessário para liberar o acesso ao empreendimento, neste documento contém a descrição da atividade, o período, nome dos técnicos e responsáveis pela atividade\""
	];
	
	$listEmails[] = "gabriel.soares@houseti.com.br";
	$m->BCC = $listEmails; 
	$html = emailTemplate($emailData);
	$m->SUBJECT = "GLOBALBLUE | CNSDATA: SAE $this->num_sae  - $nameStatus";
	$m->MESSAGE = $html;
	$Num_SAE = $this->num_sae ;
	$m->ANEXO = $s->get("SAE_pdf_tmpdir") ??$this->generatePDF();
	$modelLogs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Descricao" => 'Notificação por e-mail (SAE)',
		"Conteudo" => ["Num_SAE" => $this->num_sae , "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
	]);
}
$s->setIUDState($this, "U", "success");

if ($s->get("SAE_pdf_tmpdir")) {
	unlink($s->get("SAE_pdf_tmpdir"));
	$s->destroy("SAE_pdf_tmpdir");
}

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadSAE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };


$modificado_num_sae = $this->num_sae;
$modificado_num_status = $this->num_status;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_id_usuario_fechamento = $this->id_usuario_fechamento;
$modificado_id_usuario = $this->id_usuario;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_tipo_cliente = $this->tipo_cliente;
$modificado_id_usuario = $this->id_usuario;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_os_info = $this->os_info;
$modificado_tiposae = $this->tiposae;
$modificado_tecprestadora = $this->tecprestadora;
$modificado_tecoperadora = $this->tecoperadora;
$modificado_stepprestadora = $this->stepprestadora;
$modificado_stepoperadora = $this->stepoperadora;
$modificado_stepempreendimento = $this->stepempreendimento;
$modificado_stepdescricao = $this->stepdescricao;
$modificado_stepagendamento = $this->stepagendamento;
$modificado_sendanaliseonclick = $this->sendanaliseonclick;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_savestatusonclick = $this->savestatusonclick;
$modificado_savegbtonclick = $this->savegbtonclick;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_resumoagendastatus = $this->resumoagendastatus;
$modificado_resumoagenda = $this->resumoagenda;
$modificado_removeronclick = $this->removeronclick;
$modificado_label_pas = $this->label_pas;
$modificado_empreendimentofuncionamento = $this->empreendimentofuncionamento;
$modificado_confirmgbtdisponclick = $this->confirmgbtdisponclick;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_andar = $this->id_andar;
$modificado_gbt_selecionados = $this->gbt_selecionados;
$modificado_gbt_disponiveis = $this->gbt_disponiveis;
$modificado_referenteprojeto = $this->referenteprojeto;
$modificado_pontodeencontro = $this->pontodeencontro;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id_usuario_fechamento = $this->id_usuario_fechamento;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_num_status = $this->num_status;
$modificado_data_abertura = $this->data_abertura;
$modificado_num_sae = $this->num_sae;
$modificado_desc = $this->desc;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_instalacaoantena = $this->instalacaoantena;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id = $this->id;
$this->nm_formatar_campos('num_sae', 'num_status', 'data_fechamento', 'id_usuario_fechamento', 'id_usuario', 'id_operadora', 'id_prestador', 'id_empreendimento');
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_id_usuario_fechamento !== $modificado_id_usuario_fechamento || isset($this->nmgp_cmp_readonly['id_usuario_fechamento']) || (isset($bFlagRead_id_usuario_fechamento) && $bFlagRead_id_usuario_fechamento))
{
    $this->ajax_return_values_id_usuario_fechamento(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_tipo_cliente !== $modificado_tipo_cliente || isset($this->nmgp_cmp_readonly['tipo_cliente']) || (isset($bFlagRead_tipo_cliente) && $bFlagRead_tipo_cliente))
{
    $this->ajax_return_values_tipo_cliente(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_os_info !== $modificado_os_info || isset($this->nmgp_cmp_readonly['os_info']) || (isset($bFlagRead_os_info) && $bFlagRead_os_info))
{
    $this->ajax_return_values_os_info(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_tecprestadora !== $modificado_tecprestadora || isset($this->nmgp_cmp_readonly['tecprestadora']) || (isset($bFlagRead_tecprestadora) && $bFlagRead_tecprestadora))
{
    $this->ajax_return_values_tecprestadora(true);
}
if ($original_tecoperadora !== $modificado_tecoperadora || isset($this->nmgp_cmp_readonly['tecoperadora']) || (isset($bFlagRead_tecoperadora) && $bFlagRead_tecoperadora))
{
    $this->ajax_return_values_tecoperadora(true);
}
if ($original_stepprestadora !== $modificado_stepprestadora || isset($this->nmgp_cmp_readonly['stepprestadora']) || (isset($bFlagRead_stepprestadora) && $bFlagRead_stepprestadora))
{
    $this->ajax_return_values_stepprestadora(true);
}
if ($original_stepoperadora !== $modificado_stepoperadora || isset($this->nmgp_cmp_readonly['stepoperadora']) || (isset($bFlagRead_stepoperadora) && $bFlagRead_stepoperadora))
{
    $this->ajax_return_values_stepoperadora(true);
}
if ($original_stepempreendimento !== $modificado_stepempreendimento || isset($this->nmgp_cmp_readonly['stepempreendimento']) || (isset($bFlagRead_stepempreendimento) && $bFlagRead_stepempreendimento))
{
    $this->ajax_return_values_stepempreendimento(true);
}
if ($original_stepdescricao !== $modificado_stepdescricao || isset($this->nmgp_cmp_readonly['stepdescricao']) || (isset($bFlagRead_stepdescricao) && $bFlagRead_stepdescricao))
{
    $this->ajax_return_values_stepdescricao(true);
}
if ($original_stepagendamento !== $modificado_stepagendamento || isset($this->nmgp_cmp_readonly['stepagendamento']) || (isset($bFlagRead_stepagendamento) && $bFlagRead_stepagendamento))
{
    $this->ajax_return_values_stepagendamento(true);
}
if ($original_sendanaliseonclick !== $modificado_sendanaliseonclick || isset($this->nmgp_cmp_readonly['sendanaliseonclick']) || (isset($bFlagRead_sendanaliseonclick) && $bFlagRead_sendanaliseonclick))
{
    $this->ajax_return_values_sendanaliseonclick(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_savestatusonclick !== $modificado_savestatusonclick || isset($this->nmgp_cmp_readonly['savestatusonclick']) || (isset($bFlagRead_savestatusonclick) && $bFlagRead_savestatusonclick))
{
    $this->ajax_return_values_savestatusonclick(true);
}
if ($original_savegbtonclick !== $modificado_savegbtonclick || isset($this->nmgp_cmp_readonly['savegbtonclick']) || (isset($bFlagRead_savegbtonclick) && $bFlagRead_savegbtonclick))
{
    $this->ajax_return_values_savegbtonclick(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_resumoagendastatus !== $modificado_resumoagendastatus || isset($this->nmgp_cmp_readonly['resumoagendastatus']) || (isset($bFlagRead_resumoagendastatus) && $bFlagRead_resumoagendastatus))
{
    $this->ajax_return_values_resumoagendastatus(true);
}
if ($original_resumoagenda !== $modificado_resumoagenda || isset($this->nmgp_cmp_readonly['resumoagenda']) || (isset($bFlagRead_resumoagenda) && $bFlagRead_resumoagenda))
{
    $this->ajax_return_values_resumoagenda(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_label_pas !== $modificado_label_pas || isset($this->nmgp_cmp_readonly['label_pas']) || (isset($bFlagRead_label_pas) && $bFlagRead_label_pas))
{
    $this->ajax_return_values_label_pas(true);
}
if ($original_empreendimentofuncionamento !== $modificado_empreendimentofuncionamento || isset($this->nmgp_cmp_readonly['empreendimentofuncionamento']) || (isset($bFlagRead_empreendimentofuncionamento) && $bFlagRead_empreendimentofuncionamento))
{
    $this->ajax_return_values_empreendimentofuncionamento(true);
}
if ($original_confirmgbtdisponclick !== $modificado_confirmgbtdisponclick || isset($this->nmgp_cmp_readonly['confirmgbtdisponclick']) || (isset($bFlagRead_confirmgbtdisponclick) && $bFlagRead_confirmgbtdisponclick))
{
    $this->ajax_return_values_confirmgbtdisponclick(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_andar !== $modificado_id_andar || isset($this->nmgp_cmp_readonly['id_andar']) || (isset($bFlagRead_id_andar) && $bFlagRead_id_andar))
{
    $this->ajax_return_values_id_andar(true);
}
if ($original_gbt_selecionados !== $modificado_gbt_selecionados || isset($this->nmgp_cmp_readonly['gbt_selecionados']) || (isset($bFlagRead_gbt_selecionados) && $bFlagRead_gbt_selecionados))
{
    $this->ajax_return_values_gbt_selecionados(true);
}
if ($original_gbt_disponiveis !== $modificado_gbt_disponiveis || isset($this->nmgp_cmp_readonly['gbt_disponiveis']) || (isset($bFlagRead_gbt_disponiveis) && $bFlagRead_gbt_disponiveis))
{
    $this->ajax_return_values_gbt_disponiveis(true);
}
if ($original_referenteprojeto !== $modificado_referenteprojeto || isset($this->nmgp_cmp_readonly['referenteprojeto']) || (isset($bFlagRead_referenteprojeto) && $bFlagRead_referenteprojeto))
{
    $this->ajax_return_values_referenteprojeto(true);
}
if ($original_pontodeencontro !== $modificado_pontodeencontro || isset($this->nmgp_cmp_readonly['pontodeencontro']) || (isset($bFlagRead_pontodeencontro) && $bFlagRead_pontodeencontro))
{
    $this->ajax_return_values_pontodeencontro(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id_usuario_fechamento !== $modificado_id_usuario_fechamento || isset($this->nmgp_cmp_readonly['id_usuario_fechamento']) || (isset($bFlagRead_id_usuario_fechamento) && $bFlagRead_id_usuario_fechamento))
{
    $this->ajax_return_values_id_usuario_fechamento(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_data_abertura !== $modificado_data_abertura || isset($this->nmgp_cmp_readonly['data_abertura']) || (isset($bFlagRead_data_abertura) && $bFlagRead_data_abertura))
{
    $this->ajax_return_values_data_abertura(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_instalacaoantena !== $modificado_instalacaoantena || isset($this->nmgp_cmp_readonly['instalacaoantena']) || (isset($bFlagRead_instalacaoantena) && $bFlagRead_instalacaoantena))
{
    $this->ajax_return_values_instalacaoantena(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadSAE_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function sendAnaliseOnClick_onClick($tipo_cliente, $id_usuario, $id_prestador, $sugestaoagenda, $id_operadora, $os_info, $tiposae, $tecprestadora, $tecoperadora, $stepprestadora, $stepoperadora, $stepempreendimento, $stepdescricao, $sendanaliseonclick, $id_conjunto, $savestatusonclick, $savegbtonclick, $savedataonclick, $resumoagendastatus, $resumoagenda, $removeronclick, $label_pas, $empreendimentofuncionamento, $confirmgbtdisponclick, $id_condomino, $id_andar, $gbt_selecionados, $gbt_disponiveis, $referenteprojeto, $pontodeencontro, $optantegbtec, $num_ativo, $id_empreendimento, $id_usuario_fechamento, $data_fechamento, $num_status, $data_abertura, $num_sae, $desc, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id_tiposae, $emergencial, $instalacaoantena, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1, $id)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_id_empreendimento = $this->id_empreendimento;
$original_tiposae = $this->tiposae;
$original_desc = $this->desc;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone2 = $this->num_telefone2;
$original_num_celular2 = $this->num_celular2;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_telefone3 = $this->num_telefone3;
$original_num_celular3 = $this->num_celular3;
$original_num_sae = $this->num_sae;
$original_num_status = $this->num_status;
$original_id = $this->id;
$original_id_tiposae = $this->id_tiposae;
$original_optantegbtec = $this->optantegbtec;
$original_tipo_cliente = $this->tipo_cliente;
$original_id_usuario = $this->id_usuario;
$original_id_prestador = $this->id_prestador;
$original_sugestaoagenda = $this->sugestaoagenda;
$original_id_operadora = $this->id_operadora;
$original_os_info = $this->os_info;
$original_tiposae = $this->tiposae;
$original_tecprestadora = $this->tecprestadora;
$original_tecoperadora = $this->tecoperadora;
$original_stepprestadora = $this->stepprestadora;
$original_stepoperadora = $this->stepoperadora;
$original_stepempreendimento = $this->stepempreendimento;
$original_stepdescricao = $this->stepdescricao;
$original_sendanaliseonclick = $this->sendanaliseonclick;
$original_id_conjunto = $this->id_conjunto;
$original_savestatusonclick = $this->savestatusonclick;
$original_savegbtonclick = $this->savegbtonclick;
$original_savedataonclick = $this->savedataonclick;
$original_resumoagendastatus = $this->resumoagendastatus;
$original_resumoagenda = $this->resumoagenda;
$original_removeronclick = $this->removeronclick;
$original_label_pas = $this->label_pas;
$original_empreendimentofuncionamento = $this->empreendimentofuncionamento;
$original_confirmgbtdisponclick = $this->confirmgbtdisponclick;
$original_id_condomino = $this->id_condomino;
$original_id_andar = $this->id_andar;
$original_gbt_selecionados = $this->gbt_selecionados;
$original_gbt_disponiveis = $this->gbt_disponiveis;
$original_referenteprojeto = $this->referenteprojeto;
$original_pontodeencontro = $this->pontodeencontro;
$original_optantegbtec = $this->optantegbtec;
$original_num_ativo = $this->num_ativo;
$original_id_empreendimento = $this->id_empreendimento;
$original_id_usuario_fechamento = $this->id_usuario_fechamento;
$original_data_fechamento = $this->data_fechamento;
$original_num_status = $this->num_status;
$original_data_abertura = $this->data_abertura;
$original_num_sae = $this->num_sae;
$original_desc = $this->desc;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id_tiposae = $this->id_tiposae;
$original_emergencial = $this->emergencial;
$original_instalacaoantena = $this->instalacaoantena;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id = $this->id;

sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
sc_include_library('sys', 'models', 'Tecsae.php');
$_Tecsae = new Tecsae($this);

$s = new manageSession();
$Num_TipoUsuario = $s->get("Num_TipoUsuario");
$resp = [
	's' => true,
	'm' => '',
	'd' => '',
	'f' => array()
];


if ($this->num_telefone1  == '' || $this->nom_responsavel1  == '') { $resp['s'] = false; array_push($resp['f'], 'Num_Telefone1'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fill_data'] .'<br>'; }
if ($Num_TipoUsuario == "P" && $this->id_prestador  == '') { $resp['s'] = false; array_push($resp['f'], 'ID_Prestador'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specify_service_prov'] .'<br>';}
if ($Num_TipoUsuario == "O" && $this->id_operadora  == '') { $resp['s'] = false; array_push($resp['f'], 'ID_Operadora'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specifyOperator'] .'<br>';}
if ($this->id_empreendimento  == '') { $resp['s'] = false; array_push($resp['f'], 'ID_Empreendimento'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specifyEnterprise'] .'<br>';}
if ($this->tiposae  == '') { $resp['s'] = false; array_push($resp['f'], 'tipoSAE'); 
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_SAEType'] .'<br>';}
if ($this->desc  == '') { $resp['s'] = false; array_push($resp['f'], 'Desc');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillServiceDesc'] .'<br>';}
if ($this->data_inicio  == 'null' || $this->hora_inicio  == 'null' || $this->data_fim  == 'null' || $this->hora_fim  == 'null') { 
	$resp['s'] = false; array_push($resp['f'], 'DataHora');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_specifySchedule'] .'<br>';}
if ($Num_TipoUsuario == "O" && ($this->nom_responsavel2  == '' || ($this->num_telefone2  == '' && $this->num_celular2  == ''))) { 
	$resp['s'] = false; array_push($resp['f'], 'Responsavel2');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillDataOper'] .'<br>';}
elseif ($Num_TipoUsuario == "P" && ($this->nom_responsavel3  == '' || ($this->num_telefone3  == '' && $this->num_celular3  == ''))) { 
	$resp['s'] = false; array_push($resp['f'], 'Responsavel3');
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillDataProv'] .'<br>';}
elseif (($Num_TipoUsuario == "G" || $Num_TipoUsuario == "GT") && ($this->nom_responsavel2  == '' || ($this->num_telefone2  == '' && $this->num_celular2  == '')) && ($this->nom_responsavel3  == '' || ($this->num_telefone3  == '' && $this->num_celular3  == ''))) {
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fill_OperProv'] .'<br>';
}

if ($resp['s']) {
	$Tecsae = $_Tecsae->getByNum_SAE($this->num_sae );
	if (($this->id_operadora  != "0" && $Tecsae["O"] == 0) || ($this->id_prestador  != "0" && $Tecsae["P"] == 0)) {
		$resp['s'] = false;
		$resp['m'] .=  $this->Ini->Nm_lang['lang_label_fillTec'] .'<br>';
	}
}

if ($resp['s']) {
    $_validateInterval =$this->validateInterval($this->data_inicio , $this->hora_inicio , $this->data_fim , $this->hora_fim );
	if (!$_validateInterval['s']) {
		$resp['s'] = false; array_push($resp['f'], 'invalidDataHora');
		$resp['m'] .= $_validateInterval['m'];
	}
}

if ($resp['s']) {
	$this->num_status  = "AA";
	 
      $nm_select = "UPDATE tb_sae SET Num_Status = '$this->num_status' WHERE ID = '$this->id'"; 
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
	
	$modelLogs->insert([
		"Modulo" => "SAE",
		"Funcao" => "EDITAR",
		"Descricao" => 'Envio de SAE para análise',
		"Conteudo" => $modelLogs->getConteudo()
	]);
	
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadSAE') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}



$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_tiposae = $this->tiposae;
$modificado_desc = $this->desc;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_celular2 = $this->num_celular2;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_sae = $this->num_sae;
$modificado_num_status = $this->num_status;
$modificado_id = $this->id;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_tipo_cliente = $this->tipo_cliente;
$modificado_id_usuario = $this->id_usuario;
$modificado_id_prestador = $this->id_prestador;
$modificado_sugestaoagenda = $this->sugestaoagenda;
$modificado_id_operadora = $this->id_operadora;
$modificado_os_info = $this->os_info;
$modificado_tiposae = $this->tiposae;
$modificado_tecprestadora = $this->tecprestadora;
$modificado_tecoperadora = $this->tecoperadora;
$modificado_stepprestadora = $this->stepprestadora;
$modificado_stepoperadora = $this->stepoperadora;
$modificado_stepempreendimento = $this->stepempreendimento;
$modificado_stepdescricao = $this->stepdescricao;
$modificado_sendanaliseonclick = $this->sendanaliseonclick;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_savestatusonclick = $this->savestatusonclick;
$modificado_savegbtonclick = $this->savegbtonclick;
$modificado_savedataonclick = $this->savedataonclick;
$modificado_resumoagendastatus = $this->resumoagendastatus;
$modificado_resumoagenda = $this->resumoagenda;
$modificado_removeronclick = $this->removeronclick;
$modificado_label_pas = $this->label_pas;
$modificado_empreendimentofuncionamento = $this->empreendimentofuncionamento;
$modificado_confirmgbtdisponclick = $this->confirmgbtdisponclick;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_andar = $this->id_andar;
$modificado_gbt_selecionados = $this->gbt_selecionados;
$modificado_gbt_disponiveis = $this->gbt_disponiveis;
$modificado_referenteprojeto = $this->referenteprojeto;
$modificado_pontodeencontro = $this->pontodeencontro;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_num_ativo = $this->num_ativo;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_id_usuario_fechamento = $this->id_usuario_fechamento;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_num_status = $this->num_status;
$modificado_data_abertura = $this->data_abertura;
$modificado_num_sae = $this->num_sae;
$modificado_desc = $this->desc;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_instalacaoantena = $this->instalacaoantena;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id = $this->id;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_prestador', 'id_operadora', 'id_empreendimento', 'tiposae', 'desc', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'nom_responsavel2', 'num_telefone2', 'num_celular2', 'nom_responsavel3', 'num_telefone3', 'num_celular3', 'num_sae', 'num_status', 'id', 'id_tiposae', 'optantegbtec');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
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
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_tipo_cliente !== $modificado_tipo_cliente || isset($this->nmgp_cmp_readonly['tipo_cliente']) || (isset($bFlagRead_tipo_cliente) && $bFlagRead_tipo_cliente))
{
    $this->ajax_return_values_tipo_cliente(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_sugestaoagenda !== $modificado_sugestaoagenda || isset($this->nmgp_cmp_readonly['sugestaoagenda']) || (isset($bFlagRead_sugestaoagenda) && $bFlagRead_sugestaoagenda))
{
    $this->ajax_return_values_sugestaoagenda(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_os_info !== $modificado_os_info || isset($this->nmgp_cmp_readonly['os_info']) || (isset($bFlagRead_os_info) && $bFlagRead_os_info))
{
    $this->ajax_return_values_os_info(true);
}
if ($original_tiposae !== $modificado_tiposae || isset($this->nmgp_cmp_readonly['tiposae']) || (isset($bFlagRead_tiposae) && $bFlagRead_tiposae))
{
    $this->ajax_return_values_tiposae(true);
}
if ($original_tecprestadora !== $modificado_tecprestadora || isset($this->nmgp_cmp_readonly['tecprestadora']) || (isset($bFlagRead_tecprestadora) && $bFlagRead_tecprestadora))
{
    $this->ajax_return_values_tecprestadora(true);
}
if ($original_tecoperadora !== $modificado_tecoperadora || isset($this->nmgp_cmp_readonly['tecoperadora']) || (isset($bFlagRead_tecoperadora) && $bFlagRead_tecoperadora))
{
    $this->ajax_return_values_tecoperadora(true);
}
if ($original_stepprestadora !== $modificado_stepprestadora || isset($this->nmgp_cmp_readonly['stepprestadora']) || (isset($bFlagRead_stepprestadora) && $bFlagRead_stepprestadora))
{
    $this->ajax_return_values_stepprestadora(true);
}
if ($original_stepoperadora !== $modificado_stepoperadora || isset($this->nmgp_cmp_readonly['stepoperadora']) || (isset($bFlagRead_stepoperadora) && $bFlagRead_stepoperadora))
{
    $this->ajax_return_values_stepoperadora(true);
}
if ($original_stepempreendimento !== $modificado_stepempreendimento || isset($this->nmgp_cmp_readonly['stepempreendimento']) || (isset($bFlagRead_stepempreendimento) && $bFlagRead_stepempreendimento))
{
    $this->ajax_return_values_stepempreendimento(true);
}
if ($original_stepdescricao !== $modificado_stepdescricao || isset($this->nmgp_cmp_readonly['stepdescricao']) || (isset($bFlagRead_stepdescricao) && $bFlagRead_stepdescricao))
{
    $this->ajax_return_values_stepdescricao(true);
}
if ($original_sendanaliseonclick !== $modificado_sendanaliseonclick || isset($this->nmgp_cmp_readonly['sendanaliseonclick']) || (isset($bFlagRead_sendanaliseonclick) && $bFlagRead_sendanaliseonclick))
{
    $this->ajax_return_values_sendanaliseonclick(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_savestatusonclick !== $modificado_savestatusonclick || isset($this->nmgp_cmp_readonly['savestatusonclick']) || (isset($bFlagRead_savestatusonclick) && $bFlagRead_savestatusonclick))
{
    $this->ajax_return_values_savestatusonclick(true);
}
if ($original_savegbtonclick !== $modificado_savegbtonclick || isset($this->nmgp_cmp_readonly['savegbtonclick']) || (isset($bFlagRead_savegbtonclick) && $bFlagRead_savegbtonclick))
{
    $this->ajax_return_values_savegbtonclick(true);
}
if ($original_savedataonclick !== $modificado_savedataonclick || isset($this->nmgp_cmp_readonly['savedataonclick']) || (isset($bFlagRead_savedataonclick) && $bFlagRead_savedataonclick))
{
    $this->ajax_return_values_savedataonclick(true);
}
if ($original_resumoagendastatus !== $modificado_resumoagendastatus || isset($this->nmgp_cmp_readonly['resumoagendastatus']) || (isset($bFlagRead_resumoagendastatus) && $bFlagRead_resumoagendastatus))
{
    $this->ajax_return_values_resumoagendastatus(true);
}
if ($original_resumoagenda !== $modificado_resumoagenda || isset($this->nmgp_cmp_readonly['resumoagenda']) || (isset($bFlagRead_resumoagenda) && $bFlagRead_resumoagenda))
{
    $this->ajax_return_values_resumoagenda(true);
}
if ($original_removeronclick !== $modificado_removeronclick || isset($this->nmgp_cmp_readonly['removeronclick']) || (isset($bFlagRead_removeronclick) && $bFlagRead_removeronclick))
{
    $this->ajax_return_values_removeronclick(true);
}
if ($original_label_pas !== $modificado_label_pas || isset($this->nmgp_cmp_readonly['label_pas']) || (isset($bFlagRead_label_pas) && $bFlagRead_label_pas))
{
    $this->ajax_return_values_label_pas(true);
}
if ($original_empreendimentofuncionamento !== $modificado_empreendimentofuncionamento || isset($this->nmgp_cmp_readonly['empreendimentofuncionamento']) || (isset($bFlagRead_empreendimentofuncionamento) && $bFlagRead_empreendimentofuncionamento))
{
    $this->ajax_return_values_empreendimentofuncionamento(true);
}
if ($original_confirmgbtdisponclick !== $modificado_confirmgbtdisponclick || isset($this->nmgp_cmp_readonly['confirmgbtdisponclick']) || (isset($bFlagRead_confirmgbtdisponclick) && $bFlagRead_confirmgbtdisponclick))
{
    $this->ajax_return_values_confirmgbtdisponclick(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_andar !== $modificado_id_andar || isset($this->nmgp_cmp_readonly['id_andar']) || (isset($bFlagRead_id_andar) && $bFlagRead_id_andar))
{
    $this->ajax_return_values_id_andar(true);
}
if ($original_gbt_selecionados !== $modificado_gbt_selecionados || isset($this->nmgp_cmp_readonly['gbt_selecionados']) || (isset($bFlagRead_gbt_selecionados) && $bFlagRead_gbt_selecionados))
{
    $this->ajax_return_values_gbt_selecionados(true);
}
if ($original_gbt_disponiveis !== $modificado_gbt_disponiveis || isset($this->nmgp_cmp_readonly['gbt_disponiveis']) || (isset($bFlagRead_gbt_disponiveis) && $bFlagRead_gbt_disponiveis))
{
    $this->ajax_return_values_gbt_disponiveis(true);
}
if ($original_referenteprojeto !== $modificado_referenteprojeto || isset($this->nmgp_cmp_readonly['referenteprojeto']) || (isset($bFlagRead_referenteprojeto) && $bFlagRead_referenteprojeto))
{
    $this->ajax_return_values_referenteprojeto(true);
}
if ($original_pontodeencontro !== $modificado_pontodeencontro || isset($this->nmgp_cmp_readonly['pontodeencontro']) || (isset($bFlagRead_pontodeencontro) && $bFlagRead_pontodeencontro))
{
    $this->ajax_return_values_pontodeencontro(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_id_usuario_fechamento !== $modificado_id_usuario_fechamento || isset($this->nmgp_cmp_readonly['id_usuario_fechamento']) || (isset($bFlagRead_id_usuario_fechamento) && $bFlagRead_id_usuario_fechamento))
{
    $this->ajax_return_values_id_usuario_fechamento(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_num_status !== $modificado_num_status || isset($this->nmgp_cmp_readonly['num_status']) || (isset($bFlagRead_num_status) && $bFlagRead_num_status))
{
    $this->ajax_return_values_num_status(true);
}
if ($original_data_abertura !== $modificado_data_abertura || isset($this->nmgp_cmp_readonly['data_abertura']) || (isset($bFlagRead_data_abertura) && $bFlagRead_data_abertura))
{
    $this->ajax_return_values_data_abertura(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_instalacaoantena !== $modificado_instalacaoantena || isset($this->nmgp_cmp_readonly['instalacaoantena']) || (isset($bFlagRead_instalacaoantena) && $bFlagRead_instalacaoantena))
{
    $this->ajax_return_values_instalacaoantena(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
form_CadSAE_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function sendMailGBTNotify($insert=[], $delete=[])
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
sc_include_library('sys', 'dompdf', 'dompdf.php');
sc_include_library('sys', 'functions', 'pdfSAE.php');
sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
sc_include_library('sys', 'models', 'Usuarios.php');
sc_include_library('sys', 'models', 'Empreendimentos.php');
sc_include_library('sys', 'models', 'Operadoras.php');
sc_include_library('sys', 'models', 'Prestadores.php');
sc_include_library('sys', 'models', 'Condominos.php');
$_Logs = new Logs($this);
$_Usuarios = new Usuarios($this);
$_Empreendimentos = new Empreendimentos($this);
$_Operadoras = new Operadoras($this);
$_Prestadores = new Prestadores($this);
$_Condominos = new Condominos($this);

$s = new manageSession();

$EmpreendimentoName = $_Empreendimentos->getCompanyNameById(intval($this->id_empreendimento ));
$OperadoraName = $_Operadoras->getCompanyNameById(intval($this->id_operadora ));
$PrestadoraName = $_Prestadores->getCompanyNameById(intval($this->id_prestador ));
$CondominoName = $this->tipo_cliente  == "C" ? $_Condominos->getCompanyNameById(intval($this->id_condomino )) : "GLOBALBLUE";

$m = new sendEmail();

$listEmails = array();
foreach($delete as $ID_Usuario) {
	$ID_Usuario = $ID_Usuario["ID_Usuario"] ?? $ID_Usuario ?? 0;
	$Usuario = $_Usuarios->getById(intval($ID_Usuario));
	if (isset($Usuario[0]["Nom_Email1"]) && $Usuario[0]["Nom_Email1"]) {
		array_push($listEmails, $Usuario[0]["Nom_Email1"]);
	} elseif (isset($Usuario[0]["Nom_Email2"]) && $Usuario[0]["Nom_Email2"]) {
		array_push($listEmails, $Usuario[0]["Nom_Email2"]);
	}
}

$listEmails = array_unique($listEmails);
if ($listEmails) {
	$emailData = [
		"alert" => "warning",
		"title" => "$this->num_sae <br>Remoção de atividade",
		"content" => "
				Prezado(a),<br>
				<p>Informamos que você foi removido da atividade da SAE <strong>$this->num_sae </strong></p><br>
				:tableFooter:
			",
		"footer" => "Você foi removido da Atividade / Supervisão.<br>
			Havendo qualquer dúvida favor entrar em contato com a Engenharia Central"
	];
	$html = emailTemplate($emailData);
	$m->SUBJECT = "Remoção de atividade: $this->num_sae ";
	$m->MESSAGE = $html;
	$m->BCC = $listEmails;
	$m->BCC[] = "gabriel.soares@houseti.com.br";	
	$_Logs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Descricao" => 'Notificação por e-mail (Remoção de atividade, SAE)',
		"Conteudo" => ["Num_SAE" => $this->num_sae , "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
	]);
}

$m = new sendEmail();

$listEmails = array();
foreach($insert as $ID_Usuario) {
	$ID_Usuario = $ID_Usuario["ID_Usuario"] ?? $ID_Usuario ?? 0;
	$Usuario = $_Usuarios->getById(intval($ID_Usuario));
	if ($Usuario[0]["Nom_Email1"]) {
		array_push($listEmails, $Usuario[0]["Nom_Email1"]);
	} elseif ($Usuario[0]["Nom_Email2"]) {
		array_push($listEmails, $Usuario[0]["Nom_Email2"]);
	}
}

$listEmails = array_unique($listEmails);
if ($listEmails) {	
	$m->ANEXO = $s->get("SAE_pdf_tmpdir") ??$this->generatePDF();
	
	$emailData = [
		"alert" => "good",
		"title" => "$this->num_sae <br>Atribuição de atividade",
		"content" => "
				Prezado(a),<br>
				<p>Informamos que você foi atribuído à atividade da SAE <strong>$this->num_sae </strong>.</p>
				<p>
					".($EmpreendimentoName ? "<strong>Local</strong>: $EmpreendimentoName<br>" : "")."
					".($CondominoName ? "<strong>Cliente</strong>: $CondominoName<br>" : "")."
					".($OperadoraName ? "<strong>Operadora</strong>: $OperadoraName<br>" : "")."
					".($PrestadoraName ? "<strong>Prestadora</strong>: $PrestadoraName<br>" : "")."
					<strong>Data e Horário</strong>: Iniciará em ".date("d/m/Y H:i", strtotime($this->data_inicio ." ".$this->hora_inicio ))." e finalizará às ".date("d/m/Y H:i", strtotime($this->data_fim ." ".$this->hora_fim ))."<br>
				</p>
				:tableFooter:
			",
		"footer" => "Você foi designado para uma Atividade / Supervisão.<br>
			Havendo qualquer dúvida favor entrar em contato com a Engenharia Central"
	];
	$html = emailTemplate($emailData);
	$m->SUBJECT = "Atribuição de atividade: $this->num_sae ";
	$m->MESSAGE = $html;
	$m->BCC = $listEmails;
	$m->BCC[] = "gabriel.soares@houseti.com.br";	
	$_Logs->insert([
		"Modulo" => "EMAIL",
		"Funcao" => "ENVIAR",
		"Descricao" => 'Notificação por e-mail (Atribuição de atividade, SAE)',
		"Conteudo" => ["Num_SAE" => $this->num_sae , "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
	]);
	if (isset($tmpfname) && file_exists($tmpfname)) unlink($tmpfname);
}

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function setGBTRandom($ID_GBT=null)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
sc_include_library('sys', 'dompdf', 'dompdf.php');
sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
sc_include_library("sys", "functions", "validateEventCalendar.php");
sc_include_library('sys', 'functions', 'pdfSAE.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');

$modelLogs = new Logs($this);
$m = new sendEmail();

$tSae = DbQuery($this, "SELECT Code_SAE, Nom_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae'");
$tSae = $tSae[0] ?? ["Code_SAE" => "", "Nom_SAE" => ""];
$needGBT = (in_array($tSae["Code_SAE"], ["desinstalacao", "instalacao"]) || $this->optantegbtec  != "N");

$insertList = $deleteList = array();

if ($needGBT) {
	$eventSAE = [
		"Di" => $this->data_inicio ,
		"Hi" => $this->hora_inicio  ?: "00:00:00",
		"Df" => $this->data_fim ,
		"Hf" => $this->hora_fim  ?: "23:59:00"
	];
	$freeGBT =$this->getGBTDisp($eventSAE);
	if (!$freeGBT) return;
	$randomGBT = $freeGBT[array_rand($freeGBT, 1)];
	$listID_UsuarioFreeGBT = array();
	foreach($freeGBT as $Usuario) {
		$listID_UsuarioFreeGBT[] = $Usuario["ID_Usuario"];
	}
	
	
	if (is_array($ID_GBT)) {
		foreach($ID_GBT as $ID_Usuario) {
			if (in_array($ID_Usuario, $listID_UsuarioFreeGBT)) {
				$insertList[] = $ID_Usuario;
			} else {
				$insertList[] = $randomGBT["ID_Usuario"];
				$deleteList[] = $ID_Usuario;
			}
		$this->deleteGBTAgenda($ID_Usuario);
		}
	} else {
		if (in_array($ID_GBT, $listID_UsuarioFreeGBT)) {
			$insertList[] = $ID_GBT;
		} else {
			$insertList[] = $randomGBT["ID_Usuario"];
			$deleteList[] = $ID_GBT;
		}
	$this->deleteGBTAgenda($ID_GBT);
	}
	
	foreach($insertList as $ID_Usuario) {
		$addNightTime = (isEntry("19:00:00", ($this->hora_inicio  ? $this->hora_inicio  : "00:00:00"), "06:00:00") || isEntry("19:00:00", ($this->hora_fim  ? $this->hora_fim  : "23:59:00"), "06:00:00"));
		$sqlIns = "INSERT INTO tb_agenda 
				(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
				VALUES 
				('SAE $this->num_sae ', '', '$this->data_inicio', '$this->hora_inicio', '$this->data_fim', '$this->hora_fim', 'N', 'D', '$ID_Usuario', 'sae');
				INSERT INTO tb_saetecgb 
				(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
			";
		 
      $nm_select = $sqlIns; 
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
		
		$D1BeforeHoursNight = $this->data_inicio ." ".$this->hora_inicio ;
		$utD1 = strtotime($D1BeforeHoursNight); 
		$utOnzeHorasAntes = strtotime("-11 hour", $utD1);
		$initBlockBeforeHoursNight = $finhishBlockBeforeHoursNight = null;
		if (isEntry("19:00", date("H:i", $utD1), "06:00")) {
			$initBlockBeforeHoursNight = date("Y-m-d", $utOnzeHorasAntes)." 19:00";
			$finhishBlockBeforeHoursNight = $D1BeforeHoursNight;
		} elseif (isEntry("19:00", date("H:i", $utOnzeHorasAntes), "06:00")) {
			$initBlockBeforeHoursNight = date("Y-m-d H:i", $utOnzeHorasAntes);
			$finhishBlockBeforeHoursNight = date("Y-m-d", $utD1)." 06:00";
		}
		if ($initBlockBeforeHoursNight && $finhishBlockBeforeHoursNight) {
			DbQuery($this, "INSERT INTO tb_agenda 
					(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
				VALUES 
				('Intervalo de Descanso: SAE $this->num_sae ', '', '".date("Y-m-d", strtotime($initBlockBeforeHoursNight))."', '".date("H:i:s", strtotime($initBlockBeforeHoursNight))."', 
					'".date("Y-m-d", strtotime($finhishBlockBeforeHoursNight))."', '".date("H:i:s", strtotime($finhishBlockBeforeHoursNight))."', 'N', 'D', '$ID_Usuario', 'reservadescanso');
				INSERT INTO tb_saetecgb 
				(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
				");
		}
		
		var_dump($initBlockBeforeHoursNight, $finhishBlockBeforeHoursNight);
		
		if ($addNightTime) {
			$time = $this->data_fim .' '.($this->hora_fim  ?: "23:59:00");
			$nightTime = [
				"Df" => date("Y-m-d", strtotime($time) + 11 * 60 * 60),
				"Hf" => date("H:i:s", strtotime($time) + 11 * 60 * 60)
			];
			$sqlIns = "INSERT INTO tb_agenda 
					(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
				VALUES 
				('Intervalo de Descanso: SAE $this->num_sae ', '', '$this->data_fim', '".($this->hora_fim  ?: '23:59:00')."', '".$nightTime['Df']."', '".$nightTime['Hf']."', 'N', 'D', '$ID_Usuario', 'descanso');
				INSERT INTO tb_saetecgb 
				(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
				";
			 
      $nm_select = $sqlIns; 
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
		} else { 
			$time = $this->data_fim .' '.($this->hora_fim  ?: "23:59:00");
			$deslocamento = [
				"D" => date("Y-m-d", strtotime($time) + 60 * 60),
				"H" => date("H:i:s", strtotime($time) + 60 * 60)
			];
			$sqlIns = "INSERT INTO tb_agenda 
						(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
					VALUES 
					('Intervalo de Deslocamento: SAE $this->num_sae ', '', '$this->data_fim', '".($this->hora_fim  ?: "23:59:00")."', '".$deslocamento["D"]."', '".$deslocamento["H"]."', 'N', 'D', '$ID_Usuario', 'deslocamentosae');
					INSERT INTO tb_saetecgb 
					(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
					";
			 
      $nm_select = $sqlIns; 
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
		
		$time = $this->data_inicio .' '.($this->hora_inicio  ?: "00:00:00");
		$deslocamento = [
			"D" => date("Y-m-d", strtotime($time) - 60 * 60),
			"H" => date("H:i:s", strtotime($time) - 60 * 60)
		];
		$sqlIns = "INSERT INTO tb_agenda 
					(Titulo, Descricao, Data_Inicio, Hora_Inicio, Data_Fim, Hora_Fim, Recorrente, Periodo, ID_Usuario, Tipo_evento)
				VALUES 
				('Intervalo de Deslocamento: SAE $this->num_sae ', '', '".$deslocamento["D"]."', '".$deslocamento["H"]."', '$this->data_inicio', '".($this->hora_inicio  ?: "00:00:00")."',  'N', 'D', '$ID_Usuario',  'deslocamentosae');
				INSERT INTO tb_saetecgb 
				(Num_SAE, ID_Usuario, ID_Agenda) VALUES ('$this->num_sae', '$ID_Usuario', LAST_INSERT_ID());
				";
		 
      $nm_select = $sqlIns; 
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
$this->sendMailGBTNotify($insertList, $deleteList);
}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function stepAgendamento_onClick($id_prestador, $id_operadora, $id_conjunto, $label_pas, $id_condomino, $optantegbtec, $id_empreendimento, $data_fechamento, $num_sae, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id_tiposae, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_condomino = $this->id_condomino;
$original_id_conjunto = $this->id_conjunto;
$original_id_operadora = $this->id_operadora;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone2 = $this->num_telefone2;
$original_num_celular2 = $this->num_celular2;
$original_id_prestador = $this->id_prestador;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_telefone3 = $this->num_telefone3;
$original_num_celular3 = $this->num_celular3;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_id_tiposae = $this->id_tiposae;
$original_optantegbtec = $this->optantegbtec;
$original_num_sae = $this->num_sae;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_id_conjunto = $this->id_conjunto;
$original_label_pas = $this->label_pas;
$original_id_condomino = $this->id_condomino;
$original_optantegbtec = $this->optantegbtec;
$original_id_empreendimento = $this->id_empreendimento;
$original_data_fechamento = $this->data_fechamento;
$original_num_sae = $this->num_sae;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id_tiposae = $this->id_tiposae;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$Num_TipoUsuario = $s->get("Num_TipoUsuario");

$resp = [
	's' => true,
	'm' => ''
];

if ($this->num_telefone1  == '' || (strlen($this->num_telefone1 ) != 11 && strlen($this->num_telefone1 ) != 10) || $this->nom_responsavel1  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae4'] ; 
}
if ($this->id_condomino  != '' && $this->id_conjunto  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae5'] ; 
}
if ($Num_TipoUsuario == "O" && ($this->id_operadora  == '' || $this->id_operadora  == 0 ||
	($this->nom_responsavel2  == '' || 
	((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae6'] ;
} elseif ($Num_TipoUsuario == "P" && ($this->id_prestador  == '' || $this->id_prestador  == 0 ||
	($this->nom_responsavel3  == '' || 
	((strlen($this->num_telefone3 ) != 10 && strlen($this->num_telefone3 ) != 11 && strlen($this->num_celular3 ) != 10 && strlen($this->num_celular3 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae7'] ;
} elseif (
	($Num_TipoUsuario == "G" || $Num_TipoUsuario == "GT") && (
	($this->id_operadora  == '' || $this->id_operadora  == 0 || $this->nom_responsavel2  == '' || 
	 ((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11))) && 
	($this->id_prestador  == '' || $this->id_prestador  == 0 || $this->nom_responsavel3  == '' || 
	 ((strlen($this->num_telefone3 ) != 10 && strlen($this->num_telefone3 ) != 11 && strlen($this->num_celular3 ) != 10 && strlen($this->num_celular3 ) != 11)))
)) {
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae8'] ;
}

if ($resp['s']) {
    $_validateInterval =$this->validateInterval($this->data_inicio , $this->hora_inicio , $this->data_fim , $this->hora_fim );
	if (!$_validateInterval['s']) {
		$resp['s'] = false;
		$resp['m'] .= "<br>".$_validateInterval['m'];
	}
}

if ($resp['s']) {
	$this->sc_ajax_javascript('nextStep');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}

$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_operadora = $this->id_operadora;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_celular2 = $this->num_celular2;
$modificado_id_prestador = $this->id_prestador;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_num_celular3 = $this->num_celular3;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_num_sae = $this->num_sae;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_label_pas = $this->label_pas;
$modificado_id_condomino = $this->id_condomino;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_num_sae = $this->num_sae;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_condomino', 'id_conjunto', 'id_operadora', 'nom_responsavel2', 'num_telefone2', 'num_celular2', 'id_prestador', 'nom_responsavel3', 'num_telefone3', 'num_celular3', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'id_tiposae', 'optantegbtec', 'num_sae');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
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
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_label_pas !== $modificado_label_pas || isset($this->nmgp_cmp_readonly['label_pas']) || (isset($bFlagRead_label_pas) && $bFlagRead_label_pas))
{
    $this->ajax_return_values_label_pas(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
form_CadSAE_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function stepDescricao_onClick($id_prestador, $id_operadora, $id_conjunto, $label_pas, $id_condomino, $optantegbtec, $id_empreendimento, $data_fechamento, $num_sae, $desc, $hora_fim, $data_fim, $hora_inicio, $data_inicio, $id_tiposae, $emergencial, $instalacaoantena, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_condomino = $this->id_condomino;
$original_id_conjunto = $this->id_conjunto;
$original_id_operadora = $this->id_operadora;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone2 = $this->num_telefone2;
$original_num_celular2 = $this->num_celular2;
$original_id_prestador = $this->id_prestador;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_telefone3 = $this->num_telefone3;
$original_num_celular3 = $this->num_celular3;
$original_data_inicio = $this->data_inicio;
$original_hora_inicio = $this->hora_inicio;
$original_data_fim = $this->data_fim;
$original_hora_fim = $this->hora_fim;
$original_id_tiposae = $this->id_tiposae;
$original_optantegbtec = $this->optantegbtec;
$original_num_sae = $this->num_sae;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_id_conjunto = $this->id_conjunto;
$original_label_pas = $this->label_pas;
$original_id_condomino = $this->id_condomino;
$original_optantegbtec = $this->optantegbtec;
$original_id_empreendimento = $this->id_empreendimento;
$original_data_fechamento = $this->data_fechamento;
$original_num_sae = $this->num_sae;
$original_desc = $this->desc;
$original_hora_fim = $this->hora_fim;
$original_data_fim = $this->data_fim;
$original_hora_inicio = $this->hora_inicio;
$original_data_inicio = $this->data_inicio;
$original_id_tiposae = $this->id_tiposae;
$original_emergencial = $this->emergencial;
$original_instalacaoantena = $this->instalacaoantena;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$Num_TipoUsuario = $s->get("Num_TipoUsuario");

$resp = [
	's' => true,
	'm' => ''
];

if ($this->num_telefone1  == '' || (strlen($this->num_telefone1 ) != 11 && strlen($this->num_telefone1 ) != 10) || $this->nom_responsavel1  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae4'] ; 
}
if ($this->id_condomino  != '' && $this->id_conjunto  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae5'] ; 
}
if ($Num_TipoUsuario == "O" && ($this->id_operadora  == '' || $this->id_operadora  == 0 || 
	($this->nom_responsavel2  == '' || 
	((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae6'] ;
} elseif ($Num_TipoUsuario == "P" && ($this->id_prestador  == '' || $this->id_prestador  == 0 ||
	($this->nom_responsavel3  == '' || 
	((strlen($this->num_telefone3 ) != 10 && strlen($this->num_telefone3 ) != 11 && strlen($this->num_celular3 ) != 10 && strlen($this->num_celular3 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae7'] ;
} elseif (
	($Num_TipoUsuario == "G" || $Num_TipoUsuario == "GT") && (
	($this->id_operadora  == '' || $this->id_operadora  == 0 || $this->nom_responsavel2  == '' || 
	 ((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11))) && 
	($this->id_prestador  == '' || $this->id_prestador  == 0 || $this->nom_responsavel3  == '' || 
	 ((strlen($this->num_telefone3 ) != 10 && strlen($this->num_telefone3 ) != 11 && strlen($this->num_celular3 ) != 10 && strlen($this->num_celular3 ) != 11)))
)) {
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae8'] ;
}
if ($resp['s']) {
    $_validateInterval =$this->validateInterval($this->data_inicio , $this->hora_inicio , $this->data_fim , $this->hora_fim );
	if (!$_validateInterval['s']) {
		$resp['s'] = false;
		$resp['m'] .= $_validateInterval['m'];
	}
}

if ($resp['s']) {
	$this->sc_ajax_javascript('nextStep');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}

$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_operadora = $this->id_operadora;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_celular2 = $this->num_celular2;
$modificado_id_prestador = $this->id_prestador;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_num_celular3 = $this->num_celular3;
$modificado_data_inicio = $this->data_inicio;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_fim = $this->data_fim;
$modificado_hora_fim = $this->hora_fim;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_num_sae = $this->num_sae;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_label_pas = $this->label_pas;
$modificado_id_condomino = $this->id_condomino;
$modificado_optantegbtec = $this->optantegbtec;
$modificado_id_empreendimento = $this->id_empreendimento;
$modificado_data_fechamento = $this->data_fechamento;
$modificado_num_sae = $this->num_sae;
$modificado_desc = $this->desc;
$modificado_hora_fim = $this->hora_fim;
$modificado_data_fim = $this->data_fim;
$modificado_hora_inicio = $this->hora_inicio;
$modificado_data_inicio = $this->data_inicio;
$modificado_id_tiposae = $this->id_tiposae;
$modificado_emergencial = $this->emergencial;
$modificado_instalacaoantena = $this->instalacaoantena;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_condomino', 'id_conjunto', 'id_operadora', 'nom_responsavel2', 'num_telefone2', 'num_celular2', 'id_prestador', 'nom_responsavel3', 'num_telefone3', 'num_celular3', 'data_inicio', 'hora_inicio', 'data_fim', 'hora_fim', 'id_tiposae', 'optantegbtec', 'num_sae');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
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
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_label_pas !== $modificado_label_pas || isset($this->nmgp_cmp_readonly['label_pas']) || (isset($bFlagRead_label_pas) && $bFlagRead_label_pas))
{
    $this->ajax_return_values_label_pas(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_optantegbtec !== $modificado_optantegbtec || isset($this->nmgp_cmp_readonly['optantegbtec']) || (isset($bFlagRead_optantegbtec) && $bFlagRead_optantegbtec))
{
    $this->ajax_return_values_optantegbtec(true);
}
if ($original_id_empreendimento !== $modificado_id_empreendimento || isset($this->nmgp_cmp_readonly['id_empreendimento']) || (isset($bFlagRead_id_empreendimento) && $bFlagRead_id_empreendimento))
{
    $this->ajax_return_values_id_empreendimento(true);
}
if ($original_data_fechamento !== $modificado_data_fechamento || isset($this->nmgp_cmp_readonly['data_fechamento']) || (isset($bFlagRead_data_fechamento) && $bFlagRead_data_fechamento))
{
    $this->ajax_return_values_data_fechamento(true);
}
if ($original_num_sae !== $modificado_num_sae || isset($this->nmgp_cmp_readonly['num_sae']) || (isset($bFlagRead_num_sae) && $bFlagRead_num_sae))
{
    $this->ajax_return_values_num_sae(true);
}
if ($original_desc !== $modificado_desc || isset($this->nmgp_cmp_readonly['desc']) || (isset($bFlagRead_desc) && $bFlagRead_desc))
{
    $this->ajax_return_values_desc(true);
}
if ($original_hora_fim !== $modificado_hora_fim || isset($this->nmgp_cmp_readonly['hora_fim']) || (isset($bFlagRead_hora_fim) && $bFlagRead_hora_fim))
{
    $this->ajax_return_values_hora_fim(true);
}
if ($original_data_fim !== $modificado_data_fim || isset($this->nmgp_cmp_readonly['data_fim']) || (isset($bFlagRead_data_fim) && $bFlagRead_data_fim))
{
    $this->ajax_return_values_data_fim(true);
}
if ($original_hora_inicio !== $modificado_hora_inicio || isset($this->nmgp_cmp_readonly['hora_inicio']) || (isset($bFlagRead_hora_inicio) && $bFlagRead_hora_inicio))
{
    $this->ajax_return_values_hora_inicio(true);
}
if ($original_data_inicio !== $modificado_data_inicio || isset($this->nmgp_cmp_readonly['data_inicio']) || (isset($bFlagRead_data_inicio) && $bFlagRead_data_inicio))
{
    $this->ajax_return_values_data_inicio(true);
}
if ($original_id_tiposae !== $modificado_id_tiposae || isset($this->nmgp_cmp_readonly['id_tiposae']) || (isset($bFlagRead_id_tiposae) && $bFlagRead_id_tiposae))
{
    $this->ajax_return_values_id_tiposae(true);
}
if ($original_emergencial !== $modificado_emergencial || isset($this->nmgp_cmp_readonly['emergencial']) || (isset($bFlagRead_emergencial) && $bFlagRead_emergencial))
{
    $this->ajax_return_values_emergencial(true);
}
if ($original_instalacaoantena !== $modificado_instalacaoantena || isset($this->nmgp_cmp_readonly['instalacaoantena']) || (isset($bFlagRead_instalacaoantena) && $bFlagRead_instalacaoantena))
{
    $this->ajax_return_values_instalacaoantena(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
form_CadSAE_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function stepEmpreendimento_onClick($id_condomino, $num_telefone1, $nom_responsavel1)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_condomino = $this->id_condomino;
$original_id_conjunto = $this->id_conjunto;
$original_id_condomino = $this->id_condomino;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;

sc_include_library("sys", "functions", "functions.php");

$resp = [
	's' => true,
	'm' => ''
];

if ($this->num_telefone1  == '' || (strlen($this->num_telefone1 ) != 11 && strlen($this->num_telefone1 ) != 10) || $this->nom_responsavel1  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae4'] ; 
}
if ($this->id_condomino  != '' && $this->id_conjunto  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae5'] ; 
}

if ($resp['s']) {
	$this->sc_ajax_javascript('nextStep');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}

$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_condomino = $this->id_condomino;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_condomino', 'id_conjunto');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
form_CadSAE_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function stepOperadora_onClick($id_operadora, $id_conjunto, $id_condomino, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_condomino = $this->id_condomino;
$original_id_conjunto = $this->id_conjunto;
$original_id_operadora = $this->id_operadora;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone2 = $this->num_telefone2;
$original_num_celular2 = $this->num_celular2;
$original_id_operadora = $this->id_operadora;
$original_id_conjunto = $this->id_conjunto;
$original_id_condomino = $this->id_condomino;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$Num_TipoUsuario = $s->get("Num_TipoUsuario");

$resp = [
	's' => true,
	'm' => ''
];

if ($this->num_telefone1  == '' || (strlen($this->num_telefone1 ) != 11 && strlen($this->num_telefone1 ) != 10) || $this->nom_responsavel1  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae4'] ; 
}
if ($this->id_condomino  != '' && $this->id_conjunto  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae5'] ; 
}
if ($Num_TipoUsuario == "O" && ($this->id_operadora  == '' || $this->id_operadora  == 0 || 
	($this->nom_responsavel2  == '' || 
	((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae6'] ;
}

if ($resp['s']) {
	$this->sc_ajax_javascript('nextStep');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}

$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_operadora = $this->id_operadora;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_celular2 = $this->num_celular2;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_condomino = $this->id_condomino;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_condomino', 'id_conjunto', 'id_operadora', 'nom_responsavel2', 'num_telefone2', 'num_celular2');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
form_CadSAE_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function stepPrestadora_onClick($id_prestador, $id_operadora, $id_conjunto, $id_condomino, $num_celular3, $num_telefone3, $nom_responsavel3, $num_celular2, $num_telefone2, $nom_responsavel2, $num_telefone1, $nom_responsavel1)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;
$original_id_condomino = $this->id_condomino;
$original_id_conjunto = $this->id_conjunto;
$original_id_operadora = $this->id_operadora;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone2 = $this->num_telefone2;
$original_num_celular2 = $this->num_celular2;
$original_id_prestador = $this->id_prestador;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_telefone3 = $this->num_telefone3;
$original_num_celular3 = $this->num_celular3;
$original_id_prestador = $this->id_prestador;
$original_id_operadora = $this->id_operadora;
$original_id_conjunto = $this->id_conjunto;
$original_id_condomino = $this->id_condomino;
$original_num_celular3 = $this->num_celular3;
$original_num_telefone3 = $this->num_telefone3;
$original_nom_responsavel3 = $this->nom_responsavel3;
$original_num_celular2 = $this->num_celular2;
$original_num_telefone2 = $this->num_telefone2;
$original_nom_responsavel2 = $this->nom_responsavel2;
$original_num_telefone1 = $this->num_telefone1;
$original_nom_responsavel1 = $this->nom_responsavel1;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$Num_TipoUsuario = $s->get("Num_TipoUsuario");

$resp = [
	's' => true,
	'm' => ''
];

if ($this->num_telefone1  == '' || (strlen($this->num_telefone1 ) != 11 && strlen($this->num_telefone1 ) != 10) || $this->nom_responsavel1  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae4'] ; 
}
if ($this->id_condomino  != '' && $this->id_conjunto  == '') { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae5'] ; 
}
if ($Num_TipoUsuario == "O" && ($this->id_operadora  == '' || $this->id_operadora  == 0 ||
	($this->nom_responsavel2  == '' || 
	((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae6'] ;
} elseif ($Num_TipoUsuario == "P" && ($this->id_prestador  == '' || $this->id_prestador  == 0 ||
	($this->nom_responsavel3  == '' || 
	((strlen($this->num_telefone3 ) != 10 && strlen($this->num_telefone3 ) != 11 && strlen($this->num_celular3 ) != 10 && strlen($this->num_celular3 ) != 11)))
)) { 
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae7'] ;
} elseif (
	($Num_TipoUsuario == "G" || $Num_TipoUsuario == "GT") && (
	($this->id_operadora  == '' || $this->id_operadora  == 0 || $this->nom_responsavel2  == '' || 
	 ((strlen($this->num_telefone2 ) != 10 && strlen($this->num_telefone2 ) != 11 && strlen($this->num_celular2 ) != 10 && strlen($this->num_celular2 ) != 11))) && 
	($this->id_prestador  == '' || $this->id_prestador  == 0 || $this->nom_responsavel3  == '' || 
	 ((strlen($this->num_telefone3 ) != 10 && strlen($this->num_telefone3 ) != 11 && strlen($this->num_celular3 ) != 10 && strlen($this->num_celular3 ) != 11)))
)) {
	$resp['s'] = false;
	$resp['m'] .=  $this->Ini->Nm_lang['lang_msg_sae8'] ;
}

if ($resp['s']) {
	$this->sc_ajax_javascript('nextStep');
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$resp['m'].'<br><br><a class="btn btn-primary" onclick="close_sModal()">Ok</a>',
		'{"sizeClass":"lg"}'
	));
}

$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$modificado_id_condomino = $this->id_condomino;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_operadora = $this->id_operadora;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_num_celular2 = $this->num_celular2;
$modificado_id_prestador = $this->id_prestador;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_num_celular3 = $this->num_celular3;
$modificado_id_prestador = $this->id_prestador;
$modificado_id_operadora = $this->id_operadora;
$modificado_id_conjunto = $this->id_conjunto;
$modificado_id_condomino = $this->id_condomino;
$modificado_num_celular3 = $this->num_celular3;
$modificado_num_telefone3 = $this->num_telefone3;
$modificado_nom_responsavel3 = $this->nom_responsavel3;
$modificado_num_celular2 = $this->num_celular2;
$modificado_num_telefone2 = $this->num_telefone2;
$modificado_nom_responsavel2 = $this->nom_responsavel2;
$modificado_num_telefone1 = $this->num_telefone1;
$modificado_nom_responsavel1 = $this->nom_responsavel1;
$this->nm_formatar_campos('num_telefone1', 'nom_responsavel1', 'id_condomino', 'id_conjunto', 'id_operadora', 'nom_responsavel2', 'num_telefone2', 'num_celular2', 'id_prestador', 'nom_responsavel3', 'num_telefone3', 'num_celular3');
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_id_prestador !== $modificado_id_prestador || isset($this->nmgp_cmp_readonly['id_prestador']) || (isset($bFlagRead_id_prestador) && $bFlagRead_id_prestador))
{
    $this->ajax_return_values_id_prestador(true);
}
if ($original_id_operadora !== $modificado_id_operadora || isset($this->nmgp_cmp_readonly['id_operadora']) || (isset($bFlagRead_id_operadora) && $bFlagRead_id_operadora))
{
    $this->ajax_return_values_id_operadora(true);
}
if ($original_id_conjunto !== $modificado_id_conjunto || isset($this->nmgp_cmp_readonly['id_conjunto']) || (isset($bFlagRead_id_conjunto) && $bFlagRead_id_conjunto))
{
    $this->ajax_return_values_id_conjunto(true);
}
if ($original_id_condomino !== $modificado_id_condomino || isset($this->nmgp_cmp_readonly['id_condomino']) || (isset($bFlagRead_id_condomino) && $bFlagRead_id_condomino))
{
    $this->ajax_return_values_id_condomino(true);
}
if ($original_num_celular3 !== $modificado_num_celular3 || isset($this->nmgp_cmp_readonly['num_celular3']) || (isset($bFlagRead_num_celular3) && $bFlagRead_num_celular3))
{
    $this->ajax_return_values_num_celular3(true);
}
if ($original_num_telefone3 !== $modificado_num_telefone3 || isset($this->nmgp_cmp_readonly['num_telefone3']) || (isset($bFlagRead_num_telefone3) && $bFlagRead_num_telefone3))
{
    $this->ajax_return_values_num_telefone3(true);
}
if ($original_nom_responsavel3 !== $modificado_nom_responsavel3 || isset($this->nmgp_cmp_readonly['nom_responsavel3']) || (isset($bFlagRead_nom_responsavel3) && $bFlagRead_nom_responsavel3))
{
    $this->ajax_return_values_nom_responsavel3(true);
}
if ($original_num_celular2 !== $modificado_num_celular2 || isset($this->nmgp_cmp_readonly['num_celular2']) || (isset($bFlagRead_num_celular2) && $bFlagRead_num_celular2))
{
    $this->ajax_return_values_num_celular2(true);
}
if ($original_num_telefone2 !== $modificado_num_telefone2 || isset($this->nmgp_cmp_readonly['num_telefone2']) || (isset($bFlagRead_num_telefone2) && $bFlagRead_num_telefone2))
{
    $this->ajax_return_values_num_telefone2(true);
}
if ($original_nom_responsavel2 !== $modificado_nom_responsavel2 || isset($this->nmgp_cmp_readonly['nom_responsavel2']) || (isset($bFlagRead_nom_responsavel2) && $bFlagRead_nom_responsavel2))
{
    $this->ajax_return_values_nom_responsavel2(true);
}
if ($original_num_telefone1 !== $modificado_num_telefone1 || isset($this->nmgp_cmp_readonly['num_telefone1']) || (isset($bFlagRead_num_telefone1) && $bFlagRead_num_telefone1))
{
    $this->ajax_return_values_num_telefone1(true);
}
if ($original_nom_responsavel1 !== $modificado_nom_responsavel1 || isset($this->nmgp_cmp_readonly['nom_responsavel1']) || (isset($bFlagRead_nom_responsavel1) && $bFlagRead_nom_responsavel1))
{
    $this->ajax_return_values_nom_responsavel1(true);
}
form_CadSAE_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function in2days ($i) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
	return ($i <= date('Y-m-d 23:59', strtotime('+2 days')));

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function inEnterprise ($i, $f, $days) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
	$wi = date('w', strtotime($i));
	$wf = date('w', strtotime($f));
	$hi = date('H:i', strtotime($i));
	$hf = date('H:i', strtotime($f));
	
	if ($days[0][2*$wi] < $days[0][2*$wi+1]) {
		if (!$days[0][2*$wi] || !$days[0][2*$wi+1] || $days[0][2*$wi] > $hi || $days[0][2*$wi+1] < $hi) return true;
		if (!$days[0][2*$wf] || !$days[0][2*$wf+1] || $days[0][2*$wf] > $hf || $days[0][2*$wf+1] < $hf) return true;	
	} elseif($days[0][2*$wi] > $days[0][2*$wi+1]) {
		if (!$days[0][2*$wi] || !$days[0][2*$wi+1] || 
			($days[0][2*$wi] > $hi && $days[0][2*$wi+1] < $hi) ||
		   	($days[0][2*$wi] > $hi && $days[0][2*$wi] < $hf)) return true;
		if (!$days[0][2*$wf] || !$days[0][2*$wf+1] || 
			($days[0][2*$wf] > $hf && $days[0][2*$wf+1] < $hf) || 
		   	($days[0][2*$wf+1] > $hi && $days[0][2*$wf+1] < $hf)) return true;
	}
	if ($wi != $wf) {
		if ($days[0][2*$wi] < $days[0][2*$wi+1]) {
			if ($days[0][2*$wi+1] > $hi && ($days[0][2*$wi+1] < "23:59" || $days[0][2*$wi] > "00:00")) return true;
			if ($days[0][2*$wf] < $hf && ($days[0][2*$wi+1] < "23:59" || $days[0][2*$wi] > "00:00")) return true;
		} elseif ($days[0][2*$wi] > $days[0][2*$wi+1]) {
			if ($days[0][2*$wi] > $hi || $days[0][2*$wi+1] > $hi) return true;
			if ($days[0][2*$wi] < $hf || $days[0][2*$wi+1] < $hf) return true;
		}
		
		$a = $wf > $wi ? $wf : $wf + 6; 
		if ($a - $wi > 2) {
			$index = $wi; 
			while ($index != ($wf - 1)) {
				$index = ($wi == 6) ? 0 : ++$index; 
				if ($days[0][2*$index] > "00:00" || $days[0][2*$index+1] < "23:59") return true;
			}
		}
	}
	return false;

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function in9_18 ($i, $f) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
	$hi = date('H:i', strtotime($i));
	$hf = date('H:i', strtotime($f));
	
	if ("09:00" > $hi || "18:00" < $hi) return true;
	if ("09:00" > $hf || "18:00" < $hf) return true;
	
	if ($wi != $wf) return true;
	
	return false;

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function inTecAppointment($eventSAE) {
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
                                                                         
	$freeGBT =$this->getGBTDisp($eventSAE, array(), true);
	var_dump($freeGBT);
	if (count($freeGBT["listUsers"]) == 0 && $freeGBT["totalUser"] > 0) {
		return true;
	}
	return false;
	

$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
}
function validateInterval($dInit, $hInit, $dFin, $hFin)
{
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'on';
if (!isset($this->sc_temp_ID_Empreendimento)) {$this->sc_temp_ID_Empreendimento = (isset($_SESSION['ID_Empreendimento'])) ? $_SESSION['ID_Empreendimento'] : "";}
if (!isset($this->sc_temp_Emergencial)) {$this->sc_temp_Emergencial = (isset($_SESSION['Emergencial'])) ? $_SESSION['Emergencial'] : "";}
if (!isset($this->sc_temp_InstalacaoAntena)) {$this->sc_temp_InstalacaoAntena = (isset($_SESSION['InstalacaoAntena'])) ? $_SESSION['InstalacaoAntena'] : "";}
                                                                         
if (!$dInit || !$hInit || !$dFin || !$hFin) return ['s'=>false,'m'=>"Dados inválidos"];

$eventSAE = [
	"Di" => $dInit,
	"Hi" => $hInit ? $hInit : "00:00:00",
	"Df" => $dFin,
	"Hf" => $hFin ? $hFin : "23:59:00"
];
$i = $eventSAE["Di"]." ".$eventSAE["Hi"];
$f = $eventSAE["Df"]." ".$eventSAE["Hf"];

if ($i >= $f) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_endTimeSAE'] ];
if ($i <= date('Y-m-d H:i')) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_saeIntervalshould'] ." <strong>".date('d/m/Y H:i')."</strong>"];

 
      $nm_select = "SELECT Code_SAE FROM tb_tipossae WHERE ID = '$this->id_tiposae'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->tSae = array();
      $this->tsae = array();
     if ($this->id_tiposae != "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->tSae[$y] [$x] = $rx->fields[$x];
                      $this->tsae[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->tSae = false;
          $this->tSae_erro = $this->Db->ErrorMsg();
          $this->tsae = false;
          $this->tsae_erro = $this->Db->ErrorMsg();
      } 
     } 
;

$InstalacaoAntena = $this->sc_temp_InstalacaoAntena;
$Emergencial = $this->sc_temp_Emergencial;
$ID_Empreendimento = $this->sc_temp_ID_Empreendimento;


switch($this->tSae[0][0]) {
	case("instalacao"):
		if ($this->in2days($i)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_saeMustBeOp'] ];
		$rs =$this->getDHInstalacao($ID_Empreendimento);
		if (isset($rs[0][0])) {
			if ($this->inEnterprise($i, $f, $rs)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_hoursFunc'] ];
			if ($InstalacaoAntena == 'S') {
				if ($this->in9_18($i, $f)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_saeInterval'] ];
			}
		}
		
		if ($this->inTecAppointment($eventSAE)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_dontHaveTec'] ];
	break;
	case("vistoria"):
		if ($this->in2days($i)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_saeMustBeOp'] ];
		$rs =$this->getDHVistoria($ID_Empreendimento);
		if (isset($rs[0][0])) {
			if ($this->inEnterprise($i, $f, $rs)) return ['s'=>false,'m'=>  $this->Ini->Nm_lang['lang_label_hoursFunc'] ];
		}
		if ($this->optantegbtec  != 'N') {
			if ($this->inTecAppointment($eventSAE)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_dontHaveTec'] ];
		}
	break;
	case("manutencao"):
		if ($Emergencial == 'N')  {
			if ($this->in2days($i)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_saeMustBeOp'] ];
			$rs =$this->getDHVistoria($ID_Empreendimento);
			
			if (isset($rs[0][0])) {
				if ($this->inEnterprise($i, $f, $rs)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_hoursFunc'] ];
			}
		}
		if ($this->optantegbtec  != 'N') {
			if ($this->inTecAppointment($eventSAE)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_dontHaveTec'] ];
		}
	break;
	case("testeFusao"):
		if ($Emergencial == 'N')  {
			$rs =$this->getDHVistoria($ID_Empreendimento);
			if (isset($rs[0][0])) {
				if ($this->inEnterprise($i, $f, $rs)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_hoursFunc'] ];
			}
		}
		if ($this->optantegbtec  != 'N') {
			if ($this->inTecAppointment($eventSAE)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_dontHaveTec'] ];
		}
	break;
	case("desinstalacao"):
		$rs =$this->getDHInstalacao($ID_Empreendimento);
		if (isset($rs[0][0])) {
			if ($this->inEnterprise($i, $f, $rs)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_hoursFunc'] ];
		}
		if ($this->inTecAppointment($eventSAE)) return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_dontHaveTec'] ];
	break;
	default:
    	return ['s'=>false,'m'=> $this->Ini->Nm_lang['lang_label_specifySAE'] ];
	break;
}

return ['s'=>true];
if (isset($this->sc_temp_InstalacaoAntena)) { $_SESSION['InstalacaoAntena'] = $this->sc_temp_InstalacaoAntena;}
if (isset($this->sc_temp_Emergencial)) { $_SESSION['Emergencial'] = $this->sc_temp_Emergencial;}
if (isset($this->sc_temp_ID_Empreendimento)) { $_SESSION['ID_Empreendimento'] = $this->sc_temp_ID_Empreendimento;}
$_SESSION['hticnsdata']['form_CadSAE']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_CadSAE_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
    include_once("form_CadSAE_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['csrf_token'];
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

   function Form_lookup_referenteprojeto()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT ID_projeto, ProtocoloHex 
FROM tb_projetos 
WHERE ID_projeto = '$this->referenteprojeto' 
ORDER BY ProtocoloHex";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_referenteprojeto'][] = $rs->fields[0];
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
   function Form_lookup_optantegbtec()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "{lang_label_yes}?#?S?#?N?@?";
       $nmgp_def_dados .= "{lang_label_no}?#?N?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_num_status()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "{lang_label_status_upc1}?#?A?#?N?@?";
       $nmgp_def_dados .= "{lang_label_status_upc7}?#?AP?#?N?@?";
       $nmgp_def_dados .= "{lang_label_status_upc2}?#?AA?#?N?@?";
       $nmgp_def_dados .= "{lang_label_status_upc3}?#?AE?#?N?@?";
       $nmgp_def_dados .= "{lang_label_status_upc4}?#?RAE?#?N?@?";
       $nmgp_def_dados .= "{lang_label_status_upc8}?#?C?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_gbt_selecionados()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, b.Nom_Nome 
FROM tb_saetecgb a 
INNER JOIN tb_usuarios b ON b.ID_Usuario = a.ID_Usuario 
WHERE a.Num_SAE = '" . $_SESSION['Num_SAE'] . "' 
GROUP BY a.ID_Usuario 
ORDER BY a.ID_Usuario";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_selecionados'][] = $rs->fields[0];
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
   function Form_lookup_gbt_disponiveis()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "select a.ID_Usuario, a.Nom_Nome 
from tb_usuarios a 
WHERE a.Num_TipoUsuario  = 'GT' AND 
a.ID_Usuario NOT IN ( 
	SELECT c.ID_Usuario FROM tb_agenda c 
    INNER JOIN tb_sae d ON d.Num_SAE = '" . $_SESSION['Num_SAE'] . "' 
	WHERE  
        CONCAT(d.Data_Inicio,' ',d.Hora_Inicio) BETWEEN CONCAT(c.Data_Inicio,' ',c.Hora_Inicio) AND CONCAT(c.Data_Fim,' ',c.Hora_Fim) OR 
        CONCAT(d.Data_Fim,' ',d.Hora_Fim) BETWEEN CONCAT(c.Data_Inicio,' ',c.Hora_Inicio) AND CONCAT(c.Data_Fim,' ',c.Hora_Fim) OR 
	CONCAT(c.Data_Inicio,' ',c.Hora_Inicio) BETWEEN CONCAT(d.Data_Inicio,' ',d.Hora_Inicio) AND CONCAT(d.Data_Fim,' ',d.Hora_Fim) OR 
        CONCAT(c.Data_Fim,' ',c.Hora_Fim) BETWEEN CONCAT(d.Data_Inicio,' ',d.Hora_Inicio) AND CONCAT(d.Data_Fim,' ',d.Hora_Fim) 
) 
order by a.Nom_UserName";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_gbt_disponiveis'][] = $rs->fields[0];
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
   function Form_lookup_id_empreendimento()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento 
FROM tb_empreendimentos 
WHERE ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "' 
ORDER BY Nom_Empreendimento";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_empreendimento'][] = $rs->fields[0];
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
   function Form_lookup_id_condomino()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT ID_Condomino, Nom_Nome 
FROM tb_condominos 
WHERE ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "' 
AND Nom_Nome != ''
AND Num_Ativo = 'S' 
ORDER BY Nom_Nome";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_condomino'][] = $rs->fields[0];
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
   function Form_lookup_id_torre()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'] = array(); 
}
if ($this->id_condomino != "")
{ 
   $this->nm_clear_val("id_condomino");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, a.Nom_Torre 
FROM tb_torre a 
INNER JOIN tb_andar b ON b.ID_Torre = a.ID 
INNER JOIN tb_conjunto c ON c.ID_Andar = b.ID 
INNER JOIN tb_ocupacao d ON d.ID_Conjunto = c.ID 
WHERE d.ID_Condomino = '$this->id_condomino' 
GROUP BY ID 
ORDER BY Nom_Torre";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_torre'][] = $rs->fields[0];
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
   function Form_lookup_id_andar()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'] = array(); 
}
if ($this->id_condomino != "")
{ 
   $this->nm_clear_val("id_condomino");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, a.Nom_Andar
FROM tb_andar a 
INNER JOIN tb_conjunto c ON c.ID_Andar = a.ID 
INNER JOIN tb_ocupacao d ON d.ID_Conjunto = c.ID 
WHERE a.ID_Torre = '$this->id_torre' AND 
d.ID_Condomino = '$this->id_condomino' 
GROUP BY a.ID 
ORDER BY cast(a.Nom_Andar as unsigned)";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_andar'][] = $rs->fields[0];
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
   function Form_lookup_id_conjunto()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'] = array(); 
}
if ($this->id_condomino != "")
{ 
   $this->nm_clear_val("id_condomino");
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID, a.Nom_Conjunto
FROM tb_conjunto a 
INNER JOIN tb_ocupacao d ON d.ID_Conjunto = a.ID 
WHERE a.ID_Andar = '$this->id_andar' AND 
d.ID_Condomino = '$this->id_condomino' 
GROUP BY a.ID 
ORDER BY cast(a.Nom_Conjunto as unsigned)";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_conjunto'][] = $rs->fields[0];
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID_Operadoras, a.Nom_Operadoras 
FROM tb_operadoras a 
" . $_SESSION['SQL_ope'] . " 
ORDER BY a.Nom_Operadoras";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_operadora'][] = $rs->fields[0];
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
   function Form_lookup_id_prestador()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'] = array(); 
    }

   $old_value_data_abertura = $this->data_abertura;
   $old_value_data_abertura_hora = $this->data_abertura_hora;
   $old_value_data_fechamento = $this->data_fechamento;
   $old_value_data_fechamento_hora = $this->data_fechamento_hora;
   $old_value_num_telefone1 = $this->num_telefone1;
   $old_value_num_telefone2 = $this->num_telefone2;
   $old_value_num_celular2 = $this->num_celular2;
   $old_value_num_telefone3 = $this->num_telefone3;
   $old_value_num_celular3 = $this->num_celular3;
   $old_value_id = $this->id;
   $old_value_id_tiposae = $this->id_tiposae;
   $old_value_data_inicio = $this->data_inicio;
   $old_value_hora_inicio = $this->hora_inicio;
   $old_value_data_fim = $this->data_fim;
   $old_value_hora_fim = $this->hora_fim;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_data_abertura = $this->data_abertura;
   $unformatted_value_data_abertura_hora = $this->data_abertura_hora;
   $unformatted_value_data_fechamento = $this->data_fechamento;
   $unformatted_value_data_fechamento_hora = $this->data_fechamento_hora;
   $unformatted_value_num_telefone1 = $this->num_telefone1;
   $unformatted_value_num_telefone2 = $this->num_telefone2;
   $unformatted_value_num_celular2 = $this->num_celular2;
   $unformatted_value_num_telefone3 = $this->num_telefone3;
   $unformatted_value_num_celular3 = $this->num_celular3;
   $unformatted_value_id = $this->id;
   $unformatted_value_id_tiposae = $this->id_tiposae;
   $unformatted_value_data_inicio = $this->data_inicio;
   $unformatted_value_hora_inicio = $this->hora_inicio;
   $unformatted_value_data_fim = $this->data_fim;
   $unformatted_value_hora_fim = $this->hora_fim;

   $nm_comando = "SELECT a.ID_Prestador, b.Nom_RazaoSocial 
FROM tb_infoprestadores a 
" . $_SESSION['SQL_pre'] . " 
Group BY a.ID_Prestador";

   $this->data_abertura = $old_value_data_abertura;
   $this->data_abertura_hora = $old_value_data_abertura_hora;
   $this->data_fechamento = $old_value_data_fechamento;
   $this->data_fechamento_hora = $old_value_data_fechamento_hora;
   $this->num_telefone1 = $old_value_num_telefone1;
   $this->num_telefone2 = $old_value_num_telefone2;
   $this->num_celular2 = $old_value_num_celular2;
   $this->num_telefone3 = $old_value_num_telefone3;
   $this->num_celular3 = $old_value_num_celular3;
   $this->id = $old_value_id;
   $this->id_tiposae = $old_value_id_tiposae;
   $this->data_inicio = $old_value_data_inicio;
   $this->hora_inicio = $old_value_hora_inicio;
   $this->data_fim = $old_value_data_fim;
   $this->hora_fim = $old_value_hora_fim;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['Lookup_id_prestador'][] = $rs->fields[0];
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
   function Form_lookup_emergencial()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $nmgp_def_dados .= "?#?N?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_instalacaoantena()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $nmgp_def_dados .= "?#?N?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_CadSAE_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "ID_TipoSAE", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_id_conjunto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Conjunto", $arg_search, $data_lookup);
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
          $data_lookup = $this->SC_lookup_id_prestador($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Prestador", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Responsavel1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Responsavel2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Celular2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Responsavel3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Celular3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_SAE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_referenteprojeto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ReferenteProjeto", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Usuario", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Usuario_Fechamento", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_optantegbtec($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "OptanteGBTec", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_num_status($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Num_Status", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Ativo", $arg_search, $data_search);
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
          $data_lookup = $this->SC_lookup_id_condomino($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Condomino", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Responsavel1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_conjunto($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Conjunto", $arg_search, $data_lookup);
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
          $this->SC_monta_condicao($comando, "Nom_Responsavel2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Celular2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_prestador($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Prestador", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Responsavel3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Telefone3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_Celular3", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_TipoSAE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_emergencial($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Emergencial", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_instalacaoantena($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "InstalacaoAntena", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "PontoDeEncontro", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "`Desc`", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Tipo_Cliente", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter_form'] . " and (Num_SAE = '" . $_SESSION['Num_SAE'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where Num_SAE = '" . $_SESSION['Num_SAE'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_CadSAE = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['total'] = $qt_geral_reg_form_CadSAE;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadSAE_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadSAE_pack_ajax_response();
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
      $nm_numeric[] = "id";$nm_numeric[] = "id_tiposae";$nm_numeric[] = "id_empreendimento";$nm_numeric[] = "id_condomino";$nm_numeric[] = "id_conjunto";$nm_numeric[] = "id_operadora";$nm_numeric[] = "id_prestador";$nm_numeric[] = "id_usuario";$nm_numeric[] = "id_usuario_fechamento";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['decimal_db'] == ".")
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
      $Nm_datas['data_inicio'] = "date";$Nm_datas['hora_inicio'] = "time";$Nm_datas['data_fim'] = "date";$Nm_datas['hora_fim'] = "time";$Nm_datas['data_abertura'] = "timestamp";$Nm_datas['data_fechamento'] = "timestamp";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['SC_sep_date1'];
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
   function SC_lookup_id_empreendimento($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT Nom_Empreendimento, ID_Empreendimento FROM tb_empreendimentos WHERE (CAST (ID_Empreendimento AS TEXT) LIKE '%$campo%') AND (ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "')" ; 
       }
       else
       {
           $nm_comando = "SELECT Nom_Empreendimento, ID_Empreendimento FROM tb_empreendimentos WHERE (Nom_Empreendimento LIKE '%$campo%') AND (ID_Empreendimento = '" . $_SESSION['ID_Empreendimento'] . "')" ; 
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
   function SC_lookup_id_conjunto($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT a.Nom_Conjunto, a.ID, a.ID_Andar, d.ID_Condomino FROM tb_conjunto a  INNER JOIN tb_ocupacao d ON d.ID_Conjunto = a.ID WHERE (a.Nom_Conjunto LIKE '%$campo%')" ; 
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
       $nm_comando = "SELECT Nom_Operadoras, a.ID_Operadoras FROM tb_operadoras a  " . $_SESSION['SQL_ope'] . " WHERE (Nom_Operadoras LIKE '%$campo%')" ; 
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
   function SC_lookup_id_prestador($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT Nom_RazaoSocial, a.ID_Prestador FROM tb_infoprestadores a  " . $_SESSION['SQL_pre'] . " WHERE (Nom_RazaoSocial LIKE '%$campo%')" ; 
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
       $nmgp_saida_form = "form_CadSAE_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_CadSAE_fim.php";
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
       form_CadSAE_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadSAE']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_CadSAE_pack_ajax_response();
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
       form_CadSAE_pack_ajax_response();
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
        if ('data_abertura' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }
        if ('data_fechamento' == $sField)
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
