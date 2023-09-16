<?php
define('ERROR_LOG','C:/Temp/logs/errors.log');

function dbConnect($usertype, $connectionType = 'mysqli', $db) {
    $host = 'localhost';
    $port = '3307';

    if ($usertype == 'read') {
        $user = 'psread';
        $pwd = 'K1yoMizu^dera';
    } elseif ($usertype == 'write') {
        $user = 'pswrite';
        $pwd = '0Ch@Nom1$u';
    } else {
        exit('Unrecognized user');
    }
    
    if ($db == 'db1') {
        $db = 'portfoliodb';
    } elseif ($db == 'db2') {
        $db = 'blog_db';
    } else {
        exit('Unrecognized user');
    }

    if ($connectionType == 'mysqli') {
	try {
            $conn = @ new mysqli($host, $user, $pwd, $db, $port);
        if ($conn->connect_error) {
            exit($conn->connect_error);
        }
		return $conn;
	} catch(Exception $e) {
		echo $e->getMessage();
	}	

    } else {
		if ($connectionType == 'pdo') {
    try {
            return new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pwd);
    } catch (PDOException $e) {
            echo $e->getMessage();
    }
        }
	}
}
?>