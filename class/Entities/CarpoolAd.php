<?php

namespace App\Entities;

use DateTime;

// Declaration of CarpoolAd class
class CarpoolAd
{
    // Declaring the variables
    private $id;
    private $name;
    private $car;
    private $advertiser;
    private $departurePlace;
    private $departureDate;
    private $arrivalPlace;

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

    // Getter of name
    public function getName(): string
    {
        return $this->name;
    }

    // Setter of name
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Getter of car
    public function getCar(): string
    {
        return $this->car;
    }

    // Setter of car
    public function setCar(string $car): void
    {
        $this->car = $car;
    }

    // Getter of advertiser
    public function getAdvertiser(): string
    {
        return $this->advertiser;
    }

    // Setter of advertiser
    public function setAdvertiser(string $advertiser): void
    {
        $this->advertiser = $advertiser;
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

    // Getter of departure date
    public function getDepartureDate(): DateTime
    {
        return $this->departureDate;
    }

    // Setter of departure date
    public function setDepartureDate(DateTime $departureDate): void
    {
        $this->departureDate = $departureDate;
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
}
