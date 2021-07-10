<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage', 'root', '');

$id_stage = intval($_GET['content']);

$admin = intval($_GET['admin']);

$stagiaire = intval($_GET['stagiaire']);

$val = "OUI";

$req1 = $bdd -> query("SELECT * FROM postuler Po, inscription I, administrateur A, publications P
  WHERE Po.stagiaire = I.id AND Po.administrateur = A.id_admin AND P.id_admn = A.id_admin
");

$a = $req1 -> fetch();

$idu = $a['id'];


$req2 = $bdd -> query("UPDATE postuler SET valider = '$val' WHERE stagiaire = '$stagiaire'");

header("Location: profil_admin.php?admin=".$admin);


 ?>
