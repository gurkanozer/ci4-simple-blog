<?php namespace App\Libraries;

class Blog{
    public function post_item(array $data=[]){
        return view('admin/components/post',$data);
    }
    public function post_form(array $data=[]){
        return view('admin/components/post_form',$data);
    }
    public function category_item(array $data=[]){
        return view('admin/components/category',$data);
    }
}