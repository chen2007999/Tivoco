<?php 

class Member_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	public function is_login()
	{
        if(!$this->session->userdata('member_data'))
        {
            $this->session->set_flashdata('response', '<div class="error-box">Please login...!</div>');
            //redirect(base_url(), 'refresh');
            ?>
            <script>parent.window.location='<?PHP echo base_url();?>'</script>
            <?PHP
            exit;
        }
    }

    public function is_profile_completed()
    {
        $member_data = $this->db_model->get_row('members',array('email'=>$this->session->userdata('member_data')->email));

        if($member_data->is_profile_complete == 'Yes')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>