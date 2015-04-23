<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Email extends CI_Email {

	var	$useragent		= "CodeIgniter";
	var	$charset		= "UTF-8";
	var	$wordwrap		= FALSE;
	var	$_encoding		= "base64";
	
	public function __construct($config = array())
	{
		$ci = get_instance();
		mb_language($ci->config->item('language'));
		return parent::__construct();
	}

	public function from($from, $name = '')
	{
		return parent::from($from, $name);
	}

	public function reply_to($replyto, $name = '')
	{
		return parent::reply_to($replyto, $name);
	}

	public function subject($subject)
	{
		return parent::subject($subject);
	}

	public function message($body)
	{
		return parent::message($body);
	}
}
// END MY_Email class

/* End of file MY_Email.php */
