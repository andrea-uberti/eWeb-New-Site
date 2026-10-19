<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 6. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/sviluppo-e-comunicazione/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/sviluppo-e-comunicazione
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
$heroTitle = 'Sviluppo e Comunicazione: dove devi investire?';
$heroLead = 'Dal numero 06 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Il tema degli investimenti, soprattutto in momenti come quello che stiamo vivendo dal punto di vista della situazione internazionale, è molto delicato. Dal punto di vista digitale, il dibattito è spesso concentrato su due filoni che solo all’apparenza sono slegati: sviluppo e comunicazione. Giusto cercare di migliorare gli strumenti interni per lavorare meglio oppure comunicare all’esterno beni e servizi per aumentare la consapevolezza del mercato in merito al proprio brand? Meglio un nuovo e-commerce oppure qualche campagna social o DEM (Direct Email Marketing) per trovare nuovi clienti?',
  'La risposta buona per tutte le realtà ovviamente non c’è perché molto dipende dal livello di digitalizzazione che caratterizza la vostra realtà. Ci sono attività e situazioni per cui è necessario puntare sull’automatizzazione dei progetti prima che sulla comunicazione di quanto si offre al mercato e altre in cui è necessario aumentare contatti e lead nella speranza di arrivare poi ad un aumento significativo di clienti. Cosa fare prima e cosa invece si può rimandare è sempre molto delicato e da valutare caso per caso anche se una regola di base, applicabile un po’ ovunque, che risponde a questo concetto: fai sapere chi sei se vuoi migliorare quello che fai.',
  'Ogni logica di mercato passa dalla legge della domanda e dell’offerta. Il problema principale di ogni azienda è farsi conoscere sul mercato e proporre i propri prodotti o servizi al pari dei concorrenti. Se un potenziale cliente conosce la mia esistenza probabilmente valuterà anche me al momento in cui deve fare una scelta. Se ho un grande prodotto, un super servizio e anche un sito web all’avanguardia ma le visite sono poche e, quindi, la percezione del mercato rispetto al mio brand è quasi nulla diventa complicato pensare di fare business. Dal punto di vista strategico, quindi, nessun dubbio sul primo canale di investimento da privilegiare in caso di scelta: la comunicazione permette di farsi conoscere, quindi aumentare visibilità e reputazione in modo da essere potenzialmente contattabili da un numero sempre maggiore di lead e interessati.',
  'Chiaramente, è questo è forse uno dei plus più importanti che il team di eWeb può mettere a disposizione del mercato, ragionare la comunicazione di un brand o di un servizio consapevoli della struttura software a disposizione permette a chi studia la strategia si privilegiare un canale piuttosto di un altro. Esempio pratico: se ci si rivolge ad un pubblico B2B, l’utilizzo di LinkedIn o delle DEM rispetto al mondo META è molto più strategico, se si ha la possibilità di creare contenuti video accattivanti anche la promozione su canali come YouTube diventa importante. Quindi sì, prediligere la comunicazione senza mai dimenticare il contesto tecnico di riferimento.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sviluppo e Comunicazione: dove devi investire? — Magazine eWeb</title>
    <meta
      name="description"
      content='Il tema degli investimenti, soprattutto in momenti come quello che stiamo vivendo dal punto di vista della situazione internazionale, è molto delicato. Dal p...'
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
