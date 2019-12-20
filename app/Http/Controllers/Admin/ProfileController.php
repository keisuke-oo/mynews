<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\History;
use Carbon\Carbon;


class ProfileController extends Controller
{
    //以下、追加分
    public function add()
    {
      return view('admin.profile.create');
    }
    
    public function edit(Request $request)
    {
      // Profile Modelからデータを取得する
      $profiles = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
      return view('admin.profile.edit');
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $news->image_path;
        }

        unset($profile_form['_token']);
        unset($profile_form['image']);
        unset($profile_form['remove']);
        $profile->fill($profile_form)->save();    
          //編集履歴を追加
      $history = new History;
      $history->profile_id = $profile -> id;
      $history->edited_at = Carbon::now();
      $history->save();  
      
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

      return redirect('admin/profile/create');
      }
      
    public function index()
     {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Profile::where('title', $cond_title)->get();
      } else {
          $posts = Profile::all();
      }       
      return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
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
