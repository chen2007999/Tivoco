<?php
include("bridge.php");

class usercontroll
{
 	private  $user=array();
	private  $errorFlag=false;
	private	 $errorMesssage="";
	private  $db;
	function usercontroll()
	{
		$this->db=new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$this->db->connect();
	}
	
	function setUserList()
	{
		$counter=0;
		$sql="SELECT * FROM `".TABLE_MEMBERS."`";
		$row=$this->db->query($sql);
		if($this->db->affected_rows>0)
		{
			while($record=$this->db->fetch_array($row))
			{
				$this->user[$counter]=$record["username"];
				$counter++;
			}
		}
		else
		{
			$this->errorFlag=true;
			$this->errorMessage="No user found.";
		}
	}
	
	function getUserList()
	{
		return $this->user;
	}
	
	function getErrorFlag()
	{
		return $this->errorFlag;
	}
	
	function getErrorMessage()
	{
		return $this->errorMessage;
	}


} //End usercontroll
?>