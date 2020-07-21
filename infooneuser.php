<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
    <div class="input-group">
  		<label>Nom de l'utilisateur</label>
  		<input type="test" name="username">
  	</div>
    <div class="input-group">
      <button type="submit" class="btn" name="info_one_user">Afficher les infos de l'utilisateur souhaiter</button>
  </form>
</body>
</html>
