# Centro Vendita e Riparazioni Informatiche — Web App

Web application per la gestione di un centro di vendita e riparazioni informatiche, realizzata con Laravel (PHP), HTML, CSS e JavaScript.

---

## Indice

- [Descrizione del progetto](#descrizione-del-progetto)
- [Livelli di accesso](#livelli-di-accesso)
- [Tecnologie utilizzate](#tecnologie-utilizzate)
- [Struttura del progetto](#struttura-del-progetto)
- [Schema del database](#schema-del-database)
- [Installazione e configurazione](#installazione-e-configurazione)
- [Credenziali di test](#credenziali-di-test)

---

## Descrizione del progetto

Questa web app simula il portale online di un centro specializzato nella vendita di dispositivi e accessori informatici e nell'offerta di servizi di riparazione. L'applicazione è strutturata su quattro livelli di accesso che determinano quali funzionalità sono disponibili per ciascun tipo di utente.

---

## Livelli di accesso

### 👤 Utente non registrato (ospite)
- Visualizza la home page con i prodotti in evidenza.
- Naviga il catalogo completo dei prodotti.
- Vede il nome e l'immagine dei prodotti, ma **non** il prezzo né i dettagli completi.
- Non può aggiungere prodotti al carrello, visualizzare il profilo o controllare lo stato delle riparazioni.

### 🔐 Utente registrato
- Accede a tutte le funzionalità dell'ospite, più:
- Visualizza il **prezzo** e i dettagli completi di ogni prodotto.
- Aggiunge e rimuove prodotti dal **carrello** personale (con gestione delle quantità).
- Visualizza e modifica il proprio **profilo utente** (nome, cognome, username, email).
- Controlla lo **stato delle proprie riparazioni** (es. "In Attesa", "In Lavorazione", "Completato").

### 🛠️ Admin (impiegato)
- Accede a tutte le funzionalità dell'utente registrato, più:
- Carica, modifica e rimuove **prodotti** dal catalogo (nome, descrizione, prezzo, immagine).
- Aggiunge nuove **riparazioni** associate a un utente esistente (descrizione, stato, data di inizio, data stimata di completamento).
- Aggiorna lo **stato** di una riparazione in corso.
- Rimuove riparazioni dal sistema.
- Visualizza la lista completa di tutte le riparazioni presenti nel sistema.

### 👑 Superadmin (capo)
- Accede a tutte le funzionalità dell'admin, più:
- **Registra nuovi utenti** con qualsiasi ruolo (user, admin, superadmin) direttamente dal pannello di registrazione.
- Modifica il **ruolo** di un utente esistente (es. promuovere un utente a admin).
- Rimuove utenti dal sistema.

---

## Tecnologie utilizzate

| Tecnologia | Utilizzo |
|---|---|
| **PHP 8.2** | Logica server-side |
| **Laravel 11** | Framework MVC, routing, ORM Eloquent, gestione sessioni |
| **MySQL / MariaDB** | Database relazionale |
| **HTML5** | Struttura delle pagine (Blade templates) |
| **CSS3** | Stile e layout |
| **JavaScript** | Interattività lato client, chiamate AJAX alle API REST |
| **Vite** | Bundling degli asset front-end |

---

## Struttura del progetto

```
progettowebapp/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── LoginController.php    # Registrazione, login, logout
│   │       ├── HomeController.php     # Home page, catalogo prodotti, ricerca
│   │       ├── CartController.php     # Gestione carrello
│   │       ├── RepairController.php   # Gestione riparazioni
│   │       └── UserController.php     # Profilo utente
│   └── Models/
│       ├── User.php
│       ├── Product.php
│       ├── Cart.php
│       └── Repair.php
├── resources/
│   └── views/                         # Template Blade
│       ├── layout.blade.php           # Layout base (navbar, footer)
│       ├── home.blade.php             # Home page con prodotti in evidenza
│       ├── allproducts.blade.php      # Catalogo completo prodotti
│       ├── product.blade.php          # Dettaglio singolo prodotto
│       ├── cart.blade.php             # Carrello utente
│       ├── repairstatus.blade.php     # Stato riparazioni
│       ├── profile.blade.php          # Profilo utente
│       ├── login.blade.php            # Form di login
│       └── register.blade.php         # Form di registrazione
├── routes/
│   └── web.php                        # Definizione di tutte le rotte
├── database/
│   └── migrations/                    # Migrazioni Laravel
├── progettowebapp.sql                 # Dump SQL con struttura e dati di esempio
└── .env.example                       # Template variabili d'ambiente
```

---

## Schema del database

### `users`
| Campo | Tipo | Descrizione |
|---|---|---|
| `id` | int | Chiave primaria |
| `name` | varchar | Nome |
| `surname` | varchar | Cognome |
| `username` | varchar | Username univoco |
| `email` | varchar | Email univoca |
| `password` | varchar | Password hash (bcrypt) |
| `role` | varchar | Ruolo: `user`, `admin`, `superadmin` |

### `products`
| Campo | Tipo | Descrizione |
|---|---|---|
| `id` | int | Chiave primaria |
| `name` | varchar | Nome del prodotto |
| `description` | text | Descrizione |
| `price` | decimal | Prezzo |
| `image_url` | text | URL dell'immagine |

### `carts`
| Campo | Tipo | Descrizione |
|---|---|---|
| `id` | int | Chiave primaria |
| `user_id` | int | FK → users.id |
| `product_id` | int | FK → products.id |
| `quantity` | int | Quantità del prodotto nel carrello |

### `repairs`
| Campo | Tipo | Descrizione |
|---|---|---|
| `id` | int | Chiave primaria |
| `description` | text | Descrizione del problema |
| `status` | varchar | Stato (es. "In Attesa", "In Lavorazione", "Completato") |
| `start_date` | date | Data di inizio riparazione |
| `estimated_completion` | date | Data stimata di completamento |
| `user_id` | int | FK → users.id |

---

## Installazione e configurazione

### Prerequisiti
- PHP >= 8.2
- Composer
- Node.js e npm
- MySQL o MariaDB

### Passaggi

1. **Clona il repository:**
   ```bash
   git clone https://github.com/Giuseppe021/progettowebapp.git
   cd progettowebapp
   ```

2. **Installa le dipendenze PHP:**
   ```bash
   composer install
   ```

3. **Installa le dipendenze JavaScript:**
   ```bash
   npm install
   ```

4. **Configura le variabili d'ambiente:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Modifica il file `.env` impostando i parametri del database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=progettowebapp
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Crea il database e importa i dati di esempio:**
   ```bash
   mysql -u root -p -e "CREATE DATABASE progettowebapp CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;"
   mysql -u root -p progettowebapp < progettowebapp.sql
   ```

6. **Compila gli asset front-end:**
   ```bash
   npm run build
   ```

7. **Avvia il server di sviluppo:**
   ```bash
   php artisan serve
   ```
   L'applicazione sarà disponibile all'indirizzo [http://localhost:8000](http://localhost:8000).

---

## Credenziali di test

Le seguenti credenziali sono disponibili nel dump SQL di esempio:

| Username | Ruolo |
|---|---|
| `admin` | superadmin |
| `peppe` | admin |
| `paippo` | user |

> **Nota:** Le password nel dump SQL sono in formato bcrypt. Per effettuare il login con uno degli utenti di esempio è necessario conoscere la password in chiaro corrispondente, oppure è possibile creare un nuovo utente tramite la pagina di registrazione (`/register`).
