<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @package	User
 * @author	No Luong
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class User extends MY_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	/**
	 * Show all user
	 */
	public function index(){
		// always redirect if user current login not is master
		if(!is_admin_master()){
			redirect("/admin/user/edit");
		}

		$search_data = [];
		$uri = "/admin/user/index/";

		if($this->input->post()) {
			//validation
			if($this->form_validation->run("admin_user_search")){
				return redirect(get_url($uri, get_params(array('type' => 'POST'))));
			}
		}

		// pagination
		$search_data = (array)get_params(array('type' => 'URI'));
		$page = has_item('page', $search_data, 1);
		$limit = 20;
		$offset = ($page - 1) * $limit;
		$url = get_url($uri, $search_data).'/page/';

		// options for search
		unset($search_data['page']);
		$options = $search_data;

		$this->data["users_s"] = $this->user_model->search($options, $limit, $offset);
		$total_rows = $this->user_model->getTotalRows($options);
		$this->data["pagination"] = pagination($url, $total_rows, $limit, $page);

		// Assign data for view
		foreach($search_data as $key => $value){
			$this->data[$key] = $value;
		}

		$this->load->view("/admin/user_list", $this->data);

	}//END index()

	/**
	 * add or edit a user
	 *
	 * @param  $id
	 */

	public function add(){
		$this->data["method"] ="add";
		// if not admin, will using id_user loggin current

		if(!is_admin_master()){
			redirect("/admin/user/");
		}

		if($this->input->post()){	
			$user = (object)$this->input->post('user');

			if(isset($user->password) && $user->password === '********'){
				$user->password = '';
			}

			if(isset($user->password_confirm) && $user->password_confirm === '********'){
				$user->password_confirm = '';
			}	

			$user->password              = enhash($user->password);
			$this->data["user"]          = $user;
		
			$this->form_validation->add_rules([
				'user[mail_address]' => 'is_unique[user.mail_address]',
				'user[password]'     => 'min_length[6]|max_length[50]|required|matches[password_confirm]',
				'password_confirm'   => 'required'
			]);

			if($this->form_validation->run("admin_user") === TRUE && submit_status() != "back"){
				return $this->load->view("admin/user_confirm", $this->data);
			}
		}

		$this->load->view('admin/user_edit', $this->data);
	}//END add()

	/**
	 * edit a user
	 *
	 * @param  $id
	 */

	public function edit($id){
		// if not admin, will using id_user loggin current
		if(!is_admin_master()){
			if($id){
				$id = $this->session->userdata("admin")["id"];
			}else{
				redirect("admin/user/edit/".$this->session->userdata("admin")["id"]);
			}
		}
		if(!$id){
			redirect("admin/user/");
		}
		$this->data["method"] ="edit";
		$this->data["user"] = $this->user_model->getById($id);
		if(!count($this->data["user"])){
			return redirect('/admin/user/');
		}
		
		if($this->input->post()){

			$data = (object)array_map("htmlspecialchars", $this->input->post('user'));	
			$data->password_confirm = $this->input->post('password_confirm');
			if (isset($data->password) && $data->password === '********') {
				$data->password = '';
			}
			if (isset($data->password_confirm) && $data->password_confirm === '********') {
				$data->password_confirm = '';
			}
			
			$this->form_validation->add_rules([
				'user[mail_address]' => 'is_unique[user.mail_address]',
				'user[password]'     => 'min_length[6]|max_length[50]|valid_password|matches[password_confirm]',
			]);

			$this->data['user'] = get_values_of_form($this->data['user'], $data); 
			if($this->form_validation->run("admin_user") === TRUE && submit_status() != "back"){
				if(empty($this->data['user']->password)){
					unset($this->data['user']->password);
				}else{
					$this->data['form_password'] = $data->password;
					$this->data['user']->password= enhash($this->data['user']->password);
				}
				return $this->load->view("admin/user_confirm", $this->data);
			}

		}
		
		$this->load->view('admin/user_edit', $this->data);
		
	}//END edit()

	/**
	 * show confirm a user
	 *
	 * @param  $id
	 */
	public function confirm(){
		if($this->input->post("user") && submit_status() == "complete"){
			$form_data = (array)($this->input->post("user"));
			dd($form_data);
			unset($form_data["method"]);
			if(!is_admin_master()){
				unset($form_data["role"]);
			}
			if(@$form_data["id"]){
				$id = $form_data["id"];
			}else{
				$id = null;
			}
			if($this->user_model->save($form_data,$id)){
				//if edit current user login then update session after edit 
				if($id == $this->session->userdata("admin")["id"]){
					if(!isset($form_data["role"])){
						$form_data["role"] = "normal";
					}
					$session_user = array( 'admin' => array(
						'mail_address' => $this->encrypt->encode($form_data["mail_address"]),
						'name'         => $this->encrypt->encode($form_data["l_name"]."".$form_data["f_name"]),
						'id'           => $this->encrypt->encode($form_data["id"]),
						'role'         => $this->encrypt->encode($form_data["role"]),
						'loggedin'     => TRUE,
						),
					);
					$this->session->set_userdata($session_user);
				}		
				unset($form_data);
				if(is_admin_master()){
					redirect("/admin/user/");
				}else{	
					redirect("/admin/user/edit/$id", "refresh");
				}
			}else{
				redirect("/admin/user/");
			}
			
		}else{ 
			redirect("/admin/user/add/", "refresh");
		}
	}

	/**
	 * delete a user
	 *
	 * @param  $id
	 */
	public function delete($id){
		$get = $this->uri->uri_to_assoc(5);
		if(empty($get) || $get[$this->security->get_csrf_token_name()] != $this->security->get_csrf_hash()){
			redirect("admin/user");
		}
		// no delete current user
		if($id == $this->session->userdata("admin")["id"]){
			redirect("admin/user");
		}
		if(is_admin_master() && $id){
			$this->data["user"]= $this->user_model->getById($id);
			if(!count($this->data["user"])){
				redirect("admin/user");
			}
			$this->user_model->delete($id);
		}
		redirect("admin/user");
	}//END delete()



}
