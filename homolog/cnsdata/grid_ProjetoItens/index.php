<?php
   include_once('grid_ProjetoItens_session.php');
   @session_start() ;
   $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_prod']       = "";
   $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_conf']       = "";
   $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imagens']    = "";
   $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imag_temp']  = "";
   $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_doc']        = "";
//
class grid_ProjetoItens_ini
{
   var $nm_cod_apl;
   var $nm_nome_apl;
   var $nm_seguranca;
   var $nm_grupo;
   var $nm_autor;
   var $nm_versao_sc;
   var $nm_tp_lic_sc;
   var $nm_dt_criacao;
   var $nm_hr_criacao;
   var $nm_autor_alt;
   var $nm_dt_ult_alt;
   var $nm_hr_ult_alt;
   var $nm_timestamp;
   var $nm_app_version;
   var $cor_link_dados;
   var $root;
   var $server;
   var $java_protocol;
   var $server_pdf;
   var $Arr_result;
   var $sc_protocolo;
   var $path_prod;
   var $path_link;
   var $path_aplicacao;
   var $path_embutida;
   var $path_botoes;
   var $path_img_global;
   var $path_img_modelo;
   var $path_icones;
   var $path_imagens;
   var $path_imag_cab;
   var $path_imag_temp;
   var $path_libs;
   var $path_doc;
   var $str_lang;
   var $str_conf_reg;
   var $str_schema_all;
   var $Str_btn_grid;
   var $path_cep;
   var $path_secure;
   var $path_js;
   var $path_help;
   var $path_adodb;
   var $path_grafico;
   var $path_atual;
   var $Gd_missing;
   var $sc_site_ssl;
   var $nm_cont_lin;
   var $nm_limite_lin;
   var $nm_limite_lin_prt;
   var $nm_limite_lin_res;
   var $nm_limite_lin_res_prt;
   var $nm_falta_var;
   var $nm_falta_var_db;
   var $nm_tpbanco;
   var $nm_servidor;
   var $nm_usuario;
   var $nm_senha;
   var $nm_database_encoding;
   var $nm_arr_db_extra_args = array();
   var $nm_con_db2 = array();
   var $nm_con_persistente;
   var $nm_con_use_schema;
   var $nm_tabela;
   var $nm_ger_css_emb;
   var $nm_col_dinamica   = array();
   var $nm_order_dinamico = array();
   var $nm_hidden_blocos  = array();
   var $sc_tem_trans_banco;
   var $nm_bases_all;
   var $nm_bases_access;
   var $nm_bases_db2;
   var $nm_bases_ibase;
   var $nm_bases_informix;
   var $nm_bases_mssql;
   var $nm_bases_mysql;
   var $nm_bases_postgres;
   var $nm_bases_oracle;
   var $nm_bases_sqlite;
   var $nm_bases_sybase;
   var $nm_bases_vfp;
   var $nm_bases_odbc;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
//
   function init($Tp_init = "")
   {
       global
             $nm_url_saida, $nm_apl_dependente, $hti_cnsdata_init, $nmgp_opcao;

      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
      $_SESSION['hticnsdata']['proc_mobile'] = sc_check_mobile();
      @ini_set('magic_quotes_runtime', 0);
      $this->sc_page = $hti_cnsdata_init;
      $_SESSION['hticnsdata']['sc_num_page'] = $hti_cnsdata_init;
      $_SESSION['hticnsdata']['sc_cnt_sql']  = 0;
      $this->sc_charset['UTF-8'] = 'utf-8';
      $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
      $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
      $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
      $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
      $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
      $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
      $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
      $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
      $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
      $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
      $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
      $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
      $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
      $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
      $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
      $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
      $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
      $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
      $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
      $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
      $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
      $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
      $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
      $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
      $this->sc_charset['KOI8-R'] = 'koi8-r';
      $this->sc_charset['BIG-5'] = 'big5';
      $this->sc_charset['EUC-CN'] = 'EUC-CN';
      $this->sc_charset['GB18030'] = 'GB18030';
      $this->sc_charset['GB2312'] = 'gb2312';
      $this->sc_charset['EUC-JP'] = 'euc-jp';
      $this->sc_charset['SJIS'] = 'shift-jis';
      $this->sc_charset['EUC-KR'] = 'euc-kr';
      $_SESSION['hticnsdata']['charset_entities']['UTF-8'] = 'UTF-8';
      $_SESSION['hticnsdata']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
      $_SESSION['hticnsdata']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
      $_SESSION['hticnsdata']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
      $_SESSION['hticnsdata']['charset_entities']['WINDOWS-1251'] = 'cp1251';
      $_SESSION['hticnsdata']['charset_entities']['WINDOWS-1252'] = 'cp1252';
      $_SESSION['hticnsdata']['charset_entities']['BIG-5'] = 'BIG5';
      $_SESSION['hticnsdata']['charset_entities']['EUC-CN'] = 'GB2312';
      $_SESSION['hticnsdata']['charset_entities']['GB2312'] = 'GB2312';
      $_SESSION['hticnsdata']['charset_entities']['SJIS'] = 'Shift_JIS';
      $_SESSION['hticnsdata']['charset_entities']['EUC-JP'] = 'EUC-JP';
      $_SESSION['hticnsdata']['charset_entities']['KOI8-R'] = 'KOI8-R';
      $_SESSION['hticnsdata']['trial_version'] = 'N';
      $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "grid_ProjetoItens"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "CNSData"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "sb_bronze"; 
      $this->nm_dt_criacao   = "20170802"; 
      $this->nm_hr_criacao   = "171801"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20180605"; 
      $this->nm_hr_ult_alt   = "171642"; 
      $temp_bug_list         = explode(" ", microtime()); 
      list($NM_usec, $NM_sec) = $temp_bug_list; 
      $this->nm_timestamp    = (float) $NM_sec; 
      $this->nm_app_version  = "1.0.0";
// 
// 
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
          $str_path_sys          = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
          $str_path_sys          = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
          $sc_nm_arquivo         = explode("/", $_SERVER['PHP_SELF']);
          $str_path_sys          = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
      //check publication with the prod
      $str_path_apl_url = $_SERVER['PHP_SELF'];
      $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
      $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
      $str_path_apl_dir = substr($str_path_sys, 0, strrpos($str_path_sys, "/"));
      $str_path_apl_dir = substr($str_path_apl_dir, 0, strrpos($str_path_apl_dir, "/")+1);
      //check prod
      if(empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_path_doc'];
      if (!isset($_SESSION['hticnsdata']['str_lang']) || empty($_SESSION['hticnsdata']['str_lang']))
      {
          $_SESSION['hticnsdata']['str_lang'] = "pt_br";
      }
      if (!isset($_SESSION['hticnsdata']['str_conf_reg']) || empty($_SESSION['hticnsdata']['str_conf_reg']))
      {
          $_SESSION['hticnsdata']['str_conf_reg'] = "pt_br";
      }
      $this->str_lang        = $_SESSION['hticnsdata']['str_lang'];
      $this->str_conf_reg    = $_SESSION['hticnsdata']['str_conf_reg'];
      $this->str_schema_all    = (isset($_SESSION['hticnsdata']['str_schema_all']) && !empty($_SESSION['hticnsdata']['str_schema_all'])) ? $_SESSION['hticnsdata']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
      $_SESSION['hticnsdata']['erro']['str_schema'] = $this->str_schema_all . "_error.css";
      $_SESSION['hticnsdata']['erro']['str_lang']   = $this->str_lang;
      $this->server          = (!isset($_SERVER['HTTP_HOST'])) ? $_SERVER['SERVER_NAME'] : $_SERVER['HTTP_HOST'];
      if (!isset($_SERVER['HTTP_HOST']) && isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != 80 && !$this->sc_site_ssl )
      {
          $this->server         .= ":" . $_SERVER['SERVER_PORT'];
      }
      $this->java_protocol   = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->server_pdf      = $this->java_protocol . $this->server;
      $this->server          = "";
      $str_path_web          = $_SERVER['PHP_SELF'];
      $str_path_web          = str_replace("\\", '/', $str_path_web);
      $str_path_web          = str_replace('//', '/', $str_path_web);
      $this->root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
      $this->path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/grid_ProjetoItens';
      $this->path_embutida   = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/') + 1);
      $this->path_aplicacao .= '/';
      $this->path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
      $this->path_link       = substr($this->path_link, 0, strrpos($this->path_link, '/')) . '/';
      $this->path_botoes     = $this->path_link . "_lib/img";
      $this->path_img_global = $this->path_link . "_lib/img";
      $this->path_img_modelo = $this->path_link . "_lib/img";
      $this->path_icones     = $this->path_link . "_lib/img";
      $this->path_imag_cab   = $this->path_link . "_lib/img";
      $this->path_help       = $this->path_link . "_lib/webhelp/";
      $this->path_font       = $this->root . $this->path_link . "_lib/font/";
      $this->path_btn        = $this->root . $this->path_link . "_lib/buttons/";
      $this->path_css        = $this->root . $this->path_link . "_lib/css/";
      $this->path_lib_php    = $this->root . $this->path_link . "_lib/lib/php";
      $this->path_lib_js     = $this->root . $this->path_link . "_lib/lib/js";
      $this->path_lang       = "../_lib/lang/";
      $this->path_lang_js    = "../_lib/js/";
      $this->path_chart_theme = $this->root . $this->path_link . "_lib/chart/";
      $this->path_cep        = $this->path_prod . "/cep";
      $this->path_cor        = $this->path_prod . "/cor";
      $this->path_js         = $this->path_prod . "/lib/js";
      $this->path_libs       = $this->root . $this->path_prod . "/lib/php";
      $this->path_third      = $this->root . $this->path_prod . "/third";
      $this->path_secure     = $this->root . $this->path_prod . "/secure";
      $this->path_adodb      = $this->root . $this->path_prod . "/third/adodb";
      $_SESSION['hticnsdata']['dir_temp'] = $this->root . $this->path_imag_temp;
      if (!isset($_SESSION['hticnsdata']['fusioncharts_new']))
      {
          $_SESSION['hticnsdata']['fusioncharts_new'] = @is_dir($this->path_third . '/fusioncharts_xt_ol');
      }
      if (!isset($_SESSION['hticnsdata']['phantomjs_charts']))
      {
          $_SESSION['hticnsdata']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs');
      }
      if (isset($_SESSION['hticnsdata']['phantomjs_charts']))
      {
          $aTmpOS = $this->getRunningOS();
          $_SESSION['hticnsdata']['phantomjs_charts'] = @is_dir($this->path_third . '/phantomjs/' . $aTmpOS['os']);
      }
      if (!class_exists('Services_JSON'))
      {
          include_once("grid_ProjetoItens_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['ancor_save'] = $_POST['ancor_save'];
          $oJson = new Services_JSON();
          exit;
      }
      if (isset($_SESSION['hticnsdata']['user_logout']))
      {
          foreach ($_SESSION['hticnsdata']['user_logout'] as $ind => $parms)
          {
              if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
              {
                  unset($_SESSION['hticnsdata']['user_logout'][$ind]);
                  $nm_apl_dest = $parms['R'];
                  $dir = explode("/", $nm_apl_dest);
                  if (count($dir) == 1)
                  {
                      $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                      $nm_apl_dest = $this->path_link . SC_dir_app_name($nm_apl_dest) . "/";
                  }
                  if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_event" || $_POST['nmgp_opcao'] == "ajax_navigate"))
                  {
                      $this->Arr_result = array();
                      $this->Arr_result['redirInfo']['action']              = $nm_apl_dest;
                      $this->Arr_result['redirInfo']['target']              = $parms['T'];
                      $this->Arr_result['redirInfo']['metodo']              = "post";
                      $this->Arr_result['redirInfo']['hti_cnsdata_init']    = $this->sc_page;
                      $this->Arr_result['redirInfo']['hti_cnsdata_session'] = session_id();
                      $oJson = new Services_JSON();
                      echo $oJson->encode($this->Arr_result);
                      exit;
                  }
?>
                  <html>
                  <body>
                  <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                  </form>
                  <script>
                   document.FRedirect.submit();
                  </script>
                  </body>
                  </html>
<?php
                  exit;
              }
          }
      }
      global $under_dashboard, $dashboard_app, $own_widget, $parent_widget, $compact_mode;
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['compact_mode']    = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["grid_ProjetoItens"]))
          {
              foreach ($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["grid_ProjetoItens"] as $sTmpTargetLink => $sTmpTargetWidget)
              {
                  if (isset($this->sc_lig_target[$sTmpTargetLink]))
                  {
                      $this->sc_lig_target[$sTmpTargetLink] = $sTmpTargetWidget;
                  }
              }
          }
      }
      if ($Tp_init == "Path_sub")
      {
          return;
      }
      $str_path = substr($this->path_prod, 0, strrpos($this->path_prod, '/') + 1);
      if (!is_file($this->root . $str_path . 'devel/class/xmlparser/nmXmlparserIniSys.class.php'))
      {
          unset($_SESSION['hticnsdata']['nm_sc_retorno']);
          unset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['hticnsdata']['charset']  = (isset($this->Nm_lang['Nm_charset']) && !empty($this->Nm_lang['Nm_charset'])) ? $this->Nm_lang['Nm_charset'] : "UTF-8";
      ini_set('default_charset', $_SESSION['hticnsdata']['charset']);
      $_SESSION['hticnsdata']['charset_html']  = (isset($this->sc_charset[$_SESSION['hticnsdata']['charset']])) ? $this->sc_charset[$_SESSION['hticnsdata']['charset']] : $_SESSION['hticnsdata']['charset'];
      if (!function_exists("mb_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtmb'] . "</font></div>";exit;
      } 
      elseif (!function_exists("sc_convert_encoding"))
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_xtsc'] . "</font></div>";exit;
      } 
      foreach ($this->Nm_lang_conf_region as $ind => $dados)
      {
         if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang_conf_region[$ind] = sc_convert_encoding($dados, $_SESSION['hticnsdata']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
      {
         if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['hticnsdata']['charset'], "UTF-8");
         }
      }
      foreach ($this->Nm_lang as $ind => $dados)
      {
         if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($ind))
         {
             $ind = sc_convert_encoding($ind, $_SESSION['hticnsdata']['charset'], "UTF-8");
             $this->Nm_lang[$ind] = $dados;
         }
         if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($dados))
         {
             $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['hticnsdata']['charset'], "UTF-8");
         }
      }
      $_SESSION['sc_session']['SC_download_violation'] = $this->Nm_lang['lang_errm_fnfd'];
      if (isset($_SESSION['sc_session']['SC_parm_violation']))
      {
          unset($_SESSION['sc_session']['SC_parm_violation']);
          echo "<html>";
          echo "<body>";
          echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
          echo "<tr>";
          echo "   <td align=\"center\">";
          echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          echo "</body>";
          echo "</html>";
          exit;
      }
      if (isset($this->Nm_lang['lang_errm_dbcn_conn']))
      {
          $_SESSION['hticnsdata']['db_conn_error'] = $this->Nm_lang['lang_errm_dbcn_conn'];
      }
      $PHP_ver = str_replace(".", "", phpversion()); 
      if (substr($PHP_ver, 0, 3) < 434)
      {
          echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_phpv'] . "</font></div>";exit;
      } 
      if (file_exists($this->path_libs . "/ver.dat"))
      {
          $SC_ver = file($this->path_libs . "/ver.dat"); 
          $SC_ver = str_replace(".", "", $SC_ver[0]); 
          if (substr($SC_ver, 0, 5) < 40015)
          {
              echo "<div><font size=6>" . $this->Nm_lang['lang_othr_prod_incp'] . "</font></div>";exit;
          } 
      } 
      $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['path_doc'] = $this->path_doc; 
      $_SESSION['hticnsdata']['nm_path_prod'] = $this->root . $this->path_prod . "/"; 
      if (empty($this->path_imag_cab))
      {
          $this->path_imag_cab = $this->path_img_global;
      }
      if (!is_dir($this->root . $this->path_prod))
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 0 12px !important;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 0 12px;  }";
          echo ".scButton_group { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 7.8px 15px;margin:0px -5px !important;  }";
          echo ".scButton_groupdisabled { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 7.8px 15px;margin:0px -5px !important;  }";
          echo ".scButton_groupfirst { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 7.8px 15px;  }";
          echo ".scButton_grouplast { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 0 12px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;box-shadow: inset 0 1px 0 rgba(31, 45, 61, 0.15);; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;box-shadow: inset 0 -1px 0 rgba(31, 45, 61, 0.15);; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #1B8FC8;}.scButton_default:hover img, .scButton_groupfirst:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_default:hover{; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_small { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 3px 13px !important;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_cmlb_nfnd'] . "</font>";
          echo "  " . $this->root . $this->path_prod;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['hticnsdata']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }

      $this->nm_ger_css_emb = true;
      $this->path_atual     = getcwd();
      $opsys = strtolower(php_uname());

      $this->nm_cont_lin           = 0;
      $this->nm_limite_lin         = 0;
      $this->nm_limite_lin_prt     = 0;
      $this->nm_limite_lin_res     = 0;
      $this->nm_limite_lin_res_prt = 0;
// 
      include_once($this->path_aplicacao . "grid_ProjetoItens_erro.class.php"); 
      $this->Erro = new grid_ProjetoItens_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('grid_ProjetoItens'); 
