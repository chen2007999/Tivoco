<?php 

class notificationmodel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	
    
   function send_email($sender_name,$to,$from,$subject,$body,$template,$file = '')
	{
			
		$config['mailtype'] = "html";
		
		$templete = file_get_contents(base_url('assets/templates/'.$template.''));
			
		$templete = str_replace('[bodyText]',$body,$templete);
		
		$templete = str_replace('[date]',date('m/d/Y'),$templete);
		
		$templete = str_replace('[subject]',$subject,$templete);
		
		$templete = str_replace('[siteURL]',base_url(),$templete);
		
		$templete = str_replace('[logo]',base_url()."assets/images/logo.png",$templete);	
							
		$this->email->initialize($config);
		$this->email->from($from, $sender_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($templete);
		
		if($file != '')
		{
			$this->email->attach($file);	
		}
		
		$this->email->send();			
	}
	
	
	
	function send_email_no_template($sender_name="",$to,$subject,$body)
	{
		
		$this->load->library('email');
		
		$config['mailtype'] = "html";				
			
		$templete = $body;		

        $sender_name = "Tivoco.com";
		$sender_email = $this->db_model->get_row('users',array('id'=>5))->useremail;

		$this->email->initialize($config);
		$this->email->from($sender_email, $sender_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($templete);
		$this->email->send();
	}
	
	
	function send_email_to_admin($sender_name,$sender_email,$subject,$body)
	{
		
		$this->load->library('email');
		
		$config['mailtype'] = "html";				
			
		$templete = $body;		
		
		$to = $this->db_model->get_row('users',array('id'=>5))->useremail;

		$this->email->initialize($config);
		$this->email->from($sender_email, $sender_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($templete);
		$this->email->send();			
	}
	
	
		
}

?>