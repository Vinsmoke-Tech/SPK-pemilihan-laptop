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

// get data
if($_SERVER['REQUEST_METHOD'] =='GET')
{
    $check_session = $fc_adm->fc_check_session($_SESSION['user_session']); #echo var_dump($check_session);die;
    if($check_session == false)
    {
        header(http_response_code(401));
        $result = array('msg'=>'sesi tidak valid, silahkan login dulu');
    }
    else
    {
        $params = $_GET;
        // echo var_dump($params);die;
        if(!isset($params['store_name']) || $params == null)
        {
            $result = array("msg"=>"data tidak ditemukan");
        }
        else
        {
            // get data by store_name
            $data = $func->fc_get_data_by_store_name($params['store_name']); echo json_encode($data);die;
            // $bk = $func->fc_get_bk_id($params['store_name']);
            // $wk = $func->fc_get_bn_id($params['store_name']);
            
            if($data == [] && $bk == [] && $wk == [])
            {
                $result = array("msg"=>"tidak ada data");
            }
            else
            {
                $result = $data;
                echo json_encode($result);
            }
        }
    }
    echo json_encode($result);
}
else 
{
    header(http_response_code(405));
}

?>