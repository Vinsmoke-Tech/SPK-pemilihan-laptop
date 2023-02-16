<?php
header("Access-Control-Allow-Origin: *");
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_laptop.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/functions/fc_admin.php';

$func = new functions;
$fc_adm = new functions_adm;

// get data
    if($_SERVER['REQUEST_METHOD'] =='GET')
    {
        // get all data 
        if($_SERVER['QUERY_STRING'] == "")
        {
            $result = $func->fc_get_all_data();
        }
        else
        {
            $id = substr($_SERVER['QUERY_STRING'], 8, strlen(($_SERVER['QUERY_STRING']))); #echo $id;die;
            // get data by product id
            $data = $func->fc_get_data_by_id($id);
            $bk = $func->fc_get_bk_id($id);
            $wk = $func->fc_get_bn_id($id);
            // get store phone no
            $store_phone_no = $fc_adm->fc_get_store_contact($data['store_name']);
            // echo var_dump($store_phone_no);die;
            if($data == false && $bk == false && $wk == false)
            {
                $result = array("msg"=>"data tidak ditemukan");
            }
            else
            {
                $result = $data;
                $result['bk'] = $bk;
                $result['wk'] = $wk;
                $result['phone_no'] = $store_phone_no;
            }
        }
        echo json_encode($result);
    }
    else
    {
        header(http_response_code(405));
    }

?>