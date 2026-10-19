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
          <?php if ($autore): ?>
            <p class="eyebrow eyebrow--muted reveal">di <?php echo htmlspecialchars($autore); ?></p>
          <?php endif; ?>
          <?php foreach ($paragrafi as $p): ?>
            <p class="body-l reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-4" class="link">← Numero 04 del Magazine</a>
          </p>
        </div>
      </section>
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
