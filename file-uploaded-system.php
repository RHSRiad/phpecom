<?php

function fileUpload($file_form_name,$jpg,$jpeg,$png,$webp,$pdf){

    $file_name=$file_form_name['name'];
    $file_extrention= explode(".",$file_name);
    $file_type=$file_extrention[1];

    if($file_type==$jpg || $file_type==$jpeg||$file_type==$png||$file_type==$webp||$file_type==$pdf){

        $file_temp=$file_form_name['tmp_name'];
        $file_destination="uploaded/".$file_name;
        move_uploaded_file($file_temp,$file_destination);
        return "uploaded done";
    }else{
        echo "dosen't match file format";
    }



}

?>