<form id="memberSignupFrm" name="memberSignupFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table style="width: 500px;" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
            <!--<p>
                <label>*<strong>First Name:</strong></label>
                <input size="60" name="first_name" id="first_name" type="text" value="<?PHP /*echo set_value('first_name');*/?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Last Name:</strong></label>
                <input size="60" name="last_name" id="last_name" type="text" value="<?PHP /*echo set_value('last_name');*/?>" class="validate[required]"/>
            </p>-->

            <p>
                <label>*<strong>User Name:</strong> (This will be used as login name)</label>
                <input size="60" name="user_name" id="user_name" type="text" value="<?PHP echo set_value('user_name');?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Email:</strong></label>
                <input name="eml" id="eml" type="text" value="<?PHP echo set_value('eml');?>" class="validate[required]"/>
                @
                <select name="domain" id="domain">
                <?PHP
                    $uni_data = $this->db_model->sql('SELECT * FROM {PRE}universities order by domain asc');
                    foreach($uni_data as $ud)
                    {
                        ?>
                        <option value="<?PHP echo $ud->domain;?>" <?php echo set_select('domain', $ud->domain); ?>><?PHP echo $ud->domain;?></option>
                        <?PHP
                    }
                ?>
                </select>
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
                <input type="submit" name="btnSubmit" id="btnSubmit" value="Register Now" />
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