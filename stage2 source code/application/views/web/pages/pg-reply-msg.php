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
    <input type="hidden" name="to" id="to" value="<?PHP echo $to;?>"/>
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