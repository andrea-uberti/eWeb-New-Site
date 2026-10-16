/* =========================================================
   eWeb — Home
   GSAP + ScrollTrigger + Lenis + Three.js
   ========================================================= */
(() => {
  'use strict';

  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
  const hasGSAP = typeof window.gsap !== 'undefined' && typeof window.ScrollTrigger !== 'undefined';

  const year = $('.year');
  if (year) year.textContent = new Date().getFullYear();

  // Se GSAP non carica, il sito resta navigabile
  if (!hasGSAP) {
    document.body.classList.remove('is-loading');
    $('.loader')?.remove();
    initMenu(null);
    initForm();
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  /* ---------------------------------------------------------
     Smooth scroll (Lenis)
     --------------------------------------------------------- */
  let lenis = null;
  if (!reduced && typeof window.Lenis !== 'undefined') {
    lenis = new Lenis({ duration: 1.15, easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), smoothWheel: true });
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((time) => lenis.raf(time * 1000));
    gsap.ticker.lagSmoothing(0);
    lenis.stop();
  }

  const scrollTo = (target, opts = {}) => {
    if (lenis) lenis.scrollTo(target, { duration: 1.6, ...opts });
    else {
      const y = typeof target === 'number' ? target : target.getBoundingClientRect().top + window.scrollY;
      window.scrollTo({ top: y, behavior: reduced ? 'auto' : 'smooth' });
    }
  };

  /* ---------------------------------------------------------
     Text helpers
     --------------------------------------------------------- */
  function splitLines(el) {
    el.innerHTML = el.innerHTML
      .split(/<br\s*\/?>/i)
      .map((html) => `<span class="rl"><span>${html.trim()}</span></span>`)
      .join('');
    return $$('.rl > span', el);
  }

  function splitWords(el) {
    const wrap = (node) => {
      [...node.childNodes].forEach((child) => {
        if (child.nodeType === 3) {
          const frag = document.createDocumentFragment();
          child.textContent.split(/(\s+)/).forEach((part) => {
            if (!part) return;
            if (/^\s+$/.test(part)) frag.appendChild(document.createTextNode(' '));
            else {
              const s = document.createElement('span');
              s.className = 'w';
              s.textContent = part;
              frag.appendChild(s);
            }
          });
          child.replaceWith(frag);
        } else if (child.nodeType === 1) wrap(child);
      });
    };
    wrap(el);
    return $$('.w', el);
  }

  /* ---------------------------------------------------------
     Hero — sfondo Three.js: sfumatura morbida nei colori del brand.
     Resta sotto al video (e lo sostituisce finché il video non c'è).
     --------------------------------------------------------- */
  const hero = initHeroScene();

  function initHeroScene() {
    const canvas = $('.hero__canvas');
    if (!canvas || typeof window.THREE === 'undefined') return null;

    let renderer;
    try {
      renderer = new THREE.WebGLRenderer({ canvas, alpha: false, antialias: false });
    } catch (e) {
      return null;
    }
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5));

    const scene = new THREE.Scene();
    const camera = new THREE.OrthographicCamera(-1, 1, 1, -1, 0, 1);
    const css = getComputedStyle(document.documentElement);
    const col = (name, fallback) => new THREE.Color(css.getPropertyValue(name).trim() || fallback);

    const uniforms = {
      uTime: { value: 0 },
      uMouse: { value: new THREE.Vector2(0.5, 0.5) },
      uRes: { value: new THREE.Vector2(1, 1) },
      uReveal: { value: 0 },
      uNavy: { value: col('--navy', '#044d8b') },
      uSky: { value: col('--sky', '#189edc') },
      uSun: { value: col('--sun', '#fcda18') },
    };

    const mat = new THREE.ShaderMaterial({
      uniforms,
      vertexShader: /* glsl */ `
        varying vec2 vUv;
        void main() { vUv = uv; gl_Position = vec4(position.xy, 0.0, 1.0); }
      `,
      fragmentShader: /* glsl */ `
        uniform float uTime;
        uniform vec2 uMouse;
        uniform vec2 uRes;
        uniform float uReveal;
        uniform vec3 uNavy;
        uniform vec3 uSky;
        uniform vec3 uSun;
        varying vec2 vUv;

        // simplex noise 3D (Ashima Arts)
        vec4 permute(vec4 x){ return mod(((x*34.0)+1.0)*x, 289.0); }
        vec4 taylorInvSqrt(vec4 r){ return 1.79284291400159 - 0.85373472095314 * r; }
        float snoise(vec3 v){
          const vec2 C = vec2(1.0/6.0, 1.0/3.0);
          const vec4 D = vec4(0.0, 0.5, 1.0, 2.0);
          vec3 i = floor(v + dot(v, C.yyy));
          vec3 x0 = v - i + dot(i, C.xxx);
          vec3 g = step(x0.yzx, x0.xyz);
          vec3 l = 1.0 - g;
          vec3 i1 = min(g.xyz, l.zxy);
          vec3 i2 = max(g.xyz, l.zxy);
          vec3 x1 = x0 - i1 + C.xxx;
          vec3 x2 = x0 - i2 + 2.0 * C.xxx;
          vec3 x3 = x0 - 1.0 + 3.0 * C.xxx;
          i = mod(i, 289.0);
          vec4 p = permute(permute(permute(i.z + vec4(0.0, i1.z, i2.z, 1.0)) + i.y + vec4(0.0, i1.y, i2.y, 1.0)) + i.x + vec4(0.0, i1.x, i2.x, 1.0));
          float n_ = 1.0/7.0;
          vec3 ns = n_ * D.wyz - D.xzx;
          vec4 j = p - 49.0 * floor(p * ns.z * ns.z);
          vec4 x_ = floor(j * ns.z);
          vec4 y_ = floor(j - 7.0 * x_);
          vec4 x = x_ * ns.x + ns.yyyy;
          vec4 y = y_ * ns.x + ns.yyyy;
          vec4 h = 1.0 - abs(x) - abs(y);
          vec4 b0 = vec4(x.xy, y.xy);
          vec4 b1 = vec4(x.zw, y.zw);
          vec4 s0 = floor(b0) * 2.0 + 1.0;
          vec4 s1 = floor(b1) * 2.0 + 1.0;
          vec4 sh = -step(h, vec4(0.0));
          vec4 a0 = b0.xzyw + s0.xzyw * sh.xxyy;
          vec4 a1 = b1.xzyw + s1.xzyw * sh.zzww;
          vec3 p0 = vec3(a0.xy, h.x);
          vec3 p1 = vec3(a0.zw, h.y);
          vec3 p2 = vec3(a1.xy, h.z);
          vec3 p3 = vec3(a1.zw, h.w);
          vec4 norm = taylorInvSqrt(vec4(dot(p0,p0), dot(p1,p1), dot(p2,p2), dot(p3,p3)));
          p0 *= norm.x; p1 *= norm.y; p2 *= norm.z; p3 *= norm.w;
          vec4 m = max(0.6 - vec4(dot(x0,x0), dot(x1,x1), dot(x2,x2), dot(x3,x3)), 0.0);
          m = m * m;
          return 42.0 * dot(m*m, vec4(dot(p0,x0), dot(p1,x1), dot(p2,x2), dot(p3,x3)));
        }

        void main() {
          vec2 uv = vUv;
          vec2 p = uv * vec2(uRes.x / uRes.y, 1.0);
          float t = uTime * 0.06;

          // campo "liquido" lento
          vec2 q = p + 0.35 * vec2(snoise(vec3(p * 0.9, t)), snoise(vec3(p * 0.9 + 4.0, t)));
          float n = snoise(vec3(q * 1.1, t * 1.3)) * 0.5 + 0.5;

          // luce che segue il mouse
          vec2 m = uMouse * vec2(uRes.x / uRes.y, 1.0);
          float glow = smoothstep(0.9, 0.0, distance(p, m));

          vec3 c = mix(uNavy * 0.72, uNavy, smoothstep(0.1, 0.6, uv.y + n * 0.3));
          c = mix(c, uSky, smoothstep(0.45, 0.95, n) * 0.75);
          c = mix(c, uSky, glow * 0.25);
          float sun = smoothstep(0.78, 1.0, snoise(vec3(q * 0.8 + 10.0, t * 0.8)) * 0.5 + 0.5);
          c = mix(c, uSun, sun * 0.35);

          // vignetta + fade in
          c *= mix(0.78, 1.0, smoothstep(1.2, 0.3, distance(uv, vec2(0.5, 0.6))));
          c = mix(uNavy * 0.6, c, uReveal);
          gl_FragColor = vec4(c, 1.0);
        }
      `,
    });

    scene.add(new THREE.Mesh(new THREE.PlaneGeometry(2, 2), mat));

    const heroEl = $('.hero');
    const target = new THREE.Vector2(0.5, 0.5);
    heroEl.addEventListener('pointermove', (e) => {
      const r = canvas.getBoundingClientRect();
      target.set((e.clientX - r.left) / r.width, 1 - (e.clientY - r.top) / r.height);
    });

    const resize = () => {
      const w = canvas.clientWidth, h = canvas.clientHeight;
      renderer.setSize(w, h, false);
      uniforms.uRes.value.set(w, h);
    };
    resize();
    window.addEventListener('resize', resize);

    let visible = true;
    new IntersectionObserver(([entry]) => { visible = entry.isIntersecting; }).observe(heroEl);

    const clock = new THREE.Clock();
    gsap.ticker.add(() => {
      if (!visible) return;
      uniforms.uTime.value = reduced ? 20 : clock.getElapsedTime() + 20;
      uniforms.uMouse.value.lerp(target, 0.03);
      renderer.render(scene, camera);
    });

    return { uniforms };
  }

  /* ---------------------------------------------------------
     Loader → Intro
     --------------------------------------------------------- */
  const heroLines = $$('.hero__title .line > span');
  gsap.set(heroLines, { yPercent: 115 });
  gsap.set(['.hero__eyebrow', '.hero__bottom', '.hero__meta'], { autoAlpha: 0, y: 24 });
  gsap.set('.nav', { autoAlpha: 0 });

  function runLoader() {
    const loader = $('.loader');
    const words = $$('.loader__words span');
    const tl = gsap.timeline();

    if (reduced) {
      loader.remove();
      return Promise.resolve();
    }
    gsap.set(words, { y: 0, yPercent: 110 });

    tl.to('.loader__bar span', { scaleX: 1, duration: 2.4, ease: 'power2.inOut' }, 0);

    words.forEach((w, i) => {
      tl.to(w, { yPercent: 0, duration: 0.6, ease: 'expo.out' }, i * 0.75)
        .to(w, { yPercent: -110, duration: 0.5, ease: 'expo.in' }, i * 0.75 + 0.55 + (i === words.length - 1 ? 0.35 : 0));
    });

    tl.to(loader, { clipPath: 'inset(0 0 100% 0)', duration: 1.1, ease: 'expo.inOut' }, '>-0.1');

    return new Promise((resolve) => {
      tl.eventCallback('onComplete', () => { loader.remove(); resolve(); });
      // l'intro parte mentre il loader si apre
      tl.call(resolve, null, '-=0.6');
    });
  }

  function intro() {
    document.body.classList.remove('is-loading');
    lenis?.start();

    const tl = gsap.timeline({ defaults: { ease: 'expo.out' } });
    tl.fromTo('.hero__video', { scale: 1.35 }, { scale: 1.1, duration: 2.4 }, 0)
      .to(heroLines, { yPercent: 0, duration: 1.5, stagger: 0.1 }, 0.1)
      .to('.hero__eyebrow', { autoAlpha: 1, y: 0, duration: 1.2 }, 0.4)
      .to('.nav', { autoAlpha: 1, duration: 1.2 }, 0.4)
      .to(['.hero__bottom', '.hero__meta'], { autoAlpha: 1, y: 0, duration: 1.2, stagger: 0.1 }, 0.6);
    if (hero) tl.to(hero.uniforms.uReveal, { value: 1, duration: 2.4, ease: 'power2.out' }, 0);
  }

  const fontsReady = document.fonts ? document.fonts.ready : Promise.resolve();
  Promise.all([runLoader(), fontsReady]).then(() => {
    intro();
    ScrollTrigger.refresh();
  });

  /* ---------------------------------------------------------
     Hero scroll-out
     --------------------------------------------------------- */
  const heroOut = gsap.timeline({
    scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true },
  })
    .to('.hero__content', { yPercent: -18, autoAlpha: 0.2, ease: 'none' }, 0)
    .to('.hero__video', { yPercent: 12, ease: 'none' }, 0);

  heroOut.to('.hero__canvas', { yPercent: 12, ease: 'none' }, 0);

  /* ---------------------------------------------------------
     Nav
     --------------------------------------------------------- */
  const nav = $('.nav');
  $$('.nav__link span').forEach((s) => s.setAttribute('data-text', s.textContent));
  let lastY = 0;
  ScrollTrigger.create({
    start: 0, end: 'max',
    onUpdate: (self) => {
      const y = self.scroll();
      nav.classList.toggle('is-scrolled', y > 40);
      if (!document.body.classList.contains('menu-open')) {
        nav.classList.toggle('is-hidden', y > lastY && y > window.innerHeight * 0.6);
      }
      lastY = y;
    },
  });

  initMenu(lenis);

  /* ---------------------------------------------------------
     Video: loop di sfondo + modale con la versione completa
     --------------------------------------------------------- */
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
    if (open) {
      lenis?.stop();
      vmodalVideo.play().catch(() => {});
    } else {
      lenis?.start();
      vmodalVideo.pause();
    }
  };
  $$('[data-video-open]').forEach((b) => b.addEventListener('click', () => toggleVideo(true)));
  $$('[data-video-close]').forEach((b) => b.addEventListener('click', () => toggleVideo(false)));
  vmodal.addEventListener('click', (e) => { if (e.target === vmodal) toggleVideo(false); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && vmodal.classList.contains('is-open')) toggleVideo(false); });

  function initMenu(lenisRef) {
    const burger = $('.nav__burger');
    const menu = $('.menu');
    if (!burger) return;
    const toggle = (open) => {
      document.body.classList.toggle('menu-open', open);
      burger.setAttribute('aria-expanded', String(open));
      menu.setAttribute('aria-hidden', String(!open));
      if (lenisRef) open ? lenisRef.stop() : lenisRef.start();
    };
    burger.addEventListener('click', () => toggle(!document.body.classList.contains('menu-open')));
    $$('a', menu).forEach((a) => a.addEventListener('click', () => toggle(false)));
  }

  // Anchor links
  $$('a[href^="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
      const id = a.getAttribute('href');
      if (id.length < 2) return;
      const target = id === '#top' ? 0 : $(id);
      if (target === null) return;
      e.preventDefault();
      scrollTo(target);
    });
  });
  $('.footer__top')?.addEventListener('click', () => scrollTo(0, { duration: 2 }));

  /* ---------------------------------------------------------
     Chi siamo
     --------------------------------------------------------- */
  const manifesto = $('[data-words]');
  if (manifesto) {
    const words = splitWords(manifesto);
    if (!reduced) {
      gsap.to(words, {
        opacity: 1, ease: 'none', stagger: 0.1,
        scrollTrigger: { trigger: manifesto, start: 'top 80%', end: 'bottom 40%', scrub: 0.6 },
      });
    }
  }

  $$('.reveal-lines').forEach((el) => {
    const lines = splitLines(el);
    gsap.from(lines, {
      yPercent: 115, duration: 1.3, stagger: 0.1, ease: 'expo.out',
      scrollTrigger: { trigger: el, start: 'top 85%' },
    });
  });

  $$('.reveal').forEach((el) => {
    gsap.from(el, { y: 40, autoAlpha: 0, duration: 1.2, ease: 'expo.out', scrollTrigger: { trigger: el, start: 'top 88%' } });
  });

  gsap.from('.method__item', {
    y: 60, autoAlpha: 0, duration: 1.1, stagger: 0.12, ease: 'expo.out',
    scrollTrigger: { trigger: '.method', start: 'top 80%' },
  });

  const steps = $$('.story__step');
  gsap.to('.story__progress', {
    scaleX: 1, ease: 'none',
    scrollTrigger: {
      trigger: '.story__steps', start: 'top 85%', end: 'bottom 55%', scrub: 0.5,
      onUpdate: (self) => steps.forEach((s, i) => s.classList.toggle('is-on', self.progress >= i / steps.length + 0.02)),
    },
  });
  gsap.from(steps, {
    y: 40, autoAlpha: 0, duration: 1, stagger: 0.12, ease: 'expo.out',
    scrollTrigger: { trigger: '.story__steps', start: 'top 85%' },
  });

  /* ---------------------------------------------------------
     Cosa facciamo — scroll orizzontale
     --------------------------------------------------------- */
  const work = $('.work');
  const track = $('.work__track');
  const viewport = $('.work__viewport');
  const groups = $$('.work__group');
  const names = $$('.work__topic-names span');
  const numInner = $('.work__topic-num-inner');
  const indexItems = $$('.work__index li');
  let hTween = null;
  let currentTopic = 0;

  gsap.set(names, { y: 0, yPercent: 110 });
  gsap.set(names[0], { yPercent: 0 });

  function setTopic(i) {
    if (i === currentTopic) return;
    const dir = i > currentTopic ? 1 : -1;
    gsap.to(names[currentTopic], { yPercent: -110 * dir, duration: 0.8, ease: 'expo.out', overwrite: true });
    gsap.fromTo(names[i], { yPercent: 110 * dir }, { yPercent: 0, duration: 0.8, ease: 'expo.out', overwrite: true });
    names.forEach((n, j) => n.classList.toggle('is-active', j === i));
    indexItems.forEach((li, j) => li.classList.toggle('is-active', j === i));
    gsap.fromTo(numInner, { yPercent: 60 * dir, autoAlpha: 0 }, { yPercent: 0, autoAlpha: 1, duration: 0.6, ease: 'expo.out' });
    numInner.textContent = String(i + 1).padStart(2, '0');
    currentTopic = i;
  }

  const mm = gsap.matchMedia();
  mm.add('(min-width: 901px)', () => {
    const dist = () => track.scrollWidth - viewport.clientWidth;

    hTween = gsap.to(track, {
      x: () => -dist(),
      ease: 'none',
      scrollTrigger: {
        trigger: work,
        start: 'top top',
        end: () => '+=' + dist(),
        pin: true,
        scrub: 1,
        invalidateOnRefresh: true,
        anticipatePin: 1,
        onUpdate: (self) => gsap.set('.work__progress span', { scaleX: self.progress }),
      },
    });

    groups.forEach((g, i) => {
      ScrollTrigger.create({
        trigger: g, containerAnimation: hTween,
        start: 'left 55%', end: 'right 55%',
        onToggle: (self) => self.isActive && setTopic(i),
      });

      gsap.from($$('.service > *', g), {
        y: 40, autoAlpha: 0, stagger: 0.08, duration: 1, ease: 'expo.out',
        scrollTrigger: { trigger: g, containerAnimation: hTween, start: 'left 85%' },
      });
    });

    $$('.project').forEach((p) => {
      const mark = $('.project__mark, .project__img', p);
      if (mark) {
        gsap.fromTo(mark, { xPercent: -18 }, {
          xPercent: 18, ease: 'none',
          scrollTrigger: { trigger: p, containerAnimation: hTween, start: 'left right', end: 'right left', scrub: true },
        });
      }
      gsap.from(p, {
        y: 80, rotate: 2, autoAlpha: 0, duration: 1.2, ease: 'expo.out',
        scrollTrigger: { trigger: p, containerAnimation: hTween, start: 'left 95%' },
      });
    });

    gsap.from('.work__end-text', {
      xPercent: 20, autoAlpha: 0, duration: 1.4, ease: 'expo.out',
      scrollTrigger: { trigger: '.work__end', containerAnimation: hTween, start: 'left 80%' },
    });

    return () => { hTween = null; gsap.set(track, { clearProps: 'transform' }); };
  });

  $$('.work__index button').forEach((btn) => {
    btn.addEventListener('click', () => {
      const i = +btn.dataset.goto;
      if (!hTween) return scrollTo(groups[i]);
      const st = hTween.scrollTrigger;
      const d = track.scrollWidth - viewport.clientWidth;
      const p = Math.min(1, groups[i].offsetLeft / d);
      scrollTo(st.start + p * (st.end - st.start) + 2);
    });
  });

  /* ---------------------------------------------------------
     Authority
     --------------------------------------------------------- */
  $$('[data-count]').forEach((el) => {
    const end = +el.dataset.count;
    const start = el.hasAttribute('data-plain') ? end - 26 : 0;
    const o = { v: start };
    el.textContent = start;
    ScrollTrigger.create({
      trigger: el, start: 'top 90%', once: true,
      onEnter: () => gsap.to(o, { v: end, duration: 2, ease: 'power3.out', onUpdate: () => { el.textContent = Math.round(o.v); } }),
    });
  });

  gsap.from('.stat', {
    y: 50, autoAlpha: 0, duration: 1.1, stagger: 0.1, ease: 'expo.out',
    scrollTrigger: { trigger: '.stats', start: 'top 85%' },
  });
  gsap.from(['.quote', '.badge'], {
    y: 50, autoAlpha: 0, duration: 1.1, stagger: 0.12, ease: 'expo.out',
    scrollTrigger: { trigger: '.authority__grid', start: 'top 80%' },
  });

  // Marquee infinito, accelera con lo scroll
  $$('.marquee__row').forEach((row) => {
    const inner = $('.marquee__inner', row);
    row.appendChild(inner.cloneNode(true)).setAttribute('aria-hidden', 'true');
    const inners = $$('.marquee__inner', row);
    const dir = +row.dataset.dir;
    const tween = gsap.fromTo(inners,
      { xPercent: dir < 0 ? 0 : -100 },
      { xPercent: dir < 0 ? -100 : 0, duration: 45, ease: 'none', repeat: -1 });
    if (reduced) { tween.pause(); return; }
    let boost = gsap.quickTo(tween, 'timeScale', { duration: 0.6, ease: 'power2.out' });
    ScrollTrigger.create({
      trigger: row, start: 'top bottom', end: 'bottom top',
      onUpdate: (self) => {
        boost(1 + Math.min(Math.abs(self.getVelocity()) / 300, 6));
        clearTimeout(row._t);
        row._t = setTimeout(() => boost(1), 120);
      },
    });
  });

  /* ---------------------------------------------------------
     Contatti
     --------------------------------------------------------- */
  gsap.from('.contact__big-word', {
    yPercent: 60, skewY: 6, autoAlpha: 0, duration: 1.6, ease: 'expo.out',
    scrollTrigger: { trigger: '.contact__big', start: 'top 90%' },
  });
  gsap.from(['.contact__info', '.form'], {
    y: 60, autoAlpha: 0, duration: 1.2, stagger: 0.15, ease: 'expo.out',
    scrollTrigger: { trigger: '.contact__grid', start: 'top 85%' },
  });

  initForm();

  function initForm() {
    const form = $('.form');
    if (!form) return;
    const status = $('.form__status', form);
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      let ok = true;
      $$('.field', form).forEach((f) => {
        const input = $('input, textarea', f);
        const valid = input.checkValidity();
        f.classList.toggle('is-invalid', !valid);
        if (!valid) ok = false;
      });
      const privacy = $('[name="privacy"]', form);
      if (!privacy.checked) ok = false;

      status.classList.remove('is-ok');
      if (!ok) {
        status.textContent = 'Manca qualcosa: controlla i campi evidenziati e l’informativa privacy.';
        return;
      }
      // TODO: collegare l'endpoint reale (es. fetch('/api/contatti', { method: 'POST', body: new FormData(form) }))
      status.textContent = 'Grazie! Uno di noi ti ricontatterà a breve. Una persona, non un bot.';
      status.classList.add('is-ok');
      form.reset();
    });
    $$('.field input, .field textarea', form).forEach((i) =>
      i.addEventListener('input', () => i.closest('.field').classList.remove('is-invalid')));
  }

  /* ---------------------------------------------------------
     Tema chiaro/scuro per sezione
     (creato dopo il pin così le posizioni includono lo spacer)
     --------------------------------------------------------- */
  const themed = $$('[data-theme]');
  const metaTheme = $('meta[name="theme-color"]');
  const themeColors = { dark: '#044d8b', light: '#ffffff', sun: '#fcda18' };
  const setTheme = (t) => {
    document.body.classList.toggle('theme-light', t === 'light');
    document.body.classList.toggle('theme-sun', t === 'sun');
    metaTheme?.setAttribute('content', themeColors[t] || themeColors.dark);
  };
  themed.forEach((sec, i) => {
    ScrollTrigger.create({
      trigger: sec, start: 'top 50%',
      onEnter: () => setTheme(sec.dataset.theme),
      onLeaveBack: () => setTheme(themed[i - 1]?.dataset.theme || 'dark'),
    });
  });

  /* ---------------------------------------------------------
     Cursore + magnetic
     --------------------------------------------------------- */
  if (finePointer && !reduced) {
    const cursor = $('.cursor');
    const label = $('.cursor__label');
    const xTo = gsap.quickTo(cursor, 'x', { duration: 0.45, ease: 'power3.out' });
    const yTo = gsap.quickTo(cursor, 'y', { duration: 0.45, ease: 'power3.out' });

    window.addEventListener('pointermove', (e) => { xTo(e.clientX); yTo(e.clientY); });
    document.addEventListener('pointerover', (e) => {
      const withLabel = e.target.closest('[data-cursor]');
      cursor.classList.toggle('is-label', !!withLabel);
      if (withLabel) label.textContent = withLabel.dataset.cursor;
    });

    $$('[data-magnetic]').forEach((el) => {
      const xTo = gsap.quickTo(el, 'x', { duration: 0.6, ease: 'power3.out' });
      const yTo = gsap.quickTo(el, 'y', { duration: 0.6, ease: 'power3.out' });
      el.addEventListener('pointermove', (e) => {
        const r = el.getBoundingClientRect();
        xTo((e.clientX - r.left - r.width / 2) * 0.3);
        yTo((e.clientY - r.top - r.height / 2) * 0.4);
      });
      el.addEventListener('pointerleave', () => { xTo(0); yTo(0); });
    });
  }

  // Ricalcola dopo il caricamento completo (immagini/video)
  window.addEventListener('load', () => ScrollTrigger.refresh());
})();
