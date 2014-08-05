<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Universities extends CI_Controller {

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
				'page_title' => "Universities Management",
				'page_view' => "administration/pages/pg-universities-view"
				);
														
		$this->load->view('administration/shared/master',$data);
	}
	
	public function grid()
	{
		$query = "select uni_name,domain,phone_no,status,DATE_FORMAT(last_modified, '%a, %M %d, %Y') as date_modified, id as ed, id as dl  from {PRE}universities order by id desc";
		$data = $this->db_model->sql($query);		
		echo $this->gridmodel->output($data);
	}	
	
	
	private function intialize_form()
	{
		$values = (object) array(
				 'id' => '',
				 'uni_name' => '',
				 'domain'=>'',
				 'phone_no'=>'',
                 'address' => '',
                 'notes' =>'',
				 'status'=>''
				);
										
		return $values;
	}	
	
	private function validate($case = 'add')
	{
		$this->load->library('form_validation');
        $this->form_validation->set_rules('address','','');
        $this->form_validation->set_rules('notes', '', '');
        $this->form_validation->set_rules('phone_no', '', '');

		$this->form_validation->set_rules('uni_name','University','required');

        $is_unique = '|is_unique[universities.domain]';

        if($case == 'edit')
        {
            if($this->input->post('domain') == $this->db_model->get_row('universities',array('id'=>$this->input->post('id')))->domain)
            {
                $is_unique =  '';
            }
            else
            {
                $is_unique = '|is_unique[universities.domain]';
            }
        }

		$this->form_validation->set_rules('domain', 'Domain', 'required|'.$is_unique.'');
        $this->form_validation->set_rules('status', 'Status', 'required');
		return $this->form_validation->run();
	}
	
	private function verify_pk($id)
	{
		$res = $this->db_model->get_row('universities',array('id'=>$id));
						
		if(!$res)
		{						
			$this->session->set_flashdata('response', '<div class="error-box">Bad request found.</div>');
			redirect(base_url().'administration/universities/add', 'refresh');
		}		
	}
	
	public function edit($id = 0)
	{
        $vals = "";

		if($this->input->post('id'))
		{
			$id = $this->input->post('id');
			$vals = $this->input->post();
		}	
		
		$this->verify_pk($id);
		
		if($this->input->post() && $this->validate('edit'))
		{
			unset($vals['btnSubmit']);
			
			$vals['last_modified'] = date('Y-m-d h:i:s');
			
			$where = array('id' => $id);	
				
			$res = $this->db_model->update_row('universities',$vals,$where);
			
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
			$uni_data= $this->db_model->get_row('universities',array('id'=>$id));
		
			$data = array(
				'page_title' => "Edit University",
				'page_view' => "administration/pages/pg-universities-edit",
				'error' => $this->error,
				'row'=> $uni_data,
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

            $vals['date_added'] = date('Y-m-d h:i:s');
			$vals['last_modified'] = date('Y-m-d h:i:s');

			$ret_id = $this->db_model->insert_row_retid("universities",$vals);
		
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
				'page_title' => "Add University",
				'page_view' => "administration/pages/pg-universities-edit",
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
		
		$res = $this->db_model->delete_row("universities",array('id'=>$id));
		
		if($res)
		{
			$this->session->set_flashdata('response', '<div class="success-box">Selected record has been deleted.</div>');
			redirect(base_url().'administration/universities', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('response', '<div class="error-box">Request can not be processed at the moment, please try again later.</div>');
			redirect(base_url().'administration/universities', 'refresh');
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */