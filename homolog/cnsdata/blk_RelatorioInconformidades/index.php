<?php
   include_once('blk_RelatorioInconformidades_session.php');
   @session_start() ;
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_prod']       = "";
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_conf']       = "";
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imagens']    = "";
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imag_temp']  = "";
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_doc']        = "";
//
class blk_RelatorioInconformidades_ini
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
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "blk_RelatorioInconformidades"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "CNSData"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "developer"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "sb_bronze"; 
      $this->nm_dt_criacao   = "20180405"; 
      $this->nm_hr_criacao   = "120355"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20180605"; 
      $this->nm_hr_ult_alt   = "181703"; 
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
      if(empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_path_doc'];
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
      $this->str_schema_all    = (isset($_SESSION['hticnsdata']['str_schema_all']) && !empty($_SESSION['hticnsdata']['str_schema_all'])) ? $_SESSION['hticnsdata']['str_schema_all'] : "Green/Green";
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/blk_RelatorioInconformidades';
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
          include_once("blk_RelatorioInconformidades_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['compact_mode']    = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["blk_RelatorioInconformidades"]))
          {
              foreach ($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["blk_RelatorioInconformidades"] as $sTmpTargetLink => $sTmpTargetWidget)
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
          unset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao']);
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
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan'])) 
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

// 
      include_once($this->path_aplicacao . "blk_RelatorioInconformidades_erro.class.php"); 
      $this->Erro = new blk_RelatorioInconformidades_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('blk_RelatorioInconformidades'); 
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
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['sub_dir'] = array(); 
      $_SESSION['hticnsdata']['nm_bases_security']  = "enc_nm_enc_v1DcBiDuFaHANOHuF7DMBYVIBOH5XCHMXGHQNmZ1BiD1rKHuFUHgveDkB/DurmDoJeDcBiDQX7HAN7D5NUHuBOVcFeDWXCDoJsDcBwH9B/Z1rYHQJwHgveHArCV5B7ZuJsHQNwZ9F7HAvmVWJwDMNOVIB/DWB3DoXGHQXGZkBiD1rKHuJwHgBOHErsDWrGVoFGHQNwZ9F7D1veHuNUDMBOVcBUHEX/DoXGHQBqZ1FGZ1NOHuBOHgBYHErCDWB3DoF7D9XsDQJsDSBYV5FGHgNKDkBsDurGVEBiHQBsZ1BOHIveHuFGHgrKHErsDuXKVoFGHQXsDuFaZ1BYHuJwHgvOVIB/DWXKDoXGHQNmVINUDSrYD5JwDMveVkJ3H5BmVoFGHQNwH9FUHANKVWJsDMBOVcB/DurGVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3HEB7ZuJsHQFYZSFUD1vOV5BODMBOVcXKHEX/DoXGHQBqZ1BiHIBeHuBqDMvCDkB/DWB3VoFGHQFYDQFaZ1N7HQJwDMBYVIBsDWBmDoXGHQXOZ1BiD1rwHuB/HgvsDkXKH5FGDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9FaHArKD5NUDEvsHEFiDuJeDoFUHQJKZ9F7DSvCV5JwDMBOVcrsDWJeVoraDcJUH9FaHAN7D5NUDEBOHAFKDWF/HINUD9JKDQX7HIBeD5JwHuzGZSJ3V5X7HIX7DcJUZ1FaD1rKHuBODMBYHEXeHEFaVoB/HQXGZSX7Z1N7V5JwHuBYVIBOV5FGVoraD9BiH9FaHIBeZMBODErKVkXeV5FaDoB/D9NmDQBOZ1rwV5BqHgvsDkFCDWJeDoFGD9XOZ1rqD1rKD5rqDMBYHEJGH5FYVoB/HQXGZ9rqD1BeD5rqHuvmVcBOH5B7VoBqD9XOH9B/D1rwD5BiDEBeHEFiV5FaDoXGD9NmDQB/Z1rwHuNUDMNOVcB/DWBmVorqHQNmZ1BiHABYHQBOHgveVkJ3HEXKDoBqHQXOH9BiHAveD5NUHgNKDkBOV5FYHMBiHQXOZkBiHAN7ZMBOHgveHErsDWXCHMX7HQJeDQFGD1BeHuBiHgrwVIBsDWXCDoJsDcBwH9B/Z1rYHQJwHgvCZSXeDWr/VoX7D9JKZSFUZ1rwHQrqHgrKVcBODuFqVoB/D9BiZ1F7Z1BeD5XGDEBeHEXeV5FaHIF7D9XsH9X7D1BeV5JwHuNOVIBODWF/VoraD9XOZSB/Z1rYV5JeDMzGHEFiDWX7VoFaDcBwDQFGD1BOD5NUHuzGVcFKDur/VorqHQJmZ1F7Z1vmD5rqDEBOHArCDWF/HIJsD9XsZ9JeD1BeD5F7DMvmVcBUDuX7HMraHQNmVINUHIBOD5BODMveVkJ3DWFqVoJwHQXsDuFaDSBYD5JsDMrYDkB/Dur/HMBiD9BsVIraD1rwV5X7HgBeHEBUH5FYDorqDcXOZSX7HANOV5BOHuNODkBOV5F/VEBiDcJUZkFGHArKV5FUDMrYZSXeV5FqHIJsHQBiZ9XGHANKV5XGDMvsVcBUDWB3VErqHQNmZ1BiHIBeHQJwDEBODkFeH5FYVoFGHQJKDQB/DSN7HQFaDMBYVcFKV5FYVoX7HQXGZkFGHABYHQrqHgvsZSJqV5FaDoBOHQJKDQJsZ1vCV5FGHuNOV9FeDWXCHIJeHQJmZkFUHArKHuFUDMzGHEXeH5FYVoBiD9XsZSX7HIBeV5JwHgrKDkBOHEFYVoB/DcBwZ1F7D1rKD5NUDMrYHErCHEFqVoBiDcBwH9X7Z1rwV5BOHuNOVcBODWr/DoF7VQBqH9B/Z1BOD5raHgBOHArCHEFqHMX7HQXsDuFaHIBeHuFGDMrwV9FeV5FYHMJwHQJmZ1F7Z1vmD5rqDEBOHArCDWBmZuXGHQXGZ9XGHANKVWFU";
      $this->prep_conect();
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan'])) 
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
          $this->nm_tabela = ""; 
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
              if (isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao']) && $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil']) && $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao'])) ? $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao']))
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
      if (isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil']) && !empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['embutida_init']) 
      {
          if (!isset($_SESSION['RI_ID'])) 
          {
              $this->nm_falta_var .= "RI_ID; ";
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
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['decimal_db'] = $_SESSION['hticnsdata']['glo_decimal_db']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_date_separator']) && !empty($_SESSION['hticnsdata']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['hticnsdata']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan'])) 
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
      if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && isset($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['hticnsdata']['blk_RelatorioInconformidades']['glo_nm_conexao'], $this->root . $this->path_prod, 'CNSData'); 
      } 
      else 
      { 
          ob_start();
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['embutida'])
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
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['decimal_db'] = "."; 
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioInconformidades']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
class blk_RelatorioInconformidades_apl
{
   var $Ini;
   var $Erro;
   var $Db;
   var $Lookup;
   var $nm_location;
//
//----- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini = $this->Ini;
      $this->$modulo->Db = $this->Db;
      $this->$modulo->Erro = $this->Erro;
   }
//
//----- 
   function controle()
   {
      global $nm_saida, $nm_url_saida, $hti_cnsdata_init, $glo_senha_protect;

      $this->Ini = new blk_RelatorioInconformidades_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['hticnsdata']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioInconformidades']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioInconformidades']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['blk_RelatorioInconformidades']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['blk_RelatorioInconformidades'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_RelatorioInconformidades']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_RelatorioInconformidades']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('blk_RelatorioInconformidades') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_RelatorioInconformidades']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "blk_RelatorioInconformidades")
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
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['blk_RelatorioInconformidades']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['blk_RelatorioInconformidades']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['blk_RelatorioInconformidades']['exit'];
      }
      $glo_senha_protect = (isset($_SESSION['hticnsdata']['glo_senha_protect'])) ? $_SESSION['hticnsdata']['glo_senha_protect'] : "S";

      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      nm_gc($this->Ini->path_libs);
      $this->nm_data = new nm_data("pt_br");
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
      $this->Db = $this->Ini->Db; 
      include_once($this->Ini->path_aplicacao . "blk_RelatorioInconformidades_erro.class.php"); 
      $this->Erro      = new blk_RelatorioInconformidades_erro();
      $this->Erro->Ini = $this->Ini;
//
      $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
if (!isset($_SESSION['RI_ID'])) {$_SESSION['RI_ID'] = "";}
if (!isset($this->sc_temp_RI_ID)) {$this->sc_temp_RI_ID = (isset($_SESSION['RI_ID'])) ? $_SESSION['RI_ID'] : "";}
                                                             sc_include_library("sys", "functions", "functions.php");
$GLOBALS["s"] = new manageSession();
$GLOBALS["profile"] = $GLOBALS["s"]->get("profile")["RI"] ?? null;

sc_include_library("sys", "RelatorioInconformidades", "RelatorioInconformidades.php");
$GLOBALS["_RelatorioInconformidades"] = new RelatorioInconformidades($this);

$RI_ID = $_POST["RI_ID"] ?? $_GET["RI_ID"] ?? $this->sc_temp_RI_ID ?? null;

if(!$RI_ID) {
	 if (isset($this->sc_temp_RI_ID)) {$_SESSION['RI_ID'] = $this->sc_temp_RI_ID;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctr_RelatorioInconformidades') . "/", $this->nm_location, "","_self", 440, 630, "ret_self");
 };
}

$GLOBALS["thisRI"]=($GLOBALS["_RelatorioInconformidades"]->find("ID = '$RI_ID'")[0] ?? null);
if(!$GLOBALS["thisRI"]) {
	 if (isset($this->sc_temp_RI_ID)) {$_SESSION['RI_ID'] = $this->sc_temp_RI_ID;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctr_RelatorioInconformidades') . "/", $this->nm_location, "","_self", 440, 630, "ret_self");
 };
}

$GLOBALS["_RelatorioInconformidades"]->setRI((object)$GLOBALS["thisRI"]);

$GLOBALS["thisRI"] = $GLOBALS["_RelatorioInconformidades"]->thisRI;

$GLOBALS["path_doc"] = $this->Ini->path_doc;
$GLOBALS["path_img"] = $this->Ini->path_imagens;
$GLOBALS["path_imag_temp"] = $this->Ini->path_imag_temp;
$this->router();
if (isset($this->sc_temp_RI_ID)) {$_SESSION['RI_ID'] = $this->sc_temp_RI_ID;}
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off'; 
//--- 
       $this->Db->Close(); 
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
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
?>
              <HTML<?php echo $_SESSION['hticnsdata']['reg_conf']['html_dir'] ?>>
               <HEAD>
                <TITLE></TITLE>
               <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['hticnsdata']['charset_html'] ?>" />
<?php
           if ($_SESSION['hticnsdata']['proc_mobile'])
           {
?>
                <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<?php
           }
?>
                <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>                <META http-equiv="Pragma" content="no-cache"/>
                <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery/js/jquery.js"></script>
                <script type="text/javascript">var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';</script>
                <script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></script>
                <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
                <script type="text/javascript"><?php echo $this->redir_modal ?></script>
               </HEAD>
              </HTML>
