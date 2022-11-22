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

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
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
     * Create an carpool ad.
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
     * Update an user.
     */
    public function updateCarpoolAd(string $name, string $idCar, string $idAdvertiser, string $departurePlace, string $arrivalPlace): bool
    {
        $isOk = false;

        $data = [
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
     * Delete an user.
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
     * Create an car.
     */
    

    /**
     * Return all cars.
     */
    

    /**
     * Update an car.
     */
    

    /**
     * Delete an car.
     */



    /**
     * Create an reservation.
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
     * Update an reservation.
     */
    

    /**
     * Delete an reservation.
     */
}
