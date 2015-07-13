$(document).ready(function() {

    $("textarea[name=tekst]").keyup(function(){
        var tekst = $(this).val();
        var broj = tekst.length;
        $(this).prev().text(broj+'/1500');
        if(broj > 1500){
            $(this).prev().css('color','red');
        }else{
            $(this).prev().css('color','black');
        }
    });

});