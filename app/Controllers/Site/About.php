<?php namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Site\CategoryModel;
use App\Models\Site\PostModel;
use App\Models\Site\UserModel;
use App\Models\Site\SettingsModel;

class About extends BaseController
{
	public function index()
	{
		$pageInfo = ['meta_title'=>'About',
		'page_title'=>'Hakkımda',
		'page_subtitle'=>''];
		$db = db_connect();
		$categoryModel = new CategoryModel($db);
		$postModel = new PostModel($db);
		$userModel = new UserModel($db);
		$settingsModel = new SettingsModel($db);
		$user = $userModel->get_all();
		$categories = $categoryModel->get_all(['is_active'=>1]);
		$posts = $postModel->get_all(['is_active'=>1]);
		$settings = $settingsModel->get_all(['is_active'=>1]);
		$pageInfo['page_subtitle'] = $user[0]->fullname;
		return view('site/pages/about',['info'=>$pageInfo,'categories'=>$categories,'posts'=>$posts,'user'=>$user[0],'settings'=>$settings[0]]);
	}
	//--------------------------------------------------------------------

}
