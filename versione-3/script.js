/* =========================================================
   eWeb — Home (versione 3: raccontare, non vendere)
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

  function splitChars(el) {
    const wrap = (node) => {
      [...node.childNodes].forEach((child) => {
        if (child.nodeType === 3) {
          const frag = document.createDocumentFragment();
          child.textContent.split(/(\s+)/).forEach((part) => {
            if (!part) return;
            if (/^\s+$/.test(part)) { frag.appendChild(document.createTextNode(' ')); return; }
            const word = document.createElement('span');
            word.className = 'word';
            [...part].forEach((ch) => {
              const s = document.createElement('span');
              s.className = 'ch';
              s.textContent = ch;
              word.appendChild(s);
            });
            frag.appendChild(word);
          });
          child.replaceWith(frag);
        } else if (child.nodeType === 1) wrap(child);
      });
    };
    wrap(el);
    return $$('.ch', el);
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

          vec2 q = p + 0.35 * vec2(snoise(vec3(p * 0.9, t)), snoise(vec3(p * 0.9 + 4.0, t)));
          float n = snoise(vec3(q * 1.1, t * 1.3)) * 0.5 + 0.5;

          vec2 m = uMouse * vec2(uRes.x / uRes.y, 1.0);
          float glow = smoothstep(0.9, 0.0, distance(p, m));

          vec3 c = mix(uNavy * 0.72, uNavy, smoothstep(0.1, 0.6, uv.y + n * 0.3));
          c = mix(c, uSky, smoothstep(0.45, 0.95, n) * 0.75);
          c = mix(c, uSky, glow * 0.25);
          float sun = smoothstep(0.78, 1.0, snoise(vec3(q * 0.8 + 10.0, t * 0.8)) * 0.5 + 0.5);
          c = mix(c, uSun, sun * 0.35);

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
  gsap.set(['.logo--hero', '.hero__meta--center'], { autoAlpha: 0, y: 24 });
  gsap.set('.nav', { autoAlpha: 0 });

  const heroManifestoChars = $('.manifesto--hero') ? splitChars($('.manifesto--hero')) : [];

  function runLoader() {
    const loader = $('.loader');
    const numEl = $('.loader__num');
    const barSpan = $('.loader__bar span');
    const tl = gsap.timeline();

    if (reduced) {
      loader.remove();
      return Promise.resolve();
    }

    const counter = { v: 0 };
    tl.to(counter, {
      v: 100, duration: 2.4, ease: 'power2.inOut',
      onUpdate: () => {
        const val = Math.round(counter.v);
        numEl.textContent = val;
        gsap.set(barSpan, { scaleX: val / 100 });
      },
    }, 0);

    tl.to(loader, { clipPath: 'inset(0 0 100% 0)', duration: 1.1, ease: 'expo.inOut' }, '>0.1');

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
      .to('.logo--hero', { autoAlpha: 1, y: 0, duration: 1.2 }, 0.1)
      .to('.hero__meta--center', { autoAlpha: 1, y: 0, duration: 1.2 }, 0.5);
    if (hero) tl.to(hero.uniforms.uReveal, { value: 1, duration: 2.4, ease: 'power2.out' }, 0);
    // Il nav resta invisibile finché siamo sulla hero: compare più avanti, legato allo scroll.
  }

  const fontsReady = document.fonts ? document.fonts.ready : Promise.resolve();
  Promise.all([runLoader(), fontsReady]).then(() => {
    intro();
    ScrollTrigger.refresh();
  });

  /* ---------------------------------------------------------
     Hero — il manifesto compare lettera per lettera scrollando
     (il video resta fermo, in pin), poi lascia il posto al nav
     e al resto del racconto.
     --------------------------------------------------------- */
  // Riserva 0 -> 0.35 per la rivelazione, un tratto fermo 0.35 -> 0.8 per
  // dare il tempo di leggere, poi l'uscita in 0.8 -> 1.
  const charStagger = 0.32 / Math.max(heroManifestoChars.length, 1);
  let heroMaxProgress = 0;
  gsap.timeline({
    scrollTrigger: {
      trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true,
      // "Ratchet": una volta rivelata, l'animazione non deve tornare indietro
      // se si risale con lo scroll — resta ferma al punto più avanzato raggiunto.
      onUpdate(self) {
        if (self.progress >= heroMaxProgress) { heroMaxProgress = self.progress; return; }
        self.animation.progress(heroMaxProgress);
      },
    },
  })
    .to(heroManifestoChars, {
      color: (i, t) => (t.closest('em') ? '#fcda18' : 'rgba(255,255,255,0.94)'),
      stagger: charStagger, duration: 0.35, ease: 'none',
    }, 0)
    .to('.hero__meta--center', { autoAlpha: 0, duration: 0.06, ease: 'none' }, 0.8)
    .to('.hero__content--minimal', { yPercent: -14, autoAlpha: 0.15, duration: 0.2, ease: 'none' }, 0.8)
    .to('.nav', { autoAlpha: 1, duration: 0.2, ease: 'none' }, 0.8)
    .to('.hero__video', { yPercent: 16, duration: 1, ease: 'none' }, 0)
    .to('.hero__canvas', { yPercent: 16, duration: 1, ease: 'none' }, 0);

  /* ---------------------------------------------------------
     Nav
     --------------------------------------------------------- */
  const nav = $('.nav');
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

  function initMenu(lenisRef) {
    const burger = $('.nav__burger');
    const menu = $('.menu');
    if (!burger) return;
    const toggle = (open) => {
      if (open) {
        // Il cerchio del menu si apre esattamente dal punto dell'hamburger
        const r = burger.getBoundingClientRect();
        menu.style.setProperty('--menu-x', `${((r.left + r.width / 2) / window.innerWidth) * 100}%`);
        menu.style.setProperty('--menu-y', `${((r.top + r.height / 2) / window.innerHeight) * 100}%`);
      }
      document.body.classList.toggle('menu-open', open);
      burger.setAttribute('aria-expanded', String(open));
      menu.setAttribute('aria-hidden', String(!open));
      if (lenisRef) open ? lenisRef.stop() : lenisRef.start();
    };
    burger.addEventListener('click', () => toggle(!document.body.classList.contains('menu-open')));
    $$('a', menu).forEach((a) => a.addEventListener('click', () => toggle(false)));
  }

  /* ---------------------------------------------------------
     Video di sfondo hero
     --------------------------------------------------------- */
  const heroVideo = $('.hero__video');
  if (heroVideo) {
    const ready = () => heroVideo.classList.add('is-ready');
    if (heroVideo.readyState >= 2) ready();
    else heroVideo.addEventListener('loadeddata', ready, { once: true });
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

  /* ---------------------------------------------------------
     La nostra storia
     --------------------------------------------------------- */
  const steps = $$('.story__step');
  let storyMaxProgress = 0;
  gsap.to('.story__progress', {
    scaleX: 1, ease: 'none',
    scrollTrigger: {
      trigger: '.story__steps', start: 'top 85%', end: 'bottom 55%', scrub: 0.5,
      onUpdate: (self) => {
        // Stesso "ratchet" della hero: i pallini accesi non si spengono risalendo.
        const p = Math.max(self.progress, storyMaxProgress);
        storyMaxProgress = p;
        if (self.progress < p) self.animation.progress(p);
        steps.forEach((s, i) => s.classList.toggle('is-on', p >= i / steps.length + 0.02));
      },
    },
  });
  gsap.from(steps, {
    y: 40, autoAlpha: 0, duration: 1, stagger: 0.12, ease: 'expo.out',
    scrollTrigger: { trigger: '.story__steps', start: 'top 85%' },
  });

  /* ---------------------------------------------------------
     CTA finale
     --------------------------------------------------------- */
  gsap.from('.finale__lead', {
    skewY: 4, scale: 0.96, transformOrigin: 'left bottom', duration: 1.3, ease: 'expo.out',
    scrollTrigger: { trigger: '.finale', start: 'top 70%' },
  });
  gsap.from('.finale__sign', {
    y: 20, autoAlpha: 0, duration: 1, ease: 'expo.out',
    scrollTrigger: { trigger: '.finale', start: 'top 55%' },
  });
  gsap.from('.finale__form .field', {
    y: 30, autoAlpha: 0, duration: 0.9, stagger: 0.1, ease: 'expo.out',
    scrollTrigger: { trigger: '.finale', start: 'top 55%' },
  });
  gsap.from('.finale__form-foot', {
    y: 20, autoAlpha: 0, duration: 1, ease: 'expo.out',
    scrollTrigger: { trigger: '.finale', start: 'top 40%' },
  });

  initForm();

  function initForm() {
    const form = $('.finale__form');
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

      status.classList.remove('is-ok');
      if (!ok) {
        status.textContent = 'Manca qualcosa: controlla i campi evidenziati.';
        return;
      }
      // TODO: collegare l'endpoint reale (es. fetch('/api/contatti', { method: 'POST', body: new FormData(form) }))
      status.textContent = 'Grazie! Uno di noi ti ricontatterà a breve.';
      status.classList.add('is-ok');
      form.reset();
    });
    $$('.field input, .field textarea', form).forEach((i) =>
      i.addEventListener('input', () => i.closest('.field').classList.remove('is-invalid')));
  }

  /* ---------------------------------------------------------
     Tocchi "wow": linee che si disegnano, dettagli in movimento
     --------------------------------------------------------- */
  $$('.eyebrow__line').forEach((line) => {
    gsap.fromTo(line, { scaleX: 0 }, {
      scaleX: 1, transformOrigin: 'left center', duration: 1, ease: 'power3.out',
      scrollTrigger: { trigger: line, start: 'top 92%' },
    });
  });

  /* ---------------------------------------------------------
     Tema chiaro/scuro per sezione
     --------------------------------------------------------- */
  const themed = $$('[data-theme]');
  const metaTheme = $('meta[name="theme-color"]');
  const themeColors = { dark: '#044d8b', light: '#ffffff' };
  const setTheme = (t) => {
    document.body.classList.toggle('theme-light', t === 'light');
    metaTheme?.setAttribute('content', themeColors[t] || themeColors.dark);
  };
  // Un solo controllo, guidato dalla posizione di scroll reale: individua
  // la sezione più avanzata già raggiunta e applica il suo tema. Più
  // affidabile di tanti onEnter/onLeaveBack separati, che con sezioni
  // molto alte (la hero) potevano disallinearsi e restare bloccati chiari.
  const applyThemeForScroll = () => {
    const y = window.scrollY + window.innerHeight * 0.5;
    let current = themed[0];
    themed.forEach((sec) => { if (sec.offsetTop <= y) current = sec; });
    setTheme(current?.dataset.theme || 'dark');
  };
  ScrollTrigger.create({ start: 0, end: 'max', onUpdate: applyThemeForScroll, onRefresh: applyThemeForScroll });
  applyThemeForScroll();

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
