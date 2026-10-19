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
          <?php if ($autore): ?>
            <p class="eyebrow eyebrow--muted reveal">di <?php echo htmlspecialchars($autore); ?></p>
          <?php endif; ?>
          <?php foreach ($paragrafi as $p): ?>
            <p class="body-l reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-3" class="link">← Numero 03 del Magazine</a>
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
