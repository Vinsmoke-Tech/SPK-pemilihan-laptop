<?php
session_start();
if(!isset($_SESSION['user_session']))
{
    $_SESSION['user_session'] = 'x';
}
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_admin.php';

$input_params = json_decode(file_get_contents('php://input'), true);
// echo var_dump($_SESSION);die;
// login
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try{
        $func = new functions_adm;
        $result = array('msg'=>'berhasil logout');
        $check_session = $func->fc_check_session($_SESSION['user_session']);
        if($check_session == false)
        {
            $result['msg'] = "sesi tidak dikenal";
        }
        else
        {
            $destroy_session = $func->fc_destroy_session($check_session);
            if($destroy_session == true)
            {
                session_unset();
                session_destroy();
            }
            
        }
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