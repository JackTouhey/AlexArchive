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
        include __DIR__ . "/session_utils/generic_utils.php";
        include __DIR__ . "/model/status_ids.php";
        $rating = 10;
        $status = STATUS_ID::In_Progress->value;
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
                <form action="form_handlers/submit_new_book.php" method="post" class="col-8 d-flex flex-column justify-content-start p-4">
                    <input type="hidden" name="rating" id="ratingInput" value="<?= $rating ?>">
                    <input type="hidden" name="status" id="statusInput" value="<?= $status ?>">
                    
                    <input id="title" type="text" name="title" class="fs-1 fw-bold form-control-lg mb-2 border-0 border-bottom border-secondary" placeholder="Title">
                    <input id="author" type="text" name="author" class="fs-4 form-control-lg mb-2 border-0 border-bottom border-secondary" placeholder="Author">


                    <div class="d-flex flex-row justify-content-start" id="starRating">
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
                    
                    <div class="col-12" style="height: 2.5rem;"></div>

                    <div class="d-flex flex-row justify-content-evenly mt-3">
                        <!-- TODO: Figure out how to use enum class for below data-values -->
                        <button type="button" id="finishedButton" data-value="1"
                                class="pointer btn status-button <?= $status == STATUS_ID::Finished->value ? 'btn-primary' : 'btn-secondary' ?>">Finished</button>
                        <button type="button" id="inProgressButton" data-value="2"
                                class="pointer btn status-button <?= $status == STATUS_ID::In_Progress->value ? 'btn-primary' : 'btn-secondary' ?>">In Progress</button>
                        <button type="button" id="DNFButton" data-value="3"
                                class="pointer btn status-button <?= $status == STATUS_ID::DNF->value ? 'btn-primary' : 'btn-secondary' ?>">DNF</button>
                    </div>

                    <div class="d-flex flex-row align-items-center ">
                        <textarea id="comment" name="comments" rows="5" cols="155" class="border-0 border-bottom border-secondary p" placeholder="Comments" ></textarea>
                    </div>

                    <div class="d-flex flex-row align-items-center p-1">
                        <div class="fs-4">Colour:</div>
                        <input type="color" id="colour" name="colour" class="my-5 ms-3" value="<?= getRandomColour() ?>">

                    </div>
                    

                    <button type="submit" class="btn btn-primary rounded-pill mt-2">Submit</button>
                </form>

            </div>
        </div>

        <div class="col-1"></div>

    </div>

    <script src="resources/rating_stars.js"></script>
    <script src="resources/status_buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>