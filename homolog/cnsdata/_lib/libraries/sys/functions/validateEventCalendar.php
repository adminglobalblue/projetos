<?php
	
	require("helper_validEvent.php");
	require("getIncidentsInEventCalendar.php");

//#endregion
// Funções para cada padrão
/*
                            appCALENDÁRIO					
                    |N.R.	|R.D	|R.W	|R.M	|R.A
            |N.R.	|X	    |A	    |E	    |H	    |J
            |R.D.	|A	    |X	    |B**    |F**	|I**
  REGISTRO  |R.W.	|E	    |B*	    |X	    |C**    |G**
            |R.M.	|H	    |F*	    |C*	    |X	    |D**
            |R.A.	|J	    |I*	    |G*	    |D*	    |X
* Seguem o padrão de parâmetros: 1º o array de dados do Evento no registro e 2º os dados vindos da app
** A passagem de parâmetros é o inverso de *
*/
// {Recorrente} {Periodo} $mEvent["Di"] $mEvent["Hi"] $mEvent["Df"] $mEvent["Hf"]

// N.R. & N.R. -> X
function pad_NR_NR (&$nEventsIncidents, $eI, string $i1, string $f1, string $i2, string $f2) {
    $_compareInterval = compareInterval([$i1, $f1], [$i2, $f2]);
    if ($_compareInterval) array_push($nEventsIncidents, $eI);
}
// R.W. & R.W. -> X
function pad_RW_RW (&$nEventsIncidents, $eI, string $r, string $m) {
    $rDWi = getWeekDay($r); // registerDayWeekInit
    $mDWi = getWeekDay($m); // myDayWeekInit
    if ($rDWi == $mDWi) {
        // Pelo fato de os dias da semana coincidirem e o horário também
        array_push($nEventsIncidents, $eI);
    }
}
// R.A. & R.A. -> X
function pad_RA_RA (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D2["Di"], 12*$_i);
        $exceded = $nDate > $D2["Df"] || $nDate > $D1["Df"];
        if (!$exceded && $nDate >= $D1["Di"]) {
            $nYN = getYearNumber($nDate); // new Year Number
            $mYN = getYearNumber($D1["Di"]); // my Year Number
            $nYDate = addMonth($D1["Di"], 12*($nYN - $mYN)); // new My Year Number
            if ($nDate == $nYDate) {
                // Pelo fato de a data da recorrência coincidirem e o horário também
                array_push($nEventsIncidents, $eI);
                return;
            }
        }
    }
}
// R.M. & R.M. -> X
function pad_RM_RM (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], $_i); // new Date
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded && $nDate >= $D2["Di"]) {
            $nMN = getMonthNumber($nDate); // new Month Number
            $mMN = getMonthNumber($D2["Di"]); // my Month Number
            $nMDate = addMonth($D2["Di"], $nMN - $mMN); // new My Month Number
            if ($nDate == $nMDate) {
                // Pelo fato de a data da recorrência coincidirem e o horário também
                array_push($nEventsIncidents, $eI);
                return;
            }
        }
    }
}
// R.D. & R.D. -> X
function pad_RD_RD (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $_compareInterval = compareInterval([$D1["Di"], $D1["Df"]], [$D2["Di"], $D2["Df"]]);
    if ($_compareInterval) {
        array_push($nEventsIncidents, $eI);
    }
}
// N.R. & R.D. -> A
function pad_A (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $_compareInterval1 = compareInterval([$D1["Hi"], $D1["Hf"]], [$D2["Hi"], $D2["Hf"]]);
    if ($_compareInterval1) {
        $_compareInterval2 = compareInterval([$D1["Di"], $D1["Df"]], [$D2["Di"], $D2["Df"]]);
        if ($_compareInterval2) {
            array_push($nEventsIncidents, $eI);
        }
    }
}
// R.D. & R.W. -> B
function pad_B (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $rDWi = getWeekDay($D1["Di"]); // rDayWeekInit
    $incidentWD = getDbWD($D2["Di"], $rDWi); // Incident Week Date
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = new DateTime($incidentWD);
        $nDate->modify(7*$_i." day");
        $exceded = $nDate->format("Y-m-d") > $D1["Df"] || $nDate->format("Y-m-d") > $D2["Df"];
        if (!$exceded) {
            $_compareInterval = isEntry ($D2["Di"], $nDate->format("Y-m-d"), $D2["Df"]);
            if ($_compareInterval) {
                array_push($nEventsIncidents, $eI); 
                return;
            }
        }
    }
}
// R.W. & R.M. -> C
function pad_C (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], $_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded) {
            $rDWi = getWeekDay($nDate); // registerDayWeekInit
            $mDWi = getWeekDay($D2["Di"]); // myDayWeekInit
            if ($rDWi == $mDWi) {
                // Pelo fato de os dias da semana coincidirem e o horário também
                array_push($nEventsIncidents, $eI);
                return;
            }
        }
    }
}
// R.M. & R.A. -> D
function pad_D (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], 12*$_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded && $nDate >= $D2["Di"]) {
            $nMN = getMonthNumber($nDate); // new Month Number
            $mMN = getMonthNumber($D2["Di"]); // my Month Number
            $nYN = getYearNumber($nDate); // new Year Number
            $mYN = getYearNumber($D2["Di"]); // my Year Number
            $nMDate = addMonth($D2["Di"], (12*($nYN - $mYN)) + ($nMN - $mMN)); // new My Month Number            
            if ($nDate == $nMDate) {
                echo "pad_D ",$nDate, " ", $nMDate," <br> ";
                // Pelo fato de a data da recorrência coincidirem e o horário também
                array_push($nEventsIncidents, $eI);
                return;
            }
        }
    }
}
// N.R. & R.W. -> E
function pad_E (&$nEventsIncidents, $eI, array $D1, array $D2) {    
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
                array_push($nEventsIncidents, $eI); 
                return;
            }
        }
    }
}
// R.D. & R.M. -> F
function pad_F (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], $_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded) {
            $_compareInterval = isEntry ($D2["Di"], $nDate, $D2["Df"]);
            if ($_compareInterval) {
                array_push($nEventsIncidents, $eI); 
                return;
            }
        }
    }
}
// R.W. & R.A. -> G
function pad_G (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], 12*$_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded) {
            $rDWi = getWeekDay($nDate); // registerDayWeekInit
            $mDWi = getWeekDay($D2["Di"]); // myDayWeekInit
            if ($rDWi == $mDWi) {
                // Pelo fato de os dias da semana coincidirem e o horário também
                array_push($nEventsIncidents, $eI);
                return;
            }
        }
    }
}
// N.R. & R.M. -> H
function pad_H (&$nEventsIncidents, $eI, array $D1, array $D2) {
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
                array_push($nEventsIncidents, $eI); 
                return;
            }
        }
    }
}
// N.R. & R.A. -> J
function pad_I (&$nEventsIncidents, $eI, array $D1, array $D2) {
    $exceded = false;
    for ($_i = 0; !$exceded; $_i++) {
        $nDate = addMonth($D1["Di"], 12*$_i);
        $exceded = $nDate > $D1["Df"] || $nDate > $D2["Df"];
        if (!$exceded) {
            $_compareInterval = isEntry ($D2["Di"], $nDate, $D2["Df"]);
            if ($_compareInterval) {
                array_push($nEventsIncidents, $eI); 
                return;
            }
        }
    }
}
// R.A. & N.R. -> J
function pad_J (&$nEventsIncidents, $eI, array $D1, array $D2) {
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
                array_push($nEventsIncidents, $eI); 
                return;
            }
        }
    }
}

