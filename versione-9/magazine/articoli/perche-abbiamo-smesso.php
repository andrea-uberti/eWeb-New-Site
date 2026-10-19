<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 1. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/perche-abbiamo-smesso/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/perche-abbiamo-smesso
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-1/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 01";
$heroTitle = 'Perché abbiamo smesso di comunicare. E adesso riprendiamo.';
$heroLead = 'Dal numero 01 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = 'Fabio Gennari';
$paragrafi = [
  'Comunicare significa far conoscere agli altri il tuo approccio, il tuo punto di vista rispetto ad un argomento ben definito. Quanto questo argomento sia specifico o generale, tecnico o concettuale, di nicchia o popolare poco importa. Per dire qualcosa, tuttavia, bisogna avere qualcosa da dire. E, nella declinazione più bergamasca possibile del concetto, per dire qualcosa è necessario fare qualcosa che poi si possa raccontare.',
  'Noi di eWeb siamo abituati a guardarci allo specchio. Le situazioni capitano, i lavori si commissionano, le soluzioni si trovano. Tutto sta nel trovare il tempo giusto per fare ogni cosa, cercando di seguire al meglio i clienti per garantire un lavoro di qualità e allo stesso tempo non perdere il contatto con il mercato, le innovazioni e tutto quello che insiste sul mondo della comunicazione e della progettazione di soluzioni software.',
  'Nel tempo in cui non ci hai letto abbiamo fatto tante cose. Siamo cresciuti, siamo un po’ cambiati ma anche un po’ rimasti quelli di sempre. Certamente ci siamo organizzati e da oggi parte una nuova avventura in cui, comunicativamente parlando, vogliamo cambiare marcia. Pensiamo di poter fare qualcosa di importante, parlando di quanto ogni giorno ci coinvolge e ci fa riflettere prima di trovare soluzioni ma anche di come, per porsi al mercato nel modo migliore, sia necessario intervenire in ciascuno degli ambiti che ci competono.',
  'Riprendiamo a comunicare cercando di non derogare a due principi in cui crediamo fortemente: la qualità e le persone. Quando ci caliamo in un progetto cerchiamo di farlo al meglio e senza preconcetti. C’è una richiesta, la studiamo e la analizziamo per mettere a disposizione del cliente la nostra visione, la nostra esperienza, la nostra professionalità. Per farlo, eWeb ha costruito un team di lavoro dove tutti sanno cosa fanno tutti ma ognuno ha la sua specificità. La dimostrazione di quanto dico è nelle firme, ma anche nei volti, che trovi in questa mail: aree diverse, professionalità diverse, persone diverse.',
  'Inizia un nuovo viaggio in cui Pietro, Federica, Andrea, Giorgio, Simone e Doudou faranno qualcosa di diverso dal solito: raccontare quello che sanno fare. Io, Fabio, lo faccio ogni giorno per tanti nostri clienti e credo che sia il momento giusto per spiegarlo, per bene, a tutti. È vero, da un po’ abbiamo smesso di comunicare. Ma adesso riprendiamo, con un sacco di cose da dire.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'progettare-bene-lavorare-meglio', "title" => 'Progettare bene per lavorare meglio', "teaser" => 'La parte di progettazione, di analisi, il tempo dedicato ad ascoltare il cliente è la parte che preferisco. In eWeb viene da ...'],
  ["slug" => 'competenze-dati-soluzioni', "title" => 'Il segreto non è essere bravi, ma farlo sapere', "teaser" => 'Essere bravi non basta, bisogna farlo sapere. Nell\'era del rumore e dell\'effetto "wow", noi rifiutiamo le scorciatoie. La nostra forza...'],
  ["slug" => 'google-seo-geo-eweb', "title" => 'Google ha cambiato le regole. La nostra strategia è pronta', "teaser" => 'Per anni, il nostro obiettivo è stato chiaro: conquistare la prima posizione su Google. La pagina con i "dieci link blu" era il...'],
  ["slug" => 'ai-bolla-o-futuro', "title" => 'L’AI è una bolla o la chiave per il futuro?', "teaser" => 'CAP. 1 - Ma è corretto o fuorviante chiamarla intelligenza?'],
  ["slug" => 'marchio-registrato-con-eweb', "title" => 'Registrazione marchio: il valore della tutela (e come ottenerla per il tuo brand)', "teaser" => 'Il tuo marchio è davvero tuo? La registrazione garantisce l\'esclusiva e la tutela legale. Scopri il valore strategico (e il simbolo ®) e...'],
  ["slug" => 'novembre-da-non-perdere', "title" => 'Prendi il calendario, ci sono scadenze che non puoi mancare!', "teaser" => 'Novembre, la fine dell\'anno è vicina ma si pensa già al futuro. Ai prossimi mesi. Attenzione, però: segna bene tutto quello che può...'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perché abbiamo smesso di comunicare. E adesso riprendiamo. — Magazine eWeb</title>
    <meta
      name="description"
      content='Comunicare significa far conoscere agli altri il tuo approccio, il tuo punto di vista rispetto ad un argomento ben...'
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
            <span>Numero 01</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-1" class="link">← Numero 01 del Magazine</a>
          </p>
        </div>
      </section>

      <?php include __DIR__ . "/../../inc/magazine-related.php"; ?>

      <?php include __DIR__ . "/../../inc/service-cta.php"; ?>
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
