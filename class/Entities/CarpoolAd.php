<?php

namespace App\Entities;

// Declaration of CarpoolAd class
class CarpoolAd
{
    // Declaring the variables
    private $id;
    private $name;
    private $idCar;
    private $idAdvertiser;
    private $departurePlace;
    private $arrivalPlace;
    private $car;
    private $advertiser;

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

    // Getter of id name
    public function getName(): string
    {
        return $this->name;
    }

    // Setter of id name
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Getter of id car
    public function getIdCar(): string
    {
        return $this->idCar;
    }

    // Setter of id car
    public function setIdCar(string $idCar): void
    {
        $this->idCar = $idCar;
    }

    // Getter of advertiser
    public function getIdAdvertiser(): string
    {
        return $this->idAdvertiser;
    }

    // Setter of advertiser
    public function setIdAdvertiser(string $idAdvertiser): void
    {
        $this->idAdvertiser = $idAdvertiser;
    }

    // Getter of departure place
    public function getDeparturePlace(): string
    {
        return $this->departurePlace;
    }

    // Setter of departure place
    public function setDeparturePlace(string $departurePlace): void
    {
        $this->departurePlace = $departurePlace;
    }

    // Getter of arrival place
    public function getArrivalPlace(): string
    {
        return $this->arrivalPlace;
    }

    // Setter of arrival place
    public function setArrivalPlace(string $arrivalPlace): void
    {
        $this->arrivalPlace = $arrivalPlace;
    }

    // Getter of carpool ad car
    public function getCar(): ?array
    {
        return $this->car;
    }

    // Setter of carpool ad car
    public function setCar(array $car)
    {
        $this->car = $car;

        return $this;
    }

    // Getter of carpool ad advertiser
    public function getAdvertiser(): ?array
    {
        return $this->advertiser;
    }

    // Setter of carpool ad advertiser
    public function setAdvertiser(array $advertiser)
    {
        $this->advertiser = $advertiser;

        return $this;
    }
}
