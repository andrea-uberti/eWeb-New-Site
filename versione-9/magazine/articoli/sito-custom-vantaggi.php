<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 4. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/sito-custom-vantaggi/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/sito-custom-vantaggi
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
$heroTitle = 'Non siamo contro Wordpress, siamo per il cliente';
$heroLead = 'Dal numero 04 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  '“Ah, ma fate i siti? Anche voi con Wordpress? Perché ho sentito che parlano tutti di Wordpress”.',
  'No, noi non facciamo siti. E no, ancora una volta, non utilizziamo la piattaforma Wordpress.',
  'Scelta consapevole, posizione forte',
  'La scelta di eWeb, che ho personalmente abbracciato da quando ormai qualche anno fa ho scelto di seguire la comunicazione in questo “ufficio a vetri” di via Broseta 101/G, è qualcosa che agli occhi distratti di chi si fa colpire solo dal nome, dal brand e dalla sua diffusione, può sembrare folle. Controcorrente. Ed invece proprio questa voglia di fare qualcosa di davvero personalizzato, “tailor made” come si dice pensando al mondo della moda, è ciò che permetterà al cliente di avere un prodotto unico. Costruito in base alle sue esigenze, modulabili e modificabili in base alle necessità. Qualcosa di estremamente versatile che va solo “comunicato” bene per far comprendere al cliente le piene e complete possibilità del software che ha in mano.',
  'Prima di tutto, perché noi “non facciamo i siti”. Tecnicamente si parla di sito web quando viene “acceso” uno spazio su internet che è raggiungibile grazie ad un indirizzo e contiene informazioni, di qualsiasi natura, rispetto ad un prodotto o un servizio ma anche ad una semplice iniziativa senza scopo di lucro. La nostra concezione di “sito” è un po’ più complessa e l’idea è sempre quella di analizzare, costruire, impostare e manutenere portali che diano la possibilità al nostro cliente di farsi notare, creare connessioni, trovare a sua volta clienti interessati e quindi sfruttare le enormi potenzialità del web per migliorare la sua presenza digitale. Magari mantenendo aperta quella porta sempre poco considerata delle integrazioni con i sistemi interni. Perché è lì, nella capacità di un sistema di connettersi ad un altro sistema per fare rete e quindi mettere a disposizione (oppure recepire) informazioni strutturate che nascono opportunità importanti per crescere e migliorare.',
  'Wordpress? No, grazie',
  'Detto di come intendiamo noi i “siti”, il perché non usiamo Wordpress. Scegliere la via del “100% custom” significa mettersi dalla parte del cliente. Ovvero ascoltare una richiesta, stendere le specifiche, realizzare quanto concordato e consegnarlo a chi lo ha commissionato. Non ci sono plug-in o template da aggiornare, non ci sono strutture “pre-confezionate” che, pur essendo molto diffuse e quindi particolarmente testate e migliorare, rischiano di diventare vecchie ma soprattutto di uscire dal controllo di chi paga. Perché avere un portale fatto con Wordpress significa in qualche modo restare sempre collegati a chi quella piattaforma la manda avanti. La modifica una volta per tutte, la aggiorna oppure non la tocca per anni. E nel momento in cui serve fare qualcosa, dopo un po’ di tempo senza metterci le mani, arrivano problemi imprevisti.',
  'Un nuovo portale, realizzato da eWeb in modo totalmente personalizzato, resta di proprietà del cliente ed essendo realizzato con linguaggi e tecniche “open source” si può modificare, gestire, manutenere nel tempo senza particolari problemi. E solo se il cliente lo vorrà. Questa scelta può sembrare controcorrente ma, in realtà, è semplicemente il modo migliore, secondo noi, di andare incontro alle necessità di chi ci contatta per aumentare, migliorare, costruire piuttosto che rinfrescare la sua presenza digitale. E l’obiettivo è quello di agevolare il cliente, dare una soluzione di alto livello ed evitare che lo stesso cliente resti legato ad una tecnologia. Se è contento, speriamo possa ricontattare eWeb e non preoccuparsi di un plug-in.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'php-linguaggio-programmazione-eweb', "title" => 'Scriviamo codice, niente PLUG-IN. Ed è tutto VOSTRO', "teaser" => 'Nelle precedenti comunicazioni, credo si sia intuito che non utilizziamo (e non amiamo molto) i CMS commerciali, anche se c’è un rispetto di fondo per il prodotto in sé, e per chi ha scelto di proporlo e/o utilizzarlo.'],
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
    <title>Non siamo contro Wordpress, siamo per il cliente — Magazine eWeb</title>
    <meta
      name="description"
      content='“Ah, ma fate i siti? Anche voi con Wordpress? Perché ho sentito che parlano tutti di Wordpress”. No, noi non facciamo siti.'
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
