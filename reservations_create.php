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
    <label for="nameCarpoolAd">Nom de l'annonce de covoiturage :</label>
    <input type="text" name="nameCarpoolAd">
    <br />
    <label for="firstnameUser">Prénom de la personne qui réserve :</label>
    <input type="text" name="firstnameUser">
    <br />
    <label for="lastnameUser">Nom de famille de la personne qui réserve :</label>
    <input type="text" name="lastnameUser">
    <br />
    <input type="submit" value="Créer la réservation">
</form>