<style>
tfoot {
    display: table-header-group;
	vertical-align:top;
}
</style>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	 initDataTables();
});	
	
function initDataTables(){	
 $('#example').dataTable( {

		"bJQueryUI": true,	
		"aLengthMenu": [[10, 25 , 50, 100, -1],[10, 25 , 50, 100, "All"]],     
		"sPaginationType": "full_numbers",
		"bProcessing": true,
		"bStateSave": true,
		"bAutoWidth": false,		
		"sDom": '<"H"CTlfr>t<"F"ilp>',
		
		"oTableTools": 
			{
				"aButtons": 
				[
                    {
                        "sExtends":    "text",
                        "sButtonText": "Add New",
                        "fnClick": function ( nButton, oConfig, oFlash )
                        {
                            cb.colorbox({
                                iframe:true,
                                width:"90%",
                                height:'75%',
                                href: '<?PHP echo base_url();?>administration/universities/add',
                                onClosed:function()
                                {
                                    $('#example').dataTable().fnReloadAjax();
                                }
                            });
                        }
                    }
				]			
		},  				
				
		"aoColumns": [
						{ "sWidth": "auto" },
                        { "sWidth": "auto" },
                        { "sWidth": "auto" },
                        { "sWidth": "auto" },
                        { "sWidth": "auto" },
						{ "sWidth": "2%","bSortable": false, "fnRender": function(obj){return gen_link('administration/universities/edit/','edit.gif',obj.aData[5],false);}},
						{ "sWidth": "2%","bSortable": false, "fnRender": function(obj){return gen_link('administration/universities/del/','del.gif',obj.aData[6],true);}}
					 ],					
		
		"fnDrawCallback": function() 
		{
            // color box initialization code
            cb(".iframe").colorbox({
                iframe:true,
                width:"90%",
                height:'75%'
            });

            cb(".iframe_refresh").colorbox({
                iframe:true,
                width:"90%",
                height:'75%',
                onClosed:function()
                {
                    $('#example').dataTable().fnReloadAjax();
                }
            });
        },
		
		"sAjaxSource": "<?PHP echo base_url()?>administration/universities/grid/"
		
	} )
	
	.columnFilter({
			aoColumns: [
					{type: "text"},
					{type: "text"},
					null,
                    null,
                    null,
                    null,
                    null
				]
		});			
}

function status(status)
{
    if(status == 0)
    {
        return "Suspended";
    }
    else if(status == 1)
    {
        return "Active";
    }
}


function gen_link(loc,icon,id,_alert)
{
  var linkhtml = '';
  
  if(_alert)
  {
	   linkhtml = '<a onclick ="return confirm(\'Are you sure to delete this record?\');" href ="<?php echo base_url(); ?>'+loc+id+'"><img src = "<?php echo base_url(); ?>assets/images/administration/icons/'+icon+'" alt="" /></a>';	
  }
  else
  {  
  		linkhtml = '<a class="iframe_refresh" href ="<?php echo base_url(); ?>'+loc+id+'"><img src = "<?php echo base_url(); ?>assets/images/administration/icons/'+icon+'" alt="" /></a>';
  }
  
  return linkhtml;
}
</script>

<h1><?php echo $page_title; ?></h1>

<table id="example" width="100%" cellpadding="0" cellspacing="0" class="dataTableGridNJ">
    <thead>
      <tr>
        <th align="left"><strong>Name</strong></th>
        <th align="left"><strong>Domain</strong></th>
        <th align="left"><strong>Phone no</strong></th>
        <th align="left"><strong>Status</strong></th>
        <th align="left"><strong>Last Modified</strong></th>
        <th align="left"></th>
        <th align="left"></th>
      </tr>
    </thead>
    <tfoot>
     <tr>
        <th align="left"></th>
        <th align="left"></th>
        <th align="left"></th>
        <th align="left"></th>
        <th align="left"></th>
        <th align="left"></th>
        <th align="left"></th>
      </tr>
    </tfoot>
</table>