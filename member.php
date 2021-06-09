<!doctype html>
<html lang="en">
    

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title>MyChama- Premium Investment Group Financial Management Software</title>
        <meta name="description" content="MyChama is a simple web and mobile platform that automates all the activites of savings groups and investment groups. MyChama API also integrates with third party financial institutions and payment gateways to provide thus providing online realtime transactions to all users.">
    <meta name="keywords" content="MyChama">
    <meta name="title" content="MyChama - Premium Investment Group Financial Management Software">
    <link href="uploads/logos/favicon1.png" rel="shortcut icon" type="image/x-icon" />
    <link rel="apple-touch-icon" href="templates/frontend_themes/startuply/img/apple-touch-icon.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="chama/templates/frontend_themes/startuply/img/apple-touch-icon-72x72.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="templates/frontend_themes/startuply/img/apple-touch-icon-114x114.jpg">
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>
    
    <link href="templates/frontend_themes/startuply/css/bootstrap.min.css" type="text/css" media="all" rel="stylesheet" />
    <link href="templates/frontend_themes/startuply/css/font-awesome.min.css" type="text/css" media="all" rel="stylesheet" />
    <link href="templates/frontend_themes/startuply/css/font-lineicons.css" type="text/css" media="all" rel="stylesheet" />
    <link href="templates/frontend_themes/startuply/css/animate.css" type="text/css" media="all" rel="stylesheet" />
    <link href="templates/frontend_themes/startuply/css/toastr.min.css" type="text/css" media="all" rel="stylesheet" />
    <link href="templates/frontend_themes/startuply/css/style.css" type="text/css" media="all" rel="stylesheet" />
    <link href="templates/frontend_themes/startuply/css/custom.css" type="text/css" media="all" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="style.css">
  
		<script type="text/javascript">
			
		</script>
		<link rel="canonical" href="member.php" />
        <script type="text/javascript">
            window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
              heap.load("3178775544");
        </script>
    </head>
<!--     <div class="header">
    <h2>Home Page</h2>
</div> -->

<body id="landing-page">
 <!-- Preloader -->
            <div id="mask">
                <div id="loader"></div>
            </div>
            <header>
                <nav class="navigation navigation-header">
                    <div class="container">
                        <div class="navigation-brand">
                            <div class="brand-logo">
                                <a href="member.php" class="logo"></a>
                                <span class="sr-only">MyChama</span>
                            </div>
                            <button class="navigation-toggle visible-xs" type="button" data-toggle="dropdown" data-target=".navigation-navbar">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="navigation-navbar">
                            <ul class="navigation-bar navigation-bar-left">
                                <li><a href="member.php#hero">Home</a></li>
                                <li><a href="member.php#about">About Us</a></li>
                                <li><a href="member.php#features">Features</a></li>
                                <li><a href="member.php#product">Pricing</a></li>
                                <li><a href="member.php#footer">Contacts</a></li>
</ul>

                        </div>
                    </div>
                </nav>
            </header>


	
<div id="hero" class="static-header light clearfix">

    


