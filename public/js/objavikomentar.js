$(document).ready(function() {

    $('input[value=Prokomentarisi]').on('click',function(event){
        event.preventDefault();

        var id = $(this).prev().val();
        var token = $(this).parent().prev().prev().prev().prev().prev().val();

        var name = $(this).parent().prev().prev().prev().children('input[name=name]').val();
        var body = $(this).parent().prev().prev().children('textarea[name=tekst]').val();
        var parent_id = $(this).parent().prev().prev().children('input[name=parent_id]').val();
        var level = $(this).parent().prev().prev().children('input[name=level]').val();
        var anti = $(this).parent().prev().children('select[name=anti]').val();
        var rezultat = $(this).parent().prev().children('input[name=rezultat]').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax(
            {
                url: '/komentar',
                type: 'POST',
                data: "id=" + id + "&parent_id=" + parent_id + "&level=" + level + "&name=" + name + "&_token=" + token + "&body=" + body + "&anti=" + anti + "&rezultat=" + rezultat,
                success: function (data) {
                    if(parent_id == 0)
                    {
                        $('.container').append(data);
                    }else{
                        $('#kom_' + parent_id).after(data);
                    }
                    alert('Uspjesno ste objavili komentar.');
                },
                error: function (data) {

                    //if(typeof data =='object')
                    //{
                    //    var errors = $.parseJSON(data.responseText);
                    //
                    //    console.log(errors);
                    //
                    //    $.each(errors, function(index, value) {
                    //        alert(value);
                    //    });
                    //}else{
                    //    alert("Anti Bot field is required");
                    //}
                    alert('Greska');
                }
            });
    });
});