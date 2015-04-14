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


/**
 * create input hidden
 * @param $field
 * @param bool $array
 * @return string
 */
function confirm($field, $array = false, $default = '')
{
    if(is_array($field)){
        foreach ($field as $key => $value) {
            $value_input = ($_POST[$key][$value]) ? $_POST[$key][$value]: null;
            $name_input = $key."[".$value."]";
            break;
        }
        return escape($value_input).form_hidden($name_input, $value_input);
    }else{
       $value = ($_POST[$field]) ? $_POST[$field]: null;
        if((is_null($value) || $value === '') && func_num_args() === 3) {
            return $default;
        }elseif(is_array($value)) {
        }
    }

    if(is_array($array)) {
        if(isset($array[$value])) return e($array[$value]).form_hidden($field, $value);
        return $default;
    }
    
    return escape($value).form_hidden($field, $value);
}