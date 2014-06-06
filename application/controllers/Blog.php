<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
			
			$this->load->library('ion_auth');
			$this->load->library('form_validation');
			$this->load->helper('url','date','calendar');

			// Load MongoDB library instead of native db driver if required
			$this->config->item('use_mongodb', 'ion_auth') ?
			$this->load->library('mongo_db') :
			$this->load->database();
			$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
			$this->lang->load('auth');
			$this->load->helper('language');				
			$this->load->model('Posts');
		
	}
	
	
	// nEWS C

	function index() {
		
		$data['post'] = $this->Posts->get_posts();
		$data['page_location']='Dashboard';	
		$data['content']='admin/index';
		$data['page_title']='SEP News ';
		$data['page_sub_title']='School Engagement Program News Management';
		$this->load->view('includes/template',$data);
			
		 
	}

	
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('content', 'text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['content']='admin/create';
			//$this->load->view('admin/create');
			$data['page_location']='Dashboard';	
			$data['page_title']='SEP News ';
			$data['page_sub_title']='School Engagement Program News Management';
			$this->load->view('includes/template',$data);
		}
		else
		{
	
			$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'published'=>$this->input->post('published')
			);
		
			$this->Posts->insert_post($data);
			//$this->load->view('admin/create');
			echo "Done";
			redirect('Blog/index');
		}
		

	}
		

	
	function edit($postId){	
		
		$postId=$this->uri->segment(3);
		$data['post'] = $this->Posts->get_posts_by_id($postId);
		$this->form_validation->set_rules('title','title','required');
		$this->form_validation->set_rules('content','content','required');

		if($this->form_validation->run()==FALSE)
		{
			//$this->load->view('admin/edit',$data);
			$data['content']='admin/edit';

		} else {			
			$data = array(
				 'title' => $this->input->post('title'),
				 'content' =>$this->input->post('content')
			);	
			
			$this->Posts->update_post($this->uri->segment(3),$data);
			$data['content']='admin/index';
			$data['post'] = $this->Posts->get_posts();
		}
		$data['page_location']='Dashboard';	
		$data['page_title']='Edit SEP News';
		$data['page_sub_title']='School Engagement Program News Management';
		$this->load->view('includes/template',$data);
		
	}
	

	function delete($postId){
		$this->Posts->delete_post($postId);
		redirect('admin');
	}
	
	public function publish_post($postId)
    {        
        $QUERY= $this->Posts->publish_post($postId);
        $data= array();
		
		if($query=$this->Posts->get_posts($postId)){
			$data['post']=$query;
		}        
       redirect('Blog/index');
        //$data["content"]='projects';
       // $this->load->view('includes/admin_template',$data);            
    }
    public function unpublish_post($postId)
    {
        $QUERY= $this->Posts->unpublish_post($postId);
		redirect('Blog/index');
       // $data= array();
		
		//if($query=$this->Posts->get_posts($postId)){
			//$data['post']=$query;
		//}

           		   
    }	
	
	
	/***************************Evets Module*****************/
	
	// Events Create
    public function create_event()
    {
		//set validatio rules
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start_date', 'start date', 'required');	
		$this->form_validation->set_rules('end_date', 'end date', 'required');		
		$this->form_validation->set_rules('description', 'Description', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data['content']='admin/events_create';
			//$this->load->view('admin/eve');
			$data['page_location']='Dashboard';	
			$data['page_title']='SEP News ';
			$data['page_sub_title']='School Engagement Program News Management';
			$this->load->view('includes/template',$data);
		}
		else{
		
			$data=array(
				'title'=>$this->input->post('title'),
				'start_date'=>$this->input->post('start_date'),
				'end_date'=>$this->input->post('end_date'),
				'description'=>$this->input->post('description')
			);
			
			$this->Posts->create_event($data);
		
			echo "Done";
			redirect('Blog/index');
		}		
		
		
		
    }	
	
	
	function edit_event($eventId){	
		
		$eventId=$this->uri->segment(3);
		$data['event'] = $this->Posts->get_event_by_id($eventId);
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('start_date', 'start date', 'required');	
		$this->form_validation->set_rules('end_date', 'end date', 'required');		
		$this->form_validation->set_rules('description', 'Description', 'required');

		if($this->form_validation->run()==FALSE)
		{
			//$this->load->view('admin/edit',$data);
			$data['content']='admin/events_edit';
		} else {			
			$data = array(
				'title'=>$this->input->post('title'),
				'start_date'=>$this->input->post('start_date'),
				'end_date'=>$this->input->post('end_date'),
				'description'=>$this->input->post('description')
			);	
			
			$this->Posts->update_event($this->uri->segment(3),$data);
			$data['records'] = $this->Posts->get_events();
			$data['content']='admin/events_options';
		}
		$data['page_location']='Dashboard';	
		$data['page_title']='Edit Events';
		$data['page_sub_title']='School Engagement Program News Management';
		$this->load->view('includes/template',$data);
		
	}
		
	
	
	// Events Delete
    public function delete_event($data)
    {
		$id=$this->uri->segment(3);
		$this->Posts->delete_event($data);
    }	
	
	
	// Events View All
    public function view_events()
    {
		$data=array();
		
		if($query = $this->Posts->get_events())
		{
			$data['records']=$query;			
		}
		
		$data['page_location']='Dashboard';	
		$data['content']='admin/events_options';
		$data['page_title']='Events ';
		$data['page_sub_title']='School Engagement Program Events';
		$this->load->view('includes/template',$data);
		
		//$this->load->view('admin/events_options',$data);
    }		
	
	// Events View All
    public function view_events_single()
    {
		$data=array();
		
		if($query = $this->Posts->get_events())
		{
			$data['records']=$query;			
		}
		
		$data['page_location']='Dashboard';	
		$data['content']='admin/events_options';
		$data['page_title']='Events ';
		$data['page_sub_title']='School Engagement Program Events';
		$this->load->view('includes/template',$data);
		
    }		
		
	
	
	public function publish_event($eventsId)
    {        
        $QUERY= $this->Posts->publish_event($eventsId);
        $data= array();
		
		//if($query=$this->Posts->get_posts($eventsId)){
			//$data['post']=$query;
		//}        
       redirect('Blog/index');
        //$data["content"]='projects';
       // $this->load->view('includes/admin_template',$data);
        
    
    }
    public function unpublish_event($eventsId)
    {
        $QUERY= $this->Posts->unpublish_event($eventsId);
		redirect('Blog/index');
       // $data= array();
		
		//if($query=$this->Posts->get_posts($postId)){
			//$data['post']=$query;
		//}

           		   
    }	
			
		
		
	function logout(){
		redirect ('/auth/logout');
	}

}
