<?php 
if (isset($_POST['btnProcessing'])) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $mail = $_POST['email'];
    $psw1 = $_POST['password_1'];
    $psw2 = $_POST['password_2'];
    $gname = $_POST['g_name'];
    if ((strlen($psw1) < 8) && (strlen($psw1) < 8)) {
        echo "<script>window.alert('Password must be atleast 8 characters');</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=signup.php">';
        exit();
    }
    if ($psw1 != $psw2) {
        echo "<script>window.alert('Password does not match its confirmation');</script>";
        echo '<META HTTP-EQUIV="refresh" content="0;URL=signup.php">';
        exit();
    }
    $conn = mysqli_connect('localhost','root','','mychama') or die (mysql_error());
    /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
    mysqli_query($conn,"insert into mychama_users(first_name, last_name, email, password, g_name,status) values ('$fname', '$lname', '$mail','$psw1', '$gname','new')") or die(mysqli_error($conn));
    mysqli_query($conn,"insert into total(amount, chama) values ('0', '$mail')") or die(mysqli_error($conn));
    echo "<script>window.alert('Success! Check your mail inbox for verification link')</script>";
    header("refresh:0.1; url=login.php");

$message = "
Confirm your email address.

Hello $fname $lname,

Thanks for signing up for a Chama account with MyChama. To activate your account, you’ll first need to confirm your email via the link below.
NOTE: If you can't click the links, just copy it to your browser.

https://kinix.co.ke/verified.php?user=".$mail."

If you have questions about your account, please visit https://kinix.co.ke and click Contact.
Best regards,
Nixon Kimeli,
C.E.O.
MyChama

Copyright © 2018 MyChama. All rights reserved.";
    
    /*if (mail($mail, "MyChama account verification", $message)) {
            echo "<script>window.alert('Success! Check your mail inbox for verification link')</script>";
            header("refresh:0.1; url=login.php");
        }
        else {
            echo "<script>window.alert('Message not sent!');</script>";
            header("refresh:0.1; url=signup.php");
            exit();
        mysqli_close($conn);
    }*/
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8" />
        <title>Sign Up for MyChama</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->

        <link href="uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery.min.js"></script>

        <link href="templates/admin_themes/groups/css/global/plugins/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/plugins/simple-line-icons/simple-line-icons.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/plugins/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

        <link href="templates/admin_themes/groups/css/global/plugins/uniform/css/uniform.default.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/plugins/bootstrap-toastr/toastr.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/css/components-md.min.css" type="text/css" rel="stylesheet" />

        <link href="templates/admin_themes/groups/css/layouts/layout4/css/layout.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/layouts/layout4/css/themes/light.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/layouts/layout4/css/custom.min.css" type="text/css" rel="stylesheet" />

        <link href="templates/admin_themes/groups/css/global/plugins/select2/css/select2.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/plugins/select2/css/select2-bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/global/css/components-md.min.css" type="text/css" rel="stylesheet" />
        <link href="templates/admin_themes/groups/css/apps/css/todo.min.css" type="text/css" rel="stylesheet" />

        
        
        <link href="templates/admin_themes/groups/css/custom.css" type="text/css" rel="stylesheet" />
                        <!-- END THEME LAYOUT STYLES -->

    <!-- END HEAD -->
    <!-- END HEAD -->
    <script type="text/javascript">
        window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
          heap.load("3178775544");
    </script>
    </head>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-md page-sidebar-fixed page-footer-fixed authentication">
        <div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="index.php">
                <img src="uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
            </a>
        </div>
    </div>
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<div class="page-container">
<div class="page-content-wrapper">
<div class="page-content authentication"> 
<div class="body-content-details">
<div class="row">

<div class="col-md-6 col-md-offset-3">
<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
<div class="portlet-body form">
<div class='margin-top-10 margin-bottom-10 logo text-center hidden-md hidden-lg'>
<a href="index.php">
<img width='150px' src="uploads/logos/logo_(1)7.png" alt="Login Logo"/>
</a>
</div>
<!-- form begins here -->
<form method="post" class="login-form form_submit" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="dc3b455cd4f9052303d9b3b0154ea8bc" style="display:none;" />
<fieldset>
<legend class="call-to-action text-center">Sign Up Now!</legend>

<div class="form-body">

