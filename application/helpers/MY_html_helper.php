<?php

/**
 * get_params for search and paging
 *
 * @package     CodeIgniter
 * @subpackage  Helpers
 * @category    Helpers
 */

// ------------------------------------------------------------------------
if (!function_exists('get_params')) {
    function get_params($opt_s = array(), $exception = array()) {
        $default_s = array(
            'type' => 'URI',
            'segment' => 4,
            'obj' => TRUE,
        );
        $opt = (object)array_merge($default_s, $opt_s);
        $ci =& get_instance();
        switch ($opt->type) {
            case 'GET':
                $data = $ci->input->get(NULL, TRUE);
                break;
            case 'POST':
                $data = $ci->input->post(NULL, TRUE);
                break;
            default:
                $data = $ci->uri->uri_to_assoc($opt->segment);
                break;
        }
        if (!$data) {
            return FALSE;
        }
        $params = array();
        $exception = array_merge(array('x', 'y', 'submit', 'btnSearch_x', 'btnSearch_y'), $exception);
        foreach ($data as $key => $value) {
            if (in_array($key, $exception)) {
                continue;
            }
            $params[$key] = urldecode(urldecode(trim($value)));           
        }
        if (empty($params)) {
            return FALSE;
        }
        return $opt->obj ? (object)$params : $params;
    }
}


/**
 * pagination
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 */

// ------------------------------------------------------------------------
if (!function_exists('pagination')) {

    function pagination($page_url, $num_result, $per_page, $page, $step = 3) {
        if($num_result > $per_page):
            $space = $step * 2 + 1;
            $total_page = ceil($num_result / $per_page);
            //$last_page = ceil($num_result / $per_page);

            $start = 1;
            $end = $total_page;
            if($total_page > $space){
                $end = $space;
                if($page + $step < $total_page){
                    $end = $page + $step;
                    $start = $end + 1 - $space;
                    if($start <= 0){
                        $start = 1;
                        $end = $start - 1 + $space;
                    }
                }else{
                    $end = $total_page;
                    $start = $end + 1 - $space;
                    if($start <= 0){
                        $start = 1;
                        $end = $start - 1 + $space;
                    }
                }
            }
            $str = "";
            $str .= "<ul class=\"pagination pagination-sm no-margin pull-right\">";
            if($page == 1){
                // $str .= "<li class=\"disabled\"><a>&laquo;</a></li>";
                // $str .= "<li class=\"disabled\"><a>&lt;</a></li>";
            }
            else{
                $str .= "<li class=\"piecss3\"><a href=\"".$page_url.(1)."\" >&laquo;</a></li>";
                $str .= "<li class=\"piecss3\"><a href=\"".$page_url.($page -1)."\" >&lt;</a></li>";
            }

            for($i = $start; $i <= $end; $i++){
                if($i != $page){
                    $str .= "<li class=\"piecss3\"><a href=\"".$page_url.$i."\" >".$i."</a></li>";  
                }
                else{
                    $str .= "<li class=\"active piecss3\" ><a>".$i."</a></li>";
                }
            }

            if($page >= $total_page){
                // $str .= "<li class=\"disabled\"><a>&gt;</a></li> ";
                // $str .= "<li class=\"disabled\"><a>&raquo;</a></li>  ";
            }
            else{
                $str .= "<li class=\"piecss3\"><a href=\"".$page_url.($page + 1)."\" >&gt;</a></li>";
                $str .= "<li class=\"piecss3\"><a href=\"".$page_url.($total_page)."\" >&raquo;</a></li>";
            }
            $str .= "</ul>";
            return $str;
        endif;
        
    }

}


function escape($param)
{
    return html_escape($param);
}

function submit_status()
{
    $submit = get_instance()->input->post('submit');
    if(is_array($submit)) {
        return key($submit);
    }
    return null;
}

function required()
{
    return '<span class="require"><img src="/public/user/img/common/icon_required.gif"></span>';
}

function str_limit($value, $limit = 100, $end = '...') {
    if(!$value) return '';

    $str  = mb_substr($value, 0, $limit);

    if($str == $value) {
        return $str;
    }

    $str .= $end;
    return $str;
}

function img_embed($file_name, $type)
{
    $img_data  = base64encode(file_get_content($file_name));

    if(!$type || !$img_data) return '';
    return '<img src="data:'.$type.';'.$img_data.'" />';
}