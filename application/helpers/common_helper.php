<?php


/**
 * Check smartphone
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 */

// ------------------------------------------------------------------------
function is_sp()
{
	$ci =& get_instance();
	$ci->load->library('user_agent');
	if($ci->agent->is_mobile()) {
		return true;
	}

	return false;
}


// --------------------------------------------------------------------

/**
 * is_admin_master
 *
 * Determine role of current user login (for page admin)
 *
 * @access	public
 * @return	bool
 */ 
function is_admin_master(){
	$ci =& get_instance();
	if($ci->session->userdata("admin")["loggedin"]){
		$role = $ci->session->userdata("admin")["role"];
		if($role == "master")
		{
			return TRUE;
		}
		return FALSE;
	}
}


// --------------------------------------------------------------------

/**
 * get_url
 *
 * get current url for paging
 *
 * @access	public
 * @return	bool
 */ 

if (!function_exists('get_url')) {
    function get_url($uri = '', $params = array())
    {
		if ($uri == '') {
			$url = current_url();
			return preg_replace('/\/page\/[0-9]+/', '', $url);
		}
		$url = '/'.trim($uri, '\/');
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				if ($key == 'page' OR $value == '') {
					continue;
				}
				$url .= '/'.$key.'/'.urlencode(urlencode($value));
			}
		}    	
        return $url;
    }
}

/**
 * Lets you determine whether an array|object index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @param	string
 * @param	array|object
 * @param	mixed
 * @return	mixed	depends on what the array|object contains
 */
if ( ! function_exists('has_item'))
{
    function has_item($item, $obj, $default = '')
    {
        $obj = (object)$obj;
        return (isset($obj->$item)) ? $obj->$item : $default;
    }
}