<div class='row'>
<div class="col-md-6">
<div class="form-group">
<label>First Name <span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-user"></i>
</span> 
<input type="text" name="first_name" class="form-control " autocomplete="off" style="text-transform:capitalize;" placeholder="First Name" required/>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Last Name <span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-user"></i>
</span>
<input type="text" name="last_name" class="form-control " autocomplete="off" style="text-transform:capitalize;" placeholder="Last Name" required/>
</div>
</div>
</div>
</div>
<div class="form-group">
<label>Email Address<span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-envelope"></i>
</span>
<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email Address" required/>
</div>
</div>
<div class="form-group">
<label>Password <span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-lock"></i>
</span>
<input type="password" name="password_1" value=""  class="form-control" autocomplete="off" placeholder="Password" required/>
</div>
<span class="help-block">More than 8 characters</span>
</div>
<div class="form-group">
<label>Confirm Password <span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-lock"></i>
</span>
<input type="password" name="password_2" value=""  class="form-control" autocomplete="off" placeholder="Password" required/>
</div>
<span class="help-block">More than 8 characters</span>
</div>
<div class="form-group">
<label>Your Investment Group Name <span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-group"></i>
</span>
<input type="text" name="g_name" class="form-control" autocomplete="off" placeholder="Group Name" required/>
</div>
</div>
<div class="margin-bottom-15 row">
<div class="col-sm-12 text-right">
<div class="forgot-password">
<a href="login.php" id="login" class="login">I already have an account. Take me to the login.</a>
</div>
</div>
</div>
<div class="form-actions text-right">
<button type="submit" class="btn blue submit_form_button" name="btnProcessing">Sign Up</button>
<button type="button" class="btn blue processing_form_button disabled" name="processing" value="processing"><i class="fa fa-spinner fa-spin"></i> Processing</button> 
</div>
</fieldset>
</form>            
</div>
</div>
</div>
</div>

<!-- form ends here -->

<script>
    $(document).ready(function(){
        $('#referrer_id').change(function(){
            var selected_referrer_id = $(this).val();
            $('.referrer_information_holder').slideUp();
            $('.referrer_information').prop('disabled',true);
            $('input[name=referrer_information_required]').each(function(){
                $(this).prop('disabled',true);
            });
            $('#referrer_information_holder_'+selected_referrer_id).slideDown();
            $('#referrer_information_'+selected_referrer_id).prop('disabled',false);
            $('#referrer_information_required_'+selected_referrer_id).prop('disabled',false);
        });
        
    });
</script>

            </div>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?php echo date("Y"); ?> &copy;
        <a href="index.php" title="Chamasoft" target="_blank">MyChama</a>
    </div>
    &nbsp; All Rights Reserved
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="https://chamasoft.com/templates/admin_themes/groups/js/global/plugins/js.cookie.min.js"></script>-->
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/uniform/jquery.uniform.min.js"></script>
<!--<script type="text/javascript" src="https://chamasoft.com/templates/admin_themes/groups/js/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery.blockui.min.js"></script>


<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/scripts/app.min.js"></script>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/pages/scripts/components-select2.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/pages/scripts/form-input-mask.js"></script>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/counterup/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/counterup/jquery.counterup.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap-toastr/toastr.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/pages/scripts/ui-toastr.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/layouts/layout4/scripts/layout.min.js"></script>
<script type="text/javascript" src="https://chamasoft.com/templates/admin_themes/groups/js/layouts/global/scripts/quick-sidebar.min.js"></script>-->

