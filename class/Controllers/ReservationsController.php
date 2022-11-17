<?php

namespace App\Controllers;

use App\Services\ReservationsService;

class ReservationsController
{
    /**
     * Return the html for the create action.
     */
    public function createReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['idCarpoolAd']) &&
            isset($_POST['nameCarpoolAd']) &&
            isset($_POST['firstnameUser']) &&
            isset($_POST['lastnameUser'])) {
            // Create the reservation :
            $ReservationsService = new ReservationsService();
            $isOk = $ReservationsService->setReservation(
                null,
                $_POST['idCarpoolAd'],
                $_POST['nameCarpoolAd'],
                $_POST['firstnameUser'],
                $_POST['lastnameUser']
            );
            if ($isOk) {
                $html = 'Réservation créée avec succès.';
            } else {
                $html = 'Erreur lors de la création de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getReservations(): string
    {
        $html = '';

        // Get all reservations :
        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {
            $html .=
                '#' . $reservation->getId() . ' ' .
                $reservation->getIdCarpoolAd() . ' ' .
                $reservation->getNameCarpoolAd() . ' ' .
                $reservation->getFirstnameUser() . ' ' .
                $reservation->getLastnameUser() . ' ' ;
        }

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['idCarpoolAd']) &&
            isset($_POST['nameCarpoolAd']) &&
            isset($_POST['firstnameUser']) &&
            isset($_POST['lastnameUser'])) {
            // Update the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservations(
                $_POST['id'],
                $_POST['idCarpoolAd'],
                $_POST['nameCarpoolAd'],
                $_POST['firstnameUser'],
                $_POST['lastnameUser']
            );
            if ($isOk) {
                $html = 'Réservation mise à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Delete an reservation.
     */
    public function deleteReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the reservation :
            $reservationsService = new CarpoolAdsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }
}