// 
      $this->sc_Include($this->path_lib_php . "/nm_functions.php", "", "") ; 
      $this->sc_Include($this->path_lib_php . "/nm_edit.php", "F", "nmgp_Form_Num_Val") ; 
      $this->sc_Include($this->path_lib_php . "/nm_conv_dados.php", "F", "nm_conv_limpa_dado") ; 
      $this->sc_Include($this->path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
      $this->nm_data = new nm_data("pt_br");
      include("../_lib/css/" . $this->str_schema_all . "_grid.php");
      $this->Tree_img_col    = trim($str_tree_col);
      $this->Tree_img_exp    = trim($str_tree_exp);
      perfil_lib($this->path_libs);
      if (!isset($_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil']))
      {
          if(function_exists("nm_check_perfil_exists")) nm_check_perfil_exists($this->path_libs, $this->path_prod);
          $_SESSION['sc_session'][$this->sc_page]['SC_Check_Perfil'] = true;
      }
      if (function_exists("nm_check_pdf_server")) $this->server_pdf = nm_check_pdf_server($this->path_libs, $this->server_pdf);
      if (!isset($_SESSION['hticnsdata']['sc_num_img']))
      { 
          $_SESSION['hticnsdata']['sc_num_img'] = 1;
      } 
      $this->arr_buttons_usr = array();

      $this->arr_buttons_usr['voltar']['hint']             = "";
      $this->arr_buttons_usr['voltar']['type']             = "button";
      $this->arr_buttons_usr['voltar']['value']            = "" . $this->Nm_lang['lang_btn_return'] . "";
      $this->arr_buttons_usr['voltar']['display']          = "only_text";
      $this->arr_buttons_usr['voltar']['display_position'] = "text_right";
      $this->arr_buttons_usr['voltar']['style']            = "default";
      $this->arr_buttons_usr['voltar']['image']            = "";

      $this->arr_buttons_usr['enviarProjeto']['hint']             = "" . $this->Nm_lang['lang_btn_submitreview'] . "";
      $this->arr_buttons_usr['enviarProjeto']['type']             = "button";
      $this->arr_buttons_usr['enviarProjeto']['value']            = "" . $this->Nm_lang['lang_btn_submitreview'] . "";
      $this->arr_buttons_usr['enviarProjeto']['display']          = "only_text";
      $this->arr_buttons_usr['enviarProjeto']['display_position'] = "text_right";
      $this->arr_buttons_usr['enviarProjeto']['style']            = "default";
      $this->arr_buttons_usr['enviarProjeto']['image']            = "";

      $this->arr_buttons_usr['confirmeEnviarProjeto']['hint']             = "" . $this->Nm_lang['lang_btn_submitreview'] . "";
      $this->arr_buttons_usr['confirmeEnviarProjeto']['type']             = "button";
      $this->arr_buttons_usr['confirmeEnviarProjeto']['value']            = "" . $this->Nm_lang['lang_btn_submitreview'] . "";
      $this->arr_buttons_usr['confirmeEnviarProjeto']['display']          = "only_text";
      $this->arr_buttons_usr['confirmeEnviarProjeto']['display_position'] = "text_right";
      $this->arr_buttons_usr['confirmeEnviarProjeto']['style']            = "default";
      $this->arr_buttons_usr['confirmeEnviarProjeto']['image']            = "";

      $this->arr_buttons_usr['iniciarAnalise']['hint']             = "";
      $this->arr_buttons_usr['iniciarAnalise']['type']             = "button";
      $this->arr_buttons_usr['iniciarAnalise']['value']            = "iniciarAnalise";
      $this->arr_buttons_usr['iniciarAnalise']['display']          = "only_text";
      $this->arr_buttons_usr['iniciarAnalise']['display_position'] = "text_right";
      $this->arr_buttons_usr['iniciarAnalise']['style']            = "default";
      $this->arr_buttons_usr['iniciarAnalise']['image']            = "";

      $this->arr_buttons_usr['confirmeIniciarAnalise']['hint']             = "Iniciar análise";
      $this->arr_buttons_usr['confirmeIniciarAnalise']['type']             = "button";
      $this->arr_buttons_usr['confirmeIniciarAnalise']['value']            = "" . $this->Nm_lang['lang_btn_startAnalysis'] . "";
      $this->arr_buttons_usr['confirmeIniciarAnalise']['display']          = "only_text";
      $this->arr_buttons_usr['confirmeIniciarAnalise']['display_position'] = "text_right";
      $this->arr_buttons_usr['confirmeIniciarAnalise']['style']            = "default";
      $this->arr_buttons_usr['confirmeIniciarAnalise']['image']            = "";

      $this->arr_buttons_usr['confirmePauseAnalise']['hint']             = "" . $this->Nm_lang['lang_btn_pauseAnalysis'] . "";
      $this->arr_buttons_usr['confirmePauseAnalise']['type']             = "button";
      $this->arr_buttons_usr['confirmePauseAnalise']['value']            = "" . $this->Nm_lang['lang_btn_pauseAnalysis'] . "";
      $this->arr_buttons_usr['confirmePauseAnalise']['display']          = "only_text";
      $this->arr_buttons_usr['confirmePauseAnalise']['display_position'] = "text_right";
      $this->arr_buttons_usr['confirmePauseAnalise']['style']            = "default";
      $this->arr_buttons_usr['confirmePauseAnalise']['image']            = "";

      $this->arr_buttons_usr['pauseAnalise']['hint']             = "";
      $this->arr_buttons_usr['pauseAnalise']['type']             = "button";
      $this->arr_buttons_usr['pauseAnalise']['value']            = "pauseAnalise";
      $this->arr_buttons_usr['pauseAnalise']['display']          = "only_text";
      $this->arr_buttons_usr['pauseAnalise']['display_position'] = "text_right";
      $this->arr_buttons_usr['pauseAnalise']['style']            = "default";
      $this->arr_buttons_usr['pauseAnalise']['image']            = "";

      $this->arr_buttons_usr['confirmeFimAnalise']['hint']             = "" . $this->Nm_lang['lang_btn_finishAnalysis'] . "";
      $this->arr_buttons_usr['confirmeFimAnalise']['type']             = "button";
      $this->arr_buttons_usr['confirmeFimAnalise']['value']            = "" . $this->Nm_lang['lang_btn_finishAnalysis'] . "";
      $this->arr_buttons_usr['confirmeFimAnalise']['display']          = "only_text";
      $this->arr_buttons_usr['confirmeFimAnalise']['display_position'] = "text_right";
      $this->arr_buttons_usr['confirmeFimAnalise']['style']            = "default";
      $this->arr_buttons_usr['confirmeFimAnalise']['image']            = "";

      $this->arr_buttons_usr['fimAnalise']['hint']             = "";
      $this->arr_buttons_usr['fimAnalise']['type']             = "button";
      $this->arr_buttons_usr['fimAnalise']['value']            = "fimAnalise";
      $this->arr_buttons_usr['fimAnalise']['display']          = "only_text";
      $this->arr_buttons_usr['fimAnalise']['display_position'] = "text_right";
      $this->arr_buttons_usr['fimAnalise']['style']            = "default";
      $this->arr_buttons_usr['fimAnalise']['image']            = "";

      $this->arr_buttons_usr['tempoDecorrido']['hint']             = "";
      $this->arr_buttons_usr['tempoDecorrido']['type']             = "button";
      $this->arr_buttons_usr['tempoDecorrido']['value']            = "<span id='tempo-decorrido'></span>";
      $this->arr_buttons_usr['tempoDecorrido']['display']          = "only_text";
      $this->arr_buttons_usr['tempoDecorrido']['display_position'] = "text_right";
      $this->arr_buttons_usr['tempoDecorrido']['style']            = "default";
      $this->arr_buttons_usr['tempoDecorrido']['image']            = "";

      $this->arr_buttons_usr['cabecalhoDoc']['hint']             = "" . $this->Nm_lang['lang_btn_editheader'] . "";
      $this->arr_buttons_usr['cabecalhoDoc']['type']             = "button";
      $this->arr_buttons_usr['cabecalhoDoc']['value']            = "" . $this->Nm_lang['lang_btn_editheader'] . "";
      $this->arr_buttons_usr['cabecalhoDoc']['display']          = "only_text";
      $this->arr_buttons_usr['cabecalhoDoc']['display_position'] = "text_right";
      $this->arr_buttons_usr['cabecalhoDoc']['style']            = "default";
      $this->arr_buttons_usr['cabecalhoDoc']['image']            = "";

      $this->arr_buttons_usr['downloadZip']['hint']             = "Download .zip";
      $this->arr_buttons_usr['downloadZip']['type']             = "button";
      $this->arr_buttons_usr['downloadZip']['value']            = "Download .zip";
      $this->arr_buttons_usr['downloadZip']['display']          = "only_text";
      $this->arr_buttons_usr['downloadZip']['display_position'] = "text_right";
      $this->arr_buttons_usr['downloadZip']['style']            = "default";
      $this->arr_buttons_usr['downloadZip']['image']            = "";
      $this->regionalDefault();
      $this->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".php";
      $this->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->path_btn . $this->Str_btn_grid);
      $_SESSION['hticnsdata']['erro']['str_schema_dir'] = $this->str_schema_all . "_error" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css";
      $this->sc_tem_trans_banco = false;
      $this->nm_bases_access     = array("access", "ado_access");
      $this->nm_bases_db2        = array("db2", "db2_odbc", "odbc_db2", "odbc_db2v6");
      $this->nm_bases_ibase      = array("ibase", "firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['sub_dir'] = array(); 
      $_SESSION['hticnsdata']['nm_bases_security']  = "enc_nm_enc_v1DcBiH9FUDSN7HuXGHuvmVcXKDWFYHIBiDcFYH9BqHIrwHQXGDEvsHArsDWF/HIFUD9NwH9BiD1BeD5JwHgrYDkBsDWXCDoJsDcBwH9B/Z1rYHQJwHgveVkJ3DWF/VoBiDcJUZSX7Z1BYHuFaDMBOVIFCDuFGVorqHQJmH9BqHIBeHQFUHgBOZSJqDWX7HINUHQNwH9BiHAveD5NUHgNKDkBOV5FYHMBiD9XOH9B/HAN7D5BiDMBYVkJGDWr/DoB/D9XsH9FGDSN7D5JwDMvmVcFKV5BmVoBqD9BsZkFGHAvsD5FaDMzGZSJGDWr/VoXGDcBwDQB/Z1rwHQFaHuzGVIBOV5X7DoBiDcJUZ1FaD1rKD5FaHgrKHEJGH5F/VoB/D9XsH9FGD1BOD5NUHuzGVcFKDur/VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIXGD9FYDQJwHAvCVWJwHgrKDkBODur/HMBODcBqH9B/HIveHQJeHgvsZSXeV5FaZuB/D9FYDQFGHANOD5JeDMvmVcFKV5BmVoBqD9BsZkFGHArKHuBOHgBYVkJ3HEXKDoJeHQXODuFaHAN7HQFaDMrwVcB/DWXKVENUHQXGZ1FGD1vsD5XGHgvCHArCHEXKZuFaHQXsDQB/HANKVWBqDMrwV9BUDur/HIX7HQBiZkBiHIveHQraDMrYZSXeDuFYVoXGDcJeZ9rqD1BeHuX7DMvsVIBsDWFYHMX7HQXGZSBqHINKZMBOHgvCHArCDWFqHMBqDcXGDQFUDSN7HQB/DMrwV9BUDWrmVEFGDcNmZSBODSNOHQFUHgvCHArCHEXCHMJsHQXODQB/HArYHuBOHgNKDkBODuFqDoFGDcBqVIJwD1rwHQrqHgBYVkJqH5FYHIB/HQBiH9FUHAveHuBqDMrwV9BUDurGVEF7HQBiZ1X7HIBOZMBqHgvCHEJqDWF/HMJeHQNwZSBiZ1N7HuBiDMrwV9FeDurGVoFGHQXOZSBqZ1vmZMFaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7VorqDcBqZ1FaD1rKV5XGDMNKZSJ3H5X/ZuJsHQXGZSFUHAveV5BOHuNODkBODuX7VoX7DcBqZ1B/Z1vOD5raHgBOVkXeHEFqVoX7DcBwDQFGD1BOV5JwDMBYVIBODWFYVENUHQBiZ1B/HABYV5JsDMzGHAFKV5FaVoBiD9XsZSFGHAN7V5JwDMrwDkFCDuX7VEF7D9BiH9FaHAN7D5FaDEBOZSJGH5BmDoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUHQXsDQFaHABYHuJeDMvOVcBUDWB3VoF7DcFYVIJsHAN7HuFaHgveHArsDWXCHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWrmVorqHQNmZkBiHINKD5BqHgNKDkXKDWBmZuBqHQJKDQJsZ1vCV5FGHuNOV9FeDWB3VENUD9XOZ1BiHIveD5BiDEBeHEBUDuFaHIFUHQJKZSBiHANOV5X7DMvmV9FeDWXCDoJsDcBwH9B/Z1rYHQJwHgNOVkJ3DWFGDoNUDcXGDQJsHABYV5FGHuNOVIBOV5X7DoJeD9BsH9B/HIBeV5JeDMBYHAFKDWF/VoFaDcJeDuBOHAveHuFGHuNOVIBODWF/VoraD9XOZSB/Z1rYD5NUVgzGVINiH5FYDoB/DcJUDQFaHABYHuFGDMBOVIBsDWFYHIrqHQXOZkFUZ1rYHuBOHgBOHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvsV9FiV5BmVorq";
      $this->prep_conect();
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['initialize']) && $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['initialize'])  
      { 
          $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
               ob_start();
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['initialize'] = false;
      } 
      $this->conectDB();
      if (!in_array(strtolower($this->nm_tpbanco), $this->nm_bases_all))
      {
          echo "<tr>";
          echo "   <td bgcolor=\"\">";
          echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nspt'] . "</font>";
          echo "  " . $perfil_trab;
          echo "   </b></td>";
          echo " </tr>";
          echo "</table>";
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno'])) 
              { 
                  echo "<a href='" . $_SESSION['hticnsdata']['nm_sc_retorno'] . "' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_hticnsdata9_Rhino_bvoltar.gif' title='" . $this->Nm_lang['lang_btns_rtrn_scrp_hint'] . "' align=absmiddle></a> \n" ; 
              } 
              else 
              { 
                  echo "<a href='$nm_url_saida' target='_self'><img border='0' src='" . $this->path_botoes . "/nm_hticnsdata9_Rhino_bsair.gif' title='" . $this->Nm_lang['lang_btns_exit_appl_hint'] . "' align=absmiddle></a> \n" ; 
              } 
          } 
          exit ;
      } 
      if (empty($this->nm_tabela))
      {
          $this->nm_tabela = "tb_itens  INNER JOIN tb_projetoitensanalise ON tb_projetoitensanalise.ID_Projetoitens = tb_itens.ID_Item AND tb_projetoitensanalise.ID_Projeto = '" . $_SESSION['id_Projeto'] . "'"; 
      }
   }

   function getRunningOS()
   {
       $aOSInfo = array();

       if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
       {
           $aOSInfo['os'] = 'win';
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
       {
           $aOSInfo['os'] = 'linux-i386';
           if(strpos(strtolower(php_uname()), 'x86_64') !== FALSE) 
            {
               $aOSInfo['os'] = 'linux-amd64';
            }
       }
       elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
       {
           $aOSInfo['os'] = 'macos';
       }

       return $aOSInfo;
   }

   function prep_conect()
   {
      if (isset($_SESSION['hticnsdata']['sc_connection']) && !empty($_SESSION['hticnsdata']['sc_connection']))
      {
          foreach ($_SESSION['hticnsdata']['sc_connection'] as $NM_con_orig => $NM_con_dest)
          {
              if (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao']) && $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil']) && $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao'])) ? $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao']))
      {
          ob_start();
          db_conect_devel($con_devel, $this->root . $this->path_prod, 'CNSData', 2); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
          if (empty($_SESSION['hticnsdata']['glo_tpbanco']) && empty($_SESSION['hticnsdata']['glo_banco']))
          {
              $nm_crit_perfil = true;
          }
      }
      if (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil']) && !empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_perfil'];
      }
      elseif (isset($_SESSION['hticnsdata']['glo_perfil']) && !empty($_SESSION['hticnsdata']['glo_perfil']))
      {
          $perfil_trab = $_SESSION['hticnsdata']['glo_perfil'];
      }
      if (!empty($perfil_trab))
      {
          $_SESSION['hticnsdata']['glo_senha_protect'] = "";
          carrega_perfil($perfil_trab, $this->path_libs, "S", $this->path_conf);
          if (empty($_SESSION['hticnsdata']['glo_senha_protect']))
          {
              $nm_crit_perfil = true;
          }
      }
      else
      {
          $perfil_trab = $con_devel;
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['embutida_init']) 
      {
          if (!isset($_SESSION['language'])) 
          {
              $this->nm_falta_var .= "language; ";
          }
          if (!isset($_SESSION['id_Projeto'])) 
          {
              $this->nm_falta_var .= "id_Projeto; ";
          }
      }
