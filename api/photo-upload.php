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

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    try{
        $result = array('msg'=>'gagal menginput data:');
        // $check_session = $fc_adm->fc_check_session($_SESSION['user_session']); #echo var_dump($check_session);die;
        // if($check_session == false)
        // {
        //     header(http_response_code(401));
        //     $result['msg'] .= ' sesi tidak valid, silahkan login dulu';
        // }
        // else
        // {
            // validation 
            $vars = array('store_id', 'file_name', 'file_type', 'file_size', 'file_content');
            $validation = $func->fc_validation_photo($input_params, $vars);
            if($validation['status'] == false)
            {
                echo json_encode($validation);
                die;
            }
            // check file type 
            $filetype = array('image/jpeg', 'image/png');
            if(!in_array($input_params['file_type'], $filetype))
            {
                $result['msg'] = "tipe file tidak valid";
            }
            // check file size 
            if($input_params['file_size'] > 512000)
            {
                $result['msg'] = "file terlalu besar";
            }
            
            $date = strval(date('YmdHis'));
            $filename = $date."-".$input_params['store_id'].".".$input_params['file_ext'];
            $file = fopen("products/".$filename, "w");
            fwrite($file, base64_decode($input_params['file_content']));
            fclose($file);
            
            $result['image_url'] = ($_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/pilihlaptop/api/products/".$filename);
            
            echo json_encode($result);
            
        // }
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