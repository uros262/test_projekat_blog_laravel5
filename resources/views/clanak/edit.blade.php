@extends('app')
@section('sadrzaj')

    <h1>Edit: {!! $clanak->title !!}</h1>

    {!! Form::model($clanak,['method' => 'PATCH', 'action' => ['KontrolerClanaka@update', $clanak->id]]) !!}
        @include('clanak._form',['TekstNaDugmetu' => 'Izmjeni clanak'])
    {!! Form::close() !!}

    @include('errors.list')

@stop