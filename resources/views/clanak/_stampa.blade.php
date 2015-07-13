<?php
$a = array();
$a = stampa($komentari,$a);

    function stampa($komentari,$a)
    {
        if($komentari)
        {
            foreach($komentari as $komentar)
            {

                array_push($a,$komentar);
                $sledeci = App\Comment::where('parent_id','=',$komentar->id)->where('article_id','=',$komentar->article_id)->get();
                $a = stampa($sledeci,$a);
            }
        }
        return $a;
    }
?>

@foreach($a as $komentar)
    <?php $poravnaj = $komentar->level * 50;?>
    <div id="kom_{{$komentar->id}}" style="margin-left: {{ $poravnaj }}px;background-color: gainsboro;border:1px solid darkgrey; margin-bottom: 10px;max-width: 600px; padding: 10px;">
        <h2 style="display: inline;">{{$komentar->name}}</h2>
        <button class="prijavi" style="float: right;" onclick="flag('{{$komentar->id}}', '{{ csrf_token() }}'); $(this).attr('disabled','disabled');">Prijavi</button>
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

        <button class="odg" onclick="acc('{{$komentar->id}}')" style="margin-left: 200px;">Odgovori</button>
        @include('clanak._kom',['clanak_id' => $clanak->id, 'id' => $komentar->id])
    </div>
@endforeach