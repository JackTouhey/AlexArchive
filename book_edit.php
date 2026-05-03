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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
</head>
<body>

    <?php
        $bookId = intval($_POST["book_id"]);
        include __DIR__ . "/session_utils/generic_utils.php";
        include __DIR__ . "/model/status_ids.php";
        $book = getBook($bookId);
        $rating = isset($book->rating) ? intval($book->rating) : 0;
        $status = isset($book->status) ? intval($book->status) : -1;
    ?>

    <div class="col-12 d-flex">

        <div class="col-1"></div>

        <div class="col-10 shadow rounded-1 d-flex flex-column flex-wrap">
            <!-- Header - would be nice to have this as a component -->
            <div class="row d-flex flex-row justify-content-evenly">
                <div class="fs-2 col-11 mp-2 d-flex justify-content-center">Alex's Archive</div>
                <div class="col-1 d-flex flex-row align-items-center me-0">
                    <a href="library.php"><i class="fa-solid fa-house fa-lg icon"></i></a>
                    <a href="search_page.php"><i class="fa-solid fa-magnifying-glass fa-lg mp-2 icon"></i></a>
                    <a href="new_book.php"><i class="fa-regular fa-square-plus fa-xl mp-2 icon"></i></a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-12 d-flex flex-row">

                <!-- Book Details -->
                <form action="form_handlers/update_book.php" method="post" class="col-8 d-flex flex-column justify-content-start p-4">
                    <input type="hidden" name="book_id" value="<?= htmlspecialchars($bookId) ?>">
                    <input type="hidden" name="rating" id="ratingInput" value="<?= $rating ?>">
                    <input type="hidden" name="status" id="statusInput" value="<?= $status ?>">
                    
                    <input id="title" type="text" name="title" class="fw-bold title mb-2 border-0 border-bottom border-secondary" value="<?php echo $book->title ?>">
                    <input id="author" type="text" name="author" class="fs-3 mb-2 border-0 border-bottom border-secondary" value="<?php echo $book->author ?>">


                    <div class="d-flex flex-row justify-content-start mb-3" id="starRating">
                        <?php for ($i = 1; $i <= 10; $i += 2): ?>
                            <div class="star-container <?=  $i == 1 ? 'me-4' : 'mx-4' ?>">
                                <img src="resources/images/half-star.svg"
                                    class="star-half-wrap pointer <?= $i <= $rating ? 'lit' : '' ?>"
                                    data-value="<?= $i ?>">
                                <img src="resources/images/half-star.svg"
                                    class="star-half-wrap mirrored pointer <?= ($i + 1) <= $rating ? 'lit' : '' ?>"
                                    data-value="<?= $i + 1 ?>">
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="d-flex flex-row justify-content-evenly mt-3">
                        <!-- TODO: Figure out how to use enum class for below data-values -->
                        <button type="button" id="finishedButton" data-value="1"
                                class="pointer btn status-button <?= $status == STATUS_ID::Finished->value ? 'btn-primary' : 'btn-secondary' ?>">Finished</button>
                        <button type="button" id="inProgressButton" data-value="2"
                                class="pointer btn status-button <?= $status == STATUS_ID::In_Progress->value ? 'btn-primary' : 'btn-secondary' ?>">In Progress</button>
                        <button type="button" id="DNFButton" data-value="3"
                                class="pointer btn status-button <?= $status == STATUS_ID::DNF->value ? 'btn-primary' : 'btn-secondary' ?>">DNF</button>
                    </div>
                    
                    <div class="col-12" style="height: 2.5rem;"></div>

                    <div class="d-flex flex-row align-items-center ">
                        <textarea id="comment" name="comments" rows="5" cols="155" class="border-0 border-bottom border-secondary p"><?= $book->comments ?></textarea>
                    </div>
                    

                    <button type="submit" class="btn btn-primary rounded-pill mt-2">Submit</button>
                </form>

                <!-- Cover Upload -->
                <div class="col-4 d-flex flex-row justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary" style="height: 3rem;" data-bs-toggle="modal" data-bs-target="#uploadModal">Upload cover</button>

                    <div class="modal fade" id="uploadModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="uploadModalLabel">Upload cover</h1>
                                </div>
                                <div class="modal-body">
                                    <p>Please note: Uploading a cover will cause any unsaved changes to be discarded</p>
                                    <form action="form_handlers/cover_upload.php" method="post" class="dropzone" id="my-dropzone">
                                        <input type="hidden" name="book_id" value="<?= htmlspecialchars($bookId) ?>">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                      
            </div>
        </div>

        <div class="col-1"></div>

    </div>

    <script src="resources/rating_stars.js"></script>
    <script src="resources/status_buttons.js"></script>
</body>
</html>