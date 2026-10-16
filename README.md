# eWeb — nuovo sito

Rifacimento del sito di eWeb s.r.l. (Bergamo, dal 2016). Progetto statico (HTML/CSS/JS, dalla versione 8 anche PHP), sviluppato per versioni parallele successive dentro cartelle separate — ogni `versione-N/` è un'iterazione completa della home, non una cartella di branch/feature.

## Versioni

- **versione-1** — sperimentale: GSAP + Three.js, portfolio a scroll orizzontale, tono commerciale.
- **versione-2** — impostazione più standard, ancora commerciale.
- **versione-3** — su feedback diretto del titolare: taglio "raccontare, non vendere" invece che commerciale.
- **versione-4** — stesso impianto/contenuti di versione-3, hero "si entra nel video" (zoom pinnato via ScrollTrigger).
- **versione-5** — copia di versione-4 con la hero rielaborata più volte e il ritorno di alcuni elementi di versione-1 (portfolio a tabella, manifesto, quote del team).
- **versione-6** — copia 1:1 di versione-5 con la sola hero sostituita (testo statico su video pieno schermo, niente scroll-jacking).
- **versione-7** — copia di versione-6 con una lista dettagliata di modifiche di contenuto/UX.
- **versione-8** — prima versione con pagine interne di servizio (PHP), oltre alla home one-page: catalogo di landing page per categoria (Consulenza strategica, Web site, Software Web, Google e motori di ricerca, Ecommerce, Social, Email Marketing, Content), pagina `/magazine` (raccoglitore iscrizioni newsletter), menu a schermo intero con catalogo servizi.
- **versione-9** — ultima versione attiva, basata su versione-8; qui vive il lavoro più recente sul menu.

La versione più recente è sempre quella con il numero più alto; le versioni precedenti restano come storico/riferimento, non vengono aggiornate.

## Struttura (dalla versione 8 in poi)

```
versione-N/
  index.php            home one-page
  magazine.php         pagina iscrizione newsletter
  invia.php            endpoint form di contatto
  iscriviti.php         endpoint form newsletter
  inc/                 header/menu, hero/CTA di servizio, config pagine, related
  pages/<categoria>/   pagine di servizio (landing), una cartella per categoria
  assets/               font, immagini, video
  custom/css/style.css  stile del sito
  custom/functions/script.js  interazioni (Lenis, GSAP/ScrollTrigger, menu, form)
```

Gli URL pubblici restano piatti (es. `/consulenza-web-marketing`), indipendentemente dalla cartella di categoria in cui vive il file fisico: il ponte è gestito da `.htaccess`.

## Brand

Palette: `#044d8b` (blu), `#189edc` (azzurro), `#fcda18` (giallo), `#ffffff`.
Posizionamento: "consulenti operativi", non web agency — tono narrativo, non commerciale.
