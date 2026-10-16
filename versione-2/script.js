/* =========================================================
   eWeb — Home (versione 2)
   ========================================================= */
(() => {
  'use strict';

  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const hasGSAP = typeof window.gsap !== 'undefined' && typeof window.ScrollTrigger !== 'undefined';

  // Senza GSAP (o con animazioni ridotte) i contenuti restano visibili
  if (!hasGSAP || reduced) document.documentElement.classList.remove('js');
  if (hasGSAP) gsap.registerPlugin(ScrollTrigger);

  $$('.year').forEach((el) => { el.textContent = new Date().getFullYear(); });

  /* ---------- Header ---------- */
  const header = $('.header');
  const burger = $('.header__burger');
  const mobileMenu = $('#mobile-menu');

  const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 40);
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  const toggleMenu = (open) => {
    header.classList.toggle('menu-open', open);
    burger.setAttribute('aria-expanded', String(open));
    burger.setAttribute('aria-label', open ? 'Chiudi il menu' : 'Apri il menu');
    mobileMenu.hidden = !open;
  };
  burger.addEventListener('click', () => toggleMenu(mobileMenu.hidden));
  $$('a', mobileMenu).forEach((a) => a.addEventListener('click', () => toggleMenu(false)));
  window.addEventListener('resize', () => { if (window.innerWidth > 900) toggleMenu(false); });

  // Voce di menu attiva in base alla sezione visibile
  const navLinks = $$('.header__nav a');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      navLinks.forEach((a) => a.classList.toggle('is-active', a.getAttribute('href') === '#' + entry.target.id));
    });
  }, { rootMargin: '-45% 0px -50% 0px' });
  $$('main section[id]').forEach((s) => observer.observe(s));

  /* ---------- Video ---------- */
  const heroVideo = $('.hero__video');
  if (heroVideo) {
    const ready = () => heroVideo.classList.add('is-ready');
    if (heroVideo.readyState >= 2) ready();
    else heroVideo.addEventListener('loadeddata', ready, { once: true });
  }

  const vmodal = $('.vmodal');
  const vmodalVideo = $('.vmodal__video');
  const toggleVideo = (open) => {
    vmodal.classList.toggle('is-open', open);
    vmodal.setAttribute('aria-hidden', String(!open));
    document.body.style.overflow = open ? 'hidden' : '';
    if (open) vmodalVideo.play().catch(() => {});
    else vmodalVideo.pause();
  };
  $$('[data-video-open]').forEach((b) => b.addEventListener('click', () => toggleVideo(true)));
  $$('[data-video-close]').forEach((b) => b.addEventListener('click', () => toggleVideo(false)));
  vmodal.addEventListener('click', (e) => { if (e.target === vmodal) toggleVideo(false); });
  document.addEventListener('keydown', (e) => {
    if (e.key !== 'Escape') return;
    if (vmodal.classList.contains('is-open')) toggleVideo(false);
    if (!mobileMenu.hidden) toggleMenu(false);
  });

  /* ---------- Animazioni di entrata ---------- */
  if (hasGSAP && !reduced) {
    ScrollTrigger.batch('[data-reveal]', {
      start: 'top 90%',
      once: true,
      onEnter: (batch) => gsap.to(batch, { opacity: 1, y: 0, duration: 0.9, stagger: 0.08, ease: 'power3.out', overwrite: true }),
    });

    gsap.fromTo('.hero__video', { scale: 1.12 }, { scale: 1, duration: 2.4, ease: 'power2.out' });
  }

  /* ---------- Contatori ---------- */
  const fmt = { format: (v) => String(v).replace(/\B(?=(\d{3})+(?!\d))/g, '.') }; // 1000 → 1.000
  $$('[data-count]').forEach((el) => {
    const end = +el.dataset.count;
    const from = +(el.dataset.from || 0);
    const format = (v) => (el.dataset.format === 'it' ? fmt.format(v) : String(v));
    if (!hasGSAP || reduced) { el.textContent = format(end); return; }
    const o = { v: from };
    el.textContent = format(from);
    ScrollTrigger.create({
      trigger: el, start: 'top 90%', once: true,
      onEnter: () => gsap.to(o, {
        v: end, duration: 1.8, ease: 'power2.out',
        onUpdate: () => { el.textContent = format(Math.round(o.v)); },
      }),
    });
  });

  /* ---------- Progetti: filtri + "mostra tutti" ---------- */
  const INITIAL = 9;
  const cards = $$('.card');
  const filters = $$('.filter');
  const moreWrap = $('.work__more');
  let current = 'all';
  let expanded = false;

  function applyFilter(animate = true) {
    const shown = [];
    cards.forEach((card, i) => {
      const match = current === 'all' || card.dataset.cat.split(' ').includes(current);
      const visible = match && (current !== 'all' || expanded || i < INITIAL);
      const wasHidden = card.classList.contains('is-hidden');
      card.classList.toggle('is-hidden', !visible);
      if (visible && (wasHidden || animate)) shown.push(card);
    });

    filters.forEach((f) => {
      const on = f.dataset.filter === current;
      f.classList.toggle('is-active', on);
      f.setAttribute('aria-selected', String(on));
    });

    moreWrap.hidden = current !== 'all' || expanded || cards.length <= INITIAL;

    if (hasGSAP && !reduced && animate && shown.length) {
      gsap.fromTo(shown, { opacity: 0, y: 24 }, { opacity: 1, y: 0, duration: 0.6, stagger: 0.05, ease: 'power3.out', overwrite: true });
    }
    if (hasGSAP) ScrollTrigger.refresh();
  }

  filters.forEach((f) => f.addEventListener('click', () => {
    current = f.dataset.filter;
    applyFilter();
  }));
  $('[data-more]').addEventListener('click', () => { expanded = true; applyFilter(); });

  $$('[data-filter-go]').forEach((b) => b.addEventListener('click', () => {
    current = b.dataset.filterGo;
    applyFilter();
    $('#progetti').scrollIntoView({ behavior: reduced ? 'auto' : 'smooth' });
  }));

  applyFilter(false);

  /* ---------- Form ---------- */
  const form = $('.form');
  const status = $('.form__status', form);
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    let ok = true;
    $$('.field', form).forEach((f) => {
      const input = $('input, textarea, select', f);
      const valid = input.checkValidity();
      f.classList.toggle('is-invalid', !valid);
      if (!valid) ok = false;
    });
    const privacy = $('[name="privacy"]', form);
    privacy.closest('.check').classList.toggle('is-invalid', !privacy.checked);
    if (!privacy.checked) ok = false;

    status.className = 'form__status';
    if (!ok) {
      status.textContent = 'Controlla i campi obbligatori evidenziati.';
      status.classList.add('is-error');
      return;
    }
    // TODO: collegare l'endpoint reale (es. fetch('/api/contatti', { method: 'POST', body: new FormData(form) }))
    status.textContent = 'Grazie! Uno di noi ti ricontatterà a breve. Una persona, non un bot.';
    status.classList.add('is-ok');
    form.reset();
  });
  $$('input, textarea, select', form).forEach((i) => i.addEventListener('input', () => {
    i.closest('.field, .check')?.classList.remove('is-invalid');
  }));
})();
