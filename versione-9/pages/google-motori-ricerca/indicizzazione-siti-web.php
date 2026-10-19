<?php
/* Pagina della categoria "Google e motori di ricerca" — stesso impianto
   delle altre pagine di servizio (.service-hero/.service-section/
   .service-cta, vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "indicizzazione-siti-web"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Google e motori di ricerca";
$heroTitle = "Indicizzazione.<br /><em>Prima di essere trovati, bisogna esserci.</em>";
$heroLead = 'Un sito online non significa un sito che Google conosce.
  Prima di parlare di posizioni e classifiche, c\'è un passaggio più
  semplice e spesso dimenticato: farsi leggere e capire dai motori di
  ricerca.';
$ctaLine = 'Se non sai se il tuo sito è davvero indicizzato,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Indicizzazione Siti Web — eWeb</title>
    <meta
      name="description"
      content="Prima di posizionarsi, un sito va indicizzato: analisi keyword, strategia e report di monitoraggio. eWeb, Bergamo."
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
                Online non vuol dire<br /><em>trovabile.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un sito pubblicato esiste per chi conosce già l'indirizzo —
            non per chi lo starebbe cercando senza saperlo. Perché un
            motore di ricerca lo proponga, deve prima leggerlo, capirlo e
            inserirlo nel suo indice: questo è indicizzare, e viene prima
            di qualsiasi discorso sul posizionarsi in alto.
          </p>
          <p class="body-l reveal">
            C'è anche una scorciatoia a pagamento, Google Ads, per
            comparire mentre il lavoro organico matura — ma resta
            un'alternativa da valutare, non un sostituto.
          </p>
        </div>
      </section>

      <!-- ============ COME CI ARRIVIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Come ci arriviamo</span>
              <h2 class="h2 reveal-lines">
                Né troppo generico,<br /><em>né troppo di nicchia.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Ricerca keyword</h3>
              <p>
                Le parole che useresti per cercarti da solo spesso non
                sono quelle che usano davvero i tuoi clienti.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Analisi della concorrenza</h3>
              <p>
                Guardare chi occupa già quello spazio aiuta a capire dove
                c'è margine reale, non immaginato.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Strumenti di misura</h3>
              <p>
                Dati reali di traffico e comportamento, non intuizioni —
                la base per ogni decisione successiva.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Tempi definiti</h3>
              <p>
                Una strategia con una scadenza da verificare, non un
                lavoro che si trascina senza un punto di controllo.
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
                Indicizzato non vuol dire<br /><em>in prima pagina.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Una keyword indicizzata ma in posizioni basse esiste per
            Google, ma non porta clic — per questo leggiamo insieme i
            report, non li consegniamo e basta. L'indicizzazione è la
            base: il passo dopo, il posizionamento, è un lavoro a sé,
            che trovi nella pagina dedicata qui sotto.
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
