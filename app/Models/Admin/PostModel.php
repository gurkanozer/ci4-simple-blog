<?php

namespace App\Models\Admin;

use App\Models\BaseModel;
use CodeIgniter\Database\ConnectionInterface;

class PostModel extends BaseModel
{

    protected $table = 'posts';
    public function __construct(ConnectionInterFace &$db)
    {
        $this->db = &$db;
    }
    public function add_post($data, $image)
    {
        $imageName = $image->getRandomName();
        $imageService = service("image");
        //image'i kontrol et
        if ($image->isValid() && !$image->hasMoved()) {
            $path = "./uploads/images/posts";
            $fullImage = image_manipulation($path, $imageService, $image, $imageName, "full");
            $thumbImage = image_manipulation($path, $imageService, $image, $imageName, "exsm");
            $sneakImage = image_manipulation($path, $imageService, $image, $imageName, "sneak");
            //imageler yüklenmişse devam et
            if ($fullImage && $thumbImage && $sneakImage) {
                //$data = $this->setData($data,$imageName);
                //data'yı ayarla
                $data['img'] = $imageName;
                $result = $this->add($data);
            }
        } else $result = false;
        return $result;
    }
    public function update_post($data = [], $image, $old_data)
    {
        $imageName = $image->getRandomName();
        $imageService = service("image");
        //Eğer resim boş gelmişse eskisini koru
        if ($image != "") {
            if ($image->isValid() && !$image->hasMoved()) {
                $path = "./uploads/images/posts";
                if (
                    remove_data($path . "/exsm/" . $old_data->img) &&
                    remove_data($path . "/full/" . $old_data->img) &&
                    remove_data($path . "/sneak/" . $old_data->img)
                ) {
                    //eski resmi sil ve yenilerini kaydet
                    $fullImage = image_manipulation($path, $imageService, $image, $imageName, "full");
                    $SmallImage = image_manipulation($path, $imageService, $image, $imageName, "exsm");
                    $sneakImage = image_manipulation($path, $imageService, $image, $imageName, "sneak");

                    //resimler kaydedilmişse data'yı ayarla ve kayıt işlemini tamamla
                    if ($fullImage && $SmallImage && $sneakImage) {
                        $data['img'] = $imageName;
                        $result = $this->update(['id' => $old_data->id], $data);
                    } else $result = false;
                } else $result = false;
            } else $result = false;
        } else {
            $result = $this->update(['id' => $old_data->id], $data);
        }
        return $result;
    }
}
