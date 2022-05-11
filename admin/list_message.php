<?php
include("../includes/headeradmin.php");

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

  <h1 style="font-weight:bold;position:relative;left:500px;">La liste des messages</h1>
<div class="w3-responsive">
<table class="w3-table w3-striped w3-bordered w3-border">
<thead>
<tr>
<th>Identification</th>
  <th>Prenom</th>
  <th>Nom</th>
  <th>Email</th>
  <th>Message</th>
  <th>Action</th>
</tr>
</thead>
<tbody>
<?php 
include ('../includes/connexion.php');
$query=$sdb->prepare('SELECT * FROM message');
                                $query->execute();
                                while($data=$query->fetch()){
                                  echo'<tr>
                                  <td>'.$data['id'].'</td>
                                  <td>'.$data['prenom'].'</td>
                                  <td>'.$data['nom'].'</td>
                                  <td>'.$data['mail'].'</td>
                                  <td>'.$data['description'].'</td>';
                                        echo '<td>';
                                        echo ' ';?>  

                                        <a onclick="return confirm('Voulez-vous vraiment supprimer cet enrégistrement?')" class="w3-large w3-text-red" href="supprimermess.php?id=<?=$data['id'];?>"><i class= "fa fa-trash"></i></a>
                                        <?php
                                        echo ' ';
                                        echo'<a class="w3-large w3-text-blue" href="detailmess.php?id='.$data['id'].'"><i class= "fa fa-eye""></i></a>';
                                        echo '</td>';
                                        echo'</tr>';
                                        
                                }  
                                           ?>  
                                
                                </tbody>
</table>
  </div><br><br>
  
  
  


  <footer>
    <?php
    include("../includes/footer.php")
    ?>
    </footer>
</body>
</html> 

