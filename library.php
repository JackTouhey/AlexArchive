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
</body>
</html>