    <?php
    // Header/menu condivisi da ogni pagina (non solo la home): sulla home i
    // link restano puri "#ancora" (intercettati da script.js per lo scroll
    // fluido Lenis); dalle pagine interne servono invece assoluti verso la
    // home, altrimenti il browser si limiterebbe a cambiare l'hash della
    // pagina interna corrente senza portare da nessuna parte. La pagina che
    // include questo header imposta $menuBase = "/" PRIMA dell'include se
    // non è la home; se non lo imposta resta "" (comportamento di index.php,
    // invariato: logo e menu restano ancore sulla pagina stessa).
    $menuBase = $menuBase ?? "";

    // Pagine di servizio nel menu, raggruppate per categoria — stesso
    // catalogo di inc/related.php (inc/config.php, $SERVICE_PAGES), unica
    // fonte: una pagina aggiunta lì compare qui da sola, non va ripetuta a
    // mano. require_once (non require): header.php è incluso da pagine che
    // a volte hanno già caricato config.php (le pagine di servizio) e da
    // altre che non l'hanno fatto (la home) — evita di ridefinire le
    // costanti/variabili due volte nel primo caso.
    require_once __DIR__ . "/config.php";
    $menuCategories = [];
    foreach ($SERVICE_PAGES as $slug => $page) {
      $menuCategories[$page["category"]][] = ["slug" => $slug, "title" => $page["title"]];
    }
    ?>
    <!-- ============ HEADER ============ -->
    <header class="nav">
      <a
        href="<?php echo $menuBase === "" ? "#top" : $menuBase; ?>"
        class="nav__logo"
        aria-label="eWeb — torna all'inizio"
      >
        <span class="logo logo--banner logo--nav"></span>
      </a>

      <button
        class="nav__burger"
        aria-label="Apri il menu"
        aria-expanded="false"
        data-cursor="Menu"
        data-magnetic
      >
        <span></span><span></span>
      </button>
    </header>

    <div class="menu" aria-hidden="true">
      <!-- data-lenis-prevent qui e su .menu__services sotto: sono i due
           elementi che hanno overflow-y:auto nei rispettivi breakpoint
           (.menu__body sotto i 901px, .menu__services sopra — vedi
           style.css) e vanno entrambi esclusi dalla gestione wheel/touch
           di Lenis, altrimenti lo scroll nativo non parte mai. -->
      <div class="menu__body" data-lenis-prevent>
        <nav class="menu__links">
          <a href="<?php echo $menuBase; ?>#chi-siamo"><small>01</small>Chi siamo</a>
          <a href="<?php echo $menuBase; ?>#storia"><small>02</small>La storia</a>
          <a href="<?php echo $menuBase; ?>#portfolio"><small>03</small>Portfolio</a>
          <a href="<?php echo $menuBase; ?>#contatti"><small>04</small>Contatti</a>
        </nav>
        <?php if ($menuCategories): ?>
        <!-- Colonna di destra: tutte le pagine di servizio, raggruppate per
             categoria, in un'unica colonna verticale scrollabile (non più
             multi-colonna come nel primo tentativo: qui lo spazio
             orizzontale è quello della sola colonna destra, non l'intera
             larghezza del menu). Per 2026-10-15: prima provata una pagina
             /servizi a sé (bocciata, l'utente la voleva di nuovo dentro al
             menu) — qui si riparte da quello, ma con lo spazio a
             disposizione del desktop usato apposta (prima era schiacciata
             sotto i 4 link grandi), e con un'affordance di scroll vera
             (ombra in fondo + scrollbar visibile in style.css), perché la
             versione precedente non ne aveva nessuna. Il mobile per ora
             eredita lo stesso markup/scroll verticale: il refinement
             specifico per schermi piccoli è un passo successivo.
             data-lenis-prevent: senza questo attributo Lenis (vedi
             script.js) intercetta wheel/touch su tutta la pagina e
             impedisce lo scroll nativo di questo elemento, anche con
             overflow-y:auto impostato correttamente in CSS — Lenis lo
             controlla con closest('[data-lenis-prevent]') ed esclude
             l'elemento (e i suoi figli) dalla propria gestione. Bug reale
             trovato dall'utente: un test con scrollTop impostato via JS
             (invece di un vero scroll/swipe) non lo faceva emergere. -->
        <div class="menu__services" data-lenis-prevent>
          <?php foreach ($menuCategories as $categoryName => $pages): ?>
            <div class="menu__services-group">
              <span class="menu__services-cat"><?php echo htmlspecialchars($categoryName); ?></span>
              <ul class="menu__services-list">
                <?php foreach ($pages as $p): ?>
                  <li>
                    <a href="<?php echo BASE_URL . "/" . $p["slug"]; ?>"><?php echo htmlspecialchars($p["title"]); ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="menu__foot">
        <div class="menu__foot-row">
          <a href="tel:+390350085044">+39 035 00 85 044</a>
          <a href="mailto:info@ewebsolution.it">info@ewebsolution.it</a>
        </div>
        <div class="menu__foot-row menu__foot-row--social">
          <a href="<?php echo BASE_URL; ?>/magazine">Magazine</a>
          <a href="https://www.instagram.com/eweb_srl/" target="_blank" rel="noopener">Instagram</a>
          <a href="https://www.linkedin.com/company/eweb-web-tailor-design-and-marketing/" target="_blank" rel="noopener">LinkedIn</a>
        </div>
      </div>
    </div>
