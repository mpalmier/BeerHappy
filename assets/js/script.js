$(document).ready(function(){
    $('#product-card').hover(function(){
        $(this).addClass('animate');
    }, function(){
        $(this).removeClass('animate');
    });
});