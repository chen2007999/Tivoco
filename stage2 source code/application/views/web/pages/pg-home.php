<?PHP
/**
 *@var $this CI_Controller
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->db_model->get_row('settings',array('key'=>'site_title'))->value; ?></title>

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

<link href="<?PHP echo base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" />

<?php $this->load->view('web/shared/masterscripts');?>

<script type="text/javascript" src="<?PHP echo base_url('assets/js/master.js');?>"></script>

</head>

<body>
<?PHP if(isset($error) && $error !=""){echo '<div class="error-box-home">'.$error.'</div>';}?>
<?php echo $this->session->flashdata('response');?>
<?php echo validation_errors('<div class="error-box-home">', '</div>'); ?>
<div class="wrapper">
	<div class="container">    	
		<div class="port">
			<div class="port-left">
				<div class="logo">
					<a href="<?PHP echo base_url();?>">
						<h2>tivoco</h2>
						<h5>Life is better connected</h5>
					</a>
				</div>	
					<div class="video"><a href="#"><img src="<?php echo base_url(); ?>assets/images/port-left.jpg" /></a></div>
						<div class="form">
                        <form id="loginFrm" name="loginFrm"  enctype="multipart/form-data" method="post" action="<?PHP echo base_url();?>member/signin">
							<table class="form-tab">
								
								<tr>
								
									<td class="user">
										<input type="text" name="user_name" id="user_name"  placeholder="Username" value="<?PHP echo set_value('user_name');?>" class="validate[required]"/>
									</td>					
							
									<td class="pass">
										<input name="password" id="password" type="password" placeholder="Password" value="<?PHP echo set_value('password');?>" class="validate[required]"/>
									</td>
									
									<td class="log">
										<input type="submit" value="sign in" />
									</td>
									
								</tr>
								
							</table>
							</form>
							<ul class="form-nav">
								<li><a href="javascript:void(0);" onclick="open_popup('<?PHP echo base_url();?>member/forgotpassword');">Forgot Password?</a></li>
								<li>|</li>
								<li><a href="javascript:void(0);" onclick="open_popup('<?PHP echo base_url();?>member/signup');">Register</a></li>
							</ul>
						</div>
				
			</div>
			
			<div class="port-right">
				<div class="port-in">
					<h4>Now open to</h4>
						<span class="icn" style="cursor:pointer;" onclick="open_popup('<?PHP echo base_url();?>home/uni_list')"><?PHP echo sprintf("%02s",$this->db_model->get_counts_where('universities',array('status'=>'Active')));?></span>
					<h4>Universities</h4>
					<input class="try" type="button" value="Give a try" onclick="window.location='<?PHP echo base_url();?>member/dashboard'" />
				</div>
			</div>
		</div>
	</div>

<div class="footer">
	<div class="copy"> Copyright 2013.</div>
		<ul class="foot-nav">
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>about-us');">About Us</a></li>
			<li>|</li>
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>feedback/index/1');">Feedback</a></li>
			<li>|</li>
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>terms');">Terms</a></li>
			<li>|</li>
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>privacy-policy');">Policy</a></li>
		</ul>
</div>
</div>
</body>
</html>