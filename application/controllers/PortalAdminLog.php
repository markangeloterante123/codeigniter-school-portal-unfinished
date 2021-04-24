<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PortalAdminLog extends CI_Controller {


 	public function __construct(){
	   	parent::__construct();
	   	$this->load->model('model_users');
	  	$this->load->database();
	  	 if($this->session->userdata('portal_session')){	  		
	    		 redirect('dashboard/PortalAdmin');
	     	}

	  }
	public function login(){
		$page='portalLogin';
		if(!file_exists(APPPATH.'views/portalonline/'.$page.'.php')){
            show_404();
        }
        $this->load->view('portalonline/'.$page);
	}

	public function portal_admin(){
		$data1=$this->input->post('user');
	    $data2=$this->input->post('pass');
	    $pass=bin2hex($data2);
	        
	    $this->db->select('*');
	    $this->db->from("tbl_super_account"); 
	    $this->db->where('username',$data1);
	    $this->db->where('password',$pass);
	    $this->db->where('status','2');   
	    $query = $this->db->get();

	        if($query->num_rows() != 0){
	            $id=0;
	            foreach ($query->result() as $value){
	                $id=$value->id;
	            }
	            	  $newdata = array(
		                    'portal_session'=> $id,
		                    'logged_in' => TRUE
              		  );		 
                	  	$this->session->set_userdata($newdata);
                	 	redirect('dashboard/PortalAdmin/success');  
	        }
	        else{
	             $page="wrong"; 
	             $this->load->view('templates/header_log');
	             $this->load->view('errors/'.$page);
	             $this->load->view('templates/footer_log');
	        }	        
		}
		
		
		

	
}
