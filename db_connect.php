<?php
 ob_start();

 require_once './includes/db_connect.php';
 require_once './includes/utility_funcs.php';

 $conn = dbConnect('read', 'pdo', "db1");
 $qry = $conn->query("SELECT *, CONCAT(first_name, ' ', last_name) AS name FROM about_me LIMIT 0, 1");
 foreach ($qry->fetch() as $key => $value) {
          $meta[$key] = $value;
  }
?>

