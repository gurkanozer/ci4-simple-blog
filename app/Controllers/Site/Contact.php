<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Site\CategoryModel;
use App\Models\Site\UserModel;
use App\Models\Site\SettingsModel;
use App\Models\Site\EmailSettingsModel;

class Contact extends BaseController
{
	public function index()
	{
		$pageInfo = ['meta_title'=>'Contact',
		'page_title'=>'',
		'page_subtitle'=>''];
		$db = db_connect();
		$categoryModel = new CategoryModel($db);
		$userModel = new UserModel($db);
		$settingsModel = new SettingsModel($db);
		$user = $userModel->get_all();
		$categories = $categoryModel->get_all(['is_active' => 1]);
		$settings = $settingsModel->get_all();
		return view('site/pages/contact', ['info' => $pageInfo, 'categories' => $categories, 'user' => $user[0], 'settings' => $settings[0]]);
	}
	public function send_email()
	{
		$db = db_connect();
		$emailSettingsModel = new EmailSettingsModel($db);
		$emailSettings = $emailSettingsModel->get(['id' => 1]);
		$data = $this->get_datas();
		$session = session();

		$validation =  \Config\Services::validation();
		$validation->reset();
		if ($validation->run($data, 'email')) {
			$from = ['email' => $data['from'], 'fullname' => $data['fullname']];
			$config = array(
				"protocol"   => $emailSettings->protocol,
				"SMTPHost"  => "ssl://smtp.gmail.com",
				"SMTPPort"  => "465",
				"SMTPUser"  => "grknzr2609@gmail.com",
				"SMTPPass"  => "Turmit4n",
				//	"starttls"   => true,
				"charset"    => "utf-8",
				"mailType"   => "html",
				"wordWrap"   => true,
				"newline"    => "\r\n"
			);
			if (send_email($emailSettings->user, $data['subject'], $data['message'], $config, $from)) {
				$session->setFlashdata('alert', 'success');
			} else {
				$session->setFlashdata('alert', 'danger');
			}
		} else {
			$validation = $validation->getErrors();
			$session->setFlashdata('validation', $validation);
		}
		return redirect()->to("/contact");
		die();
	}
	private function get_datas()
	{
		$data['from'] = form_data($this->request->getPost('from'));
		$data['fullname'] = form_data($this->request->getPost('fullname'));
		$data['subject'] =  form_data($this->request->getPost('subject'));
		$data['email'] =  form_data($this->request->getPost('email'));
		$data['message'] =  form_data($this->request->getPost('message'));
		return $data;
	}
	//--------------------------------------------------------------------

}
