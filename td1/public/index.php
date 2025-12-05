<?php

use toubeelib\praticien\domain\Specialite;
use toubeelib\praticien\domain\Praticien;
use toubeelib\praticien\domain\Structure;
use toubeelib\praticien\domain\MotifVisite;
use Ramsey\Uuid\Uuid;


require __DIR__ . '/../src/infra/EntityManager.php';

$repoSpecialite = $entityManager->getRepository(Specialite::class);
$repoPraticien = $entityManager->getRepository(Praticien::class);
$repoStructure = $entityManager->getRepository(Structure::class);
$repoMotif = $entityManager->getRepository(MotifVisite::class);


echo "Exercice 1 <br>";

//---------------------------------------------------question 1----------------------------------------------------------------
echo "<br> 1) <br>";
$specialite = $repoSpecialite->find(1);
if ($specialite) {
    echo "ID : " . $specialite->getId() . "<br>";
    echo "Libellé : " . $specialite->getLibelle() . "<br>";
    echo "Description : " . $specialite->getDescription() . "<br>";
} else {
    echo "Aucune spécialité trouvée";
}


//---------------------------------------------------question 2----------------------------------------------------------------
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

//---------------------------------------------------question 3----------------------------------------------------------------

echo "<br> 3) <br>";
$specialiteDuPraticien = $repoSpecialite->find($praticien->getSpecialiteId());

echo "Spécialité : " . $specialiteDuPraticien->getLibelle() . "<br>";

$structureq3 = $repoStructure->find($praticien->getStructureId());

echo "Structure : " . $structureq3->getNom() . "<br>";
echo "Adresse : " . $structureq3->getAdresse() . "<br>";
echo "Ville : " . $structureq3->getVille() . "<br>";
echo "Code postal : " . $structureq3->getCodePostal() . "<br>";
echo "Téléphone : " . $structureq3->getTelephone() . "<br>";


//---------------------------------------------------question 4----------------------------------------------------------------

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

//---------------------------------------------------question 5----------------------------------------------------------------

echo "<br> 5) <br>";
$specialite5 = $repoSpecialite->find(1);

echo "<b>Spécialité d'ID 1 : </b>" . $specialite5->getLibelle() . "<br>";

$motifs = $repoMotif->findBy([
    "specialiteId" => 1
]);

foreach ($motifs as $motif) {
    echo "- " . $motif->getLibelle() . "<br>";
}

//---------------------------------------------------question 6----------------------------------------------------------------
echo "<br> 6) <br>";

$praticien6 = $repoPraticien->find("8ae1400f-d46d-3b50-b356-269f776be532");
echo "<b>Motifs de visite du praticien " . $praticien6->getNom() . " " . $praticien6->getPrenom() . " :</b><br>";

$specialiteId = $praticien6->getSpecialiteId();
$motifsPraticien = $repoMotif->findBy([
    "specialiteId" => $specialiteId
]);

foreach ($motifsPraticien as $motif) {
    echo "- " . $motif->getLibelle() . "<br>";
}

//---------------------------------------------------question 7----------------------------------------------------------------
echo "<br> 7) <br>";

$specialitePediatrie = $repoSpecialite->find(3);
$UuidPraticien = Uuid::uuid4()->toString();

$newPraticien = new Praticien();
$newPraticien->setId($UuidPraticien); 
$newPraticien->setNom("Dupont");
$newPraticien->setPrenom("Marie");
$newPraticien->setVille("Marseille");
$newPraticien->setEmail("marie.dupont@example.com");
$newPraticien->setTelephone("0102030405");


$newPraticien->setSpecialiteId($specialitePediatrie->getId());

$entityManager->persist($newPraticien);
$entityManager->flush();

echo "Praticien enregistré avec ID : " . $newPraticien->getId() ."<br>";
echo "Nom : " . $newPraticien->getNom() . "<br>";
echo "Prenom : " . $newPraticien->getPrenom() . "<br>";
echo "Ville : " . $newPraticien->getVille() . "<br>";
echo "email : " . $newPraticien->getEmail() . "<br>";
echo "telephone : " . $newPraticien->getTelephone() . "<br>";


//---------------------------------------------------question 8----------------------------------------------------------------
echo "<br> 8) <br>";
$newPraticien->setVille("Paris");

$newPraticien->setStructureId("3444bdd2-8783-3aed-9a5e-4d298d2a2d7c");

$specialiteIdq8 = $newPraticien->getSpecialiteId();

//récupère le dernier id de la table pour mettre un id unique aux motifs visites
$conn = $entityManager->getConnection();
$lastId = $conn->executeQuery("SELECT MAX(id) FROM motif_visite")->fetchOne();
if ($lastId === null) {
    $lastId = 0;
}

$motif1 = new MotifVisite();
$motif1->setId($lastId + 1);
$motif1->setLibelle("Consultation enfant");
$motif1->setSpecialiteId($specialiteIdq8);
$entityManager->persist($motif1);

$motif2 = new MotifVisite();
$motif2->setId($lastId + 2);
$motif2->setLibelle("Suivi vaccination pédiatrique");
$motif2->setSpecialiteId($specialiteIdq8);
$entityManager->persist($motif2);

$entityManager->flush();

echo "<b>modification créer : </b> <br>";
echo "Nouvelle ville : " . $newPraticien->getVille() . "<br>";
echo "Structure rattachée : " . $newPraticien->getStructureId() . "<br>";
echo "Spécialité du praticien : " . $newPraticien->getSpecialiteId() . "<br><br>";

echo "<b>Motifs ajoutés :</b><br>";
echo "- Motif 1 : ID = " . $motif1->getId() . " " . $motif1->getLibelle() . "<br>";
echo "- Motif 2 : ID = " . $motif2->getId() . " " . $motif2->getLibelle() . "<br>";


//---------------------------------------------------question 9----------------------------------------------------------------
echo "<br> 9) <br>";

$entityManager->remove($newPraticien);
$entityManager->flush();

echo "Le praticien est supprimer <br>";
