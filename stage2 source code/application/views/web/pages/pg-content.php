<?PHP
/* @var $this CI_Controller*/
?>

<fieldset>
    <legend><h1><?php echo $page_data->title; ?></h1></legend>
    <table style="width:<?PHP if(isset($content_width)){echo $content_width;}else{echo 575;}?>px;" id="example" width="100%" cellpadding="0" cellspacing="0" align="center">
        <tr>
            <td>
                <?PHP echo $page_data->content;?>
            </td>
        </tr>
    </table>
</fieldset>

<?PHP
if(isset($feedback_form))
{
    ?>
    <iframe src="<?PHP echo base_url()."feedback";?>" scrolling="no" width="575" height="475" frameborder="0" style="margin: 0px; padding: 0px;" align="middle"></iframe>
    <?PHP
}
?>

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