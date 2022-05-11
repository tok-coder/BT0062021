<?php

    require ('connexion.php');

    $id = $_GET['id'];

    $sql = 'SELECT * FROM message WHERE id=:id';

    $preparation = $sdb->prepare($sql);

    ?>

<?php if ($preparation->execute([':id' => $id])) 

$customer = $preparation->fetchAll(PDO::FETCH_OBJ);


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($customer as $mess){ 
       echo "<div style='font-size:30px;'>";
    echo "Vous avez recu un message de la part de : <strong>".$mess->prenom." ".$mess->nom."</strong><br><br>";
    echo "Son adrese mail est : <strong>".$mess->mail." </strong>. <br><br>";
    echo "Son message est : <br><br>";
    echo "<strong>".$mess->description."</strong> <br>";
     echo "</div>";

     } ?>
</body>
</html>
