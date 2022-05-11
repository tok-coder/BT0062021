<?php

    include('../includes/connexion.php');

    $id = $_GET['id'];

    $sql = 'DELETE FROM utilisateur WHERE id=:id';

    $preparation = $sdb->prepare($sql);

    if ($preparation->execute([':id' => $id])) {
        header('location: admin.php');
    }

?>