
<?php
session_start();
if(isset($_SESSION['nom'])){

  header('location:profile.php');

}






include "inc/functions.php";
$user=true;

$categories=getAllCategories($conn);

if (!empty($_POST)) {
  $user = ConnectVisiteur($conn, $_POST);
  if ($user !== false) {
      session_start();
      $_SESSION['email'] = $user['email'];
      $_SESSION['nom'] = $user['nom'];
      $_SESSION['prenom'] = $user['prenom'];
      $_SESSION['mp'] = $user['mp'];
      $_SESSION['telephone'] = $user['telephone'];
      header('location:profile.php');
  }}
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

<body>
   
<?php

include "inc/header.php";

 ?>

      <!--fin nav-->
<div class="col-12 p-5">
      <form action="connexion.php" method="post">
        <h1 class="text-center">Connexion</h1>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Mot de passe </label>
          <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">connecter</button>
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
if(!$user){
  print "<script>
  Swal.fire({
    title: 'Erreur',
    text: 'Cordonnes non valide ',
    icon: 'Ereur',
    confirmButtonText: 'OK',
    timer:2000
  })
  
  </script>";
  
}

?>
</html>