<?php
       } 
       exit;
   } 
function Audit($log, $data)
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $_RelatorioInconformidades;

sc_include_library("sys", "models", "Logs.php");
$_Logs = new Logs($this);

$GLOBALS["indexDelete"] = array();
$removeB64 = function($self, $data, $i = '') {
	foreach ($data as $j => $d1) {
		if (is_array($d1)) {
			$self($self, $d1, $i."['".$j."']");
		} elseif ($j && $j == "graph") {
			$GLOBALS["indexDelete"][] = $i."['".$j."']";

		}
	}
};

$removeB64($removeB64, (array)$data);

foreach($GLOBALS["indexDelete"] as $index) {
	eval('unset($data'.$index.');');
}

if (!$log || !$data) return;

switch($log) {
	case("saveRI"):
		$_Logs->insert([
			"Modulo" => "RI",
			"Funcao" => "EDITAR",
			"Descricao" => 'Edição de relatório de inconformidades/readequações',
			"Classe" => "RelatorioInconformidades",
			"Conteudo" => $data
		]);
		$_RelatorioInconformidades->Logs(["Funcao"=>"EDITAR"]);
	break;
	case("sendRI_PDF"):
		$_Logs->insert([
			"Modulo" => "RI",
			"Funcao" => "ENVIAR",
			"Descricao" => 'Envio de relatório de inconformidades/readequações. Exportação de PDF',
			"Classe" => "RelatorioInconformidades",
			"Conteudo" => $data
		]);
		$_RelatorioInconformidades->Logs(["Funcao"=>"ENVIAR_PDF"]);
	break;
	case("sendRI_MAIL"):
		$_Logs->insert([
			"Modulo" => "RI",
			"Funcao" => "ENVIAR",
			"Descricao" => 'Envio de relatório de inconformidades/readequações. Envio de e-mail',
			"Classe" => "RelatorioInconformidades",
			"Conteudo" => $data
		]);
		$_RelatorioInconformidades->Logs(["Funcao"=>"ENVIAR_MAIL"]);
	break;
	case("deleteRI"):
		$_Logs->insert([
			"Modulo" => "RI",
			"Funcao" => "DELETAR",
			"Descricao" => 'Remoção de relatório de inconformidades/readequações',
			"Classe" => "RelatorioInconformidades",
			"Conteudo" => $data
		]);
		$_RelatorioInconformidades->Logs(["Funcao"=>"DELETAR"]);
	break;
}



$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function PDF_css()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
return "<style>
	body {
		font-family: 'Helvetica';
		padding-top: 100px;
		padding-bottom: 65px;
	}
	.header {
		background-color: #8db3e2;
		padding: 1px 5px 1px 5px;
		height: 14px;
		font-size: 10px
	}
	.double-line {
		height: 30px;
	}
	.ddouble-line {
		height: 60px;
	}
	table.nb, table.nb td {
		border: none;
	}
	table.assinatura {
		border: none;
	}
	table.assinatura td {
		border: none;
	}
	table.assinatura > tbody > tr:nth-child(1) > td {
		border-bottom: 1px solid black;
		height: 50px;
	}
	table.assinatura > tbody > tr:nth-child(2) > td {
		height: 10px;
	}
	table.label-top {
		border: none;
	}
	table.label-top td {
		border: none;
		padding: 0;
	}
	table.label-top > tbody > tr:nth-child(2) > td > label {
		font-weight: 300;
	}
	table.rodape1, table.rodape2 {		
		border: none;
	}
	table.rodape1 td {
		border: none;
		font-size: 6px;
		color:rgb(192, 192, 192);
		font-weight: 600;
		text-align: center;
	} 
	table.rodape2 td {
		border: none;
		font-size: 12px;
		color:rgb(192, 192, 192);
		font-weight: 600;
		text-align: center;
	}
	table.rodape2, table.rodape2 td {
		border: none;
	}
	.descricao {
		font-size: 10px;
	}
	.no-padding {
		padding: 0px;
	}
	ul {
		padding: 1px 1px 1px 20px;
		font-size: 10px;
		margin: 0;
	}
	.align-top {
		vertical-algin: top;
	}
	td {
		padding: 2px 5px;
	}
	.footerHtml { position: fixed; bottom: 15mm;font-size:12px;color:rgb(150, 150, 150)}
	.headerHtml { position: fixed; top: 0px;}
	.ass {width:300px}
	.header-politica-de-adm {
		color:rgb(192, 192, 192);
		font-size: 18px;
		font-weight: 600;
	}
	.header-politica-de-adm min {
		font-size: 10px;
	}
	
	.text-center {text-align: center;}
	.text-gray {color: rgb(191,191,191);}
	.text-blue1 {color: rgb(54,95,145);}
	.text-blue2 {color: rgb(0,112,192);}
	
	.page-break-after {
		page-break-after: always;
	}
	
	.pagenum:after { content: counter(page); }
	.pagenum {top:89%;float: right;color:#666}
	
	.title1 {
		border-bottom:1px solid #aaa;
		font-weight:300;
	}
	.title2 {
		font-weight:500;
		color: black;
		margin: 5px 0px;
	}
	
	
	ul, ol, p {
		margin: 5px 0;
	}
	p {
		text-align: justify;
		font-size: 12px;
	}
	
	.quill-text {
		margin: 0;
		padding: 0;
	}
	.quill-text, quill-text ol, quill-text ul {
		font-size: 12px !important;
	}
	
	
	figure {
		display:inline-block;
		margin: 2px;
	}
	figure img {
		margin: 0 0 3px 0
	}
	figcaption {
		display: block;
		width: 100%;
		color: #444;
		text-align: center;
		border-top: 1px solid #aaa;
	}
	.legend-img-td {
		color: #444;
		border-bottom: 1px solid #aaa !important;
	}
	.img-td {
		/*border-top: 1px dotted #aaa !important;
		border-bottom: 1px solid #aaa !important;*/
	}
	.img-td img{
		margin: 5px 0;
	}
	
	table.nb, table.nb tr table.nb td, table.nb td, table.nb th, table.nb tfoot {
		border: 1px solid #00000000;
	}
</style>";

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function PDF_inconformidades($fluxo=[])
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $PDF_output;

sc_include_library("sys", "functions", "redImagem.php");

$html = '';
foreach($fluxo as $k => $Agente) {
	$hasItemShow = false;
	foreach($Agente["list"] as $i => $Inconformidade) {
		if ($Inconformidade["display"]) {
			$hasItemShow = true;
			break;
		}
	}
	if (!$hasItemShow) continue;
	
	$html .= '
		<hr>
		<h3 style="margin: 7px 0">'.$Agente["data"]["Agente"].'</h3>
		:listItens:';
	$listItens = '';
	foreach($Agente["list"] as $i => $Inconformidade) {
		$arrTr = array();
		if ($Inconformidade["display"]) {
			$listItens .= '
				<h4 style="margin: 7px 0">'.$Inconformidade["Protocolo_Inconformidades"].'</h4>
				<div>
					<p>
						<b>Data do relato</b>: '.date("d/m/Y H:i", strtotime($Inconformidade["DataRelato_Inconformidade"])).'<br>
						<b>Data do incidente</b>: '.date("d/m/Y", strtotime($Inconformidade["DataIncidente_Inconformidade"])).'<br>
						<b>Status</b>: '.$Inconformidade["Num_Status_Text_Inconformidade"].'
					</p>
				</div>
				<div class="quill-text"> <i>Descrição</i>:<br>
					'.$this->sanitizeQuillHTML($Inconformidade["Descricao_RIInconformidades"]).'
				</div>
				<div class="quill-text"> <i>Histórico</i>:<br>
					'.$this->sanitizeQuillHTML($Inconformidade["Historico_RIInconformidades"]).'
				</div>
				<br>
				:listIMG:
				<br><br>
			';

			foreach($Inconformidade["IMG"] as $j => $IMG) { 
				if (!$IMG["display"]) {
					unset($Inconformidade["IMG"][$j]);
				}
			}

			if (count($Inconformidade["IMG"]) > 0) {
				$arrTdImg = array();
				$arrTdDesc = array();
				foreach($Inconformidade["IMG"] as $j => $IMG) {
					$colspan = (isset($Inconformidade["IMG"][$j+1]) ? 1 : 2);
					$IMG_B64 = $PDF_output == "PDF" ? $IMG["FS"] : $IMG["URL"];
					$arrTdImg[] = '
						<td colspan="'.$colspan.'" class="text-center img-td col-6">
							<img src="'.$IMG_B64.'" style="max-width:250px;max-height:300px;">
						</td>';
					$arrTdDesc[] = '<td class="text-center legend-img-td" colspan="'.$colspan.'">'.$this->sanitizeQuillHTML($IMG["Descricao_RIInconformidadesIMG"]).'</td>';
				}

				$iTr = 0;
				$jIMG = $jDesc = 0; 
				do {
					$imgTr = $arrTdImg[$jIMG++];
					if (isset($arrTdImg[$jIMG])) $imgTr .= $arrTdImg[$jIMG++];

					$descTr = $arrTdDesc[$jDesc++];
					if (isset($arrTdDesc[$jDesc])) $descTr .= $arrTdDesc[$jDesc++];

					$arrTr[$iTr++] = '<table class="col-12 nb"><tr>'.$imgTr.'</tr><tr>'.$descTr.'</tr></table>';
				} while ($jIMG < count($arrTdImg));

				if ($arrTr) { 
					$arrTr = '<table style="page-break-inside: auto;" class="col-12 nb"><tr><td>'.implode('</td></tr><tr><td>', $arrTr).'</td></tr></table>'; 
				} else { $arrTr = null; }
			}
			$listItens = strtr($listItens, [":listIMG:" => $arrTr ?: null]);
		}
	}
	$html = strtr($html, [
		":listItens:" => $listItens
	]);
}
return $html;


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function deleteRIAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $thisRI;
global $_RelatorioInconformidades;
global $s;

$_RelatorioInconformidades->save("ID = '".$thisRI->ID."'", [
	"Num_Status" => "D",
	"Num_Ativo" => "R",
	"Removido_em" => date("Y-m-d H:i:s")
]);

$s->setIUDState("grid_RelatorioInconformidades", "I", "success", "Relatório de inconformidades removido");

$thisRI->Num_Status = "D";
$thisRI->Num_Ativo = "R";
$thisRI->Removido_em = date("Y-m-d H:i:s");
$this->Audit("deleteRI", $thisRI);

$response =$this->response();
$response->redirect = "../grid_RelatorioInconformidades";$this->send($response);

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function directive()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
?>
<script>
App["directive"]('inconformidades', function($sce) {
    return {
        link: function(scope, element, attrs, ctr) {
            scope.inconformidadeQuill = typeof scope.inconformidadeQuill == "undefined" ? {IMG:Array()} : scope.inconformidadeQuill;
            setTimeout(function(){                
                quill = "quill_inconformidade_descricao"+scope.key+scope.iinconformidade;
                scope.inconformidadeQuill.quillDescricao = initQuill(quill);
                scope.inconformidadeQuill.quillDescricao.root.innerHTML = scope.thisData.Descricao_RIInconformidades;
                scope.inconformidadeQuill.quillDescricao.on("text-change", function() {
                    scope.thisData.Descricao_RIInconformidades = scope.inconformidadeQuill.quillDescricao.root.innerHTML;
                });

                quill = "quill_inconformidade_historico"+scope.key+scope.iinconformidade;
                scope.inconformidadeQuill.quillHistorico = initQuill(quill);
                scope.inconformidadeQuill.quillHistorico.root.innerHTML = scope.thisData.Historico_RIInconformidades;
                scope.inconformidadeQuill.quillHistorico.on("text-change", function() {
                    scope.thisData.Historico_RIInconformidades = scope.inconformidadeQuill.quillHistorico.root.innerHTML;
                });

                angular.forEach(scope.thisData.IMG, function(IMG, iIMG){
                    quill = "quill_inconformidade_img"+scope.key+IMG.ID_InconformidadesIMG;
                    scope.inconformidadeQuill.IMG[""+iIMG] = {};
                    scope.inconformidadeQuill.IMG[""+iIMG].quill = initQuill(quill);
                    scope.inconformidadeQuill.IMG[""+iIMG].quill.root.innerHTML = scope.thisData.IMG[""+iIMG].Descricao_RIInconformidadesIMG;
                    scope.inconformidadeQuill.IMG[""+iIMG].quill.on("text-change", function() {
                        scope.thisData.IMG[""+iIMG].Descricao_RIInconformidadesIMG =
                            scope.inconformidadeQuill.IMG[""+iIMG].quill.root.innerHTML;
                    });
                });
            }, 500);
        },
        controller: ['$scope', '$sce', function($scope, $sce){
            _self = this;
       		$scope.thisData = $scope.inconformidade;
			console.log($scope.thisData);
            $scope.moveInconformidade = function (iObj, sent) {
				console.log($scope.Inconformidade);
                $scope.Inconformidades[$scope.key].list.move(iObj, iObj + sent);
            }
            $scope.moveInconformidadeIMG = function (iObj, sent) {
                $scope.thisData.IMG.move(iObj, iObj + sent);
            }
        }],
        template: `
			<label>Exibir 
                <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                ng-model="thisData.display"></label>
            <a class="btn btn-default" ng-click="moveInconformidade(iinconformidade, 1)" 
                   ng-class="{'disable-area': fluxo.inconformidades.data.data.isLast(iinconformidade)}"><i class="fa fa-level-down"></i></a>
            <a class="btn btn-default" ng-click="moveInconformidade(iinconformidade, -1)"
                ng-class="{'disable-area': iinconformidade == 0}"><i class="fa fa-level-up"></i></a>
                %:inconformidade.title:%
			<div>
                <b>Data do relato</b>: %:inconformidade.DataRelato_Inconformidade |replace:' ':'T' |date: 'dd/MM/yyyy HH:mm':%</br>
                <b>Data do incidente</b>: %:inconformidade.DataIncidente_Inconformidade |replace:' ':'T' |date: 'dd/MM/yyyy':%<br>
                <b>Status</b>: %:inconformidade.Num_Status_Text_Inconformidade:%
            </div>
            <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                <label>Descrição</label>
                <div class="quill-editor" id="quill_inconformidade_descricao%:key+iinconformidade:%"></div>
            </div>
            <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                <label>Histórico</label>
                <div class="quill-editor" id="quill_inconformidade_historico%:key+iinconformidade:%"></div>
            </div>
            <div class="panel-group m-t-md" id="accordion_inconformidade%:key+iinconformidade:%" 
                 ng-class="{'disable-area':!thisData.display}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_inconformidade%:key+iinconformidade:%" 
                                href="#img_inconformidade_collapse%:key+iinconformidade:%" aria-expanded="false" class="collapsed">Imagens (%:thisData.IMG ? thisData.IMG.length : '0':%)</a>
                        </h5>
                    </div>
                    <div ng-if="thisData.IMG.length > 0"
						 id="img_inconformidade_collapse%:key+iinconformidade:%" class="panel-collapse collapse" aria-expanded="false" style="">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md" 
                                 ng-repeat="(iIMG, IMG) in thisData.IMG">
                                <div class="col-lg-3 rg-img-item-div">
                                    <img src="%:IMG.URL:%" 
                                         class="rg-img-item" align="center" ng-click="showImage(IMG)"> 
                                </div>
                                <div class="col-lg-9">
                                    <label>Exibir 
                                        <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                                               ng-model="Inconformidades[ key].list[ iinconformidade].IMG[ iIMG].display" ng-checked="Inconformidades[ key].list[ iinconformidade].IMG[ iIMG].display">
                                    </label>
                                    <a class="btn btn-default" ng-click="moveInconformidadeIMG(iIMG, 1)"
                                       ng-class="{'disable-area': thisData.IMG.isLast(iIMG)}">
                                        <i class="fa fa-level-down"></i></a>
                                    <a class="btn btn-default" ng-click="moveInconformidadeIMG(iIMG, -1)"
                                       ng-class="{'disable-area': iIMG == 0}">
                                        <i class="fa fa-level-up"></i></a>
                                    <div class="m-t-sm">
                                        <div class="quill-editor" id="quill_inconformidade_img%:key+IMG.ID_InconformidadesIMG:%" 
                                         ng-class="{'disable-area':!Inconformidades[ key].list[ iinconformidade].IMG[ iIMG].display}"></div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
		`
    };
});

</script>
<?php


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function genPDF($typeResponse="preview")
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $s; 
global $_RelatorioInconformidades;
global $thisRI;
global $path_doc;

$CompaniesList = "";

foreach($_RelatorioInconformidades->AgenteList as $Agente) {
	if ($Agente["Tipo"] == "E" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_Empreendimento"]."<br>";
	} elseif ($Agente["Tipo"] == "O" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_Operadoras"]."<br>";
	} elseif ($Agente["Tipo"] == "P" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_RazaoSocial"]."<br>";
	}
}

$GLOBALS["PDF_output"] = "PDF";

sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'dompdf', 'dompdf.php');

