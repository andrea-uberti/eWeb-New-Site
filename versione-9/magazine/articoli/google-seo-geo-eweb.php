<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 1. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/google-seo-geo-eweb/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/google-seo-geo-eweb
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
$heroTitle = 'Google ha cambiato le regole. La nostra strategia è pronta';
$heroLead = 'La nuova SERP: risposte immediate, meno clic';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = 'Giorgio Pesenti';
$paragrafi = [
  'Per anni, il nostro obiettivo è stato chiaro: conquistare la prima posizione su Google. La pagina con i "dieci link blu" era il nostro campo di gioco e la visibilità era il traguardo.',
  'Oggi, quel campo di gioco è irriconoscibile.',
  'Da inizio 2025, aprire Google non è più consultare un elenco, ma iniziare una conversazione. L\'Intelligenza Artificiale non è più solo uno strumento: è diventata la protagonista. E questo cambia tutto per chiunque voglia essere trovato online.',
  'La prima cosa che notiamo sono gli AI Overviews: quelle risposte elaborate che Google fornisce in cima alla pagina, sintetizzando informazioni da più fonti.',
  'Il risultato? Molti utenti ottengono la risposta che cercano senza nemmeno fare clic su un link.',
  'Queste "ricerche a zero clic" sono la nostra nuova sfida principale. Il traffico che prima davamo per scontato ora viene spesso assorbito da Google stesso. I dieci link blu tradizionali non sono spariti, ma sono scivolati piu in basso nella pagina, quasi come note a piè di pagina di un vecchio sistema ormai passato.',
  'La buona notizia è che questa evoluzione premia chi ha sempre lavorato sulla qualità. Per tutti, è il momento di affinare la strategia. La SEO non è morta, è semplicemente diventata più seria.',
  'Ecco come ci stiamo muovendo (e come guideremo i nostri clienti):',
  'Il nostro ruolo si sta evolvendo. Meno tecnici SEO, più strateghi di contenuti e consulenti di brand. Il nostro compito è costruire quel valore e quella autenticità che l\'Intelligenza Artificiale è programmata per riconoscere, ma non può inventare.',
  'È un lavoro più complesso, certo. Ma porta a risultati molto più solidi e difendibili nel tempo',
  'Viviamo in un paradosso. Da un lato, usiamo strumenti AI per analizzare dati e velocizzare i processi creativi. Dall\'altro, l\'AI di Google (e non solo) è diventata un giudice incredibilmente esigente, addestrato a riconoscere e scartare contenuti di bassa qualità.',
  'Abbiamo visto tutti l\'effetto dei contenuti "sintetici" creati in massa: articoli generici, superficiali, privi di un\'esperienza reale.',
  'La reazione di Google è stata netta, premiando un solo fattore sopra tutti gli altri: l\'autenticità. Questo si lega direttamente al suo standard di qualità, noto come E-E-A-T (Esperienza, Competenza, Autorevolezza, Affidabilità).',
  'Oggi, la "E" iniziale di Esperienza è diventata fondamentale. Se si recensisce un prodotto, Google vuole la prova che lo si è usato. Se si descrive un servizio, vuole capire che dietro c\'è un essere umano competente. Non si può più fingere.',
  'Questo cambia l\'approccio alla SEO. Non basta più intercettare una singola parola chiave. L\'utente oggi conversa con Google.',
  'Si parte da "idee per un weekend in montagna" e si finisce, dopo varie domande, a chiedere se gli scarponi che si hanno a casa vanno bene per un sentiero specifico.',
  'È impossibile ottimizzare un sito per una conversazione così fluida. È possibile, però, diventare l\'esperto indiscusso di "weekend in montagna". Dobbiamo creare contenuti così approfonditi e utili da diventare la fonte autorevole a cui l\'AI di Google stessa attinge per costruire le sue risposte.',
  'L\'obiettivo non è più solo apparire nei link, ma diventare la fonte citata negli AI Overviews.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'perche-abbiamo-smesso', "title" => 'Perché abbiamo smesso di comunicare. E adesso riprendiamo.', "teaser" => 'Comunicare significa far conoscere agli altri il tuo approccio, il tuo punto di vista rispetto ad un argomento ben...'],
  ["slug" => 'progettare-bene-lavorare-meglio', "title" => 'Progettare bene per lavorare meglio', "teaser" => 'La parte di progettazione, di analisi, il tempo dedicato ad ascoltare il cliente è la parte che preferisco. In eWeb viene da ...'],
  ["slug" => 'competenze-dati-soluzioni', "title" => 'Il segreto non è essere bravi, ma farlo sapere', "teaser" => 'Essere bravi non basta, bisogna farlo sapere. Nell\'era del rumore e dell\'effetto "wow", noi rifiutiamo le scorciatoie. La nostra forza...'],
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
    <title>Google ha cambiato le regole. La nostra strategia è pronta — Magazine eWeb</title>
    <meta
      name="description"
      content='Per anni, il nostro obiettivo è stato chiaro: conquistare la prima posizione su Google. La pagina con i "dieci link blu" era il...'
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
