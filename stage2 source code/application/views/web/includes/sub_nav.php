<?PHP
/**
 *@var $this CI_Controller
 */
?>
<ul class="sup-nav">
        <li><a href="<?PHP echo base_url();?>member/dashboard"><span>Dashboard</span></a></li>
    <?PHP if($this->session->userdata('member_data')){?>
        <li><a href="<?PHP echo base_url();?>mailbox"><span>Inbox</span><i class="up"><?PHP echo $this->db_model->get_counts_where('messages',array('to'=>$this->session->userdata('member_data')->id,'status'=>0));?></i></a></li>
        <li><a href="#"><span>Drift Bottle</span><i class="up">0</i></a></li>
    <?PHP }else{?>
        <li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>member/popup_signin');"><span>Inbox</span><i class="up">0</i></a></li>
        <li><a href="javascript:void(0);" onclick="open_popup('<?php echo base_url(); ?>member/popup_signin');"><span>Drift Bottle</span><i class="up">0</i></a></li>
    <?PHP }?>

</ul>

<?PHP
if($this->config->item('recursive_call') == true)
{
    ?>
    <script>setTimeout('refresh_content("sub_navigation","<?PHP echo base_url();?>home/sub_nav");',<?PHP echo $this->config->item('recursive_call_time');?>);</script>
    <?PHP
}
?>

