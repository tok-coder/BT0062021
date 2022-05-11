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
  .container {
  position: relative;
  text-align: center;
  color: white;
}
#mark{
    
    position: absolute;
    bottom: 300px;
  left: 16px;
  color: white;
  }
  #photo{
    
    width: 100%;
  
  }
</style>
</head>
<body >
  <div class="w3-container">
<img src="../img/mana.jpg" id="photo"alt="">
<marquee id="mark" behavior="scroll" direction="left" width="100%" >
   <h2>Bienvenue dans l'espace Administrateur</h2>
</marquee><br>
</div>
  <footer>
    <?php
    include("../includes/footer.php")
    ?>
    </footer>
</body>
</html> 

