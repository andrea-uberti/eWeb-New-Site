<?php
/* Seconda pagina di servizio, stessa categoria "Consulenza strategica" di
   consulenza-web-marketing.php (stesso impianto: .service-hero/.service-
   section/.service-cta, vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "campagne-lead-generation"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Consulenza strategica";
$heroTitle = "Campagne Lead Generation.<br /><em>Contatti veri, non numeri in una lista.</em>";
$heroLead = 'Portare traffico su un sito non basta, se poi quel traffico se ne
  va senza lasciare nulla. Costruiamo il percorso che serve perché
  chi ti scopre diventi un contatto vero — <em>e resti tale nel
  tempo</em>, non solo un indirizzo in più in una lista.';
$ctaLine = 'Se preferisci contatti veri a una lista più lunga,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Campagne Lead Generation — eWeb</title>
    <meta
      name="description"
      content="Non inseguiamo numeri in una lista: costruiamo un percorso che trasforma chi ti scopre in un contatto vero, e lo coltiva nel tempo. Lead generation di eWeb, Bergamo."
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
                Un visitatore non è<br /><em>ancora un contatto.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            La lead generation è questo: raccogliere, con onestà, i dati di
            chi mostra un interesse reale — di solito un’email — in cambio di
            qualcosa che vale davvero la pena lasciare in cambio. Non un
            modulo piazzato a caso sperando che qualcuno lo compili.
          </p>
          <p class="body-l reveal">
            Ma il contatto raccolto è solo l’inizio. Il lavoro vero comincia
            dopo: mantenere la relazione, accompagnarla, farla crescere fino
            a quando — se ha senso per entrambi — diventa qualcosa di più.
          </p>
        </div>
      </section>

      <!-- ============ IL METODO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Il metodo</span>
              <h2 class="h2 reveal-lines">
                Coltivare un contatto<br /><em>è un lavoro, non un clic.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Un motivo vero per lasciare un contatto</h3>
              <p>
                Una guida, un webinar, una risorsa che risolve un problema
                concreto — non un pop-up messo lì per principio.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Segmentazione</h3>
              <p>
                Non tutti i contatti si somigliano: parliamo a ciascuno di
                quello che gli interessa davvero, non di tutto a tutti.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Nurturing</h3>
              <p>
                Comunicazione costante, su più canali, che costruisce fiducia
                invece di consumarla con messaggi fuori tempo.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Un funnel che si vede</h3>
              <p>
                Un percorso tracciabile dal primo contatto alla decisione,
                non una scatola nera di cui fidarsi alla cieca.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- ============ COSA OTTIENI ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa cambia, in concreto</span>
              <h2 class="h2 reveal-lines">
                Meno contatti,<br /><em>ma quelli giusti.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Una lista profilata vale più di una lunga e generica: più
            probabilità reali di conversione, meno tempo perso a inseguire
            chi non era mai davvero interessato. E ogni passaggio del
            percorso resta misurabile — si vede dove funziona, e si
            corregge dove no, invece di scoprirlo a consuntivo.
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
