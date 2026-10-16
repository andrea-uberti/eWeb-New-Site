<?php
/* Terza pagina della categoria "Software Web" — stesso impianto delle
   altre pagine di servizio (.service-hero/.service-section/.service-cta,
   vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "gestione-fidelity-card"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "Fidelity card.<br /><em>Fatta per farli tornare.</em>";
$heroLead = 'Un pannello da browser per gestire punti, premi e sconti —
  niente da installare, niente terminali dedicati. Ogni carta, fisica o
  digitale, con la sua storia: quanto ha accumulato, cosa ha già ritirato,
  cosa può ancora chiedere.';
$ctaLine = 'Se vuoi che i tuoi clienti abbiano un motivo in più per
  tornare, <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestione Fidelity Card — eWeb</title>
    <meta
      name="description"
      content="Un pannello web-based per gestire punti, premi e sconti delle tue fidelity card, fisiche o digitali. Gestione fidelity card di eWeb, Bergamo."
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
                Un punto in più,<br /><em>un motivo in più per tornare.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Una fidelity card funziona quando è semplice: il cliente
            accumula punti con quello che compra, e li spende in premi o
            sconti. Il meccanismo è noto da sempre — quello che cambia è
            come lo gestisci dietro le quinte, senza terminali dedicati,
            licenze di cassa o schede tecniche da aggiornare a mano.
          </p>
          <p class="body-l reveal">
            Un pannello accessibile da browser semplifica anche questa
            parte: resta uno strumento del tuo negozio, non un sistema
            che va capito prima di poterlo usare.
          </p>
        </div>
      </section>

      <!-- ============ COSA GESTISCI ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa gestisci</span>
              <h2 class="h2 reveal-lines">
                Ogni carta, la sua storia.<br /><em>Sempre a portata di mano.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Premi e operazioni</h3>
              <p>
                Sconti e premi configurati come vuoi tu, con categorie,
                soglie e parametri di carico e scarico punti.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Carte fisiche e digitali</h3>
              <p>
                Lettura via barcode o inserimento manuale — funziona con
                la carta che il cliente ha davvero in tasca.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Area cliente</h3>
              <p>
                Storico transazioni e saldo punti sempre visibili, con la
                tessera scaricabile o ristampabile quando serve.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Grafica tua</h3>
              <p>
                Fronte e retro personalizzabili con logo e immagini
                aziendali — una carta che si riconosce, non generica.
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
                Niente da installare.<br /><em>Tutto da un browser.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Chi gestisce il negozio apre il pannello e lavora, senza
            software da aggiornare o terminali da configurare. Le
            manifestazioni a premio hanno una normativa propria (vale la
            pena controllarla sul sito del Ministero dello Sviluppo
            Economico) e la raccolta dati dei programmi fedeltà ricade
            nelle regole sulla privacy — qui ci pensiamo anche a quello,
            non solo al codice.
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
