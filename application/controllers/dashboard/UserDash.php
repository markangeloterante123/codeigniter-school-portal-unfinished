<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  UserDash extends CI_Controller{

	// public function __construct(){
 // 		parent::__construct();
 // 		if(!$this->session->userdata('user_session')){
	//  		redirect('pages/index');
	//  	}
	//  }
	// public function success(){
	// 	$page="user_success"; 
	//     $this->load->view('templates/header_log');
	//     $this->load->view('errors/'.$page);
	//     $this->load->view('templates/footer_log');
	// }
	public function index(){
		$data=$this->uri->segment(4);
		$page='home';
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		if(!file_exists(APPPATH.'views/user/'.$page.'.php')){
             show_404();
         }
		$this->load->view('userTemp/userHeader',$datas);
		$this->load->view('userTemp/userSide',$datas);
		$this->load->view('user/'.$page,$datas);
		$this->load->view('userTemp/userFooter');
		
	}
	
}