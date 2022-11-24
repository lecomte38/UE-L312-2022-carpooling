<?php

use App\Controllers\ReservationsController;
use App\Controllers\CarpoolAdsController;
use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->updateReservation();

$carpoolAdsController = new CarpoolAdsController();
$usersController = new UsersController();
?>

<p>Mise à jour d'une réservation</p>
<form method="post" action="reservations_update.php" name ="reservationUpdateForm">
    <label for="id">Id :</label>
    <select name="id" required>
        <option value="">Choisissez l'ID de réservation</option>
        <?php echo $controller->getReservationsList(); ?>
    </select>
    <br />
    <label for="idCarpoolAd">Id de l'annonce de covoiturage :</label>
    <select name="idCarpoolAd" required>
        <option value="">Choisissez une annonce de covoiturage</option>
        <?php echo $carpoolAdsController->getCarpoolAdsList(); ?>
    </select>
    <br />
    <label for="idClient">Id du client :</label>
    <select name="idClient" required>
        <option value="">Choisissez un client</option>
        <?php echo $usersController->getUsersList(); ?>
    </select>
    <br />
    <input type="submit" value="Modifier une réservation">
</form>