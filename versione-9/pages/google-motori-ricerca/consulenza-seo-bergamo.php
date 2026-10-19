<?php
/* Prima pagina della nuova categoria "Google e motori di ricerca" — stesso
   impianto delle altre pagine di servizio (.service-hero/.service-section
   /.service-cta, vedi i commenti in style.css e inc/header.php). Nuova
   categoria: vedi i due blocchi aggiunti in .htaccess per
   "pages/google-motori-ricerca/". */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "consulenza-seo-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Google e motori di ricerca";
$heroTitle = "SEO.<br /><em>Le parole che i tuoi clienti usano già.</em>";
$heroLead = 'Prima di scrivere una riga di contenuto, guardiamo cosa
  cercano davvero le persone che potrebbero diventare tuoi clienti —
  a Bergamo e oltre. Poi costruiamo intorno a quelle parole, non
  intorno a quello che pensiamo noi che cerchino.';
$ctaLine = 'Se vuoi sapere cosa cercano davvero i tuoi clienti,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulenza SEO Bergamo — eWeb</title>
    <meta
      name="description"
      content="Analisi keyword, ottimizzazione on-site e off-site, monitoraggio continuo: consulenza SEO su misura. eWeb, Bergamo."
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
                Sai cosa cercano<br /><em>i tuoi clienti?</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            La SEO non parte dal sito: parte da chi lo cerca. Prima di
            toccare un contenuto o una struttura, serve capire con quali
            parole le persone arrivano a un problema che tu risolvi —
            distinguendo cosa trovano gratis nei risultati organici e
            cosa, invece, passa solo dagli annunci a pagamento.
          </p>
          <p class="body-l reveal">
            Senza questo passaggio, anche il sito meglio scritto resta
            invisibile a chi lo starebbe cercando davvero.
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
                Dall'analisi<br /><em>alla strategia.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Analisi keyword</h3>
              <p>
                Con strumenti dedicati, e uno sguardo specifico su
                Bergamo quando la ricerca locale conta davvero.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>On-site e off-site</h3>
              <p>
                Contenuti, URL, meta tag ed esperienza d'uso da un lato;
                autorevolezza e link in entrata dall'altro.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Monitoraggio continuo</h3>
              <p>
                Report che seguono i cambiamenti, non una fotografia
                scattata una volta e mai più aggiornata.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Strategia su misura</h3>
              <p>
                Pensata per il tuo settore e per chi vuoi raggiungere, non
                un modello replicato per ogni cliente.
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
                SEO senza contenuti,<br /><em>contenuti senza SEO.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Le due cose da sole non bastano: una struttura ottimizzata
            senza niente da dire resta vuota, un buon contenuto senza SEO
            resta invisibile. Dopo l'analisi, lavoriamo anche sui testi e
            sui contenuti che la sostengono — e seguiamo i cambiamenti
            degli algoritmi perché quello che funzionava un anno fa non è
            garanzia per l'anno prossimo.
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
