<?php
/* Prima pagina della nuova categoria "Software Web" — stesso impianto delle
   altre pagine di servizio (.service-hero/.service-section/.service-cta,
   vedi i commenti in style.css e inc/header.php). Nuova categoria: vedi i
   due blocchi aggiunti in .htaccess per "pages/software-web/". */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "software-web-based"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "Software su misura.<br /><em>Non in affitto, tuo.</em>";
$heroLead = 'Un gestionale, un CRM, uno strumento che oggi non esiste
  ancora perché nessuno lo fa esattamente come serve a te. Lo costruiamo
  intorno al tuo modo di lavorare, un pezzo alla volta — e resta tuo,
  codice compreso.';
$ctaLine = 'Se c\'è un processo che oggi gestisci a fatica,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sviluppo Software Web Based — eWeb</title>
    <meta
      name="description"
      content="Software su misura, costruito intorno al tuo modo di lavorare: resta tuo, codice compreso, senza canoni di licenza. Sviluppo software web based di eWeb, Bergamo."
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
                Un gestionale pronto<br /><em>non è pronto per te.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Gestionali, CRM, ERP: oggi sono quasi tutti web, pensati per
            girare da browser senza installazioni. Ma "web" non vuol dire
            "uguale per tutti" — la maggior parte di questi strumenti
            resta un vestito pensato per nessuno in particolare, che poi
            ognuno adatta come può al proprio modo di lavorare.
          </p>
          <p class="body-l reveal">
            Noi partiamo dal verso opposto: guardiamo cosa usi già, cosa
            manca, cosa ti costa tempo — e costruiamo lo strumento intorno
            a quello, non il contrario.
          </p>
        </div>
      </section>

      <!-- ============ IL PERCORSO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Il percorso</span>
              <h2 class="h2 reveal-lines">
                Un modulo alla volta,<br /><em>non tutto insieme e a caso.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Cosa usi già</h3>
              <p>
                Guardiamo gli strumenti che hai in mano oggi, prima di
                proporne uno nuovo — per capire cosa va tenuto e cosa no.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Cosa serve davvero</h3>
              <p>
                Obiettivi ed esigenze reali, non una lista di funzioni da
                spuntare per sembrare completi.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Un progetto su misura</h3>
              <p>
                Pensato per come lavori tu, non adattato da un modello
                pensato per un altro settore.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Sviluppo per moduli</h3>
              <p>
                Cresce un pezzo alla volta, e ogni pezzo si integra con
                quello che hai già — invece di sostituirlo tutto insieme.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ COSA RESTA TUO ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa cambia, in concreto</span>
              <h2 class="h2 reveal-lines">
                Lo paghi una volta.<br /><em>Resta tuo per sempre.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Niente canone annuale da rinnovare, niente licenza che scade:
            paghi lo sviluppo delle funzionalità che decidi insieme a noi,
            e il codice sorgente resta tuo — titolarità piena, non in
            affitto. Nel mezzo, uno strumento cloud, accessibile da
            qualsiasi dispositivo, che cresce con te e può integrare anche
            funzioni di intelligenza artificiale dove ha senso.
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
