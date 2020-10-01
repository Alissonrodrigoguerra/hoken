<?php

function helperSession2GetValueOfArray($array, $key) {
    $ci = get_instance();
    $session_array = $ci->session->userdata($array);
    return $session_array[$key];
}
