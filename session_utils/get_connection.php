<?php
    define("HOST", "localhost");
    define("PORT", 42069);
    define("DBNAME", "alex_archive_db");
    define("USER", "root");
    define("PASSWORD", "root");


    function getConnection() {
        $conn = pg_connect("host=" . HOST . " port=" . PORT . " dbname=" . DBNAME . " user=" . USER . " password=" . PASSWORD);

        if (!$conn) {
            return null;

        } else {
            return $conn;
        }
    }
 ?>