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

if (!function_exists('get_values_of_form')) {
    function get_values_of_form($obj1, $obj2, $return_obj = TRUE) {
        $obj1 = (object)$obj1;
        $obj2 = (object)$obj2;
        foreach ($obj1 as $key => $value) {
            if (isset($obj2->$key)) {
                $obj1->$key = $obj2->$key;
            }
        }
        return ($return_obj) ? $obj1 : (array)$obj1;
    }
}

/**
 * create pull down for select 
 * @param $str 
 *
 **/
function select_options($data, $str = null)
{
    $key_s = array_keys($data);

    if(!is_null($str)) {
        array_unshift($key_s, '');
        array_unshift($data, $str);
    }

    return array_combine($key_s, $data);
}

