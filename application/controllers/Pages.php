<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	 public function __construct() {
	   parent::__construct ();
	   $this->load->helper('download');
	  }
	
	public function logout(){	
		$id = $this->session->all_userdata();
     	$this->session->unset_userdata($id);
      	$this->session->sess_destroy();
      	redirect('pages/index');
	}
	public function userlogout(){	
		$id = $this->session->all_userdata();
     	$this->session->unset_userdata($id);
      	$this->session->sess_destroy();
      	redirect('pages/index');
	}
	public function adminlogout(){	
		$id = $this->session->all_userdata();
     	$this->session->unset_userdata($id);
      	$this->session->sess_destroy();
      	redirect('pages/index');
	}
	//checker
	public function index()
	{
		$pages = 'portal';
	 	if(!file_exists(APPPATH.'views/portalonline/'.$pages.'.php')){
            show_404();
        }
	 	$this->load->view('portalonline/'.$pages);
	}
	//user request to join classroom	
	public function joinClassRoom(){
		$portal_ID = $this->uri->segment(4);
		$code = $this->uri->segment(3);
		$student_id = $this->uri->segment(5);
		$lastname = $this->uri->segment(6);
		$name = $this->uri->segment(7);
		$profile = $this->uri->segment(8);

		$fullname = $lastname."-".$name;

		$insertJoin  = array( 
			'portal_ID' => $portal_ID,
			'class_code' => $code,
			'student_id' => $student_id,
			'student_name' => $fullname,
			'profile'=>$profile,
			'status'=>'0' 
			);
		$this->db->insert('tbl_class_join',$insertJoin);

		$pages="enrollment_change";
		$this->load->view('errors/'.$pages);

	}
	//commented in post
	public function comment(){
		$portal_ID = $this->uri->segment(3);
		$code = $this->uri->segment(4);
		$activityCode = $this->uri->segment(5);
		$name = $this->uri->segment(6);
		$profile = $this->uri->segment(7);
		$message = $this->input->post('comment');
		

		$comment  = array( 
			'portal_ID' => $portal_ID,
			'class_code' => $code,
			'activityCode' => $activityCode,
			'name' => $name,
			'message'=> $message,
			'profile'=>$profile
			);
		$this->db->insert('tbl_comment',$comment);
		$pages="enrollment_change";
		$this->load->view('errors/'.$pages);
	}
	//register to create own portal
	public function createPortal(){
		$pages = 'portalRegistration';
	 	if(!file_exists(APPPATH.'views/portalonline/'.$pages.'.php')){
            show_404();
        }
	 	$this->load->view('portalonline/'.$pages);
	}
	//for user
	public function onlineClass_users(){
		$data = $this->uri->segment(3);

		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		
		$pages='class';
		if(!file_exists(APPPATH.'views/admin/'.$pages.'.php')){
             show_404();
         }
         $datas['student_id'] = $this->uri->segment(7);
         $datas['class_code'] = $this->uri->segment(4);
         $datas['profile'] = $this->uri->segment(5);
         $datas['name'] = $this->uri->segment(6);
		$this->load->view('userTemp/userHeader',$datas);
		$this->load->view('userTemp/userSide',$datas);
		$this->load->view('user/'.$pages,$datas);
		$this->load->view('userTemp/userFooter');
	}
	//for admin
	public function onlineClass(){
		$data = $this->uri->segment(3);

		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		
		$pages='class';
		if(!file_exists(APPPATH.'views/admin/'.$pages.'.php')){
             show_404();
         }
         $datas['admin_id'] = $this->uri->segment(7);
         $datas['class_code'] = $this->uri->segment(4);
         $datas['profile'] = $this->uri->segment(5);
         $datas['name'] = $this->uri->segment(6);
		$this->load->view('adminTemp/adminHead',$datas);
		$this->load->view('adminTemp/adminSide',$datas);
		$this->load->view('admin/'.$pages,$datas);
		$this->load->view('adminTemp/adminFooter');
	}
	public function createClass(){
		$portal_ID =$this->uri->segment(3);
		$admin = $this->uri->segment(4);
		$profile =$this->uri->segment(5);
		$l_name= $this->uri->segment(6); 
		$f_name= $this->uri->segment(7);
		$course = $this->input->post('course');
		$class = $this->input->post('classSubject');
		$section = $this->input->post('section');
		$sem = $this->input->post('sem');
		$year = $this->input->post('year');
		$sched = $this->input->post('sched');

		$ram = (rand(0,999));
		$ram2 = (rand(499,999));
		$classCode = $course.$l_name.$ram.$ram2;

	    $insertData = array(
		 	'portal_ID'=>$portal_ID,
		 	'profile'=>$profile,
		 	'name'=>$l_name,
		 	'section' =>$section,
		 	'admin_id'=>$admin,
		 	'program_code'=>$course,
		 	'sched'=>$sched,
		 	'class_sub'=>$class,
		 	'class_code'=>$classCode,
		 	'sem'=>$sem,
		 	'year'=>$year,
		 	'status'=>"1"
		 );
		 $this->db->insert('tbl_class',$insertData);

		 $pages='enrollment_change';
		 $this->load->view('errors/'.$pages);

	}
	public function portal_request_approve(){
		$pages = 'portalRequest';
	 	if(!file_exists(APPPATH.'views/portalonline/'.$pages.'.php')){
            show_404();
        }
        $this->load->view('portalonline/portalHead');
        $this->load->view('portalonline/portalSide');
	 	$this->load->view('portalonline/'.$pages);
	 	$this->load->view('portalonline/portalFooter');
	}
	
	//student need pa ayusin
	public function portalCreateRegistration(){
		$school = $this->input->post('school');
		$campus = $this->input->post('campus');
		$email  = $this->input->post('email');
		$name   = $this->input->post('name');
		$m_i    = $this->input->post('m_i');
		$lastname = $this->input->post('lastname');
		$Username = $this->input->post('Username');
		$pass   = bin2hex($this->input->post('pass'));
		$ids = '0';
		$portal = 'PID';

		$this->db->select('*');
	    $this->db->from("portal");
	    $this->db->where('term','1');   
	    $query = $this->db->get();

	    if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
	      	$ids = $value->count;	
	      }
	  	}
	  	if($ids <= '9'){
			$portal_ID = $portal."000".$ids;	
		}
		else if($ids <= '99'){
			$portal_ID = $portal."00".$ids;	
		}
		else if($ids <= '999'){
			$portal_ID = $portal."0".$ids;	
		}
		
		$id_portal = bin2hex($portal_ID);

		$insert = array(
			'portal_ID'=> $id_portal,
			'Name'=>$school,
			'Campus'=>$campus,
			'email'=>$email,
			'count'=>$ids+1,
			'status'=>'0',
			'term'=>'1'
		);
		 $this->db->insert('portal',$insert);

		 $insertData = array(
		 	'portal_ID'=>$id_portal
		 );
		 $this->db->insert('tbl_counter',$insertData);

		 $insertReg = array(
			'portal_ID'=> $id_portal,
			'admin_id' => $portal_ID,
			'first_name'=>$name,
			'middle'=>$m_i,
			'last_name'=>$lastname,
			'profile'=>'default1',
			'status'=>'1'
		);
		 $this->db->insert('tbl_super_info',$insertReg);

		 $insertCount = array(
			'portal_ID'=> $id_portal,
			'schoolYear' => '0',
			'college_ID_counter'=>'1'
		);
		 $this->db->insert('tbl_counter',$insertCount);

		 $insertAcc = array(
			'portal_ID'=> $id_portal,
			'admin_id' => $portal_ID,
			'username'=>$Username,
			'password'=>$pass,
			'status'=>'1'
		);
		 $this->db->insert('tbl_super_account',$insertAcc);
		$pages = 'success_portal_reg'; 
		 if(!file_exists(APPPATH.'views/errors/'.$pages.'.php')){
		    show_404();
		}
		$this->load->view('errors/'.$pages);

	}
	 public function portalStudent()
	 {
	 	
	 	$pages='mission';
	 	$data = $this->input->post('portal_ID');
        $field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
	    if(!file_exists(APPPATH.'views/home/'.$pages.'.php')){
		    show_404();
		}
		$this->load->view('templates/header',$datas);
		$this->load->view('home/'.$pages,$datas);
		$this->load->view('templates/footer');
	}
	public function mission()
	 {
	 	$pages='mission';
	 	$data = $this->uri->segment(3);
        $field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
	    if(!file_exists(APPPATH.'views/home/'.$pages.'.php')){
		    show_404();
		}
		$this->load->view('templates/header',$datas);
		$this->load->view('home/'.$pages,$datas);
		$this->load->view('templates/footer');
	}
	
	public function enrollment(){
		$portal_ID=$this->uri->segment(3);
		$option =$this->input->post('select');

		$update  = array(
			'enrollment_status' =>$option 
		);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->update('tbl_counter',$update);
		$pages='enrollment_change';
		$this->load->view('errors/'.$pages);
	}
	public function organization(){
		$pages='organization';
		$data = $this->uri->segment(3);
        $field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		if(!file_exists(APPPATH.'views/home/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/header',$datas);
		$this->load->view('home/'.$pages,$datas);
		$this->load->view('templates/footer');
	}
	public function changePass(){
		$student_id = $this->uri->segment(3);
		$portal_ID = $this->uri->segment(4);
		$pass =bin2hex($this->input->post('pass'));

		$update  = array(
			'password' => $pass 
		);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('student_id',$student_id);
		$this->db->update('tbl_student_account',$update);

		$page="warning_success_action"; 
		$this->load->view('templates/header_log');
		$this->load->view('errors/'.$page);
		$this->load->view('templates/footer_log');
	}
	public function adminPass(){
		$admin_id = $this->uri->segment(3);
		$pass =bin2hex($this->input->post('pass'));

		$update  = array(
			'password' => $pass 
		);
		$this->db->where('admin_id',$admin_id);
		$this->db->update('tbl_admin_account',$update);

		$page="warning_success_action"; 
		$this->load->view('templates/header_log');
		$this->load->view('errors/'.$page);
		$this->load->view('templates/footer_log');
	}
	public function courseOffer(){

		$pages='course';

		$data = $this->uri->segment(3);
        $field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		if(!file_exists(APPPATH.'views/home/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/header',$datas);
		$this->load->view('home/'.$pages,$datas);
		$this->load->view('templates/footer');
	}
	public function enrollProc(){
		$pages='enroll';
		
		$data = $this->uri->segment(3);
        $field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		if(!file_exists(APPPATH.'views/home/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/header',$datas);
		$this->load->view('home/'.$pages,$datas);
		$this->load->view('templates/footer');
	}
	public function portalWall(){
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);

		$pages='wall';
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('superadmin/'.$pages,$datas);
		$this->load->view('templates/superFooter');
	}
	public function portalModules(){
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);

		$pages='modules';
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('superadmin/'.$pages,$datas);
		$this->load->view('templates/superFooter');
	}
	public function modules(){
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);

		$pages='modules';
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('userTemp/userHeader',$datas);
		$this->load->view('userTemp/userSide',$datas);
		$this->load->view('user/'.$pages,$datas);
		$this->load->view('userTemp/userFooter');
	}
	public function proflist(){

		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);

		$pages='professorList';
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('superadmin/'.$pages,$datas);
		$this->load->view('templates/superFooter');	
	}

	public function missionPortal(){
		$type = $this->input->post('option');
		$portal_ID =$this->uri->segment(3);
		$body = $this->input->post('editor1');


		if($type =='1'){
			$insert = array(
				'mission'=>$body,
			);
			$this->db->where('portal_ID',$portal_ID);
			$this->db->update('portal',$insert);
			  $page="enrollment_change"; 
		      $this->load->view('errors/'.$page);
		}
		else if ($type=='2') {
			$insert = array(
				'vission'=>$body,
			);
			$this->db->where('portal_ID',$portal_ID);
			$this->db->update('portal',$insert);
			  $page="enrollment_change"; 
		      $this->load->view('errors/'.$page);		
		}
		else if($type=='3'){
			$insert = array(
				'about'=>$body,
			);
			$this->db->where('portal_ID',$portal_ID);
			$this->db->update('portal',$insert);
			  $page="enrollment_change"; 
		      $this->load->view('errors/'.$page);
		}
		else{
			//for announcement
		}

		
	    
	}

	public function listcourse(){
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='listCourse';
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('superadmin/'.$pages,$datas);
		$this->load->view('templates/superFooter');	
	}
	
	public function editcurriculom(){
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='editCurriculom';
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('superadmin/'.$pages,$datas);
		$this->load->view('templates/superFooter');
	}
	public function editCourseProgram(){
		$program_code = $this->uri->segment(3);

		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='addSub';
		$datas['title']=$program_code;
		
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
			show_404();
		}
		$this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/superSide',$datas);
		$this->load->view('templates/title',$datas);
		$this->load->view('superadmin/'.$pages,$datas);
		$this->load->view('templates/superFooter');	
	}
	public function portalCourseAdd(){

		$portal_ID = $this->uri->segment(3);
		$program_code = $this->input->post('program_code');
		$course_title = $this->input->post('course_title');
		$department = $this->input->post('department');

		 $insert_data = array(
		 	'portal_ID' => $portal_ID,
		 	'logo'=> 'coursebackground.jpg',
		 	'program_code' => $program_code,
		 	'course_code' => $program_code,
		 	'course_title' => $course_title,
		 	'department' => $department,
		 	'status' => '1'
		 ); 
		$this->db->insert('tbl_course' ,$insert_data);
		
		$dataID['id'] = $this->uri->segment(3);
		$page="success_add_sub"; 
	    $this->load->view('templates/header_log');
	    $this->load->view('errors/'.$page,$dataID);
	    $this->load->view('templates/footer_log');	
	}
		
	public function addCourse(){

		$code = $this->input->post('code');
		$program = $this->uri->segment(3);
		$portal_ID = $this->uri->segment(4);
		$title = $this->input->post('course');
		$lec = $this->input->post('lec');
		$lab = $this->input->post('lab');
		$unit = $lec + $lab;
		$req = $this->input->post('req');
		$sem = $this->input->post('sem');
		$year = $this->input->post('year');

			$insert_data = array(
				'portal_ID' => $portal_ID,
				'course_code' => $code,
				'program_code' => $program,
				'course_title' => $title,
				'lec' => $lec,
				'lab' => $lab,
				'unit' => $unit,
				'prerequisite' => $req,
				'sem' => $sem,
				'year' => $year
			);
		$this->db->insert('tbl_course',$insert_data);
		$data['id'] = $this->uri->segment(4);
		$data['course'] = $this->uri->segment(3);

		$page="success_add"; 
	    $this->load->view('templates/header_log');
	    $this->load->view('errors/'.$page,$data);
	    $this->load->view('templates/footer_log');	
	}
	public function registrar (){

		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='registrar';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $this->load->view('templates/superHeader',$datas);
		$this->load->view('templates/registrarSide',$datas);
		$this->load->view('reg/'.$pages,$datas);
		$this->load->view('templates/superFooter');	
	}
	public function regSetup(){
		$portal_ID = $this->uri->segment(3);
		$year = $this->input->post('year');
		$id = $this->input->post('id');
		$sem = $this->input->post('sem');

		$update = array(
			'schoolYear'=>$year,
			'base_id'=>$id,
			'semester'=>$sem,
			'college_ID_counter'=>'1'
		);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->update('tbl_counter',$update);

		$datas['portal_ID'] = $this->uri->segment(3);
		 $page="warning_success_action"; 
	     $this->load->view('errors/'.$page,$datas);
	}
	public function regSetupFee(){
		$lec = $this->input->post('lec');
		$lab = $this->input->post('lab');
		$mis = $this->input->post('mis');
		$other = $this->input->post('other');
		$portal_ID = $this->uri->segment(3);
		$update = array(
			'lec_fee'=>$lec,
			'lab_fee'=>$lab,
			'mis_fee'=>$mis,
			'other_fee'=>$other
		);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->update('tbl_counter',$update);

		 $datas['portal_ID'] = $this->uri->segment(3);
		 $page="warning_success_action"; 
	     $this->load->view('errors/'.$page,$datas);
	}
	public function add_professor(){
		$first = $this->input->post('f_name');
		$last = $this->input->post('l_name');
		$m_i = $this->input->post('m_i');
		$id = $this->input->post('id');
		$pass = bin2hex($id);
		$new = array(
			'first_name'=>$first,
			'last_name'=>$last,
			'm_i'=>$m_i,
			'admin_id'=>$id,
			'profile'=>'default2.png',
			'status'=>'1'
		);
		$this->db->insert('tbl_admin_info',$new);

		$acc = array(
			'admin_id' => $id,
			'username'=>$id,
			'password'=>$pass,
			'acc_status'=>'1'
		);
		$this->db->insert('tbl_admin_account',$acc);
		
		$page="warning_success_action"; 
	    $this->load->view('templates/header_log');
	    $this->load->view('errors/'.$page);
	    $this->load->view('templates/footer_log');
	}
	//for online registration it must be connected it into the registrar information for confirmation
	//data fetch come from course.php page and modals forms.
	public function onlineCollegeRequest(){
		 
	    $sems = $this->uri->segment(3);
		$base_id = $this->uri->segment(4);
		$id_count = $this->uri->segment(5);
		$other = $this->uri->segment(6);
		$mis = $this->uri->segment(7);
		$lecture = $this->uri->segment(8);
		$laboratory = $this->uri->segment(9);
		$portal_ID = $this->uri->segment(10);
		$enrollment_status = $this->uri->segment(11);
		$user = $this->input->post('user');
		$pass = bin2hex($this->input->post('pass'));
		$l_name = $this->input->post('l_name');
		$f_name = $this->input->post('f_name');
		$m_i = $this->input->post('m_i');
		$contact = $this->input->post('phone');
		$email = $this->input->post('Email');
		$address = $this->input->post('address');
		$course = $this->input->post('course');
		$total = '0';
		$years = '1';
		$total_lec = '0';
        $total_lab = '0';

        if($enrollment_status == 0){
        	if($id_count <= '9'){
			$student_ID = $base_id."-0000".$id_count;	
		}
		else if($id_count <= '99'){
			$student_ID = $base_id."-000".$id_count;	
		}
		else if($id_count <= '999'){
			$student_ID = $base_id."-00".$id_count;	
		}
		else{
			$student_ID = $base_id."-0".$id_count;	
		}
		

		$this->db->select('*');
	    $this->db->from("tbl_course");
	    $this->db->where('portal_ID',$portal_ID); 
	    $this->db->where('program_code',$course);
	    $this->db->where('status','0');   
	    $query = $this->db->get();

	    if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
	        $course =$value->program_code;
	        $course_code = $value->course_code;
	        $title = $value->course_title;
	        $year = $value->year;
	        $sem = $value->sem; 
	        $lec = $value->lec;
	        $lab = $value->lab;
	        $unit = $value->unit;
	        

	        if($value->sem == $sems){

	        	if($value->year == $years){

	        		$lecs = $value->lec;
	        		$labs = $value->lab;
	        		$total_lab = ($total_lab + $labs);
                  	$total_lec = ($total_lec + $lecs);

	        		$subject_insert = array(
	        			'portal_ID' => $portal_ID,
						'student_id' =>$student_ID,
						'course_code' => $course_code,
						'status' =>'2'
			      	);
					$this->db->insert('tbl_student_records',$subject_insert);
	        	}
	        	else{
	        		$subject_insert = array(
	        			'portal_ID' => $portal_ID,
						'student_id' =>$student_ID,
						'course_code' => $course_code,
						'status' =>'0'
			      	);
					$this->db->insert('tbl_student_records',$subject_insert);
	        	}	
	        }
	        else{
	        	$subject_insert = array(
	        			'portal_ID' => $portal_ID,	
						'student_id' =>$student_ID,
						'course_code' => $course_code,
						'status' =>'0'
			      	);
					$this->db->insert('tbl_student_records',$subject_insert);
	        }
	       }     	   
	    }

	    $student_info = array(
	    	'portal_ID' => $portal_ID,
	    	'first_name'=>$f_name,
	    	'last_name'=>$l_name,
	    	'm_i'=>$m_i,
	    	'student_id'=>$student_ID,
	    	'course'=>$course,
	    	'contact'=>$contact,
	    	'email'=> $email,
	    	'profile'=>'default2.png',
	    	'enroll_stat'=>'2',
	    	'year'=>'1',
	    	'status'=>'1'
	    );
	    $this->db->insert('tbl_student_info',$student_info);
	    $student_account = array(
	    	'portal_ID' => $portal_ID,
	    	'student_id'=>$student_ID,
	    	'username'=>$user,
	    	'password'=>$pass,
	    	'status'=>'1'

	    );
	    $this->db->insert('tbl_student_account',$student_account);

	    $id_count_last = ($id_count + '1');
	    $add = array(
	    	'college_ID_counter'=>$id_count_last
	    );
	    $this->db->where('portal_ID',$portal_ID);
		$this->db->update('tbl_counter',$add);

		$lecTotal = ($total_lec * $lecture);
		$labTotal = ($total_lab * $laboratory);
		$total = ($lecTotal + $labTotal + $other + $mis);

		$studBal = array(
			'portal_ID' => $portal_ID,
			'other_bal' => $other,
			'mis_bal' => $mis,
			'lecture_bal'=> $lecTotal,
			'lab_bal' => $labTotal,
			'total_bal' => $total,
			'student_id' =>  $student_ID 
		);
		$this->db->insert('tbl_student_balance',$studBal);	    //if enroll stat is  0 it means it need approval before they are considered enroll
	    //all information will fillup onces' the registrat approve it
		 $page="online_success_sent"; 
	     $this->load->view('errors/'.$page);
        }
        else{
        	$page="online_failed_sent"; 
	     $this->load->view('errors/'.$page);
        }
		
	}
	//for online registration confirmation
	//it must add all information of the student
	public function onlineRegistration(){
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='onlineReg';	
		if(!file_exists(APPPATH.'views/superadmin/'.$pages.'.php')){
            show_404();
        }		
        $this->load->view('templates/superHeader',$datas);
        $this->load->view('templates/registrarSide',$datas);
        $this->load->view('superadmin/'.$pages,$datas);
        $this->load->view('templates/superFooter');
	}
	public function transCollege_rec(){

		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		
		$pages='transferStudentEval';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $datas['student_id'] = $this->uri->segment(3);
        $id['id']=$data;
        $this->load->view('templates/superHeader',$datas);
        $this->load->view('templates/registrarSide',$datas);
        $this->load->view('reg/'.$pages,$datas);
        $this->load->view('templates/superFooter',$id);
		
	}
	public function regCollege_reg(){
		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='regStud';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $datas['student_id'] = $this->uri->segment(3);
        $this->load->view('templates/superHeader',$datas);
        $this->load->view('templates/registrarSide',$datas);
        $this->load->view('reg/'.$pages,$datas);
        $this->load->view('templates/superFooter');
	}
	//for online registration
	public function regCollege(){
		$sems = $this->uri->segment(3);
		$base_id = $this->uri->segment(4);
		$id_count = $this->uri->segment(5);
		$other = $this->uri->segment(6);
		$mis = $this->uri->segment(7);
		$lecture = $this->uri->segment(8);
		$laboratory = $this->uri->segment(9);
		$portal_ID = $this->uri->segment(10);
		$l_name = $this->input->post('last');
		$f_name = $this->input->post('name');
		$m_i = $this->input->post('m_i');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$course = $this->input->post('course');
		$total = '0';
		$years = '1';
		$total_lec = '0';
        $total_lab = '0';

		if($id_count <= '9'){
			$student_ID = $base_id."-0000".$id_count;	
		}
		else if($id_count <= '99'){
			$student_ID = $base_id."-000".$id_count;	
		}
		else if($id_count <= '999'){
			$student_ID = $base_id."-00".$id_count;	
		}
		else{
			$student_ID = $base_id."-0".$id_count;	
		}
		

		$this->db->select('*');
	    $this->db->from("tbl_course");
	    $this->db->where('portal_ID',$portal_ID); 
	    $this->db->where('program_code',$course);
	    $this->db->where('status','0');   
	    $query = $this->db->get();

	    if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
	        $course =$value->program_code;
	        $course_code = $value->course_code;
	        $title = $value->course_title;
	        $year = $value->year;
	        $sem = $value->sem; 
	        $lec = $value->lec;
	        $lab = $value->lab;
	        $unit = $value->unit;
	        

	        if($value->sem == $sems){

	        	if($value->year == $years){

	        		$lecs = $value->lec;
	        		$labs = $value->lab;
	        		$total_lab = ($total_lab + $labs);
                  	$total_lec = ($total_lec + $lecs);

	        		$subject_insert = array(
	        			'portal_ID' => $portal_ID,
						'student_id' =>$student_ID,
						'course_code' => $course_code,
						'status' =>'2'
			      	);
					$this->db->insert('tbl_student_records',$subject_insert);
	        	}
	        	else{
	        		$subject_insert = array(
	        			'portal_ID' => $portal_ID,
						'student_id' =>$student_ID,
						'course_code' => $course_code,
						'status' =>'0'
			      	);
					$this->db->insert('tbl_student_records',$subject_insert);
	        	}	
	        }
	        else{
	        	$subject_insert = array(
	        			'portal_ID' => $portal_ID,	
						'student_id' =>$student_ID,
						'course_code' => $course_code,
						'status' =>'0'
			      	);
					$this->db->insert('tbl_student_records',$subject_insert);
	        }
	       }     	   
	    }

	    $student_info = array(
	    	'portal_ID' => $portal_ID,
	    	'first_name'=>$f_name,
	    	'last_name'=>$l_name,
	    	'm_i'=>$m_i,
	    	'student_id'=>$student_ID,
	    	'course'=>$course,
	    	'contact'=>$contact,
	    	'profile'=>'default2.png',
	    	'year'=>'1',
	    	'status'=>'1'
	    );
	    $this->db->insert('tbl_student_info',$student_info);

	    $pass = bin2hex($student_ID);

	    $student_account = array(
	    	'portal_ID' => $portal_ID,
	    	'student_id'=>$student_ID,
	    	'username'=>$student_ID,
	    	'password'=>$pass
	    );
	    $this->db->insert('tbl_student_account',$student_account);

	    $add = array(
	    	'college_ID_counter'=>$id_count+1
	    );
	    $this->db->where('portal_ID',$portal_ID);
		$this->db->update('tbl_counter',$add);

		$lecTotal = ($total_lec * $lecture);
		$labTotal = ($total_lab * $laboratory);
		$total = ($lecTotal + $labTotal + $other + $mis);

		$studBal = array(
			'portal_ID' => $portal_ID,
			'other_bal' => $other,
			'mis_bal' => $mis,
			'lecture_bal'=> $lecTotal,
			'lab_bal' => $labTotal,
			'total_bal' => $total,
			'student_id' =>  $student_ID 
		);
		$this->db->insert('tbl_student_balance',$studBal);

		 $datas['id'] = $student_ID;
		 $datas['portal_ID'] = $portal_ID;
		 $page="warning_success_reg"; 
	     $this->load->view('templates/header_log');
	     $this->load->view('errors/'.$page,$datas);
	     $this->load->view('templates/footer_log');
	}
	public function transCollege(){
		 $portal_ID = $this->uri->segment(3);
		 $sems = $this->input->post('sems');
		 $base_id = $this->input->post('base_id');
		 $id_count = $this->input->post('count');
		 $l_name = $this->input->post('l_name');
		 $f_name = $this->input->post('f_name');
		 $m_i = $this->input->post('m_i');
		 $contact = $this->input->post('phone');
		 $address = $this->input->post('address');
		 $course = $this->input->post('course');
		$total = '0';
		$years = '1';

		if($id_count <= '9'){
			$student_ID = $base_id."-0000".$id_count;	
		}
		else if($id_count <= '99'){
			$student_ID = $base_id."-000".$id_count;	
		}
		else if($id_count <= '999'){
			$student_ID = $base_id."-00".$id_count;	
		}
		else{
			$student_ID = $base_id."-0".$id_count;	
		}
		
		$this->db->select('*');
	    $this->db->from("tbl_course"); 
	    $this->db->where('program_code',$course);
	    $this->db->where('portal_ID',$portal_ID);
	    $this->db->where('status','0');   
	    $query = $this->db->get();

	    if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
	        $course =$value->program_code;
	        $course_code = $value->course_code;
	        $title = $value->course_title;
	        $year = $value->year;
	        
			$subject_insert = array(
						'student_id' =>$student_ID,
						'portal_ID' => $portal_ID,
						'course_code' => $course_code,
						'status' =>'0'
			 );
			$this->db->insert('tbl_student_records',$subject_insert);
	        	}
	        }
	       

	    $student_info = array(
	    	'portal_ID'=>$portal_ID,
	    	'first_name'=>$f_name,
	    	'last_name'=>$l_name,
	    	'm_i'=>$m_i,
	    	'student_id'=>$student_ID,
	    	'course'=>$course,
	    	'contact'=>$contact,
	    	'profile'=>'default2.png',
	    	'year'=>'1',
	    	'status'=>'1'
	    );

	    $this->db->insert('tbl_student_info',$student_info);
	    $pass = bin2hex($student_ID);
	    $student_account = array(
	    	'portal_ID'=>$portal_ID,
	    	'student_id'=>$student_ID,
	    	'username'=>$student_ID,
	    	'password'=>$pass
	    );
	    $this->db->insert('tbl_student_account',$student_account);

	    $add = array(
	    	'college_ID_counter'=>$id_count+1
	    );
	    $this->db->where('portal_ID',$portal_ID);
		$this->db->update('tbl_counter',$add);

		 $datas['portal_ID']=$portal_ID;
		 $datas['id'] = $student_ID;
		 $page="warning_success_trans"; 
	     $this->load->view('templates/header_log');
	     $this->load->view('errors/'.$page,$datas);
	     $this->load->view('templates/footer_log');
	}
	public function trans_enroll(){
		//$data = $this->input->post('student_id');
		$data = $this->uri->segment(3);
		$other = $this->uri->segment(4);
		$mis = $this->uri->segment(5);
		$lec = $this->uri->segment(6);
		$lab = $this->uri->segment(7);
		$portal_ID = $this->uri->segment(8);
		$total = '0';
		$total_lec = '0';
        $total_lab = '0';
		$this->db->select('*');
		$this->db->from('tbl_student_records');
		$this->db->join('tbl_course', ' tbl_student_records.course_code = tbl_course.course_code', 'left');
		$this->db->where('tbl_student_records.student_id',$data);
		$this->db->where('tbl_student_records.portal_ID',$portal_ID);
		$this->db->where('tbl_student_records.status','2');
		$query = $this->db->get();

		if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
			$lecs = $value->lec;
	        $labs = $value->lab;
	        $total_lab = ($total_lab + $labs);
            $total_lec = ($total_lec + $lecs);
			}
		}
		$lecTotal = ($total_lec * $lec);
		$labTotal = ($total_lab * $lab);
		$total = ($lecTotal + $labTotal + $other + $mis);
		$datas['collect_data'] = $this->model_users->student_print_transfer($data,$other,$mis,$lecTotal,$labTotal,$total,$portal_ID);

		$pages='print';
		$datas['student_id'] = $this->uri->segment(3);
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
		$this->load->view('reg/'.$pages,$datas);
	}
	public function print_history(){
		
		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='printHistory';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $datas['student_id']= $this->uri->segment(3);
		$this->load->view('reg/'.$pages,$datas);

	}

	public function old_college_enroll(){
		
		$data = $this->uri->segment(3);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='collegeReg';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $this->load->view('templates/superHeader',$datas);
        $this->load->view('templates/registrarSide',$datas);
        $this->load->view('reg/'.$pages,$datas);
        $this->load->view('templates/superFooter');
	}
	public function oldCollegeEnroll(){
		
		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='oldEnroll';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $datas['student_id'] = $this->uri->segment(3);
        $this->load->view('templates/superHeader',$datas);
        $this->load->view('templates/registrarSide',$datas);
        $this->load->view('reg/'.$pages,$datas);
        $this->load->view('templates/oldFooter');
	}
	public function printReg(){
		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);
		$pages='print';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $datas['student_id'] = $this->uri->segment(3);
		$this->load->view('reg/'.$pages,$datas);	
	}
	public function payment_mode(){
		$this->model_users->payment();
		$id=$this->input->post('student');
		$portal_ID = $this->uri->segment(3);
		redirect('pages/payment_history/'.$id.'/'.$portal_ID);
	}
	public function payment_history(){
		$data = $this->uri->segment(4);
		$field = 'portal_ID';
        $table = 'portal';
        $this->load->model('model_users','',TRUE);
		$datas['collect_data'] = $this->model_users->user_data_title($table,$field,$data);		
		$pages='historyPay';
		if(!file_exists(APPPATH.'views/reg/'.$pages.'.php')){
            show_404();
        }
        $datas['student_id'] = $this->uri->segment(3);
        $this->load->view('templates/superHeader',$datas);
        $this->load->view('templates/registrarSide',$datas);
        $this->load->view('reg/'.$pages,$datas);
        $this->load->view('templates/superFooter');
	}
	//stdudent subtmi activity
	public function portal_student_upload(){
		$names=$this->uri->segment(3);
		$student_id=$this->uri->segment(4);
		$portal_ID = $this->input->post('myportal');
		$class_code = $this->input->post('class_code');
		$activityCode = $this->input->post('activity_download');
		$image_file = $this->input->post('image_file');
		$title = $this->input->post('activity');


		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/upload/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx|mp4|avi|pptx';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				echo $this->upload->display_errors();
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'submit_by'=>$names,
					'class_code'=>$class_code,
					'student_id'=>$student_id,
					'file'=>$name_file2,
					'activityCode'=>$activityCode,
					'title'=>$title
				);
				$this->db->insert('tbl_class_submit',$update2);
				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			  }

			}
		

	}
	//delete modules
	public function deleteModules(){
		$id = $this->uri->segment(3);
		$this->db->where('id',$id);
		$this->db->delete('tbl_portal_modules');
		$page="enrollment_change"; 
		$this->load->view('errors/'.$page);
	}
	//post modules
	public function post_modules(){
		$portal_ID=$this->uri->segment(3);
		$title=$this->input->post('title');
		$pub=$this->input->post('publish');
		$image_file=$this->input->post('image_file');

		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/modules/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'pdf|doc|docx|pptx';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
		
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'title'=>$title,
					'publish'=>$pub,
					'file'=>$name_file2
				);
				$this->db->insert('tbl_portal_modules',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			  }

			}
	}
	//post ng registrar  
	public function post_registrar(){
		$portal_ID=$this->uri->segment(3);
		$logo=$this->uri->segment(5);
		$name=$this->uri->segment(4);
		$instruction=$this->input->post('instruction');
		$image_file=$this->input->post('image_file');
		$type =$this->input->post('type');

		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/upload/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx|mp4|avi|pptx';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'body'=>$instruction,
					'file'=>'no file',
					'type'=>$type,
					'name'=>$name,
					'logo'=>$logo
				);
				$this->db->insert('tbl_portal_announce',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'body'=>$instruction,
					'file'=>$name_file2,
					'type'=>$type,
					'name'=>$name,
					'logo'=>$logo
				);
				$this->db->insert('tbl_portal_announce',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			  }

			}
	}
	//post class announcement
	public function post_clas_announce(){
		$portal_ID=$this->uri->segment(3);
		$class_code=$this->uri->segment(4);
		$profile=$this->uri->segment(6);
		$name=$this->uri->segment(5);
		$instruction=$this->input->post('instruction');
		$image_file=$this->input->post('image_file');
		$type =$this->input->post('type');
		$ram = (rand(0,99));
		$ram2 = (rand(0,1000));
		$ram3 = (rand(0,10000));
		$actCode = $ram.$ram2.$ram3;
	

		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/upload/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx|mp4|avi|pptx';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'class_code'=>$class_code,
					'body'=>$instruction,
					'file'=>'no file',
					'type'=>$type,
					'name'=>$name,
					'profile'=>$profile,
					'activityCode'=>$actCode,
					'status'=>'2'
				);
				$this->db->insert('tbl_class_post',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'class_code'=>$class_code,
					'body'=>$instruction,
					'file'=>$name_file2,
					'name'=>$name,
					'profile'=>$profile,
					'activityCode'=>$actCode,
					'type'=>$type,
					'status'=>'2'
				);
				$this->db->insert('tbl_class_post',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			  }

			}
	}
	//posting activity
	public function upload_file_activity(){
		$portal_ID=$this->uri->segment(3);
		$class_code=$this->uri->segment(4);
		$profile=$this->uri->segment(6);
		$name=$this->uri->segment(5);
		$activity=$this->input->post('activity');
		$instruction=$this->input->post('instruction');
		$image_file=$this->input->post('image_file');
		$Deadline=$this->input->post('Deadline');
		$type = $this->input->post('type');
		$ram = (rand(0,99));
		$ram2 = (rand(0,1000));
		$ram3 = (rand(0,10000));
		$actCode = $ram.$ram2.$ram3;

		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/upload/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|xls|xlsx|mp4|avi|pptx';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'class_code'=>$class_code,
					'title'=>$activity,
					'body'=>$instruction,
					'date'=>$Deadline,
					'file'=>'no file',
					'name'=>$name,
					'profile'=>$profile,
					'type'=> $type,
					'activityCode'=>$actCode,
					'status'=>'1'
				);
				$this->db->insert('tbl_class_post',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'portal_ID'=>$portal_ID,
					'class_code'=>$class_code,
					'title'=>$activity,
					'body'=>$instruction,
					'date'=>$Deadline,
					'file'=>$name_file2,
					'type'=> $type,
					'name'=>$name,
					'profile'=>$profile,
					'activityCode'=>$actCode,
					'status'=>'1'
				);
				$this->db->insert('tbl_class_post',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
			  }

			}
	}
	public function uploadPic(){
		$id=$this->uri->segment(3);
		$portal_ID=$this->uri->segment(4);
		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/profile/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				echo $this->upload->display_errors();
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'profile'=>$name_file2,
				);
				$this->db->where('portal_ID',$portal_ID);
				$this->db->where('id',$id);
				$this->db->update('tbl_student_info',$update2);

				$page="warning_success_action"; 
			    $this->load->view('templates/header_log');
			    $this->load->view('errors/'.$page);
			    $this->load->view('templates/footer_log');
				}

			}
		}
		public function adminPic(){
		$id=$this->uri->segment(3);
		
		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/profile/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				echo $this->upload->display_errors();
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];
				$update2 = array(
					'profile'=>$name_file2,
				);
				$this->db->where('admin_id',$id);
				$this->db->update('tbl_admin_info',$update2);

				$page="warning_success_action"; 
			    $this->load->view('templates/header_log');
			    $this->load->view('errors/'.$page);
			    $this->load->view('templates/footer_log');
				}

			}
		}
		//up,loading portal background
		public function myPortalBackground(){
			$id=$this->uri->segment(3);
		
		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/img/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				echo $this->upload->display_errors();
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];

				$update2 = array(
					'background'=>$name_file2,
				);
				$this->db->where('portal_ID',$id);
				$this->db->update('portal',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
				}

			}
		}
		//uploading portal logo
		public function myPortalLogo(){
		$id=$this->uri->segment(3);
		
		if(isset($_FILES["image_file"]["name"])){
			
			$uploadPath = './assets/img/'; 
            $config['upload_path'] = $uploadPath;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload',$config);
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('image_file')){
				echo $this->upload->display_errors();
			}
			//else condition pag success
			else{
				$data = $this->upload->data();
				$name_file2 = $data["file_name"];

				$update2 = array(
					'Logo'=>$name_file2,
				);
				$this->db->where('portal_ID',$id);
				$this->db->update('portal',$update2);

				$page="enrollment_change"; 
			    $this->load->view('errors/'.$page);
				}

			}
		}
	//for sending  comment 
		public function commentPortal(){
		$comment = $this->input->post('comment');
		$id = $this->uri->segment(4);
		$portal_ID = $this->uri->segment(3);
		$count = '';

		$this->db->select('*');
	    $this->db->from("tbl_portal_announce");
	    $this->db->where('portal_ID',$portal_ID); 
	    $this->db->where('id',$id);   
	    $query = $this->db->get();

	    if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
	     		$count=$value->noCom;
	      }
	  }
		
		$com = $count + '1';

		$this->db->set('noCom',$com);
		$this->db->where('id',$id);
		$this->db->update('tbl_portal_announce');

		$comment = array(
			'portal_ID' => $portal_ID,
			'postID' =>$id,
			'text' => $comment,
			'profile'=>'logo1.png',
			'name'=>'Registrar:'
		);  
		
		$this->db->insert('tbl_portal_comment',$comment);
		$page="enrollment_change"; 
		$this->load->view('errors/'.$page);

	}
	public function commentSent(){
		$comment = $this->input->post('comment');
		$id = $this->uri->segment(4);
		$portal_ID = $this->uri->segment(3);
		$count = '';

		$this->db->select('*');
	    $this->db->from("tbl_portal_announce");
	    $this->db->where('portal_ID',$portal_ID); 
	    $this->db->where('id',$id);   
	    $query = $this->db->get();

	    if($query->num_rows() != 0){
	      foreach ($query->result() as $value){
	     		$count=$value->noCom;
	      }
	  }
		
		$com = $count + '1';

		$this->db->set('noCom',$com);
		$this->db->where('id',$id);
		$this->db->update('tbl_portal_announce');

		$comment = array(
			'portal_ID' => $portal_ID,
			'postID' =>$id,
			'text' => $comment,
			'profile'=>'logo1.png',
			'name'=>'Student:'
		);  
		
		$this->db->insert('tbl_portal_comment',$comment);
		$page="enrollment_change"; 
		$this->load->view('errors/'.$page);

	}
	public function downloadModules($fileName = NULL) {   
		   if ($fileName) {
		    $file = realpath ( "./assets/modules/" ) . "\\" . $fileName;
		    // check file exists    
		    if (file_exists ( $file )) {
		     // get file content
		     $data = file_get_contents ( $file );
		     //force download
		     force_download ( $fileName, $data );
		    } else {
		     // Redirect to base url
		     redirect ( base_url () );
		    }
		}
	}
	//for downloading file
	public function download($fileName = NULL) {   
		   if ($fileName) {
		    $file = realpath ( "./assets/upload/" ) . "\\" . $fileName;
		    // check file exists    
		    if (file_exists ( $file )) {
		     // get file content
		     $data = file_get_contents ( $file );
		     //force download
		     force_download ( $fileName, $data );
		    } else {
		     // Redirect to base url
		     redirect ( base_url () );
		    }
		}
	}
	//delete post
	public function ajax_delete_reg_post(){
		$data=$this->model_users->delete_registrar_post();
	 	echo json_encode($data);
	}
	//display comment
	public function ajax_display_comment(){
		$data=$this->model_users->view_comment();
	 	echo json_encode($data);
	}
	//display comment box post
	public function ajax_comment_boxs(){
		$data=$this->model_users->comment_box_post();
	 	echo json_encode($data);
	}
	//display portal announcement page
	public function ajax_portal_announce(){
		$data=$this->model_users->registrar_post();
	 	echo json_encode($data);
	}
	//display all my work done every subject
	public function uploaded_file(){
		$data=$this->model_users->display_activity_sent();
	 	echo json_encode($data);
	}
	//show all comment
	public function displayComment(){
		$data=$this->model_users->comment();
	 	echo json_encode($data);
	}
	//closed the submission of activity
	public function ajax_not_allow(){
		$data=$this->model_users->not_submit();
	 	echo json_encode($data);
	}
	public function ajax_allow_submit(){
		$data=$this->model_users->allow_submit();
	 	echo json_encode($data);
	}	
	//delete post 
	public function ajax_delete_post(){
		$data=$this->model_users->delete_post();
	 	echo json_encode($data);
	}	
	
	//display of activity
	public function ajax_display_activity(){
		$data=$this->model_users->display_activity_post();
	 	echo json_encode($data);
	}
	//view student submitted file
	public function ajax_view_student_sent(){
		$data=$this->model_users->view_student_submitted();
	 	echo json_encode($data);
	}
	//approve student to join class
	public function ajax_approve_class(){
		$data=$this->model_users->approve_student_join();
	 	echo json_encode($data);
	}
	//reject student request to joinn my class
	public function ajax_reject_class(){
		$data=$this->model_users->reject_student_join();
	 	echo json_encode($data);
	}
	//sent comment
	public function ajax_comment_sent(){
		$data=$this->model_users->comment_sent();
	 	echo json_encode($data);
	}
	//sent message
	public function ajax_sent_message(){
		$data=$this->model_users->sent_message();
	 	echo json_encode($data);
	}	
	//display mesage of other all
	public function ajax_display_message(){
		$data=$this->model_users->chat_other();
	 	echo json_encode($data);
	}
	public function ajax_request_student(){
		$data=$this->model_users->student_class_offline();
	 	echo json_encode($data);
	}
	public function ajax_online_student(){
		$data=$this->model_users->student_class_display();
	 	echo json_encode($data);
	}
	//display student class join request
	public function ajax_class_join(){
		$data=$this->model_users->student_class_join_requisted();
	 	echo json_encode($data);
	}
	//display classs admin
	public function ajax_display_class(){
		$data=$this->model_users->display_my_classroom();
	 	echo json_encode($data);
	}
	public function ajax_approve_student(){
		$data=$this->model_users->student_request_approve();
	 	echo json_encode($data);
	}  
	public function ajax_history(){
	 	$data=$this->model_users->history_payment();
	 	echo json_encode($data);
	 }
	 public function ajax_student_request(){
	 	$data=$this->model_users->student_request_display();
	 	echo json_encode($data);
	 } 
	public function ajax_search_balance(){
        $data=$this->model_users->search();
        echo json_encode($data);	
	}
	public function ajax_edit(){
        $data=$this->model_users->update_transfer();
        echo json_encode($data);	
	}
	public function ajax_cancel_join_class(){
		$data=$this->model_users->cancel_enroll_delete();
        echo json_encode($data);	
	}
	public function ajax_enroll(){
        $data=$this->model_users->enroll_transfer();
        echo json_encode($data);	
	}
	public function ajax_enroll_cancel(){
		$data=$this->model_users->enroll_transfer_cancel();
        echo json_encode($data);
	}
	public function ajax_transfer_register(){
	 	$data=$this->input->post('data');
	 	$data2=$this->input->post('portal_ID');
	 	$data=$this->model_users->transfer_reg($data,$data2);
	 	echo json_encode($data);
	 }

	 public function ajax_transfer(){
	 	$data=$this->input->post('data');
	 	$data2=$this->input->post('portal_ID');
	 	$data=$this->model_users->transfer($data,$data2);
	 	echo json_encode($data);
	 }
	 public function ajax_old(){
	 	$data=$this->input->post('data');
	 	$data2=$this->input->post('portal_ID');
	 	$data=$this->model_users->old($data,$data2);
	 	echo json_encode($data);
	 }
	 public function ajax_stop_portal(){
	 	$data=$this->model_users->portal_stop();
	  	echo json_encode($data);
	  	//sent notification
	 }
	 public function ajax_portal_display(){
	 	$data=$this->model_users->ajax_portal();
	  	echo json_encode($data);
	 }
	 public function ajax_portal_approve(){
	 	$data=$this->model_users->ajax_portal_approve();
	  	echo json_encode($data);
	 }
	 public function ajax_portal_remove_display(){
	 	$data=$this->model_users->ajax_portal_remove_display();
	  	echo json_encode($data);
	 }
	 public function ajax_portal_allow(){
	 	$data=$this->model_users->portal_allow();
		echo json_encode($data);     
	 	//sent notification via model
	 }
	 public function ajax_portal_delete(){
	 	$data=$this->model_users->portal_delete();
	 	echo json_encode($data);
	 }


	 public function ajax_price(){
	 	$data=$this->model_users->display();
	 	$i=1;
	 	foreach($data as $row)
	 		{
	 			echo "<tr>";
               	echo "<th>"."Laboratory Fee:"."</th>"
               	."<td>"."₱ ".$row->lab_fee."</td>";
             	echo "</tr>";

             	echo "<tr>";
               	echo "<th>"."Lecture Fee:"."</th>"
               	."<td>"."₱ ".$row->lec_fee."</td>";
             	echo "</tr>";

             	echo "<tr>";
               	echo "<th>"."Miscellaneous Fee:"."</th>"
               	."<td>"."₱ ".$row->mis_fee."</td>";
             	echo "</tr>";

             	echo "<tr>";
               	echo "<th>"."Other Fee:"."</th>"
               	."<td>"."₱ ".$row->other_fee."</td>";
             	echo "</tr>";

             	echo "<tr>";
               	echo "<th>"."Total Fee:"."</th>"
               	."<td>"."₱ "."0.00"."</td>";
             	echo "</tr>";
	 			$i++;
	 		}
	 }

	

	
}
