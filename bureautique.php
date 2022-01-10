<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formation Bureautique</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
<?php
include('header.php');
?>

    <div class="bureautique">


        <aside class="bureautique1">
        <h3>Formation en Informatique Bureautique</h3>
        <p>La formation bureautique permet à ceux qui la préparent d’apprendre à se servir des différents logiciels de bureautique sur un ordinateur. Cette formation peut être qualifiante ou diplômante.</p>
        En bureautique, nous vous formons sur deux filieres. <br><br>
                1-Word et Excel <br><br><br>
                2-Power Point Access <br><br>
        </aside>
        <article class="bureautique2">
        <div class="w3-content w3-section" style="max-width:500px">
  

  <img class="diapobureautique w3-animate-fading" src="img/image27.jpeg" style="width:100%">
  <img class="diapobureautique w3-animate-fading" src="img/image28.jpg" style="width:100%">
  <img class="diapobureautique w3-animate-fading" src="img/image24.png" style="width:100%">
  <img class="diapobureautique w3-animate-fading" src="img/image25.png" style="width:100%">
  <img class="diapobureautique w3-animate-fading" src="img/image26.png" style="width:100%">
  <img class="diapobureautique w3-animate-fading" src="img/image18.jpg" style="width:100%">
  
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("diapobureautique");
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

        <aside class="bureautique1">
            <h3>LES FILIERES</h3>
            <p>
En fonction du type de formation préparée, le programme des cours de bureautique change.
Néanmoins, il y a un tronc commun d’enseignement :
- Environnement windows.<br>
- Base du logiciel et des suites bureautiques : Microsoft Powerpoint, Microsoft Access, Microsoft Word, Microsoft Excel, etc.<br> 
- Techniques de secrétariat.<br>
- Bureautique et Informatique.<br>
- Outils collaboratifs.<br>
- Nouvelles fonctionnalités.<br>
- Prise de note.<br>
- Outils informatiques.<br>
- Libre Office.<br>
etc.
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