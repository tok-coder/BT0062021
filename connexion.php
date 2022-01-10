<?php

    $user="root";
     $password="";
     
       try{
          $sdb=new PDO('mysql:host=localhost;dbname=projet_bootcamp',$user,$password);  
       }
       catch(PDOException $e){
          echo $e->getMessage();
       }
?>