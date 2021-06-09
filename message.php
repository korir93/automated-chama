<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
$session = $_SESSION['username'];
$conn = mysqli_connect('localhost','root','','mychama');
/*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
$result = mysqli_query($conn,'select * from mychama_users where email = "'.$session.'"') or die(mysqli_error($conn));
while ($row=mysqli_fetch_assoc($result)) {
    $name=$row['g_name'];
}
$results = mysqli_query($conn,'select * from accounts where chama_user = "'.$session.'"') or die(mysqli_error($conn));
$rows=mysqli_num_rows($results);
if (!($rows > 0)) {
    header("location: accounts/");
    exit();
}
while ($rows=mysqli_fetch_assoc($results)) {
    $account=$row['acc_name'];
    $accnumber=$row['acc_number'];
}
$result2 = mysqli_query($conn,'select * from mychama_members where chama = "'.$session.'"') or die(mysqli_error($conn));
$row2=mysqli_num_rows($result2);
if (!($row2 > 0)) {
    header("location: members/");
    exit();
}
$result3 = mysqli_query($conn,'select * from mychama_contributions where chama = "'.$session.'"') or die(mysqli_error($conn));
$row3=mysqli_num_rows($result3);
if (!($row3 > 0)) {
    header("location: contributions/");
    exit();
}
}
else {
header('location: login.php');
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
            Group Dashboard
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
            <a href="index.php">
                <img src="uploads/logos/logo_(1)4.png" alt="logo" class="logo-default" />
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
                        <a href="members/">
                            <i class="fa fa-user-plus"></i> Add Members </a>
                    </li>
                    <li>
                        <a href="accounts/">
                            <i class="fa fa-plus"></i> Create Bank Account </a>
                    </li>
                    <li>
                        <a href="contributions/">
                            <i class="fa fa-plus"></i> Create Contribution </a>
                    </li>
                    <li>
                        <a href="deposit.php" target="_blank">
                            <i class="fa fa-money"></i> Deposit </a>
                    </li></ul>
            </div>
        </div>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
                    <li class="separator hide"> </li>
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                                                    </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li class="external">

                                                                    <h3>You have
                                    completed your group set up tasks.</h3>
                                                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                                            <li>
                                            <a href="accounts/">
                                                <span class="time">Completed</span> 
                                                    <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-institution"></i>
                                                    </span> Create Group Banking Account </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="members/">
                                                <span class="time">Completed</span> 
                                                    <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> Add Group Members </span>
                                            </a>
                                        </li>
                                                                            <li>
                                            <a href="contributions/">
                                                                                                    <span class="time">Completed</span> 
                                                                                                <span class="details">
                                                    <span class="label label-sm label-icon label-success">
                                                        <i class="fa fa-plus"></i>
                                                    </span> Create Contribution </span>
                                            </a>
                                        </li>
                                                                    </ul>
                            </li>

                            <li class="external">
                                <h3>
                                <a class="font-white" href="http://localhost/chama/group/setup_tasks/accounts">
                                                                            Review Set Up Tasks
                                                                    </a></h3>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"><?php echo $name; ?></span>
                            <img alt="" class="img-circle" src="templates/frontend_themes/startuply/img/avatar.png"/>
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
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200">
		<li class="active">
			<a href="dashboard.php">
			<i class="fa fa-home"></i><span class="title">&nbsp;Dashboard</span></a></li>
		<li class="">
			<a href="#">
			<i class="fa fa-money"></i><span class="title">&nbsp;Deposits <span style="display:none;" class="badge badge-info  deposits_count  ">0</span></span><span class="arrow "></span></a><ul class="sub-menu">
        <li class="">
            <a href="deposit.php">
            <i class="fa fa-undo"></i>&nbsp;Deposit Money</a></li>
		<li class="">
			<a href="deposits.php">
			<i class="fa fa-list"></i>&nbsp;List Deposits</a></li></ul></li>
			
		<li class="">
			<a href="#">
			<i class="fa fa-arrows-h"></i><span class="title">&nbsp;Withdrawals <span style="display:none;" class="badge badge-info  withdrawals_count  ">0</span></span><span class="arrow "></span></a><ul class="sub-menu">
        <li class="">
            <a href="withdraw.php">
            <i class="fa fa-undo"></i>&nbsp;Send money</a></li>
		<li class="">
			<a href="with_reports.php">
			<i class="fa fa-list"></i>&nbsp;List Withdrawals</a></li></ul></li>
        <li class="">
            <a href="#">
            <?php
            $conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
            $reports = mysqli_query($conn,'select count(status) as totalrep from mychama_user_loans where status = "new"') or die(mysqli_error($conn));
            $rep=mysqli_fetch_assoc($reports);
            $repcount = $rep['totalrep'];
            ?>
            <i class="fa fa-money"></i><span class="title">&nbsp;Loans<?php echo " (".$repcount.")"; ?></span><span class="arrow "></span></a><ul class="sub-menu">
        <li class="">
            <a href="loans/">
            <i class="fa fa-pencil"></i>&nbsp;Create Member Loan</a></li>
        <li class="">
            <a href="all_loans.php">
            <i class="fa fa-list"></i>&nbsp;All Loans</a></li>
        <li class="">
            <a href="group_loans.php">
            <i class="fa fa-list"></i>&nbsp;New Loans</a></li>
        <li class="">
            <a href="app_loans.php">
            <i class="fa fa-bars"></i>&nbsp;Approved Loans</a></li>
        <li class="">
            <a href="rej_loans.php">
            <i class="fa fa-times-circle"></i>&nbsp;Rejected Loans</a></li>
            </ul>
        </li>
        <li class="">
            <a href="loans/merry.php">
            <i class="fa fa-dot-circle-o"></i><span class="title">&nbsp;Merry-go-round</span></a></li>
        <li class="">
            <a href="message.php">
            <i class="fa fa-envelope"></i><span class="title">&nbsp;Messaging</span></a></li>
        </ul>
    </div>
</div>
<div class="page-content-wrapper">
        <div class="page-content">
            <div id="dashboard" class="row">
	<div class="col-md-12 ">
		<div class="portlet light">
			<div class="row">
                <div class="col-md-6">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="fa fa-envelope"></i>
                                <span class="caption-subject ">Contribution reminder (SMS)</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <h4><?php echo $name; ?> group contributions</h4>
                                <div class="tab-pane active" id="group_financial_summary">
                                    <div class='row'>
                                        <div class="table table-responnsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <th>Cont. ID</th>
                                                        <th>Cont. Name</th>
                                                        <th>How often?</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $conn = mysqli_connect('localhost', 'root', '', 'mychama');
                                                        /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                                        $resultm = mysqli_query($conn,"select * from mychama_contributions where chama = '".$session."'") or die(mysqli_error($conn));
                                                        while($rowm = mysqli_fetch_assoc($resultm)){
                                                    ?>
                                                        <td><?php echo $rowm['id']; ?></td>
                                                        <td><?php echo $rowm['name']; ?></td>
                                                        <td><?php echo $rowm['f_often']; ?></td>
                                                        <td>
                                                            <a class="btn btn-success btn-xs" href="message.php?id=<?php echo $rowm['id']; ?>" onclick="return confirm('Please confirm you want to send messages');">Remind members</a>
                                                        </td>
                                                        <?php
                                                            if (isset($_GET['id'])) {
                                                                $resultt = mysqli_query($conn,'select * from mychama_members where chama = "'.$session.'"') or die(mysqli_error($conn));
                                                                while ($rowt=mysqli_fetch_assoc($resultt)) {
                                                                    $mynumber = $rowt['mobile'];
                                                                    $myname = $rowt['name'];
                                                                    $myamount = $rowm['amount'];
                                                                    $message = "Dear $myname, $name group reminds you to send your contribution of Kshs $myamount. Thank you";
                                                                    require_once('AfricasTalkingGateway.php');
                                                                    $gateway    = new AfricasTalkingGateway("findpata", "427e7b2ea5cc866df675db45c87d18ce0a36e75aeb1b5bf6e0c4af6394b1b1fc");
                                                                    try 
                                                                    {
                                                                      $results = $gateway->sendMessage($mynumber, $message);           
                                                                      foreach($results as $result) {
                                                                        echo " <br><br> Number: ".$result->number;
                                                                        echo " Status: " .$result->status;
                                                                        echo " MessageId: " .$result->messageId;
                                                                        echo " Cost: "   .$result->cost."\n"."\n";
                                                                      }
                                                                    }
                                                                    catch ( AfricasTalkingGatewayException $e )
                                                                    {
                                                                      echo "Encountered an error while sending: ".$e->getMessage();
                                                                    }
                                                                }
                                                                echo "<script>window.alert('All group members were reminded!');</script>";
                                                            }
                                                        ?>
                                                    </tr>
                                                    <?php } mysqli_close($conn); ?>
                                                </tbody>
                                            </table>
                                        </div>
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
                                <i class="fa fa-envelope"></i>
                                <span class="caption-subject ">Send message to individual</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="group_financial_summary">
                                    <div class='row'><br>
                                        <form method="POST" action="send.php">
                                            <div class="form-group">
                                                <label>Mobile Number<span class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-phone"></i>
                                                    </span>
                                                    <input type="number" minlength="10" maxlength="13" name="txtNumber" class="form-control" required placeholder="+254 712 345 678"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Message<span class="required">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <textarea class="form-control" name="txtMessage" required placeholder="Enter your message here" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <input type="submit" class="inline btn btn-sm blue" name="btnDeposit" value="Send">
                                        </form>
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
<div class="page-footer">
    <div class="page-footer-inner"> 2018 &copy; 
        <a href="index.php" target="_blank">MyChama.</a>
    </div>
    &nbsp;All Rights Reserved.
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
            <form action="http://localhost/chama/group" class="modal-form modal_form_submit" role="form" id="submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="2c399129d4a2ef07275775188742c4fb" style="display:none;" />
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
        <form action="http://localhost/chama/group" class="modal-form modal_form_submit" role="form" id="stackable_submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="2c399129d4a2ef07275775188742c4fb" style="display:none;" />
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
            <form action="http://localhost/chama/group" class="modal-form modal_form_submit" role="form" id="modal_submit_form" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="2c399129d4a2ef07275775188742c4fb" style="display:none;" />
                <input type="text" style="display:none" value="" name="process_title">
                <div class="full-width-modal-body">
                
                
                </div>
                <div class="full-width-modal-body-loading">
                
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
<script type="text/javascript" src="http://localhost/chama/templates/admin_themes/groups/js/custom.js"></script>
<script type="text/javascript">
</script>
</body>
</html>