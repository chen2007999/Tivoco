<!-- TinyMCE -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		
		verify_html:false,
		valid_elements : "td[background]",
		document_base_url : "<?PHP echo base_url();?>",
		mode : "exact",
		elements : "notes,content,description,comments",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		<!--theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",-->
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		file_browser_callback : "tinyBrowser",

		// Example content CSS (should be your site CSS)
		content_css : "",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<!-- /TinyMCE -->

<!-- Jquery validation Engine -->	
<script>
var base_url = "<?PHP echo base_url();?>"
var max_limit = "";
</script>
<link rel="stylesheet" href="<?PHP echo base_url()?>assets/validationengine/css/validationEngine.jquery.css" type="text/css"/>
<script src="<?PHP echo base_url()?>assets/validationengine/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?PHP echo base_url()?>assets/validationengine/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url();?>assets/validationengine/js/contrib/other-validations.js" type="text/javascript" charset="utf-8"></script>
<script src="<?PHP echo base_url()?>assets/validationengine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script>
	var j = jQuery.noConflict();
	j(document).ready(function(){
		// binds form submission and fields to the validation engine
		
		j("#loginForm,#accountSettingsFrm,#adminUsersFrm,#contentFrm,#feedbackFrm,#membersFrm,#templatesFrm,#uniFrm").validationEngine({
				ajaxFormValidationMethod: 'post'		
			});
		
		
		/*j('input').attr('data-prompt-position','bottomLeft');
		j('input').data('promptPosition','bottomLeft');
		j('select').attr('data-prompt-position','bottomLeft');
		j('select').data('promptPosition','bottomLeft');*/
	});		
</script>

<!-- End Jquery Validation Engine -->

<!-- Data Table Includes -->
<style type="text/css" title="currentStyle">
	@import "<?PHP echo base_url()?>assets/media/css/jquery.dataTables_themeroller.css";
	@import "<?PHP echo base_url()?>assets/media/css/smoothness/jquery-ui-1.8.22.custom.css";	
	@import "<?PHP echo base_url()?>assets/media/css/TableTools_JUI.css";
</style>
<script type="text/javascript" language="javascript" src="<?PHP echo base_url()?>assets/media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?PHP echo base_url()?>assets/media/js/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="<?PHP echo base_url()?>assets/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="<?PHP echo base_url()?>assets/media/js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8" src="<?PHP echo base_url()?>assets/media/js/ZeroClipboard.js"></script>
<script type="text/javascript" charset="utf-8" src="<?PHP echo base_url()?>assets/media/js/jquery.dataTables.columnFilter.js"></script>
<script>
// This function is to refresh the grid user of function is $('#example').dataTable().fnReloadAjax();
$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
    if ( typeof sNewSource != 'undefined' && sNewSource != null ) {
        oSettings.sAjaxSource = sNewSource;
    }
 
    // Server-side processing should just call fnDraw
    if ( oSettings.oFeatures.bServerSide ) {
        this.fnDraw();
        return;
    }
 
    this.oApi._fnProcessingDisplay( oSettings, true );
    var that = this;
    var iStart = oSettings._iDisplayStart;
    var aData = [];
  
    this.oApi._fnServerParams( oSettings, aData );
      
    oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
        /* Clear the old information from the table */
        that.oApi._fnClearTable( oSettings );
          
        /* Got the data - add it to the table */
        var aData =  (oSettings.sAjaxDataProp !== "") ?
            that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
          
        for ( var i=0 ; i<aData.length ; i++ )
        {
            that.oApi._fnAddData( oSettings, aData[i] );
        }
          
        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
          
        if ( typeof bStandingRedraw != 'undefined' && bStandingRedraw === true )
        {
            oSettings._iDisplayStart = iStart;
            that.fnDraw( false );
        }
        else
        {
            that.fnDraw();
        }
          
        that.oApi._fnProcessingDisplay( oSettings, false );
          
        /* Callback user function - for event handlers etc */
        if ( typeof fnCallback == 'function' && fnCallback != null )
        {
            fnCallback( oSettings );
        }
    }, oSettings );
};
</script>
<!-- Data Table Includes -->

<!-- Color Box -->
<link rel="stylesheet" href="<?PHP echo base_url()?>assets/colorbox/example3/colorbox.css" />
<script src="<?PHP echo base_url()?>assets/colorbox/jquery.min.1.7.1.js"></script>
<script src="<?PHP echo base_url()?>assets/colorbox/jquery.colorbox.js"></script>
<script>
    var cb = jQuery.noConflict();

    function Resize_Box(){
        var x = cb('body').width();
        var y = cb('body').height();
        parent.cb.fn.colorbox.resize({
            innerWidth: x,
            innerHeight: y
        });
    }

    cb(document).ready(function(){
        Resize_Box();
    });

    //usage
    /*<p><a class='iframe' title='hello' rel="group1" href="http://threadless.com">Outside Webpage (Iframe)</a></p>
     <p><a class='iframe_refresh' title='hello1' rel="group1" href="http://threadless.com">Outside Webpage (Iframe)</a></p>*/
</script>

<!-- /End Color Box-->

<!-- Function to show hide divs-->
<script language="javascript" type="text/javascript">
    function showhide_(objid)
    {
        obj = document.getElementById(objid);
        if (obj.style.display == 'none')
        {
            obj.style.display = 'inline';
        }
        else if (obj.style.display == 'inline')
        {
            obj.style.display = 'none';
        }
    }
</script>
<!-- End function to show hide divs-->