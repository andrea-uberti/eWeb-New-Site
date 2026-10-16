<?php
/* Sezione "altre pagine della stessa categoria" — ogni pagina di servizio
   imposta $currentSlug (la propria chiave in $SERVICE_PAGES, vedi
   inc/config.php) PRIMA di includere questo file. Non stampa nulla se la
   pagina non è nel catalogo o se è sola nella sua categoria. */
$currentCategory = $SERVICE_PAGES[$currentSlug]["category"] ?? null;
$siblings = [];
if ($currentCategory) {
  foreach ($SERVICE_PAGES as $slug => $page) {
    if ($slug !== $currentSlug && $page["category"] === $currentCategory) {
      $siblings[$slug] = $page;
    }
  }
}
?>
<?php if ($siblings): ?>
<section class="service-section service-section--light service-related" data-theme="light">
  <div class="container">
    <div class="service-section__head">
      <span class="eyebrow eyebrow--muted"><?php echo htmlspecialchars($currentCategory); ?></span>
      <h2 class="h2 reveal-lines">Potrebbe interessarti anche.</h2>
    </div>
    <ul class="service-related__list">
      <?php $i = 0; foreach ($siblings as $slug => $page): $i++; ?>
        <li class="reveal">
          <a class="service-related__link" href="<?php echo BASE_URL . "/" . $slug; ?>">
            <span class="service-related__link-num"><?php echo sprintf("%02d", $i); ?></span>
            <span class="service-related__link-body">
              <span class="service-related__link-text"><?php echo htmlspecialchars($page["title"]); ?></span>
              <?php if (!empty($page["teaser"])): ?>
                <span class="service-related__link-teaser"><?php echo htmlspecialchars($page["teaser"]); ?></span>
              <?php endif; ?>
            </span>
            <span class="btn__arrow">→</span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php endif; ?>
