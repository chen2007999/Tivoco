<form id="adminUsersFrm" name="adminUsersFrm"  enctype="multipart/form-data" method="post" action="">
<fieldset>
<legend><h2><?php echo $page_title; ?></h2></legend>
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
            <p>
                <label>*<strong>User Name:</strong></label>
                <input size="60" name="username" id="username" type="text" value="<?PHP echo set_value('username',$row->username);?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Password:</strong></label>
                <input size="60" name="password" id="password" type="password" value="<?PHP echo set_value('password',$row->password);?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Email:</strong></label>
                <input size="60" name="useremail" id="useremail" type="text" value="<?PHP echo set_value('useremail',$row->useremail);?>" class="validate[required,custom[email]]" />
            </p>
            <p>
                <label>*<strong>Status:</strong></label>
                <select name="status" id="status" class="validate[required]">
                    <option value="">Select</option>
                    <option value="1" <?PHP if($row->status == 1){echo set_select('status', 1, true);}else{echo set_select('status', 1); }?>>Active</option>
                    <option value="0" <?PHP if($row->status == 0){echo set_select('status', 0, true);}else{echo set_select('status', 0); }?>>Suspend</option>
                </select>
            </p>
        </td>
    </tr>
	<tr>
	  <td>
        <p>
            <label for="content"><strong>Notes (these notes will be visible to the user):</strong></label>
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