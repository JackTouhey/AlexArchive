<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/header.css" rel="stylesheet">
    <link href="resources/book_rating.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c057f0eb33.js" crossorigin="anonymous"></script>
</head>
<body>

    <?php
        $bookId = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookId = intval($_POST["book_id"]);
        } else {
            session_start();
            $bookId = intval($_SESSION['book_id']);
        }
        include __DIR__ . "\session_utils\generic_utils.php";
        include __DIR__ . "\session_utils\book_display_utils.php";
        include __DIR__ . "/model/status_ids.php";
        $book = getBook($bookId);
        $rating = $book->rating;
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
                <div class="col-8 d-flex flex-column justify-content-start p-4">
                    <form action="book_edit.php" method="post">
                        <input type="hidden" name="book_id" value="<?= htmlspecialchars($bookId) ?>">
                        <button type="submit" class="btn btn-primary rounded-pill">Edit</button>
                    </form>

                    <div class="fw-bold mb-2 title"><?= $book->title; ?></div>
                    <div class="fs-3 mb-2"><?= $book->author; ?></div>

                    <div class="d-flex flex-row justify-content-start mt-3" id="starRating">
                        <?php for ($i = 1; $i <= 10; $i += 2): ?>
                            <div class="star-container <?=  $i == 1 ? 'me-4' : 'mx-4' ?>">
                                <img src="resources/images/half-star.svg"
                                    class="star-half-wrap <?= $i <= $rating ? 'lit' : '' ?>"
                                    data-value="<?= $i ?>">
                                <img src="resources/images/half-star.svg"
                                    class="star-half-wrap mirrored <?= ($i + 1) <= $rating ? 'lit' : '' ?>"
                                    data-value="<?= $i + 1 ?>">
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="fs-3 mt-3"><?= STATUS_ID::getDisplayFromInt($book->status); ?></div>

                    <div class="p mt-4"><?= $book->comments ?></div>
                </div>
                
                <!-- Cover display -->
                <div class="col-4">

                </div>
            </div>
        </div>

        <div class="col-1"></div>

    </div>
</html>