$Empreendimento = (object)$_RelatorioInconformidades->getEmpreendimento();
$EndEmpreendimento = $Empreendimento->End_Logradouro.", ".$Empreendimento->End_Numero.
	($Empreendimento->End_Complemento ? ", ".$Empreendimento->End_Complemento : null)."<br>".
	(mask($Empreendimento->End_CEP, ["#####-###"])).", ".
    $Empreendimento->End_Cidade." - ".$Empreendimento->End_UF;

$Inconformdades =$this->getInconformidades();

if ($Empreendimento->IMG_Logo) {
	$im = imagecreatefromstring($Empreendimento->IMG_Logo);
	$x = imagesx($im);
	$y = imagesy($im);
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
} 

sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'dompdf', 'dompdf.php');
$options = getOptionDompdf();
$options->set('defaultFont', 'Arial');
$dompdf = getDompdfObj($options);

$html = '
	<html>
		<head>
			<meta name="author" content="CNSDATA | GLOBALBLUE">
			<meta name="subject" content="Relatorio de Inconformidades/Readequações">
			'.mountCSS(15, 15, 15, 25).'
			'.$this->PDF_css().'
		</head>
		<style>
			.headerHtml2 {position: fixed; top: 0px;}
		</style>
		<body>
			<div class="headerHtml2" style="z-index:-1"><img src="../_lib/img/sys__NM__img__NM__GB_lg.png" style="height:291mm; margin-left:20px; margin-top:3mm"></div>
			<div class="headerHtml">
				<!--<table class="col-12 nb">
					<tr>
						<td class="col-6 nb" colspan="6"><img src="../_lib/img/sys__NM__img__NM__GLOBALBLUE.png" style="max-width:100%"></td>
						<td class="col-6 nb text-center" colspan="6">'.($Empreendimento->IMG_Logo ? '<img src="data:image/png;base64,'.base64_encode($Empreendimento->IMG_Logo).'" style="width:100%; max-height:100px">' : null).'</td>
					</tr>
				</table>-->
				<table class="col-12" style="border:none">
					<tr>
						<td class="col-6 nb" colspan="6"><img src="../_lib/img/sys__NM__img__NM__GLOBALBLUE.png" style="width:400px"></td>
						<td class="col-6 nb text-center" colspan="6">'.($Empreendimento->IMG_Logo ? '<img src="data:image/png;base64,'.base64_encode($Empreendimento->IMG_Logo).'" style="height:'.$ny.'px;width:'.$nx.'px">' : null).'</td>
					</tr>
				</table>
			</div>
			<div class="footerHtml">
				<table class="rodape2 col-12">
					<tbody>
						<tr>
							<td>
								'.$this->Ini->Nm_lang['lang_label_footer_pdfpas'].'
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div>
				<h3 class="text-center" style="margin-bottom:5px">RELATÓRIO DE INCONFORMIDADES/READEQUAÇÃO</h3>
				<hr>
				<table class="col-12">
					<tr>
						<td colspan="12">
							EMPREENDIMENTO:<br>
							<b>'.$Empreendimento->Nom_Empreendimento.'</b>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							ENDEREÇO:<br>
							<b>'.$EndEmpreendimento.'</b>
						</td>
						<td colspan="4">
							DATA DO RELATÓRIO:<br>
							<b>'.date("d/m/Y", strtotime($thisRI->Criado_em)).'</b>
						</td>
						<td colspan="4">
							PROCESSO:<br>
							<b>Nº'.$thisRI->ID.'</b>
						</td>
					</tr>
					<tr>
						<td colspan="12" class="col-12">
							SISTEMA PARA COMUNICAÇÃO DE VOZ E DADOS
						</td>
					</tr>
					<tr>
						<td class="col-6" colspan="6">
							RESPONSÁVEL:<br>
							'.$CompaniesList.'
						</td>
						<td  class="col-6" colspan="6">
							SETOR RESPONSÁVEL:<br>
							ENGENHARIA CENTRAL: <b>TEL. (11) 4228-9040</b>
						</td>
					</tr>
				</table>
				<br>
				<p>REFERÊNCIA:<br>
					VISTORIA NAS INSTALAÇÕES DE TELECOMUNICAÇÕES DO CONDOMÍNIO: '.$Empreendimento->Nom_Empreendimento.'</p>
				<p>ESTE DOCUMENTO TEM POR FINALIDADE RELATAR AS CONDIÇÕES ENCONTRADAS NAS INSTALAÇÕES DE TELECOMUNICAÇÕES DO CONDOMÍNIO, CONFORME VISTORIA REALIZADA PELA GLOBALBLUE</p>

				<div>'.$this->PDF_inconformidades($Inconformdades).'</div>
			</div>
		</body>
	<html>
';



$dompdf->add_info('Title', 'Relatório gerencial');
$dompdf->add_info('Author', 'CNSDATA | GLOBALBLUE');
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$output = $dompdf->output();		
$tmpPDF = sys_get_temp_dir()."/".uniqid().".pdf";
file_put_contents($tmpPDF, $output);

if (file_exists($tmpPDF)) {
	$ID_Empreendimento = $thisRI->ID_Empreendimento;
	$ID = $thisRI->ID;
	
	$newDir = realpath("$path_doc/../emp_$ID_Empreendimento").DIRECTORY_SEPARATOR."RI";
	if (!file_exists($newDir)) {
		mkdir($newDir);
	}
	$filename = "n".$ID.".pdf";
	$newDir = $newDir.DIRECTORY_SEPARATOR.$filename;
	$rename = copy($tmpPDF, $newDir);
}

