<?php
if (isset($_POST['login_user'])) {
    session_start();
    $type = $_POST['txtUser'];
    $user = $_POST['email'];
    $pass = $_POST['password'];
    $conn = mysqli_connect('localhost', 'root', '','mychama') or die (mysqli_error($conn));
    /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
    if ($type == "Group Chair") {
     //   $result = mysqli_query($conn,'select * from mychama_users where email="'.$user.'" and password="'.$pass.'"') or die(mysqli_error($conn));
        $result = mysqli_query($conn,'select * from mychama_users LIMIT 1') or die(mysqli_error($conn));
        if (mysqli_num_rows($result)==1) {
            $_SESSION['username'] = $user;
			echo $user;
           // header('location: dashboard.php');
        }
        else {
            echo "<script>window.alert('Invalid login credentials!')</script>";
        }
    }
    elseif ($type == "Group Member") {
        //$result = mysqli_query($conn,'select * from mychama_members where username="'.$user.'" and password="'.$pass.'"') or die(mysqli_error($conn));
        $result = mysqli_query($conn,'select * from mychama_users LIMIT 1') or die(mysqli_error($conn));
        if (mysqli_num_rows($result)>=1) {
            $_SESSION['username'] = $user;
            header('location: member/');
        }
        else {
            echo "<script>window.alert('Invalid login credentialss')</script>";
        }
    }
    mysqli_close($conn);}
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <title>Login into MyChama</title>
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
        <!-- BEGIN HEADER -->
        <!-- END HEADER & CONTENT DIVIDER -->
        
<div class="page-header navbar navbar-fixed-top hidden-sm hidden-xs">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.php">
                <img src="uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
            </a>
         </div>
        <div class="page-top">
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content authentication"> 
            <div class="body-content-details">
                <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
<div class="portlet-body form">
<div class='margin-top-10 margin-bottom-10 logo text-center'>
<a href="index.html">
<img width='150px' src="uploads/logos/logo_(1)7.png" alt="Login Logo"/>
</a>
</div>

<!-- LOGIN FORM -->

<form class="login-form form_submit" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="5b2017b8620f0aa5935443e64dd98642" style="display:none;" />
 <fieldset>
<legend class="call-to-action text-center">Login into MyChama</legend>
<div class="form-body">
    <div class="form-group">
<label>Account type<span class='required'>*</span></label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-envelope"></i>
</span>
<select class="form-control" name="txtUser" required>
    <option value="">Login as</option>
    <option>Group Chair</option>
    <option>Group Member</option>
</select>
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
<input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password"  />
</div>
</div>                
<input type="hidden" name="action" value="" />                          
<input type="hidden" name="refer" value="" />
<div class="row">
<div class="col-sm-5">
<div class="rem-password">
<p>Remember Me
<input type="checkbox" class="rem-checkbox" />
</p>
</div>
</div>
<div class="col-sm-7 text-right">
<div class="forgot-password">
<a href="forgot_password.php" id="forget-password" class="forget-password">Forgot Password?</a>
</div>
</div>
</div>
<div class='row'>
<div class="col-sm-6 text-left">
<div class="signup">
<a href="signup.php" id="signup" class="signup">Create account</a>
</div>
</div>
<div class="col-md-6 text-right">
<button class="btn blue submit_form_button" type="submit" name="login_user">Log In</button>
<button type="button" class="btn blue processing_form_button disabled" name="processing" value="Processing"><i class="fa fa-spinner fa-spin"></i> Processing</button> 
</div>
</div>
</div>
</fieldset>
</form>            
</div>
</div>
            </div>
</div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2018 &copy;
        <a href="index.php" title="MyChama" target="_blank">MyChama.</a>
    </div>
    &nbsp; All Rights Reserved.
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>   

