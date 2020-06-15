@extends('layouts.app')


@section('content')

    <ol>
        @foreach($data as $d)
            <li>{{$d}}</li>
        @endforeach
    </ol>




@endsection('content')