switch($typeResponse) {
	case("preview"):
		header('Content-Disposition: inline; filename="'.$filename.'"');
		header('Content-Type: application/pdf');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($tmpPDF));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		readfile($tmpPDF);
	break;
	case("download"):
		header('Content-Description: File Transfer');
		header('Content-Disposition: inline; filename="'.$filename.'"');
		header('Content-Type: application/octet-stream');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($tmpPDF));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		readfile($tmpPDF);
	break;
	case("savetmp"):
		return $tmpPDF;
	break;
}



$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function genPDF4ViewAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $s; 
global $_RelatorioInconformidades;
global $thisRI;	
global $path_doc;

if ($_GET["sendRI"] ?? 0) {
$this->sendRI();
}

if ($_GET["genPDF"] ?? 0) { 
	if ($_GET['showLoading'] ?? null) {
		sc_include_library('sys', 'initCustom', 'loading_pdf.php');
		$data = [
			"subject" => "RELATÓRIO DE INCONFORMIDADES/READEQUAÇÕES",
			"urlGetAttr" => "act=genPDF4View&genPDF=1"
		];
		loadingPDF($this, $data);
		die();
	}

$this->genPDF("preview");
	die();
}

if ($thisRI->Num_Status == "E") {
	$ID_Empreendimento = $thisRI->ID_Empreendimento;
	$ID = $thisRI->ID;
	$dir = realpath("$path_doc/../emp_$ID_Empreendimento").DIRECTORY_SEPARATOR."RI";
	$filename = "n".$ID.".pdf";
	$dirFilename = $dir.DIRECTORY_SEPARATOR.$filename;

	if (file_exists($dirFilename)) {
		header('Content-Disposition: inline; filename="'.$filename.'"');
		header('Content-Type: application/pdf');
		header('Content-Transfer-Encoding: binary');
		header('Content-Length: ' . filesize($dirFilename));
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Expires: 0');
		readfile($dirFilename);
	} else {
	$this->genPDFPreviewHTML();
	}
} else {
$this->genPDFPreviewHTML();
}


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function genPDFPreviewHTML()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $s; 
global $_RelatorioInconformidades;
global $thisRI;	

$CompaniesList = "";

foreach($_RelatorioInconformidades->AgenteList as $Agente) {
	if ($Agente["Tipo"] == "E" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_Empreendimento"]."<br>";
	} elseif ($Agente["Tipo"] == "O" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_Operadoras"]."<br>";
	} elseif ($Agente["Tipo"] == "P" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_RazaoSocial"]."<br>";
	}
}

$Empreendimento = (object)$_RelatorioInconformidades->getEmpreendimento();
$EndEmpreendimento = $Empreendimento->End_Logradouro.", ".$Empreendimento->End_Numero.
	($Empreendimento->End_Complemento ? ", ".$Empreendimento->End_Complemento : null)."<br>".
	(mask($Empreendimento->End_CEP, ["#####-###"])).", ".
    $Empreendimento->End_Cidade." - ".$Empreendimento->End_UF;

$GLOBALS["PDF_output"] = "HTML";

sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'dompdf', 'dompdf.php');

$Inconformdades =$this->getInconformidades();

header('Content-type: text/html');

$html = '
	<html>
		<head>
			<meta name="author" content="CNSDATA | GLOBALBLUE">
			<meta name="subject" content="Relatorio de Inconformidades/Readequações">
			'.mountCSS(15, 15, 15, 25).'
			'.$this->PDF_css().'
			<style>
				.headerHtml, .footerHtml {
					position: relative;
				}
				.footerHtml {
					bottom: 0px
				}
				html {
					width: calc(210mm - 30mm);
					margin: 0 auto;
    				border: 1px solid #eee;
				}
				body {
					padding-bottom: 0;
					padding-top: 0;
				}
			</style>
		</head>
		<body>
			<div class="headerHtml">
				<table class="col-12" style="border:none">
					<tr>
						<td class="col-6 nb" colspan="6"><img src="../_lib/img/sys__NM__img__NM__GLOBALBLUE.png" style="max-width:100%"></td>
						<td class="col-6 nb text-center" colspan="6">'.($Empreendimento->IMG_Logo ? '<img src="data:image/png;base64,'.base64_encode($Empreendimento->IMG_Logo).'" style="max-width:100%; max-height:100px">' : null).'</td>
					</tr>
				</table>
			</div>
			<div>
				<h3 class="text-center" style="margin-bottom:5px">RELATÓRIO DE INCONFORMIDADES/READEQUAÇÃO</h3>
				<hr>
				<table class="col-12">
					<tr>
						<td colspan="12">
							EMPREENDIMENTO:<br>
							<b>'.$Empreendimento->Nom_Empreendimento.'</b>
						</td>
					</tr>
					<tr>
						<td colspan="4">
							ENDEREÇO:<br>
							<b>'.$EndEmpreendimento.'</b>
						</td>
						<td colspan="4">
							DATA DO RELATÓRIO:<br>
							<b>'.date("d/m/Y", strtotime($thisRI->Criado_em)).'</b>
						</td>
						<td colspan="4">
							PROCESSO:<br>
							<b>Nº'.$thisRI->ID.'</b>
						</td>
					</tr>
					<tr>
						<td colspan="12" class="col-12">
							SISTEMA PARA COMUNICAÇÃO DE VOZ E DADOS
						</td>
					</tr>
					<tr>
						<td class="col-6" colspan="6">
							RESPONSÁVEL:<br>
							'.$CompaniesList.'
						</td>
						<td  class="col-6" colspan="6">
							SETOR RESPONSÁVEL:<br>
							ENGENHARIA CENTRAL: <b>TEL. (11) 4228-9040</b>
						</td>
					</tr>
				</table>
				<br>
				<p>REFERÊNCIA:<br>
					VISTORIA NAS INSTALAÇÕES DE TELECOMUNICAÇÕES DO CONDOMÍNIO: '.$Empreendimento->Nom_Empreendimento.'</p>
				<p>ESTE DOCUMENTO TEM POR FINALIDADE RELATAR AS CONDIÇÕES ENCONTRADAS NAS INSTALAÇÕES DE TELECOMUNICAÇÕES DO CONDOMÍNIO, CONFORME VISTORIA REALIZADA PELA GLOBALBLUE</p>

				<div>'.$this->PDF_inconformidades($Inconformdades).'</div>
			</div>
			<div class="footerHtml">
				<table class="rodape2 col-12">
					<tbody>
						<tr>
							<td>
								'.$this->Ini->Nm_lang['lang_label_footer_pdfpas'].'
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</body>
	<html>
';

echo $html;

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function getContatos()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $thisRI;
global $_RelatorioInconformidades;

sc_include_library("sys", "models", "Contatos.php");
$_Contatos = new Contatos($this);

$ContatosList = array();

$rs = $_Contatos->getByCompany($thisRI->AgenteID, $thisRI->AgenteTipo, "manutencao");

if ($rs) {
	$ContatosList = array_merge($ContatosList, $rs);
}

return $ContatosList;




$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function getHtmlDadosGerais()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $thisRI;
global $_RelatorioInconformidades;

$CompaniesList = "";

foreach($_RelatorioInconformidades->AgenteList as $Agente) {
	if ($Agente["Tipo"] == "E" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_Empreendimento"]."<br>";
	} elseif ($Agente["Tipo"] == "O" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_Operadoras"]."<br>";
	} elseif ($Agente["Tipo"] == "P" && $Agente["data"]) {
		$CompaniesList .= $Agente["data"]["Nom_RazaoSocial"]."<br>";
	}
}

$ListNameAddress = "";
if ($thisRI->Num_Status == "E") {
	$Contatos = json_decode($thisRI->DestEmailNotif, true);
	if ($Contatos) {
		foreach($Contatos as $Contato) {
			$ListNameAddress .= $Contato[0].": <b>".$Contato[1]."</b><br>";
		}
	}
} else {
	$Contatos =$this->getContatos();
	foreach($Contatos as $Contato) {
		$Email = $Contato["Nom_EmailContato1"] ?: $Contato["Nom_EmailContato2"] ?: $Contato["Nom_EmailContato3"] ?: null;
		if ($Email) {
			$ListNameAddress .= $Contato["Nom_Contato"].": <b>".$Email."</b><br>";
		}
	}
}

$html = "
	<b>Código: </b>Nº".$thisRI->ID."<br>
	<b>Empreendimento: </b>".$_RelatorioInconformidades->getEmpreendimento()["Nom_Empreendimento"]."<br>
	<b>Data de criação: </b> ".date("d/m/Y H:i", strtotime($thisRI->Criado_em))."<br>
	<b>Destinatário: </b> ".($_RelatorioInconformidades->AgenteDest)."<br>
	<b>Contatos para notificação: </b><div style='margin-left:40px'>".($ListNameAddress ?: " - ")."</div>
	<b>Lista de empresas das inconformidades: </b> <div style='margin-left:40px'>".$CompaniesList."</div>
";

return $html;

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function getHtmlLogs()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $_RelatorioInconformidades;

$Logs = $_RelatorioInconformidades->getLogs();

$htmlLogs = "";

foreach($Logs as $Log) {
	$htmlLogs .= date("d/m/Y H:i", strtotime($Log["Data"])).": <b>".$Log["Nom_Usuario"]."</b>";
	switch($Log["Funcao"]) {
		case("CRIAR"):
			$htmlLogs .= " | Criou o relatório de inconformidades/readequações Nº".$Log["ID_RI"]."<br>";
		break;
		case("EDITAR"):
			$htmlLogs .= " | Editou o relatório de inconformidades/readequações Nº".$Log["ID_RI"]."<br>";
		break;
		case("ENVIAR_PDF"):
			$htmlLogs .= " | Enviou o relatório de inconformidades/readequações Nº".$Log["ID_RI"]." exportando PDF<br>";
		break;
		case("ENVIAR_MAIL"):
			$htmlLogs .= " | Enviou o relatório de inconformidades/readequações Nº".$Log["ID_RI"]." por e-mail<br>";
		break;
		case("DELETAR"):
			$htmlLogs .= " | Removeu o relatório de inconformidades/readequações Nº".$Log["ID_RI"]."<br>";
		break;
		default:
			$htmlLogs .= "<br>";
		break;
	}
}

return $htmlLogs;

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function getInconformidades()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $_RelatorioInconformidades;
global $thisRI;

$Inconformidades = $_RelatorioInconformidades->getInconformidades();

