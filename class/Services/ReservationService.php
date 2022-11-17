<?php

namespace App\Services;

use App\Entities\Reservation;

class ReservationsService
{
    /**
     * Create or update a reservation.
     */
    public function setReservation(?string $id, string $idCarpoolAd, int $nameCarpoolAd, string $firstnameUser, string $lastnameUser): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        if (empty($id)) {
            $isOk = $dataBaseService->createReservation($idCarpoolAd, $nameCarpoolAd, $firstnameUser, $lastnameUser);
        } else {
            $isOk = $dataBaseService->updateReservation($id, $idCarpoolAd, $nameCarpoolAd, $firstnameUser, $lastnameUser);
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
                $reservation->setNameCarpoolAd($reservationDTO['nameCarpoolAd']);
                $reservation->setFirstnameUser($reservationDTO['firstnameUser']);
                $reservation->setLastnameUser($reservationDTO['lastnameUser']);
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
}