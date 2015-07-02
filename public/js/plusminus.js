$(document).ready(function() {

    $('input[value=Plus]').click(function(event){
        event.preventDefault();
        var id = $(this).prev().val();
        $.ajax(
            {
                url: 'plus',
                data: {podatak: id},
                success: function (data) {
                    alert('vratio: ' + data);
                    $(this).parent().prev().val(data);
                },
                error: function () {
                    alert("greska.");
                }
            });
    });
    $('input[value=Minus]').click(function(event){
        event.preventDefault();
        var id = $(this).prev().val();
        $.ajax(
            {
                url: 'minus',
                data: {podatak: id},
                success: function (data) {
                    alert('vratio: ' + data);
                    $(this).parent().prev().val(data);
                },
                error: function () {
                    alert("greska.");
                }
            });
    });
});
