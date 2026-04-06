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
            return Book::makeBookForDisplay($row[0], $row[1], $row[2], $row[3], $row[4], intval($row[5]));
        }
    }

    function getRandomColour() {
        return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
    }

    function contrastColour(string $hex): string {
        $hex = ltrim($hex, '#');
        [$r, $g, $b] = [hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2))];
        $luminance = 0.2126*($r/255) + 0.7152*($g/255) + 0.0722*($b/255);
        return $luminance > 0.45 ? '#1a1a1a' : '#f5f0e8';
    }
?>