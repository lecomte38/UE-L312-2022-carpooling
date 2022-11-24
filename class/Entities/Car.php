<?php

namespace App\Entities;

// Declaration of class Car
class Car
{
    // Declaration the variables
    private $id;
    private $brand;
    private $model;
    private $nbSeat;
    private $idOwner;
    private $owner;

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

    // Getter of brand
    public function getBrand(): string
    {
        return $this->brand;
    }

    // Setter of brand
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    // Getter of model
    public function getModel(): string
    {
        return $this->model;
    }

    // Setter of model
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    // Getter of nbSeat
    public function getNbSeat(): int
    {
        return $this->nbSeat;
    }

    // Setter of nbSeat
    public function setNbSeat($nbSeat): void
    {
        $this->nbSeat = $nbSeat;
    }

    // Getter of idOwner
    public function getIdOwner(): string
    {
        return $this->idOwner;
    }

    // Setter of idOwner
    public function setIdOwner(string $idOwner): void
    {
        $this->idOwner = $idOwner;
    }

    // Getter of owner
    public function getOwner(): string
    {
        return $this->owner;
    }

    // Setter of owner
    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }
}