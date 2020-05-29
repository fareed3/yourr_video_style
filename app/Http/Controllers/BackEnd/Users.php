<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Redirect;

class Users extends BaseController
{
  //Dahab

  public function logs (request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');
    $data = DB::table('users')->where('email', $email)        where('password',$password)->first();
     if($data)
     {
       $userid = $data->id;
       $name = $data->name;
       session(['userid'=>($userid)]);
       session(['em'=>($name)]);
       return redirect('Dashboard');
     }
     else {
      echo "please check your email or password";
     }
  }
}
