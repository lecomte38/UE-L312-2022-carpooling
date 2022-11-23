<?php

namespace App\Services;

use App\Entities\CarpoolAd;

class CarpoolAdsService
{
    /**
     * Create or update an carpool ad.
     */
    public function setCarpoolAd(?string $id, string $name, string $idCar, string $idAdvertiser, string $departurePlace, string $arrivalPlace): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createCarpoolAd($name, $idCar, $idAdvertiser, $departurePlace, $arrivalPlace);
        } else {
            $isOk = $dataBaseService->updateCarpoolAd($id, $name, $idCar, $idAdvertiser, $departurePlace, $arrivalPlace);
        }

        return $isOk;
    }

    /**
     * Return all carpool ads.
     */
    public function getCarpoolAds(): array
    {
        $carpoolAds = [];

        $dataBaseService = new DataBaseService();
        $carpoolAdsDTO = $dataBaseService->getCarpoolAds();
        if (!empty($carpoolAdsDTO)) {
            foreach ($carpoolAdsDTO as $carpoolAdDTO) {
                $carpoolAd = new CarpoolAd();
                $carpoolAd->setId($carpoolAdDTO['id']);
                $carpoolAd->setName($carpoolAdDTO['name']);
                $carpoolAd->setIdCar($carpoolAdDTO['idCar']);
                $carpoolAd->setIdAdvertiser($carpoolAdDTO['idAdvertiser']);
                $carpoolAd->setDeparturePlace($carpoolAdDTO['departurePlace']);
                $carpoolAd->setArrivalPlace($carpoolAdDTO['arrivalPlace']);
                $carpoolAds[] = $carpoolAd;
            }
        }

        return $carpoolAds;
    }

    /**
     * Delete an carpool ad.
     */
    public function deleteCarpoolAd(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteCarpoolAd($id);

        return $isOk;
    }
}
