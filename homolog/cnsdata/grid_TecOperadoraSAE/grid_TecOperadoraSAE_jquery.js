function grid_TecOperadoraSAE_tb_tecsae_id_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_Hidden_tb_tecsae_id" + seqRow).html();
}

function grid_TecOperadoraSAE_tb_tecsae_id_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tb_tecsae_id" + seqRow).html(newValue);
}
function grid_TecOperadoraSAE_tb_tecsae_id_Hidden_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_Hidden_tb_tecsae_id" + seqRow).html(newValue);
}

function grid_TecOperadoraSAE_tb_tecnicos_id_opepre_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_tb_tecnicos_id_opepre" + seqRow).html();
}

function grid_TecOperadoraSAE_tb_tecnicos_id_opepre_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tb_tecnicos_id_opepre" + seqRow).html(newValue);
}

function grid_TecOperadoraSAE_nom_tecnicocompleto_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_nom_tecnicocompleto" + seqRow).html();
}

function grid_TecOperadoraSAE_nom_tecnicocompleto_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_nom_tecnicocompleto" + seqRow).html(newValue);
}

function grid_TecOperadoraSAE_tb_tecnicos_data_ativacao_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_tb_tecnicos_data_ativacao" + seqRow).html();
}

function grid_TecOperadoraSAE_tb_tecnicos_data_ativacao_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tb_tecnicos_data_ativacao" + seqRow).html(newValue);
}

function grid_TecOperadoraSAE_tb_tecnicos_num_rg_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_tb_tecnicos_num_rg" + seqRow).html();
}

function grid_TecOperadoraSAE_tb_tecnicos_num_rg_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tb_tecnicos_num_rg" + seqRow).html(newValue);
}

function grid_TecOperadoraSAE_tb_tecnicos_num_telefone1_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_tb_tecnicos_num_telefone1" + seqRow).html();
}

function grid_TecOperadoraSAE_tb_tecnicos_num_telefone1_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tb_tecnicos_num_telefone1" + seqRow).html(newValue);
}

function grid_TecOperadoraSAE_remover_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_remover" + seqRow).find("img").attr("src");
}

function grid_TecOperadoraSAE_remover_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_remover" + seqRow).find("img").attr("src", newValue);
}

function grid_TecOperadoraSAE_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  var SC_tmp = "";
  if ("tb_tecsae_id" == field) {
    SC_tmp = grid_TecOperadoraSAE_tb_tecsae_id_getValue(seqRow);
  }
  if ("tb_tecnicos_id_opepre" == field) {
    SC_tmp = grid_TecOperadoraSAE_tb_tecnicos_id_opepre_getValue(seqRow);
  }
  if ("nom_tecnicocompleto" == field) {
    SC_tmp = grid_TecOperadoraSAE_nom_tecnicocompleto_getValue(seqRow);
  }
  if ("tb_tecnicos_data_ativacao" == field) {
    SC_tmp = grid_TecOperadoraSAE_tb_tecnicos_data_ativacao_getValue(seqRow);
  }
  if ("tb_tecnicos_num_rg" == field) {
    SC_tmp = grid_TecOperadoraSAE_tb_tecnicos_num_rg_getValue(seqRow);
  }
  if ("tb_tecnicos_num_telefone1" == field) {
    SC_tmp = grid_TecOperadoraSAE_tb_tecnicos_num_telefone1_getValue(seqRow);
  }
  if ("remover" == field) {
    SC_tmp = grid_TecOperadoraSAE_remover_getValue(seqRow);
  }
  if (typeof(SC_tmp) == 'undefined') {
      SC_tmp = "";
  }
  else {
      SC_tmp = SC_tmp.replace(/[+]/g, "__NM_PLUS__");
      while (SC_tmp.lastIndexOf("&amp;") != -1)
      {
         SC_tmp = SC_tmp.replace("&amp;" , "__NM_AMP__");
      }
      SC_tmp = SC_tmp.replace(/[&]/g, "__NM_AMP__");
      SC_tmp = SC_tmp.replace(/[%]/g, "__NM_PRC__");
  }
  return SC_tmp;
}

function grid_TecOperadoraSAE_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("tb_tecsae_id" == field) {
    grid_TecOperadoraSAE_tb_tecsae_id_setValue(newValue, seqRow);
  }
  if ("tb_tecnicos_id_opepre" == field) {
    grid_TecOperadoraSAE_tb_tecnicos_id_opepre_setValue(newValue, seqRow);
  }
  if ("nom_tecnicocompleto" == field) {
    grid_TecOperadoraSAE_nom_tecnicocompleto_setValue(newValue, seqRow);
  }
  if ("tb_tecnicos_data_ativacao" == field) {
    grid_TecOperadoraSAE_tb_tecnicos_data_ativacao_setValue(newValue, seqRow);
  }
  if ("tb_tecnicos_num_rg" == field) {
    grid_TecOperadoraSAE_tb_tecnicos_num_rg_setValue(newValue, seqRow);
  }
  if ("tb_tecnicos_num_telefone1" == field) {
    grid_TecOperadoraSAE_tb_tecnicos_num_telefone1_setValue(newValue, seqRow);
  }
  if ("remover" == field) {
    grid_TecOperadoraSAE_remover_setValue(newValue, seqRow);
  }
  if ("tb_tecsae_id_Hidden" == field) {
    grid_TecOperadoraSAE_tb_tecsae_id_Hidden_setValue(newValue, seqRow);
  }
}

