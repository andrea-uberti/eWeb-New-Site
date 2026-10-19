<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 2. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/backend-dev/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/backend-dev
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-2/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 02";
$heroTitle = 'Conta di più quello che non si vede: un buon Back-End';
$heroLead = 'Dal numero 02 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  'Argomento tecnico, ma non solo. Quello che sta “dietro le quinte” è spesso la parte più importante, più pragmatica ed al tempo stesso invisibile del lavoro che svolgiamo, ciò che consente di raggiungere ottimi risultati “visivi” e “funzionali” per il pubblico.',
  'Nei progetti web based, che si tratti di siti web, web app, applicativi/software o altro, il BE è una costante spesso imprescindibile. Nell’analisi e progettazione di una soluzione ad hoc per il nostro cliente, la scelta di quali funzioni includere nel BE è delicata e può determinare in modo netto il grado di soddisfazione del cliente stesso.',
  'Facendo un passo indietro, è importante spiegare cosa si intende per BE, per esteso back-end.',
  'Il BE è quella parte di un sistema informatico, dedicata alla gestione dei dati e delle operazioni funzionali alla pubblicazione e fruizione dei dati stessi da parte dell’utilizzatore finale del sistema informatico in oggetto che lavora “dietro le quinte”. Ad accesso specifico e ristretto per una serie nota di utenti contributori.',
  'Di norma, e me lo auguro, un utente di BE ha un accesso protetto da username e password (secondo i crismi delle normative vigenti) e consente, come detto, al “proprietario” dell’applicativo web una gestione autonoma dei contenuti. Il BE in sostante è quindi quell’elemento “tecnico” che consente di definire un applicativo web dinamico: si comprende facilmente come i siti web dinamici non sono quelli con video ed animazioni grafiche accattivanti. Ma altro. 😉',
  'Spiegato di cosa si tratta, una domanda importante che intreccia i bisogni del cliente: c’è davvero la necessità di avere un sito dinamico? Con un BE dedicato? La riposta è la più semplice e fastidiosa: dipende. In base all’obbiettivo che si vuol perseguire sviluppando un applicativo web (sito, web app, ecc.) si deve ragionare sulla percentuale di contenuti che necessitano di “manutenzione frequente” ovvero inserimento – modifica – cancellazione. Dopo questa analisi, la scelta di dotarsi o meno di un BE sarà automatica.',
  'Tecnicamente, a livello di struttura e “peso” di un progetto web, la presenza o meno di un BE, cambia in modo sensibile gli scenari e i dettagli economici (oltre che di tempo) che caratterizzano il progetto stesso. Nelle soluzioni custom proposte da eWeb, la scelta iniziale non pregiudica MAI le eventuali evoluzioni future.',
  'Un esempio concreto. Oggi ho scelto di avviare un progetto web senza BE, ad esempio un sito vetrina che presenta in modo generico la mia azienda. Domani voglio gestire in autonomia l’articolazione del mio catalogo prodotti e servizi, contestualizzare i contatti (lead) provenienti dal sito sulla base del catalogo stesso. Questo scenario è la normale evoluzione di un progetto web e il codice, ovvero il CMS proprietario di eWeb, consente di seguire in modo “naturale” questa evoluzione, senza l’obbligo di rifacimenti integrali.',
  'Perché non posso gestire tutto il sito in autonomia? Questa domanda ci viene spesso mossa in risposta alla proposta di un BE minino o addirittura alla non inclusione di un BE in un nostro progetto web. Il quesito è naturale e nasce da anni di “abitudine all’uso”, o anche solo al “sentito dire”, di CMS “commerciali” come WordPress, Shopify, Joomla, Wix, ecc. La scelta aziendale di non utilizzare di default CMS “commerciali” nasce anche da questa riflessione.',
  'Perché devo assumermi l’onere di gestione di tutte le componenti del mio sito, esponendomi ad aggiornamenti obbligatori ed in alcuni casi a pagamento (plugin, ecc.) potenziali problemi di versioni template non più supportate, quando all’interno del mio sito NON HO BISOGNO di cambiare nulla in modo continuativo?',
  'Perché devo comprare un SUV lungo oltre 4 metri e largo più di 2 metri se devo usarlo per andare in centro?',
  'Un BE studiato e ragionato sulle esigenze attuali e con un occhio agli sviluppi futuri, può essere senza problemi un ponte, una porta aperta verso sviluppi ed automazioni di sicuro interesse. E poi ci sono le personalizzazioni e le integrazioni: collegamento del sito al CRM aziendale, importazione automatica del catalogo per il nostro eShop, area riservata per la gestione dei nostri clienti, ecc.',
  'In conclusione, parafrasando un famoso detto popolare possiamo affermare che “Dietro un grande progetto web, c’è sempre un grande BE”. Ma anche no? Dipende.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'non-siamo-perfetti', "title" => 'Professionisti da oltre 25 anni. Ma sbagliamo anche noi.', "teaser" => 'Non c’è una ricetta certamente e completamente vincente. Non c’è la sicurezza che tutto quanto viene fatto porterà dei risultati da urlo e senza intoppi.'],
  ["slug" => 'canali-migliori-comunicazione', "title" => 'Farsi conoscere. Come? Ti aiuta eWeb', "teaser" => 'Il segreto del successo di un’attività, di un servizio o di un prodotto non è nel valore di quanto viene proposto ma nella capacità di far conoscere al più ampio pubblico possibile di quello che si mette sul mercato'],
  ["slug" => 'seo-ai-mode', "title" => 'Dalla SERP all\'AI Mode: la nuova architettura della visibilità digitale', "teaser" => 'Per vent’anni il contratto implicito tra noi e Google è stato chiaro: noi fornivamo i contenuti, il motore forniva l’indicizzazione'],
  ["slug" => 'registrazione-software', "title" => 'A proteggere e registrare il tuo software ci pensa eWeb!', "teaser" => 'Noi di eWeb ci occupiamo anche della registrazione di un software presso la SIAE.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Conta di più quello che non si vede: un buon Back-End — Magazine eWeb</title>
    <meta
      name="description"
      content='Argomento tecnico, ma non solo. Quello che sta “dietro le quinte” è spesso la parte più importante, più pragmatica ed al tempo stesso invisibile del lavoro c...'
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
            <span>Numero 02</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-2" class="link">← Numero 02 del Magazine</a>
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
