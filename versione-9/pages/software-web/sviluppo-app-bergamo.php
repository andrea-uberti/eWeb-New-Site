<?php
/* Pagina della categoria "Software Web" — stesso impianto delle altre
   pagine di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). Nel vecchio sito il breadcrumb
   di questa pagina era "Software Web > APP Android e IOS": a differenza
   della web app (categoria "Web site", vedi sviluppo-web-app.php) qui si
   parla di app native, quindi resta nella categoria "Software Web" come
   indicava il vecchio sito, non "Web site". */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "sviluppo-app-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "App.<br /><em>Sullo schermo che guardano di più.</em>";
$heroLead = 'iOS e Android, front-office e back-office — cataloghi,
  ordini, magazzino, dentro lo strumento che i tuoi clienti hanno già in
  mano. Pubblicazione sugli store, promozione, assistenza dopo il lancio:
  non ci fermiamo al codice.';
$ctaLine = 'Se c\'è uno strumento che i tuoi clienti dovrebbero avere
  sempre con sé, <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sviluppo App Bergamo — eWeb</title>
    <meta
      name="description"
      content="Sviluppo app iOS e Android su misura, dalla pubblicazione sugli store all'assistenza dopo il lancio. Sviluppo app di eWeb, Bergamo."
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
                Il tempo delle persone<br /><em>passa da lì.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Buona parte del tempo che le persone passano online lo passano
            su un'app, non su un sito. Esserci con uno strumento nativo
            significa un'icona sullo schermo che guardano più spesso,
            notifiche che arrivano davvero, dati raccolti in un modo che
            una pagina web non permette.
          </p>
          <p class="body-l reveal">
            Non è la scelta giusta per tutto — ne parliamo anche nella
            pagina sulle web app — ma quando lo strumento deve diventare
            un'abitudine, un'app nativa resta la via più diretta.
          </p>
        </div>
      </section>

      <!-- ============ COSA COSTRUISCI ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa costruisci</span>
              <h2 class="h2 reveal-lines">
                Front-office e back-office,<br /><em>nella stessa app.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Cataloghi e ordini</h3>
              <p>
                Il front-office che il cliente usa — e il back-office di
                magazzino e gestione, nello stesso strumento.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>iOS e Android</h3>
              <p>
                Sviluppata per entrambi i sistemi, con le differenze che
                servono e aggiornamenti per restarci compatibile.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Funzioni native</h3>
              <p>
                Notifiche push, uso offline, sensori del dispositivo —
                tutto quello che una pagina web da sola non può offrire.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Sugli store, promossa</h3>
              <p>
                Pubblicazione su App Store e Google Play, con il web
                marketing che la fa effettivamente scoprire.
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
                Non finisce al lancio.<br /><em>Comincia lì.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Dopo la pubblicazione restano l'assistenza, gli aggiornamenti
            per seguire i nuovi sistemi operativi, e report periodici
            sulle prestazioni per capire se l'investimento sta
            funzionando — non solo quanti download ha fatto. Un'app che
            fidelizza e differenzia si misura in quanto viene usata
            davvero, non in quanto è stata scaricata una volta.
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
