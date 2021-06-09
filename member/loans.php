<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
    $session = $_SESSION['username'];
    $conn = mysqli_connect('localhost','root','','mychama');
    /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
    $result = mysqli_query($conn,'select * from mychama_members where username = "'.$session.'"') or die(mysqli_error($conn));
    while ($row=mysqli_fetch_assoc($result)) {
        $name=$row['name'];
        $fmobile=$row['mobile'];
        $femail=$row['email'];
        $fusername=$row['username'];
        $fpass=$row['password'];
        $chama=$row['chama'];
    }
}
else {
    header('location: ../login.php');
}

if (isset($_POST['btnEditMember'])) {
    $fname = $_POST['first_name'];
    $mobile = $_POST['mobile'];
    $select = $_POST['txtSelect'];
    $amount = $_POST['amount'];
    $reason = $_POST['reason'];

    $reports = mysqli_query($conn,'select count(status) as totalrep from mychama_user_loans where status = "new" and user="'.$session.'" and chama="'.$chama.'"') or die(mysqli_error($conn));
    $rep=mysqli_fetch_assoc($reports);
    $repcount = $rep['totalrep'];

    mysqli_query($conn,'insert into mychama_user_loans (name,mobile,amount,loan_name,reason,chama,user,status,return_date) values ("'.$fname.'","'.$mobile.'","'.$amount.'","'.$select.'","'.$reason.'","'.$chama.'","'.$session.'","new","waiting approval")') or die(mysqli_error($conn));
    echo "<script>window.alert('Success! Group chair will approve');</script>";
    header("refresh: 0.1; url=loans.php");
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>
            Apply Loan | <?php echo $name; ?>
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
                        <a href="index.php">
                            <i class="fa fa-user-plus"></i> Dashboard </a>
                    </li>
                    <li>
                        <a href="loans.php">
                            <i class="fa fa-money"></i> Loans </a>
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
                <span class="title">Your Profile</span><span class="arrow "></span></a><ul class="sub-menu">
                <li class="">
                    <a href="edit_profile.php">
                    <i class="fa fa-pencil"></i>Edit Profile</a></li></ul></li>
            
            <li class="#">
                <a href="">
                <i class="fa fa-list"></i>
                <span class="title">Statements</span><span class="arrow "></span></a><ul class="sub-menu">
                <li class="">
                    <a href="statement.php">
                    <i class="fa fa-arrow-right"></i>Deposits</a></li>
                <li class="">
                    <a href="rep_deposits.php">
                    <i class="fa fa-arrow-left"></i>Withdrawals</a></li>
                </ul></li>

            <li class="">
                <a href="" onclick="myPrint()">
                <i class="fa fa-print"></i>
                <span class="title">Print</span></a></li>
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
            <span class="caption-subject font-dark">My Loans | <?php echo $name; ?></span>                        </div>
                                                
                    </div>
                    <div class="portlet-body form">
                        <div class='row'>
                            <div class='col-md-6'>
    <form class="form_submit" role="form" enctype="multipart/form-data" method="post" accept-charset="utf-8">
<input type="hidden" name="csrf_test_name" value="38647e6f5b29c3355cf08d54bd7292a7" style="display:none;" />
    <div class="form-body">
        <fieldset>
            <legend>Personal Details</legend>
            <div class="form-group">
                <label>
                        Full Name <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </span>
                    <input type="text" readonly name="first_name" class="form-control" placeholder="Full Name" value="<?php echo $name; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                        Phone Number <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </span>
                    <input type="text" readonly name="mobile" class="form-control" placeholder="+254 xxxxxxxxx" value="<?php echo $fmobile; ?>" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                Loan Name<span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-list"></i>
                    </span>
                    <select name="txtSelect" class="form-control" required>
                        <option value="">Choose loan name</option>
                        <?php
            $conn = mysqli_connect('localhost','root','','mychama') or die(mysql_error());
            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
            $resultq = mysqli_query($conn,'select * from mychama_loans where chama = "'.$chama.'"') or die(mysqli_error($conn));
            while ($rowq=mysqli_fetch_assoc($resultq)) { ?>
                        <option><?php echo $rowq['name']; ?></option>
                        <?php }
            ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>
                    Loan Amount <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-money"></i>
                    </span>
                    <input type="number" min="100" max="10000000" name="amount" class="form-control" placeholder="Kshs. 100" required/>
                </div>
            </div>
            <div class="form-group">
                <label>
                    Why you need the loan? <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <textarea name="reason" rows="3" class="form-control" placeholder="Brief explanation why you need the loan" required></textarea>
                </div>
            </div>
        </fieldset>
        <div class="form-actions">
            <button type="submit" class="btn blue submit_form_button" name="btnEditMember">
                        Apply Loan            </button>
            <button type="button" class="btn btn-md blue processing_form_button disabled" name="processing" value="Processing"><i class="fa fa-spinner fa-spin"></i> 
                        Processing            </button> 
            <button type="button" class="btn default">
                        Cancel
            </button>
        </div>
    </div>
</form>
                            </div>
                            <div class='col-md-6'>
                                <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title">Loan calculator</h3>
            </div>
        <table cellspacing="1" class="table table-bordered table-responsive">
          <tr><th>Enter Loan Data:</th></tr>
            <tr><td>Amount of the loan (Kshs):</td>
            <td><input id="amount" class="form-control" onchange="calculate();"></td>
            </tr>
            <tr><td>Annual interest (%):</td>
              <td><input id="apr" class="form-control" onchange="calculate();"></td></tr>
            <tr><td>Repayment period (years):</td>
              <td><input id="years" class="form-control" onchange="calculate();"></td></tr>
            <tr><th>Approximate Payments:</th>
              <td><button onclick="calculate();" class="btn btn-primary btn-sm">Calculate</button></td></tr>
            <tr><td>Monthly payment:</td>
              <td>Kshs <span class="output" id="payment"></span></td></tr>
            <tr><td>Total payment:</td>
              <td>Kshs <span class="output" id="total"></span></td></tr>
            <tr><td>Total interest:</td>
              <td>Kshs <span class="output" id="totalinterest"></span></td></tr>
        </table>
    </div>
                                <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $name."'s Loans & Information"; ?></h3>
            </div>
            <!-- Table -->
            <table id="members_list" class="table table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Loan</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Return Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'mychama');
                            /*$conn = mysqli_connect('localhost', 'findpata_snippetc', 'Manusoftwares2946', 'findpata_sokoni') or die(mysqli_error($conn));*/
                            $results = mysqli_query($conn,"select * from mychama_user_loans where user = '".$session."'") or die(mysqli_error($conn));
                            while($rows = mysqli_fetch_assoc($results)){
                        ?>
                        <td class="member-name"><?php echo $rows['id']; ?></td>
                        <td class="member-contacts"><?php echo $rows['loan_name']; ?></td>
                        <td class="group-role-name"><?php echo $rows['amount']; ?></td>
                        <td class="group-role-name"><?php echo $rows['date']; ?></td>
                        <td class="group-role-name"><?php echo $rows['status']; ?></td>
                        <td class="group-role-name"><?php echo $rows['return_date']; ?></td>
                        <td>
                            <a class="btn btn-success btn-xs" href="../mpesa/homess.php?id=<?php echo $rows['id']; ?>&amt=<?php echo $rows['amount']; ?>&mob=<?php echo $rows['mobile']; ?>&bck=loans.php&chm=<?php echo $rows['chama']; ?>&nme=<?php echo $name; ?>&ret=<?php echo $rows['return_date']; ?>&tru=<?php echo $rows['status']; ?>">Pay</a>
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

<script type="text/javascript">
    function calculate() {
  //Look up the input and output elements in the document
  var amount = document.getElementById("amount");
  var apr = document.getElementById("apr");
  var years = document.getElementById("years");
  var zipcode = document.getElementById("zipcode");
  var payment = document.getElementById("payment");
  var total = document.getElementById("total");
  var totalinterest = document.getElementById("totalinterest");
  
// Get the user's input from the input elements.
// Convert interest from a percentage to a decimal, and convert from
// an annual rate to a monthly rate. Convert payment period in years
// to the number of monthly payments.
var principal = parseFloat(amount.value);
var interest = parseFloat(apr.value) / 100 / 12;
var payments = parseFloat(years.value) * 12;
  
// compute the monthly payment figure
var x = Math.pow(1 + interest, payments); //Math.pow computes powers
var monthly = (principal*x*interest)/(x-1);

// If the result is a finite number, the user's input was good and
// we have meaningful results to display
if (isFinite(monthly)){
  // Fill in the output fields, rounding to 2 decimal places
  payment.innerHTML = monthly.toFixed(2);
  total.innerHTML = (monthly * payments).toFixed(2);
  totalinterest.innerHTML = ((monthly*payments)-principal).toFixed(2);
  
// Save the user's input so we can restore it the next time they visit
 save(amount.value, apr.value, years.value, zipcode.value);

 // Advertise: find and display local lenders, but ignore network errors
 try { // Catch any errors that occur within these curly braces
 getLenders(amount.value, apr.value, years.value, zipcode.value);
 }
  
  catch(e) { /* And ignore those errors */ }
 // Finally, chart loan balance, and interest and equity payments
 chart(principal, interest, monthly, payments);
 }
 else {
 // Result was Not-a-Number or infinite, which means the input was
 // incomplete or invalid. Clear any previously displayed output.
 payment.innerHTML = ""; // Erase the content of these elements
 total.innerHTML = ""
 totalinterest.innerHTML = "";
 chart(); // With no arguments, clears the chart
 }
}
// Save the user's input as properties of the localStorage object. Those
// properties will still be there when the user visits in the future
// This storage feature will not work in some browsers (Firefox, e.g.) if you
// run the example from a local file:// URL. It does work over HTTP, however.
function save(amount, apr, years, zipcode) {
 if (window.localStorage) { // Only do this if the browser supports it
 localStorage.loan_amount = amount;
 localStorage.loan_apr = apr;
 localStorage.loan_years = years;
 localStorage.loan_zipcode = zipcode;
 }
}
// Automatically attempt to restore input fields when the document first loads.
window.onload = function() {
 // If the browser supports localStorage and we have some stored data
 if (window.localStorage && localStorage.loan_amount) {
 document.getElementById("amount").value = localStorage.loan_amount;
 document.getElementById("apr").value = localStorage.loan_apr;
 document.getElementById("years").value = localStorage.loan_years;
 document.getElementById("zipcode").value = localStorage.loan_zipcode;
 }
};
// Pass the user's input to a server-side script which can (in theory) return
// a list of links to local lenders interested in making loans. This example
// does not actually include a working implementation of such a lender-finding
// service. But if the service existed, this function would work with it.
function getLenders(amount, apr, years, zipcode) {
 // If the browser does not support the XMLHttpRequest object, do nothing
 if (!window.XMLHttpRequest) return;
 // Find the element to display the list of lenders in
 var ad = document.getElementById("lenders");
 if (!ad) return; // Quit if no spot for output 
  
  // Encode the user's input as query parameters in a URL
 var url = "getLenders.php" + // Service url plus
 "?amt=" + encodeURIComponent(amount) + // user data in query string
 "&apr=" + encodeURIComponent(apr) +
 "&yrs=" + encodeURIComponent(years) +
 "&zip=" + encodeURIComponent(zipcode);
 // Fetch the contents of that URL using the XMLHttpRequest object
 var req = new XMLHttpRequest(); // Begin a new request
 req.open("GET", url); // An HTTP GET request for the url
 req.send(null); // Send the request with no body
 // Before returning, register an event handler function that will be called
 // at some later time when the HTTP server's response arrives. This kind of
 // asynchronous programming is very common in client-side JavaScript.
 req.onreadystatechange = function() {
 if (req.readyState == 4 && req.status == 200) {
 // If we get here, we got a complete valid HTTP response
 var response = req.responseText; // HTTP response as a string
 var lenders = JSON.parse(response); // Parse it to a JS array
 // Convert the array of lender objects to a string of HTML
 var list = "";
 for(var i = 0; i < lenders.length; i++) {
 list += "<li><a href='" + lenders[i].url + "'>" +
 lenders[i].name + "</a>";
 }
 // Display the HTML in the element from above.
 ad.innerHTML = "<ul>" + list + "</ul>";
 }
 }
}

// Chart monthly loan balance, interest and equity in an HTML <canvas> element.
// If called with no arguments then just erase any previously drawn chart.
function chart(principal, interest, monthly, payments) {
 var graph = document.getElementById("graph"); // Get the <canvas> tag
 graph.width = graph.width; // Magic to clear and reset the canvas element
 // If we're called with no arguments, or if this browser does not support
 // graphics in a <canvas> element, then just return now.
 if (arguments.length == 0 || !graph.getContext) return;
 // Get the "context" object for the <canvas> that defines the drawing API
 var g = graph.getContext("2d"); // All drawing is done with this object
 var width = graph.width, height = graph.height; // Get canvas size
 // These functions convert payment numbers and dollar amounts to pixels
 function paymentToX(n) { return n * width/payments; }
 function amountToY(a) { return height-(a * height/(monthly*payments*1.05));}
 // Payments are a straight line from (0,0) to (payments, monthly*payments)
 g.moveTo(paymentToX(0), amountToY(0)); // Start at lower left
 g.lineTo(paymentToX(payments), // Draw to upper right
 amountToY(monthly*payments));
  
  g.lineTo(paymentToX(payments), amountToY(0)); // Down to lower right
 g.closePath(); // And back to start
 g.fillStyle = "#f88"; // Light red
 g.fill(); // Fill the triangle
 g.font = "bold 12px sans-serif"; // Define a font
 g.fillText("Total Interest Payments", 20,20); // Draw text in legend
 // Cumulative equity is non-linear and trickier to chart
 var equity = 0;
 g.beginPath(); // Begin a new shape
 g.moveTo(paymentToX(0), amountToY(0)); // starting at lower-left
 for(var p = 1; p <= payments; p++) {
 // For each payment, figure out how much is interest
 var thisMonthsInterest = (principal-equity)*interest;
 equity += (monthly - thisMonthsInterest); // The rest goes to equity
 g.lineTo(paymentToX(p),amountToY(equity)); // Line to this point
 }
 g.lineTo(paymentToX(payments), amountToY(0)); // Line back to X axis
 g.closePath(); // And back to start point
 g.fillStyle = "green"; // Now use green paint
 g.fill(); // And fill area under curve
 g.fillText("Total Equity", 20,35); // Label it in green
 // Loop again, as above, but chart loan balance as a thick black line
 var bal = principal;
 g.beginPath();
 g.moveTo(paymentToX(0),amountToY(bal));
 for(var p = 1; p <= payments; p++) {
 var thisMonthsInterest = bal*interest;
 bal -= (monthly - thisMonthsInterest); // The rest goes to equity
 g.lineTo(paymentToX(p),amountToY(bal)); // Draw line to this point
 }
 g.lineWidth = 3; // Use a thick line
 g.stroke(); // Draw the balance curve
 g.fillStyle = "black"; // Switch to black text
 g.fillText("Loan Balance", 20,50); // Legend entry
 // Now make yearly tick marks and year numbers on X axis
 g.textAlign="center"; // Center text over ticks
 var y = amountToY(0); // Y coordinate of X axis
 for(var year=1; year*12 <= payments; year++) { // For each year
 var x = paymentToX(year*12); // Compute tick position
 g.fillRect(x-0.5,y-3,1,3); // Draw the tick
 if (year == 1) g.fillText("Year", x, y-5); // Label the axis
 if (year % 5 == 0 && year*12 !== payments) // Number every 5 years
 g.fillText(String(year), x, y-5);
 }
 // Mark payment amounts along the right edge
 g.textAlign = "right"; // Right-justify text
 g.textBaseline = "middle"; // Center it vertically
 var ticks = [monthly*payments, principal]; // The two points we'll mark
 var rightEdge = paymentToX(payments); // X coordinate of Y axis
 for(var i = 0; i < ticks.length; i++) { // For each of the 2 points
 var y = amountToY(ticks[i]); // Compute Y position of tick

   g.fillRect(rightEdge-3, y-0.5, 3,1); // Draw the tick mark
 g.fillText(String(ticks[i].toFixed(0)), // And label it.
 rightEdge-5, y);
 }
}
</script>