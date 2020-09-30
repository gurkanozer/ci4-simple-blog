<?php namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Site\CategoryModel;
use App\Models\Site\PostModel;
use App\Models\Site\UserModel;
use App\Models\Site\SettingsModel;

class Posts extends BaseController
{
	public function index($url)
	{
		$pageInfo = ['meta_title'=>'Post',
		'page_title'=>'',
		'page_subtitle'=>''];
		$db = db_connect();
		$categoryModel = new CategoryModel($db);
		$postModel = new PostModel($db);
		$userModel = new UserModel($db);
		$settingsModel = new SettingsModel($db);
		$user = $userModel->get_all();
		$categories = $categoryModel->get_all();
        $posts = $postModel->get_all();
		$post = $postModel->join('categories',
		"categories.id= posts.category_id",
		"posts.id id,posts.title title,posts.sub_title sub_title,
		posts.body body,posts.img img,posts.url url,posts.category_id category_id, categories.title category_title,posts.created_at created_at, posts.updated_at updated_at,posts.is_active is_active",
		['url'=>$url,'posts.is_active'=>1]);
		$post = $post[0];
		if(empty($post)){
			return redirect()->to('/');
		}
		$settings = $settingsModel->get_all();
		$postInfo['meta_title'] = $post->title;
		return view('site/pages/post',['info'=>$pageInfo,'categories'=>$categories,'posts'=>$posts,'user'=>$user[0],'settings'=>$settings[0],'post'=>$post]);
	}
	public function categories($cat)	
	{
		$pageInfo = ['meta_title'=>'Home',
		'page_title'=>'Postlar',
		'page_subtitle'=>''];
		$db = db_connect();
		$categoryModel = new CategoryModel($db);
		$postModel = new PostModel($db);
		$userModel = new UserModel($db);
		$settingsModel = new SettingsModel($db);
		$user = $userModel->get_all();
		$categories = $categoryModel->get_all(['is_active'=>1]);
		$posts = $postModel->join('categories','categories.id= posts.category_id',"posts.id id,posts.title title,posts.sub_title sub_title,
		posts.body body,posts.img img,posts.url url,posts.category_id category_id, categories.title category_title,posts.created_at created_at, posts.updated_at updated_at,posts.is_active is_active",
		['posts.is_active'=>1,'categories.title'=>$cat]);
		$settings = $settingsModel->get_all();
		$pageInfo['page_subtitle'] = $cat;
		return view('site/pages/home',['info'=>$pageInfo,'categories'=>$categories,'posts'=>$posts,'user'=>$user[0],'settings'=>$settings[0]]);
	}
	//--------------------------------------------------------------------

}
