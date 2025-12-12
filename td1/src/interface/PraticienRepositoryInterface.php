<?php

namespace toubeelib\praticien\interface;

use toubeelib\praticien\domain\Praticien;

interface PraticienRepositoryInterface
{

    public function findBySpecialiteLibelle(string $libelle): array;

    public function findBySpecialiteAndMoyenPaiement(string $libelleSpecialite, string $libelleMoyenPaiement): array;
}
