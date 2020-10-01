<?php

function helperLogin2PermissaoCargoArea($idCargo, $areas_path) {
    $ci = get_instance();
    $area = $ci->db->query("
        select *
        from areas
        where status = '1'
        and path = '{$areas_path}'
        limit 1
    ")->row_array();
    if (!$area) {
        return false;
    } else {
        $cargo_area = $ci->db->query("
            select *
            from cargos_areas
            where status = '1'
            and idCargo = '{$idCargo}'
            and idArea = '{$area['idArea']}'
            limit 1
        ")->row_array();
        if (!$cargo_area) {
            return false;
        } else {
            return true;
        }
    }
}

function helperLogin2CriptografarSenha($senha) {
    return sha1(APP_NAME . $senha . APP_NAME);
}
