<?php 
 // Set the page title and include the
 define('TITLE', 'Login');
 include "/var/www/html/LearningPHP/LabAsssignment4/templates/header.php"; 

print '<div class="container">';

 // Print some introductory text:
 print '<h2>Login Form</h2>
 <p>Users who are logged in can take
advantage of certain features like
this, that, and the other thing.
</p>';

$sql = 'Select email, password FROM users';

$result = mysqli_query($dbc, $sql); 

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($users[0]);

 // Check if the form has been submitted:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle the form:
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
          $loggedIn = false;  // Variable to store login state
      
          // Go through each user in the database
          foreach($users as $user){
            if((strtolower($_POST['email']) == $user['email']) && ($_POST['password'] == $user['password'])){
              // Indicate they are logged in:
              $loggedIn = true;
              print '<p class="text--success"> '. $user['email'] .', You have logged in!</p>';
              break; // exit the loop if a match is found
            }
          }
      
          // If no match was found after checking all users
          if (!$loggedIn) {
            print '<p class="text--error">The submitted email address and password do not match those on file!</p>';
          }
        } else {
          print '<p class="text--error">Please make sure you enter both an email address and a password!<br>Go back and try again.</p>';
        
      } 

} else { // Display the form.
?>
<form
  action="login.php"
  method="post"
  class="form--inline"
>
  <p>
    <label for="email">Email Address:</label
    ><input type="email" name="email" size="20" />
  </p>
  <p>
    <label for="password">Password: </label
    ><input type="password" name="password" size="20" />
  </p>
  <p>
    <input type="submit" name="submit" value="Log In!" class="button--pill" />
  </p>
</form>


<?php } print '</div>'; 
include "/var/www/html/LearningPHP/LabAsssignment4/templates/footer.php"; 
?>
