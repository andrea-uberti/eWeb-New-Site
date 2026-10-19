<?php
/* Pagina della categoria "Google e motori di ricerca" — stesso impianto
   delle altre pagine di servizio (.service-hero/.service-section/
   .service-cta, vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "gestione-google-my-business"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Google e motori di ricerca";
$heroTitle = "Google Business Profile.<br /><em>La prima cosa che vedono di te.</em>";
$heroLead = 'Orario, indirizzo, numero di telefono — le domande più
  semplici sono anche le più frequenti, e passano quasi sempre dalla
  tua scheda su Google. Tenerla aggiornata non è un dettaglio: è spesso
  il primo contatto vero con un cliente.';
$ctaLine = 'Se la tua scheda Google è ferma da mesi,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestione Google My Business — eWeb</title>
    <meta
      name="description"
      content="Creazione e aggiornamento del profilo Google Business: anagrafica, post, recensioni e statistiche. eWeb, Bergamo."
    />
    <meta name="theme-color" content="#044d8b" />

    <!-- Favicon: la graffa del logo ("eWeb}"), colorata in navy — vedi assets/img/favicon.ico/generazione in memoria di progetto. -->
    <link rel="icon" href="assets/img/favicon.ico" sizes="any" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16.png" />
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter+Tight:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="custom/css/style.css" />
  </head>
  <body class="is-loading">
    <!-- ============ PRELOADER ============ -->
    <div class="loader" aria-hidden="true">
      <div class="loader__inner">
        <div class="loader__count">
          <span class="loader__num">0</span><span class="loader__pct">%</span>
        </div>
        <div class="hero__brand-wrap">
          <span
            class="logo logo--loader logo--banner hero__brand"
            role="img"
            aria-label="eWeb — Progettiamo. Sviluppiamo. Comunichiamo. 10 years."
          ></span>
          <span class="hero__badge" aria-hidden="true"></span>
        </div>
      </div>
      <div class="loader__bar"><span></span></div>
    </div>

    <!-- ============ CURSOR ============ -->
    <div class="cursor" aria-hidden="true">
      <span class="cursor__label"></span>
    </div>

    <!-- ============ GRAIN ============ -->
    <div class="grain" aria-hidden="true"></div>

    <?php include __DIR__ . "/../../inc/header.php"; ?>

    <main id="top">
      <?php include __DIR__ . "/../../inc/service-hero.php"; ?>

      <!-- ============ IL CONTESTO ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Il contesto</span>
              <h2 class="h2 reveal-lines">
                "A che ora apre?"<br /><em>Lo chiedono a Google, non a te.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Orari, numero di telefono, indirizzo: le ricerche più
            quotidiane finiscono quasi sempre sulla scheda Google
            dell'attività, nata nel 2014 dalla fusione di più strumenti
            Google in uno solo. Un profilo verificato e aggiornato non è
            un dettaglio estetico — è spesso il primo vero punto di
            contatto con chi ti sta cercando.
          </p>
          <p class="body-l reveal">
            E un profilo trascurato, con informazioni vecchie o
            incomplete, comunica l'esatto opposto: che quell'attività non
            è seguita con attenzione.
          </p>
        </div>
      </section>

      <!-- ============ COSA GESTIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa gestiamo</span>
              <h2 class="h2 reveal-lines">
                Non solo l'anagrafica.<br /><em>Tutta la scheda.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Anagrafica sempre giusta</h3>
              <p>
                Orari, contatti, indirizzo — aggiornati quando cambiano,
                non lasciati come erano al momento della creazione.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Post, foto e video</h3>
              <p>
                Contenuti che mantengono il profilo vivo, non una scheda
                ferma al giorno in cui è stata aperta.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Recensioni e messaggi</h3>
              <p>
                Risposte a chi scrive una recensione o un messaggio —
                perché un profilo che risponde si nota, e si fida di più.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Annunci locali e statistiche</h3>
              <p>
                Visibilità mirata sul territorio, con i numeri per capire
                cosa funziona e cosa no.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ COSA CAMBIA ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa cambia, in concreto</span>
              <h2 class="h2 reveal-lines">
                Una scheda curata<br /><em>vale una strategia.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Una scheda Google non vive isolata: ha bisogno di una
            strategia di acquisizione clienti dietro, non solo di una
            compilazione iniziale. Ci occupiamo noi di crearla,
            aggiornarla e tenerla viva — perché resti davvero il primo
            buon motivo per sceglierti.
          </p>
        </div>
      </section>

      <?php include __DIR__ . "/../../inc/related.php"; ?>

      <?php include __DIR__ . "/../../inc/service-cta.php"; ?>
    </main>

    <?php include __DIR__ . "/../../inc/footer.php"; ?>

    <!-- ============ COOKIE BANNER ============ -->
    <div class="cookie-banner" data-cookie-banner hidden>
      <p>
        Usiamo solo cookie tecnici necessari al funzionamento del sito.
        <a href="#" class="link">Cookie Policy</a>
      </p>
      <div class="cookie-banner__actions">
        <button type="button" class="btn btn--ghost" data-cookie-reject>
          Solo necessari
        </button>
        <button type="button" class="btn btn--solid" data-cookie-accept>
          Accetta
        </button>
      </div>
    </div>

    <!-- ============ LIBS ============ -->
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrambleTextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lenis@1.1.13/dist/lenis.min.js"></script>
    <script src="custom/functions/script.js"></script>
  </body>
</html>
