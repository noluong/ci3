<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("news_model");
	}


	/**
	 * Index Page for this controller.
	 *
	 **/
	public function index()
	{
		$this->load->view('index',  $this->data);
	}

	public function error_404(){
		$this->load->view('error_404');
	}

	public function consumer()
	{
        $this->data["tieudung"] = $this->news_model->getById("10");
		$this->load->view('news/consumer',  $this->data);
	}

	public function advisory()
	{
        $option = [
            "com" => "advisory",
        ];
        $this->data["advisory_s"] = $this->news_model->getArticles($option);
		$this->load->view('news/advisory',  $this->data);
	}
}
