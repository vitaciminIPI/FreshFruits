@extends('main.main')

@section('container')
    <div class="container mt-4">
        <h1>Halaman Home</h1>
        <h3> {{ $nama }} </h3>
        <h3> {{ $email }} </h3>
        <img src="img/{{ $img }}" alt="{{ $nama }}" width="200px">
    </div>
@endsection