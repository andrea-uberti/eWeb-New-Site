<?php
/* Base del sito: vuota quando vive alla radice del dominio; con il percorso
   quando invece sta in una sottocartella — come ora, in sviluppo, su
   https://dev.ewebsolution.it/new-site/versione-8/. Unico punto da
   aggiornare quando il sito si sposta, invece di cercare e correggere "/"
   a mano in ogni pagina interna. */
define("BASE_URL", "/new-site/versione-8");

/* Catalogo delle pagine di servizio, per categoria — unica fonte usata dai
   collegamenti "altre pagine di questa categoria" (vedi inc/related.php) e
   dal menu (inc/header.php). Chiave = slug del file .php (senza
   estensione), stesso usato nell'URL pulito. "teaser" è la riga sotto il
   titolo nella lista di inc/related.php — tenerla breve (stesso tono della
   lead della hero di quella pagina). Aggiungere qui ogni nuova pagina di
   servizio, non nelle singole pagine. */
$SERVICE_PAGES = [
  "consulenza-web-marketing" => [
    "title" => "Consulenza Web Marketing",
    "category" => "Consulenza strategica",
    "teaser" => "Strategia su misura, non un pacchetto preconfezionato.",
  ],
  "campagne-lead-generation" => [
    "title" => "Campagne Lead Generation",
    "category" => "Consulenza strategica",
    "teaser" => "Contatti veri, non numeri in una lista.",
  ],
  "realizzazione-siti-web-bergamo" => [
    "title" => "Realizzazione Siti Web",
    "category" => "Web site",
    "teaser" => "La base su cui si regge tutto il resto.",
  ],
  "web-design-bergamo" => [
    "title" => "Web Design",
    "category" => "Web site",
    "teaser" => "Disegnato su misura, non scelto da un catalogo.",
  ],
  "sviluppo-web-app" => [
    "title" => "Sviluppo Web App",
    "category" => "Web site",
    "teaser" => "Leggera da usare, non da installare.",
  ],
  "software-web-based" => [
    "title" => "Sviluppo Software Web Based",
    "category" => "Software Web",
    "teaser" => "Non in affitto: lo paghi una volta, resta tuo.",
  ],
  "crm-gestione-contatti" => [
    "title" => "CRM Gestione Contatti",
    "category" => "Software Web",
    "teaser" => "Cucito sui tuoi clienti, non sul mercato.",
  ],
  "gestione-fidelity-card" => [
    "title" => "Gestione Fidelity Card",
    "category" => "Software Web",
    "teaser" => "Un motivo in più per farli tornare.",
  ],
  "sistema-gestione-ticketing-assistenza" => [
    "title" => "Sistema Gestione Ticketing Assistenza",
    "category" => "Software Web",
    "teaser" => "Niente richiesta persa tra le mail.",
  ],
  "gestionale-aziendale-integrato" => [
    "title" => "Gestionale Aziendale Integrato",
    "category" => "Software Web",
    "teaser" => "La tua azienda, in un posto solo.",
  ],
  "software-gestione-timbrature-personale" => [
    "title" => "Software Gestione Timbrature Personale",
    "category" => "Software Web",
    "teaser" => "Dati veri, non stime a fine mese.",
  ],
  "sviluppo-app-bergamo" => [
    "title" => "Sviluppo App",
    "category" => "Software Web",
    "teaser" => "Sullo schermo che guardano di più.",
  ],
  "consulenza-seo-bergamo" => [
    "title" => "Consulenza SEO Bergamo",
    "category" => "Google e motori di ricerca",
    "teaser" => "Le parole che i tuoi clienti usano già.",
  ],
  "consulenza-marketing-digitale" => [
    "title" => "Consulenza Marketing Digitale",
    "category" => "Google e motori di ricerca",
    "teaser" => "Fatti trovare da chi ti cerca.",
  ],
  "indicizzazione-siti-web" => [
    "title" => "Indicizzazione Siti Web",
    "category" => "Google e motori di ricerca",
    "teaser" => "Prima di essere trovati, bisogna esserci.",
  ],
  "posizionamento-siti-internet-bergamo" => [
    "title" => "Posizionamento Siti Internet",
    "category" => "Google e motori di ricerca",
    "teaser" => "Esserci non basta, bisogna essere trovati.",
  ],
  "campagne-google-ads" => [
    "title" => "Campagne Google Ads",
    "category" => "Google e motori di ricerca",
    "teaser" => "Quando non puoi aspettare l'organico.",
  ],
  "gestione-google-my-business" => [
    "title" => "Gestione Google My Business",
    "category" => "Google e motori di ricerca",
    "teaser" => "La prima cosa che vedono di te.",
  ],
  "realizzazione-siti-ecommerce" => [
    "title" => "Realizzazione Siti Ecommerce",
    "category" => "Ecommerce",
    "teaser" => "Tuo, non in affitto su un marketplace.",
  ],
  "gestione-social-bergamo" => [
    "title" => "Gestione Social",
    "category" => "Social",
    "teaser" => "Non un post ogni tanto, una strategia.",
  ],
  "direct-email-marketing" => [
    "title" => "Direct Email Marketing",
    "category" => "Email Marketing",
    "teaser" => "Vecchia solo se la usi male.",
  ],
  "content-marketing-bergamo" => [
    "title" => "Content Marketing",
    "category" => "Content",
    "teaser" => "Attrarre, non interrompere.",
  ],
  "web-copywriter" => [
    "title" => "Web Copywriter",
    "category" => "Content",
    "teaser" => "Scritto per essere letto e trovato.",
  ],
  "logo-design-bergamo" => [
    "title" => "Logo Design",
    "category" => "Content",
    "teaser" => "Il primo segno che resta in mente.",
  ],
  "brand-identity-bergamo" => [
    "title" => "Brand Identity",
    "category" => "Content",
    "teaser" => "Coerente ovunque ti si incontri.",
  ],
  "advertising-bergamo" => [
    "title" => "Advertising",
    "category" => "Content",
    "teaser" => "Farsi conoscere, prima di vendere.",
  ],
  "below-the-line-bergamo" => [
    "title" => "Below the Line",
    "category" => "Content",
    "teaser" => "Parlare a chi è già pronto a scegliere.",
  ],
];
