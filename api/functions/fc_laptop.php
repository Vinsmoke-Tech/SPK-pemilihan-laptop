<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/pilihlaptop/api/db_cstr/db_cstr.php');

class functions extends cstr
{

    private $data_laptop = array(
                                'merk_type',
                                'prosesor',
                                'kecepatan_prosesor',
                                'kapasitas_ram', 
                                'kapasitas_penyimpanan',
                                'vga_card',
                                'sistem_operasi', 
                                'baterei', 
                                'harga',
                                'store_name',
                                'image_url'
                            );

    function fc_validation_input($input_params)
    {
        $result = array('status'=>true,'msg'=>'');
        // $input_params['ranking_prosesor'] = '0';
        foreach ($this->data_laptop as $var)
        {
            if(!isset($input_params[$var]) || $input_params[$var] == null || $input_params[$var] == '')
            {
                $result['status'] = false;
                $result['msg'] .= $var.' kosong';
            }
        }
        return $result;
    }

    function fc_validation_photo($input_params, $vars)
    {
        $result = array('status'=>true,'msg'=>'');
        foreach ($vars as $var)
        {
            if(!isset($input_params[$var]) || $input_params[$var] == null || $input_params[$var] == '')
            {
                $result['status'] = false;
                $result['msg'] .= $var.' kosong';
            }
        }
        return $result;
    }

    function fc_validation_perhitungan($input_params)
    {
        $result = array('status'=>true, 'msg'=>'');
        $params = $this->data_laptop;
        unset($params['0'], $params['1'], $params['9'], $params['10']);
        foreach ($params as $var)
        {
            if(!isset($input_params[$var]) || $input_params[$var] == null || $input_params[$var] == '')
            {
                $result['status'] = false;
                $result['msg'] .= $var.' kosong';
            }
        }
        return $result;
    }

    // function fc_get_proc_score($processsor_nm, $pdo)
    // {
    //     // $pdo = new cstr;
    //     $sql = "SELECT score FROM tb_centurionmark WHERE prosesor = '$processsor_nm'";
    //     $result =  $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
    //     return $result;
    // }


// BOBOT KRITERIA & BOBOT NORMALISASI =================================================================================================================
    function fc_convert_bobotkriteria($input_params)
    {
        unset($input_params['prosesor']);
        unset($input_params['image_url']);
        $nilai_faktor = array(
            'kecepatan_prosesor'    =>array(
                                        '<2 GHz'=>1,
                                        '2.1 - 3.4 GHz'=>2,
                                        '>3.5 GHz'=>3,
                                        
                                    ), 
            'kapasitas_ram'         =>array(
                                        4=>1,
                                        6=>2,
                                        8=>3,
                                        10=>4
                                    ),
            'kapasitas_penyimpanan' =>array(
                                        256=>1,
                                        512=>2,
                                        1000=>3,
                                    ),
            'vga_card'              =>array(
                                        'onboard'=>1,
                                        'dedicated'=>2,
                                    ),
            'sistem_operasi'        =>array(
                                        'Windows 10 home'=>1,
                                        'Windows 10 pro'=>2,
                                        'Windows 11'=>3,
                                    ),
            'baterei'              =>array(
                                        6=>1,
                                        7=>2,
                                        8=>3,
                                        9=>4,
                                    ),
            'harga'                =>array(
                                        '>=7.000.000'=>1,
                                        '6.000.000 - 6.999.000'=>2,
                                        '5.000.000 - 5.999.000'=>3,
                                        '<5000000'=>4,
                                    )
        );

        $bk = $input_params;
        foreach($input_params as $key=>$val)
        {
            foreach($nilai_faktor as $k=>$v)
            {
                if($key = $k)
                {
                    foreach($v as $x=>$y)
                    if($val == $x)
                    {
                        $bk[$key] = $y;
                    }
                }  
            }
        }

        // prosesor 
        if($input_params['kecepatan_prosesor'] == '<2 GHz'){ $bk['kecepatan_prosesor'] = 1; }
        else if($input_params['kecepatan_prosesor'] == '2.1 - 3.4 GHz'){ $bk['kecepatan_prosesor'] = 2; }
        else if($input_params['kecepatan_prosesor'] == '>3.5 GHz'){ $bk['kecepatan_prosesor'] = 3; }

        // ram 
        if($input_params['kapasitas_ram'] == "4"){ $bk['kapasitas_ram'] = 1; }
        else if($input_params['kapasitas_ram'] == "6"){ $bk['kapasitas_ram'] = 2; }
        else if($input_params['kapasitas_ram'] == "8"){ $bk['kapasitas_ram'] = 3; }
        else if($input_params['kapasitas_ram'] == "10"){ $bk['kapasitas_ram'] = 4; }
        
        // penyimpanan 
        if($input_params['kapasitas_penyimpanan'] == "256"){ $bk['kapasitas_penyimpanan'] = 1; }
        else if($input_params['kapasitas_penyimpanan'] == "512"){ $bk['kapasitas_penyimpanan'] = 2; }
        else if($input_params['kapasitas_penyimpanan'] == "1000"){ $bk['kapasitas_penyimpanan'] = 3; }

        // vga 
        if($input_params['vga_card'] == 'onboard'){ $bk['vga_card'] = 1; }
        else if($input_params['vga_card'] == 'dedicated'){ $bk['vga_card'] = 2; }

        // sistem operasi 
        if($input_params['sistem_operasi'] == 'Windows 10 home' ){ $bk['sistem_operasi'] = 1; }
        else if($input_params['sistem_operasi'] == 'Windows 10 pro' ){ $bk['sistem_operasi'] = 2; }
        else if($input_params['sistem_operasi'] == 'Windows 11' ){ $bk['sistem_operasi'] = 3; }

        // baterei
        if($input_params['baterei'] == "6" ){ $bk['baterei'] = 1; }
        else if($input_params['baterei'] == "7"){ $bk['baterei'] = 2; }
        else if($input_params['baterei'] == "8"){ $bk['baterei'] = 3; }
        else if($input_params['baterei'] == "9"){ $bk['baterei'] = 4; }

        // harga    
        if($input_params['harga'] >= 7000000)
        { $bk['harga'] = 1; }
        else if($input_params['harga'] >= 6000000 && $input_params['harga'] <= 6999000)
        { $bk['harga'] = 2; }
        else if($input_params['harga'] >= 5000000 && $input_params['harga'] <= 5999000)
        { $bk['harga'] = 3; }
        else if($input_params['harga'] < 5000000 )
        { $bk['harga'] = 4; }


        return $bk;
    }

