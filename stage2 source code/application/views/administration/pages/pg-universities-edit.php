<form id="" name="uniFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
            <p>
                <label>*<strong>Name:</strong></label>
                <input size="60" name="uni_name" id="uni_name" type="text" value="<?PHP echo set_value('uni_name',$row->uni_name);?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Domain:</strong></label>
                <input size="60" name="domain" id="domain" type="text" value="<?PHP echo set_value('domain',$row->domain);?>" class="validate[required]"/>
            </p>

            <p>
                <label><strong>Phone No:</strong></label>
                <input size="60" name="phone_no" id="phone_no" type="text" value="<?PHP echo set_value('phone_no',$row->phone_no);?>" />
            </p>
            <p>
                <label><strong>Address</strong></label>
                <textarea name="address" id="address" cols="" rows=""><?PHP echo set_value('address',$row->address);?></textarea>
            </p>
            <p>
                <label>*<strong>Status:</strong></label>
                <select name="status" id="status" class="validate[required]">
                    <option value="">Select</option>
                    <option value="Active" <?PHP if($row->status == 'Active'){echo set_select('status', 'Active', true);}else{echo set_select('status', 'Active'); }?>>Active</option>
                    <option value="In Active" <?PHP if($row->status == 'In Active'){echo set_select('status', 'In Active', true);}else{echo set_select('status', 'In Active'); }?>>In Active</option>
                </select>
            </p>
        </td>
    </tr>
	<tr>
	  <td>
        <p>
            <label><strong>Notes:</strong></label>
            <textarea name="notes" id="notes" cols="" rows="" style="width:100%;height:350px;"><?PHP echo set_value('notes',$row->notes);?></textarea>
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