<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 5. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/comunicare-con-video/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/comunicare-con-video
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
$heroTitle = 'Comunicazione Video eWeb';
$heroLead = 'Dal numero 05 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Ciascuna delle nostre aziende ha la necessità di comunicare.',
  'I canali ed i linguaggi attraverso i quali può farlo sono molteplici. In questo articolo ci concentriamo sull’utilizzo dei video.',
  'Partiamo dal destinatario di ciò che vogliamo dire, l’utente finale, ovvero tutti noi.',
  'Viviamo in un’era nella quale siamo sommersi da infiniti contenuti con altrettante variabili, generi, forme, colori, toni, dimensioni,…',
  'Questa complessità ci permette di dedicare al singolo stimolo un tempo molto limitato, nell’ordine di pochi decimi di secondo. La sovraesposizione continua richiede un grande dispendio di energie. Ci stanchiamo e perdiamo concentrazione e attenzione molto velocemente.',
  'Ma è diverso quando guardiamo fotografie (Instagram docet), leggiamo le primissime 5-6 parole di un post per poi passare velocemente a quello successivo, leggiamo i titoli degli articoli sul sito di un quotidiano nazionale oppure guardiamo un video: un film, una serie, un documentario di approfondimento, un tutorial, un programma televisivo o brevi short video.',
  'Leggere poche parole oppure vedere un’immagine, ferma o in movimento, ci permette di essere passivi rispetto al messaggio e l’impegno richiesto è davvero minimo. Il testo deve però essere molto breve mentre il video può anche essere più lungo, addirittura come un film.',
  'Inevitabilmente i contenuti che possiamo trasmettere saranno molto superiori in un video piuttosto che in un’immagine o una riga di testo.',
  'Chiaro che la prima regola da rispettare nella comunicazione è che i contenuti devono essere interessanti e coinvolgenti, ciò è elemento imprescindibile.',
  'Se abbiamo qualcosa da dire che riteniamo essere di qualità e che debba essere recepito dai nostri target, allora dobbiamo pensare di sfruttare il linguaggio dei video.',
  'Ci permetterà di dire molte più cose tenendo lo spettatore attento a noi, senza richiedergli alcuno sforzo.',
  'Realizzare un video richiede molta energia per chi lo produce, ma ne vale sempre la pena.',
  'Non tutte le aziende possono utilizzare il linguaggio dei video, per almeno due macro motivi.',
  'Il primo motivo è che in un video ci devono essere tanti contenuti, solo chi li ha può pensare di trasmetterli attraverso un video. E non basta averli, serve anche essere disposti a costruirli e adattarli al linguaggio specifico che si è scelto. Prima servono i contenuti e poi si può passare a decidere come renderli fotogrammi animati. Riprendere è paradossalmente la parte più semplice del processo. Soprattutto oggi l’avvento di smartphone con dotazioni tecnologiche pazzesche rende quegli strumenti comuni a tutti più che validi per girare scene anche complesse e in situazioni difficili. Un tempo servivano super video camere, oggi può bastare molto meno. Chiaro che poi dipende dalla tipologia di prodotto si è deciso di realizzare e che per alcuni modelli specifici di video restano imprescindibili strumentazioni avanzate, come i droni o steadycam o dolly e soprattutto cameraman, registi, direttori della fotografia, sceneggiatori, ecc.. Ma per svariate altre situazioni tutto ciò può essere ampiamente ridotto. Basti pensare a quanti video vediamo sui social realizzati in autonomia con un buon telefono ed un microfono bluetooth da 20 € di costo. O addirittura podcast e video più complessi, ma sempre realizzati con una strumentazione basilare.',
  'Serve partire da uno storyboard che è l’unione tra una descrizione testuale e contemporaneamente visiva, seppur a grandi linee, delle scene che comporranno il prodotto finale. Lo storyboard definisce ciò che contiene un video, è la traccia determinante ed imprescindibile per realizzarlo.',
  'Prima si stende lo storyboard, poi si fanno le riprese.',
  'Un video si conclude con la fase del montaggio che permette di dare un senso coerente che segue e rispetta lo storyboard. Ma oggi ci sono APP che in pochi passaggi molto semplici permettono non solo di ottenere un buon montaggio, ma addirittura con effetti e elementi a completamento grafico e contenutistico di altissima qualità. Senza dimenticarci di quanto l’AI generativa possa esserci di supporto per questa fase di chiusura del prodotto.',
  'Tecnicamente può essere tutto più facile, rapido e quindi economico, ma resta necessario sapere e definire il soggetto delle riprese, altrimenti non ci sarà alcuna sostanza.',
  'Un secondo motivo è relativo alla necessità per svariati tipi di video che sia presente un soggetto attore, protagonista attivo. Ci riferiamo ad una figura che possa interagire con lo spettatore andando a esporre e completare i contenuti esclusivamente visivi che potrebbero comporre un video. Per assolvere a questa necessità esiste sempre la possibilità di utilizzare figure professionali di attori o attrici o in una dimensione minore creator di contenuti social, che si occupano appunto di creare video nei quali spiegano ciò che è previsto nello storyboard.',
  'Serve però ragionare bene quanto l’attore o attrice possa effettivamente impersonificare l’azienda. Ci sono svariati esempi che mostrano quanto l’attore diventa la vera forza della narrazione video: uno su tutti, il più semplice è Giovanni Rana, ma si potrebbero citare molti altri esempi, anche più complessi e che vanno oltre il solo concetto di spot pubblicitario, che è si una forma di comunicazione video, ma con delle peculiarità specifiche.',
  'Allo stesso modo esistono grandi esempi di successo dove l’attore identifica in modo quasi simbiotico l’azienda: l’agriturismo Ferdi ha basato la sua enorme crescita di visibilità a livello nazionale, partendo da un paesello della Val Brembana, proprio sulla figura del figlio del proprietario, che si è prestato, insieme alla sua famiglia ed ai suoi collaboratori, per raccontare la sua azienda. Ha ottenuto risultati enormi in termini di coinvolgimento e crescita del pubblico. Su quel modello sono seguiti e continuano a esserci molti altri esempi, tutti di successo e non solo B2C, ma anche B2B, senza gradi distinzioni.',
  'Ciò che serve è trovare chi vuole metterci la faccia e ancor meglio la voce. Sempre se questa figura è effettivamente presente in azienda.',
  'Attenzione non serve essere attori nati, basta aver la determinazione di volerci provare. Poi esistono le agenzie, come eWeb, che possono aiutare e supportare tutto il processo creativo e di produzione.',
  'A chiusura di questo articolo ritengo importante sottolineare che l’utilizzo del linguaggio video non va in alcun modo ad annullare o rendere superflua la creazione di contenuti testuali, anzi. Certo gli utenti fanno molta più fatica a leggere un testo, ma anche alla base di un buon video è necessario avere un ottimo testo. A questo si aggiunge che l’utente che vuole approfondire, che è sempre il target migliore da raggiungere, molto probabilmente vorrà poter leggere contenuti più specifici e dettagliati di quanto presente solo in un video.',
  'E la soddisfazione di completare la lettura di un libro, sia esso un racconto, piuttosto che un saggio, un manuale o quant’altro resta inevitabilmente, e per fortuna, alla base della formazione e della crescita cultura di ciascuno di noi.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Comunicazione Video eWeb — Magazine eWeb</title>
    <meta
      name="description"
      content='Ciascuna delle nostre aziende ha la necessità di comunicare. I canali ed i linguaggi attraverso i quali può farlo sono molteplici. In questo articolo ci conc...'
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
