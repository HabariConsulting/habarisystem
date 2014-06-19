<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ask Model
*
* Author:  Ligono Eugene
* 		   ligonoeugene@gmail.com
*
*
*
* Created:  13.02.2014
**/

class ask_model extends CI_Model
{
 	
function department_fetch(){
	return $this->db->query("SELECT * FROM `departments` where is_deleted='0' ");

}
function send_emaill($y, $id){
	
	return $this->db->query("SELECT * FROM `users` u inner join `departments` d on u.`user_dep`=d.`dep_id` inner join `tasks` t on d.`dep_id`=t.`assigned` where u.`active`='1' and t.`task_id`='$id' and u.`user_dep`='$y' ");

}
function send_email($y, $id){
  $sql="SELECT * FROM `users` u inner join `departments` d on u.`user_dep`=d.`dep_id` inner join `tasks` t on d.`dep_id`=t.`assigned`  where u.`active`='1' and t.`task_id`='$id' and u.`user_dep`='$y' ";
    
    $query = $this->db->query($sql);
    $result = array();
    if (count($query->result()) > 0){
    foreach ($query->result() as $row) {
     $result[] = $row;
    }
   }
   
   return $result;
}
function client_fetch(){
	return $this->db->query("SELECT * FROM `clients` where is_deleted='0' order by dated desc ");

}
function job_fetch(){
	return $this->db->query("SELECT * FROM `jobs` j inner join `clients` c on j.`client_id`=c.`client_id` where j.`is_deleted`='0' order by j.`dated` desc");

}
function sheet_fetch(){
	return $this->db->query("SELECT * FROM `sheets` s inner join `users` u on s.`posted_by`=u.`email` inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' order by s.`dated` desc ");

}
function client_sum(){
	return $this->db->query("SELECT, c.`client_id` SUM(s.`hours`) as hours FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `clients` c on t.`client`=c.`client_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and c.`is_deleted`='0' group by c.`client_id`");

}
function employeerec_fetch(){
	return $this->db->query("SELECT * FROM `users` u inner join `departments` d on u.`user_dep`=d.`dep_id` where d.`is_deleted`='0' and u.`active`='1' order by u.`created_on` desc ");

}
function userdep_fetch($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `users` u inner join `departments` d on u.`user_dep`=d.`dep_id` where d.`is_deleted`='0' and u.`id`='$id' order by u.`created_on` desc limit 1" ));

}
function jobsum_fetch(){
	return $this->db->query("SELECT s.`task_id` , j.`job_number` as job_number, j.`job_id` as job_id, SUM(s.`hours`) as hours FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_number`");
	//return $this->db->query("SELECT * FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_id`");

}

function employeedep_fetch(){
	
	return $this->db->query("SELECT * FROM `departments` d where d.`is_deleted`='0'");
//return $this->db->query("SELECT d.`dep_id`, GROUP_CONCAT(users.`first_name`)
//FROM  `departments` d inner JOIN users
//ON(d.`dep_id`=users.`user_dep`) GROUP BY d.`dep_id`");

}
function task_fetch(){
	return $this->db->query("SELECT * FROM `tasks` t inner join `departments` d on t.`assigned`=d.`dep_id` inner join `jobs` j on t.`client`=j.`job_id` where t.`is_deleted`='0' and j.`is_deleted`='0' and d.`is_deleted`='0' order by t.`date_submitted` desc");

}

function task_user($user_id){
	return $this->db->query("SELECT * FROM `tasks` t inner join `jobs` j on t.`client`=j.`job_id` inner join `departments` d on t.`assigned`=d.`dep_id` left join `users` u on d.`dep_id`=u.`user_dep` where t.`is_deleted`='0' and j.`is_deleted`='0' and t.`is_active` NOT LIKE '2' and t.`assigned`=d.`dep_id` and u.`id`= $user_id");
	
}
function dep_user($user_id){
	return $this->db->query("SELECT * FROM `users` u inner join `departments` d on u.`user_dep`=d.`dep_id` where  u.`id`= $user_id order by d.`dep_id` desc limit 1");
	
}
function count_dep(){
	$sql="SELECT *, COUNT(dep_id ) AS `num` FROM `departments` where is_deleted='0' ";
    
    $query = $this->db->query($sql);
    $result = array();
    if (count($query->result()) > 0){
    foreach ($query->result() as $row) {
     $result[] = $row;
    }
   }   
   return $result;
	
}
 function add_dep($data){
        $this->db->insert('departments',$data);
    }
 function add_client($data){
        $this->db->insert('clients',$data);
    }
 function add_task(){
 	$data= array(
                'title'=> $this->input->post('title'),
                'brief'=> $this->input->post('editor1'),
                'client'=> $this->input->post('selCSI'),
                'assigned'=> $this->input->post('employee'),
                'deadline'=> $this->input->post('deadline'),
                'posted_by'=> $this->session->userdata($this->config->item('identity', 'ion_auth'))                
                );
        $this->db->insert('tasks',$data);
        return $this->db->insert_id();
    }
 function add_job($data){
        $this->db->insert('jobs',$data);
    }
  function add_sheet($data){
        $this->db->insert('sheets',$data);
    }
function activate_dep($id){
		$sql = "UPDATE departments
				SET is_active=0 
				WHERE dep_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function activate_client($id){
		$sql = "UPDATE clients
				SET is_signed=1 
				WHERE client_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function activate_task($id){
		$sql = "UPDATE tasks
				SET is_active=1 
				WHERE task_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function inactivate_client($id){
		$sql = "UPDATE clients
				SET is_signed=0 
				WHERE client_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function inactivate_task($id){
		$sql = "UPDATE tasks
				SET is_active=2 
				WHERE task_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function delete_dep($id){
		$sql = "UPDATE departments
				SET is_deleted=1 
				WHERE dep_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function delete_employeerec($id){
		$sql = "UPDATE users
				SET active=0 
				WHERE id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function delete_client($id){
		$sql = "UPDATE clients
				SET is_deleted=1 
				WHERE client_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function delete_task($id){
		$sql = "UPDATE tasks
				SET is_deleted=1 
				WHERE task_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function delete_job($id){
		$sql = "UPDATE jobs
				SET is_deleted=1 
				WHERE job_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function inactivate_dep($id){
		$sql = "UPDATE departments
				SET is_active=1 
				WHERE dep_id=".$id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function edit_dep($id){
		$sql = "UPDATE departments
				SET dep_name = '{$this->input->post('title')}', rate = '{$this->input->post('rate')}', description = '{$this->input->post('editor1')}'
				WHERE dep_id=".$id;
		
		$query = $this->db->query($sql);		
		
}
function edituser_dep($id){
		$sql = "UPDATE users
				SET user_dep = '{$this->input->post('selCSI')}'
				WHERE id=".$id;
		
		$query = $this->db->query($sql);		
		
}
function edit_client($id){
		$sql = "UPDATE clients		
				SET name = '{$this->input->post('client_name')}', client_code = '{$this->input->post('code')}', email = '{$this->input->post('email')}',
				 p_number = '{$this->input->post('p_number')}', location = '{$this->input->post('location')}',
				  address = '{$this->input->post('address')}', contact_person = '{$this->input->post('contact')}',
				   person_number = '{$this->input->post('c_number')}'
				WHERE client_id=".$id;
		
		$query = $this->db->query($sql);		
		
}
function edit_task($id){
		$sql = "UPDATE tasks		
				SET title = '{$this->input->post('title')}', brief = '{$this->input->post('editor1')}',
				 client = '{$this->input->post('selCSI')}', assigned = '{$this->input->post('employee')}',
				  deadline = '{$this->input->post('deadline')}'
				WHERE task_id=".$id;
		
		$query = $this->db->query($sql);		
		
}
function edit_job($id){
		$sql = "UPDATE jobs		
				SET job_number = '{$this->input->post('job_number')}', description = '{$this->input->post('editor1')}',
				 client_id = '{$this->input->post('selCSI')}', timeline = '{$this->input->post('timeline')}',
				  retainer = '{$this->input->post('optionsRadios1')}', category = '{$this->input->post('category')}',
				   quote = '{$this->input->post('quote')}'
				WHERE job_id=".$id;
		
		$query = $this->db->query($sql);		
		
}
function view_dep($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `departments` where dep_id='$id' order by dep_id desc limit 1" ));
}
function view_client($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `clients` where client_id='$id' order by client_id desc limit 1" ));
}
function view_task($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `tasks` t inner join `departments` d on t.`assigned`=d.`dep_id` inner join `jobs` j on t.`client`=j.`job_id` where t.`task_id`='$id' order by t.`task_id` desc limit 1" ));
}
function get_job($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `jobs` j inner join `clients` c on j.`client_id`=c.`client_id` where j.`job_id`='$id' order by j.`dated` desc limit 1"));

}
function jobsum_report($id){
	return mysql_fetch_assoc(mysql_query("SELECT s.`task_id` , j.`job_number` as job_number,
															 j.`job_id` as job_id,
															 j.`quote` as quote,
															 c.`name` as name,
															 c.`contact_person` as contact_person,
															 c.`p_number` as phone_number,
															 c.`email` as company_email,
															 c.`address` as company_address,
															 j.`description` as description,
															 SUM(s.`hours`) as hours
										 FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id`
										  inner join `jobs` j  on t.`client`=j.`job_id`
										  inner join `clients` c on j.`client_id`=c.`client_id`
										   where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' and j.`job_id`='$id' group by j.`job_number` desc limit 1"));
	//return $this->db->query("SELECT * FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_id`");

}
function userjobsum_report($id){
	return mysql_fetch_assoc(mysql_query("SELECT s.`task_id` , j.`job_number` as job_number,
															 j.`job_id` as job_id,
															 u.`first_name` as first_name,
															 u.`last_name` as last_name,
															 j.`quote` as quote,
															 c.`name` as name,
															 c.`contact_person` as contact_person,
															 u.`phone` as phone_number,
															 u.`email` as email,
															 c.`address` as company_address,
															 j.`description` as description,
															 SUM(s.`hours`) as hours
										 FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id`
										  inner join `jobs` j  on t.`client`=j.`job_id`
										  inner join `clients` c on j.`client_id`=c.`client_id`
										  inner join `departments` d on t.`assigned`=d.`dep_id`
										  inner join `users` u on d.`dep_id`=u.`user_dep`
										   where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' and u.`id`='$id' group by t.`task_id` desc limit 1"));
	//return $this->db->query("SELECT * FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_id`");

}
function tasksum_report($id){
	return $this->db->query("SELECT s.`task_id` , t.`title` as title,
															 d.`rate` as rate,															 t.`brief` as brief,
															 SUM(s.`hours`) as hours
										 FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id`
										 inner join `departments` d on t.`assigned`=d.`dep_id`
										  inner join `jobs` j  on t.`client`=j.`job_id`
										  inner join `clients` c on j.`client_id`=c.`client_id`
										   where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' and j.`job_id`='$id' group by t.`task_id`");
	//return $this->db->query("SELECT * FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_id`");

}
function usertasksum_report($id){
	return $this->db->query("SELECT s.`task_id` , t.`title` as title,
															 d.`rate` as rate,
															 j.`job_number` as job_number,															 t.`brief` as brief,
															 SUM(s.`hours`) as hours
										 FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id`
										 inner join `departments` d on t.`assigned`=d.`dep_id`
										 inner join `users` u on s.`posted_by`=u.`email`
										  inner join `jobs` j  on t.`client`=j.`job_id`
										  inner join `clients` c on j.`client_id`=c.`client_id`
										   where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' and u.`id`='$id' group by t.`task_id`");
	//return $this->db->query("SELECT * FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_id`");

}
function sumtotal_report($id){
	return $this->db->query("SELECT (d.`rate` * SUM(s.`hours`)) as total_cost
										 FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id`
										 inner join `departments` d on t.`assigned`=d.`dep_id`
										  inner join `jobs` j  on t.`client`=j.`job_id`
										  inner join `clients` c on j.`client_id`=c.`client_id`
										   where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' and j.`job_id`='$id' group by t.`task_id`");
	//return $this->db->query("SELECT * FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `jobs` j  on t.`client`=j.`job_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and j.`is_deleted`='0' group by j.`job_id`");

}



}
