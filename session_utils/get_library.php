<?php
    function getLibrary() {
        include __DIR__ . "/get_connection.php";
        include __DIR__ . "/../model/book.php";
        $conn = getConnection();

        $query = "SELECT id, title, author, rating, comments, status FROM books";
        $result = pg_query($conn, $query);

        if(!$result) {
            echo "Get Library Error";
        }

        $books = [];
        while ($row = pg_fetch_row($result)) {
            $book = new Book($row[0], $row[1], $row[2], $row[3], $row[4], intval($row[5]));
            $books[] = $book;
        }

        return $books;
    }
?>