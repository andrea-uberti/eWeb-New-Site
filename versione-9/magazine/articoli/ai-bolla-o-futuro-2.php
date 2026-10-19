<?php
/* Pagina di un singolo articolo del Magazine (newsletter eWeb), dal
   numero 3. Contenuto reale (titolo/testo/autore) recuperato dal
   sito storico (ewebsolution.it/magazine/ai-bolla-o-futuro-2/) — paragrafi fedeli
   all'originale, non riscritti. URL pubblico piatto /magazine/ai-bolla-o-futuro-2
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
$heroTitle = 'Ma cosa ne sappiamo di AI?';
$heroLead = 'Dal numero 03 del Magazine eWeb.';

$autore = null;
$paragrafi = [
  'Di intelligenza artificiale ne sentiamo parlare costantemente, ma in concreto come la utilizziamo? Ho condotto alcuni sondaggi e sono emersi vari utilizzi che identificano alcune interessanti tipologie e tecniche di applicazione.',
  'Le mie indagini iniziano dalla seconda metà del 2023. Consideriamo che l’arrivo ufficiale in Italia di Chat GPT è avvenuto il 28 aprile 2024. E già possiamo dedurre che l’utilizzo dell’ AI è molto legato all’arrivo di Chat GPT, che è però solo una delle varie tipologie di AI e nello specifico un LLM ovvero un Large Language Model.',
  'Gli esempi e le esperienze di seguito descritte si riferiscono allo stato di fatto attuale, non considerano quello che sarà e come si evolveranno le varie opzioni di AI già presenti o che arriveranno. Senza dubbio la situazione non è statica e tanto meno granitica. Al contrario è estremamente fluida, in continua evoluzione e con spinte di investimenti e quindi di interessi molto consistenti. La fotografia attuale deve considerarsi alla strenua di un fuoco fatuo, con la sicura tendenza ad evolversi, scomparire, ripresentarsi sotto forme e in modi molto diversi e probabilmente ad oggi non conoscibili.',
  'Stiamo imparando a sfruttare gli LLM come Chat GPT, Gemini o ancora l’AI di Meta, presente da qualche mese su Whatsapp, per scopi specifici.',
  'Alla fine dello scorso anno 2024 e nei primi mesi del 2025 ho iniziato a ricevere da vari amici immagini, anche molto simpatiche e divertenti, realizzate dall’AI. Lo stupore iniziale è stato davvero forte ed il numero di utilizzi è stato forte e costante. Sono immagini divertenti, ma anche evidentemente false e del tutto sproporzionate rispetto alla realtà. Anzi più si staccano dalla realtà più fanno sorridere. Spesso rappresentano in modo efficace dei paradossi, delle esagerazioni, ma non la verità stessa per come è o come vorremmo che fosse. Tutto troppo e forse fin troppo? Quindi nelle chat tra amici vanno anche bene, diversamente o si vuole esagerare oppure queste immagini non assolvono a granché.',
  'Nella comunicazione su ampia scala, in primis sui social, le immagini generate con AI si sono prese un ruolo di primo piano. Sono utili per indentificare i trend topic ed i momenti virali. Quando un argomento diventa molto interessante e sulla bocca di tutti allora si scatenano esempi di creazione di immagini con Ai che esprimono le varie posizioni che caratterizzano l’opinione pubblica. Quanti diversi ponti sullo stretto di Messina abbiamo visto negli ultimi mesi? Le varie piattaforme social ed i Media sono però sempre più tenuti a specificare quando si tratta di immagini create con AI e devono renderle segnalarle in modo esplicito al pubblico. Questo perché iniziano ad essere evidenti anche i capi di responsabilità che derivano dall’utilizzo e dalla diffusione di immagini non reali e evidentemente esagerate! Insomma questo utilizzo dell’AI per la generazione di immagini, seppur simpatico ed interessante, sembra inciampare in una serie di intoppi.',
  'Anche noi, come agenzia di comunicazione, ci confrontiamo con questo strumento e iniziamo ad utilizzarlo. Ma la mano di un disegnatore professionista, la capacità di tradurre in tratti e sfumature ogni volta diversi e speciali, quasi unici, quei riferimenti e quelle richieste che se invece dati in pasto all’AI produrrebbero immagini belle e all’apparenza perfette ma “vuote” di quell’emozione che non deve mai mancare, a nostro parere, fa ancora grande differenza. Nel tempo probabilmente i risultati saranno sempre più paragonabili a quanto un fotografo, un illustratore o un creativo sono in grado di fare, la professionalità è ancora appannaggio delle persone che la possiedono e il miglior prompt, ad oggi, è “solo” in grado di sintetizzare e raggruppare quanto è stato prodotto, quindi registrato, in giro per il mondo. Le regole e le scelte, di luce ed esposizione e in generale riferite a tutti i dettagli che il professionista tiene in considerazione, sono determinanti.',
  'Nelle scorse settimane abbiamo ricevuto loghi creato con l’AI da utilizzare per lo sviluppo di lavori di web design o di visual. Noi da oltre vent’anni realizziamo loghi e ci lavoriamo quotidianamente, possiamo dire di conoscere e padroneggiare l’argomento.',
  'I loghi che abbiamo ricevuto, visivamente carini ed interessanti, avevano delle lacune tecniche che li rendevano praticamente inutilizzabili. L’AI, salvo non venga istruita in modo molto specifico, non propone di suo un file vettoriale, che è però la base della quasi totalità di utilizzo di un logo, sempre se lo consideriamo in un contesto professionale. Quindi, anche in questo caso, da sola l’AI pare non assolvere pienamente al compito richiesto.',
  'Poter realizzare un logo con l’AI senza dubbio va a contenere i tempi di realizzazione e quindi i costi e magari potrebbe dare un riscontro più soddisfacente. Chiunque potrebbe arrangiarsi in completa autonomia, senza la necessità di richiedere l’intervento di professionisti. Per ora pare che non si sia ancora arrivati a quella situazione, vedremo come evolverà.',
  'Alcuni conoscenti mi dicono che hanno iniziato a rispondere alle mail utilizzando l’AI e chiedendole, vocalmente, di dare un riscontro a messaggi da loro ricevuti. Dicono essere molto più veloce e che il risultato sia di assoluta qualità. Mi fido della loro esperienza, io personalmente non ho mai utilizzato questa funzionalità e non saprei dire se ho ricevuto ad oggi mail di risposta realizzate dall’AI. Di certo ho ricevuto molte mail frutto di AI, da parte di mittenti che non conosco e che propongono vari servizi, opportunità, risparmi o affaroni. Per carità ben fatte, ma che differenza c’è con il vecchio SPAM? Forse che l’AI ha imparato quali termini non utilizzare per non cadere nei filtri antispam? Ma il contenuto ed il fine della comunicazione non mi hanno per nulla colpito a causa in primis della loro perfezione, ma anche del fatto di essere fin troppo semplicistiche e, seppur ci provano, anche per nulla personali. Non penso poi di delegare all’AI le risposte alle mie mail personali. Voglio continuare a credere che in una risposta non ci sia solo un contenuto generico, ma ci siano anche un modo personale di intrattenere rapporti, gestire le situazioni e trovare soluzioni, ma sempre partendo da un approccio personale, non “artificiale”.',
  'A proposito di “trovare soluzioni” e parlando sempre di esperienze personali, è capitato nel recente passato di ricevere un itinerario di viaggio generato completamente dalla AI. Ben 16 giorni di tour nel sud dell’Inghilterra confezionati, completi di dettagli, nel giro di pochi minuti. Analizzandola a fondo, con grande spirito critico e l’obiettivo di rendere l’esperienza unica, la traccia è risultata molto buona e completa ma per “standard”, per farla diventare qualcosa di speciale si passa comunque da aggiustamenti fatti a gusto e a sentimento da chi poi intraprenderà il viaggio per rendere tutto davvero speciale.',
  'I campi d’applicazione in cui ci si trova a confrontarsi con l’AI sono davvero tanti, un altro interessante sono i chatbot, strumento di supporto e assistenza che è utilizzato da tempo ma ha raggiunto, grazie alle nuove tecnologie, livelli molto alti di competenza e qualità. Ci sono sostanzialmente due modalità di utilizzo di questi strumenti. La prima è quella completamente automatica con risposte che arrivano da tutto l’archivio di informazioni in possesso dell’AI senza filtri di provenienza, questo potrebbe rappresentare un problema serio sia in termini di concorrenza (non c’è filtro sulla fonte) che di responsabilità (l’utente entra sul mio sito ed una risposta fraudolenta o pericolosa arriva in base a quanto specificato da un altro portale). Diverso è, per una funzione di AI, pescare da contenuti limitati e controllati: chiaramente questo presuppone che il chatbot di riferimento parta dall’analisi di quanto messogli a disposizione con lo sfruttamento della tecnologia dal punto di vista degli automatismi e non anche della base dati aperta. A livello di costi, al momento non è ancora chiaro ed evidente se un chatbot basato su informazioni controllate e circoscritte (con il lavoro di produzione e controllo di questi contenuti che comunque va calcolato) sia davvero più conveniente rispetto al classico call center fisico.',
  'Si può poi ragionare sulla scuola, sulle auto, sugli automatismi aziendali e ancora sulla realizzazione di video e siti web. L’uso dell’intelligenza artificiale è entrato anche nella creazione delle tesi e delle tesine che gli studenti devono preparare. Il problema è che i professori poi capiscono subito se quanto realizzato proviene dallo studente stesso e dalle sue capacità oppure dall’AI. Tra l’altro, il rischio di avere più tesine praticamente identiche è altissimo, l’AI non diversifica come farebbero più teste pensanti ma costruisce una risposta a specifiche domande in base ai suoi archivi.',
  'Si parla molto delle macchine che si guidano da sole. Sono sincero, un po’ la possibilità che sia l’auto, in autonomia, a procedere sulle strade mi spaventa. Pensando a mia figlia che dovrà fare la patente, spero che lei possa imparare come abbiamo fatto tutti in modo da comprendere le regole e poter poi applicare la sua sensibilità alle diverse situazioni che si verificano per strada. Siamo ancora lontani dall’avere tutte le auto che si muovono con guida autonoma, le connessioni ed una serie di altri problemi nello scambio dei dati sono da verificare (se salta la copertura dati della rete, le informazioni tra veicoli e ad esempio semafori come circolano?) ma è un tema da tener presente.',
  'Tornando alle aziende, il confronto con diversi ingegneri mi ha permesso di scoprire come vecchi AS400 aziendali sono stati dati in pasto a sistemi di AI per valutarne e progettarne gli aggiornamenti. Alcune parti di questi progetti sono stati portati avanti con buoni risultati, rimane il fatto che ogni proposta della AI va comunque verificata da professionisti per capirne l’effettiva efficacia. Resta il problema, poi, legato all’ampiezza della risposta che l’AI fornisce che non è mai puntuale ma spesso allargata. I processi sono spesso complessi, l’attività di project management spesso deve mettere d’accordo quanto si vuole realizzare con quanto effettivamente si può e si riesce a fare in base a diversi parametri, a diversi dettagli operativi.',
  'Se c’è bisogno poi di realizzare un video, gli strumenti sono tanti. Da tempo li facciamo in autonomia, recentemente è arrivata la richiesta per una realizzazione rapida e dettagliata, abbiamo quindi provato ad affidarci all’AI e il risultato non è stato nemmeno negativo. Anzi. Tuttavia, al momento di andare nei dettagli con uno specifico tessuto da utilizzare in uno specifico frammento di quello stesso video, tocca intervenire. Ci si arriva con prompt specifici e molto dettagliati ma la differenza tra quanto generato da AI e quando sarebbe stato possibile fare con una bella ripresa fotografica resta ampia. Quindi molto interessante l’automatizzazione ma complicato raggiungere un risultato finale con tutti i dettagli al loro posto.',
  'Il tema, infine, dei siti web è sempre molto caldo. Dal punto di vista tecnico è impressionante come pochi minuti di generazione AI abbiamo prodotto un risultato che magari si arriva ad avere con una settimana di lavoro di un programmatore. Anche l’approccio sulla possibilità di fare tante prove, con indicazioni sempre diverse e specifiche apre scenari molto interessanti. Il tema è legato però alla personalizzazione di quanto prodotto, davvero molto bassa e troppo standardizzata: da quello che si è visto, la comunicazione che passa non è personalizzata ed empatica ma decisamente uguale a tante altre che gi si erano viste.',
  'Complessivamente, la sensazione è che ci sia molta carne al fuoco che ogni giorni ne arrivi di nuova. Gli strumenti per gestire necessità e richieste ci sono ma i migliori risultati sono ad oggi, a mio parere, ancora molto legati alla combinazione tra la ratio umana e quei tool di facilitazione che permettono di abbattere i tempi senza rinunciare alla qualità del pensiero. Affidarsi completamente all’AI è troppo, studiarla e conoscerla per poi farla fruttare al massimo, invece, è la strada maestra.',
];

// Gli altri articoli dello stesso numero (titolo/teaser reali, stesso
// campo "teaser" usato altrove) — non un elenco a caso, per restare nel
// tema di quella uscita della newsletter. Niente qui se il numero ha un
// solo articolo (non capita oggi, ma il controllo sotto regge comunque).
$altriArticoli = [
  ["slug" => 'intelligenza-artificiale-e-futuri', "title" => 'L’AI c’è ma (ancora) non si vede. Si vedrà?', "teaser" => 'Per esserci, c’è. La percepiamo, ne sentiamo parlare, se ne legge praticamente ovunque dell’AI (o IA, come volete chiamarla). Sulle ricerche di Google la vediamo anche all’opera ma la sensazione diffusa, per chi non si lascia travolgere dalla narrazione di popolo secondo al quale grazie all’intelligenza artificiale tutto sarà automatizzato, standardizzato, appiattito nelle sue sfumature più belle, privo di errori e con la perfezione assoluta lì ad un passo, è che ancora non si vede davvero quello che ci si aspettava. E forse nemmeno lo si vedrà mai.'],
  ["slug" => 'novita-subito-o-quando-matura', "title" => 'Le novità non son sempre una buona cosa', "teaser" => 'Questo mese il tema è particolarmente caldo. Parlare di novità in ambiente ICT (web, comunicazione, software, ecc.) equivale alla volontà di affrontare un discorso sulla “cucina” durante una cena “italiana”.'],
  ["slug" => 'differenze-dem-social-siti', "title" => 'Sito, Dem e Social: le differenze', "teaser" => 'Tre mondi legati a doppio filo l’uno all’altro che, paradossalmente, non hanno unitariamente la stessa forza che invece acquisiscono se vengono visti d’insieme. Per un’azienda, il sito web e i profili social sono veicoli formidabili di comunicazione perché permettono di accedere alle informazioni più importanti in modo organizzato, preciso e dettagliato. Le DEM, acronimo di Direct Email Marketing, sono invece delle comunicazioni a mezzo posta elettronica da inviare a destinatari o gruppi di destinatari con informazioni specifiche.'],
  ["slug" => 'seo-num100-effetti-serp', "title" => 'SERP, Num=100 e la storia dei colossi caduti', "teaser" => 'L\'analisi dell\'impatto del parametro num=100 e la sua interazione con strumenti come Google Search Console rappresenta un caso di studio fondamentale per i professionisti del digital marketing. Anche se Google ha limitato l\'uso diretto di questo parametro nell\'URL per l\'utente finale, il concetto di visualizzazione estesa rimane un pilastro per l\'analisi avanzata.'],
  ["slug" => 'protezione-marchio-googleads', "title" => 'Protezione del marchio negli annunci Google ADS', "teaser" => 'Quando un inserzionista pubblica un annuncio ADS su Google significa che “acquista” una o più parole chiave.'],
];
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ma cosa ne sappiamo di AI? — Magazine eWeb</title>
    <meta
      name="description"
      content='Di intelligenza artificiale ne sentiamo parlare costantemente, ma in concreto come la utilizziamo? Ho condotto alcuni sondaggi e sono emersi vari utilizzi ch...'
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

      <?php if ($altriArticoli): ?>
        <!-- ============ ALTRI ARTICOLI DI QUESTO NUMERO ============ -->
        <section class="service-section service-section--dark" data-theme="dark">
          <div class="container">
            <div class="service-section__head">
              <div class="service-section__head-text">
                <span class="eyebrow eyebrow--muted">Dallo stesso numero</span>
                <h2 class="h2 reveal-lines">
                  Leggi anche<br /><em>gli altri articoli.</em>
                </h2>
              </div>
            </div>
            <ul class="service-related__list">
              <?php foreach ($altriArticoli as $i => $alt): ?>
                <li class="reveal">
                  <a
                    class="service-related__link"
                    href="<?php echo BASE_URL . "/magazine/" . $alt["slug"]; ?>"
                  >
                    <span class="service-related__link-num"><?php echo str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></span>
                    <span class="service-related__link-body">
                      <span class="service-related__link-text"><?php echo htmlspecialchars($alt["title"]); ?></span>
                      <span class="service-related__link-teaser"><?php echo htmlspecialchars($alt["teaser"]); ?></span>
                    </span>
                    <span class="btn__arrow">→</span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </section>
      <?php endif; ?>
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
