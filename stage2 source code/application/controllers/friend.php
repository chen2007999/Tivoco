<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Friend extends CI_Controller {

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
        redirect(base_url(),'refresh');
    }

    public function add($id)
    {
        $this->member_model->is_login();

        $is_request_sent = $this->db_model->get_row('friends',array('friend_id'=>$id,'member_id'=>$this->session->userdata('member_data')->id));

        if($is_request_sent)
        {
            $this->add_friend_view('The friend request has already been sent to this member.');
        }
        else
        {
            $this->db_model->insert_row_retid('friends',array('friend_id'=>$id,'member_id'=>$this->session->userdata('member_data')->id,'request_date'=>date('Y-m-d h:i:s'),'status'=>'Pending'));
            $this->add_friend_view('Your request has been sent successfully');
        }
    }

    private function add_friend_view($msg)
    {
        $data = array(
            'page_title' => "Add Friend",
            'page_view' => "web/pages/pg-friend-add",
            'message' => $msg
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function requests()
    {
        $this->requests_view();
    }

    private function requests_view()
    {
        $data = array(
            'page_title' => "Following members are waiting for the approval",
            'page_view' => "web/pages/pg-friend-requests"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }
	
	public function accept($friend_id)
    {
       $this->db_model->update_row('friends',array('status'=>'Accept'),array('friend_id'=>$friend_id,'member_id'=>$this->session->userdata('member_data')->id));
       $this->session->set_flashdata('response', '<div class="success-box">The friend has been added to your list.</div>');
       redirect($_SERVER['HTTP_REFERER'],'refresh');

    }
	
	public function remove_friend()
	{
		if($this->input->post())
		{
			$this->db_model->delete_row('messages',array('from'=>$this->input->post('friend_id')));
			$this->db_model->delete_row('friends',array('friend_id'=>$this->input->post('friend_id')));
			$this->session->set_flashdata('response', '<div class="success-box">The friend and related messages are deleted.</div>');
        	redirect(base_url().'mailbox','refresh');			
		}
		else
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */