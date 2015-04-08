<?php

/**
 *
 * @package	MY_Model
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class MY_Model extends CI_Model
{
	
	protected $_table;
	protected $_pk = 'id';
	protected $_filter = 'intval';
	protected $_order;
	protected $_timestamps = FALSE;
	public function __construct() 
	{
		parent::__construct();
	}
	
	public function save($data, $id = NULL)
	{
		// Set timestamps
		if ($this->_timestamps == TRUE){
			$now = date('Y-m-d H:i:s');
			if(!$id){
				$data['created'] = $now;
			}
			$data['updated'] = $now;
		}
		
		// Insert
		if ($id === NULL){
			if(isset($data[$this->_pk])){
				$data[$this->_pk] = NULL;
			}
			$this->db->set($data);
			$this->db->insert($this->_table);
			$id = $this->db->insert_id();
		}
		// Update
		else{
			$filter = $this->_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_pk, $id);
			$this->db->update($this->_table);			
		}		
		return $id;
	}
	
	public function delete($id)
	{
		$filter = $this->_filter;
		$id = $filter($id);
		
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_pk, $id);
		$this->db->delete($this->_table);
	}

	public function exist($id)
	{
		$filter = $this->_filter;
		$id = $filter($id);

		$this->db->where($this->_pk, $id);
		$data = $this->db->get($this->_table);
		if (!$data || $data->num_rows() == 0){
			return FALSE;
		}
		return TRUE;
	}
}