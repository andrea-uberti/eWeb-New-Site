<?php
/* Prima pagina della nuova categoria "Email Marketing" — stesso impianto
   delle altre pagine di servizio (.service-hero/.service-section/
   .service-cta, vedi i commenti in style.css e inc/header.php). Nuova
   categoria: vedi i due blocchi aggiunti in .htaccess per
   "pages/email-marketing/". */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "direct-email-marketing"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Email Marketing";
$heroTitle = "Email.<br /><em>Vecchia solo se la usi male.</em>";
$heroLead = 'Ancora oggi è uno degli strumenti che misuri meglio: sai chi
  apre, chi clicca, chi non legge più. La differenza tra una mail che
  funziona e una che finisce nello spam sta quasi sempre in quello che
  c\'è prima dell\'invio, non nel bottone "invia".';
$ctaLine = 'Se le tue mail oggi partono senza una strategia dietro,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Direct Email Marketing — eWeb</title>
    <meta
      name="description"
      content="Campagne di email marketing pianificate: target, database, contenuti e report su aperture e conversioni. eWeb, Bergamo."
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
                "Le newsletter<br /><em>non le legge più nessuno"?</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Si dice spesso, ma i numeri raccontano un'altra storia: resta
            uno dei canali più semplici e strategici per arrivare a chi ti
            conosce già. La differenza tra DEM (messaggi commerciali
            diretti a una lista) e newsletter (contenuti più editoriali)
            conta — ognuna ha un obiettivo e un tono diversi.
          </p>
          <p class="body-l reveal">
            E con automazioni ben pensate, l'email non è solo un messaggio
            spedito: è un flusso che accompagna chi la riceve verso un
            contatto, un acquisto, una fidelizzazione reale.
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
                Una campagna pianificata,<br /><em>non un invio improvvisato.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Target e frequenza</h3>
              <p>
                A chi scrivere e quante volte — troppo spesso stanca,
                troppo raramente si dimentica di te.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Database conforme</h3>
              <p>
                Creato o gestito nel rispetto del GDPR, non una lista
                raccolta senza criterio e senza consenso.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Contenuti e grafica</h3>
              <p>
                Pensati per essere letti, non solo inviati — e integrati
                con il tuo CMS o CRM quando serve.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Report che contano</h3>
              <p>
                Aperture, click, conversioni — i dati che dicono se la
                campagna ha funzionato, non solo se è partita.
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
                Finire nello spam<br /><em>si evita, non si subisce.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            La deliverability — far arrivare davvero la mail in casella,
            non tra la posta indesiderata — dipende da scelte tecniche e
            di contenuto che si fanno prima dell'invio, non dopo. È il
            genere di dettaglio che fa la differenza tra una campagna con
            un buon ROI e una che parla al vuoto.
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
