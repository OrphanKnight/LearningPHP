<?php
// Create a connection to the database
$dbc = mysqli_connect('localhost', 'root', 'password', 'myproject');

// Check the connection
if (!$dbc) {
    die('Connection failed: ' . mysqli_connect_error());
}

try {
    // Create a query to insert the education records
    $query = "INSERT INTO education(degree, school_name, start_date, end_date) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($dbc, $query);

    $records = [
        ['B.S: Information Systems technology', 'Miami Dade College', '2018', '2023'],
        ['HighSchool', 'iMater Academy Charter Middle High School', '2014', '2018'],
        ['Middle School', 'West Miami Middle School', '2010', '2014'],
        ['Elementary', 'Seminole Elementary School', '2005', '2010'],
    ];

    foreach ($records as $record) {
        mysqli_stmt_bind_param($stmt, 'ssss', $record[0], $record[1], $record[2], $record[3]);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Error inserting education record: ' . mysqli_error($dbc));
        }
    }

    mysqli_stmt_close($stmt);

    // Create a query to insert the skill records
    $query = "INSERT INTO skills(skill_name, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($dbc, $query);

    $records = [
        ['Cloud Services', 'Amazon Web Services'],
        ['Programming Languages', 'Java, Python, C++, HTML, CSS, JavaScript, PHP'],
        ['Operating Systems', 'Windows (7, 10, 11), Linux, and iOS'],
        ['Database Design', 'SQL and Access Table and relationship development'],
        ['General Networking', 'Have taken training in Cisco, and have knowledge on Active Directory, File/Print Services'],
        ['General Navigation and Managing File Knowledge', 'Terminal and Command Line'],
    ];

    foreach ($records as $record) {
        mysqli_stmt_bind_param($stmt, 'ss', $record[0], $record[1]);
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception('Error inserting skills record: ' . mysqli_error($dbc));
        }
    }

    echo "Records inserted successfully";
}
catch (Exception $e) {
    echo $e->getMessage();
}
finally {
    mysqli_stmt_close($stmt);
    mysqli_close($dbc);
}
?>
