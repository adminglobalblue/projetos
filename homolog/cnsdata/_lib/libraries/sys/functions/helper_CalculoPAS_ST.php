<?php 
$_Nferiados = null;
$FeriadoEncontrados = null;

function setFeriados(Nferiados $_Nferiados){
	$GLOBALS["_Nferiados"] = $_Nferiados;
}

function diffHourByDate($D1, $D2, $isStrtotime = false){
    if ($isStrtotime) {
        return abs(round(($D1 - $D2)/3600, 16));
    } else {
        return abs(round((strtotime($D1) - strtotime($D2))/3600, 16));
    }
}

function diffHourByHour($H1, $H2){
    return abs(round((strtotime(date("Y-m-d")." ".$H1) - strtotime(date("Y-m-d")." ".$H2))/3600, 16));
}

function diffDayByDate($D1, $D2, $isStrtotime) {
    if ($isStrtotime) {
        $D1 = new DateTime(date("Y-m-d H:i:s", $D1));
        $D2 = new DateTime(date("Y-m-d H:i:s", $D2));
    } else {
        $D1 = new DateTime(date("Y-m-d H:i:s", strtotime($D1)));
        $D2 = new DateTime(date("Y-m-d H:i:s", strtotime($D2)));
    }
    $interval = $D1->diff($D2);
    return [
        "Y" => $interval->y,
        "m" => $interval->m,
        "d" => $interval->d,
        "H" => $interval->h,
        "i" => $interval->i
    ];
}

function isFdsFeriado($D, $isStrtotime){
	$GLOBALS["FeriadoEncontrados"] = null;
    if ($isStrtotime) {
        $w = date("w", $D);
		$date = date("Y-m-d", $D);
		$year = date("Y", $D);
    } else {
        $w = date("w", strtotime($D));
		$date = date("Y-m-d", strtotime($D));
		$year = date("Y", strtotime($D));
    }
	if($w == 0 || $w == 6) return true;
	elseif ($GLOBALS["_Nferiados"]) {
        $rsFeriados = $GLOBALS["_Nferiados"]->getByDate($date);
		if ($rsFeriados) {			
			$GLOBALS["FeriadoEncontrados"] = $rsFeriados;
			return true;
		} else return false;
	} else return false;
}

function isNoturno($D1, $D2, $HIAN, $HFAN, $isStrtotime){    
    if ($HIAN && $HFAN) {
        if ($isStrtotime) {
            $H1 = date("Y-m-d H:i", $D1);
            $H2 = date("Y-m-d H:i", $D2);
            $HIAN = date("Y-m-d", $D1)." $HIAN";
            $HFAN = date("Y-m-d", $D1)." $HFAN";
        } else {
            $H1 = date("Y-m-d H:i", strtotime($D1));
            $H2 = date("Y-m-d H:i", strtotime($D2));
            $HIAN = date("Y-m-d", strtotime($D1))." $HIAN";
            $HFAN = date("Y-m-d", strtotime($D1))." $HFAN";
        }
        
        /*
            00h                 12h                 23h59
            |<-------------------|------------------->|
            -------->|                      |<---------
                FimAdicional            InicioAdicional
                Noturno                 Noturno
        */
        $hour = 0;
        if ($H1 < $HIAN && $H2 > $HIAN ||
            $H1 < $HFAN && $H2 > $HFAN) {
            if ($H1 < $HIAN && $H2 > $HIAN) {
                $hour += diffHourByDate($H2, $HIAN);
            }
            if ($H1 < $HFAN && $H2 > $HFAN) {
                $hour += diffHourByDate($H1, $HFAN);
            }
        } elseif ($H1 < $HFAN && $H2 <= $HFAN ||
            $H1 >= $HIAN && $H2 > $HIAN) {
                $hour += diffHourByDate($H1, $H2);
        }
        return $hour;
    } else {
        return false;
    }
}

function isComercial($D1, $D2, $isStrtotime) {
    if ($isStrtotime) {
        $H1 = date("Y-m-d H:i", $D1);
        $H2 = date("Y-m-d H:i", $D2);
        $HCI = date("Y-m-d", $D1)." 08:00";
        $HCF = date("Y-m-d", $D1)." 18:00";
    } else {
        $H1 = date("Y-m-d H:i", strtotime($D1));
        $H2 = date("Y-m-d H:i", strtotime($D2));
        $HCI = date("Y-m-d", strtotime($D1))." 08:00";
        $HCF = date("Y-m-d", strtotime($D1))." 18:00";
    }
    
    /*
        00h                 12h                 23h59
        |<-------------------|------------------->|
        00h    8h            12h          18h   23h59
        |       |<-----------|------------>|      |
                        Horário comercial
    */
    $hour = 0;
    if ($H1 < $HCI && $H2 > $HCI && $H2 <= $HCF) {
        $hour += diffHourByDate($HCI, $H2);
    } elseif ($H1 >= $HCI && $H1 < $HCF && $H2 > $HCF) {
        $hour += diffHourByDate($H1, $HCF);
    } elseif ($H1 >= $HCI && $H1 < $HCF && $H2 > $HCI && $H2 <= $HCF) {
        $hour += diffHourByDate($H1, $H2);
    } elseif ($H1 <= $HCI && $H2 >= $HCF) {
        $hour += diffHourByDate($HCI, $HCF);
    }
    return $hour;
}

