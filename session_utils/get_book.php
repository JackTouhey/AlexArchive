<?php 
    function getBook(int $id) {
        include __DIR__ . "/get_connection.php";
        include __DIR__ . "/../model/book.php";
        $conn = getConnection();

        $query = "SELECT id, title, author, rating, comments, status FROM books WHERE id = $1";
        $values = [$id];

        pg_prepare($conn, "insert_query", $query);
        $result = pg_execute($conn, "insert_query", $values);

        if ($row = pg_fetch_row($result)) {
            return new Book($row[0], $row[1], $row[2], $row[3], $row[4], intval($row[5]));
        }
    }
?>