<?php

namespace App\Services;

use App\Entities\Car;
use App\Entities\CarpoolAd;
use App\Entities\Reservation;
use App\Entities\User;
use DateTime;

class UsersService
{
    /**
     * Create or update an user.
     */
    public function setUser(?string $id, string $firstname, string $lastname, string $email, string $birthday): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $birthdayDateTime = new DateTime($birthday);
        if (empty($id)) {
            $isOk = $dataBaseService->createUser($firstname, $lastname, $email, $birthdayDateTime);
        } else {
            $isOk = $dataBaseService->updateUser($id, $firstname, $lastname, $email, $birthdayDateTime);
        }

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $dataBaseService = new DataBaseService();
        $usersDTO = $dataBaseService->getUsers();
        if (!empty($usersDTO)) {
            foreach ($usersDTO as $userDTO) {
                $user = new User();
                $user->setId($userDTO['id']);
                $user->setFirstname($userDTO['firstname']);
                $user->setLastname($userDTO['lastname']);
                $user->setEmail($userDTO['email']);
                $date = new DateTime($userDTO['birthday']);
                if ($date !== false) {
                    $user->setbirthday($date);
                }

                // Get cars of this user :
                $cars = $this->getUserCars($userDTO['id']);
                $user->setCars($cars);

                // Get carpool ads of this user :
                $carpoolAds = $this->getUserCarpoolAds($userDTO['id']);
                $user->setCarpoolAds($carpoolAds);

                // Get reservations of this user :
                $reservations = $this->getUserReservations($userDTO['id']);
                $user->setReservations($reservations);

                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $dataBaseService = new DataBaseService();
        $isOk = $dataBaseService->deleteUser($id);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarsDTO = $dataBaseService->getUserCars($userId);
        if (!empty($usersCarsDTO)) {
            foreach ($usersCarsDTO as $userCarDTO) {
                $car = new Car();
                $car->setId($userCarDTO['id']);
                $car->setBrand($userCarDTO['brand']);
                $car->setModel($userCarDTO['model']);
                $car->setNbSeat($userCarDTO['nbSeat']);
                $car->setIdOwner($userCarDTO['idOwner']);
                $userCars[] = $car;
            }
        }

        return $userCars;
    }

    /**
     * Get carpool ads of given user id.
     */
    public function getUserCarpoolAds(string $userId): array
    {
        $userCarpoolAds = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersCarpoolAdsDTO = $dataBaseService->getUserCarpoolAds($userId);
        if (!empty($usersCarpoolAdsDTO)) {
            foreach ($usersCarpoolAdsDTO as $userCarpoolAdDTO) {
                $carpoolAd = new CarpoolAd();
                $carpoolAd->setId($userCarpoolAdDTO['id']);
                $carpoolAd->setName($userCarpoolAdDTO['name']);
                $carpoolAd->setIdAdvertiser($userCarpoolAdDTO['idAdvertiser']);
                $carpoolAd->setDeparturePlace($userCarpoolAdDTO['departurePlace']);
                $carpoolAd->setArrivalPlace($userCarpoolAdDTO['arrivalPlace']);
                $userCarpoolAds[] = $carpoolAd;
            }
        }

        return $userCarpoolAds;
    }

    /**
     * Get reservations of given user id.
     */
    public function getUserReservations(string $userId): array
    {
        $userReservations = [];

        $dataBaseService = new DataBaseService();

        // Get relation users and cars :
        $usersReservationsDTO = $dataBaseService->getUserReservations($userId);
        if (!empty($usersReservationsDTO)) {
            foreach ($usersReservationsDTO as $userReservationDTO) {
                $reservation = new Reservation();
                $reservation->setId($userReservationDTO['id']);
                $reservation->setIdCarpoolAd($userReservationDTO['idCarpoolAd']);
                $reservation->setIdClient($userReservationDTO['idClient']);
                $userReservations[] = $reservation;
            }
        }

        return $userReservations;
    }
}
