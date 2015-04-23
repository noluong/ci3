<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	Slider
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class Slider extends MY_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('slider_model');
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index($com = null)
	{
		$search_data = [];
		$uri = "/admin/slider/index/";

		if($this->input->post()) {
			return redirect(get_url($uri, get_params(array('type' => 'POST'))));
		}

		// pagination
		$search_data = (array)get_params(array('type' => 'URI'));
		$page = has_item('page', $search_data, 1);
		$limit = 20;
		$offset = ($page - 1) * $limit;
		$url = get_url($uri, $search_data).'/page/';

		// params for search
		unset($search_data['page']);
		$this->data['params'] = $search_data;

		$this->data['slider_s'] = $this->slider_model->search($this->data['params'], $limit, $offset);
		$total_rows = $this->slider_model->getTotalRows($this->data['params']);
		$this->data['pagination'] = pagination($url, $total_rows, $limit, $page);

		$this->load->view('admin/slider_list', $this->data);
	}

	/**
	 * add or edit slider
	 * @param  $id 
	 * 
	 **/
	public function edit($id = null)
	{
		if($id){
			$this->data["method"]   = 'edit';
			$this->data["slider"] = (object)$this->slider_model->getById($id);
			if(!$this->data["slider"]){
				redirect("admin/slider/");
			}
		}else{
			$this->data["method"]   = 'add';
			$this->data["slider"] = (object)$this->input->post("slider");
		}
		if($this->input->post()){
			if($id){
				$data_post = (object)$this->input->post('slider');
				$this->data['slider'] = get_values_of_form($this->data['slider'], $data_post); 
			}

			//validation 
			if($this->form_validation->run("admin_slider") === true && $this->input->post("action") != "back"){
				$this->data["action"] = "edit/".$id;

				if($_FILES["userfile"]["name"]){
					$file_type = "jpg|jpeg|gif|png";

					if(isset($this->data["slider"]->photo) && $this->data["slider"]->photo){
						$this->delete_file($this->data["slider"]->photo, "uploads/slider/");
					}

					$data = $this->do_upload_img("uploads/slider/", $file_type);

					if(isset($data['file_name']) && $data['file_name']){
						$this->data['slider']->photo = $data['file_name'];
					}else{
						$this->data['error'] = $data;
						return $this->load->view('admin/slider_edit', $this->data);
					}
				}

				return $this->load->view('admin/slider_confirm', $this->data);
			}
		}
		
		$this->load->view('admin/slider_edit', $this->data);
	}

	public function confirm(){
		if($this->input->post("form_data")){
			$form_data = (array)unserialize($this->input->post("form_data"));
			if(isset($form_data["id"]) && $form_data["id"]){
				$id = $form_data["id"];
			}else{
				$id = null;
			}

			$this->slider_model->save($form_data, $id); 
		}
		redirect("/admin/slider/index/", "refresh");
	}

	/**
	 * delete a slider
	 *
	 * @param  $id
	 */
	public function delete($id){
		$get = $this->uri->uri_to_assoc(5);
	
		if(empty($get) || $get[$this->security->get_csrf_token_name()] != $this->security->get_csrf_hash()){
			redirect("/admin/slider/index/");
		}
		$slider_r = $this->slider_model->getById($id);
		if($id && $slider_r ){
			if($slider_r->photo){
				$this->delete_file($slider_r->photo, "uploads/slider/");
			}
			$this->slider_model->delete($id);
		}
		redirect("/admin/slider/index/");
	}//END delete()
}
