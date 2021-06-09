<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
/*$conn = mysqli_connect('localhost','root','','mychama');*/
$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));
$result = mysqli_query($conn,'select * from mychama_users where email = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $names=$row['g_name'];
}}
else{
  header("refresh: 0.1; url=login.php");
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <title>Graph - MyChama</title>
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

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-md page-sidebar-fixed page-footer-fixed authentication"><div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="#">
                <img src="uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
            </a>
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
                        <a href="#" onclick="history.go(-1);">
                            <i class="fa fa-arrow-left"></i> Back </a>
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
                            <span class="username username-hide-on-mobile"><?php echo $names; ?></span>
                            <img alt="" class="img-circle" src="templates/frontend_themes/startuply/img/avatar.png" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li class="divider"> </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-list"></i> Your Group 
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-users"></i><?php echo $names; ?>
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
    <div class="page-content-wrapper">
        <div class="page-content authentication"> 
            <div class="body-content-details">
                <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
<div class="portlet-body form">
    <a href="#" onclick="history.go(-1);" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i> back</a>
  <div id="visualization" style="width: 100%; height: 800px;"></div>
  <?php
  /*$conn=mysqli_connect('localhost','root','','mychama') or die(mysql_error());*/
  $conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));
  $result = mysqli_query($conn,"select * from withdrawals where chama = '".$session."'") or die(mysqli_error($conn));
  $num_results = $result->num_rows;
  if( $num_results > 0){
  ?>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">
        function drawVisualization() {
          var data = google.visualization.arrayToDataTable([
            ['PL', 'Ratings'],
            <?php
              while( $row = $result->fetch_assoc() ){
                extract($row);
                echo "['Kshs $payment_gross - $item_name - $name', {$payment_gross}],";
              }
            ?>
          ]);
          new google.visualization.PieChart(document.getElementById('visualization')).
          draw(data, {title:"<?php echo $names. "'s group withdrawals"; ?>"});
        }
        google.setOnLoadCallback(drawVisualization);
    </script>
  <?php
    }else{
        echo "Empty database.";
    }
  ?>           
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

<script type="text/javascript" src="templates/admin_themes/groups/js/layouts/layout4/scripts/layout.min.js"></script>

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


