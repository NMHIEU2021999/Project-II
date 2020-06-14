<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;

class Post extends Model
{
    var $postid;
    var $username;
    var $postname;
    var $address;
    var $province;
    var $price;
    var $size;
    var $category;
    var $status;
    var $description;
    var $dateupload;
    var $image1;
    var $image2;
    var $image3;
    var $image4;
    var $image5;
    public function findPostByPostId($postid){
        $res = DB::table('Post')->where('postid', $postid)->first();
        return $res;
    }
    public function insertPost()
    {
        DB::table('Post')->insert([
            'postname' => $this->postname, 'username' => $this->username, 'address' => $this->address,
            'province' => $this->province, 'price' => $this->price,
            'size' => $this->size, 'category' => $this->category, 'description' => $this->description, 'image1' => $this->image1,
            'image2' => $this->image2, 'image3' => $this->image3, 'image4' => $this->image4, 'image5' => $this->image5
        ]);
    }
    public function getUploadedPosts(){
        $username = Auth::user()->username;
        return DB::table('Post')->where('username', $username)->where('status', '<>', 'đã xoá')->paginate(8);
    }
    public function checkUserPost($username){
        return DB::table('Post')->where('postid', $this->postid)->where('username', $username)->exists();
    }
    public function deletePost(){
        DB::table('Post')->where('postid', $this->postid)->update(['status'=> 'đã xoá']);
    }
}
