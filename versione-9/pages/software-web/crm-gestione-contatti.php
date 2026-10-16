<?php
/* Seconda pagina della categoria "Software Web" — stesso impianto delle
   altre pagine di servizio (.service-hero/.service-section/.service-cta,
   vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "crm-gestione-contatti"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Software Web";
$heroTitle = "CRM.<br /><em>Cuciti sui tuoi clienti, non sul mercato.</em>";
$heroLead = 'Un database solo, non tre fogli e una memoria che tradisce.
  Appuntamenti, preventivi, campagne, contratti — tutto dove dovrebbe
  essere, e pensato sul modo in cui lavori tu, non su quello di
  un\'azienda che non conosci.';
$ctaLine = 'Se i contatti dei tuoi clienti vivono ancora in posti diversi,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRM Gestione Contatti — eWeb</title>
    <meta
      name="description"
      content="Un CRM su misura, non un pacchetto standard: pensato sul modo in cui lavori tu, accessibile da browser. CRM gestione contatti di eWeb, Bergamo."
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
                Un cliente, tre fogli diversi.<br /><em>Nessuno aggiornato.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            I CRM "pronti all'uso" si comprano online in pochi clic, ma
            portano con sé un modo di lavorare che non è il tuo: campi che
            non userai mai, altri che ti mancano, un processo pensato per
            un settore diverso. Il risultato è uno strumento che si usa a
            metà, perché l'altra metà continua a vivere su un foglio
            Excel o nella testa di chi segue quel cliente.
          </p>
          <p class="body-l reveal">
            Un CRM costruito su misura parte da come segui davvero i tuoi
            clienti oggi — e mette in un unico posto quello che adesso è
            sparso in tre.
          </p>
        </div>
      </section>

      <!-- ============ COSA CI METTI DENTRO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa ci metti dentro</span>
              <h2 class="h2 reveal-lines">
                Dal primo contatto<br /><em>al contratto firmato.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Anagrafica unica</h3>
              <p>
                Tutti i dati dei clienti in un solo database, invece che
                sparsi tra email, rubriche e fogli diversi.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Appuntamenti e campagne</h3>
              <p>
                Email pianificate, appuntamenti tracciati, campagne
                monitorate con i loro report — senza rincorrerli a mano.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Preventivi e contratti</h3>
              <p>
                Si creano, si allegano, si ritrovano — nello stesso posto
                dove è nato il contatto che li ha generati.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Lavoro condiviso</h3>
              <p>
                Collaboratori esterni compresi: ognuno vede quello che gli
                serve, senza passarsi file a mano.
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
                Cresce con te,<br /><em>non con il mercato.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Accessibile da browser, senza installazioni, e pensato per
            crescere quando serve: magazzino, presenze, ticketing — moduli
            che si aggiungono quando il bisogno è reale, non tutti insieme
            al primo giorno. Più di dieci anni di software costruiti così
            ci hanno insegnato che un CRM che si adatta a te dura più a
            lungo di uno a cui devi adattarti tu.
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
