<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->updateUser();
?>

<p>Mise à jour d'un utilisateur</p>
<form method="post" action="users_update.php" name ="userUpdateForm">
    <label for="id">Id :</label>
    <select name="id" required>
        <option value="">Choisissez un utilisateur</option>
        <?php echo $controller->getUsersList(); ?>
    </select>
    <br />
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
    <input type="submit" value="Modifier l'utilisateur">
</form>