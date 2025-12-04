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

$structure = $repoStructure->find($praticien->getStructureId());

echo "Structure : " . $structure->getNom() . "<br>";
echo "Adresse : " . $structure->getAdresse() . "<br>";
echo "Ville : " . $structure->getVille() . "<br>";
echo "Code postal : " . $structure->getCodePostal() . "<br>";
echo "Téléphone : " . $structure->getTelephone() . "<br>";

echo "<br> 4) <br>";
