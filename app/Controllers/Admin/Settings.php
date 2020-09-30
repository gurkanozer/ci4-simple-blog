<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\Admin\SettingsModel;

class Settings extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new SettingsModel($db);
		// $result = $model->get(['id'=>1]);
		$result = $model->get_all();
		return view("admin/pages/settings", ['title' => 'Settings', 'result' => $result[0]]);
	}
	public function update(){
		//Validation kurallarını çek
		$validation =  \Config\Services::validation();
		$validation->reset();
		$validation->setRuleGroup('settings');
		//Post işlemi varsa data'yı çek
		$data = $this->get_datas();
		//Validation işlemini kontrol et
		if ($validation->run($data)) {
			$data['updated_at'] =  date("Y-m-d H:i:s");
			$db = db_connect();
			$model = new SettingsModel($db);
			$result = $model->get_all();
			$logo = $this->request->getFile('logo');
			$home_banner = $this->request->getFile('home_banner');
			$about_banner = $this->request->getFile('about_banner');
			$contact_banner = $this->request->getFile('contact_banner');

			$logoName = $this->upload_image($logo,$data,'logo');
			if($logoName){
				$data['logo'] = $logoName;
			}
			$home_banner_name = $this->upload_image($home_banner,$data,'home');
			if($home_banner_name){
				$data['home_banner'] = $home_banner_name;
			}
			$about_banner_name = $this->upload_image($about_banner,$data,'about');
			if($about_banner_name){
				$data['about_banner'] = $about_banner_name;
			}
			$contact_banner_name = $this->upload_image($contact_banner,$data,'contact');
			if($contact_banner_name){
				$data['contact_banner'] = $contact_banner_name;
			}
			$result = $model->update(['id'=>$result[0]->id],$data);
			if ($result) {
				$session = session();
				$session->setFlashdata('alert', set_alert("success"));
				return redirect()->to('/admin/settings');
			} else {
				$session = session();
				$session->setFlashdata('alert', set_alert("failed"));
				echo $result;
			}
		}else {
			//Validation'dan geçememişse hataları ayarla ve sayfayı geri yükle
			$validation = $validation->getErrors();
			return view('/admin/pages/settings', ['title' => 'Settings', 'result' => $data,'validation'=>$validation]);
		}
	}
	private function upload_image($image,$data,$folder){
		helper('url_slug');
        $imageName = url_slug($data['site_name']).'.'. $image->getExtension();
        $imageService = service("image");
        //Eğer resim boş gelmişse eskisini koru
        $path = "./uploads/images/".$folder;
        if ($image != "" ) {
            if ($image->isValid() && !$image->hasMoved()) {
                    $fullImage = image_manipulation($path, $imageService, $image, $imageName, "full");
                    $thumbImage = image_manipulation($path, $imageService, $image, $imageName, "thumb");
                    $smallImage = image_manipulation($path, $imageService, $image, $imageName, "exsm");
                    //resimler kaydedilmişse data'yı ayarla ve kayıt işlemini tamamla
                    if ($fullImage && $thumbImage && $smallImage) {
                        $result = $imageName;
                    } else $result = false;
            } else $result = false;
        } else {
            $result = false;
        }
        return $result;
	}
	private function get_datas()
	{
		$data['site_name'] = form_data($this->request->getPost('site_name'));
		$data['slogan'] = form_data($this->request->getPost('slogan'));
		$data['about'] =  form_data( $this->request->getPost('about'));
		$data['facebook'] =  form_data($this->request->getPost('facebook'));
		$data['twitter'] =  form_data($this->request->getPost('twitter'));
		$data['instagram'] =  form_data($this->request->getPost('instagram'));
		$data['phone'] =  form_data( $this->request->getPost('phone'));
		$data['address'] =  form_data($this->request->getPost('address'));
		return $data;
	}
	//--------------------------------------------------------------------
}
