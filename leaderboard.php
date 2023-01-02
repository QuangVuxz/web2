<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leaderboard</title>
  <!-- add icon link -->
  <link rel = "icon" href = 
  "https://img.freepik.com/free-vector/music-design-yellow-illustration_24877-49373.jpg?auto=format&h=200" 
          type = "image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
  <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }
        h1{
            text-align: center;
        }
  </style>
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
                            <!--
                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login / Sign Up <span class="caret"></span></a>
                            
                                <ul class="dropdown-menu">
                                    <li id="login"><a href="login.html">Login</a></li>
                                    <li id="register"><a href="register.html">Sign Up</a></li>
                                </ul>
                            -->
                            </li>
                            <li id="logOut"><a href="index.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!--Main page-->
  <div class="container">
    <h1>Leaderboard</h1>
    <table>
      <tr>
        <th>Rank</th>
        <th>Name</th>
        <th>Score</th>
      </tr>
      <!-- Add table rows for each leaderboard entry here -->
      <tr>
        <td>1</td>
        <td>Alice</td>
        <td>100</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Bob</td>
        <td>90</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Charlie</td>
        <td>80</td>
      </tr>
    </table>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../scripts/welcome.js"></script>
</body>
</html>

