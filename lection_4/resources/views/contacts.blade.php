@extends('layouts.default')

@section('content')
    @if (array_values($userInfo)[2]=== '')
        {{-- <script>alert('Извините, Ваш возраст должен быть больше 18')</script> --}}
        <h1>Извините, поле с почтой не может быть пустым</h1>
     @else 
        <h1>all right</h1>
    
        
    @endif
    
@stop