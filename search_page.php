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
        include __DIR__ . "\session_utils\get_library.php";
        include __DIR__ . "\session_utils\generic_utils.php";
        include __DIR__ . "\model\search_columns.php";

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $library = isset($_SESSION["searched_books"]) ? $_SESSION["searched_books"] : getLibrary();        
    ?>

    <div class="col-12 d-flex">

        <div class="col-1"></div>

        <div class="col-10 shadow rounded-1 d-flex flex-column flex-wrap">
            <!-- Header -->
            <div class="row d-flex flex-row justify-content-evenly">
                <div class="fs-2 col-11 mp-2 d-flex justify-content-center">Alex's Archive</div>
                <div class="col-1 d-flex flex-row align-items-center me-0">
                    <i class="fa-solid fa-magnifying-glass fa-lg mp-2 icon"></i>
                    <a href="new_book.php"><i class="fa-regular fa-square-plus fa-xl mp-2 icon"></i></a>
                </div>
            </div>

            <!-- Search  -->
             <div class="col-12 d-flex flex-row justify-content-evenly">
                <form action="form_handlers/search_handler.php" method="POST">
                    <select name="search_column">
                        <option value="<?= SEARCH_COLUMNS::ALL->value ?>">All</option>
                        <option value="<?= SEARCH_COLUMNS::TITLE->value ?>">Title</option>
                        <option value="<?= SEARCH_COLUMNS::AUTHOR->value ?>">Author</option>
                    </select>

                    <input type="text" name="search_value">
                    <button type="submit" class="btn btn-primary rounded-pill mt-2">Submit</button>
                </form>
             </div>

             <!-- Results -->
            <div class="col-12 d-flex flex-column">
                <?php foreach ($library as $book):
                    $title = $book->title;
                    $author = $book->author;
                    $id = $book->id;
                    $backgroundColour = $book->colour;
                    $textColour = contrastColour($book->colour);
                ?>
                <form class="col-12 d-flex flex-row justify-content-evenly" method="POST" action="book_display.php" class="col-1 ps-1 ms-1"
                        style="background-color:<?= $backgroundColour ?>; color:<?= $textColour ?>;">
                    <input type="hidden" name="book_id" value="<?= $id ?>">
                    
                    <div class="col-10 d-flex flex-row justify-content-between">
                        <div class="col-8 fw-b fs-3">
                            <?= $title ?>
                        </div>
                        <div class="col-4 fw-b fs-4">
                            <?= $author ?>
                        </div>
                    </div>
                    <div class="col-2">
                        <button type="submit">Select</button>
                    </div>

                    
                    
                        
                    </button>
                </form>
                <?php endforeach; ?>
            </div>
        <div class="col-1"></div>

    </div>
</body>
</html>