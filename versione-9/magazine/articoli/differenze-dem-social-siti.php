<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 3. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/differenze-dem-social-siti/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/differenze-dem-social-siti
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
$heroTitle = 'Sito, Dem e Social: le differenze';
$heroLead = 'Dal numero 03 del Magazine eWeb.';
$heroCtaHref = "#contatti"; // scorre al CTA in fondo a questa stessa pagina, non alla home

$ctaLine = 'Se quello che hai letto ti ha fatto venire voglia di parlarne, <em>scrivici.</em>';

$autore = null;
$paragrafi = [
  'Tre mondi legati a doppio filo l’uno all’altro che, paradossalmente, non hanno unitariamente la stessa forza che invece acquisiscono se vengono visti d’insieme. Per un’azienda, il sito web e i profili social sono veicoli formidabili di comunicazione perché permettono di accedere alle informazioni più importanti in modo organizzato, preciso e dettagliato. Le DEM, acronimo di Direct Email Marketing, sono invece delle comunicazioni a mezzo posta elettronica da inviare a destinatari o gruppi di destinatari con informazioni specifiche.',
  'Esistono diverse tipologie di siti web, se ne possono costruire con diverse tecnologie e linguaggi ma noi di eWeb abbiamo una convinzione radicata nel tempo e che non vogliamo in nessun modo cambiare: ogni portale che rilasciamo è costruito su misura per il cliente. Di proprietà del cliente. Sotto il pieno controllo del cliente. Questa caratteristica permette a chi commissiona un portale, che si tratti di una semplice vetrina statica o di un portale dinamico, non deve preoccuparsi di aggiornare plugin, verificare framework o controllare se scade o meno il supporto nel tempo. Il codice rilasciato è proprietario, fatto apposta per quel cliente e in quel contesto.',
  'Le vetrine social sono lo specchio da utilizzare per le comunità digitali. I social di riferimento sono diversi e, soprattutto, diversi tra loro. Ci sono clienti che devono puntare su Facebook e non su Tik Tok, altri che nelle gallerie di Instagram possono trovare nuovi mercati e altri ancora che trovano la possibilità di esaltare prodotti e servizi soprattutto grazie ai video di Youtub. Certo, nessuno può ignorare la potenza dei canali Whatsapp ma ciò che conta davvero più di tutto è guardare con gli occhi giusti (e giustamente critici) quello che può servire ad esaltare doti e caratteristiche dei prodotti e dei servizi descritti sul sito web arrivandoci attraverso il social giusto.',
  'E a proposito di “canale” giusto, le DEM sono un mezzo formidabile anche se spesso sottovalutato per parlare in modo diretto e completo con un pubblico in target, fidelizzato o sconosciuto, di chi siamo. Il cuore di una comunicazione che passa dal Direct Email Marketing sono le CTA (Call To Action): in qualche punto della mail che viene spedita c’è un “bottone”, un pulsante, una chiamata all’azione che porta il lettore a spostarsi dalla condizione di semplice lettore a quella di potenziale cliente, meglio detto “lead”.',
  'Scrivere una DEM non è né semplice né banale. Si parte da un tema e bisogna lavorare per accompagnare, parola dopo parola, chi sta leggendo a vedere i prodotti e i servizi del mittente come la soluzione giusta da raggiungere, sfruttare, approfondire subito. Il famoso “vantaggio” non è per forza economico ma può avere diverse forme: un risparmio di tempo, una facilitazione, un miglior approccio a quel determinato problema. E la combinazione DEM-Sito Web-Social è la sfida più grande per chi si occupa di comunicazione: il fine ultimo è portare al cliente di eWeb più realtà possibili interessate ad avviare un business o a riaccenderne uno del passato, per raggiungerlo bisogna trovare l’equilibrio giusto tra quanto c’è da dire e il modo di comunicarlo. Una sfida quotidiana, un impegno costante, una missione comune.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'intelligenza-artificiale-e-futuri', "title" => 'L’AI c’è ma (ancora) non si vede. Si vedrà?', "teaser" => 'Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la vediamo anche all’opera ma la sensazione diffusa, per chi non si lascia travolgere dalla narrazione di popolo secondo al quale grazie all’intelligenza artificiale tutto sarà automatizzato, standardizzato, appiattito nelle sue sfumature più belle, privo di errori e con la perfezione assoluta lì ad un passo, è che ancora non si vede davvero quello che ci si aspettava. E forse nemmeno lo si vedrà mai.'],
  ["slug" => 'novita-subito-o-quando-matura', "title" => 'Le novità non son sempre una buona cosa', "teaser" => 'Questo mese il tema è particolarmente caldo. Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un discorso sulla “cucina” durante una cena “italiana”.'],
  ["slug" => 'seo-num100-effetti-serp', "title" => 'SERP, Num=100 e la storia dei colossi caduti', "teaser" => 'L\'analisi dell\'impatto del parametro num=100 e la sua interazione con strumenti come Google Search Console rappresenta un caso di studio fondamentale per i professionisti del digital marketing. Anche se Google ha limitato l\'uso diretto di questo parametro nell\'URL per l\'utente finale, il concetto di visualizzazione estesa rimane un pilastro per l\'analisi avanzata.'],
  ["slug" => 'ai-bolla-o-futuro-2', "title" => 'Ma cosa ne sappiamo di AI?', "teaser" => 'Di intelligenza artificiale ne sentiamo parlare costantemente, ma in concreto come la utilizziamo? Ho condotto alcuni sondaggi e sono emersi vari utilizzi che identificano alcune interessanti tipologie e tecniche di applicazione'],
  ["slug" => 'protezione-marchio-googleads', "title" => 'Protezione del marchio negli annunci Google ADS', "teaser" => 'Quando un inserzionista pubblica un annuncio ADS su Google significa che “acquista” una o più parole chiave.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sito, Dem e Social: le differenze — Magazine eWeb</title>
    <meta
      name="description"
      content='Tre mondi legati a doppio filo l’uno all’altro che, paradossalmente, non hanno unitariamente la stessa forza che invece acquisiscono se vengono visti d’insie...'
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
            <span>Numero 03</span>
            <?php if ($autore): ?>
              <span class="article__meta-sep">·</span>
              <span class="article__meta-author">di <?php echo htmlspecialchars($autore); ?></span>
            <?php endif; ?>
          </div>
          <?php foreach ($paragrafi as $i => $p): ?>
            <p class="<?php echo $i === 0 ? "article__lead" : "body-l"; ?> reveal"><?php echo htmlspecialchars($p); ?></p>
          <?php endforeach; ?>

          <p class="body-l reveal" style="margin-top: 40px">
            <a href="<?php echo BASE_URL; ?>/magazine/educational-3" class="link">← Numero 03 del Magazine</a>
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
