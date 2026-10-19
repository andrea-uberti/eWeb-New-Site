<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 5. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/come-comunichiamo/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/come-comunichiamo
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
$heroTitle = 'Testi, foto, video e niente AI: come COMUNICA eWeb';
$heroLead = 'Dal numero 05 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Non c’è un modo solo di comunicare.',
  'Lo abbiamo sperimentato, lo vediamo ogni giorno e in tutti i progetti che cerchiamo di ideare, strutturare, realizzare e portare a termine.',
  'Nel 2026 fare un lavoro come il nostro, ovvero trovare lo spazio giusto per far passare il messaggio più importante, preciso e diretto possibile, non può restare confinato in una singola definizione d’ambito. Questo significa che eWeb non usa solo i testi, le foto o i video per produrre i contenuti necessari all’adempimento delle proprie attività ma viene fatto quello che mi piace definire come un “miscuglio ragionato” in grado di sollecitare diverse corde.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'developer-per-passione', "title" => 'Mettiamo le mani nel DB, sempre', "teaser" => 'Partiamo dall’inizio, l’acronimo DB sta per Database.'],
  ["slug" => 'piano-editoriale-in-soccorso', "title" => 'Il Piano Editoriale ti salva la faccia (e non solo)', "teaser" => 'Quando si stende un piano di comunicazione, il primo passo è decidere quando affrontare un argomento e contestualizzarne la pubblicazione rispetto agli altri spunti che caratterizzano il progetto.'],
  ["slug" => 'vincono-le-risposte', "title" => 'Vincono le risposte, parliamo di FAQ', "teaser" => 'In un mondo dell’informazione digitale che sempre di più si sbilancia verso i motori di ricerca, con le relative regole che diventano quindi mandatorie, la produzione dei contenuti non può non tener conto di quanto i discorsi vengano messi costantemente in primo piano.'],
  ["slug" => 'affidati-a-una-agenzia-di-valore', "title" => 'Perché dovrei affidarmi ad un’agenzia?', "teaser" => 'Da quando lavoro in eWeb in tantissimi (soprattutto miei ex colleghi) mi chiedono: “ma che cosa fate di così speciale? I social dell’azienda di mio marito/cugino/zio li gestisce mio figlio/nipote, ect… anche il sito glie l’ha fatto lui! Perché venire da voi?”'],
  ["slug" => 'comunicare-con-video', "title" => 'Comunicazione Video eWeb', "teaser" => 'Ciascuna delle nostre aziende ha la necessità di comunicare. I canali ed i linguaggi attraverso i quali può farlo sono molteplici. In questo articolo ci concentriamo sull’utilizzo dei video.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Testi, foto, video e niente AI: come COMUNICA eWeb — Magazine eWeb</title>
    <meta
      name="description"
      content='Non c’è un modo solo di comunicare. Lo abbiamo sperimentato e lo vediamo ogni giorno.'
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
            <span>Numero 05</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-5" class="link">← Numero 05 del Magazine</a>
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
