@extends('app')

@section('sadrzaj')

    <h1 class="title">{{$ime}} {{$prezime}}</h1>

    @if(count($ljudi))
        <h2>Ljudi:</h2>

        <ul>
            @foreach($ljudi as $osoba)
                <li>{{ $osoba }}</li>
            @endforeach
        </ul>
    @endif

@stop