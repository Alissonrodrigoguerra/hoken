<?php

function helperDate2ConverMySQLDatetimeForBrazilDate($date) {
    $explode1 = explode(' ', $date);
    $explode2 = explode('-', $explode1[0]);
    return "{$explode2[2]}/{$explode2[1]}/{$explode2[0]} às " . substr($explode1[1], 0, -3);
}

function helperDate2ConvertTimeAMPMForMySQLTime($time) {
    $explode1 = explode(' ', $time);
    if ($explode1[1] == 'PM') {
        $explode2 = explode(':', $explode1[0]);
        $explode2[0] = $explode2[0] + 12;
        if ($explode2[0] == 24) {
            $explode2[0] = '00';
        }
        return $explode2[0] . ':' . $explode2[1] . ':00';
    } else {
        return $explode1[0] . ':00';
    }
}

function helperDate2ConvertMySQLDatetimeForTimeAMPM($datetime) {
    $explode1 = explode(' ', $datetime);
    $explode2 = explode(':', $explode1[1]);
    if ($explode2[0] > 12 && $explode2[0] <= 23) {
        $explode2[0] = $explode2[0] - 12;
        return $explode2[0] . ':' . $explode2[1] . ' PM';
    } else if ($explode2[0] == '00') {
        return '12' . ':' . $explode2[1] . ' PM';
    } else {
        return $explode2[0] . ':' . $explode2[1] . ' AM';
    }
}
