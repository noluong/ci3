<?php  if (! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    function __construct()
    {
        parent::__construct();
    }

	function view_path_orverride($path) {
		$this->_ci_view_paths = array(APPPATH.'views/'.$path => TRUE);
	}

}