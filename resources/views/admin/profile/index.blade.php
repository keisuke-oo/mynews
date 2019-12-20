@extends('layouts.admin')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
      <div class="row">
        <h2>プロフィールの編集</h2>
      </div>
    <div class="row">
      <div class="list-news col-md-12 mx-auto">
        <div class="row">
          <table class="table table-dark">
            <thead>
              <tr>
                <th width="10%">氏名</th>
                <th width="5%">性別</th></th>
                <th width="15%">趣味</th>
                <th width="50%">自己紹介</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <th>{{ $profiles->id }}</th>
                  <td>{{ \Str::limit($profiles->name, 30)  }}</td>
                  <td>{{ \Str::limit($profiles->gender, 5) }}</td>
                  <td>{{ \Str::limit($profiles->hobby, 100) }}</td>
                  <td>{{ \Str::limit($profiles->introduction, 300) }}</td>
                  <td>
                    <div>
                      <a href="{{ action('Admin\ProfileController@edit', ['id'=> $profile->id]) }}">編集</a>
                    </div>
                    <div>
                      <a href="{{ action('Admin\ProfileController@delete', ['id'=> $profile->id]) }}">削除</a>
                    </div>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
 </div>    
@endsection    