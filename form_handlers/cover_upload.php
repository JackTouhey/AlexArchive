<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES)) {
    $targetDir = "../resources/covers/";
    $bookId = htmlspecialchars($_POST['book_id']);

    $tempFile = $_FILES['file']['tmp_name'];

    $fileNameArray = explode('.', $_FILES['file']['name']);

    $targetFile = $targetDir . $bookId . '.' . end($fileNameArray);

    if (move_uploaded_file($tempFile, $targetFile)) {
        echo json_encode(['status' => 'success', 'path' => $targetFile]);
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(['status' => 'error', 'message' => 'Upload failed.']);
    }
}
?>