foreach($Inconformidades as $k => $Agente) {
	foreach($Agente["list"] as $i => $Inconformidade) {
		if ($Inconformidade["IMG"]) {
			foreach($Inconformidade["IMG"] as $j => $IMG) {
				$Inconformidades[$k]["list"][$i]["IMG"][$j]["URL"] =$this->mountPathImg(
					$thisRI->ID_Empreendimento,
					"inconformidades",
					$Inconformidade["ID_Inconformidade"],
					$IMG["File_Name"]
				);
				$Inconformidades[$k]["list"][$i]["IMG"][$j]["FS"] =$this->mountPathImg(
					$thisRI->ID_Empreendimento,
					"inconformidades",
					$Inconformidade["ID_Inconformidade"],
					$IMG["File_Name"], "FS"
				);
				$Inconformidades[$k]["list"][$i]["IMG"][$j]["ordem"] = $IMG["ordem"] ?: $j;
				$Inconformidades[$k]["list"][$i]["IMG"][$j]["display"] = intval($Inconformidades[$k]["list"][$i]["IMG"][$j]["display"]);
			}
		}
		switch($Inconformidade["Num_Status_Inconformidade"]) {
			case("espera"): $Inconformidades[$k]["list"][$i]["Num_Status_Text_Inconformidade"] = "Em Espera"; break;
			case("aguardando_resposta"): $Inconformidades[$k]["list"][$i]["Num_Status_Text_Inconformidade"] = "Aguardando Resposta"; break;
			case("andamento"): $Inconformidades[$k]["list"][$i]["Num_Status_Text_Inconformidade"] = "Andamento"; break;
			case("concluido"): $Inconformidades[$k]["list"][$i]["Num_Status_Text_Inconformidade"] = "Concluído"; break;
			case("bloqueado"): $Inconformidades[$k]["list"][$i]["Num_Status_Text_Inconformidade"] = "Bloqueado"; break;
			default: $Inconformidades[$k]["list"][$i]["Num_Status_Text_Inconformidade"] = null; break;
		}
		
		$Inconformidades[$k]["list"][$i]["ordem"] = $Inconformidade["ordem"] ?: $i;
		$Inconformidades[$k]["list"][$i]["title"] = $Inconformidade["Protocolo_Inconformidades"]." | ".$Inconformidade["NomeAgente"];
		$Inconformidades[$k]["list"][$i]["display"] = intval($Inconformidades[$k]["list"][$i]["display"]);
	}
}

return $Inconformidades;

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function getInconformidades4ViewAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $_RelatorioInconformidades;
global $thisRI;

$response =$this->response();
	
$Inconformidades =$this->getInconformidades();

$response->status = true;
$response->data = $Inconformidades;
$response->DbError = $_RelatorioInconformidades->DbError;
$response->strQuery = $_RelatorioInconformidades->strQuery;
$this->send($response);

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function indexAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $_RelatorioInconformidades;
global $thisRI;
global $profile;

if ($thisRI->Num_Status == "E" || ($profile["EDITAR"]["v"] ?? "N") == "N") {
$this->indexOnlyView();
} else {
$this->indexView();
}

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function indexOnlyView($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $profile;
global $_RelatorioInconformidades;
global $thisRI;
global $s;

$Empreendimento = (object)$_RelatorioInconformidades->getEmpreendimento();

if ($data) {
	foreach($data as $key => $value) {
		$$key = $value;
	}
}
?>

<link href="<?php echo sc_url_library("sys", "themeAssets", "css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "css/animate.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "css/style.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "js/angular-bootstrap-lightbox/angular-bootstrap-lightbox.min.css"); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.5/quill.bubble.css">
<link href="<?php echo sc_url_library("sys", "themeAssets", "css/select.min.css"); ?>" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.5/quill.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.js'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/ng-file-upload.min.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/ngMask.min.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/moment.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/ngDate.js"); ?>'></script>
<script src='<?= sc_url_library("sys", "initCustom", "jquery.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/select.min.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/datetime.js"); ?>'></script>

<?php 
sc_include_library("sys", "initCustom", "onLoad.html"); $this->styles();$this->scButtons();

$s = new manageSession();
echo $s->getIUDState($this);
echo $s->getMessage(true);
?>

<!-- Content I --> 
<div ng-app="cnsdata" ng-controller="RiController as riCtr">
	<div class="container-loader" style="margin: 0px;left: calc(50% - 46px);top: calc(50% - 46px);position: absolute;z-index: 1000" ng-show="loaderAnimation">
		<div class="loader" style="width: 100px;height: 100px;"></div>
	</div>
	
	<div class="ng-hide" ng-show="true">
	<!-- navbar -->
	<div class="row cns-navbar">
		<div style="width:33%;display: inline-block;text-align:left">
			<button class="scButton_default" ng-click="redir('../grid_RelatorioInconformidades')"><?= $this->Ini->Nm_lang['lang_btn_return'] ?></button>
		</div>
		<div style="width:33%;display: inline-block;text-align:center">
		</div>
		<div style="width:33%;display: inline-block;text-align:right">
		</div>
	</div>
  
	<!-- content -->
	<div class="row cns-content">
		<div class="col-lg-4" ng-show="!expandPreview" style="margin-bottom:20px">			
            <div class="panel-body">
				<h4>DADOS GERAIS</h4>
				<hr>
				<?= $this->getHtmlDadosGerais()?>
				<br><br>
				<h4>HISTÓRICO DE ALTERAÇÕES</h4>
				<hr>
				<?= $this->getHtmlLogs() ?>
			</div>
        </div>
        <div class="col-lg-8" ng-class="{'col-lg-12': expandPreview, 'col-lg-8': !expandPreview}">
			<button class="scButton_default btn-expand-preview" 
					title="Expandir preview" ng-click="expandPreview = !expandPreview">
				<i class="fa fa-angle-double-left" ng-if="!expandPreview"></i>
				<i class="fa fa-angle-double-right" ng-if="expandPreview"></i>
			</button>
			<button class="scButton_default btn-refresh-preview" 
					title="Expandir preview" ng-click="refreshPreview()">
				<i class="fa fa-refresh"></i>
			</button>
			<button class="scButton_default btn-fullscreen-preview" 
					title="Expandir preview" ng-click="fullScreenPreview()">
				<i class="fa fa-arrows-alt"></i>
			</button>
			<div class="panel-body">
				<iframe src="./?act=pdfViewer" class="iframe-preview" id="iframe-preview" allowfullscreen></iframe>
			</div>
	    </div>
    </div>
	</div>
</div>
<!-- Content F -->

<script src="<?php echo sc_url_library('sys', 'themeAssets', 'js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo sc_url_library('sys', 'themeAssets', 'js/inspinia.js'); ?>"></script>

<script>
	var viewBag = <?= json_encode($viewBag ?? (object)array()) ?>
</script>

