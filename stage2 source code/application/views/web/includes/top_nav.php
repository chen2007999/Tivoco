<?PHP //$this->member_model->is_login();?>
<ul class="top-nav">
    <?PHP if($this->session->userdata('member_data')){?>
        <li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>member/profile');">Profile</a></li>
        <li>|</li>
        <li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>member/account');">Account</a></li>
        <li>|</li>
        <li><a href="<?php echo base_url(); ?>member/logout">Logout</a></li>
    <?PHP }else{?>
        <li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>member/signup');">Sign Up</a></li>
        <li>|</li>
        <li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>member/popup_signin');">Sign In</a></li>
    <?PHP }?>
</ul>

<?PHP
if($this->config->item('recursive_call') == true)
{
    ?>
    <script>setTimeout('refresh_content("top_nav","<?PHP echo base_url();?>home/top_nav");',<?PHP echo $this->config->item('recursive_call_time');?>);</script>
    <?PHP
}
?>