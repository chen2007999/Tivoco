<ul id="menu" style="padding: 5px;">
    <li><a href="<?php echo base_url(); ?>" target="_parent">&raquo; Home</a></li>
    <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>about-us">&raquo; About Us</a></li>
    <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>privacy-policy">&raquo; Privacy Policy</a></li>
    <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>terms">&raquo; Terms</a></li>
    <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>feedback/index/1">&raquo; Feedback</a></li>
    <?PHP if($this->session->userdata('member_data')){?>
        <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>member/profile">&raquo; Profile</a></li>
        <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>member/account">&raquo; Account</a></li>
        <li><a href="<?php echo base_url(); ?>member/logout">&raquo; Logout</a></li>
    <?PHP }else{?>
        <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>member/signup">&raquo; Sign Up</a></li>
        <li><a class="iframe_auto_w_h" href="<?php echo base_url(); ?>member/signin">&raquo; Sign In</a></li>
    <?PHP }?>
</ul>

<!-- Color Box -->
<script>
    cb(document).ready(function(){
        // color box initialization code

        cb(".iframe_auto_w_h").colorbox({
            iframe:true,
            innerWidth:32,
            innerHeight:32,
            initialWidth:32,
            initialHeight:32,
            opacity:0.6,
            fastIframe:false,
            onClosed:function()
            {
                top_navigation();
            }
        });

        cb("#activation_popup").colorbox({
            iframe:true,
            innerWidth:32,
            innerHeight:32,
            initialWidth:32,
            initialHeight:32,
            opacity:0.6,
            fastIframe:false,
            open:true,
            onClosed: function()
            {
                top_navigation();
            }

        });

        cb(".iframe_auto_w_h_refresh").colorbox({
            iframe:true,
            innerWidth:32,
            innerHeight:32,
            initialWidth:32,
            initialHeight:32,
            opacity:0.6,
            fastIframe:false,
            onClosed:function()
            {
                self.parent.location.reload();
            }
        });




        /* <?PHP if($this->session->userdata('member_data') && !$this->member_model->is_profile_completed()){?>
         cb.colorbox({ href:"<?PHP echo base_url();?>member/profile" });
        <?PHP }?>*/

    });
</script>
<!-- /End Color Box-->