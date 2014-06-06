<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Quiz Model
*
* Author:  Kariuki Keith
* 		   keithkenyan@gmail.com
*
*
*
* Created:  10.01.2014
**/

class quiz_model extends CI_Model
{
 	function save_quiz_details($test_video){
 		        $question_number = $this->input->post('question_number');
				$question = $this->input->post('question');
				$A_option = $this->input->post('A_option');
				$B_option = $this->input->post('B_option');	
				$C_option = $this->input->post('C_option');
				$D_option = $this->input->post('D_option');
				$answer = $this->input->post('answer');
		$data = array(
		
		'Quiz_title'=>$this->input->post('Quiz_title'),
		'Quiz_desc'=>$this->input->post('Quiz_desc'),
		'Quiz_date_set'=>now(),
		'Quiz_active_date'=>$this->input->post('Quiz_active_date'),
 		'Quiz_expiry_date'=>$this->input->post('Quiz_expiry_date'),
		'quiz_test_video'=>$test_video,
		'Quiz_is_complete'=>0
		);
	
		$this->db->insert('quiz', $data);
		$Quiz_id = $this->db->insert_id();
		//echo $Quiz_id;die();
		$this->save_quiz_questions($Quiz_id, $question_number, $question, $A_option, $B_option, $C_option, $D_option,$answer);

	}
	 
	 function save_quiz_questions($Quiz_id, $question_number, $question, $A_option, $B_option, $C_option, $D_option,$answer){
		$x = count($question_number);
        for ($m = 0; $m < $x; $m++) {
            $relation[] = array(
				'Quiz_id' => $x,
				'question_number' => $question_number[$m],
				'question' => $question[$m],
				'A_option' => $A_option[$m],
				'B_option' => $B_option[$m],	
				'C_option' => $C_option[$m],
				'D_option' => $D_option[$m],
				'answer' => $answer[$m]
            );
			 
        }
        return $this->db->insert_batch('quiz_questions', $relation);
		
		
		 
	}
function quiz_fetch(){
	return $this->db->query("SELECT * FROM `quiz` where is_deleted=0");
}
function view_complete_quiz1($quiz_id){
	return mysql_fetch_assoc(mysql_query("SELECT * FROM `quiz` where Quiz_id='$quiz_id' order by Quiz_id desc limit 1" ));
}

function view_complete_quiz2($quiz_id){
	return $this->db->query("SELECT * FROM `quiz_questions` where Quiz_id= '$quiz_id' order by question_number asc");
}
function activate_quiz($quiz_id){
		$sql = "UPDATE quiz
				SET is_activated=1 
				WHERE Quiz_id=".$quiz_id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
function delete_quiz($quiz_id){
		$sql = "UPDATE quiz
				SET is_deleted=1 
				WHERE Quiz_id=".$quiz_id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}


function deactivate_quiz($quiz_id){
		$sql = "UPDATE quiz
				SET is_activated=0 
				WHERE Quiz_id=".$quiz_id;
		
		$query = $this->db->query($sql);
		
		if ($query){
			return 0;
		}
		else{
			return 1;
		}	
}
}
