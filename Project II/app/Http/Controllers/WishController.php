<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Wish;
use Illuminate\Support\Facades\DB;

class WishController extends Controller
{
    public function getUserWishList(Request $request){
        if(!Auth::check()){
            return redirect('/login');
        }
        $user = Auth::user();
        $wish = new Wish();
        $wish->username = $user->username;
        $res = [];
        if($request->has('search')){
            $search = $request->search;
            $res['posts'] = $wish->getUserWishListByName($search);
            $res['search'] = $search;
        }else{
        $res['posts'] = $wish->getUserWishList();
        }
        return view('WishList', $res);
    }

    public function addToWishList(Request $request){
        if(Auth::check() && ($request->ajax())){
            $wish = new Wish();
            $user = Auth::user();
            $wish->username = $user->username;
            $input = $request->all();
            if(!array_key_exists('postid', $input)){
                return;
            };
            $wish->postid = $input['postid'];
            $wish->addToWishList();
            $res=[];
            $res['success'] = true;
            return response()->json($res);
        }
    }

    public function removeFromWishList(Request $request){
        if(Auth::check() && ($request->ajax())){
            $wish = new Wish();
            $user = Auth::user();
            $wish->username = $user->username;
            $input = $request->all();
            if(!array_key_exists('postid', $input)){
                return;
            };
            $wish->postid = $input['postid'];
            $wish->removeFromWishList();
            $res=[];
            $res['success'] = true;
            return response()->json($res);
        }
    }
    public function searchWishPosts(Request $request){
        if($request->ajax() && Auth::check()){
            $input = $request->all();
            $searchValue = $input['searchValue'];
            $wish = new Wish();
            $posts = $wish->searchUserWishListByName($searchValue);
            $listNames = [];
            foreach($posts as $post){
                $listNames[] = $post->postname;
            }
            return response()->json($listNames);
        }
    }
}