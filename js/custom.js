/* Global $, alert, console*/

$(function () { 
    'use strict';
    
    var userError  = true, // Setting Error Status
        emailError = true,
        msgError   = true;
    
    
    // Username
    $('.username').blur(function(){
        
        if ($(this).val().length < 4 ){ // Show Error
            
            $(this).css('border','1px solid #F00').parent().find('.custom-alert').fadeIn(250)
                .end().find('.asterisx').fadeIn(100);
            
            userError = true;
            
        } else { // No Errors
            
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(250)
                .end().find('.asterisx').fadeOut(100);
            
            userError = false;
        }         
    });
    
    // Email
    $('.email').blur(function(){ 
        
        if ($(this).val() === ''){
            
            $(this).css('border','1px solid #F00').parent().find('.custom-alert').fadeIn(250)
                .end().find('.asterisx').fadeIn(100);

            emailError = true;
            
        } else {
            
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(250)
                .end().find('.asterisx').fadeOut(100);
            
            emailError = false;
        }        
    });
    
    // Message
    $('.message').blur(function(){ 
        
        if ($(this).val().length < 11){

            $(this).css('border','1px solid #F00').parent().find('.custom-alert').fadeIn(250)
                .end().find('.asterisx').fadeIn(100);

            msgError = true;
            
        } else {
            
            $(this).css('border','1px solid #080').parent().find('.custom-alert').fadeOut(250)
                .end().find('.asterisx').fadeOut(100);
            
            msgError = false;
        }
    });
    
    // Submit Form Valdation
    $('.contact-form').submit(function (e) {
    
        if (userError === true || emailError === true || msgError === true ){
            e.preventDefault();
            $('.username, .email, .message').blur();
        }
    });
});
