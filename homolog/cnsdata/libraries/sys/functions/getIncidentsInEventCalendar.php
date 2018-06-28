<?php
// Funções para cada padrão
/*
            appCALENDÁRIO					
                    |N.R.	
            |N.R.	|X	    
            |R.D.	|A	    
  REGISTRO  |R.W.	|E	    
            |R.M.	|H	    
            |R.A.	|J	    
* Seguem o padrão de parâmetros: 1º o array de dados do Evento no registro e 2º os dados vindos da app
** A passagem de parâmetros é o inverso de *
*/
// {Recorrente} {Periodo} $mEvent["Di"] $mEvent["Hi"] $mEvent["Df"] $mEvent["Hf"]

// N.R. & N.R. -> X
function pad2_NR_NR (&$nEventsIncidents, $eI, $event, string $i1, string $f1, string $i2, string $f2) {
    $_compareInterval = compareInterval([$i1, $f1], [$i2, $f2]);
    if ($_compareInterval) array_push($nEventsIncidents, [
        "idx" => $eI,
		"event" => $event,
        "D1" => $i1,
        "D2" => $f1
    ]);
}
// N.R. & R.D. -> A
function pad2_A (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $_compareInterval1 = compareInterval([$D1["Hi"], $D1["Hf"]], [$D2["Hi"], $D2["Hf"]]) || $D1["Hi"] == $D1["Hf"] || $D2["Hi"] == $D2["Hf"];
    if ($_compareInterval1) {
        $_compareInterval2 = compareInterval([$D1["Di"], $D1["Df"]], [$D2["Di"], $D2["Df"]]);
        if ($_compareInterval2) {
            $exceded = false;
            $initDate = $D1["Di"];
            for ($_i = 0; !$exceded; $_i++) {
                $nDate = new DateTime($initDate);
                $nDate->modify($_i." day");
                $exceded = $nDate->format("Y-m-d") > $D1["Df"] || $nDate->format("Y-m-d") > $D2["Df"];
                if (!$exceded) {
                    $_compareInterval = compareInterval([
                        $nDate->format("Y-m-d")." ".$D1["Hi"],
                        $nDate->format("Y-m-d")." ".$D1["Hf"]
                    ], [
                        $D2["Di"]." ".$D2["Hi"],
                        $D2["Df"]." ".$D2["Hf"]
                    ]);
                    if ($_compareInterval) {
                        array_push($nEventsIncidents,  [
                            "idx" => $eI,
							"event" => $D1,
                            "D1" => $nDate->format("Y-m-d")." ".$D1["Hi"],
                            "D2" => $nDate->format("Y-m-d")." ".$D1["Hf"]
                        ]); 
                    }
                }
            }
        }
    }
}
// N.R. & R.W. -> E
function pad2_B (&$nEventsIncidents, $eI, array $D1, array $D2) {    
    $rDWi = getWeekDay($D1["Di"]); // rDayWeekInit
    $incidentWD = getDbWD($D2["Di"], $rDWi); // Incident Week Date
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = new DateTime($incidentWD);
        $nDate->modify(7*$_i." day");
        $exceded = $nDate->format("Y-m-d") > $D1["Df"] || $nDate->format("Y-m-d") > $D2["Df"];
        if (!$exceded) {
            $_compareInterval = compareInterval([
                $nDate->format("Y-m-d")." ".$D1["Hi"],
                $nDate->format("Y-m-d")." ".$D1["Hf"]
            ], [
                $D2["Di"]." ".$D2["Hi"],
                $D2["Df"]." ".$D2["Hf"]
            ]);
            if ($_compareInterval) {
                array_push($nEventsIncidents,  [
                    "idx" => $eI,
					"event" => $D1,
                    "D1" => $nDate->format("Y-m-d")." ".$D1["Hi"],
                    "D2" => $nDate->format("Y-m-d")." ".$D1["Hf"]
                ]); 
            }
        }
    }
}
// N.R. & R.M. -> H
function pad2_C (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], $_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded) {
            $_compareInterval = compareInterval([
                $nDate." ".$D1["Hi"],
                $nDate." ".$D1["Hf"],
            ], [
                $D2["Di"]." ".$D2["Hi"],
                $D2["Df"]." ".$D2["Hf"]
            ]);
            if ($_compareInterval) {
                array_push($nEventsIncidents,  [
                    "idx" => $eI,
					"event" => $D1,
                    "D1" => $nDate." ".$D1["Hi"],
                    "D2" => $nDate." ".$D1["Hf"]
                ]); 
            }
        }
    }
}
// R.A. & N.R. -> J
function pad2_D (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], 12*$_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded) {
            $_compareInterval = compareInterval([
                $nDate." ".$D1["Hi"],
                $nDate." ".$D1["Hf"]
            ], [
                $D2["Di"]." ".$D2["Hi"],
                $D2["Df"]." ".$D2["Hf"]
            ]);
            if ($_compareInterval) {
                array_push($nEventsIncidents,  [
                    "idx" => $eI,
					"event" => $D1,
                    "D1" => $nDate." ".$D1["Hi"],
                    "D2" => $nDate." ".$D1["Hf"]
                ]); 
            }
        }
    }
}

