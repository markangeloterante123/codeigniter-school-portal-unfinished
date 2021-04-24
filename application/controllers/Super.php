<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super extends CI_Controller {


	 // public function __construct(){
	 //   	parent::__construct();
	 //   	$this->load->model('model_users');
	 //  	$this->load->database();
	 //  	 if($this->session->userdata('super_session')){	  		
	 //    		 redirect('dashboard/SuperDash');
	 //     	}

	 //  }

	public function login(){

		$data = $this->input->post('portal_ID');
		$pages='regLog';
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		if(!file_exists(APPPATH.'views/login/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('login/'.$pages,$datas);
	}
	public function loginWrong(){

		$data = $this->uri->segment(3);
		$pages='regLog';
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		if(!file_exists(APPPATH.'views/login/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('login/'.$pages,$datas);
	}

	public function super_login(){

		$data = $this->uri->segment(3);
		$data1=$this->input->post('user');
	    $data2=$this->input->post('pass');
	    $pass=bin2hex($data2);
	        
	    $this->db->select('*');
	    $this->db->from("tbl_super_account"); 
	    $this->db->where('portal_ID',$data);
	    $this->db->where('username',$data1);
	    $this->db->where('password',$pass);
	    $this->db->where('status','1');   
	    $query = $this->db->get();

	        if($query->num_rows() != 0){
	            $id=0;
	            foreach ($query->result() as $value){
	                $id=$value->id;
	            }
	            	  $newdata = array(
		                    'super_session'=> $id,
		                    'logged_in' => TRUE
              		  );
              		 
                	  	$this->session->set_userdata($newdata);

                	  	$dataID['id'] = $this->uri->segment(3);
                	  	$page="warning_success"; 
					    $this->load->view('templates/header_log');
					    $this->load->view('errors/'.$page,$dataID);
					    $this->load->view('templates/footer_log');

                	 	//redirect('dashboard/SuperDash/success');  
	        }
	        else{
	            $page="wrong_super"; 
	            $dataID['id'] = $this->uri->segment(3);
	            $this->load->view('templates/header_log');
	            $this->load->view('errors/'.$page,$dataID);
	            $this->load->view('templates/footer_log');
	        }	        
	}
	
}
