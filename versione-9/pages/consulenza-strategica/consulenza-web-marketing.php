<?php
/* Prima "pagina interna" (di servizio) del sito, dopo la sola home finora
   esistente — vedi i commenti in custom/css/style.css ("Pagina interna
   (servizi)") e in inc/header.php ($menuBase) per le convenzioni pensate
   qui e da riusare per le prossime pagine dello stesso tipo. */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina
$currentSlug = "consulenza-web-marketing"; // usato da inc/related.php

// Variabili per inc/service-hero.php e inc/service-cta.php (vedi lì).
$heroCategory = "Consulenza strategica";
$heroTitle = "Consulenza Web Marketing.<br /><em>Non improvvisiamo, ragioniamo.</em>";
$heroLead = 'Non ti vendiamo una strategia preconfezionata. Ascoltiamo cosa
  vuoi ottenere, guardiamo con onestà dove sei oggi, e costruiamo
  insieme la strada più sensata per arrivarci — <em>un passo alla
  volta</em>, non con un pacchetto preimpostato uguale per tutti.';
$ctaLine = 'Se questo è il ragionamento che stavi cercando,
  <em>non aspettare che lo faccia qualcun altro al posto tuo.</em>';
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Consulenza Web Marketing — eWeb</title>
    <meta
      name="description"
      content="Non vendiamo pacchetti preconfezionati: ascoltiamo dove sei, ragioniamo insieme sulla strategia più sensata e la mettiamo in pratica. Consulenza web marketing di eWeb, Bergamo."
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

      <!-- ============ PERCHÉ CONTA ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Il contesto</span>
              <h2 class="h2 reveal-lines">
                Il web non è un canale.<br /><em>È la piazza.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Da anni il web è il primo posto dove le persone si informano,
            confrontano, decidono — non uno dei tanti. Google, i social, le
            newsletter, le testate online, blog e forum: sono le strade da
            cui oggi passa chi potrebbe diventare un tuo cliente, nell’ordine
            in cui più spesso ci si passa davvero.
          </p>
          <p class="body-l reveal">
            Il marketing è tutto ciò che prepara il terreno alla vendita. Il
            web marketing è usare queste strade con criterio, invece di
            lasciare che sia il caso a decidere chi ti trova e chi no. E
            proprio perché il panorama cambia in continuazione, serve
            qualcuno che lo osservi davvero, non che applichi una formula
            fissa da un anno all’altro.
          </p>
        </div>
      </section>

      <!-- ============ COSA METTIAMO IN CAMPO ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Il metodo</span>
              <h2 class="h2 reveal-lines">
                Strumenti diversi,<br /><em>un’unica regia.</em>
              </h2>
            </div>
          </div>
          <div class="service-section__grid">
            <div class="service-section__item reveal">
              <h3>Posizionamento organico su Google</h3>
              <p>
                Essere trovati da chi sta già cercando quello che offri,
                senza pagare per ogni clic.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Email marketing</h3>
              <p>
                Restare nel radar di chi ti conosce già, con contenuti che
                hanno un motivo per essere aperti.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Social media marketing</h3>
              <p>
                Presenza coerente, non rincorsa alle mode: dove ha senso
                esserci, e per dire cosa.
              </p>
            </div>
            <div class="service-section__item reveal">
              <h3>Content marketing</h3>
              <p>
                Contenuti pensati per chi li legge prima ancora che per
                l’algoritmo che li distribuisce.
              </p>
            </div>
          </div>
          <p class="body-l reveal" style="margin-top: clamp(40px, 5vw, 64px)">
            Non li vendiamo uno alla volta come voci di un listino: li
            combiniamo in un piano pensato sul tuo caso specifico, con i
            canali che hanno davvero senso per te — non tutti quelli
            possibili.
          </p>
        </div>
      </section>

      <!-- ============ COSA OTTIENI ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Cosa cambia, in concreto</span>
              <h2 class="h2 reveal-lines">
                Lo vediamo insieme,<br /><em>lo misuriamo insieme.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Più persone realmente interessate trovano la strada verso di te,
            non solo più traffico. La tua presenza online diventa
            riconoscibile — su Google come altrove — invece di passare
            inosservata mentre chi ti somiglia si fa notare al posto tuo. E
            ogni euro investito resta tracciabile: si vede cosa sta
            funzionando, e si corregge quello che non lo fa, senza aspettare
            il bilancio di fine anno.
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
