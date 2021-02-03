<?php
include_once ("authentification.php");

$codeRetourHTTP = 400; // Erreur "Bad request" par défaut
header ("Access-Control-Allow-Origin: *");

if (isset($_GET['u']) && isset($_GET['p'])) {
    $login = filter_var ($_GET['u'], FILTER_SANITIZE_STRING);
    $pass = filter_var ($_GET['p'], FILTER_SANITIZE_STRING);
    $codeRetourHTTP = authentification ($login, $pass);
} else {
    $codeRetourHTTP = 400;      // Erreur "Bad request"
}

// On génère la réponse en JSON à partir des données de la session
http_response_code ($codeRetourHTTP);
if (isset($_SESSION['login'])) {
    header ('Content-Type: application/json');
    echo json_encode ($_SESSION['login']);
}