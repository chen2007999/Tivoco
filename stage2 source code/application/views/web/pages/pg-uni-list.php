<?PHP
/* @var $this CI_Controller*/
?>

<fieldset>
    <legend><h1><?php echo $page_title; ?></h1></legend>
    <table style="width:575px;" id="example" width="100%" cellpadding="4" cellspacing="2" align="center">
    <tr>
    	<td><strong>University Name</strong></td>
        <td><strong>Domain</strong></td>
        <td><strong>Phone No</strong></td>
    </tr>
    <?PHP $i=0; foreach($unis as $uni){?>
        <tr <?PHP if($i%2==0){?>style="background-color:#ccc;"<?PHP }?>>
            <td>
                <?PHP echo $uni->uni_name;?>
            </td>
            <td>
            	<?PHP echo $uni->domain;?>
            </td>
            <td>
           		<?PHP echo $uni->phone_no;?>
            </td>            
        </tr>
    <?PHP $i++;}?>    
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