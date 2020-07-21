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
  		<label>Texte de la motification</label>
  		<input type="text" name="changetext">
  	</div>
    <div class="input-group">
      <button type="submit" class="btn" name="modifystatut">Changer son statut</button>

    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="modifydec">Changer sa description</button>

    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="modifyage">Changer son age</button>

    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="modifyemail">Changer son email</button>
  
  </div>
  </form>
</body>
</html>
