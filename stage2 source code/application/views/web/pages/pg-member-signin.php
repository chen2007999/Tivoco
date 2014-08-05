<form id="loginFrm" name="loginFrm"  enctype="multipart/form-data" method="post" action="">
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
                <label>*<strong>Password:</strong></label>
                <input size="60" name="password" id="password" type="password" value="<?PHP echo set_value('password');?>" class="validate[required]"/>
            </p>

            <p>
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Sign In" />&nbsp;
                <a href="<?PHP echo base_url();?>member/forgotpassword">forgot password?</a>
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