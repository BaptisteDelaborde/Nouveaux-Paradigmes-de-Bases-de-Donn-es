<?php

function getProduitsParCategorie($db, $categorie) {
    return $db->produits->find(['categorie' => $categorie]);
}

function ajouterProduit($db, $data) {
    $db->produits->insertOne([
        'numero' => (int)$data['numero'],
        'libelle' => $data['libelle'],
        'description' => $data['description'],
        'categorie' => $data['categorie'],
        'tarifs' => [
            [
                'taille' => $data['taille'],
                'tarif' => (float)$data['tarif']
            ]
        ]
    ]);
}
