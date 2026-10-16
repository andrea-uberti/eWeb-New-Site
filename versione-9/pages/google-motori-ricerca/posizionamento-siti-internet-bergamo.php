<?php
/* Pagina della categoria "Google e motori di ricerca" — stesso impianto
   delle altre pagine di servizio (.service-hero/.service-section/
   .service-cta, vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "posizionamento-siti-internet-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Google e motori di ricerca";
$heroTitle = "Posizionamento.<br /><em>Esserci non basta, bisogna essere trovati.</em>";
$heroLead = 'Un sito indicizzato c\'è, nei risultati di Google. La
  domanda vera è dove: alla terza pagina non ti vede nessuno. Qui
  lavoriamo per farti arrivare dove le persone guardano davvero.';
$ctaLine = 'Se il tuo sito c\'è ma nessuno lo trova,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Posizionamento Siti Internet Bergamo — eWeb</title>
    <meta
      name="description"
      content="Dall'indicizzazione al posizionamento: contenuti di qualità, SEO e report di monitoraggio per arrivare in alto nei risultati. eWeb, Bergamo."
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
                Avere un sito<br /><em>non vuol dire essere visti.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un sito può esistere, essere letto da Google, e restare
            comunque invisibile — perché finisce a pagina tre dei
            risultati, dove quasi nessuno arriva a guardare. Indicizzato
            e posizionato sono due cose diverse: la prima è esserci, la
            seconda è dove, esattamente, ti trovano.
          </p>
          <p class="body-l reveal">
            Arrivarci richiede contenuti costruiti sulle parole chiave
            giuste e un lavoro SEO che continua, non un intervento una
            tantum.
          </p>
        </div>
      </section>

      <!-- ============ COSA FACCIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa facciamo</span>
              <h2 class="h2 reveal-lines">
                Due mesi, minimo,<br /><em>per vedere se funziona.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Lavoro sull'indicizzazione</h3>
              <p>
                Il punto di partenza resta quello: senza indicizzazione
                solida, il posizionamento non ha basi su cui lavorare.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Monitoraggio delle keyword</h3>
              <p>
                Report che seguono le posizioni per almeno due mesi,
                tempo minimo perché un trend si veda davvero.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Traffico e conversioni</h3>
              <p>
                Non basta salire in classifica: contano le visite che
                arrivano e quello che fanno una volta arrivate.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Organico vs a pagamento</h3>
              <p>
                Ti aiutiamo a capire quando conviene aspettare i risultati
                organici e quando, invece, ha senso Google Ads.
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
                Non una promessa,<br /><em>un report da leggere insieme.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Alla fine del periodo di monitoraggio sai dove sei salito,
            dove no, e perché — non solo un numero generico di
            "visibilità". Da lì si decide se continuare a spingere
            sull'organico, affiancarlo con campagne a pagamento, o
            correggere la rotta su quello che non ha funzionato.
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
