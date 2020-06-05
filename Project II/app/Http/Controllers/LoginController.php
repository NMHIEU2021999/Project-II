<?php
    namespace App\Http\Controllers;
    use illuminate\http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Account;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller{
        public function getLogin(Request $request){
            if(Auth::check()){
                return redirect('/');
            }else{
                if($request->session()->has('successRegister')){
                    $temp = $request->session()->get('successRegister');
                    $request->session()->forget('successRegister');
                    return view('Login', ['successRegister' => $temp]);
                }else{
                    return view('Login');
                }
            }
        }
        public function login(Request $request){
            $data = [
                'username' => $request->username,
                'password' => $request->password,
            ];
    
            if(Auth::attempt($data)){
                return redirect('/');
            }else{
                return view('Login', ['failed' => true]);
            }
        }
        public function logout(){
            Auth::logout();
            return redirect('/');
        }
        public function register(Request $request){
            $account = new Account();
            $account->username = $request->username;
            $account->password = $request->password;
            $account->acctype = $request->acctype;
            $account->fullname = $request->fullname;
            $account->birthday = $request->birthday;
            $account->address = $request->address;
            $account->phone = $request->phone;
            $account->email = $request->email;
            $account->job = $request->job;
            $account->introduction = $request->introduction;
            $passwordId = $request->passwordId;
            $errors = $account->checkRegister($passwordId);
            if(empty($errors)){
                $account->register();
                session(['successRegister'=> true]);
                return Redirect::route('getLogin');
            }else{
                return view('Register', ['invalids'=> $errors, 'tempInfo' => $account]);
            }
        }
        public function getFormEditProfile(){
            if(!Auth::check()){
                return redirect('/login');
            }
            return view('UpdateProfile');
        }
        public function editProfile(Request $request){
            if(!Auth::check()){
                return redirect('/login');
            }
            $user = Auth::user();
            $oldpassword = $request->oldpassword;
            $a = new Account();
            if(!$a->checkUser($user->username, $oldpassword)){
                return view('UpdateProfile', ['errorOldPassword' => 1]);
            }
            $account = new Account();
            $account->username = $user->username;
            $account->password = $request->password;
            $account->acctype = $request->acctype;
            $account->fullname = $request->fullname;
            $account->birthday = $request->birthday;
            $account->address = $request->address;
            $account->phone = $request->phone;
            $account->email = $request->email;
            $account->job = $request->job;
            $account->introduction = $request->introduction;
            $passwordId = $request->passwordId;
            $errors = $account->checkUpdate($passwordId);
            if(empty($errors)){
                $account->register();
                session(['successUpdate'=> true]);
                return redirect('/uploads');
            }else{
                return view('Register', ['invalids'=> $errors, 'tempInfo' => $account]);
            }
        }
    }
?>