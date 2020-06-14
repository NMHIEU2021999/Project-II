<?php
    namespace App\Http\Controllers;

use App\Account;
use illuminate\http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Post;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller{
        public function getHomePage(Request $request){
            $res = array();
            if($request->has('province')){
                $province = $request->province;
            }else{
                $province = false;
            }
            if($request->has('category')){
                $category = $request->category;
            }else{
                $category = false;
            }
            if($request->has('order')){
                $order = $request->order;
                $res['order'] = $order;
            }else{
                $order = 1;
            }
            if($request->has('price')){
                $price = $request->price;
                if($price == 1){
                    $lowerPrice = false;
                    $upperPrice = 1000000;
                }else if($price == 2){
                    $lowerPrice = 1000000;
                    $upperPrice = 1500000;
                }else if($price == 3){
                    $lowerPrice = 1500000;
                    $upperPrice = 2000000;
                }else if($price == 4){
                    $lowerPrice = 2000000;
                    $upperPrice = 3000000;
                }else if($price == 5){
                    $lowerPrice = 3000000;
                    $upperPrice = 6000000;
                }else if($price == 6){
                    $lowerPrice = 6000000;
                    $upperPrice = false;
                }
            }else{
                $lowerPrice = false;
                $upperPrice = false;
            }
            if($request->has('size')){
                $size = $request->size;
                if($size == 1){
                    $lowerSize = false;
                    $upperSize = 10;
                }else if ($size == 2){
                    $lowerSize = 10;
                    $upperSize = 20;
                }else if($size == 3){
                    $lowerSize = 20;
                    $upperSize = 30;
                }else if($size == 4){
                    $lowerSize = 30;
                    $upperSize = 60;
                }else if($size == 5){
                    $lowerSize = 60;
                    $upperSize = false;
                }
            }else{
                $lowerSize = false;
                $upperSize = false;
            }
            $posts = DB::table('Post')
            ->when($province, function ($query, $province) {
                return $query->where('province', $province);
            })
            ->when($category, function ($query, $category) {        
                return $query->where('category', $category);
            })
            ->when($lowerPrice, function ($query, $lowerPrice) {
                return $query->where('price', '>=', $lowerPrice);
            })
            ->when($upperPrice, function ($query, $upperPrice) {
                return $query->where('price', '<=', $upperPrice);
            })
            ->when($lowerSize, function ($query, $lowerSize) {
                return $query->where('size', '>=', $lowerSize);
            })
            ->when($upperSize, function ($query, $upperSize) {
                return $query->where('size', '<=', $upperSize);
            })
            ->when($order == 1, function($query){
                return $query->orderBy('dateupload', 'asc');
            })
            ->when($order == 2, function($query){
                return $query->orderBy('price', 'asc');
            })
            ->when($order == 3, function($query){
                return $query->orderBy('price', 'desc');
            })
            ->paginate(8);
            $res['posts']=$posts;
            if($province){
                $res['province'] = $province;
            }
            if(isset($price)){
                $res['price'] = $price;
            }
            if(isset($size)){
                $res['size'] = $size;
            }
            if($category){
                $res['category'] = $category;
            }
            return view('Home', $res);
        }
        public function getFormUpload(){
            if(!Auth::check()){
                return redirect('/login');
            }
            return view('UploadPost');
        }
        public function uploadPost(Request $request){
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $post = new Post();
            $user = Auth::user();
            $post->postname = $request->postname;
            $post->username = $user->username;
            $post->address = $request->address;
            $post->category = $request->category;
            $post->price = $request->price;
            $post->description = $request->description;
            $post->province = $request->province;
            $post->size = $request->size;

            if($request->hasFile('image1')){
                $temp = $request->image1;
                $imageName = "user_img1_" . md5($user->username) . date('_d_m_Y H_i_s ') . $temp->getClientOriginalName();
                $post->image1 = $temp->move('upload', $imageName);
            }
            if($request->hasFile('image2')){
                $temp = $request->image2;
                $imageName = "user_img2_" . md5($user->username) . date('_d_m_Y H_i_s ') . $temp->getClientOriginalName();
                $post->image2 = $temp->move('upload', $imageName);
            }else{
                $post->image2 = '';
            }
            if($request->hasFile('image3')){
                $temp = $request->image3;
                $imageName = "user_img3_" . md5($user->username) . date('_d_m_Y H_i_s ') . $temp->getClientOriginalName();
                $post->image3 = $temp->move('upload', $imageName);
            }else{
                $post->image3 = '';
            }
            if($request->hasFile('image4')){
                $temp = $request->image4;
                $imageName = "user_img4_" . md5($user->username) . date('_d_m_Y H_i_s ') . $temp->getClientOriginalName();
                $post->image4 = $temp->move('upload', $imageName);
            }else{
                $post->image4 = '';
            }
            if($request->hasFile('image5')){
                $temp = $request->image5;
                $imageName = "user_img5_" . md5($user->username) . date('_d_m_Y H_i_s ') . $temp->getClientOriginalName();
                $post->image5 = $temp->move('upload', $imageName);
            }else{
                $post->image5 = '';
            }
            $post->insertPost();
            return redirect('/');
        }
        public function getDetailPost(Request $request){
            $post = new Post();
            $postid = $request->postid;
            $res = $post->findPostByPostId($postid);
            $username = $res->username;
            $user = new Account();
            $postuser = $user->findAccountByUserName($username);
            return view('DetailPost', ['post' => $res, 'postuser'=>$postuser]);
        }
        public function getUploadedPosts(Request $request){
            if(!Auth::check()){
                return redirect('/login');
            }
            $p = new Post();
            $res=[];
            $res['posts'] = $p->getUploadedPosts();
            return view('UploadedPost', $res);
        }
        public function deletePost(Request $request){
            if(Auth::check() && ($request->ajax())){
                $user = Auth::user();
                $input = $request->all();
                $p = new Post();
                $p->postid = $input['postid'];
                if($p->checkUserPost($user->username)){
                    $p->deletePost();
                    $res = [];
                    $res[] = 'success';
                    return response()->json($res);
                }
            }
        }
        public function getFormEditPost(Request $request){
            if(!Auth::check() || !$request->has('postid')){
                return redirect('/');
            }
            $user = Auth::user();
            $p = new Post();
            $p->postid = $request->postid;
            if(!$p->checkUserPost($user->username)){
                return redirect('/');
            }
            $post = $p->findPostByPostId($p->postid);
            return view('/EditPost', ['post' => $post]);
        }
    }
?>