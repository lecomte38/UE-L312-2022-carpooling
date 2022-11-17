<?php

namespace App\Entities;

// Declaration of class Car
class Car
{
    // Declaration the variables
    private $id;
    private $model;
    private $nbSeat;
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