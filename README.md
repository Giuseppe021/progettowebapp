<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20svg/2%20dist%202/laravel-logolockup-rgb-red.svg" width="400" alt="Laravel Logo"></a></p>

# Centro Vendita e Riparazioni Informatiche

[![Laravel Version](https://img.shields.io/badge/laravel-11.x-red.svg)](https://laravel.com)
[![PHP Version](https://img.shields.io/badge/php-8.2%2B-blue.svg)](https://php.net)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Informazioni sul Progetto

Questa web application è un sistema gestionale completo per un centro di assistenza e vendita informatica. Sviluppata come progetto dimostrativo, l'applicazione permette di gestire un catalogo prodotti, un sistema di carrello e-commerce e il tracciamento in tempo reale delle riparazioni hardware/software.

Il sistema adotta un'architettura **MVC (Model-View-Controller)** robusta, sfruttando le potenzialità di Laravel per la gestione dell'autenticazione granulare tramite middleware e la persistenza dei dati con Eloquent ORM.

## Funzionalità Principali

L'applicazione è suddivisa in quattro livelli di autorizzazione:

- **Guest:** Navigazione del catalogo pubblico (prezzi oscurati).
- **User:** Gestione del profilo, carrello acquisti e verifica stato riparazioni personali.
- **Admin (Staff):** Gestione completa del catalogo (CRUD prodotti) e creazione/aggiornamento ticket di riparazione.
- **Superadmin (Manager):** Controllo totale del personale, gestione ruoli e amministrazione utenti.

## Stack Tecnologico

L'applicazione utilizza le seguenti tecnologie:

- **Framework:** [Laravel 11](https://laravel.com/docs/11.x)
- **Database:** MySQL / MariaDB
- **Frontend:** Blade Templates, CSS3, JavaScript (ES6+)
- **Build Tool:** [Vite](https://vitejs.dev/)
- **Gestore Dipendenze:** Composer & NPM

---

## Struttura del Database



[Image of an entity relationship diagram]

Il database `progettowebapp` è composto dalle seguenti entità principali:

- `users`: Gestione identità e RBAC (Role-Based Access Control).
- `products`: Archivio dei dispositivi e accessori in vendita.
- `carts`: Relazione molti-a-molti tra utenti e prodotti per la gestione persistente della spesa.
- `repairs`: Log dei ticket di assistenza tecnica legati agli account utente.

---

## Installazione

Per eseguire il progetto in locale, segui questi passaggi:

1. **Clonazione del Repository:**
   ```bash
   git clone [https://github.com/Giuseppe021/progettowebapp.git](https://github.com/Giuseppe021/progettowebapp.git)
   cd progettowebapp
