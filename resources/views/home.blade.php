@extends('layout')
@section('header')
    @parent
    @section('head')
        <script src="{{ url('js/uploadproduct.js') }}" defer></script>
        <script src="{{ url('js/hw1.js') }}" defer></script>
        <script> const userId = "{{ Session::get('user_id') }}"; </script>
       <title>Click Atenea</title>
    @endsection
@endsection

@section('contents')
    <div class="content">
        <section class="secPrincipale">
            <div class="container">
                <div id="carousel" class="standard">
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <a href="{{ url('home') }}">
                                <img class="sizeCarousel" src="{{ url('https://images.unsplash.com/photo-1588515603140-81bd9f7d1db0?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}">
                                <figcaption class="caption">
                                    <h2 class="img1-carousel">SOSTITUZIONE BATTERIA</h2>
                                    <div class="caption-description"></div>
                                </figcaption>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ url('home') }}">
                                <img class="sizeCarousel" src="{{ url('https://images.unsplash.com/photo-1566728595333-75a1d7cae961?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}">
                                <figcaption class="caption">
                                    <h2 class="img2-carousel">IPHONE 7</h2>
                                    <div class="caption-description"></div>
                                </figcaption>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ url('home') }}">
                                <img class="sizeCarousel" src="{{ url('https://images.unsplash.com/photo-1607976973585-a6c285b90ef5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}">
                                <figcaption class="caption">
                                    <h2 class="img3-carousel">RIPARAZIONE IPHONE 8</h2>
                                    <div class="caption-description"></div>
                                </figcaption>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ url('home') }}">
                                <img class="sizeCarousel" src="{{ url('https://images.unsplash.com/photo-1588515603068-adb330f26e92?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}">
                                <figcaption class="caption">
                                    <h2 class="img4-carousel">ATTREZZI ALL'AVANGUARDIA</h2>
                                    <div class="caption-description"></div>
                                </figcaption>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="{{ url('home') }}">
                                <img class="sizeCarousel" src="{{ url('https://images.unsplash.com/photo-1611396000732-f8c9a933424f?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}">
                                <figcaption class="caption">
                                    <h2 class="img5-carousel">BATTERIA IPHONE XS</h2>
                                    <div class="caption-description"></div>
                                </figcaption>
                            </a>
                        </div>
                    </div>
                    <button class="prev-btn"><a>&lt;</a></button>
                    <button class="next-btn"><a>&gt;</a></button>
                </div>
                <section class="secProduct">
                    <h1>PRODOTTI POPOLARI</h1>
                    @if($superadmin)
                        <div id="addproduct">
                            <a href="{{ url('addproduct') }}">Aggiungi un prodotto</a>
                        </div>
                    @endif

                    <div id="product-list" class="products">  </div>

                    <div class="allproductlink">
                        <a href="{{ url('allproducts') }}">Tutti i prodotti></a>
                    </div>
                </section>
                <div id="imgfinale">
                    <a href="{{ url('allproducts') }}">
                        <img src="{{ url('https://www.riparazione-smartphone.com/media/37/664ca80208a2874183e0a2aa3bdb747b537455d4.png') }}">
                    </a>
                </div>
                <div id="custom-text">
                    <h3>CLICK ATENEA</h3>
                    <p>Il tuo negozio di elettronica di fiducia</p>
                </div>
                <div id="map">
                    <gmp-map center="37.311920166015625,13.57970905303955" zoom="14" map-id="DEMO_MAP_ID">
                        <gmp-advanced-marker position="37.311920166015625,13.57970905303955" title="My location"></gmp-advanced-marker>
                    </gmp-map>
                </div>
                <div class="partnerSpotify">
                    <h3>Partnership con Spotify</h3>
                    <p>Siamo orgogliosi di annunciare la partnership con Spotify. Ora puoi ascoltare la tua musica preferita ovunque tu sia, grazie ai nostri prodotti.</p>
                    <section id="spotify">
                        <p>Ecco alcuni album che puoi ascoltare nel mentre ripariamo il tuo dispositivo:</p>
                        <div id="apiToken">
                            <p>Inserisci il nome di un album</p>
                            <input type='text' id='search-text'>
                            <button id="search-btn">Invia</button>
                        </div>
                        <section id="album-view"></section>
                    </section>
                </div>
                <div class="news">
                    <section id="notizie">
                        <h3>Ultime notizie</h3>
                        <div id="news-container">
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
