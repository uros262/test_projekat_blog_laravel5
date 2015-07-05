$(document).ready(function() {

    $(".kom").css("display","none");
    $(".odg").click(function(){
        $(this).next().slideToggle("fast");
    });
});

