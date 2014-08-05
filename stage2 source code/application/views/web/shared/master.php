<?PHP
/**
 *@var $this CI_Controller
 */
?>
<?PHP  //echo $this->session->userdata('member_data')->id;?>
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

    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

    <?php $this->load->view('web/shared/masterscripts');?>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.custom-scrollbar.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.custom-scrollbar.css"/>

    <script>var base_url = '<?PHP echo base_url();?>';</script>
    <script>var is_ref = true;</script>
    <script type="text/javascript" src="<?PHP echo base_url('assets/js/master.js');?>"></script>

</head>

<body>

<?PHP 
/*if(isset($error) && $error !=""){echo '<div class="error-box-home">'.$error.'</div>';}
echo $this->session->flashdata('response');
echo validation_errors('<div class="error-box-home">', '</div>');*/
?>


<div class="main-wrap">
	<div class="header">    
		<div class="main-logo">
			<a href="<?PHP echo base_url();?>">
				<h2>tivoco</h2>
				<h5>Life is better connected</h5>
			</a>
		</div>

        <div  id="sub_navigation"></div>
        <div id="top_navigation"></div>

	</div>
	
	<div class="body-wrap">
    	<div class="body-wrap-inner">
            <div id="body_content"><?PHP $this->load->view($page_view);?></div>
        <!--body-middle-->
        <!--<div id="friends_list" style="cursor: pointer;" onmousemove="is_ref = false;" onmouseout="is_ref = true;"></div>-->
            <div id="friends_list" style="cursor: pointer;"></div>
        <!--right-edit-->
		</div><!--body-wrap-inner-->
		<div class="footer-on">
		<div class="on-copy"> Copyright 2013.</div>
		<ul class="on-foot-nav">
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>about-us');">About Us</a></li>
			<li>|</li>
			<li><a href="#">How it Works</a></li>
			<li>|</li>
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>feedback/index/1');">Feedback</a></li>
			<li>|</li>
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>terms');">Terms</a></li>
			<li>|</li>
			<li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>privacy-policy');">Privacy Policy</a></li>
		</ul>        
	</div>
    </div><!--body-wrap-->
</div>


<?PHP
if(isset($activation_popup) && isset($activation_code) && $activation_popup == true)
{
?>
    <script>open_popup('<?PHP echo base_url();?>member/confirm_activation/<?PHP echo $activation_code;?>');</script>
<?PHP
}
?>

<?PHP
if(isset($profile_popup) && $profile_popup == true)
{
?>
    <script>open_popup('<?PHP echo base_url();?>member/profile');</script>
<?PHP
}
?>
<style>
    .ajax-loader {
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -32px; /* -1 * image width / 2 */
        margin-top: -32px;  /* -1 * image height / 2 */
        display: none;
    }
</style>
<img src="<?PHP echo base_url();?>assets/images/loading.gif" class="ajax-loader"/>
<script>
    j(document).ready(function(){
        refresh_content('top_navigation',""+base_url+"home/top_nav");
        refresh_content('sub_navigation',""+base_url+"home/sub_nav");
        refresh_content('friends_list',""+base_url+"member/friends_list");
    });
</script>
</body>
</html>