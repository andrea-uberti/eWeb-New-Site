<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 3. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/seo-num100-effetti-serp/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/seo-num100-effetti-serp
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-3/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 03";
$heroTitle = 'SERP, Num=100 e la storia dei colossi caduti';
$heroLead = 'Cosa implica davvero la visualizzazione estesa';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  'L\'analisi dell\'impatto del parametro num=100 e la sua interazione con strumenti come Google Search Console rappresenta un caso di studio fondamentale per i professionisti del digital marketing. Anche se Google ha limitato l\'uso diretto di questo parametro nell\'URL per l\'utente finale, il concetto di visualizzazione estesa rimane un pilastro per l\'analisi avanzata.',
  'Non si tratta solo di un trucco tecnico: forzare la visualizzazione oltre i classici 10 risultati, la cosiddetta Deep SERP, ha conseguenze profonde su come interpretiamo la concorrenza, le metriche di GSC e la salute dei nostri progetti SEO.',
  'In uno scenario standard, la SERP è frammentata. L\'approccio num=100 o la sua simulazione via API ci costringe a guardare il mercato nella sua interezza, non solo la punta dell\'iceberg. Questo cambio di paradigma impatta su tre fronti.',
  '1. Impatto sulla SERP e sull\'esperienza di analisi',
  'Quando analizziamo 100 risultati in un\'unica soluzione, il paesaggio cambia drasticamente:',
  '2. L\'interazione critica con Google Search Console',
  'L’uso di Google Search Console è fondamentale per migliorare una strategia SEO avviata ma l\'uso di tool che scansionano la SERP profonda ha spesso sporcato i dati. Ecco come leggere le metriche correttamente senza farsi ingannare:',
  'Il take-away è chiaro: non bisogna mai confondere le metriche aggregate di GSC con l\'esperienza utente reale, perché GSC registra tutto, anche ciò che l\'occhio umano non vede quasi mai.',
  '3. Le conseguenze tecniche',
  'Avere accesso ai dati della SERP profonda tramite API o export di dati sblocca strategie che i competitor fermi alla prima pagina ignorano:',
  'Ricerca delle opportunità e gemme nascoste Non guardare solo chi vince, guarda chi sta quasi vincendo. I contenuti posizionati tra la 20esima e la 50esima posizione sono oro: spesso sono pagine non ottimizzate che, con un aggiornamento mirato (content refresh) e un paio di link interni, possono saltare direttamente in prima pagina.',
  'Strategie di link building laterali Analizzare 100 risultati ti offre un bacino di prospect enorme. Un sito in posizione 40 potrebbe non essere un competitor diretto per il traffico, ma è tematicamente rilevante. Se linka qualcuno, potrebbe linkare anche te. È una miniera d\'oro per la PR digitale che molti ignorano.',
  'Infine, l\'analisi estesa serve a studiare l\'archeologia della SERP. Scorrere fino alla posizione 80 o 90 spesso rivela i colossi caduti: ex leader di settore che, per colpa di core update o debito tecnico, sono scivolati nell\'oblio.',
  'Studiare questi casi non è curiosità fine a se stessa, è prevenzione: serve a valutare i rischi, capendo se sono caduti per cannibalizzazione, contenuti thin o problemi tecnici, e a mantenere una corretta igiene SEO, ricordandoci che il posizionamento non è mai un diritto acquisito per sempre.',
  'Il parametro num=100 come semplice stringa URL potrà anche essere tramontato, ma la filosofia che rappresentava è più viva che mai. Per noi di eWeb, rifiutarsi di guardare oltre i primi 10 risultati significa lavorare con un occhio bendato.',
  'La vera sfida oggi non è più forzare la visualizzazione nel browser, ma saper estrarre questi dati profondi tramite API e strumenti come Looker Studio per costruire strategie resilienti, evitando di diventare noi stessi un risultato a fondo pagina.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'intelligenza-artificiale-e-futuri', "title" => 'L’AI c’è ma (ancora) non si vede. Si vedrà?', "teaser" => 'Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la vediamo anche all’opera ma la sensazione diffusa, per chi non si lascia travolgere dalla narrazione di popolo secondo al quale grazie all’intelligenza artificiale tutto sarà automatizzato, standardizzato, appiattito nelle sue sfumature più belle, privo di errori e con la perfezione assoluta lì ad un passo, è che ancora non si vede davvero quello che ci si aspettava. E forse nemmeno lo si vedrà mai.'],
  ["slug" => 'novita-subito-o-quando-matura', "title" => 'Le novità non son sempre una buona cosa', "teaser" => 'Questo mese il tema è particolarmente caldo. Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un discorso sulla “cucina” durante una cena “italiana”.'],
  ["slug" => 'differenze-dem-social-siti', "title" => 'Sito, Dem e Social: le differenze', "teaser" => 'Tre mondi legati a doppio filo l’uno all’altro che, paradossalmente, non hanno unitariamente la stessa forza che invece acquisiscono se vengono visti d’insieme. Per un’azienda, il sito web e i profili social sono veicoli formidabili di comunicazione perché permettono di accedere alle informazioni più importanti in modo organizzato, preciso e dettagliato. Le DEM, acronimo di Direct Email Marketing, sono invece delle comunicazioni a mezzo posta elettronica da inviare a destinatari o gruppi di destinatari con informazioni specifiche.'],
  ["slug" => 'ai-bolla-o-futuro-2', "title" => 'Ma cosa ne sappiamo di AI?', "teaser" => 'Di intelligenza artificiale ne sentiamo parlare costantemente, ma in concreto come la utilizziamo? Ho condotto alcuni sondaggi e sono emersi vari utilizzi che identificano alcune interessanti tipologie e tecniche di applicazione'],
  ["slug" => 'protezione-marchio-googleads', "title" => 'Protezione del marchio negli annunci Google ADS', "teaser" => 'Quando un inserzionista pubblica un annuncio ADS su Google significa che “acquista” una o più parole chiave.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SERP, Num=100 e la storia dei colossi caduti — Magazine eWeb</title>
    <meta
      name="description"
      content='L\'analisi dell\'impatto del parametro num=100 e la sua interazione con strumenti come Google Search Console rappresenta un caso di studio fondamentale per i p...'
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
            <span>Numero 03</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-3" class="link">← Numero 03 del Magazine</a>
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
