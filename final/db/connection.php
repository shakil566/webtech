<?php
    $localhost = 'localhost';
    $dbuser = 'root';
    $dbpassword = '';
    $database = 'library';

    function getConnection(){
        global $localhost;
        global $dbuser;
        global $dbpassword;
        global $database;
        
        $conn= mysqli_connect($localhost, $dbuser, $dbpassword, $database);
        return $conn;
    }
?>