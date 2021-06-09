<?php
session_start();

// initializing variables
$first_name = "";
$last_name ="";
$email= "";
$g_name = "";
$group_size = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'chamareg');

// REGISTER USER
if (isset($_POST['processing'])) {
  // receive all input values from the form
  $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
  $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $g_name = mysqli_real_escape_string($db, $_POST['g_name']);
  $group_size = mysqli_real_escape_string($db, $_POST['group_size']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($first_name)) { array_push($errors, "First Name is required"); }
  if (empty($last_name)) { array_push($errors, "Last Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }  
  if (empty($g_name)) { array_push($errors, "Group name is required"); }
  if (empty($group_size)) { array_push($errors, "Number of members is required"); }
  


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE g_name='$g_name' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['g_name'] === $g_name) {
      array_push($errors, "Group Name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (first_name, last_name, email, password, g_name, group_size) 
  			  VALUES('$first_name', '$last_name', '$email', '$password', '$g_name', '$group_size')";
  	mysqli_query($db, $query);
  	$_SESSION['first_name'] = $first_name;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: member.php');
  }
}

//
// LOGIN USER

if (isset($_POST['login_user'])) {
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

if (empty($email)) {
  array_push($errors, "Email required!!");
}
if (empty($password)) {
  array_push($errors, "Password is required");
}
if (count($errors)==0) {
  $password = md5($password);
  $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  $results = mysqli_query($db, $query);
  if (mysqli_num_rows($results)==1) {
    $_SESSION['first_name'] = $first_name;
    $_SESSION['success'] = "Login Successful!";
    header('location: member.php');
  }else{
    array_push($errors, "Wrong email/ password COMBINATION");
  }
}
}
?>