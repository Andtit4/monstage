<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=monstage;charset=utf8', 'root', '');

$id_pub = intval($_GET['id_publication']);

$id_stagiaire = intval($_GET['id']);


$req = $bdd -> prepare("SELECT * FROM publications WHERE id_pub = ? ");

$req -> execute(array($id_pub));

$pub_info = $req -> fetch();

$admin = $pub_info['id_admn'];

$req1 = $bdd -> prepare("SELECT * FROM administrateur WHERE id_admin = ? ");

$req1 -> execute(array($admin));

$admin_info = $req1 -> fetch();


$contenu = $pub_info['titre_pub'];

$postule = $bdd -> prepare("INSERT INTO postuler(id_post,contenu_post,stagiaire,administrateur) VALUES ('', ?, ? , ?)");

$postule -> execute(array($contenu , $id_stagiaire , $admin));

header('Location: profil.php?id='.$id_stagiaire);

 ?>
