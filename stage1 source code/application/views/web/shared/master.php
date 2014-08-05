<?PHP
/**
 *@var $this CI_Controller
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tivoco : <?php echo $page_title; ?></title>

<?PHP
if(isset($page_data) && $page_data->metas !="")
{
    echo $page_data->metas;
}
else
{
    echo $this->db_model->get_row('settings',array('key'=>'metas'))->value;
}
?>

<link href="<?php echo base_url(); ?>assets/css/site.css" rel="stylesheet" type="text/css" />

<?php $this->load->view('web/shared/masterscripts');?>

</head>

<body <?PHP if(isset($view_only)){?>style="background-color: #fff;" <?PHP }?> <?PHP if(!isset($view_only)){?>onload="top_navigation();"<?PHP }?>>
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
<?PHP if(!isset($view_only)){?>
  <tr>
    <td>    
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

                  <tr>
                    <td valign="middle"><img src="<?php echo base_url();?>assets/images/logo-transparent.png" alt="" border="0" align="absmiddle" title="" width="200" /></td>
                    <td valign="bottom" align="right" id="top_navigation">

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
            <td>Copyright &copy; tivoco.com <?PHP echo date('Y');?></td>
          </tr>
           <tr>
           <td>&nbsp;</td>
         </tr>  
        </table>
    </td>
  </tr>
<?PHP }?>
</table>
<?PHP
if(isset($activation_popup) && isset($activation_code) && $activation_popup == true)
{
?>
    <a id="activation_popup" href="<?PHP echo base_url();?>member/confirm_activation/<?PHP echo $activation_code;?>"></a>
<?PHP
}
?>
</body>
</html>