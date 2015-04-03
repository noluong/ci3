<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Mobile
 *
 */
class Mobile
{

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('user_agent');
	}

	/**
	 * set_view()
	 *
	 */
	function set_view()
	{
		if($this->valid()) {
			$this->ci->load->view_path_orverride('sp/');
			return ;
		}

		return ;
	}

	/**
	 * display
	 */
	function display()
	{
		if($this->valid()) {
			echo $this->ci->output->get_output();
		}
		else {
			echo $this->ci->output->get_output();
		}
	}

	/**
	 * valid
	 * @return bool
	 */
	function valid()
	{
		$is_mobile = (bool)$this->ci->agent->is_mobile();
		if($is_mobile) {
			return true;
		}
		return false;
	}

}
