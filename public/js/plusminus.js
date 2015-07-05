$(document).ready(function() {

    $('input[value=Plus], input[value=Minus]').removeAttr('disabled');

    $('input[value=Plus]').on('click',function(event){
        $(this).attr('disabled','disabled');
        $(this).parent().next().next().children('input[value=Minus]').attr('disabled','disabled');

        event.preventDefault();

        var id = $(this).prev().val();
        var token = $(this).prev().prev().val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(
            {
                url: '/plus',
                type: 'POST',
                data: "podatak=" + id + "&_token=" + token,
                success: function (data) {
                    $('.plus'+id).text(data);
                },
                error: function () {
                    alert("greska.");
                }
            });
    });

    $('input[value=Minus]').click(function(event){
        $(this).attr('disabled','disabled');
        $(this).parent().prev().prev().children('input[value=Plus]').attr('disabled','disabled');

        event.preventDefault();

        var id = $(this).prev().val();
        var token = $(this).prev().prev().val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(
            {
                url: '/minus',
                type: 'POST',
                data: "podatak=" + id + "&_token=" + token,
                success: function (data) {
                    $('.minus'+id).text(data);
                },
                error: function () {
                    alert("greska.");
                }
            });
    });
});
