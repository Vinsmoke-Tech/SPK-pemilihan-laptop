<?php
// echo var_dump($_SESSION);die;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_admin.php';

$input_params = json_decode(file_get_contents('php://input'), true);

// login
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // echo var_dump($input_params);die;
    try{
        $func = new functions_adm;
        $result = array('msg'=>'');
        $validation = $func->fc_validation_register($input_params);
        if($validation['status'] == false)
        {
            echo json_encode($validation);
            die;
        }
        $result['msg'] = $func->fc_check_db($input_params);
        echo json_encode($result);
    }
    catch (Exception $e)
    {
        echo json_encode($e);
    }
}
else
{
    header(http_response_code(405));
}

?>