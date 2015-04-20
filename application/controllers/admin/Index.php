<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	MY_Model
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class Index extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$this->load->library('Online_users');
		$this->load->view('admin/index');
	}
}
