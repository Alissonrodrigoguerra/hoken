<?php

function Escrever_Novo_Arquivo($host = NULL,$user = NULL,$pass = NULL,$database = NULL){
     
    $CI =& get_instance();
    $CI->load->helper('file'); 
    $CI->load->helper('url');

    if (!$host) { $host = "localhost";}
    if (!$user) { $user = "root";}

    $new_stage  = "./application/config/constants.php";
    $config ="\ndefine('HOST', '".$host."');\ndefine('USERNAME', '".$user."');\ndefine('PASSWORD', '".$pass."');\ndefine('DATABASE' , '".$database."' );\n";
    $data = read_file('./application/config/constants_new.php');
    $data = $data.$config;

    if (!write_file($new_stage, $data)){
            
        echo 'Unable to write the file';

    }else{
            echo 'File written!';
    }       

}               