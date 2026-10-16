<?php
/* CTA finale delle pagine di servizio — SEMPRE gialla (richiesta esplicita
   del cliente, non un'eccezione): estratta qui apposta perché nessuna
   nuova pagina possa "dimenticarselo" copiando il blocco a mano. La pagina
   che include questo file imposta PRIMA $ctaLine (string, HTML — può
   contenere <em>). Rimanda sempre al form unico in home (#contatti), mai
   una copia del form. */
?>
<section class="service-cta service-cta--yellow" data-theme="light">
  <div class="container service-cta__inner">
    <p class="service-cta__line" data-words><?php echo $ctaLine; ?></p>
    <div class="service-cta__actions">
      <a class="btn btn--solid" href="<?php echo BASE_URL; ?>/#contatti" data-magnetic>
        <span class="btn__text">Parliamone</span>
        <span class="btn__arrow">→</span>
      </a>
      <a class="btn btn--ghost" href="<?php echo BASE_URL; ?>/#portfolio" data-magnetic>
        <span class="btn__text">Guarda i progetti</span>
        <span class="btn__arrow">→</span>
      </a>
    </div>
    <!-- Firma: lo stesso "}" del logo, già usato in home accanto alla
       citazione finale del portfolio (.portfolio__brace) — qui a chiusura
       della CTA, nella sua variante a dimensione propria (.service-cta__brace). -->
    <span class="brace service-cta__brace" aria-hidden="true"></span>
  </div>
</section>
