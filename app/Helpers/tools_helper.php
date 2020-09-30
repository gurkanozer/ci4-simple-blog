<?php

function send_email($to = "", $subject = "", $message = "",$config="",$from)
{
    $email = \Config\Services::email();
    $email->clear();
    $email->initialize($config);
    $email->setFrom($from['email'], $from['fullname']);
    $email->setTo($to);
    $email->setSubject($subject);
    $email->setMessage($message);
    return $email->send();
}

function get_image($file_name, $type = "", $folder)
{
    $path = "/uploads/images/" . $folder . "/";
    if($type != '')
        $path  .= $type . '/';
  
    return $path . $file_name;
}
function image_manipulation($path = "./uploads/images", $imageService, $image, $imageName, $type = "full")
{
    $fullPath = $path . "/" . $type . "/";
    if (!file_exists($fullPath)) {
        mkdir($fullPath, 755);
    }
    $imageService->withFile($image);
    switch ($type) {
        case "thumb":
            $imageService->fit(150, 150);
            break;
        case "exsm":
            $imageService->fit(60, 60);
            break;
        case "banner":
            $imageService->fit(950,532);
        break;
        case "sneak":
            $imageService->fit(750,300);
        break;
    }
    return $imageService->save($fullPath . $imageName);
}
function remove_data($path)
{
    if (file_exists($path))
        if (unlink($path)) return true;
        else return false;
}

function encrypt_password($password)
{
    $config = new \Config\Encryption();
    $peppered = hash_hmac('sha256',$password,$config->key);
    $hashed = password_hash($peppered,PASSWORD_BCRYPT);
    return $hashed;
}
function valid_password($password,$hashed_pass)
{
    $config = new \Config\Encryption();
    $peppered = hash_hmac('sha256',$password,$config->key);
    if(password_verify($peppered,$hashed_pass)) return true;
    else return false;
}

function form_data($data){
    return trim($data);
}

function is_user_active(){
    $session = session();
    $user = $session->get('this_is_our_master');
    if($user){
        return $user;
    }
    else return false;
}

function set_alert($alert_type=''){

    switch($alert_type){
        case 'failed':
            $alert=[
                'title'=>'Hata!',
                'text'=>'İşlem başarısız.',
                'timer'=>2000,
                'position'=>'top-end',
                'timeProgressBar'=>true,
                'showConfirmButton'=>false
            ];
        break;
            case 'success':
                $alert=[
                    'title'=>'Tamamlandı!',
                    'text'=>'İşlem başarılı.',
                    'timer'=>2000,
                    'position'=>'top-end',
                    'timeProgressBar'=>true,
                    'showConfirmButton'=>false
                ];
            break;

    }
    return $alert;
}
