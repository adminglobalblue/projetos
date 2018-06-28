<?php
   include_once('blk_RelatorioGerencial_session.php');
   @session_start() ;
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_prod']       = "";
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_conf']       = "";
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imagens']    = "";
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imag_temp']  = "";
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_doc']        = "";
//
class blk_RelatorioGerencial_ini
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
   var $nm_bases_progress;
   var $sc_page;
   var $sc_lig_md5 = array();
   var $sc_lig_target = array();
   var $sc_export_ajax = false;
   var $sc_export_ajax_img = false;
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
      $this->sc_charset['TIS-620'] = 'tis-620';
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
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "blk_RelatorioGerencial"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "CNSData"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "sb_bronze"; 
      $this->nm_dt_criacao   = "20180307"; 
      $this->nm_hr_criacao   = "204536"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20180610"; 
      $this->nm_hr_ult_alt   = "223559"; 
      $this->Apl_paginacao   = "PARCIAL"; 
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
      if(empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = $this->appIsSsl();
      $this->sc_protocolo    = $this->sc_site_ssl ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/blk_RelatorioGerencial';
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
          $_SESSION['hticnsdata']['fusioncharts_new'] = @is_dir($this->path_third . '/oem_fs');
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
          include_once("blk_RelatorioGerencial_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['compact_mode']    = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["blk_RelatorioGerencial"]))
          {
              foreach ($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["blk_RelatorioGerencial"] as $sTmpTargetLink => $sTmpTargetWidget)
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
          unset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao']);
      }
      include($this->path_lang . $this->str_lang . ".lang.php");
      include($this->path_lang . "config_region.php");
      include($this->path_lang . "lang_config_region.php");
      asort($this->Nm_lang_conf_region);
      $_SESSION['hticnsdata']['charset']  = "UTF-8";
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
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan'])) 
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
      include_once($this->path_aplicacao . "blk_RelatorioGerencial_erro.class.php"); 
      $this->Erro = new blk_RelatorioGerencial_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('blk_RelatorioGerencial'); 
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
      $this->nm_bases_ibase      = array("ibase", "firebird", "pdo_firebird", "borland_ibase");
      $this->nm_bases_informix   = array("informix", "informix72", "pdo_informix");
      $this->nm_bases_mssql      = array("mssql", "ado_mssql", "odbc_mssql", "mssqlnative", "pdo_sqlsrv", "pdo_dblib");
      $this->nm_bases_mysql      = array("mysql", "mysqlt", "mysqli", "maxsql", "pdo_mysql");
      $this->nm_bases_postgres   = array("postgres", "postgres64", "postgres7", "pdo_pgsql");
      $this->nm_bases_oracle     = array("oci8", "oci805", "oci8po", "odbc_oracle", "oracle", "pdo_oracle");
      $this->sqlite_version      = "old";
      $this->nm_bases_sqlite     = array("sqlite", "sqlite3", "pdosqlite");
      $this->nm_bases_sybase     = array("sybase", "pdo_sybase_odbc", "pdo_sybase_dblib");
      $this->nm_bases_vfp        = array("vfp");
      $this->nm_bases_odbc       = array("odbc");
      $this->nm_bases_progress     = array("progress");
      $this->nm_bases_all        = array_merge($this->nm_bases_access, $this->nm_bases_db2, $this->nm_bases_ibase, $this->nm_bases_informix, $this->nm_bases_mssql, $this->nm_bases_mysql, $this->nm_bases_postgres, $this->nm_bases_oracle, $this->nm_bases_sqlite, $this->nm_bases_sybase, $this->nm_bases_vfp, $this->nm_bases_odbc, $this->nm_bases_progress);
      $this->nm_font_ttf = array("ar", "ja", "pl", "ru", "sk", "thai", "zh_cn", "zh_hk", "cz", "el", "ko", "mk");
      $this->nm_ttf_arab = array("ar");
      $this->nm_ttf_jap  = array("ja");
      $this->nm_ttf_rus  = array("pl", "ru", "sk", "cz", "el", "mk");
      $this->nm_ttf_thai = array("thai");
      $this->nm_ttf_chi  = array("zh_cn", "zh_hk", "ko");
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['sub_dir'] = array(); 
      $_SESSION['hticnsdata']['nm_bases_security']  = "enc_nm_enc_v1DcBwH9X7DSN7V5FGHgrwVIBsV5F/HMF7D9BiH9BqHAN7V5FaHgBYHEXeDuX/ZuB/D9NwH9BiHAveD5NUHgNKDkBOV5FYHMBiHQNmZkFGZ1vOZMJwHgrKDkB/DWrGZuB/HQXsH9FUHANKD5F7DMBOV9BUH5XCHIBiHQBsZ1BiHAvCV5X7HgrKDkB/H5F/HIBiHQFYDQBqDSzGD5F7DMvsVcFeV5F/HIF7HQBqZ1FGHAvmD5rqDEBOHEFiHEFqDoF7DcJUZSBiHIvsVWFaDMNOVcB/Dur/HIJeHQXOZ1BiHIBOV5X7HgBOHArCV5FqHIB/DcBiH9FUHAvOD5F7DMvOZSNiHEFYVoBiDcNmZSBqD1vsV5X7HgrKVkJqDWBmZuFaHQFYDQFUHIvsV5FGHuNOVcFKHEFYVoBqDcBwH9BqDSvOZMJwHgNOZSJqH5FGDoJeHQFYDQB/DSzGD5F7DMvsVcBUDuX7HIrqDcFYVIJsHAvmV5X7HgNOHErCV5XCHMB/HQNmH9BiHAvCD5F7DMzGVcBUH5FqHINUHQBiVINUD1zGD5rqDEBOHEFiHEFqDoF7DcJUZSFGD1BeV5FGHgrYDkFCDWXCVoB/D9BiZ1F7HIveD5BiHgBeDkB/HEB3DoB/HQFYDQJwHANOV5JwHgrKDkFCDWJeVoB/D9BsZkFUHArKHQraDEBeHEXeDuFYVoB/D9NwZ9rqZ1rwHQBOHgrKVcFCH5XCHIF7DcBqZ1B/DSBeV5FaHgvCZSJGDWB3ZuXGD9XsZ9JeZ1rwVWXGHuBYDkFCDuX7VoX7D9BsH9B/Z1BeZMB/HgvCZSJGH5FYDoF7D9NwH9X7DSBYV5JeHuBYVcFKH5FqVoB/D9XOH9B/D1zGD5FaDMrYZSXeDuFYVoXGDcJeZ9rqD1BeV5BqHgvsDkB/V5X7DoX7D9BsH9FaD1rwZMB/DMNKZSJ3H5F/HIFUDcXGZ9XGHANKV5JeDMvOVcB/DuFGVoX7HQXOVIJsHAzGZMBqHgBeHEFiV5B3DoF7D9XsDuFaHAveHQBODMBOVcFeDur/VEFGHQBsH9BOHArKHQFUHgBYHArsDWF/DoBqD9XsH9FUHIrKHuFaHuNOZSrCH5FqDoXGHQJmZ1FUZ1BeD5F7DEBOHEFiHEFaDoFUHQFYH9X7HABYD5rqHgvsVcFCH5XCVoraD9XOZSB/DSrYD5FaHgBOZSXeDWFqDoJeDcBwDQX7Z1N7V5FGHuvmVcBODWFaDoJeHQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvmVcFKV5BmVoBqD9BsZkFGHArKHuXGDEBODkXKH5F/HIXGD9XsZ9F7D1BeHQBqHuNOVIBOHEX7VEF7D9JmVIraZ1rYHQBiHgBeHEFiV5B3DoF7D9XsDuFaHAveV5BqHgvsVIB/V5X7VoBOD9XOZSB/Z1BeV5FUDENOVkXeDWFqHIJsD9XsZ9JeD1BeD5F7DMvmVcBUDWrmVorqHQNmZkBiHINKD5BqHgNKDkXKDWFGDoBqHQJKDQJsZ1vCV5FGHuNOV9FeDWXCVoBiHQBiZ1FGHIrwZMB/DMveHENiDWF/HMFaD9XsZ9XGHArYHQFaHuzGVcFKDWF/HINUDcJUZSBqDSBeHQJwDEBODkFeH5FYVoFGHQJKDQB/HANOHuB/HgNKVcXKH5XCDoraDcBqH9B/Z1NOD5FaDEBOHEFiV5FaVoBqD9JKDQX7HAvOV5BiHgrKVcFKDWXKVoFaHQXOZ1B/Z1NOV5BqDEBOZSJGDWr/VoFGDcJeZ9FaHIrYV5FGHuNOZSJ3DWXCHMJwHQXOZ1BOHAN7HQBiHgvsHErCHEB7VoFGHQNmDuFaHABYHuFaHuNOZSrCH5FqDoXGHQJmZ1BiDSvOV5FUHgveHEBOV5JeZura";
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan'])) 
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
              if (isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao']) && $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil']) && $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao'])) ? $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao']))
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
      if (isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil']) && !empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['embutida_init']) 
      {
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
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['decimal_db'] = $_SESSION['hticnsdata']['glo_decimal_db']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_date_separator']) && !empty($_SESSION['hticnsdata']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['hticnsdata']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan'])) 
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
      if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && isset($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['hticnsdata']['blk_RelatorioGerencial']['glo_nm_conexao'], $this->root . $this->path_prod, 'CNSData'); 
      } 
      else 
      { 
          ob_start();
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['embutida'])
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
          $this->Db->Execute("alter session set nls_date_format         = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_format    = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_timestamp_tz_format = 'yyyy-mm-dd hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_format         = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_time_tz_format      = 'hh24:mi:ss'");
          $this->Db->Execute("alter session set nls_numeric_characters  = '.,'");
          $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['decimal_db'] = "."; 
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_sep_date1'];
           }
           return $delim . $var . $delim1;
       }
       else
       {
           return $var;
       }
   } // sc_Sql_Protect
	function appIsSsl() {
		if (isset($_SERVER['HTTPS'])) {
			if ('on' == strtolower($_SERVER['HTTPS'])) {
				return true;
			}
			if ('1' == $_SERVER['HTTPS']) {
				return true;
			}
		}

		if (isset($_SERVER['REQUEST_SCHEME'])) {
			if ('https' == $_SERVER['REQUEST_SCHEME']) {
				return true;
			}
		}

		if (isset($_SERVER['SERVER_PORT'])) {
			if ('443' == $_SERVER['SERVER_PORT']) {
				return true;
			}
		}

		return false;
	}
   function Get_Gb_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blk_RelatorioGerencial']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
           if (in_array(strtolower($this->nm_tpbanco), $this->nm_bases_access) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_oracle) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_mssql) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_db2) || in_array(strtolower($this->nm_tpbanco), $this->nm_bases_progress))
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
class blk_RelatorioGerencial_apl
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

      $this->Ini = new blk_RelatorioGerencial_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['hticnsdata']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioGerencial']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioGerencial']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['blk_RelatorioGerencial']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['blk_RelatorioGerencial'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_RelatorioGerencial']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_RelatorioGerencial']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('blk_RelatorioGerencial') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_RelatorioGerencial']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "blk_RelatorioGerencial")
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
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['blk_RelatorioGerencial']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['blk_RelatorioGerencial']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['blk_RelatorioGerencial']['exit'];
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
      include_once($this->Ini->path_aplicacao . "blk_RelatorioGerencial_erro.class.php"); 
      $this->Erro      = new blk_RelatorioGerencial_erro();
      $this->Erro->Ini = $this->Ini;
//
      $_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
if (!isset($_SESSION['RG_ID'])) {$_SESSION['RG_ID'] = "";}
if (!isset($this->sc_temp_RG_ID)) {$this->sc_temp_RG_ID = (isset($_SESSION['RG_ID'])) ? $_SESSION['RG_ID'] : "";}

sc_include_library("sys", "functions", "functions.php");
$GLOBALS["s"] = new manageSession();
$GLOBALS["profile"] = $GLOBALS["s"]->get("profile")["RG"] ?? null;

sc_include_library("sys", "RelatorioGerencial", "RelatorioGerencial.php");
$GLOBALS["_RelatorioGerencial"] = new RelatorioGerencial($this);

$RG_ID = $_POST["RG_ID"] ?? $_GET["RG_ID"] ?? $this->sc_temp_RG_ID;
if (!$RG_ID) { if (isset($this->sc_temp_RG_ID)) {$_SESSION['RG_ID'] = $this->sc_temp_RG_ID;}
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($this->Ini->path_link . "" . SC_dir_app_name('ctr_RelatorioGerencial') . "/", $this->nm_location, "","_self", 440, 630, "ret_self");
 };}

$GLOBALS["thisRelatorioGerencial"] = (object)($GLOBALS["_RelatorioGerencial"]->find("ID = '$RG_ID'")[0]);
$GLOBALS["_RelatorioGerencial"]->setRelatorioGerencial($GLOBALS["thisRelatorioGerencial"]);

$GLOBALS["thisRelatorioGerencial"] = $GLOBALS["_RelatorioGerencial"]->thisRelatorioGerencial;

$GLOBALS["path_doc"] = $this->Ini->path_doc;
$GLOBALS["path_img"] = $this->Ini->path_imagens;
$GLOBALS["path_imag_temp"] = $this->Ini->path_imag_temp;
$this->router();
if (isset($this->sc_temp_RG_ID)) {$_SESSION['RG_ID'] = $this->sc_temp_RG_ID;}
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off'; 
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
function Audit($log="", $data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $_RelatorioGerencial;

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
	case("saveRelatorioGerencial"):
		$_Logs->insert([
			"Modulo" => "RG",
			"Funcao" => "EDITAR",
			"Descricao" => 'Edição de relatório gerencial',
			"Classe" => "RelatorioGerencial",
			"Conteudo" => $data
		]);
		$_RelatorioGerencial->Logs(["Funcao"=>"EDITAR"]);
	break;
	case("sendRG"):
		$_Logs->insert([
			"Modulo" => "RG",
			"Funcao" => "ENVIAR",
			"Descricao" => 'Envio de relatório gerencial',
			"Classe" => "RelatorioGerencial",
			"Conteudo" => $data
		]);
		$_RelatorioGerencial->Logs(["Funcao"=>"ENVIAR_".$data->Num_Status]);
	break;
	case("deleteRG"):
		$_Logs->insert([
			"Modulo" => "RG",
			"Funcao" => "DELETAR",
			"Descricao" => 'Remoção de relatório gerencial',
			"Classe" => "RelatorioGerencial",
			"Conteudo" => $data
		]);
		$_RelatorioGerencial->Logs(["Funcao"=>"ENVIAR"]);
	break;
	case("initExportPDF"):
		$_Logs->insert([
			"Modulo" => "RG",
			"Funcao" => "EXPORTAR",
			"Descricao" => 'Inicialização de exportação de relatório gerencial',
			"Classe" => "RelatorioGerencial",
			"Conteudo" => $data
		]);
		$_RelatorioGerencial->Logs(["Funcao"=>"EXPORTAR"]);
	break;
	case("finishExportPDF"):
		$_Logs->insert([
			"Modulo" => "RG",
			"Funcao" => "EXPORTAR",
			"Descricao" => 'Finalização de exportação de relatório gerencial',
			"Classe" => "RelatorioGerencial",
			"Conteudo" => $data
		]);
	break;
	case("createTag"):
		$_Logs->insert([
			"Modulo" => "RG",
			"Funcao" => "EDITAR",
			"Descricao" => 'Cadastro de TAG',
			"Classe" => "Tags",
			"Conteudo" => $data
		]);
	break;
}



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDFPreview_Capa()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $_RelatorioGerencial;
global $thisRelatorioGerencial;
sc_include_library("sys", "functions", "functions.php");

$Empreendimento = (object)$_RelatorioGerencial->getEmpreendimento();
$EndEmpreendimento = $Empreendimento->End_Logradouro.", ".$Empreendimento->End_Numero.
	($Empreendimento->End_Complemento ? " | ".$Empreendimento->End_Complemento : null)."<br>".
	(mask($Empreendimento->End_CEP, ["#####-###"]))." | ".
	$Empreendimento->End_Cidade." - ".$Empreendimento->End_UF;

$DVI = date("d/m/Y", strtotime($thisRelatorioGerencial->DataInicioVigencia));
$DVF = date("d/m/Y", strtotime($thisRelatorioGerencial->DataFimVigencia));
$Gerado_em = $thisRelatorioGerencial->Gerado_em ? date("d/m/Y", strtotime($thisRelatorioGerencial->Gerado_em)) : " __/__/____ ";

$FSIMG_Capa =$this->mountPathImg($Empreendimento->ID_Empreendimento,
	"RG/IMG_Capa",
	'',
	$Empreendimento->IMG_RG, "URL"
);

$GBLogo =$this->getB64IMGLogoGB();

$html = '
      <style type="text/css">
          .gray-font{
            color: #ADADAD;
            font-size: 12px; 
            font-family: arial; 
            font-weight: 600;
          }
          .footer-font{
            color: white; 
            display: block;
            position: relative;
            font-size: 12px;
            text-align: center;
            padding-left: 200px;
            height: 271mm;
            margin-top: 28px;
          }
      </style>
      <div style="width: 180mm;height: 271mm;background-color: rgba(245, 243, 241, 1);position:relative;top:-9px;left:-7px;">
      <div style="width: 180mm;background-color: rgba(173, 173, 173, 1);position: absolute;bottom: 20px;height: 110px;">
            <div class="footer-font">
                '.$this->Ini->Nm_lang['lang_label_footer_pdfpas'].'
            </div>
        </div>
         <div style="width: 155px;height: 271mm;background-color: rgba(213, 210, 211, 1);margin-left: 12mm;position: absolute;">
            <span style="font-size: 30px;-webkit-transform: rotate(-90deg);display: inline-block;width: 290px;position: absolute;top: 237px;left: -65px;font-weight: 700;text-align:center">Relatório Gerencial de Serviços</span>
            <img src="'.$GBLogo.'" style="max-width: 500px;max-height: 340px;-webkit-transform: rotate(-90deg);position: absolute;top: 186mm;left: -170px;">
         </div>
         <div style="text-align: right;top: 18mm;position: absolute;width: 180mm;">
			 <div style="margin-right: 20px;font-size: 14px;">Nº'.$thisRelatorioGerencial->ID.' | TI&amp;C | GB '.$thisRelatorioGerencial->ID.' | '.$Gerado_em.'<br>
				   <b style="font-weight: 800;font-size: 13px;">PERÍODO DE '.$DVI.' A '.$DVF.'</b>
				</div>
				<div style="margin-right: 20px;margin-top: 40px;">
					<img src="'.$FSIMG_Capa.'" style="max-width: 400px;max-height: 340px;" onerror="this.style.display=\'none\'">
				</div>
				<div style="margin-right: 20px;margin-top: 10px;font-weight: 800;">'.$Empreendimento->Nom_Empreendimento.'<br>
				   <b style="font-size: 12.5px;">'.$EndEmpreendimento.'</b>
				</div>
				<div style="margin-right: 20px;margin-top: 10px;height: 175px;position: relative;top: 55px;">
				   <table style="padding: 5px;color: #666;float: right;width: 265px;" class="nb">
						<tbody>
							<tr>
								<td colspan="2" class="gray-font">Apresentação do relatório ao responsável</td>
								<br>
							</tr>
							<tr>
								<td class="gray-font" style="text-align:center; font-size: 14px; font-weight: 100;">(  ) SIM</td>
								<td class="gray-font" style="text-align:center; font-size: 14px; font-weight: 100;">(  ) NÃO</td>
							</tr>
							<tr>
								<td class="gray-font" colspan="2" style="height: 60px;
								text-align: left;
								vertical-align: text-top;">
								Obs: 
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="margin-right: 20px;margin-top: 10px;height: 125px;position: relative;top: 40px;">
				<table style="padding: 5px;color: #666;float: right;width: 277px;" class="nb">
				   <tbody>
					  <tr>
						 <td colspan="2" class="gray-font" style="text-align: center; font-size: 16px;">Protocolo</td>
						 <br>
					  </tr>
					  <tr>
						 <td class="gray-font" colspan="2" style="text-align: left;vertical-align: text-top;height: 25px">
							<span style="width: 85px; display: inline-block;">Recebido em:</span> _________________________
						 </td>
					 </tr>
					 <tr>
						 <td class="gray-font" colspan="2" style="text-align: left;vertical-align: text-top;height: 25px">
							<span style="width: 85px; display: inline-block;">Nome:</span> _________________________
						 </td>
					 </tr>
					 <tr>
						 <td class="gray-font" colspan="2" style="text-align: left;vertical-align: text-top;height: 25px">
							<span style="width: 85px; display: inline-block;">Assinatura:</span> _________________________
						 </td>
					 </tr>
				   </tbody>
				</table>
			 </div>
         </div>
      </div>';
return $html;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDFPreview_sumario($fluxo=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$fluxo) return;

$sumario = []; 

$getID = function($arr){
	return sprintf(":%02d:", count($arr));
};

$i1 = 1;

