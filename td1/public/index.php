<?php

use toubeelib\praticien\domain\Specialite;
use toubeelib\praticien\domain\Praticien;
use toubeelib\praticien\domain\Structure;


require __DIR__ . '/../src/infra/EntityManager.php';

$repoSpecialite = $entityManager->getRepository(Specialite::class);
$repoPraticien = $entityManager->getRepository(Praticien::class);
$repoStructure = $entityManager->getRepository(Structure::class);


echo "Exercice 1 <br>";
echo "<br> 1) <br>";
$specialite = $repoSpecialite->find(1);
if ($specialite) {
    echo "ID : " . $specialite->getId() . "<br>";
    echo "Libellé : " . $specialite->getLibelle() . "<br>";
    echo "Description : " . $specialite->getDescription() . "<br>";
} else {
    echo "Aucune spécialité trouvée";
}

echo "<br> 2) <br>";
$praticien = $repoPraticien->find("8ae1400f-d46d-3b50-b356-269f776be532");


if($praticien) {
    echo "ID : " . $praticien->getId() . "<br>";
    echo "Nom : " . $praticien->getNom() . "<br>";
    echo "Prenom : " . $praticien->getPrenom() . "<br>";
    echo "Ville : " . $praticien->getVille() . "<br>";
    echo "email : " . $praticien->getEmail() . "<br>";
    echo "telephone : " . $praticien->getTelephone() . "<br>";
} else {
    echo "praticien avec id 8ae1400f-d46d-3b50-b356-269f776be532 pas trouvé";
}

echo "<br> 3) <br>";
$specialiteDuPraticien = $repoSpecialite->find($praticien->getSpecialiteId());

echo "Spécialité : " . $specialiteDuPraticien->getLibelle() . "<br>";

$structureq3 = $repoStructure->find($praticien->getStructureId());

echo "Structure : " . $structureq3->getNom() . "<br>";
echo "Adresse : " . $structureq3->getAdresse() . "<br>";
echo "Ville : " . $structureq3->getVille() . "<br>";
echo "Code postal : " . $structureq3->getCodePostal() . "<br>";
echo "Téléphone : " . $structureq3->getTelephone() . "<br>";


echo "<br> 4) <br>";

$structureq4 = $repoStructure->find("3444bdd2-8783-3aed-9a5e-4d298d2a2d7c");

echo "<b>Structure :</b><br>";
echo "Nom : " . $structureq4->getNom() . "<br>";
echo "Adresse : " . $structureq4->getAdresse() . "<br>";
echo "Ville : " . $structureq4->getVille() . "<br>";
echo "Téléphone : " . $structureq4->getTelephone() . "<br><br>";

$praticiens = $repoPraticien->findBy([
    "structure_id" => "3444bdd2-8783-3aed-9a5e-4d298d2a2d7c"
]);

echo "<b>Praticiens de cette structure :</b><br>";

if ($praticiens) {
    foreach ($praticiens as $p) {
        echo "- " . $p->getNom() . " " . $p->getPrenom() . "<br>";
    }
} else {
    echo "Aucun praticien";
}