// 
      if (!isset($_SESSION['hticnsdata']['glo_tpbanco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_tpbanco; ";
          }
      }
      else
      {
          $this->nm_tpbanco = $_SESSION['hticnsdata']['glo_tpbanco']; 
      }
      if (!isset($_SESSION['hticnsdata']['glo_servidor']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_servidor; ";
          }
      }
      else
      {
          $this->nm_servidor = $_SESSION['hticnsdata']['glo_servidor']; 
      }
      if (!isset($_SESSION['hticnsdata']['glo_banco']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_banco; ";
          }
      }
      else
      {
          $this->nm_banco = $_SESSION['hticnsdata']['glo_banco']; 
      }
      if (!isset($_SESSION['hticnsdata']['glo_usuario']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_usuario; ";
          }
      }
      else
      {
          $this->nm_usuario = $_SESSION['hticnsdata']['glo_usuario']; 
      }
      if (!isset($_SESSION['hticnsdata']['glo_senha']))
      {
          if (!$nm_crit_perfil)
          {
              $this->nm_falta_var_db .= "glo_senha; ";
          }
      }
      else
      {
          $this->nm_senha = $_SESSION['hticnsdata']['glo_senha']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_database_encoding']))
      {
          $this->nm_database_encoding = $_SESSION['hticnsdata']['glo_database_encoding']; 
      }
      $this->nm_arr_db_extra_args = array(); 
      if (isset($_SESSION['hticnsdata']['glo_use_ssl']))
      {
          $this->nm_arr_db_extra_args['use_ssl'] = $_SESSION['hticnsdata']['glo_use_ssl']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_mysql_ssl_key']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_key'] = $_SESSION['hticnsdata']['glo_mysql_ssl_key']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_mysql_ssl_cert']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cert'] = $_SESSION['hticnsdata']['glo_mysql_ssl_cert']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_mysql_ssl_capath']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_capath'] = $_SESSION['hticnsdata']['glo_mysql_ssl_capath']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_mysql_ssl_ca']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_ca'] = $_SESSION['hticnsdata']['glo_mysql_ssl_ca']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_mysql_ssl_cipher']))
      {
          $this->nm_arr_db_extra_args['mysql_ssl_cipher'] = $_SESSION['hticnsdata']['glo_mysql_ssl_cipher']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db2_autocommit']))
      {
          $this->nm_con_db2['db2_autocommit'] = $_SESSION['hticnsdata']['glo_db2_autocommit']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db2_i5_lib']))
      {
          $this->nm_con_db2['db2_i5_lib'] = $_SESSION['hticnsdata']['glo_db2_i5_lib']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db2_i5_naming']))
      {
          $this->nm_con_db2['db2_i5_naming'] = $_SESSION['hticnsdata']['glo_db2_i5_naming']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db2_i5_commit']))
      {
          $this->nm_con_db2['db2_i5_commit'] = $_SESSION['hticnsdata']['glo_db2_i5_commit']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db2_i5_query_optimize']))
      {
          $this->nm_con_db2['db2_i5_query_optimize'] = $_SESSION['hticnsdata']['glo_db2_i5_query_optimize']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_use_persistent']))
      {
          $this->nm_con_persistente = $_SESSION['hticnsdata']['glo_use_persistent']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_use_schema']))
      {
          $this->nm_con_use_schema = $_SESSION['hticnsdata']['glo_use_schema']; 
      }
      $this->date_delim  = "'";
      $this->date_delim1 = "'";
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access))
      {
          $this->date_delim  = "#";
          $this->date_delim1 = "#";
      }
      if (isset($_SESSION['hticnsdata']['glo_decimal_db']) && !empty($_SESSION['hticnsdata']['glo_decimal_db']))
      {
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['decimal_db'] = $_SESSION['hticnsdata']['glo_decimal_db']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_date_separator']) && !empty($_SESSION['hticnsdata']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['hticnsdata']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date1'];
      }
// 
      if (!empty($this->nm_falta_var) || !empty($this->nm_falta_var_db) || $nm_crit_perfil)
      {
          echo "<style type=\"text/css\">";
          echo ".scButton_default { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 0 12px !important;  }";
          echo ".scButton_disabled { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 0 12px;  }";
          echo ".scButton_group { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 7.8px 15px;margin:0px -5px !important;  }";
          echo ".scButton_groupdisabled { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 7.8px 15px;margin:0px -5px !important;  }";
          echo ".scButton_groupfirst { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 7.8px 15px;  }";
          echo ".scButton_grouplast { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 0 12px;  }";
          echo ".scButton_onmousedown { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;box-shadow: inset 0 1px 0 rgba(31, 45, 61, 0.15);; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_onmouseover { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;box-shadow: inset 0 -1px 0 rgba(31, 45, 61, 0.15);; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #1B8FC8;}.scButton_default:hover img, .scButton_groupfirst:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_default:hover{; border-style: solid; border-width: 1px; padding: 8px 10px;  }";
          echo ".scButton_small { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-style: solid; border-width: 1px; padding: 3px 13px !important;  }";
          echo ".scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099;  }";
          echo ".scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo ".scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab;  }";
          echo "</style>";
          echo "<table width=\"80%\" border=\"1\" height=\"117\">";
          if (empty($this->nm_falta_var_db))
          {
              if (!empty($this->nm_falta_var))
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
                  echo "  " . $this->nm_falta_var;
                  echo "   </b></td>";
                  echo " </tr>";
              }
              if ($nm_crit_perfil)
              {
                  echo "<tr>";
                  echo "   <td bgcolor=\"\">";
                  echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_nfnd'] . "</font>";
                  echo "  " . $perfil_trab;
                  echo "   </b></td>";
                  echo " </tr>";
              }
          }
          else
          {
              echo "<tr>";
              echo "   <td bgcolor=\"\">";
              echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_dbcn_data'] . "</font></b>";
              echo "   </td>";
              echo " </tr>";
          }
          echo "</table>";
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'])) 
          { 
              if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno'])) 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_back'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_back_hint'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $_SESSION['hticnsdata']['nm_sc_retorno'] ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
              else 
              { 
               $btn_value = "" . $this->Ini->Nm_lang['lang_btns_exit'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_value))
               {
                   $btn_value = sc_convert_encoding($btn_value, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
               $btn_hint = "" . $this->Ini->Nm_lang['lang_btns_exit_hint'] . "";
               if ($_SESSION['hticnsdata']['charset'] != "UTF-8" && NM_is_utf8($btn_hint))
               {
                   $btn_hint = sc_convert_encoding($btn_hint, $_SESSION['hticnsdata']['charset'], "UTF-8");
               }
?>
                   <input type="button" id="sai" onClick="window.location='<?php echo $nm_url_saida ?>'; return false" class="scButton_default" value="<?php echo $btn_value ?>" title="<?php echo $btn_hint ?>" style="vertical-align: middle;">

<?php
              } 
          } 
          exit ;
      }
      if (isset($_SESSION['hticnsdata']['glo_db_master_usr']) && !empty($_SESSION['hticnsdata']['glo_db_master_usr']))
      {
          $this->nm_usuario = $_SESSION['hticnsdata']['glo_db_master_usr']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db_master_pass']) && !empty($_SESSION['hticnsdata']['glo_db_master_pass']))
      {
          $this->nm_senha = $_SESSION['hticnsdata']['glo_db_master_pass']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_db_master_cript']) && !empty($_SESSION['hticnsdata']['glo_db_master_cript']))
      {
          $_SESSION['hticnsdata']['glo_senha_protect'] = $_SESSION['hticnsdata']['glo_db_master_cript']; 
      }
   }
   function conectDB()
   {
      global $glo_senha_protect;
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";
      if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && isset($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['hticnsdata']['grid_ProjetoItens']['glo_nm_conexao'], $this->root . $this->path_prod, 'CNSData'); 
      } 
      else 
      { 
          ob_start();
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['embutida'])
      {
          if (substr($_POST['nmgp_opcao'], 0, 5) == "ajax_")
          {
              ob_start();
          } 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_ibase))
      {
          if (function_exists('ibase_timefmt'))
          {
              ibase_timefmt('%Y-%m-%d %H:%M:%S');
          } 
          $GLOBALS["NM_ERRO_IBASE"] = 1;  
          $this->Ibase_version = "old";
          if ($ibase_version = $this->Db->Execute("SELECT RDB\$GET_CONTEXT('SYSTEM','ENGINE_VERSION') AS \"Version\" FROM RDB\$DATABASE"))
          {
              if (isset($ibase_version->fields[0]) && substr($ibase_version->fields[0], 0, 1) > 2) {$this->Ibase_version = "new";}
          }
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_sybase))
      {
          $this->Db->fetchMode = ADODB_FETCH_BOTH;
          $this->Db->Execute("set dateformat ymd");
          $this->Db->Execute("set quoted_identifier ON");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql))
      {
          $this->Db->Execute("set dateformat ymd");
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle))
      {
          $this->Db->Execute("alter session set nls_date_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['decimal_db'] = "."; 
      } 
      if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_postgres))
      {
          $this->Db->Execute("SET DATESTYLE TO ISO");
      } 
   }
   function regionalDefault()
   {
       $_SESSION['hticnsdata']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
       $_SESSION['hticnsdata']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
       $_SESSION['hticnsdata']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
       $_SESSION['hticnsdata']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
       $_SESSION['hticnsdata']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
       $_SESSION['hticnsdata']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
       $_SESSION['hticnsdata']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
       $_SESSION['hticnsdata']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
       $_SESSION['hticnsdata']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
       $_SESSION['hticnsdata']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
       $_SESSION['hticnsdata']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
       $_SESSION['hticnsdata']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
       $_SESSION['hticnsdata']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "R$";
       $_SESSION['hticnsdata']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
       $_SESSION['hticnsdata']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
       $_SESSION['hticnsdata']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
       $_SESSION['hticnsdata']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
       $_SESSION['hticnsdata']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
       $_SESSION['hticnsdata']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
       $_SESSION['hticnsdata']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
       $_SESSION['hticnsdata']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
   }
// 
   function sc_Include($path, $tp, $name)
   {
       if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
       {
           include_once($path);
       }
   } // sc_Include
   function sc_Sql_Protect($var, $tp, $conex="")
   {
       if (empty($conex) || $conex == "conn_mysql")
       {
           $TP_banco = $_SESSION['hticnsdata']['glo_tpbanco'];
       }
       else
       {
           eval ("\$TP_banco = \$this->nm_con_" . $conex . "['tpbanco'];");
       }
       if ($tp == "date")
       {
           $delim  = "'";
           $delim1 = "'";
           if (in_array(strtolower($TP_banco), $this->nm_bases_access))
           {
               $delim  = "#";
               $delim1 = "#";
           }
           if (isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['grid_ProjetoItens']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
   }

   function GB_date_format($val, $format, $prefix, $conf_region="S", $mask="")
   {
           return $val;
   }
   function Get_arg_groupby($val, $format)
   {
       return $val; 
   }
   function Get_format_dimension($ind_ini, $ind_qb, $campo, $rs, $conf_region="S", $mask="")
   {
       $retorno    = array();
       $format     = $this->Get_Gb_date_format($ind_qb, $campo);
       $Prefix_dat = $this->Get_Gb_prefix_date_format($ind_qb, $campo);
       if (empty($format) || $rs->fields[$ind_ini] == "")
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHIISS')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3,4");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3] . ":" . $rs->fields[$ind_ini + 4];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDDHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2,3");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2] . " " . $rs->fields[$ind_ini + 3];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMMDD2')
       {
           $this->Ajust_fields($ind_ini, $rs, "1,2");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1] . "-" . $rs->fields[$ind_ini + 2];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYMM')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $temp;
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($rs->fields[$ind_ini], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'BIMONTHLY' || $format == 'QUARTER' || $format == 'FOURMONTHS' || $format == 'SEMIANNUAL' || $format == 'WEEK')
       {
           $temp            = (substr($rs->fields[$ind_ini], 0, 1) == 0) ? substr($rs->fields[$ind_ini], 1) : $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $Prefix_dat . $temp;
           return $retorno;
       }
       if ($format == 'DAYNAME'|| $format == 'YYYYDAYNAME')
       {
           if ($format == 'DAYNAME')
           {
               $retorno['orig'] = $rs->fields[$ind_ini];
               $ano             = "";
               $daynum          = $rs->fields[$ind_ini];
           }
           else
           {
               $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
               $ano             = " " . $rs->fields[$ind_ini];
               $daynum          = $rs->fields[$ind_ini + 1];
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2))
           {
               $daynum--;
           }
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mysql))
           {
               $daynum = ($daynum == 6) ? 0 : $daynum + 1;
           }
           if ($daynum == 0) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_sund'] . $ano;
           }
           if ($daynum == 1) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_mond'] . $ano;
           }
           if ($daynum == 2) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_tued'] . $ano;
           }
           if ($daynum == 3) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_wend'] . $ano;
           }
           if ($daynum == 4) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_thud'] . $ano;
           }
           if ($daynum == 5) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_frid'] . $ano;
           }
           if ($daynum == 6) {
               $retorno['fmt'] = $Prefix_dat . $this->Nm_lang['lang_days_satd'] . $ano;
           }
           return $retorno;
       }
       if ($format == 'HH')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-00 " . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'DD')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-00-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'MM')
       {
           $this->Ajust_fields($ind_ini, $rs, "0");
           $temp            = "0000-" . $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYY')
       {
           $temp            = $rs->fields[$ind_ini];
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYHH')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-00 " . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       if ($format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $temp            = $rs->fields[$ind_ini] . "-00-" . $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format($temp, $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'YYYYWEEK' || $format == 'YYYYBIMONTHLY' || $format == 'YYYYQUARTER' || $format == 'YYYYFOURMONTHS' || $format == 'YYYYSEMIANNUAL')
       {
           $temp            = (substr($rs->fields[$ind_ini + 1], 0, 1) == 0) ? substr($rs->fields[$ind_ini + 1], 1) : $rs->fields[$ind_ini + 1];
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $Prefix_dat . $temp . " " . $rs->fields[$ind_ini];
           return $retorno;
       }
       if ($format == 'YYYYHH' || $format == 'YYYYDD')
       {
           $this->Ajust_fields($ind_ini, $rs, "1");
           $retorno['orig'] = $rs->fields[$ind_ini] . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $rs->fields[$ind_ini] . $_SESSION['hticnsdata']['reg_conf']['date_sep'] . $rs->fields[$ind_ini + 1];
           return $retorno;
       }
       elseif ($format == 'HHIISS')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1,2");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1] . ":" . $rs->fields[$ind_ini + 2];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       elseif ($format == 'HHII')
       {
           $this->Ajust_fields($ind_ini, $rs, "0,1");
           $retorno['orig'] = $rs->fields[$ind_ini] . ":" . $rs->fields[$ind_ini + 1];
           $retorno['fmt']  = $this->GB_date_format("0000-00-00 " . $retorno['orig'], $format, $Prefix_dat, $conf_region, $mask);
           return $retorno;
       }
       else
       {
           $retorno['orig'] = $rs->fields[$ind_ini];
           $retorno['fmt']  = $rs->fields[$ind_ini];
           return $retorno;
       }
   }
   function Ajust_fields($ind_ini, &$rs, $parts)
   {
       $prep = explode(",", $parts);
       foreach ($prep as $ind)
       {
           $ind_ok = $ind_ini + $ind;
           $rs->fields[$ind_ok] = (int) $rs->fields[$ind_ok];
           if (strlen($rs->fields[$ind_ok]) == 1)
           {
               $rs->fields[$ind_ok] = "0" . $rs->fields[$ind_ok];
           }
       }
   }
   function Get_date_order_groupby($sql_def, $order, $format="", $order_old="")
   {
       $order      = " " . trim($order);
       $order_old .= (!empty($order_old)) ? ", " : "";
       return $order_old . $sql_def . $order;
   }
}
//===============================================================================
//
class grid_ProjetoItens_sub_css
{
   function __construct()
   {
      global $hti_cnsdata_init;
      $str_schema_all = (isset($_SESSION['hticnsdata']['str_schema_all']) && !empty($_SESSION['hticnsdata']['str_schema_all'])) ? $_SESSION['hticnsdata']['str_schema_all'] : "Sc9_Rhino/Sc9_Rhino";
      if ($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['SC_herda_css'] == "N")
      {
          $_SESSION['sc_session'][$hti_cnsdata_init]['SC_sub_css']['grid_ProjetoItens']    = $str_schema_all . "_grid.css";
          $_SESSION['sc_session'][$hti_cnsdata_init]['SC_sub_css_bw']['grid_ProjetoItens'] = $str_schema_all . "_grid_bw.css";
      }
   }
}
//
class grid_ProjetoItens_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
   var $NM_ajax_flag  = false;
   var $NM_ajax_opcao = '';
   var $grid;
   var $Res;
   var $Graf;
   var $pdf;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
      $this->$modulo->arr_buttons = $this->arr_buttons;
   }
