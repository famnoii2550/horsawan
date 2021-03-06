<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){

    	parent::__construct();
    	$this->load->helper('url');

  	}

	public function index(){

		// load view
		$this->load->view('user_view');
		
	}

	// File upload
	public function fileUpload(){
		
		if(!empty($_FILES['file']['name'])){
			
			// Set preference
			$config['upload_path'] = 'uploads/';	
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
			$config['max_size']    = '1024'; // max_size in kb
			$config['file_name'] = $_FILES['file']['name'];
					
			//Load upload library
			$this->load->library('upload',$config);		
			
			$this->upload->initialize($config);
			
			// File upload
			if($this->upload->do_upload('file')){
				// Get data about the file
				$uploadData = $this->upload->data();
			}
		}
		
	}

}
