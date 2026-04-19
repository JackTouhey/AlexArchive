<?php
    function searchLibrary(int $searchColumn, string $searchValue) {
        include __DIR__ . "/get_connection.php";
        include __DIR__ . "/../model/book.php";
        include __DIR__ . "/../model/search_columns.php";
        $conn = getConnection();

        $query = "SELECT id, title, author, colour FROM books WHERE";

        $query = match($searchColumn) {
            SEARCH_COLUMNS::ALL->value => $query . " title LIKE $1 OR author like $1 ORDER BY id",
            SEARCH_COLUMNS::TITLE->value => $query . " title LIKE $1 ORDER BY id",
            SEARCH_COLUMNS::AUTHOR->value => $query . " author like $1 ORDER BY id",
        };

        $value = [
            "%" . $searchValue . "%"
        ];

        pg_prepare($conn, "search_query", $query);
        $result = pg_execute($conn, "search_query", $value);

        $books = [];
        while ($row = pg_fetch_row($result)) {
            $book = Book::makeBookForLibrary($row[0], $row[1], $row[2], $row[3]);
            $books[] = $book;
        }

        return $books;
    } 
?>