<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/header.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c057f0eb33.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php
        $bookId = intval($_POST["book_id"]);
        include __DIR__ . "\session_utils\get_book.php";
        $book = getBook($bookId);
    ?>

    <div class="col-12 d-flex">

        <div class="col-1"></div>

        <div class="col-10 shadow rounded-1 d-flex flex-column flex-wrap">
            <!-- Header - would be nice to have this as a component -->
            <div class="row d-flex flex-row justify-content-evenly">
                <div class="fs-2 col-11 mp-2 d-flex justify-content-center">Alex's Archive</div>
                <div class="col-1 d-flex flex-row align-items-center me-0">
                    <a href="library.php"><i class="fa-solid fa-house fa-lg icon"></i></a>
                    <i class="fa-solid fa-magnifying-glass fa-lg mp-2 icon"></i>
                    <a href="new_book.php"><i class="fa-regular fa-square-plus fa-xl mp-2 icon"></i></a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-12 d-flex flex-row">

                <!-- Book Details -->
                <form action="form_handlers/update_book.php" method="post" class="col-8 d-flex flex-column justify-content-start p-4">
                    <input type="hidden" name="book_id" value="<?= htmlspecialchars($bookId) ?>">
                    
                    <input id="title" type="text" name="title" class="fw-bold fs-1 mb-2" placeholder="<?php echo $book->title ?>">

                    <div class="d-flex flex-row">
                        <label for="author" class="fs-3 mb-2">By:</label>
                        <input id="author" type="text" name="author" class="fs-3 mb-2 ms-2" placeholder="<?php echo $book->author ?>">
                    </div>

                    <div class="d-flex flex-row">
                        <label for="rating" class="fs-3 mb-2">Rating:</label>
                        <input id="rating" type="number" name="rating" class="fs-3 mb-2 ms-2" placeholder="<?php echo $book->rating ?>">
                    </div>

                    <div class="d-flex flex-row align-items-center">
                        <label for="comments" class="fs-3 mb-2">Comments:</label>
                        <textarea id="comment" name="comments" rows="5" cols="100" class="p ms-2" placeholder="<?php echo $book->comments ?>"></textarea>
                    </div>
                    

                    <button type="submit" class="btn btn-primary rounded-pill">Submit</button>
                </form>

            </div>
        </div>

        <div class="col-1"></div>

    </div>
</body>
</html>