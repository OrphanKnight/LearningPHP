<?php 
    
    define('TITLE', 'logout');
    include "/var/www/html/LearningPHP/LabAsssignment4/templates/header.php"; 
    

    //resets everything in the session array
    $_SESSION = [];

    //deletes server side session data
    session_destroy();
    
    print '<div class="container"><h1>Logout Confirmation</h1> <p class="text--success" > You have logged out successfully!</p></div>';
?>
   
 
<?php include "/var/www/html/LearningPHP/LabAsssignment4/templates/footer.php";  ?>