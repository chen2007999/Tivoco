function refresh_content(resultDiv, url)
{
    if(resultDiv == 'friends_list' && typeof is_ref != 'undefined' && is_ref == false)
    {
        //alert(is_ref);
    }
    else
    {
       // alert(is_ref);

        j.ajax
        ({
            /*beforeSend: function()
            {
                j('.ajax-loader').show();
            },
            complete: function(){
                j('.ajax-loader').hide();
            },*/
            type: "POST",
            url: url,
            cache: false,
            success: function(html)
            {
                j("#"+resultDiv).html(html);
            }
        });
    }
}

function send_friend_request(id)
{
    cb.colorbox({
        iframe:true,
        innerWidth:32,
        innerHeight:32,
        initialWidth:32,
        initialHeight:32,
        opacity:0.6,
        href:base_url+'friend/add/'+id,
        fastIframe:false,
        open:true,
        onClosed: function()
        {
            /*refresh_content('top_navigation',""+base_url+"home/top_nav");
            refresh_content('sub_navigation',""+base_url+"home/sub_nav");
            refresh_content('friends_list',""+base_url+"member/friends_list");*/
        }
    });
}

function see_friend_requests()
{
    cb.colorbox({
        iframe:true,
        innerWidth:32,
        innerHeight:32,
        initialWidth:32,
        initialHeight:32,
        opacity:0.6,
        href:base_url+'friend/requests',
        fastIframe:false,
        open:true,
        onClosed: function()
        {
            /*refresh_content('top_navigation',""+base_url+"home/top_nav");
            refresh_content('sub_navigation',""+base_url+"home/sub_nav");
            refresh_content('friends_list',""+base_url+"member/friends_list");*/
        }
    });
}

function open_popup(url)
{
    cb.colorbox({
        iframe:true,
        innerWidth:32,
        innerHeight:32,
        initialWidth:32,
        initialHeight:32,
        opacity:0.6,
        href:url,
        fastIframe:false,
        open:true,
        onClosed: function()
        {
            /*refresh_content('top_navigation',""+base_url+"home/top_nav");
            refresh_content('sub_navigation',""+base_url+"home/sub_nav");
            refresh_content('friends_list',""+base_url+"member/friends_list");*/
        }
    });
}

function submit_form()
{
    j(".frmSubmit").submit(function(e)
    {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        j.ajax(
            {
                url : formURL,
                type: "POST",
                data : postData,
                success:function(data, textStatus, jqXHR)
                {
                    alert('Selected message has been deleted')
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    alert('Sorry, we can\'t process your request at this time.');
                },
                complete: function()
                {
                    //refresh_content('body_content',''+base_url+'mailbox');
					history.go();
                }
            });
        e.preventDefault();	//STOP default action
    });

    j(".frmSubmit").submit();
}


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