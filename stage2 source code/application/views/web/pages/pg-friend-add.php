<?PHP
/* @var $this CI_Controller*/
?>

<fieldset>
    <legend><h1><?php echo $page_title; ?></h1></legend>
    <table style="width:400px;" id="example" width="100%" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td>
                <p><?PHP echo $message;?></p>
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