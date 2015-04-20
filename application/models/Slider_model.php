<?php
/**
 * Slider Model
 *
 * @package   Category Model
 * @version   1.0
 * @author    cybridge asia
 *
 */

class Slider_model extends MY_Model
{	
    protected $_table = "slider";
    protected $_pk = "id";
	protected $_order = "priority ASC";
	protected $_timestamps = TRUE;

	public function __construct ()
	{
		parent::__construct();
	}


	public function getAll(){
		
		$data = $this->db->select("*")
				->from($this->_table)
				->get()
				->result();
		return $data;

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
     *  search slider follow params
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
		if(!empty($params["com"])) {
			$this->db->where("com", $params["com"]);
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
     *  count slider
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

	public function getArticles($option = null) {

		$this->db->select("*")
			->from($this->_table)
			->where("is_active", 1);
		if(!empty($option["com"])){
			$this->db->where("com", $option["com"]);
		}
		if(!empty($option["is_special"])){
			$this->db->where("is_special", $option["is_special"]);
		}

		if(!empty($option["limit"])){
			$this->db->limit($option["limit"]);
		}
		$data = $this->db->get()->result_array();
		return $data;
	}	
}