//
//----- 
   function controle($linhas = 0)
   {
      global $nm_saida, $nm_url_saida, $hti_cnsdata_init, $nmgp_parms_pdf, $nmgp_graf_pdf, $nm_apl_dependente, $nmgp_navegator_print, $nmgp_tipo_print, $nmgp_cor_print, $nmgp_cor_word, $NMSC_conf_apl, $NM_contr_var_session, $NM_run_iframe,
             $glo_senha_protect, $nmgp_opcao, $nm_call_php, $rec;

      $Parms_form_pdf = false;
      if (isset($_SESSION['sc_session']['hticnsdata']['embutida_form_pdf']['grid_ProjetoItens']))
      { 
          $GLOBALS['nmgp_parms'] = $_SESSION['sc_session']['hticnsdata']['embutida_form_pdf']['grid_ProjetoItens'];
          $Parms_form_pdf = true;
      } 
      if ($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'] || $Parms_form_pdf)
      { 
          if (!empty($GLOBALS['nmgp_parms'])) 
          { 
              $GLOBALS['nmgp_parms'] = str_replace("@aspass@", "'", $GLOBALS['nmgp_parms']);
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $GLOBALS["nmgp_parms"]);
              $todo  = explode("?@?", $todox);
              foreach ($todo as $param)
              {
                   $cadapar = explode("?#?", $param);
                   if (1 < sizeof($cadapar))
                   {
                       if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                       {
                           $cadapar[0] = substr($cadapar[0], 11);
                           $cadapar[1] = $_SESSION[$cadapar[1]];
                       }
                       if (isset($GLOBALS['sc_conv_var'][$cadapar[0]]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][$cadapar[0]];
                       }
                       elseif (isset($GLOBALS['sc_conv_var'][strtolower($cadapar[0])]))
                       {
                           $cadapar[0] = $GLOBALS['sc_conv_var'][strtolower($cadapar[0])];
                       }
                       nm_limpa_str_grid_ProjetoItens($cadapar[1]);
                       nm_protect_num_grid_ProjetoItens($cadapar[0], $cadapar[1]);
                       if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                       $Tmp_par   = $cadapar[0];;
                       $$Tmp_par = $cadapar[1];
                   }
              }
          } 
          if (isset($language)) 
          {
              $_SESSION['language'] = $language;
              nm_limpa_str_grid_ProjetoItens($_SESSION["language"]);
          }
          if (!isset($id_Projeto) && isset($id_projeto)) 
          {
             $id_Projeto = $id_projeto;
          }
          if (isset($id_Projeto)) 
          {
              $_SESSION['id_Projeto'] = $id_Projeto;
              nm_limpa_str_grid_ProjetoItens($_SESSION["id_Projeto"]);
          }
          if (!isset($errorMSG) && isset($errormsg)) 
          {
             $errorMSG = $errormsg;
          }
          if (isset($errorMSG)) 
          {
              $_SESSION['errorMSG'] = $errorMSG;
              nm_limpa_str_grid_ProjetoItens($_SESSION["errorMSG"]);
          }
          if (!isset($CNSDATA_novaABA_APP) && isset($cnsdata_novaaba_app)) 
          {
             $CNSDATA_novaABA_APP = $cnsdata_novaaba_app;
          }
          if (isset($CNSDATA_novaABA_APP)) 
          {
              $_SESSION['CNSDATA_novaABA_APP'] = $CNSDATA_novaABA_APP;
              nm_limpa_str_grid_ProjetoItens($_SESSION["CNSDATA_novaABA_APP"]);
          }
      } 
      if ($Parms_form_pdf)
      { 
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_pdf'] = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form'] = true;
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_full'] = false;
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_pai'] = "";
      } 
      $_SESSION['hticnsdata']['sc_ctl_ajax'] = 'part';
      if (!$this->Ini) 
      { 
          $this->Ini = new grid_ProjetoItens_ini(); 
          $this->Ini->init();
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['emb_lig_aba'] = array();
      $this->Change_Menu = false;
      if ($nmgp_opcao != "ajax_navigate" && $nmgp_opcao != "ajax_detalhe" && isset($_SESSION['hticnsdata']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_outra_jan'] || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_modal']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['grid_ProjetoItens']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['grid_ProjetoItens'];
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
          if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && $this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['grid_ProjetoItens']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['grid_ProjetoItens']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['grid_ProjetoItens']['label'] = "" . $this->Ini->Nm_lang['lang_othr_grid_titl'] . " - ";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "grid_ProjetoItens")
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
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      {
          $this->Change_Menu = false;
      }
      $this->Db = $this->Ini->Db; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['nm_tpbanco'] = $this->Ini->nm_tpbanco;
      $this->nm_data = new nm_data("pt_br");
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      { 
          include_once($this->Ini->path_embutida . "grid_ProjetoItens/grid_ProjetoItens_erro.class.php"); 
      } 
      else 
      { 
          include_once($this->Ini->path_aplicacao . "grid_ProjetoItens_erro.class.php"); 
      } 
      $this->Erro      = new grid_ProjetoItens_erro();
      $this->Erro->Ini = $this->Ini;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      { 
          require_once($this->Ini->path_embutida . "grid_ProjetoItens/grid_ProjetoItens_lookup.class.php"); 
      } 
      else 
      { 
          require_once($this->Ini->path_aplicacao . "grid_ProjetoItens_lookup.class.php"); 
      } 
      $this->Lookup       = new grid_ProjetoItens_lookup();
      $this->Lookup->Db   = $this->Db;
      $this->Lookup->Ini  = $this->Ini;
      $this->Lookup->Erro = $this->Erro;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      {
          $_SESSION['hticnsdata']['saida_var'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['scroll_navigate'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['scroll_navigate_reload'] = false;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['scroll_navigate_app'] = false;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['scroll_navigate_header_row']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['scroll_navigate_header_row'] = 1;
          }
          if (isset($_POST['nmgp_opcao']) && ($_POST['nmgp_opcao'] == "ajax_navigate" || $_POST['nmgp_opcao'] == "ajax_detalhe"))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'] = true;
              $_SESSION['hticnsdata']['saida_var']  = true;
              $_SESSION['hticnsdata']['saida_html'] = "";
              $this->Ini->Arr_result = array();
              $nmgp_opcao = $_POST['opc'];
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = $nmgp_opcao;
              if (isset($_POST['parm']) && $_POST['parm'] == "save_grid")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['save_grid'] = true;
              }
              if ($nmgp_opcao == "edit" && isset($_POST['parm']) && $_POST['parm'] == "fim")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "rec" || $nmgp_opcao == "muda_rec_linhas")
              {
                  $rec = $_POST['parm'];
              }
              if ($nmgp_opcao == "muda_qt_linhas")
              {
                  $nmgp_quant_linhas  = strtolower($_POST['parm']);
              }
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_event")
      {
          $this->Ini->Arr_result = array();
          ob_start();
          if ($_POST['nmgp_event'] == "num_status_onClick")
          {
              $this->tb_itens_num_npt = NM_charset_decode($_POST['tb_itens_num_npt']);
              $this->num_status = NM_charset_decode($_POST['num_status']);
              $this->tb_itens_id_item = NM_charset_decode($_POST['tb_itens_id_item']);
              $this->Ini->sc_page = $_POST['hti_cnsdata_init'];
              $this->num_status_onClick();
          }
          if ($_POST['nmgp_event'] == "editar_onClick")
          {
              $this->tb_itens_id_item = NM_charset_decode($_POST['tb_itens_id_item']);
              $this->editar = NM_charset_decode($_POST['editar']);
              $this->rsprojeto = NM_charset_decode($_POST['rsprojeto']);
              $this->rsitem = NM_charset_decode($_POST['rsitem']);
              $this->Ini->sc_page = $_POST['hti_cnsdata_init'];
              $this->editar_onClick();
          }
          $Temp = ob_get_clean();
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Ini->Arr_result);
          $this->close_emb();
          exit;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Gb_date_format'])) 
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Gb_date_format'] = array();
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_All_Groupby'] = array('sc_free_total' => 'grid');
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Groupby_hide'])) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Groupby_hide'] = array();
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'])) 
      { 
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_All_Groupby'] as $Ind => $Tp)
          {
              if (!in_array($Ind, $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Groupby_hide'])) 
              { 
                  break;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] = $Ind;
      } 
      $this->Ini->Apl_resumo  = "grid_ProjetoItens_resumo_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] . ".class.php"; 
      $this->Ini->Apl_grafico = "grid_ProjetoItens_grafico_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['SC_Ind_Groupby'] . ".class.php"; 
      $_SESSION['sc_session']['path_third'] = $this->Ini->path_prod . "/third";
      $_SESSION['sc_session']['path_img']   = $this->Ini->path_img_global;
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
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_det'] = false;
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida']      = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_grid'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_init']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_init'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_label']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_label'] = false;
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cab_embutida']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cab_embutida'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_pdf']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_pdf'] = "";
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_treeview']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida_treeview'] = false;
      } 
      include("../_lib/css/" . $this->Ini->str_schema_all . "_grid.php");
      $this->Ini->Tree_img_col    = trim($str_tree_col);
      $this->Ini->Tree_img_exp    = trim($str_tree_exp);
      $this->Ini->Str_btn_grid    = trim($str_button) . "/" . trim($str_button) . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".php";
      $this->Ini->Str_btn_css     = trim($str_button) . "/" . trim($str_button) . ".css";
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      { 
      $this->Ini->Color_bg_ajax            = (!isset($str_ajax_bg)       || "" == trim($str_ajax_bg))         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax            = (!isset($str_ajax_border_c) || "" == trim($str_ajax_border_c))   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax            = (!isset($str_ajax_border_s) || "" == trim($str_ajax_border_s))   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax            = (!isset($str_ajax_border_w) || "" == trim($str_ajax_border_w))   ? ""     : $str_ajax_border_w;
      $this->Ini->Img_sep_grid             = "/" . trim($str_toolbar_separator);
      $this->Ini->grid_table_width         = (!isset($str_grid_table_width) || "" == trim($str_grid_table_width)) ? "" : $str_grid_table_width;
      $this->Ini->Label_sort_pos           = trim($str_label_sort_pos);
      $this->Ini->Label_sort               = trim($str_label_sort);
      $this->Ini->Label_sort_asc           = trim($str_label_sort_asc);
      $this->Ini->Label_sort_desc          = trim($str_label_sort_desc);
      $this->Ini->Label_summary_sort_pos   = trim($str_resume_label_sort_pos);
      $this->Ini->Label_summary_sort       = trim($str_resume_label_sort);
      $this->Ini->Label_summary_sort_asc   = trim($str_resume_label_sort_asc);
      $this->Ini->Label_summary_sort_desc  = trim($str_resume_label_sort_desc);
      $this->Ini->Sum_ico_line             = trim($sum_ico_line);
      $this->Ini->Sum_ico_column           = trim($sum_ico_column);
      $this->Ini->ajax_div_icon            = trim($ajax_div_icon);
      $this->Ini->Str_toolbarnav_separator = '/' . trim($str_toolbarnav_separator);
      $this->Ini->Img_qs_search            = '' != trim($img_qs_search)        ? trim($img_qs_search)        : 'hticnsdata__NM__qs_lupa.png';
      $this->Ini->Img_qs_clean             = '' != trim($img_qs_clean)         ? trim($img_qs_clean)         : 'hticnsdata__NM__qs_close.png';
      $this->Ini->Str_qs_image_padding     = '' != trim($str_qs_image_padding) ? trim($str_qs_image_padding) : '0';
      $this->Ini->App_div_tree_img_col     = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp     = trim($app_div_str_tree_exp);
      $this->Ini->refinedsearch_hide           = trim($refinedsearch_hide);
      $this->Ini->refinedsearch_show          = trim($refinedsearch_show);
      $this->Ini->refinedsearch_close          = trim($refinedsearch_close);
      $this->Ini->refinedsearch_values_separator          = trim($refinedsearch_values_separator);
      $this->Ini->refinedsearch_campo_close_icon          = trim($refinedsearch_campo_close_icon);
          $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput") ; 
          $_SESSION['hticnsdata']['css_popup']                 = $this->Ini->str_schema_all . "_grid.css";
          $_SESSION['hticnsdata']['css_popup_dir']             = $this->Ini->str_schema_all . "_grid" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css";
          $_SESSION['hticnsdata']['css_btn_popup']             = $this->Ini->Str_btn_css;
          $_SESSION['hticnsdata']['css_popup_tab']             = $this->Ini->str_schema_all . "_tab.css";
          $_SESSION['hticnsdata']['css_popup_tab_dir']         = $this->Ini->str_schema_all . "_tab" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css";
          $_SESSION['hticnsdata']['css_popup_div']             = $this->Ini->str_schema_all . "_appdiv.css";
          $_SESSION['hticnsdata']['css_popup_div_dir']         = $this->Ini->str_schema_all . "_appdiv" . $_SESSION['hticnsdata']['reg_conf']['css_dir'] . ".css";
          $_SESSION['hticnsdata']['bg_btn_popup']['bok']       = nmButtonOutput($this->arr_buttons, "bok", "processa()", "processa()", "bok", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $_SESSION['hticnsdata']['bg_btn_popup']['bsair']     = nmButtonOutput($this->arr_buttons, "bsair", "window.close()", "window.close()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
          $_SESSION['hticnsdata']['bg_btn_popup']['btbremove'] = nmButtonOutput($this->arr_buttons, "bsair", "self.parent.tb_remove()", "self.parent.tb_remove()", "bsair", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
      } 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order']))
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'][] = "tb_itens_id_item";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'][] = "nom_item";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'][] = "nom_descricao";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'][] = "observacoes";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'][] = "num_status";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['field_order'][] = "editar";
      } 
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['exit'];
      }

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'])
      { 
          $_SESSION['hticnsdata']['sc_page_process'] = $this->Ini->sc_page;
      } 
      $_SESSION['hticnsdata']['sc_idioma_pivot']['pt_br'] = array(
          'smry_ppup_titl'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_titl'],
          'smry_ppup_fild'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_fild'],
          'smry_ppup_posi'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi'],
          'smry_ppup_sort'      => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort'],
          'smry_ppup_posi_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_labl'],
          'smry_ppup_posi_data' => $this->Ini->Nm_lang['lang_othr_smry_ppup_posi_data'],
          'smry_ppup_sort_labl' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_labl'],
          'smry_ppup_sort_vlue' => $this->Ini->Nm_lang['lang_othr_smry_ppup_sort_vlue'],
          'smry_ppup_chek_tabu' => $this->Ini->Nm_lang['lang_othr_smry_ppup_chek_tabu'],
      );
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
      if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'])
      { 
          $_SESSION['hticnsdata']['sc_tp_pdf'] = "wkhtmltopdf";
          $_SESSION['hticnsdata']['sc_idioma_pdf'] = array();
          $_SESSION['hticnsdata']['sc_idioma_pdf']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_pdff_titl'], 'tp_imp' => $this->Ini->Nm_lang['lang_pdff_type'], 'color' => $this->Ini->Nm_lang['lang_pdff_colr'], 'econm' => $this->Ini->Nm_lang['lang_pdff_bndw'], 'tp_pap' => $this->Ini->Nm_lang['lang_pdff_pper'], 'carta' => $this->Ini->Nm_lang['lang_pdff_letr'], 'oficio' => $this->Ini->Nm_lang['lang_pdff_legl'], 'customiz' => $this->Ini->Nm_lang['lang_pdff_cstm'], 'alt_papel' => $this->Ini->Nm_lang['lang_pdff_pper_hgth'], 'larg_papel' => $this->Ini->Nm_lang['lang_pdff_pper_wdth'], 'orient' => $this->Ini->Nm_lang['lang_pdff_pper_orie'], 'retrato' => $this->Ini->Nm_lang['lang_pdff_prtr'], 'paisag' => $this->Ini->Nm_lang['lang_pdff_lnds'], 'book' => $this->Ini->Nm_lang['lang_pdff_bkmk'], 'grafico' => $this->Ini->Nm_lang['lang_pdff_chrt'], 'largura' => $this->Ini->Nm_lang['lang_pdff_wdth'], 'fonte' => $this->Ini->Nm_lang['lang_pdff_font'], 'create' => $this->Ini->Nm_lang['lang_pdff_create'], 'sim' => $this->Ini->Nm_lang['lang_pdff_chrt_yess'], 'nao' => $this->Ini->Nm_lang['lang_pdff_chrt_nooo'], 'cancela' => $this->Ini->Nm_lang['lang_pdff_cncl']);
      } 
      $_SESSION['hticnsdata']['sc_idioma_graf_flash'] = array();
      $_SESSION['hticnsdata']['sc_idioma_graf_flash']['pt_br'] = array(
          'titulo' => $this->Ini->Nm_lang['lang_chrt_titl'],
          'tipo_g' => $this->Ini->Nm_lang['lang_chrt_type'],
          'tp_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars'],
          'tp_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie'],
          'tp_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line'],
          'tp_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area'],
          'tp_marcador' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks'],
          'tp_gauge' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug'],
          'tp_radar' => $this->Ini->Nm_lang['lang_flsh_chrt_radr'],
          'tp_polar' => $this->Ini->Nm_lang['lang_flsh_chrt_polr'],
          'tp_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_funl'],
          'tp_pyramid' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm'],
          'largura' => $this->Ini->Nm_lang['lang_chrt_wdth'],
          'altura' => $this->Ini->Nm_lang['lang_chrt_hgth'],
          'modo_gera' => $this->Ini->Nm_lang['lang_chrt_gtmd'],
          'sintetico' => $this->Ini->Nm_lang['lang_chrt_smzd'],
          'analitico' => $this->Ini->Nm_lang['lang_chrt_anlt'],
          'order' => $this->Ini->Nm_lang['lang_chrt_ordr'],
          'order_none' => $this->Ini->Nm_lang['lang_chrt_ordr_none'],
          'order_asc' => $this->Ini->Nm_lang['lang_chrt_ordr_asc'],
          'order_desc' => $this->Ini->Nm_lang['lang_chrt_ordr_desc'],
          'barra_orien' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_layo'],
          'barra_orien_horiz' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_horz'],
          'barra_orien_verti' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_vrtc'],
          'barra_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_shpe'],
          'barra_forma_barra' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_bars'],
          'barra_forma_cilin' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cyld'],
          'barra_forma_cone' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_cone'],
          'barra_forma_piram' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_pyrm'],
          'barra_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_dmns'],
          'barra_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_2ddm'],
          'barra_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ddm'],
          'barra_sobre' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ovr'],
          'barra_sobre_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_sobre_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'barra_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stck'],
          'barra_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stan'],
          'barra_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stay'],
          'barra_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_stap'],
          'barra_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invr'],
          'barra_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invn'],
          'barra_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_invi'],
          'barra_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srgr'],
          'barra_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srst'],
          'barra_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_srbs'],
          'barra_funil' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_funl'],
          'barra_funil_nao' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3ont'],
          'barra_funil_sim' => $this->Ini->Nm_lang['lang_flsh_chrt_bars_3oys'],
          'pizza_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_shpe'],
          'pizza_forma_pizza' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fpie'],
          'pizza_forma_donut' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dnts'],
          'pizza_dimen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dmns'],
          'pizza_dimen_2d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_2ddm'],
          'pizza_dimen_3d' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_3ddm'],
          'pizza_orden' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_srtn'],
          'pizza_orden_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_nsrt'],
          'pizza_orden_ascen' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_asrt'],
          'pizza_orden_desce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dsrt'],
          'pizza_explo' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_expl'],
          'pizza_explo_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_dxpl'],
          'pizza_explo_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_axpl'],
          'pizza_explo_click' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_cxpl'],
          'pizza_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fval'],
          'pizza_valor_valor' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlv'],
          'pizza_valor_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_fpie_fvlp'],
          'linha_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_shpe'],
          'linha_forma_linha' => $this->Ini->Nm_lang['lang_flsh_chrt_line_line'],
          'linha_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_line_spln'],
          'linha_forma_degra' => $this->Ini->Nm_lang['lang_flsh_chrt_line_step'],
          'linha_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invr'],
          'linha_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invn'],
          'linha_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_line_invi'],
          'linha_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srgr'],
          'linha_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srst'],
          'linha_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_line_srbs'],
          'area_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_shpe'],
          'area_forma_area' => $this->Ini->Nm_lang['lang_flsh_chrt_area_area'],
          'area_forma_splin' => $this->Ini->Nm_lang['lang_flsh_chrt_area_spln'],
          'area_empil' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stak'],
          'area_empil_desat' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stan'],
          'area_empil_ativa' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stay'],
          'area_empil_perce' => $this->Ini->Nm_lang['lang_flsh_chrt_area_stap'],
          'area_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invr'],
          'area_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invn'],
          'area_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_area_invi'],
          'area_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srgr'],
          'area_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srst'],
          'area_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_area_srbs'],
          'marca_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invr'],
          'marca_inver_norma' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invn'],
          'marca_inver_inver' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_invi'],
          'marca_agrup' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srgr'],
          'marca_agrup_conju' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srst'],
          'marca_agrup_serie' => $this->Ini->Nm_lang['lang_flsh_chrt_mrks_srbs'],
          'gauge_forma' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_shpe'],
          'gauge_forma_circular' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_circ'],
          'gauge_forma_semi' => $this->Ini->Nm_lang['lang_flsh_chrt_gaug_semi'],
          'pyram_slice' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_slic'],
          'pyram_slice_s' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcs'],
          'pyram_slice_n' => $this->Ini->Nm_lang['lang_flsh_chrt_pyrm_opcn'],
      );
      if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'])
      { 
          $_SESSION['hticnsdata']['sc_idioma_prt'] = array();
          $_SESSION['hticnsdata']['sc_idioma_prt']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'modoimp' => $this->Ini->Nm_lang['lang_btns_mode_prnt_hint'], 'curr' => $this->Ini->Nm_lang['lang_othr_curr_page'], 'total' => $this->Ini->Nm_lang['lang_othr_full'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'])
      { 
          $_SESSION['hticnsdata']['sc_idioma_word'] = array();
          $_SESSION['hticnsdata']['sc_idioma_word']['pt_br'] = array('titulo' => $this->Ini->Nm_lang['lang_btns_prtn_titl_hint'], 'cor' => $this->Ini->Nm_lang['lang_othr_prtc'], 'pb' => $this->Ini->Nm_lang['lang_othr_bndw'], 'color' => $this->Ini->Nm_lang['lang_othr_colr'], 'cancela' => $this->Ini->Nm_lang['lang_btns_cncl_prnt_hint']);
      } 
      $this->Ini->Gd_missing  = true;
      if (function_exists("getProdVersion"))
      {
          $_SESSION['hticnsdata']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
      }
      if (function_exists("gd_info"))
      {
          $this->Ini->Gd_missing = false;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "inicio" ;  
      }   
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['start']) && $_SESSION['hticnsdata']['sc_apl_conf']['grid_ProjetoItens']['start'] == 'filter')
      {
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "inicio" || $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "grid")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "busca";
          }   
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"]))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga'] = array();  
          if (isset($NMSC_conf_apl) && !empty($NMSC_conf_apl))
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opc_liga'] = $NMSC_conf_apl;  
          }   
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'] && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "busca")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "grid" ;  
      }   
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print']) || empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print']))  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao_print'] = "inicio" ;  
      }   
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_all'] = false;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "res_print")  
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']     = "resumo";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_all'] = true;
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'], 0, 7) == "grafico")  
      { 
          $_SESSION['hticnsdata']['sc_ctl_ajax'] = 'part';
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "pdf")
      { 
          $this->Ini->path_img_modelo = $this->Ini->path_img_modelo;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == 'pesq' && isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['orig_pesq']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['orig_pesq']))  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['orig_pesq'] == "res")  
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = 'resumo';
          } 
          elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['orig_pesq'] == "grid") 
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = 'inicio';
          } 
      } 
