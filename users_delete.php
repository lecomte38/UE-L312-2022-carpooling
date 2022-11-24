<?php

use App\Controllers\UsersController;

require __DIR__ . '/vendor/autoload.php';

$controller = new UsersController();
echo $controller->deleteUser();
?>

<p>Supression d'un utilisateur</p>
<form method="post" action="users_delete.php" name ="userDeleteForm">
    <label for="id">Id :</label>
    <select name="id" required>
        <option value="">Choisissez un utilisateur</option>
        <?php echo $controller->getUsersList(); ?>
    </select>
    <br />
    <input type="submit" value="Supprimer un utilisateur">
</form>