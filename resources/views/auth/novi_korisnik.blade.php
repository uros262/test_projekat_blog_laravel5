<tr id="user{{$user->id}}">
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    <td>
        <a onclick="deleteUser('{{$user->id}}','{{ csrf_token() }}')" href="#">
            <i class="glyphicon glyphicon-remove"></i>
        </a>
    </td>
</tr>