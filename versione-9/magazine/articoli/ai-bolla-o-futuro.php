<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 1. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/ai-bolla-o-futuro/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/ai-bolla-o-futuro
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
$heroTitle = 'L’AI è una bolla o la chiave per il futuro?';
$heroLead = 'Ma è corretto o fuorviante chiamarla intelligenza?';

$autore = 'Pietro Cortinovis';
$paragrafi = [
  'CAPITOLO 1 Intelligenza artificiale o AI: un concetto del quale ormai sentiamo parlare quotidianamente. Da inizio anno reputo sia uno dei temi di attualità ai quali ho dedicato più tempo di riflessione, studio, analisi, confronto e infinite ipotesi. Ho letto articoli, ho ascoltato podcast e soprattutto ho chiesto a molte persone cosa pensassero dell’intelligenza artificiale e le risposte che ho ricevuto non hanno risolto i miei dubbi e le mie perplessità, anzi li hanno resi sempre più ingarbugliati.',
  'Mi è stato chiesto di rispondere alla domanda delle domande: ma secondo te l’ AI è una bolla o la chiave per il futuro? Non credo sia una bolla, tutt’altro, ma potrebbe diventarlo velocemente. Tutto dipende da come interagiamo e come lo faremo in futuro, con questa grande novità in costante evoluzione.',
  'L’argomento è davvero molto complesso e serviranno più articoli per conoscerlo e valutarlo. Ci proverò con una serie di approfondimenti attraverso i quali, man mano, andrò ad analizzare le molteplici facce dell’ AI. Un percorso che mi auguro possa aiutarci a capire meglio e ci porti a cogliere le potenzialità concrete tenendoci lontani dai facili entusiasmi e dalle bolle.',
  'In questo primo articolo vorrei partire dal nome: due vocaboli compongono la definizione 1) intelligenza 2) artificiale. Voglio convincervi di quanto sia necessario concentrarci solo sul secondo, mentre il primo lo ritengo un’etichetta molto superficiale, poco sensata e soprattutto pericolosa perché rischia di sminuire le vere potenzialità della rivoluzione che stiamo costruendo e vivendo.',
  'Prima di tutto ho cercato di capire di cosa stiamo parlando quando ci riferiamo all’AI.',
  'Ho scoperto che i primi studi sull’intelligenza artificiale risalgono al 1950 quando il matematico e logico Alan Turing, i più lo ricordano per aver contribuito a decifrare il codice Enigma durante la Seconda Guerra Mondiale, si chiedeva se le macchine potessero essere indistinguibili rispetto agli uomini nella risoluzione di un problema. Noi umani per risolverlo abbiamo sempre usato la nostra intelligenza, quella biologica, le macchine potrebbero fare altrettanto usando una loro intelligenza tecnica e quindi “artificiale”?',
  'In quegli anni e nei successivi, per dar seguito alla tesi di Touring, ci si è basati principalmente sulla logica matematica come chiave si risoluzione dei problemi, ma non si sono ottenuti grandi risultati. Le macchine giocavano bene a dama e vincevano, ma a scacchi non erano in grado di replicare l’imprevedibilità dei campioni mondiali.',
  'Sono passati decenni e si è giunti all’ AI nella forma attuale, che è molto diversa. Dagli anni 2000 stiamo creando una mole di dati pari e quella che avevamo prodotto nei millenni precedenti. Circa vent’anni contro millenni, e continuiamo quotidianamente ad accrescere il divario. Una moltitudine di Terabyte che stiamo immagazzinando su supporti digitali, ovvero macchine, che man mano stanno diventando sempre più capienti. Interagiamo con questi dati attraverso computer, ovvero macchine, sempre più potenti, veloci ed in grado di svolgere computi sempre più complessi. E lo stiamo facendo utilizzando il modello statistico ovvero attraverso associazioni e correlazioni. Tanto più i dati che conosciamo suggeriscono una risposta quanto più quella diventa la risposta. Dalla logica siamo passati alla statistica.',
  'Il cambio di metodologia è rivoluzionario poiché stiamo sfruttando le macchine in modi sempre migliori per raggiungere ancor di più i nostri obiettivi.',
  'Il mondo in cui viviamo ogni giorno si modella, o meglio lo stiamo modellando, per accogliere, far crescere ed essere sempre più amichevole verso quei processi tecnici che chiamiamo AI. È un percorso che avviene da anni e la direzione di sviluppo è costante. I grandi investimenti vanno tutti verso quella direzione: ci servono computer sempre più potenti, storage sempre più capienti, una rete di connessione sempre più stabile, veloce e diffusa ed una quantità di energia elettrica sempre maggiore e stiamo realizzando tutto ciò.',
  'Provate ad immaginare un’auto a guida autonoma in una città senza connessione? Non funzionerebbe. Provate a realizzare un video o un’immagine con un pc con windows 98 e una connessione a 56k, semplicemente non lo farebbe. Provate ad utilizzare il vostro primo cellulare, che per me vuol dire tornare al 1996, e chiedetegli quale è il miglior ristorante di Milano. Non vi risponderà e potrete solo tornare a giocare a Snake.',
  'Io ricordo il mondo senza internet, mia figlia di 10 anni sono certo che non ne ha la ben che minima idea, ma non è una sua colpa, è semplicemente il mondo che cambia e si evolve.',
  'Le evoluzioni tecniche ed il modo nel quale interagiamo ci stanno fornendo quotidianamente nuove opportunità e ci stanno facilitando la vita in molti ambiti.',
  'Ma è davvero la tecnologia che si sta auto-costruendo in modo autonomo ed intelligente? Reputo non sia pensabile costruire una nuova intelligenza biologica e ciò, non lo nego, mi rincuora.',
  'L’essere umano ha creato e sta creando una serie grandiosa di evoluzioni per disegnare un mondo che accolga la tecnologia e la sfrutti nei suoi massimi potenziali. Lo stiamo facendo usando la nostra intelligenza biologica, la quale si appiglia in modo ampio alla logica, all’imprevedibilità, alla scoperta ed al genio ed oggi può contare anche su una statistica sempre più disponibile, interpretabile e sfruttabile. Parliamo di processi tecnici avanzatissimi e sorprendenti, ma che non possono essere considerati intelligenti di loro natura, piuttosto sono il frutto di una sapienza umana applicata agli strumenti tecnici che abbiamo creato e continuiamo a far crescere. È una strada che abbiamo deciso di intraprendere.',
  'Dunque non è un’intelligenza artificiale, ma di base c’è sempre l’intelligenza biologica umana che ha deciso di delegare ed affidarsi alle macchine per svolgere alcuni compiti, che man mano stanno diventando sempre più complessi. Se pensiamo che una macchina possa diventare biologicamente intelligente allora forse stiamo cadendo in un grande errore. E alla base di una bolla ci stanno sempre errori, soprattutto di valutazione.',
  'Se vogliamo mettere in competizione la nostra intelligenza biologica contro quella artificiale delle macchine sono certo che cadremo in un errore banale. Non c’è alcuna gara, nessuna squadra da tifare. Piuttosto dobbiamo convincerci che non possiamo affidarci alle macchine in modo semplicistico e banale ritenendole addirittura intelligenti! Alla base di tutto deve esserci l’intelligenza biologica umana che può, nella sua grandiosità, continuare a far crescere e man mano sfruttare al meglio quanto fin ha già ottenuto e che non potrà che migliorare.',
  'La prima vera bolla è confondere questo “esecutore artificiale” con un’improbabile “intelligenza artificiale”.',
  'Nei prossimi articoli andremo ad approfondire altri elementi di questa AI, per convenzione continueremo a chiamarla così, ma consci del fatto che il nome è fuorviante. Cercheremo di smitizzare quanto siano autonomamente intelligenti, ma cercheremo di capire quanto, usando l’intelligenza biologica umana, potremmo ottenere degli ottimi risultati.',
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>L’AI è una bolla o la chiave per il futuro? — Magazine eWeb</title>
    <meta
      name="description"
      content='CAP. 1 - Ma è corretto o fuorviante chiamarla intelligenza?'
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
