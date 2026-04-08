<?php

use LDAP\Result;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = intval($_POST["book_id"]);
    $title = htmlspecialchars($_POST["title"]);   
    $author = htmlspecialchars($_POST["author"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $comments = htmlspecialchars($_POST["comments"]);
    $status = intval($_POST["status"]);
    
    include __DIR__ . "/../session_utils/get_connection.php";
    $conn = getConnection();

    $query = "UPDATE books SET "; 
    $index = 1;
    $values = [];

    if (!empty($title)) {
        $query .= "title=$" . $index . ", ";
        $values[] = $title;
        $index++;
    }
    if (!empty($author)) {
        $query .= "author=$" . $index . ", ";
        $values[] = $author;
        $index++;
    }
    if (!empty($rating)) {
        $query .= "rating=$" . $index . ", ";
        $values[] = $rating;
        $index++;
    }
    if (!empty($comments)) {
        $query .= "comments=$" . $index . ", ";
        $values[] = $comments;
        $index++;
    }
    if (!empty($status)) {
        $query .= "status=$" . $index . ", ";
        $values[] = $status;
        $index++;
    }
    $query = substr($query, 0, -2);
    $query .= " WHERE id=$" . $index;
    $values[] = $id;

    pg_prepare($conn, "update_query", $query);
    $result = pg_execute($conn, "update_query", $values);

    session_start();
    $_SESSION['book_id'] = $id;
}

header("Location: ../book_display.php");
?>