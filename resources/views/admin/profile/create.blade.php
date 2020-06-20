<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>MyProfile</title>
    </head>
    <body>
    {{-- layouts/profile.blade.phpを読み込む --}}
    @extends('layouts.profile')

    {{-- profile.blade.phpの@yield('title')に'プロフィールの新規作成'を埋め込む --}}
    @section('title', 'プロフィールの新規画面')

    {{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
            </div>
        </div>
    </div>
    @endsection
    </body>
</html>