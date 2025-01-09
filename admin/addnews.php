<?php
include '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $sumary = $_POST['sumary'];
    $description = $_POST['description'];
    $danhmuc = $_POST['danhmuc'];
    
    // Hình ảnh
    $countfiles = count($_FILES['anhs']['name']);
    
    $imgs = '';
    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $_FILES['anhs']['name'][$i];
    
        ## Location
        $location = "uploads/news" . uniqid() . $filename;
        //pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] ) : mixed
        $extension = pathinfo($location, PATHINFO_EXTENSION);
        $extension = strtolower($extension);
    
        ## File upload allowed extensions
        $valid_extensions = array("jpg", "jpeg", "png", "webp");
    
        $response = 0;
        ## Check file extension
        if (in_array(strtolower($extension), $valid_extensions)) {
    
            // them vao CSDL - them thah cong moi upload anh len
            ## Upload file
            //$_FILES['file']['tmp_name']: $_FILES['file']['tmp_name'] - The temporary filename of the file in which the uploaded file was stored on the server.
            if (move_uploaded_file($_FILES['anhs']['tmp_name'][$i], $location)) {
                $imgs .= $location . ";";
            }
        }
    }
    $imgs = substr($imgs, 0, -1);
    // Trả dữ liệu về bảng db
    $sql_str = "INSERT INTO `news` (`title`, `avatar`, `slug`, `sumary`, `description`, `newscategory_id`, `created_at`, `updated_at`) VALUES 
                ('$name', '$location', '$slug', '$sumary', '$description', $danhmuc,  NOW(), NOW());";
    
    mysqli_query($conn, $sql_str);
    
    header("location: ./listnews.php");
}
?>