<?php
$intro = $_POST['intro'];
$type = $_POST['type'];
if ($type == 't') {
    $file_name="../attachments/html/recruitment_t.html";
} else if ($type == 's') {
    $file_name="../attachments/html/recruitment_s.html";
}
$file_pointer=fopen($file_name,"w");
fwrite($file_pointer, $intro);
fclose($file_pointer);
print"<script>alert('succeed!');</script>";
?>
<meta http-equiv="refresh" content="0;url=../view/modify_recruitment.php?type=<?php echo $type;?>">