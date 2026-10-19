<?php
/* Testata delle pagine di servizio — unico template, non più copiato a
   mano in ogni pagina (lo era nelle prime 4: una modifica qui vale per
   tutte, invece di doverla ripetere file per file). La pagina che include
   questo file imposta PRIMA:
   - $heroCategory  (string)       eyebrow, es. "Web site"
   - $heroTitle     (string, HTML) titolo — può contenere <br>/<em>
   - $heroLead      (string, HTML) paragrafo lead — può contenere <em>
   Opzionale, $heroCtaHref: dove porta il bottone "Parliamone". Di
   default va al form di contatto in home (comportamento di sempre, non
   cambia se non lo si imposta) — le pagine articolo del magazine lo
   puntano invece a "#contatti" nella STESSA pagina (l'id che
   inc/service-cta.php porta ora), per scorrere fino alla loro CTA in
   fondo invece di saltare subito via dalla pagina. Vedi
   magazine/articoli/*.php.
   Layout a due colonne da 901px in su (titolo grande a sinistra, lead +
   bottone allineati in basso a destra — si legge come un sommario, non
   più tutto impilato uguale) e a una colonna sotto, stesso breakpoint di
   .about__split/.service-section__grid.
   Animazioni: l'eyebrow ha un ingresso .reveal (prima appariva di colpo,
   senza animazione propria) + lo scramble (lo stesso "la parola si forma"
   di "pitch"/"metodo" in home, vedi [data-scramble] in script.js) — qui e
   non sul titolo: a caratteri misti maiuscole/minuscole su un corsivo
   enorme come .service-hero__title la larghezza della riga "balla"
   vistosamente mentre scrambla (visto, tolto da lì), mentre su un testo
   piccolo come l'eyebrow non si nota, esattamente come in home. Il
   titolo usa solo .reveal-lines (lo stesso meccanismo dei titoli in
   home); la lead usa [data-words] — lo stesso "si legge mentre si
   scorre" del manifesto in home — invece del semplice fade. La graffa
   qui non c'è più: vive accanto ai titoli delle sezioni sotto
   (service-section__head-brace) e in fondo alla CTA. */
?>
<section class="service-hero" data-theme="dark">
  <div class="container service-hero__head">
    <div class="service-hero__title-col">
      <span class="eyebrow eyebrow--muted reveal" data-scramble><?php echo htmlspecialchars($heroCategory); ?></span>
      <h1 class="service-hero__title reveal-lines"><?php echo $heroTitle; ?></h1>
    </div>
    <div class="service-hero__side">
      <p class="body-l service-hero__lead" data-words><?php echo $heroLead; ?></p>
      <div class="service-hero__actions reveal">
        <a class="btn btn--ghost" href="<?php echo $heroCtaHref ?? (BASE_URL . "/#contatti"); ?>" data-magnetic>
          <span class="btn__text">Parliamone</span>
          <span class="btn__arrow">→</span>
        </a>
      </div>
    </div>
  </div>
</section>
