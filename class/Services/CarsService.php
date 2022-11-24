<?php

namespace App\Services;

use App\Entities\Car;
use App\Entities\User;

class CarsService
{
    /**
     * Create or update a car.
     */
    public function setCar(?string $id, string $brand, string $model, int $nbSeat, string $idOwner): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($brand, $model, $nbSeat, $idOwner);
        } else {
            $isOk = $dataBaseService->updateCar($id, $brand, $model, $nbSeat, $idOwner);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setBrand($carDTO['brand']);
                $car->setModel($carDTO['model']);
                $car->setNbSeat($carDTO['nbSeat']);
                $car->setIdOwner($carDTO['idOwner']);

                // Get owner of this car :
                $owner = $this->getCarOwner($carDTO['idOwner']);
                $car->setOwner($owner);
                

                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }

    /**
     * Get carpool ad car of given car id.
     */
    public function getCarOwner(string $ownerId): array
    {
        $carOwner = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $carsOwnerDTO = $dataBaseService->getCarOwner($ownerId);
        if (!empty($carsOwnerDTO)) {
            foreach ($carsOwnerDTO as $carOwnerDTO) {
                $owner = new User();
                $owner->setId($carOwnerDTO['id']);
                $owner->setFirstname($carOwnerDTO['firstname']);
                $owner->setLastname($carOwnerDTO['lastname']);
                $carOwner[] = $owner;
            }
        }

        return $carOwner;
    }