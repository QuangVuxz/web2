<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- add icon link -->
  <link rel = "icon" href = 
  "https://img.freepik.com/free-vector/music-design-yellow-illustration_24877-49373.jpg?auto=format&h=200" 
          type = "image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="styleHomepage.css">  
  <title>Home</title>
</head>
<body>
     <!--Navbar-->
     <div class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">  
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                        <a href="home.php" class="navbar-brand">PIANO</a>
                    </div>
  
                    <div class="navbar-collapse collapse" id="mobile_menu">
                        <ul class="nav navbar-nav">
                            <li><a href="leaderboard.php">Leaderboard</a></li>
                            <li><a href="contactus.php">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li>
                                <form action="" class="navbar-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" placeholder="Search Anything Here..." class="form-control">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>
  
                        <ul class="nav navbar-nav navbar-right">
                            <li id="profile"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li id="logOut"><a href="index.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main page-->
    <!--Search bar-->
    <div class="search">
            <!-- Create a form element to hold the search bar -->
        <form action="https://www.google.com/webhp?hl=vi&sa=X&ved=0ahUKEwj1zvLrqZn8AhXAslYBHczWBK0QPAgI">
            <!-- Use an input element with type "text" to create the search bar -->
            <input type="text" placeholder="Search...">
            <button id="btn_search">Search</button>
        </form>
    </div>
    <!--Main container-->
    <!-- Create a container element to hold the page content -->
    <div class="container">
        <!-- Add a heading for the page -->
        <h1>Lesson: How to Play "Twinkle, Twinkle, Little Star"</h1>
        <p>Uploaded by: </p>
        <p>Date:</p>
        <!-- Add a navigation menu -->
        <ul class="nav">
        <li><a href="#">Lessons</a></li>
        <li><a href="#">Exercises</a></li>
        </ul>
        <!-- Add a video player -->
        <video width="700" height="300" controls>
            <source src="https://www.youtube.com/embed/XGSy3_Czz8k" type="video/mp4">
        </video>
        <!-- Add some text explaining the lesson -->
        <p>In this lesson, we will learn how to play the classic children's song "Twinkle, Twinkle, Little Star" on the piano. Follow along with the video and try to play along with the music. If you have any questions, you can post them in the comments section below.</p>
        </form>
        <!-- Create a form element to hold the upload file field -->
        <form action="/upload" method="post" enctype="multipart/form-data">
        <!-- Add a file input field -->
        <label for="file">Select a file to upload:</label>
        <input type="file" id="file" name="file" required>
        <!-- Add a submit button -->
        <button type="submit">Upload</button>
        </form>
        <div class="result">
            <!-- Add a heading for the score result -->
            <h1>Score Result</h1>
            <!-- Add some text to display the score -->
            <p>Your score is: <span class="score">10</span></p>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="models\User.js"></script>
    <script src="../scripts/home.js"></script>
</body>
</html>