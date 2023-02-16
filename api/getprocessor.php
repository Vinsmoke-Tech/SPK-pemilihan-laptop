<?php
header("Access-Control-Allow-Origin: *");
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_laptop.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_admin.php';

$func = new functions;

// get data
    if($_SERVER['REQUEST_METHOD'] =='GET')
    {
        $result = $func->fc_get_processor_list();
        echo json_encode($result);
    }
    else
    {
        header(http_response_code(400));
    }
?>