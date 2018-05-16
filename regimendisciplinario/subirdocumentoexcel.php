<?php
    require_once("Files.php");
    $File = new FileManage();

    if(isset($_FILES["file"])){
        $finfo = new finfo();
        $typefile = $finfo->file($_FILES["file"]["tmp_name"],FILEINFO_MIME_TYPE);
        $filesize = $_FILES["file"]["size"];
        echo $filesize;
        if($typefile == "application/vnd.ms-excel" or $typefile == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
            if($filesize<104857600){
                echo $typefile;
                $File->ExceltoArray($_FILES["file"]["tmp_name"]);
                header("Location: planilla.php);   
            }
        }
    }
?>