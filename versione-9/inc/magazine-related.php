<?php
/* Sezione "Potrebbe interessarti anche" per le pagine articolo del
   magazine (magazine/articoli/*.php) — stessa idea e stesso componente
   (.service-related__list) di inc/related.php per le pagine di servizio,
   qui però gli "altri articoli" sono quelli dello stesso numero (non
   serve un catalogo centrale come $SERVICE_PAGES: ogni pagina-articolo
   porta già con sé $altriArticoli, calcolato in fase di generazione).
   La pagina che include questo file imposta PRIMA:
   - $altriArticoli (array)  ogni voce: slug/title/teaser
   - $heroCategory  (string) riusata qui com'è per l'eyebrow, es.
                              "Magazine — Numero 01"
   Non stampa nulla se $altriArticoli è vuoto. */
?>
<?php if (!empty($altriArticoli)): ?>
<section class="service-section service-section--light service-related" data-theme="light">
  <div class="container">
    <div class="service-section__head">
      <span class="eyebrow eyebrow--muted"><?php echo htmlspecialchars($heroCategory); ?></span>
      <h2 class="h2 reveal-lines">Potrebbe interessarti anche.</h2>
    </div>
    <ul class="service-related__list">
      <?php foreach ($altriArticoli as $i => $alt): ?>
        <li class="reveal">
          <a class="service-related__link" href="<?php echo BASE_URL . "/magazine/" . $alt["slug"]; ?>">
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
