<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folder;
use App\Http\Requests\CreateFolderRequest;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolderRequest $request)
{
    // フォルダモデルのインスタンスを作成する
    $folder = new Folder();
    // タイトルに入力値を代入する
    $folder->title = $request->title;
    // インスタンスの状態をデータベースに書き込む
    Auth::user()->folders()->save($folder);

    return redirect()->route('tasks.index', [
        'folder' => $folder->id,
    ]);
}
}
