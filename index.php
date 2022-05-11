<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institut Informatique</title>
    <!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->
    <!--link rel="stylesheet" href="style.css"-->
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->


</head>
<body>
    
        <?php
        include("includes/headerindex.php")
        ?>
        
    <main>
        <article>
            <h2 class="w3-center w3-text-blue">NOS FORMATIONS</h2>

            <div class="w3-content w3-display-container">
              <img class="diaporama" src="img/image16.jpg" style="width:100%">
              <img class="diaporama" src="img/image17.jpg" style="width:100%">
              <img class="diaporama" src="img/image22.jpg" style="width:100%">
              <img class="diaporama" src="img/image19.jpg" style="width:100%">
              <img class="diaporama" src="img/image20.jpg" style="width:100%">
              <img class="diaporama" src="img/image10.png" style="width:100%">
              <img class="diaporama" src="img/image11.png" style="width:100%">
              <img class="diaporama" src="img/image12.png" style="width:100%">
              <img class="diaporama" src="img/image13.jpg" style="width:100%">
              <img class="diaporama" src="img/image14.jpg" style="width:100%">
              <img class="diaporama" src="img/image15.png" style="width:100%">
              <img class="diaporama" src="img/image23.jpg" style="width:100%">
              <img class="diaporama" src="img/image24.png" style="width:100%">
              <img class="diaporama" src="img/image25.png" style="width:100%">
              <img class="diaporama" src="img/image26.png" style="width:100%">


              
            </div>
            <div>
                <h1 class="w3-center w3-text-blue">VOTRE CARRIERE COMMENCE DES AUJOURD'HUI</h1>
            </div>

    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
          var i;
          var x = document.getElementsByClassName("diaporama");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 3000); // Change image chaque 2 seconds
        }
    </script>

    </article>
    </main>


    <footer>
    <?php
    include("includes/footer.php")
    ?>
    </footer>
    
</body>
</html>