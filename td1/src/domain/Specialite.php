<?php

namespace toubeelib\praticien\domain;

class Specialite {

    private int $id;
    private string $libelle;
    private ?string $description;

    public function getId(): int { 
        return $this->id; 
    }

    public function getLibelle(): string { 
        return $this->libelle; 
    }

    public function getDescription(): ?string { 
        return $this->description; 
    }

    public function setLibelle(string $libelle): void { 
        $this->libelle = $libelle; 
    }

    public function setDescription(?string $description): void { 
        $this->description = $description; 
    }
}
