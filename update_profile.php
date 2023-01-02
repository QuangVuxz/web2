<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel = "icon" href = 
  "https://img.freepik.com/free-vector/music-design-yellow-illustration_24877-49373.jpg?auto=format&h=200" 
          type = "image/x-icon">
   <title>Update Profile</title>
   <link rel="stylesheet" href="styles.css">k
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <?php
        include 'config.php';
        session_start();
        $user_id = $_SESSION['user_id'];

        if(isset($_POST['update_profile'])){
            $update_username = mysqli_real_escape_string($conn, $_POST['update_username']);
            $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

            mysqli_query($conn, "UPDATE `user_form` SET username='$update_username', email='$update_email' WHERE id='$user_id'") or die('query failed');

            $old_pass = $_POST['old_pass'];
            $confirm_old_pass = mysqli_real_escape_string($conn, md5($_POST['confirmOldPassword']));
            $new_pass = mysqli_real_escape_string($conn, md5($_POST['newPassword']));
            $confirm_new_pass = mysqli_real_escape_string($conn, md5($_POST['confirmNewPassword']));

            if(!empty($confirm_old_pass) || !empty($new_pass) || !empty($confirm_new_pass)){
                if($confirm_old_pass != $old_pass){
                    $message[] = 'old password not matched!';
                }elseif($confirm_new_pass != $new_pass){
                    $message[] = 'new password not matched!';
                }else{
                    mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_new_pass' WHERE id='$user_id'") or die('query failed');
                    $message[] = 'password updated successfully!';
                }
            }
        
            $update_image = $_FILES['update_image']['name'];
            $update_image_size = $_FILES['update_image']['size'];
            $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
            $update_image_folder = 'uploaded_img/' .$update_image;

            if(!empty($update_image)){
                if($update_image_size > 2000000){
                    $message[] = 'image is too large';
                }else{
                    $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id='$user_id'") or die('query failed');
                    if($image_update_query){
                        move_uploaded_file($update_image_tmp_name, $update_image_folder);
                    }
                    $message[] = 'image updated successfully!';
                }
            }
        }
    ?>
    <style>
    #update-btn{
        text-decoration: none;
        padding: 10px 20px;
        color: #cbbddb;
        font-size: 16px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        letter-spacing: 4px;
        border: 1px solid #8f7cec;
        margin: auto;    
    }
    .message{
        color: white;
        justify-content: center;
    }
    .box{   
        width: 100%;   
        font-size: 16px;
        color: #fff;        
        border: none;
        border-bottom: 1px solid #fff;
        outline: none;
        background: transparent;
    }
    </style>
</head>
<body>
   <div class="update-profile">
        <?php
            if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">'.$message.'<div>';
            }
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row my-5">
                <div class="col">
                    <?php
                        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                        if (mysqli_num_rows($select)>0){
                            $fetch = mysqli_Fetch_assoc($select);
                        }
                        if($fetch['image']==''){
                            echo '<img style = "height: 150px; width: 150px; border-radius: 50%; object-fit: cover;" src = "images/default-avatar.png">';
                        }else{
                            echo '<img style = "height: 150px; width: 150px; border-radius: 50%; object-fit: cover;" src="uploaded_img/'.$fetch['image'].'">';
                        }
                    ?>
                </div>
            </div>               
            <div class="container-fluid d-flex">                             
                <div class="row d-flex flex-column gy-4">                    
                    <div class="col">                        
                        <span>Username: </span>                                             
                    </div>
                    <div class="col">
                        <span>Email: </span>                            
                    </div>
                    <div class="col">
                        <span>Old password</span>                           
                    </div>
                    <div class="col">
                        <span>New password: </span>                            
                    </div>
                    <div class="col">
                        <span>Confirm password: </span>                           
                    </div>
                    <div class="col">
                        <span>Upload avatar:</span>                          
                    </div>
                </div>
                <div class="row d-flex flex-column gy-4 mx-3">
                    <div class="col">                        
                        <input type="text" name="update_username" placeholder="Username" value="<?php echo $fetch['username'];?>" class="box">                                             
                    </div>
                    <div class="col">
                        <input type="text" name="update_email" placeholder="Email" value="<?php echo $fetch['email'];?>" class="box">                            
                    </div>                    
                    <div class="col">
                        <input type="hidden" name="old_pass" value="<?php echo $fetch['password'];?>">
                        <input type="password" name="confirmOldPassword" placeholder="Old password" value="" class="box">                              
                    </div>
                    <div class="col">
                        <input type="password" name="newPassword" placeholder="New password" value="" class="box">                          
                    </div>
                    <div class="col">
                        <input type="password" name="confirmNewPassword" placeholder="Confirm new password" value="" class="box">                           
                    </div>
                    <div class="col">
                        <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">                          
                    </div>
                </div>                
            </div>
            <div class="row d-flex flex-column gy-4 py-5">
                <div class="col">
                    <input type="submit" value="Update profile" name="update_profile" id="update-btn">             
                </div>
                <div class="col"><a href="profile.php">Go back</a></div>
            </div>
        </form>        
  </div>    
</body>
</html>
