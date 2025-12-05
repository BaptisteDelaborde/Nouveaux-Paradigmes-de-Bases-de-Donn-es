<?php

namespace toubeelib\praticien\domain;

class MotifVisite {

    private int $id;
    private int $specialiteId;
    private string $libelle;

    public function __construct(){
    }

    public function getId(): int {return $this->id;}

	public function getSpecialiteId(): int {return $this->specialiteId;}

	public function getLibelle(): string {return $this->libelle;}

	public function setId(int $id): void {$this->id = $id;}

	public function setSpecialiteId(int $specialiteId): void {$this->specialiteId = $specialiteId;}

	public function setLibelle(string $libelle): void {$this->libelle = $libelle;}

	
}