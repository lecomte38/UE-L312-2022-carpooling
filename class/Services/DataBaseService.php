<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'carpoolingG8';
    const MYSQL_PASSWORD = 'carpoolingG8mdp';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT *FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = 'SELECT *
                FROM cars
                LEFT JOIN users ON `users`.`id` = `cars`.`idOwner`
                WHERE `users`.`id` = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCars = $results;
        }

        return $userCars;
    }

    /**
     * Get carpool ads of given user id.
     */
    public function getUserCarpoolAds(string $userId): array
    {
        $userCarpoolAds = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = 'SELECT *
                FROM carpool_ads
                LEFT JOIN users ON `users`.`id` = `carpool_ads`.`idAdvertiser`
                WHERE `users`.`id` = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCarpoolAds = $results;
        }

        return $userCarpoolAds;
    }

    /**
     * Get reservations of given user id.
     */
    public function getUserReservations(string $userId): array
    {
        $userReservations = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = 'SELECT *
                FROM reservations
                LEFT JOIN users ON `users`.`id` = `reservations`.`idClient`
                WHERE `users`.`id` = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userReservations = $results;
        }

        return $userReservations;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a carpool ad.
     */
    public function createCarpoolAd(string $name, string $idCar, string $idAdvertiser, string $departurePlace, string $arrivalPlace): bool
    {
        $isOk = false;

        $data = [
            'name' => $name,
            'idCar' => $idCar,
            'idAdvertiser' => $idAdvertiser,
            'departurePlace' => $departurePlace,
            'arrivalPlace' => $arrivalPlace,
        ];
        $sql = 'INSERT INTO carpool_ads (name, idCar, idAdvertiser, departurePlace, arrivalPlace) VALUES (:name, :idCar, :idAdvertiser, :departurePlace, :arrivalPlace)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all carpoll ads.
     */
    public function getCarpoolAds(): array
    {
        $carpoolAds = [];

        $sql = 'SELECT * FROM carpool_ads';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolAds = $results;
        }

        return $carpoolAds;
    }

    /**
     * Get carpool ad car of given car id.
     */
    public function getCarpoolAdCar(string $carId): array
    {
        $carpoolAdCar = [];

        $data = [
            'carId' => $carId,
        ];
        $sql = 'SELECT DISTINCT cars.*
                FROM cars
                LEFT JOIN carpool_ads ON `carpool_ads`.`idCar` = `cars`.`id`
                WHERE `carpool_ads`.`idCar` = :carId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolAdCar = $results;
        }

        return $carpoolAdCar;
    }

    /**
     * Get user name of given advertiser id.
     */
    public function getCarpoolAdAdvertiser(string $advertiserId): array
    {
        $carpoolAdAdvertiser = [];

        $data = [
            'advertiserId' => $advertiserId,
        ];
        $sql = 'SELECT DISTINCT users.*
                FROM users
                LEFT JOIN carpool_ads ON `carpool_ads`.`idAdvertiser` = `users`.`id`
                WHERE `carpool_ads`.`idAdvertiser` = :advertiserId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carpoolAdAdvertiser = $results;
        }

        return $carpoolAdAdvertiser;
    }

    /**
     * Update a carpoll ad.
     */
    public function updateCarpoolAd(string $id, string $name, string $idCar, string $idAdvertiser, string $departurePlace, string $arrivalPlace): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'name' => $name,
            'idCar' => $idCar,
            'idAdvertiser' => $idAdvertiser,
            'departurePlace' => $departurePlace,
            'arrivalPlace' => $arrivalPlace,
        ];
        $sql = 'UPDATE carpool_ads SET name = :name, idCar = :idCar, idAdvertiser = :idAdvertiser, departurePlace = :departurePlace, arrivalPlace = :arrivalPlace WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a carpoll ad.
     */
    public function deleteCarpoolAd(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM carpool_ads WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a car.
     */
    public function createCar(string $brand, string $model, int $nbSeat, string $idOwner): bool
    {
        $isOk = false;

        $data = [
            'brand' => $brand,
            'model' => $model,
            'nbSeat' => $nbSeat,
            'idOwner' => $idOwner,
        ];
        $sql = 'INSERT INTO cars (brand, model, nbSeat, idOwner) VALUES (:brand, :model, :nbSeat, :idOwner)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Get user name of given owner id.
     */
    public function getCarOwner(string $ownerId): array
    {
        $carOwner = [];

        $data = [
            'ownerId' => $ownerId,
        ];
        $sql = 'SELECT DISTINCT users.*
                FROM users
                LEFT JOIN cars ON `cars`.`idOwner` = `users`.`id`
                WHERE `cars`.`idOwner` = :ownerId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $carOwner = $results;
        }

        return $carOwner;
    }
    
    /**
     * Update a car.
     */
    public function updateCar(string $id, string $brand, string $model, int $nbSeat, string $idOwner): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'brand' => $brand,
            'model' => $model,
            'nbSeat' => $nbSeat,
            'idOwner' => $idOwner,
        ];
        $sql = 'UPDATE cars SET brand = :brand, model = :model, nbSeat = :nbSeat, idOwner = :idOwner WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Delete a car.
     */
    public function deleteCar(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM cars WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Create a reservation.
     */
    public function createReservation(string $idCarpoolAd, string $idClient): bool
    {
        $isOk = false;

        $data = [
            'idCarpoolAd' => $idCarpoolAd,
            'idClient' => $idClient,
        ];
        $sql = 'INSERT INTO reservations (idCarpoolAd, idClient) VALUES (:idCarpoolAd, :idClient)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all reservations.
     */
    public function getReservations(): array
    {
        $reservations = [];

        $sql = 'SELECT * FROM reservations';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservations = $results;
        }

        return $reservations;
    }

    /**
     * Get carpool ad name of given carpool ad id.
     */
    public function getReservationCarpoolAdName(string $carpoolAdNameId): array
    {
        $reservationCarpoolAdName = [];

        $data = [
            'carpoolAdNameId' => $carpoolAdNameId,
        ];
        $sql = 'SELECT DISTINCT carpool_ads.*
                FROM carpool_ads
                LEFT JOIN reservations ON `reservations`.`idCarpoolAd` = `carpool_ads`.`id`
                WHERE `reservations`.`idCarpoolAd` = :carpoolAdNameId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservationCarpoolAdName = $results;
        }

        return $reservationCarpoolAdName;
    }

    /**
     * Get client name of given user id.
     */
    public function getReservationClient(string $clientId): array
    {
        $reservationClient = [];

        $data = [
            'clientId' => $clientId,
        ];
        $sql = 'SELECT DISTINCT users.*
                FROM users
                LEFT JOIN reservations ON `reservations`.`idClient` = `users`.`id`
                WHERE `reservations`.`idClient` = :clientId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservationClient = $results;
        }

        return $reservationClient;
    }

    /**
     * Update a reservation.
     */
    public function updateReservation(string $id, string $idCarpoolAd, string $idClient): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'idCarpoolAd' => $idCarpoolAd,
            'idClient' => $idClient,
        ];
        $sql = 'UPDATE reservations SET idCarpoolAd = :idCarpoolAd, idClient = :idClient WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete a reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM reservations WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
}
