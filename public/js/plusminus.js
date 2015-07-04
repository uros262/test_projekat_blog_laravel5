$(document).ready(function() {

    $('input[value=Plus]').click(function(event){
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
