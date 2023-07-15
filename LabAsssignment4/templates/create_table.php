<?php

// Database connection
try{
    $dbc = mysqli_connect(
        'localhost', 
        'root', 
        'password', 
        'issue_tracker'
    );

    // SQL query to create table
    $query = "CREATE TABLE users (
        id INT(11) AUTO_INCREMENT PRIMARY KEY, 
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL
    )";

    // Execute the query
    $result = mysqli_query($dbc, $query);

    // Check the result and output a message
    if ($result) {
        echo 'User Table created successfully!';
    } else {
        echo 'Error creating table: ' . mysqli_error($dbc);
    }
} catch(mysqli_sql_exception $e){
    print '<p style="color:red"> Could NOT query to the database!  '. mysqli_error($dbc) .'</p>';

}

$query = "CREATE TABLE issues (
    id INT(11) AUTO_INCREMENT PRIMARY KEY, 
    issue_type VARCHAR(50) NOT NULL,
    issue_time DATETIME NOT NULL,
    user_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
)";

// Execute the query
$result = mysqli_query($dbc, $query);

// Check the result and output a message
if ($result) {
    echo 'Issues table created successfully!';
} else {
    echo 'Error creating table: ' . mysqli_error($dbc);
}
?>