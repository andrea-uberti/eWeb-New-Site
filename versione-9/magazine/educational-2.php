<?php
/* Pagina di un singolo numero del Magazine (newsletter eWeb) — non una
   pagina di servizio (niente service-cta/related.php, stesso principio di
   ../magazine.php). Contenuto reale (titoli/teaser/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/scopri/...) l'articolo completo di
   ciascuna voce resta però SOLO là per ora (non migrato): ogni link della
   lista qui sotto apre il sito storico in un'altra scheda, di proposito.
   URL vecchio non mantenuto (l'utente ha detto esplicitamente di non
   curarsene): qui tutti i numeri vivono sotto /magazine/educational-N,
   indipendentemente da come si chiamavano sul sito storico
   (magazine-1/2/3, edicational-4, educational-5/6 — incoerenza che non
   riprendiamo). */
require __DIR__ . "/../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home

// Variabili per inc/service-hero.php (vedi lì) — riusato come hero
// generico, come in ../magazine.php.
$heroCategory = "Magazine";
$heroTitle = 'Numero 02.<br /><em>5 articoli, raccolti qui.</em>';
$heroLead = 'La newsletter di eWeb, numero per numero — qui sotto gli
  articoli di questa uscita, in ordine.';

// Contenuto reale di questo numero (titolo/teaser/autore quando presente),
// recuperato dal sito storico — vedi commento sopra. "href" punta ancora
// all'articolo completo là, non è un placeholder.
$articoli = [
  ["title" => 'Professionisti da oltre 25 anni. Ma sbagliamo anche noi.', "teaser" => 'Non c’è una ricetta certamente e completamente vincente. Non c’è la sicurezza che tutto quanto viene fatto porterà dei risultati da urlo e senza intoppi.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/non-siamo-perfetti/'],
  ["title" => 'Conta di più quello che non si vede: un buon Back-End', "teaser" => 'Argomento tecnico, ma non solo. Quello che sta “dietro le quinte” è spesso la parte più importante, più pragmatica ed al tempo stesso invisibile del lavoro che svolgiamo, ciò che consente di raggiungere ottimi risultati “visivi” e “funzionali” per il pubblico.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/backend-dev/'],
  ["title" => 'Farsi conoscere. Come? Ti aiuta eWeb', "teaser" => 'Il segreto del successo di un’attività, di un servizio o di un prodotto non è nel valore di quanto viene proposto ma nella capacità di far conoscere al più ampio pubblico possibile di quello che si mette sul mercato', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/canali-migliori-comunicazione/'],
  ["title" => 'Dalla SERP all\'AI Mode: la nuova architettura della visibilità digitale', "teaser" => 'Per vent’anni il contratto implicito tra noi e Google è stato chiaro: noi fornivamo i contenuti, il motore forniva l’indicizzazione', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/seo-ai-mode/'],
  ["title" => 'A proteggere e registrare il tuo software ci pensa eWeb!', "teaser" => 'Noi di eWeb ci occupiamo anche della registrazione di un software presso la SIAE.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/registrazione-software/'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Magazine #02 — eWeb</title>
    <meta
      name="description"
      content='Il numero 02 della newsletter eWeb: si apre con «Professionisti da oltre 25 anni. Ma sbagliamo anche noi.», e altri 4 articoli.'
    />
    <meta name="theme-color" content="#044d8b" />

    <!-- Favicon: la graffa del logo ("eWeb}"), colorata in navy — vedi assets/img/favicon.ico/generazione in memoria di progetto. -->
    <link rel="icon" href="<?php echo BASE_URL; ?>/assets/img/favicon.ico" sizes="any" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL; ?>/assets/img/favicon-32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL; ?>/assets/img/favicon-16.png" />
    <link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>/assets/img/apple-touch-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter+Tight:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/custom/css/style.css" />
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

    <?php include __DIR__ . "/../inc/header.php"; ?>

    <main id="top">
      <?php include __DIR__ . "/../inc/service-hero.php"; ?>

      <!-- ============ ARTICOLI DI QUESTO NUMERO ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">In questo numero</span>
              <h2 class="h2 reveal-lines">
                Gli articoli,<br /><em>uno via l'altro.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Ogni articolo completo resta per ora sul sito storico — il link
            apre lì, in un'altra scheda.
          </p>
          <ul class="service-related__list">
            <?php foreach ($articoli as $i => $a): ?>
              <li class="reveal">
                <a
                  class="service-related__link"
                  href="<?php echo htmlspecialchars($a["href"]); ?>"
                  target="_blank"
                  rel="noopener"
                >
                  <span class="service-related__link-num"><?php echo str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></span>
                  <span class="service-related__link-body">
                    <span class="service-related__link-text"><?php echo htmlspecialchars($a["title"]); ?></span>
                    <span class="service-related__link-teaser"><?php echo htmlspecialchars($a["teaser"]); ?><?php echo $a["author"] ? " — di " . htmlspecialchars($a["author"]) : ""; ?></span>
                  </span>
                  <span class="btn__arrow">→</span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine" class="link">← Tutti i numeri</a>
          </p>
        </div>
      </section>
    </main>

    <?php include __DIR__ . "/../inc/footer.php"; ?>

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
    <script src="<?php echo BASE_URL; ?>/custom/functions/script.js"></script>
  </body>
</html>
