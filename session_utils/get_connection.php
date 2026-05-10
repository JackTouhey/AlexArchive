<?php
    $onPi = PHP_OS == "Linux";
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "root");
    if ($onPi) {
        define("DBNAME", "alexarchive");
    } else {
        define("PORT", 42069);
        define("DBNAME", "alex_archive_db");
    }

    function getConnection() {

        if(PHP_OS == "Linux") {
            $conn = pg_connect("host=" . HOST . " dbname=" . DBNAME . " user=" . USER . " password=" . PASSWORD);
        } else {
            $conn = pg_connect("host=" . HOST . " port=" . PORT . " dbname=" . DBNAME . " user=" . USER . " password=" . PASSWORD);
        }
        

        if (!$conn) {
            return null;

        } else {
            return $conn;
        }
    }
 ?>