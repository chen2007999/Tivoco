<form id="feedbackFrm" name="feedbackFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table width="100%" cellpadding="0" cellspacing="0">	
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
                <label>*<strong>Email:</strong></label>
                <input size="60" name="email" id="email" type="text" value="<?PHP echo set_value('email',$row->email);?>" class="validate[required]"/>
            </p>

        </td>
    </tr>
	<tr>
	  <td>
        <p>
            <label for="content">*<strong>Comments:</strong></label>
            <textarea name="comments" id="comments" cols="" rows="" style="width:100%;height:350px;"><?PHP echo set_value('comments',$row->comments);?></textarea>
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