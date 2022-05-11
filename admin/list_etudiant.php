<?php
include("../includes/headeradmin.php");
include ('../includes/connexion.php');
$count=$sdb->prepare("SELECT count(id) as cpt FROM utilisateur");
$count->setFetchMode(PDO::FETCH_ASSOC);
$count->execute();
$tcount=$count->fetchAll();

@$page=$_GET['page'];
if(empty($page)) $page=1;
$nbr_element=6;
$nbr_page=ceil($tcount[0]["cpt"]/$nbr_element);
$debut=($page-1)*$nbr_element;

$sql="SELECT * FROM utilisateur ORDER BY id limit $debut,$nbr_element";
$requete=$sdb->prepare($sql);
$requete->setFetchMode(PDO::FETCH_ASSOC);
$requete->execute();
$res=$requete->fetchAll();
if(count($res)==0) 
header("location:list_etudiant.php?page=1");
?>
<!DOCTYPE html>
<html>
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../style/bootstrap.css" />

      <link href="../style/font-awesome.min.css" rel="stylesheet" />
    
      <link href="../style/responsive.css" rel="stylesheet" />
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="style.css">
<style>
       @import url("https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap");


     

#body {
   margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
  display: grid;
  height: 100%;
  text-align: center;
  background: #dde1e7;
}
.containerr {
  background: #dde1e7;
  padding: 25px;
  border-radius: 3px;
  box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);
}
.pagination {
  display: flex;
  list-style: none;
}
.pagination li {
  flex: 1;
  margin: 0px 5px;
  background: #dde1e7;
  border-radius: 3px;
  box-shadow: -3px -3px 7px #ffffff73, 3px 3px 5px rgba(94, 104, 121, 0.288);
}
.pagination li a #toko {
  font-size: 18px;
  text-decoration: none;
  color: #4d3252;
  height: 45px;
  width: 55px;
  display: block;
  line-height: 45px;
}
.pagination li:first-child a #toko {
  width: 120px;
}
.pagination li:last-child a #toko {
  width: 100px;
}
.pagination li.active {
  box-shadow: inset -3px -3px 7px #ffffff73,
    inset 3px 3px 5px rgba(94, 104, 121, 0.288);
}
.pagination li.active a #toko {
  font-size: 17px;
  color: #6f6cde;
}
.pagination li:first-child {
  margin: 0 15px 0 0;
}
.pagination li:last-child {
  margin: 0 0 0 15px;
}

  

  
</style>
</head>

<body class="w3-container"><br><br>
<h1 style="font-weight:bold;position:relative;left:400px;">La liste des étudiants inscrits</h1><br><br>
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

 foreach($res as $req) {
                                  echo'<tr>
                                  <td>'.$req['id'].'</td>
                                  <td>'.$req['prenom'].'</td>
                                  <td>'.$req['nom'].'</td>
                                  <td>'.$req['telephone'].'</td>
                                  <td>'.$req['email'].'</td>
          
                                  <td>'.$req['motdepasse'].'</td>
                                  <td>'.$req['role'].'</td>';
                                        echo '<td>';
                                        echo'<a class="w3-large w3-text-red" href="modifier.php?id='.$req['id'].'"><i class= "fa fa-edit""></i></a>';
                                        echo ' ';?>  

                                        <a onclick="return confirm('Voulez-vous vraiment supprimer cet enrégistrement?')" class="w3-large w3-text-red" href="supprimer.php?id=<?=$req['id'];?>"><i class= "fa fa-trash"></i></a>
                                        <?php
                                        echo ' ';
                                        echo'<a class="w3-large w3-text-blue" href="details.php?id='.$req['id'].'"><i class= "fa fa-eye""></i></a>';
                                        echo '</td>';
                                        echo'</tr>';
                                        
                                }                ?>  
                                
                                </tbody>
</table>
  </div><br><br>

  

  <div style="text-align : center;">
  <a href="inscriptionadmin.php" class="w3-bar-item w3-button w3-green w3-center">Ajouter</a>
  </div><br><br>


  <div id="body">    
        <div class="containerr">
        
  <ul class="pagination">
  <?php if ($page > 1): ?>
    <li><a id="toko" href="?page=<?php echo $page-1;?>">Previous</a></li>
    <?php 
     endif;
    
    for ($i=1; $i <= $nbr_page; $i++) {?>
    <li><a id="toko" href="?page=<?php echo $i;?>"><?php echo $i;?></a></li>
    <?php
      }
      ?>
      <?php if ($page < ceil($tcount[0]["cpt"] / $nbr_element)): ?>
    <li><a id="toko" href="?page=<?php echo $page+1;?>">Next</a></li>
    <?php endif; ?>
  </ul>
  
</div></div>  

  <footer>
    <?php
    include("../includes/footer.php")
    ?>
    </footer>
    <script>
      $("li").click(function () {
  $(this).addClass("active").siblings().removeClass("active");
});
</script>
</body>
</html> 

