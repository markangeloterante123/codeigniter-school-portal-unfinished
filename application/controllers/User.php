<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	// public function __construct(){
	//   	parent::__construct();
	//   	$this->load->model('model_users');
	//  	$this->load->database();
	//  	 if($this->session->userdata('user_session')){	  		
	//    		 redirect('dashboard/UserDash');
	//     	}

	//  }

	public function user_login(){
		$data = $this->input->post('portal_ID');
		$data1=$this->input->post('id');
	    $data2=$this->input->post('pass');
	    $pass=bin2hex($data2);
	        
	    $this->db->select('*');
	    $this->db->from("tbl_student_account");
	    $this->db->where('portal_ID',$data); 
	    $this->db->where('username',$data1);
	    $this->db->where('password',$pass);
	    $this->db->where('status','0');   //pag 0 mag login
	    $query = $this->db->get();

	        if($query->num_rows() != 0){
	            $id=0;
	            foreach ($query->result() as $value){
	                $id=$value->id;
	            }
	            	  $newdata = array(
		                    'user_session'=> $id,
		                    'logged_in' => TRUE
              		  );		 
                	  	$this->session->set_userdata($newdata);
                	  	$dataID['id'] = $this->input->post('portal_ID');
                	  	$page="user_success"; 
	             		$this->load->view('templates/header_log');
	             		$this->load->view('errors/'.$page,$dataID);
	             		$this->load->view('templates/footer_log');
                	 	//redirect('dashboard/UserDash/success');  
	        }
	        else{
	        	 $dataID['id'] = $this->input->post('portal_ID');
	             $page="wrong_unknown"; 
	             $this->load->view('templates/header_log');
	             $this->load->view('errors/'.$page,$dataID);
	             $this->load->view('templates/footer_log');
	        }	        
		}
		
		
		

	
}
