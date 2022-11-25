<?php

namespace App\Controllers;

use App\Services\CarsService;

class CarsController
{
    /**
     * Return the html for the create action.
     */
    public function createCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['nbSeat']) &&
            isset($_POST['idOwner'])) {
            // Create the user :
            $CarsService = new CarsService();
            $isOk = $CarsService->setCar(
                null,
                strtoupper($_POST['brand']),
                $_POST['model'],
                $_POST['nbSeat'],
                $_POST['idOwner']
            );
            if ($isOk) {
                $html = 'Voiture créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCars(): string
    {
        $headerTab = '<table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Marque</th>
                                <th>Modèle</th>
                                <th>Nombre de place</th>
                                <th>Propriétaire</th>
                            </tr>
                        </thead>
                        <tbody>';
        $bodyTab = '';
        $footerTab = '  <tbody>
                      </table>';

        // Get all cars :
        $CarsService = new CarsService();
        $cars = $CarsService->getCars();

        // Get html :
        foreach ($cars as $car) {

            // HTML of carpool ad car
            $ownerHtml = '';
            if (!empty($car->getOwner())) {
                foreach ($car->getOwner() as $owner) {
                    $ownerHtml .= $owner->getFirstname() . ' ' . $owner->getLastname();
                }
            }

            $bodyTab .=
                '<tr><td>#' . $car->getId() . '</td>' .
                '<td>' . $car->getBrand() . '</td>' .
                '<td>' . $car->getModel() . '</td>' .
                '<td>' . $car->getNbSeat() . '</td>' . 
                '<td>' . $ownerHtml .'</td></tr>';
        }

        $html = $headerTab . $bodyTab . $footerTab;

        return $html;
    }

    /**
     * Update the car.
     */
    public function updateCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['brand']) &&
            isset($_POST['model']) &&
            isset($_POST['nbSeat']) &&
            isset($_POST['idOwner'])) {
            // Update the car :
            $carsService = new CarsService();
            $isOk = $carsService->setCar(
                $_POST['id'],
                strtoupper($_POST['brand']),
                $_POST['model'],
                $_POST['nbSeat'],
                $_POST['idOwner']
            );
            if ($isOk) {
                $html = 'Voiture mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Delete an car.
     */
    public function deleteCar(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the car :
            $carsService = new CarsService();
            $isOk = $carsService->deleteCar($_POST['id']);
            if ($isOk) {
                $html = 'Voiture supprimée avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la voiture.';
            }
        }

        return $html;
    }

    /**
     * Return the cars list html for form.
     */
    public function getCarsList(): string
    {
        $html = '';

        // Get all cars :
        $carsService = new CarsService();
        $cars = $carsService->getCars();

        // Get html :
        foreach ($cars as $car) {
            $html .= '<option value="' . $car->getId() . '">#' . $car->getId() . ' - ' . $car->getBrand() . ' ' . $car->getModel() . '</option>';
        }

        return $html;
    }
}