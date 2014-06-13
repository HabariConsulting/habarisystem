<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('form_validation');		
		$this->load->library('session');
		$this->load->model('quiz_model');
		$this->load->model('ask_model');
		$this->load->model('quote_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		// Load MongoDB library instead of native db driver if required
		$this->config->item('use_mongodb', 'ion_auth') ?
		$this->load->library('mongo_db') :

		$this->load->database();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		$this->load->helper('language');
		$this->load->helper('date');
	}

	//redirect if needed, otherwise display the user list...go back and code this eugene
	 function new_quote(){
				if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
		{
			//redirect them to the home page because they must be an administrator to view this
			$this->session->set_flashdata('message', 'You must be an admin to view this page');
			redirect('auth/index');
		}
		else
		{
		$data= array();
		$identity= $this->session->userdata($this->config->item('identity', 'ion_auth'));
		$this->load->model('ion_auth_model');
            if($query=$this->ion_auth_model->data_info($identity)){
                $data['info']=$query;
            }//$this->session_manager();
        $data['page_location']='Quotes';
		$data['client_fetch']= $this->ask_model->client_fetch();	
		$data['content']='new_quote';
		$data['page_title']='Habari Quotes';
		$data['page_sub_title']='Create Quote';
		$this->load->view('includes/template',$data);
	}

	}
	
	function view_quote(){
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data= array();
		$identity= $this->session->userdata($this->config->item('identity', 'ion_auth'));
		$this->load->model('ion_auth_model');
            if($query=$this->ion_auth_model->data_info($identity)){
                $data['info']=$query;
            }//$this->session_manager();
        $data['page_location']='Quotes';	
		$data['content']='view_quote';
		$data['page_title']='Habari Quotes';
		$data['page_sub_title']='View Quote';
		$this->load->view('includes/template',$data);

	}
	function report($id){
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data= array();
		$identity= $this->session->userdata($this->config->item('identity', 'ion_auth'));
		$this->load->model('ion_auth_model');
            if($query=$this->ion_auth_model->data_info($identity)){
                $data['info']=$query;
            }//$this->session_manager();
        $data['jobsum_report']= $this->ask_model->jobsum_report($id);
        $data['tasksum_report']= $this->ask_model->tasksum_report($id);
        $data['sumtotal_report']= $this->ask_model->sumtotal_report($id);
        $data['page_location']='Quotes';	
		$data['content']='report';
		$data['page_title']='Habari Report';
		$data['page_sub_title']='View Report';
		$this->load->view('includes/template',$data);

	}
	
	function session_manager(){
		
       
		}
		
	function save_quote(){
		//CLIENT DETS'
		/*if(($this->input->post('colorRadio'))=='red'){
			$client_id = $this->input->post('selCSI');
		}elseif(($this->input->post('colorRadio'))=='green'){
			$client_id = $this->quote_model->save_quote_client();
			}
		else {$client_id = 1;}
		//END
		
		//FILL JOB DETS'
		$doc = 'project_brief';
		
        // this is for form field which is an image....
        $config['upload_path'] = './docs/job';
        $config['allowed_types'] = 'doc|jpg|png|pdf|docx|gif|txt|docx';
        $config['max_size'] = '10000000';
        $config['max_width'] = '102400';
        $config['max_height'] = '7680';
        $data['view'] = 'upload';
        $this->upload->initialize($config);
         $upld = $this->upload->do_upload($doc);
        $fname = array('upload_data' => $this->upload->data());
        $project_brief = $fname['upload_data']['file_name'];
		
		$doc2 = 'other_docs';
		$config['upload_path'] = './docs/job';
        $config['allowed_types'] = 'doc|jpg|png|pdf|docx|gif|txt|docx';
        $config['max_size'] = '10000000';
        $config['max_width'] = '102400';
        $config['max_height'] = '7680';
        $data['view'] = 'upload';
        $this->upload->initialize($config);
		$upld = $this->upload->do_upload($doc2);
         $fname = array('upload_data' => $this->upload->data());
        $other_docs = $fname['upload_data']['file_name'];
		
		
		$job_id = $this->quote_model->save_quote_job($other_docs,$project_brief,$client_id);
		//END
	 	redirect('quote/job_two/'.$job_id);*/
	}
	function job_two($job_id){
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data= array();
		$identity= $this->session->userdata($this->config->item('identity', 'ion_auth'));
		$this->load->model('ion_auth_model');
            if($query=$this->ion_auth_model->data_info($identity)){
                $data['info']=$query;
            }//$this->session_manager();
		$data['page_location']='Quotes';	
		$data['job']=$this->quote_model->get_job($job_id);
		$data['dept_fetch']= $this->quote_model->dept_fetch();
		$data['content']='view_job_stptwo';
		$data['page_title']='Habari Quotes';
		$data['page_sub_title']='New Quote';
		$this->load->view('includes/template',$data);
		}
		
		function save_task(){
			$job_id= $this->input->post('job_id');
			
			$query = $this->quote_model->save_quote_job_task($job_id);
			redirect('quote/job_three/'.$job_id);
			
		}
		
		function job_three($job_id){
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		$data= array();
		$identity= $this->session->userdata($this->config->item('identity', 'ion_auth'));
		$this->load->model('ion_auth_model');
            if($query=$this->ion_auth_model->data_info($identity)){
                $data['info']=$query;
            }//$this->session_manager();
		$data['page_location']='Quotes';	
		$data['job']=$this->quote_model->get_job($job_id);
		$data['dept_fetch']= $this->quote_model->dept_fetch();
		$data['content']='view_job_stptwo';
		$data['success']='Task has been added successfully. Add more tasks ?';
		$data['page_title']='Habari Quotes';
		$data['page_sub_title']='New Quote';
		$this->load->view('includes/template',$data);
		}
	

}