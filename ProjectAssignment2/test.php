<?php 
    

    define('TITLE', 'logout');
    include(dirname(__DIR__) . "/ProjectAssignment2/templates/header.php");

    print '<div class="container"><h1>Logout Confirmation</h1> <p class="text--success" >  '.$_SESSION['email'].' logged out successfully!</p></div>';
?>
   
 
<?php include dirname(__DIR__) . "/ProjectAssignment2/templates/footer.php"; ?>