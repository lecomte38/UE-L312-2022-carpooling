<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->createUser();
?>

<p>Création d'un utilisateur</p>
<form method="post" action="users_create.php" name ="userCreateForm">
    <label for="firstname">Prénom :</label>
    <input type="text" name="firstname" required>
    <br />
    <label for="lastname">Nom :</label>
    <input type="text" name="lastname" required>
    <br />
    <label for="email">Email :</label>
    <input type="email" name="email" required>
    <br />
    <label for="birthday">Date d'anniversaire au format dd-mm-yyyy :</label>
    <input type="text" name="birthday" required>
    <br />
    <input type="submit" value="Créer un utilisateur">
</form>