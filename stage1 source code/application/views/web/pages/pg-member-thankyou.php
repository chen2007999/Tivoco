<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table style="width: 500px;" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
            <p>
                Thankyou for Sign Up with us...! <br/><br/>
                A confirmation email has been sent to you at <strong><?PHP echo $pg_data['email'];?></strong><br/><br/>
                Please verify your email address to make your account active.
            </p>

        </td>
    </tr>
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