<?php

namespace toubeelib\praticien\application\interface;

use toubeelib\praticien\application\domain\Praticien;

interface PraticienRepositoryInterface
{

    public function findBySpecialiteLibelle(string $libelle): array;

    public function findBySpecialiteAndMoyenPaiement(string $libelleSpecialite, string $libelleMoyenPaiement): array;
}
