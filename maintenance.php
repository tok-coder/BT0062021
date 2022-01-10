<!DOCTYPE html>
<htmldepmaintenance
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation en Maintenance</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php
include('header.php');
?>

    <div class="depmaintenance">

    <aside class="depmaintenance1">
        <h3>Formation en Maintenance Informatique</h3>
        <p>Passionné d'informatique, vous souhaitez mettre votre savoir au service des entreprises ? Obtenez votre qualification de technicien informatique pour travailler en agence ou en entreprise. Réalisez votre formation à distance, à votre rythme. Vous serez accompagné par nos formateurs experts</p>
        Nous formons les etudiants en: <br><br>
                1-Maintenance <br><br><br>
                2-Reseau informatique <br><br>
        </aside>

    <article class="depmaintenance2">
        <div class="w3-content w3-section" style="max-width:500px">
  

        <img class="diapodepmaintenance w3-animate-fading" src="img/image29.jpg" style="width:100%">
  <img class="diapodepmaintenance w3-animate-fading" src="img/image30.jpg" style="width:100%">
  <img class="diapodepmaintenance w3-animate-fading" src="img/image31.jpg" style="width:100%">
  <img class="diapodepmaintenance w3-animate-fading" src="img/image32.png" style="width:100%">
  <img class="diapodepmaintenance w3-animate-fading" src="img/image34.jpg" style="width:100%">
  <img class="diapodepmaintenance w3-animate-fading" src="img/image38.jpg" style="width:100%">
  <img class="diapodepmaintenance w3-animate-fading" src="img/image39.jpg" style="width:100%">
  
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("diapodepmaintenance");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 9000);    
}
</script>
        </article>
        
        <aside class="depmaintenance1">
            <h3>OBJECTIF</h3>
            <p>
Apprendre le fonctionnement et la structure du micro-ordinateur.Savoir diagnostiquer les principales pannes et dépanner les ordinateurs PC. <br><br>

Connaitre et comprendre le rôle de chacun des composants d’un ordinateur PC.
Apprendre à assembler un ordinateur de toutes pièces.<br>

Acquérir une connaissance pratique et théorique des réseaux informatiques dans un environnement de type micro-ordinateurs PC.<br>
            </p>
        </aside>
    </div>
    </div>
<footer>
<?php
include('footer.php');
?>
</footer>
</body>
</html>