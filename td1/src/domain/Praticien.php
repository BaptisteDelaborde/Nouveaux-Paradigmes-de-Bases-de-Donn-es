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

    public function __construct()
    {
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

    public function setId(string $id): void {$this->id = $id;}

	public function setNom(string $nom): void {$this->nom = $nom;}

	public function setPrenom(string $prenom): void {$this->prenom = $prenom;}

	public function setVille(string $ville): void {$this->ville = $ville;}

	public function setEmail(string $email): void {$this->email = $email;}

	public function setTelephone(string $telephone): void {$this->telephone = $telephone;}

	public function setSpecialiteId(int $specialite_id): void {$this->specialite_id = $specialite_id;}

	public function setStructureId(string $structure_id): void {$this->structure_id = $structure_id;}

	
}