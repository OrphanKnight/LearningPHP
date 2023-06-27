<?php 
    define('TITLE', 'Register');
    include(dirname(__DIR__) . "/LabAssignment3/templates/header.php");


    print '<div class="container"> <h1> Report and Issue </h1>';
     // Check if the form has been submitted:
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $problem = false; // No problems so far.
          
              // Check for each value...
              if (empty(trim($_POST['username']))) {
                $problem = true;
                print '<p class="text--error">Please enter your FULL name!</p>';
              }
              if (empty(trim($_POST['description']))) {
                $problem = true;
                print '<p class="text--error">Please describe the Issue!</p>';
              }
          
              if (!$problem) { // If there weren't any problems...
                $select  = $_POST['select'];
                $issuetime = $_POST['issuetime'];
                $username = $_POST['username'];
                $description = $_POST['description'];
                
                print "<p >
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
          
                // Clear the posted values:
                $_POST = [];
          
              } else { // Forgot a field.
          
                print '<p class="text--error">Please try again!</p>';
          
              }
          
           } 
    print '</div>';
?>


<div class="container">
    
    <form action="report.php" method="post" class="form--inline">
        <p>
            Request Type: 
            <select name="select" required>
                <option value="Bug Fix">Bug Fix</options>
                <option value="Feedback">Feedback</options>
                <option value="Issue">Issue</options>
            </select>
        </p>
        <p>
            Date and Time:
            <input type="datetime-local" id="issuetime" name="issuetime" required>
        </p>
        <p>
            Full Name:
            <input 
            type="text" 
            id="username" 
            name="username" 
            size="20"
            value="<?php if (isset($_POST['username'])) { 
                    print htmlspecialchars($_POST['username']); 
                    } ?>"
            
            required>
        </p>
        
        <p>
            Description:
            <p>
                <textarea 
                name="description" 
                rows="4" 
                cols="50"
                size="500"
                value="<?php if (isset($_POST['description'])) { 
                    print htmlspecialchars($_POST['description']); 
                    } ?>"
                required>
                </textarea>
            </p>
        </p>
        
        <input type="submit" name="submit" value="Report" >
    </form>
</div>
<?php include dirname(__DIR__) . "/LabAssignment3/templates/footer.php"; ?>