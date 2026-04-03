<?php

use LDAP\Result;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = intval($_POST["book_id"]);
    $title = htmlspecialchars($_POST["title"]);   
    $author = htmlspecialchars($_POST["author"]);
    $rating = htmlspecialchars($_POST["rating"]);
    $comments = htmlspecialchars($_POST["comments"]);


    echo $id . "<br>";
    echo $title . "<br>";
    echo $author . "<br>";
    echo $rating . "<br>";
    echo $comments . "<br>";
    echo $status . "<br>";
    
    include __DIR__ . "/../session_utils/get_connection.php";
    $conn = getConnection();

    $query = "UPDATE books SET title=$1, author=$2, rating=$3, comments=$4, status=$5 WHERE id=$6";
    $values = [
        $title,
        $author,
        $rating,
        $comments,
        $status,
        $id
        ];

    pg_prepare($conn, "update_query", $query);
    $result = pg_execute($conn, "update_query", $values);

    if (!$result) {
        echo pg_last_error();
    }

}

header("Location: ../library.php");
?>