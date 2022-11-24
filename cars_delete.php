<?php

use App\Controllers\CarsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->deleteCar();
?>

<p>Suppression d'une voiture</p>
<form method="post" action="cars_delete.php" name ="carDeleteForm">
    <label for="id">Id :</label>
    <select name="id" required>
        <option value="">Choisissez une voiture</option>
        <?php echo $controller->getCarsList(); ?>
    </select>
    <br />
    <input type="submit" value="Suppression d'une voiture">
</form>