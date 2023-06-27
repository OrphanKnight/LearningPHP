<?php 
    
    define('TITLE', 'logout');
    include(dirname(__DIR__) . "/ProjectAssignment2/templates/header.php");

    //resets everything in the session array
    $_SESSION = [];

    //deletes server side session data
    session_destroy();
    
    print '<div class="container"><h1>Logout Confirmation</h1> <p class="text--success" > You have logged out successfully!</p></div>';
?>
   
 
<?php include dirname(__DIR__) . "/ProjectAssignment2/templates/footer.php"; ?>