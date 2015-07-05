<?php $poravnaj = $komentar->level * 50;?>
<div style="margin-left: {{ $poravnaj }}px;background-color: gainsboro;border:1px solid darkgrey; margin-bottom: 10px;max-width: 600px; padding: 0px 10px 10px;">
    <h2>{{$komentar->name}}</h2>
    <p class="vrijeme">{{$komentar->created_at}}</p>
    <p class="sadrzaj">{{$komentar->body}}</p>
    <hr/>
    <span style="color:darkslategrey;">Preporuka: </span>
    <span style="display:none;">{{$komentar->id}}</span>

    <span class="plus{{$komentar->id}}"style="color:green;">{{$komentar->plus}}</span>
    <!--{!! Form::open(['onclick' => 'plusminus()','style' => 'display: inline;']) !!}-->
    <form style='display: inline;'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! Form::hidden('id',$komentar->id) !!}
        {!! Form::submit('Plus') !!}
    {!! Form::close() !!}

    <span class="minus{{$komentar->id}}"style="color:red;">{{$komentar->minus}}</span>
    <form style='display: inline;'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! Form::hidden('id',$komentar->id) !!}
        {!! Form::submit('Minus') !!}
    {!! Form::close() !!}

    <button class="odg" style="margin-left: 200px;">Odgovori</button>
    @include('clanak._kom',['clanak_id' => $clanak])
</div>