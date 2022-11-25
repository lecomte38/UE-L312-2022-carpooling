<?php

namespace App\Controllers;

use App\Services\CarpoolAdsService;

class CarpoolAdsController
{
    /**
     * Return the html for the create action.
     */
    public function createCarpoolAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['name']) &&
            isset($_POST['idCar']) &&
            isset($_POST['idAdvertiser']) &&
            isset($_POST['departurePlace']) &&
            isset($_POST['arrivalPlace'])) {
            // Create the carpool ad :
            $carpoolAdsService = new CarpoolAdsService();
            $isOk = $carpoolAdsService->setCarpoolAd(
                null,
                $_POST['name'],
                $_POST['idCar'],
                $_POST['idAdvertiser'],
                $_POST['departurePlace'],
                $_POST['arrivalPlace']
            );
            if ($isOk) {
                $html = 'Annonce de covoiturage créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'annonce de covoiturage.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getCarpoolAds(): string
    {
        $headerTab = '<table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre de l\'annonce</th>
                                <th>Voiture</th>
                                <th>Annonceur</th>
                                <th>Lieu de départ</th>
                                <th>Lieu d\'arrivé</th>
                            </tr>
                        </thead>
                        <tbody>';
        $bodyTab = '';
        $footerTab = '  <tbody>
                      </table>';

        // Get all carpool ads :
        $carpoolAdsService = new CarpoolAdsService();
        $carpoolAds = $carpoolAdsService->getCarpoolAds();

        // Get html :
        foreach ($carpoolAds as $carpoolAd) {

            // HTML of carpool ad car
            $carHtml = '';
            if (!empty($carpoolAd->getCar())) {
                foreach ($carpoolAd->getCar() as $car) {
                    $carHtml .= $car->getBrand() . ' ' . $car->getModel();
                }
            }

            // HTML of carpool ad advertiser
            $advertiserHtml = '';
            if (!empty($carpoolAd->getAdvertiser())) {
                foreach ($carpoolAd->getAdvertiser() as $advertiser) {
                    $advertiserHtml .= $advertiser->getFirstname() . ' ' . $advertiser->getLastname();
                }
            }

            $bodyTab .=
                '<tr><td>#' . $carpoolAd->getId() . '</td>' .
                '<td>' . $carpoolAd->getName() . ' ' .
                '<td>' . $carHtml . '</td>' .
                '<td>' . $advertiserHtml . '</td>' .
                '<td>' . $carpoolAd->getDeparturePlace() . '</td>' .
                '<td>' . $carpoolAd->getArrivalPlace() . '</td></tr>';
        }

        $html = $headerTab . $bodyTab . $footerTab;

        return $html;
    }

    /**
     * Update the carpool ad.
     */
    public function updateCarpoolAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['name']) &&
            isset($_POST['idCar']) &&
            isset($_POST['idAdvertiser']) &&
            isset($_POST['departurePlace']) &&
            isset($_POST['arrivalPlace'])) {
            // Update the carpool ad :
            $carpoolAdsService = new CarpoolAdsService();
            $isOk = $carpoolAdsService->setCarpoolAd(
                $_POST['id'],
                $_POST['name'],
                $_POST['idCar'],
                $_POST['idAdvertiser'],
                $_POST['departurePlace'],
                $_POST['arrivalPlace']
            );
            if ($isOk) {
                $html = 'Annonce de covoiturage mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'annonce de covoiturage.';
            }
        }

        return $html;
    }

    /**
     * Delete an carpool ad.
     */
    public function deleteCarpoolAd(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the carpool ad :
            $carpoolAdsService = new CarpoolAdsService();
            $isOk = $carpoolAdsService->deleteCarpoolAd($_POST['id']);
            if ($isOk) {
                $html = 'Annonce de covoiturage supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'annonce de covoiturage.';
            }
        }

        return $html;
    }

    /**
     * Return the carpool ads list html for form.
     */
    public function getCarpoolAdsList(): string
    {
        $html = '';

        // Get all carpool ads :
        $carpoolAdsService = new CarpoolAdsService();
        $carpoolAds = $carpoolAdsService->getCarpoolAds();

        // Get html :
        foreach ($carpoolAds as $carpoolAd) {
            $html .= '<option value="' . $carpoolAd->getId() . '">#' . $carpoolAd->getId() . ' - ' . $carpoolAd->getName() . '</option>';
        }

        return $html;
    }
}
