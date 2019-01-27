<?php
// create connetion to the database with PDO @ 2017.07.06 
try {
    $pdo = new PDO('mysql:host=localhost;dbname=auth', 'root', 'root');
} catch (PDOException $e) {
    exit('Database error.');
}

?>
