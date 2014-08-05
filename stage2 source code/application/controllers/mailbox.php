<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MailBox extends CI_Controller {

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

    public function index()
    {
        $this->inbox();
    }

    public function inbox()
    {
        $this->member_model->is_login();
		$data['page_view'] = 'web/pages/pg-inbox';
		$this->load->view('web/shared/master',$data);
    }
	
	public function unread()
	{
		$this->member_model->is_login();
		$data['page_view'] = 'web/pages/pg-inbox';
		$data['unread'] = true;
		$this->load->view('web/shared/master',$data);
	}

    public function unread_msg_count()
    {
        $this->member_model->is_login();
        $this->load->view('web/pages/pg-inbox-notifications');
    }
	
	public function unread_msg_detail_count($msg_id = 0,$sender_id=0)
    {
        $this->member_model->is_login();
        $data['sender_id'] = $sender_id;
        $data['msg_id'] = $msg_id;
        $this->load->view('web/pages/pg-inbox-detail-notifications',$data);
    }

    public function msg_detail($msg_id)
    {
        $this->member_model->is_login();

		$this->db_model->update_row('messages',array('status'=>1),array('id'=>$msg_id));

        $data['msg_id'] = $msg_id;
		$data['page_view'] = 'web/pages/pg-inbox-msg-detail';
		$this->load->view('web/shared/master',$data);
    }

    public function unread_msg_detail($msg_id)
    {
        $this->member_model->is_login();

        $this->db_model->update_row('messages',array('status'=>1),array('id'=>$msg_id));

        $data['unread'] = true;
        $data['msg_id'] = $msg_id;
        $data['page_view'] = 'web/pages/pg-inbox-msg-detail';
        $this->load->view('web/shared/master',$data);
    }

    public function delete_msg()
    {
        $this->member_model->is_login();
		
        foreach($this->input->post('msg_id') as $id)
        {
            $this->db_model->delete_row('messages',array('id'=>$id));
        }
		
		$this->session->set_flashdata('response', '<div class="success-box">Selected messages have been deleted.</div>');
        redirect($_SERVER['HTTP_REFERER'],'refresh');
    }

    public function newmsg()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('friend_id', 'Friend', 'required');
            $this->form_validation->set_rules('subject', 'Subject','required');
            $this->form_validation->set_rules('message', 'Message','required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->new_msg_view();
            }
            else
            {
                $vals = $this->input->post();

                unset($vals['btnSubmit'],$vals['friend_id']);

                $vals['date_posted'] = date('Y-m-d h:i:s');
                $vals['status'] = 0;
                $vals['from'] = $this->session->userdata('member_data')->id;
                $vals['to'] = $this->input->post('friend_id');

                $ret_id = $this->db_model->insert_row_retid("messages",$vals);

                if($ret_id>0)
                {
                    $this->session->set_flashdata('response', '<div class="success-box">Your message has been posted successfully.</div>');
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
            $this->new_msg_view();
        }
    }

    private function new_msg_view()
    {
        $data = array(
            'page_title' => "New Message",
            'page_view' => "web/pages/pg-new-msg"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function reply($to)
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('subject', 'Subject','required');
            $this->form_validation->set_rules('message', 'Message','required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->reply_view($to);
            }
            else
            {
                $vals = $this->input->post();

                unset($vals['btnSubmit']);

                $vals['date_posted'] = date('Y-m-d h:i:s');
                $vals['status'] = 0;
                $vals['from'] = $this->session->userdata('member_data')->id;
                $vals['to'] = $this->input->post('to');

                $ret_id = $this->db_model->insert_row_retid("messages",$vals);

                if($ret_id>0)
                {
                    $this->session->set_flashdata('response', '<div class="success-box">Your message has been posted successfully.</div>');
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
            $this->reply_view($to);
        }
    }

    private function reply_view($to)
    {
        $data = array(
            'page_title' => "Reply",
            'page_view' => "web/pages/pg-reply-msg",
            'to'=>$to
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function driftbottle()
    {
        $this->load->view('web/pages/pg-drift-bottle');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */