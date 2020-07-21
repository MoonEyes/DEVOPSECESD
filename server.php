<?php
include 'config.php';

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect("$DB_HOST","$DB_USERNAME", "$DB_PASSWORD", "$DB_DATABASE");





// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $statut = mysqli_real_escape_string($db, $_POST['statut']);
  $description = mysqli_real_escape_string($db, $_POST['description']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password, age, statut, description)
  			  VALUES('$username', '$email', '$password', '$age', '$statut' ,'$description')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
// info user
if (isset($_POST['info_user'])) {
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $query = "SELECT * FROM users WHERE username='$username'";
  $resultinfo = mysqli_query($db,$query);
  $resultinfo = mysqli_fetch_assoc($resultinfo);
  $_SESSION['infouser'] = $resultinfo  ;
  header('location: index.php');
}

// Info all user
if (isset($_POST['info_all_user'])) {

  $query = "SELECT username FROM users";
  $resultinfo = mysqli_query($db,$query);
  $i = 0;
  while ($tableau = mysqli_fetch_assoc($resultinfo)){
    $array[] = $tableau["username"];
    $i++;
  }
  $_SESSION['infoalluser'] = $array ;
  $_SESSION['nbligne'] = $i;
  header('location: index.php');
}


//info one user
if (isset($_POST['info_one_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $query = "SELECT * FROM users WHERE username='$username'";
  $resultinfo = mysqli_query($db,$query);
  $resultinfo = mysqli_fetch_assoc($resultinfo);
  $_SESSION['infouser'] = $resultinfo  ;
  header('location: index.php');
}


//info one user
if (isset($_POST['desuser'])) {
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $query = "DELETE FROM users WHERE username='$username'";
  if (mysqli_query($db, $query)) {
  $_SESSION['desinc'] = "Vous êtes désincris";
} else {
  $_SESSION['desinc'] = "Error";
}
  header('location: index.php');
}

//modify Statut
if (isset($_POST['modifystatut'])) {
  $statut = mysqli_real_escape_string($db,$_POST['changetext']);
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $query = "UPDATE users SET statut='$statut' WHERE username='$username'";
  if (mysqli_query($db, $query)) {
  $_SESSION['modifystatut'] = "Modification fait";
} else {
  $_SESSION['modifystatut'] = "Error";
}
  header('location: index.php');
}


//modify Statut
if (isset($_POST['modifydec'])) {
  $description = mysqli_real_escape_string($db,$_POST['changetext']);
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $query = "UPDATE users SET description='$description' WHERE username='$username'";
  if (mysqli_query($db, $query)) {
  $_SESSION['modifydec'] = "Modification fait";
} else {
  $_SESSION['modifydec'] = "Error";
}
  header('location: index.php');
}


if (isset($_POST['modifyage'])) {
  $age = mysqli_real_escape_string($db,$_POST['changetext']);
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $query = "UPDATE users SET age='$age' WHERE username='$username'";
  if (mysqli_query($db, $query)) {
  $_SESSION['modifyage'] = "Modification fait";
} else {
  $_SESSION['modifyage'] = "Error";
}
  header('location: index.php');
}

if (isset($_POST['modifyemail'])) {
  $email = mysqli_real_escape_string($db,$_POST['changetext']);
  $username = mysqli_real_escape_string($db, $_SESSION['username']);
  $query = "UPDATE users SET email='$email' WHERE username='$username'";
  if (mysqli_query($db, $query)) {
  $_SESSION['modifyemail'] = "Modification fait";
} else {
  $_SESSION['modifyemail'] = "Error";
}
  header('location: index.php');
}





?>
