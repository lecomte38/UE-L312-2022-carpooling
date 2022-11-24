<?php

use App\Controllers\CarsController;
use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CarsController();
echo $controller->createCar();

$usersController = new UsersController();
?>

<p>Création d'une voiture</p>
<form method="post" action="cars_create.php" name ="carCreateForm">
    <label for="brand">Marque de la voiture :</label>
    <input type="text" name="brand" required>
    <br />
    <label for="model">Modèle de la voiture :</label>
    <input type="text" name="model" required>
    <br />
    <label for="nbSeat">Nombre de place :</label>
    <input type="number" name="nbSeat" required>
    <br />
    <label for="idOwner">Id du propriétaire de la voiture :</label>
    <select name="idOwner" required>
        <option value="">Choisissez le propriétaire de la voiture</option>
        <?php echo $usersController->getUsersList(); ?>
    </select>
    <br />
    <input type="submit" value="Création de la voiture">
</form>