<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_model{


	public function __construct(){
		parent::__construct();
	}
	
	public function data($table,$field,$data){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function portaldata($table,$field,$data){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($field,$data);
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function portal_show_classroom($data){
		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_course','tbl_class.program_code = tbl_course.program_code','right');
		$this->db->where('tbl_class.portal_ID',$data);
		$this->db->where('tbl_class.status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function portalDataRegister($data,$data2,$table){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('student_id',$data);
		$this->db->where('portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	 public function get_data($table,$order){
	 	$this->db->select('*');
	 	$this->db->order_by($order);
	 	$this->db->where('status','1');
	 	$this->db->from($table);
	 	$query = $this->db->get();
 		return $query->result();
	 }
	public function get_data_course($data,$field,$table){
		$this->db->select('*');
		$this->db->where('status','1');
		$this->db->where($field,$data);
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	//for student confirmation
	public function student_request_approve(){
				$email = $this->input->post('email');
				$student_id = $this->input->post('student_id');
				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.gmail.com',
				  'smtp_port' => '465',
				  'smtp_timeout' => '7',
				  'smtp_user' => 'markangeloterante@gmail.com', // change it to yours
				  'smtp_pass' => '07mark112017', // change it to yours
				  'mailtype' => 'html',
				  'newline' => "\r\n",
				  'charset' => 'iso-8859-1',
				  'validataion' =>TRUE,
				  'wordWrap' => TRUE
				);
				  $this->email->initialize($config);
				  
				  $name = $student_id;
				  
			      $message = ('Please be Notified your online registration has been approve by the registrar just be visit the registrar Office for the final procedure of Enrollment');
			      $this->email->from('markangeloterante@gmail.com'); // change it to yours
			      $this->email->to($email);// change it to yours
			      $this->email->subject('Your Online registration has been approved.');
			      $this->email->message($message);

			      if($this->email->send()){
			      	$id= $this->input->post('id');

			      	$update1 = array(
			      		'enroll_stat'=>'0'
			      	);
					$this->db->where('id', $id);
					$this->db->update('tbl_student_info',$update1);
					$update2  = array(
						'status' => '0' 
					);
					$this->db->where('id',$id);
					$result=$this->db->update('tbl_student_account',$update2);
					return $result;
			     }
			     else{

			     	show_error($this->email->print_debugger());
			     }
	}

	public function student_request_display(){
		$data= $this->input->post('portal_ID');
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->where('enroll_stat','2');
		$this->db->where('portal_ID',$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data_portal($data,$table,$order){
		$this->db->select('*');
		$this->db->order_by($order);
		$this->db->where('portal_ID',$data);
		$this->db->where('enroll_stat','1');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_data_sub($data,$table,$order){
		//use to get prof list
		$this->db->select('*');
		$this->db->order_by($order);
		$this->db->where('portal_ID',$data);
		$this->db->where('status','1');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_student_unenrolled($table,$order,$data){
		$this->db->select('*');
		$this->db->order_by($order);
		$this->db->where('status','1');
		$this->db->where('portal_ID',$data);
		$this->db->where('enroll_stat','0');
		$this->db->from($table);
		$query = $this->db->get();
		return $query->result();
	}
	public function course($table,$field,$data,$portal_ID){
		//display Course
		$this->db->select('*');
        $this->db->from($table);
        $this->db->where($field,$data);
        $this->db->where('portal_ID',$portal_ID);
        $this->db->where('status','0');
        $query = $this->db->get();
		return $query->result();
	}
	public function courseOffer($portal_ID){
		//display Course on creating online class
		$this->db->select('*');
        $this->db->from('tbl_course');;
        $this->db->where('portal_ID',$portal_ID);
        $this->db->where('status','1');
        $query = $this->db->get();
		return $query->result();
	}
	
	public function user_data_title($table,$field,$data){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('status','1');
		$this->db->where($field,$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function data_print($table,$field,$data,$data2){
		//use in reg/print page
		$this->db->select('*');
		$this->db->from('tbl_course');
		$this->db->join('tbl_student_records', ' tbl_course.course_code = tbl_student_records.course_code', 'left');
		$this->db->where('tbl_course.status','0');
		$this->db->where('tbl_student_records.status','2');
		$this->db->where('tbl_student_records.student_id',$data);
		$this->db->where('tbl_student_records.portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	public function data_print_portal($table,$field,$data,$data2){
		$this->db->select('*');
		$this->db->from('tbl_course');
		$this->db->join('tbl_student_records', ' tbl_course.course_code = tbl_student_records.course_code', 'left');
		$this->db->where('tbl_student_records.status','2');
		$this->db->where('tbl_student_records.portal_ID',$data2);
		$this->db->where('tbl_student_records.student_id',$data);
		$query = $this->db->get();
		return $query->result();
	}

	public function student_print($data1,$data2){
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->join('tbl_student_balance', 'tbl_student_info.student_id = tbl_student_balance.student_id','right');
		$this->db->where('tbl_student_info.student_id',$data1);
		$this->db->where('tbl_student_info.portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	public function display(){
		$this->db->select('*');
		$this->db->from('tbl_counter');
		$query = $this->db->get();
		return $query->result();
	}
	public function transfer($data,$data2){
		//use in ajax-load
		$this->db->select('*');
		$this->db->from('tbl_student_records');
		$this->db->join('tbl_course', ' tbl_student_records.course_code = tbl_course.course_code', 'right');
		$this->db->where('tbl_student_records.student_id',$data);
		$this->db->where('tbl_student_records.portal_ID',$data2);
		$this->db->where('tbl_course.status','0');
		$query = $this->db->get();
		return $query->result();
	}
	public function old($data,$data2){
		//use by the old student reg/oldenroll
		$this->db->select('*');
		$this->db->from('tbl_student_records');
		$this->db->join('tbl_course', ' tbl_student_records.course_code = tbl_course.course_code', 'left');
		$this->db->where('tbl_student_records.status','0');
		$this->db->where('tbl_course.status','0');
		$this->db->where('tbl_student_records.student_id',$data);
		$this->db->where('tbl_student_records.portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	public function grades($data,$data2){
		$this->db->select('*');
		$this->db->from('tbl_student_records');
		$this->db->join('tbl_course', ' tbl_student_records.course_code = tbl_course.course_code', 'left');
		$this->db->where('tbl_student_records.student_id',$data);
		$this->db->where('tbl_student_records.portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	public function transfer_reg($data,$data2){
		//use at ajax_register  templates/superfooter
		$this->db->select('*');
		$this->db->from('tbl_student_records');
		$this->db->join('tbl_course', ' tbl_student_records.course_code = tbl_course.course_code', 'left');
		
		$this->db->where('tbl_course.status','0');
		$this->db->where('tbl_student_records.status','2');
		$this->db->where('tbl_student_records.portal_ID',$data2);
		$this->db->where('tbl_student_records.student_id',$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function history_payment(){
		$data = $this->input->post('data_id');
		$data2 = $this->input->post('portal_ID');
		$this->db->select('*');
		$this->db->from('tbl_payment_history');
		$this->db->where('student_id',$data);
		$this->db->where('portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_by_id($ids)
	{	
		$this->db->select('*');
		$this->db->from('tbl_student_records');
		$this->db->where('id',$ids);
		$query = $this->db->get();
		return $query->result();
	}
	 function payment(){
	 	$id=$this->input->post('student');
	 	$payment=$this->input->post('payment');
	 	$portal_ID = $this->uri->segment(3);
	 	$this->db->select('*');
	 	$this->db->from('tbl_student_balance');
	 	$this->db->where('student_id',$id);
	 	$this->db->where('portal_ID',$portal_ID);
	 	$query = $this->db->get();
	 	$balance = '0';
	 	$bal='0';
	 	if($query->num_rows() != 0){
	       foreach ($query->result() as $value){
	 		$bal = $value->total_bal;
	 		}
	 	}

	 	$balance = ($bal-$payment);
	 	$update = array(
	 		'portal_ID'=>$portal_ID,
	 		'total_bal'=>$balance
	 		);
        $this->db->where('student_id', $id);
        $this->db->where('portal_ID',$portal_ID);
        $this->db->update('tbl_student_balance',$update);

        $update = array(
	 		'enroll_stat'=>'1'
	 		);
        $this->db->where('student_id', $id);
        $this->db->where('portal_ID',$portal_ID);
        $this->db->update('tbl_student_info',$update);  
         	
         $history = array(
	 		'student_id' =>$id,
	 		'portal_ID' =>$portal_ID,
	 		'balance'=>$balance,
	 		'payment' =>$payment
	 		);
	 	$this->db->insert('tbl_payment_history',$history);

	 	// $this->db->select('*');
	 	// $this->db->from('tbl_student_balance');
	 	// $this->db->join('tbl_payment_history', ' tbl_student_balance.student_id = tbl_payment_history.student_id', 'left');
	 	// $this->db->where('tbl_payment_history.student_id',$id);
	 	// $query = $this->db->get();
	 	// return $query->result();
	 // 	$this->db->select('*');
		// $this->db->from('portal');
		// $this->db->where('status','1');
		// $this->db->where('portal_ID',$portal_ID);
		// $query = $this->db->get();
		// return $query->result();
	 }
	function search(){
		$id=$this->input->post('student_id');
		$portal_ID = $this->input->post('portal_ID');
		$this->db->select('*');
		$this->db->from('tbl_student_balance');
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('student_id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	function studentBal($id,$lec,$lab)
	{
		$query="INSERT INTO `tbl_student_balance`( `student_id`, `lecture_bal`, `lab_bal`) 
		VALUES ('$id','$lab',$lec)";
		$this->db->query($query);
	}
	function update_transfer(){
		$id=$this->input->post('edit');
        $grades=$this->input->post('edit_grades');

 		if($grades == 0){
 			$this->db->set('status', '0');
        	$this->db->set('grades', $grades);
        	$this->db->where('ids', $id);
        	$result=$this->db->update('tbl_student_records');
        	return $result;
 		}
 		else{
 			$this->db->set('status', '1');
        	$this->db->set('grades', $grades);
        	$this->db->where('ids', $id);
        	$result=$this->db->update('tbl_student_records');
        	return $result;
 		}

	}
	function portal_stop(){
			
        		$email = $this->input->post('email');
				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.gmail.com',
				  'smtp_port' => '465',
				  'smtp_timeout' => '7',
				  'smtp_user' => 'markangeloterante@gmail.com', // change it to yours
				  'smtp_pass' => '07mark112017', // change it to yours
				  'mailtype' => 'html',
				  'newline' => "\r\n",
				  'charset' => 'iso-8859-1',
				  'validataion' =>TRUE
				);
				  $this->email->initialize($config);
			      $message = 'Please be notified that myPORTAL undergoes in server maintenance and you cannot login in the system <br>for more information please feel free to email the myPORTAL Admin at <b>markangeloterante@gmail.com</b>';
			      $this->email->from('markangeloterante@gmail.com'); // change it to yours
			      $this->email->to($email);// change it to yours
			      $this->email->subject('Your portal system has ben hold for maintenance.');
			      $this->email->message($message);

			      if($this->email->send()){
			      	$id=$this->input->post('portal');
		 			$this->db->set('status', '0');
		        	$this->db->where('portal_ID', $id);
		        	$result=$this->db->update('portal');
		        	return $result;
			     }
			     else{
			     	show_error($this->email->print_debugger());
			     }
	}
	//delete portal
	function portal_delete(){
        	$email = $this->input->post('email');
				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.gmail.com',
				  'smtp_port' => '465',
				  'smtp_timeout' => '7',
				  'smtp_user' => 'markangeloterante@gmail.com', // change it to yours
				  'smtp_pass' => '07mark112017', // change it to yours
				  'mailtype' => 'html',
				  'newline' => "\r\n",
				  'charset' => 'iso-8859-1',
				  'validataion' =>TRUE
				);
				  $this->email->initialize($config);
			      $message = 'Your Portal in myPORTAL are temporary REMOVE please Re-Activate your Account just feel free to contact the myPORTAL Admin on <b>markangeloterante@gmail.com</b>';
			      $this->email->from('markangeloterante@gmail.com'); // change it to yours
			      $this->email->to($email);// change it to yours
			      $this->email->subject('myPORTAL has temporary REMOVE your Portal');
			      $this->email->message($message);

			      if($this->email->send()){
				      	$id=$this->input->post('portal');
			 			$this->db->set('status', '2');
			        	$this->db->where('portal_ID', $id);
			        	$result=$this->db->update('portal');
			        	return $result;
			     }
			     else{
			     	show_error($this->email->print_debugger());
			     }
	}
	function portal_allow(){
				$email = $this->input->post('email');
				$config = Array(
				  'protocol' => 'smtp',
				  'smtp_host' => 'ssl://smtp.gmail.com',
				  'smtp_port' => '465',
				  'smtp_timeout' => '7',
				  'smtp_user' => 'markangeloterante@gmail.com', // change it to yours
				  'smtp_pass' => '07mark112017', // change it to yours
				  'mailtype' => 'html',
				  'newline' => "\r\n",
				  'charset' => 'iso-8859-1',
				  'validataion' =>TRUE
				);
				  $this->email->initialize($config);
			      $message = 'Welcome to myPORTAL an Online application where you can create your own Student Portal';
			      $this->email->from('markangeloterante@gmail.com'); // change it to yours
			      $this->email->to($email);// change it to yours
			      $this->email->subject('Request for using myPORTAL has been approved.');
			      $this->email->message($message);

			      if($this->email->send()){
			      	$id=$this->input->post('portal');
		 			$this->db->set('status', '1');
		        	$this->db->where('portal_ID', $id);
		        	$result=$this->db->update('portal');
		        	return $result;
			     }
			     else{
			     	show_error($this->email->print_debugger());
			     }
	}
	function enroll_transfer(){
			$id=$this->input->post('ids');
 			$this->db->set('status', '2');
        	$this->db->where('ids', $id);
        	$result=$this->db->update('tbl_student_records');
        	return $result;
	}
	function enroll_transfer_cancel(){
			$id=$this->input->post('ids');
			$grades=$this->input->post('grades');
			if($grades == 0){
				$this->db->set('status', '0');
        		$this->db->where('ids', $id);
        		$result=$this->db->update('tbl_student_records');
        		return $result;	
			}
			else{
				$this->db->set('status', '1');
        		$this->db->where('ids', $id);
        		$result=$this->db->update('tbl_student_records');
        		return $result;
			}
 			
	}

	public function student_print_transfer($data,$other,$mis,$lecTotal,$labTotal,$total,$portal_ID){
		$this->db->select('*');
		$this->db->from('tbl_student_balance');
		$this->db->where('student_id',$data);
		$this->db->where('portal_ID',$portal_ID);
		$query = $this->db->get();

		if($query->num_rows() != 0){
			$studBal = array(
			'portal_ID'=>$portal_ID,	
			'other_bal' => $other,
			'mis_bal' => $mis,
			'lecture_bal'=> $lecTotal,
			'lab_bal' => $labTotal,
			'total_bal' => $total,
			'student_id' =>  $data 
			);
			$this->db->where('student_id',$data);
			$this->db->where('portal_ID',$portal_ID);
			$this->db->update('tbl_student_balance',$studBal);
		}
		else{
			$studBal = array(
			'portal_ID' =>$portal_ID,
			'other_bal' => $other,
			'mis_bal' => $mis,
			'lecture_bal'=> $lecTotal,
			'lab_bal' => $labTotal,
			'total_bal' => $total,
			'student_id' =>  $data 
			);
			$this->db->insert('tbl_student_balance',$studBal);
		}

		// $this->db->select('*');
		// $this->db->from('tbl_student_info');
		// $this->db->join('tbl_student_balance', 'tbl_student_info.student_id = tbl_student_balance.student_id');
		// $this->db->where('tbl_student_info.student_id',$data);
		// $query = $this->db->get();
		// return $query->result();
		$this->db->select('*');
		$this->db->from('portal');
		$this->db->where('portal_ID',$portal_ID);
		$query = $this->db->get();
		return $query->result();

		
	}
	public function data_old_student($table,$field,$data){
		$this->db->select('*');
		$this->db->from('tbl_course');
		$this->db->join('tbl_student_records', ' tbl_course.course_code = tbl_student_records.course_code', 'left');
		$this->db->where('tbl_student_records.student_id',$data);
		$query = $this->db->get();
		return $query->result();
	}
	public function print_payment_balance($data,$data2){
		$this->db->select('*');
		$this->db->from('tbl_student_info');
		$this->db->join('tbl_student_balance', 'tbl_student_info.student_id = tbl_student_balance.student_id');
		$this->db->where('tbl_student_info.student_id',$data);
		$this->db->where('tbl_student_info.portal_ID',$data2);
		$query = $this->db->get();
		return $query->result();
	}
	//for offline student
	public function student_class_offline(){
		$portal_ID = $this->input->post('portal_ID');
		$class_code = $this->input->post('class_code'); 
		$this->db->from('tbl_class_join');
		$this->db->where('class_code',$class_code);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('status','0');
		$query = $this->db->get();
		return $query->result();
	}
	//sent comment(){
	public function comment_sent(){
		$portal = $this->input->post('portal');
		$name= $this->input->post('name');
		$id = $this->input->post('id');
		$profile = $this->input->post('profile');
		$comment = $this->input->post('comment');

		$sent_message = array(
			'portal_ID' =>$portal,
			'id' => $class_code,
			'name' => $name,
			'profile'=> $profile,
			'comment' => $comment
			);

		$result = $this->db->insert('tbl_portal_comment',$sent_message);
		return $result;

	}
	//sent message
	public function sent_message(){
		$portal_ID = $this->input->post('portal_ID');
		$name= $this->input->post('name');
		$class_code = $this->input->post('class_code');
		$admin_id = $this->input->post('admin_id');
		$profile = $this->input->post('profile');
		$message = $this->input->post('message');

		$sent_message = array(
			'portal_ID' =>$portal_ID,
			'class_code' => $class_code,
			'name' => $name,
			'profile'=> $profile,
			'message' => $message,
			'status' => '1',
			'sent' =>  $admin_id 
			);

		$result = $this->db->insert('tbl_class_chat',$sent_message);
		return $result;
	}
	//for displaying message that sent by other
	public function chat_other(){
		$portal_ID = $this->input->post('portal_ID');
		$class_code = $this->input->post('class_code');

		$this->db->from('tbl_class_chat');
		$this->db->order_by('id','desc');
		$this->db->where('class_code',$class_code);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	//for online
	public function student_class_display(){
		$portal_ID = $this->input->post('portal_ID');
		$class_code = $this->input->post('class_code'); 
		$this->db->from('tbl_class_join');
		$this->db->where('class_code',$class_code);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	//display student class and requested to join
	public function student_class_join_requisted(){
		$portal_ID = $this->input->post('portal_ID');
		$student_id = $this->input->post('student_id');

		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->join('tbl_class_join','tbl_class_join.class_code = tbl_class.class_code', 'left');
		$this->db->where('tbl_class_join.student_id',$student_id);
		$this->db->where('tbl_class_join.portal_ID',$portal_ID);
		$query = $this->db->get();
		return $query->result();
	}
	//display admin classes
	public function display_my_classroom(){
		$portal_ID = $this->input->post('portal_ID');
		$admin = $this->input->post('admin_id');

		$this->db->select('*');
		$this->db->from('tbl_class');
		$this->db->where('admin_id',$admin);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_portal(){
		$this->db->select('*');
		$this->db->from('portal');
		$this->db->where('portal.status','1');
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_portal_approve(){
		$this->db->select('*');
		$this->db->from('portal');
		$this->db->where('portal.status','0');
		$query = $this->db->get();
		return $query->result();
	}
	public function ajax_portal_remove_display(){
		$this->db->select('*');
		$this->db->from('portal');
		$this->db->where('portal.status','2');
		$query = $this->db->get();
		return $query->result();
	}
	public function cancel_enroll_delete(){
		$id = $this->input->post('id');
		$this->db->where('id', $id);
       	$result=$this->db->delete('tbl_class_join'); 
       	return $result;
	}
	public function approve_student_join(){
		$id=$this->input->post('id');
		$update2  = array(
			'status' => '1' 
		);
		$this->db->where('id',$id);
		$result=$this->db->update('tbl_class_join',$update2);
		return $result;
	}
	public function reject_student_join(){
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('tbl_class_join');
		return $result;
	}
	public function delete_post(){
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('tbl_class_post');
		return $result;
	}
	public function not_submit(){
		$id=$this->input->post('id');
		$allow = array(
			'status' => '0'  
		);
		$this->db->where('id',$id);
		$result=$this->db->update('tbl_class_post',$allow);
		return $result;
	}
	
	public function allow_submit(){
		$id=$this->input->post('id');
		$allow = array(
			'status' => '1'  
		);
		$this->db->where('id',$id);
		$result=$this->db->update('tbl_class_post',$allow);
		return $result;
	}
	public function display_activity_post(){
		$portal_ID=$this->input->post('portal_ID');
		$class_code=$this->input->post('class_code');
		$this->db->select('*');
		$this->db->from('tbl_class_post');
		$this->db->order_by('id','desc');
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('class_code',$class_code);
		$query = $this->db->get();
		return $query->result();
	}
	public function view_student_submitted(){
		$portal_ID=$this->input->post('myportal');
		$class_code=$this->input->post('class_code');
		$activity=$this->input->post('activity');
		$this->db->select('*');
		$this->db->from('tbl_class_submit');
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('class_code',$class_code);
		$this->db->where('activityCode',$activity);
		$query = $this->db->get();
		return $query->result();
	} 
	// public function comment(){
	// 	$class_code=$this->input->post('class_code');
	// 	$portal_ID=$this->input->post('portal_ID');
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_comment');
	// 	$this->db->where('portal_ID',$portal_ID);
	// 	$this->db->where('class_code',$class_code);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
	public function display_activity_sent(){
		$class_code=$this->input->post('class_code');
		$portal_ID=$this->input->post('portal_ID');
		$student_id=$this->input->post('student_id');
		$this->db->select('*');
		$this->db->from('tbl_class_submit');
		$this->db->where('student_id',$student_id);
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('class_code',$class_code);
		$query = $this->db->get();
		return $query->result();
	}
	public function registrar_post(){
		$portal_ID=$this->input->post('portal_ID');
		$this->db->select('*');
		$this->db->from('tbl_portal_announce');
		$this->db->order_by('id','desc');
		$this->db->where('portal_ID',$portal_ID);
		$query = $this->db->get();
		return $query->result();
	}
	public function comment_box_post(){
		$portal_ID=$this->input->post('portal_ID');
		$id=$this->input->post('id');
		$this->db->select('*');
		$this->db->from('tbl_portal_announce');
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function view_comment(){
		$portal_ID=$this->input->post('portal');
		$id=$this->input->post('id');
		$this->db->select('*');
		$this->db->from('tbl_portal_comment');
		$this->db->where('portal_ID',$portal_ID);
		$this->db->where('postID',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function delete_registrar_post(){
		$id=$this->input->post('id');
		$this->db->where('id',$id);
		$result=$this->db->delete('tbl_portal_announce'); 
       	return $result;	
	}
	


}