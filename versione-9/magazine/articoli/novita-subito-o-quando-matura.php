<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 3. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/novita-subito-o-quando-matura/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/novita-subito-o-quando-matura
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
$heroTitle = 'Le novità non son sempre una buona cosa';
$heroLead = 'Dal numero 03 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Questo mese il tema è particolarmente caldo.',
  'Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un discorso sulla “cucina” durante una cena “italiana”.',
  'Il nostro ambito di lavoro ha un concetto di novità tutto suo… le novità sono spesso vecchie nel momento in cui le “capiamo”. La velocità, le costanti evoluzione tecnologiche e di metodo non permettono assaporare le novità come accade invece in altri contesti. Quindi, spesso, ci troviamo con una coda di novità da analizzare per capirne l’utilità, la spendibilità sui progetti lavorativi in corso, ma anche sulle prospettive di breve e medio termine.',
  'Il pensiero che ci accompagna in questa fase di analisi e scelta è forse in controtendenza rispetto al sentire comune, credo però rappresenti bene lo spirito “sartoriale” con cui eWeb si approccia ai clienti. Un approccio meticoloso e attento. Mirato. Ragionato. Incontriamo realtà imprenditoriali con un basso grado di digitalizzazione, file Excel complessi e a volte ridondanti, nessun CRM o altri software di supporto alle varie funzioni aziendali.',
  'Queste realtà però lavorano, esistono da anni e non di rado sono aziende performanti. Con numeri importanti. Un approccio con pensiero consulenziale semplice ed opportunistico potrebbe essere “Signori, digitalizziamo la vostra impresa e farete un salto di qualità che non vi immaginate neanche”. Un invito ad accogliere le “novità” in toto, in quanto tali. Sulla fiducia.',
  'Attivazione di un software CRM, utilizzo di sistemi ERP, innesto di automazioni, produrre KPI e chi più ne ha più ne metta.',
  'Una domanda però si pone: questa pratica, regala ossigeno all’azienda o la soffoca come accade quando metti troppa legna sul fuoco?',
  'A nostro avviso ogni passo tecnologico, ogni evoluzione, ogni “novità” deve essere contestualizzata alla situazione “odierna” dell’azienda con cui stiamo lavorando. Le dinamiche in uso, spesso con una storia pluriennale alle spalle, devono essere rispettate ed accompagnate verso il futuro, in un percorso di digitalizzazione che necessità di tempo e comprensione.',
  'Tornando al nostro titolo “Le novità non son sempre una buona cosa”, è venuto spontaneo, pensando al nostro quotidiano, alle diversità che incontriamo nel nostro lavoro… teste diverse, metodi diversi, visioni diverse, ecc.. come possiamo pensare che una novità possa essere giusta in quanto tale.',
  'Per concludere, la novità che noi reputiamo sempre buona, è la rinnovata voglia di ascoltare, capire e proporre la strada più adatta per poter raggiungere gli obbiettivi desiderati, tenendo ben presente il punto di partenza, e le scarpe che si indossano.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Le novità non son sempre una buona cosa — Magazine eWeb</title>
    <meta
      name="description"
      content='Questo mese il tema è particolarmente caldo. Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un di...'
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
