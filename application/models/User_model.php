<?php
/**
 * User Model
 *
 * @package   User Model
 * @version   1.0
 * @author    cybridge asia
 *
 */

class User_model extends MY_Model
{	
    protected $_table = "user";
    protected $_pk = "id";
	protected $_order = "created DESC";
	protected $_timestamps = TRUE;

	public function __construct ()
	{
		parent::__construct();
	}


	public function getAll(){
		return $this->db->select("*")
				->from($this->_table)
				->get()
				->result();

	}

	public function getById($id)
	{
		return $this->db->select()
					->from($this->_table)
					->where([
						'id' => $id,
					])
					->get_row();
	}

	/*
     Check login infomation and create session
     */

	public function login(){
		$where = array(
			'mail_address' => $this->input->post('admin_mail_address'), 
			'password' => do_hash($this->input->post('admin_password')),
		);
		$this->db->select("*")->from($this->_table);
    	$this->db->where($where);
    	$user = $this->db->get()->row();
		if (empty($user)) {
			return FALSE;
		}
		$data = array(
			'admin' => array(
				'mail_address' => $user->mail_address,
				'name'         => $user->name,
				'id'           => $user->id,
				'role'         => $user->role,
				'loggedin'     => TRUE,
			),
		);
		$this->session->set_userdata($data);
		return TRUE;
	}//END login()	

	/**
     *  search user
     *
     *  @param $options
     *	
     */

	public function setQuery($options = null){
		if(!empty($options["keyword"])) {
			$keyword = $options["keyword"];
			$this->db->where("(mail_address LIKE '%{$keyword}%'
								OR name LIKE '%{$keyword}%' 
							)");
		} 
		if(!empty($options["role"])) {
			$role = $options["role"];
			$this->db->where("role", $role);
		} 

	}

	public function search($options = null, $limit = null, $offset = null) {
		$this->setQuery($options, $limit, $offset);
		$this->db->order_by($this->_order);
		$this->db->limit($limit, $offset);
		$data = $this->db->get($this->_table);
		if (!$data) {
			return array();
		}
		return $data->result();
	}//END search()	


	/**
     *  count user
     *
     *  @param $options
     *  
     */

	public function getTotalRows($options = null) {
		$this->setQuery($options);
		$data = $this->db->get($this->_table);
		if (!$data) {
			return 0;
		}
		return $data->num_rows();
	}//END get_total_rows()


}