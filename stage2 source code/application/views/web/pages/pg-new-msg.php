<?PHP
/**
 *@var $this CI_Controller
 */
?>

<form id="newMsgFrm" name="newMsgFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table style="width: 500px;" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
            <p>
                <label>*<strong>Select Friend:</strong></label>

                <select name="friend_id" id="friend_id">
                <?PHP
                    $friends_list = $this->db_model->sql('SELECT * FROM {PRE}friends where member_id='.$this->session->userdata('member_data')->id.' AND status = "Accept"');
                    foreach($friends_list as $fl)
                    {
                        $f_data= $this->db_model->get_row('members',array('id'=>$fl->friend_id));
                        ?>
                        <option value="<?PHP echo $f_data->id;?>" <?php echo set_select('friend_id', $f_data->id); ?>><?PHP echo $f_data->first_name." ".$f_data->last_name;?></option>
                        <?PHP
                    }
                ?>
                </select>
            </p>

            <p>
                <label>*<strong>Subject:</strong></label>
                <input size="60" name="subject" id="subject" type="text" value="<?PHP echo set_value('subject');?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Message:</strong></label>
                <textarea name="message" id="message" class="validate[required]"><?PHP echo set_value('message');?></textarea>
            </p>

            <p>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
            </p>

        </td>
    </tr>
</table>
</fieldset>
</form>

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