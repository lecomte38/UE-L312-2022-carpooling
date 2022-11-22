<?php

namespace App\Entities;

// Declaration of Reservation class
class Reservation
{
    // Declaring the variables
    private $id;
    private $idCarpoolAd;
    private $idClient; 

    // Getter of id
    public function getId(): string
    {
        return $this->id;
    }

    // Setter of id
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    // Getter of carpool ad id
    public function getIdCarpoolAd(): string
    {
        return $this->idCarpoolAd;
    }

    // Setter of carpool ad id
    public function setIdCarpoolAd(string $idCarpoolAd): void
    {
        $this->idCarpoolAd = $idCarpoolAd;
    }

    // Getter of user lastname
    public function getIdClient(): string
    {
        return $this->idClient;
    }

    // Setter of user lastname
    public function setIdClient(string $idClient): void
    {
        $this->idClient = $idClient;
    }
}
