<?PHP
/**
 *@var $this CI_Controller
 */
?>

<?PHP
if($this->session->userdata('member_data'))
{
?>
<div class="right-edit">
  <div class="right-edit-inner">
    <div class="right-top-red">
      <ul class="sup-nav friends">
        <li><a href="javascript:void(0);" onclick="see_friend_requests();"><span>Friends</span><i class="up"><?PHP echo $this->db_model->get_counts_where('friends',array('status'=>'Pending','member_id'=>$this->session->userdata('member_data')->id))?></i></a></li>
      </ul>
      <a  class="f-invite"><img src="<?PHP echo base_url();?>assets/images/f-invite.png"></a> </div>
    <!--right-top-red-->
    <div class="right-scroll default-skin demo">
      <div class="left-edit"> <span class="online-txt">Online</span> </div>
      <div class="users-list">
        <ul>
        <?PHP
        $query = "SELECT * FROM {PRE}members tm,{PRE}friends tf WHERE tf.`status`='Accept' AND tm.`online`='Yes' AND tf.`friend_id` = tm.`id` AND tf.`member_id`=".$this->session->userdata('member_data')->id." ";
        $online_friends = $this->db_model->sql($query);
        foreach($online_friends as $friend)
        {
        ?>
            <li>
                <div class="user-img">
                    <div class="pop"></div>
                    <img src="<?PHP echo base_url();?>uploads/<?PHP echo $friend->photo;?>" width="40" height="40" /> </div>
                <div class="online-dot"> <span></span> </div>
                <div class="user-name">
                    <h4><?PHP echo $friend->first_name;?>&nbsp;<?PHP echo $friend->last_name;?></h4>
                    <h4><?PHP echo $friend->university;?></h4>
                </div>
                <div class="call-btn"> <a href="javascript:void(0);">Call</a> </div>
            </li>
        <?PHP
        }
        ?>
        </ul>
      </div>
      <div class="left-edit"> <span class="online-txt">Offline</span> </div>
      <div class="users-list">
        <ul>
        <?PHP
        $query = "SELECT * FROM {PRE}members tm,{PRE}friends tf WHERE tf.`status`='Accept' AND tm.`online`='No' AND tf.`friend_id` = tm.`id` AND tf.`member_id`=".$this->session->userdata('member_data')->id." ";
        $offline_friends = $this->db_model->sql($query);
        foreach($offline_friends as $friend)
        {
        ?>
          <li>
            <div class="user-img">
              <div class="pop"></div>
              <img src="<?PHP echo base_url();?>uploads/<?PHP echo $friend->photo;?>" width="40" height="40" /> </div>
            <div class="online-dot offline"> <span></span> </div>
          <div class="user-name">
                  <h4><?PHP echo $friend->first_name;?>&nbsp;<?PHP echo $friend->last_name;?></h4>
                  <h4><?PHP echo $friend->university;?></h4>
              </div>
            <div class="call-btn"> <a href="javascript:void(0);">Call</a> </div>
          </li>
        <?PHP
        }
        ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $(".demo").customScrollbar({});
        $("#fixed-thumb-size-demo").customScrollbar({fixedThumbHeight: 50, fixedThumbWidth: 60});
    });
</script>

<?PHP
if($this->config->item('recursive_call') == true)
{
    ?>
    <script>setTimeout('refresh_content("friends_list","<?PHP echo base_url();?>member/friends_list");',<?PHP echo $this->config->item('recursive_call_time');?>);</script>
<?PHP
}
?>

<?PHP
}
?>
<!--right-edit-->