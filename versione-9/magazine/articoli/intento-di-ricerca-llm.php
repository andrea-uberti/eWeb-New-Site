<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 4. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/intento-di-ricerca-llm/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/intento-di-ricerca-llm
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
$heroTitle = 'La sfida è negli intenti, non solo nelle keyword';
$heroLead = 'Dal numero 04 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  'Il 2026 sta tracciando un solco netto rispetto al passato: la ricerca online non è più una scansione di parole chiave, ma una conversazione stratificata. Il paradigma è cambiato perché non interroghiamo i motori per atterrare su una lista di siti, ma per ottenere analisi di dati, soluzioni operative e verifiche incrociate. I modelli linguistici di grandi dimensioni sono usciti dai laboratori per diventare l\'architettura portante del nostro modo di accedere alle informazioni.',
  'L\'abitudine di digitare brevi stringhe di testo è ormai desueta. Oggi l\'utente dialoga con sistemi come Google o ChatGPT descrivendo contesti articolati e pretendendo risposte con lo stesso grado di complessità. Le panoramiche generate dall\'intelligenza artificiale forniscono spesso la soluzione definitiva prima ancora che avvenga il primo clic.',
  'Questo scenario non decreta la fine della seo, ma ne impone una trasformazione radicale: la semplice densità di un termine all\'interno di una pagina non garantisce più visibilità. La priorità si è spostata sulla capacità di trasmettere competenza specifica e autenticità. Siamo passati dalla logica della keyword a quella dell\'intento di ricerca, dove il valore di un brand è l\'unico vero fattore di posizionamento residuo.',
  'Uno dei cambiamenti più significativi riguarda la gestione delle query fan-out. Gli algoritmi attuali non si limitano a elaborare la richiesta esplicita: mappano le ricerche correlate e le possibili ramificazioni semantiche per costruire un quadro informativo che anticipa le necessità dell\'utente. Se si analizza un prodotto, il sistema integra automaticamente confronti tecnici, recensioni verificate e scenari d\'uso reali, risolvendo dubbi che l\'utente non ha ancora formulato.',
  'Per essere selezionati come fonte autorevole dai motori di ricerca, l\'organizzazione logica dei contenuti prevale sulla quantità di testo. L\'intelligenza artificiale predilige dati strutturati, facili da mappare e pronti per l\'estrazione. Gli elementi essenziali per un\'architettura web moderna includono:',
  '● tabelle di confronto e schemi tecnici: strumenti che permettono l\'estrazione immediata di dati oggettivi;',
  '● sezioni di approfondimento verticale: aree in cui l\'esperienza diretta di un professionista è chiaramente distinguibile;',
  '● esposizione trasparente di prezzi e specifiche: la chiarezza delle informazioni riduce le incertezze del modello di elaborazione;',
  '● menzioni di esperti di settore: l\'autorità non si misura più solo con i backlink, ma attraverso il riconoscimento di figure reali citate nei database di conoscenza.',
  'Il processo di conversione ha subìto una mutazione profonda: l\'intelligenza artificiale funge da garante, sintetizzando il sentiment e le prestazioni percepite sul web. Una volta che il sistema identifica un marchio come la soluzione ottimale, l\'utente torna sui motori di ricerca per cercare direttamente quel nome specifico. Nel 2026, l\'obiettivo della seo non è più posizionarsi per una categoria merceologica, ma consolidare l\'identità del brand affinché l\'algoritmo lo suggerisca come l\'unica risposta autorevole a un problema specifico.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'sito-custom-vantaggi', "title" => 'Non siamo contro Wordpress, siamo per il cliente', "teaser" => '“Ah, ma fate i siti? Anche voi con Wordpress? Perché ho sentito che parlano tutti di Wordpress”. No, noi non facciamo siti.'],
  ["slug" => 'php-linguaggio-programmazione-eweb', "title" => 'Scriviamo codice, niente PLUG-IN. Ed è tutto VOSTRO', "teaser" => 'Nelle precedenti comunicazioni, credo si sia intuito che non utilizziamo (e non amiamo molto) i CMS commerciali, anche se c’è un rispetto di fondo per il prodotto in sé, e per chi ha scelto di proporlo e/o utilizzarlo.'],
  ["slug" => 'funnel-e-lead', "title" => 'Funnel e Lead, due facce della comunicazione', "teaser" => 'Ci sono tante strade per arrivare a nuovi clienti. Prima sono solo contatti, poi diventano potenziali interessati e alla fine, si spera, diventano un nuovo punto di riferimento per la vendita e l’erogazione di prodotti e/o servizi.'],
  ["slug" => 'differenze-app-webapp', "title" => 'APP NATIVE o WEB APP: che differenza c’è e quale scegliere?', "teaser" => 'È noto che la maggior parte di noi utilizza internet tramite il proprio cellulare, ovvero da mobile. E ciò si riferisce ormai a tutte le tipologie di utenti, non più solo i privati, ma anche in larga parte i professionisti, ovvero il traffico B2B tra aziende.'],
  ["slug" => 'strategia-ads-google-meta', "title" => 'La dualità della domanda: spingere o attrarre', "teaser" => 'Nel marketing digitale del 2026, la distinzione tra Google ads e Meta ads non riguarda i costi di piattaforma, ma il presidio delle diverse fasi d\'acquisto.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La sfida è negli intenti, non solo nelle keyword — Magazine eWeb</title>
    <meta
      name="description"
      content='Il 2026 sta tracciando un solco netto rispetto al passato: la ricerca online non è più una scansione di parole chiave, ma una conversazione stratificata'
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
