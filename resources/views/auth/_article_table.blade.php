@foreach($articles as $article)
    <tr id="clanak{{$article->id}}">
        <td>{{$article->id}}</td>
        <td><a href="admin/{{$article->id}}">{{$article->title}}</a></td>
        <td>{{$article->user_id}}</td>
        <td>{{$article->published_at}}</td>
        <td>
            <a href="clanak/{{$article->id}}/edit">
                <i class="fa fa-edit"></i>
            </a>
            <a onclick="deleteArticle('{{$article->id}}', '{{ csrf_token() }}')" href="#Article List">
                <i class="glyphicon glyphicon-remove"></i>
            </a>
        </td>
    </tr>
@endforeach