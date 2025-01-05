<?php
// Headers pour les requêtes CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Charger les utilisateurs depuis le fichier JSON
$users = json_decode(file_get_contents("users.json"), true);

// Récupérer les données envoyées depuis React
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->email) && !empty($data->password)) {
    $email = htmlspecialchars($data->email);
    $password = htmlspecialchars($data->password);
    $userFound = false;

    foreach ($users as $user) {
        if ($user["email"] === $email) {
            $userFound = true;

            // Vérification du mot de passe
            if ($password === $user["password"]) {
                echo json_encode(["success" => true, "message" => "Connexion réussie."]);
                exit;
            } else {
                echo json_encode(["success" => false, "message" => "Mot de passe incorrect."]);
                exit;
            }
        }
    }

    if (!$userFound) {
        echo json_encode(["success" => false, "message" => "Email non trouvé."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Veuillez fournir un email et un mot de passe."]);
}
?>
