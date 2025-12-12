<?php

namespace toubeelib\praticien\infra\repository;

use Doctrine\ORM\EntityRepository;
use toubeelib\praticien\interface\SpecialiteRepositoryInterface;

class SpecialiteRepository extends EntityRepository implements SpecialiteRepositoryInterface
{
    public function findByMotCle(string $motCle): array
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s
                 FROM toubeelib\praticien\domain\Specialite s
                 WHERE s.libelle LIKE :mot
                    OR s.description LIKE :mot'
            )
            ->setParameter('mot', '%' . $motCle . '%')
            ->getResult();
    }
}