function scJQAddEvents(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_remover" + seqRow).click(function () {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_event&nmgp_event=remover_onClick&hti_cnsdata_init=" + document.F3.hti_cnsdata_init.value + "&hti_cnsdata_session=" + document.F3.hti_cnsdata_session.value + "&tb_tecsae_id=" + grid_TecOperadoraSAE_getValue("tb_tecsae_id", seqRow) + "&remover=" + grid_TecOperadoraSAE_getValue("remover", seqRow) + ""
     })
     .done(function(jsonReturn) {
        var i, fieldDisplay, oResp;
        eval("oResp = " + jsonReturn);
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            grid_TecOperadoraSAE_setValue(oResp["setValue"][i]["field"], oResp["setValue"][i]["value"], seqRow);
          }
        }
        if (oResp["fieldDisplay"]) {
          for (i = 0; i < oResp["fieldDisplay"].length; i++) {
            if ("off" == oResp["fieldDisplay"][i]["status"]) {
              $("#id_sc_field_" + oResp["fieldDisplay"][i]["field"] + seqRow).hide();
            }
            else {
              $("#id_sc_field_" + oResp["fieldDisplay"][i]["field"] + seqRow).show();
            }
          }
        }
        if (oResp["Refresh"]) {
           nm_gp_move('igual');
        }
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
    });
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", "pointer"); })
    .addClass(($("#id_sc_field_remover" + seqRow).parent().hasClass("scGridFieldOddFont") ? "scGridFieldOddLink" : "scGridFieldEvenLink"));

}

function scSeqNormalize(seqRow) {
  var newSeqRow = seqRow.toString();
  if ("" == newSeqRow) {
    return "";
  }
  if ("_" != newSeqRow.substr(0, 1)) {
    return "_" + newSeqRow;
  }
  return newSeqRow;
}
  function nmAjaxRedir(oTemp)
  {
    if (oTemp && oTemp != null) {
        oResp = oTemp;
    }
    if (!oResp["redirInfo"]) {
      return;
    }
    sMetodo = oResp["redirInfo"]["metodo"];
    sAction = oResp["redirInfo"]["action"];
    if ("location" == sMetodo) {
      if ("parent.parent" == oResp["redirInfo"]["target"]) {
        parent.parent.location = sAction;
      }
      else if ("parent" == oResp["redirInfo"]["target"]) {
        parent.location = sAction;
      }
      else if ("_blank" == oResp["redirInfo"]["target"]) {
        window.open(sAction, "_blank");
      }
      else {
        document.location = sAction;
      }
    }
    else if ("html" == sMetodo) {
        document.write(nmAjaxSpecCharParser(oResp["redirInfo"]["action"]));
    }
    else {
      if (oResp["redirInfo"]["target"] == "modal") {
          tb_show('', sAction + '?hti_cnsdata_init=' +  oResp["redirInfo"]["hti_cnsdata_init"] + '&hti_cnsdata_session=<?php echo session_id() ?>&nmgp_parms=' + oResp["redirInfo"]["nmgp_parms"] + '&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&TB_iframe=true&modal=true&height=' +  oResp["redirInfo"]["h_modal"] + '&width=' + oResp["redirInfo"]["w_modal"], '');
          return;
      }
      sFormRedir = (oResp["redirInfo"]["nmgp_outra_jan"]) ? "form_ajax_redir_1" : "form_ajax_redir_2";
      document.forms[sFormRedir].action           = sAction;
      document.forms[sFormRedir].target           = oResp["redirInfo"]["target"];
      document.forms[sFormRedir].nmgp_parms.value = oResp["redirInfo"]["nmgp_parms"];
      if ("form_ajax_redir_1" == sFormRedir) {
        document.forms[sFormRedir].nmgp_outra_jan.value = oResp["redirInfo"]["nmgp_outra_jan"];
      }
      else {
        document.forms[sFormRedir].nmgp_url_saida.value   = oResp["redirInfo"]["nmgp_url_saida"];
        document.forms[sFormRedir].hti_cnsdata_init.value = oResp["redirInfo"]["hti_cnsdata_init"];
      }
      document.forms[sFormRedir].submit();
    }
  }
