<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','mychama');
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result = mysqli_query($conn,'select * from mychama_members where username = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $name=$row['name'];
    $phone=$row['mobile'];
    $chama=$row['chama'];
}
}
else {
header('location:../login.php');
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
        <title>
            Member Dashboard
        </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        
        <link href="uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        
        <!-- Loading javascript to be used through out-->
        <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/jquery.min.js"></script>
        
         <!--<link href="http://localhost/chama/templates/admin_themes/groups/css/global/plugins/meterialize/materialize.css" type="text/css" rel="stylesheet" />-->


        <link href="http://localhost/chama/templates/admin_themes/groups/css/layouts/layout4/css/layoutnew.css" type="text/css" rel="stylesheet" />


        <link href="http://localhost/chama/templates/admin_themes/groups/css/custom/custom.min.css" type="text/css" rel="stylesheet" />
        <link href="http://localhost/chama/templates/admin_themes/groups/css/custom.css" type="text/css" rel="stylesheet" />
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
            
            <li class="#">
                <a href="edit_profile.php">
                <i class="fa fa-user"></i>
                <span class="title">Edit Profile</span></a></li>
            
            <li class="">
                <a href="statement.php">
                <i class="fa fa-book"></i>
                <span class="title">Statement</span></a></li>

            <li class="">
                <a href="loans.php">
                <i class="fa fa-money"></i>
                <span class="title">Loans</span></a></li>
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
                           <i class="fa fa-user font-dark"></i>
            <span class="caption-subject font-dark">View Profile</span></div>
                    </div>
                    <div class="portlet-body form">
                        <div class='row'>
                            <div class='col-md-9'>
<div class="row">
    <div class="col-md-12">
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet bordered">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="../templates/frontend_themes/startuply/img/avatar.png" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php echo $name; ?></div>
                    <div class="profile-usertitle-job"> Member </div>
                </div>
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="icon-home"></i> Overview 
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <div class="portlet light bordered">
                <div>
                    <h4 class="profile-desc-title">About <?php echo $name; ?></h4>
                    <span class="profile-desc-text"></span>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-phone"></i><?php echo $phone; ?>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-envelope"></i>
                        <?php echo $session; ?>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-bar-chart theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">
                                        Deposit
                                    </span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="member_on_going_loans">
                                        <div class="table-scrollable table-scrollable-borderless"><form method="POST" action="../mpesa/home.php">
                                            <div class="form-group">
                                                <label>Contribution Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-list-alt"></i>
                                                    </span>
                                                    <?php
                                                        $conn = mysqli_connect('localhost','root','','mychama');
                                                        /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                                        $result = mysqli_query($conn,'select * from mychama_contributions where chama = "'.$chama.'"') or die(mysqli_error($conn));
                                                        $row=mysqli_fetch_assoc($result); mysqli_close($conn); ?>
                                                    <input type="text" readonly name="item_name" class="form-control" value="<?php echo $row['name']; ?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Safaricom number<span class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                    </span>
                                                    <input type="tel" name="number" class="form-control" placeholder="Mpesa number" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Amount <span class='required'>*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-money"></i>
                                                    </span> 
                                                    <input type="text" name="ammount" placeholder="e.g 50" class="form-control " autocomplete="off" required/>
                                                    <input type="hidden" name="back" value="member/">
                                                    <input type="hidden" name="payer" value="<?php echo $name; ?>">
                                                    <input type="hidden" name="txtChama" value="<?php echo $chama; ?>">
                                                </div>
                                            </div>
                                            <div class="form-actions text-center">
                                                <button type="submit" class="btn blue submit_form_button" name="btnDeposit">Deposit</button>
                                            </div></form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="fa fa-pie-chart"></i>
                                <span class="caption-subject ">Group Financial Summary</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="group_financial_summary">
                                    <div class='row'>
                                        <div>
                                            <a href="#">
                                                <?php
                                                    $conn = mysqli_connect('localhost','root','','mychama');
                                                    /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                                    $result = mysqli_query($conn,'select * from total where chama = "'.$chama.'"') or die(mysqli_error($conn));
                                                    while ($row=mysqli_fetch_assoc($result)){
                                                        $id=$row['amount'];
                                                    }

                                                    $result2 = mysqli_query($conn,'select * from payments where name = "'.$name.'"') or die(mysqli_error($conn));
                                                    $total2=0;
                                                    while ($row2=mysqli_fetch_assoc($result2)){
                                                        $id2=$row2['payment_gross'];
                                                        $total2+=$id2;
                                                    }
                                                ?>
                                                <div class="dashboard-stat bank-balance  blue">
                                                    <div class="visual">
                                                        <i class="fa fa-money"></i>
                                                    </div>
                                                    <div class="details">
                                                        <div class="number">
                                                            KES&nbsp;<span data-counter="counterup"><?php echo $id; ?></span>
                                                        </div>
                                                        <div class="desc"> Total Group Cash at Bank </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div>
                                            <a href="#">
                                            <div class="dashboard-stat blue">
                                                <div class="visual">
                                                    <i class="fa fa-bar-chart-o"></i>
                                                </div>
                                                <div class="details">
                                                    <div class="number">
                                                        KES&nbsp;<span data-counter="counterup"><?php echo $total2; ?></span></div>
                                                    <div class="desc">Your Total Contributions</div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    </div>
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-bar-chart theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">
                                    Financial Summary
                                </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="member_contributions">
                                    <div class="table-scrollable table-scrollable-borderless">
                                        <table class="table table-hover table-light table-striped">
                                            <thead>
                                                <tr class="uppercase">
                                                    <th> Member Name</th>
                                                    <th> Contribution Name </th>
                                                    <th class='text-right'> Total Paid (KES) </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $conn = mysqli_connect('localhost','root','','mychama');
                                                /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                                $result = mysqli_query($conn,'select * from payments where name = "'.$name.'"') or die(mysqli_error($conn));
                                                while($row=mysqli_fetch_assoc($result)){ ?>
                                                    <tr>
                                                        <td><?php echo $row['name']; ?></td>
                                                        <td><?php echo $row['item_name']; ?></td>
                                                        <td class='text-right'>
                                                            <span class="bold theme-font">
                                                                <?php echo $row['payment_gross']; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                mysqli_close($conn);
                                                ?>
                                            </tbody>
                                        </table>
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
                            <div class='col-md-3'>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN QUICK SIDEBAR SETTINGS -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Settings
                    <!--<span class="badge badge-success">7</span>-->
                </a>
            </li>
            <li>
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> 
                    Help
                </a> 
            </li>
            <li class="dropdown">
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane page-quick-sidebar-chat" id="quick_sidebar_tab_1"></div>
            <div class="tab-pane active page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                <div class="page-quick-sidebar-alerts-list">
                    <div class="margin-top-160">&nbsp;</div>
                </div>
            </div>

            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                <div class="page-quick-sidebar-settings-list">
                    <h3 class="list-heading">General Settings</h3>
                    <ul class="list-items borderless">
                        <li> Enable Notifications
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Allow Tracking
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Log Errors
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Auto Sumbit Issues
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Enable SMS Alerts
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <h3 class="list-heading">System Settings</h3>
                    <ul class="list-items borderless">
                        <li> Security Level
                            <select class="form-control input-inline input-sm input-small">
                                <option value="1">Normal</option>
                                <option value="2" selected>Medium</option>
                                <option value="e">High</option>
                            </select>
                        </li>
                        <li> Failed Email Attempts
                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                        <li> Secondary SMTP Port
                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                        <li> Notify On System Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Notify On SMTP Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <div class="inner-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR SETTINGS-->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> <?php echo date("Y"); ?> &copy;
        <a href="../index.php" target="_blank">MyChama.</a>
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
        <form action="http://localhost/chama/member" class="modal-form modal_form_submit" role="form" id="submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="38647e6f5b29c3355cf08d54bd7292a7" style="display:none;" />
            <input type="text" style="display:none" value="" name="process_title">
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
        <form action="http://localhost/chama/member" class="modal-form modal_form_submit" role="form" id="stackable_submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="38647e6f5b29c3355cf08d54bd7292a7" style="display:none;" />
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
    </div>
</div>
    <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/custom.js"></script>
    <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/global/scripts/app.min.js"></script>
</body>
</html>