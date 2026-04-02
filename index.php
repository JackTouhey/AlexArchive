<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <main>
        <form action="form_handlers/index_form.php" method="post">
            <label for="title">Title:</label>
            <input id="title" type="text" name="title" placeholder="Title...">
            <br/>

            <label for="author">Author:</label>
            <input id="author" type="text" name="author" placeholder="Author...">
            <br/>

            <label for="rating">Rating</label>
            <input id="rating" type="number" name="rating" placeholder="Rating...">
            <br/>

            <label for="comments">Comments:</label>
            <textarea id="comment" name="comments" rows="5" cols="25"></textarea>

            <button type="submit">Submit</button>
        </form>
        <br/>
        <?php 
        session_start();
            if (isset($_SESSION["insertSuccess"])) {
                if($_SESSION["insertSuccess"]) {
                    echo "Successfully inserted book";
                } else {
                    echo "Lmao that shit did NOT work";
                }
            }
        ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>