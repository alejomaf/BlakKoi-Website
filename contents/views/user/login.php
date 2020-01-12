<?php
    session_start();
    require '../../connections/database.php';
    
  if (isset($_SESSION['user_id'])) {
    header('Location: ../userRegister/home.php');
  }
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && ($_POST['password']===$results['password'])) {
     $_SESSION['user_id'] = $results['id'];
      if($_SESSION['user_id']=="1") header("Location: ../userAdmin/home.php");
      else header("Location: ../userRegister/home.php");

    }else {
      echo $message = 'Sorry, those credentials do not match';
      header("Location: ../userRegister/home.php");
    }
    //password_verify($_POST['password'], $results['password']))
  }
?>
