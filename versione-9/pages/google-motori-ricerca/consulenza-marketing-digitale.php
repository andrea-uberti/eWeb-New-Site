<?php
/* Pagina della categoria "Google e motori di ricerca" — stesso impianto
   delle altre pagine di servizio (.service-hero/.service-section/
   .service-cta, vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "consulenza-marketing-digitale"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Google e motori di ricerca";
$heroTitle = "Marketing digitale.<br /><em>Fatti trovare da chi ti cerca.</em>";
$heroLead = 'Le parole giuste non servono solo alla SEO: guidano ogni
  scelta, dai contenuti alle campagne a pagamento. Partiamo da come le
  persone cercano davvero quello che offri, non da come vorremmo che
  lo cercassero.';
$ctaLine = 'Se vuoi una strategia che parte da come ti cercano, non da
  un modello, <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulenza Marketing Digitale — eWeb</title>
    <meta
      name="description"
      content="Strategia di marketing digitale costruita sulle keyword giuste, dalla SEO alle campagne a pagamento. eWeb, Bergamo."
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
                La parola giusta<br /><em>è già metà del lavoro.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Una keyword non è solo un termine da piazzare in una pagina:
            è il punto dove quello che cerca una persona incontra quello
            che un'azienda offre. Si individua osservando come le persone
            si comportano davvero online, non indovinando da una scrivania.
          </p>
          <p class="body-l reveal">
            E quella stessa parola, una volta trovata, non serve solo
            alla SEO — guida contenuti, campagne, tutto il modo in cui
            comunichi online.
          </p>
        </div>
      </section>

      <!-- ============ DALL'ANALISI ALLA STRATEGIA ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Dall'analisi alla strategia</span>
              <h2 class="h2 reveal-lines">
                Una parola pertinente,<br /><em>non una qualsiasi.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Osservare, non indovinare</h3>
              <p>
                Il comportamento reale di chi cerca conta più di
                qualsiasi intuizione su cosa "dovrebbe" funzionare.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Contenuti di qualità</h3>
              <p>
                Le parole giuste senza un contenuto che le sostenga
                restano solo parole — servono entrambi insieme.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Traffico che converte</h3>
              <p>
                L'obiettivo non è il traffico in sé, ma quello che porta
                davvero a un contatto o una vendita.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Una strategia, più leve</h3>
              <p>
                Le stesse parole chiave guidano SEO, contenuti e campagne
                — non tre strategie scollegate tra loro.
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
                Un punto di partenza,<br /><em>non un punto d'arrivo.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            L'analisi delle parole chiave non è un documento che si
            consegna e si archivia: è la base su cui costruiamo insieme
            le pagine di consulenza SEO e marketing che vedi qui sotto —
            ognuna pensata per una parte diversa dello stesso percorso.
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
