<?php

namespace App\Controllers;

use App\Services\UsersService;

class UsersController
{
    /**
     * Return the html for the create action.
     */
    public function createUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday'])) {
            // Create the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                null,
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = 'Utilisateur créé avec succès.';
            } else {
                $html = 'Erreur lors de la création de l\'utilisateur.';
            }
        }

        return $html;
    }

    /**
     * Return the html for the read action.
     */
    public function getUsers(): string
    {
        $headerTab = '<table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Utlisateur</th>
                                <th>Email</th>
                                <th>Date de naissance</th>
                                <th>Voitures</th>
                                <th>Annonces de covoiturage postées</th>
                                <th>Réservations</th>
                            </tr>
                        </thead>
                        <tbody>';
        $bodyTab = '';
        $footerTab = '  <tbody>
                      </table>';

        // Get all users :
        $usersService = new UsersService();
        $users = $usersService->getUsers();

        // Get html :
        foreach ($users as $user) {

            // HTML of user cars
            $carsHtml = '';
            if (!empty($user->getCars())) {
                foreach ($user->getCars() as $car) {
                    $carsHtml .= $car->getBrand() . ' ' . $car->getModel() . '<br/>';
                }
            }

            // HTML of user carpool ads
            $carpoolAdsHtml = '';
            if (!empty($user->getCarpoolAds())) {
                foreach ($user->getCarpoolAds() as $carpoolAd) {
                    $carpoolAdsHtml .= $carpoolAd->getName() . '<br/>';
                }
            }

            // HTML of user reservations
            $reservationsHtml = '';
            if (!empty($user->getReservations())) {
                foreach ($user->getReservations() as $reservation) {
                    $reservationsHtml .= ' Réservation pour l\'annonce de covoiturage #' . $reservation->getIdCarpoolAd() . '<br/>';
                }
            }

            $bodyTab .=
                '<tr><td>#' . $user->getId() . '</td>' .
                '<td>' . $user->getFirstname() . ' ' . $user->getLastname() . '</td>' .
                '<td>' . $user->getEmail() . '</td>' .
                '<td>' . $user->getBirthday()->format('d-m-Y') . '</td>' .
                '<td>' . $carsHtml . '</td>' .
                '<td>' . $carpoolAdsHtml . '</td>' .
                '<td>' . $reservationsHtml . '</td></tr>';
        }

        $html = $headerTab . $bodyTab . $footerTab;

        return $html;
    }

    /**
     * Update the user.
     */
    public function updateUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['email']) &&
            isset($_POST['birthday'])) {
            // Update the user :
            $usersService = new UsersService();
            $isOk = $usersService->setUser(
                $_POST['id'],
                $_POST['firstname'],
                $_POST['lastname'],
                $_POST['email'],
                $_POST['birthday']
            );
            if ($isOk) {
                $html = 'Utilisateur mis à jour avec succès.';
            } else {
                $html = 'Erreur lors de la mise à jour de l\'utilisateur.';
            }
        }

        return $html;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(): string
    {
        $html = '';

        // If the form have been submitted :
        if (isset($_POST['id'])) {
            // Delete the user :
            $usersService = new UsersService();
            $isOk = $usersService->deleteUser($_POST['id']);
            if ($isOk) {
                $html = 'Utilisateur supprimé avec succès.';
            } else {
                $html = 'Erreur lors de la supression de l\'utilisateur.';
            }
        }

        return $html;
    }

    /**
     * Return the users list html for form.
     */
    public function getUsersList(): string
    {
        $html = '';

        // Get all users :
        $usersService = new UsersService();
        $users = $usersService->getUsers();

        // Get html :
        foreach ($users as $user) {
            $html .= '<option value="' . $user->getId() . '">#' . $user->getId() . ' - ' . $user->getFirstname() . ' ' . $user->getLastname() . '</option>';
        }

        return $html;
    }
}
