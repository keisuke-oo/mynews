{{-- layouts/admin.blade.phpを読み込み --}}
@extends('layouts.profile')


{{--admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込み --}}
@section('title', 'プロフィール画面')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="contaier">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <h2>My プロフィール</h2>
        </div>
      </div>
    </div>
@endsection    
