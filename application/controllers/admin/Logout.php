<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Login Controller
 *
 * @package Codeigniter 3
 * @subpackage admin
 * @category admin
 * @author No Luong
 * @link http://example.com
 */

class Logout extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}

	/**
	 * User login
	 */
	public function index()
	{
		$this->session->unset_userdata('admin');
		redirect('admin/login');
	}//END index()
}