<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Resources_model extends CI_Model
{
		var $gallery_path;
		

        function __construct()
        {
            parent::__construct();
			$this->gallery_path=realpath(APPPATH. '../uploads');					
        }			
		
		public function record_count() {
			return $this->db->count_all("resources");
		}				
		
		
		//Insert Resource
		public function create_resource($data){
		
			$this->db->insert('resources',$data);
			return;
		}
		
		
		public function delete_resource(){
			$this->db->where('id',$this->uri->segment(3));
			$this->db->delete('resources');
			return;
		}
		
		public function update_resource($resourceId, $data){
			$id = $resourceId;         
			$this->db->where('res_id',$id);
			$this->db->update('resources', $data);
			return;
		}	

		
		public function get_resources($start,$page){
			$query=$this->db->get('resources');
			return $query->result();
		}	

		
		public function get_resource_by_id($resourceId){		
			$query = $this->db->get_where('resources', array('res_id' => $resourceId));
			return $query->row_array();		
		}			
		
		
		function publish_resource($resourceId){
		  $sql = "UPDATE resources
			SET published=1 
			WHERE res_id=".$resourceId;
		  
		  $query = $this->db->query($sql);
		  
		  if ($query){
		   return 0;
		  }
		  else{
		   return 1;
		  }
		 }
		 
		 
		 function unpublish_resource($resourceId){
		  $sql = "UPDATE resources
			SET published=0 
			WHERE res_id=".$resourceId;
		  
		  $query = $this->db->query($sql);
		  
		  if ($query){
		   return 0;
		  }
		  else{
		   return 1;
		  }
		 }	
		
				
}