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
		$this->load->model('category_model');
		$this->data['all_category']      = $this->category_model->getCategories();
		$this->data['category_dropdown'] = $this->category_model->getCategoriesDropdown($this->data['all_category']);
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$category_level_0              = $this->category_model->getCategories("0");
		$this->data['category_parent'] = $this->category_model->getCategoriesDropdown($category_level_0);

		$search_data = [];
		$uri = "/admin/category/index/";

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

		$this->data['category_s'] = $this->category_model->search($this->data['params'], $limit, $offset);
		$total_rows = $this->category_model->getTotalRows($this->data['params']);
		$this->data['pagination'] = pagination($url, $total_rows, $limit, $page);

		$this->load->view('admin/category_list', $this->data);
	}

	/**
	 * add or edit category
	 * @param  $id 
	 * 
	 **/
	public function edit($id = null)
	{
		if($id){
			$this->data["method"]   = 'edit';
			$this->data["category"] = (object)$this->category_model->getById($id);
			if(!$this->data["category"]){
				redirect("admin/category/");
			}
		}else{
			$this->data["method"]   = 'add';
			$this->data["category"] = (object)$this->input->post("category");
		}

		//validation 
		if($this->form_validation->run("admin_category_edit") === true && $this->input->post("action") != "back"){
			$this->data["action"] = "edit/".$id;
			return $this->load->view('admin/category_confirm', $this->data);
		}
		
		$this->load->view('admin/category_edit', $this->data);
	}

	public function confirm(){
		if($this->input->post("form_data")){
			$form_data = (array)unserialize($this->input->post("form_data"));
			$form_data["name_seo"] = change_title($form_data["name"]);
			if($this->input->post("id")){
				$id = $this->input->post("id");
			}else{
				$id = NULL;
			}

			$this->category_model->save($form_data, $id); 
		}
		redirect("/admin/category/", "refresh");
	}

	/**
	 * delete a category
	 *
	 * @param  $id
	 */
	public function delete($id){
		$get = $this->uri->uri_to_assoc(5);
		if(empty($get) || $get[$this->security->get_csrf_token_name()] != $this->security->get_csrf_hash()){
			redirect("admin/category");
		}
	
		if($id && $this->category_model->getById($id)){
			$this->category_model->delete($id);
		}
		redirect("admin/category");
	}//END delete()

	/**
	 * build array category all level
	 * @param  $categorys
	 * @param  $parent id 
	 * @return  array [description]
	 * 
	 **/
	protected function buildCategories($categorys = [], $parent = 0) {
	    $data = [];

	    foreach ($categorys as $key => $row) {
	        if ($row['parent_id'] == $parent) {
	        	unset($categorys[$key]);
	        	$children = $this->buildCategories($categorys, $row['id']);
	        	if($children){
	            	$row['children'] = $children;
	        	}
	            $data[$row['id']] = $row;
	        }
	    }

	    return $data;
	}


}
