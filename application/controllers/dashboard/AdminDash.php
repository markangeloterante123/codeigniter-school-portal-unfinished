<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  AdminDash extends CI_Controller{

	// public function __construct(){
 // 		parent::__construct();
 // 		if(!$this->session->userdata('admin_session')){
	//  		redirect('admin');
	//  	}
	//  }
	// public function success(){
	// 	$page="admin_success"; 
	//     $this->load->view('templates/header_log');
	//     $this->load->view('login/regLog');
	//     $this->load->view('errors/'.$page);
	//     $this->load->view('templates/footer_log');
	// }

	public function index(){
		$page='home';

		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);

		if(!file_exists(APPPATH.'views/superadmin/'.$page.'.php')){
             show_404();
         }
		$this->load->view('adminTemp/adminHead',$datas);
		$this->load->view('adminTemp/adminSide',$datas);
		$this->load->view('admin/'.$page,$datas);
		$this->load->view('adminTemp/adminFooter');
		
	}
	
}