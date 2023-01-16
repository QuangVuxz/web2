<?php
      include 'config.php';
      session_start();
      
      if(isset($_POST['submit'])){
        $username = $_POST['username'];        
        $password = $_POST['password'];        

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE username='$username' AND password='$password'") or die('query failed');
        if(mysqli_num_rows($select)>0){
          $row = mysqli_fetch_assoc($select);
          $_SESSION['user_id'] = $row['id'];
          header('location:./Playsong/PlaySong.php');
        }else{
          $message[] = 'INCORRECT USERNAME OR PASSWORD!';
        }      
      }                         
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>    
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>      
      .message{
        color: red;
        text-align: center;
      }
    </style>    
  </head>
  <body>  
    <div class="login-box">     
      
      <form class="d-flex" accept="" method="post" enctype="multipart/form-data" >
        <div class="left">
          <img src="https://thevisiblegirl01home.files.wordpress.com/2018/12/c76f92554791df779c35dbb5e4a53c45.jpg" alt="">
        </div>
        <div class="right">
          <h2>SIGN IN</h2>
          <div class="row d-flex flex-column">
            <div class="col">
              <div class="user-box">
                <input id="username" type="text" name="username" placeholder="Username" required=""/>
              </div>
            </div>
            <div class="col">
              <div class="user-box">
                <input id="password" type="password" name="password" placeholder="Password" required=""/>
              </div>
            </div>
            <div class="col">
              <?php
                if(isset($message)){
                  foreach($message as $message){
                    echo '<div class="message">'.$message.'<div>';
                  }
                }
              ?>
            </div>
            <div class="col">
              <div class="button-form">
                <input type="submit" name="submit" id="submit" value="Login">          
                <div id="register">
                  Don't have an account?
                  <a id="btn-register" href="register.php">Register</a>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </form>
    </div>
    <script src="../models/User.js"></script>
    <script src="login_script.js"></script>
  </body>
</html>
          
          
          