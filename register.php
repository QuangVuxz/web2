<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- add icon link -->
  <link rel = "icon" href = 
  "https://img.freepik.com/free-vector/music-design-yellow-illustration_24877-49373.jpg?auto=format&h=200" 
          type = "image/x-icon">
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./css/style.css" />
    <style>
      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        font-family: Arial, sans-serif;
      }
      
      li {
        float: right;
      }
      
      li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      
      li a:hover {
        background-color: #111;
      }
      h1 {
        font-size: 3em;
        text-align: center;
        margin: 1em 0;
        color: white;
      }
      
      p {
        font-size: 1.5em;
        line-height: 1.5;
        margin: 0.5em 0;
        color: white;
      }
      .message{
        color: white;
        justify-content: center;
      }
    </style>
    <?php
      include 'config.php';
      
      if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST['passwordConfirm']));
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/' .$image;

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE username='$username' AND password='$password'") or die('query failed');
        if(mysqli_num_rows($select)>0){
          $message[] = 'user already exist';
        }else{
          if($password != $cpassword){
            $message[] = 'confirm password not matched!';          
          }elseif($image_size > 2000000){
            $message[] = 'image is too large';
          }else{
            $insert = mysqli_query($conn, "INSERT INTO `user_form`(username, email, password, image) VALUES('$username', '$email', '$password', '$image')") or die('query failed');
            if($insert){
              move_uploaded_file($image_tmp_name, $image_folder);
              $message[] = 'registered successfully!';
              header('location:login.php');
            }else{
              $message[] = 'registration failed!';
            }
          }
        }
      }
    ?>
  </head>

  <body>
    <nav>
      <ul>
        <li><a href="register.php" style="color:red">Register</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
    <div class="login-box">
      <h2>Register</h2>
      <?php
        if(isset($message)){
          foreach($message as $message){
            echo '<div class="message">'.$message.'<div>';
          }
        }
      ?>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="user-box">
          <input type="text" name="username" placeholder="Username" required=""/>
        <div class="user-box">
          <input type="text" name="email" placeholder="Email" required=""/>
        </div>        
        </div>
        <div class="user-box">
          <input type="password" name="password" id="password" placeholder="Password" required=""/>
        </div>
        <div class="user-box">
          <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Password confirm" required=""/>
        </div>
        <div class="user-box">
          <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" placeholder="Choose image" class="box">  
        </div>
        <div class="button-form">
          <input type="submit" name="submit" value="Register" id="submit">          
          <div id="register">
            Already have an account?
            <a href="login.html">Login here</a>
          </div>
        </div>
      </form>
    </div>
    <script src="../models/User.js"></script>
    <script src="../scripts/register.js"></script>
  </body>
</html>
