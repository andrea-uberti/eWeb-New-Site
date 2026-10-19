<?php
/* Pagina della categoria "Content" — stesso impianto delle altre pagine
   di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). Questa pagina guarda il
   marketing dal lato "below the line" (vendita, pubblico mirato); la
   sorella advertising-bergamo.php guarda lo stesso tema dal lato opposto
   (notorietà, pubblico ampio) — stesso argomento di base nel vecchio
   sito, differenziato qui per non duplicare il contenuto. */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "below-the-line-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Content";
$heroTitle = "Below the line.<br /><em>Parlare a chi è già pronto a scegliere.</em>";
$heroLead = 'Non un pubblico ampio da far conoscere, ma un gruppo
  preciso da convincere adesso. Direct marketing, PPC, remarketing,
  automazioni — strumenti che si misurano in conversioni, non in quanti
  ti hanno visto passare.';
$ctaLine = 'Se hai già chi vuoi convincere, e serve solo spingere,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Below the Line Bergamo — eWeb</title>
    <meta
      name="description"
      content="Marketing mirato orientato alla vendita: direct marketing, PPC, remarketing e automazioni con ROI misurabile. eWeb, Bergamo."
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
                Non serve farsi conoscere<br /><em>da tutti.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            C'è un momento in cui la notorietà ampia (il lavoro "above
            the line" che trovi nella pagina dedicata all'advertising)
            ha già fatto il suo — e serve invece parlare a un gruppo
            preciso di persone, pronte o quasi pronte a scegliere.
            Questo è il terreno del below the line: mirato, misurabile,
            orientato alla vendita.
          </p>
          <p class="body-l reveal">
            Qui ogni euro investito si segue fino in fondo: quanto
            costa, cosa porta, se conviene continuare o cambiare rotta.
          </p>
        </div>
      </section>

      <!-- ============ COSA COMPRENDE ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa comprende</span>
              <h2 class="h2 reveal-lines">
                Dal contatto diretto<br /><em>a chi ti ha già visitato.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Direct marketing</h3>
              <p>
                Comunicazione uno a uno con chi già conosci — non un
                messaggio uguale sparato a tutti.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>PPC</h3>
              <p>
                Paghi solo per chi clicca davvero: ogni euro è legato a
                un'azione concreta, non a un'esposizione generica.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Remarketing</h3>
              <p>
                Torni davanti a chi ti ha già visitato senza convertire
                — spesso il pubblico più vicino a decidersi.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Marketing automation</h3>
              <p>
                Flussi che agiscono da soli al momento giusto, invece di
                richiedere un intervento manuale ogni volta.
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
                Conversioni più alte,<br /><em>ROI più leggibile.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            A differenza della pubblicità ad ampio raggio, qui i numeri
            parlano chiaro: tasso di conversione, costo per contatto,
            ritorno sull'investimento — tutto misurabile, tutto
            ottimizzabile mentre la campagna è ancora in corso. Il lavoro
            above the line costruisce chi ti conosce; questo trasforma
            chi ti conosce in chi ti scelga.
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
