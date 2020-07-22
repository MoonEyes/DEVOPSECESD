<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>info</h2>
  </div>


  <form method="post" action="info.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <button type="submit" class="btn" name="info_user">Afficher les info de l'utilisateur</button>

    </div>
    <p>
    <div class="input-group">
      <button type="submit" class="btn" name="info_all_user">Afficher les infos de tous les utilisateurs</button>

    </div>
    <p>
    <p> <a href="infooneuser.php"  style="color: red;">info sur un utilisateur perso</a> </p>
    <div class="input-group">
      <button type="submit" class="btn" name="desuser">Se déinscrire du site</button>

    </div>
    <p> <a href="modifyuser.php"  style="color: red;">Modifier information utilisateur</a> </p>








  </body>
  </html>
