<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 4. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/php-linguaggio-programmazione-eweb/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/php-linguaggio-programmazione-eweb
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-4/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 04";
$heroTitle = 'Scriviamo codice, niente PLUG-IN. Ed è tutto VOSTRO';
$heroLead = 'Dal numero 04 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  'Nelle precedenti comunicazioni, credo si sia intuito che non utilizziamo (e non amiamo molto) i CMS commerciali, anche se c’è un rispetto di fondo per il prodotto in sé, e per chi ha scelto di proporlo e/o utilizzarlo. Quindi in eWeb scriviamo codice. Siamo consapevoli di non essere gli unici, ci mancherebbe, ma è uno degli elementi che ci caratterizza, ci distingue e non ultimo ci inorgoglisce. Non è una scelta di comodo, anzi, spesso ci mettiamo in “difficoltà” da soli. Soprattutto dal punto di vista commerciale, le soluzioni “custom” possono risultare più onerose e di conseguenza di difficile collocazione.',
  'Sviluppiamo, ecco perchè',
  'Sviluppando codice non possiamo cavalcare la reputazione altrui, appoggiandoci ad anni di esperienza, a milioni di installazioni, ecc.. Quindi perché lo facciamo?',
  'La scrittura autonoma del codice ci rende molto duttili, agili nel proporre risposte alle esigenze dei nostri clienti a cui, come amo dire, “difficilmente diciamo di no”. Il codice scritto consente cambi di direzione più rapidi, non compromette implementazioni future, consente un grado di “apertura” ottimale verso altri applicativi. E’ corretto ricordare, che queste caratteristiche non soro prerogativa esclusiva del codice scritto direttamente.',
  'Un altro valore che riconosciamo alla nostra scelta è quello di potersi smarcare dall’utilizzo e dal concetto di plug-in, evitando di conseguenza situazioni come aggiornamenti obbligatori, canoni di rinnovo, incompatibilità, ecc. Anche in questo caso, va sottolineato che non solo il codice scritto consente questi scenari. In sostanza l’elemento principale che ci lega a questa scelta è la libertà, il controllo completo delle nostre scelte e delle soluzioni che proponiamo ai nostri clienti, la sicurezza di poter seguire l’evoluzione delle idee, dei bisogni, che per definizione mutano nel tempo.',
  'Il codice è del cliente.',
  'Altro valore aggiunto importante della scelta di “campo” fatta in eWeb è il poter “cedere” completamente la proprietà del codice scritto, ai nostri clienti. Può sembrare banale se parliamo di un sito web vetrina, diventa molto serio ed importante se abbiamo a che fare con un applicativo aziendale di gestione, più o meno complesso.',
  'Inoltre alla cessione totale della proprietà del codice, aggiungiamo sempre la cessione completa della proprietà intellettuale dell’applicativo. Anche qui il riferimento è ad applicativi mediamente complessi. Mi spiego. Durante l’analisi delle richieste/esigenze, il cliente “dona” ai tecnici ed analisti di eWeb il proprio sapere il proprio knowhow aziendale, con l’obbiettivo di ricevere in “cambio” uno strumento tecnologico nuovo che aiuti ad aumentare ed efficientare l’azienda stessa.',
  'Cedendo la proprietà intellettuale del codice, eWeb cautela e tutela i suoi clienti, il “sapere” i “segreti” di gestione aziendale che vengono appresi ed utilizzati per sviluppare il progetto commissionato, rimarranno dentro quel progetto e non verranno “rivenduti” a terzi. Concludendo, queste due scelte ovvero scrittura del codice e cessione della proprietà del codice stesso ed intellettuale, danno un senso compiuto alla dimensione “artigianale” che eWeb vuol promuovere e mantenere, in un ambiente lavorativo come il nostro….. se non è una follia, quanto meno è una sfida quotidiana.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'sito-custom-vantaggi', "title" => 'Non siamo contro Wordpress, siamo per il cliente', "teaser" => '“Ah, ma fate i siti? Anche voi con Wordpress? Perché ho sentito che parlano tutti di Wordpress”. No, noi non facciamo siti.'],
  ["slug" => 'funnel-e-lead', "title" => 'Funnel e Lead, due facce della comunicazione', "teaser" => 'Ci sono tante strade per arrivare a nuovi clienti. Prima sono solo contatti, poi diventano potenziali interessati e alla fine, si spera, diventano un nuovo punto di riferimento per la vendita e l’erogazione di prodotti e/o servizi.'],
  ["slug" => 'intento-di-ricerca-llm', "title" => 'La sfida è negli intenti, non solo nelle keyword', "teaser" => 'Il 2026 sta tracciando un solco netto rispetto al passato: la ricerca online non è più una scansione di parole chiave, ma una conversazione stratificata'],
  ["slug" => 'differenze-app-webapp', "title" => 'APP NATIVE o WEB APP: che differenza c’è e quale scegliere?', "teaser" => 'È noto che la maggior parte di noi utilizza internet tramite il proprio cellulare, ovvero da mobile. E ciò si riferisce ormai a tutte le tipologie di utenti, non più solo i privati, ma anche in larga parte i professionisti, ovvero il traffico B2B tra aziende.'],
  ["slug" => 'strategia-ads-google-meta', "title" => 'La dualità della domanda: spingere o attrarre', "teaser" => 'Nel marketing digitale del 2026, la distinzione tra Google ads e Meta ads non riguarda i costi di piattaforma, ma il presidio delle diverse fasi d\'acquisto.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Scriviamo codice, niente PLUG-IN. Ed è tutto VOSTRO — Magazine eWeb</title>
    <meta
      name="description"
      content='Nelle precedenti comunicazioni, credo si sia intuito che non utilizziamo (e non amiamo molto) i CMS commerciali, anche se c’è un rispetto di fondo per il pro...'
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
            <span>Numero 04</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-4" class="link">← Numero 04 del Magazine</a>
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
