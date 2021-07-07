<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //
    public function index(){
      $data = ["りんご","なし","ぶどう","バナナ",];
      return view('sample',['data'=>$data]);
    }

    public function post(Request $request){
      return view('sample',['name'=>$request->name]);
    }
}