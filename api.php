<?php
// Autoriser CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

// Si c'est une requête OPTIONS, on répond rapidement
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Tableau de produits (10 produits)
$products = [
    [
        'id' => 1,
        'title' => "Rolex Submariner",
        'price' => 109.95,
        'description' => "Montre iconique, l'emblème de l'horlogerie de luxe.",
        'category' => "simple",
        'collection' => "femme",
        'promotion' => true,
        'image' => "http://localhost/image/simpleWatches/1.jpg",
        'images' => [
            "http://localhost/image/simpleWatches/2.jpg",
            "http://localhost/image/simpleWatches/3.jpg"
        ],
        'brand' => "Rolex",
        'model' => "Submariner",
        'features' => [
            'Mouvement' => "Automatique",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "300m"
        ],
        'color' => "Argenté",
        'strap_material' => "Acier inoxydable",
        'availability' => "En stock",
        'added_on' => "2024-12-01"
    ],
    [
        'id' => 2,
        'title' => "Omega Seamaster",
        'price' => 695,
        'description' => "Montre de plongée de prestige.",
        'category' => "simple",
        'collection' => "homme",
        'promotion' => true,
        'image' => "http://localhost/image/simpleWatches/2.jpeg",
        'images' => [
            "http://localhost/image/5.jpg",
            "http://localhost/image/6.jpg"
        ],
        'brand' => "Omega",
        'model' => "Seamaster",
        'features' => [
            'Mouvement' => "Automatique",
            'Matériau du boîtier' => "Titane",
            'Diamètre du cadran' => "42mm",
            'Réserve de marche' => "72 heures",
            'Étanchéité' => "600m"
        ],
        'color' => "Bleu",
        'strap_material' => "Caoutchouc",
        'availability' => "En stock",
        'added_on' => "2024-11-15"
    ],
    [
        'id' => 3,
        'title' => "Tag Heuer Monaco",
        'price' => 199.99,
        'description' => "Montre sportive au design distinctif.",
        'category' => "simple",
        'collection' => "sportif",
        'promotion' => true,
        'image' => "http://localhost/image/simpleWatches/3.avif",
        'images' => [
            "http://localhost/image/8.jpg",
            "http://localhost/image/9.jpg"
        ],
        'brand' => "Tag Heuer",
        'model' => "Monaco",
        'features' => [
            'Mouvement' => "Quartz",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "39mm",
            'Réserve de marche' => "Non applicable",
            'Étanchéité' => "100m"
        ],
        'color' => "Noir",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-10"
    ],
    [
        'id' => 4,
        'title' => "Patek Philippe Calatrava",
        'price' => 29.99,
        'description' => "Une montre de luxe au design épuré.",
        'category' => "simple",
        'collection' => "femme",
        'promotion' => true,
        'image' => "http://localhost/image/simpleWatches/4.jpg",
        'images' => [
            "http://localhost/image/11.jpg",
            "http://localhost/image/12.jpg"
        ],
        'brand' => "Patek Philippe",
        'model' => "Calatrava",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "37mm",
            'Réserve de marche' => "45 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-12-05"
    ],
    [
        'id' => 5,
        'title' => "Audemars Piguet Royal Oak",
        'price' => 89.99,
        'description' => "Montre de luxe avec un design innovant.",
        'category' => "simple",
        'collection' => "homme",
        'promotion' => true,
        'image' => "http://localhost/image/simpleWatches/5.jpeg",
        'images' => [
            "http://localhost/image/14.jpg",
            "http://localhost/image/15.jpg"
        ],
        'brand' => "Audemars Piguet",
        'model' => "Royal Oak",
        'features' => [
            'Mouvement' => "Automatique",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "41mm",
            'Réserve de marche' => "50 heures",
            'Étanchéité' => "50m"
        ],
        'color' => "Argenté",
        'strap_material' => "Acier inoxydable",
        'availability' => "En stock",
        'added_on' => "2024-12-03"
    ],
    [
        'id' => 6,
        'title' => "Jaeger-LeCoultre Reverso",
        'price' => 199.99,
        'description' => "Montre iconique avec boîtier réversible.",
        'category' => "simple",
        'collection' => "homme",
        'promotion' => true,
        'image' => "http://localhost/image/simpleWatches/6.jpg",
        'images' => [
            "http://localhost/image/17.jpg",
            "http://localhost/image/18.jpg"
        ],
        'brand' => "Jaeger-LeCoultre",
        'model' => "Reverso",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "42mm",
            'Réserve de marche' => "50 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Noir",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-12-02"
    ],
    [
        'id' => 7,
        'title' => "Breitling Navitimer",
        'price' => 220.99,
        'description' => "Montre d'aviation avec un design unique.",
        'category' => "bestwatch",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/bestwatch/1.png",
        'images' => [
            "http://localhost/image/20.jpg",
            "http://localhost/image/21.jpg"
        ],
        'brand' => "Breitling",
        'model' => "Navitimer",
        'features' => [
            'Mouvement' => "Automatique",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "46mm",
            'Réserve de marche' => "70 heures",
            'Étanchéité' => "100m"
        ],
        'color' => "Noir",
        'strap_material' => "Acier inoxydable",
        'availability' => "En stock",
        'added_on' => "2024-12-04"
    ],
    [
        'id' => 8,
        'title' => "Cartier Santos",
        'price' => 149.99,
        'description' => "Montre de luxe au design carré.",
        'category' => "bestwatch",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/bestwatch/2.png",
        'images' => [
            "http://localhost/image/23.jpg",
            "http://localhost/image/24.jpg"
        ],
        'brand' => "Cartier",
        'model' => "Santos",
        'features' => [
            'Mouvement' => "Automatique",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "39mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "100m"
        ],
        'color' => "Argenté",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-25"
    ],
    [
        'id' => 9,
        'title' => "Longines Master Collection",
        'price' => 799.99,
        'description' => "Montre élégante et sophistiquée.",
        'category' => "bestwatch",
        'collection' => "homme",
        'promotion' => false,
        'image' =>  "http://localhost/image/bestwatch/3.png",
        'images' => [
            "http://localhost/image/26.jpg",
            "http://localhost/image/27.jpg"
        ],
        'brand' => "Longines",
        'model' => "Master Collection",
        'features' => [
            'Mouvement' => "Automatique",
            'Matériau du boîtier' => "Acier inoxydable",
            'Diamètre du cadran' => "42mm",
            'Réserve de marche' => "72 heures",
            'Étanchéité' => "50m"
        ],
        'color' => "Argenté",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-18"
    ],
    [
        'id' => 10,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "simple",
        'collection' => "homme",
        'promotion' => false,
        'image' =>  "http://localhost/image/simpleWatches/02.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 11,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "simple",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/simpleWatches/03.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 12,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "simple",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/simpleWatches/04.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 13,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "electronic",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/electronicWatches/1.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 14,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "electronic",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/electronicWatches/2.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 15,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "electronic",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/electronicWatches/2.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 16,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "classique",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/classicWatches/1.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 16,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "classique",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/classicWatches/2.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ],
    [
        'id' => 16,
        'title' => "IWC Schaffhausen Portugieser",
        'price' => 3500,
        'description' => "Montre de luxe avec mouvement mécanique.",
        'category' => "classique",
        'collection' => "homme",
        'promotion' => false,
        'image' => "http://localhost/image/classicWatches/3.png",
        'images' => [
            "http://localhost/image/29.jpg",
            "http://localhost/image/30.jpg"
        ],
        'brand' => "IWC Schaffhausen",
        'model' => "Portugieser",
        'features' => [
            'Mouvement' => "Mécanique",
            'Matériau du boîtier' => "Or rose",
            'Diamètre du cadran' => "40mm",
            'Réserve de marche' => "48 heures",
            'Étanchéité' => "30m"
        ],
        'color' => "Or",
        'strap_material' => "Cuir",
        'availability' => "En stock",
        'added_on' => "2024-11-20"
    ]

];

// Fonction pour récupérer tous les produits
function getProducts() {
    global $products;
    echo json_encode($products);
}

// Fonction pour récupérer un produit par ID
function getProductById($id) {
    global $products;
    foreach ($products as $product) {
        if ($product['id'] == $id) {
            echo json_encode($product);
            return;
        }
    }
    echo json_encode(["error" => "Produit non trouvé"]);
}

// Si un ID de produit est fourni dans l'URL, on le recherche
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    getProductById($id);
} else {
    // Sinon, on retourne tous les produits
    getProducts();
}
?>
