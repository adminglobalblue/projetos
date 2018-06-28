function grid_ProjetoItens_tb_itens_id_item_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_tb_itens_id_item" + seqRow).html();
}

function grid_ProjetoItens_tb_itens_id_item_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_tb_itens_id_item" + seqRow).html(newValue);
}

function grid_ProjetoItens_nom_item_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_nom_item" + seqRow).html();
}

function grid_ProjetoItens_nom_item_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_nom_item" + seqRow).html(newValue);
}

function grid_ProjetoItens_nom_descricao_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_nom_descricao" + seqRow).html();
}

function grid_ProjetoItens_nom_descricao_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_nom_descricao" + seqRow).html(newValue);
}

function grid_ProjetoItens_observacoes_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_observacoes" + seqRow).html();
}

function grid_ProjetoItens_observacoes_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_observacoes" + seqRow).html(newValue);
}

function grid_ProjetoItens_num_status_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_num_status" + seqRow).html();
}

function grid_ProjetoItens_num_status_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_num_status" + seqRow).html(newValue);
}

function grid_ProjetoItens_editar_getValue(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  return $("#id_sc_field_editar" + seqRow).html();
}

function grid_ProjetoItens_editar_setValue(newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_editar" + seqRow).html(newValue);
}

function grid_ProjetoItens_getValue(field, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  var SC_tmp = "";
  if ("tb_itens_id_item" == field) {
    SC_tmp = grid_ProjetoItens_tb_itens_id_item_getValue(seqRow);
  }
  if ("nom_item" == field) {
    SC_tmp = grid_ProjetoItens_nom_item_getValue(seqRow);
  }
  if ("nom_descricao" == field) {
    SC_tmp = grid_ProjetoItens_nom_descricao_getValue(seqRow);
  }
  if ("observacoes" == field) {
    SC_tmp = grid_ProjetoItens_observacoes_getValue(seqRow);
  }
  if ("num_status" == field) {
    SC_tmp = grid_ProjetoItens_num_status_getValue(seqRow);
  }
  if ("editar" == field) {
    SC_tmp = grid_ProjetoItens_editar_getValue(seqRow);
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

function grid_ProjetoItens_setValue(field, newValue, seqRow) {
  seqRow = scSeqNormalize(seqRow);
  if ("tb_itens_id_item" == field) {
    grid_ProjetoItens_tb_itens_id_item_setValue(newValue, seqRow);
  }
  if ("nom_item" == field) {
    grid_ProjetoItens_nom_item_setValue(newValue, seqRow);
  }
  if ("nom_descricao" == field) {
    grid_ProjetoItens_nom_descricao_setValue(newValue, seqRow);
  }
  if ("observacoes" == field) {
    grid_ProjetoItens_observacoes_setValue(newValue, seqRow);
  }
  if ("num_status" == field) {
    grid_ProjetoItens_num_status_setValue(newValue, seqRow);
  }
  if ("editar" == field) {
    grid_ProjetoItens_editar_setValue(newValue, seqRow);
  }
}

function scJQAddEvents(seqRow) {
  seqRow = scSeqNormalize(seqRow);
  $("#id_sc_field_num_status" + seqRow).click(function () {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_event&nmgp_event=num_status_onClick&hti_cnsdata_init=" + document.F3.hti_cnsdata_init.value + "&hti_cnsdata_session=" + document.F3.hti_cnsdata_session.value + "&tb_itens_num_npt=" + grid_ProjetoItens_getValue("tb_itens_num_npt", seqRow) + "&num_status=" + grid_ProjetoItens_getValue("num_status", seqRow) + "&tb_itens_id_item=" + grid_ProjetoItens_getValue("tb_itens_id_item", seqRow) + ""
     })
     .done(function(jsonReturn) {
        var i, fieldDisplay, oResp;
        eval("oResp = " + jsonReturn);
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            grid_ProjetoItens_setValue(oResp["setValue"][i]["field"], oResp["setValue"][i]["value"], seqRow);
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
    });
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", "pointer"); })
    .addClass(($("#id_sc_field_Num_Status" + seqRow).parent().hasClass("scGridFieldOddFont") ? "scGridFieldOddLink" : "scGridFieldEvenLink"));

  $("#id_sc_field_editar" + seqRow).click(function () {
    $.ajax({
      type: "POST",
      url: "index.php",
      data: "nmgp_opcao=ajax_event&nmgp_event=editar_onClick&hti_cnsdata_init=" + document.F3.hti_cnsdata_init.value + "&hti_cnsdata_session=" + document.F3.hti_cnsdata_session.value + "&tb_itens_id_item=" + grid_ProjetoItens_getValue("tb_itens_id_item", seqRow) + "&editar=" + grid_ProjetoItens_getValue("editar", seqRow) + "&rsprojeto=" + grid_ProjetoItens_getValue("rsprojeto", seqRow) + "&rsitem=" + grid_ProjetoItens_getValue("rsitem", seqRow) + ""
     })
     .done(function(jsonReturn) {
        var i, fieldDisplay, oResp;
        eval("oResp = " + jsonReturn);
        if (oResp["setValue"]) {
          for (i = 0; i < oResp["setValue"].length; i++) {
            grid_ProjetoItens_setValue(oResp["setValue"][i]["field"], oResp["setValue"][i]["value"], seqRow);
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
    });
  }).mouseover(function() { $(this).css("cursor", "pointer"); })
    .mouseout(function() { $(this).css("cursor", "pointer"); })
    .addClass(($("#id_sc_field_editar" + seqRow).parent().hasClass("scGridFieldOddFont") ? "scGridFieldOddLink" : "scGridFieldEvenLink"));

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
        if (!SC_Link_View)
        {
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
