<?php
include("header1.php");

?>
<!DOCTYPE html>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<style>
  #go{
    text-decoration:none;
    font-size:20px;
    background-color:lightgrey;
  
  }
</style>
</head>

<body class="w3-container">
<form action="#" method="POST">
<a href="index.php" id="go"> Go back</a>
<h2>La liste des étudiants inscrits</h2>
<div class="w3-responsive">
<table class="w3-table w3-striped w3-bordered w3-border">
<thead>
<tr>
<th>Identification</th>
  <th>Prenom</th>
  <th>Nom</th>
  <th>Telephone</th>
  <th>Email</th>
  <th>Mot de passe</th>
  <th>Role</th>
  <th>Action</th>
</tr>
</thead>
<tbody>
<?php 
include ('connexion.php');
$query=$sdb->prepare('SELECT * FROM utilisateur');
                                $query->execute();
                                while($data=$query->fetch()){
                                  echo'<tr>
                                  <td>'.$data['id'].'</td>
                                  <td>'.$data['prenom'].'</td>
                                  <td>'.$data['nom'].'</td>
                                  <td>'.$data['telephone'].'</td>
                                  <td>'.$data['email'].'</td>
          
                                  <td>'.$data['motdepasse'].'</td>
                                  <td>'.$data['role'].'</td>';
                                        echo '<td>';
                                        echo'<a class="w3-large w3-text-red" href="modifier.php?id='.$data['id'].'"><i class= "fa fa-edit""></i></a>';
                                        echo ' ';
                                        echo'<a class="w3-large w3-text-red" href="supprimer.php?id='.$data['id'].'"><i class= "fa fa-trash"></i></a>';
                                        echo ' ';
                                        echo'<a class="w3-large w3-text-blue" href="details.php?id='.$data['id'].'"><i class= "fa fa-eye""></i></a>';
                                        echo '</td>';
                                        echo'</tr>';
                                        
                                }                ?>  
                                
                                </tbody>
</table>
  </div><br><br>
  
  

  <div style="text-align : center;">
  <a href="inscriptionadmin.php" class="w3-bar-item w3-button w3-green w3-center">Ajouter</a>
  </div><br><br>
  <footer>
    <?php
    include("footer.php")
    ?>
    </footer>
</body>
</html> 

