<?php
 session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = htmlspecialchars($_POST["title"]);   
    $author = htmlspecialchars($_POST["author"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $comments = htmlspecialchars($_POST["comments"]);

    echo "Title: ".$title;
    echo "Author: ".$author;
    echo "Rating: ".$rating;
    echo "Comments: ".$comments;

    echo "<br>";

    $host = "localhost";
    $port = "42069";
    $dbname = "alex_archive_db";
    $user = "root";
    $password = "root";

    $conn = pg_connect("host = $host port = $port dbname = $dbname user = $user password = $password");

    if (!$conn) {
        echo "Connection Error: ".pg_last_error();
    } else {
        echo "Connection successful";
    }

    $query = "INSERT INTO books (title, author, rating, comments) VALUES ($1, $2, $3, $4)";
    $values = [
        $title,
        $author,
        $rating,
        $comments
        ];

    pg_prepare($conn, "insert_query", $query);
    $result = pg_execute($conn, "insert_query", $values);

    $success = true;
    if (!$result) {
        $success = false;
    } 

    $_SESSION["insertSuccess"] = $success;

    header("Location: ../index.php");
}
