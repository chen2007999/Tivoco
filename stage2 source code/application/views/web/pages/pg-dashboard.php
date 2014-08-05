<?PHP
/**
 *@var $this CI_Controller
 */
?>

<?PHP
$member_data = null;
if($this->session->userdata('member_data'))
{
    $member_data = $this->db_model->get_row('members',array('id'=>$this->session->userdata('member_data')->id));
}
?>
<div class="body-left">
    <div class="top-left-head">
        <div class="left-img">
            <?PHP if($member_data){?><a class="left-icn" href="#"><img src="<?PHP echo base_url();?>uploads/<?PHP echo $member_data->photo;?>" width="64" height="64" /></a><?PHP }else{?><img src="<?PHP echo base_url();?>assets/images/rad-man.jpg" /><?PHP }?>
        </div>
        <div class="head-txt">
            <h3><?PHP if($member_data){echo $member_data->first_name." ".$member_data->last_name;}else{echo "Welcome Guest";}?></h3>
            <h5><?PHP if($member_data){echo $member_data->university;}?></h5>
        </div>
    </div>
    <div class="left-bot-img">
        <a class="left-icn" href="#"><img src="<?PHP echo base_url();?>assets/images/left-icn.png" /></a>
    </div>

    <div class="left-edit">
        <div class="edit-txt">21 Friends</div>
        <a class="edit" href="#">Edit</a>

    </div>
    <div class="left-txt-cont">
        <div class="tags">
            <span><?PHP if($member_data){echo $member_data->major;}?></span>
        </div>
        <p class="side-line"><?PHP if($member_data){echo substr(strip_tags($member_data->description),0,60);}?></p>
    </div>
</div><!--body-left-->

<?PHP
if($this->session->userdata('member_data'))
{
    $query = "Select * from {PRE}members where id !=".$this->session->userdata('member_data')->id." AND online = 'Yes' ORDER BY RAND() LIMIT 1";
}
else
{
    $query = "Select * from {PRE}members where online = 'Yes' ORDER BY RAND() LIMIT 1";
}

$trip_data = $this->db_model->sql($query);
?>

<div class="body-middle">
            	<div class="body-middle-inner">
                	<a href="#" class="left-icn big-mov-icon"><img src="<?PHP echo base_url();?>assets/images/left-icn.png"></a>
                	<div class="middle-big-img">
                    	<img src="<?PHP echo base_url();?>uploads/<?PHP echo $trip_data[0]->photo;?>" />
                    </div>
                    <div class="big-img-txt">
                    	<div class="big-img-txt-inner">
                            <h2><?PHP echo $trip_data[0]->first_name." ".$trip_data[0]->last_name;?></h2>
                            <p><?PHP echo $trip_data[0]->university;?></p>
                             <div class="tags">
                            <span><?PHP echo $trip_data[0]->major;?></span>
                            <p class="side-line"><?PHP echo substr(strip_tags($trip_data[0]->description),0,60);?></p>
                		</div>
                    </div>
                    <div class="big-img-txt-inner-right">
                    	<ul>
                        	<li><a href="" class="vid-icn"><img src="<?PHP echo base_url();?>assets/images/camera-ico.png" /></a></li>
                            <li><a href="javascript:void(0);" onclick="refresh_content('body_content','<?PHP echo base_url();?>member/dashboard_view');"  class="wt-btn">Next</a></li>
                            <li><a href="javascript:void(0);" onclick="window.location='<?PHP echo base_url();?>'" class="wt-btn">End</a></li>
                            <?PHP
                            if(!$this->session->userdata('member_data'))
                            {
                            ?>
                                <li><a  href="javascript:void(0);" onclick="open_popup('<?PHP echo base_url();?>member/signup');" class="wt-btn">Add</a></li>
                            <?PHP
                            }
                            else
                            {
                            ?>
                                <li><a href="javascript:void(0);" onclick="send_friend_request('<?PHP echo $trip_data[0]->id?>');" class="wt-btn">Add</a></li>
                            <?PHP
                            }
                            ?>
                        </ul>  
                    </div>
                    
                    </div>
                </div>
            </div>
