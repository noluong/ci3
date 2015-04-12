<?php


/**
 * enum_select
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 */

// ------------------------------------------------------------------------
function enum_select( $table , $field , $label = "" )
{
    $ci =& get_instance();
    $query = " SHOW COLUMNS FROM `$table` LIKE '$field' ";
    $row = $ci->db->query(" SHOW COLUMNS FROM `$table` LIKE '$field' ")->row()->Type;
    $regex = "/'(.*?)'/";
    preg_match_all( $regex , $row, $enum_array );
    $enum_fields = $enum_array[1];
    if($label){
        $data[""] = $label;
    }
    foreach($enum_fields AS $val){
        $data[$val] = $val;
    }
    return $data;
}
