var FormInputMask = function () {
    
    var handleInputMasks = function () {
        
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Mobile|mobile|CriOS/i.test(navigator.userAgent) ) {
            // some code..
        }else{

            $(".currency").inputmask('decimal', {
                radixPoint:".", 
                groupSeparator: ",", 
                digits: 2,
                autoGroup: true,
                greedy: false,
                prefix: '',
                rightAlign: false
            }).attr('autocomplete','off');

            $(".number").inputmask('decimal', {
                radixPoint:".", 
                groupSeparator: "", 
                digits: 2,
                autoGroup: true,
                greedy: false,
                prefix: '',
                rightAlign: false
            }).attr('autocomplete','off');

        }

    }

    return {
        //main function to initiate the module
        init: function () {
            handleInputMasks();
        }
    };

}();

if (App.isAngularJsApp() === false) { 
    jQuery(document).ready(function() {
        FormInputMask.init(); // init metronic core componets
    });
}