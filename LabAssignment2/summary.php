<?php 
include "header.php"; 

$select  = $_POST['select'];
$issuetime = $_POST['issuetime'];
$username = $_POST['username'];
$description = $_POST['description'];

print "<p>
    Thank you <b>$username</b>:
    <br> 
    Your request has been submitted.
</p>";

print "<p>
    Summary of request:
    <br>
    Type: $select
    <br>
    Date and Time: $issuetime
    <br>
    Description:
    $description
</p>";

include "footer.php"; ?>
