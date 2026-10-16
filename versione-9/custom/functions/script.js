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
     Cookie consent: solo tecnici di default. I cookie di terze parti
     (per ora solo la mappa di Google nei contatti) partono solo dopo
     un consenso esplicito — scelta salvata in localStorage, valida
     per le visite successive, riapribile dal link "Cookie Policy" nel
     footer. Indipendente da GSAP: deve funzionare anche se non carica.
     --------------------------------------------------------- */
  const COOKIE_KEY = "eweb-cookie-consent";
  const cookieBanner = $("[data-cookie-banner]");
  const mapBox = $("[data-map]");

  function loadMap() {
    if (!mapBox || mapBox.querySelector("iframe")) return;
    mapBox.innerHTML = `<iframe
      src="https://www.google.com/maps?q=Via+Broseta+101G+24128+Bergamo&output=embed"
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
      title="Mappa — eWeb, Via Broseta 101G, Bergamo"
    ></iframe>`;
  }

  function getStoredConsent() {
    try {
      return localStorage.getItem(COOKIE_KEY);
    } catch {
      return null;
    }
  }

  function setConsent(value) {
    try {
      localStorage.setItem(COOKIE_KEY, value);
    } catch {
      /* storage non disponibile (privacy mode, ecc.): la scelta vale
         solo per questa visita, si richiede di nuovo la prossima volta */
    }
    if (value === "accepted") loadMap();
    if (cookieBanner) cookieBanner.hidden = true;
  }

  const storedConsent = getStoredConsent();
  if (storedConsent === "accepted") loadMap();
  else if (!storedConsent && cookieBanner) cookieBanner.hidden = false;

  $("[data-cookie-accept]")?.addEventListener("click", () =>
    setConsent("accepted"),
  );
  $("[data-cookie-reject]")?.addEventListener("click", () =>
    setConsent("rejected"),
  );
  $$("[data-cookie-manage]").forEach((el) =>
    el.addEventListener("click", (e) => {
      e.preventDefault();
      if (cookieBanner) cookieBanner.hidden = false;
    }),
  );

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
  // .hero__brand è lo stesso blocco (logo + claim, un'unica immagine
  // mascherata: .logo--banner) riusato nel loader — selettore scoped a
  // .hero qui, altrimenti nasconderebbe anche quello del loader, visibile
  // fin da subito mentre carica.
  // Titolo e firma (.hero__title, .hero__bottom) NON entrano con l'intro:
  // all'apertura resta visibile solo il logo (già col claim, è parte
  // della stessa immagine — niente da ritagliare), grande e centrato (vedi
  // .hero__brand-wrap nel CSS); il badge "10 years" compare poco dopo,
  // sempre dentro l'intro (vedi più sotto). Titolo e firma compaiono solo
  // scrollando, insieme alla scomparsa del logo (vedi il timeline
  // agganciato allo scroll, più sotto), non qui.
  // Tutto questo blocco (hero + badge + logo/burger nascosti all'avvio)
  // ha senso solo sulla home, che ha una .hero: su una pagina interna senza
  // .hero questi set non avrebbero mai un corrispettivo "mostra di nuovo" e
  // il logo/burger della nav resterebbero invisibili per sempre (il
  // ScrollTrigger che li fa ricomparire, più sotto, è anch'esso scoped a
  // if ($(".hero")) — vedi lì). Pagine senza .hero tengono quindi nav__logo
  // e nav__burger sempre visibili, col loro stato di default.
  if ($(".hero")) {
    gsap.set([".hero .hero__brand", ".hero__meta"], {
      autoAlpha: 0,
      y: 24,
    });
    gsap.set([".hero__title", ".hero__bottom"], { autoAlpha: 0, y: 24 });
    gsap.set(
      [".hero .hero__badge-one", ".hero .hero__badge-zero", ".hero .hero__badge-years"],
      { autoAlpha: 0, scale: 0.6 },
    );
    // Il logo dell'header resta nascosto per tutta la hero (dove il logo
    // grande fa già il suo lavoro) — ricompare più sotto, quando si scrolla
    // oltre la hero (vedi ScrollTrigger dedicato, dopo l'intro).
    gsap.set(".nav__logo", { autoAlpha: 0 });
    gsap.set(".nav__burger", { autoAlpha: 0 });
  }

  function runLoader() {
    const loader = $(".loader");
    const numEl = $(".loader__num");
    const barSpan = $(".loader__bar span");
    const loaderBadge = $(".loader__inner .hero__badge--mask");
    const tl = gsap.timeline();

    if (reduced) {
      loader.remove();
      return Promise.resolve();
    }

    // Il logo del loader è visibile fin dal primo frame (nessun fade
    // proprio, vedi commento più sopra): il badge qui parte comunque
    // nascosto e compare poco dopo, stesso "pop" dell'intro della hero
    // (qui non scomposto in 1/0/years: nel loader il badge resta quello
    // precedente, vedi .hero__badge--mask in style.css).
    gsap.set(loaderBadge, { autoAlpha: 0, scale: 0.6 });
    tl.to(
      loaderBadge,
      { autoAlpha: 1, scale: 1, duration: 0.5, ease: "back.out(1.7)" },
      0.3,
    );

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
        ".hero__meta",
        { autoAlpha: 1, y: 0, duration: 1.2, overwrite: false },
        0.6,
      )
      // Il badge "10 years" compare un attimo dopo il logo, non insieme,
      // e in due tempi — prima l'1, poi lo 0 e "years" insieme — stesso
      // "pop" (scale + back.out) già usato nel loader, ma spezzato.
      .to(
        ".hero .hero__badge-one",
        {
          autoAlpha: 1,
          scale: 1,
          duration: 0.5,
          ease: "back.out(1.7)",
          overwrite: false,
        },
        1.6,
      )
      .to(
        ".hero .hero__badge-zero, .hero .hero__badge-years",
        {
          autoAlpha: 1,
          scale: 1,
          duration: 0.5,
          ease: "back.out(1.7)",
          overwrite: false,
        },
        1.75,
      );
  }

  const fontsReady = document.fonts ? document.fonts.ready : Promise.resolve();
  Promise.all([runLoader(), fontsReady]).then(() => {
    intro();
    scrambleTitles();
    // Stesso motivo del refresh su "load" più sotto: chiamare
    // ScrollTrigger.refresh() ha fatto crashare Safari (bug del motore JS).
    // Differita di un tick per sicurezza, qui come là.
    setTimeout(() => ScrollTrigger.refresh(), 0);
  });

  /* ---------------------------------------------------------
     Hero — pin di 3 viewport di scroll (non più 1: tre passaggi distinti,
     non una sola dissolvenza compressa in uno solo), in tre fasi via
     heroScrollTl, un terzo ciascuna:
     1° scroll (0 → 1/3): all'apertura resta visibile solo il logo,
     grande e centrato (vedi .hero__brand-wrap nel CSS — intro() più sopra
     fa comparire solo quello, badge incluso con un piccolo ritardo;
     titolo/firma partono nascosti). Scrollando il logo (col badge)
     sparisce per primo (0 → 1/6): non ci deve essere incrocio, il logo è
     già sparito del tutto quando titolo e firma cominciano a comparire
     (1/6 → 1/3), in sequenza e non in sovrapposizione.
     2° scroll (1/3 → 2/3): nessun tween programmato qui apposta — titolo
     e firma restano fermi e leggibili, tempo per lo scroll "di lettura".
     3° scroll (2/3 → 1): quel che resta (titolo e firma) sfuma a sua
     volta per lasciare spazio alla sezione successiva, esattamente
     quando si sblocca il pin.
     --------------------------------------------------------- */
  if ($(".hero")) {
    const heroScrollTl = gsap
      .timeline({ paused: true })
      .to(
        ".hero .hero__brand-wrap",
        { autoAlpha: 0, duration: 1 / 6, ease: "none" },
        0,
      )
      .to(
        [".hero__title", ".hero__bottom"],
        { autoAlpha: 1, y: 0, duration: 1 / 6, ease: "none" },
        1 / 6,
      )
      .to(
        ".hero__content",
        { yPercent: -26, autoAlpha: 0, duration: 1 / 3, ease: "none" },
        2 / 3,
      )
      .to(".hero__meta", { autoAlpha: 0, duration: 1 / 3, ease: "none" }, 2 / 3);

    ScrollTrigger.create({
      trigger: ".hero",
      start: "top top",
      end: () => "+=" + window.innerHeight * 3,
      pin: true,
      anticipatePin: 1,
      invalidateOnRefresh: true,
      onUpdate: (self) => heroScrollTl.progress(self.progress),
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
     Video hero: loop di sfondo, semplice fade-in quando pronto.
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
  gsap.from(".claim-band__inner .claim-band__item", {
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
          // Distanza FISSA (l'altezza dell'elemento stesso), non più
          // "bottom 40%": quella richiedeva di scorrere ben oltre
          // l'elemento, e se è l'ultima cosa prima di un footer corto
          // (es. la CTA di una pagina di servizio) quello spazio in fondo
          // alla pagina può non esserci — le ultime parole restavano
          // sbiadite per sempre. Così lo scrub si completa scorrendo
          // l'elemento stesso, a prescindere da cosa viene dopo.
          end: () => "+=" + Math.max(el.offsetHeight, 300),
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
    /* -------------------------------------------------------
       Ogni categoria mostra solo un sottoinsieme delle righe:
       data-fixed sono le prime N sempre visibili (in ordine), poi
       data-random ne sceglie altrettante a caso tra quelle restanti
       a ogni caricamento della pagina. Il resto resta nascosto
       (.is-more, vedi style.css) dietro al bottone "Vedi altri
       progetti", che le rivela tutte in un colpo solo.
       Fatto PRIMA del setup dell'entrata qui sotto: le righe .is-more
       restano fuori dalla selezione animata, altrimenti GSAP gli
       applicherebbe uno stato iniziale (autoAlpha 0) che non viene
       mai risolto, perché lo ScrollTrigger che lo risolverebbe è già
       scattato prima che il bottone le rivelasse. */
    const shuffle = (arr) => {
      for (let i = arr.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [arr[i], arr[j]] = [arr[j], arr[i]];
      }
      return arr;
    };

    portfolioAreas.forEach((area) => {
      const rows = $$("tbody tr", area);
      const tbody = rows[0]?.parentElement;
      let toHide;

      /* Categoria "Portali, Siti Web e Webapp": le righe arrivano da tre
         sotto-gruppi (data-group su ogni tr, mai mostrati come titoli) con
         una quota fissa di pick casuali ciascuno — vedi data-group-picks
         sull'area. Il resto, rivelato da "Vedi altri progetti", va
         mescolato tra i tre gruppi anziché seguire l'ordine originale. */
      const groupPicks = area.dataset.groupPicks;
      if (groupPicks && tbody) {
        const picks = {};
        groupPicks.split(",").forEach((pair) => {
          const [g, n] = pair.split(":");
          picks[g] = parseInt(n, 10) || 0;
        });
        const byGroup = {};
        rows.forEach((row) => {
          const g = row.dataset.group || "default";
          (byGroup[g] = byGroup[g] || []).push(row);
        });
        const toShow = [];
        toHide = [];
        Object.keys(byGroup).forEach((g) => {
          const list = shuffle(byGroup[g]);
          toShow.push(...list.slice(0, picks[g] || 0));
          toHide.push(...list.slice(picks[g] || 0));
        });
        shuffle(toShow);
        shuffle(toHide);
        [...toShow, ...toHide].forEach((row) => tbody.appendChild(row));
      } else {
        /* Le righe nascoste restano, senza riordino, intrecciate in mezzo
           a quelle visibili nell'ordine originale del markup: al click su
           "Vedi altri progetti" sbucherebbero anche sopra o tra le righe
           già mostrate, facendo sembrare che l'intera tabella si
           aggiorni. Si riordina quindi il tbody una volta sola, qui:
           prima le righe fisse + quelle pescate a caso (toShow, nello
           stesso ordine già visibile), poi quelle da rivelare dopo
           (toHide) — così il click si limita ad aggiungerle in coda. */
        const fixed = parseInt(area.dataset.fixed || "0", 10);
        const randomCount = parseInt(area.dataset.random || "0", 10);
        const fixedRows = rows.slice(0, fixed);
        const rest = shuffle(rows.slice(fixed));
        const toShow = [...fixedRows, ...rest.slice(0, randomCount)];
        toHide = rest.slice(randomCount);
        if (tbody) [...toShow, ...toHide].forEach((row) => tbody.appendChild(row));
      }

      const more = $(".portfolio__more", area);
      if (!toHide.length) {
        more?.remove();
        return;
      }
      toHide.forEach((row) => row.classList.add("is-more"));
      if (!more) return;
      more.addEventListener(
        "click",
        () => {
          toHide.forEach((row) => row.classList.remove("is-more"));
          more.remove();
          if (reduced) return;
          gsap.from(toHide, {
            y: 20,
            autoAlpha: 0,
            stagger: { amount: Math.min(toHide.length * 0.04, 0.6) },
            duration: 0.6,
            ease: "expo.out",
          });
        },
        { once: true },
      );
    });

    portfolioAreas.forEach((area) => {
      gsap.from(
        $$(".portfolio__area-title, .portfolio__table tr:not(.is-more)", area),
        {
          y: 30,
          autoAlpha: 0,
          stagger: 0.05,
          duration: 0.9,
          ease: "expo.out",
          scrollTrigger: { trigger: area, start: "top 85%" },
        },
      );

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
      if (!open) menu.classList.remove("menu--services");
      burger.setAttribute("aria-expanded", String(open));
      menu.setAttribute("aria-hidden", String(!open));
      if (lenisRef) open ? lenisRef.stop() : lenisRef.start();
      // lenis.stop() ferma solo lo scroll fluido gestito da Lenis, non lo
      // scroll nativo del browser (rotellina/trackpad/tasti freccia
      // bubblano comunque su html/body dietro al menu a schermo intero):
      // overflow:hidden qui lo blocca davvero, senza toccare scrollY (a
      // differenza di un position:fixed con salvataggio/ripristino, che
      // qui non serve visto che non c'è alcun salto quando si riapre).
      document.documentElement.style.overflow = open ? "hidden" : "";
      document.body.style.overflow = open ? "hidden" : "";
    };
    burger.addEventListener("click", () =>
      toggle(!document.body.classList.contains("menu-open")),
    );

    // "05 Servizi" fa uscire i 4 link ed entrare il catalogo servizi nello
    // stesso spazio (vedi .menu--services in style.css); "Indietro" torna
    // ai link. Nessuno dei due deve chiudere il menu come fanno gli altri
    // link, quindi sono esclusi dal loop di chiusura qui sotto.
    const servicesToggle = $(".menu__services-toggle", menu);
    const servicesBack = $(".menu__services-back", menu);
    servicesToggle?.addEventListener("click", (e) => {
      e.preventDefault();
      menu.classList.add("menu--services");
    });
    servicesBack?.addEventListener("click", (e) => {
      e.preventDefault();
      menu.classList.remove("menu--services");
    });

    $$("a", menu).forEach((a) => {
      if (a === servicesToggle || a === servicesBack) return;
      a.addEventListener("click", () => toggle(false));
    });
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

  // "La parola si forma": stesso effetto già usato per "pitch"/"metodo" e
  // per il nome di ogni categoria del portfolio (scramble che si risolve
  // una volta sola, allo scroll), qui generalizzato con [data-scramble]
  // invece di un selettore per ciascun caso. Va DOPO il blocco .reveal-lines
  // qui sopra: se il bersaglio è un <em> dentro un titolo con quella
  // classe, deve trovare già pronto lo split in righe (splitLines non
  // tocca i tag interni, solo li ri-avvolge — vedi quella funzione), non
  // il contrario.
  // La CREAZIONE del trigger resta qui (ordine DOM), ma l'ATTIVAZIONE è
  // rimandata a dopo il loader (vedi scrambleTitles() chiamato nel
  // Promise.all più sopra): un elemento già "sopra la piega" (es. l'<em>
  // della hero) ha la condizione "top 85%" già vera al caricamento, quindi
  // lo ScrollTrigger lo farebbe scramblare SUBITO — mentre il loader
  // (~3.5s, sopra a tutto con z-index:1000) lo copre ancora. Risultato:
  // finiva di risolversi dietro al loader, invisibile. Per gli usi più in
  // basso nella pagina (pitch/metodo/portfolio, raggiunti solo scrollando
  // molto dopo che il loader è sparito) non cambia nulla.
  function scrambleTitles() {
    if (reduced || !hasScramble) return;
    $$("[data-scramble]").forEach((el) => {
      gsap.to(el, {
        duration: 1,
        scrambleText: {
          text: el.textContent,
          chars: "upperAndLowerCase",
          revealDelay: 0.2,
          speed: 0.4,
        },
        scrollTrigger: { trigger: el, start: "top 85%" },
      });
    });
  }

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
  const storyProgressEl = document.querySelector(".story__progress");
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
      // Una sola custom property, letta dal CSS come scaleX (riga
      // orizzontale, da 4 colonne) o scaleY (verticale, sotto i 900px —
      // vedi la media query): niente ramo JS per asse/breakpoint.
      storyProgressEl?.style.setProperty("--story-p", p);
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
    const submitBtn = $('button[type="submit"]', form);
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      let ok = true;
      $$(".field", form).forEach((f) => {
        const input = $("input, textarea", f);
        const valid = input.checkValidity();
        f.classList.toggle("is-invalid", !valid);
        if (!valid) ok = false;
      });
      // Checkbox di consenso: non è un .field (niente floating label, vedi
      // .form-consent in style.css), quindi va validata a parte. Oggi la
      // usa solo il form newsletter di magazine.php — il form contatti qui
      // sopra non ne ha, il $$() qui sotto semplicemente non trova nulla.
      $$('input[type="checkbox"][required]', form).forEach((c) => {
        const valid = c.checkValidity();
        c.closest(".form-consent")?.classList.toggle("is-invalid", !valid);
        if (!valid) ok = false;
      });

      status.classList.remove("is-ok");
      if (!ok) {
        status.textContent = "Manca qualcosa: controlla i campi evidenziati.";
        return;
      }

      submitBtn.disabled = true;
      status.textContent = "Invio in corso…";
      fetch(form.action, {
        method: "POST",
        headers: { Accept: "application/json" },
        body: new FormData(form),
      })
        .then((res) => res.json().catch(() => ({ ok: false })))
        .then((data) => {
          status.classList.toggle("is-ok", !!data.ok);
          // data-success sul <form>: il messaggio di default ("Uno di noi
          // ti ricontatterà") ha senso per il form contatti ma non per un
          // form newsletter (nessuno "ricontatta" per un'iscrizione) — un
          // attributo opzionale invece di duplicare l'intera funzione per
          // una sola stringa diversa.
          status.textContent = data.ok
            ? form.dataset.success || "Grazie! Uno di noi ti ricontatterà a breve."
            : data.error ||
              "Qualcosa non ha funzionato: riprova o scrivici a info@ewebsolution.it.";
          if (data.ok) form.reset();
        })
        .catch(() => {
          status.classList.remove("is-ok");
          status.textContent =
            "Qualcosa non ha funzionato: riprova o scrivici a info@ewebsolution.it.";
        })
        .finally(() => {
          submitBtn.disabled = false;
        });
    });
    $$(".field input, .field textarea", form).forEach((i) =>
      i.addEventListener("input", () =>
        i.closest(".field").classList.remove("is-invalid"),
      ),
    );
    $$('input[type="checkbox"][required]', form).forEach((c) =>
      c.addEventListener("change", () =>
        c.closest(".form-consent")?.classList.remove("is-invalid"),
      ),
    );
  }

  /* ---------------------------------------------------------
     Tocchi "wow": linee che si disegnano
     --------------------------------------------------------- */
  $$(".eyebrow__line, .claim-band__rule").forEach((line) => {
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
      // Sul giallo (contatti in home, CTA gialla delle pagine di servizio)
      // il pallino giallo sparirebbe: qui diventa navy.
      cursor.classList.toggle(
        "on-yellow",
        !!e.target.closest(".finale, .service-cta--yellow"),
      );
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
