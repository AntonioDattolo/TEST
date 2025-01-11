
# INFO

Questo git-template fornisce lo scaffold di una web application realizzata con Laravel 10, Blade, Breeze, SCSS, Bootstrap e Vite. 

- [Documentazione Laravel 10.x](https://laravel.com/docs/10.x).

- [Documentazione Laravel Breeze](https://laravel.com/docs/10.x/starter-kits).

# TEST
## Requisiti Funzionali
 La soluzione consiste in una singola pagina web con le seguenti 
	funzionalità di base:
 • Una lista di attività precedentemente inserite, mostrata in una 
	tabella con informazioni rilevanti in colonne.
 • La lista deve essere ordinabile cliccando sulle intestazioni delle 
	colonne.
 • Ogni riga della lista deve includere i seguenti pulsanti:
 • Elimina l'attività (con una finestra di conferma).
 • Modifica l'attività.
 • Un pulsante globale per aggiungere una nuova attività.
 • Quando si clicca su [Modifica]:
 • Deve comparire una finestra modale con i dati dell'attività 
	precompilati.
 • La finestra deve avere i pulsanti [Annulla] e [Salva].
 • Quando si clicca su [Aggiungi]:
 • Deve comparire una finestra modale vuota per creare una 
	nuova attività.
 • Il salvataggio deve creare una nuova attività nella lista.
 • Un pulsante per filtrare (mostrare/nascondere) le attività chiuse.
 ## Requisiti Non Funzionali
 • La pagina deve essere funzionante su tutti i principali browser 
	(Chrome, Firefox, Edge, Safari).
 • Deve essere responsive, adattandosi a diverse risoluzioni (desktop 
	e mobile).
 • L’interfaccia deve essere intuitiva e facile da usare.
 ## Artisan CLI Commands
 • Creare almeno un comando Artisan per:
 • Inserire una nuova attività con informazioni di base.
 • Eliminare un'attività (usando la chiave primaria)

# SETUP INIZIALE
- Per creare la APP_KEY nel `.env`, lanciare il comando dedicato, ma prima installare le dipendenze composer
	```bash
    composer install
	php artisan key:generate
	```
 - Installare anche le dipendenze NPM
	```bash
	npm i
	```
- Lanciare migrazioni e seeder
	```bash
	php artisan migrate:fresh --seed
	```
- Lanciare il progetto tramite il server built-in di PHP
	```bash
	php artisan serve
	```
- Lanciare vite
	```bash
	npm run dev
	```





