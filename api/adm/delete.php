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

// delete data by id 
if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    $result = array('msg'=>'-');
    $check_session = $fc_adm->fc_check_session($_SESSION['user_session']);
    if($check_session == false)
    {
        header(http_response_code(401));
        $result['msg'] = 'sesi tidak valid, silahkan login dulu';
    }
    else
    {
        $result = array('msg'=>'gagal menghapus data');
        // cek id 
        if($_SERVER['QUERY_STRING'] == "")
        {
            $result['msg'] = 'id tidak ditemukan';
        }
        else
        // get data by id
        {
            $id = substr($_SERVER['QUERY_STRING'], 8, strlen(($_SERVER['QUERY_STRING'])));
            $delete_kriteria = $func->fc_delete_bk_wk($id);
            $delete_process = $func->fc_delete_data($id);
            if($delete_kriteria == true && $delete_process == true)
            {
                $result['msg'] = "data berhasil di hapus";
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