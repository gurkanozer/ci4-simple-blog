<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Site\CategoryModel;
use App\Models\Site\PostModel;
use App\Models\Site\UserModel;
use App\Models\Site\SettingsModel;

class Home extends BaseController
{

	public function index()
	{
		$db = db_connect();
		$pageInfo = [
			'meta_title' => 'Home',
			'page_title' => '',
			'page_subtitle' => ''
		];
		$userModel = new UserModel($db);
		$settingsModel = new SettingsModel($db);
		$categoryModel = new CategoryModel($db);
		$postModel = new PostModel($db);

		$user = $userModel->get_all();
		$settings = $settingsModel->get_all();
		$categories = $categoryModel->get_all(['is_active' => 1]);
		$join = 'categories';
		$condition = 'categories.id= posts.category_id';
		$select = "posts.id id,posts.title title,posts.sub_title sub_title,
				   posts.body body,posts.img img,posts.url url,posts.category_id category_id,
				   categories.title category_title,posts.created_at created_at, 
				   posts.updated_at updated_at,posts.is_active is_active";
		$where = ['posts.is_active' => 1];
		if ($this->request->getMethod() != 'post' || empty($this->request->getPost('count'))) {
			$pageInfo['post_count'] = 5;
		} else {
			$count = $this->request->getPost('count');
			$pageInfo['post_count'] = $count + 5; 
		}
		$posts = $postModel->get_limited_posts($join, $condition, $select, $where, ['count' => $pageInfo['post_count'], 'pos' => 0]);
		$pageInfo['page_title'] = 'Postlar';
		$pageInfo['page_subtitle'] = 'tümü';
		return view('site/pages/home', ['info' => $pageInfo, 'categories' => $categories, 'posts' => $posts, 'user' => $user[0], 'settings' => $settings[0]]);
	}
	public function search()
	{
		($this->request->getGet('search')==null)?$key = "" : $key = $this->request->getGet('search');
		$db = db_connect();
		$pageInfo = [
			'meta_title' => 'Home',
			'page_title' => '',
			'page_subtitle' => ''
		];
		$userModel = new UserModel($db);
		$settingsModel = new SettingsModel($db);
		$categoryModel = new CategoryModel($db);
		$postModel = new PostModel($db);

		$user = $userModel->get_all(['is_active' => 1]);
		$settings = $settingsModel->get_all(['is_active' => 1]);
		$categories = $categoryModel->get_all(['is_active' => 1]);
		$join = 'categories';
		$condition = 'categories.id= posts.category_id';
		$select = "posts.id id,posts.title title,posts.sub_title sub_title,
				   posts.body body,posts.img img,posts.url url,posts.category_id category_id,
				   categories.title category_title,posts.created_at created_at, 
				   posts.updated_at updated_at,posts.is_active is_active";
		$where = ['posts.is_active' => 1];
		if ($this->request->getMethod() != 'post' || empty($this->request->getPost('count'))) {
			$pageInfo['post_count'] = 5;
		} else {
			$count = $this->request->getPost('count');
			$pageInfo['post_count'] = $count + 5; 
		}
		if ($this->request->getMethod() == 'get') {
			$posts = $postModel->searchInPosts($join, $condition, $select, $where, $key,['count' =>$pageInfo['post_count'], 'pos' => 0]);
			$pageInfo['page_title'] = 'Arama Sonuçları';
			$pageInfo['page_subtitle'] = $key;
		}
		return view('site/pages/home', ['info' => $pageInfo, 'categories' => $categories, 'posts' => $posts, 'user' => $user[0], 'settings' => $settings[0]]);
	}
	//--------------------------------------------------------------------

}
