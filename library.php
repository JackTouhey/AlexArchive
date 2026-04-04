<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alex Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/library.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c057f0eb33.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        include __DIR__ . "\session_utils\get_library.php";
        include __DIR__ . "\session_utils\generic_utils.php";
        $library = getLibrary();
    ?>

    <div class="col-12 d-flex">

        <div class="col-1"></div>

        <div class="col-10 shadow rounded-1">
            <div class="d-flex flex-row justify-content-evenly">
                <div class="fs-2 col-11 mp-2 d-flex justify-content-center">Alex's Archive</div>
                <div class="col-1 d-flex flex-row justif-content-center align-items-center me-0">
                    <i class="fa-solid fa-magnifying-glass fa-lg mp-2"></i>
                    <i class="fa-regular fa-square-plus fa-xl mp-2"></i>
                </div>

            </div>

        </div>

        <div class="col-1"></div>

    </div>
    
</body>
</html>