$(function() {

    'use strict';

    // Switch Between Login & Signup

        $('.login-page h1 span').click(function() {
            $(this).addClass('selected').siblings().removeClass('selected');
            $('.login-page form').hide();
            $("."+$(this).data('class')).fadeIn(100);
        });
    // Trigger The Selectbox
    // Calls the selectBoxIt method on your HTML select box and uses the default theme
      $("select").selectBoxIt( {
          
        autoWidth: false
      });
    
    // Hide Placeholder On Form Focus
    $('[placeholder]').focus(function() {
        $(this).attr('data-text',$(this).attr('placeholder'));
        $(this).attr('placeholder','');
    }).blur(function() {
    $(this).attr('placeholder',$(this).attr('data-text'));
    });
    
    
    // Add Asterisk On Required Field
    $('input').each(function() {
        if($(this).attr('required')=== 'required') {
            $(this).after("<span class='asterisk'>*</span>")
        }
    });
    
    
    // Confirmation Message On Button
    $(".confrim").click(function() {
    return confirm('Are You Sure?');
    });
    
    $(".live-name").keyup(function() {
      $(".live-preview .caption h3").text($(this).val());
    });    
    
    
        
    });