//
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['prim_cons'] = false;  
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "detalhe" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig']) || !empty($nmgp_parms) || !empty($GLOBALS["nmgp_parms"])))  
      { 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['prim_cons'] = true;  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq']       = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_ant']   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];  
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['cond_pesq'] = ""; 
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'] = "";
         $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['contr_total_geral'] = "NAO";
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['sc_total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['tot_geral']);
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_ant'];  
      if ($nmgp_opcao == "formphp")
      { 
          if ($nm_call_php == "voltar")
          { 
              $this->voltar();
          } 
          if ($nm_call_php == "enviarProjeto")
          { 
              $this->enviarProjeto();
          } 
          if ($nm_call_php == "iniciarAnalise")
          { 
              $this->iniciarAnalise();
          } 
          if ($nm_call_php == "pauseAnalise")
          { 
              $this->pauseAnalise();
          } 
          if ($nm_call_php == "fimAnalise")
          { 
              $this->fimAnalise();
          } 
          if ($nm_call_php == "cabecalhoDoc")
          { 
              $this->cabecalhoDoc();
          } 
          $this->Db->Close(); 
          exit;
      } 
      $nm_flag_pdf   = true;
      $nm_vendo_pdf  = ("pdf" == $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['graf_pdf'] = "S";
      if (isset($nmgp_graf_pdf) && !empty($nmgp_graf_pdf))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['graf_pdf'] = $nmgp_graf_pdf;
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      {
         $this->Ini->sc_Include($this->Ini->path_libs . "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
         $nm_saida = new nm_trata_saida();
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            $nm_arquivo_htm_temp = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_ProjetoItens_html_" . session_id() . "_2.html";
            if (isset($_GET['pdf_base']) && isset($_GET['pdf_url']))
            {
                $nm_arquivo_pdf_base = "/" . str_replace("_NMPLUS_", "+", $_GET['pdf_base']);
                $nm_arquivo_pdf_url  = $_GET['pdf_url'] . $nm_arquivo_pdf_base;
            }
            else
            {
                $nm_arquivo_pdf_base = "/sc_pdf_" . date("YmdHis") . "_" . rand(0, 1000) . "_grid_ProjetoItens.pdf";
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . $nm_arquivo_pdf_base;
            }
            $nm_arquivo_pdf_serv = $this->Ini->root . $nm_arquivo_pdf_url;
            $nm_arquivo_de_saida = $this->Ini->root . $this->Ini->path_imag_temp . "/sc_grid_ProjetoItens_html_" . session_id() . ".html";
            $nm_url_de_saida = $this->Ini->server_pdf . $this->Ini->path_imag_temp . "/sc_grid_ProjetoItens_html_" . session_id() . ".html";
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['hticnsdata']['charset']) != "utf-8")
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida, $_SESSION['hticnsdata']['charset']);
            }
            else
            { 
                $nm_saida->seta_arquivo($nm_arquivo_de_saida);
            }
         }
      }
//----------------------------------->
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "doc_word_res")
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_navigator'] = "Microsoft Internet Explorer";
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_all'] = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word']  = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']     = "resumo";
          $_SESSION['hticnsdata']['saida_word'] = true;
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['word_name']))
          {
              $nm_arquivo_doc_word = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['word_name'];
          }
          else
          {
              $nm_arquivo_doc_word = "/sc_grid_ProjetoItens_res_" . session_id() . ".doc";
          }
          $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
          $this->ret_word = "resumo";
          $this->Ini->nm_limite_lin_res_prt = 0;
          $GLOBALS['nmgp_cor_print']        = $nmgp_cor_word;
      } 
      if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'], 0, 7) == "grafico")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
          { 
              require_once($this->Ini->path_embutida . " . grid_ProjetoItens . /" . $this->Ini->Apl_grafico); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_grafico); 
          } 
          $this->Graf  = new grid_ProjetoItens_grafico();
          $this->prep_modulos("Graf");
          if (substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'], 7, 1) == "_")  
          { 
              $this->Graf->grafico_col(substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'], 8));
          }
          else
          { 
              $this->Graf->monta_grafico();
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] = "grid";
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "busca")  
      { 
          if (!$_SESSION['hticnsdata']['proc_mobile']) 
          { 
              require_once($this->Ini->path_aplicacao . "grid_ProjetoItens_pesq.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_ProjetoItens_mobile_pesq.class.php"); 
          } 
          $this->pesq  = new grid_ProjetoItens_pesq();
          $this->prep_modulos("pesq");
          $this->pesq->NM_ajax_flag    = $this->NM_ajax_flag;
          $this->pesq->NM_ajax_opcao   = $this->NM_ajax_opcao;
          $this->pesq->monta_busca();
      }
      else 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "resumo")  
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_ProjetoItens/" . $this->Ini->Apl_resumo); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . $this->Ini->Apl_resumo); 
          } 
          $this->Res = new grid_ProjetoItens_resumo("out");
          $this->prep_modulos("Res");
          $this->Res->monta_resumo();
      }
      else 
      { 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "print" && $nmgp_tipo_print == "RC")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_navigator'] = $nmgp_navegator_print;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']     = "pdf";
              $GLOBALS['nmgp_tipo_pdf'] = strtolower($nmgp_cor_print);
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] == "doc_word")
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_navigator'] = "Microsoft Internet Explorer";
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['print_all'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word']  = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao']     = "pdf";
              $_SESSION['hticnsdata']['saida_word'] = true;
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['word_name']))
              {
                  $nm_arquivo_doc_word =  "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['word_name'];
              }
              else
              {
                  $nm_arquivo_doc_word = "/sc_grid_ProjetoItens_" . session_id() . ".doc";
              }
              $nm_saida->seta_arquivo($this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word);
              $this->ret_word = "volta_grid";
              $this->Ini->nm_limite_lin_prt = 0;
              $GLOBALS['nmgp_tipo_pdf'] = $nmgp_cor_word;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
          { 
              require_once($this->Ini->path_embutida . "grid_ProjetoItens/grid_ProjetoItens_grid.class.php"); 
          } 
          else 
          { 
              require_once($this->Ini->path_aplicacao . "grid_ProjetoItens_grid.class.php"); 
          } 
          $this->grid  = new grid_ProjetoItens_grid();
          $this->prep_modulos("grid");
          $this->grid->monta_grid($linhas);
      }   
//--- 
      if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'])
      {
           $this->Db->Close(); 
      }
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
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['embutida'])
      {
         $nm_saida->finaliza();
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['ajax_nav'])
         {
             $Temp = ob_get_clean();
             if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['opcao'] != "ajax_detalhe")  
             {
                 $this->Ini->Arr_result['setVar'][] = array('var' => 'scQtReg', 'value' => $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['qt_reg_grid']);
             }
             $_SESSION['hticnsdata']['saida_var'] = false;
             $oJson = new Services_JSON();
             echo $oJson->encode($this->Ini->Arr_result);
             exit;
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['doc_word'])
         {
             $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['word_file'] = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
             $this->html_doc_word($nm_arquivo_doc_word);
         }
         if ($nm_flag_pdf && $nm_vendo_pdf)
         {
            if (isset($nmgp_parms_pdf) && !empty($nmgp_parms_pdf))
            {
                $str_pd4ml    = $nmgp_parms_pdf;
            }
            else
            {
                $str_pd4ml    = " --page-size Letter --orientation Portrait";
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $lang_protect = $this->Ini->Nm_lang['lang_pdff_gnrt'];
                    if (!NM_is_utf8($lang_protect))
                    {
                        $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['hticnsdata']['charset']);
                    }
                    fwrite($this->grid->progress_fp, ($this->grid->progress_tot) . "_#NM#_" . $lang_protect . "...\n");
                    fclose($this->grid->progress_fp);
                }
            }
            if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_name']))
            {
                $nm_arquivo_pdf_serv = $this->Ini->root .  $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_name'];
                $nm_arquivo_pdf_url  = $this->Ini->path_imag_temp . "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_name'];
                $nm_arquivo_pdf_base = "/" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_name'];
                unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_name']);
            }
            $arq_pdf_out  = (FALSE !== strpos($nm_arquivo_pdf_serv, ' ')) ? " \"" . $nm_arquivo_pdf_serv . "\"" :  $nm_arquivo_pdf_serv;
            $arq_pdf_in   = (FALSE !== strpos($nm_url_de_saida, ' '))     ? " \"" . $nm_url_de_saida . "\""     :  $nm_url_de_saida;
            $Win_autentication = "";
            if (isset($_SESSION['sc_pdf_usr']) && !empty($_SESSION['sc_pdf_usr']))
            {
                $_SESSION['sc_iis_usr'] = $_SESSION['sc_pdf_usr'];
            }
            if (isset($_SESSION['sc_iis_usr']) && !empty($_SESSION['sc_iis_usr']))
            {
                $Win_autentication .= " --username " . $_SESSION['sc_iis_usr'];
            }
            if (isset($_SESSION['sc_pdf_pw']) && !empty($_SESSION['sc_pdf_pw']))
            {
                $_SESSION['sc_iis_pw'] = $_SESSION['sc_pdf_pw'];
            }
            if (isset($_SESSION['sc_iis_pw']) && !empty($_SESSION['sc_iis_pw']))
            {
                $Win_autentication .= " --password " . $_SESSION['sc_iis_pw'];
            }
            if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/win");
                $str_execcmd2 = 'wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]" --margin-top 0 --margin-left 0 --margin-bottom 20 --margin-right 0';
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
            {
                if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-i386");
                    $str_execcmd2 = './wkhtmltopdf-i386 ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]" --margin-top 0 --margin-left 0 --margin-bottom 20 --margin-right 0';
                }
                else
                {
                    chdir($this->Ini->path_third . "/wkhtmltopdf/linux-amd64");
                    $str_execcmd2 = './wkhtmltopdf-amd64 ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]" --margin-top 0 --margin-left 0 --margin-bottom 20 --margin-right 0';
                }
            }
            elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
            {
                chdir($this->Ini->path_third . "/wkhtmltopdf/osx/Contents/MacOS");
                $str_execcmd2 = './wkhtmltopdf ' . $str_pd4ml . $Win_autentication . ' --header-right "[page]" --margin-top 0 --margin-left 0 --margin-bottom 20 --margin-right 0';
            }

            if (!isset($_SESSION['hticnsdata']['phantomjs_charts']) || !$_SESSION['hticnsdata']['phantomjs_charts'])
            {
                $str_execcmd2 .= ' --javascript-delay ' . 2000;
            }

            $str_execcmd2 .= ' ' . $arq_pdf_in . ' ' . $arq_pdf_out;

            $arr_execcmd = array();
            $str_execcmd = $str_execcmd2;
            exec($str_execcmd2);
            // ----- PDF log
            $fp = @fopen($this->Ini->root . $this->Ini->path_imag_temp . str_replace(".pdf", "", $nm_arquivo_pdf_base) . '.log', 'w');
            if ($fp)
            {
                @fwrite($fp, $str_execcmd . "\r\n\r\n");
                @fwrite($fp, implode("\r\n", $arr_execcmd));
                @fclose($fp);
            }
            if (in_array(trim($this->Ini->str_lang), $this->Ini->nm_font_ttf) && strtolower($_SESSION['hticnsdata']['charset']) != "utf-8")
            { 
               $_SESSION['hticnsdata']['charset_html'] = (isset($this->Ini->sc_charset[$_SESSION['hticnsdata']['charset']])) ? $this->Ini->sc_charset[$_SESSION['hticnsdata']['charset']] : $_SESSION['hticnsdata']['charset'];
            }
            if (!$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_det'])
            {
                if (-1 < $this->grid->progress_grid && $this->grid->progress_fp)
                {
                    $this->grid->progress_fp = fopen($_GET['pbfile'], 'a');
                    if ($this->grid->progress_fp)
                    {
                         $lang_protect = $this->Ini->Nm_lang['lang_pdff_fnsh'];
                         if (!NM_is_utf8($lang_protect))
                         {
                             $lang_protect = sc_convert_encoding($lang_protect, "UTF-8", $_SESSION['hticnsdata']['charset']);
                          }
                        fwrite($this->grid->progress_fp, ($this->grid->progress_now + 1 + $this->grid->progress_pdf) . "_#NM#_" . $lang_protect . "...\n");
                        fwrite($this->grid->progress_fp, "off\n");
                        fclose($this->grid->progress_fp);
                    }
                }
            }
unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_file']);
if (is_file($nm_arquivo_pdf_serv))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['pdf_file'] = $nm_arquivo_pdf_serv;
}
$NM_volta  = "volta_grid";
$NM_target = "_parent";
if (!is_file($nm_arquivo_pdf_serv))
{
?>
  <br><b><?php echo $this->Ini->Nm_lang['lang_pdff_errg']; ?></b></td></tr></table>
<?php
}
else
{
?>
<?php echo $this->Ini->Nm_lang['lang_pdff_file_loct']; ?>
<BR>
<A href="<?php echo $nm_arquivo_pdf_url; ?>" target="_blank" class="scGridPageLink"><B><?php echo $nm_arquivo_pdf_url; ?></B></A>.
<BR>
<?php echo $this->Ini->Nm_lang['lang_pdff_clck_mesg']; ?>
</td></tr></table>
<?php
}
   echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "sc_b_sai", "", "", "", "absmiddle", "", "0px", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
