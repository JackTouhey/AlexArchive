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
        include __DIR__ . "\session_utils\get_library.php";
        $library = getLibrary();

        if (empty($library)) {
            echo "No Books :(";
        } else {
            echo "Yes Books :)";
        }
    ?>

    <form method="POST" action="book_display.php" id="book-form">
        <input type="hidden" name="book_id" id="book_id_input">
        <table border="1">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Rating</th>
                    <th>Comments</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($library as $book): ?>
                    <tr class="clickable-row" data-id="<?= htmlspecialchars($book->id) ?>">
                        <td><?php echo htmlspecialchars($book->title); ?></td>
                        <td><?php echo htmlspecialchars($book->author); ?></td>
                        <td><?php echo htmlspecialchars($book->rating); ?></td>
                        <td><?php echo htmlspecialchars($book->comments); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

    <script>
        document.querySelectorAll('.clickable-row').forEach(row => {
            row.addEventListener('click', () => {
                document.getElementById('book_id_input').value = row.dataset.id;
                document.getElementById('book-form').submit();
            });
        });
    </script>

    <style>
        .clickable-row { cursor: pointer; }
        .clickable-row:hover { background-color: #f0f0f0; }
    </style>
    
    <a href="new_book.php" class="button">Add new book :)</a>
</body>
</html>