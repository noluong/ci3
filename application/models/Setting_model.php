<?php
/**
 * Setting Model
 *
 * @package   Category Model
 * @version   1.0
 * @author    cybridge asia
 *
 */

class Setting_model extends MY_Model
{	
    protected $_table = "setting";
    protected $_pk = "id";
	protected $_order = "created ASC";
	protected $_timestamps = TRUE;

	public function __construct ()
	{
		parent::__construct();
	}


	public function getSetting($id)
	{
		return $this->db->select()
					->from($this->_table)
					->where([
						'id' => 1,
					])
					->get()->row();
	}

}