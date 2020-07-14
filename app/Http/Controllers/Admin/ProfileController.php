<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 以下を追記することでProfile Modelが扱えるようになる
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        //Varidationを行う
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
         //フォームから送られてきた_tokenを削除する
        unset($form['_token']);
        
         //データベースに保存する
        $profile->fill($form);
        $profile->save();
        
        //admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        // Profiles Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
        abort(404);    
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profiles Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        return redirect()->back();
    }
}