<div class="modal fade bs-modal-sm" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <form class="modal-form modal_form_submit" role="form" id="submit_form" method="post" accept-charset="utf-8">
<!-- <input type="hidden" name="csrf_test_name" value="5b2017b8620f0aa5935443e64dd98642" style="display:none;" />
            <input type="text" style="display:none" value="" name="process_title"> -->
            <div class="modal-body">
            
            </div>
            <div class="clearfix"></div>           
            <div class="modal-footer">
                <input type="submit" class="btn blue pull submit modal_submit_form_button" value="Save Changes">
                 <button type="button" class="btn btn-md blue modal_processing_form_button disabled" name="processing" value="Processing"><i class="fa fa-spinner fa-spin"></i> Processing</button>
                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
            </div>
            </form>        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



<div class="modal fade bs-modal-sm" id="stacked_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="stacked-modal-title"></h4>
            </div>
        <form action="https://MyChama.com/login" class="modal-form modal_form_submit" role="form" id="stackable_submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="5b2017b8620f0aa5935443e64dd98642" style="display:none;" />
            <input type="text" style="display:none" value="" name="process_title">
            <div class="stacked-modal-body">
            
            </div>
            <div class="clearfix"></div>
            
            <div class="modal-footer">
                <input type="submit" class="btn blue pull submit modal_submit_form_button" value="Save Changes">
                 <button type="button" class="btn btn-md blue modal_processing_form_button disabled" name="processing" value="Processing"><i class="fa fa-spinner fa-spin"></i> Processing</button>
                <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
            </div>
            </form>        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="full-width-modal" class="modal container fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"></h4>
            </div>
            <form action="https://MyChama.com/login" class="modal-form modal_form_submit" role="form" id="modal_submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="5b2017b8620f0aa5935443e64dd98642" style="display:none;" />
                <input type="text" style="display:none" value="" name="process_title">
                <div class="full-width-modal-body">
                
                </div>
                <div class="clearfix"></div>
                
                <div class="modal-footer">
                    <input type="submit" class="btn blue pull submit modal_submit_form_button" value="Save Changes">
                     <button type="button" class="btn btn-md blue modal_processing_form_button disabled" name="processing" value="Processing"><i class="fa fa-spinner fa-spin"></i> Processing</button>
                    <button type="button" class="btn default" data-dismiss="modal">Cancel</button>
                </div>
            </form>        </div>
        <!-- /.modal-content -->
    </div>
</div>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/js.cookie.min.js"></script>-->
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/uniform/jquery.uniform.min.js"></script>
<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery.blockui.min.js"></script>
<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>-->

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/jquery-minicolors/jquery.minicolors.js"></script>-->

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/moment.min.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"></script>
-->
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>-->
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/scripts/app.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/select2/js/select2.full.min.js"></script>
<!--
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/profile.min.js"></script>
-->

<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/pages/scripts/components-select2.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/pages/scripts/form-input-mask.js"></script>

<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/counterup/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/counterup/jquery.counterup.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/global/plugins/bootstrap-toastr/toastr.js"></script>
<script type="text/javascript" src="templates/admin_themes/groups/js/pages/scripts/ui-toastr.js"></script>

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/ui-bootbox.min.js"></script>-->

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/jquery-nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/ui-nestable.js"></script>-->

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/scripts/datatable.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/datatables/datatables.min.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>-->

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/table-datatables-fixedheader.js"></script>

<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-markdown/lib/markdown.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-summernote/summernote.min.js"></script>-->

<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/components-editors.js"></script>

<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>-->


<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/components-bootstrap-maxlength.min.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/pages/scripts/components-date-time-pickers.min.js"></script>-->

<script type="text/javascript" src="templates/admin_themes/groups/js/layouts/layout4/scripts/layout.min.js"></script>
<!--<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/layouts/layout4/scripts/demo.min.js"></script>
<script type="text/javascript" src="https://MyChama.com/templates/admin_themes/groups/js/layouts/global/scripts/quick-sidebar.min.js"></script>-->


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


