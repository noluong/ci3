<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	Contact
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class Contact extends MY_Controller 
{

	public function __construct(){
		parent::__construct();
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{

		$this->load->view('contact/index', $this->data);
	}

	/**
	 * send contact
	 * 
	 **/
	public function send()
	{
		
		if($this->input->post()){
			$this->data["contact"] = (object)$this->input->post("contact");

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			//validation 
			if($this->form_validation->run("contact") === true){

				// sending email
				$replace_list  = array(
					'name'    => $this->data["contact"]->name,
					'phone'   => $this->data["contact"]->phone,
					'email'   => $this->data["contact"]->email,
					'address' => $this->data["contact"]->address,
					'summary' => $this->data["contact"]->summary,
					'subject' => $this->data["contact"]->subject,
					'content' => $this->data["contact"]->content,
				);

				$template_mail = "contact";
				$subject = "Thư liên hệ đăng ký vay tín dụng tiêu dùng VPBank";
				$param  = array(
					'email'   => $this->data['setting']->email,
					'subject' => $subject,
				);
				if(sending_email($template_mail, $replace_list, $param)){
					$this->session->set_flashdata('msg', 'Gửi thông tin liên hệ thảnh công !');
				}else{
					$this->session->set_flashdata('error', 'Có lỗi xảy ra, xin vui thòng thử lại sau !');
				}
				redirect('contact/');
			}
		}
		
		$this->load->view('contact/index', $this->data);
	}

}
