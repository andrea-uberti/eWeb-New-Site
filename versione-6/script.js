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

  // Se GSAP non carica, il sito resta navigabile (il CSS da solo mostra
  // la hero statica, senza le animazioni d'ingresso)
  if (!hasGSAP) {
    document.body.classList.remove("is-loading");
    $(".loader")?.remove();
    initMenu(null);
    return;
  }

  const hasScramble = typeof window.ScrambleTextPlugin !== "undefined";
  gsap.registerPlugin(ScrollTrigger);
  if (hasScramble) gsap.registerPlugin(ScrambleTextPlugin);

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
     Loader → Intro (hero versione 1: testo statico, niente frame
     da animare — solo eyebrow/titolo/bottom/meta che entrano).
     --------------------------------------------------------- */
  // Il titolo usa .reveal-lines, lo stesso meccanismo generico già usato
  // altrove nel sito (vedi più sotto) — niente gsap.set/tween dedicati qui,
  // ci pensa già quell'hook (scrollTrigger che, essendo sopra la piega,
  // scatta comunque subito al caricamento).
  // .hero__brand è lo stesso blocco (logo + claim) riusato nel loader —
  // selettore scoped a .hero qui, altrimenti nasconderebbe anche quello
  // del loader, visibile fin da subito mentre carica.
  gsap.set([".hero .hero__brand", ".hero__bottom", ".hero__meta"], {
    autoAlpha: 0,
    y: 24,
  });
  // Il logo dell'header resta nascosto per tutta la hero (dove il logo
  // grande fa già il suo lavoro) — ricompare più sotto, quando si scrolla
  // oltre la hero (vedi ScrollTrigger dedicato, dopo l'intro).
  gsap.set(".nav__logo", { autoAlpha: 0 });
  gsap.set(".nav__burger", { autoAlpha: 0 });

  function runLoader() {
    const loader = $(".loader");
    const numEl = $(".loader__num");
    const barSpan = $(".loader__bar span");
    const tl = gsap.timeline();

    if (reduced) {
      loader.remove();
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
      tl.eventCallback("onComplete", () => { loader.remove(); resolve(); });
      // l'intro parte mentre il loader si apre
      tl.call(resolve, null, "-=0.6");
    });
  }

  function intro() {
    document.body.classList.remove("is-loading");
    lenis?.start();

    gsap
      .timeline({ defaults: { ease: "expo.out" } })
      .fromTo(
        ".hero__video",
        { scale: 1.35 },
        { scale: 1.1, duration: 2.4, overwrite: false },
        0,
      )
      .to(
        ".hero .hero__brand",
        { autoAlpha: 1, y: 0, duration: 1.2, overwrite: false },
        0.4,
      )
      .to(".nav__burger", { autoAlpha: 1, duration: 1.2, overwrite: false }, 0.4)
      .to(
        [".hero__bottom", ".hero__meta"],
        { autoAlpha: 1, y: 0, duration: 1.2, stagger: 0.1, overwrite: false },
        0.6,
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
     Hero — la sezione resta pinnata per uno scroll in più: il primo
     "scroll" fa salire e sfumare solo le scritte e dà focus al video
     (il velo si schiarisce, il video si distende dallo zoom iniziale);
     solo al secondo scroll la hero si sblocca e si passa al manifesto
     sotto. end è un viewport extra di distanza di scroll (pin incluso),
     non il tempo dell'animazione del testo: per questo onUpdate mappa
     solo la prima metà di quel percorso (self.progress * 2, clampato a
     1) sulla timeline del testo — la seconda metà resta ferma, pinnata
     sul video "a fuoco", finché non si sblocca.
     --------------------------------------------------------- */
  if ($(".hero")) {
    const heroFocusTl = gsap
      .timeline({ paused: true })
      .to(".hero__content", { yPercent: -26, autoAlpha: 0, ease: "none" }, 0)
      .to(".hero__meta", { autoAlpha: 0, ease: "none" }, 0)
      .to(".hero__shade", { autoAlpha: 0.15, ease: "none" }, 0)
      .to(".hero__video", { scale: 1, ease: "none" }, 0);

    ScrollTrigger.create({
      trigger: ".hero",
      start: "top top",
      end: () => "+=" + window.innerHeight,
      pin: true,
      anticipatePin: 1,
      invalidateOnRefresh: true,
      onUpdate: (self) => heroFocusTl.progress(Math.min(self.progress * 2, 1)),
    });

    // Il logo dell'header resta nascosto per tutta la hero (dove il logo
    // grande fa già il suo lavoro) e ricompare solo una volta scrollata
    // via del tutto — e torna a nascondersi risalendo dentro la hero.
    ScrollTrigger.create({
      trigger: ".hero",
      start: "bottom top",
      onEnter: () => gsap.to(".nav__logo", { autoAlpha: 1, duration: 0.5 }),
      onLeaveBack: () =>
        gsap.to(".nav__logo", { autoAlpha: 0, duration: 0.5 }),
    });
  }

  /* ---------------------------------------------------------
     Video hero: loop di sfondo (fade-in quando pronto) + modale
     con la versione completa, con audio.
     --------------------------------------------------------- */
  const heroVideo = $(".hero__video");
  if (heroVideo) {
    const ready = () => heroVideo.classList.add("is-ready");
    if (heroVideo.readyState >= 2) ready();
    else heroVideo.addEventListener("loadeddata", ready, { once: true });
  }

  const vmodal = $(".vmodal");
  if (vmodal) {
    const vmodalVideo = $(".vmodal__video");
    const toggleVideo = (open) => {
      vmodal.classList.toggle("is-open", open);
      vmodal.setAttribute("aria-hidden", String(!open));
      if (open) {
        lenis?.stop();
        vmodalVideo.play().catch(() => {});
      } else {
        lenis?.start();
        vmodalVideo.pause();
      }
    };
    $$("[data-video-open]").forEach((b) =>
      b.addEventListener("click", () => toggleVideo(true)),
    );
    $$("[data-video-close]").forEach((b) =>
      b.addEventListener("click", () => toggleVideo(false)),
    );
    vmodal.addEventListener("click", (e) => {
      if (e.target === vmodal) toggleVideo(false);
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && vmodal.classList.contains("is-open"))
        toggleVideo(false);
    });
  }

  /* ---------------------------------------------------------
     Claim band — le tre parole entrano una dopo l'altra
     --------------------------------------------------------- */
  gsap.from(".claim-band__inner span", {
    y: 30,
    autoAlpha: 0,
    duration: 0.9,
    stagger: 0.12,
    ease: "expo.out",
    scrollTrigger: { trigger: ".claim-band", start: "top 85%" },
  });

  /* ---------------------------------------------------------
     Testi "da leggere con calma" — le parole entrano una a una
     mentre si scorre: il manifesto in cima alla pagina, e con lo
     stesso meccanismo la citazione di chiusura dei progetti.
     --------------------------------------------------------- */
  if (!reduced) {
    $$("[data-words]").forEach((el) => {
      const words = splitWords(el);
      gsap.to(words, {
        opacity: 1,
        ease: "none",
        stagger: 0.1,
        scrollTrigger: {
          trigger: el,
          start: "top 80%",
          end: "bottom 40%",
          scrub: 0.6,
        },
      });
    });
  }

  /* ---------------------------------------------------------
     "I nostri progetti" — scroll verticale normale, sezione per
     sezione: stesso schema della Storia (vedi più sotto), portato
     qui. Entrata bespoke per ciascuna categoria + un rail che si
     riempie scrollando, con lo stesso ratchet (un pallino raggiunto
     resta acceso anche risalendo).
     --------------------------------------------------------- */
  const portfolioAreas = $$(".portfolio__area");
  if (portfolioAreas.length) {
    portfolioAreas.forEach((area) => {
      gsap.from($$(".portfolio__area-title, .portfolio__table tr", area), {
        y: 30,
        autoAlpha: 0,
        stagger: 0.05,
        duration: 0.9,
        ease: "expo.out",
        scrollTrigger: { trigger: area, start: "top 85%" },
      });

      // Il nome della categoria si scrambla e si risolve una volta,
      // allo scroll — stesso effetto già usato su "pitch"/"metodo" in
      // "Chi siamo", qui ripetuto per ciascuna delle 5 categorie.
      const name = $(".portfolio__area-name", area);
      if (name && !reduced && hasScramble) {
        gsap.to(name, {
          duration: 1,
          scrambleText: {
            text: name.textContent,
            chars: "upperAndLowerCase",
            revealDelay: 0.2,
            speed: 0.4,
          },
          scrollTrigger: { trigger: area, start: "top 85%" },
        });
      }
    });

    const portfolioProgressTl = gsap
      .timeline({ paused: true })
      .to(".portfolio__line-fill", { scaleY: 1, ease: "none" });
    let portfolioMaxProgress = 0;
    ScrollTrigger.create({
      trigger: ".portfolio__wrap",
      start: "top 75%",
      end: "bottom 70%",
      onUpdate: (self) => {
        const p = Math.max(self.progress, portfolioMaxProgress);
        portfolioMaxProgress = p;
        portfolioProgressTl.progress(p);
        portfolioAreas.forEach((a, i) =>
          a.classList.toggle("is-on", p >= i / portfolioAreas.length + 0.02),
        );
      },
    });

    /* -------------------------------------------------------
       Copertina progetto in hover — una sola thumbnail, riusata e
       seguita dal cursore (stesso meccanismo del cursore custom più
       in basso), non un elemento per riga. Solo mouse: niente hover
       su touch, le righe restano semplicemente tappabili/leggibili.
       ------------------------------------------------------- */
    if (finePointer && !reduced) {
      const thumb = $(".portfolio__thumb");
      const thumbImg = $(".portfolio__thumb-img", thumb);
      if (thumb && thumbImg) {
        const thumbX = gsap.quickTo(thumb, "x", {
          duration: 0.35,
          ease: "power3.out",
        });
        const thumbY = gsap.quickTo(thumb, "y", {
          duration: 0.35,
          ease: "power3.out",
        });
        const moveThumb = (e) => {
          thumbX(e.clientX + 28);
          thumbY(e.clientY - 180);
        };

        thumbImg.addEventListener("error", () => {
          thumbImg.style.display = "none";
        });

        $$(".portfolio__table tbody tr").forEach((row) => {
          const src = row.dataset.thumb;
          if (!src) return;
          row.addEventListener("mouseenter", (e) => {
            thumbImg.style.display = "";
            thumbImg.src = src;
            moveThumb(e);
            gsap.fromTo(
              thumb,
              { scale: 0.92 },
              { scale: 1, duration: 0.35, ease: "back.out(1.7)" },
            );
            thumb.classList.add("is-visible");
            document.addEventListener("pointermove", moveThumb);
          });
          row.addEventListener("mouseleave", () => {
            thumb.classList.remove("is-visible");
            document.removeEventListener("pointermove", moveThumb);
          });
        });
      }
    }
  }

  /* ---------------------------------------------------------
     Graffa del logo accanto alla citazione finale dei progetti — un
     piccolo pop elastico, non un semplice fade, perché è un elemento
     grafico di marca e merita un po' più di presenza.
     --------------------------------------------------------- */
  if ($(".portfolio__brace")) {
    gsap.from(".portfolio__brace", {
      autoAlpha: 0,
      scale: 0.6,
      duration: 1,
      ease: "back.out(1.6)",
      transformOrigin: "center",
      scrollTrigger: { trigger: ".portfolio__end", start: "top 75%" },
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

  /* ---------------------------------------------------------
     I 4 passaggi ("Chi siamo") — stesso schema della Storia qui sotto:
     entrata bespoke (non il generico .reveal) + un rail verticale che
     si riempie scrollando, con un "ratchet" — un passaggio raggiunto
     resta acceso anche risalendo, non si spegne. Vedi lo stesso
     meccanismo su .story__progress/.story__step più in basso.
     --------------------------------------------------------- */
  const aboutSteps = $$(".about__list-step");
  if (aboutSteps.length) {
    gsap.from(aboutSteps, {
      y: 30,
      autoAlpha: 0,
      duration: 1,
      stagger: 0.12,
      ease: "expo.out",
      scrollTrigger: { trigger: ".about__list-wrap", start: "top 85%" },
    });

    const aboutProgressTl = gsap
      .timeline({ paused: true })
      .to(".about__list-progress", { scaleY: 1, ease: "none" });
    let aboutMaxProgress = 0;
    ScrollTrigger.create({
      trigger: ".about__list-wrap",
      start: "top 80%",
      end: "bottom 65%",
      onUpdate: (self) => {
        const p = Math.max(self.progress, aboutMaxProgress);
        aboutMaxProgress = p;
        aboutProgressTl.progress(p);
        aboutSteps.forEach((s, i) =>
          s.classList.toggle("is-on", p >= i / aboutSteps.length + 0.02),
        );
      },
    });
  }

  /* ---------------------------------------------------------
     "pitch" e "metodo" — allo scroll, all'ingresso nella sezione,
     entrambe le parole si scramblano e si risolvono una volta sola.
     "metodo" usa solo lettere (più composto); "pitch" il set di
     caratteri di default del plugin, più "rumoroso" (simboli) — lo
     stesso contrasto raccontato senza bisogno di un'interazione.
     --------------------------------------------------------- */
  if (!reduced && hasScramble) {
    gsap.to(".metodo-term", {
      duration: 1,
      scrambleText: {
        text: "metodo",
        chars: "upperAndLowerCase",
        revealDelay: 0.2,
        speed: 0.4,
      },
      scrollTrigger: { trigger: ".about__head", start: "top 85%" },
    });
  }

  /* ---------------------------------------------------------
     "pitch" nel titolo — hover (desktop) / tap (touch) / focus
     (tastiera) apre il pannello che spiega cosa intendiamo.
     --------------------------------------------------------- */
  const pitchTerm = $(".pitch-term");
  const pitchPanel = $(".pitch-panel");
  if (pitchTerm && pitchPanel) {
    const anchor = pitchTerm.closest(".about__head");
    const positionPitchPanel = () => {
      const r = pitchTerm.getBoundingClientRect();
      const a = anchor.getBoundingClientRect();
      const panelWidth = pitchPanel.offsetWidth;
      // A destra della parola, sulla stessa riga. Se non c'entra (schermi
      // stretti, dove il pannello va a tutta larghezza) scende sotto.
      if (r.right - a.left + 40 + panelWidth <= a.width) {
        pitchPanel.style.left = Math.round(r.right - a.left + 40) + "px";
        pitchPanel.style.top = Math.round(r.top - a.top - 6) + "px";
      } else {
        pitchPanel.style.left = Math.round(r.left - a.left) + "px";
        pitchPanel.style.top = Math.round(r.bottom - a.top + 12) + "px";
      }
    };
    let pitchOpen = false;
    let pitchTween = null;
    // Apertura con un piccolo "pop" elastico (scale + fade, back.out);
    // chiusura rapida e secca, senza rimbalzo — un tooltip che indugia
    // nella chiusura si sente lento, non vivo.
    if (!reduced && hasScramble) {
      gsap.to(pitchTerm, {
        duration: 1,
        scrambleText: { text: "pitch", revealDelay: 0.2, speed: 0.4 },
        scrollTrigger: { trigger: ".about__head", start: "top 85%" },
      });
    }
    const openPitch = () => {
      positionPitchPanel();
      pitchOpen = true;
      pitchTerm.setAttribute("aria-expanded", "true");
      pitchTween?.kill();
      pitchTween = gsap.fromTo(
        pitchPanel,
        { autoAlpha: 0, scale: 0.9 },
        { autoAlpha: 1, scale: 1, duration: 0.45, ease: "back.out(1.6)" },
      );
    };
    const closePitch = () => {
      if (!pitchOpen) return;
      pitchOpen = false;
      pitchTerm.setAttribute("aria-expanded", "false");
      pitchTween?.kill();
      pitchTween = gsap.to(pitchPanel, {
        autoAlpha: 0,
        scale: 0.94,
        duration: 0.18,
        ease: "power2.in",
      });
    };
    if (finePointer) {
      pitchTerm.addEventListener("mouseenter", openPitch);
      pitchTerm.addEventListener("mouseleave", closePitch);
    } else {
      pitchTerm.addEventListener("click", (e) => {
        e.preventDefault();
        pitchOpen ? closePitch() : openPitch();
      });
    }
    pitchTerm.addEventListener("focus", openPitch);
    pitchTerm.addEventListener("blur", closePitch);
    document.addEventListener("click", (e) => {
      if (!anchor.contains(e.target)) closePitch();
    });
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") closePitch();
    });
    window.addEventListener("resize", () => {
      if (pitchOpen) positionPitchPanel();
    });
  }

  /* ---------------------------------------------------------
     Wash di colore scorrevole, "una volta fatto resta fatto" — usato
     per ogni sezione che cambia tinta avvicinandosi scrollando (Storia:
     bianco → navy; CTA finale: navy → giallo). L'animazione scrive
     direttamente sulle variabili CSS scoperte alla sezione stessa (vedi
     style.css), quindi non tocca il body né le sezioni vicine. Sfondo E
     testo virano insieme — altrimenti il testo scuro sparirebbe sul
     navy scuro, o il testo chiaro sul giallo, a fine transizione.
     Timeline separata dallo scrollTrigger (paused, pilotata a mano) + un
     ratchet: stesso schema dell'hero, per lo stesso motivo — se fosse lei
     stessa l'animazione scrubbata, il ratchet e lo scrub interno di GSAP si
     combatterebbero, e soprattutto: una volta arrivati al colore finale,
     risalendo leggermente non deve tornare indietro. È un passaggio già
     fatto.
     --------------------------------------------------------- */
  function scrollColorWash(selector, { trigger, start, end, from, to }) {
    const tl = gsap
      .timeline({ paused: true })
      .fromTo(selector, from, { ...to, ease: "none" });
    let max = 0;
    ScrollTrigger.create({
      trigger,
      start,
      end,
      onUpdate(self) {
        max = Math.max(self.progress, max);
        tl.progress(max);
      },
    });
  }

  scrollColorWash(".story-section", {
    trigger: ".story-section",
    start: "top 90%",
    end: "top 35%",
    from: {
      "--bg": "#fafbfc",
      "--fg": "#062a4a",
      "--muted": "rgba(6, 42, 74, 0.68)",
      "--line": "rgba(6, 42, 74, 0.14)",
      "--accent": "#044d8b",
    },
    to: {
      "--bg": "#044d8b",
      "--fg": "#ffffff",
      "--muted": "rgba(255, 255, 255, 0.74)",
      "--line": "rgba(255, 255, 255, 0.22)",
      "--accent": "#fcda18",
    },
  });

  scrollColorWash(".finale", {
    trigger: ".finale",
    start: "top 95%",
    end: "top 45%",
    from: {
      "--bg": "#044d8b",
      "--fg": "#ffffff",
      "--muted": "rgba(255, 255, 255, 0.74)",
      "--line": "rgba(255, 255, 255, 0.22)",
      "--accent": "#fcda18",
    },
    to: {
      "--bg": "#fcda18",
      "--fg": "#062a4a",
      "--muted": "rgba(6, 42, 74, 0.68)",
      "--line": "rgba(6, 42, 74, 0.32)",
      "--accent": "#044d8b",
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
  gsap.from(".finale__contacts li", {
    y: 20,
    autoAlpha: 0,
    duration: 0.8,
    stagger: 0.08,
    ease: "expo.out",
    scrollTrigger: { trigger: ".finale__contacts", start: "top 85%" },
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
  // La soglia segue l'altezza della nav (non più il 60% della viewport): il
  // colore che sceglie è quello della nav stessa, fissa in cima allo
  // schermo — una soglia a metà pagina la faceva cambiare mentre sotto di
  // lei c'era ancora la sezione precedente, chiara o scura che fosse (il
  // logo bianco spariva su una "Chi siamo" ancora ben visibile sotto).
  // Congelata al resize vero, non ricalcolata ad ogni tick, per lo stesso
  // motivo dell'altra soglia qui sotto (barra indirizzi mobile).
  const nav = $(".nav");
  let themeLine = nav.offsetHeight + 8;
  window.addEventListener("resize", () => {
    themeLine = nav.offsetHeight + 8;
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
