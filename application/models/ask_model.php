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
function client_fetch(){
	return $this->db->query("SELECT * FROM `clients` where is_deleted='0' ");

}
function job_fetch(){
	return $this->db->query("SELECT * FROM `jobs` j inner join `clients` c on j.`client_id`=c.`client_id` where j.`is_deleted`='0' ");

}
function sheet_fetch(){
	return $this->db->query("SELECT * FROM `sheets` s inner join `users` u on s.`posted_by`=u.`email` inner join `tasks` t on s.`task_id`=t.`task_id` inner join `clients` c on t.`client`=c.`client_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and c.`is_deleted`='0' ");

}
function client_sum(){
	return $this->db->query("SELECT, c.`client_id` SUM(s.`hours`) as hours FROM `sheets` s inner join `tasks` t on s.`task_id`=t.`task_id` inner join `clients` c on t.`client`=c.`client_id` where s.`is_deleted`='0' and t.`is_deleted`='0' and c.`is_deleted`='0' group by c.`client_id`");

}
function employeedep_fetch(){
	
	return $this->db->query("SELECT * FROM `departments` d where d.`is_deleted`='0'");
//return $this->db->query("SELECT d.`dep_id`, GROUP_CONCAT(users.`first_name`)
//FROM  `departments` d inner JOIN users
//ON(d.`dep_id`=users.`user_dep`) GROUP BY d.`dep_id`");

}
function task_fetch(){
	return $this->db->query("SELECT * FROM `tasks` t inner join `departments` d on t.`assigned`=d.`dep_id` inner join `clients` c on t.`client`=c.`client_id` where t.`is_deleted`='0' and c.`is_deleted`='0' and d.`is_deleted`='0' ");

}

function task_user($user_id){
	return $this->db->query("SELECT * FROM `tasks` t inner join `clients` c on t.`client`=c.`client_id` where t.`is_deleted`='0' and c.`is_deleted`='0' and t.`is_active` NOT LIKE '2' and t.`assigned`= $user_id");
	
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
 function add_task($data){
        $this->db->insert('tasks',$data);
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
				SET name = '{$this->input->post('client_name')}', email = '{$this->input->post('email')}',
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
function view_dep($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `departments` where dep_id='$id' order by dep_id desc limit 1" ));
}
function view_client($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `clients` where client_id='$id' order by client_id desc limit 1" ));
}
function view_task($id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `tasks` t inner join `users` u on t.`assigned`=u.`id` inner join `clients` c on t.`client`=c.`client_id` where t.`task_id`='$id' order by t.`task_id` desc limit 1" ));
}


}
