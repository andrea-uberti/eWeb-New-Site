<?php
/* Pagina della categoria "Google e motori di ricerca" — stesso impianto
   delle altre pagine di servizio (.service-hero/.service-section/
   .service-cta, vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "campagne-google-ads"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Google e motori di ricerca";
$heroTitle = "Google Ads.<br /><em>Quando non puoi aspettare l'organico.</em>";
$heroLead = 'Il posizionamento organico vuole tempo. Google Ads no: puoi
  comparire da subito, pagando per lo spazio invece che guadagnandolo
  pagina dopo pagina — utile quando serve una visibilità rapida, o una
  finestra breve come il Black Friday.';
$ctaLine = 'Se serve visibilità da subito, non in qualche mese,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Campagne Google Ads — eWeb</title>
    <meta
      name="description"
      content="Campagne Google Ads su Search, Display, Shopping e YouTube: dalla strategia al monitoraggio delle conversioni. eWeb, Bergamo."
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
                Potente,<br /><em>ma non semplice.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Google Ads è la piattaforma pubblicitaria di Google, e copre
            più formati di quanto sembri: ricerca testuale, banner
            display, schede prodotto, video su YouTube. Ognuno ha una
            logica diversa, un pubblico diverso, un modo diverso di
            misurare se sta funzionando.
          </p>
          <p class="body-l reveal">
            Gestita bene, è uno strumento preciso. Gestita male, è un
            budget che se ne va senza che si capisca perché.
          </p>
        </div>
      </section>

      <!-- ============ COME LAVORIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Come lavoriamo</span>
              <h2 class="h2 reveal-lines">
                Dall'analisi di mercato<br /><em>al monitoraggio dei risultati.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Analisi e keyword</h3>
              <p>
                Prima di scrivere un annuncio, capiamo il mercato e le
                parole su cui vale la pena investire budget.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Campagne e annunci</h3>
              <p>
                Sviluppo della campagna e scrittura degli annunci,
                pensati per convertire e non solo per farsi notare.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Monitoraggio conversioni</h3>
              <p>
                Configurato fin dall'inizio, per sapere non solo chi
                clicca ma chi diventa davvero un contatto o una vendita.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Budget e offerte</h3>
              <p>
                Gestiti nel tempo, non impostati una volta e lasciati
                girare da soli.
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
                Report leggibili,<br /><em>non solo numeri.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Report periodici integrati con i dati di analytics, con un
            focus su una domanda semplice: quello che hai investito,
            cosa ti ha portato davvero. Non è un canale che si "accende e
            si lascia andare" — è ottimizzazione continua, perché quello
            che funziona oggi può non funzionare uguale il mese prossimo.
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
        Usiamo cookie tecnici necessari al funzionamento del sito. Con il
        tuo consenso carichiamo anche la mappa di Google, che pianta
        cookie di terze parti.
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
