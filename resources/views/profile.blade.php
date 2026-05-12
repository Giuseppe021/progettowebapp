@extends('layout')

@section('header')
    @parent
    @section('head')
        <script src="{{ url('js/profile.js') }}" defer></script>
        <link rel="stylesheet" href="{{ url('css/profile.css') }}"> 
        <script> const csrf_token = '{{ csrf_token() }}'</script>
        <title>Profilo Utente</title>
    @endsection
@endsection


@section('contents')
<div class="content">
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-image">
                <img id="user-image" src="" alt="User">
            </div>
            <div class="profile-info">
                <h4 id="user-name"></h4>
                <p>Codice Utente: <span id="user-id"></span></p>
                <p>Ruolo: <span id="user-role"></span></p>                
                <a  id="edit-profile" class="button">Modifica</a>
                <a href="{{ url('logout') }}" class="button">Esci</a>
                <a id="save-profile" class="button hidden">Salva</a>
            </div>
        </div>
        <div class="profile-details">
            <div class="profile-row">
                <div class="profile-label">Nome</div>
                <div class="profile-data"><input type="text" id="user-name1" disabled></div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Cognome</div>
                <div class="profile-data"><input type="text" id="user-surname" disabled></div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Username</div>
                <div class="profile-data"><input type="text" id="user-username" disabled></div>
            </div>
            <div class="profile-row">
                <div class="profile-label">Email</div>
                <div class="profile-data"><input type="email" id="user-email" disabled></div>
            </div>
        </div>
    </div>
</div>
@endsection
