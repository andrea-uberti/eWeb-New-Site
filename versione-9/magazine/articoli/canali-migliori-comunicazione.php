<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 2. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/canali-migliori-comunicazione/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/canali-migliori-comunicazione
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-2/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 02";
$heroTitle = 'Farsi conoscere. Come? Ti aiuta eWeb';
$heroLead = 'Dal numero 02 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Il segreto del successo di un’attività, di un servizio o di un prodotto non è nel valore di quanto viene proposto ma nella capacità di far conoscere al più ampio pubblico possibile di quello che si mette sul mercato. Il ragionamento è molto semplice ma complicato da mettere in pratica, solo conoscenza e intuito, capacità di analizzare mercato e potenziale cliente oltre ai giusti strumenti da utilizzare per ciascun tipo di business possono portare a centrare gli obiettivi.',
  'Quando parliamo di “più ampio pubblico possibile” non intendiamo tutto il mondo. Ci sono attività, come ad esempio la disidratazione dei fanghi, che interessano solo una porzione delle aziende presenti sul mercato ma far sapere a gran parte delle realtà di quel settore che il nostro cliente è un punto di riferimento da tenere in grande considerazione è un obiettivo reale e concreto da perseguire. Chiaro che il bacino d’utenza di chi ha bisogno di occhiali da sole o di un materasso, di capsule caffè o organizzare un evento tipo matrimonio, di chi è interessato ad un DAE – Defibrillatore Automatico Esterno o di mezzi per il trasporto cavalli non è lo stesso, riconoscerne le caratteristiche e lavorare in funzione di quelle è però decisivo nel nostro percorso di lavoro.',
  'Anche quando si parla della localizzazione del bacino d’utenza che può essere interessato ad un prodotto o un servizio bisogna fare grande attenzione. Ci sono realtà che si propongono su scala nazionale e altri, avendo una piscina o un centro medico, che vogliono farsi notare da tutti quelli nell’arco di qualche chilometro. L’obiettivo è lo stesso, farsi conoscere. I mezzi da utilizzare però cambiano profondamente e in questo caso, su quella seggiola lì di fianco, ci sediamo volentieri noi. Per trovare, insieme, la soluzione migliore.',
  'Nel corso di questi anni ci siamo imbattuti in diverse forme di comunicazione. Digitale ma anche cartacea, organica e a pagamento, dentro e fuori dalle piattaforme social. Nel prossimo Magazine di eWeb racconteremo un po’ la differenza tra un sito web, le DEM (Direct Email Marketing) e le ADS di Google piuttosto che Meta ma è giusto sottolineare come l’approccio verso la comunicazione vecchio stile, volantinaggio e vetrofanie, non sia da noi esclusa a priori. Perché i clienti non sono tutti uguali, perché quello che va comunicato non è sempre uguale e perché capire quale sia la strada migliore da percorrere si capisce solo analizzando insieme necessità e obiettivi. Per carsi conoscere. Come? Ti aiuta eWeb.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Farsi conoscere. Come? Ti aiuta eWeb — Magazine eWeb</title>
    <meta
      name="description"
      content='Il segreto del successo di un’attività, di un servizio o di un prodotto non è nel valore di quanto viene proposto ma nella capacità di far conoscere al più a...'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-2" class="link">← Numero 02 del Magazine</a>
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