function getIncidentsInEvent ($mEvent, $rs, $needRsMount = true) {
    $nEventsIncidents = [];
	$originalMEventSAE = $mEvent;
	
    $mEvent["Permitido"] = $mEvent["Permitido"] ? explode(",", $mEvent["Permitido"]) : [];
    $mEvent["Bloqueio"] = $mEvent["Bloqueio"] ? explode(",", $mEvent["Bloqueio"]) : [];
    if (isset($mEvent["addDi"], $mEvent["addDf"], $mEvent["BloqueioAdicional"])) {
        if (!is_array($mEvent["BloqueioAdicional"])) $mEvent["BloqueioAdicional"] = $mEvent["BloqueioAdicional"] ? explode(",", $mEvent["BloqueioAdicional"]) : [];
        if (count($mEvent["BloqueioAdicional"])) {
            if (in_array($event["Code"], $mEvent["BloqueioAdicional"])) {
                $mEvent["Di"] = date("Y-m-d", strtotime($originalMEventSAE["Di"]." ".$originalMEventSAE["Hi"]) + $mEvent["addDi"]);
                $mEvent["Hi"] = date("H:i:s", strtotime($originalMEventSAE["Di"]." ".$originalMEventSAE["Hi"]) + $mEvent["addDi"]);
                $mEvent["Df"] = date("Y-m-d", strtotime($originalMEventSAE["Df"]." ".$originalMEventSAE["Hf"]) + $mEvent["addDf"]);
                $mEvent["Hf"] = date("H:i:s", strtotime($originalMEventSAE["Df"]." ".$originalMEventSAE["Hf"]) + $mEvent["addDf"]);
            }
        }
    }
	
	foreach ($rs as $eIdx => $event) {
         if ($needRsMount) {
            $rs[$eIdx] = [
                "Titulo" => $event[0],
                "Di" => $event[1],
                "Hi" => $event[2],
                "Df" => $event[3],
                "Hf" => $event[4],
                "Recorrente" => $event[5],
                "Periodo" => $event[6],
                "Code" => $event[7],
                "TipoOverlay" => $event[8],
                "Permitido" => $event[9] ? explode(",", $event[9]) : [],
                "Bloqueio" => $event[10] ? explode(",", $event[10]) : [],
                "Duplicar" => $event[11],
                "BloqueioAdicional" => $event[12] ? explode(",", $event[12]) : [],
            ];
            $event = $rs[$eIdx];
        } else {
            $rs[$eIdx]["Permitido"] = $event["Permitido"] ? explode(",", $event["Permitido"]) : [];
            $rs[$eIdx]["Bloqueio"] = $event["Bloqueio"] ? explode(",", $event["Bloqueio"]) : [];
            if(isset($rs[$eIdx]["BloqueioAdicional"])) $rs[$eIdx]["BloqueioAdicional"] = $event["BloqueioAdicional"] ? explode(",", $event["BloqueioAdicional"]) : [];
            $event = $rs[$eIdx];
        }

    /*
                |       Registro
                |Y	        |!Y
            |Y	|!rPerm.    |rBlo.
    app     |   |!mPerm. 	|!mPerm.
            |-----------------------
            |!Y	|!rPerm.    |rBlo.
            |   |mBlo.	    |mBlo.

    */
        if (
            $event["TipoOverlay"] == "S" && $mEvent["TipoOverlay"] == "S" && 
                (!in_array($event["Code"], $mEvent["Permitido"]) || !in_array($mEvent["Code"], $event["Permitido"])) ||
            $event["TipoOverlay"] == "S" && $mEvent["TipoOverlay"] != "S" && 
                (in_array($event["Code"], $mEvent["Bloqueio"]) || !in_array($mEvent["Code"], $event["Permitido"])) ||
            $event["TipoOverlay"] != "S" && $mEvent["TipoOverlay"] == "S" && 
                (in_array($mEvent["Code"], $event["Bloqueio"]) || !in_array($event["Code"], $mEvent["Permitido"])) ||
            $event["TipoOverlay"] != "S" && $mEvent["TipoOverlay"] != "S" && 
                (in_array($event["Code"], $mEvent["Bloqueio"]) || in_array($mEvent["Code"], $event["Bloqueio"])) ||
            $event["Code"] == $mEvent["Code"] && $event["Duplicar"] == "N"
        ) {
            if ($event["Recorrente"] == 'N') { // r: N.R. && m: N.R.
                pad2_NR_NR($nEventsIncidents,
                    $eIdx,
					$event,
                    $event["Di"]." ".$event["Hi"],
                    $event["Df"]." ".$event["Hf"],
                    $mEvent["Di"]." ".$mEvent["Hi"],
                    $mEvent["Df"]." ".$mEvent["Hf"]
                );
            } else { // r: R. && m: N.R. 
                switch ($event["Periodo"]) {
                    case 'D': // r: R.D. && m: N.R.
                        $_diffDate = diffDate($mEvent["Di"], $mEvent["Df"]);
                        pad2_A($nEventsIncidents,  $eIdx, $event, $mEvent);
                        break;
                    case 'W': // r: R.W. && m: N.R.
                        pad2_B ($nEventsIncidents, $eIdx, $event, $mEvent);
                        break;
                    case 'M': // r: R.M. && m: N.R.
                        pad2_C ($nEventsIncidents, $eIdx, $event, $mEvent);
                        break;
                    case 'A': // r: R.A. && m: N.R.
                        pad2_D ($nEventsIncidents, $eIdx, $event, $mEvent);
                        break;
                }
            }
        }
    }
    return $nEventsIncidents;
}