<?php$this->javascript();

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function indexView($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $profile;
global $_RelatorioInconformidades;
global $thisRI;
global $s;

$Empreendimento = (object)$_RelatorioInconformidades->getEmpreendimento();

if ($data) {
	foreach($data as $key => $value) {
		$$key = $value;
	}
}

?>

<link href="<?php echo sc_url_library("sys", "themeAssets", "css/bootstrap.min.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "css/animate.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "css/style.css"); ?>" rel="stylesheet">
<link href="<?php echo sc_url_library("sys", "themeAssets", "js/angular-bootstrap-lightbox/angular-bootstrap-lightbox.min.css"); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.quilljs.com/1.3.5/quill.bubble.css">
<link href="<?php echo sc_url_library("sys", "themeAssets", "css/select.min.css"); ?>" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.3.5/quill.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.js'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/ng-file-upload.min.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/ngMask.min.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/moment.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/ngDate.js"); ?>'></script>
<script src='<?= sc_url_library("sys", "initCustom", "jquery.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/select.min.js"); ?>'></script>
<script src='<?php echo sc_url_library("sys", "themeAssets", "js/datetime.js"); ?>'></script>

<?php 
sc_include_library("sys", "initCustom", "onLoad.html"); $this->styles();$this->scButtons();

$s = new manageSession();
echo $s->getIUDState($this);
echo $s->getMessage(true);
?>

<!-- Content I --> 
<div ng-app="cnsdata" ng-controller="RiController as riCtr">
	<div class="container-loader" style="margin: 0px;left: calc(50% - 46px);top: calc(50% - 46px);position: absolute;z-index: 1000" ng-show="loaderAnimation">
		<div class="loader" style="width: 100px;height: 100px;"></div>
	</div>
	
	<div class="ng-hide" ng-show="true">
	<!-- navbar -->
	<div class="row cns-navbar">
		<div style="width:33%;display: inline-block;text-align:left">
			<button class="scButton_default" ng-click="redir('../grid_RelatorioInconformidades')" type="button"><?= $this->Ini->Nm_lang['lang_btn_return'] ?></button>
		</div>
		<div style="width:33%;display: inline-block;text-align:center">
			<?php if (($profile["DELETAR"]["v"] ?? "N") == "S"): ?> <button class="scButton_default nbtn_danger" ng-click="confirmDeleteRI()" type="button">Descartar</button>
			<a style="display:none" ng-click="deleteRI()" id="deleteRI"></a><?php endif; ?>
			<?php if (($profile["EDITAR"]["v"] ?? "N") == "S"): ?> <button class="scButton_default" ng-click="saveRI()"  type="button">Salvar</button><?php endif; ?>
		</div>
		<div style="width:33%;display: inline-block;text-align:right">
		</div>
	</div>
  
	<!-- content -->
	<div class="row cns-content">
		<div class="col-lg-6" ng-show="!expandPreview" style="margin-bottom:20px">			
            <div class="panel-body">
				<h4>DADOS GERAIS</h4>
				<hr>
				<?= $this->getHtmlDadosGerais()?>
				<?php if ($thisRI->Num_Status == 'P' && ($profile["ENVIAR"]["v"] ?? "N") == "S"): ?>
				<hr>
				<button class="scButton_default" ng-click="confirmeSend = true">Concluir Relatório de Inconformidade/Readequação</button><br><br>
				<div class="alert alert-success" ng-show="confirmeSend">
					Deseja concluir este relatório:<br><br>
					<button class="scButton_default" style="margin-right:5px" ng-click="sendMailRI()" ng-disabled="isSended">Enviar e-mail</button>
					<button class="scButton_default" style="margin-right:5px" ng-click="openPDFInTab()" ng-disabled="isSended">Imprimir PDF</button>
					<button class="scButton_default nbtn_danger" ng-click="confirmeSend = false">Cancelar</button>
                </div>
				<?php endif; ?>
				<h4>HISTÓRICO DE ALTERAÇÕES</h4>
				<hr>
				<?= $this->getHtmlLogs() ?>
			</div>
			<br>
			<div class="panel-body">
				<h4>INCONFORMIDADES</h4>
				<hr>
				<div class="panel-group m-t-md" id="accordion_inconformidades_company">
					<div class="panel panel-default" ng-repeat="(key, Agente) in Inconformidades">
						<div class="panel-heading">
							<h5 class="panel-title">
								<a data-toggle="collapse" 
								   data-parent="#accordion_inconformidades_company" 
								   href="#inconformidade_collapse%:key:%" aria-expanded="false" class="collapsed">%:Agente.data.Agente:%</a>
							</h5>
						</div>
						<div id="inconformidade_collapse%:key:%" class="panel-collapse collapse" aria-expanded="false" style="">
							<div class="panel-body" style="margin:0;width:100%">
								<div ng-if="!Agente.list.length">Não há registros para serem exibidos</div>
								<inconformidades ng-repeat="(iinconformidade, inconformidade) in Agente.list"></inconformidades>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <div class="col-lg-6" ng-class="{'col-lg-12': expandPreview, 'col-lg-6': !expandPreview}">
			<button class="scButton_default btn-expand-preview" 
					title="Expandir preview" ng-click="expandPreview = !expandPreview">
				<i class="fa fa-angle-double-left" ng-if="!expandPreview"></i>
				<i class="fa fa-angle-double-right" ng-if="expandPreview"></i>
			</button>
			<button class="scButton_default btn-refresh-preview" 
					title="Expandir preview" ng-click="refreshPreview()">
				<i class="fa fa-refresh"></i>
			</button>
			<button class="scButton_default btn-fullscreen-preview" 
					title="Expandir preview" ng-click="fullScreenPreview()">
				<i class="fa fa-arrows-alt"></i>
			</button>
			<div class="panel-body">
				<iframe src="./?act=pdfViewer" class="iframe-preview" id="iframe-preview" allowfullscreen></iframe>
			</div>
	    </div>
    </div>
	</div>
</div>
<!-- Content F -->

<script src="<?php echo sc_url_library('sys', 'themeAssets', 'js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo sc_url_library('sys', 'themeAssets', 'js/inspinia.js'); ?>"></script>

<script>
	var viewBag = <?= json_encode($viewBag ?? (object)array()) ?>
</script>

<?php$this->javascript();

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function javascript()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $_RelatorioInconformidades;
global $thisRI;

?>
<script>
	loadBreadcrumb(["Relatório de Inconformidades/Readequações", `Nº <?= $thisRI->ID ?> - 
		<?= $_RelatorioInconformidades->getEmpreendimento()["Nom_Empreendimento"] ?? null ?>`]);

	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	  "onclick": null,
	  "showDuration": "300",
	  "hideDuration": "1000",
	  "timeOut": "5000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "fadeIn",
	  "hideMethod": "fadeOut"
	}
	
	var toolbarOptions = [
		['bold', 'italic', 'underline', 'strike'],        

		[{ 'list': 'ordered'}, { 'list': 'bullet' }],
		[{ 'script': 'sub'}, { 'script': 'super' }],      
		[{ 'indent': '-1'}, { 'indent': '+1' }],          


		[{ 'color': [] }],          
		[{ 'align': [] }],

		['clean']                                         
	];
	
  	function initQuill(e) {
		window[""+e] = new Quill("#"+e, {
			placeholder: 'Digite aqui...',
			theme: 'bubble',
			modules: {
				toolbar: toolbarOptions
			}
		});
		return window[""+e];
  	}
	
	Array.prototype.move = function(from, to) {
    	this.splice(to, 0, this.splice(from, 1)[0]);
	};
	Array.prototype.isLast = function(index) {
    	return (this.length-1) == index ;
	};
	
	var App = angular.module('cnsdata', ['ngFileUpload', 'ngMask', 'ui.select', 'datetime'], function($interpolateProvider) {
    	$interpolateProvider.startSymbol('%:');
    	$interpolateProvider.endSymbol(':%');
	})
	.filter('trusted', ['$sce', function($sce){
        return function(text) {
			try {
            	return $sce.trustAsHtml(text);
			} catch (err) {}
        };
    }])
	.filter('formatCurrency', ['$sce', function($sce){
        return function(currency) {
			try {
            	return currency.replace(/,/g,'').replace('.', ',');
			} catch (err) {}
        };
    }])
	.filter('replace', function () {
	  	return function (input, from, to) {
			try {
				input = input || '';
				from = from || '';
				to = to || '';
				return input.replace(new RegExp(from, 'g'), to);
			} catch (err) {}
	  	};
	});
	App.controller('RiController', ['$scope', '$http', 'Upload', '$sce', function ($scope, $http, Upload, $sce) {
		$scope.console = console;
		$scope.initQuill = initQuill;
		$scope.loaderAnimation = false;
		$scope.Inconformidades = Array();
		$scope.confirmeSend = 0;
		_self = this;
	
		$scope.saveRI = function () {
			$scope.loaderAnimation = true;
			httpConfig = {
				url : './?act=saveRI',
				method : 'POST',
				data : {
					fluxo : JSON.stringify($scope.Inconformidades)
				},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {
					console.log(response);
					toastr.success("", "Salvo com sucesso");
					$scope.refreshPreview();
				},
				failed : function (response) {
					console.log(response);
				}
			};
			$scope.http(httpConfig);
		}
	
		$scope.confirmDeleteRI = function () {
			html = `
				Deseja realmente remover este relatório de inconformidade/readequação?<br><br>
				<button class="scButton_default nbtn_danger" onclick="javascript: $('#deleteRI')[0].click()">Sim</button>
				<button class="scButton_default" onclick="close_sModal()">Não</button>
			`;
	
			sModal('show', '', html, {sizeClass:'sm'});
		}
	
		$scope["getInconformidades"] = function () {
			$scope.loaderAnimation = true;
			httpConfig = {
				url : './?act=getInconformidades4View',
				method : 'POST',
				data : {},
				onComplete : function(response) {$scope.loaderAnimation = false;},
				success : function (response) {
					console.log(response, response.data);
					$scope.Inconformidades = response.data;
				},
				failed : function (response) {
				},
				httpFailed : function (response) {
				},
			};
			$scope.http(httpConfig);
		}
	
		$scope.deleteRI = function () {
			$scope.loaderAnimation = true;
			httpConfig = {
				url : './?act=deleteRI',
				method : 'POST',
				data : {
					fluxo : JSON.stringify($scope.fluxo)
				},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {
				},
				failed : function (response) {
					toastr.error("", "Não foi possível remover o relatório de inconformidades/readequações, por favor, tente novamente");
				},
				httpFailed : function (response) {
					toastr.error("", "Não foi possível remover o relatório de inconformidades/readequações, por favor, tente novamente");
				},
			};
			$scope.http(httpConfig);
		}
	
		$scope.genPDF = function () {
			$scope.loaderAnimation = true;
			$scope.requestedGenPDF = true;
			httpConfig = {
				url : './?act=genPDFBackend',
				method : 'POST',
				data : {},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {
					html = `
						A geração do PDF poderá levar alguns minutos. Quando estiver pronto você poderá realizar o download dele.<br><br>
						<button class="scButton_default" onclick="close_sModal()">Fechar</button>
					`;

					sModal('show', '', html, {sizeClass:'sm'});
				},
				failed : function (response) {
					toastr.error("", "Não foi possível gerar o PDF, por favor, tente novamente");
				},
				httpFailed : function (response) {
					toastr.error("", "Não foi possível gerar o PDF, por favor, tente novamente");
				},
			};
			$scope.http(httpConfig);
		}
	
		$scope.openPDFInTab = function () {
			$scope.isSended = true;
			$scope.loaderAnimation = true;
			window.open("./?act=genPDF4View&genPDF=1&sendRI=1&showLoading=1", "_target");
			window.setTimeout(function() {
				location = location.href;
			}, 1000);
		}
		
		$scope.sendMailRI = function () {
			$scope.loaderAnimation = true;
			$scope.isSended = true;
			httpConfig = {
				url : './?act=sendMailRI',
				method : 'POST',
				data : {},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {},
				failed : function (response) {
					$scpe.isSended = false;
					toastr.error("", "Não foi possível gerar o PDF, por favor, tente novamente");
				},
				httpFailed : function (response) {
					$scpe.isSended = false;
					toastr.error("", "Não foi possível gerar o PDF, por favor, tente novamente");
				},
			};
			$scope.http(httpConfig);
		}
	
		$scope.redir = function(to, target = "_self") {
			window.open(to, target);
		}
	
		$scope.log = function(data) {
			console.log(data);
		}
	
		$scope.refreshPreview = function() {
			document.getElementById('iframe-preview').contentWindow.location.reload(true);
		}
	
		$scope.fullScreenPreview = function() {
			var elem = document.getElementById("iframe-preview");
			if (elem.requestFullscreen) {
				elem.requestFullscreen();
			} else if (elem.msRequestFullscreen) {
				elem.msRequestFullscreen();
			} else if (elem.mozRequestFullScreen) {
				elem.mozRequestFullScreen();
			} else if (elem.webkitRequestFullscreen) {
				elem.webkitRequestFullscreen();
			}
		}
	
	
		$scope.http = function (httpConfig) {
			data = typeof httpConfig.data == "object" ? httpConfig.data : {};
            url = typeof httpConfig.url == "string" ? httpConfig.url : null;
            method = typeof httpConfig.method == "string" ? httpConfig.method : "POST";
			if (!url) return false;
	
			Upload.upload({
				url: url,
				data: data,
				method: method,
				headers: {
            		'Content-Type': 'application/json'
        		},
				transformResponse: [
					function (data) {
						try {
        					return JSON.parse(data);
    					} catch (e) {
        					return data;
    					}
					}
				]
			}).then(function (response) {
				console.log(httpConfig, response);
				try {
					if (!response || response && !response.data) return;
					if (typeof httpConfig.onComplete == "function")  httpConfig.onComplete(response.data);
					if (typeof response.data.redirect == "string" && response.data.redirect) $scope.redir(response.data.redirect);
					else {
						if (typeof httpConfig.httpSuccess == "function") httpConfig.httpSuccess(response.data);
						if (response.data.status && typeof httpConfig.success == "function") httpConfig.success(response.data);
						else if (!response.data.status && typeof httpConfig.failed == "function") httpConfig.failed(response.data);
					}
				} catch (err) {console.log(err)}
			}, function (response) {
				try {
					if (!response || response && !response.data) return;
					if (typeof httpConfig.onComplete == "function")  httpConfig.onComplete(response.data);
					if (typeof response.data == "string" && typeof httpConfig.httpError == "function") httpConfig.httpError(response.data);
					else if (typeof response.data.redirect == "string" && response.data.redirect) $scope.redir(response.data.redirect);
					else if (typeof httpConfig.httpError == "function") httpConfig.httpError(response);
				} catch (err) {console.log(err)}
			}, function (response) {
				if (typeof httpConfig.progress == "function") httpConfig.progress(response);
			});
		}
	
		$scope.showImage = function (IMG) {
			sModal("show", "Imagem: " + IMG.File_Name, `
				<div style='overflow: auto; max-height: 60vh;'>
					<img src='` + IMG.URL + `'></div><br>
				<button class='scButton_default' onclick='close_sModal()'>Fechar</button>`, {sizeClass:'lg2'});
		}
	
		$scope["getInconformidades"]();
	}]);
</script>
<?php $this->directive(); ?>
<?php


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function mountPathImg($ID_Empreendimento=null, $Type=null, $ID_Item=null, $File=null, $type="URL")
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $path_img;
global $path_doc;

if (!$ID_Empreendimento || !$Type || !$File) return null; 

