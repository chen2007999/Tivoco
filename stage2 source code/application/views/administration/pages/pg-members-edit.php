<form id="membersFrm" name="membersFrm"  enctype="multipart/form-data" method="post" action="">
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
                <label>*<strong>User Name:</strong></label>
                <input size="60" name="user_name" id="user_name" type="text" value="<?PHP echo set_value('user_name',$row->user_name);?>" class="validate[required]"/>
            </p>

            <p>
                <label>*<strong>Email:</strong></label>
                <input size="60" name="email" id="email" type="text" value="<?PHP echo set_value('email',$row->email);?>" class="validate[required,custom[email]]"/>
            </p>

            <p>
                <label>*<strong>Password:</strong></label>
                <input size="60" name="password" id="password" type="password" value="<?PHP echo set_value('password',$row->password);?>" class="validate[required]"/>
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

            <p>
                <label>*<strong>Status:</strong></label>
                <select name="status" id="status" class="validate[required]">
                    <option value="">Select</option>
                    <option value="Active" <?PHP if($row->status == 'Active'){echo set_select('status', 'Active', true);}else{echo set_select('status', 'Active'); }?>>Active</option>
                    <option value="Suspended"  <?PHP if($row->status == 'Suspended'){echo set_select('status', 'Suspended', true);}else{echo set_select('status', 'Suspended'); }?>>Suspend</option>
                </select>
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
<input type="hidden" name="id" id="id" value="<?PHP if(isset($row)){echo $row->id;}?>"/>
</fieldset>
</form>