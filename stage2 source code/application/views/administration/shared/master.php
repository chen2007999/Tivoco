<?PHP
/**
 *@var $this CI_Controller
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administration : <?php echo $page_title; ?></title>

<link href="<?php echo base_url(); ?>assets/css/administration.css" rel="stylesheet" type="text/css" />
<?php $this->load->view('administration/shared/masterscripts');?>
</head>

<body <?PHP if(isset($view_only)){?>style="background-color: #fff;" <?PHP }?> >

<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<?PHP if(!isset($view_only)){?>
  <tr>
    <td>    
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

                  <tr>
                    <td valign="middle"><img src="<?php echo base_url();?>assets/images/administration/logo-transparent.png" alt="" border="0" align="absmiddle" title="" width="116" /></td>
                    <td valign="bottom">
                    <?PHP if($this->session->userdata('loggedinuser')){?>
                     <ul id="menu">
                        <li><a href="<?php echo base_url(); ?>administration/cpanel">&raquo; Home</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/settings">&raquo; Global Settings</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/content">&raquo; CMS</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/adminusers">&raquo; Admin Users</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/members">&raquo; Members</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/templates">&raquo; Email Templates</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/feedback">&raquo; Feedback</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/universities">&raquo; Universities</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/accountsettings">&raquo; Account Settings</a></li>
                        <li><a href="<?php echo base_url(); ?>administration/login/logoff">&raquo; Logout</a></li>
                    </ul>
                    <?PHP }else{echo "&nbsp;";}?>
                    </td>
                  </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table>
            </td>
          </tr>
        </table>        
    </td>
  </tr>
<?PHP
}
?>
  <tr>
    <td valign="top"  >
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"> 
          <tr>
            <td>
                <div id="main">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="30">
                        	<?PHP if(isset($error) && $error !=""){echo '<div class="error-box">'.$error.'</div>';}?>
							<?php echo $this->session->flashdata('response');?>
                            <?php echo validation_errors('<div class="error-box" style="margin-bottom: 15px;">', '</div>'); ?>
                        </td>
                      </tr>
                      <tr>
                        <td><?php $this->load->view($page_view);?> </td>
                      </tr>
                    </table>				
                </div>
            </td>
          </tr> 
        </table>
    </td>
  </tr>
<?PHP if(!isset($view_only)){?>
  <tr>
    <td>
    	<table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
         <tr>
           <td>&nbsp;</td>
         </tr>
         <tr>
            <td><?PHP echo $this->db_model->get_row('settings',array('key'=>'footer_text'))->value;?></td>
          </tr>
           <tr>
           <td>&nbsp;</td>
         </tr>  
        </table>
    </td>
  </tr>
<?PHP }?>
</table>
</body>
</html>