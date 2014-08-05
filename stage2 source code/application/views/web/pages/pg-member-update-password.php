<form id="updatePasswordFrm" name="updatePasswordFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table style="width: 500px;" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
            <p>
                <label>*<strong>Old Password:</strong></label>
                <input size="60" name="old_password" id="old_password" type="password" value="<?PHP echo set_value('old_password');?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Password:</strong></label>
                <input size="60" name="password" id="password" type="password" value="<?PHP echo set_value('password');?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Confirm Password:</strong></label>
                <input size="60" name="confirm_password" id="confirm_password" type="password" value="<?PHP echo set_value('password');?>" class="validate[required,equals[password]]"/>
            </p>

            <p>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Update Password" />
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