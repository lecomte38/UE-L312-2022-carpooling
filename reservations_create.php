<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->createReservation();
?>

<p>Création d'une réservation</p>
<form method="post" action="reservations_create.php" name ="reservationCreateForm">
    <label for="idCarpoolAd">Id de l'annonce de covoiturage :</label>
    <input type="text" name="idCarpoolAd">
    <br />
    <label for="idClient">Id du client :</label>
    <input type="text" name="idClient">
    <br />
    <input type="submit" value="Créer une réservation">
</form>