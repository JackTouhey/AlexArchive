<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $searchColumn = intval($_POST["search_column"]);
    $searchValue = htmlspecialchars($_POST["search_value"]);

    include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'session_utils' . DIRECTORY_SEPARATOR . 'search_library.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION["searched_books"] = searchLibrary($searchColumn, $searchValue);
}

header("Location: ../search_page.php");
?>