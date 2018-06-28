<?php
//
class form_CadastroDeUsuarios_mob_apl
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
   var $id_usuario;
   var $nom_username;
   var $password;
   var $nom_nome;
   var $num_tipousuario;
   var $num_tipousuario_1;
   var $id_perfil;
   var $id_perfil_1;
   var $id_ope;
   var $contexto_tipo;
   var $contexto_id_ope;
   var $end_numero;
   var $num_totvs;
   var $data_ultimologin;
   var $data_ultimologin_hora;
   var $num_ativo;
   var $num_ativo_1;
   var $img_foto;
   var $img_foto_scfile_name;
   var $img_foto_ul_name;
   var $img_foto_scfile_type;
   var $img_foto_ul_type;
   var $img_foto_limpa;
   var $img_foto_salva;
   var $out_img_foto;
   var $out1_img_foto;
   var $num_cpf;
   var $num_rg;
   var $data_nascimento;
   var $nom_email1;
   var $nom_email2;
   var $num_telefonecomercial;
   var $nom_telefoneresidencial;
   var $num_telefonecelular;
   var $end_logradouro;
   var $end_complemento;
   var $end_bairro;
   var $end_cidade;
   var $end_uf;
   var $end_cep;
   var $criadopor;
   var $cargo;
   var $departamento;
   var $departamento_1;
   var $criado_em;
   var $criado_em_hora;
   var $alterado_em;
   var $alterado_em_hora;
   var $removido_em;
   var $removido_em_hora;
   var $diasinatividade;
   var $diasinatividade_1;
   var $numtentativaslogin;
   var $agendadatajson;
   var $empreendimento;
   var $empreendimento_1;
   var $gbttecempreendimentos;
   var $gbttecempreendimentos_hidden;
   var $operadora;
   var $operadora_1;
   var $pass;
   var $pass_confirm;
   var $prestadora;
   var $prestadora_1;
   var $removeronclick;
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
          if (isset($this->NM_ajax_info['param']['agendadatajson']))
          {
              $this->agendadatajson = $this->NM_ajax_info['param']['agendadatajson'];
          }
          if (isset($this->NM_ajax_info['param']['alterado_em']))
          {
              $this->alterado_em = $this->NM_ajax_info['param']['alterado_em'];
          }
          if (isset($this->NM_ajax_info['param']['cargo']))
          {
              $this->cargo = $this->NM_ajax_info['param']['cargo'];
          }
          if (isset($this->NM_ajax_info['param']['contexto_id_ope']))
          {
              $this->contexto_id_ope = $this->NM_ajax_info['param']['contexto_id_ope'];
          }
          if (isset($this->NM_ajax_info['param']['contexto_tipo']))
          {
              $this->contexto_tipo = $this->NM_ajax_info['param']['contexto_tipo'];
          }
          if (isset($this->NM_ajax_info['param']['criado_em']))
          {
              $this->criado_em = $this->NM_ajax_info['param']['criado_em'];
          }
          if (isset($this->NM_ajax_info['param']['criadopor']))
          {
              $this->criadopor = $this->NM_ajax_info['param']['criadopor'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['data_nascimento']))
          {
              $this->data_nascimento = $this->NM_ajax_info['param']['data_nascimento'];
          }
          if (isset($this->NM_ajax_info['param']['data_ultimologin']))
          {
              $this->data_ultimologin = $this->NM_ajax_info['param']['data_ultimologin'];
          }
          if (isset($this->NM_ajax_info['param']['departamento']))
          {
              $this->departamento = $this->NM_ajax_info['param']['departamento'];
          }
          if (isset($this->NM_ajax_info['param']['diasinatividade']))
          {
              $this->diasinatividade = $this->NM_ajax_info['param']['diasinatividade'];
          }
          if (isset($this->NM_ajax_info['param']['empreendimento']))
          {
              $this->empreendimento = $this->NM_ajax_info['param']['empreendimento'];
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
          if (isset($this->NM_ajax_info['param']['gbttecempreendimentos']))
          {
              $this->gbttecempreendimentos = $this->NM_ajax_info['param']['gbttecempreendimentos'];
          }
          if (isset($this->NM_ajax_info['param']['id_ope']))
          {
              $this->id_ope = $this->NM_ajax_info['param']['id_ope'];
          }
          if (isset($this->NM_ajax_info['param']['id_perfil']))
          {
              $this->id_perfil = $this->NM_ajax_info['param']['id_perfil'];
          }
          if (isset($this->NM_ajax_info['param']['id_usuario']))
          {
              $this->id_usuario = $this->NM_ajax_info['param']['id_usuario'];
          }
          if (isset($this->NM_ajax_info['param']['img_foto']))
          {
              $this->img_foto = $this->NM_ajax_info['param']['img_foto'];
          }
          if (isset($this->NM_ajax_info['param']['img_foto_limpa']))
          {
              $this->img_foto_limpa = $this->NM_ajax_info['param']['img_foto_limpa'];
          }
          if (isset($this->NM_ajax_info['param']['img_foto_ul_name']))
          {
              $this->img_foto_ul_name = $this->NM_ajax_info['param']['img_foto_ul_name'];
          }
          if (isset($this->NM_ajax_info['param']['img_foto_ul_type']))
          {
              $this->img_foto_ul_type = $this->NM_ajax_info['param']['img_foto_ul_type'];
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
          if (isset($this->NM_ajax_info['param']['nom_email1']))
          {
              $this->nom_email1 = $this->NM_ajax_info['param']['nom_email1'];
          }
          if (isset($this->NM_ajax_info['param']['nom_email2']))
          {
              $this->nom_email2 = $this->NM_ajax_info['param']['nom_email2'];
          }
          if (isset($this->NM_ajax_info['param']['nom_nome']))
          {
              $this->nom_nome = $this->NM_ajax_info['param']['nom_nome'];
          }
          if (isset($this->NM_ajax_info['param']['nom_telefoneresidencial']))
          {
              $this->nom_telefoneresidencial = $this->NM_ajax_info['param']['nom_telefoneresidencial'];
          }
          if (isset($this->NM_ajax_info['param']['nom_username']))
          {
              $this->nom_username = $this->NM_ajax_info['param']['nom_username'];
          }
          if (isset($this->NM_ajax_info['param']['num_ativo']))
          {
              $this->num_ativo = $this->NM_ajax_info['param']['num_ativo'];
          }
          if (isset($this->NM_ajax_info['param']['num_cpf']))
          {
              $this->num_cpf = $this->NM_ajax_info['param']['num_cpf'];
          }
          if (isset($this->NM_ajax_info['param']['num_rg']))
          {
              $this->num_rg = $this->NM_ajax_info['param']['num_rg'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefonecelular']))
          {
              $this->num_telefonecelular = $this->NM_ajax_info['param']['num_telefonecelular'];
          }
          if (isset($this->NM_ajax_info['param']['num_telefonecomercial']))
          {
              $this->num_telefonecomercial = $this->NM_ajax_info['param']['num_telefonecomercial'];
          }
          if (isset($this->NM_ajax_info['param']['num_tipousuario']))
          {
              $this->num_tipousuario = $this->NM_ajax_info['param']['num_tipousuario'];
          }
          if (isset($this->NM_ajax_info['param']['num_totvs']))
          {
              $this->num_totvs = $this->NM_ajax_info['param']['num_totvs'];
          }
          if (isset($this->NM_ajax_info['param']['numtentativaslogin']))
          {
              $this->numtentativaslogin = $this->NM_ajax_info['param']['numtentativaslogin'];
          }
          if (isset($this->NM_ajax_info['param']['operadora']))
          {
              $this->operadora = $this->NM_ajax_info['param']['operadora'];
          }
          if (isset($this->NM_ajax_info['param']['pass']))
          {
              $this->pass = $this->NM_ajax_info['param']['pass'];
          }
          if (isset($this->NM_ajax_info['param']['pass_confirm']))
          {
              $this->pass_confirm = $this->NM_ajax_info['param']['pass_confirm'];
          }
          if (isset($this->NM_ajax_info['param']['password']))
          {
              $this->password = $this->NM_ajax_info['param']['password'];
          }
          if (isset($this->NM_ajax_info['param']['prestadora']))
          {
              $this->prestadora = $this->NM_ajax_info['param']['prestadora'];
          }
          if (isset($this->NM_ajax_info['param']['removeronclick']))
          {
              $this->removeronclick = $this->NM_ajax_info['param']['removeronclick'];
          }
          if (isset($this->NM_ajax_info['param']['removido_em']))
          {
              $this->removido_em = $this->NM_ajax_info['param']['removido_em'];
          }
          if (isset($this->NM_ajax_info['param']['savedataonclick']))
          {
              $this->savedataonclick = $this->NM_ajax_info['param']['savedataonclick'];
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
      if (isset($this->grid_ID_Usuario) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['grid_ID_Usuario'] = $this->grid_ID_Usuario;
      }
      if (isset($this->profile_TypeUserCreate) && isset($this->NM_contr_var_session) && $this->NM_contr_var_session == "Yes") 
      {
          $_SESSION['profile_TypeUserCreate'] = $this->profile_TypeUserCreate;
      }
      if (isset($_POST["grid_ID_Usuario"]) && isset($this->grid_ID_Usuario)) 
      {
          $_SESSION['grid_ID_Usuario'] = $this->grid_ID_Usuario;
      }
      if (!isset($_POST["grid_ID_Usuario"]) && isset($_POST["grid_id_usuario"])) 
      {
          $_SESSION['grid_ID_Usuario'] = $this->grid_id_usuario;
      }
      if (isset($_POST["profile_TypeUserCreate"]) && isset($this->profile_TypeUserCreate)) 
      {
          $_SESSION['profile_TypeUserCreate'] = $this->profile_TypeUserCreate;
      }
      if (!isset($_POST["profile_TypeUserCreate"]) && isset($_POST["profile_typeusercreate"])) 
      {
          $_SESSION['profile_TypeUserCreate'] = $this->profile_typeusercreate;
      }
      if (isset($_GET["grid_ID_Usuario"]) && isset($this->grid_ID_Usuario)) 
      {
          $_SESSION['grid_ID_Usuario'] = $this->grid_ID_Usuario;
      }
      if (!isset($_GET["grid_ID_Usuario"]) && isset($_GET["grid_id_usuario"])) 
      {
          $_SESSION['grid_ID_Usuario'] = $this->grid_id_usuario;
      }
      if (isset($_GET["profile_TypeUserCreate"]) && isset($this->profile_TypeUserCreate)) 
      {
          $_SESSION['profile_TypeUserCreate'] = $this->profile_TypeUserCreate;
      }
      if (!isset($_GET["profile_TypeUserCreate"]) && isset($_GET["profile_typeusercreate"])) 
      {
          $_SESSION['profile_TypeUserCreate'] = $this->profile_typeusercreate;
      }
      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['nm_run_menu'] = 1;
      } 
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['embutida_parms'];
          unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['embutida_parms']);
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
                 nm_limpa_str_form_CadastroDeUsuarios_mob($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (!isset($this->grid_ID_Usuario) && isset($this->grid_id_usuario)) 
          {
              $this->grid_ID_Usuario = $this->grid_id_usuario;
          }
          if (isset($this->grid_ID_Usuario)) 
          {
              $_SESSION['grid_ID_Usuario'] = $this->grid_ID_Usuario;
          }
          if (!isset($this->profile_TypeUserCreate) && isset($this->profile_typeusercreate)) 
          {
              $this->profile_TypeUserCreate = $this->profile_typeusercreate;
          }
          if (isset($this->profile_TypeUserCreate)) 
          {
              $_SESSION['profile_TypeUserCreate'] = $this->profile_TypeUserCreate;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['sc_redir_insert'] = $this->sc_redir_insert;
          }
          if (!isset($this->grid_ID_Usuario) && isset($this->grid_id_usuario)) 
          {
              $this->grid_ID_Usuario = $this->grid_id_usuario;
          }
          if (isset($this->grid_ID_Usuario)) 
          {
              $_SESSION['grid_ID_Usuario'] = $this->grid_ID_Usuario;
          }
          if (!isset($this->profile_TypeUserCreate) && isset($this->profile_typeusercreate)) 
          {
              $this->profile_TypeUserCreate = $this->profile_typeusercreate;
          }
          if (isset($this->profile_TypeUserCreate)) 
          {
              $_SESSION['profile_TypeUserCreate'] = $this->profile_TypeUserCreate;
          }
      } 
      elseif (isset($hti_cnsdata_init) && !empty($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['parms']);
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
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->alterado_em);
          $this->alterado_em      = $aDtParts[0];
          $this->alterado_em_hora = $aDtParts[1];
      }
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->removido_em);
          $this->removido_em      = $aDtParts[0];
          $this->removido_em_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup']) && $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_CadastroDeUsuarios_mob_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("pt_br");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['initialize'];
          if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios']))
          {
              foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios'] as $I_conf => $Conf_opt)
              {
                  $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob'][$I_conf]  = $Conf_opt;
              }
          }
      } 
      else 
      { 
         $this->nm_data = new nm_data("pt_br");
      } 
      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['upload_field_info'] = array();

      $_SESSION['sc_session'][$hti_cnsdata_init]['form_CadastroDeUsuarios_mob']['upload_field_info']['img_foto'] = array(
          'app_dir'            => $this->Ini->path_aplicacao,
          'app_name'           => 'form_CadastroDeUsuarios_mob',
          'upload_dir'         => $this->Ini->root . $this->Ini->path_imag_temp . '/',
          'upload_url'         => $this->Ini->path_imag_temp . '/',
          'upload_type'        => 'single',
          'upload_allowed_type'  => '/.+$/i',
          'upload_file_height' => '200',
          'upload_file_width'  => '200',
          'upload_file_aspect' => 'S',
          'upload_file_type'   => 'I',
      );

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['hticnsdata']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadastroDeUsuarios_mob']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['form_CadastroDeUsuarios_mob'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastroDeUsuarios_mob']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastroDeUsuarios_mob']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_CadastroDeUsuarios_mob') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['form_CadastroDeUsuarios_mob']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tb_usuarios";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_CadastroDeUsuarios_mob")
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
      $this->nm_new_label['nom_username'] = '' . $this->Ini->Nm_lang['lang_label_username'] . '';
      $this->nm_new_label['nom_nome'] = '' . $this->Ini->Nm_lang['lang_label_fullname'] . '';
      $this->nm_new_label['num_tipousuario'] = '' . $this->Ini->Nm_lang['lang_label_typeuser'] . '';
      $this->nm_new_label['id_perfil'] = '' . $this->Ini->Nm_lang['lang_label_permissionprofile'] . '';
      $this->nm_new_label['end_numero'] = '' . $this->Ini->Nm_lang['lang_label_number'] . '';
      $this->nm_new_label['num_totvs'] = '' . $this->Ini->Nm_lang['lang_label_numtotvs'] . '';
      $this->nm_new_label['num_ativo'] = '' . $this->Ini->Nm_lang['lang_label_status'] . '';
      $this->nm_new_label['img_foto'] = '' . $this->Ini->Nm_lang['lang_label_profile_img'] . '';
      $this->nm_new_label['num_cpf'] = '' . $this->Ini->Nm_lang['lang_label_cpf'] . '';
      $this->nm_new_label['num_rg'] = '' . $this->Ini->Nm_lang['lang_label_rg'] . '';
      $this->nm_new_label['data_nascimento'] = '' . $this->Ini->Nm_lang['lang_label_datebirth'] . '';
      $this->nm_new_label['nom_email1'] = '' . $this->Ini->Nm_lang['lang_label_email1'] . '';
      $this->nm_new_label['nom_email2'] = '' . $this->Ini->Nm_lang['lang_label_email2'] . '';
      $this->nm_new_label['num_telefonecomercial'] = '' . $this->Ini->Nm_lang['lang_label_commercialphone'] . '';
      $this->nm_new_label['nom_telefoneresidencial'] = '' . $this->Ini->Nm_lang['lang_label_homephone'] . '';
      $this->nm_new_label['num_telefonecelular'] = '' . $this->Ini->Nm_lang['lang_label_cellphone'] . '';
      $this->nm_new_label['end_logradouro'] = '' . $this->Ini->Nm_lang['lang_label_street'] . '';
      $this->nm_new_label['end_complemento'] = '' . $this->Ini->Nm_lang['lang_label_complement'] . '';
      $this->nm_new_label['end_bairro'] = '' . $this->Ini->Nm_lang['lang_label_neighborhood'] . '';
      $this->nm_new_label['end_cidade'] = '' . $this->Ini->Nm_lang['lang_label_city'] . '';
      $this->nm_new_label['end_uf'] = '' . $this->Ini->Nm_lang['lang_label_state'] . '';
      $this->nm_new_label['end_cep'] = '' . $this->Ini->Nm_lang['lang_label_cep'] . '';
      $this->nm_new_label['cargo'] = '' . $this->Ini->Nm_lang['lang_label_office'] . '';
      $this->nm_new_label['departamento'] = '' . $this->Ini->Nm_lang['lang_label_departament'] . '';
      $this->nm_new_label['diasinatividade'] = '' . $this->Ini->Nm_lang['lang_label_validadecadastro'] . '';
      $this->nm_new_label['empreendimento'] = '' . $this->Ini->Nm_lang['lang_label_enterprise'] . '';
      $this->nm_new_label['gbttecempreendimentos'] = '' . $this->Ini->Nm_lang['lang_label_responsibleenterprise'] . '';
      $this->nm_new_label['operadora'] = '' . $this->Ini->Nm_lang['lang_label_operator'] . '';
      $this->nm_new_label['pass'] = '' . $this->Ini->Nm_lang['lang_label_password'] . '';
      $this->nm_new_label['pass_confirm'] = '' . $this->Ini->Nm_lang['lang_label_confirmpass'] . '';
      $this->nm_new_label['prestadora'] = '' . $this->Ini->Nm_lang['lang_label_serviceprovider'] . '';

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


      $this->arr_buttons['voltargrid']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltargrid']['type']             = "button";
      $this->arr_buttons['voltargrid']['value']            = "" . $this->Ini->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons['voltargrid']['display']          = "only_text";
      $this->arr_buttons['voltargrid']['display_position'] = "text_right";
      $this->arr_buttons['voltargrid']['style']            = "default";
      $this->arr_buttons['voltargrid']['image']            = "";

      $this->arr_buttons['salvar']['hint']             = "" . $this->Ini->Nm_lang['lang_btn_save'] . "";
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


      $_SESSION['hticnsdata']['error_icon']['form_CadastroDeUsuarios_mob']  = "<img src=\"" . $this->Ini->path_icones . "/hticnsdata__NM__btn__NM__hticnsdata9_Rhino__NM__nm_hticnsdata9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['hticnsdata']['error_close']['form_CadastroDeUsuarios_mob'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      if (isset($this->NM_ajax_info['param']['img_foto_ul_name']) && '' != $this->NM_ajax_info['param']['img_foto_ul_name'])
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_field_ul_name'][$this->img_foto_ul_name]))
          {
              $this->NM_ajax_info['param']['img_foto_ul_name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_field_ul_name'][$this->img_foto_ul_name];
          }
          $this->img_foto = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->NM_ajax_info['param']['img_foto_ul_name'];
          $this->img_foto_scfile_name = substr($this->NM_ajax_info['param']['img_foto_ul_name'], 12);
          $this->img_foto_scfile_type = $this->NM_ajax_info['param']['img_foto_ul_type'];
          $this->img_foto_ul_name = $this->NM_ajax_info['param']['img_foto_ul_name'];
          $this->img_foto_ul_type = $this->NM_ajax_info['param']['img_foto_ul_type'];
      }
      elseif (isset($this->img_foto_ul_name) && '' != $this->img_foto_ul_name)
      {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_field_ul_name'][$this->img_foto_ul_name]))
          {
              $this->img_foto_ul_name = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_field_ul_name'][$this->img_foto_ul_name];
          }
          $this->img_foto = $this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->img_foto_ul_name;
          $this->img_foto_scfile_name = substr($this->img_foto_ul_name, 12);
          $this->img_foto_scfile_type = $this->img_foto_ul_type;
      }

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['first_time'])
      {
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['new']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['update']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['delete']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['first']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['back']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['forward']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['last']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['qsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['dynsearch']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['summary']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['navpage']);
          unset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['insert']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['update']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['update'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['delete']) || '' == $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['delete'] = 'off';
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['first']     = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['back']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['forward']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['last']      = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['qsearch']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['dynsearch'] = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['summary']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['navpage']   = 'off';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['first']     = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['back']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['forward']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['last']      = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['qsearch']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['dynsearch'] = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['summary']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['navpage']   = 'on';
              $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['goto']      = 'on';
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
      $this->nmgp_botoes['voltarGrid'] = "on";
      $this->nmgp_botoes['salvar'] = "on";
      $this->nmgp_botoes['confimeRemover'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_orig'] = " where ID_Usuario = '" . $_SESSION['grid_ID_Usuario'] . "'";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_pesq'] = " where ID_Usuario = '" . $_SESSION['grid_ID_Usuario'] . "'";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['btn_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['btn_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['new']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['new'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['delete'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['first']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['first'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['back']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['back'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['forward']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['forward'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['last']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['last'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['qsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['qsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['dynsearch']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['dynsearch'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['summary']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['summary'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['navpage']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['navpage'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['goto']) && $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['hticnsdata']['sc_apl_conf_lig']['form_CadastroDeUsuarios_mob']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadastroDeUsuarios_mob'])) {
              $tmpDashboardButtons = $_SESSION['hticnsdata']['dashboard_toolbar'][$tmpDashboardApp]['form_CadastroDeUsuarios_mob'];

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

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['insert']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['insert'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['update']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['update'];
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['delete']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['delete'];
      }

      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['field_display']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['field_display']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['field_readonly']) && !empty($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['field_readonly']))
      {
          foreach ($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['exit'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form'];
          if (!isset($this->password)){$this->password = $this->nmgp_dados_form['password'];} 
          if (!isset($this->data_ultimologin)){$this->data_ultimologin = $this->nmgp_dados_form['data_ultimologin'];} 
          if (!isset($this->numtentativaslogin)){$this->numtentativaslogin = $this->nmgp_dados_form['numtentativaslogin'];} 
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['hticnsdata']['sc_aba_iframe']))
      {
          foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_CadastroDeUsuarios_mob", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['iframe_menu'] && (!isset($_SESSION['hticnsdata']['menu_mobile']) || empty($_SESSION['hticnsdata']['menu_mobile'])))
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
              include_once($this->Ini->path_embutida . 'form_CadastroDeUsuarios/form_CadastroDeUsuarios_mob_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_CadastroDeUsuarios_mob_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_CadastroDeUsuarios_mob_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_CadastroDeUsuarios_mob_help.txt');
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
          require_once($this->Ini->path_embutida . 'form_CadastroDeUsuarios/form_CadastroDeUsuarios_mob_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_CadastroDeUsuarios_mob_erro.class.php"); 
      }
      $this->Erro      = new form_CadastroDeUsuarios_mob_erro();
      $this->Erro->Ini = $this->Ini;
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao']))
         { 
             if ($this->id_usuario != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao'] = "novo";
          unset($_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios_mob']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['voltarGrid'] = "on";
          $this->nmgp_botoes['salvar'] = "on";
          $this->nmgp_botoes['confimeRemover'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['voltarGrid'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['botoes']['voltarGrid'];
          $this->nmgp_botoes['salvar'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['botoes']['salvar'];
          $this->nmgp_botoes['confimeRemover'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['botoes']['confimeRemover'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id_usuario)) { $this->nm_limpa_alfa($this->id_usuario); }
      if (isset($this->nom_username)) { $this->nm_limpa_alfa($this->nom_username); }
      if (isset($this->nom_nome)) { $this->nm_limpa_alfa($this->nom_nome); }
      if (isset($this->id_perfil)) { $this->nm_limpa_alfa($this->id_perfil); }
      if (isset($this->id_ope)) { $this->nm_limpa_alfa($this->id_ope); }
      if (isset($this->contexto_id_ope)) { $this->nm_limpa_alfa($this->contexto_id_ope); }
      if (isset($this->end_numero)) { $this->nm_limpa_alfa($this->end_numero); }
      if (isset($this->num_totvs)) { $this->nm_limpa_alfa($this->num_totvs); }
      if (isset($this->num_cpf)) { $this->nm_limpa_alfa($this->num_cpf); }
      if (isset($this->num_rg)) { $this->nm_limpa_alfa($this->num_rg); }
      if (isset($this->nom_email1)) { $this->nm_limpa_alfa($this->nom_email1); }
      if (isset($this->nom_email2)) { $this->nm_limpa_alfa($this->nom_email2); }
      if (isset($this->num_telefonecomercial)) { $this->nm_limpa_alfa($this->num_telefonecomercial); }
      if (isset($this->nom_telefoneresidencial)) { $this->nm_limpa_alfa($this->nom_telefoneresidencial); }
      if (isset($this->num_telefonecelular)) { $this->nm_limpa_alfa($this->num_telefonecelular); }
      if (isset($this->end_logradouro)) { $this->nm_limpa_alfa($this->end_logradouro); }
      if (isset($this->end_complemento)) { $this->nm_limpa_alfa($this->end_complemento); }
      if (isset($this->end_bairro)) { $this->nm_limpa_alfa($this->end_bairro); }
      if (isset($this->end_cidade)) { $this->nm_limpa_alfa($this->end_cidade); }
      if (isset($this->end_uf)) { $this->nm_limpa_alfa($this->end_uf); }
      if (isset($this->end_cep)) { $this->nm_limpa_alfa($this->end_cep); }
      if (isset($this->criadopor)) { $this->nm_limpa_alfa($this->criadopor); }
      if (isset($this->cargo)) { $this->nm_limpa_alfa($this->cargo); }
      if (isset($this->departamento)) { $this->nm_limpa_alfa($this->departamento); }
      if (isset($this->diasinatividade)) { $this->nm_limpa_alfa($this->diasinatividade); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "voltarGrid")
          { 
              $this->sc_btn_voltarGrid();
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- id_usuario
      $this->field_config['id_usuario']               = array();
      $this->field_config['id_usuario']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_usuario']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_usuario']['symbol_dec'] = '';
      $this->field_config['id_usuario']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_usuario']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- id_ope
      $this->field_config['id_ope']               = array();
      $this->field_config['id_ope']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['id_ope']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['id_ope']['symbol_dec'] = '';
      $this->field_config['id_ope']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['id_ope']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- data_nascimento
      $this->field_config['data_nascimento']                 = array();
      $this->field_config['data_nascimento']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'];
      $this->field_config['data_nascimento']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_nascimento']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'data_nascimento');
      //-- contexto_id_ope
      $this->field_config['contexto_id_ope']               = array();
      $this->field_config['contexto_id_ope']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['contexto_id_ope']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['contexto_id_ope']['symbol_dec'] = '';
      $this->field_config['contexto_id_ope']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['contexto_id_ope']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- criadopor
      $this->field_config['criadopor']               = array();
      $this->field_config['criadopor']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['criadopor']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['criadopor']['symbol_dec'] = '';
      $this->field_config['criadopor']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['criadopor']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
      //-- criado_em
      $this->field_config['criado_em']                 = array();
      $this->field_config['criado_em']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['criado_em']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['criado_em']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['criado_em']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'criado_em');
      //-- alterado_em
      $this->field_config['alterado_em']                 = array();
      $this->field_config['alterado_em']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['alterado_em']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['alterado_em']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['alterado_em']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'alterado_em');
      //-- removido_em
      $this->field_config['removido_em']                 = array();
      $this->field_config['removido_em']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['removido_em']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['removido_em']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['removido_em']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'removido_em');
      //-- data_ultimologin
      $this->field_config['data_ultimologin']                 = array();
      $this->field_config['data_ultimologin']['date_format']  = $_SESSION['hticnsdata']['reg_conf']['date_format'] . ';' . $_SESSION['hticnsdata']['reg_conf']['time_format'];
      $this->field_config['data_ultimologin']['date_sep']     = $_SESSION['hticnsdata']['reg_conf']['date_sep'];
      $this->field_config['data_ultimologin']['time_sep']     = $_SESSION['hticnsdata']['reg_conf']['time_sep'];
      $this->field_config['data_ultimologin']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'data_ultimologin');
      //-- numtentativaslogin
      $this->field_config['numtentativaslogin']               = array();
      $this->field_config['numtentativaslogin']['symbol_grp'] = $_SESSION['hticnsdata']['reg_conf']['grup_num'];
      $this->field_config['numtentativaslogin']['symbol_fmt'] = $_SESSION['hticnsdata']['reg_conf']['num_group_digit'];
      $this->field_config['numtentativaslogin']['symbol_dec'] = '';
      $this->field_config['numtentativaslogin']['symbol_neg'] = $_SESSION['hticnsdata']['reg_conf']['simb_neg'];
      $this->field_config['numtentativaslogin']['format_neg'] = $_SESSION['hticnsdata']['reg_conf']['neg_num'];
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
          if ('validate_id_usuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_usuario');
          }
          if ('validate_nom_username' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_username');
          }
          if ('validate_pass' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pass');
          }
          if ('validate_pass_confirm' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'pass_confirm');
          }
          if ('validate_diasinatividade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'diasinatividade');
          }
          if ('validate_num_ativo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_ativo');
          }
          if ('validate_num_totvs' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_totvs');
          }
          if ('validate_num_tipousuario' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_tipousuario');
          }
          if ('validate_operadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'operadora');
          }
          if ('validate_prestadora' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'prestadora');
          }
          if ('validate_empreendimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'empreendimento');
          }
          if ('validate_id_perfil' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_perfil');
          }
          if ('validate_id_ope' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id_ope');
          }
          if ('validate_img_foto' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'img_foto');
          }
          if ('validate_nom_nome' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_nome');
          }
          if ('validate_num_cpf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_cpf');
          }
          if ('validate_num_rg' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_rg');
          }
          if ('validate_cargo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'cargo');
          }
          if ('validate_departamento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'departamento');
          }
          if ('validate_data_nascimento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'data_nascimento');
          }
          if ('validate_nom_email1' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_email1');
          }
          if ('validate_nom_email2' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_email2');
          }
          if ('validate_num_telefonecomercial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefonecomercial');
          }
          if ('validate_nom_telefoneresidencial' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'nom_telefoneresidencial');
          }
          if ('validate_num_telefonecelular' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'num_telefonecelular');
          }
          if ('validate_end_cep' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_cep');
          }
          if ('validate_end_logradouro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_logradouro');
          }
          if ('validate_end_complemento' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_complemento');
          }
          if ('validate_end_numero' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_numero');
          }
          if ('validate_end_bairro' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_bairro');
          }
          if ('validate_end_cidade' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_cidade');
          }
          if ('validate_end_uf' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'end_uf');
          }
          if ('validate_agendadatajson' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'agendadatajson');
          }
          if ('validate_savedataonclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'savedataonclick');
          }
          if ('validate_removeronclick' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'removeronclick');
          }
          if ('validate_gbttecempreendimentos' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'gbttecempreendimentos');
          }
          if ('validate_contexto_tipo' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contexto_tipo');
          }
          if ('validate_contexto_id_ope' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'contexto_id_ope');
          }
          if ('validate_criadopor' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'criadopor');
          }
          if ('validate_criado_em' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'criado_em');
          }
          if ('validate_alterado_em' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'alterado_em');
          }
          if ('validate_removido_em' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'removido_em');
          }
          form_CadastroDeUsuarios_mob_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_num_tipousuario_onchange' == $this->NM_ajax_opcao)
          {
              $this->Num_TipoUsuario_onChange();
          }
          if ('event_removeronclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->removerOnClick_onClick();
          }
          if ('event_savedataonclick_onclick' == $this->NM_ajax_opcao)
          {
              $this->saveDataOnClick_onClick();
          }
          form_CadastroDeUsuarios_mob_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['inline_form_seq'] = $this->sc_seq_row;
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
              form_CadastroDeUsuarios_mob_pack_ajax_response();
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
          $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_CadastroDeUsuarios_mob_pack_ajax_response();
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['recarga'] = $this->nmgp_opcao;
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_CadastroDeUsuarios_mob_pack_ajax_response();
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
          form_CadastroDeUsuarios_mob_pack_ajax_response();
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
   function sc_btn_voltarGrid() 
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      $nm_f_saida = "form_CadastroDeUsuarios_mob.php";
      nm_limpa_numero($this->id_usuario, $this->field_config['id_usuario']['symbol_grp']) ; 
      nm_limpa_numero($this->id_ope, $this->field_config['id_ope']['symbol_grp']) ; 
      nm_limpa_ciccnpj($this->num_cpf) ; 
      $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      nm_limpa_data($this->data_nascimento, $this->field_config['data_nascimento']['date_sep']) ; 
      $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->nom_telefoneresidencial, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefonecelular, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_cep($this->end_cep) ; 
      nm_limpa_numero($this->contexto_id_ope, $this->field_config['contexto_id_ope']['symbol_grp']) ; 
      nm_limpa_numero($this->criadopor, $this->field_config['criadopor']['symbol_grp']) ; 
      nm_limpa_data($this->criado_em, $this->field_config['criado_em']['date_sep']) ; 
      nm_limpa_hora($this->criado_em_hora, $this->field_config['criado_em']['time_sep']) ; 
      nm_limpa_data($this->alterado_em, $this->field_config['alterado_em']['date_sep']) ; 
      nm_limpa_hora($this->alterado_em_hora, $this->field_config['alterado_em']['time_sep']) ; 
      nm_limpa_data($this->removido_em, $this->field_config['removido_em']['date_sep']) ; 
      nm_limpa_hora($this->removido_em_hora, $this->field_config['removido_em']['time_sep']) ; 
      $this->nm_converte_datas();
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
          $this->voltar("update", "sc_", "grid_ConsultadeUsuarios");
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="hti_cnsdata_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id_usuario" value="<?php echo $this->form_encode_input($this->id_usuario) ?>"/>
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
           case 'id_usuario':
               return "ID Usuario";
               break;
           case 'nom_username':
               return "" . $this->Ini->Nm_lang['lang_label_username'] . "";
               break;
           case 'pass':
               return "" . $this->Ini->Nm_lang['lang_label_password'] . "";
               break;
           case 'pass_confirm':
               return "" . $this->Ini->Nm_lang['lang_label_confirmpass'] . "";
               break;
           case 'diasinatividade':
               return "" . $this->Ini->Nm_lang['lang_label_validadecadastro'] . "";
               break;
           case 'num_ativo':
               return "" . $this->Ini->Nm_lang['lang_label_status'] . "";
               break;
           case 'num_totvs':
               return "" . $this->Ini->Nm_lang['lang_label_numtotvs'] . "";
               break;
           case 'num_tipousuario':
               return "" . $this->Ini->Nm_lang['lang_label_typeuser'] . "";
               break;
           case 'operadora':
               return "" . $this->Ini->Nm_lang['lang_label_operator'] . "";
               break;
           case 'prestadora':
               return "" . $this->Ini->Nm_lang['lang_label_serviceprovider'] . "";
               break;
           case 'empreendimento':
               return "" . $this->Ini->Nm_lang['lang_label_enterprise'] . "";
               break;
           case 'id_perfil':
               return "" . $this->Ini->Nm_lang['lang_label_permissionprofile'] . "";
               break;
           case 'id_ope':
               return "ID OPE";
               break;
           case 'img_foto':
               return "" . $this->Ini->Nm_lang['lang_label_profile_img'] . "";
               break;
           case 'nom_nome':
               return "" . $this->Ini->Nm_lang['lang_label_fullname'] . "";
               break;
           case 'num_cpf':
               return "" . $this->Ini->Nm_lang['lang_label_cpf'] . "";
               break;
           case 'num_rg':
               return "" . $this->Ini->Nm_lang['lang_label_rg'] . "";
               break;
           case 'cargo':
               return "" . $this->Ini->Nm_lang['lang_label_office'] . "";
               break;
           case 'departamento':
               return "" . $this->Ini->Nm_lang['lang_label_departament'] . "";
               break;
           case 'data_nascimento':
               return "" . $this->Ini->Nm_lang['lang_label_datebirth'] . "";
               break;
           case 'nom_email1':
               return "" . $this->Ini->Nm_lang['lang_label_email1'] . "";
               break;
           case 'nom_email2':
               return "" . $this->Ini->Nm_lang['lang_label_email2'] . "";
               break;
           case 'num_telefonecomercial':
               return "" . $this->Ini->Nm_lang['lang_label_commercialphone'] . "";
               break;
           case 'nom_telefoneresidencial':
               return "" . $this->Ini->Nm_lang['lang_label_homephone'] . "";
               break;
           case 'num_telefonecelular':
               return "" . $this->Ini->Nm_lang['lang_label_cellphone'] . "";
               break;
           case 'end_cep':
               return "" . $this->Ini->Nm_lang['lang_label_cep'] . "";
               break;
           case 'end_logradouro':
               return "" . $this->Ini->Nm_lang['lang_label_street'] . "";
               break;
           case 'end_complemento':
               return "" . $this->Ini->Nm_lang['lang_label_complement'] . "";
               break;
           case 'end_numero':
               return "" . $this->Ini->Nm_lang['lang_label_number'] . "";
               break;
           case 'end_bairro':
               return "" . $this->Ini->Nm_lang['lang_label_neighborhood'] . "";
               break;
           case 'end_cidade':
               return "" . $this->Ini->Nm_lang['lang_label_city'] . "";
               break;
           case 'end_uf':
               return "" . $this->Ini->Nm_lang['lang_label_state'] . "";
               break;
           case 'agendadatajson':
               return "Agenda";
               break;
           case 'savedataonclick':
               return "saveDataOnClick";
               break;
           case 'removeronclick':
               return "removerOnClick";
               break;
           case 'gbttecempreendimentos':
               return "" . $this->Ini->Nm_lang['lang_label_responsibleenterprise'] . "";
               break;
           case 'contexto_tipo':
               return "Contexto Tipo";
               break;
           case 'contexto_id_ope':
               return "Contexto ID OPE";
               break;
           case 'criadopor':
               return "Criado Por";
               break;
           case 'criado_em':
               return "Criado Em";
               break;
           case 'alterado_em':
               return "Alterado Em";
               break;
           case 'removido_em':
               return "Removido Em";
               break;
           case 'password':
               return "Password";
               break;
           case 'data_ultimologin':
               return "Data Ultimo Login";
               break;
           case 'numtentativaslogin':
               return "Num Tentativas Login";
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
              if (!isset($this->NM_ajax_info['errList']['geral_form_CadastroDeUsuarios_mob']) || !is_array($this->NM_ajax_info['errList']['geral_form_CadastroDeUsuarios_mob']))
              {
                  $this->NM_ajax_info['errList']['geral_form_CadastroDeUsuarios_mob'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_CadastroDeUsuarios_mob'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'id_usuario' == $filtro)
        $this->ValidateField_id_usuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_username' == $filtro)
        $this->ValidateField_nom_username($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pass' == $filtro)
        $this->ValidateField_pass($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'pass_confirm' == $filtro)
        $this->ValidateField_pass_confirm($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'diasinatividade' == $filtro)
        $this->ValidateField_diasinatividade($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_ativo' == $filtro)
        $this->ValidateField_num_ativo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_totvs' == $filtro)
        $this->ValidateField_num_totvs($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_tipousuario' == $filtro)
        $this->ValidateField_num_tipousuario($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'operadora' == $filtro)
        $this->ValidateField_operadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'prestadora' == $filtro)
        $this->ValidateField_prestadora($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'empreendimento' == $filtro)
        $this->ValidateField_empreendimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_perfil' == $filtro)
        $this->ValidateField_id_perfil($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id_ope' == $filtro)
        $this->ValidateField_id_ope($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'img_foto' == $filtro)
        $this->ValidateField_img_foto($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_nome' == $filtro)
        $this->ValidateField_nom_nome($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_cpf' == $filtro)
        $this->ValidateField_num_cpf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_rg' == $filtro)
        $this->ValidateField_num_rg($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'cargo' == $filtro)
        $this->ValidateField_cargo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'departamento' == $filtro)
        $this->ValidateField_departamento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'data_nascimento' == $filtro)
        $this->ValidateField_data_nascimento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_email1' == $filtro)
        $this->ValidateField_nom_email1($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_email2' == $filtro)
        $this->ValidateField_nom_email2($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefonecomercial' == $filtro)
        $this->ValidateField_num_telefonecomercial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'nom_telefoneresidencial' == $filtro)
        $this->ValidateField_nom_telefoneresidencial($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'num_telefonecelular' == $filtro)
        $this->ValidateField_num_telefonecelular($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_cep' == $filtro)
        $this->ValidateField_end_cep($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_logradouro' == $filtro)
        $this->ValidateField_end_logradouro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_complemento' == $filtro)
        $this->ValidateField_end_complemento($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_numero' == $filtro)
        $this->ValidateField_end_numero($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_bairro' == $filtro)
        $this->ValidateField_end_bairro($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_cidade' == $filtro)
        $this->ValidateField_end_cidade($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'end_uf' == $filtro)
        $this->ValidateField_end_uf($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'agendadatajson' == $filtro)
        $this->ValidateField_agendadatajson($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'savedataonclick' == $filtro)
        $this->ValidateField_savedataonclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'removeronclick' == $filtro)
        $this->ValidateField_removeronclick($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'gbttecempreendimentos' == $filtro)
        $this->ValidateField_gbttecempreendimentos($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contexto_tipo' == $filtro)
        $this->ValidateField_contexto_tipo($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'contexto_id_ope' == $filtro)
        $this->ValidateField_contexto_id_ope($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'criadopor' == $filtro)
        $this->ValidateField_criadopor($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'criado_em' == $filtro)
        $this->ValidateField_criado_em($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'alterado_em' == $filtro)
        $this->ValidateField_alterado_em($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'removido_em' == $filtro)
        $this->ValidateField_removido_em($Campos_Crit, $Campos_Falta, $Campos_Erros);
      $this->upload_img_doc($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
//-- converter datas   
          $this->nm_converte_datas();
//---

      if (!isset($this->NM_ajax_flag) || 'validate_' != substr($this->NM_ajax_opcao, 0, 9))
      {
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           $this->end_numero  = is_numeric($this->end_numero ) || strtolower($this->end_numero ) == "s/n" ? $this->end_numero  : "S/N";

sc_include_library('sys','functions','functions.php');
$s = new manageSession();
$profile = $s->get('profile');
if ($this->num_tipousuario  && isset($profile['USUARIO']['CONSULTAR']['a'][$this->num_tipousuario ]['ID_OPE'])) {
	$field = $profile['USUARIO']['CONSULTAR']['a'][$this->num_tipousuario ]['ID_OPE'];
	$ID_OPE = $field && isset($this->$field) ? $this->$field : "";
}
	

$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
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

    function ValidateField_id_usuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_usuario == "")  
      { 
          $this->id_usuario = 0;
      } 
      nm_limpa_numero($this->id_usuario, $this->field_config['id_usuario']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id_usuario != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_usuario) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID Usuario: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_usuario']))
                  {
                      $Campos_Erros['id_usuario'] = array();
                  }
                  $Campos_Erros['id_usuario'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_usuario']) || !is_array($this->NM_ajax_info['errList']['id_usuario']))
                  {
                      $this->NM_ajax_info['errList']['id_usuario'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_usuario'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_usuario, 11, 0, 0, 0, "N") == false)  
              { 
                  $Campos_Crit .= "ID Usuario; " ; 
                  if (!isset($Campos_Erros['id_usuario']))
                  {
                      $Campos_Erros['id_usuario'] = array();
                  }
                  $Campos_Erros['id_usuario'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_usuario']) || !is_array($this->NM_ajax_info['errList']['id_usuario']))
                  {
                      $this->NM_ajax_info['errList']['id_usuario'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_usuario'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_usuario

    function ValidateField_nom_username(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->nom_username = sc_strtolower($this->nom_username); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_username) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_username'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_username']))
              {
                  $Campos_Erros['nom_username'] = array();
              }
              $Campos_Erros['nom_username'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_username']) || !is_array($this->NM_ajax_info['errList']['nom_username']))
              {
                  $this->NM_ajax_info['errList']['nom_username'] = array();
              }
              $this->NM_ajax_info['errList']['nom_username'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "abcdefghijklmnopqrstuvwxyz0123456789.";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->nom_username ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->nom_username, $_SESSION['hticnsdata']['charset']); $x++) 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_username'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['nom_username']))
              {
                  $Campos_Erros['nom_username'] = array();
              }
              $Campos_Erros['nom_username'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['nom_username']) || !is_array($this->NM_ajax_info['errList']['nom_username']))
              {
                  $this->NM_ajax_info['errList']['nom_username'] = array();
              }
              $this->NM_ajax_info['errList']['nom_username'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_nom_username

    function ValidateField_pass(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pass) > 20) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_password'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pass']))
              {
                  $Campos_Erros['pass'] = array();
              }
              $Campos_Erros['pass'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pass']) || !is_array($this->NM_ajax_info['errList']['pass']))
              {
                  $this->NM_ajax_info['errList']['pass'] = array();
              }
              $this->NM_ajax_info['errList']['pass'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pass

    function ValidateField_pass_confirm(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->pass_confirm) > 20) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_confirmpass'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['pass_confirm']))
              {
                  $Campos_Erros['pass_confirm'] = array();
              }
              $Campos_Erros['pass_confirm'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['pass_confirm']) || !is_array($this->NM_ajax_info['errList']['pass_confirm']))
              {
                  $this->NM_ajax_info['errList']['pass_confirm'] = array();
              }
              $this->NM_ajax_info['errList']['pass_confirm'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_pass_confirm

    function ValidateField_diasinatividade(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->diasinatividade == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->diasinatividade == "")  
      { 
          $this->diasinatividade = 0;
          $this->sc_force_zero[] = 'diasinatividade';
      } 
    } // ValidateField_diasinatividade

    function ValidateField_num_ativo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->num_ativo == "" && $this->nmgp_opcao != "excluir")
      { 
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

    function ValidateField_num_tipousuario(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->num_tipousuario) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']) && !in_array($this->num_tipousuario, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['num_tipousuario']))
                   {
                       $Campos_Erros['num_tipousuario'] = array();
                   }
                   $Campos_Erros['num_tipousuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['num_tipousuario']) || !is_array($this->NM_ajax_info['errList']['num_tipousuario']))
                   {
                       $this->NM_ajax_info['errList']['num_tipousuario'] = array();
                   }
                   $this->NM_ajax_info['errList']['num_tipousuario'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_num_tipousuario

    function ValidateField_operadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->operadora) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']) && !in_array($this->operadora, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['operadora']))
                   {
                       $Campos_Erros['operadora'] = array();
                   }
                   $Campos_Erros['operadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['operadora']) || !is_array($this->NM_ajax_info['errList']['operadora']))
                   {
                       $this->NM_ajax_info['errList']['operadora'] = array();
                   }
                   $this->NM_ajax_info['errList']['operadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_operadora

    function ValidateField_prestadora(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->prestadora) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']) && !in_array($this->prestadora, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['prestadora']))
                   {
                       $Campos_Erros['prestadora'] = array();
                   }
                   $Campos_Erros['prestadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['prestadora']) || !is_array($this->NM_ajax_info['errList']['prestadora']))
                   {
                       $this->NM_ajax_info['errList']['prestadora'] = array();
                   }
                   $this->NM_ajax_info['errList']['prestadora'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_prestadora

    function ValidateField_empreendimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->empreendimento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']) && !in_array($this->empreendimento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['empreendimento']))
                   {
                       $Campos_Erros['empreendimento'] = array();
                   }
                   $Campos_Erros['empreendimento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['empreendimento']) || !is_array($this->NM_ajax_info['errList']['empreendimento']))
                   {
                       $this->NM_ajax_info['errList']['empreendimento'] = array();
                   }
                   $this->NM_ajax_info['errList']['empreendimento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_empreendimento

    function ValidateField_id_perfil(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->id_perfil) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']) && !in_array($this->id_perfil, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['id_perfil']))
                   {
                       $Campos_Erros['id_perfil'] = array();
                   }
                   $Campos_Erros['id_perfil'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['id_perfil']) || !is_array($this->NM_ajax_info['errList']['id_perfil']))
                   {
                       $this->NM_ajax_info['errList']['id_perfil'] = array();
                   }
                   $this->NM_ajax_info['errList']['id_perfil'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_id_perfil

    function ValidateField_id_ope(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->id_ope == "")  
      { 
          $this->id_ope = 0;
          $this->sc_force_zero[] = 'id_ope';
      } 
      nm_limpa_numero($this->id_ope, $this->field_config['id_ope']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->id_ope != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->id_ope) > $iTestSize)  
              { 
                  $Campos_Crit .= "ID OPE: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id_ope']))
                  {
                      $Campos_Erros['id_ope'] = array();
                  }
                  $Campos_Erros['id_ope'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id_ope']) || !is_array($this->NM_ajax_info['errList']['id_ope']))
                  {
                      $this->NM_ajax_info['errList']['id_ope'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_ope'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id_ope, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "ID OPE; " ; 
                  if (!isset($Campos_Erros['id_ope']))
                  {
                      $Campos_Erros['id_ope'] = array();
                  }
                  $Campos_Erros['id_ope'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id_ope']) || !is_array($this->NM_ajax_info['errList']['id_ope']))
                  {
                      $this->NM_ajax_info['errList']['id_ope'] = array();
                  }
                  $this->NM_ajax_info['errList']['id_ope'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_id_ope

    function ValidateField_img_foto(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        if ($this->nmgp_opcao != "excluir")
        {
            $sTestFile = $this->img_foto;
            if ("" != $this->img_foto && "S" != $this->img_foto_limpa && !$teste_validade->ArqExtensao($this->img_foto, array()))
            {
                $Campos_Crit .= "{lang_label_profile_img}: " . $this->Ini->Nm_lang['lang_errm_file_invl']; 
                if (!isset($Campos_Erros['img_foto']))
                {
                    $Campos_Erros['img_foto'] = array();
                }
                $Campos_Erros['img_foto'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
                if (!isset($this->NM_ajax_info['errList']['img_foto']) || !is_array($this->NM_ajax_info['errList']['img_foto']))
                {
                    $this->NM_ajax_info['errList']['img_foto'] = array();
                }
                $this->NM_ajax_info['errList']['img_foto'][] = $this->Ini->Nm_lang['lang_errm_file_invl'];
            }
            if ("" != $this->img_foto && "S" != $this->img_foto_limpa && method_exists($teste_validade, 'ArqTamanho') && !$teste_validade->ArqTamanho($sTestFile, 2097152))
            {
                $Campos_Crit .= "{lang_label_profile_img}: " . $this->Ini->Nm_lang['lang_errm_file_size']; 
                if (!isset($Campos_Erros['img_foto']))
                {
                    $Campos_Erros['img_foto'] = array();
                }
                $Campos_Erros['img_foto'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
                if (!isset($this->NM_ajax_info['errList']['img_foto']) || !is_array($this->NM_ajax_info['errList']['img_foto']))
                {
                    $this->NM_ajax_info['errList']['img_foto'] = array();
                }
                $this->NM_ajax_info['errList']['img_foto'][] = $this->Ini->Nm_lang['lang_errm_file_size'];
            }
        }
    } // ValidateField_img_foto

    function ValidateField_nom_nome(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_nome) > 120) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_fullname'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_nome']))
              {
                  $Campos_Erros['nom_nome'] = array();
              }
              $Campos_Erros['nom_nome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_nome']) || !is_array($this->NM_ajax_info['errList']['nom_nome']))
              {
                  $this->NM_ajax_info['errList']['nom_nome'] = array();
              }
              $this->NM_ajax_info['errList']['nom_nome'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 120 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_nome

    function ValidateField_num_cpf(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_ciccnpj($this->num_cpf) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->num_cpf) != "")  
          { 
              if ($teste_validade->CIC($this->num_cpf) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_cpf'] . "; " ; 
                  if (!isset($Campos_Erros['num_cpf']))
                  {
                      $Campos_Erros['num_cpf'] = array();
                  }
                  $Campos_Erros['num_cpf'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['num_cpf']) || !is_array($this->NM_ajax_info['errList']['num_cpf']))
                  {
                      $this->NM_ajax_info['errList']['num_cpf'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_cpf'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_num_cpf

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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_rg'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
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

    function ValidateField_cargo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      $this->cargo = sc_strtoupper($this->cargo); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->cargo) > 100) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_office'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['cargo']))
              {
                  $Campos_Erros['cargo'] = array();
              }
              $Campos_Erros['cargo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['cargo']) || !is_array($this->NM_ajax_info['errList']['cargo']))
              {
                  $this->NM_ajax_info['errList']['cargo'] = array();
              }
              $this->NM_ajax_info['errList']['cargo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 100 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ÁÉÍÓÚÀÈÌÒÙÃÕÂÊÎÔÛÄËÏÖÜÑÝÿÇ .";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->cargo ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->cargo, $_SESSION['hticnsdata']['charset']); $x++) 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_office'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['cargo']))
              {
                  $Campos_Erros['cargo'] = array();
              }
              $Campos_Erros['cargo'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['cargo']) || !is_array($this->NM_ajax_info['errList']['cargo']))
              {
                  $this->NM_ajax_info['errList']['cargo'] = array();
              }
              $this->NM_ajax_info['errList']['cargo'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_cargo

    function ValidateField_departamento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
               if (!empty($this->departamento) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']) && !in_array($this->departamento, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']))
               {
                   $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($Campos_Erros['departamento']))
                   {
                       $Campos_Erros['departamento'] = array();
                   }
                   $Campos_Erros['departamento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                   if (!isset($this->NM_ajax_info['errList']['departamento']) || !is_array($this->NM_ajax_info['errList']['departamento']))
                   {
                       $this->NM_ajax_info['errList']['departamento'] = array();
                   }
                   $this->NM_ajax_info['errList']['departamento'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
               }
    } // ValidateField_departamento

    function ValidateField_data_nascimento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->data_nascimento, $this->field_config['data_nascimento']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['data_nascimento']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['data_nascimento']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['data_nascimento']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['data_nascimento']['date_sep']) ; 
          if (trim($this->data_nascimento) != "")  
          { 
              if ($teste_validade->Data($this->data_nascimento, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_datebirth'] . "; " ; 
                  if (!isset($Campos_Erros['data_nascimento']))
                  {
                      $Campos_Erros['data_nascimento'] = array();
                  }
                  $Campos_Erros['data_nascimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['data_nascimento']) || !is_array($this->NM_ajax_info['errList']['data_nascimento']))
                  {
                      $this->NM_ajax_info['errList']['data_nascimento'] = array();
                  }
                  $this->NM_ajax_info['errList']['data_nascimento'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['data_nascimento']['date_format'] = $guarda_datahora; 
       } 
    } // ValidateField_data_nascimento

    function ValidateField_nom_email1(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->nom_email1) != "")  
          { 
              if ($teste_validade->Email($this->nom_email1) == false)  
              { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_email1'] . "; " ; 
                  if (!isset($Campos_Erros['nom_email1']))
                  {
                      $Campos_Erros['nom_email1'] = array();
                  }
                  $Campos_Erros['nom_email1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['nom_email1']) || !is_array($this->NM_ajax_info['errList']['nom_email1']))
                      {
                          $this->NM_ajax_info['errList']['nom_email1'] = array();
                      }
                      $this->NM_ajax_info['errList']['nom_email1'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_nom_email1

    function ValidateField_nom_email2(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->nom_email2) != "")  
          { 
              if ($teste_validade->Email($this->nom_email2) == false)  
              { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_email2'] . "; " ; 
                  if (!isset($Campos_Erros['nom_email2']))
                  {
                      $Campos_Erros['nom_email2'] = array();
                  }
                  $Campos_Erros['nom_email2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['nom_email2']) || !is_array($this->NM_ajax_info['errList']['nom_email2']))
                      {
                          $this->NM_ajax_info['errList']['nom_email2'] = array();
                      }
                      $this->NM_ajax_info['errList']['nom_email2'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_nom_email2

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
          if (NM_utf8_strlen($this->num_telefonecomercial) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_commercialphone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_telefonecomercial']))
              {
                  $Campos_Erros['num_telefonecomercial'] = array();
              }
              $Campos_Erros['num_telefonecomercial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_telefonecomercial']) || !is_array($this->NM_ajax_info['errList']['num_telefonecomercial']))
              {
                  $this->NM_ajax_info['errList']['num_telefonecomercial'] = array();
              }
              $this->NM_ajax_info['errList']['num_telefonecomercial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_telefonecomercial

    function ValidateField_nom_telefoneresidencial(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->nom_telefoneresidencial, explode(';', "(99) 9999-9999;(99) 99999-9999")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['nom_telefoneresidencial']))
              {
                  $Campos_Erros['nom_telefoneresidencial'] = array();
              }
              $Campos_Erros['nom_telefoneresidencial'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['nom_telefoneresidencial']) || !is_array($this->NM_ajax_info['errList']['nom_telefoneresidencial']))
                  {
                      $this->NM_ajax_info['errList']['nom_telefoneresidencial'] = array();
                  }
                  $this->NM_ajax_info['errList']['nom_telefoneresidencial'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->nom_telefoneresidencial, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->nom_telefoneresidencial) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_homephone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['nom_telefoneresidencial']))
              {
                  $Campos_Erros['nom_telefoneresidencial'] = array();
              }
              $Campos_Erros['nom_telefoneresidencial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['nom_telefoneresidencial']) || !is_array($this->NM_ajax_info['errList']['nom_telefoneresidencial']))
              {
                  $this->NM_ajax_info['errList']['nom_telefoneresidencial'] = array();
              }
              $this->NM_ajax_info['errList']['nom_telefoneresidencial'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_nom_telefoneresidencial

    function ValidateField_num_telefonecelular(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      {
          if (!$this->nm_validate_mask($this->num_telefonecelular, explode(';', "(99) 99999-9999")))  
          { 
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['num_telefonecelular']))
              {
                  $Campos_Erros['num_telefonecelular'] = array();
              }
              $Campos_Erros['num_telefonecelular'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                  if (!isset($this->NM_ajax_info['errList']['num_telefonecelular']) || !is_array($this->NM_ajax_info['errList']['num_telefonecelular']))
                  {
                      $this->NM_ajax_info['errList']['num_telefonecelular'] = array();
                  }
                  $this->NM_ajax_info['errList']['num_telefonecelular'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          } 
      }
      $this->nm_tira_mask($this->num_telefonecelular, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->num_telefonecelular) > 45) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_cellphone'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['num_telefonecelular']))
              {
                  $Campos_Erros['num_telefonecelular'] = array();
              }
              $Campos_Erros['num_telefonecelular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['num_telefonecelular']) || !is_array($this->NM_ajax_info['errList']['num_telefonecelular']))
              {
                  $this->NM_ajax_info['errList']['num_telefonecelular'] = array();
              }
              $this->NM_ajax_info['errList']['num_telefonecelular'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 45 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_num_telefonecelular

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
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_logradouro) > 75) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_street'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_logradouro']))
              {
                  $Campos_Erros['end_logradouro'] = array();
              }
              $Campos_Erros['end_logradouro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_logradouro']) || !is_array($this->NM_ajax_info['errList']['end_logradouro']))
              {
                  $this->NM_ajax_info['errList']['end_logradouro'] = array();
              }
              $this->NM_ajax_info['errList']['end_logradouro'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_logradouro

    function ValidateField_end_complemento(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->end_complemento) > 75) 
          { 
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_complement'] . " " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['end_complemento']))
              {
                  $Campos_Erros['end_complemento'] = array();
              }
              $Campos_Erros['end_complemento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['end_complemento']) || !is_array($this->NM_ajax_info['errList']['end_complemento']))
              {
                  $this->NM_ajax_info['errList']['end_complemento'] = array();
              }
              $this->NM_ajax_info['errList']['end_complemento'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 75 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_end_complemento

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

    function ValidateField_end_cidade(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
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
      $Teste_trab = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['hticnsdata']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->end_uf ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->end_uf, $_SESSION['hticnsdata']['charset']); $x++) 
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
              $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_state'] . " " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['end_uf']))
              {
                  $Campos_Erros['end_uf'] = array();
              }
              $Campos_Erros['end_uf'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['end_uf']) || !is_array($this->NM_ajax_info['errList']['end_uf']))
              {
                  $this->NM_ajax_info['errList']['end_uf'] = array();
              }
              $this->NM_ajax_info['errList']['end_uf'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
    } // ValidateField_end_uf

    function ValidateField_agendadatajson(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->agendadatajson) > 20) 
          { 
              $Campos_Crit .= "Agenda " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['agendadatajson']))
              {
                  $Campos_Erros['agendadatajson'] = array();
              }
              $Campos_Erros['agendadatajson'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['agendadatajson']) || !is_array($this->NM_ajax_info['errList']['agendadatajson']))
              {
                  $this->NM_ajax_info['errList']['agendadatajson'] = array();
              }
              $this->NM_ajax_info['errList']['agendadatajson'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_agendadatajson

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

    function ValidateField_gbttecempreendimentos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->gbttecempreendimentos != "")
      {
          $x = 0; 
          $this->gbttecempreendimentos_1 = explode("@?@", $this->gbttecempreendimentos);
          $this->gbttecempreendimentos = ""; 
          if ($this->gbttecempreendimentos_1 != "") 
          { 
              foreach ($this->gbttecempreendimentos_1 as $dados_gbttecempreendimentos_1 ) 
              { 
                       if ($x != 0)
                       { 
                           $this->gbttecempreendimentos .= "@?@";
                       } 
                       $this->gbttecempreendimentos .= $dados_gbttecempreendimentos_1;
                       if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos']) && !in_array($dados_gbttecempreendimentos_1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos']))
                       {
                           $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($Campos_Erros['gbttecempreendimentos']))
                           {
                               $Campos_Erros['gbttecempreendimentos'] = array();
                           }
                           $Campos_Erros['gbttecempreendimentos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           if (!isset($this->NM_ajax_info['errList']['gbttecempreendimentos']) || !is_array($this->NM_ajax_info['errList']['gbttecempreendimentos']))
                           {
                               $this->NM_ajax_info['errList']['gbttecempreendimentos'] = array();
                           }
                           $this->NM_ajax_info['errList']['gbttecempreendimentos'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
                           breack;
                       }
                       $x++ ; 
              } 
          } 
      } 
    } // ValidateField_gbttecempreendimentos

    function ValidateField_contexto_tipo(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->contexto_tipo) > 255) 
          { 
              $Campos_Crit .= "Contexto Tipo " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['contexto_tipo']))
              {
                  $Campos_Erros['contexto_tipo'] = array();
              }
              $Campos_Erros['contexto_tipo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['contexto_tipo']) || !is_array($this->NM_ajax_info['errList']['contexto_tipo']))
              {
                  $this->NM_ajax_info['errList']['contexto_tipo'] = array();
              }
              $this->NM_ajax_info['errList']['contexto_tipo'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 255 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
    } // ValidateField_contexto_tipo

    function ValidateField_contexto_id_ope(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->contexto_id_ope == "")  
      { 
          $this->contexto_id_ope = 0;
          $this->sc_force_zero[] = 'contexto_id_ope';
      } 
      nm_limpa_numero($this->contexto_id_ope, $this->field_config['contexto_id_ope']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->contexto_id_ope != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->contexto_id_ope) > $iTestSize)  
              { 
                  $Campos_Crit .= "Contexto ID OPE: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['contexto_id_ope']))
                  {
                      $Campos_Erros['contexto_id_ope'] = array();
                  }
                  $Campos_Erros['contexto_id_ope'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['contexto_id_ope']) || !is_array($this->NM_ajax_info['errList']['contexto_id_ope']))
                  {
                      $this->NM_ajax_info['errList']['contexto_id_ope'] = array();
                  }
                  $this->NM_ajax_info['errList']['contexto_id_ope'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->contexto_id_ope, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Contexto ID OPE; " ; 
                  if (!isset($Campos_Erros['contexto_id_ope']))
                  {
                      $Campos_Erros['contexto_id_ope'] = array();
                  }
                  $Campos_Erros['contexto_id_ope'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['contexto_id_ope']) || !is_array($this->NM_ajax_info['errList']['contexto_id_ope']))
                  {
                      $this->NM_ajax_info['errList']['contexto_id_ope'] = array();
                  }
                  $this->NM_ajax_info['errList']['contexto_id_ope'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_contexto_id_ope

    function ValidateField_criadopor(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      if ($this->criadopor == "")  
      { 
          $this->criadopor = 0;
          $this->sc_force_zero[] = 'criadopor';
      } 
      nm_limpa_numero($this->criadopor, $this->field_config['criadopor']['symbol_grp']) ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if ($this->criadopor != '')  
          { 
              $iTestSize = 11;
              if (strlen($this->criadopor) > $iTestSize)  
              { 
                  $Campos_Crit .= "Criado Por: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['criadopor']))
                  {
                      $Campos_Erros['criadopor'] = array();
                  }
                  $Campos_Erros['criadopor'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['criadopor']) || !is_array($this->NM_ajax_info['errList']['criadopor']))
                  {
                      $this->NM_ajax_info['errList']['criadopor'] = array();
                  }
                  $this->NM_ajax_info['errList']['criadopor'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->criadopor, 11, 0, -0, 99999999999, "N") == false)  
              { 
                  $Campos_Crit .= "Criado Por; " ; 
                  if (!isset($Campos_Erros['criadopor']))
                  {
                      $Campos_Erros['criadopor'] = array();
                  }
                  $Campos_Erros['criadopor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['criadopor']) || !is_array($this->NM_ajax_info['errList']['criadopor']))
                  {
                      $this->NM_ajax_info['errList']['criadopor'] = array();
                  }
                  $this->NM_ajax_info['errList']['criadopor'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
    } // ValidateField_criadopor

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
                  $Campos_Crit .= "Criado Em; " ; 
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
                  $Campos_Crit .= "Criado Em; " ; 
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

    function ValidateField_alterado_em(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->alterado_em, $this->field_config['alterado_em']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['alterado_em']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['alterado_em']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['alterado_em']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['alterado_em']['date_sep']) ; 
          if (trim($this->alterado_em) != "")  
          { 
              if ($teste_validade->Data($this->alterado_em, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Alterado Em; " ; 
                  if (!isset($Campos_Erros['alterado_em']))
                  {
                      $Campos_Erros['alterado_em'] = array();
                  }
                  $Campos_Erros['alterado_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['alterado_em']) || !is_array($this->NM_ajax_info['errList']['alterado_em']))
                  {
                      $this->NM_ajax_info['errList']['alterado_em'] = array();
                  }
                  $this->NM_ajax_info['errList']['alterado_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['alterado_em']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->alterado_em_hora, $this->field_config['alterado_em_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['alterado_em_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['alterado_em_hora']['time_sep']) ; 
          if (trim($this->alterado_em_hora) != "")  
          { 
              if ($teste_validade->Hora($this->alterado_em_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Alterado Em; " ; 
                  if (!isset($Campos_Erros['alterado_em_hora']))
                  {
                      $Campos_Erros['alterado_em_hora'] = array();
                  }
                  $Campos_Erros['alterado_em_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['alterado_em']) || !is_array($this->NM_ajax_info['errList']['alterado_em']))
                  {
                      $this->NM_ajax_info['errList']['alterado_em'] = array();
                  }
                  $this->NM_ajax_info['errList']['alterado_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['alterado_em']) && isset($Campos_Erros['alterado_em_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['alterado_em'], $Campos_Erros['alterado_em_hora']);
          if (empty($Campos_Erros['alterado_em_hora']))
          {
              unset($Campos_Erros['alterado_em_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['alterado_em']))
          {
              $this->NM_ajax_info['errList']['alterado_em'] = array_unique($this->NM_ajax_info['errList']['alterado_em']);
          }
      }
    } // ValidateField_alterado_em_hora

    function ValidateField_removido_em(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
      nm_limpa_data($this->removido_em, $this->field_config['removido_em']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['removido_em']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['removido_em']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['removido_em']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['removido_em']['date_sep']) ; 
          if (trim($this->removido_em) != "")  
          { 
              if ($teste_validade->Data($this->removido_em, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $Campos_Crit .= "Removido Em; " ; 
                  if (!isset($Campos_Erros['removido_em']))
                  {
                      $Campos_Erros['removido_em'] = array();
                  }
                  $Campos_Erros['removido_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['removido_em']) || !is_array($this->NM_ajax_info['errList']['removido_em']))
                  {
                      $this->NM_ajax_info['errList']['removido_em'] = array();
                  }
                  $this->NM_ajax_info['errList']['removido_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['removido_em']['date_format'] = $guarda_datahora; 
       } 
      nm_limpa_hora($this->removido_em_hora, $this->field_config['removido_em_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['removido_em_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['removido_em_hora']['time_sep']) ; 
          if (trim($this->removido_em_hora) != "")  
          { 
              if ($teste_validade->Hora($this->removido_em_hora, $Format_Hora) == false)  
              { 
                  $Campos_Crit .= "Removido Em; " ; 
                  if (!isset($Campos_Erros['removido_em_hora']))
                  {
                      $Campos_Erros['removido_em_hora'] = array();
                  }
                  $Campos_Erros['removido_em_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['removido_em']) || !is_array($this->NM_ajax_info['errList']['removido_em']))
                  {
                      $this->NM_ajax_info['errList']['removido_em'] = array();
                  }
                  $this->NM_ajax_info['errList']['removido_em'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['removido_em']) && isset($Campos_Erros['removido_em_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['removido_em'], $Campos_Erros['removido_em_hora']);
          if (empty($Campos_Erros['removido_em_hora']))
          {
              unset($Campos_Erros['removido_em_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['removido_em']))
          {
              $this->NM_ajax_info['errList']['removido_em'] = array_unique($this->NM_ajax_info['errList']['removido_em']);
          }
      }
    } // ValidateField_removido_em_hora
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
          if ($this->img_foto == "none") 
          { 
              $this->img_foto = ""; 
          } 
          if ($this->img_foto != "") 
          { 
              if (!function_exists('sc_upload_unprotect_chars'))
              {
                  include_once 'form_CadastroDeUsuarios_mob_doc_name.php';
              }
              $this->img_foto = sc_upload_unprotect_chars($this->img_foto);
              $this->img_foto_scfile_name = sc_upload_unprotect_chars($this->img_foto_scfile_name);
              if ($nm_browser == "Opera")  
              { 
                  $this->img_foto_scfile_type = substr($this->img_foto_scfile_type, 0, strpos($this->img_foto_scfile_type, ";")) ; 
              } 
              if ($this->img_foto_scfile_type == "image/pjpeg" || $this->img_foto_scfile_type == "image/jpeg" || $this->img_foto_scfile_type == "image/gif" ||  
                  $this->img_foto_scfile_type == "image/png" || $this->img_foto_scfile_type == "image/x-png" || $this->img_foto_scfile_type == "image/bmp")  
              { 
                  if (is_file($this->img_foto))  
                  { 
                      $reg_img_foto = file_get_contents($this->img_foto); 
                      $this->img_foto = $reg_img_foto; 
                  } 
                  else 
                  { 
                      $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_profile_img'] . " " . $this->Ini->Nm_lang['lang_errm_upld']; 
                      $this->img_foto = "";
                      if (!isset($Campos_Erros['img_foto']))
                      {
                          $Campos_Erros['img_foto'] = array();
                      }
                      $Campos_Erros['img_foto'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                      if (!isset($this->NM_ajax_info['errList']['img_foto']) || !is_array($this->NM_ajax_info['errList']['img_foto']))
                      {
                          $this->NM_ajax_info['errList']['img_foto'] = array();
                      }
                      $this->NM_ajax_info['errList']['img_foto'][] = $this->Ini->Nm_lang['lang_errm_upld'];
                  } 
              } 
              else 
              { 
                  if ($nm_browser == "Konqueror")  
                  { 
                      $this->img_foto = "" ; 
                  } 
                  else 
                  { 
                     $Campos_Crit .= "" . $this->Ini->Nm_lang['lang_label_profile_img'] . " " . $this->Ini->Nm_lang['lang_errm_ivtp'];  
                      if (!isset($Campos_Erros['img_foto']))
                      {
                          $Campos_Erros['img_foto'] = array();
                      }
                      $Campos_Erros['img_foto'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                      if (!isset($this->NM_ajax_info['errList']['img_foto']) || !is_array($this->NM_ajax_info['errList']['img_foto']))
                      {
                          $this->NM_ajax_info['errList']['img_foto'] = array();
                      }
                      $this->NM_ajax_info['errList']['img_foto'][] = $this->Ini->Nm_lang['lang_errm_ivtp'];
                  } 
              } 
          } 
          elseif (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form']['img_foto']) && $this->img_foto_limpa != "S")
          {
              $this->img_foto = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form']['img_foto'];
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
    $this->nmgp_dados_form['id_usuario'] = $this->id_usuario;
    $this->nmgp_dados_form['nom_username'] = $this->nom_username;
    $this->nmgp_dados_form['pass'] = $this->pass;
    $this->nmgp_dados_form['pass_confirm'] = $this->pass_confirm;
    $this->nmgp_dados_form['diasinatividade'] = $this->diasinatividade;
    $this->nmgp_dados_form['num_ativo'] = $this->num_ativo;
    $this->nmgp_dados_form['num_totvs'] = $this->num_totvs;
    $this->nmgp_dados_form['num_tipousuario'] = $this->num_tipousuario;
    $this->nmgp_dados_form['operadora'] = $this->operadora;
    $this->nmgp_dados_form['prestadora'] = $this->prestadora;
    $this->nmgp_dados_form['empreendimento'] = $this->empreendimento;
    $this->nmgp_dados_form['id_perfil'] = $this->id_perfil;
    $this->nmgp_dados_form['id_ope'] = $this->id_ope;
    if (empty($this->img_foto))
    {
        $this->img_foto = $this->nmgp_dados_form['img_foto'];
    }
    $this->nmgp_dados_form['img_foto'] = $this->img_foto;
    $this->nmgp_dados_form['img_foto_limpa'] = $this->img_foto_limpa;
    $this->nmgp_dados_form['nom_nome'] = $this->nom_nome;
    $this->nmgp_dados_form['num_cpf'] = $this->num_cpf;
    $this->nmgp_dados_form['num_rg'] = $this->num_rg;
    $this->nmgp_dados_form['cargo'] = $this->cargo;
    $this->nmgp_dados_form['departamento'] = $this->departamento;
    $this->nmgp_dados_form['data_nascimento'] = $this->data_nascimento;
    $this->nmgp_dados_form['nom_email1'] = $this->nom_email1;
    $this->nmgp_dados_form['nom_email2'] = $this->nom_email2;
    $this->nmgp_dados_form['num_telefonecomercial'] = $this->num_telefonecomercial;
    $this->nmgp_dados_form['nom_telefoneresidencial'] = $this->nom_telefoneresidencial;
    $this->nmgp_dados_form['num_telefonecelular'] = $this->num_telefonecelular;
    $this->nmgp_dados_form['end_cep'] = $this->end_cep;
    $this->nmgp_dados_form['end_logradouro'] = $this->end_logradouro;
    $this->nmgp_dados_form['end_complemento'] = $this->end_complemento;
    $this->nmgp_dados_form['end_numero'] = $this->end_numero;
    $this->nmgp_dados_form['end_bairro'] = $this->end_bairro;
    $this->nmgp_dados_form['end_cidade'] = $this->end_cidade;
    $this->nmgp_dados_form['end_uf'] = $this->end_uf;
    $this->nmgp_dados_form['agendadatajson'] = $this->agendadatajson;
    $this->nmgp_dados_form['savedataonclick'] = $this->savedataonclick;
    $this->nmgp_dados_form['removeronclick'] = $this->removeronclick;
    $this->nmgp_dados_form['gbttecempreendimentos'] = $this->gbttecempreendimentos;
    $this->nmgp_dados_form['contexto_tipo'] = $this->contexto_tipo;
    $this->nmgp_dados_form['contexto_id_ope'] = $this->contexto_id_ope;
    $this->nmgp_dados_form['criadopor'] = $this->criadopor;
    $this->nmgp_dados_form['criado_em'] = $this->criado_em;
    $this->nmgp_dados_form['alterado_em'] = $this->alterado_em;
    $this->nmgp_dados_form['removido_em'] = $this->removido_em;
    $this->nmgp_dados_form['password'] = $this->password;
    $this->nmgp_dados_form['data_ultimologin'] = $this->data_ultimologin;
    $this->nmgp_dados_form['numtentativaslogin'] = $this->numtentativaslogin;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->formatado = false;
      nm_limpa_numero($this->id_usuario, $this->field_config['id_usuario']['symbol_grp']) ; 
      nm_limpa_numero($this->id_ope, $this->field_config['id_ope']['symbol_grp']) ; 
      nm_limpa_ciccnpj($this->num_cpf) ; 
      $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      nm_limpa_data($this->data_nascimento, $this->field_config['data_nascimento']['date_sep']) ; 
      $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->nom_telefoneresidencial, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      $this->nm_tira_mask($this->num_telefonecelular, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      nm_limpa_cep($this->end_cep) ; 
      nm_limpa_numero($this->contexto_id_ope, $this->field_config['contexto_id_ope']['symbol_grp']) ; 
      nm_limpa_numero($this->criadopor, $this->field_config['criadopor']['symbol_grp']) ; 
      nm_limpa_data($this->criado_em, $this->field_config['criado_em']['date_sep']) ; 
      nm_limpa_hora($this->criado_em_hora, $this->field_config['criado_em']['time_sep']) ; 
      nm_limpa_data($this->alterado_em, $this->field_config['alterado_em']['date_sep']) ; 
      nm_limpa_hora($this->alterado_em_hora, $this->field_config['alterado_em']['time_sep']) ; 
      nm_limpa_data($this->removido_em, $this->field_config['removido_em']['date_sep']) ; 
      nm_limpa_hora($this->removido_em_hora, $this->field_config['removido_em']['time_sep']) ; 
      nm_limpa_data($this->data_ultimologin, $this->field_config['data_ultimologin']['date_sep']) ; 
      nm_limpa_hora($this->data_ultimologin_hora, $this->field_config['data_ultimologin']['time_sep']) ; 
      nm_limpa_numero($this->numtentativaslogin, $this->field_config['numtentativaslogin']['symbol_grp']) ; 
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
      if ($Nome_Campo == "id_usuario")
      {
          nm_limpa_numero($this->id_usuario, $this->field_config['id_usuario']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "id_ope")
      {
          nm_limpa_numero($this->id_ope, $this->field_config['id_ope']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "num_cpf")
      {
          nm_limpa_ciccnpj($this->num_cpf) ; 
      }
      if ($Nome_Campo == "num_rg")
      {
          $this->nm_tira_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_telefonecomercial")
      {
          $this->nm_tira_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "nom_telefoneresidencial")
      {
          $this->nm_tira_mask($this->nom_telefoneresidencial, "(99) 9999-9999;(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "num_telefonecelular")
      {
          $this->nm_tira_mask($this->num_telefonecelular, "(99) 99999-9999", "(){}[].,;:-+/ "); 
      }
      if ($Nome_Campo == "end_cep")
      {
          nm_limpa_cep($this->end_cep) ; 
      }
      if ($Nome_Campo == "contexto_id_ope")
      {
          nm_limpa_numero($this->contexto_id_ope, $this->field_config['contexto_id_ope']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "criadopor")
      {
          nm_limpa_numero($this->criadopor, $this->field_config['criadopor']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "numtentativaslogin")
      {
          nm_limpa_numero($this->numtentativaslogin, $this->field_config['numtentativaslogin']['symbol_grp']) ; 
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
      if (!empty($this->id_usuario) || (!empty($format_fields) && isset($format_fields['id_usuario'])))
      {
          nmgp_Form_Num_Val($this->id_usuario, $this->field_config['id_usuario']['symbol_grp'], $this->field_config['id_usuario']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_usuario']['symbol_fmt']) ; 
      }
      if (!empty($this->id_ope) || (!empty($format_fields) && isset($format_fields['id_ope'])))
      {
          nmgp_Form_Num_Val($this->id_ope, $this->field_config['id_ope']['symbol_grp'], $this->field_config['id_ope']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['id_ope']['symbol_fmt']) ; 
      }
      if (!empty($this->num_cpf) || (!empty($format_fields) && isset($format_fields['num_cpf'])))
      {
          nmgp_Form_CicCnpj($this->num_cpf) ; 
      }
      if (!empty($this->num_rg) || (!empty($format_fields) && isset($format_fields['num_rg'])))
      {
          $this->nm_gera_mask($this->num_rg, "9.999.999-*;99.999.999-*;999.999.999-*"); 
      }
      if ((!empty($this->data_nascimento) && 'null' != $this->data_nascimento) || (!empty($format_fields) && isset($format_fields['data_nascimento'])))
      {
          nm_volta_data($this->data_nascimento, $this->field_config['data_nascimento']['date_format']) ; 
          nmgp_Form_Datas($this->data_nascimento, $this->field_config['data_nascimento']['date_format'], $this->field_config['data_nascimento']['date_sep']) ;  
      }
      elseif ('null' == $this->data_nascimento || '' == $this->data_nascimento)
      {
          $this->data_nascimento = '';
      }
      if (!empty($this->num_telefonecomercial) || (!empty($format_fields) && isset($format_fields['num_telefonecomercial'])))
      {
          $this->nm_gera_mask($this->num_telefonecomercial, "(99) 99999-9999;(99) 9999-9999"); 
      }
      if (!empty($this->nom_telefoneresidencial) || (!empty($format_fields) && isset($format_fields['nom_telefoneresidencial'])))
      {
          $this->nm_gera_mask($this->nom_telefoneresidencial, "(99) 9999-9999;(99) 99999-9999"); 
      }
      if (!empty($this->num_telefonecelular) || (!empty($format_fields) && isset($format_fields['num_telefonecelular'])))
      {
          $this->nm_gera_mask($this->num_telefonecelular, "(99) 99999-9999"); 
      }
      if (!empty($this->end_cep) || (!empty($format_fields) && isset($format_fields['end_cep'])))
      {
          nmgp_Form_Cep($this->end_cep) ; 
      }
      if (!empty($this->contexto_id_ope) || (!empty($format_fields) && isset($format_fields['contexto_id_ope'])))
      {
          nmgp_Form_Num_Val($this->contexto_id_ope, $this->field_config['contexto_id_ope']['symbol_grp'], $this->field_config['contexto_id_ope']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['contexto_id_ope']['symbol_fmt']) ; 
      }
      if (!empty($this->criadopor) || (!empty($format_fields) && isset($format_fields['criadopor'])))
      {
          nmgp_Form_Num_Val($this->criadopor, $this->field_config['criadopor']['symbol_grp'], $this->field_config['criadopor']['symbol_dec'], "0", "S", "", "", "", "-", $this->field_config['criadopor']['symbol_fmt']) ; 
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
      if ((!empty($this->alterado_em) && 'null' != $this->alterado_em) || (!empty($format_fields) && isset($format_fields['alterado_em'])))
      {
          $nm_separa_data = strpos($this->field_config['alterado_em']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['alterado_em']['date_format'];
          $this->field_config['alterado_em']['date_format'] = substr($this->field_config['alterado_em']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->alterado_em, " ") ; 
          $this->alterado_em_hora = substr($this->alterado_em, $separador + 1) ; 
          $this->alterado_em = substr($this->alterado_em, 0, $separador) ; 
          nm_volta_data($this->alterado_em, $this->field_config['alterado_em']['date_format']) ; 
          nmgp_Form_Datas($this->alterado_em, $this->field_config['alterado_em']['date_format'], $this->field_config['alterado_em']['date_sep']) ;  
          $this->field_config['alterado_em']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->alterado_em_hora, $this->field_config['alterado_em']['date_format']) ; 
          nmgp_Form_Hora($this->alterado_em_hora, $this->field_config['alterado_em']['date_format'], $this->field_config['alterado_em']['time_sep']) ;  
          $this->field_config['alterado_em']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->alterado_em || '' == $this->alterado_em)
      {
          $this->alterado_em_hora = '';
          $this->alterado_em = '';
      }
      if ((!empty($this->removido_em) && 'null' != $this->removido_em) || (!empty($format_fields) && isset($format_fields['removido_em'])))
      {
          $nm_separa_data = strpos($this->field_config['removido_em']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['removido_em']['date_format'];
          $this->field_config['removido_em']['date_format'] = substr($this->field_config['removido_em']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->removido_em, " ") ; 
          $this->removido_em_hora = substr($this->removido_em, $separador + 1) ; 
          $this->removido_em = substr($this->removido_em, 0, $separador) ; 
          nm_volta_data($this->removido_em, $this->field_config['removido_em']['date_format']) ; 
          nmgp_Form_Datas($this->removido_em, $this->field_config['removido_em']['date_format'], $this->field_config['removido_em']['date_sep']) ;  
          $this->field_config['removido_em']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->removido_em_hora, $this->field_config['removido_em']['date_format']) ; 
          nmgp_Form_Hora($this->removido_em_hora, $this->field_config['removido_em']['date_format'], $this->field_config['removido_em']['time_sep']) ;  
          $this->field_config['removido_em']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->removido_em || '' == $this->removido_em)
      {
          $this->removido_em_hora = '';
          $this->removido_em = '';
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
      $guarda_format_hora = $this->field_config['data_nascimento']['date_format'];
      if ($this->data_nascimento != "")  
      { 
          nm_conv_data($this->data_nascimento, $this->field_config['data_nascimento']['date_format']) ; 
          $this->data_nascimento_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->data_nascimento_hora = substr($this->data_nascimento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->data_nascimento_hora = substr($this->data_nascimento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->data_nascimento_hora = substr($this->data_nascimento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->data_nascimento_hora = substr($this->data_nascimento_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->data_nascimento_hora = substr($this->data_nascimento_hora, 0, -4);
          }
      } 
      if ($this->data_nascimento == "" && $use_null)  
      { 
          $this->data_nascimento = "null" ; 
      } 
      $this->field_config['data_nascimento']['date_format'] = $guarda_format_hora;
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
      $guarda_format_hora = $this->field_config['alterado_em']['date_format'];
      if ($this->alterado_em != "")  
      { 
          $nm_separa_data = strpos($this->field_config['alterado_em']['date_format'], ";") ;
          $this->field_config['alterado_em']['date_format'] = substr($this->field_config['alterado_em']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->alterado_em, $this->field_config['alterado_em']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->alterado_em = str_replace('-', '', $this->alterado_em);
          }
          $this->field_config['alterado_em']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->alterado_em_hora, $this->field_config['alterado_em']['date_format']) ; 
          if ($this->alterado_em_hora == "" )  
          { 
              $this->alterado_em_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4) . "." . substr($this->alterado_em_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->alterado_em_hora = substr($this->alterado_em_hora, 0, -4);
          }
          if ($this->alterado_em != "")  
          { 
              $this->alterado_em .= " " . $this->alterado_em_hora ; 
          }
      } 
      if ($this->alterado_em == "" && $use_null)  
      { 
          $this->alterado_em = "null" ; 
      } 
      $this->field_config['alterado_em']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['removido_em']['date_format'];
      if ($this->removido_em != "")  
      { 
          $nm_separa_data = strpos($this->field_config['removido_em']['date_format'], ";") ;
          $this->field_config['removido_em']['date_format'] = substr($this->field_config['removido_em']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->removido_em, $this->field_config['removido_em']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->removido_em = str_replace('-', '', $this->removido_em);
          }
          $this->field_config['removido_em']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->removido_em_hora, $this->field_config['removido_em']['date_format']) ; 
          if ($this->removido_em_hora == "" )  
          { 
              $this->removido_em_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4) . "." . substr($this->removido_em_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->removido_em_hora = substr($this->removido_em_hora, 0, -4);
          }
          if ($this->removido_em != "")  
          { 
              $this->removido_em .= " " . $this->removido_em_hora ; 
          }
      } 
      if ($this->removido_em == "" && $use_null)  
      { 
          $this->removido_em = "null" ; 
      } 
      $this->field_config['removido_em']['date_format'] = $guarda_format_hora;
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
          $this->ajax_return_values_id_usuario();
          $this->ajax_return_values_nom_username();
          $this->ajax_return_values_pass();
          $this->ajax_return_values_pass_confirm();
          $this->ajax_return_values_diasinatividade();
          $this->ajax_return_values_num_ativo();
          $this->ajax_return_values_num_totvs();
          $this->ajax_return_values_num_tipousuario();
          $this->ajax_return_values_operadora();
          $this->ajax_return_values_prestadora();
          $this->ajax_return_values_empreendimento();
          $this->ajax_return_values_id_perfil();
          $this->ajax_return_values_id_ope();
          $this->ajax_return_values_img_foto();
          $this->ajax_return_values_nom_nome();
          $this->ajax_return_values_num_cpf();
          $this->ajax_return_values_num_rg();
          $this->ajax_return_values_cargo();
          $this->ajax_return_values_departamento();
          $this->ajax_return_values_data_nascimento();
          $this->ajax_return_values_nom_email1();
          $this->ajax_return_values_nom_email2();
          $this->ajax_return_values_num_telefonecomercial();
          $this->ajax_return_values_nom_telefoneresidencial();
          $this->ajax_return_values_num_telefonecelular();
          $this->ajax_return_values_end_cep();
          $this->ajax_return_values_end_logradouro();
          $this->ajax_return_values_end_complemento();
          $this->ajax_return_values_end_numero();
          $this->ajax_return_values_end_bairro();
          $this->ajax_return_values_end_cidade();
          $this->ajax_return_values_end_uf();
          $this->ajax_return_values_agendadatajson();
          $this->ajax_return_values_savedataonclick();
          $this->ajax_return_values_removeronclick();
          $this->ajax_return_values_gbttecempreendimentos();
          $this->ajax_return_values_contexto_tipo();
          $this->ajax_return_values_contexto_id_ope();
          $this->ajax_return_values_criadopor();
          $this->ajax_return_values_criado_em();
          $this->ajax_return_values_alterado_em();
          $this->ajax_return_values_removido_em();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id_usuario']['keyVal'] = form_CadastroDeUsuarios_mob_pack_protect_string($this->nmgp_dados_form['id_usuario']);
          }
   } // ajax_return_values

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
          }
   }

          //----- nom_username
   function ajax_return_values_nom_username($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_username", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_username);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_username'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- pass
   function ajax_return_values_pass($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pass", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pass);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pass'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- pass_confirm
   function ajax_return_values_pass_confirm($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("pass_confirm", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->pass_confirm);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['pass_confirm'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array(''),
              );
          }
   }

          //----- diasinatividade
   function ajax_return_values_diasinatividade($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("diasinatividade", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->diasinatividade);
              $aLookup = array();
              $this->_tmp_lookup_diasinatividade = $this->diasinatividade;

$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('30') => form_CadastroDeUsuarios_mob_pack_protect_string("30 " . $this->Ini->Nm_lang['lang_label_dias'] . ""));
$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('60') => form_CadastroDeUsuarios_mob_pack_protect_string("60 " . $this->Ini->Nm_lang['lang_label_dias'] . ""));
$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('90') => form_CadastroDeUsuarios_mob_pack_protect_string("90 " . $this->Ini->Nm_lang['lang_label_dias'] . ""));
$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('120') => form_CadastroDeUsuarios_mob_pack_protect_string("120 " . $this->Ini->Nm_lang['lang_label_dias'] . ""));
$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('180') => form_CadastroDeUsuarios_mob_pack_protect_string("180 " . $this->Ini->Nm_lang['lang_label_dias'] . ""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_diasinatividade'][] = '30';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_diasinatividade'][] = '60';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_diasinatividade'][] = '90';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_diasinatividade'][] = '120';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_diasinatividade'][] = '180';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"diasinatividade\"";
          if (isset($this->NM_ajax_info['select_html']['diasinatividade']) && !empty($this->NM_ajax_info['select_html']['diasinatividade']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['diasinatividade'];
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

                  if ($this->diasinatividade == $sValue)
                  {
                      $this->_tmp_lookup_diasinatividade = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['diasinatividade'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['diasinatividade']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['diasinatividade']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['diasinatividade']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['diasinatividade']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['diasinatividade']['labList'] = $aLabel;
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

$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('S') => form_CadastroDeUsuarios_mob_pack_protect_string(""));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_ativo'][] = 'S';
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
              $this->NM_ajax_info['fldList']['num_ativo']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
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

          //----- num_tipousuario
   function ajax_return_values_num_tipousuario($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_tipousuario", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_tipousuario);
              $aLookup = array();
              $this->_tmp_lookup_num_tipousuario = $this->num_tipousuario;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'] = array(); 
}
$aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string('') => form_CadastroDeUsuarios_mob_pack_protect_string(''));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT 'G', 'GLOBALBLUE' FROM tb_usuarios WHERE 'G' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'GT', 'GLOBALBLUE Técnico' FROM tb_usuarios WHERE 'GT' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'O', 'Operadora' FROM tb_usuarios WHERE 'O' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'P', 'Prestadora' de FROM tb_usuarios WHERE 'P' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'E', 'Empreendimento' FROM tb_usuarios WHERE 'E' IN (" . $_SESSION['profile_TypeUserCreate'] . ")";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'][] = $rs->fields[0];
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
          $sSelComp = "name=\"num_tipousuario\"";
          if (isset($this->NM_ajax_info['select_html']['num_tipousuario']) && !empty($this->NM_ajax_info['select_html']['num_tipousuario']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['num_tipousuario'];
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

                  if ($this->num_tipousuario == $sValue)
                  {
                      $this->_tmp_lookup_num_tipousuario = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['num_tipousuario'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['num_tipousuario']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['num_tipousuario']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['num_tipousuario']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['num_tipousuario']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['num_tipousuario']['labList'] = $aLabel;
          }
   }

          //----- operadora
   function ajax_return_values_operadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("operadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->operadora);
              $aLookup = array();
              $this->_tmp_lookup_operadora = $this->operadora;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID_Operadoras, Nom_Operadoras 
FROM tb_operadoras 
" . $_SESSION['profile_sqlFilterOperadora'] . " 
ORDER BY Nom_Operadoras";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'][] = $rs->fields[0];
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
          $sSelComp = "name=\"operadora\"";
          if (isset($this->NM_ajax_info['select_html']['operadora']) && !empty($this->NM_ajax_info['select_html']['operadora']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['operadora'];
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

                  if ($this->operadora == $sValue)
                  {
                      $this->_tmp_lookup_operadora = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['operadora'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['operadora']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['operadora']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['operadora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['operadora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['operadora']['labList'] = $aLabel;
          }
   }

          //----- prestadora
   function ajax_return_values_prestadora($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("prestadora", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->prestadora);
              $aLookup = array();
              $this->_tmp_lookup_prestadora = $this->prestadora;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT tb_prestadores.ID_Prestador, tb_prestadores.Nom_RazaoSocial
FROM tb_prestadores 
" . $_SESSION['profile_sqlFilterPrestador'] . " 
ORDER BY Nom_RazaoSocial";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'][] = $rs->fields[0];
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
          $sSelComp = "name=\"prestadora\"";
          if (isset($this->NM_ajax_info['select_html']['prestadora']) && !empty($this->NM_ajax_info['select_html']['prestadora']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['prestadora'];
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

                  if ($this->prestadora == $sValue)
                  {
                      $this->_tmp_lookup_prestadora = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['prestadora'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['prestadora']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['prestadora']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['prestadora']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['prestadora']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['prestadora']['labList'] = $aLabel;
          }
   }

          //----- empreendimento
   function ajax_return_values_empreendimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("empreendimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->empreendimento);
              $aLookup = array();
              $this->_tmp_lookup_empreendimento = $this->empreendimento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento 
FROM tb_empreendimentos 
" . $_SESSION['profile_sqlFilterEmpreendimento'] . " 
ORDER BY Nom_Empreendimento";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'][] = $rs->fields[0];
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
          $sSelComp = "name=\"empreendimento\"";
          if (isset($this->NM_ajax_info['select_html']['empreendimento']) && !empty($this->NM_ajax_info['select_html']['empreendimento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['empreendimento'];
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

                  if ($this->empreendimento == $sValue)
                  {
                      $this->_tmp_lookup_empreendimento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['empreendimento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['empreendimento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['empreendimento']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['empreendimento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['empreendimento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['empreendimento']['labList'] = $aLabel;
          }
   }

          //----- id_perfil
   function ajax_return_values_id_perfil($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_perfil", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_perfil);
              $aLookup = array();
              $this->_tmp_lookup_id_perfil = $this->id_perfil;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID, Nom_Perfil 
FROM tb_perfil 
WHERE FIND_IN_SET('$this->num_tipousuario', Tipo_Permitido) > 0 
ORDER BY Nom_Perfil";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'][] = $rs->fields[0];
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
          $sSelComp = "name=\"id_perfil\"";
          if (isset($this->NM_ajax_info['select_html']['id_perfil']) && !empty($this->NM_ajax_info['select_html']['id_perfil']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['id_perfil'];
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

                  if ($this->id_perfil == $sValue)
                  {
                      $this->_tmp_lookup_id_perfil = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['id_perfil'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['id_perfil']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['id_perfil']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['id_perfil']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['id_perfil']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['id_perfil']['labList'] = $aLabel;
          }
   }

          //----- id_ope
   function ajax_return_values_id_ope($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id_ope", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id_ope);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id_ope'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- img_foto
   function ajax_return_values_img_foto($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("img_foto", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->img_foto);
              $aLookup = array();
   $out_img_foto = '';
   $out1_img_foto = '';
   if ('' != $this->img_foto_ul_name && @is_file($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->img_foto_ul_name))
   {
       $this->img_foto = @file_get_contents($this->Ini->root . $this->Ini->path_imag_temp . '/' . $this->img_foto_ul_name);
   }
   if ($this->img_foto != "" && $this->img_foto != "none")   
   { 
       $out_img_foto = $this->Ini->path_imag_temp . "/sc_img_foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ;  
       $out1_img_foto = $out_img_foto; 
       $arq_img_foto = fopen($this->Ini->root . $out_img_foto, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->img_foto, 0, 12));
           if (substr($this->img_foto, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->img_foto = nm_conv_img_access($this->img_foto);
           } 
       } 
       if (substr($this->img_foto, 0, 4) == "*nm*") 
       { 
           $this->img_foto = substr($this->img_foto, 4) ; 
           $this->img_foto = base64_decode($this->img_foto) ; 
       } 
       $img_pos_bm = strpos($this->img_foto, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->img_foto = substr($this->img_foto, $img_pos_bm) ; 
       } 
       fwrite($arq_img_foto, $this->img_foto) ;  
       fclose($arq_img_foto) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_img_foto);
       $this->nmgp_return_img['img_foto'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['img_foto'][1] = $sc_obj_img->getWidth();
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       $out_img_foto = $this->Ini->path_imag_temp . "/sc_" . "img_foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_img_foto);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_img_foto);
       } 
       else 
       { 
           $out_img_foto = $out1_img_foto;
       } 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
   } 
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['img_foto'] = array(
                       'row'    => '',
               'type'    => 'imagem',
               'valList' => array($this->Ini->Nm_lang['lang_othr_show_imgg']),
               'imgFile' => $out_img_foto,
               'imgOrig' => $out1_img_foto,
               'keepImg' => $sKeepImage,
              );
          }
   }

          //----- nom_nome
   function ajax_return_values_nom_nome($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_nome", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_nome);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_nome'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_cpf
   function ajax_return_values_num_cpf($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_cpf", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_cpf);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_cpf'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
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

          //----- cargo
   function ajax_return_values_cargo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("cargo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->cargo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['cargo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- departamento
   function ajax_return_values_departamento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("departamento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->departamento);
              $aLookup = array();
              $this->_tmp_lookup_departamento = $this->departamento;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID, Nome 
FROM tb_departamentos 
WHERE Num_Ativo = 'S' 
ORDER BY Nome";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'][] = $rs->fields[0];
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
          $sSelComp = "name=\"departamento\"";
          if (isset($this->NM_ajax_info['select_html']['departamento']) && !empty($this->NM_ajax_info['select_html']['departamento']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['departamento'];
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

                  if ($this->departamento == $sValue)
                  {
                      $this->_tmp_lookup_departamento = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['departamento'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['departamento']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['departamento']['valList'][$i] = form_CadastroDeUsuarios_mob_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['departamento']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['departamento']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['departamento']['labList'] = $aLabel;
          }
   }

          //----- data_nascimento
   function ajax_return_values_data_nascimento($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("data_nascimento", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->data_nascimento);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['data_nascimento'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nom_email1
   function ajax_return_values_nom_email1($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_email1", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_email1);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_email1'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- nom_email2
   function ajax_return_values_nom_email2($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_email2", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_email2);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_email2'] = array(
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

          //----- nom_telefoneresidencial
   function ajax_return_values_nom_telefoneresidencial($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("nom_telefoneresidencial", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->nom_telefoneresidencial);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['nom_telefoneresidencial'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- num_telefonecelular
   function ajax_return_values_num_telefonecelular($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("num_telefonecelular", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->num_telefonecelular);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['num_telefonecelular'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
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

          //----- agendadatajson
   function ajax_return_values_agendadatajson($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("agendadatajson", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->agendadatajson);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['agendadatajson'] = array(
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

          //----- gbttecempreendimentos
   function ajax_return_values_gbttecempreendimentos($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("gbttecempreendimentos", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->gbttecempreendimentos);
              $aLookup = array();
              $this->_tmp_lookup_gbttecempreendimentos = $this->gbttecempreendimentos;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "select ID_Empreendimento, Nom_Empreendimento from tb_empreendimentos 
WHERE Num_Ativo = 'S' 
order by Nom_Empreendimento";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $aLookup[] = array(form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => form_CadastroDeUsuarios_mob_pack_protect_string(NM_charset_to_utf8($rs->fields[1])));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_gbttecempreendimentos'][] = $rs->fields[0];
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
          $this->NM_ajax_info['fldList']['gbttecempreendimentos'] = array(
                       'row'    => '',
               'type'    => 'duplosel',
               'valList' => explode((false === strpos($this->gbttecempreendimentos, '@?@') ? ';' : '@?@'), $sTmpValue),
               'optList' => $aLookup,
               'colNum'  => 7,
              );
              end($this->NM_ajax_info['fldList']['gbttecempreendimentos']['valList']);
              if ('' == current($this->NM_ajax_info['fldList']['gbttecempreendimentos']['valList']))
              {
                  array_pop($this->NM_ajax_info['fldList']['gbttecempreendimentos']['valList']);
              }
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['gbttecempreendimentos']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['gbttecempreendimentos']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['gbttecempreendimentos']['labList'] = $aLabel;
          }
   }

          //----- contexto_tipo
   function ajax_return_values_contexto_tipo($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contexto_tipo", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contexto_tipo);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contexto_tipo'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- contexto_id_ope
   function ajax_return_values_contexto_id_ope($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("contexto_id_ope", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->contexto_id_ope);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['contexto_id_ope'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- criadopor
   function ajax_return_values_criadopor($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("criadopor", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->criadopor);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['criadopor'] = array(
                       'row'    => '',
               'type'    => 'text',
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
               'type'    => 'text',
               'valList' => array($this->criado_em . ' ' . $this->criado_em_hora),
              );
          }
   }

          //----- alterado_em
   function ajax_return_values_alterado_em($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("alterado_em", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->alterado_em);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['alterado_em'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->alterado_em . ' ' . $this->alterado_em_hora),
              );
          }
   }

          //----- removido_em
   function ajax_return_values_removido_em($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("removido_em", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->removido_em);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['removido_em'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->removido_em . ' ' . $this->removido_em_hora),
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['upload_dir'][$fieldName][] = $newName;
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
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_empreendimento = $this->empreendimento;
    $original_operadora = $this->operadora;
    $original_prestadora = $this->prestadora;
}
if (!isset($this->sc_temp_calendar_disabled)) {$this->sc_temp_calendar_disabled = (isset($_SESSION['calendar_disabled'])) ? $_SESSION['calendar_disabled'] : "";}
           ?><?php sc_include_library('sys', 'initCustom', 'onLoad.html'); ?><?php
$this->NM_ajax_info['buttonDisplay']['new'] = $this->nmgp_botoes["new"] = "off";;
$this->NM_ajax_info['buttonDisplay']['update'] = $this->nmgp_botoes["update"] = "off";;
$this->NM_ajax_info['buttonDisplay']['insert'] = $this->nmgp_botoes["insert"] = "off";;

sc_include_library('sys', 'functions', 'functions.php');


$calendar_disabled = false;
 if (isset($calendar_disabled)) {$this->sc_temp_calendar_disabled = $calendar_disabled;}
;

$s = new manageSession(true);
echo $s->getMessage(true);
echo $s->getIUDState($this);

if (!in_array($s->get('Num_TipoUsuario'), ["G", "GT"])) {
	$this->nmgp_cmp_hidden["num_totvs"] = "off"; $this->NM_ajax_info['fieldDisplay']['num_totvs'] = 'off';
}

$showAgenda = false;
$sD = $s->get();
$profile = $s->get("profile");
$Num_TipoUsuario = $s->get('Num_TipoUsuario');
$ID_OPE = $s->get('ID_OPE');
$ID_Usuario = $s->get('ID_Usuario');

$framesHTML = ["agenda" => true];
if($this->id_usuario  == $ID_Usuario){
	$this->sc_field_readonly("num_tipousuario", 'on');
	$this->sc_field_readonly("id_ope", 'on');
	$this->sc_field_readonly("id_perfil", 'on');
	$this->sc_field_readonly("operadora", 'on');
	$this->sc_field_readonly("prestadora", 'on');
	$this->sc_field_readonly("empreendimento", 'on');
}


if ($this->nmgp_opcao == "novo" && ($profile["USUARIO"]["CRIAR"]["v"] ?? "N") == "S" ||
	$this->nmgp_opcao == "igual" && ($profile["USUARIO"]["EDITAR"]["v"] ?? "N") == "S") {
	$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "on";;
} else {
	$this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes["salvar"] = "off";;
}
$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "off";;

if (($profile["USUARIO"]["DELETAR"]["v"] ?? "N") == "S" && $this->id_usuario  != $ID_Usuario) {
	$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "on";;
} else {
	$this->NM_ajax_info['buttonDisplay']['confirmeRemover'] = $this->nmgp_botoes["confirmeRemover"] = "off";;
	deleteElementHTML("#sc_confimeRemover_top");
}

$this->diasinatividade  = $this->diasinatividade  ?: 30;
if ($Num_TipoUsuario == "G") {
	$this->sc_field_readonly("diasinatividade", 'off');
} else {
	$this->sc_field_readonly("diasinatividade", 'on');
}

if ($this->nmgp_opcao != "novo") {
	if (isset($profile["USUARIO"]["CONSULTAR"]["a"][$this->num_tipousuario ])) {
		$attrByTypeProfile = $profile["USUARIO"]["CONSULTAR"]["a"][$this->num_tipousuario ];
		if (isset($attrByTypeProfile["fieldDisplayOff"])) {
			foreach($attrByTypeProfile["fieldDisplayOff"] as $field) {
				if($field == 'operadora') { $this->nmgp_cmp_hidden["operadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['operadora'] = 'off'; }
				if($field == 'prestadora') { $this->nmgp_cmp_hidden["prestadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['prestadora'] = 'off'; }
				if($field == 'empreendimento') { $this->nmgp_cmp_hidden["empreendimento"] = "off"; $this->NM_ajax_info['fieldDisplay']['empreendimento'] = 'off'; }
				if($field == 'Departamento') { $this->nmgp_cmp_hidden["departamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['departamento'] = 'off'; }
			}
		}
		if (isset($attrByTypeProfile["blockDisplayOff"])) {
			foreach($attrByTypeProfile["blockDisplayOff"] as $block) {
				if ("bl_Empreendimentos") { $this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off'; }
			}
		}
		if (isset($attrByTypeProfile["frameDisplayOff"])) {
			foreach($attrByTypeProfile["frameDisplayOff"] as $frame) {
				if(isset($framesHTML[$frame])) $framesHTML[$frame] = false;
			}
		}
	}
	switch($this->num_tipousuario ){
		case("O"):
		$this->operadora  = $this->id_ope ;
		break;
		case("P"):
		$this->prestadora  = $this->id_ope ;
		break;
		case("E"):
		$this->empreendimento  = $this->id_ope ;
		break;
	}
} else {
	$this->nmgp_cmp_hidden["operadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['operadora'] = 'off';
	$this->nmgp_cmp_hidden["prestadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['prestadora'] = 'off';
	$this->nmgp_cmp_hidden["empreendimento"] = "off"; $this->NM_ajax_info['fieldDisplay']['empreendimento'] = 'off';
	$framesHTML["agenda"] = false; 
	$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off';
}
$this->onLoadJS(["framesHTML" => $framesHTML]);

$crumb = [ $this->Ini->Nm_lang['lang_label_users'] ];
if ($this->nmgp_opcao == "novo") {
	$crumb[1] = "<i>". $this->Ini->Nm_lang['lang_label_newuser'] ."</i>";
} else if ($this->nmgp_opcao == "igual") {
	$crumb[1] = $this->nom_nome ;
}
echo "
	<script>
		loadBreadcrumb(['".$crumb[0]."','".$crumb[1]."']);
	</script>
";
if (isset($this->sc_temp_calendar_disabled)) { $_SESSION['calendar_disabled'] = $this->sc_temp_calendar_disabled;}
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_empreendimento != $this->empreendimento || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento)))
    {
        $this->ajax_return_values_empreendimento(true);
    }
    if (($original_operadora != $this->operadora || (isset($bFlagRead_operadora) && $bFlagRead_operadora)))
    {
        $this->ajax_return_values_operadora(true);
    }
    if (($original_prestadora != $this->prestadora || (isset($bFlagRead_prestadora) && $bFlagRead_prestadora)))
    {
        $this->ajax_return_values_prestadora(true);
    }
}
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
      }
      if (empty($this->criado_em))
      {
          $this->criado_em_hora = $this->criado_em;
      }
      if (empty($this->alterado_em))
      {
          $this->alterado_em_hora = $this->alterado_em;
      }
      if (empty($this->removido_em))
      {
          $this->removido_em_hora = $this->removido_em;
      }
      if (empty($this->data_ultimologin))
      {
          $this->data_ultimologin_hora = $this->data_ultimologin;
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
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_pass = $this->pass;
    $original_pass_confirm = $this->pass_confirm;
}
           sc_include_library('sys', 'functions', 'functions.php');
$this->num_ativo  = $this->num_ativo  ? $this->num_ativo  : 'N';

$s = new manageSession();
if ($this->pass  != '' && $this->pass_confirm  != '') {
	if ($this->pass  == $this->pass_confirm ) {
		$this->password  = md5($this->pass );
	} else {
		$s->setMessage( $this->Ini->Nm_lang['lang_label_passworddiff'] );
	$this->voltar("update");
	}
} else {
	$s->setMessage( $this->Ini->Nm_lang['lang_label_passworddiff'] );
$this->voltar("new");
}

$this->criadopor  = $s->get('ID_Usuario');
$this->criado_em  = date("Y-m-d H:i:s");
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_pass != $this->pass || (isset($bFlagRead_pass) && $bFlagRead_pass)))
    {
        $this->ajax_return_values_pass(true);
    }
    if (($original_pass_confirm != $this->pass_confirm || (isset($bFlagRead_pass_confirm) && $bFlagRead_pass_confirm)))
    {
        $this->ajax_return_values_pass_confirm(true);
    }
}
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
    }
    if ("alterar" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    $original_pass = $this->pass;
    $original_pass_confirm = $this->pass_confirm;
}
           sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
if ($this->pass  != '' || $this->pass_confirm  != '') {
	if ($this->pass  == $this->pass_confirm ) {
		 
      $nm_select = "UPDATE tb_usuarios SET password = md5('$this->pass') WHERE ID_Usuario = $this->id_usuario "; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_usuario != "")
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
	} else {
		$s->setMessage( $this->Ini->Nm_lang['lang_label_passworddiff'] );
	$this->voltar("update");
	}
}
 
      $nm_select = "SELECT Num_TipoUsuario FROM tb_usuarios WHERE ID_Usuario = $this->id_usuario "; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_usuario != "")
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
if (isset($this->rs[0][0]) && $this->rs[0][0] == "GT" && $this->rs[0][0] != $this->num_tipousuario ) {
	 
      $nm_select = "SELECT count(*) FROM tb_saetecgb WHERE ID_Usuario = $this->id_usuario "; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_usuario != "")
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
		$msg = sprintf( $this->Ini->Nm_lang['lang_msg_err2_removeuser'] , $this->rs[0][0], ($this->rs[0][0] > 1 ? "s" : ""));
		$s->setMessage($msg);
	$this->voltar("update");
	}
}

$this->rs = DbQuery($this, "SELECT Num_Ativo FROM tb_usuarios WHERE ID_Usuario = '$this->id_usuario'");

$this->num_ativo  = $this->num_ativo  ? $this->num_ativo  : $this->rs[0]["Num_Ativo"];

$this->alterado_em  = date("Y-m-d H:i:s");
if (isset($this->NM_ajax_flag) && $this->NM_ajax_flag)
{
    if (($original_pass != $this->pass || (isset($bFlagRead_pass) && $bFlagRead_pass)))
    {
        $this->ajax_return_values_pass(true);
    }
    if (($original_pass_confirm != $this->pass_confirm || (isset($bFlagRead_pass_confirm) && $bFlagRead_pass_confirm)))
    {
        $this->ajax_return_values_pass_confirm(true);
    }
}
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
    }
    if ("excluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           sc_include_library("sys","functions","functions.php");
$s = new manageSession();

if ($this->num_tipousuario  == "GT") {
	 
      $nm_select = "SELECT count(*) FROM tb_saetecgb WHERE ID_Usuario = $this->id_usuario "; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_usuario != "")
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
		$msg = sprintf( $this->Ini->Nm_lang['lang_msg_err1_removeuser'] , $this->rs[0][0], ($this->rs[0][0] > 1 ? "s" : ""));
		$s->setMessage($msg);
		 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadastroDeUsuarios') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
	}
}
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
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
      $NM_val_form['id_usuario'] = $this->id_usuario;
      $NM_val_form['nom_username'] = $this->nom_username;
      $NM_val_form['pass'] = $this->pass;
      $NM_val_form['pass_confirm'] = $this->pass_confirm;
      $NM_val_form['diasinatividade'] = $this->diasinatividade;
      $NM_val_form['num_ativo'] = $this->num_ativo;
      $NM_val_form['num_totvs'] = $this->num_totvs;
      $NM_val_form['num_tipousuario'] = $this->num_tipousuario;
      $NM_val_form['operadora'] = $this->operadora;
      $NM_val_form['prestadora'] = $this->prestadora;
      $NM_val_form['empreendimento'] = $this->empreendimento;
      $NM_val_form['id_perfil'] = $this->id_perfil;
      $NM_val_form['id_ope'] = $this->id_ope;
      $NM_val_form['img_foto'] = $this->img_foto;
      $NM_val_form['nom_nome'] = $this->nom_nome;
      $NM_val_form['num_cpf'] = $this->num_cpf;
      $NM_val_form['num_rg'] = $this->num_rg;
      $NM_val_form['cargo'] = $this->cargo;
      $NM_val_form['departamento'] = $this->departamento;
      $NM_val_form['data_nascimento'] = $this->data_nascimento;
      $NM_val_form['nom_email1'] = $this->nom_email1;
      $NM_val_form['nom_email2'] = $this->nom_email2;
      $NM_val_form['num_telefonecomercial'] = $this->num_telefonecomercial;
      $NM_val_form['nom_telefoneresidencial'] = $this->nom_telefoneresidencial;
      $NM_val_form['num_telefonecelular'] = $this->num_telefonecelular;
      $NM_val_form['end_cep'] = $this->end_cep;
      $NM_val_form['end_logradouro'] = $this->end_logradouro;
      $NM_val_form['end_complemento'] = $this->end_complemento;
      $NM_val_form['end_numero'] = $this->end_numero;
      $NM_val_form['end_bairro'] = $this->end_bairro;
      $NM_val_form['end_cidade'] = $this->end_cidade;
      $NM_val_form['end_uf'] = $this->end_uf;
      $NM_val_form['agendadatajson'] = $this->agendadatajson;
      $NM_val_form['savedataonclick'] = $this->savedataonclick;
      $NM_val_form['removeronclick'] = $this->removeronclick;
      $NM_val_form['gbttecempreendimentos'] = $this->gbttecempreendimentos;
      $NM_val_form['contexto_tipo'] = $this->contexto_tipo;
      $NM_val_form['contexto_id_ope'] = $this->contexto_id_ope;
      $NM_val_form['criadopor'] = $this->criadopor;
      $NM_val_form['criado_em'] = $this->criado_em;
      $NM_val_form['alterado_em'] = $this->alterado_em;
      $NM_val_form['removido_em'] = $this->removido_em;
      $NM_val_form['password'] = $this->password;
      $NM_val_form['data_ultimologin'] = $this->data_ultimologin;
      $NM_val_form['numtentativaslogin'] = $this->numtentativaslogin;
      if ($this->id_usuario == "")  
      { 
          $this->id_usuario = 0;
      } 
      if ($this->id_perfil == "")  
      { 
          $this->id_perfil = 0;
          $this->sc_force_zero[] = 'id_perfil';
      } 
      if ($this->id_ope == "")  
      { 
          $this->id_ope = 0;
          $this->sc_force_zero[] = 'id_ope';
      } 
      if ($this->contexto_id_ope == "")  
      { 
          $this->contexto_id_ope = 0;
          $this->sc_force_zero[] = 'contexto_id_ope';
      } 
      if ($this->nmgp_opcao == "alterar") 
      {
      }
      if ($this->criadopor == "")  
      { 
          $this->criadopor = 0;
          $this->sc_force_zero[] = 'criadopor';
      } 
      if ($this->diasinatividade == "")  
      { 
          $this->diasinatividade = 0;
          $this->sc_force_zero[] = 'diasinatividade';
      } 
      if ($this->numtentativaslogin == "")  
      { 
          $this->numtentativaslogin = 0;
          $this->sc_force_zero[] = 'numtentativaslogin';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql);
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->nom_username_before_qstr = $this->nom_username;
          $this->nom_username = substr($this->Db->qstr($this->nom_username), 1, -1); 
          if ($this->nom_username == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_username = "null"; 
              $NM_val_null[] = "nom_username";
          } 
          $this->password_before_qstr = $this->password;
          $this->password = substr($this->Db->qstr($this->password), 1, -1); 
          if ($this->password == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->password = "null"; 
              $NM_val_null[] = "password";
          } 
          $this->nom_nome_before_qstr = $this->nom_nome;
          $this->nom_nome = substr($this->Db->qstr($this->nom_nome), 1, -1); 
          if ($this->nom_nome == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_nome = "null"; 
              $NM_val_null[] = "nom_nome";
          } 
          if ($this->num_tipousuario == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_tipousuario = "null"; 
              $NM_val_null[] = "num_tipousuario";
          } 
          if ($this->contexto_tipo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->contexto_tipo = "null"; 
              $NM_val_null[] = "contexto_tipo";
          } 
          $this->end_numero_before_qstr = $this->end_numero;
          $this->end_numero = substr($this->Db->qstr($this->end_numero), 1, -1); 
          if ($this->end_numero == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_numero = "null"; 
              $NM_val_null[] = "end_numero";
          } 
          $this->num_totvs_before_qstr = $this->num_totvs;
          $this->num_totvs = substr($this->Db->qstr($this->num_totvs), 1, -1); 
          if ($this->num_totvs == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_totvs = "null"; 
              $NM_val_null[] = "num_totvs";
          } 
          if ($this->data_ultimologin == "")  
          { 
              $this->data_ultimologin = "null"; 
              $NM_val_null[] = "data_ultimologin";
          } 
          if ($this->nmgp_opcao == "alterar") 
          {
              if ($this->num_ativo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
              { 
                  $this->num_ativo = "null"; 
                  $NM_val_null[] = "num_ativo";
              } 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          { 
           $nm_tmp = nm_conv_img_access(substr($this->img_foto, 0, 12));
           if (substr($this->img_foto, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->img_foto = nm_conv_img_access($this->img_foto);
           } 
              if (!empty($this->img_foto) && $this->img_foto != 'null' && substr($this->img_foto, 0, 4) != "*nm*") 
              { 
                  $this->img_foto = "*nm*" . base64_encode($this->img_foto) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              if (!empty($this->img_foto) && $this->img_foto != 'null' && substr($this->img_foto, 0, 4) != "*nm*") 
              { 
                  $this->img_foto = "*nm*" . base64_encode($this->img_foto) ; 
              } 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              if (!empty($this->img_foto) && $this->img_foto != 'null' && substr($this->img_foto, 0, 4) != "*nm*") 
              { 
                  $this->img_foto = "*nm*" . base64_encode($this->img_foto) ; 
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
              if (!empty($this->img_foto) && $this->img_foto != 'null' && substr($this->img_foto, 0, 4) != "*nm*") 
              { 
                  $this->img_foto = "*nm*" . base64_encode($this->img_foto) ; 
              } 
          } 
          else
          { 
              $this->img_foto =  substr($this->Db->qstr($this->img_foto), 1, -1);
          } 
          if ($this->img_foto == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->img_foto = "null"; 
              $NM_val_null[] = "img_foto";
          } 
          $this->num_cpf_before_qstr = $this->num_cpf;
          $this->num_cpf = substr($this->Db->qstr($this->num_cpf), 1, -1); 
          if ($this->num_cpf == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_cpf = "null"; 
              $NM_val_null[] = "num_cpf";
          } 
          $this->num_rg_before_qstr = $this->num_rg;
          $this->num_rg = substr($this->Db->qstr($this->num_rg), 1, -1); 
          if ($this->num_rg == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_rg = "null"; 
              $NM_val_null[] = "num_rg";
          } 
          if ($this->data_nascimento == "")  
          { 
              $this->data_nascimento = "null"; 
              $NM_val_null[] = "data_nascimento";
          } 
          $this->nom_email1_before_qstr = $this->nom_email1;
          $this->nom_email1 = substr($this->Db->qstr($this->nom_email1), 1, -1); 
          if ($this->nom_email1 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_email1 = "null"; 
              $NM_val_null[] = "nom_email1";
          } 
          $this->nom_email2_before_qstr = $this->nom_email2;
          $this->nom_email2 = substr($this->Db->qstr($this->nom_email2), 1, -1); 
          if ($this->nom_email2 == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_email2 = "null"; 
              $NM_val_null[] = "nom_email2";
          } 
          $this->num_telefonecomercial_before_qstr = $this->num_telefonecomercial;
          $this->num_telefonecomercial = substr($this->Db->qstr($this->num_telefonecomercial), 1, -1); 
          if ($this->num_telefonecomercial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefonecomercial = "null"; 
              $NM_val_null[] = "num_telefonecomercial";
          } 
          $this->nom_telefoneresidencial_before_qstr = $this->nom_telefoneresidencial;
          $this->nom_telefoneresidencial = substr($this->Db->qstr($this->nom_telefoneresidencial), 1, -1); 
          if ($this->nom_telefoneresidencial == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nom_telefoneresidencial = "null"; 
              $NM_val_null[] = "nom_telefoneresidencial";
          } 
          $this->num_telefonecelular_before_qstr = $this->num_telefonecelular;
          $this->num_telefonecelular = substr($this->Db->qstr($this->num_telefonecelular), 1, -1); 
          if ($this->num_telefonecelular == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->num_telefonecelular = "null"; 
              $NM_val_null[] = "num_telefonecelular";
          } 
          $this->end_logradouro_before_qstr = $this->end_logradouro;
          $this->end_logradouro = substr($this->Db->qstr($this->end_logradouro), 1, -1); 
          if ($this->end_logradouro == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->end_logradouro = "null"; 
              $NM_val_null[] = "end_logradouro";
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
          $this->cargo_before_qstr = $this->cargo;
          $this->cargo = substr($this->Db->qstr($this->cargo), 1, -1); 
          if ($this->cargo == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cargo = "null"; 
              $NM_val_null[] = "cargo";
          } 
          $this->departamento_before_qstr = $this->departamento;
          $this->departamento = substr($this->Db->qstr($this->departamento), 1, -1); 
          if ($this->departamento == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->departamento = "null"; 
              $NM_val_null[] = "departamento";
          } 
          if ($this->criado_em == "")  
          { 
              $this->criado_em = "null"; 
              $NM_val_null[] = "criado_em";
          } 
          if ($this->alterado_em == "")  
          { 
              $this->alterado_em = "null"; 
              $NM_val_null[] = "alterado_em";
          } 
          if ($this->removido_em == "")  
          { 
              $this->removido_em = "null"; 
              $NM_val_null[] = "removido_em";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_ex_update = true; 
          $SC_ex_upd_or = true; 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key'] as $sFKName => $sFKValue)
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
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario ";
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_CadastroDeUsuarios_mob_pack_ajax_response();
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
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = #$this->data_nascimento#, Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = #$this->criado_em#, Alterado_em = #$this->alterado_em#, Removido_em = #$this->removido_em#, DiasInatividade = $this->diasinatividade";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Alterado_em = " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", Removido_em = " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", DiasInatividade = $this->diasinatividade";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Alterado_em = " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", Removido_em = " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", DiasInatividade = $this->diasinatividade";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = EXTEND('$this->data_nascimento', YEAR TO DAY), Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = EXTEND('$this->criado_em', YEAR TO FRACTION), Alterado_em = EXTEND('$this->alterado_em', YEAR TO FRACTION), Removido_em = EXTEND('$this->removido_em', YEAR TO FRACTION), DiasInatividade = $this->diasinatividade";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Alterado_em = " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", Removido_em = " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", DiasInatividade = $this->diasinatividade";  
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando_oracle = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Alterado_em = " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", Removido_em = " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", DiasInatividade = $this->diasinatividade";  
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET Nom_UserName = '$this->nom_username', Nom_Nome = '$this->nom_nome', Num_TipoUsuario = '$this->num_tipousuario', ID_Perfil = $this->id_perfil, ID_OPE = $this->id_ope, Contexto_Tipo = '$this->contexto_tipo', Contexto_ID_OPE = $this->contexto_id_ope, End_Numero = '$this->end_numero', Num_TOTVS = '$this->num_totvs', Num_Ativo = '$this->num_ativo', Num_CPF = '$this->num_cpf', Num_RG = '$this->num_rg', Data_Nascimento = " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", Nom_Email1 = '$this->nom_email1', Nom_Email2 = '$this->nom_email2', Num_TelefoneComercial = '$this->num_telefonecomercial', Nom_TelefoneResidencial = '$this->nom_telefoneresidencial', Num_TelefoneCelular = '$this->num_telefonecelular', End_Logradouro = '$this->end_logradouro', End_Complemento = '$this->end_complemento', End_Bairro = '$this->end_bairro', End_Cidade = '$this->end_cidade', End_UF = '$this->end_uf', End_CEP = '$this->end_cep', CriadoPor = $this->criadopor, Cargo = '$this->cargo', Departamento = '$this->departamento', Criado_em = " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", Alterado_em = " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", Removido_em = " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", DiasInatividade = $this->diasinatividade";  
              } 
              if (isset($NM_val_form['password']) && $NM_val_form['password'] != $this->nmgp_dados_select['password']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " password = '$this->password'"; 
                  $comando_oracle        .= " password = '$this->password'"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['data_ultimologin']) && $NM_val_form['data_ultimologin'] != $this->nmgp_dados_select['data_ultimologin']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $comando        .= " Data_UltimoLogin = #$this->data_ultimologin#"; 
                  } 
                  else 
                  { 
                      $comando        .= " Data_UltimoLogin = " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ""; 
                  } 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $comando_oracle        .= " Data_UltimoLogin = EXTEND('" . $this->data_ultimologin . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $comando_oracle        .= " Data_UltimoLogin = " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ""; 
                  } 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              if (isset($NM_val_form['numtentativaslogin']) && $NM_val_form['numtentativaslogin'] != $this->nmgp_dados_select['numtentativaslogin']) 
              { 
                  if ($SC_ex_update || $SC_tem_cmp_update) 
                  { 
                      $comando        .= ","; 
                      $comando_oracle .= ","; 
                  } 
                  $comando        .= " NumTentativasLogin = $this->numtentativaslogin"; 
                  $comando_oracle        .= " NumTentativasLogin = $this->numtentativaslogin"; 
                  $SC_ex_update = true; 
                  $SC_ex_upd_or = true; 
              } 
              $aDoNotUpdate = array();
              $temp_cmd_sql = "";
              if ($this->img_foto_limpa == "S") 
              { 
                  if ($this->img_foto != "null") 
                  { 
                      $this->img_foto = ''; 
                  } 
                  if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                  { 
                      $temp_cmd_sql .= ", IMG_Foto = '" . $this->img_foto . "'"; 
                  } 
                  else 
                  { 
                     $temp_cmd_sql .= " IMG_Foto = '" . $this->img_foto . "'"; 
                     $SC_ex_update = true; 
                  } 
                  $this->img_foto = "";
              } 
              else 
              { 
                  if ($this->img_foto != "none" && $this->img_foto != "") 
                  { 
                      $NM_conteudo =  $this->img_foto;
                      if ($SC_ex_update || $SC_tem_cmp_update || $SC_ex_upd_or) 
                      { 
                          $temp_cmd_sql .= ", IMG_Foto = '$NM_conteudo'" ; 
                      } 
                      else 
                      { 
                          $temp_cmd_sql .= " IMG_Foto = '$NM_conteudo'" ; 
                          $SC_ex_update = true; 
                      } 
                  } 
                  else
                  {
                      $aDoNotUpdate[] = "img_foto";
                  }
              } 
              if (!empty($temp_cmd_sql)) 
              { 
                  $comando .= $temp_cmd_sql;
              } 
              if ($this->img_foto_limpa == "S" || ($this->img_foto != "none" && $this->img_foto != "")) 
              { 
                  if ($SC_ex_upd_or) 
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= ", IMG_Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= ", IMG_Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= ", IMG_Foto = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= ", IMG_Foto = empty_blob()"; 
                      } 
                  } 
                  else 
                  { 
                      $SC_ex_upd_or = true; 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase)) 
                      { 
                          $comando_oracle .= " IMG_Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql)) 
                      { 
                          $comando_oracle .= " IMG_Foto = ''"; 
                      } 
                      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                      { 
                          $comando_oracle .= " IMG_Foto = null"; 
                      } 
                      else 
                      { 
                          $comando_oracle .= " IMG_Foto = empty_blob()"; 
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
                  $comando .= " WHERE ID_Usuario = $this->id_usuario ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE ID_Usuario = $this->id_usuario ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE ID_Usuario = $this->id_usuario ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE ID_Usuario = $this->id_usuario ";  
              }  
              else  
              {
                  $comando .= " WHERE ID_Usuario = $this->id_usuario ";  
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
                                  form_CadastroDeUsuarios_mob_pack_ajax_response();
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
                  if ($this->img_foto_limpa == "S" && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) && !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix)) 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"IMG_Foto\", \"\",  \"ID_Usuario = $this->id_usuario\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "IMG_Foto", "",  "ID_Usuario = $this->id_usuario"); 
                  } 
                  else 
                  { 
                      if ($this->img_foto != "none" && $this->img_foto != "") 
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob($this->Ini->nm_tabela, \"IMG_Foto\", $this->img_foto,  \"ID_Usuario = $this->id_usuario\")"; 
                          $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "IMG_Foto", $this->img_foto,  "ID_Usuario = $this->id_usuario"); 
                      } 
                  } 
                  if ($rs === false) 
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_CadastroDeUsuarios_mob_pack_ajax_response();
                      }
                      exit;  
                  }   
              }   
              if ($this->img_foto_limpa == "S")
              {
                  $this->NM_ajax_info['fldList']['img_foto_salva'] = array(
                      'row'     => '',
                      'type'    => 'text',
                      'valList' => array(''),
                  );
              }
          $this->nom_username = $this->nom_username_before_qstr;
          $this->password = $this->password_before_qstr;
          $this->nom_nome = $this->nom_nome_before_qstr;
          $this->end_numero = $this->end_numero_before_qstr;
          $this->num_totvs = $this->num_totvs_before_qstr;
          $this->num_cpf = $this->num_cpf_before_qstr;
          $this->num_rg = $this->num_rg_before_qstr;
          $this->nom_email1 = $this->nom_email1_before_qstr;
          $this->nom_email2 = $this->nom_email2_before_qstr;
          $this->num_telefonecomercial = $this->num_telefonecomercial_before_qstr;
          $this->nom_telefoneresidencial = $this->nom_telefoneresidencial_before_qstr;
          $this->num_telefonecelular = $this->num_telefonecelular_before_qstr;
          $this->end_logradouro = $this->end_logradouro_before_qstr;
          $this->end_complemento = $this->end_complemento_before_qstr;
          $this->end_bairro = $this->end_bairro_before_qstr;
          $this->end_cidade = $this->end_cidade_before_qstr;
          $this->end_uf = $this->end_uf_before_qstr;
          $this->end_cep = $this->end_cep_before_qstr;
          $this->cargo = $this->cargo_before_qstr;
          $this->departamento = $this->departamento_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id_usuario'])) { $this->id_usuario = $NM_val_form['id_usuario']; }
              elseif (isset($this->id_usuario)) { $this->nm_limpa_alfa($this->id_usuario); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_username'])) { $this->nom_username = $NM_val_form['nom_username']; }
              elseif (isset($this->nom_username)) { $this->nm_limpa_alfa($this->nom_username); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_nome'])) { $this->nom_nome = $NM_val_form['nom_nome']; }
              elseif (isset($this->nom_nome)) { $this->nm_limpa_alfa($this->nom_nome); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_perfil'])) { $this->id_perfil = $NM_val_form['id_perfil']; }
              elseif (isset($this->id_perfil)) { $this->nm_limpa_alfa($this->id_perfil); }
              if     (isset($NM_val_form) && isset($NM_val_form['id_ope'])) { $this->id_ope = $NM_val_form['id_ope']; }
              elseif (isset($this->id_ope)) { $this->nm_limpa_alfa($this->id_ope); }
              if     (isset($NM_val_form) && isset($NM_val_form['contexto_id_ope'])) { $this->contexto_id_ope = $NM_val_form['contexto_id_ope']; }
              elseif (isset($this->contexto_id_ope)) { $this->nm_limpa_alfa($this->contexto_id_ope); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_numero'])) { $this->end_numero = $NM_val_form['end_numero']; }
              elseif (isset($this->end_numero)) { $this->nm_limpa_alfa($this->end_numero); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_totvs'])) { $this->num_totvs = $NM_val_form['num_totvs']; }
              elseif (isset($this->num_totvs)) { $this->nm_limpa_alfa($this->num_totvs); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_cpf'])) { $this->num_cpf = $NM_val_form['num_cpf']; }
              elseif (isset($this->num_cpf)) { $this->nm_limpa_alfa($this->num_cpf); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_rg'])) { $this->num_rg = $NM_val_form['num_rg']; }
              elseif (isset($this->num_rg)) { $this->nm_limpa_alfa($this->num_rg); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_email1'])) { $this->nom_email1 = $NM_val_form['nom_email1']; }
              elseif (isset($this->nom_email1)) { $this->nm_limpa_alfa($this->nom_email1); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_email2'])) { $this->nom_email2 = $NM_val_form['nom_email2']; }
              elseif (isset($this->nom_email2)) { $this->nm_limpa_alfa($this->nom_email2); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefonecomercial'])) { $this->num_telefonecomercial = $NM_val_form['num_telefonecomercial']; }
              elseif (isset($this->num_telefonecomercial)) { $this->nm_limpa_alfa($this->num_telefonecomercial); }
              if     (isset($NM_val_form) && isset($NM_val_form['nom_telefoneresidencial'])) { $this->nom_telefoneresidencial = $NM_val_form['nom_telefoneresidencial']; }
              elseif (isset($this->nom_telefoneresidencial)) { $this->nm_limpa_alfa($this->nom_telefoneresidencial); }
              if     (isset($NM_val_form) && isset($NM_val_form['num_telefonecelular'])) { $this->num_telefonecelular = $NM_val_form['num_telefonecelular']; }
              elseif (isset($this->num_telefonecelular)) { $this->nm_limpa_alfa($this->num_telefonecelular); }
              if     (isset($NM_val_form) && isset($NM_val_form['end_logradouro'])) { $this->end_logradouro = $NM_val_form['end_logradouro']; }
              elseif (isset($this->end_logradouro)) { $this->nm_limpa_alfa($this->end_logradouro); }
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
              if     (isset($NM_val_form) && isset($NM_val_form['criadopor'])) { $this->criadopor = $NM_val_form['criadopor']; }
              elseif (isset($this->criadopor)) { $this->nm_limpa_alfa($this->criadopor); }
              if     (isset($NM_val_form) && isset($NM_val_form['cargo'])) { $this->cargo = $NM_val_form['cargo']; }
              elseif (isset($this->cargo)) { $this->nm_limpa_alfa($this->cargo); }
              if     (isset($NM_val_form) && isset($NM_val_form['departamento'])) { $this->departamento = $NM_val_form['departamento']; }
              elseif (isset($this->departamento)) { $this->nm_limpa_alfa($this->departamento); }
              if     (isset($NM_val_form) && isset($NM_val_form['diasinatividade'])) { $this->diasinatividade = $NM_val_form['diasinatividade']; }
              elseif (isset($this->diasinatividade)) { $this->nm_limpa_alfa($this->diasinatividade); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('id_usuario', 'nom_username', 'pass', 'pass_confirm', 'diasinatividade', 'num_ativo', 'num_totvs', 'num_tipousuario', 'operadora', 'prestadora', 'empreendimento', 'id_perfil', 'id_ope', 'img_foto', 'nom_nome', 'num_cpf', 'num_rg', 'cargo', 'departamento', 'data_nascimento', 'nom_email1', 'nom_email2', 'num_telefonecomercial', 'nom_telefoneresidencial', 'num_telefonecelular', 'end_cep', 'end_logradouro', 'end_complemento', 'end_numero', 'end_bairro', 'end_cidade', 'end_uf', 'agendadatajson', 'savedataonclick', 'removeronclick', 'gbttecempreendimentos', 'contexto_tipo', 'contexto_id_ope', 'criadopor', 'criado_em', 'alterado_em', 'removido_em'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
          $sc_campos_sel_look  = array();
          $sc_campos_form_look = array();
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Usuario, ID_Empreendimento from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Usuario, ID_Empreendimento from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select \"ID\", \"ID_Usuario\", \"ID_Empreendimento\" from tb_gbtecempreendimentos where \"ID_Usuario\" = $this->id_usuario"; 
          }  
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Usuario, ID_Empreendimento from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
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
              $sc_campos_sel_look[$sc_ind]['ID_Usuario'] = $rss->fields[1];
              $sc_campos_sel_look[$sc_ind]['ID_Empreendimento'] = $rss->fields[2];
              $sc_ind++; 
              $rss->MoveNext() ; 
          } 
          $rss->Close(); 
          $todo_gbttecempreendimentos = explode("@?@", $this->gbttecempreendimentos); 
          if (!empty($todo_gbttecempreendimentos))  
          { 
              $sc_ind = 0; 
              foreach ($todo_gbttecempreendimentos as $gbttecempreendimentosx) 
              {
                  if (!empty($gbttecempreendimentosx))  
                  { 
                      $sc_campos_form_look[$sc_ind] = array();
                      $sc_campos_form_look[$sc_ind]['id_usuario'] = $this->id_usuario;
                      $sc_campos_form_look[$sc_ind]['gbttecempreendimentos'] = $gbttecempreendimentosx;
                 } 
                 $sc_ind++; 
              } 
         } 
         foreach ($sc_campos_form_look as $sc_ind_form => $sc_campos_form) 
         { 
             foreach ($sc_campos_sel_look as $sc_ind_sel => $sc_campos_sel) 
             { 
                 if ($sc_campos_form['id_usuario'] == $sc_campos_sel['ID_Usuario'] && $sc_campos_form['gbttecempreendimentos'] == $sc_campos_sel['ID_Empreendimento'])
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
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_gbtecempreendimentos where \"ID_Usuario\" = " . $sc_campos_sel['ID_Usuario'] . " and \"ID_Empreendimento\" = '" . $sc_campos_sel['ID_Empreendimento'] . "'"; 
              } 
              else 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_gbtecempreendimentos where ID_Usuario = " . $sc_campos_sel['ID_Usuario'] . " and ID_Empreendimento = '" . $sc_campos_sel['ID_Empreendimento'] . "'"; 
              } 
              $rdel = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
              if ($rdel === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastroDeUsuarios_mob_pack_ajax_response();
                  }
                  exit; 
              } 
              $rdel->Close(); 
         }
         foreach ($sc_campos_form_look as $sc_ind_form => $sc_campos_form) 
         { 
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
             { 
                 $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_gbtecempreendimentos (\"ID_Usuario\", \"ID_Empreendimento\") values (" . $sc_campos_form['id_usuario']. ", '" . $sc_campos_form['gbttecempreendimentos'] . "')"; 
             } 
             else 
             { 
                 $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_gbtecempreendimentos (ID_Usuario, ID_Empreendimento) values (" . $sc_campos_form['id_usuario']. ", '" . $sc_campos_form['gbttecempreendimentos'] . "')"; 
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
                         form_CadastroDeUsuarios_mob_pack_ajax_response();
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
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key'] as $sFKName => $sFKValue)
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
              $NM_cmp_auto = "ID_Usuario, ";
          } 
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['hticnsdata']['erro_handler']) && $_SESSION['hticnsdata']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastroDeUsuarios_mob_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              $_test_file = $this->fetchUniqueUploadName($this->img_foto_scfile_name, $dir_file, "img_foto");
              if (trim($this->img_foto_scfile_name) != $_test_file)
              {
                  $this->img_foto_scfile_name = $_test_file;
                  $this->img_foto = $_test_file;
              }
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES ('$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', #$this->data_ultimologin#, '$this->img_foto', '$this->num_cpf', '$this->num_rg', #$this->data_nascimento#, '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', #$this->criado_em#, #$this->alterado_em#, #$this->removido_em#, $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES ('$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ", '$this->img_foto', '$this->num_cpf', '$this->num_rg', " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES (" . $NM_seq_auto . "'$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ", EMPTY_BLOB(), '$this->num_cpf', '$this->num_rg', " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES (" . $NM_seq_auto . "'$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', EXTEND('$this->data_ultimologin', YEAR TO FRACTION), null, '$this->num_cpf', '$this->num_rg', EXTEND('$this->data_nascimento', YEAR TO DAY), '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', EXTEND('$this->criado_em', YEAR TO FRACTION), EXTEND('$this->alterado_em', YEAR TO FRACTION), EXTEND('$this->removido_em', YEAR TO FRACTION), $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES (" . $NM_seq_auto . "'$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ", '', '$this->num_cpf', '$this->num_rg', " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES (" . $NM_seq_auto . "'$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ", '', '$this->num_cpf', '$this->num_rg', " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
              }
              else
              {
                  $compl_insert     = ""; 
                  $compl_insert_val = ""; 
                  if ($this->num_ativo != "")
                  { 
                       $compl_insert     .= ", Num_Ativo";
                       $compl_insert_val .= ", '$this->num_ativo'";
                  } 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin $compl_insert) VALUES (" . $NM_seq_auto . "'$this->nom_username', '$this->password', '$this->nom_nome', '$this->num_tipousuario', $this->id_perfil, $this->id_ope, '$this->contexto_tipo', $this->contexto_id_ope, '$this->end_numero', '$this->num_totvs', " . $this->Ini->date_delim . $this->data_ultimologin . $this->Ini->date_delim1 . ", '$this->img_foto', '$this->num_cpf', '$this->num_rg', " . $this->Ini->date_delim . $this->data_nascimento . $this->Ini->date_delim1 . ", '$this->nom_email1', '$this->nom_email2', '$this->num_telefonecomercial', '$this->nom_telefoneresidencial', '$this->num_telefonecelular', '$this->end_logradouro', '$this->end_complemento', '$this->end_bairro', '$this->end_cidade', '$this->end_uf', '$this->end_cep', $this->criadopor, '$this->cargo', '$this->departamento', " . $this->Ini->date_delim . $this->criado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->alterado_em . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->removido_em . $this->Ini->date_delim1 . ", $this->diasinatividade, $this->numtentativaslogin $compl_insert_val)"; 
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
                              form_CadastroDeUsuarios_mob_pack_ajax_response();
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
                          form_CadastroDeUsuarios_mob_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id_usuario =  $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
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
                  $this->id_usuario = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql)) 
              { 
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
                  if (trim($this->img_foto ) != "") 
                  { 
                      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "UpdateBlob(" . $this->Ini->nm_tabela . ",  IMG_Foto , $this->img_foto,  \"ID_Usuario = $this->id_usuario\")"; 
                      $rs = $this->Db->UpdateBlob($this->Ini->nm_tabela, "IMG_Foto", $this->img_foto,  "ID_Usuario = $this->id_usuario"); 
                      if ($rs === false)  
                      { 
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $this->Db->ErrorMsg()); 
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_CadastroDeUsuarios_mob_pack_ajax_response();
                          }
                          exit; 
                      }  
                  }  
              }  
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']);
              }

              $this->sc_evento = "insert"; 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao = "novo"; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "R")
              { 
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['return_edit'] = "new";
              } 
              }
              $this->nm_flag_iframe = true;
          } 
          $todo_gbttecempreendimentos = explode("@?@", $this->gbttecempreendimentos); 
          if ($bInsertOk && !empty($todo_gbttecempreendimentos))  
          { 
              foreach ($todo_gbttecempreendimentos as $gbttecempreendimentosx) 
              {
                  if (!empty($gbttecempreendimentosx))  
                  { 
                      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_gbtecempreendimentos (\"ID_Usuario\", \"ID_Empreendimento\") values ($this->id_usuario, '$gbttecempreendimentosx')"; 
                      } 
                      else 
                      { 
                          $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "insert into tb_gbtecempreendimentos (ID_Usuario, ID_Empreendimento) values ($this->id_usuario, '$gbttecempreendimentosx')"; 
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
                                  form_CadastroDeUsuarios_mob_pack_ajax_response();
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
          $this->id_usuario = substr($this->Db->qstr($this->id_usuario), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
          }  
          else  
          {
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario"; 
              $rs1 = $this->Db->Execute("select count(*) from " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
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
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_gbtecempreendimentos where \"ID_Usuario\" = $this->id_usuario"; 
              } 
              else 
              { 
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "delete from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
              } 
              $rse = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
              if ($rse === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg()); 
                  $this->NM_rollback_db(); 
                  if ($this->NM_ajax_flag)
                  {
                      form_CadastroDeUsuarios_mob_pack_ajax_response();
                  }
                  exit; 
              } 
              $rse->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
              }  
              else  
              {
                  $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where ID_Usuario = $this->id_usuario "); 
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
                          form_CadastroDeUsuarios_mob_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start']--; 
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start'] = 0; 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']);
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
        $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
if (!isset($this->sc_temp_grid_ID_Usuario)) {$this->sc_temp_grid_ID_Usuario = (isset($_SESSION['grid_ID_Usuario'])) ? $_SESSION['grid_ID_Usuario'] : "";}
           sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);

if ($this->id_usuario ) {
	$grid_ID_Usuario = $this->id_usuario ;
	 if (isset($grid_ID_Usuario)) {$this->sc_temp_grid_ID_Usuario = $grid_ID_Usuario;}
;
	
	$modelLogs->insert([
		"Modulo" => "USUARIO",
		"Funcao" => "CRIAR",
		"Descricao" => 'Cadastro de usuário',
		"Conteudo" => $modelLogs->getConteudo()
	]);
}

$s->setIUDState($this, "I", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_grid_ID_Usuario)) { $_SESSION['grid_ID_Usuario'] = $this->sc_temp_grid_ID_Usuario;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('form_CadastroDeUsuarios') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
if (isset($this->sc_temp_grid_ID_Usuario)) { $_SESSION['grid_ID_Usuario'] = $this->sc_temp_grid_ID_Usuario;}
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
    }
    if ("update" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$s = new manageSession(true);
$modelLogs = new Logs($this);

$loginUserID_Usuario = $s->get('ID_Usuario');
 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nm_select = "SELECT * FROM tb_usuarios WHERE ID_Usuario = '$this->id_usuario'"; 
      }
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_select = "SELECT * FROM tb_usuarios WHERE ID_Usuario = '$this->id_usuario'"; 
      }
      else
      { 
          $nm_select = "SELECT * FROM tb_usuarios WHERE ID_Usuario = '$this->id_usuario'"; 
      }
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_usuario != "")
     { 
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 $rx->fields[0] = str_replace(',', '.', $rx->fields[0]);
                 $rx->fields[5] = str_replace(',', '.', $rx->fields[5]);
                 $rx->fields[6] = str_replace(',', '.', $rx->fields[6]);
                 $rx->fields[8] = str_replace(',', '.', $rx->fields[8]);
                 $rx->fields[28] = str_replace(',', '.', $rx->fields[28]);
                 $rx->fields[34] = str_replace(',', '.', $rx->fields[34]);
                 $rx->fields[35] = str_replace(',', '.', $rx->fields[35]);
                 $rx->fields[0] = (strpos(strtolower($rx->fields[0]), "e")) ? (float)$rx->fields[0] : $rx->fields[0];
                 $rx->fields[0] = (string)$rx->fields[0];
                 $rx->fields[5] = (strpos(strtolower($rx->fields[5]), "e")) ? (float)$rx->fields[5] : $rx->fields[5];
                 $rx->fields[5] = (string)$rx->fields[5];
                 $rx->fields[6] = (strpos(strtolower($rx->fields[6]), "e")) ? (float)$rx->fields[6] : $rx->fields[6];
                 $rx->fields[6] = (string)$rx->fields[6];
                 $rx->fields[8] = (strpos(strtolower($rx->fields[8]), "e")) ? (float)$rx->fields[8] : $rx->fields[8];
                 $rx->fields[8] = (string)$rx->fields[8];
                 $rx->fields[28] = (strpos(strtolower($rx->fields[28]), "e")) ? (float)$rx->fields[28] : $rx->fields[28];
                 $rx->fields[28] = (string)$rx->fields[28];
                 $rx->fields[34] = (strpos(strtolower($rx->fields[34]), "e")) ? (float)$rx->fields[34] : $rx->fields[34];
                 $rx->fields[34] = (string)$rx->fields[34];
                 $rx->fields[35] = (strpos(strtolower($rx->fields[35]), "e")) ? (float)$rx->fields[35] : $rx->fields[35];
                 $rx->fields[35] = (string)$rx->fields[35];
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

if (isset($this->rs[0][0]) && $loginUserID_Usuario && $loginUserID_Usuario == $this->rs[0][0]) {
	 
      $nm_select = "SELECT b.Nom_Modulo, b.Nom_Funcao, a.Valor, b.Atributos FROM tb_perfilpermissoes a
			INNER JOIN tb_permissoes b ON b.ID = a.ID_Permissoes AND a.ID_Perfil = '".$this->rs[0][5]."'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->profile = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                      $this->profile[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->profile = false;
          $this->profile_erro = $this->Db->ErrorMsg();
      } 
;
	
	$s->set($this->rs[0]);
	$s->setPermissionProfile($this->profile);
}

$modelLogs->insert([
	"Modulo" => "USUARIO",
	"Funcao" => "EDITAR",
	"Descricao" => 'Edição de usuário',
	"Conteudo" => $modelLogs->getConteudo()
]);
	
$this->sc_ajax_javascript('toastr.success', array('',  $this->Ini->Nm_lang['lang_label_updSuccess'] ));
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
    }
    if ("delete" == $this->sc_evento && $this->nmgp_opcao != "nada") {
      $_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
sc_include_library("sys", "models", "Logs.php");
$modelLogs = new Logs($this);
$modelLogs->insert([
	"Modulo" => "USUARIO",
	"Funcao" => "DELETAR",
	"Descricao" => 'Remoção de usuário',
	"Conteudo" => $modelLogs->getConteudo()
]);

$s->setIUDState("grid_ConsultadeUsuarios", "I", "success");
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultadeUsuarios') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off'; 
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['parms'] = "id_usuario?#?$this->id_usuario?@?"; 
      }
      $this->nmgp_dados_form['img_foto'] = ""; 
      $this->img_foto_limpa = ""; 
      $this->img_foto_salva = ""; 
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id_usuario = substr($this->Db->qstr($this->id_usuario), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter'] . ")";
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
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT ID_Usuario, Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, str_replace (convert(char(10),Data_UltimoLogin,102), '.', '-') + ' ' + convert(char(8),Data_UltimoLogin,20), Num_Ativo, IMG_Foto, Num_CPF, Num_RG, str_replace (convert(char(10),Data_Nascimento,102), '.', '-') + ' ' + convert(char(8),Data_Nascimento,20), Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, str_replace (convert(char(10),Criado_em,102), '.', '-') + ' ' + convert(char(8),Criado_em,20), str_replace (convert(char(10),Alterado_em,102), '.', '-') + ' ' + convert(char(8),Alterado_em,20), str_replace (convert(char(10),Removido_em,102), '.', '-') + ' ' + convert(char(8),Removido_em,20), DiasInatividade, NumTentativasLogin from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT ID_Usuario, Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, convert(char(23),Data_UltimoLogin,121), Num_Ativo, IMG_Foto, Num_CPF, Num_RG, convert(char(23),Data_Nascimento,121), Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, convert(char(23),Criado_em,121), convert(char(23),Alterado_em,121), convert(char(23),Removido_em,121), DiasInatividade, NumTentativasLogin from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT ID_Usuario, Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, Num_Ativo, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT ID_Usuario, Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, EXTEND(Data_UltimoLogin, YEAR TO FRACTION), Num_Ativo, LOTOFILE(IMG_Foto, '" . $this->Ini->root . $this->Ini->path_imag_temp . "/sc_blob_IMG_Foto', 'client'), Num_CPF, Num_RG, EXTEND(Data_Nascimento, YEAR TO DAY), Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, EXTEND(Criado_em, YEAR TO FRACTION), EXTEND(Alterado_em, YEAR TO FRACTION), EXTEND(Removido_em, YEAR TO FRACTION), DiasInatividade, NumTentativasLogin from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT ID_Usuario, Nom_UserName, password, Nom_Nome, Num_TipoUsuario, ID_Perfil, ID_OPE, Contexto_Tipo, Contexto_ID_OPE, End_Numero, Num_TOTVS, Data_UltimoLogin, Num_Ativo, IMG_Foto, Num_CPF, Num_RG, Data_Nascimento, Nom_Email1, Nom_Email2, Num_TelefoneComercial, Nom_TelefoneResidencial, Num_TelefoneCelular, End_Logradouro, End_Complemento, End_Bairro, End_Cidade, End_UF, End_CEP, CriadoPor, Cargo, Departamento, Criado_em, Alterado_em, Removido_em, DiasInatividade, NumTentativasLogin from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = "ID_Usuario = '" . $_SESSION['grid_ID_Usuario'] . "'";
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (!empty($sc_where))
              {
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  {
                     $aWhere[] = "ID_Usuario = $this->id_usuario"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
                  {
                     $aWhere[] = "ID_Usuario = $this->id_usuario"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
                  {
                     $aWhere[] = "ID_Usuario = $this->id_usuario"; 
                  }  
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  {
                     $aWhere[] = "ID_Usuario = $this->id_usuario"; 
                  }  
                  else  
                  {
                     $aWhere[] = "ID_Usuario = $this->id_usuario"; 
                  }
              } 
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "ID_Usuario";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['select'] = ""; 
              } 
          } 
          if ($this->nmgp_opcao == "igual") 
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start']) ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "SelectLimit($nmgp_select, 1, " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start'] . ")" ; 
              $rs = $this->Db->SelectLimit($nmgp_select, 1, $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start']) ; 
          } 
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
              $rs = $this->Db->Execute($nmgp_select) ; 
              if (!$rs === false && !$rs->EOF) 
              { 
                  $rs->Move($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start']) ;  
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
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['voltarGrid'] = $this->nmgp_botoes['voltarGrid'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['confimeRemover'] = $this->nmgp_botoes['confimeRemover'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter'] = true;
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
              $this->NM_ajax_info['buttonDisplay']['voltarGrid'] = $this->nmgp_botoes['voltarGrid'] = "on";
              $this->NM_ajax_info['buttonDisplay']['salvar'] = $this->nmgp_botoes['salvar'] = "on";
              $this->NM_ajax_info['buttonDisplay']['confimeRemover'] = $this->nmgp_botoes['confimeRemover'] = "off";
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
              $this->id_usuario = $rs->fields[0] ; 
              $this->nmgp_dados_select['id_usuario'] = $this->id_usuario;
              $this->nom_username = $rs->fields[1] ; 
              $this->nmgp_dados_select['nom_username'] = $this->nom_username;
              $this->password = $rs->fields[2] ; 
              $this->nmgp_dados_select['password'] = $this->password;
              $this->nom_nome = $rs->fields[3] ; 
              $this->nmgp_dados_select['nom_nome'] = $this->nom_nome;
              $this->num_tipousuario = $rs->fields[4] ; 
              $this->nmgp_dados_select['num_tipousuario'] = $this->num_tipousuario;
              $this->id_perfil = $rs->fields[5] ; 
              $this->nmgp_dados_select['id_perfil'] = $this->id_perfil;
              $this->id_ope = $rs->fields[6] ; 
              $this->nmgp_dados_select['id_ope'] = $this->id_ope;
              $this->contexto_tipo = $rs->fields[7] ; 
              $this->nmgp_dados_select['contexto_tipo'] = $this->contexto_tipo;
              $this->contexto_id_ope = $rs->fields[8] ; 
              $this->nmgp_dados_select['contexto_id_ope'] = $this->contexto_id_ope;
              $this->end_numero = $rs->fields[9] ; 
              $this->nmgp_dados_select['end_numero'] = $this->end_numero;
              $this->num_totvs = $rs->fields[10] ; 
              $this->nmgp_dados_select['num_totvs'] = $this->num_totvs;
              $this->data_ultimologin = $rs->fields[11] ; 
              if (substr($this->data_ultimologin, 10, 1) == "-") 
              { 
                 $this->data_ultimologin = substr($this->data_ultimologin, 0, 10) . " " . substr($this->data_ultimologin, 11);
              } 
              if (substr($this->data_ultimologin, 13, 1) == ".") 
              { 
                 $this->data_ultimologin = substr($this->data_ultimologin, 0, 13) . ":" . substr($this->data_ultimologin, 14, 2) . ":" . substr($this->data_ultimologin, 17);
              } 
              $this->nmgp_dados_select['data_ultimologin'] = $this->data_ultimologin;
              $this->num_ativo = $rs->fields[12] ; 
              $this->nmgp_dados_select['num_ativo'] = $this->num_ativo;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $this->img_foto = $this->Db->BlobDecode($rs->fields[13]) ; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  if(isset($rs->fields[13]) && !empty($rs->fields[13]) && is_file($rs->fields[13])) 
                  { 
                     $this->img_foto = file_get_contents($rs->fields[13]);
                  }else 
                  { 
                     $this->img_foto = ''; 
                  } 
              } 
              else
              { 
                  $this->img_foto = $rs->fields[13] ; 
              } 
              $this->nmgp_dados_select['img_foto'] = $this->img_foto;
              $this->num_cpf = $rs->fields[14] ; 
              $this->nmgp_dados_select['num_cpf'] = $this->num_cpf;
              $this->num_rg = $rs->fields[15] ; 
              $this->nmgp_dados_select['num_rg'] = $this->num_rg;
              $this->data_nascimento = $rs->fields[16] ; 
              $this->nmgp_dados_select['data_nascimento'] = $this->data_nascimento;
              $this->nom_email1 = $rs->fields[17] ; 
              $this->nmgp_dados_select['nom_email1'] = $this->nom_email1;
              $this->nom_email2 = $rs->fields[18] ; 
              $this->nmgp_dados_select['nom_email2'] = $this->nom_email2;
              $this->num_telefonecomercial = $rs->fields[19] ; 
              $this->nmgp_dados_select['num_telefonecomercial'] = $this->num_telefonecomercial;
              $this->nom_telefoneresidencial = $rs->fields[20] ; 
              $this->nmgp_dados_select['nom_telefoneresidencial'] = $this->nom_telefoneresidencial;
              $this->num_telefonecelular = $rs->fields[21] ; 
              $this->nmgp_dados_select['num_telefonecelular'] = $this->num_telefonecelular;
              $this->end_logradouro = $rs->fields[22] ; 
              $this->nmgp_dados_select['end_logradouro'] = $this->end_logradouro;
              $this->end_complemento = $rs->fields[23] ; 
              $this->nmgp_dados_select['end_complemento'] = $this->end_complemento;
              $this->end_bairro = $rs->fields[24] ; 
              $this->nmgp_dados_select['end_bairro'] = $this->end_bairro;
              $this->end_cidade = $rs->fields[25] ; 
              $this->nmgp_dados_select['end_cidade'] = $this->end_cidade;
              $this->end_uf = $rs->fields[26] ; 
              $this->nmgp_dados_select['end_uf'] = $this->end_uf;
              $this->end_cep = $rs->fields[27] ; 
              $this->nmgp_dados_select['end_cep'] = $this->end_cep;
              $this->criadopor = $rs->fields[28] ; 
              $this->nmgp_dados_select['criadopor'] = $this->criadopor;
              $this->cargo = $rs->fields[29] ; 
              $this->nmgp_dados_select['cargo'] = $this->cargo;
              $this->departamento = $rs->fields[30] ; 
              $this->nmgp_dados_select['departamento'] = $this->departamento;
              $this->criado_em = $rs->fields[31] ; 
              if (substr($this->criado_em, 10, 1) == "-") 
              { 
                 $this->criado_em = substr($this->criado_em, 0, 10) . " " . substr($this->criado_em, 11);
              } 
              if (substr($this->criado_em, 13, 1) == ".") 
              { 
                 $this->criado_em = substr($this->criado_em, 0, 13) . ":" . substr($this->criado_em, 14, 2) . ":" . substr($this->criado_em, 17);
              } 
              $this->nmgp_dados_select['criado_em'] = $this->criado_em;
              $this->alterado_em = $rs->fields[32] ; 
              if (substr($this->alterado_em, 10, 1) == "-") 
              { 
                 $this->alterado_em = substr($this->alterado_em, 0, 10) . " " . substr($this->alterado_em, 11);
              } 
              if (substr($this->alterado_em, 13, 1) == ".") 
              { 
                 $this->alterado_em = substr($this->alterado_em, 0, 13) . ":" . substr($this->alterado_em, 14, 2) . ":" . substr($this->alterado_em, 17);
              } 
              $this->nmgp_dados_select['alterado_em'] = $this->alterado_em;
              $this->removido_em = $rs->fields[33] ; 
              if (substr($this->removido_em, 10, 1) == "-") 
              { 
                 $this->removido_em = substr($this->removido_em, 0, 10) . " " . substr($this->removido_em, 11);
              } 
              if (substr($this->removido_em, 13, 1) == ".") 
              { 
                 $this->removido_em = substr($this->removido_em, 0, 13) . ":" . substr($this->removido_em, 14, 2) . ":" . substr($this->removido_em, 17);
              } 
              $this->nmgp_dados_select['removido_em'] = $this->removido_em;
              $this->diasinatividade = $rs->fields[34] ; 
              $this->nmgp_dados_select['diasinatividade'] = $this->diasinatividade;
              $this->numtentativaslogin = $rs->fields[35] ; 
              $this->nmgp_dados_select['numtentativaslogin'] = $this->numtentativaslogin;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id_usuario = (string)$this->id_usuario; 
              $this->id_perfil = (string)$this->id_perfil; 
              $this->id_ope = (string)$this->id_ope; 
              $this->contexto_id_ope = (string)$this->contexto_id_ope; 
              $this->criadopor = (string)$this->criadopor; 
              $this->diasinatividade = (string)$this->diasinatividade; 
              $this->numtentativaslogin = (string)$this->numtentativaslogin; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['parms'] = "id_usuario?#?$this->id_usuario?@?";
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sub_dir'][0]  = "";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start'];
              $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['reg_start'] < $qt_geral_reg_form_CadastroDeUsuarios_mob;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao']   = '';
          }
      } 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada") 
      { 
          $this->gbttecempreendimentos = "";
          $this->gbttecempreendimentos_hidden = "";
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Usuario, ID_Empreendimento from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Usuario, ID_Empreendimento from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select \"ID\", \"ID_Usuario\", \"ID_Empreendimento\" from tb_gbtecempreendimentos where \"ID_Usuario\" = $this->id_usuario"; 
          }  
          else  
          { 
              $_SESSION['hticnsdata']['sc_sql_ult_comando'] = "select ID, ID_Usuario, ID_Empreendimento from tb_gbtecempreendimentos where ID_Usuario = $this->id_usuario"; 
          }  
          $rss = $this->Db->Execute($_SESSION['hticnsdata']['sc_sql_ult_comando']); 
          if ($rss === false && !$rss->EOF)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $this->gbttecempreendimentos = ""; 
          while (!$rss->EOF) 
          { 
                 $this->gbttecempreendimentos .= $rss->fields[2] . "@?@";
                 $this->gbttecempreendimentos_hidden .= $rss->fields[2] . "@?@";
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
              $this->id_usuario = "";  
              $this->nom_username = "";  
              $this->password = "";  
              $this->nom_nome = "";  
              $this->num_tipousuario = "";  
              $this->id_perfil = "";  
              $this->id_ope = "";  
              $this->contexto_tipo = "";  
              $this->contexto_id_ope = "";  
              $this->end_numero = "";  
              $this->num_totvs = "";  
              $this->data_ultimologin = "";  
              $this->data_ultimologin_hora = "" ;  
              $this->num_ativo = "";  
              $this->img_foto = "";  
              $this->img_foto_ul_name = "" ;  
              $this->img_foto_ul_type = "" ;  
              $this->num_cpf = "";  
              $this->num_rg = "";  
              $this->data_nascimento = "";  
              $this->data_nascimento_hora = "" ;  
              $this->nom_email1 = "";  
              $this->nom_email2 = "";  
              $this->num_telefonecomercial = "";  
              $this->nom_telefoneresidencial = "";  
              $this->num_telefonecelular = "";  
              $this->end_logradouro = "";  
              $this->end_complemento = "";  
              $this->end_bairro = "";  
              $this->end_cidade = "";  
              $this->end_uf = "";  
              $this->end_cep = "";  
              $this->criadopor = "";  
              $this->cargo = "";  
              $this->departamento = "";  
              $this->criado_em = "";  
              $this->criado_em_hora = "" ;  
              $this->alterado_em = "";  
              $this->alterado_em_hora = "" ;  
              $this->removido_em = "";  
              $this->removido_em_hora = "" ;  
              $this->diasinatividade = "";  
              $this->numtentativaslogin = "";  
              $this->agendadatajson = "";  
              $this->empreendimento = "";  
              $this->gbttecempreendimentos = "";  
              $this->operadora = "";  
              $this->pass = "";  
              $this->pass_confirm = "";  
              $this->prestadora = "";  
              $this->removeronclick = "";  
              $this->savedataonclick = "";  
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['foreign_key'] as $sFKName => $sFKValue)
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
function Num_TipoUsuario_onChange($num_tipousuario)
{
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           
$original_num_tipousuario = $this->num_tipousuario;
$original_operadora = $this->operadora;
$original_prestadora = $this->prestadora;
$original_empreendimento = $this->empreendimento;
$original_departamento = $this->departamento;
$original_gbttecempreendimentos = $this->gbttecempreendimentos;
$original_num_tipousuario = $this->num_tipousuario;

sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();

if ($this->num_tipousuario ) {
	$profile = $s->get('profile');
	if (isset($profile['USUARIO']['CONSULTAR']['a'][$this->num_tipousuario ])) {
		$this->nmgp_cmp_hidden["operadora"] = "on"; $this->NM_ajax_info['fieldDisplay']['operadora'] = 'on';
		$this->nmgp_cmp_hidden["prestadora"] = "on"; $this->NM_ajax_info['fieldDisplay']['prestadora'] = 'on';
		$this->nmgp_cmp_hidden["empreendimento"] = "on"; $this->NM_ajax_info['fieldDisplay']['empreendimento'] = 'on';
		$this->nmgp_cmp_hidden["departamento"] = "on"; $this->NM_ajax_info['fieldDisplay']['departamento'] = 'on';
		$this->Ini->nm_hidden_blocos[5] = "on"; $this->NM_ajax_info['blockDisplay']['5'] = 'on';
		foreach($profile['USUARIO']['CONSULTAR']['a'][$this->num_tipousuario ]['fieldDisplayOff'] as $field) {
			if($field == 'operadora') { $this->nmgp_cmp_hidden["operadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['operadora'] = 'off'; }
			else if($field == 'prestadora') { $this->nmgp_cmp_hidden["prestadora"] = "off"; $this->NM_ajax_info['fieldDisplay']['prestadora'] = 'off'; }
			else if($field == 'empreendimento') { $this->nmgp_cmp_hidden["empreendimento"] = "off"; $this->NM_ajax_info['fieldDisplay']['empreendimento'] = 'off'; }
			else if($field == 'Departamento') { $this->nmgp_cmp_hidden["departamento"] = "off"; $this->NM_ajax_info['fieldDisplay']['departamento'] = 'off'; $this->departamento  = 0;}
		}
		foreach($profile['USUARIO']['CONSULTAR']['a'][$this->num_tipousuario ]["blockDisplayOff"] as $block) {
			if ("bl_Empreendimentos") { 
				$this->Ini->nm_hidden_blocos[5] = "off"; $this->NM_ajax_info['blockDisplay']['5'] = 'off'; 
				$this->gbttecempreendimentos  = '';
			}
		}
	}
}

$modificado_num_tipousuario = $this->num_tipousuario;
$modificado_operadora = $this->operadora;
$modificado_prestadora = $this->prestadora;
$modificado_empreendimento = $this->empreendimento;
$modificado_departamento = $this->departamento;
$modificado_gbttecempreendimentos = $this->gbttecempreendimentos;
$modificado_num_tipousuario = $this->num_tipousuario;
$this->nm_formatar_campos('num_tipousuario', 'operadora', 'prestadora', 'empreendimento', 'departamento', 'gbttecempreendimentos');
if ($original_num_tipousuario !== $modificado_num_tipousuario || isset($this->nmgp_cmp_readonly['num_tipousuario']) || (isset($bFlagRead_num_tipousuario) && $bFlagRead_num_tipousuario))
{
    $this->ajax_return_values_num_tipousuario(true);
}
if ($original_operadora !== $modificado_operadora || isset($this->nmgp_cmp_readonly['operadora']) || (isset($bFlagRead_operadora) && $bFlagRead_operadora))
{
    $this->ajax_return_values_operadora(true);
}
if ($original_prestadora !== $modificado_prestadora || isset($this->nmgp_cmp_readonly['prestadora']) || (isset($bFlagRead_prestadora) && $bFlagRead_prestadora))
{
    $this->ajax_return_values_prestadora(true);
}
if ($original_empreendimento !== $modificado_empreendimento || isset($this->nmgp_cmp_readonly['empreendimento']) || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento))
{
    $this->ajax_return_values_empreendimento(true);
}
if ($original_departamento !== $modificado_departamento || isset($this->nmgp_cmp_readonly['departamento']) || (isset($bFlagRead_departamento) && $bFlagRead_departamento))
{
    $this->ajax_return_values_departamento(true);
}
if ($original_gbttecempreendimentos !== $modificado_gbttecempreendimentos || isset($this->nmgp_cmp_readonly['gbttecempreendimentos']) || (isset($bFlagRead_gbttecempreendimentos) && $bFlagRead_gbttecempreendimentos))
{
    $this->ajax_return_values_gbttecempreendimentos(true);
}
if ($original_num_tipousuario !== $modificado_num_tipousuario || isset($this->nmgp_cmp_readonly['num_tipousuario']) || (isset($bFlagRead_num_tipousuario) && $bFlagRead_num_tipousuario))
{
    $this->ajax_return_values_num_tipousuario(true);
}
form_CadastroDeUsuarios_mob_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off';
}
function onLoadJS($config=[])
{
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           
?>

<style>
	.pass-diff:after {
		display: block;
		content: "<?php echo  $this->Ini->Nm_lang['lang_label_passworddiff'] ; ?>";
		color: red;
	}
</style>
<script>
	$(document).ready(function(){
		$('[name=pass], [name=pass_confirm]').change(function(){
			pass1 = $('[name=pass]').val();
			pass2 = $('[name=pass_confirm]').val();
			if (pass1 != '' || pass2 != '') {
				if (pass1 != pass2) {
					$('[name=pass_confirm]').closest('span').addClass('pass-diff');
					return;
				}
			}
			$('[name=pass_confirm]').closest('span').removeClass('pass-diff');
		});
	
		$agendaTr = $('#hidden_field_data_agendadatajson').closest('tr');
		$agendaTr.hide();
		$tabAgenda = $('#id_tabs_0_4');
		$tabAgenda.hide();
		$agendaTr.html('<td id="agenda_iframe"></td>');
		$agendaTd = $("#agenda_iframe");
		<?php if ($config['framesHTML']['agenda']): ?>
			$agendaTd.css('width', '100%');
			$agendaTd.html('<iframe src="../calendar_Agenda" id="id_agenda_frame" style="width:100%;border:0" onLoad="updateStatsFrame(this);"></iframe>');
		
			setInterval(function () {
				$tabAgenda.show(); $agendaTr.show();
				updateStatsFrame();
			}, 500);
		<?php endif; ?>
	
		fileSC = new validateFileSC({
			label_max: `<?= $this->Ini->Nm_lang['lang_label_max'] ?>`,
			label_formato: `<?= $this->Ini->Nm_lang['lang_label_formato'] ?>`,
			label_arquivoinvalido: `<?= $this->Ini->Nm_lang['lang_label_arquivoinvalido'] ?>`,
			label_tamanho: `<?= $this->Ini->Nm_lang['lang_label_tamanho'] ?>`
		});
		fileSC.watch('img_foto', {
			sizeB: 2097152,
			type: ['png', 'jpg', 'jpeg']
		});
	});
	
	function updateStatsFrame(frame) {
		nSize = $('#id_agenda_frame').contents().find('body').height();
		nSize = 600 > nSize  ? 600 : nSize;
		$('#id_agenda_frame').height(nSize);
		$agendaTd.height(nSize);
	
	
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
	function deleteData () {
		$('#id_sc_field_removeronclick').click();
	}
</script>

<?php
	

$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off';
}
function removerOnClick_onClick($contexto_id_ope, $contexto_tipo, $id_ope, $id_perfil, $num_tipousuario, $nom_nome, $gbttecempreendimentos, $empreendimento, $numtentativaslogin, $diasinatividade, $removido_em, $criado_em, $departamento, $cargo, $password, $criadopor, $end_cep, $end_uf, $end_cidade, $end_bairro, $end_complemento, $end_logradouro, $num_telefonecelular, $nom_telefoneresidencial, $num_telefonecomercial, $nom_username, $nom_email2, $nom_email1, $data_nascimento, $num_rg, $num_cpf, $img_foto, $num_ativo, $data_ultimologin, $num_totvs, $end_numero, $id_usuario)
{
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           
$original_num_tipousuario = $this->num_tipousuario;
$original_id_usuario = $this->id_usuario;
$original_removido_em = $this->removido_em;
$original_contexto_id_ope = $this->contexto_id_ope;
$original_contexto_tipo = $this->contexto_tipo;
$original_id_ope = $this->id_ope;
$original_id_perfil = $this->id_perfil;
$original_num_tipousuario = $this->num_tipousuario;
$original_nom_nome = $this->nom_nome;
$original_gbttecempreendimentos = $this->gbttecempreendimentos;
$original_empreendimento = $this->empreendimento;
$original_numtentativaslogin = $this->numtentativaslogin;
$original_diasinatividade = $this->diasinatividade;
$original_removido_em = $this->removido_em;
$original_criado_em = $this->criado_em;
$original_departamento = $this->departamento;
$original_cargo = $this->cargo;
$original_password = $this->password;
$original_criadopor = $this->criadopor;
$original_end_cep = $this->end_cep;
$original_end_uf = $this->end_uf;
$original_end_cidade = $this->end_cidade;
$original_end_bairro = $this->end_bairro;
$original_end_complemento = $this->end_complemento;
$original_end_logradouro = $this->end_logradouro;
$original_num_telefonecelular = $this->num_telefonecelular;
$original_nom_telefoneresidencial = $this->nom_telefoneresidencial;
$original_num_telefonecomercial = $this->num_telefonecomercial;
$original_nom_username = $this->nom_username;
$original_nom_email2 = $this->nom_email2;
$original_nom_email1 = $this->nom_email1;
$original_data_nascimento = $this->data_nascimento;
$original_num_rg = $this->num_rg;
$original_num_cpf = $this->num_cpf;
$original_img_foto = $this->img_foto;
$original_num_ativo = $this->num_ativo;
$original_data_ultimologin = $this->data_ultimologin;
$original_num_totvs = $this->num_totvs;
$original_end_numero = $this->end_numero;
$original_id_usuario = $this->id_usuario;

sc_include_library("sys", "functions", "functions.php");
sc_include_library("sys", "models", "Usuarios.php");
sc_include_library("sys", "models", "Logs.php");
$_Usuarios = new Usuarios($this);
$_Logs = new Logs($this);
$s = new manageSession();
$ID_Usuario = $s->get("ID_Usuario");

$msg = "";
$Error = false;


if ($this->num_tipousuario  == "GT") {
	 
      $nm_select = "SELECT count(*) FROM tb_saetecgb as tb1 INNER JOIN tb_sae as tb2 ON tb2.Num_SAE = tb1.Num_SAE WHERE tb1.ID_Usuario = $this->id_usuario  AND tb2.Num_Ativo = 'S' AND tb2.Num_Status != 'C'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
     if ($this->id_usuario != "")
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
		$msg = sprintf( $this->Ini->Nm_lang['lang_msg_err1_removeuser'] , $this->rs[0][0], ($this->rs[0][0] > 1 ? "s" : ""));		
		$Error = true;
	}
}

if (!$Error) {
	$this->removido_em  = date("Y-m-d H:i:s");
	$_Usuarios->remove(intval($this->id_usuario ));
	$_Logs->insert([
		"Modulo" => "USUARIO",
		"Funcao" => "DELETAR",
		"Descricao" => 'Remoção de usuário',
		"Conteudo" => $_Logs->getConteudo()
	]);
	
	$s->setIUDState("grid_ConsultadeUsuarios", "D", "success");
	if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

	 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ConsultadeUsuarios') . "/", $this->nm_location, "", "_self", "ret_self", 440, 630);
 };
} else {
	$this->sc_ajax_javascript('sModal', array(
		'show',
		'',
		$msg,
		'{"sizeClass":"md"}'
	));
}

$modificado_num_tipousuario = $this->num_tipousuario;
$modificado_id_usuario = $this->id_usuario;
$modificado_removido_em = $this->removido_em;
$modificado_contexto_id_ope = $this->contexto_id_ope;
$modificado_contexto_tipo = $this->contexto_tipo;
$modificado_id_ope = $this->id_ope;
$modificado_id_perfil = $this->id_perfil;
$modificado_num_tipousuario = $this->num_tipousuario;
$modificado_nom_nome = $this->nom_nome;
$modificado_gbttecempreendimentos = $this->gbttecempreendimentos;
$modificado_empreendimento = $this->empreendimento;
$modificado_numtentativaslogin = $this->numtentativaslogin;
$modificado_diasinatividade = $this->diasinatividade;
$modificado_removido_em = $this->removido_em;
$modificado_criado_em = $this->criado_em;
$modificado_departamento = $this->departamento;
$modificado_cargo = $this->cargo;
$modificado_password = $this->password;
$modificado_criadopor = $this->criadopor;
$modificado_end_cep = $this->end_cep;
$modificado_end_uf = $this->end_uf;
$modificado_end_cidade = $this->end_cidade;
$modificado_end_bairro = $this->end_bairro;
$modificado_end_complemento = $this->end_complemento;
$modificado_end_logradouro = $this->end_logradouro;
$modificado_num_telefonecelular = $this->num_telefonecelular;
$modificado_nom_telefoneresidencial = $this->nom_telefoneresidencial;
$modificado_num_telefonecomercial = $this->num_telefonecomercial;
$modificado_nom_username = $this->nom_username;
$modificado_nom_email2 = $this->nom_email2;
$modificado_nom_email1 = $this->nom_email1;
$modificado_data_nascimento = $this->data_nascimento;
$modificado_num_rg = $this->num_rg;
$modificado_num_cpf = $this->num_cpf;
$modificado_img_foto = $this->img_foto;
$modificado_num_ativo = $this->num_ativo;
$modificado_data_ultimologin = $this->data_ultimologin;
$modificado_num_totvs = $this->num_totvs;
$modificado_end_numero = $this->end_numero;
$modificado_id_usuario = $this->id_usuario;
$this->nm_formatar_campos('num_tipousuario', 'id_usuario', 'removido_em');
if ($original_num_tipousuario !== $modificado_num_tipousuario || isset($this->nmgp_cmp_readonly['num_tipousuario']) || (isset($bFlagRead_num_tipousuario) && $bFlagRead_num_tipousuario))
{
    $this->ajax_return_values_num_tipousuario(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_removido_em !== $modificado_removido_em || isset($this->nmgp_cmp_readonly['removido_em']) || (isset($bFlagRead_removido_em) && $bFlagRead_removido_em))
{
    $this->ajax_return_values_removido_em(true);
}
if ($original_contexto_id_ope !== $modificado_contexto_id_ope || isset($this->nmgp_cmp_readonly['contexto_id_ope']) || (isset($bFlagRead_contexto_id_ope) && $bFlagRead_contexto_id_ope))
{
    $this->ajax_return_values_contexto_id_ope(true);
}
if ($original_contexto_tipo !== $modificado_contexto_tipo || isset($this->nmgp_cmp_readonly['contexto_tipo']) || (isset($bFlagRead_contexto_tipo) && $bFlagRead_contexto_tipo))
{
    $this->ajax_return_values_contexto_tipo(true);
}
if ($original_id_ope !== $modificado_id_ope || isset($this->nmgp_cmp_readonly['id_ope']) || (isset($bFlagRead_id_ope) && $bFlagRead_id_ope))
{
    $this->ajax_return_values_id_ope(true);
}
if ($original_id_perfil !== $modificado_id_perfil || isset($this->nmgp_cmp_readonly['id_perfil']) || (isset($bFlagRead_id_perfil) && $bFlagRead_id_perfil))
{
    $this->ajax_return_values_id_perfil(true);
}
if ($original_num_tipousuario !== $modificado_num_tipousuario || isset($this->nmgp_cmp_readonly['num_tipousuario']) || (isset($bFlagRead_num_tipousuario) && $bFlagRead_num_tipousuario))
{
    $this->ajax_return_values_num_tipousuario(true);
}
if ($original_nom_nome !== $modificado_nom_nome || isset($this->nmgp_cmp_readonly['nom_nome']) || (isset($bFlagRead_nom_nome) && $bFlagRead_nom_nome))
{
    $this->ajax_return_values_nom_nome(true);
}
if ($original_gbttecempreendimentos !== $modificado_gbttecempreendimentos || isset($this->nmgp_cmp_readonly['gbttecempreendimentos']) || (isset($bFlagRead_gbttecempreendimentos) && $bFlagRead_gbttecempreendimentos))
{
    $this->ajax_return_values_gbttecempreendimentos(true);
}
if ($original_empreendimento !== $modificado_empreendimento || isset($this->nmgp_cmp_readonly['empreendimento']) || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento))
{
    $this->ajax_return_values_empreendimento(true);
}
if ($original_numtentativaslogin !== $modificado_numtentativaslogin || isset($this->nmgp_cmp_readonly['numtentativaslogin']) || (isset($bFlagRead_numtentativaslogin) && $bFlagRead_numtentativaslogin))
{
    $this->ajax_return_values_numtentativaslogin(true);
}
if ($original_diasinatividade !== $modificado_diasinatividade || isset($this->nmgp_cmp_readonly['diasinatividade']) || (isset($bFlagRead_diasinatividade) && $bFlagRead_diasinatividade))
{
    $this->ajax_return_values_diasinatividade(true);
}
if ($original_removido_em !== $modificado_removido_em || isset($this->nmgp_cmp_readonly['removido_em']) || (isset($bFlagRead_removido_em) && $bFlagRead_removido_em))
{
    $this->ajax_return_values_removido_em(true);
}
if ($original_criado_em !== $modificado_criado_em || isset($this->nmgp_cmp_readonly['criado_em']) || (isset($bFlagRead_criado_em) && $bFlagRead_criado_em))
{
    $this->ajax_return_values_criado_em(true);
}
if ($original_departamento !== $modificado_departamento || isset($this->nmgp_cmp_readonly['departamento']) || (isset($bFlagRead_departamento) && $bFlagRead_departamento))
{
    $this->ajax_return_values_departamento(true);
}
if ($original_cargo !== $modificado_cargo || isset($this->nmgp_cmp_readonly['cargo']) || (isset($bFlagRead_cargo) && $bFlagRead_cargo))
{
    $this->ajax_return_values_cargo(true);
}
if ($original_password !== $modificado_password || isset($this->nmgp_cmp_readonly['password']) || (isset($bFlagRead_password) && $bFlagRead_password))
{
    $this->ajax_return_values_password(true);
}
if ($original_criadopor !== $modificado_criadopor || isset($this->nmgp_cmp_readonly['criadopor']) || (isset($bFlagRead_criadopor) && $bFlagRead_criadopor))
{
    $this->ajax_return_values_criadopor(true);
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
if ($original_end_bairro !== $modificado_end_bairro || isset($this->nmgp_cmp_readonly['end_bairro']) || (isset($bFlagRead_end_bairro) && $bFlagRead_end_bairro))
{
    $this->ajax_return_values_end_bairro(true);
}
if ($original_end_complemento !== $modificado_end_complemento || isset($this->nmgp_cmp_readonly['end_complemento']) || (isset($bFlagRead_end_complemento) && $bFlagRead_end_complemento))
{
    $this->ajax_return_values_end_complemento(true);
}
if ($original_end_logradouro !== $modificado_end_logradouro || isset($this->nmgp_cmp_readonly['end_logradouro']) || (isset($bFlagRead_end_logradouro) && $bFlagRead_end_logradouro))
{
    $this->ajax_return_values_end_logradouro(true);
}
if ($original_num_telefonecelular !== $modificado_num_telefonecelular || isset($this->nmgp_cmp_readonly['num_telefonecelular']) || (isset($bFlagRead_num_telefonecelular) && $bFlagRead_num_telefonecelular))
{
    $this->ajax_return_values_num_telefonecelular(true);
}
if ($original_nom_telefoneresidencial !== $modificado_nom_telefoneresidencial || isset($this->nmgp_cmp_readonly['nom_telefoneresidencial']) || (isset($bFlagRead_nom_telefoneresidencial) && $bFlagRead_nom_telefoneresidencial))
{
    $this->ajax_return_values_nom_telefoneresidencial(true);
}
if ($original_num_telefonecomercial !== $modificado_num_telefonecomercial || isset($this->nmgp_cmp_readonly['num_telefonecomercial']) || (isset($bFlagRead_num_telefonecomercial) && $bFlagRead_num_telefonecomercial))
{
    $this->ajax_return_values_num_telefonecomercial(true);
}
if ($original_nom_username !== $modificado_nom_username || isset($this->nmgp_cmp_readonly['nom_username']) || (isset($bFlagRead_nom_username) && $bFlagRead_nom_username))
{
    $this->ajax_return_values_nom_username(true);
}
if ($original_nom_email2 !== $modificado_nom_email2 || isset($this->nmgp_cmp_readonly['nom_email2']) || (isset($bFlagRead_nom_email2) && $bFlagRead_nom_email2))
{
    $this->ajax_return_values_nom_email2(true);
}
if ($original_nom_email1 !== $modificado_nom_email1 || isset($this->nmgp_cmp_readonly['nom_email1']) || (isset($bFlagRead_nom_email1) && $bFlagRead_nom_email1))
{
    $this->ajax_return_values_nom_email1(true);
}
if ($original_data_nascimento !== $modificado_data_nascimento || isset($this->nmgp_cmp_readonly['data_nascimento']) || (isset($bFlagRead_data_nascimento) && $bFlagRead_data_nascimento))
{
    $this->ajax_return_values_data_nascimento(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_num_cpf !== $modificado_num_cpf || isset($this->nmgp_cmp_readonly['num_cpf']) || (isset($bFlagRead_num_cpf) && $bFlagRead_num_cpf))
{
    $this->ajax_return_values_num_cpf(true);
}
if ($original_img_foto !== $modificado_img_foto || isset($this->nmgp_cmp_readonly['img_foto']) || (isset($bFlagRead_img_foto) && $bFlagRead_img_foto))
{
    $this->ajax_return_values_img_foto(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_data_ultimologin !== $modificado_data_ultimologin || isset($this->nmgp_cmp_readonly['data_ultimologin']) || (isset($bFlagRead_data_ultimologin) && $bFlagRead_data_ultimologin))
{
    $this->ajax_return_values_data_ultimologin(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_end_numero !== $modificado_end_numero || isset($this->nmgp_cmp_readonly['end_numero']) || (isset($bFlagRead_end_numero) && $bFlagRead_end_numero))
{
    $this->ajax_return_values_end_numero(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
form_CadastroDeUsuarios_mob_pack_ajax_response();
exit;
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off';
}
function saveDataOnClick_onClick($contexto_id_ope, $contexto_tipo, $id_ope, $id_perfil, $num_tipousuario, $nom_nome, $numtentativaslogin, $removido_em, $cargo, $password, $end_cep, $end_uf, $end_cidade, $end_bairro, $end_complemento, $end_logradouro, $num_telefonecelular, $nom_telefoneresidencial, $num_telefonecomercial, $nom_username, $nom_email2, $nom_email1, $data_nascimento, $num_rg, $num_cpf, $img_foto, $num_ativo, $data_ultimologin, $num_totvs, $end_numero, $id_usuario)
{
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           
$original_nom_username = $this->nom_username;
$original_id_usuario = $this->id_usuario;
$original_pass = $this->pass;
$original_pass_confirm = $this->pass_confirm;
$original_num_tipousuario = $this->num_tipousuario;
$original_operadora = $this->operadora;
$original_prestadora = $this->prestadora;
$original_empreendimento = $this->empreendimento;
$original_id_perfil = $this->id_perfil;
$original_nom_nome = $this->nom_nome;
$original_num_cpf = $this->num_cpf;
$original_num_rg = $this->num_rg;
$original_cargo = $this->cargo;
$original_departamento = $this->departamento;
$original_data_nascimento = $this->data_nascimento;
$original_nom_email1 = $this->nom_email1;
$original_nom_email2 = $this->nom_email2;
$original_num_telefonecomercial = $this->num_telefonecomercial;
$original_nom_telefoneresidencial = $this->nom_telefoneresidencial;
$original_num_telefonecelular = $this->num_telefonecelular;
$original_contexto_id_ope = $this->contexto_id_ope;
$original_contexto_tipo = $this->contexto_tipo;
$original_id_ope = $this->id_ope;
$original_contexto_id_ope = $this->contexto_id_ope;
$original_contexto_tipo = $this->contexto_tipo;
$original_id_ope = $this->id_ope;
$original_id_perfil = $this->id_perfil;
$original_num_tipousuario = $this->num_tipousuario;
$original_nom_nome = $this->nom_nome;
$original_numtentativaslogin = $this->numtentativaslogin;
$original_removido_em = $this->removido_em;
$original_cargo = $this->cargo;
$original_password = $this->password;
$original_end_cep = $this->end_cep;
$original_end_uf = $this->end_uf;
$original_end_cidade = $this->end_cidade;
$original_end_bairro = $this->end_bairro;
$original_end_complemento = $this->end_complemento;
$original_end_logradouro = $this->end_logradouro;
$original_num_telefonecelular = $this->num_telefonecelular;
$original_nom_telefoneresidencial = $this->nom_telefoneresidencial;
$original_num_telefonecomercial = $this->num_telefonecomercial;
$original_nom_username = $this->nom_username;
$original_nom_email2 = $this->nom_email2;
$original_nom_email1 = $this->nom_email1;
$original_data_nascimento = $this->data_nascimento;
$original_num_rg = $this->num_rg;
$original_num_cpf = $this->num_cpf;
$original_img_foto = $this->img_foto;
$original_num_ativo = $this->num_ativo;
$original_data_ultimologin = $this->data_ultimologin;
$original_num_totvs = $this->num_totvs;
$original_end_numero = $this->end_numero;
$original_id_usuario = $this->id_usuario;

sc_include_library('sys', 'functions', 'functions.php');
$s = new manageSession();
$msg = "";
$Error = false;

if ($this->nom_username  == '') {
	$msg .= "Insira o nome de usuário a".$this->id_usuario ."a <br>";
	$Error = true;
}
if (($this->id_usuario  == "undefined" || $this->pass  || $this->pass_confirm ) && (!$this->pass  || !$this->pass_confirm  || $this->pass  != $this->pass_confirm  || !isSecurePass($this->pass ))) {
	$msg .= "Insira a senha corretamente, esta deve conter no mínimo 8 carácteres, letras maiúsculas, minúsculas e números<br>";
	$Error = true;
}
if (!$this->num_tipousuario ) {
	$msg .= "Especifique um tipo de usuário<br>";
	$Error = true;
}
if ($this->num_tipousuario  == "O" && !$this->operadora ) {
	$msg .= "Especifique uma operadora<br>";
	$Error = true;
} elseif ($this->num_tipousuario  == "P" && !$this->prestadora ) {
	$msg .= "Especifique uma prestadora<br>";
	$Error = true;
} elseif ($this->num_tipousuario  == "E" && !$this->empreendimento ) {
	$msg .= "Especifique uma empreendimento<br>";
	$Error = true;
}
if (!$this->id_perfil ) {
	$msg .= "Especifique um perfil de permissionamento<br>";
	$Error = true;
}
if (!$this->nom_nome ) {
	$msg .= "Insira o nome completo do usuário<br>";
	$Error = true;
}
if (!$this->num_cpf ) {
	$msg .= "Insira o número do CPF<br>";
	$Error = true;
}
if (!$this->num_rg ) {
	$msg .= "Insira o número do RG<br>";
	$Error = true;
} elseif (!isValidRG($this->num_rg )) {
	$msg .= "O número de RG não é válido<br>";
	$Error = true;
}
if (!$this->cargo ) {
	$msg .= "Insira o cargo do usuário<br>";
	$Error = true;
}
if (in_array($this->num_tipousuario , ["G", "GT"]) && !$this->departamento ) {
	$msg .= "Insira o departamento do usuário<br>";
	$Error = true;
}
if (!$this->data_nascimento ) {
	$msg .= "Insira o departamento do usuário<br>";
	$Error = true;
} elseif (strtotime($this->data_nascimento ) > strtotime("-18 years")) {
	$msg .= "O usuário deve ter no mínimo 18 anos de idade<br>";
	$Error = true;
}
if (!$this->nom_email1  && !$this->nom_email2 ) {
	$msg .= "Insira pelo menos um endereço de e-mail<br>";
	$Error = true;
} else {
	if ($this->nom_email1  && !filter_var($this->nom_email1 , FILTER_VALIDATE_EMAIL)) {
		$msg .= "O endereço de e-mail 1 não é válido<br>";
		$Error = true;
	}
	if ($this->nom_email2  && !filter_var($this->nom_email2 , FILTER_VALIDATE_EMAIL)) {
		$msg .= "O endereço de e-mail 2 não é válido<br>";
		$Error = true;
	}
}
if (!$this->num_telefonecomercial  && !$this->nom_telefoneresidencial  && !$this->num_telefonecelular ) {
	$msg .= "Insira pelo menos um telefone para contato<br>";
	$Error = true;
} else {
	if ($this->num_telefonecomercial  && !isValidPhone($this->num_telefonecomercial )) {
		$msg .= "O número de telefone comercial não é válido<br>";
		$Error = true;
	}
	if ($this->nom_telefoneresidencial  && !isValidPhone($this->nom_telefoneresidencial )) {
		$msg .= "O número de telefone residencial não é válido<br>";
		$Error = true;
	}
	if ($this->num_telefonecelular  && !isValidPhone($this->num_telefonecelular , "cel")) {
		$msg .= "O número de celular não é válido<br>";
		$Error = true;
	}
}

if (!$Error) {
	$Creator_Num_TipoUsuario = $s->get('Num_TipoUsuario');
	if ($this->num_tipousuario  == $Creator_Num_TipoUsuario) {
		$Contexto_ID_OPE = $s->get('Contexto_ID_OPE');
		$Contexto_Tipo = $s->get('Contexto_Tipo');
		$this->contexto_id_ope  = $Contexto_ID_OPE;
		$this->contexto_tipo  = $Contexto_Tipo;
	} else {
		$Creator_ID_OPE = $s->get('ID_OPE');
		$this->contexto_id_ope  = $Creator_ID_OPE;
		$this->contexto_tipo  = $Creator_Num_TipoUsuario == 'GT' ? 'G' : $Creator_Num_TipoUsuario;
	}
	
	switch($this->num_tipousuario ) {
		case("G"):
			$this->id_ope  = 0;
		break;
		case("GT"):
			$this->id_ope  = 0;
		break;
		case("O"):
			$this->id_ope  = $this->operadora ;
		break;
		case("P"):
			$this->id_ope  = $this->prestadora ;
		break;
		case("E"):
			$this->id_ope  = $this->empreendimento ;
		break;
	}

	$rs = DbQuery($this, "SELECT count(*) as count FROM tb_usuarios WHERE Nom_UserName = '$this->nom_username' AND ID_Usuario != '$this->id_usuario' AND Num_Ativo != 'R'");
	if ($rs[0]["count"] > 0) {
		$msg .=  $this->Ini->Nm_lang['lang_msg_exist_username'] ."<br>";
		$Error = true;
	}

	$rs = DbQuery($this, "SELECT count(*) as count FROM tb_usuarios WHERE Num_RG = '$this->num_rg' AND ID_Usuario != '$this->id_usuario' AND Num_Ativo != 'R'");
	if ($rs[0]["count"] > 0) {
		$msg .=  $this->Ini->Nm_lang['lang_msg_exist_rg'] ."<br>";
		$Error = true;
	}
	
	$rs = DbQuery($this, "SELECT count(*) as count FROM tb_usuarios WHERE Num_CPF = '$this->num_cpf' AND ID_Usuario != '$this->id_usuario' AND Num_Ativo != 'R'");	
	if ($rs[0]["count"] > 0) {
		$msg .=  $this->Ini->Nm_lang['lang_msg_exist_cpf'] ."<br>";
		$Error = true;
	}
	
	
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

$modificado_nom_username = $this->nom_username;
$modificado_id_usuario = $this->id_usuario;
$modificado_pass = $this->pass;
$modificado_pass_confirm = $this->pass_confirm;
$modificado_num_tipousuario = $this->num_tipousuario;
$modificado_operadora = $this->operadora;
$modificado_prestadora = $this->prestadora;
$modificado_empreendimento = $this->empreendimento;
$modificado_id_perfil = $this->id_perfil;
$modificado_nom_nome = $this->nom_nome;
$modificado_num_cpf = $this->num_cpf;
$modificado_num_rg = $this->num_rg;
$modificado_cargo = $this->cargo;
$modificado_departamento = $this->departamento;
$modificado_data_nascimento = $this->data_nascimento;
$modificado_nom_email1 = $this->nom_email1;
$modificado_nom_email2 = $this->nom_email2;
$modificado_num_telefonecomercial = $this->num_telefonecomercial;
$modificado_nom_telefoneresidencial = $this->nom_telefoneresidencial;
$modificado_num_telefonecelular = $this->num_telefonecelular;
$modificado_contexto_id_ope = $this->contexto_id_ope;
$modificado_contexto_tipo = $this->contexto_tipo;
$modificado_id_ope = $this->id_ope;
$modificado_contexto_id_ope = $this->contexto_id_ope;
$modificado_contexto_tipo = $this->contexto_tipo;
$modificado_id_ope = $this->id_ope;
$modificado_id_perfil = $this->id_perfil;
$modificado_num_tipousuario = $this->num_tipousuario;
$modificado_nom_nome = $this->nom_nome;
$modificado_numtentativaslogin = $this->numtentativaslogin;
$modificado_removido_em = $this->removido_em;
$modificado_cargo = $this->cargo;
$modificado_password = $this->password;
$modificado_end_cep = $this->end_cep;
$modificado_end_uf = $this->end_uf;
$modificado_end_cidade = $this->end_cidade;
$modificado_end_bairro = $this->end_bairro;
$modificado_end_complemento = $this->end_complemento;
$modificado_end_logradouro = $this->end_logradouro;
$modificado_num_telefonecelular = $this->num_telefonecelular;
$modificado_nom_telefoneresidencial = $this->nom_telefoneresidencial;
$modificado_num_telefonecomercial = $this->num_telefonecomercial;
$modificado_nom_username = $this->nom_username;
$modificado_nom_email2 = $this->nom_email2;
$modificado_nom_email1 = $this->nom_email1;
$modificado_data_nascimento = $this->data_nascimento;
$modificado_num_rg = $this->num_rg;
$modificado_num_cpf = $this->num_cpf;
$modificado_img_foto = $this->img_foto;
$modificado_num_ativo = $this->num_ativo;
$modificado_data_ultimologin = $this->data_ultimologin;
$modificado_num_totvs = $this->num_totvs;
$modificado_end_numero = $this->end_numero;
$modificado_id_usuario = $this->id_usuario;
$this->nm_formatar_campos('nom_username', 'id_usuario', 'pass', 'pass_confirm', 'num_tipousuario', 'operadora', 'prestadora', 'empreendimento', 'id_perfil', 'nom_nome', 'num_cpf', 'num_rg', 'cargo', 'departamento', 'data_nascimento', 'nom_email1', 'nom_email2', 'num_telefonecomercial', 'nom_telefoneresidencial', 'num_telefonecelular', 'contexto_id_ope', 'contexto_tipo', 'id_ope');
if ($original_nom_username !== $modificado_nom_username || isset($this->nmgp_cmp_readonly['nom_username']) || (isset($bFlagRead_nom_username) && $bFlagRead_nom_username))
{
    $this->ajax_return_values_nom_username(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
if ($original_pass !== $modificado_pass || isset($this->nmgp_cmp_readonly['pass']) || (isset($bFlagRead_pass) && $bFlagRead_pass))
{
    $this->ajax_return_values_pass(true);
}
if ($original_pass_confirm !== $modificado_pass_confirm || isset($this->nmgp_cmp_readonly['pass_confirm']) || (isset($bFlagRead_pass_confirm) && $bFlagRead_pass_confirm))
{
    $this->ajax_return_values_pass_confirm(true);
}
if ($original_num_tipousuario !== $modificado_num_tipousuario || isset($this->nmgp_cmp_readonly['num_tipousuario']) || (isset($bFlagRead_num_tipousuario) && $bFlagRead_num_tipousuario))
{
    $this->ajax_return_values_num_tipousuario(true);
}
if ($original_operadora !== $modificado_operadora || isset($this->nmgp_cmp_readonly['operadora']) || (isset($bFlagRead_operadora) && $bFlagRead_operadora))
{
    $this->ajax_return_values_operadora(true);
}
if ($original_prestadora !== $modificado_prestadora || isset($this->nmgp_cmp_readonly['prestadora']) || (isset($bFlagRead_prestadora) && $bFlagRead_prestadora))
{
    $this->ajax_return_values_prestadora(true);
}
if ($original_empreendimento !== $modificado_empreendimento || isset($this->nmgp_cmp_readonly['empreendimento']) || (isset($bFlagRead_empreendimento) && $bFlagRead_empreendimento))
{
    $this->ajax_return_values_empreendimento(true);
}
if ($original_id_perfil !== $modificado_id_perfil || isset($this->nmgp_cmp_readonly['id_perfil']) || (isset($bFlagRead_id_perfil) && $bFlagRead_id_perfil))
{
    $this->ajax_return_values_id_perfil(true);
}
if ($original_nom_nome !== $modificado_nom_nome || isset($this->nmgp_cmp_readonly['nom_nome']) || (isset($bFlagRead_nom_nome) && $bFlagRead_nom_nome))
{
    $this->ajax_return_values_nom_nome(true);
}
if ($original_num_cpf !== $modificado_num_cpf || isset($this->nmgp_cmp_readonly['num_cpf']) || (isset($bFlagRead_num_cpf) && $bFlagRead_num_cpf))
{
    $this->ajax_return_values_num_cpf(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_cargo !== $modificado_cargo || isset($this->nmgp_cmp_readonly['cargo']) || (isset($bFlagRead_cargo) && $bFlagRead_cargo))
{
    $this->ajax_return_values_cargo(true);
}
if ($original_departamento !== $modificado_departamento || isset($this->nmgp_cmp_readonly['departamento']) || (isset($bFlagRead_departamento) && $bFlagRead_departamento))
{
    $this->ajax_return_values_departamento(true);
}
if ($original_data_nascimento !== $modificado_data_nascimento || isset($this->nmgp_cmp_readonly['data_nascimento']) || (isset($bFlagRead_data_nascimento) && $bFlagRead_data_nascimento))
{
    $this->ajax_return_values_data_nascimento(true);
}
if ($original_nom_email1 !== $modificado_nom_email1 || isset($this->nmgp_cmp_readonly['nom_email1']) || (isset($bFlagRead_nom_email1) && $bFlagRead_nom_email1))
{
    $this->ajax_return_values_nom_email1(true);
}
if ($original_nom_email2 !== $modificado_nom_email2 || isset($this->nmgp_cmp_readonly['nom_email2']) || (isset($bFlagRead_nom_email2) && $bFlagRead_nom_email2))
{
    $this->ajax_return_values_nom_email2(true);
}
if ($original_num_telefonecomercial !== $modificado_num_telefonecomercial || isset($this->nmgp_cmp_readonly['num_telefonecomercial']) || (isset($bFlagRead_num_telefonecomercial) && $bFlagRead_num_telefonecomercial))
{
    $this->ajax_return_values_num_telefonecomercial(true);
}
if ($original_nom_telefoneresidencial !== $modificado_nom_telefoneresidencial || isset($this->nmgp_cmp_readonly['nom_telefoneresidencial']) || (isset($bFlagRead_nom_telefoneresidencial) && $bFlagRead_nom_telefoneresidencial))
{
    $this->ajax_return_values_nom_telefoneresidencial(true);
}
if ($original_num_telefonecelular !== $modificado_num_telefonecelular || isset($this->nmgp_cmp_readonly['num_telefonecelular']) || (isset($bFlagRead_num_telefonecelular) && $bFlagRead_num_telefonecelular))
{
    $this->ajax_return_values_num_telefonecelular(true);
}
if ($original_contexto_id_ope !== $modificado_contexto_id_ope || isset($this->nmgp_cmp_readonly['contexto_id_ope']) || (isset($bFlagRead_contexto_id_ope) && $bFlagRead_contexto_id_ope))
{
    $this->ajax_return_values_contexto_id_ope(true);
}
if ($original_contexto_tipo !== $modificado_contexto_tipo || isset($this->nmgp_cmp_readonly['contexto_tipo']) || (isset($bFlagRead_contexto_tipo) && $bFlagRead_contexto_tipo))
{
    $this->ajax_return_values_contexto_tipo(true);
}
if ($original_id_ope !== $modificado_id_ope || isset($this->nmgp_cmp_readonly['id_ope']) || (isset($bFlagRead_id_ope) && $bFlagRead_id_ope))
{
    $this->ajax_return_values_id_ope(true);
}
if ($original_contexto_id_ope !== $modificado_contexto_id_ope || isset($this->nmgp_cmp_readonly['contexto_id_ope']) || (isset($bFlagRead_contexto_id_ope) && $bFlagRead_contexto_id_ope))
{
    $this->ajax_return_values_contexto_id_ope(true);
}
if ($original_contexto_tipo !== $modificado_contexto_tipo || isset($this->nmgp_cmp_readonly['contexto_tipo']) || (isset($bFlagRead_contexto_tipo) && $bFlagRead_contexto_tipo))
{
    $this->ajax_return_values_contexto_tipo(true);
}
if ($original_id_ope !== $modificado_id_ope || isset($this->nmgp_cmp_readonly['id_ope']) || (isset($bFlagRead_id_ope) && $bFlagRead_id_ope))
{
    $this->ajax_return_values_id_ope(true);
}
if ($original_id_perfil !== $modificado_id_perfil || isset($this->nmgp_cmp_readonly['id_perfil']) || (isset($bFlagRead_id_perfil) && $bFlagRead_id_perfil))
{
    $this->ajax_return_values_id_perfil(true);
}
if ($original_num_tipousuario !== $modificado_num_tipousuario || isset($this->nmgp_cmp_readonly['num_tipousuario']) || (isset($bFlagRead_num_tipousuario) && $bFlagRead_num_tipousuario))
{
    $this->ajax_return_values_num_tipousuario(true);
}
if ($original_nom_nome !== $modificado_nom_nome || isset($this->nmgp_cmp_readonly['nom_nome']) || (isset($bFlagRead_nom_nome) && $bFlagRead_nom_nome))
{
    $this->ajax_return_values_nom_nome(true);
}
if ($original_numtentativaslogin !== $modificado_numtentativaslogin || isset($this->nmgp_cmp_readonly['numtentativaslogin']) || (isset($bFlagRead_numtentativaslogin) && $bFlagRead_numtentativaslogin))
{
    $this->ajax_return_values_numtentativaslogin(true);
}
if ($original_removido_em !== $modificado_removido_em || isset($this->nmgp_cmp_readonly['removido_em']) || (isset($bFlagRead_removido_em) && $bFlagRead_removido_em))
{
    $this->ajax_return_values_removido_em(true);
}
if ($original_cargo !== $modificado_cargo || isset($this->nmgp_cmp_readonly['cargo']) || (isset($bFlagRead_cargo) && $bFlagRead_cargo))
{
    $this->ajax_return_values_cargo(true);
}
if ($original_password !== $modificado_password || isset($this->nmgp_cmp_readonly['password']) || (isset($bFlagRead_password) && $bFlagRead_password))
{
    $this->ajax_return_values_password(true);
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
if ($original_end_bairro !== $modificado_end_bairro || isset($this->nmgp_cmp_readonly['end_bairro']) || (isset($bFlagRead_end_bairro) && $bFlagRead_end_bairro))
{
    $this->ajax_return_values_end_bairro(true);
}
if ($original_end_complemento !== $modificado_end_complemento || isset($this->nmgp_cmp_readonly['end_complemento']) || (isset($bFlagRead_end_complemento) && $bFlagRead_end_complemento))
{
    $this->ajax_return_values_end_complemento(true);
}
if ($original_end_logradouro !== $modificado_end_logradouro || isset($this->nmgp_cmp_readonly['end_logradouro']) || (isset($bFlagRead_end_logradouro) && $bFlagRead_end_logradouro))
{
    $this->ajax_return_values_end_logradouro(true);
}
if ($original_num_telefonecelular !== $modificado_num_telefonecelular || isset($this->nmgp_cmp_readonly['num_telefonecelular']) || (isset($bFlagRead_num_telefonecelular) && $bFlagRead_num_telefonecelular))
{
    $this->ajax_return_values_num_telefonecelular(true);
}
if ($original_nom_telefoneresidencial !== $modificado_nom_telefoneresidencial || isset($this->nmgp_cmp_readonly['nom_telefoneresidencial']) || (isset($bFlagRead_nom_telefoneresidencial) && $bFlagRead_nom_telefoneresidencial))
{
    $this->ajax_return_values_nom_telefoneresidencial(true);
}
if ($original_num_telefonecomercial !== $modificado_num_telefonecomercial || isset($this->nmgp_cmp_readonly['num_telefonecomercial']) || (isset($bFlagRead_num_telefonecomercial) && $bFlagRead_num_telefonecomercial))
{
    $this->ajax_return_values_num_telefonecomercial(true);
}
if ($original_nom_username !== $modificado_nom_username || isset($this->nmgp_cmp_readonly['nom_username']) || (isset($bFlagRead_nom_username) && $bFlagRead_nom_username))
{
    $this->ajax_return_values_nom_username(true);
}
if ($original_nom_email2 !== $modificado_nom_email2 || isset($this->nmgp_cmp_readonly['nom_email2']) || (isset($bFlagRead_nom_email2) && $bFlagRead_nom_email2))
{
    $this->ajax_return_values_nom_email2(true);
}
if ($original_nom_email1 !== $modificado_nom_email1 || isset($this->nmgp_cmp_readonly['nom_email1']) || (isset($bFlagRead_nom_email1) && $bFlagRead_nom_email1))
{
    $this->ajax_return_values_nom_email1(true);
}
if ($original_data_nascimento !== $modificado_data_nascimento || isset($this->nmgp_cmp_readonly['data_nascimento']) || (isset($bFlagRead_data_nascimento) && $bFlagRead_data_nascimento))
{
    $this->ajax_return_values_data_nascimento(true);
}
if ($original_num_rg !== $modificado_num_rg || isset($this->nmgp_cmp_readonly['num_rg']) || (isset($bFlagRead_num_rg) && $bFlagRead_num_rg))
{
    $this->ajax_return_values_num_rg(true);
}
if ($original_num_cpf !== $modificado_num_cpf || isset($this->nmgp_cmp_readonly['num_cpf']) || (isset($bFlagRead_num_cpf) && $bFlagRead_num_cpf))
{
    $this->ajax_return_values_num_cpf(true);
}
if ($original_img_foto !== $modificado_img_foto || isset($this->nmgp_cmp_readonly['img_foto']) || (isset($bFlagRead_img_foto) && $bFlagRead_img_foto))
{
    $this->ajax_return_values_img_foto(true);
}
if ($original_num_ativo !== $modificado_num_ativo || isset($this->nmgp_cmp_readonly['num_ativo']) || (isset($bFlagRead_num_ativo) && $bFlagRead_num_ativo))
{
    $this->ajax_return_values_num_ativo(true);
}
if ($original_data_ultimologin !== $modificado_data_ultimologin || isset($this->nmgp_cmp_readonly['data_ultimologin']) || (isset($bFlagRead_data_ultimologin) && $bFlagRead_data_ultimologin))
{
    $this->ajax_return_values_data_ultimologin(true);
}
if ($original_num_totvs !== $modificado_num_totvs || isset($this->nmgp_cmp_readonly['num_totvs']) || (isset($bFlagRead_num_totvs) && $bFlagRead_num_totvs))
{
    $this->ajax_return_values_num_totvs(true);
}
if ($original_end_numero !== $modificado_end_numero || isset($this->nmgp_cmp_readonly['end_numero']) || (isset($bFlagRead_end_numero) && $bFlagRead_end_numero))
{
    $this->ajax_return_values_end_numero(true);
}
if ($original_id_usuario !== $modificado_id_usuario || isset($this->nmgp_cmp_readonly['id_usuario']) || (isset($bFlagRead_id_usuario) && $bFlagRead_id_usuario))
{
    $this->ajax_return_values_id_usuario(true);
}
form_CadastroDeUsuarios_mob_pack_ajax_response();
exit;


$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off';
}
function voltar($start="update", $typeRedir="sc_", $to="this")
{
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'on';
           
if ($start == 'update') {
	$_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios']['start'] = 'update';
} else {
	$_SESSION['hticnsdata']['sc_apl_conf']['form_CadastroDeUsuarios']['start'] = 'new';
}
$to = $to == "this" ? "form_CadastroDeUsuarios" : $to;
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
$_SESSION['hticnsdata']['form_CadastroDeUsuarios_mob']['contr_erro'] = 'off';
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
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opc_ant'] = $this->nmgp_opcao;
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
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_CadastroDeUsuarios_mob_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'] . "';";
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
       $out_img_foto = "";  
   } 
   else 
   { 
       $out_img_foto = $this->img_foto;  
   } 
   if ($this->img_foto != "" && $this->img_foto != "none")   
   { 
       $out_img_foto = $this->Ini->path_imag_temp . "/sc_img_foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ;  
       $arq_img_foto = fopen($this->Ini->root . $out_img_foto, "w") ;  
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access)) 
       { 
           $nm_tmp = nm_conv_img_access(substr($this->img_foto, 0, 12));
           if (substr($this->img_foto, 0, 4) != "*nm*" && substr($nm_tmp, 0, 4) == "*nm*") 
           { 
               $this->img_foto = nm_conv_img_access($this->img_foto);
           } 
       } 
       if (substr($this->img_foto, 0, 4) == "*nm*") 
       { 
           $this->img_foto = substr($this->img_foto, 4) ; 
           $this->img_foto = base64_decode($this->img_foto) ; 
       } 
       $img_pos_bm = strpos($this->img_foto, "BM") ; 
       if (!$img_pos_bm === FALSE && $img_pos_bm == 78) 
       { 
           $this->img_foto = substr($this->img_foto, $img_pos_bm) ; 
       } 
       fwrite($arq_img_foto, $this->img_foto) ;  
       fclose($arq_img_foto) ;  
       $sc_obj_img = new nm_trata_img($this->Ini->root . $out_img_foto);
       $this->nmgp_return_img['img_foto'][0] = $sc_obj_img->getHeight();
       $this->nmgp_return_img['img_foto'][1] = $sc_obj_img->getWidth();
       $out1_img_foto = $out_img_foto; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       $out_img_foto = $this->Ini->path_imag_temp . "/sc_" . "img_foto_" . $_SESSION['hticnsdata']['sc_num_img'] . session_id() . ".gif" ; 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
       if (!$this->Ini->Gd_missing)
       { 
           $sc_obj_img = new nm_trata_img($this->Ini->root . $out1_img_foto);
           $sc_obj_img->setWidth(200);
           $sc_obj_img->setHeight(200);
           $sc_obj_img->setManterAspecto(true);
           $sc_obj_img->createImg($this->Ini->root . $out_img_foto);
       } 
       else 
       { 
           $out_img_foto = $out1_img_foto;
       } 
       $_SESSION['hticnsdata']['sc_num_img']++ ; 
   } 
   if (isset($_POST['nmgp_opcao']) && 'excluir' == $_POST['nmgp_opcao'] && $this->sc_evento != "delete" && (!isset($this->sc_evento_old) || 'delete' != $this->sc_evento_old))
   {
       global $temp_out_img_foto;
       if (isset($temp_out_img_foto))
       {
           $out_img_foto = $temp_out_img_foto;
       }
       global $temp_out1_img_foto;
       if (isset($temp_out1_img_foto))
       {
           $out1_img_foto = $temp_out1_img_foto;
       }
   }
    include_once("form_CadastroDeUsuarios_mob_form0.php");
 }

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['table_refresh'])
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
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['csrf_token'];
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

   function Form_lookup_diasinatividade()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "30 {lang_label_dias}?#?30?#?N?@?";
       $nmgp_def_dados .= "60 {lang_label_dias}?#?60?#?N?@?";
       $nmgp_def_dados .= "90 {lang_label_dias}?#?90?#?N?@?";
       $nmgp_def_dados .= "120 {lang_label_dias}?#?120?#?N?@?";
       $nmgp_def_dados .= "180 {lang_label_dias}?#?180?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_num_ativo()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "?#?S?#??@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_num_tipousuario()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'] = array(); 
    }

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT 'G', 'GLOBALBLUE' FROM tb_usuarios WHERE 'G' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'GT', 'GLOBALBLUE Técnico' FROM tb_usuarios WHERE 'GT' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'O', 'Operadora' FROM tb_usuarios WHERE 'O' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'P', 'Prestadora' de FROM tb_usuarios WHERE 'P' IN (" . $_SESSION['profile_TypeUserCreate'] . ") UNION 
SELECT 'E', 'Empreendimento' FROM tb_usuarios WHERE 'E' IN (" . $_SESSION['profile_TypeUserCreate'] . ")";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_num_tipousuario'][] = $rs->fields[0];
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
   function Form_lookup_operadora()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'] = array(); 
    }

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID_Operadoras, Nom_Operadoras 
FROM tb_operadoras 
" . $_SESSION['profile_sqlFilterOperadora'] . " 
ORDER BY Nom_Operadoras";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_operadora'][] = $rs->fields[0];
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
   function Form_lookup_prestadora()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'] = array(); 
    }

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT tb_prestadores.ID_Prestador, tb_prestadores.Nom_RazaoSocial
FROM tb_prestadores 
" . $_SESSION['profile_sqlFilterPrestador'] . " 
ORDER BY Nom_RazaoSocial";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_prestadora'][] = $rs->fields[0];
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
   function Form_lookup_empreendimento()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'] = array(); 
    }

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID_Empreendimento, Nom_Empreendimento 
FROM tb_empreendimentos 
" . $_SESSION['profile_sqlFilterEmpreendimento'] . " 
ORDER BY Nom_Empreendimento";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

   $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando; 
   $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando)) 
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_empreendimento'][] = $rs->fields[0];
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
   function Form_lookup_id_perfil()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'] = array(); 
    }

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID, Nom_Perfil 
FROM tb_perfil 
WHERE FIND_IN_SET('$this->num_tipousuario', Tipo_Permitido) > 0 
ORDER BY Nom_Perfil";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_id_perfil'][] = $rs->fields[0];
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
   function Form_lookup_departamento()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'] = array(); 
    }

   $old_value_id_usuario = $this->id_usuario;
   $old_value_id_ope = $this->id_ope;
   $old_value_num_cpf = $this->num_cpf;
   $old_value_num_rg = $this->num_rg;
   $old_value_data_nascimento = $this->data_nascimento;
   $old_value_num_telefonecomercial = $this->num_telefonecomercial;
   $old_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $old_value_num_telefonecelular = $this->num_telefonecelular;
   $old_value_end_cep = $this->end_cep;
   $old_value_contexto_id_ope = $this->contexto_id_ope;
   $old_value_criadopor = $this->criadopor;
   $old_value_criado_em = $this->criado_em;
   $old_value_criado_em_hora = $this->criado_em_hora;
   $old_value_alterado_em = $this->alterado_em;
   $old_value_alterado_em_hora = $this->alterado_em_hora;
   $old_value_removido_em = $this->removido_em;
   $old_value_removido_em_hora = $this->removido_em_hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_id_usuario = $this->id_usuario;
   $unformatted_value_id_ope = $this->id_ope;
   $unformatted_value_num_cpf = $this->num_cpf;
   $unformatted_value_num_rg = $this->num_rg;
   $unformatted_value_data_nascimento = $this->data_nascimento;
   $unformatted_value_num_telefonecomercial = $this->num_telefonecomercial;
   $unformatted_value_nom_telefoneresidencial = $this->nom_telefoneresidencial;
   $unformatted_value_num_telefonecelular = $this->num_telefonecelular;
   $unformatted_value_end_cep = $this->end_cep;
   $unformatted_value_contexto_id_ope = $this->contexto_id_ope;
   $unformatted_value_criadopor = $this->criadopor;
   $unformatted_value_criado_em = $this->criado_em;
   $unformatted_value_criado_em_hora = $this->criado_em_hora;
   $unformatted_value_alterado_em = $this->alterado_em;
   $unformatted_value_alterado_em_hora = $this->alterado_em_hora;
   $unformatted_value_removido_em = $this->removido_em;
   $unformatted_value_removido_em_hora = $this->removido_em_hora;

   $nm_comando = "SELECT ID, Nome 
FROM tb_departamentos 
WHERE Num_Ativo = 'S' 
ORDER BY Nome";

   $this->id_usuario = $old_value_id_usuario;
   $this->id_ope = $old_value_id_ope;
   $this->num_cpf = $old_value_num_cpf;
   $this->num_rg = $old_value_num_rg;
   $this->data_nascimento = $old_value_data_nascimento;
   $this->num_telefonecomercial = $old_value_num_telefonecomercial;
   $this->nom_telefoneresidencial = $old_value_nom_telefoneresidencial;
   $this->num_telefonecelular = $old_value_num_telefonecelular;
   $this->end_cep = $old_value_end_cep;
   $this->contexto_id_ope = $old_value_contexto_id_ope;
   $this->criadopor = $old_value_criadopor;
   $this->criado_em = $old_value_criado_em;
   $this->criado_em_hora = $old_value_criado_em_hora;
   $this->alterado_em = $old_value_alterado_em;
   $this->alterado_em_hora = $old_value_alterado_em_hora;
   $this->removido_em = $old_value_removido_em;
   $this->removido_em_hora = $old_value_removido_em_hora;

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
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['Lookup_departamento'][] = $rs->fields[0];
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
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_CadastroDeUsuarios_mob_pack_ajax_response();
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
          $this->SC_monta_condicao($comando, "ID_Usuario", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_UserName", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "password", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_perfil($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Perfil", $arg_search, $data_lookup);
          }
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
          $this->SC_monta_condicao($comando, "Num_TOTVS", $arg_search, $data_search);
      }
      {
          $this->SC_monta_condicao($comando, "Data_UltimoLogin", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_Usuario", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_UserName", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_diasinatividade($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "DiasInatividade", $arg_search, $data_lookup);
          }
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
          $this->SC_monta_condicao($comando, "Num_TOTVS", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_num_tipousuario($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Num_TipoUsuario", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_id_perfil($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "ID_Perfil", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "ID_OPE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Nome", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_CPF", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_RG", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Cargo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_departamento($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "Departamento", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Email1", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_Email2", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TelefoneComercial", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Nom_TelefoneResidencial", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Num_TelefoneCelular", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "End_Complemento", $arg_search, $data_search);
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
          $this->SC_monta_condicao($comando, "End_Cidade", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "End_UF", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contexto_Tipo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "Contexto_ID_OPE", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "CriadoPor", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter_form'] . " and (ID_Usuario = '" . $_SESSION['grid_ID_Usuario'] . "') and (" . $comando . ")";
      }
      else
      {
          $sc_where = " where ID_Usuario = '" . $_SESSION['grid_ID_Usuario'] . "' and (" . $comando . ")";
      }
      $nmgp_select = "SELECT count(*) from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_CadastroDeUsuarios_mob = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['total'] = $qt_geral_reg_form_CadastroDeUsuarios_mob;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadastroDeUsuarios_mob_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_CadastroDeUsuarios_mob_pack_ajax_response();
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
      $nm_numeric[] = "id_usuario";$nm_numeric[] = "id_perfil";$nm_numeric[] = "id_ope";$nm_numeric[] = "contexto_id_ope";$nm_numeric[] = "criadopor";$nm_numeric[] = "diasinatividade";$nm_numeric[] = "numtentativaslogin";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['decimal_db'] == ".")
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
      $Nm_datas['data_ultimologin'] = "datetime";$Nm_datas['data_nascimento'] = "date";$Nm_datas['criado_em'] = "datetime";$Nm_datas['alterado_em'] = "datetime";$Nm_datas['removido_em'] = "datetime";
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
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['SC_sep_date1'];
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
   function SC_lookup_id_perfil($condicao, $campo)
   {
       $result = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && ($condicao == "eq" || $condicao == "qp" || $condicao == "np" || $condicao == "ii" || $condicao == "df"))
       {
           $nm_comando = "SELECT Nom_Perfil, ID FROM tb_perfil WHERE (CAST (ID AS TEXT) LIKE '%$campo%')" ; 
       }
       else
       {
           $nm_comando = "SELECT Nom_Perfil, ID FROM tb_perfil WHERE (Nom_Perfil LIKE '%$campo%')" ; 
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
   function SC_lookup_num_ativo($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['S'] = "";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
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
          
       }
       return $result;
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
       $nmgp_saida_form = "form_CadastroDeUsuarios_mob_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_CadastroDeUsuarios_mob_fim.php";
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
       form_CadastroDeUsuarios_mob_pack_ajax_response();
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
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['sc_modal'])
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
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['masterValue']);
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
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob'][substr($val, 1, -1)];
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
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_CadastroDeUsuarios_mob']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_CadastroDeUsuarios_mob_pack_ajax_response();
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
       form_CadastroDeUsuarios_mob_pack_ajax_response();
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
        if ('alterado_em' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }
        if ('removido_em' == $sField)
        {
            $sFieldDateTime = $sField . '_hora';
        }
        if ('data_ultimologin' == $sField)
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
