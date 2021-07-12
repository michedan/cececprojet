<?php
error_reporting(0);
include('admin/includes/dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SYSTEME DE GESTION DES DOSSIERS CREDITS</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/heroic-features.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand" style="color: red">SYSTEME DE GESTION DES DOSSIERS CREDITS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Accueil
              <span class="sr-only">(current)</span>
            </a>
          </li>
              <li class="nav-item">
            <a class="nav-link" href="branches.php">Agences</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin/index.php">Connexion admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="staff/index.php">Connexion personnel</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
      <form name="search" method="post">
    <!-- Jumbotron Header -->
       <div class="card my-4">
          <h5 class="card-header">Numéro de reférence</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" name="searchdata" placeholder="Rechercher..." required="true">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit" name="search">Recherche</button>
              </span>
            </div>
          </div>
        </div>
</form>
    </header>

    <!-- Page Features -->
    <div class="row text-left">
<?php
if(isset($_POST['search'])){
$searchdata=$_POST['searchdata'];
$ret=mysqli_query($con,"select tblcourier.id as cid, tblcourier.RefNumber,tblcourier.SenderName,tblcourier.SenderCity,tblcourier.SenderState,tblcourier.SenderPincode,tblcourier.SenderCountry,tblcourier.RecipientName,tblcourier.RecipientCity,tblcourier.RecipientState,tblcourier.RecipientPincode,tblcourier.RecipientCountry from  tblcourier where tblcourier.RefNumber='$searchdata'");
$num=mysqli_num_rows($ret);
if($num >0){
while ($row=mysqli_fetch_array($ret)) {

?><div class="col-lg-12">
<h4 align="center" style="color:red">Numéro de reférence <?php echo $searchdata;?> Détails</h4>
<hr>
</div>
      <div class="col-lg-6 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Client</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
 
<tr>
<th> Noms du Client</th>
<td><?php  echo $row['SenderName'];?></td>
</tr> 
<tr>
<th> Montant Sollicité</th>
<td><?php  echo $row['SenderCity'];?></td>
</tr> 
<tr>
<th> Durée Sollicitée</th>
<td><?php  echo $row['SenderState'];?></td>
</tr> 
<tr>
<th>Type de Crédit</th>
<td><?php  echo $row['SenderPincode'];?></td>
</tr> 
<tr>
<!-- <th>Country</th>
<td><?php  echo $row['SenderCountry'];?></td>
</tr>  -->
</table>

          </div>
        </div>
      </div>

       <div class="col-lg-6 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Récepteur</h4>
            <hr />
  <table border="1" width="100%" style="text-align: center;">
<tr>
<th> Noms Récepteur</th>
<td><?php  echo $row['RecipientName'];?></td>
</tr> 
<tr>
<th> Contact Récepteur</th>
<td><?php  echo $row['RecipientCity'];?></td>
</tr> 
<tr>
<th> Ville Récepteur</th>
<td><?php  echo $row['RecipientState'];?></td>
</tr> 
<tr>
<th>Code Récepteur</th>
<td><?php  echo $row['RecipientPincode'];?></td>
</tr> 
<tr>
<!-- <th>Country</th>
<td><?php  echo $row['RecipientCountry'];?></td>
</tr>  -->
</table>
          </div>
        </div>
      </div>
      <?php

  $cid=$row['cid'];   
$ret=mysqli_query($con,"select remark,status,StatusDate from tblcouriertracking where  CourierId='$cid'");
$num=mysqli_num_rows($ret);
if($num>0){
?>
     <div class="col-lg-12 col-md-6 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <h4 class="card-title" align="center" style="color:blue">Historique de suivi</h4>
            <hr />
<table border="1" width="100%" style="text-align: center;">
  <tr>
    <th>Date / Heure</th>
    <th>Statut</th>
    <th>Remarque</th>
  </tr>
 <?php while ($row=mysqli_fetch_array($ret)) { ?>
<tr>
<td><?php  echo $row['StatusDate'];?></td>
<td><?php  echo $row['status'];?></td>
<td><?php  echo $row['remark'];?></td>
</tr>  
<tr>
<?php }?>
</table>

          </div>
        </div>
      </div>

<?php
} else{ ?>
<h4 style="color:red" align="center">En cours...</h4>
   <?php } }} else {  ?>

<h4 align="center" style="color:red">Numéro de référence </h4>
<?php }}?>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Sytème de gestion des dossiers crédits. TKMD2021</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
