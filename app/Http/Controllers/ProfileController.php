<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
  public function index(Request $reuest)
  {
    $posts = Profile::all()->sortByDesc('updated_at');
    
    if(count($posts) > 0) {
      $headline = $posts->shift();
    } else {
      $headline = null;
    }
    
    // news/index.blade.php ファイルを渡している
    // また、Viewテンプレートにheadline　postsという変数を渡している
    return view('profile.index',['headline' => $headline, 'posts' => $posts]);
  }
    
}
