<?php

class Book_model extends CI_Model{
   
		
 
	public function user_validate(){ 
	$this->db->where('username', $this->input->post('username'));
	//$this->db->where('user_password',  $this->input->post('password'));
	$query = $this->db->get('forumsep_users');
	return $query->row_array();
	}
 


	function check_mail($email){
		return mysql_fetch_assoc(mysql_query("SELECT * FROM `forumsep_users` where email='$email'"));
		}
	function get_user_details($email){
		$this->db->where('email',$email);
		$user = $this->db->get('forumsep_users');
		if($user->num_rows() > 0){
			foreach($user->result() as $row){
				$user_details = array(
					
					
					'user_email'=>$row->email,
					'user_prof_pic'=>$row->avatar,
					'user_id'=>$row->uid, //for usertype
					'user_username'=>$row->username //add any other necessary
					);
			}
			return $user_details;
		}else{
			return false;
		}

	}
		
	function register_user(){
		$val= $this->input->post('user_type');
		if($val=="TB1") {$usertype='1';}
		elseif($val=="TB2"){$usertype='2';}
		elseif($val=="TB2,TB3"){$usertype='3';}
		elseif($val=="TB2,TB3,TB4"){$usertype='4';}
		else{$usertype='0';}
		 $user_prof_pic='user_prof.png';
        
		$data = array(
            'user_surname' => $this->input->post('surname'),
			'user_othernames' => $this->input->post('othernames'),
			'user_phone_number' => $this->input->post('phone_number'),
			'user_mailing_address' => $this->input->post('mailing_address'),
			'user_email' => $this->input->post('email'),
			'user_username' =>$this->input->post('username'),
			'user_password' => $this->input->post('password'),
			'user_usertype_id' => $usertype,
			'user_dept_id' => $this->input->post('dept_id'),
			'user_school_id' => $this->input->post('school_id'),
			'user_year_in' => $this->input->post('year_in'),
			'user_gender' => $this->input->post('user_gender'),
			'user_prof_pic' => $user_prof_pic,
			'user_year_out' => $this->input->post('year_out')
             
        );
         $insert = $this->db->insert('sep_users', $data);
		 $user_id = $this->db->insert_id();
		 return $user_id;
	}
	
	function depts_fetch(){
		//return mysql_fetch_assoc(mysql_query("SELECT * FROM `sep_departments`"));
		$query = "SELECT * FROM `sep_departments`";//$this->db->get('countries');

            $this_array = array();

            $res = $this->db->query($query);

            foreach ($res->result() as $row)
            {
               $this_array[] = $row;
            }

            return $this_array;
	}
	
	function schools_fetch(){
		//return mysql_fetch_assoc(mysql_query(""));
		$query = "SELECT * FROM `sep_schools`";//$this->db->get('countries');

            $this_array = array();

            $res = $this->db->query($query);

            foreach ($res->result() as $row)
            {
               $this_array[] = $row;
            }

            return $this_array;
	}
	
	function fetch_user($user_id){
		return mysql_fetch_assoc(mysql_query("SELECT * FROM `forumsep_users` where uid='$user_id'"));
	}
    function get_records(){
        $query= $this->db->get('property_feature');
        return $query->result();        
    }
    function add_record($data){
        $this->db->insert('property_feature',$data);
        return;
    }
	function register_company_next($upload,$company_id){
	//echo $this->input->post('group_head2');die();
	    $data = array( 
		'company_summary'=>$this->input->post('summary'),
		'company_logo'=>$upload,
		'mail_address'=>$this->input->post('pobox')
		);

		$this->db->where('company_id', $company_id);
		$this->db->update('companies', $data);
}
          
}