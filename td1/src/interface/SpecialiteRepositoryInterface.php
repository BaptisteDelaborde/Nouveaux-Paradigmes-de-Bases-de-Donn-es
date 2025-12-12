<?php

namespace toubeelib\praticien\interface;

use toubeelib\praticien\domain\Specialite;

interface SpecialiteRepositoryInterface
{
    /**
     * @return Specialite[]
     */
    public function findByMotCle(string $motCle): array;
}
