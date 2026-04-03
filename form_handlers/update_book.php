<?php

use LDAP\Result;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = intval($_POST["book_id"]);
    $title = htmlspecialchars($_POST["title"]);   
    $author = htmlspecialchars($_POST["author"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $comments = htmlspecialchars($_POST["comments"]);
    $status = intval($_POST["status"]);

    echo $id . "<br>";
    echo $title . "<br>";
    echo $author . "<br>";
    echo $rating . "<br>";
    echo $comments . "<br>";
    echo $status . "<br>";
    
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

    echo $query;

    pg_prepare($conn, "update_query", $query);
    $result = pg_execute($conn, "update_query", $values);

    if (!$result) {
        echo pg_last_error();
    }

}

header("Location: ../library.php");
?>