?>
<FORM name="F0" method=post action="./" target="<?php echo $NM_target; ?>"> 
<INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($NM_volta); ?>"> 
</FORM>
</td></tr></table>
</BODY>
</HTML>
<?php
         }
      }
   } 
   function voltar() 
   {
      global 
      $nm_apl_dependente;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
      $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
               header('Location: ../grid_ConsultaDeProjetos');
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
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
   function enviarProjeto() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
      $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();

 
      $nm_select = "SELECT a.ID_Projeto as ID_Projeto, b.Code as Code, b.ID_Item as ID_Item, b.Nom_Item as Nom_Item FROM cnsdata.tb_projetoitensanalise a
INNER JOIN tb_itens b ON b.ID_Item = a.ID_Projetoitens WHERE a.ID_Projeto = '$this->sc_temp_id_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($listitens = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $listitens = false;
          $listitens_erro = $this->Db->ErrorMsg();
      } 
;
_select($listitens );
$listitens  = isset($listitens [0]) ? $listitens  : false;

if ($listitens ) {
	$isOK = [];
	foreach($listitens  as $row) {
		$rs =$this->analiticsItem($this->sc_temp_id_Projeto, $row["Code"]);		
		if (!$rs) {
			$isOK[] = $row["Nom_Item"];
		}
	}
	
	if (count($isOK)) {
		$isOK = '<strong>'.implode('</strong><br><strong>', $isOK).'</strong>';
		$msg = $this->Ini->Nm_lang['lang_label_projetoitens2'].$isOK;
		 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "errorMSG?#?" . $msg . "?@?","_self", 440, 630);
 };
	}
} else {
	$msg = $this->Ini->Nm_lang['lang_label_projetoitens3'];
	 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "errorMSG?#?" . $msg . "?@?","_self", 440, 630);
 };
}

$statusProjeto =$this->getStatusProjeto();
$num_Analise = isset($statusProjeto["Num_Analise"]) ? ++$statusProjeto["Num_Analise"] : 1;
$ID_Usuario = $s->get("ID_Usuario");
$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data, Num_Analise) Values ('$this->sc_temp_id_Projeto', 'aguardando_analise_itens', $ID_Usuario, '".date('Y-m-d H:i:s')."', $num_Analise)";
 
      $nm_select = $statusSql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;

$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "ENVIARANALISE",
	"Classe" => "Projetos",
	"Descricao" => 'Envio de projeto para análise',
	"Conteudo" => ["id_projeto" => $this->sc_temp_id_Projeto]
]);

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

$this->sendMail([
	"alert" => "warning",
	"title" => ":Nom_ProjetoTipo: <strong>:ProtocoloHex:</strong><br>ENVIADO PARA ANÁLISE",
	"content" => "
			<p>Prezado(a),</p>
			<p>Recebemos o :Nom_ProjetoTipo: sobe o código :ProtocoloHex:, que no momento será avaliada pela equipe da GLOBALBLUE.</p>
			<p>Lembrando que este projeto está sujeito a reprovação, caso não atenda às Normas e Procedimentos Técnicos do empreendimento.</p>
			<p>Você receberá um novo comunicado sobre o andamento de sua solicitação.</p>
			:tableFooter:
		",
	"subject" => ":Nom_ProjetoTipo: :ProtocoloHex: - ENVIADO PARA ANÁLISE",
	"footer" => "<table style='width:100%'>
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
			</table>"
]);

 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
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
      $this->SC_redir_btn = false;
   }
   function iniciarAnalise() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
      $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();

$statusProjeto =$this->getStatusProjeto();
$num_Analise = isset($statusProjeto["Num_Analise"]) ? $statusProjeto["Num_Analise"] : 1;
$ID_Usuario = $s->get("ID_Usuario");
$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data, Num_Analise) Values ('$this->sc_temp_id_Projeto', 'realizando_analise_itens', $ID_Usuario, '".date('Y-m-d H:i:s')."', ".$statusProjeto['Num_Analise'].")";
 
      $nm_select = $statusSql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;

$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "SUBMITSTATUS",
	"Classe" => "Projetos",
	"Descricao" => 'Iniciar analise de projeto',
	"Conteudo" => ["id_projeto" => $this->sc_temp_id_Projeto]
]);

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
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
      $this->SC_redir_btn = false;
   }
   function pauseAnalise() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
      $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();
$statusProjeto =$this->getStatusProjeto();
$num_Analise = isset($statusProjeto["Num_Analise"]) ? $statusProjeto["Num_Analise"] : 1;
$ID_Usuario = $s->get("ID_Usuario");
$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data, Num_Analise) Values ('$this->sc_temp_id_Projeto', 'interrupcao_analise_itens', $ID_Usuario, '".date('Y-m-d H:i:s')."', ".$statusProjeto['Num_Analise'].")";
 
      $nm_select = $statusSql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;

$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "SUBMITSTATUS",
	"Classe" => "Projetos",
	"Descricao" => 'Pausa na análise de projeto',
	"Conteudo" => ["id_projeto" => $this->sc_temp_id_Projeto]
]);

if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}

 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
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
      $this->SC_redir_btn = false;
   }
   function fimAnalise() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
      $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$s = new manageSession();
$statusProjeto =$this->getStatusProjeto();
$num_Analise = isset($statusProjeto["Num_Analise"]) ? $statusProjeto["Num_Analise"] : 1;
$ID_Usuario = $s->get("ID_Usuario");
 
      $nm_select = "SELECT count(*) as count FROM tb_projetoitensanalise WHERE ID_Projeto = '$this->sc_temp_id_Projeto' AND Num_Status = 'N'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rs = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;
_select($rs );
if ($rs [0]["count"] > 0) $status = "reprovado_analise_itens";
else $status = "aguardando_envio_pas1";

$statusSql = "INSERT INTO tb_projetoanalisestatus (ID_Projeto, CodeStatus, ID_Usuario, Data, Num_Analise) Values ('$this->sc_temp_id_Projeto', '$status', $ID_Usuario, '".date('Y-m-d H:i:s')."', ".$num_Analise.")";

$modelLogs->insert([
	"Modulo" => "PROJETO",
	"Funcao" => "SUBMITSTATUS",
	"Classe" => "Projetos",
	"Descricao" => 'Finalização de análise de projeto ('.($status == "aguardando_envio_pas1" ? "APROVADO NA ANÁLISE" : "REPROVADO NA ANÁLISE").')',
	"Conteudo" => ["id_projeto" => $this->sc_temp_id_Projeto]
]);

 
      $nm_select = $statusSql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      $rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rs = false;
          $rs_erro = $this->Db->ErrorMsg();
      } 
;
if ($this->Ini->sc_tem_trans_banco)
{
    $this->Db->CommitTrans();
    $this->Ini->sc_tem_trans_banco = false;
}


if ($status == "aguardando_envio_pas1") {
$this->sendMail([
		"alert" => "good",
		"title" => ":Nom_ProjetoTipo: <strong>:ProtocoloHex:</strong><br>APROVADO APÓS ANÁLISE ",
		"content" => "
				<p>Prezado(a),</p>
				<p>Informamos que o :Nom_ProjetoTipo: sobe o código :ProtocoloHex: foi aprovado após análise dos itens.</p>
				<p>Próximo Passo:</p>
				<p>Acesse o <b>CNSDATA</b> e faça a Emissão da PAS referente a Análise do Projeto;</p>
				<ul>
					<li>No menu principal do CNSDATA clicar na aba \"<b>PAS</b>\";
					<li>Acessar o campo \"<b>Adicionar PAS</b>\";
					<li>Preencher os campos:
						<ul>
							<li><b>PAS referente a</b>: Análise de Projeto;
							<li><b>Origem</b>: Projeto;
							<li><b>Projeto</b>: Digitar o Código do Projeto descrito neste email;
							<li>Escolher uma das opções de entrega do projeto: Impressão pela GLOBALBLUE ou entregar em mãos.
						</ul>
					<li>Informar os dados de contato e clicar em \"<b>Salvar</b>\" no menu superior;
					<li>\"<b>Imprima</b>\" a PAS no menu superior;
					<li>Colete a assinatura do responsável na PAS
					<li>Anexe o arquivo assinado na aba \"<b>Arquivos</b>\";
					<li>Após concluir todo o preenchimento e anexar o arquivo, clicar em \"<b>Salvar</b>\" e posterior clicar em \"<b>Enviar para Análise</b>\".
				</ul>
				<p>Aguarde o retorno sobre o status do projeto.</p>
				:tableFooter:
			",
		"subject" => ":Nom_ProjetoTipo: :ProtocoloHex:: APROVADO NA ANÁLISE"
	]);
} else {
$this->sendMail([
		"alert" => "bad",
		"title" => ":Nom_ProjetoTipo: <strong>:ProtocoloHex:</strong><br>NÃO ACEITO APÓS ANÁLISE",
		"content" => "
				<p>Prezado(a), </p>
				<p>Informamos que o :Nom_ProjetoTipo: :ProtocoloHex: não foi aceito após análise dos itens.</p>
				<p>O que devo fazer agora:</p>
				<ul>
					<li>Acessar o sistema <b>CNSDATA</b></li>
					<li>Ir no menu do sistema na opção: <b>Projeto</b></li>
					<li>Abra o projeto em questão clicando em: <b>Editar</b></li>
					<li>Nos campos de Observação de cada item, terá maiores informações sobre as pendências.</li>
					<li>Faça a readequação na documentação solicitada e anexe o documento no sistema onde foi indicado e clique em \"<b>Enviar Projeto para Análise</b>\"</li>
				</ul>
				<p>Aguarde o retorno sobre o status do projeto.</p>
				:tableFooter:
			",
		"subject" => ":Nom_ProjetoTipo: :ProtocoloHex:: REPROVADO NA ANÁLISE",
		"footer" => "<table style='width:100%'>
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
			</table>"
	]);
}

 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('grid_ProjetoItens') . "/", $this->nm_location, "","_self", 440, 630);
 };
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
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
      $this->SC_redir_btn = false;
   }
   function cabecalhoDoc() 
   {
      global 
      $nm_apl_dependente;
      $this->SC_redir_btn = true;
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens']['where_pesq_filtro'];
      $nm_f_saida = "./";
?>
     <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
      <html<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
      <head>
       <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
?>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></script>
        <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
        <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
        <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
        <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid.css" /> 
        <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_grid<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
      </head>
      <body class="scGridPage">
      <table class="scGridTabela" align="center"><tr><td>
<?php
      $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['form_CabecalhoDocProjeto_ID_Projeto'])) {$_SESSION['form_CabecalhoDocProjeto_ID_Projeto'] = "";}
if (!isset($this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto)) {$this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto = (isset($_SESSION['form_CabecalhoDocProjeto_ID_Projeto'])) ? $_SESSION['form_CabecalhoDocProjeto_ID_Projeto'] : "";}
if (!isset($_SESSION['form_CabecalhoDocProjeto_ID_Empreendimento'])) {$_SESSION['form_CabecalhoDocProjeto_ID_Empreendimento'] = "";}
if (!isset($this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento)) {$this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento = (isset($_SESSION['form_CabecalhoDocProjeto_ID_Empreendimento'])) ? $_SESSION['form_CabecalhoDocProjeto_ID_Empreendimento'] : "";}
if (!isset($_SESSION['form_CabecalhoDocProjeto_ProtocoloHex'])) {$_SESSION['form_CabecalhoDocProjeto_ProtocoloHex'] = "";}
if (!isset($this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex)) {$this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex = (isset($_SESSION['form_CabecalhoDocProjeto_ProtocoloHex'])) ? $_SESSION['form_CabecalhoDocProjeto_ProtocoloHex'] : "";}
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library("sys", "functions", "functions.php");

 
      $nm_select = "SELECT ProtocoloHex, ID_Empreendimento FROM tb_projetos WHERE ID_projeto = '$this->sc_temp_id_Projeto'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($rsprojeto = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $rsprojeto = false;
          $rsprojeto_erro = $this->Db->ErrorMsg();
      } 
;
_select($rsprojeto );
$rsprojeto  = isset($rsprojeto [0]) ? $rsprojeto [0] : false;


if ($rsprojeto ) {
	$form_CabecalhoDocProjeto_ProtocoloHex = $rsprojeto ["ProtocoloHex"];
	$form_CabecalhoDocProjeto_ID_Empreendimento = $rsprojeto ["ID_Empreendimento"];
	$form_CabecalhoDocProjeto_ID_Projeto = $this->sc_temp_id_Projeto;
	
	 if (isset($form_CabecalhoDocProjeto_ProtocoloHex)) {$this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex = $form_CabecalhoDocProjeto_ProtocoloHex;}
;
	 if (isset($form_CabecalhoDocProjeto_ID_Empreendimento)) {$this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento = $form_CabecalhoDocProjeto_ID_Empreendimento;}
;
	 if (isset($form_CabecalhoDocProjeto_ID_Projeto)) {$this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto = $form_CabecalhoDocProjeto_ID_Projeto;}
;
	
	$app = "../cabecalhoDocProjeto";
	 if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
 if (isset($this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex)) {$_SESSION['form_CabecalhoDocProjeto_ProtocoloHex'] = $this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex;}
 if (isset($this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento)) {$_SESSION['form_CabecalhoDocProjeto_ID_Empreendimento'] = $this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento;}
 if (isset($this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto)) {$_SESSION['form_CabecalhoDocProjeto_ID_Projeto'] = $this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($app, $this->nm_location, "","_self", 440, 630);
 };
}
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
if (isset($this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex)) {$_SESSION['form_CabecalhoDocProjeto_ProtocoloHex'] = $this->sc_temp_form_CabecalhoDocProjeto_ProtocoloHex;}
if (isset($this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento)) {$_SESSION['form_CabecalhoDocProjeto_ID_Empreendimento'] = $this->sc_temp_form_CabecalhoDocProjeto_ID_Empreendimento;}
if (isset($this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto)) {$_SESSION['form_CabecalhoDocProjeto_ID_Projeto'] = $this->sc_temp_form_CabecalhoDocProjeto_ID_Projeto;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
?>
      </td></tr><tr><td align="center">
      <form name="F4" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value="volta_grid"/>
      <input type=hidden name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page);?>"/>
      <input type=hidden name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
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
      $this->SC_redir_btn = false;
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
  function close_emb()
  {
      if ($this->Db)
      {
          $this->Db->Close(); 
      }
  }
  function Format_Ajax_return($Field)
  {
  }
  function num_status_onClick()
  {
    $Old_tb_itens_num_npt = $this->tb_itens_num_npt;
    $Old_num_status = $this->num_status;
    $Old_tb_itens_id_item = $this->tb_itens_id_item;
    $this->NM_ajax_event = true;
    $this->NM_cmp_hidden = array();
    $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
               sc_include_library("sys", "functions", "functions.php");
$s = new manageSession();
$ID_Item = $this->tb_itens_id_item ; 

$profile = $s->get("profile");
$statusProjeto =$this->getStatusProjeto();
if ($statusProjeto && $statusProjeto["Code"] == "realizando_analise_itens" && isset($profile["PROJETO"]["APROVARITENS"]["v"]) && $profile["PROJETO"]["APROVARITENS"]["v"] == "S") {
	$Num_TipoUsuario = $s->get("Num_TipoUsuario");
	$Num_TipoUsuario = $Num_TipoUsuario == "GT" ? "G" : $Num_TipoUsuario;
	if ($Num_TipoUsuario == "G") {
		 $nm_apl_dest  = $this->Ini->path_link . "" . SC_dir_app_name('ctl_AnaliseItem') . "/";
 $nm_apl_parms = "clt_AnaliseItem_ID_Item?#?" . $ID_Item . "?@?";
 if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
 {
     $this->Ini->Arr_result['redirInfo']['metodo'] = 'location';
     $this->Ini->Arr_result['redirInfo']['action'] = $nm_apl_dest;
     $this->Ini->Arr_result['redirInfo']['target'] = "_self";
 }
 else
 {
     $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
     $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
     $this->Ini->Arr_result['redirInfo']['metodo']     = 'post';
     $this->Ini->Arr_result['redirInfo']['action']     = $nm_apl_dest;
     $this->Ini->Arr_result['redirInfo']['nmgp_parms'] = $nm_apl_parms;
     $this->Ini->Arr_result['redirInfo']['target']     = "_self";
     $this->Ini->Arr_result['redirInfo']['h_modal']    = 440;
     $this->Ini->Arr_result['redirInfo']['w_modal']    = 630;
     $this->Ini->Arr_result['redirInfo']['nmgp_url_saida']      = $this->nm_location;
     $this->Ini->Arr_result['redirInfo']['hti_cnsdata_init']    = $this->Ini->sc_page;
     $this->Ini->Arr_result['redirInfo']['hti_cnsdata_session'] = session_id();
 }
;
	}
}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
    $this->Ini->Arr_result['setValue']     = array();
    $this->Ini->Arr_result['fieldDisplay'] = array();
    if ($Old_tb_itens_num_npt != $this->tb_itens_num_npt)
    {
        $this->Format_Ajax_return("tb_itens_num_npt");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'tb_itens_num_npt', 'value' => NM_charset_to_utf8($this->tb_itens_num_npt));
    }
    if ($Old_num_status != $this->num_status)
    {
        $this->Format_Ajax_return("num_status");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'num_status', 'value' => NM_charset_to_utf8($this->num_status));
    }
    if ($Old_tb_itens_id_item != $this->tb_itens_id_item)
    {
        $this->Format_Ajax_return("tb_itens_id_item");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'tb_itens_id_item', 'value' => NM_charset_to_utf8($this->tb_itens_id_item));
    }
    if (!empty($this->NM_cmp_hidden))
    {
        foreach ($this->NM_cmp_hidden as $cmp => $val)
        {
            $this->Ini->Arr_result['fieldDisplay'][] = array('field' => $cmp, 'status' => $val);
        }
    }
    $this->NM_ajax_event = false;
  }
  function editar_onClick()
  {
    $Old_tb_itens_id_item = $this->tb_itens_id_item;
    $Old_editar = $this->editar;
    $Old_rsprojeto = $this->rsprojeto;
    $Old_rsitem = $this->rsitem;
    $this->NM_ajax_event = true;
    $this->NM_cmp_hidden = array();
    $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'on';
if (!isset($_SESSION['form_pi_Nom_Formulario'])) {$_SESSION['form_pi_Nom_Formulario'] = "";}
if (!isset($this->sc_temp_form_pi_Nom_Formulario)) {$this->sc_temp_form_pi_Nom_Formulario = (isset($_SESSION['form_pi_Nom_Formulario'])) ? $_SESSION['form_pi_Nom_Formulario'] : "";}
if (!isset($_SESSION['form_pi_CodeItem'])) {$_SESSION['form_pi_CodeItem'] = "";}
if (!isset($this->sc_temp_form_pi_CodeItem)) {$this->sc_temp_form_pi_CodeItem = (isset($_SESSION['form_pi_CodeItem'])) ? $_SESSION['form_pi_CodeItem'] : "";}
if (!isset($_SESSION['form_pi_ID_Projeto'])) {$_SESSION['form_pi_ID_Projeto'] = "";}
if (!isset($this->sc_temp_form_pi_ID_Projeto)) {$this->sc_temp_form_pi_ID_Projeto = (isset($_SESSION['form_pi_ID_Projeto'])) ? $_SESSION['form_pi_ID_Projeto'] : "";}
if (!isset($_SESSION['form_pi_ProtocoloHex'])) {$_SESSION['form_pi_ProtocoloHex'] = "";}
if (!isset($this->sc_temp_form_pi_ProtocoloHex)) {$this->sc_temp_form_pi_ProtocoloHex = (isset($_SESSION['form_pi_ProtocoloHex'])) ? $_SESSION['form_pi_ProtocoloHex'] : "";}
if (!isset($_SESSION['id_Projeto'])) {$_SESSION['id_Projeto'] = "";}
if (!isset($this->sc_temp_id_Projeto)) {$this->sc_temp_id_Projeto = (isset($_SESSION['id_Projeto'])) ? $_SESSION['id_Projeto'] : "";}
               sc_include_library("sys", "functions", "functions.php");

 
      $nm_select = "SELECT ProtocoloHex FROM tb_projetos WHERE ID_projeto = '$this->sc_temp_id_Projeto'"; 
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

 
      $nm_select = "SELECT Code as CodeItem, Nom_Formulario FROM tb_itens WHERE ID_Item = '$this->tb_itens_id_item'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->rsitem = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rsitem = false;
          $this->rsitem_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->rsitem );
