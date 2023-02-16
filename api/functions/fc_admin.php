<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/db_cstr/db_cstr.php');

class functions_adm extends cstr
{
    private $arr_input = array('username','phone_no','password','store_name'); 

    function fc_validation_register($input_params)
    {
        $result = array('status'=>true,'msg'=>'');
        foreach($this->arr_input as $key)
        {
            if(!isset($input_params[$key]) || $input_params[$key] == null || $input_params[$key] =='')
            {
                $result['status'] = false;
                $result['msg'] .= $key.' kosong<br>';
            }
        }
        return $result;
    }

    function fc_validation_get_data($input_params)
    {
        $arr_data = array('store_name');
        foreach($arr_data as $key)
        {
            if(!isset($input_params[$key]) || $input_params[$key] == null || $input_params[$key] =='')
            {
                $result['status'] = false;
                $result['msg'] .= $key.' kosong<br>';
            }
        }
        return $result;
    }

    function fc_check_db($input_params)
    {
        $check_user = $this->fc_check_username($input_params);
        if($check_user == false)
        {
            $check_phone = $this->fc_check_phone_no($input_params);
            if($check_phone == false)
            {
                $save_user = $this->fc_add_user($input_params);
                if($save_user == true)
                {
                    return 'registrasi berhasil, silahkan login';
                }
            }
            else
            {
                return "gagal registrasi! no ponsel ".$check_phone['phone_no']." sudah terdaftar";    
            }
        }
        else
        {
            return "gagal registrasi! username ".$input_params['username']." sudah terdaftar";
        }
    }

    function fc_add_user($input_params)
    {
        $pdo = new cstr;
        $input_params['password'] = base64_encode($input_params['password']);
        $sql = "INSERT INTO tb_seller_agent (";
        foreach($this->arr_input as $key)
        {
            $sql .= "$key,";
        }
        $sql = substr($sql,0,-1).') VALUES (';
        foreach($this->arr_input as $val)
        {
            $sql .= "'$input_params[$val]',";
        }
        $sql = substr($sql,0,-1).');';
        $result = $pdo->pdo()->prepare($sql)->execute();
        return $result;
    }

    function fc_check_username($input_params)
    {
        $pdo = new cstr;
        $sql = "SELECT username FROM tb_seller_agent WHERE username = '$input_params[username]';";
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_COLUMN);
        return $result;
    }

    function fc_check_phone_no($input_params)
    {
        $pdo = new cstr;
        $sql = "SELECT phone_no FROM tb_seller_agent WHERE phone_no = '$input_params[phone_no]';";
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_COLUMN);
        return $result;
    }

    function fc_check_pass($input_params)
    {
        $pdo = new cstr;
        $sql = "SELECT store_name, password FROM tb_seller_agent WHERE username = '$input_params[user_or_phone]' OR phone_no = '$input_params[user_or_phone]';";
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        $result['password'] = base64_decode($result['password']);
        return $result;
    }

    function fc_check_user_or_phone($input_params)
    {
        unset($this->arr_input['3']);
        // cek yang diinput username atau phone_no
        if(substr($input_params['user_or_phone'], 0, 2) == '08')
        {
            // phone_no
            $input_params['phone_no'] = $input_params['user_or_phone'];
            unset($input_params['user_or_phone']);
            unset($this->arr_input[0]);
            // validasi
            $validation = $this->fc_validation_login($input_params);
            if($validation == true)
            {
                $check_result = $this->fc_check_phone_no($input_params);
            }
        }
        else
        {
            // username
            $input_params['username'] = $input_params['user_or_phone'];
            unset($input_params['user_or_phone']);
            unset($this->arr_input[1]);
            // validasi
            $validation = $this->fc_validation_login($input_params);
            if($validation == true)
            {
                $check_result = $this->fc_check_username($input_params);
            }
        }
        return $check_result;
    }

    function fc_activate_session($input_params, $session)
    {
        $pdo = new cstr;
        $sql = "UPDATE tb_seller_agent SET session = '$session' WHERE username = '".$input_params['user_or_phone']."' OR phone_no = '".$input_params['user_or_phone']."';";
        $result = $pdo->pdo()->prepare($sql)->execute();
        return $result;
    }

    function fc_validation_login($input_params)
    {
        $result = array('status'=>true,'msg'=>'');
        $valid_data = $this->arr_input;
        unset($valid_data['3']);
        array_splice($valid_data, 0, 2, 'user_or_phone');
        // echo var_dump($valid_data);die;
        foreach($valid_data as $key)
        {
            if(!isset($input_params[$key]) || $input_params[$key] == null || $input_params[$key] =='')
            {
                $result['status'] = false;
                $result['msg'] .= $key.' kosong<br>';
            }
        }
        return $result;
    }

    function fc_check_session($session)
    {
        $pdo = new cstr;
        $sql = "SELECT username FROM tb_seller_agent WHERE session = '$session';"; #echo $sql;die;
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function fc_destroy_session($input_params)
    {
        $pdo = new cstr;
        $sql = "UPDATE tb_seller_agent SET session = '' WHERE username = '".$input_params['username']."' AND store_name = '".$input_params['store_name']."';";
        $result = $pdo->pdo()->prepare($sql)->execute();
        return $result;
    }

    function fc_get_store_contact($store_name)
    {
        $pdo = new cstr;
        $sql = "SELECT phone_no FROM tb_seller_agent WHERE store_name = '$store_name'";
        $phone = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        $result = substr($phone['phone_no'], 1, $phone['phone_no']);
        return $result;
    }

    function fc_get_store_name($store_name)
    {
        $pdo = new cstr;
        $sql = "SELECT store_name FROM tb_seller_agent WHERE store_name = '$store_name'";
        $res = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        $result = $res['store_name'];
        return $result;
    }

}

?>