<?php
/**
 * Category Model
 *
 * @package   Category Model
 * @version   1.0
 * @author    cybridge asia
 *
 */

class Category_model extends MY_Model
{	
    protected $_table = "category";
    protected $_pk = "id";
	protected $_order = "priority ASC";
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

}