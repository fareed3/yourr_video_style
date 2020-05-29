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
	//Mina
  public function Adduser(Request $request)
  {
    $rules = array(
      'email'=>'unique:users',
      'pass'=>'min:6',
      'cpassword'=>'same:pass',
      'group'=>'required|in:Admin,User',
    );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      return Redirect::back()
                ->withErrors($validator) // send back all errors to the add user
                ->withInput();
    }
    else {
      $user = new user();
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = $request->input('pass');
      $user->group = $request->input('group');
      if($user->group == 'Admin')
      {
        $user->group = true;
      }
      else
      {
        $user->group = false;
      }
      $user->save();
      return redirect('users');
    }
  }
  //Mina
}
