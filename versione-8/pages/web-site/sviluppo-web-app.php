<?php
/* Terza pagina della categoria "Web site" — stesso impianto delle altre
   pagine di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "sviluppo-web-app"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Web site";
$heroTitle = "Web App.<br /><em>Leggera da usare, non da installare.</em>";
$heroLead = 'Niente store, niente download, niente aggiornamenti da
  ricordarsi di fare. Un indirizzo nel browser e funziona — su telefono
  come su computer — perché a volte lo strumento giusto non è un\'altra
  app, è una pagina ben fatta.';
$ctaLine = 'Se il tuo sito ha bisogno di qualcosa in più di una pagina,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sviluppo Web App — eWeb</title>
    <meta
      name="description"
      content="Niente store, niente download: una web app che funziona nel browser, su telefono come su computer. Sviluppo web app di eWeb, Bergamo."
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
                Non serve un'app.<br /><em>Serve che funzioni.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un'app nativa vuole due versioni (iOS e Android), un passaggio
            di revisione sugli store e un aggiornamento ogni volta che
            cambia qualcosa. Una web app è un unico progetto, pensato
            soprattutto per smartphone e tablet, che si apre dal browser
            come una pagina — e si collega a quello che hai già, sito e
            gestionale, invece di vivere a parte.
          </p>
          <p class="body-l reveal">
            Non è una scorciatoia: è la scelta giusta quando quello che
            serve è uno strumento usato spesso, non un prodotto da
            pubblicare su uno store.
          </p>
        </div>
      </section>

      <!-- ============ A COSA SERVE ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">A cosa serve, in pratica</span>
              <h2 class="h2 reveal-lines">
                Dallo strumento interno<br /><em>al servizio per il cliente.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Catalogo e ordini</h3>
              <p>
                Prodotti sempre aggiornati e un modo semplice per
                raccogliere ordini, senza passare per telefono o email.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Area riservata</h3>
              <p>
                Un posto dove clienti o collaboratori trovano file,
                documenti e aggiornamenti — senza cartelle condivise.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Assistenza e follow-up</h3>
              <p>
                Richieste tracciate, risposte seguite nel tempo, niente
                perso tra una mail e la successiva.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Gestione interna</h3>
              <p>
                Commerciale, amministrazione, risorse umane: processi che
                oggi girano su fogli sparsi, dentro un unico strumento.
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
                Leggera per te,<br /><em>comoda per chi la usa.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Nessuno spazio da liberare sul telefono, nessuna licenza,
            nessun aggiornamento da installare: cambia qualcosa, lo vedi
            già la volta dopo che la apri. L'unico limite è la connessione
            — e il fatto che resta fuori dagli store, senza le notifiche
            push di un'app nativa. Per chi ha già un sito, è spesso il
            passo dopo: lo stesso pubblico, soprattutto da mobile, con uno
            strumento pensato per farlo tornare.
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
