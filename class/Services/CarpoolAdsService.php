<?php

namespace App\Services;

use App\Entities\CarpoolAd;
use DateTime;

class CarpoolAdsService
{
    /**
     * Create or update an carpool ad.
     */
    public function setCarpoolAd(?string $id, string $name, string $car, string $advertiser, string $departurePlace, string $departureDate, string $arrivalPlace): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $departureDateTime = new DateTime($departureDate);
        if (empty($id)) {
            $isOk = $dataBaseService->createCarpoolAd($name, $car, $advertiser, $departurePlace, $departureDateTime, $arrivalPlace);
        } else {
            $isOk = $dataBaseService->updateCarpoolAd($id, $name, $car, $advertiser, $departurePlace, $departureDateTime, $arrivalPlace);
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
                $carpoolAd->setCar($carpoolAdDTO['car']);
                $carpoolAd->setAdvertiser($carpoolAdDTO['advertiser']);
                $carpoolAd->setDeparturePlace($carpoolAdDTO['departurePlace']);
                $date = new DateTime($carpoolAdDTO['departureDate']);
                $carpoolAd->setArrivalPlace($carpoolAdDTO['arrivalPlace']);
                if ($date !== false) {
                    $carpoolAd->setDepartureDate($date);
                }
                $carpoolAds[] = $carpoolAd;
            }
        }

        return $carpoolAds;
    }

    /**
     * Delete an carpool ad.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }
}
