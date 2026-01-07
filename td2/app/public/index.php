<?php

require_once __DIR__ . '/../src/db.php';
/* exercice 2  */

/*question 1 */
echo "<h2>Question 1 :</h2>";

$produits = $db->produits->find(
    [],
    [
        'projection' => [
            '_id' => 0,
            'numero' => 1,
            'categorie' => 1,
            'libelle' => 1
        ]
    ]
);
foreach ($produits as $produit) {
    echo "Numero : " . $produit['numero'] . "<br>";
    echo "Categorie : " . $produit['categorie'] . "<br>";
    echo "Libelle : " . $produit['libelle'] . "<br>";
    echo "<hr>";
}

/*question 2 */
echo "<h2>Question 2 :</h2>";

$produit = $db->produits->findOne(
    ['numero' => 6],
    [
        'projection' => [
            '_id' => 0,
            'libelle' => 1,
            'categorie' => 1,
            'description' => 1,
            'tarifs' => 1
        ]
    ]
);

if ($produit) {
    echo "Libellé : " . $produit['libelle'] . "<br>";
    echo "Catégorie : " . $produit['categorie'] . "<br>";
    echo "Description : " . $produit['description'] . "<br>";

    echo "Tarifs :<br>";
    foreach ($produit['tarifs'] as $tarif) {
        echo "- Taille : " . $tarif['taille'] . 
             " | Tarif : " . $tarif['tarif'] . " €<br>";
    }
} else {
    echo "Produit numéro 6 introuvable.";
}


/*question 3 */
echo "<h2>Question 3 :</h2>";

$produits = $db->produits->find(
    [
        'tarifs' => [
            '$elemMatch' => [
                'taille' => 'normale',
                'tarif'  => ['$lte' => 3.0]
            ]
        ]
    ],
    [
        'projection' => [
            '_id' => 0,
            'numero' => 1,
            'libelle' => 1,
            'categorie' => 1,
            'tarifs' => 1
        ]
    ]
);

foreach ($produits as $produit) {
    echo "Numero : " . $produit['numero'] . "<br>";
    echo "Libellé : " . $produit['libelle'] . "<br>";
    echo "Catégorie : " . $produit['categorie'] . "<br>";

    foreach ($produit['tarifs'] as $tarif) {
        if ($tarif['taille'] === 'normale') {
            echo "Tarif normal : " . $tarif['tarif'] . " €<br>";
        }
    }
    echo "<hr>";
}

/*question 4 */
echo "<h2>Question 4 :</h2>";

$produits = $db->produits->find(
    ['recettes' => ['$size' => 4]],
    ['projection' => ['_id' => 0, 'numero' => 1, 'categorie' => 1, 'libelle' => 1]]
);

foreach ($produits as $p) {
    echo "Numero : {$p['numero']}<br>";
    echo "Categorie : {$p['categorie']}<br>";
    echo "Libelle : {$p['libelle']}<br>";
    echo "<hr>";
}

/*question 5 */
echo "<h2>Question 5 :</h2>";

/* 1. Récupération du produit n°6 */
$produit = $db->produits->findOne(
    ['numero' => 6],
    [
        'projection' => [
            '_id' => 0,
            'numero' => 1,
            'libelle' => 1,
            'categorie' => 1,
            'description' => 1
        ]
    ]
);

if (!$produit) {
    echo "Produit n°6 introuvable.";
    return;
}

/* Affichage du produit */
echo "Produit :<br>";
echo "Numero : " . $produit['numero'] . "<br>";
echo "Libellé : " . $produit['libelle'] . "<br>";
echo "Catégorie : " . $produit['categorie'] . "<br>";
echo "Description : " . $produit['description'] . "<br><br>";

/* 2. Récupération des recettes associées */
$recettes = $db->recettes->find(
    [
        'produits' => [
            '$elemMatch' => ['numero' => 6]
        ]
    ],
    [
        'projection' => [
            '_id' => 0,
            'nom' => 1,
            'difficulte' => 1
        ]
    ]
);

/* Affichage des recettes */
echo "Recettes associées :<br>";

$trouve = false;
foreach ($recettes as $recette) {
    $trouve = true;
    echo "- " . $recette['nom'] . 
         " (difficulté : " . $recette['difficulte'] . ")<br>";
}

if (!$trouve) {
    echo "Aucune recette associée à ce produit.";
}

/*question 6 */
echo "<h2>Question 6 :</h2>";

function getProduitByNumeroEtTaille($db, $numero, $taille) {
    $p = $db->produits->findOne(['numero'=>$numero]);
    foreach ($p['tarifs'] as $t) {
        if ($t['taille'] == $taille) {
            return [
                'numero'=>$p['numero'],
                'libelle'=>$p['libelle'],
                'categorie'=>$p['categorie'],
                'taille'=>$taille,
                'tarif'=>$t['tarif']
            ];
        }
    }
}
echo json_encode(getProduitByNumeroEtTaille($db, 6, 'normale'));