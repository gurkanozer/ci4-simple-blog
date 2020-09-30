<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PostModel;
use App\Models\Admin\CategoryModel;

class Posts extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$db = db_connect();
		$model = new PostModel($db);
		$result = $model->get_all();
		return view("admin/pages/post_list", ['title' => 'Post List', 'result' => $result]);
	}
	public function add()
	{
		$db = db_connect();
		$session = session();
		$model = new PostModel($db);
		$categories = $this->get_categories();
		if ($this->request->getMethod() != 'post') {
			return view("admin/pages/post_add", ['title' => 'Create New Post', 'categories' => $categories]);
			die();
		}
		$validation =  \Config\Services::validation();
		$validation->reset();
		//Post işlemi varsa data'yı çek
		$data = $this->get_datas();
		//Validation işlemini kontrol et
		if ($validation->run($data, 'post') && $validation->run($data, 'image')) {
			$image = $this->request->getFile('img');
			$result = $model->add_post($data, $image);
			if ($result) {
				$session->setFlashdata('alert', set_alert("success"));
				return redirect()->to('/admin');
			} else {
				$session->setFlashdata('alert', set_alert("failed"));
				return view('/admin/pages/post_add', $data);
			}
		} else {
			//Validation'dan geçememişse hataları ayarla ve sayfayı geri yükle
			$data['validation'] = $validation->getErrors();
			$data['categories'] = $categories;
			return view('/admin/pages/post_add', $data);
		}
		//alert eklenecek...
	}
	public function update($id)
	{
		$db = db_connect();
		$session = session();
		$model = new PostModel($db);
		$result = $model->get(['id' => $id]);
		$categories = $this->get_categories();
		//Eğer gönderilen id'ye ait bir kayıt yoksa liste sayfasına yönlendir
		if (empty($result)) {
			echo view('blog_errors/not_found');
			die();
		}
		//Post işlemi yoksa formu yükle
		if ($this->request->getMethod() != 'post') {
			return view("admin/pages/post_edit", ['title' => 'Update Post', 'post' => $result, 'categories' => $categories]);
		}
		//Validation kurallarını çek
		$validation =  \Config\Services::validation();
		$validation->reset();
		$validation->setRuleGroup('post');
		//Post işlemi varsa data'yı çek
		$data = $this->get_datas();
		//Validation işlemini kontrol et
		if ($validation->run($data)) {
			$data['updated_at'] =  date("Y-m-d H:i:s");
			$image = $this->request->getFile('img');
			$result = $model->update_post($data, $image, $result);
			if ($result) {
				$session->setFlashdata('alert', set_alert("success"));
				return redirect()->to('/admin');
			} else {
				
				$session->setFlashdata('alert', set_alert("failed"));
				$data['categories'] = $categories;
				return view('/admin/pages/post_edit', $data);
			}
		} else {
			//Validation'dan geçememişse hataları ayarla ve sayfayı geri yükle
			$data['validation'] = $validation->getErrors();
			$data['categories'] = $categories;
			return view('/admin/pages/post_edit', $data);
		}
	}
	public function delete()
	{
		$id = $this->request->getPost("data");
		if ($id != null) {
			$db = db_connect();
			$model = new PostModel($db);
			$data = $model->get(['id' => $id]);

			if ($data) {
				$path = "./uploads/images/posts";
				remove_data($path . "/exsm/" . $data->img);
				remove_data($path . "/full/" . $data->img);
				$model->delete(['id' => $id]);
				$result = $model->get_all();
				echo view("admin/pages/post_list", ['title' => 'Post List', 'result' => $result]);
			}
		}
	}
	public function search()
	{
		$key = trim($this->request->getPost("search"));
		$db = db_connect();
		$model = new PostModel($db);
		$result = $model->like('title', $key);
		return view("admin/pages/post_list", ['title' => 'Post List', 'result' => $result]);
	}

	public function is_active_setter($id)
	{
		$db = db_connect();
		$model = new PostModel($db);
		$is_active = $this->request->getPost("data");
		$data = $model->get(['id' => $id]);
		if ($is_active == "true") $data->is_active = 1;
		else $data->is_active = 0;
		$model->update(['id' => $id], $data);
		return $data->is_active;
	}
	private function get_categories()
	{
		$db = db_connect();
		$model = new CategoryModel($db);
		$result = $model->get_all();
		return $result;
	}
	private function get_datas()
	{
		helper('url_slug');
		$data['title'] = form_data($this->request->getPost('title'));
		$data['url'] = url_slug($data['title']);
		$data['sub_title'] = form_data($this->request->getPost('sub_title'));
		$data['body'] = form_data($this->request->getPost('body'));
		$data['category_id'] = form_data($this->request->getPost('categories'));
		return $data;
	}
}
