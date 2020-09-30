<?php

namespace App\Models\Site;

use App\Models\BaseModel;
use CodeIgniter\Database\ConnectionInterface;

class SettingsModel extends BaseModel
{
    protected $table = 'settings';
    public function __construct(ConnectionInterFace &$db)
    {
        $this->db = &$db;
    }
    public function update_settings($data = [], $image, $old_data){
        helper('url_slug');
        $imageName = url_slug($data['site_name']).'.'. $image->getExtension();
        $imageService = service("image");
        //Eğer resim boş gelmişse eskisini koru
        $path = "./uploads/images/logo";
        if ($image != "" ) {
            if ($image->isValid() && !$image->hasMoved()) {
                    $fullImage = image_manipulation($path, $imageService, $image, $imageName, "full");
                    $thumbImage = image_manipulation($path, $imageService, $image, $imageName, "thumb");
                    $smallImage = image_manipulation($path, $imageService, $image, $imageName, "exsm");
                    //resimler kaydedilmişse data'yı ayarla ve kayıt işlemini tamamla
                    if ($fullImage && $thumbImage && $smallImage) {
                        $data['logo'] = $imageName;
                        $result = $this->update(['id' => $old_data->id], $data);
                    } else $result = false;
            } else $result = false;
        } else {
            $result = $this->update(['id' => $old_data->id], $data);
        }
        return $result;
    }
}
