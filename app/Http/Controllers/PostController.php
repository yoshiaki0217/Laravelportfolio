<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Applyuser;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
	// 投稿一覧処理------------------------------------------------------

	public function index(Request $request){
		// 最新投稿から取得する
		$posts = Post::latest('id')->get();
		$userId = Auth::id();

		// 絶対パスでjsonファイルを指定する
		$url = public_path() ."/json/machin.json";

		// jsonファイルのデータをとってくる
		$json = file_get_contents($url);
	
		// 連想配列の中身が文字化けしないようにする
		$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
	
		// 第二引数のturuを指定することで連想配列にする
		$arr = json_decode($json,true);
		$machine = $request->machine;
		$lank = $request->lank;
		return view('posts.index', compact('posts','userId','arr','machine','lank'));
	}

	// ------------------------------------------------------	

	// 募集投稿画面を表示する処理
	public function create(){		
		return view('posts.create');
	}

	 // ---------------------------------------------------------------
	


	// 投稿処理---------------------------------------------------------

	public function add(Request $request){
		$user_id = Auth::id();
		// dd($user_id);

		// 投稿ホームで送られてきたデータを配列で取得
		$param =[
			'user_id'=>$user_id,
			'title' => $request->title,
			'member' => $request->member,
			'grade' => $request->grade,
			'message' => $request->message,
			'comment' => $request->comment,
		];

		// 下記でも実装可能
		// $posts->title=$request->input('title');
		// $posts->member=$request->input('member');
		// $posts->grade=$request->input('grade');
		// $posts->message=$request->input('message');
		// $posts->comment=$request->input('comment');

		// データを保存
		// $posts->save();

		// postテーブルに保存
		DB::table('posts')->insert($param);
		
		return redirect('/posts/index');	
	}

	 // ---------------------------------------------------------------


	// 詳細画面取得処理----------------------------------------------------

	public function detail(Request $request, $id){
		// formから送られてきたIDデータをもとにPostテーブルからIDを取得する
		$posts = Post::find($id); 
		// 投稿のIDを取得
		$postId = Post::find($request->id);
		// 投稿のIDを取得してそのIDにあった応募コメントを子テーブルから取得
		$comments = $postId->applyuser;	
		// dd($comments);	
		$user_id = Auth::id();
		return view('posts.details', compact('posts','comments','user_id'));
	}

	 // ---------------------------------------------------------------


	// 詳細画面処理------------------------------------------------------

	public function edit(Request $request,$id){
		// リンクから送られてたIDをもとにpostテーブルからIDを取得する
		$posts = Post::find($id);
		return view('posts.edit', compact('posts'));
	}

	 // ---------------------------------------------------------------



	// 更新処理---------------------------------------------------------

	public function update(Request $request, $id){
		// editフォームから送られてきたIDを取得する
		$posts = Post::find($id);

		// editフォームから送られてきたデータをを取得しpostsに入れる
		$posts->title=$request->input('title');
		$posts->member=$request->input('member');
		$posts->grade=$request->input('grade');
		$posts->message=$request->input('message');
		$posts->comment=$request->input('comment');

		// データを保存
		$posts->save();

		return redirect('posts/index');
	}

  // ---------------------------------------------------------------

	// 削除処理--------------------------------------------------------
	public function delete($id){
		// リンクから送られてきたIDを取得する
		$posts = Post::find($id);

		// とってきたデータを削除
		$posts->delete();

		return redirect('posts/index');
	}
	// ---------------------------------------------------------------


	// 検索処理--------------------------------------------------------
	public function search(Request $request){

			// 絶対パスでjsonファイルを指定する
			$url = public_path() ."/json/machin.json";

			// jsonファイルのデータをとってくる
			$json = file_get_contents($url);
		
			// 連想配列の中身が文字化けしないようにする
			$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
		
			// 第二引数のturuを指定することで連想配列にする
			$arr = json_decode($json,true);	

		if($request->machine == $request->lank){
			
			$posts = Post::get();

		}elseif($request->lank == 'all'){

			// ランクが指定されていなければデバイスの選択条件と一致したやつをとってくる
			$posts = Post::where('message',$request->machine)->get();

		}elseif($request->machine == 'all'){

			// デバイスが指定されていなければランクの選択条件と一致したやつをとってくる
			$posts = Post::where('grade',$request->lank)->get();
			
		}else{
			$posts = Post::where('grade',$request->lank)->where('message',$request->machine)->get();	
		}
		$userId = Auth::id();
		$machine = $request->machine;
		$lank = $request->lank;

		return view('posts.index', compact('posts','userId','arr','lank','machine'));
	}

	
	// ----------------------------------------------------------



	// 応募処理--------------------------------------------------------
	public function apply(Request $request){

		$user_id = Auth::id();
		$post_id = $request->id; 
		
		$param = [
			'user_id'=>$user_id,
			'post_id'=>$post_id,
			'title' => $request->title,
			'member' => $request->member,
			'grade' => $request->grade,
			'message' => $request->message,
			'comment' => $request->comment,
		];
		DB::table('applyusers')->insert($param);

		// 投稿のIDを取得
		$postId = Post::find($request->id);
		// 投稿のIDを取得してそのIDにあった応募コメントを子テーブルから取得
		$comments = $postId->applyuser;

		return back();	

	}
}