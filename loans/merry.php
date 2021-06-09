<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result = mysqli_query($conn,'select * from mychama_users where email = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $name=$row['g_name'];
}
}
else {
header('location: ../login.php');
}

if (isset($_POST['btnMembers'])) {
for ($i=0; $i < count($_POST['txtName']); $i++) {
$name=$_POST['txtName'][$i];
$fine=$_POST['txtMobile'][$i];
$amount=$_POST['txtMail'][$i];
$number=$_POST['txtNumber'][$i];
$conn = mysqli_connect('localhost','root','','mychama');
mysqli_query($conn,'insert into mychama_merry (name, date, amount, number, chama) values ("'.$name.'","'.$fine.'","'.$amount.'","'.$number.'","'.$session.'")') or die(mysqli_error($conn));
echo "<script>window.alert('Merry-Go-Round updated successfully!');</script>";}
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Group Merry-Go-Round</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link href="uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.min.js"></script>

        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/simple-line-icons/simple-line-icons.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />


        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/uniform/css/uniform.default.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/bootstrap-toastr/toastr.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/css/components-md.min.css" type="text/css" rel="stylesheet" />

        <link href="http://localhost/chama/templates/admin_themes/groups/css/layouts/layout4/css/layout.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/layouts/layout4/css/themes/light.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/layouts/layout4/css/custom.min.css" type="text/css" rel="stylesheet" />

        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/select2/css/select2.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/select2/css/select2-bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/global/css/components-md.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/apps/css/todo.min.css" type="text/css" rel="stylesheet" />

        
        
        <link href="http://localhost/chama/templates/admin_themes/groups/css/custom.css" type="text/css" rel="stylesheet" />

        <script type="text/javascript">
            window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
              heap.load("3178775544");
        </script>
    </head>

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-md page-sidebar-fixed page-footer-fixed authentication">
        
<div class="page-header navbar navbar-fixed-top hidden-sm hidden-xs">
    <div class="page-header-inner ">
        <div class="page-logo">
                <a href="index.php">
                <img src="../uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
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
                        <a href="../dashboard.php">
                            <i class="fa fa-user-plus"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="../loans/v_loans.php">
                            <i class="fa fa-undo"></i> Merry-Go-Round </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
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
                                        <i class="fa fa-list"></i> Your Group 
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
                                    <a href="../logout.php">
                                        <i class="icon-key"></i> Log Out </a>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                    </ul> 
                </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<div class="clearfix"> </div>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content authentication"> 
            <div class="body-content-details">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered" id="form_wizard_1">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-red"></i>
                                    <span class="caption-subject font-red bold uppercase"> Create group merry-go-round</span>
                                </div>
                            </div>
                            <div id="setup_tasks_container" class="portlet-body form">
                                <div class="form-wizard">
                                    <div class="form-body setup-form-body">
<div id="group_member_options">
    <div class="row">
        <div id="heading" class="col-sm-12">
            <h3 class="text-center">Do you wish to add a merry-go-round?</h3>
        </div>
    </div>
</div>

<div class="row margin-top-20">
    <div class="col-sm-12 text-center">
        <a href="#" class="inline btn btn-lg blue" data-toggle="modal" data-target="#add_new_member">
            <i class="fa fa-money"></i> Add Merry-Go-Round Now  
        </a>
    </div>
</div>

<div class="row margin-top-5">
    <div class="col-sm-12 text-center">
        <h4>Or</h4>
        <h4>Manage Group Merry-Go-Round</h4>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $name."'s merry-go-round"; ?></h3>
            </div>
            <!-- Table -->
            <table id="members_list" class="table table-condensed">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'mychama') or die(mysql_error());
                            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                            $results = mysqli_query($conn,"select * from mychama_merry where chama = '".$session."'") or die(mysqli_error($conn));
                            while($rows = mysqli_fetch_assoc($results)){
                        ?>
                        <td class="member-name"><?php echo $rows['name']; ?></td>
                        <td class="member-contacts"><?php echo $rows['date']; ?></td>
                        <td class="group-role-name"><?php echo $rows['amount']; ?></td>
                        <td class="group-role-name"><?php echo $rows['number']; ?></td>
                        <td>
                            <a href="../mpesa/homes.php?no=<?php echo $rows['number']; ?>&am=<?php echo $rows['amount']; ?>&pa=loans/merry.php" class="btn btn-primary btn-sm">
                                <i class="icon-pencil"></i> 
                                    Authorize &nbsp;&nbsp; 
                            </a>
                        </td>
                    </tr>
                    <?php } mysqli_close($conn); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<form method="post">
    <div id="add_new_member" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Add Merry-Go-Round</h4>
                    </center>
                    <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                </div>
                <div class="modal-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered" id="tbl_posts">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <td>Member Name</td>
                                    <td>Date</td>
                                    <td>Amount(s)</td>
                                    <td>Number</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_posts_body">
                                <tr id="rec-1">
                                    <td><span class="sn">1</span>.</td>
                                    <td>
                                        <select class="form-control" name="txtName[]" required>
                                            <option value="">Choose member</option>
                                            <?php
                                            $conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
                                            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                            $result = mysqli_query($conn,'select * from mychama_members where chama = "'.$session.'"') or die(mysqli_error($conn));
                                            while ($row=mysqli_fetch_assoc($result)) { ?>
                                            <option><?php echo $row['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="date" class="form-control" name="txtMobile[]" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="txtMail[]" placeholder="50" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="txtNumber[]" placeholder="Mpesa reception number" required>
                                    </td>
                                    <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="inline btn btn-sm blue" name="btnMembers">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post">
    <div id="edit_group_member" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Edit Loan</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered" id="tbl_posts">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <td>Name</td>
                                    <td>Date</td>
                                    <td>Amount</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_posts_body">
                                <tr id="rec-1">
                                    <td><span class="sn">1</span>.</td>
                                    <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'mychama') or die(mysql_error());
                                        /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                        $resultss = mysqli_query($conn,"select * from mychama_merry where chama = '".$session."'") or die(mysqli_error($conn));
                                        $rowss=mysqli_fetch_assoc($resultss);
                                        mysqli_close($conn);
                                    ?>
                                    <td>
                                        <input type="text" class="form-control" name="txtName[]" placeholder="Member's name" required value="<?php echo $rowss['name']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="txtMobile[]" placeholder="+254xxxxxxxxx" required value="<?php echo $rowss['amount']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="txtMail[]" placeholder="Email address" required value="<?php echo $rowss['fine']; ?>">
                                    </td>
                                    <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="inline btn btn-sm blue" name="btnEditMembers">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div style="display:none;">
    <table id="sample_table">
        <tr id="">
            <td><span class="sn">0</span>.</td>
            <td>
                <input type="text" class="form-control" name="txtName[]" placeholder="Member name" required>
            </td>
            <td>
                <input type="date" class="form-control" name="txtMobile[]" required>
            </td>
            <td>
                <input type="number" class="form-control" name="txtMail[]" placeholder="50" required>
            </td>
            <td><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
    </table>
 </div>

<script type="text/javascript">
    jQuery(document).delegate('a.add-record', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#sample_table tr'),
     size = jQuery('#tbl_posts >tbody >tr').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'rec-'+size);
     element.find('.delete-record').attr('data-id', size);
     element.appendTo('#tbl_posts_body');
     element.find('.sn').html(size);
   });

    jQuery(document).delegate('a.delete-record', 'click', function(e) {
     e.preventDefault();    
     var didConfirm = confirm("Are you sure You want to delete");
     if (didConfirm == true) {
      var id = jQuery(this).attr('data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      jQuery('#rec-' + id).remove();
      
    //regnerate index number on table
    $('#tbl_posts_body tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});
</script>

<script>
    $(document).ready(function(){

        $('.mt-step-col:first').addClass('done');
        $('.mt-step-col:first').removeClass('active');
        $('.mt-step-col:nth-child(2)').addClass('active');
        $('.step-title').html("Step 2 of 3");

        $('#add_group_members').on('click',function(){
            var member_row = $('#add_group_member_row').html();
            member_row = member_row.replace_all('checker','');
            //alert(member_row);
            $('.modal').on('show.bs.modal', function (e) {
                var add_members_table = $(this).find('.add-members-table tbody');
                var add_members_table_row_count = $(this).find('.add-members-table tbody tr').length;
                if(add_members_table_row_count == 0){
                    add_members_table.append(member_row);
                }
                $(this).find('input[type=checkbox]').uniform();
                update_count();
                
            });
            $('.tooltips').tooltip();
        });

        $('.modal').on('shown.bs.modal', function (e) {
            $('.table-multiple-items .group_role').select2({
                width:'100%',
                language: 
                    {
                     noResults: function() {
                        return '<a class="stacked_inline" data-toggle="modal" data-content="#group_role_form" data-title="Add Group Role" data-id="add_group_role" id="add_group_role"  >Add Group Role</a>';
                    }
                },
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });

        $(document).on('click','#add-new-line',function(){
            $('.modal_select2').each(function(){
                if($(this).data('select2')){
                    $(this).select2('destroy');
                }
            });

            var element = $(this).parent().parent().parent().parent();
            var member_row = $('#add_group_member_row').html();
            
            member_row = member_row.replace_all('checker','');
            var add_members_table  = element.find('.add-members-table tbody');
            add_members_table.append(member_row);
            element.find('input[type=checkbox]').uniform();
            $('.modal_select2').select2({width:'100%'});
            $('.tooltips').tooltip();
            //toggle_group_roles();
            update_count();
            $('.table-multiple-items .group_role').select2({
                width:'100%',
                language: 
                    {
                     noResults: function() {
                        return '<a class="stacked_inline" data-toggle="modal" data-content="#group_role_form" data-title="Add Group Role" data-id="add_group_role" id="add_group_role"  >Add Group Role</a>';
                    }
                },
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });

        $(document).on('click','a.remove-line',function(event){
            $(this).parent().parent().remove();
            var number = 1;
            $('.modal .count').each(function(){
                $(this).text(number);
                number++;
            });
        });

        $('.modal_form_submit').on('submit',function(e){
            $('.data_error').each(function(){
                $(this).slideUp().html("");
            });
            var form = $(this).parent();
            var parent_form = $(this);
            if(parent_form.find('#add_group_members_holder').is(':visible')){
                App.blockUI({
                    target: '.full-width-modal-body',
                    overlayColor: 'grey',
                    animate: true
                });

                var entries_are_valid = true;

                form.find("#modal_submit_form input.first_name").each(function(){
                    if($(this).val()==''){
                        $(this).parent().parent().addClass('has-error');
                        $(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                        $(this).parent().parent().find('.tooltips').attr('data-original-title','Please enter a first name');
                        entries_are_valid = false;
                    }else{
                        $(this).parent().parent().removeClass('has-error');
                        $(this).parent().find('i').remove();
                        $(this).parent().parent().find('.tooltips').attr('data-original-title','');
                    }
                });

                form.find("#modal_submit_form input.last_name").each(function(){
                    if($(this).val()==''){
                        $(this).parent().parent().addClass('has-error');
                        $(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                        $(this).parent().parent().find('.tooltips').attr('data-original-title','Please enter a last name');
                        entries_are_valid = false;
                    }else{
                        $(this).parent().parent().removeClass('has-error');
                        $(this).parent().find('i').remove();
                        $(this).parent().parent().find('.tooltips').attr('data-original-title','');
                    }
                });

                form.find("#modal_submit_form input.phone").each(function(){
                    if($(this).val()==''){
                        $(this).parent().parent().parent().addClass('has-error');
                        $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                        $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','Please enter a phone number');
                        entries_are_valid = false;
                    }else{
                        if(valid_phone($(this).val())==false){
                            //invalid phone number
                            $(this).parent().parent().parent().addClass('has-error');
                            $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                            $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','Please enter a valid phone number');
                            entries_are_valid = false; 
                        }else{
                            if(is_not_duplicate_phone($(this).val())==false){
                                //duplicate phone number
                                $(this).parent().parent().parent().addClass('has-error');
                                $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                                $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','Please enter another phone number, you cannot have duplicated phone numbers'); 
                                entries_are_valid = false;   
                            }else{
                                if(is_not_already_registered_phone($(this).val())==false){
                                    $(this).parent().parent().parent().addClass('has-error');
                                    $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                                    $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','This phone number is already registered to another member in the group'); 
                                    entries_are_valid = false; 
                                }else{
                                    $(this).parent().parent().parent().removeClass('has-error');
                                    $(this).parent().parent().find('i').remove();
                                    $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');
                                }
                            }
                        }
                    }
                });
                
                form.find("#modal_submit_form input.email").each(function(){
                    if($(this).val()==''){
                        $(this).parent().parent().parent().removeClass('has-error');
                        $(this).parent().parent().find('i').remove();
                        $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');

                    }else{
                        if(valid_email($(this).val())==false){
                            //invalid email address
                            $(this).parent().parent().parent().addClass('has-error');
                            $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                            $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','Please enter a valid email address');
                            entries_are_valid = false;
                        }else{
                            if(is_not_duplicate_email($(this).val())==false){
                                //duplicate email address
                                $(this).parent().parent().parent().addClass('has-error');
                                $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                                $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','Please enter another email address, you cannot have duplicated email addresses'); 
                                entries_are_valid = false; 
                            }else{
                                $(this).parent().parent().parent().removeClass('has-error');
                                $(this).parent().parent().find('i').remove();
                                $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');
                            }
                        }
                    }
                });

                form.find("#modal_submit_form select.group_role").each(function(){
                    if($(this).val()==''){
                        $(this).parent().removeClass('has-error');
                        //$(this).parent().find('i').remove();
                        $(this).parent().parent().find('.tooltips').attr('data-original-title','');
                    }else{
                        if(is_not_duplicate_group_role($(this).val(),form)==false){
                            //duplicate email address
                            $(this).parent().parent().addClass('has-error');
                            //$(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                            $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','You have already assigned this role to another member. Two members cannot share the same role.'); 
                            entries_are_valid = false;
                        }else{
                            $(this).parent().parent().removeClass('has-error');
                            //$(this).parent().find('i').remove();
                            $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');
                        }
                    }
                });

                if(entries_are_valid){
                    $.ajax({
                        type: "POST",
                        url: 'http://localhost/chama/group/members/ajax_add_members',
                        data: parent_form.serialize(),
                        success: function(response) {
                            if(isJson(response)){
                                var members = $.parseJSON(response);
                                for(var i = 0; i < members.length; i++) {
                                    var member = members[i];
                                    var html = '<tr  class="member-id"  data-member-id = "'+member.id+'" data-user-id = "'+member.user_id+'"><td class="member-count"></td><td class="member-name" data-first-name="'+member.first_name+'" data-last-name="'+member.last_name+'" >'+member.first_name+' '+member.last_name+'</td><td class="member-contacts" data-phone="'+member.phone+'" data-email="'+member.email+'"><span><i class="fa fa-phone"></i></span> : '+member.phone+'<br/><span><i class=\'fa fa-envelope\'></i></span> : '+member.email+'</td><td class="group-role-name" data-group-role-id="'+member.group_role_id+'">'+member.group_role_name+'</td><td><a href="#" class="edit_member inline btn btn-xs default" data-toggle="modal" data-content="#edit_member_form" data-title="Edit Group Member" data-id="edit_member" id="edit_member"> <i class="icon-pencil"></i> Edit &nbsp;&nbsp; </a></td>';
                                    $('#members_list tbody').append(html);
                                    var count = 1;
                                    $('#members_list .member-count').each(function(){
                                        $(this).html(count);
                                        count++;
                                    });
                                }
                                $('.full-width-modal-body').hide().html($("#add_member_success").html()).slideDown();
                                $('.modal-footer').hide();
                                if(members.length==1){
                                    var message = members.length+" Member ";
                                }else{
                                    var message = members.length+" Members ";
                                }
                                $('.number_of_members').each(function(){
                                    $(this).slideDown().html(message);
                                });
                            }else{
                                $('.data_error').each(function(){
                                    $(this).slideDown().html(response);
                                });
                            }
                            form.find('.tooltips').tooltip();
                            $('.modal_submit_form_button').show();
                            $('.modal_processing_form_button').hide(); 
                            App.unblockUI('.full-width-modal-body');
                        }
                    });
                }else{
                    $('.data_error').each(function(){
                        $(this).slideDown().html("Please fill out all the required fields correctly in the form below and try again");
                    });
                    form.find('.tooltips').tooltip();
                    $('.modal_submit_form_button').show();
                    $('.modal_processing_form_button').hide(); 
                    App.unblockUI('.full-width-modal-body');
                }
            }else if(parent_form.find('#edit_member_form_holder').is(':visible')){
                App.blockUI({
                    target: '.modal-body',
                    overlayColor: 'grey',
                    animate: true
                });
                var first_name = $(this).find('#first_name').val();
                var last_name = $(this).find('#last_name').val();
                var phone = $(this).find('#phone').val();
                var email = $(this).find('#email').val();
                var id = $(this).find('input[name=id]').val();
                var user_id = $(this).find('input[name=user_id]').val();
                var group_role_id = $(this).find('#group_role_id').val();
                $.post('http://localhost/chama/group/members/ajax_edit',{'first_name':first_name,'last_name':last_name,'phone':phone,'email':email,'group_role_id':group_role_id,'id':id,'user_id':user_id,},function(data){
                    if(isJson(data)){
                        var member = $.parseJSON(data);
                        var element = $('#members_list tbody tr[data-member-id='+member.id+']');
                        element.find('.member-name').html(member.first_name+" "+member.last_name).attr('data-first-name',member.first_name).attr('data-last-name',member.last_name);
                        element.find('.member-contacts').attr('data-phone',member.phone).attr('data-email',member.email).html("<span><i class='fa fa-phone'></i></span> : "+member.phone+"<br/><span><i class='fa fa-envelope'></i></span> : "+member.email);
                        element.find('.group-role-name').attr('data-group-role-id',member.group_role_id).html(member.group_role_name);
                        $('.modal-body').hide().html($("#edit_member_success").html()).slideDown();
                        $('.modal-footer').hide();
                        $('.modal_submit_form_button').show();
                        $('.modal_processing_form_button').hide();
                        App.unblockUI('.modal-body');
                    }else{
                        $('.data_error').each(function(){
                            $(this).slideDown().html(data);
                        });
                        $('.modal_submit_form_button').show();
                        $('.modal_processing_form_button').hide(); 
                        App.unblockUI('.modal-body');
                    }
                });         
            }
        });
        
        $(document).on('click',"#modal_submit_form .back_to_add_members",function(){
            //$('.modal').modal('hide');
            $('#add_group_members').trigger('click');
            $('.modal-footer').show();
        });
            
        $(document).on('blur keyup keydown',"#modal_submit_form input.first_name",function(){
            if($(this).val()==''){
                $(this).parent().parent().addClass('has-error');
                $(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                $(this).parent().parent().find('.tooltips').attr('data-original-title','Please enter a first name');
            }else{
                $(this).parent().parent().removeClass('has-error');
                $(this).parent().find('i').remove();
                $(this).parent().parent().find('.tooltips').attr('data-original-title','');
            }
        });

        $(document).on('blur keyup keydown',"#modal_submit_form input.last_name",function(){
            if($(this).val()==''){
                $(this).parent().parent().addClass('has-error');
                $(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                $(this).parent().parent().find('.tooltips').attr('data-original-title','Please enter a last name');
            }else{
                $(this).parent().parent().removeClass('has-error');
                $(this).parent().find('i').remove();
                $(this).parent().parent().find('.tooltips').attr('data-original-title','');
            }
        });

        $(document).on('blur keyup keydown',"#modal_submit_form input.phone",function(){
            if($(this).val()==''){
                $(this).parent().parent().parent().addClass('has-error');
                $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','Please enter a phone number');
            }else{
                if(valid_phone($(this).val())==false){
                    //invalid phone number
                    $(this).parent().parent().parent().addClass('has-error');
                    $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                    $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','Please enter a valid phone number');
                }else{
                    if(is_not_duplicate_phone($(this).val()) == false){
                        //duplicate phone number
                        $(this).parent().parent().parent().addClass('has-error');
                        $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                        $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','Please enter another phone number, you cannot have duplicated phone numbers'); 
                    }else{
                        if(is_not_already_registered_phone($(this).val())==false){
                            $(this).parent().parent().parent().addClass('has-error');
                            $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                            $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','Please enter another phone number, the phone number is already assigned to another member'); 
                        }else{
                             $(this).parent().parent().parent().removeClass('has-error');
                            $(this).parent().parent().find('i').remove();
                            $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','');
                        }
                    }
                }
            }
        });

        $(document).on('blur keyup keydown',"#modal_submit_form input.email",function(){
            if($(this).val()==''){
                $(this).parent().parent().parent().removeClass('has-error');
                $(this).parent().parent().find('i').remove();
                $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','');
            }else{
                if(valid_email($(this).val())==false){
                    //invalid email address
                    $(this).parent().parent().parent().addClass('has-error');
                    $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                    $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','Please enter a valid email address');
                }else{
                    if(is_not_duplicate_email($(this).val())==false){
                        //duplicate email address
                        $(this).parent().parent().parent().addClass('has-error');
                        $(this).parent().parent().prepend('<i class="fa fa-exclamation "></i>');
                        $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','Please enter another email address, you cannot have duplicated email addresses'); 
                    }else{
                        $(this).parent().parent().parent().removeClass('has-error');
                        $(this).parent().parent().find('i').remove();
                        $(this).parent().parent().parent().find('.tooltips').first().attr('data-original-title','');
                    }
                }
            }
        });

        $(document).on('change',"#modal_submit_form select.group_role",function(){
            var form = $("#modal_submit_form").parent();
            if($(this).val()==''){
                $(this).parent().parent().removeClass('has-error');
                //$(this).parent().find('i').remove();
                $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');
            }else{
                if(is_not_duplicate_group_role($(this).val(),form)==false){
                    //duplicate email address
                    $(this).parent().parent().addClass('has-error');
                    //$(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                    $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','You have already assigned this role to another member. Two members cannot share the same role.'); 
                }else{
                    $(this).parent().parent().removeClass('has-error');
                    //$(this).parent().find('i').remove();
                    $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');
                }
            }
            form.find("#modal_submit_form select.group_role").each(function(){
                if($(this).val()==''){
                    $(this).parent().removeClass('has-error');
                    //$(this).parent().find('i').remove();
                    $(this).parent().parent().find('.tooltips').attr('data-original-title','');
                }else{
                    if(is_not_duplicate_group_role($(this).val(),form)==false){
                        //duplicate email address
                        $(this).parent().parent().addClass('has-error');
                        //$(this).parent().prepend('<i class="fa fa-exclamation "></i>');
                        $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','You have already assigned this role to another member. Two members cannot share the same role.'); 
                    }else{
                        $(this).parent().parent().removeClass('has-error');
                        //$(this).parent().find('i').remove();
                        $(this).parent().parent().parent().find('.tooltips').attr('data-original-title','');
                    }
                }
            });
        });

        $(document).on('click','.edit_member',function(event){
            var element = $(this).parent().parent();
            var form = $(document).find(".modal_form_submit");
            var member_id = element.attr('data-member-id');
            var user_id = element.attr('data-user-id');
            var first_name = element.find('.member-name').attr('data-first-name');
            var last_name = element.find('.member-name').attr('data-last-name');
            var phone = element.find('.member-contacts').attr('data-phone');
            var email = element.find('.member-contacts').attr('data-email');
            var group_role_id = element.find('.group-role-name').attr('data-group-role-id');
            $('.modal').on('show.bs.modal', function (e) {
                if(member_id){
                    var first_name_input = $(this).find("input[name=first_name]").val(first_name);
                    var last_name_input = $(this).find("input[name=last_name]").val(last_name);
                    var phone_input = $(this).find("input[name=phone]").val(phone);
                    var email_input = $(this).find("input[name=email]").val(email);
                    var group_role_id_select = $(this).find("select[name=group_role_id]").val(group_role_id).trigger('change'); 
                    var member_id_input = $(this).find("input[name=id]").val(member_id); 
                    var user_id_input = $(this).find("input[name=user_id]").val(user_id); 
                    member_id = null;
                }
            });
        });

        $('.modal').on('shown.bs.modal', function (e) {
            $('#submit_form .group_role').select2({
                width:'100%',
                language: 
                    {
                     noResults: function() {
                        return '<a class="stacked_inline" data-toggle="modal" data-content="#group_role_form" data-title="Add Group Role" data-id="add_group_role" id="add_group_role"  >Add Group Role</a>';
                    }
                },
                escapeMarkup: function (markup) {
                    return markup;
                }
            });
        });

        $(document).on('change','.group_role',function(){
            //alert($(this).val());
            if($(this).val()=='0'){
                $('#add_group_role').trigger('click');
                $(this).val('').trigger('change');
            }
        });

        var current_row = 0;
        $(document).on('select2:open','.group_role', function(e) {
            // do something
            var name = $(this).attr("name");
            var row = name.substring(name.lastIndexOf("[")+1,name.lastIndexOf("]"));
            current_row = row;
        });

        $(document).on('click','#add_group_role',function(){
            $(".table-multiple-items .group_role").select2({
                width:'100%',
                language: 
                    {
                    noResults: function() {
                        return '<a class="stacked_inline" data-toggle="modal" data-content="#group_role_form" data-title="Add Group Role" data-id="add_group_role" id="add_group_role"  >Add Group Role</a>';
                    }
                },
                escapeMarkup: function (markup) {
                    return markup;
                }
            }).trigger("select2:close");
        });

        $('#stackable_submit_form').on('submit',function(e){
            //alert(current_row);
            var form = $(this);
            if(form.find('#group_role_form_holder').is(':visible')){
                App.blockUI({
                    target: '.stacked-modal-body',
                    overlayColor: 'grey',
                    animate: true
                });
                $.ajax({
                    type: "POST",
                    url: 'http://localhost/chama/group/group_roles/ajax_create',
                    data: form.serialize(),
                    success: function(response) {
                        if(isJson(response)){
                            var group_role = $.parseJSON(response);
                            $('select.group_role').each(function(){
                                $(this).append('<option value="' + group_role.id + '">' + group_role.name + '</option>').trigger('change');
                            });
                            $('#modal_submit_form select[name="group_roles['+current_row+']"]').val(group_role.id).trigger('change');
                            $('#submit_form select#group_role_id').val(group_role.id).trigger('change');
                            form.find('.submit').show();
                            form.find('.modal_processing_form_button').hide();
                            $('#stacked_modal').modal('hide');
                            toastr['success']('You have successfully added a new group role to your group, you can now select it in the group roles dropdown.','Group role added successfully');
                        }else{
                            $('#stackable_submit_form .data_error').each(function(){
                                $(this).slideDown().html(response);
                            });
                            $(".modal").animate({ scrollTop: 0 }, 600);
                        }
                        form.find('.modal_submit_form_button').show();
                        form.find('.modal_processing_form_button').hide(); 
                        App.unblockUI('.stacked-modal-body');
                    }
                });
            }
            e.preventDefault();
        });

    });

    function valid_email(email) {
        var valid_email_format = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return valid_email_format.test(email);
    }

    function valid_phone(phone){
        //10 digit format e.g. 0721106625
        var valid_phone_format = /^\d{10}$/; 
        //international format without spaces e.g. +254721106625 
        var international_valid_phone_format_without_spaces = /^\+\d{12}$/; 
        var international_valid_phone_format_without_spaces_and_plus = /^\d{12}$/; 
        //alert(phone.value); 
        if(phone.match(valid_phone_format)||phone.match(international_valid_phone_format_without_spaces)||phone.match(international_valid_phone_format_without_spaces_and_plus)){  
            return true;  
        }else{   
            return false;  
        }  
    }

    function is_not_duplicate_email(email){
        var emails = [];
        $('input[name="emails[]"]').each(function(){
            emails.push($(this).val());
        });
        var count = emails.reduce(function(n, val) {
            return n + (val === email);
        }, 0);
        if(count>1){
            return false;
        }else{
            return true;
        }
    }

    function is_not_duplicate_group_role(group_role,form){
        var group_roles = [];
        form.find('#modal_submit_form select.group_role').each(function(){
            group_roles.push($(this).val());
        });
        var count = group_roles.reduce(function(n, val) {
            return n + (val === group_role);
        }, 0);
        if(count>1){
            return false;
        }else{
            return true;
        }
    }

    function is_not_duplicate_phone(phone){
        var phones = [];
        $('input[name="phones[]"]').each(function(){
            phones.push($(this).val());

        });
        var count = phones.reduce(function(n, val) {
            return n + (val === phone);
        }, 0);
        if(count>1){
            return false;
        }else{
            return true;
        }
    }

    function is_not_already_registered_phone(phone){
        var phones = [];
        $('.member-contacts').each(function(){
            phones.push($(this).attr('data-phone'));
            if($(this).attr('data-phone').length==13){
                phones.push($(this).attr('data-phone').substring(1));
                phones.push("0"+$(this).attr('data-phone').substring(4));
            }
            if($(this).attr('data-phone').length==12){
                phones.push("+"+$(this).attr('data-phone'));
                phones.push("0"+$(this).attr('data-phone').substring(3));
            }

        });
        var count = phones.reduce(function(n, val) {
            return n + (val === phone);
        }, 0);
        if(count>0){
            return false;
        }else{
            return true;
        }
    }

    function update_count(){
        var number = 1;
        $('.modal .count').each(function(){
            //alert(number);
            $(this).text(number);
            $(this).parent().find('input.first_name').attr('name','first_names['+(number-1)+']');
            $(this).parent().find('input.last_name').attr('name','last_names['+(number-1)+']');
            $(this).parent().find('input.phone').attr('name','phones['+(number-1)+']');
            $(this).parent().find('input.email').attr('name','emails['+(number-1)+']');
            $(this).parent().find('input.send_invitation_sms').attr('name','send_invitation_sms['+(number-1)+']');
            $(this).parent().find('input.send_invitation_email').attr('name','send_invitation_email['+(number-1)+']');
            $(this).parent().find('select.group_role').attr('name','group_roles['+(number-1)+']');
            number++;
        });
    }

    function isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    String.prototype.replace_all = function(search,replacement) {
        var target = this;
        return target.split(search).join(replacement);
    };

</script>
                                                </div>
                                            </div>

                                    </div>
                                </div>
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
    <div class="page-footer-inner"> <?php echo date("Y"); ?> &copy;
        <a href="http://mychama.epizy.com/chama/" title="Chamasoft" target="_blank">MyChama.</a>
    </div>
    &nbsp; All Rights Reserved.
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/js.cookie.min.js"></script>-->
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/uniform/jquery.uniform.min.js"></script>
<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>-->
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.blockui.min.js"></script>
<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery-minicolors/jquery.minicolors.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/moment.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js"></script>
-->
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!--
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/clockface/js/clockface.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>-->
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/scripts/app.min.js"></script>

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/scripts/app.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/components-color-pickers.js"></script>
-->
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/select2/js/select2.full.min.js"></script>
<!--
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/profile.min.js"></script>
-->

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/components-select2.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/form-input-mask.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/counterup/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/counterup/jquery.counterup.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-toastr/toastr.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/ui-toastr.js"></script>

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/ui-bootbox.min.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery-nestable/jquery.nestable.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/ui-nestable.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/scripts/datatable.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/datatables/datatables.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/table-datatables-fixedheader.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-markdown/lib/markdown.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-summernote/summernote.min.js"></script>-->

<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/components-editors.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>-->


<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/components-bootstrap-maxlength.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/components-date-time-pickers.min.js"></script>-->

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/layouts/layout4/scripts/layout.min.js"></script>
<!--<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/layouts/layout4/scripts/demo.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/layouts/global/scripts/quick-sidebar.min.js"></script>-->


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

$('#order').on('show.bs.modal', function(e) {
    var bookId = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="txtID"]').val(bookId);
});
</script>
</body>
</html>