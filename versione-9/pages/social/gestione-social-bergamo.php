<?php
/* Prima pagina della nuova categoria "Social" — stesso impianto delle
   altre pagine di servizio (.service-hero/.service-section/.service-cta,
   vedi i commenti in style.css e inc/header.php). Nuova categoria: vedi i
   due blocchi aggiunti in .htaccess per "pages/social/". */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "gestione-social-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Social";
$heroTitle = "Social.<br /><em>Non un post ogni tanto, una strategia.</em>";
$heroLead = 'Pubblicare quando viene in mente non porta risultati — serve
  sapere chi vuoi raggiungere, su quali canali, e cosa deve succedere
  dopo che ti ha visto. Partiamo da lì, non dalla grafica del primo post.';
$ctaLine = 'Se i tuoi social vivono di pubblicazioni sparse, senza un
  piano, <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestione Social Bergamo — eWeb</title>
    <meta
      name="description"
      content="Strategia social su misura: analisi, buyer persona, piano editoriale e monitoraggio dei risultati. eWeb, Bergamo."
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
                Essere presenti<br /><em>non basta più.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Aprire un profilo su ogni piattaforma e pubblicare quando c'è
            tempo non è una strategia — è presenza senza direzione. I
            social funzionano quando c'è un piano dietro: a chi parli, su
            quali canali, con quale tono, verso quale obiettivo.
          </p>
          <p class="body-l reveal">
            Non tutti i canali servono a tutti: Facebook, Instagram,
            LinkedIn, X, Pinterest, YouTube e TikTok parlano a pubblici e
            con linguaggi diversi — la scelta conta più della presenza
            su tutti contemporaneamente.
          </p>
        </div>
      </section>

      <!-- ============ COME LAVORIAMO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Come lavoriamo</span>
              <h2 class="h2 reveal-lines">
                Prima l'analisi,<br /><em>poi il contenuto.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Analisi e obiettivi</h3>
              <p>
                Punti di forza e debolezza, obiettivi concreti e
                misurabili — non "più engagement" senza un numero dietro.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Chi stai cercando</h3>
              <p>
                Buyer persona definite, per calibrare tono di voce e
                contenuti su chi deve davvero leggerli.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Piano editoriale</h3>
              <p>
                Un funnel che accompagna, non vende dal primo contatto —
                coerente con l'identità del brand in ogni post.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Copy e grafica</h3>
              <p>
                Scritti e disegnati da chi lo fa di professione, non
                improvvisati per riempire il calendario.
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
                Si corregge in corsa,<br /><em>non a fine anno.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Monitoriamo gli indicatori che contano per i tuoi obiettivi, e
            correggiamo la strategia mentre è in corso — non aspettiamo
            un report annuale per scoprire cosa non ha funzionato. Report
            periodici ti dicono come il pubblico sta rispondendo, non
            solo quanti like ha raccolto l'ultimo post.
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
