<form id="membersProfileFrm" name="membersProfileFrm"  enctype="multipart/form-data" method="post" action="">
    <fieldset>
        <legend><h2><?php echo $page_title; ?></h2></legend>
        <table style="width: 700px;" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <p>
                        <label>*<strong>First Name:</strong></label>
                        <input size="60" name="first_name" id="first_name" type="text" value="<?PHP echo set_value('first_name',$row->first_name);?>" class="validate[required]"/>
                    </p>

                    <p>
                        <label>*<strong>Last Name:</strong></label>
                        <input size="60" name="last_name" id="last_name" type="text" value="<?PHP echo set_value('last_name',$row->last_name);?>" class="validate[required]"/>
                    </p>

                    <p>
                        <label>*<strong>User Name:</strong></label>
                        <input readonly size="60" name="user_name" id="user_name" type="text" value="<?PHP echo set_value('user_name',$row->user_name);?>" class="validate[required]"/>
                    </p>

                    <p>
                        <label>*<strong>Email:</strong></label>
                        <input readonly size="60" name="email" id="email" type="text" value="<?PHP echo set_value('email',$row->email);?>" class="validate[required,custom[email]]"/>
                    </p>

                    <p>
                        <label><strong>Mobile No:</strong></label>
                        <input size="60" name="mobile_no" id="mobile_no" type="text" value="<?PHP echo set_value('mobile_no',$row->mobile_no);?>"/>
                    </p>

                    <p>
                        <label><strong>University:</strong></label>
                        <input size="60" name="university" id="university" type="text" value="<?PHP echo set_value('university',$row->university);?>"/>
                    </p>

                    <p>
                        <label><strong>Major:</strong></label>
                        <input size="60" name="major" id="major" type="text" value="<?PHP echo set_value('major',$row->major);?>"/>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>
                        <label for="content">*<strong>Description/Detail:</strong></label>
                        <textarea name="description" id="description" cols="" rows="" style="width:100%;height:350px;"><?PHP echo set_value('description',$row->description);?></textarea>
                    </p>

                    <p>
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Save" />
                        <!--<input type="button" onclick="window.location='<?PHP /*echo base_url();*/?>administration/content'" value="cancel"/> -->
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