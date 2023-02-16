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

// edit data by id 
    if($_SERVER['REQUEST_METHOD'] == 'PUT')
    {
        try
        {
            $result = array('msg'=>'gagal memperbarui data');
            $check_session = $fc_adm->fc_check_session($_SESSION['user_session']);
            if($check_session == false)
            {
                header(http_response_code(401));
                $result['msg'] .= ' sesi tidak valid, silahkan login dulu';
            }
            else
            {
                // echo 'ok';die;
                $validation = $func->fc_validation_input($input_params);
                if($validation['status'] == false)
                {
                    echo json_encode($validation);
                    die;
                }
                $pdo = new cstr;
                // $input_params['ranking_prosesor'] = $func->fc_get_proc_score($input_params['prosesor'], $pdo)['score'];
                $update_bobotkriteria = $func->fc_update_bk_bn($input_params);
                $update_process = $func->fc_update_data($input_params);
                if($update_bobotkriteria == true && $update_process == true)
                {
                    $result['msg'] = 'data berhasil dirubah';
                }
            }
            echo json_encode($result);
        }
        catch (Exception $e)
        {
            echo json_encode($e);
        }
        catch (PDOException $e)
        {
            echo json_encode($e);
        }
    }
    else 
    {
        header(http_response_code(405));
    }

?>