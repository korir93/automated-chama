<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
    $session = $_SESSION['username'];
    $conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
    /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
    $result = mysqli_query($conn,'select * from mychama_members where username = "'.$session.'"') or die(mysqli_error($conn));
    while ($row=mysqli_fetch_assoc($result)) {
        $name=$row['name'];
        $fmobile=$row['mobile'];
        $femail=$row['email'];
        $fusername=$row['username'];
        $fpass=$row['password'];
    }
}
else {
    header('location: ../login.php');
}

if (isset($_POST['btnEditMember'])) {
    $fname = $_POST['first_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_query($conn,'update mychama_members set name="'.$fname.'",email="'.$email.'",mobile="'.$mobile.'",username="'.$username.'",password="'.$password.'" where username = "'.$username.'"') or die(mysqli_error($conn));
    echo "<script>window.alert('Profile update successfull');</script>";
    header("refresh: 0.1; url=index.php");
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            Edit My Profile | <?php echo $name; ?>
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link href="uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        
         <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.min.js"></script>
         <link href="http://localhost/chama/templates/admin_themes/groups/css/layouts/layout4/css/layoutnew.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/custom/custom.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/custom.css" type="text/css" rel="stylesheet" />

        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/ion.rangeslider/css/ion.rangeSlider.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css" type="text/css" rel="stylesheet" />

                <!-- END THEME LAYOUT STYLES -->

    <!-- END HEAD -->
    <script type="text/javascript">
        window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
          heap.load("3178775544");
    </script>
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-md page-sidebar-fixed page-footer-fixed">
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="../index.php">
                <img src="../uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
            </a>
            <div class="menu-toggler sidebar-toggler"></div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <div class="page-actions">
            <div id='quick-actions' class="btn-group hidden-xs">
                <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs" id="quick_actions_name">Actions&nbsp;</span>
                    <i class="fa fa-angle-down"></i>
                </button>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="edit_profile.php">
                            <i class="fa fa-pencil"></i> Edit Profile </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fa fa-lock"></i> Logout </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
                    <li class="separator hide"> </li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"><?php echo $name; ?></span>
                            <img alt="" class="img-circle" src="../templates/frontend_themes/startuply/img/avatar.png" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-list"></i> Group Member
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-users"></i><?php echo $name; ?>
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="logout.php">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                            <li class="divider"></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"> </div>

<div class="page-container">
 <div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="active">
                <a href="index.php">
                <i class="icon-home"></i>
                <span class="title">Dashboard</span></a></li>
            
            <li class="">
                <a href="">
                <i class="fa fa-user"></i>
                <span class="title">Your Profile</span><span class="arrow "></span></a><ul class="sub-menu">
                <li class="">
                    <a href="edit_profile.php">
                    <i class="fa fa-pencil"></i>Edit Profile</a></li></ul></li>
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div id="default" class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                           <i class="fa fa-list-ul font-dark"></i>
            <span class="caption-subject font-dark">Edit My Profile | <?php echo $name; ?></span>                        </div>
                                                
                    </div>
                    <div class="portlet-body form">
                        <div class='row'>
                            <div class='col-md-9'>
    <form class="form_submit" role="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="38647e6f5b29c3355cf08d54bd7292a7" style="display:none;" />
    <div class="form-body">
        <fieldset>
            <legend>Personal Details</legend>
            <div class="form-group">
                <label>
                        Full Name                    <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" name="first_name" class="form-control" placeholder="Full Name" value="<?php echo $name; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                        Phone Number <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input type="text" name="mobile" class="form-control" placeholder="+254 xxxxxxxxx" value="<?php echo $fmobile; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                        Email Address
                </label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="e.g someone@smtp.com" value="<?php echo $femail; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                        Username <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-list"></i>
                    </span>
                    <input type="email" name="username" class="form-control" placeholder="System username" value="<?php echo $fusername; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                        Password </label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input type="password" name="password" minlength="8" class="form-control" placeholder="**************" required/>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <button type="submit" class="btn blue submit_form_button" name="btnEditMember">
                        Save Changes            </button>
            <button type="button" class="btn btn-md blue processing_form_button disabled" name="processing" value="Processing"><i class="fa fa-spinner fa-spin"></i> 
                        Processing            </button> 
            <button type="button" class="btn default">
                        Cancel
            </button>
        </div>
    </div>
</form>
                            </div>
                            <div class='col-md-3'>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>
    <div class="page-footer">
        <div class="page-footer-inner"> 2018 &copy;
            <a href="../index.php" title="Chamasoft" target="_blank">MyChama.</a>
        </div>
        &nbsp; All Rights Reserved.
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/custom.js"></script>
    <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/scripts/app.min.js"></script>
</body>
</html>
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