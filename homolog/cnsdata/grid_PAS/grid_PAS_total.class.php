<?php

class grid_PAS_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("pt_br");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_PAS']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_PAS']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['campos_busca'];
          if ($_SESSION['hticnsdata']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['hticnsdata']['charset'], "UTF-8");
          }
          $this->header = $Busca_temp['header']; 
          $tmp_pos = strpos($this->header, "##@@");
          if ($tmp_pos !== false && !is_array($this->header))
          {
              $this->header = substr($this->header, 0, $tmp_pos);
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false && !is_array($this->id))
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->referente = $Busca_temp['referente']; 
          $tmp_pos = strpos($this->referente, "##@@");
          if ($tmp_pos !== false && !is_array($this->referente))
          {
              $this->referente = substr($this->referente, 0, $tmp_pos);
          }
          $this->selectorigem = $Busca_temp['selectorigem']; 
          $tmp_pos = strpos($this->selectorigem, "##@@");
          if ($tmp_pos !== false && !is_array($this->selectorigem))
          {
              $this->selectorigem = substr($this->selectorigem, 0, $tmp_pos);
          }
          $this->datacriacao = $Busca_temp['datacriacao']; 
          $tmp_pos = strpos($this->datacriacao, "##@@");
          if ($tmp_pos !== false && !is_array($this->datacriacao))
          {
              $this->datacriacao = substr($this->datacriacao, 0, $tmp_pos);
          }
          $this->num_status = $Busca_temp['num_status']; 
          $tmp_pos = strpos($this->num_status, "##@@");
          if ($tmp_pos !== false && !is_array($this->num_status))
          {
              $this->num_status = substr($this->num_status, 0, $tmp_pos);
          }
          $this->statusprojeto = $Busca_temp['statusprojeto']; 
          $tmp_pos = strpos($this->statusprojeto, "##@@");
          if ($tmp_pos !== false && !is_array($this->statusprojeto))
          {
              $this->statusprojeto = substr($this->statusprojeto, 0, $tmp_pos);
          }
          $this->tipo_op = $Busca_temp['tipo_op']; 
          $tmp_pos = strpos($this->tipo_op, "##@@");
          if ($tmp_pos !== false && !is_array($this->tipo_op))
          {
              $this->tipo_op = substr($this->tipo_op, 0, $tmp_pos);
          }
          $this->id_op = $Busca_temp['id_op']; 
          $tmp_pos = strpos($this->id_op, "##@@");
          if ($tmp_pos !== false && !is_array($this->id_op))
          {
              $this->id_op = substr($this->id_op, 0, $tmp_pos);
          }
          $this->condominio = $Busca_temp['condominio']; 
          $tmp_pos = strpos($this->condominio, "##@@");
          if ($tmp_pos !== false && !is_array($this->condominio))
          {
              $this->condominio = substr($this->condominio, 0, $tmp_pos);
          }
          $this->cliente = $Busca_temp['cliente']; 
          $tmp_pos = strpos($this->cliente, "##@@");
          if ($tmp_pos !== false && !is_array($this->cliente))
          {
              $this->cliente = substr($this->cliente, 0, $tmp_pos);
          }
          $this->end_obra_cidade = $Busca_temp['end_obra_cidade']; 
          $tmp_pos = strpos($this->end_obra_cidade, "##@@");
          if ($tmp_pos !== false && !is_array($this->end_obra_cidade))
          {
              $this->end_obra_cidade = substr($this->end_obra_cidade, 0, $tmp_pos);
          }
          $this->id_origem = $Busca_temp['id_origem']; 
          $tmp_pos = strpos($this->id_origem, "##@@");
          if ($tmp_pos !== false && !is_array($this->id_origem))
          {
              $this->id_origem = substr($this->id_origem, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang ;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (SELECT     ID,     Tipo_OP,     Num_Status,     ID_OP,     Referente,     Cliente,     Origem,     ID_Origem,     GBImprimeDocumento,     Condominio,     End_Obra_Cidade,     DataCriacao,     (select Replace(b.Nom_Status, '%s', IFNULL(a.Num_Analise, 0)) from tb_projetoanalisestatus a INNER JOIN tb_projetostatus b ON b.Code = a.CodeStatus WHERE a.ID_Projeto = tb_pas.ID_Origem order by a.Data DESC LIMIT 1) as statusProjeto FROM     tb_pas  WHERE Num_Ativo != 'R' AND (   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'O' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'O') OR   ('" . $_SESSION['Num_TipoUsuario'] . "' = 'P' AND ID_OP = '" . $_SESSION['ID_OPE'] . "' AND Tipo_OP = 'P') OR    ('" . $_SESSION['Num_TipoUsuario'] . "' = 'E' AND false) OR    ('" . $_SESSION['Num_TipoUsuario'] . "' IN ('G', 'GT'))  ) ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['where_pesq']; 
      } 
      $_SESSION['hticnsdata']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['hticnsdata']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_PAS']['contr_total_geral'] = "OK";
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
function getOrigemAction()
{
$_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'on';
if (!isset($_SESSION['ID_OPE'])) {$_SESSION['ID_OPE'] = "";}
if (!isset($this->sc_temp_ID_OPE)) {$this->sc_temp_ID_OPE = (isset($_SESSION['ID_OPE'])) ? $_SESSION['ID_OPE'] : "";}
if (!isset($_SESSION['Num_TipoUsuario'])) {$_SESSION['Num_TipoUsuario'] = "";}
if (!isset($this->sc_temp_Num_TipoUsuario)) {$this->sc_temp_Num_TipoUsuario = (isset($_SESSION['Num_TipoUsuario'])) ? $_SESSION['Num_TipoUsuario'] : "";}
   
sc_include_library("sys", "functions", "functions.php");
sc_include_library("sys", "models", "Pas.php");
$_Pas = new PAS($this);

$response = responseJSON();

$Search = $_GET["search"] ?? '';
$Referencia = $_GET["referencia"] ?? null;
$Referencia = $Referencia ? "'".$Referencia."'" : "'ST','AP'";

$resultado = $_Pas->query("SELECT
    ID_Origem,
    (CASE
        WHEN tb_pas.Referente = 'AP' THEN (SELECT tb_projetos.ProtocoloHex FROM tb_projetos WHERE tb_projetos.ID_projeto = tb_pas.ID_Origem) 
        WHEN tb_pas.Referente = 'ST' THEN ID_Origem 
    END) as Origem
FROM
    tb_pas 
WHERE Num_Ativo != 'R' AND (
  ('$this->sc_temp_Num_TipoUsuario' = 'O' AND ID_OP = '$this->sc_temp_ID_OPE' AND Tipo_OP = 'O') OR
  ('$this->sc_temp_Num_TipoUsuario' = 'P' AND ID_OP = '$this->sc_temp_ID_OPE' AND Tipo_OP = 'P') OR 
  ('$this->sc_temp_Num_TipoUsuario' = 'E' AND false) OR 
  ('$this->sc_temp_Num_TipoUsuario' IN ('G', 'GT')) 
) AND tb_pas.Referente IN ($Referencia)
HAVING Origem LIKE '%$Search%'");

$response->data = $resultado;
$response->DbError = $_Pas->DbError;

sendResponse($response);


if (isset($this->sc_temp_Num_TipoUsuario)) {$_SESSION['Num_TipoUsuario'] = $this->sc_temp_Num_TipoUsuario;}
if (isset($this->sc_temp_ID_OPE)) {$_SESSION['ID_OPE'] = $this->sc_temp_ID_OPE;}
$_SESSION['hticnsdata']['grid_PAS']['contr_erro'] = 'off';
}
}

?>
