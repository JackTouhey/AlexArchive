<?php
 session_start();
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = htmlspecialchars($_POST["title"]);   
    $author = htmlspecialchars($_POST["author"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $comments = htmlspecialchars($_POST["comments"]);
    $colour = htmlspecialchars($_POST["colour"]);
    
    include __DIR__ . "/../session_utils/get_connection.php";
    $conn = getConnection();

    $query = "INSERT INTO books (title, author, rating, comments, colour, status) VALUES ($1, $2, $3, $4, $5, 1)";
    $values = [
        $title,
        $author,
        $rating,
        $comments,
        $colour
        ];

    pg_prepare($conn, "insert_query", $query);
    $result = pg_execute($conn, "insert_query", $values);

    $success = true;
    if (!$result) {
        $success = false;
    } 

    $_SESSION["insertSuccess"] = $success;

    header("Location: ../library.php");
}
