<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Video;
class Categories extends Controller
{

  public function add(Request $request)
  {

    	$category= new Category;
    	$category->name=$request->input('name');
    	$category->des=$request->input('des');
        $category->icon=$this->uploade_icons($request);
    	$category->save();
    	return back();
  }



  protected  function uploade_icons($request)
    {
        $file=$request->file("icon");

        $filename= time().str_random(10).".".$file->getClientOriginalExtension();

        $file->move(public_path('icons'),$filename);

        return $filename;
    }
  }  