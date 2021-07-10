<?php
require 'config/database.php';

$getid = intval($_GET['id']);

$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');



$stage = $bdd -> query('SELECT * FROM publications ORDER BY id_pub DESC');
?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Stage - Disponible</title>

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
<?php require 'view/navbar/navbar_start.php'; ?>
</head>
<body>
    <div class="intro-text  text-center bg-faded p-5 rounded">
        <h2>Stage disponible</h2>
        <?php while ($stageinfo = $stage -> fetch()){ ?>

                    <a class="btn btn-primary btn-xl" href= "control_stage.php?id_pub=<?= $stageinfo['id_pub']; ?>&id=<?= $getid ;?>"><br><?=$stageinfo['titre_pub'];?><br></a>
        <?php } ?>
    </div>


</body>
</html>
