<?php
/*Prompting a User to Download a pdf file */


// define error page (one of part to be changed)
$error = 'http://localhost/myfolio/error.php';
// define the path to the download folder(other part to be changed)
$filepath = './CV/';

$getfile = NULL;

// block any attempt to explore the filesystem
if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
   $getfile = htmlspecialchars($_GET['file'], ENT_COMPAT|ENT_HTML5, 'UTF-8', false);
} else {
   header("Location: $error");
  exit;
}

if ($getfile) {
    $path = $filepath . $getfile;
    // check that it exists and is readable
    if (file_exists($path) && is_readable($path)) {
       // send the appropriate headers
       header('Content-Type: application/pdf');
       header('Content-Length: '. filesize($path));
       header('Content-Disposition: attachment; filename=' . $getfile);
       header('Content-Transfer-Encoding: binary');
       // output the file content
       readfile($path);
    } else {
       header("Location: $error");
    }
}