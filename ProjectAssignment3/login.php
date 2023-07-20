<?php 
 // Set the page title and include the
 define('TITLE', 'Login');
 include(dirname(__DIR__) . "/ProjectAssignment3/templates/header.php"); 

print '<div class="container">';

 // Print some introductory text:
 print '<h2>Login Form</h2>
 <p>Users who are logged in can take
advantage of certain features like
this, that, and the other thing.
</p>';

$sql = 'SELECT username, password FROM user';

$result = mysqli_query($dbc, $sql); 

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

 // Check if the form has been submitted:
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Handle the form:
    if ( (!empty($_POST['username'])) && (!empty($_POST['password'])) ) {

        // Hash the password entered in the form:
        $hashed_password = sha1($_POST['password']);

        $loggedIn = false;  // Variable to store login state
    
        // Go through each user in the database
        foreach($users as $user){
          if((strtolower($_POST['username']) == $user['username']) && ($hashed_password == $user['password'])){
            // Indicate they are logged in:
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            print '<p class="text--success"> '. $user['username'] .', You have logged in!</p>';
            $loggedIn = true;
            break;
          }
        }

        // If no match was found after checking all users
        if (!$loggedIn) {
          print '<p class="text--error">The submitted username and password do not match those on file!</p>';
        }

} else { // Forgot a field.
    print '<p class="text--error">Please make sure you
        enter both an username 
        and a password!<br>Go back
        and try again.</p>';
    }

} else { // Display the form.
?>
<form
  action="login.php"
  method="post"
  class="form--inline"
>
  <p>
    <label for="username">Username :</label
    ><input type="text" name="username" size="20" />
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
include(dirname(__DIR__) ."/ProjectAssignment3/templates/footer.php"); 
?>
