@extends('app')
@section('sadrzaj')

    <h1>Napisi novi clanak</h1>
    <hr/>

    {!! Form::open(['url' => 'clanak']) !!}
        @include('clanak._form',['TekstNaDugmetu' => 'Dodaj clanak'])
    {!! Form::close() !!}

    @include('errors.list')

@stop