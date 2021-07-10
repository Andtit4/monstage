<?php
require 'config/database.php';

$stage = $bdd -> query('SELECT * FROM publications ORDER BY id_publication DESC');

?>






<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MonStage - Accueil</title>

  <!-- Bootstrap core CSS -->
  <link href="design/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="design/css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Rechercher plus facilement un stage</span>
    <span class="site-heading-lower">MON STAGE</span>
  </h1>

  <!-- Navigation -->
<?php include 'view/navbar/navbar_user.php'; ?>
</head>
<body>




<section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">


            <span class='section-heading-upper'>BIENVENU SUR MON STAGE</span>
            <span class="section-heading-lower">Comment sa marche ?</span>
          </h2>
          <p class="mb-3">Cette plateforme permet à tout utilisateur de rechercher et postuler en ligne aux différents stages proposés.
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="connexion.php">Voir les stages disponibles</a>
          </div>
        </div>
      </div>
    </div>
  </section>



</body>
</html>
