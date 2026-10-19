<?php
/* Pagina di un singolo numero del Magazine (newsletter eWeb) — non una
   pagina di servizio (niente service-cta/related.php, stesso principio di
   ../magazine.php). Contenuto reale (titoli/teaser/autore) recuperato dal
   sito storico, come i singoli articoli (vedi magazine/articoli/*.php,
   ora migrati qui: ogni voce della lista sotto apre una pagina interna,
   non più il sito storico). URL vecchio non mantenuto (l'utente ha detto
   esplicitamente di non curarsene): qui tutti i numeri vivono sotto
   /magazine/educational-N, indipendentemente da come si chiamavano sul
   sito storico (magazine-1/2/3, edicational-4, educational-5/6 —
   incoerenza che non riprendiamo). */
require __DIR__ . "/../inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home

// Variabili per inc/service-hero.php (vedi lì) — riusato come hero
// generico, come in ../magazine.php.
$heroCategory = "Magazine";
$heroTitle = 'Numero 03.<br /><em>6 articoli, raccolti qui.</em>';
$heroLead = 'La newsletter di eWeb, numero per numero — qui sotto gli
  articoli di questa uscita, in ordine.';

// Contenuto reale di questo numero (titolo/teaser/autore quando presente),
// recuperato dal sito storico — vedi commento sopra. "slug" è il file in
// magazine/articoli/<slug>.php (l'URL pubblico è /magazine/<slug>).
$articoli = [
  ["title" => 'L’AI c’è ma (ancora) non si vede. Si vedrà?', "teaser" => 'Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la vediamo anche all’opera ma la sensazione diffusa, per chi non si lascia travolgere dalla narrazione di popolo secondo al quale grazie all’intelligenza artificiale tutto sarà automatizzato, standardizzato, appiattito nelle sue sfumature più belle, privo di errori e con la perfezione assoluta lì ad un passo, è che ancora non si vede davvero quello che ci si aspettava. E forse nemmeno lo si vedrà mai.', "author" => null, "slug" => 'intelligenza-artificiale-e-futuri'],
  ["title" => 'Le novità non son sempre una buona cosa', "teaser" => 'Questo mese il tema è particolarmente caldo. Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un discorso sulla “cucina” durante una cena “italiana”.', "author" => null, "slug" => 'novita-subito-o-quando-matura'],
  ["title" => 'Sito, Dem e Social: le differenze', "teaser" => 'Tre mondi legati a doppio filo l’uno all’altro che, paradossalmente, non hanno unitariamente la stessa forza che invece acquisiscono se vengono visti d’insieme. Per un’azienda, il sito web e i profili social sono veicoli formidabili di comunicazione perché permettono di accedere alle informazioni più importanti in modo organizzato, preciso e dettagliato. Le DEM, acronimo di Direct Email Marketing, sono invece delle comunicazioni a mezzo posta elettronica da inviare a destinatari o gruppi di destinatari con informazioni specifiche.', "author" => null, "slug" => 'differenze-dem-social-siti'],
  ["title" => 'SERP, Num=100 e la storia dei colossi caduti', "teaser" => 'L\'analisi dell\'impatto del parametro num=100 e la sua interazione con strumenti come Google Search Console rappresenta un caso di studio fondamentale per i professionisti del digital marketing. Anche se Google ha limitato l\'uso diretto di questo parametro nell\'URL per l\'utente finale, il concetto di visualizzazione estesa rimane un pilastro per l\'analisi avanzata.', "author" => null, "slug" => 'seo-num100-effetti-serp'],
  ["title" => 'Ma cosa ne sappiamo di AI?', "teaser" => 'Di intelligenza artificiale ne sentiamo parlare costantemente, ma in concreto come la utilizziamo? Ho condotto alcuni sondaggi e sono emersi vari utilizzi che identificano alcune interessanti tipologie e tecniche di applicazione', "author" => null, "slug" => 'ai-bolla-o-futuro-2'],
  ["title" => 'Protezione del marchio negli annunci Google ADS', "teaser" => 'Quando un inserzionista pubblica un annuncio ADS su Google significa che “acquista” una o più parole chiave.', "author" => null, "slug" => 'protezione-marchio-googleads'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Magazine #03 — eWeb</title>
    <meta
      name="description"
      content='Il numero 03 della newsletter eWeb: si apre con «L’AI c’è ma (ancora) non si vede. Si vedrà?», e altri 5 articoli.'
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

    <?php include __DIR__ . "/../inc/header.php"; ?>

    <main id="top">
      <?php include __DIR__ . "/../inc/service-hero.php"; ?>

      <!-- ============ ARTICOLI DI QUESTO NUMERO ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">In questo numero</span>
              <h2 class="h2 reveal-lines">
                Gli articoli,<br /><em>uno via l'altro.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Un articolo via l'altro, in ordine.
          </p>
          <ul class="service-related__list">
            <?php foreach ($articoli as $i => $a): ?>
              <li class="reveal">
                <a
                  class="service-related__link"
                  href="<?php echo BASE_URL . "/magazine/" . $a["slug"]; ?>"
                >
                  <span class="service-related__link-num"><?php echo str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></span>
                  <span class="service-related__link-body">
                    <span class="service-related__link-text"><?php echo htmlspecialchars($a["title"]); ?></span>
                    <span class="service-related__link-teaser"><?php echo htmlspecialchars($a["teaser"]); ?><?php echo $a["author"] ? " — di " . htmlspecialchars($a["author"]) : ""; ?></span>
                  </span>
                  <span class="btn__arrow">→</span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine" class="link">← Tutti i numeri</a>
          </p>
        </div>
      </section>
    </main>

    <?php include __DIR__ . "/../inc/footer.php"; ?>

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
