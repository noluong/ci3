<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @package	MY_Controller
 * @author	Cybridge Asia
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * 
 **/

class MY_Controller extends CI_Controller 
{

	public $data = array();	
	
	public function __construct()
	{		
		parent::__construct();

        $this->news_com = config_item("news_com");
		if(ENVIRONMENT=="development"){
			$this->load->library('console');                        
			$this->output->enable_profiler(true);
			Console::log('Hey, this is really cool, If wanna delete me, see core/MY_Controller.php');
		}

		if(!preg_match("/admin\/login/", $_SERVER['REQUEST_URI']) && preg_match("/^\/admin/", $_SERVER['REQUEST_URI'])){
			if(!$this->session->userdata("admin")["loggedin"]){
				redirect("/admin/login", "refresh");
			}
		}

        //get setting site
        $this->load->model("setting_model");
        $this->data['setting']     = $this->setting_model->getSetting("1");

        //get articles
        $this->load->model("news_model");
        $option = [
            "com" => "consumer",
        ];
        $this->data["consumer_credit"] = $this->news_model->getArticles($option);

        //get news
        $option = [
            "com"        => "news",
            "limit"      => 3,
        ];
        $this->data["new_footer"] = $this->news_model->getArticles($option);

                //get articles
        $this->load->model("slider_model");
        $this->data["slider"] = $this->slider_model->getAll();
	}

	public function do_upload_img($upload_path_url, $file_type_allow) {
        $this->load->library('image_lib');

        $config['upload_path']   = FCPATH . $upload_path_url;
        $file_name = $_FILES["userfile"]["name"];
        $config['file_name']     = $file_name;
        $config['allowed_types'] = $file_type_allow;
        $config['max_size']      = '5240';//5MB

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $data = $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
        }
        return $data;
    }

    public function delete_file($file_name, $upload_path_url) {//gets the job done but you might want to add error checking and security
        $file_path = FCPATH . $upload_path_url . $file_name;
        if(file_exists($file_path)){
        	unlink($file_path);
    	}
    }


}