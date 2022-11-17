<?php

namespace App\Entities;

// Declaration of Reservation class
class Reservation
{
    // Declaring the variables
    private $id;
    private $idCarpoolAd;
    private $nameCarpoolAd;
    private $firstnameUser;
    private $lastnameUser;

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

    // Getter of carpool ad name
    public function getNameCarpoolAd(): string
    {
        return $this->nameCarpoolAd;
    }

    // Setter of carpool ad name
    public function setNameCarpoolAd(string $nameCarpoolAd): void
    {
        $this->nameCarpoolAd = $nameCarpoolAd;
    }

    // Getter of user firstname
    public function getFirstnameUser(): string
    {
        return $this->firstnameUser;
    }

    // Setter of user firstname
    public function setFirstnameUser(string $firstnameUser): void
    {
        $this->firstnameUser = $firstnameUser;
    }

    // Getter of user lastname
    public function getLastnameUser(): string
    {
        return $this->lastnameUser;
    }

    // Setter of user lastname
    public function setLastnameUser(string $lastnameUser): void
    {
        $this->lastnameUser = $lastnameUser;
    }
}
