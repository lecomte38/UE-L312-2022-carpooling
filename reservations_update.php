<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservation();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations_update.php" name ="reservationUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="idCarpoolAd">Id de l'annonce de covoiturage :</label>
    <input type="text" name="idCarpoolAd">
    <br />
    <label for="idClient">Id du client :</label>
    <input type="text" name="idClient">
    <br />
    <input type="submit" value="Modifier une réservation">
</form>