if ($fluxo["objetivo"]["display"] ?? 0) {
    $sumario["objetivo"] = [
        "list" => $i1,
        "title" => $fluxo["objetivo"]["title"],
        "id" => $fluxo["objetivo"]["code"],
        "pgn" => $getID($sumario)
    ];
    $i1++;
}
if ($fluxo["descServicos"]["display"] ?? 0) {
    $sumario[$fluxo["descServicos"]["code"]] = [
        "list" => $i1,
        "title" => $fluxo["descServicos"]["title"],
        "id" => $fluxo["descServicos"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];
    $i1++;
}
if ($fluxo["docProjAbordagem"]["display"] ?? 0) {
    $sumario["docProjAbordagem"] = [
        "list" => $i1,
        "title" => $fluxo["docProjAbordagem"]["title"],
        "id" => $fluxo["docProjAbordagem"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];

    $i2 = 1;
    if ($fluxo["docProjAbordagem"]["child"]["poe"]["display"] ?? 0) {
        $sumario["poe"] = [
            "list" => "$i1.$i2",
            "title" => $fluxo["docProjAbordagem"]["child"]["poe"]["title"],
            "id" => $fluxo["docProjAbordagem"]["child"]["poe"]["code"] ?? null,
            "pgn" => $getID($sumario),
            "isSub" => true
        ];
    }
    $i2++;
    if ($fluxo["docProjAbordagem"]["child"]["pop"]["display"] ?? 0) {
        $sumario["pop"] = [
            "list" => "$i1.$i2",
            "title" => $fluxo["docProjAbordagem"]["child"]["pop"]["title"],
            "id" => $fluxo["docProjAbordagem"]["child"]["pop"]["code"] ?? null,
            "pgn" => $getID($sumario),
            "isSub" => true
        ];
    }
    $i2++;
    if ($fluxo["docProjAbordagem"]["child"]["antenario"]["display"] ?? 0) {
        $sumario["antenario"] = [
            "list" => "$i1.$i2",
            "title" => $fluxo["docProjAbordagem"]["child"]["antenario"]["title"],
            "id" => $fluxo["docProjAbordagem"]["child"]["antenario"]["code"] ?? null,
            "pgn" => $getID($sumario),
            "isSub" => true
        ];
    }
    $i1++;
}
if ($fluxo["inconformidades"]["display"] ?? 0) {
    $sumario["inconformidades"] = [
        "list" => $i1,
        "title" => $fluxo["inconformidades"]["title"],
        "id" => $fluxo["inconformidades"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];
    $i1++;
}
if ($fluxo["abordagemOperadoras"]["display"] ?? 0) {
    $sumario["abordagemOperadoras"] = [
        "list" => $i1,
        "title" => $fluxo["abordagemOperadoras"]["title"],
        "id" => $fluxo["abordagemOperadoras"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];
	
	$sumario["contratuais"] = [
        "list" => "$i1.1",
        "title" => $fluxo["abordagemOperadoras"]["childModel"]["contratuais"]["title"],
        "id" => "contratuais",
        "pgn" => $getID($sumario),
		"isSub" => true
    ];
	
	$sumario["inadimplencias"] = [
        "list" => "$i1.2",
        "title" => $fluxo["abordagemOperadoras"]["childModel"]["inadimplencias"]["title"],
        "id" => "inadimplencias",
        "pgn" => $getID($sumario),
		"isSub" => true
    ];
	
    $i1++;
}
if ($fluxo["ctrProjEspeciais"]["display"] ?? 0) {
    $sumario["ctrProjEspeciais"] = [
        "list" => $i1,
        "title" => $fluxo["ctrProjEspeciais"]["title"],
        "id" => $fluxo["ctrProjEspeciais"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
}       
if ($fluxo["ctrAgendTecnicos"]["display"] ?? 0) {
    $sumario["ctrAgendTecnicos"] = [
        "list" => $i1,
        "title" => $fluxo["ctrAgendTecnicos"]["title"],
        "id" => $fluxo["ctrAgendTecnicos"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
} 
if ($fluxo["opePreBloqueadas"]["display"] ?? 0) {
    $sumario["opePreBloqueadas"] = [
        "list" => $i1,
        "title" => $fluxo["opePreBloqueadas"]["title"],
        "id" => $fluxo["opePreBloqueadas"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
}
if ($fluxo["sobreAviso"]["display"] ?? 0) {
    $sumario["sobreAviso"] = [
        "list" => $i1,
        "title" => $fluxo["sobreAviso"]["title"],
        "id" => $fluxo["sobreAviso"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
}

$htmlSumarioTable = "";
foreach($sumario as $item) {
    $htmlSumarioTable .= '
        <tr class="'.($item["isSub"] ?? false ? "sub-indice" : "text-blue2").' indice-line">
            <td class="indice">
                <span class="list-indice">'.$item["list"].'.</span>
                <a href="#'.$item["id"].'">'.$item["title"].'</span>
            </td>
            <td class="number-indice"></td>
        </tr>';
}

$html = '<div class="cap col-12">
	<h3 CLASS="text-blue1" style="border-bottom: 1px solid #aaa;margin-bottom:10px">ÍNDICE</h3>
	<br>
	<style>
		.sumario {width:100% !important;}
		.sumario a {
			text-decoration: none;
		    color: inherit;
		}
		
		.indice-line td {
			font-size:12px;
			width:1px;
			padding-bottom:10px;
		}
		.list-indice {
    		/*display: inline-block;*/
    		padding-right: 10px;
    		width: 45px;
		}
		.indice {}
		.dotted-indice {
			width: auto !important;
			height: 1px;
		}
		.dotted-indice div {
		    width: 100%;
    		height: 10px;
    		border-bottom: 2px dotted;
		}
		.sub-indice .list-indice {
			padding-left:20px;
		}
		.number-indice {text-align:right;}
	</style>
	<table class="nb sumario">
		'.$htmlSumarioTable.'
	</table>
</div>';
return [$sumario,$html];


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_Capa()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $_RelatorioGerencial;
global $thisRelatorioGerencial;
sc_include_library("sys", "functions", "functions.php");

$Empreendimento = (object)$_RelatorioGerencial->getEmpreendimento();
$EndEmpreendimento = $Empreendimento->End_Logradouro.", ".$Empreendimento->End_Numero.
	($Empreendimento->End_Complemento ? " | ".$Empreendimento->End_Complemento : null)."<br>".
	(mask($Empreendimento->End_CEP, ["#####-###"]))." | ".
	$Empreendimento->End_Cidade." - ".$Empreendimento->End_UF;

$DVI = date("d/m/Y", strtotime($thisRelatorioGerencial->DataInicioVigencia));
$DVF = date("d/m/Y", strtotime($thisRelatorioGerencial->DataFimVigencia));
$Gerado_em = $thisRelatorioGerencial->Gerado_em ? date("d/m/Y", strtotime($thisRelatorioGerencial->Gerado_em)) : " __/__/____ ";

$FSIMG_Capa =$this->mountPathImg($Empreendimento->ID_Empreendimento,
	"RG/IMG_Capa",
	'',
	$Empreendimento->IMG_RG, "FS"
);

$GBLogo =$this->getB64IMGLogoGB();

$html = '
      <style type="text/css">
          .gray-font{
            color: #ADADAD;
            font-size: 12px; 
            font-family: arial; 
            font-weight: 600;
          }
          .footer-font{
            color: white; 
            display: block;
            position: relative;
            font-size: 12px;
            text-align: center;
            padding-left: 200px;
            height: 271mm;
            margin-top: 28px;
          }
      </style>
      <div style="width: 180mm;height: 271mm;background-color: rgba(245, 243, 241, 1);position:absolute;top:-5mm;left:-10mm;">
      <div style="width: 180mm;background-color: rgba(173, 173, 173, 1);position: absolute;bottom: 20px;height: 110px;">
            <div class="footer-font">
                '.$this->Ini->Nm_lang['lang_label_footer_pdfpas'].'
            </div>
        </div>
         <div style="width: 155px;height: 271mm;background-color: rgba(213, 210, 211, 1);margin-left: 12mm;position: absolute;">
            <span style="font-size: 30px;-webkit-transform: rotate(-90deg);display: inline-block;width: 290px;position: absolute;top: 237px;left: -65px;font-weight: 700;text-align:center">Relatório Gerencial de Serviços</span>
            <img src="'.$GBLogo.'" style="max-width: 500px;max-height: 340px;-webkit-transform: rotate(-90deg);position: absolute;bottom: 380px;left: -170px;">
         </div>
         <div style="text-align: right;top: 18mm;position: absolute;width: 180mm;">
			 <div style="margin-right: 20px;font-size: 14px;">Nº'.$thisRelatorioGerencial->ID.' | TI&amp;C | GB '.$thisRelatorioGerencial->ID.' | '.$Gerado_em.'<br>
				   <b style="font-weight: 800;font-size: 13px;">PERÍODO DE '.$DVI.' A '.$DVF.'</b>
				</div>
				<div style="margin-right: 20px;margin-top: 40px;">
					<img src="'.$FSIMG_Capa.'" style="max-width: 400px;max-height: 340px;">
				</div>
				<div style="margin-right: 20px;margin-top: 10px;font-weight: 800;">'.$Empreendimento->Nom_Empreendimento.'<br>
				   <b style="font-size: 12.5px;">'.$EndEmpreendimento.'</b>
				</div>
				<div style="margin-right: 20px;margin-top: 10px;height: 175px;position: relative;top: 55px;">
				   <table style="padding: 5px;color: #666;float: right;width: 265px;" class="nb">
						<tbody>
							<tr>
								<td colspan="2" class="gray-font">Apresentação do relatório ao responsável</td>
								<br>
							</tr>
							<tr>
								<td class="gray-font" style="text-align:center; font-size: 14px; font-weight: 100;">(  ) SIM</td>
								<td class="gray-font" style="text-align:center; font-size: 14px; font-weight: 100;">(  ) NÃO</td>
							</tr>
							<tr>
								<td class="gray-font" colspan="2" style="height: 60px;
								text-align: left;
								vertical-align: text-top;">
								Obs: 
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div style="margin-right: 20px;margin-top: 10px;height: 125px;position: relative;top: 40px;">
				<table style="padding: 5px;color: #666;float: right;width: 277px;" class="nb">
				   <tbody>
					  <tr>
						 <td colspan="2" class="gray-font" style="text-align: center; font-size: 16px;">Protocolo</td>
						 <br>
					  </tr>
					  <tr>
						 <td class="gray-font" colspan="2" style="text-align: left;vertical-align: text-top;height: 25px">
							<span style="width: 85px; display: inline-block;">Recebido em:</span> _________________________
						 </td>
					 </tr>
					 <tr>
						 <td class="gray-font" colspan="2" style="text-align: left;vertical-align: text-top;height: 25px">
							<span style="width: 85px; display: inline-block;">Nome:</span> _________________________
						 </td>
					 </tr>
					 <tr>
						 <td class="gray-font" colspan="2" style="text-align: left;vertical-align: text-top;height: 25px">
							<span style="width: 85px; display: inline-block;">Assinatura:</span> _________________________
						 </td>
					 </tr>
				   </tbody>
				</table>
			 </div>
         </div>
      </div>';
return $html;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_abordagemOperadoras($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
$formatCurrency = function($number) {
	return number_format($number, 2, ',', '');
};

$html = '
	<h4 id="abordagemOperadoras" class="text-blue2 title1">'.$sumario["abordagemOperadoras"]["list"].'. '.$sumario["abordagemOperadoras"]["title"].'</h4>
	<p>
		'.($fluxo["html"][0] ?? null).'
	</p>
	<br>
	<table class="col-12 nb">
		<tr>
			<td style="border-bottom:1px solid #999">EMPRESA</td>
			<td style="border-bottom:1px solid #999">VIGÊNCIA</td>
			<td style="border-bottom:1px solid #999">EQUIPAMENTO</td>
			<td style="border-bottom:1px solid #999">VALOR</td>
			<td style="border-bottom:1px solid #999">INÍCIO DE PAGAMENTO</td>
			<td style="border-bottom:1px solid #999">STATUS</td>
		</tr>
		:trData:
		<tr>
			<td colspan="6" style="text-align:center">TOTAL ARRECADADO DAS OPERADORAS</td>
		</tr>
		<tr>
			<td colspan="6" style="text-align:center">'.$formatCurrency($fluxo["dataTable"]["totalArrecadado"]).'</td>
		</tr>
	</table>	
	'.($fluxo["graph"] ? '<br>
	
<table class="col-12 nb"><tr><td class="col-12" style="text-align:center">
	<div class="graph-title"><span>COMPARATIVO DE VALORES C.E.U.O</span></div>
	<img src="'.$fluxo["graph"].'" style="max-width:165mm">
	<div class="legenda">
		<span class="text-leg" style="border-left: 15px #61a9f3 solid;padding-left: 25px;">
			Valor Atual
		</span>
		<div style="width:20px;display:inline-block"></div>
		<span class="text-leg" style="border-left: 15px #9fcefd solid;padding-left: 25px;">
			Valor Anterior
		</span>
	</div>
	</table></tr></td>
	' : null).'
	<br>
	<p>
		'.($fluxo["html"][1] ?? null).'
	</p>
	<h4 id="contratuais" class="text-blue2 title2">'.$sumario["contratuais"]["list"].'. '.$sumario["contratuais"]["title"].'</h4>
	<div><p>:contratuais:</p></div>
	<h4 id="inadimplencias" class="text-blue2 title2">'.$sumario["inadimplencias"]["list"].'. '.$sumario["inadimplencias"]["title"].'</h4>
	<div><p>:inadimplencias:</p></div>
	<br>
';

$trData = "";
if ($fluxo["dataTable"]["PSA"]) foreach($fluxo["dataTable"]["PSA"] as $i => $PSA) {
	if ($i == 0 || !$counterRowspan) {
        $totalrowspan = $counterRowspan = 0;
        $NomeOperadora = null;
        $ID_Operadoras = null;
        $Valor_Contrato = 0;
		foreach($fluxo["dataTable"]["PSA"] as $PSA2) {
			if ($PSA["ID_Operadoras"] == $PSA2["ID_Operadoras"]) {
				$ID_Operadoras = $PSA2["ID_Operadoras"];
				$NomeOperadora = $PSA2["NomeOperadora"];
				$Valor_Contrato += $PSA2["Valor_Contrato"];
				$totalrowspan++;
                $counterRowspan++;
			}
		}
    }
    
	$trData .= '
		<tr>
			'.($totalrowspan == $counterRowspan ? 
				'<td style="border-bottom:1px solid #ddd" rowspan="'.$totalrowspan.'">'.$NomeOperadora.'</td>' : null
			).'
			<td style="width:110px;border-bottom:1px solid #ddd">
				INÍCIO: '.($PSA["InicioVigencia"] ? date('d/m/Y', strtotime($PSA["InicioVigencia"])) : null).'<br>
				FINAL: '.($PSA["FimVigencia"] ? date('d/m/Y', strtotime($PSA["FimVigencia"])) : null).'
			</td>
			<td style="border-bottom:1px solid #ddd">'.$PSA["Nom_ParentEquipamento"].' - '.$PSA["Nom_Equipamento"].'</td>
			'.($totalrowspan == $counterRowspan ? 
				'<td style="border-bottom:1px solid #ddd" rowspan="'.$totalrowspan.'">R$ '.$formatCurrency($Valor_Contrato).'</td>' : null
			).'
			<td style="width:90px;border-bottom:1px solid #ddd">
				'.($PSA["InicioPagamento"] ? date('d/m/Y', strtotime($PSA["InicioPagamento"])) : null).'
				'.(trim($PSA["Observacoes"]) ? '<br>Obs. '.$PSA["Observacoes"] : null).'	
			</td>
			<td style="border-bottom:1px solid #ddd">'.$PSA["Status"].'</td>
		</tr>
	';
	$counterRowspan--;
}

$Operadoras = $fluxo["Operadoras"];
if (gettype($fluxo["child"]["contratuais"]["content"]) == "object") {
	$i = $sumario["contratuais"]["list"];
	$k = 1;
	$contratuais = "";
	foreach($fluxo["child"]["contratuais"]["content"] as $ID_Operadora => $byOperadora) {
		$contratuais .= "<span style='font-size:14px'>$i.$k.</span> ".($Operadoras[$ID_Operadora]["NomeOperadora"] ?? null)."<br>";
		$j = 1;
		foreach($byOperadora as $tag) {
			$contratuais .= "
				<span style='font-size:14px;margin-left:15px'>$i.$k.$j.</span> ".$tag["Conteudo"]."<br>
			";
			$j++;
		}
		$k++;
	}
}

if (gettype($fluxo["child"]["inadimplencias"]["content"]) == "object") {
	$i = $sumario["inadimplencias"]["list"];
	$k = 1;
	$inadimplencias = "";
	foreach($fluxo["child"]["inadimplencias"]["content"] as $ID_Operadora => $byOperadora) {
		$inadimplencias .= "<span style='font-size:14px'>$i.$k.</span> ".($Operadoras[$ID_Operadora]["NomeOperadora"] ?? null)."<br>";
		$j = 1;
		foreach($byOperadora as $tag) {
			$inadimplencias .= "
				<span style='font-size:14px;margin-left:15px'>$i.$k.$j.</span> ".$tag["Conteudo"]."<br>
			";
			$j++;
		}
		$k++;
	}
}

$html = strtr($html, [
	":trData:" => $trData,
	":contratuais:" => $contratuais ?? null,
	":inadimplencias:" => $inadimplencias ?? null
]);

return $html;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_antenario($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $PDF_output;

$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title2">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		:listItens:
	</p>
	<br><br>
';

$listItens = "";
foreach($fluxo as $i => $Antenario) {
	$arrTr = array();
	if ($Antenario["display"]) {
		$listItens .= '
			<h4 class="text-blue2 title2">'.$sumario["list"].'.'.($i+1).'. '.$Antenario["title"].'</h4>
			<div class="quill-text">
				'.$this->sanitizeQuillHTML($Antenario["Descricao_RGAntenario"]).'
			</div>
			<br>
			<table class="col-12 nb"><tr><td class="col-12" style="text-align:center">
			<div class="graph-title"><span>UTILIZAÇÃO DO ANTENÁRIO</span></div>
			<img src="'.$Antenario["graph"].'" style="max-width:165mm">
			<div class="legenda">
					<span class="text-leg" style="border-left: 15px #5cb85c solid;padding-left: 25px;">
						Disponível
					</span>
					<div style="width:20px;display:inline-block"></div>
					<span class="text-leg" style="border-left: 15px #0096d6 solid;padding-left: 25px;">
						Em Uso
					</span>
			</div>
			</table></tr></td>
			<br><br>
			:listIMG:
			<br><br>
		';
		
		foreach($Antenario["IMG"] as $j => $IMG) { 
			if (!$IMG["display"]) {
				unset($Antenario["IMG"][$j]);
			}
		}
		
		if (count($Antenario["IMG"]) > 0) {
			$arrTdImg = array();
			$arrTdDesc = array();
			foreach($Antenario["IMG"] as $j => $IMG) {
				$colspan = (isset($Antenario["IMG"][$j+1]) ? 1 : 2);
				$IMG_B64 = $PDF_output == "PDF" ? $IMG["FS"] : $IMG["URL"];
				$arrTdImg[] = '
					<td colspan="'.$colspan.'" class="text-center img-td col-6">
						<img src="'.$IMG_B64.'" style="max-width:250px;max-height:300px;">
					</td>';
				$arrTdDesc[] = '<td class="text-center legend-img-td" colspan="'.$colspan.'">'.$this->sanitizeQuillHTML($IMG["Descricao_RGAntenarioIMG"]).'</td>';
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

return strtr($html, [
	":listItens:" => $listItens
]);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_css()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
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
		font-size: 14px;
		margin: 0;
	}
	.align-top {
		vertical-algin: top;
	}
	td {
		padding: 2px 5px;
	}
	.footerHtml { position: fixed; bottom: 15mm;font-size:14px;color:rgb(150, 150, 150)}
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
	p, li {
		text-align: justify;
		font-size: 14px;
	}
	
	.quill-text {
		margin: 0;
		padding: 0;
	}
	.quill-text, quill-text ol, quill-text ul {
		font-size: 14px !important;
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
	
	.fs12 {
		font-size: 14px;
	}
	.legenda {
        margin-top: 25px;
        text-align: center;
    }
    .legenda div.cube {
        display: inline-block;
        width: 13px;
        height: 13px;
        margin-right: 5px;
    }
    .legenda span.text-leg {
        font-size: 16px;
        font-weight: 600;
    }
	.graph-title {
        margin-bottom: 25px;
        text-align: center;
    }
    .graph-title span {
        font-size: 20px;
        font-weight: 600;
    }
</style>";

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_ctrAgendTecnicos($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<table class="col-12 nb">
		<tr>
			<td style="border-bottom:1px solid #999">DATA</td>
			<td style="border-bottom:1px solid #999">HORÁRIO</td>
			<td style="border-bottom:1px solid #999">DESCRIÇÃO</td>
			<td style="border-bottom:1px solid #999">OPERADORA</td>
			<td style="border-bottom:1px solid #999">PRESTADORA DE SERVIÇO</td>
			<td style="border-bottom:1px solid #999">CLIENTE</td>
		</tr>
		:trData:
		<tfoot>
			<tr>
				<th colspan="6" class="text-center" style="font-size:12px;text-align:left">
				'.(count($fluxo["dataTable"]) > 0 ? '
					<span>
				   		'.(strtr($fluxo["html"][2], ['#QTDSae#' => count($fluxo["dataTable"]), 
							'#RGINICIOVIGENCIA#' => $fluxo["tagsVal"]['#RGINICIOVIGENCIA_dmY#'], '#RGFIMVIGENCIA#' => $fluxo["tagsVal"]['#RGFIMVIGENCIA_dmY#']])).'
				   	</span> 
				' : '
					<span>
				   		'.(strtr($fluxo["html"][3], ['#RGINICIOVIGENCIA#' => $fluxo["tagsVal"]['#RGINICIOVIGENCIA_dmY#'], '#RGFIMVIGENCIA#' => $fluxo["tagsVal"]['#RGFIMVIGENCIA_dmY#']])).'
				   	</span> 
				').'
				</th>
			</tr>
		</tfoot>
	</table>
	<br>
	<table class="col-12 nb"><tr><td class="col-12" style="text-align:center">
	<div class="graph-title" style="margin-bottom:0px"><span>COMPARATIVO ANUAL DE AGENDAMENTOS TÉCNICOS</span></div>
	<img src="'.$fluxo["graph"].'" style="width:165mm;">
	<div class="legenda">
		<span class="text-leg" style="border-left: 15px #9fcefd solid;padding-left: 25px;">
			Agendamentos
		</span>
	</div>
	</table></tr></td>
	<br><br>
';

$trData = "";
if ($fluxo["dataTable"]) foreach($fluxo["dataTable"] as $SAE) {
	$trData .= '<tr>
		<td style="border-bottom:1px solid #aaa">'.($SAE["Data_Inicio"] ? date("d/m/Y", strtotime($SAE["Data_Inicio"])) : null).'</td>
		<td style="border-bottom:1px solid #aaa">'.
			($SAE["Data_Inicio"] && $SAE["Hora_Inicio"] ? date("d/m/Y H:i", strtotime($SAE["Data_Inicio"].' '.$SAE["Hora_Inicio"])) : null).' - <br>'.
			($SAE["Data_Fim"] && $SAE["Hora_Fim"] ? date("d/m/Y H:i", strtotime($SAE["Data_Fim"].' '.$SAE["Hora_Fim"])) : null)
		.'</td>
		<td style="border-bottom:1px solid #aaa">'.$SAE["TipoSAE"].'</td>
		<td style="border-bottom:1px solid #aaa">'.($SAE["Nom_Operadora"] ?: '-').'</td>
		<td style="border-bottom:1px solid #aaa">'.($SAE["Nom_Prestadora"] ?: '-').'</td>
		<td style="border-bottom:1px solid #aaa">'.($SAE["Nom_Condomino"] ?: '-').'</td>
	</tr>';
}

return strtr($html, [":trData:" => $trData]);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_ctrProjEspeciais($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		'.($fluxo["html"][0] ?? null).'
	</p>
	<table class="col-12 nb">
		<tr>
			<td style="border-bottom:1px solid #999">NÚMERO DE CONTROLE</td>
			<td style="border-bottom:1px solid #999">DATA DE APROVAÇÃO</td>
			<td style="border-bottom:1px solid #999">CONDÔMINIO</td>
			<td style="border-bottom:1px solid #999">OEPRADORA</td>
			<td style="border-bottom:1px solid #999">PRESTADORA DE SERVIÇO</td>
		</tr>
		:trData:
		<tfoot>
			<tr>
				<th colspan="5" class="text-center" style="font-size:12px;text-align:left">
				'.(count($fluxo["dataTable"]) > 0 ? '
					<span>
				   		'.(strtr($fluxo["html"][3], ['#QTDProjetos#' => count($fluxo["dataTable"])])).'
				   	</span> 
				' : '
					<span>
				   		'.(strtr($fluxo["html"][4], ['#RGINICIOVIGENCIA#' => $fluxo["tagsVal"]['#RGINICIOVIGENCIA_dmY#'], '#RGFIMVIGENCIA#' => $fluxo["tagsVal"]['#RGFIMVIGENCIA_dmY#']])).'
				   	</span> 
				').'
				</th>
			</tr>
		</tfoot>
	</table>
	<br>
	<table class="col-12 nb"><tr><td class="col-12" style="text-align:center">
	<div class="graph-title" style="margin-bottom:0px"><span>COMPARATIVO ANUAL DE PROJETOS</span></div>
	<img src="'.$fluxo["graph"].'" style="width:165mm;">
	<div class="legenda">
		<span class="text-leg" style="border-left: 15px #9fcefd solid;padding-left: 25px;">
			Projetos
		</span>
	</div>
	</table></tr></td>
	<br><br>
';

$trData = "";
if ($fluxo["dataTable"]) foreach($fluxo["dataTable"] as $Projetos) {
	$trData .= '<tr>
		<td  style="border-bottom:1px solid #aaa">'.$Projetos["ProtocoloHex"].'</td>
		<td  style="border-bottom:1px solid #aaa">'.($Projetos["DataAprovacao"] ? date("d/m/Y H:i", strtotime($Projetos["DataAprovacao"])) : null).'</td>
		<td  style="border-bottom:1px solid #aaa">'.$Projetos["Nom_Condomino"].'</td>
		<td  style="border-bottom:1px solid #aaa">'.$Projetos["Nom_Operadora"].'</td>
		<td  style="border-bottom:1px solid #aaa">'.$Projetos["Nom_Prestadora"].'</td>
	</tr>';
}

return strtr($html, [":trData:" => $trData]);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_descServicos($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
return '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		'.($fluxo["html"] ?? null).'
	</p>
';

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_docProjAbordagem($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
return '
	<h3 id="docProjAbordagem" class="text-blue2 title1">'.$sumario["docProjAbordagem"]["list"].'. '.$sumario["docProjAbordagem"]["title"].'</h3>
	'.(isset($sumario["poe"]) ? '
		<!-- objetivo -->
		<div class="" id="objetivo">
			<script type="text/php">
				$GLOBALS["sumarioContent"]["poe"]["pnum"] = $pdf->get_page_number();
			</script>
			'.$this->PDF_poe($fluxo["child"]["poe"]["data"], $sumario["poe"]).'
		</div>
	' : null).'
	
	'.(isset($sumario["pop"]) ? '
		<!-- objetivo -->
		<div class="" id="pop">
			<script type="text/php">
				$GLOBALS["sumarioContent"]["pop"]["pnum"] = $pdf->get_page_number();
			</script>
			'.$this->PDF_pop($fluxo["child"]["pop"]["data"], $sumario["pop"]).'
		</div>
	' : null).'
	
	'.(isset($sumario["antenario"]) ? '
		<!-- objetivo -->
		<div class="" id="antenario">
			<script type="text/php">
				$GLOBALS["sumarioContent"]["antenario"]["pnum"] = $pdf->get_page_number();
			</script>
			'.$this->PDF_antenario($fluxo["child"]["antenario"]["data"], $sumario["antenario"]).'
		</div>
	' : null).'
';

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_inconformidades($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $PDF_output;

$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		'.$fluxo["html"].'
	</p>
	<p>
		:listItens:
	</p>
	<br><br>
';

$listItens = "";
foreach($fluxo["list"] as $i => $Inconformidade) {
	$arrTr = array();
	if ($Inconformidade["display"]) {
		$listItens .= '
			<h4 class="text-blue2 title2">'.$sumario["list"].'.'.($i+1).'. '.$Inconformidade["title"].'</h4>
			<div>
                <p>
					<b>Data do relato</b>: '.date("d/m/Y H:i", strtotime($Inconformidade["DataRelato_Inconformidade"])).'<br>
					<b>Data do incidente</b>: '.date("d/m/Y", strtotime($Inconformidade["DataIncidente_Inconformidade"])).'<br>
					<b>Status</b>: '.$Inconformidade["Num_Status_Text_Inconformidade"].'
				</p>
            </div>
			<div class="quill-text">
				'.$this->sanitizeQuillHTML($Inconformidade["Descricao_RGInconformidade"]).'
			</div>
			<div class="quill-text">
				'.$this->sanitizeQuillHTML($Inconformidade["Historico_RGInconformidade"]).'
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
				$arrTdDesc[] = '<td class="text-center legend-img-td" colspan="'.$colspan.'">'.$this->sanitizeQuillHTML($IMG["Descricao_RGInconformidadeIMG"]).'</td>';
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

return strtr($html, [
	":listItens:" => $listItens
]);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_objetivo($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
return '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		'.($fluxo["html"] ?? null).'
	</p>
';

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_opePreBloqueadas($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<table class="col-12 nb">
		<tr>
			<td style="border-bottom:1px solid #999">OPERADORA / PRESTADORA</td>
			<td style="border-bottom:1px solid #999">DESCRIÇÃO</td>
			<td style="border-bottom:1px solid #999">DATA DE BLOQUEIO</td>
			<td style="border-bottom:1px solid #999">PROTOCOLO DE INCONFORMIDADE</td>
		</tr>
		:trData:
	</table>
	<br><br>
';

$trData = "";
foreach($fluxo["dataTable"] as $bloqueio) {
	$trData .= '<tr>
		<td  style="border-bottom:1px solid #aaa">'.$bloqueio["Nom_OpePre"].'</td>
		<td  style="border-bottom:1px solid #aaa">'.$bloqueio["Descricao"].'</td>
		<td  style="border-bottom:1px solid #aaa">'.($bloqueio["DataBloqueio"] ? date("d/m/Y H:i", strtotime($bloqueio["DataBloqueio"])) : null).'</td>
		<td  style="border-bottom:1px solid #aaa">'.($bloqueio["Protocolo"] ?: ' - ').'</td>
	</tr>';
}

return strtr($html, [":trData:" => $trData]);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_poe($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $PDF_output;

$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title2">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		:listItens:
	</p>
	<br>
	<br>
';

$listItens = "";
foreach($fluxo as $i => $Poe) {
	$arrTr = array();
	if ($Poe["display"]) {
		$listItens .= '
			<h4 class="text-blue2 title2">'.$sumario["list"].'.'.($i+1).'. '.$Poe["Descricao_POE"].'</h4>
			<p>
				'.$Poe["html"][0].'<br>
			</p>
			<div class="quill-text">
				'.$this->sanitizeQuillHTML($Poe["Descricao_RGPOE"]).'
			</div>
			<br>
			:listIMG:
			<br><br>
		';
		
		foreach($Poe["IMG"] as $j => $IMG) { 
			if (!$IMG["display"]) {
				unset($Poe["IMG"][$j]);
			}
		}
		
		if(count($Poe["IMG"]) > 0) {
			$arrTdImg = array();
			$arrTdDesc = array();
			foreach($Poe["IMG"] as $j => $IMG) {
				$colspan = (isset($Poe["IMG"][$j+1]) ? 1 : 2);
				$IMG_B64 = $PDF_output == "PDF" ? $IMG["FS"] : $IMG["URL"];
				$arrTdImg[] = '
					<td colspan="'.$colspan.'" class="text-center img-td col-6">
						<img src="'.$IMG_B64.'" style="max-width:250px;max-height:300px;">
					</td>';
				$arrTdDesc[] = '<td class="text-center legend-img-td" colspan="'.$colspan.'">'.$this->sanitizeQuillHTML($IMG["Descricao_RGPOEIMG"]).'</td>';
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

return strtr($html, [
	":listItens:" => $listItens
]);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_pop($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $PDF_output;

$html = '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title2">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		:listItens:
	</p>
	<br><br>
';

$listItens = "";
foreach($fluxo as $i => $Pop) {
    $arrTrlistIMG = array();
    $arrTrlistRACKS = "";
	if ($Pop["display"]) {
		$listItens .= '
			<h4 class="text-blue2 title2">'.$sumario["list"].'.'.($i+1).'. '.$Pop["title"].'</h4>
			'.($Pop["Descricao_RGPOP"] ? '<div class="quill-text">
				'.$this->sanitizeQuillHTML($Pop["Descricao_RGPOP"]).'
			</div>
            <br>' : null).'
            <br>
			<table class="col-12 nb" style="width:100%"><tr><td class="col-12 text-center img-td" style="width:100%">
			<div class="graph-title"><span>UTILIZAÇÃO DA SALA POP/DG</span></div><br>
            <img src="'.$Pop["graph"].'" style="max-width:165mm"><br>
			<div class="legenda">
					<span class="text-leg" style="border-left: 15px #5cb85c solid;padding-left: 25px;">
						Disponível
					</span>
					<div style="width:20px;display:inline-block"></div>
					<span class="text-leg" style="border-left: 15px #0096d6 solid;padding-left: 25px;">
						Em Uso
					</span>
			</div>
			</td></tr></table>
            <br>
            :listIMG:
            :listRACKS:
			<br><br>
		';
        
		if ($Pop["IMG"] ?? null) {
			foreach($Pop["IMG"] as $j => $IMG) { 
				if (!$IMG["display"]) {
					unset($Pop["IMG"][$j]);
				}
			}

			if (count($Pop["IMG"]) > 0) {
				$arrTdImg = array();
				$arrTdDesc = array();
				foreach($Pop["IMG"] as $j => $IMG) {
					$colspan = (isset($Pop["IMG"][$j+1]) ? 1 : 2);
					$IMG_B64 = $PDF_output == "PDF" ? $IMG["FS"] : $IMG["URL"];
					$arrTdImg[] = '
						<td colspan="'.$colspan.'" class="text-center img-td col-6">
							<img src="'.$IMG_B64.'" style="max-width:250px;max-height:300px;">
						</td>';
					$arrTdDesc[] = '<td class="text-center legend-img-td" colspan="'.$colspan.'">'.$this->sanitizeQuillHTML($IMG["Descricao_RGPOPIMG"]).'</td>';
				}

				$iTr = 0;
				$jIMG = $jDesc = 0; 
				do {
					$imgTr = $arrTdImg[$jIMG++];
					if (isset($arrTdImg[$jIMG])) $imgTr .= $arrTdImg[$jIMG++];

					$descTr = $arrTdDesc[$jDesc++];
					if (isset($arrTdDesc[$jDesc])) $descTr .= $arrTdDesc[$jDesc++];

					$arrTrlistIMG[$iTr++] = '<table class="col-12 nb"><tr>'.$imgTr.'</tr><tr>'.$descTr.'</tr></table>';
				} while ($jIMG < count($arrTdImg));
			}
        }
        if ($arrTrlistIMG) { 
            $arrTrlistIMG = '<table style="page-break-inside: auto;" class="col-12 nb"><tr><td>'.implode('</td></tr><tr><td>', $arrTrlistIMG).'</td></tr></table>'; 
        } else { $arrTrlistIMG = null; }
        $listItens = strtr($listItens, [":listIMG:" => $arrTrlistIMG ?: null]);
        
        if ($Pop["RACKS"] ?? null) {
			foreach($Pop["RACKS"] as $j => $RACKS) { 
				if (!$RACKS["display"]) {
					unset($Pop["RACKS"][$j]);
				}
			}

			if (count($Pop["RACKS"]) > 0) {
                foreach($Pop["RACKS"] as $k => $RACKS) {
                    $arrTrlistIMGRACKS = array();
                    $arrTrlistRACKS .= '<h4 class="text-blue2 title2">'.$sumario["list"].'.'.($i+1).'.'.($k+1).'. '.$RACKS["Nom_Rack"].($RACKS["Nom_Operadora"] ? " - ".$RACKS["Nom_Operadora"] : null).'</h4>
						'.($RACKS["Descricao"] ? '<div class="quill-text">
							'.$this->sanitizeQuillHTML($RACKS["Descricao"]).'
						</div>' : null).'
                        :listIMGRACKS:
                    ';

                    foreach($RACKS["IMG"] as $j => $IMG) { 
                        if (!$IMG["display"]) {
                            unset($RACKS["IMG"][$j]);
                        }
                    }
        
                    if (count($RACKS["IMG"]) > 0) {
                        $arrTdImg = array();
                        $arrTdDesc = array();
                        foreach($RACKS["IMG"] as $j => $IMG) {
                            $colspan = (isset($RACKS["IMG"][$j+1]) ? 1 : 2);
                            $IMG_B64 = $PDF_output == "PDF" ? $IMG["FS"] : $IMG["URL"];
                            $arrTdImg[] = '
                                <td colspan="'.$colspan.'" class="text-center img-td col-6">
                                    <img src="'.$IMG_B64.'" style="max-width:250px;max-height:300px;">
                                </td>';
                            $arrTdDesc[] = '<td class="text-center legend-img-td" colspan="'.$colspan.'">a'.$this->sanitizeQuillHTML($IMG["Descricao_RGRacksIMG"]).'</td>';
                        }

                        $iTr = 0;
                        $jIMG = $jDesc = 0; 
                        do {
                            $imgTr = $arrTdImg[$jIMG++];
                            if (isset($arrTdImg[$jIMG])) $imgTr .= $arrTdImg[$jIMG++];

                            $descTr = $arrTdDesc[$jDesc++];
                            if (isset($arrTdDesc[$jDesc])) $descTr .= $arrTdDesc[$jDesc++];

                            $arrTrlistIMGRACKS[$iTr++] = '<table class="col-12 nb"><tr>'.$imgTr.'</tr><tr>'.$descTr.'</tr></table>';
                        } while ($jIMG < count($arrTdImg));
                    }
                    if ($arrTrlistIMGRACKS) { 
                        $arrTrlistIMGRACKS = '<table style="page-break-inside: auto;" class="col-12 nb"><tr><td>'.implode('</td></tr><tr><td>', $arrTrlistIMGRACKS).'</td></tr></table>'; 
                    } else { $arrTrlistIMGRACKS = null; }
                    $arrTrlistRACKS = strtr($arrTrlistRACKS, [":listIMGRACKS:" => $arrTrlistIMGRACKS ?: null]);
                }
			}
		}
        $listItens = strtr($listItens, [":listRACKS:" => $arrTrlistRACKS ?: null]);
    }
}

return strtr($html, [
	":listItens:" => $listItens
]);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_sobreAviso($fluxo=[], $sumario=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
return '
	<h4 id="'.$sumario["id"].'" class="text-blue2 title1">'.$sumario["list"].'. '.$sumario["title"].'</h4>
	<p>
		'.($fluxo["html"] ?? null).'
	</p>
';

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function PDF_sumario($fluxo=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$fluxo) return;

$sumario = []; 

$getID = function($arr){
	return sprintf(":%02d:", count($arr));
};

$i1 = 1;

if ($fluxo["objetivo"]["display"] ?? 0) {
    $sumario["objetivo"] = [
        "list" => $i1,
        "title" => $fluxo["objetivo"]["title"],
        "id" => $fluxo["objetivo"]["code"],
        "pgn" => $getID($sumario)
    ];
    $i1++;
}
if ($fluxo["descServicos"]["display"] ?? 0) {
    $sumario[$fluxo["descServicos"]["code"]] = [
        "list" => $i1,
        "title" => $fluxo["descServicos"]["title"],
        "id" => $fluxo["descServicos"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];
    $i1++;
}
if ($fluxo["docProjAbordagem"]["display"] ?? 0) {
    $sumario["docProjAbordagem"] = [
        "list" => $i1,
        "title" => $fluxo["docProjAbordagem"]["title"],
        "id" => $fluxo["docProjAbordagem"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];

    $i2 = 1;
    if ($fluxo["docProjAbordagem"]["child"]["poe"]["display"] ?? 0) {
        $sumario["poe"] = [
            "list" => "$i1.$i2",
            "title" => $fluxo["docProjAbordagem"]["child"]["poe"]["title"],
            "id" => $fluxo["docProjAbordagem"]["child"]["poe"]["code"] ?? null,
            "pgn" => $getID($sumario),
            "isSub" => true
        ];
    }
    $i2++;
    if ($fluxo["docProjAbordagem"]["child"]["pop"]["display"] ?? 0) {
        $sumario["pop"] = [
            "list" => "$i1.$i2",
            "title" => $fluxo["docProjAbordagem"]["child"]["pop"]["title"],
            "id" => $fluxo["docProjAbordagem"]["child"]["pop"]["code"] ?? null,
            "pgn" => $getID($sumario),
            "isSub" => true
        ];
    }
    $i2++;
    if ($fluxo["docProjAbordagem"]["child"]["antenario"]["display"] ?? 0) {
        $sumario["antenario"] = [
            "list" => "$i1.$i2",
            "title" => $fluxo["docProjAbordagem"]["child"]["antenario"]["title"],
            "id" => $fluxo["docProjAbordagem"]["child"]["antenario"]["code"] ?? null,
            "pgn" => $getID($sumario),
            "isSub" => true
        ];
    }
    $i1++;
}
if ($fluxo["inconformidades"]["display"] ?? 0) {
    $sumario["inconformidades"] = [
        "list" => $i1,
        "title" => $fluxo["inconformidades"]["title"],
        "id" => $fluxo["inconformidades"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];
    $i1++;
}
if ($fluxo["abordagemOperadoras"]["display"] ?? 0) {
    $sumario["abordagemOperadoras"] = [
        "list" => $i1,
        "title" => $fluxo["abordagemOperadoras"]["title"],
        "id" => $fluxo["abordagemOperadoras"]["code"] ?? null,
        "pgn" => $getID($sumario)
    ];
	
	$sumario["contratuais"] = [
        "list" => "$i1.1",
        "title" => $fluxo["abordagemOperadoras"]["childModel"]["contratuais"]["title"],
        "id" => "contratuais",
        "pgn" => $getID($sumario),
		"isSub" => true
    ];
	
	$sumario["inadimplencias"] = [
        "list" => "$i1.2",
        "title" => $fluxo["abordagemOperadoras"]["childModel"]["inadimplencias"]["title"],
        "id" => "inadimplencias",
        "pgn" => $getID($sumario),
		"isSub" => true
    ];
	
    $i1++;
}
if ($fluxo["ctrProjEspeciais"]["display"] ?? 0) {
    $sumario["ctrProjEspeciais"] = [
        "list" => $i1,
        "title" => $fluxo["ctrProjEspeciais"]["title"],
        "id" => $fluxo["ctrProjEspeciais"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
}       
if ($fluxo["ctrAgendTecnicos"]["display"] ?? 0) {
    $sumario["ctrAgendTecnicos"] = [
        "list" => $i1,
        "title" => $fluxo["ctrAgendTecnicos"]["title"],
        "id" => $fluxo["ctrAgendTecnicos"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
} 
if ($fluxo["opePreBloqueadas"]["display"] ?? 0) {
    $sumario["opePreBloqueadas"] = [
        "list" => $i1,
        "title" => $fluxo["opePreBloqueadas"]["title"],
        "id" => $fluxo["opePreBloqueadas"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
}
if ($fluxo["sobreAviso"]["display"] ?? 0) {
    $sumario["sobreAviso"] = [
        "list" => $i1,
        "title" => $fluxo["sobreAviso"]["title"],
        "id" => $fluxo["sobreAviso"]["code"] ?? null,
        "pgn" => $getID($sumario),
    ];
    $i1++;
}

$htmlSumarioTable = "";
foreach($sumario as $item) {
    $htmlSumarioTable .= '
        <tr class="'.($item["isSub"] ?? false ? "sub-indice" : "text-blue2").' indice-line">
            <td class="indice">
                <span class="list-indice">'.$item["list"].'.</span>
                <a href="#'.$item["id"].'">'.$item["title"].'</span>
            </td>
            <td class="number-indice">'.$item["pgn"].'</td>
        </tr>';
}

$html = '<div class="cap col-12">
	<h3 CLASS="text-blue1" style="border-bottom: 1px solid #aaa;margin-bottom:10px">ÍNDICE</h3>
	<br>
	<script type="text/php">
		$GLOBALS["sumario"] = $pdf->open_object();
		$GLOBALS["sumarioContent"] = json_decode(\''.json_encode($sumario).'\', true);
	</script>
	<style>
		.sumario {width:100% !important;}
		.sumario a {
			text-decoration: none;
		    color: inherit;
		}
		
		.indice-line td {
			font-size:12px;
			width:1px;
			padding-bottom:10px;
		}
		.list-indice {
    		/*display: inline-block;*/
    		padding-right: 10px;
    		width: 45px;
		}
		.indice {}
		.dotted-indice {
			width: auto !important;
			height: 1px;
		}
		.dotted-indice div {
		    width: 100%;
    		height: 10px;
    		border-bottom: 2px dotted;
		}
		.sub-indice .list-indice {
			padding-left:20px;
		}
		.number-indice {text-align:right;}
	</style>
	<table class="nb sumario">
		'.$htmlSumarioTable.'
	</table>
	<script type="text/php">
		$pdf->close_object();
	</script>
</div>';
return [$sumario,$html];


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function deleteRGAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;

$_RelatorioGerencial->delete();

$s->setIUDState("grid_Relatoriogerencial", "D", "success", "Relatório gerencial removido com sucesso");

$response =$this->response();

if ($_RelatorioGerencial->ok) {
	
$this->Audit("deleteRG", $thisRelatorioGerencial);
	
	$response->status = true;
	$response->code = "200";
	$response->msg = "Relatório gerencial removido";
	$response->redirect = "../grid_Relatoriogerencial";
$this->send($response);
} else {
	$response->status = false;
	$response->code = "200";
	$response->msg = "Não foi possível remover o relatório gerencial";
$this->send($response);
}

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function directive()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
?>
<script>
App["directive"]('poe', function($sce) {
    return {
        link: function(scope, element, attrs, ctr) {
            scope.poeQuill = typeof scope.poeQuill == "undefined" ? {IMG:Array()} : scope.poeQuill;
            setTimeout(function(){
                quill = "quill_poe"+scope.ipoe;
                scope.poeQuill.quill = initQuill(quill);
                scope.poeQuill.quill.root.innerHTML = scope.thisData.Descricao_RGPOE;
                scope.poeQuill.quill.on("text-change", function() {
                    scope.thisData.Descricao_RGPOE = scope.poeQuill.quill.root.innerHTML;
                });
                
                angular.forEach(scope.thisData.IMG, function(IMG, iIMG){
                    quill = "quill_poe_img"+IMG.ID_POEIMG;
                    scope.poeQuill.IMG[""+IMG.ID_POEIMG] = {};
                    scope.poeQuill.IMG[""+IMG.ID_POEIMG].quill = initQuill(quill);
                    scope.poeQuill.IMG[""+IMG.ID_POEIMG].quill.root.innerHTML = scope.thisData.IMG[""+iIMG].Descricao_RGPOEIMG;
                    scope.poeQuill.IMG[""+IMG.ID_POEIMG].quill.on("text-change", function() {
                        scope.thisData.IMG[""+iIMG].Descricao_RGPOEIMG =
                            scope.poeQuill.IMG[""+IMG.ID_POEIMG].quill.root.innerHTML;
                    });
                });
            }, 500);
            console.log(scope.thisData);
        },
        controllerAs: 'ctrPoe',
        controller: ['$scope', '$sce', function($scope, $sce){
            _self = this;
            $scope.thisData = $scope.fluxo.docProjAbordagem.child.poe.data[$scope.ipoe];                
            $scope.movePoe = function (iObj, sent) {
                $scope.fluxo.docProjAbordagem.child.poe.data.move(iObj, iObj + sent);
            }
            $scope.movePoeIMG = function (iObj, sent) {
                console.log($scope.thisData);
                $scope.thisData.IMG.move(iObj, iObj + sent);
            }
        }],
        template: `
            <hr>
            <label>Exibir 
                <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                ng-model="thisData.display" ng-checked="thisData.display"></label>
            <a class="btn btn-default" ng-click="movePoe(ipoe, 1)" 
                ng-class="{'disable-area': fluxo.docProjAbordagem.child.poe.data.isLast(ipoe)}"><i class="fa fa-level-down"></i></a>
            <a class="btn btn-default" ng-click="movePoe(ipoe, -1)"
                ng-class="{'disable-area': ipoe == 0}"><i class="fa fa-level-up"></i></a>
                %:poe.html[0]:% 
            <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                <div class="quill-editor" id="quill_poe%:ipoe:%"></div>
            </div>
            <div class="panel-group m-t-md" id="accordion_poe%:ipoe:%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion_poe%:ipoe:%" href="#img_poe_collapse%:ipoe:%" aria-expanded="false" class="collapsed">Imagens (%:thisData.IMG ? thisData.IMG.length : '0':%)</a>
                        </h5>
                    </div>
                    <div ng-if="thisData.IMG.length > 0" 
                        id="img_poe_collapse%:ipoe:%" class="panel-collapse collapse" aria-expanded="false" style=""
                        ng-class="{'disable-area':!thisData.display}">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md " 
                                    ng-repeat="(iIMG, IMG) in thisData.IMG">
                                <div class="col-lg-3 rg-img-item-div">
                                    <img src="%:IMG.URL:%" 
                                            class="rg-img-item" align="center" ng-click="showImage(IMG)"> 
                                </div>
                                <div class="col-lg-9">
                                    <label>Exibir 
                                        <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                                                ng-model="thisData.IMG[ iIMG].display" ng-checked="thisData.IMG[ iIMG].display">
                                    </label>
                                    <a class="btn btn-default" ng-click="movePoeIMG(iIMG, 1)"
                                        ng-class="{'disable-area': thisData.IMG.isLast(iIMG)}">
                                        <i class="fa fa-level-down"></i></a>
                                    <a class="btn btn-default" ng-click="movePoeIMG(iIMG, -1)"
                                        ng-class="{'disable-area': iIMG == 0}">
                                        <i class="fa fa-level-up"></i></a>
                                    <div class="m-t-sm">
                                        <div class="quill-editor" id="quill_poe_img%:IMG.ID_POEIMG:%" 
                                            ng-class="{'disable-area':!thisData.IMG[ iIMG].display}"></div>
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

App["directive"]('pop', function($sce) {
    return {
        link: function(scope, element, attrs, ctr) {
            scope.popQuill = typeof scope.popQuill == "undefined" ? {IMG:Array(),RACKS:Array()} : scope.popQuill;
            setTimeout(function(){
                quill = "quill_pop"+scope.ipop;
                scope.popQuill.quill = initQuill(quill);
                scope.popQuill.quill.root.innerHTML = scope.thisData.Descricao_RGPOP;
                scope.popQuill.quill.on("text-change", function() {
                    scope.thisData.Descricao_RGPOP = scope.popQuill.quill.root.innerHTML;
                });
            
                angular.forEach(scope.thisData.RACKS, function(RACKS, iRACKS){
                    quill = "quill_pop_racks"+RACKS.ID_Racks;
                    scope.popQuill.RACKS[""+RACKS.ID_Racks] = {};
                    scope.popQuill.RACKS[""+RACKS.ID_Racks].quill = initQuill(quill);
                    scope.popQuill.RACKS[""+RACKS.ID_Racks].quill.root.innerHTML = scope.thisData.RACKS[ iRACKS].Descricao;
                    scope.popQuill.RACKS[""+RACKS.ID_Racks].quill.on("text-change", function() {
                        scope.thisData.RACKS[ iRACKS].Descricao =
                            scope.popQuill.RACKS[""+RACKS.ID_Racks].quill.root.innerHTML;
                    });

                    angular.forEach(RACKS.IMG, function(IMG, iIMG){
                        quill = "quill_pop_racks_img"+IMG.ID_RacksIMG;
                        scope.popQuill.IMG[""+IMG.ID_RacksIMG] = {};
                        scope.popQuill.IMG[""+IMG.ID_RacksIMG].quill = initQuill(quill);
                        scope.popQuill.IMG[""+IMG.ID_RacksIMG].quill.root.innerHTML = scope.thisData.RACKS[ iRACKS].IMG[""+iIMG].Descricao_RGRacksIMG;
                        scope.popQuill.IMG[""+IMG.ID_RacksIMG].quill.on("text-change", function() {
                            scope.thisData.RACKS[ iRACKS].IMG[""+iIMG].Descricao_RGRacksIMG =
                                scope.popQuill.IMG[""+IMG.ID_RacksIMG].quill.root.innerHTML;
                        });
                    });
                });
            }, 500);
        },
        controllerAs: 'ctrPop',
        controller: ['$scope', '$sce', function($scope, $sce){
            _self = this;
            $scope.thisData = $scope.fluxo.docProjAbordagem.child.pop.data[$scope.ipop];
            $scope.movePop = function (iObj, sent) {
                $scope.fluxo.docProjAbordagem.child.pop.data.move(iObj, iObj + sent);
            }
            $scope.movePopIMG = function (iObj, sent) {
                $scope.thisData.IMG.move(iObj, iObj + sent);
            }
            $scope.moveRacks = function (iObj, sent) {
                $scope.fluxo.docProjAbordagem.child.pop.data[$scope.ipop].RACKS.move(iObj, iObj + sent);
            }
            $scope.moveRacksIMG = function (iRACKS, iObj, sent) {
                console.log(iRACKS, iObj, sent);
                $scope.thisData.RACKS[ iRACKS].IMG.move(iObj, iObj + sent);
            }
        }],
        template: `
            <hr>
            <label>Exibir 
                <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                ng-model="thisData.display"></label>
            <a class="btn btn-default" ng-click="movePop(ipop, 1)" 
                   ng-class="{'disable-area': fluxo.docProjAbordagem.child.pop.data.isLast(ipop)}"><i class="fa fa-level-down"></i></a>
            <a class="btn btn-default" ng-click="movePop(ipop, -1)"
                ng-class="{'disable-area': ipop == 0}"><i class="fa fa-level-up"></i></a>
                %:pop.title:%
            <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                <div class="quill-editor" id="quill_pop%:ipop:%"></div>
            </div>
            <div class="panel-group m-t-md" id="accordion_graph_pop%:ipop:%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_graph_pop%:ipop:%" 
                                href="#img_graph_pop_collapse%:ipop:%" aria-expanded="false" class="collapsed">Gráfico de uso</a>
                        </h5>
                    </div>
                    <div id="img_graph_pop_collapse%:ipop:%" class="panel-collapse collapse" aria-expanded="false"
                        ng-class="{'disable-area':!thisData.display||!thisData.graph}">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md text-center overflow-auto">
								<div class="graph-title"><span>UTILIZAÇÃO DA SALA POP/DG</span></div>
                                <img src="%:thisData.graph:%" class="cns-graph">
								<div class="legenda">
									<div>
										<span class="cube" style="background: #5cb85c;"></span>
										<span class="text-leg" style="">
											Disponível
										</span>
									</div>
									<div>
										<span class="cube" style="background: #0096d6"></span>
										<span class="text-leg">
											Em Uso
										</span>
									</div>
								</div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group m-t-md" id="accordion_pop%:ipop:%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_pop%:ipop:%" 
                                href="#img_pop_collapse%:ipop:%" aria-expanded="false" class="collapsed">RACKS (%:thisData.RACKS ? thisData.RACKS.length : '0':%)</a>
                        </h5>
                    </div>
                    <div ng-if="thisData.RACKS.length > 0"
                        id="img_pop_collapse%:ipop:%" class="panel-collapse collapse" aria-expanded="false">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div ng-repeat="(iRACKS, RACKS) in thisData.RACKS" ng-class="{'disable-area':!thisData.display}">
                                <label>Exibir 
                                    <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                                    ng-model="RACKS.display"></label>
                                <a class="btn btn-default" ng-click="moveRacks(iRACKS, 1)" 
                                    ng-class="{'disable-area': fluxo.docProjAbordagem.child.pop.data[ ipop].RACKS.isLast(iRACKS)}"><i class="fa fa-level-down"></i></a>
                                <a class="btn btn-default" ng-click="moveRacks(iRACKS, -1)"
                                    ng-class="{'disable-area': iRACKS == 0}"><i class="fa fa-level-up"></i></a>
                                %:RACKS.Nom_Rack:%%:RACKS.ID_Operadora ? " - "+RACKS.Nom_Operadora : "":%
                                <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                                    <div class="quill-editor" id="quill_pop_racks%:RACKS.ID_Racks:%"></div>
                                </div>
                                <div class="panel-group m-t-md" id="accordion_pop_racks%:RACKS.ID_Racks:%">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">
                                                <a data-toggle="collapse" 
                                                    data-parent="#accordion_pop_racks%:RACKS.ID_Racks:%" 
                                                    href="#img_pop_racks_collapse%:RACKS.ID_Racks:%" aria-expanded="false" class="collapsed">Imagens (%:RACKS.IMG ? RACKS.IMG.length : '0':%)</a>
                                            </h5>
                                        </div>
                                        <div ng-if="RACKS.IMG.length > 0"
                                            id="img_pop_racks_collapse%:RACKS.ID_Racks:%" class="panel-collapse collapse" aria-expanded="false"
                                            ng-class="{'disable-area':!RACKS.display}">
                                            <div class="panel-body" style="margin:0;width:100%">
                                                <div class="col-lg-12 m-t-md" 
                                                    ng-repeat="(iIMG, IMG) in RACKS.IMG">
                                                    <div class="col-lg-3 rg-img-item-div">
                                                        <img src="%:IMG.URL:%" 
                                                            class="rg-img-item" align="center" ng-click="showImage(IMG)"> 
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <label>Exibir 
                                                            <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                                                                ng-model="thisData.RACKS[ iRACKS].IMG[ iIMG].display">
                                                        </label>
                                                        <a class="btn btn-default" ng-click="moveRacksIMG(iRACKS, iIMG, 1)"
                                                        ng-class="{'disable-area': thisData.RACKS[ iRACKS].IMG.isLast(iIMG)}">
                                                            <i class="fa fa-level-down"></i></a>
                                                        <a class="btn btn-default" ng-click="moveRacksIMG(iRACKS, iIMG, -1)"
                                                        ng-class="{'disable-area': iIMG == 0}">
                                                            <i class="fa fa-level-up"></i></a>
                                                        <div class="m-t-sm">
                                                            <div class="quill-editor" id="quill_pop_racks_img%:IMG.ID_RacksIMG:%" 
                                                            ng-class="{'disable-area':!thisData.RACKS[ iRACKS].IMG[ iIMG].display}"></div>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `
    };
})

App["directive"]('antenario', function($sce) {
    return {
        link: function(scope, element, attrs, ctr) {
            scope.antenarioQuill = typeof scope.antenarioQuill == "undefined" ? {IMG:Array()} : scope.antenarioQuill;
            setTimeout(function(){
                quill = "quill_antenario"+scope.iantenario;
                scope.antenarioQuill.quill = initQuill(quill);
                scope.antenarioQuill.quill.root.innerHTML = scope.thisData.Descricao_RGAntenario;
                scope.antenarioQuill.quill.on("text-change", function() {
                    scope.thisData.Descricao_RGAntenario = scope.antenarioQuill.quill.root.innerHTML;
                });
                
                angular.forEach(scope.thisData.IMG, function(IMG, iIMG){
                    quill = "quill_antenario_img"+IMG.ID_AntenarioIMG;
                    scope.antenarioQuill.IMG[""+iIMG] = {};
                    scope.antenarioQuill.IMG[""+iIMG].quill = initQuill(quill);
                    scope.antenarioQuill.IMG[""+iIMG].quill.root.innerHTML = scope.thisData.IMG[""+iIMG].Descricao_RGAntenarioIMG;
                    scope.antenarioQuill.IMG[""+iIMG].quill.on("text-change", function() {
                        scope.thisData.IMG[""+iIMG].Descricao_RGAntenarioIMG =
                            scope.antenarioQuill.IMG[""+iIMG].quill.root.innerHTML;
                    });
                });
            }, 500);
            console.log(scope.thisData);
        },
        controllerAs: 'ctrAntenario',
        controller: ['$scope', '$sce', function($scope, $sce){
            _self = this;
            $scope.thisData = $scope.fluxo.docProjAbordagem.child.antenario.data[$scope.iantenario];
            $scope.moveAntenario = function (iObj, sent) {
                $scope.fluxo.docProjAbordagem.child.antenario.data.move(iObj, iObj + sent);
            }
            $scope.moveAntenarioIMG = function (iObj, sent) {
                $scope.thisData.IMG.move(iObj, iObj + sent);
            }
        }],
        template: `
            <hr>
            <label>Exibir 
                <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                ng-model="thisData.display"></label>
            <a class="btn btn-default" ng-click="moveAntenario(iantenario, 1)" 
                   ng-class="{'disable-area': fluxo.docProjAbordagem.child.antenario.data.isLast(iantenario)}"><i class="fa fa-level-down"></i></a>
            <a class="btn btn-default" ng-click="moveAntenario(iantenario, -1)"
                ng-class="{'disable-area': iantenario == 0}"><i class="fa fa-level-up"></i></a>
                %:antenario.title:%
            <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                <div class="quill-editor" id="quill_antenario%:iantenario:%"></div>
            </div>
            <div class="panel-group m-t-md" id="accordion_graph_antenario%:iantenario:%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_graph_antenario%:iantenario:%" 
                                href="#img_graph_antenario_collapse%:iantenario:%" aria-expanded="false" class="collapsed">Gráfico de uso</a>
                        </h5>
                    </div>
                    <div id="img_graph_antenario_collapse%:iantenario:%" class="panel-collapse collapse" aria-expanded="false"
                        ng-class="{'disable-area':!thisData.display||!thisData.graph}">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md text-center overflow-auto">
								<div class="graph-title"><span>UTILIZAÇÃO DO ANTENÁRIO</span></div>
                                <img src="%:thisData.graph:%" class="cns-graph">
								<div class="legenda">
									<div>
										<span class="cube" style="background: #5cb85c;"></span>
										<span class="text-leg" style="">
											Disponível
										</span>
									</div>
									<div>
										<span class="cube" style="background: #0096d6"></span>
										<span class="text-leg">
											Em Uso
										</span>
									</div>
								</div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-group m-t-md" id="accordion_antenario%:iantenario:%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_antenario%:iantenario:%" 
                                href="#img_antenario_collapse%:iantenario:%" aria-expanded="false" class="collapsed">Imagens (%:thisData.IMG ? thisData.IMG.length : '0':%)</a>
                        </h5>
                    </div>
                    <div ng-if="thisData.IMG.length > 0"
						id="img_antenario_collapse%:iantenario:%" class="panel-collapse collapse" aria-expanded="false" 
                        ng-class="{'disable-area':!thisData.display}">
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
                                               ng-model="thisData.IMG[ iIMG].display">
                                    </label>
                                    <a class="btn btn-default" ng-click="moveAntenarioIMG(iIMG, 1)"
                                       ng-class="{'disable-area': thisData.IMG.isLast(iIMG)}">
                                        <i class="fa fa-level-down"></i></a>
                                    <a class="btn btn-default" ng-click="moveAntenarioIMG(iIMG, -1)"
                                       ng-class="{'disable-area': iIMG == 0}">
                                        <i class="fa fa-level-up"></i></a>
                                    <div class="m-t-sm">
                                        <div class="quill-editor" id="quill_antenario_img%:IMG.ID_AntenarioIMG:%" 
                                         ng-class="{'disable-area':!thisData.IMG[ iIMG].display}"></div>
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

App["directive"]('inconformidade', function($sce) {
    return {
        link: function(scope, element, attrs, ctr) {
            scope.inconformidadeQuill = typeof scope.inconformidadeQuill == "undefined" ? {IMG:Array()} : scope.inconformidadeQuill;
            setTimeout(function(){                
                quill = "quill_inconformidade_descricao"+scope.iinconformidade;
                scope.inconformidadeQuill.quillDescricao = initQuill(quill);
                scope.inconformidadeQuill.quillDescricao.root.innerHTML = scope.thisData.Descricao_RGInconformidade;
                scope.inconformidadeQuill.quillDescricao.on("text-change", function() {
                    scope.thisData.Descricao_RGInconformidade = scope.inconformidadeQuill.quillDescricao.root.innerHTML;
                });

                quill = "quill_inconformidade_historico"+scope.iinconformidade;
                scope.inconformidadeQuill.quillHistorico = initQuill(quill);
                scope.inconformidadeQuill.quillHistorico.root.innerHTML = scope.thisData.Historico_RGInconformidade;
                scope.inconformidadeQuill.quillHistorico.on("text-change", function() {
                    scope.thisData.Historico_RGInconformidade = scope.inconformidadeQuill.quillHistorico.root.innerHTML;
                });

                angular.forEach(scope.thisData.IMG, function(IMG, iIMG){
                    quill = "quill_inconformidade_img"+IMG.ID_InconformidadeIMG;
                    scope.inconformidadeQuill.IMG[""+iIMG] = {};
                    scope.inconformidadeQuill.IMG[""+iIMG].quill = initQuill(quill);
                    scope.inconformidadeQuill.IMG[""+iIMG].quill.root.innerHTML = scope.thisData.IMG[""+iIMG].Descricao_RGInconformidadeIMG;
                    scope.inconformidadeQuill.IMG[""+iIMG].quill.on("text-change", function() {
                        scope.thisData.IMG[""+iIMG].Descricao_RGInconformidadeIMG =
                            scope.inconformidadeQuill.IMG[""+iIMG].quill.root.innerHTML;
						console.log(scope.thisData.IMG[""+iIMG].Descricao_RGInconformidadeIMG);
                    });
                });
            }, 500);
        },
        controllerAs: 'ctrInc',
        controller: ['$scope', '$sce', function($scope, $sce){
            _self = this;
            $scope.thisData = $scope.fluxo.inconformidades.data.list[$scope.iinconformidade];
            $scope.moveInconformidade = function (iObj, sent) {
                $scope.fluxo.inconformidades.data.list.move(iObj, iObj + sent);
            }
            $scope.moveInconformidadeIMG = function (iObj, sent) {
                $scope.thisData.IMG.move(iObj, iObj + sent);
            }
        }],
        template: `<hr>
            <label>Exibir 
                <input type="checkbox" ng-true-value="1" ng-false-value="0" 
                ng-model="thisData.display"></label>
            <a class="btn btn-default" ng-click="moveInconformidade(iinconformidade, 1)" 
                   ng-class="{'disable-area': fluxo.inconformidades.data.list.isLast(iinconformidade)}"><i class="fa fa-level-down"></i></a>
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
                <div class="quill-editor" id="quill_inconformidade_descricao%:iinconformidade:%"></div>
            </div>
            <div class="m-t-sm" ng-class="{'disable-area':!thisData.display}">
                <label>Histórico</label>
                <div class="quill-editor" id="quill_inconformidade_historico%:iinconformidade:%"></div>
            </div>
            <div class="panel-group m-t-md" id="accordion_inconformidade%:iinconformidade:%">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_inconformidade%:iinconformidade:%" 
                                href="#img_inconformidade_collapse%:iinconformidade:%" aria-expanded="false" class="collapsed">Imagens (%:thisData.IMG ? thisData.IMG.length : '0':%)</a>
                        </h5>
                    </div>
                    <div ng-if="thisData.IMG.length > 0"
					    id="img_inconformidade_collapse%:iinconformidade:%" class="panel-collapse collapse" aria-expanded="false"
                        ng-class="{'disable-area':!thisData.display}">
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
                                               ng-model="thisData.IMG[ iIMG].display">
                                    </label>
                                    <a class="btn btn-default" ng-click="moveInconformidadeIMG(iIMG, 1)"
                                       ng-class="{'disable-area': thisData.IMG.isLast(iIMG)}">
                                        <i class="fa fa-level-down"></i></a>
                                    <a class="btn btn-default" ng-click="moveInconformidadeIMG(iIMG, -1)"
                                       ng-class="{'disable-area': iIMG == 0}">
                                        <i class="fa fa-level-up"></i></a>
                                    <div class="m-t-sm">
                                        <div class="quill-editor" id="quill_inconformidade_img%:IMG.ID_InconformidadeIMG:%" 
                                         ng-class="{'disable-area':!thisData.IMG[ iIMG].display}"></div>
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

App["directive"]('abordagemOperadoras', function($sce) {
    return {
        link: function(scope, element, attrs) {},
		controllerAs: 'abOp',
        controller: ['$scope', '$sce', function($scope, $sce){
            _self = this;
            $scope.thisData = $scope.fluxo.abordagemOperadoras;
            $scope.OperadorasTags = {};
            $scope.TagsCached = {};
			$scope.searchTags = function (search, type)	 {
				httpConfig = {
					url : './?act=getTagsList',
					method : 'POST',
					data : {
						type : type,
						search : search
					},
					success : function (response) {
						if (typeof $scope.Tags == "undefined") $scope.Tags = {tratativa:Array(),inadimplencia:Array()};
						$scope.Tags[ type] = response.data.Tags;
                        if (!search) $scope.TagsCached[ type] = response.data.Tags;
					},
					failed : function (response) {},
				};
				$scope.http(httpConfig);
                angular.forEach($scope.TagsCached[ type], function (Tag, iTag) {
                    if (Tag.Conteudo.indexOf(search) >= 0 || !search) {
                        $scope.Tags[ type].push(Tag);
                    }
                });
			}
			$scope.cadTag = function (ID_Operadora, tag, type) {
				tag = tag && tag.trim() ? tag.trim() : null;
				if (!tag) return;
				saveInServer = $scope.addTag(ID_Operadora, tag, type);
				if (saveInServer) {
					httpConfig = {
						url : './?act=saveTag',
						method : 'POST',
						data : {
							type : type,
							tag : tag
						},success : function (response) {},
                        failed : function (response) {}
					};
				}
			}
			$scope.addTag = function(ID_Operadora, tag, type) {
				tag = tag && tag.trim() ? tag.trim() : null;
                if (typeof $scope.OperadorasTags[ ID_Operadora] == "undefined") $scope.OperadorasTags[ ID_Operadora] = {
                    contratuais:false,
                    inadimplencia:false
                };
				if (!tag) return;
				if (type == "tratativa") {
                    $scope.OperadorasTags[ ID_Operadora].contratuais = true;
					$scope.thisData.data.child.contratuais.content[ ID_Operadora].push({Conteudo:tag,ID:null,ID_Operadora:ID_Operadora});
					return true;
				} else if (type == "inadimplencia") {
                    $scope.OperadorasTags[ ID_Operadora].inadimplencia = true;
					$scope.thisData.data.child.inadimplencias.content[ ID_Operadora].push({Conteudo:tag,ID:null,ID_Operadora:ID_Operadora});
					return true;
				}
				return false;
			}
            $scope.removeOperadoraTag = function(ID_Operadora, type) {
                if (typeof $scope.OperadorasTags[ ID_Operadora] == "undefined") $scope.OperadorasTags[ ID_Operadora] = {
                    contratuais:false,
                    inadimplencia:false
                };
                if (type == "tratativa") {
                    angular.forEach($scope.thisData.data.child.contratuais.content[ ID_Operadora], function (tag, index) {
                        $scope.thisData.data.child.contratuais.content[ ID_Operadora][ index].deleted = true;
                    });
                    $scope.OperadorasTags[ ID_Operadora].contratuais = false;
				} else if (type == "inadimplencia") {
                    angular.forEach($scope.thisData.data.child.inadimplencias.content[ ID_Operadora], function (tag, index) {
                        $scope.thisData.data.child.inadimplencias.content[ ID_Operadora][ index].deleted = true;
                    });
                    $scope.OperadorasTags[ ID_Operadora].inadimplencia = false;
				}
                console.log($scope.OperadorasTags, $scope.thisData.data.child.contratuais.content[ ID_Operadora], $scope.thisData.data.child.inadimplencias.content[ ID_Operadora]);
            }
            $scope.getOperadorasList = function(search, type) {
                $scope.OperadorasList = Array();
                search = search.toLowerCase();
                angular.forEach($scope.thisData.data.Operadoras, function (Operadora, ID_Operadora) {
                    if (Operadora.Num_Status == 'S' && (
                            type == "tratativa" && (typeof $scope.OperadorasTags[ ID_Operadora] == "undefined" || !$scope.OperadorasTags[ ID_Operadora].contratuais) ||
                            type == "inadimplencia" && (typeof $scope.OperadorasTags[ ID_Operadora] == "undefined" || !$scope.OperadorasTags[ ID_Operadora].inadimplencia)
                        )) {
                        NomeOperadora = Operadora.NomeOperadora.toLowerCase();
                        if (NomeOperadora.indexOf(search) >= 0 || !search) {
                            $scope.OperadorasList.push(Operadora);
                        }
                    }
                });
            }
            $scope.addOperadoraTag = function(ID_Operadora, type) {
                if (!ID_Operadora) return false;
                if (typeof $scope.OperadorasTags[ ID_Operadora] == "undefined") $scope.OperadorasTags[ ID_Operadora] = {
                    contratuais:false,
                    inadimplencia:false
                };
                if (type == "tratativa") {
					if(typeof $scope.thisData.data.child.contratuais.content[ ID_Operadora] == "undefined")  $scope.thisData.data.child.contratuais.content[ ID_Operadora] = Array();
                    $scope.OperadorasTags[ ID_Operadora].contratuais = true;
					return true;
				} else if (type == "inadimplencia") {
					if(typeof $scope.thisData.data.child.inadimplencias.content[ ID_Operadora] == "undefined") $scope.thisData.data.child.inadimplencias.content[ ID_Operadora] = Array();
                    $scope.OperadorasTags[ ID_Operadora].inadimplencia = true;
					return true;
				}
            }
            $scope.typeof = function ($mixed) {
                return typeof $mixed;
            }
        }],
        template: `
        <hr>      
            <span ng-bind-html="thisData.data.html[0] |trusted"></span>
			<div class="m-t-sm m-b-sm overflow-auto">
				<table class='table-abordagem-operadoras table table-hover table-bordered' style='font-size:13px'>
					<thead>
						<tr>
							<td style='width:16.6%'>EMRPESA</td>
							<td style='width:200px'>VIGÊNCIA</td>
							<td style='width:16.6%'>EQUIPAMENTO</td>
							<td style='width:16.6%'>VALOR</td>
							<td style='width:16.6%'>INÍCIO DE PAGAMENTO</td>
							<td style='width:16.6%'>STATUS</td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat='PSA in thisData.data.dataTable.PSA'>
							<td>%:PSA.NomeOperadora:%</td>
							<td>
								INÍCIO: %:PSA.InicioVigencia |date: 'dd/MM/yyyy':%<br>
							    FINAL: %:PSA.FimVigencia |date: 'dd/MM/yyyy':%</td>
							<td>%:PSA.Nom_ParentEquipamento:% - %:PSA.Nom_Equipamento:%</td>
							<td>%:PSA.Valor_Contrato_Anterior |currency:"R$ ":2 |formatCurrency :%<br>
                            %:PSA.Valor_Contrato |currency:"R$ ":2 |formatCurrency:%</td>
							<td>
                                <input class="form-control input-hide-not-hover" 
										ng-model="fluxo.abordagemOperadoras.data.dataTable.PSA[$index].InicioPagamento" placeholder="__/__/____" 
										datetime="dd/MM/yyyy" datetime-model="yyyy-MM-dd">
                                <input class="form-control input-hide-not-hover"
										ng-model="PSA.Observacoes" maxlength="500" placeholder="Observaçoes...">
                            </td>
							<td><input class="form-control input-hide-not-hover"
										ng-model="PSA.Status" maxlength="50" placeholder="Digite aqui o status..."></td>
						</tr>
                        <tr ng-if="!thisData.data.dataTable.PSA.length">
                            <td colspan="6" style='text-align:center'>
                                Não há registros para serem exibidos
                            </td>
                        </tr>
						<tr>
							<td colspan='6' style='text-align:center'>TOTAL ARRECADADO DAS OPERADORAS</td>
						</tr>
						<tr>
							<td colspan='6' style='text-align:center'>%:thisData.data.dataTable.totalArrecadado |currency:"R$ ":2 |formatCurrency:%</td>
						</tr>
					</tbody>
				</table>
			</div>
			<span ng-bind-html="thisData.data.html[1] |trusted"></span>
			<div class="panel-group m-t-md" id="accordion_graph_ceuo"
                 ng-class="{'disable-area':!thisData.display||!thisData.data.graph}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_graph_ceuo"
                                href="#img_graph_ceuo" aria-expanded="false" class="collapsed">COMPARATIVO DE VALORES C.E.U.O</a>
                        </h5>
                    </div>
                    <div id="img_graph_ceuo" class="panel-collapse collapse" aria-expanded="false" style="">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md text-center overflow-auto">
								<div class="graph-title"><span>COMPARATIVO DE VALORES C.E.U.O</span></div>
                                <img src="%:thisData.data.graph:%" class="cns-graph">
								<div class="legenda">
									<div>
										<span class="cube" style="background: #61a9f3;"></span>
										<span class="text-leg" style="">
											Valor Atual
										</span>
									</div>
									<div>
										<span class="cube" style="background: #9fcefd"></span>
										<span class="text-leg">
											Valor Anterior
										</span>
									</div>
								</div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
			<div class="m-t-md overflow-auto">
				<hr>
				<h4 ng-bind-html="thisData.data.child.contratuais.title |trusted"></h4>
                <div>
                    <button ng-disabled="!abOp.addOperadoraContratuais" class="scButton_default" 
                            ng-click="addOperadoraTag(abOp.addOperadoraContratuais.ID_Operadora, 'tratativa');
                                abOp.addOperadoraContratuais=null" 
                            style="width:160px">Adicionar Operadora</button>
                    <ui-select ng-model="abOp.addOperadoraContratuais" style="width:calc(100% - 165px);display:inline-block">
                        <ui-select-match placeholder="Buscar Operadoras">%:$select.selected.NomeOperadora:%</ui-select-match>
                        <ui-select-choices refresh-delay="0" refresh="getOperadorasList($select.search, 'tratativa')" repeat="Operadora in OperadorasList">
                            <span>%:Operadora.NomeOperadora:%</span>
                        </ui-select-choices>
                        <ui-select-no-choice>
                            Não foi encontrado operadoras disponíveis para adicionar.
                        </ui-select-no-choice>
                    </ui-select>
                </div>
                <div ng-repeat="(ID_Operadora, tagsList) in thisData.data.child.contratuais.content track by $index" ng-if="typeof(OperadorasTags[ ID_Operadora].contratuais) == 'undefined' || OperadorasTags[ ID_Operadora].contratuais">
                    <div style="width:40px;display:inline-block" ng-style="{'opacity':tagsList ? 1 : 0.7}">
                        <i class="fa fa-trash tags-remove" aria-hidden="true" ng-click="removeOperadoraTag(ID_Operadora, 'tratativa')"></i>
                    </div>
                    <h5 ng-bind-html="thisData.data.Operadoras[ ID_Operadora].NomeOperadora |trusted" style="display:inline-block"></h5>
                    <div>
                        <button ng-disabled="!abOp.addTagTratativa[ ID_Operadora]" class="scButton_default" 
                                ng-click="addTag(ID_Operadora, abOp.addTagTratativa[ ID_Operadora].Conteudo, 'tratativa');abOp.addTagTratativa[ ID_Operadora]=null" 
                                style="width:140px">Adicionar tag</button>
                        <ui-select ng-model="abOp.addTagTratativa[ ID_Operadora]" style="width:calc(100% - 145px);display:inline-grid">
                            <ui-select-match placeholder="Buscar tags">%:$select.selected.Conteudo:%</ui-select-match>
                            <ui-select-choices refresh-delay="0" refresh="abOp.searchingTag[ ID_Operadora] = true; searchTags($select.search, 'tratativa')" repeat="tags in Tags.tratativa">
                                <span>%:tags.Conteudo:%</span>
                            </ui-select-choices>
                            <ui-select-no-choice>
                                <div class="col-lg-12 scButton_default" ng-if="$select.search" ng-click="cadTag(ID_Operadora, $select.search, 'tratativa');$select.search=null;abOp.addTagTratativa=null">
                                    Não foi encontrado tag para <b>%:$select.search:%</b>. Deseja cadastra-la?
                                </div>
                            </ui-select-no-choice>
                        </ui-select>
                    </div>
                    <div ng-repeat="(key, tag) in tagsList" ng-if="!tag.deleted">
                        <div style="width:40px;display:inline-block">
                            <i class="fa fa-trash tags-remove" aria-hidden="true"
                                ng-click="thisData.data.child.contratuais.content[ ID_Operadora][ key].deleted = true"></i>
                        </div>
                        <div style="width:calc(100% - 50px);display:inline-block">
                            <input class="form-control input-hide-not-hover" style="width:100%;display:inline-block" 
                                ng-model="thisData.data.child.contratuais.content[ ID_Operadora][ key].Conteudo" type="text" maxlength="1000">
                        </div>
                    </div>
                </div>
				<hr>
				<h4 ng-bind-html="thisData.data.child.inadimplencias.title |trusted"></h4>
                <div>
                    <button ng-disabled="!abOp.addOperadoraInadimplencias" class="scButton_default" 
                            ng-click="addOperadoraTag(abOp.addOperadoraInadimplencias.ID_Operadora, 'inadimplencia');
                                abOp.addOperadoraInadimplencias=null" 
                            style="width:160px">Adicionar Operadora</button>
                    <ui-select ng-model="abOp.addOperadoraInadimplencias" style="width:calc(100% - 165px);display:inline-block">
                        <ui-select-match placeholder="Buscar Operadoras">%:$select.selected.NomeOperadora:%</ui-select-match>
                        <ui-select-choices refresh-delay="0" refresh="getOperadorasList($select.search, 'inadimplencia')" repeat="Operadora in OperadorasList">
                            <span>%:Operadora.NomeOperadora:%</span>
                        </ui-select-choices>
                        <ui-select-no-choice>
                            Não foi encontrado operadoras disponíveis para adicionar.
                        </ui-select-no-choice>
                    </ui-select>
                </div>
                <div ng-repeat="(ID_Operadora, tagsList) in thisData.data.child.inadimplencias.content track by $index" ng-if="typeof(tagsList) != 'undefined' && (typeof(OperadorasTags[ ID_Operadora].inadimplencia) == 'undefined' || OperadorasTags[ ID_Operadora].inadimplencia)">
                    <div style="width:40px;display:inline-block" ng-style="{'opacity':tagsList ? 1 : 0.7}">
                        <i class="fa fa-trash tags-remove" aria-hidden="true" ng-click="removeOperadoraTag(ID_Operadora, 'inadimplencia')"></i>
                    </div>
                    <h5 ng-bind-html="thisData.data.Operadoras[ ID_Operadora].NomeOperadora |trusted" style="display:inline-block"></h5>
                    <div>
                        <button ng-disabled="!abOp.addTagInadimplencia[ ID_Operadora]" class="scButton_default" 
                                ng-click="addTag(ID_Operadora, abOp.addTagInadimplencia[ ID_Operadora].Conteudo, 'inadimplencia');abOp.addTagInadimplencia[ ID_Operadora]=null" 
                                style="width:140px">Adicionar tag</button>
                        <ui-select ng-model="abOp.addTagInadimplencia[ ID_Operadora]" style="width:calc(100% - 145px);display:inline-grid">
                            <ui-select-match placeholder="Buscar tags">%:$select.selected.Conteudo:%</ui-select-match>
                            <ui-select-choices refresh-delay="0" refresh="searchTags($select.search, 'inadimplencia')" repeat="tags in Tags.inadimplencia">
                                <span>%:tags.Conteudo:%</span>
                            </ui-select-choices>
                            <ui-select-no-choice>
                                <div class="col-lg-12 scButton_default" ng-if="$select.search" ng-click="cadTag(ID_Operadora, $select.search, 'inadimplencia');$select.search=null;abOp.addTagTratativa=null">
                                    Não foi encontrado tag para <b>%:$select.search:%</b>. Deseja cadastra-la?
                                </div>
                            </ui-select-no-choice>
                        </ui-select>
                    </div>
                    <div ng-repeat="(key, tag) in tagsList" ng-if="!tag.deleted">
                        <div style="width:40px;display:inline-block">
                            <i class="fa fa-trash tags-remove" aria-hidden="true"
                                ng-click="thisData.data.child.inadimplencias.content[ ID_Operadora][ key].deleted = true"></i>
                        </div>
                        <div style="width:calc(100% - 50px);display:inline-block">
                            <input class="form-control input-hide-not-hover" style="width:100%;display:inline-block" 
                                ng-model="thisData.data.child.inadimplencias.content[ ID_Operadora][ key].Conteudo" type="text" maxlength="1000">
                        </div>
                    </div>
                </div>
			</div>
        `
    };
});

App["directive"]('ctrProjEspeciais', function($sce) {
    return {
        link: function(scope, element, attrs) {},
		controllerAs: 'ctrPrEs',
        controller: ['$scope', '$sce', function($scope, $sce){}],
        template: `
            <hr>
            <span ng-bind-html="fluxo.ctrProjEspeciais.data.html[0] |trusted"></span>
            <div class="m-t-md m-b-sm overflow-auto">
                <table class='table table-hover table-bordered' style='font-size:13px'>
					<thead>
						<tr>
							<td width='20%'>NÚMERO DE CONTROLE</td>
							<td width='20%'>DATA DE APROVAÇÃO</td>
							<td width='20%'>CONDÔMINO</td>
							<td width='20%'>OPERADORA</td>
							<td width='20%'>PRESTADORA DE SERVIÇO</td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat='Projetos in fluxo.ctrProjEspeciais.data.dataTable'>
							 <td width='20%'>%:Projetos.ProtocoloHex:%</td>
							 <td width='20%'>%:Projetos.DataAprovacao |replace:' ':'T' |date: 'dd/MM/yyyy HH:mm':%</td>
							 <td width='20%'>%:Projetos.Nom_Condomino || '-' :%</td>
							 <td width='20%'>%:Projetos.Nom_Operadora || '-' :%</td>
							 <td width='20%'>%:Projetos.Nom_Prestadora || '-' :%</td>
						</tr>
                        <tr ng-if="!fluxo.ctrProjEspeciais.data.dataTable.length">
                            <td colspan="6" style='text-align:center'>
                                Não há registros para serem exibidos
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="5">
                                    <span ng-if="fluxo.ctrProjEspeciais.data.dataTable.length > 0" ng-bind-html="fluxo.ctrProjEspeciais.data.html[3] 
                                        |replace:'#QTDProjetos#':fluxo.ctrProjEspeciais.data.dataTable.length |trusted"></span> 
                                    <span ng-if="fluxo.ctrProjEspeciais.data.dataTable.length == 0" 
                                        ng-bind-html="fluxo.ctrProjEspeciais.data.html[4]
                                        |replace:'#RGINICIOVIGENCIA#':fluxo.ctrProjEspeciais.data.tagsVal['#RGINICIOVIGENCIA_dmY#'] 
                                        |replace:'#RGFIMVIGENCIA#':fluxo.ctrProjEspeciais.data.tagsVal['#RGFIMVIGENCIA_dmY#'] |trusted"></span> 
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="panel-group m-t-md" id="accordion_graph_projespeciais"
                 ng-class="{'disable-area':!fluxo.ctrProjEspeciais.display||!fluxo.ctrProjEspeciais.data.graph}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_graph_projespeciais"
                                href="#img_graph_projespeciais" aria-expanded="false" class="collapsed">Colaborativo anual de projetos</a>
                        </h5>
                    </div>
                    <div id="img_graph_projespeciais" class="panel-collapse collapse" aria-expanded="false" style="">
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md text-center overflow-auto">
								<div class="graph-title" style="margin-bottom:0px"><span>COMPARATIVO ANUAL DE PROJETOS</span></div>
                                <img src="%:fluxo.ctrProjEspeciais.data.graph:%" class="cns-graph">
								<div class="legenda">
									<div>
										<span class="cube" style="background: #9fcefd"></span>
										<span class="text-leg">
											Projetos
										</span>
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

App["directive"]('ctrAgendTecnicos', function($sce) {
    return {
        link: function(scope, element, attrs) {},
		controllerAs: 'ctrAgTe',
        controller: ['$scope', '$sce', function($scope, $sce){}],
        template: `
            <hr>      
            <div class="m-t-md m-b-sm overflow-auto">
                <table class='table table-hover table-bordered' style='font-size:13px'>
					<thead>
						<tr>
							<td width='16.6%'>DATA</td>
							<td width='16.6%'>HORÁRIO</td>
							<td width='16.6%'>DESCRIÇÃO</td>
							<td width='16.6%'>OPERADORA</td>
							<td width='16.6%'>PRESTADORA DE SERVIÇO</td>
							<td width='16.6%'>CLIENTE</td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat='SAE in fluxo.ctrAgendTecnicos.data.dataTable'>
							 <td width='20%'>%:SAE.Data_Inicio |date: 'dd/MM/yyyy':%</td>
							 <td width='20%'>
								 %:SAE.Data_Inicio+'T'+SAE.Hora_Inicio |date: 'dd/MM/yyyy HH:mm':%<br>
								 %:SAE.Data_Fim+'T'+SAE.Hora_Fim |date: 'dd/MM/yyyy HH:mm':%
							</td>
							<td width='20%'>%:SAE.TipoSAE:%</td>
							<td width='20%'>%:SAE.Nom_Operadora || '-' :%</td>
							<td width='20%'>%:SAE.Nom_Prestadora || '-' :%</td>
							<td width='20%'>%:SAE.Nom_Condomino || '-' :%</td>
						</tr>
                        <tr ng-if="!fluxo.ctrAgendTecnicos.data.dataTable.length">
                            <td colspan="6" style='text-align:center'>
                                Não há registros para serem exibidos
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">
                            	<span ng-if="fluxo.ctrAgendTecnicos.data.dataTable.length > 0" 
									ng-bind-html="fluxo.ctrAgendTecnicos.data.html[2] 
									|replace:'#QTDSae#':fluxo.ctrAgendTecnicos.data.dataTable.length
									|replace:'#RGINICIOVIGENCIA#':fluxo.ctrAgendTecnicos.data.tagsVal['#RGINICIOVIGENCIA_dmY#'] 
                                    |replace:'#RGFIMVIGENCIA#':fluxo.ctrAgendTecnicos.data.tagsVal['#RGFIMVIGENCIA_dmY#'] |trusted"></span> 
                            	<span ng-if="fluxo.ctrAgendTecnicos.data.dataTable.length == 0" 
                                    ng-bind-html="fluxo.ctrAgendTecnicos.data.html[3] 
                                    |replace:'#RGINICIOVIGENCIA#':fluxo.ctrAgendTecnicos.data.tagsVal['#RGINICIOVIGENCIA_dmY#'] 
                                    |replace:'#RGFIMVIGENCIA#':fluxo.ctrAgendTecnicos.data.tagsVal['#RGFIMVIGENCIA_dmY#'] |trusted"></span> 
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="panel-group m-t-md" id="accordion_graph_agendtec"
                 ng-class="{'disable-area':!fluxo.ctrAgendTecnicos.display||!fluxo.ctrAgendTecnicos.data.graph}">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" 
                                data-parent="#accordion_graph_agendtec"
                                href="#img_graph_agendtec" aria-expanded="false" class="collapsed">Colaborativo anual de agendamentos</a>
                        </h5>
                    </div>
                    <div id="img_graph_agendtec" class="panel-collapse collapse" aria-expanded="false" >
                        <div class="panel-body" style="margin:0;width:100%">
                            <div class="col-lg-12 m-t-md text-center overflow-auto">
								<div class="graph-title" style="margin-bottom:0px"><span>COMPARATIVO ANUAL DE AGENDAMENTOS TÉCNICOS</span></div>
                                <img src="%:fluxo.ctrAgendTecnicos.data.graph:%" class="cns-graph">
								<div class="legenda">
									<div>
										<span class="cube" style="background: #9fcefd"></span>
										<span class="text-leg">
											Agendamentos
										</span>
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

App["directive"]('opePreBloqueadas', function($sce) {
    return {
        link: function(scope, element, attrs) {},
		controllerAs: 'ctrAgTe',
        controller: ['$scope', '$sce', function($scope, $sce){}],
        template: `
            <hr>      
            <div class="m-t-md m-b-sm overflow-auto">
                <table class='table table-hover table-bordered' style='font-size:13px'>
					<thead>
						<tr>
							<td width='25%'>OPERADORA / PRESTADORA</td>
							<td width='25%'>DESCRIÇÃO</td>
							<td width='25%'>DATA DE BLOQUEIO</td>
							<td width='25%'>PROTOCOLO DE INCONFORMIDADE</td>
						</tr>
					</thead>
					<tbody>
						<tr ng-repeat='Bloqueio in fluxo.opePreBloqueadas.data.dataTable'>
                            <td>%:Bloqueio.Nom_OpePre:%</td>
                            <td>%:Bloqueio.Descricao:%</td>
                            <td>%:Bloqueio.DataBloqueio |replace:' ':'T' |date: 'dd/MM/yyyy HH:mm':%</td>
                            <td>%:Bloqueio.Protocolo || '-':%</td>
						</tr>
                        <tr ng-if="!fluxo.opePreBloqueadas.data.dataTable.length">
                            <td colspan="6" style='text-align:center'>
                                Não há registros para serem exibidos
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        `
    };
});

</script>
<?php


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function downloadPDFAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $thisRelatorioGerencial;
global $_RelatorioGerencial;
global $path_doc;

if (!$this->isReadyPDF()) die();

$ID_Empreendimento = $thisRelatorioGerencial->ID_Empreendimento;
$filename = realpath("$path_doc/../emp_$ID_Empreendimento").DIRECTORY_SEPARATOR."RG".DIRECTORY_SEPARATOR.$thisRelatorioGerencial->GeracaoPDF;


header('Content-Description: File Transfer');
header('Content-Disposition: inline; filename="'.$thisRelatorioGerencial->GeracaoPDF.'"');
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Expires: 0');
readfile($filename);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genGraphAgendTec($SAEs=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$SAEs) $SAEs = array();

sc_include_library('sys', 'Jpgraph', 'src/jpgraph.php');
sc_include_library('sys', 'Jpgraph', 'src/jpgraph_line.php');

$mesLabel = [
	"01" => "Janeiro",
	"02" => "Fevereiro",
	"03" => "Março",
	"04" => "Abril",
	"05" => "Maio",
	"06" => "Junho",
	"07" => "Julho",
	"08" => "Agosto",
	"09" => "Setembro",
	"10" => "Outubro",
	"11" => "Novembro",
	"12" => "Dezembro"
];
$datax = array('');
$datay = array(null);
foreach(range(11,0,1) as $mes) {
	$nMes = date("m", strtotime("-$mes month"));
	$Y = date("Y", strtotime("-$mes month"));
	$datax[] = $mesLabel[$nMes]."($Y)";
	$indexDatay = count($datay);
	$datay[$indexDatay] = 0;
	foreach($SAEs as $i => $SAE) {
		if ($nMes == date("m", strtotime($SAE["Data_Fechamento"]))) {
			$datay[$indexDatay]++;
		}
	}
}
$datay[] = null;
$datax[] = '';

$graph = new Graph(1200,1200);
$graph->SetScale("textint");
$graph->SetMargin(1,1,1,1);
$graph->SetTheme(new UniversalTheme);

$graph->img->SetAntiAliasing(true);

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->SetFont(FF_ARIAL,FS_BOLD, 20);
	
$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetLabelAngle(45);
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_BOLD, 20);

$p1 = new LinePlot($datay);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetWeight(4);
$p1->value->SetFormat('%d'); 
$p1->value->SetColor('#222222'); 
$p1->value->SetFont(FF_ARIAL,FS_BOLD, 20);
$p1->value->Show(); 

ob_start();
$graph->Stroke();
$img = ob_get_contents();
ob_clean();

return "data:image/png;base64,".base64_encode($img);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genGraphAntenario($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
sc_include_library('sys', 'Jpgraph', 'src/jpgraph.php');
sc_include_library('sys', 'Jpgraph', 'src/jpgraph_bar.php');

if (!$data) return null;
if (!isset($data["Capacidade"]) || !isset($data["Ocupacao"])) return null;

$percOcupacao = $data["Capacidade"] ? (($data["Ocupacao"] * 100)/$data["Capacidade"]) : 0;
$data1y=array($percOcupacao);
$data2y=array(100 - $percOcupacao);
 
$graph = new Graph(1200,400,'auto');
$graph->SetScale('textint', 0, 100);

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->Set90AndMargin(150,120,1,70);
 
$graph->xaxis->SetTickLabels(["Utilização"]);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,20);
$graph->xaxis->SetLabelAlign('right','center');

$graph->yaxis->scale->ticks->Set(10); 
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,20);
$graph->yaxis->SetLabelAlign('center', 'bottom');
$graph->yaxis->SetLabelFormatString('%d%%'); 
$graph->yaxis->SetLabelMargin(-360);

$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);

$gbplot = new AccBarPlot(array($b1plot, $b2plot));

$graph->Add($gbplot);

$b1plot->value->Show(); 
$b1plot->SetColor("white");
$b1plot->SetFillColor("#0096d6");
$b1plot->SetValuePos("center");
$b1plot->value->SetFormat('%01.1f%%'); 
$b1plot->value->SetColor('white');  
$b1plot->value->SetFont(FF_ARIAL,FS_BOLD, 20);

$b2plot->value->Show();
$b2plot->SetColor("white");
$b2plot->SetFillColor("#5cb85c");
$b2plot->SetValuePos("center");
$b2plot->value->SetFormat('%01.1f%%'); 
$b2plot->value->SetColor('white'); 
$b2plot->value->SetFont(FF_ARIAL,FS_BOLD, 20);


$graph->title->SetFont(FF_ARIAL,FS_BOLD,20);
$graph->title->SetMargin(0);

ob_start();
$graph->Stroke();
$img = ob_get_contents();
ob_clean();

return "data:image/png;base64,".base64_encode($img);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genGraphCEUO($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$data) return;

sc_include_library('sys', 'Jpgraph', 'src/jpgraph.php');
sc_include_library('sys', 'Jpgraph', 'src/jpgraph_bar.php');

$listAll = $listOperadora = $listValueAtual = $listValueAnterior = array();
foreach($data as $PSA) {
	if (!isset($listAll[$PSA["NomeOperadora"]])) $listAll[$PSA["NomeOperadora"]] = ["Atual" => 0, "Anterior" => 0];
	$listAll[$PSA["NomeOperadora"]]["Atual"] += $PSA["Valor_Contrato"];
	$listAll[$PSA["NomeOperadora"]]["Anterior"] += $PSA["Valor_Contrato_Anterior"];
}

if (!$listAll) return;

foreach($listAll as $Operadora => $val) {
	$Operadora = $Operadora;
	$parts = preg_split('/ +/', $Operadora);
	foreach($parts as $i => $part) {
		if ($i && $i % 2) {
			$parts[$i] = $parts[$i]."\n";
		} else $parts[$i] = $parts[$i]." ";
	 }
	 $Operadora = implode('', $parts);
	
	$listOperadora[] = $Operadora;
	$listValueAtual[] = $val["Atual"];
	$listValueAnterior[] = $val["Anterior"];
}

$datax=$listOperadora;

$graph = new Graph(1200,count($datax)*120+80,'auto');
$maxListValueAtual = max($listValueAtual) ?: 100;
$maxListValueAnterior = max($listValueAnterior) ?: 100;
$maxListValue = $maxListValueAtual > $maxListValueAnterior ? $maxListValueAtual : $maxListValueAnterior;
$graph->SetScale("textint", 0, $maxListValue+$maxListValue/5);

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->Set90AndMargin(350,10,1,30);

$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL, 18);

$rangeSetTickPosition = range(0, $maxListValue, intval($maxListValue/5));
$graph->yaxis->SetTickPositions($rangeSetTickPosition, $rangeSetTickPosition);
$graph->yaxis->SetTickSide(SIDE_RIGHT);
$graph->yaxis->SetLabelMargin(-1*count($datax)*120-70);
$graph->yaxis->SetFont(FF_ARIAL,FS_BOLD, 16);
$graph->yaxis->SetLabelFormatCallback(function($aLabel) { 
	return "R$".number_format($aLabel, 2, ',', ''); 
}); 

$b1plot = new BarPlot($listValueAtual);

$b2plot = new BarPlot($listValueAnterior);

$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
$graph->Add($gbplot);

$b1plot->SetFillColor('#61a9f3'); 
$b1plot->SetColor("white");
$b1plot->SetWeight(0);
$b1plot->SetWidth(30);
$b1plot->value->SetAlign('center', 'center'); 
$b1plot->value->SetFormat('R$ %01.2f'); 
$b1plot->value->SetFormatCallback(function($aLabel) { 
	return "R$".number_format($aLabel, 2, ',', ''); 
}); 
$b1plot->value->SetColor('#222');  
$b1plot->value->SetFont(FF_ARIAL,FS_BOLD, 16);
$b1plot->value->Show();

$b2plot->SetFillColor('#9fcefd'); 
$b2plot->SetColor("white");
$b2plot->SetWeight(0);
$b2plot->SetWidth(30);
$b2plot->value->SetAlign('center', 'center'); 
$b2plot->value->SetFormat('R$ %01.2f'); 
$b2plot->value->SetFormatCallback(function($aLabel) { 
	return "R$".number_format($aLabel, 2, ',', ''); 
}); 
$b2plot->value->SetColor('#222');  
$b2plot->value->SetFont(FF_ARIAL,FS_BOLD, 16);
$b2plot->value->Show();


$graph->title->SetFont(FF_ARIAL,FS_BOLD,20);
$graph->title->SetMargin(0);

ob_start();
$graph->Stroke();
$img = ob_get_contents();
ob_clean();

return "data:image/png;base64,".base64_encode($img);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genGraphPOP($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
sc_include_library('sys', 'Jpgraph', 'src/jpgraph.php');
sc_include_library('sys', 'Jpgraph', 'src/jpgraph_bar.php');

if (!$data) return null;
if (!isset($data["Capacidade"]) || !isset($data["Ocupacao"])) return null;

$percOcupacao = $data["Capacidade"] ? (($data["Ocupacao"] * 100)/$data["Capacidade"]) : 0;
$data1y=array($percOcupacao);
$data2y=array(100 - $percOcupacao);
 
$graph = new Graph(1200,400,'auto');
$graph->SetScale('textint', 0, 100);
$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);
$graph->Set90AndMargin(150,120,10,70);
 
$graph->xaxis->SetTickLabels(["Utilização"]);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,20);
$graph->xaxis->SetLabelAlign('right','center');

$graph->yaxis->scale->ticks->Set(10); 
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,20);
$graph->yaxis->SetLabelAlign('center', 'bottom');
$graph->yaxis->SetLabelFormatString('%d%%'); 
$graph->yaxis->SetLabelMargin(-360);


$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);

$gbplot = new AccBarPlot(array($b1plot, $b2plot));

$graph->Add($gbplot);

$b1plot->value->Show(); 
$b1plot->SetColor("white");
$b1plot->SetFillColor("#0096d6");
$b1plot->SetValuePos("center");
$b1plot->value->SetFormat('%01.1f%%'); 
$b1plot->value->SetColor('white');  
$b1plot->value->SetFont(FF_ARIAL,FS_BOLD, 20);

$b2plot->value->Show();
$b2plot->SetColor("white");
$b2plot->SetFillColor("#5cb85c");
$b2plot->SetValuePos("center");
$b2plot->value->SetFormat('%01.1f%%'); 
$b2plot->value->SetColor('white'); 
$b2plot->value->SetFont(FF_ARIAL,FS_BOLD, 20);


$graph->title->SetFont(FF_ARIAL,FS_BOLD,20);
$graph->title->SetMargin(0);

ob_start();
$graph->Stroke();
$img = ob_get_contents();
ob_clean();

return "data:image/png;base64,".base64_encode($img);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genGraphProjInst($Projetos=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$Projetos) $Projetos = array();

sc_include_library('sys', 'Jpgraph', 'src/jpgraph.php');
sc_include_library('sys', 'Jpgraph', 'src/jpgraph_line.php');

$mesLabel = [
	"01" => "Janeiro",
	"02" => "Fevereiro",
	"03" => "Março",
	"04" => "Abril",
	"05" => "Maio",
	"06" => "Junho",
	"07" => "Julho",
	"08" => "Agosto",
	"09" => "Setembro",
	"10" => "Outubro",
	"11" => "Novembro",
	"12" => "Dezembro"
];
$datax = array('');
$datay = array(null);
foreach(range(11,0,1) as $mes) {
	$nMes = date("m", strtotime("-$mes month"));
	$Y = date("Y", strtotime("-$mes month"));
	$datax[] = $mesLabel[$nMes]."($Y)";
	$indexDatay = count($datay);
	$datay[$indexDatay] = 0;
	foreach($Projetos as $i => $Projeto) {
		if ($nMes == date("m", strtotime($Projeto["DataAprovacao"]))) {
			$datay[$indexDatay]++;
		}
	}
}
$datay[] = null;
$datax[] = '';

$graph = new Graph(1200,1200);
$graph->SetScale("textint");
$graph->SetMargin(1,1,1,1);
$graph->SetTheme(new UniversalTheme);


$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->SetFont(FF_ARIAL,FS_BOLD, 20);
$graph->yaxis->scale->SetGrace(5);
	
$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetLabelAngle(45);
$graph->xaxis->SetTickLabels($datax);
$graph->xgrid->SetColor('#E3E3E3');
$graph->xaxis->SetFont(FF_ARIAL,FS_BOLD, 20);

$p1 = new LinePlot($datay);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetWeight(4);
$p1->value->SetFormat('%d'); 
$p1->value->SetColor('#222222'); 
$p1->value->SetFont(FF_ARIAL,FS_BOLD, 20);
$p1->value->Show(); 

ob_start();
$graph->Stroke();
$img = ob_get_contents();
ob_clean();

return "data:image/png;base64,".base64_encode($img);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genPDF($typeResponse="preview")
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	

$GLOBALS["PDF_output"] = "PDF";

$fluxo =$this->getDataAllItens();

sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'dompdf', 'dompdf.php');
$options = getOptionDompdf();
$options->set('defaultFont', 'Arial');
$dompdf = getDompdfObj($options);

list($sumarioContent, $sumario) =$this->PDF_sumario($fluxo);
$html = '
	<html>
		<head>
			<meta name="author" content="CNSDATA | GLOBALBLUE">
			<meta name="subject" content="Relatorio Gerencial  '.$thisRelatorioGerencial->DataInicioVigencia.' - '.$thisRelatorioGerencial->DataFimVigencia.'  '.($_RelatorioGerencial->getEmpreendimento()["Nom_Empreendimento"] ?? null).'">
			'.mountCSS(15, 15, 15, 25).'
			'.$this->PDF_css().'
		</head>
		<style>
			.headerHtml2 {position: fixed; top: 0px;}
		</style>
		<body>
			<!-- CAPA -->
			<div class="page-break-after" id="capa">
				'.$this->PDF_Capa().'
			</div>
			<div class="headerHtml2" style="z-index:-1"><img src="../_lib/img/sys__NM__img__NM__GB_lg.png" style="height:291mm; margin-left:20px; margin-top:3mm"></div>
			<div class="headerHtml">
				<table class="col-12" style="border:none">
					<tr>
						<td class="col-6 nb" colspan="6"><img src="../_lib/img/sys__NM__img__NM__GLOBALBLUE.png" style="width:400px"></td>
						<td class="col-6 nb text-center text-gray" colspan="6"><b>EXEMPLAR EXCLUSIVO</b><br> É PROIBIDA A REPRODUÇÃO TOTAL<br>OU PARCIAL DO CONTEÚDO<br>SEM PRÉVIA AUTORIZAÇÃO</td>
					</tr>
				</table>
			</div>
			<div class="footerHtml">
				<table class="rodape2 col-12">
					<tbody>
						<tr>
							<td>
								'.$this->Ini->Nm_lang['lang_label_footer_pdfpas'].'
								<span class="pagenum"></span>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
			<!-- SUMARIO -->
			<div class="page-break-after" id="sumario">
				'.$sumario.'
			</div>
			
			'.(isset($sumarioContent["objetivo"]) ? '
			<!-- objetivo -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["objetivo"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_objetivo($fluxo["objetivo"]["data"], $sumarioContent["objetivo"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["descServicos"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["descServicos"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_descServicos($fluxo["descServicos"]["data"], $sumarioContent["descServicos"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["docProjAbordagem"]) && (
				isset($sumarioContent["pop"]) || isset($sumarioContent["poe"]) || isset($sumarioContent["antenario"])
			) ? '
			<!-- docProjAbordagem -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["docProjAbordagem"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_docProjAbordagem($fluxo["docProjAbordagem"], $sumarioContent).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["inconformidades"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["inconformidades"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_inconformidades($fluxo["inconformidades"]["data"], $sumarioContent["inconformidades"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["abordagemOperadoras"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["abordagemOperadoras"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_abordagemOperadoras($fluxo["abordagemOperadoras"]["data"], $sumarioContent).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["ctrProjEspeciais"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["ctrProjEspeciais"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_ctrProjEspeciais($fluxo["ctrProjEspeciais"]["data"], $sumarioContent["ctrProjEspeciais"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["ctrAgendTecnicos"]) ? '
			<!-- ctrAgendTecnicos -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["ctrAgendTecnicos"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_ctrAgendTecnicos($fluxo["ctrAgendTecnicos"]["data"], $sumarioContent["ctrAgendTecnicos"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["opePreBloqueadas"]) ? '
			<!-- opePreBloqueadas -->
			<div class="page-break-after">
				<script type="text/php">
					$GLOBALS["sumarioContent"]["opePreBloqueadas"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_opePreBloqueadas($fluxo["opePreBloqueadas"]["data"], $sumarioContent["opePreBloqueadas"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["sobreAviso"]) ? '
			<!-- sobreAviso -->
			<div>
				<script type="text/php">
					$GLOBALS["sumarioContent"]["sobreAviso"]["pnum"] = $pdf->get_page_number();
				</script>
				'.$this->PDF_sobreAviso($fluxo["sobreAviso"]["data"], $sumarioContent["sobreAviso"]).'
			</div>
			' : null).'
			
			<script type="text/php">
				foreach ($GLOBALS["sumarioContent"] as $c) {
					$pdf->get_cpdf()->objects[$GLOBALS["sumario"]]["c"] = 
						preg_replace("/".$c["pgn"]."/", ($c["pnum"] ?? null), $pdf->get_cpdf()->objects[$GLOBALS["sumario"]]["c"]);
				}	
				$pdf->page_script(\'
					if ($PAGE_NUM == 2) {
						$pdf->add_object($GLOBALS["sumario"],"add");
						$pdf->stop_object($GLOBALS["sumario"]);
					} 
				\');
			</script>
		</body>
	<html>
';

	


$dompdf->add_info('Title', 'Relatório gerencial');
$dompdf->add_info('Author', 'CNSDATA | GLOBALBLUE');
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

switch($typeResponse) {
	case("preview"):
		echo $html;
	break;
	case("download"):
		$dompdf->stream("download.pdf");
	break;
	case("savetmp"):
		$output = $dompdf->output();		
		$tmpfname = sys_get_temp_dir()."/".uniqid().".pdf";
		file_put_contents($tmpfname, $output);
		return $tmpfname;
	break;
}



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genPDF4ViewAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	
global $path_doc;

if ($thisRelatorioGerencial->Num_Status == "C") {
	$ID_Empreendimento = $thisRelatorioGerencial->ID_Empreendimento;
	$ID = $thisRelatorioGerencial->ID;
	$VI = date("Ymd", strtotime($thisRelatorioGerencial->DataInicioVigencia));
	$VF = date("Ymd", strtotime($thisRelatorioGerencial->DataFimVigencia));
	$dir = realpath("$path_doc/../emp_$ID_Empreendimento").DIRECTORY_SEPARATOR."RG";
	$filename = "n".$ID."_".$VI."_".$VF.".pdf";
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


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genPDFBackendAction($sendResponse=1)
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;
global $path_doc;
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

sc_include_library("sys", "Shell", "Shell.php");
$Shell = new Shell();
sc_include_library("sys", "models", "Config.php");
$_Config = new Config($this);

$token = $_Config->getByKey("cli::Token");


$dir_genPDFBackend = $_RelatorioGerencial->dir_genPDFBackend;

$response =$this->response();

if ($_GET["cli"] ?? 0) {
	try {
		$tmpPDF =$this->genPDF("savetmp");
		if (file_exists($tmpPDF)) {
			$ID_Empreendimento = $thisRelatorioGerencial->ID_Empreendimento;
			$ID = $thisRelatorioGerencial->ID;
			$VI = date("Ymd", strtotime($thisRelatorioGerencial->DataInicioVigencia));
			$VF = date("Ymd", strtotime($thisRelatorioGerencial->DataFimVigencia));
			$newDir = realpath("$path_doc/../emp_$ID_Empreendimento").DIRECTORY_SEPARATOR."RG";
			if (!file_exists($newDir)) {
				mkdir($newDir);
			}
			$filename = "n".$ID."_".$VI."_".$VF.".pdf";
			$newDir = $newDir.DIRECTORY_SEPARATOR.$filename;
			$rename = rename($tmpPDF, $newDir);
			$copy = $rename ? null : copy($tmpPDF, $newDir);
			if (file_exists($newDir) && ($rename || $copy)) {
				$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
					"GeracaoPDF" => $filename
				]);
				
				$thisRelatorioGerencial->GeracaoPDF = $filename;
			$this->Audit("finishExportPDF", $thisRelatorioGerencial);
				
				$response->status = true;
				$response->msg = "Relatório gerencial gerado com sucesso";
			$this->send($response);
			}
		}
		$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
			"GeracaoPDF" => "ERROR"
		]);
		$response->status = false;
		$response->msg = "Não foi possível gerar o relatório gerencial";
	$this->send($response);
	} catch(Exception $e) {
		$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
			"GeracaoPDF" => "ERROR"
		]);
		print_r($e);
		print_r($_RelatorioGerencial->DbError, $_RelatorioGerencial->strQuery);
	}
} else {
	if ($this->isGeneringPDF()) {
		$response->status = true;
		$response->msg = "O processo já está rodando";
		if ($sendResponse)$this->send($response);
		else return $response;
	}
	
	$data = [
		"RG_ID" => $thisRelatorioGerencial->ID,
		"token" => $token
	];
	$URL = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"]."/../?act=genPDFBackend&cli=1&RG_ID=".$data["RG_ID"]."&token=".$data["token"];
	$Shell->setCmd("php \"$dir_genPDFBackend\" \"$URL\" \"".base64_encode(json_encode($data))."\"");
	
	$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
		"GeracaoPDF" => date('Y-m-d H:i:s')
	]);
	
	
	$thisRelatorioGerencial->dataExport = $data;
	$thisRelatorioGerencial->GeracaoPDF = date('Y-m-d H:i:s');
	$thisRelatorioGerencial->dataExport["URL"] = $URL;
$this->Audit("initExportPDF", $thisRelatorioGerencial);
	
	$response->status = true;
	if ($_GET["sync"] ?? 0) {
		$response->data = $Shell->run();
	} else {
		$response->data = $Shell->ASrun();
	}
	if ($sendResponse)$this->send($response);
	else return $response;
}

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genPDFPreviewHTML()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	

$GLOBALS["PDF_output"] = "HTML";

$fluxo =$this->getDataAllItens();

sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'dompdf', 'dompdf.php');

header('Content-type: text/html');

list($sumarioContent, $sumario) =$this->PDFPreview_sumario($fluxo);

$html = '
	<html>
		<head>
			<meta name="author" content="CNSDATA | GLOBALBLUE">
			<meta name="subject" content="Relatorio Gerencial  '.$thisRelatorioGerencial->DataInicioVigencia.' - '.$thisRelatorioGerencial->DataFimVigencia.'  '.($_RelatorioGerencial->getEmpreendimento()["Nom_Empreendimento"] ?? null).'">
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
			<!-- CAPA -->
			<div class="page-break-after" id="capa">
				'.$this->PDFPreview_Capa().'
			</div>
			
			<div class="headerHtml" style="margin-top: 10mm;">
				<table class="col-12" style="border:none">
					<tr>
						<td class="col-6 nb" colspan="6"><img src="../_lib/img/sys__NM__img__NM__GLOBALBLUE.png" style="width:400px"></td>
						<td class="col-6 nb text-center text-gray" colspan="6"><b>EXEMPLAR EXCLUSIVO</b><br> É PROIBIDA A REPRODUÇÃO TOTAL<br>OU PARCIAL DO CONTEÚDO<br>SEM PRÉVIA AUTORIZAÇÃO</td>
					</tr>
				</table>
			</div>
			
			<!-- SUMARIO -->
			<div class="page-break-after" id="sumario">
				'.$sumario.'
			</div>
			
			'.(isset($sumarioContent["objetivo"]) ? '
			<!-- objetivo -->
			<div class="page-break-after">
				'.$this->PDF_objetivo($fluxo["objetivo"]["data"], $sumarioContent["objetivo"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["descServicos"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				'.$this->PDF_descServicos($fluxo["descServicos"]["data"], $sumarioContent["descServicos"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["docProjAbordagem"]) && (
				isset($sumarioContent["pop"]) || isset($sumarioContent["poe"]) || isset($sumarioContent["antenario"])
			) ? '
			<!-- docProjAbordagem -->
			<div class="page-break-after">
				'.$this->PDF_docProjAbordagem($fluxo["docProjAbordagem"], $sumarioContent).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["inconformidades"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				'.$this->PDF_inconformidades($fluxo["inconformidades"]["data"], $sumarioContent["inconformidades"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["abordagemOperadoras"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				'.$this->PDF_abordagemOperadoras($fluxo["abordagemOperadoras"]["data"], $sumarioContent).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["ctrProjEspeciais"]) ? '
			<!-- descServicos -->
			<div class="page-break-after">
				'.$this->PDF_ctrProjEspeciais($fluxo["ctrProjEspeciais"]["data"], $sumarioContent["ctrProjEspeciais"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["ctrAgendTecnicos"]) ? '
			<!-- ctrAgendTecnicos -->
			<div class="page-break-after">
				'.$this->PDF_ctrAgendTecnicos($fluxo["ctrAgendTecnicos"]["data"], $sumarioContent["ctrAgendTecnicos"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["opePreBloqueadas"]) ? '
			<!-- opePreBloqueadas -->
			<div class="page-break-after">
				'.$this->PDF_opePreBloqueadas($fluxo["opePreBloqueadas"]["data"], $sumarioContent["opePreBloqueadas"]).'
			</div>
			' : null).'
			
			'.(isset($sumarioContent["sobreAviso"]) ? '
			<!-- sobreAviso -->
			<div>
				'.$this->PDF_sobreAviso($fluxo["sobreAviso"]["data"], $sumarioContent["sobreAviso"]).'
			</div>
			' : null).'
			<br><br>
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

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genTableAbordagemOperadoras($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$data) return;
if (!$data["PSA"]) return;

$html = "<table class='table-abordagem-operadoras'>";

$html .= "
<thead>
    <tr>
        <td width='16.6%'>EMRPESA</td>
        <td width='16.6%'>VIGÊNCIA</td>
        <td width='16.6%'>EQUIPAMENTO</td>
        <td width='16.6%'>VALOR</td>
        <td width='16.6%'>INÍCIO DE PAGAMENTO</td>
        <td width='16.6%'>STATUS</td>
    </tr>
</thead>
<tbody>";

foreach($data["PSA"] as $row) {
		$row = (object)$row;
        $html .= "
		<tr>	
			<td width='16.6%'>".$row->NomeOperadora."</td>
			<td width='16.6%'>INÍCIO: ".date("d/m/Y", strtotime($row->InicioVigencia))."<BR>FINAL: ".date("d/m/Y", strtotime($row->FimVigencia))."</td>
			<td width='16.6%'>".$row->Nom_ParentEquipamento." - ".$row->Nom_Equipamento."</td>
			<td width='16.6%'>".$row->Valor_Contrato."</td>
			<td width='16.6%'>".date("d/m/Y", strtotime($row->InicioPagamento))."</td>	
			<td width='16.6%'>".$row->Status."</td>
		</tr>
	";
}

$html .= "
        <tr>
            <td colspan='6' style='text-align:center'>TOTAL ARRECADADO DAS OPERADORAS</td>
        </tr>
        <tr>
            <td colspan='6' style='text-align:center'>R$ ".$data["totalArrecadado"]."</td>
        </tr>
    </tbody>
</table>";

return $html;



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function genTableAbordagemOperadorasView($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$data) return;
if (!$data["PSA"]) return;

$html = "<table class='table-abordagem-operadoras table table-hover table-bordered' style='font-size:13px'>
<thead>
    <tr>
        <td width='16.6%'>EMRPESA</td>
        <td width='16.6%'>VIGÊNCIA</td>
        <td width='16.6%'>EQUIPAMENTO</td>
        <td width='16.6%'>VALOR</td>
        <td width='16.6%'>INÍCIO DE PAGAMENTO</td>
        <td width='16.6%'>STATUS</td>
    </tr>
</thead>
<tbody>
	<tr ng-repeat='PSA in fluxo.abordagemOperadoras.data.dataTable.PSA'>
		 <td width='16.6%'>%:PSA.NomeOperadora:%</td>
         <td width='16.6%'>INÍCIO: %:PSA.InicioVigencia:%<BR>FINAL: %:PSA.FimVigencia:%</td>
         <td width='16.6%'>%:PSA.Nom_ParentEquipamento:% - %:PSA.Nom_Equipamento:%</td>
         <td width='16.6%'>%:PSA.Valor_Contrato:%</td>
         <td width='16.6%'>%:PSA.InicioPagamento:%</td>
         <td width='16.6%'>%:PSA.Status:%</td>
	</tr>
      	<tr>
            <td colspan='6' style='text-align:center'>TOTAL ARRECADADO DAS OPERADORAS</td>
        </tr>
        <tr>
            <td colspan='6' style='text-align:center'>R$ %:fluxo.abordagemOperadoras.data.dataTable.totalArrecadado:%</td>
        </tr>
    </tbody>
</table>";

return $html;



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getB64IMGLogoGB()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
return "data:image/png;base64,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";

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getBase64Img($path="")
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
if (!$path) return null;

if (file_exists($path)) return 'data:'.mime_content_type($path).';base64,'.base64_encode(file_get_contents($path));
else return null;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getDataAllItens()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	

$fluxo = $_RelatorioGerencial->_RGFluxo->getFluxo();

if ($thisRelatorioGerencial->Num_Status == "R") {
	$thisRelatorioGerencial->Config = $_RelatorioGerencial->lastRelatorioGerencial->Config;
}


foreach($fluxo as $code => $item) {
    switch($code) {
        case("objetivo"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
			if($fluxo[$code]["data"]) $fluxo[$code]["data"]["html"] = strtr($fluxo[$code]["data"]["html"], $fluxo[$code]["data"]["tagsVal"]);
        break;
        case("descServicos"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
			if($fluxo[$code]["data"]) $fluxo[$code]["data"]["html"] = strtr($fluxo[$code]["data"]["html"], $fluxo[$code]["data"]["tagsVal"]);
        break;
        case("docProjAbordagem"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
		
            $fluxo[$code]["child"]["poe"]["display"] = $thisRelatorioGerencial->Config[$code]["poe"]["display"] ?? 1;
			$fluxo[$code]["child"]["poe"]["data"] =$this->getFluxoContent("poe");
			if ($fluxo[$code]["child"]["poe"]["data"]) foreach($fluxo[$code]["child"]["poe"]["data"] as $i => $Poe) {
				$fluxo[$code]["child"]["poe"]["data"][$i]["html"][0] = strtr($Poe["html"][0], $Poe["tagsVal"]);
			}
		
            $fluxo[$code]["child"]["pop"]["display"] = $thisRelatorioGerencial->Config[$code]["pop"]["display"] ?? 1;
			$fluxo[$code]["child"]["pop"]["data"] =$this->getFluxoContent("pop");
			if ($fluxo[$code]["child"]["pop"]["data"]) foreach($fluxo[$code]["child"]["pop"]["data"] as $i => $Pop) {
				$fluxo[$code]["child"]["pop"]["data"][$i]["html"] = strtr($Pop["html"], $Pop["tagsVal"]);
				$fluxo[$code]["child"]["pop"]["data"][$i]["title"] = strtr($Pop["title"], $Pop["tagsVal"]);
			}

            $fluxo[$code]["child"]["antenario"]["display"] = $thisRelatorioGerencial->Config[$code]["antenario"]["display"] ?? 1;
			$fluxo[$code]["child"]["antenario"]["data"] =$this->getFluxoContent("antenario");
			if ($fluxo[$code]["child"]["antenario"]["data"]) foreach($fluxo[$code]["child"]["antenario"]["data"] as $i => $Antenario) {
				$fluxo[$code]["child"]["antenario"]["data"][$i]["html"] = strtr($Antenario["html"], $Antenario["tagsVal"]);
				$fluxo[$code]["child"]["antenario"]["data"][$i]["title"] = strtr($Antenario["title"], $Antenario["tagsVal"]);
			}

        break;
        case("inconformidades"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
			if ($fluxo[$code]["data"]) foreach($fluxo[$code]["data"]["list"] as $i => $Inconformidade) {
				$fluxo[$code]["data"]["list"][$i]["html"] = strtr($Inconformidade["html"], $Inconformidade["tagsVal"]);
				$fluxo[$code]["data"]["list"][$i]["title"] = strtr($Inconformidade["title"], $Inconformidade["tagsVal"]);
			}
        break;
        case("abordagemOperadoras"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
        break;
        case("ctrProjEspeciais"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
        break;
		case("opePreBloqueadas"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
        break;
        case("ctrAgendTecnicos"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
        break;
        case("sobreAviso"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
			$fluxo[$code]["data"] =$this->getFluxoContent($code);
        break;
    }
}

return $fluxo;



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getFluxoContent($codeFluxo="")
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;

switch ($codeFluxo) {
    case("objetivo"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$content = [
			"html" => $fluxo->content,
			"tagsVal" => [
				"#RG_InicioVigencia#" => date("d/m/Y", strtotime($thisRelatorioGerencial->DataInicioVigencia)),
				"#RG_FimVigencia#" => date("d/m/Y", strtotime($thisRelatorioGerencial->DataFimVigencia)),
				"#RG_Empreendimento_Nome#" => $_RelatorioGerencial->getEmpreendimento()["Nom_Empreendimento"],
			]
		];
		return $content;
    break;
    case("descServicos"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$content = [
			"html" => $fluxo->content,
			"tagsVal" => [
				"#RG_Empreendimento_Nome#" => $_RelatorioGerencial->getEmpreendimento()["Nom_Empreendimento"],
			]
		];
		return $content;
    break;
    case("docProjAbordagem"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
    break;
    case("inconformidades"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$listInconformidades = [
			"html" => $fluxo->content,
			"list" => $_RelatorioGerencial->getInconformidades()
		];
		if ($listInconformidades["list"]) {
			foreach($listInconformidades["list"] as $i => $Inconformidade) {
				if ($Inconformidade["IMG"]) {
					foreach($Inconformidade["IMG"] as $j => $IMG) {
						$listInconformidades["list"][$i]["IMG"][$j]["URL"] =$this->mountPathImg(
							$thisRelatorioGerencial->ID_Empreendimento,
							"inconformidades",
							$Inconformidade["ID_Inconformidade"],
							$IMG["File_Name"]
						);
						$listInconformidades["list"][$i]["IMG"][$j]["FS"] =$this->mountPathImg(
							$thisRelatorioGerencial->ID_Empreendimento,
							"inconformidades",
							$Inconformidade["ID_Inconformidade"],
							$IMG["File_Name"], "FS"
						);
						$listInconformidades["list"][$i]["IMG"][$j]["display"] = 
							$thisRelatorioGerencial->Config["inconformidades"][$Inconformidade["ID_Inconformidade"]]["IMG"][$IMG["ID_InconformidadeIMG"]]["display"] ?? 1;
						$listInconformidades["list"][$i]["IMG"][$j]["ordem"] = $IMG["ordem"] ?: $j;
					}
				}
				switch($Inconformidade["Num_Status_Inconformidade"]) {
					case("espera"): $listInconformidades["list"][$i]["Num_Status_Text_Inconformidade"] = "Em Espera"; break;
					case("aguardando_resposta"): $listInconformidades["list"][$i]["Num_Status_Text_Inconformidade"] = "Aguardando Resposta"; break;
					case("andamento"): $listInconformidades["list"][$i]["Num_Status_Text_Inconformidade"] = "Andamento"; break;
					case("concluido"): $listInconformidades["list"][$i]["Num_Status_Text_Inconformidade"] = "Concluído"; break;
					case("bloqueado"): $listInconformidades["list"][$i]["Num_Status_Text_Inconformidade"] = "Bloqueado"; break;
					default: $listInconformidades["list"][$i]["Num_Status_Text_Inconformidade"] = null; break;
				}
				
				$listInconformidades["list"][$i]["ordem"] = $Inconformidade["ordem"] ?: $i;
				$listInconformidades["list"][$i]["display"] = 
					$thisRelatorioGerencial->Config["inconformidades"][$Inconformidade["ID_Inconformidade"]]["display"] ?? 1;
				$listInconformidades["list"][$i]["title"] = $fluxo->childModel["title"];
				$listInconformidades["list"][$i]["html"] = $fluxo->childModel["content"];
				
				$listInconformidades["list"][$i]["tagsVal"] = [
					"#INCONFORMIDADE_OPERADORA#" => $Inconformidade["NomeAgente"],
					"#INCONFORMIDADE_DESCRICAO#" => $Inconformidade["Descricao_RGInconformidade"],
					"#INCONFORMIDADE_HISTORICO#" => $Inconformidade["Historico_RGInconformidade"],
					"#FOTOS#" => null,
				];
			}
		}
	
		return $listInconformidades;
    break;
    case("abordagemOperadoras"):
        $fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
        $bordagemOperadoras = $_RelatorioGerencial->getAbordagemOperadoras();
        $Tags = $_RelatorioGerencial->getTags();
		$Operadoras = $_RelatorioGerencial->getOperadorasToTags();
        $content = [
            "html" => $fluxo->content,
            "dataTable" => $bordagemOperadoras,
			"tagsVal" => [
                "#TABELA_PROJETO_ABORDAGEM_APROVADOS#" => null,
                "#GRAFICO_CEUO#" => null
            ],
            "child" => $fluxo->childModel,
            "teste" =>$this->genTableAbordagemOperadoras($bordagemOperadoras),
			"graph" =>$this->genGraphCEUO($bordagemOperadoras["PSA"]),
			"Operadoras" => $Operadoras
        ];
        $content["child"]["contratuais"]["content"] = $Tags["tratativa"];
        $content["child"]["inadimplencias"]["content"] = $Tags["inadimplencia"];

		return $content;
    break;
    case("ctrProjEspeciais"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$dataTable = $_RelatorioGerencial->ctrProjEspeciais();
		$dataProjCompartivoAnual = $_RelatorioGerencial->projComparativoAnual();
		$content = [
			"html" => $fluxo->content,
			"dataTable" => $dataTable,
			"dataProjCompartivoAnual" => $dataProjCompartivoAnual,
			"graph" =>$this->genGraphProjInst($dataProjCompartivoAnual),
			"tagsVal" => [
				"#TABELA_PROJETO_INSTALACAO_APROVADOS#" => null,
				"#GRAFICO_PROJETO_INSTALACAO_APROVADOS_ANUAL#" => null,
				"#RGINICIOVIGENCIA#" => $thisRelatorioGerencial->DataInicioVigencia,
				"#RGINICIOVIGENCIA_dmY#" => date('d/m/Y', strtotime($thisRelatorioGerencial->DataInicioVigencia)),
				"#RGFIMVIGENCIA#" => $thisRelatorioGerencial->DataFimVigencia,
				"#RGFIMVIGENCIA_dmY#" => date('d/m/Y', strtotime($thisRelatorioGerencial->DataFimVigencia)),
			]
		];
		return $content;
    break;
    case("ctrAgendTecnicos"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$dataTable = $_RelatorioGerencial->ctrAgendTecnicos();
		$dataAgendTecnicosComparativoAnual = $_RelatorioGerencial->agendTecnicosComparativoAnual();
		$content = [
			"html" => $fluxo->content,
			"dataTable" => $dataTable,
			"dataProjCompartivoAnual" => $dataAgendTecnicosComparativoAnual,
			"graph" =>$this->genGraphAgendTec($dataAgendTecnicosComparativoAnual),
			"sql" => [$_RelatorioGerencial->DbError, $_RelatorioGerencial->strQuery],
			"tagsVal" => [
				"#TABELA_AGENDAMENTO_TECNICO#" => null,
				"#GRAFICO_AGENDAMENTO_TECNICO_ANUAL#" => null,
				"#RGINICIOVIGENCIA#" => $thisRelatorioGerencial->DataInicioVigencia,
				"#RGINICIOVIGENCIA_dmY#" => date('d/m/Y', strtotime($thisRelatorioGerencial->DataInicioVigencia)),
				"#RGFIMVIGENCIA#" => $thisRelatorioGerencial->DataFimVigencia,
				"#RGFIMVIGENCIA_dmY#" => date('d/m/Y', strtotime($thisRelatorioGerencial->DataFimVigencia)),
			]
		];
		return $content;
    break;
    case("opePreBloqueadas"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$dataTable = $_RelatorioGerencial->opePreBloqueadas();
		$content = [
			"html" => $fluxo->content,
			"dataTable" => $dataTable,
			"tagsVal" => [
				"#TABELA_OPERADORAS_BLOQUEADAS#" => null
			]
		];
		return $content;
    break;
    case("sobreAviso"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo[$codeFluxo];
		$content = [
			"html" => $fluxo->content
		];
		return $content;
    break;
	case("poe"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo["docProjAbordagem"]["child"][$codeFluxo];
		$listPoe = $_RelatorioGerencial->getPoe();
		if ($listPoe) {
			foreach($listPoe as $i => $POE) {
				if ($POE["IMG"]) {
					foreach($POE["IMG"] as $j => $IMG) {
						$listPoe[$i]["IMG"][$j]["URL"] =$this->mountPathImg(
							$thisRelatorioGerencial->ID_Empreendimento,
							"POE",
							$POE["ID_POE"],
							$IMG["File_Name"]
						);
						$listPoe[$i]["IMG"][$j]["FS"] =$this->mountPathImg(
							$thisRelatorioGerencial->ID_Empreendimento,
							"POE",
							$POE["ID_POE"],
							$IMG["File_Name"], "FS"
						);
						$listPoe[$i]["IMG"][$j]["display"] = $thisRelatorioGerencial->Config["docProjAbordagem"]["poe"][$POE["ID_POE"]]["IMG"][$IMG["ID_POEIMG"]]["display"] ?? 1;
						$listPoe[$i]["IMG"][$j]["ordem"] = $IMG["ordem"] ?: $j;
					}
				}
				$listPoe[$i]["ordem"] = $POE["ordem"] ?: $i;
				$listPoe[$i]["display"] = $thisRelatorioGerencial->Config["docProjAbordagem"]["poe"][$POE["ID_POE"]]["display"] ?? 1;
				$listPoe[$i]["html"] = $fluxo->childModel["content"];
				$listPoe[$i]["tagsVal"] = [
					"#POE_LOCALIZACAO#" => $POE["Descricao_POE"], 
					"#TEXT_DESCRICAO#" => $POE["Descricao_RGPOE"], 
					"#FOTOS#" => null,
				];
			}
		}
		return $listPoe;
	break;
	case("pop"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo["docProjAbordagem"]["child"][$codeFluxo];
		$listPOP = $_RelatorioGerencial->getPOP(); 
		if ($listPOP) {
            foreach($listPOP as $i => $POP) { 
                if ($POP["RACKS"]) foreach($POP["RACKS"] as $k => $RACKS) { 
                    $listPOP[$i]["RACKS"][$k]["ordem"] = $RACKS["ordem"] ?: $k;  
					$listPOP[$i]["RACKS"][$k]["display"] = $thisRelatorioGerencial->Config["docProjAbordagem"]
                            ["pop"][$POP["ID_POP"]]
                            ["RACKS"][$RACKS["ID_Racks"]]["display"] ?? 1;
                    if ($RACKS["IMG"]) foreach($RACKS["IMG"] as $j => $IMG) { 
                        $listPOP[$i]["RACKS"][$k]["IMG"][$j]["URL"] =$this->mountPathImg( 
                            $thisRelatorioGerencial->ID_Empreendimento,
                            "RACK",
                            "RACK_".$RACKS["ID_Racks"],
                            $IMG["File_Name"]
                        );
                        $listPOP[$i]["RACKS"][$k]["IMG"][$j]["FS"] =$this->mountPathImg( 
                            $thisRelatorioGerencial->ID_Empreendimento,
                            "RACK",
                            "RACK_".$RACKS["ID_Racks"],
                            $IMG["File_Name"], "FS"
                        );
                        $listPOP[$i]["RACKS"][$k]["IMG"][$j]["display"] = $thisRelatorioGerencial->Config["docProjAbordagem"]
                            ["pop"][$POP["ID_POP"]]
                            ["RACKS"][$RACKS["ID_Racks"]]
                            ["IMG"][$IMG["ID_RacksIMG"]]["display"] ?? 1;
                        $listPOP[$i]["RACKS"][$k]["IMG"][$j]["ordem"] = $IMG["ordem"] ?: $j; 
                    }
                }
				$listPOP[$i]["ordem"] = $POP["ordem"] ?: $i;  
				$listPOP[$i]["display"] = $thisRelatorioGerencial->Config["docProjAbordagem"]["pop"][$POP["ID_POP"]]["display"] ?? 1;  
				$listPOP[$i]["title"] = $fluxo->childModel["title"];
				$listPOP[$i]["html"] = $fluxo->childModel["content"];
				
				$listPOP[$i]["graph"] =$this->genGraphPOP($POP);
				
				$listPOP[$i]["tagsVal"] = [
					"#POP_IDENTIFICACAO#" => $POP["Nome_POP"],
					"#POP_LOCALIZACAO#" => $POP["Localizacao_POP"],
					"#TEXT_DESCRICAO#" => $POP["Descricao_RGPOP"],
					"#FOTOS#" => null,
					"#GRAFICO_POP_UTILIZACAO#" => null
				];
				
			}
		}		
		return $listPOP;
	break;
	case("antenario"):
		$fluxo = (object)$_RelatorioGerencial->_RGFluxo->fluxo["docProjAbordagem"]["child"][$codeFluxo];
		$listAntenario = $_RelatorioGerencial->getAntenario(); 
		if ($listAntenario) {
			foreach($listAntenario as $i => $Antenario) { 
				if ($Antenario["IMG"]) { 
					foreach($Antenario["IMG"] as $j => $IMG) { 
						$listAntenario[$i]["IMG"][$j]["URL"] =$this->mountPathImg( 
							$thisRelatorioGerencial->ID_Empreendimento,
							"ANTENARIO",
							"ANTENARIO_".$Antenario["ID_Antenario"],
							$IMG["File_Name"]
						);
						$listAntenario[$i]["IMG"][$j]["FS"] =$this->mountPathImg( 
							$thisRelatorioGerencial->ID_Empreendimento,
							"ANTENARIO",
							"ANTENARIO_".$Antenario["ID_Antenario"],
							$IMG["File_Name"], "FS"
						);
						$listAntenario[$i]["IMG"][$j]["display"] = 
							$thisRelatorioGerencial->Config["docProjAbordagem"]["antenario"][$Antenario["ID_Antenario"]]["IMG"][$IMG["ID_AntenarioIMG"]]["display"] ?? 1;
						$listAntenario[$i]["IMG"][$j]["ordem"] = $IMG["ordem"] ?: $j; 
					}
				}
				$listAntenario[$i]["ordem"] = $Antenario["ordem"] ?: $i;  
				$listAntenario[$i]["display"] = $thisRelatorioGerencial->Config["docProjAbordagem"]["antenario"][$Antenario["ID_Antenario"]]["display"] ?? 1;  
				
				$listAntenario[$i]["title"] = $fluxo->childModel["title"];
				$listAntenario[$i]["html"] = $fluxo->childModel["content"];
				$listAntenario[$i]["tagsVal"] = [ 
					"#ANTENARIO_IDENTIFICACAO#" => $Antenario["Nome_Antenario"],
					"#ANTENARIO_LOCALIZACAO#" => $Antenario["Localizacao_Antenario"],
					"#TEXT_DESCRICAO#" => $Antenario["Descricao_RGAntenario"],
					"#FOTOS#" => null,
					"#GRAFICO_ANTENARIO_UTILIZACAO#" => null
				];
				
				$listAntenario[$i]["graph"] =$this->genGraphAntenario($Antenario);
			}
		}
		return $listAntenario;
	break;
}


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getFluxoContent4ViewAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	

$response =$this->response();

$fluxoCode = $_POST["fluxoCode"] ?? null;
if (!$fluxoCode) {
	$response->status = false;
	$response->code = "400";
	$response->data = [$_POST];
	$response->msg = "badRequest";
$this->send($response);
}

$fluxo = $_RelatorioGerencial->_RGFluxo->getFluxo();

$contentFluxo =$this->getFluxoContent($fluxoCode);

switch ($fluxoCode) {
    case("objetivo"):
		if ($contentFluxo) {
			$contentFluxo["html"] = strtr($contentFluxo["html"], $contentFluxo["tagsVal"]);
			$contentFluxo["html"] = "<p class='text-muted'>Conteúdo:</p><p class='text-justify'>"
				.$contentFluxo["html"]."</p>";
		}
    break;
    case("descServicos"):
		if ($contentFluxo) {
			$contentFluxo["html"] = strtr($contentFluxo["html"], $contentFluxo["tagsVal"]);
			$contentFluxo["html"] = "<p class='text-muted'>Conteúdo:</p><p class='text-justify'>"
				.$contentFluxo["html"]."</p>";
		}
    break;
    case("docProjAbordagem"):
		$contentFluxo = null;
    break;
    case("inconformidades"):
		if ($contentFluxo) foreach($contentFluxo["list"] as $i => $Inconformidades) {
			$contentFluxo["list"][$i]["title"] = strtr($Inconformidades["title"], $Inconformidades["tagsVal"]);
			$contentFluxo["list"][$i]["html"] = strtr($Inconformidades["html"], $Inconformidades["tagsVal"]);
		}
    break;
    case("abordagemOperadoras"):
		
    break;
    case("ctrProjEspeciais"):

    break;
    case("ctrAgendTecnicos"):

    break;
    case("opePreBloqueadas"):

    break;
    case("sobreAviso"):
		if ($contentFluxo) $contentFluxo["html"] = "<p class='text-muted'>Conteúdo:</p><p class='text-justify'>"
			.$contentFluxo["html"]."</p>";
    break;
	case("poe"):
		if ($contentFluxo) foreach($contentFluxo as $i => $Poe) {
			$contentFluxo[$i]["html"][0] = strtr($Poe["html"][0], $Poe["tagsVal"]);
		}
    break;
	case("pop"):
		if ($contentFluxo) foreach($contentFluxo as $i => $Pop) {
			$contentFluxo[$i]["title"] = strtr($Pop["title"], $Pop["tagsVal"]);
			$contentFluxo[$i]["html"] = strtr($Pop["html"], $Pop["tagsVal"]);
		}
    break;
	case("antenario"):
		if ($contentFluxo) foreach($contentFluxo as $i => $Antenario) {
			$contentFluxo[$i]["title"] = strtr($Antenario["title"], $Antenario["tagsVal"]);
			$contentFluxo[$i]["html"] = strtr($Antenario["html"], $Antenario["tagsVal"]);
		}
    break;
	default:
		$response->status = false;
		$response->code = "400";
		$response->data = [$fluxoCode];
		$response->msg = "fluxoNotFound";
	$this->send($response);
	break;
}

$response->status = true;
$response->code = "200";
$response->DB = [$_RelatorioGerencial->DbError, $_RelatorioGerencial->strQuery];
$response->data = [
	"fluxo" => $fluxo,
	"content" => $contentFluxo
];$this->send($response);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getHtmlDadosGerais()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $thisRelatorioGerencial;
global $_RelatorioGerencial;

$lastRelatorioGerencial = $_RelatorioGerencial->lastRelatorioGerencial;

$html = "
	<b>Empreendimento: </b>".$_RelatorioGerencial->getEmpreendimento()["Nom_Empreendimento"]."<br>
	<b>Período: </b>".date("d/m/Y", strtotime($thisRelatorioGerencial->DataInicioVigencia))." até ".
		date("d/m/Y", strtotime($thisRelatorioGerencial->DataFimVigencia))."<br>
	<b>Data de criação: </b> ".date("d/m/Y H:i", strtotime($thisRelatorioGerencial->Criado_em))."<br>
	<b>Status: </b> ".[
			"R"=>"RASCUNHO",
			"P"=>"PENDENTE DE ENVIO",
			"AC"=>"AGUARDANDO CONTROLADORIA",
			"AEC"=>"AGUARDANDO ENGENHARIA CENTRAL",
			"C"=>"CONCLUÍDO"
		][$thisRelatorioGerencial->Num_Status]."<br>
	<b>Período do relatório anterior: </b> ".(
		isset($lastRelatorioGerencial->ID) ? "Nº ".$lastRelatorioGerencial->ID." - ".date("d/m/Y", strtotime($lastRelatorioGerencial->DataInicioVigencia))." até ".
		date("d/m/Y", strtotime($lastRelatorioGerencial->DataFimVigencia)) : " - "
	)."
";

return $html;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getHtmlLogs()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $_RelatorioGerencial;

$Logs = $_RelatorioGerencial->getLogs();

$htmlLogs = "";

foreach($Logs as $Log) {
	$htmlLogs .= date("d/m/Y H:i", strtotime($Log["Data"])).": <b>".$Log["Nom_Usuario"]."</b>";
	switch($Log["Funcao"]) {
		case("CRIAR"):
			$htmlLogs .= " | Criou o relatório gerencial Nº".$Log["ID_RG"]."<br>";
		break;
		case("EDITAR"):
			$htmlLogs .= " | Editou o relatório gerencial Nº".$Log["ID_RG"]."<br>";
		break;
		case("DELETAR"):
			$htmlLogs .= " | Removeu o relatório gerencial Nº".$Log["ID_RG"]."<br>";
		break;
		case("ENVIAR"):
			$htmlLogs .= " | Enviou o relatório gerencial Nº".$Log["ID_RG"]."<br>";
		break;
		case("ENVIAR_AC"):
			$htmlLogs .= " | Enviou o relatório gerencial Nº".$Log["ID_RG"]." para a controladoria<br>";
		break;
		case("ENVIAR_AEC"):
			$htmlLogs .= " | Enviou o relatório gerencial Nº".$Log["ID_RG"]." para a engenharia central<br>";
		break;
		case("ENVIAR_C"):
			$htmlLogs .= " | Concluiu o relatório gerencial Nº".$Log["ID_RG"]."<br>";
		break;
		case("EXPORTAR"):
			$htmlLogs .= " | Gerou o PDF do relatório gerencial Nº".$Log["ID_RG"]."<br>";
		break;
		default:
			$htmlLogs .= "<br>";
		break;
	}
}

return $htmlLogs;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getModeView()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $thisRelatorioGerencial;
global $profile;

if (($profile["EDITAR"]["v"] ?? "N") == "N") {
	return "onlyView";
}

switch($thisRelatorioGerencial->Num_Status) {
	case("R"):
		return "editable";
	break;
	case("P"):
		return "editable";
	break;
	case("AC"):
		return "editable";
	break;
	case("AEC"):
		return "editable";
	break;
	case("C"):
		return "onlyView";
	break;
}

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function getTagsListAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s;
sc_include_library("sys", "models", "Tags.php");
$_Tags = new Tags($this);

$response =$this->response();


$search = $_POST["search"] ?? null;
$type = $_POST["type"] ?? null;
$search = trim($search);

if (!$type) {
	$response->status = false;
	$response->code = "400";
	$response->data = [$_POST];
	$response->msg = "badRequest";
$this->send($response);
}

$search = str_replace(' ','%',$search);

$Tags = $_Tags->find("Code = '$type' AND Conteudo LIKE '%$search%'");


$listTagsContent = array();
foreach($Tags as $Tag) {
	$listTagsContent[] = ["id" => $Tag["Conteudo"], "text" => $Tag["Conteudo"]];
}

$response->status = true;
$response->data = ["Tags" => $Tags, "List" => $listTagsContent];
$response->sql = [$_Tags->strQuery, $_Tags->DbError];
$response->code = "200";
$this->send($response);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function indexAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	

$fluxo = $_RelatorioGerencial->_RGFluxo->getFluxo();

$modeView =$this->getModeView();

if ($thisRelatorioGerencial->Num_Status == "R") {
	$thisRelatorioGerencial->Config = $_RelatorioGerencial->lastRelatorioGerencial->Config;
}


foreach($fluxo as $code => $item) {
    switch($code) {
        case("objetivo"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
        case("descServicos"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
        case("docProjAbordagem"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;

            $fluxo[$code]["child"]["poe"]["display"] = $thisRelatorioGerencial->Config[$code]["poe"]["display"] ?? 1;

            $fluxo[$code]["child"]["pop"]["display"] = $thisRelatorioGerencial->Config[$code]["pop"]["display"] ?? 1;

            $fluxo[$code]["child"]["antenario"]["display"] = $thisRelatorioGerencial->Config[$code]["antenario"]["display"] ?? 1;
        break;
        case("inconformidades"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
        case("abordagemOperadoras"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
        case("ctrProjEspeciais"):
            $fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
        case("opePreBloqueadas"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
        case("sobreAviso"):
			$fluxo[$code]["display"] = $thisRelatorioGerencial->Config[$code]["display"] ?? 1;
        break;
    }
}


$viewBag = [
	"fluxo" => $fluxo
];

if ($modeView == "editable") {
$this->indexView([
		"fluxo" => $fluxo,
		"viewBag" => $viewBag
	]);
} elseif ($modeView == "onlyView") {
$this->indexOnlyView();
}



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function indexOnlyView($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $profile;
global $s;

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
<div ng-app="cnsdata" ng-controller="RelatorioGerencialController as rgCtr">
	<div class="container-loader" style="margin: 0px;left: calc(50% - 46px);top: calc(50% - 46px);position: absolute;z-index: 1000" ng-show="loaderAnimation">
		<div class="loader" style="width: 100px;height: 100px;"></div>
	</div>
	
	<div class="ng-hide" ng-show="true">
	<!-- navbar -->
	<div class="row cns-navbar">
		<div style="width:33%;display: inline-block;text-align:left">
			<button class="scButton_default" ng-click="redir('../grid_Relatoriogerencial')"><?= $this->Ini->Nm_lang['lang_btn_return'] ?></button>
		</div>
		<div style="width:33%;display: inline-block;text-align:center">
			<?php if ($profile["EXPORTAR"]["v"] == "S"): ?> 
				<button class="scButton_default" ng-disabled="!<?= $this->isReadyPDF() ?> || <?= $this->isGeneringPDF()?> || requestedGenPDF">
					<a href="./?act=downloadPDF" style="color: inherit;text-decoration: none;"
					   ng-class="{'disabled': !<?= $this->isReadyPDF() ?> || <?= $this->isGeneringPDF()?> || requestedGenPDF}">
						<i class="fa fa-download"></i> 
						<span ng-if="<?= $this->isGeneringPDF()?> || requestedGenPDF"> Gerando PDF</span>
						<span ng-if="!(<?= $this->isGeneringPDF()?> || requestedGenPDF)"> Baixar PDF</span>
					</a>
				</button>
			<?php endif; ?>
		</div>
		<div style="width:33%;display: inline-block;text-align:right">
		</div>
	</div>
  
	<!-- content -->
	<div class="row cns-content">
		<div class="col-lg-4">
			<div class="panel-body" style="margin-bottom:20px">
				<h4>DADOS GERAIS</h4>
				<hr>
				<?= $this->getHtmlDadosGerais() ?>
				<br><br>
				<h4>HISTÓRICO DE ALTERAÇÕES</h4>
				<hr>
				<?= $this->getHtmlLogs() ?>
			</div>
	    </div>
        <div class="col-lg-8">
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

<?php $this->javascript();

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function indexView($data=null)
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $profile;
global $_RelatorioGerencial;
global $thisRelatorioGerencial;
global $s;

$Empreendimento = (object)$_RelatorioGerencial->getEmpreendimento();

$URLIMG_Capa =$this->mountPathImg($Empreendimento->ID_Empreendimento,
	"RG/IMG_Capa",
	'',
	$Empreendimento->IMG_RG
);

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
<div ng-app="cnsdata" ng-controller="RelatorioGerencialController as rgCtr">
	<div class="container-loader" style="margin: 0px;left: calc(50% - 46px);top: calc(50% - 46px);position: absolute;z-index: 1000" ng-show="loaderAnimation">
		<div class="loader" style="width: 100px;height: 100px;"></div>
	</div>
	
	<div class="ng-hide" ng-show="true">
	<!-- navbar -->
	<div class="row cns-navbar">
		<div style="width:33%;display: inline-block;text-align:left">
			<button class="scButton_default" ng-click="redir('../grid_Relatoriogerencial')"><?= $this->Ini->Nm_lang['lang_btn_return'] ?></button>
		</div>
		<div style="width:33%;display: inline-block;text-align:center">
			<?php if ($profile["DELETAR"]["v"] == "S"): ?> <button class="scButton_default nbtn_danger" ng-click="confirmDeleteRG()">Excluir</button><?php endif; ?>
			<a style="display:none" ng-click="deleteRG()" id="deleteRG"></a>
			<button class="scButton_default" ng-click="saveRG()">Salvar</button>
			<?php if ($profile["EXPORTAR"]["v"] == "S" && $thisRelatorioGerencial->Num_Status != "R"): ?> 
				<button class="scButton_default" ng-click="genPDF()" ng-hide="<?= $this->isGeneringPDF()?> || requestedGenPDF">
					Gerar PDF
				</button>
				<button class="scButton_default" ng-disabled="!<?= $this->isReadyPDF() ?> || <?= $this->isGeneringPDF()?> || requestedGenPDF">
					<a href="./?act=downloadPDF" style="color: inherit;text-decoration: none;"
					   ng-class="{'disabled': !<?= $this->isReadyPDF() ?> || <?= $this->isGeneringPDF()?> || requestedGenPDF}">
						<i class="fa fa-download"></i> 
						<span ng-if="<?= $this->isGeneringPDF()?> || requestedGenPDF"> Gerando PDF</span>
						<span ng-if="!(<?= $this->isGeneringPDF()?> || requestedGenPDF)"> Baixar PDF</span>
					</a>
				</button>
			<?php endif; ?>
		</div>
		<div style="width:33%;display: inline-block;text-align:right">
		</div>
	</div>
  
	<!-- content -->
	<div class="row cns-content">
		<div ng-class="{'col-lg-12': !showPreview, 'col-lg-6': showPreview}" ng-show="!expandPreview" style="margin-bottom:20px">			
            <div class="tabs-container">
                <div ng-class="{'tabs-left': mainMenuInLateral}">
                    <ul class="nav nav-tabs" ng-show="!showPreview">
						<li class="active">
                	        <a data-toggle="tab" href="#tab-fluxo-default" aria-expanded="true">Dados gerais</a>
                        </li>
                        <?php $i = 0; foreach($fluxo as $code => $item): $i++; ?>
                            <li ng-click="getFluxoContent('<?=$code?>', fluxo['<?=$code?>']);tabSelected='<?= $code ?>'">
                                <a data-toggle="tab" href="#tab-fluxo-<?=$code?>" aria-expanded="false"><?=$i?>) <?=$item["title"]?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content">
						<button class="scButton_default btn-preview" title="Exibir preview" ng-click="showPreview = !showPreview; console.log(fluxo)">
							<i class="fa fa-angle-double-left" ng-if="!showPreview"></i>
							<i class="fa fa-angle-double-right" ng-if="showPreview"></i>
						</button>
                        <!-- Default -->
                        <div id="tab-fluxo-default" class="tab-pane active">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4>DADOS GERAIS</h4>
                                <hr>
								<?= $this->getHtmlDadosGerais() ?>
								<?php if ($profile["ENVIAR"]["v"] == "S" && $thisRelatorioGerencial->Num_Status != "R" && $thisRelatorioGerencial->Num_Status != "C"): ?> 
									<br>Enviar Relatório Gerencial:
									<button class="scButton_default" ng-click="sendRG()">
										<?php if ($thisRelatorioGerencial->Num_Status == "P"): ?>
										Enviar para a controladoria
										<?php elseif ($thisRelatorioGerencial->Num_Status == "AC"): ?>
										Enviar para a engenharia central
										<?php elseif ($thisRelatorioGerencial->Num_Status == "AEC"): ?>
										Concluir relatório gerencial
										<?php endif; ?>
									</button>
								<?php endif; ?>
								<br><br>
								<h4>HISTÓRICO DE ALTERAÇÕES</h4>
								<hr>
								<?= $this->getHtmlLogs() ?>
								<br><br>
								<h4>IMAGEM DA CAPA DO DOCUMENTO</h4>
								<hr>
								<img src="<?=$URLIMG_Capa?>" style="max-width: 100%;max-height: 300px;cursor:pointer" ng-click="showImage({URL:'<?=$URLIMG_Capa?>',File_Name:'<?=$Empreendimento->IMG_RG?>'})">
                            </div>
                        </div>

                        <!-- Fluxo itens -->
                        <div id="tab-fluxo-objetivo" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 ng-bind="fluxo.objetivo.title"></h4>
                                <hr>
                                <div ng-bind-html="fluxo.objetivo.data.html |trusted"></div>
                            </div>
                        </div>
                        <div id="tab-fluxo-descServicos" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%" >
                                <h4 ng-bind="fluxo.descServicos.title"></h4>
                                <hr>
                                <div ng-bind-html="fluxo.descServicos.data.html |trusted"></div>
                            </div>
                        </div>
                        <div id="tab-fluxo-docProjAbordagem" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.docProjAbordagem.title"></h4>
								<label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.docProjAbordagem.display">
										Utilizar este item
								</label>								
								<div ng-class="{'disable-area':!fluxo.docProjAbordagem.display}">
									<div class="tabs-container">
										<ul class="nav nav-tabs" style="display: inline-block;width: 100%;">
											<li class="active">
												<a data-toggle="tab" href="#tab-docProjAbordagem-poe" 
												   ng-click="getFluxoContent('poe', fluxo.docProjAbordagem.child.poe);
															 tabSelectedDocProjAbordagem='poe'">
													<?=$fluxo["docProjAbordagem"]["child"]["poe"]["title"]?>
												</a>
											</li>
											<li class="">
												<a data-toggle="tab" href="#tab-docProjAbordagem-pop"
												   ng-click="getFluxoContent('pop', fluxo.docProjAbordagem.child.pop);
															 tabSelectedDocProjAbordagem='pop'"> 
													<?=$fluxo["docProjAbordagem"]["child"]["pop"]["title"]?>
												</a>
											</li>
											<li class="">
												<a data-toggle="tab" href="#tab-docProjAbordagem-antenario"
												   ng-click="getFluxoContent('antenario', fluxo.docProjAbordagem.child.antenario);
															 tabSelectedDocProjAbordagem='antenario'"> 
													<?=$fluxo["docProjAbordagem"]["child"]["antenario"]["title"]?>
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div id="tab-docProjAbordagem-poe" class="tab-pane active">
												<div class="panel-body" style="margin: 0;width: 100%;border-top: none;">
													<label>
														<input type="checkbox" ng-true-value="1" 
															   ng-false-value="0" ng-model="fluxo.docProjAbordagem.child.poe.display">
														Utilizar este item
													</label>
													<div ng-class="{'disable-area':!fluxo.docProjAbordagem.child.poe.display}">
														<div ng-if="!fluxo.docProjAbordagem.child.poe.data.length">Não há registros para serem exibidos</div>
														<poe ng-repeat="(ipoe, poe) in fluxo.docProjAbordagem.child.poe.data"></poe>
													</div>
												</div>
											</div>
											<div id="tab-docProjAbordagem-pop" class="tab-pane">
												<div class="panel-body" style="margin: 0;width: 100%;border-top: none;">
													<label>
														<input type="checkbox" ng-true-value="1" 
															   ng-false-value="0" ng-model="fluxo.docProjAbordagem.child.pop.display">
														Utilizar este item
													</label>
													<div ng-class="{'disable-area':!fluxo.docProjAbordagem.child.pop.display}">
														<div ng-if="!fluxo.docProjAbordagem.child.pop.data.length">Não há registros para serem exibidos</div>
														<pop ng-repeat="(ipop, pop) in fluxo.docProjAbordagem.child.pop.data"></pop>
													</div>
												</div>
											</div>
											<div id="tab-docProjAbordagem-antenario" class="tab-pane">
												<div class="panel-body" style="margin: 0;width: 100%;border-top: none;">
													<label>
														<input type="checkbox" ng-true-value="1" 
															   ng-false-value="0" ng-model="fluxo.docProjAbordagem.child.antenario.display">
														Utilizar este item
													</label>
													<div ng-class="{'disable-area':!fluxo.docProjAbordagem.child.antenario.display}">
														<div ng-if="!fluxo.docProjAbordagem.child.antenario.data.length">Não há registros para serem exibidos</div>
														<antenario ng-repeat="(iantenario, antenario) in fluxo.docProjAbordagem.child.antenario.data"></antenario>
													</div>
												</div>
											</div>
										</div>
                    				</div>
								</div>
                            </div>
                        </div>
                        <div id="tab-fluxo-inconformidades" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.inconformidades.title"></h4>
                                <label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.inconformidades.display">
										Utilizar este item
								</label>								
								<div ng-class="{'disable-area':!fluxo.inconformidades.display}">
                                    %:fluxo.inconformidades.data.html:%
                                    <div class="m-t-sm">
										<div ng-if="!fluxo.inconformidades.data.list.length">Não há registros para serem exibidos</div>
                                        <inconformidade ng-repeat="(iinconformidade, inconformidade) in fluxo.inconformidades.data.list"></inconformidade>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-fluxo-abordagemOperadoras" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.abordagemOperadoras.title"></h4>
								<label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.abordagemOperadoras.display">
										Utilizar este item
								</label>								
								<div ng-class="{'disable-area':!fluxo.abordagemOperadoras.display}">
                                    <abordagem-operadoras></abordagem-operadoras>
                                </div>
                            </div>
                        </div>
                        <div id="tab-fluxo-ctrProjEspeciais" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.ctrProjEspeciais.title"></h4>
								<label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.ctrProjEspeciais.display">
										Utilizar este item
								</label>								
								<div ng-class="{'disable-area':!fluxo.ctrProjEspeciais.display}">
                                    <ctr-proj-especiais></ctr-proj-especiais>
                                </div>
                            </div>
                        </div>
                        <div id="tab-fluxo-ctrAgendTecnicos" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.ctrAgendTecnicos.title"></h4>
								<label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.ctrAgendTecnicos.display">
										Utilizar este item
								</label>								
								<div ng-class="{'disable-area':!fluxo.ctrAgendTecnicos.display}">
                                    <ctr-agend-tecnicos></ctr-agend-tecnicos>
                                </div>
                            </div>
                        </div>
                        <div id="tab-fluxo-opePreBloqueadas" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.opePreBloqueadas.title"></h4>
                                <label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.opePreBloqueadas.display">
										Utilizar este item
								</label>								
								<div ng-class="{'disable-area':!fluxo.opePreBloqueadas.display}">
                                    <ope-pre-bloqueadas></ope-pre-bloqueadas>
                                </div>
                            </div>
                        </div>
                        <div id="tab-fluxo-sobreAviso" class="tab-pane">
                            <div class="panel-body" style="%:showPreview ? 'margin:0;width:100%':null:%">
                                <h4 class="cns-title-item" ng-bind="fluxo.sobreAviso.title"></h4>
                                <label>
									<input type="checkbox" ng-true-value="1" ng-false-value="0" ng-model="fluxo.sobreAviso.display">
										Utilizar este item
								</label>
								<hr>
								<div ng-class="{'disable-area':!fluxo.sobreAviso.display}" ng-bind-html="fluxo.sobreAviso.data.html |trusted">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>			
        </div>
        <div class="col-lg-6" ng-show="showPreview" ng-class="{'col-lg-12': expandPreview, 'col-lg-6': !expandPreview}">
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

<?php $this->javascript();

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function isGeneringPDF()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $thisRelatorioGerencial;	
if ($thisRelatorioGerencial->GeracaoPDF) {
	$datetime = strtotime($thisRelatorioGerencial->GeracaoPDF);
	if ($datetime && (strtotime('now') - $datetime) < 30*60 ) {
		return 1;
	}
}
return 0;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function isReadyPDF()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $thisRelatorioGerencial;	
global $path_doc;
	
$ID_Empreendimento = $thisRelatorioGerencial->ID_Empreendimento;

$filename = realpath("$path_doc/../emp_$ID_Empreendimento").DIRECTORY_SEPARATOR."RG".DIRECTORY_SEPARATOR.$thisRelatorioGerencial->GeracaoPDF;

return $thisRelatorioGerencial->GeracaoPDF && file_exists($filename) ? 1 : 0;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function javascript($data=null)
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $_RelatorioGerencial;
global $thisRelatorioGerencial;
?>
<script>

	loadBreadcrumb(["Relatório Gerencial", 'Nº <?= $thisRelatorioGerencial->ID ?> - <?= $_RelatorioGerencial->getEmpreendimento()["Nom_Empreendimento"] ?? null ?>']);

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
	App.controller('RelatorioGerencialController', ['$scope', '$http', 'Upload', '$sce', function ($scope, $http, Upload, $sce) {
		$scope.fluxo = viewBag.fluxo;
		$scope.showPreview = $scope.expandPreview = false; 
		$scope.tabSelected = $scope.tabSelectedDocProjAbordagem = null;
		$scope.console = console;
		$scope.initQuill = initQuill;
		$scope.mainMenuInLateral = true;
	
		$scope.ifShowMAinMenuInLateral = function () {
			$scope.mainMenuInLateral = window.innerWidth > 980;
		}
	
		$scope.ifShowMAinMenuInLateral();
		window.onresize = function(event) {
    		$scope.ifShowMAinMenuInLateral();
		};
	
		_self = this;
	
		$scope.getFluxoContent = function (fluxoCode, obj, force) {
            force = typeof force != "undefined" ? force : false;
			if (!(typeof obj.isLoaded != "undefined" && obj.isLoaded) || force) {
				$scope.loaderAnimation = true;
	
				httpConfig = {
					url : './?act=getFluxoContent4View',
					method : 'POST',
					data : {
						fluxoCode : fluxoCode
					},
					onComplete : function() {$scope.loaderAnimation = false;},
					success : function (response) {
						obj.isLoaded = true;
						if (typeof response.data.content == "string") obj.data = $sce.trustAsHtml(response.data.content);
						else obj.data = response.data.content
					},
					failed : function (response) {
						console.log("failed", response);
					}
				};
				$scope.http(httpConfig);
			}
		}
	
		$scope.saveRG = function () {
			$scope.loaderAnimation = true;
			console.log($scope.tabSelected, $scope.tabSelectedDocProjAbordagem);
			httpConfig = {
				url : './?act=saveRG',
				method : 'POST',
				data : {
					fluxo : JSON.stringify($scope.fluxo)
				},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {
					toastr.success("Salvo com sucesso");
                    $scope.refreshPages();
					$scope.refreshPreview();
				},
				failed : function (response) {
				}
			};
			$scope.http(httpConfig);
		}
	
		$scope.sendRG = function () {
			$scope.loaderAnimation = true;
			httpConfig = {
				url : './?act=sendRG',
				method : 'POST',
				data : {},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {
					toastr.success("Salvo com sucesso");
					$scope.refreshPreview();
				},
				failed : function (response) {
				}
			};
			$scope.http(httpConfig);
		}
	
		$scope.confirmDeleteRG = function () {
			html = `
				Deseja realmente remover este relatório gerencial?<br><br>
				<button class="scButton_default nbtn_danger" onclick="javascript: $('#deleteRG')[0].click()">Sim</button>
				<button class="scButton_default" onclick="close_sModal()">Não</button>
			`;
	
			sModal('show', '', html, {sizeClass:'sm'});
		}
	
		$scope.deleteRG = function () {
			$scope.loaderAnimation = true;
			httpConfig = {
				url : './?act=deleteRG',
				method : 'POST',
				data : {
					fluxo : JSON.stringify($scope.fluxo)
				},
				onComplete : function() {$scope.loaderAnimation = false;},
				success : function (response) {
				},
				failed : function (response) {
					toastr.success("Não foi possível remover o relatório gerencial, por favor, tente novamente");
				},
				httpFailed : function (response) {
					toastr.error("Não foi possível remover o relatório gerencial, por favor, tente novamente");
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
					toastr.success("Não foi possível gerar o PDF, por favor, tente novamente");
				},
				httpFailed : function (response) {
					toastr.error("Não foi possível gerar o PDF, por favor, tente novamente");
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
	
        $scope.refreshPages = function() {
            

            if ($scope.tabSelected == "docProjAbordagem") {
            } else {
                if ($scope.tabSelected == "abordagemOperadoras") $scope["getFluxoContent"]($scope.tabSelected, $scope.fluxo[$scope.tabSelected], true);
            }
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
	
		$scope.isValidDate = function (date) {
			d = date.split('/');
			d.reverse();
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
	
		try {
			$scope["getFluxoContent"]('poe', $scope.fluxo.docProjAbordagem.child.poe);
		} catch (err) {}
	}]);
</script>
<?php $this->directive(); ?>
<?php


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function mountPathImg($ID_Empreendimento=null, $Type=null, $ID_Item=null, $File=null, $type="URL")
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $path_img;
global $path_doc;

if (!$ID_Empreendimento || !$Type || !$File) return null; 

if ($type=="URL") {
	return "$path_img/../emp_$ID_Empreendimento/$Type/$ID_Item/$File";
} elseif ($type=="FS") {
	return "$path_doc/../emp_$ID_Empreendimento/$Type/$ID_Item/$File";
}


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function pdfViewerAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s; 
global $_RelatorioGerencial;
global $thisRelatorioGerencial;	
$this->pdfViewerView();

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function pdfViewerView($data=[])
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
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

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function response()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
$response = new stdClass();

$response->status = null;
$response->code = null;
$response->data = null;
$response->msg = null;
$response->redirect = null;

return $response;

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function router()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
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
	die();
    } else {
        $response->status = false;
        $response->code = "404";
        $response->msg = "Ação não encontrada";
       $this->send($response);
    }
} else {
   $this->indexAction();
}


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function sanitizeQuillHTML($quillHTML="")
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
return preg_replace("/<(\w*)[^>]*>[\s|&nbsp;]*<\/\1>/", "", $quillHTML);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function saveRGAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s;
global $thisRelatorioGerencial;
global $_RelatorioGerencial;

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

$Config = &$thisRelatorioGerencial->Config;

foreach($fluxo as $code => $item) {
    switch($code) {
        case("objetivo"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
        break;
        case("descServicos"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
        break;
        case("docProjAbordagem"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];

            if(!isset($Config[$code]["poe"])) $Config[$code]["poe"] = array();
            $Config[$code]["poe"]["display"] = $item["child"]["poe"]["display"];
            if ($item["child"]["poe"]["isLoaded"] ?? false) {
                foreach($item["child"]["poe"]["data"] as $i => $POE) {
					$thisPOE = &$fluxo[$code]["child"]["poe"]["data"][$i];
					
					if ($POE["ID_RGPOE"]) {
						$_RelatorioGerencial->_Rg_poe->save("ID = ".$POE["ID_RGPOE"], [
							"Editado_em" => date('Y-m-d H:i:s'),
							"Descricao" => $POE["Descricao_RGPOE"],
							"ordem" => $i
						]);
					} else {
						$thisPOE["ID_RGPOE"] = $_RelatorioGerencial->_Rg_poe->create([
							"Criado_em" => date('Y-m-d H:i:s'),
							"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
 							"ID_Emppoe" => $POE["ID_POE"],
							"Descricao" => $POE["Descricao_RGPOE"],
							"ordem" => $i
						]);
					}
					 
                    $pID = $POE["ID_POE"];
                    if(!isset($Config[$code]["poe"][$pID])) $Config[$code]["poe"][$pID] = array();
                    $Config[$code]["poe"][$pID]["display"] = $POE["display"];
                    if(!isset($Config[$code]["poe"][$pID]["IMG"])) $Config[$code]["poe"][$pID]["IMG"] = array();
                    foreach(($POE["IMG"] ?? array()) as $iIMG => $IMG) {
						$thisIMG = &$thisPOE["IMG"][$iIMG];
						
						if ($IMG["ID_RGPOEIMG"]) {
							$_RelatorioGerencial->_Rg_prsaimg->save("ID = ".$IMG["ID_RGPOEIMG"], [
								"Editado_em" => date('Y-m-d H:i:s'),
								"Descricao" => $IMG["Descricao_RGPOEIMG"],
								"ordem" => $iIMG
							]);
						} else {
							$thisIMG["ID_RGPOEIMG"] = $_RelatorioGerencial->_Rg_prsaimg->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_PRSA" => $IMG["ID_POEIMG"],
								"Tipo_PRSA" => 'POE',
								"Descricao" => $IMG["Descricao_RGPOEIMG"],
								"ID_RGPRSA" => $thisPOE["ID_RGPOE"],
								"ordem" => $iIMG
							]);
						}
                        $idIMG = $IMG["ID_POEIMG"];
						if(!isset($Config[$code]["poe"][$pID]["IMG"][$idIMG])) $Config[$code]["poe"][$pID]["IMG"][$idIMG] = array();
                        $Config[$code]["poe"][$pID]["IMG"][$idIMG]["display"] = $IMG["display"];
                    }
                }
            }

            if(!isset($Config[$code]["pop"])) $Config[$code]["pop"] = array();
            $Config[$code]["pop"]["display"] = $item["child"]["pop"]["display"];
            if ($item["child"]["pop"]["isLoaded"] ?? false) {
                foreach($item["child"]["pop"]["data"] as $i => $POP) {
					$thisPOP = &$fluxo[$code]["child"]["pop"]["data"][$i];
					
					if ($POP["ID_RGPOP"]) {
						$_RelatorioGerencial->_Rg_pop->save("ID = ".$POP["ID_RGPOP"], [
							"Editado_em" => date('Y-m-d H:i:s'),
							"Descricao" => $POP["Descricao_RGPOP"],
							"ordem" => $i
						]);
					} else {
						$thisPOP["ID_RGPOP"] = $_RelatorioGerencial->_Rg_pop->create([
							"Criado_em" => date('Y-m-d H:i:s'),
							"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
 							"ID_POP" => $POP["ID_POP"],
							"Descricao" => $POP["Descricao_RGPOP"],
							"ordem" => $i
						]);
					}
					
                    $pID = $POP["ID_POP"];
					if(!isset($Config[$code]["pop"][$pID])) $Config[$code]["pop"][$pID] = array();
                    $Config[$code]["pop"][$pID]["display"] = $POP["display"];
					
                    if(!isset($Config[$code]["pop"][$pID]["IMG"])) $Config[$code]["pop"][$pID]["IMG"] = array();
                    foreach(($POP["IMG"] ?? array()) as $iIMG => $IMG) {
						$thisIMG = &$thisPOP["IMG"][$iIMG];
						
						if ($IMG["ID_RGPOPIMG"]) {
							$_RelatorioGerencial->_Rg_prsaimg->save("ID = ".$IMG["ID_RGPOPIMG"], [
								"Editado_em" => date('Y-m-d H:i:s'),
								"Descricao" => $IMG["Descricao_RGPOPIMG"],
								"ordem" => $iIMG
							]);
						} else {
							$thisIMG["ID_RGPOPIMG"] = $_RelatorioGerencial->_Rg_prsaimg->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_PRSA" => $IMG["ID_POPIMG"],
								"Tipo_PRSA" => 'POP',
								"Descricao" => $IMG["Descricao_RGPOPIMG"],
								"ID_RGPRSA" => $thisPOP["ID_RGPOP"],
								"ordem" => $iIMG
							]);
						}
						
                        $idIMG = $IMG["ID_POPIMG"];
                        if(!isset($Config[$code]["pop"][$pID]["IMG"][$idIMG])) $Config[$code]["pop"][$pID]["IMG"][$idIMG] = array();
                        $Config[$code]["pop"][$pID]["IMG"][$idIMG]["display"] = $IMG["display"];
                    }
					
                    if(!isset($Config[$code]["pop"][$pID]["RACKS"])) $Config[$code]["pop"][$pID]["RACKS"] = array();
                    foreach(($POP["RACKS"] ?? array()) as $iRACKS => $RACKS) {
						$thisRACKS = &$thisPOP["RACKS"][$iRACKS];
						$rID = $RACKS["ID_Racks"];
						
						if ($RACKS["ID_RGRacks"]) {
							$_RelatorioGerencial->_Rg_racks->save("ID = ".$RACKS["ID_RGRacks"], [
								"Editado_em" => date('Y-m-d H:i:s'),
								"Descricao" => $RACKS["Descricao"],
								"ordem" => $iRACKS
							]);
						} else {
							$thisRACKS["ID_RGRacks"] = $_RelatorioGerencial->_Rg_racks->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
								"ID_RGPOP" => $pID,
								"ID_Racks" => $RACKS["ID_Racks"],
								"Descricao" => $RACKS["Descricao"],
								"ordem" => $iRACKS
							]);
						}
                        if(!isset($Config[$code]["pop"][$pID]["RACKS"][$rID])) $Config[$code]["pop"][$pID]["RACKS"][$rID] = array();
                    	$Config[$code]["pop"][$pID]["RACKS"][$rID]["display"] = $RACKS["display"];
						
						foreach(($RACKS["IMG"] ?? array()) as $iIMG => $IMG) {
							$thisIMG = &$thisRACKS["IMG"][$iIMG];
							
							if ($IMG["ID_RGRacksIMG"]) {
								$_RelatorioGerencial->_Rg_prsaimg->save("ID = ".$IMG["ID_RGRacksIMG"], [
									"Editado_em" => date('Y-m-d H:i:s'),
									"Descricao" => $IMG["Descricao_RGRacksIMG"],
									"ordem" => $iIMG
								]);
							} else {
								$thisIMG["ID_RGRacksIMG"] = $_RelatorioGerencial->_Rg_prsaimg->create([
									"Criado_em" => date('Y-m-d H:i:s'),
									"ID_PRSA" => $IMG["ID_RacksIMG"],
									"Tipo_PRSA" => 'RACK',
									"Descricao" => $IMG["Descricao_RGRacksIMG"],
									"ID_RGPRSA" => $thisRACKS["ID_RGRacks"],
									"ordem" => $iIMG
								]);
							}

							$idIMG = $IMG["ID_RacksIMG"];
							if(!isset($Config[$code]["pop"][$pID]["RACKS"][$rID]["IMG"][$idIMG]))
								$Config[$code]["pop"][$pID]["RACKS"][$rID]["IMG"][$idIMG] = array();
							$Config[$code]["pop"][$pID]["RACKS"][$rID]["IMG"][$idIMG]["display"] = $IMG["display"];
						}
                    }
                }
            }

            if(!isset($Config[$code]["antenario"])) $Config[$code]["antenario"] = array();
            $Config[$code]["antenario"]["display"] = $item["child"]["antenario"]["display"];
            if ($item["child"]["antenario"]["isLoaded"] ?? false) {
                foreach($item["child"]["antenario"]["data"] as $i => $ANTENARIO) {
					$thisAntenario = &$fluxo[$code]["child"]["antenario"]["data"][$i];
					
					if ($ANTENARIO["ID_RGAntenario"]) {
						$_RelatorioGerencial->_Rg_antenario->save("ID = ".$ANTENARIO["ID_RGAntenario"], [
							"Editado_em" => date('Y-m-d H:i:s'),
							"Descricao" => $ANTENARIO["Descricao_RGAntenario"],
							"ordem" => $i
						]);
					} else {
						$thisAntenario["ID_RGAntenario"] = $_RelatorioGerencial->_Rg_antenario->create([
							"Criado_em" => date('Y-m-d H:i:s'),
							"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
 							"ID_Antenario" => $ANTENARIO["ID_Antenario"],
							"Descricao" => $ANTENARIO["Descricao_RGAntenario"],
							"ordem" => $i
						]);
					}
					
                    $pID = $ANTENARIO["ID_Antenario"];
                    if(!isset($Config[$code]["antenario"][$pID])) $Config[$code]["antenario"][$pID] = array();
                    $Config[$code]["antenario"][$pID]["display"] = $ANTENARIO["display"];
                    if(!isset($Config[$code]["antenario"][$pID]["IMG"])) $Config[$code]["antenario"][$pID]["IMG"] = array();
                    foreach(($ANTENARIO["IMG"] ?? array()) as $iIMG => $IMG) {
						$thisIMG = &$thisAntenario["IMG"][$iIMG];
						
						if ($IMG["ID_RGAntenarioIMG"]) {
							$_RelatorioGerencial->_Rg_prsaimg->save("ID = ".$IMG["ID_RGAntenarioIMG"], [
								"Editado_em" => date('Y-m-d H:i:s'),
								"Descricao" => $IMG["Descricao_RGAntenarioIMG"],
								"ordem" => $iIMG
							]);
						} else {
							$thisIMG["ID_RGAntenarioIMG"] = $_RelatorioGerencial->_Rg_prsaimg->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_PRSA" => $IMG["ID_AntenarioIMG"],
								"Tipo_PRSA" => 'ANTENARIO',
								"Descricao" => $IMG["Descricao_RGAntenarioIMG"],
								"ID_RGPRSA" => $thisAntenario["ID_RGAntenario"],
								"ordem" => $iIMG
							]);
						}
						
                        $idIMG = $IMG["ID_AntenarioIMG"];
                        if(!isset($Config[$code]["antenario"][$pID]["IMG"][$idIMG])) $Config[$code]["antenario"][$pID]["IMG"][$idIMG] = array();
                        $Config[$code]["antenario"][$pID]["IMG"][$idIMG]["display"] = $IMG["display"];
                    }
                }
            }
        break;
        case("inconformidades"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
            if ($item["isLoaded"] ?? false) {
                foreach(($item["data"]["list"] ?? array()) as $i => $Inconformidade) {
					$thisInconformidade = &$fluxo[$code]["data"]["list"][$i];
					
					if ($Inconformidade["ID_RGInconformidade"]) {
						$_RelatorioGerencial->_Rg_inconformidade->save("ID = ".$Inconformidade["ID_RGInconformidade"], [
							"Editado_em" => date('Y-m-d H:i:s'),
							"Descricao" => $Inconformidade["Descricao_RGInconformidade"],
							"Historico" => $Inconformidade["Historico_RGInconformidade"],
							"ordem" => $i
						]);
					} else {
						$thisInconformidade["ID_RGInconformidade"] = $_RelatorioGerencial->_Rg_inconformidade->create([
							"Criado_em" => date('Y-m-d H:i:s'),
							"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
 							"ID_Inconformidade" => $Inconformidade["ID_Inconformidade"],
							"Descricao" => $Inconformidade["Descricao_RGInconformidade"],
							"Historico" => $Inconformidade["Historico_RGInconformidade"],
							"ordem" => $i
						]);
					}
					
                    $pID = $Inconformidade["ID_Inconformidade"];
                    if(!isset($Config[$code]["inconformidades"][$pID])) $Config[$code]["inconformidades"][$pID] = array();
                    $Config[$code]["inconformidades"][$pID]["display"] = $Inconformidade["display"];
                    if(!isset($Config[$code]["inconformidades"][$pID]["IMG"])) $Config[$code]["inconformidades"][$pID]["IMG"] = array();
                    foreach(($Inconformidade["IMG"] ?? array()) as $iIMG => $IMG) {
						$thisIMG = &$thisInconformidade["IMG"][$iIMG];
						
						if ($IMG["ID_RGInconformidadeIMG"]) {
							$_RelatorioGerencial->_Rg_inconformidadeimg->save("ID = ".$IMG["ID_RGInconformidadeIMG"], [
								"Editado_em" => date('Y-m-d H:i:s'),
								"Descricao" => $IMG["Descricao_RGInconformidadeIMG"],
								"ordem" => $iIMG
							]);
						} else {
							$thisIMG["ID_RGInconformidadeIMG"] = $_RelatorioGerencial->_Rg_inconformidadeimg->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_Filesinconformidades" => $IMG["ID_InconformidadeIMG"],
								"ID_RGInconformidade" => $thisInconformidade["ID_RGInconformidade"],
								"Descricao" => $IMG["Descricao_RGInconformidadeIMG"],
								"ordem" => $iIMG
							]);
						}

                        $idIMG = $IMG["ID_InconformidadeIMG"];
                        if(!isset($Config[$code]["inconformidades"][$pID]["IMG"][$idIMG])) $Config[$code]["inconformidades"][$pID]["IMG"][$idIMG] = array();
                        $Config[$code]["inconformidades"][$pID]["IMG"][$idIMG]["display"] = $IMG["display"];
                    }
                }
            }
        break;
        case("abordagemOperadoras"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
		
			if ($item["isLoaded"] ?? false) {
                foreach(($item["data"]["dataTable"]["PSA"] ?? array()) as $i => $PSA) {
					$thisPSA = &$thisInconformidade["data"]["dataTable"]["PSA"][$i];
					
					if ($PSA["ID_RGPSA"]) {
						$_RelatorioGerencial->_Rg_abordagemoperadoras->save("ID = ".$PSA["ID_RGPSA"], [
							"Editado_em" => date('Y-m-d H:i:s'),
							"InicioPagamento" => $PSA["InicioPagamento"] ?? null,
							"Observacoes" => $PSA["Observacoes"] ?? null,
							"Valor_Contrato" => $PSA["Valor_Contrato"] ?? null,
							"Status" => $PSA["Status"]
						]);
					} else {
						$thisPSA["ID_RGPSA"] = $_RelatorioGerencial->_Rg_abordagemoperadoras->create([
							"Criado_em" => date('Y-m-d H:i:s'),
							"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
 							"ID_Equipamento" => $PSA["ID_Equipamento"] ?? null,
							"TipoEquipamento" => $PSA["TipoEquipamento"] ?? null,
							"InicioPagamento" => $PSA["InicioPagamento"] ?? null,
							"Valor_Contrato" => $PSA["Valor_Contrato"] ?? null,
							"Status" => $PSA["Status"]
						]);
					}
				}
				
				foreach(($item["data"]["child"]["contratuais"]["content"] ?? array()) as $j => $byOperadora) {
					foreach((is_array($byOperadora) ? $byOperadora : array()) as $i => $tag) {
						$thisTag = &$item["data"]["child"]["contratuais"]["content"][$j][$i];
						if ($tag["ID"]) {
							if ($tag["deleted"] ?? false || !isset($tag["Conteudo"]) || !$tag["Conteudo"]) {
								$_RelatorioGerencial->_Rg_tags->del("ID = ".$tag["ID"]);
							} else {
								$_RelatorioGerencial->_Rg_tags->save("ID = ".$tag["ID"], [
									"Editado_em" => date('Y-m-d H:i:s'),
									"Conteudo" => $tag["Conteudo"]
								]);
							}
						} elseif (!($tag["deleted"] ?? false || !isset($tag["Conteudo"]) || !$tag["Conteudo"])) {
							$thisTag["ID"] = $_RelatorioGerencial->_Rg_tags->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
								"Tipo" => "tratativa",
								"Conteudo" => $tag["Conteudo"],
								"ID_Operadora" => $tag["ID_Operadora"]
							]);
						}
					}
				}
				
				foreach(($item["data"]["child"]["inadimplencias"]["content"] ?? array()) as $j => $byOperadora) {
					foreach((is_array($byOperadora) ? $byOperadora : array()) as $i => $tag) {
						$thisTag = &$item["data"]["child"]["inadimplencias"]["content"][$j][$i];
						if ($tag["ID"]) {
							if ($tag["deleted"] ?? false || !isset($tag["Conteudo"]) || !$tag["Conteudo"]) {
								$_RelatorioGerencial->_Rg_tags->del("ID = ".$tag["ID"]);
							} else {
								$_RelatorioGerencial->_Rg_tags->save("ID = ".$tag["ID"], [
									"Editado_em" => date('Y-m-d H:i:s'),
									"Conteudo" => $tag["Conteudo"]
								]);
							}
						} elseif (!($tag["deleted"] ?? false || !isset($tag["Conteudo"]) || !$tag["Conteudo"])) {
							$thisTag["ID"] = $_RelatorioGerencial->_Rg_tags->create([
								"Criado_em" => date('Y-m-d H:i:s'),
								"ID_Relatoriogerencial" => $thisRelatorioGerencial->ID,
								"Tipo" => "inadimplencia",
								"Conteudo" => $tag["Conteudo"],
								"ID_Operadora" => $tag["ID_Operadora"]
							]);
						}
					}
				}
			}
		
        break;
        case("ctrProjEspeciais"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
        break;
        case("opePreBloqueadas"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
        break;
        case("sobreAviso"):
            if(!isset($Config[$code])) $Config[$code] = array();
            $Config[$code]["display"] = $item["display"];
        break;
    }
}

$_RelatorioGerencial->save("ID = ".$thisRelatorioGerencial->ID, [
    "Config" => json_encode($Config),
	"Num_Status" => $thisRelatorioGerencial->Num_Status == "R" ? "P" : $thisRelatorioGerencial->Num_Status,
	"Editado_em" => date('Y-m-d H:i:s')
]);

$fluxo["Config"] = $Config;
$fluxo["RG"] = $thisRelatorioGerencial;$this->Audit("saveRelatorioGerencial", $fluxo);

$response->status = true;
if ($thisRelatorioGerencial->Num_Status == "R") {
	$s->setIUDState("blk_RelatorioGerencial", "I", "success", "Relatório gerencial salvo com sucesso");
	$response->redirect = ".";
}
$response->code = "200";
$response->Db = [
	"_Rg_prsaimg" => [$_RelatorioGerencial->_Rg_prsaimg->DbError, $_RelatorioGerencial->_Rg_prsaimg->strQuery]
];
$this->send($response);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function saveTagAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $s;
sc_include_library("sys", "models", "Tags.php");
$_Tags = new Tags($this);

$response =$this->response();


$tag = $_POST["tag"] ?? null;
$type = $_POST["type"] ?? null;
$tag = trim($tag);

if (!$tag || !$type) {
	$response->status = false;
	$response->code = "400";
	$response->data = [$_POST];
	$response->msg = "badRequest";
$this->send($response);
}

$Tags = $_Tags->find("Conteudo = '$tag' AND Code = '$type'");
if ($Tags) {
	$response->status = false;
	$response->code = "200";
	$response->data = [$_POST];
	$response->msg = "tagExists";
$this->send($response);
}

$response->status = true;

$data = [
	"Code" => $type,
	"Conteudo" => $tag,
	"Criado_em" => date("Y-m-d H:i:s")
];
$_Tags->create();
$this->Audit("createTag", $data);

$response->msg = [$_Tags->strQuery, $_Tags->DbError];
$response->code = "200";
$this->send($response);

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function scButtons()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
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

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function send($response=null)
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
header("Content-type: application/json");
echo json_encode($response);
die();

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function sendMailControladoria()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
sc_include_library("sys", "models", "Usuarios.php");
$_Usuarios = new Usuarios($this);
$UsuarioDestinario = $_Usuarios->getByCentroDeCusto('23208');

if ($UsuarioDestinario) {
	$emails = array();
	foreach($UsuarioDestinario as $usuario) {
		$email = $usuario["Nom_Email1"] ?: $usuario["Nom_Email2"] ?: null;
		if ($email) $emails[] = $email;
	}
	$emails = array_unique($emails);
} else return;
if (!$emails) {
	return;
}

sc_include_library('sys', 'functions', 'functions.php');
sc_include_library('sys', 'functions', 'email_notificacao.php');
sc_include_library('sys', 'models', 'Logs.php');
$modelLogs = new Logs($this);
$m = new sendEmail();
$s = new manageSession();
$ID_Usuario = $s->get('ID_Usuario');

global $thisRelatorioGerencial;

$emailData = [
		"alert" => "good",
		"title" => "Relatório Gerencial <strong>Nº ".$thisRelatorioGerencial->ID."</strong><br>Aguardando Controladoria",
		"content" => "
			Prezados(as), <br><br>
			Informamos que o relatório gerencial Nº ".$thisRelatorioGerencial->ID." está Aguardando Controladoria para avaliação dos itens 4 e 5.<br><br>
			<br><br>
			:tableFooter:
		",
		"footer" => "Relatório Gerencial"
	];

$listEmails = $emails;
$listEmails[] = "gabriel.soares@houseti.com.br";
$m->BCC = $listEmails; 
$html = emailTemplate($emailData);
$m->SUBJECT = "GLOBALBLUE | CNSDATA: Relatório Gerencial Nº ".$thisRelatorioGerencial->ID;
$m->MESSAGE = $html;
$modelLogs->insert([
	"Modulo" => "EMAIL",
	"Funcao" => "ENVIAR",
	"Descricao" => 'Notificação por e-mail (RG)',
	"Conteudo" => ["ID_RG" => $thisRelatorioGerencial->ID, "EmailContent" => $emailData, "BCC" => $listEmails, "send" => $m->send()]
]);


$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function sendRGAction()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
global $thisRelatorioGerencial;
global $_RelatorioGerencial;
global $s;


switch ($thisRelatorioGerencial->Num_Status) {
	case("P"):
		$newNum_Status = "AC";
	$this->sendMailControladoria();
		$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
			"Editado_em" => date("Y-m-d H:i:s"),
			"Num_Status" => $newNum_Status
		]);
		$thisRelatorioGerencial->Num_Status = $newNum_Status;
		$thisRelatorioGerencial->Editado_em = date("Y-m-d H:i:s");
		$s->setIUDState("blk_RelatorioGerencial", "I", "success", "Relatório gerencial enviado com sucesso para controladoria");
	break;
	case("AC"):
		$newNum_Status = "AEC";
		$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
			"Editado_em" => date("Y-m-d H:i:s"),
			"Num_Status" => $newNum_Status
		]);
		$thisRelatorioGerencial->Num_Status = $newNum_Status;
		$thisRelatorioGerencial->Editado_em = date("Y-m-d H:i:s");
		$s->setIUDState("blk_RelatorioGerencial", "I", "success", "Relatório gerencial enviado com sucesso para engenharia central");
	break;
	case("AEC"):
		$newNum_Status = "C";
		$_RelatorioGerencial->save("ID = '".$thisRelatorioGerencial->ID."'", [
			"Editado_em" => date("Y-m-d H:i:s"),
			"Gerado_em" => date("Y-m-d H:i:s"),
			"Num_Status" => $newNum_Status
		]);
		$thisRelatorioGerencial->Num_Status = $newNum_Status;
		$thisRelatorioGerencial->Editado_em = date("Y-m-d H:i:s");
		$thisRelatorioGerencial->Gerado_em = date("Y-m-d H:i:s");
	
	$this->genPDFBackendAction(false);
		$s->setIUDState("blk_RelatorioGerencial", "I", "success", "Relatório gerencial concluído. Está sendo gerado o pdf, isso pode levar alguns minutos.");
	break;
}

$thisRelatorioGerencial;$this->Audit("sendRG", $thisRelatorioGerencial);

$response =$this->response();
$response->status = true;
$response->redirect = '.';
$this->send($response);



$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
}
function styles()
{
$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'on';
                                                                                                                         
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
	.tags-remove-operadora {
		font-size: 18px;
		color: #e06f6f;
		margin: 4px 6px 0 10px;
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
	
	span.ui-select-match-text.pull-left {
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
		position: absolute;
		width: calc(100% - 30px);
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
	
	.fs12 {
		font-size: 12px;
	}
	#tab-fluxo-abordagemOperadoras > div > div > abordagem-operadoras > div.m-t-sm.m-b-sm.overflow-auto > table > thead > tr > td:nth-child(5){min-width:130px}
	ul.ui-select-choices{max-height:100px !important;}
	#tab-fluxo-abordagemOperadoras > div > div > abordagem-operadoras > div.m-t-md.overflow-auto{padding:30px 0 100px !important}
	
	.legenda {
        margin-top: 25px;
        text-align: center;
    }
    .legenda > div {
        display: inline-block;
        margin-right: 10px;
    }
    .legenda > div span.cube {
        display: inline-block;
        width: 13px;
        height: 13px;
        margin-right: 5px;
    }
    .legenda > div span.text-leg {
        font-size: 16px;
        font-weight: 600;
    }
	.graph-title {
        margin-bottom: 25px;
        text-align: center;
    }
    .graph-title span {
        font-size: 20px;
        font-weight: 600;
    }
</style>
<?php

$_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
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
                  $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioGerencial'][substr($val, 1, -1)];
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioGerencial']['iframe_print']) && $_SESSION['sc_session'][$this->Ini->sc_page]['blk_RelatorioGerencial']['iframe_print'] )
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
          $(document).ready(function(){
             submit_Fredir();
          });
          function submit_Fredir()
          {
              document.Fredir.target = "<?php echo $target ?>"; 
              document.Fredir.action = "<?php echo $nm_apl_dest ?>";
              document.Fredir.submit();
          }
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
   $_SESSION['hticnsdata']['blk_RelatorioGerencial']['contr_erro'] = 'off';
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
            nm_limpa_str_blk_RelatorioGerencial($nmgp_val);
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
            nm_limpa_str_blk_RelatorioGerencial($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["RG_ID"])) 
   {
       $_SESSION["RG_ID"] = $_POST["RG_ID"];
       nm_limpa_str_blk_RelatorioGerencial($_SESSION["RG_ID"]);
   }
   if (!isset($_POST["RG_ID"]) && isset($_POST["rg_id"])) 
   {
       $_SESSION["RG_ID"] = $_POST["rg_id"];
       nm_limpa_str_blk_RelatorioGerencial($_SESSION["RG_ID"]);
   }
   if (isset($_GET["RG_ID"])) 
   {
       $_SESSION["RG_ID"] = $_GET["RG_ID"];
       nm_limpa_str_blk_RelatorioGerencial($_SESSION["RG_ID"]);
   }
   if (!isset($_GET["RG_ID"]) && isset($_GET["rg_id"])) 
   {
       $_SESSION["RG_ID"] = $_GET["rg_id"];
       nm_limpa_str_blk_RelatorioGerencial($_SESSION["RG_ID"]);
   }
   if (!isset($_SESSION["RG_ID"])) 
   {
       $_SESSION["RG_ID"] = "";
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
   if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu'];
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu']);
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
        $_SESSION['hticnsdata']['sc_apl_menu_atual'] = "blk_RelatorioGerencial";
        $achou = false;
        if (isset($_SESSION['sc_session'][$hti_cnsdata_init]))
        {
            foreach ($_SESSION['sc_session'][$hti_cnsdata_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'blk_RelatorioGerencial' || $achou)
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
        $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['initialize']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('blk_RelatorioGerencial' == $sReferer || 'blk_RelatorioGerencial_' == substr($sReferer, 0, 23))
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['initialize'] = true;
       }
   }

   $_POST['hti_cnsdata_init'] = $hti_cnsdata_init;
   if (isset($_SESSION['hticnsdata']['sc_outra_jan']) && $_SESSION['hticnsdata']['sc_outra_jan'] == 'blk_RelatorioGerencial')
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['sc_outra_jan'] = true;
        unset($_SESSION['hticnsdata']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$hti_cnsdata_init]['blk_RelatorioGerencial']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/blk_RelatorioGerencial_erro.php");
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
                nm_limpa_str_blk_RelatorioGerencial($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (!isset($RG_ID) && isset($rg_id)) 
       {
           $_SESSION["RG_ID"] = $rg_id;
       }
       if (isset($RG_ID)) 
       {
           $_SESSION['RG_ID'] = $RG_ID;
           nm_limpa_str_blk_RelatorioGerencial($_SESSION["RG_ID"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_blk_RelatorioGerencial = new blk_RelatorioGerencial_apl();
   $contr_blk_RelatorioGerencial->controle();
//
   function nm_limpa_str_blk_RelatorioGerencial(&$str)
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
