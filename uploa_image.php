<?php require('connexion.php');
if(isset($_POST['valider']))
{
    $photo=$_FILES['img']['name'];
    $upload="picture/".$photo;
    move_uploaded_file($_FILES['img']['tmp_name'],$upload);

    $sql = "INSERT INTO utilisateur(avatar) VALUES ('$photo')";

    $preparation = $sdb->prepare($sql);
    if ($preparation->execute([':avatar' => $photo ])) {
        $message = "un élément a été inserré avec succès!!! <br>";
    }
    else {
        $message = "une erreur s'est produite<br>";
    }

        
}
 if (!empty($message)){
     echo $message;
 }
?>