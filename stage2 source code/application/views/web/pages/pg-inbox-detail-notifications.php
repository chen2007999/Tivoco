<?PHP
/**
 *@var $this CI_Controller
 */
?>
<?PHP
$unread_msg_count = $this->db_model->get_counts_where('messages',array('to'=>$this->session->userdata('member_data')->id,'from'=>$sender_id,'status'=>0));
?>

<ul class="mid-nav">
    <li><?PHP echo '<a class="unread" href="'.base_url().'mailbox/unread_msg_detail/'.$msg_id.'/'.$sender_id.'"><span>Unread</span><i class="down">'.$unread_msg_count.'</i></a>';?></li>
    <li><a class="ved" href="javascript:void(0);" onclick="open_popup('<?PHP echo base_url();?>mailbox/reply/<?PHP echo $sender_id;?>')"><span>Reply</span></a></li>
    <li><a class="del" style="cursor: pointer;" onclick="return is_msg_selected();"><span>Remove</span></a></li>
</ul>

<?PHP
if($this->config->item('recursive_call') == true)
{
    ?>
    <script>setTimeout('refresh_content("msg_detail_count","<?PHP echo base_url();?>mailbox/unread_msg_detail_count/<?PHP echo $msg_id;?>/<?PHP echo $sender_id;?>");',<?PHP echo $this->config->item('recursive_call_time');?>);</script>
    <?PHP
}
?>