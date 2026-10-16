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
$heroTitle = 'Numero 05.<br /><em>6 articoli, raccolti qui.</em>';
$heroLead = 'La newsletter di eWeb, numero per numero — qui sotto gli
  articoli di questa uscita, in ordine.';

// Contenuto reale di questo numero (titolo/teaser/autore quando presente),
// recuperato dal sito storico — vedi commento sopra. "href" punta ancora
// all'articolo completo là, non è un placeholder.
$articoli = [
  ["title" => 'Testi, foto, video e niente AI: come COMUNICA eWeb', "teaser" => 'Non c’è un modo solo di comunicare. Lo abbiamo sperimentato e lo vediamo ogni giorno.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/come-comunichiamo/'],
  ["title" => 'Mettiamo le mani nel DB, sempre', "teaser" => 'Partiamo dall’inizio, l’acronimo DB sta per Database.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/developer-per-passione/'],
  ["title" => 'Il Piano Editoriale ti salva la faccia (e non solo)', "teaser" => 'Quando si stende un piano di comunicazione, il primo passo è decidere quando affrontare un argomento e contestualizzarne la pubblicazione rispetto agli altri spunti che caratterizzano il progetto.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/piano-editoriale-in-soccorso/'],
  ["title" => 'Vincono le risposte, parliamo di FAQ', "teaser" => 'In un mondo dell’informazione digitale che sempre di più si sbilancia verso i motori di ricerca, con le relative regole che diventano quindi mandatorie, la produzione dei contenuti non può non tener conto di quanto i discorsi vengano messi costantemente in primo piano.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/vincono-le-risposte/'],
  ["title" => 'Perché dovrei affidarmi ad un’agenzia?', "teaser" => 'Da quando lavoro in eWeb in tantissimi (soprattutto miei ex colleghi) mi chiedono: “ma che cosa fate di così speciale? I social dell’azienda di mio marito/cugino/zio li gestisce mio figlio/nipote, ect… anche il sito glie l’ha fatto lui! Perché venire da voi?”', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/affidati-a-una-agenzia-di-valore/'],
  ["title" => 'Comunicazione Video eWeb', "teaser" => 'Ciascuna delle nostre aziende ha la necessità di comunicare. I canali ed i linguaggi attraverso i quali può farlo sono molteplici. In questo articolo ci concentriamo sull’utilizzo dei video.', "author" => null, "href" => 'https://www.ewebsolution.it/magazine/comunicare-con-video/'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Magazine #05 — eWeb</title>
    <meta
      name="description"
      content='Il numero 05 della newsletter eWeb: si apre con «Testi, foto, video e niente AI: come COMUNICA eWeb», e altri 5 articoli.'
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
    <script src="<?php echo BASE_URL; ?>/custom/functions/script.js"></script>
  </body>
</html>
