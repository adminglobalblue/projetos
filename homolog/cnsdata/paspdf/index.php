<?php
   include_once('blk_PDFPAS_session.php');
   @session_start() ;
   $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil']          = "conn_mysql";
   $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_prod']       = "";
   $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_conf']       = "";
   $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imagens']    = "";
   $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imag_temp']  = "";
   $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_doc']        = "";
//
class blk_PDFPAS_ini
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
      $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['decimal_db'] = "."; 

      $this->nm_cod_apl      = "blk_PDFPAS"; 
      $this->nm_nome_apl     = ""; 
      $this->nm_seguranca    = ""; 
      $this->nm_grupo        = "CNSData"; 
      $this->nm_grupo_versao = "1"; 
      $this->nm_autor        = "admin"; 
      $this->nm_script_by    = "netmake";
      $this->nm_script_type  = "PHP";
      $this->nm_versao_sc    = "v9"; 
      $this->nm_tp_lic_sc    = "sb_bronze"; 
      $this->nm_dt_criacao   = "20171026"; 
      $this->nm_hr_criacao   = "170022"; 
      $this->nm_autor_alt    = "admin"; 
      $this->nm_dt_ult_alt   = "20180526"; 
      $this->nm_hr_ult_alt   = "111124"; 
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
      if(empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_prod']))
      {
              /*check prod*/$_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
      }
      //check img
      if(empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imagens']))
      {
              /*check img*/$_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imagens'] = $str_path_apl_url . "_lib/file/img";
      }
      //check tmp
      if(empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imag_temp']))
      {
              /*check tmp*/$_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
      }
      //check doc
      if(empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_doc']))
      {
              /*check doc*/$_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_doc'] = $str_path_apl_dir . "_lib/file/doc";
      }
      //end check publication with the prod
      $this->sc_site_ssl     = (isset($_SERVER['HTTP_REFERER']) && strtolower(substr($_SERVER['HTTP_REFERER'], 0, 5)) == 'https') ? true : false;
      $this->sc_protocolo    = ($this->sc_site_ssl) ? 'https://' : 'http://';
      $this->sc_protocolo    = "";
      $this->path_prod       = $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_prod'];
      $this->path_conf       = $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_conf'];
      $this->path_imagens    = $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imagens'];
      $this->path_imag_temp  = $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_imag_temp'];
      $this->path_doc        = $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_path_doc'];
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
      $this->path_aplicacao  = substr($this->path_aplicacao, 0, strrpos($this->path_aplicacao, '/')) . '/paspdf';
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
          include_once("blk_PDFPAS_json.php");
      }
      $this->SC_Link_View = (isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Link_View'])) ? $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Link_View'] : false;
      if (isset($_GET['SC_Link_View']) && !empty($_GET['SC_Link_View']) && is_numeric($_GET['SC_Link_View']))
      {
          if ($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['embutida'])
          {
              $this->SC_Link_View = true;
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Link_View'] = true;
          }
      }
      if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "ajax_save_ancor")
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['ancor_save'] = $_POST['ancor_save'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['under_dashboard']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['under_dashboard'] = false;
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['dashboard_app']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['own_widget']      = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['parent_widget']   = '';
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['compact_mode']    = false;
      }
      if (isset($_GET['under_dashboard']) && 1 == $_GET['under_dashboard'])
      {
          if (isset($_GET['own_widget']) && 'dbifrm_widget' == substr($_GET['own_widget'], 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['own_widget'] = $_GET['own_widget'];
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['under_dashboard'] = true;
              if (isset($_GET['dashboard_app'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['dashboard_app'] = $_GET['dashboard_app'];
              }
              if (isset($_GET['parent_widget'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['parent_widget'] = $_GET['parent_widget'];
              }
              if (isset($_GET['compact_mode'])) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['compact_mode'] = 1 == $_GET['compact_mode'];
              }
          }
      }
      elseif (isset($under_dashboard) && 1 == $under_dashboard)
      {
          if (isset($own_widget) && 'dbifrm_widget' == substr($own_widget, 0, 13)) {
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['own_widget'] = $own_widget;
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['under_dashboard'] = true;
              if (isset($dashboard_app)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['dashboard_app'] = $dashboard_app;
              }
              if (isset($parent_widget)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['parent_widget'] = $parent_widget;
              }
              if (isset($compact_mode)) {
                  $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['compact_mode'] = 1 == $compact_mode;
              }
          }
      }
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['maximized'] = false;
      }
      if (isset($_GET['maximized']))
      {
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['maximized'] = 1 == $_GET['maximized'];
      }
      if ($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['under_dashboard'])
      {
          $sTmpDashboardApp = $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['dashboard_info']['dashboard_app'];
          if ('' != $sTmpDashboardApp && isset($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["blk_PDFPAS"]))
          {
              foreach ($_SESSION['hticnsdata']['dashboard_targets'][$sTmpDashboardApp]["blk_PDFPAS"] as $sTmpTargetLink => $sTmpTargetWidget)
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
          unset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao']);
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
      $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['path_doc'] = $this->path_doc; 
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan'])) 
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
      include_once($this->path_aplicacao . "blk_PDFPAS_erro.class.php"); 
      $this->Erro = new blk_PDFPAS_erro();
      include_once($this->path_adodb . "/adodb.inc.php"); 
      $this->sc_Include($this->path_libs . "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
      $this->sc_Include($this->path_libs . "/nm_ini_perfil.php", "F", "perfil_lib") ; 
// 
 if(function_exists('set_php_timezone')) set_php_timezone('blk_PDFPAS'); 
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
      $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['seq_dir'] = 0; 
      $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['sub_dir'] = array(); 
      $_SESSION['hticnsdata']['nm_bases_security']  = "enc_nm_enc_v1DcBiDQJwD1NKVWJsDMrYVcFKV5FGVEF7HQNwZ1FaHANOD5NUDMBYHArCDWF/VoBiDcJUZSX7Z1BYHuFaDMvOV9FeV5X/VEBiHQXOVIJsHAvCZMFaHgBOVkJqDWBmVoFGHQFYDuBqD1veHQFaDMNOVcBUDWrmDoXGHQXOVIJsD1rKHQFUHgNOHErsHEB7VoFGHQJeDQFaZ1N7HQXGDMvsVcFeDWBmVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DurmZuJsHQXsDQFUHIrKHQrqDMzGVcBUDuFGDoXGHQBsZkFGZ1rYHQFaDMveVkJqDWFGVoFGHQBiZ9XGDSBYV5FaHgvOVIBsH5B3DoXGHQXOZSBOHAvsZMB/HgNOHEJqDurmDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQXGH9BOD1zGD5XGHgNOHENiHEB7VoFGHQJeDQBqHIrwHQJeHgrwZSJqDWBmDoXGHQXGZ1FGZ1NOHuFaHgvsVkJ3DWB3VoFGHQNwDQBqD1BeHQJsDMBYZSNiH5XKVoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQJmVIJsDSvmD5FaHgNOHEBUDWr/DoB/DcBwZSFGHANOV5FUHuNOV9FiDWXCHMFaD9JmZ1B/HIrwV5FaDErKDkBsV5FaHMJeDcBwDQFGD1veHQXGHgvsVcBOHEX7DoraHQFYH9B/Z1NOD5FaDEvsVkXeV5XKDoB/D9NmZSFGHIrwVWXGHuzGVIBOV5X7VoraD9BiZ1FUZ1BeD5JeDMBYZSJGDWr/VoXGD9NwDQJwD1veV5FGHgvsVcFCH5FqDoraHQFYVIJwD1rwV5FGDEBeHEXeH5X/DoF7D9NwZSX7D1BeV5raHuvmVcFKV5X7VoFGD9BiZ1X7Z1BeHQFUHgBOHEJqDWB3DoBOHQBiDQBqHArYHuXGDMvOVIBsHEFGVoF7HQNwZSBqHArKV5FUDMrYZSXeV5FqHIJsD9NmH9FUZ1rwD5BOHgrKZSJqDWXCHMFaHQNmH9BqD1rwHQFGHgBODkB/DuJeVoFaD9JKZ9F7HAveHuFaHuNOZSrCH5FqDoXGHQJmZ1FUZ1BeD5F7DEBOHEFiHEFaDoFUHQFYDQFaD1veHuBiDMBOVcFeDWFaHIXGHQFYZSFaHArKV5XGDErKHErCDWF/VoBiDcJUZSX7Z1BYHuFaDMvmVcFKV5BmVoBqD9BsZkFGHArKHuJeDENOHArsDWFqZuFaHQXODQJsDSrwHQrqHuvmVcFKDur/DoJeHQNwZ1rqHABYD5BqHgNKHErCDWF/VoBiDcJUZSX7Z1BYHuFaHuzGDkBODWJeVoJwDcBqZSFaHAN7D5FaDEBOVkJGHEXCVoB/HQJKDQJsZ1vCV5FGHuNOV9FeDWB3VoX7HQNmZ1BiHAzGZMXGHgveHErsDWB3DoBOHQXOZSBiHAveD5NUHgNKDkBOV5FYHMBiD9JmVIJsDSvOZMXGHgrKHEXeV5FaHMXGDcBwZSX7HIrKD5JeHgrwVcB/H5XCVENUHQBsZkFGHArKV5FUDMrYZSXeV5FqHIJsHQFYH9BiHAvOV5BiHgrwVcFKDWFYVoBqD9BsZSB/Z1BeV5FGDEBOZSXeDuFaVoXGDcJeDuBOHAveD5JsHgvsV9FiDWXCHMBqD9BsZSB/HANOD5FaDErKVkXeV5FqDoraVQBwVIB/D1BeV5JwHgNKVcFeDWFYHMBqHQXGZSBqHArYHuBqHgrKHAFKV5FqHMBqHQXsDuFaHAveD5NUHgNKDkBOV5FYHMBiHQBqZkFUZ1vmD5Bq";
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan'])) 
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
              if (isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao']) && $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil']) && $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil'] == $NM_con_orig)
              {
/*NM*/            $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil'] = $NM_con_dest;
              }
              if (isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_con_' . $NM_con_orig]))
              {
                  $_SESSION['hticnsdata']['blk_PDFPAS']['glo_con_' . $NM_con_orig] = $NM_con_dest;
              }
          }
      }
      $con_devel             = (isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao'])) ? $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao'] : ""; 
      $perfil_trab           = ""; 
      $this->nm_falta_var    = ""; 
      $this->nm_falta_var_db = ""; 
      $nm_crit_perfil        = false;
      if (isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao']))
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
      if (isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil']) && !empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil']))
      {
          $perfil_trab = $_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_perfil'];
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
      if (!isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['embutida_init']) || !$_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['embutida_init']) 
      {
          if (!isset($_SESSION['blk_PDFPAS_ID_PAS'])) 
          {
              $this->nm_falta_var .= "blk_PDFPAS_ID_PAS; ";
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
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['decimal_db'] = $_SESSION['hticnsdata']['glo_decimal_db']; 
      }
      if (isset($_SESSION['hticnsdata']['glo_date_separator']) && !empty($_SESSION['hticnsdata']['glo_date_separator']))
      {
          $SC_temp = trim($_SESSION['hticnsdata']['glo_date_separator']);
          if (strlen($SC_temp) == 2)
          {
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date']  = substr($SC_temp, 0, 1); 
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date1'] = substr($SC_temp, 1, 1); 
          }
          else
           {
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date']  = $SC_temp; 
              $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date1'] = $SC_temp; 
          }
          $this->date_delim  = $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date'];
          $this->date_delim1 = $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date1'];
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
          if (!$_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu'] && (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan']) || !$_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan'])) 
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
      if (isset($_SESSION['hticnsdata']['nm_sc_retorno']) && !empty($_SESSION['hticnsdata']['nm_sc_retorno']) && isset($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao']) && !empty($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao']))
      { 
          $this->Db = db_conect_devel($_SESSION['hticnsdata']['blk_PDFPAS']['glo_nm_conexao'], $this->root . $this->path_prod, 'CNSData'); 
      } 
      else 
      { 
          ob_start();
          $this->Db = db_conect($this->nm_tpbanco, $this->nm_servidor, $this->nm_usuario, $this->nm_senha, $this->nm_banco, $glo_senha_protect, "S", $this->nm_con_persistente, $this->nm_con_db2, $this->nm_database_encoding, $this->nm_arr_db_extra_args); 
          if (!isset($this->Ajax_result_set)) {$this->Ajax_result_set = ob_get_contents();}
          ob_end_clean();
      } 
      if (!$_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['embutida'])
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
          $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['decimal_db'] = "."; 
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
           if (isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date']))
           {
               $delim  = $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date'];
               $delim1 = $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_sep_date1'];
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
       return (isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Gb_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Gb_date_format'][$GB][$cmp] : "";
   }

   function Get_Gb_prefix_date_format($GB, $cmp)
   {
       return (isset($_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Gb_prefix_date_format'][$GB][$cmp])) ? $_SESSION['sc_session'][$this->sc_page]['blk_PDFPAS']['SC_Gb_prefix_date_format'][$GB][$cmp] : "";
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
class blk_PDFPAS_apl
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

      $this->Ini = new blk_PDFPAS_ini(); 
      $this->Ini->init();
      $this->Change_Menu = false;
      if (isset($_SESSION['hticnsdata']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['blk_PDFPAS']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['blk_PDFPAS']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['blk_PDFPAS']))
          {
              $this->sc_init_menu = $_SESSION['hticnsdata'][$_SESSION['hticnsdata']['menu_atual']]['sc_init']['blk_PDFPAS'];
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
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_PDFPAS']))
          {
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_PDFPAS']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('blk_PDFPAS') . "/";
               $_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu]['blk_PDFPAS']['label'] = "" . $this->Ini->Nm_lang['lang_othr_blank_title'] . "";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['hticnsdata']['menu_apls'][$_SESSION['hticnsdata']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "blk_PDFPAS")
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
      if (isset($_SESSION['hticnsdata']['sc_apl_conf']['blk_PDFPAS']['exit']) && $_SESSION['hticnsdata']['sc_apl_conf']['blk_PDFPAS']['exit'] != '')
      {
          $_SESSION['hticnsdata']['sc_url_saida'][$this->Ini->sc_page] = $_SESSION['hticnsdata']['sc_apl_conf']['blk_PDFPAS']['exit'];
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
      include_once($this->Ini->path_aplicacao . "blk_PDFPAS_erro.class.php"); 
      $this->Erro      = new blk_PDFPAS_erro();
      $this->Erro->Ini = $this->Ini;
//
      $_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
if (!isset($_SESSION['blk_PDFPAS_ID_PAS'])) {$_SESSION['blk_PDFPAS_ID_PAS'] = "";}
if (!isset($this->sc_temp_blk_PDFPAS_ID_PAS)) {$this->sc_temp_blk_PDFPAS_ID_PAS = (isset($_SESSION['blk_PDFPAS_ID_PAS'])) ? $_SESSION['blk_PDFPAS_ID_PAS'] : "";}
               sc_include_library("sys", "functions", "functions.php");
sc_include_library('sys', 'dompdf', 'dompdf.php');
$geraPDF = $_GET['geraPDF'] ?? null;
if (!$geraPDF){
	sc_include_library('sys', 'initCustom', 'loading_pdf.php');
$data = [ "subject" => $this->Ini->Nm_lang['lang_label_pasUpc'] ];
	loadingPDF($this,$data); 
	die();
}

$options = getOptionDompdf();
$options->set('defaultFont', 'Arial');
$dompdf = getDompdfObj($options);

sc_include_library("sys", "models", "Excecoes.php");
$_Excecoes = new Excecoes($this);

$cssPDF = mountCSS(15, 15, 15, 25);
$cssPDF .=$this->mountSAECSS();

$ID_PAS = $this->sc_temp_blk_PDFPAS_ID_PAS;

 
      $nm_select = "
    SELECT 
    tb1.ID as ID,
    tb1.Tipo_OP as Tipo_OP,
    tb1.ID_OP as ID_OP,
    tb1.Referente as Referente,
    CASE  
        WHEN tb1.Tipo_OP = 'O' THEN (
            SELECT Nom_Operadoras 
            FROM tb_operadoras 
            WHERE ID_Operadoras = tb1.ID_OP
        )
        WHEN tb1.Tipo_OP = 'P' THEN (
            SELECT Nom_RazaoSocial 
            FROM tb_prestadores 
            WHERE ID_Prestador = tb1.ID_OP
        )
    END as RazaoSocial,
    CASE  
        WHEN tb1.Tipo_OP = 'O' THEN (
            SELECT MASK(Num_CNPJ, '##.###.###/####-##')
            FROM tb_operadoras 	
            WHERE ID_Operadoras = tb1.ID_OP
        )
        WHEN tb1.Tipo_OP = 'P' THEN (
            SELECT MASK(Num_CNPJ, '##.###.###/####-##') 
            FROM tb_prestadores 
            WHERE ID_Prestador = tb1.ID_OP
        )
    END as Num_CNPJ,
    CASE  
        WHEN tb1.Tipo_OP = 'O' THEN (
            SELECT 
                CONCAT(
                    tb2.End_Logradouro,', ',
                    tb2.End_Numero,
                    IF(tb2.End_Complemento != '', 
                        CONCAT(', ',tb2.End_Complemento), ''
                    ),', ',
                    tb2.End_Bairro,', ',
                    tb2.End_Cidade,', ',
                    tb2.End_UF,' - ',
                    MASK(tb2.End_CEP, '#####-###')
                ) FROM tb_operadoras as tb2
            WHERE ID_Operadoras = tb1.Endereco
        )
        WHEN tb1.Tipo_OP = 'P' THEN (
            SELECT 
                CONCAT(
                    tb3.End_Logradouro,', ',
                    tb3.End_Numero,
                    IF(tb3.End_Complemento != '', 
                        CONCAT(', ',tb3.End_Complemento), ''
                    ),', ',
                    tb3.End_Bairro,', ',
                    tb3.End_Cidade,', ',
                    tb3.End_UF,' - ',
                    MASK(tb3.End_CEP, '#####-###')
                ) FROM tb_infoprestadores as tb3
            WHERE ID = tb1.Endereco
        )
    END as End_Principal,
	CASE  
        WHEN tb1.Tipo_OP = 'O' THEN (
            SELECT IMG_Logo FROM tb_operadoras as tb2
            WHERE ID_Operadoras = tb1.Endereco
        )
        WHEN tb1.Tipo_OP = 'P' THEN (
            SELECT IMG_Logo FROM tb_infoprestadores as tb3
            WHERE ID = tb1.Endereco
        ) 
    END as IMG_Logo,
    CONCAT(
        End_Obra_Logradouro,', ',
        End_Obra_Numero,
        IF(End_Obra_Complemento != '', 
            CONCAT(', ',End_Obra_Complemento), ''
        ),', ',
        End_Obra_Bairro,', ',
        End_Obra_Cidade,', ',
        End_Obra_UF,' - ',
        MASK(End_Obra_CEP, '#####-###')
    ) as End_Obra,
    tb1.Condominio as Condominio,
    tb1.Cliente as Cliente,
    (SELECT tb4.Nom_Contato FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal) as ContatoPrincipal,
    CASE  
        WHEN tb1.EmailContatoPrincipal = '1' THEN (
            (SELECT tb4.Nom_EmailContato1 FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal)
        )
        WHEN tb1.EmailContatoPrincipal = '2' THEN (
            (SELECT tb4.Nom_EmailContato2 FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal)
        )
        WHEN tb1.EmailContatoPrincipal = '3' THEN (
            (SELECT tb4.Nom_EmailContato3 FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal)
        )
    END as EmailContatoPrincipal,
    CASE  
        WHEN tb1.TelefoneContatoPrincipal = '1' THEN (
            (SELECT IF(length(tb4.Num_Telefone1) = 10, MASK(tb4.Num_Telefone1, '(##) ####-####'), MASK(tb4.Num_Telefone1, '(##) #####-####')) FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal)
        )
        WHEN tb1.TelefoneContatoPrincipal = '2' THEN (
            (SELECT IF(length(tb4.Num_Telefone2) = 10, MASK(tb4.Num_Telefone2, '(##) ####-####'), MASK(tb4.Num_Telefone2, '(##) #####-####')) FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal)
        )
        WHEN tb1.TelefoneContatoPrincipal = '3' THEN (
            (SELECT IF(length(tb4.Num_Telefone3) = 10, MASK(tb4.Num_Telefone3, '(##) ####-####'), MASK(tb4.Num_Telefone3, '(##) #####-####')) FROM tb_contatos as tb4 WHERE ID = tb1.ContatoPrincipal)
        )
    END as TelefoneContatoPrincipal,
    (SELECT tb4.Nom_Contato FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro) as ContatoFinanceiro,
    CASE  
        WHEN tb1.EmailContatoFinanceiro = '1' THEN (
            (SELECT tb4.Nom_EmailContato1 FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro)
        )
        WHEN tb1.EmailContatoFinanceiro = '2' THEN (
            (SELECT tb4.Nom_EmailContato2 FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro)
        )
        WHEN tb1.EmailContatoFinanceiro = '3' THEN (
            (SELECT tb4.Nom_EmailContato3 FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro)
        )
    END as EmailContatoFinanceiro,
    CASE  
        WHEN tb1.TelefoneContatoFinanceiro = '1' THEN (
            (SELECT IF(length(tb4.Num_Telefone1) = 10, MASK(tb4.Num_Telefone1, '(##) ####-####'), MASK(tb4.Num_Telefone1, '(##) #####-####')) FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro)
        )
        WHEN tb1.TelefoneContatoFinanceiro = '2' THEN (
            (SELECT IF(length(tb4.Num_Telefone2) = 10, MASK(tb4.Num_Telefone2, '(##) ####-####'), MASK(tb4.Num_Telefone2, '(##) #####-####')) FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro)
        )
        WHEN tb1.TelefoneContatoFinanceiro = '3' THEN (
            (SELECT IF(length(tb4.Num_Telefone3) = 10, MASK(tb4.Num_Telefone3, '(##) ####-####'), MASK(tb4.Num_Telefone3, '(##) #####-####')) FROM tb_contatos as tb4 WHERE ID = tb1.ContatoFinanceiro)
        )
    END as TelefoneContatoFinanceiro,
    (SELECT tb5.Nom_Nome FROM tb_usuarios as tb5 WHERE ID_Usuario = tb1.ID_Usuario_ContatoConsultor) as ContatoConsultor,
	tb1.Origem as Origem,
	tb1.ID_Origem as ID_Origem,
	DATE_FORMAT(tb1.DataCriacao, '%d/%m/%Y %H:%i') as DataCriacao,
	tb1.GBImprimeDocumento as GBImprimeDocumento
    FROM tb_pas as tb1
    WHERE tb1.ID = '$ID_PAS'
"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->pasdata = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->pasdata = false;
          $this->pasdata_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->pasdata );

$Excecoes = $_Excecoes->getByPas(intval($ID_PAS));
if (!$Excecoes) {
	$Excecoes = [
		"QtdHorasAP" => 0,
		"QtdPercST" => 0.000000,
		"QtdDiasPag" => 10
	];
}

if (isset($this->pasdata [0])) {
	$Excecoes = $_Excecoes->getByPas(intval($ID_PAS));
	if (!$Excecoes) {
		$Excecoes = [
			"QtdHorasAP" => 0,
			"QtdPercST" => 0.000000,
			"QtdDiasPag" => 10
		];
	}
	$this->pasdata [0]["QtdDiasPag"] = $Excecoes["QtdDiasPag"];
	
	sc_include_library("sys", "functions", "functions.php");
	if ($this->pasdata [0]["Origem"] == "PROJETO") {
		$sql = "SELECT 
				REPLACE(CAST(tb4.SupervisaoTecnicaComercial AS CHAR), '.', ',') as SupervisaoTecnicaComercial,
				REPLACE(CAST(tb4.SupervisaoTecnicaForaComercial AS CHAR), '.', ',') as SupervisaoTecnicaForaComercial,
				REPLACE(CAST(tb4.SupervisaoTecnicaFdsFeriado AS CHAR), '.', ',') as SupervisaoTecnicaFdsFeriado,
				REPLACE(CAST(tb4.Deslocamento AS CHAR), '.', ',') as Deslocamento,				
				REPLACE(CAST(tb4.AdicionalNoturno AS CHAR), '.', ',') as AdicionalNoturno,
				DATE_FORMAT(tb4.HorarioInicioAdicionalNoturno, '%Hh%im') as HorarioInicioAdicionalNoturno,
				DATE_FORMAT(tb4.HorarioFimAdicionalNoturno, '%Hh%im') as HorarioFimAdicionalNoturno,
				REPLACE(CAST(tb4.AnaliseProjeto AS CHAR), '.', ',') as AnaliseProjeto
			FROM tb_projetos as tb1
			INNER JOIN tb_empreendimentovalores as tb4 ON tb4.ID_Empreendimento = tb1.ID_Empreendimento
			WHERE tb1.ID_projeto = '".$this->pasdata [0]["ID_Origem"]."'";
	} else {
		$sql = "SELECT 
				REPLACE(CAST(tb4.SupervisaoTecnicaComercial AS CHAR), '.', ',') as SupervisaoTecnicaComercial,
				REPLACE(CAST(tb4.SupervisaoTecnicaForaComercial AS CHAR), '.', ',') as SupervisaoTecnicaForaComercial,
				REPLACE(CAST(tb4.SupervisaoTecnicaFdsFeriado AS CHAR), '.', ',') as SupervisaoTecnicaFdsFeriado,
				REPLACE(CAST(tb4.Deslocamento AS CHAR), '.', ',') as Deslocamento,				
				REPLACE(CAST(tb4.AdicionalNoturno AS CHAR), '.', ',') as AdicionalNoturno,
				DATE_FORMAT(tb4.HorarioInicioAdicionalNoturno, '%Hh%im') as HorarioInicioAdicionalNoturno,
				DATE_FORMAT(tb4.HorarioFimAdicionalNoturno, '%Hh%im') as HorarioFimAdicionalNoturno,
				REPLACE(CAST(tb4.AnaliseProjeto AS CHAR), '.', ',') as AnaliseProjeto
			FROM tb_sae as tb1
			INNER JOIN tb_empreendimentovalores as tb4 ON tb4.ID_Empreendimento = tb1.ID_Empreendimento
			WHERE tb1.Num_SAE = '".$this->pasdata [0]["ID_Origem"]."'";
	}
	 
      $nm_select = $sql; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->empreendimentovalores = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->empreendimentovalores = false;
          $this->empreendimentovalores_erro = $this->Db->ErrorMsg();
      } 
;
	_select($this->empreendimentovalores );
	$this->empreendimentovalores  = isset($this->empreendimentovalores [0]) ? $this->empreendimentovalores [0] : array(
		"SupervisaoTecnicaComercial" => "",
		"SupervisaoTecnicaForaComercial" => "",
		"SupervisaoTecnicaFdsFeriado" => "",
		"Deslocamento" => "",
		"AnaliseProjeto" => "",
		"AdicionalNoturno" => "",
		"HorarioInicioAdicionalNoturno" => "",
		"HorarioFimAdicionalNoturno" => "",
		"AnaliseProjeto" => ""
	);
	$this->pasdata [0] = array_merge($this->pasdata [0], $this->empreendimentovalores );
}

 
      $nm_select = "
    SELECT 
        tb1.Descricao as Descricao,
        DATE_FORMAT(tb1.Prev_Data_Inicio, '%d/%m/%Y %H:%i') as Prev_Data_Inicio,
        DATE_FORMAT(tb1.Prev_Data_Fim, '%d/%m/%Y %H:%i') as Prev_Data_Fim,
        tb1.Prev_Horas as Prev_Horas,
        DATE_FORMAT(tb1.Real_Data_Inicio, '%d/%m/%Y %H:%i') as Real_Data_Inicio,
        DATE_FORMAT(tb1.Real_Data_Fim, '%d/%m/%Y %H:%i') as Real_Data_Fim,
        tb1.Real_Horas as Real_Horas
    FROM tb_pasitens as tb1
    WHERE ID_PAS = '$ID_PAS' 
"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($this->pasdataitens = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->pasdataitens = false;
          $this->pasdataitens_erro = $this->Db->ErrorMsg();
      } 
;
_select($this->pasdataitens );

if ($this->pasdata [0]["IMG_Logo"]) {
	$resource = imagecreatefromstring($this->pasdata [0]["IMG_Logo"]);
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
	$this->pasdata [0]["IMG_Logo"] = "<img style='width:".$nx."px;heigth:".$ny."px' src='data:image/png;base64,".base64_encode($this->pasdata [0]["IMG_Logo"])."'>";
}

$contentPAS = "<html>";
$contentPAS = $cssPDF;
$contentPAS .= "<body>
	<div class='headerHtml'>
		<img src='../_lib/img/sys__NM__img__NM__GLOBALBLUE.png' style='width:450px'>
	</div>
	<div class='footerHtml'>
		<table class='rodape2 col-12'>
			<tbody>
				<tr>
					<td>".$this->Ini->Nm_lang['lang_label_footer_pdfpas']."</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class='content'>
";
if (isset($this->pasdata [0]) && $this->pasdata [0]["Referente"] == "ST") {
	$contentPAS .=$this->mountHTML_ST("geral", $this->pasdata [0]);
	if (isset($this->pasdataitens [0]) && count($this->pasdataitens [0])) {
		foreach($this->pasdataitens  as $i => $row) {
			$this->pasdataitens [$i]["Real_Horas"] = convertNumberInStringHour($this->pasdataitens [$i]["Real_Horas"]);
			$this->pasdataitens [$i]["Prev_Horas"] = convertNumberInStringHour($this->pasdataitens [$i]["Prev_Horas"]);
			if (!$this->pasdataitens [$i]['Real_Data_Inicio'] && !($this->pasdataitens [$i]['Real_Data_Fim'])){
				$this->pasdataitens [$i]['Real_Horas'] = null;
			}
		}
		$contentPAS .= "<p style='font-size:5px'>&nbsp;</p>".$this->mountHTML_ST("item", $this->pasdataitens );
	}
	$resumo =$this->getResumo_ST();
	$this->pasdata [0]["Prev_Data_Inicio"] = $resumo["Prev_Data_Inicio"];
	$this->pasdata [0]["Prev_Hora_Inicio"] = $resumo["Prev_Hora_Inicio"];
	$this->pasdata [0]["Prev_Data_Fim"] = $resumo["Prev_Data_Fim"]; 
	$this->pasdata [0]["Prev_Hora_Fim"] = $resumo["Prev_Hora_Fim"]; 
	$this->pasdata [0]["Prev_Valor"] = $resumo["Prev_Valor"];
	$this->pasdata [0]["Real_Data_Inicio"] = $resumo["Real_Data_Inicio"];
	$this->pasdata [0]["Real_Hora_Inicio"] = $resumo["Real_Hora_Inicio"];
	$this->pasdata [0]["Real_Data_Fim"] = $resumo["Real_Data_Fim"]; 
	$this->pasdata [0]["Real_Hora_Fim"] = $resumo["Real_Hora_Fim"]; 
	$this->pasdata [0]["Real_Valor"] = $resumo["Real_Valor"];
	$contentPAS .= "<p style='font-size:5px'>&nbsp;</p>".$this->mountHTML_ST("resumo", $this->pasdata [0]);
} elseif (isset($this->pasdata [0])) {
	$contentPAS .=$this->mountHTML_AP("geral", $this->pasdata [0]);
	if (isset($this->pasdataitens [0]) && count($this->pasdataitens [0])) {
		foreach($this->pasdataitens  as $i => $row) {
			$this->pasdataitens [$i]["Real_Horas"] = convertNumberInStringHour($this->pasdataitens [$i]["Real_Horas"]);
			$this->pasdataitens [$i]["Prev_Horas"] = convertNumberInStringHour($this->pasdataitens [$i]["Prev_Horas"]);
		}
		$contentPAS .= "<p style='font-size:5px'>&nbsp;</p>".$this->mountHTML_AP("item", $this->pasdataitens );
	}
	$resumo =$this->getResumo_AP();
	$this->pasdata [0]["Real_Horas"] = convertNumberInStringHour($resumo["Horas"]);
	$this->pasdata [0]["Real_Valor"] = $resumo["Valor"];
	$this->pasdata [0]["GBImprimeDocumento_N"] = $this->pasdata [0]["GBImprimeDocumento"] == "N" ? "X" : "&nbsp;&nbsp;";
	$this->pasdata [0]["GBImprimeDocumento_S"] = $this->pasdata [0]["GBImprimeDocumento"] == "S" ? "X" : "&nbsp;&nbsp;";
	$contentPAS .= "<p style='font-size:5px'>&nbsp;</p>".$this->mountHTML_AP("resumo", $this->pasdata [0]);
}
$contentPAS .=$this->rodape1();

$contentPAS .= "</div></body></html>";

$dompdf->loadHtml($contentPAS);

$dompdf->loadHtml($contentPAS);

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();


$dompdf->stream("PAS_$ID_PAS.pdf", array("Attachment" => false));
if (isset($this->sc_temp_blk_PDFPAS_ID_PAS)) {$_SESSION['blk_PDFPAS_ID_PAS'] = $this->sc_temp_blk_PDFPAS_ID_PAS;}
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off'; 
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
function compileHTML($template="", $data=[])
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
               
foreach ($data as $key => $value) {
	$template = preg_replace("/:$key:/", $value != '' ? $value : '&nbsp;', $template);
}
return $template;

$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
}
function getResumo_AP()
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
if (!isset($_SESSION['blk_PDFPAS_ID_PAS'])) {$_SESSION['blk_PDFPAS_ID_PAS'] = "";}
if (!isset($this->sc_temp_blk_PDFPAS_ID_PAS)) {$this->sc_temp_blk_PDFPAS_ID_PAS = (isset($_SESSION['blk_PDFPAS_ID_PAS'])) ? $_SESSION['blk_PDFPAS_ID_PAS'] : "";}
               
sc_include_library("sys", "functions", "functions.php");

 
      $nm_select = "select 
		SUM(Real_Horas) as Horas,
		REPLACE(CAST(SUM(Real_Valor) AS CHAR), '.', ',') as Valor
	FROM
		tb_pasitens
	WHERE ID_PAS = '$this->sc_temp_blk_PDFPAS_ID_PAS'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($resumoitens = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $resumoitens = false;
          $resumoitens_erro = $this->Db->ErrorMsg();
      } 
;
_select($resumoitens );
$resumoitens  = isset($resumoitens [0]) ? $resumoitens [0] : [];

if (count($resumoitens )) return $resumoitens ;
else return ["Horas" => "", "Valor" => ""];
if (isset($this->sc_temp_blk_PDFPAS_ID_PAS)) {$_SESSION['blk_PDFPAS_ID_PAS'] = $this->sc_temp_blk_PDFPAS_ID_PAS;}
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
}
function getResumo_ST()
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
if (!isset($_SESSION['blk_PDFPAS_ID_PAS'])) {$_SESSION['blk_PDFPAS_ID_PAS'] = "";}
if (!isset($this->sc_temp_blk_PDFPAS_ID_PAS)) {$this->sc_temp_blk_PDFPAS_ID_PAS = (isset($_SESSION['blk_PDFPAS_ID_PAS'])) ? $_SESSION['blk_PDFPAS_ID_PAS'] : "";}
               
sc_include_library("sys", "functions", "functions.php");

 
      $nm_select = "select 
		DATE_FORMAT(MIN(Prev_Data_Inicio), '%d/%m/%Y') as Prev_Data_Inicio,
		DATE_FORMAT(MIN(Prev_Data_Inicio), '%H:%i') as Prev_Hora_Inicio,
        DATE_FORMAT(MAX(Prev_Data_Fim), '%d/%m/%Y') as Prev_Data_Fim,
		DATE_FORMAT(MAX(Prev_Data_Fim), '%H:%i') as Prev_Hora_Fim,
        SUM(Prev_Horas) as Prev_Horas,
		REPLACE(CAST(SUM(Prev_Valor) AS CHAR), '.', ',') as Prev_Valor,
        DATE_FORMAT(MIN(Real_Data_Inicio), '%d/%m/%Y') as Real_Data_Inicio,
		DATE_FORMAT(MIN(Real_Data_Inicio), '%H:%i') as Real_Hora_Inicio,
        DATE_FORMAT(MAX(Real_Data_Fim), '%d/%m/%Y') as Real_Data_Fim,
		DATE_FORMAT(MAX(Real_Data_Fim), '%H:%i') as Real_Hora_Fim,
		SUM(Real_Horas) as Real_Horas,
		REPLACE(CAST(SUM(Real_Valor) AS CHAR), '.', ',') as Real_Valor
	FROM
		tb_pasitens
	WHERE ID_PAS = '$this->sc_temp_blk_PDFPAS_ID_PAS'"; 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = ''; 
      if ($resumoitens = $this->Db->Execute($nm_select)) 
      { }
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $resumoitens = false;
          $resumoitens_erro = $this->Db->ErrorMsg();
      } 
;

_select($resumoitens );
$resumoitens  = isset($resumoitens [0]) ? $resumoitens [0] : [];

if (count($resumoitens )) return $resumoitens ;
else {
	return [
		"Prev_Data_Inicio" => "", 
		"Prev_Data_Fim" => "",
		"Prev_Horas" => "",
		"Prev_Valor" => "",
		"Real_Data_Inicio" => "",
		"Real_Data_Fim" => "",
		"Real_Horas" => "",
		"Real_Valor" => ""
	];
}
if (isset($this->sc_temp_blk_PDFPAS_ID_PAS)) {$_SESSION['blk_PDFPAS_ID_PAS'] = $this->sc_temp_blk_PDFPAS_ID_PAS;}
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
}
function mountHTML_AP($block="", $data=[])
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
               
$geralHTML = '<table><tbody>
        <tr>
            <td colspan="8" class="col-8">
                <label style="font-size:20px">'.$this->Ini->Nm_lang['lang_label_PAS'].'</label></td>
            <td colspan="4" class="col-4">
                <label style="font-size:20px">Nº :ID:</label>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="col-6">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_companyname'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:RazaoSocial:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_completeAddress'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:End_Principal:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>CNPJ</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:Num_CNPJ:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_contact'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:ContatoPrincipal:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_email'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:EmailContatoPrincipal:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_completeAddress'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:End_Obra:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="3" class="col-3 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_condominio'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:Condominio:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="3" class="col-3 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_client'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:Cliente:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_contact'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:ContatoFinanceiro:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_phone'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:TelefoneContatoFinanceiro:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_email'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:EmailContatoFinanceiro:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_contactGB'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:ContatoConsultor:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_referent'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>'.$this->Ini->Nm_lang['lang_label_projectAnalysis'].'</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>';

$itemHTML = '<table border="1" cellspacing="0" style="width:100%;">
		<tbody>
			<tr>
				<td colspan="6" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_serviceDescription'].'</label></td>
				<td colspan="6" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_accomplished'].'</label></td>
			</tr>
			<tr>
				<td colspan="6" class="ddouble-line col-6 center">:Descricao:</td>
				<td colspan="2" class="center col-2 vert-top">
					<table class="label-top col-12 center">
						<tbody>
							<tr>
								<td><label>'.$this->Ini->Nm_lang['lang_label_start'].'</label></td>
							</tr>
							<tr>
								<td>
									<label>:Real_Data_Inicio:</label>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td colspan="2" class="center col-2 vert-top">
					<table class="label-top col-12 center">
						<tbody>
							<tr>
								<td><label>'.$this->Ini->Nm_lang['lang_label_end'].'</label></td>
							</tr>
							<tr>
								<td>
									<label>:Real_Data_Fim:</label>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td colspan="2" class="center col-2 vert-top">
					<table class="label-top col-12 center">
						<tbody>
							<tr>
								<td><label class="center">'.$this->Ini->Nm_lang['lang_label_hours'].'</label></td>
							</tr>
							<tr>
								<td>
									<label>:Real_Horas:</label>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>';

$resumoHTML = '<table border="1" cellspacing="0" class="col-12">
		<tbody>
			<tr>
				<td colspan="8" rowspan="1" class="center col-8 header"><label>'.$this->Ini->Nm_lang['lang_label_pdf_pas1'].'</label></td>
				<td colspan="4" rowspan="1" class="center col-4 header"><label>'.$this->Ini->Nm_lang['lang_label_pdf_pas2'].'</label></td>
			</tr>
			<tr>			
				<td colspan="8" rowspan="2" class="center col-8">'.$this->Ini->Nm_lang['lang_label_pdf_pas3'].':AnaliseProjeto:'.$this->Ini->Nm_lang['lang_label_pdf_pas3_2'].')</td>
				<td colspan="4" rowspan="1" class="center col-4">:Real_Horas:</td>
			</tr>
			<tr>
				<td colspan="4" rowspan="1"  class="col-4">
					<label>Total(R$): :Real_Valor:</label>
				</td>
			</tr>
			<tr>
				<td colspan="12">
					<ul>
						'.$this->Ini->Nm_lang['lang_label_pdf_pas4'].'						
						'.$this->Ini->Nm_lang['lang_label_pdf_pas4_1'].':QtdDiasPag:'.$this->Ini->Nm_lang['lang_label_pdf_pas4_2'].'
						'.$this->Ini->Nm_lang['lang_label_pdf_pas4_3'].'
					</ul>
				</td>
			</tr>
			<tr>
				<td colspan="12">
					[:GBImprimeDocumento_N:] '.$this->Ini->Nm_lang['lang_label_print_project_doc'].'<br>
					[:GBImprimeDocumento_S:] '.$this->Ini->Nm_lang['lang_label_print_project_doc2'].'
				</td>
			</tr>
			<tr>
				<td colspan="4" rowspan="1" class="center col-4">
					<table class="assinatura col-12">
						<tbody>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td class="center">'.$this->Ini->Nm_lang['lang_label_responsibleApplicant'].'</td>
							</tr>
						</tbody>
					</table>
				</td>
				<td colspan="4" rowspan="1" class="center col-4">
					:IMG_Logo:
				</td>
				<td colspan="4" rowspan="1" class="center col-4">
					<table class="assinatura col-12">
						<tbody>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td class="center">'.$this->Ini->Nm_lang['lang_label_responsibleController'].'</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="12" class="col-12">
					<label>Data: :DataCriacao:</label>
				</td>
			</tr>
		</tbody>
	</table>';

switch ($block) {
	case 'geral':
		return$this->compileHTML($geralHTML,$data);
	break;
	case 'item':
		$content = "";		
		foreach ($data as $key => $value) {
			$value['idx'] = (1 + $key);
			$content .=$this->compileHTML($itemHTML, $value);
		}
		return $content;
	break;
	case 'resumo':
		return$this->compileHTML($resumoHTML,$data);
	break;
}

$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
}
function mountHTML_ST($block="", $data=[])
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
               
$geralHTML = '<table><tbody>
        <tr>
            <td colspan="8" class="col-8">
                <label style="font-size:20px">'.$this->Ini->Nm_lang['lang_label_PAS'].'</label></td>
            <td colspan="4" class="col-4">
                <label style="font-size:20px">Nº :ID:</label>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="col-6">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_companyname'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:RazaoSocial:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_completeAddress'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:End_Principal:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>CNPJ</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:Num_CNPJ:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_contact'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:ContatoPrincipal:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_email'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:EmailContatoPrincipal:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_buildingAddress'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:End_Obra:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="3" class="col-3 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_condominio'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:Condominio:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="3" class="col-3 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_client'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:Cliente:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_contact'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:ContatoFinanceiro:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_phone'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:TelefoneContatoFinanceiro:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="4" class="col-4 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_email'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:EmailContatoFinanceiro:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_technicalConsultant'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>:ContatoConsultor:</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td colspan="6" class="col-6 double-line">
                <table class="label-top col-12">
                    <tbody>
                        <tr>
                            <td><label>'.$this->Ini->Nm_lang['lang_label_reference'].'</label></td>
                        </tr>
                        <tr>
                            <td>
                                <label>'.$this->Ini->Nm_lang['lang_label_technicalSupervision'].'</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>';

$itemHTML = '<table border="1" cellspacing="0" style="width:100%;">
        <tbody>
            <tr>
                <td colspan="6" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_serviceDescription2'].'</label></td>
                <td colspan="6" rowspan="1" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_foreseen'].'</label></td>
            </tr>
            <tr>
                <td colspan="6" rowspan="3" class="descricao col-6 center">:Descricao:</td>
                <td colspan="2" class="center col-2">
                    <table class="label-top col-12 center">
                        <tbody>
                            <tr>
                                <td><label>'.$this->Ini->Nm_lang['lang_label_start'].'</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>:Prev_Data_Inicio:</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" class="center col-2">
                    <table class="label-top col-12 center">
                        <tbody>
                            <tr>
                                <td><label>'.$this->Ini->Nm_lang['lang_label_end'].'</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>:Prev_Data_Fim:</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" class="center col-2">
                    <table class="label-top col-12 center">
                        <tbody>
                            <tr>
                                <td><label>'.$this->Ini->Nm_lang['lang_label_hours'].'</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>:Prev_Horas:</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="6" rowspan="1" class="center header col-6"><label>'.$this->Ini->Nm_lang['lang_label_accomplished'].'</label></td>
            </tr>
            <tr>
                <td colspan="2" class="center col-2">
                    <table class="label-top col-12 center">
                        <tbody>
                            <tr>
                                <td><label>'.$this->Ini->Nm_lang['lang_label_start'].'</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>:Real_Data_Inicio:</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" class="center col-2">
                    <table class="label-top col-12 center">
                        <tbody>
                            <tr>
                                <td><label>'.$this->Ini->Nm_lang['lang_label_end'].'</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>:Real_Data_Fim:</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="2" class="center col-2">
                    <table class="label-top col-12 center">
                        <tbody>
                            <tr>
                                <td><label>'.$this->Ini->Nm_lang['lang_label_hours'].'</label></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>:Real_Horas:</label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>';

$resumoHTML = '<table border="1" cellspacing="0" class="col-12">
        <tbody>
            <tr>
                <td colspan="6" rowspan="3" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_pdf_pas1'].'</label></td>
                <td colspan="6" rowspan="1" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_forescastOfServices'].'</label></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1" class="center col-3 header"><label>'.$this->Ini->Nm_lang['lang_label_start'].'</label></td>
                <td colspan="3" rowspan="1" class="center col-3 header"><label>'.$this->Ini->Nm_lang['lang_label_end'].'</label></td>
            </tr>
            <tr>
                <td colspan="2" class="center col-2 header"><label>'.$this->Ini->Nm_lang['lang_label_date'].'</label></td>
                <td class="center header"><label>'.$this->Ini->Nm_lang['lang_label_hour'].'</label></td>
                <td colspan="2" class="center col-2 header"><label>'.$this->Ini->Nm_lang['lang_label_date'].'</label></td>
                <td class="center header"><label>'.$this->Ini->Nm_lang['lang_label_hour'].'</label></td>
            </tr>
            <tr>
				<td colspan="6" rowspan="7" class="col-6 no-padding align-top">
					<ul>
						'.sprintf($this->Ini->Nm_lang['lang_label_pdf_pas5'],":SupervisaoTecnicaComercial:", ":SupervisaoTecnicaForaComercial:", ":SupervisaoTecnicaFdsFeriado:", ":HorarioInicioAdicionalNoturno:", ":HorarioFimAdicionalNoturno:", ":AdicionalNoturno:", ":Deslocamento:").'
					</ul>
				</td>
				<td colspan="2" rowspan="1" class="col-2 center">:Prev_Data_Inicio:</td>
				<td colspan="1" rowspan="1" class="col-1 center">:Prev_Hora_Inicio:</td>
                <td colspan="2" rowspan="1" class="col-2 center">:Prev_Data_Fim:</td>
				<td colspan="1" rowspan="1" class="col-1 center">:Prev_Hora_Fim:</td>
            </tr>
            <tr>
                <td colspan="6" rowspan="1" class="col-6"><label>'.$this->Ini->Nm_lang['lang_label_totalAmount'].'(R$): :Prev_Valor:</label></td>
            </tr>
            <tr>
                <td colspan="6" rowspan="1" class="center col-6 header"><label>'.$this->Ini->Nm_lang['lang_label_realizationOfServices'].'&nbsp;</label></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="1" class="center col-3 header"><label>'.$this->Ini->Nm_lang['lang_label_start'].'</label></td>
                <td colspan="3" rowspan="1" class="center col-3 header"><label>'.$this->Ini->Nm_lang['lang_label_end'].'</label></td>
            </tr>
            <tr>
                <td colspan="2" class="center col-2 header"><label>'.$this->Ini->Nm_lang['lang_label_date'].'</label></td>
                <td colspan="1" class="center header"><label>'.$this->Ini->Nm_lang['lang_label_hour'].'</label></td>
                <td colspan="2" class="center col-2 header"><label>'.$this->Ini->Nm_lang['lang_label_date'].'</label></td>
                <td colspan="1" class="center header"><label>'.$this->Ini->Nm_lang['lang_label_hour'].'</label></td>
            </tr>
            <tr>
                <td colspan="2" rowspan="1" class="col-2 center">:Real_Data_Inicio:</td>
				<td colspan="1" rowspan="1" class="col-1 center">:Real_Hora_Inicio:</td>
                <td colspan="2" rowspan="1" class="col-2 center">:Real_Data_Fim:</td>
				<td colspan="1" rowspan="1" class="col-1 center">:Real_Hora_Fim:</td>
            </tr>
            <tr>
                <td colspan="6" rowspan="1" class="col-6"><label>'.$this->Ini->Nm_lang['lang_label_totalAmount'].'(R$): :Real_Valor:</label></td>
            </tr>
            <tr>
                <td colspan="12" class="col-12">
                    <ul>
                    '.sprintf($this->Ini->Nm_lang['lang_label_pdf_pas6'], ":QtdDiasPag:").'
                </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="1" class="center col-4">
                    <table class="assinatura col-12">
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="center">'.$this->Ini->Nm_lang['lang_label_responsibleApplicant'].'</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td colspan="4" rowspan="1" class="center col-4">
					:IMG_Logo:
                </td>
                <td colspan="4" rowspan="1" class="center col-4">
                    <table class="assinatura col-12">
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="center">'.$this->Ini->Nm_lang['lang_label_responsibleController'].'</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="12" class="col-12">
                    <label>'.$this->Ini->Nm_lang['lang_label_date'].': :DataCriacao:</label>
                </td>
            </tr>
        </tbody>
    </table>';

switch ($block) {
	case 'geral':
		return$this->compileHTML($geralHTML,$data);
	break;
	case 'item':
		$content = "";		
		foreach ($data as $key => $value) {
			$value['idx'] = (1 + $key);
			$content .=$this->compileHTML($itemHTML, $value);
		}
		return $content;
	break;
	case 'resumo':
		return$this->compileHTML($resumoHTML,$data);
	break;
}

$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
}
function mountSAECSS()
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
               
return "<style>
	body {
		font-family: 'Helvetica';
		padding-top: 100px;
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
	table.assinatura {
		border: none;
	}
	table.assinatura td {
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
	.footerHtml { position: fixed; bottom: 10mm;font-size:12px;color:rgb(150, 150, 150)}
	.headerHtml { position: fixed; top: 0px;}
</style>";

$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
}
function rodape1()
{
$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'on';
               
return "<table class='rodape1 col-12'>
			<tbody>
				<tr>
					<td>".$this->Ini->Nm_lang['lang_label_pdf_rodape_pas']."</td>
				</tr>
			</tbody>
		</table>";

$_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
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
   $_SESSION['hticnsdata']['blk_PDFPAS']['contr_erro'] = 'off';
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
            nm_limpa_str_blk_PDFPAS($nmgp_val);
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
            nm_limpa_str_blk_PDFPAS($nmgp_val);
            $$nmgp_var = $nmgp_val;
       }
   }
   if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
   {
       $_SESSION['sc_session']['SC_parm_violation'] = true;
   }
   if (isset($_POST["blk_PDFPAS_ID_PAS"])) 
   {
       $_SESSION["blk_PDFPAS_ID_PAS"] = $_POST["blk_PDFPAS_ID_PAS"];
       nm_limpa_str_blk_PDFPAS($_SESSION["blk_PDFPAS_ID_PAS"]);
   }
   if (!isset($_POST["blk_PDFPAS_ID_PAS"]) && isset($_POST["blk_pdfpas_id_pas"])) 
   {
       $_SESSION["blk_PDFPAS_ID_PAS"] = $_POST["blk_pdfpas_id_pas"];
       nm_limpa_str_blk_PDFPAS($_SESSION["blk_PDFPAS_ID_PAS"]);
   }
   if (isset($_GET["blk_PDFPAS_ID_PAS"])) 
   {
       $_SESSION["blk_PDFPAS_ID_PAS"] = $_GET["blk_PDFPAS_ID_PAS"];
       nm_limpa_str_blk_PDFPAS($_SESSION["blk_PDFPAS_ID_PAS"]);
   }
   if (!isset($_GET["blk_PDFPAS_ID_PAS"]) && isset($_GET["blk_pdfpas_id_pas"])) 
   {
       $_SESSION["blk_PDFPAS_ID_PAS"] = $_GET["blk_pdfpas_id_pas"];
       nm_limpa_str_blk_PDFPAS($_SESSION["blk_PDFPAS_ID_PAS"]);
   }
   if (!isset($_SESSION["blk_PDFPAS_ID_PAS"])) 
   {
       $_SESSION["blk_PDFPAS_ID_PAS"] = "";
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
   if (isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu']))
   {
       $salva_iframe = $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu'];
       unset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu']);
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
        $_SESSION['hticnsdata']['sc_apl_menu_atual'] = "blk_PDFPAS";
        $achou = false;
        if (isset($_SESSION['sc_session'][$hti_cnsdata_init]))
        {
            foreach ($_SESSION['sc_session'][$hti_cnsdata_init] as $nome_apl => $resto)
            {
                if ($nome_apl == 'blk_PDFPAS' || $achou)
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
        $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu'] = true;
   }
   else
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['iframe_menu'] = $salva_iframe;
   }

   if (!isset($_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['initialize']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('blk_PDFPAS' == $sReferer || 'blk_PDFPAS_' == substr($sReferer, 0, 11))
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['initialize'] = true;
       }
   }

   $_POST['hti_cnsdata_init'] = $hti_cnsdata_init;
   if (isset($_SESSION['hticnsdata']['sc_outra_jan']) && $_SESSION['hticnsdata']['sc_outra_jan'] == 'blk_PDFPAS')
   {
       $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['sc_outra_jan'] = true;
        unset($_SESSION['hticnsdata']['sc_outra_jan']);
   }
   $_SESSION['sc_session'][$hti_cnsdata_init]['blk_PDFPAS']['menu_desenv'] = false;   
   if (!defined("SC_ERROR_HANDLER"))
   {
       define("SC_ERROR_HANDLER", 1);
       include_once(dirname(__FILE__) . "/blk_PDFPAS_erro.php");
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
                nm_limpa_str_blk_PDFPAS($cadapar[1]);
                if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                $Tmp_par   = $cadapar[0];;
                $$Tmp_par = $cadapar[1];
            }
            $ix++;
       }
       if (!isset($blk_PDFPAS_ID_PAS) && isset($blk_pdfpas_id_pas)) 
       {
           $_SESSION["blk_PDFPAS_ID_PAS"] = $blk_pdfpas_id_pas;
       }
       if (isset($blk_PDFPAS_ID_PAS)) 
       {
           $_SESSION['blk_PDFPAS_ID_PAS'] = $blk_PDFPAS_ID_PAS;
           nm_limpa_str_blk_PDFPAS($_SESSION["blk_PDFPAS_ID_PAS"]);
       }
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0;  
   $contr_blk_PDFPAS = new blk_PDFPAS_apl();
   $contr_blk_PDFPAS->controle();
//
   function nm_limpa_str_blk_PDFPAS(&$str)
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
