<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	User
 * @author	No Luong
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class Setting extends MY_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('setting_model');
	}

	/**
	 * Show all setting
	 */
	public function edit($id = 1){
		$this->data["setting"] = (object)$this->setting_model->getSetting($id);
			
		if($this->input->post()){
			if($id){
				$data_post = $this->input->post('setting');
				$this->data['setting'] = (array)get_values_of_form($this->data['setting'], $data_post); 
			}

			//validation 
			if($this->form_validation->run("admin_setting") === true){
				$this->data["action"] = "edit/".$id;
				$this->data['msg'] = "Update successful !";
				$this->setting_model->save($this->data['setting'], $id); 
			}
		}
		
		$this->load->view('admin/setting_edit', $this->data);

	}//END index()

	
}
