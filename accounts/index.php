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

if (isset($_POST['btnAccount'])) {
    $results = mysqli_query($conn,'select * from accounts where chama_user = "'.$session.'"') or die(mysqli_error($conn));
    if (mysqli_num_rows($results) > 0) {
        echo "<script>window.alert('You already have a bank account');</script>";
        header("refresh: 0.1; url=../members/");
        exit();
    }

    $pp_user = $_POST['paypal_username'];
    $acc_name = $_POST['account_name'];
    $acc_number = $_POST['account_number'];
    $bank_name = $_POST['select_bank_name'];

    mysqli_query($conn,"insert into accounts(bank_name,chama_user,pp_username, acc_name, acc_number) values ('$bank_name','$session','$pp_user', '$acc_name', '$acc_number')") or die(mysqli_error($conn));
    echo "<script>window.alert('Account added successfully!');</script>";
    header("refresh: 0.1; url=../members/");
}

if (isset($_POST['btnEdit'])) {
    $pp_users = $_POST['paypal_username'];
    $acc_names = $_POST['account_name'];
    $acc_numbers = $_POST['account_number'];
    $bank_names = $_POST['select_bank_name'];

    mysqli_query($conn,"update accounts set bank_name='$bank_names', pp_username='$pp_users', acc_name='$acc_names', acc_number='$acc_numbers' where chama_user='$session'") or die(mysqli_error($conn));
    echo "<script>window.alert('Account updated successfully!');</script>";
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Group Accounts</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link href="../uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />

        <!--<link href="http://localhost/chama/templates/admin_themes/groups/css/googleapis/googleapis.css" type="text/css" rel="stylesheet" />-->

        <!-- Loading javascript to be used through out-->

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
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="index.php">
                <img src="../uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
            </a>
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
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
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
                                                    <a href="">
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
<div>
    <ul class="pager">
        <li class="next">
            <a href="../members/"> Next → </a>
        </li>
    </ul>
</div>
<div id="heading">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-center">To get started on MyChama, add your group bank account.</h3>
        </div>
    </div>
</div>
<div id="" class="margin-top-20">
    <div class="row margin-top-20">
        <div class="col-sm-12">
            <div class="text-center">
                <a href="#" class="inline btn btn-lg blue" data-toggle="modal" data-target="#add_paypal_account">
                    <i class="fa fa-plus-square-o"></i> Add Bank Account  
                </a>
            </div>
        </div>
    </div>
    <div id="bank_accounts_options_holder">
        <div class="row">
            <div class="col-sm-12 margin-top-10">
                <div class="text-center">
                    <h4>Or</h4>
                    <h4>Manage Existing Bank Accounts</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $name."'s Bank account"; ?></h3>
                    </div>
                    <!-- Table -->
                    <table id="bank_accounts_list" class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Bank Name</th>
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>PayPal Username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'mychama') or die(mysql_error());
                                    /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                    $result = mysqli_query($conn,"select * from accounts where chama_user='$session'") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_assoc($result)){
                                ?>
                                <td class="bank-name"><?php echo $row['bank_name']; ?></td>
                                <td class="account-name"><?php echo $row['acc_name']; ?></td>
                                <td class="account-number"><?php echo $row['acc_number']; ?></td>
                                <td class="account-number"><?php echo $row['pp_username']; ?></td>
                                <td>
                                    <a href="#" id="<?php echo $row['acc_number']; ?>" data-toggle="modal" data-target="#edit_bank_account">
                                        <i class="fa fa-edit"></i> 
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
    </div>
</div>

<form method="post">
    <?php
        $conn = mysqli_connect('localhost', 'root', '', 'mychama') or die(mysqli_error($conn));
        /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
        $result = mysqli_query($conn,"select * from accounts where chama_user='$session'") or die(mysqli_error($conn));
        $row=mysqli_fetch_array($result);
        mysqli_close($conn);
    ?>
    <div id="edit_bank_account" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Edit PayPal Account</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bank-name">Bank name<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-home"></i>
                            </span>
                            <select class="form-control" required name="select_bank_name">
                                <option active value="<?php echo $row['bank_name']; ?>"></option>
                                <option>Equity bank</option>
                                <option>KCB bank</option>
                                <option>Co-op bank</option>
                                <option>National bank</option>
                                <option>Family bank</option>
                                <option>Barclays bank</option>
                                <option>DTB bank</option>
                                <option>Standard charterd bank</option>
                                <option>Stanbic bank</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bank-name">Bank account connected to PayPal<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="paypal_username"class="form-control" placeholder="PayPal Username" value="<?php echo $row['pp_username']; ?>" required/>
                        </div>
                    </div>
                    <div id="account_name_input_group" class="form-group">
                        <label>Group's account name?<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-bank"></i>
                            </span>
                            <input type="text" name="account_name" class="form-control" placeholder="Account Name" value="<?php echo $row['acc_name']; ?>" required/>
                        </div>
                    </div>
                    <div id="account_number_input_group" class="form-group">
                        <label>What is the account number?<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-bars"></i>
                            </span>
                            <input type="text" name="account_number" class="form-control" placeholder="Account Number" value="<?php echo $row['acc_number']; ?>" required/>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="inline btn btn-sm blue" name="btnEdit">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <form method="post">
    <div id="add_paypal_account" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h4 class="modal-title">Add PayPal Account</h4>
                    </center>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="bank-name">Bank name<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-home"></i>
                            </span>
                            <select class="form-control" required name="select_bank_name">
                                <option value="" required>Choose your bank</option>
                                <option required>Equity bank</option>
                                <option required>KCB bank</option>
                                <option required>Co-op bank</option>
                                <option required>National bank</option>
                                <option required>Family bank</option>
                                <option required>Barclays bank</option>
                                <option required>DTB bank</option>
                                <option required>Standard charterd bank</option>
                                <option required>Stanbic bank</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bank-name">Bank account connected to PayPal<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                            </span>
                            <input type="text" name="paypal_username"class="form-control" placeholder="PayPal Username" required/>
                        </div>
                    </div>
                    <div id="account_name_input_group" class="form-group">
                        <label>Group's account name?<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-bank"></i>
                            </span>
                            <input type="text" name="account_name" class="form-control" placeholder="Account Name" required/>
                        </div>
                    </div>
                    <div id="account_number_input_group" class="form-group">
                        <label>What is the account number?<span class="required">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <i class="fa fa-bars"></i>
                            </span>
                            <input type="text" name="account_number" class="form-control" placeholder="Account Number" required/>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <a href="https://www.paypal.com/us/webapps/mpp/account-selection" class="inline btn btn-sm green" target="_blank">Create PayPal account</a>
                    <button type="submit" class="inline btn btn-sm blue" name="btnAccount">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<div id='bank_account_success'>
    <div class="form-body" id="">
        <div class="alert alert-block alert-success fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <h4 class="alert-heading text-center">Success! You have successfully saved your group bank account details</h4>
            <p class="text-center">
                <a class="btn green inline margin-right-10" href="#" data-toggle="modal" data-content="#bank_account_form" data-title="Add Bank Account" data-id="add_bank_account"> Add Another Account </a>
                <a class="btn blue" href="http://localhost/chama/group/setup_tasks/members"> Proceed to Add Members </a>
            </p>
        </div>
    </div>
</div>
<div id='request_one_time_password_form'>
    <div class="form-body" id="request_one_time_password">
        <div class="form-group">
            <div class="alert alert-success">
                Success! You have successfully saved your group bank account, request one time password to connect your account. 
            </div>
        </div>
        <div class="form-group">
            <div class="alert alert-danger data_error" id="" style="display:none;">
            </div>
        </div>
        <div style="display:none;" class="form-group">
            <label>
                Bank Account                <span class="required">*</span></label>
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-bank"></i>
                </span>
                <input type="text" name="request_one_time_account_number" value=""  class="form-control request_one_time_account_number" readonly="readonly" placeholder="Account Number" id="request_one_time_account_number"  />
            </div>
        </div>
        <input type="hidden" name="request_one_time_bank_account_id" value="" id="request_one_time_bank_account_id" class="request_one_time_bank_account_id"  />
 
        <div class="form-group">
            <label>Enter the primary signatory phone number to receive your password<span class="required">*</span></label>
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-bars"></i>
                </span>
                <input type="text" name="request_one_time_phone" value=""  class="form-control request_one_time_phone" placeholder="Signatory Phone Number" id="request_one_time_phone"  />
            </div>
        </div>
    </div>
</div>
<div id='verify_one_time_password_form'>
    <div class="form-body" id="verify_one_time_password">
        <div class="form-group">
            <div class="alert alert-danger data_error" id="" style="display:none;">
            </div>
        </div>
        <input type="hidden" name="verify_one_time_password_account_number" value="" class="verify_one_time_password_account_number" id="verify_one_time_password_account_number"  />
<input type="hidden" name="verify_one_time_password_phone" value="" class="verify_one_time_password_phone" id="verify_one_time_password_phone"  />
<input type="hidden" name="verify_one_time_password_bank_account_id" value="" class="verify_one_time_password_bank_account_id" id="verify_one_time_password_bank_account_id"  />
        <div class="form-group">
            <label>Enter the Verfication Code sent via SMS to activate transaction alerts<span class="required">*</span></label>
            <div class="input-group">
                <span class="input-group-addon">
                <i class="fa fa-bars"></i>
                </span>
                <input type="text" name="verification_code" value=""  class="form-control" placeholder="Verification Code" id="verification_code"  />
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
            </div>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 2018 &copy;
        <a href="index.php">MyChama.</a>
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