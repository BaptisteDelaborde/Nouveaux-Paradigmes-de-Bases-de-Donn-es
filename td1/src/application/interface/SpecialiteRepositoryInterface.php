<?php

namespace toubeelib\praticien\application\interface;

use toubeelib\praticien\application\domain\Specialite;

interface SpecialiteRepositoryInterface
{
    /**
     * @return Specialite[]
     */
    public function findByMotCle(string $motCle): array;
}
