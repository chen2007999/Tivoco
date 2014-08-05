<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	 
	public function index()
	{
        $page_data = $this->db_model->get_row('content',array('id'=>150));

        $data = array(
            'page_title' => $page_data->title,
            'page_data' =>  $page_data,
            'content_width'=>1200,
            'page_view' => "web/pages/pg-content"
        );

        $this->load->view('web/shared/master',$data);
	}

    public function about()
    {
        $page_data = $this->db_model->get_row('content',array('id'=>146));

        $data = array(
            'page_title' => $page_data->title,
            'page_data' =>  $page_data,
            'page_view' => "web/pages/pg-content",
            'feedback_form' => true
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function contact()
    {
        $page_data = $this->db_model->get_row('content',array('id'=>147));

        $data = array(
            'page_title' => $page_data->title,
            'page_data' =>  $page_data,
            'page_view' => "web/pages/pg-content"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function privacy_policy()
    {
        $page_data = $this->db_model->get_row('content',array('id'=>148));

        $data = array(
            'page_title' => $page_data->title,
            'page_data' =>  $page_data,
            'page_view' => "web/pages/pg-content"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function terms()
    {
        $page_data = $this->db_model->get_row('content',array('id'=>149));

        $data = array(
            'page_title' => $page_data->title,
            'page_data' =>  $page_data,
            'page_view' => "web/pages/pg-content"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function top_nav()
    {
        $this->load->view('web/pages/top_nav');
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */