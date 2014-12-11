<?php
$path = $_GET["path"];
forceDownload("$path"); 
function forceDownload($filename) { 
 
    if (false == file_exists($filename)) { 
        return false; 
    } 
     
    // http headers 
    header('Content-Type: application-x/force-download'); 
    header('Content-Disposition: attachment; filename="' . basename($filename) .'"'); 
    header('Content-length: ' . filesize($filename)); 
 
    // for IE6 
    if (false === strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6')) { 
        header('Cache-Control: no-cache, must-revalidate'); 
    } 
    header('Pragma: no-cache'); 
         
    // read file content and output 
    return readfile($filename);; 
} 
?>