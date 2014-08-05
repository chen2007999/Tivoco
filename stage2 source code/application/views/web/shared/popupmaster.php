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

<body style="background-color: #fff;">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="top"  >
    	<table border="0" cellspacing="0" cellpadding="0" align="center">
          <tr>
            <td>
                <?PHP if(!isset($div_padding)){?>
                <div id="main">
                <?PHP }?>
                    <table border="0" cellspacing="0" cellpadding="0">
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
                <?PHP if(!isset($div_padding)){?>
                </div>
                <?PHP }?>
            </td>
          </tr> 
        </table>
    </td>
  </tr>
</table>
</body>
</html>