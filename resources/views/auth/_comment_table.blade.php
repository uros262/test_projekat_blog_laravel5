@foreach($komentari as $komentar)
    <tr id="komentar{{$komentar->id}}">
        <td>{{$komentar->id}}</td>
        <td><a href="/komentar/{{$clanak->id}}">{{$komentar->name}}</a></td>
        <td>{{$komentar->body}}</td>
        <td>{{$komentar->plus}}</td>
        <td>{{$komentar->minus}}</td>
        <td style="color: @if($komentar->flag == 0) green @else red @endif;">{{$komentar->flag}}</td>
        <td>{{$komentar->created_at}}</td>
        <td>
            <a onclick="deleteComment('{{$komentar->id}}', '{{ csrf_token() }}')" href="#Comment List">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </td>
    </tr>
@endforeach