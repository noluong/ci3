<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @package	MY_Controller
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class MY_Controller extends CI_Controller 
{

	public $data = array();	
	
	public function __construct()
	{		
		parent::__construct();

		//if(ENVIRONMENT=="development"){
			$this->load->library('console');                        
			$this->output->enable_profiler(true);
			Console::log('Hey, this is really cool, If wanna delete me, see core/MY_Controller.php');
		//}

		if(!preg_match("/admin\/login/", $_SERVER['REQUEST_URI']) && preg_match("/^\/admin/", $_SERVER['REQUEST_URI'])){
			if(!$this->session->userdata("admin")["loggedin"]){
				redirect("/admin/login", "refresh");
			}
		}

	}

}