<?php

use App\Controllers\CarpoolAdsController;
use App\Controllers\UsersController;
use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdsController();
echo $controller->updateCarpoolAd();

$carsController = new CarsController();
$usersController = new UsersController();
?>

<p>Mise à jour d'une annonce de covoiturage</p>
<form method="post" action="carpool_ads_update.php" name ="carpoolAdUpdateForm">
    <label for="id">Id :</label>
    <select name="id" required>
        <option value="">Choisissez une annonce</option>
        <?php echo $controller->getCarpoolAdsList(); ?>
    </select>
    <br />
    <label for="name">Titre :</label>
    <input type="text" name="name" required>
    <br />
    <label for="idCar">Voiture :</label>
    <select name="idCar" required>
        <option value="">Choisissez une voiture</option>
        <?php echo $carsController->getCarsList(); ?>
    </select>
    <br />
    <label for="idAdvertiser">Annonceur :</label>
    <select name="idAdvertiser" required>
        <option value="">Choisissez un annonceur</option>
        <?php echo $usersController->getUsersList(); ?>
    </select>
    <br />
    <label for="departurePlace">Lieu de départ :</label>
    <input type="text" name="departurePlace" required>
    <br />
    <label for="arrivalPlace">Lieu d'arrivé :</label>
    <input type="text" name="arrivalPlace" required>
    <br />
    <input type="submit" value="Modifier l'annonce de covoiturage">
</form>