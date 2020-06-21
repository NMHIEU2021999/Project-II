<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Report extends Model
{
    var $postid;
    var $username;
    var $category;
    var $description;
    var $status;
    var $datereport;
    public function checkIfExistedRePort(){
        return DB::table('Report')->where('postid', $this->postid)->where('username', $this->username)
        ->where('category', $this->category)->exists();
    }
    public function updateUserReport(){
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        DB::table('Report')->where('postid', $this->postid)->where('username', $this->username)
        ->where('category', $this->category)->update([
            'datereport' => date('Y-m-d H:i:s'),
            'description' => $this->description
        ]);
    }
    public function insertUserReport(){
        DB::table('Report')->insert([
            'postid' => $this->postid, 'username' => $this->username,
            'category' => $this->category, 'description' => $this->description
        ]);
    }
}
