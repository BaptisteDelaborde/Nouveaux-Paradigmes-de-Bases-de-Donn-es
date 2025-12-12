<?php

namespace toubeelib\praticien\infra\repository;

use Doctrine\ORM\EntityRepository;
use toubeelib\praticien\interface\PraticienRepositoryInterface;

class PraticienRepository extends EntityRepository implements PraticienRepositoryInterface
{
    public function findBySpecialiteLibelle(string $libelle): array
    {
        return $this->createQueryBuilder('p')
            ->join(
                'toubeelib\praticien\domain\Specialite',
                's',
                'WITH',
                'p.specialite_id = s.id'
            )
            ->where('s.libelle = :libelle')
            ->setParameter('libelle', $libelle)
            ->orderBy('p.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findBySpecialiteAndMoyenPaiement(string $libelleSpecialite, string $libelleMoyenPaiement): array {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT DISTINCT p
                FROM toubeelib\praticien\domain\Praticien p
                JOIN toubeelib\praticien\domain\Specialite s
                WITH p.specialite_id = s.id
                JOIN toubeelib\praticien\domain\Structure st
                WITH p.structure_id = st.id
                JOIN toubeelib\praticien\domain\StructureMoyenPaiement smp
                WITH smp.structure_id = st.id
                JOIN toubeelib\praticien\domain\MoyenPaiement mp
                WITH smp.moyen_paiement_id = mp.id
                WHERE s.libelle = :specialite
                AND mp.libelle = :moyen'
            )
            ->setParameter('specialite', $libelleSpecialite)
            ->setParameter('moyen', $libelleMoyenPaiement)
            ->getResult();
    }
}
