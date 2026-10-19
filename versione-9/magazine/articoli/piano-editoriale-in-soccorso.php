<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 5. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/piano-editoriale-in-soccorso/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/piano-editoriale-in-soccorso
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
$heroTitle = 'Il Piano Editoriale ti salva la faccia (e non solo)';
$heroLead = 'Il Piano Editoriale ti salva la faccia (e non solo)';

$autore = null;
$paragrafi = [
  'Quando si stende un piano di comunicazione, il primo passo è decidere quando affrontare un argomento e contestualizzarne la pubblicazione rispetto agli altri spunti che caratterizzano il progetto.',
  'Sembra un passaggio semplice ma è la spina dorsale del successo che ogni cliente cerca quando chiede ad eWeb di comunicare al meglio il suo brand, i suoi prodotti e i suoi servizi. Pensare che un Piano Editoriale sia semplicemente la descrizione di tutto quello che un cliente propone è profondamente sbagliato, dentro progetti di 3 o 6 mesi (ma anche più lunghi) vanno identificati momenti in cui spingere dal punto di vista commerciale, quando presentare un problema per cui il servizio del cliente è la soluzione o ancora il momento giusto per rappresentare numeri importanti ed esperienze.',
  'Il segreto di un buon Piano Editoriale è la curiosità. Nella scelta degli argomenti, del “Tone of Voice”, dei numeri e delle risposte a precise domande bisogna sempre cercare di immedesimarsi nel lettore e tener viva la sua voglia di approfondire, cliccare, telefonare o scrivere una mail al nostro cliente.',
  'Per diventare da semplice navigatore a contatto, da contatto poi a lead e alla fine da lead a cliente.',
  'Ci sono tempi, strategie, scelte vincenti ed errori che entrano tutte assieme nel calderone della comunicazione che grazie ad un piano editoriale ben studiato punta a raccontare quello che il cliente vuole trasmettere.',
  'Dal punto di vista dell’organizzazione dei contenuti, fare la lista degli argomenti da trattare e incastrarli dentro un calendario garantisce diversi vantaggi.',
  'Prima di tutto, non c’è pericolo di ripetersi o trattare troppe volte un argomento e troppo poco quello successivo così come la struttura di un copy qualsiasi, a prescindere dalla piattaforma di pubblicazione, può tener conto di date e scadenza in modo da creare interesse nel pubblico. Che sia nuovo o affezionato, poco importa: se qualcuno già ti conosce devi scrivere in modo da rafforzare o far pesare ancora di più i tuoi plus, se invece un utente vede per la prima volta il tuo brand e le tue proposte bisogna essere credibili e bravi a farsi seguire.',
  'Una delle caratteristiche forse più importanti del Piano Editoriale è la capacità di programmare nel tempo le proposte e i riscontri dei clienti, le offerte e i vantaggi ma anche le persone che portano avanti l’azienda, i suoi servizi e i rapporti con clienti e fornitori. Quando si parla di Piano Editoriale che “salva la faccia” si intende la capacità di trasmettere professionalità, coerenza, chiarezza e disponibilità verso chi è destinatario della comunicazione grazie ad argomenti e testi messi in fila, quindi temporalmente organizzati, con un preciso senso logico. Sia esso legato al calendario o a qualsiasi altro dettaglio che caratterizza il business aziendale.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Il Piano Editoriale ti salva la faccia (e non solo) — Magazine eWeb</title>
    <meta
      name="description"
      content='Quando si stende un piano di comunicazione, il primo passo è decidere quando affrontare un argomento e contestualizzarne la pubblicazione rispetto agli altri...'
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
