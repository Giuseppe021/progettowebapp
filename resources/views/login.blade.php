@extends('layout')
@section('header')
    @parent
    @section('head')
        <title>Entra</title>
        <link rel="stylesheet" href="{{ url('css/register.css') }}">
        <script src="{{ url('js/login.js') }}" defer></script>
    @endsection
@endsection

@section('contents')
    <div class="content">
        <section class="secPrincipale">
            <div class="container">            
                <h1>Accedi al tuo account</h1>
                <div class="register-box">
                    <section class="register-form"> 
                        @if($error == 'wrong_credentials')
                            <p class='error'>Credenziali errate</p>
                        @elseif ($error == 'empty_fields')
                            <p class='error'>Compila tutti i campi</p>
                        @else 
                            <p class='error'>{{ $error }}</p>
                        @endif
                        <form name='flogin' method="post">
                            @csrf
                            <div class="username">
                                <label for='username'>Nome utente</label>
                                <input type="text" name="username" placeholder="Username" value='{{ old("username") }} '>
                                <div><img src="./assets/close.svg"/><span>Devi inserire il tuo username</span></div>
                            </div>
                            <div class="password">
                                <label for='password'>Password</label>
                                <input type="password" name="password" placeholder="Password">
                                <div><img src="./assets/close.svg"/><span>Devi inserire la tua password</span></div>
                            </div>
                            <div class="submit">
                                <input type="submit" class="button" value="Login">
                            </div>
                        </form>
                    </section>
                    <hr>
                    <a href="{{ url('register') }}">Non hai ancora un account? Registrati qui.</a>
                </div>
            </div>
        </section>
    </div>
@endsection
