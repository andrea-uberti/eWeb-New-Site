<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 4. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/strategia-ads-google-meta/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/strategia-ads-google-meta
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
$heroTitle = 'La dualità della domanda: spingere o attrarre';
$heroLead = 'Dal numero 04 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Nel marketing digitale del 2026, la distinzione tra Google ads e Meta ads non riguarda i costi di piattaforma, ma il presidio delle diverse fasi d\'acquisto. Google ads intercetta la domanda consapevole: agisce su chi ha già un bisogno chiaro e lo esprime attraverso una ricerca testuale. La competizione si gioca sulla precisione tecnica e sulla velocità di risposta.',
  'Meta ads lavora invece sulla domanda latente. Il suo compito non è rispondere a un quesito, ma generarlo. Attraverso contenuti visuali analitici, Meta interrompe lo scorrimento del feed per mostrare una soluzione a un problema ignorato o sottovalutato dall\'utente. Se Google è il catalogo consultabile al bisogno, Meta è lo stimolo che attiva l\'interesse prima ancora che l\'utente formuli una ricerca esplicita.',
  'Meta ads come generatore di flussi',
  'Superare un mercato saturo richiede di andare oltre i limiti della ricerca testuale. Il vantaggio operativo di Meta risiede nella capacità di agire sui driver comportamentali e sui bisogni quotidiani. Utilizzando inserzioni video che mostrano casi d\'uso reali e risoluzioni di criticità pratiche, il marchio si posiziona come risolutore autorevole.',
  'La strategia non si basa sull\'attesa di una ricerca, ma sulla distribuzione proattiva verso segmenti di pubblico che condividono problemi specifici. L\'integrazione di incentivi concreti, come guide tecniche o consulenze preliminari, trasforma un utente passivo in un contatto qualificato. Questo permette di alimentare l\'imbuto di vendita con persone che, senza uno stimolo visivo mirato, non avrebbero mai iniziato un processo di acquisto sui motori di ricerca.',
  'Google ads e la protezione dell\'intento',
  'Se Meta attiva l\'interesse, Google funge da punto di raccolta e validazione. Dopo aver interagito con un annuncio sui social, l\'utente raramente conclude l\'operazione in modo immediato: spesso si sposta sui motori di ricerca per verificare l\'affidabilità dell\'azienda o confrontare i dettagli. In questo momento, la presenza su Google diventa vitale.',
  'Non presidiare le chiavi di ricerca legate al proprio marchio o ai servizi specifici significa rischiare che il traffico generato dagli investimenti su Meta venga intercettato da un concorrente. Le campagne search devono proteggere l\'identità aziendale e fornire dati rapidi a chi cerca una sede fisica o specifiche tecniche. La sinergia tra i due canali garantisce che l\'investimento pubblicitario si trasformi in una conversione reale, coprendo ogni fase del processo decisionale.',
  'L\'impatto della ai search e la geo',
  'Il comportamento di ricerca sta cambiando: molti utenti non utilizzano più i link tradizionali, ma pongono domande dirette a sistemi generativi. In questo scenario, le inserzioni standard non sono più sufficienti. Il marketing deve integrare la geo (generative engine optimization), ovvero l\'ottimizzazione dei contenuti per i motori di risposta.',
  'Se un utente chiede a un\'intelligenza artificiale un consiglio per risolvere un problema tecnico o trovare un servizio locale, la risposta dipenderà dall\'autorevolezza costruita online. I sistemi IA citano fonti strutturate, ricche di dati reali e prive di testi puramente pubblicitari. Scrivere contenuti che rispondano a problemi complessi e che siano facilmente interpretabili dagli algoritmi è il nuovo standard della visibilità. Essere citati da una IA come soluzione consigliata rappresenta una validazione algoritmica che conferma la professionalità del marchio agli occhi di un cliente che cerca soluzioni definitive.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>La dualità della domanda: spingere o attrarre — Magazine eWeb</title>
    <meta
      name="description"
      content='Nel marketing digitale del 2026, la distinzione tra Google ads e Meta ads non riguarda i costi di piattaforma, ma il presidio delle diverse fasi d\'acquisto.'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-4" class="link">← Numero 04 del Magazine</a>
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
