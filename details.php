<?php

    require ('connexion.php');

    $id = $_GET['id'];

    $sql = 'SELECT * FROM utilisateur WHERE id=:id';

    $preparation = $sdb->prepare($sql);

    ?>

<?php if ($preparation->execute([':id' => $id])): 

$customer = $preparation->fetchAll(PDO::FETCH_OBJ);


?> 


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="w3.css">

<body class="w3-container">
<header>
<?php include('header1.php')?>  
</header>
<h1 style="text-align-center;"> Voici ce que vous pouvez savoir sur l'etudiant</h1>
<div class="w3-container">
<table class="w3-table-all">
<thead>
      
</thead>
<tbody>

                    <?php foreach($customer as $data): ?>
                        <tr class="w3-blue align=center">
     
     <td></td>
     <td></td>
     <th> informations de l'etudiant</th>
     <td></td>
     <td></td>
      <tr>
                    <tr>
                        <th>Identification</th>
                        <td><?=$data->id;  ?></td> 
                        <th>Prenom</th>
                        <td><?=$data->prenom;  ?></td>
                        
                        <td rowspan=3 ><?='<img src="picture/'.$data->avatar.'" width="100%" height="100px" /> '?></td>
                        </tr>
                        <tr>
                        <th>Nom</th>
                        <td><?=$data->nom;  ?></td>
                        <th>Telephone</th>
                        <td><?=$data->telephone;  ?></td>
                        </tr>
                        <tr>
                        <th>Email</th>
                        <td><?=$data->email;  ?></td>
                        <th>Role</th>
                        <td><?=$data->role;  ?></td>
                        </tr>
                        
                        

                    <?php endforeach; ?>

                    </tbody>
                </table>

            </div>

        </div>
    </div><br><br><br><br><br>

    <?php endif; ?>
    <button onclick="window.location.href = 'admin.php';" style="background-color:white;"> Retour </button><br><br><br><br><br>

<footer>
<?php include('footer.php'); ?>
</footer>  
</body>