<?PHP
/**
 *@var $this CI_Controller
 */
?>

<div class="body-mid">
<div class="body-mid-inner">

    <div class="body-mid-top" id="msg_detail_count">
    
    </div>

<?PHP
$msg_data = $this->db_model->get_row('messages',array('id'=>$msg_id));

$sender_data = $this->db_model->get_row('members',array('id'=>$msg_data->from));
?>

    <div class="detail-port">
        <div class="detail-port-inner">
            <div class="pen-detail">


                <div class="pen-rom">
                    <div class="pen-img-out">
                        <div class="pen-img">
                            <img src="<?PHP echo base_url();?>uploads/<?PHP echo $sender_data->photo;?>" width="80" height="80" />
                        </div>
                    </div>
                    <form action="<?PHP echo base_url();?>friend/remove_friend" method="post">
                    	<input type="submit" value="Remove" onclick="return confirm('All the messages from this friend will also be deleted.\nAre you sure you want to delete this friend from your list?');" />
                        <input type="hidden" name="friend_id" id="friend_id" value="<?PHP echo $sender_data->id;?>"/>
                    </form>
                </div>

                <div class="pen-ved-txt">
                    <h3><?PHP echo $sender_data->first_name." ".$sender_data->last_name;?></h3>
                    <h5><?PHP echo $sender_data->university;?></h5>
                    <ul class="eco">
                        <li><?PHP echo $sender_data->major;?></li>
                    </ul>
                    <h4><?PHP echo substr(strip_tags($sender_data->description),0,35);?> </h4>
                </div>

                <div class="ved">
                    <img src="<?PHP echo base_url();?>assets/images/ved.jpg" />
                </div>

                <div class="ved-time"><?PHP echo date("j M Y",strtotime($msg_data->date_posted));?></div>
            </div>
        </div>
    </div>

    <form id="msg_form" name="msg_form" action="<?PHP echo base_url();?>mailbox/delete_msg" method="post">
    <div class="detail-gen default-skin inboxdemo">

    <?PHP
    $query = 'SELECT DISTINCT CONCAT(YEAR(date_posted),"-", MONTH(date_posted),"-", DAY(date_posted)) as msg_date FROM {PRE}messages where `to` = '.$this->session->userdata('member_data')->id.' AND `from` = '.$sender_data->id.' AND id!='.$msg_data->id.'';
    if(isset($unread) && $unread==true)
    {
        $query.=' AND status=0';
    }
    $query.=' ORDER BY msg_date DESC';
    $msg_dates = $this->db_model->sql($query);
    $i=1;
    if($msg_dates)
    {
        foreach($msg_dates as $msg_date)
        {
            ?>
            <div class="detail-head">
                <div class="detail-head-inner">
                    <div class="detail-gen-txt"><?PHP echo date("j M Y",strtotime($msg_date->msg_date));?></div>
                </div>
            </div>
            <?PHP

            $query = 'SELECT * FROM {PRE}messages WHERE `to` = '.$this->session->userdata('member_data')->id.'  AND `from` = '.$sender_data->id.' AND DATE(date_posted) = "'.$msg_date->msg_date.'" AND id!='.$msg_data->id.'';
            if(isset($unread) && $unread==true)
            {
                $query.=' AND status=0';
            }
            $query.=' ORDER BY date_posted DESC';

            $msgs = $this->db_model->sql($query);

            ?>
            <div class="detail-main">
                <?PHP
                foreach($msgs as $msg)
                {
                    ?>

                    <div class="pen<?PHP if($msg->status==0){echo "-un";}?>-detail">
                         <input type="checkbox" class="msg_id" name="msg_id[]" value="<?PHP echo $msg->id;?>" />

                        <div class="pen-sm-img">
                            <img src="<?PHP echo base_url();?>uploads/<?PHP echo $sender_data->photo;?>" width="40" height="40" onclick="window.location='<?PHP echo base_url();?>mailbox/msg_detail/<?PHP echo $msg->id;?>/<?PHP echo $sender_data->id;?>';" style="cursor: pointer;"/>
                        </div>

                        <div class="pen-sm-txt">
                            <h5 style="min-width: 150px; cursor: pointer;" onclick="window.location='<?PHP echo base_url();?>mailbox/msg_detail/<?PHP echo $msg->id;?>/<?PHP echo $sender_data->id;?>';"><?PHP echo $sender_data->first_name." ".$sender_data->last_name;?></h5>
                            <h6><?PHP echo $sender_data->university?></h6>
                        </div>

                        <div class="sm-ved">
                            <img src="<?PHP echo base_url();?>assets/images/sm-ved.jpg" />
                        </div>

                        <div class="sm-time"><?PHP echo date('h:i A',strtotime($msg->date_posted));?></div>
                    </div>
                <?PHP
                }
                ?>
            </div>
            <?PHP
            $i++;
        }
    }
    else
    {
        ?>
        <div class="detail-head">
            <div class="detail-head-inner">
                <div class="detail-head-txt detail-head-txt2">There is no message to display...</div>
            </div>
        </div>
    <?PHP
    }

    ?>
    </div>
 </form>
</div>
</div>

<script>refresh_content("msg_detail_count","<?PHP echo base_url();?>mailbox/unread_msg_detail_count/<?PHP echo $msg_data->id;?>/<?PHP echo $sender_data->id;?>");</script>

<script>
function is_msg_selected()
{
    var checkboxs = document.getElementsByClassName("msg_id");
    var okay=false;
    for(var i=0,l=checkboxs.length;i<l;i++)
    {
        if(checkboxs[i].checked)
        {
            okay=true;
        }
    }
    if(okay)
    {
       if(confirm('Are you sure you want to delete the selected ones?'))
	   {
		   msg_form.submit();
	   }
    }
    else
    {
        alert("Please select a message to delete.");
    }
}
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(".inboxdemo").customScrollbar();
        $("#fixed-thumb-size-demo").customScrollbar({fixedThumbHeight: 50, fixedThumbWidth: 60});
    });
</script>