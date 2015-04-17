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
					->get()->row();
	}

	/**
     *  get Categories follow condition
     *
     *  @param $options
     *	
     */
	public function getCategories($is_active = FALSE, $is_parent = FALSE){
		$where = [];

		//only category parent level 1
		if($is_parent){
			$where = ['parent_id' => 0];
		}

		//flag active
		if($is_active){
			$where = ['is_active' => 1];
		}

		$this->db->select("id, name, parent_id")->from($this->_table);
    	$this->db->where($where);
    	$data = $this->db->get()->result_array();

    	return $data;

	}

	/**
     *  filter columns for dropdown simple
     *
     *  @param $is_active
     *  @param $all_level
     *	@dependence getCategories()
     */
	public function getCategoriesDropdown($category_s = []){
        $data = [];
        foreach ($category_s as $value) {
            $data[$value["id"]] = $value["name"];   
        };
        
        return $data;
	}

	public function buildCategoryTree($categories = [], $parent_id = 0){
		$data = [];
		foreach($categories as $key => $row)
		{
			if($row['parent_id'] == $parent_id)
			{
				unset($categories[$key]);
				$subs = $this->getCategoryTree($categories, $row['id']);
				if($subs){
					$row['subs'] = $subs;
				}
				$data[$row['id']] = $row;
			}
		}
		return $data;
	}


	/**
     *  search categorys follow params
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
			$this->db->where("parent_id", $params["id"]);
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
     *  count categorys
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