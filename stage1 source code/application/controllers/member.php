<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

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

    public function signup()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('eml','','');
            $this->form_validation->set_rules('domain','','');

            /*$this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');*/

            $this->form_validation->set_rules('user_name', 'User Name', 'required|is_unique[members.user_name]');
            $this->form_validation->set_message('is_unique', 'The %s is already taken, please try a different one.');

            $_POST['email'] = $this->input->post('eml').'@'.$this->input->post('domain');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[members.email]');
            $this->form_validation->set_message('is_unique', 'The %s is already taken, please try a different one.');

            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            $this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');

            if ($this->form_validation->run() == FALSE)
            {
                $this->signup_view();
            }
            else
            {
                $vals = $this->input->post();

                unset($vals['confirm_password'],$vals['btnSubmit'],$vals['domain'],$vals['eml']);

                $vals['registeration_date'] = date('Y-m-d h:i:s');
                $vals['last_modified'] = date('Y-m-d h:i:s');
                $vals['activation_code'] = substr(md5(uniqid(rand(), true)),0,20);
                $vals['email'] = $this->input->post('eml').'@'.$this->input->post('domain');

                $ret_id = $this->db_model->insert_row_retid("members",$vals);

                if($ret_id>0)
                {
                    $this->thankyou($vals);
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
            $this->signup_view();
        }
    }

    private function signup_view($pg_data = "")
    {
        $data = array(
            'pg_data' => $pg_data,
            'page_title' => "Sign Up",
            'page_view' => "web/pages/pg-member-signup"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    private function thankyou($vals)
    {
        $activation_url = base_url()."member/activate/".$vals['activation_code'];

        $to = $vals['email'];

        $email_temp = $this->db_model->get_row('email_templates',array('id'=>1));

        $subject = $email_temp->subject;

        $body = $email_temp->content;

        $body = str_replace('{first_name}',$vals['user_name'],$body);
        $body = str_replace('{activation_url}',$activation_url,$body);

        $this->notificationmodel->send_email_no_template("",$to,$subject,$body);

        $data = array(
            'page_title' => "Thank You",
            'pg_data' => $vals,
            'page_view' => "web/pages/pg-member-thankyou"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function activate($activation_code = "")
    {

        $page_data = $this->db_model->get_row('content',array('id'=>150));

        $data = array(
            'page_title' => $page_data->title,
            'page_data' =>  $page_data,
            'page_view' => "web/pages/pg-content",
            'activation_popup' => true,
            'activation_code' => $activation_code
        );

        $this->load->view('web/shared/master',$data);
    }

    public function confirm_activation($activation_code = "")
    {
        if(strlen($activation_code) != "20")
        {
            //$this->session->set_flashdata('response', '<div class="error-box">There is an issue with the activation code, please try again later.</div>');
            $this->confirm_activation_view('There is an issue with the activation code, please try again later.');
        }
        else
        {
            $mem_data = $this->db_model->get_row('members',array('activation_code'=>$activation_code));
            if($mem_data)
            {
                if($mem_data->status == "Pending Confirmation")
                {
                    $this->db_model->update_row('members',array('last_modified'=>date('Y-m-d h:i:s'),'status'=>'Active'),array('activation_code'=>$activation_code));

                    $to = $mem_data->email;

                    $email_temp = $this->db_model->get_row('email_templates',array('id'=>3));

                    $subject = $email_temp->subject;

                    $body = $email_temp->content;

                    $body = str_replace('{first_name}',$mem_data->first_name,$body);

                    $this->notificationmodel->send_email_no_template("",$to,$subject,$body);

                    //$this->session->set_flashdata('response', '<div class="success-box">Thank you, your account has been verified and activated.</div>');
                    //redirect(base_url(),'refresh');
                    $this->confirm_activation_view('Thank you, your account has been verified and activated.');

                    $this->create_session($mem_data->user_name,$mem_data->password);
                }
                else
                {
                    //$this->session->set_flashdata('response', '<div class="error-box">Your account is already verified.</div>');
                    $this->confirm_activation_view('Your Account is already verified');
                }
            }
            else
            {
                // $this->session->set_flashdata('response', '<div class="error-box">We are sorry, we are unable to found your account information.</div>');
                //redirect(base_url(),'refresh');
                $this->confirm_activation_view('We are sorry, we are unable to found your account information.');
            }
        }
    }

    public function confirm_activation_view($msg = "")
    {
        $data = array(
            'msg' => $msg,
            'page_title' => "Member Activation",
            'page_view' => "web/pages/pg-member-activate"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function signin()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->signin_view();
            }
            else
            {
                $vals = $this->input->post();
                $this->create_session($vals['user_name'],$vals['password']);
            }
        }
        else
        {
            $this->signin_view();
        }
    }

    private function signin_view($pg_data = "")
    {
        $data = array(
            'pg_data' => $pg_data,
            'page_title' => "Sign In",
            'page_view' => "web/pages/pg-member-signin"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    private function create_session($user_name='',$password='')
    {
        $mem_data = $this->db_model->get_row("members",array('user_name'=>$user_name,'password'=>$password));

        if($mem_data)
        {
            if($mem_data->status == "Pending Confirmation")
            {
                $this->session->set_flashdata('response', '<div class="error-box">Your account has not been verified yet.</div>');
                redirect($_SERVER['HTTP_REFERER'],'refresh');
            }
            else if($mem_data->status == "Suspended")
            {
                $this->session->set_flashdata('response', '<div class="error-box">Your account is suspended by the site admin.</div>');
                redirect($_SERVER['HTTP_REFERER'],'refresh');
            }
            else if($mem_data->status == "Active")
            {
                $this->session->set_userdata('member_data',$mem_data);

                $dta = array();

                $dta['ip'] = $this->input->ip_address();
                $dta['last_login'] = date('Y-m-d h:i:s');
                $dta['visits'] = $this->session->userdata('member_data')->visits+1;

                $where = array();

                $where['email'] = $this->session->userdata('member_data')->email;

                $this->db_model->update_row('members',$dta,$where);

                if($this->member_model->is_profile_completed())
                {
                    ?>
                    <script>self.parent.location.reload();</script>
                <?PHP
                }
                else
                {
                    redirect(base_url()."member/profile",'refresh');
                }

            }
        }
        else
        {
            $this->session->set_flashdata('response', '<div class="error-box">Wrong credentials found, please try again.</div>');
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        }

    }

    public function forgotpassword()
    {
        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->forgotpassword_view();
            }
            else
            {
                $vals = $this->input->post();
                unset($vals['btnSubmit']);

                $mem_data = $this->db_model->get_row("members",$vals);

                if($mem_data)
                {
                    $to = $mem_data->email;

                    $email_temp = $this->db_model->get_row('email_templates',array('id'=>2));

                    $subject = $email_temp->subject;

                    $body = $email_temp->content;

                    $body = str_replace('{first_name}',$mem_data->first_name,$body);
                    $body = str_replace('{last_name}',$mem_data->last_name,$body);
                    $body = str_replace('{user_name}',$mem_data->user_name,$body);
                    $body = str_replace('{email}',$mem_data->email,$body);
                    $body = str_replace('{password}',$mem_data->password,$body);

                    $this->notificationmodel->send_email_no_template("",$to,$subject,$body);

                    $this->session->set_flashdata('response', '<div class="success-box">Your password has been sent to your email address.</div>');
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }
                else
                {
                    $this->session->set_flashdata('response', '<div class="error-box">Wrong credentials found, please try again.</div>');
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }

            }
        }
        else
        {
            $this->forgotpassword_view();
        }
    }

    private function forgotpassword_view()
    {
        $data = array(
            'page_title' => "Forgot Password",
            'page_view' => "web/pages/pg-member-forgot-password"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function account()
    {
        $this->member_model->is_login();

        if($this->input->post())
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('old_password', 'Old Password', 'required');
            $this->form_validation->set_rules('password', 'New Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->account_view();
            }
            else
            {
                $vals = array();

                $vals['email'] = $this->session->userdata('member_data')->email;
                $vals['password'] = $this->input->post('old_password');

                $mem_data = $this->db_model->get_row("members",$vals);

                if($mem_data)
                {
                    $this->db_model->update_row('members',array('password'=>$this->input->post('password')),array('email'=>$this->session->userdata('member_data')->email));
                    $this->session->set_flashdata('response', '<div class="success-box">Your password has been updated.</div>');
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }
                else
                {
                    $this->session->set_flashdata('response', '<div class="error-box">Old password mismatch.</div>');
                    redirect($_SERVER['HTTP_REFERER'],'refresh');
                }

            }
        }
        else
        {
            $this->account_view();
        }
    }

    private function account_view()
    {
        $data = array(
            'page_title' => "Update Password",
            'page_view' => "web/pages/pg-member-update-password"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function profile()
    {
        $this->member_model->is_login();

        if($this->input->post())
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mobile_no','','');
            $this->form_validation->set_rules('university','','');
            $this->form_validation->set_rules('major','','');
            $this->form_validation->set_rules('description','','');

            $this->form_validation->set_rules('first_name','First Name','required|alpha');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('user_name', 'User Name', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                $this->profile_edit_view();
            }
            else
            {
                $vals = array();

                $vals = $this->input->post();

                unset($vals['btnSubmit'],$vals['user_name'],$vals['email']);

                $vals['last_modified'] = date('Y-m-d h:i:s');

                $where = array('id' => $this->session->userdata('member_data')->id);

                $res = $this->db_model->update_row('members',$vals,$where);

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
        }
        else
        {
            $this->profile_edit_view();
        }
    }

    private function profile_edit_view()
    {
        $data = array(
            'page_title' => "Profile Information",
            'row' => $this->db_model->get_row('members',array('id'=>$this->session->userdata('member_data')->id)),
            'page_view' => "web/pages/pg-member-profile-edit"
        );

        $this->load->view('web/shared/popupmaster',$data);
    }

    public function logout()
    {
        $this->session->unset_userdata('member_data');
        redirect(base_url(), 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */