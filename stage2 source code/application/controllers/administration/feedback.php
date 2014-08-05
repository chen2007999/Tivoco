<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	private $error = "";
	 
    public function __construct()
    {
		parent::__construct();
		
		$this->admin_model->is_login();
        $this->admin_model->role_validator('');
		
		// Your own constructor code    	
	}	
	 
	public function index()
	{          
            $data = array(
				'page_title' => "Feedback Management",
				'page_view' => "administration/pages/pg-feedback-view"
				);
														
		$this->load->view('administration/shared/master',$data);
	}
	
	public function grid()
	{
		$query = "select CONCAT(first_name,' ',last_name) as name, email,  comments, DATE_FORMAT(date_posted, '%a, %M %d, %Y') as date, id as dl  from {PRE}feedback order by id desc";
		$data = $this->db_model->sql($query);		
		echo $this->gridmodel->output($data);
	}	
	
	
	private function intialize_form()
	{
		$values = (object) array(
                    'id' => '',
                    'first_name' => '',
                    'last_name'=>'',
                    'email'=>'',
                    'comments'=>''
				);

		return $values;
	}	
	
	private function validate()
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('first_name','First Name','required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required}|valid_email');
        $this->form_validation->set_rules('comments', 'Comments', 'required');
        return $this->form_validation->run();
	}
	
	private function verify_pk($id)
	{
		$res = $this->db_model->get_row('feedback',array('id'=>$id));
						
		if(!$res)
		{						
			$this->session->set_flashdata('response', '<div class="error-box">Bad request found.</div>');
			redirect(base_url().'administration/feedback/add', 'refresh');
		}		
	}
	
	public function edit($id = 0)
	{
		if($this->input->post('id'))
		{
			$id = $this->input->post('id');
			$vals = $this->input->post();
		}	
		
		$this->verify_pk($id);
		
		if($this->input->post() && $this->validate())
		{
			unset($vals['btnSubmit']);
			
			$vals['date_posted'] = date('Y-m-d h:i:s');

			$where = array('id' => $id);	
				
			$res = $this->db_model->update_row('feedback',$vals,$where);
			
			if($res)
			{
				$this->session->set_flashdata('response', '<div class="success-box">Information has been modified.</div>');
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			}
			else
			{
				$this->session->set_flashdata('response', '<div class="error-box">Request can not be processed at the moment, please try again later.</div>');
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			}
		}
		else
		{
			$fb_data= $this->db_model->get_row('feedback',array('id'=>$id));
		
			$data = array(
				'page_title' => "Edit Feedback",
				'page_view' => "administration/pages/pg-feedback-edit",
				'error' => $this->error,
				'row'=> $fb_data,
                'view_only' => true
				);
																					
			$this->load->view('administration/shared/master',$data);
		}	
	
	}
	
	public function add()
	{
		$vals = $this->input->post();

		if($this->input->post() && $this->validate())
		{
			unset($vals['btnSubmit']);
							
			$vals['date_posted'] = date('Y-m-d h:i:s');

            $ret_id = $this->db_model->insert_row_retid("feedback",$vals);
		
			if($ret_id>0)
			{
				$this->session->set_flashdata('response', '<div class="success-box">Information has been added.</div>');
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			}
			else
			{
				$this->session->set_flashdata('response', '<div class="error-box">Request can not be processed at the moment, please try again later.</div>');
				redirect($_SERVER['HTTP_REFERER'],'refresh');
			}
		}
		else
		{
							
			$data = array(
				'page_title' => "Add Feedback",
				'page_view' => "administration/pages/pg-feedback-edit",
				'error' => $this->error,
				'row'=> $this->intialize_form(),
                'view_only' => true
				);
																					
			$this->load->view('administration/shared/master',$data);
		}	
	}		

	public function del($id = 0)
	{
		$this->verify_pk($id);
		
		$res = $this->db_model->delete_row("feedback",array('id'=>$id));
		
		if($res)
		{
			$this->session->set_flashdata('response', '<div class="success-box">Selected record has been deleted.</div>');
			redirect(base_url().'administration/feedback', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('response', '<div class="error-box">Request can not be processed at the moment, please try again later.</div>');
			redirect(base_url().'administration/feedback', 'refresh');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */