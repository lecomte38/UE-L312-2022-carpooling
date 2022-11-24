<?php

use App\Controllers\ReservationsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new ReservationsController();
echo $controller->deleteReservation();
?>

<p>Supression d'une réservation</p>
<form method="post" action="reservations_delete.php" name ="reservationDeleteForm">
    <label for="id">Id :</label>
    <select name="id" required>
        <option value="">Choisissez un ID de réservation</option>
        <?php echo $controller->getReservationsList(); ?>
    </select>
    <br />
    <input type="submit" value="Supprimer une réservation">
</form>