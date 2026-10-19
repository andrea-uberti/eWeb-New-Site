<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 6. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/qualita-al-giusto-prezzo/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/qualita-al-giusto-prezzo
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
$heroTitle = 'Qualità e prezzo NON vanno sempre a braccetto';
$heroLead = 'Dal numero 06 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'No, i prodotti digitali non sono tutti uguali. Su altre newsletter come quella che stai leggendo, anche nel recente passato, abbiamo cercato di affrontare i temi posti dall’entrata in scena dell’IA (abbreviamo all’italiana, Intelligenza Artificiale) e la stesura dei testi ma anche la soluzione per aziende che cercano siti veloci a poco prezzo sono senza dubbio questioni che si possono smarcare anche con un prompt fatto bene. Il problema è sempre l’aspettativa, perché un progetto serio presuppone un’analisi di un certo tipo, scelte tecniche ponderate in base al contesto e tutta una serie di attività, pre e post rilascio, che non possono viaggiare su binari paralleli rispetto ai dettagli economici sul tavolo.',
  'EWeb è una realtà in cui si cercano di fare le cose al meglio spendendo il giusto. Quel giusto non è legato alle aspettative di chi compra (che vuole tanto spendendo poco) o di chi vende (che vuole marginare tanto lavorando meno), il giusto è la soddisfazione del cliente per il progetto che ha in mente impiegando tempo, professionalità e risorse interne senza esagerare nei costi ma nemmeno fungendo da ONLUS. Il segreto, come sempre, è l’equilibrio ma prima di tutto è necessario comprendere che persone che recepiscono esigenze e progettano una soluzione che poi realizzano non devono costare poco. Devono costare il giusto. Quanto sia quantificabile questo “giusto” lo decidono tanti fattori ma è bene essere subito molto chiari: se stai cercando, ad esempio, un sito vetrina che sia integrato con il gestionale aziendale e abbia un e-commerce automatizzato e pronto in poco tempo ti serve un progetto, non un prezzo shock.',
  'Sembrano concetti scontati ma la percezione della qualità e del peso del lavoro che viene realizzato a fronte di una necessità aziendale è ciò che permette di valutare al meglio una proposta. Noi di eWeb cerchiamo di porci di fronte ad ogni progetto, che è sempre custom visto che non utilizziamo Wordpress o altre soluzioni pre-confezionate o configurate, con l’umiltà di chi si mette a fianco del cliente per comprendere, progettare e realizzare. Non la convinzione di avere già tutto pronto, magari adattabile, commercialmente appetibile ma all’atto pratico poco utilizzabile. Quindi torniamo al titolo di questo spunto: la qualità e il prezzo NON vanno sempre a braccetto, soprattutto se si pensa che basta un prompt fatto bene per risolvere tutti i problemi.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'hosting-aruba-business', "title" => 'Usiamo e rivendiamo Hosting ARUBA BUSINESS', "teaser" => 'La scelta aziendale di vendere o non rivendere servizi IT di terze parti è stata sul tavolo di eWeb per diverso tempo, non vi nascondiamo il fatto che eravamo propensi e conviti di scegliere la strada del no. Ci sono ragioni valide che davano forza a questo pensiero. Anni di esperienza pre eWeb di forniture e di “rotture”, tecniche ed umane.'],
  ["slug" => 'sviluppo-e-comunicazione', "title" => 'Sviluppo e Comunicazione: dove devi investire?', "teaser" => 'Il tema degli investimenti, soprattutto in momenti come quello che stiamo vivendo dal punto di vista della situazione internazionale, è molto delicato. Dal punto di vista digitale, il dibattito è spesso concentrato su due filoni che solo all’apparenza sono “slegati”: sviluppo e comunicazione. Giusto cercare di migliorare gli strumenti interni per lavorare meglio oppure comunicare all’esterno?'],
  ["slug" => 'analisi-seo-fatta-bene', "title" => 'Analisi SEO, solo software PROFESSIONALI', "teaser" => 'Quando si mette on-line un nuovo portale o si alimenta un blog con nuovi contenuti, l’aspettativa è quella di vedere le nuove pagine già rintracciabili sulla SERP di Google dopo pochi giorni. Si passa dall’indicizzazione al successivo posizionamento e si “pesa” una keyword in base a diversi parametri, per capire quanto questa intrecci l’interesse del pubblico e quanto porti contatti e nuovi lead.'],
  ["slug" => 'le-due-anime-di-eweb', "title" => 'eWeb ha due anime, Dev e Com: perché questo fa la differenza', "teaser" => 'eWeb ha due anime, Dev e Com: perché questo fa la differenza'],
  ["slug" => 'realizziamo-il-tuo-crm', "title" => 'Realizziamo il tuo CRM', "teaser" => 'Dentro i processi aziendali ci sono tanti dettagli che caratterizzano, dati che fanno prendere decisioni, problemi che si possono risolvere solo se si conoscono. Spesso questi aspetti vengono sottovalutati e si ragiona soltanto sulla realizzazione di un sito internet (magari vetrina) che garantisca una presenza on-line ma, di fatto, senza interconnessioni che permettano di fare quel passo in più, quel qualcosa di più strutturato e armonizzato che si possa considerare davvero funzionale alle analisi e agli obiettivi aziendali.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Qualità e prezzo NON vanno sempre a braccetto — Magazine eWeb</title>
    <meta
      name="description"
      content='No, i prodotti digitali non sono tutti uguali. Su altre newsletter come quella che stai leggendo, anche nel recente passato, abbiamo cercato di affrontare i ...'
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
            <span>Numero 06</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-6" class="link">← Numero 06 del Magazine</a>
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
