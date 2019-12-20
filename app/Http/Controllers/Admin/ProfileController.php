<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use Carbon\Carbon;
use App\History;

class ProfileController extends Controller
{
    //以下、追加分
    public function add()
    {
      return view('admin.profile.create');
    }
    
    public function edit()
    {
      return view('admin.profile.edit');
    }
    
    public function update()
    {
      return redirect('admin/profile/edit');
    }
    
#以下、16「課題１」にて追記。元あったpublic function create()は削除
    public function create(Request $request)
      {

      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      //編集履歴を追加
      $history = new History;
      $history->profile_id = $profile -> id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/profile/create');
      }
      
    public function index(Request $request)
     {

      return view('admin.profile.index');
      }      
      
      
    public function delete(Request $request)
     {
        //該当するProfile Modelを取得
        $news = Profile::find($request->id);
        //削除する
        $news->delete();
        return redirect('admin/profile/');
     }
}
