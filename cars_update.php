<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->updateCar();
?>

<p>Mise à jour d'une voiture</p>
<form method="post" action="cars_update.php" name ="carUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="brand">Marque de la voiture :</label>
    <input type="text" name="brand">
    <br />
    <label for="model">Modèle de la voiture :</label>
    <input type="text" name="model">
    <br />
    <label for="nbSeat">Nombre de place :</label>
    <input type="text" name="nbSeat">
    <br />
    <label for="idOwner">Id du propriétaire de la voiture :</label>
    <input type="text" name="idOwner">
    <br />
    <input type="submit" value="Modification d'une voiture">
</form>