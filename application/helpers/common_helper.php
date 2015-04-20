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

/**
 * Get name of category 
 * 
 * @param	string
 * @param	array|object
 * @param	mixed
 * @return	mixed	depends on what the array|object contains
 */
if ( ! function_exists('get_name_category'))
{
    function get_name_category($parent_id, $obj, $default = '')
    {
        $obj = (object)$obj;
    	foreach ($obj as $key => $item) {
    		if($key == $parent_id){
    			return $item;
    		}
    	}
        return $default;
    }
}


// --------------------------------------------------------------------

/**
 * sending_email
 *
 * Process send email
 *
 * @access	public
 * @param   templates		name of template file
 * @param   replace_list	array string need replace   
 * @param   param 			param("email", "subject")
 * @return  string
 */ 
function sending_email($template,$replace_list,$param){
	
	$ci =& get_instance();
	//load email library
    $ci->load->library('email');
    
	$ci->load->helper("file");
    //read email template
  	$mail_content = read_file('./application/views/templates/'.$template.'.tpl');
  	
	foreach ($replace_list as $key => $value) {
		$mail_content = str_replace("###$key###",$value , $mail_content);
	}

    //sending email
    $ci->email->set_mailtype("text");
    $ci->email->from(NO_REPLY_EMAIL, AUTOMAIL_NAME);
    $ci->email->to($param["email"]); 
    if(isset($param["bcc_email"]) and !empty($param['bcc_email'])){
    	$ci->email->bcc($param["bcc_email"]); 
    }
    if(isset($param["cc_email"]) and !empty($param['cc_email'])){
    	$ci->email->cc($param["cc_email"]); 
    }
    $ci->email->subject($param["subject"]);
    $ci->email->message($mail_content);
    if(isset($param["attach"]) and !empty($param['attach'])){
    	foreach ($param["attach"] as $value) {
    		$ci->email->attach($value); 
    	}
    }
    //$ci->email->print_debugger();
    $ci->email->send();
}
