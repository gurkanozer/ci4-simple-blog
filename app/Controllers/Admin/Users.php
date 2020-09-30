<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;

class Users extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new UserModel($db);
		$result = $model->get_all();
		if ($result)
			return view("admin/pages/user", ['title' => 'User Profile', 'item' => $result[0]]);
		else return view("index");
	}

	public function update()
	{
		$db = db_connect();
		$session = session();
		$model = new UserModel($db);
		$result = $model->get_all();
		$result = $result[0];
		//Eğer gönderilen id'ye ait bir kayıt yoksa liste sayfasına yönlendir
		if (empty($result)) return redirect()->to('/admin');
		//Post işlemi yoksa formu yükle
		if ($this->request->getMethod() != 'post') {
			return view("admin/pages/user", ['title' => 'User', 'item' => $result]);
		}
		//Validation kurallarını çek
		$validation =  \Config\Services::validation();
		$validation->reset();
		//Post işlemi varsa data'yı çek
		$data = $this->get_datas();
		//Validation işlemini kontrol et
		if ($validation->run($data, 'user')) {
			if ($data['is_password_change'] == 'on') {
				if (!$validation->run($data, 'password')) {
					//Validation'dan geçememişse hataları ayarla ve sayfayı geri yükle
					$validation = $validation->getErrors();
					$item = (object)$data;
					return view('/admin/pages/user',['title' => 'User','item'=> $item,'validation'=>$validation]);
				}
			}
			$data['updated_at'] =  date("Y-m-d H:i:s");
			$result = $model->update_user($result,$data);
			if ($result) {
				$session->setFlashdata('alert', set_alert("success"));
				return redirect()->to('/admin/user');
			} else {
				$session->setFlashdata('alert', set_alert("failed"));
				$result = $model->get_all();
				return view('/admin/pages/user',['title' => 'User','item'=> $result[0]]);

			}
		} else {
			//Validation'dan geçememişse hataları ayarla ve sayfayı geri yükle
			$validation = $validation->getErrors();
			$item = (object)$data;
			return view('/admin/pages/user', ['title' => 'User','item'=>$item,'validation'=>$validation]);
		}
	}

	private function get_datas()
	{
		$data['fullname'] = form_data( $this->request->getPost('fullname'));
		$data['email'] =  form_data($this->request->getPost('email'));
		$data['password'] =  form_data($this->request->getPost('password'));
		$data['re_password'] =  form_data($this->request->getPost('re_password'));
		$data['is_password_change'] =  form_data($this->request->getPost('is_password_change'));
		return $data;
	}
	//--------------------------------------------------------------------

}
