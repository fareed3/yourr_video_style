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
  //Dahab
  
  //Mina
		// Task 1 (Add User)
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
      // Task 2 (Show All Users)
  public function alluser()
  {
    $all = user::all();
    return view('back-end.User.users',compact('all'));
  }
	 // Task 3 (Delete User)
  public function deleteuser($id)
  {
    user::destroy($id);
    return redirect('users');
  }
  
	 
  
  //Mina
  
}