    function fc_convert_bobotnormalisasi($bk)
    {
        $nmax = array(
            'kecepatan_prosesor'=>3, 
            'kapasitas_ram'=>4, 
            'kapasitas_penyimpanan'=>3,
            'vga_card'=>2,
            'sistem_operasi'=>3, 
            'baterei'=>4, 
            'harga'=>4
        );
        $nilai_bn = $bk;
        foreach($nmax as $key=>$val)
        {
            foreach($bk as $k=>$v)
            {
                if($key == $k)
                {
                    $nilai_bn[$key] = $v/($val);
                }
            }
        } 
        return $nilai_bn;
    }

    function fc_get_bk_id($id)
    {
        $pdo = new cstr;
        $sql = "SELECT * FROM tb_bobot_kriteria WHERE id = '$id'"; 
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function fc_get_bn_id($id)
    {
        $pdo = new cstr;
        $sql = "SELECT * FROM tb_bobot_normalisasi WHERE id = '$id'"; 
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function fc_input_bk_bn($input_params, $pdo){
        // $pdo = new cstr;
        $bk = $this->fc_convert_bobotkriteria($input_params);
        $bn = $this->fc_convert_bobotnormalisasi($bk);
// echo var_dump($bk);
// echo var_dump($bn);die;

        $sql_bk = "INSERT INTO tb_bobot_kriteria (";
        foreach($bk as $key=>$val)
        {
            $sql_bk .= "$key,";
        }
        $sql_bk = substr($sql_bk,0,-1).') VALUES (';
        foreach($bk as $key=>$val)
        {
            $sql_bk .= "'$val',";
        }
        $sql_bk = substr($sql_bk,0,-1).');'; 

        $sql_bn = "INSERT INTO tb_bobot_normalisasi (";
        foreach($bn as $key=>$val)
        {
            $sql_bn .= "$key,";
        }
        $sql_bn = substr($sql_bn,0,-1).') VALUES (';
        foreach($bn as $key=>$val)
        {
            $sql_bn .= "'$val',";
        }
        $sql_bn = substr($sql_bn,0,-1).');'; 

        try
        {
            $input_bk = $pdo->pdo()->prepare($sql_bk)->execute();
            if($input_bk == true)
            {
                $input_bn = $pdo->pdo()->prepare($sql_bn)->execute();
                $result = $input_bn;
            }
        }
        catch(PDOException $e)
        {
            return $e;
        }
        return $result;
    }

    function fc_get_bobotnormaliasi()
    {
        $pdo = new cstr;
        $sql = "SELECT * FROM tb_bobot_normalisasi;";
        $result = $pdo->pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fc_update_bk_bn($input_params)
    {
        $pdo = new cstr;
        $bk = $this->fc_convert_bobotkriteria($input_params);
        $bn = $this->fc_convert_bobotnormalisasi($bk);
        unset($bk['id']);
        // bobot kriteria
        $sql_bk = "UPDATE tb_bobot_kriteria SET ";
        foreach($bk as $key=>$val)
        {
            $sql_bk .= "$key = '$val',";
        }
        $sql_bk = substr($sql_bk,0,-1)." WHERE id = ".$input_params['id'].";"; #echo $sql;

        // bobot normaliasi
        $sql_bn = "UPDATE tb_bobot_normalisasi SET ";
        foreach($bn as $key=>$val)
        {
            $sql_bn .= "$key = '$val',";
        }
        $sql_bn = substr($sql_bn,0,-1)." WHERE id = ".$input_params['id'].";";

        $update_bk = $pdo->pdo()->prepare($sql_bk)->execute();
        if($update_bk == true)
        {
            $update_bn = $pdo->pdo()->prepare($sql_bn)->execute();
            if($update_bn == true)
            {
                $result = $update_bn;
                return $result;
            }
        }
    }

    function fc_delete_bk_bn($id)
    {
        try{
            $pdo = new cstr;
            $sql_bk = "DELETE FROM tb_bobot_kriteria WHERE id = $id";
            $sql_bn = "DELETE FROM tb_bobot_normalisasi WHERE id = $id";
            $delete_bk = $pdo->pdo()->prepare($sql_bk)->execute();
            if($delete_bk == true)
            {
                $delete_bn = $pdo->pdo()->prepare($sql_bn)->execute();
                if($delete_bn == true)
                {
                    $result = $delete_bn;
                    return $result;
                }
            }
        } catch (PDOException $e) {
            return $e;
        }
        
    }

// DATA laptop =====================================================================================================================
    function fc_get_all_data()
    {
        $pdo = new cstr;
        $sql = "SELECT * FROM tb_laptop";
        $result = $pdo->pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    function fc_get_data_by_id($id)
    {
        $pdo = new cstr;
        $sql = "SELECT * FROM tb_laptop WHERE id = '$id'";
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function fc_get_data_by_store_name($store)
    {
        $pdo = new cstr;
        $sql = "SELECT * FROM tb_laptop WHERE store_name = '$store'";
        $result = $pdo->pdo()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function fc_input_data($input_params, $pdo)
    {
        $sql = "INSERT INTO tb_laptop (";
        foreach($this->data_laptop as $key)
        {
            $sql .= "$key,";
        }
        $sql = substr($sql,0,-1).') VALUES (';
        foreach($this->data_laptop as $val)
        {
            $sql .= "'$input_params[$val]',";
        }
        $sql = substr($sql,0,-1).');';
        $result = $pdo->pdo()->prepare($sql)->execute();
        return $result;
    }

    function fc_update_data($input_params)
    {
        $pdo = new cstr;
        $sql = "UPDATE tb_laptop SET ";
        foreach($this->data_laptop as $key)
        {
            $sql .= "$key = '$input_params[$key]',";
        }
        $sql = substr($sql,0,-1)." WHERE id = ".$input_params['id'].";"; 
        $result = $pdo->pdo()->prepare($sql)->execute();
        return $result;
    }

    function fc_delete_data($id)
    {
        $pdo = new cstr;
        $sql = "DELETE FROM tb_laptop WHERE id = $id";
        $result = $pdo->pdo()->prepare($sql)->execute();
        return $result;
    }

// MENGHITUNG NILAI AKHIR =====================================================================================================

    function fc_get_wj($input_params)
    {
        $result = array();
        foreach($input_params as $key=>$val)
        {
            $result[$key] = ((intval($val)-1) / (4-1));
        }
        return $result;
    }

    function fc_get_utility($bn, $input_params)
    {
        $result = array();
        foreach($input_params as $key=>$val)
        {
           foreach($bn as $k=>$v)
            {
                foreach ($v as $m=>$n)
                {
                    if($key == $m)
                    {
                        $result[$k][$key] = $val * $n;
                        $result[$k]['id'] = $bn[$k]['id'];
                        $result[$k]['merk_type'] = $bn[$k]['merk_type'];
                        $result[$k]['store_name'] = $bn[$k]['store_name'];
                    }
                }
            }
        }
        return $result;
    }

    function get_image_url($id)
    {
        $pdo = new cstr();
        $sql = "SELECT image_url FROM tb_laptop WHERE id = $id;";
        $result = $pdo->pdo()->query($sql)->fetch(PDO::FETCH_COLUMN);
        return $result;
    }

    function fc_get_na($utility)
    {
        for($i=0;$i<count($utility); $i++)
        {
            $na[$i]['id']           = $utility[$i]['id'];
            $na[$i]['merk_type']    = $utility[$i]['merk_type'];
            $na[$i]['store_name']     = $utility[$i]['store_name'];
            $na[$i]['image_url']    = $this->get_image_url($utility[$i]['id']);
            $na[$i]['nilai_akhir']  = 
                $utility[$i]["kecepatan_prosesor"] +
                $utility[$i]["kapasitas_ram"] +
                $utility[$i]["kapasitas_penyimpanan"] +
                $utility[$i]["vga_card"] +
                $utility[$i]["sistem_operasi"] +
                $utility[$i]["baterei"] +
                $utility[$i]["harga"];
        }
        return $na;
    }
    
    function sorting($na)
    {
        $data = $na;
        $keys = array_column($data, 'nilai_akhir');
        array_multisort($keys, SORT_DESC, $data);
        return $data;
    }

}

?>