<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 4. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/funnel-e-lead/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/funnel-e-lead
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-4/, vedi .htaccess), file fisico in
   magazine/articoli/ (due livelli sotto radice, come pages/<categoria>/).
   Percorsi assoluti da BASE_URL per CSS/JS/favicon (non relativi): stesso
   motivo di magazine.php e magazine/educational-N.php, l'URL pubblico ha
   due segmenti quindi un percorso relativo risolverebbe un livello troppo
   in profondità. */
require __DIR__ . "/../../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home

// Variabili per inc/service-hero.php (vedi lì) — riusato come hero
// generico, come in magazine.php/magazine/educational-N.php.
$heroCategory = "Magazine — Numero 04";
$heroTitle = 'Funnel e Lead, due facce della comunicazione';
$heroLead = 'Dal numero 04 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Ci sono tante strade per arrivare a nuovi clienti. Prima sono solo contatti, poi diventano potenziali interessati e alla fine, si spera, diventano un nuovo punto di riferimento per la vendita e l’erogazione di prodotti e/o servizi. Funnel e Lead sono due termini che si sentono spesso quando si parla di strategie di marketing, probabilmente molti non sanno di cosa si tratta e nemmeno perché è importante considerare entrambi nel percorso verso nuovi clienti. Uno è il mezzo, l’altro il fine ma, esattamente, cosa è un Funnel? E di cosa parliamo quando si ragiona su un Lead?',
  'Due facce della stessa medaglia.',
  'Il Funnel, letteralmente “imbuto”, è quel percorso verso cui convogliare gli utenti interessati ad un prodotto o un servizio partendo dal pubblico generico e scremando, passo dopo passo, chi non è in target. L’esempio più semplice da fare è quello legato alle DEM – Direct Email Marketing. Ho un prodotto che può interessare ad una certa categoria di professionisti, invio la prima mail a 100 contatti e di questi ce ne sono 60 che la aprono e 10 che cliccano sulla CTA – Call To Action “Scopri di più”. A quei 60 si manda una seconda mail ancora più dettagliata per invogliarsi a cliccare, quei 10 che hanno già cliccato troveranno conferme della propria azione (interessata) con il secondo invio. Dopo il secondo invio, di quei 60 ce ne sono 50 che aprono e 30 che cliccano: la forbice tra aperture e clic si riduce, il Funnel si chiude con una terza mail per quei 50 con qualcosa di ancora più diretto e specifico: in 40 aprono l’ultima mail e in 35 cliccano. Quei 35 sono il risultato del nostro Funnel.',
  'Per spiegare cosa sono i Lead, partiamo proprio dalla coda del Funnel precedente che ha portato 35 persone a cliccare su “Scopri di più”. Fino a quel momento, la comunicazione è ad una sola via: l’azienda propone e descrive, i potenziali clienti leggono e cliccano per scoprire di più. Quei contatti diventano dei Lead nel momento in cui manifestano la volontà di avere nuove informazioni, approfondire la conoscenza del prodotto o del servizio e creare un filo diretto con l’azienda proponente. Il Lead può essere più o meno caldo in base a quello che viene chiesto in quello “Scopri di più”, può esserci un form da compilare oppure la possibilità di aggiungere un contatto telefonico. L’aspetto più importante riguarda la volontà di andare avanti nello scambio di informazioni. Trasformare un Lead in un cliente è normalmente attività della parte commerciale di un’azienda e il lavoro di comunicazione dell’agenzia è orientato e concentrato sulla raccolta e ricerca dei contatti “caldi” che possono trasformarsi in qualcosa di importante e prezioso per l’azienda.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'sito-custom-vantaggi', "title" => 'Non siamo contro Wordpress, siamo per il cliente', "teaser" => '“Ah, ma fate i siti? Anche voi con Wordpress? Perché ho sentito che parlano tutti di Wordpress”. No, noi non facciamo siti.'],
  ["slug" => 'php-linguaggio-programmazione-eweb', "title" => 'Scriviamo codice, niente PLUG-IN. Ed è tutto VOSTRO', "teaser" => 'Nelle precedenti comunicazioni, credo si sia intuito che non utilizziamo (e non amiamo molto) i CMS commerciali, anche se c’è un rispetto di fondo per il prodotto in sé, e per chi ha scelto di proporlo e/o utilizzarlo.'],
  ["slug" => 'intento-di-ricerca-llm', "title" => 'La sfida è negli intenti, non solo nelle keyword', "teaser" => 'Il 2026 sta tracciando un solco netto rispetto al passato: la ricerca online non è più una scansione di parole chiave, ma una conversazione stratificata'],
  ["slug" => 'differenze-app-webapp', "title" => 'APP NATIVE o WEB APP: che differenza c’è e quale scegliere?', "teaser" => 'È noto che la maggior parte di noi utilizza internet tramite il proprio cellulare, ovvero da mobile. E ciò si riferisce ormai a tutte le tipologie di utenti, non più solo i privati, ma anche in larga parte i professionisti, ovvero il traffico B2B tra aziende.'],
  ["slug" => 'strategia-ads-google-meta', "title" => 'La dualità della domanda: spingere o attrarre', "teaser" => 'Nel marketing digitale del 2026, la distinzione tra Google ads e Meta ads non riguarda i costi di piattaforma, ma il presidio delle diverse fasi d\'acquisto.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Funnel e Lead, due facce della comunicazione — Magazine eWeb</title>
    <meta
      name="description"
      content='Ci sono tante strade per arrivare a nuovi clienti. Prima sono solo contatti, poi diventano potenziali interessati e alla fine, si spera, diventano un nuovo p...'
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

    <?php include __DIR__ . "/../../inc/header.php"; ?>

    <main id="top">
      <?php include __DIR__ . "/../../inc/service-hero.php"; ?>

      <!-- ============ ARTICOLO ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="article__meta reveal">
            <span>Numero 04</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-4" class="link">← Numero 04 del Magazine</a>
          </p>
        </div>
      </section>

      <?php if ($altriArticoli): ?>
        <!-- ============ ALTRI ARTICOLI DI QUESTO NUMERO ============ -->
        <section class="service-section service-section--dark" data-theme="dark">
          <div class="container">
            <div class="service-section__head">
              <div class="service-section__head-text">
                <span class="eyebrow eyebrow--muted">Dallo stesso numero</span>
                <h2 class="h2 reveal-lines">
                  Leggi anche<br /><em>gli altri articoli.</em>
                </h2>
              </div>
            </div>
            <ul class="service-related__list">
              <?php foreach ($altriArticoli as $i => $alt): ?>
                <li class="reveal">
                  <a
                    class="service-related__link"
                    href="<?php echo BASE_URL . "/magazine/" . $alt["slug"]; ?>"
                  >
                    <span class="service-related__link-num"><?php echo str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></span>
                    <span class="service-related__link-body">
                      <span class="service-related__link-text"><?php echo htmlspecialchars($alt["title"]); ?></span>
                      <span class="service-related__link-teaser"><?php echo htmlspecialchars($alt["teaser"]); ?></span>
                    </span>
                    <span class="btn__arrow">→</span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endif; ?>
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
    <script src="<?php echo BASE_URL; ?>/custom/functions/script.js"></script>
  </body>
</html>
