@extends('layout')

@section('header')
    @parent
    @section('head')
        <link rel="stylesheet" href="{{ url('css/repairstatus.css') }}"> 
        <script src="{{ url('js/repairstatus.js') }}" defer></script>        
        <script>const csrf_token = '{{ csrf_token() }}';</script>
        <title>Stato Riparazione - Click Atenea</title>
    @endsection
@endsection

@section('contents')
    <div class="content">
        <section class="repairStatus">            
            <div class="container">        
                <h1>Stato Riparazione</h1>
                <div class="add-container-repair ">
                    <div class="search-container-repair">
                        <input type="text" id="search" placeholder="Cerca per ID Riparazione">
                        <button id="search-button">Cerca</button>
                    </div> 
                    @if($superadmin)                    
                        <div class="add-btn-container">
                            <button id="add-btn">Aggiungi Riparazione</button>
                        </div>
                    @endif
                </div>
                <div class="add-repair hidden" id="add-repair">
                    <form id="add-repair-form" method="post">
                        <div class="repair-container">
                            <div class="repair-card">
                                <div class="repair-info">
                                    <div class="status">
                                        <label for="status">Stato:</label>
                                        <select name="status" id="status">
                                            <option value="In Attesa">In Attesa</option>
                                            <option value="In Corso">In Corso</option>
                                            <option value="Completata">Completata</option>
                                            <option value="Annullata">Annullata</option>
                                        </select>
                                    </div>
                                    <div class="description">
                                        <label for="description">Descrizione:</label>
                                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="start_date">
                                        <label for="start_date">Data Inizio:</label>
                                        <input type="date" name="start_date" id="start_date">
                                    </div>
                                    <div class="estimated_completion">
                                        <label for="estimated_completion">Data Fine:</label>
                                        <input type="date" name="estimated_completion" id="estimated_completion">
                                    </div>
                                    <div class="user_id">
                                        <label for="user_id">Codice Utente:</label>
                                        <input type="text" name="user_id" id="user_id">
                                    </div>
                                </div>
                                <button type="button" class="uploadRepair" id="add-repair-button">Carica</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="repair-status"></div>
            </div>
        </section>
    </div>
@endsection
