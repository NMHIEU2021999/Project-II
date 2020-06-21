<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;

class Wish extends Model
{
    var $postid;
    var $username;
    public function checkExitsted(){
        return DB::table('Wish')->where('postid', $this->postid)->where('username', $this->username)->exists();
    }
    public function addToWishList(){
        $p = new Post();
        if(!$this->checkExitsted()|| !($p->checkIfExistPost($this->postid))){
            DB::table('Wish')->insert([
                'postid' => $this->postid,
                'username' => $this->username
            ]);
        }
    }
    public function removeFromWishList(){
        DB::table('Wish')->where('postid', $this->postid)->where('username', $this->username)->delete();
    }
    public function getUserWishList(){
        return DB::table('Wish')->where('Wish.username', $this->username)->join('Post', 'Post.postid', '=', 'Wish.postid')->paginate(8);
    }
    public function getUserWishListByName($searchValue){
        return DB::table('Wish')->where('Wish.username', $this->username)
        ->join('Post', 'Post.Postid', '=', 'Wish.postid')->where('postname', 'like', '%'.$searchValue.'%')->paginate(8);
    }
    public function searchUserWishListByName($searchValue){
        $user = Auth::user();
        return DB::table('Wish')->select('Post.postname')->where('Wish.username', $user->username)
        ->join('Post', 'Post.Postid', '=', 'Wish.postid')->where('postname', 'like', '%'.$searchValue.'%')
       ->groupBy('Post.postname')->limit(6)->get();
    }
}
