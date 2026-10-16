<?php
/* Endpoint del form contatti (versione-8/index.php -> script.js, fetch
   POST qui). Risponde sempre in JSON: {"ok": true} o {"ok": false,
   "error": "..."}. Usa mail() nativa di PHP: funziona su quasi tutto
   l'hosting condiviso senza dipendenze, ma è il motivo più comune per
   cui un'email finisce in spam — se capita in produzione, il prossimo
   passo è passare a SMTP autenticato (es. PHPMailer) con le credenziali
   della casella info@ewebsolution.it invece di mail().
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

// Honeypot: un bot compila anche i campi nascosti, una persona no — qui
// si finge tutto a posto, così il bot non impara a distinguere un
// honeypot da un errore reale.
if (!empty($_POST["azienda"] ?? "")) {
    rispondi(true);
}

$nome = trim((string) ($_POST["nome"] ?? ""));
$email = trim((string) ($_POST["email"] ?? ""));
$messaggio = trim((string) ($_POST["messaggio"] ?? ""));

if ($nome === "" || $email === "" || $messaggio === "") {
    rispondi(false, "Manca qualcosa: controlla i campi evidenziati.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    rispondi(false, "L'indirizzo email non sembra valido.");
}
// Niente header injection via \r\n nei campi che finiscono negli header
// della mail (il "From" qui sotto usa $email).
if (preg_match("/[\r\n]/", $nome) || preg_match("/[\r\n]/", $email)) {
    rispondi(false, "Richiesta non valida.");
}

$destinatario = "info@ewebsolution.it";
$oggetto = "Nuovo contatto dal sito — $nome";

$corpo = "Nuovo messaggio dal form contatti di ewebsolution.it\n\n";
$corpo .= "Nome: $nome\n";
$corpo .= "Email: $email\n\n";
$corpo .= "Messaggio:\n$messaggio\n";

// From sul dominio del sito (molti host rifiutano/segnano come spam un
// From con un dominio esterno): la email del cliente va in Reply-To,
// così "Rispondi" nel client di posta va comunque a lui.
$mittente = "no-reply@ewebsolution.it";
$headers = "From: eWeb — Sito web <$mittente>\r\n";
$headers .= "Reply-To: $nome <$email>\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$inviata = mail($destinatario, $oggetto, $corpo, $headers);

if (!$inviata) {
    rispondi(false, "Invio non riuscito: riprova tra poco.");
}

rispondi(true);
