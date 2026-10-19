<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 5. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/affidati-a-una-agenzia-di-valore/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/affidati-a-una-agenzia-di-valore
   (stesso schema del sito storico, deciso così apposta — non annidato
   sotto /magazine/educational-5/, vedi .htaccess), file fisico in
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
$heroCategory = "Magazine — Numero 05";
$heroTitle = 'Perché dovrei affidarmi ad un’agenzia?';
$heroLead = 'Dal numero 05 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  'Da quando lavoro in eWeb in tantissimi (soprattutto miei ex colleghi) mi chiedono: “ma che cosa fate di così speciale? I social dell’azienda di mio marito/cugino/zio li gestisce mio figlio/nipote, ect… anche il sito glie l’ha fatto lui! Perché venire da voi?”',
  'Ecco… non è sempre semplice rispondere alla domanda “perché dovrei rivolgermi ad un’agenzia?” ma da quando respiro l’aria di eWeb ho invece capito quanto sia strategico affidarsi ad un’agenzia che si occupi di te e della tua azienda, e quindi del tuo business, a 360°.',
  'E’ assolutamente vero (e in questo il web è un esempio di democrazia) che un sito o una campagna di comunicazione può essere fatta dal cugino o nipote del caso, quello che però è oramai lapalissiano è che questa scelta ha dei limiti!',
  'La comunicazione ed il web non sono concetti così semplici come spesso si crede.',
  'Entrare in questo settore solo per cercare di stare al passo coi tempi, ma farlo senza la competenza necessaria, potrebbe rivelarsi non solo inutile ma anche molto rischioso.',
  'Mi viene in mente un e-commerce sviluppato male o una pagina social che non trasmette l’immagine giusta o ancora un sito che non riesce a posizionarsi nel motore di ricerca e che quindi non viene trovato dagli utenti. Tante di queste situazioni sono presenti in diverse aziende ed, è evidente, fanno male al suo business!',
  'Un’agenzia come la nostra è una squadra composta da diverse professionalità che collaborano con un unico focus comune, quello di capire, studiare e mettere in atto la miglior strategia possibile per centrare gli obiettivi di un cliente nel modo più efficace ed efficiente possibile.',
  'eWeb fornisce soluzioni personalizzate per ogni cliente: qui ho imparato che ogni cliente ha una potenziale ricchezza che spesso non sa di avere, che è la sua storia e la sua realtà quotidiana, che deve essere raccontata nel migliore dei modi per poter essere valorizzata e diventare quindi preziosa risorsa di business.',
  'Qui ho scoperto che spesso nemmeno il cliente si immagina opportunità di business che invece la web agency scopre ed ottiene.',
  'Arrivati a questo punto, se oggi mi chiedete ma perché non fare comunicazione in autonomia, credo che la risposta possa essere solo una: perché servono molte professionalità differenti, che eWeb ha nel suo organico, mentre un’azienda dovrebbe assumere un intero ufficio marketing di almeno 4-5 figure… ma non è tutto!',
  'Le professionalità apicali che cooperano in eWeb hanno alle spalle anni di studio e di esperienza concreta. Sono affiancate da un team di giovani freschi, sul pezzo e preparati, ognuno specializzato in un pezzo specifico dei nostri servizi. Questo è a mio modo di vedere un mix perfetto che permette di studiare, trovare e mettere in atto la strategia più giusta per ogni realtà ottimizzando risultati e costi.',
  'Perché non affidarsi a mio cugino che usa tutto il giorno i social o ha realizzato un suo sito personale? Beh, semplice, perché ha un’esperienza limitata e manca della pluralità di professionalità che invece servono per pianificare e portare avanti una strategia. Una singola figura è impensabile che possa saper far tutto e da sola.',
  'eWeb, rispetto ad altri competitor, ha anche un’altra peculiarità: noi non ci affidiamo a freelance o a consulenti esterni ma a personale interno e questo perché non solo pensiamo alla strategia, ma poi la realizziamo e ci prendiamo la responsabilità di tutte le fasi e dei successivi sviluppi!',
  'La comunicazione ed il marketing prevedono inevitabilmente delle fasi e degli sviluppi nel tempo ed è fondamentale sapere il percorso da percorrere e avere un team che possa gestire e controllare tutti gli sviluppi dall’inizio e per tutta la fase di attuazione. E che sappia capire gli errori, interpretarli e trovare soluzioni adatte per evolvere le attività e riuscire a giungere agli obiettivi prefissati.',
  'E l’AI, che va così di moda? Si potrebbe pensare che possa ricoprire tutte le figure presenti in eWeb e magari anche molto di più. Quindi la soluzione potrebbe essere di affidarsi esclusivamente a questa invece che ad un’agenzia… Beh gli studi che stiamo portando avanti da mesi ci dicono che la strategia che l’AI indica è standard e ripetitiva per le numerose aziende che la interrogando… soprattutto se le domande che vengono poste sono generiche, del tipo “voglio presentare il mio prodotto in tutta Italia, come faccio?”. L’AI è senza dubbio uno strumento utile ed efficace, ma deve essere indirizzata e sfruttata da persone che sanno cosa chiederle, che hanno esperienza in materia e quindi possono arrivare ad una soluzione unica e di qualità, ovvero personalizzata rispetto alle esigenze ed agli obiettivi.',
  'Esistono agenzie anche molto più strutturate di eWeb, il mio suggerimento è duplice: da un lato cercate una strategia davvero su misura e dall’altro cercate un rapporto diretto con chi dovrà concretizzarla, pretendete di conoscere chi sarà il vostro referente diretto, non solo chi vi sta vendendo un servizio, valutatene l’esperienza, le capacità e l’empatia che sarà in grado di creare con voi perché i risultati di comunicazione si ottengono sempre e solo se si lavora a quattro mani.',
  'Non è una questione di prezzo, ma di qualità.',
  'E in eWeb spesso il costo è anche inferiore semplicemente perché è più mirato rispetto agli obiettivi.',
  'Lo dice chi i conti li guarda tutti i giorni.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'come-comunichiamo', "title" => 'Testi, foto, video e niente AI: come COMUNICA eWeb', "teaser" => 'Non c’è un modo solo di comunicare. Lo abbiamo sperimentato e lo vediamo ogni giorno.'],
  ["slug" => 'developer-per-passione', "title" => 'Mettiamo le mani nel DB, sempre', "teaser" => 'Partiamo dall’inizio, l’acronimo DB sta per Database.'],
  ["slug" => 'piano-editoriale-in-soccorso', "title" => 'Il Piano Editoriale ti salva la faccia (e non solo)', "teaser" => 'Quando si stende un piano di comunicazione, il primo passo è decidere quando affrontare un argomento e contestualizzarne la pubblicazione rispetto agli altri spunti che caratterizzano il progetto.'],
  ["slug" => 'vincono-le-risposte', "title" => 'Vincono le risposte, parliamo di FAQ', "teaser" => 'In un mondo dell’informazione digitale che sempre di più si sbilancia verso i motori di ricerca, con le relative regole che diventano quindi mandatorie, la produzione dei contenuti non può non tener conto di quanto i discorsi vengano messi costantemente in primo piano.'],
  ["slug" => 'comunicare-con-video', "title" => 'Comunicazione Video eWeb', "teaser" => 'Ciascuna delle nostre aziende ha la necessità di comunicare. I canali ed i linguaggi attraverso i quali può farlo sono molteplici. In questo articolo ci concentriamo sull’utilizzo dei video.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Perché dovrei affidarmi ad un’agenzia? — Magazine eWeb</title>
    <meta
      name="description"
      content='Da quando lavoro in eWeb in tantissimi (soprattutto miei ex colleghi) mi chiedono: “ma che cosa fate di così speciale? I social dell’azienda di mio marito/cu...'
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
            <span>Numero 05</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-5" class="link">← Numero 05 del Magazine</a>
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
