<?php

namespace App\Entities;

// Declaration of CarpoolAd class
class CarpoolAd
{
    // Declaring the variables
    private $id;
    private $name;
    private $idCar;
    private $brandCar;
    private $modelCar;
    private $idAdvertiser;
    private $firstnameAdvertiser;
    private $lastnameAdvertiser;
    private $departurePlace;
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

    // Getter of id brand car
    public function getBrandCar(): string
    {
        return $this->brandCar;
    }

    // Setter of id brand car
    public function setBrandCar(string $brandCar): void
    {
        $this->brandCar = $brandCar;
    }

    // Getter of id model car
    public function getModelCar(): string
    {
        return $this->modelCar;
    }

    // Setter of id model car
    public function setModelCar(string $modelCar): void
    {
        $this->modelCar = $modelCar;
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

    // Getter of firstname Advertiser
    public function getFirstnameAdvertiser(): string
    {
        return $this->firstnameAdvertiser;
    }

    // Setter of firstname Advertiser
    public function setFirstnameAdvertiser(string $firstnameAdvertiser): void
    {
        $this->firstnameAdvertiser = $firstnameAdvertiser;
    }

    // Getter of lastname Advertiser
    public function getLastnameAdvertiser(): string
    {
        return $this->lastnameAdvertiser;
    }

    // Setter of lastname Advertiser
    public function setLastnameAdvertiser(string $lastnameAdvertiser): void
    {
        $this->lastnameAdvertiser = $lastnameAdvertiser;
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
}
