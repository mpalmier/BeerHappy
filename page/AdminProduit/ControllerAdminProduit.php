<?php
 class ControllerAdminProduit{
     public static function isGood(){
         if($_SERVER["REQUEST_METHOD"] == "POST"){
             if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
                 $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                 $filename = $_FILES["photo"]["name"];
                 $filetype = $_FILES["photo"]["type"];
                 $filesize = $_FILES["photo"]["size"];

                 $ext = pathinfo($filename, PATHINFO_EXTENSION);
                 if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                 $maxsize = 5 * 1024 * 1024;
                 if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée.");

                 if(in_array($filetype, $allowed)){
                     if(file_exists("upload/" . $_FILES["photo"]["name"])){
                         echo $_FILES["photo"]["name"] . " existe déjà.";
                     } else{
                         move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . $_FILES["photo"]["name"]);
                         return TRUE;
                     }
                 } else{
                     return FALSE;
                 }
             } else{
                 return FALSE;
             }
         }

     }
}
