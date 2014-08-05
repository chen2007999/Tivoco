<?PHP
/* @var $this CI_Controller*/
?>

<fieldset>
    <legend><h1><?php echo $page_title; ?></h1></legend>
    <table style="width:500px;" id="example" width="100%"  cellpadding="4" cellspacing="2" align="center">
        <?PHP
        $requests = $this->db_model->get_rows('friends',array('status'=>'Pending','member_id'=>$this->session->userdata('member_data')->id));
        if($requests)
        {
			$i=0;
            foreach($requests as $request)
            {
                $member_data = $this->db_model->get_row('members',array('id'=>$request->friend_id));
            ?>
                <tr <?PHP if($i%2==0){?>style="background-color:#ccc;"<?PHP }?>>
                    <td>
                        <p><?PHP echo $member_data->first_name." ".$member_data->last_name;?></p>
                    </td>
                    <td style="width:75px;">
                        <a href="<?PHP echo base_url();?>friend/accept/<?PHP echo $request->friend_id;?>">Accept</a>
                    </td>
                </tr>
            <?PHP
			$i++;
            }

        }
        else
        {
            ?>
            <tr>
                <td colspan="2">You have no request pending...</td>
            </tr>
            <?PHP
        }
        ?>


    </table>
</fieldset>

<script>
    cb(window).load(function() {
        var x = cb('table').width();
        var y = cb('table').height();
        parent.cb.fn.colorbox.resize({
            innerWidth: x,
            innerHeight: y
        });
    });
</script>