<?php
// Headers pour les requêtes CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Chemin du fichier JSON
$file = "users.json";

// Charger les utilisateurs existants
$users = json_decode(file_get_contents($file), true);

// Récupérer les données envoyées par le client
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->email) && !empty($data->password)) {
    $email = htmlspecialchars($data->email);
    $password = htmlspecialchars($data->password);

    // Vérifier si l'email est déjà utilisé
    foreach ($users as $user) {
        if ($user["email"] === $email) {
            echo json_encode(["success" => false, "message" => "L'email est déjà utilisé."]);
            exit;
        }
    }

    // Ajouter le nouvel utilisateur
    $users[] = [
        "email" => $email,
        "password" => $password // Pas de hachage ici
    ];

    // Sauvegarder dans le fichier JSON
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

    echo json_encode(["success" => true, "message" => "Inscription réussie."]);
} else {
    echo json_encode(["success" => false, "message" => "Veuillez fournir un email et un mot de passe."]);
}
?>
