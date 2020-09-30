<?php namespace App\Controllers;

class Posts extends BaseController
{
	public function index($param='user')
	{
		return view('admin/pages/'.$param,['content'=>$param]);
	}

	//--------------------------------------------------------------------

}
