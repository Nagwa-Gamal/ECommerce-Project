/*global $, alert, console*/

$(function (){
    'use strict';
    //links add active class
    $('.nav .contanier li').click(function() {
    
        $(this).addClass('active').siblings().removeClass('active');
    });
    
    });