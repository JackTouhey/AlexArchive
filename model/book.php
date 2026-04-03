<?php
class Book {
    public int $id;
    public string $title;
    public string $author;
    public int $rating;
    public string $comments;
    public int $status;

    public function __construct(int $id, string $title, string $author, int $rating, string $comments, int $status) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->rating = $rating;
        $this->comments = $comments;
        $this->status = $status;
    }
}
?>