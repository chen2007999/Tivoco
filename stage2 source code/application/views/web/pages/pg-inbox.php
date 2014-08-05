<?PHP
/**
 *@var $this CI_Controller
 */
?>
<form id="msg_form" name="msg_form" action="<?PHP echo base_url();?>mailbox/delete_msg" method="post">
<div class="body-mid">
    <div class="body-mid-inner">

        <div class="body-mid-top" id="msg_count">

        </div>

        <div class="detail default-skin inboxdemo">

        <?PHP
        $query = 'SELECT DISTINCT CONCAT(YEAR(date_posted),"-", MONTH(date_posted),"-", DAY(date_posted)) as msg_date FROM {PRE}messages where `to` = '.$this->session->userdata('member_data')->id.'';
		if(isset($unread) && $unread == true)
		{
			$query.=' AND status = 0';
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
                        <div class="detail-head-txt detail-head-txt2"><?PHP echo date("j M Y",strtotime($msg_date->msg_date));?></div>
                    </div>
                </div>
                <?PHP

                $query = 'SELECT * FROM {PRE}messages WHERE `to` = '.$this->session->userdata('member_data')->id.' AND DATE(date_posted) = "'.$msg_date->msg_date.'"';
				if(isset($unread) && $unread == true)
				{
					$query.=' AND status = 0';
				}
				$query.=' ORDER BY date_posted DESC';
                $msgs = $this->db_model->sql($query);

                ?>
                <div class="detail-main">
                    <?PHP
                    foreach($msgs as $msg)
                    {
                        $sender_data = $this->db_model->get_row('members',array('id'=>$msg->from));
                        ?>
                        <div class="pen<?PHP if($msg->status==0){echo "-un";}?>-detail">
                            <input type="checkbox" class="msg_id" name="msg_id[]" value="<?PHP echo $msg->id;?>" />

                            <div class="pen-img">
                                <img src="<?PHP echo base_url();?>uploads/<?PHP echo $sender_data->photo;?>" height="65" width="65" onclick="window.location='<?PHP echo base_url();?>mailbox/msg_detail/<?PHP echo $msg->id;?>';" style="cursor: pointer;" />
                            </div>

                            <div class="pen-txt">
                                <h3 style="min-width: 150px; cursor: pointer;" onclick="window.location='<?PHP echo base_url();?>mailbox/msg_detail/<?PHP echo $msg->id;?>';"><?PHP echo $sender_data->first_name." ".$sender_data->last_name;?></h3>
                                <span><?PHP echo $sender_data->university;?></span>
                            </div>

                            <div class="time"><?PHP echo date('h:i A',strtotime($msg->date_posted));?></div>

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
    </div>
</div>
</form>

<script>refresh_content("msg_count","<?PHP echo base_url();?>mailbox/unread_msg_count");</script>

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