function isForaComercial($D1, $D2, $isStrtotime) {
    if ($isStrtotime) {
        $H1 = date("Y-m-d H:i", $D1);
        $H2 = date("Y-m-d H:i", $D2);
        $HFCI = date("Y-m-d", $D1)." 18:00";
        $HFCF = date("Y-m-d", $D1)." 08:00";
    } else {
        $H1 = date("Y-m-d H:i", strtotime($D1));
        $H2 = date("Y-m-d H:i", strtotime($D2));
        $HFCI = date("Y-m-d", strtotime($D1))." 18:00";
        $HFCF = date("Y-m-d", strtotime($D1))." 08:00";
    }
    
    /*
        00h                 12h                 23h59
        |<-------------------|------------------->|
        00h    8h            12h          18h   23h59
        |----->|             |             |<-----|
                   Horário  Fora comercial
    */
    $hour = 0;
    if ($H1 < $HFCF && $H2 <= $HFCF || $H1 >= $HFCI && $H2 > $HFCI) {
        $hour += diffHourByDate($H1, $H2);
    } elseif ($H1 < $HFCF && $H2 > $HFCF && $H2 <= $HFCI) {
        $hour += diffHourByDate($H1, $HFCF);
    } elseif ($H1 < $HFCI && $H1 >= $HFCF && $H2 > $HFCI) {
        $hour += diffHourByDate($H2, $HFCI);
    } elseif ($H1 < $HFCF && $H2 > $HFCI) {
        $hour += diffHourByDate($H1, $HFCF);
        $hour += diffHourByDate($H2, $HFCI);
    }

    return $hour;
}

function getDeslocamento($deslocamento) {
    $price = [[
        "h" => 0,
        "p" => $deslocamento,
        "pvalues" => "1 * $deslocamento",
        "pdesc" => "1 * Deslocamento",
        "type" => "Deslocamento"
    ]];
    return $price;
}

function getPriceOfInterval($interval1, $interval2, $values) {
    $price = [];
	$isFeriado = isFdsFeriado($interval1, true);
    if ($isFeriado) {
        $hour = diffHourByDate($interval1, $interval2, true);
        $price[0] = [
            "h" => $hour,
            "p" => $hour * $values['SupervisaoTecnicaFdsFeriado'],
            "pvalues" => "$hour * ".$values['SupervisaoTecnicaFdsFeriado'],
            "pdesc" => "hour * SupervisaoTecnicaFdsFeriado",
            "interval1" => date("Y-m-d H:i:s", $interval1),
            "interval2" => date("Y-m-d H:i:s", $interval2),
            "type" => "FdsFeriado",
			"feriadosEncontrados" => $GLOBALS["FeriadoEncontrados"]
        ];
        $hourNoturno = isNoturno($interval1, $interval2, $values['HorarioInicioAdicionalNoturno'], $values['HorarioFimAdicionalNoturno'], true);
        if ($hourNoturno) {
            $price[1] = [
                "h" => $hourNoturno,
                "p" => $hourNoturno * $values['SupervisaoTecnicaFdsFeriado'] * $values['AdicionalNoturno'],
                "pvalues" => "$hourNoturno * ".$values['SupervisaoTecnicaFdsFeriado']." * ".$values['AdicionalNoturno'],
                "pdesc" => "hourNoturno * SupervisaoTecnicaFdsFeriado * AdicionalNoturno",
                "interval1" => date("Y-m-d H:i:s", $interval1),
                "interval2" => date("Y-m-d H:i:s", $interval2),
                "type" => "Noturno"
            ];
        }
    } else {
        $hourComercial = isComercial($interval1, $interval2, true);
        $price[0] = [
            "h" => $hourComercial,
            "p" => $hourComercial * $values['SupervisaoTecnicaComercial'],
            "pvalues" => "$hourComercial * ".$values['SupervisaoTecnicaComercial'],
            "pdesc" => "hourComercial * SupervisaoTecnicaComercial",
            "interval1" => date("Y-m-d H:i:s", $interval1),
            "interval2" => date("Y-m-d H:i:s", $interval2),
            "type" => "Comercial"
        ];
        $hourForaComercial = isForaComercial($interval1, $interval2, true);
        $price[1] = [
            "h" => $hourForaComercial,
            "p" => $hourForaComercial * $values['SupervisaoTecnicaForaComercial'],
            "pvalues" => "$hourForaComercial * ".$values['SupervisaoTecnicaForaComercial'],
            "pdesc" => "hourForaComercial * SupervisaoTecnicaForaComercial",
            "interval1" => date("Y-m-d H:i:s", $interval1),
            "interval2" => date("Y-m-d H:i:s", $interval2),
            "type" => "ForaComercial"
        ];
        $hourNoturno = isNoturno($interval1, $interval2, $values['HorarioInicioAdicionalNoturno'], $values['HorarioFimAdicionalNoturno'], true);
        if ($hourNoturno) {
            $price[2] = [
                "h" => $hourNoturno,
                "p" => $hourNoturno * $values['SupervisaoTecnicaForaComercial'] * $values['AdicionalNoturno'],
                "pvalues" => "$hourNoturno * ".$values['SupervisaoTecnicaForaComercial']." * ".$values['AdicionalNoturno'],
                "pdesc" => "hourNoturno * SupervisaoTecnicaForaComercial * AdicionalNoturno",
                "interval1" => date("Y-m-d H:i:s", $interval1),
                "interval2" => date("Y-m-d H:i:s", $interval2),
                "type" => "Noturno"
            ];
        }
    }
    return $price;
}

