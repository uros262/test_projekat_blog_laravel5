@foreach($users as $user)
    <tr id="user{{$user->id}}">
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at}}</td>
        <td>
            @if($user->id != 1)
                <a onclick="deleteUser('{{$user->id}}','{{ csrf_token() }}')" href="#">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            @endif
        </td>
    </tr>
@endforeach