<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 3. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/protezione-marchio-googleads/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/protezione-marchio-googleads
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
$heroTitle = 'Protezione del marchio negli annunci Google ADS';
$heroLead = 'Dal numero 03 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Quando un inserzionista pubblica un annuncio ADS su Google significa che “acquista” una o più parole chiave.',
  'Quando un utente cerca una di quelle parole, Google gli proporrà la pubblicità dell’inserzionista.',
  'Se un inserzionista compra come parola chiave il nome di un marchio registrato da altre aziende e lo usa specificatamente nel testo dei suoi annunci, sorge una violazione. Ovvero se il testo dell’annuncio contiene un marchio registrato, Google stesso lo blocca. Ripetute violazioni di utilizzo di parole legate ad un marchio registrato possono portare anche al blocco dell’account Google ADS.',
  'In alcuni casi selezionati, la legge stabilisce che anche chi non è titolare del marchio può utilizzarlo. Fra questi, la normativa in materia prevede che l’uso del marchio altrui è consentito se serve a descrivere le caratteristiche o se è necessario per indicare la destinazione di un prodotto o servizio, in particolare come accessorio o pezzo di ricambio (es. cialde Nespresso).',
  'Se, invece, il marchio registrato viene solo comprato come parola chiave, ma senza comparire nell’annuncio, Google non lo blocca. Da un punto di vista legale è comunque una violazione del marchio. Si può procedere con una diffida.',
  'Google dà la possibilità di compilare un modulo di reclamo relativo ai marchi registrati. Google avvierà un’investigazione e una volta accertata la violazione, Google non permetterà la pubblicazione degli annunci testuali che conterranno tale marchio.',
  'L’art. 20 del Codice della proprietà industriale conferisce al titolare di un marchio registrato il diritto di vietare a terzi l’utilizzo di un segno identico al proprio marchio per prodotti o servizi identici ovvero di un segno identico o simile per prodotti o servizi identici o affini nel caso in cui vi sia un rischio di confusione per il pubblico.',
  'La sussistenza di tutti i requisiti costitutivi del diritto sul marchio fa scattare, dunque, tutte le tutele ed i rimedi preposti alla difesa del marchio registrato, in virtù delle disposizioni di cui all’art. 2571 c.c. e all’art. 2, comma 4, c.p.i. che garantiscono protezione qualitativamente identica al marchio registrato e al marchio di fatto.',
  'Ove l’impiego del segno crei la possibilità di un collegamento dell’impresa terza con il marchio registrato, l’uso non è consentito, tornando a prevalere il regime di esclusiva accordato dalla legge al titolare del marchio.',
  'E’ presente una corposa giurisprudenza (talvolta anche contrastante) ma tutta si fonda su un concetto cardine, il marchio deve essere registrato.',
  'Il marchio è un "segno" che permette di distinguere i prodotti o i servizi, realizzati o distribuiti da un\'impresa, da quelli di altre imprese.',
  'In passato ad un nostro cliente è successo proprio un caso simile.',
  'Un competitor ha utilizzato il suo marchio negli annunci ADS con il fine di attirare i suoi clienti (ingenerando confusione sulla provenienza dei servizi) i quali, rispondendo alla sponsorizzata credevano di contattare l’azienda nostra cliente, ma in realtà contattavano una società terza che nulla aveva a che fare con la nostra cliente.',
  'In seguito a questo episodio siamo corsi ai ripari proteggendo il suo marchio… ed effettivamente ha funzionato!',
  'Un marchio da valore ad un’azienda, pertanto è importante saperlo tutelare dagli attacchi dei concorrenti esterni.',
  'Noi di eWeb ci occupiamo anche di questo!',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'intelligenza-artificiale-e-futuri', "title" => 'L’AI c’è ma (ancora) non si vede. Si vedrà?', "teaser" => 'Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la vediamo anche all’opera ma la sensazione diffusa, per chi non si lascia travolgere dalla narrazione di popolo secondo al quale grazie all’intelligenza artificiale tutto sarà automatizzato, standardizzato, appiattito nelle sue sfumature più belle, privo di errori e con la perfezione assoluta lì ad un passo, è che ancora non si vede davvero quello che ci si aspettava. E forse nemmeno lo si vedrà mai.'],
  ["slug" => 'novita-subito-o-quando-matura', "title" => 'Le novità non son sempre una buona cosa', "teaser" => 'Questo mese il tema è particolarmente caldo. Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un discorso sulla “cucina” durante una cena “italiana”.'],
  ["slug" => 'differenze-dem-social-siti', "title" => 'Sito, Dem e Social: le differenze', "teaser" => 'Tre mondi legati a doppio filo l’uno all’altro che, paradossalmente, non hanno unitariamente la stessa forza che invece acquisiscono se vengono visti d’insieme. Per un’azienda, il sito web e i profili social sono veicoli formidabili di comunicazione perché permettono di accedere alle informazioni più importanti in modo organizzato, preciso e dettagliato. Le DEM, acronimo di Direct Email Marketing, sono invece delle comunicazioni a mezzo posta elettronica da inviare a destinatari o gruppi di destinatari con informazioni specifiche.'],
  ["slug" => 'seo-num100-effetti-serp', "title" => 'SERP, Num=100 e la storia dei colossi caduti', "teaser" => 'L\'analisi dell\'impatto del parametro num=100 e la sua interazione con strumenti come Google Search Console rappresenta un caso di studio fondamentale per i professionisti del digital marketing. Anche se Google ha limitato l\'uso diretto di questo parametro nell\'URL per l\'utente finale, il concetto di visualizzazione estesa rimane un pilastro per l\'analisi avanzata.'],
  ["slug" => 'ai-bolla-o-futuro-2', "title" => 'Ma cosa ne sappiamo di AI?', "teaser" => 'Di intelligenza artificiale ne sentiamo parlare costantemente, ma in concreto come la utilizziamo? Ho condotto alcuni sondaggi e sono emersi vari utilizzi che identificano alcune interessanti tipologie e tecniche di applicazione'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Protezione del marchio negli annunci Google ADS — Magazine eWeb</title>
    <meta
      name="description"
      content='Quando un inserzionista pubblica un annuncio ADS su Google significa che “acquista” una o più parole chiave.'
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

      <?php if ($altriArticoli): ?>
        <!-- ============ ALTRI ARTICOLI DI QUESTO NUMERO ============ -->
        <section class="service-section service-section--dark" data-theme="dark">
          <div class="container">
            <div class="service-section__head">
              <div class="service-section__head-text">
                <span class="eyebrow eyebrow--muted">Dallo stesso numero</span>
                <h2 class="h2 reveal-lines">
                  Leggi anche<br /><em>gli altri articoli.</em>
                </h2>
              </div>
            </div>
            <ul class="service-related__list">
              <?php foreach ($altriArticoli as $i => $alt): ?>
                <li class="reveal">
                  <a
                    class="service-related__link"
                    href="<?php echo BASE_URL . "/magazine/" . $alt["slug"]; ?>"
                  >
                    <span class="service-related__link-num"><?php echo str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></span>
                    <span class="service-related__link-body">
                      <span class="service-related__link-text"><?php echo htmlspecialchars($alt["title"]); ?></span>
                      <span class="service-related__link-teaser"><?php echo htmlspecialchars($alt["teaser"]); ?></span>
                    </span>
                    <span class="btn__arrow">→</span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endif; ?>
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
