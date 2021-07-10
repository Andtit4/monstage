<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Restaurer le mot de passe</title>
	<link rel="stylesheet" type="text/css" href="design/recovery_mdp.css">
</head>
<body>
	<form  class="box" action="POST" method="recovery_mdp.php">
		<h1>RESTAURATION DU MOT DE PASSE</h1>
		<input type="email" name="mail_restore" placeholder="Adresse mail">
		<input type="password" name="newpass" placeholder="Mot de passe">
		<input type="password" name="newpassconf" placeholder="Confirmer le mot de passe">
		<input type="submit" name="envoyer" value="Restaurer">
	</form>
</body>
</html>