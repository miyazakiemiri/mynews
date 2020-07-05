<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでNews Modelが扱えるようになる
use App\News;

class NewsController extends Controller
{
    //以下を追記
    public function add()
    {
        return view('admin.news.create');
    }
    //追記
    public function create(Request $request)
    {
        //以下を追記
        //Varidationを行う
        $this->validate($request, News::$rules);
        
        $news = new News;
        $form = $request->all();
        
        //フォームから画像が送られてきたら、保存して、$news->image_pathに画像のパスを保存する
         if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $news->image_path = basename($path);
        } else {
            $news->image_path = null;
        }
        
        //フォームから送られてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送られてきたimageを削除する
        unset($form['image']);
        
        //データベースに保存する
        $news->fill($form);
        $news->save();
        
        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
        //web.phpでも'middleware' => 'auth'でリダイレクトするのに何故ここでもredirectと記載するのか
    }
}