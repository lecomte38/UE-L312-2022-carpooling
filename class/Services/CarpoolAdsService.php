<?php

namespace App\Services;

use App\Entities\Car;
use App\Entities\User;
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

                // Get car of this carpool ad :
                $car = $this->getCarpoolAdCar($carpoolAdDTO['idCar']);
                $carpoolAd->setCar($car);

                // Get advertiser of this carpool ad :
                $advertiser = $this->getCarpoolAdAdvertiser($carpoolAdDTO['idAdvertiser']);
                $carpoolAd->setAdvertiser($advertiser);

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

    /**
     * Get carpool ad car of given car id.
     */
    public function getCarpoolAdCar(string $carId): array
    {
        $carpoolAdCar = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $carpoolAdsCarDTO = $dataBaseService->getCarpoolAdCar($carId);
        if (!empty($carpoolAdsCarDTO)) {
            foreach ($carpoolAdsCarDTO as $carpoolAdCarDTO) {
                $car = new Car();
                $car->setId($carpoolAdCarDTO['id']);
                $car->setBrand($carpoolAdCarDTO['brand']);
                $car->setModel($carpoolAdCarDTO['model']);
                $car->setNbSeat($carpoolAdCarDTO['nbSeat']);
                $car->setIdOwner($carpoolAdCarDTO['idOwner']);
                $carpoolAdCar[] = $car;
            }
        }

        return $carpoolAdCar;
    }

    /**
     * Get advertiser of given advertiser id.
     */
    public function getCarpoolAdAdvertiser(string $advertiserId): array
    {
        $carpoolAdAdvertiser = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $carpoolAdsAdvertiserDTO = $dataBaseService->getCarpoolAdAdvertiser($advertiserId);
        if (!empty($carpoolAdsAdvertiserDTO)) {
            foreach ($carpoolAdsAdvertiserDTO as $carpoolAdAdvertiserDTO) {
                $advertiser = new User();
                $advertiser->setId($carpoolAdAdvertiserDTO['id']);
                $advertiser->setFirstname($carpoolAdAdvertiserDTO['firstname']);
                $advertiser->setLastname($carpoolAdAdvertiserDTO['lastname']);
                $carpoolAdAdvertiser[] = $advertiser;
            }
        }

        return $carpoolAdAdvertiser;
    }
}
