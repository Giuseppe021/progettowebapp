@extends('layout')
@section('header')
    @parent
    @section('head')
        <title>Registrati</title>
        <link rel="stylesheet" href="{{ url('css/register.css') }}">
        <script src="{{ url('js/register.js') }}" defer></script>
    @endsection
@endsection

@section('contents')
    <div class="content">
        <section class="secPrincipale">
            <div class="container">            
                    <h1>Crea un account</h1>
                    <div class="register-box">
                        <main>                            
                            <form name='fregister' method='post' >
                                 @if($error == 'empty_fields')
                                <section class='error'>Compilare tutti i campi.</section>
                                @elseif($error == 'bad_passwords')
                                <section class='error'>Le password non corrispondono.</section>
                                @elseif($error == 'existing')
                                <section class='error'>Nome utente già esistente.</section>
                                @endif
                                @csrf
                                <div class="names">
                                    <div class="name">
                                        <label for='name'>Nome</label>
                                        <input type='text' name='name' value='{{ old("name") }}'>
                                        <div><img src="./assets/close.svg"/><span>Devi inserire il tuo nome</span></div>
                                    </div>
                                    <div class="surname">
                                        <label for='surname'>Cognome</label>
                                        <input type='text' name='surname' value='{{ old("surname") }}' >
                                        <div><img src="./assets/close.svg"/><span>Devi inserire il tuo cognome</span></div>
                                    </div>
                                </div>
                                <div class="username">
                                    <label for='username'>Nome utente</label>
                                    <input type='text' name='username' value='{{ old("username") }}'>
                                    <div><img src="./assets/close.svg"/><span>Nome utente non disponibile</span></div>
                                </div>
                                <div class="email">
                                    <label for='email'>Email</label>
                                    <input type='text' name='email' value='{{ old("email") }}'>
                                    <div><img src="./assets/close.svg"/><span>Indirizzo email non valido</span></div>
                                </div>
                                <div class="password">
                                    <label for='password'>Password</label>
                                    <input type='password' name='password' >
                                    <div><img src="./assets/close.svg"/><span>Inserisci almeno 8 caratteri</span></div>
                                </div>
                                <div class="confirm_password">
                                    <label for='confirm_password'>Conferma Password</label>
                                    <input type='password' name='confirm_password' >
                                    <div><img src="./assets/close.svg"/><span>Le password non coincidono</span></div>
                                </div>
                                @if($superadmin)
                                    <div class="role">
                                        <label for='role'>Ruolo</label>
                                        <select name='role'>
                                            <option value='user'>Utente</option>
                                            <option value='admin'>Amministratore</option>
                                        </select>
                                    </div>
                                    
                                @endif
                                
                                @foreach($errors->all() as $err)
                                    <div class='errorj'><img src='{{ url("assets/close.svg") }}'/><span>{{ $err }}</span></div>
                                @endforeach
                                <div class="submit">
                                    @if($superadmin)
                                        <input type='submit' value="Registra" id="submit">
                                    @else
                                        <input type='submit' value="Registrati" id="submit">
                                    @endif
                                </div>
                            </form>
                            
                        </main> 
                        
                    </div>
            </div>
        </section>
    </div>
@endsection