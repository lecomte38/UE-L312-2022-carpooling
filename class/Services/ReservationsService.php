<?php

namespace App\Services;

use App\Entities\Reservation;
use App\Entities\User;
use App\Entities\CarpoolAd;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $idCarpoolAd, int $idClient): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($idCarpoolAd, $idClient);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $idCarpoolAd, $idClient);
        }

        return $isOk;
    }

    /**
     * Return all reservation.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $dataBaseService = new DataBaseService();
        $reservationsDTO = $dataBaseService->getReservations();
        if (!empty($reservationsDTO)) {
            foreach ($reservationsDTO as $reservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($reservationDTO['id']);
                $reservation->setIdCarpoolAd($reservationDTO['idCarpoolAd']);
                $reservation->setIdClient($reservationDTO['idClient']);
                $reservations[] = $reservation;

                // Get carpoolAdName of this reservation :
                $carpoolAdName = $this->getReservationCarpoolAdName($reservationDTO['idCarpoolAd']);
                $reservation->setCarpoolAdName($carpoolAdName);

                // Get client of this carpool reservation :
                $client = $this->getReservationClient($reservationDTO['idClient']);
                $reservation->setClient($client);

                $reservations[] = $reservation;
            }
        }

        return $reservations;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteReservation($id);

        return $isOk;
    }

    /**
     * Get carpool ad car of given car id.
     */
    public function getReservationCarpoolAdName(string $carId): array
    {
        $reservationCarpoolAdName = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $reservationsCarpoolAdNameDTO = $dataBaseService->getReservationCarpoolAdName($carpoolAdNameId);
        if (!empty($reservationsCarpoolAdNameDTO)) {
            foreach ($reservationsCarpoolAdNameDTO as $reservationCarpoolAdNameDTO) {
                $carpoolAdName = new CarpoolAd();
                $carpoolAdName->setId($reservationsCarpoolAdNameDTO['id']);
                $carpoolAdName->setName($reservationsCarpoolAdNameDTO['name']);
                $reservationsCarpoolAdName[] = $carpoolAdName;
            }
        }

        return $carpoolAdName;
    }

    /**
     * Get user of given advertiser id.
     */
    public function getReservationClient(string $clientId): array
    {
        $reservationClient = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $carpoolAdsAdvertiserDTO = $dataBaseService->getReservationClient($clientId);
        if (!empty($reservationsClientDTO)) {
            foreach ($reservationsClientDTO as $reservationClientDTO) {
                $client = new User();
                $client->setId($reservationClientDTO['id']);
                $client->setFirstname($reservationClientDTO['firstname']);
                $client->setLastname($reservationClientDTO['lastname']);
                $reservationClient[] = $client;
            }
        }

        return $reservationClient;
    }
}