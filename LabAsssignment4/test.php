<?php 
    

    define('TITLE', 'logout');
    include "/var/www/html/LearningPHP/LabAsssignment4/templates/header.php"; 

    print '<div class="container"><h1>Logout Confirmation</h1> <p class="text--success" >  '.$_SESSION['email'].' logged out successfully!</p></div>';
?>
   
 
<?php include "/var/www/html/LearningPHP/LabAsssignment4/templates/footer.php"; ; ?>