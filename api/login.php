<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
header("Access-Control-Allow-Origin: http://0016d99f0ba3.ngrok.io");
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_admin.php';

$input_params = json_decode(file_get_contents('php://input'), true);

// login
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try{
        $func = new functions_adm;
        $result = array();
        $valid = $func->fc_validation_login($input_params); #echo var_dump($valid);die;
        if($valid['status'] == false)
        {
            echo json_encode($valid);
            exit;
        }
        $check_user_or_phone = $func->fc_check_user_or_phone($input_params); #echo $check_user_or_phone;die;
        if($check_user_or_phone == false)
        {
            header("HTTP/1.0 401 username atau no ponsel tidak terdaftar");
            // throw new Exception("username atau no ponsel tidak terdaftar");
        }
        else
        {
            $check_pass = $func->fc_check_pass($input_params); #echo var_dump($check_pass);die;
            if($check_pass == false || $check_pass['password'] !== base64_decode($input_params['password']))
            {
                header('HTTP/1.0 401 password salah');
            }
            else
            {
                header("store_name:".$check_pass['store_name']);
                $session = $func->fc_get_store_name($check_pass['store_name']).'-'.date('ddmmyy', time());
                $upd_session = $func->fc_activate_session($input_params, $session);
                $result['msg'] = "login berhasil";
                session_start();
                $_SESSION['user_session'] = $session;
            }
            echo json_encode($result);
        }
    }
    catch (Exception $e)
    {
        echo json_encode(array("error"=>"".$e));
    }
}
else
{
    header(http_response_code(405));
}

?>