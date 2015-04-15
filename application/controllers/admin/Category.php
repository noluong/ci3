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
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$all_category      = $this->category_model->getCategories();
		$category_dropdown = $this->category_model->getCategoriesDropdown();
		$category_tree     = $this->buildCategories($all_category);
		

		$search_data = [];
		$uri = "/admin/category/index/";

		if($this->input->post()) {
			return redirect(get_url($uri, get_params(array('type' => 'POST'))));
		}

		// pagination
		$search_data = (array)get_params(array('type' => 'URI'));
		$page = has_item('page', $search_data, 1);
		$limit = 1;
		$offset = ($page - 1) * $limit;
		$url = get_url($uri, $search_data).'/page/';

		// params for search
		unset($search_data['page']);
		$params = $search_data;

		$category_s = $this->category_model->search($params, $limit, $offset);
		$total_rows = $this->category_model->getTotalRows($params);
		$pagination = pagination($url, $total_rows, $limit, $page);

		$this->load->view('admin/category_list', compact('category_s', 'pagination', 'params', 'category_dropdown'));
	}

	/**
	 * add or edit category
	 * @param  $id 
	 * 
	 **/
	public function edit($id = null)
	{
		$data = [];
		if($id){
			$method = 'edit';
			$data['id'] = $id;
		}else{
			$method = 'add';
		}

		//validation
		if($this->form_validation->run("admin_category_edit")){
			
		}

		//post data
		if($this->input->post("category")){
			$data['category'] = $this->input->post("category");
			if($id){
				$this->category_model->update($data['category'], $data['id']);
				redirect("admin/category_list");
			}else{
				$this->category_model->save($data['category']);
			}
		}


		$this->load->view('admin/category_edit', compact('method', 'data'));
	}

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
