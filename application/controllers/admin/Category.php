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
		$category_s = $this->category_model->getAll();
		$this->load->view('admin/category_list', compact('category_s'));
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
}
