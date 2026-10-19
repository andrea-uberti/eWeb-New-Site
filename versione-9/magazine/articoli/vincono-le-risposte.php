<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 5. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/vincono-le-risposte/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/vincono-le-risposte
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-5/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 05";
$heroTitle = 'Vincono le risposte, parliamo di FAQ';
$heroLead = 'Dal numero 05 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'In un mondo dell’informazione digitale che sempre di più si sbilancia verso i motori di ricerca, con le relative regole che diventano quindi mandatorie, la produzione dei contenuti non può non tener conto di quanto i discorsi vengano messi costantemente in primo piano.',
  'E quando si parla di risposte è chiaro che vanno sempre tenute in grande considerazione le domande. Ovvero, in gergo informatico, le FAQ (Frequently Asked Question).',
  'Lo schema vincente può essere riassunto così.',
  'Viene posto un argomento che, grazie alla competenza di chi stende i testi, trova spiegazione e racconto dentro un “copy” più o meno lungo. Al termine dello scritto che soddisfa il tema messo sul tavolo possono nascere una serie di domande che hanno molteplici funzioni nello sviluppo e nella struttura dei contenuti che vengono proposti dentro una pagina del blog, del sito istituzionale o nella sezione news del portale in via di sviluppo.',
  'Queste FAQ hanno l’obiettivo di trovare una risposta precisa e puntuale sia alle domande del lettore che a quelle inserite da un utente interessato dentro i motori di ricerca.',
  'Questa funzionalità è molto importante da sottolineare: se all’interno delle FAQ di un sito vengono inserite domande che poi trovano corrispondenza con quelle inserite nel box di ricerca, il match è favorito e quindi quel sito premiato. Ecco perché un contenuto viene considerato completo dal punto di vista SEO se oltre al copy di descrizione proposto c’è anche una sezione FAQ a supporto che permetta di soddisfare e completare la proposta di contenuto del sito cliente.',
  'Un altro aspetto molto interessante è legato alla scelta delle FAQ. Non necessariamente ci si muove in autonomia con scelta diretta delle domande cui dare risposta, l’analisi della concorrenza e delle richieste del mercato rende molto interessante la capacità di incrociare le necessità concrete del cliente con le sfumature più interessanti.',
  'Qualche esempio:',
  'Una pagina di contenuti spiega la differenza tra materassi in lattice e quelli in memory, le FAQ potrebbero essere:',
  '● Come si sceglie tra i due tipi di materasso?',
  '● Quanto dura un materasso in lattice?',
  '● Dopo quanto tempo si cambia un materasso in memory foam?',
  '● Qual è il più confortevole considerando le temperature estive e invernali?',
  '● I prezzi sono molto differenti tra le due tipologie?',
  'La tipologia delle domande e delle relative risposte può essere molto variegata, ambiti e punti di vista sono diversi e l’obiettivo, nella stesura del testo, è quello di portare l’utente ad approfondire con un contatto (quindi una CTA che porta a conversione) la sua necessità.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Vincono le risposte, parliamo di FAQ — Magazine eWeb</title>
    <meta
      name="description"
      content='In un mondo dell’informazione digitale che sempre di più si sbilancia verso i motori di ricerca, con le relative regole che diventano quindi mandatorie, la p...'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-5" class="link">← Numero 05 del Magazine</a>
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
