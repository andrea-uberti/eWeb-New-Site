<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 3. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/intelligenza-artificiale-e-futuri/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/intelligenza-artificiale-e-futuri
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-3/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 03";
$heroTitle = 'L’AI c’è ma (ancora) non si vede. Si vedrà?';
$heroLead = 'Dal numero 03 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la vediamo anche all’opera ma la sensazione diffusa, per chi non si lascia travolgere dalla narrazione di popolo secondo al quale grazie all’intelligenza artificiale tutto sarà automatizzato, standardizzato, appiattito nelle sue sfumature più belle, privo di errori e con la perfezione assoluta lì ad un passo, è che ancora non si vede davvero quello che ci si aspettava. E forse nemmeno lo si vedrà mai.',
  'Per definizione, deformazione professionale e pure per sentirsi un po’ meno “boomer” di quanto il tempo che passa non dica, sono e siamo tutti molto attenti all’evoluzione di qualsiasi cosa che ci tocca. In particolare a quanto può rendere le attività di comunicazione più efficaci, più produttive, meno costose e ancor meno dispersive. Inteso come un modo di approcciare il racconto al mondo digitale (e non solo) quello che noi o un nostro cliente vuole far arrivare nel modo il più possibile performante. Sfruttare l’intelligenza artificiale permette di accorciare la distanza tra chi innova e chi può beneficiare di quell’innovazione: un video fatto bene, un’immagine particolare, un testo di un certo tipo sono tutte cose molto concrete di cui parlare.',
  'Il tema è caldo, pensare che l’utilizzo di questi nuovi e potentissimi strumenti resterà confinato in una piccola cerchia di eletti capaci di attingere a piene mani nel nuovo “Santo Graal” digitale è quanto di più sbagliato si possa pensare perché un professionista che ottimizza tempi e modi di quanto produce e realizza dimostra come sia possibile per l’intelligenza umana “sfruttare” quella artificiale. Perché l’intelligenza artificiale ripete a velocità impressionante e combinando azioni tra loro in base a schemi e algoritmi conosciuti qualcosa che già esiste. Magari in due posti del mondo lontani e che nemmeno si conoscono, ma che ci sono.',
  'L’intelligenza artificiale propone una ricetta se chiedi cosa si può cucinare con quei 2 ingredienti oppure se indichi per quale ricorrenza vuoi cucinare, valuta se un menù è più o meno indicato per il pranzo o la cena oppure se per il pranzo di Natale o di Ferragosto. Quindi fornendo elementi, arriva una risposta. Quello che la IA non può suggerire o decidere di proporre è di mangiare un’insalata perché a pranzo hai pasteggiato con ossi buchi e polenta, oppure proporre una vellutata calda il 18 luglio a cena perché hai preso un colpo d’aria e preferisci stare leggero. A meno che, tutti i dettagli non vengano forniti nel prompt di comando. E dipende pure come li specifichi.',
  'Complessivamente, non bisogna aver nessun timore di accogliere le novità e le soluzioni che l’intelligenza artificiale propone. Allo stesso tempo, pensare che l’IA diventi improvvisamente la miglior redattrice possibile di un testo o un contenuto è qualcosa di quanto più lontano dalla realtà ci sia. E allora continuiamo a pensare, a ragionare, a proporre soluzioni e alternative. Che siano testi o programmi. Consapevoli che l’intelligenza artificiale magari un giorno prenderà questa scelta e la inserirà nelle migliaia di opzioni di risposta a disposizione ma anche certi che il prossimo pensiero, la prossima soluzione, il prossimo spunto buono arriveranno da qualcuno di umano che prova emozioni, ha delle difficoltà, ragiona e sbaglia. Perché anche gli errori servono, rendono tutto ancora più speciale.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>L’AI c’è ma (ancora) non si vede. Si vedrà? — Magazine eWeb</title>
    <meta
      name="description"
      content='Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la ved...'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-3" class="link">← Numero 03 del Magazine</a>
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
