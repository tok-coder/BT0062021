<?php

    include('connexion.php');

    $id = $_GET['id'];

    $sql = 'DELETE FROM message WHERE id=:id';

    $preparation = $sdb->prepare($sql);

    if ($preparation->execute([':id' => $id])) {
        header('location: admin.php');
    }

?>