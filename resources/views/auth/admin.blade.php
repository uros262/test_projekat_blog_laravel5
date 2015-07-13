@extends('app')

@section('linkovi')
    @include('auth._linkovi')
@stop

@section('sadrzaj')

    @yield('tabele')

@stop
