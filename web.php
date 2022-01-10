<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developpement Web</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php
include('header.php');
?>

    <div class="devweb">

        <aside class="devweb1">
        <h3>Formation en Developpement Web</h3>
        <p>Vous souhaitez maîtriser la programmation web et devenir un as du langage informatique ? Obtenez votre qualification d'intégrateur web pour travailler en freelance, en agence ou en entreprise. Réalisez votre formation à distance, à votre rythme. Vous serez accompagné par nos formateurs experts.</p>
        Les filieres de formation en Developpement Web sont: <br>
                - HTML<br>
                - CSS<br>
                - Javascript<br>
                - PHP<br>
                - MySQL<br>
                - ...
        </aside>

        
    <article class="devweb2">
        <div class="w3-content w3-section" style="max-width:500px">
  

  <img class="diapodevweb w3-animate-fading" src="img/image33.jpg" style="width:100%">
  <img class="diapodevweb w3-animate-fading" src="img/image34.jpg" style="width:100%">
  <img class="diapodevweb w3-animate-fading" src="img/image35.jpg" style="width:100%">
  <img class="diapodevweb w3-animate-fading" src="img/image36.jpg" style="width:100%">
  <img class="diapodevweb w3-animate-fading" src="img/image37.jpg" style="width:100%">
  <img class="diapodevweb w3-animate-fading" src="img/image40.jpeg" style="width:100%">
  
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("diapodevweb");
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
        
        <aside class="devweb1">
            <h3>Formateur en Developpement Web</h3>
            <p>
Envie de travailler dans le domaine du web ? Découvrez les conseils de notre formateur pour réussir votre formation à distance et les qualités pour réussir dans ce secteur.</p>
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