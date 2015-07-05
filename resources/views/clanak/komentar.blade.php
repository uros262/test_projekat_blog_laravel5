@extends('app')
@section('izmjena')
    @if (Auth::id() == $clanak->user_id)
        <li><a href="/clanak/{{ $clanak->id }}/edit">Izmjeni ovaj clanak</a></li>
    @endif
@stop
@section('sadrzaj')

    <h2>{{ $clanak->title }}</h2>

    <p class="vrijeme">{{$clanak->published_at}}</p><br/>
    <hr/>
    @include('errors.list')
    {!! Form::open(['url' => ['komentar', $clanak->id],'style' => 'max-width: 600px; margin: 50px 0px; border: 1px solid darkgrey; padding: 20px; border-radius: 20px']) !!}
    <h2>Ostavite komentar:</h2>
    <div class="form-group">
        {!! Form::label('name','Ime: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Komentar: ') !!}
        <span style="float: right;">0/1500</span>
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        {!! Form::hidden('parent_id','0') !!}
        {!! Form::hidden('level','-1') !!}
    </div>

    <div class="form-group">
        {!! Form::label('anti','AntiBot pitanje: ') !!}
        <span>{{$sabirak1}} + {{$sabirak2}}</span>
        {!! Form::select('anti', ['null' => '','jedan' => 'jedan', 'dva' => 'dva', 'tri' => 'tri', 'cetiri' => 'cetiri', 'pet' => 'pet', 'sest' => 'sest', 'sedam' => 'sedam', 'osam' => 'osam', 'devet' => 'devet', 'deset' => 'deset'], ['class' => 'form-control']); !!}
        {!! Form::hidden('rezultat',$rezultat) !!}?
    </div>

    <div class="form-group">
        {!! Form::hidden('id', $clanak->id) !!}
        {!! Form::submit('Prokomentarisi', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    <hr/>
    @include('clanak._stampa')

@stop