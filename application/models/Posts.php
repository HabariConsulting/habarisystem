<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Posts extends CI_Model
{
       
        function __construct()
        {
                parent::__construct();
 
        }
 		
		function get_posts()
		{
			return $this->db->get('posts')->result();
		}		
		
		function get_posts_by_id($postId)
		{
            $query = $this->db->get_where('posts', array('id' => $postId));
			return $query->row_array();
		}
 
        function insert_post($data){
			$this->db->insert('posts', $data);
			return;
        }
 
        function update_post($postId, $data){
                $id = $postId;         
                $this->db->where('id',$id);
                $this->db->update('posts', $data);
                return;
        }
 
        function delete_post($postId){
                $id = $postId;         
                $this->db->delete('posts',array('id' => $id));
                return;
        }
		
		
		function publish_post($postId){
		  $sql = "UPDATE posts
			SET published=1 
			WHERE id=".$postId;
		  
		  $query = $this->db->query($sql);
		  
		  if ($query){
		   return 0;
		  }
		  else{
		   return 1;
		  }
		 }
		 function unpublish_post($postId){
		  $sql = "UPDATE posts
			SET published=0 
			WHERE id=".$postId;
		  
		  $query = $this->db->query($sql);
		  
		  if ($query){
		   return 0;
		  }
		  else{
		   return 1;
		  }
		 }	

		/****** Events controller fuctios *******/
		
		
		//Insert Event
		public function create_event($data){
			$this->db->insert('events',$data);
			return;
		}
		
		public function delete_event(){
			$this->db->where('id',$this->uri->segment(3));
			$this->db->delete('events');
			return;
		}
		
		public function update_event($eventId, $data){
			$id = $eventId;         
			$this->db->where('id',$id);
			$this->db->update('events', $data);
			return;
		}	

		public function get_events(){
			$query=$this->db->get('events');
			return $query->result();
		}	

		public function get_event_by_id($eventId){		
			$query = $this->db->get_where('events', array('id' => $eventId));
			return $query->row_array();		
		}		


		function publish_event($eventsId){
		  $sql = "UPDATE events
			SET published=1 
			WHERE id=".$eventsId;
		  
		  $query = $this->db->query($sql);
		  
		  if ($query){
		   return 0;
		  }
		  else{
		   return 1;
		  }
		 }
		 function unpublish_event($eventsId){
		  $sql = "UPDATE events
			SET published=0 
			WHERE id=".$eventsId;
		  
		  $query = $this->db->query($sql);
		  
		  if ($query){
		   return 0;
		  }
		  else{
		   return 1;
		  }
		 }			
				
		
}