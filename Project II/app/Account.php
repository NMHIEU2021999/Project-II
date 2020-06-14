<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

    class Account extends Model
    {
    protected $table = 'Account';   
    var $userid;
    var $username ;
    var $password;
    var $fullname;
    var $birthday;
    var $address;
    var $phone;
    var $email;
    var $job;
    var $introduction;
    var $acctype;
    public function checkLogin(){
        $dbaccount = DB::table('Account')->where('username', $this->username)->where('password', $this->password)->get();
        return $dbaccount[0];
    }
    // Hàm kiểm tra thông tin đăng ký
    public function checkRegister($passwordId){
        $errors = array();
        $checkUsername = DB::table('Account')->where('username', $this->username)->exists();
        if($checkUsername){
            $errors['username'] = 1;
        }
        if($this->password != $passwordId){
            $errors['passwordId'] = 1;
        }

        return $errors;
    }
    // Hàm thực hiện đăng ký
    public function register(){
        DB::table('Account')->insert([
           'username' => $this->username, 'password' => Hash::make($this->password), 'acctype' => $this->acctype,
           'fullname' => $this->fullname,'birthday' => $this->birthday,
           'address' => $this->address, 'phone' => $this->phone, 'email' => $this->email,
           'job' => $this->job, 'introduction' => $this->introduction
        ]);
    }
    // Hàm cập nhật thông tin cá nhân
    public function updateProfile(){
        DB::table('Account')->where('username', $this->username)->update([
            'acctype' => $this->acctype, 'fullname' => $this->fullname,'birthday' => $this->birthday,
           'address' => $this->address, 'phone' => $this->phone, 'email' => $this->email,
           'job' => $this->job, 'introduction' => $this->introduction
        ]);
        if($this->password != ''){
            DB::table('Account')->where('username', $this->username)->update([
                'password' => Hash::make($this->password)
            ]);
        }
    }
    public function findAccountByUserName($username){
        $res = DB::table('Account')->where('username', $username)->first();
        return $res;
    }
    public function checkPassword($password){
        $user = Auth::user();
        return Hash::check($password, $user->password);
    }
    public function checkUpdate($passwordId){
        $errors = array();
        if($this->password != $passwordId){
            $errors['passwordId'] = 1;
        }
        return $errors;
    }
}
