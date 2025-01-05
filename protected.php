<?php
// protected.php

require_once 'config.php';
require_once '/vendor/autoload.php'; // Inclus l'autoloader de Composer

use \Firebase\JWT\JWT;

header('Content-Type: application/json');

// Vérifier la présence du token dans l'en-tête Authorization
$headers = apache_request_headers();
if (!isset($headers['Authorization'])) {
    echo json_encode(["message" => "Token manquant"]);
    exit();
}

// Extraire le token de l'en-tête Authorization
$token = str_replace('Bearer ', '', $headers['Authorization']);

try {
    // Décodez le token pour vérifier sa validité
    $decoded = JWT::decode($token, SECRET_KEY, [ALGORITHM]);

    // Le token est valide, vous pouvez accéder aux données de l'utilisateur
    echo json_encode([
        "message" => "Accès autorisé",
        "email" => $decoded->sub
    ]);
} catch (Exception $e) {
    echo json_encode(["message" => "Token invalide ou expiré"]);
}
?>

