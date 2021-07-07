<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class MemberController extends Controller
{
    //
  public function index(Request $request){
    //memberテーブルからname,telephone,emailを$membersに格納
    // $members = Member::get(); 
    // $members = DB::table('members')->select('id','name')->get();
    // $members = Member::get();
    // dd($members);

    $users = DB::table('members')->get();



    // $id = $request -> id;
    // 特定のIDを取得くりえびだで指定  ？＝ID番号
    // $users = DB::table('members')->where('id',$id)->first();
    // $users = DB::table('members')->orderBy('id','desc')->get();
    
    

    return view('member.index',['members' => $users]);

    


    // compact()でシンプルにviewに変すが渡せる。
    // return view('member.index',compact('members'));
  }



  public function add(Request $request){
    return view('member.add');
  }

  public function create(Request $request){
    
    $param = [
      'name' => $request->name,
      'email' => $request->email,
      'telephone' => $request->telephone,
    ];

    DB::table('members')->insert($param);
    // リダイレクトで返す
    return redirect('/index');
  }

  // public function find(Request $request){
  //   return view('member.find',['input'=>'']);
  // }

  // public function search(Request $request){
  //   $item = Member::find();
  // }
  
  public function delete(Request $request){
    $members = Member::find($request->id);
    return view('member.del', compact('members'));
  }

  public function remove(Request $request){
    Member::find($request->id)->delete();
    return redirect('/index');
  }

}