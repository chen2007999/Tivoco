<script>
function generateSlug(Text)
{
	document.getElementById('slug').value = Text.toLowerCase().replace(/[^\w ]+/g,'').replace(/ +/g,'-');
}

</script>

<form id="contentFrm" name="contentFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table width="100%" cellpadding="0" cellspacing="0">	
	<tr>
    	<td>
            <p>
                <label>*<strong>Title:</strong></label>
                <input size="60" name="title" id="title" type="text" value="<?PHP echo set_value('title',$row->title);?>" class="validate[required]" onkeyup="generateSlug(this.value);" onkeydown="generateSlug(this.value);" />
            </p>

            <p>
                <label>*<strong>Slug:</strong></label>
                <input size="60" name="slug" id="slug" type="text" value="<?PHP echo set_value('slug',$row->slug);?>" class="validate[required]" readonly="readonly" />
            </p>

            <p>
                <label for="metas"><strong>Metas (for seo):</strong></label>
                <textarea name="metas" id="metas" cols="" rows="" style="width:90%;height:100px; resize:none;"><?PHP echo set_value('metas',$row->metas);?></textarea>
            </p>
            
        </td>
    </tr>
	<tr>
	  <td>
        <p>
            <label for="content">*<strong>Description/Detail:</strong></label>
            <textarea name="content" id="content" cols="" rows="" style="width:100%;height:350px;"><?PHP echo set_value('content',$row->content);?></textarea>
          </p>        
          
         <p>
            <input type="submit" name="btnSubmit" id="btnSubmit" value="Save" /> 
            <!--<input type="button" onclick="window.location='<?PHP /*echo base_url();*/?>administration/content'" value="cancel"/> -->
         </p>
      </td>
	  </tr>
</table>
<input type="hidden" name="id" id="id" value="<?PHP if(isset($row)){echo $row->id;}?>"/>
</fieldset>
</form>