<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'file-management');
$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    $clientname = $_POST['FileName'];
    // destination of the file on the server
    $destination = 'uploads/' . $filename;
    $icone='uploads/image icon.png';

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx','rar','jpeg','jpg','png','psd'])) {
        echo "You file extension must be .zip, .pdf or .docx ";
        
    } elseif ($_FILES['myfile']['size'] > 10000000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads,Cliente) VALUES ('$filename', $size, 0,'$clientname')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";

                header('Location: enviar.php');
                exit;

            }
        } else {
            echo "Failed to upload file.";
        }
    }
    if ($extension== ['zip']) {
        echo "deu bom no arquivo.";
       
    }else{

        echo "deu merda";
    }
    if($filename==['Escrito à mão_2022-02-22_120803.pdf']){
        
        echo "deu bom no nome";
    }else{

        echo "deu merda";
    }

    $fileTypeImages = array("docx" => "docx.png", "jpg" => "docx.png", "zip" => "docx.png");
   
}



// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}