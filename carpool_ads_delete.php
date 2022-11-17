<?php

use App\Controllers\CarpoolAdsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarpoolAdsController();
echo $controller->deleteCarpoolAd();
?>

<p>Supression d'une annonce de covoiturage</p>
<form method="post" action="carpool_ads_delete.php" name ="carpoolAdDeleteForm">
    <label for="id">Id :</label>
    <input type="text" name="id">
    <br />
    <input type="submit" value="Supprimer une annonce de covoiturage">
</form>