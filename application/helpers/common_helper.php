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