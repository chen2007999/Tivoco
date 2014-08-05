<?php
if(isset($_REQUEST["_user_process"]))
{
	require_once("user_controll.php");
	$userDetail=array();
	$flash_list="";
	$user=new usercontroll();
	$user->setUserList();
	if(!$user->getErrorFlag())
	{
		$userDetail=$user->getUserList();
		$flash_list=implode("|",$userDetail);
		echo "result=success&user=".$flash_list;
	}
	else
	{
		echo "NO USER";
	}

} //End if
?>