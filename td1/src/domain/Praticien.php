<?php

namespace toubeelib\praticien\domain;

class Praticien
{
    private string $id;
    private string $nom;
    private string $prenom;
    private string $ville;
    private string $email;
    private string $telephone;
    private int $specialite_id;
    private string $structure_id;

    public function __construct(string $id, string $nom, string $prenom, string $ville, string $email, string $telephone, int $specialite_id, string $structure_id)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->specialite_id = $specialite_id;
        $this->structure_id = $structure_id;
    }
	

    public function getId(): string
    {
        return $this->id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getVille(): string
    {
        return $this->ville;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function getSpecialiteId(): int {
        return $this->specialite_id;
    }

    public function getStructureId(): string {
        return $this->structure_id;
    }


    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }


}