function calcPAS_ST ($dI, $dF, $values) {
    $values["AdicionalNoturno"] = $values["AdicionalNoturno"]/100;
    $strDI = strtotime($dI);    
    $strDF = strtotime($dF);

    if (!$strDI || !$strDF || count($values) == 0) {
        return [
            "totalHour" =>  0,
            "totalHourString" => '00:00',
            "totalPrice" => 0
        ];
    }

    $AllPrices = [];
    if (date("Y-m-d", $strDI) == date("Y-m-d", $strDF)) {
        $interval1 = $strDI;
        $interval2 = $strDF;
        array_push($AllPrices, getPriceOfInterval($interval1, $interval2, $values));
    } else {
        $diffDay = diffDayByDate($strDF, $strDI, true);
        $interval1 = $strDI;
        $interval2 = strtotime(date("Y-m-d", $strDI)." 23:59:59") + 1;
        array_push($AllPrices, getPriceOfInterval($interval1, $interval2, $values));
        $interval1 = strtotime(date("Y-m-d", $strDF)." 00:00");
        $interval2 = $strDF;
        array_push($AllPrices, getPriceOfInterval($interval1, $interval2, $values));
        if ($diffDay["d"] > 1) {
            $interval1 = new DateTime(date("Y-m-d", $strDI));
            $interval2 = new DateTime(date("Y-m-d", $strDF));
            $interval1 = $interval1->modify('+1 day');
            
            $interval = new DateInterval('P1D');
            $daterange = new DatePeriod($interval1, $interval ,$interval2);
            
            foreach($daterange as $date){
                $inter1 = strtotime($date->format("Y-m-d")." 00:00");
                $inter2 = $date->modify('+1 day');
                $inter2 = strtotime($inter2->format("Y-m-d")." 00:00");
                array_push($AllPrices, 
                    getPriceOfInterval($inter1, $inter2, $values));
            }
        }
    }

    array_push($AllPrices, 
        getDeslocamento($values["Deslocamento"]));

    if (count($AllPrices)) {
        $AllData = array(
            "totalHour" => 0,
            "totalPrice" => 0,
            "AllPrices" => $AllPrices
        );
        foreach($AllPrices as $days) {
            foreach($days as $prices) {
                if ($prices["type"] != "Noturno" && $prices["type"] != "Deslocamento") {
                    $AllData["totalHour"] += $prices["h"];
                }
                $AllData["totalPrice"] += $prices["p"];
            }
        }
		$h = $AllData["totalHour"];
        $m = abs($h) - floor(abs($h));
        $h = (String) floor($h);
        $m = (String) round($m * 60);
		$h = strlen($h) == 1 ? "0".$h : $h;
        $m = strlen($m) == 1 ? "0".$m : $m;
        $AllData["totalHourString"] = "$h:$m";
        $AllData["totalPrice"] = round($AllData["totalPrice"], 2);
        return $AllData;
    } else return 0;
}