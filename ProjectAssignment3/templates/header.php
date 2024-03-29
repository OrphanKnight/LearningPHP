<!-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <p>Created by: Eriel Valdes Caballero</P>
    <p>"`-._,-'"`-._,-'"`-._,-'"`-._,-'</p>
  </head> -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="HandheldFriendly" content="True" />
    <title>Lab Assignment 3!</title>
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="css/concise.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="css/masthead.css"
    />
  </head>
  <body>
    <header container class="siteHeader">
      <div row>
        <h1 column="4" class="logo">
          <a href="index.php">Eriel Valdes Caballero!</a>
        </h1>
        <nav column="8" class="nav">
          <ul>
            <li>
              <a href="register.php">Register</a>
            </li>
            <li>
              <a href="login.php">Login</a>
            </li>
            <li>
              <a href="education.php">Education</a>
            </li>
            <li>
              <a href="skills.php">Skills</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

  <!-- Database Start-->
    <?php
    if($dbc = mysqli_connect(
        'localhost', 
        'root', 
        'password', 
        'myproject'
        )) {
          print '<p> Successfully connected to the database!</p>';
      }else{
          print '<p style="color:red"> Could NOT connected to the database!</p>';
        }
    ?>

    <!-- Session Start-->
    <?php 
      session_start();
        if ($_SESSION['loggedin'] == false){
          if (!($_SERVER['REQUEST_URI'] == '/LearningPHP/ProjectAssignment3/login.php' || $_SERVER['REQUEST_URI'] == '/LearningPHP/ProjectAssignment3/register.php')) {
            header("Location: login.php");
          }
        }
      
    ?>

    <main container class="siteContent">
      <!-- BEGIN CHANGEABLE CONTENT. -->
      <!-- Script 8.2 - header.html -->
    </main>
  </body>
</html>
