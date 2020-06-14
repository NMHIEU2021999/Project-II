<?php

namespace App\Http\Controllers;

use illuminate\http\Request;
use Illuminate\Support\Facades\Auth;
use App\Account;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public function getRegisterForm()
    {
        return view('Register');
    }
    public function getUser(Request $request)
    {
        return $request->user();
    }
    public function getLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            if ($request->session()->has('successRegister')) {
                $temp = $request->session()->get('successRegister');
                $request->session()->forget('successRegister');
                return view('Login', ['successRegister' => $temp]);
            } else {
                return view('Login');
            }
        }
    }
    public function login(Request $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect('/');
        } else {
            return view('Login', ['failed' => true]);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function register(Request $request)
    {
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
        if (empty($errors)) {
            $account->register();
            session(['successRegister' => true]);
            return Redirect::route('getLogin');
        } else {
            return view('Register', ['invalids' => $errors, 'tempInfo' => $account]);
        }
    }
    public function getFormEditProfile()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        return view('UpdateProfile');
    }
    public function editProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();
        $oldpassword = $request->oldpassword;
        $a = new Account();
        if (!$a->checkPassword($oldpassword)) {
            return view('UpdateProfile', ['errorOldPassword' => 1]);
        }
        $account = new Account();
        $account->username = $user->username;
        $account->password = $request->password;
        $account->acctype = $request->acctype;
        $account->fullname = $request->fullname;
        $account->birthday = date_create_from_format('d/m/Y', $request->birthday);
        $account->address = $request->address;
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->job = $request->job;
        $account->introduction = $request->introduction;
        $passwordId = $request->passwordId;
        $errors = $account->checkUpdate($passwordId);
        if (empty($errors)) {
            $account->updateProfile();
            session(['successUpdate' => true]);
            return redirect('/profile');
        } else {
            return view('UpdateProfile', ['invalids' => $errors, 'tempInfo' => $account]);
        }
    }
    public function getUserProfile(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        $res=[];
        if ($request->session()->has('successUpdate')) {
            $temp = $request->session()->get('successUpdate');
            $request->session()->forget('successUpdate');
            $res['successUpdate'] = $temp;
        }
        if (!$request->has('username')) {
            $res['user'] = Auth::user();
            return view('Profile', $res);
        }
        $a = new Account();
        $username = $request->username;
        $user = $a->findAccountByUserName($username);
        $res['user'] = $user;
        return view('Profile', $res);
    }
}