function validateEventCalendar ($mEvent, $rs, $needRsMount = true) {
    $nEventsIncidents = [];

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
                "Duplicar" => $event[11]
            ];
            $event = $rs[$eIdx];
        } else {
            $rs[$eIdx]["Permitido"] = $event["Permitido"] ? explode(",", $event["Permitido"]) : [];
            $rs[$eIdx]["Bloqueio"] = $event["Bloqueio"] ? explode(",", $event["Bloqueio"]) : [];
            $event = $rs[$eIdx];
        }
        $mEvent["Permitido"] = $mEvent["Permitido"] ? explode(",", $mEvent["Permitido"]) : [];
        $mEvent["Bloqueio"] = $mEvent["Bloqueio"] ? explode(",", $mEvent["Bloqueio"]) : [];

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
            if ($mEvent["Recorrente"] == 'N') {
                if ($event["Recorrente"] == 'N') { // r: N.R. && m: N.R.
                    pad_NR_NR($nEventsIncidents,
                        $eIdx,
                        $event["Di"]." ".$event["Hi"],
                        $event["Df"]." ".$event["Hf"],
                        $mEvent["Di"]." ".$mEvent["Hi"],
                        $mEvent["Df"]." ".$mEvent["Hf"]
                    );
                } else { // r: R. && m: N.R. 
                    switch ($event["Periodo"]) {
                        case 'D': // r: R.D. && m: N.R.
                            $_diffDate = diffDate($mEvent["Di"], $mEvent["Df"]);
                            pad_A($nEventsIncidents,  $eIdx, $event, $mEvent);
                            break;
                        case 'W': // r: R.W. && m: N.R.
                            pad_E ($nEventsIncidents,$eIdx, $event, $mEvent);
                            break;
                        case 'M': // r: R.M. && m: N.R.
                            pad_H($nEventsIncidents, $eIdx, $event, $mEvent);
                            break;
                        case 'A': // r: R.A. && m: N.R.
                            pad_J($nEventsIncidents, $eIdx, $event, $mEvent);
                            break;
                    }
                }
            } else {
                if ($event["Recorrente"] == 'N') { // r: N.R. && m: R.
                    switch ($mEvent["Periodo"]) {
                        case 'D': // r: N.R. && m: R.D.
                            $_diffDate = diffDate($event["Di"], $event["Df"]);
                            pad_A($nEventsIncidents, $eIdx, $mEvent, $event);
                            break;
                        case 'W': // r: N.R. && m: R.W.
                            pad_E ($nEventsIncidents, $eIdx, $mEvent, $event);
                            break;
                        case 'M': // r: R.M. && m: N.R.
                            pad_H ($nEventsIncidents, $eIdx, $mEvent, $event);
                            break;
                        case 'A': // r: R.A && m: N.R.
                            pad_J ($nEventsIncidents, $eIdx, $mEvent, $event);
                            break;
                    }
                } else { // r: R. && m: R.
                    $_compareIH = compareInterval([
                        $event["Hi"],
                        $event["Hf"],
                    ], [
                        $mEvent["Hi"],
                        $mEvent["Hf"],
                    ]); // compare Interval Hour
                    if ($_compareIH) { // Se os horários coincidirem será verificado se os dias coicidem
                        switch ($mEvent["Periodo"]) {
                            case 'D': // r: R. && m: R.D.
                                switch ($event["Periodo"]) {
                                    case 'D': // r: R.D && m: R.D.
                                        pad_RD_RD($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                    case 'W': // r: R.W. && m: R.D.
                                        pad_B($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                    case 'M': // r: R.M. && m: R.D.
                                        pad_F ($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                    case 'A': // r: R.A. && m: R.D.
                                        pad_I($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                }
                                break;
                            case 'W': // r: N.R. && m: R.W.
                                switch ($event["Periodo"]) {
                                    case 'D': // r: R.D && m: R.W.
                                        pad_B($nEventsIncidents, $eIdx, $mEvent, $event);
                                        break;
                                    case 'W': // r: R.W. && m: R.W.
                                        pad_RW_RW($nEventsIncidents,
                                            $eIdx,
                                            $event["Di"], $mEvent["Di"]);
                                        break;
                                    case 'M': // r: R.M. && m: R.W.
                                        pad_C($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                    case 'A': // r: R.A. && m: R.W.
                                        pad_G ($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                }
                                break;
                            case 'M': // r: R.M. && m: R.M.
                                switch ($event["Periodo"]) {
                                    case 'D': // r: R.D && m: R.M.
                                        pad_F ($nEventsIncidents, $eIdx, $mEvent, $event);
                                        break;
                                    case 'W': // r: R.W. && m: R.M.
                                        pad_C ($nEventsIncidents, $eIdx, $mEvent, $event);
                                        break;
                                    case 'M': // r: R.M. && m: R.M.
                                        pad_RM_RM ($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                    case 'A': // r: R.A. && m: R.M.
                                        pad_D ($nEventsIncidents, $eIdx, $event, $mEvent);
                                        break;
                                }
                                break;
                            case 'A': // r: R.A && m: R.A.
                                switch ($event["Periodo"]) {
                                    case 'D': // r: R.D && m: R.A.
                                        pad_I ($nEventsIncidents, $eIdx, $mEvent, $event);
                                        break;
                                    case 'W': // r: R.W. && m: R.A.
                                        pad_G ($nEventsIncidents, $eIdx, $mEvent, $event);
                                        break;
                                    case 'M': // r: R.M. && m: R.A.
                                        pad_D ($nEventsIncidents, $eIdx, $mEvent, $event);    
                                        break;
                                    case 'A': // r: R.A. && m: R.A.
                                        pad_RA_RA ($nEventsIncidents, $eIdx, $event, $mEvent); 
                                        break;
                                }
                                break;
                        }
                    }
                }
            }
        }
    }
    return $nEventsIncidents;
}