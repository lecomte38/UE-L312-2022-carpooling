<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservations();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations_update.php" name ="reservationsUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="name">Id de l'annonce de covoiturage :</label>
    <input type="text" name="idCarpoolAd">
    <br />
    <label for="car">Nom de l'annonce de covoiturage :</label>
    <input type="text" name="nameCarpoolAd">
    <br />
    <label for="advertiser">Prénom de la personne qui réserve :</label>
    <input type="text" name="firstnameUser">
    <br />
    <label for="departurePlace">Nom de famille de la personne qui réserve :</label>
    <input type="text" name="lastnameUser">
    <br />
    <input type="submit" value="Modifier la réservation">
</form>