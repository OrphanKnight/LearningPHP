<?php 
 // Set the page title and include the
 define('TITLE', 'Login');
 include(dirname(__DIR__) . "/ProjectAssignment2/templates/header.php"); 

print '<div class="container">';

 // Print some introductory text:
 print '<h2>Login Form</h2>
 <p>Users who are logged in can take
advantage of certain features like
this, that, and the other thing.
</p>';

 // Check if the form has been submitted:
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Handle the form:
    if ( (!empty($_POST['email'])) && (!empty($_POST['password'])) ) {
      if (isset($_SESSION['registered_users'])) {
        foreach ($_SESSION['registered_users'] as $user) {
          if ($_POST['email'] == $user['email'] && $_POST['password'] == $user['password']) 
        { // Correct!

            //session code
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['loggedin'] = time();

            print '<p class="text--success">'.  $_SESSION['email'] .' is logged
            in!</p>';

            date_default_timezone_set('America/New_York');

            print '<p class="text--success"> You have logged in at '.  date("g:i a", $_SESSION['loggedin']) .'!</p>';
            print '<p><a href="logout.php">Logout</a></p>';
            print '<p><a href="test.php">test</a></p>';
            break;
          }
        }
        } else { // Incorrect!

        print '<p class="text--error">The submitted email
                address and password do not
                match those on file!<br>Go
                back and try again.</p>';

        }

} else { // Forgot a field.
    print '<p class="text--error">Please make sure you
        enter both an email address
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
include(dirname(__DIR__) ."/ProjectAssignment2/templates/footer.php"); 
?>