function ajax_navigate(opc, parm)
{
    var scrollNavigateReload = false, extraParams = "", iEvt, iStart = 0;
    nmAjaxProcOn();
    if (scrollNavigateReload) {
      extraParams += "&scrollNavigateReload=Y";
    }
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_navigate&hti_cnsdata_init=" + document.F4.hti_cnsdata_init.value + "&hti_cnsdata_session=" + document.F4.hti_cnsdata_session.value + "&opc=" + opc  + "&parm=" + parm + extraParams
     })
     .done(function(jsonNavigate) {
        var i, oResp;
        Tst_integrid = jsonNavigate.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonNavigate);
            return;
        }
        eval("oResp = " + jsonNavigate);
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setArr"]) {
          for (i = 0; i < oResp["setArr"].length; i++) {
               eval (oResp["setArr"][i]["var"] + ' = new Array()');
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["fillArr"]) {
          for (i = 0; i < oResp["fillArr"].length; i++) {
               eval (oResp["fillArr"][i]["var"] + ' = {' + oResp["fillArr"][i]["value"] + '}');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
            if (document.getElementById(oResp["setDisplay"][i]["field"])) {
              document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
            }
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
            if (document.getElementById(oResp["setDisabled"][i]["field"])) {
              document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
            }
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
            if (document.getElementById(oResp["setClass"][i]["field"])) {
              document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
            }
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
            if (document.getElementById(oResp["setSrc"][i]["field"])) {
              document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
            }
          }
        }
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["AlertJS"]) {
          for (i = 0; i < oResp["AlertJS"].length; i++) {
              alert (oResp["AlertJS"][i]);
          }
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
        if (!SC_Link_View)
        {
            if (Qsearch_ok)
            {
                scQSInit = true;
                scQuickSearchInit(false, '');
                $('#SC_fast_search_top').listen();
                scQuickSearchKeyUp('top', null);
                scQSInit = false;
            }
            SC_init_jquery(false);
            tb_init('a.thickbox, area.thickbox, input.thickbox');
        }
        nmAjaxProcOff();
            scSetFixedHeaders();
    });
}
function ajax_navigate_res(opc, parm)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_navigate&hti_cnsdata_init=" + document.FRES.hti_cnsdata_init.value + "&hti_cnsdata_session=" + document.FRES.hti_cnsdata_session.value + "&opc=" + opc  + "&parm=" + parm
     })
     .done(function(jsonNavigate) {
        var i, oResp;
        Tst_integrid = jsonNavigate.trim();
        if ("{" != Tst_integrid.substr(0, 1)) {
            nmAjaxProcOff();
            alert (jsonNavigate);
            return;
        }
        eval("oResp = " + jsonNavigate);
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            $("#" + oResp["setValue"][i]["field"]).html(oResp["setValue"][i]["value"]);
          }
        }
        if (oResp["setArr"]) {
          for (i = 0; i < oResp["setArr"].length; i++) {
               eval (oResp["setArr"][i]["var"] + ' = new Array()');
          }
        }
        if (oResp["setVar"]) {
          for (i = 0; i < oResp["setVar"].length; i++) {
               eval (oResp["setVar"][i]["var"] + ' = \"' + oResp["setVar"][i]["value"] + '\"');
          }
        }
        if (oResp["fillArr"]) {
          for (i = 0; i < oResp["fillArr"].length; i++) {
               eval (oResp["fillArr"][i]["var"] + ' = {' + oResp["fillArr"][i]["value"] + '}');
          }
        }
        if (oResp["setDisplay"]) {
          for (i = 0; i < oResp["setDisplay"].length; i++) {
            if (document.getElementById(oResp["setDisplay"][i]["field"])) {
              document.getElementById(oResp["setDisplay"][i]["field"]).style.display = oResp["setDisplay"][i]["value"];
            }
          }
        }
        if (oResp["setDisabled"]) {
          for (i = 0; i < oResp["setDisabled"].length; i++) {
            if (document.getElementById(oResp["setDisabled"][i]["field"])) {
              document.getElementById(oResp["setDisabled"][i]["field"]).disabled = oResp["setDisabled"][i]["value"];
            }
          }
        }
        if (oResp["setClass"]) {
          for (i = 0; i < oResp["setClass"].length; i++) {
            if (document.getElementById(oResp["setClass"][i]["field"])) {
              document.getElementById(oResp["setClass"][i]["field"]).className = oResp["setClass"][i]["value"];
            }
          }
        }
        if (oResp["setSrc"]) {
          for (i = 0; i < oResp["setSrc"].length; i++) {
            if (document.getElementById(oResp["setSrc"][i]["field"])) {
              document.getElementById(oResp["setSrc"][i]["field"]).src = oResp["setSrc"][i]["value"];
            }
          }
        }
        if (oResp["redirInfo"]) {
           nmAjaxRedir(oResp);
        }
        if (oResp["AlertJS"]) {
          for (i = 0; i < oResp["AlertJS"].length; i++) {
              alert (oResp["AlertJS"][i]);
          }
        }
        if (oResp["htmOutput"]) {
           nmAjaxShowDebug(oResp);
        }
        nmAjaxProcOff();
        if (oResp["exec_script"]) {
          for (i = 0; i < oResp["exec_script"].length; i++) {
              eval (oResp["exec_script"][i]);
          }
        }
    });
}
function ajax_save_ancor(f_submit, ancor)
{
    nmAjaxProcOn();
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_save_ancor&hti_cnsdata_init=" + document.F3.hti_cnsdata_init.value + "&hti_cnsdata_session=" + document.F3.hti_cnsdata_session.value + "&ancor_save=" + ancor
     })
     .done(function(jsonSaveAncor) {
        nmAjaxProcOff();
        eval ("document." + f_submit + ".submit()");
    });
}
