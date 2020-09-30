<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\CategoryModel;

class Categories extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$model = new CategoryModel($db);
		$result = $model->get_all();
		return view("admin/pages/categories", ['title' => 'Categories', 'result' => $result]);
	}
	public function add()
	{
		$db = db_connect();
		$model = new CategoryModel($db);
		$data = $this->get_datas();
		$validation =  \Config\Services::validation();
		$validation->reset();
		$validation->setRules([
			'title' => [
				'rules' => 'required|is_unique[categories.title]',
				'errors' => [
					'required' => 'Kategori ismi boş olamaz!',
					'is_unique' => 'Bu kategori zaten mevcut!'
				]
			]
		]);
		if ($validation->run($data)) {
			$result = $model->add($data);
			if ($result) {
				$result = $model->get_all();
				return view("admin/pages/categories", ['title' => 'Categories', 'result' => $result]);
			} else {
				//set error
			}
		} else {
			$result = $model->get_all();
			$validation = $validation->getErrors();
			return  view("admin/pages/categories", ['title' => 'Categories', 'result' => $result, 'validation' => $validation]);
		}
	}
	public function delete()
	{
		$db = db_connect();
		$model = new CategoryModel($db);
		$id = $this->request->getPost('data');
		if ($model->delete(['id' => $id])) {
			$result = $model->get_all();
			return view("admin/pages/categories", ['title' => 'Categories','result' => $result]);
		} else {
			$result = $model->get_all();
			return view("admin/pages/categories", ['title' => 'Categories','result' => $result]);
		}
	}
	public function is_active_setter($id)
	{
		$db = db_connect();
		$model = new CategoryModel($db);
		$is_active = $this->request->getPost("data");
		$data = $model->get(['id' => $id]);
		if ($is_active == "true") $data->is_active = 1;
		else $data->is_active = 0;
		$model->update(['id' => $id], $data);
		return $data->is_active;
	}
	public function update($id)
	{
		$data = $this->get_datas();
		$db = db_connect();
		$validation =  \Config\Services::validation();
		$validation->reset();
		$validation->setRules([
			'title' => [
				'rules' => "required|is_unique[categories.title,id,$id]",
				'errors' => [
					'required' => 'Kategori ismi boş olamaz!',
					'is_unique' => 'Bu kategori zaten mevcut!'
				]
			]
		]);
		$model = new CategoryModel($db);
		if ($validation->run($data)) {
			$data['updated_at'] =  date("Y-m-d H:i:s");
			$result =$model->update(['id' => $id], $data);
			$result = $model->get_all();
			return view("admin/pages/categories", ['title' => 'Categories', 'result' => $result]);
		} else {
			$result = $model->get_all();
			$validation = $validation->getErrors();
			return  view("admin/pages/categories", ['title' => 'Categories', 'result' => $result, 'validation' => $validation]);
		}
		die();
	}
	private function get_datas()
	{
		$data=[];
		$data['title'] = $this->request->getPost('title');
		$data['title']= strtolower(form_data($data['title']));
		return $data;
	}

	//--------------------------------------------------------------------
}
