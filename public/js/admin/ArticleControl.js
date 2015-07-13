function deleteArticle(id, token){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(
    {
        url: 'clanak/' + id,
        type: 'DELETE',
        data: "id=" + id + "&_token=" + token,
        success: function (data) {
            $('#clanak' + id).remove();
            alert('Uspjesno ste obrisali clanak.');
        },
        error: function (data) {
            alert('Greska');
        }
    });
}
function deleteComment(id, token){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(
        {
            url: '/komentar/' + id,
            type: 'DELETE',
            data: "id=" + id + "&_token=" + token,
            success: function (data) {
                $('#komentar' + id).remove();
                alert('Uspjesno ste obrisali komentar.');
            },
            error: function (data) {
                alert('Greska');
            }
        });
}