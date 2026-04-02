<?php
 
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = htmlspecialchars($_POST["title"]);   
    $author = htmlspecialchars($_POST["author"]);
    $rating = htmlspecialchars($_POST["rating"]);

    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}