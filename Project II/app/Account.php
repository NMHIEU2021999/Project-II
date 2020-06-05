<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    // Hàm kiểu tra thông tin đăng nhập
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
    public function findAccountByUserName($username){
        $res = DB::table('Account')->where('username', $username)->first();
        return $res;
    }
    public function checkUser($username, $password){
        dd(Hash::make($password));
       return DB::table('Account')->where('username', $username)->where('password', Hash::make($password))->exists();
    }
    public function checkUpdate($passwordId){
        $errors = array();
        if($this->password != $passwordId){
            $errors['passwordId'] = 1;
        }
        return $errors;
    }
}
