<?php

session_start();

include "inc/functions.php";

$categories= getAllCategories($conn);

if(isset($_POST['search']) && !empty($_POST['search'])){
 

    $produit = searchProduits($conn,$_POST['search']);
}
else{
  $produit= getAllProducts($conn);
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-fleur</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
   
    <?php

   include "inc/header.php";

    ?>

      <div class="row col-12 mt-4">

      <?php

 foreach($produit as $produits){
  
  print '<div class="col-3 mt-2">
  <div class="card" style="width: 18rem;">
      <img src="images/'.$produits['image'].'" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">'.$produits['nom'].'</h5>
        <p class="card-text"> '.$produits['description'].'</p>
        <a href="produit.php?id='.$produits['id'].'" class="btn btn-primary">Afficher</a>
      </div>
    </div>
 </div>';
 }

    ?>
        
    <?php
   
   include "inc/footer.php"
    

    ?>
       
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>