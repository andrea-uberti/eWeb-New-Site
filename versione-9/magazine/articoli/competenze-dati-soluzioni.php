<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 1. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/competenze-dati-soluzioni/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/competenze-dati-soluzioni
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
$heroTitle = 'Il segreto non è essere bravi, ma farlo sapere';
$heroLead = 'Dal numero 01 del Magazine eWeb.';

$autore = 'Fabio Gennari';
$paragrafi = [
  'Siamo dentro un momento storico dove la comunicazione è esagerata. Diciamocelo chiaramente: si parla e si racconta troppo e su diversi canali, spesso male e con pochissima strategia. Siamo bombardati da informazioni che nascono e muoiono nel momento in cui vengono prodotte e poi trasferite, difficilmente c’è un percorso che viene identificato e poi portato avanti con attenzione e precisione. Tutto è affidato all’effetto “wow”, qualcosa che ti colpisce e ti ruba l’attenzione per qualche minuto e poi finisce dietro al prossimo “wow”. Come se fosse, sportivamente parlando, una gara secca e non un percorso a tappe.',
  'Noi di eWeb cerchiamo di fare una cosa semplice: prima capiamo le potenzialità, le caratteristiche, i plus del nostro cliente e poi collaboriamo con lui per metterle in vetrina, per farle conoscere a tutti. Per far sapere a chi sta lì fuori che qui dentro, inteso come il perimetro in cui le aziende che si affidano a noi lavorano, facciamo cose importanti. Che siano prodotti o servizi non importa, conta come si trasferisce all’esterno ogni spunto, ogni dettaglio, in grado di scatenare la curiosità e l’interesse di chi legge. Di chi osserva. Di chi ascolta.',
  'Partiamo proprio da qui e diciamo subito una cosa importante: i “mezzi” attraverso i quali trasferire le informazioni e quindi fare comunicazione sono tanti ma, fondamentalmente, gli stessi per tutti. Da questo punto di vista, il contesto è molto democratico: tutti possono comunicare, tutti hanno accesso alle soluzioni per arrivare alle persone, siano utenti di una comunità o potenziali fruitori di un servizio. Proprio per questo motivo, credo fermamente che un’analisi preliminare della proposta e quindi la piena comprensione della gamma dei prodotti e dei servizi di cui un’azienda vuole parlare siano passaggi chiave di una buona comunicazione.',
  'Utilizziamo diversi canali per la promozione e la diffusione delle informazioni, ci sono ambiti anche molto diversi in cui trovare terreno fertile per collegare il nostro cliente a quel pubblico che può recepire in modo più proficuo la sua proposta. A volte bastano pochi secondi di video, altre volte servono 10 mail e altre ancora le immagini dicono tutto. Il nostro approccio non cambia e lo schema di lavoro è sempre lo stesso: prima si ascolta, poi si approfondisce, in seguito si definisce cosa raccontare e con che mezzi e alla fine si concretizzano i contenuti e si diffondono.',
  'Da soli, bisogna dirselo con grande schiettezza, non si combina nulla. Comunicare bene non significa fare un bel testo o proporre un video emozionale ma capire, prima di tutto, cosa deve essere comunicato e a chi. Con quale scopo. Messi in fila questi concetti, chiariti per bene necessità e obiettivi, si può fare un buon lavoro. Chiaramente con un approccio di questo tipo la comunicazione che viene costruita si prende dei rischi ma non è nemmeno scolpita nel marmo: la definizione di una strada iniziale resta la traccia da seguire ma valutare le risposte del pubblico cui ci si rivolge ed eventualmente apportare qualche correttivo in corso d’opera non è vietato dalla legge o da qualche dogma particolare.',
  'Siamo fermamente convinti che in un mercato che cambia di ora in ora, con l’avvento dell’AI che in qualche modo incide e sposta tanti equilibri, la capacità di analizzare, elaborare e proporre soluzioni che un team di lavoro coeso e affiatato come quello di eWeb mette a disposizione dei suoi clienti e partner sia un plus irraggiungibile per tutti quegli automatismi e quegli algoritmi che si nutrono delle idee altrui, le impastano e in pochi secondo propongono una soluzione. No, non esiste nessuna bacchetta magica: servono impegno, costanza, lavoro e l’umiltà di capire se una strada va cambiata facendolo velocemente. Perché il segreto non è essere bravi, ma farlo sapere. Comunicando nel modo giusto e sapendo che non esiste solo “un” modo giusto.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Il segreto non è essere bravi, ma farlo sapere — Magazine eWeb</title>
    <meta
      name="description"
      content='Essere bravi non basta, bisogna farlo sapere. Nell\'era del rumore e dell\'effetto "wow", noi rifiutiamo le scorciatoie. La nostra forza...'
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
            <a href="<?php echo BASE_URL; ?>/magazine/educational-1" class="link">← Numero 01 del Magazine</a>
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
