<?php
header("Access-Control-Allow-Origin: *");
session_start();
if(!isset($_SESSION['user_session']))
{
    $_SESSION['user_session'] = 'x';
}
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_laptop.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_admin.php';

$input_params = json_decode(file_get_contents('php://input'), true);
$func = new functions;
$fc_adm = new functions_adm;

// add new data 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try{
        $result = array('msg'=>'gagal menginput data:');
        $check_session = $fc_adm->fc_check_session($_SESSION['user_session']); #echo var_dump($check_session);die;
        if($check_session == false)
        {
            header(http_response_code(401));
            $result['msg'] .= ' sesi tidak valid, silahkan login dulu';
        }
        else
        {
            $validation = $func->fc_validation_input($input_params);
            if($validation['status'] == false)
            {
                echo json_encode($validation);
                die;
            }
            $pdo = new cstr;
            // $input_params['ranking_prosesor'] = $func->fc_get_proc_score($input_params['prosesor'], $pdo)['score'];
            $input_bk_wk = $func->fc_input_bk_bn($input_params, $pdo);
            $input_process = $func->fc_input_data($input_params, $pdo);
            if($input_bk_wk == true && $input_process == true)
            {
                $result['msg'] = 'data berhasil di input';
            }
            else
            {
                $pdo->pdo()->rollBack();
                $result['msg'] = 'gagal menginput data';
            }
        }
        echo json_encode($result);
    }
    catch (Exception $e)
    {
        echo json_encode("error: ".$e);
    }
    catch (PDOException $e)
    {
        echo json_encode("SQL error ".$e);
    }
}
else 
{
    header(http_response_code(405));
}

?>