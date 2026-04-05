<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php
        $bookId = intval($_POST["book_id"]);
        include __DIR__ . "\session_utils\get_book.php";
        $book = getBook($bookId);
    ?>

    <form action="form_handlers/update_book.php" method="post">
        <input type="hidden" name="book_id" value="<?= htmlspecialchars($bookId) ?>">
        <input type="hidden" name="status" value="1">

        <label for="title">Title:</label>
        <input id="title" type="text" name="title" placeholder="<?php echo $book->title ?>">
        <br/>

        <label for="author">Author:</label>
        <input id="author" type="text" name="author" placeholder="<?php echo $book->author ?>">
        <br/>

        <label for="rating">Rating</label>
        <input id="rating" type="number" name="rating" placeholder="<?php echo $book->rating ?>">
        <br/>

        <label for="comments">Comments:</label>
        <textarea id="comment" name="comments" rows="5" cols="25" placeholder="<?php echo $book->comments ?>"></textarea>

        <button type="submit">Submit</button>
    </form>

    <a href="library.php">home</a>
</body>
</html>