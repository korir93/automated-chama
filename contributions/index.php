<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','mychama') or die(mysqli_error($conn));
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result = mysqli_query($conn,'select * from mychama_users where email = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $name=$row['g_name'];
}
}
else {
header('location: login.php');
}

if (isset($_POST['btnContributions'])) {
    $name = $_POST['name'];
    $amount = $_POST['amount'];
    $type = $_POST['type'];
    $freq = $_POST['contribution_frequency'];
    $when_n = $_POST['week_day_monthly'];
    $f_type = $_POST['fine_type'];
    $f_why = $_POST['fixed_fine_mode'];
    mysqli_query($conn,"insert into mychama_contributions(name,amount,f_type,f_often,when_n,f_fine,f_why,chama) values ('$name','$amount','$type', '$freq','$when_n','$f_type','$f_why','$session')") or die(mysqli_error($conn));
    echo "<script>window.alert('Contribution added successfully!');</script>";
}

if (isset($_POST['btnEditMembers'])) {
    for ($i=0; $i < count($_POST['txtName']); $i++) {
        $ename = $_POST['txtName'][$i];
        $emobile = $_POST['txtMobile'][$i];
        $email = $_POST['txtMail'][$i];
        $erole = $_POST['txtRole'][$i];
        mysqli_query($conn,"update mychama_members set name='$ename',email='$email',role='$erole' where chama='$session'") or die(mysqli_error($conn));
    }
    echo "<script>window.alert('Member updated successfully!');</script>";
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Group Contributions</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link href="uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

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
    </div>
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
                                    <span class="caption-subject font-red bold uppercase"> Group Setup Wizard -
                                        <span class="step-title"> Step 1 of 3</span>
                                    </span>
                                </div>
                            </div>
                            <div id="setup_tasks_container" class="portlet-body form">
                                <div class="form-wizard">
                                    <div class="form-body setup-form-body">
                                        <div class="mt-element-step">
                                            <div class="row step-line">
                                                <div class="col-md-4 mt-step-col first active">
                                                    <a href="../accounts/">
                                                        <div class="mt-step-number bg-white">
                                                            <i class="fa fa-money"></i>
                                                        </div>
                                                        <div class="mt-step-title uppercase font-grey-cascade">Accounts</div>
                                                        <div class="mt-step-content font-grey-cascade">Set Up Group Accounts </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mt-step-col">
                                                    <a href="../members/">
                                                        <div class="mt-step-number bg-white">
                                                            <i class="fa fa-users"></i>
                                                        </div>
                                                        <div class="mt-step-title uppercase font-grey-cascade">Group Members</div>
                                                        <div class="mt-step-content font-grey-cascade">Add Group Members</div>
                                                    </a>
                                                </div>
                                                <div class="col-md-4 mt-step-col last">
                                                    <a href="../contributions/">
                                                        <div class="mt-step-number bg-white">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <div class="mt-step-title uppercase font-grey-cascade">Contributions</div>
                                                        <div class="mt-step-content font-grey-cascade">Set Up Group Contributions</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr/>
            		                    <div class='row'>
        		                            <div class='col-md-10 col-md-offset-1'>
    <ul class="pager">
        <li class="previous">
            <a href="../members/"> ← Back </a>
        </li>
        <li class="next">
            <a href="../dashboard.php"> Group Dashboard → </a>
        </li>
    </ul>
</div>

<div id="group_member_options">
	<div class="row">
		<div id="heading" class="col-sm-12">
			<h3 class="text-center">Do you wish to add your group contributions now?</h3>
		</div>
	</div>
</div>
<div class="row margin-top-20">
    <div class="col-sm-12 text-center">
    	<a href="#" class="btn btn-lg blue full_width_inline" data-toggle="modal" data-target="#add_contribution">
            <i class="fa fa-user-plus"></i> Add Group Contribution Now  
        </a>
    </div>
</div>

<div class="row margin-top-5">
    <div class="col-sm-12 text-center">
    	<h4>Or</h4>
    	<h4>Manage Group Contributions</h4>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $name."'s contributions"; ?></h3>
            </div>
            <!-- Table -->
            <table id="members_list" class="table table-condensed">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Contr. type</th>
                        <th>How often</th>
                        <th>When</th>
                        <th>Fine type</th>
                        <th>Fine reason</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'mychama') or die(mysqli_error($conn));
                            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                            /*$resultss = mysqli_query($conn,"select * from mychama_members where chama = '".$session."'") or die(mysqli_error($conn));
                            while($rowss=mysqli_fetch_assoc($resultss)){
                                $user = $rowss['email'];
                            }*/
                            $results = mysqli_query($conn,"select * from mychama_contributions where chama = '".$session."'") or die(mysqli_error($conn));
                            while($rows = mysqli_fetch_assoc($results)){
                        ?>
                        <td class="member-count">1</td>
                        <td class="member-name"><?php echo $rows['name']; ?></td>
                        <td class="member-name"><?php echo $rows['amount']; ?></td>
                        <td class="member-name"><?php echo $rows['f_type']; ?></td>
                        <td class="member-name"><?php echo $rows['f_often']; ?></td>
                        <td class="member-name"><?php echo $rows['when_n']; ?></td>
                        <td class="member-name"><?php echo $rows['f_fine']; ?></td>
                        <td class="member-name"><?php echo $rows['f_why']; ?></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#edit_contribution">
                                <i class="icon-pencil"></i> 
                                    Edit &nbsp;&nbsp; 
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
    <div id="add_contribution" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Add Group Contribution</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Contribution Name<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-bank"></i>
                            </span>
                            <input type="text" name="name" class="form-control" placeholder="Contribution Name" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contribution Amount per Member<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-bank"></i>
                            </span>
                            <input type="text" name="amount" class="form-control currency" placeholder="Contribution Amount" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bank-branches">
                                Contribution Type                <span class="required">*</span></label>
                        <div class="input-group col-md-12 col-sm-12 col-xs-12 ">
                            <select name="type" class="form-control" required>
                                <option value="" required selected="selected">--Select Contribution Type--</option>
                                <option>Regular Contribution</option>
                                <option>One Time Contribution</option>
                                <option>Non Scheduled Contribution</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>How often do members contribute?<span class="required">*</span></label>
                        <div class="col-md-12 input-group">
                            <select name="contribution_frequency" class="form-control" required data-placeholder="Select...">
                                <option value="" selected="selected">Select...</option>
                                <option>Once a Month (Monthly)</option>
                                <option>Once a Week (Weekly)</option>
                                <option>Once a Day (Daily)</option>
                                <option>Once Every Two Weeks (Fortnightly)</option>
                                <option>Once Every Two Months (Bimonthly)</option>
                                <option>Once Every Three Months (Quarterly)</option>
                                <option>Once Every Six Months (Biannually)</option>
                                <option>Once a Year (Annually)</option>
                                <option>Twice Every  Month (After A Date)</option>
                            </select>
                        </div>      
                        <span class="help-block"> e.g. Once a Month</span>
                    </div>
                    <div class="form-group">
                        <label>When do members contribute?<span class="required">*</span></label>
                        <div class="col-md-12 input-group">
                            <select name="week_day_monthly" class="form-control" required data-placeholder="Select...">
                                <option value="" selected="selected">--Select Week Day--</option>
                                <option>Every Sunday of the Week</option>
                                <option>Every Monday of the Week</option>
                                <option>Every Tuesday of the Week</option>
                                <option>Every Wednesday of the Week</option>
                                <option>Every Thursday of the Week</option>
                                <option>Every Friday of the Week</option>
                                <option>Every Saturday of the Week</option>
                            </select>
                        </div>
                    </div>      
                    <div class="form-group">
                        <label>We charge a</label>
                        <div class='col-md-12 input-group'>
                            <select name="fine_type" class="form-control" data-placeholder="Select..." required>
                                <option value="" selected="selected">Select fine type</option>
                                <option>Fixed Amount Fine of</option>
                                <option>Percentage Rate Fine of</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='col-md-12 input-group'>
                            <label>Why members will pay fines?<span class="required">*</span></label>
                            <select name="fixed_fine_mode" class="form-control" data-placeholder="Select..." required>
                                <option value="" selected="selected">Select how fines behave</option>
                                <option>for each unpaid contribution</option>
                                <option>for outstanding balance</option>
                            </select>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="inline btn btn-sm blue" name="btnContributions">Save Changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>

<form method="post">
    <div id="edit_contribution" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Edit Group Contribution</h4>
                    </center>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="inline btn btn-sm blue" name="btnContributions">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
	$(document).ready(function(){

		$('.mt-step-col:first , .mt-step-col:nth-child(2)').addClass('done');
		$('.mt-step-col:first').removeClass('active');
		$('.mt-step-col:nth-child(3)').addClass('active');
        $('.step-title').html("Step 3 of 3");

        $(document).on('change','#type',function(){
            if($(this).val()==1){
                $('#modal_submit_form #regular_invoicing_active_holder').slideDown();
                $('#modal_submit_form #one_time_invoicing_active_holder,#modal_submit_form #sms_template,#modal_submit_form #one_time_invoicing_settings,#modal_submit_form #regular_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form  #contribution_member_list_settings').slideUp();
                $('#modal_submit_form #one_time_invoicing_active').parent().removeClass('checked');
                $('#modal_submit_form #one_time_invoicing_active').prop('checked',false);             
            }else if($(this).val()==2){
                $('#modal_submit_form  #one_time_invoicing_active_holder').slideDown();
                $('#modal_submit_form  #regular_invoicing_active_holder,#modal_submit_form #sms_template,#modal_submit_form #one_time_invoicing_settings,#modal_submit_form #regular_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideUp(); 
                $('#modal_submit_form #regular_invoicing_active').parent().removeClass('checked');              
                $('#modal_submit_form #regular_invoicing_active').prop('checked',false);                
            }else{
                $('#modal_submit_form #regular_invoicing_active_holder,#modal_submit_form #sms_template,#modal_submit_form #one_time_invoicing_active_holder,#modal_submit_form #one_time_invoicing_settings,#modal_submit_form #regular_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideUp();
                $('#modal_submit_form #regular_invoicing_active,#modal_submit_form #one_time_invoicing_active').parent().removeClass('checked'); 
                $('#modal_submit_form #regular_invoicing_active,#modal_submit_form #one_time_invoicing_active').prop('checked',false);  
            }
        });
		
        $(document).on('change','#regular_invoicing_active',function(){
            if($(this).prop('checked')){
                $('#modal_submit_form #regular_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideDown();
            }else{
                $('#modal_submit_form #regular_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideUp();
            }
        });

        $(document).on('change','#one_time_invoicing_active',function(){
            if($(this).prop('checked')){
                $('#modal_submit_form #one_time_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideDown();
            }else{
                $('#modal_submit_form #one_time_invoicing_settings,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideUp();
            }
        });

        $(document).on('change','#month_day_monthly',function(){
            if($(this).val()>4){
                $('#modal_submit_form #week_day_monthly').val(0).attr('disabled','disabled');
            }else{
                $('#modal_submit_form #week_day_monthly').removeAttr('disabled','disabled');
            }
        });

        $(document).on('change','#month_day_multiple',function(){
            if($(this).val()>4){
                $('#modal_submit_form #week_day_multiple').val(0).attr('disabled','disabled');
            }else{
                $('#modal_submit_form #week_day_multiple').removeAttr('disabled','disabled');
            }
        });

        $(document).on('change','#contribution_frequency',function(){
            if($(this).val()==1){
                //once a month
                $('#modal_submit_form #once_a_month').slideDown();
                $('#modal_submit_form #invoice_days,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideDown();
                $('#modal_submit_form #once_a_week,#modal_submit_form #once_every_two_weeks,#modal_submit_form #once_every_multiple_months').slideUp();
            }else if($(this).val()==6){
                //once a week
                $('#modal_submit_form #invoice_days,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideDown();
                $('#modal_submit_form #once_a_week').slideDown();
                $('#modal_submit_form #once_every_two_weeks,#modal_submit_form #once_a_month,#modal_submit_form #once_every_multiple_months').slideUp();
            }else if($(this).val()==7){
                //once every two weeks
                $('#modal_submit_form #invoice_days,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideDown();
                $('#modal_submit_form #once_every_two_weeks').slideDown();
                $('#modal_submit_form #once_every_multiple_months,#modal_submit_form #once_a_week,#modal_submit_form #once_a_month').slideUp();
            }else if($(this).val()==2||$(this).val()==3||$(this).val()==4||$(this).val()==5){
                //once every two months, once every three months,once every six months, once a year
                $('#modal_submit_form #invoice_days,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideDown();
                $('#modal_submit_form #once_every_multiple_months').slideDown();
                $('#modal_submit_form #once_a_month,#modal_submit_form #once_every_two_weeks,#modal_submit_form #once_a_week').slideUp();
            }else if($(this).val()==8){
                //$('#invoice_days,#invoice_notifications,#fines,#advanced_settings,#contribution_member_list_settings').slideUp();
                //hide all
                $('#modal_submit_form select[name=invoice_days]').val(1).trigger('change');
                $('#modal_submit_form #invoice_days').slideDown();
                $('#modal_submit_form #once_a_month,#modal_submit_form #once_every_two_weeks,#modal_submit_form #once_a_week,#modal_submit_form #once_every_multiple_months').slideUp();
            }else{
                $('#modal_submit_form #invoice_days,#modal_submit_form #invoice_notifications,#modal_submit_form #fines,#modal_submit_form #advanced_settings,#modal_submit_form #contribution_member_list_settings').slideUp();
                //hide all
                $('#modal_submit_form #once_a_month,#modal_submit_form #once_every_two_weeks,#modal_submit_form #once_a_week,#modal_submit_form #once_every_multiple_months').slideUp();
            }
        });

		$(document).on('change','#sms_notifications_enabled',function(){
            if($(this).prop('checked')){
                $('#modal_submit_form #sms_template').slideDown();
            }else{
                $('#modal_submit_form #sms_template').slideUp();
            }
        });

        $(document).on('change','#enable_contribution_summary_display_configuration',function(){
            if($(this).prop('checked')){
                $('#modal_submit_form #contribution_summary_display_configuration_settings').slideDown();
            }else{
                $('#modal_submit_form #contribution_summary_display_configuration_settings').slideUp();
            }
        });

        $(document).on('change','#enable_contribution_member_list',function(){
            if($(this).prop('checked')){
                $('#modal_submit_form #contribution_member_list').slideDown();
            }else{
                $('#modal_submit_form #contribution_member_list').slideUp();
            }
        });

        $(document).on('change','#enable_fines',function(){
            if($(this).prop('checked')){
                $('#modal_submit_form #fine_settings').slideDown();
            }else{
                $('#modal_submit_form #fine_settings').slideUp();
            }
        });

        $(document).on('change','.fine_types',function(){
            var fine_setting_row_element = $(this).parent().parent().parent().parent();
            fine_setting_row_element.find('.fixed_fine_settings,.percentage_fine_settings,.fine_limit').slideUp('fast');
            if($(this).val()==1){
                fine_setting_row_element.find('.fixed_fine_settings').slideDown();
            }else if($(this).val()==2){
                fine_setting_row_element.find('.percentage_fine_settings').slideDown();
            }
        });

        $(document).on('change','.fixed_fine_chargeable_ons',function(){
            var fine_setting_row_element = $(this).parent().parent().parent().parent();
            if($(this).val()=='first_day_of_the_month'||$(this).val()=='last_day_of_the_month'){
                fine_setting_row_element.find('.fixed_fine_frequencies').val(3).trigger('change');
            }else{
                fine_setting_row_element.find('.fixed_fine_frequencies').removeAttr('disabled','disabled');
            }
        });

        $(document).on('change','.percentage_fine_chargeable_ons',function(){ 
            var fine_setting_row_element = $(this).parent().parent().parent().parent();
            if($(this).val()=='first_day_of_the_month'||$(this).val()=='last_day_of_the_month'){
                fine_setting_row_element.find('.percentage_fine_frequencies').val(3).trigger('change');
            }else{
                fine_setting_row_element.find('.percentage_fine_frequencies').removeAttr('disabled','disabled');
            }
        });

        $(document).on('change','.fixed_fine_modes',function(){ 
            var fine_setting_row_element = $(this).parent().parent().parent().parent();
            if($(this).val()==1){
                fine_setting_row_element.find('.fine_limit').slideDown();
            }else{
                fine_setting_row_element.find('.fine_limit').slideUp();
            }
        });

        $(document).on('change','.percentage_fine_modes',function(){ 
            var fine_setting_row_element = $(this).parent().parent().parent().parent();
            if($(this).val()==1){
                fine_setting_row_element.find('.fine_limit').slideDown();
            }else{
                fine_setting_row_element.find('.fine_limit').slideUp();
            }
        });

        $(document).on('click','#add-new-line',function(){
            var html = $('#append_fine_setting_row').html();
            html = html.replace_all('checker','');
            $('#modal_submit_form #append-place-holder').append(html);
            $('#modal_submit_form #fine_settings .append_select2').select2();
            $('input[type=checkbox]').uniform();
            $('.tooltips').tooltip();
            FormInputMask.init();
            var number = 0;
            update_fine_setting_counts();
        });
		
		$(document).on('click','.remove-line',function(){ 
            $(this).parent().parent().parent().remove();
            update_fine_setting_counts();
        });

		$('.modal_form_submit').on('submit',function(e){
            $('.data_error').each(function(){
                $(this).slideUp().html("");
            });
            var form = $(this);
            App.blockUI({
                target: '.full-width-modal-body',
                overlayColor: 'grey',
                animate: true
            });
            if(form.find('input[name="action"]').val()=="create"){
                $.ajax({
                    type: "POST",
                    url: 'http://localhost/chama/group/contributions/ajax_create',
                    data: form.serialize(),
                    success: function(response) {
                        if(isJson(response)){
                            $('.full-width-modal-body').hide().html($("#add_contribution_success").html()).slideDown();
                            $('.modal-footer').hide();
                            load_contributions_listing();
                        }else{
                            $('.data_error').each(function(){
                                $(this).slideDown().html(response);
                            });
                            $(".modal").animate({ scrollTop: 0 }, 600);;
                        }
                        $('.modal_submit_form_button').show();
                        $('.modal_processing_form_button').hide(); 
                        App.unblockUI('.full-width-modal-body');
                    }
                });
            }else if(form.find('input[name="action"]').val()=="edit"){
                $.ajax({
                    type: "POST",
                    url: 'http://localhost/chama/group/contributions/ajax_edit',
                    data: form.serialize(),
                    success: function(response) {
                        if(isJson(response)){
                            $('.full-width-modal-body').hide().html($("#edit_contribution_success").html()).slideDown();
                            $('.modal-footer').hide();
                            load_contributions_listing();
                        }else{
                            $('.data_error').each(function(){
                                $(this).slideDown().html(response);
                            });
                            $(".modal").animate({ scrollTop: 0 }, 600);;
                        }
                        $('.modal_submit_form_button').show();
                        $('.modal_processing_form_button').hide(); 
                        App.unblockUI('.full-width-modal-body');
                    }
                });
            }
        });

		$(document).on('click',"#modal_submit_form .back_to_add_contribution",function(){
            $('#add_group_contribution').trigger('click');
            $('.modal-footer').show();
        });

        $(document).on('click','#add_group_contribution',function(event){
            $('#contributions_form_holder').show();
        });

        $(document).on('click','.edit_contribution',function(event){
            var element = $(this).parent().parent();
            var id = element.attr('data-id');
            //alert(regular_invoicing_active);
            $('#contributions_form_holder').hide();
            $('.modal').on('show.bs.modal', function (e) {
                if(id){
                    var modal = $(this);
                    App.blockUI({
                        target: '.full-width-modal-body',
                        overlayColor: 'grey',
                        animate: true
                    });
                    modal.find("input[name=action]").val('edit');
                    modal.find("input[name=id]").val(id);
                    $.post('http://localhost/chama/group/contributions/ajax_get',{'id':id,},function(data){
                        if(isJson(data)){
                            var contribution = $.parseJSON(data);
                            modal.find("input[name=name]").val(contribution.name);
                            modal.find("input[name=amount]").val(contribution.amount);
                            modal.find("select[name=type]").val(contribution.type).trigger('change');
                            if(contribution.type==1){

                                if(contribution.regular_invoicing_active){
                                    var regular_invoicing_active_checkbox = modal.find("input[name=regular_invoicing_active]").val(contribution.regular_invoicing_active).prop('checked',true).trigger('change');
                                    regular_invoicing_active_checkbox.parent().addClass('checked');
                                    modal.find("select[name=contribution_frequency]").val(contribution.contribution_frequency).trigger('change');
                                    if(contribution.contribution_frequency==1){
                                        var month_day_monthly_select = modal.find('select[name=month_day_monthly]').val(contribution.month_day_monthly).trigger('change');
                                        if(contribution.week_day_monthly){
                                            var week_day_monthly_select = modal.find('select[name=week_day_monthly]').val(contribution.week_day_monthly).trigger('change');
                                        }else{
                                            var week_day_monthly_select = modal.find('select[name=week_day_monthly]').val(0).trigger('change');
                                        }
                                    }else if(contribution.contribution_frequency==6){
                                        var week_day_weekly_select = modal.find('select[name=week_day_weekly]').val(contribution.week_day_weekly).trigger('change');
                                    }else if(contribution.contribution_frequency==7){
                                        var week_day_fortnight_select = modal.find('select[name=week_day_fortnight]').val(contribution.week_day_fortnight).trigger('change');
                                        var week_number_fortnight_select = modal.find('select[name=week_number_fortnight]').val(contribution.week_number_fortnight).trigger('change');
                                    }else if(contribution.contribution_frequency==2||contribution.contribution_frequency==3||contribution.contribution_frequency==4||contribution.contribution_frequency==5){
                                        var month_day_multiple_select = modal.find('select[name=month_day_multiple]').val(contribution.month_day_multiple).trigger('change');
                                        if(contribution.week_day_multiple){
                                            var week_day_multiple_select = modal.find('select[name=week_day_multiple]').val(contribution.week_day_multiple).trigger('change');
                                        }else{
                                            var week_day_multiple_select = modal.find('select[name=week_day_multiple]').val(0).trigger('change');
                                        }
                                        var start_month_multiple_select = modal.find('select[name=start_month_multiple]').val(contribution.start_month_multiple).trigger('change');
                                    }

                                    var invoice_days_select = modal.find('select[name=invoice_days]').val(contribution.invoice_days).trigger('change');
                                           
                                }

                            }else if(contribution.type==2){
                                if(contribution.one_time_invoicing_active){
                                    var one_time_invoicing_active_checkbox = modal.find("input[name=one_time_invoicing_active]").val(contribution.one_time_invoicing_active).prop('checked',true).trigger('change');
                                    one_time_invoicing_active_checkbox.parent().addClass('checked');
                                    var invoice_date_input = modal.find("input[name=invoice_date]").val(contribution.formatted_invoice_date);
                                    var contribution_date_input = modal.find("input[name=contribution_date]").val(contribution.formatted_contribution_date);
                                }
                            }

                            if(contribution.sms_notifications_enabled==1){
                                var sms_notifications_enabled_checkbox = modal.find("input[name=sms_notifications_enabled]").val(contribution.sms_notifications_enabled).prop('checked',true).trigger('change');
                                sms_notifications_enabled_checkbox.parent().addClass('checked');
                            }

                            if(contribution.email_notifications_enabled==1){
                                var email_notifications_enabled_checkbox = modal.find("input[name=email_notifications_enabled]").val(contribution.email_notifications_enabled).prop('checked',true).trigger('change');
                                email_notifications_enabled_checkbox.parent().addClass('checked');
                            }

                            var sms_template_input = modal.find("input[name=sms_template]").val(contribution.sms_template);
                            
                            if(contribution.enable_contribution_member_list==1){
                                var enable_contribution_member_list_checkbox = modal.find("input[name=enable_contribution_member_list]").val(contribution.enable_contribution_member_list).prop('checked',true).trigger('change');
                                enable_contribution_member_list_checkbox.parent().addClass('checked');
                                var member_count = contribution.selected_group_members.length;
                                for (var i = 0; i < member_count; i++) {
                                    //alert("Am in");
                                    modal.find("select[name='contribution_member_list[]'] option[value='"+contribution.selected_group_members[i]+"']").prop("selected", true).trigger('change');
                                }
                            }

                            if(contribution.enable_fines==1){
                                var enable_fines_checkbox = modal.find("input[name=enable_fines]").val(contribution.enable_fines).prop('checked',true).trigger('change');
                                enable_fines_checkbox.parent().addClass('checked');
                                var child_count = 0;
                                $(contribution.contribution_fine_settings).each(function(index){
                                    
                                    if(index>0){
                                        $('#modal_submit_form #add-new-line').trigger('click');
                                    }

                                    modal.find('select.fine_types:eq('+child_count+')').val(this.fine_type).trigger('change');
                                    
                                    if(this.fine_type==1){
                                        modal.find('input.fixed_amounts:eq('+child_count+')').val(this.fixed_amount);
                                        modal.find('select.fixed_fine_modes:eq('+child_count+')').val(this.fixed_fine_mode).trigger('change');
                                        modal.find('select.fixed_fine_chargeable_ons:eq('+child_count+')').val(this.fixed_fine_chargeable_on).trigger('change');
                                        modal.find('select.fixed_fine_frequencies:eq('+child_count+')').val(this.fixed_fine_frequency).trigger('change');
                                    }else if(this.fine_type==2){
                                        modal.find('input.percentage_rates:eq('+child_count+')').val(this.percentage_rate);
                                        modal.find('select.percentage_fine_ons:eq('+child_count+')').val(this.percentage_fine_on).trigger('change');
                                        modal.find('select.percentage_fine_chargeable_ons:eq('+child_count+')').val(this.percentage_fine_chargeable_on).trigger('change');
                                        modal.find('select.percentage_fine_modes:eq('+child_count+')').val(this.percentage_fine_mode).trigger('change');
                                        modal.find('select.percentage_fine_frequencies:eq('+child_count+')').val(this.percentage_fine_frequency).trigger('change');
                                    }

                                    modal.find('select.fine_limits:eq('+child_count+')').val(this.fine_limit).trigger('change');
                                    
                                    if(this.fine_sms_notifications_enabled==1){
                                        var fine_sms_notifications_enabled_checkbox = modal.find("input.fine_sms_notifications_enableds:eq("+child_count+")").val(this.fine_sms_notifications_enabled).prop('checked',true).trigger('change');
                                        fine_sms_notifications_enabled_checkbox.parent().addClass('checked');
                                    }

                                    if(this.fine_email_notifications_enabled==1){
                                        var fine_email_notifications_enabled_checkbox = modal.find("input.fine_email_notifications_enableds:eq("+child_count+")").val(this.fine_email_notifications_enabled).prop('checked',true).trigger('change');
                                        fine_email_notifications_enabled_checkbox.parent().addClass('checked');
                                    }

                                    update_fine_setting_counts();
                                    child_count++;

                                });
                            }

                            if(contribution.enable_contribution_summary_display_configuration==1){
                                var enable_contribution_summary_display_configuration_checkbox = modal.find("input[name=enable_contribution_summary_display_configuration]").val(contribution.enable_contribution_summary_display_configuration).prop('checked',true).trigger('change');
                                enable_contribution_summary_display_configuration_checkbox.parent().addClass('checked');
                            }

                            if(contribution.display_contribution_arrears_cumulatively==1){
                                var display_contribution_arrears_cumulatively_checkbox = modal.find("input[name=display_contribution_arrears_cumulatively]").val(contribution.display_contribution_arrears_cumulatively).prop('checked',true).trigger('change');
                                display_contribution_arrears_cumulatively_checkbox.parent().addClass('checked');
                            }

                            $('#modal_submit_form #contributions_form_holder').slideDown();
                            App.unblockUI('.full-width-modal-body');

                        }else{
                            alert(data);
                        }
                    });
                    id = null;
                }
            });
            return false; 
        });

    });

	$(window).load(function() {
		load_contributions_listing();
	});

    function update_fine_setting_counts(){
        var number = 0;
        $('#modal_submit_form .fine_setting_row').each(function(){
            $(this).find('.fine_types').attr('name','fine_type['+(number)+']');
            $(this).find('.percentage_rates').attr('name','percentage_rate['+(number)+']');
            $(this).find('.fixed_amounts').attr('name','fixed_amount['+(number)+']');
            $(this).find('.fixed_fine_modes').attr('name','fixed_fine_mode['+(number)+']');
            $(this).find('.percentage_fine_ons').attr('name','percentage_fine_on['+(number)+']');
            $(this).find('.percentage_fine_chargeable_ons').attr('name','percentage_fine_chargeable_on['+(number)+']');
            $(this).find('.percentage_fine_modes').attr('name','percentage_fine_mode['+(number)+']');
            $(this).find('.percentage_fine_frequencies').attr('name','percentage_fine_frequency['+(number)+']');
            $(this).find('.fixed_fine_chargeable_ons').attr('name','fixed_fine_chargeable_on['+(number)+']');
            $(this).find('.fixed_fine_frequencies').attr('name','fixed_fine_frequency['+(number)+']');
            $(this).find('.fine_limit').attr('name','fine_limits['+(number)+']');
            $(this).find('.fine_sms_notifications_enableds').attr('name','fine_sms_notifications_enabled['+(number)+']');
            $(this).find('.fine_email_notifications_enableds').attr('name','fine_email_notifications_enabled['+(number)+']');
            number++;
        });
    }

	function load_contributions_listing(){
		$('#contributions_listing_holder').html('').css('min-height', '100px');;
		App.blockUI({
            target: '#contributions_listing_holder',
            overlayColor: 'white',
            animate: true
        });
	    $.ajax({
            type: "GET",
            url: 'http://localhost/chama/group/contributions/ajax_listing',
            dataType : "html",
                success: function(response) {
                	$('#contributions_listing_holder').html(response);
                    App.unblockUI('#contributions_listing_holder');
                }
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
    <div class="page-footer-inner"> 2018 &copy;
        <a href="../index.php" title="Chamasoft" target="_blank">MyChama.</a>
    </div>
    &nbsp; All Rights Reserved.
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>   

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.blockui.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.sparkline.min.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/scripts/app.min.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/components-select2.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/form-input-mask.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/counterup/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/counterup/jquery.counterup.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/bootstrap-toastr/toastr.js"></script>
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/pages/scripts/ui-toastr.js"></script>

<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/layouts/layout4/scripts/layout.min.js"></script>

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

