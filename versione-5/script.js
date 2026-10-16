/* =========================================================
   eWeb — Home (versione 4: si entra nel video)
   GSAP + ScrollTrigger + Lenis
   ========================================================= */
(() => {
  "use strict";

  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => [...c.querySelectorAll(s)];

  const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const finePointer = window.matchMedia(
    "(hover: hover) and (pointer: fine)",
  ).matches;
  const hasGSAP =
    typeof window.gsap !== "undefined" &&
    typeof window.ScrollTrigger !== "undefined";

  const year = $(".year");
  if (year) year.textContent = new Date().getFullYear();

  /* ---------------------------------------------------------
     Portfolio — tabelle tutte della stessa altezza
     Le 5 aree hanno un numero diverso di progetti (4 o 6 righe):
     senza intervenire, ogni tabella avrebbe un'altezza naturale
     diversa e le card del carosello orizzontale sembrerebbero
     sbilanciate. Si misura l'altezza naturale più alta tra tutte
     le tabelle e si distribuisce quella stessa altezza sulle righe
     di ciascuna — tabelle con meno righe le fanno più "ariose",
     non più corte. Solo da desktop in su: da mobile le card sono
     impilate verticalmente, l'altezza naturale va benissimo.
     --------------------------------------------------------- */
  function equalizePortfolioTables() {
    const tables = $$(".portfolio__table");
    if (!tables.length) return;
    tables.forEach((t) => {
      $$("tbody tr", t).forEach((tr) => {
        tr.style.height = "";
      });
    });
    if (!window.matchMedia("(min-width: 901px)").matches) return;
    const maxHeight = Math.max(...tables.map((t) => t.offsetHeight));
    tables.forEach((t) => {
      const thead = $("thead", t);
      const rows = $$("tbody tr", t);
      if (!thead || !rows.length) return;
      const rowHeight = (maxHeight - thead.offsetHeight) / rows.length;
      rows.forEach((tr) => {
        tr.style.height = rowHeight + "px";
      });
    });
  }
  (document.fonts ? document.fonts.ready : Promise.resolve()).then(
    equalizePortfolioTables,
  );
  let equalizeResizeT;
  window.addEventListener("resize", () => {
    clearTimeout(equalizeResizeT);
    equalizeResizeT = setTimeout(equalizePortfolioTables, 150);
  });

  /* ---------------------------------------------------------
     Titolo hero — due blocchi, su due fasce di larghezza che si
     sovrappongono al centro
     Il blocco sopra (ancorato a sinistra, left:0 in CSS) va da 0%
     a ~60% di larghezza; quello sotto (ancorato a destra, right in
     CSS) va da ~40% a 100% — si accavallano un po' nella fascia
     centrale, voluto. Per ognuno si misura la larghezza naturale a
     una taglia base e si riscala il font-size per farla sbordare
     di pochissimo oltre la sua fascia (OVERSHOOT minimo): solo la
     punta di prima/ultima lettera esce dai bordi — tagliata da
     .hero-zoom__sticky (overflow:hidden). Solo da desktop in su —
     da mobile il CSS va a capo (media query), fasce/overshoot lì
     non servono.
     --------------------------------------------------------- */
  const HERO_TITLE_OVERSHOOT = 1.25;
  const HERO_TOP_FRACTION = 0.6;
  const HERO_BOTTOM_FRACTION = 0.6; // 100% - 40% di partenza
  function fitHeroTitle() {
    const els = $$(".hero-zoom__title");
    if (!els.length) return;
    els.forEach((el) => {
      el.style.fontSize = "";
    });
    // Sotto i 901px il CSS passa a un box a piena larghezza che va a capo
    // da solo: l'inline style qui sopra viene solo ripulito (niente scala
    // residua da un resize partito da desktop), non ricalcolato.
    if (!window.matchMedia("(min-width: 901px)").matches) return;
    // Per ciascun blocco si calcola la taglia che lo farebbe entrare
    // nella sua fascia di larghezza, ma poi si applica a ENTRAMBI lo
    // stesso valore — il più piccolo dei due — così hanno lo stesso
    // peso visivo invece che una taglia a testa (la frase più lunga,
    // a parità di fascia, uscirebbe altrimenti più piccola).
    let uniformSize = Infinity;
    const sizes = els.map((el) => {
      const base = parseFloat(getComputedStyle(el).fontSize);
      const stageWidth = el.parentElement.clientWidth;
      const fraction = el.classList.contains("hero-zoom__title--top")
        ? HERO_TOP_FRACTION
        : HERO_BOTTOM_FRACTION;
      let available = stageWidth * fraction;
      // Il blocco in basso è ancorato a destra (right: var(--gutter) in
      // CSS): quel margine va tolto dalla larghezza target, altrimenti lo
      // sbordo voluto (solo a sinistra, qui) diventa eccessivo — il bordo
      // destro deve restare fermo al gutter, non sbordare anche lui.
      if (el.classList.contains("hero-zoom__title--bottom")) {
        available -= parseFloat(getComputedStyle(el).right) || 0;
      }
      // offsetWidth, non scrollWidth: il box è width:fit-content (si
      // restringe al testo), quindi offsetWidth è la vera larghezza
      // naturale — con width:100% tornerebbe sempre uguale al contenitore.
      const natural = el.offsetWidth;
      if (natural <= 0) return null;
      const size = base * (available / natural) * HERO_TITLE_OVERSHOOT;
      uniformSize = Math.min(uniformSize, size);
      return size;
    });
    if (!isFinite(uniformSize)) return;
    els.forEach((el, i) => {
      if (sizes[i] == null) return;
      el.style.fontSize = uniformSize + "px";
      // transform-origin in pixel, non in percentuale: una percentuale
      // come "100% 100%" si risolve sulla dimensione del box AL MOMENTO —
      // cambiando il font-size da JS ad ogni fit/resize, il valore risolto
      // può disallinearsi dal nuovo bordo inferiore (stesso problema già
      // visto con left:50%+translateX(-50%) sul centraggio orizzontale).
      // Qui si fissa il punto in px, ricalcolato ogni volta sull'altezza
      // reale appena impostata — sempre corretto.
      if (el.classList.contains("hero-zoom__title--bottom")) {
        // el.style.transformOrigin = `100% ${el.offsetHeight}px`;
      } else {
        el.style.transformOrigin = "0% 0px";
      }
    });
  }
  (document.fonts ? document.fonts.ready : Promise.resolve()).then(
    fitHeroTitle,
  );
  let fitResizeT;
  window.addEventListener("resize", () => {
    clearTimeout(fitResizeT);
    fitResizeT = setTimeout(fitHeroTitle, 150);
  });

  // Se GSAP non carica, il sito resta navigabile (il CSS da solo mostra
  // il frame video statico, senza l'effetto di zoom)
  if (!hasGSAP) {
    document.body.classList.remove("is-loading");
    $(".loader")?.remove();
    initMenu(null);
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  /* ---------------------------------------------------------
     Smooth scroll (Lenis)
     --------------------------------------------------------- */
  let lenis = null;
  if (!reduced && typeof window.Lenis !== "undefined") {
    lenis = new Lenis({
      duration: 1.15,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      smoothWheel: true,
    });
    lenis.on("scroll", ScrollTrigger.update);
    gsap.ticker.add((time) => lenis.raf(time * 1000));
    gsap.ticker.lagSmoothing(0);
    lenis.stop();
  }

  const scrollTo = (target, opts = {}) => {
    if (lenis) lenis.scrollTo(target, { duration: 1.6, ...opts });
    else {
      const y =
        typeof target === "number"
          ? target
          : target.getBoundingClientRect().top + window.scrollY;
      window.scrollTo({ top: y, behavior: reduced ? "auto" : "smooth" });
    }
  };

  /* ---------------------------------------------------------
     Text helpers
     --------------------------------------------------------- */
  function splitLines(el) {
    el.innerHTML = el.innerHTML
      .split(/<br\s*\/?>/i)
      .map((html) => `<span class="rl"><span>${html.trim()}</span></span>`)
      .join("");
    return $$(".rl > span", el);
  }

  function splitWords(el) {
    const wrap = (node) => {
      [...node.childNodes].forEach((child) => {
        if (child.nodeType === 3) {
          const frag = document.createDocumentFragment();
          child.textContent.split(/(\s+)/).forEach((part) => {
            if (!part) return;
            if (/^\s+$/.test(part))
              frag.appendChild(document.createTextNode(" "));
            else {
              const s = document.createElement("span");
              s.className = "w";
              s.textContent = part;
              frag.appendChild(s);
            }
          });
          child.replaceWith(frag);
        } else if (child.nodeType === 1) wrap(child);
      });
    };
    wrap(el);
    return $$(".w", el);
  }

  /* ---------------------------------------------------------
     Loader → Intro
     --------------------------------------------------------- */
  // Ogni pezzo entra dalla sua direzione: l'intro (logo) sale da sotto, il
  // titolo in alto scende dall'alto, quello in basso scivola da destra —
  // coerente con dove ciascuno "vive" (vedi intro() per la sequenza).
  gsap.set(".hero-zoom__intro", { autoAlpha: 0, y: 24 });
  gsap.set(".hero-zoom__title--top", { autoAlpha: 0, y: -50 });
  gsap.set(".hero-zoom__title--bottom", { autoAlpha: 0, x: 70 });
  gsap.set(".hero-zoom__frame", { scale: 0.92 });
  gsap.set(".nav", { autoAlpha: 0 });

  // Le scritte del titolo entrano SOLO a loader davvero sparito (non
  // nell'intro(), che invece può partire un po' prima, per continuità) —
  // è la richiesta esplicita di tenerle dopo il loader, non durante.
  function revealHeroTitle() {
    gsap
      .timeline({ defaults: { ease: "expo.out" } })
      .to(
        ".hero-zoom__title--top",
        { autoAlpha: 1, y: 0, duration: 1.1, overwrite: false },
        0,
      )
      .to(
        ".hero-zoom__title--bottom",
        { autoAlpha: 1, x: 0, duration: 1.1, overwrite: false },
        0.15,
      );
  }

  function runLoader() {
    const loader = $(".loader");
    const numEl = $(".loader__num");
    const barSpan = $(".loader__bar span");
    const tl = gsap.timeline();

    if (reduced) {
      loader.remove();
      revealHeroTitle();
      return Promise.resolve();
    }

    const counter = { v: 0 };
    tl.to(
      counter,
      {
        v: 100,
        duration: 2.4,
        ease: "power2.inOut",
        onUpdate: () => {
          const val = Math.round(counter.v);
          numEl.textContent = val;
          gsap.set(barSpan, { scaleX: val / 100 });
        },
      },
      0,
    );

    tl.to(
      loader,
      { clipPath: "inset(0 0 100% 0)", duration: 1.1, ease: "expo.inOut" },
      ">0.1",
    );

    return new Promise((resolve) => {
      tl.eventCallback("onComplete", () => {
        loader.remove();
        resolve();
        revealHeroTitle();
      });
      // L'intro (logo/eyebrow) parte un po' prima che il loader finisca di
      // sparire, per continuità — resolve() chiamato due volte non è un
      // problema, una Promise onora solo la prima.
      tl.call(resolve, null, "-=0.6");
    });
  }

  function intro() {
    document.body.classList.remove("is-loading");
    lenis?.start();

    gsap
      .timeline({ defaults: { ease: "expo.out" } })
      .to(".hero-zoom__frame", { scale: 1, duration: 1.6, overwrite: false }, 0)
      .to(
        ".hero-zoom__intro",
        { autoAlpha: 1, y: 0, duration: 1.2, overwrite: false },
        0.2,
      );
  }

  const fontsReady = document.fonts ? document.fonts.ready : Promise.resolve();
  Promise.all([runLoader(), fontsReady]).then(() => {
    intro();
    // Stesso motivo del refresh su "load" più sotto: chiamare
    // ScrollTrigger.refresh() ha fatto crashare Safari (bug del motore JS).
    // Differita di un tick per sicurezza, qui come là.
    setTimeout(() => ScrollTrigger.refresh(), 0);
  });

  /* ---------------------------------------------------------
     Hero — il video sfuma via (fade out) mentre si scorre, invece
     dello zoom "si entra nel video" delle versioni precedenti —
     giudicato poco convincente. Un'unica timeline scrubbata
     sull'intera altezza della sezione, con un "ratchet": una volta
     raggiunto un punto, risalire con lo scroll non fa tornare
     indietro l'animazione — resta ferma al punto più avanzato
     raggiunto (video sparito, nav visibile).
     --------------------------------------------------------- */
  // Timeline "di contenuto", volutamente NON agganciata come scrollTrigger:
  // se fosse lei stessa l'animazione scrubbata, il motore di scrub di GSAP
  // continuerebbe a interpolarla verso il progress reale (più basso) mentre
  // il ratchet qui sotto la forza verso l'alto — i due si combattono e
  // l'animazione sfarfalla risalendo. Restando "paused" e pilotata a mano
  // tramite .progress(), il ratchet è l'unico a decidere il suo stato.
  const heroTl = gsap
    .timeline({ paused: true })
    // fase 0 → 0.1: l'intro (logo + invito a scorrere) e i due titoli si
    // dissolvono (fromTo con partenza esplicita: l'intro() li sta ancora
    // animando in parallelo al caricamento, quindi non possiamo fidarci
    // del valore "attuale" del render per dedurre lo stato di partenza)
    .fromTo(
      ".hero-zoom__intro, .hero-zoom__title--top",
      { autoAlpha: 1, y: 0 },
      { autoAlpha: 0, y: -24, duration: 0.1, ease: "none" },
      0,
    )
    .fromTo(
      ".hero-zoom__title--bottom",
      { autoAlpha: 1, x: 0 },
      { autoAlpha: 0, x: 24, duration: 0.1, ease: "none" },
      0,
    )
    // fase 0.15 → 0.75: il video (e la sua ombra) sfumano semplicemente,
    // restando della loro dimensione — niente più scale/rotazione/angoli
    // che si azzerano.
    .to(".hero-zoom__frame", { autoAlpha: 0, duration: 0.6, ease: "none" }, 0.15)
    .to(".hero-zoom__shade", { autoAlpha: 0, duration: 0.6, ease: "none" }, 0.15)
    // il nav riappare verso la fine, sul fondo navy rimasto scoperto
    .to(".nav", { autoAlpha: 1, duration: 0.08, ease: "none" }, 0.78);

  let heroMaxProgress = 0;
  ScrollTrigger.create({
    // "scrub" qui non farebbe nulla (non c'è un'animazione agganciata da
    // smussare): la morbidezza dello scroll la dà già Lenis a monte.
    trigger: ".hero-zoom",
    start: "top top",
    end: "bottom top",
    onUpdate(self) {
      heroMaxProgress = Math.max(self.progress, heroMaxProgress);
      heroTl.progress(heroMaxProgress);
    },
  });

  /* ---------------------------------------------------------
     Manifesto — le parole entrano una a una mentre si scorre
     --------------------------------------------------------- */
  const manifesto = $("[data-words]");
  if (manifesto) {
    const words = splitWords(manifesto);
    if (!reduced) {
      gsap.to(words, {
        opacity: 1,
        ease: "none",
        stagger: 0.1,
        scrollTrigger: {
          trigger: manifesto,
          start: "top 80%",
          end: "bottom 40%",
          scrub: 0.6,
        },
      });
    }
  }

  /* ---------------------------------------------------------
     Portfolio — scroll orizzontale (pin verticale + track che
     trasla in orizzontale). Solo da tablet in su: sotto i 901px
     guidare l'orizzontale con la rotella non ha senso, le card
     restano semplicemente impilate (vedi style.css).
     --------------------------------------------------------- */
  const portfolio = $(".portfolio");
  if (portfolio) {
    const pPin = $(".portfolio__pin");
    const pTrack = $(".portfolio__track");
    const pViewport = $(".portfolio__viewport");
    const pGroups = $$(".portfolio__area", portfolio);
    let pTween = null;

    const portfolioMM = gsap.matchMedia();
    portfolioMM.add("(min-width: 901px)", () => {
      const dist = () => pTrack.scrollWidth - pViewport.clientWidth;

      // Trigger su .portfolio__pin, non su .portfolio: la sezione ora ha
      // anche l'header orizzontale sopra (.portfolio__head), che deve
      // scorrere via normalmente PRIMA che il pin orizzontale scatti —
      // pinnare l'intera sezione ci trascinerebbe dentro anche l'header.
      pTween = gsap.to(pTrack, {
        x: () => -dist(),
        ease: "none",
        scrollTrigger: {
          trigger: pPin,
          start: "top top",
          end: () => "+=" + dist(),
          pin: true,
          scrub: 1,
          invalidateOnRefresh: true,
          anticipatePin: 1,
          onUpdate: (self) =>
            gsap.set(".portfolio__progress span", { scaleX: self.progress }),
        },
      });

      pGroups.forEach((g) => {
        gsap.from($$(".portfolio__table tr, .portfolio__area-title", g), {
          y: 30,
          autoAlpha: 0,
          stagger: 0.05,
          duration: 0.9,
          ease: "expo.out",
          scrollTrigger: {
            trigger: g,
            containerAnimation: pTween,
            start: "left 85%",
          },
        });
      });

      gsap.from(".portfolio__quote", {
        y: 30,
        autoAlpha: 0,
        duration: 1,
        ease: "expo.out",
        scrollTrigger: {
          trigger: ".portfolio__end",
          containerAnimation: pTween,
          start: "left 80%",
        },
      });

      return () => {
        pTween = null;
        gsap.set(pTrack, { clearProps: "transform" });
      };
    });

    portfolioMM.add("(max-width: 900px)", () => {
      gsap.from([...pGroups, $(".portfolio__end")], {
        y: 40,
        autoAlpha: 0,
        duration: 1,
        ease: "expo.out",
        scrollTrigger: { trigger: portfolio, start: "top 80%" },
      });
    });
  }

  initMenu(lenis);

  function initMenu(lenisRef) {
    const burger = $(".nav__burger");
    const menu = $(".menu");
    if (!burger) return;
    const toggle = (open) => {
      if (open) {
        // Il cerchio del menu si apre esattamente dal punto dell'hamburger
        const r = burger.getBoundingClientRect();
        menu.style.setProperty(
          "--menu-x",
          `${((r.left + r.width / 2) / window.innerWidth) * 100}%`,
        );
        menu.style.setProperty(
          "--menu-y",
          `${((r.top + r.height / 2) / window.innerHeight) * 100}%`,
        );
      }
      document.body.classList.toggle("menu-open", open);
      burger.setAttribute("aria-expanded", String(open));
      menu.setAttribute("aria-hidden", String(!open));
      if (lenisRef) open ? lenisRef.stop() : lenisRef.start();
    };
    burger.addEventListener("click", () =>
      toggle(!document.body.classList.contains("menu-open")),
    );
    $$("a", menu).forEach((a) =>
      a.addEventListener("click", () => toggle(false)),
    );
  }

  // Anchor links
  $$('a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (e) => {
      const id = a.getAttribute("href");
      if (id.length < 2) return;
      const target = id === "#top" ? 0 : $(id);
      if (target === null) return;
      e.preventDefault();
      scrollTo(target);
    });
  });
  $(".footer__top")?.addEventListener("click", () =>
    scrollTo(0, { duration: 2 }),
  );

  $$(".reveal-lines").forEach((el) => {
    const lines = splitLines(el);
    gsap.from(lines, {
      yPercent: 115,
      duration: 1.3,
      stagger: 0.1,
      ease: "expo.out",
      scrollTrigger: { trigger: el, start: "top 85%" },
    });
  });

  $$(".reveal").forEach((el) => {
    gsap.from(el, {
      y: 40,
      autoAlpha: 0,
      filter: "blur(6px)",
      duration: 1.2,
      ease: "expo.out",
      scrollTrigger: { trigger: el, start: "top 88%" },
    });
  });

  // I numeri "01-04" del metodo entrano con un piccolo scatto elastico,
  // come se venissero timbrati sulla pagina.
  gsap.set(".about__list-num", { transformOrigin: "50% 50%" });
  $$(".about__list-num").forEach((el, i) => {
    gsap.from(el, {
      scale: 0.4,
      autoAlpha: 0,
      duration: 0.7,
      delay: i * 0.05,
      ease: "back.out(2.4)",
      scrollTrigger: { trigger: el.closest("li"), start: "top 90%" },
    });
  });

  /* ---------------------------------------------------------
     Storia: bianco → navy, "una volta fatta resta fatta"
     Solo questa sezione cambia colore, e solo lei: l'animazione scrive
     direttamente sulle variabili CSS scoperte a .story-section (vedi
     style.css), quindi non tocca il body né le sezioni vicine. Sfondo E
     testo virano insieme mentre ci si avvicina, scrollando — altrimenti
     il testo scuro sparirebbe sul navy scuro a fine transizione.
     Timeline separata dallo scrollTrigger (paused, pilotata a mano) + un
     ratchet: stesso schema dell'hero, per lo stesso motivo — se fosse lei
     stessa l'animazione scrubbata, il ratchet e lo scrub interno di GSAP si
     combatterebbero, e soprattutto: una volta arrivati al navy, risalendo
     leggermente non deve tornare indietro. È un passaggio già fatto.
     --------------------------------------------------------- */
  const storyColorTl = gsap.timeline({ paused: true }).fromTo(
    ".story-section",
    {
      "--bg": "#fafbfc",
      "--fg": "#062a4a",
      "--muted": "rgba(6, 42, 74, 0.68)",
      "--line": "rgba(6, 42, 74, 0.14)",
      "--accent": "#044d8b",
    },
    {
      "--bg": "#044d8b",
      "--fg": "#ffffff",
      "--muted": "rgba(255, 255, 255, 0.74)",
      "--line": "rgba(255, 255, 255, 0.22)",
      "--accent": "#fcda18",
      ease: "none",
    },
  );
  let storyColorMax = 0;
  ScrollTrigger.create({
    trigger: ".story-section",
    start: "top 90%",
    end: "top 35%",
    onUpdate(self) {
      storyColorMax = Math.max(self.progress, storyColorMax);
      storyColorTl.progress(storyColorMax);
    },
  });

  /* ---------------------------------------------------------
     La nostra storia
     --------------------------------------------------------- */
  const steps = $$(".story__step");
  const storyProgressTl = gsap
    .timeline({ paused: true })
    .to(".story__progress", { scaleX: 1, ease: "none" });
  let storyMaxProgress = 0;
  ScrollTrigger.create({
    trigger: ".story__steps",
    start: "top 85%",
    end: "bottom 55%",
    onUpdate: (self) => {
      // "Ratchet": i pallini accesi non si spengono risalendo — un passo
      // raggiunto resta acceso, esattamente come il navy della sezione.
      const p = Math.max(self.progress, storyMaxProgress);
      storyMaxProgress = p;
      storyProgressTl.progress(p);
      steps.forEach((s, i) =>
        s.classList.toggle("is-on", p >= i / steps.length + 0.02),
      );
    },
  });
  gsap.from(steps, {
    y: 50,
    autoAlpha: 0,
    scale: 0.94,
    filter: "blur(8px)",
    duration: 1.1,
    stagger: 0.14,
    ease: "expo.out",
    scrollTrigger: { trigger: ".story__steps", start: "top 85%" },
  });

  /* ---------------------------------------------------------
     CTA finale
     --------------------------------------------------------- */
  // Il wipe della foto: si apre dal basso mentre il testo entra riga per riga
  // (già gestito da .reveal-lines), così i due elementi arrivano insieme.
  gsap.fromTo(
    ".finale__img",
    { clipPath: "inset(0 0 100% 0)" },
    {
      clipPath: "inset(0 0 0% 0)",
      duration: 1.4,
      ease: "expo.inOut",
      scrollTrigger: { trigger: ".finale", start: "top 75%" },
    },
  );
  gsap.from(".finale__sign", {
    y: 20,
    autoAlpha: 0,
    duration: 1,
    ease: "expo.out",
    scrollTrigger: { trigger: ".finale", start: "top 55%" },
  });
  gsap.from(".finale__form .field", {
    y: 30,
    autoAlpha: 0,
    duration: 0.9,
    stagger: 0.1,
    ease: "expo.out",
    scrollTrigger: { trigger: ".finale", start: "top 55%" },
  });
  gsap.from(".finale__form-foot", {
    y: 20,
    autoAlpha: 0,
    duration: 1,
    ease: "expo.out",
    scrollTrigger: { trigger: ".finale", start: "top 40%" },
  });

  initForm();

  function initForm() {
    const form = $(".finale__form");
    if (!form) return;
    const status = $(".form__status", form);
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      let ok = true;
      $$(".field", form).forEach((f) => {
        const input = $("input, textarea", f);
        const valid = input.checkValidity();
        f.classList.toggle("is-invalid", !valid);
        if (!valid) ok = false;
      });

      status.classList.remove("is-ok");
      if (!ok) {
        status.textContent = "Manca qualcosa: controlla i campi evidenziati.";
        return;
      }
      // TODO: collegare l'endpoint reale (es. fetch('/api/contatti', { method: 'POST', body: new FormData(form) }))
      status.textContent = "Grazie! Uno di noi ti ricontatterà a breve.";
      status.classList.add("is-ok");
      form.reset();
    });
    $$(".field input, .field textarea", form).forEach((i) =>
      i.addEventListener("input", () =>
        i.closest(".field").classList.remove("is-invalid"),
      ),
    );
  }

  /* ---------------------------------------------------------
     Tocchi "wow": linee che si disegnano
     --------------------------------------------------------- */
  $$(".eyebrow__line").forEach((line) => {
    gsap.fromTo(
      line,
      { scaleX: 0 },
      {
        scaleX: 1,
        transformOrigin: "left center",
        duration: 1,
        ease: "power3.out",
        scrollTrigger: { trigger: line, start: "top 92%" },
      },
    );
  });

  $$(".eyebrow--muted").forEach((el) => {
    gsap.from(el, {
      x: -16,
      autoAlpha: 0,
      duration: 0.9,
      ease: "power3.out",
      scrollTrigger: { trigger: el, start: "top 92%" },
    });
  });

  /* ---------------------------------------------------------
     Tema chiaro/scuro per sezione
     --------------------------------------------------------- */
  const themed = $$("[data-theme]");
  const metaTheme = $('meta[name="theme-color"]');
  const themeColors = { dark: "#044d8b", light: "#fafbfc" };
  const setTheme = (t) => {
    document.body.classList.toggle("theme-light", t === "light");
    metaTheme?.setAttribute("content", themeColors[t] || themeColors.dark);
  };
  // Un trigger per sezione (onEnter/onEnterBack) può sparare fuori ordine
  // con uno scroll veloce/con inerzia (Lenis), lasciando attivo il tema
  // sbagliato. Invece calcoliamo da capo a ogni tick, in modo deterministico,
  // quale sia l'ultima sezione il cui bordo superiore ha superato la soglia:
  // non dipende dall'ordine in cui gli eventi arrivano, solo dalla posizione
  // reale nel documento.
  // La soglia è congelata al resize vero (non ricalcolata ad ogni tick):
  // su mobile lo scroll fa comparire/sparire la barra degli indirizzi, che
  // cambia window.innerHeight più volte durante il gesto stesso — ricalcolarla
  // ogni volta poteva far leggere per un istante la sezione sbagliata (il
  // classico "flash" di sfondo scuro su "Chi siamo" prima di tornare chiaro).
  let themeLine = window.innerHeight * 0.6;
  window.addEventListener("resize", () => {
    themeLine = window.innerHeight * 0.6;
  });
  const updateTheme = () => {
    let active = themed[0];
    themed.forEach((sec) => {
      if (sec.getBoundingClientRect().top <= themeLine) active = sec;
    });
    setTheme(active?.dataset.theme || "dark");
  };
  ScrollTrigger.create({
    start: 0,
    end: "max",
    onUpdate: updateTheme,
    onRefresh: updateTheme,
  });
  updateTheme();

  /* ---------------------------------------------------------
     Cursore + magnetic
     --------------------------------------------------------- */
  if (finePointer && !reduced) {
    const cursor = $(".cursor");
    const label = $(".cursor__label");
    const xTo = gsap.quickTo(cursor, "x", {
      duration: 0.45,
      ease: "power3.out",
    });
    const yTo = gsap.quickTo(cursor, "y", {
      duration: 0.45,
      ease: "power3.out",
    });

    window.addEventListener("pointermove", (e) => {
      xTo(e.clientX);
      yTo(e.clientY);
    });
    document.addEventListener("pointerover", (e) => {
      const withLabel = e.target.closest("[data-cursor]");
      cursor.classList.toggle("is-label", !!withLabel);
      if (withLabel) label.textContent = withLabel.dataset.cursor;
      // Sul giallo dei contatti il pallino giallo sparirebbe: qui diventa navy.
      cursor.classList.toggle("on-yellow", !!e.target.closest(".finale"));
    });

    $$("[data-magnetic]").forEach((el) => {
      const xTo = gsap.quickTo(el, "x", { duration: 0.6, ease: "power3.out" });
      const yTo = gsap.quickTo(el, "y", { duration: 0.6, ease: "power3.out" });
      el.addEventListener("pointermove", (e) => {
        const r = el.getBoundingClientRect();
        xTo((e.clientX - r.left - r.width / 2) * 0.3);
        yTo((e.clientY - r.top - r.height / 2) * 0.4);
      });
      el.addEventListener("pointerleave", () => {
        xTo(0);
        yTo(0);
      });
    });
  }

  // Ricalcola dopo il caricamento completo (immagini/video).
  // setTimeout (non chiamata diretta): eseguire ScrollTrigger.refresh()
  // SINCRONAMENTE dentro il dispatch dell'evento "load" ha fatto crashare
  // Safari (bug del motore JS — crash dentro JSC::JSString::equalSlowCase,
  // proprio nello stack di dispatchLoadEvent). Spostandolo fuori dalla pila
  // di chiamate dell'evento, in un nuovo task, il motore non ci ripassa più.
  window.addEventListener("load", () => {
    setTimeout(() => ScrollTrigger.refresh(), 0);
  });
})();
