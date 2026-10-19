<?php
/* Prima pagina della categoria "Web site" — stesso impianto delle pagine
   di "Consulenza strategica" (.service-hero/.service-section/.service-cta,
   vedi i commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "realizzazione-siti-web-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Web site";
$heroTitle = "Realizzazione Siti Web.<br /><em>Bergamo, ma non solo.</em>";
$heroLead = 'Un sito non è un volantino messo online. È la base su cui si
  regge tutto il resto — quello che le persone trovano quando ti
  cercano, e quello che resta <em>dopo</em> che il progetto è
  finito, non solo il giorno del lancio.';
$ctaLine = 'Se è il momento di avere un sito che funziona davvero,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Realizzazione Siti Web Bergamo — eWeb</title>
    <meta
      name="description"
      content="Un sito non è un volantino online: è la base su cui si regge tutto il resto. Lo costruiamo con te, e resta facile da aggiornare anche dopo. eWeb, Bergamo."
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
                Non basta che esista.<br /><em>Deve funzionare.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un sito oggi deve reggere su un telefono prima ancora che su un
            monitor — la maggior parte di chi arriva lo fa da lì. Deve
            caricarsi in fretta, perché ogni secondo in più è qualcuno che
            se ne va prima di aver letto una riga. E deve proteggere chi lo
            visita, non solo esistere.
          </p>
          <p class="body-l reveal">
            Per un’azienda, oggi, è spesso il primo contatto vero con un
            cliente — prima ancora di una telefonata o di un preventivo. Vale
            la pena che sia all’altezza di quello che rappresenta.
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
                Non tutti i siti<br /><em>sono lo stesso sito.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Prima, gli obiettivi</h3>
              <p>
                Più contatti, un servizio migliore per chi ti conosce già, o
                semplicemente esserci: si parte da cosa serve davvero, non
                da un modello preconfezionato.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>I contenuti che hai già</h3>
              <p>
                Testi, foto, materiali: li guardiamo con onestà prima di
                iniziare, perché un sito vale quanto quello che ci metti
                dentro.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Il tipo di sito giusto</h3>
              <p>
                Vetrina, e-commerce, portale, landing page — la forma segue
                quello che deve succedere, non il contrario.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Chi lo aggiorna, dopo</h3>
              <p>
                Un pannello semplice, pensato perché tu possa cambiare un
                testo o una foto da solo, senza chiamarci ogni volta.
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
                Un pannello pensato per te,<br /><em>non per noi.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Lavoriamo con un gestionale nostro invece che con soluzioni
            preconfezionate: non perché le altre non vadano bene, ma perché
            preferiamo costruire qualcosa su misura — più semplice da capire
            al primo utilizzo, senza plugin da tenere aggiornati o corsi da
            seguire per cambiare una pagina. Resta tuo, e resta facile da
            usare anche tra un anno.
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
