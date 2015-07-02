@extends('app')
@section('izmjena')
    @if (Auth::id() == $clanak->user_id)
        <li><a href="/clanak/{{ $clanak->id }}/edit">Izmjeni ovaj clanak</a></li>
    @endif
@stop
@section('sadrzaj')

    <h1>{{ $clanak->title }}</h1>
    <p class="vrijeme">{{$clanak->published_at}}</p><br/>

    <blockquote>
        <p>{{$clanak->body}}</p>
        <footer>Autor: <cite title="{{$clanak->user->name}}">{{$clanak->user->name}}</cite></footer>
    </blockquote>
    <hr/>
    <a style="display: inline;" class ='btn btn-primary form-control' href="{{url('komentar/'.$clanak->id)}}">Ostavi komentar</a>
    <?php $i = 1; ?>
    <h2>Poslednji komentari:</h2>
    <hr/>
    @foreach($komentari as $komentar)
        <div style="border:1px solid black; margin-bottom: 10px;max-width: 600px; padding: 0px 10px 10px;">
            <h3>{{$komentar->name}}</h3>
            <p>{{$komentar->created_at}}</p>
            <p>{{$komentar->body}}</p>
        </div>

        @if($i == 5)
            <?php break; ?>
        @else
            <?php $i = $i + 1; ?>
        @endif
    @endforeach
    <a style="display: inline;"class ='btn btn-primary form-control' href="{{url('komentar/'.$clanak->id)}}">Prikazi sve komentare</a>
@stop