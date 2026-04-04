<?php
class Book {
    public int $id;
    public string $title;
    public string $author;
    public int $rating;
    public string $comments;
    public int $status;
    public string $colour;

    private function __construct() {
    }

    public static function makeBookForLibrary(int $id, string $title, string $author, string $colour) {
        $book = new Book();
        $book->id = $id;
        $book->title = $title;
        $book->author = $author;
        $book->colour = $colour;

        return $book;
    }

    public static function makeBookForDisplay(int $id, string $title, string $author, int $rating, string $comments, int $status) {
        $book = new Book();
        $book->id = $id;
        $book->title = $title;
        $book->author = $author;
        $book->rating = $rating;
        $book->comments = $comments;
        $book->status = $status;

        return $book;
    }
}
?>