<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Report;
use App\Post;

class ReportController extends Controller
{
    public function reportPost(Request $request){
        if(Auth::check() && ($request->ajax())){
            $r = new Report();
            $p = new Post();
            $user = Auth::user();
            $r->username = $user->username;
            $input = $request->all();
            if($p->checkIfExistPost($input['postid'])){
                $r->postid = $input['postid'];
                $r->category = $input['category'];
                $r->description = $input['description'];
                if($r->checkIfExistedRePort()){
                    $r->updateUserReport();
                }else{
                    $r->insertUserReport();
                }
                $res= [];
                $res['success'] = true;
                return response()->json($res);
            }
        }
    }
}
