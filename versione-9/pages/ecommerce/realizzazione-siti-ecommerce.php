<?php
/* Prima pagina della nuova categoria "Ecommerce" — stesso impianto delle
   altre pagine di servizio (.service-hero/.service-section/.service-cta,
   vedi i commenti in style.css e inc/header.php). Nuova categoria: vedi i
   due blocchi aggiunti in .htaccess per "pages/ecommerce/". */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "realizzazione-siti-ecommerce"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Ecommerce";
$heroTitle = "Ecommerce proprietario.<br /><em>Tuo, non in affitto su un marketplace.</em>";
$heroLead = 'Un marketplace ti dà visibilità subito, ma a modo suo: vetrina
  standard, prezzi sotto pressione, nessun controllo vero sul negozio. Un
  ecommerce proprietario è più lento a partire — e resta completamente
  tuo, dalla grafica ai dati dei clienti.';
$ctaLine = 'Se sei stanco di vendere alle condizioni di qualcun altro,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Realizzazione Siti Ecommerce — eWeb</title>
    <meta
      name="description"
      content="Ecommerce proprietario su misura, in alternativa ai marketplace: catalogo, grafica e gestione completamente tue. eWeb, Bergamo."
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
                Due strade,<br /><em>non una scelta ovvia.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Vendere online oggi vuol dire scegliere tra un marketplace
            (Amazon, eBay e simili) e un ecommerce tuo. Il primo ti mette
            davanti a milioni di persone da subito, ma dentro una vetrina
            che non controlli: grafica standard, concorrenza diretta
            sullo stesso prodotto, prezzi spinti verso il basso dalla
            piattaforma stessa.
          </p>
          <p class="body-l reveal">
            Un ecommerce proprietario parte più piano — la visibilità va
            costruita, non è già lì — ma quello che costruisci resta
            tuo: catalogo, dati dei clienti, margini, immagine.
          </p>
        </div>
      </section>

      <!-- ============ COSA RESTA TUO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa resta tuo</span>
              <h2 class="h2 reveal-lines">
                Nessun canone<br /><em>a chi ti ospita.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Struttura e grafica</h3>
              <p>
                Pensate per il tuo catalogo e il tuo pubblico, non scelte
                da un numero limitato di template condivisi.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Prezzi e margini</h3>
              <p>
                Decisi da te, senza una piattaforma che spinge verso il
                basso per restare competitiva al posto tuo.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Pagamenti e consegne</h3>
              <p>
                Gestiti come funzionano meglio per il tuo business, non
                come li impone un marketplace a tutti i venditori.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>I tuoi clienti, davvero tuoi</h3>
              <p>
                Dati e relazione restano con te — non con chi ti presta
                la vetrina per venderci sopra.
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
                Serve costruirla,<br /><em>la visibilità.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            La libertà di un ecommerce proprietario ha un prezzo: nessuno
            ti porta già il traffico, va costruito con SEO, campagne e
            comunicazione — lo stesso lavoro che vedi nelle pagine sopra.
            Partiamo da come funziona oggi la tua azienda, costruiamo il
            negozio su misura, e continuiamo a seguirlo dopo il lancio:
            il sito è solo l'inizio, non il punto d'arrivo.
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
