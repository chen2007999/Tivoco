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
        // Your own constructor code
    }

    public function index($x=0)
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('comments', 'Comments', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->feedback_view($x);
            }
            else
            {
                $vals = $this->input->post();

                unset($vals['btnSubmit']);

                $vals['date_posted'] = date('Y-m-d h:i:s');

                $ret_id = $this->db_model->insert_row_retid("feedback",$vals);

                if($ret_id>0)
                {
                    $this->session->set_flashdata('response', '<div class="error-box">Thank you, your feedback has been submitted.</div>');
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }
                else
                {
                    $this->session->set_flashdata('response', '<div class="error-box">Request can not be processed at the moment, please try again later.</div>');
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }

            }
        }
        else
        {
            $this->feedback_view($x);
        }
    }

    private function feedback_view($x)
    {
        $data = array(
            'page_title' => "Feedback",
            'page_view' => "web/pages/pg-feedback-form"
        );

        if($x==0)
        {
            $data['div_padding'] = false;
        }

        $this->load->view('web/shared/popupmaster',$data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */