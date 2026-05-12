@extends('layout')

@section('header')
    @parent
    @section('head')
        <script src="{{ url('js/uploadallproduct.js') }}" defer></script>
        <title>Tutti i Prodotti</title>
    @endsection
@endsection

@section('contents')
<div class="content">
        <section class="secPrincipale">
            <div class="container"> 
                <section class="secAllProducts">
                    <h1>Tutti i Prodotti</h1>
                    <div id="all-product-list" class="products">
                    </div>
                </section>
            </div>
        </section>
</div>
@endsection
