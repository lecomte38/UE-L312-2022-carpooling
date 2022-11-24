<?php

use App\Controllers\CarpoolAdsController;
use App\Controllers\UsersController;
use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdsController();
echo $controller->createCarpoolad();

$carsController = new CarsController();
$usersController = new UsersController();
?>

<p>Création d'une annonce de covoiturage</p>
<form method="post" action="carpool_ads_create.php" name ="carpoolAdCreateForm">
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
    <input type="submit" value="Créer l'annonce de covoiturage">
</form>