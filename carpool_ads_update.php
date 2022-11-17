<?php

use App\Controllers\CarpoolAdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdsController();
echo $controller->updateCarpoolAd();
?>

<p>Mise à jour d'une annonce de covoiturage</p>
<form method="post" action="carpool_ads_update.php" name ="carpoolAdUpdateForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <label for="name">Titre :</label>
    <input type="text" name="name">
    <br />
    <label for="car">Voiture :</label>
    <input type="text" name="car">
    <br />
    <label for="advertiser">Annonceur :</label>
    <input type="text" name="advertiser">
    <br />
    <label for="departurePlace">Lieu de départ :</label>
    <input type="text" name="departurePlace">
    <br />
    <label for="departureDateTime">Date de départ au format dd-mm-yyyy :</label>
    <input type="text" name="departureDateTime">
    <br />
    <label for="arrivalPlace">Lieu d'arrivé :</label>
    <input type="text" name="arrivalPlace">
    <br />
    <input type="submit" value="Modifier l'annonce de covoiturage">
</form>