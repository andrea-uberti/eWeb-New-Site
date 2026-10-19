<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 6. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/le-due-anime-di-eweb/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/le-due-anime-di-eweb
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
$heroTitle = 'eWeb ha due anime, Dev e Com: perché questo fa la differenza';
$heroLead = 'Dal numero 06 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'EWeb nasce come agenzia di programmazione web custom ma grazie alla tenacia e al sogno di Pietro si apre al mercato anche per i servizi di comunicazione… due anime quindi, una DEV e una COM, che cooperano e collaborano in sincronia e in modo sinergico.',
  'DEV identifica il reparto che si occupa della programmazione, ovvero della scrittura dei codici tecnici necessari per ottenere pagine web, collegate a database.',
  'Una landing è composta solitamente da una pagina di codice, un sito ne avrà almeno una decina, un software ne ha centinaia con codici di programmazione molto complessi, calcoli matematici, algoritmi e interazioni AI. E prima di poter scrivere una pagina è fondamentale il lavoro di project management che i nostri collaboratori svolgono con competenza e basandosi su anni di esperienza, che diventano una risorsa di grande valore per aiutare e guidare i clienti nelle loro scelte: non basta fare, ma serve aver chiaro come fare.',
  'eWeb non copia codice, non utilizza o rivende software di altri, ma scrive tutto “a manina”. Ciò garantisce che tutto è davvero sotto controllo per il semplice fatto che è tutta farina del nostro sacco.',
  'COM è una sigla che utilizziamo per identificare le professionalità del nostro staff che si occupa di comunicare, attraverso testi, immagini, video, forme, slogan, colori… utilizzando e sfruttando i molteplici canali di comunicazione, soprattutto digitali vista la natura della nostra agenzia, ma anche più tradizionali e old school. Il loro lavoro parte dalla definizione di una strategia, che viene poi messa in pratica, misurata e analizzata. In contesti che evolvono quasi quotidianamente e che impongono la necessità di una continua formazione ed elasticità di evoluzione delle proprie azioni.',
  'Avere ben chiaro ciascuno dei due ambiti e tenerli ben distinti lo riteniamo il nostro vero fiore all’occhiello, il nostro vanto… siamo un team composto da molteplici figure e professionalità. In eWeb non c’è chi sa fare un po\' di tutto ma un po\' a caso: ciascuna figura assolve ad una funzione molto specifica, all’interno di processi, servizi e prodotti sempre più complessi. Solo così possiamo riuscire ad adempiere al nostro motto disegnare e cucire un meraviglioso abito sartoriale su misura di ogni nostro cliente – web tailor design and marketing.',
  'Esistono progetti solo DEV oppure progetti solo COM. Spesso diventa necessaria e strategica un’interazione tra i due reparti al fine di ottenere la soluzione più efficace ed efficiente per gli obiettivi del cliente.',
  'Se ci viene commissionato un software per gestire le commesse operative, i mezzi, il personale, la contabilità di ordini e produzione o più in generale per la gestione aziendale, molto probabilmente il lavoro nasce e si esaurisce nel reparto DEV.',
  'Se ci viene chiesto per esempio di realizzare un logo, oppure di attivare una campagna Google o Meta per i saldi allora se ne occuperà COM in piena autonomia.',
  'Esistono poi i progetti con l’interazione delle due anime operative di eWeb. L’esempio più chiaro è la creazione e gestione di un eshop perché di base serve non dimenticarsi che fare un sito di eshop non vuol dire vendere!. Si parte dal reparto DEV, che scriverà la parte tecnica del progetto: la vetrina dei prodotti, la scheda di dettaglio, il carrello, le spese di spedizione, il processo di registrazione, di acquisto, di pagamento e tutto ciò che ne seguirà fino alla chiusura della vendita che sarà giunta a destinazione. Ma, come dicevamo, poi serve vendere: ecco che allora entra in gioco la strategia e la vision del settore COM!',
  'Oppure se una commessa riguarda l’indicizzazione ed il posizionamento su Google o per la Search AI fondamentale sarà l’analisi del reparto COM e la stesura di tutti copy da dare in pasto ai famelici algoritmi, ma senza un adeguato supporto da parte del reparto DEV, che adegua e rispetta il codice tecnico, il lavoro non potrà mai centrare gli obiettivi prefissati.',
  'Ecco dunque che risultano plurimi i vantaggi dell’affidarsi ad un’agenzia con due anime come la nostra:',
  'La mission di eWeb è sempre quella di comprendere il suo cliente, gestirlo e accompagnarlo in un percorso di crescita in modo che i prodotti che avrà deciso di sviluppare, siano essi di DEV o di COM, rispondano alle reali necessità e quindi agli obiettivi prefissati!',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>eWeb ha due anime, Dev e Com: perché questo fa la differenza — Magazine eWeb</title>
    <meta
      name="description"
      content='eWeb ha due anime, Dev e Com: perché questo fa la differenza'
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
