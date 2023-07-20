<?php
$servername = "localhost";
$username = "root";
$password = "password";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // create database
    $sql = "CREATE DATABASE IF NOT EXISTS myproject";
    $conn->exec($sql);
    
    // select database
    $sql = "use myproject";
    $conn->exec($sql);

    // create table user
    $sql = "CREATE TABLE user (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(50) NOT NULL
    )";
    $conn->exec($sql);

    // create table education
    $sql = "CREATE TABLE education (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    degree VARCHAR(50) NOT NULL,
    school_name VARCHAR(50) NOT NULL,
    start_date VARCHAR(50) NOT NULL,
    end_date VARCHAR(50)
    )";
    $conn->exec($sql);

    // create table skills
    $sql = "CREATE TABLE skills (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(255) NOT NULL,
    description VARCHAR(255)
    )";
    $conn->exec($sql);

    echo "Database and tables created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
