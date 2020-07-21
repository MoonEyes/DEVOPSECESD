<?php
          session_start();

          if (!isset($_SESSION['username'])) {
          	$_SESSION['msg'] = "You must log in first";
          	header('location: login.php');
          }
          if (isset($_GET['logout'])) {
          	session_destroy();
          	unset($_SESSION['username']);
          	header("location: login.php");
          }



?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
<h2>Home Page</h2>
</div>
<div class="content">
          	<!-- notification message -->
          	<?php if (isset($_SESSION['success'])) : ?>
              <div class="error success" >
              	<h3>
                  <?php
                  	echo $_SESSION['success'];
                  	unset($_SESSION['success']);
                  ?>
              	</h3>
              </div>
          	<?php endif ?>
<!--  -->
            <?php if (isset($_SESSION['infouser'])) : ?>
              <div class="error success" >
              	<h3>
                  <?php
                      $tableau = $_SESSION['infouser'];
                      echo $tableau['id'];
                      echo "</br>";
                      echo $tableau['email'];
                      echo "</br>";
                      echo $tableau['username'];
                      echo "</br>";
                      echo $tableau['age'];
                      echo "</br>";
                      echo $tableau['statut'];
                      echo "</br>";
                      echo $tableau['description'];

                  	  unset($_SESSION['infouser']);
                  ?>
              	</h3>
              </div>
          	<?php endif ?>
<!--  -->
            <?php if (isset($_SESSION['infoalluser'])) : ?>
              <div class="error success" >
                <h3>
                  <?php
                      $tableau = $_SESSION['infoalluser'];
                      $i= 0;
                      while ($i < $_SESSION['nbligne'])
                      {
                        print ($tableau[$i]);
                        echo "</br>";
                        $i++;
                      }
                      unset($_SESSION['infoalluser']);
                  ?>
                </h3>
              </div>
            <?php endif ?>
<!--  -->
            <?php if (isset($_SESSION['desinc'])) : ?>
              <div class="error success" >
                <h3>
                  <?php
                    echo  $_SESSION['desinc'];
                    unset ($_SESSION['desinc']);
                    session_destroy();
                  	unset($_SESSION['username']);
                    ?>

                    <p>
                    Se connecter <a href="login.php">Sign up</a>
                  </p>

                </h3>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['modifystatut'])) : ?>
              <div class="error success" >
                <h3>
                  <?php
                    echo  $_SESSION['modifystatut'];
                    unset ($_SESSION['modifystatut']);
                    ?>
                </h3>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['modifydec'])) : ?>
              <div class="error success" >
                <h3>
                  <?php
                    echo  $_SESSION['modifydec'];
                    unset ($_SESSION['modifydec']);
                    ?>
                </h3>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['modifyage'])) : ?>
              <div class="error success" >
                <h3>
                  <?php
                    echo  $_SESSION['modifyage'];
                    unset ($_SESSION['modifyage']);
                    ?>
                </h3>
              </div>
            <?php endif ?>

            <?php if (isset($_SESSION['modifyemail'])) : ?>
              <div class="error success" >
                <h3>
                  <?php
                    echo  $_SESSION['modifyemail'];
                    unset ($_SESSION['modifyemail']);
                    ?>
                </h3>
              </div>
            <?php endif ?>



            <!-- logged in user information -->
            <?php  if (isset($_SESSION['username'])) : ?>
            	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
              <p> <a href="info.php"  style="color: red;">info perso</a> </p>
              <div class="input-group">
                <form method="post" action="info.php">
                <button type="submit" class="btn" name="info_user">Afficher les info de l'utilisateur</button>
              </div>
              </from>


            <?php endif ?>
        </div>

</body>
</html>
