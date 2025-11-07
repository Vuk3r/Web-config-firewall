<?php 
$filePath = $_GET['file'];
if (!file_exists($filePath)) {
    http_response_code(404);
    echo "File not found.";
    exit;
}
$finfo = finfo_open(FILEINFO_MIME_TYPE); //doc signature file
$mimeType = finfo_file($finfo, $filePath); //lay ra extension phu hop
finfo_close($finfo);
header('Content-Type: ' . $mimeType);   //setting cach hien thi 
readfile($filePath);
?>