$this->rsitem  = isset($this->rsitem [0]) ? $this->rsitem [0] : false;

if ($this->rsprojeto  && $this->rsitem  && $this->rsitem ["Nom_Formulario"]) {
	$form_pi_ProtocoloHex = $this->rsprojeto ["ProtocoloHex"];
	$form_pi_ID_Projeto = $this->sc_temp_id_Projeto;
	$form_pi_CodeItem = $this->rsitem ["CodeItem"];
	$form_pi_Nom_Formulario = $this->rsitem ["Nom_Formulario"];
	
	 if (isset($form_pi_ProtocoloHex)) {$this->sc_temp_form_pi_ProtocoloHex = $form_pi_ProtocoloHex;}
;
	 if (isset($form_pi_ID_Projeto)) {$this->sc_temp_form_pi_ID_Projeto = $form_pi_ID_Projeto;}
;
	 if (isset($form_pi_CodeItem)) {$this->sc_temp_form_pi_CodeItem = $form_pi_CodeItem;}
;
	 if (isset($form_pi_Nom_Formulario)) {$this->sc_temp_form_pi_Nom_Formulario = $form_pi_Nom_Formulario;}
;
	$CNSDATA_novaABA_APP = "../".$form_pi_Nom_Formulario;
	 $nm_apl_dest  = $CNSDATA_novaABA_APP;
 $nm_apl_parms = "";
 if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
 {
     $this->Ini->Arr_result['redirInfo']['metodo'] = 'location';
     $this->Ini->Arr_result['redirInfo']['action'] = $nm_apl_dest;
     $this->Ini->Arr_result['redirInfo']['target'] = "_self";
 }
 else
 {
     $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
     $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
     $this->Ini->Arr_result['redirInfo']['metodo']     = 'post';
     $this->Ini->Arr_result['redirInfo']['action']     = $nm_apl_dest;
     $this->Ini->Arr_result['redirInfo']['nmgp_parms'] = $nm_apl_parms;
     $this->Ini->Arr_result['redirInfo']['target']     = "_self";
     $this->Ini->Arr_result['redirInfo']['h_modal']    = 440;
     $this->Ini->Arr_result['redirInfo']['w_modal']    = 630;
     $this->Ini->Arr_result['redirInfo']['nmgp_url_saida']      = $this->nm_location;
     $this->Ini->Arr_result['redirInfo']['hti_cnsdata_init']    = $this->Ini->sc_page;
     $this->Ini->Arr_result['redirInfo']['hti_cnsdata_session'] = session_id();
 }
;
}
if (isset($this->sc_temp_id_Projeto)) {$_SESSION['id_Projeto'] = $this->sc_temp_id_Projeto;}
if (isset($this->sc_temp_form_pi_ProtocoloHex)) {$_SESSION['form_pi_ProtocoloHex'] = $this->sc_temp_form_pi_ProtocoloHex;}
if (isset($this->sc_temp_form_pi_ID_Projeto)) {$_SESSION['form_pi_ID_Projeto'] = $this->sc_temp_form_pi_ID_Projeto;}
if (isset($this->sc_temp_form_pi_CodeItem)) {$_SESSION['form_pi_CodeItem'] = $this->sc_temp_form_pi_CodeItem;}
if (isset($this->sc_temp_form_pi_Nom_Formulario)) {$_SESSION['form_pi_Nom_Formulario'] = $this->sc_temp_form_pi_Nom_Formulario;}
$_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off'; 
    $this->Ini->Arr_result['setValue']     = array();
    $this->Ini->Arr_result['fieldDisplay'] = array();
    if ($Old_tb_itens_id_item != $this->tb_itens_id_item)
    {
        $this->Format_Ajax_return("tb_itens_id_item");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'tb_itens_id_item', 'value' => NM_charset_to_utf8($this->tb_itens_id_item));
    }
    if ($Old_editar != $this->editar)
    {
        $this->Format_Ajax_return("editar");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'editar', 'value' => NM_charset_to_utf8($this->editar));
    }
    if ($Old_rsprojeto != $this->rsprojeto)
    {
        $this->Format_Ajax_return("rsprojeto");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'rsprojeto', 'value' => NM_charset_to_utf8($this->rsprojeto));
    }
    if ($Old_rsitem != $this->rsitem)
    {
        $this->Format_Ajax_return("rsitem");
        $this->Ini->Arr_result['setValue'][] = array('field' => 'rsitem', 'value' => NM_charset_to_utf8($this->rsitem));
    }
    if (!empty($this->NM_cmp_hidden))
    {
        foreach ($this->NM_cmp_hidden as $cmp => $val)
        {
            $this->Ini->Arr_result['fieldDisplay'][] = array('field' => $cmp, 'status' => $val);
        }
    }
    $this->NM_ajax_event = false;
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
  function html_doc_word($nm_arquivo_doc_word)
  {
      global $nm_url_saida;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> -  :: Doc</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
if ($_SESSION['hticnsdata']['proc_mobile'])
{
?>
   <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
}
$path_doc_md5 = md5($this->Ini->path_imag_temp . $nm_arquivo_doc_word);
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens'][$path_doc_md5][0] = $this->Ini->path_imag_temp . $nm_arquivo_doc_word;
$_SESSION['sc_session'][$this->Ini->sc_page]['grid_ProjetoItens'][$path_doc_md5][1] = substr($nm_arquivo_doc_word, 1);
?>
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['hticnsdata']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">WORD</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . $nm_arquivo_doc_word ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_ProjetoItens_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_ProjetoItens"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="hti_cnsdata_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($this->ret_word) ?>"> 
</FORM> 
</BODY>
</HTML>
<?php
  }
} 
// 
//======= =========================
   if (!function_exists("NM_is_utf8"))
   {
       include_once("../_lib/lib/php/nm_utf8.php");
   }
   if (!function_exists("SC_dir_app_ini"))
   {
       include_once("../_lib/lib/php/nm_ctrl_app_name.php");
   }
   SC_dir_app_ini('CNSData');
   $_SESSION['hticnsdata']['grid_ProjetoItens']['contr_erro'] = 'off';
   $sc_conv_var = array();
   $Sc_lig_md5 = false;
   if (!empty($_POST))
   {
       foreach ($_POST as $nmgp_var => $nmgp_val)
       {
            $nmgp_val = str_replace("__NM_PLUS__", "+", $nmgp_val);
            $nmgp_val = str_replace("__NM_AMP__", "&", $nmgp_val);
            $nmgp_val = str_replace("__NM_PRC__", "%", $nmgp_val);
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
             if ($nmgp_var == "nmgp_parms_where" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]];
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
             }
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_ProjetoItens($nmgp_val);
            nm_protect_num_grid_ProjetoItens($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (!empty($_GET))
   {
       foreach ($_GET as $nmgp_var => $nmgp_val)
       {
            $nmgp_val = str_replace("__NM_PLUS__", "+", $nmgp_val);
            $nmgp_val = str_replace("__NM_AMP__", "&", $nmgp_val);
            $nmgp_val = str_replace("__NM_PRC__", "%", $nmgp_val);
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
             if ($nmgp_var == "nmgp_parms_where" && substr($nmgp_val, 0, 8) == "@SC_par@")
             {
                 $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                 if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]]))
                 {
                     $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['LigR_Md5'][$SC_Ind_Val[3]];
                 }
                 else
                 {
                     $_SESSION['sc_session']['SC_parm_violation'] = true;
                 }
             }
            if (isset($sc_conv_var[$nmgp_var]))
            {
                $nmgp_var = $sc_conv_var[$nmgp_var];
            }
            elseif (isset($sc_conv_var[strtolower($nmgp_var)]))
            {
                $nmgp_var = $sc_conv_var[strtolower($nmgp_var)];
            }
            nm_limpa_str_grid_ProjetoItens($nmgp_val);
            nm_protect_num_grid_ProjetoItens($nmgp_var, $nmgp_val);
            $$nmgp_var = $nmgp_val;
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
   if (isset($language)) 
   {
       $_SESSION['language'] = $language;
   }
   if (isset($id_Projeto)) 
   {
       $_SESSION['id_Projeto'] = $id_Projeto;
   }
   if (isset($errorMSG)) 
   {
       $_SESSION['errorMSG'] = $errorMSG;
   }
   if (isset($CNSDATA_novaABA_APP)) 
   {
       $_SESSION['CNSDATA_novaABA_APP'] = $CNSDATA_novaABA_APP;
   }
   if (!empty($glo_perfil))  
   { 
      $_SESSION['hticnsdata']['glo_perfil'] = $glo_perfil;
   }   
   if (isset($glo_servidor)) 
   {
       $_SESSION['hticnsdata']['glo_servidor'] = $glo_servidor;
   }
   if (isset($glo_banco)) 
   {
       $_SESSION['hticnsdata']['glo_banco'] = $glo_banco;
   }
   if (isset($glo_tpbanco)) 
   {
       $_SESSION['hticnsdata']['glo_tpbanco'] = $glo_tpbanco;
   }
   if (isset($glo_usuario)) 
   {
       $_SESSION['hticnsdata']['glo_usuario'] = $glo_usuario;
   }
   if (isset($glo_senha)) 
   {
       $_SESSION['hticnsdata']['glo_senha'] = $glo_senha;
   }
   if (isset($glo_senha_protect)) 
   {
       $_SESSION['hticnsdata']['glo_senha_protect'] = $glo_senha_protect;
   }
   if (isset($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_pai']))
   {
       $apl_pai = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_pai'];
       if (isset($_SESSION['sc_session'][$hti_cnsdata_init][$apl_pai]['embutida_filho']))
       {
           foreach ($_SESSION['sc_session'][$hti_cnsdata_init][$apl_pai]['embutida_filho'] as $init_filho)
           {
               if (isset($_SESSION['sc_session'][$init_filho]['grid_ProjetoItens']['master_pai']) && $_SESSION['sc_session'][$init_filho]['grid_ProjetoItens']['master_pai'] == $hti_cnsdata_init)
               {
                   $hti_cnsdata_init = $init_filho;
                   break;
               }
           }
       }
   }
   if (isset($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form']) && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form'] && !isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['master_pai']))
   {
       $SC_init_ant = $hti_cnsdata_init;
       $hti_cnsdata_init = rand(2, 10000);
       if (isset($_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_pai']))
       {
           $_SESSION['sc_session'][$SC_init_ant][$_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_pai']]['embutida_filho'][] = $hti_cnsdata_init;
       }
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['master_pai'] = $SC_init_ant;
   }
   if (isset($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['master_pai']))
   {
       $SC_init_ant = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['master_pai'];
       if (!isset($_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form_parms']))
       {
           $_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form_parms'] = "";
       }
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_parms'] = $_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form_parms'];
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form'] = true;
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_full'] = (isset($_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form_full'])) ? $_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form_full'] : false;
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['reg_start'] = "";
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] = "inicio";
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form']);
       unset($_SESSION['sc_session'][$SC_init_ant]['grid_ProjetoItens']['embutida_form_parms']);
   }
   if (isset($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_parms'])) 
   {
       if (!empty($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_parms'])) 
       {
           $nmgp_parms = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_parms'];
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_parms'] = "";
       }
   }
   elseif (isset($hti_cnsdata_init))
   {
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form']);
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_full']);
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_parms']);
   }
   if (!isset($nmgp_opcao) || !isset($hti_cnsdata_init) || ((!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida']) && $nmgp_opcao != "formphp"))
   { 
       if (!empty($nmgp_parms)) 
       { 
           $nmgp_parms = NM_decode_input($nmgp_parms);
           $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
           $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
           $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
           $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
           $todo  = explode("?@?", $todox);
           foreach ($todo as $param)
           {
                $cadapar = explode("?#?", $param);
                if (1 < sizeof($cadapar))
                {
                    if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                    {
                        $cadapar[0] = substr($cadapar[0], 11);
                        $cadapar[1] = $_SESSION[$cadapar[1]];
                    }
                    if (isset($sc_conv_var[$cadapar[0]]))
                    {
                        $cadapar[0] = $sc_conv_var[$cadapar[0]];
                    }
                    elseif (isset($sc_conv_var[strtolower($cadapar[0])]))
                    {
                        $cadapar[0] = $sc_conv_var[strtolower($cadapar[0])];
                    }
                    nm_limpa_str_grid_ProjetoItens($cadapar[1]);
                    nm_protect_num_grid_ProjetoItens($cadapar[0], $cadapar[1]);
                    if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                    $Tmp_par   = $cadapar[0];
                    $$Tmp_par = $cadapar[1];
                }
           }
           if (isset($language)) 
           {
               $_SESSION['language'] = $language;
               nm_limpa_str_grid_ProjetoItens($_SESSION["language"]);
           }
           if (!isset($id_Projeto) && isset($id_projeto)) 
           {
               $_SESSION["id_Projeto"] = $id_projeto;
           }
           if (isset($id_Projeto)) 
           {
               $_SESSION['id_Projeto'] = $id_Projeto;
               nm_limpa_str_grid_ProjetoItens($_SESSION["id_Projeto"]);
           }
           if (!isset($errorMSG) && isset($errormsg)) 
           {
               $_SESSION["errorMSG"] = $errormsg;
           }
           if (isset($errorMSG)) 
           {
               $_SESSION['errorMSG'] = $errorMSG;
               nm_limpa_str_grid_ProjetoItens($_SESSION["errorMSG"]);
           }
           if (!isset($CNSDATA_novaABA_APP) && isset($cnsdata_novaaba_app)) 
           {
               $_SESSION["CNSDATA_novaABA_APP"] = $cnsdata_novaaba_app;
           }
           if (isset($CNSDATA_novaABA_APP)) 
           {
               $_SESSION['CNSDATA_novaABA_APP'] = $CNSDATA_novaABA_APP;
               nm_limpa_str_grid_ProjetoItens($_SESSION["CNSDATA_novaABA_APP"]);
           }
           $NMSC_conf_apl = array();
           if (isset($NMSC_inicial))
           {
               $NMSC_conf_apl['inicial'] = $NMSC_inicial;
           }
           if (isset($NMSC_rows))
           {
               $NMSC_conf_apl['rows'] = $NMSC_rows;
           }
           if (isset($NMSC_cols))
           {
               $NMSC_conf_apl['cols'] = $NMSC_cols;
           }
           if (isset($NMSC_paginacao))
           {
               $NMSC_conf_apl['paginacao'] = $NMSC_paginacao;
           }
           if (isset($NMSC_cab))
           {
               $NMSC_conf_apl['cab'] = $NMSC_cab;
           }
           if (isset($NMSC_nav))
           {
               $NMSC_conf_apl['nav'] = $NMSC_nav;
           }
           if (isset($NM_run_iframe) && $NM_run_iframe == 1) 
           { 
               unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']);
               $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['b_sair'] = false;
           }   
       } 
   } 
   $ini_embutida = "";
   if (isset($hti_cnsdata_init) && isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida']) && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'])
   {
       $nmgp_outra_jan = "";
   }
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $hti_cnsdata_init = "";
   }
   if (isset($GLOBALS["hti_cnsdata_init"]) && !empty($GLOBALS["hti_cnsdata_init"]))
   {
       $ini_embutida = $GLOBALS["hti_cnsdata_init"];
        if (!isset($_SESSION['sc_session'][$ini_embutida]['grid_ProjetoItens']['embutida']))
        { 
           $_SESSION['sc_session'][$ini_embutida]['grid_ProjetoItens']['embutida'] = false;
        }
        if (!$_SESSION['sc_session'][$ini_embutida]['grid_ProjetoItens']['embutida'])
        { 
           $hti_cnsdata_init = $ini_embutida;
        }
   }
   if (isset($_SESSION['hticnsdata']['grid_ProjetoItens']['protect_modal']) && !empty($_SESSION['hticnsdata']['grid_ProjetoItens']['protect_modal']))
   {
       $hti_cnsdata_init = $_SESSION['hticnsdata']['grid_ProjetoItens']['protect_modal'];
   }
   if (!isset($hti_cnsdata_init) || empty($hti_cnsdata_init))
   {
       $hti_cnsdata_init = rand(2, 10000);
   }
   $salva_emb    = false;
   $salva_iframe = false;
   $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['doc_word'] = false;
   $_SESSION['hticnsdata']['saida_word'] = false;
   $_SESSION['sc_session']['grid_ProjetoItens']['show_skip_charts_option'] = false;
   if (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['skip_charts']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['skip_charts'] = false;
   }
   if (isset($_GET['sc_create_charts']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['skip_charts'] = 'N' == $_GET['sc_create_charts'];
   }
   elseif (isset($_POST['sc_create_charts']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['skip_charts'] = 'N' == $_POST['sc_create_charts'];
   }
   if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu'];
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu']);
   }
   if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida']))
   {
       $salva_emb = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'];
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1 && !$salva_emb)
   {
        if (isset($_SESSION['hticnsdata']['sc_aba_iframe']) && isset($_SESSION['hticnsdata']['sc_apl_menu_atual']))
        {
            foreach ($_SESSION['hticnsdata']['sc_aba_iframe'] as $aba => $apls_aba)
            {
                if ($aba == $_SESSION['hticnsdata']['sc_apl_menu_atual'])
                {
                    unset($_SESSION['hticnsdata']['sc_aba_iframe'][$aba]);
                    break;
                }
            }
        }
        $_SESSION['hticnsdata']['sc_apl_menu_atual'] = "grid_ProjetoItens";
        $achou = false;
        if (isset($_SESSION['sc_session'][$hti_cnsdata_init]))
        {
            foreach ($_SESSION['sc_session'][$hti_cnsdata_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'grid_ProjetoItens' || $achou)
                {
                    unset($_SESSION['sc_session'][$hti_cnsdata_init][$nome_apl]);
                }
            }
            if (!$achou && isset($nm_apl_menu))
            {
                foreach ($_SESSION['sc_session'][$hti_cnsdata_init] as $nome_apl => $resto)
                {
                    if ($nome_apl == $nm_apl_menu || $achou)
                    {
                        $achou = true;
                        if ($nome_apl != $nm_apl_menu)
                        {
                            unset($_SESSION['sc_session'][$hti_cnsdata_init][$nome_apl]);
                        }
                    }
                }
            }
        }
        $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_menu'] = $salva_iframe;
   }
   $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'] = $salva_emb;

   if (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['initialize']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '/grid_ProjetoItens/'))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['initialize'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['initialize'] = false;
   }
   if ($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['initialize'])
   {
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['tot_geral']);
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['contr_total_geral'] = "NAO";
   }

   $_POST['hti_cnsdata_init'] = $hti_cnsdata_init;
   if (isset($nmgp_opcao) && $nmgp_opcao == "busca" && isset($nmgp_orig_pesq))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['orig_pesq'] = $nmgp_orig_pesq;
   }
   if (!isset($nmgp_opcao) || empty($nmgp_opcao) || $nmgp_opcao == "grid" && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['b_sair'])))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['b_sair'] = true;
   }
   if (isset($_SESSION['hticnsdata']['sc_outra_jan']) && $_SESSION['hticnsdata']['sc_outra_jan'] == 'grid_ProjetoItens')
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'] = true;
        unset($_SESSION['hticnsdata']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/grid_ProjetoItens_erro.php");
   }
   $salva_tp_saida  = (isset($_SESSION['hticnsdata']['sc_tp_saida']))  ? $_SESSION['hticnsdata']['sc_tp_saida'] : "";
   $salva_url_saida  = (isset($_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init])) ? $_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init] : "";
   if (isset($_SESSION['sc_session']['hticnsdata']['embutida_form_pdf']['grid_ProjetoItens']))
   { 
       return;
   } 
   if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'] && $nmgp_opcao != "formphp")
   { 
       if ($nmgp_opcao == "change_lang" || $nmgp_opcao == "change_lang_res" || $nmgp_opcao == "change_lang_fil" || $nmgp_opcao == "force_lang")  
       { 
           if ($nmgp_opcao == "change_lang_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_lang_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           unset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['tot_geral']);
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['contr_total_geral'] = "NAO";
           $Temp_lang = explode(";" , $nmgp_idioma);  
           if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))  
           { 
               $_SESSION['hticnsdata']['str_lang'] = $Temp_lang[0];
           } 
           if (isset($Temp_lang[1]) && !empty($Temp_lang[1])) 
           { 
               $_SESSION['hticnsdata']['str_conf_reg'] = $Temp_lang[1];
           } 
       } 
       if ($nmgp_opcao == "change_schema" || $nmgp_opcao == "change_schema_fil" || $nmgp_opcao == "change_schema_res")  
       { 
           if ($nmgp_opcao == "change_schema_fil")  
           { 
               $nmgp_opcao  = "busca";  
           } 
           elseif ($nmgp_opcao == "change_schema_res")  
           { 
               $nmgp_opcao  = "resumo";  
           } 
           else 
           { 
               $nmgp_opcao  = "igual";  
           } 
           $nmgp_schema = $nmgp_schema . "/" . $nmgp_schema;  
           $_SESSION['hticnsdata']['str_schema_all'] = $nmgp_schema;
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['num_css'] = rand(0, 1000);
       } 
       if ($nmgp_opcao == "volta_grid")  
       { 
           $nmgp_opcao = "igual";  
       }   
       if (!empty($nmgp_opcao))  
       { 
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] = $nmgp_opcao ;  
       }   
       if (isset($_POST["language"])) 
       {
           $_SESSION["language"] = $_POST["language"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["language"]);
       }
       if (isset($_GET["language"])) 
       {
           $_SESSION["language"] = $_GET["language"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["language"]);
       }
       if (!isset($_SESSION["language"])) 
       {
           $_SESSION["language"] = "";
       }
       if (isset($_POST["id_Projeto"])) 
       {
           $_SESSION["id_Projeto"] = $_POST["id_Projeto"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["id_Projeto"]);
       }
       if (!isset($_POST["id_Projeto"]) && isset($_POST["id_projeto"])) 
       {
           $_SESSION["id_Projeto"] = $_POST["id_projeto"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["id_Projeto"]);
       }
       if (isset($_GET["id_Projeto"])) 
       {
           $_SESSION["id_Projeto"] = $_GET["id_Projeto"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["id_Projeto"]);
       }
       if (!isset($_GET["id_Projeto"]) && isset($_GET["id_projeto"])) 
       {
           $_SESSION["id_Projeto"] = $_GET["id_projeto"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["id_Projeto"]);
       }
       if (!isset($_SESSION["id_Projeto"])) 
       {
           $_SESSION["id_Projeto"] = "";
       }
       if (isset($_POST["errorMSG"])) 
       {
           $_SESSION["errorMSG"] = $_POST["errorMSG"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["errorMSG"]);
       }
       if (!isset($_POST["errorMSG"]) && isset($_POST["errormsg"])) 
       {
           $_SESSION["errorMSG"] = $_POST["errormsg"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["errorMSG"]);
       }
       if (isset($_GET["errorMSG"])) 
       {
           $_SESSION["errorMSG"] = $_GET["errorMSG"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["errorMSG"]);
       }
       if (!isset($_GET["errorMSG"]) && isset($_GET["errormsg"])) 
       {
           $_SESSION["errorMSG"] = $_GET["errormsg"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["errorMSG"]);
       }
       if (!isset($_SESSION["errorMSG"])) 
       {
           $_SESSION["errorMSG"] = "";
       }
       if (isset($_POST["CNSDATA_novaABA_APP"])) 
       {
           $_SESSION["CNSDATA_novaABA_APP"] = $_POST["CNSDATA_novaABA_APP"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["CNSDATA_novaABA_APP"]);
       }
       if (!isset($_POST["CNSDATA_novaABA_APP"]) && isset($_POST["cnsdata_novaaba_app"])) 
       {
           $_SESSION["CNSDATA_novaABA_APP"] = $_POST["cnsdata_novaaba_app"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["CNSDATA_novaABA_APP"]);
       }
       if (isset($_GET["CNSDATA_novaABA_APP"])) 
       {
           $_SESSION["CNSDATA_novaABA_APP"] = $_GET["CNSDATA_novaABA_APP"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["CNSDATA_novaABA_APP"]);
       }
       if (!isset($_GET["CNSDATA_novaABA_APP"]) && isset($_GET["cnsdata_novaaba_app"])) 
       {
           $_SESSION["CNSDATA_novaABA_APP"] = $_GET["cnsdata_novaaba_app"];
           nm_limpa_str_grid_ProjetoItens($_SESSION["CNSDATA_novaABA_APP"]);
       }
       if (!isset($_SESSION["CNSDATA_novaABA_APP"])) 
       {
           $_SESSION["CNSDATA_novaABA_APP"] = "";
       }
       if (isset($nmgp_lig_edit_lapis)) 
       {
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['mostra_edit'] = $nmgp_lig_edit_lapis;
           unset($GLOBALS["nmgp_lig_edit_lapis"]) ;  
           if (isset($_SESSION['nmgp_lig_edit_lapis'])) 
           {
               unset($_SESSION['nmgp_lig_edit_lapis']);
           }
       }
       if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'] = true;
       }
       $nm_saida = "";
       if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['volta_redirect_apl']) && !empty($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['volta_redirect_apl']))
       {
           $_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init] = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['volta_redirect_apl']; 
           $nm_apl_dependente = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['volta_redirect_tp']; 
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['volta_redirect_apl'] = "";
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['volta_redirect_tp'] = "";
           $nm_url_saida = "grid_ProjetoItens_fim.php"; 
       
       }
       elseif (substr($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] != "pdf" ) 
       {
           if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan']) && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'])
           {
               if ($nmgp_url_saida == "modal")
               {
                   $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_modal'] = true;
               }
               $nm_url_saida = "grid_ProjetoItens_fim.php"; 
           }
           else
           {
               $nm_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
               $nm_url_saida = str_replace("_fim.php", ".php", $nm_url_saida);
               if (!empty($nmgp_url_saida)) 
               { 
                   $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['retorno_cons'] = $nmgp_url_saida ; 
               } 
               if (!empty($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['retorno_cons'])) 
               { 
                   $nm_url_saida = $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['retorno_cons']  . "?hti_cnsdata_init=" . NM_encode_input($hti_cnsdata_init);  
                   $nm_apl_dependente = 1 ; 
               } 
               if (!empty($nm_url_saida)) 
               { 
                   $_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init] = $nm_url_saida ; 
               } 
               $_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init] = $nm_url_saida; 
               $nm_url_saida = "grid_ProjetoItens_fim.php"; 
               $_SESSION['hticnsdata']['sc_tp_saida'] = "P"; 
               if ($nm_apl_dependente == 1) 
               { 
                   $_SESSION['hticnsdata']['sc_tp_saida'] = "D"; 
               } 
           } 
       }
