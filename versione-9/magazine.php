<?php
/* Pagina Magazine — non è una pagina di servizio (non è nel catalogo
   $SERVICE_PAGES/inc/config.php, niente service-cta finale): il suo scopo
   è raccogliere iscrizioni alla newsletter, non vendere un servizio.
   In radice come index.php/invia.php (non in pages/<categoria>/), quindi
   nessuna nuova regola .htaccess: già coperta da quella generica "URL
   senza estensione -> stesso nome .php".
   I 6 numeri già usciti vivono ancora solo sul sito storico
   (ewebsolution.it) — non ancora migrati qui — quindi la sezione "numeri
   usciti finora" linka fuori, target="_blank", invece di fingere pagine
   locali che non esistono. */
require __DIR__ . "/inc/config.php";
$annoCorrente = date("Y");
$menuBase = BASE_URL . "/"; // logo e menu puntano alla home, non sono ancore di questa pagina

// Variabili per inc/service-hero.php (vedi lì) — riusato qui come hero
// generico, non è specifico alle pagine di servizio.
$heroCategory = "Magazine";
$heroTitle = "Il Magazine eWeb.<br /><em>Quello che impariamo, te lo mandiamo noi.</em>";
$heroLead = 'Niente promozioni ogni due giorni: una email quando abbiamo
  davvero qualcosa da dire — SEO, marketing, strumenti, cose imparate
  lavorando sul campo, non teoria riciclata.';

// I 6 numeri già pubblicati, ancora sul sito storico (vedi commento sopra).
$numeriPrecedenti = [
  ["num" => "01", "url" => "https://www.ewebsolution.it/magazine/scopri/educational-1/"],
  ["num" => "02", "url" => "https://www.ewebsolution.it/magazine/scopri/educational-2/"],
  ["num" => "03", "url" => "https://www.ewebsolution.it/magazine/scopri/educational-3/"],
  ["num" => "04", "url" => "https://www.ewebsolution.it/magazine/scopri/educational-4/"],
  ["num" => "05", "url" => "https://www.ewebsolution.it/magazine/scopri/educational-5/"],
  ["num" => "06", "url" => "https://www.ewebsolution.it/magazine/scopri/educational-6/"],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Magazine — eWeb</title>
    <meta
      name="description"
      content="Iscriviti alla newsletter di eWeb: SEO, marketing e strumenti, solo quando abbiamo davvero qualcosa da dire. Bergamo."
    />
    <meta name="theme-color" content="#044d8b" />

    <!-- Favicon: la graffa del logo ("eWeb}"), colorata in navy — vedi assets/img/favicon.ico/generazione in memoria di progetto. -->
    <link rel="icon" href="assets/img/favicon.ico" sizes="any" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16.png" />
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Inter+Tight:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="custom/css/style.css" />
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

    <?php include __DIR__ . "/inc/header.php"; ?>

    <main id="top">
      <?php include __DIR__ . "/inc/service-hero.php"; ?>

      <!-- ============ ISCRIZIONE ============ -->
      <section class="service-section service-section--light" data-theme="light">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">Iscriviti</span>
              <h2 class="h2 reveal-lines">
                Non promettiamo niente<br /><em>di esagerato.</em>
              </h2>
            </div>
            <span class="brace service-section__head-brace" aria-hidden="true"></span>
          </div>
          <p class="body-l reveal">
            Un'email ogni tanto, solo quando c'è davvero qualcosa da dire
            — niente calendario editoriale da riempire a tutti i costi.
            Puoi disiscriverti quando vuoi, da ogni email che ricevi.
          </p>

          <!-- .finale__form/.field/.finale__form-foot/.form__status: stessa
               classe del form contatti in home (vedi index.php), riusata
               qui per lo stesso trattamento visivo — vedi i commenti su
               .finale__form in style.css per il motivo (niente CSS
               duplicato per un componente identico). initForm() in
               script.js seleziona ".finale__form" nel documento corrente:
               siccome ogni pagina ne carica al massimo uno, funziona qui
               senza bisogno di generalizzare quella funzione. -->
          <form
            class="finale__form magazine-form"
            action="iscriviti"
            method="post"
            novalidate
            data-success="Fatto! Controlla la posta: la prima email arriva al prossimo numero."
          >
            <input
              type="text"
              name="azienda"
              class="finale__form-hp"
              tabindex="-1"
              autocomplete="off"
              aria-hidden="true"
            />
            <div class="field">
              <input type="email" name="email" placeholder=" " required /><span
                >Email</span
              >
            </div>
            <label class="form-consent">
              <input type="checkbox" name="consenso" required />
              <span
                >Acconsento al trattamento dei dati per ricevere la
                newsletter, secondo la
                <a href="#" class="link">Privacy Policy</a>.</span
              >
            </label>
            <div class="finale__form-foot">
              <button type="submit" class="btn btn--solid" data-magnetic>
                <span class="btn__text">Iscrivimi</span>
                <span class="btn__arrow">→</span>
              </button>
              <p class="form__status" role="status"></p>
            </div>
          </form>
        </div>
      </section>

      <!-- ============ NUMERI PRECEDENTI ============ -->
      <section class="service-section service-section--dark" data-theme="dark">
        <div class="container">
          <div class="service-section__head">
            <div class="service-section__head-text">
              <span class="eyebrow eyebrow--muted">I numeri usciti finora</span>
              <h2 class="h2 reveal-lines">
                Sei numeri,<br /><em>ancora sul vecchio sito.</em>
              </h2>
            </div>
          </div>
          <p class="body-l reveal">
            Non ancora trasferiti qui — per ora restano leggibili dove
            sono nati.
          </p>
          <ul class="service-related__list">
            <?php foreach ($numeriPrecedenti as $n): ?>
              <li class="reveal">
                <a
                  class="service-related__link"
                  href="<?php echo htmlspecialchars($n["url"]); ?>"
                  target="_blank"
                  rel="noopener"
                >
                  <span class="service-related__link-num"><?php echo $n["num"]; ?></span>
                  <span class="service-related__link-body">
                    <span class="service-related__link-text">Numero <?php echo $n["num"]; ?></span>
                    <span class="service-related__link-teaser">Sul sito storico, si apre in un'altra scheda</span>
                  </span>
                  <span class="btn__arrow">→</span>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
    </main>

    <?php include __DIR__ . "/inc/footer.php"; ?>

    <!-- ============ COOKIE BANNER ============ -->
    <div class="cookie-banner" data-cookie-banner hidden>
      <p>
        Usiamo cookie tecnici necessari al funzionamento del sito. Con il
        tuo consenso carichiamo anche la mappa di Google, che pianta
        cookie di terze parti.
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
    <script src="custom/functions/script.js"></script>
  </body>
</html>
