<?php
/* Seconda pagina della categoria "Web site" — stesso impianto delle altre
   pagine di servizio (.service-hero/.service-section/.service-cta, vedi i
   commenti in style.css e inc/header.php). */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "web-design-bergamo"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Web site";
$heroTitle = "Web Design.<br /><em>Fatto su misura, non scelto da un catalogo.</em>";
$heroLead = 'Non partiamo da un template da riempire con il tuo logo. Disegniamo
  da zero, sul gusto di chi lo userà davvero — perché un sito che
  assomiglia a cento altri non racconta niente di chi lo ha fatto.';
$ctaLine = 'Se vuoi un sito che assomiglia a te e non a un template,
  <em>parliamone insieme.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Web Design Bergamo — eWeb</title>
    <meta
      name="description"
      content="Non partiamo da un template da riempire: disegniamo da zero, sul gusto di chi lo userà davvero. Web design di eWeb, Bergamo."
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
                Un template si riempie.<br /><em>Un design si pensa.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Le piattaforme "a pochi clic" fanno comodo, ma quasi sempre
            significano scegliere tra un numero limitato di modelli già
            visti — e pagare un extra per ogni piccola personalizzazione
            che vorresti davvero. Il risultato somiglia a tanti altri siti,
            perché in fondo nasce dalla stessa base.
          </p>
          <p class="body-l reveal">
            Un design pensato da zero parte invece da te: cosa vuoi
            comunicare, come vuoi essere percepito, cosa deve restare in
            mente a chi ti visita. Non è un vezzo estetico — è la differenza
            tra esserci e farsi notare.
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
                Ogni dettaglio,<br /><em>una scelta — non un caso.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Dal tuo gusto, non dal nostro</h3>
              <p>
                Partiamo da come ti riconosci, non da uno stile che
                ripetiamo uguale per tutti i clienti.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Mobile first</h3>
              <p>
                Pensato prima per lo schermo piccolo, dove arriva la
                maggior parte di chi ti visita — non adattato dopo, a forza.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Dettagli che si notano</h3>
              <p>
                Animazioni, micro-interazioni, un tono visivo coerente —
                dove hanno senso, mai per riempire spazio.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Bello e anche utile</h3>
              <p>
                Un design che colpisce ma resta facile da usare: l’impatto
                non vale niente se poi non si trova quello che si cercava.
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
                Un sito che si riconosce,<br /><em>non uno che si confonde.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Chi arriva capisce subito chi sei, senza doverlo dedurre da un
            layout generico. E resta — perché un design curato si vede, e si
            sente la differenza tra un sito fatto apposta per te e uno
            adattato da un modello pensato per nessuno in particolare.
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