// 
       if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && $nm_apl_dependente != 1 && substr($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'], 0, 7) != "grafico" && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] != "pdf" ) 
       { 
            $_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init] = $_SESSION['hticnsdata']['nm_sc_retorno']; 
            $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['menu_desenv'] = true;   
       } 
       if (isset($nmgp_parms_ret)) 
       {
           $todo = explode(",", $nmgp_parms_ret);
           if (isset($sc_conv_var[$todo[2]]))
           {
               $todo[2] = $sc_conv_var[$todo[2]];
           }
           elseif (isset($sc_conv_var[strtolower($todo[2])]))
           {
               $todo[2] = $sc_conv_var[strtolower($todo[2])];
           }
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['form_psq_ret']  = $todo[0];
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['campo_psq_ret'] = $todo[1];
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['dado_psq_ret']  = $todo[2];
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['js_apos_busca'] = $nm_evt_ret_busca;
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opc_psq'] = true;   
           if (isset($nmgp_iframe_ret)) 
           {
               $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['iframe_ret_cap'] = $nmgp_iframe_ret;
           }
       } 
       elseif (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opc_psq']))
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opc_psq'] = false ;   
       } 
       if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form']) && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form'])
       {
           if (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_full']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida_form_full'])
           {
               $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['mostra_edit'] = "N";   
           } 
           $_SESSION['hticnsdata']['sc_tp_saida']  = $salva_tp_saida;
           $_SESSION['hticnsdata']['sc_url_saida'][$hti_cnsdata_init] = $salva_url_saida;
       } 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan']) && $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['sc_outra_jan'])
       {
           $nm_apl_dependente = 0;
       }
       $contr_grid_ProjetoItens = new grid_ProjetoItens_apl();

      if ('ajax_autocomp' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] = "busca";
          $contr_grid_ProjetoItens->NM_ajax_flag = true;
          $contr_grid_ProjetoItens->NM_ajax_opcao = $NM_ajax_opcao;
      }
      if ('ajax_filter_save' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] = "busca";
          $contr_grid_ProjetoItens->NM_ajax_flag = true;
          $contr_grid_ProjetoItens->NM_ajax_opcao = "ajax_filter_save";
      }
      if ('ajax_filter_delete' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] = "busca";
          $contr_grid_ProjetoItens->NM_ajax_flag = true;
          $contr_grid_ProjetoItens->NM_ajax_opcao = "ajax_filter_delete";
      }
      if ('ajax_filter_select' == $nmgp_opcao)
      {
          $nmgp_opcao = 'busca';
          $_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['opcao'] = "busca";
          $contr_grid_ProjetoItens->NM_ajax_flag = true;
          $contr_grid_ProjetoItens->NM_ajax_opcao = "ajax_filter_select";
      }
       $contr_grid_ProjetoItens->controle();
   } 
   if (!$_SESSION['sc_session'][$hti_cnsdata_init]['grid_ProjetoItens']['embutida'] && $nmgp_opcao == "formphp")
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 0;  
       $contr_grid_ProjetoItens = new grid_ProjetoItens_apl();
       $contr_grid_ProjetoItens->controle();
   } 
//
   function nm_limpa_str_grid_ProjetoItens(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = str_replace("@aspasd@", '"', $str[$x]);
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = str_replace("@aspasd@", '"', $str);
               $str = stripslashes($str);
           }
       }
   }
   function nm_protect_num_grid_ProjetoItens($name, &$val)
   {
       if (empty($val))
       {
          return;
       }
       $Nm_numeric = array();
       if (in_array($name, $Nm_numeric))
       {
           if (is_array($val))
           {
               foreach ($val as $cada_val)
               {
                  $tmp_pos = strpos($cada_val, "##@@");
                  if ($tmp_pos !== false)
                   {
                      $cada_val = substr($cada_val, 0, $tmp_pos);
                  }
                  for ($x = 0; $x < strlen($cada_val); $x++)
                  {
                      if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
                      {
                          $val = array();
                          return;
                      }
                   }
               }
               return;
           }
           $cada_val = $val;
           $tmp_pos = strpos($cada_val, "##@@");
           if ($tmp_pos !== false)
            {
               $cada_val = substr($cada_val, 0, $tmp_pos);
           }
           for ($x = 0; $x < strlen($cada_val); $x++)
           {
               if (($cada_val[$x] < 0 || $cada_val[$x] > 9) && $cada_val[$x] != "."  && $cada_val[$x] != "," && $cada_val[$x] != "-")
               {
                   $val = 0;
                   return;
               }
           }
       }
   }
   function grid_ProjetoItens_pack_protect_string($sString)
   {
      $sString = (string) $sString;
      if (!empty($sString))
      {
         if (function_exists('NM_is_utf8') && NM_is_utf8($sString))
         {
             return $sString;
         }
         else
         {
             return sc_htmlentities($sString);
         }
      }
      elseif ('0' === $sString || 0 === $sString)
      {
         return '0';
      }
      else
      {
         return '';
      }
   }
?>
