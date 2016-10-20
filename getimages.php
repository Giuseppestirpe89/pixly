<?php
$filenameArray = [];

$handle = opendir(dirname(realpath(__FILE__)).'/event/Mysteryland/');
        while($file = readdir($handle)){
            if($file !== '.' && $file !== '..'){
                array_push($filenameArray, "$file");
            }
        }
echo json_encode($filenameArray);

