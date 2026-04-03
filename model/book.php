<?php
class Book {
    public string $title;
    public string $author;
    public int $rating;
    public string $comments;
    public int $status;

    public function __construct(string $title, string $author, int $rating, string $comments, int $status) {
        $this->title = $title;
        $this->author = $author;
        $this->rating = $rating;
        $this->comments = $comments;
        $this->status = $status;
    }
}
?>