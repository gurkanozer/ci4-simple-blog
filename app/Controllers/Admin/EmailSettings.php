<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\EmailSettingsModel;
use stdClass;

class EmailSettings extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new EmailSettingsModel($db);
		$result = $model->get(['id'=>1]);
			return view("admin/pages/email_settings", ['title' => 'Email Settings','item'=>$result]);
	}
	public function update(){
		$db = db_connect();
		$model = new EmailSettingsModel($db);
		$result = $model->get(['id'=>1]);
		$validation =  \Config\Services::validation();
		$validation->reset();
		//Post işlemi varsa data'yı çek
		$data = $this->get_datas();
		//Validation işlemini kontrol et
		if ($validation->run($data, 'email_settings')) {
		if(empty($result)){
			$result = $model->add($data);
		}else $result = $model->update(['id'=>1],$data);
		$session = session();
			if($result){
				$session->setFlashdata('alert', set_alert("success"));
				return redirect()->to('/admin/settings');
				}
			else{
				$session->setFlashdata('alert', set_alert("failed"));
				return redirect()->to('/admin/settings');
			}
		}else{
			$validation = $validation->getErrors();
			return view("admin/pages/email_settings", ['title' => 'Email Settings','validation'=>$validation, 'item'=>(object)$data]);
		}

	}
	private function get_datas()
	{
		$data['protocol'] = form_data( $this->request->getPost('protocol'));
		$data['host'] =  form_data($this->request->getPost('host'));
		$data['port'] =  form_data($this->request->getPost('port'));
		$data['user_name'] =  form_data($this->request->getPost('user_name'));
		$data['user'] =  form_data($this->request->getPost('user'));
		$data['password'] =  form_data($this->request->getPost('password'));
		return $data;
	}
	//--------------------------------------------------------------------

}
