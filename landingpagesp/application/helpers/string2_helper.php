<?php

function helperString2FormatCurrency($number, $prefix = false, $lang = 'br') {
    return ($prefix ? 'R$ ' : null) . number_format($number, 2, ',', '.');
}

function helperString2FormatCurrencyForDatabase($number) {
    return str_replace(',', '.', str_replace('.', '', $number));
}

function helperString2FormatDateAndTimesForView($string, $show_seconds = false, $lang = 'br') {
    $explode1 = explode(' ', $string);
    $explode2 = explode('-', $explode1[0]);
    return $explode2[2] . '/' . $explode2[1] . '/' . $explode2[0] . ' às ' . ($show_seconds ? $explode1[1] : substr($explode1[1], 0, -3));
}

function helperString2FormatDateForDatabase($string) {
    $explode1 = explode('/', $string);
    return $explode1[2] . '-' . $explode1[1] . '-' . $explode1[0];
}

function helperString2FormatDate($string, $lang = 'br') {
    $explode1 = explode('-', $string);
    return $explode1[2] . '/' . $explode1[1] . '/' . $explode1[0];
}

function helperString2GetHourAndMinute($date) {
    $explode = explode(' ', $date);
    return substr($explode[1], 0, 5);
}

function helperString2GetYearNumber($date) {
    $explode1 = explode(' ', $date);
    $explode2 = explode('-', $explode1[0]);
    return $explode2[0];
}

function helperString2GetDayNumber($date) {
    $explode1 = explode(' ', $date);
    $explode2 = explode('-', $explode1[0]);
    return $explode2[2];
}

function helperString2GetDayName($date, $lang = 'br') {

    $explode = explode(' ', $date);

    $ci = get_instance();

    $ci->load->database();

    $row = $ci->db->query("SELECT WEEKDAY('{$explode[0]}') weekday")->row_array();

    if ($row['weekday'] == '0') {
        return 'Segunda';
    } else if ($row['weekday'] == '1') {
        return 'Terça';
    } else if ($row['weekday'] == '2') {
        return 'Quarta';
    } else if ($row['weekday'] == '3') {
        return 'Quinta';
    } else if ($row['weekday'] == '4') {
        return 'Sexta';
    } else if ($row['weekday'] == '5') {
        return 'Sábado';
    } else {
        return 'Domingo';
    }
}

function helperString2GetMonthName($date, $lang = 'br') {

    $explode1 = explode(' ', $date);
    $explode2 = explode('-', $explode1[0]);

    if ($explode2[1] == '1' || $explode2[1] == '01') {
        return 'Janeiro';
    } else if ($explode2[1] == '2' || $explode2[1] == '02') {
        return 'Fevereiro';
    } else if ($explode2[1] == '3' || $explode2[1] == '03') {
        return 'Março';
    } else if ($explode2[1] == '4' || $explode2[1] == '04') {
        return 'Abril';
    } else if ($explode2[1] == '5' || $explode2[1] == '05') {
        return 'Maio';
    } else if ($explode2[1] == '6' || $explode2[1] == '06') {
        return 'Junho';
    } else if ($explode2[1] == '7' || $explode2[1] == '07') {
        return 'Julho';
    } else if ($explode2[1] == '8' || $explode2[1] == '08') {
        return 'Agosto';
    } else if ($explode2[1] == '9' || $explode2[1] == '09') {
        return 'Setembro';
    } else if ($explode2[1] == '10') {
        return 'Outubro';
    } else if ($explode2[1] == '11') {
        return 'Novembro';
    } else {
        return 'Dezembro';
    }
}

function helperString2GetMonthNameForNumber($month_number, $characters = 3) {

    if ($month_number == '01') {
        $month = substr('Janeiro', 0, $characters);
        return $month;
    } else if ($month_number == '02') {
        $month = substr('Fevereiro', 0, $characters);
        return $month;
    } else if ($month_number == '03') {
        $month = substr('Março', 0, $characters);
        return $month;
    } else if ($month_number == '04') {
        $month = substr('Abril', 0, $characters);
        return $month;
    } else if ($month_number == '05') {
        $month = substr('Maio', 0, $characters);
        return $month;
    } else if ($month_number == '06') {
        $month = substr('Junho', 0, $characters);
        return $month;
    } else if ($month_number == '07') {
        $month = substr('Julho', 0, $characters);
        return $month;
    } else if ($month_number == '08') {
        $month = substr('Agosto', 0, $characters);
        return $month;
    } else if ($month_number == '09') {
        $month = substr('Setembro', 0, $characters);
        return $month;
    } else if ($month_number == '10') {
        $month = substr('Outubro', 0, $characters);
        return $month;
    } else if ($month_number == '11') {
        $month = substr('Novembro', 0, $characters);
        return $month;
    } else {
        $month = substr('Dezembro', 0, $characters);
        return $month;
    }
}

function helperString2FormatTextToFriendlyURL($string) {
    return strtolower(url_title(convert_accented_characters($string)));
}

function helperString2ConvertStringInHashtags($string) {
    $string = str_replace(',', ' ', $string);
    $string = str_replace('  ', ' ', $string);
    $string = str_replace('#', '', $string);
    $array = explode(' ', $string);
    return $array;
}

function helperString2GetYoutubeCodeFromURL($url) {
    $explode = explode('=', $url);
    return $explode[1];
}

function helperString2CharacterLimiter($string, $n) {
    $ci = get_instance();
    $string = character_limiter($ci->security->xss_clean(strip_tags($string)), $n);
    return $string;
}
