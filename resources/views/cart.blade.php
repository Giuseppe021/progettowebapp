@extends('layout')
@section('header')
    @parent
    @section('head')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <script> 
        const BASE_URL = "{{ url('/') }}/";
    </script>
    <link rel="stylesheet" href="{{url('css/cart.css')}}">
    <script src="{{ url('js/viewcart.js')}}" defer></script>
    @endsection
@endsection
@section('contents')    
    <div class="content">
        <h1>Il tuo carrello</h1>
            
        <div id="cart-content" class="cart-items">
                         
        </div>
    </div>

@endsection
