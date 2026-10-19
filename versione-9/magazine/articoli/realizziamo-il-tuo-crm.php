<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 6. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/realizziamo-il-tuo-crm/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/realizziamo-il-tuo-crm
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-6/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 06";
$heroTitle = 'Realizziamo il tuo CRM';
$heroLead = 'Dal numero 06 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Dentro i processi aziendali ci sono tanti dettagli che caratterizzano, dati che fanno prendere decisioni, problemi che si possono risolvere solo se si conoscono. Spesso questi aspetti vengono sottovalutati e si ragiona soltanto sulla realizzazione di un sito internet (magari vetrina) che garantisca una presenza on-line ma, di fatto, senza interconnessioni che permettano di fare quel passo in più, quel qualcosa di più strutturato e armonizzato che si possa considerare davvero funzionale alle analisi e agli obiettivi aziendali.',
  'Spesso si sente parlare di CRM (letteralmente Customer Relationship Management) come di qualcosa legato al mondo digitale ma la verità è che realizzare un software con lo scopo di controllare, organizzare, ottimizzare i processi è solo la punta dell’iceberg. Perché un CRM, inteso come programma da utilizzare per la gestione dei processi interni, non è potenzialmente mai finito. Mai definitivo. Quando si progetta la realizzazione di un sistema di questo tipo vengono messi sul tavolo tutti i pezzi che caratterizzano le fasi interne del business e si cercano di ordinare dati e processi, è tuttavia inevitabile andare incontro a evoluzioni che nascono proprio dall’evidenza di situazioni reali che un CRM permette di osservare.',
  'La costruzione di un CRM fatto ad hoc per il cliente è il primo passo per organizzare al meglio tutto ciò che caratterizza l’azienda, permette di guardare tutto da più punti di vista e quindi di avere sempre contezza di dove bisogna migliorare e dove invece basta mantenere il livello. La capacità che ha eWeb di analizzare i processi aziendali prima di costruire il relativo software è un plus molto importante nella gestione di richieste di questo tipo e permette di avere un approccio consulenziale e non solo esecutivo (il cliente chiede, eWeb realizza): questo dettaglio, chiamato comunemente esperienza permette di anticipare necessità (non per forza problemi) con scelte che possono apparire di poco conto in fase di progettazione ma risultano essere, nel tempo, formidabili alleati per lavorare bene.',
  'Un’altra peculiarità importante dei CRM realizzati da eWeb è la possibilità di creare connettori customizzati sostanzialmente senza vincoli. Ogni azienda, che si tratti di prodotti o servizi con fornitori esterni collegati, ha la necessità di ricevere o trasmettere dati in via telematica con impostazioni, vincoli e strutture che spesso sono definiti da sistemi terzi. Lavorare su una soluzione customizzata significa avere la possibilità di analizzare, progettare e integrare quanto proviene (o deve essere spedito) in modo semplice e intuitivo. Un esempio? Se il cliente ha un e-commerce che deve collegarsi con un gestionale di magazzino si lavora per estrazioni e importazioni schedulate che tengano sempre aggiornato il portale web, per le spedizioni si integra il tracking del corriere piuttosto che il book fotografico o video che deve rendere più accattivante la scheda on-line si possono pescare le creatività in modo automatico. Anche tutto il mondo social è permeabile con questo approccio.',
  'In sintesi, eWeb non vende una soluzione CRM da scaffale ma progetta e realizza ciò che può aiutare il cliente a lavorare meglio, più organizzato e con un maggiore conoscenza dei suoi stessi dati. È una strada complicata da percorrere perché piena di dettagli che possono cambiare gli scenari anche molto rapidamente e bisogna avere la forza, la competenza, la qualità per assorbire ogni imprevisto e trasformare una difficoltà in una nuova, grande opportunità.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Realizziamo il tuo CRM — Magazine eWeb</title>
    <meta
      name="description"
      content='Dentro i processi aziendali ci sono tanti dettagli che caratterizzano, dati che fanno prendere decisioni, problemi che si possono risolvere solo se si conosc...'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-6" class="link">← Numero 06 del Magazine</a>
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
