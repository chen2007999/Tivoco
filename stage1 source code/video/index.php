<?php
 $user="";
 if(isset($_REQUEST["username"]))
 {
 	if($_REQUEST["username"]=="")
		header("Location:login.php");
 	$user=trim($_REQUEST["username"]);
 }
 else
 header("Location:login.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chatr</title>
<link type="text/css" rel="stylesheet" href="stylesheet/stylesheet.css" />
<script type="text/javascript" src="javascript/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="javascript/jsascomm.js"></script>
<script type="text/javascript">
	
</script>
</head>

<body onLoad="pageInit();">
   <div class="content">
 		<div class="divLeft">
             <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                     id="chatr" width="980" height="400"
                     codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab">
                 <param name="movie" value="Chatr.swf" />
                 <param name="quality" value="high" />
                 <param name="bgcolor" value="#FFF" />
                 <param name=FlashVars value="user=<?=$user?>" />
                 <param name="allowScriptAccess" value="sameDomain" />
                 <embed src="Chatr.swf" FlashVars="user=<?=$user?>" quality="high" bgcolor="#FFF"
                     width="980" height="400" name="cobrowsing" align="middle"
                     play="true" loop="false" quality="high" allowScriptAccess="sameDomain"
                     type="application/x-shockwave-flash"
                     pluginspage="http://www.macromedia.com/go/getflashplayer">
                 </embed>
             </object>
        </div> <!--End divLeft--> 
        <div id="userList" class="divRight">
        	
        </div> <!--End divRight-->
   </div> <!--End content--> 
     
</body>
</html>