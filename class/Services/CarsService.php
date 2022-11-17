<?php

namespace App\Services;

use App\Entities\Car;

class CarsService
{
    /**
     * Create or update an car.
     */
    public function setCar(?string $id, string $model, int $nbSeat, string $owner): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCar($model, $nbSeat, $owner);
        } else {
            $isOk = $dataBaseService->updateCar($id, $model, $nbSeat, $owner);
        }

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $carsDTO = $dataBaseService->getCars();
        if (!empty($carsDTO)) {
            foreach ($carsDTO as $carDTO) {
                $car = new Car();
                $car->setId($carDTO['id']);
                $car->setModel($carDTO['model']);
                $car->setNbSeat($carDTO['nbSeat']);
                $car->setOwner($carDTO['owner']);
                $cars[] = $car;
            }
        }

        return $cars;
    }

    /**
     * Delete an car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCar($id);

        return $isOk;
    }
}