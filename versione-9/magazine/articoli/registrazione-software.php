<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 2. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/registrazione-software/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/registrazione-software
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
$heroTitle = 'A proteggere e registrare il tuo software ci pensa eWeb!';
$heroLead = 'Dal numero 02 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Noi di eWeb ci occupiamo anche della registrazione di un software presso la SIAE.',
  'Registrare un software presso il Pubblico Registro Software della SIAE come azienda serve principalmente a:',
  'La registrazione non attribuisce nuovi diritti ma fornisce una tutela aggiuntiva in termini di prova legale della titolarità e della data di creazione/pubblicazione.',
  'Spesso le aziende ci commissionano la registrazione del software per richiedere il Patent Box (regime fiscale agevolato per i redditi derivanti dall’utilizzo di software protetto da copyright, brevetti, marchi).',
  'Di seguito proviamo a rispondere alle due domande che spesso ci vengono poste:',
  'a) Attesta ufficialmente la paternità e la data di pubblicazione del software;',
  'b) Facilita la dimostrazione della titolarità e dell’originalità dell’opera, come richiesto dalla normativa Patent Box.',
  'c) Può essere utilizzata come documentazione a supporto della domanda di agevolazione fiscale.Contattateci!',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'non-siamo-perfetti', "title" => 'Professionisti da oltre 25 anni. Ma sbagliamo anche noi.', "teaser" => 'Non c’è una ricetta certamente e completamente vincente. Non c’è la sicurezza che tutto quanto viene fatto porterà dei risultati da urlo e senza intoppi.'],
  ["slug" => 'backend-dev', "title" => 'Conta di più quello che non si vede: un buon Back-End', "teaser" => 'Argomento tecnico, ma non solo. Quello che sta “dietro le quinte” è spesso la parte più importante, più pragmatica ed al tempo stesso invisibile del lavoro che svolgiamo, ciò che consente di raggiungere ottimi risultati “visivi” e “funzionali” per il pubblico.'],
  ["slug" => 'canali-migliori-comunicazione', "title" => 'Farsi conoscere. Come? Ti aiuta eWeb', "teaser" => 'Il segreto del successo di un’attività, di un servizio o di un prodotto non è nel valore di quanto viene proposto ma nella capacità di far conoscere al più ampio pubblico possibile di quello che si mette sul mercato'],
  ["slug" => 'seo-ai-mode', "title" => 'Dalla SERP all\'AI Mode: la nuova architettura della visibilità digitale', "teaser" => 'Per vent’anni il contratto implicito tra noi e Google è stato chiaro: noi fornivamo i contenuti, il motore forniva l’indicizzazione'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>A proteggere e registrare il tuo software ci pensa eWeb! — Magazine eWeb</title>
    <meta
      name="description"
      content='Noi di eWeb ci occupiamo anche della registrazione di un software presso la SIAE.'
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
            <span>Numero 02</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-2" class="link">← Numero 02 del Magazine</a>
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
