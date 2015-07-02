@extends('app')
@section('sadrzaj')

    <h1>Clanci</h1>

    @foreach($clanci as $clanak)
        <h2>
            <a href="/clanak/{{$clanak->id}}">{{ $clanak->title }}</a>
        </h2>
        <p class="vrijeme">{{$clanak->published_at}}</p>
        <p class="sadrzaj">{{$clanak->body}}</p>
    @endforeach

@stop