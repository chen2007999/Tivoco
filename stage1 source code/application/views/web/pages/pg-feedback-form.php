<table style="width:575px;" id="example" width="100%" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td>
            <form id="feedbackFrm" name="feedbackFrm"  enctype="multipart/form-data" method="post" action="">
                <fieldset>
                    <legend><h1>Feedback</h1></legend>
                    <p>
                        <label>*<strong>First Name:</strong></label>
                        <input size="60" name="first_name" id="first_name" type="text" value="<?PHP echo set_value('first_name');?>" class="validate[required]"/>
                    </p>

                    <p>
                        <label>*<strong>Last Name:</strong></label>
                        <input size="60" name="last_name" id="last_name" type="text" value="<?PHP echo set_value('last_name');?>" class="validate[required]"/>
                    </p>

                    <p>
                        <label>*<strong>Email:</strong></label>
                        <input name="email" id="email" type="text" value="<?PHP echo set_value('email');?>" class="validate[required,custom[email]]"/>
                    </p>

                    <p>
                        <label>*<strong>Comments:</strong></label>
                        <textarea name="comments" id="comments" class="validate[required]" style="width: 400px;"><?PHP echo set_value('comments');?></textarea>
                    </p>

                    <p>
                        <input type="submit" name="btnSubmit" id="btnSubmit" value="Submit" />
                    </p>
                </fieldset>
            </form>
         </td>
    </tr>
</table>

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