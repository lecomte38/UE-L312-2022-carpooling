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
        $html = '';

        // Get all carpool ads :
        $carpoolAdsService = new CarpoolAdsService();
        $carpoolAds = $carpoolAdsService->getCarpoolAds();

        // Get html :
        foreach ($carpoolAds as $carpoolAd) {
            $html .=
                '#' . $carpoolAd->getId() . ' ' .
                $carpoolAd->getName() . ' ' .
                $carpoolAd->getIdCar() . ' ' .
                $carpoolAd->getIdAdvertiser() . ' ' .
                $carpoolAd->getDeparturePlace() . ' ' .
                $carpoolAd->getArrivalPlace() . ' ' . '<br />';
        }

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
}