<script>
    jQuery(document).ready(function(){
        var height = $('body').height();
        $('#setup_tasks_container').css('min-height', height);

        $(document).on('click','.inline',function(){
            $('.modal_select2').each(function(){
                if($(this).data('select2')){
                    $(this).select2('destroy');
                }
            });
            $('.processing').hide();
            $('.submit').show();
            var content = $(this).data('content');
            var form_id = $(this).data('id');
            $('input[name="process_title"]').val(form_id);
            $('.modal-title').html($(this).data('title'));            
            $('.modal-body').html($(content).html());
            $('.modal-footer').show();
            $('#modal').modal({show:true});
            $('.modal_select2').select2({width:'100%'});
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            //FormInputMask.init();
        });
        
        $('input[name=title]').keyup(function(){
            txt = $(this).val();
            var re = /\W/gi; 
            var rew = /\s/gi; 
        
            txt2=txt.replace(rew,'-');
            txt2=txt2.replace(re,'-');
            $('input[name=slug]').val(txt2.toLowerCase());
        });

        $('input[name=title]').blur(function(){
            txt = $(this).val();
            var re = /\W/gi; 
            var rew = /\s/gi; 
        
            txt2=txt.replace(rew,'-');
            txt2=txt2.replace(re,'-');
            $('input[name=slug]').val(txt2.toLowerCase());
        });
        
        $('.confirmation_link').click(function(){
            var element = $(this);
            bootbox.confirm("Are you sure, you want to proceed?", function(result) {
               if(result==true){
                    var href = element.attr('href');
                    window.location = href;
               }else{
                    //close the dialog
                    return true;
               }
            });
            return false; 
        });



      
        $('.confirmation_bulk_action').click(function(e){
            var element = $(this);
            $('<input />').attr('type', 'hidden').attr('id',"extra_post").attr('name',"btnAction").attr('value',$(this).val()).appendTo($(this));
            bootbox.confirm("Are you sure, you want to proceed?", function(result) {
               if(result==true){
                    //submit the form
                    form = element.closest('form');
                    form.submit();
               }else{
                    //close the dialog
                    $('#extra_post').on('remove',function(){})
                    return true;
               }
            });
            e.preventDefault(); 
        });

         $('.inline').on('click',function(){
            $('.processing').hide();
            $('.submit').show();
            var content = $(this).data('content');
            var form_id = $(this).data('id');
            $('input[name="process_title"]').val(form_id);
            $('.modal-title').html($(this).data('title'));            
            $('.modal-body').html($(content).html());
            $('#small').modal({show:true});
        });

        $(document).on('click','.stacked_inline',function(){
            $('.processing').hide();
            $('.submit').show();
            $.uniform.restore();
            var content = $(this).data('content');
            var form_id = $(this).data('id');
            $('input[name="process_title"]').val(form_id);
            $('.stacked-modal-title').html($(this).data('title'));            
            $('.stacked-modal-body').html($(content).html());
            $('#stacked_modal').modal({show:true});
            $('input[type=checkbox]').uniform();
            $('.stacked-modal-body .modal_select2').select2({width:'100%'});
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            FormInputMask.init();
            //ComponentsBootstrapSwitch.init();
        });

        $(document).on('click','.full_width_inline',function(){
            $('.modal_select2').each(function(){
                if($(this).data('select2')){
                    $(this).select2('destroy');
                }
            });
            $.uniform.restore();
            $('.processing').hide();
            $('.submit').show();
            var content = $(this).data('content');
            var form_id = $(this).data('id');
            $('input[name="process_title"]').val(form_id);
            $('.modal-title').html($(this).data('title'));            
            $('.full-width-modal-body').html($(content).html());
            $('#full-width-modal').modal({show:true});
            $('.modal_select2').select2({width:'100%'});
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};
            $('.full-width-modal-body').slideDown();
            FormInputMask.init();
            //$('.make-switch').bootstrapSwitch();
            $('.tooltips').tooltip();
        });

        $('.modal').on('hide.bs.modal', function (e) {
            $('#contributions_form .modal_select2').each(function(){
                if($(this).data('select2')){
                    $(this).select2('destroy');
                }
            });
            $('.modal-footer').show();
        });

        $('.modal').on('show.bs.modal', function (e) {
            $('.data_error').each(function(){
                $(this).slideUp().html("");
            });
            $(this).find('.date-picker').datepicker({endDate: '+0d',autoclose:true});
            $(this).find('input[type=checkbox]').uniform();
            $('.modal_processing_form_button').hide();
        });


        $('.form_submit').submit(function(e)
        {
            $('.submit_form_button').hide();
            $('.processing_form_button').show();
            return true;
        }); 
    });
</script>


<script>
$(document).ready(function(){
    $('input[name=name]').keyup(function(){
        txt = $(this).val();
        var re = /\W/gi; 
        var rew = /\s/gi; 

        txt2=txt.replace(rew,'-');
        txt2=txt2.replace(re,'-');
        $('input[name=slug]').val(txt2.toLowerCase());
    });
    $('input[name=name]').blur(function(){
        txt = $(this).val();
        var re = /\W/gi; 
        var rew = /\s/gi; 

        txt2=txt.replace(rew,'-');
        txt2=txt2.replace(re,'-');
        $('input[name=slug]').val(txt2.toLowerCase());
    });
});

$('.modal_form_submit').submit(function(e){
    var form = $(this);
    var elements = form.find('.delay-modal-form-processing-button');
    if(form.find('#account_options').is(':visible')){
        //do nothing for now
    }else if(elements.length > 0){
        //alert("Am in");
    }else{
        form.find('.modal_submit_form_button').hide();
        form.find('.modal_processing_form_button').show(); 
    }
    return false;
});
</script>
</body>
</html>