<div class="text-heading">
<h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">Do not wait &mdash; <span class="highlight">Automate</span> your group now!</h1>
<p class="animated hiding" data-animation="fadeInDown" data-delay="500">    
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['first_name'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['first_name']; ?></strong></p>
        <p> <a href="member.php?logout='1'" class="btn btn-primary animated hiding" data-animation="bounceIn" data-delay="700">logout</a> </p>
    <?php endif ?>
</div></p>
<p class="animated hiding" data-animation="fadeInDown" data-delay="500">Focus on Investments as we handle the Financial Administration.</p>
 <ul class="list-inline">

 </ul>
</div>

    <div class="margin-top-20" style="margin-top:35px;">
        <div class="container">
            <div class="section-content row">
                <div class="col-sm-5">
                    <a href="https://play.google.com/store/apps/details?id=MyChama.app" target="_blank">
                        <img src="templates/frontend_themes/startuply/img/MyChama-app.png" class="img-responsive animated hiding" data-animation="bounceInUp" data-delay="1000" alt="MyChama-app" />
                    </a>
                </div>
                <div class="col-sm-7">
                    <div class="text-heading">
                        <h5 class="animated hiding text-left" data-animation="fadeInDown" data-delay="500"><span class="highlight">Focus on your Group Investments </span> as we handle your group financial adminstration with <span class="highlight"> MyChama</span>.</h5>
                        <p class="animated hiding text-left" data-animation="fadeInDown" data-delay="500">
                            <small>Is your group already registered on <span class="highlight"> MyChama</span>, you can now view your contributions, fines and loans using the Android App.</small>
                        </p>
                        <h5 class="animated hiding text-left" data-animation="fadeInDown" data-delay="500">Get the app</h5>
                        <a href="https://play.google.com/store/apps/details?id=MyChama.app" target="_blank">
                            <img src="templates/frontend_themes/startuply/img/google-play-MyChama-app.png" width="35%" class="img-responsive animated hiding" data-animation="bounceInUp" data-delay="1000" alt="google-play-MyChama-app" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="about" class="section dark">
    <div class="container">
    	<h2>About Us</h2>
        <ul class="nav nav-tabs alt">
            <li class="active"><a href="#first-tab-alt" data-toggle="tab">What is MyChama?</a></li>
            <li><a href="#second-tab-alt" data-toggle="tab">Who we are?</a></li>
            <li><a href="#third-tab-alt" data-toggle="tab">Why use MyChama for your Investment Group</a></li>
        </ul>       
        <div class="tab-content alt">
            <div class="tab-pane active" id="first-tab-alt">
                <div class="section-content row">        
                    <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
                        <img src="templates/frontend_themes/startuply/img/features/rich_features_3.png" class="img-responsive" alt="process 3" />
                    </div>
                    <div class="col-sm-6 animated hiding" data-animation="fadeInRight">
                        <article class="center">
                            <h3>What is <span class="highlight">MyChama?</span></h3>
                            <div class="sub-title">MyChama is a book keeping tool for Investment Groups, commonly known as Chamas in Kenya.</div>
                            <p>It automates the operations of these groups, eliminating the need for complex Excel sheets and bulky write up, there by making the work of financial book keeping within the group easier. </p>
                            <p>It acheives this in the following way: It automates member invoicing, keeps an updated statement for each member, members can login to view their financial positin within the group, reminds members to make payments, stores group data on the cloud (available 24/7 anywhere in the world) and a cash book module for use by the Treasurer. </p>
                        </article>
                    </div>
                </div>
            </div>
                
            <div class="tab-pane" id="second-tab-alt">
                <div class="section-content row">                
                    <div class="col-sm-6 pull-right animated hiding" data-animation="fadeInRight">
                        <img src="templates/frontend_themes/startuply/img/features/phone.png" class="img-responsive pull-right" alt="process 2" />
                    </div>
                    <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
                        <article class="center">
                        <h3>Who we <span class="highlight">are?</span></h3>
                        <div class="sub-title"></div>
                        <p>MyChama is a simple to use web application that enables investment groups to manage all their group activities and communications. The cloud based solution enables group administrators to easily and efficiently track all contribution accounts within the group.</p></article>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="third-tab-alt">
                <div class="section-header animated hiding center" data-animation="fadeInDown">
                    <h3>Why Choose MyChama</h3>
                    <div class="sub-heading">
                        When it comes to managing your groups finances,
                        <br />one needs to choose tools that ease the work load, are accurate and accessible.
                    </div>
                </div>
                <div class="section-content row">
                    <div class="col-sm-4">
                        <article class="text-center animated hiding" data-animation="fadeInLeft" data-delay="0">
                            <i class="howitworks icon icon-shopping-04 icon-active"></i>
                            <span class="h7">SECURE</span>
                            <p class="thin" >Financial information stored on MyChama is done securely ensuring your information is only visible to authorized users.</p>
                        </article>
                        <!--<span class="icon icon-arrows-04"></span>-->
                    </div>
                    <div class="col-sm-4">
                        <article class="text-center animated hiding" data-animation="fadeInLeft" data-delay="400">
                            <i class="howitworks icon icon-seo-icons-03 icon-active"></i>
                            <span class="h7">RELIABLE</span>
                            <p class="thin" >MyChama is available 24/7 as long as you have a reliable Internet connection, available anywhere in the world.</p>
                        </article>
                        <!--<span class="icon icon-arrows-04"></span>-->
                    </div>
                    <div class="col-sm-4">
                        <article class="text-center animated hiding" data-animation="fadeInLeft" data-delay="800">
                            <i class="howitworks icon icon-seo-icons-05 icon-active"></i>
                            <span class="h7">REPORTS</span>
                            <p class="thin" >Using MyChama, the treasurer only needs to record payments as they come and MyChama handles the reporting behalf of the treasurer.</p>
                        </article>
                    </div>
                </div>
                <br/>
                <br/>
            </div>  
        </div>
    </div>
</section>
    
<hr class="no-margin" />

<section id="process" class="section dark">
    <div class="container">
        <div class="section-content row">                
            <div class="col-sm-6 pull-right animated hiding" data-animation="fadeInRight">
                <img src="templates/frontend_themes/startuply/img/features/content_image1.png" class="img-responsive" alt="process 2" />
            </div>
            <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
                <article>
                    <h3>Managing Investment Group <span class="highlight">Payments</span></h3>
                    <div class="sub-title">
                        MyChama gracefully handles the different payments made to the Investment Group.
                    </div>
                    <p>These payments include contributions payments, penalty payments, customer payments, supplier payments, special deposits, member loan payments, bank loan payments. These payments are handled by the treasurer on the system.</p>
                    <p>
                        The platform is accessible online through desktop and mobile, hence with a reliable Internet connection one can manage the Investment Group Records with ease.
                    </p>
                </article>
            </div>
            
            <hr class="clearfix" />
            
            <div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
                <img src="templates/frontend_themes/startuply/img/features/MyChama-report.png" class="img-responsive" alt="process 3" />
            </div>
            <div class="col-sm-6 animated hiding" data-animation="fadeInRight">
                <article>
                    <h3>Investment Group<span class="highlight"> Reporting</span></h3>
                    <div class="sub-title">Simply, the platform is a book keeping and reporting tool for your Investment Group.</div>
                    <p>Made for treasurers with a tight schedule looking to manage their records in an immaculate manner, MyChama is for them, it handles repetitive tasks such a debt tracking leaving one to record payments as they come in.</p>
                    <p>Once recorded the platform aggregates the information entered to produce the following reports; member deposit reports, member statements, receipts, cash flow statement, balance sheet , profit and loss statement which are all exportable for presentation and storage purposes.</p>
                </article>
            </div>
            
        </div>
    </div>
</section>
    
<section id="features" class="section inverted">
    <div class="container">
    	<h2>Features</h2>
        <div class="section-content">
            <div id="featuredTab">
                <ul class="list-unstyled animated hiding" data-animation="fadeInRight">
                  <li class="active">
                      <a href="#home" data-toggle="tab">
                          <div class="tab-info">
                              <div class="tab-title">Available Online</div>
                              <div class="tab-desc">MyChama is available online, 24/7 with a support team to assist the Investment Group Treasure in utilizing the software.</div>
                          </div>
                          <!--<div class="tab-icon"><span class="icon icon-multimedia-20"></span></div>-->
                      </a>
                  </li>
                  <li>
                      <a href="#profile" data-toggle="tab">
                          <div class="tab-info">
                              <div class="tab-title">Easy Set Up</div>
                              <div class="tab-desc">MyChama requires only five steps to set up the platform and start using the software; Sign Up, Register Members, Add Bank Account, Setup Contribution and Back Date Group Finances</div>
                          </div>
                          <!--<div class="tab-icon"><span class="icon icon-seo-icons-27"></span></div>-->
                      </a>
                  </li>
                  <li>
                      <a href="#messages" data-toggle="tab">
                          <div class="tab-info">
                              <div class="tab-title">Available on Mobile</div>
                              <div class="tab-desc">MyChama is available on web(desktop) and on mobile hence one can access records on the go.</div>
                          </div>
                          <!-- <div class="tab-icon"><span class="icon icon-seo-icons-28"></span></div>-->
                      </a>
                  </li>
                </ul>
                
                <div class="tab-content animated hiding" data-animation="fadeInLeft">
                  <div class="tab-pane in active" id="home"><img src="templates/frontend_themes/startuply/img/features/rich_features_1.png" class="img-responsive animated hiding" data-animation="fadeInLeft" alt="macbook" /></div>
                  <div class="tab-pane" id="profile"><img src="templates/frontend_themes/startuply/img/features/rich_features_2.png" class="img-responsive animated hiding" data-animation="fadeInLeft" alt="macbook" /></div>
                  <div class="tab-pane" id="messages"><img src="templates/frontend_themes/startuply/img/features/rich_features_3.png" class="img-responsive animated hiding" data-animation="fadeInLeft" alt="macbook" /></div>
                </div>
            </div>
        </div>
    </div>
</section>
    
<section id="features-list" class="section dark">
    <div class=" animated hiding" data-animation="fadeInDown">
        <div class="container">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-seo-icons-38 icon-active"></i>
                    <span class="h7">Financial Management</span>
                    <p class="thin">MyChama acts as an online treasurer. All one does is record payments and MyChama reconciles the records.</p>
                </article>
            </div>                       
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-faces-users-04 icon-active"></i>
                    <span class="h7">Membership Management</span>
                    <p class="thin">MyChama allows one to register all members on the system where they access to their chama records online. </p>
                </article>
            </div>             
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-education-science-18 icon-active"></i>
                    <span class="h7">Bank Account Management</span>
                    <p class="thin">MyChama records withdrawals, transfers and deposits that are performed on the bank accounts. </p>
                </article>
            </div>             
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-shopping-03 icon-active"></i>
                    <span class="h7">Expense Management</span>
                    <p class="thin">MyChama allows users to track expenses as they occur, be it for land purchases or payments for services. </p>
                </article>
            </div>
        </div>
        <div class="container">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-shopping-20 icon-active"></i>
                    <span class="h7">Project Management</span>
                    <p class="thin">One can track projects e.g. Expenses regarding purchase of land, and the contributions needed to carry out the project.</p>
                </article>
            </div>             
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-seo-icons-38 icon-active"></i>
                    <span class="h7">Loan Management</span>
                    <p class="thin">For chamas that do internal lending, MyChama provides a platform for recording these loans. </p>
                </article>
            </div>             
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-seo-icons-05 icon-active"></i>
                    <span class="h7">Financial Reports</span>
                    <p class="thin">MyChama generates the following reports; Member Statements, Cashflow, Balance Sheet and Profit & Loss </p>
                </article>
            </div>             
            <div class="col-md-3 col-sm-6 col-xs-12">
                <article class="center">    
                    <i class="icon icon-faces-users-07 icon-active"></i>
                    <span class="h7">One Time Penalty Management</span>
                    <p class="thin">One can penalize members for issues such a late coming and this will be reflected on the members' statement </p>
                </article>
            </div>  
        </div>
    </div>
</section>  

<section id="newsletter" class="long-block light">
    <div class="container center">
        <div class="">
            <article>
            	&nbsp;
            </article>
        </div>    
    </div>
</section>
    
<section id="product" class="section dark">
    <div class="container">
    	<h2>Pricing</h2>
        <div class="section-header animated hiding" data-animation="fadeInDown">
            <div class="sub-heading">
                MyChama is charged on a monthly, quarterly or annual basis, depending on your preferences.
            </div>
        </div>
        <div class="section-content row">
        
            <div class="col-sm-4">
                <div class="package-column animated hiding" data-animation="flipInY">
                    <div class="package-title">Monthly</div>
                   
                    <div class="package-detail">
                        <ul class="list-unstyled">
                            <li>KES <strong>600</strong></li>
                            <li>(Upto 20 Members)</li>
                            <li>Every Member Above 20, KES <strong>30</strong></li>
                        </ul>
                        <a href="signup.php" class="btn btn-secondary btn-block">Sign Up</a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="package-column animated hiding" data-animation="flipInY" data-delay="500">
                    <div class="package-title">Annual</div>
                    <div class="package-detail">
                        <ul class="list-unstyled">
                            <li>KES <strong>5,000</strong></li>
                            <li>(Upto 20 Members)</li>
                            <li>Every Member Above 20, KES <strong>360</strong></li>
                        </ul>
                        <a href="signup.php" class="btn btn-secondary btn-block">Sign Up</a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-4">
                <div class="package-column animated hiding" data-animation="flipInY">
                    <div class="package-title">Quarterly</div>
                    <div class="package-detail">
                        <ul class="list-unstyled">
                            <li>KES <strong>1,500</strong></li>
                            <li>(Upto 20 Members)</li>
                            <li>Every Member Above 20, KES <strong>120</strong></li>
                        </ul>
                        <a href="signup.php" class="btn btn-secondary btn-block">Sign Up</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
    
<section id="" class="section dark">
    <div class="container">
        <div class="col-md-10 col-sm-10 col-xs-12" style='margin:0 auto;float:none;'>
            <div class="section-header animated hiding" data-animation="fadeInDown">
                <h2><span class="highlight">PRICE</span> CALCULATOR</h2>
                <div class="sub-heading">
                    Use the calculator below to find out your investment group's subscrption price.
                </div>
                <h2></h2>
                <form id='price_calculator' class="form" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12" >
                            <div class="form-group">
                                <label>Number of Members</label>
                                <input type="text" name="number_of_members" value=""  class="form-control" placeholder="Number of Members" id="number_of_members" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Payment Plan</label>
                                <select name="payment_plan"  class="form-control" id="payment_plan" >
<option value="1">Monthly</option>
<option value="2">Quarterly</option>
<option value="3">Annually</option>
</select>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input id='calculate_price' type="button" class="btn btn-primary" value="Calculate Price" />
                    </div>
                </form>
            </div>
            <div id='subscription_plan' class="text-left well">
                <h6>Your Subscription Pricing </h6>
                <div id='subcription_price_text'>
                    <p class="small-txt">KES <span>600</span> per <span></span> for </span></span> Members</p>
                    <i class="icon icon-alerts-02"></i>
                </div>
            </div>
            <div id='subscription_plan_warning' class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Warning Alert.</strong> Enter the number of members and payment plan, so as to calculate your subscription pricing.
                <i class="icon icon-alerts-01"></i>
            </div>
        </div>
    </div>
</section>



<section id="" class="long-block light">
    <div class="container">
        <div class="col-md-12 col-lg-9">
            <i class="icon icon-seo-icons-24 pull-left"></i>
            <article class="pull-left">
                <h2><strong>EMPOWER</strong> YOUR CHAMA NOW!</h2>
                <p class="thin">MyChama is the Leading Premium Chama Management Software in Kenya.</p>
            </article>
        </div>
        
        <div class="col-md-12 col-lg-3  ">
            <a class="btn btn-default" href="signup.php">Sign Up your Group</a>
        </div>
    </div>
</section>

    
   <footer id="footer" class="footer light">
        <div class="container">
            <div class="footer-content row">
                <div class="col-sm-4">
                    <div class="logo-wrapper">
                        <img src="templates/frontend_themes/startuply/img/logo.png" alt="Logo" />                    
                    </div>
                    <p>
                        MyChama is a simple to use web application that enables investment groups to manage all their group activities and communications. The cloud based solution enables group administrators to easily and efficiently track all contribution accounts within the group. 
                    </p>
                </div>
                <div class="col-sm-5">
                    <div class="footer-title">Our Contacts</div>
                    <ul class="list-unstyled">
                        <li>
                            <span class="icon icon-chat-messages-14"></span> 
                            <a href="mailto:info@startup.ly">info@MyChama.com</a>
                        </li>
                        <li>
                            <span class="icon icon-seo-icons-34"></span> 
                            <strong>MyChama Limited</strong><br/>
                            Ralph Bunche Road Elgon Court Block D1
                            <br/> 
                            Upperhill, Nairobi, Kenya
                            <br/>
                            P.O. BOX 104230 00101,Nairobi, Kenya
                        </li>
                        <li>
                            <span class="icon icon-seo-icons-17"></span>
                            +254 733 366 240 
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3 social-wrap">
                    <div class="footer-title">Social Networks</div>
                    <ul class="list-inline socials">
                        <li><a target='_blank' href="https://www.facebook.com/pages/MyChama/145595452300032"><span class="icon icon-socialmedia-08"></span></a></li>
                        <li><a target='_blank' href="https://twitter.com/MyChama"><span class="icon icon-socialmedia-07"></span></a></li>
                    </ul>
                                            <div class="text-left">
                            <p>
                                <strong>Get the MyChama App</strong>
                            </p>
                            <a class="text-center" href="https://play.google.com/store/apps/details?id=MyChama.app" target="_blank">
                                <img src="templates/frontend_themes/startuply/img/google-play-MyChama-app.png" width="100%" align="middle" style="margin:0 auto;" class="img-responsive animated hiding text-center" data-animation="bounceInUp" data-delay="1000" alt="google-play-MyChama-app" />
                            </a>
                        </div>
                                    </div>
                
            </div>
        </div>
        <div class="row col-md-12 text-center">
            <a href="https://heapanalytics.com/?utm_source=badge" rel="nofollow"><img style="width:108px;height:41px" src="http://heapanalytics.com/img/badgeLight.png" alt="Heap | Mobile and Web Analytics" /></a>
        </div>
        <div class="copyright">MyChama 2018. All rights reserved.</div>
    </footer>
    
    <div class="back-to-top"><i class="fa fa-angle-up fa-3x"></i></div>
    
    <!--[if lt IE 9]>
        <script type="text/javascript" src="https://MyChama.com/templates/frontend_themes/startuply/js/jquery-1.11.0.min.js?ver=1"></script>
    <![endif]-->  
    <!--[if (gte IE 9) | (!IE)]><!-->  
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery-2.1.0.min68b3.js?ver=1"></script>
    <!--<![endif]-->  
    
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery.nav.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery.appear.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery.plugin.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery.countdown.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/waypoints.min.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/waypoints-sticky.min.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/jquery.validate.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/toastr.min.js"></script>
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/headhesive.min.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>
    
    <script type="text/javascript" src="templates/frontend_themes/startuply/js/scripts.js"></script>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-78362144-1', 'auto');
ga('send', 'pageview');
    if ( $(window).width() > 480) { 
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='http://v2.zopim.com/?1e0ToYx5VIyBJ9Po8bskwdfLnzlLvXX4';z.t=+new Date;$.
        type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
    }
</script>
<script id="_agile_min_js" async type="text/javascript" src="https://MyChama.agilecrm.com/stats/min/agile-min.js"> </script>
<script type="text/javascript" >
var Agile_API = Agile_API || {}; Agile_API.on_after_load = function(){
_agile.set_account('v0q2tdqhl9msuh6c6kou2g375j', 'MyChama');
_agile.track_page_view();
_agile_execute_web_rules();};
</script>
</body>

<!-- Mirrored from MyChama.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Jul 2018 07:59:54 GMT -->
</html>