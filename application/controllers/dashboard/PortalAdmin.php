<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  PortalAdmin extends CI_Controller{

	public function __construct(){
 		parent::__construct();
 		if(!$this->session->userdata('portal_session')){
	 		redirect('portaladmin');
	 	}
	 }
	public function success(){
		$page="portal_success"; 
	    $this->load->view('errors/'.$page);
	}
	public function index(){
		$page='portalHome';
		if(!file_exists(APPPATH.'views/portalonline/'.$page.'.php')){
             show_404();
         }
		$this->load->view('portalonline/portalHead');
		$this->load->view('portalonline/portalSide');
		$this->load->view('portalonline/'.$page);
		$this->load->view('portalonline/portalFooter');
		
	}
	
}