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
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            <?php echo $name; ?> Group | Loans
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
                    <a href="index.php">
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
                                <a href="../members/">
                                    <i class="fa fa-user-plus"></i> Add Members </a>
                            </li>
                            <li>
                                <a href="../accounts/">
                                    <i class="fa fa-plus"></i> Create Bank Account </a>
                            </li>
                            <li>
                                <a href="../contributions/">
                                    <i class="fa fa-plus"></i> Create Contribution </a>
                            </li>
                            <li>
                                <a href="https://www.paypal.com" target="_blank">
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
                                                    <a href="http://localhost/chama/group/setup_tasks/accounts">
                                                                                                            <span class="time">Completed</span> 
                                                                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                                <i class="fa fa-institution"></i>
                                                            </span> Create Group Banking Account </span>
                                                    </a>
                                                </li>
                                                                                    <li>
                                                    <a href="http://localhost/chama/group/setup_tasks/members">
                                                                                                            <span class="time">Completed</span> 
                                                                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                                <i class="fa fa-plus"></i>
                                                            </span> Add Group Members </span>
                                                    </a>
                                                </li>
                                                                                    <li>
                                                    <a href="http://localhost/chama/group/setup_tasks/contributions">
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
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <span>
                                    <i id="settings_icon" class="fa fa-cog font-grey-cascade"></i>
                                </span>
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
            <li class="">
                <a href="dashboard.php">
                <i class="fa fa-home"></i><span class="title">&nbsp;Dashboard</span></a>
            </li>
            <li>
                <a href="" onclick="myPrint()">
                    <i class="fa fa-print"></i><span>&nbsp;Print report</span></a>
                </a>
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div id="dashboard" class="row">
                <div class="col-md-12 ">
                    <div class="portlet light">
                        <div class='row'>
                            <strong>Live search:</strong>
                                <input type="text" id="myInput" name="search" placeholder="Loan ID" onkeyup="myFunction()" style="border: 1px solid #cccccc; border-radius: 4px;-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);-webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s; padding: 3px 8px; vertical-align: middle; background-color: #ffffff;"><br><br>
                            <div class="col-md-12">
                                <div class="panel panel-primary" id="myDivId">
                        <div class="panel-heading">
                            <center>
                                <font size="4" style="font-family: sans-serif;"><?php echo $name; ?> Group loans</font>
                            </center>
                        </div>
                        <div class="panel-body" align="center">
                            <div class="table-responsive">
                                <br>
                                <table cell class="table table-striped table-bordered table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Member</th>
                                            <th>Mobile</th>
                                            <th>Amount</th>
                                            <th>Loan</th>
                                            <th>Reason</th>
                                            <th>Application date</th>
                                            <th>Return date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>         
                                        <?php
                                            $conn = mysqli_connect('localhost', 'root', '','mychama') or die (mysql_error());
                                            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                                            $result = mysqli_query($conn,'select * from mychama_user_loans where chama = "'.$session.'"') or die(mysqli_error($conn));
                                            while ($row=mysqli_fetch_assoc($result)) {
                                           ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['mobile']; ?> </td>
                                                <td><?php echo $row['amount']; ?> </td>
                                                <td><?php echo $row['loan_name']; ?> </td>
                                                <td><?php echo $row['reason']; ?> </td>
                                                <td><?php echo $row['date']; ?> </td>
                                                <td><?php echo $row['return_date']; ?> </td>
                                                <td><?php echo $row['status']; ?> </td>
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
    </body>
    <script type="text/javascript">
        function myPrint() {
            var prtContent = document.getElementById("myDivId");
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }

        function myFunction() {
            // declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            //loop through all table rows and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                    else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</html>