if ($type=="URL") {
	return "$path_img/../emp_$ID_Empreendimento/$Type/$ID_Item/$File";
} elseif ($type=="FS") {
	return "$path_doc/../emp_$ID_Empreendimento/$Type/$ID_Item/$File";
}


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function pdfViewerAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $s; 
global $_RelatorioInconformidades;
global $thisRI;	
$this->pdfViewerView();

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function pdfViewerView($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
if ($data) {
	foreach($data as $key => $value) {
		$$key = $value;
	}
}
?>

<html ng-app="cnsdata">
  	<head>
		<link href="<?php echo sc_url_library("sys", "themeAssets", "css/bootstrap.min.css"); ?>" rel="stylesheet">
		<link href="<?php echo sc_url_library("sys", "themeAssets", "font-awesome/css/font-awesome.css"); ?>" rel="stylesheet">
		<link href="<?php echo sc_url_library("sys", "themeAssets", "css/style.css"); ?>" rel="stylesheet">
		
		<script src='<?= sc_url_library("sys", "themeAssets", "js/angular.js"); ?>'></script>
		<script src='<?= sc_url_library("sys", "initCustom", "jquery.js"); ?>'></script>
		
		<style>
			button.btn-fullscreen {
				position: absolute;
				z-index: 1000;
				left: 45px;
				top: 6px;
				height: 34px;
				width: 62px;
				text-align: center;
				float: left;
				border: none;
				background: none;
				color: white;
				font-size: 20px;
				display:none;
			}
			button.btn-fullscreen:hover {
				font-size:25px;
			}
		</style>
	<head>
	<body ng-controller="ctrpdfviewer" style="margin:0;height:auto">
<?php $this->styles();$this->scButtons(); 
?>
		<div class="container-loader" style="margin: 0px;left: calc(50% - 46px);top: calc(50% - 46px);position: absolute;z-index: 1000;">
			<div class="loader" style="width: 100px;height: 100px;"></div>
		</div>
		<!--<button class="scButton_default btn-fullscreen" title="Exibir preview" ng-click="fullScreen()">
			<i class="fa fa-arrows-alt" ></i>
		</button>-->
		<div class="text-center ng-hide" ng-show="true">
			<iframe src="./?act=genPDF4View" id="genPDF4View" onload="iframePDFLoaded(event)" style="display:none;border: none;width: 100%;height: 100%;" allowfullscreen></iframe>
		</div>
	</body>
  <script id="script">
		iframePDFLoaded = function(event){
			console.log(event);
			$("#genPDF4View, .btn-fullscreen").show();
	  		$(".container-loader").hide();
	  	}
       var App = angular.module('cnsdata', [], function($interpolateProvider) {
			$interpolateProvider.startSymbol('%:');
			$interpolateProvider.endSymbol(':%');
		});
		App.controller('ctrpdfviewer', ['$scope', '$http', '$sce', function ($scope, $http, $sce) {
	  		$scope.pdfIsLoaded = false;
	  		$scope.loaderAnimation = true;
	  		$scope.reloadPage = function() {
	  			location.reload();
	  		}
	  		$scope.fullScreen = function() {
	  			var elem = document.getElementById("genPDF4View");
				if (elem.requestFullscreen) {
				  elem.requestFullscreen();
				} else if (elem.msRequestFullscreen) {
				  elem.msRequestFullscreen();
				} else if (elem.mozRequestFullScreen) {
				  elem.mozRequestFullScreen();
				} else if (elem.webkitRequestFullscreen) {
				  elem.webkitRequestFullscreen();
				}
	  		}
		}]);
    </script>
</html>
		
<?php

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function response()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
$response = new stdClass();

$response->status = null;
$response->code = null;
$response->data = null;
$response->msg = null;
$response->redirect = null;

return $response;

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function router()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $s;

$action = strtolower($_GET["act"] ?? null);
$response =$this->response();

sc_include_library("sys", "models", "Config.php");
$_Config = new Config($this);

$token = $_Config->getByKey("cli::Token");

$response =$this->response();

if ($_GET["cli"] ?? 0) {
	if (($_POST["token"] ?? null) != $token) {
		$response->status = false;
		$response->code = "403";
		$response->msg = "Acesso negado";
	$this->send($response);
	}
} elseif(!$s->isLogged()) {
	if (!$action) {
		echo "<script>location = '../login?act=logout'</script>";
		die();
	}
	
    $response->status = false;
    $response->code = "403";
    $response->msg = "Acesso negado";
    $response->redirect = "../login?act=logout";
   $this->send($response);
}

if($action) {
	$action .= "Action";
    if (method_exists($this, $action)) {
        $this->$action();
    } else {
        $response->status = false;
        $response->code = "404";
        $response->msg = "Ação não encontrada";
       $this->send($response);
    }
} else {
   $this->indexAction();
}


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function sanitizeQuillHTML($quillHTML="")
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
return preg_replace("/<(\w*)[^>]*>[\s|&nbsp;]*<\/\1>/", "", $quillHTML);

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function saveRIAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $s;
global $thisRI;
global $_RelatorioInconformidades;

$response =$this->response();

$fluxo = $_POST["fluxo"] ?? null;

$fluxo = json_decode($fluxo, true);

if (gettype($fluxo) != "array") {
	$response->status = false;
	$response->code = "400";
	$response->data = [$_POST];
	$response->msg = "badRequest";
$this->send($response);
}



foreach(($fluxo ?? array()) as $k => $Agente) {
	foreach($Agente["list"] as $i => $Inconformidade) {
		$thisInconformidade = &$fluxo[$k]["list"][$i];

		if ($Inconformidade["ID_RIInconformidades"]) {
			$_RelatorioInconformidades->_Ri_inconformidades->save("ID = ".$Inconformidade["ID_RIInconformidades"], [
				"Editado_em" => date('Y-m-d H:i:s'),
				"Descricao" => $Inconformidade["Descricao_RIInconformidades"],
				"Historico" => $Inconformidade["Historico_RIInconformidades"],
				"display" => $Inconformidade["display"],
				"ordem" => $i
			]);
		} else {
			$thisInconformidade["ID_RIInconformidades"] = $_RelatorioInconformidades->_Ri_inconformidades->create([
				"Criado_em" => date('Y-m-d H:i:s'),
				"ID_RI" => $thisRI->ID,
				"ID_Inconformidades" => $Inconformidade["ID_Inconformidade"],
				"Descricao" => $Inconformidade["Descricao_RIInconformidades"],
				"Historico" => $Inconformidade["Historico_RIInconformidades"],
				"display" => $Inconformidade["display"],
				"ordem" => $i
			]);
		}

		$pID = $Inconformidade["ID_Inconformidade"];
		foreach(($Inconformidade["IMG"] ?? array()) as $iIMG => $IMG) {
			$thisIMG = &$thisInconformidade["IMG"][$iIMG];

			if ($IMG["ID_RIInconformidadesIMG"]) {
				$_RelatorioInconformidades->_Ri_inconformidadesimg->save("ID = ".$IMG["ID_RIInconformidadesIMG"], [
					"Editado_em" => date('Y-m-d H:i:s'),
					"Descricao" => $IMG["Descricao_RIInconformidadesIMG"],
					"ordem" => $iIMG,
					"display" => $IMG["display"]
				]);
			} else {
				$thisIMG["ID_RIInconformidadesIMG"] = $_RelatorioInconformidades->_Ri_inconformidadesimg->create([
					"Criado_em" => date('Y-m-d H:i:s'),
					"ID_Filesinconformidades" => $IMG["ID_InconformidadesIMG"],
					"ID_RIInconformidades" => $thisInconformidade["ID_RIInconformidades"],
					"Descricao" => $IMG["Descricao_RIInconformidadesIMG"],
					"ordem" => $iIMG,
					"display" => $IMG["display"]
				]);
			}
		}
	}
}

$_RelatorioInconformidades->save("ID = ".$thisRI->ID, [
	"Num_Status" => $thisRI->Num_Status == "R" ? "P" : $thisRI->Num_Status,
	"Editado_em" => date('Y-m-d H:i:s')
]);

$response->status = true;
if ($thisRI->Num_Status == "R") {
	$s->setIUDState($this, "I", "success", "Relatório de inconformidades salvo com sucesso");
	$response->redirect = ".";
}
$response->code = "200";
$response->data = $fluxo;

$thisRI->Num_Status = $thisRI->Num_Status == "R" ? "P" : $thisRI->Num_Status;
$thisRI->Editado_em = date("Y-m-d H:i:s");
$fluxo["RI"] = $thisRI;$this->Audit("saveRI", $fluxo);
$this->send($response);



$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function scButtons()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
?>
<style>
	.scButton_default { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; line-height: 31px; line-height: 31px; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; height: 34px; padding: 0 12px !important; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scButton_disabled { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #7d7d7d; font-weight: normal; line-height: 31px; line-height: 31px; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; height: 34px; padding: 0 12px; cursor: default; background-image: none;text-decoration: none;  }
.scButton_group { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0; padding: 7.8px 15px;margin:0px -5px !important; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scButton_groupdisabled { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #7d7d7d; font-weight: normal; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 0; -webkit-border-radius: 0; border-radius: 0; padding: 7.8px 15px;margin:0px -5px !important; cursor: default; background-image: none;text-decoration: none;  }
.scButton_groupfirst { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 2px 0 0 2px; -webkit-border-radius: 2px 0 0 2px; border-radius: 2px 0 0 2px; padding: 7.8px 15px; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scButton_grouplast { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; line-height: 31px; line-height: 31px; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 0 2px 2px 0; -webkit-border-radius: 0 2px 2px 0; border-radius: 0 2px 2px 0; height: 34px; padding: 0 12px; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scButton_small { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;; font-size: 13px; color: #3C4858; font-weight: normal; background-color: #FFFFFF; border-color: #E0E6ED; border-style: solid; border-width: 1px; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; padding: 3px 13px !important; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scButton_default:hover, .scButton_group:hover, .scButton_groupfirst:hover, .scButton_grouplast:hover, .scButton_small:hover { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;box-shadow: inset 0 -1px 0 rgba(31, 45, 61, 0.15);; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #1B8FC8;}.scButton_default:hover img, .scButton_groupfirst:hover img, .scButton_group:hover img{filter: brightness(2);}.scButton_default:hover{; border-color: #1B8FC8; border-style: solid; border-width: 1px; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scButton_default:active, .scButton_group:active, .scButton_groupfirst:active, .scButton_grouplast:active, .scButton_small:active { font-family: Tahoma, Arial, sans-serif;box-sizing: border-box;box-shadow: inset 0 1px 0 rgba(31, 45, 61, 0.15);; font-size: 13px; color: #FFFFFF; font-weight: normal; background-color: #1B8FC8;}.scButton_default:active img{filter: brightness(2)}.scButton_default:active{; border-color: #1B8FC8; border-style: solid; border-width: 1px; -moz-border-radius: 2px; -webkit-border-radius: 2px; border-radius: 2px; cursor: pointer; background-image: none;text-shadow: ;transition: all 0.2s;-o-transition: all 0.2s;-ms-transition: all 0.2s;-webkit-transition:all 0.2s;-moz-transition:all 0.2s;-webkit-backface-visibility: hidden;box-sizing: border-box; text-decoration: none;  }
.scLink_default { text-decoration: underline; font-size: 13px; color: #1a0dab; cursor: pointer;  }
.scLink_default:visited { text-decoration: underline; font-size: 13px; color: #660099; cursor: pointer;  }
.scLink_default:active { text-decoration: underline; font-size: 13px; color: #1a0dab; cursor: pointer;  }
.scLink_default:hover { text-decoration: underline; font-size: 13px; color: #1a0dab; cursor: pointer;  }

.scButton_default:disabled {opacity: 0.6;}
</style>
<?php

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function send($response=[])
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
header("Content-type: application/json");
echo json_encode($response);
die();

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function sendMail()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $thisRI;
global $_RelatorioInconformidades;

$pdf =$this->genPDF("savetmp");

$Empreendimento = (object)$_RelatorioInconformidades->getEmpreendimento();

$Contatos =$this->getContatos();

$ListNameAddress = array();
foreach($Contatos as $Contato) {
	$Email = $Contato["Nom_EmailContato1"] ?: $Contato["Nom_EmailContato2"] ?: $Contato["Nom_EmailContato3"] ?: null;
	if ($Email) {
		$ListNameAddress[] = $Email;
	}
}

$Email = array_unique($ListNameAddress);
if (!$Email) return;

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$m = new sendEmail();
$s = new manageSession();
$ID_Usuario = $s->get('ID_Usuario');

$emailData = [
		"alert" => "good",
		"title" => "Relatório de Inconformidades/Readequação <strong>Nº ".$thisRI->ID."</strong>",
		"content" => "
			À<br>
			<br>
			".$_RelatorioInconformidades->AgenteDest."<br>
			<br>
			Prezado(s) Senhor(es),<br>
			<br>
			<p>Conforme normas da gestão de Telecomunicações do empreendimento ".$Empreendimento->Nom_Empreendimento.", vimos por meio desta, notifica-lo(s) das providencias necessárias para
			adequações e regularizção das instalações existentes nas áreas do eferido empreendimento.</p>
			<p>Abaixo a descrição das regularizações necessárias:</p>
			<ul>
				<li><b>INFRAESTRUTURA:</b> Regularização da situação da operadora dentro do empreendimento. Em anexo relatório fotográfico.</li>
				<li><b>CONTRATO DE CESSÃO DE ESPAÇO ONEROSO:</b> Assinatura de contrato ou substituição de contrato existente, de acordo com o modelo contratual utilizado pelo condomínio, que formaliza a cessão da(s) área(s) condominial(is) hoje ocupada(s) para acomodação de equipamentos e antenas.</li>
			</ul>
			<p>Estas regularizações são fundamentais para que seja possível a continuição do fornecimento e operação dos possíveis serviços da vossa empressa no empreendimento.</p>
			<p>Aguardamos no prazo máximo de <b>10 dias úteis</b> a manifestação dos devidos responsáveis do(a) ".$_RelatorioInconformidades->AgenteDest.". Para as devidas regularizações, contados a partir de recebimento desta notificação.</p><br>

			<p>Atenciosamente,</p>
			:tableFooter:
		",
		"footer" => "Relatório de Inconformidades/Readequação "
	];

$listEmails = $Email;
$listEmails[] = "gabriel.soares@houseti.com.br";
$m->BCC = $listEmails; 
$html = emailTemplate($emailData);
$m->SUBJECT = "GLOBALBLUE | CNSDATA: Relatório de Inconformidades/Readequação Nº ".$thisRI->ID;
$m->MESSAGE = $html;
if (file_exists($pdf)) {
	$m->ANEXO = $pdf;
}
$modelLogs->insert([
	"Modulo" => "EMAIL",
	"Funcao" => "ENVIAR",
	"Descricao" => 'Notificação por e-mail (RI)',
	"Conteudo" => ["ID_RG" => $thisRI->ID, "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
]);


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function sendMailRIAction()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $thisRI;
global $_RelatorioInconformidades;
global $s;

$Contatos =$this->getContatos();
$ListNameAddress = array();
foreach($Contatos as $Contato) {
	$Email = $Contato["Nom_EmailContato1"] ?: $Contato["Nom_EmailContato2"] ?: $Contato["Nom_EmailContato3"] ?: null;
	if ($Email) {
		$ListNameAddress[] = [$Contato["Nom_Contato"], $Email];
	}
}


$_RelatorioInconformidades->save("ID = '".$thisRI->ID."'", [
	"Num_Status" => "E",
	"Editado_em" => date("Y-m-d H:i:s"),
	"DestEmailNotif" => json_encode($ListNameAddress)
]);

$thisRI->Num_Status = "E";
$thisRI->Editado_em = date("Y-m-d H:i:s");
$thisRI->DestEmailNotif = $ListNameAddress;
$this->Audit("sendRI_MAIL", $thisRI);
$this->sendMail();

$response =$this->response();
$s->setIUDState("blk_RelatorioInconformidades", "I", "success", "Relatório de inconformidades concluído.");
$response->redirect = '.';$this->send($response);

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function sendRI()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
global $thisRI;
global $_RelatorioInconformidades;
global $s;

$_RelatorioInconformidades->save("ID = '".$thisRI->ID."'", [
	"Num_Status" => "E",
	"Editado_em" => date("Y-m-d H:i:s")
]);

$thisRI->Num_Status = "E";
$thisRI->Editado_em = date("Y-m-d H:i:s");
$this->Audit("sendRI_PDF", $thisRI);

$s->setIUDState("blk_RelatorioInconformidades", "I", "success", "Relatório de inconformidades concluído.");


$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
}
function styles()
{
$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'on';
                                                             
?>
<style>
	body {margin:20px 20px;background-color: #fff !important;height:auto;}
	
	.cns-navbar {padding: 10px 40px;}
	.cns-navbar > div {padding: 0;}

	.cns-content {padding: 20px 25px;}
	
	.disable-area {
		position:relative;
		pointer-events:none;
		opacity:0.5;
	}
	
	.quill-editor {
		height: 100px;
    	background: rgba(0,0,0,0.04);
    	border-radius: 5px;
	}
	
	.input-hide-not-hover:not(:hover) {
		background: none;
    	border: none;
    	box-shadow: none;
	}
	
	.tags-remove {
		font-size: 25px;
		color: #e06f6f;
		margin: 4px 0 0 10px;
		cursor: pointer;
	}
	
	.cns-title-item {
		display: inline-block;
    	margin-right: 10px;
    	padding-right: 10px;
    	border-right: 1px solid #666;
	}
	
	.panel-body {
		box-shadow: 0px 0px 17px #e2e2e2;
	}

	.cns-graph {
		width:800px;
		
	}
	
	.overflow-auto {overflow: auto;}
	
	button.btn-preview, button.btn-refresh-preview, button.btn-expand-preview, button.btn-fullscreen-preview {
		position: relative;
		z-index: 1000;
		top: -15px;
		font-size: 32px;
		height: 34px;
		width: 62px;
		text-align: center;
	}
	button.btn-preview, button.btn-refresh-preview, button.btn-expand-preview, button.btn-fullscreen-preview {
		font-size: 25px;
	}
	button.btn-preview {
		float: right;
	}
	button.btn-expand-preview {
		float: left;
	}
	button.btn-refresh-preview {
		float: left;
		left: 5px;
	}
	button.btn-fullscreen-preview {
		float: left;
		left: 10px;
	}
	
	.iframe-preview {
	    width: 100%;
    	height: calc(100% - 231px);
    	border: none;
    	border-radius: 5px 0 0 5px;
	}
	
	.loader {
	    border: 16px solid #f3f3f3;
		border-radius: 50%;
		border-top: 16px solid #3498db;
		width: 60px;
		height: 60px;
		-webkit-animation: spin 2s linear infinite;
		animation: spin 2s linear infinite;
	}
	
	.rg-img-item {
		max-width:100%;
		max-height:150px;
		margin:auto auto;
		display:block;
		cursor:pointer;
	}
	
	.rg-img-item-div { 
    	height: 150px;
    	display: flex;
	}
	
	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
	
	.disabled {
	  	pointer-events: none;
	}
</style>
<?php

$_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
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
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioInconformidades'][substr($val, 1, -1)];
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
      if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
      {
          echo "<SCRIPT language=\"javascript\">";
          if (strtolower($target) == "_blank")
          {
              echo "window.open ('" . $nm_apl_dest . "');";
          }
          else
          {
              echo "window.location='" . $nm_apl_dest . "';";
          }
          echo "</SCRIPT>";
          exit;
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
          $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
          return;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioInconformidades']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioInconformidades']['iframe_print'] )
      {
          $target = "_parent";
      }
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
       <link rel="shortcut icon" href="../_lib/img/hticnsdata__NM__ico__NM__favicon.ico">
      </HEAD>
      <BODY>
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
     <input type="hidden" name="hti_cnsdata_session" value="<?php echo NM_encode_input(session_id());?>" />
<?php
   }
?>
   </form> 
      <SCRIPT language="javascript">
          document.Fredir.target = "<?php echo $target ?>"; 
          document.Fredir.action = "<?php echo $nm_apl_dest ?>";
          document.Fredir.submit();
      </SCRIPT>
      </BODY>
      </HTML>
   <?php
      if ($target != "_blank")
      {
          exit;
      }
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
   $_SESSION['hticnsdata']['blk_RelatorioInconformidades']['contr_erro'] = 'off';
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
            nm_limpa_str_blk_RelatorioInconformidades($nmgp_val);
            $$nmgp_var = $nmgp_val;
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
            nm_limpa_str_blk_RelatorioInconformidades($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["RI_ID"])) 
   {
       $_SESSION["RI_ID"] = $_POST["RI_ID"];
       nm_limpa_str_blk_RelatorioInconformidades($_SESSION["RI_ID"]);
   }
   if (!isset($_POST["RI_ID"]) && isset($_POST["ri_id"])) 
   {
       $_SESSION["RI_ID"] = $_POST["ri_id"];
       nm_limpa_str_blk_RelatorioInconformidades($_SESSION["RI_ID"]);
   }
   if (isset($_GET["RI_ID"])) 
   {
       $_SESSION["RI_ID"] = $_GET["RI_ID"];
       nm_limpa_str_blk_RelatorioInconformidades($_SESSION["RI_ID"]);
   }
   if (!isset($_GET["RI_ID"]) && isset($_GET["ri_id"])) 
   {
       $_SESSION["RI_ID"] = $_GET["ri_id"];
       nm_limpa_str_blk_RelatorioInconformidades($_SESSION["RI_ID"]);
   }
   if (!isset($_SESSION["RI_ID"])) 
   {
       $_SESSION["RI_ID"] = "";
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
   if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
   {
       $hti_cnsdata_init = "";
   }
   if (!isset($hti_cnsdata_init) || empty($hti_cnsdata_init))
   {
       $hti_cnsdata_init = rand(2, 10000);
   }
   $salva_iframe = false;
   if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu'];
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu']);
   }
   if (isset($nm_run_menu) && $nm_run_menu == 1)
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
        $_SESSION['hticnsdata']['sc_apl_menu_atual'] = "blk_RelatorioInconformidades";
        $achou = false;
        if (isset($_SESSION['sc_session'][$hti_cnsdata_init]))
        {
            foreach ($_SESSION['sc_session'][$hti_cnsdata_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'blk_RelatorioInconformidades' || $achou)
                {
                    unset($_SESSION['sc_session'][$hti_cnsdata_init][$nome_apl]);
                    if (!empty($_SESSION['sc_session'][$hti_cnsdata_init][$nome_apl]))
                    {
                        $achou = true;
                    }
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
        $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['initialize']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('blk_RelatorioInconformidades' == $sReferer || 'blk_RelatorioInconformidades_' == substr($sReferer, 0, 29))
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['initialize'] = true;
       }
   }

   $_POST['hti_cnsdata_init'] = $hti_cnsdata_init;
   if (isset($_SESSION['hticnsdata']['sc_outra_jan']) && $_SESSION['hticnsdata']['sc_outra_jan'] == 'blk_RelatorioInconformidades')
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['sc_outra_jan'] = true;
        unset($_SESSION['hticnsdata']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioInconformidades']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/blk_RelatorioInconformidades_erro.php");
   }
   if (!empty($nmgp_parms)) 
   { 
       $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
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
                nm_limpa_str_blk_RelatorioInconformidades($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (!isset($RI_ID) && isset($ri_id)) 
       {
           $_SESSION["RI_ID"] = $ri_id;
       }
       if (isset($RI_ID)) 
       {
           $_SESSION['RI_ID'] = $RI_ID;
           nm_limpa_str_blk_RelatorioInconformidades($_SESSION["RI_ID"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_blk_RelatorioInconformidades = new blk_RelatorioInconformidades_apl();
   $contr_blk_RelatorioInconformidades->controle();
//
   function nm_limpa_str_blk_RelatorioInconformidades(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               foreach ($str as $x => $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
?>
