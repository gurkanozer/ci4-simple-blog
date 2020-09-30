<?php namespace App\Libraries;

class Blog{
    public function post_item($post){
        return view('admin/components/post',[$post]);
    }
}