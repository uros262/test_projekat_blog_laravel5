function clearUserForm() {

    $('#username').val('');
    $('#email').val('');
    $('#password').val('');
    $('#name').val('');
}
function saveUser( token )
{
    var email = $('#email').val();
    var password = $('#password').val();
    var name = $('#name').val();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(
        {
            url: 'admin/create',
            type: 'POST',
            data: "email=" + email + "&_token=" + token + "&password=" + password + "&name=" + name,
            success: function (data) {
                $('#user_table').append(data);
                alert('Uspjesno ste dodali korisnika.');
            },
            error: function (data) {
                alert('Greska');
            }
        });
}



function deleteUser(id, token){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax(
        {
            url: 'admin/delete',
            type: 'DELETE',
            data: "id=" + id + "&_token=" + token,
            success: function (data) {
                $('#user' + id).remove();
                alert('Uspjesno ste obrisali korisnika.');
            },
            error: function (data) {
                alert('Greska');
            }
        });
}