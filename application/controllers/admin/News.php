<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	New
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class News extends MY_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('category_model');
		$this->data['category_s']      = $this->category_model->getCategories("2");
		$this->data['category_dropdown'] = $this->category_model->getCategoriesDropdown($this->data['category_s']);
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$search_data = [];
		$uri = "/admin/news/index/";

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

		$this->data['news_s'] = $this->news_model->search($this->data['params'], $limit, $offset);
		$total_rows = $this->news_model->getTotalRows($this->data['params']);
		$this->data['pagination'] = pagination($url, $total_rows, $limit, $page);

		$this->load->view('admin/news_list', $this->data);
	}

	/**
	 * add or edit news
	 * @param  $id 
	 * 
	 **/
	public function edit($id = null)
	{
		if($id){
			$this->data["method"]   = 'edit';
			$this->data["news"] = (object)$this->news_model->getById($id);
			if(!$this->data["news"]){
				redirect("admin/news/");
			}
		}else{
			$this->data["method"]   = 'add';
			$this->data["news"] = (object)$this->input->post("news");
		}

		if($this->input->post()){
			if($id){
				$data_post = (object)$this->input->post('news');
				$this->data['news'] = get_values_of_form($this->data['news'], $data_post); 
			}

			//validation 
			if($this->form_validation->run("admin_news") === true && $this->input->post("action") != "back"){
				$this->data["action"] = "edit/".$id;
				
				return $this->load->view('admin/news_confirm', $this->data);
			}
		}
		
		$this->load->view('admin/news_edit', $this->data);
	}

	public function confirm(){
		if($this->input->post("form_data")){
			$form_data = (array)unserialize($this->input->post("form_data"));
			$form_data["title_seo"] = change_title($form_data["title"]);
			$form_data["com"] = "news";
			if(isset($form_data["id"]) && $form_data["id"]){
				$id = $form_data["id"];
			}else{
				$id = null;
			}

			$this->news_model->save($form_data, $id); 
		}
		redirect("/admin/news/", "refresh");
	}

	/**
	 * delete a news
	 *
	 * @param  $id
	 */
	public function delete($id){
		$get = $this->uri->uri_to_assoc(5);
		if(empty($get) || $get[$this->security->get_csrf_token_name()] != $this->security->get_csrf_hash()){
			redirect("admin/news");
		}
	
		if($id && $this->news_model->getById($id)){
			$this->news_model->delete($id);
		}
		redirect("admin/news");
	}//END delete()
}
