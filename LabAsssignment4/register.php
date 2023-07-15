<?php // Script 8.9 - register.php
 /* This page lets people register for
the site (in theory). */

 // Set the page title and include the header file:
 define('TITLE', 'Register');
 include "/var/www/html/LearningPHP/LabAsssignment4/templates/header.php"; 

 print '<div class="container">';
 
 // Print some introductory text:
 print '<h2>Registration Form</h2>
 <p>Register so that you can take
advantage of certain features like
this, that, and the other thing.</

p>';

 // Check if the form has been submitted:
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $problem = false; // No problems so far.
  
      // Check for each value...
      if (empty(trim($_POST['first_name']))) {
        $problem = true;
        print '<p class="text--error">Please enter your first name!</p>';
      }
      if (empty(trim($_POST['last_name']))) {
        $problem = true;
        print '<p class="text--error">Please enter your lastname!</p>';
      }
  
      if (empty(trim($_POST['email']))) {
        $problem = true;
        print '<p class="text--error">Please enter your email address!</p>';
      }
  
      if (empty(trim($_POST['password1']))) {
        $problem = true;
        print '<p class="text--error">Please enter a password!</p>';
      }
  
      if ($_POST['password1'] != $_POST['password2']) {
        $problem = true;
        print '<p class="text--error">Your password did not match your confirmed password!</p>';
      }
  
      if (!$problem) { // If there weren't any problems...
  
          // Create a connection to the database
          $dbc = mysqli_connect('localhost', 'root', 'password', 'issue_tracker');
  
          // Check the connection
          if (!$dbc) {
              die('Connection failed: ' . mysqli_connect_error());
          }
  
          // Create a query to insert the user
          $query = "INSERT INTO users(first_name, last_name, email, password) VALUES (?, ?, ?, ?)";
  
          // Prepare the statement
          $stmt = mysqli_prepare($dbc, $query);
  
          // Bind the parameters
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $email = $_POST['email'];
          $password = $_POST['password1'];
  
          mysqli_stmt_bind_param($stmt, 'ssss', $first_name, $last_name, $email, $password);
  
          // Execute the query
          if (mysqli_stmt_execute($stmt)) {
              print '<p class="text--success">You are now registered!<br>Okay, you are not
              really registered but...</p>';
  
              // Clear the posted values:
              $_POST = [];
          } else {
              print '<p class="text--error">Something went wrong...</p>';
          }
  
          // Close the statement and the db connection
          mysqli_stmt_close($stmt);
          mysqli_close($dbc);
  
      } else { // Forgot a field.
  
        print '<p class="text--error">Please try again!</p>';
  
      }
  
   } // End of handle form IF.

 // Create the form:
 ?>

<form action="register.php" method="post" class="form--inline">
  <p>
    <label for="first_name">First Name:</label
    ><input
      type="text"
      name="first_name"
      size="20"
      value="<?php if (isset($_POST['first_name'])) { 
        print htmlspecialchars($_POST['first_name']); 
        } ?>"
    />
  </p>
  <p>
    <label for="last_name">Last Name:</label
    ><input
      type="text"
      name="last_name"
      size="20"
      value="<?php if (isset($_POST['last_name'])) { 
        print htmlspecialchars($_POST['last_name']); } ?>"
    />
  </p>

  <p>
    <label for="email">Email Address:</label
    ><input
      type="email"
      name="email"
      size="20"
      value="<?php if(isset($_POST['email'])) { 
        print htmlspecialchars($_POST['email']);
      } ?>"
    />
  </p>

  <p>
    <label for="password1">Password: </label
    ><input
      type="password"
      name="password1"
      size="20"
      value="<?php if (isset($_POST['password1'])) {
        print htmlspecialchars($_POST['password1']); 
        } ?>"
    />
  </p>
  <p>
    <label for="password2">Confirm Password:</label
    ><input
      type="password"
      name="password2"
      size="20"
      value="<?php if (isset($_POST['password2'])){ 
        print htmlspecialchars($_POST['password2']); 
        } ?>"
    />
  </p>

  <p>
    <input type="submit" name="submit" value="Register!" class="button--pill" />
  </p>
</form>

<?php
print '</div>';
include "/var/www/html/LearningPHP/LabAsssignment4/templates/footer.php"; 
?>