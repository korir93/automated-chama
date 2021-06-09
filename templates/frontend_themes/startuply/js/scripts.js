/*
*
* Custom js snippets for Startuply v1.1
* by Vivaco 
*
*/
(function(){
	"use strict";
	// Init global DOM elements, functions and arrays
    window.app 			         = {el : {}, fn : {}};
	app.el['window']         = $(window);
	app.el['document']       = $(document);
    app.el['loader']         = $('#loader');
    app.el['mask']           = $('#mask');
	
	app.fn.screenSize = function() {
		var size, width = app.el['window'].width();
		if(width < 320) size = "Not supported";
		else if(width < 480) size = "Mobile portrait";
		else if(width < 768) size = "Mobile landscape";
		else if(width < 960) size = "Tablet";
		else size = "Desktop";
		// $('#screen').html( size + ' - ' + width );
		// console.log( size, width );
	};	
	
    //Preloader
    app.el['loader'].delay(700).fadeOut();
    app.el['mask'].delay(1200).fadeOut("slow");    
      
		// Resized based on screen size
		app.el['window'].resize(function() {
			app.fn.screenSize();
		});		
      
	//Flexislider for testimonials
	if($('.testimonials-slider').length != 0) {
		$('.testimonials-slider').flexslider({
			manualControls: '.flex-manual .switch',
			nextText: "",
			prevText: "",
			startAt: 1,
			slideshow: false,
			direction: "horizontal",
			animation: "slide"
		});
	};
    
    // Headhesive init
    var options = {  // set options
            offset: 290,
            classes: {
                clone:   'fixmenu-clone',
                stick:   'fixmenu-stick',
                unstick: 'fixmenu-unstick'
            }
        };
	
	if($('#registration').length == 0) {
		var fixmenu = new Headhesive('.navigation-header', options); // init
	}
	
    // Navigation Scroll
    /**
        $('.navigation-bar').onePageNav({
            currentClass: 'active',
            changeHash: false,
            scrollSpeed: 750,
            scrollThreshold: 0.5,
            easing: 'swing'
        });
    **/
    
    // Animated Appear Element
	if (app.el['window'].width() > 1024){
		
		$('.animated').appear(function() {
		  var element = $(this);
		  var animation = element.data('animation');
		  var animationDelay = element.data('delay');
		  if(animationDelay) {
			  setTimeout(function(){
				  element.addClass( animation + " visible" );
				  element.removeClass('hiding');
			  }, animationDelay);
		  } else {
			  element.addClass( animation + " visible" );
			  element.removeClass('hiding');
		  }               

		}, {accY: -150});
    
	} else {
	
		$('.animated').css('opacity', 1);
		
	}
	
    // fade in .back-to-top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0,
            easing: 'swing'
        }, 750);
        return false;
    });   

    // count down timer
    var futureDate = new Date();
    // count down 10 days from today
    futureDate.setDate( futureDate.getDate() + 10 );    
    // or set specific date in the future
    // futureDate = new Date(2014, 7, 26);
    $('.countdown').countdown({
        until       : futureDate, 
        compact     : true, 
        padZeroes   : true,
        layout      : $('.countdown').html()
    });

	$("#calculate_price").on('click',function(){
	  	var number_of_members = $('#number_of_members').val();
	  	var payment_plan = $('#payment_plan').val();
	  	$.post('billing/price_calculator',
        {'number_of_members': number_of_members, 'payment_plan': payment_plan, },
            function(data){
            	var pricing = $.parseJSON(data);
            	if(payment_plan=='1'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
            		$('#subscription_plan').slideDown().focus();
            		$('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.monthly_amount)+parseFloat(pricing.monthly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
            		$('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Month(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
            	}else if(payment_plan=='2'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
            		$('#subscription_plan').slideDown().focus();
            		$('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.quarterly_amount)+parseFloat(pricing.quarterly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
            		$('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Quarter(VAT Inclusive) <span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
            	}else if(payment_plan=='3'&&number_of_members>0){	
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
            		$('#subscription_plan').slideDown().focus();
            		$('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.annual_amount)+parseFloat(pricing.annual_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
            		$('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Annum(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
            	}else{
            		$('#subscription_plan').slideUp();
            		$('#subscription_plan_warning').slideDown();	
            	}
        });
	});

    $('#price_calculator').submit(function(e){
        var number_of_members = $('#number_of_members').val();
        var payment_plan = $('#payment_plan').val();
        $.post('billing/price_calculator',
        {'number_of_members': number_of_members, 'payment_plan': payment_plan, },
            function(data){
                var pricing = $.parseJSON(data);
                if(payment_plan=='1'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.monthly_amount)+parseFloat(pricing.monthly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Month(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else if(payment_plan=='2'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.quarterly_amount)+parseFloat(pricing.quarterly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Quarter(VAT Inclusive) <span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else if(payment_plan=='3'&&number_of_members>0){   
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.annual_amount)+parseFloat(pricing.annual_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Annum(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else{
                    $('#subscription_plan').slideUp();
                    $('#subscription_plan_warning').slideDown();    
                }
        });
        e.preventDefault();
    });

    $('#number_of_members').on('keydown keyup',function(){
        var number_of_members = $(this).val();
        var payment_plan = $('#payment_plan').val();
        $.post('billing/price_calculator',
        {'number_of_members': number_of_members, 'payment_plan': payment_plan, },
            function(data){
                var pricing = $.parseJSON(data);
                if(payment_plan=='1'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.monthly_amount)+parseFloat(pricing.monthly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Month(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else if(payment_plan=='2'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.quarterly_amount)+parseFloat(pricing.quarterly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Quarter(VAT Inclusive) <span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else if(payment_plan=='3'&&number_of_members>0){   
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.annual_amount)+parseFloat(pricing.annual_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Annum(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else{
                    $('#subscription_plan').slideUp();
                    $('#subscription_plan_warning').slideDown();    
                }
        });
    });

    $('#payment_plan').on('change',function(){
        var number_of_members = $('#number_of_members').val();
        var payment_plan = $(this).val();
        $.post('billing/price_calculator',
        {'number_of_members': number_of_members, 'payment_plan': payment_plan, },
            function(data){
                var pricing = $.parseJSON(data);
                if(payment_plan=='1'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.monthly_amount)+parseFloat(pricing.monthly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Month(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else if(payment_plan=='2'&&number_of_members>0){
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.quarterly_amount)+parseFloat(pricing.quarterly_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Quarter(VAT Inclusive) <span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else if(payment_plan=='3'&&number_of_members>0){   
                    number_of_members = total_amount = numeral(number_of_members).format('0,0');
                    $('#subscription_plan').slideDown().focus();
                    $('#subscription_plan_warning').slideUp();
                    var total_amount = parseFloat(pricing.annual_amount)+parseFloat(pricing.annual_tax);
                    total_amount = numeral(total_amount).format('0,0.00');
                    $('#subcription_price_text').html('<p class="small-txt"><span>'+total_amount+'</span> per Annum(VAT Inclusive)<span></span> for </span><span>'+number_of_members+'</span> Members</p><i class="icon icon-alerts-02"></i>');
                }else{
                    $('#subscription_plan').slideUp();
                    $('#subscription_plan_warning').slideDown();    
                }
        });
    });

})();