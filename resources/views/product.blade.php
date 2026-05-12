@extends('layout')
@section('header')
    @parent
    @section('head')  
        <script> 
            const productId= "{{ $product->id }}";
        </script>
        <title>Dettagli Prodotto</title>        
        <script src="{{ url('js/productdetails.js') }}" defer></script>
        <link rel="stylesheet" href="{{ url('css/productdetails.css') }}">
    @endsection
@endsection
@section('contents')
    <div class="content">        
        <section class="secproduct">            
            <div class="product-details">
                @if($product)
                    <div class="product-image">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-description">
                        <h1>{{ $product->name }}</h1>
                        <div class="price"> 
                            <strong><span>{{ $product->price }}€</span></strong>
                        </div>
                        <div class="description">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="add-to-cart">
                            <button id="add-to-cart-btn">Aggiungi al carrello</button>
                        </div>
                    </div>
                @else                
                    <h1>Prodotto non trovato</h1>
                @endif
            </div>   
        </section>
    </div>
@endsection