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
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index($id = 0)
	{
		$this->data["news"] = $this->news_model->getById($id);
		if(!$this->data["news"]){
			redirect("/");
		}

		$this->load->view('news/index', $this->data);
	}

	public function consumer(){
		$this->data["news"] = $this->news_model->getById("1");
		$this->load->view('news/index', $this->data);
	}
}
