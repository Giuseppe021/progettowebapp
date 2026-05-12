<!DOCTYPE html>
<html lang="it">
    <header> 
    <link rel="stylesheet" href="{{ url('css/hw1.css') }}">
    <link rel="stylesheet" href="{{ url('css/header.css') }}">    
    <link rel="stylesheet" href="{{ url('css/footer.css') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script> 
        const BASE_URL = "{{ url('/') }}/";
    </script>

    <nav>
        <div class="container">
            <div id="links1" class="elementNav elementNav1">
                <div class="spaceElementNav1">
                    <span>Chiamaci: 0922 25873</span>    
                </div>
                <div class="nav-user-info">
                    <div class="profile">
                        <a href="{{ url('profile') }}">
                            <i class='material-icons'>&#xe7fd;</i>
                            <span>Il mio profilo</span>
                        </a>
                    </div>
                    @if(!Session::get('user_id'))
                        <div class="login-container">
                            <div class="login-content">
                                <a href="{{ url('login') }}">
                                    <span>Accedi</span>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="login-container">
                            <div class="login-content">
                                <a href="{{ url('logout') }}">
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="div-carrello">
                        <div class="content-carrello">
                            <a href="{{ url('viewcart') }}">
                                <i class="material-icons">&#xe854;</i>
                                <span>Carrello</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav>
        <div class="container">
            <div id="links2" class="elementNav elementNav2">
                <div class="logo">    
                    <a class="spaceElementNav2" href="{{ url('home')}}">
                        <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqNafBKsIoB_4Xvp0g0mTPWA_Iq9kzGqmDNg&s') }}">
                    </a>
                </div>
                <div class="spaceElementNav2" id="linknav2">
                    <a href="{{ url('home')}}">HOME</a>
                    <a href="">CELLULARI</a>
                    <a href="">TABLET</a>
                    <a href="">ACCESSORI</a>
                    <a href="">RICONDIZIONATI</a>
                    <a href="{{url('viewrepairs')}}">STATO RIPARAZIONE</a>
                </div>
                <div class="search-container">
                    <form action="{{url('home')}}" >
                        <input type="text" placeholder="Cerca nel catalogo..." name="s" class="search-input">
                        <button type="submit" class="search-icon">
                            <a><i class="material-icons">&#xe8b6;</i></a>
                        </button>
                    </form>
                </div>
            </div>
            <div id="nav-mobile">
                <div id="menu-mobile">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div id="logo-mobile">
                    <a href="{{url('home')}}">
                        <img src="{{ url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqNafBKsIoB_4Xvp0g0mTPWA_Iq9kzGqmDNg&s')}}">
                    </a>
                </div>
                <div id="user-info">
                    <a href="">Accedi</a>
                    <a href="">Carrello</a>
                </div>
            </div>
        </div>    
    </nav>
    @yield('head')
</header>
<body>
    @yield('contents')

    
</body>

<footer id="footer">
                <div class="container">
                    <div class="sizeContainerFooter">
                        <div class="containerfooter">
                            <div class="colFooter">
                                <h3>PRODOTTI</h3>
                                <a href="">Offerte</a>
                                <a href="">Nuovi prodotti</a>
                                <a href="">Più venduti</a>
                            </div>
                            <div class="colFooter">
                                <h3>LA NOSTRA AZIENDA</h3>
                                <a href="">Offerte</a>
                                <a href="">Termini e condizioni d'uso</a>
                                <a href="">Più venduti</a>
                                
                            </div>
                            <div class="colFooter">
                                <h3>IL TUO ACCOUNT</h3>
                                <a href="{{ url('profile')}}">Il mio profilo</a>
                                
                            </div>
                        </div>
                        <div class="colFooter-infonegozio">
                            <h3>Informazioni negozio</h3>
                                <span>Click Atenea</span>
                                <span>Via Atenea 172</span>
                                <span>92100 Agrigento</span>
                                <span>Agrigento</span>
                                <span>Italia</span>
                                <span>Chiamaci: 0922 25873</span>
                                <span>Scrivici: info@clickatenea.com</span>
                        </div>
                    </div>
                </div>
</footer>
</html>
