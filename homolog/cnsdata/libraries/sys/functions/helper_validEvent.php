<?php
//#region
function addMonth(string $date, int $monthToAdd) {
    $date = new DateTime($date);
    $year = $date->format('Y');
    $month = $date->format('n');
    $day = $date->format('d');

    $year += floor($monthToAdd / 12);
    $monthToAdd = $monthToAdd % 12;
    $month += $monthToAdd;
    if ($month > 12) {
        $year ++;
        $month = $month % 12;
        if ($month === 0) {
            $month = 12;
        }
    }

    if (! checkdate($month, $day, $year)) {
        $newDate = \DateTime::createFromFormat('Y-n-j', $year . '-' . $month . '-1');
        $newDate->modify('last day of');
    } else {
        $newDate = \DateTime::createFromFormat('Y-n-d', $year . '-' . $month . '-' . $day);
    }
    $newDate->setTime($date->format('H'), $date->format('i'), $date->format('s'));

    return $newDate->format('Y-m-d');
}

function compareInterval (array $inter1, array $inter2) {
    $result = (
        $inter1[0] < $inter2[0] && $inter1[1] > $inter2[0] ||
        $inter1[0] < $inter2[1] && $inter1[1] > $inter2[1] ||
        $inter2[0] < $inter1[0] && $inter2[1] > $inter1[0] ||
        $inter2[0] < $inter1[1] && $inter2[1] > $inter1[1]
    );  
    return $result;
}

function diffDate (string $inter1, string $inter2) {
    $inter1 = new DateTime($inter1);
    $inter2 = new DateTime($inter2);
    $interval = $inter1->diff($inter2);
    return [
        "Y" => $interval->y,
        "m" => $interval->m,
        "d" => $interval->d,
        "H" => $interval->h,
        "i" => $interval->i
    ];
}

function getWeekDay (string $date) { // get Week Day
    return date('w', strtotime($date));
}

function getMonthNumber (string $date) { // get Month Number
    return date('n', strtotime($date));
}

function getYearNumber (string $date) { // get Year Number
    return date('Y', strtotime($date));
}

function getDbWD (string $date, string $newWD /*new Week Day*/) { // get Date by Week Day
    $_getWeekDay = getWeekDay($date);
    $date = new DateTime($date);
    $date->modify($newWD - $_getWeekDay." day");
    return $date->format("Y-m-d");
}

function isEntry (string $Di, string $entry, string $Df) {
    if ($Di > $Df) {
        return $entry > $Di || $entry < $Df;    
    } else {
        return $entry > $Di && $entry < $Df;
    }
}