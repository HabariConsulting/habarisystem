<?php 
class Resources extends CI_Controller
{

	var $gallery_path;

	public function __construct()
   {
		parent::__construct();
		$this->load->model('resources_model');
		$this->gallery_path=realpath(APPPATH. '../uploads/');
		
   }

	function index() {
		
		$this->load->library('pagination');

		$config['base_url'] = 'http://localhost:8080/sep/index.php/resources/index';
		$config['total_rows'] = 50;
		$config['per_page'] = 10; 

		$this->pagination->initialize($config); 

		$start=	$config['per_page'];			
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;			
		$data=array();	
		$data['links']=$this->pagination->create_links();								
		$data['records'] = $this->resources_model->get_resources($start,$page);
		$data['page_location']='Dashboard';	
		$data['content']='admin/resource_options';
		$data['page_title']='SEP News ';
		$data['page_sub_title']='School Engagement Program News Management';		
		$this->load->view('includes/template',$data);
					 
	}
	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['title'] = 'Add a Resourse';

		$this->form_validation->set_rules('title', 'Title', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['content']='admin/resource_create';
			$data['page_location']='Dashboard';	
			$data['page_title']='SEP News ';
			$data['page_sub_title']='School Engagement Program News Management';
			$this->load->view('includes/template',$data);
		}
		else
		{							
			if ($this->input->post('upload')){		
				$resource_file = 'resource_file';
				
				$config=array(
					'allowed_types'=> 'jpg|gif|png|pdf|doc|docx|ppt|pptx|xls|xlsx',
					'upload_path'=>$this->gallery_path,
					'max_size'=>10000
				);
				
				$this->upload->initialize($config);
				$this->upload->do_upload($resource_file);

				$resource_nam = array('upload_data' => $this->upload->data());
				$resource_path = $resource_nam['upload_data']['file_name'];
				
				echo $resource_path;
				if ( ! $this->upload->do_upload($resource_file))
				{
					echo $this->upload->display_errors();
				}
				else
				{
					$this->session->set_flashdata('message', 'The Resource Has been uploaded');
				}
			}
					
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'url'=>$this->input->post('url'),
				'resource_name'=>'/uploads/'.$resource_path,						
				'published'=>$this->input->post('published')
			);			
			
			$this->resources_model->create_resource($data);
			redirect('index');

		}
		
	}
		

		

   
	
	
	function edit_resource($resourceId){	
		
		$resourceId=$this->uri->segment(3);
		$data['resourc'] = $this->resources_model->get_resource_by_id($resourceId);
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		//$this->form_validation->set_rules('start_date', 'start date', 'required');	
		//$this->form_validation->set_rules('end_date', 'end date', 'required');		
		$this->form_validation->set_rules('description', 'Description', 'required');

		if($this->form_validation->run()==FALSE)
		{
			//$this->load->view('admin/edit',$data);
			$data['content']='admin/resource_edit';
		} else {			
			$data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'url'=>$this->input->post('url'),
				'resource_name'=>$this->input->post('resource_file'),					
				'published'=>$this->input->post('published')
			);	
			
			$this->resources_model->update_resource($this->uri->segment(3),$data);
			$data['records'] = $this->resources_model->get_resources();
			$data['content']='admin/resource_options';
		}
		$data['page_location']='Dashboard';	
		$data['page_title']='Resources';
		$data['page_sub_title']='School Engagement Program Resource Management';
		$this->load->view('includes/template',$data);
		
	}	
	

	function delete($resourceId){
		$this->Posts->delete_post($resourceId);
		redirect('index');
	}

	
	public function publish_resource($resourceId)
    {        
        $QUERY= $this->resources_model->publish_resource($resourceId);
        $data= array();
		
		//if($query=$this->Posts->get_posts($resourceId)){
			//$data['post']=$query;
		//}        
       redirect('resources/index');
        //$data["content"]='projects';
       // $this->load->view('includes/admin_template',$data);
        
    
    }
    public function unpublish_resource($resourceId)
    {
        $QUERY= $this->resources_model->unpublish_resource($resourceId);
		redirect('resources/index');
       // $data= array();
		
		//if($query=$this->Posts->get_posts($resourceId)){
			//$data['post']=$query;
		//}

           		   
    }		
		
	
}	