<?php

session_start();
if(isset($_SESSION['nom'])){

  header('location:profile.php');

}




include "inc/functions.php";

$showRegistrationAlert=0;

$categories=getAllCategories($conn);

if(!empty($_POST)){
  
  if(AddVisiteur($conn,$_POST)){
    $showRegistrationAlert=1;

  }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-fleur</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.min.css">
</head>
</head>
<body>
   
<?php

include "inc/header.php";

 ?>

      <!--fin nav-->
<div class="col-12 p-5">
    <h1 class="text-center">Registre</h1>
    <form action="registre.php" method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"> nom </label>
            <input type="text" name="nom"  class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"> prenom </label>
            <input type="text"  name="prenom"  class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">tele </label>
            <input type="text" name="telephone"  class="form-control" id="exampleInputPassword1">
          </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mot de passe </label>
          <input type="password" name="mp"  class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>

    </div>

       <!--footer-->
       <?php
   
   include "inc/footer.php"
    

    ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.all.min.js"></script>

<?php
if($showRegistrationAlert==1){
  print "<script>
  Swal.fire({
    title: 'Success',
    text: 'Creation de compte avec success',
    icon: 'Success',
    confirmButtonText: 'OK',
    timer:2000
  })
  
  </script>";
  
}

?>

</html>