<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	Category
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class Category extends MY_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('new_model');
		$this->data['all_new'] = $this->new_model->getCategories();
		$this->data['new_dropdown'] = $this->new_model->getCategoriesDropdown($this->data['all_new']);
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$new_level_0 = $this->new_model->getCategories(FALSE, TRUE);
		$this->data['new_parent'] = $this->new_model->getCategoriesDropdown($new_level_0);

		$search_data = [];
		$uri = "/admin/new/index/";

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

		$this->data['new_s'] = $this->new_model->search($this->data['params'], $limit, $offset);
		$total_rows = $this->new_model->getTotalRows($this->data['params']);
		$this->data['pagination'] = pagination($url, $total_rows, $limit, $page);

		$this->load->view('admin/new_list', $this->data);
	}

	/**
	 * add or edit new
	 * @param  $id 
	 * 
	 **/
	public function edit($id = null)
	{
		if($id){
			$this->data["method"]   = 'edit';
			$this->data["new"] = (object)$this->new_model->getById($id);
			if(!$this->data["new"]){
				redirect("admin/new/");
			}
		}else{
			$this->data["method"]   = 'add';
			$this->data["new"] = (object)$this->input->post("new");
		}

		//validation 
		if($this->form_validation->run("admin_new_edit") === true && $this->input->post("action") != "back"){
			$this->data["action"] = "edit/".$id;
			return $this->load->view('admin/new_confirm', $this->data);
		}

		$this->load->view('admin/new_edit', $this->data);
	}

	public function confirm(){
		if($this->input->post("form_data")){
			$form_data = (array)unserialize($this->input->post("form_data"));
			if(isset($form_data["id"]) && $form_data["id"]){
				$id = $form_data["id"];
			}else{
				$id = null;
			}
			$this->new_model->save($form_data, $id); 
		}
		redirect("/admin/new/", "refresh");
	}

	/**
	 * delete a new
	 *
	 * @param  $id
	 */
	public function delete($id){
		$get = $this->uri->uri_to_assoc(5);
		if(empty($get) || $get[$this->security->get_csrf_token_name()] != $this->security->get_csrf_hash()){
			redirect("admin/new");
		}
	
		if($id && $this->new_model->getById($id)){
			$this->new_model->delete($id);
		}
		redirect("admin/new");
	}//END delete()
}
