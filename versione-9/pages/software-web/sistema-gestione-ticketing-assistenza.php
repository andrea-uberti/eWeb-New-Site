<?php
/* Pagina della categoria "Software Web" — stesso impianto delle altre
   pagine di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "sistema-gestione-ticketing-assistenza"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "Ticketing.<br /><em>Niente richiesta persa tra le mail.</em>";
$heroLead = 'Ogni richiesta classificata, presa in carico, risolta — e
  tracciabile dall\'inizio alla fine. Il flusso è il tuo, non uno
  standard preconfezionato: lo costruiamo su come la tua assistenza
  lavora davvero.';
$ctaLine = 'Se l\'assistenza oggi vive sparsa tra mail e telefonate,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistema Gestione Ticketing Assistenza — eWeb</title>
    <meta
      name="description"
      content="Un sistema di ticketing su misura per la tua assistenza clienti, con flusso personalizzabile e report in tempo reale. Software di eWeb, Bergamo."
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
                Una richiesta via mail,<br /><em>una via telefono, una persa.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            L'assistenza clienti costa tempo soprattutto quando è
            disordinata: una richiesta arriva per mail, un'altra per
            telefono, una terza su WhatsApp, e nessuno sa più chi la sta
            seguendo. Un sistema di ticketing non aggiunge un passaggio —
            lo toglie, perché ogni richiesta ha un posto solo dove vivere.
          </p>
          <p class="body-l reveal">
            Lo costruiamo sul tuo flusso reale: come classifichi, chi
            prende in carico, come si chiude — non su un processo
            standard che poi va forzato per adattarsi a te.
          </p>
        </div>
      </section>

      <!-- ============ COSA TRACCI ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa tracci</span>
              <h2 class="h2 reveal-lines">
                Dalla richiesta<br /><em>alla firma di chiusura.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Flusso su misura</h3>
              <p>
                Classificazione, presa in carico, risoluzione: ogni
                passaggio configurato come lavora davvero il tuo team.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Storico ricercabile</h3>
              <p>
                Ogni ticket resta consultabile — utile quando lo stesso
                problema si ripresenta mesi dopo.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Report in tempo reale</h3>
              <p>
                Tempi di risposta, carico di lavoro, ticket aperti: dati
                sempre aggiornati, non una fotografia di fine mese.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Chiusura verificata</h3>
              <p>
                Una checklist firmata dal cliente chiude il ticket — non
                basta "fatto", resta una conferma di chi l'ha ricevuto.
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
                Si adatta a te,<br /><em>non il contrario.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Accessibile da browser, senza installazioni, e pronto a
            crescere quando serve — con moduli come magazzino, timbrature
            o CRM aggiunti quando il bisogno diventa reale, non prima.
            Più di dieci anni di software costruiti così ci hanno
            insegnato che un sistema pensato sul tuo modo di lavorare
            dura più a lungo di uno a cui devi adattarti tu.
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
