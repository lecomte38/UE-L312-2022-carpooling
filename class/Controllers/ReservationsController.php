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
            isset($_POST['idClient'])) {
            // Create the reservation :
            $ReservationsService = new ReservationsService();
            $isOk = $ReservationsService->setReservation(
                null,
                $_POST['idCarpoolAd'],
                $_POST['idClient']
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

            // HTML of reservation ad carpoolAdName
            $carpoolAdNameHtml = '';
            if (!empty($reservation->getCarpoolAdName())) {
                foreach ($reservation->getCarpoolAdName() as $carpoolAdName) {
                    $carpoolAdNameHtml .= $carpoolAdName->getName();
                }
            }

            // HTML of reservation ad client
            $clientHtml = '';
            if (!empty($reservation->getClient())) {
                foreach ($reservation->getClient() as $client) {
                    $clientHtml .= $client->getFirstname() . ' ' . $client->getLastname();
                }
            }

            $html .=
                '#' . $reservation->getId() . ' ' .
                $carpoolAdNameHtml . ' ' .
                $clientHtml . ' ' . '<br />';
        }

        return $html;
    }

    /**
     * Update the reservation.
     */
    public function updateReservation(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['idCarpoolAd']) &&
            isset($_POST['idClient'])) {
            // Update the reservation :
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->setReservation(
                $_POST['id'],
                $_POST['idCarpoolAd'],
                $_POST['idClient']
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
            $reservationsService = new ReservationsService();
            $isOk = $reservationsService->deleteReservation($_POST['id']);
            if ($isOk) {
                $html = 'Réservation supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de la réservation.';
            }
        }

        return $html;
    }

    /**
     * Return the reservations list html for form.
     */
    public function getReservationsList(): string
    {
        $html = '';

        // Get all carpool ads :
        $reservationsService = new ReservationsService();
        $reservations = $reservationsService->getReservations();

        // Get html :
        foreach ($reservations as $reservation) {

            $html .= '<option value="' . $reservation->getId() . '">#' . $reservation->getId() . '</option>';
        }

        return $html;
    }
}
