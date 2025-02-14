
@extends('layouts.default')

@section('content')
    @if (array_values($user)[1]<18)
        {{-- <script>alert('Извините, Ваш возраст должен быть больше 18')</script> --}}
        <h1>Извините, Ваш возраст должен быть больше 18</h1>
     @else 
        <h1>Hello, {{array_values($user)[0]}}</h1>
    
        
    @endif
    
@stop