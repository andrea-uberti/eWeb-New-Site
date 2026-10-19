<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 1. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/marchio-registrato-con-eweb/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/marchio-registrato-con-eweb
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-1/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 01";
$heroTitle = 'Registrazione marchio: il valore della tutela (e come ottenerla per il tuo brand)';
$heroLead = 'Dal numero 01 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = 'Federica Ferranti';
$paragrafi = [
  'Probabilmente non tutti lo sanno ma, con provvedimento del Ministero delle Imprese e del Made in Italy del 26/02/2025, il marchio eWeb srl risulta registrato su tutto il territorio nazionale.',
  'La registrazione dura 10 anni dalla data del deposito, che nel nostro caso è del 03/07/2024.',
  'Si, hai letto bene: noi di eWeb ci occupiamo anche di questo, ovvero di proteggere il nostro marchio e possiamo fare lo stesso anche per il vostro!',
  'Sebbene non ci siano obblighi di legge che lo impongano, la registrazione garantisce al titolare un diritto di esclusiva sull’utilizzo del marchio e il conseguente diritto di vietare a terzi l’utilizzo non autorizzato di un marchio identico e/o simile al proprio per prodotti e/o servizi identici e/o affini.',
  'Questo diritto è riconosciuto e sancito dal codice civile e dal codice penale, i quali assicurano la tutela al marchio registrato e prevedono pene e sanzioni per chi si appropria di un marchio altrui, purché esso sia registrato. Questa è la chiave di tutto, questo è il valore reale e concreto che sta dentro alla registrazione.',
  'L’art. 20 del Codice della Proprietà Industriale conferisce al titolare di un marchio registrato il diritto di vietare a terzi l’utilizzo di un segno identico al proprio marchio per prodotti o servizi identici ovvero di un segno identico o simile per prodotti o servizi identici o affini nel caso in cui vi sia un rischio di confusione per il pubblico.',
  'È presente una corposa giurisprudenza (talvolta anche contrastante) in materia e tutta si fonda su un concetto cardine che non va mai dimenticato: per poter richiedere la rimozione di una pubblicità per utilizzo di marchio altrui, quel marchio deve essere registrato.',
  'Registrare un marchio, inoltre, ha un’importanza strategica non indifferente, accresce infatti la reputazione on line e off line ma fa anche molto di più: credeteci, ci si sente davvero fighi con quel simbolino ® vicino al proprio marchio. L’autostima è molto importante.',
  'La registrazione di un marchio può essere richiesta per l’Italia oppure per tutto il territorio Europeo (o anche extra UE). Si inizia da quella italiana per poi richiedere l’estensione per tutto il continente. Noi di eWeb ci occupiamo di tutto: procediamo alle verifiche preliminari, alla ricerca delle classi, alle incombenze burocratiche e al deposito del vostro marchio, una volta ottenuta la registrazione questa vale 10 anni e può essere rinnovata all’infinito!',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'perche-abbiamo-smesso', "title" => 'Perché abbiamo smesso di comunicare. E adesso riprendiamo.', "teaser" => 'Comunicare significa far conoscere agli altri il tuo approccio, il tuo punto di vista rispetto ad un argomento ben...'],
  ["slug" => 'progettare-bene-lavorare-meglio', "title" => 'Progettare bene per lavorare meglio', "teaser" => 'La parte di progettazione, di analisi, il tempo dedicato ad ascoltare il cliente è la parte che preferisco. In eWeb viene da ...'],
  ["slug" => 'competenze-dati-soluzioni', "title" => 'Il segreto non è essere bravi, ma farlo sapere', "teaser" => 'Essere bravi non basta, bisogna farlo sapere. Nell\'era del rumore e dell\'effetto "wow", noi rifiutiamo le scorciatoie. La nostra forza...'],
  ["slug" => 'google-seo-geo-eweb', "title" => 'Google ha cambiato le regole. La nostra strategia è pronta', "teaser" => 'Per anni, il nostro obiettivo è stato chiaro: conquistare la prima posizione su Google. La pagina con i "dieci link blu" era il...'],
  ["slug" => 'ai-bolla-o-futuro', "title" => 'L’AI è una bolla o la chiave per il futuro?', "teaser" => 'CAP. 1 - Ma è corretto o fuorviante chiamarla intelligenza?'],
  ["slug" => 'novembre-da-non-perdere', "title" => 'Prendi il calendario, ci sono scadenze che non puoi mancare!', "teaser" => 'Novembre, la fine dell\'anno è vicina ma si pensa già al futuro. Ai prossimi mesi. Attenzione, però: segna bene tutto quello che può...'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrazione marchio: il valore della tutela (e come ottenerla per il tuo brand) — Magazine eWeb</title>
    <meta
      name="description"
      content='Il tuo marchio è davvero tuo? La registrazione garantisce l\'esclusiva e la tutela legale. Scopri il valore strategico (e il simbolo ®) e...'
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
            <span>Numero 01</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-1" class="link">← Numero 01 del Magazine</a>
          </p>
        </div>
      </section>

      <?php include __DIR__ . "/../../inc/magazine-related.php"; ?>

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
    <script src="<?php echo BASE_URL; ?>/custom/functions/script.js"></script>
  </body>
</html>
