<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 6. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/hosting-aruba-business/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/hosting-aruba-business
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
$heroTitle = 'Usiamo e rivendiamo Hosting ARUBA BUSINESS';
$heroLead = 'Dal numero 06 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'La scelta aziendale di vendere o non rivendere servizi IT di terze parti è stata sul tavolo di eWeb per diverso tempo, non vi nascondiamo il fatto che eravamo propensi e conviti di scegliere la strada del no. Ci sono ragioni valide che davano forza a questo pensiero. Anni di esperienza pre eWeb di forniture e di rotture, tecniche ed umane.',
  'La rivendita include il fatto che ci si assume la responsabilità della qualità e serietà di qualcun altro. Non è una banalità, non è un gioco. La faccia (e non solo) la metti tu, in relazione al lavoro e al prodotto di un operatore che non conosci, di un’entità astratta spesso più grande di te, con tutte le conseguenze del caso.',
  'Nelle esperienze passate, quelle a cui facevo riferimento, ci siamo trovati spesso a dover far fronte a mancanze, leggerezze, malfunzionamenti del tutto estranei alle nostre competenze o in questo caso incompetenze. I risultati erano telefonate di scuse, telefonate dove si incassavano lamentele più o meno giustificate (più o meno educate) e altre situazioni su questo canovaccio.',
  'Capite bene che la non intenzione di rivendere era ben motivata.',
  'Perché allora eWeb oggi, e da tempo ormai, rivende Hosting? Semplice, più o meno, prima di essere fornitori, siamo clienti di servizi di Hosting. Sulla nostra strada professionale, abbiamo avuto l’occasione di conoscere persone di spessore, tecnico ed umano, e tra queste un direttore e tecnico della prima Aruba. L’azienda italiana, nata a Firenze a metà anni 90, che ha dato una forte accelerata al mondo web in Italia.',
  'Questo signore ci accompagnò a visitare il neonato Data Center Aruba di Ponte San Pietro e ci parlò dei servizi di Aruba Business. Proprio in quel periodo stavamo affrontato un progetto importante in cui ci venivano richieste garanzie tecniche, prestazionali e di sicurezza, delegando a noi la scelta del fornitore partner. Gettammo il cuore oltre l’ostacolo e con quel pizzico di incoscienza che a volte serve, scegliemmo Aruba Business.',
  'Era il 2017, sono passati 9 anni e siamo ancora clienti felici di Aruba Business e ovviamente ne siamo diventati, altrettanto felici, rivenditori. La felicità non sta però nel fatturato, ma nella risposta a quella paura iniziale. Negli anni non abbiamo avuto problemi seri di nessun tipo, le normali oscillazioni di servizio, sono sempre state gestite in modo ottimale (avvisi di manutenzioni programmate, risposte immediate ed esaustive a richieste di assistenza, servizi di consulenza puntuali).',
  'Potremmo ora andare avanti per pagine e pagine di lodi e pregi di Aruba Business, ma credo possa essere sufficiente quello che vi abbiamo detto. Come spesso accade il passaparola è la strategia di marketing migliore: abbiamo provato, siamo contenti, ve lo consigliamo. Anzi, ve lo rivendiamo.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Usiamo e rivendiamo Hosting ARUBA BUSINESS — Magazine eWeb</title>
    <meta
      name="description"
      content='La scelta aziendale di vendere o non rivendere servizi IT di terze parti è stata sul tavolo di eWeb per diverso tempo, non vi nascondiamo il fatto che eravam...'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-6" class="link">← Numero 06 del Magazine</a>
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
