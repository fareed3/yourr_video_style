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
public function resetpass (request $request)
  {
	  $rules = array(
      'password1'=>'min:6',
      'password2'=>'same:password1'
    );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      return Redirect::back()
                ->withErrors($validator) // send back all errors to the add user
                ->withInput();
    }
    else {
		$email = $request->input('email');
		$password = $request->input('pass');
		$pass1 = $request->input('password1');
		$pass2 = $request->input('password2');
		$Data = DB::select('select id from users where email=? and password=?' , [$email,$password]);
		if (count($Data)&&$pass1==$pass2)
		{
		 DB::update ('UPDATE users SET password =? WHERE email=? and password=?' , [$pass1,$email,$password]);
		 return redirect('users');
		}
		else {
		 echo "please enter correct data";
		}
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
    // Task 4 (Update User)
  public function edit($id)
  {
    $oneuser = user::where('id',$id)->first();
    return view('back-end.User.edituser',compact('oneuser'));
  }

  public function edituser1(Request $request ,$id)
  {
    $rules = array(
      'pass'=>'min:6',
      'cpassword'=>'same:pass'
    );
    $validator = Validator::make(Input::all(), $rules);
    if($validator->fails()){
      return Redirect::back()
                ->withErrors($validator) // send back all errors to the add user
                ->withInput();
    }
    else {
      $user1 = user::find($id);
      $user1->name = $request->input('name');
      $user1->email = $request->input('email');
      $user1->password = $request->input('pass');
      $user1->save();
      return redirect('users');
    }
  }

  //Mina

}
