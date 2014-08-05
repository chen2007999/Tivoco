<form id="forgotPasswordFrm" name="forgotPasswordFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table style="width: 500px;" cellpadding="0" cellspacing="0">
	<tr>
    	<td>

            <p>
                <label>*<strong>User Name:</strong></label>
                <input size="60" name="user_name" id="user_name" type="text" value="<?PHP echo set_value('user_name');?>" class="validate[required]"/>
            </p>

            <p>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Send Password" />
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