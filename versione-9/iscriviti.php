<?php
/* Endpoint del form newsletter (magazine.php -> script.js, stesso fetch
   POST + risposta JSON di invia.php, vedi quello per i commenti sul
   perché mail() invece di un provider dedicato). Endpoint a sé e non una
   variante di invia.php: campi diversi (solo email + consenso, niente
   nome/messaggio) e un destinatario comunque umano finché non c'è un
   servizio di newsletter vero — tenerli separati evita di dover rendere
   invia.php condizionale su un "tipo" di richiesta.
*/

header("Content-Type: application/json; charset=utf-8");

function rispondi(bool $ok, ?string $errore = null): void
{
    http_response_code($ok ? 200 : 422);
    echo json_encode($ok ? ["ok" => true] : ["ok" => false, "error" => $errore]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    rispondi(false, "Richiesta non valida.");
}

// Honeypot: stesso meccanismo e stesso nome campo di invia.php.
if (!empty($_POST["azienda"] ?? "")) {
    rispondi(true);
}

$email = trim((string) ($_POST["email"] ?? ""));
$consenso = !empty($_POST["consenso"] ?? "");

if ($email === "" || !$consenso) {
    rispondi(false, "Manca qualcosa: controlla i campi evidenziati.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    rispondi(false, "L'indirizzo email non sembra valido.");
}
if (preg_match("/[\r\n]/", $email)) {
    rispondi(false, "Richiesta non valida.");
}

$destinatario = "info@ewebsolution.it";
$oggetto = "Nuova iscrizione newsletter — $email";
$corpo = "Nuova iscrizione alla newsletter dal sito ewebsolution.it\n\n";
$corpo .= "Email: $email\n";

$mittente = "no-reply@ewebsolution.it";
$headers = "From: eWeb — Sito web <$mittente>\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$inviata = mail($destinatario, $oggetto, $corpo, $headers);

if (!$inviata) {
    rispondi(false, "Invio non riuscito: riprova tra poco.");
}

rispondi(true);
