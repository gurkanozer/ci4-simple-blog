<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SettingsModel;
use App\Models\Admin\UserModel;

class Userop extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new SettingsModel($db);
		$result = $model->get_all();
		return view("admin/login/login", ['title' => 'Login', 'items' => $result[0]]);
	}

	public function login()
	{
		$db = db_connect();
		$session = session();
		//Validation kurallarını çek
		$validation =  \Config\Services::validation();
		$validation->reset();
		$userData = $this->get_datas();
		//Validation işlemini kontrol et
		$status = false;
		if ($validation->run($userData, 'login')) {
			$userModel = new UserModel($db);
			$result = $userModel->get(['email' => $userData['email']]);
			if ($result) {
				if (valid_password($userData['password'], $result->password)) {
					$userData = [
						'fullname' => $result->fullname,
						'password' => encrypt_password($userData['password']),
						'isLoggedIn' => true
					];
					$session->set('this_is_our_master', $userData);
					return redirect()->to('/admin');
				} else $status = false;
			} else $status = false;
		} else $status = false;
		if (!$status) {
			$settingsModel = new SettingsModel($db);
			$result = $settingsModel->get_all();
			$session->setFlashdata('alert', 'danger');
			return view('admin/login/login', ['title' => 'login', 'items' => $result[0]]);
		}
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}

	private function get_datas()
	{
		$data['password'] = form_data($this->request->getPost('password'));
		$data['email'] = form_data($this->request->getPost('email'));
		return $data;
	}
	//--------------------------------------------------------------------

}
