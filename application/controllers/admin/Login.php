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

class Login extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
	}

	/**
	 * User login
	 */
	public function index()
	{
		$dashboard = '/admin/';
		if($this->session->userdata("admin")["loggedin"]){
			redirect($dashboard);
		}

		// Process form
		$this->form_validation->set_error_delimiters('<p class="error mt10">', '</p>');
		if ($this->form_validation->run("admin_login") == TRUE){
			// We can login and redirect
			if ($this->user_model->login() == TRUE){
				redirect($dashboard);
			}
			else{
				$this->session->set_flashdata('error', '<ul class="error"><li>Email or password incorrect</li></ul>');
				redirect('/admin/login', 'refresh');
			}
		}
		// Load view
		$this->load->view('/admin/login', $this->data);

	}//END index()
}