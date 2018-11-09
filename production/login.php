<?php 
include('db/dbh.php');
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    include('db/dbh.php');

    $query = "SELECT * FROM systemusers WHERE username='$username' AND password='$password'";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    $username_db = $row['username'];
    $password_db = $row['password'];


    if($username_db == $username && $password_db == $password){
        $_SESSION['user']   = $username;
        $_SESSION['id']     = $id_db;

        header("Location: index.php");
    }
    else{
        echo "<script>window.alert('Username or Password Incorrect!')</script>";
    }


}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inventory </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action='login.php' method='post'>
              <h1>Login</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name='username' required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name='password' required />
              </div>
              <div>
                <input class="btn btn-default submit" type='submit' name='login' value='Login'/>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div>
                  <h1><i class="fa fa-folder"></i> Emerald Inventory System</h1>
                  <p>©<?php echo date('Y') ?> All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
