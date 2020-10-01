<?php

function helperDatabase2GetColumnValue($table, $column, $idAlias, $idValue) {
  $ci = get_instance();
  $ci->db->select($column);
  $ci->db->from($table);
  $ci->db->where($idAlias, $idValue);
  $ci->db->limit(1);
  $query = $ci->db->get();
  $result = $query->row_array();
  return $result["{$column}"];
}
