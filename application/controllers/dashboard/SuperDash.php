<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  SuperDash extends CI_Controller{

	// public function __construct(){
 // 		parent::__construct();
 // 		if(!$this->session->userdata('super_session')){
	//  		redirect('superadmin');
	//  	}
	//  }
	// public function success(){
	// 	$page="warning_success"; 
	//     $this->load->view('templates/header_log');
	//     $this->load->view('login/regLog');
	//     $this->load->view('errors/'.$page);
	//     $this->load->view('templates/footer_log');
	// }

	public function index(){
		
		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$page='home';
		if(!file_exists(APPPATH.'views/superadmin/'.$page.'.php')){
             show_404();
         }
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('superadmin/'.$page,$datas);
		$this->load->view('templates/superFooter');
		
	}
	
}