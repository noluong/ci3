<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $data = array();	

	public function __construct(){		
		parent::__construct();

		if(ENVIRONMENT=="development"){ 
			$this->load->library('console');                        
			$this->output->enable_profiler(true);
			Console::log('Hey, this is really cool, If wanna delete me, see core/MY_Controller.php');
		}

	}

}