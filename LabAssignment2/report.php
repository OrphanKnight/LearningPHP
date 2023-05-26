<?php include "header.php"; ?>

<form action="summary.php" method="POST">
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
        <input type="text" id="username" name="username" required>
    </p>
    
    <p>
        Description:
        <p>
            <textarea name="description" rows="4" cols="50" required>
            </textarea>
        </p>
    </p>
    
    <input type="submit" name="submit" value="summary">
</form>

<?php include "footer.php"; ?>