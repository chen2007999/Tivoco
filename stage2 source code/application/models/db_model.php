<?php 

class Db_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_table($table)
    {
		$query = $this->db->get($table);			        
		return $query->result();
    }
	
	function get_row($table,$where)
    {
        $query = $this->db->get_where($table, $where);			
        return $query->row();
    }
	
	function get_rows($table,$where)
    {
        $query = $this->db->get_where($table, $where);			
        return $query->result();
    }
	
	function get_row_value($table,$where)
    {
        $query = $this->db->get_where($table, $where);
		$result = $query->row();			
        return $result->value;
    }
	
	function get_rows_groupby($table,$where,$groupby)
	{
		$this->db->group_by($groupby);		
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	
	function insert_row($table,$data)
    {
        return $this->db->insert($table,$data); 			
    }
	
	function insert_row_retid($table,$data)
    {
        $this->db->insert($table,$data); 			
		return $this->db->insert_id();
    }
		
	
	function update_row($table,$data,$where)
    {
        return $this->db->update($table, $data, $where); 			
    } 
	
	function delete_row($table,$where)
    {
        return $this->db->delete($table,$where); 			
    } 
	
	function sql($commandText)
    {
        $query = $this->db->query($commandText);				
		return $query->result(); 			
    } 
	
	
	
	
	function get_table_by_limits($table,$pp,$row)
    {
		$query = $this->db->get($table,$row,$pp);			        
		return $query->result();
    }
	
	
	function get_table_by_limits_where($table,$pp,$row,$where)
    {
		$this->db->where($where);					
		$query = $this->db->get($table,$row,$pp);				
		return $query;
    }
	
	function get_counts($table)
	{
		return $this->db->count_all($table);
	}
	
	function get_counts_where($table,$where)
	{
		$this->db->where($where);		
		$this->db->from($table);				
		return $this->db->count_all_results();
	}	
	
	function get_sum_where($table,$field_name,$where)
	{		
		$this->db->select_sum($field_name);
		$this->db->where($where);
		$query = $this->db->get($table);
		$result = $query->result();
		return $result[0]->$field_name;
	}	
	
	
	function format_content($content)
    {
		$content = str_ireplace('&nbsp;</td>','</td>',$content);		
        return $content;
    }
	
	function role_validator($moduleid)
	{				
		$array = array('roleid' => $this->session->userdata('loggedinuserrole')->roleid,'privilegeid' => $moduleid);		
		$row = $this->get_row('roles_permissions',$array);
		
		if($row == null)
		{
			$this->session->set_flashdata('response', '<error><strong>Access Denied</strong>, This section is not active against your role.</error>');	
			redirect(base_url().'administration/error', 'refresh');		
		}			
		
	}
	
	public function is_login()
	{
		if(!$this->session->userdata('member'))
		{
			$this->session->set_flashdata('msg', '<div class="login-error">Please login.</div>');
			redirect(base_url()."member/login",'refresh');
		}
		
	}
	
	
	
	
	

}

?>