<?php
/**
 * New Model
 *
 * @package   Category Model
 * @version   1.0
 * @author    cybridge asia
 *
 */

class New_model extends MY_Model
{	
    protected $_table = "news";
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
					->get()->row();
	}

	/**
     *  search news follow params
     *
     *  @param $params
     *	
     */

	public function setCondition($params = null){
		if(!empty($params["keyword"])) {
			$keyword = $params["keyword"];
			$this->db->where("( name LIKE '%{$keyword}%' )");
		} 
		if(!empty($params["id"])) {
			$this->db->where("category_id", $params["id"]);
		} 

	}

	public function search($params = null, $limit = null, $offset = null) {
		$this->setCondition($params, $limit, $offset);
		$this->db->order_by($this->_order);
		$this->db->limit($limit, $offset);
		$data = $this->db->get($this->_table);
		if (!$data) {
			return array();
		}
		return $data->result();
	}//END search()	


	/**
     *  count news
     *
     *  @param $params
     *  
     */

	public function getTotalRows($params = null) {
		$this->setCondition($params);
		$data = $this->db->get($this->_table);
		if (!$data) {
			return 0;
		}
		return $data->num_rows();
	}//END get_total_rows()

}