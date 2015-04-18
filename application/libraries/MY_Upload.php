<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY Upload Class
 *
 * @package
 * @subpackage Libraries
 * @category Validation
 * @link
 */
class MY_Upload extends CI_Form_validation {
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function do_upload($upload_path_url, $file_type_allow) {
        
        $config['upload_path']   = FCPATH . $upload_path_url;
        $file_name = $_FILES["userfile"]["name"];
        $config['file_name']     = $file_name;
        $config['allowed_types'] = $file_type_allow;
        $config['max_size']      = '5240';//5MB

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload()) {
            $data = $this->upload->display_errors('<p class="errorMessage02 mb10">※','</p>');
        } else {
            $data = $this->upload->data();
        }
        return $data;
    }

    public function deleteFile() {//gets the job done but you might want to add error checking and security
        $file = $this->input->get("file_name");
        $success = unlink(FCPATH . 'uploads/' . $file);
        $info = new StdClass;
        $info->success = $success;
        if ($success) {
            //info to see if it is doing what it is supposed to
            $info->path = base_url() . 'uploads/' . $file;
            $info->file = is_file(FCPATH . 'uploads/' . $file);
            $info->error = null;
        } else {
            $info->error = "Delete file error";
        }
        echo json_encode($info);
        exit;
    }
}
